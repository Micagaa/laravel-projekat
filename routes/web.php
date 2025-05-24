<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\LokacijaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PorudzbinaController;

// Početna strana
Route::get('/', [HomeController::class, 'index'])->name('home');

// Ostale javne strane
Route::get('/katalog', [KatalogController::class, 'index'])->name('katalog');
Route::get('/lokacije', [LokacijaController::class, 'indexPublic'])->name('lokacije');
Route::view('/kontakt', 'contact')->name('kontakt');
Route::get('/plod/{id}', [KatalogController::class, 'show'])->name('plodovi.show');

// Admin - CRUD nad korisnicima
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('/users', UserController::class);
});

// Editor - CRUD nad plodovima
Route::middleware(['auth', 'role:editor'])->group(function () {
    Route::resource('plods', KatalogController::class);
    Route::resource('/lokacijas', LokacijaController::class);

    
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::post('/plod/{id}/poruci', [PorudzbinaController::class, 'store'])->name('porudzbine.store');
     Route::delete('/porudzbine/{id}', [PorudzbinaController::class, 'destroy'])->name('porudzbine.destroy');
});




// Zajedničke rute za sve ulogovane korisnike
Route::middleware(['auth'])->group(function () {
    //Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
