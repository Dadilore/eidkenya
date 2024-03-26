<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Applications;
use App\Http\Controllers\payController;
use App\http\Controllers\payments\mpesa\mpesaController;
use App\http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\MpesaSTKPUSHController;
use App\Http\Controllers\MPESAC2BController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\MpesaWebhookController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ApplicationsController;
use App\Http\Controllers\pdfController;



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


//START MAIL
Route::get('send',[HomeController::class,"sendnotification"]);

Route::get('send',[HomeController::class,"sendappointmentnotification"]);
//END MAIL


Route::middleware(['auth', 'verified'])->group(function () {
    // Your user dashboard route here
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //START APPLICATIONS
    Route::get('/new_applications', function () {
        return view('applications.new_applications');
    })->name('new_applications');



    Route::get('/update_application/{id}', [ApplicationController::class, 'update_application']);
    
    Route::get('/replacement_applications', function () {
        return view('applications.replacement_applications');
    })->name('replacement_applications');
    
    Route::get('/change_of_particulars', function () {
        return view('applications.change_of_particulars');
    })->name('change_of_particulars');
    
    Route::get('/my_application', [ApplicationController::class, 'my_application']);

    Route::get('/deleteapplication/{id}', [ApplicationController::class, 'deleteapplication']);

    //END APPLICATIONS 


    //START PAYMENTS
    Route::get('/payment', function () {
        return view('payments.payment');
    })->name('payment');

    // Route::get('/pay', [PayController::class, 'stk'])->name('pay.stk');

    // Route::post('/v1/mpesatest/stk/push', [MpesaSTKPUSHController::class, 'STKPush']);


    //iankumu
    Route::post('/v1/mpesatest/stk/push', [MpesaSTKPUSHController::class, 'STKPush'])->name('mpesa.stkpush');
    // Mpesa STK Push Callback Route
    Route::post('v1/confirm', [MpesaSTKPUSHController::class, 'STKConfirm'])->name('mpesa.confirm');

    Route::post('register-urls', [MPESAC2BController::class, 'registerURLS']);


    //codewithben
    Route::post('get-token', [MPESAController::class, 'getAccessToken']);
    Route::post('register-urls', [MPESAController::class, 'registerURLS']);
    Route::post('simulate', [MPESAController::class, 'simulateTransaction']);
    Route::post('stkpush', [MPESAController::class, 'stkPush']);
    Route::post('simulateb2c', [MPESAController::class, 'b2cRequest']);
    Route::post('check-status', [MPESAController::class, 'transactionStatus']);
    Route::post('reversal', [MPESAController::class, 'reverseTransaction']);
    
    Route::get('/test', function () {
        return view('payments.test');
    })->name('test');

    Route::get('/stk', function () {
        return view('payments.stk');
    })->name('stk');

    Route::get('/transaction_status', function () {
        return view('payments.transaction_status');
    })->name('transaction_status');

    //END PAYMENTS

    
    //START APPOINTMENTS
    //BIOMETRICS CAPTURE APPOINTMENTS
    Route::get('/make_appointment', function () {
        return view('biometrics.make_appointment');
    })->name('make_appointment');  

    Route::get('/myappointment', function () {
        return view('biometrics.myappointment');
    })->name('myappointment');

    Route::post('/make_appointment', [AppointmentController::class, 'make_appointment']);

    Route::get('/reschedule_appointment/{id}', [AppointmentController::class, 'reschedule_appointment']);

    Route::post('/edit_appointment/{id}', [AppointmentController::class, 'edit_appointment']);

    Route::get('/check-appointments', 'AppointmentController@checkAppointments');

    Route::get('/myappointment', [AppointmentController::class, 'myappointment']);

    Route::get('/cancel_appoint/{id}', [AppointmentController::class, 'cancel_appoint']);

    //ID PICKUP APPOINTMENTS
    Route::get('/pickup_appointment', function () {
        return view('pickup.pickup_appointment');
    })->name('pickup_appointment'); 

    Route::get('/mypickupappointment', function () {
        return view('biometrics.mypickupappointment');
    })->name('mypickupappointment');
    
    Route::post('/pickup_appointment', [AppointmentController::class, 'pickup_appointment']);

    Route::get('/mypickupappointment', [AppointmentController::class, 'mypickupappointment']);

    Route::get('/pickup_reschedule/{id}', [AppointmentController::class, 'pickup_reschedule']);

    Route::post('/edit_pickup/{id}', [AppointmentController::class, 'edit_pickup']);

    Route::get('/delete_appoint/{id}', [AppointmentController::class, 'delete_appoint']);


    //END APPOINTMENTS

});

Route::post('/seed-user-biometrics', [AdminController::class, 'seedUserBiometrics'])->name('seed.user.biometrics');

//START TRACKING

Route::get('/tracking', function () {
    return view('modules.tracking');
})->name('tracking');

//END TRACKING


Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});

require __DIR__.'/auth.php';

// ADMIN ROUTES

Route::middleware(['auth','role:admin'])->group(function(){

    Route::get('/admin/index', [AdminController::class, 'AdminDashboard'])->name('admin.index');

    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');

    Route::get('/showappointment', [AdminController::class, 'showappointment']);

    Route::get('/view_users', [UsersController::class, 'view_users']);

    Route::get('/view_applications', [ApplicationsController::class, 'view_applications']);

    Route::get('/add_application', [ApplicationsController::class, 'add_application']);
    
    Route::get('/approved/{id}', [AdminController::class, 'approved']);
    
    Route::get('/cancelled/{id}', [AdminController::class, 'cancelled']);

    Route::get('/generate_pdf', [pdfController::class, 'generate_pdf']);
    
    Route::get('/generate_applications_pdf', [pdfController::class, 'generate_applications_pdf']);

    Route::get('/admin/index', [AdminController::class, 'index2'])->name('admin.index');





    
});

// End Group Admin Middleware

//logout
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

