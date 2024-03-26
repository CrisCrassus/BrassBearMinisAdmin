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
            'product.title' => 'required',
            'product.description' => 'required',
            'product.price' => 'required',
            'product.keywords' => 'required',
            'product.range_id' => 'required',
            'product.is_featured' => 'required',
            'product.wargear' => 'required',
            'product.ebay_link' => 'required',
            'product.unit_type_id' => 'required',
            'product.model_count' => 'required',
            'product.base_size' => 'required',
            'product.published' => 'required',
        ]);

        $identifier = strtoupper(substr(str_shuffle('abcdefghijklmnopqrstuvwxyz0123456789'), 0, 6));

        $fields = [
            'title' => request()['product']['title'],
            'slug' => Str::uuid()->toString(),
            'description' => request()['product']['description'],
            'identifier' => $identifier,
            'keywords' => request()['product']['keywords'],
            'model_count' => request()['product']['model_count'],
            'features' => request()['product']['features'],
            'price' => request()['product']['price'],
            'range_id' => request()['product']['range_id'],
            'is_featured' => 0,
            'ebay_link' => request()['product']['ebay_link'],
            'unit_type_id' => request()['product']['unit_type_id'],
            'wargear' => request()['product']['wargear'],
            'material' => request()['product']['material'],
            'base_size' => request()['product']['base_size'],
            'published' => 0
        ];

        $product = Product::create($fields);

        return $product;
    }

    public function update($slug)
    {

        request()->validate([
            'product.title' => 'required',
            'product.description' => 'required',
            'product.price' => 'required',
            'product.keywords' => 'required',
            'product.range_id' => 'required',
            'product.is_featured' => 'required',
            'product.wargear' => 'required',
            'product.ebay_link' => 'required',
            'product.unit_type_id' => 'required',
            'product.model_count' => 'required',
            'product.base_size' => 'required',
            'product.published' => 'required',
        ]);

        $product = Product::where('slug', $slug)->firstOrFail();

        $product->update([
            'title' => request()['product']['title'],
            'description' => request()['product']['description'],
            'identifier' => strtoupper(substr(str_shuffle('abcdefghijklmnopqrstuvwxyz0123456789'), 0, 6)),
            'keywords' => request()['product']['keywords'],
            'model_count' => request()['product']['model_count'],
            'features' => request()['product']['features'],
            'price' => request()['product']['price'],
            'range_id' => request()['product']['range_id'],
            'is_featured' => request()['product']['is_featured'],
            'ebay_link' => request()['product']['ebay_link'],
            'unit_type_id' => request()['product']['unit_type_id'],
            'wargear' => request()['product']['wargear'],
            'material' => request()['product']['material'],
            'base_size' => request()['product']['base_size'],
            'sold_at' => request()['product']['sold_at'],
            'published' => request()['product']['published']
        ]);

        return request();
    }
}
