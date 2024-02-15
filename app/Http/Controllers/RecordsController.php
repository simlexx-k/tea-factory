<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PickPoint;
use App\Models\Farmer;

class RecordsController extends Controller
{
    public function create()
    {
        return view('records.create');
    }
    public function list()
    {
        return view('records.list');
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
        Farmer::create($validatedData);

        return redirect()->route('records.create')->with('success', 'Pick point added successfully!');
    }
}
