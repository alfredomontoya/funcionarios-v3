<?php

namespace Database\Seeders;

use App\Models\Funcionario;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->truncateTables([
            'users',
            // 'gestion',
            // 'funcionario',
            // 'edificio',
            // 'bitacora'
            'funcionarios',
            'bitacoras'
        ]);
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'amontoya',
        ]);

        // Funcionario::factory(10)->create();

        $this->call(UserSeeder::class);
    }

    protected function truncateTables(array $tables)
    {
        $connection = DB::getDriverName();

        if ($connection === 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        } elseif ($connection === 'sqlite') {
            DB::statement('PRAGMA foreign_keys = OFF;');
        }

        foreach ($tables as $table) {
            // Eliminar datos
            DB::table($table)->delete();

            // Reset autoincrement según el motor
            if ($connection === 'mysql') {
                DB::statement("ALTER TABLE `$table` AUTO_INCREMENT = 1");
            } elseif ($connection === 'sqlite') {
                DB::statement("DELETE FROM sqlite_sequence WHERE name = '$table'");
            }
        }

        if ($connection === 'mysql') {
            DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
        } elseif ($connection === 'sqlite') {
            DB::statement('PRAGMA foreign_keys = ON;');
        }
    }

    
}
