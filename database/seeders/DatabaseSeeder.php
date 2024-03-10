<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(
            UsersTableSeeder::class,
        );
        \App\Models\Plan::factory(5)->create();
        \App\Models\Rutina::factory(10)->create();
        \App\Models\Client::factory(100)->hasPlan(1)->create();
        \App\Models\Salud::factory(10)->hasClient(1)->create();
        \App\Models\Entrenadore::factory(10)->create();
        \App\Models\Curso::factory(10)->create();

    }
}
