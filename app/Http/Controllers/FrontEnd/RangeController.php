<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Range;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class RangeController extends Controller
{
    public function index()
    {
        return view('range.index', ['ranges' => Range::whereHas('products')->get()]);
    }

    public function slugs()
    {
        $minutes = 120;
        $slugs = Cache::remember('rangeFilters', $minutes, function () {
            return Range::whereHas('products')->orderBy('slug')->pluck('slug')->toArray();
        });

        return response()->json($slugs);
    }
}
