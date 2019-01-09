<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Category;
use App\Cart;
use Session;
use App\User;
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
        view()->composer('header', function($view){
            if(Session('cart')){ // kiem tra trong session xem gio hang co ton tai....
               $oldCart =Session::get('cart');
                $cart = new Cart($oldCart); // compact cart qua view
                $view->with(['cart'=>Session::get('cart'), 'product_cart'=>$cart->items, 'totalPrice'=>$cart->totalPrice, 'totalQty'=>$cart->totalQty]);
            }
        });
        view()->composer('user.partials.header',function($view){
            $categories = Category::where('parent_id','0')->get();
            unset($categories[0]); 
            $view->with('categories',$categories);
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
