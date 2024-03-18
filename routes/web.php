<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ApplicationsController;
use App\Http\Controllers\AppointmentsController;
use App\Http\Controllers\PaymentsController;
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


// PUBLIC ROUTES
Route::get('/', [PublicController::class, 'index'])->name('home');
Route::get('/requirements', [PublicController::class, 'requirements'])->name('requirements');
Route::get('/about-us', [PublicController::class, 'about_us'])->name('about_us');
Route::get('/faqs', [PublicController::class, 'faqs'])->name('faqs');


// AUTHENTICATED ROUTES
Route::middleware('auth')->prefix('dashboard')->group(function () {
    //Load dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    //APPLICATIONS
    Route::resources([
        //start applications
        'applications' => ApplicationsController::class,
        //start appointments
        'appointments' => AppointmentsController::class,
        //start payments
        'payments' => PaymentsController::class,
    ]);
});

// Route::get('/application', function () {
//     return view('modules.application');
// })->name('application');

Route::get('/test', [ProfileController::class, 'test'])->name('test');

Route::get('/testmail', [ProfileController::class, 'testmail'])->name('testmail');

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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//logout
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

