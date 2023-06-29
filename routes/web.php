<?php

use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

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

Route::get('/patient/index', [PatientController::class, 'index']);
Route::get('/patient/add', [PatientController::class, 'addPatient']);
Route::post('/patient/{id}', [PatientController::class, 'update']);

Route::controller(PatientController::class)->group(function () {
    Route::get('/p/index', 'index');
    Route::get('/p/add', 'addPatient');
    Route::post('/p/{id}', 'update');
});
