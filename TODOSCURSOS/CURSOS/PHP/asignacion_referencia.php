<?php
    $texto="Colombia";

    $variable1=$texto;
    $variable2= &$texto;

    echo "$variable1 $variable2 <br>";

    $texto="Edwar";

    echo "$variable1 $variable2";
?>