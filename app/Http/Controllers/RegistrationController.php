<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    // Method to display the registration view
    public function registrations()
    {
        return view('registration'); // Assuming 'registration.blade.php' exists in the 'resources/views' directory
    }
}
