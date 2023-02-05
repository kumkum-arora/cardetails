<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DisplayController extends Controller
{
    public function registration()
    {
        return view('register');
    }

    public function login_Page()
    {
        return view('login');
    }
}
