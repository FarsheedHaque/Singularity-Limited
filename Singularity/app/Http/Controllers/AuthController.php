<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    //Authentication is done using Oauth2 Laravel Passport
    public function login(Request $request)
    {
        $loginData = $request->all();

        if (!auth()->attempt($loginData)) {
            return response(['message' => 'This User does not exist, check your details'], 400);
        }

//        $role = User::where('email', $loginData['email'])->pluck('role')->first();

        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        return response(['access_token' => $accessToken]);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response(['status' => 'logged out']);
    }
}
