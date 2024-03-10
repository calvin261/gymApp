<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Curso>
 */
class CursoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $horario = [
            'lunes' => [
                'hora_inicio' => $this->faker->time(),
                'hora_fin' => $this->faker->time(),
            ],
            'martes' => [
                'hora_inicio' => $this->faker->time(),
                'hora_fin' => $this->faker->time(),
            ],
            // Repite esto para otros días de la semana según tus necesidades
        ];
        return [
            'nombre' => $this->faker->sentence(3),
            'descripcion' => $this->faker->paragraph(3),
            'horario' => json_encode($horario),
            'entrenador_id' => $this->faker->numberBetween(1, 10), // Reemplaza el rango con el ID de tus entrenadores
        ];
    }
}
