<!-- Modal -->
<?php $idUsuario = $_SESSION['idUser']; // id del usuario para mostrar los leads de cada vendedor 
/*
$server = 'localhost';
$user = 'root';
$password = '';
$bd = 'dima';

$conexion = new mysqli($server, $user, $password, $bd);

if ($conexion->connect_error) {
  die('Error en la conexion' . $conexion->connect_error);
}

$sql = "SELECT p.idpersona ,CONCAT_WS(' ', p.nombres, p.apellidos) nombre FROM persona p, rol r where r.idrol = p.rolid and r.nombrerol = 'Especialista SIAP'";
$exehb = $conexion->query($sql);

*/

$array = $_SESSION['userData']; // variable de sesion desde login


/// correo

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function

/*
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;






//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
  //Server settings
  $mail->SMTPDebug = 2;                      //Enable verbose debug output
  $mail->isSMTP();                                            //Send using SMTP
  $mail->Host       = 'mail.dimasur.com.mx';                     //Set the SMTP server to send through
  $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
  $mail->Username   = 'zaldivarcristobal@dimasur.com.mx';                     //SMTP username
  $mail->Password   = 'mLvBpDjPHq';                               //SMTP password
  $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
  $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

  //Recipients
  $mail->setFrom('zaldivarcristobal@dimasur.com.mx', 'Dimanet');
  $mail->addAddress('cristobalzaldivar0101@gmail.com');     //Add a recipient
  //$mail->addAddress('zaldivarcristobal@dimasur.com.mx');               //Name is optional
  



  //Content
  $mail->isHTML(true);                                  //Set email format to HTML
  $mail->Subject = 'Nuevo lead asignado';
  $mail->Body    = 'Tienes un nuevo leads agregado  <b>in bold!</b>';
  

  $mail->send();
 // echo 'Enviado';
} catch (Exception $e) {
 // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


*/







?>

<div class="modal fade" id="modalFormServicio" tabindex="-1" role="dialog" aria-hidden="true">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            <div class="modal-header headerRegister">

                <h5 class="modal-title" id="titleModal">Nuevo Lead </h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

            </div>

            <div class="modal-body">

                <form id="formServicio" name="formServicio" class="form-horizontal">

                    <input type="hidden" id="usu_id" name="usu_id">

                    <input type="hidden" id="usu_vendedor_copia" name="usu_vendedor_copia">

                    <p class="text-primary">Todos los campos son obligatorios servicio <?php echo $array['nombrerol']; ?> </p>



                    <div class="form-row">

                        <div class="form-group col-lg-4">

                            <label for="usu_fac">¿Requiere facturacion del servicio?</label>

                            <select class="form-control" name="usu_fac" id="usu_fac">
                                <option value="SI">SI</option>
                                <option value="NO">NO</option>
                            </select>



                        </div>

                        <div class="form-group col-lg-4">

                            <label for="usu_jdl">¿utiliza el sistema de monitoreo Jdlink?</label>
                            <select class="form-control" name="usu_jdl" id="usu_jdl">
                                <option value="SI">SI</option>
                                <option value="NO">NO</option>
                            </select>
                        </div>

                        <div class="form-group col-lg-4">

                            <label for="usu_suc">Sucursal</label>
                            <select name="usu_suc" class="form-control" id="usu_suc">
                                <option value="Pendiente">Pendiente</option>
                                <option value="Acayucan">Acayucan</option>
                                <option value="Campeche">Campeche</option>
                                <option value="Cancun">Cancun</option>
                                <option value="Comitan">Comitan</option>
                                <option value="Chetumal">Chetumal</option>
                                <option value="Isla">Isla</option>
                                <option value="Merida">Merida</option>
                                <option value="Tapachula">Tapachula</option>
                                <option value="TierraBlanca">Tierra blanca</option>
                                <option value="Tizimin">Tizimin</option>
                                <option value="Tuxtepec">Tuxtepec</option>
                                <option value="Tuxtla">Tuxtla</option>
                                <option value="Veracruz">Veracruz</option>
                                <option value="VillaHermosa">Villa hermosa</option>
                                <option value="Zapata">Zapata</option>
                            </select>


                        </div>

                    </div>

                    <div class="form-row">

                        <div class="form-group col-lg-4">

                            <label for="usu_nom">Nombre o Razon social</label>

                            <input type="text" class="form-control " id="usu_nom" name="usu_nom">

                        </div>

                        <div class="form-group col-lg-4">

                            <label for="usu_tel">Telefono de contacto</label>

                            <input type="text" class="form-control valid validNumber" id="usu_tel" name="usu_tel" required>

                        </div>

                        <div class="form-group col-lg-4">

                            <label for="usu_cor">Correo</label>

                            <input type="email" class="form-control" id="usu_cor" name="usu_cor" required>

                        </div>

                    </div>

                    <!-- </div> -->

                    <div class="form-row">

                        <div class="form-group col-md-4">

                            <label for="usu_dir">Direccion o ubicacion del cliente</label>

                            <input type="text" class="form-control" id="usu_dir" name="usu_dir">

                        </div>

                        <div class="form-group col-md-4">

                            <label for="usu_ciu">Ciudad de origen</label>

                            <input type="text" class="form-control" id="usu_ciu" name="usu_ciu">

                        </div>

                        <div class="form-group col-md-4">

                            <label for="usu_est">Estado:</label>

                            <select name="usu_est"  class="form-control" id="usu_est">
                                <option value="aguascalientes">Aguascalientes</option>
                                <option value="bajacalifornia">Baja California</option>
                                <option value="bajacaliforniasur">Baja California Sur</option>
                                <option value="campeche">Campeche</option>
                                <option value="chiapas">Chiapas</option>
                                <option value="chihuahua">Chihuahua</option>
                                <option value="coahuila">Coahuila</option>
                                <option value="colima">Colima</option>
                                <option value="ciudaddemexico">Ciudad de México</option>
                                <option value="durango">Durango</option>
                                <option value="guanajuato">Guanajuato</option>
                                <option value="guerrero">Guerrero</option>
                                <option value="hidalgo">Hidalgo</option>
                                <option value="jalisco">Jalisco</option>
                                <option value="mexico">México</option>
                                <option value="michoacan">Michoacán</option>
                                <option value="morelos">Morelos</option>
                                <option value="nayarit">Nayarit</option>
                                <option value="nuevoleon">Nuevo León</option>
                                <option value="oaxaca">Oaxaca</option>
                                <option value="puebla">Puebla</option>
                                <option value="queretaro">Querétaro</option>
                                <option value="quintanaroo">Quintana Roo</option>
                                <option value="sanluispotosi">San Luis Potosí</option>
                                <option value="sinaloa">Sinaloa</option>
                                <option value="sonora">Sonora</option>
                                <option value="tabasco">Tabasco</option>
                                <option value="tamaulipas">Tamaulipas</option>
                                <option value="tlaxcala">Tlaxcala</option>
                                <option value="veracruz">Veracruz</option>
                                <option value="yucatan">Yucatán</option>
                                <option value="zacatecas">Zacatecas</option>

                            </select>

                            

                        </div>

                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-4">

                            <label for="usu_ser">Numero de serie del equipo</label>

                            <input type="text" class="form-control" id="usu_ser" name="usu_ser" required>

                        </div>

                        <div class="form-group col-md-4">

                            <label for="usu_mod">Modelo del equipo</label>

                            <input type="text" class="form-control" id="usu_mod" name="usu_mod" required>

                        </div>


                        <div class="form-group col-md-4">




                            <label for="usu_div">Division</label>
                            <select class="form-control" name="usu_div" id="usu_div">
                            <option value="agricola">Agricola</option>
                            <option value="construccion">Construcción</option>
                            <option value="jardineriaygolf">Jardineria y Golf</option>

                            </select>







                            <!--  <input type="text" class="form-control" id="usu_vendedor" name="usu_vendedor"> -->

                        </div>

                    </div>



                    <div class="form-row">

                        <div class="form-group col-md-12">

                            <label for="usu_com">Descripcion del servicio solicitado</label>

                            <textarea type="text" class="form-control" id="usu_com" name="usu_com"></textarea>

                        </div>

                    </div>

                    <div class="tile-footer">

                        <button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;

                        <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>





<!--View--->



<div class="modal fade" id="modalViewDji" tabindex="-1" role="dialog" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header header-primary">

                <h5 class="modal-title" id="titleModal">Datos del contacto</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

            </div>

            <div class="modal-body">

                <table class="table table-bordered">

                    <tbody>

                        <tr>

                            <td>Equipo:</td>

                            <td id="txtEquipo"></td>

                        </tr>

                        <tr>

                            <td>Estatus:</td>

                            <td id="txtStatus"></td>

                        </tr>

                        <tr>

                            <td>Nombre:</td>

                            <td id="txtNombre"></td>

                        </tr>

                        <tr>

                            <td>Correo:</td>

                            <td id="txtCorreo"></td>

                        </tr>

                        <tr>

                            <td>Telefono:</td>

                            <td id="txtTelefono"></td>

                        </tr>

                        <tr>

                            <td>Ciudad:</td>

                            <td id="txtCiudad"></td>

                        </tr>

                        <tr>

                            <td>Número de hectáreas:</td>

                            <td id="txtHectareas"></td>

                        </tr>

                        <tr>

                            <td>Tipo de cultivo:</td>

                            <td id="txtCultivo"></td>

                        </tr>

                        <tr>

                            <td>Campaña:</td>

                            <td id="txtCampaña"></td>

                        </tr>

                        <tr>

                            <td>Vendedor:</td>

                            <td id="txtVendedor"></td>

                        </tr>

                        <tr>

                            <td>Comentarios:</td>

                            <td id="txtComentarios"></td>

                        </tr>



                    </tbody>

                </table>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

            </div>

        </div>

    </div>

</div>