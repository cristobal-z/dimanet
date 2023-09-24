<?php



class ServicioModel extends Mysql
{



    private $intIdUsuario;

    private $strfactura;

    private $strjdlink;

    private $strSucursal;

    private $strNombre;

    private $intTelefono;

    private $strCorreo;

    private $strDireccion;

    private $strCiudad;

    private $StrEstado;

    private $strSerie;

    private $strModelo;

    private $strDivision;

    private $strComentarios;



    public function __construct()

    {

        parent::__construct();
    }



    public function insertUsuario(string $factura, string $jdlink, string $sucursal, string $nombre, string $telefono, string $correo, string $direccion, string $ciudad, string $estado, string $serie, string $modelo, string $division, string $comentarios)
    {


        $this->strfactura = $factura;

        $this->strjdlink = $jdlink;

        $this->strSucursal = $sucursal;

        $this->strNombre = $nombre;

        $this->intTelefono = $telefono;

        $this->strCorreo = $correo;

        $this->strDireccion = $direccion;

        $this->strCiudad = $ciudad;

        $this->StrEstado = $estado;

        $this->strSerie = $serie;

        $this->strModelo = $modelo;

        $this->strDivision = $division;

        $this->strComentarios = $comentarios;



        $return = 0;



        // $sql = "SELECT * FROM tm_usuario WHERE usu_num = '{$this->intTelefono}' ";

        // $request = $this->select_all($sql);



        if (empty($request)) {

            $query_insert  = "INSERT INTO tm_servicio(usu_fac,usu_jdl,usu_suc,usu_nom,usu_tel,usu_cor,usu_dir, usu_ciu, usu_est, usu_ser,usu_mod, usu_div,usu_com,fech_crea,usu_asig,est)

								  VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,now(),10,1)";

            $arrData = array(
                $this->strfactura,

                $this->strjdlink,

                $this->strSucursal,

                $this->strNombre,

                $this->intTelefono,

                $this->strCorreo,

                $this->strDireccion,

                $this->strCiudad,

                $this->StrEstado,

                $this->strSerie,

                $this->strModelo,

                $this->strDivision,

                $this->strComentarios
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

        $sql = "SELECT p.idpersona , concat_ws(' ',p.nombres,p.apellidos) as nombre FROM persona p, rol r where r.idrol = p.rolid and r.nombrerol IN  ('Especialista SIAP', 'Potencializador de Ventas Digitales')";

        $request = $this->select_all($sql);

        return $request;
    }




    public function selectLeads() // funcion para cargar los leads en la tabla dji

    {
        $array = $_SESSION['userData']; // datos del rol de usuario

        if ($array['nombrerol'] == 'Administrador' or $array['nombrerol'] == 'Coordinadora CAP' or $array['nombrerol'] == 'Potencializador de Ventas Digitales') {

            $sql = "SELECT 
            *
        FROM
            tm_servicio s,
            persona p
        WHERE
            s.usu_asig = p.idpersona AND s.est != 11
        ORDER BY s.usu_id DESC";
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
		s.usu_id,
        s.usu_fac,
        s.usu_jdl,
        s.usu_nom,
        s.usu_tel,
        s.usu_cor,
        s.usu_dir,
        s.usu_ciu,
        s.usu_est,
        s.usu_ser,
        s.usu_mod,
        s.usu_div,
        s.usu_com,
        s.est,
        s.usu_asig,
        s.act,
        CONCAT_WS(' ', p.nombres, p.apellidos) AS usu_vendedor,
        p.email_user
	FROM
        tm_servicio s,
        persona p
	WHERE
            s.usu_asig = p.idpersona AND s.est != 11
			AND s.usu_id  = {$iddatos}";

        $request = $this->select($sql);

        return $request;
    }







    public function deleteServicio(int $intIdpersona)

    {

        $this->intIdUsuario = $intIdpersona;

        $sql = "UPDATE tm_servicio SET est = 11 WHERE usu_id = $this->intIdUsuario ";

        $arrData = array(0);

        $request = $this->delete($sql, $arrData);

        return $request;
    }



    public function startServicio(int $intIdpersona)

    {

        $this->intIdUsuario = $intIdpersona;

        $sql = "UPDATE tm_servicio SET est = 3 WHERE usu_id = $this->intIdUsuario ";

        $arrData = array(0);

        $request = $this->delete($sql, $arrData);

        return $request;
    }



    public function atenderServicio(int $intIdpersona)

    {

        $this->intIdUsuario = $intIdpersona;

        $sql = "UPDATE tm_servicio SET est = 3 WHERE usu_id = $this->intIdUsuario ";

        $arrData = array(0);

        $request = $this->delete($sql, $arrData);

        return $request;
    }



    public function canalizarServicio(int $intIdpersona)

    {

        $this->intIdUsuario = $intIdpersona;

        $sql = "UPDATE tm_servicio SET est = 0 WHERE usu_id = $this->intIdUsuario ";

        $arrData = array(0);

        $request = $this->delete($sql, $arrData);

        return $request;
    }



    public function demoServicio(int $intIdpersona)

    {

        $this->intIdUsuario = $intIdpersona;

        $sql = "UPDATE tm_servicio SET est = 4 WHERE usu_id = $this->intIdUsuario ";

        $arrData = array(0);

        $request = $this->delete($sql, $arrData);

        return $request;
    }



    public function negociarServicio(int $intIdpersona)

    {

        $this->intIdUsuario = $intIdpersona;

        $sql = "UPDATE tm_servicio SET est = 7 WHERE usu_id = $this->intIdUsuario ";

        $arrData = array(0);

        $request = $this->delete($sql, $arrData);

        return $request;
    }



    public function comprarServicio(int $intIdpersona)

    {

        $this->intIdUsuario = $intIdpersona;

        $sql = "UPDATE tm_servicio SET est = 6 WHERE usu_id = $this->intIdUsuario ";

        $arrData = array(0);

        $request = $this->delete($sql, $arrData);

        return $request;
    }



    public function offServicio(int $intIdpersona)

    {

        $this->intIdUsuario = $intIdpersona;

        $sql = "UPDATE tm_servicio SET act = 2 WHERE usu_id = $this->intIdUsuario ";

        $arrData = array(0);

        $request = $this->delete($sql, $arrData);

        return $request;
    }

    public function onServicio(int $intIdpersona)

    {

        $this->intIdUsuario = $intIdpersona;

        $sql = "UPDATE tm_servicio SET act = 1 WHERE usu_id = $this->intIdUsuario ";

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
