<?php
require('../conexion.php');

$id = $_POST['id'];
$idp = $_POST['idp'];
$sql = "CALL sp_EliminarDetalleCompra('" . $idp . "','" . $id . "')";

$resultado = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($resultado);

echo $row['total'];
