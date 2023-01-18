<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/register', 'App\Http\Controllers\IController@register');

Route::get('login', 'App\Http\Controllers\IController@login');

Route::post('register-submit', 'App\Http\Controllers\IController@register_submit');
Route::post('login-submit', 'App\Http\Controllers\IController@login_account');
Route::get('alldisplay', 'App\Http\Controllers\IController@alldisplay');
Route::get('logout', 'App\Http\Controllers\IController@account_logout');
Route::get('addcar', 'App\Http\Controllers\IController@addcar');
Route::post('add-submit', 'App\Http\Controllers\IController@add_submit');
Route::get('fulldisplay/{id}', 'App\Http\Controllers\IController@carfulldetails');
Route::post('review-submit', 'App\Http\Controllers\IController@review_submit');
Route::post('search-submit', 'App\Http\Controllers\IController@search_submit');

Route::get('verify/{id}',  'App\Http\Controllers\IController@verifyemail');
Route::get('justlounched',  'App\Http\Controllers\IController@justlounched_cars');
Route::get('upcomings',  'App\Http\Controllers\IController@upcoming_cars');
