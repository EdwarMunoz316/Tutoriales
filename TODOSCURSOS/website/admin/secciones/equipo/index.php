<?php
include("../../bd.php");

if ($_GET) {

    $txtId = (isset($_GET['txtId'])) ? $_GET['txtId'] : "";

    $sentencia = $conexion->prepare("SELECT imagen FROM tbl_equipo WHERE id=:id");
    $sentencia->bindParam(":id", $txtId);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_LAZY);

    if (isset($registro['imagen'])) {
        if (file_exists("../../../assets/img/team/" . $registro['imagen'])) {
            unlink("../../../assets/img/team/" . $registro['imagen']);
        }
    }

    $sentencia = $conexion->prepare("DELETE FROM tbl_equipo WHERE id=:id");
    $sentencia->bindParam(":id", $txtId);
    $sentencia->execute();
}

$sentencia = $conexion->prepare("SELECT * FROM tbl_equipo");
$sentencia->execute();
$listaEquipo = $sentencia->fetchAll(PDO::FETCH_ASSOC);

include("../../template/header.php");
?>

<div class="card">
    <div class="card-header"><a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar Equipo</a>
    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Puesto</th>
                        <th scope="col">Redes Sociales</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listaEquipo as $equipo) { ?>
                        <tr class="">
                            <td><?php echo $equipo['id'] ?></td>
                            <td><img width="100" src="../../../assets/img/team/<?php echo $equipo['imagen'] ?>" /></td>
                            <td><?php echo $equipo['nombreCompleto'] ?></td>
                            <td><?php echo $equipo['puesto'] ?></td>
                            <td><?php echo $equipo['twitter'] . "<br/>" . $equipo['facebook'] . "<br/>" . $equipo['linkedin'] ?></td>
                            <td><a name="" id="" class="btn btn-primary" href="editar.php?txtId=<?php echo $equipo['id'] ?>" role="button">Editar</a>
                                <a name="" id="" class="btn btn-danger" href="index.php?txtId=<?php echo $equipo['id'] ?>" role="button">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
</div>

<?php include("../../template/footer.php"); ?>