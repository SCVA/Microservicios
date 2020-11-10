<?php
/**
	* Archivo   : Sesion.php
	* Type      : Controlador 
	* Function  : Controlador Sesion
	*             Manejo de sesion
	*/


class Sesion {

	//  INICIO  ///
	public function inicio() {

		require_once"clases/classVista.php";
		require_once"inc/variables.php";

		$aTitulos['t3']           = "Iniciar Sesión";
		$datos['aTitulos']        = $aTitulos;
		$datos['userNombre']      = "";

		// Salida de la vista
		$oSalida = new Vista("sesion.inicio.php",$datos); 
	}

	/**
	* Iniciar. PARTE 2
	*
	*/
	function conecta() {

		require_once "inc/variables.php";
		// LOAD FILES
		require_once "modelo/modeloUsuario.php";
		require_once "clases/classVista.php";

		// SESSION VARIABLES
		$userNombre 	= "";
		$descrip 		= "";
		$errorInicio 	= "";
	
		// VALIDATION VARIABLES
		$error = 0;

		//Lee parametros post parameters
		foreach ($_POST as $datoRecibido => $valor) {
			$datos[$datoRecibido] = $valor;
			$$datoRecibido = $valor;
		}

		// Leer la labla              $idConn
		$oUsuario   = new modeloUsuario();

		$rs  = $oUsuario->obtenerLoginClave($usuario,$clave);

		// Transforma el resultado en un arreglo asociativo
		if (!empty($rs) ) 
		{
			$descrip  = $rs['descrip_usu'];
			$clave    = $rs['clave_usu'];
			$activo   = $rs['activo'];
			$S_MOD01  = $rs['modulo01'];
			$S_MOD02  = $rs['modulo02'];
			$S_MOD03  = $rs['modulo03'];
		}

		// parametros para la vista 
		$aTitulos['t3']           = "Menú Principal";
		$datos['aTitulos']        = $aTitulos;

		// Chequea que existan los datos devueltos ( encontro usuario )
		if (!empty($descrip)) {
			// Chequea que el usuario este activo
			if ($activo == 'S') {
				session_start();
				$_SESSION['usuarioSesion'] = $usuario;
				$_SESSION['nombreSesion']  = $descrip;
				// Defino la fecha y hora de inicio de sesión en formato aaaa-mm-dd hh:mm:ss 
				// Esto para ir verificando el tiempo que llevara conectado el usuario.
				$_SESSION["ultimoAcceso"]= date("Y-n-j H:i:s");

				// Almacenar los permisos
				$_SESSION['S_MOD01']			= $S_MOD01;
				$_SESSION['S_MOD02']			= $S_MOD02;
				$_SESSION['S_MOD03']			= $S_MOD03;

				// Verificar los permisos para mostrar el menu
				if($S_MOD01 == 'X') $aMenu['op01'] = "";
				if($S_MOD02 == 'X') $aMenu['op02'] = "";
				if($S_MOD03 == 'X') $aMenu['op03'] = "";

				$datos['aMenu']	= $aMenu;
				
				//echo "Usuario encontrado";
				$datos['userNombre'] = $descrip;

				$oSalida = new Vista("menu.principal.php",$datos);
			} else {
				//echo "Usuario NO encontrado";
				$aTitulos['t3']				= "Iniciar Sesión";
				$datos['aTitulos']			= $aTitulos;
				$datos['errorInicio']		= "USUARIO INACTIVO!";
		 
				$oSalida = new Vista('sesion.inicio.php',$datos);
			}

		} else {
			//echo "Usuario NO encontrado";
			$aTitulos['t3']				= "Iniciar Sesión";
			$datos['aTitulos']			= $aTitulos;
			$datos['errorInicio']		= "ERROR EN USUARIO Y/O CLAVE";
	 
			$oSalida = new Vista('sesion.inicio.php',$datos);
		}
	}

	// Conectado
	function conectado() {
		// Carga de archivos/librerias       
		require_once"clases/classVista.php";
		require_once"inc/variables.php";

		// parametros para la vista 
		$aTitulos['t3']           = "Menú Principal";
		$datos['aTitulos']        = $aTitulos;

		session_start();
		if($_SESSION['S_MOD01'] == 'X') $aMenu['op01'] = "";
		if($_SESSION['S_MOD02'] == 'X') $aMenu['op02'] = "";
		if($_SESSION['S_MOD03'] == 'X') $aMenu['op03'] = "";
		
		$datos['aMenu']		 = $aMenu;
		$datos['userNombre'] = $_SESSION['nombreSesion'];
		
		$oSalida = new Vista('menu.principal.php',$datos);
	}

	// Desconectar
	function desconecta($cual = null) {
		// LOAD FILES
		require_once"modelo/modeloUsuario.php";       
		require_once"clases/classVista.php";
		require_once"inc/variables.php";

		// parametros para la vista 
		$aTitulos['t3']			= "Cierre de Sesión";
		$aMensajes['m01']		= "Ud. se ha desconectado exitosamente!";
		$datos['aTitulos']		= $aTitulos;
		$datos['aMensajes']		= $aMensajes;

		session_start();
		session_destroy();
		$oSalida = new Vista('sesion.finalizar.php',$datos);
	}

	// Desconeccion por inactividad
	function cierreforzado() {
		// LOAD FILES
		require_once"modelo/modeloUsuario.php";       
		require_once"clases/classVista.php";
		require_once"inc/variables.php";

		// parametros para la vista 
		$aTitulos['t3']			= "Cierre de Sesión";
		$aMensajes['m01']		= "Se ha cerrado la sesión por inactividad!";
		$datos['aTitulos']		= $aTitulos;
		$datos['aMensajes']		= $aMensajes;

		session_start();
		session_destroy();
		$oSalida = new Vista('sesion.finalizar.php',$datos);
	}		
}

?>