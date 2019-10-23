<?php 
$nombre = $_POST['nombre'];

require('procesos/conexion.php');
$sql = "CALL sp_AgregarArticulo('".$nombre."');";

    $resultado = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($resultado);
    echo $row['msg'];
?>