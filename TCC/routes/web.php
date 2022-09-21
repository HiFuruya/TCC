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
Route::get('/deletar/{user_id}/{plantacao_id}', 'App\Http\Controllers\PlantacoesController@deletar')->name('deletar');
Route::resource('/comprador', 'App\Http\Controllers\CompradorController')->middleware(['auth']);
Route::resource('/vendedor', 'App\Http\Controllers\VendedorController')->middleware(['auth']);
require __DIR__.'/auth.php';
