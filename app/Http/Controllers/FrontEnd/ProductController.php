<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Range;
use App\Models\UnitType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['range', 'unitType', 'primaryImage'])->where('sold_at', null);

        if (isset($_GET['range'])) {
            $products->whereIn('range_id', Range::whereIn('slug', explode(',', $_GET['range']))->pluck('id'));
        }
        if (isset($_GET['unit_type'])) {
            $products->whereIn('unit_type_id', UnitType::whereIn('slug', explode(',', $_GET['unit_type']))->pluck('id'));
        }
        if (isset($_GET['quality'])) {
            $products->whereIn('quality', explode(',', $_GET['quality']));
        }
        if (isset($_GET['material'])) {
            $products->whereIn('material', explode(',', $_GET['material']));
        }
        return view('product.index', [
            'products' => $products->where('published', 1)->paginate(15)->withQueryString()
        ]);
    }

    public function show($slug)
    {

        $product = Product::where('slug', $slug)->with(['range', 'unitType'])->first();

        $relatedRangeProducts = Product::where('published', 1)
            ->where('sold_at', null)
            ->where('id', '!=', $product->id)
            ->where('range_id', $product->range_id)
            ->inRandomOrder()
            ->limit(4)
            ->get(['title', 'slug', 'price']);

        $relatedUnitTypeProducts = Product::where('published', 1)
            ->where('sold_at', null)
            ->where('id', '!=', $product->id)
            ->where('unit_type_id', $product->unit_type_id)
            ->inRandomOrder()
            ->limit(4)
            ->get(['title', 'slug', 'price']);

        return view('product.show', [
            'product' => $product,
            'relatedRangeProducts' => $relatedRangeProducts,
            'relatedUnitTypeProducts' => $relatedUnitTypeProducts
        ]);
    }
}
