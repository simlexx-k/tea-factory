<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PickPoint;

class PickPointController extends Controller
{
    public function create()
    {
        return view('pickpoints.create');
    }

    public function store(Request $request)
    {
        // Validate request
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            // Add more validation rules as needed
        ]);

        // Create new pick point
        PickPoint::create($validatedData);

        return redirect()->route('pickpoints.create')->with('success', 'Pick point added successfully!');
    }
}
