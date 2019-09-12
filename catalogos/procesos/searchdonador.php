<?php 
$idpersona = $_POST['idpersona'];
require('conexion.php');
$sql = "CALL sp_RFC('".$rfc."')";

$resultado = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($resultado);

if ($row['msg'] == 'SI') {
    echo "<script>
    window.location='../donadoresupdate.php?idpersona=$idpersona'
    </script>";
} else {
    echo "<script>
    window.location='../donadoresadd.php?idpersona=$idpersona'
    </script>";
}
mysqli_close($conn);

?>



?>