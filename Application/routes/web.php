<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//a helper route to easily destroy cookies
Route::get('/d', function () {

    Cookie::queue(Cookie::forget('name'));
    return redirect('/');
});




Route::get('/', function () {
    if(Cookie::get('name'))
    {
        return redirect('/home');
    }else{
        return view('login');
    }
});


Route::post('/login-request', [AuthController::class, 'login']);




//RoleMiddleware or role is used to control unauthenticated access to private pages
Route::middleware('role')->group(function () {

    Route::get('/home', function () {
        return view('layout');
    });
    Route::get('/logout-request', [AuthController::class, 'logout']);


//user routes
    Route::get('/user-request', [UserController::class, 'getUsers']);
    Route::get('/single-user/{id}', [UserController::class, 'showUser']);
    Route::get('/new-registration', function () {
        return view('registration');
    });
    Route::post('/register-request', [UserController::class, 'addUser']);
    Route::post('/update-user', [UserController::class, 'editUser']);
    Route::get('/delete-user/{id}', [UserController::class, 'removeUser']);


//outlet routes
    Route::get('/outlet-request', [OutletController::class, 'getOutlets']);
    Route::get('/new-outlet', function () {
        return view('add-outlet');
    });
    Route::post('/create-outlet-request', [OutletController::class, 'addOutlet']);
    Route::get('/single-outlet/{id}', [OutletController::class, 'showOutlet']);
    Route::get('/single-outlet-again/{id}', [OutletController::class, 'showOutletAgain']);
    Route::get('/delete-outlet/{id}', [OutletController::class, 'removeOutlet']);
    Route::post('/update-outlet', [OutletController::class, 'editOutlet']);
    Route::post('/add-more-outlet-image', [OutletController::class, 'addImage']);
    Route::get('/delete-image/{name}/{id}', [OutletController::class, 'removeImage']);

});







