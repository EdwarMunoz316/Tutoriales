<?php
    $fecha1= "2022/11/04";
    $fecha2= "2023-01-24";
    $numeros="Uno Dos Tres Cuatro Cinco Seis";

    $arrayFecha1=explode("/",$fecha1);
    $arrayFecha2=explode("-",$fecha2);
    $arrayNumeros=explode(" ",$numeros,2);

    echo $arrayFecha1[2]."<br>";
    echo $arrayFecha2[0]."<br>";
    echo $arrayNumeros[1];
?>