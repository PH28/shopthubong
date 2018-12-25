<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Category;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('header',function($view){
            $category = Category::all();
            unset($category[0]); 
            $view->with('category',$category);
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
