<?php

use App\Http\Controllers\ContatoController;
use Illuminate\Support\Facades\Route;


Route::get('/', [ContatoController::class,'index']);
Route::get('/index', [ContatoController::class,'index'])->name('contatos.index');
Route::get('/create', [ContatoController::class,'create'])->name('contatos.create');
Route::get('/show/{id}', [ContatoController::class,'show'])->name('contatos.show');
Route::get('/edit/{id}', [ContatoController::class,'edit'])->name('contatos.edit');
Route::post('/store', [ContatoController::class,'store'])->name('contatos.store');
Route::patch('/update/{id}', [ContatoController::class,'update'])->name('contatos.update');
Route::delete('/delete/{id}', [ContatoController::class,'destroy'])->name('contatos.destroy');
