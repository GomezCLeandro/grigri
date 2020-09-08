<?php

require_once '../../clases/Disenio.php';
require_once '../../clases/Imagen.php';

$listado = Disenio::obtenerTodos();

//$imagenes = Imagen::obtenerTodos();

//highlight_string(var_export($listado,true));
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
    <title>Listado Dise&ntilde;o</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>
<body>

	<?php require_once '../../menu.php'; ?>

            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div>
                    <a class="au-btn au-btn-icon au-btn--blue" href="alta.php">
                        <i class="zmdi zmdi-plus"></i>dise&ntilde;o</a>
                    </div>
                    <br>                    
                    <div class="container-fluid">
                        <div class="row">
                            <div>
                                <div class="table-responsive table--no-card m-b-30">
                                    <table align="center" class="table table-borderless table-striped table-earning">
                                        <thead align="center">
                                            <tr>
												<th>Descripcion</th>
												<th>Precio</th>
												<th >Accion</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php foreach ($listado as $disenio): ?>
                                            <tr>
                                            	<td> <?php echo $disenio; ?> </td>
                                            	<td> <?php echo $disenio->getPrecio(); ?> </td>
                                                <td>
                                                	<a class="btn btn-secondary btn-sm" href="modificar.php?id=<?php echo $disenio->getIdDisenio(); ?>">Modificar</a>
                                                	<a class="btn btn-warning btn-sm" href="eliminar.php?id=<?php echo $disenio->getIdDisenio(); ?>">Borrar</a>
                                                </td>
                                            </tr>
                                            <?php endforeach ?>	
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
	<title>Listado Dise&ntilde;o</title>
</head>
<body>

	<?php require_once '../../menu.php'; ?>
	
	<table border="1" align="center">
		<tr>
			<th>Descripcion</th>
			<th>Precio</th>
			<th>Accion</th>
		</tr>

		<?php foreach ($listado as $disenio): ?>

		<tr>
			<td> <?php echo $disenio->getDescripcion(); ?> </td>
			<td> <?php echo $disenio->getPrecio(); ?> </td>
			<td>
				<a href="modificar.php?id=<?php echo $disenio->getIdDisenio(); ?>">Modificar</a>
				-
				<a href="eliminar.php?id=<?php echo $disenio->getIdDisenio(); ?>">Borrar</a>
			</td>
		</tr>

		<?php endforeach ?>		

	</table>

	<a href="alta.php">Agregar Nuevo Diseño</a>

</body>
</html>