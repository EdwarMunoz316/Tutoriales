<?php
include("../../bd.php");

if ($_GET) {
    $txtId = (isset($_GET['txtId'])) ? $_GET['txtId'] : "";

    $sentencia = $conexion->prepare("DELETE FROM tbl_configuraciones WHERE id=:id");
    $sentencia->bindParam(":id", $txtId);
    $sentencia->execute();
}

$sentencia = $conexion->prepare("SELECT * FROM tbl_configuraciones");
$sentencia->execute();
$listaConfiguraciones = $sentencia->fetchAll(PDO::FETCH_ASSOC);

include("../../template/header.php");
?>

<div class="card">
    <div class="card-header">
        configuracion
        <!-- <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar</a> -->
    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre de la configuracion</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listaConfiguraciones as $configuracion) { ?>
                        <tr class="">
                            <td><?php echo $configuracion['id'] ?></td>
                            <td><?php echo $configuracion['nombreConfiguracion'] ?></td>
                            <td><?php echo $configuracion['valor'] ?></td>
                            <td>
                                <a name="" id="" class="btn btn-primary" href="editar.php?txtId=<?php echo $configuracion['id'] ?>" role="button">Editar</a>
                                <!-- <a name="" id="" class="btn btn-danger" href="index.php?txtId=<?php echo $configuracion['id'] ?>" role="button">Eliminar</a> -->
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
</div>


<?php include("../../template/footer.php"); ?>