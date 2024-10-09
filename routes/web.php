<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ItensController;
use App\Http\Controllers\MovementController;
use App\Http\Controllers\Report;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::resource('produtos', ItensController::class);
Route::resource('categorias', CategoriesController::class);
Route::resource('movimentacao', MovementController::class);

Route::get('/relatorio', [Report::class, 'index'])->name('reports');