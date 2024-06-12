<?php
include("../../bd.php");

if ($_POST) {
    $imagen = (isset($_FILES['imagen']['name'])) ? $_FILES['imagen']['name'] : "";
    $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : "";
    $puesto = (isset($_POST['puesto'])) ? $_POST['puesto'] : "";
    $twitter = (isset($_POST['twitter'])) ? $_POST['twitter'] : "";
    $facebook = (isset($_POST['facebook'])) ? $_POST['facebook'] : "";
    $linkedin = (isset($_POST['linkedin'])) ? $_POST['linkedin'] : "";

    $fechaImagen = new DateTime();
    $nombreArchivo = ($imagen != "") ? $fechaImagen->getTimestamp() . "_" . $imagen : "";

    $tmpImagen = $_FILES['imagen']['tmp_name'];

    if ($tmpImagen != "") {
        move_uploaded_file($tmpImagen, "../../../assets/img/team/" . $nombreArchivo);
    }

    $sentencia = $conexion->prepare("INSERT INTO tbl_equipo VALUES (null,:imagen,:nombre,:puesto,:twitter,:facebook,:linkedin)");

    $sentencia->bindParam(":imagen", $nombreArchivo);
    $sentencia->bindParam(":nombre", $nombre);
    $sentencia->bindParam(":puesto", $puesto);
    $sentencia->bindParam(":twitter", $twitter);
    $sentencia->bindParam(":facebook", $facebook);
    $sentencia->bindParam(":linkedin", $linkedin);

    $sentencia->execute();
    $mensaje = "Registro agregado con exito.";
    header("Location:index.php?mensaje=" . $mensaje);
}

include("../../template/header.php");
?>

<div class="card">
    <div class="card-header">Crear Equipo</div>
    <form action="" enctype="multipart/form-data" method="post">
        <div class="card-body">
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen:</label>
                <input type="file" class="form-control" name="imagen" id="imagen" aria-describedby="helpId" placeholder="Imagen" />
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Nombre Completo" />
            </div>
            <div class="mb-3">
                <label for="puesto" class="form-label">Puesto:</label>
                <input type="text" class="form-control" name="puesto" id="puesto" aria-describedby="helpId" placeholder="Puesto" />
            </div>
            <div class="mb-3">
                <label for="twitter" class="form-label">Twitter:</label>
                <input type="text" class="form-control" name="twitter" id="twitter" aria-describedby="helpId" placeholder="Twitter" />
            </div>
            <div class="mb-3">
                <label for="facebook" class="form-label">Facebook:</label>
                <input type="text" class="form-control" name="facebook" id="facebook" aria-describedby="helpId" placeholder="Facebook" />
            </div>
            <div class="mb-3">
                <label for="linkedin" class="form-label">Linkedin:</label>
                <input type="text" class="form-control" name="linkedin" id="linkedin" aria-describedby="helpId" placeholder="Linkedin" />
            </div>
            <button type="submit" class="btn btn-success">Crear</button>

            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>


        </div>
    </form>
</div>


<?php include("../../template/footer.php"); ?>