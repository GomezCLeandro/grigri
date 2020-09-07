<?php

require_once 'MySQL.php';

class DisenioRecurso {
	
	private $_idDisenioRecurso;
	private $_idDisenio;
	private $_idRecurso;

    /**
     * @return mixed
     */
    public function getIdDisenioRecurso()
    {
        return $this->_idDisenioRecurso;
    }

    /**
     * @param mixed $_idDisenioRecurso
     *
     * @return self
     */
    public function setIdDisenioRecurso($_idDisenioRecurso)
    {
        $this->_idDisenioRecurso = $_idDisenioRecurso;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdDisenio()
    {
        return $this->_idDisenio;
    }

    /**
     * @param mixed $_idDisenio
     *
     * @return self
     */
    public function setIdDisenio($_idDisenio)
    {
        $this->_idDisenio = $_idDisenio;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdRecurso()
    {
        return $this->_idRecurso;
    }

    /**
     * @param mixed $_idRecurso
     *
     * @return self
     */
    public function setIdRecurso($_idRecurso)
    {
        $this->_idRecurso = $_idRecurso;

        return $this;
    }

    public static function resetRecurso($idDisenio) {
        $sql = "DELETE FROM disenio_recurso WHERE id_disenio = ".$idDisenio;
        
        $mysql = new MySQL();
        $mysql->eliminar($sql);
    }

    public function guardar() {

        $sql = "INSERT INTO disenio_recurso (id_disenio_recurso , id_disenio, id_recurso) VALUES (NULL,'$this->_idDisenio','$this->_idRecurso')";

        $mysql = new MySQL();
        $mysql->actualizar($sql);
        $mysql->desconectar();
    } 
}

?>