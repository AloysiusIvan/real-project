<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\UserAccountController;

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
    return view('landingpage');
});

Route::get('/login', function () {
    return view('login2');
});

Route::get('/book', function () {
    return view('book');
});

Route::get('/register', function () {
    return view('userregis');
});

Route::post('/loginuser', [UserLoginController::class,'loginuser'])->name('loginuser');
Route::post('/regisuser', [UserAccountController::class,'regisuser'])->name('regisuser');