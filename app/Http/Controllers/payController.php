<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mpesa;

class payController extends Controller
{
  public function stk()
  {
    $mpesa= new \Safaricom\Mpesa\Mpesa();

    $BusinessShortCode = 174379;
    $LipaNaMpesaPasskey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
    $TransactionType = 'CustomerPayBillOnline';
    $Amount = '1';
    $PartyA = '254743316661'; // replace this with your phone number
    $PartyB = 174379;
    $PhoneNumber = '254743316661'; // replace this with your phone number
    $CallBackURL = 'https://yourdomain.com/mpesa/confirmation';
    $AccountReference = 'eIDKenya';
    $TransactionDesc = 'Laravel Mpesa STK PUSH';
    $Remarks = 'Laravel Mpesa STK PUSH';

    $stkPushSimulation=$mpesa->STKPushSimulation(
        $BusinessShortCode,
        $LipaNaMpesaPasskey,
        $TransactionType,
        $Amount,
        $PartyA,
        $PartyB,
        $PhoneNumber,
        $CallBackURL,
        $AccountReference,
        $TransactionDesc,
        $Remarks
 );

     dd($stkPushSimulation);
  }
}
