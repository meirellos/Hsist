<?php

use App\Http\Controllers\GitController;
use Illuminate\Support\Facades\Route;



Route::get('/', [GitController::class, 'index'])->name('index');

Route::post('/salvar', [GitController::class, 'save'])->name('save');

Route::delete('/delete/{id}', [GitController::class, 'delete'])->name('delete');
