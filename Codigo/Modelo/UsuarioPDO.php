<?php

/**
 * Controla todas las operaciones SQL sobre el usuario que se va a identificar en la aplicación.
 * @author Pablo Mora Martín
 *
 * Fecha de última modificación: 23/02/2017
 */
class UsuarioPDO
{

    /**
     * Busca un usuario en la base de datos.
     *
     * @author Pablo Mora Martín
     *
     * @param string $codUsuario Código del usuario
     * @param string $hashPassword Contraseña (hash) del usuario
     * @return array[string] Datos del usuario
     */
    public static function validarUsuario($codUsuario, $hashPassword)
    {
        $arrayUser = [];
        $consultaUsuario = "select * from usuario where codUsuario=? AND password=?";
        $resultSet = DBPDO::ejecutarConsulta($consultaUsuario, [$codUsuario, $hashPassword]);
        if ($resultSet->rowCount()) {
            $usuario = $resultSet->fetchObject();
            $arrayUser['descUsuario'] = $usuario->descUsuario;
            $arrayUser['perfil'] = $usuario->perfil;
            $arrayUser['ultimaConexion'] = $usuario->ultimaConexion;
            $arrayUser['contadorAccesos'] = $usuario->contadorAccesos;
        }
        return $arrayUser;
    }

    /**
     * Realiza el alta de un usuario nuevo.
     *
     * @author Pablo Mora Martín
     *
     * @param array $parametros Información del usuario
     * @return bool True: Si el alta se ha realizado correctamente. False: si se ha producido un error en la operación.
     */
    public static function insertarUsuario($parametros)
    {
        $altaCorrecta = true;
        $sentenciaSQL = "insert into usuario values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $resultSet = DBPDO::ejecutarConsulta($sentenciaSQL, $parametros);
        if ($resultSet->rowCount() != 1) {
            $altaCorrecta = false;
        }
        return $altaCorrecta;
    }

    /**
     * Realiza la baja de un usuario.
     *
     * @author Pablo Mora Martín
     *
     * @param string $codUsuario
     * @param string %password
     * @return bool True: Si la baja se ha realizado correctamente. False: si se ha producido un error en la operación.
     */
    public static function borrarUsuario($codUsuario, $password)
    {
        $bajaCorrecta = true;
        $sentenciaSQL = "delete from usuario where codUsuario=? and password=?";
        $resultSet = DBPDO::ejecutarConsulta($sentenciaSQL, [$codUsuario, $password]);
        if (!$resultSet->rowCount() != 1) {
            $bajaCorrecta = false;
        }
        return $bajaCorrecta;
    }

    /**
     * Realiza la modificación de un departamento.
     *
     * @author Pablo Mora Martín
     *
     * @param string $codUsuario Código del usuario
     * @param string $parametros Información a modificar
     * @return bool True: Si la modificación se ha realizado correctamente. False: si se ha producido un error en la operación.
     */
    public static function modificarInformacion($codUsuario, $parametros)
    {
        $modificacionCorrecta = true;
        $sentenciaSQL = "update usuario set  where codUsuario=$codUsuario";
        $resultSet = DBPDO::ejecutarConsulta($sentenciaSQL, [$parametros]);
        if ($resultSet->rowCount() != 1) {
            $modificacionCorrecta = false;
        }
        return $modificacionCorrecta;
    }

    /**
     * Devuelve los entrenamientos de una fecha concreta
     *
     * @author Pablo Mora Martín
     *
     * @param int $codUsuario Identificación del usuario
     * @param int $idTrack Identificación del entrenamiento
     * @param string $fechaInicio Fecha del entrenamiento
     * @return array Array con los tracks
     */
    public static function listarTracksPorFecha($codUsuario, $idTrack, $fechaInicio)
    {
        $matrizTracks = [];
        $consultaDepartamentos = "select track.* from track inner join usuario on track.codUsuario=usuario.codUsuario where track.codUsuario=? and idTrack=? and fechaInicio=?";
        $resultSet = DBPDO::ejecutarConsulta($consultaDepartamentos, [$codUsuario,$idTrack, "%$fechaInicio%"]);
        if ($resultSet->rowCount()) {
            $matrizTracks = $resultSet->fetchAll();
        }
        return $matrizTracks;
    }

    /**
     * Devuelve los entrenamientos con un nombre/descripción concreta
     *
     * @author Pablo Mora Martín
     *
     * @param int $codUsuario Identificación del usuario
     * @param int $idTrack Identificación del entrenamiento
     * @param string $nombre Nombre/descripción del entrenamiento
     * @return array Array con los tracks
     */
    public static function listarTracksPorDescripcion($codUsuario, $idTrack, $nombre)
    {
        $matrizTracks = [];
        $consultaDepartamentos = "select track.* from track inner join usuario on track.codUsuario=usuario.codUsuario where track.codUsuario=? and idTrack=? and track.nombre LIKE ?";
        $resultSet = DBPDO::ejecutarConsulta($consultaDepartamentos, [$codUsuario, $idTrack, "%$nombre%"]);
        if ($resultSet->rowCount()) {
            $matrizTracks = $resultSet->fetchAll();
        }
        return $matrizTracks;
    }
}

?>