<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('/user', 'App\Http\Controllers\Auth\RegisteredUserController')->middleware(['auth']);
Route::resource('/plantacoes', 'App\Http\Controllers\PlantacoesController')->middleware(['auth']);
Route::resource('/negociantes', 'App\Http\Controllers\NegociantesController')->middleware(['auth']);
Route::resource('/insumos', 'App\Http\Controllers\InsumosController')->middleware(['auth']);
Route::resource('/insumos_transacao', 'App\Http\Controllers\InsumosTransacaoController')->middleware(['auth']);
Route::resource('/produtos_transacao', 'App\Http\Controllers\ProdutosTransacaoController')->middleware(['auth']);
Route::resource('/transacao', 'App\Http\Controllers\TransacaoController')->middleware(['auth']);
Route::resource('/produtos', 'App\Http\Controllers\ProdutosController')->middleware(['auth']);
Route::resource('/notas', 'App\Http\Controllers\NotasController')->middleware(['auth']);
require __DIR__.'/auth.php';
