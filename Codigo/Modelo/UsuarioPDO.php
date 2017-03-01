<?php
require_once 'DBPDO.php';
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
            $arrayUser['apellidos']=$usuario->apellidos;
            $arrayUser['email']=$usuario->email;
            $arrayUser['nombre']=$usuario->nombre;
            $arrayUser['estatura']=$usuario->estatura;
            $arrayUser['fechaNac']=$usuario->fechaNac;
            $arrayUser['fondoMaraton']=$usuario->fondoMaraton;
            $arrayUser['fondoMediaMaraton']=$usuario->fondoMaraton;
            $arrayUser['medioFondo5km']=$usuario->medioFondo5km;
            $arrayUser['medioFondo10km']=$usuario->medioFondo10km;
            $arrayUser['medioFondoMediaMaraton']=$usuario->medioFondoMediaMaraton;
            $arrayUser['nombre']=$usuario->nombre;
            $arrayUser['peso']=$usuario->peso;
            $arrayUser['sexo']=$usuario->sexo;
            $arrayUser['tipoCorredor']=$usuario->tipoCorredor;
            $arrayUser['trailDistancia']=$usuario->trailDistancia;
            $arrayUser['trailDesnivel']=$usuario->trailDesnivel;
            $arrayUser['trailCarreraMaxKm']=$usuario->trailNombre;

        }
        return $arrayUser;
    }
    /**
     * Busca un usuario en la base de datos.
     *
     * @author Pablo Mora Martín
     *
     * @param string $codUsuario Código del usuario
     * @return bool Datos del usuario
     */
    public static function comprobarUsuario($codUsuario)
    {
        $existe = true;
        $consultaUsuario = "select codUsuario from usuario where codUsuario=?";
        $resultSet = DBPDO::ejecutarConsulta($consultaUsuario, [$codUsuario]);
        if (!$resultSet->rowCount()) {
            $existe=false;
        }
        return $existe;
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
        $sentenciaSQL = "update usuario set nombre=?,apellidos=?,email=?,estatura=?,peso=?,fechaNac=?,tipoCorredor=?,medioFondo5km=?,medioFondo10km=?,medioFondoMediaMaraton=?,fondoMediaMaraton=?,fondoMaraton=?,trailCarreraMaxKm=?,trailDistancia=?,trailDesnivel=?,trailTiempo=?,sexo=? where codUsuario=$codUsuario";
        $resultSet = DBPDO::ejecutarConsulta($sentenciaSQL, [$parametros]);
        if ($resultSet->rowCount() != 1) {
            $modificacionCorrecta = false;
        }
        return $modificacionCorrecta;
    }

}

?>