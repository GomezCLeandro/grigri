<?php
require_once 'MySQL.php';

class modulo {

	private $_idModulo;
	private $_nombre;
	private $_directorio;

	public function __construct($nombre,$directorio) {
		$this->_nombre = $nombre;
		$this->_directorio = $directorio;
    }

    /**
     * @return mixed
     */
    public function getIdModulo()
    {
        return $this->_idModulo;
    }

    /**
     * @param mixed $_idModulo
     *
     * @return self
     */
    public function setIdModulo($_idModulo)
    {
        $this->_idModulo = $_idModulo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->_nombre;
    }

    /**
     * @param mixed $_nombre
     *
     * @return self
     */
    public function setNombre($_nombre)
    {
        $this->_nombre = $_nombre;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDirectorio()
    {
        return $this->_directorio;
    }

    /**
     * @param mixed $_directorio
     *
     * @return self
     */
    public function setDirectorio($_directorio)
    {
        $this->_directorio = $_directorio;

        return $this;
    }

    public function guardar() {
        $sql = "INSERT INTO Modulo (id_modulo, nombre, directorio) VALUES (NULL, '$this->_nombre', '$this->_directorio')";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);
        $mysql->desconectar();

        $this->_idModulo = $idInsertado;
    }

    public function actualizar() {

        $sql = "UPDATE modulo SET nombre = '$this->_nombre', directorio = '$this->_directorio' WHERE id_modulo ='$this->_idModulo'";

        $mysql = new MySQL();
        $mysql->actualizar($sql);
        $mysql->desconectar();
    }

    public static function obtenerTodos(){
        $sql = "SELECT * FROM modulo";

        $mysql = new MySQL();
        $datos = $mysql->consulta($sql);
        $mysql->desconectar();

        $listado = self::_generarListadoModulos($datos);

        return $listado;
    }

    public static function obtenerPorId($idModulo) {
        $sql = "SELECT * FROM modulo WHERE id_modulo = ".$idModulo;

        $mysql = new MySQL();
        $resultado = $mysql->consulta($sql);
        $mysql->desconectar();

        $dato = $resultado->fetch_assoc();
        $modulo = new Modulo($dato['nombre'],$dato['directorio']);
        $modulo->_idModulo = $dato['id_modulo'];
        return $modulo;
    }

    public static function obtenerModulosPorIdPerfil($idPerfil) {
    	$sql = "SELECT modulo.id_modulo, modulo.nombre, modulo.directorio FROM modulo INNER JOIN perfil_modulo on perfil_modulo.id_modulo = modulo.id_modulo "
    	. "INNER JOIN perfil on perfil.id_perfil = perfil_modulo.id_perfil WHERE perfil.id_perfil = ".$idPerfil;

    	$mysql = new MySQL();
    	$datos = $mysql->consulta($sql);
    	$mysql->desconectar();

    	$listado = self::_generarListadoModulos($datos);
    	return $listado;
    }

    private function _generarListadoModulos($datos) {
    	$listado = array();
    	while ($registro = $datos->fetch_assoc()) {
    		$modulo = new Modulo($registro['nombre'],$registro['directorio']);
    		$modulo->_idModulo = $registro['id_modulo'];
    		$listado[] = $modulo;
    	}
    	return $listado;
    }

    public function __toString() {
        return $this->_nombre;
    }
}
?>