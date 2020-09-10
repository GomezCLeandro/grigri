<?php

require_once 'MySQL.php';

class DetallePedido {
	
	private $_idDetallePedido;
	private $_idPedido;
	private $_idItem;
	private $_cantidad;

    /**
     * @return mixed
     */
    public function getIdDetallePedido()
    {
        return $this->_idDetallePedido;
    }

    /**
     * @param mixed $_idDetallePedido
     *
     * @return self
     */
    public function setIdDetallePedido($_idDetallePedido)
    {
        $this->_idDetallePedido = $_idDetallePedido;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdPedido()
    {
        return $this->_idPedido;
    }

    /**
     * @param mixed $_idPedido
     *
     * @return self
     */
    public function setIdPedido($_idPedido)
    {
        $this->_idPedido = $_idPedido;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdItem()
    {
        return $this->_idItem;
    }

    /**
     * @param mixed $_idItem
     *
     * @return self
     */
    public function setIdItem($_idItem)
    {
        $this->_idItem = $_idItem;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCantidad()
    {
        return $this->_cantidad;
    }

    /**
     * @param mixed $_cantidad
     *
     * @return self
     */
    public function setCantidad($_cantidad)
    {
        $this->_cantidad = $_cantidad;

        return $this;
    }

    public function guardar() {
        $sql = "INSERT INTO detallepedido (id_detalle_pedido, id_pedido, id_item, cantidad) "
        . "VALUES (NULL, '$this->_idPedido', '$this->_idItem', '$this->_cantidad')";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);
        $mysql->desconectar();

        $this->_idDetallePedido = $idInsertado;
    }

    public function actualizar($idDetallePedido) {
        $sql = "UPDATE detallepedido SET id_pedido = '$this->_idPedido',id_item = '$this->_idItem',cantidad = '$this->_cantidad' "
        . "WHERE id_detalle_pedido =" . $idDetallePedido;

        $mysql = new MySQL();
        $mysql->actualizar($sql);
        $mysql->desconectar();        
    }

    public static function obtenerPorId($id) {

        $sql = "SELECT * FROM detallepedido WHERE id_detalle_pedido = " . $id;

        $mysql = new MySQL();
        $datos = $mysql->consulta($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();
            $detallePedido = new DetallePedido();
            $detallePedido->_idDetallePedido = $registro['id_detalle_pedido'];
            $detallePedido->_idPedido = $registro['id_pedido'];
            $detallePedido->_idItem = $registro['id_item'];
            $detallePedido->_cantidad = $registro['cantidad'];
        return $detallePedido;
    }

    public static function obtenerPorIdPedido($idPedido) {

        $sql = "SELECT * FROM detallepedido WHERE id_pedido = " . $idPedido;

        $mysql = new MySQL();
        $datos = $mysql->consulta($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();
    		$detallePedido = new DetallePedido();
    		$detallePedido->_idDetallePedido = $registro['id_detalle_pedido'];
    		$detallePedido->_idPedido = $registro['id_pedido'];
    		$detallePedido->_idItem = $registro['id_item'];
    		$detallePedido->_cantidad = $registro['cantidad'];
        return $detallePedido;
    }
}

?>