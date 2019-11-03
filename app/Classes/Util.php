<?php
namespace App\Classes;
use AfricasTalking\SDK\AfricasTalking;

class Util {


    public function sendSms($number,$message){
        $username = 'artisan_sms'; // use 'sandbox' for development in the test environment
        $apiKey   = '18f23936bc37a0420ea7fe649c6a51feb6bd909af012081ca6d26ec4f4371260'; // use your sandbox app API key for development in the test environment
        $AT       = new AfricasTalking($username, $apiKey);

        // Get one of the services
        $sms      = $AT->sms();

        // Use the service
        $result   = $sms->send([
            'to'      => $number,
            'message' => $message
        ]);
    }

    
}

?>