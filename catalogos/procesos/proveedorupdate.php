<?php 

$razon = $_POST['razon'];
$rfc = $_POST['rfc'];
$calle = $_POST['calle'];
$numint = $_POST['numint'];
$numext = $_POST['numext'];
$colonia = $_POST['colonia'];
$codpostal = $_POST['codpostal'];
$contacto = $_POST['contacto'];
$telefono = $_POST['telefono'];
$celular = $_POST['celular'];
$correo = $_POST['correo'];
require('conexion.php');
$sql = "CALL sp_EditarProveedor('".$razon."', '".$rfc."', '".$calle."', '".$numint."', '".$numext."', '".$colonia."', '".$codpostal."', '".$contacto."', '".$telefono."', '".$celular."', '".$correo."');";

$resultado = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($resultado);
    echo "<script>
                alert('".$row['msg']."');
                window.location='../proveedores.php'
    </script>";

mysqli_close($conn);

?>
