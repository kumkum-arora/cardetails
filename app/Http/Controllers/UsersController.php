<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Events\SendRegisterMail;

class UsersController extends Controller
{
    public function register_Submit(Request $request)
    {
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

    public function login_Account(Request $request)
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
            return redirect('index');
        } else {
            return redirect('login')->withErrors('invalid details');
        }
    }

    public function account_Logout()
    {
        auth::logout();
        return redirect('login');
    }

    public function verifyEmail(Request $request, $id)
    {
        $verify = User::where('id', $id);
        $verify->update(['email_verified_at' => date('Y-m-d H:i:s')]);
        return redirect('http://localhost/projects/cardetails/public/login');
    }
}
