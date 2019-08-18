<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../img/logo.webp" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../Frameworks/css/normalize.css">
    <link rel="stylesheet" href="../Frameworks/css/estilo.css">
    <title>SIGBA</title>
</head>


<body>
    <div>
        <h1 class="titulo"><span><img src="../img/logo.webp" class="logo"></span>BANCO DE ALIMENTOS DE COLIMA</h1>
    </div>

    <?php
    require('header.html');
    ?>
    <br>
    <br>
    <main>
        <section>
            <div  class="formulario articulos">
                <h1 class="titulo">Artículos</h1>
                <form action="" method="post">
                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-6">
                            <label class="controls-label">Nombre:</label>
                            <input class="controls" type="text">
                        </div>
                        <div class="col-3"></div>
                    </div>
                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-6">
                            <label class="controls-label">Unidad de Medida:</label>
                            <input type="text" class="controls">
                        </div>
                        <div class="col-3"></div>
                    </div>
                    <div class="row">
                        <div class="col-4"></div>
                        <div class="col-3">
                        <button type="submit">Cancelar</button>
                        </div>
                        <div class="col-2"></div>
                        <div class="col-3">
                        <button type="submit">Guardar</button>
                        </div>
                        
                    </div>
                </form>
            </div>
        </section>
    </main>
    <?php
    require('footer.html');
    ?>
</body>

</html>