<?php
require_once "Persona.php";
require_once 'MySQL.php';
require_once 'Perfil.php';

class Usuario extends Persona{
	
	private $_idUsuario;
	private $_username;
	private $_password;
    private $_idPerfil;
    private $_estaLogueado;

    public $perfil;

    /**
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->_idUsuario;
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
    public function getEstaLogeado()
    {
        return $this->_estaLogueado;
    }

    /**
     * @param mixed $_estaLogueado
     *
     * @return self
     */
    public function setEstaLogueado($_estaLogueado)
    {
        $this->_estaLogueado = $_estaLogueado;

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

    public static function obtenerTodos() {
        $sql = "SELECT usuario.id_usuario, persona.id_persona, usuario.username, usuario.password, persona.nombre, persona.apellido"
        ." FROM persona INNER JOIN usuario on usuario.id_persona = persona.id_persona";
        
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

    public static function obtenerPorId($id) {

        $sql = "SELECT * FROM usuario AS u INNER JOIN persona AS p ON u.id_persona = p.id_persona WHERE id_usuario =" . $id;
        $mysql = new MySQL();
        $datos = $mysql->consulta($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();

        $usuario = self::_generarUsuario($registro);
        return $usuario;
    }

    private function _generarUsuario($registro) {

        $usuario = new Usuario($registro['nombre'], $registro['apellido']);
        $usuario->_idPersona = $registro['id_persona'];
        $usuario->_idUsuario = $registro['id_usuario'];
        $usuario->_username = $registro['username'];
        $usuario->_sexo = $registro['sexo'];
        $usuario->_numeroDocumento = $registro['numero_documento'];
        $usuario->_fechaNacimiento = $registro['fecha_nacimiento'];
        $usuario->setDomicilio();

        return $usuario;
    }

    public static function login($username, $password) {
        $sql = "SELECT * FROM usuario "
             . "INNER JOIN persona on persona.id_persona = usuario.id_persona "
             . "WHERE username = '$username' "
             . "AND password = '$password' "
             . "AND persona.estado = 1";

        $mysql = new MySQL();
        $result = $mysql->consulta($sql);
        $mysql->desconectar();

        if ($result->num_rows > 0) {
            $registro = $result->fetch_assoc();
            $usuario = new Usuario($registro['nombre'], $registro['apellido']);
            $usuario->_idUsuario = $registro['id_usuario'];
            $usuario->_idPersona = $registro['id_persona'];
            $usuario->_username = $registro['username'];
            $usuario->_idPerfil = $registro['id_perfil'];
            $usuario->_estaLogueado = true;

            $usuario->perfil = Perfil::obtenerPorId($usuario->_idPerfil);

        } else {
            $usuario = new Usuario('', '');
            $usuario->_estaLogueado = false;
        }
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

    public function estaLogueado() {
        return $this->_estaLogueado;
    }

    public function __toString() {
        return $this->_username;
    }

    /**
     * @return mixed
     */
    public function getPerfil()
    {
        return $this->perfil;
    }

    /**
     * @param mixed $perfil
     *
     * @return self
     */
    public function setPerfil($perfil)
    {
        $this->perfil = $perfil;

        return $this;
    }
}

?>