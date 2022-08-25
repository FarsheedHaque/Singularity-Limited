<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //AuthController for authentication purpose using Oauth2 Laravel Passport using REST API from backend



    public function login(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return Redirect::to('/')->withInput()->withErrors($validator);
        }



        $response =  Http::post(env('API_URL').'api/login', [
            'email' => $data['email'],
            'password' => $data['password'],
        ]);


        if($response->successful())
        {
            $minutes = 180;

            Cookie::queue('name', $response['access_token'], $minutes);

            return redirect('/home');
        }else{
//            return $response->status();
            Session::flash('authentication-error','Please Check Your Email And Password!');
            return redirect('/');
        }
    }

    public function logout()
    {
        $cookie = Cookie::get('name');
        $response = Http::withToken($cookie)->get(env('API_URL') .'api/logout');

        if($response->successful())
        {
            Cookie::queue(Cookie::forget('name'));
            return redirect('/');
        }
    }
}
