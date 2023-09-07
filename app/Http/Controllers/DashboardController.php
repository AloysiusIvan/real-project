<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Room;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $thisYear = Carbon::now()->year;
        $result = Booking::join('mst_room', 'trn_booking.id_room', '=', 'mst_room.id')
            ->select('mst_room.room_name', DB::raw('COUNT(trn_booking.id_room) AS total'))
            ->whereYear('trn_booking.tanggal', $thisYear)
            ->whereIn('trn_booking.status', ['present','checkout'])
            ->groupBy('mst_room.room_name', 'trn_booking.id_room')->orderBy('total','desc')
            ->get();

        $result2 = Booking::join('users', 'trn_booking.id_user', '=', 'users.id')
            ->select('users.profesi', DB::raw('COUNT(DISTINCT users.id) AS total'))
            ->whereYear('trn_booking.tanggal', $thisYear)
            ->whereIn('trn_booking.status', ['present','checkout'])
            ->groupBy('users.profesi')->orderBy('total','desc')
            ->get();

        $result3 = Booking::join('users', 'trn_booking.id_user', '=', 'users.id')
            ->whereYear('trn_booking.tanggal', $thisYear)
            ->whereIn('trn_booking.status', ['present','checkout'])
            ->select('users.keahlian')
            ->get();

        $timeIntervals = ['08:00:00','09:00:00','10:00:00','11:00:00','12:00:00','13:00:00','14:00:00','15:00:00','16:00:00'];
        $times = [];  
        foreach ($timeIntervals as $time) {
            $count = Booking::whereYear('trn_booking.tanggal', $thisYear)
                ->whereRaw("TIME(jam_mulai) <= ? AND TIME(jam_selesai) >= ?", [$time, $time])->count();
            $times[$time] = $count;
        }
        $valuesTime = array_values($times);

        $rataRating = Booking::whereYear('trn_booking.tanggal', $thisYear)->avg('like');
        $totalLike = Booking::whereYear('trn_booking.tanggal', $thisYear)->where('like','!=',null)->count();
        $Like5 = Booking::whereYear('trn_booking.tanggal', $thisYear)->where('like','5')->count();
        $Like4 = Booking::whereYear('trn_booking.tanggal', $thisYear)->where('like','4')->count();
        $Like3 = Booking::whereYear('trn_booking.tanggal', $thisYear)->where('like','3')->count();
        $Like2 = Booking::whereYear('trn_booking.tanggal', $thisYear)->where('like','2')->count();
        $Like1 = Booking::whereYear('trn_booking.tanggal', $thisYear)->where('like','1')->count();

        $data = json_decode($result, true);
        $transformedData = [];
        $transformedData2 = [];
        foreach ($data as $item) {
            $transformedData[] = $item['total'];
        }
        foreach ($data as $item) {
            $transformedData2[] = [
                substr($item['room_name'], 0, -5),
                'Room'
            ];
        }

        $data2 = json_decode($result2, true);
        $result2Data = [];
        $result2Data2 = [];
        foreach ($data2 as $item) {
            $result2Data[] = $item['total'];
        }
        foreach ($data2 as $item) {
            $result2Data2[] = $item['profesi'];
        }

        $countskill = [];
        foreach ($result3 as $item) {
            $keahlians = explode(",", $item["keahlian"]);
            foreach ($keahlians as $keahlian) {
                $keahlian = trim($keahlian);
                if (isset($countskill[$keahlian])) {
                    $countskill[$keahlian]++;
                } else {
                    $countskill[$keahlian] = 1;
                }
            }
        }
        $result3skill = [];
        foreach ($countskill as $keahlian => $count) {
            $result3skill[] = [$keahlian => $count];
        }
        usort($result3skill, function($a, $b) {
            return current($b) <=> current($a);
        });
        $result1skill = array_map('current', $result3skill);
        $result2skill = array_keys(array_reduce($result3skill, 'array_merge', []));

        // return $result2skill;
        return view('admin/dashboard', compact('transformedData','transformedData2','result1skill','result2skill','result2Data','result2Data2','valuesTime','rataRating','totalLike','Like5','Like4','Like3','Like2','Like1'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboardfilter(Request $request)
    {
        $result = Booking::join('mst_room', 'trn_booking.id_room', '=', 'mst_room.id')
            ->select('mst_room.room_name', DB::raw('COUNT(trn_booking.id_room) AS total'))
            ->whereIn('trn_booking.status', ['present','checkout'])
            ->whereBetween('trn_booking.tanggal', [$request->filterstart, $request->filterend])
            ->groupBy('mst_room.room_name', 'trn_booking.id_room')->orderBy('total','desc')
            ->get();

        $result2 = Booking::join('users', 'trn_booking.id_user', '=', 'users.id')
            ->select('users.profesi', DB::raw('COUNT(DISTINCT users.id) AS total'))
            ->whereIn('trn_booking.status', ['present','checkout'])
            ->whereBetween('trn_booking.tanggal', [$request->filterstart, $request->filterend])
            ->groupBy('users.profesi')->orderBy('total','desc')
            ->get();

        $result3 = Booking::join('users', 'trn_booking.id_user', '=', 'users.id')
            ->whereIn('trn_booking.status', ['present','checkout'])
            ->whereBetween('trn_booking.tanggal', [$request->filterstart, $request->filterend])
            ->select('users.keahlian')
            ->get();

        $timeIntervals = ['08:00:00','09:00:00','10:00:00','11:00:00','12:00:00','13:00:00','14:00:00','15:00:00','16:00:00'];
        $times = [];  
        foreach ($timeIntervals as $time) {
            $count = Booking::whereBetween('trn_booking.tanggal', [$request->filterstart, $request->filterend])
                ->whereRaw("TIME(jam_mulai) <= ? AND TIME(jam_selesai) >= ?", [$time, $time])->count();
            $times[$time] = $count;
        }
        $valuesTime = array_values($times);

        $rataRating = Booking::whereBetween('trn_booking.tanggal', [$request->filterstart, $request->filterend])
            ->avg('like');
        $totalLike = Booking::whereBetween('trn_booking.tanggal', [$request->filterstart, $request->filterend])
            ->where('like','!=',null)->count();
        $Like5 = Booking::whereBetween('trn_booking.tanggal', [$request->filterstart, $request->filterend])
            ->where('like','5')->count();
        $Like4 = Booking::whereBetween('trn_booking.tanggal', [$request->filterstart, $request->filterend])
            ->where('like','4')->count();
        $Like3 = Booking::whereBetween('trn_booking.tanggal', [$request->filterstart, $request->filterend])
            ->where('like','3')->count();
        $Like2 = Booking::whereBetween('trn_booking.tanggal', [$request->filterstart, $request->filterend])
            ->where('like','2')->count();
        $Like1 = Booking::whereBetween('trn_booking.tanggal', [$request->filterstart, $request->filterend])
            ->where('like','1')->count();

        $data = json_decode($result, true);
        $transformedData = [];
        $transformedData2 = [];
        foreach ($data as $item) {
            $transformedData[] = $item['total'];
        }
        foreach ($data as $item) {
            $transformedData2[] = [
                substr($item['room_name'], 0, -5),
                'Room'
            ];
        }

        $data2 = json_decode($result2, true);
        $result2Data = [];
        $result2Data2 = [];
        foreach ($data2 as $item) {
            $result2Data[] = $item['total'];
        }
        foreach ($data2 as $item) {
            $result2Data2[] = $item['profesi'];
        }

        $countskill = [];
        foreach ($result3 as $item) {
            $keahlians = explode(",", $item["keahlian"]);
            foreach ($keahlians as $keahlian) {
                $keahlian = trim($keahlian);
                if (isset($countskill[$keahlian])) {
                    $countskill[$keahlian]++;
                } else {
                    $countskill[$keahlian] = 1;
                }
            }
        }
        $result3skill = [];
        foreach ($countskill as $keahlian => $count) {
            $result3skill[] = [$keahlian => $count];
        }
        usort($result3skill, function($a, $b) {
            return current($b) <=> current($a);
        });
        $result1skill = array_map('current', $result3skill);
        $result2skill = array_keys(array_reduce($result3skill, 'array_merge', []));

        return view('admin/filterdashboard')->with([
            'transformedDatafilter' => $transformedData,
            'transformedData2filter' => $transformedData2,
            'result1skillfilter' => $result1skill,
            'result2skillfilter' => $result2skill,
            'result2Datafilter' => $result2Data,
            'result2Data2filter' => $result2Data2,
            'valuesTimefilter' => $valuesTime,
            'rataRating' => $rataRating,
            'totalLike' => $totalLike,
            'Like5' => $Like5,
            'Like4' => $Like4,
            'Like3' => $Like3,
            'Like2' => $Like2,
            'Like1' => $Like1
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
