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
    <h1 class="titulo">Agregar Familia</h1>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="">Dirección</label>
                    <input class="form-control" type="text">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="">Telefono</label>
                    <input class="form-control" type="text">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <div class="form-group">
                    <label for="">Vivienda</label>
                    <select class="form-control" name="" id="">
                        <option value="">Vivienda 1</option>
                    </select>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="">Vulnerabilidad</label>
                    <select class="form-control" name="" id="">
                        <option value="">Vulnerabilidad 1</option>
                    </select>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="">Jefe familiar</label>
                    <select name="" id="" class="form-control">
                        <option value="">Jefe 1</option>
                    </select>
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="">Personas que generan ingresos</label>
                    <input type="number" min="1" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <div class="form-group">
                    <label for="">Ingresos mensuales fijos</label>
                    <input class="form-control" type="text" placeholder="$">
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="">Ingreso familiar</label>
                    <input type="text" class="form-control" placeholder="$">
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="">Cantidad</label>
                    <input type="text" class="form-control" placeholder="$">
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="">Ingresos extras especiales</label>
                    <input type="text" class="form-control" placeholder="$">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4"></div>
            <div class="col-3">
                <a href="familiaslista.php" class="btn btn-lg btn-primary" title="Ir la página anterior">Cancelar</a>
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