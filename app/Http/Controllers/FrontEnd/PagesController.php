<?php

namespace App\Http\Controllers\FrontEnd;
use App\Http\Controllers\Controller;
use App\Repositories\aboutUsRepository;
use Illuminate\Http\Request;
use App\Models\aboutUs;
use App\Models\product;
use App\Models\Cart;
use App\Models\customer;
use App\Models\order;
use App\Models\orderDetail;
use App\Models\promotion;
use App\User;
use Illuminate\Support\Facades\Hash;

use Session;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;


class PagesController extends Controller
{
    //
    
    // public function __construct()
    // {
    //     $this->middleware(['auth', 'verified']);
    // }
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
        $request->session()->put('cart', $cart);
        
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

    function getOrder()
    {
        // $promotion = DB::table('promotions')->get();
        $promotion = promotion::all();
        // var_dump($promotion);exit;
        return view('frontend.pages.order', compact('promotion'));
    }
    function postOrder(Request $request){
        $cart = Session::get('cart');
        // dd($cart);exit;
        $customer = new  customer;
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phoneNumber = $request->phoneNumber;
        $customer->address = $request->address;
        $customer->note = $request->notes;
        $customer->save();
        
        $order = new Order;
        $order->id_customer = $customer->id;
        $order->dateOrder = date('Y-m-d');
        $order->amount = $cart->totalPrice;
        $order->id_promotion = $request->promotion;
        $order->save();

        // var_dump($cart->totalPrice);exit;
        foreach($cart->items as $key=>$value){
            $orderDetail = new orderDetail;
            $orderDetail->id_order = $order->id;
            $orderDetail->id_product = $key;
            $orderDetail->quantity = $value['quantity'];
            $orderDetail->price = ($value['price']/$value['quantity']);
            $orderDetail->save();
        }
        Session::forget('cart');

        return redirect()->back()->with('notification', 'Thank you for your order');
       
    }

    // function getLogin()
    // {
    //     return view('frontend.pages.login');
    // }

    // function postLogin(Request $request)
    // {
    //     $this->validate($request,
    //     [
    //         'email'=> 'required|email',
    //         'password'=> 'required|password'
    //     ],
    //     [
    //         'email.required'=>'Email is require!',
    //         'password.required'=>'Password is require!',
    //     ]);

    //     // $credentials = array('email'=>$request->email, 'password'=>$request->password);
    //     if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password]))
    //     {
    //         return redirect()->back()->with(['flag'=>'success', 'message'=>'Login Success']);
    //     }
    //     else
    //     {
    //         return redirect()->back()->with(['flag'=>'danger', 'message'=>'Email or password is incorrect']);
    //     }
    // }
    // function getSignup()
    // {
    //     return view('frontend.pages.signup');
    // }

    // function postSignup(Request $request){
    //     $this->validate($request,
    //     [
    //      'name'=>'required|min:3',
    //      'email'=>'required|unique:Users,email',
    //      'password'=>'required|min:8|max:32',
    //      'passwordConfirm'=>'required|same:password'
    //     ],
    //     [
    //         'name.required'=>'Name is require!',
    //         'name.min'=>'Name must be at least three characters long',
    //         'email.required'=>'Email is require!',
    //         'email.unique'=>'Email has existed',
    //         'password.required'=>'Password is require!',
    //         'password.min'=>'Password must be at least eight characters long',
    //         'password.max'=>'The largest length of the password is 32 characters',
    //         'passwordConfirm.required'=>'Password Confirm is required',
    //         'passwordConfirm.same'=>'Password Confirm is wrong!'
    //     ]);
    // $user= new User;
    // $user->name = $request->name;
    // $user->email = $request->email;
    // $user->phoneNumber = $request->phoneNumber;
    // $user->address = $request->address;
    // $user->password = Hash::make($request->password);
    // $user->save();
        
    // return redirect()->back()->with('notification', 'You have signed up successfully');
    // }


    function search(Request $request)
    {
        $product = DB::table('products')->where('name','like','%'.$request->key.'%')->orwhere('price','=',$request->key)->get();
        return view('frontend.pages.search', compact('product'));
    }

    function welcome()
    {
        return view('verify');
    }
}