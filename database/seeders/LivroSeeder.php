<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Livro;
use Database\Seeders\DB;

class LivroSeeder extends Seeder
{
    public function run()
    {
        Livro::factory()->count(20)->create();
        /*DB::table('livros')->insert([
        [
        'titulo' => 'Harry Potter.',
        'descricao' => 'Livro infanto-juvenil.',
        'data_publicacao' => '1999-01-01',
        'genero_id' => '3',
        ],
    ]);*/
    }
}
