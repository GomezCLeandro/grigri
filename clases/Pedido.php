<?php

require_once "MySQL.php";
require_once "DetallePedido.php";

class Pedido {
	
	private $_idPedido;
	private $_idUsuario;
	private $_idEnvio;
	private $_idEstadoPedido;
	private $_fechaEntrega;
    private $_fechaCreacion;
	private $_lugarEntrega;

    private $_arrDetallePedido;
    const ACTIVO = 1;

    public function __construct() {

        $this->_idEstadoPedido = self::ACTIVO;
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
    public function getIdUsuario()
    {
        return $this->_idUsuario;
    }

    /**
     * @param mixed $_idUsuario
     *
     * @return self
     */
    public function setIdUsuario($_idUsuario)
    {
        $this->_idUsuario = $_idUsuario;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdEnvio()
    {
        return $this->_idEnvio;
    }

    /**
     * @param mixed $_idEnvio
     *
     * @return self
     */
    public function setIdEnvio($_idEnvio)
    {
        $this->_idEnvio = $_idEnvio;

        return $this;
    }

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
    public function getFechaEntrega()
    {
        return $this->_fechaEntrega;
    }

    /**
     * @param mixed $_fechaEntrega
     *
     * @return self
     */
    public function setFechaEntrega($_fechaEntrega)
    {
        $this->_fechaEntrega = $_fechaEntrega;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLugarEntrega()
    {
        return $this->_lugarEntrega;
    }

    /**
     * @param mixed $_lugarEntrega
     *
     * @return self
     */
    public function setLugarEntrega($_lugarEntrega)
    {
        $this->_lugarEntrega = $_lugarEntrega;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFechaCreacion()
    {
        return $this->_fechaCreacion;
    }

    /**
     * @param mixed $_fechaCreacion
     *
     * @return self
     */
    public function setFechaCreacion($_fechaCreacion)
    {
        $this->_fechaCreacion = $_fechaCreacion;

        return $this;
    }

    /**
     * @param mixed $arrDetallePedido
     *
     * @return self
     */
    public function setArrDetallePedido()
    {
        $this->_arrDetallePedido = DetallePedido::obtenerPorIdPedido($this->_idPedido);

        return $this;
    }

    public function guardar() {
        $sql = "INSERT INTO pedido (id_pedido, id_usuario, id_envio, id_estado_pedido, fecha_entrega, lugar_entrega, fecha_creacion) "
        . "VALUES (NULL, '$this->_idUsuario', '$this->_idEnvio', '$this->_idEstadoPedido', '$this->_fechaEntrega', '$this->_lugarEntrega', '$this->_fechaCreacion')";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);
        $mysql->desconectar();

        $this->_idPedido = $idInsertado;
    }

    public function actualizar($idPedido) {
        $sql = "UPDATE pedido SET id_usuario = '$this->_idUsuario',id_envio = '$this->_idEnvio',id_estado_pedido = '$this->_idEstadoPedido', "
        . "fecha_entrega = '$this->_fechaEntrega',lugar_entrega = '$this->_lugarEntrega', fecha_creacion = '$this->_fechaCreacion' "
        . "WHERE id_pedido =" . $idPedido;
        
        $mysql = new MySQL();
        $mysql->actualizar($sql);
        $mysql->desconectar();        
    }


    public static function obtenerTodos(){
        $sql = "SELECT * FROM pedido";

        $mysql = new MySQL();
        $datos = $mysql->consulta($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoPedidos($datos);

        return $listado;
    }

    private function _generarListadoPedidos($datos) {
    	$listado = array();
    	while ($registro = $datos->fetch_assoc()) {
    		$pedido = new Pedido();
    		$pedido->_idPedido = $registro['id_pedido'];
    		$pedido->_idUsuario = $registro['id_usuario'];
    		$pedido->_idEnvio = $registro['id_envio'];
    		$pedido->_idEstadoPedido = $registro['id_estado_pedido'];
    		$pedido->_fechaEntrega = $registro['fecha_entrega'];
            $pedido->_fechaCreacion = $registro['fecha_creacion'];
    		$pedido->_lugarEntrega = $registro['lugar_entrega'];
            $pedido->setArrDetallePedido();

    		$listado[] = $pedido;
    	}
    	return $listado;
    }

    public static function obtenerPorId($id) {

        $sql = "SELECT * FROM pedido WHERE id_pedido = " . $id;

        $mysql = new MySQL();
        $datos = $mysql->consulta($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();
    		$pedido = new Pedido();
    		$pedido->_idPedido = $registro['id_pedido'];
    		$pedido->_idUsuario = $registro['id_usuario'];
    		$pedido->_idEnvio = $registro['id_envio'];
    		$pedido->_idEstadoPedido = $registro['id_estado_pedido'];
    		$pedido->_fechaEntrega = $registro['fecha_entrega'];
            $pedido->_fechaCreacion = $registro['fecha_creacion'];
    		$pedido->_lugarEntrega = $registro['lugar_entrega'];
            $pedido->setArrDetallePedido();
        return $pedido;
    }

    public function calcularTotal() {
        $total = 0;
        foreach ($this->_arrDetallePedido as $detallePedido) {
            $total = $total+$detallePedido->calcularSubTotal();
        }
        return $total;
    }
}

?>