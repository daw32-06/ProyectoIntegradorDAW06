<?php
require_once(realpath(dirname(__FILE__)) . '/Track.php');

/**
 * @access public
 * @author admin
 */
class Usuario {
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
     * @param string $hashPassword Contraseña (hash) del usuario
     * @return string null|Usuario Null / Usuario identificado
     */
    public static function validarUsuario($codUsuario, $hashPassword)
    {
        $objUser = null;
        $userArray = UsuarioPDO::validarUsuario($codUsuario, $hashPassword); //Array con la información del usuario
        if ($userArray) {//Si el array contiene algo, se crea el objeto
            $objUser = new Usuario($codUsuario, $userArray['descUsuario'], $hashPassword, $userArray['perfil'], $userArray['ultimaConexion'], $userArray['contadorAccesos']);
        }
        return $objUser;
    }

	/**
	 * @access public
	 * @param atributos
	 * @return bool
	 * @static
	 * 
	 * @ReturnType bool
	 */
	public static function insertarUsuario($atributos) {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param string codUsuario
	 * @param string password
	 * @return bool
	 * @static
	 * @ParamType codUsuario string
	 * @ParamType password string
	 * @ReturnType bool
	 */
	public static function borrarUsuario($codUsuario, $password) {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param atributos
	 * @return bool
	 * @static
	 * 
	 * @ReturnType bool
	 */
	public static function modificarInformacion($atributos) {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function cargarTracksPorFecha() {
		// Not yet implemented
	}

	/**
	 * @access public
	 */
	public function cargarTracksPordescripcion() {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param atributos
	 * @return bool
	 * 
	 * @ReturnType bool
	 */
	public function importarTrack($atributos) {
		// Not yet implemented
	}

	/**
	 * @access public
	 * @param int idTrack
	 * @return bool
	 * @ParamType idTrack int
	 * @ReturnType bool
	 */
	public function borrarTrack($idTrack) {
		// Not yet implemented
	}

    public function __get($property){
        if(property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
    }

}
?>