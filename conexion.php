<?php

$host = "localhost";    
$user = "root";         
$pass = "";             
$db   = "ediciones_fares";  


$conexion = mysqli_connect($host, $user, $pass, $db);


if (!$conexion) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
} else {
    
}
?>