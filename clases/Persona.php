<?php
require_once 'MySQL.php';
require_once 'Domicilio.php';
//require_once "Contacto.php";

class Persona {
	private $_idPersona;
    private $_idBarrio;
    private $_idContacto;
	private $_idTipoDocumento;
	private $_nombre;
	private $_apellido;
	private $_sexo;
	private $_fechaNacimiento;
	private $_numeroDocumento;
	private $_estado;

    public $domicilio;

    const ACTIVO = 1;

    public function __construct($nombre, $apellido) {
        $this->_nombre = $nombre;
        $this->_apellido = $apellido;
        $this->_estado = self::ACTIVO;
    }

    public function __toString() {
        return $this->_nombre . ", " . $this->_apellido;
    }
    
    /**
     * @return mixed
     */
    public function getIdPersona()
    {
        return $this->_idPersona;
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
    public function getApellido()
    {
        return $this->_apellido;
    }

    /**
     * @param mixed $_apellido
     *
     * @return self
     */
    public function setApellido($_apellido)
    {
        $this->_apellido = $_apellido;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFechaNacimiento()
    {
        return $this->_fechaNacimiento;
    }

    /**
     * @param mixed $_fechaNacimiento
     *
     * @return self
     */
    public function setFechaNacimiento($_fechaNacimiento)
    {
        $this->_fechaNacimiento = $_fechaNacimiento;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdTipoDocumento()
    {
        return $this->_idTipoDocumento;
    }

    /**
     * @param mixed $_idTipoDocumento
     *
     * @return self
     */
    public function setIdTipoDocumento($_idTipoDocumento)
    {
        $this->_idTipoDocumento = $_idTipoDocumento;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->_estado;
    }

    /**
     * @param mixed $_estado
     *
     * @return self
     */
    public function setEstado($_estado)
    {
        $this->_estado = $_estado;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNumeroDocumento()
    {
        return $this->_numeroDocumento;
    }

    /**
     * @param mixed $_numeroDocumento
     *
     * @return self
     */
    public function setNumeroDocumento($_numeroDocumento)
    {
        $this->_numeroDocumento = $_numeroDocumento;

        return $this;
    }

    public static function obtenerId($id) {

        $sql = "SELECT * FROM persona WHERE id_persona =" . $id;
        //var_dump($sql);
        $mysql = new MySQL();
        $datos = $mysql->consulta($sql);
        $mysql->desconectar();

        $registro = $datos->fetch_assoc();

        $persona = new Persona($registro['nombre'], $registro['apellido']);
        $persona->_idPersona = $registro['id_persona'];
        $persona->_sexo = $registro['sexo'];
        $persona->_numeroDocumento = $registro['numero_documento'];
        $persona->_fechaNacimiento = $registro['fecha_nacimiento'];
        
        //highlight_string(var_export($persona,true));
        return $persona;
    }

    public function guardar () {
    	
        $sql = "INSERT INTO Persona (id_persona, nombre, apellido, id_tipo_documento, numero_documento, fecha_nacimiento, sexo) VALUES"
        . "(NULL, '$this->_nombre', '$this->_apellido', NULL, '$this->_numeroDocumento', '$this->_fechaNacimiento', '$this->_sexo')";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);
        $mysql->desconectar();

        $this->_idPersona = $idInsertado;
    }

    public function actualizar() {

        $sql = "UPDATE persona SET nombre ='$this->_nombre', apellido ='$this->_apellido', numero_documento ='$this->_numeroDocumento',fecha_nacimiento ='$this->_fechaNacimiento', sexo='$this->_sexo' WHERE id_persona ='$this->_idPersona'";

        $mysql = new MySQL();
        $mysql->actualizar($sql);
        $mysql->desconectar();
    }

    public static function eliminar($id) {
        $sql = "DELETE FROM usuario WHERE id_persona=".$id;

        $mysql = new MySQL();
        $mysql->eliminar($sql);
    }

    public function setDomicilio() {
        $this->domicilio = Domicilio::obtenerPorIdPersona($this->_idPersona);
    }

    /**
     * @return mixed
     */
    public function getSexo()
    {
        return $this->_sexo;
    }

    /**
     * @param mixed $_sexo
     *
     * @return self
     */
    public function setSexo($_sexo)
    {
        $this->_sexo = $_sexo;

        return $this;
    }
}
?> 