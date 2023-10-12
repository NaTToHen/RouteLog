<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('login');
})->name('login');

Route::post('/auth', [LoginController::class, 'auth'])->name('login.auth');
Route::get('/deslogar', [LoginController::class, 'logout'])->name('login.logout');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/usuario', [UsuarioController::class, 'index'])->name('usuario.index');

Route::get('/produtos', [AdminController::class, 'produtos'])->name('admin.produtos');
Route::post('/produtos/adicionar', [AdminController::class, 'adicionarProduto'])->name('admin.addProdutos');
Route::get('/produtos/{id}/delete', [AdminController::class, 'confirmaExcluirProduto'])->name('produto.confirmDelete');
Route::delete('/produtos/{id}', [AdminController::class, 'excluir'])->name('produto.excluir');
Route::post('/produtos/{id}/editar', [AdminController::class, 'editarProduto'])->name('produto.editar');

Route::get('/entregas', [AdminController::class, 'entregas'])->name('admin.entregas');
Route::post('/entregas/adicionar', [AdminController::class, 'adicionarEntrega'])->name('entregas.adicionar');
Route::post('/entregas/{id}/editar', [AdminController::class, 'editarEntrega'])->name('entregas.editar');
