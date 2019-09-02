<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../img/logo.webp" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="../Frameworks/datatables.js" type="text/javascript"></script>
    <link rel="stylesheet" href="../Frameworks/datatables.css">
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
    <main>
        <section>
            <div class="formulario articulos">
                
                <h1 class="titulo">Donadores</h1>
                <form action="" method="post">
                    <div class="row">
                        <div class="col-9"></div>
                        <div class="col-3">
                            <button type="button" class="btn btn-lg btn-primary" data-href="" data-toggle="modal"
                                data-target="#exampleModal">Agregar</button>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-12">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                    <th hidden>ID</th>
                                        <th>Razon Social</th>
                                        <th>RFC</th>
                                        <th>Acciones</th>
                                    </tr>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    include('procesos/conexion.php');
                                    $sql = "select * from donadores";
                                    
                                    $result = mysqli_query($conn, $sql);
                                    while($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <tr>
                                        <td hidden><?php echo $row['id'];?></td>
                                        <td><?php echo $row['razon_Social'];?></td>
                                        <td><?php echo$row['rfc'];?></td>
                                        <td><a href="#" data-href="procesos/donadordelete.php?id=<?php echo $row['id']; ?>"
                                                data-toggle="modal" data-target="#confirm-delete"><img
                                                    src="../img/eliminar.ico" width="30" height="30"
                                                    class="d-inline-block align-top" alt=""></a>
                                            <a href="#" data-href="donadoresupdate.php?id=<?php echo $row['id']; ?>"
                                                data-toggle="modal" data-target="#confirm-editar"><img
                                                    src="../img/editar.ico" width="30" height="30"
                                                    class="d-inline-block align-top" alt=""></a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                    <th hidden>ID</th>
                                    <th>Razon Social</th>
                                        <th>RFC</th>
                                        <th>Acciones</th>
                                    </tr>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </main>
    <?php
    require('footer.html');
    ?> <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                <form action="donadoresadd.php" method="get">
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

<!--modal eliminar-->
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
<div class="modal fade" id="confirm-editar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Editar Registro</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

            </div>

            <div class="modal-body">
                ¿Desea editar este registro?
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-success btn-ok">Editar</a>
            </div>
        </div>
    </div>
</div>
</body>

<script>
$('#confirm-delete').on('show.bs.modal', function (e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));

    $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
});
</script>
<script>
$('#confirm-editar').on('show.bs.modal', function (e) {
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