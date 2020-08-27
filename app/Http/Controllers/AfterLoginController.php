<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AfterLoginController extends Controller
{
    //
    public function index()
    {
        if(Auth::user()->role==1){
            return redirect('/home');
        }else{
            return redirect('/shoesstore');
        }
    }
}