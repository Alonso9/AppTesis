<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PatientController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => 'auth'], function(){
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::view('profile', 'profile')->name('profile');
    Route::put('profile/update', [ProfileController::class, 'update'])->name('profile.update');

    // Appoinments routes
    Route::get('Appointments', [AppointmentController::class, 'index'])->name('appointments.index');
    Route::get('Appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');
    // Route::view('Appointments', 'appointments.index')->name('appointments.index');


    // Patients Routes
    Route::get('Patients', [PatientController::class, 'index'])->name('patients.index');
});

require __DIR__.'/auth.php';
