<?php 
include('../conexion.php');

$name = $_POST['name'];
$clave = $_POST['clave'];
$sql = "CALL sp_AgregarUnidad('".$name."','".$clave."');";

$resultado = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($resultado);

echo $row['msg'];
?>