<?php

namespace App\Http\Controllers;

use App\Models\Range;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RangeController extends Controller
{

    public function index()
    {
        return Inertia::render('Ranges', [
            'ranges' => Range::all()
        ]);
    }
}
