<?php
require_once 'Barrio.php';

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
    	
        $sql = "INSERT INTO Localidad (id_localidad, nombre) VALUES (NULL, '$this->_nombre')";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idLocalidad = $idInsertado;
    }

    public function actualizar($id) {

        $sql = "UPDATE Localidad SET nombre = '$this->_nombre' WHERE id_localidad =" . $id;
    }
}

?>