<?php

require __DIR__ . '/vendor/autoload.php';

use Twilio\Rest\Client;

// Your Account SID and Auth Token from twilio.com/console
$account_sid = 'ACc2a3ce7a87d6ba70f44b724f6850324a';
$auth_token = 'a0b168d7409f4fc9e0d2c71d2b5bd5ef';
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

    $servername = "localhost";
    $username = "root";
    $password = "cisco123";
    $dbname = "msport";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO cliente (telefono, descuento, codigo) VALUES ($to_numer, $descuento, $codigo)";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

header("Location:http://localhost/proyecto/index.php");
