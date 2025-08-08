<?php

namespace Database\Factories;

use App\Models\Gestion;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class GestionFactory extends Factory
{
    protected $model = Gestion::class;

    public function definition(): array
    {
        return [
            'user_id' => User::all('id')->random(), // Relación con la tabla `user`
            'year' => $this->faker->year(),
            'titulo' => $this->faker->sentence(3),
            'descripcion' => $this->faker->paragraph(),
            'url_file' => $this->faker->optional()->url(),
            'count_funcionarios' => $this->faker->numberBetween(0, 1000),
            'procesado' => $this->faker->boolean(),
            'estado' => $this->faker->randomElement([0, 1]),
        ];
    }
}
