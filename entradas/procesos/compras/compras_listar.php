<?php
require('../conexion.php');

$id = $_GET['id'];

$query = "SELECT a.nombre,dc.cantidad,dc.preciocompra,dc.precioventa,dc.id as idproducto,dc.monto,c.* FROM compras c INNER JOIN detalle_compra dc on c.id=dc.fk_compra INNER join articulo a on dc.fk_articulo=a.id WHERE c.id ='$id'";
$res = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($res)) {
?>

<tr>
    <td><?= $row['cantidad'] ?></td>
    <td><?= $row['nombre'] ?></td>
    <td>$ <?= $row['preciocompra'] ?></td>
    <td>$ <?= $row['precioventa'] ?></td>
    <td>$ <?= $row['monto'] ?></td>
    <td>
        <button class="icon-trash btn" type="button" onclick="EliminarArticulo(<?= $row['idproducto'] ?>)"></button>
    </td>
</tr>

<?php } ?>