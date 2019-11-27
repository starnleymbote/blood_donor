<?php
namespace App\Classes;
use AfricasTalking\SDK\AfricasTalking;

class Util {


    public function sendSms($number,$message){
        $username = 'findpata'; // use 'sandbox' for development in the test environment
        $apiKey   = 'cf4b37a8d2c4312b489d4dd877ad20c08df73a3a90c49d4788bc8501e68a9429'; // use your sandbox app API key for development in the test environment
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