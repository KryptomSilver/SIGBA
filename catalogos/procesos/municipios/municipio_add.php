<?php 
include('../conexion.php');

$name = $_POST['name'];
$sql = "CALL sp_AgregarMunicipio('".$name."');";

$resultado = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($resultado);

echo $row['msg'];
?>