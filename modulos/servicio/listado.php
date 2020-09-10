<?php

require_once '../../clases/Servicio.php';

$listado = Servicio::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Listado Servicio</title>
</head>
<body>

	<?php require_once '../../menu.php'; ?>

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div>
            <a class="au-btn au-btn-icon au-btn--blue" href="alta.php">
                <i class="zmdi zmdi-plus"></i>Servicio</a>
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
                                	<?php foreach ($listado as $servicio): ?>
                                    <tr>
                                    	<td> <?php echo $servicio; ?> </td>
                                    	<td> <?php echo $servicio->getPrecio(); ?> </td>
                                        <td>
                                        	<a class="btn btn-secondary btn-sm" href="modificar.php?id=<?php echo $servicio->getIdServicio(); ?>">Modificar</a>
                                        	<a class="btn btn-warning btn-sm" href="eliminar.php?id=<?php echo $servicio->getIdServicio(); ?>">Borrar</a>
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