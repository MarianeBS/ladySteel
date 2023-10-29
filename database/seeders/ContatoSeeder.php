<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('contatos')->insert([
            'id_user' => 3,
            'contact' => 11959955896,
            'created_at' => '2023-08-15',
            'updated_at' => '2023-08-15'
        ]);

        DB::table('contatos')->insert([
            'id_user' => 3,
            'contact' => 11992931601,
            'created_at' => '2023-08-15',
            'updated_at' => '2023-08-15'
        ]);
    }
}
