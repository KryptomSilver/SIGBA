<?php
require("conexion.php");
require('header.html');
$id = $_GET['id'];
$query = "SELECT p.nombre_Contacto,c.* FROM `compras` c INNER JOIN personas p on c.fk_vendedor = p.idpersona WHERE c.id='$id'";
$res = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($res);

if ($row['tipo_pago'] == 1) {
    $tipopago = "contado";
} else {
    $tipopago = "Credito";
}


?>


<!DOCTYPE html>
<html lang="es">

<style>
    .a {
        background: #f2f2f2;
    }
</style>

<body>
    <main>
        <h1 class="titulo">Detalle Compra</h1>
        <hr>
        <div class="container">

            <table class="table">
                <tr>
                    <th class="a">Proveedor</th>
                    <th colspan="2"><?= $row['nombre_Contacto'] ?></th>
                    <th class="a">Factura</th>
                    <th colspan="2"><?= $row['factura'] ?></th>
                </tr>
                <tr>
                    <th class="a">Tipo Pago</th>
                    <th><?= $tipopago ?></th>
                    <th class="a">Fecha</th>
                    <th><?= $row['fecha'] ?></th>
                    <th class="a">Total</th>
                    <th>$ <?= $row['total'] ?></th>
                </tr>
            </table>

            <h3>articulos</h3>

            <table class="table">
                <thead>
                    <tr>
                        <th>Cantidad</th>
                        <th>Articulo</th>
                        <th>Precio</th>
                        <th>Monto</th>
                    </tr>
                </thead>
                <tbody id="tab">

                </tbody>
            </table>

        </div>


    </main>
    <script src="../Frameworks/js/entradas/detallecompras.js"></script>
    <script>
        cargar(<?= $id ?>)
    </script>
    <?php
    require('footer.html');
    ?>


</html>