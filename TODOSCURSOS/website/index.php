<?php
include("admin/bd.php");

$sentencia = $conexion->prepare("SELECT * FROM tbl_servicios");
$sentencia->execute();
$lista_servicios = $sentencia->fetchAll(PDO::FETCH_ASSOC);

$sentencia = $conexion->prepare("SELECT * FROM tbl_portafolio");
$sentencia->execute();
$listaPortafolios = $sentencia->fetchAll(PDO::FETCH_ASSOC);

$sentencia = $conexion->prepare("SELECT * FROM tbl_entradas");
$sentencia->execute();
$listaEntradas = $sentencia->fetchAll(PDO::FETCH_ASSOC);

$sentencia = $conexion->prepare("SELECT * FROM tbl_equipo");
$sentencia->execute();
$listaEquipo = $sentencia->fetchAll(PDO::FETCH_ASSOC);

$sentencia = $conexion->prepare("SELECT * FROM tbl_configuraciones");
$sentencia->execute();
$listaConfi = $sentencia->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Agency - Start Bootstrap Theme</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top"><img src="assets/img/navbar-logo.svg" alt="..." /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="#portfolio">Portfolio</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#team">Team</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container">
            <div class="masthead-subheading"><?php echo $listaConfi[0]['valor'] ?></div>
            <div class="masthead-heading text-uppercase"><?php echo $listaConfi['1']['valor'] ?></div>
            <a class="btn btn-primary btn-xl text-uppercase" href="<?php echo $listaConfi['3']['valor'] ?>"><?php echo $listaConfi['2']['valor'] ?></a>
        </div>
    </header>

    <!-- Services-->
    <section class="page-section" id="services">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase"><?php echo $listaConfi['4']['valor'] ?></h2>
                <h3 class="section-subheading text-muted"><?php echo $listaConfi['5']['valor'] ?></h3>
            </div>

            <div class="row text-center">
                <?php foreach ($lista_servicios as $servicio) { ?>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas <?php echo $servicio['icono'] ?> fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3"><?php echo $servicio['titulo'] ?></h4>
                        <p class="text-muted"><?php echo $servicio['descripcion'] ?></p>
                    </div>
                <?php } ?>
            </div>

        </div>
    </section>

    <!-- Portfolio Grid-->
    <section class="page-section bg-light" id="portfolio">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase"><?php echo $listaConfi['6']['valor'] ?></h2>
                <h3 class="section-subheading text-muted"><?php echo $listaConfi['7']['valor'] ?></h3>
            </div>

            <div class="row">
                <?php foreach ($listaPortafolios as $portafolio) { ?>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal<?php echo $portafolio['id']; ?>">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="<?php echo "assets/img/portfolio/" . $portafolio['imagen'] ?>" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading"><?php echo $portafolio['titulo'] ?></div>
                                <div class="portfolio-caption-subheading text-muted"><?php echo $portafolio['categoria'] ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="portfolio-modal modal fade" id="portfolioModal<?php echo $portafolio['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-8">
                                            <div class="modal-body">
                                                <h2 class="text-uppercase"><?php echo $portafolio['titulo'] ?></h2>
                                                <p class="item-intro text-muted"><?php echo $portafolio['subtitulo'] ?></p>
                                                <img class="img-fluid d-block mx-auto" src="<?php echo "assets/img/portfolio/" . $portafolio['imagen'] ?>" alt="..." />
                                                <p><?php echo $portafolio['descripcion'] ?></p>
                                                <ul class="list-inline">
                                                    <li>
                                                        <strong>Cliente:</strong>
                                                        <?php echo $portafolio['cliente'] ?>
                                                    </li>
                                                    <li>
                                                        <strong>Categoria:</strong>
                                                        <?php echo $portafolio['categoria'] ?>
                                                    </li>
                                                    <li>
                                                        <strong>URL:</strong>
                                                        <a href="<?php echo $portafolio['url'] ?>"><?php echo $portafolio['url'] ?></a>
                                                    </li>
                                                </ul>
                                                <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                                    <i class="fas fa-xmark me-1"></i>
                                                    Cerrar
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <!-- About-->
    <section class="page-section" id="about">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase"><?php echo $listaConfi['8']['valor'] ?></h2>
                <h3 class="section-subheading text-muted"><?php echo $listaConfi['9']['valor'] ?></h3>
            </div>
            <ul class="timeline">
                <?php foreach ($listaEntradas as $entrada) { ?>

                    <li class="<?php echo $entrada['id'] % 2 == 0 ? "timeline-inverted" : ""; ?>">
                        <div class="timeline-image bg-white"><img class="rounded-circle img-fluid" src="<?php echo "assets/img/about/" . $entrada['imagen'] ?>" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4><?php echo $entrada['fecha'] ?></h4>
                                <h4 class="subheading"><?php echo $entrada['titulo'] ?></h4>
                            </div>
                            <div class="timeline-body">
                                <p class="text-muted"><?php echo $entrada['descripcion'] ?></p>
                            </div>
                        </div>
                    </li>

                <?php } ?>
                <li class="timeline-inverted">
                    <div class="timeline-image">
                        <h4>
                            <br>
                            <?php echo $listaConfi['10']['valor'] ?>
                        </h4>
                    </div>
                </li>
            </ul>
        </div>
    </section>

    <!-- Team-->
    <section class="page-section bg-light" id="team">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase"><?php echo $listaConfi['11']['valor'] ?></h2>
                <h3 class="section-subheading text-muted"><?php echo $listaConfi['12']['valor'] ?></h3>
            </div>
            <div class="row">
                <?php foreach ($listaEquipo as $equipo) { ?>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="<?php echo "assets/img/team/" . $equipo['imagen'] ?>" alt="..." />
                            <h4><?php echo $equipo['nombreCompleto'] ?></h4>
                            <p class="text-muted"><?php echo $equipo['puesto'] ?></p>
                            <a class="btn btn-dark btn-social mx-2" href="<?php echo $equipo['twitter'] ?>" aria-label="Parveen Anand Twitter Profile"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="<?php echo $equipo['facebook'] ?>" aria-label="Parveen Anand Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="<?php echo $equipo['linkedin'] ?>" aria-label="Parveen Anand LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Clients-->
    <div class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-3 col-sm-6 my-3">
                    <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/microsoft.svg" alt="..." aria-label="Microsoft Logo" /></a>
                </div>
                <div class="col-md-3 col-sm-6 my-3">
                    <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/google.svg" alt="..." aria-label="Google Logo" /></a>
                </div>
                <div class="col-md-3 col-sm-6 my-3">
                    <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/facebook.svg" alt="..." aria-label="Facebook Logo" /></a>
                </div>
                <div class="col-md-3 col-sm-6 my-3">
                    <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/ibm.svg" alt="..." aria-label="IBM Logo" /></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact-->
    <section class="page-section" id="contact">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase"><?php echo $listaConfi['13']['valor'] ?></h2>
                <h3 class="section-subheading text-muted"><?php echo $listaConfi['14']['valor'] ?></h3>
            </div>
        </div>
    </section>

    <!-- Footer-->
    <footer class="footer py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-start">Copyright &copy; Your Website 2024</div>
                <div class="col-lg-4 my-3 my-lg-0">
                    <a class="btn btn-dark btn-social mx-2" href="<?php echo $listaConfi['15']['valor'] ?>" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="<?php echo $listaConfi['16']['valor'] ?>" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="<?php echo $listaConfi['17']['valor'] ?>" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>