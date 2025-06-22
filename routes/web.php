<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Página inicial - Dashboard
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Rotas para livros
Route::resource('books', BookController::class);

// Rotas para categorias
Route::resource('categories', CategoryController::class);
