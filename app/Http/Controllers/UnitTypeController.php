<?php

namespace App\Http\Controllers;

use App\Models\UnitType;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Str;

class UnitTypeController extends Controller
{

    public function index()
    {
        return Inertia::render('UnitType', [
            'unitTypes' => UnitType::all()
        ]);
    }

    public function add() {
        return Inertia::render('UnitTypeForm');
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
        ]);

        $unitType = UnitType::create([
            'title' => $request->title,
            'description' => $request->description,
            'slug' => Str::slug($request->title),
        ]);

        return response()->json($unitType);
    }

    public function update(Request $request) {
        $request->validate([
            'title' => 'required',
        ]);

        $unitType = UnitType::where('slug', $request->slug)->firstOrFail();

        $unitType->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return response()->json($unitType);
    }

    public function show($slug) {
        $unitType = UnitType::where('slug', $slug)->firstOrFail();

        return Inertia::render('UnitTypeForm', [
            'unitTypeToEdit' => $unitType
        ]);
    }
}
