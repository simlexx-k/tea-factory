<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function reports()
    {
        return view('reports'); // Assuming 'registration.blade.php' exists in the 'resources/views' directory
    }

}
