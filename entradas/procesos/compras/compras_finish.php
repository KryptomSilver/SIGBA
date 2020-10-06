<?php
require('../conexion.php');

$id = $_POST['id'];

$sql = "CALL sp_TerminarCompra('" . $id . "');";
$resultado = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($resultado);

echo $row['var'];
