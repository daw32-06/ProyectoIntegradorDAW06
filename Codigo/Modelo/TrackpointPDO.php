<?php

require_once(realpath(dirname(__FILE__)) . '/Trackpoint.php');
require_once(realpath(dirname(__FILE__)) . '/DBPDO.php');

/**
 * Clase TrackpointPDO.
 *
 * Controla todas las operaciones SQL sobre los trackpoints de un entrenamiento.
 *
 * @author David González Gutiérrez
 * @author David Fernández Flórez
 * @version 1.0.0.0
 *
 * Fecha de última modificación: 03/03/2017
 *
 */
class TrackpointPDO
{
    /**
     * Realiza el alta de una lista de trackpoints.
     *
     * @author David González Gutiérrez
     * @author David Fernández Flórez
     * @since 1.0.0.0
     *
     * @param array[Trackpoint] $trackpoints Lista de trackpoints
     */
    public static function insertarTrackpoint($trackpoints)
    {
        DBPDO::query($trackpoints);
    }

    /**
     * Busca los trackpoints asociados a un entrenamiento.
     *
     * @author David González Gutiérrez
     * @author David Fernández Flórez
     * @since 1.0.0.0
     *
     * @param int $idTrack identificador del entrenamiento
     * @return array[Trackpoint] Lista de trackpoints
     */
    public static function buscarTrackpoints($idTrack)
    {
        $sql = "SELECT * FROM trackpoint WHERE idTrack=?";
        $trackpoints = array();
        $trackpoint = DBPDO::ejecutarConsulta($sql, [$idTrack]);
        while ($resultado = $trackpoint->fetch(PDO::FETCH_OBJ)) {
            array_push($trackpoints, new Trackpoint($resultado->idTrackpoint,$idTrack, $resultado->latitud, $resultado->longitud, $resultado->tiempo, $resultado->heartRateBPM, $resultado->elevacion, $resultado->numSatelites, $resultado->velocidad, $resultado->calorias));
        }
        return $trackpoints;
    }
}

?>