<?php
//datos generales
$municipio = $_POST['municipio'];
$colonia= $_POST['colonia'];
$calle= $_POST['calle'];
$numext= $_POST['numext'];
$numint = $_POST['numint'];
$callecol1= $_POST['callecol1'];
$callecol2= $_POST['callecol2'];
$telefono= $_POST['telefono'];
$integrantes= $_POST['integrantes'];


require('../conexion.php');
$sql = "CALL sp_AgregarFamilia('".$calle."', '".$telefono."', '".$colonia."', '".$municipio."', '".$integrantes."', '".$numint."', '".$numext."', '".$callecol1."', '".$callecol2."');";

$resultado = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($resultado);
$mensaje =  $row['msg'];
$id =  $row['idval'];
$std = new stdClass();
$std->mns = $mensaje;
$std->id = $id;
$json = json_encode($std);
echo $json;

mysqli_close($conn);

?>
