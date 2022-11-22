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
 
        if (Auth::attempt($credentials)) {
            return redirect()->intended('book');
        }else{
            Alert::error('NIK Belum Terdaftar', 'Silahkan Registrasi')->showConfirmButton('OK', '#2c598d');;
            return redirect()->intended('login');
        }
    }
}