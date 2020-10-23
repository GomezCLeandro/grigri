<?php

require_once "MySQL.php";

class Reserva {

	public $idReserva;
	public $idUsuario;
	public $idServicio;
	public $idEstadoReserva;
	public $fechaReserva;
	public $lugarReserva;
	public $notacion;
	public $titulo;

    /**
     * @return mixed
     */
    public function getIdReserva()
    {
        return $this->idReserva;
    }

    /**
     * @param mixed $idReserva
     *
     * @return self
     */
    public function setIdReserva($idReserva)
    {
        $this->idReserva = $idReserva;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * @param mixed $idUsuario
     *
     * @return self
     */
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdServicio()
    {
        return $this->idServicio;
    }

    /**
     * @param mixed $idServicio
     *
     * @return self
     */
    public function setIdServicio($idServicio)
    {
        $this->idServicio = $idServicio;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdEstadoReserva()
    {
        return $this->idEstadoReserva;
    }

    /**
     * @param mixed $idEstadoReserva
     *
     * @return self
     */
    public function setIdEstadoReserva($idEstadoReserva)
    {
        $this->idEstadoReserva = $idEstadoReserva;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFechaReserva()
    {
        return $this->fechaReserva;
    }

    /**
     * @param mixed $fechaReserva
     *
     * @return self
     */
    public function setFechaReserva($fechaReserva)
    {
        $this->fechaReserva = $fechaReserva;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLugarReserva()
    {
        return $this->lugarReserva;
    }

    /**
     * @param mixed $lugarReserva
     *
     * @return self
     */
    public function setLugarReserva($lugarReserva)
    {
        $this->lugarReserva = $lugarReserva;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getnotacion()
    {
        return $this->notacion;
    }

    /**
     * @param mixed $notacion
     *
     * @return self
     */
    public function setnotacion($notacion)
    {
        $this->notacion = $notacion;

        return $this;
    }

    public static function obtenerFecha(){
        //$sql = "SELECT fecha_reserva FROM reserva";

    	$sql = "SELECT reserva.id_reserva, reserva.id_usuario, servicio.id_servicio, servicio.id_item, servicio.descripcion, "
    		. "reserva.id_estado_reserva, reserva.fecha_reserva, reserva.lugar_reserva, reserva.notacion "
    		. "FROM `reserva` "
    		. "INNER JOIN servicio on servicio.id_servicio = reserva.id_servicio";

        $mysql = new MySQL();
        $datos = $mysql->consulta($sql);
        $mysql->desconectar();

        $reserva = self::_listadoReserva($datos);
        return $reserva;
    }

    private function _listadoReserva($datos) {
        $listado = array();
        while ($registro = $datos->fetch_assoc()) {
            $reserva = new Reserva();
            $reserva->idReserva = $registro['id_reserva'];
			$reserva->idUsuario = $registro['id_usuario'];
			$reserva->idServicio = $registro['id_servicio'];
			$reserva->idEstadoReserva = $registro['id_estado_reserva'];
			$reserva->fechaReserva = $registro['fecha_reserva'];
			$reserva->lugarReserva = $registro['lugar_reserva'];
			$reserva->notacion = $registro['notacion'];
			$reserva->titulo = $registro['descripcion'];

            $listado[] = $reserva;
        }
        return $listado;
    }

    /**
     * @return mixed
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * @param mixed $titulo
     *
     * @return self
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }
}

?>