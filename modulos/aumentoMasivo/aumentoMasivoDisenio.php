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

    <title>Listado Dise&ntilde;o</title>

</head>
<body>

	<?php require_once '../../menu.php'; ?>

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive table--no-card m-b-30">
                            <table align="center" class="table table-borderless table-striped table-earning">
                                <thead>
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
                                        	<a class="btn btn-secondary btn-sm" href="modificar.php?id=<?php echo $disenio->getIdDisenio(); ?>">Aumentar</a>
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

<script>
		function aumentarPrecio() {

        console.log($('#idRecurso').val());
        console.log($('#txtAumento').val());

		    $.ajax({
		        type: 'GET',
		        url : 'json/aumentoMasivoPorRecurso.php',
		        data: {
		        	'idRecurso': $('#idRecurso').val(),
		        	'aumento': $('#txtAumento').val()
		        }
                success: function(data){
                    if (data == true) {
                        console.log(data);
                        alert('Aumentado');
                    }
                }
		    })
        location.reload();     
		}
</script>

</body>
</html>