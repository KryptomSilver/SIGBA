<?php 

include('../conexion.php');

$query = "SELECT col.id,col.nombre as colonia , mun.id as idmunicipio ,mun.nombre as municipio
FROM colonias col
INNER JOIN municipios mun ON col.fk_municipio = mun.id";
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