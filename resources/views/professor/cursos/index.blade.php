@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Meus Cursos</h2>

    <a href="{{ route('professor.cursos.create') }}" class="btn btn-primary mb-3">Novo Curso</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Título</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($cursos as $curso)
                <tr>
                    <td>{{ $curso->titulo }}</td>
                    <td>
                        <a href="{{ route('professor.cursos.edit', $curso->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('professor.cursos.destroy', $curso->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="2">Nenhum curso encontrado.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
