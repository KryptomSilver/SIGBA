<?php 
include('../conexion.php');


$donador=$_POST['id'];
$articulo=$_POST['articulo'];
$cantidad=$_POST['cantidad'];
$caducidad=$_POST['caducidad'];
$precio=$_POST['precio'];


$sql = "CALL sp_AgregarDetalleDonacion('".$donador."','".$articulo."','".$cantidad."','".$caducidad."','".$precio."');";
$resultado = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($resultado);
