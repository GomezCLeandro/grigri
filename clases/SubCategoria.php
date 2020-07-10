<?php

require_once 'MySQL.php';

class SubCategoria {
	
	private $_idSubCategoria;
	private $_idCategoria;
	private $_subCategoria;

	public function __construct($subCategoria){
		$this->_subCategoria = $subCategoria;
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
    public function getSubCategoria()
    {
        return $this->_subCategoria;
    }

    /**
     * @param mixed $_subCategoria
     *
     * @return self
     */
    public function setSubCategoria($_subCategoria)
    {
        $this->_subCategoria = $_subCategoria;

        return $this;
    }

    public static function obtenerPorId($id) {

        $sql = "SELECT * FROM subcategoria WHERE id_subCategoria =" . $id;

        $mysql = new MySQL();
        $datos = $mysql->consulta($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();

        $subcategoria = self::_generarSubCategoria($registro);
        return $subcategoria;
    }

    private function _generarSubCategoria($registro) {

        $subcategoria = new SubCategoria($registro['subCategoria']);
        $subcategoria->_idSubCategoria = $registro['id_subCategoria'];

        return $subcategoria;
    }

    public function guardar() {

        $sql = "INSERT INTO subcategoria (id_subCategoria, id_categoria, subCategoria) VALUES (NULL,'$this->_idCategoria', '$this->_subCategoria')";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);
        $mysql->desconectar();

        $this->_idRecurso = $idInsertado;
    }

    public function actualizar() {

        $sql = "UPDATE subcategoria SET subCategoria = '$this->_subCategoria', id_categoria = '$this->_idCategoria' WHERE id_subCategoria ='$this->_idSubCategoria'";

        $mysql = new MySQL();
        $mysql->actualizar($sql);
        $mysql->desconectar();
    }

    public static function obtenerTodos() {
        $sql = "SELECT * FROM subcategoria";

        $mysql = new MySQL();
        $datos = $mysql->consulta($sql);
        $mysql->desconectar();
        
        $listado = self::_listadoSubCategoria($datos);

        return $listado;
    }

    private function _listadoSubCategoria($datos) {
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $subcategoria = new SubCategoria($registro['subCategoria']);
            $subcategoria->_idSubCategoria = $registro['id_subCategoria'];
            $listado[] = $subcategoria;
        }
        return $listado;
    }

	public function __toString(){
		return $this->_subCategoria;
	}
}

?>