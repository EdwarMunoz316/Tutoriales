<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <?php
    echo "El nombre ingresado es: ";
    echo $_REQUEST['nombre'] . "<br>";
    if($_REQUEST["edad"] >= 18){
        echo "Es mayor de edad";
    } else {
        echo "Es menor de edad";
    }
  ?>
</body>
</html>