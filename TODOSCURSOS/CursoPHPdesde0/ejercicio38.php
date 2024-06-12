<?php

// abriendo un archivo para leer el contenido
$archivo = "./contenido.txt";

// fopen para abrir el archivo
$archivoAbierto = fopen($archivo,"r");

// fread para leer el archivo abierto
$contenido = fread($archivoAbierto, filesize($archivo));

echo $contenido;

?>