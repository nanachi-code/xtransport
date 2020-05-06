<?php

namespace App\Providers;

use App\Post;
use Facade\FlareClient\View;
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
        View::composer(['layout'], function ($view) {
            $p = [
                "latestPosts" => Post::take(3)->get()
            ];

            $view->with($p);
        });
    }
}
