<?php
require_once(realpath(dirname(__FILE__)) . '/Usuario.php');
require_once(realpath(dirname(__FILE__)) . '/Trackpoint.php');

/**
 * @access public
 * @author admin
 */
class Track
{
    /**
     * @AttributeType int
     */
    private $idTrack;
    /**
     * @AttributeType bool
     */
    private $visibilidad;
    /**
     * @AttributeType string
     */
    private $nombre;
    /**
     * @AttributeType string
     */
    private $comentario;

    private $listaTrackpoint;
    /**
     * @AttributeType string
     */
    private $fechaImportacion;
    /**
     * @AttributeType string
     */
    private $fechaInicio;

    /**
     * Track constructor.
     * @param $idTrack
     * @param $visibilidad
     * @param $nombre
     * @param $comentario
     * @param $listaTrackpoint
     * @param $fechaImportacion
     * @param $fechaInicio
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
     * @access public
     * @return bool
     */
    public function insertarTrack()
    {
       $insertCorrecto=true;
        // Not yet implemented
       return $insertCorrecto;
    }

    /**
     * @access public
     * @param idTrack int
     * @return bool
     *
     */
    public function borrarTrack($idTrack)
    {
        $borradoCorrecto=true;
        // Not yet implemented
        return $borradoCorrecto;
    }

    /**
     * @access public
     */
    public static function buscarTracks()
    {
        // Not yet implemented
    }

    /**
     * @access public
     * @return bool
     */
    public static function validarTrack()
    {
        $trackValido=true;
        // Not yet implemented
        return $trackValido;
    }

    /**
     * @access public
     * @return Trackpoint
     */
    public function insertarTrackpoint()
    {
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