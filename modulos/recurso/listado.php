<?php

require_once '../../clases/Recurso.php';

$listado = Recurso::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Listado Recursos</title>
</head>
<body>

	<?php require_once '../../menu.php'; ?>

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div>
            <a class="au-btn au-btn-icon au-btn--blue" href="alta.php">
                <i class="zmdi zmdi-plus"></i>Recurso</a>
            </div>
            <br>                    
            <div class="container-fluid">
                <div class="row">
                    <div>
                        <div class="table-responsive table--no-card m-b-30">
                            <table align="center" class="table table-borderless table-striped table-earning">
                                <thead align="center">
                                    <tr>
										<th>Recurso</th>
										<th>Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php foreach ($listado as $recursos): ?>
                                    <tr>
                                    	<td> <?php echo $recursos; ?> </td>
                                        <td>
                                        	<a class="btn btn-secondary btn-sm" href="modificar.php?id=<?php echo $recursos->getIdRecurso(); ?>">Modificar</a>
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