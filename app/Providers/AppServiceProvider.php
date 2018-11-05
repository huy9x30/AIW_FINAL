<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Article;
use App\Category;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.master', function($view)
                    {
                            $view->with('time', Carbon::now()->format('l, jS \\of F Y h:i:s A'))
                                ->with('categories', Category::all())
                                ->with('userCount', rand(10, 1000))
                                ->with('latestNews', Article::orderBy('date_posted')->limit(5)->get());                       
                    });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
