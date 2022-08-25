<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //this controller is used to do user CRUD using REST API calls


    //to call all user information th
    public function getUsers()
    {
        $cookie = Cookie::get('name');
        $response = Http::withToken($cookie)->get(env('API_URL') .'api/users');


        if($response->successful())
        {
            if($response['data'])
            {
                $users = $response['data'];
                return view('user-list', compact('users'));
            }else{

                return redirect('/single-user/'.$response['id']);
            }

        }else{
            Session::flash('data-retrieval-error','Sorry Something Went Wrong!');
            return redirect('/user-request');
        }
    }


    //to send new user information from Admin to backend
    public function addUser(Request $request)
    {
        $data = $request->all();


        $validator = Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'email|required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::to('/new-registration')->withInput()->withErrors($validator);
        }

        $cookie = Cookie::get('name');
        $response = Http::withToken($cookie)->post(env('API_URL') .'api/new-user', $data);

        if($response->successful())
        {
            if($response["error"] == null)
            {
                Session::flash('user-added','Outlet Created!');
                return Redirect::to('/user-request');
            }
            else{
                return Redirect::to('/new-registration')->withInput()->withErrors($response['error']);
            }

        }

    }


    //to see a particular user by admin
    public function showUser($id)
    {
        $cookie = Cookie::get('name');
        $response = Http::withToken($cookie)->get(env('API_URL') .'api/find-user/'.$id);

        if($response->successful())
        {
            if($response['data'])
            {
                $user = $response['data'];
                return view('user-edit', compact('user'));
            }else{
                return redirect('/home');
            }
        }
        else{
            Session::flash('data-retrieval-error','Sorry Something Went Wrong!');
            return view('user-edit');
        }
    }


    //to edit a particular user by that user only
    public function editUser(Request $request)
    {
        $data = $request->all();



        $validator = Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'email|required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::to('/single-user/'.$data['id'])->withInput()->withErrors($validator);
        }

        $cookie = Cookie::get('name');
        $response = Http::withToken($cookie)->put(env('API_URL') .'api/user-info-update', $data);

        if($response->successful() && $response['message'] == 'User Updated')
        {
            Session::flash('update-success', 'Update is Successful!');
            return redirect('/single-user/'.$data['id']);
        }
        elseif($response->successful() && $response['message'] == 'Password is incorrect')
        {
            Session::flash('update-failure1', 'Password is incorrect');
            return redirect('/single-user/'.$data['id']);
        }
        elseif($response->successful() && $response['message'] == 'This email is already taken')
        {
            Session::flash('update-failure1', 'This email is already taken');
            return redirect('/single-user/'.$data['id']);
        }
        elseif($response->successful() && $response['message'] == 'This new password must be minimum 8 characters long has at least one capital letter one small letter and one number')
        {
            Session::flash('update-failure1', 'This new password must be minimum 8 characters long has at least one capital letter one small letter and one number');
            return redirect('/single-user/'.$data['id']);
        }
        else
        {
            Session::flash('update-failure', 'Update is not Successful!');
            return redirect('/single-user/'.$data['id']);
        }

    }


    //to remove a user by admin
    public function removeUser($id)
    {
        $cookie = Cookie::get('name');
        $response = Http::withToken($cookie)->delete(env('API_URL') .'api/remove-user/'.$id);



        if($response->successful())
        {
            if($response["message"] != null)
            {
                Session::flash('data-retrieval','User Is Successfully Deleted');
                return redirect('/user-request');
            }
            else{
                Session::flash('single-user-remaining-error','At Least One User Has To Remain');
                return redirect('/user-request');
            }
        }
        else{
            Session::flash('data-retrieval-error','Sorry Something Went Wrong!');
            return redirect('/user-request');
        }

    }

}
