<?php

require_once "MySQL.php";

class EstadoPedido {
	
	private $_idEstadoPedido;
	private $_descripcion;

    /**
     * @return mixed
     */
    public function getIdEstadoPedido()
    {
        return $this->_idEstadoPedido;
    }

    /**
     * @param mixed $_idEstadoPedido
     *
     * @return self
     */
    public function setIdEstadoPedido($_idEstadoPedido)
    {
        $this->_idEstadoPedido = $_idEstadoPedido;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->_descripcion;
    }

    /**
     * @param mixed $_descripcion
     *
     * @return self
     */
    public function setDescripcion($_descripcion)
    {
        $this->_descripcion = $_descripcion;

        return $this;
    }

    public function obtenerTodos() {
    	$sql = "SELECT * FROM estadopedido";

    	$mysql = new MySQL;
    	$datos = $mysql->consulta($sql);
    	$mysql->desconectar();

    	$listaEstadoPedido = self::_generarListadoEstadoPedido($datos);
    	return $listaEstadoPedido;
    }

    private function _generarListadoEstadoPedido($datos) {
    	$listado = array();
    	while ($registro = $datos->fetch_assoc()) {
    		$estadoPedido = new EstadoPedido();
    		$estadoPedido->_idEstadoPedido = $registro['id_estado_pedido'];
    		$estadoPedido->_descripcion = $registro['descripcion'];
    		$listado[] = $estadoPedido;
    	}
    	return $listado;
    }

    public static function obtenerPorId($id) {

        $sql = "SELECT * FROM estadopedido WHERE id_estado_pedido = " . $id;

        $mysql = new MySQL();
        $datos = $mysql->consulta($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();
        $estadoPedido = new EstadoPedido();
        $estadoPedido->_descripcion = $registro['descripcion'];
        $estadoPedido->_idEstadoPedido = $registro['id_estado_pedido'];
        return $estadoPedido;
    }
}

?>