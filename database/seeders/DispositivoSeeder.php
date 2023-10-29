<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DispositivoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dispositivos')->insert([
            'created_at' => '2023-08-15',
            'updated_at' => '2023-08-15'
        ]);

        DB::table('dispositivos')->insert([
            'created_at' => '2023-08-15',
            'updated_at' => '2023-08-15'
        ]);
    }
}
