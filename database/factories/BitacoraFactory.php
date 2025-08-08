<?php

namespace Database\Factories;

use App\Models\Bitacora;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BitacoraFactory extends Factory
{
    protected $model = Bitacora::class;

    public function definition(): array
    {
        return [
            // 'user_id' => User::factory(), // Relación con tabla 'user'
            'user_id' => User::all('id')->random(), // Relación con tabla 'user'
            'busqueda' => $this->faker->words(3, true),
            'hostname' => $this->faker->optional()->domainName(),
            'ip_address' => $this->faker->optional()->ipv4(),
            'user_agent' => $this->faker->optional()->userAgent(),
            'status' => $this->faker->randomElement(['ok', 'error', 'empty']),
            'results_count' => $this->faker->optional()->numberBetween(0, 100),
            'referer' => $this->faker->optional()->url(),
            'tipo' => $this->faker->optional()->word(),
        ];
    }
}
