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

    <div class="products-header">
        <div class="header-div left">
            <a href="./index.php" class="header-item link">Página principal</a>
            <a href="./productos.php" class="header-item link ">Productos</a>
            <a href="url" class="header-item link">¿Quiénes somos?</a>
            <a href="javascript:void(0);" class="header-item link" id="contactanos" onclick="contact()">Contáctanos</a>
        </div>
        <div class="header-div right">
            <a href="javascript:void(0);" class="header-icon carrito-link"> <img src="./imagenes/shopping-cart.png" alt="carrito" class="social-media" onclick="verCarritoFunc()"> 0 </a>
            <a href="javascript:void(0);" class="header-icon"> <img src="./imagenes/discount.png" alt="Admin login" class="social-media" onclick="smsFunc()"> </a>
            <a href="javascript:void(0);" class="header-icon"> <img src="./imagenes/lock.png" alt="Admin login" class="social-media"> </a>
        </div>
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
        <button type="button" class="btn btn-success btn-lg">Listo!</button>
    </div>

    <div class="overlay hidden"></div>

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./imagenes/cleats1.jpeg" class="d-block w-50 carousel-image" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Puma Ultra</h5>
                    <p>¡CONTÁCTANOS PARA OBTENER LOS TUYOS!</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="./imagenes/cleats2.jpeg" class="d-block w-50 carousel-image" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Nike Mercurial 2022</h5>
                    <p>¡CONTÁCTANOS PARA OBTENER LOS TUYOS!</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="./imagenes/cleats3.jpeg" class="d-block w-50 carousel-image" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Nike Mercurial 2022</h5>
                    <p>¡CONTÁCTANOS PARA OBTENER LOS TUYOS!</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="container">
        <div class="row">

            <?php
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

            $sql = "SELECT nombre_producto, precio, descripcion, imagen FROM producto";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    // echo "nombre_producto: " . $row["nombre_producto"] . " - precio: " . $row["precio"] . " " . $row["descripcion"] . "<br>";
            ?>
                    <!-- <div class="row"> -->
                    <!-- <div class="col"> -->
                    <div class="card" style="width: 18rem;">
                        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['imagen']); ?>" class="card-img-top" alt="imagen de producto" />
                        <div class="card-body">
                            <h5 class="card-title"> <?php echo $row['nombre_producto']; ?> </h5>
                            <p class="card-text"> <?php echo $row['descripcion']; ?></p>
                            <p id="precioProducto"><?php echo $row['precio']; ?>$</p>
                            <a href="javascript:void(0);" class="btn btn-primary carrito-btn" onclick="updateCarrito('<?php echo $row['nombre_producto']; ?>', '<?php echo $row['precio']; ?>')">Agregar a Carrito <img src="./imagenes/shopping-cart.png" alt="carito" class="social-media"></a>
                        </div>
                    </div>
                    <!-- </div> -->
                    <!-- </div> -->
            <?php
                }
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>
        </div>
    </div>

    <footer class="products-footer">
        ©MSPORT 2022 <br>
        Todos los derechos reservados <br>
        <a href="https://facebook.com" target="_blank"><img src="./imagenes/fb.png" alt="Facebook" class="social-media"></a>
        <a href="https://instagram.com" target="_blank"><img src="./imagenes/ig.png" alt="Instagram" class="social-media"></a>
        <a href="https://twitter.com" target="_blank"><img src="./imagenes/tw.png" alt="Twitter" class="social-media"></a> <br>
        Contactanos por teléfono: +506 8707 1273
    </footer>


    <script src="script.js"></script>

</body>

</html>