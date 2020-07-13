<?php

require_once 'MySQL.php';
require_once 'Item.php';

class Item {

	protected $_idItem;
	protected $_idImagen;
	protected $_nombre;
	protected $_precio;

	private $_arrImagen;

    public function __construct($nombre) {
        $this->_nombre = $nombre;
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

        $sql = "INSERT INTO item (id_item, descripcion, precio) VALUES (NULL, '$this->_nombre', '$this->_precio')";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);
        $mysql->desconectar();

        $this->_idItem = $idInsertado;
    }

    public function actualizar() {

        $sql = "UPDATE item SET descripcion = '$this->_nombre', precio = '$this->_precio' WHERE id_item ='$this->_idItem'";
        
        //var_dump($sql);
        //exit;
        
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

    public function __toString(){
        return $this->_nombre;
    }
}

?>