<?php
include("../../bd.php");

if ($_GET) {

    $txtId = (isset($_GET['txtId'])) ? $_GET['txtId'] : "";

    $sentencia = $conexion->prepare("SELECT * FROM tbl_usuarios WHERE id=:id");
    $sentencia->bindParam(":id", $txtId);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_LAZY);
    $id = $registro['id'];
    $usuario = $registro['usuario'];
    $contrasenia = $registro['password'];
    $correo = $registro['correo'];
}

if ($_POST) {

    $id = (isset($_POST['id'])) ? $_POST['id'] : "";
    $usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : "";
    $correo = (isset($_POST['correo'])) ? $_POST['correo'] : "";
    $contrasenia = (isset($_POST['contrasenia'])) ? $_POST['contrasenia'] : "";

    $sentencia = $conexion->prepare("UPDATE tbl_usuarios SET usuario=:usuario, password=:contrasenia, correo=:correo WHERE id=:id");

    $sentencia->bindParam(":usuario", $usuario);
    $sentencia->bindParam(":contrasenia", $contrasenia);
    $sentencia->bindParam(":correo", $correo);
    $sentencia->bindParam(":id", $id);
    $sentencia->execute();
    $mensaje = "Registro Editado con exito.";
    header("Location:index.php?mensaje=" . $mensaje);
}

include("../../template/header.php");
?>

<div class="card">
    <div class="card-header">Editar Usuario</div>
    <div class="card-body">
        <form action="" method="post">
            <div class="mb-3">
                <label for="id" class="form-label">ID:</label>
                <input readonly value="<?php echo $id ?>" type="text" class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="ID" />
            </div>
            <div class="mb-3">
                <label for="usuario" class="form-label">Usuario:</label>
                <input value="<?php echo $usuario ?>" type="text" class="form-control" name="usuario" id="usuario" aria-describedby="helpId" placeholder="Usuario" />
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo:</label>
                <input value="<?php echo $correo ?>" type="email" class="form-control" name="correo" id="correo" aria-describedby="helpId" placeholder="Correo" />
            </div>
            <div class="mb-3">
                <label for="contrasenia" class="form-label">Contraseña:</label>
                <input value="<?php echo $contrasenia ?>" type="password" class="form-control" name="contrasenia" id="contrasenia" aria-describedby="helpId" placeholder="Contraseña" />
            </div>
            <button type="submit" class="btn btn-primary">Editar</button>
            <a name="" id="" class="btn btn-danger" href="index.php" role="button">Cancelar</a>

        </form>
    </div>
</div>


<?php include("../../template/footer.php"); ?>