<?php
	/**
	 * Archivo		: NotasDef.php
	 * Tipo			: Controlador
	 */

	class NotasIn
	{		
		// Inicio
		function inicio()
		{
			require_once"inc/variables.php";
			require_once"clases/classVista.php";
			require_once"modelo/modeloNotas.php";
			
			$aTitulos['t3']             = $aNomMod['m02'];
			$datos["aTitulos"]	= $aTitulos;
			session_start();
			$datos["userNombre"] = $_SESSION["nombreSesion"];
			$datos["userID"] = $_SESSION["idSesion"];
			$datos['S_MOD02'] = $_SESSION['S_MOD02'];
			
			// LECTURA DE LA TABLA usuario
			$oNotas = new modeloNotas();
			$rs = $oNotas->obtenerDatos($datos["userID"]);
			$datos['item'] = $rs; //antes $item
			
			// Si tiene acceso al modulo 02
			if ($datos['S_MOD02'] != 'X' ) {
				// Salida de la vista
				$oSalida = new Vista("insertarNotas.php",$datos); 
			} else {
				// Lo devuelve al inicio de sesion
				$oSalida = new Vista("sesion.inicio.php",$datos); 
			}
		}
	
		function incluir()
		{
			require_once"inc/variables.php";
			require_once"clases/classVista.php";
			require_once"modelo/modeloNotas.php";
			
			require_once"inc/variables.php";
			
			$aTitulos['t3']             = $aNomMod['m02'];
			$datos["aTitulos"]	= $aTitulos;
			
			$N_1               = $_POST['N_1'];
			$N_2               = $_POST['N_2'];
			$N_3               = $_POST['N_3'];
			
			session_start();
			$datos["userNombre"] = $_SESSION["nombreSesion"];
			$datos["userID"] = $_SESSION["idSesion"];
			$datos['S_MOD02'] = $_SESSION['S_MOD02'];
			
			// LECTURA DE LA TABLA usuario
			$oNotas = new modeloNotas();
			$rs = $oNotas->modificar($datos["userID"],$N_1,$N_2,$N_3);
			// Lo devuelve al inicio de sesion
			$oSalida = new Vista("sesion.inicio.php",$datos);
		}
		
	}
?>