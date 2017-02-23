<?php
require_once(realpath(dirname(__FILE__)) . '/Usuario.php');
require_once(realpath(dirname(__FILE__)) . '/Trackpoint.php');

/**
 * Entrenamiento.
 *
 * @author David González Gutiérrez
 */
class Track
{
    /**
     * Identificación del entrenamiento
     */
    private $idTrack;
    /**
     * Visibilidad del entrenamiento
     */
    private $visibilidad;
    /**
     * Descripción/nombre del entrenamiento
     */
    private $nombre;
    /**
     * Comentario sobre el entrenamiento
     */
    private $comentario;

    /**
     * Lista de Trackpoints
     */
    private $listaTrackpoint;
    /**
     * Fecha de importación del entrenamiento
     */
    private $fechaImportacion;
    /**
     * Fecha del entrenamiento
     */
    private $fechaInicio;

    /**
     * Track constructor.
     * @param string $idTrack Identificación del entrenamiento
     * @param bool $visibilidad Visibilidad del entrenamiento
     * @param string $nombre Descripción/nombre del entrenamiento
     * @param string $comentario Comentario sobre el entrenamiento
     * @param Trackpoint $listaTrackpoint Lista de Trackpoints
     * @param string $fechaImportacion Fecha de importación del entrenamiento
     * @param string $fechaInicio Fecha del entrenamiento
     */
    public function __construct($idTrack, $visibilidad, $nombre, $comentario, $listaTrackpoint, $fechaImportacion, $fechaInicio)
    {
        $this->idTrack = $idTrack;
        $this->visibilidad = $visibilidad;
        $this->nombre = $nombre;
        $this->comentario = $comentario;
        $this->listaTrackpoint = $listaTrackpoint;
        $this->fechaImportacion = $fechaImportacion;
        $this->fechaInicio = $fechaInicio;
    }


    /**
     * @author David González Gutiérrez
     * @return bool
     */
    public function insertarTrack()
    {
        $insertCorrecto = true;
        // Not yet implemented
        return $insertCorrecto;
    }

    /**
     * @author David González Gutiérrez
     * @param  int $idTrack
     * @return bool
     *
     */
    public function borrarTrack($idTrack)
    {
        $borradoCorrecto = true;
        // Not yet implemented
        return $borradoCorrecto;
    }

    /**
     * @author David González Gutiérrez
     * @access public
     */
    public static function buscarTracks()
    {
        // Not yet implemented
    }

    /**
     * @author David González Gutiérrez
     * @return bool
     */
    public static function validarTrack()
    {
        $trackValido = true;
        // Not yet implemented
        return $trackValido;
    }

    /*
     * @author David González Gutiérrez
     * @return Trackpoint
     */
    private function insertarTrackpoint()
    {
        // Not yet implemented
    }

    /**
     * @access public
     * @return float
     */
    public function getDistancia()
    {
        // Not yet implemented
    }

    /**
     * @access public
     * @return float
     */
    public function getAltitudMax()
    {
        // Not yet implemented
    }

    /**
     * @access public
     * @return float
     */
    public function getAltitudMin()
    {
        // Not yet implemented
    }

    /**
     * @access public
     * @return int
     */
    public function getPulsacionesMax()
    {
        // Not yet implemented
    }

    /**
     * @access public
     * @return int
     */
    public function getPulsacionesMin()
    {
        // Not yet implemented
    }

    /**
     * @access public
     */
    public function resumirTrack()
    {
        // Not yet implemented
    }

    /**
     * @access public
     */
    public function dibujarTrack()
    {
        // Not yet implemented
    }

    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function __set($property, $value)
    {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
    }


}

?>