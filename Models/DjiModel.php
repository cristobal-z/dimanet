<?php 

class DjiModel extends Mysql{

		private $intIdUsuario;
		private $strNombre;
		private $strCiudad;
		private $intTelefono;
		private $strEmail;
		private $strCultivo;
		private $strToken;
		private $strHectareas;
		private $intStatus;
		private $strCanal;
		private $strVendedor;
		private $strComentarios;

		public function __construct()
		{
			parent::__construct();
		}	

	public function insertUsuario(string $nombre, string $ciudad, string $telefono, string $email, string $cultivo, string $hectareas, string $canal, string $vendedor, string $comentarios){

			$this->strNombre = $nombre;
			$this->strCiudad = $ciudad;
			$this->intTelefono = $telefono;
			$this->strEmail = $email;
			$this->strCultivo = $cultivo;
			$this->strHectareas = $hectareas;
			$this->strCanal = $canal;
			$this->strVendedor = $vendedor;
			$this->strComentarios = $comentarios;
			$return = 0;

			// $sql = "SELECT * FROM tm_usuario WHERE usu_num = '{$this->intTelefono}' ";
			// $request = $this->select_all($sql);

			if(empty($request))
			{
				$query_insert  = "INSERT INTO tm_usuario(usu_nom,usu_city,usu_num,usu_correo,usu_cultivo,usu_hec, landing_page, usu_vendedor, usu_cmt, fech_crea, est)
								  VALUES(?,?,?,?,?,?,?,?,?,now(),1)";
	        	$arrData = array($this->strNombre,
        						$this->strCiudad,
        						$this->intTelefono,
        						$this->strEmail,
        						$this->strCultivo,
        						$this->strHectareas,
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

	public function updateUsuario(int $idUsuario, string $nombre, string $ciudad, string $telefono, string $email, string $cultivo, string $hectareas, string $canal, string $vendedor, string $comentarios){

			$this->intIdUsuario = $idUsuario;
			$this->strNombre = $nombre;
			$this->strCiudad = $ciudad;
			$this->intTelefono = $telefono;
			$this->strEmail = $email;
			$this->strCultivo = $cultivo;
			$this->strHectareas = $hectareas;
			$this->strCanal = $canal;
			$this->strVendedor = $vendedor;
			$this->strComentarios = $comentarios;

			// $sql = "SELECT * FROM tm_usuario WHERE (usu_correo = '{$this->strEmail}' AND usu_id != $this->intIdUsuario)
			// 							  OR (usu_num = '{$this->intTelefono}' AND usu_id != $this->intIdUsuario) ";
			// $request = $this->select_all($sql);

			if(empty($request))
			{
				$sql = "UPDATE tm_usuario SET usu_nom=?, usu_city=?, usu_num=?, usu_correo=?, usu_cultivo=?, usu_hec=?, landing_page=?, usu_vendedor=?, usu_cmt=? 
							WHERE usu_id = $this->intIdUsuario ";
							$arrData = array($this->strNombre,
							$this->strCiudad,
							$this->intTelefono,
							$this->strEmail,
							$this->strCultivo,
							$this->strHectareas,
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
		$sql = "SELECT * FROM tm_usuario WHERE est != 11 ORDER BY usu_id DESC";
		$request = $this->select_all($sql);
		return $request;
	}

	public function selectDatos(int $iddatos){
		$sql = "SELECT * FROM tm_usuario WHERE usu_id = {$iddatos}";
		$request = $this->select($sql);
		return $request;
	}

	

	public function deleteUsuario(int $intIdpersona)
		{
			$this->intIdUsuario = $intIdpersona;
			$sql = "UPDATE tm_usuario SET est = 11 WHERE usu_id = $this->intIdUsuario ";
			$arrData = array(0);
			$request = $this->delete($sql,$arrData);
			return $request;
		}

	public function startDji(int $intIdpersona)
		{
			$this->intIdUsuario = $intIdpersona;
			$sql = "UPDATE tm_usuario SET est = 3 WHERE usu_id = $this->intIdUsuario ";
			$arrData = array(0);
			$request = $this->delete($sql,$arrData);
			return $request;
		}
	
	public function atenderDji(int $intIdpersona)
		{
			$this->intIdUsuario = $intIdpersona;
			$sql = "UPDATE tm_usuario SET est = 3 WHERE usu_id = $this->intIdUsuario ";
			$arrData = array(0);
			$request = $this->delete($sql,$arrData);
			return $request;
		}
	
	public function canalizarDji(int $intIdpersona)
		{
			$this->intIdUsuario = $intIdpersona;
			$sql = "UPDATE tm_usuario SET est = 0 WHERE usu_id = $this->intIdUsuario ";
			$arrData = array(0);
			$request = $this->delete($sql,$arrData);
			return $request;
		}
	
	public function demoDji(int $intIdpersona)
		{
			$this->intIdUsuario = $intIdpersona;
			$sql = "UPDATE tm_usuario SET est = 4 WHERE usu_id = $this->intIdUsuario ";
			$arrData = array(0);
			$request = $this->delete($sql,$arrData);
			return $request;
		}
	
	public function negociarDji(int $intIdpersona)
		{
			$this->intIdUsuario = $intIdpersona;
			$sql = "UPDATE tm_usuario SET est = 7 WHERE usu_id = $this->intIdUsuario ";
			$arrData = array(0);
			$request = $this->delete($sql,$arrData);
			return $request;
		}

	public function comprarDji(int $intIdpersona)
		{
			$this->intIdUsuario = $intIdpersona;
			$sql = "UPDATE tm_usuario SET est = 6 WHERE usu_id = $this->intIdUsuario ";
			$arrData = array(0);
			$request = $this->delete($sql,$arrData);
			return $request;
		}
	
	public function offDji(int $intIdpersona)
		{
			$this->intIdUsuario = $intIdpersona;
			$sql = "UPDATE tm_usuario SET act = 2 WHERE usu_id = $this->intIdUsuario ";
			$arrData = array(0);
			$request = $this->delete($sql,$arrData);
			return $request;
		}
	public function onDji(int $intIdpersona)
		{
			$this->intIdUsuario = $intIdpersona;
			$sql = "UPDATE tm_usuario SET act = 1 WHERE usu_id = $this->intIdUsuario ";
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
			$sql = "SELECT * FROM tm_usuario";
			$request = $this->select_all($sql);
			return $request;
		}
}
 ?>