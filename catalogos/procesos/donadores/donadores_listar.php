<?php 

include('../conexion.php');

$query = "select p.idpersona,p.razon_Social,p.rfc,p.colonia,p.nombre_Contacto,p.telefono,p.celular from persona_tipo pa
INNER JOIN persona p on pa.idpersona = p.idpersona
where idtipo = 2";
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