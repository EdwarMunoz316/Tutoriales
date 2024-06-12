<?php
    $texto="holA mUndo";

    /* echo strtolower($texto);
    echo strtoupper($texto);
    echo ucfirst($texto);
    echo ucwords($texto); */

    $longitud=strlen($texto);

    echo "El texto $texto tine $longitud caracteres <br>";

    $palabras=str_word_count($texto);

    echo "$texto tiene $palabras palabras"
?>