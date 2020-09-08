<?php

require_once '../../clases/Categoria.php';

$listado = Categoria::obtenerTodos();

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
    <title>Tabla Categoria</title>

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
                        <i class="zmdi zmdi-plus"></i>categoria</a>
                    </div>
                    <br>                    
                    <div class="container-fluid">
                        <div class="row">
                            <div>
                                <div class="table-responsive table--no-card m-b-30">
                                    <table align="center" class="table table-borderless table-striped table-earning">
                                        <thead align="center">
                                            <tr>
												<th>Categoria</th>
												<th >Accion</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php foreach ($listado as $categoria): ?>
                                            <tr>
                                            	<td> <?php echo $categoria; ?> </td>
                                                <td>
                                                	<a class="btn btn-secondary btn-sm" href="modificar.php?id=<?php echo $categoria->getIdCategoria(); ?>">Modificar</a>
                                                	<a class="btn btn-warning btn-sm" href="eliminar.php?id=<?php echo $usuario->getIdPersona(); ?>">Borrar</a>
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