<?php
  if($_POST){
  $valorA = $_POST['valorA'];
  $valorB = $_POST['valorB'];

  $sum = $valorA + $valorB;
  $res = $valorA - $valorB;
  $multi = $valorA * $valorB;
  $div = $valorA / $valorB;

  echo "El resultado es <br/> $sum <br/> $res <br/> $div <br/> $multi";

  if($valorA == $valorB) {

    echo "El valor de a es igual que el valor de b <br/>";

    if($valorA == 4){

        echo "El valor es 4 <br/>";

    }

    if($valorA == 5){

        echo "El valor es 5 <br/>";

    }

  }
  if( ($valorA == $valorB) && ($valorA == 4) ){

    echo "El valor de a es igual a b y es un 4";

  }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio11</title>
</head>
<body>
    <form action="ejercicio11.php" method="post">
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