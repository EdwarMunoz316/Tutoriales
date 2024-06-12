<?php
include("../../bd.php");

if (isset($_GET['txtId'])) {

    $txtId = (isset($_GET['txtId'])) ? $_GET['txtId'] : "";
    $sentencia = $conexion->prepare("DELETE FROM tbl_servicios WHERE id=:id");
    $sentencia->bindParam(":id", $txtId);
    $sentencia->execute();
}

$sentencia = $conexion->prepare("SELECT * FROM tbl_servicios");
$sentencia->execute();
$lista_servicios = $sentencia->fetchAll(PDO::FETCH_ASSOC);

include("../../template/header.php");
?>

<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar registros</a>
    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Icono</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista_servicios as $servicios) { ?>
                        <tr class="">
                            <td><?php echo $servicios['id']; ?></td>
                            <td><?php echo $servicios['icono']; ?></td>
                            <td><?php echo $servicios['titulo']; ?></td>
                            <td><?php echo $servicios['descripcion']; ?></td>
                            <td>
                                <a name="" id="" class="btn btn-primary" href="editar.php?txtId=<?php echo $servicios['id']; ?>" role="button">Editar</a> |
                                <a name="" id="" class="btn btn-danger" href="index.php?txtId=<?php echo $servicios['id']; ?>" role="button">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("../../template/footer.php"); ?>