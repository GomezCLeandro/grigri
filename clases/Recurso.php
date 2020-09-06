<?php

require_once 'MySQL.php';

class recurso {

	private $_idRecurso;
	private $_descripcion;

    public function __construct ($descripcion){
        $this->_descripcion = $descripcion;
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

    public static function obtenerTodos() {
        $sql = "SELECT * FROM recurso";

        $mysql = new MySQL();
        $datos = $mysql->consulta($sql);
        $mysql->desconectar();
        
        $listado = self::_listadoRecursos($datos);

        return $listado;
    }

    private function _listadoRecursos($datos) {
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $recurso = new Recurso($registro['descripcion']);
            $recurso->_idRecurso = $registro['id_recurso'];
            $listado[] = $recurso;
        }
        return $listado;
    }

    public static function obtenerPorId($id) {

        $sql = "SELECT * FROM recurso WHERE id_recurso =" . $id;

        $mysql = new MySQL();
        $datos = $mysql->consulta($sql);
        $mysql->desconectar();

        $recurso = self::_generarRecurso($registro);
        return $recurso;
    }

    private function _generarRecurso($registro) {

        $recurso = new Recurso($registro['descripcion']);
        $recurso->_idRecurso = $registro['id_recurso'];

        return $recurso;
    }
    
    public function obtenerPorIdDisenio($idDisenio) {
        $sql = "SELECT recurso.id_recurso ,recurso.descripcion FROM recurso "
        . "INNER JOIN disenio_recurso ON recurso.id_recurso = disenio_recurso.id_recurso "
        . "INNER JOIN disenio ON disenio.id_disenio = disenio_recurso.id_disenio "
        . "WHERE disenio.id_disenio = " . $idDisenio;
        //var_dump($sql);
        //exit;

        $mysql = new MySQL();
        $datos = $mysql->consulta($sql);
        $mysql->desconectar();

        $registro = self::_listadoRecursos($datos);
        return $registro;
    }
    /**/
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

    public function __toString (){
        return $this->_descripcion;
    }

}

?>