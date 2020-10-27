<?php

require_once "MySQL.php";

class EstadoReserva {
	
	private $_idEstadoReserva;
	private $_descripcion;

    /**
     * @return mixed
     */
    public function getIdEstadoReserva()
    {
        return $this->_idEstadoReserva;
    }

    /**
     * @param mixed $_idEstadoReserva
     *
     * @return self
     */
    public function setIdEstadoReserva($_idEstadoReserva)
    {
        $this->_idEstadoReserva = $_idEstadoReserva;

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

    public static function obtenerTodos(){
    	$sql = "SELECT * FROM estadoreserva";

    	$mysql = new MySQL();
    	$datos = $mysql->consulta($sql);
    	$mysql->desconectar();

        $estadoReserva = self::_listadoEstadoReserva($datos);
        return $estadoReserva;
    }

    private function _listadoEstadoReserva($datos) {
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $estadoReserva = new EstadoReserva();
            $estadoReserva->_idEstadoReserva = $registro['id_estado_reserva'];
			$estadoReserva->_descripcion = $registro['descripcion'];

            $listado[] = $estadoReserva;
        }
        return $listado;
    }

    public function __toString() {
        return $this->_descripcion;
    }  

}

?>