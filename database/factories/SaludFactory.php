<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Salud>
 */
class SaludFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "genero" => $this->faker->randomElement(['Masculino', 'Femenino']),
            "calorias" => $this->faker->numberBetween(120, 200),
            "altura" => $this->faker->numberBetween(120, 200),
            "peso" => $this->faker->numberBetween(120, 200),
            "imc" => $this->faker->numberBetween(120, 200),
            "client_id" => Client::factory()->create()->id,

        ];
    }
}
