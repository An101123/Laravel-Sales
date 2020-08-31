<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/welcome', 'FrontEnd\PagesController@welcome');

Route::get('/', 'FrontEnd\PagesController@home');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('manageUser');
// Route::get('/login', 'Auth\LoginController@login');
Route::get('/afterLogin',  'AfterLoginController@index');
Route::get('/logout', 'Auth\LoginController@logout');
Auth::routes(['verify' => true]);

Route::group(['prefix' => 'admin','middleware'=>['admin','verified'],'namespace'=>'Admin'],function(){
Route::get('/home', 'HomeController@index');

Route::resource('categories', 'categoryController');

Route::resource('products', 'productController');

Route::resource('customers', 'customerController');

Route::resource('promotions', 'promotionController');

Route::resource('orders', 'orderController');

Route::resource('orderDetails', 'orderDetailController');

Route::resource('aboutuses', 'aboutUsController');
});

//Client

// Route::get('shoesstore', 'FrontEnd\PagesController@home');
Route::get('shoesstore/categories/{category}', 'FrontEnd\PagesController@getCategory');
Route::get('shoesstore/productDetails/{id}', 'FrontEnd\PagesController@getproductDetails');
Route::get('shoesstore/contact', 'FrontEnd\PagesController@getContact');
Route::get('shoesstore/aboutus', 'FrontEnd\PagesController@getAboutus');

//Cart
Route::get('shoesstore/addToCart/{id}', 'FrontEnd\PagesController@getAddToCart');
Route::get('shoesstore/deleteCart/{id}', 'FrontEnd\PagesController@getDeleteItemInCart');

//Order
Route::get('shoesstore/order', 'FrontEnd\PagesController@getOrder');
Route::post('shoesstore/order', 'FrontEnd\PagesController@postOrder');

//Search
Route::get('shoesstore/search', 'FrontEnd\PagesController@search');

//login

// Route::get('/login', 'FrontEnd\PagesController@getLogin');
// Route::post('/login', 'FrontEnd\PagesController@postLogin');

// Route::get('shoesstore/signup', 'FrontEnd\PagesController@getSignup');
// Route::post('shoesstore/signup', 'FrontEnd\PagesController@postSignup');