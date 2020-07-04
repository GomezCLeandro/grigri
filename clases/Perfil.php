<?php

require_once 'Modulo.php';
require_once 'MySQL.php';

class Perfil {
	
	private $_idPerfil;
	private $_descripcion;
	private $_arrModulos;

	public function __construct($descripcion)
	{
		$this->_descripcion = $descripcion;
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

    /**
     * @return mixed
     */
    public function getIdPerfil()
    {
        return $this->_idPerfil;
    }

    /**
     * @param mixed $_idPerfil
     *
     * @return self
     */

    public static function obtenerPorId($idPerfil) {
    	$sql = "SELECT * FROM perfil WHERE id_perfil = ".$idPerfil;

    	$mysql = new MySQL();
    	$resultado = $mysql->consulta($sql);
    	$mysql->desconectar();

    	$dato = $resultado->fetch_assoc();
    	$perfil = new Perfil($dato['nombre']);
    	$perfil->_idPerfil = $dato['id_perfil'];
    	$perfil->_arrModulos = Modulo::obtenerModulosPorIdPerfil($perfil->_idPerfil);
    	return $perfil;
    }

    public function getModulos() {
        return $this->_arrModulos;
    }

}

?>