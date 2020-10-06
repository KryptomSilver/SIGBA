<?php
require('../conexion.php');

$id = $_GET['id'];

if ($id != 0) {
    $query = "SELECT p.nombre_Contacto,c.* FROM `compras` c INNER JOIN personas p on c.fk_vendedor = p.idpersona WHERE `fk_vendedor` = '$id' and estatus = 1";
} else {
    $query = "SELECT p.nombre_Contacto,c.* FROM `compras` c INNER JOIN personas p on c.fk_vendedor = p.idpersona where estatus = 1";
}

$res = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($res)) {

    if ($row['tipo_pago'] == 1) {
        $tp = "Contado";
    } else {
        $tp = "Credito";
    }

    if ($row['estatus_pago'] == 1) {
        $ep = "Pagado";
    } else {
        $ep = "Pendiente";
    }
?>


<tr>
    <td><?= $row['fecha'] ?></td>
    <td><?= $row['nombre_Contacto'] ?></td>
    <td><?= $tp ?></td>
    <td>$ <?= $row['total'] ?></td>

    <td><?= $ep ?></td>
    <td>
        <button class="icon-eye btn" type="button" onclick="ir(<?= $row['id'] ?>)"> Ver</button>
    </td>
</tr>

<?php } ?>