<?php
//require_once ROOT.'Track.php';
require_once 'UsuarioPDO.php';
//require_once('controller/TracksController.php');
/**
 * Clase Usuario.
 *
 * Usuario que se va a identificar en la aplicación.
 *
 * @author Pablo Mora Martín
 * @version 1.0.0.1
 * Fecha de última modificación: 23/02/2017
 */
class Usuario
{
    /**
     * Código del usuario
     * @var string
     */
    private $codUsuario;
    /**
     * Nombre de usuario
     * @var string
     */
    private $nombre;
    /**
     * Apellidos del uuario
     * @var string
     */
    private $apellidos;
    /**
     * Email del usuario
     * @var string
     */
    private $email;
    /**
     * Contraseña del usuario
     * @var string
     */
    private $password;
    /**
     * Estatura del usuario
     * @var int
     */
    private $estatura;
    /**
     * Peso del usuario
     * @var int
     */
    private $peso;
    /**
     * Fecha de nacimiento del usuario
     * @var string
     */
    private $fechaNac;
    /**
     * Tipo de correodor
     * @var string
     */
    private $tipoCorredor;
    /**
     * Género del usuario
     * @var
     */
    private $sexo;
    /**
     * Mejor marca en 5km
     * @var int
     */
    private $medioFondo5km;
    /**
     * Mejor marca en 10km para corredor de medio fondo
     * @var int
     */
    private $medioFondo10km;
    /**
     * Mejor marca en media maratón para corredor de medio fondo
     * @var int
     */
    private $medioFondoMediaMaraton;
    /**
     * Mejor marca en media maratón para corredor de medio fondo
     * @var int
     */

    /**
     * Mejor marca en media maratón para corredor de fondo
     * @var int
     */
    private $fondoMediaMaraton;

    /**
     * Mejor marca en maratón para corredor de fondo
     * @var string
     */
    private $fondoMaraton;

    /**
     * Nombre de carrera más larga
     * @var int
     */
    private $trailNombre;

    /**
     * Distancia de carrera más larga
     * @var int
     */
    private $trailDistancia;

    /**
     * Desnivel de carrera más larga
     * @var int
     */
    private $trailDesnivel;


    /**
     * Lista de entrenamientos del usuario
     * @var array
     */
    private $listaTracks;

    /**
     * Constructor del Usuario.
     *
     * @author Pablo Mora Martín
     *
     * @param string $codUsuario Código del usuario
     * @param string $nombre Nombre
     * @param string $apellidos Apellidos
     * @param string $email Email
     * @param string $password Contraseña
     * @param int $estatura Estatura
     * @param int $peso Peso
     * @param string $fechaNac Fecha de nacimiento
     * @param string $tipoCorredor Tipo de corredor
     * @param string $sexo Género del usuario
     * @param float $medioFondo5km Mejor marca en 5km para corredor de medio fondo
     * @param float $medioFondo10km Mejor marca en 10km para corredor de medio fondo
     * @param float $medioFondoMediaMaraton Mejor marca en media maratón para corredor de medio fondo
     * @param float $fondoMediaMaraton Mejor marca en media maratón para corredor de fondo
     * @param float $fondoMaraton Mejor marca en maratón para corredor de fondo
     * @param string $trailNombre Nombre de carrera más larga
     * @param float $trailDistancia Distancia de carrera más larga
     * @param int $trailDesnivel Desnivel de carrera más larga
     * @param Track $listaTracks Lista de entrenamientos del usuario
     */
    public function __construct($codUsuario, $nombre, $apellidos, $email, $password, $estatura, $peso, $fechaNac, $tipoCorredor, $medioFondo5km, $medioFondo10km, $medioFondoMediaMaraton, $fondoMediaMaraton, $fondoMaraton, $trailNombre, $trailDistancia, $trailDesnivel, $sexo, $listaTracks)
    {
        $this->codUsuario = $codUsuario;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->email = $email;
        $this->password = $password;
        $this->estatura = $estatura;
        $this->peso = $peso;
        $this->sexo = $sexo;
        $this->fechaNac = $fechaNac;
        $this->tipoCorredor = $tipoCorredor;
        $this->medioFondo5km = $medioFondo5km;
        $this->medioFondo10km = $medioFondo10km;
        $this->medioFondoMediaMaraton = $medioFondoMediaMaraton;
        $this->fondoMediaMaraton = $fondoMediaMaraton;
        $this->fondoMaraton = $fondoMaraton;
        $this->trailNombre = $trailNombre;
        $this->trailDistancia = $trailDistancia;
        $this->trailDesnivel = $trailDesnivel;
        $this->listaTracks = $listaTracks;
    }


    /**
     * Valida un usuario en la aplicación, carga los entrenamientos y almacena el usuario en la sesión.
     *
     * @author Pablo Mora Martín
     * @since 1.0.0.0
     *
     * @param string $codUsuario Código de usuario
     * @param string $password Contraseña (hash) del usuario
     * @return null|Usuario Null / Usuario identificado
     */
    public static function validarUsuario($codUsuario, $password)
    {
        $objUser = null;
        $userArray = UsuarioPDO::validarUsuario($codUsuario, $password); //Array con la información del usuario
        if ($userArray) {//Si el array contiene algo, se crea el objeto
            $objUser = new Usuario($codUsuario, $userArray['nombre'], $userArray['apellidos'], $userArray['email'], $password, $userArray['estatura'], $userArray['peso'], $userArray['fechaNac'], $userArray['tipoCorredor'],
                $userArray['medioFondo5km'], $userArray['medioFondo10km'], $userArray['medioFondoMediaMaraton'], $userArray['fondoMaraton'], $userArray['fondoMediaMaraton'], $userArray['trailNombre'],
                $userArray['trailDistancia'], $userArray['trailDesnivel'], $userArray['sexo'], null);
            self::cargarTracks();
            $_SESSION['usuario']=$objUser;
        }
        return $objUser;
    }

    /**
     * Comrpueba si una información determinada existe en la base de datos
     *
     * @author Pablo Mora Martín
     * @since 1.0.0.1
     *
     * @param string $parametro Información a consultar
     * @param string $valor Valor de la información
     * @return bool True: Información existente. False: Información no existente
     */
    public static function consultarInformacion($parametro,$valor)
    {
        $existe=true;
        $userArray = UsuarioPDO::consultarInformacion($parametro,$valor); //Array con la información del usuario
        if (!$userArray) {//Si el array contiene algo, se crea el objeto
            $existe=false;
        }
        return $existe;
    }

    /**
     * Registra un usuario en la aplicación
     *
     * @since 1.0.0.1
     *
     * @param array $parametros Datos del nuevo usuario
     * @return Usuario Objeto usuario
     */
    public static function insertarUsuario($parametros)
    {
        $objUser = null;
        if (UsuarioPDO::insertarUsuario($parametros)) {
            $objUser = self::validarUsuario($parametros['codUsuario'], $parametros['password']);
        }
        return $objUser;
    }

    /**
     * Elimina un usuario de la aplicación
     *
     * @since 1.0.0.1
     *
     * @param string $codUsuario Código del usuario
     * @param string $password Contraseña del usuario
     * @return bool True: Borrado correcto. False: Borrado incorrecto
     */
    public static function borrarUsuario($codUsuario, $password)
    {
        return UsuarioPDO::borrarUsuario($codUsuario, $password);
    }

    /**
     * Modifica la información de un usuario de la aplicación.
     *
     * @since 1.0.0.1
     *
     * @param string $codUsuario Código del usuario
     * @param string $parametros Datos a modificar
     * @return bool  True: Modificación correcta. False: Modificación incorrecta
     */
    public static function modificarInformacion($codUsuario, $parametros)
    {
        return UsuarioPDO::modificarInformacion($codUsuario, $parametros);
    }
    /**
     * Modifica la información de seguridad de un usuario de la aplicación.
     *
     * Información de seguridad: nombre de usuario, email y contraseña
     *
     * @since 1.0.0.1
     *
     * @param string $codUsuario Código del usuario
     * @param string $parametros Datos de seguridad a modificar
     * @return bool  True: Modificación correcta. False: Modificación incorrecta
     */
    public static function modificarInformacionSeguridad($codUsuario, $parametros)
    {
        return UsuarioPDO::modificarInformacionSeguridad($codUsuario, $parametros);
    }

    /**
     * Carga los entrenamientos de un usuario en su lista de tracks
     * @since 1.0.0.1
     */
    public function cargarTracks()
    {
        $_SESSION['usuario']->listaTracks = Track::buscarTracks();
    }

    /**
     * Borra un entrenamiento de un usuario
     *
     * @since 1.0.0.1
     *
     * @param int $idTrack Identificador del track
     * @return bool True: Borrado correcto. False: Borrado incorrecto
     */
    public function borrarTrack($idTrack)
    {
        return Track::borrarTrack($idTrack);
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