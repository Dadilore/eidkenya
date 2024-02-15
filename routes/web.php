<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Applications;
use App\Http\Controllers\payController;
use App\http\Controllers\mpesa\mpesaController;
use App\http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\MpesaSTKPUSHController;


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

Route::get('/application', function () {
    return view('modules.application');
})->name('application');



//Start payments
Route::get('/payment', function () {
    return view('modules.payment');
})->name('payment');

// Route::get('/pay', [PayController::class, 'stk'])->name('pay.stk');

// Route::post('/v1/mpesatest/stk/push', [MpesaSTKPUSHController::class, 'STKPush']);

Route::post('/v1/mpesatest/stk/push', [MpesaSTKPUSHController::class, 'STKPush'])->name('mpesa.stkpush');

// Mpesa STK Push Callback Route
Route::post('v1/confirm', [MpesaSTKPUSHController::class, 'STKConfirm'])->name('mpesa.confirm');

Route::post('get-token', [MPESAController::class, 'getAccessToken']);

//end payments

//start appointments

Route::get('/appointments', function () {
    return view('modules.appointments');
})->name('appointments');

//end appointments

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

