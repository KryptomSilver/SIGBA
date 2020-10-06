<?php
require('../conexion.php');

$id = $_GET['id'];
$query = "SELECT a.nombre,dc.* FROM detalle_compra dc inner join articulo a  on dc.fk_articulo=a.id WHERE `fk_compra` = '$id'";

$res = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($res)) {
?>

    <tr>
        <td><?= $row['cantidad'] ?></td>
        <td><?= $row['nombre'] ?></td>
        <td>$ <?= $row['preciocompra'] ?></td>
        <td>$ <?= $row['monto'] ?></td>
    </tr>

<?php } ?>