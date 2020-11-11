<?php 

include('../conexion.php');

$query = "select g.id_grupo,g.nombre,c.nombre as colonia,c.id as id_colonia,m.nombre as municipio from grupos as g inner join colonias as c on g.fk_colonia=c.id inner join municipios as m on c.fk_municipio = m.id";
$resultado = mysqli_query($conn,$query);
while ($row = mysqli_fetch_assoc($resultado)) {

?>
<tr>

    <td><?=$row['id_grupo']?></td>
    <td><?=$row['nombre']?></td>
    <td><?=$row['municipio']?></td>
    <td><?=$row['colonia']?></td>
    <td><a  id="eliminar" onclick="eliminargrupo(<?=$row['id_grupo']?>)"><img src='../img/eliminar.ico' width='30' height='30'class='d-inline-block align-top'></a><a  class='editar' onclick="updategrupo(<?=$row['id_grupo']?>)"><img src='../img/editar.ico' width='30' height='30'class='d-inline-block align-top'></a></td>
</tr>

<?php }?>