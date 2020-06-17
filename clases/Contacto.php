<?php

require_once 'MySQL.php';

class Contacto {
	
	private $_idContacto;
	private $_tipoContacto;
	private $_descripcion;

    /**
     * @return mixed
     */
    public function getIdContacto()
    {
        return $this->_idContacto;
    }

    /**
     * @param mixed $_idContacto
     *
     * @return self
     */
    public function setIdContacto($_idContacto)
    {
        $this->_idContacto = $_idContacto;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTipoContacto()
    {
        return $this->_tipoContacto;
    }

    /**
     * @param mixed $_tipoContacto
     *
     * @return self
     */
    public function setTipoContacto($_tipoContacto)
    {
        $this->_tipoContacto = $_tipoContacto;

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

    public function guardar() {
    	
        $sql = "INSERT INTO Contacto (id_contacto, tipoContacto, descripcion) VALUES (NULL, '$this->_tipoContacto', '$this->_descripcion')";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idContacto = $idInsertado;
    }

    public function actualizar($id) {

        $sql = "UPDATE Contacto SET descripcion = '$this->_descripcion'"
        . " tipoContacto = '$this->_tipoContacto' WHERE id_contacto =" . $id;

        $mysql = new MySQL();
        $mysql->actualizar($sql);
    }

    public function eliminar($id) {

        $sql = "DELETE FROM Contacto WHERE id_contacto =" . $id;

        $mysql = new MySQL();
        $mysql->eliminar($sql);
    }
}
?>