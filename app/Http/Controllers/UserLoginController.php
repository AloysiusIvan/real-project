<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;

class UserLoginController extends Controller
{
    public function loginuser(Request $request)
    {
        $credentials = $request->only('nik','password');
        $iduser = User::where('nik', $request->nik)->get('id');
        $reject = User::where('nik', $request->nik)->value('reason_reject');
 
        if (Auth::attempt($credentials) && Auth::user()->validasi == "valid") {
            return redirect()->intended('home');
        }elseif (Auth::attempt($credentials) && Auth::user()->validasi == "wait"){
            Alert::info('Proses Validasi', 'Menunggu Validasi Admin')->showConfirmButton('OK', '#2c598d');
            return redirect()->intended('login');
        }elseif (Auth::attempt($credentials) && Auth::user()->validasi == "reject"){
            Alert::warning('Data Tidak Valid', $reject)->showConfirmButton('Update Data', '#2c598d')->showCancelButton('Cancel');
            return view('login', compact('iduser'));
        }elseif (Auth::attempt($credentials) && Auth::user()->validasi == "suspend"){
            Alert::warning('Akun Anda di Suspend', $reject)->showConfirmButton('OK', '#2c598d');
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
            return redirect()->intended('dashboard');
        }else{
            Alert::error('Error', 'Try Again')->showConfirmButton('OK', '#2c598d');
            return redirect()->intended('admin');
        }
    }

    public function logout(Request $request){
        if (Auth::user()->validasi == "admin"){
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/admin');
        } else {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/login');
        }
    }
}