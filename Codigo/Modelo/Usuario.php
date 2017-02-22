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
	 * @access public
	 * @param string codUsuario
	 * @param string password
	 * @return Usuario
	 * @static
	 * @ParamType codUsuario string
	 * @ParamType password string
	 * @ReturnType Usuario
	 */
	public static function validarUsuario($codUsuario, $password) {
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

    /**
     * @return mixed
     */
    public function getCodUsuario()
    {
        return $this->codUsuario;
    }

    /**
     * @param mixed $codUsuario
     */
    public function setCodUsuario($codUsuario)
    {
        $this->codUsuario = $codUsuario;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * @param mixed $apellidos
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getEstatura()
    {
        return $this->estatura;
    }

    /**
     * @param mixed $estatura
     */
    public function setEstatura($estatura)
    {
        $this->estatura = $estatura;
    }

    /**
     * @return mixed
     */
    public function getPeso()
    {
        return $this->peso;
    }

    /**
     * @param mixed $peso
     */
    public function setPeso($peso)
    {
        $this->peso = $peso;
    }

    /**
     * @return mixed
     */
    public function getFechaNac()
    {
        return $this->fechaNac;
    }

    /**
     * @param mixed $fechaNac
     */
    public function setFechaNac($fechaNac)
    {
        $this->fechaNac = $fechaNac;
    }

    /**
     * @return mixed
     */
    public function getTipoCorredor()
    {
        return $this->tipoCorredor;
    }

    /**
     * @param mixed $tipoCorredor
     */
    public function setTipoCorredor($tipoCorredor)
    {
        $this->tipoCorredor = $tipoCorredor;
    }

    /**
     * @return mixed
     */
    public function getMedioFondo5km()
    {
        return $this->medioFondo5km;
    }

    /**
     * @param mixed $medioFondo5km
     */
    public function setMedioFondo5km($medioFondo5km)
    {
        $this->medioFondo5km = $medioFondo5km;
    }

    /**
     * @return mixed
     */
    public function getMedioFondo10km()
    {
        return $this->medioFondo10km;
    }

    /**
     * @param mixed $medioFondo10km
     */
    public function setMedioFondo10km($medioFondo10km)
    {
        $this->medioFondo10km = $medioFondo10km;
    }

    /**
     * @return mixed
     */
    public function getMedioFondoMediaMaraton()
    {
        return $this->medioFondoMediaMaraton;
    }

    /**
     * @param mixed $medioFondoMediaMaraton
     */
    public function setMedioFondoMediaMaraton($medioFondoMediaMaraton)
    {
        $this->medioFondoMediaMaraton = $medioFondoMediaMaraton;
    }

    /**
     * @return mixed
     */
    public function getFondoMediaMaraton()
    {
        return $this->fondoMediaMaraton;
    }

    /**
     * @param mixed $fondoMediaMaraton
     */
    public function setFondoMediaMaraton($fondoMediaMaraton)
    {
        $this->fondoMediaMaraton = $fondoMediaMaraton;
    }

    /**
     * @return mixed
     */
    public function getFondoMaraton()
    {
        return $this->fondoMaraton;
    }

    /**
     * @param mixed $fondoMaraton
     */
    public function setFondoMaraton($fondoMaraton)
    {
        $this->fondoMaraton = $fondoMaraton;
    }

    /**
     * @return mixed
     */
    public function getTrailCarreraMaxKm()
    {
        return $this->trailCarreraMaxKm;
    }

    /**
     * @param mixed $trailCarreraMaxKm
     */
    public function setTrailCarreraMaxKm($trailCarreraMaxKm)
    {
        $this->trailCarreraMaxKm = $trailCarreraMaxKm;
    }

    /**
     * @return mixed
     */
    public function getTrailDistancia()
    {
        return $this->trailDistancia;
    }

    /**
     * @param mixed $trailDistancia
     */
    public function setTrailDistancia($trailDistancia)
    {
        $this->trailDistancia = $trailDistancia;
    }

    /**
     * @return mixed
     */
    public function getTrailDesnivel()
    {
        return $this->trailDesnivel;
    }

    /**
     * @param mixed $trailDesnivel
     */
    public function setTrailDesnivel($trailDesnivel)
    {
        $this->trailDesnivel = $trailDesnivel;
    }

    /**
     * @return mixed
     */
    public function getTrailTiempo()
    {
        return $this->trailTiempo;
    }

    /**
     * @param mixed $trailTiempo
     */
    public function setTrailTiempo($trailTiempo)
    {
        $this->trailTiempo = $trailTiempo;
    }

    /**
     * @return mixed
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * @param mixed $sexo
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    }

    /**
     * @return mixed
     */
    public function getListaTracks()
    {
        return $this->listaTracks;
    }

    /**
     * @param mixed $listaTracks
     */
    public function setListaTracks($listaTracks)
    {
        $this->listaTracks = $listaTracks;
    }


}
?>