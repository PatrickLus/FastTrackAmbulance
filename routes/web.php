<?php


use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\RequestAmbulanceController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
//use App\Http\Controllers\PhotosController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\UserManagementController;
//use App\Http\Controllers\LockScreen;


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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/user-location', [RequestAmbulanceController::class, 'newRequest']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('home', function () {
        return view('home');
    });
});

Auth::routes();

// ----------------------------- home dashboard ------------------------------//
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/request', [HomeController::class, 'requestAmbulanceView'])->name('req_am');
Route::post('/request', [HomeController::class, 'requestAmbulanceAction'])->name('req_am_act');

// ----------------------------- hospital dashboard ------------------------------//
Route::get('/hospital', [HospitalController::class, 'index'])->name('hospital_name');
Route::get('/hospital/request/{id}', [HospitalController::class, 'detail'])->name('hospital_req');

// -----------------------------login----------------------------------------//
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


// ------------------------------ register ---------------------------------//
Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register', [RegisterController::class, 'storeUser'])->name('register');

// ----------------------------- forget password ----------------------------//
Route::get('/forget-password', [ForgotPasswordController::class, 'getEmail'])->name('forget-password');
Route::post('forget-password', [ForgotPasswordController::class, 'postEmail'])->name('forget-password');

// ----------------------------- reset password -----------------------------//
Route::get('reset-password/{token}', [ResetPasswordController::class, 'getPassword'])->name('getPassword');
Route::post('reset-password', [ResetPasswordController::class, 'updatePassword'])->name('updatePassword');

// ----------------------------- Admin -----------------------------//
Route::controller(AdminController::class)->group(function () {
    Route::get('admin/', 'index')->name('admin_home');
    Route::get('admin/add-hospital', 'addHospital')->name('admin_add_hospital');
    Route::get('admin/view-hospital', 'viewHospital')->name('admin_view_hospital');
    Route::get('admin/view-patient', 'viewPatient')->name('admin_view_patient');
});

// ----------------------------- Form -----------------------------//
Route::controller(FormController::class)->group(function () {
    Route::get('/form/viewDetails', 'view');
    Route::post('/form/save', 'save')->name('save_hospital');
    Route::get('/form/update', 'update');
    Route::get('/form/delete{id}', 'delete')->middleware('auth');
});


