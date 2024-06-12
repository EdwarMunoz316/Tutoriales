<?php
    $llantas = 5;

    if ($llantas >= 5){
        $valor = $llantas*700;
    } else {
        $valor = $llantas*800;
    }
    
    echo "El valor de las llantas es $valor";
    

    $calificacion1 = 1.0;
    $calificacion2 = 2.0;
    $calificacion3 = 3.0;
    $promedio = ($calificacion1 + $calificacion3 + $calificacion3) / 3;

    if ($promedio >= 7.0){
        echo "Aprobo";
    } else {
        echo "No aprobo";
    }
?>