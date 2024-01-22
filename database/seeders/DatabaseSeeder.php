<?php

namespace Database\Seeders;

use App\Models\Funcao;
use Database\Seeders\CargoSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CargoSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(FuncaoSeeder::class);
        $this->call(ColaboradorSeeder::class);

    }
}
