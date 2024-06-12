<?php
    
    $genero = "f";
    $edad = 60;

    if($genero == "m" || $genero == "M"){
        if ($edad >= 60){
            echo "Se puede jubilar";
        } else {
            echo "No se puede jubilar";
        }
    } elseif($genero == "f" || $genero == "F") {
        if ($edad >= 54){
            echo "Se puede jubilar";
        } else {
            echo "No se puede jubilar";
        }
    }

?>