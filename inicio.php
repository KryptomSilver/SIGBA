<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="img/logo.webp" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>SIGBA</title>
    <style>
        /* Make the image fully responsive */
        .carousel-inner img {
            width: 100%;
            height: 100%;
        }
    </style>
</head>


<body>
    <div>
        <h1 class="titulo"><span><img src="img/logo.webp" class="logo"></span>BANCO DE ALIMENTOS DE COLIMA</h1>
    </div>
    <?php
    require('header.html');
    ?>
    <div class="container">
        <br>
        <div id="demo" class="carousel slide" data-ride="carousel">

            <!-- Indicators -->
            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
                <li data-target="#demo" data-slide-to="3"></li>
                <li data-target="#demo" data-slide-to="4"></li>
            </ul>

            <!-- The slideshow -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/princ-08.png" width="1100" height="500">
                </div>
                <div class="carousel-item">
                    <img src="img/princ-19.png" width="1100" height="500">
                </div>
                <div class="carousel-item">
                    <img src="img/princ-20.png" width="1100" height="500">
                </div>
                <div class="carousel-item">
                    <img src="img/princ-23.png" width="1100" height="500">
                </div>
                <div class="carousel-item">
                    <img src="img/princ-24.png" width="1100" height="500">
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>

    </div>

</body>

</html>