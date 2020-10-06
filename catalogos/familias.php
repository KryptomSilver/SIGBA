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
    <br>
    <div class="tabla-lg">
        <div class="row">
            <div class="col-9"></div>
            <div class="col-3">
                <a type="button" class="btn btn-lg btn-primary" href="familiasadd.php">Agregar</a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <table id="familias" class="table table-striped table-bordered" style="width:100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Dirección</th>
                            <th>Municipio</th>
                            <th>Colonia</th>
                            <th>Integrantes</th>
                            <th>Telefono</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <form id="formdelete" method="post">
        <input type="hidden" id="iddelete" >
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
    <?php
    require('footer.html');
    ?>
    <!--modal delete-->
    
</body>


</html>