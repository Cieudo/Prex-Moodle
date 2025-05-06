@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $curso->titulo }}</h2>
    <p>{{ $curso->descricao }}</p>

    <a href="{{ route('professor.cursos.index') }}" class="btn btn-secondary">Voltar</a>
</div>
@endsection
<!--

// traduzir o codigo abaixo --
// Este código é um template Blade para exibir os detalhes de um curso em uma aplicação Laravel.
// Ele estende um arquivo de layout, configura um contêiner e exibe o título e a descrição do curso.
