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
$maquina = "";



//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);



if (isset($_GET['datos'])) { // get para enviar correo a vendedores

  $nombre = $_GET['datos'];
  $correo = $_GET['correo'];
  $maquina = $_GET['equipo'];
  $NomCli = $_GET['NomCli'];
  $CiuClie = $_GET['CiuClie'];

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
    $mail->addAddress('cristobalzaldivar0101@gmail.com');
    //Name is optional


    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');




    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Nuevo lead asignado';
    $mail->Body    = ' <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
    <html>
      <head>
        <!-- Compiled with Bootstrap Email version: 1.3.1 -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="x-apple-disable-message-reformatting">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="format-detection" content="telephone=no, date=no, address=no, email=no">
        <style type="text/css">
          body,table,td{font-family:Helvetica,Arial,sans-serif !important}.ExternalClass{width:100%}.ExternalClass,.ExternalClass p,.ExternalClass span,.ExternalClass font,.ExternalClass td,.ExternalClass div{line-height:150%}a{text-decoration:none}*{color:inherit}a[x-apple-data-detectors],u+#body a,#MessageViewBody a{color:inherit;text-decoration:none;font-size:inherit;font-family:inherit;font-weight:inherit;line-height:inherit}img{-ms-interpolation-mode:bicubic}table:not([class^=s-]){font-family:Helvetica,Arial,sans-serif;mso-table-lspace:0pt;mso-table-rspace:0pt;border-spacing:0px;border-collapse:collapse}table:not([class^=s-]) td{border-spacing:0px;border-collapse:collapse}@media screen and (max-width: 600px){.w-lg-48,.w-lg-48>tbody>tr>td{width:auto !important}.w-full,.w-full>tbody>tr>td{width:100% !important}.w-16,.w-16>tbody>tr>td{width:64px !important}.p-lg-10:not(table),.p-lg-10:not(.btn)>tbody>tr>td,.p-lg-10.btn td a{padding:0 !important}.p-2:not(table),.p-2:not(.btn)>tbody>tr>td,.p-2.btn td a{padding:8px !important}.pr-4:not(table),.pr-4:not(.btn)>tbody>tr>td,.pr-4.btn td a,.px-4:not(table),.px-4:not(.btn)>tbody>tr>td,.px-4.btn td a{padding-right:16px !important}.pl-4:not(table),.pl-4:not(.btn)>tbody>tr>td,.pl-4.btn td a,.px-4:not(table),.px-4:not(.btn)>tbody>tr>td,.px-4.btn td a{padding-left:16px !important}.pr-6:not(table),.pr-6:not(.btn)>tbody>tr>td,.pr-6.btn td a,.px-6:not(table),.px-6:not(.btn)>tbody>tr>td,.px-6.btn td a{padding-right:24px !important}.pl-6:not(table),.pl-6:not(.btn)>tbody>tr>td,.pl-6.btn td a,.px-6:not(table),.px-6:not(.btn)>tbody>tr>td,.px-6.btn td a{padding-left:24px !important}.pt-8:not(table),.pt-8:not(.btn)>tbody>tr>td,.pt-8.btn td a,.py-8:not(table),.py-8:not(.btn)>tbody>tr>td,.py-8.btn td a{padding-top:32px !important}.pb-8:not(table),.pb-8:not(.btn)>tbody>tr>td,.pb-8.btn td a,.py-8:not(table),.py-8:not(.btn)>tbody>tr>td,.py-8.btn td a{padding-bottom:32px !important}*[class*=s-lg-]>tbody>tr>td{font-size:0 !important;line-height:0 !important;height:0 !important}.s-4>tbody>tr>td{font-size:16px !important;line-height:16px !important;height:16px !important}.s-6>tbody>tr>td{font-size:24px !important;line-height:24px !important;height:24px !important}}
        </style>
      </head>
      <body class="bg-red-100" style="outline: 0; width: 100%; min-width: 100%; height: 100%; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; font-family: Helvetica, Arial, sans-serif; line-height: 24px; font-weight: normal; font-size: 16px; -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box; color: #000000; margin: 0; padding: 0; border-width: 0;" bgcolor="#F0F8FF">
        <table class="bg-red-100 body" valign="top" role="presentation" border="0" cellpadding="0" cellspacing="0" style="outline: 0; width: 100%; min-width: 100%; height: 100%; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; font-family: Helvetica, Arial, sans-serif; line-height: 24px; font-weight: normal; font-size: 16px; -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box; color: #000000; margin: 0; padding: 0; border-width: 0;" bgcolor="#F0F8FF">
          <tbody>
            <tr>
              <td valign="top" style="line-height: 24px; font-size: 16px; margin: 0;" align="left" bgcolor="#F0F8FF">
                <table class="container" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                  <tbody>
                    <tr>
                      <td align="center" style="line-height: 24px; font-size: 16px; margin: 0; padding: 0 16px;">
                        <!--[if (gte mso 9)|(IE)]>
                          <table align="center" role="presentation">
                            <tbody>
                              <tr>
                                <td width="600">
                        <![endif]-->
                        <table align="center" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%; max-width: 600px; margin: 0 auto;">
                          <tbody>
                            <tr>
                              <td style="line-height: 24px; font-size: 16px; margin: 0;" align="left">
                                <table class="s-6 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
                                  <tbody>
                                    <tr>
                                      <td style="line-height: 24px; font-size: 24px; width: 100%; height: 24px; margin: 0;" align="left" width="100%" height="24">
                                        &#160;
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                                <img src="cid:logo" width="150" height ="150" >

                               
                                <table class="s-6 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
                                  <tbody>
                                    <tr>
                                      <td style="line-height: 24px; font-size: 24px; width: 100%; height: 24px; margin: 0;" align="left" width="100%" height="24">
                                        &#160;
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                                <div class="space-y-4">
                                  <h1 class="text-4xl fw-800" style="padding-top: 0; padding-bottom: 0; font-weight: 800 !important; vertical-align: baseline; font-size: 36px; line-height: 43.2px; margin: 0;" align="left">Hola '.$nombre.' </h1>
                                  <table class="s-4 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
                                    <tbody>
                                      <tr>
                                        <td style="line-height: 16px; font-size: 16px; width: 100%; height: 16px; margin: 0;" align="left" width="100%" height="16">
                                          &#160;
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                  <p class="" style="line-height: 24px; font-size: 16px; width: 100%; margin: 0;" align="left">Tienes un nuevo lead asignado, puedes entrar con tu cuenta dando click al boton de abajo</p>
                                  <table class="s-4 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
                                    <tbody>
                                      <tr>
                                        <td style="line-height: 16px; font-size: 16px; width: 100%; height: 16px; margin: 0;" align="left" width="100%" height="16">
                                          &#160;
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                  <table class="btn btn-red-500 rounded-full px-6 w-full w-lg-48" role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-radius: 9999px; border-collapse: separate !important; width: 192px;" width="192">
                                    <tbody>
                                      <tr>
                                        <td style="line-height: 24px; font-size: 16px; border-radius: 9999px; width: 192px; margin: 0;" align="center" bgcolor="#dc3545" width="192">
                                          <a href="https://dimanet.dimasur.mx//login" style="color: #ffffff; font-size: 16px; font-family: Helvetica, Arial, sans-serif; text-decoration: none; border-radius: 9999px; line-height: 20px; display: block; font-weight: normal; white-space: nowrap; background-color: #dc3545; padding: 8px 24px; border: 1px solid #dc3545;">Iniciar sesion</a>
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div>
                                <table class="s-6 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
                                  <tbody>
                                    <tr>
                                      <td style="line-height: 24px; font-size: 24px; width: 100%; height: 24px; margin: 0;" align="left" width="100%" height="24">
                                        &#160;
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                                <table class="card rounded-3xl px-4 py-8 p-lg-10" role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-radius: 24px; border-collapse: separate !important; width: 100%; overflow: hidden; border: 1px solid #e2e8f0;" bgcolor="#ffffff">
                                  <tbody>
                                    <tr>
                                      <td style="line-height: 24px; font-size: 16px; width: 100%; border-radius: 24px; margin: 0; padding: 40px;" align="left" bgcolor="#ffffff">
                                        <h3 class="text-center" style="padding-top: 0; padding-bottom: 0; font-weight: 500; vertical-align: baseline; font-size: 28px; line-height: 33.6px; margin: 0;" align="center">Datos del lead</h3>
                                        <p class="text-center text-muted" style="line-height: 24px; font-size: 16px; color: #718096; width: 100%; margin: 0;" align="center"> </p>
                                        <table class="p-2 w-full" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
                                          <tbody>
                                            <tr>
                                              <td style="line-height: 24px; font-size: 16px; width: 100%; margin: 0; padding: 8px;" align="left" width="100%">Equipo:</td>
                                              <td class="text-right" style="line-height: 24px; font-size: 16px; width: 100%; margin: 0; padding: 8px;" align="right" width="100%">'.$maquina.'</td>
                                            </tr>
                                            <tr>
                                              <td style="line-height: 24px; font-size: 16px; width: 100%; margin: 0; padding: 8px;" align="left" width="100%">Nombre del cliente</td>
                                              <td class="text-right" style="line-height: 24px; font-size: 16px; width: 100%; margin: 0; padding: 8px;" align="right" width="100%">'.$NomCli.'</td>
                                            </tr>
                                            <tr>
                                              <td style="line-height: 24px; font-size: 16px; width: 100%; margin: 0; padding: 8px;" align="left" width="100%">Ciudad</td>
                                              <td class="text-right" style="line-height: 24px; font-size: 16px; width: 100%; margin: 0; padding: 8px;" align="right" width="100%">'.$CiuClie.'</td>
                                            </tr>
                                           
                                          </tbody>
                                        </table>
                                        <table class="s-6 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
                                          <tbody>
                                            <tr>
                                              <td style="line-height: 24px; font-size: 24px; width: 100%; height: 24px; margin: 0;" align="left" width="100%" height="24">
                                                &#160;
                                              </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                        <table class="hr" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                                          <tbody>
                                            <tr>
                                              <td style="line-height: 24px; font-size: 16px; border-top-width: 1px; border-top-color: #e2e8f0; border-top-style: solid; height: 1px; width: 100%; margin: 0;" align="left">
                                              </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                        <table class="s-6 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
                                          <tbody>
                                            <tr>
                                              <td style="line-height: 24px; font-size: 24px; width: 100%; height: 24px; margin: 0;" align="left" width="100%" height="24">
                                                &#160;
                                              </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                        <p style="line-height: 24px; font-size: 16px; width: 100%; margin: 0;" align="left">Para ver mas datos del cliente por favor inicia sesion.</p>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                                <table class="s-6 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
                                  <tbody>
                                    <tr>
                                      <td style="line-height: 24px; font-size: 24px; width: 100%; height: 24px; margin: 0;" align="left" width="100%" height="24">
                                        &#160;
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <!--[if (gte mso 9)|(IE)]>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                        <![endif]-->
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
          </tbody>
        </table>
      <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script></body>
    </html>
      ';
    $mail->addEmbeddedImage('../../Assets/images/logov2.png', 'logo');

    $mail->send();

    $arrResponse = array('status' => true, 'msg' => '¡Correo enviado!');

    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);

  } catch (Exception $e) {

    $arrResponse = array('status' => false, 'msg' => '¡No se pudo enviar el correo!');

    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    
  }
}


if (isset($_GET['datosCliente'])) {

  $nombre = $_GET['datosCliente'];
  $correo = $_GET['correo'];
 // $maquina = $_GET['equipo'];

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
    $mail->addAddress('cristobalzaldivar0101@gmail.com');
   // $mail->addAddress('casanovalizbeth@dimasur.com.mx');
   // $mail->addAddress('zaldivarcristobal@dimasur.com.mx');
   // $mail->addAddress('alejandroavila@dimasur.com.mx');   //Name is optional


    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');




    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    
    
    $mail->Subject = 'Bienvenido';
    $mail->Body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
    <html>
    
    <head>
      <!-- Compiled with Bootstrap Email version: 1.3.1 -->
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <meta name="x-apple-disable-message-reformatting">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="format-detection" content="telephone=no, date=no, address=no, email=no">
      <style type="text/css">
        body,
        table,
        td {
          font-family: Helvetica, Arial, sans-serif !important
        }
    
        .ExternalClass {
          width: 100%
        }
    
        .ExternalClass,
        .ExternalClass p,
        .ExternalClass span,
        .ExternalClass font,
        .ExternalClass td,
        .ExternalClass div {
          line-height: 150%
        }
    
        a {
          text-decoration: none
        }
    
        * {
          color: inherit
        }
    
        a[x-apple-data-detectors],
        u+#body a,
        #MessageViewBody a {
          color: inherit;
          text-decoration: none;
          font-size: inherit;
          font-family: inherit;
          font-weight: inherit;
          line-height: inherit
        }
    
        img {
          -ms-interpolation-mode: bicubic
        }
    
        table:not([class^=s-]) {
          font-family: Helvetica, Arial, sans-serif;
          mso-table-lspace: 0pt;
          mso-table-rspace: 0pt;
          border-spacing: 0px;
          border-collapse: collapse
        }
    
        table:not([class^=s-]) td {
          border-spacing: 0px;
          border-collapse: collapse
        }
    
        @media screen and (max-width: 600px) {
    
          .w-lg-48,
          .w-lg-48>tbody>tr>td {
            width: auto !important
          }
    
          .w-full,
          .w-full>tbody>tr>td {
            width: 100% !important
          }
    
          .w-16,
          .w-16>tbody>tr>td {
            width: 64px !important
          }
    
          .p-lg-10:not(table),
          .p-lg-10:not(.btn)>tbody>tr>td,
          .p-lg-10.btn td a {
            padding: 0 !important
          }
    
          .p-2:not(table),
          .p-2:not(.btn)>tbody>tr>td,
          .p-2.btn td a {
            padding: 8px !important
          }
    
          .pr-4:not(table),
          .pr-4:not(.btn)>tbody>tr>td,
          .pr-4.btn td a,
          .px-4:not(table),
          .px-4:not(.btn)>tbody>tr>td,
          .px-4.btn td a {
            padding-right: 16px !important
          }
    
          .pl-4:not(table),
          .pl-4:not(.btn)>tbody>tr>td,
          .pl-4.btn td a,
          .px-4:not(table),
          .px-4:not(.btn)>tbody>tr>td,
          .px-4.btn td a {
            padding-left: 16px !important
          }
    
          .pr-6:not(table),
          .pr-6:not(.btn)>tbody>tr>td,
          .pr-6.btn td a,
          .px-6:not(table),
          .px-6:not(.btn)>tbody>tr>td,
          .px-6.btn td a {
            padding-right: 24px !important
          }
    
          .pl-6:not(table),
          .pl-6:not(.btn)>tbody>tr>td,
          .pl-6.btn td a,
          .px-6:not(table),
          .px-6:not(.btn)>tbody>tr>td,
          .px-6.btn td a {
            padding-left: 24px !important
          }
    
          .pt-8:not(table),
          .pt-8:not(.btn)>tbody>tr>td,
          .pt-8.btn td a,
          .py-8:not(table),
          .py-8:not(.btn)>tbody>tr>td,
          .py-8.btn td a {
            padding-top: 32px !important
          }
    
          .pb-8:not(table),
          .pb-8:not(.btn)>tbody>tr>td,
          .pb-8.btn td a,
          .py-8:not(table),
          .py-8:not(.btn)>tbody>tr>td,
          .py-8.btn td a {
            padding-bottom: 32px !important
          }
    
          *[class*=s-lg-]>tbody>tr>td {
            font-size: 0 !important;
            line-height: 0 !important;
            height: 0 !important
          }
    
          .s-4>tbody>tr>td {
            font-size: 16px !important;
            line-height: 16px !important;
            height: 16px !important
          }
    
          .s-6>tbody>tr>td {
            font-size: 24px !important;
            line-height: 24px !important;
            height: 24px !important
          }
        }
    
    
        body {
          margin: 0;
          overflow-x: hidden;
        }
    
        .footer {
          background: #222321;
          padding: 30px 0px;
          font-family: "Play", sans-serif;
          text-align: center;
        }
    
        .footer .row {
          width: 100%;
          margin: 1% 0%;
          padding: 0.6% 0%;
          color: gray;
          font-size: 0.8em;
        }
    
        .footer .row a {
          text-decoration: none;
          color: gray;
          transition: 0.5s;
        }
    
        .footer .row a:hover {
          color: #fff;
        }
    
        .footer .row ul {
          width: 100%;
        }
    
        .footer .row ul li {
          display: inline-block;
          margin: 0px 30px;
        }
    
        .footer .row a i {
          font-size: 2em;
          margin: 0% 1%;
        }
    
        @media (max-width:720px) {
          .footer {
            text-align: left;
            padding: 5%;
          }
    
          .footer .row ul li {
            display: block;
            margin: 10px 0px;
            text-align: left;
          }
    
          .footer .row a i {
            margin: 0% 3%;
          }
        }
      </style>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
      <!--GOOGLE FONTS-->
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Play&display=swap" rel="stylesheet">
    </head>
    
    <body class="bg-red-100"
      style="outline: 0; width: 100%; min-width: 100%; height: 100%; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; font-family: Helvetica, Arial, sans-serif; line-height: 24px; font-weight: normal; font-size: 16px; -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box; color: #000000; margin: 0; padding: 0; border-width: 0;"
      bgcolor="#F0F8FF">
      <table class="bg-red-100 body" valign="top" role="presentation" border="0" cellpadding="0" cellspacing="0"
        style="outline: 0; width: 100%; min-width: 100%; height: 100%; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; font-family: Helvetica, Arial, sans-serif; line-height: 24px; font-weight: normal; font-size: 16px; -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box; color: #000000; margin: 0; padding: 0; border-width: 0;"
        bgcolor="#F0F8FF">
        <tbody>
          <tr>
            <td valign="top" style="line-height: 24px; font-size: 16px; margin: 0;" align="left" bgcolor="#F0F8FF">
              <table class="container" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                <tbody>
                  <tr>
                    <td align="center" style="line-height: 24px; font-size: 16px; margin: 0; padding: 0 16px;">
                      <!--[if (gte mso 9)|(IE)]>
                          <table align="center" role="presentation">
                            <tbody>
                              <tr>
                                <td width="600">
                        <![endif]-->
                      <table align="center" role="presentation" border="0" cellpadding="0" cellspacing="0"
                        style="width: 100%; max-width: 600px; margin: 0 auto;">
                        <tbody>
                          <tr>
                            <td style="line-height: 24px; font-size: 16px; margin: 0;" align="left">
                              <table class="s-6 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0"
                                style="width: 100%;" width="100%">
                                <tbody>
                                  <tr>
                                    <td style="line-height: 24px; font-size: 24px; width: 100%; height: 24px; margin: 0;"
                                      align="left" width="100%" height="24">
                                      &#160;
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                              <div class="row">
                                <div class="col">
                                <img src="cid:dron" width="600" height ="150" >
                                </div>
                              </div>
                              <table class="s-6 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0"
                                style="width: 100%;" width="100%">
                                <tbody>
                                  <tr>
                                    <td style="line-height: 24px; font-size: 24px; width: 100%; height: 24px; margin: 0;"
                                      align="left" width="100%" height="24">
                                      &#160;
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                              <div class="space-y-4">
                                <h2 class="text-4xl fw-800"
                                  style="padding-top: 0; padding-bottom: 0; font-weight: 800 !important; vertical-align: baseline; font-size: 36px; line-height: 43.2px; margin: 0;"
                                  align="left">Hola '.$nombre.'</h2>
                                <table class="s-4 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0"
                                  style="width: 100%;" width="100%">
                                  <tbody>
                                    <tr>
                                      <td style="line-height: 16px; font-size: 16px; width: 100%; height: 16px; margin: 0;"
                                        align="left" width="100%" height="16">
                                        &#160;
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                                <p class="" style="line-height: 24px; font-size: 16px; width: 100%; margin: 0;"
                                  align="left">
                                  Gracias por comunicarte a Dimasur, nuestras promociones</p>
                                <table class="s-4 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0"
                                  style="width: 100%;" width="100%">
                                  <tbody>
                                    <tr>
                                      <td style="line-height: 16px; font-size: 16px; width: 100%; height: 16px; margin: 0;"
                                        align="left" width="100%" height="16">
                                        &#160;
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
    
                              </div>
                              <table class="s-6 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0"
                                style="width: 100%;" width="100%">
                                <tbody>
                                  <tr>
                                    <td style="line-height: 24px; font-size: 24px; width: 100%; height: 24px; margin: 0;"
                                      align="left" width="100%" height="24">
                                      &#160;
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                              <table class="card rounded-3xl px-4 py-8 p-lg-10" role="presentation" border="0"
                                cellpadding="0" cellspacing="0"
                                style="border-radius: 24px; border-collapse: separate !important; width: 100%; overflow: hidden; border: 1px solid #e2e8f0;"
                                bgcolor="#ffffff">
                                <div class="row">
                                  <div class="col-lg-4">
                                    <td style="line-height: 24px; font-size: 16px; width: 100%; margin: 0; padding: 8px;"
                                      align="left" width="100%"><img src="cid:promocion" width="600"  </td>
                                  </div>
                                </div>
    
                              </table>
                              <table class="s-6 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0"
                                style="width: 100%;" width="100%">
                                <tbody>
                                  <tr>
                                    <td style="line-height: 24px; font-size: 24px; width: 100%; height: 24px; margin: 0;"
                                      align="left" width="100%" height="24">
                                      &#160;
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <!--[if (gte mso 9)|(IE)]>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                        <![endif]-->
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
          </tr>
        </tbody>
    
      </table>
      <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    
      
      
      
    </body>
    
    </html>
    ';

   // <img src="cid:dron" height="500px">
    $mail->addEmbeddedImage('agricultura.jpeg', 'dron');

    $mail->addEmbeddedImage('promocion.jpg', 'promocion');

    $mail->send();

    $arrResponse = array('status' => true, 'msg' => '¡Correo enviado al cliente!');

    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);

  } catch (Exception $e) {

    $arrResponse = array('status' => false, 'msg' => '¡No se pudo enviar el correo al cliente!');

    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);

  }
}



if (isset($_GET['datosAgricola'])) { // get para enviar correo a vendedores

  $nombre = $_GET['datosAgricola'];
  $correo = $_GET['correo'];
  $maquina = $_GET['equipo'];
  $NomCli = $_GET['NomCli'];
  $CiuClie = $_GET['CiuClie'];

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
    $mail->addAddress('cristobalzaldivar0101@gmail.com');
    //Name is optional


    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');




    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Nuevo lead asignado';
    $mail->Body    = ' <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
    <html>
      <head>
        <!-- Compiled with Bootstrap Email version: 1.3.1 -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="x-apple-disable-message-reformatting">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="format-detection" content="telephone=no, date=no, address=no, email=no">
        <style type="text/css">
          body,table,td{font-family:Helvetica,Arial,sans-serif !important}.ExternalClass{width:100%}.ExternalClass,.ExternalClass p,.ExternalClass span,.ExternalClass font,.ExternalClass td,.ExternalClass div{line-height:150%}a{text-decoration:none}*{color:inherit}a[x-apple-data-detectors],u+#body a,#MessageViewBody a{color:inherit;text-decoration:none;font-size:inherit;font-family:inherit;font-weight:inherit;line-height:inherit}img{-ms-interpolation-mode:bicubic}table:not([class^=s-]){font-family:Helvetica,Arial,sans-serif;mso-table-lspace:0pt;mso-table-rspace:0pt;border-spacing:0px;border-collapse:collapse}table:not([class^=s-]) td{border-spacing:0px;border-collapse:collapse}@media screen and (max-width: 600px){.w-lg-48,.w-lg-48>tbody>tr>td{width:auto !important}.w-full,.w-full>tbody>tr>td{width:100% !important}.w-16,.w-16>tbody>tr>td{width:64px !important}.p-lg-10:not(table),.p-lg-10:not(.btn)>tbody>tr>td,.p-lg-10.btn td a{padding:0 !important}.p-2:not(table),.p-2:not(.btn)>tbody>tr>td,.p-2.btn td a{padding:8px !important}.pr-4:not(table),.pr-4:not(.btn)>tbody>tr>td,.pr-4.btn td a,.px-4:not(table),.px-4:not(.btn)>tbody>tr>td,.px-4.btn td a{padding-right:16px !important}.pl-4:not(table),.pl-4:not(.btn)>tbody>tr>td,.pl-4.btn td a,.px-4:not(table),.px-4:not(.btn)>tbody>tr>td,.px-4.btn td a{padding-left:16px !important}.pr-6:not(table),.pr-6:not(.btn)>tbody>tr>td,.pr-6.btn td a,.px-6:not(table),.px-6:not(.btn)>tbody>tr>td,.px-6.btn td a{padding-right:24px !important}.pl-6:not(table),.pl-6:not(.btn)>tbody>tr>td,.pl-6.btn td a,.px-6:not(table),.px-6:not(.btn)>tbody>tr>td,.px-6.btn td a{padding-left:24px !important}.pt-8:not(table),.pt-8:not(.btn)>tbody>tr>td,.pt-8.btn td a,.py-8:not(table),.py-8:not(.btn)>tbody>tr>td,.py-8.btn td a{padding-top:32px !important}.pb-8:not(table),.pb-8:not(.btn)>tbody>tr>td,.pb-8.btn td a,.py-8:not(table),.py-8:not(.btn)>tbody>tr>td,.py-8.btn td a{padding-bottom:32px !important}*[class*=s-lg-]>tbody>tr>td{font-size:0 !important;line-height:0 !important;height:0 !important}.s-4>tbody>tr>td{font-size:16px !important;line-height:16px !important;height:16px !important}.s-6>tbody>tr>td{font-size:24px !important;line-height:24px !important;height:24px !important}}
        </style>
      </head>
      <body class="bg-red-100" style="outline: 0; width: 100%; min-width: 100%; height: 100%; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; font-family: Helvetica, Arial, sans-serif; line-height: 24px; font-weight: normal; font-size: 16px; -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box; color: #000000; margin: 0; padding: 0; border-width: 0;" bgcolor="#F0F8FF">
        <table class="bg-red-100 body" valign="top" role="presentation" border="0" cellpadding="0" cellspacing="0" style="outline: 0; width: 100%; min-width: 100%; height: 100%; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; font-family: Helvetica, Arial, sans-serif; line-height: 24px; font-weight: normal; font-size: 16px; -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box; color: #000000; margin: 0; padding: 0; border-width: 0;" bgcolor="#F0F8FF">
          <tbody>
            <tr>
              <td valign="top" style="line-height: 24px; font-size: 16px; margin: 0;" align="left" bgcolor="#F0F8FF">
                <table class="container" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                  <tbody>
                    <tr>
                      <td align="center" style="line-height: 24px; font-size: 16px; margin: 0; padding: 0 16px;">
                        <!--[if (gte mso 9)|(IE)]>
                          <table align="center" role="presentation">
                            <tbody>
                              <tr>
                                <td width="600">
                        <![endif]-->
                        <table align="center" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%; max-width: 600px; margin: 0 auto;">
                          <tbody>
                            <tr>
                              <td style="line-height: 24px; font-size: 16px; margin: 0;" align="left">
                                <table class="s-6 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
                                  <tbody>
                                    <tr>
                                      <td style="line-height: 24px; font-size: 24px; width: 100%; height: 24px; margin: 0;" align="left" width="100%" height="24">
                                        &#160;
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                                <img src="cid:logo" width="150" height ="150" >

                               
                                <table class="s-6 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
                                  <tbody>
                                    <tr>
                                      <td style="line-height: 24px; font-size: 24px; width: 100%; height: 24px; margin: 0;" align="left" width="100%" height="24">
                                        &#160;
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                                <div class="space-y-4">
                                  <h1 class="text-4xl fw-800" style="padding-top: 0; padding-bottom: 0; font-weight: 800 !important; vertical-align: baseline; font-size: 36px; line-height: 43.2px; margin: 0;" align="left">Hola '.$nombre.' </h1>
                                  <table class="s-4 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
                                    <tbody>
                                      <tr>
                                        <td style="line-height: 16px; font-size: 16px; width: 100%; height: 16px; margin: 0;" align="left" width="100%" height="16">
                                          &#160;
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                  <p class="" style="line-height: 24px; font-size: 16px; width: 100%; margin: 0;" align="left">Tienes un nuevo lead asignado, puedes entrar con tu cuenta dando click al boton de abajo</p>
                                  <table class="s-4 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
                                    <tbody>
                                      <tr>
                                        <td style="line-height: 16px; font-size: 16px; width: 100%; height: 16px; margin: 0;" align="left" width="100%" height="16">
                                          &#160;
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                  <table class="btn btn-red-500 rounded-full px-6 w-full w-lg-48" role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-radius: 9999px; border-collapse: separate !important; width: 192px;" width="192">
                                    <tbody>
                                      <tr>
                                        <td style="line-height: 24px; font-size: 16px; border-radius: 9999px; width: 192px; margin: 0;" align="center" bgcolor="#dc3545" width="192">
                                          <a href="https://dimanet.dimasur.mx//login" style="color: #ffffff; font-size: 16px; font-family: Helvetica, Arial, sans-serif; text-decoration: none; border-radius: 9999px; line-height: 20px; display: block; font-weight: normal; white-space: nowrap; background-color: #dc3545; padding: 8px 24px; border: 1px solid #dc3545;">Iniciar sesion</a>
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div>
                                <table class="s-6 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
                                  <tbody>
                                    <tr>
                                      <td style="line-height: 24px; font-size: 24px; width: 100%; height: 24px; margin: 0;" align="left" width="100%" height="24">
                                        &#160;
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                                <table class="card rounded-3xl px-4 py-8 p-lg-10" role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-radius: 24px; border-collapse: separate !important; width: 100%; overflow: hidden; border: 1px solid #e2e8f0;" bgcolor="#ffffff">
                                  <tbody>
                                    <tr>
                                      <td style="line-height: 24px; font-size: 16px; width: 100%; border-radius: 24px; margin: 0; padding: 40px;" align="left" bgcolor="#ffffff">
                                        <h3 class="text-center" style="padding-top: 0; padding-bottom: 0; font-weight: 500; vertical-align: baseline; font-size: 28px; line-height: 33.6px; margin: 0;" align="center">Datos del lead</h3>
                                        <p class="text-center text-muted" style="line-height: 24px; font-size: 16px; color: #718096; width: 100%; margin: 0;" align="center"> </p>
                                        <table class="p-2 w-full" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
                                          <tbody>
                                            <tr>
                                              <td style="line-height: 24px; font-size: 16px; width: 100%; margin: 0; padding: 8px;" align="left" width="100%">Equipo:</td>
                                              <td class="text-right" style="line-height: 24px; font-size: 16px; width: 100%; margin: 0; padding: 8px;" align="right" width="100%">'.$maquina.'</td>
                                            </tr>
                                            <tr>
                                              <td style="line-height: 24px; font-size: 16px; width: 100%; margin: 0; padding: 8px;" align="left" width="100%">Nombre del cliente</td>
                                              <td class="text-right" style="line-height: 24px; font-size: 16px; width: 100%; margin: 0; padding: 8px;" align="right" width="100%">'.$NomCli.'</td>
                                            </tr>
                                            <tr>
                                              <td style="line-height: 24px; font-size: 16px; width: 100%; margin: 0; padding: 8px;" align="left" width="100%">Ciudad</td>
                                              <td class="text-right" style="line-height: 24px; font-size: 16px; width: 100%; margin: 0; padding: 8px;" align="right" width="100%">'.$CiuClie.'</td>
                                            </tr>
                                           
                                          </tbody>
                                        </table>
                                        <table class="s-6 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
                                          <tbody>
                                            <tr>
                                              <td style="line-height: 24px; font-size: 24px; width: 100%; height: 24px; margin: 0;" align="left" width="100%" height="24">
                                                &#160;
                                              </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                        <table class="hr" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                                          <tbody>
                                            <tr>
                                              <td style="line-height: 24px; font-size: 16px; border-top-width: 1px; border-top-color: #e2e8f0; border-top-style: solid; height: 1px; width: 100%; margin: 0;" align="left">
                                              </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                        <table class="s-6 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
                                          <tbody>
                                            <tr>
                                              <td style="line-height: 24px; font-size: 24px; width: 100%; height: 24px; margin: 0;" align="left" width="100%" height="24">
                                                &#160;
                                              </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                        <p style="line-height: 24px; font-size: 16px; width: 100%; margin: 0;" align="left">Para ver mas datos del cliente por favor inicia sesion.</p>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                                <table class="s-6 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
                                  <tbody>
                                    <tr>
                                      <td style="line-height: 24px; font-size: 24px; width: 100%; height: 24px; margin: 0;" align="left" width="100%" height="24">
                                        &#160;
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <!--[if (gte mso 9)|(IE)]>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                        <![endif]-->
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
          </tbody>
        </table>
      <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script></body>
    </html>
      ';
    $mail->addEmbeddedImage('../../Assets/images/logov2.png', 'logo');

    $mail->send();

    $arrResponse = array('status' => true, 'msg' => '¡Correo enviado!');

    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);

  } catch (Exception $e) {

    $arrResponse = array('status' => false, 'msg' => '¡No se pudo enviar el correo!');

    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    
  }
}



if (isset($_GET['datosServicio'])) { // get para enviar correo a contrololistas de servicio

  $nombre = $_GET['datosServicio'];
  $correo = $_GET['correo'];
  //$maquina = $_GET['equipo'];
  $NomCli = $_GET['NomCli'];
  $CiuClie = $_GET['CiuClie'];

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
    $mail->addAddress('cristobalzaldivar0101@gmail.com');
    //Name is optional


    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');




    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Nuevo lead asignado';
    $mail->Body    = ' <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
    <html>
      <head>
        <!-- Compiled with Bootstrap Email version: 1.3.1 -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="x-apple-disable-message-reformatting">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="format-detection" content="telephone=no, date=no, address=no, email=no">
        <style type="text/css">
          body,table,td{font-family:Helvetica,Arial,sans-serif !important}.ExternalClass{width:100%}.ExternalClass,.ExternalClass p,.ExternalClass span,.ExternalClass font,.ExternalClass td,.ExternalClass div{line-height:150%}a{text-decoration:none}*{color:inherit}a[x-apple-data-detectors],u+#body a,#MessageViewBody a{color:inherit;text-decoration:none;font-size:inherit;font-family:inherit;font-weight:inherit;line-height:inherit}img{-ms-interpolation-mode:bicubic}table:not([class^=s-]){font-family:Helvetica,Arial,sans-serif;mso-table-lspace:0pt;mso-table-rspace:0pt;border-spacing:0px;border-collapse:collapse}table:not([class^=s-]) td{border-spacing:0px;border-collapse:collapse}@media screen and (max-width: 600px){.w-lg-48,.w-lg-48>tbody>tr>td{width:auto !important}.w-full,.w-full>tbody>tr>td{width:100% !important}.w-16,.w-16>tbody>tr>td{width:64px !important}.p-lg-10:not(table),.p-lg-10:not(.btn)>tbody>tr>td,.p-lg-10.btn td a{padding:0 !important}.p-2:not(table),.p-2:not(.btn)>tbody>tr>td,.p-2.btn td a{padding:8px !important}.pr-4:not(table),.pr-4:not(.btn)>tbody>tr>td,.pr-4.btn td a,.px-4:not(table),.px-4:not(.btn)>tbody>tr>td,.px-4.btn td a{padding-right:16px !important}.pl-4:not(table),.pl-4:not(.btn)>tbody>tr>td,.pl-4.btn td a,.px-4:not(table),.px-4:not(.btn)>tbody>tr>td,.px-4.btn td a{padding-left:16px !important}.pr-6:not(table),.pr-6:not(.btn)>tbody>tr>td,.pr-6.btn td a,.px-6:not(table),.px-6:not(.btn)>tbody>tr>td,.px-6.btn td a{padding-right:24px !important}.pl-6:not(table),.pl-6:not(.btn)>tbody>tr>td,.pl-6.btn td a,.px-6:not(table),.px-6:not(.btn)>tbody>tr>td,.px-6.btn td a{padding-left:24px !important}.pt-8:not(table),.pt-8:not(.btn)>tbody>tr>td,.pt-8.btn td a,.py-8:not(table),.py-8:not(.btn)>tbody>tr>td,.py-8.btn td a{padding-top:32px !important}.pb-8:not(table),.pb-8:not(.btn)>tbody>tr>td,.pb-8.btn td a,.py-8:not(table),.py-8:not(.btn)>tbody>tr>td,.py-8.btn td a{padding-bottom:32px !important}*[class*=s-lg-]>tbody>tr>td{font-size:0 !important;line-height:0 !important;height:0 !important}.s-4>tbody>tr>td{font-size:16px !important;line-height:16px !important;height:16px !important}.s-6>tbody>tr>td{font-size:24px !important;line-height:24px !important;height:24px !important}}
        </style>
      </head>
      <body class="bg-red-100" style="outline: 0; width: 100%; min-width: 100%; height: 100%; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; font-family: Helvetica, Arial, sans-serif; line-height: 24px; font-weight: normal; font-size: 16px; -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box; color: #000000; margin: 0; padding: 0; border-width: 0;" bgcolor="#F0F8FF">
        <table class="bg-red-100 body" valign="top" role="presentation" border="0" cellpadding="0" cellspacing="0" style="outline: 0; width: 100%; min-width: 100%; height: 100%; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; font-family: Helvetica, Arial, sans-serif; line-height: 24px; font-weight: normal; font-size: 16px; -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box; color: #000000; margin: 0; padding: 0; border-width: 0;" bgcolor="#F0F8FF">
          <tbody>
            <tr>
              <td valign="top" style="line-height: 24px; font-size: 16px; margin: 0;" align="left" bgcolor="#F0F8FF">
                <table class="container" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                  <tbody>
                    <tr>
                      <td align="center" style="line-height: 24px; font-size: 16px; margin: 0; padding: 0 16px;">
                        <!--[if (gte mso 9)|(IE)]>
                          <table align="center" role="presentation">
                            <tbody>
                              <tr>
                                <td width="600">
                        <![endif]-->
                        <table align="center" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%; max-width: 600px; margin: 0 auto;">
                          <tbody>
                            <tr>
                              <td style="line-height: 24px; font-size: 16px; margin: 0;" align="left">
                                <table class="s-6 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
                                  <tbody>
                                    <tr>
                                      <td style="line-height: 24px; font-size: 24px; width: 100%; height: 24px; margin: 0;" align="left" width="100%" height="24">
                                        &#160;
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                                <img src="cid:logo" width="150" height ="150" >

                               
                                <table class="s-6 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
                                  <tbody>
                                    <tr>
                                      <td style="line-height: 24px; font-size: 24px; width: 100%; height: 24px; margin: 0;" align="left" width="100%" height="24">
                                        &#160;
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                                <div class="space-y-4">
                                  <h1 class="text-4xl fw-800" style="padding-top: 0; padding-bottom: 0; font-weight: 800 !important; vertical-align: baseline; font-size: 36px; line-height: 43.2px; margin: 0;" align="left">Hola '.$nombre.' </h1>
                                  <table class="s-4 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
                                    <tbody>
                                      <tr>
                                        <td style="line-height: 16px; font-size: 16px; width: 100%; height: 16px; margin: 0;" align="left" width="100%" height="16">
                                          &#160;
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                  <p class="" style="line-height: 24px; font-size: 16px; width: 100%; margin: 0;" align="left">Tienes un nuevo lead asignado, puedes entrar con tu cuenta dando click al boton de abajo</p>
                                  <table class="s-4 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
                                    <tbody>
                                      <tr>
                                        <td style="line-height: 16px; font-size: 16px; width: 100%; height: 16px; margin: 0;" align="left" width="100%" height="16">
                                          &#160;
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                  <table class="btn btn-red-500 rounded-full px-6 w-full w-lg-48" role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-radius: 9999px; border-collapse: separate !important; width: 192px;" width="192">
                                    <tbody>
                                      <tr>
                                        <td style="line-height: 24px; font-size: 16px; border-radius: 9999px; width: 192px; margin: 0;" align="center" bgcolor="#dc3545" width="192">
                                          <a href="https://dimanet.dimasur.mx//login" style="color: #ffffff; font-size: 16px; font-family: Helvetica, Arial, sans-serif; text-decoration: none; border-radius: 9999px; line-height: 20px; display: block; font-weight: normal; white-space: nowrap; background-color: #dc3545; padding: 8px 24px; border: 1px solid #dc3545;">Iniciar sesion</a>
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div>
                                <table class="s-6 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
                                  <tbody>
                                    <tr>
                                      <td style="line-height: 24px; font-size: 24px; width: 100%; height: 24px; margin: 0;" align="left" width="100%" height="24">
                                        &#160;
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                                <table class="card rounded-3xl px-4 py-8 p-lg-10" role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-radius: 24px; border-collapse: separate !important; width: 100%; overflow: hidden; border: 1px solid #e2e8f0;" bgcolor="#ffffff">
                                  <tbody>
                                    <tr>
                                      <td style="line-height: 24px; font-size: 16px; width: 100%; border-radius: 24px; margin: 0; padding: 40px;" align="left" bgcolor="#ffffff">
                                        <h3 class="text-center" style="padding-top: 0; padding-bottom: 0; font-weight: 500; vertical-align: baseline; font-size: 28px; line-height: 33.6px; margin: 0;" align="center">Datos del lead</h3>
                                        <p class="text-center text-muted" style="line-height: 24px; font-size: 16px; color: #718096; width: 100%; margin: 0;" align="center"> </p>
                                        <table class="p-2 w-full" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
                                          <tbody>
                                            
                                            <tr>
                                              <td style="line-height: 24px; font-size: 16px; width: 100%; margin: 0; padding: 8px;" align="left" width="100%">Nombre del cliente</td>
                                              <td class="text-right" style="line-height: 24px; font-size: 16px; width: 100%; margin: 0; padding: 8px;" align="right" width="100%">'.$NomCli.'</td>
                                            </tr>
                                            <tr>
                                              <td style="line-height: 24px; font-size: 16px; width: 100%; margin: 0; padding: 8px;" align="left" width="100%">Ciudad</td>
                                              <td class="text-right" style="line-height: 24px; font-size: 16px; width: 100%; margin: 0; padding: 8px;" align="right" width="100%">'.$CiuClie.'</td>
                                            </tr>
                                           
                                          </tbody>
                                        </table>
                                        <table class="s-6 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
                                          <tbody>
                                            <tr>
                                              <td style="line-height: 24px; font-size: 24px; width: 100%; height: 24px; margin: 0;" align="left" width="100%" height="24">
                                                &#160;
                                              </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                        <table class="hr" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                                          <tbody>
                                            <tr>
                                              <td style="line-height: 24px; font-size: 16px; border-top-width: 1px; border-top-color: #e2e8f0; border-top-style: solid; height: 1px; width: 100%; margin: 0;" align="left">
                                              </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                        <table class="s-6 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
                                          <tbody>
                                            <tr>
                                              <td style="line-height: 24px; font-size: 24px; width: 100%; height: 24px; margin: 0;" align="left" width="100%" height="24">
                                                &#160;
                                              </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                        <p style="line-height: 24px; font-size: 16px; width: 100%; margin: 0;" align="left">Para ver mas datos del cliente por favor inicia sesion.</p>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                                <table class="s-6 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
                                  <tbody>
                                    <tr>
                                      <td style="line-height: 24px; font-size: 24px; width: 100%; height: 24px; margin: 0;" align="left" width="100%" height="24">
                                        &#160;
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <!--[if (gte mso 9)|(IE)]>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                        <![endif]-->
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
          </tbody>
        </table>
      <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script></body>
    </html>
      ';
    $mail->addEmbeddedImage('../../Assets/images/logov2.png', 'logo');

    $mail->send();

    $arrResponse = array('status' => true, 'msg' => '¡Correo enviado!');

    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);

  } catch (Exception $e) {

    $arrResponse = array('status' => false, 'msg' => '¡No se pudo enviar el correo!');

    echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    
  }
}