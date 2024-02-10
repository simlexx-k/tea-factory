<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Farmer;

class FarmerController extends Controller
{
    public function create()
    {
        return view('farmers.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:farmers|max:255',
            'pickpoint' => 'required|string|max:255',
            'phone' => ['required', 'regex:/^\+?[0-9]{10,}$/i'],
            'account' => 'required|integer|unique:farmers|max:255',
            'isValid' => 'required|bool|max:255',
            // Add more validation rules as needed
        ]);

        $farmer = Farmer::create($validatedData);

        return redirect('/')->with('success', 'Farmer registered successfully!');
    }
}
