<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $name = fake()->sentence();
        return [
            'nombre' => $name,
            'slug' => Str::slug($name, '-'),
            'descripcion' => fake()->paragraph(),
            'imagen' => fake()->image('public/storage/cursos', 640, 480, null, false),
            'costo' => fake()->randomDigit(),
            'publicado' => 0,
        ];
    }

}
