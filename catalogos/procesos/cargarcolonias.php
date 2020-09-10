<?php
include('conexion.php');
$id = $_GET['id'];
$query = "SELECT * FROM colonias where fk_municipio = $id";

$res = mysqli_query($conn,$query);

while ($row = mysqli_fetch_assoc($res)) {
?>
<option value="<?=$row['id']?>"><?=$row['nombre']?></option>


<?php }?>