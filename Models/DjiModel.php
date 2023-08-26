<?php



class DjiModel extends Mysql
{



	private $intIdUsuario;

	private $strMaq;

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



	public function insertUsuario(string $maquina, string $nombre, string $ciudad, string $telefono, string $email, string $cultivo, string $hectareas, string $canal, string $comentarios, string $vendedor)
	{


		$this->strMaq = $maquina;

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



		if (empty($request)) {

			$query_insert  = "INSERT INTO tm_usuario(usu_maq,usu_nom,usu_city,usu_num,usu_correo,usu_cultivo,usu_hec, landing_page, usu_cmt, fech_crea,usu_asig, est)

								  VALUES(?,?,?,?,?,?,?,?,?,now(),?,1)";

			$arrData = array(
				$this->strMaq,

				$this->strNombre,

				$this->strCiudad,

				$this->intTelefono,

				$this->strEmail,

				$this->strCultivo,

				$this->strHectareas,

				$this->strCanal,

				$this->strComentarios,

				$this->strVendedor
			);

			$request_insert = $this->insert($query_insert, $arrData);

			$return = $request_insert;
		} else {

			$return = "exist";
		}

		return $return;
	}



	public function updateUsuario(int $idUsuario, string $maquina, string $nombre, string $ciudad, string $telefono, string $email, string $cultivo, string $hectareas, string $canal,  string $comentarios, string $vendedor)
	{



		$this->intIdUsuario = $idUsuario;

		$this->strMaq = $maquina;

		$this->strNombre = $nombre;

		$this->strCiudad = $ciudad;

		$this->intTelefono = $telefono;

		$this->strEmail = $email;

		$this->strCultivo = $cultivo;

		$this->strHectareas = $hectareas;

		$this->strCanal = $canal;

		$this->strComentarios = $comentarios;

		$this->strVendedor = $vendedor;



		// $sql = "SELECT * FROM tm_usuario WHERE (usu_correo = '{$this->strEmail}' AND usu_id != $this->intIdUsuario)

		// 							  OR (usu_num = '{$this->intTelefono}' AND usu_id != $this->intIdUsuario) ";

		// $request = $this->select_all($sql);



		if (empty($request)) {

			$sql = "UPDATE tm_usuario SET usu_maq = ?,usu_nom=?, usu_city=?, usu_num=?, usu_correo=?, usu_cultivo=?, usu_hec=?, landing_page=?, usu_cmt=?, usu_asig=?

							WHERE usu_id = $this->intIdUsuario ";

			$arrData = array(
				$this->strMaq,

				$this->strNombre,

				$this->strCiudad,

				$this->intTelefono,

				$this->strEmail,

				$this->strCultivo,

				$this->strHectareas,

				$this->strCanal,

				$this->strComentarios,

				$this->strVendedor
			);

			$request = $this->update($sql, $arrData);
		} else {

			$request = "exist";
		}

		return $request;
	}




	public function selecDatosVendedores()
	{

		$sql = "SELECT p.idpersona , concat_ws(' ',p.nombres,p.apellidos) as nombre FROM persona p, rol r where r.idrol = p.rolid and r.nombrerol = 'Especialista SIAP'";

		$request = $this->select_all($sql);

		return $request;
	}




	public function selectLeads() // funcion para cargar los leads en la tabla dji

	{
		$array = $_SESSION['userData']; // datos del rol de usuario

		if ($array['nombrerol'] == 'Administrador' or $array['nombrerol'] == 'Coordinadora CAP' or $array['nombrerol'] == 'Potencializador de Ventas Digitales') {

			$sql = "SELECT 
			u.usu_id,
			u.usu_maq,
			u.usu_nom,
			u.usu_correo,
			u.usu_num,
			u.usu_city,
			u.usu_hec,
			u.usu_cultivo,
			u.landing_page,
			CONCAT_WS(' ', p.nombres, p.apellidos) AS usu_vendedor,
			u.usu_cmt,
			u.fech_crea,
			u.usu_asig,
			u.est,
			u.act
		FROM
			tm_usuario u,
			persona p
		WHERE
			u.usu_asig = p.idpersona AND u.est != 11
		ORDER BY usu_id DESC";

		} else {


			$idUsuario = $_SESSION['idUser']; // id del usuario para mostrar los leads de cada vendedor 

			$sql = "SELECT 
			u.usu_id,
			u.usu_maq,
			u.usu_nom,
			u.usu_correo,
			u.usu_num,
			u.usu_city,
			u.usu_hec,
			u.usu_cultivo,
			u.landing_page,
			CONCAT_WS(' ', p.nombres, p.apellidos) AS usu_vendedor,
			u.usu_cmt,
			u.fech_crea,
			u.usu_asig,
			u.est,
			u.act
		FROM
			tm_usuario u,
			persona p
		WHERE
			u.usu_asig = p.idpersona AND u.est != 11
			AND p.idpersona = $idUsuario
		ORDER BY usu_id DESC";
		}

		$request = $this->select_all($sql);

		return $request;
	}



	public function selectDatos(int $iddatos) // funcion para cargar los datos al modal editar lead
	{

		$sql = "SELECT 
		u.usu_id,
		u.usu_maq,
		u.usu_nom,
		u.usu_correo,
		u.usu_num,
		u.usu_city,
		u.usu_hec,
		u.usu_cultivo,
		u.landing_page,
		CONCAT_WS(' ', p.nombres, p.apellidos) AS usu_vendedor,
		u.usu_cmt,
		u.fech_crea,
		u.usu_asig,
		u.est,
		u.act
	FROM
		tm_usuario u,
		persona p
	WHERE
		u.usu_asig = p.idpersona
			AND u.usu_id  = {$iddatos}";

		$request = $this->select($sql);

		return $request;
	}







	public function deleteUsuario(int $intIdpersona)

	{

		$this->intIdUsuario = $intIdpersona;

		$sql = "UPDATE tm_usuario SET est = 11 WHERE usu_id = $this->intIdUsuario ";

		$arrData = array(0);

		$request = $this->delete($sql, $arrData);

		return $request;
	}



	public function startDji(int $intIdpersona)

	{

		$this->intIdUsuario = $intIdpersona;

		$sql = "UPDATE tm_usuario SET est = 3 WHERE usu_id = $this->intIdUsuario ";

		$arrData = array(0);

		$request = $this->delete($sql, $arrData);

		return $request;
	}



	public function atenderDji(int $intIdpersona)

	{

		$this->intIdUsuario = $intIdpersona;

		$sql = "UPDATE tm_usuario SET est = 3 WHERE usu_id = $this->intIdUsuario ";

		$arrData = array(0);

		$request = $this->delete($sql, $arrData);

		return $request;
	}



	public function canalizarDji(int $intIdpersona)

	{

		$this->intIdUsuario = $intIdpersona;

		$sql = "UPDATE tm_usuario SET est = 0 WHERE usu_id = $this->intIdUsuario ";

		$arrData = array(0);

		$request = $this->delete($sql, $arrData);

		return $request;
	}



	public function demoDji(int $intIdpersona)

	{

		$this->intIdUsuario = $intIdpersona;

		$sql = "UPDATE tm_usuario SET est = 4 WHERE usu_id = $this->intIdUsuario ";

		$arrData = array(0);

		$request = $this->delete($sql, $arrData);

		return $request;
	}



	public function negociarDji(int $intIdpersona)

	{

		$this->intIdUsuario = $intIdpersona;

		$sql = "UPDATE tm_usuario SET est = 7 WHERE usu_id = $this->intIdUsuario ";

		$arrData = array(0);

		$request = $this->delete($sql, $arrData);

		return $request;
	}



	public function comprarDji(int $intIdpersona)

	{

		$this->intIdUsuario = $intIdpersona;

		$sql = "UPDATE tm_usuario SET est = 6 WHERE usu_id = $this->intIdUsuario ";

		$arrData = array(0);

		$request = $this->delete($sql, $arrData);

		return $request;
	}



	public function offDji(int $intIdpersona)

	{

		$this->intIdUsuario = $intIdpersona;

		$sql = "UPDATE tm_usuario SET act = 2 WHERE usu_id = $this->intIdUsuario ";

		$arrData = array(0);

		$request = $this->delete($sql, $arrData);

		return $request;
	}

	public function onDji(int $intIdpersona)

	{

		$this->intIdUsuario = $intIdpersona;

		$sql = "UPDATE tm_usuario SET act = 1 WHERE usu_id = $this->intIdUsuario ";

		$arrData = array(0);

		$request = $this->delete($sql, $arrData);

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
