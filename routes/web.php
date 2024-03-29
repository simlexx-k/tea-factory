<?php

use Illuminate\Support\Facades\Route;

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
});

use App\Http\Controllers\FarmerController;
Route::get('/farmers/create', [FarmerController::class, 'create'])->name('farmers.create');
Route::post('/farmers', [FarmerController::class, 'store'])->name('farmers.store');
Route::get('/farmers/list', [FarmerController::class, 'list'])->name('farmers.list');

use App\Http\Controllers\RegistrationController;

Route::get('/registrations', [RegistrationController::class, 'registrations'])->name('registrations');

use App\Http\Controllers\RecordsController;

Route::get('/records/create', [RecordsController::class, 'create'])->name('records.create');
Route::get('/records/list', [RecordsController::class, 'list'])->name('records.list');
Route::get('/records/manage', [RecordsController::class, 'manage'])->name('records.manage');


use App\Http\Controllers\PaymentsController;

Route::get('/payments', [PaymentsController::class, 'payments'])->name('payments');

use App\Http\Controllers\ReportsController;

Route::get('/reports', [ReportsController::class, 'reports'])->name('reports');

use App\Http\Controllers\PickPointController;

Route::get('/pickpoints/create', [PickPointController::class, 'create'])->name('pickpoints.create');
Route::post('/pickpoints', [PickPointController::class, 'store'])->name('pickpoints.store');

