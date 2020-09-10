<?php

require_once "MySQL.php";

class Envio {
	
	private $_idEnvio;
	private $_descripcion;

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

    public function obtenerTodos() {
    	$sql = "SELECT * FROM tipoenvio";

    	$mysql = new MySQL;
    	$datos = $mysql->consulta($sql);
    	$mysql->desconectar();

    	$listaTipoEnvio = self::_generarListadoTipoEnvio($datos);
    	return $listaTipoEnvio;
    }

    private function _generarListadoTipoEnvio($datos) {
    	$listado = array();
    	while ($registro = $datos->fetch_assoc()) {
    		$tipoEnvio = new Envio();
    		$tipoEnvio->_idEnvio = $registro['id_envio'];
    		$tipoEnvio->_descripcion = $registro['descripcion'];
    		$listado[] = $tipoEnvio;
    	}
    	return $listado;
    }
}
?>