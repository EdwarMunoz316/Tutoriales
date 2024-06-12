<?php
include("../../bd.php");

if ($_POST) {
    $usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : "";
    $contrasenia = (isset($_POST['contrasenia'])) ? $_POST['contrasenia'] : "";
    $correo = (isset($_POST['correo'])) ? $_POST['correo'] : "";

    $sentencia = $conexion->prepare("INSERT INTO tbl_usuarios VALUES (null, :usuario, :contrasenia, :correo)");

    $sentencia->bindParam(":usuario", $usuario);
    $sentencia->bindParam(":contrasenia", $contrasenia);
    $sentencia->bindParam(":correo", $correo);

    $sentencia->execute();
    $mensaje = "Registro agregado con exito.";
    header("Location:index.php?mensaje=" . $mensaje);
};

include("../../template/header.php");
?>

<div class="card">
    <div class="card-header">Usuario</div>
    <div class="card-body">
        <form action="" method="post">
            <div class="mb-3">
                <label for="usuario" class="form-label">Nombre del Usuario:</label>
                <input type="text" class="form-control" name="usuario" id="usuario" aria-describedby="helpId" placeholder="Nombre del usuario" />
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo:</label>
                <input type="email" class="form-control" name="correo" id="correo" aria-describedby="helpId" placeholder="Correo" />
            </div>
            <div class="mb-3">
                <label for="contrasenia" class="form-label">Contraseña:</label>
                <input type="password" class="form-control" name="contrasenia" id="contrasenia" aria-describedby="helpId" placeholder="Contraseña" />
            </div>
            <button type="submit" class="btn btn-primary">Agregar</button>

            <a name="" id="" class="btn btn-danger" href="index.php" role="button">Cancelar</a>

        </form>
    </div>
</div>



<?php include("../../template/footer.php"); ?>