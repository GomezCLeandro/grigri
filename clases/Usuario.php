<?php
require_once "Persona.php";
require_once 'MySQL.php';

class Usuario extends Persona{
	
	private $_idUsuario;
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
     * @param mixed $_usarname
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
/*
    public function __construct($username,$password) {
        $this->_username = $username;
        $this->_password = $password;
    }
*/
    public function guardar() {
    	parent::guardar();

        $sql = "INSERT INTO Usuario (id_usuario, usearname, contrasena) VALUES (NULL, '$this->_username', '$this->_password')";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idUsuario = $idInsertado;
    }

    public function actualizar($id) {
        parent::actualizar($id);

        $sql = "UPDATE usuario SET username = '$this->_username', contrasena = '$this->_password' WHERE id_usuario =" . $id;

        $mysql = new MySQL();
        $mysql->actualizar($sql);
    }
}

?>