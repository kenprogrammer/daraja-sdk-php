<?php

    namespace Daraja\SDK;

    final class Mpesa{

        public static function getAccessToken($consumer_key,$consumer_secret)
        {
           $credentials = base64_encode($consumer_key.':'.$consumer_secret);

            $ch = curl_init('https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Authorization: Basic '.$credentials,'Content-Type: application/json'
            ]);

            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $curl_response = curl_exec($ch);
            curl_close($ch);

            $response=json_decode($curl_response,true);

            return $response;
        }
    }
?>