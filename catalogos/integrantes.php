<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../Frameworks/datatables.js" type="text/javascript"></script>
    <link rel="stylesheet" href="../Frameworks/css/normalize.css">
    <link rel="stylesheet" href="../Frameworks/datatables.css">
    <link rel="stylesheet" href="../Frameworks/css/estilo.css">
    <link rel="stylesheet" href="../Frameworks/css/fontello.css">
    <script src="../Frameworks/js/integrantes/integrantes.js"></script>
    <title>Integrantes</title>
</head>
<?php 
$id = $_GET['idfamilia'];


?>

<body>
    <?php 
        require('header.html');
    ?>
    <br>
    <h1 class="titulo">Integrantes</h1>
    <br>
    <input type="hidden" value="<?=$id?>" id="idfamilia">
    <div class="tabla-lg">
        <div class="row">
            <div class="col-9"></div>
            <div class="col-3">
                <a type="button" class="btn btn-lg btn-primary" href="integrantesadd.php?idfamilia=<?php echo $id;?>">Agregar</a>
            </div>
        </div>
        <table id="integrantes" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Jefe de familia</th>
                    <th>Nombre</th>
                    <th>Sexo</th>
                    <th>CURP</th>
                    <th>Fecha nacimiento</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
        <div class="row">
            <div class="col-9"></div>
            <div class="col-3">
                <a class="btn btn-md btn-primary" href="familias.php">Completar</a>
            </div>
        </div>
    </div>

    <?php
    include('footer.html');
    ?>
    <!--Agregar --->
    <form id="formdelete" method="post">
        <input type="hidden" id="iddelete">
        <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Eliminar Registro</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        ¿Desea eliminar este registro?
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>
