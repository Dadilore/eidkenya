<?php

namespace App\Http\Controllers;

use App\Mpesa\C2B;
use Iankumu\Mpesa\Facades\Mpesa;//import the Facade
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class MPESAC2BController extends Controller
{

    // public function registerURLS(Request $request)
    // {
    //     $shortcode = $request->input('shortcode');
    //     $response = Mpesa::c2bregisterURLS($shortcode);
    //     $result = json_decode((string)$response, true);

    //     return $result;
    // }
    

        public function registerURLS(Request $request)
        {
            $shortcode = $request->input('shortcode');
            
            // Register your confirmation and validation URLs
            $response = Mpesa::c2bregisterURLS($shortcode, route('mpesa.c2b.validation'), route('mpesa.c2b.confirmation'));
            
            $result = json_decode((string)$response, true);

            return $result;
        }


        public function validation()
        {
            Log::info('Validation endpoint has been hit');
            $result_code = "0";
            $result_description = "Accepted validation request";
            return Mpesa::validationResponse($result_code, $result_description);
        }
        
        public function confirmation(Request $request)
        {
            return (new C2B())->confirm($request);
        }
        
}