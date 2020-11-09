<?php

require_once "../../clases/Pedido.php";
require_once "../../clases/Usuario.php";
require_once "../../clases/EstadoPedido.php";
require_once "../../clases/DetallePedido.php";
require_once "../../clases/Disenio.php";

$arrMasVendidos = Pedido::masVendido();

$arrMasVendidos->fetch_assoc();

//highlight_string(var_export($arrMasVendidos,true));
//exit;

?>

<!DOCTYPE html>
<html>
<head>

    <title>Listado Diseños Mas Vendidos</title>

</head>
<body>

	<?php require_once '../../menu.php'; ?>

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div>
                <div class="row m-t-30">
                    <div>
                        <div class="table-responsive m-b-40">

							<table class="table table-borderless table-data3">
                                <thead>
                                    <tr>
                                        <th>Diseño</th>
                                        <th>Veces solicitadas</th>
                                    </tr>

                                    <tbody>
                                    <?php foreach ($arrMasVendidos as $masVendido): ?>
                                        <tr>    
                                            <td> <?php echo $masVendido['descripcion']; ?> </td>
                                            <td> <?php echo $masVendido['cantidad']; ?> </td>
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