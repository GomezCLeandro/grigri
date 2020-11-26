<?php

require_once 'config.php';
require_once "clases/Usuario.php";

session_start();

if (!isset($_SESSION['usuario'])) {
	header('location: formulario_login.php');
}

$usuario = $_SESSION['usuario'];

$imagen = $usuario->fotoPerfil->getFoto();

if (is_null($imagen)) {
    $imagen = "sinfoto.jpg";
}

//highlight_string(var_export($imagen,true));
//exit;
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Menu Catalogo</title>

    <!-- Fontfaces CSS-->
    <link href="/grigri/css/font-face.css" rel="stylesheet" media="all">
    <link href="/grigri/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="/grigri/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="/grigri/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="/grigri/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Full Slider  -->
    <link href="/grigri/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/grigri/css/full-slider.css" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="/grigri/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="/grigri/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="/grigri/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="/grigri/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="/grigri/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="/grigri/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="/grigri/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="/grigri/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <!-- HEADER DESKTOP-->
    <header class="header-desktop3 d-none d-lg-block">
        <div class="section__content section__content--p35">
            <div class="header3-wrap">
                <div class="header__logo">
                    <a href="">
                        <img src="" alt="" />
                    </a>
                </div>
                <div class="header__navbar">
                    <ul class="list-unstyled">
                          
                        <?php foreach ($usuario->perfil->getModulos() as $modulo): ?>

                            <?php if ($modulo == 'Catalogo') : ?>
                                <li class="has-sub">
                                    <a href="#" class="js-arrow"><i class="fa fa-circle"></i>Catalogo<span class="fa arrow"></span></a>
                                    <ul class="header3-sub-list list-unstyled">
                                        <li>
                                            <a href="/grigri/modulos/catalogo/inicioCatalogo.php">Inicio</a>
                                        </li>
                                        <li>
                                            <a href="/grigri/modulos/catalogo/catalogoDisenios.php">Diseños</a>
                                        </li>
                                        <li>
                                            <a href="/grigri/modulos/catalogo/catalogoServicio.php">Servicios</a>
                                        </li>
                                    </ul>
                                </li>
                            <?php elseif ($modulo == 'Dashboard') : ?>
                                <li>
                                    <a href="/grigri/modulos/<?php echo $modulo->getDirectorio() . '/' . 'dashboard.php'?>">
                                        
                                        <i class="fas fa-tachometer-alt"></i><?php echo utf8_encode($modulo); ?></a>
                                </li>

                            <?php endif ?>
                        <?php endforeach ?>

                        <li class="has-sub">
                            <a href="#" class="js-arrow"><i class="fa fa-circle"></i>Modulos<span class="fa arrow"></span></a>
                            <ul class="header3-sub-list list-unstyled">

                        <?php foreach ($usuario->perfil->getModulos() as $modulo): ?>
                            <?php if ($modulo != 'Dashboard' or $modulo != 'Catalogo') : ?>

                                    <li>
                                        <a href="/grigri/modulos/<?php echo $modulo->getDirectorio()?>/listado.php">
                                            <?php echo utf8_encode($modulo); ?></a>
                                    </li>

                            <?php endif ?>
                        <?php endforeach ?>

                            </ul>
                        </li>
                    </ul>
                </div>

                    <div class="account-wrap">
                        <div class="account-item account-item--style2 clearfix js-item-menu">
                            <div class="image">
                                <img src="/grigri/images/fotoPerfil/<?php echo $imagen; ?>" />
                            </div>
                            <div class="content">
                                <a class="js-acc-btn"><?php echo $usuario; ?></a>
                            </div>
                            <div class="account-dropdown js-dropdown">
                                <div class="info clearfix">
                                    <div class="image">
                                        <img src="/grigri/images/fotoPerfil/<?php echo $imagen; ?>" />
                                    </div>
                                    <div class="content">
                                        <h5 class="name">
                                            <?php echo $usuario; ?>
                                        </h5>
                                        <span class="email"><?php echo $usuario->getApellido() . ", " . $usuario->getNombre() ; ?></span>
                                    </div>
                                </div>
                                <div class="account-dropdown__body">
                                    <div class="account-dropdown__item">
                                        <a href="/grigri/modulos/usuario/detalle.php?id=<?php echo $usuario->getIdUsuario(); ?>">
                                            <i class="zmdi zmdi-account"></i>Cuenta</a>
                                    </div>
                                    <div class="account-dropdown__footer">
                                        <a href="/grigri/logout.php">
                                            <i class="zmdi zmdi-power"></i>Cerra Sesion</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
        </div>
    </header>
    <!-- END HEADER DESKTOP-->

    <!-- Jquery JS-->
    <script src="/grigri/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="/grigri/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="/grigri/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="/grigri/vendor/slick/slick.min.js">
    </script>
    <script src="/grigri/vendor/wow/wow.min.js"></script>
    <script src="/grigri/vendor/animsition/animsition.min.js"></script>
    <script src="/grigri/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="/grigri/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="/grigri/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="/grigri/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="/grigri/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="/grigri/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="/grigri/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="/grigri/js/main 2.js"></script>

</body>
</html>