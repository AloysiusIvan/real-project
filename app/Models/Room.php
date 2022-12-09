<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = "mst_room";
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'room_name', 'kapasitas','status', 'photo'
    ];
}
