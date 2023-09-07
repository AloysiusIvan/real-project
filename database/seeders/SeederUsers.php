<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use DB;
use Illuminate\Support\Facades\Hash;

class SeederUsers extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');
        $profesi = ['Pelajar / Mahasiswa','PNS','Pegawai Swasta','Lainnya'];
        $institusi = ['Institusi / Perusahaan','Sekolah / Kampus','Komunitas / Organisasi Swasta','Lembaga'];
        $keahlian = ['System Analyst','Data Analyst','Front End','Back End','Fullstack','Software Tester','Lainnya'];
        for($i = 1; $i <= 100; $i++){
            DB::table('users')->insert([
                'nik' => $faker->numberBetween(1111111111111111,9999999999999999),
                'name' => $faker->name,
                'email' => $faker->email,
                'phone' => $faker->phoneNumber,
                'profesi' => $faker->randomElement($profesi),
                'institusi' => $faker->randomElement($institusi),
                'nama_institusi' => $faker->city." University",
                'alamat' => $faker->address,
                'keahlian' => $faker->randomElement($keahlian),
                'foto_ktp' => $faker->email.".jpg",
                'password' => Hash::make('techno'),
                'validasi' => 'valid',
                'created_at' => '2023-06-02 21:55:00'
            ]);
        }
    }
}
