<?php

use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\FuncionarioImportController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});



Route::get('/funcionarios/create', [FuncionarioController::class, 'create'])->name('funcionarios.create');

Route::get('/funcionarios', [FuncionarioController::class, 'index'])
    ->middleware('auth')
    ->name('funcionarios.index');

Route::get('/funcionarios/import', [FuncionarioImportController::class, 'index'])
    ->name('funcionarios.import');
Route::post('/funcionarios/import', [FuncionarioImportController::class, 'store'])
    ->name('funcionarios.import.store');


Route::post('/funcionarios', [FuncionarioController::class, 'store'])->name('funcionarios.store');


require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
