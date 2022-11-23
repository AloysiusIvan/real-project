<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class UserLoginController extends Controller
{
    public function loginuser(Request $request)
    {
        $credentials = $request->only('nik','password');
 
        if (Auth::attempt($credentials) && Auth::user()->validasi == "valid") {
            return redirect()->intended('book');
        }elseif (Auth::attempt($credentials) && Auth::user()->validasi == "wait"){
            Alert::info('Proses Validasi', 'Menunggu Validasi Admin')->showConfirmButton('OK', '#2c598d');
            return redirect()->intended('login');
        }elseif (Auth::attempt($credentials) && Auth::user()->validasi == "notvalid"){
            Alert::warning('Data Tidak Valid', 'Silahkan melengkapi data anda')->showConfirmButton('OK', '#2c598d');
            return redirect()->intended('login');
        }else{
            Alert::error('NIK Belum Terdaftar', 'Silahkan Registrasi')->showConfirmButton('OK', '#2c598d');
            return redirect()->intended('login');
        }
    }

    public function loginadmin(Request $request)
    {
        $credentials = $request->only('nik','password');
 
        if (Auth::attempt($credentials)) {
            return redirect()->intended('cmsuser');
        }else{
            Alert::error('Error', 'Try Again')->showConfirmButton('OK', '#2c598d');
            return redirect()->intended('admin');
        }
    }
}