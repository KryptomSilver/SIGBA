

<?php
include('../conexion.php');

$idgrupo = $_POST['id'];
$sql = "SELECT * FROM grupos where id_grupo = $idgrupo";

$resultado = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($resultado);

$myarray = array("nombre"=>$row["nombre"],"colonia"=>$row["fk_colonia"], "municipio"=>$row["fk_municipio"],"id"=>$idgrupo);
$json = json_encode($myarray);
echo  $json;
?>
