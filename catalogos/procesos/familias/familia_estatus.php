<?php
$idfamilia = $_POST['idf'];
$idestatus = $_POST['estatus'];
include('../conexion.php');
$query = " CALL sp_EditarEstatus('".$idestatus."','".$idfamilia."');";

$resultado = mysqli_query($conn,$query);
$row = mysqli_fetch_array($resultado);
$mensaje =  $row['msg'];
echo $mensaje;
mysqli_close($conn);


?>
