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

    <h1 class="titulo">Ventas</h1>
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-4 borde">
                <h3 class="titulo">Tipo de venta</h3>
                    <br>
                    <div class="form-check">
                        <input name="sexo" class="form-check-input" value="NO" id="recibo" type="radio"
                            id="inlineCheckbox2" required>
                        <label class=" form-check-label" for="inlineCheckbox2">Venta por colonia</label>
                    </div>
                    <div class="form-check">
                        <input name="sexo" class="form-check-input" value="NO" id="recibo" type="radio"
                            id="inlineCheckbox2" required>
                        <label class="form-check-label" for="inlineCheckbox2">Venta por institución</label>
                    </div>
                    <div class="form-check">
                        <input name="sexo" class="form-check-input" value="NO" id="recibo" type="radio"
                            id="inlineCheckbox2" required>
                        <label class="form-check-label" for="inlineCheckbox2">Venta individual</label>
                    </div>
                    <div class="form-check">
                        <input name="sexo" class="form-check-input" value="NO" id="recibo" type="radio"
                            id="inlineCheckbox2" required>
                        <label class="form-check-label" for="inlineCheckbox2">Venta a vulnerables</label>
                    </div>
                    <div class="form-check ">
                        <input name="sexo" class="form-check-input" value="NO" id="recibo" type="radio"
                            id="inlineCheckbox2" required>
                        <label class="form-check-label" for="inlineCheckbox2">Venta a empaques</label>
                    </div>
                
            </div>
            <div class="col-8">
                <div class="form-group">
                    <label for="">Municipio</label>
                    <select class="form-control" name="" id="">
                        <option value="">Municipio 1</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Colonia</label>
                    <select class="form-control" name="" id="">
                        <option value="">Colonia 1</option>
                    </select>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group ">
                            <label for="">Entregado:</label>
                            <input class="form-control" type="text" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="">Articulo</label>
                    <select class="form-control" name="" id="">
                        <option value="">Articulo 1</option>
                    </select>
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <label for="">Existencia</label>
                    <input class="form-control" type="text" disabled>
                </div>
                <div class="form-group">
                    <label for="">Unidad de Medida</label>
                    <input class="form-control" type="text" disabled>
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <label for="">Cantidad</label>
                    <input class="form-control" type="text" disabled>
                </div>
            </div>
            <div class="col-2">
                <div class="btn-group-vertical">
                    <button style="margin-top:32px;" class="btn btn-md btn-primary" type="submit">Guardar</button>
                    <button style="margin-top:32px;" class="btn btn-md btn-primary" type="submit">Articulo
                        Nuevo</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table id="articulos" class="table table-striped table-bordered" style="width:100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Clave</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-10"></div>
                    <div class="col-2">
                        <div class="form-check-inline form-group">
                            <label for="">Subtotal: </label>
                            <input class="form-control" type="text" disabled>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <div class="row">
            <div class="col-4"></div>
            <div class="col-3">
                <a href="donadores.php" class="btn btn-lg btn-primary" title="Ir la página anterior">Cancelar</a>
            </div>
            <div class="col-2"></div>
            <div class="col-3">
                <button class="btn btn-lg btn-primary" type="submit">Guardar</button>
            </div>

        </div>
    </div>
    <?php require('footer.html');?>
</body>

</html>