<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Photo;
use RealRashid\SweetAlert\Facades\Alert;
use File;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listroom()
    {
        $room = Room::paginate(10);
        return view('admin/cmsroom', compact('room'));
    }

    public function showroom($id)
    {
        $roomdata = Room::where('id', $id)->get();
        $roomphoto = Photo::join('mst_room','photo_room.id_room','mst_room.id')->where('mst_room.id', $id)
            ->select('photo_room.*')->get();
        return view('admin/editroom', compact('roomdata','roomphoto'));
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
        $count = Room::where('room_name','like','%'.$request->room_name.'%')->count();
        if(!$count > 0){
            $newroom = Room::create([
                'room_name'=>$request->room_name,
                'kapasitas'=>$request->kapasitas,
                'status'=>"active",
                'photo'=>"null"
            ]);
            foreach($request->room_photo as $key => $value){
                $photo = $request->file('room_photo')[$key]->extension();
                $newPhoto = $newroom->id.$key.'_'.date_format($newroom->updated_at,"YmdHis").'.'.$photo;
                $request->file('room_photo')[$key]->storeAs('public/img/room/', $newPhoto);
                DB::table('photo_room')->insert([
                    'id_room'=>$newroom->id,
                    'photo'=>$newPhoto
                ]);
            }
            Alert::toast('Success Add Room', 'success');
        } else {
            Alert::toast('Ruangan sudah ada', 'error');
        }
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
        $count = Room::where('room_name',$request->room_name)->whereNotIn('id',[$id])->count();
        if ($count < 1){
            if (!empty($request->photo)){
                File::delete(storage_path("app/public/img/room/").$room->photo);
                $photo = $request->file('photo')->extension();
                $room->update([
                    'room_name'=>$request->room_name,
                    'kapasitas'=>$request->kapasitas,
                    'status'=>$request->stva,
                    'photo'=> "prepare"
                ]);
                $newPhoto = $room->id.'_'.date_format($room->updated_at,"YmdHis").'.'.$photo;
                $request->file('photo')->storeAs('public/img/room/',$newPhoto);
                $room->update(array('photo' => $newPhoto));
            } else{
                $room->update([
                    'room_name'=>$request->room_name,
                    'status'=>$request->stva,
                    'kapasitas'=>$request->kapasitas
                ]);
            }
            Alert::toast('Success Update', 'success');
            return redirect('cmsroom');
        } else {
            Alert::error('Error', 'Nama ruangan sudah ada')->showConfirmButton('OK', '#2c598d');;
            return back();
        }
    }

    public function editphoto(Request $request, $id){
        $currentTime = Carbon::now();
        $PhotoRoom = Photo::findorfail($id);
        $ext = $request->file('editphoto')->extension();
        $newPhoto = $PhotoRoom->id_room.'update_'.date_format($currentTime,"YmdHis").'.'.$ext;
        $request->file('editphoto')->storeAs('public/img/room/',$newPhoto);
        $PhotoRoom->update(array('photo' => $newPhoto));
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
