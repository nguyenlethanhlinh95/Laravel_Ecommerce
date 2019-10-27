<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;

class UserController extends Controller
{
    //
    public function index()
    {

    }
}


class UserDao
{
    public function boolCheckLogin()
    {
        try{
            if (Auth::check())
            {
                return true;
            }
            else
                return false;
        }
        catch (Exception $ex)
        {
            return false;
        }
    }
}
