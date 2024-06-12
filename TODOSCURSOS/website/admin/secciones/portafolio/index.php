<?php
include("../../bd.php");

if ($_GET) {

    $txtId = (isset($_GET['txtId'])) ? $_GET['txtId'] : "";

    $sentencia = $conexion->prepare("SELECT imagen FROM tbl_portafolio WHERE id=:txtId");
    $sentencia->bindParam(":txtId", $txtId);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_LAZY);

    if (isset($registro['imagen'])) {
        if (file_exists("../../../assets/img/portfolio/" . $registro['imagen'])) {
            unlink("../../../assets/img/portfolio/" . $registro['imagen']);
        }
    }

    $sentencia = $conexion->prepare("DELETE FROM tbl_portafolio WHERE id=:txtId");
    $sentencia->bindParam(":txtId", $txtId);
    $sentencia->execute();
}

$sentencia = $conexion->prepare("SELECT * FROM tbl_portafolio");
$sentencia->execute();
$listarPortafolios = $sentencia->fetchAll(PDO::FETCH_ASSOC);

include("../../template/header.php");
?>

<div class="card">
    <div class="card-header"><a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar registros</a></div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listarPortafolios as $portafolio) { ?>
                        <tr class="">
                            <td><?php echo $portafolio['id'] ?></td>
                            <td>
                                <h6><?php echo $portafolio['titulo'] ?></h6>
                                - <?php echo $portafolio['subtitulo'] ?><br>
                                - <?php echo $portafolio['url'] ?>
                            </td>
                            <td>
                                <img width="100" src="../../../assets/img/portfolio/<?php echo $portafolio['imagen'] ?>" />
                            </td>
                            <td><?php echo $portafolio['descripcion'] ?></td>
                            <td><?php echo $portafolio['cliente'] ?></td>
                            <td><?php echo $portafolio['categoria'] ?></td>
                            <td>
                                <a name="" id="" class="btn btn-primary" href="editar.php?txtId=<?php echo $portafolio['id']; ?>" role="button">Editar</a> |
                                <a name="" id="" class="btn btn-danger" href="index.php?txtId=<?php echo $portafolio['id']; ?>" role="button">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php include("../../template/footer.php"); ?>