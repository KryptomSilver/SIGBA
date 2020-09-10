<?php 
$rfc = $_POST['rfc'];
require('conexion.php');
$sql = "CALL sp_RFC('".$rfc."')";

$resultado = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($resultado);

if ($row['msg'] == 'SI') {
    $id = $row['id'];
    echo "<script>
    window.location='../banco_alimentosupdate.php?id=$id'
    </script>";
} else {
    echo "<script>
    window.location='../banco_alimentosadd.php?rfc=$rfc'
    </script>";
}
mysqli_close($conn);

?>

