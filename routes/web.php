<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Applications;
use App\Http\Controllers\payController;
use App\Http\Controllers\pdfController;
use App\Http\Controllers\smsController;
use App\Notifications\NewsWasPublished;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MPESAC2BController;
use App\Http\Controllers\paymentsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ApplicationsController;
use App\Http\Controllers\MpesaSTKPUSHController;
use App\Http\Controllers\MpesaWebhookController;
use App\http\Controllers\payments\mpesa\mpesaController;
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

Route::get('/sending_sms', function () {
    return view('sending_sms');
})->name('sending_sms');

Route::get('/requirements', function () {
    return view('requirements');
})->name('requirements');

Route::get('/contact_us', function () {
    return view('contact_us');
})->name('contact_us');


Route::get('/about', function () {
    return view('about');
})->name('about');


//START MAIL
Route::get('send',[HomeController::class,"sendnotification"]);

Route::get('send',[HomeController::class,"sendappointmentnotification"]);

// Route::get('send',[HomeController::class,"sendpickupnotification"]);

Route::get('send/{applicationId}', [HomeController::class, 'sendpickupnotification'])->name('send.pickup.notification');

Route::post('/contact_us', [HomeController::class, 'sendMessage'])->name('contact.send');


//END MAIL

// AUTHENTICATED ROUTES
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

    Route::get('/send-notification', function () {
        $userId = Auth::id(); // Retrieve the ID of the currently authenticated user
        $user = User::find($userId); // Retrieve the user you want to notify
        $user->notify(new NewsWasPublished()); // Trigger the notification

    })->name('send.notification');


    //START PAYMENTS
    Route::get('/payment', function () {
        return view('payments.payment');
    })->name('payment');

    Route::get('/payment/{application_id}', [MpesaSTKPUSHController::class, 'STKPush'])->name('mpesa.stkpush');

    // Route::get('/pay', [PayController::class, 'stk'])->name('pay.stk');

    // Route::post('/v1/mpesatest/stk/push', [MpesaSTKPUSHController::class, 'STKPush']);


    //iankumu
    Route::post('/v1/mpesatest/stk/push', [MpesaSTKPUSHController::class, 'STKPush'])->name('mpesa.stkpush');
    
    // Mpesa STK Push Callback Route
    Route::post('v1/confirm', [MpesaSTKPUSHController::class, 'STKConfirm'])->name('mpesa.confirm');

    Route::post('register-urls', [MPESAC2BController::class, 'registerURLS']);

    Route::post('/mpesa-webhook', [MpesaSTKPUSHController::class, 'handleCallback'])->name('mpesa.webhook');





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

    //START INVOICE

    Route::get('/generate_invoice_pdf', [pdfController::class, 'generate_invoice_pdf'])->name('generate_invoice_pdf');

    //END INVOICE

    // Route::get('/send-sms', [smscontroller::class, 'sms']);
    
    //START APPOINTMENTS
    //BIOMETRICS CAPTURE APPOINTMENTS

    Route::get('/myappointment', function () {
        return view('biometrics.myappointment');
    })->name('myappointment');

    Route::get('/biometrics_form/{application_id}', [AppointmentController::class, 'showBiometricsForm'])->name('biometrics_form');

    Route::post('/make_appointment/{application_id}', [AppointmentController::class, 'make_biometrics_appointment'])->name('make_biometrics_appointment');

    Route::get('/reschedule_appointment/{id}', [AppointmentController::class, 'reschedule_appointment']);

    Route::post('/edit_appointment/{id}', [AppointmentController::class, 'edit_appointment']);

    Route::get('/check-appointments', 'AppointmentController@checkAppointments');

    Route::get('/myappointment', [AppointmentController::class, 'myappointment'])->name('myappointment');




    Route::get('/cancel_appoint/{id}', [AppointmentController::class, 'cancel_appoint']);

    //ID PICKUP APPOINTMENTS
    Route::get('/pickup_appointment', function () {
        return view('pickup.pickup_appointment');
    })->name('pickup_appointment'); 

    Route::get('/mypickupappointment', function () {
        return view('biometrics.mypickupappointment');
    })->name('mypickupappointment');
    
    Route::post('/pickup_appointment/{application_id}', [AppointmentController::class, 'make_pickup_appointment'])->name('make_pickup_appointment');

    Route::get('/pickup_form/{application_id}', [AppointmentController::class, 'showPickupForm'])->name('pickup_form');



    // Route::get('/mypickupappointment', [AppointmentController::class, 'mypickupappointment']);

    
    Route::get('/mypickupappointment', [AppointmentController::class, 'mypickupappointment'])->name('mypickupappointment');

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

    Route::get('/showpickupappointment', [AdminController::class, 'showappointment2']);

    Route::get('/add_application', function () {
        return view('admin.applications.add_application');
    })->name('add_application');

    Route::resources([
        'users' => UsersController::class,
    ]);

    Route::get('admin/users/create', [UsersController::class, 'create'])->name('admin.users.create');

    Route::post('admin/users/store', [UsersController::class, 'store'])->name('admin.users.store');

    Route::get('admin/users/edit/{id}', [UsersController::class, 'edit'])->name('admin.users.edit');

    Route::post('admin/users/update/{id}', [UsersController::class, 'update'])->name('admin.users.update');

    Route::get('admin/users/destroy/{id}', [UsersController::class, 'destroy'])->name('admin.users.destroy');

    
    Route::get('/admin/users', [UsersController::class, 'index'])->name('admin.users.index');

    Route::get('/view_applications', [ApplicationsController::class, 'view_applications'])->name('view_applications');

    Route::get('/view_applications4', [ApplicationsController::class, 'view_applications4'])->name('view_applications4');

    Route::get('/view_payments', [paymentsController::class, 'view_payments']);

    Route::get('/add_application', [ApplicationsController::class, 'add_application']);
    
    Route::get('/approved/{id}', [AdminController::class, 'approved']);

    Route::get('/approved2/{id}', [AdminController::class, 'approved2']);
    
    Route::get('/cancelled/{id}', [AdminController::class, 'cancelled']);

    Route::get('/cancelled2/{id}', [AdminController::class, 'cancelled2']);

    Route::get('/generate_pdf', [pdfController::class, 'generate_pdf']);
    
    Route::get('/generate_applications_pdf', [pdfController::class, 'generate_applications_pdf']);

    Route::get('/activity_log', function () {
        return view('admin.logs.activity_log');
    })->name('activity_log');

    Route::get('/generate_log', [pdfController::class, 'generate_log'])->name('generate_log');

    Route::get('/financial_report', function () {
        return view('admin.payments.financial_report');
    })->name('financial_report');

    Route::get('/generate_financial_reports', [pdfController::class, 'generate_financial_reports'])->name('generate_financial_reports');

    // Route::get('/admin/financial-report', [AdminController::class, 'generateFinancialReport'])->name('admin.financial_report');


    Route::get('applications/{application}', [ApplicationsController::class, 'updateStatus'])->name('applications.updateStatus');
  
    Route::get('/admin/index', [AdminController::class, 'index2'])->name('admin.index');

    Route::get('/send-sms', [smscontroller::class, 'sms']);

    Route::get("/sendsms", [smsController::class, 'sendsms'])->name('sendsms');
    
    Route::get("/send_sms",[smsController::class,'send_sms']);

    Route::get('/test', [ProfileController::class, 'test'])->name('test');

    
});

// End Group Admin Middleware

//logout
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

