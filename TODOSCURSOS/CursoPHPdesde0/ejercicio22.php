<?php

$frutas=["f" => "Fresa", "m" => "Mango", "p" => "Pera"];

print_r($frutas);

echo $frutas['m'] . "<br/>";

foreach($frutas as $indice=>&$valor){

    echo "El valor $valor tiene el indice $indice <br/>";
}

?>