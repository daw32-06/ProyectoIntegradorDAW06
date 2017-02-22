<?php
//Uso del fichero de configuración
include_once ROOT.'config/DBConfig.php';

/**
 * Operaciones sobre la base de datos.
 *
 * @author Pablo Mora Martín.
 * @ 23/01/2017
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
            $preparedStatement = $miBD->prepare($consultaSQL);//Preparación de la consulta preparada
            $preparedStatement->execute($parametros);

        } catch (PDOException $pdoe) {//Ccaptura de la excepción
            $preparedStatement = null;
            unset($miBD); //Cierre de la conexión
        }
        return $preparedStatement;
    }
}

?>