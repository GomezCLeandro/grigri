<?php
require_once 'MySQL.php';

class Localidad {
	private $_idLocalidad;
	private $_nombre;

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
    	
        $sql = "INSERT INTO localidad (id_localidad, nombre) VALUES (NULL, '$this->_nombre')";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);
        $mysql->desconectar();

        $this->_idLocalidad = $idInsertado;
    }

    public function actualizar($id) {

        $sql = "UPDATE localidad SET nombre = '$this->_nombre' WHERE id_localidad =" . $id;

        $mysql = new MySQL();
        $mysql->actualizar($sql);
        $mysql->desconectar();
    }

    public function eliminar() {
        $sql = "DELETE FROM localidad WHERE id_localidad =".$id;

        $mysql = new MySQL();
        $mysql->eliminar($sql);
        $mysql->desconectar();        
    }

    public static function obtenerTodos() {
        $sql = "SELECT * FROM localidad";

        $mysql = new MySQL();
        $datos = $mysql->consulta($sql);
        $mysql->desconectar();

        $listado = self::_generarListado($datos);
        return $listado;
    }

    private function _generarListado($datos) {
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $localidad = new Localidad();
            $localidad->_idLocalidad = $registro['id_localidad'];
            $localidad->_nombre = $registro['nombre'];
            $listado[] = $localidad;
        }
        return $listado;
    }

    public static function obtenerPorIdLocalidad($idLocalidad) {
        
        $sql = "SELECT * FROM localidad WHERE id_localidad =". $idLocalidad;

        $mysql = new MySQL();
        $datos = $mysql->consulta($sql);
        $mysql->desconectar();

        $data = $datos->fetch_assoc();
        $localidad = null;

        if ($datos->num_rows > 0){
        
        $localidad = new Localidad();
        $localidad->_idLocalidad = $data['id_localidad'];
        $localidad->_nombre = $data['nombre'];
        }
        return $localidad;
    }

    public function __toString() {
        return $this->_nombre;
    }
}

?>