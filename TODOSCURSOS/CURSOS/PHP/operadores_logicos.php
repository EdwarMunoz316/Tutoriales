<?php
    $valor1 = 7;
    $valor2 = 2;

    #Operador Y (Las dos deben cumplir la condicion para true si no es false)
    var_dump($valor1 == 7 && $valor2 == 2);
    var_dump($valor1 == 7 and $valor2 == 3);

    #Operador O (Una deben cumplir la condicion para true si no es false)
    var_dump($valor1 == 7 || $valor2 == 5);
    var_dump($valor1 == 2 or $valor2 == 7);

    #Operador NOT
    var_dump(!($valor1==$valor2));
?>