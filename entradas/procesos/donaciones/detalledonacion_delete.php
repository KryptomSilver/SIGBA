<?php 
include('../conexion.php');

$id = $_POST['idp'];
$sql = "CALL sp_EliminarDetalleDonacion('".$id."')";

$resultado = mysqli_query($conn,$sql);
die($sql);
$row = mysqli_fetch_array($resultado);

echo $row['msg'];
