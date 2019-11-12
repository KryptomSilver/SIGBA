<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../Frameworks/css/normalize.css">
    <link rel="stylesheet" href="../Frameworks/datatables.css">
    <link rel="stylesheet" href="../Frameworks/css/estilo.css">
    <title>SIGBA</title>
</head>

<body>
    <div>
        <h1 class="titulo"><span><img src="../img/logo.webp" class="logo"></span>BANCO DE ALIMENTOS DE COLIMA</h1>
    </div><?php require('header.html');
?><br>

    <h1 class="titulo">Salidas</h1>
    <hr>
    <div class="container">
        <form action="" method="post">
            <div class="row">
                <div class="col-3">
                    <div class="form-group"><label for="">Municipio</label>
                        <select class="form-control" name="" id="">
                            <option value=""></option>
                        </select>
                    </div>
                </div>
                <div class="col-3"></div>
                <div class="col-3"></div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="">Municipio</label>
                        <input class="form-control" type="date" name="" id="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label for="">Colonia</label>
                        <select class="form-control" name="" id="">
                            <option value=""></option>
                        </select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="">Responsable</label>
                        <input class="form-control" type="text" disabled>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="">No. Familias</label>
                        <input class="form-control" type="text" disabled>
                    </div>
                </div>
                <div class="col-3"></div>
            </div>
            <form action="" method="post">
                <div class="row">
                    <div class="col-12">
                        <div class="formulario" style="padding:12px 50px 12px 50px; margin: 0px;">
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="">Proveedor</label>
                                        <select class="form-control" name="" id="">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3"></div>
                                <div class="col-3"></div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="">Folio</label>
                                        <input class="form-control" type="date" name="" id="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="">Producto</label>
                                        <select class="form-control" name="" id="">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="">Existencia</label>
                                        <input class="form-control" type="text" name="" id="" disabled>
                                    </div>

                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="">Unidad de medida</label>
                                        <input class="form-control" type="text" name="" id="" disabled>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="">Cantidad</label>
                                        <input class="form-control" type="text" name="" id="" disabled>
                                    </div>
                                    <button class="btn mybtn" style="margin:0px 0px 0px 145px;"
                                        type="submit">Agregar</button>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </form>

        </form>
        <br>
        <div class="row">
            <div class="col-12">
                <table id="salidas" class="table table-striped table-bordered" style="width:100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Articulo</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Importe</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Hola</td>
                            <td>Hola</td>
                            <td>Hola</td>
                            <td>Hola</td>
                            <td>Hola</td>
                            <td>Hola</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-6"></div>
            <div class="col-3">
                <button id="boton" class="btn btn-md mybtn" type="">Cancelar</button>
            </div>
            <div class="col-3">
                <button id="boton" class="btn btn-md mybtn" type="">Guardar</button>
            </div>
        </div>
    </div>

    <?php require('footer.html');
?>
</body>

</html>