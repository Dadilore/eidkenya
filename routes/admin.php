<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\ApplicationsController;
use App\Http\Controllers\admin\AppointmentsController;
use App\Http\Controllers\admin\PaymentsController;


/*
|--------------------------------------------------------------------------
| Admin Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "admin" middleware group!
|
*/

Route::middleware('auth')->group(function () {
    //Load dashboard
    Route::get('/', [AdminController::class, 'index'])->name('admin_dashboard');
    Route::get('/users', [AdminController::class, 'users'])->name('users');

    //APPLICATIONS
    Route::resources([
        //start applications
        'admin_applications' => ApplicationsController::class,
        //start appointments
        'admin_appointments' => AppointmentsController::class,
        //start payments
        'admin_payments' => PaymentsController::class,
    ]);
});

?>