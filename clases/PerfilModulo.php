<?php


class PerfilModulo {

	private $_idPerfilModulo;
	private $_idPerfil;
	private $_idModulo;

    /**
     * @return mixed
     */
    public function getIdPerfilModulo()
    {
        return $this->_idPerfilModulo;
    }

    /**
     * @param mixed $_idPerfilModulo
     *
     * @return self
     */
    public function setIdPerfilModulo($_idPerfilModulo)
    {
        $this->_idPerfilModulo = $_idPerfilModulo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdPerfil()
    {
        return $this->_idPerfil;
    }

    /**
     * @param mixed $_idPerfil
     *
     * @return self
     */
    public function setIdPerfil($_idPerfil)
    {
        $this->_idPerfil = $_idPerfil;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdModulo()
    {
        return $this->_idModulo;
    }

    /**
     * @param mixed $_idModulo
     *
     * @return self
     */
    public function setIdModulo($_idModulo)
    {
        $this->_idModulo = $_idModulo;

        return $this;
    }

    public static function obtenerTodos(){
        $sql = "SELECT * FROM perfil_modulo";

        $mysql = new MySQL();
        $datos = $mysql->consulta($sql);
        $mysql->desconectar();

        $listadoPerfilModulo = self::_listadoPerfilModulo($datos);

        return $listadoPerfilModulo;
    }

    private function _listadoPerfilModulo($datos) {
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $perfilModulo = new PerfilModulo();
            $perfilModulo->_idModulo = $registro['id_modulo'];
            $perfilModulo->_idPerfilModulo = $registro['id_perfil_modulo'];
            $perfilModulo->_idPerfil = $registro['id_perfil'];
            $listado[] = $perfilModulo;
        }
        return $listado;
    }

    public function guardar() {
        $sql = "INSERT INTO perfil_modulo (id_perfil_modulo, id_perfil, id_modulo) VALUES (NULL, $this->_idPerfil, $this->_idModulo)";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idPerfilModulo = $idInsertado;
    }

    public static function resetModulos($idPerfil) {
        $sql = "DELETE FROM perfil_modulo WHERE id_perfil = ".$idPerfil ;
        
        $mysql = new MySQL();
        $mysql->eliminar($sql);
    }

    public function actualizar() {
        $sql = "INSERT INTO perfil_modulo (id_perfil_modulo, id_perfil, id_modulo) VALUES (NULL, $this->_idPerfil, $this->_idModulo)";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idPerfilModulo = $idInsertado;
    }    

}


?>