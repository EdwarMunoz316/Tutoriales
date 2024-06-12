<?php
  if($_POST){
  $valorA = $_POST['valorA'];
  $valorB = $_POST['valorB'];

  if(($valorA != $valorB) || ($valorA > $valorB) ){

    echo "El valor de A es mayor que el valor de B";

  }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio10</title>
</head>
<body>
    <form action="ejercicio10.php" method="post">
        Ingrese A:
        <input type="text" name="valorA" id="">
        <br>
        Ingrese B:
        <input type="text" name="valorB" id="">
        <br>

        <input type="submit" value="Calcular">
    </form>
</body>
</html>