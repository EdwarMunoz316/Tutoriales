<?php
    $edad = 20;

    if ($edad > 18){
        echo "Es mayor de edad";
    }

    $valorCompra = 120;

    if ($valorCompra > 100){
        $valorCompra=$valorCompra-($valorCompra*0.20);
    }
    echo $valorCompra;
?>