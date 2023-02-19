<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "estudiantes";


$conexion = mysqli_connect($hostname, $username, $password, $database);

if (mysqli_connect_errno()) {
    die("No se pudo conectar a la base de datos: " . mysqli_connect_error());
}








?>


