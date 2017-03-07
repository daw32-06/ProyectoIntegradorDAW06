<?php

require_once(realpath(dirname(__FILE__)) . '/TrackPDO.php');
require_once(realpath(dirname(__FILE__)) . '/Trackpoint.php');

/**
 * Clase Track.
 *
 * Entrenamiento
 *
 * @author David González Gutiérrez
 * @author David Fernández Flórez
 * @author Pablo Mora Martín
 * @version 1.0.0.0
 *
 * Fecha de última modificación: 03/03/2017
 *
 */
class Track
{
    /**
     * Identificador del entrenamiento
     * @var int
     */
    private $idTrack;
    /**
     * Visibilidad del entrenamiento: público o privado
     * @var bool
     */
    private $visibilidad;
    /**
     * Nombre del entrenamiento
     * @var string
     */
    private $nombre;
    /**
     * Comentario sobre el entranemiento
     * @var string
     */
    private $comentario;
    /**
     * Fecha de importación del entrenamiento
     * @var string
     */
    private $fechaImportacion;
    /**
     * Lista de trackpoints (puntos de ruta) del entrenamiento
     * @var string
     */
    private $listaTrackpoint;
    /**
     * Fecha de inicio del entranamiento
     * @var string
     */
    private $fechaInicio;
    /**
     * Ruta del fichero GPX
     * @var string
     */
    private $rutaFichero;

    /**
     * Constructor del Track
     *
     * @param int $idTrack Identificador del entrenamiento
     * @param bool $visibilidad Visibilidad del entrenamiento: público o privado
     * @param string $nombre Nombre del entrenamiento
     * @param string $comentario Comentario sobre el entranemiento
     * @param Trackpoint $listaTrackpoint Lista de trackpoints
     * @param string $fechaImportacion Fecha de importación
     * @param string $fechaInicio Fecha de inicio
     * @param string $rutaFichero Ruta del fichero GPX
     */
    public function __construct($idTrack, $visibilidad, $nombre, $comentario, $listaTrackpoint, $fechaImportacion, $fechaInicio, $rutaFichero)
    {
        $this->idTrack = $idTrack;
        $this->visibilidad = $visibilidad;
        $this->nombre = $nombre;
        $this->comentario = $comentario;
        $this->listaTrackpoint = $listaTrackpoint;
        $this->fechaImportacion = $fechaImportacion;
        $this->fechaInicio = $fechaInicio;
        $this->rutaFichero = $rutaFichero;
    }


    /**
     * Inserta un track (fichero GPX) en la aplicación
     *
     * @author David González Gutiérrez
     * @author David Fernández Flórez
     * @since 1.0.0.0
     *
     * @param XMLReader $fichero XML
     * @param bool $visibilidad Visibilidad del entrenamiento: público o privado
     * @param string $nombre Nombre del entrenamiento
     * @param string $comentario Comentario sobre el entrenamiento
     */
    public static function insertarTrack($fichero, $visibilidad, $nombre, $comentario)
    {
        $salida = array();
        $xml = new XMLReader();
        $xml->open($fichero);
        while ($xml->read()) {
            if (($xml->name === 'metadata') && ($xml->nodeType == XMLReader::ELEMENT)) {
                $nodoMetadata = new SimpleXMLElement($xml->readOuterXML());
                if ($nodoMetadata != '') {
                    $fechaInicio = strtotime($nodoMetadata->time);
                }
            }
        }
        $xml->close();

        $idTrack = self::getTrackActual(); //Modificado por Pablo Mora
        $idTrack++;
        $track = new Track($idTrack, $visibilidad, $nombre, $comentario, null, date("Y/m/d"), $fechaInicio, $fichero);
        TrackPDO::insertarTrack($track);
        $trackpoints = array();
        $xml = new XMLReader();
        $xml->open($fichero);
        while ($xml->read()) {
            if (($xml->name === 'trkpt') && ($xml->nodeType == XMLReader::ELEMENT)) {
                $nodo = new SimpleXMLElement($xml->readOuterXML());
                if ($nodo != '') {
                    $latlong = $nodo->attributes();
                    $lat = $latlong[0];
                    $long = $latlong[1];
                    $time = strtotime($nodo->time);
                    array_push($trackpoints, new Trackpoint(null, $idTrack, $lat, $long, $time, null, null, null, null, null));
                }
            }
        }
        Trackpoint::insertarTrackpoint($trackpoints);
    }

    /**
     * Devuelve el identificador de track actual.
     *
     * Usado para que, al insertar un nuevo track, realizar el incremento del id del track.
     * @see insertarTrack()
     *
     * @author Pablo Mora Martín
     * @return int Identificador de track actual
     */
    public static function getTrackActual()
    {
        return TrackPDO::getTrackActual();
    }

    /**
     * Borra un track.
     *
     * @author David González Gutiérrez
     * @author David Fernández Flórez
     * @since 1.0.0.0
     *
     * @param int $idTrack Identificador del track
     * @return bool True: Borrado correcto. False: Borrado incorrecto
     */
    public static function borrarTrack($idTrack)
    {
        return TrackPDO::borrarTrack($idTrack);
    }

    /**
     * Busca todos los enrenamiento de un usuario.
     *
     * @author David González Gutiérrez
     * @author David Fernández Flórez
     * @since 1.0.0.0
     *
     * @return array[Track] Tracks del usuario
     */
    public static function buscarTracks()
    {
        $tracks = array();
        $tracksPDO = TrackPDO::recuperarTracks();
        foreach ($tracksPDO as $index => $values) {
            $objectTrack = new Track($values['idTrack'], $values['visibilidad'], $values['nombre'], $values['comentario'], null, $values['fechaImportacion'], $values['fechaInicio'], null);

            array_push($tracks, $objectTrack);
        }
        return $tracks;
    }

    /**
     * Dibujar ruta de un entrenamiento.
     *
     * @author David González Gutiérrez
     * @author David Fernández Flórez
     * @since 1.0.0.0
     *
     * @param int $idTrack True: Borrado correcto. False: Borrado incorrecto
     * @return array[Trackpoint] Trackpoints del entrenamiento
     */
    public static function dibujarTrack($idTrack)
    {
        return Trackpoint::buscarTrackpoints($idTrack);
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