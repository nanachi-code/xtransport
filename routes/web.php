<?php

use App\Http\Middleware\CheckAdmin;
use Illuminate\Support\Facades\Route;

//* Homepage
Route::get('/', function () {
    return redirect("/home");
});

Route::get('/home', 'Main\HomeController@renderHome');

//* Library
Route::prefix('/library')->group(function () {
    Route::get('/', 'Main\LibraryController@archiveDocument');
    Route::get('/all', 'Main\LibraryController@allDocument');
    Route::get('/user', 'Main\LibraryController@userDocument')->middleware('auth');
    Route::get('/bookmark', 'Main\LibraryController@bookmarkDocument')->middleware('auth');
    Route::get('/add-bookmark/{id}', 'Main\LibraryController@addBookmark')->middleware('auth');
    Route::get('/un-bookmark/{id}', 'Main\LibraryController@unBookmark')->middleware('auth');
    Route::get('/detail/{id}', 'Main\LibraryController@detailDocument')->middleware('auth');
    Route::get('/new', 'Main\LibraryController@createDocument')->middleware('auth');
    Route::post('/new', 'Main\LibraryController@newDocument')->middleware('auth');
    Route::post('/rate', 'Main\LibraryController@rating')->middleware('auth');
    Route::get('/download/{id}', 'Main\LibraryController@downloadDocument')->middleware('auth');
});

//* Event
Route::prefix('/event')
    ->group(function () {
        Route::get('/', function () {
            return redirect('/event/all');
        });

        Route::get('/all', 'Main\EventController@renderArchiveEvent');

        Route::get('/detail/{id}', 'Main\EventController@renderSingleEvent');

        Route::post('/detail/{id}', 'Main\EventController@registerEvent');
    });

//* Product
Route::prefix('/product')
    ->group(function () {
        Route::get('/', function () {
            return redirect('/product/all');
        });

        Route::get('/all', 'Main\ProductController@renderArchiveProduct');

        Route::get('/detail/{id}', 'Main\ProductController@renderSingleProduct');
    });

//* Blog
Route::prefix('/blog')
    ->group(function () {
        Route::get('/', function () {
            return redirect("/blog/all");
        });

        Route::get('/all', 'Main\PostController@renderArchivePost');

        Route::get('/post/{id}', 'Main\PostController@renderSinglePost');

        Route::get('/{id?}', 'Main\PostController@renderArchivePost');

        Route::post('/post/{id}/comment', 'Main\PostController@saveComment');
    });


//* Company
Route::get('/company/{id}', 'Main\CompanyController@companyDetail');

Route::prefix('/user')
    ->group(function () {
        Route::get('/profile', "UserController@userProfile")->middleware('auth');
        Route::post('/profile/update/{id}', "UserController@userProfileUpdate")->middleware("auth");;
        Route::post("/changePassword", "UserController@changePassword")->middleware("auth");;
    });

Route::prefix('/contact')
    ->group(function () {
        Route::get('/', 'Main\ContactController@contact');
        Route::post('/feedback', "Main\ContactController@contactFeedback");
    });

Route::get('/about-us', 'Main\AboutUsController@aboutUs');

//* Auth
Auth::routes();
Route::get('logout', function () {
    Auth::logout();
    return redirect('/login');
});
