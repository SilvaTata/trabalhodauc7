<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    public function index(Request $request)
    {
        $query = Autor::query();

        if ($request->has('nome')) {
            $query->where('nome', 'like', '%' . $request->input('nome') . '%');
        }

        $autores = $query->paginate($request->input('perPage', 50));

        return view('autores.index', compact('autores'));
    }

    public function create()
    {
        return view('autores.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:225',
            'biografia' => 'nullable|string',
            'data_nascimento' => 'nullable|date',
            'nacionalidade' => 'required|string|max:255',
        ]);
        
        Autor::create($validated);

        return redirect()->route('autores.index')->with('success', 'Autor adicionado com sucesso!');
    }

    public function show($id)
    {
        $autor = Autor::findOrFail($id);
        return view('autores.show', compact('autor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $autor = Autor::findOrFail($id);
        return view('autores.edit', compact('autor'));
    }

    public function update(Request $request, $id)
    { 
        $validated = $request->validate([
            'nome' => 'required|string|max:225',
            'biografia' => 'nullable|string',
            'data_nascimento' => 'nullable|date',
            'nacionalidade' => 'required|string|max:255',
        ]);

        $autor = Autor::findOrFail($id);
        $autor->update($validated);

        return redirect()->route('autores.index')->with('success', 'Autor atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $autor = Autor::findOrFail($id);
        $autor->delete();

        return redirect()->route('autores.index')->with('success', 'Autor excluido com sucesso!');
    }
}
