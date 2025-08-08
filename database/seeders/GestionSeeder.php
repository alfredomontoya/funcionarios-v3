<?php

namespace Database\Seeders;

use App\Models\Gestion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Gestion::factory(2)->create();
        Gestion::factory(1)->create(['titulo' => 'Fiesta Municipal2025', 'descripcion' => 'Fiesta Municipal2025', 'year' => '2025']);
    }
}
