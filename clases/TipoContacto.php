<?php

require_once 'MySQL.php';

class TipoContacto {
	
	private $_idTipoContacto;
	private $_descripcion;

	function __construct ($descripcion) {
		$this->_descripcion = $descripcion;
	}

    /**
     * @return mixed
     */
    public function getIdTipoContacto()
    {
        return $this->_idTipoContacto;
    }

    /**
     * @param mixed $_idTipoContacto
     *
     * @return self
     */
    public function setIdTipoContacto($_idTipoContacto)
    {
        $this->_idTipoContacto = $_idTipoContacto;

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

    public static function obtenerTodos() {
    	$sql = "SELECT * FROM tipocontacto";

    	$mysql = new MySQL();
    	$datos = $mysql->consulta($sql);
    	$mysql->desconectar();

    	$listado = self::_generarListado($datos);
    	return $listado;
    }

    private function _generarListado($datos) {
    	$listado = array();
		while ($registro = $datos->fetch_assoc()) {
			$tipocontacto = new TipoContacto($registro['descripcion']);
			$tipocontacto->_idTipoContacto = $registro['id_tipo_contacto'];
			$listado[] = $tipocontacto;
		}
		return $listado;
    }

    public function __toString() {
        return $this->_descripcion;
    }
}

?>