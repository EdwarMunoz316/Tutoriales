<?php
    $numero=1;

    while($numero <= 20){
        echo $numero."<br>";
        if($numero == 10){
            break;
        }
        $numero++;
    }

    $pc=["SO","SSD","GPU","RAM","CPU"];

    foreach($pc as $componente){
        echo $componente."<br>";
        if($componente == "GPU"){
            break;
        }
    }

    foreach($pc as $componente){
        if($componente == "GPU"){
            continue;
        }
        echo $componente."<br>";
    }
?>