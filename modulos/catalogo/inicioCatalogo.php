<?php

require_once "../../clases/Servicio.php";
require_once "../../clases/Disenio.php";
require_once "../../config.php";

$listadoServicio = Servicio::obtenerTodos();
$listadoDisenios = Disenio::obtenerTodos();

?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Full Slider - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="/grigri/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/grigri/css/full-slider.css" rel="stylesheet">

  </head>

  <body>

    <?php require_once '../../menuArriba.php'; ?>
    <!-- Navigation 
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
-->
    <header>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active" style="background-image: url('http://placehold.it/1900x1080')">
            <div class="carousel-caption d-none d-md-block">
              <h3>First Slide</h3>
              <p>This is a description for the first slide.</p>
            </div>
          </div>
          <!-- Slide Two - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('http://placehold.it/1900x1080')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Second Slide</h3>
              <p>This is a description for the second slide.</p>
            </div>
          </div>
          <!-- Slide Three - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('http://placehold.it/1900x1080')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Third Slide</h3>
              <p>This is a description for the third slide.</p>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </header>

    <!-- Page Content -->
    <div class="container">

      <h1 class="my-4 text-center text-lg-left">Galeria</h1>

      <div class="row text-center text-lg-left">

        <?php foreach ($listadoServicio as $imagenServicio) : ?>
          <?php foreach ($imagenServicio->arrImagen as $imagen) : ?>
            
            <div class="col-lg-3 col-md-4 col-xs-6">
              <a href="../servicio/modificar.php?id=<?php echo $imagenServicio->getIdServicio(); ?>" class="d-block mb-4 h-100">
                <img class="img-fluid img-thumbnail" src="<?php echo DIR_GALERIA ?>/<?php echo $imagen ?>" alt="">
              </a>
            </div>

          <?php endforeach ?>
        <?php endforeach ?>

        <?php foreach ($listadoDisenios as $imagenDisenio) : ?>
          <?php foreach ($imagenDisenio->arrImagen as $imagen) : ?>
            
            <div class="col-lg-3 col-md-4 col-xs-6">
              <a href="../disenio/modificar.php?id=<?php echo $imagenDisenio->getIdDisenio(); ?>" class="d-block mb-4 h-100">
                <img class="img-fluid img-thumbnail" src="<?php echo DIR_GALERIA ?>/<?php echo $imagen ?>" alt="">
              </a>
            </div>

          <?php endforeach ?>
        <?php endforeach ?>
        
      </div>
    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="/grigri/vendor/jquery/jquery.min.js"></script>
    <script src="/grigri/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
