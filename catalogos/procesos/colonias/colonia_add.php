<?php 
include('../conexion.php');

$name = $_POST['name'];
$municipio = $_POST['municipio'];
$sql = "CALL sp_AgregarColonia('".$name."','".$municipio."');";
$resultado = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($resultado);

echo $row['msg'];
?>