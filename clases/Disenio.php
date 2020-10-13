<?php

require_once 'MySQL.php';
require_once 'Recurso.php';
//require_once 'SubCategoria.php';
require_once 'Item.php';

class Disenio extends Item {

    private $_idDisenio;
    private $_idSubCategoria;
    public $_descripcion;

    public $arrRecurso;

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
    public function getIdSubCategoria()
    {
        return $this->_idSubCategoria;
    }

    /**
     * @param mixed $_idSubCategoria
     *
     * @return self
     */
    public function setIdSubCategoria($_idSubCategoria)
    {
        $this->_idSubCategoria = $_idSubCategoria;

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

    public static function obtenerTodos(){
        $sql = "SELECT * FROM disenio JOIN item ON item.id_item = disenio.id_item";

        $mysql = new MySQL();
        $datos = $mysql->consulta($sql);
        $mysql->desconectar();

        $disenio = self::_listadoDisenio($datos);
        return $disenio;
    }

    private function _listadoDisenio($datos) {
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $disenio = new Disenio($registro['descripcion']);
            $disenio->_descripcion = $registro['descripcion'];
            $disenio->_idDisenio = $registro['id_disenio'];
            $disenio->_idItem = $registro['id_item'];
            $disenio->_precio = $registro['precio'];
            $disenio->setArrImagen();

            $listado[] = $disenio;
        }
        return $listado;
    }

    public static function obtenerPorId($id) {

        $sql = "SELECT * FROM disenio JOIN item ON item.id_item = disenio.id_item WHERE disenio.id_disenio= ".$id;

        $mysql = new MySQL();
        $datos = $mysql->consulta($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();

        $disenio = self::_generarDisenio($registro);
        return $disenio;
    }

    public static function obtenerPorIdItem($idItem) {

        $sql = "SELECT * FROM disenio JOIN item ON item.id_item = disenio.id_item WHERE disenio.id_item= ".$idItem;

        $mysql = new MySQL();
        $datos = $mysql->consulta($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();
        $disenio = new Disenio($registro['descripcion']);
            $disenio->_descripcion = $registro['descripcion'];
            $disenio->_idDisenio = $registro['id_disenio'];
            $disenio->_idItem = $registro['id_item'];
            $disenio->_precio = $registro['precio'];
        return $disenio;
    }

    private function _generarDisenio($registro) {

        $disenio = new Disenio($registro['descripcion']);
        $disenio->_descripcion = $registro['descripcion'];
        $disenio->_idDisenio = $registro['id_disenio'];
        $disenio->_idItem = $registro['id_item'];
        $disenio->_precio = $registro['precio'];

        $disenio->getRecurso();
        return $disenio;
    }

    public function getRecurso() {
        $this->arrRecurso = Recurso::obtenerPorIdDisenio($this->_idDisenio);
    }

    public function guardar() {
        parent::guardar();

        $sql = "INSERT INTO disenio (id_disenio, id_subCategoria, id_item, descripcion) "
        . " VALUES (NULL, '$this->_idSubCategoria', '$this->_idItem', '$this->_descripcion')";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);
        $mysql->desconectar();

        $this->_idDisenio = $idInsertado;
    }

    public function actualizar() {
        parent::actualizar();

        $sql = "UPDATE disenio SET id_item = '$this->_idItem'  WHERE id_disenio ='$this->_idDisenio'";

        $mysql = new MySQL();
        $mysql->actualizar($sql);
        $mysql->desconectar();
    } 

    public static function eliminar($id) {
        parent::eliminar($id);

        $sql = "DELETE FROM disenio WHERE id_disenio =".$id;

        $mysql = new MySQL();
        $mysql->eliminar($sql);
        $mysql->desconectar();
    }

    public function __toString() {
        return $this->_descripcion;
    }
}

?>