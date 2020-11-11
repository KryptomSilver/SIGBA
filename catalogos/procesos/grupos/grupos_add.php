<?php 
include('../conexion.php');

$nombre = $_POST['nombre'];
$colonia = $_POST['colonia'];
$municipio = $_POST['municipio'];
$sql = "CALL sp_AgregarGrupo('".$nombre."','".$colonia."','".$municipio."');";

$resultado = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($resultado);

echo $row['msg'];
?>