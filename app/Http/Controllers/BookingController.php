<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Room;
use App\Models\Capacity;
use Illuminate\Support\Facades\DB;
Use \Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use DateTime;

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
        $jam_mulai = new DateTime($request->jam_mulai);
        $jam_selesai = new DateTime($request->jam_selesai);
        $dahbooking = Booking::where('id_user',auth()->user()->id)->where('tanggal',$request->tgl)->count();
        $mincap = Capacity::where('id_room',$request->id_room)->where('tanggal',$request->tgl)->count();
        $capas = DB::table('mst_room')->where('id',$request->id_room)->value('kapasitas');
        $cap = $capas-1;
        if ($dahbooking == 0){
            if ($mincap == 0){
                $kode_booking = "VT".auth()->user()->id."-".$request->id_room."-".$request->tgl;
                Booking::create([
                    'id_user'=>auth()->user()->id,
                    'id_room'=>$request->id_room,
                    'tanggal'=>$request->tgl,
                    'keperluan'=>$request->keperluan,
                    'kode_booking'=>$kode_booking,
                    'jam_mulai'=>$request->jam_mulai,
                    'jam_selesai'=>$request->jam_selesai
                ]);
                $hour = 8;
                for ($i=0;$i<=8;$i++){
                    if ($request->jam_selesai >= str_pad($hour+$i, 2, "0", STR_PAD_LEFT).":00:00" && $request->jam_mulai <= str_pad($hour+$i, 2, "0", STR_PAD_LEFT).":00:00"){
                        Capacity::create([
                            'id_room' => $request->id_room,
                            'tanggal' => $request->tgl,
                            'jam_mulai'=>"0".$hour+$i.":00:00",
                            'kapasitas' => $cap
                        ]);
                    } else{
                        Capacity::create([
                            'id_room' => $request->id_room,
                            'tanggal' => $request->tgl,
                            'jam_mulai'=>"0".$hour+$i.":00:00",
                            'kapasitas' => $capas
                        ]);
                    }
                }
            } else {
                $kode_booking = "VT".auth()->user()->id."-".$request->id_room."-".$request->tgl;
                Booking::create([
                    'id_user'=>auth()->user()->id,
                    'id_room'=>$request->id_room,
                    'tanggal'=>$request->tgl,
                    'keperluan'=>$request->keperluan,
                    'jam_mulai'=>$request->jam_mulai,
                    'jam_selesai'=>$request->jam_selesai,
                    'kode_booking'=>$kode_booking,
                ]);
                $countupdate = DB::table('tmp_room_capacity')->where('id_room', $request->id_room)
                    ->where('tanggal', $request->tgl)
                    ->whereBetween('tmp_room_capacity.jam_mulai', [$jam_mulai, $jam_selesai])
                    ->count();
                $timetostr = $jam_mulai->format('H:i:s');
                $hour = date('H', strtotime($timetostr));
                for ($i = 0; $i <= $countupdate-1; $i++) {
                    $sisa = DB::table('tmp_room_capacity')->where('id_room', $request->id_room)
                        ->where('tanggal', $request->tgl)
                        ->where('tmp_room_capacity.jam_mulai', '=', str_pad($hour + $i, 2, "0", STR_PAD_LEFT) . ":00:00")
                        ->value('kapasitas');
                    DB::table('tmp_room_capacity')->where('id_room', $request->id_room)
                        ->where('tanggal', $request->tgl)
                        ->where('jam_mulai', '=', str_pad($hour + $i, 2, "0", STR_PAD_LEFT) . ":00:00")
                        ->update(['kapasitas' => $sisa - 1]);
                }
            }
            return $kode_booking;
        } else {
            return 'fail'; 
        }
    }

    public function bookinggroup(Request $request){
        $jam_mulai = new DateTime($request->jam_mulai);
        $jam_selesai = new DateTime($request->jam_selesai);
        $x = 0;
        $y = 0;
        $suspend = 0;
        foreach($request->nikgroup as $key => $value) {
            $id = DB::table('users')->where('nik',$request->nikgroup[$key])->value('id');
            $regval = DB::table('users')->where('nik',$request->nikgroup[$key])->where('validasi','valid')->count();
            if ($regval == 1){
                $y++;
            }
        }
        foreach($request->nikgroup as $key => $value) {
            $id = DB::table('users')->where('nik',$request->nikgroup[$key])->value('id');
            $sus = DB::table('users')->where('nik',$request->nikgroup[$key])->where('validasi','suspend')->count();
            if ($sus == 1){
                $suspend++;
            }
        }
        foreach($request->nikgroup as $key => $value) {
            $id = DB::table('users')->where('nik',$request->nikgroup[$key])->value('id');
            $dahbooking = Booking::where('id_user',$id)->where('tanggal',$request->tgl)->count();
            if ($dahbooking > 0){
                $x++;
            }
        }
        $mincap = Capacity::where('id_room',$request->id_room)->where('tanggal',$request->tgl)->count();
        $capas = DB::table('mst_room')->where('id',$request->id_room)->value('kapasitas');
        $cap = $capas-sizeof($request->nikgroup);
        if (count($request->nikgroup) == count(array_unique($request->nikgroup))){
            if ($y == sizeof($request->nikgroup)){
                if ($x == 0){
                    foreach($request->nikgroup as $key => $value) {
                        $id = DB::table('users')->where('nik',$request->nikgroup[$key])->value('id');
                        $kode_booking = "GVT".auth()->user()->id."-".$request->id_room."-".$request->tgl;
                        Booking::create([
                            'id_user'=>$id,
                            'id_room'=>$request->id_room,
                            'tanggal'=>$request->tgl,
                            'jam_mulai'=>$request->jam_mulai,
                            'jam_selesai'=>$request->jam_selesai,
                            'keperluan'=>$request->keperluan,
                            'kode_booking'=>$kode_booking,
                        ]);
                    }
                    if($mincap == 0){
                        $hour = 8;
                        for ($i=0;$i<=8;$i++){
                            if ($request->jam_selesai >= str_pad($hour+$i, 2, "0", STR_PAD_LEFT).":00:00" && $request->jam_mulai <= str_pad($hour+$i, 2, "0", STR_PAD_LEFT).":00:00"){
                                Capacity::create([
                                    'id_room' => $request->id_room,
                                    'tanggal' => $request->tgl,
                                    'jam_mulai'=>"0".$hour+$i.":00:00",
                                    'kapasitas' => $cap
                                ]);
                            } else{
                                Capacity::create([
                                    'id_room' => $request->id_room,
                                    'tanggal' => $request->tgl,
                                    'jam_mulai'=>"0".$hour+$i.":00:00",
                                    'kapasitas' => $capas
                                ]);
                            }
                        }
                    } else {
                        $countupdate = DB::table('tmp_room_capacity')->where('id_room', $request->id_room)
                            ->where('tanggal', $request->tgl)
                            ->whereBetween('tmp_room_capacity.jam_mulai', [$jam_mulai, $jam_selesai])
                            ->count();
                        $timetostr = $jam_mulai->format('H:i:s');
                        $hour = date('H', strtotime($timetostr));
                        for ($i = 0; $i <= $countupdate-1; $i++) {
                            $sisa = DB::table('tmp_room_capacity')->where('id_room', $request->id_room)
                                ->where('tanggal', $request->tgl)
                                ->where('tmp_room_capacity.jam_mulai', '=', str_pad($hour + $i, 2, "0", STR_PAD_LEFT) . ":00:00")
                                ->value('kapasitas');
                            DB::table('tmp_room_capacity')->where('id_room', $request->id_room)
                                ->where('tanggal', $request->tgl)
                                ->where('jam_mulai', '=', str_pad($hour + $i, 2, "0", STR_PAD_LEFT) . ":00:00")
                                ->update(['kapasitas' => $sisa - sizeof($request->nikgroup)]);
                        }
                    }
                    return 'Reservasi Berhasil!';
                } else {
                    return 'already book';
                }
            } else {
                if($suspend > 0){
                    return 'suspended';
                } else{
                    return 'not found nik';
                }
            }
        } else {
            return 'duplicate';
        }
    }

    public function search(Request $request)
    {
        $tgl = $request->tgl;
        $jam_mulai = new DateTime($request->jam_mulai);
        $jam_selesai = new DateTime($request->jam_selesai);
        $count = Capacity::where('tanggal',$tgl)->where('jam_mulai', '>=', $jam_mulai)
            ->where('jam_mulai', '<=', $jam_selesai)->count();
        if ($count == 0){
            $roomavail = Room::where('status','active')->get();
        } else{
                $roomavail = Room::select('mst_room.*','tmp_room_capacity.kapasitas as cap','tmp_room_capacity.tanggal as tgl')
                    ->leftJoin('tmp_room_capacity', function($leftJoin)use($tgl, $jam_mulai, $jam_selesai){
                        $leftJoin->on('mst_room.id', '=', 'tmp_room_capacity.id_room');
                        $leftJoin->on(DB::raw('tmp_room_capacity.tanggal'),DB::raw("'".$tgl."'"));
                        $leftJoin->whereBetween('tmp_room_capacity.jam_mulai',[$jam_mulai,$jam_selesai]);
                    })->where('status','active')->get();
        }
        $filteredArray = [];
        $smallestKapasitas = [];
        foreach ($roomavail as $item) {
            $id = $item['id'];
            $kapasitas = $item['cap'];

            if (!isset($smallestKapasitas[$id]) || $kapasitas < $smallestKapasitas[$id]) {
                $filteredArray[$id] = $item;
                $smallestKapasitas[$id] = $kapasitas;
            }
        }
        $filteredArray = array_values($filteredArray);
        usort($filteredArray, function ($a, $b) {
            return $b['cap'] - $a['cap'];
        });
        return view('room')->with([
            'data' => $filteredArray
        ]);
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
            ->where(function ($query) {
                $query->whereDate('trn_booking.tanggal', '>', Carbon::today())
                    ->orWhere(function ($query) {
                        $query->whereDate('trn_booking.tanggal', Carbon::today())
                                ->whereTime('trn_booking.jam_selesai', '>=', Carbon::now()->format('H:i:s'));
                    })
                    ->orWhere(function ($query) {
                        $query->whereDate('trn_booking.tanggal', Carbon::today())
                                ->where('trn_booking.status','present')
                                ->whereTime('trn_booking.jam_selesai', '<=', Carbon::now()->format('H:i:s'));
                    });
            })->select('trn_booking.*','mst_room.room_name')->get();
        $historydone = Booking::join('mst_room','trn_booking.id_room','mst_room.id')->where('id_user',auth()->user()->id)
            ->where('trn_booking.status','checkout')
            ->select('trn_booking.*','mst_room.room_name')->get();
        $historyexp = Booking::join('mst_room','trn_booking.id_room','mst_room.id')->where('id_user',auth()->user()->id)
            ->where(function ($query) {
                $query->whereDate('trn_booking.tanggal', '<', Carbon::today())
                    ->orWhere(function ($query) {
                        $query->whereDate('trn_booking.tanggal', Carbon::today())
                            ->whereTime('trn_booking.jam_selesai', '<', Carbon::now()->format('H:i:s'));
                    });
        })->where('trn_booking.status',null)->orWhere('trn_booking.status','expired')->select('trn_booking.*','mst_room.room_name')->get();
        $empty = Booking::where('id_user',auth()->user()->id)->count();
        return view('history',compact('history','historyexp','historydone','empty'));
    }

    public function bookinglist()
    {
        $bookinglist = Booking::join('users','trn_booking.id_user','users.id')
            ->join('mst_room','trn_booking.id_room','mst_room.id')
            ->where('tanggal',Carbon::today())
            ->where('trn_booking.status',null)
            ->where('jam_mulai','<=',Carbon::now()->format('H:i:s'))->where('jam_selesai','>=',Carbon::now()->format('H:i:s'))
            ->select('trn_booking.*','users.name','users.nik','mst_room.room_name')->get();
            
        $bookinglistcheck = Booking::join('users','trn_booking.id_user','users.id')
            ->join('mst_room','trn_booking.id_room','mst_room.id')
            ->where('tanggal',Carbon::today())
            ->where('trn_booking.status','present')
            ->where('jam_selesai','>=',Carbon::now()->format('H:i:s'))
            ->select('trn_booking.*','users.name','users.nik','mst_room.room_name')->get();

        $bookinglistpending = Booking::join('users','trn_booking.id_user','users.id')
            ->join('mst_room','trn_booking.id_room','mst_room.id')
            ->where('tanggal',Carbon::today())
            ->where('jam_mulai','>=',Carbon::now()->format('H:i:s'))
            ->select('trn_booking.*','users.name','users.nik','mst_room.room_name')->get();

        $bookinglistexpired = Booking::join('users','trn_booking.id_user','users.id')
            ->join('mst_room','trn_booking.id_room','mst_room.id')
            ->where('tanggal',Carbon::today())
            ->where('trn_booking.status',null)
            ->where('jam_selesai','<=',Carbon::now()->format('H:i:s'))
            ->select('trn_booking.*','users.name','users.nik','mst_room.room_name')->get();

        $bookinglistselesai = Booking::join('users','trn_booking.id_user','users.id')
            ->join('mst_room','trn_booking.id_room','mst_room.id')
            ->where('tanggal',Carbon::today())
            ->whereIn('trn_booking.status',['present','checkout'])
            ->where('jam_selesai','<=',Carbon::now()->format('H:i:s'))
            ->select('trn_booking.*','users.name','users.nik','mst_room.room_name')
            ->orderBy('trn_booking.status','desc')->get();
        return view('admin/bookinglist',compact('bookinglist','bookinglistcheck', 'bookinglistpending', 'bookinglistexpired', 'bookinglistselesai'));
    }

    public function allbooking()
    {
        $bookinglistselesai = Booking::join('users','trn_booking.id_user','users.id')
            ->join('mst_room','trn_booking.id_room','mst_room.id')
            ->whereIn('trn_booking.status', ['checkout','present'])
            ->where('trn_booking.tanggal', '<', Carbon::today())
            ->select('trn_booking.*','users.name','users.nik','mst_room.room_name')->get();

        $bookinglistpending = Booking::join('users','trn_booking.id_user','users.id')
            ->join('mst_room','trn_booking.id_room','mst_room.id')
            ->where('trn_booking.status', null)
            ->where('trn_booking.tanggal', '>', Carbon::today())
            ->select('trn_booking.*','users.name','users.nik','mst_room.room_name')->get();

        $bookinglistexpired = Booking::join('users','trn_booking.id_user','users.id')
            ->join('mst_room','trn_booking.id_room','mst_room.id')
            ->where('trn_booking.status', null)
            ->where('trn_booking.tanggal', '<', Carbon::today())
            ->select('trn_booking.*','users.name','users.nik','mst_room.room_name')->get();
        return view('admin/allbooking',compact('bookinglistselesai','bookinglistpending','bookinglistexpired'));
    }

    public function searchbooking (Request $request){
        $booking = Booking::join('users','trn_booking.id_user','users.id')
            ->join('mst_room','trn_booking.id_room','mst_room.id')
            ->select('trn_booking.*','users.name','users.nik','mst_room.room_name')
            ->where('name','like','%'.$request->search.'%')
            ->orWhere('room_name','like','%'.$request->search.'%')->get();
        return view('admin/bookingdata')->with([
            'data' => $booking
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function checkin($id)
    {
        $trn = Booking::findorfail($id);
        $trn->update(array('status' => 'present'));
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function checkout($id)
    {
        $trn = Booking::findorfail($id);
        $trn->update(array('status' => 'checkout'));
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cancelbook($id)
    {
        $trn = Booking::findorfail($id);
        $jam_mulai = new DateTime($trn->jam_mulai);
        $jam_selesai = new DateTime($trn->jam_selesai);
        $countupdate = DB::table('tmp_room_capacity')->where('id_room', $trn->id_room)
            ->where('tanggal', $trn->tanggal)
            ->whereBetween('tmp_room_capacity.jam_mulai', [$jam_mulai, $jam_selesai])
            ->count();
        $timetostr = $jam_mulai->format('H:i:s');
        $hour = date('H', strtotime($timetostr));
        for ($i = 0; $i <= $countupdate-1; $i++) {
            $sisa = DB::table('tmp_room_capacity')->where('id_room', $trn->id_room)
                ->where('tanggal', $trn->tanggal)
                ->where('tmp_room_capacity.jam_mulai', '=', str_pad($hour + $i, 2, "0", STR_PAD_LEFT) . ":00:00")
                ->value('kapasitas');
            DB::table('tmp_room_capacity')->where('id_room', $trn->id_room)
                ->where('tanggal', $trn->tanggal)
                ->where('jam_mulai', '=', str_pad($hour + $i, 2, "0", STR_PAD_LEFT) . ":00:00")
                ->update(['kapasitas' => $sisa + 1]);
        }
        $trn->delete();
        Alert::success('Reservasi Dibatalkan', 'Berhasil membatalkan reservasi')->showConfirmButton('OK', '#2c598d');
        return back();
    }

    public function reviewuser(Request $request){
        $trn = Booking::findorfail($request->id);
        $trn->update(['review' => $request->review, 'like' => $request->like]);
        return "success";
    }
}
