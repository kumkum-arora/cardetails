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

// Routes for Registration
Route::get('registration', [DisplayController::class, 'registration']);
Route::post('register-submit', [UsersController::class, 'register_Submit']);
Route::get('verify/{id}', [UsersController::class, 'verifyEmail']);

// Login Routes
Route::get('login',[DisplayController::class, 'login_Page']);
Route::post('login-submit',[UsersController::class, 'login_Account']);
Route::get('logout',[UsersController::class, 'account_Logout'] );

// Route for displaying Index page
Route::get('index', [DisplayController::class, 'index']);

// For display and Submit add car Form
Route::get('addcar', [DisplayController::class, 'addCar']);
Route::post('add-submit',[PostController::class, 'addCar_submit']);

// Displaying Data of the selected Car blog
Route::get('fulldisplay/{id}', [DisplayController::class, 'car_All_details']);

// for submit the review
Route::post('review-submit', [PostController::class, 'review_Submit']);

// for search a car
Route::post('search-submit', [DisplayController::class, 'search_Cars']);

//  for displaying cars which is justlounched
Route::get('justlounched', [DisplayController::class, 'justLounched_cars']);

//  for displaying cars to be lounched in next months
Route::get('upcomings', [DisplayController::class, 'upcoming_Cars']);