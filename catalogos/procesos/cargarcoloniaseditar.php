<?php
include('conexion.php');
$id = $_GET['id'];
$idcolonia = $_GET['idcolonia'];
$query = "SELECT * FROM colonias where fk_municipio = $id";

$res = mysqli_query($conn,$query);

while ($row = mysqli_fetch_assoc($res)) {
?>
<option value="<?=$row['id']?>"<?php if ($row['id'] == $idcolonia) { echo "selected";}?>><?=$row['nombre']?></option>


<?php }?>