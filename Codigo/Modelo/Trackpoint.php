<?php
require_once(realpath(dirname(__FILE__)) . '/Track.php');

/**
 * @access public
 * @author admin
 */
class Trackpoint {
	/**
	 * @AttributeType int
	 */
	private $idTrackpoint;
	/**
	 * @AttributeType float
	 */
	private $latitud;
	/**
	 * @AttributeType float
	 */
	private $longitud;
	/**
	 * @AttributeType int
	 */
	private $tiempo;
	/**
	 * @AttributeType int
	 */
	private $heartRateBPM;
	/**
	 * @AttributeType float
	 */
	private $elevacion;
	/**
	 * @AttributeType int
	 */
	private $numSatelites;
	/**
	 * @AttributeType flaot
	 */
	private $velocidad;
	/**
	 * @AttributeType float
	 */
	private $calorias;

    /**
     * Trackpoint constructor.
     * @param $idTrackpoint
     * @param $latitud
     * @param $longitud
     * @param $tiempo
     * @param $heartRateBPM
     * @param $elevacion
     * @param $numSatelites
     * @param $velocidad
     * @param $calorias
     */
    public function __construct($idTrackpoint, $latitud, $longitud, $tiempo, $heartRateBPM, $elevacion, $numSatelites, $velocidad, $calorias)
    {
        $this->idTrackpoint = $idTrackpoint;
        $this->latitud = $latitud;
        $this->longitud = $longitud;
        $this->tiempo = $tiempo;
        $this->heartRateBPM = $heartRateBPM;
        $this->elevacion = $elevacion;
        $this->numSatelites = $numSatelites;
        $this->velocidad = $velocidad;
        $this->calorias = $calorias;
    }


    /**
	 * @access public
	 * @return bool
	 * @static
	 * @ReturnType bool
	 */
	public static function insertarTrackpoint() {
		// Not yet implemented
	}

    /**
     * @return mixed
     */
    public function getIdTrackpoint()
    {
        return $this->idTrackpoint;
    }

    /**
     * @param mixed $idTrackpoint
     */
    public function setIdTrackpoint($idTrackpoint)
    {
        $this->idTrackpoint = $idTrackpoint;
    }

    /**
     * @return mixed
     */
    public function getLatitud()
    {
        return $this->latitud;
    }

    /**
     * @param mixed $latitud
     */
    public function setLatitud($latitud)
    {
        $this->latitud = $latitud;
    }

    /**
     * @return mixed
     */
    public function getLongitud()
    {
        return $this->longitud;
    }

    /**
     * @param mixed $longitud
     */
    public function setLongitud($longitud)
    {
        $this->longitud = $longitud;
    }

    /**
     * @return mixed
     */
    public function getTiempo()
    {
        return $this->tiempo;
    }

    /**
     * @param mixed $tiempo
     */
    public function setTiempo($tiempo)
    {
        $this->tiempo = $tiempo;
    }

    /**
     * @return mixed
     */
    public function getHeartRateBPM()
    {
        return $this->heartRateBPM;
    }

    /**
     * @param mixed $heartRateBPM
     */
    public function setHeartRateBPM($heartRateBPM)
    {
        $this->heartRateBPM = $heartRateBPM;
    }

    /**
     * @return mixed
     */
    public function getElevacion()
    {
        return $this->elevacion;
    }

    /**
     * @param mixed $elevacion
     */
    public function setElevacion($elevacion)
    {
        $this->elevacion = $elevacion;
    }

    /**
     * @return mixed
     */
    public function getNumSatelites()
    {
        return $this->numSatelites;
    }

    /**
     * @param mixed $numSatelites
     */
    public function setNumSatelites($numSatelites)
    {
        $this->numSatelites = $numSatelites;
    }

    /**
     * @return mixed
     */
    public function getVelocidad()
    {
        return $this->velocidad;
    }

    /**
     * @param mixed $velocidad
     */
    public function setVelocidad($velocidad)
    {
        $this->velocidad = $velocidad;
    }

    /**
     * @return mixed
     */
    public function getCalorias()
    {
        return $this->calorias;
    }

    /**
     * @param mixed $calorias
     */
    public function setCalorias($calorias)
    {
        $this->calorias = $calorias;
    }


}
?>