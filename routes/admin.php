<?php

use Illuminate\Support\Facades\Route;

if (!file_exists(public_path('uploads'))) {

    mkdir(public_path('uploads'));
}

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

//* Comment
Route::prefix('comment')->group(function () {
    Route::get('/', 'Admin\CommentController@renderArchiveComment');

    Route::get('/{id}/delete', 'Admin\CommentController@deleteComment');

    Route::post('/{id}/delete', 'Admin\CommentController@deletePostComment');
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

    Route::get('/{id}/restore', 'Admin\ProductController@restoreProduct');
});

//* Project
Route::prefix('project')->group(function () {
    Route::get('/', function () {
        return redirect('/admin/project/all');
    });

    Route::get('/all', 'Admin\ProjectController@renderArchiveProject');

    Route::get('/new', 'Admin\ProjectController@renderNewProject');

    Route::post('/new', 'Admin\ProjectController@createProject');

    Route::get('/{id}', 'Admin\ProjectController@renderSingleProject');

    Route::get('/{id}/delete', 'Admin\ProjectController@deleteProject');

    Route::post('/{id}/update', 'Admin\ProjectController@updateProject');

    Route::get('/{id}/restore', 'Admin\ProjectController@restoreProject');
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

//* Company
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

//* Event
Route::prefix('event')->group(function () {
    Route::get('/', function () {
        return redirect('/admin/event/all');
    });

    Route::get('/all', 'Admin\EventController@renderArchiveEvent');

    Route::get('/new', 'Admin\EventController@renderNewEvent');

    Route::post('/new', 'Admin\EventController@createEvent');

    Route::get('/{id}', 'Admin\EventController@renderSingleEvent');

    Route::post('/{id}/update', 'Admin\EventController@updateEvent');

    Route::get('/{id}/disable', 'Admin\EventController@disableEvent');

    Route::get('/{id}/restore', 'Admin\EventController@restoreEvent');
});

//* Feedback
Route::prefix('feedback')->group(function () {
    Route::get('/', function () {
        return redirect('/admin/feedback/all');
    });

    Route::get('/all', 'Admin\FeedbackController@renderArchiveFeedback');

    Route::get('/{id}', 'Admin\FeedbackController@renderSingleFeedback');

    Route::get('/{id}/delete', 'Admin\FeedbackController@deleteFeedback');
});


//* Document
Route::prefix('document')->group(function () {
    Route::get('/', function () {
        return redirect('/admin/document/all');
    });

    Route::get('/all', 'Admin\DocumentController@renderArchiveDocument');

    Route::get('/{id}', 'Admin\DocumentController@renderSingleDocument');

    Route::get('/{id}/delete', 'Admin\DocumentController@deleteDocument');

    Route::get('/{id}/restore', 'Admin\DocumentController@restoreDocument');

    Route::get('/{id}/publish', 'Admin\DocumentController@publishDocument');
});
