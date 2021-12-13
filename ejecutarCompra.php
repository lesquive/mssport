<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $smsCode = $_POST['smsCode'];
    $carritoItems = $_POST['carritoItems'];
    $correo = $_POST['correo'];
    $total = $_POST['total'];

    // $account_sid = getenv("TWILIO_ACCOUNT_SID");
    // $auth_token = getenv("TWILIO_AUTH_TOKEN");

    $servername = getenv("AWSMySQLDBHOST");
    $username = "root";
    $password = getenv("AWSMYSQLPASSWORD");
    $dbname = "msport";

    echo $smsCode;
    echo $correo;

    $carritoItems = str_replace("\n", "", $carritoItems);

    echo $carritoItems;

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO pedidos (correo, codigo, productos, total) VALUES ('$correo', '$smsCode', '$carritoItems', '$total')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
