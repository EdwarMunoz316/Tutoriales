<?php
include("../../bd.php");

if (isset($_GET['txtId'])) {

    $txtId = (isset($_GET['txtId'])) ? $_GET['txtId'] : "";
    $sentencia = $conexion->prepare("SELECT * FROM tbl_portafolio WHERE id=:id");
    $sentencia->bindParam(":id", $txtId);
    $sentencia->execute();

    $registro = $sentencia->fetch(PDO::FETCH_LAZY);

    $titulo = $registro['titulo'];
    $subtitulo = $registro['subtitulo'];
    $imagen = $registro['imagen'];
    $descripcion = $registro['descripcion'];
    $cliente = $registro['cliente'];
    $categoria = $registro['categoria'];
    $url = $registro['url'];
}

if ($_POST) {

    $txtId = (isset($_POST['txtId'])) ? $_POST['txtId'] : "";
    $titulo = (isset($_POST['titulo'])) ? $_POST['titulo'] : "";
    $subtitulo = (isset($_POST['subtitulo'])) ? $_POST['subtitulo'] : "";
    $descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : "";
    $cliente = (isset($_POST['cliente'])) ? $_POST['cliente'] : "";
    $categoria = (isset($_POST['categoria'])) ? $_POST['categoria'] : "";
    $urls = (isset($_POST['url'])) ? $_POST['url'] : "";

    $sentencia = $conexion->prepare("UPDATE tbl_portafolio SET titulo=:titulo, subtitulo=:subtitulo, imagen=:imagen, descripcion=:descripcion, cliente=:cliente, categoria=:categoria, url=:urls WHERE id=:id");

    $sentencia->bindParam(":id", $txtId);
    $sentencia->bindParam(":titulo", $titulo);
    $sentencia->bindParam(":subtitulo", $subtitulo);
    $sentencia->bindParam(":imagen", $imagen);
    $sentencia->bindParam(":descripcion", $descripcion);
    $sentencia->bindParam(":cliente", $cliente);
    $sentencia->bindParam(":categoria", $categoria);
    $sentencia->bindParam(":urls", $urls);

    $sentencia->execute();
    $mensaje = "Registro Editado con exito.";
    header("Location:index.php?mensaje=" . $mensaje);

    if ($_FILES['imagen']["tmp_name"] != "") {

        $imagen = (isset($_FILES['imagen']["name"])) ? $_FILES['imagen']["name"] : "";

        $fechaImagen = new DateTime();
        $nombreArchivo = ($imagen != "") ? $fechaImagen->getTimestamp() . "_" . $imagen : "";

        $tmpImagen = $_FILES['imagen']['tmp_name'];

        move_uploaded_file($tmpImagen, "../../../assets/img/portfolio/" . $nombreArchivo);

        $sentencia = $conexion->prepare("SELECT imagen FROM tbl_portafolio WHERE id=:txtId");
        $sentencia->bindParam(":txtId", $txtId);
        $sentencia->execute();
        $registro = $sentencia->fetch(PDO::FETCH_LAZY);

        if (isset($registro['imagen'])) {
            if (file_exists("../../../assets/img/portfolio/" . $registro['imagen'])) {
                unlink("../../../assets/img/portfolio/" . $registro['imagen']);
            }
        }

        $sentencia = $conexion->prepare("UPDATE tbl_portafolio SET imagen=:imagen WHERE id=:id");

        $sentencia->bindParam(":id", $txtId);
        $sentencia->bindParam(":imagen", $nombreArchivo);
        $sentencia->execute();
    }
}


include("../../template/header.php");
?>
<div class="card">
    <div class="card-header">Editar Portafolio</div>
    <div class="card-body">
        <form action="" enctype="multipart/form-data" method="post">
            <div class="mb-3">
                <label for="txtId" class="form-label">ID:</label>
                <input readonly value="<?php echo $txtId ?>" type="text" class="form-control" name="txtId" id="txtId" aria-describedby="helpId" placeholder="ID" />
            </div>
            <div class="mb-3">
                <label for="titulo" class="form-label">Titulo:</label>
                <input value="<?php echo $titulo ?>" type="text" class="form-control" name="titulo" id="titulo" aria-describedby="helpId" placeholder="Titulo" />
            </div>
            <div class="mb-3">
                <label for="subtitulo" class="form-label">Subtitulo:</label>
                <input value="<?php echo $subtitulo ?>" type="text" class="form-control" name="subtitulo" id="subtitulo" aria-describedby="helpId" placeholder="Subtitulo" />
            </div>
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen:</label>
                <img width="50" src="../../../assets/img/portfolio/<?php echo $imagen ?>" />
                <input type="file" class="form-control" name="imagen" id="imagen" aria-describedby="helpId" placeholder="Imagen" />
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripcion:</label>
                <input value="<?php echo $descripcion ?>" type="text" class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="Descripcion" />
            </div>
            <div class="mb-3">
                <label for="cliente" class="form-label">Cliente:</label>
                <input value="<?php echo $cliente ?>" type="text" class="form-control" name="cliente" id="cliente" aria-describedby="helpId" placeholder="Cliente" />
            </div>
            <div class="mb-3">
                <label for="categoria" class="form-label">Categoria:</label>
                <input value="<?php echo $categoria ?>" type="text" class="form-control" name="categoria" id="categoria" aria-describedby="helpId" placeholder="Categoria" />
            </div>
            <div class="mb-3">
                <label for="url" class="form-label">Url:</label>
                <input value="<?php echo $url ?>" type="text" class="form-control" name="url" id="url" aria-describedby="helpId" placeholder="Url" />
            </div>
            <button type="submit" class="btn btn-success">Actualizar</button>

            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>

        </form>
    </div>
</div>
<?php include("../../template/footer.php"); ?>