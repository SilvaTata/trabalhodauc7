<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Autor;

class AutorSeeder extends Seeder
{
    public function run()
    {
        Autor::factory()->count(10)->create();
        /*DB::table('autores')->insert([
            [
                'nome' => 'J.K. Rowling',
                'biografia' => 'Autora da série Harry Potter.',
                'data_nascimento' => '1965-07-31',
                'nacionalidade' => 'Britânica',
            ],
        ]); seeder: adicionado manualmente, trocou para factory: faz automaticamente*/
    }
}
