<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ClientFactory extends Factory
{
    protected $model = Client::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "nombre" => $this->faker->name,
            'telefono' => $this->faker->numberBetween(1000000000, 9999999999),
            "correo" => $this->faker->unique()->safeEmail,
            "fechaNacimiento" =>  $this->faker->date('Y-m-d', 'now'),
            "direccion" => $this->faker->sentence(),
            "provincia" => $this->faker->name,
            "ciudad" => $this->faker->name,
            'user_id' => User::factory()->create()->id,
        ];
    }
    public function configure()
    {
        return $this->afterCreating(function (Client $client) {
            if ($client->id === 1) {
                // Crear un registro personalizado solo si es el primer cliente creado
                Client::factory()->create([
                    "nombre" => "Jefferson",
                    'telefono' => $this->faker->numberBetween(1000000000, 9999999999),
                    "correo" => 'user@user.com',
                    "fechaNacimiento" =>  $this->faker->date('Y-m-d', 'now'),
                    "direccion" => $this->faker->sentence(),
                    "provincia" => $this->faker->name,
                    "ciudad" => $this->faker->name,
                    'user_id' => 2
                ]);
            }
        });
    }
}
