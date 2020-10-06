<?php
require('../conexion.php');

$id = $_POST['id'];
$fecha = $_POST['fecha'];
$abono = $_POST['abono'];

$sql = "CALL sp_AgregarAbono('" . $id . "','" . $fecha . "','" . $abono . "');";
$resultado = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($resultado);

echo "$ " . $row['varres'];
