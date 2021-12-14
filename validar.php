<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];
    $_SESSION['usuario'] = $usuario;

    $servername = getenv("AWSMySQLDBHOST");
    $username = "root";
    $password = getenv("AWSMYSQLPASSWORD");
    $dbname = "msport";

    $conexion = new mysqli($servername, $username, $password, $dbname);

    $consulta = "SELECT * FROM usuario where correo_usuario = '$usuario' and pw_usuario = MD5('$contraseña')";
    $resultado = mysqli_query($conexion, $consulta);

    $filas = mysqli_num_rows($resultado);

    if ($filas) {
        session_start();
        $_SESSION['sid'] = session_id();
        header("Location: index.php");
    } else {
?>
        <?php
        include("index.php");
        ?>
        echo '<script>
            alert("ERROR EN LA AUTENTIFICACION")
        </script>';
<?php

    }

    mysqli_free_result($resultado);
    mysqli_close($conexion);
}
