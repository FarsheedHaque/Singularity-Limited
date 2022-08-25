<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    //All the functions are called to satisfy REST API request
    //Auth::user()... was used to give permission to Admin and User

    //to read user data
    public function userList()
    {

        if(Auth::user()->role == 'admin')
        {
            $users = User::all();
            return response()->json([
                'success' => 'true',
                'message' => 'users Retrieved',
                'data' => $users,
                'id' => null
            ]);
        }else{

            $id = Auth::user()->id;

            return response()->json([
                'success' => 'true',
                'message' => 'users Retrieved',
                'data' => null,
                'id' => $id
                ]);
        }


    }

    //to add a user
    public function addUser(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', Rules\Password::defaults()],
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors()]);
        }
        else{

            if(Auth::user()->role == 'admin')
            {
                User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);

                return response(['error' => null]);
            }


        }
    }


    //to find a particular user
    public function findUser($id)
    {
        $admin_id = User::where('role', 'admin')->pluck('id')->first();

        if(Auth::user()->role == 'user' && Auth::user()->id == $id)
        {
            $user = User::where('id', $id)->first();

            return response()->json([
                'success' => 'true',
                'message' => 'user Retrieved',
                'data' => $user,
            ]);
        }
        if(Auth::user()->role == 'admin' && $id != $admin_id){

                $user = User::where('id', $id)->first();
                return response()->json([
                    'success' => 'true',
                    'message' => 'user Retrieved',
                    'data' => $user,
                ]);
            }else{
                return response()->json([
                    'success' => 'true',
                    'message' => 'user Retrieved',
                    'data' => null,
                ]);
            }

        }



//to update a user's information
    public function updateUser(Request $request)
    {
        if (Auth::user()->role == 'admin') {
            $data = $request->all();
            $var = $request->user()->token();
            $userData = User::where('id', $data['id'])->first();


            if (Hash::check($data['password'], $userData['password'])) {
                if ($data['password_new'] != null) {
                    $validator = Validator::make($data, [

                        'password_new' => ['required', Rules\Password::defaults()]
                    ]);

                    if ($validator->fails()) {
                        return response(['message' => 'This new password must be minimum 8 characters long']);
                    }
                    $data['password_new'] = Hash::make($data['password_new']);
                    $data['password'] = $data['password_new'];
                } else {
                    unset($data['password']);
                }

                if ($data['email'] != $data['email_new']) {
                    $validator = Validator::make($data, [
                        'email_new' => 'required|email|unique:users,email,' . $var->user_id,
                    ]);

                    if ($validator->fails()) {
                        return response(['message' => 'This email is already taken']);
                    }

                    $data['email'] = $data['email_new'];
                    $userData->update($data);
                    return response(['message' => 'User Updated']);
                } else {
                    $userData->update($data);
                    return response(['message' => 'User Updated']);
                }
            } else {
                return response(['message' => 'Password is incorrect']);
            }
        }
    }


    //to delete a user
    public function deleteUser($id)
    {
        $count = count(User::all());

        if($count > 1)
        {
            $admin_id = User::where('role', 'admin')->pluck('id')->first();

            if(Auth::user()->role == 'admin' && $id != $admin_id)
            {
                User::where('id', $id)->delete();

                return response()->json([
                    'success' => 'true',
                    'message' => 'User Deleted'
                ]);
            }
        }
        else{
            return response()->json([
                'success' => 'true',
                'message' => null
            ]);
        }

    }





}
