<?php

namespace App\Http\Controllers\payments\mpesa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MPESAController extends Controller
{
    public function getAccessToken()
    {
        $url = env('MPESA_ENV') == 0
        ? 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials'
        : 'https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

        $curl = curl_init($url);
        curl_setopt_array(
            $curl,
            array(
                CURLOPT_HTTPHEADER => ['Content-Type: application/json; charset=utf8'],
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HEADER => false,
                CURLOPT_USERPWD => env('MPESA_CONSUMER_KEY') . ':' . env('MPESA_CONSUMER_SECRET')
            )
        );
        $response = json_decode(curl_exec($curl));
        curl_close($curl);

        // return $response;
        return $response->access_token;
    }


    /**
     * B2C
     */
    public function b2cRequest(Request $request)
    {
        $curl_post_data = array(
            'InitiatorName' => env('MPESA_B2C_INITIATOR'),
            'SecurityCredential' => env('MPESA_B2C_PASSOWRD'),
            'CommandID' => 'SalaryPayment',
            'Amount' => $request->amount,
            'PartyA' => env('MPESA_SHORTCODE'),
            'PartyB' => $request->phone,
            'Remarks' => $request->remarks,
            'QueueTimeOutURL' => env('MPESA_TEST_URL') . '/mpesaLaravel/api/b2ctimeout',
            'ResultURL' => env('MPESA_TEST_URL') . '/mpesaLaravel/api/b2ccallback',
            'Occasion' => $request->occasion
          );

        $res = $this->makeHttp('/b2c/v1/paymentrequest', $curl_post_data);

        return $res;
    }


    /**
     * Register URL
     */
    public function registerURLS()
    {
        
        $body = array(
            'ShortCode' => env('MPESA_SHORTCODE'),
            'ResponseType' => 'Completed',
            'ConfirmationURL' => env('MPESA_TEST_URL') . '/api/confirmation',
            'ValidationURL' => env('MPESA_TEST_URL') . '/api/validation'
        );

        $url = env('MPESA_ENV') == 0
        ? 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl'
        : 'https://api.safaricom.co.ke/mpesa/c2b/v1/registerurl';

        $response = $this->makeHttp($url, $body);

        return $response;
    }


    /**
     * STKPush
     */
    public function stkPush(Request $request)
    {
        $timestamp = date('YmdHis');
        $password =  base64_encode(env('MPESA_STK_SHORTCODE').env('MPESA_PASSKEY').$timestamp);

        $curl_post_data = array(
            'BusinessShortCode' => env('MPESA_STK_SHORTCODE'),
            'Password' => $password,
            'Timestamp' => $timestamp,
            'TransactionType' => 'CustomerPayBillOnline',
            'Amount' => $request->amount,
            'PartyA' => $request->phone,
            'PartyB' => env('MPESA_STK_SHORTCODE'),
            'PhoneNumber' => $request->phone,
            'CallBackURL' => env('MPESA_TEST_URL'). '/api/stkpush',
            'AccountReference' => $request->account,
            'TransactionDesc' => $request->account
          );

        $url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';

        $response = $this->makeHttp($url, $curl_post_data);

        return $response;
    }



    /**
     * Simulate Transaction
     */
    public function simulateTransaction(Request $request)
    {
        $body = array(
            'ShortCode' => env('MPESA_SHORTCODE'),
            'Msisdn' => '254708374149',
            'Amount' => $request->amount,
            'BillRefNumber' => $request->account,
            'CommandID' => 'CustomerPayBillOnline'
        );  

        $url = env('MPESA_ENV') == 0
        ? 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/simulate'
        : 'https://api.safaricom.co.ke/mpesa/c2b/v1/simulate';

        $response = $this->makeHttp($url, $body);

        \Log::info('MPESA Simulation Response:', ['response' => $response]);

        // Extract the transaction ID from the response
        $transactionId = isset($response['ResponseCode']) ? $response['ResponseCode'] : null;

        // Log the transaction ID
        \Log::info('MPESA Transaction ID:', ['transaction_id' => $transactionId]);

        return $response;
    }


    /**
     * Transaction status API
     */
    public function transactionStatus(Request $request)
    {
        $body =  array(
            'Initiator' => env('MPESA_B2C_INITIATOR'),
            'SecurityCredential' => env('MPESA_B2C_PASSWORD'),
            'CommandID' => 'TransactionStatusQuery',
            'TransactionID' => $request->transactionid,
            'PartyA' => env('MPESA_SHORTCODE'),
            'IdentifierType' => '4',
            'ResultURL' => env('MPESA_TEST_URL'). '/api/transaction-status/result_url',
            'QueueTimeOutURL' => env('MPESA_TEST_URL'). '/api/transaction-status/timeout_url',
            'Remarks' => 'CheckTransaction',
            'Occasion' => 'VerifyTransaction'
          );

        $url =  'https://sandbox.safaricom.co.ke/mpesa/transactionstatus/v1/query';
        $response = $this->makeHttp($url, $body);

        return $response;
    }    


    public function makeHttp($url, $body)
    {
  
        $curl = curl_init();
        $curl_post_data =  json_encode($body);
        curl_setopt_array(
            $curl,
            array(
                    CURLOPT_URL => $url,
                    CURLOPT_HTTPHEADER => [
                        'Content-Type:application/json',
                        'Authorization:Bearer '. $this->getAccessToken()
                    ],
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_POST => true,
                    CURLOPT_POSTFIELDS =>$curl_post_data,
                    CURLOPT_SSL_VERIFYPEER => false,
                    CURLOPT_SSL_VERIFYHOST => false,
                )
            );
        $curl_response = curl_exec($curl);
        curl_close($curl);
        
        return $curl_response;
    }

}
