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
Route::resource('/produtos_vendas', 'App\Http\Controllers\ProdutosVendaController')->middleware(['auth']);
require __DIR__.'/auth.php';
