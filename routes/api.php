<?php

use App\Http\Controllers\VilaoController;
use App\Http\Controllers\HeroiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/heroi', [HeroiController::class, 'listar']);
Route::get('/heroi/{id}', [HeroiController::class, 'listarPorId']);
Route::post('/heroi', [HeroiController::class, 'criar']);
Route::put('/heroi/{id}', [HeroiController::class, 'editar']);
Route::delete('/heroi/{id}', [HeroiController::class, 'deletar']);

Route::get('/vilao', [VilaoController::class, 'listar']);
Route::get('/vilao/{id}', [VilaoController::class, 'listarPorId']);
Route::post('/vilao', [VilaoController::class, 'criar']);
Route::put('/vilao/{id}', [VilaoController::class, 'editar']);
Route::delete('/vilao/{id}', [VilaoController::class, 'deletar']);