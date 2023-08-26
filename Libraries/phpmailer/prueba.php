<?php 
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;




require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php'; 

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
  //Server settings
  $mail->SMTPDebug = 2;                      //Enable verbose debug output
  $mail->isSMTP();                                            //Send using SMTP
  $mail->Host       = 'mail.dimasur.mx';                     //Set the SMTP server to send through
  $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
  $mail->Username   = 'notificaciones@dimasur.mx';                     //SMTP username
  $mail->Password   = 'L-=0T7m6@VU{';                               //SMTP password
  $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
  $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

  //Recipients
  $mail->setFrom('notificaciones@dimasur.mx', 'Avisos');
  $mail->addAddress('cristobalzaldivar0101@gmail.com');     //Add a recipient
  $mail->addAddress('zaldivarcristobal@dimasur.com.mx');               //Name is optional
  



  //Content
  $mail->isHTML(true);                                  //Set email format to HTML
  $mail->Subject = 'Pruebas';
  $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
  

  $mail->send();
  echo 'Enviado';
} catch (Exception $e) {
  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


?>