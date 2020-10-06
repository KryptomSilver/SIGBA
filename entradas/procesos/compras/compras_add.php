<?php
require('../conexion.php');


$vendedor = $_POST['id'];
$fecha = $_POST['fecha'];
$factura = $_POST['factura'];
$tipopago = $_POST['tpago'];

$sql = "CALL sp_AgregarCompra('" . $vendedor . "','" . $factura . "','" . $fecha . "','" . $tipopago . "');";
$resultado = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($resultado);

echo $row['var'];
