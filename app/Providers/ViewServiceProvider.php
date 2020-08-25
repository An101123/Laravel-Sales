<?php

namespace App\Providers;
use App\Models\Order;
use App\Models\Product;
use App\Models\Promotion;
use App\Models\Customer;
use App\Models\Category;

use Illuminate\Support\ServiceProvider;
use View;

class ViewServiceProvider extends ServiceProvider
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
        View::composer(['order_details.fields'], function ($view) {
            $orderItems = Order::pluck('id')->toArray();
            $view->with('orderItems', $orderItems);
        });
        View::composer(['order_details.fields'], function ($view) {
            $productItems = Product::pluck('name','id')->toArray();
            $view->with('productItems', $productItems);
        });
        View::composer(['orders.fields'], function ($view) {
            $promotionItems = Promotion::pluck('title','id')->toArray();
            $view->with('promotionItems', $promotionItems);
        });
        View::composer(['orders.fields'], function ($view) {
            $customerItems = Customer::pluck('name','id')->toArray();
            $view->with('customerItems', $customerItems);
        });
        View::composer(['products.fields'], function ($view) {
            $categoryItems = Category::pluck('name','id')->toArray();
            $view->with('categoryItems', $categoryItems);
        });
        //
    }
}