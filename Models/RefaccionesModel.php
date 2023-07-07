<?php 



class RefaccionesModel extends Mysql{



		private $intIdUsuario;

		private $strNombre;

		private $strCiudad;

		private $intTelefono;

		private $strParte;
		private $strDescripcion;
		private $strSerie;
		private $strDivision;

		private $strEmail;

		private $strToken;

		private $intStatus;

		private $strCanal;

		private $strVendedor;

		private $strComentarios;



		public function __construct()

		{

			parent::__construct();

		}	



	public function insertUsuario(string $nombre, string $ciudad, string $telefono, string $parte, string $descripcion, string $serie, string $division, string $email,string $canal, string $vendedor, string $comentarios){



			$this->strNombre = $nombre;

			$this->strCiudad = $ciudad;

			$this->intTelefono = $telefono;

			$this->strParte = $parte;

			$this->strDescripcion = $descripcion;

			$this->strSerie = $serie;

			$this->strDivision = $division;

			$this->strEmail = $email;

			$this->strCanal = $canal;

			$this->strVendedor = $vendedor;

			$this->strComentarios = $comentarios;

			$return = 0;



			// $sql = "SELECT * FROM tm_usuario WHERE usu_num = '{$this->intTelefono}' ";

			// $request = $this->select_all($sql);



			if(empty($request))

			{

				$query_insert  = "INSERT INTO tm_refacciones(usu_nom,usu_city,usu_num,usu_part, usu_descrip,usu_serie,usu_division,usu_correo, usu_canal, usu_vendedor, usu_cmt, fech_crea, est)

								  VALUES(?,?,?,?,?,?,?,?,?,?,?,now(),1)";

	        	$arrData = array($this->strNombre,

        						$this->strCiudad,

        						$this->intTelefono,

								$this->strParte,

								$this->strDescripcion,

								$this->strSerie,

								$this->strDivision,

        						$this->strEmail,

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



	public function updateUsuario(int $idUsuario, string $nombre, string $ciudad, string $telefono, string $parte, string $descripcion, string $serie, string $division, string $email, string $canal, string $vendedor, string $comentarios){



			$this->intIdUsuario = $idUsuario;

			$this->strNombre = $nombre;

			$this->strCiudad = $ciudad;

			$this->intTelefono = $telefono;

			$this->strParte = $parte;

			$this->strDescripcion = $descripcion;

			$this->strSerie = $serie;

			$this->strDivision = $division;

			$this->strEmail = $email;

			$this->strCanal = $canal;

			$this->strVendedor = $vendedor;

			$this->strComentarios = $comentarios;



			// $sql = "SELECT * FROM tm_usuario WHERE (usu_correo = '{$this->strEmail}' AND usu_id != $this->intIdUsuario)

			// 							  OR (usu_num = '{$this->intTelefono}' AND usu_id != $this->intIdUsuario) ";

			// $request = $this->select_all($sql);



			if(empty($request))

			{

				$sql = "UPDATE tm_refacciones SET usu_nom=?, usu_city=?, usu_num=?, usu_part=?, usu_descrip=?, usu_serie=?, usu_division=?, usu_correo=?, usu_canal=?, usu_vendedor=?, usu_cmt=? 

							WHERE usu_id = $this->intIdUsuario ";

							$arrData = array($this->strNombre,

							$this->strCiudad,

							$this->intTelefono,

							$this->strParte,

							$this->strDescripcion,

							$this->strSerie,

							$this->strDivision,

							$this->strEmail,

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

		$sql = "SELECT * FROM tm_refacciones WHERE est != 11 ORDER BY usu_id DESC";

		$request = $this->select_all($sql);

		return $request;

	}



	public function selectDatos(int $iddatos){

		$sql = "SELECT * FROM tm_refacciones WHERE usu_id = {$iddatos}";

		$request = $this->select($sql);

		return $request;

	}



	



	public function deleteUsuario(int $intIdpersona)

		{

			$this->intIdUsuario = $intIdpersona;

			$sql = "UPDATE tm_refacciones SET est = 11 WHERE usu_id = $this->intIdUsuario ";

			$arrData = array(0);

			$request = $this->delete($sql,$arrData);

			return $request;

		}



	public function startRefacciones(int $intIdpersona)

		{

			$this->intIdUsuario = $intIdpersona;

			$sql = "UPDATE tm_refacciones SET est = 3 WHERE usu_id = $this->intIdUsuario ";

			$arrData = array(0);

			$request = $this->delete($sql,$arrData);

			return $request;

		}

	

	public function atenderRefacciones(int $intIdpersona)

		{

			$this->intIdUsuario = $intIdpersona;

			$sql = "UPDATE tm_refacciones SET est = 3 WHERE usu_id = $this->intIdUsuario ";

			$arrData = array(0);

			$request = $this->delete($sql,$arrData);

			return $request;

		}

	

	public function canalizarRefacciones(int $intIdpersona)

		{

			$this->intIdUsuario = $intIdpersona;

			$sql = "UPDATE tm_refacciones SET est = 0 WHERE usu_id = $this->intIdUsuario ";

			$arrData = array(0);

			$request = $this->delete($sql,$arrData);

			return $request;

		}

	

	public function demoRefacciones(int $intIdpersona)

		{

			$this->intIdUsuario = $intIdpersona;

			$sql = "UPDATE tm_refacciones SET est = 4 WHERE usu_id = $this->intIdUsuario ";

			$arrData = array(0);

			$request = $this->delete($sql,$arrData);

			return $request;

		}

	

	public function negociarRefacciones(int $intIdpersona)

		{

			$this->intIdUsuario = $intIdpersona;

			$sql = "UPDATE tm_refacciones SET est = 7 WHERE usu_id = $this->intIdUsuario ";

			$arrData = array(0);

			$request = $this->delete($sql,$arrData);

			return $request;

		}



	public function comprarRefacciones(int $intIdpersona)

		{

			$this->intIdUsuario = $intIdpersona;

			$sql = "UPDATE tm_refacciones SET est = 6 WHERE usu_id = $this->intIdUsuario ";

			$arrData = array(0);

			$request = $this->delete($sql,$arrData);

			return $request;

		}

	

	public function offRefacciones(int $intIdpersona)

		{

			$this->intIdUsuario = $intIdpersona;

			$sql = "UPDATE tm_refacciones SET act = 2 WHERE usu_id = $this->intIdUsuario ";

			$arrData = array(0);

			$request = $this->delete($sql,$arrData);

			return $request;

		}

	public function onRefacciones(int $intIdpersona)

		{

			$this->intIdUsuario = $intIdpersona;

			$sql = "UPDATE tm_refacciones SET act = 1 WHERE usu_id = $this->intIdUsuario ";

			$arrData = array(0);

			$request = $this->delete($sql,$arrData);

			return $request;

		}

	

	public function selectStatus()

		{

			// $whereAdmin = "";

			// if($_SESSION['idUser'] != 1 ){

			// 	$whereAdmin = " and idrol != 1 ";

			// }

			//EXTRAE ROLES

			$sql = "SELECT * FROM tm_refacciones";

			$request = $this->select_all($sql);

			return $request;

		}

}

 ?>