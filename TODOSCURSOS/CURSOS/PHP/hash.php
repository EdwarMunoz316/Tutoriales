<?php
    $clave="HolaMundo123";

    /* echo password_hash($clave,PASSWORD_DEFAULT)."<BR>"; */
    $clave_procesada= password_hash($clave,PASSWORD_BCRYPT,["cost"=>11]);

    $clave2="Contraseña";

    if(password_verify($clave2, $clave_procesada)){
        echo "Las claves coinciden";
    } else {
        echo "Las claves no coinciden";
    }
?>