<?php
error_reporting(0);
include('conexion.php');
require('header.html');

$query = "SELECT * FROM `compras` WHERE `estatus` = 0";
$res = mysqli_query($conn, $query);
$fila = mysqli_fetch_assoc($res);
$row22 = mysqli_num_rows($res);
?>

<!DOCTYPE html>
<html lang="es">

<style>
.right {
    float: right;
    margin-top: 10px;
    font-weight: bold;
}
</style>

<body>
    <br>
    <h1 class="titulo">Compras</h1>
    <input id="id" type="hidden" value="<?= $fila['id'] ?>">
    <hr>
    <div class="container">
        <form method="post" id="formulario">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Proveedor</label>

                        <select class="form-control" name="" id="donador">
                            <?php
                            $query = "SELECT `idpersona`,nombre_Contacto FROM `personas` WHERE donador=1";
                            $res = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($res)) {
                            ?>
                            <option value="<?= $row['idpersona'] ?>"><?= $row['nombre_Contacto'] ?></option>
                            <?php
                            } ?>
                        </select>
                    </div>

                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="">No de Factura</label>
                        <input required type="text" autocomplete="off" id="factura" value="<?= $fila['factura'] ?>"
                            class="form-control">
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-5">
                    <div class="form-group">

                        <label for="">Fecha</label>
                        <input required type="date" value="<?= $fila['fecha'] ?>" class="form-control" id="fecha">

                    </div>
                </div>


                <div class="col-5">
                    <div class="form-group">

                        <label for="">Tipo de Pago</label>
                        <select class="form-control" name="" id="tpago">
                            <option value="0">Credito</option>
                            <option value="1">Contado</option>
                        </select>

                    </div>
                </div>

                <div class="col-2">
                    <button type="button" hidden class="btn btn2 icon-trash" onclick="EliminarCompra()" id="btnborrar">
                        Eliminar</button>
                    <button type="submit" class="btn btn2 icon-save" id="btncrear">
                        Crear</button>
                </div>
            </div>
        </form>

        <div id="panelagregar" class="circular" hidden>
            <form method="post" id="formulario2">
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
                            <input required type="numeric" class="form-control" id="cantidad">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3">
                        <div class="form-group">
                            <label for="">Caducidad</label>
                            <input required type="date" class="form-control" name="" id="caducidad">
                        </div>
                    </div>

                    <div class="col-2">
                        <div class="form-group">
                            <label for="">Precio de Venta</label>
                            <input required type="numeric" class="form-control" id="preciov">
                        </div>
                    </div>

                    <div class="col-2">
                        <div class="form-group">
                            <label for="">Precio de Compra</label>
                            <input required id="precioc" type="numeric" class="form-control">
                        </div>
                    </div>

                    <div class="col-5">
                        <button id="boton" style=" margin-top: 30px; " class="ff btn btn-lg btn-primary icon-plus"
                            type="submit"> Agregar</button>
                        <button id="boton" style=" margin-top: 30px; " class="ff btn btn-lg btn-primary icon-reload"
                            onclick="limpiarCampos()" type="button"> Limpiar</button>
                    </div>

                </div>
            </form>
        </div>
        <br>

        <table id="tabla" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Cantidad</th>
                    <th>Producto</th>
                    <th>Precio Compra</th>
                    <th>Precio Venta</th>
                    <th>Monto</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="tab">
            </tbody>
        </table>
        <br>
        <div class="row">
            <div class="col-8">
                <x class="right">Total</x>
            </div>
            <div class="col-4">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">$</span>
                    </div>
                    <input type="text" class="form-control" id="total" value="<?= $fila['total'] ?>">
                </div>
            </div>
        </div>
        <button id="btnfinalizar" type="button" class="btn btn2 float-right"
            onclick="TerminarCompra()">Finalizar</button>
        <br>
        <button class="btn2" onclick="location.href='abonos.php'">Abonar</button>
    </div>
    <br>

</body>
<script src="../Frameworks/js/entradas/compras.js"></script>
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