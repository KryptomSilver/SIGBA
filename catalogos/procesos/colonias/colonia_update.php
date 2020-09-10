<?php

include('../conexion.php');
$municipio = $_POST['municipio'];
$colonia = $_POST['colonia'];
$id = $_POST['id'];
$sql = "CALL sp_EditarColonia('".$id."','".$colonia."','".$municipio."');";

$resultado = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($resultado);

echo $row['msg'];
?>
