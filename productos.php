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

    <div class="products-header">
        <div class="header-div left">
            <a href="./index.php" class="header-item link">Página principal</a>
            <a href="./productos.php" class="header-item link ">Productos</a>
            <a href="url" class="header-item link">¿Quiénes somos?</a>
            <a href="javascript:void(0);" class="header-item link" id="contactanos" onclick="contact()">Contáctanos</a>
        </div>
        <div class="header-div right">
            <button type="button" class="header-item button">¡Oferta del Día!</button>
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
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
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