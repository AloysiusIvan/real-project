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

/* Public */
Route::get('/', function () {
    return view('landingpage');
});
Route::get('/login',array('as'=>'login',function() {
    return view('login2');
}
));
Route::get('/admin', function () {
    return view('admin/loginadmin');
});
Route::get('/register', function () {
    return view('userregis');
});
Route::post('/loginuser', [UserLoginController::class,'loginuser'])->name('loginuser');
Route::post('/loginadmin', [UserLoginController::class,'loginadmin'])->name('loginadmin');
Route::post('/regisuser', [UserAccountController::class,'regisuser'])->name('regisuser');
Route::get('/logout', [UserLoginController::class,'logout'])->name('logout');
Route::post('/edituser/{id}', [UserAccountController::class,'edituser'])->name('edituser');

/* User */
Route::middleware(['user'])->group(function () {
    Route::get('/book', function () {
        return view('book');
    });
});

/* Admin */
Route::middleware(['admin'])->group(function () {
    Route::get('/cmsuser', [UserAccountController::class,'listuser'])->name('cmsuser');
    Route::get('/detailuser/{id}', [UserAccountController::class,'showuser'])->name('detailuser');
    Route::get('/validate/{id}', [UserAccountController::class,'valid'])->name('validate');
    Route::get('/reject/{id}', [UserAccountController::class,'reject'])->name('reject');
});

/* User Inactive */
Route::middleware(['userreject'])->group(function () {
    Route::get('/updatesuser/{id}', [UserAccountController::class,'updateuser'])->name('updateuser');
});