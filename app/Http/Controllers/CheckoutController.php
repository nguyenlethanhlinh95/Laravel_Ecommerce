<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\userDao;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    //
    public function index()
    {

        if (Auth::check()){
            return view('front.cart.checkout');
        }
        else
        {
            Session::put('checkout', true);
            return redirect()->route('login');
        }
    }
}
