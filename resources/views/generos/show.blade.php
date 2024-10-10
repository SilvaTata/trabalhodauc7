@extends('layouts.darkMode')

@section('title', 'Detalhes do Gênero')

@section('content_header')
    <h1>Detalhes da Gênero</h1>
@stop

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Detalhes do Gênero
            </div>
            <div class="card-body">
                <h5 class="card-title">Nome:</h5>
                <p class="card-text">{{ $genero->nome }}</p>
            </div>
            <div class="card-footer">
                <a href="{{ route('generos.index') }}" class="btn btn-secondary">Voltar</a>
                <a href="{{ route('generos.edit', $genero->id) }}" class="btn btn-warning">Editar</a>
                <form action="{{ route('generos.destroy', $genero->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                </form>
            </div>
        </div>
    </div>
@endsection
