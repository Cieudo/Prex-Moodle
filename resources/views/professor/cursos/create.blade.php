@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Criar Novo Curso</h2>

    <form action="{{ route('professor.cursos.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea name="descricao" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('professor.cursos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
