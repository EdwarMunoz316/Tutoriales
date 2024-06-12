<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $dia = date("d");

    if($dia <= 10) {
        echo "Sitio activo";
    } else {
        echo "Sitio fuera de servicio";
    }
    ?>
    <hr>
    <?php
    $num = rand(1,100);

    if($num <= 50){
        echo "$num es menor a 50";
    }else{
        echo "$num es mayor a 50";
    }
    ?>
</body>
</html>