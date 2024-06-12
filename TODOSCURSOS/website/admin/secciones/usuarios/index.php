<?php
include("../../bd.php");

if ($_GET) {
    $txtId = (isset($_GET['txtId'])) ? $_GET['txtId'] : "";

    $sentencia = $conexion->prepare("DELETE FROM tbl_usuarios WHERE id=:id");
    $sentencia->bindParam(":id", $txtId);
    $sentencia->execute();
};

$sentencia = $conexion->prepare("SELECT * FROM tbl_usuarios");
$sentencia->execute();
$listaUsuarios = $sentencia->fetchAll(PDO::FETCH_ASSOC);

include("../../template/header.php");
?>

<div class="card">
    <div class="card-header"><a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar usuario</a></div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Contraseña</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listaUsuarios as $usuarios) { ?>
                        <tr class="">
                            <td><?php echo $usuarios['id'] ?></td>
                            <td><?php echo $usuarios['usuario'] ?></td>
                            <td><?php echo $usuarios['correo'] ?></td>
                            <td><?php echo $usuarios['password'] ?></td>
                            <td>
                                <a type="button" href="editar.php?txtId=<?php echo $usuarios['id']; ?>" class="btn btn-primary">Editar</a> |
                                <a name="" id="" class="btn btn-danger" href="index.php?txtId=<?php echo $usuarios['id']; ?>" role="button">Eliminar</a>

                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
</div>


<?php include("../../template/footer.php"); ?>