<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\UnitType;
use Illuminate\Support\Facades\Cache;

class UnitTypeController extends Controller
{
    public function slugs()
    {
        $minutes = 120;
        $slugs = Cache::remember('unitTypeFilters', $minutes, function () {
            return UnitType::whereHas('products')->orderBy('slug')->pluck('slug')->toArray();
        });

        return response()->json($slugs);
    }
}
