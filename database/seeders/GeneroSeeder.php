<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Genero;


class GeneroSeeder extends Seeder
{
    public function run()
    {
        Genero::factory()->count(5)->create();
       /*  DB::table('generos')->insert([
            [
                'nome' => 'Romance.',
            ],
        ]); */
    }
}
