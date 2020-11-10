<?php
/**
 * Archivo		: classValidar.php
 * Funcion 		: Validar los datos recibidos para ser procesados
 * 
 */

	class Validar
	{		

		public $data=array();
		// Lista la validacion personal
		function validaUsuario($data)
		{

			if( is_array($data) ) {
				extract($data);
			}
			
			if (!empty($idM)) {
				$id = $idM;
			}
			if (!empty($id)) {
				$idM = $id;
			} 

			if (!empty($clave)) {
				$claveM = $clave;
			} 
			if (!empty($claveM)) {
				$clave = $claveM;
			}
			

			// Validar los datos
		   $error = 0;
			// Valida id/cedula
			if ($id=="" || $id==" ") {
				$error = 1;
				$errorId = "¡Faltó su Id/Cédula!";
			} else {
				$errorId = "";
			}

			// Valida nombre
			if ($descrip=="" || $descrip==" ") {
				$error = 2;
				$errorDescrip = "¡Faltó su Nombre!";
			} else {
				$errorDescrip = "";
			}

			// Valida clave
			if ($clave=="" || $clave==" ") {
				$error = 3;
				$errorClave = "¡Faltó la Clave!";
			} else {
				$errorClave = "";
			}

			$cuantosM = 0;
			// Valida si hay al menos un modulo permitido
			if (empty($mod01) || $mod01==" " || $mod01=="X") { $cuantosM++;$mod01="X";}
			if (empty($mod02) || $mod02==" " || $mod02=="X") { $cuantosM++;$mod02="X";}
			if (empty($mod03) || $mod03==" " || $mod03=="X") { $cuantosM++;$mod03="X";}
			if ($cuantosM == 3) {
				$error = 4;
				$errorModulo = "¡Debe tener acceso al menos a 01 módulo!";
			} else {
				$errorModulo = "";
			}
			
			$data['id']       		  = $id;
			$data['descrip']       	  = $descrip;
			$data['clave']        	  = $clave;
			$data['activo']        	  = $activo;
			$data['mod01']            = $mod01;
			$data['mod02']            = $mod02;
			$data['mod03']            = $mod03;

			$data['errorId']				= $errorId;
			$data['errorDescrip']		= $errorDescrip;
			$data['errorClave']			= $errorClave;
			$data['errorModulo']			= $errorModulo;

			$data['error']					= $error;
			return $data;
		}

	}
?>