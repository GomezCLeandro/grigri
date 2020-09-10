<?php

require_once '../../clases/Perfil.php';

$listado = Perfil::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Listado Perfil</title>
</head>
<body>

	<?php require_once '../../menu.php'; ?>

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div>
            <a class="au-btn au-btn-icon au-btn--blue" href="alta.php">
                <i class="zmdi zmdi-plus"></i>Perfil</a>
            </div>
            <br>                    
            <div class="container-fluid">
                <div class="row">
                    <div>
                        <div class="table-responsive table--no-card m-b-30">
                            <table align="center" class="table table-borderless table-striped table-earning">
                                <thead align="center">
                                    <tr>
										<th>Perfiles</th>
										<th>Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php foreach ($listado as $perfil): ?>
                                    <tr>
                                    	<td> <?php echo $perfil->getDescripcion(); ?> </td>
                                        <td>
                                        	<a class="btn btn-secondary btn-sm" href="modificar.php?id=<?php echo $perfil->getIdPerfil(); ?>">Modificar</a>
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