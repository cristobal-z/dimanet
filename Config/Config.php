<?php 
	//const BASE_URL = "http://localhost/dima/";
	//const BASE_URL = "https://dimanet.dimasur.mx/";
	const BASE_URL = "http://192.168.60.39/dima/";

	//Zona horaria
	date_default_timezone_set('America/Guatemala');

	//Datos de conexión a Base de Datos
	const DB_HOST = "localhost";
	const DB_NAME = "dima";
	const DB_USER = "root";
	const DB_PASSWORD = "";
	const DB_CHARSET = "utf8";

	//Para envío de correo
	const ENVIRONMENT = 1; // Local: 0, Produccón: 1;

	//Deliminadores decimal y millar Ej. 24,1989.00
	const SPD = ".";
	const SPM = ",";

	//Simbolo de moneda
	const SMONEY = "$";
	const CURRENCY = "USD";

	//Api PayPal
	//SANDBOX PAYPAL
	const URLPAYPAL = "https://api-m.sandbox.paypal.com";
	const IDCLIENTE = "";
	const SECRET = "";
	//LIVE PAYPAL
	//const URLPAYPAL = "https://api-m.paypal.com";
	//const IDCLIENTE = "";
	//const SECRET = "";

//Datos envio de correo
	const NOMBRE_REMITENTE = "Dimasur";
	const EMAIL_REMITENTE = "toxichunter84@gmail.com";
	const NOMBRE_EMPESA = "Dimasur";
	const WEB_EMPRESA = "www.dimasur.mx";

	const DESCRIPCION = "Encuentra todo sobre maquinaria agrícola y construcción.";
	const SHAREDHASH = "Dimasur";

	//Datos Empresa
	const DIRECCION = "Carretera federal, amapolas";
	const TELEMPRESA = "+52 2293209203";
	const WHATSAPP = "2293209203";
	const EMAIL_EMPRESA = "cap@dimasur.com.mx";
	const EMAIL_PEDIDOS = "cap@dimasur.com.mx"; 
	const EMAIL_SUSCRIPCION = "cap@dimasur.com.mx";
	const EMAIL_CONTACTO = "cap@dimasur.com.mx";

	const CAT_SLIDER = "1,2,3";
	const CAT_BANNER = "4,5,6";
	const CAT_FOOTER = "1,2,3,4,5";

	//Datos para Encriptar / Desencriptar
	const KEY = 'Dimasur';
	const METHODENCRIPT = "AES-128-ECB";

	//Envío
	const COSTOENVIO = 5;

	//Módulos
	const MDASHBOARD = 1;
	const MUSUARIOS = 2;
	const MCLIENTES = 3;
	const MPRODUCTOS = 4;
	const MPEDIDOS = 5;
	const MCATEGORIAS = 6;
	const MSUSCRIPTORES = 7;
	const MDCONTACTOS = 8;
	const MDPAGINAS = 9;
	const MDLEADS = 10;
	const MDAGRICOLA = 11;
	const MDCONSTRUCCION = 12;
	const MDREFACCIONES = 13;
	const MDSERVICIO = 14;

	//Páginas
	const PINICIO = 1;
	const PTIENDA = 2;
	const PCARRITO = 3;
	const PNOSOTROS = 4;
	const PCONTACTO = 5;
	const PPREGUNTAS = 6;
	const PTERMINOS = 7;
	const PSUCURSALES = 8;
	const PERROR = 9;

	//Roles
	const RADMINISTRADOR = 1;
	const RSUPERVISOR = 2;
	const RCLIENTES = 3;

	const STATUS = array('Completo','Aprobado','Cancelado','Reembolsado','Pendiente','Entregado');

	//Productos por página
	const CANTPORDHOME = 8;
	const PROPORPAGINA = 4;
	const PROCATEGORIA = 4;
	const PROBUSCAR = 4;

	//REDES SOCIALES
	const FACEBOOK = "https://www.facebook.com/Dimasur.Mx/";
	const INSTAGRAM = "https://www.instagram.com/dimasur.mx/";
	

 ?>