<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Applications;
use App\Http\Controllers\payController;
use App\http\Controllers\payments\mpesa\mpesaController;
use App\http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\MpesaSTKPUSHController;
use App\Http\Controllers\AppointmentController;


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
    return view('index');
})->name('home');

Route::get('/requirements', function () {
    return view('requirements');
})->name('requirements');

Route::get('/applications', function () {
    return view('applications');
})->name('applications');

Route::get('/new_applications', function () {
    return view('modules.new_applications');
})->name('new_applications');

Route::get('/replacement_applications', function () {
    return view('modules.replacement_applications');
})->name('replacement_applications');

Route::get('/change_of_particulars', function () {
    return view('modules.change_of_particulars');
})->name('change_of_particulars');




//START PAYMENTS
Route::get('/payment', function () {
    return view('modules.payment');
})->name('payment');

// Route::get('/pay', [PayController::class, 'stk'])->name('pay.stk');

// Route::post('/v1/mpesatest/stk/push', [MpesaSTKPUSHController::class, 'STKPush']);


//iankumu
Route::post('/v1/mpesatest/stk/push', [MpesaSTKPUSHController::class, 'STKPush'])->name('mpesa.stkpush');
// Mpesa STK Push Callback Route
Route::post('v1/confirm', [MpesaSTKPUSHController::class, 'STKConfirm'])->name('mpesa.confirm');

//codewithben
Route::post('get-token', [MPESAController::class, 'getAccessToken']);
Route::post('register-urls', [MPESAController::class, 'registerURLS']);
Route::post('simulate', [MPESAController::class, 'simulateTransaction']);
Route::post('stkpush', [MPESAController::class, 'stkPush']);

//END PAYMENTS

Route::get('/test', function () {
    return view('modules.test');
})->name('test');

Route::get('/stk', function () {
    return view('modules.stk');
})->name('stk');

//START APPOINTMENTS
Route::get('/make_appointment', function () {
    return view('modules.make_appointment');
})->name('make_appointment');


Route::get('/myappointment', function () {
    return view('modules.myappointment');
})->name('myappointment');

Route::get('/showappointment', function () {
    return view('admin.showappointment');
})->name('showappointment');

Route::post('/make_appointment', [AppointmentController::class, 'make_appointment']);

Route::get('/myappointment', [AppointmentController::class, 'myappointment']);

Route::get('/cancel_appoint/{id}', [AppointmentController::class, 'cancel_appoint']);

Route::get('/showappointment', [AdminController::class, 'showappointment']);

Route::get('/approved/{id}', [AdminController::class, 'approved']);

Route::get('/cancelled/{id}', [AdminController::class, 'cancelled']);
//END APPOINTMENTS

Route::get('/dashboard', function () {  
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth','role:admin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');

    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');

});// End Group Admin Middleware

//logout
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

