<?php 
$grado = $_GET['nivel'];
$query = "SELECT * FROM grado where fk_nivel_estudios = $grado";
include('../conexion.php');
$res = mysqli_query($conn,$query);

while ($row = mysqli_fetch_assoc($res)) {
?>
<option value="<?=$row['id']?>"><?=$row['grado']?></option>


<?php }?>