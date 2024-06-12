<?php
include("../../bd.php");

if ($_POST) {
    $nombre = (isset($_POST['nombre']) ? $_POST['nombre'] : "");
    $valor = (isset($_POST['valor']) ? $_POST['valor'] : "");

    $sentencia = $conexion->prepare("INSERT INTO tbl_configuraciones VALUES (null, :nombre, :valor);");
    $sentencia->bindParam(":nombre", $nombre);
    $sentencia->bindParam(":valor", $valor);
    $sentencia->execute();

    $mensaje = "Registro agregado con exito.";
    header("Location:index.php?mensaje=" . $mensaje);
}

include("../../template/header.php");
?>

<div class="card">
    <div class="card-header">Agregar Configuracion</div>
    <div class="card-body">
        <form action="" method="post">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre Configuracion:</label>
                <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Nombre Configuracion" />
            </div>
            <div class="mb-3">
                <label for="valor" class="form-label">Valor Configuracion:</label>
                <input type="text" class="form-control" name="valor" id="valor" aria-describedby="helpId" placeholder="Valor Configuracion" />
            </div>
            <button type="submit" class="btn btn-primary">Agregar</button>
            <a name="" id="" class="btn btn-danger" href="index.php" role="button">Cancelar</a>
        </form>
    </div>
</div>


<?php include("../../template/footer.php"); ?>