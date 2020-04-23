<?php

use App\Http\Middleware\CheckAdmin;
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

Route::prefix('/catalog')->group(function () {
    Route::get('/all', 'Main\CategoryController@allItems');

    Route::get('/{id}', 'Main\CategoryController@cateItems');
});

Route::prefix('/blogs')->group(function () {
    Route::get('/all', 'Main\CategoryController@allPosts');
    Route::get('/{id}', 'Main\CategoryController@catePosts');
});

Route::prefix('/user')->group(function () {
    Route::get('/profile', "UserController@userProfile")->middleware('auth');
    Route::post('/profile/update/{id}', "UserController@userProfileUpdate")->middleware("auth");;
    Route::post("/changePassword", "UserController@changePassword")->middleware("auth");;
});
Route::prefix('/contact')->group(function () {
    Route::get('/', 'Main\ContactController@contact');
    Route::post('/feedback', "Main\ContactController@contactFeedback");
});


Auth::routes();
Route::get('logout', function () {
    Auth::logout();
    return redirect('/login');
});

Route::get('/home', 'HomeController@index')->name('home');

//* Admin
Route::group([
    'prefix' => 'admin',
    'middleware' => ['auth', CheckAdmin::class]
], function () {
    //* Dashboard
    Route::get('/', function () {
        return redirect('/admin/dashboard');
    });

    Route::get('/dashboard', 'Admin\DashboardController@renderDashboard');

    //* Gallery
    Route::get('/gallery', 'Admin\GalleryController@renderGallery');
    Route::get('/gallery/delete/{attachmentName}', 'Admin\GalleryController@deleteAttachment');
    Route::post('/gallery/upload', 'Admin\GalleryController@uploadAttachment');

    //* Post
    Route::prefix('post')->group(function () {
        Route::get('/', function () {
            return redirect('/admin/post/all');
        });

        Route::get('/all', 'Admin\PostController@renderArchivePost');

        Route::get('/new', 'Admin\PostController@renderNewPost');

        Route::post('/new', 'Admin\PostController@createPost');

        Route::get('/{id}', 'Admin\PostController@renderSinglePost');

        Route::post('/{id}/update', 'Admin\PostController@updatePost');

        Route::get('/{id}/delete', 'Admin\PostController@deletePost');

        Route::get('/{id}/restore', 'Admin\PostController@restorePost');
    });

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

    //* Product
    Route::prefix('product')->group(function () {
        Route::get('/', function () {
            return redirect('/admin/product/all');
        });

        Route::get('/all', 'Admin\ProductController@renderArchiveProduct');

        Route::get('/new', 'Admin\ProductController@renderNewProduct');

        Route::post('/new', 'Admin\ProductController@createProduct');

        Route::get('/{id}', 'Admin\ProductController@renderSingleProduct');

        Route::get('/{id}/delete', 'Admin\ProductController@deleteProduct');

        Route::post('/{id}/update', 'Admin\ProductController@updateProduct');

        Route::post('/{id}/restore', 'Admin\ProductController@restoreProduct');
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

    // Company
    Route::prefix('company')->group(function () {
        Route::get('/', function () {
            return redirect('/admin/company/all');
        });

        Route::get('/all', 'Admin\CompanyController@renderArchiveCompany');

        Route::get('/new', 'Admin\CompanyController@renderNewCompany');

        Route::post('/new', 'Admin\CompanyController@createCompany');

        Route::get('/{id}', 'Admin\CompanyController@renderSingleCompany');

        Route::post('/{id}/update', 'Admin\CompanyController@updateCompany');

        Route::get('/{id}/disable', 'Admin\CompanyController@disableCompany');

        Route::get('/{id}/restore', 'Admin\CompanyController@restoreCompany');
    });
    //* Feedback Post
    Route::prefix('feedback')->group(function () {
        Route::get('/', function () {
            return redirect('/admin/feedback/all');
        });

        Route::get('/all', 'Admin\ContactFeedbackController@renderArchiveFeedback');

        Route::get('/{id}', 'Admin\ContactFeedbackController@renderSingleFeedback');

        Route::get('/{id}/delete', 'Admin\ContactFeedbackController@deleteFeedback');
    });
});
