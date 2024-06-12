<?php

class unaClase{

    public static function unMetodo(){
        echo "Hola Mundo";
    }

}

$obj = new unaClase();

$obj->unMetodo();

unaClase::unMetodo();

?>