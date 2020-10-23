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
    <div>
        <div>
            <div>
                <div>
                    <div >
                        <div >
                            <h4>Informe Por Fechas</h4>
                        </div>
                        <form lass="tab-wizard wizard-circle wizard" name="frmDatos" id="frmDatos" method='GET'>
                            <section>
                                <div>
                                    <div >
                                        <div >
                                            <a href="informe_mes.php"><input type="button" class="btn btn-info" value="Informe Por Mes"></a>
                                            <a href="informe_cliente.php"><input type="button"class="btn btn-info" value="Informe Por Cliente"></a>
                                        </div>  
                                    </div>  
                                </div>
                                <div>
                                    <div >
                                        <div>
                                            <label>Fecha Desde</label>
                                            <input type='date' name='txtFechaDesde' >
                                        </div>
                                    </div>
                                    <div>
                                        <div>
                                            <label>Fecha Hasta</label>  
                                            <input type='date' name='txtFechaHasta' class="form-control">
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