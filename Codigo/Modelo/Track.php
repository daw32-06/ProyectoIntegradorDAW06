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

    /**
     * @return mixed
     */
    public function getIdTrack()
    {
        return $this->idTrack;
    }

    /**
     * @param mixed $idTrack
     */
    public function setIdTrack($idTrack)
    {
        $this->idTrack = $idTrack;
    }

    /**
     * @return mixed
     */
    public function getVisibilidad()
    {
        return $this->visibilidad;
    }

    /**
     * @param mixed $visibilidad
     */
    public function setVisibilidad($visibilidad)
    {
        $this->visibilidad = $visibilidad;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getComentario()
    {
        return $this->comentario;
    }

    /**
     * @param mixed $comentario
     */
    public function setComentario($comentario)
    {
        $this->comentario = $comentario;
    }

    /**
     * @return mixed
     */
    public function getListaTrackpoint()
    {
        return $this->listaTrackpoint;
    }

    /**
     * @param mixed $listaTrackpoint
     */
    public function setListaTrackpoint($listaTrackpoint)
    {
        $this->listaTrackpoint = $listaTrackpoint;
    }

    /**
     * @return mixed
     */
    public function getFechaImportacion()
    {
        return $this->fechaImportacion;
    }

    /**
     * @param mixed $fechaImportacion
     */
    public function setFechaImportacion($fechaImportacion)
    {
        $this->fechaImportacion = $fechaImportacion;
    }

    /**
     * @return mixed
     */
    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }

    /**
     * @param mixed $fechaInicio
     */
    public function setFechaInicio($fechaInicio)
    {
        $this->fechaInicio = $fechaInicio;
    }


}

?>