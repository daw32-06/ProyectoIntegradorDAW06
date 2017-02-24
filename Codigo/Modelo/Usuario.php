<?php
require_once(realpath(dirname(__FILE__)) . '/Track.php');

/**
 * Usuario que se va a identificar en la aplicación.
 *
 * @author Pablo Mora Martín
 * Fecha de última modificación: 23/02/2017
 */
class Usuario
{
    /**
     * @AttributeType string
     */
    private $codUsuario;
    /**
     * @AttributeType string
     */
    private $nombre;
    /**
     * @AttributeType string
     */
    private $apellidos;
    /**
     * @AttributeType string
     */
    private $email;
    /**
     * @AttributeType string
     */
    private $password;
    /**
     * @AttributeType int
     */
    private $estatura;
    /**
     * @AttributeType int
     */
    private $peso;
    /**
     * @AttributeType string
     */
    private $fechaNac;
    /**
     * @AttributeType string
     */
    private $tipoCorredor;
    /**
     * @AttributeType int
     */
    private $medioFondo5km;
    /**
     * @AttributeType int
     */
    private $medioFondo10km;
    /**
     * @AttributeType int
     */
    private $medioFondoMediaMaraton;
    /**
     * @AttributeType int
     */
    private $fondoMediaMaraton;
    /**
     * @AttributeType int
     */
    private $fondoMaraton;
    /**
     * @AttributeType string
     */
    private $trailCarreraMaxKm;
    /**
     * @AttributeType int
     */
    private $trailDistancia;
    /**
     * @AttributeType int
     */
    private $trailDesnivel;
    /**
     * @AttributeType int
     */
    private $trailTiempo;
    /**
     * @AttributeType string
     */
    private $sexo;

    private $listaTracks;

    /**
     * Usuario constructor.
     * @param $codUsuario
     * @param $nombre
     * @param $apellidos
     * @param $email
     * @param $password
     * @param $estatura
     * @param $peso
     * @param $fechaNac
     * @param $tipoCorredor
     * @param $medioFondo5km
     * @param $medioFondo10km
     * @param $medioFondoMediaMaraton
     * @param $fondoMediaMaraton
     * @param $fondoMaraton
     * @param $trailCarreraMaxKm
     * @param $trailDistancia
     * @param $trailDesnivel
     * @param $trailTiempo
     * @param $sexo
     * @param $listaTracks
     */
    public function __construct($codUsuario, $nombre, $apellidos, $email, $password, $estatura, $peso, $fechaNac, $tipoCorredor, $medioFondo5km, $medioFondo10km, $medioFondoMediaMaraton, $fondoMediaMaraton, $fondoMaraton, $trailCarreraMaxKm, $trailDistancia, $trailDesnivel, $trailTiempo, $sexo, $listaTracks)
    {
        $this->codUsuario = $codUsuario;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->email = $email;
        $this->password = $password;
        $this->estatura = $estatura;
        $this->peso = $peso;
        $this->fechaNac = $fechaNac;
        $this->tipoCorredor = $tipoCorredor;
        $this->medioFondo5km = $medioFondo5km;
        $this->medioFondo10km = $medioFondo10km;
        $this->medioFondoMediaMaraton = $medioFondoMediaMaraton;
        $this->fondoMediaMaraton = $fondoMediaMaraton;
        $this->fondoMaraton = $fondoMaraton;
        $this->trailCarreraMaxKm = $trailCarreraMaxKm;
        $this->trailDistancia = $trailDistancia;
        $this->trailDesnivel = $trailDesnivel;
        $this->trailTiempo = $trailTiempo;
        $this->sexo = $sexo;
        $this->listaTracks = $listaTracks;
    }


    /**
     * Valida un usuario en la aplicación.
     *
     * @author Pablo Mora Martín
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
            $objUser = new Usuario($codUsuario, $userArray['nombre'], $userArray['apellidos'], $userArray['email'], $userArray['nombre'], $password, $userArray['estatura'], $userArray['peso'], $userArray['fechaNac'], $userArray['tipoCorredor'],
                $userArray['medioFondo5km'], $userArray['medioFondo10km'], $userArray['medioFondoMediaMaraton'], $userArray['fondoMaraton'], $userArray['traukCarreraMaxKm'],
                $userArray['trailDistancia'], $userArray['trailDesnivel'], $userArray['trailTiempo'], $userArray['sexo'], null);
        }
        return $objUser;
    }


    public static function insertarUsuario($parametros)
    {
        return UsuarioPDO::insertarUsuario($parametros);
    }


    public static function borrarUsuario($codUsuario, $password)
    {
        return UsuarioPDO::borrarUsuario($codUsuario, $password);
    }


    public static function modificarInformacion($codUsuario, $parametros)
    {
        return UsuarioPDO::modificarInformacion($codUsuario, $parametros);
    }

     public function cargarTracks($parametros)
    {
        $this::__get($this->listaTracks) = Track::buscarTracks($parametros);
    }

    public function importarTrack($fichero)
    {
        return TracksController::procesarTrack($fichero);
    }
    public function borrarTrack($idTrack)
    {
        return Track::borrarTrack($idTrack);
    }

    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function __set($property, $value)
    {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
    }

}

?>
