<?php

use App\Http\Controllers\ContatoController;
use Illuminate\Support\Facades\Route;


Route::get('/', [ContatoController::class,'index']);
Route::get('/index', [ContatoController::class,'index']);
Route::get('/create', [ContatoController::class,'create']);
Route::get('/show/{id}', [ContatoController::class,'show']);
Route::get('/edit/{id}', [ContatoController::class,'edit']);
