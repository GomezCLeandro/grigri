<?php

require_once 'MySQL.php';


class TipoDocumento {

	private $_idTipoDocumento;
	private $_nombre;

	public function __construct($nombre) {
		$this->_nombre = $nombre;
	}

    /**
     * @return mixed
     */
    public function getIdTipoDocumento()
    {
        return $this->_idTipoDocumento;
    }

    /**
     * @param mixed $_idTipoDocumento
     *
     * @return self
     */
    public function setIdTipoDocumento($_idTipoDocumento)
    {
        $this->_idTipoDocumento = $_idTipoDocumento;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->_nombre;
    }

    /**
     * @param mixed $_nombre
     *
     * @return self
     */
    public function setDescripcion($_nombre)
    {
        $this->_nombre = $_nombre;

        return $this;
    }

    public static function obtenerPorId($id) {

        $sql = "SELECT * FROM tipodocumento WHERE id_tipo_documento =" . $id;

        $mysql = new MySQL();
        $datos = $mysql->consulta($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();

        $tipoDocumento = self::_generarTipoDocumento($registro);
        return $tipoDocumento;
    }

    private function _generarTipoDocumento($registro) {

        $tipoDocumento = new TipoDocumento($registro['nombre']);
        $tipoDocumento->_idTipoDocumento = $registro['id_tipo_documento'];

        return $tipoDocumento;
    }

    public static function obtenerTodos() {
    	$sql = "SELECT * FROM tipodocumento";

    	$mysql = new MySQL();
    	$datos = $mysql->consulta($sql);
    	$mysql->desconectar();

    	$listado = self::_generarListado($datos);
    	return $listado;
    }

    private function _generarListado($datos) {
    	$listado = array();
		while ($registro = $datos->fetch_assoc()) {
			$tipoDocumento = new TipoDocumento($registro['nombre']);
			$tipoDocumento->_idTipoDocumento = $registro['id_tipo_documento'];
			$listado[] = $tipoDocumento;
		}
		return $listado;
    }

    public function __toString() {
    	return $this->_nombre;
    }
}


?>