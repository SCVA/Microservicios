<?php
/**
	* Archivo   : Usuario.php
	* Type      : Controlador 
	* Function  : Crea los objetos Usuario
	*/

class Usuario 
{
	// Metodo del paginador para iniciar e ir a la primera pagina
	public function inicio() {  

		require_once "inc/variables.php";
		require_once "clases/classVista.php";
		require_once "modelo/modeloUsuario.php";		
		
		// LECTURA DE LA TABLA usuario
		$oUsuario = new modeloUsuario();
		$rs = $oUsuario->leerTodo(0,$mostrarReg);

		// CALCULAR NUMERO DE PAGINAS
		$ultimoReg = $oUsuario->contarRegistro();
		$ultimaPag = $ultimoReg/$mostrarReg;
		//verificamos residuo para ver si llevará decimales
		$Res = $ultimoReg % $mostrarReg;
		// si hay residuo usamos funcion floor para que me
		// devuelva la parte entera, SIN REDONDEAR, y le sumamos
		// una unidad para obtener la ultima pagina
		if($Res > 0) $ultimaPag = floor($ultimaPag)+1;

		$numPag = 0; // Primera pagina
		//echo "Numero de Pagina: ".$numPag;

		// parametros para la vista    
		$aTitulos['t3']             = $aNomMod['m01'];
		$datos['aTitulos']          = $aTitulos;
		$datos['aNomMod']			= $aNomMod;
		$datos['item']              = $rs; //antes $item
		$datos['numPag']            = $numPag;
		$datos['ultimaPag']         = $ultimaPag;
		session_start();
		$datos['userNombre']        = $_SESSION['nombreSesion'];
		$datos['S_MOD01']           = $_SESSION['S_MOD01'];
		$datos["userID"] = $_SESSION["idSesion"];

		// Si tiene acceso al modulo 01
		if ($datos['S_MOD01'] != 'X' ) {
			// Salida de la vista
			$oSalida = new Vista("usuario.php",$datos); 
		} else {
			// Lo devuelve al inicio de sesion
			$oSalida = new Vista("sesion.inicio.php",$datos); 
		}
	}
	// Metodo del paginador para ir a la ultima pagina
	public function fin() {  

		require_once"clases/classVista.php";
		require_once"modelo/modeloUsuario.php";
		// conexion a la base de datos
		////require_once"inc/dbConnect.php";
		require_once"inc/variables.php";
		
		// LECTURA DE LA TABLA usuario
		$oUsuario = new modeloUsuario();

		// CALCULAR NUMERO DE PAGINAS
		$ultimoReg = $oUsuario->contarRegistro();
		$ultimaPag = $ultimoReg/$mostrarReg;
		//verificamos residuo para ver si llevará decimales
		$Res = $ultimoReg % $mostrarReg;
		// si hay residuo usamos funcion floor para que me
		// devuelva la parte entera, SIN REDONDEAR, y le sumamos
		// una unidad para obtener la ultima pagina
		if($Res > 0) $ultimaPag = floor($ultimaPag)+1;
		$inicioReg = ($ultimaPag-1) * $mostrarReg;
		$rs = $oUsuario->leerTodo($inicioReg,$mostrarReg);
		$numPag = $ultimaPag;
		// parametros para la vista    
		$aTitulos['t3']             = $aNomMod['m01'];
		$datos['aTitulos']          = $aTitulos;
		$datos['aNomMod']			= $aNomMod;
		$datos['item']              = $rs; //antes $item
		$datos['numPag']            = $numPag-1;
		$datos['ultimaPag']         = $ultimaPag;
		session_start();
		$datos['userNombre']        = $_SESSION['nombreSesion'];
		$datos["userID"] = $_SESSION["idSesion"];
		$datos['S_MOD01']           = $_SESSION['S_MOD01'];

		// Si tiene acceso al modulo 01
		if ($datos['S_MOD01'] != 'X' ) {
			// Salida de la vista
			$oSalida = new Vista("usuario.php",$datos); 
		} else {
			// Lo devuelve al inicio de sesion
			$oSalida = new Vista("sesion.inicio.php",$datos); 
		}
	}
	// Metodo del paginador para avanzar 1 registro
	public function adelante() {  

		require_once"clases/classVista.php";
		require_once"modelo/modeloUsuario.php";
		require_once"inc/variables.php";

		// Lectura de la pagina solicitada desde el formulario
		foreach ($_GET as $datoRecibido => $valor) {
			// El $$ no es un error
			// va asi para obtener el nombre de la variable.
			$$datoRecibido = $valor;
			$datos[$datoRecibido] = $valor;
		}

		$oUsuario = new modeloUsuario();
		// CALCULAR NUMERO DE PAGINAS
		$numPag++;   
		$inicioReg = $numPag * $mostrarReg;
		$ultimoReg = $oUsuario->contarRegistro();
		$ultimaPag = $ultimoReg/$mostrarReg;
		//verificamos residuo para ver si llevará decimales
		$Res = $ultimoReg % $mostrarReg;
		// si hay residuo usamos funcion floor para que me
		// devuelva la parte entera, SIN REDONDEAR, y le sumamos
		// una unidad para obtener la ultima pagina
		if($Res > 0) $ultimaPag = floor($ultimaPag)+1;
		//echo "Numero de Pagina: ".$numPag." Inicio: ".$inicioReg; 

		// LECTURA DE LA TABLA usuario
		$rs = $oUsuario->leerTodo($inicioReg,$mostrarReg); 

		// parametros para la vista
		$aTitulos['t3']             = $aNomMod['m01'];
		$datos['aTitulos']          = $aTitulos;
		$datos['aNomMod']			= $aNomMod;
		$datos['item']              = $rs; //antes $item
		$datos['numPag']            = $numPag;
		$datos['ultimaPag']         = $ultimaPag;
		session_start();
		$datos['userNombre']        = $_SESSION['nombreSesion'];
		$datos['S_MOD01']           = $_SESSION['S_MOD01'];
		$datos["userID"] = $_SESSION["idSesion"];

		// Si tiene acceso al modulo 01
		if ($datos['S_MOD01'] != 'X' ) {
			// Salida de la vista
			$oSalida = new Vista("usuario.php",$datos); 
		} else {
			// Lo devuelve al inicio de sesion
			$oSalida = new Vista("sesion.inicio.php",$datos); 
		}
	}
	// Metodo del paginador para retroceder 1 registro
	public function atras() {  

		require_once"clases/classVista.php";
		require_once"modelo/modeloUsuario.php";
		// conexion a la base de datos
		////require_once"inc/dbConnect.php";
		require_once"inc/variables.php";

		// Lectura de la pagina solicitada desde el formulario
		foreach ($_GET as $datoRecibido => $valor) {
			// El $$ no es un error, va asi para obtener el nombre de la variable.
			$$datoRecibido = $valor;
			$datos[$datoRecibido] = $valor;
		}

		$oUsuario = new modeloUsuario();
		// CALCULAR NUMERO DE PAGINAS
		$ultimoReg = $oUsuario->contarRegistro();
		$ultimaPag = $ultimoReg/$mostrarReg;
		//verificamos residuo para ver si llevará decimales
		$Res = $ultimoReg % $mostrarReg;
		// si hay residuo usamos funcion floor para que me
		// devuelva la parte entera, SIN REDONDEAR, y le sumamos
		// una unidad para obtener la ultima pagina
		if($Res > 0) $ultimaPag = floor($ultimaPag)+1;
		$numPag--;
		$inicioReg = $numPag * $mostrarReg;
		//echo "Numero de Pagina: ".$numPag." Inicio: ".$inicioReg;

		// LECTURA DE LA TABLA usuario
		$rs = $oUsuario->leerTodo($inicioReg,$mostrarReg);

		// parametros para la vista
		$aTitulos['t3']             = $aNomMod['m01'];
		$datos['aTitulos']          = $aTitulos;
		$datos['aNomMod']			= $aNomMod;
		$datos['item']              = $rs; //antes $item
		$datos['numPag']            = $numPag;
		$datos['ultimaPag']         = $ultimaPag;
		session_start();
		$datos['userNombre']        = $_SESSION['nombreSesion'];
		$datos['S_MOD01']           = $_SESSION['S_MOD01'];
		$datos["userID"] = $_SESSION["idSesion"];

		// Si tiene acceso al modulo 01
		if ($datos['S_MOD01'] != 'X' ) {
			// Salida de la vista
			$oSalida = new Vista("usuario.php",$datos); 
		} else {
			// Lo devuelve al inicio de sesion
			$oSalida = new Vista("sesion.inicio.php",$datos); 
		}
	}

	// Incluir Usuarios//
	function incluir() {

		require_once"clases/classVista.php";
		require_once"inc/variables.php";

		// Parametros de la Vista
		$aTitulos['t3']             = $aNomMod['m01'];
		$aTitulos['t4']             = "Nuevo usuario";
		$datos['aTitulos']          = $aTitulos;
		$datos['aNomMod']			= $aNomMod;
		$datos['id']                = "";
		$datos['descrip']           = "";
		$datos['clave']             = "";
		$datos['activo']            = "";
		$datos['mod01']             = "";
		$datos['mod02']             = "";
		$datos['mod03']             = "";
		$datos['errorId']           = "";
		$datos['errorDescrip']      = "";
		$datos['errorClave']        = "";
		$datos['errorModulo']       = "";
		$datos['error']             = "";

		session_start();
		$datos['userNombre']        = $_SESSION['nombreSesion'];
		$datos['S_MOD01']           = $_SESSION['S_MOD01'];
		$datos["userID"] = $_SESSION["idSesion"];

		// Si tiene permiso de escritura en el modulo 01
		if ($_SESSION['S_MOD01'] == 'E' ) {
			// Salida de la Vista
			$oSalida = new Vista("usuario.incluir.php",$datos);
		} else {
			// Lo devuelve al inicio de sesion
			$oSalida = new Vista("sesion.inicio.php",$datos); 
		} 
	}

	// Incluir 2
	function grabar() {

		require_once"clases/classVista.php";
		require_once"clases/classValidar.php";
		require_once"modelo/modeloUsuario.php";
		// Conexion a la base de datos
		////require_once"inc/dbConnect.php";
		require_once"inc/variables.php";

		// Lectura de datos del formulario
		foreach ($_POST as $datoRecibido => $valor) {
			// El $$ no es un error, va asi para obtener el nombre de la variable.
			$$datoRecibido = $valor;
			$datos[$datoRecibido] = $valor;
		}
		
		/******************************************/
		// Verificar si hay errores en las validaciones
		$oValida = new Validar();
		$valores = $oValida->validaUsuario($datos);

		// Parametros de la Vista
		$aTitulos['t3']             = $aNomMod['m01'];
		$aTitulos['t4']             = "Nuevo usuario";
		$valores['aTitulos']        = $aTitulos;
		$valores['aNomMod']			= $aNomMod;

		$id                = $valores['id'];
		$descrip           = $valores['descrip'];
		$clave             = $valores['clave'];
		$activo            = $valores['activo'];
		$mod01             = $valores['mod01'];
		$mod02             = $valores['mod02'];
		$mod03             = $valores['mod03'];

		session_start();
		$valores['userNombre']        = $_SESSION['nombreSesion'];		
		$valores['S_MOD01']           = $_SESSION['S_MOD01'];
		$datos["userID"] = $_SESSION["idSesion"];

		// Si tiene permiso de escritura en el modulo 01
		if ($_SESSION['S_MOD01'] == 'E' ) {
			// Salida de la Vista
			if ($valores['error'] > 0) {
				echo "// Volvemos a pedir los datos en la vista";
				$oSalida = new Vista("usuario.incluir.php",$valores);
			} else {
				// Insertar datos en la tabla
				$oUsuario = new modeloUsuario();
				$errorIns = $oUsuario->insertar($id,$descrip,$clave,$activo,$mod01,$mod02,$mod03);
				// Sino hubo error al insertar (como un id ya existente): ";//echo "$errorIns";exit();
				if ($errorIns != false) {
					$oSalida = new Vista("usuario.incluir.ok.php",$valores);
					//echo "sin error";
				} else {
					$datos['errorId']        = "Id/Cédula ya existe!!!";
					//$datos['errorIns']       = $errorIns;
					$oSalida = new Vista("usuario.incluir.php",$valores);
					//echo "con error";
				}      
			}
		} else {
			// Lo devuelve al inicio de sesion
			$oSalida = new Vista("sesion.inicio.php",$valores); 
		}
	}

	// Modificar Usuario
	function modificar() {

		require_once"clases/classVista.php";
		require_once"clases/classValidar.php";
		require_once"modelo/modeloUsuario.php";
		// Conexion a la base de datos
		////require_once"inc/dbConnect.php";
		require_once"inc/variables.php";

		// Lectura del ID del formulario
		foreach ($_GET as $datoRecibido => $valor) {
			// El $$ no es un error, va asi para obtener el nombre de la variable.
			$$datoRecibido = $valor;
			$datos[$datoRecibido] = $valor;
		}

		//Leer el registro a modificar
		$oUsuario = new modeloUsuario();
		$rs = $oUsuario->obtenerDatos($id);
	
		$descrip = $rs['descrip_usu'];
		$clave   = $rs['clave_usu'];
		$activo  = $rs['activo'];
		$mod01   = $rs['modulo01'];
		$mod02   = $rs['modulo02'];
		$mod03   = $rs['modulo03'];

		// Parametros de la Vista
		$aTitulos['t3']             = $aNomMod['m01'];
		$aTitulos['t4']             = "Modificar Datos";
		$datos['aTitulos']          = $aTitulos;
		$datos['aNomMod']			= $aNomMod;
		$datos['id']                = $id;
		$datos['descrip']           = $descrip;
		$datos['clave']             = $clave;
		$datos['activo']            = $activo;
		$datos['mod01']             = $mod01;
		$datos['mod02']             = $mod02;
		$datos['mod03']             = $mod03;		
		$datos['errorId']           = "";
		$datos['errorDescrip']      = "";
		$datos['errorClave']        = "";
		$datos['errorModulo']       = "";
		session_start();
		$datos['userNombre']        = $_SESSION['nombreSesion'];
		$datos['S_MOD01']           = $_SESSION['S_MOD01'];
		$datos["userID"] = $_SESSION["idSesion"];

		// Si tiene permiso de escritura en el modulo 01
		if ($_SESSION['S_MOD01'] == 'E' ) {
			// Salida de la Vista
			$oSalida = new Vista("usuario.modificar.php",$datos);
		} else {
			// Lo devuelve al inicio de sesion
			$oSalida = new Vista("sesion.inicio.php",$datos); 
		}
	}

	// Modificar2
	function regrabar() {

		require_once"clases/classVista.php";
		require_once"clases/classValidar.php";
		require_once"modelo/modeloUsuario.php";
		// Conexion a la base de datos
		////require_once"inc/dbConnect.php";
		require_once"inc/variables.php";

		// Lectura de datos del formulario
		foreach ($_POST as $datoRecibido => $valor) {
			// El $$ no es un error, va asi para obtener el nombre de la variable.
			$$datoRecibido = $valor;
			$datos[$datoRecibido] = $valor;
		}

		// Verificar si hay errores en las validaciones
		$oValida = new Validar();
		$valores = $oValida->validaUsuario($datos);

		// Parametros de la Vista
		$aTitulos['t3']             = $aNomMod['m01'];
		$aTitulos['t4']             = "Modificar usuario";
		$valores['aTitulos']        = $aTitulos;
		$valores['aNomMod']			= $aNomMod;

		$id                = $valores['id'];
		$descrip           = $valores['descrip'];
		$clave             = $valores['clave'];
		$activo            = $valores['activo'];
		$mod01             = $valores['mod01'];
		$mod02             = $valores['mod02'];
		$mod03             = $valores['mod03'];

		session_start();
		$valores['userNombre']        = $_SESSION['nombreSesion'];		
		$valores['S_MOD01']           = $_SESSION['S_MOD01'];
		$datos["userID"] = $_SESSION["idSesion"];

		// Si tiene permiso de escritura en el modulo 01
		if ($valores['S_MOD01'] == 'E' ) {
			// Salida de la Vista
			// Verificar si hay errores en las validaciones
			if ($valores['error'] > 0) {
				// Salida de la Vista
				$oSalida = new Vista("usuario.modificar.php",$valores);
			} else {
				// Modificar datos en la tabla				
				$oUsuario = new modeloUsuario();
				if($clave != '**********') {
					$oUsuario->modificar($idM,$descrip,$clave,$activo,$mod01,$mod02,$mod03);
				} else {
					$oUsuario->modificar2($idM,$descrip,$activo,$mod01,$mod02,$mod03);
				}
				// Salida de la Vista
				$oSalida = new Vista("usuario.modificar.ok.php",$valores); 
			}
		} else {
			// Lo devuelve al inicio de sesion
			$oSalida = new Vista("sesion.inicio.php",$valores); 
		}
	}

	// Eliminar
	function eliminar() {

		require_once"clases/classVista.php";
		require_once"modelo/modeloUsuario.php";
		// Conexion a la base de datos
		////require_once"inc/dbConnect.php";
		require_once"inc/variables.php";

		// Lectura del ID del formulario
		foreach ($_GET as $datoRecibido => $valor) {
			// El $$ no es un error, va asi para obtener el nombre de la variable.
			$$datoRecibido = $valor;
			$datos[$datoRecibido] = $valor;
		}

		//Leer el registro a eliminar
		$oUsuario = new modeloUsuario();
		$rs = $oUsuario->obtenerDatos($id);

		//while ($rs) //($rows = $rs) 
		//{
			$descrip = $rs['descrip_usu'];
			$clave   = $rs['clave_usu'];
			$activo  = $rs['activo'];
			$mod01   = $rs['modulo01'];
			$mod02   = $rs['modulo02'];
			$mod03   = $rs['modulo03'];
		//}

		// Parametros de la Vista
		$aTitulos['t3']             = $aNomMod['m01'];
		$aTitulos['t4']             = "Esta seguro de querer borrar este usuario?";
		$datos['aTitulos']          = $aTitulos;
		$datos['aNomMod']			= $aNomMod;
		$datos['id']                = $id;
		$datos['descrip']           = $descrip;
		$datos['clave']             = $clave;
		$datos['activo']            = $activo;
		$datos['mod01']             = $mod01;
		$datos['mod02']             = $mod02;
		$datos['mod03']             = $mod03;
		$datos['errorId']           = "";
		$datos['errorDescrip']      = "";
		$datos['errorClave']        = "";
		$datos['errorModulo']       = "";
		session_start();
		$datos['userNombre']        = $_SESSION['nombreSesion'];
		$datos['S_MOD01']           = $_SESSION['S_MOD01'];
		$datos["userID"] = $_SESSION["idSesion"];

		// Si tiene permiso de escritura en el modulo 01
		if ($datos['S_MOD01'] == 'E' ) {
			// Salida de la Vista
			$oSalida = new Vista("usuario.eliminar.php",$datos);  
		} else {
			// Lo devuelve al inicio de sesion
			$oSalida = new Vista("sesion.inicio.php",$datos); 
		}    
	}

	// Eliminar2
	function borrar() {

		require_once"clases/classVista.php";
		require_once"clases/classValidar.php";
		require_once"modelo/modeloUsuario.php";
		// Conexion a la base de datos
		////require_once"inc/dbConnect.php";
		require_once"inc/variables.php";

		// Lectura de datos del formulario
		foreach ($_POST as $datoRecibido => $valor) {
			// El $$ no es un error, va asi para obtener el nombre de la variable.
			$$datoRecibido = $valor;
			$datos[$datoRecibido] = $valor;
		}
		//echo "Variable Cedula:".$idB;
		// Modificar datos en la tabla
		$oUsuario = new modeloUsuario();
		$oUsuario->eliminar($idB);

		// Parametros de la Vista
		$aTitulos['t3']             = $aNomMod['m01'];
		$aTitulos['t4']             = "Eliminar Datos";
		$datos['aTitulos']          = $aTitulos;
		$datos['aNomMod']			= $aNomMod;
		$datos['id']				= "";
		$datos['descrip']			= "";
		$datos['clave']				= "";
		$datos['activo']			= "";
		$datos['mod01']             = "";
		$datos['mod02']             = "";
		$datos['mod03']             = "";
		session_start();
		$datos['userNombre']        = $_SESSION['nombreSesion'];
		$datos['S_MOD01']           = $_SESSION['S_MOD01'];
		$datos["userID"] = $_SESSION["idSesion"];

		// Si tiene permiso de escritura en el modulo 01
		if ($datos['S_MOD01'] == 'E' ) {
			// Salida de la Vista
			$oSalida = new Vista("usuario.eliminar.ok.php",$datos);
		} else {
			// Lo devuelve al inicio de sesion
			$oSalida = new Vista("sesion.inicio.php",$datos); 
		}
	}

}
?>