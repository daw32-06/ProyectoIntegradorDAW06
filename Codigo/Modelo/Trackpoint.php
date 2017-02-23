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

    public function __get($property){
        if(property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
    }


}
?>