<?php
include("../../bd.php");

if ($_POST) {

    $fecha = (isset($_POST['fecha'])) ? $_POST['fecha'] : "";
    $titulo = (isset($_POST['titulo'])) ? $_POST['titulo'] : "";
    $descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : "";

    $imagen = (isset($_FILES['imagen']['name'])) ? $_FILES['imagen']['name'] : "";

    $fechaImagen = new DateTime();
    $nombreArchivo = ($imagen != "") ? $fechaImagen->getTimestamp() . "_" . $imagen : "";

    $tmpImagen = $_FILES['imagen']['tmp_name'];

    if ($tmpImagen != "") {
        move_uploaded_file($tmpImagen, "../../../assets/img/about/" . $nombreArchivo);
    }

    $sentencia = $conexion->prepare("INSERT INTO tbl_entradas VALUES (null,:fecha,:titulo,:descripcion,:imagen)");

    $sentencia->bindParam(":fecha", $fecha);
    $sentencia->bindParam(":titulo", $titulo);
    $sentencia->bindParam(":descripcion", $descripcion);
    $sentencia->bindParam(":imagen", $nombreArchivo);

    $sentencia->execute();
    $mensaje = "Registro agregado con exito.";
    header("Location:index.php?mensaje=" . $mensaje);
}

include("../../template/header.php");
?>

<div class="card">
    <div class="card-header">Crear Entrada</div>
    <div class="card-body">
        <form action="" enctype="multipart/form-data" method="post">
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="date" class="form-control" name="fecha" id="fecha" aria-describedby="helpId" placeholder="Fecha" />
            </div>
            <div class="mb-3">
                <label for="titulo" class="form-label">Titulo</label>
                <input type="text" class="form-control" name="titulo" id="titulo" aria-describedby="helpId" placeholder="Titulo" />
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripcion</label>
                <input type="text" class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="Descripcion" />
            </div>
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen</label>
                <input type="file" class="form-control" name="imagen" id="imagen" placeholder="Imagen" aria-describedby="fileHelpId" />
            </div>
            <button type="submit" class="btn btn-success">Grabar</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>
</div>


<?php include("../../template/footer.php"); ?>