<?php

$server = 'localhost';
$user = 'root';
$password = '';
$dbname = 'paginaempleos';

$conn = mysqli_connect($server, $user, $password, $dbname);

if(!$conn){
    die("Conexión fallida " . mysqli_connect_error());
}
?>