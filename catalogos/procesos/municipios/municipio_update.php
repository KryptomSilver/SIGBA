<?php

include('../conexion.php');

$name = $_POST['name'];
$id = $_POST['id'];
$sql = "CALL sp_EditarMunicipio('".$id."','".$name."');";

$resultado = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($resultado);

echo $row['msg'];
?>
