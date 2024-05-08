<?php

use App\Http\Controllers\FrontEnd\ProductController as FrontEndProductController;
use App\Http\Controllers\FrontEnd\RangeController as FrontEndRangeController;
use App\Http\Controllers\FrontEnd\UnitTypeController as FrontEndUnitTypeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RangeController;
use App\Http\Controllers\UnitTypeController;

use App\Models\Image;
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

Route::get('/products', FrontEndProductController::class . '@index')->name('fe.products');
Route::get('/products/{slug}', FrontEndProductController::class . '@show')->name('fe.products.show');

Route::get('/ranges', [FrontEndRangeController::class, 'index'])->name('fe.ranges');
Route::get('/ranges/{slug}', [FrontEndRangeController::class, 'show'])->name('fe.ranges.show');

Route::post('/send-mail', [MailController::class, 'store'])->name('send-mail');

Route::prefix('api')->group(function () {
    Route::get('/ranges', [FrontEndRangeController::class, 'slugs'])->name('ranges.slugs');
    Route::get('/unit-types', [FrontEndUnitTypeController::class, 'slugs'])->name('unit-types.slugs');
});


Route::middleware(['auth', 'verified'])->group(function () {

    Route::prefix('api')->group( function() {
        Route::delete('/admin/products/delete/{slug}', [ProductController::class, 'delete'])->name('products.delete');
    });

    Route::get('/admin', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/admin/products', [ProductController::class, 'index'])->name('products');
    Route::get('/admin/products/{slug}', [ProductController::class, 'show'])->name('products.edit');
    Route::get('/admin/add-products', [ProductController::class, 'add'])->name('products.add');
    Route::post('/admin/products', [ProductController::class, 'store'])->name('products.store');
    Route::post('/admin/products/{slug}', [ProductController::class, 'update'])->name('products.update');

    Route::post('/admin/images/upload', [ImageController::class, 'upload'])->name('image.upload');
    Route::post('/admin/images/bannerUpload', [ImageController::class, 'bannerUpload'])->name('image.banner-upload');

    Route::get('/admin/ranges', [RangeController::class, 'index'])->name('ranges');
    Route::get('/admin/ranges/{slug}', [RangeController::class, 'show'])->name('ranges.edit');
    Route::get('/admin/add-range', [RangeController::class, 'add'])->name('ranges.add');
    Route::post('/admin/ranges', [RangeController::class, 'store'])->name('ranges.store');
    Route::post('/admin/ranges/{slug}', [RangeController::class, 'update'])->name('ranges.update');

    Route::get('/admin/unit-types', [UnitTypeController::class, 'index'])->name('unit-types');
    Route::get('/admin/unit-types/{slug}', [UnitTypeController::class, 'show'])->name('unit-types.edit');
    Route::get('/admin/add-unit-types', [UnitTypeController::class, 'add'])->name('unit-types.add');
    Route::post('/admin/unit-types', [UnitTypeController::class, 'store'])->name('unit-types.store');
    Route::post('/admin/unit-types/{slug}', [UnitTypeController::class, 'update'])->name('unit-types.update');

    Route::get('/admin/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/admin/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/admin/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
