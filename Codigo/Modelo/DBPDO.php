<?php
//Uso del fichero de configuración

include_once ROOT.'config/DBConfig.php';

/**
 * Base de datos.
 *
 * Operaciones sobre la base de datos.
 *
 * @author Pablo Mora Martín
 * @author  David González Gutiérrez
 * @version 1.0.0.1
 * Fecha de última modificación: 28/02/2017
 */
class DBPDO
{

    /**
     * Ejecuta una consulta SQL con o sin parámetros.
     *
     * @author Santiago Huerga Bartolomé.
     * @author Pablo Mora Martín
     *
     * @param String $consultaSQL Consulta preparada SQL
     * @param array [string] $parametros Parámetros de la consulta
     * @return null|PDOStatement Null / ResultSet con la información del registro
     */
    public static function ejecutarConsulta($consultaSQL, $parametros)
    {
        try {
            $miBD = new PDO(DSN, USUARIO, PASSWORD); //Creación de la conexión. Información de la BD + nombre de usuario + contraseña
            $miBD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Definición de los atributos para que, si existe error, se lancen excepciones
            $miBD->exec("SET CHARACTER SET utf8");
            $preparedStatement = $miBD->prepare($consultaSQL);//Preparación de la consulta preparada0
            $preparedStatement->execute($parametros);
        } catch (PDOException $pdoe) {//Ccaptura de la excepción
            $preparedStatement = null;
            unset($miBD); //Cierre de la conexión
        }
        return $preparedStatement;
    }

    /**
     * Ejecuta sentencia SQL para insertar uno o varios trackpoints
     *
     * @param Trackpoint $trackpoint Trackpoint a importar
     */
    public static function query($trackpoint){
        try{
            $miBD = new PDO(DSN, USUARIO, PASSWORD);//instanciamos el objeto pdo con los datos de conexión a la bbdd
            $miBD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//Habilitamos las excepciones para nuestro código
            $miBD->exec("SET CHARACTER SET utf8");
            foreach ($trackpoint as $key => $value) {
                $miBD->exec("INSERT INTO trackpoint (idTrackpoint,idTrack,latitud,longitud,tiempo) VALUES(null,$value->idTrack,$value->latitud,$value->longitud,$value->tiempo)");
            }
        } catch (PDOException $e) {
            echo 'Codigo de error.' .$e->getCode() . '<br />';
            echo 'Error en la conexion: ' . $e->getMessage();
        }
        $miDBPDO=null;//eliminamos el objeto pdo
    }
}

?>