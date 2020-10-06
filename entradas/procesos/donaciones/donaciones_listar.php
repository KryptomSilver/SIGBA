<?php
include('../conexion.php');

$id = $_GET['id'];

$query = "SELECT d.id as a,dd.id,d.fecha,dd.cantidad,a.nombre FROM donaciones d INNER JOIN detalle_donacion dd on d.id = dd.fk_donacion INNER join articulo a on dd.fk_articulo=a.id WHERE d.id='$id'";
$res = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($res)) {
?>

<tr>
    <td><?= $row['cantidad'] ?></td>
    <td><?= $row['nombre'] ?></td>

    <td>
        <button class="icon-trash btn" type="button" onclick="EliminarArticulo(<?= $row['id'] ?>)"></button>
    </td>
</tr>

<?php } ?>