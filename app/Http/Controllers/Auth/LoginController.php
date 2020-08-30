<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;


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



    public function login(Request $request) {
        $user_login = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::attempt($user_login)) {
            $user = \DB::table('users')->select('role')
            ->where([
                ['email', $request->email],
                // ['del_flg', \Config::get('constants.DEL_FLG_0')],
                ['email_verified_at', '<>', '']
            ])->first();

            if ($user) {
                $request->session()->put('users', $user_login);
                if ($user->role == '1') {
                    // User : return screen register schedule
                    return redirect('/home');
                } else {
                    return redirect('/shoesstore');
                }
            } else {
                return redirect('/login');
            }
        }
    }


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