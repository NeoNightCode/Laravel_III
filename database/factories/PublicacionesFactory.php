<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Usuario;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Publicaciones>
 */
class PublicacionesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'usuario_id'        => Usuario::all()->random()->id,
            'titulo'             => $this->faker->realText(50),
            'publicacion'       => $this->faker->realText(250),
            'fecha'      => $this->faker->date(),
        ];
    }
}
