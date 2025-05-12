<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Perfil - PREX Moodle</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Ícones -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            min-height: 100vh;
            background-color: #0d6efd;
            color: white;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #f8f9fa;
            color: #0d6efd;
        }
    </style>
</head>
<body>
<div class="d-flex">
    <!-- Sidebar -->
    <div class="sidebar p-3 col-md-3 col-lg-2">
        <div class="d-flex align-items-center mb-4">
            <img src="{{ asset('images/brasaouespi.png') }}" alt="Logo" class="img-fluid me-2" style="width: 50px;">
            <h4 class="mb-0">PREX Moodle</h4>
        </div>
        <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="#" class="nav-link"><i class="bi bi-house-door"></i> Início</a></li>
            <li class="nav-item mb-2"><a href="{{ route('professor.cursos.index') }}" class="nav-link"><i class="bi bi-book"></i> Meus Cursos</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link"><i class="bi bi-clipboard-check"></i> Atividades</a></li>            <li class="nav-item mt-4">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-outline-light w-100"><i class="bi bi-box-arrow-right"></i> Sair</button>
                </form>
            </li>
        </ul>
    </div>

    <!-- Conteúdo Principal -->
    <div class="container-fluid p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Perfil do Usuário</h2>
            <span class="text-muted">📅 {{ now()->format('d/m/Y') }}</span>
        </div>

        <div class="row">
            <!-- Card com foto e ações -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <img src="{{ Auth::user()->profile_photo_url ?? 'https://avatars.githubusercontent.com/u/115884125?v=4' }}"
                             alt="Foto de Perfil"
                             class="rounded-circle mb-3"
                             width="120" height="120">
                        <h5 class="mb-0">{{ Auth::user()->name }}</h5>
                        <p class="text-muted">{{ Auth::user()->email }}</p>

                        <div class="d-grid gap-2 mt-3">
                            <a href="#" class="btn btn-outline-primary btn-sm">Editar Perfil</a>
                            <a href="{{ route('password.request') }}" class="btn btn-outline-secondary btn-sm">Alterar Senha</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Informações do perfil -->
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5>Informações Pessoais</h5>
                        <p><strong>Nome:</strong> {{ Auth::user()->name }}</p>
                        <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                        <p><strong>Data de cadastro:</strong> {{ Auth::user()->created_at->format('d/m/Y') }}</p>
                        {{-- Adicione outros campos aqui, se houver --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
