<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RangeController;
use App\Http\Controllers\UnitTypeController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {

    return redirect('/dashboard');
});




Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/admin/products', [ProductController::class, 'index'])->name('products');
    Route::get('/admin/products/{slug}', [ProductController::class, 'show'])->name('products.edit');
    Route::post('/admin/products/{slug}', [ProductController::class, 'update'])->name('products.update');


    Route::get('/admin/ranges', [RangeController::class, 'index'])->name('ranges');

    Route::get('/admin/unit-types', [UnitTypeController::class, 'index'])->name('unit-types');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
