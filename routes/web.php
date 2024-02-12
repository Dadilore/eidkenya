<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Applications;
use App\Http\Controllers\payController;
use App\http\Controllers\mpesa\mpesaController;
use App\http\Controllers\Auth\AuthenticatedSessionController;


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

// payment routes
Route::get('/pay', [PayController::class, 'stk']);

Route::get('/payment', function () {
    return view('payment');
})->name('payment');

Route::get('/application', function () {
    return view('modules.application');
})->name('application');

Route::post('get-token', [MPESAController::class, 'getAccessToken']);

// Assuming 'make_payment' is the name of your Blade view file
// Route::get('/make-payment', function () {
//     return view('make_payment'); 
// })->name('make-payment');

// Route to handle the B2C payment submission
// Route::post('/make-payment', [PayController::class, 'b2c'])->name('submit-payment');



//end payments

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

