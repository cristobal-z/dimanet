<?php 

class ConstruccionModel extends Mysql{

	private $intIdUsuario;
	private $strNombre;
	private $strCiudad;
	private $intTelefono;
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


		public function insertUsuario(string $nombre, string $ciudad, string $telefono, string $email, string $canal, string $vendedor, string $comentarios){

			$this->strNombre = $nombre;
			$this->strCiudad = $ciudad;
			$this->intTelefono = $telefono;
			$this->strEmail = $email;
			$this->strCanal = $canal;
			$this->strVendedor = $vendedor;
			$this->strComentarios = $comentarios;
			$return = 0;

			// $sql = "SELECT * FROM tm_construccion WHERE usu_num = '{$this->strEmail}' ";
			// $request = $this->select_all($sql);

			if(empty($request))
			{
				$query_insert  = "INSERT INTO tm_construccion(usu_nom,usu_city,usu_num,usu_correo, usu_canal, usu_vendedor, usu_cmt, fech_crea, est)
								  VALUES(?,?,?,?,?,?,?,now(),1)";
	        	$arrData = array($this->strNombre,
        						$this->strCiudad,
        						$this->intTelefono,
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

	public function updateUsuario(int $idUsuario, string $nombre, string $ciudad, string $telefono, string $email, string $canal, string $vendedor, string $comentarios){

		$this->intIdUsuario = $idUsuario;
		$this->strNombre = $nombre;
		$this->strCiudad = $ciudad;
		$this->intTelefono = $telefono;
		$this->strEmail = $email;
		$this->strCanal = $canal;
		$this->strVendedor = $vendedor;
		$this->strComentarios = $comentarios;

		$sql = "SELECT * FROM tm_construccion WHERE (usu_correo = '{$this->strEmail}' AND usu_id != $this->intIdUsuario)
									  OR (usu_num = '{$this->intTelefono}' AND usu_id != $this->intIdUsuario) ";
		$request = $this->select_all($sql);

		if(empty($request))
		{
			$sql = "UPDATE tm_construccion SET usu_nom=?, usu_city=?, usu_num=?, usu_correo=?, usu_canal=?, usu_vendedor=?, usu_cmt=? 
						WHERE usu_id = $this->intIdUsuario ";
						$arrData = array($this->strNombre,
						$this->strCiudad,
						$this->intTelefono,
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
		$sql = "SELECT * FROM tm_construccion ORDER BY usu_id DESC";
		$request = $this->select_all($sql);
		return $request;
	}

	public function selectDatos(int $iddatos){
		$sql = "SELECT * FROM tm_construccion WHERE usu_id = {$iddatos}";
		$request = $this->select($sql);
		return $request;
	}

	public function deleteUsuario(int $intIdpersona)
		{
			$this->intIdUsuario = $intIdpersona;
			$sql = "UPDATE tm_construccion SET est = 11 WHERE usu_id = $this->intIdUsuario ";
			$arrData = array(0);
			$request = $this->delete($sql,$arrData);
			return $request;
		}

	public function startConstruccion(int $intIdpersona)
		{
			$this->intIdUsuario = $intIdpersona;
			$sql = "UPDATE tm_construccion SET est = 3 WHERE usu_id = $this->intIdUsuario ";
			$arrData = array(0);
			$request = $this->delete($sql,$arrData);
			return $request;
		}
	
	public function atenderConstruccion(int $intIdpersona)
		{
			$this->intIdUsuario = $intIdpersona;
			$sql = "UPDATE tm_construccion SET est = 3 WHERE usu_id = $this->intIdUsuario ";
			$arrData = array(0);
			$request = $this->delete($sql,$arrData);
			return $request;
		}
	
	public function canalizarConstruccion(int $intIdpersona)
		{
			$this->intIdUsuario = $intIdpersona;
			$sql = "UPDATE tm_construccion SET est = 0 WHERE usu_id = $this->intIdUsuario ";
			$arrData = array(0);
			$request = $this->delete($sql,$arrData);
			return $request;
		}
	
	public function demoConstruccion(int $intIdpersona)
		{
			$this->intIdUsuario = $intIdpersona;
			$sql = "UPDATE tm_construccion SET est = 4 WHERE usu_id = $this->intIdUsuario ";
			$arrData = array(0);
			$request = $this->delete($sql,$arrData);
			return $request;
		}
	
	public function cotizarConstruccion(int $intIdpersona)
		{
			$this->intIdUsuario = $intIdpersona;
			$sql = "UPDATE tm_construccion SET est = 7 WHERE usu_id = $this->intIdUsuario ";
			$arrData = array(0);
			$request = $this->delete($sql,$arrData);
			return $request;
		}

	public function comprarConstruccion(int $intIdpersona)
		{
			$this->intIdUsuario = $intIdpersona;
			$sql = "UPDATE tm_construccion SET est = 6 WHERE usu_id = $this->intIdUsuario ";
			$arrData = array(0);
			$request = $this->delete($sql,$arrData);
			return $request;
		}
	
	public function offConstruccion(int $intIdpersona)
		{
			$this->intIdUsuario = $intIdpersona;
			$sql = "UPDATE tm_construccion SET est = 8 WHERE usu_id = $this->intIdUsuario ";
			$arrData = array(0);
			$request = $this->delete($sql,$arrData);
			return $request;
		}

}
 ?>