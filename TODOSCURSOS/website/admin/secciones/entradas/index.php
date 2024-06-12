<?php
include("../../bd.php");

if ($_GET) {
    $txtId = (isset($_GET['txtId'])) ? $_GET['txtId'] : "";

    $sentencia = $conexion->prepare("SELECT imagen FROM tbl_entradas WHERE id=:id");
    $sentencia->bindParam(":id", $txtId);
    $sentencia->execute();
    $registroImagen = $sentencia->fetch(PDO::FETCH_LAZY);

    if (isset($registroImagen['imagen'])) {
        if (file_exists("../../../assets/img/about/" . $registroImagen['imagen'])) {
            unlink("../../../assets/img/about/" . $registroImagen['imagen']);
        }
    }

    $sentencia = $conexion->prepare("DELETE FROM tbl_entradas WHERE id=:id");
    $sentencia->bindParam(":id", $txtId);
    $sentencia->execute();
}

$sentencia = $conexion->prepare("SELECT * FROM tbl_entradas");
$sentencia->execute();
$listarEntradas = $sentencia->fetchAll(PDO::FETCH_ASSOC);

include("../../template/header.php");
?>

<div class="card">
    <div class="card-header"><a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar entradas</a></div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listarEntradas as $entradas) { ?>
                        <tr class="">
                            <td><?php echo $entradas['id'] ?></td>
                            <td><?php echo $entradas['fecha'] ?></td>
                            <td><?php echo $entradas['titulo'] ?></td>
                            <td><?php echo $entradas['descripcion'] ?></td>
                            <td>
                                <img width="100" src="../../../assets/img/about/<?php echo $entradas['imagen'] ?>" />
                            </td>
                            <td>
                                <a name="" id="" class="btn btn-primary" href="editar.php?txtId=<?php echo $entradas['id']; ?>" role="button">Editar</a> |
                                <a name="" id="" class="btn btn-danger" href="index.php?txtId=<?php echo $entradas['id']; ?>" role="button">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php include("../../template/footer.php"); ?>