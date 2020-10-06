<?php 

include('../conexion.php');
$id = $_GET['idfamlia'];
$query = "select id,gefe_familia,sexo,curp,fecha_nac,CONCAT(nombre,' ',apellido1,' ',apellido2) AS nombre from integrantes where fk_familia ='$id'";
$resultado = mysqli_query($conn,$query);

while ($row = mysqli_fetch_assoc($resultado)) {

?>
<tr>

    <td><?=$row['id']?></td>
    <td><?=$row['gefe_familia']?></td>
    <td><?=$row['nombre']?></td>
    <td><?=$row['sexo']?></td>
    <td><?=$row['curp']?></td>
    <td><?=$row['fecha_nac']?></td>
    <td><a  id="eliminar" onclick="eliminar(<?=$row['id']?>)"><img src='../img/eliminar.ico' width='30' height='30'class='d-inline-block align-top'></a><a  class='editar' href="integrantesupdate.php?id=<?=$row['id']?>"><img src='../img/editar.ico' width='30' height='30'class='d-inline-block align-top'></a></td>
</tr>

<?php }?>