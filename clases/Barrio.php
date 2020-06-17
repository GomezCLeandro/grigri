<?php

require_once 'MySQL.php';

class Barrio {
	private $_idBarrio;
	private $_nombre;	

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

        $this->_idBarrio = $idInsertado;
    }

    public function actualizar($id) {

        $sql = "UPDATE Barrio SET nombre ='$this->_nombre' WHERE id_barrio =". $id;

        $mysql = new MySQL();
        $mysql->actualizar($sql);
    }

    public function eliminar($id) {
        $sql = "DELETE FROM Barrio WHERE id_barrio =".$id;

        $mysql = new MySQL();
        $mysql->eliminar($sql);
    }
}

?>