<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>PREX - Plataforma de Cursos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f5f5f5;
        }
        .container {
            margin-top: 100px;
            text-align: center;
        }
        img.logo {
            width: 150px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="{{ asset('images/brasaouespi.png') }}" class="logo" alt="Logo da Universidade">
        <h1 class="mb-3">Bem-vindo à Plataforma de Cursos da PREX</h1>
        <p class="mb-4">Aqui você pode se registrar como aluno ou professor, acessar cursos e muito mais!</p>
        <a href="{{ route('login') }}" class="btn btn-primary me-2">Login</a>
        <a href="{{ route('register') }}" class="btn btn-outline-primary">Registrar</a>
    </div>
</body>
</html>
