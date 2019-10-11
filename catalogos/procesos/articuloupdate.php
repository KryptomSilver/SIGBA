<?php 
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$medida = $_POST['medida'];
require('conexion.php');
$sql = "CALL sp_EditarArticulo('".$id."','".$nombre."','".$medida."');";

$resultado = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($resultado);
    echo "<script>
                alert('".$row['msg']."');
                window.location='../articulos.php'
    </script>";

mysqli_close($conn);

?>
