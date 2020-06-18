<?php
require_once "Persona.php";
require_once 'MySQL.php';

class Usuario extends Persona{
	
	private $_idUsuario;
    private $_idPersona;
	private $_username;
	private $_password;

    /**
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->_idUsuario;
    }

    public function getIdPersona()
    {
        return $this->_idPersona;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->_username;
    }

    /**
     * @param mixed $_username
     *
     * @return self
     */
    public function setUsername($_username)
    {
        $this->_username = $_username;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->_password;
    }

    /**
     * @param mixed $_password
     *
     * @return self
     */
    public function setPassword($_password)
    {
        $this->_password = $_password;

        return $this;
    }

    public static function obtenerTodos() {
        $sql = "SELECT usuario.id_usuario, persona.id_persona, usuario.username, usuario.password, persona.nombre, persona.apellido"
        ." FROM persona INNER JOIN usuario on usuario.id_persona = persona.id_persona";
        //var_dump($sql);
        $mysql = new MySQL();
        $datos = $mysql->consulta($sql);
        $mysql->desconectar();
        
        $listado = self::_listadoUsuario($datos);

        return $listado;
    }

    private function _listadoUsuario($datos) {
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $usuario = new Usuario($registro['nombre'],$registro['apellido']);
            $usuario->_idUsuario = $registro['id_usuario'];         
            $usuario->_idPersona = $registro['id_persona'];
            $usuario->_username = $registro['username'];
            $usuario->_password = $registro['password'];
            $listado[] = $usuario;
        }
        return $listado;
    }

    public static function obtenerId($id) {

        $sql = "SELECT * FROM usuario AS u INNER JOIN persona AS p ON u.id_persona = p.id_persona WHERE id_usuario =" . $id;
        //var_dump($sql);
        $mysql = new MySQL();
        $datos = $mysql->consulta($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();

        $usuario = self::_ordenarUsuario($registro);
        //highlight_string(var_export($usuario,true));
        return $usuario;
    }

    private function _ordenarUsuario($registro) {

        $usuario = new Usuario($registro['nombre'], $registro['apellido']);
        $usuario->_idPersona = $registro['id_persona'];
        $usuario->_idUsuario = $registro['id_usuario'];
        $usuario->_username = $registro['username'];
        $usuario->_sexo = $registro['sexo'];
        $usuario->_numeroDocumento = $registro['numero_documento'];
        $usuario->_fechaNacimiento = $registro['fecha_nacimiento'];
        //$usuario->setDomicilio();

        
        return $usuario;
    
    }

    public function guardar() {
    	parent::guardar();

        $sql = "INSERT INTO Usuario (id_usuario, usearname, password) VALUES (NULL, '$this->_username', '$this->_password')";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);
        $mysql->desconectar();

        $this->_idUsuario = $idInsertado;
    }

    public function actualizar() {
        parent::actualizar();

        $sql = "UPDATE usuario SET username = '$this->_username' WHERE id_usuario ='$this->_idUsuario'";

        $mysql = new MySQL();
        $mysql->actualizar($sql);
        $mysql->desconectar();
    }

    public static function eliminar($id) {
        parent::eliminar($id);

        $sql = "DELETE FROM usuario WHERE id_persona=".$id;

        $mysql = new MySQL();
        $mysql->eliminar($sql);
    }

}

?>