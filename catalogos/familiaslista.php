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
    <script src="../Frameworks/js/alert.js"></script>
    <script src="../Frameworks/js/familias/familias.js"></script>
    <title>SIGBA</title>
</head>


<body>
    <div class="">
        <h1 class="titulo"><span><img src="../img/logo.webp" class="logo"></span>BANCO DE ALIMENTOS DE COLIMA</h1>
    </div>

    <?php
    require('header.html');
    ?>
    <br>

    <main>
        <section>
            <h1 class="titulo">Familias</h1>
            <hr>

            <div class="container">
                <div class="row">
                    <div class="col-10"></div>
                    <div class="col-2">
                        <div class="form-group">
                            <a href="addfamilias.php" class="btn btn-lg btn-primary"
                                title="Ir la página anterior">Agregar</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-10">
                        <table id="familias" class="table table-striped table-bordered" style="width:100%"
                            cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Jefe de Familia</th>
                                    <th>Dirección</th>
                                    <th>Integrantes</th>
                                    <th>Fecha Alta</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Abel Romero Ruiz</td>
                                    <td>Av Pablo Silva Garcia #302</td>
                                    <td>3</td>
                                    <td>20/8/1998</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Abel Romero Ruiz</td>
                                    <td>Av Pablo Silva Garcia #302</td>
                                    <td>34</td>
                                    <td>20/8/2342</td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-1"></div>
                </div>
                <h1 class="titulo">Familiares</h1>
                <div class="row">

                    <div class="col-1"></div>
                    <div class="col-10">
                        <div class="row">
                            <div class="col-9">
                            </div>
                            <div class="col-3">
                                <a href="addfamiliares.php" class="btn btn-md btn-primary"
                                    title="Ir la página anterior">Agregar</a>
                            </div>
                        </div>
                        <br>
                        <table id="familiares" class="table table-striped table-bordered" style="width:100%"
                            cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Edad</th>
                                    <th>Fecha Nacimiento</th>
                                    <th>Ocupación</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Abel Romero Ruiz</td>
                                    <td>22</td>
                                    <td>08/01/1998</td>
                                    <td>Estudiante</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Abel Romero Ruiz</td>
                                    <td>22</td>
                                    <td>08/01/1998</td>
                                    <td>Estudiante</td>
                                    <td></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="col-1"></div>
                </div>
            </div>
        </section>
    </main>
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
                            <input type="text" class="form-control" id="name">
                            <input type="hidden" class="form-control" id="id">
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