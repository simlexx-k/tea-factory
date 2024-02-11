<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecordsController extends Controller
{
    // Method to display the registration view
    public function records()
    {
        return view('records'); // Assuming 'registration.blade.php' exists in the 'resources/views' directory
    }
}
