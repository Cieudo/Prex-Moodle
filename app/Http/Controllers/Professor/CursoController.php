<?php

namespace App\Http\Controllers\Professor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Curso;
;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cursos = Curso::where('user_id', auth()->id())->get();
        return view('professor.cursos.index', compact('cursos'));
    }
    
    function perfil()
    {
        $cursos = Curso::where('user_id', auth()->id())->get();
        return view('professor.perfil', compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('professor.cursos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'nullable|string',
        ]);
    
        Curso::create([
            'user_id' => auth()->id(),
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
        ]);
    
        return redirect()->route('professor.cursos.index')->with('success', 'Curso criado com sucesso.');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $curso = Curso::findOrFail($id);
        return view('professor.cursos.show', compact('curso'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    
        $curso = Curso::findOrFail($id);
        return view('professor.cursos.edit', compact('curso'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $curso = Curso::findOrFail($id);
        $curso->update([
            'title' => $request->title,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()->route('professor.cursos.index')->with('success', 'Curso updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $curso = Curso::findOrFail($id);
        $curso->delete();

        return redirect()->route('professor.cursos.index')->with('success', 'Curso deletado com sucesso.');
    }

    /**
     *função para o perfil.
     */

}



