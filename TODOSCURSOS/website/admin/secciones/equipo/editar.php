<?php
include("../../bd.php");

if (isset($_GET['txtId'])) {

    $txtId = (isset($_GET['txtId'])) ? $_GET['txtId'] : "";
    $sentencia = $conexion->prepare("SELECT * FROM tbl_equipo WHERE id=:id");
    $sentencia->bindParam(":id", $txtId);
    $sentencia->execute();

    $registro = $sentencia->fetch(PDO::FETCH_LAZY);

    $imagen = $registro['imagen'];
    $nombre = $registro['nombreCompleto'];
    $puesto = $registro['puesto'];
    $twitter = $registro['twitter'];
    $facebook = $registro['facebook'];
    $linkedin = $registro['linkedin'];
}

if ($_POST) {

    $txtId = (isset($_POST['id'])) ? $_POST['id'] : "";
    $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : "";
    $puesto = (isset($_POST['puesto'])) ? $_POST['puesto'] : "";
    $twitter = (isset($_POST['twitter'])) ? $_POST['twitter'] : "";
    $facebook = (isset($_POST['facebook'])) ? $_POST['facebook'] : "";
    $linkedin = (isset($_POST['linkedin'])) ? $_POST['linkedin'] : "";

    $sentencia = $conexion->prepare("UPDATE tbl_equipo SET nombreCompleto=:nombre, puesto=:puesto, twitter=:twitter, facebook=:facebook, linkedin=:linkedin WHERE id=:id");

    $sentencia->bindParam(":nombre", $nombre);
    $sentencia->bindParam(":puesto", $puesto);
    $sentencia->bindParam(":twitter", $twitter);
    $sentencia->bindParam(":facebook", $facebook);
    $sentencia->bindParam(":linkedin", $linkedin);
    $sentencia->bindParam(":id", $txtId);

    $sentencia->execute();
    $mensaje = "Registro Editado con exito.";
    header("Location:index.php?mensaje=" . $mensaje);

    if ($_FILES['imagen']['tmp_name'] != "") {
        $imagen = (isset($_FILES['imagen']['name'])) ? $_FILES['imagen']['name'] : "";

        $fechaImagen = new DateTime();
        $nombreArchivo = ($imagen != "") ? $fechaImagen->getTimestamp() . "_" . $imagen : "";

        $tmpImagen = $_FILES['imagen']['tmp_name'];

        move_uploaded_file($tmpImagen, "../../../assets/img/team/" . $nombreArchivo);

        $sentencia = $conexion->prepare("SELECT imagen FROM tbl_equipo WHERE id=:id");
        $sentencia->bindParam(":id", $txtId);
        $sentencia->execute();
        $registro = $sentencia->fetch(PDO::FETCH_LAZY);

        if (isset($registro['imagen'])) {
            if (file_exists("../../../assets/img/team/" . $registro['imagen'])) {
                unlink("../../../assets/img/team/" . $registro['imagen']);
            }
        }
        $sentencia = $conexion->prepare("UPDATE tbl_equipo SET imagen=:imagen WHERE id=:id");

        $sentencia->bindParam(":imagen", $nombreArchivo);
        $sentencia->bindParam(":id", $txtId);
        $sentencia->execute();
    }
}

include("../../template/header.php");
?>

<div class="card">
    <div class="card-header">Editar Equipo</div>
    <form action="" enctype="multipart/form-data" method="post">
        <div class="card-body">
            <div class="mb-3">
                <label for="id" class="form-label">ID:</label>
                <input readonly value="<?php echo $txtId ?>" type="text" class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="ID" />
            </div>

            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen:</label>
                <img width="50" src="../../../assets/img/team/<?php echo $imagen ?>" />
                <input type="file" class="form-control" name="imagen" id="imagen" aria-describedby="helpId" placeholder="Imagen" />
            </div>

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre Completo:</label>
                <input value="<?php echo $nombre ?>" type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Nombre Completo" />
            </div>

            <div class="mb-3">
                <label for="puesto" class="form-label">Puesto:</label>
                <input value="<?php echo $puesto ?>" type="text" class="form-control" name="puesto" id="puesto" aria-describedby="helpId" placeholder="Puesto" />
            </div>

            <div class="mb-3">
                <label for="twitter" class="form-label">Twitter:</label>
                <input value="<?php echo $twitter ?>" type="text" class="form-control" name="twitter" id="twitter" aria-describedby="helpId" placeholder="Twitter" />
            </div>

            <div class="mb-3">
                <label for="facebook" class="form-label">Facebook:</label>
                <input value="<?php echo $facebook ?>" type="text" class="form-control" name="facebook" id="facebook" aria-describedby="helpId" placeholder="Facebook" />
            </div>

            <div class="mb-3">
                <label for="linkedin" class="form-label">Linkedin:</label>
                <input value="<?php echo $linkedin ?>" type="text" class="form-control" name="linkedin" id="linkedin" aria-describedby="helpId" placeholder="Linkedin" />
            </div>
            <button type="submit" class="btn btn-success">Editar</button>

            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </div>
    </form>
</div>


<?php include("../../template/footer.php"); ?>