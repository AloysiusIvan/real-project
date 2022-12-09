<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Booking extends Model
{
    protected $table = "trn_booking";
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'id_user', 'id_room','tanggal', 'keperluan', 'kode_booking'
    ];
    protected $dates = ['tanggal'];

    public static function search($tgl){
        $query = Room::select('mst_room.*','tmp_room_capacity.id_room')
            ->leftJoin('tmp_room_capacity', function($leftJoin)use($tgl){
                $leftJoin->on('mst_room.id', '=', 'tmp_room_capacity.id_room');
                $leftJoin->on(DB::raw('tmp_room_capacity.tanggal', '=', $tgl));
            });
        return $query;
    }
}


