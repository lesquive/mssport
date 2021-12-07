<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>MSport</title>
</head>

<body>

    <div class="main-background">

        <div class="header">
            <div class="header-div left">
                <a href="./index.php" class="header-item link">Página principal</a>
                <a href="./productos.php" class="header-item link ">Productos</a>
                <a href="url" class="header-item link">¿Quiénes somos?</a>
                <a href="javascript:void(0);" class="header-item link" id="contactanos" onclick="contact()">Contáctanos</a>
            </div>
            <div class="header-div right">
                <button type="button" class="header-item button" onclick="smsFunc()">¡Oferta del Día!</button>
                <button type="button" class="header-item button" id="login-button">Ingresar a Cuenta</button>
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

        <div class="overlay hidden"></div>

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