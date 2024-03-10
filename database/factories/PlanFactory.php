<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plan>
 */
class PlanFactory extends Factory
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
            'descripcion' => $this->faker->name,
            'validez' => $this->faker->numberBetween(1,12),
            'precio' => $this->faker->numberBetween(1,100),
        ];
    }
}
