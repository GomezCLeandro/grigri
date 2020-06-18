<?php

require_once "MySQL.php";
require_once "Barrio.php";

class Domicilio {
	private $_idDomicilio;
    private $_idBarrio;
	private $_casa;
	private $_manzana;
	private $_calle;
	private $_altura;	
    private $_descripcion;
	
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

    /**
     * @return mixed
     */
    public function getIdBarrio()
    {
        return $this->_idBarrio;
    }

    /**
     * @param mixed $_idBarrio
     *
     * @return self
     */
    public function setIdBarrio($_idBarrio)
    {
        $this->_idBarrio = $_idBarrio;

        return $this;
    }

    public function guardar() {
    	
        $sql = "INSERT INTO Domicilio (id_domicilio, casa, manzana, calle, altura, descripcion) VALUES "
        . "(NULL, '$this->_casa', '$this->_manzana','$this->_calle','$this->_altura','$this->_descripcion')";

        $mysql = new MySQL();
        $idInsertado = $mysql->insertar($sql);

        $this->_idDomicilio = $idInsertado;
    }

    public function actualizar($id) {
        $sql = "UPDATE Domicilio SET casa = '$this->_casa',manzana = '$this->manzana',calle = '$this->_calle', altura = '$this->_altura', descripcion = '$this->_descripcion' WHERE id_domicilio =" . $id;

        $mysql = new MySQL();
        $mysql->actualizar($sql);        
    }

}

?>