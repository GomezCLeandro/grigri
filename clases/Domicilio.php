<?php

require_once "MySQL.php";
require_once "Barrio.php";

class Domicilio {

	private $_idDomicilio;
    private $_idBarrio;
    private $_idPersona;
	private $_casa;
	private $_manzana;
	private $_calle;
	private $_altura;	
    private $_descripcion;

    public $barrio;
	
    /**
     * @return mixed
     */
    public function getIdDomicilio()
    {
        return $this->_idDomicilio;
    }

    /**
     * @param mixed $_idDomicilio
     *
     * @return self
     */
    public function setIdDomicilio($_idDomicilio)
    {
        $this->_idDomicilio = $_idDomicilio;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCasa()
    {
        return $this->_casa;
    }

    /**
     * @param mixed $_casa
     *
     * @return self
     */
    public function setCasa($_casa)
    {
        $this->_casa = $_casa;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getManzana()
    {
        return $this->_manzana;
    }

    /**
     * @param mixed $_manzana
     *
     * @return self
     */
    public function setManzana($_manzana)
    {
        $this->_manzana = $_manzana;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCalle()
    {
        return $this->_calle;
    }

    /**
     * @param mixed $_calle
     *
     * @return self
     */
    public function setCalle($_calle)
    {
        $this->_calle = $_calle;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAltura()
    {
        return $this->_altura;
    }

    /**
     * @param mixed $_altura
     *
     * @return self
     */
    public function setAltura($_altura)
    {
        $this->_altura = $_altura;

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

    public function setIdBarrio($_idBarrio)
    {
        $this->_idBarrio = $_idBarrio;

        return $this;
    }

    public function getIdBarrio()
    {
        return $this->_idBarrio;
    }

    /**
     * @return mixed
     */
    public function getBarrio()
    {
        return $this->barrio;
    }
    
    public function __toString() {
        return $this->_calle . " " . $this->_altura;
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

    public function guardar() {
    	
        $sql = "INSERT INTO Domicilio (id_domicilio, id_barrio, id_persona, casa, manzana, calle, altura, descripcion) VALUES "
        . "(NULL,'$this->_idBarrio', '$this->_idPersona',  '$this->_casa', '$this->_manzana','$this->_calle','$this->_altura','$this->_descripcion' )";


        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);
        $mysql->desconectar();

        $this->_idDomicilio = $idInsertado;
    }

    public function actualizar($idDomicilio) {
        $sql = "UPDATE Domicilio SET casa = '$this->_casa',manzana = '$this->_manzana',calle = '$this->_calle', "
        . "altura = '$this->_altura', descripcion = '$this->_descripcion',id_barrio = '$this->_idBarrio' "
        . " WHERE id_domicilio =" . $idDomicilio;
        
        $mysql = new MySQL();
        $mysql->actualizar($sql);
        $mysql->desconectar();        
    }

    public static function obtenerPorIdPersona($idPersona) {
        $sql = "SELECT * FROM domicilio WHERE id_persona = " . $idPersona;

        $mysql = new MySQL();
        $datos = $mysql->consulta($sql);
        $mysql->desconectar();

        $data = $datos->fetch_assoc();
        $domicilio = null;

        if ($datos->num_rows > 0) {

            $domicilio = new Domicilio();
            $domicilio->_idDomicilio = $data['id_domicilio'];
            $domicilio->_idBarrio = $data['id_barrio'];
            $domicilio->_idPersona = $data['id_persona'];
            $domicilio->_casa = $data['casa'];
            $domicilio->_calle = $data['calle'];
            $domicilio->_altura = $data['altura'];
            $domicilio->_manzana = $data['manzana'];
            $domicilio->_descripcion = $data['descripcion'];
            
            $domicilio->setBarrio();
        }
        return $domicilio;   
    }

    private function setBarrio() {
        $this->barrio = Barrio::obtenerPorIdBarrio($this->_idBarrio);
    }

}

?>