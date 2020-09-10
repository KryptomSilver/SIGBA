<?php

include('../conexion.php');
$clave = $_POST['clave'];
$name = $_POST['name'];
$id = $_POST['id'];
$sql = "CALL sp_EditarUnidad('".$name."','".$clave."','".$id."');";

$resultado = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($resultado);

echo $row['msg'];
?>
