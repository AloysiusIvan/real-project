<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;
use Illuminate\Support\Facades\Hash;

class SeederBook extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');
        $room = ['34','35','37','38','39','40','41','42','43'];
        $jam_mulai = ['08:00:00','09:00:00','10:00:00','11:00:00','12:00:00'];
        $jam_selesai = ['13:00:00','14:00:00','15:00:00','16:00:00','17:00:00'];
        $keperluan = ['Bekerja','Meeting','Kerja Kelompok','Remote Working'];
        for($i = 1; $i <= 300; $i++){
            $id_user = $faker->numberBetween(315,414);
            $id_room = $faker->randomElement($room);
            $tanggal = $faker->dateTimeBetween('-3 month')->format('Y-m-d');
            DB::table('trn_booking')->insert([
                'id_user' => $id_user,
                'id_room' => $id_room,
                'tanggal' => $tanggal,
                'jam_mulai' => $faker->randomElement($jam_mulai),
                'jam_selesai' => $faker->randomElement($jam_selesai),
                'keperluan' => $faker->randomElement($keperluan),
                'kode_booking' => "VT".$id_user.$id_room.str_replace("-", "", $tanggal),
                'status' => "checkout",
                'review' => "Sesuai",
                'like' => $faker->numberBetween(1,5),
                'created_at' => '2023-06-06 21:55:00'
            ]);
        }
    }
}
