<?php

namespace App\Laratables;

class AppointmentLaratable
{    
    public static function laratablesCustomAction($appointment)
    {
        return view('admin.appointments.index_action',['appointment'=>$appointment])->render();
    }
}