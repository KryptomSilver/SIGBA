<?php 
$id=$_POST['id'];
$nombre=$_POST['nombre'];
$municipio=$_POST['municipio'];
$colonia=$_POST['colonia'];

require('../conexion.php');
$sql = "CALL sp_EditarGrupo('".$nombre."','".$colonia."','".$municipio."' ,'".$id."');";

$resultado = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($resultado);
echo $row['msg'];
mysqli_close($conn);

?>