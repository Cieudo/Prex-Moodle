<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - PREX Moodle</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Ícones Bootstrap -->
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
            background-color: #0b5ed7;
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar p-3 col-md-3 col-lg-2">
            <h4 class="mb-4">PREX Moodle</h4>
            <ul class="nav flex-column">
                <li class="nav-item mb-2"><a href="#" class="nav-link"><i class="bi bi-house-door"></i> Início</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link"><i class="bi bi-book"></i> Meus Cursos</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link"><i class="bi bi-clipboard-check"></i> Atividades</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link"><i class="bi bi-person"></i> Perfil</a></li>
                <li class="nav-item mt-4">
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
                <h2>Olá, {{ Auth::user()->name }}</h2>
                <span class="text-muted">📅 {{ now()->format('d/m/Y') }}</span>
            </div>

            <h4>Meus Cursos</h4>
            <div class="row">
                @foreach ($cursos ?? [] as $curso)
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">{{ $curso->title }}</h5>
                                <p class="card-text">{{ Str::limit($curso->description, 100) }}</p>
                                <p><i class="bi bi-calendar-event"></i> {{ \Carbon\Carbon::parse($curso->start_date)->format('d/m/Y') }} até {{ \Carbon\Carbon::parse($curso->end_date)->format('d/m/Y') }}</p>
                                <a href="#" class="btn btn-primary btn-sm">Acessar Curso</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                @if(empty($cursos) || count($cursos) == 0)
                    <div class="col-12">
                        <p class="text-muted">Nenhum curso disponível no momento.</p>
                    </div>
                @endif
            </div>

            <hr>

            <div class="row">
                <div class="col-md-6">
                    <h5>Notificações</h5>
                    <ul class="list-group">
                        <li class="list-group-item">📢 Novo curso "Extensão em Acessibilidade" disponível.</li>
                        <li class="list-group-item">📝 Prazo para entrega da atividade "Projeto Final" até 10/05.</li>
                        <li class="list-group-item">✅ Curso "Ambientação Moodle" concluído!</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h5>Seu Progresso</h5>
                    <div class="mb-3">
                        <label class="form-label">Curso 1</label>
                        <div class="progress">
                            <div class="progress-bar bg-success" style="width: 70%">70%</div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Curso 2</label>
                        <div class="progress">
                            <div class="progress-bar bg-info" style="width: 45%">45%</div>
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
