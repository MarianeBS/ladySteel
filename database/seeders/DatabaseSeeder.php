<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(TipoSeeder::class);
        $this->call(DispositivoSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ContatoSeeder::class);
        $this->call(DenunciaSeeder::class);
        //\App\Models\User::factory(25)->create();
    }
}
