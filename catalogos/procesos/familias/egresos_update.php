<?php 
$vivienda=$_POST['v'];
$alimentacion=$_POST['alimentacion'];
$luz=$_POST['luz'];
$gas=$_POST['gas'];
$agua=$_POST['agua'];
$atencionM=$_POST['atencionM'];
$telefono=$_POST['telefono'];
$transporte=$_POST['transporte'];
$otrosE=$_POST['otrosE'];
$celular=$_POST['celular'];
$educacion=$_POST['educacion'];
$totalsemanalE=$_POST['totalsemanalE'];
$totalmensualE=$_POST['totalmensualE'];
$id=$_POST['id'];
require('../conexion.php');
$sql = "CALL sp_EditarEgresos('".$vivienda."','".$alimentacion."','".$luz."' ,'".$gas."','".$agua."','".$atencionM."','".$telefono."','".$transporte."','".$otrosE."','".$celular."','".$educacion."','".$totalsemanalE."','".$totalmensualE."','".$id."');";
$resultado = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($resultado);
echo $row['msg'];
mysqli_close($conn);

?>