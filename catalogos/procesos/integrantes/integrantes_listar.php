<?php 

include('../conexion.php');
$id = $_GET['idfamilia'];
$query = "select * from integrantes where fk_familia = '$id'";
$resultado = mysqli_query($conn,$query);

if(!$resultado){
    die("error");
}else{
    $arreglo["data"] = [];
    while($data = mysqli_fetch_assoc($resultado)){
        $arreglo["data"][]=$data;
    }
    echo json_encode($arreglo);
}

?>