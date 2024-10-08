<?php
include("config.php");
try {
    $conexion = new PDO("mysql:host=$host;dbname=$bd", $usuario, $clave);
} catch (\PDOException $e) {
    echo "<script> alert('Error al conectar a la Base de Datos!');</script>";
}
