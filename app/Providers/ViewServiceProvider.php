<?php

namespace App\Providers;

use App\CategoryPost;
use App\Event;
use App\Post;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('main.subviews.header', function ($view) {
            $p = [
                "postCategory" => CategoryPost::all()
            ];
            $view->with($p);
        });
    }
}
