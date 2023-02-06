<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Events\SendRegisterMail;

class UsersController extends Controller
{
    public function register_submit(Request $request)
    {
        // dd(Auth::id());
        $validate = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email',
            'username' => ['required', 'string', 'max:255', 'unique:users', 'alpha_dash'],
            'password' => 'required',
        ]);
        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }

        $userdetails =  User::create([
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        if (!is_null($userdetails)) {
            event(new SendRegisterMail($userdetails)); //Event dispatch here
            return redirect("login");
        }
    }

    public function login_account(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate->errors())->withInput();
        }
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('alldisplay');
        } else {
            return redirect('login')->withErrors('invalid details');
        }
    }

    public function account_logout()
    {
        auth::logout();
        return redirect('login');
    }
}
