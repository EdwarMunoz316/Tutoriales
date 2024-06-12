<?php
  if($_POST){

    // Recibir informacion del formulario HTML ( Metodo POST )

    $nombre=$_POST['txtNombre']; 

    echo "Hola $nombre";
    
  }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio2</title>
</head>
<body>
    <form action="ejercicio2.php" method="post">
        <h1>Nombre</h1>
        <input type="text" name='txtNombre' id="">
        <br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>