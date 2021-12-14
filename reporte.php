<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
    <title>MSport</title>
</head>

<body>

    <div class="main-background">

        <div class="header">
            <div class="header-div left">
                <a href="./index.php" class="header-item link">Página principal</a>
                <a href="./productos.php" class="header-item link ">Productos</a>
                <a href="javascript:void(0);" class="header-item link" onclick="verQuienesSomosFunc()">¿Quiénes somos?</a>
                <a href="javascript:void(0);" class="header-item link" id="contactanos" onclick="contact()">Contáctanos</a>
            </div>
            <div class="header-div right">
                <a href="javascript:void(0);" class="header-icon carrito-link"> <img src="./imagenes/shopping-cart.png" alt="carrito" class="social-media" onclick="verCarritoFunc()"> 0 </a>
                <a href="javascript:void(0);" class="header-icon"> <img src="./imagenes/discount.png" alt="Admin login" class="social-media" onclick="smsFunc()"> </a>
                <a href="javascript:void(0);" class="header-icon"> <img src="./imagenes/lock.png" alt="Admin login" class="social-media" onclick="loginFunc()"> </a>
            </div>
        </div>

        <div class="container-fluid reporte">

            <table class="table table-striped">
                <thead>
                    <td>ID</td>
                    <td>Correo</td>
                    <td>Codigo</td>
                    <td>Productos</td>
                    <td>Total</td>
                    <td>Fecha</td>
                </thead>
                <?php

                session_start();

                if ($_SESSION['sid'] == session_id()) {

                    $servername = getenv("AWSMySQLDBHOST");
                    $username = "root";
                    $password = getenv("AWSMYSQLPASSWORD");
                    $dbname = "msport";

                    // Create connection
                    //$conn = new mysqli($servername, $username, $password, $dbname);
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $sql = "SELECT id, correo, codigo, productos, total, dt FROM pedidos";
                    $result = mysqli_query($conn, $sql);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while ($mostrar = mysqli_fetch_array($result)) {
                            // echo "nombre_producto: " . $row["nombre_producto"] . " - precio: " . $row["precio"] . " " . $row["descripcion"] . "<br>";
                ?>

                            <div>
                                <tbody>
                                    <td><?php echo $mostrar['id'] ?></td>
                                    <td><?php echo $mostrar['correo'] ?></td>
                                    <td><?php echo $mostrar['codigo'] ?></td>
                                    <td><?php echo $mostrar['productos'] ?></td>
                                    <td><?php echo $mostrar['total'] ?></td>
                                    <td><?php echo $mostrar['dt'] ?></td>
                                </tbody>

                            </div>
                <?php
                        }
                    } else {
                        echo "0 results";
                    }
                    $conn->close();
                } else {
                    header("location:index.php");
                }


                ?>
            </table>
        </div>

        <div class="welcome-popup hidden">
            <h1>¡Contáctanos!</h1>
            <p>Y con gusto le atenderemos</p>
            <p><img src="./imagenes/email.png" alt="email" class="social-media contact-icons"><a href="mailto: info@msport.cr">info@msport.cr</a></p>
            <p><img src="./imagenes/iphone.png" alt="email" class="social-media contact-icons"><a href="tel:+50687071234">+506 8707 1234</a></p>
            <div>
                <a href="https://facebook.com" target="_blank"><img src="./imagenes/fb.png" alt="Facebook" class="social-media"></a>
                <a href="https://instagram.com" target="_blank"><img src="./imagenes/ig.png" alt="Instagram" class="social-media"></a>
                <a href="https://twitter.com" target="_blank"><img src="./imagenes/tw.png" alt="Twitter" class="social-media"></a> <br>
            </div>
        </div>

        <div class="welcome-popup hidden sms">
            <h1>¡Las mejores promociones a un click!</h1>
            <p>Ingresa el número de teléfono para obtener las mejores ofertas!</p>
            <form action="./enviarPromo.php" method="POST">
                <input type="tel" id="phone" name="phone" placeholder="24455678" pattern="[0-9]{4}[0-9]{4}" required><br><br>
                <small>Formato: 24455678 (Solo valido para CR <img src="./imagenes/CR.png" alt="Costa Rica" class="social-media contact-icons">)</small><br><br>
                <button class="btn btn-success" type="submit">Listo!</button>
            </form>
        </div>

        <div class="welcome-popup hidden carrito">
            <h3>¡Compre de manera fácil!</h3>
            <form>
                <p>Ingresa el codigo del SMS para recibir un descuento!</p>
                <input type="number" id="smscode" name="smscode" placeholder="12345"><br><br>
                <button class="btn btn-outline-warning btn-sm SMSBttn" type="button">Aplicar Descuento</button>
            </form><br>
            <div class="carritoItem"></div>
            <div class="carritoTotal"></div>

            <input type="email" id="email" name="email" placeholder="luis@example.com" required> <br>
            <button class="btn btn-success" id="ejecutarCompraBttn">Listo!</button>
            <!-- <button type="button" class="btn btn-success btn-lg" type="submit" value="Submit" form="submitCompra">Listo!</button> -->
        </div>

        <div class="welcome-popup hidden quienesSomos">
            <img src="imagenes/me.jpeg" width="180" alt="" class="box-img">
            <h1>MSport</h1>
            <h2>Pasion por el deporte</h2>
            <p>Un 1 de octubre del año 2020 nace una idea para satisfacer las necesidades de
                implementos deportivos (guantes, vendas, bucales y sacos de boxeo) de los
                practicantes en una academia de boxeo local, tal fue el bue auge en la
                academia, que decidimos expandir nustro emprendimiento a una venta de
                artículos deportivos a un nivel mayor con la apertura de redes sociales
                (WhatsApp, Instagram y Facebook) bajo el nombre de Msport.<br>
                Nuestra meta es ofrecer los mejores articulos, de la mejor calidad al mejor precio.<br><br>
                Gracias por el apoyo
            </p>
            <div>
                <a href="https://facebook.com" target="_blank"><img src="./imagenes/fb.png" alt="Facebook" class="social-media"></a>
                <a href="https://instagram.com" target="_blank"><img src="./imagenes/ig.png" alt="Instagram" class="social-media"></a>
                <a href="https://twitter.com" target="_blank"><img src="./imagenes/tw.png" alt="Twitter" class="social-media"></a>
            </div>
        </div>

        <div class="welcome-popup hidden login">
            <form class="form-signin" action="validar.php" method="post">
                <img src="imagenes/me.jpeg" width="72" alt="" class="box-img">
                <h1 class="h3 mb-3 font-weight-normal">Consola de Administración</h1>
                <input type="email" id="inputEmail" class="form-control" placeholder="Correo Electrónico" required autofocus name="usuario"><br>
                <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required name="contraseña"><br>
                <button class="btn btn-lg btn-danger btn-block" type="submit">Ingresar</button>
                <p class="mt-5 mb-3 text-muted">&copy; 2022 MSPORT</p>
            </form>
        </div>

        <div class="overlay hidden"></div>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <a href="https://api.whatsapp.com/send?phone=50687565317" class="float" target="_blank">
            <i class="fa fa-whatsapp my-float"></i></a>

        <footer>
            ©MSPORT 2022 <br>
            Todos los derechos reservados <br>
            <a href="https://facebook.com" target="_blank"><img src="./imagenes/fb.png" alt="Facebook" class="social-media"></a>
            <a href="https://instagram.com" target="_blank"><img src="./imagenes/ig.png" alt="Instagram" class="social-media"></a>
            <a href="https://twitter.com" target="_blank"><img src="./imagenes/tw.png" alt="Twitter" class="social-media"></a> <br>
            Contactanos por teléfono: +506 8707 1273
        </footer>

    </div>

    <script src="script.js"></script>

</body>

</html>