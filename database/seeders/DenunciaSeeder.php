<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DenunciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('denuncias')->insert([
            'id_victim' => 3,
            'latitude' => '-23.504323',
            'longitude' => '-46.497824',
            'created_at' => '2023-08-15',
            'updated_at' => '2023-08-15'
        ]);

        DB::table('denuncias')->insert([
            'id_victim' => 3,
            'id_attendant' => 2,
            'latitude' => '-23.504323',
            'longitude' => '-46.497824',
            'status' => 1,
            'created_at' => '2023-08-15',
            'updated_at' => '2023-08-15'
        ]);
    }
}
