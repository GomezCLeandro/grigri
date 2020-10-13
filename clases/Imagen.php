<?php

require_once 'MySQL.php';


class Imagen {
	
	private $_idImagen;
	private $_imagen;

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
    public function getImagen()
    {
        return $this->_imagen;
    }

    /**
     * @param mixed $_imagen
     *
     * @return self
     */
    public function setImagen($_imagen)
    {
        $this->_imagen = $_imagen;

        return $this;
    }

    public static function obtenerTodos(){
        $sql = "SELECT * FROM imagen";

        $mysql = new MySQL();
        $datos = $mysql->consulta($sql);
        $mysql->desconectar();

        $listadoImagenes = self::_listadoImagenes($datos);

        return $listadoImagenes;
    }

    private function _listadoImagenes($datos) {
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $imagen = new Imagen();
            $imagen->_idImagen = $registro['id_imagen'];
            $imagen->_imagen = $registro['imagen'];
            $imagen->_idItem = $registro['id_item'];
            $listado[] = $imagen;
        }
        return $listado;
    }

    public static function obtenerPorIdItem($idItem){
        $sql = "SELECT * FROM imagen WHERE id_item = " . $idItem;

        $mysql = new MySQL();
        $datos = $mysql->consulta($sql);
        $mysql->desconectar();

        $listadoImagenes = self::_listadoImagenesPorItem($datos);

        return $listadoImagenes;
    }

    private function _listadoImagenesPorItem($datos) {
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $imagen = new Imagen();
            $imagen->_idImagen = $registro['id_imagen'];
            $imagen->_imagen = $registro['imagen'];
            $imagen->_idItem = $registro['id_item'];
            $listado[] = $imagen;
        }
        return $listado;
    } 

    public function __toString() {
        return $this->_imagen;
    }  

}

?>