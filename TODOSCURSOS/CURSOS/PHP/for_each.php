<?php
    $laptop=["Asus","HP","DELL"];

    $frutas=[
        "Fresas" => 100,
        "Peras" => 30,
        "Sandias" => 10,
        "Melocotones" => 17,
        "Manzanas" => 9
    ];

    foreach($laptop as $valor){
        echo $valor."<br>";
    }

    foreach($frutas as $clave => $valor){
        echo $valor." ".$clave."<br>";
    }
?>