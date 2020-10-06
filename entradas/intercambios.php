<?php
error_reporting(0);
require('conexion.php');
require('header.html');

$query = "SELECT * FROM `donaciones` WHERE `estatus` = 0";
$res = mysqli_query($conn, $query);
$fila = mysqli_fetch_assoc($res);
$row22 = mysqli_num_rows($res);
?>

<!DOCTYPE html>
<html lang="es">

<body>
    <br>
    <h1 class="titulo">Intercambios</h1>
    <input id="id" type="hidden" value="<?= $fila['id'] ?>">
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="">Banco</label>

                    <select class="form-control" name="" id="donador">
                        <?php
                        $query = "SELECT `idpersona`,nombre_Contacto FROM `personas` WHERE donador=1";
                        $res = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($res)) {
                        ?>
                        <option value="<?= $row['idpersona'] ?>" data-tokens="<?= $row['nombre_Contacto'] ?>">
                            <?= $row['nombre_Contacto'] ?></option>
                        <?php
                        } ?>
                    </select>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">

                    <label for="">Fecha</label>
                    <input type="date" value="<?= $fila['fecha'] ?>" class="form-control" id="fecha">

                </div>
            </div>
            <div class="col-2">

                <button type="button" hidden class="btn btn2 icon-trash" onclick="EliminarDonacion(<?= $fila['id'] ?>)"
                    id="btnborrar"> Eliminar</button>
                <button type="button" class="btn btn2 icon-save" onclick="AgregarDonacion()" id="btncrear">
                    Crear</button>

            </div>
        </div>
        <div class="circular" id="panelagregar" hidden>
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="">Producto</label>
                        <select class="form-control" name="" id="producto" searchable="Search here..">
                            <?php
                            $query = "SELECT `id`, `nombre` FROM `articulo`";
                            $res = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($res)) {
                            ?>
                            <option value="<?= $row['id'] ?>" data-tokens="<?= $row['nombre'] ?>">
                                <?= $row['nombre'] ?></option>
                            <?php
                            } ?>
                        </select>
                    </div>
                </div>

                <div class="col-4">
                    <div class="form-group">
                        <label for="">Unidad de medida</label>
                        <select class="form-control" name="" id="">
                            <?php
                            $query = "SELECT  `clave`, `unidad_medida` FROM `unidad_medida`";
                            $res = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($res)) {
                            ?>
                            <option value="<?= $row['clave'] ?>" data-tokens="<?= $row['nombre'] ?>">
                                <?= $row['unidad_medida'] ?></option>
                            <?php
                            } ?>
                        </select>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="">Cantidad</label>
                        <input type="numeric" class="form-control" id="cantidad">
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label for="">Caducidad</label>
                        <input type="date" class="form-control" name="" id="caducidad">
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label for="">Precio de Venta</label>
                        <input type="numeric" class="form-control" id="precioc">
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label for="">Valor de Compra</label>
                        <input type="numeric" class="form-control" id="preciov">
                    </div>
                </div>

                <div class="col-5">
                    <button id="boton" style=" margin-top: 30px;" class="btn btn-lg btn-primary icon-plus"
                        onclick="AgregarDetalleDonacion()" type="button">Agregar</button>
                    <button id="boton" style=" margin-top: 30px;" class="btn btn-lg btn-primary icon-reload"
                        onclick="limpiarCampos()" type="button"> Limpiar</button>
                </div>
            </div>
        </div><br>
        <table id="tabla" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Cantidad</th>
                    <th>Producto</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="tab">
            </tbody>
        </table>

        <button id="btnfinalizar" type="button" class="btn btn2 float-right"
            onclick="TerminarDonacion()">Finalizar</button>
        <br>
    </div>
    <br>
    <br>
</body>

<script src="../Frameworks/js/entradas/donadores.js"></script>
<script src="../Frameworks/js/tablas.js"></script>
<script>
<?php if ($row22 > 0) : ?>
deshabilitar();
<?php endif; ?>

cargar(<?= $fila['id'] ?>);
</script>

<?php
require('footer.html');
?>

</html>