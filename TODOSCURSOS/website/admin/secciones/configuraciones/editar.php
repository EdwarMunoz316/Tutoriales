<?php
include("../../bd.php");

if ($_GET) {
    $txtId = (isset($_GET['txtId'])) ? $_GET['txtId'] : "";

    $sentencia = $conexion->prepare("SELECT * FROM tbl_configuraciones WHERE id=:id");
    $sentencia->bindParam(":id", $txtId);
    $sentencia->execute();
    $listaConfi = $sentencia->fetch(PDO::FETCH_LAZY);

    $id = $listaConfi['id'];
    $nombre = $listaConfi['nombreConfiguracion'];
    $valor = $listaConfi['valor'];
}

if ($_POST) {
    $txtId = (isset($_POST['id'])) ? $_POST['id'] : "";
    $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : "";
    $valor = (isset($_POST['valor'])) ? $_POST['valor'] : "";

    $sentencia = $conexion->prepare("UPDATE tbl_configuraciones SET nombreConfiguracion=:nombre, valor=:valor WHERE id=:id");
    $sentencia->bindParam(":nombre", $nombre);
    $sentencia->bindParam(":valor", $valor);
    $sentencia->bindParam(":id", $txtId);
    $sentencia->execute();
    $mensaje = "Registro Editado con exito.";
    header("Location:index.php?mensaje=$mensaje");
}

include("../../template/header.php");
?>

<div class="card">
    <div class="card-header">Editar Configuracion</div>
    <div class="card-body">
        <form action="" method="post">
            <div class="mb-3">
                <label for="id" class="form-label">ID:</label>
                <input readonly value="<?php echo $id; ?>" type="text" class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="ID" />
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre Configuracion:</label>
                <input readonly value="<?php echo $nombre; ?>" type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Nombre Configuracion" />
            </div>
            <div class="mb-3">
                <label for="valor" class="form-label">Valor Configuracion:</label>
                <input value="<?php echo $valor; ?>" type="text" class="form-control" name="valor" id="valor" aria-describedby="helpId" placeholder="Valor Configuracion" />
            </div>
            <button type="submit" class="btn btn-primary">Editar</button>
            <a name="" id="" class="btn btn-danger" href="index.php" role="button">Cancelar</a>
        </form>
    </div>
</div>

<?php include("../../template/footer.php"); ?>