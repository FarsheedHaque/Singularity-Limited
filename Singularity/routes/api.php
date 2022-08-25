<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});


//Authentication Routes
Route::get('register-page', [AuthController::class, 'registerPage']);
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::get('logout', [AuthController::class, 'logout'])->middleware('auth:api');


//User Routes
Route::get('users', [UserController::class, 'userList'])->middleware('auth:api');
Route::post('new-user', [UserController::class, 'addUser'])->middleware('auth:api');
Route::get('find-user/{id}', [UserController::class, 'findUser'])->middleware('auth:api');
Route::put('user-info-update', [UserController::class, 'updateUser'])->middleware('auth:api');
Route::delete('remove-user/{id}', [UserController::class, 'deleteUser'])->middleware('auth:api');


//Outlet Routes
Route::get('outlets', [OutletController::class, 'outletList'])->middleware('auth:api');
Route::post('create-outlet', [OutletController::class, 'addOutlet'])->middleware('auth:api');
Route::get('find-outlet/{id}', [OutletController::class, 'findOutlet'])->middleware('auth:api');
Route::delete('remove-outlet/{id}', [OutletController::class, 'deleteOutlet'])->middleware('auth:api');
Route::put('outlet-info-update', [OutletController::class, 'updateOutlet'])->middleware('auth:api');
Route::post('add-outlet-image', [OutletController::class, 'addOutletImage'])->middleware('auth:api');
Route::delete('remove-image/{name}', [OutletController::class, 'deleteImage'])->middleware('auth:api');






