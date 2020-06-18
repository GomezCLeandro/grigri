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

    /**
     * @param mixed $_idUsuario
     *
     * @return self
     */
    public function setIdUsuario($_idUsuario)
    {
        $this->_idUsuario = $_idUsuario;

        return $this;
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

    /**
     * @return mixed
     */
    public function getIdPersona()
    {
        return $this->_idPersona;
    }

    /**
     * @param mixed $_idPersona
     *
     * @return self
     */
    public function setIdPersona($_idPersona)
    {
        $this->_idPersona = $_idPersona;

        return $this;
    }    

    public static function obtenerTodos() {
        $sql = "SELECT * FROM usuario INNER JOIN persona on usuario.id_persona = persona.id_persona";

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

    public function obtenerId($id) {

        $sql = "SELECT * FROM usuario AS u JOIN persona AS p ON u.id_persona = p.id_persona WHERE id_usuario =" . $id;

        $mysql = new MySQL;
        $datos = $mysql->consulta($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();

        $usuario = new Usuario($registro['nombre'], $registro['apellido']);
        $usuario->_idUsuario = $registro['id_usuario'];
        $usuario->_idPersona = $registro['id_persona'];
        $usuario->_username = $registro['username'];
        $usuario->_password = $registro['password'];
        $usuario->_numeroDocumento = $registro['numero_documento'];
        $usuario->_fechaNacimiento = $registro['fecha_nacimiento'];
        $usuario->_sexo = $registro['sexo'];
        
        return $usuario;        
    }

    public function guardar() {
    	parent::guardar();

        $sql = "INSERT INTO Usuario (id_usuario, usearname, contrasena) VALUES (NULL, '$this->_username', '$this->_password')";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);
        $mysql->desconectar();

        $this->_idUsuario = $idInsertado;
    }

    public function actualizar($id) {
        parent::actualizar($id);

        $sql = "UPDATE usuario SET username = '$this->_username', contrasena = '$this->_password' WHERE id_usuario =" . $id;

        $mysql = new MySQL();
        $mysql->actualizar($sql);
        $mysql->desconectar();
    }


}

?>