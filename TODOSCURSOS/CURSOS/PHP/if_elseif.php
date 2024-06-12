<?php

    $dia = 8;

    if($dia == 1){
        echo "lunes";
    } elseif($dia == 2){
        echo "martes";
    } elseif($dia == 3){
        echo "miercoles";
    } elseif($dia == 4){
        echo "jueves";
    } elseif($dia == 5){
        echo "viernes";
    } elseif($dia == 6){
        echo "sabado";
    } elseif($dia == 7){
        echo "domingo";
    } else {
        echo "No valido";
    }

    $valor=700;
    $cantidad=3;

    $total = $cantidad*$valor;

    if ($cantidad < 5){
        $total = $total-($total*0.10);
    } elseif ($cantidad >= 5 && $cantidad < 10){
        $total = $total-($total*0.20);
    } elseif ($cantidad > 10){
        $total = $total-($total*0.40);
    } 
    echo $total;
?>