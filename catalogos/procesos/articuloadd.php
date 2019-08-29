<?php 
$nombre = $_POST['nombre'];
$medida = $_POST['medida'];
require('conexion.php');
$sql = "CALL sp_AgregarArticulo('".$nombre."','".$medida."');";

$resultado = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($resultado);
    echo "<script>
                alert('".$row['msg']."');
                window.location='../articulosadd.php'
    </script>";

mysqli_close($conn);

?>
