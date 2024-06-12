<?php
include("../../bd.php");

if (isset($_GET['txtId'])) {
  $txtId = (isset($_GET['txtId'])) ? $_GET['txtId'] : "";

  $sentencia = $conexion->prepare("SELECT * FROM tbl_entradas WHERE id=:id");
  $sentencia->bindParam(":id", $txtId);
  $sentencia->execute();
  $registro = $sentencia->Fetch(PDO::FETCH_LAZY);

  $fecha = $registro['fecha'];
  $titulo = $registro['titulo'];
  $descripcion = $registro['descripcion'];
  $imagen = $registro['imagen'];
}

if ($_POST) {

  $txtId = (isset($_POST['id'])) ? $_POST['id'] : "";
  $fecha = (isset($_POST['fecha'])) ? $_POST['fecha'] : "";
  $titulo = (isset($_POST['titulo'])) ? $_POST['titulo'] : "";
  $descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : "";

  $sentencia = $conexion->prepare("UPDATE tbl_entradas SET fecha=:fecha, titulo=:titulo, descripcion=:descripcion WHERE id=:id");

  $sentencia->bindParam(":id", $txtId);
  $sentencia->bindParam(":fecha", $fecha);
  $sentencia->bindParam(":titulo", $titulo);
  $sentencia->bindParam(":descripcion", $descripcion);

  $sentencia->execute();
  $mensaje = "Registro Editado con exito.";
  header("Location:index.php?mensaje=" . $mensaje);

  if ($_FILES['imagen']['tmp_name'] != "") {

    $imagen = (isset($_FILES['imagen']['name'])) ? $_FILES['imagen']['name'] : "";
    $fechaImagen = new DateTime();
    $nombreArchivo = ($imagen != "") ? $fechaImagen->getTimestamp() . "_" . $imagen : "";

    $tmpImagen = $_FILES['imagen']['tmp_name'];

    move_uploaded_file($tmpImagen, "../../../assets/img/about/" . $nombreArchivo);

    $sentencia = $conexion->prepare("SELECT imagen FROM tbl_entradas WHERE id=:id");
    $sentencia->bindParam(":id", $txtId);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_LAZY);

    if (isset($registro['imagen'])) {
      if (file_exists("../../../assets/img/about/" . $registro['imagen'])) {
        unlink("../../../assets/img/about/" . $registro['imagen']);
      }
    }

    $sentencia = $conexion->prepare("UPDATE tbl_entradas SET imagen=:imagen WHERE id=:id");
    $sentencia->bindParam(":imagen", $nombreArchivo);
    $sentencia->bindParam(":id", $txtId);
    $sentencia->execute();
  }
}

include("../../template/header.php");
?>

<div class="card">
  <div class="card-header">Editar Entradas</div>
  <div class="card-body">
    <form action="" enctype="multipart/form-data" method="post">
      <div class="mb-3">
        <label for="id" class="form-label">ID:</label>
        <input readonly value="<?php echo $txtId ?>" type="text" class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="ID" />
      </div>
      <div class="mb-3">
        <label for="fecha" class="form-label">Fecha:</label>
        <input value="<?php echo $fecha ?>" type="date" class="form-control" name="fecha" id="fecha" aria-describedby="helpId" placeholder="Fecha" />
      </div>
      <div class="mb-3">
        <label for="titulo" class="form-label">Titulo:</label>
        <input value="<?php echo $titulo ?>" type="text" class="form-control" name="titulo" id="titulo" aria-describedby="helpId" placeholder="Titulo" />
      </div>
      <div class="mb-3">
        <label for="descripcion" class="form-label">Descripcion:</label>
        <input value="<?php echo $descripcion ?>" type="text" class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="Descripcion" />
      </div>
      <div class="mb-3">
        <label for="imagen" class="form-label">Imagen:</label>
        <img width="50" src="../../../assets/img/about/<?php echo $imagen ?>" />
        <input type="file" class="form-control" name="imagen" id="imagen" placeholder="Imagen" aria-describedby="fileHelpId" />
      </div>
      <button type="submit" class="btn btn-success">Editar</button>
      <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
    </form>
  </div>
</div>


<?php include("../../template/footer.php"); ?>