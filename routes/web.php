<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsuarioController;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
Route::get('/usuarios/restaurar', [UsuarioController::class, 'restaurar'])->name('usuarios.restaurar');
Route::delete('/usuarios/borrado_d', [UsuarioController::class, 'borrado_d'])->name('usuarios.borrado_d');
Route::delete('/usuarios/delete/{id}', [UsuarioController::class, 'borrar'])->name("usuarios.borrar");