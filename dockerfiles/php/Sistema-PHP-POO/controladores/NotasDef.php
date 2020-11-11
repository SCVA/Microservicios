<?php
	/**
	 * Archivo		: NotasDef.php
	 * Tipo			: Controlador
	 */

	class NotasDef
	{		
		// Inicio
		function inicio()
		{
			require_once"inc/variables.php";
			require_once"clases/classVista.php";
			require_once"modelo/modeloNotas.php";
			
			$aTitulos['t3']             = $aNomMod['m03'];
			$datos["aTitulos"]	= $aTitulos;
			session_start();
			$datos["userNombre"] = $_SESSION["nombreSesion"];
			$datos["userID"] = $_SESSION["idSesion"];
			$datos['S_MOD03'] = $_SESSION['S_MOD03'];
			
			// LECTURA DE LA TABLA usuario
			$oNotas = new modeloNotas();
			$rs = $oNotas->obtenerDatos($datos["userID"]);
			$datos['item'] = $rs; //antes $item
			
			// Si tiene acceso al modulo 03
			if ($datos['S_MOD03'] != 'X' ) {
				// Salida de la vista
				$oSalida = new Vista("notas.php",$datos); 
			} else {
				// Lo devuelve al inicio de sesion
				$oSalida = new Vista("notas.inicio.php",$datos); 
			}
		}
	}
?>