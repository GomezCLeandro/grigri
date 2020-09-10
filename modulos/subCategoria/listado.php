<?php

require_once '../../clases/SubCategoria.php';
require_once '../../clases/Categoria.php';

$listado = SubCategoria::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Listado Sub Categorias</title>
</head>
<body>

	<?php require_once '../../menu.php'; ?>

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div>
            <a class="au-btn au-btn-icon au-btn--blue" href="alta.php">
                <i class="zmdi zmdi-plus"></i>SubCategoria</a>
            </div>
            <br>                    
            <div class="container-fluid">
                <div class="row">
                    <div class="top-campaign">
                        <h3 class="title-3 m-b-30">SubCategorias</h3>
                        <div class="table-responsive">
                            <table class="table table-top-campaign">
                                <tbody>
                                	<?php foreach ($listado as $subCategoria): ?>
                                    <tr>
                                    	
                                        <td> <?php echo utf8_encode($subCategoria); ?> </td>
										<td>
											<a href="modificar.php?id=<?php echo $subCategoria->getIdSubCategoria(); ?>">Modificar</a>
											-
											<a href="eliminar.php?id=<?php echo $subCategoria->getIdSubCategoria(); ?>">Borrar</a>
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