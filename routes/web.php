<?php

use App\Http\Controllers\FileController;
use App\Http\Controllers\FrontEnd\ProductController as FrontEndProductController;
use App\Http\Controllers\FrontEnd\RangeController as FrontEndRangeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RangeController;
use App\Http\Controllers\UnitTypeController;
use App\Models\Product;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Route::get('/', function () {

//     return redirect('/dashboard');
// });

Route::get('/', function () {

    $minutes = 1440;

    Cache::forget('featuredProducts');

    $products = Cache::remember('featuredProducts', $minutes, function () {
        return Product::where('sold_at', null)
            ->where('published', true)
            ->where('is_featured', true)
            ->join('images', function ($join) {
                $join->on('products.id', '=', 'images.product_id')->where('images.is_primary', true);
            })
            ->select('products.title', 'products.price', 'products.slug', 'images.path')
            ->get();
    });

    return view('index', [
        'featuredProducts' => $products
    ]);
});

Route::get('/products', FrontEndProductController::class . '@index');
Route::get('/products/{slug}', FrontEndProductController::class . '@show');

Route::get('/ranges', FrontEndRangeController::class . '@index');
Route::get('/ranges/{slug}', FrontEndRangeController::class . '@show');

Route::prefix('api')->group(function () {
    Route::get('/ranges', FrontEndRangeController::class . '@slugs');
});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/admin/products', [ProductController::class, 'index'])->name('products');
    Route::get('/admin/products/{slug}', [ProductController::class, 'show'])->name('products.edit');
    Route::get('/admin/add-products', [ProductController::class, 'add'])->name('products.add');
    Route::post('/admin/products', [ProductController::class, 'store'])->name('products.store');
    Route::post('/admin/products/{slug}', [ProductController::class, 'update'])->name('products.update');

    Route::post('/admin/files/upload', [FileController::class, 'upload'])->name('file.upload');

    Route::get('/admin/ranges', [RangeController::class, 'index'])->name('ranges');

    Route::get('/admin/unit-types', [UnitTypeController::class, 'index'])->name('unit-types');
    Route::get('/admin/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/admin/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/admin/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
