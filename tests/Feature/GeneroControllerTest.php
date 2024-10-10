<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Genero;

class GeneroControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testpode_listar_generos_com_paginacao()
    {
        Genero::factory()->count(15)->create();
        $response = $this->get('/generos');

        $response->assertStatus(200);
        $response->assertViewHas('generos');
    }
    
    public function testpode_criar_um_novo_genero()
    {
        $dados = [
            'nome' => 'Gênero Teste',
        ];

        $response = $this->post('/generos', $dados);

        $response->assertRedirect('/generos');
        $this->assertDatabaseHas('generos', ['nome' => 'Gênero Teste']);
    }

    public function testpode_atualizar_um_genero_existente() {
        $genero = Genero::factory()->create();
        $dadosAtualizados = [
            'nome' => 'Gênero Atualizado',
        ];
        $response = $this->put("/generos/{$genero->id}", $dadosAtualizados);

        $response->assertRedirect('/generos');
        $this->assertDatabaseHas('generos', ['nome' => 'Gênero Atualizado']);
    }

    public function testpode_excluir_um_genero() {
        $genero = Genero::factory()->create();
        $response = $this->delete("/generos/{$genero->id}");

        $response->assertRedirect('/generos');
        $this->assertDatabaseMissing('generos', ['id' => $genero->id]);
    }
    
    public function testperformace_listar_generos_com_paginacao() {
        Genero::factory()->count(500)->create();
        $start = microtime(true);
        $response = $this->get('/generos');
        $duration = microtime(true) - $start;
        $response->assertStatus(200);
        $this->assertTrue($duration < 0.2, "O tempo de resposta foi maior que 2 segundos: {$duration} segundos");
    }
     
    public function testperfomace_criar_generos_em_massa() {
        $start = microtime(true);
        Genero::factory()->count(1000)->create();
        $duration = microtime(true) - $start;
        $this->assertTrue($duration < 0.5, "O tempo de criação de autores foi maior que 5 segundos: {$duration} segundos");
    }
}
