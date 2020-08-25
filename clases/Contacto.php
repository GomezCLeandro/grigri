<?php

require_once 'MySQL.php';

class Contacto {
	
    private $_idPersonaContacto;
	private $_idContacto;
	private $_tipoContacto;
	private $_descripcion;

    /**
     * @return mixed
     */
    public function getIdContacto()
    {
        return $this->_idContacto;
    }

    /**
     * @param mixed $_idContacto
     *
     * @return self
     */
    public function setIdContacto($_idContacto)
    {
        $this->_idContacto = $_idContacto;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTipoContacto()
    {
        return $this->_tipoContacto;
    }

    /**
     * @param mixed $_tipoContacto
     *
     * @return self
     */
    public function setTipoContacto($_tipoContacto)
    {
        $this->_tipoContacto = $_tipoContacto;

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
    public function getIdPersonaContacto()
    {
        return $this->_idPersonaContacto;
    }

    /**
     * @param mixed $_idPersonaContacto
     *
     * @return self
     */
    public function setIdPersonaContacto($_idPersonaContacto)
    {
        $this->_idPersonaContacto = $_idPersonaContacto;

        return $this;
    }
    
    public static function obtenerPorIdPersona($idPersona) {
        $sql = "SELECT persona_contacto.id_persona_contacto, persona_contacto.id_persona, "
             . "persona_contacto.id_tipo_contacto, persona_contacto.valor, "
             . "tipocontacto.descripcion "
             . "FROM persona_contacto "
             . "INNER JOIN tipocontacto on tipocontacto.id_tipo_contacto = persona_contacto.id_tipo_contacto "
             . "WHERE persona_contacto.id_persona = " .  $idPersona;

        $mysql = new MySQL();
        $datos = $mysql->consulta($sql);
        $mysql->desconectar();
        
        $listado = self::_generarListadoContactos($datos);
        return $listado;        
    }

    private function _generarListadoContactos($datos) {
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $contacto = new Contacto();
            $contacto->_idPersonaContacto = $registro['id_persona_contacto'];
            $contacto->_idPersona = $registro['id_persona'];
            $contacto->_idTipoContacto = $registro['id_tipo_contacto'];
            $contacto->_valor = $registro['valor'];
            $contacto->_descripcion = $registro['descripcion'];
            $listado[] = $contacto;
        }
        return $listado;
    }

    public function guardar() {
    	
        $sql = "INSERT INTO Contacto (id_contacto, tipoContacto, descripcion) VALUES (NULL, '$this->_tipoContacto', '$this->_descripcion')";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idContacto = $idInsertado;
    }

    public function actualizar($id) {

        $sql = "UPDATE Contacto SET descripcion = '$this->_descripcion'"
        . " tipoContacto = '$this->_tipoContacto' WHERE id_contacto =" . $id;

        $mysql = new MySQL();
        $mysql->actualizar($sql);
    }

    public function eliminar($id) {

        $sql = "DELETE FROM Contacto WHERE id_contacto =" . $id;

        $mysql = new MySQL();
        $mysql->eliminar($sql);
    }

    public function __toString() {
        return $this->_valor .  " - " .  $this->_descripcion;
    }
}
?>