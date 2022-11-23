<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;

class UserAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $user = User::create([
            'nik'=>$request->nik,
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'profesi'=>$request->profesi,
            'institusi'=>$request->institusi,
            'nama_institusi'=>$request->nama_institusi,
            'alamat'=>$request->alamat,
            'keahlian'=>$request->keahlian,
            'foto_ktp'=>$request->foto_ktp,
            'password'=>Hash::make('techno'),
            'validasi'=>'wait'
        ]);
        Alert::success('Data Tersimpan', 'Menunggu Validasi Admin')->showConfirmButton('OK', '#2c598d');;
        return redirect()->intended('login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
