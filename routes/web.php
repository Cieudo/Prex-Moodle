<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Página inicial
Route::get('/', function () {
    return view('welcome');
});

// Rotas com proteção por tipo de usuário
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('dashboards.admin');
    })->name('admin.dashboard');
});

Route::resource('professor/cursos', App\Http\Controllers\Professor\CursoController::class)->names('professor.cursos');


Route::middleware(['auth', 'role:professor'])->group(function () {
    Route::get('/professor/dashboard', function () {
        return view('dashboards.professor');
    })->name('professor.dashboard');
});

Route::middleware(['auth', 'role:aluno'])->group(function () {
    Route::get('/aluno/dashboard', function () {
        return view('dashboards.aluno');
    })->name('aluno.dashboard');
});

// Auth padrão do Laravel
Auth::routes();

// Rota /home (opcional)
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->prefix('professor')->name('professor.')->group(function () {
    Route::resource('cursos', App\Http\Controllers\Professor\CursoController::class);
});


