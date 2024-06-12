<?php

$nombreArchivo = "archivo.txt";

$contenidoArchivo = "Hola Mundo";

$archivoCrear = fopen($nombreArchivo, "w");

fwrite($archivoCrear, $contenidoArchivo);

fclose($archivoCrear);

?>