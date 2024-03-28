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
       
        return [
            'nombre' => fake()->sentence(),
            'descripcion' => fake()->paragraph(),
            'imagen' => fake()->image('public/storage/cursos', 640, 480, null, false),
            'costo' => fake()->randomDigit(),
        ];
    }

}
