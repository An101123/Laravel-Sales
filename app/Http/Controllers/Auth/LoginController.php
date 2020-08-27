<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;



class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    protected $redirectTo = '/afterLogin';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // public function login(Request $request) {
    //     $username = $request->username;
    //     $pass = $request->pass;

    //     $user = \DB::table("users")->selet("role")->where("username", $username)->andWhere()
    //     ->get();

    //     if($user->role == 1 ) {
    //         return $request->redirectPath();
    //     } eles {
    //         return redirect(router('/login'))
    //     }
    // }


    protected function credentials(Request $request)
    {
        return array_merge($request->only($this->username(), 'password'));
    }
    
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect('/shoesstore');
    }
}