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
            <h1 class="titulo">Compras</h1>
            <hr>
            <div class="container">
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="">Proveedor</label>
                            <select class="form-control" name="" id="">
                                <option value="" default>Proveedor 1</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="">No de Factura</label>
                            <input type="text" name="" class="form-control">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <label for="">Fecha</label>
                            <input type="date" name="" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="circular">
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Producto</label>
                                <select class="form-control" name="" id="">
                                    <option value="" default>producto 1</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-1">
                        <div class="form-group">
                        <a id="add"href="#"><img id="add"src="../img/add.png" width="30" height="30" class="d-inline-block align-top"
                                        alt=""></a>

                        </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Unidad de medida</label>
                                <select class="form-control"name="" id="">
                                <option value="">Litros</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="">Cantidad</label>
                                <input type="numeric" class="form-control">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Caducidad</label>
                                <input type="date" class="form-control" name="" id="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">Precio de Venta</label>
                                <input type="numeric" class="form-control">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label for="">Precio de Compra</label>
                                <input type="numeric" class="form-control">
                            </div>
                        </div>
                        <div class="col-4">
                            <button id="boton" class="btn btn-md btn-primary" type="">Agregar</button>
                        </div>
                    </div>
                </div><br><br>
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio de C</th>
                            <th>Precio de V</th>
                            <th>Caducidad</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //include('procesos/conexion.php');
                        //$sql = "";
                        
                        //$result = mysqli_query($conn, $sql);
                        //while($row = mysqli_fetch_array($result)) {
                        ?>
                        <tr>

                            <td>Producto 1</td>
                            <td>11</td>
                            <td>$12</td>
                            <td>$412</td>
                            <td>15/08/2019</td>
                            <td><a href="#"
                                    data-href="procesos/proyectoproceso.php?id=<?php echo $row['idpersona']; ?>&i=2"
                                    data-toggle="modal" data-target="#confirm-delete"><img src="../img/eliminar.ico"
                                        width="30" height="30" class="d-inline-block align-top" alt=""></a>
                                <a href="proyectosupdate.php?rfc=<?php echo $row['rfc']; ?>"><img
                                        src="../img/editar.ico" width="30" height="30" class="d-inline-block align-top"
                                        alt=""></a>
                                <a href="procesos/seeall.php?idpersona=<?php echo $row['idpersona']; ?>&i=5"><img
                                        src="../img/see.svg" width="30" height="30" class="d-inline-block align-top"
                                        alt=""></a>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>

                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio de C</th>
                            <th>Precio de V</th>
                            <th>Caducidad</th>
                            <th>Acciones</th>
                        </tr>
                        </tr>
                    </tfoot>
                </table>
                <br><br>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Forma de Pago</label>
                            <select class="form-control"name="" id="">
                                <option value="">De contado</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="">Importe</label>
                            <input type="numeric" placeholder="$100"class="form-control" disabled>
                        </div>  
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="">Abono</label>
                            <input type="numeric"placeholder="$" class="form-control">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="">Saldo</label>
                            <input type="numeric" placeholder="$"class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6"></div>
                    <div class="col-3">
                        <button id="boton" class="btn btn-md btn-primary" type="">Cancelar</button>
                    </div>
                    <div class="col-3">
                        <button id="boton" class="btn btn-md btn-primary" type="">Guardar</button>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php
    require('footer.html');
    ?>
</body>
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>
</html>