<?php
    $valor1=1;

    #Igual (NO tiene en cuenta el tipo de dato)
    var_dump($valor1 == "1");

    #Identico (Tiene en cuenta el tipo de dato)
    var_dump($valor1 === "1");

    #Diferente (NO tiene en cuenta el tipo de dato)
    var_dump($valor1 != "1");
    var_dump($valor1 <> "1");

    #NO Identico (Tiene en cuenta el tipo de dato)
    var_dump($valor1 !== "1");

    #Menor que
    var_dump($valor1 < 2);

    #Mayor que
    var_dump($valor1 > 2);

    #Menor igual que
    var_dump($valor1 <= 2);

    #Mayor Igual que
    var_dump($valor1 >= 2);
?>