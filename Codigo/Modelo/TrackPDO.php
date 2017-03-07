<?php

require_once 'model/DBPDO.php';

/**
 * Class TrackPDO
 *
 * Controla todas las operaciones SQL sobre los entrenamientos de un usuario.
 *
 * @author David González Gutiérrez
 * @author David Fernández Flórez
 * @author Pablo Mora Martín
 * @version 1.0.0.0
 *
 * Fecha de última modificación: 03/03/2017
 */
class TrackPDO
{
    /**
     * Realiza el alta de un entrenamiento nuevo.
     *
     * @author David González Gutiérrez
     * @author David Fernández Flórez
     * @since 1.0.0.0
     *
     * @param Track $track Entrenamiento nuevo
     * @return null|PDOStatement Entrenamiento nuevo
     */
    public static function insertarTrack($track)
    {
        $sql = "INSERT INTO track VALUES(?,?,?,?,?,?,?)";
        return DBPDO::ejecutarConsulta($sql, [$track->idTrack, $_SESSION['usuario']->codUsuario, $track->visibilidad, $track->nombre, $track->comentario, $track->fechaImportacion, $track->fechaInicio]);
    }

    /**
     * Realiza la baja de un entrenamiento.
     *
     * @author David González Gutiérrez
     * @author David Fernández Flórez
     * @since 1.0.0.0
     *
     * @param int $idTrack Identificador del entrenamiento
     * @return null|PDOStatement Entrenamiento borrado
     */
    public static function borrarTrack($idTrack)
    {
        $sql = "DELETE FROM track WHERE idTrack = ?";
        return DBPDO::ejecutarConsulta($sql, [$idTrack]);
    }

    /**
     * Devuelve los tracks de un usuario.
     *
     * @author David González Gutiérrez
     * @author David Fernández Flórez
     * @since 1.0.0.0
     *
     * @return null|PDOStatement Tracks del usuario
     */
    public static function recuperarTracks()
    {
        $sql = "SELECT * FROM track WHERE codUsuario=?";
        return DBPDO::ejecutarConsulta($sql, [$_SESSION['usuario']->codUsuario]);//debe ser $sesion usuario
    }

    /**
     * Devuelve el identificador de track actual.
     *
     * @author Pablo Mora Martín
     * @return int Identificador de track actual
     */
    public static function getTrackActual()
    {
        $sql = "SELECT idTrack FROM track WHERE codUsuario=? ORDER BY idTrack DESC LIMIT 1";

        $resultSet = DBPDO::ejecutarConsulta($sql, [$_SESSION['usuario']->codUsuario]);//debe ser $sesion usuario
        if ($resultSet->rowCount() === 1) {
            $idTrack = $resultSet->fetchColumn(0);
        }
        return $idTrack;
    }

}

?>