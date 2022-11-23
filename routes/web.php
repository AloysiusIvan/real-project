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

Route::get('/admin', function () {
    return view('admin/loginadmin');
});

Route::get('/detailuser', function () {
    return view('admin/detailuser');
});

Route::post('/loginuser', [UserLoginController::class,'loginuser'])->name('loginuser');
Route::post('/regisuser', [UserAccountController::class,'regisuser'])->name('regisuser');
Route::post('/loginadmin', [UserLoginController::class,'loginadmin'])->name('loginadmin');
Route::get('/cmsuser', [UserAccountController::class,'listuser'])->name('cmsuser');
Route::get('/detailuser/{id}', [UserAccountController::class,'showuser'])->name('detailuser');
Route::get('/validate/{id}', [UserAccountController::class,'valid'])->name('validate');