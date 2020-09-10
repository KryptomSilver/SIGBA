<?php 
include('../conexion.php');

$id = $_POST['id'];
$sql = "CALL sp_EliminarUnidad('".$id."');";

$resultado = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($resultado);

echo $row['msg'];
?>