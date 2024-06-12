<?php

if($_POST){

    $opcion=$_POST['btnValor'];

    switch($opcion){
      case 1: 
        echo "Opcion 1";
        break;
      case 2:
        echo "Opcion 2";
        break;
      case 3:
        echo "Opcion 3";
        break;
    }

}

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio13</title>
</head>
<body>
    <form action="ejercicio13.php" method="post">

        <input type="submit" name="btnValor" value="1">
        <br>
        <input type="submit" name="btnValor" value="2">
        <br>
        <input type="submit" name="btnValor" value="3">
        <br>

    </form>
</body>
</html>