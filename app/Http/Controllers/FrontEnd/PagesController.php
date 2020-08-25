<?php

namespace App\Http\Controllers\FrontEnd;
use App\Http\Controllers\Controller;
use App\Repositories\aboutUsRepository;
use Illuminate\Http\Request;
use App\Models\aboutUs;
use App\Models\product;
use App\Models\Cart;
use Session;

use Illuminate\Support\Facades\DB;


class PagesController extends Controller
{
    //
    function home()
    {
        $aboutus = aboutUs::all();
        // $newProduct = product::all()->sortByDesc('created_at')->take(4)->get();
        $newProduct = DB::table('products')
        ->orderBy('created_at', 'desc')
        ->take(4)->get();
        // var_dump($newProduct);exit;

        $topProduct = DB::table('products')
        ->where('products.price_promotion','!=','0')->paginate(8);
        // var_dump($topProduct);exit;

        return view('frontend.pages.home', compact('aboutus','newProduct', 'topProduct'));
    }
    function getCategory($category)
    {
        // $product_category = product::where('id_category', $category)->get();

        $product_category = DB::table('products')->select('products.id','products.name','products.price', 'products.price_promotion','products.image')
        ->join('categories', 'categories.id', '=','products.id_category')
        ->where('categories.id', '=', $category )->get();
        
        $categories = DB::table('categories')->get();
        // var_dump($categories);exit;


        // var_dump($product_category);exit;
        return view('frontend.pages.category', compact('product_category','categories'));
    }
    function getproductDetails(Request $request)
    {
        $productDetail = DB::table('products')->where('id','=',$request->id)->first();
        // var_dump($productDetail);exit;
        $relatedProducts = DB::table('products')->where('id_category','=',$productDetail->id_category)->paginate(3);

        $topProduct = DB::table('products')
        ->where('products.price_promotion','!=','0')->orderBy('created_at','desc')->take(4)->get();
        // var_dump($topProduct);exit;
        $newProduct = DB::table('products')
        ->orderBy('created_at', 'desc')
        ->take(4)->get();
        return view('frontend.pages.productDetails', compact('productDetail','relatedProducts', 'topProduct','newProduct'));
    }
    function getContact()
    {
        return view('frontend.pages.contact');
    }
    function getAboutus()
    {
        return view('frontend.pages.aboutus');
    }
    function getAddToCart(Request $request, $id){
        $product = Product::find($id);
        $oldCart = Session('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        $request->session()->put('cart',$cart);
        
        return redirect()->back();
    }

    function getDeleteItemInCart($id){
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items) > 0){
            Session::put('cart', $cart);
        }
        else 
        {
            Session::forget('cart');
        }
        return redirect()->back();
    }
}