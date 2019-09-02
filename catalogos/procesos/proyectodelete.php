<?php 
$id = $_GET['id'];

require('conexion.php');
$sql = "CALL sp_EliminarProyecto('".$id."');";

$resultado = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($resultado);
    echo "<script>
                alert('".$row['msg']."');
                window.location='../proyectos.php'
    </script>";

mysqli_close($conn);

?>
    