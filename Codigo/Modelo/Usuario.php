<?php 
	class Usuario{
		protected $codUsuario;
		protected $nombre;
		protected $apellidos;
		protected $email;
		protected $password;
		protected $estatura;
		protected $peso;
		protected $fechaNac;
		protected $tipoCorredor;
		protected $medioFondo5km;
		protected $medioFondo10km;
		protected $medioFondoMediaMaraton;
		protected $fondoMediaMaraton;
		protected $fondoMaraton;
		protected $trailCarreraMaxKm;
		protected $trailDistancia;
		protected $trailDesnivel;
		protected $trailTiempo;
		protected $sexo;
		protected $listaTracks;

		public function __construct($codUsuario,$nombre,$apellidos,$email,$password,$estatura,$peso,$fechaNac,$tipoCorredor,$medioFondo5km,$medioFondo10km,$medioFondoMediaMaraton,$fondoMaraton,$trailCarreraMaxKm,$trailDistancia,$trailDesnivel,$trailTiempo,$sexo,$listaTracks){
			$this->codUsuario=$codUsuario;
			$this->nombre=$nombre;
			$this->apellidos=$apellidos;
			$this->email=$email;
			$this->password=$password;
			$this->estatura=$estatura;
			$this->peso=$peso;
			$this->fechaNac=$fechaNac;
			$this->tipoCorredor=$tipoCorredor;
			$this->medioFondo5km=$medioFondo5km;
			$this->medioFondo10km=$medioFondo10km;
			$this->medioFondoMediaMaraton=$medioFondoMediaMaraton;
			$this->fondoMediaMaraton=$fondoMaraton;
			$this->fondoMaraton=$fondoMediaMaraton;
			$this->trailCarreraMaxKm=$trailCarreraMaxKm;
			$this->trailDistancia=$trailDistancia;
			$this->trailDesnivel=$trailDesnivel;
			$this->trailTiempo=$trailTiempo;
			$this->sexo=$sexo;
			$this->listaTracks=$listaTracks;
		}
		public static function validarUsuario(){
			$usuario=null;

			return $usuario;
		}
	}


?>