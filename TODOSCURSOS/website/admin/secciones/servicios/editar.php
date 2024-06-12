<?php
include("../../bd.php");

if ($_GET) {

  $txtId = (isset($_GET['txtId'])) ? $_GET['txtId'] : "";
  $sentencia = $conexion->prepare("SELECT * FROM tbl_servicios WHERE id=:id");
  $sentencia->bindParam(":id", $txtId);
  $sentencia->execute();

  $registros = $sentencia->fetch(PDO::FETCH_LAZY);

  $icono = $registros['icono'];
  $titulo = $registros['titulo'];
  $descripcion = $registros['descripcion'];
}

if ($_POST) {

  $txtId = (isset($_POST['txtId'])) ? $_POST['txtId'] : "";
  $icono = (isset($_POST['icono'])) ? $_POST['icono'] : "";
  $titulo = (isset($_POST['titulo'])) ? $_POST['titulo'] : "";
  $descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : "";

  $editar = $conexion->prepare("UPDATE tbl_servicios SET icono=:icono, titulo=:titulo, descripcion=:descripcion WHERE id=:id");

  $editar->bindParam(":id", $txtId);
  $editar->bindParam(":icono", $icono);
  $editar->bindParam(":titulo", $titulo);
  $editar->bindParam(":descripcion", $descripcion);
  $editar->execute();
  $mensaje = "Registro Editado con exito.";
  header("Location:index.php?mensaje=" . $mensaje);
}


include("../../template/header.php");
?>
<div class="card">
  <div class="card-header">Editar servicios</div>
  <div class="card-body">
    <form action="" enctype="multipart/form" method="post">

      <div class="mb-3">
        <label for="txtId" class="form-label">ID:</label>
        <input readonly value="<?php echo $txtId; ?>" type="text" class="form-control" name="txtId" id="txtId" aria-describedby="helpId" placeholder="ID" />
      </div>

      <div class="mb-3">
        <label for="icono" class="form-label">Icono:</label>
        <input value="<?php echo $icono; ?>" type="text" class="form-control" name="icono" id="icono" aria-describedby="helpId" placeholder="Icono" />
      </div>
      <div class="mb-3">
        <label for="titulo" class="form-label">Titulo:</label>
        <input value="<?php echo $titulo; ?>" type="text" class="form-control" name="titulo" id="titulo" aria-describedby="helpId" placeholder="Titulo" />
      </div>
      <div class="mb-3">
        <label for="descripcion" class="form-label">Descripcion:</label>
        <input value="<?php echo $descripcion; ?>" type="text" class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="Descripcion" />
      </div>
      <button type="submit" class="btn btn-success">Actualizar</button>

      <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>

    </form>
  </div>
  <div class="card-footer text-muted"></div>
</div>
<?php include("../../template/footer.php"); ?>