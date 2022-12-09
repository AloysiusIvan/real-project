<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use RealRashid\SweetAlert\Facades\Alert;
use File;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listroom()
    {
        $room = Room::all();
        return view('admin/cmsroom', compact('room'));
    }

    public function showroom($id)
    {
        $roomdata = Room::where('id', $id)->get();
        return view('admin/editroom', compact('roomdata'));
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
    public function addroom(Request $request)
    {
        $newroom = Room::create([
            'room_name'=>$request->room_name,
            'kapasitas'=>$request->kapasitas,
            'status'=>"active",
            'photo'=>"null"
        ]);
        $photo = $request->file('room_photo')->extension();
        $newPhoto = $newroom->id.'.'.$photo;
        $request->file('room_photo')->storeAs('public/img/room/', $newPhoto);
        $addphoto = Room::findorfail($newroom->id);
        $addphoto->update(array('photo' => $newPhoto));
        Alert::toast('Success Add Room', 'success');
        return redirect('cmsroom');
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
    public function updateroom(Request $request, $id)
    {
        $room = Room::findorfail($id);
        if (!empty($request->photo)){
            $photo = $request->file('photo')->extension();
            $newPhoto = $room->id.'.'.$photo;
            if(File::exists("public/img/room/".$newPhoto)) {
                File::delete("public/img/room/".$newPhoto);
            }
            $request->file('photo')->storeAs('public/img/room/', $newPhoto);
            $room->update([
                'room_name'=>$request->room_name,
                'kapasitas'=>$request->kapasitas,
                'status'=>$request->stva,
                'photo'=>$newPhoto
            ]);
        } else{
            $room->update([
                'room_name'=>$request->room_name,
                'status'=>$request->stva,
                'kapasitas'=>$request->kapasitas
            ]);
        }
        Alert::toast('Success Update', 'success');
        return redirect('cmsroom');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteroom($id)
    {
        $room = Room::findorfail($id);
        $room->delete();
        Alert::toast('Success Delete', 'success');
        return back();
    }
}
