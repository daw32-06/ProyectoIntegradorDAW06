<?php

require_once(realpath(dirname(__FILE__)) . '/TrackpointPDO.php');

/**
 * Clase Tracpoint.
 *
 * Puntos de la ruta del entrenamiento
 *
 * @author David González Gutiérrez
 * @author David Fernández Flórez
 * @author Pablo Mora Martín
 * @version 1.0.0.0
 *
 * Fecha de última modificación: 03/03/2017
 *
 */
class Trackpoint
{
    /**
     * Identificador del trackpoint
     * @var int
     */
    private $idTrackpoint;
    /**
     * Identificador del track asociado
     * @var
     */
    private $idTrack;
    /**
     * Latitud
     * @var float
     */
    private $latitud;
    /**
     * Longitud
     * @var float
     */
    private $longitud;
    /**
     * Tiempo (segundos) de duración de ese punto
     * @var int
     */
    private $tiempo;
    /**
     * Número de pulsaciones por minuto
     * @var int
     */
    private $heartRateBPM;
    /**
     * Elevación
     * @var float
     */
    private $elevacion;
    /**
     * Número de satélites usados en la localización
     * @var int
     */
    private $numSatelites;
    /**
     * Velocidad en ese punto
     * @var float
     */
    private $velocidad;
    /**
     * Calorías quemadas en ese punto
     * @var float
     */
    private $calorias;

    /**
     * Trackpoint constructor.
     * @param int $idTrackpoint Identificador del punto
     * @param int $idTrack Identificador del track asociado
     * @param float $latitud Latitud
     * @param float $longitud Longitud
     * @param int $tiempo Tiempo (segundos) de duración de ese punto
     * @param int $heartRateBPM Número de pulsaciones por minuto
     * @param float $elevacion Elevación
     * @param int $numSatelites Número de satélites usados en la localización
     * @param float $velocidad Velocidad
     * @param float $calorias Calorías quemadas
     */
    public function __construct($idTrackpoint, $idTrack, $latitud, $longitud, $tiempo, $heartRateBPM, $elevacion, $numSatelites, $velocidad, $calorias)
    {
        $this->idTrackpoint = $idTrackpoint;
        $this->idTrack = $idTrack;
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
     * Inserta uno o más trackpoints.
     *
     * @author David González Gutiérrez
     * @author David Fernández Flórez
     * @since 1.0.0.0
     *
     * @param array[Trackpoint] $trackpoints Lista de trackpoints
     */
    public static function insertarTrackpoint($trackpoints)
    {
        TrackpointPDO::insertarTrackpoint($trackpoints);
    }

    /**
     * Busca los trackpoints de un entrenamiento.
     *
     * @author David González Gutiérrez
     * @author David Fernández Flórez
     * @since 1.0.0.0
     *
     * @param int $idTrack Identificador del track
     * @return array[Trackpoint] Lista de trackpoints
     */
    public static function buscarTrackpoints($idTrack)
    {
        return TrackpointPDO::buscarTrackpoints($idTrack);
    }

    /**
     * Devuelve el valor de una propiedad pública especificada.
     *
     * @since 1.0.0.0
     *
     * @param string $property Atributo del cual se quiere recoger el valor
     * @return mixed Valor del atributo
     */
    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    /**
     * Establece el valor de una propiedad pública especificada.
     *
     * @since 1.0.0.0
     *
     * @param string $property Atributo del cual se quiere establecer el valor
     * @param string $value Valor nuevo a establecer
     */
    public function __set($property, $value)
    {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
    }

}

?>