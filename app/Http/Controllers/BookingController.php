<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Room;
use App\Models\Capacity;
use Illuminate\Support\Facades\DB;
Use \Carbon\Carbon;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roombook = Room::all();
        return view('booking', compact('roombook'));
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
    public function booking(Request $request)
    {
        $dahbooking = Booking::where('id_user',auth()->user()->id)->where('tanggal',$request->tgl)->count();
        $mincap = Capacity::where('id_room',$request->id_room)->where('tanggal',$request->tgl)->count();
        $capas = DB::table('mst_room')->where('id',$request->id_room)->value('kapasitas');
        $cap = $capas-1;
        if ($dahbooking == 0){
            if ($mincap == 0){
                $kode_booking = "VT".auth()->user()->id.$request->id_room.str_replace("-", "", $request->tgl);
                Booking::create([
                    'id_user'=>auth()->user()->id,
                    'id_room'=>$request->id_room,
                    'tanggal'=>$request->tgl,
                    'keperluan'=>$request->keperluan,
                    'kode_booking'=>$kode_booking,
                ]);
                Capacity::create([
                    'id_room' => $request->id_room,
                    'tanggal' => $request->tgl,
                    'kapasitas' => $cap
                ]);
            } else {
                $sisa = DB::table('tmp_room_capacity')->where('id_room',$request->id_room)->where('tanggal',$request->tgl)
                    ->value('kapasitas');
                $kode_booking = "VT".auth()->user()->id.$request->id_room.str_replace("-", "", $request->tgl);
                Booking::create([
                    'id_user'=>auth()->user()->id,
                    'id_room'=>$request->id_room,
                    'tanggal'=>$request->tgl,
                    'keperluan'=>$request->keperluan,
                    'kode_booking'=>$kode_booking,
                ]);
                DB::table('tmp_room_capacity')->where('id_room',$request->id_room)->where('tanggal',$request->tgl)
                    ->update(array('kapasitas' => $sisa-1));
            }
            return $kode_booking;
        } else {
            return 'fail'; 
        }
    }

    public function search(Request $request)
    {
        $tgl = $request->tgl;
        $keperluan = $request->keperluan;
        $count = Capacity::where('tanggal',$tgl)->count();
        if ($count == 0){
            $roomavail = Room::all();
        } else{
                $roomavail = Room::select('mst_room.*','tmp_room_capacity.kapasitas as cap','tmp_room_capacity.tanggal as tgl')
                    ->leftJoin('tmp_room_capacity', function($leftJoin)use($tgl){
                    $leftJoin->on('mst_room.id', '=', 'tmp_room_capacity.id_room');
                    $leftJoin->on(DB::raw('tmp_room_capacity.tanggal'),DB::raw("'".$tgl."'"));
                })->get();
            /* $roomavail = Room::all(); */
        }
        return view('roomsearch',compact('roomavail','keperluan','tgl'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function history()
    {
        $history = Booking::join('mst_room','trn_booking.id_room','mst_room.id')->where('id_user',auth()->user()->id)
            ->select('trn_booking.*','mst_room.room_name')->get();
        return view('history',compact('history'));
    }

    public function bookinglist()
    {
        $bookinglist = Booking::join('users','trn_booking.id_user','users.id')
            ->join('mst_room','trn_booking.id_room','mst_room.id')
            ->select('trn_booking.*','users.name','mst_room.room_name')->get();
        return view('admin/bookinglist',compact('bookinglist'));
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
