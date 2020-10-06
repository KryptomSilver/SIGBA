<?php
$dbhost='localhost';
$dbuser='root';
$dbpass='';
$dbname='sigba';// base de datos 
$conn= mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if (!$conn) {
die('Coult not connect: '. mysqli_error());
}