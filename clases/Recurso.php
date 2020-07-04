<?php

require_once 'MySQL.php';

class recurso {

	private $_idRecurso;
	private $_descripcion;

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

        $sql = "INSERT INTO recurso (id_recurso, descripcion) VALUES (NULL, '$this->_descripcion')";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);
        $mysql->desconectar();

        $this->_idRecurso = $idInsertado;
    }

    public function actualizar() {

        $sql = "UPDATE recurso SET descripcion = '$this->_descripcion' WHERE id_recurso ='$this->_idRecurso'";

        $mysql = new MySQL();
        $mysql->actualizar($sql);
        $mysql->desconectar();
    } 

    public static function eliminar($id) {

        $sql = "DELETE FROM recurso WHERE id_recurso =".$id;

        $mysql = new MySQL();
        $mysql->eliminar($sql);
        $mysql->desconectar();
    }

}

?>