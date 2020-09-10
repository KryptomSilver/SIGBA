<?php
include('conexion.php');
$id = $_GET['id'];
$query = "SELECT * FROM municipios ";

$res = mysqli_query($conn,$query);

while ($row = mysqli_fetch_assoc($res)) {
?>
<option value="<?=$row['id']?>" <?php if ($id == $row['id']) { echo "selected";}?>><?=$row['nombre']?></option>


<?php }?>