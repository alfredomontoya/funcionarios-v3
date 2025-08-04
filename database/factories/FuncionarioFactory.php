<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Persona>
 */
class FuncionarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ci' => $this->faker->unique()->numerify('########'), // 8 dígitos
            'nombres' => $this->faker->firstName(),
            'apellidos' => $this->faker->lastName(),
            'cargo' => $this->faker->jobTitle(),
            'edificio' => $this->faker->randomElement(['Central', 'Quinta Municipal', 'Sempla']),
            'responsable' => $this->faker->name(),
            'telresponsable' => $this->faker->phoneNumber(),
        ];
    }
}
