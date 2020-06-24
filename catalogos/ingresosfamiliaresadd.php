<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Familiares</title>
    <link rel="stylesheet" href="../Frameworks/css/normalize.css">
    <link rel="stylesheet" href="../Frameworks/datatables.css">
    <link rel="stylesheet" href="../Frameworks/css/estilo.css">
</head>

<body>
    <div>
        <h1 class="titulo"><span><img src="../img/logo.webp" class="logo"></span>BANCO DE ALIMENTOS DE COLIMA</h1>
    </div>
    <?php 
        require('header.html');
    ?>
    <div class="formulario z">
        <h1 class="titulo">Registro de ingresos</h1>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label class="">Padre:</label>
                    <input class="form-control" id="nombre" type="text" minlength="1" maxlength="50" placeholder="$"
                        required>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label class="">Madre:</label>
                    <input class="form-control" id="nombre" type="text" minlength="1" maxlength="50" placeholder="$"
                        required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label class="">Hijos:</label>
                    <input class="form-control" id="nombre" type="text" minlength="1" maxlength="50" placeholder="$"
                        required>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label class="">Becas:</label>
                    <input class="form-control" id="nombre" type="text" minlength="1" maxlength="50" placeholder="$"
                        required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label class="">Otros:</label>
                    <input class="form-control" id="nombre" type="text" minlength="1" maxlength="50" placeholder="$"
                        required>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label class="">Adultos mayores:</label>
                    <input class="form-control" id="nombre" type="text" minlength="1" maxlength="50" placeholder="$"
                        required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label class="">Total mensual:</label>
                    <input class="form-control" id="nombre" type="text" minlength="1" maxlength="50" placeholder="$"
                        required>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-4"></div>
        <div class="col-3">
            <a href="familiares.php" class="btn btn-lg btn-primary" title="Ir la página anterior">Cancelar</a>
        </div>
        <div class="col-2"></div>
        <div class="col-3">
            <button class="btn btn-lg btn-primary" type="submit">Guardar</button>
        </div>

    </div>
    </div>
    <?php
    require('footer.html');
    ?>
</body>

</html>