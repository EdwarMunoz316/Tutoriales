<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
      if(isset($_REQUEST["check1"])){
        $suma = $_REQUEST["valor1"] + $_REQUEST["valor2"];
        echo "La suma es $suma";
      }
      echo "<br>";
      if(isset($_REQUEST["check2"])){
        $resta = $_REQUEST["valor1"] - $_REQUEST["valor2"];
        echo "La resta es $resta";
      }
    ?>
</body>
</html>