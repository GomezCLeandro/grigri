<?php

require_once 'Localidad.php';
require_once 'MySQL.php';

class Barrio {
	private $_idBarrio;
	private $_nombre;

    public $localidad;

    public function __construct($nombre) {
        $this->_nombre = $nombre;
    }
    /**
     * @return mixed
     */
    public function getIdBarrio()
    {
        return $this->_idBarrio;
    }

    /**
     * @param mixed $_idBarrio
     *
     * @return self
     */
    public function setIdBarrio($_idBarrio)
    {
        $this->_idBarrio = $_idBarrio;

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

    public function guardar() {
    	
        $sql = "INSERT INTO Barrio (id_barrio, nombre) VALUES (NULL, '$this->_nombre')";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);
        $mysql->desconectar();

        $this->_idBarrio = $idInsertado;
    }

    public function actualizar($id) {

        $sql = "UPDATE Barrio SET nombre ='$this->_nombre' WHERE id_barrio =". $id;

        $mysql = new MySQL();
        $mysql->actualizar($sql);
        $mysql->desconectar();
    }

    public function eliminar($id) {
        $sql = "DELETE FROM Barrio WHERE id_barrio =".$id;

        $mysql = new MySQL();
        $mysql->eliminar($sql);
        $mysql->desconectar();
    }

    public static function obtenerTodos() {
        $sql = "SELECT * FROM barrio";

        $mysql = new MySQL();
        $datos = $mysql->consulta($sql);
        $mysql->desconectar();

        $listado = self::_generarListado($datos);
        return $listado;
    }

    private function _generarListado($datos) {
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $barrio = new Barrio($registro['nombre']);
            $barrio->_idBarrio = $registro['id_barrio'];
            $barrio->_idLocalidad = $registro['id_localidad'];
            $listado[] = $barrio;
        }
        return $listado;
    }

    public static function obtenerPorIdBarrio($idBarrio) {
        
        $sql = "SELECT * FROM barrio WHERE id_barrio =". $idBarrio;

        $mysql = new MySQL();
        $datos = $mysql->consulta($sql);
        $mysql->desconectar();

        $data = $datos->fetch_assoc();
        $barrio = null;

        if ($datos->num_rows > 0) {
        
        $barrio = new Barrio($data['nombre']);
        $barrio->_idBarrio = $data['id_barrio'];
        $barrio->_idLocalidad = $data['id_localidad'];
        $barrio->setLocalidad();
        }
        return $barrio;
    }

    private function setLocalidad() {
        $this->localidad = Localidad::obtenerPorIdLocalidad($this->_idLocalidad);
    }

    /**
     * @return mixed
     */
    public function getIdLocalidad()
    {
        return $this->_idLocalidad;
    }

    /**
     * @param mixed $_idLocalidad
     *
     * @return self
     */
    public function setIdLocalidad($_idLocalidad)
    {
        $this->_idLocalidad = $_idLocalidad;

        return $this;
    }

    public function __toString() {
        return $this->_nombre;
    }
}

?>