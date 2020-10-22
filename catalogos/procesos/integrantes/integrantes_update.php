<?php 
$id = $_POST['id'];

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
$ingresos = $_POST['ingresos'];
$talla = $_POST['talla'];
$peso = $_POST['peso'];
$becas = $_POST['becas'];
$otros = $_POST['otros'];
$adultos = $_POST['adultos'];
$pension = $_POST['pension'];
require('../conexion.php');
$sql = "CALL sp_EditarIntegrante('".$id."','".$titular."','".$nombre."','".$apellido1."','".$apellido2."', '".$sexo."', '".$fecha."', '".$entidad."', '".$curp."', '".$estado_civil."', '".$ocupacion."', '".$parentesco."', '".$nivel_estudios."', '".$grado."', '".$estado."','".$talla."','".$peso."','".$ingresos."','".$becas."','".$pension."','".$adultos."','".$otros."');";


$resultado = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($resultado);

echo $row['msg'];

mysqli_close($conn);



?>
