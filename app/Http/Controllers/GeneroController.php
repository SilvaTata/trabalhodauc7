<?php

namespace App\Http\Controllers;

use App\Models\genero;
use Illuminate\Http\Request;

class GeneroController extends Controller
{
    public function index(Request $request)
    {
        $query = Genero::query();

        if ($request->filled('nome')) {
            $query->where('nome', 'like', '%' . $request->nome . '%');
        }

        $perPage = $request->get('perPage', 10);

        $generos = $query->paginate($perPage);

        return view('generos.index', compact('generos'));
    }

    public function create()
    {
        return view('generos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255|unique:generos',
        ]);

        Genero::create($request->all());

        return redirect()->route('generos.index')->with('status', 'genero criada com sucesso!');
    }

    public function edit($id)
    {
        $genero = Genero::findOrFail($id);
        return view('generos.edit', compact('genero'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255|unique:generos,nome,' . $id,
        ]);

        $genero = Genero::findOrFail($id);
        $genero->update($request->all());

        return redirect()->route('generos.index')->with('status', 'genero atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $genero = Genero::findOrFail($id);
        $genero->delete();

        return redirect()->route('generos.index')->with('status', 'genero excluída com sucesso!');
    }
    public function show($id)
    {
        $genero = Genero::findOrFail($id);
        return view('generos.show', compact('genero'));
    }
}
