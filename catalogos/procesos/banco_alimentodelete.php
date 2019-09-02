<?php 
$id = $_GET['id'];

require('conexion.php');
$sql = "CALL sp_EliminarBanco('".$id."');";

$resultado = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($resultado);
    echo "<script>
                alert('".$row['msg']."');
                window.location='../banco_alimentos.php'
    </script>";

mysqli_close($conn);

?>
    