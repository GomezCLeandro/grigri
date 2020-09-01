<?php

require_once 'Modulo.php';
require_once 'MySQL.php';

class Perfil {
	
	private $_idPerfil;
	private $_descripcion;
	public $arrModulos;

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

    public static function obtenerTodos(){
        $sql = "SELECT * FROM perfil";

        $mysql = new MySQL();
        $datos = $mysql->consulta($sql);
        $mysql->desconectar();

        $listadoPerfiles = self::_listadoPerfiles($datos);

        return $listadoPerfiles;
    }

    private function _listadoPerfiles($datos) {
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $perfil = new Perfil($registro['nombre']);
            $perfil->_idPerfil = $registro['id_perfil'];
            $listado[] = $perfil;
        }
        return $listado;
    }

    public static function obtenerPorId($idPerfil) {
    	$sql = "SELECT * FROM perfil WHERE id_perfil = ".$idPerfil;

    	$mysql = new MySQL();
    	$resultado = $mysql->consulta($sql);
    	$mysql->desconectar();

    	$dato = $resultado->fetch_assoc();
    	$perfil = new Perfil($dato['nombre']);
    	$perfil->_idPerfil = $dato['id_perfil'];
    	$perfil->arrModulos = Modulo::obtenerModulosPorIdPerfil($perfil->_idPerfil);
    	return $perfil;
    }

    public function getModulos() {
        return $this->arrModulos;
    }

    public function tieneModulo($idModulo){
        $sql = "SELECT * FROM perfil_modulo "
            . "WHERE id_modulo = $idModulo "
            . "AND id_perfil = $this->_idPerfil";
            
        $mysql = new MySQL();
        $result = $mysql->consulta($sql);
        $mysql->desconectar();

        return $result->num_rows > 0;
    }

    public function guardar() {
        $sql="INSERT INTO Perfil (id_perfil, nombre) VALUES (null, '$this->_descripcion')";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idPerfil = $idInsertado;
    }

}

?>