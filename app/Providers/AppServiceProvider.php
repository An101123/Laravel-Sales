<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\category;
use App\Models\Cart;
use Session;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer('frontend.layouts.header',function($view){
            $category = category::all();
            $view->with('category',$category);
        });
        view()->composer('frontend.layouts.header', function($view){
            if(Session('cart')){
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
            $view->with(['cart'=>Session::get('cart'), 'product_cart'=>$cart->items, 'totalPrice'=>$cart->totalPrice, 'totalQuantity'=>$cart->totalQuantity]);
            }

        });
    }
}