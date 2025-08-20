<?php

$conexion_db = mysqli_connect("localhost", "root", "", "db_tualpacanuevo");

if (!$conexion_db) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>
