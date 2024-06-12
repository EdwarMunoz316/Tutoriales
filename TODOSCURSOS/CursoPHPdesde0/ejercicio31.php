<?php

$nombre="";
$rdgLenguaje="";

$chkphp="";
$chkhtml="";
$chkcss="";

$lsAnime="";
$txtComentario="";

if($_POST){
    $nombre = (isset($_POST['txtNombre'])) ? $_POST['txtNombre'] : "";
    $rdgLenguaje = (isset($_POST['lenguaje'])) ? $_POST['lenguaje'] : "";

    $chkphp = (isset($_POST['chkphp']))=="si" ? "checked" : "";
    $chkhtml = (isset($_POST['chkhtml']))=="si" ? "checked" : "";
    $chkcss = (isset($_POST['chkcss']))=="si" ? "checked" : "";

    $lsAnime = (isset($_POST['lsAnime'])) ? $_POST['lsAnime'] : "";

    $txtComentario = (isset($_POST['txtComentario'])) ? $_POST['txtComentario'] : "";
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio31</title>
</head>
<body>

    <?php if($_POST){?>
        <strong>Hola: </strong> <?php echo $nombre;?> <br/>

        <strong>Tu lenguaje es: </strong> <?php echo $rdgLenguaje;?> <br/>

        <strong>Estas aprendiendo: </strong> <br/>
        <?php echo ($chkphp=="checked")? "PHP":""; ?>
        <?php echo ($chkhtml=="checked")? "HTML":""; ?>
        <?php echo ($chkcss=="checked")? "CSS":""; ?> <br/>

        <strong>El anime que selecionaste: </strong> <?php echo $lsAnime;?><br/>
        <strong>Tu comentario es: </strong> <?php echo $txtComentario;?>
    <?php }?>

    <form action="ejercicio31.php" method="post">

    Nombre: <br/>
    <input value="<?php echo $nombre;?>" type="text" name="txtNombre" id="">
    <br/>

    Te Gusta?: <br/>
    <input type="radio" <?php echo ($rdgLenguaje=="php")? "checked":""; ?> name="lenguaje" value="php" id="">php <br/>
    <input type="radio" <?php echo ($rdgLenguaje=="html")? "checked":""; ?> name="lenguaje" value="html" id="">html <br/>
    <input type="radio" <?php echo ($rdgLenguaje=="css")? "checked":""; ?> name="lenguaje" value="css" id="">css <br/>

    Estas aprendiendo... <br/>
    <input type="checkbox" <?php echo $chkphp; ?> name="chkphp" value="si" id="">php <br/>
    <input type="checkbox" <?php echo $chkhtml; ?> name="chkhtml" value="si" id="">html <br/>
    <input type="checkbox" <?php echo $chkcss; ?> name="chkcss" value="si" id="">css <br/>

    Que anime te gusta?... <br/>
    <select name="lsAnime" id="">
        <option value="">Ninguna Serie</option>
        <option value="naruto" <?php echo ($lsAnime=="naruto")?"selected":"";?>>Naruto</option>
        <option value="dragon" <?php echo ($lsAnime=="dragon")?"selected":"";?>>Dragon Ball</option>
        <option value="bleach" <?php echo ($lsAnime=="bleach")?"selected":"";?>>Bleach</option>
    </select>
    <br/>

    Tienes alguna duda?<br/>
    <textarea name="txtComentario" id="" cols="30" rows="10"><?php echo $txtComentario?></textarea>
    <br/>
    
    <input type="submit" value="Enviar informacion">

    </form>
</body>
</html>