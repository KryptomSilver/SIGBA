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
    <main>
        <h1 class="titulo">Abonos</h1>
        <hr>
        <div class="container">
            <form action="" method="post">
                <div class="row">
                    <div class="col-1">
                    
                    </div>
                    <div class="col-3">
                    <select class="form-control"name="" id="">
                        <option value="">Proveedor 1</option>
                    </select>
                    </div>
                    <div class="col-6"></div>
                    <div class="col-3"></div>
                </div>
                <br>                
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-10">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No. Factura</th>
                                    <th>Fecha</th>
                                    <th>Importe</th>
                                    <th>Saldo</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>12</td>
                                    <td>12/07/2019</td>
                                    <td>$12</td>
                                    <td>$23</td>
                                    <td><a class="btn btn-md btn-primary" href="abono.php">Abonar</a>
                                        <a class="btn btn-md btn-primary"
                                        href="detalles.php">Detalles</a>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No. Factura</th>
                                    <th>Fecha</th>
                                    <th>Importe</th>
                                    <th>Saldo</th>
                                    <th>Acciones</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="col-1"></div>
                </div>
            </form>

        </div>
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