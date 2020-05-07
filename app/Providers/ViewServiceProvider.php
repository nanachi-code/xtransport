<?php

namespace App\Providers;

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
        View::composer('subviews.sidebar', function ($view) {
            $p = [
                "latestPosts" => Post::take(3)->get(),
                "latestEvents" => Event::take(3)->get(),
            ];
            $view->with($p);
        });
    }
}
