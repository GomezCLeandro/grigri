<?php

require_once 'MySQL.php';
require_once 'Item.php';

class Item {

	private $_idItem;
	private $_idImagen;
	private $_descripcion;
	private $_precio;

	private $_arrImagen;

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

    /**
     * @return mixed
     */
    public function getIdImagen()
    {
        return $this->_idImagen;
    }

    /**
     * @param mixed $_idImagen
     *
     * @return self
     */
    public function setIdImagen($_idImagen)
    {
        $this->_idImagen = $_idImagen;

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

    /**
     * @return mixed
     */
    public function getPrecio()
    {
        return $this->_precio;
    }

    /**
     * @param mixed $_precio
     *
     * @return self
     */
    public function setPrecio($_precio)
    {
        $this->_precio = $_precio;

        return $this;
    }

    public function guardar() {

        $sql = "INSERT INTO item (id_item, descripcion, id_imagen, precio) VALUES (NULL, '$this->_descripcion' , '$this->_idImagen' , '$this->_precio')";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);
        $mysql->desconectar();

        $this->_idItem = $idInsertado;
    }

    public function actualizar() {

        $sql = "UPDATE item SET descripcion = '$this->_descripcion' , id_imagen = '$this->_idImagen' , precio = '$this->_precio' WHERE id_recurso ='$this->_idRecurso'";

        $mysql = new MySQL();
        $mysql->actualizar($sql);
        $mysql->desconectar();
    } 

    public static function eliminar($id) {

        $sql = "DELETE FROM item WHERE id_item =".$id;

        $mysql = new MySQL();
        $mysql->eliminar($sql);
        $mysql->desconectar();
    }
}

?>