<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Category;

class BlogServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->topMenu();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     *
     */
    public function topMenu()
    {
        View::composer('layouts.aside', function ($view) {
            $view->with('categories', Category::where('parent_id', 0)->where('published', 1)->get());
        });
    }


}
