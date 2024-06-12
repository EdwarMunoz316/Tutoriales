<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
      for($f = 1; $f <= 10; $f++){
        echo "$f <br>";
      }
      echo "<hr>";

      for($x = 1; $x <= 10; $x++){
        $valor = 2 * $x;
        echo "2 por $x = $valor <br>";
      }
      echo "<hr>";

      $a = 1;
      while($a <= 10){
        $b = 2 * $a;
        echo "2 por $a = $b <br>";
        $a++;
      }
      echo "<hr>";

      $c = 1;
      do{
        $d = 2 * $c;
        echo "2 por $c = $d <br>";
        $c++;
      }while($c <= 10);
    ?>
</body>
</html>