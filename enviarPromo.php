<?php

require __DIR__ . '/vendor/autoload.php';

use Twilio\Rest\Client;

// Your Account SID and Auth Token from twilio.com/console
//escondemos los credenciales de Twilio API
$account_sid = getenv("TWILIO_ACCOUNT_SID");
$auth_token = getenv("TWILIO_AUTH_TOKEN");
// In production, these should be environment variables. E.g.:
// $auth_token = $_ENV["TWILIO_AUTH_TOKEN"]

// A Twilio number you own with SMS capabilities

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //si el metodo es POST, utilizamos un random para generar el codigo entre 0 y 99999 y el descuento entre 5% - 15%

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

    //escondemos el URL del DB y el password
    $servername = getenv("AWSMySQLDBHOST");
    $username = "root";
    $password = getenv("AWSMYSQLPASSWORD");
    $dbname = "msport";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    //insertamos en el DB la informacion de cliente y el codigo con el descuento
    $sql = "INSERT INTO cliente (telefono, descuento, codigo) VALUES ($to_numer, $descuento, $codigo)";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

header("Location:index.php");
