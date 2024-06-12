<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        echo $_REQUEST['nombre'];
        echo "<br>";
        if ($_REQUEST['radio1'] == "sin") {
          echo "Sin estudios.";
        }
        if ($_REQUEST['radio1'] == "primario") {
          echo "Estudios primarios.";
        }
        if ($_REQUEST['radio1'] == "secundario") {
          echo "Estudios secundarios.";
        }
    ?>
</body>
</html>