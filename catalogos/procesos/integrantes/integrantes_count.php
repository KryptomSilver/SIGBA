<?php 
echo '<script type="text/javascript" src="../../../Frameworks/jQuery/jquery.js">','</script>';
echo '<script type="text/javascript" src="../../../Frameworks/js/alert.js">','</script>';
echo '<script type="text/javascript" src="../../../Frameworks/js/alerts.js">','</script>';
include('../conexion.php');
$id = $_GET['idfamlia'];
$query = "select id from integrantes where fk_familia = '$id'";
$resultado = mysqli_query($conn,$query);
$numregistros =  mysqli_num_rows($resultado);

$queryf = "select integrantes from familias where id = '$id'";
$resultadof = mysqli_query($conn,$queryf);
$numintegrantes = mysqli_fetch_array($resultadof);
if ($numintegrantes['integrantes']> $numregistros ) {
?>
<script type="text/javascript">
    $(document).ready(function () {
            window.location.href = "../../integrantesadd.php?idfamilia=<?= $id?>";
    });
</script>
<?php
} else {
?>
<script type="text/javascript">
    $(document).ready(function () {
        alert_info("No se puede hacer mas registros");
        setTimeout(function () {
            window.location.href = "../../familiasadd.php";
        }, 1000);
    });
</script>
<?php } ?>