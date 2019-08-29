<?php
$dbhost='localhost';
$dbuser='root';
$dbpass='';
$dbname='sigba';
$conn= mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if (!$conn) {
die('Coult not connect: '. mysqli_error());
}
?>