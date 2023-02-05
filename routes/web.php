<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DisplayController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UsersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Routes for registration
Route::get('registration', [DisplayController::class, 'registration']);
Route::post('register-submit', [UsersController::class, 'register_submit']);

// display login page
Route::get('login',[DisplayController::class, 'login_Page']);
Route::post('login-submit',[UsersController::class, 'login_account']);
Route::get('logout',[UsersController::class, 'account_logout'] );

// for index page
Route::get('alldisplay', 'App\Http\Controllers\IController@alldisplay');

// for display add car form and submit
Route::get('addcar', 'App\Http\Controllers\IController@addcar');
Route::post('add-submit', 'App\Http\Controllers\IController@add_submit');

// showing clicked image on next page
Route::get('fulldisplay/{id}', 'App\Http\Controllers\IController@carfulldetails');

// post review
Route::post('review-submit', 'App\Http\Controllers\IController@review_submit');

// search car
Route::post('search-submit', 'App\Http\Controllers\IController@search_submit');

// verify email
Route::get('verify/{id}',  'App\Http\Controllers\IController@verifyemail');

// for lounched cars in this month
Route::get('justlounched',  'App\Http\Controllers\IController@justlounched_cars');

//for cars to be launched in next months
Route::get('upcomings',  'App\Http\Controllers\IController@upcoming_cars');