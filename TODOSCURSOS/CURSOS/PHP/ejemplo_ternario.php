<?php

    $valor=10;
    $camisas=7;

    $total = $camisas * $valor;

    $total= ($camisas >= 3) ? $total-($total*0.20) : $total-($total*0.10);
    echo $total;
?>