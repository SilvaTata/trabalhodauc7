<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Autor;
use Database\Seeders\DB;

class AutorFactory extends Factory
{
    protected $model = Autor::class;
    public function definition()
    {
        return [
            'nome' => $this->faker->name(),
            'biografia' => $this->faker->paragraph(),
            'data_nascimento' => $this->faker->date(),
            'nacionalidade' => $this->faker->country(), /*country é pra colocar nome de um país*/
        ];
    }
}
