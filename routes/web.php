<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FarmerController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/farmers/create', [FarmerController::class, 'create']);
    Route::post('/farmers', [FarmerController::class, 'store']);
});
use App\Http\Controllers\RegistrationController;

Route::get('/registrations', [RegistrationController::class, 'index'])->name('registrations.index');

use App\Http\Controllers\RecordsController;

Route::get('/records', [RecordsController::class, 'records'])->name('records');

use App\Http\Controllers\PaymentsController;

Route::get('/payments', [PaymentsController::class, 'payments'])->name('payments');

use App\Http\Controllers\ReportsController;

Route::get('/reports', [ReportsController::class, 'reports'])->name('reports');
