<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //obtenemos el codigo de SMS via POST
    $objectId = $_POST['smsCode'];

    try {
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

        $sql = "SELECT id,telefono,descuento FROM cliente WHERE codigo=$objectId";
        $result = $conn->query($sql);

        //Si el codigo existe, actualizamos el descuento a 0 y retornamos el ID
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                // echo "We found a record with ID: " . $row["id"] . " telefono: " . $row["telefono"] . " % de descuento: " . $row["descuento"];
                $id = $row["id"];
                $sql = "UPDATE cliente SET descuento=0 WHERE id=$id";
                echo $row["descuento"];
                $conn->query($sql);
            }
        } else {
            echo "0 results";
        }
        $conn->close();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
