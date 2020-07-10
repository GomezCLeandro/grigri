<?php

require_once 'MySQL.php';
//require_once 'SubCategorira.php';

class categoria {

	private $_idCategoria;
	private $_categoria;

	private $_arrSubCateogira;

    public function __construct($categoria) {
        $this->_categoria = $categoria;
    }

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

    public static function obtenerTodos() {
        $sql = "SELECT * FROM categoria";

        $mysql = new MySQL();
        $datos = $mysql->consulta($sql);
        $mysql->desconectar();
        
        $listado = self::_listadoCategoria($datos);

        return $listado;
    }

    public static function obtenerPorId($id) {

        $sql = "SELECT * FROM categoria WHERE id_categoria =" . $id;

        $mysql = new MySQL();
        $datos = $mysql->consulta($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();

        $categoria = self::_generarCategoria($registro);
        return $categoria;
    }

    private function _generarCategoria($registro) {

        $categoria = new Categoria($registro['categoria']);
        $categoria->_idCategoria = $registro['id_categoria'];

        return $categoria;
    }

    private function _listadoCategoria($datos) {
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $categoria = new Categoria($registro['categoria']);
            $categoria->_idCategoria = $registro['id_categoria'];
            $listado[] = $categoria;
        }
        return $listado;
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

    public function __toString() {
        return $this->_categoria;
    }

}

?>