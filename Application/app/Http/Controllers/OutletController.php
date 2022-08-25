<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class OutletController extends Controller
{


    //this controller is used to do outlet CRUD using REST API calls

    //to call all outlet information that is only visible to and individual information for a user
    public function getOutlets()
    {
        $cookie = Cookie::get('name');
        $response = Http::withToken($cookie)->get(env('API_URL') . 'api/outlets');

        if ($response->successful()) {
            $outlets = $response['data'];
            $role = $response['role'];

            return view('outlet-list', compact('outlets', 'role'));
        } else {
            Session::flash('data-retrieval-error', 'Sorry Something Went Wrong!');
            return redirect('/outlet-request');
        }
    }


    //to send new outlet data to backend and receive appropriate message
    public function addOutlet(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'image.*' => 'mimes:jpg,jpeg,png',
        ]);

        if ($validator->fails()) {
            return Redirect::to('/new-outlet')->withInput()->withErrors($validator);
        }

        if ($files = $request->file('image')) {
            foreach ($files as $file) {
                $current_timestamp = Carbon::now()->timestamp;
                $name = $current_timestamp . rand(0, 9999) . "." . $file->getClientOriginalExtension();
                $file->move('gallery', $name);
                $fileName[] = $name;
            }
            $data['image'] = $fileName;
        }

        $cookie = Cookie::get('name');
        $response = Http::withToken($cookie)->post(env('API_URL') . 'api/create-outlet', $data);

        if ($response->successful()) {
            if ($response["error"] == null) {
                Session::flash('outlet-added', 'Outlet Created!');
                return Redirect::to('/outlet-request');
            } else {
                return Redirect::to('/new-outlet')->withInput()->withErrors($response['error']);
            }

        }

    }


    //to call single outlet information
    public function showOutlet($id)
    {
        $cookie = Cookie::get('name');
        $response = Http::withToken($cookie)->get(env('API_URL') . 'api/find-outlet/' . $id);

        if ($response->successful()) {
            $outlet = $response['data'];
            $images = $response['images'];
            $role = $response['role'];

            return view('single-outlet', compact('outlet', 'images', 'role'));

        } else {
            Session::flash('data-retrieval-error', 'Sorry Something Went Wrong!');
            return view('single-outlet');
        }

    }


    //same as showOutlet function for coding convenience
    public function showOutletAgain($id)
    {
        $cookie = Cookie::get('name');
        $response = Http::withToken($cookie)->get(env('API_URL') . 'api/find-outlet/' . $id);

        if ($response->successful()) {
            $outlet = $response['data'];
            $images = $response['images'];


            if ($response['role'] == 'admin') {
                return view('outlet-edit', compact('outlet'));
            } else {
                return redirect('/outlet-request');
            }


        } else {
            Session::flash('data-retrieval-error', 'Sorry Something Went Wrong!');
            return view('single-outlet');
        }

    }


    //to send an outlet's updated information
    public function editOutlet(Request $request)
    {
        $data = $request->all();


        $cookie = Cookie::get('name');
        $response = Http::withToken($cookie)->put(env('API_URL') . 'api/outlet-info-update', $data);

        if ($response->successful()) {
            if ($response["error"] == null) {
                Session::flash('outlet-updated', 'Outlet Updated!');
                return Redirect::to('/single-outlet/' . $data['id']);
            } else {
                return Redirect::to('/single-outlet/' . $data['id'])->withInput()->withErrors($response['error']);
            }

        }
    }


    //to delete an outlet
    public function removeOutlet($id)
    {
        $cookie = Cookie::get('name');
        $response = Http::withToken($cookie)->delete(env('API_URL') . 'api/remove-outlet/' . $id);

        if ($response->successful()) {
            if ($response['data']) {
                foreach ($response['data'] as $file) {
                    File::delete('gallery/' . $file);
                }
            }

            Session::flash('data-retrieval', 'Outlet Is Successfully Deleted');
            return redirect('/outlet-request');
        } else {
            Session::flash('data-retrieval-error', 'Sorry Something Went Wrong!');
            return redirect('/outlet-request');
        }

    }


    //to add more image to outlets
    public function addImage(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'image.*' => 'mimes:jpg,jpeg,png',
        ]);

        if ($validator->fails()) {
            return Redirect::to('/single-outlet/' . $data['id'])->withInput()->withErrors($validator);
        }

        if ($files = $request->file('image')) {
            foreach ($files as $file) {
                $current_timestamp = Carbon::now()->timestamp;
                $name = $current_timestamp . rand(0, 9999) . "." . $file->getClientOriginalExtension();
                $file->move('gallery', $name);
                $fileName[] = $name;
            }
            $data['image'] = $fileName;
        }

        $cookie = Cookie::get('name');
        $response = Http::withToken($cookie)->post(env('API_URL') . 'api/add-outlet-image', $data);

        if ($response->successful()) {
            if ($response['error'] == null) {

                Session::flash('data-retrieval', 'Photos Added');
                return redirect('/single-outlet/' . $data['id']);
            } else {
                Session::flash('data-retrieval-error', 'Sorry Something Went Wrong!');
                return redirect('/single-outlet/' . $data['id']);
            }


        }
    }


    //to remove outlet images
    public function removeImage($name, $id)
    {

        $cookie = Cookie::get('name');
        $response = Http::withToken($cookie)->delete(env('API_URL') . 'api/remove-image/' . $name);

        if ($response->successful()) {

            File::delete('gallery/' . $name);

            Session::flash('data-retrieval', 'Image Is Successfully Deleted');
            return redirect('/single-outlet/'.$id);
        } else {
            Session::flash('data-retrieval-error', 'Sorry Something Went Wrong!');
            return redirect('/single-outlet/'.$id);
        }

    }
}
