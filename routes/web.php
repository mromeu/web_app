<?php

use App\Http\Controllers\ActivateController;
use App\Http\Controllers\Usuario\CargoController;
use App\Http\Controllers\Usuario\CommonController;
use App\Http\Controllers\Usuario\LoginController;
use App\Http\Controllers\Usuario\PerfilController;
use App\Http\Controllers\Usuario\PermissaoController;
use App\Http\Controllers\Usuario\SetorController;
use App\Http\Controllers\Usuario\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app.usuario.login.login');
})->name('login');


Route::any('/authenticate',[LoginController::class, 'authenticate'])->name('login.authenticate');
Route::any('/logout',[LoginController::class, 'logout'])->name('logout');

Route::prefix('admin')->group(function () {

    Route::get('/home', function () {
        return view('app.home.index');
    })->name('home');

    Route::post('/toggle-status', [ActivateController::class, 'toggleStatus'])
    ->name('toggle.status');

    Route::get('/commons', [CommonController::class, 'index'])->middleware('auth')->name('common.index');
    Route::get('/commons/create', [CommonController::class, 'create'])->middleware('auth')->name('common.create');
    Route::post('/commons/save', [CommonController::class, 'store'])->middleware('auth')->name('common.store');
    Route::any('/common/api/{table_name}', [CommonController::class, 'api'])->middleware('auth')->name('common.api');

    Route::get('/users', [UserController::class, 'index'])->middleware('auth')->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->middleware('auth')->name('user.edit');
    Route::post('/users/save', [UserController::class, 'store'])->name('user.store');
    Route::post('/users/{id}', [UserController::class, 'update'])->middleware('auth')->name('user.update');
    Route::post('/users/change-password', [UserController::class, 'changePassword'])->middleware('auth')->name('user.change_password');
    Route::post('/users/active', [UserController::class, 'active'])->middleware('auth')->name('user.active');
    Route::post('/users/delete', [UserController::class, 'destroy'])->middleware('auth')->name('user.delete');

    Route::get('/perfil', [PerfilController::class, 'index'])->middleware('auth')->name('perfil.index');
    Route::get('/perfil/create', [PerfilController::class, 'create'])->name('perfil.create');
    Route::get('/perfil/{id}/edit', [PerfilController::class, 'edit'])->middleware('auth')->name('perfil.edit');
    Route::post('/perfil/save', [PerfilController::class, 'store'])->middleware('auth')->name('perfil.store');
    Route::post('/perfil/{id}', [PerfilController::class, 'update'])->middleware('auth')->name('perfil.update');
    Route::post('/perfil/{id}/delete', [PerfilController::class, 'destroy'])->name('perfil.delete');

    Route::get('/permissao', [PermissaoController::class, 'index'])->middleware('auth')->name('permissao.index');
    Route::get('/permissao/create', [PermissaoController::class, 'create'])->name('permissao.create');
    Route::get('/permissao/{id}/edit', [PermissaoController::class, 'edit'])->middleware('auth')->name('permissao.edit');
    Route::post('/permissao/save', [PermissaoController::class, 'store'])->middleware('auth')->name('permissao.store');
    Route::post('/permissao/{id}', [PermissaoController::class, 'update'])->middleware('auth')->name('permissao.update');
    Route::post('/permissao/{id}/delete', [PermissaoController::class, 'destroy'])->name('permissao.delete');

    Route::get('/setor', [SetorController::class, 'index'])->middleware('auth')->name('setor.index');
    Route::get('/setor/create', [SetorController::class, 'create'])->name('setor.create');
    Route::get('/setor/{id}/edit', [SetorController::class, 'edit'])->middleware('auth')->name('setor.edit');
    Route::post('/setor/save', [SetorController::class, 'store'])->middleware('auth')->name('setor.store');
    Route::post('/setor/{id}', [SetorController::class, 'update'])->middleware('auth')->name('setor.update');
    Route::post('/setor/{id}/delete', [SetorController::class, 'destroy'])->name('setor.delete');

    Route::get('/cargo', [CargoController::class, 'index'])->middleware('auth')->name('cargo.index');
    Route::get('/cargo/create', [CargoController::class, 'create'])->name('cargo.create');
    Route::get('/cargo/{id}/edit', [CargoController::class, 'edit'])->middleware('auth')->name('cargo.edit');
    Route::post('/cargo/save', [CargoController::class, 'store'])->middleware('auth')->name('cargo.store');
    Route::post('/cargo/{id}', [CargoController::class, 'update'])->middleware('auth')->name('cargo.update');
    Route::post('/cargo/{id}/delete', [CargoController::class, 'destroy'])->name('cargo.delete');
});

