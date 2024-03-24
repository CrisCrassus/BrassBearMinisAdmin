<?php

namespace App\Http\Controllers;

use App\Enums\Feature;
use App\Enums\Material;
use App\Models\Product;
use Illuminate\Support\Str;
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

    public function add()
    {
        $ranges = Range::all(['id', 'title']);
        $unitTypes = UnitType::all(['id', 'title']);
        $materials = Material::getValues();
        $features = Feature::getValues();


        return Inertia::render('ProductForm', [
            'ranges' => $ranges,
            'unitTypes' => $unitTypes,
            'features' => $features,
            'materials' => $materials
        ]);
    }

    public function store()
    {
        request()->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'keywords' => 'required',
            'range_id' => 'required',
            'is_featured' => 'required',
            'wargear' => 'required',
            'ebay_link' => 'required',
            'unit_type_id' => 'required',
            'model_count' => 'required',
            'base_size' => 'required',
            'published' => 'required',
        ]);

        $identifier = strtoupper(substr(str_shuffle('abcdefghijklmnopqrstuvwxyz0123456789'), 0, 6));

        $fields = [
            'title' => request()['title'],
            'slug' => Str::uuid()->toString(),
            'description' => request()['description'],
            'identifier' => $identifier,
            'keywords' => request()['keywords'],
            'model_count' => request()['model_count'],
            'features' => request()['features'],
            'price' => request()['price'],
            'range_id' => request()['range_id'],
            'is_featured' => 0,
            'ebay_link' => request()['ebay_link'],
            'unit_type_id' => request()['unit_type_id'],
            'wargear' => request()['wargear'],
            'material' => request()['material'],
            'base_size' => request()['base_size'],
            'published' => 0
        ];

        $product = Product::create($fields);

        return $product;
    }

    public function update($slug)
    {
        request()->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'keywords' => 'required',
            'range_id' => 'required',
            'is_featured' => 'required',
            'wargear' => 'required',
            'ebay_link' => 'required',
            'unit_type_id' => 'required',
            'model_count' => 'required',
            'base_size' => 'required',
            'published' => 'required',
        ]);

        $product = Product::where('slug', $slug)->firstOrFail();

        $product->update([
            'title' => request()['title'],
            'slug' => Str::uuid()->toString(),
            'description' => request()['description'],
            'identifier' => strtoupper(substr(str_shuffle('abcdefghijklmnopqrstuvwxyz0123456789'), 0, 6)),
            'keywords' => request()['keywords'],
            'model_count' => request()['model_count'],
            'features' => request()['features'],
            'price' => request()['price'],
            'range_id' => request()['range_id'],
            'is_featured' => request()['is_featured'],
            'ebay_link' => request()['ebay_link'],
            'unit_type_id' => request()['unit_type_id'],
            'wargear' => request()['wargear'],
            'material' => request()['material'],
            'base_size' => request()['base_size'],
            'sold_at' => request()->sold_at,
            'published' => request()['published']
        ]);
    }
}
