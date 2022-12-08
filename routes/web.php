<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\MedicController;
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

/* All routes in this block have to be logged */
Route::group(['middleware' => 'auth'], function(){
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::get('dashboard/Index', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('dashboard/Create', [ProfileController::class, 'create'])->name('profile.create');
    Route::put('dashboard/Store', [ProfileController::class, 'store'])->name('profile.store');

    Route::view('profile', 'profile')->name('profile');
    Route::put('profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('profile/medico/create', [MedicController::class, 'create'])->name('medic.create');
    Route::post('profile/medico/update', [MedicController::class, 'update'])->name('medic.update');

    

    // Appoinments routes
    Route::prefix('appointments')->name('appointments.')->group(function() {
        Route::get('/', [AppointmentController::class, 'index'])->name('index');
        Route::get('create', [AppointmentController::class, 'create'])->name('create');
        Route::post('store', [AppointmentController::class, 'store'])->name('store');
        Route::post('search', [AppointmentController::class, 'search'])->name('search');
        Route::get('edit/{id}', [AppointmentController::class, 'edit'])->name('edit');
        Route::get('details/{id}', [AppointmentController::class, 'show'])->name('show');
        Route::post('update', [AppointmentController::class, 'update'])->name('update');
    });
    // Route::view('Appointments', 'appointments.index')->name('appointments.index');


    // Patients Routes
    // Route::get('Patients', [PatientController::class, 'index'])->name('patients.index');
    Route::prefix('Patients')->name('patients.')->group(function() {
        Route::get('/', [PatientController::class, 'index'])->name('index');
        Route::get('Records/{id}', [PatientController::class, 'show'])->name('show');
        Route::get('Patient/Records/{id}', [PatientController::class, 'showRecords'])->name('showRecords');
        Route::get('Patient/Records/create/{id}', [PatientController::class, 'createRecords'])->name('createRecords');
        Route::post('Patient/Records/store', [PatientController::class, 'saveRecords'])->name('saveRecords');

    });
});

require __DIR__.'/auth.php';
