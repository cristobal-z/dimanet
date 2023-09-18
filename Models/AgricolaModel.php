<?php 



class AgricolaModel extends Mysql{



	private $intIdUsuario;

	private $usu_maq;

	private $strNombre;

	private $strCiudad;

	private $intTelefono;

	private $strEmail;

	private $strSucursal;

	private $strToken;

	private $intStatus;

	private $strCanal;

	private $strVendedor;

	private $strComentarios;



	public function __construct()

	{

		parent::__construct();

	}	





		public function insertUsuario(string $maq ,string $nombre, string $ciudad, string $telefono, string $email, string $sucursal, string $canal, string $vendedor, string $comentarios){

			$this->usu_maq = $maq;

			$this->strNombre = $nombre;

			$this->strCiudad = $ciudad;

			$this->intTelefono = $telefono;

			$this->strEmail = $email;

			$this->strSucursal = $sucursal;

			$this->strCanal = $canal;

			$this->strVendedor = $vendedor;

			$this->strComentarios = $comentarios;

			$return = 0;



			// $sql = "SELECT * FROM tm_agricola WHERE usu_num = '{$this->strEmail}' ";

			// $request = $this->select_all($sql);



			if(empty($request))

			{

				$query_insert  = "INSERT INTO tm_agricola(usu_maq,usu_nom,usu_city,usu_num,usu_correo,usu_sucursal, usu_canal, usu_vendedor, usu_cmt, fech_crea, est)

								  VALUES(?,?,?,?,?,?,?,?,?,now(),1)";

	        	$arrData = array($this->usu_maq,
								
								$this->strNombre,

        						$this->strCiudad,

        						$this->intTelefono,

        						$this->strEmail,

								$this->strSucursal,

        						$this->strCanal,

        						$this->strVendedor,

								$this->strComentarios);

	        	$request_insert = $this->insert($query_insert,$arrData);

	        	$return = $request_insert;

			}else{

				$return = "exist";

			}

	        return $return;

	}



	public function updateUsuario(int $idUsuario,string $maq, string $nombre, string $email,string $sucursal, string $telefono, string $ciudad, string $canal, string $vendedor, string $comentarios){



		$this->intIdUsuario = $idUsuario;

		$this->usu_maq = $maq;

		$this->strNombre = $nombre;

		$this->strSucursal = $sucursal;

		$this->strCiudad = $ciudad;

		$this->intTelefono = $telefono;

		$this->strEmail = $email;

		$this->strCanal = $canal;

		$this->strVendedor = $vendedor;

		$this->strComentarios = $comentarios;



		// $sql = "SELECT * FROM tm_agricola WHERE (usu_correo = '{$this->strEmail}' AND usu_id != $this->intIdUsuario)

		// 							  OR (usu_num = '{$this->intTelefono}' AND usu_id != $this->intIdUsuario) ";

		// $request = $this->select_all($sql);



		if(empty($request))

		{

			$sql = "UPDATE tm_agricola SET usu_maq=?, usu_nom=?,usu_correo=?,usu_sucursal=?,usu_num=?,usu_city=?,usu_canal=?,usu_vendedor=?,usu_cmt=? 

						WHERE usu_id = $this->intIdUsuario ";

						$arrData = array(
						$this->usu_maq,
							
						$this->strNombre,

						$this->strEmail,

						$this->strSucursal,

						$this->intTelefono,

						$this->strCiudad,
						
						$this->strCanal,

						$this->strVendedor,

						$this->strComentarios);

			$request = $this->update($sql,$arrData);

		}else{

			$request = "exist";

		}

		return $request;

	

}





	public function selectLeads()

	{

		$sql = "SELECT * FROM tm_agricola WHERE est != 11 ORDER BY usu_id DESC";

		$request = $this->select_all($sql);

		return $request;

	}



	public function selectDatos(int $iddatos){

		$sql = "SELECT * FROM tm_agricola WHERE usu_id = {$iddatos}";

		$request = $this->select($sql);

		return $request;

	}



	public function deleteUsuario(int $intIdpersona)

		{

			$this->intIdUsuario = $intIdpersona;

			$sql = "UPDATE tm_agricola SET est = 11 WHERE usu_id = $this->intIdUsuario ";

			$arrData = array(0);

			$request = $this->delete($sql,$arrData);

			return $request;

		}



	public function startAgricola(int $intIdpersona)

		{

			$this->intIdUsuario = $intIdpersona;

			$sql = "UPDATE tm_agricola SET est = 3 WHERE usu_id = $this->intIdUsuario ";

			$arrData = array(0);

			$request = $this->delete($sql,$arrData);

			return $request;

		}

	

	public function atenderAgricola(int $intIdpersona)

		{

			$this->intIdUsuario = $intIdpersona;

			$sql = "UPDATE tm_agricola SET est = 3 WHERE usu_id = $this->intIdUsuario ";

			$arrData = array(0);

			$request = $this->delete($sql,$arrData);

			return $request;

		}

	

	public function canalizarAgricola(int $intIdpersona)

		{

			$this->intIdUsuario = $intIdpersona;

			$sql = "UPDATE tm_agricola SET est = 0 WHERE usu_id = $this->intIdUsuario ";

			$arrData = array(0);

			$request = $this->delete($sql,$arrData);

			return $request;

		}

	

	public function demoAgricola(int $intIdpersona)

		{

			$this->intIdUsuario = $intIdpersona;

			$sql = "UPDATE tm_agricola SET est = 4 WHERE usu_id = $this->intIdUsuario ";

			$arrData = array(0);

			$request = $this->delete($sql,$arrData);

			return $request;

		}

	

	public function cotizarAgricola(int $intIdpersona) // funcion cotizar

		{

			$this->intIdUsuario = $intIdpersona;

			$sql = "UPDATE tm_agricola SET est = 7 WHERE usu_id = $this->intIdUsuario ";

			$arrData = array(0);

			$request = $this->delete($sql,$arrData);

			return $request;

		}



	public function comprarAgricola(int $intIdpersona) // funcion comprar

		{

			$this->intIdUsuario = $intIdpersona;

			$sql = "UPDATE tm_agricola SET est = 6 WHERE usu_id = $this->intIdUsuario ";

			$arrData = array(0);

			$request = $this->delete($sql,$arrData);

			return $request;

		}

	

	public function offAgricola(int $intIdpersona) // funcion para apagar el lead

		{

			$this->intIdUsuario = $intIdpersona;

			$sql = "UPDATE tm_agricola SET act = 2 WHERE usu_id = $this->intIdUsuario ";

			$arrData = array(0);

			$request = $this->delete($sql,$arrData);

			return $request;

		}


		// funcion para encender el lead agricola
		public function onAgricola(int $intIdpersona)

		{

			$this->intIdUsuario = $intIdpersona;

			$sql = "UPDATE tm_agricola SET act = 1 WHERE usu_id = $this->intIdUsuario ";

			$arrData = array(0);

			$request = $this->delete($sql,$arrData);

			return $request;

		}


		public function selecDatosVendedores() // funcion para seleccionar los datos del vendedor
	{

		$sql = "SELECT p.idpersona , concat_ws(' ',p.nombres,p.apellidos) as nombre FROM persona p, rol r where r.idrol = p.rolid and r.nombrerol =  'EJECUTIVO DE VENTAS AGRICOLA'";

		$request = $this->select_all($sql);

		return $request;
	}



}

 ?>