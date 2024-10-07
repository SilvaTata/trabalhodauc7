<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Genero;
use Database\Seeders\DB;

class GeneroFactory extends Factory
{
    protected $model = Genero::class;
    public function definition()
    {
        return [
            'nome' => $this->faker->randomElement(['Ficção', 'Fantasia', 'Romance', 'Terror', 'Mistério', 'Biografia', 'História', 'Ciência', 'Aventura', 'Poesia']), /*escolher um gênero aleatório entre os que eu digitei */
        ];
    }
}
