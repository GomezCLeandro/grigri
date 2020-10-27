<?php

require_once "../../clases/MySQL.php";

if (isset($_GET['txtFechaDesde'])) {
    $fechaDesde = $_GET['txtFechaDesde'];
}

if (isset($_GET['txtFechaHasta'])) {
    $fechaHasta = $_GET['txtFechaHasta'];
}

$datos = NULL;

if (isset($fechaDesde) && isset($fechaHasta)) {
    if (!empty($fechaDesde) && !empty($fechaHasta)) {
        $sql = "SELECT factura.fecha, factura.numero, factura.tipo, "
            . "SUM(dp.cantidad * dp.precio) as total "
            . "FROM factura "
            . "INNER JOIN detallepedido as dp ON dp.id_pedido = factura.id_pedido "
            . "WHERE factura.fecha BETWEEN '$fechaDesde' AND '$fechaHasta' "
            . "GROUP BY factura.id_factura";

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
    }
}

?>

<!DOCTYPE html>
<html>
<body>

    <?php require_once '../../menu.php'; ?>


    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">Dashboard</h2>
                        </div>
                        <form lass="tab-wizard wizard-circle wizard" name="frmDatos" id="frmDatos" method='GET'>
                            <section>
                                <div>
                                    <div >
                                        <div >
                                            <a href="../informe/informePedidosPendientes.php">
                                                <input type="button" class="btn btn-info" value="Informe Pedidos Pendientes">
                                            </a>
                                            <a href="../informe/informePedidosSenados.php">
                                                <input type="button"class="btn btn-info" value="Informe Pedidos Señados">
                                            </a>
                                        </div>  
                                    </div>  
                                </div>
                                <div>
                                    <div >
                                        <div>
                                            <label>Fecha Desde</label>
                                            <input type='date' name='txtFechaDesde'>
                                        </div>
                                    </div>
                                    <div>
                                        <div>
                                            <label>Fecha Hasta</label>  
                                            <input type='date' name='txtFechaHasta'>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <input type='submit' value='Consultar'>
                        </form>
                        <br>
                        <?php if (!is_null($datos)): ?>
                            <table>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Factura Numero</th>
                                    <th>Tipo de Factura</th>
                                    <th>Total</th>
                                </tr>
                                <?php while($row = $datos->fetch_assoc()): ?>
                                    <tr>
                                    <td><?php echo $row['fecha'] ?></td>
                                    <td><?php echo $row['numero'] ?></td>
                                    <td><?php echo $row['tipo'] ?></td>
                                    <td>$<?php echo $row['total'] ?></td>
                                    </tr>
                                <?php endwhile ?>
                            </table>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>