<?php

namespace App\Laratables;

class PaymentLaratable
{    
    public static function laratablesCustomAction($payment)
    {
        return view('admin.payments.index_action',['payment'=>$payment])->render();
    }
}