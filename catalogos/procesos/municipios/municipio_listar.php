<?php 

include('../conexion.php');

$query = "SELECT * FROM municipios";
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