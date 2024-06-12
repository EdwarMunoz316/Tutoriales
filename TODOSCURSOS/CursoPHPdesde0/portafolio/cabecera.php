<?php

session_start();

if(isset($_SESSION['usuario'])!="luchodiaz"){
    header("location:login.php");
}

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portafolio</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <a class="text-black text-decoration-none" href="index.php">Inicio</a> |
        <a class="text-black text-decoration-none" href="portafolio.php">Portafolio</a> |
        <a class="text-black text-decoration-none" href="cerrar.php">Cerrar</a>
        <br/>
