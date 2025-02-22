@extends('layouts.darkMode')

@section('title', 'Novo Gênero')

@section('content_header')
    <h1>Criar Gênero</h1>
@stop

@section('content')
    <div class="container">
        <form action="{{ route('generos.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror" required value="{{ old('nome') }}">
                @error('nome')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Salvar</button>
        </form>
    </div>
@endsection
