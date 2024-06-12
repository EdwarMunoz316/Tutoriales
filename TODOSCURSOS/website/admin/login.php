<?php
session_start();

if ($_POST) {
    include("./bd.php");

    $usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : "";
    $contrasenia = (isset($_POST['contrasenia'])) ? $_POST['contrasenia'] : "";

    $sentencia = $conexion->prepare(
        "SELECT *, count(*) as nUsuarios 
        FROM tbl_usuarios 
        WHERE usuario=:usuario AND password=:contrasenia"
    );
    $sentencia->bindParam(":usuario", $usuario);
    $sentencia->bindParam(":contrasenia", $contrasenia);
    $sentencia->execute();

    $listaUsuarios = $sentencia->fetch(PDO::FETCH_LAZY);

    if ($listaUsuarios['nUsuarios'] > 0) {
        $_SESSION['usuario'] = $listaUsuarios['usuario'];
        $_SESSION['logueado'] = true;
        header("Location:index.php");
    } else {
        $mensaje = "Error: El usuario o contraseña son incorrectos";
    }
}

?>

<!doctype html>
<html lang="es">

<head>
    <title>Login</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <header></header>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-4"></div>
                <div class="col-4">
                    <br /><br />
                    <?php if (isset($mensaje)) { ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <strong><?php echo $mensaje; ?></strong>
                        </div>
                    <?php } ?>

                    <div class="card">
                        <div class="card-header">Login</div>
                        <div class="card-body">
                            <script>
                                var alertList = document.querySelectorAll(".alert");
                                alertList.forEach(function(alert) {
                                    new bootstrap.Alert(alert);
                                });
                            </script>

                            <form action="" method="post">
                                <div class="mb-3">
                                    <label for="usuario" class="form-label">Usuario</label>
                                    <input type="text" class="form-control" name="usuario" id="usuario" aria-describedby="helpId" placeholder="" />
                                </div>

                                <div class="mb-3">
                                    <label for="contrasenia" class="form-label">Contraseña</label>
                                    <input type="password" class="form-control" name="contrasenia" id="contrasenia" aria-describedby="helpId" placeholder="" />
                                </div>
                                <input name="" id="" class="btn btn-primary" type="submit" value="Entrar" />
                            </form>
                        </div>
                        <div class="card-footer text-muted"></div>
                    </div>

                </div>
            </div>
        </div>
    </main>
    <footer></footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>