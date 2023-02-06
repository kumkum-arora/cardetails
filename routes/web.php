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


Route::get('registration', [DisplayController::class, 'registration']);
Route::post('register-submit', [UsersController::class, 'register_Submit']);
Route::get('verify/{id}', [UsersController::class, 'verifyEmail']);

Route::get('login',[DisplayController::class, 'login_Page']);
Route::post('login-submit',[UsersController::class, 'login_Account']);
Route::get('logout',[UsersController::class, 'account_Logout'] );

Route::get('index', [DisplayController::class, 'index']);

Route::get('addcar', [DisplayController::class, 'addCar']);
Route::post('add-submit',[PostController::class, 'addCar_submit']);

Route::get('fulldisplay/{id}', [DisplayController::class, 'car_All_details']);

Route::post('review-submit', [PostController::class, 'review_Submit']);

Route::post('search-submit', [DisplayController::class, 'search_Cars']);

Route::get('justlounched', [DisplayController::class, 'justLounched_cars']);
Route::get('upcomings', [DisplayController::class, 'upcoming_Cars']);