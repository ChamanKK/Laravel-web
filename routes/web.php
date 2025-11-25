<?php

use App\Http\Controllers\FilmController;
use App\Http\Controllers\PlantController;
use Illuminate\Support\Facades\Route;

Route::get('/plants', [PlantController::class, 'index']);
Route::get('/plants/create', [PlantController::class, 'create']);
Route::get('/plants/about', [PlantController::class, 'about']);
Route::post('/plants', [PlantController::class, 'store']);
Route::get('/plants/search', [PlantController::class, 'search']);
Route::get('/plants/{id}', [PlantController::class, 'show']);
Route::get('/plants/{id}/edit', [PlantController::class, 'edit']);
Route::patch('/plants', [PlantController::class, 'update']);
Route::delete('/plants', [PlantController::class, 'destroy']);

