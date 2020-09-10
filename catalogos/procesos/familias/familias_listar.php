<?php 

include('../conexion.php');

$query = "select fam.calle,fam.id,fam.ingresototal,fam.integrantes,fam.telefono,mun.nombre as municipio,col.nombre as colonia
from familias fam
INNER JOIN municipios mun on fam.municipio = mun.id
INNER JOIN colonias col on fam.colonia = col.id
";
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