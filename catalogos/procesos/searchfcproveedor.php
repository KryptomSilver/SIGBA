<?php 
$rfc = $_POST['rfc'];
require('conexion.php');
$sql = "CALL sp_RFCProveedor('".$rfc."')";

$resultado = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($resultado);

if ($row['msg'] == 'SI') {
    echo "<script>
    window.location='../proveedoresupdate.php?rfc=$rfc'
    </script>";
} else {
    echo "<script>
    window.location='../proveedoresadd.php'
    </script>";
}
mysqli_close($conn);

?>



?>