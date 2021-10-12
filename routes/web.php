<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoffeeController;
use App\Http\Controllers\CoffeeCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('coffees.index');
});


Route::prefix('coffees')->group(function () {
    Route::get('', [CoffeeController::class, 'index'])->name('coffees.index');
    Route::get('/create', [CoffeeController::class, 'create'])->name('coffees.create');
    Route::post('/create', [CoffeeController::class, 'store'])->name('coffees.store');
    Route::get('{id}/update', [CoffeeController::class, 'edit'])->name('coffees.update');
    Route::post('{id}/update', [CoffeeController::class, 'update'])->name('coffees.edit');
    Route::get('{id}/delete', [CoffeeController::class, 'destroy'])->name('coffees.delete');
    Route::get('/search', [CoffeeController::class, 'search'])->name('coffees.search');
});


Route::prefix('categories')->group(function () {
    Route::get('', [CoffeeCategoryController::class, 'index'])->name('categories.index');
    Route::get('/create', [CoffeeCategoryController::class, 'create'])->name('categories.create');
    Route::post('/create', [CoffeeCategoryController::class, 'store'])->name('categories.store');
    Route::get('{id}/edit', [CoffeeCategoryController::class, 'edit'])->name('categories.edit');
    Route::post('{id}/edit', [CoffeeCategoryController::class, 'update'])->name('categories.update');
    Route::get('{id}/delete', [CoffeeCategoryController::class, 'destroy'])->name('categories.delete');
});