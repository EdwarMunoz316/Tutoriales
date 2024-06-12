<?php
if($_POST){

    $nombre = $_POST['txtNombre'];
    $apellido = $_POST['txtApellido'];

    echo "Hola $nombre $apellido";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio5</title>
</head>
<body>
    <form action="ejercicio5.php" method="post">
        Nombre:
        <input type="text" name='txtNombre' id="">
        <br>
        Apellido:
        <input type="text" name="txtApellido" id="">
        <br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>