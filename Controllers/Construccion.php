<?php 



	class Construccion extends Controllers{

		public function __construct()

		{

			parent::__construct();

			session_start();

			if(empty($_SESSION['login']))

			{

				header('Location: '.base_url().'/login');

				die();

			}

			getPermisos(MDCONSTRUCCION);

		}



		public function Construccion()

		{

			if(empty($_SESSION['permisosMod']['r'])){

				header("Location:".base_url().'/dashboard');

			}

			$data['page_tag'] = "construccion";

			$data['page_title'] = "Construccion <small>Tienda Virtual</small>";

			$data['page_name'] = "Leads Construccion";

			$data['page_functions_js'] = "functions_construccion.js";

			$this->views->getView($this,"construccion",$data);

		}



		//Guardar y editar

		public function setLead(){

			if($_POST){			

				if(empty($_POST['usu_nom']) || empty($_POST['usu_city']) || empty($_POST['usu_canal']))

				{

					$arrResponse = array("status" => false, "msg" => 'Datos incorrectos.');

				}else{ 

					$idUsuario = intval($_POST['usu_id']);

					$strmaq = ucwords(strClean($_POST['usu_maq']));

					$strNombre = ucwords(strClean($_POST['usu_nom']));

					$strCiudad = ucwords(strClean($_POST['usu_city']));

					$strSucursal = ucwords(strClean($_POST['usu_sucursal']));

					$intTelefono = intval(strClean($_POST['usu_num']));

					$strEmail = strtolower(strClean($_POST['usu_correo']));

					$strCanal = ucwords(strClean($_POST['usu_canal']));

					$strVendedor = ucwords(strClean($_POST['usu_vendedor']));

					$strComentarios = ucwords(strClean($_POST['usu_cmt']));

					$request_user = "";

					if($idUsuario == 0)

					{

						$option = 1;



						if($_SESSION['permisosMod']['w']){

							$request_user = $this->model->insertUsuario(
																				$strmaq,

																				$strNombre,

																				$strEmail,

																				$strSucursal,

																				$intTelefono, 

																				$strCiudad, 

																				$strCanal,

																				$strVendedor,

																				$strComentarios);

						}

					}else{

						$option = 2;

						if($_SESSION['permisosMod']['u']){

							$request_user = $this->model->updateUsuario($idUsuario,
							
																				$strmaq,

																				$strNombre, 

																				$strEmail,

																				$strSucursal,

																				$intTelefono, 

																				$strCiudad, 

																				$strCanal,

																				$strVendedor,

																				$strComentarios);

						}



					}



					if($request_user > 0 )

					{

						if($option == 1){

							$arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');

						}else{

							$arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');

						}

					}else if($request_user == 'exist'){

						$arrResponse = array('status' => false, 'msg' => '¡Atención! el email o la identificación ya existe, ingrese otro.');		

					}else{

						$arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');

					}

				}

				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);

			}

			die();

		}

		

		

		//End guardar y editar



		public function getLeads(){

			if($_SESSION['permisosMod']['r']){

				$arrData = $this->model->selectLeads();

				for ($i=0; $i < count($arrData) ; $i++) { 

					$btnView = '';

					$btnEdit = '';

					$btnDelete = ''; 

					if($arrData[$i]['est'] == 1)

					{

						$arrData[$i]['est'] = '<span id="boton-status" class="boton-status badge badge-info" style="margin-left: 20px; margin-bottom: 8px;">No Atendido</span><br>

						<button class="btn btn-outline-success btn-sm btnStatus" style="margin-left: 40px; margin-top: 2px;" onClick="startStatus('.$arrData[$i]['usu_id'].')" title="Iniciar Atención"><i class="fa fa-play" aria-hidden="true"></i>

						</button>';

					}else if($arrData[$i]['est'] == 0){

						$arrData[$i]['est'] = '<span id="boton-status" class="boton-status badge badge-dark" style="margin-left: 20px; margin-bottom: 8px;">Canalizado</span><br>

						<button class="btn btn-dark btn-sm btnStatus" style="margin-left: 20px;" onClick="canalizarStatus('.$arrData[$i]['usu_id'].')" title="Iniciar Canalización"><i class="fa fa-user-o" aria-hidden="true"></i></button>

						<button class="btn btn-outline-danger btn-sm btnStatus" onClick="demoStatus('.$arrData[$i]['usu_id'].')" title="Iniciar Demostración"><i class="fa fa-calendar" aria-hidden="true"></i></button>

						<button class="btn btn-outline-warning btn-sm btnStatus" style="margin-left: 20px; margin-top: 2px;" onClick="cotizarStatus('.$arrData[$i]['usu_id'].')" title="Iniciar Negociación"><i class="fa fa-briefcase" aria-hidden="true"></i></button>

						<button class="btn btn-outline-success btn-sm btnStatus" style="margin-top: 2px;" onClick="comprarStatus('.$arrData[$i]['usu_id'].')" title="Iniciar Compra"><i class="fa fa-money" aria-hidden="true"></i></button> <br>

						<button class="btn btn-outline-secondary btn-sm btnStatus" style="margin-left: 35px; margin-top: 2px;" onClick="offStatus('.$arrData[$i]['usu_id'].')" title="Apagar Lead"><i class="fa fa-toggle-off" aria-hidden="true"></i></button>';



						if($arrData[$i]['act'] == 2){

							$arrData[$i]['est'] = '<span id="boton-status" class="boton-status badge badge-dark" style="margin-left: 20px; margin-bottom: 8px;">Canalizado</span><br>

							<button class="btn btn-dark btn-sm btnStatus" style="margin-left: 20px;" onClick="canalizarStatus('.$arrData[$i]['usu_id'].')" title="Iniciar Canalización" disabled><i class="fa fa-user-o" aria-hidden="true"></i></button>

							<button class="btn btn-outline-danger btn-sm btnStatus" onClick="demoStatus('.$arrData[$i]['usu_id'].')" title="Iniciar Demostración" disabled><i class="fa fa-calendar" aria-hidden="true"></i></button>

							<button class="btn btn-outline-warning btn-sm btnStatus" style="margin-left: 20px; margin-top: 2px;" onClick="cotizarStatus('.$arrData[$i]['usu_id'].')" title="Iniciar Negociación" disabled><i class="fa fa-briefcase" aria-hidden="true"></i></button>

							<button class="btn btn-outline-success btn-sm btnStatus" style="margin-top: 2px;" onClick="comprarStatus('.$arrData[$i]['usu_id'].')" title="Iniciar Compra" disabled><i class="fa fa-money" aria-hidden="true"></i></button> <br>

							<button class="btn btn-outline-success btn-sm btnStatus" style="margin-left: 30px; margin-top: 2px;" onClick="onStatus('.$arrData[$i]['usu_id'].')" title="Encender Lead"><i class="fa fa-toggle-on" aria-hidden="true"></i></button>';

						}

						





					}else if($arrData[$i]['est'] == 2){

						$arrData[$i]['est'] = '<span id="boton-status" class="boton-status badge badge-dark">No viable</span>';



					}else if($arrData[$i]['est'] == 3){

						$arrData[$i]['est'] = '<span id="boton-status" class="boton-status badge badge-info" style="margin-left: 20px; margin-bottom: 8px;">Atendido</span><br>

						<button class="btn btn-outline-dark btn-sm btnStatus" style="margin-left: 20px;" onClick="canalizarStatus('.$arrData[$i]['usu_id'].')" title="Iniciar Canalización"><i class="fa fa-user-o" aria-hidden="true"></i></button>

						<button class="btn btn-outline-danger btn-sm btnStatus" onClick="demoStatus('.$arrData[$i]['usu_id'].')" title="Iniciar Demostración"><i class="fa fa-calendar" aria-hidden="true"></i></button><br>

						<button class="btn btn-outline-warning btn-sm btnStatus" style="margin-left: 20px; margin-top: 2px;" onClick="cotizarStatus('.$arrData[$i]['usu_id'].')" title="Iniciar Negociación"><i class="fa fa-briefcase" aria-hidden="true"></i></button>

						<button class="btn btn-outline-success btn-sm btnStatus" style="margin-top: 2px;" onClick="comprarStatus('.$arrData[$i]['usu_id'].')" title="Iniciar Compra"><i class="fa fa-money" aria-hidden="true"></i></button> <br>

						<button class="btn btn-outline-secondary btn-sm btnStatus" style="margin-left: 35px; margin-top: 2px;" onClick="offStatus('.$arrData[$i]['usu_id'].')" title="Apagar Lead"><i class="fa fa-toggle-off" aria-hidden="true"></i></button>';



						if($arrData[$i]['act'] == 2){

							$arrData[$i]['est'] = '<span id="boton-status" class="boton-status badge badge-info" style="margin-left: 20px; margin-bottom: 8px;">Atendido</span>

							<button class="btn btn-outline-dark btn-sm btnStatus" style="margin-left: 20px;" onClick="canalizarStatus('.$arrData[$i]['usu_id'].')" title="Iniciar Canalizaciónción" disabled><i class="fa fa-user-o" aria-hidden="true"></i></button>

							<button class="btn btn-outline-danger btn-sm btnStatus" onClick="demoStatus('.$arrData[$i]['usu_id'].')" title="Iniciar Demostracióncion" disabled><i class="fa fa-calendar" aria-hidden="true"></i></button><br>

							<button class="btn btn-outline-warning btn-sm btnStatus" style="margin-left: 20px; margin-top: 2px;" onClick="cotizarStatus('.$arrData[$i]['usu_id'].')" title="Iniciar Negociación" disabled><i class="fa fa-briefcase" aria-hidden="true"></i></button>

							<button class="btn btn-outline-success btn-sm btnStatus" style="margin-top: 2px;" onClick="comprarStatus('.$arrData[$i]['usu_id'].')" title="Iniciar Compra" disabled><i class="fa fa-money" aria-hidden="true"></i></button> <br>

							<button class="btn btn-outline-success btn-sm btnStatus" style="margin-left: 30px; margin-top: 2px;" onClick="onStatus('.$arrData[$i]['usu_id'].')" title="Encender Lead"><i class="fa fa-toggle-on" aria-hidden="true"></i></button>';

						}

						



					}else if($arrData[$i]['est'] == 4){

						$arrData[$i]['est'] = '<span id="boton-status" class="boton-status badge badge-danger" style="margin-left: 20px; margin-bottom: 8px;">En demo</span><br>

						<button class="btn btn-outline-dark btn-sm btnStatus" style="margin-left: 20px;" onClick="canalizarStatus('.$arrData[$i]['usu_id'].')" title="Iniciar Canalización"><i class="fa fa-user-o" aria-hidden="true"></i></button>

						<button class="btn btn-danger btn-sm btnStatus" onClick="demoStatus('.$arrData[$i]['usu_id'].')" title="Iniciar Demostración"><i class="fa fa-calendar" aria-hidden="true"></i></button>

						<button class="btn btn-outline-warning btn-sm btnStatus" style="margin-left: 20px; margin-top: 2px;" onClick="cotizarStatus('.$arrData[$i]['usu_id'].')" title="Iniciar Negociación"><i class="fa fa-briefcase" aria-hidden="true"></i></button>

						<button class="btn btn-outline-success btn-sm btnStatus" style="margin-top: 2px;" onClick="comprarStatus('.$arrData[$i]['usu_id'].')" title="Iniciar Atención"><i class="fa fa-money" aria-hidden="true"></i></button><br>

						<button class="btn btn-outline-secondary btn-sm btnStatus" style="margin-left: 35px; margin-top: 2px;" onClick="offStatus('.$arrData[$i]['usu_id'].')" title="Apagar lead"><i class="fa fa-toggle-off" aria-hidden="true"></i></button>';



						if($arrData[$i]['act'] == 2) {

							$arrData[$i]['est'] = '<span id="boton-status" class="boton-status badge badge-danger" style="margin-left: 20px; margin-bottom: 8px;">En demo</span><br>

							<button class="btn btn-outline-dark btn-sm btnStatus" style="margin-left: 20px;" onClick="canalizarStatus('.$arrData[$i]['usu_id'].')" title="Iniciar Canalización" disabled><i class="fa fa-user-o" aria-hidden="true"></i></button>

							<button class="btn btn-danger btn-sm btnStatus" onClick="demoStatus('.$arrData[$i]['usu_id'].')" title="Iniciar Demostración" disabled><i class="fa fa-calendar" aria-hidden="true"></i></button>

							<button class="btn btn-outline-warning btn-sm btnStatus" style="margin-left: 20px; margin-top: 2px;" onClick="cotizarStatus('.$arrData[$i]['usu_id'].')" title="Iniciar Negociación" disabled><i class="fa fa-briefcase" aria-hidden="true"></i></button>

							<button class="btn btn-outline-success btn-sm btnStatus" style="margin-top: 2px;" onClick="comprarStatus('.$arrData[$i]['usu_id'].')" title="Iniciar Atención" disabled><i class="fa fa-money" aria-hidden="true"></i></button><br>

							<button class="btn btn-outline-success btn-sm btnStatus" style="margin-left: 30px; margin-top: 2px;" onClick="onStatus('.$arrData[$i]['usu_id'].')" title="Encender Lead"><i class="fa fa-toggle-on" aria-hidden="true"></i></button>';

						}

						



					}else if($arrData[$i]['est'] == 5){

						$arrData[$i]['est'] = '<span id="boton-status" class="boton-status badge badge-secondary">No compró</span>

						<button class="btn btn-outline-dark btn-sm btnStatus" style="margin-left: 16px;" onClick="canalizarStatus('.$arrData[$i]['usu_id'].')" title="Iniciar Canalización">1</button>

						<button class="btn btn-outline-danger btn-sm btnStatus" onClick="demoStatus('.$arrData[$i]['usu_id'].')" title="Iniciar Demostración"><i class="fa fa-calendar" aria-hidden="true"></i></button>

						<button class="btn btn-outline-warning btn-sm btnStatus" style="margin-left: 16px; margin-top: 2px;" onClick="cotizarStatus('.$arrData[$i]['usu_id'].')" title="Iniciar Negociación"><i class="fa fa-briefcase" aria-hidden="true"></i></button>

						<button class="btn btn-success btn-sm btnStatus" style="margin-top: 2px;" onClick="comprarStatus('.$arrData[$i]['usu_id'].')" title="Iniciar Atención"><i class="fa fa-money" aria-hidden="true"></i></button>';

						



					}else if($arrData[$i]['est'] == 6){

						$arrData[$i]['est'] = '<span id="boton-status" class="boton-status badge badge-success" style="margin-left: 20px; margin-bottom: 8px;">Compró</span><br>

						<button class="btn btn-outline-dark btn-sm btnStatus" style="margin-left: 16px;" onClick="canalizarStatus('.$arrData[$i]['usu_id'].')" title="Iniciar Canalización"><i class="fa fa-user-o" aria-hidden="true"></i></button>

						<button class="btn btn-outline-danger btn-sm btnStatus" onClick="demoStatus('.$arrData[$i]['usu_id'].')" title="Iniciar Demostración"><i class="fa fa-calendar" aria-hidden="true"></i></button><br>

						<button class="btn btn-outline-warning btn-sm btnStatus" style="margin-left: 16px; margin-top: 2px;" onClick="cotizarStatus('.$arrData[$i]['usu_id'].')" title="Iniciar Negociación"><i class="fa fa-briefcase" aria-hidden="true"></i></button>

						<button class="btn btn-success btn-sm btnStatus" style="margin-top: 2px;" onClick="comprarStatus('.$arrData[$i]['usu_id'].')" title="Iniciar Atención"><i class="fa fa-money" aria-hidden="true"></i></button> <br>

						<button class="btn btn-outline-secondary btn-sm btnStatus" style="margin-left: 35px; margin-top: 2px;" onClick="offStatus('.$arrData[$i]['usu_id'].')" title="Apagar lead"><i class="fa fa-toggle-off" aria-hidden="true"></i></button>';



						if($arrData[$i]['act'] == 2) {

							$arrData[$i]['est'] = '<span id="boton-status" class="boton-status badge badge-success" style="margin-left: 20px; margin-bottom: 8px;">Compró</span><br>

							<button class="btn btn-outline-dark btn-sm btnStatus" style="margin-left: 16px;" onClick="canalizarStatus('.$arrData[$i]['usu_id'].')" title="Iniciar Canalización" disabled><i class="fa fa-user-o" aria-hidden="true"></i></button>

							<button class="btn btn-outline-danger btn-sm btnStatus" onClick="demoStatus('.$arrData[$i]['usu_id'].')" title="Iniciar Demostración" disabled><i class="fa fa-calendar" aria-hidden="true"></i></button><br>

							<button class="btn btn-outline-warning btn-sm btnStatus" style="margin-left: 16px; margin-top: 2px;" onClick="cotizarStatus('.$arrData[$i]['usu_id'].')" title="Iniciar Negociación" disabled><i class="fa fa-briefcase" aria-hidden="true"></i></button>

							<button class="btn btn-success btn-sm btnStatus" style="margin-top: 2px;" onClick="comprarStatus('.$arrData[$i]['usu_id'].')" title="Iniciar Atención" disabled><i class="fa fa-money" aria-hidden="true"></i></button> <br>

							<button class="btn btn-outline-success btn-sm btnStatus" style="margin-left: 30px; margin-top: 2px;" onClick="onStatus('.$arrData[$i]['usu_id'].')" title="Encender Lead"><i class="fa fa-toggle-on" aria-hidden="true"></i></button>';

						}



					}else if($arrData[$i]['est'] == 7){

						$arrData[$i]['est'] = '<span id="boton-status" class="boton-status badge badge-warning" style="margin-left: 20px; margin-bottom: 8px;">Negociación</span><br>

						<button class="btn btn-outline-dark btn-sm btnStatus" style="margin-left: 16px;" onClick="canalizarStatus('.$arrData[$i]['usu_id'].')" title="Iniciar Canalización"><i class="fa fa-user-o" aria-hidden="true"></i></button>

						<button class="btn btn-outline-danger btn-sm btnStatus" onClick="demoStatus('.$arrData[$i]['usu_id'].')" title="Iniciar Demostración"><i class="fa fa-calendar" aria-hidden="true"></i></button><br>

						<button class="btn btn-warning btn-sm btnStatus" style="margin-left: 16px; margin-top: 2px;" onClick="cotizarStatus('.$arrData[$i]['usu_id'].')" title="Iniciar Negociación"><i class="fa fa-briefcase" aria-hidden="true"></i></button>

						<button class="btn btn-outline-success btn-sm btnStatus" style="margin-top: 2px;" onClick="comprarStatus('.$arrData[$i]['usu_id'].')" title="Iniciar Atención"><i class="fa fa-money" aria-hidden="true"></i></button> <br>

						<button class="btn btn-outline-secondary btn-sm btnStatus" style="margin-left: 35px; margin-top: 2px;" onClick="offStatus('.$arrData[$i]['usu_id'].')" title="Apagar lead"><i class="fa fa-toggle-off" aria-hidden="true"></i></button>';

						

						if($arrData[$i]['act'] == 2){

							$arrData[$i]['est'] = '<span id="boton-status" class="boton-status badge badge-warning" style="margin-left: 20px; margin-bottom: 8px;">Negociación</span><br>

							<button class="btn btn-outline-dark btn-sm btnStatus" style="margin-left: 16px;" onClick="canalizarStatus('.$arrData[$i]['usu_id'].')" title="Iniciar Canalización" disabled><i class="fa fa-user-o" aria-hidden="true"></i></button>

							<button class="btn btn-outline-danger btn-sm btnStatus" onClick="demoStatus('.$arrData[$i]['usu_id'].')" title="Iniciar Demostración" disabled><i class="fa fa-calendar" aria-hidden="true"></i></button><br>

							<button class="btn btn-warning btn-sm btnStatus" style="margin-left: 16px; margin-top: 2px;" onClick="cotizarStatus('.$arrData[$i]['usu_id'].')" title="Iniciar Negociación" disabled><i class="fa fa-briefcase" aria-hidden="true"></i></button>

							<button class="btn btn-outline-success btn-sm btnStatus" style="margin-top: 2px;" onClick="comprarStatus('.$arrData[$i]['usu_id'].')" title="Iniciar Atención" disabled><i class="fa fa-money" aria-hidden="true"></i></button> <br>

							<button class="btn btn-outline-secondary btn-sm btnStatus" style="margin-left: 35px; margin-top: 2px;" onClick="onStatus('.$arrData[$i]['usu_id'].')" title="Encender lead"><i class="fa fa-toggle-off" aria-hidden="true"></i></button>';

						}



					}



					if($_SESSION['permisosMod']['u']){

							$btnEdit = '<button class="btn btn-primary  btn-sm btnEditUsuario" onClick="fntEditLead(this,'.$arrData[$i]['usu_id'].')" title="Editar usuario"><i class="fas fa-pencil-alt"></i></button>';

						

					}



					if($_SESSION['permisosMod']['r']){

						$btnView = '<button class="btn btn-info btn-sm" style="margin: 2px;" onClick="fntViewInfo('.$arrData[$i]['usu_id'].')" title="Ver mensaje"><i class="far fa-eye"></i></button>';

					}



					if($_SESSION['permisosMod']['d']){

							$btnDelete = '<button class="btn btn-danger btn-sm btnDelUsuario" onClick="fntDelUsuario('.$arrData[$i]['usu_id'].')" title="Eliminar usuario"><i class="far fa-trash-alt"></i></button>';

					}

					

					$arrData[$i]['options'] = '<div class="text-center">'.$btnView.' '.$btnEdit.' '.$btnDelete.'</div>';

				}

				echo json_encode($arrData,JSON_UNESCAPED_UNICODE);

			}

			die();

		}





		public function delConstruccion()

		{

			if($_POST){

				if($_SESSION['permisosMod']['d']){

					$intIdpersona = intval($_POST['usu_id']);

					$requestDelete = $this->model->deleteUsuario($intIdpersona);

					if($requestDelete)

					{

						$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el usuario');

					}else{

						$arrResponse = array('status' => false, 'msg' => 'Error al eliminar el usuario.');

					}

					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);

				}

			}

			die();

		}



		public function startConstruccion()

		{

			if($_POST){

				if($_SESSION['permisosMod']['u']){

					$intIdpersona = intval($_POST['usu_id']);

					$requestDelete = $this->model->startConstruccion($intIdpersona);

					if($requestDelete)

					{

						$arrResponse = array('status' => true, 'msg' => 'Se ha iniciado la comunicación');

					}else{

						$arrResponse = array('status' => false, 'msg' => 'Error al canalizar al usuario.');

					}

					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);

				}

			}

			die();

		}

		public function atenderConstruccion()

		{

			if($_POST){

				if($_SESSION['permisosMod']['u']){

					$intIdpersona = intval($_POST['usu_id']);

					$requestDelete = $this->model->atenderConstruccion($intIdpersona);

					if($requestDelete)

					{

						$arrResponse = array('status' => true, 'msg' => 'Se ha atendido correctamente');

					}else{

						$arrResponse = array('status' => false, 'msg' => 'Error al atender al usuario.');

					}

					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);

				}

			}

			die();

		}



		public function canalizarConstruccion()

		{

			if($_POST){

				if($_SESSION['permisosMod']['u']){

					$intIdpersona = intval($_POST['usu_id']);

					$requestDelete = $this->model->canalizarConstruccion($intIdpersona);

					if($requestDelete)

					{

						$arrResponse = array('status' => true, 'msg' => 'Se ha canalizado correctamente');

					}else{

						$arrResponse = array('status' => false, 'msg' => 'Error al canalizar al usuario.');

					}

					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);

				}

			}

			die();

		}



		public function demoConstruccion()

		{

			if($_POST){

				if($_SESSION['permisosMod']['u']){

					$intIdpersona = intval($_POST['usu_id']);

					$requestDelete = $this->model->demoConstruccion($intIdpersona);

					if($requestDelete)

					{

						$arrResponse = array('status' => true, 'msg' => 'Se ha agendado un demostración');

					}else{

						$arrResponse = array('status' => false, 'msg' => 'Error al agendar la demostración.');

					}

					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);

				}

			}

			die();

		}



		public function cotizarConstruccion()

		{

			if($_POST){

				if($_SESSION['permisosMod']['u']){

					$intIdpersona = intval($_POST['usu_id']);

					$requestDelete = $this->model->cotizarConstruccion($intIdpersona);

					if($requestDelete)

					{

						$arrResponse = array('status' => true, 'msg' => 'Se ha generado la cotización');

					}else{

						$arrResponse = array('status' => false, 'msg' => 'Error al generar la cotización.');

					}

					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);

				}

			}

			die();

		}



		public function comprarConstruccion()

		{

			if($_POST){

				if($_SESSION['permisosMod']['u']){

					$intIdpersona = intval($_POST['usu_id']);

					$requestDelete = $this->model->comprarConstruccion($intIdpersona);

					if($requestDelete)

					{

						$arrResponse = array('status' => true, 'msg' => 'El cliente ha comprado');

					}else{

						$arrResponse = array('status' => false, 'msg' => 'Error al registrar la compra.');

					}

					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);

				}

			}

			die();

		}



		public function offConstruccion()

		{

			if($_POST){

				if($_SESSION['permisosMod']['u']){

					$intIdpersona = intval($_POST['usu_id']);

					$requestDelete = $this->model->offConstruccion($intIdpersona);

					if($requestDelete)

					{

						$arrResponse = array('status' => true, 'msg' => 'El seguimiento del lead ha finalizado');

					}else{

						$arrResponse = array('status' => false, 'msg' => 'Error al registrar el seguimiento del lead.');

					}

					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);

				}

			}

			die();

		}


		public function onConstruccion()

		{

			if($_POST){

				if($_SESSION['permisosMod']['u']){

					$intIdpersona = intval($_POST['usu_id']);

					$requestDelete = $this->model->onConstruccion($intIdpersona);

					if($requestDelete)

					{

						$arrResponse = array('status' => true, 'msg' => 'El seguimiento del lead ha continuado');

					}else{

						$arrResponse = array('status' => false, 'msg' => 'Error al registrar el seguimiento del lead.');

					}

					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);

				}

			}

			die();

		}



		public function getDatos($iddatos){

			if($_SESSION['permisosMod']['r']){

				$idmensaje = intval($iddatos);

				if($idmensaje > 0){

					$arrData = $this->model->selectDatos($idmensaje);

					

					if($arrData['est'] == 1)

					{

						$arrData['est'] = '<span class="badge badge-danger">No canalizado</span>';

					}else if($arrData['est'] == 0){

						$arrData['est'] = '<span class="badge badge-dark">Canalizado</span>';

					}else if($arrData['est'] == 2){

						$arrData['est'] = '<span class="badge badge-dark">No viable</span>';

					}else if($arrData['est'] == 3){

						$arrData['est'] = '<span class="badge badge-info">Atendido</span>';

					}else if($arrData['est'] == 4){

						$arrData['est'] = '<span class="badge badge-danger">En demo</span>';

					}else if($arrData['est'] == 5){

						$arrData['est'] = '<span class="badge badge-secondary">No compró</span>';

					}else if($arrData['est'] == 6){

						$arrData['est'] = '<span class="badge badge-success">Compró</span>';

					}else if($arrData['est'] == 7){

						$arrData['est'] = '<span class="badge badge-warning">Cotizado</span>';

					}



					if(empty($arrData)){

						$arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');

					}else{

						$arrResponse = array('status' => true, 'data' => $arrData);

					}

					echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);

				}

			}

			die();

		}



	}
