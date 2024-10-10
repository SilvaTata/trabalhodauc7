<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Autor;

class AutorControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testpode_listar_autores_com_paginacao()
    {
        Autor::factory()->count(15)->create();
        $response = $this->get('/autores');

        $response->assertStatus(200);
        $response->assertViewHas('autores');
    }
    
    public function testpode_criar_um_novo_autor()
    {
        $dados = [
            'nome' => 'Autor Teste',
            'biografia' => 'Biografia do autor teste',
            'data_nascimento' => '1990-01-01',
            'nacionalidade' => 'País do autor',
        ];

        $response = $this->post('/autores', $dados);

        $response->assertRedirect('/autores');
        $this->assertDatabaseHas('autores', ['nome' => 'Autor Teste']);
    }

    public function testpode_atualizar_um_autor_existente() {
        $autor = Autor::factory()->create();
        $dadosAtualizados = [
            'nome' => 'Nome Atualizado',
            'biografia' => 'Biografia atualizada',
            'nacionalidade' => 'Nacionalidade atualizada',
        ];
        $response = $this->put("/autores/{$autor->id}", $dadosAtualizados);

        $response->assertRedirect('/autores');
        $this->assertDatabaseHas('autores', ['nome' => 'Nome Atualizado']);
    }

    public function testpode_excluir_um_autor() {
        $autor = Autor::factory()->create();
        $response = $this->delete("/autores/{$autor->id}");

        $response->assertRedirect('/autores');
        $this->assertDatabaseMissing('autores', ['id' => $autor->id]);
    }
    
    public function testperformace_listar_autores_com_paginacao() {
        Autor::factory()->count(500)->create();
        $start = microtime(true);
        $response = $this->get('/autores');
        $duration = microtime(true) - $start;
        $response->assertStatus(200);
        $this->assertTrue($duration < 0.2, "O tempo de resposta foi maior que 2 segundos: {$duration} segundos");
    }
     
    public function testperfomace_criar_autores_em_massa() {
        $start = microtime(true);
        Autor::factory()->count(1000)->create();
        $duration = microtime(true) - $start;
        $this->assertTrue($duration < 0.5, "O tempo de criação de autores foi maior que 5 segundos: {$duration} segundos");
    }
}
