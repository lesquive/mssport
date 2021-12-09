<?php

require __DIR__ . '/vendor/autoload.php';

use Twilio\Rest\Client;

// Your Account SID and Auth Token from twilio.com/console
$account_sid = '';
$auth_token = '';
// In production, these should be environment variables. E.g.:
// $auth_token = $_ENV["TWILIO_AUTH_TOKEN"]

// A Twilio number you own with SMS capabilities

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $twilio_number = "+14842638771";
    $to_numer = "+506" . $_POST['phone'];
    $descuento = rand(5, 15);
    $codigo = rand(0, 99999);
    $mensaje = 'Aprovecha ahora un ' . $descuento . '% de descuento en MSPORT! Valido hasta Enero 2022 con el siguiente codigo:' . $codigo;

    $client = new Client($account_sid, $auth_token);
    $client->messages->create(
        // Where to send a text message (your cell phone?)
        $to_numer,
        array('from' => $twilio_number, 'body' => $mensaje)
    );
}

header("Location:http://localhost/proyecto/index.php");
