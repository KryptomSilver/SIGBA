<?php 
$id = $_POST['id'];
//datos generales
$municipio = $_POST['municipio'];
$colonia= $_POST['colonia'];
$calle= $_POST['calle'];
$numext= $_POST['numext'];
$numint = $_POST['numint'];
$callecol1= $_POST['callecol1'];
$callecol2= $_POST['callecol2'];
$telefono= $_POST['telefono'];
$integrantes= $_POST['integrantes'];
$ingreso= $_POST['ingreso'];
//vivienda
$tenencia= $_POST['tenencia'];
$cuartos= $_POST['cuartos'];
$numfamilias= $_POST['numfamilias'];
//ingresos
$padre= $_POST['padre'];
$madre= $_POST['madre'];
$hijos= $_POST['hijos'];
$becas= $_POST['becas'];
$pension= $_POST['pension'];
$otros= $_POST['otros'];
$adultos= $_POST['adultos'];
$totalsemanal= $_POST['totalsemanal'];
$totalmensual= $_POST['totalmensual'];
//egresos
$vivienda= $_POST['vivienda'];
$alimentacion= $_POST['alimentacion'];
$luz= $_POST['luz'];
$gas= $_POST['gas'];
$agua= $_POST['agua'];
$atencionM= $_POST['atencionM'];
$telefonoE= $_POST['telefonoE'];
$transporte= $_POST['transporte'];
$otrosE= $_POST['otrosE'];
$celular= $_POST['celular'];
$educacion= $_POST['educacion'];
$totalsemanalE= $_POST['totalsemanalE'];
$totalmensualE= $_POST['totalmensualE'];
require('../conexion.php');
$sql = "CALL sp_EditarFamilia('".$id."','".$calle."', '".$telefono."', '".$colonia."', '".$municipio."', '".$integrantes."', '".$numint."', '".$numext."', '".$callecol1."', '".$callecol2."', '".$ingreso."', '".$numfamilias."','".$cuartos."','".$tenencia."','".$vivienda."','".$alimentacion."','".$luz."','".$agua."','".$telefonoE."','".$transporte."','".$atencionM."','".$otrosE."','".$celular."','".$educacion."','".$totalsemanalE."','".$totalmensualE."','".$gas."','".$padre."','".$madre."','".$hijos."','".$becas."','".$pension."','".$otros."','".$adultos."','".$totalmensual."','".$totalsemanal."');";
$resultado = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($resultado);
echo $row['msg'];
mysqli_close($conn);

?>