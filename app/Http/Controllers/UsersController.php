<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Events\SendRegisterMail;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;

class UsersController extends Controller
{    
    //for  add user details into the database and call event for sending mail to the user for account registered successfully
    public function register_Submit(RegisterRequest $request)
    {
        $userdetails =  User::create([
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        if (!is_null($userdetails)) {
            event(new SendRegisterMail($userdetails)); 
            return redirect("login");
        }
    }
   
    // Login account using auth
    public function login_Account(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('index');
        } else {
            return redirect('login')->withErrors('invalid details');
        }
    }
   
    // for logout account
    public function account_Logout()
    {
        auth::logout();
        return redirect('login');
    }
   
    // for verifying email
    public function verifyEmail(Request $request, $id)
    {
        $verify = User::where('id', $id);
        $verify->update(['email_verified_at' => date('Y-m-d H:i:s')]);
        return redirect('http://localhost/projects/cardetails/public/login');
    }
}
