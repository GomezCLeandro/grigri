<?php

require_once 'MySQL.php';
require_once 'SubCategorira.php';

class categoria {

	private $_idCategoria;
	private $_categoria;

	private $_arrSubCateogira;

    /**
     * @return mixed
     */
    public function getIdCategoria()
    {
        return $this->_idCategoria;
    }

    /**
     * @param mixed $_idCategoria
     *
     * @return self
     */
    public function setIdCategoria($_idCategoria)
    {
        $this->_idCategoria = $_idCategoria;

        return $this;
    }
    /**
     * @return mixed
     */
    public function getCategoria()
    {
        return $this->_categoria;
    }

    /**
     * @param mixed $_categoria
     *
     * @return self
     */
    public function setCategoria($_categoria)
    {
        $this->_categoria = $_categoria;

        return $this;
    }

    public function guardar() {

        $sql = "INSERT INTO categoria (id_categoria,categoria) VALUES (NULL, '$this->_categoria')";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);
        $mysql->desconectar();

        $this->_idCategoria = $idInsertado;
    }

    public function actualizar() {

        $sql = "UPDATE categoria SET categoria = '$this->_categoria' WHERE id_categoria ='$this->_idCategoria'";

        $mysql = new MySQL();
        $mysql->actualizar($sql);
        $mysql->desconectar();
    } 

    public static function eliminar($id) {

        $sql = "DELETE FROM categoria WHERE id_categoria=".$id;

        $mysql = new MySQL();
        $mysql->eliminar($sql);
        $mysql->desconectar();
    }



}

?>