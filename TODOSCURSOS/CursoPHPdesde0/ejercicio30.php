<?php

session_start();

$_SESSION["usuario"]="Edwar";
$_SESSION["estatus"]="logueado";

echo "Sesion iniciada <br/>";

echo "Usuario: " . $_SESSION["usuario"] . " estatus: " . $_SESSION["estatus"];

?>