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
    <script src="../Frameworks/js/proveedores.js" type="text/javascript"></script>
    <script src="../Frameworks/js/alert.js" type="text/javascript"></script>

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
        <section>
            <div class="container">
                <h1 class="titulo">Proveedores</h1>
                <form action="proveedoresupdate.php" method="get" id="editar">
                <input type="hidden" name="" id="idpersona">
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
                            <table id="proveedores" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>RFC</th>
                                        <th>Razón social</th>
                                        <th>Nombre de contacto</th>
                                        <th>Telefono</th>
                                        <th>Celular</th>
                                        <th>Colonia</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>

                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>RFC</th>
                                        <th>Razón social</th>
                                        <th>Nombre de contacto</th>
                                        <th>Telefono</th>
                                        <th>Celular</th>
                                        <th>Colonia</th>
                                        <th>Acciones</th>
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
    ?>
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
                    <form action="procesos/searchfcproveedor.php" method="post">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">RFC:</label>
                            <input type="text" name="rfc"
                                pattern="^([A-ZÑ\x26]{3,4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1]))([A-Z\d]{3})?$"
                                title="introduzca un RFC valido" class="form-control" id="recipient-name" required>
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
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger btn-ok">Eliminar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

</body>
<!--<script>
    $('#delete').on('show.bs.modal', function (e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));

        $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
    });

    $(document).ready(function () {
        $('#proveedores').DataTable({
            "columnDefs": [
            { "width": "82px", "targets": 6 }]
        });
    });
</script>-->

</html>