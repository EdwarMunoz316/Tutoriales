<?php

$jsonContenido='[
    {"nombre": "Edwar", "apellido":"Muñoz"},
    {"nombre": "Laura", "apellido":"Ospina"}
]';

$resultado = json_decode($jsonContenido);

/* print_r($resultado); */

foreach($resultado as $persona){

    echo($persona->nombre)." ".($persona->apellido)."<br/>";
}

?>