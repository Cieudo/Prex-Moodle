@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <!-- Menu lateral -->
        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <img src="{{ Auth::user()->profile_photo_url ?? 'https://avatars.githubusercontent.com/u/115884125?v=4' }}" 
                         alt="Foto de Perfil" 
                         class="rounded-circle mb-3" width="100" height="100">
                    <h5 class="mb-0">{{ Auth::user()->name }}</h5>
                    <small class="text-muted">{{ Auth::user()->email }}</small>
                </div>
                <ul class="list-group list-group-flush">
                    <a href="#" class="list-group-item list-group-item-action">Editar Perfil</a>
                    <a href="{{ route('password.request') }}" class="list-group-item list-group-item-action">Alterar Senha</a>
                    <a href="#" class="list-group-item list-group-item-action text-danger" 
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Sair
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </ul>
            </div>
        </div>

        <!-- Conteúdo principal -->
        <div class="col-md-9">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4>Bem-vindo, {{ Auth::user()->name }} 👋</h4>
                    <p>Essa é sua área de perfil. Aqui você poderá gerenciar suas informações pessoais e preferências.</p>

                    <div class="mt-4">
                        <h6>Informações básicas</h6>
                        <p><strong>Nome:</strong> {{ Auth::user()->name }}</p>
                        <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                        <p><strong>Criado em:</strong> {{ Auth::user()->created_at->format('d/m/Y') }}</p>
                        <!-- Adicione mais campos personalizados se quiser -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
