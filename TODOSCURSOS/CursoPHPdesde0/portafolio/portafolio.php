<?php include("cabecera.php"); ?>
<?php include("conexion.php"); ?>
<?php 

if($_POST){

    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    $fecha = new DateTime();

    $imagen = $fecha->getTimestamp()."_".$_FILES['archivo']['name'];

    $imagen_temporal = $_FILES['archivo']['tmp_name'];

    move_uploaded_file($imagen_temporal, "imagenes/$imagen");

    $conexion = new conexion();
    $sql="INSERT INTO `proyectos` (`id`, `nombre`, `imagen`, `descripcion`) VALUES (NULL, '$nombre', '$imagen', '$descripcion');";
    $conexion->crud($sql);
    header("location:portafolio.php");

}

if($_GET){

    $id=$_GET['borrar'];
    $conexion = new conexion();

    $imagen = $conexion->consultar("SELECT imagen FROM `proyectos` WHERE id=$id");

    unlink("imagenes/".$imagen[0]['imagen']);

    $sql = "DELETE FROM proyectos WHERE `proyectos`.`id` = $id";
    $conexion->crud($sql);
    header("location:portafolio.php");
}

$conexion = new conexion();
$proyectos = $conexion->consultar("SELECT * FROM `proyectos`");

?>
    <br>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
            <div class="card">
                <div class="card-header">Datos del proyecto</div>
                <div class="card-body">
                    <form action="portafolio.php" method="post" enctype="multipart/form-data">
                    Nombre del proyecto: <input required class="form-control" type="text" name="nombre" id="">
                    <br/>
                    Imagen del proyecto: <input required class="form-control" type="file" name="archivo" id="">
                    <br/>
                    Descripcion: 
                    <textarea class="form-control" name="descripcion" rows="3" ></textarea>
                    <br/>
                    <input class="btn btn-success" type="submit" value="Enviar proyecto">
                    </form>  
                </div>
            </div>
            </div>
            <div class="col-md-6">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Imagen</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($proyectos as $proyecto) {?>
                            <tr>
                                <td><?php echo $proyecto['id']; ?></td>
                                <td><?php echo $proyecto['nombre']; ?></td>
                                <td>
                                    <img width="100" src="imagenes/<?php echo $proyecto['imagen']; ?>" alt="">
                                </td>
                                <td><?php echo $proyecto['descripcion']; ?></td>
                                <td><a name="borrar" class="btn btn-danger" href="?borrar=<?php echo $proyecto['id'];?>">Eliminar</a>
                                </td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<?php include("pie.php"); ?>