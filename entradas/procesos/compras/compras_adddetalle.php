<?php
require('../conexion.php');


$donador = $_POST['id'];
$articulo = $_POST['articulo'];
$cantidad = $_POST['cantidad'];
$preciov = $_POST['preciov'];
$precioc = $_POST['precioc'];


$sql = "CALL sp_AgregarDetalleCompra('" . $donador . "','" . $articulo . "','" . $cantidad . "','" . $preciov . "','" . $precioc . "');";
$resultado = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($resultado);

echo $row['total'];
