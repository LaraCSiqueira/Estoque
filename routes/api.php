<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EntradaController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/produto', [ProdutoController::class, 'index']);
Route::post('/produto', [ProdutoController::class, 'store']);
Route::put('/produto/{id}', [ProdutoController::class, 'update']);
Route::delete('/produto/{id}', [ProdutoController::class, 'delete']);

Route::get('/cliente', [ClienteController::class, 'index']);
Route::post('/cliente', [ClienteController::class, 'store']);
Route::put('/cliente/{id}', [ClienteController::class, 'update']);
Route::delete('/cliente/{id}', [ClienteController::class, 'delete']);

Route::get('/entrada', [EntradaController::class, 'index']);
Route::post('/entrada', [EntradaController::class, 'store']);
Route::put('/entrada/{id}', [EntradaController::class, 'update']);
Route::delete('/entrada/{id}', [EntradaController::class, 'delete']);