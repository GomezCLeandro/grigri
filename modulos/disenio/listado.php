<?php

require_once '../../clases/Disenio.php';
require_once '../../clases/Imagen.php';
require_once "../../config.php";

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
										<th>Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php foreach ($listado as $disenio): ?>
                                    <tr>
                                    	<td> <?php echo $disenio; ?> </td>
                                    	<td onclick="setAumento('<?php echo $disenio->getIdItem() ?>')"> <?php echo $disenio->getPrecio(); ?> </td>
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

<script>
    
    function setAumento(id){

        let precio = prompt('Ingrese el nuevo precio');

        if (precio == null || precio == "") {
            return false;
        }

        $.ajax({
            type: 'GET',
            url : 'procesar/cambiarPrecio.php',
            data: {
                'idItem': id,
                'precio': precio
            },
            success: function(data){
                if (data == true) {}
                //console.log(data)
                alert('Aumentado');
            }
        })
        //location.reload();
    }

</script>

</body>
</html>