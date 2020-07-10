<?php

require_once 'MySQL.php';
require_once 'Recurso.php';
//require_once 'SubCategoria.php';
require_once 'Item.php';

class Disenio extends Item {

    private $_idDisenio;
    private $_idSubCategoria;
    private $_idItem;

    private $_arrRecurso;

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
    public function getIdItem()
    {
        return $this->_idItem;
    }

    /**
     * @param mixed $_idItem
     *
     * @return self
     */
    public function setIdItem($_idItem)
    {
        $this->_idItem = $_idItem;

        return $this;
    }

    public static function obtenerTodos(){
        $sql = "SELECT disenio.id_disenio, item.id_item, item.descripcion, item.precio FROM disenio JOIN item ON item.id_item = disenio.id_item";

        $mysql = new MySQL();
        $datos = $mysql->consulta($sql);
        $mysql->desconectar();

        $disenio = self::_listadoDisenio($datos);
        return $disenio;
    }

    private function _listadoDisenio($datos) {
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $disenio = new Disenio($registro['id_item']);
            $disenio->_idDisenio = $registro['id_disenio'];
            //$disenio->_idSubCategoria = $registro['id_subCategoria'];

            $listado[] = $disenio;
        }
        return $listado;
    }

    public function guardar() {
        parent::guardar();

        $sql = "INSERT INTO disenio (id_disenio,id_subCategoria,id_item) VALUES (NULL, '$this->_idSubCategoria','$this->_idItem')";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);
        $mysql->desconectar();

        $this->_idDisenio = $idInsertado;
    }

    public function actualizar() {
        parent::actualizar();

        $sql = "UPDATE disenio SET id_subCategoria = '$this->_idSubCategoria',id_item = '$this->_idItem'  WHERE id_disenio ='$this->_idRecurso'";

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

}

?>