<?php

namespace App\Http\Controllers;

use App\Enums\Feature;
use App\Enums\Material;
use App\Models\Product;
use App\Models\Range;
use App\Models\UnitType;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index()
    {
        return Inertia::render('Products', [
            'products' => Product::with('range')->get()
        ]);
    }

    public function show($slug)
    {
            $product = Product::where('slug', $slug)->firstOrFail();
            $ranges = Range::all(['id', 'title']);
            $unitTypes = UnitType::all(['id', 'title']);
            $materials = Material::getValues();
            $features = Feature::getValues();


            return Inertia::render('ProductForm', [
                'productToEdit' => $product,
                'ranges' => $ranges,
                'unitTypes' => $unitTypes,
                'features' => $features,
                'materials' => $materials
            ]);
    }

    public function update($slug) {
        $product = Product::where('slug', $slug)->firstOrFail();

        $product->update(request()->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'features' => 'required',
            'keywords' => 'required',
            'range_id' => 'required',
            'is_featured' => 'required',
            'wargear' => 'required',
            'ebay_link' => 'required',
            'unit_type_id' => 'required',
            'sold_at' => request()->sold_at,
            'material' => 'required',
            'model_count' => 'required',
            'base_size' => 'required',
            'published' => 'required',
        ]));
    }
}
