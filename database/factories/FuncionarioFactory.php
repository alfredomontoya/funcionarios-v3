<?php

namespace Database\Factories;

use App\Models\Funcionario;
use App\Models\Gestion;
use Illuminate\Database\Eloquent\Factories\Factory;

class FuncionarioFactory extends Factory
{
    protected $model = Funcionario::class;

    public function definition(): array
    {
        return [
            'nro' => $this->faker->unique()->numberBetween(1, 9999),
            'nroedificio' => $this->faker->numberBetween(1, 100),
            'ci' => $this->faker->unique()->numerify('########'),
            'nombres' => $this->faker->firstName(),
            'apellidos' => $this->faker->lastName(),
            'cargo' => $this->faker->jobTitle(),
            'edificio' => $this->faker->word(),
            'responsable' => $this->faker->name(),
            'telresponsable' => $this->faker->phoneNumber(),
            'estado' => $this->faker->randomElement([0, 1]),
            'entregado' => $this->faker->randomElement([0, 1]),
            'gestion_id' => Gestion::all('id')->random(), // Crea una gestión relacionada automáticamente
        ];
    }
}
