<?php

use App\Http\Controllers\GitController;
use Illuminate\Support\Facades\Route;


//Rota inicial
Route::get('/', [GitController::class, 'index'])->name('index');

//Rota de salvar o usuário.
Route::post('/salvar', [GitController::class, 'save'])->name('save');

//Rota de deletar um usuário
Route::delete('/delete/{id}', [GitController::class, 'delete'])->name('delete');
