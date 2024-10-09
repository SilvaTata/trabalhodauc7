<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\GeneroController;


Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*Route::get('/autores', function () {
    return view('teste.autores'); });*/

Route::resource('autores', AutorController::class);
Route::resource('livros', LivroController::class);
Route::resource('generos', GeneroController::class);