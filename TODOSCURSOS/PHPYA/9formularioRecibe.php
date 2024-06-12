<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if($_REQUEST["radio1"] == "suma"){
            $suma = $_REQUEST["valor1"] + $_REQUEST["valor2"];
            echo $suma;
        } else {
            if ($_REQUEST["radio1"] == "resta"){
            $resta = $_REQUEST["valor1"] - $_REQUEST["valor2"];
            echo $resta;
            }
        }
    ?>
</body>
</html>