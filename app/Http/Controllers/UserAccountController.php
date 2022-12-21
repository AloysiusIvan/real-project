<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use File;

class UserAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listuser()
    {
        $user = User::where('nik', '!=', 'admin')->where('validasi', 'wait')->get();
        $userac = User::where('nik', '!=', 'admin')->where('validasi', 'valid')->get();
        $userinac = User::where('nik', '!=', 'admin')->where('validasi', 'reject')->get();
        return view('admin/cmsuser', compact('user','userac','userinac'));
    }

    public function searchuser (Request $request){
        $user = User::where('nik', '!=', 'admin')->where('name','like','%'.$request->search.'%')->get();
        return view('admin/userdata')->with([
            'data' => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function regisuser(Request $request)
    {
        $countnik = User::where('nik',$request->nik)->count();
        $countem = User::where('email',$request->email)->count();
        $insertkeahlian = join(',',$request->keahlian);

        if($request->profesi == "other"){
            $profesi = $request->profesiother;
        } else {
            $profesi = $request->profesi;
        }
        if ($countnik == 0 && $countem == 0){
            $photo = $request->file('foto_ktp')->extension();
            $newPhoto = $request->nik.'.'.$photo;
            $request->file('foto_ktp')->storeAs('public/img/ktp/', $newPhoto);
            $user = User::create([
                'nik'=>$request->nik,
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'profesi'=>$profesi,
                'institusi'=>$request->institusi,
                'nama_institusi'=>$request->nama_institusi,
                'alamat'=>$request->alamat,
                'keahlian'=>$insertkeahlian,
                'foto_ktp'=>$newPhoto,
                'password'=>Hash::make('techno'),
                'validasi'=>'wait'
            ]);
            Alert::success('Data Tersimpan', 'Menunggu Validasi Admin')->showConfirmButton('OK', '#2c598d');
            return redirect()->intended('login');
        } else{
            Alert::error('Error', 'NIK atau Email sudah terdaftar')->showConfirmButton('OK', '#2c598d');
            return redirect()->intended('register');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showuser($id)
    {
        $userdata = User::where('id', $id)->get();
        return view('admin/detailuser', compact('userdata'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateuser($id)
    {
        $iduser = User::where('id', $id)->get();
        return view('updateuser', compact('iduser'));
    }

    public function edituser(request $request, $id)
    {
        $user = User::findorfail($id);
        $countnik = User::where('nik',$request->nik)->count();
        $countem = User::where('email',$request->email)->count();
        $insertkeahlian = join(',',$request->keahlian);

        if($request->profesi == "other"){
            $profesi = $request->profesiother;
        } else {
            $profesi = $request->profesi;
        }
        if ($countnik == 1 && $countem == 1){
            $photo = $request->file('foto_ktp')->extension();
            $newPhoto = $request->nik.'.'.$photo;
            if(File::exists("public/img/ktp/".$newPhoto)) {
                File::delete("public/img/ktp/".$newPhoto);
            }
            $request->file('foto_ktp')->storeAs('public/img/ktp/', $newPhoto);
            $user->update([
                'nik'=>$request->nik,
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'profesi'=>$profesi,
                'institusi'=>$request->institusi,
                'nama_institusi'=>$request->nama_institusi,
                'alamat'=>$request->alamat,
                'keahlian'=>$insertkeahlian,
                'foto_ktp'=>$newPhoto,
                'password'=>Hash::make('techno'),
                'validasi'=>'wait'
            ]);
            Alert::success('Data Tersimpan', 'Menunggu Validasi Admin')->showConfirmButton('OK', '#2c598d');
            return redirect()->intended('login');
        } else{
            Alert::error('Error', 'NIK atau Email sudah terdaftar')->showConfirmButton('OK', '#2c598d');
            return redirect()->intended('register');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function valid(request $request, $id)
    {
        $validate = User::findorfail($id);
        $validate->update(array('validasi' => 'valid'));
        Alert::toast('Success Validate', 'success');
        return redirect('cmsuser');
    }

    public function reject(request $request, $id)
    {
        $reject = User::findorfail($id);
        $reject->update(array('validasi' => 'reject'));
        Alert::toast('Success Reject', 'warning');
        return redirect('cmsuser');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
