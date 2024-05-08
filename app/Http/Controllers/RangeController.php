<?php

namespace App\Http\Controllers;

use App\Models\Range;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Str;

class RangeController extends Controller
{

    public function index()
    {
        return Inertia::render('Ranges', [
            'ranges' => Range::all()
        ]);
    }

    public function add()
    {
        return Inertia::render('RangeForm');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $range = Range::create([
            'title' => $request->title,
            'description' => $request->description,
            'slug' => Str::slug($request->title),
            'banner_path' => 'storage/images/range_banners/range_banner.png',
        ]);

        return response()->json($range);
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $range = Range::where('slug', $request->slug)->firstOrFail();

        $range->update([
            'title' => $request->title,
            'description' => $request->description,
            'banner_path' => $request->banner_path,
        ]);

        return response()->json($range);
    }


    public function show($slug)
    {
        $range = Range::where('slug', $slug)->firstOrFail();

        return Inertia::render('RangeForm', [
            'rangeToEdit' => $range
        ]);
    }
}
