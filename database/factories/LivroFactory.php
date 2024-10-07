<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Livro;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;


class LivroFactory extends Factory
{
    protected $model = Livro::class;
    public function definition()
    {
        $genero_id = DB::table('generos')->inRandomOrder()->value('id');
        return [
            'titulo' => $this->faker->sentence(),
            'descricao' => $this->faker->paragraph(),
            'data_publicacao' => $this->faker->date(),
            'genero_id' => $genero_id, 
        ];
    }
}
