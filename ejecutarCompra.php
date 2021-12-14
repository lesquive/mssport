<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //obtenemos el codigo SMS, el correo, el total de items en el carrito y el total en precio
    $smsCode = $_POST['smsCode'];
    $carritoItems = $_POST['carritoItems'];
    $correo = $_POST['correo'];
    $total = $_POST['total'];

    //escondemos el URL del DB y el password
    $servername = getenv("AWSMySQLDBHOST");
    $username = "root";
    $password = getenv("AWSMYSQLPASSWORD");
    $dbname = "msport";

    echo $smsCode;
    echo $correo;

    //formateamos el codigo para no tener espacios en blanco
    $carritoItems = str_replace("\n", "", $carritoItems);

    echo $carritoItems;

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    //insertamos en el DB toda la informacion para que mario la pueda ver despues
    $sql = "INSERT INTO pedidos (correo, codigo, productos, total) VALUES ('$correo', '$smsCode', '$carritoItems', '$total')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
