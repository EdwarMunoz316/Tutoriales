<?php

$servidor = "localhost";
$baseDatos = "website";
$usuario = "root";
$contrasenia = "";

try {
    $conexion = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $contrasenia);
} catch (Exception $e) {
    echo $e->getMessage();
}
