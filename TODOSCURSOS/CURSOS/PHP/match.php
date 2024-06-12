<?php

    $a = 7;

    $x = 10;
    $y = 8;
    $z = 7;

    $resultado = match($a){
        $x => "El valor es X",
        $y => "El valor es Y",
        $z => "El valor es Z",
        default => "No es ninguno"
    };

    echo $resultado;

    $edad = 59;

    $resultado1 = match(true){
        $edad >= 60 => "Eres de la 3 edad",
        $edad >= 30 => "Eres adulto",
        $edad >= 18 => "Eres Adulto Joven",
        default => "Eres un niño"
    };
    
    echo $resultado1;
?>