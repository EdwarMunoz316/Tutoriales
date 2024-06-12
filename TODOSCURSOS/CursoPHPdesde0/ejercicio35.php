<?php

$url="https://api.dailymotion.com/videos?channel=sport&limit=10";

$opciones = ["ssl"=>["verify_peer"=>false,"verify_pper_name"=>false]];

$respuesta = file_get_contents($url, false, stream_context_create($opciones));

$objeRespuesta= json_decode($respuesta);

/* print_r($objeRespuesta); */

// print_r($video->title);
// print_r($video->channel);

?>

<ul>
    <?php foreach($objeRespuesta->list as $video){ ?>
        <li><?php echo ($video->title);?> -- <?php echo ($video->channel); ?></li>
    <?php } ?>
</ul>