<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\CustomAuthController;
use \App\Http\Middleware\AlreadyLoggedIn;
use \App\Http\Middleware\AuthCheck;

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

Route::get('/login' , [CustomAuthController::class, 'login'])->middleware('alreadyLoggedIn');
Route::get('/registration' , [CustomAuthController::class, 'registration'])->middleware('alreadyLoggedIn');
// registration route aditya
Route::post('/register-user', [CustomAuthController::class,'registerUser'])->name('register-user');
// login route aditya
Route::post('login-user', [CustomAuthController::class,'loginUser'])->name('login-user');
Route::get('/dashboard' , [CustomAuthController::class,'dashboard'])->middleware('isLoggedIn');
Route::get('/logout' , [CustomAuthController::class,'logout']);