<?php 
$id = $_GET['id'];

require('conexion.php');
$sql = "CALL sp_EliminarArticulo('".$id."');";

$resultado = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($resultado);
    echo "<script>
                alert('".$row['msg']."');
                window.location='../articulos.php'
    </script>";

mysqli_close($conn);

?>
    