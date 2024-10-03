<?php

use App\Http\Controllers\ItensController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

// Route::get('/produtos', [ItensController::class, 'index'])->name('produtos');
Route::resource('produtos', ItensController::class);