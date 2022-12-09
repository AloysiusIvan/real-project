<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capacity extends Model
{
    protected $table = "tmp_room_capacity";
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'id_room', 'tanggal','kapasitas'
    ];
}
