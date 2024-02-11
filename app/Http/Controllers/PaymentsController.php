<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    // Method to display the registration view
    public function payments()
    {
        return view('payment'); // Assuming 'registration.blade.php' exists in the 'resources/views' directory
    }
}
