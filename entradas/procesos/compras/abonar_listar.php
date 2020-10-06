<?php
require('../conexion.php');

$id = $_GET['id'];
$query = "SELECT * FROM `abonos` WHERE `fk_compra` = '$id'";

$res = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($res)) {
?>

    <tr>
        <td><?= $row['fecha'] ?></td>
        <td>$ <?= $row['abono'] ?></td>
        <td>$ <?= $row['restante'] ?></td>
    </tr>

<?php } ?>