<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/user/profile', "UserController@userProfile")->middleware('auth');
Route::post('user/profile/update/{id}', "UserController@userProfileUpdate")->middleware("auth");;
Route::post("changePassword", "UserController@changePassword")->middleware("auth");;


Auth::routes();
Route::get('logout', function () {
    Auth::logout();
    return redirect('/login');
});

Route::get('/home', 'HomeController@index')->name('home');
