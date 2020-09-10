<?php

require_once '../../clases/Usuario.php';

$listado = Usuario::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Listado Usuario</title>
</head>
<body>

	<?php require_once '../../menu.php'; ?>
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-9">
                    	<div>
	                    <a class="au-btn au-btn-icon au-btn--blue" href="alta.php">
	                        <i class="zmdi zmdi-plus"></i>Nuevo Usuario</a>
	                    </div>
	                    <br>
                        <div class="table-responsive table--no-card m-b-30">
                            <table class="table table-borderless table-striped table-earning">
					        <thead>
				            <tr>
				                <th>Username</th>
				                <th>Password</th>
				                <th>Foto Perfil</th>
				                <th>Accion</th>
				            </tr>
					        </thead>
					        <?php foreach ($listado as $usuario): ?>
					        <tbody>
				            <tr>
				          		<td> <?php echo $usuario->getUsername(); ?> </td>
								<td> <?php echo $usuario->getPassword(); ?> </td>
								<td> 
									<img src="<?php echo DIR_FOTOPERFIL ?>/<?php echo $usuario->fotoPerfil->getFoto() ?>" width="50">
								</td>
								<td>
									<a class="btn btn-success btn-sm" href="detalle.php?id=<?php echo $usuario->getIdUsuario(); ?>">Detalle</a>
									<a class="btn btn-secondary btn-sm" href="modificar.php?id=<?php echo $usuario->getIdUsuario(); ?>">Modificar</a>
									<a class="btn btn-warning btn-sm" href="eliminar.php?id=<?php echo $usuario->getIdPersona(); ?>">Borrar</a>
								</td>                                                
				            </tr>
					        </tbody>
					    	<?php endforeach ?>
					    	</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>