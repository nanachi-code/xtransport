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
    return view('layout');
});

Route::prefix('/catalog')->group(function ()
{
    Route::get('/all','mainpage\CategoryController@allItems');

    Route::get('/{id}','mainpage\CategoryController@cateItems');
});

Route::prefix('/blogs')->group(function ()
{
    Route::get('/all','mainpage\CategoryController@allPosts');
    Route::get('/{id}','mainpage\CategoryController@catePosts');
});

Route::prefix('/user')->group(function ()
{
    Route::get('/profile', "UserController@userProfile")->middleware('auth');
    Route::post('/profile/update/{id}', "UserController@userProfileUpdate")->middleware("auth");;
    Route::post("/changePassword", "UserController@changePassword")->middleware("auth");;

});


Auth::routes();
Route::get('logout', function () {
    Auth::logout();
    return redirect('/login');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::group([
    'prefix' => 'admin',

], function () {

    Route::get('/', function () {
        return redirect('/admin/dashboard');
    });

    Route::get('/dashboard', 'Admin\DashboardController@renderDashboard');

    //* Category Post
    Route::prefix('category-post')->group(function () {
        Route::get('/', function () {
            return redirect('/admin/category-post/all');
        });

        Route::get('/all', 'Admin\CategoryPostController@renderArchiveCategory');

        Route::post('/new', 'Admin\CategoryPostController@createCategory');

        Route::get('/{id}', 'Admin\CategoryPostController@renderSingleCategory');

        Route::get('/{id}/delete', 'Admin\CategoryPostController@deleteCategory');

        Route::post('/{id}/update', 'Admin\CategoryPostController@updateCategory');
    });

    //* Category Product
    Route::prefix('category-product')->group(function () {
        Route::get('/', function () {
            return redirect('/admin/category-product/all');
        });

        Route::get('/all', 'Admin\CategoryProductController@renderArchiveCategory');

        Route::post('/new', 'Admin\CategoryProductController@createCategory');

        Route::get('/{id}', 'Admin\CategoryProductController@renderSingleCategory');

        Route::get('/{id}/delete', 'Admin\CategoryProductController@deleteCategory');

        Route::post('/{id}/update', 'Admin\CategoryProductController@updateCategory');
    });

    //* User
    Route::prefix('user')->group(function () {
        Route::get('/', function () {
            return redirect('/admin/user/all');
        });

        Route::get('/all', 'Admin\UserController@renderArchiveUser');

        Route::get('/new', 'Admin\UserController@renderNewUser');

        Route::post('/new', 'Admin\UserController@createUser');

        Route::get('/{id}', 'Admin\UserController@renderSingleUser');

        Route::post('/{id}/update', 'Admin\UserController@updateUser');

        Route::get('/{id}/disable', 'Admin\UserController@disableUser');

        Route::get('/{id}/restore', 'Admin\UserController@restoreUser');
    });

});
