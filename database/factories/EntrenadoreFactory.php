<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Entrenadore>
 */
class EntrenadoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name(),
            'especialidad' => $this->faker->randomElement([
                                        'Entrenamiento de fuerza',
                                        'Entrenamiento cardiovascular',
                                        'Entrenamiento de resistencia'
                                    ]),
            'telefono' => $this->faker->phoneNumber(),
            'correo' => $this->faker->unique()->safeEmail(),
            'user_id' => User::factory()->create()->id,
        ];
    }
}
