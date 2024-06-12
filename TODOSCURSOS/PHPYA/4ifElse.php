<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
      $valor = rand(1,3);

      if($valor == 1){
        echo "Uno";
      } elseif($valor ==2){
        echo "Dos";
      } else {
        echo "Tres";
      }
    ?>
</body>
</html>