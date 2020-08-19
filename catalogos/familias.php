<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beneficiarios</title>

    <script src="../Frameworks/datatables.js" type="text/javascript"></script>
    <link rel="stylesheet" href="../Frameworks/css/normalize.css">
    <link rel="stylesheet" href="../Frameworks/datatables.css">
    <link rel="stylesheet" href="../Frameworks/css/estilo.css">
    <script src="../Frameworks/js/alert.js"></script>
    <script src="../Frameworks/js/familias/familias.js"></script>
</head>

<body>


    <?php
    require('header.html');
    ?>
    <br>
    <h1 class="titulo">Familias</h1>
    <div class="container">
        <div class="row">
            <div class="col-9"></div>
            <div class="col-3">
                <a type="button" class="btn btn-lg btn-primary" href="familiasadd.php">Agregar</a>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12">
                <table id="familias" class="table table-striped table-bordered" style="width:100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Jefe de Familia</th>
                            <th>Dirección</th>
                            <th>Integrantes</th>
                            <th>Fecha Alta</th>
                            <th>Fecha Alta</th>
                            <th>Fecha Alta</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</body>

</html>