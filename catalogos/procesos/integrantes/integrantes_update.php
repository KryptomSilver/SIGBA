<?php 
$id = $_POST['id'];
$idf = $_POST['idfamilia'];
$titular = $_POST['titular'];
$nombre = $_POST['nombre'];
$apellido1 = $_POST['apellido1'];
$apellido2 = $_POST['apellido2'];
$sexo = $_POST['sexo'];
$fecha = $_POST['fecha'];
$entidad = $_POST['entidad'];
$curp = $_POST['curp'];
$estado_civil = $_POST['estado_civil'];
$ocupacion = $_POST['ocupacion'];
$parentesco = $_POST['parentesco'];
$nivel_estudios = $_POST['nivel_estudios'];
$grado = $_POST['grado'];
$estado = $_POST['estado'];
$padre = $_POST['padre'];
$madre = $_POST['madre'];
$hijos = $_POST['hijos'];
$becas = $_POST['becas'];
$pension = $_POST['pension'];
$talla =$_POST['talla'];
$peso = $_POST['peso'];
$adultos = $_POST['adultos'];
require('../conexion.php');
$sql = "CALL sp_EditarIntegrante('".$id."','".$titular."','".$nombre."','".$apellido1."','".$apellido2."', '".$sexo."', '".$fecha."', '".$entidad."', '".$curp."', '".$estado_civil."', '".$ocupacion."', '".$parentesco."', '".$nivel_estudios."', '".$grado."', '".$estado."','".$padre."','".$madre."','".$hijos."','".$becas."','".$pension."','".$talla."','".$peso."','".$adultos."','".$idf."');";
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
