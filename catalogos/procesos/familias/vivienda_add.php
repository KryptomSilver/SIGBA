<?php 
$id = $_POST['id'];
$tenencia= $_POST['tenencia'];
$cuartos= $_POST['cuartos'];
$numfamilias= $_POST['numfamilias'];
require('../conexion.php');
$sql = "CALL sp_AgregarVivienda('".$tenencia."','".$cuartos."','".$numfamilias."' ,'".$id."');";
$resultado = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($resultado);
echo $row['msg'];
mysqli_close($conn);
?>