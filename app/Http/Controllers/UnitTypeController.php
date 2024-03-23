<?php

namespace App\Http\Controllers;

use App\Models\UnitType;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UnitTypeController extends Controller
{

    public function index()
    {
        return Inertia::render('UnitType', [
            'unitTypes' => UnitType::all()
        ]);
    }
}
