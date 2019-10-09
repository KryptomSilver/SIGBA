<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../img/logo.webp" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="../Frameworks/datatables.js" type="text/javascript"></script>
    <link rel="stylesheet" href="../Frameworks/css/normalize.css">

    <link rel="stylesheet" href="../Frameworks/datatables.css">

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
    <main>
        <section>


            <h1 class="titulo">Artículos</h1>
            <form action="" method="post">
                <div class="row">
                    <div class="col-9"></div>
                    <div class="col-3">
                        <a class="btn btn-lg btn-primary" href="articulosadd.php">Agregar</a>
                    </div>
                </div>
                <br>
                <div class="row">
                <div class="col-1"></div>
                    <div class="col-10">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th hidden>ID</th>
                                    <th>Nombre</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include('procesos/conexion.php');
                                    $sql = "select * from articulo";
                                    
                                    $result = mysqli_query($conn, $sql);
                                    while($row = mysqli_fetch_array($result)) {
                                    ?>
                                <tr>
                                    <td hidden><?php echo $row['id'];?></td>
                                    <td><?php echo $row['nombre'];?></td>
                                    <td><a href="#" data-href="procesos/articuloproceso.php?id=<?php echo $row['id']; ?>&i=2"
                                            data-toggle="modal" data-target="#confirm-delete"><img
                                                src="../img/eliminar.ico" width="30" height="30"
                                                class="d-inline-block align-top" alt=""></a>
                                        <a href="articulosupdate.php?id=<?php echo $row['id']; ?>"><img
                                                src="../img/editar.ico" width="30" height="30"
                                                class="d-inline-block align-top" alt=""></a>
                                                <a href="procesos/seeall.php?idarticulo=<?php echo $row['id']; ?>&i=1"><img
                                                src="../img/see.svg" width="30" height="30"
                                                class="d-inline-block align-top" alt=""></a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th hidden>ID</th>
                                    <th>Nombre</th>
                                    <th>Acciones</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="col-1"></div>
                </div>
            </form>

        </section>
    </main>
    <?php
    require('footer.html');
    ?>

    <!--modal agregar -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ingrece el RFC</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="articulosadd.php" method="get">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">RFC:</label>
                            <input type="text" name="rfc" class="form-control" id="recipient-name">
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!--modal-->
    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger btn-ok">Eliminar</a>
                </div>
            </div>
        </div>
    </div>
    <!-- modal editar-->

</body>
<script>
    $('#confirm-delete').on('show.bs.modal', function (e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));

        $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
    });
</script>

<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>

</html>