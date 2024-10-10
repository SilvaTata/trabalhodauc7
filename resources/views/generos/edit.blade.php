@extends('layouts.darkMode')

@section('title', 'Editar Gênero')

@section('content_header')
    <h1>Editar Gênero</h1>
@stop

@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Editar Gênero</h3>
                <div class="card-tools">
                    <a href="{{ route('generos.index') }}" class="btn btn-secondary btn-sm">
                        Voltar para Listagem
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('generos.update', $genero->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror"
                            value="{{ old('nome', $genero->nome) }}" required>
                        @error('nome')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Atualizar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
