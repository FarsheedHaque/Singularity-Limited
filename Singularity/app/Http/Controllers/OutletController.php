<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Outlet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class OutletController extends Controller
{

    //All the functions are called to satisfy REST API request
    //Auth::user()... was used to give permission to Admin and User


    //to read outlet data
    public function outletList()
    {
        $outlet = Outlet::all();

        if(Auth::user()->role == 'admin')
        {
            return response()->json([
                'success' => 'true',
                'message' => 'users Retrieved',
                'data' => $outlet,
                'role' => 'admin'
            ]);
        }else{
            return response()->json([
                'success' => 'true',
                'message' => 'users Retrieved',
                'data' => $outlet,
                'role' => 'user'
            ]);
        }
    }

    //to add new outlet
    public function addOutlet(Request $request)
    {
        if (Auth::user()->role == 'admin') {

            $data = $request->all();
            $code = Carbon::now()->timestamp . rand(0, 99999);

            $files = array();

            if ($request->image) {
                for ($i = 0; $i < count($data['image']); $i++) {
                    array_push($files, $data['image'][$i]);
                }
            }

            DB::beginTransaction();
            try {
                Outlet::create([
                    'name' => $request->name,
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'latitude' => $request->latitude,
                    'longitude' => $request->longitude,
                    'code' => $code
                ]);

                if ($files) {
                    $outlet = Outlet::where('code', $code)->first();

                    foreach ($files as $file) {
                        $outlet->images()->save(new Image(['name' => $file]));
                    }
                }

                DB::commit();

                return response(['error' => null]);

            } catch (\Exception $exception) {
                DB::rollback();
                throw $exception;

            }

        }
    }


    //to read single outlet data
    public function findOutlet($id)
    {
        $outlet = Outlet::where('id', $id)->first();

        $images = $outlet->images()->get()->toArray();

        if (Auth::user()->role == 'admin')
        {
            return response()->json([
                'success' => 'true',
                'message' => 'user Retrieved',
                'data' => $outlet,
                'images' => $images,
                'role' => 'admin'
            ]);

        }else{
            return response()->json([
                'success' => 'true',
                'message' => 'user Retrieved',
                'data' => $outlet,
                'images' => $images,
                'role' => 'user'
            ]);
        }


    }

    //to update an outlet's information
    public function updateOutlet(Request $request)
    {
        if (Auth::user()->role == 'admin') {

            $data = $request->all();

            $validator = Validator::make($data, [
                'name' => 'required',
            ]);

            if ($validator->fails()) {
                return response(['error' => $validator->errors()]);
            }else{
                $outletData = Outlet::where('id', $data['id'])->first();
                $outletData->update($data);
                return response(['error' => null]);
            }

        }
    }


    //to delete an outlet
    public function deleteOutlet($id)
    {
        if (Auth::user()->role == 'admin') {
            DB::beginTransaction();
            try {
                $outlet = Outlet::where('id', $id)->first();
                $images = $outlet->images()->get()->pluck('name')->toArray();
                $outlet->images()->delete();
                Outlet::where('id', $id)->delete();

                DB::commit();

                return response()->json([
                    'success' => 'true',
                    'message' => 'Outlet Deleted',
                    'data' => $images
                ]);

            } catch (\Exception $exception) {
                DB::rollback();
                throw $exception;
            }
        }

    }


    //to add more image to an outlet
    public function addOutletImage(Request $request)
    {
        if (Auth::user()->role == 'admin') {
            $data = $request->all();

            $files = array();

            if ($request->image) {
                for ($i = 0; $i < count($data['image']); $i++) {
                    array_push($files, $data['image'][$i]);
                }
            }

            if ($files) {
                $outlet = Outlet::where('id', $data['id'])->first();

                foreach ($files as $file) {
                    $outlet->images()->save(new Image(['name' => $file]));
                }
            }
            return response(['error' => null]);
        }
    }



    //to delete an outlet's image
    public function deleteImage($name)
    {
        if (Auth::user()->role == 'admin') {

            Image::where('name', $name)->delete();

            return response()->json([
                'success' => 'true',
                'message' => 'Image Deleted',
            ]);
        }

    }

}
