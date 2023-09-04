<?php 
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



 

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';  

$nombre = "";
$correo = "";
$maquina ="";

if($_GET['datos']){

  $nombre = $_GET['datos'];
  $correo = $_GET['correo'];
  $maquina = $_GET['equipo'];
}

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
  //Server settings
  $mail->SMTPDebug = 0;                      //Enable verbose debug output
  $mail->isSMTP();                                            //Send using SMTP
  $mail->Host       = 'dimanet.dimasur.mx';                     //Set the SMTP server to send through
  $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
  $mail->Username   = 'notificaciones@dimanet.dimasur.mx';                     //SMTP username
  $mail->Password   = 'pRQMlg4gAaRK';                               //SMTP password
  $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
  $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

  //Recipients
  $mail->setFrom('notificaciones@dimanet.dimasur.mx', 'Dimanet');
  $mail->addAddress($correo);     //Add a recipient
  //$mail->addAddress('cristobalzaldivar0101@gmail.com');            //Name is optional
  



  //Content
  $mail->isHTML(true);                                  //Set email format to HTML
  $mail->Subject = 'Nuevo lead asignado';
  $mail->Body    = 'Hola! '.$nombre.' Tienes un nuevo lead asignado.'.'<br>Equipo:'.$maquina. "<br> Inicia sesion con tu correo <a href = 'https://dimanet.dimasur.mx//login'>Aqui </a> ";
  

  $mail->send();
  
  $arrResponse = array('status' => true, 'msg' => '¡Correo enviado!');

  echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);

} catch (Exception $e) {

  $arrResponse = array('status' => false, 'msg' => '¡No se pudo enviar el correo!');

  echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);

}





?>