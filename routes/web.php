<?php

use App\Http\Middleware\CheckAdmin;
use Illuminate\Support\Facades\Route;

Route::get('/home', 'Main\HomeController@renderHome');

Route::prefix('/catalog')->group(function () {
    Route::get('/all', 'Main\CategoryController@allItems');

    Route::get('/{id}', 'Main\CategoryController@cateItems');
});

Route::prefix('/blog')->group(function () {
    Route::get('/all', 'Main\CategoryController@allPosts');
    Route::get('/{id}', 'Main\CategoryController@catePosts');
});
Route::get('/post/{id}', 'Main\PostController@singlePost');

Route::prefix('/catalog')->group(function () {
    Route::get('/all', 'Main\CategoryController@allItems');
    Route::get('/{id}', 'Main\CategoryController@cateItems');
});
Route::get('/item/{id}', 'Main\ProductController@singleProduct');

Route::get('/company/{id}', 'Main\CompanyController@companyDetail');

Route::prefix('/user')->group(function () {
    Route::get('/profile', "UserController@userProfile")->middleware('auth');
    Route::post('/profile/update/{id}', "UserController@userProfileUpdate")->middleware("auth");;
    Route::post("/changePassword", "UserController@changePassword")->middleware("auth");;
});
Route::prefix('/contact')->group(function () {
    Route::get('/', 'Main\ContactController@contact');
    Route::post('/feedback', "Main\ContactController@contactFeedback");
});
Route::get('/about-us', 'Main\AboutUsController@aboutUs');

//* Post
Route::get('/post/{id}', 'Main\PostController@singlePost');
Route::post('/post/{id}/comment', 'Main\PostController@saveComment');

//* Auth
Auth::routes();
Route::get('logout', function () {
    Auth::logout();
    return redirect('/login');
});

Route::get('/', function () {
    return redirect("/home");
});
