<?php

use App\Http\Controllers\PlantController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;


Route::get('/plants', [PlantController::class, 'index']);
Route::get('/plants/create', [PlantController::class, 'create'])->middleware('auth', 'can:edit');
Route::get('/plants/about', [PlantController::class, 'about']);
Route::post('/plants', [PlantController::class, 'store'])->middleware('auth', 'can:edit');
Route::get('/plants/search', [PlantController::class, 'search']);
Route::get('/plants/{id}', [PlantController::class, 'show'])->middleware('auth');
Route::get('/plants/{id}/edit', [PlantController::class, 'edit'])->middleware('auth', 'can:edit');
Route::patch('/plants/{id}', [PlantController::class, 'update'])->middleware('auth', 'can:edit');
Route::delete('/plants/{id}', [PlantController::class, 'destroy'])->middleware('auth', 'can:edit');

// Login
Route::get('/login', [AuthController::class, 'index'])->name("login");
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

// Register
Route::get('/register', [RegisterController::class, 'show'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);


// Maintenance task routes
Route::get('/plants/{plant}/maintenances/create', [PlantController::class, 'createMaintenance'])
    ->middleware(['auth', 'can:edit']);

Route::post('/plants/{plant}/maintenances', [PlantController::class, 'storeMaintenance'])
    ->middleware(['auth', 'can:edit']);

// Journal routes
Route::get('/plants/{plant}/journals/create', [PlantController::class, 'createJournal'])
    ->middleware(['auth', 'can:edit']);

Route::post('/plants/{plant}/journals', [PlantController::class, 'storeJournal'])
    ->middleware(['auth', 'can:edit']);
