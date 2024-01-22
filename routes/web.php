<?php

use App\Http\Controllers\ColaboradorController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FeriadoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistroPontoController;
use App\Http\Controllers\UserController;
use App\Models\RegistroPonto;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () { return view('welcome'); })->name('welcome');
Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::post('/logout', [UserController::class, 'logout'])->name('logout');

//ROTA PARA O USUARIO
Route::get('/registrar_ponto', [RegistroPontoController::class, 'create'])->name('registro_ponto.index');
Route::post('/registrar_ponto/store', [RegistroPontoController::class, 'store'])->name('registro_ponto.store');

Auth::routes();

//ROTA PARA O ADMIN
Route::group(['middleware' => ['auth']], function () {
    Route::get('/feriados', [FeriadoController::class, 'index'])->name('feriados.index');
    Route::get('/feriados/create', [FeriadoController::class, 'create'])->name('feriados.create');
    Route::post('/feriados', [FeriadoController::class, 'store'])->name('feriados.store');
    Route::get('/feriados/{id}/edit', [FeriadoController::class, 'edit'])->name('feriados.edit');
    Route::put('/feriados/{id}', [FeriadoController::class, 'update'])->name('feriados.update');
    Route::get('/feriados/{id}', [FeriadoController::class, 'destroy'])->name('feriados.destroy');

    Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios.index');
    Route::get('/usuarios/create', [UserController::class, 'create'])->name('usuarios.create');
    Route::post('/usuarios/store', [UserController::class, 'store'])->name('usuarios.store');
    Route::get('/usuarios/{id}/edit', [UserController::class, 'edit'])->name('usuarios.edit');
    Route::put('/usuarios/{id}', [UserController::class, 'update'])->name('usuarios.update');
    Route::post('/usuarios/{id}', [UserController::class, 'destroy'])->name('usuarios.destroy');

    Route::get('/colaboradores', [ColaboradorController::class, 'index'])->name('colaboradores.index');
    Route::get('/colaboradores/create', [ColaboradorController::class, 'create'])->name('colaboradores.inserir');
    Route::post('/colaboradores/store', [ColaboradorController::class, 'store'])->name('colaboradores.store');
    Route::get('/colaboradores/{id}/edit', [ColaboradorController::class, 'edit'])->name('colaboradores.edit');
    Route::put('/colaboradores/{id}', [ColaboradorController::class, 'update'])->name('colaboradores.update');
    Route::post('/colaboradores/{id}', [ColaboradorController::class, 'destroy'])->name('colaboradores.destroy');
});

