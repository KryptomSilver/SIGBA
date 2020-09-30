<?php 
include('../conexion.php');
$id = $_POST['idf'];
$query = "select id from integrantes where fk_familia = '$id'";
$resultado = mysqli_query($conn,$query);
$numregistros =  mysqli_num_rows($resultado);

$queryf = "select integrantes from familias where id = '$id'";
$resultadof = mysqli_query($conn,$queryf);
$numintegrantes = mysqli_fetch_array($resultadof);
if ($numintegrantes['integrantes']> $numregistros ) {
    echo 0;
} else {
    echo 1;
} 
?>