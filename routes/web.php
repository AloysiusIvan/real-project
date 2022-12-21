<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\UserAccountController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\BookingController;

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
    Route::get('/home', function () {
        return view('book');
    });
    Route::get('/history', [BookingController::class,'history'])->name('history');
    Route::get('/book', [BookingController::class,'index'])->name('book');
    Route::get('/search', [BookingController::class,'search'])->name('search');
    Route::get('/booking', [BookingController::class,'booking'])->name('booking');
    Route::get('/bookinggroup', [BookingController::class,'bookinggroup'])->name('bookinggroup');
    Route::get('/cancelbook/{id}', [BookingController::class,'cancelbook'])->name('cancelbook');
});

/* Admin */
Route::middleware(['admin'])->group(function () {
    Route::get('/cmsuser', [UserAccountController::class,'listuser'])->name('cmsuser');
    Route::get('/detailuser/{id}', [UserAccountController::class,'showuser'])->name('detailuser');
    Route::get('/validate/{id}', [UserAccountController::class,'valid'])->name('validate');
    Route::get('/reject/{id}', [UserAccountController::class,'reject'])->name('reject');
    Route::get('/cmsroom', [RoomController::class,'listroom'])->name('cmsroom');
    Route::post('/addroom', [RoomController::class,'addroom'])->name('addroom');
    Route::get('/editroom/{id}', [RoomController::class,'showroom'])->name('editroom');
    Route::post('/updateroom/{id}', [RoomController::class,'updateroom'])->name('updateroom');
    Route::get('/deleteroom/{id}', [RoomController::class,'deleteroom'])->name('deleteroom');
    Route::get('/bookinglist', [BookingController::class,'bookinglist'])->name('bookinglist');
    Route::get('/dashboard', function () {
        return view('admin/dashboard');
    });
    Route::get('/searchuser', [UserAccountController::class,'searchuser'])->name('searchuser');
});

/* User Inactive */
Route::get('/updatesuser/{id}', [UserAccountController::class,'updateuser'])->name('updateuser');
