<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rutina>
 */
class RutinaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name,
            "Lunes" => $this->faker->sentence(5),
            "Martes" => $this->faker->sentence(5),
            "Miercoles" => $this->faker->sentence(5),
            "Jueves" => $this->faker->sentence(5),
            "Viernes" => $this->faker->sentence(5),
            "Sabado" => $this->faker->sentence(5),
        ];
    }
}
