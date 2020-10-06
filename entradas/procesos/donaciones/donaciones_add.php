<?php 
include('../conexion.php');


$donador=$_POST['id'];
$fecha=$_POST['fecha'];

$sql = "CALL sp_AgregarDonacion('".$donador."','".$fecha."');";
$resultado = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($resultado);

echo $row['var'];
?>
