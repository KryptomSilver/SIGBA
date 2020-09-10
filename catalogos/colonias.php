<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="../Frameworks/datatables.js" type="text/javascript"></script>
    <link rel="stylesheet" href="../Frameworks/css/normalize.css">
    <link rel="stylesheet" href="../Frameworks/datatables.css">
    <link rel="stylesheet" href="../Frameworks/css/estilo.css">
    <script src="../Frameworks/js/alert.js"></script>
    <script src="../Frameworks/js/colonias/colonias.js"></script>
    <title>SIGBA</title>
</head>


<body>


    <?php
    require('header.html');
    ?>
    <br>

    <h1 class="titulo">Colonias</h1>
    <hr>
    <div class="container">
        <form method="post" id="formulario">
            <div class="row">
                <p id="resultado"></p>
                <div class="col-5">
                    <div class="form-group">
                        <label for="">Municipio</label>
                        <?php include('procesos/conexion.php');
                                    $query = "SELECT * FROM municipios";
                                    $resultado = mysqli_query($conn,$query);
                                    ?>
                        <select id="municipio"  class="form-control"  required>
                            <?php  while ($municipios = mysqli_fetch_array($resultado)) { ?>
                            <option value="<?php echo $municipios['id'];?>">
                                <?php echo $municipios['nombre'];?></option>
                            <?php }?>
                        </select>
                    </div>

                </div>
                <div class="col-5">
                    <label for="">Nombre</label>
                    <input style="width:100%;" id="nombre" class="form-control" type="text" required>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <button style="margin-top:32px;" class="btn btn-md btn-primary" type="submit">Guardar</button>
                    </div>
                </div>
            </div>
        </form>

        <div class="row">

            <div class="col-12">
                <table id="colonias" class="table table-striped table-bordered" style="width:100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th style="hidden">id</th>
                            <th style="width:5%;">id</th>
                            <th style="width:50%;">Municipio</th>
                            <th style="width:50%">Colonia</th>
                            <th style="width:5%;">Acciones</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <?php
    require('footer.html');
    ?>

    <!--modal editar -->
    <form id="form" method="post">
        <div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar nombre</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nombre:</label>
                            <input type="text" class="form-control" id="colonia">
                            <input type="hidden" class="form-control" id="id">
                        </div>
                        <div class="form-group">
                        <label for="">Municipio</label>
                        <select  id="municipios"class="form-control"  required>
                           
                        </select>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button class="btn btn-md btn-primary" type="submit">Guardar</button>
                    </div>

                </div>
            </div>
        </div>
    </form>
    <!--modal delete-->
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
    <!-- modal editar-->

</body>

</html>