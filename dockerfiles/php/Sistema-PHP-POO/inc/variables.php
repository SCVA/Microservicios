<?php
/***
	* Archivo   : variables.php
	* Type      : libreria 
	* Function  : Declaracion de variables, 
	*             constantes y/o arreglos asociativos.
	*/
  
	// arreglo para los Titulos
	$aTitulos['t1']	= "SGA";	// Titulo de la barra del navegador.
	$aTitulos['t2']	= "SGA";	// Titulo Principal en H1.
	$aTitulos['t3']	= "";	// Titulo del Modulo activo en H2.
	$aTitulos['t4']	= "";   // Titulo del Metodo/Funcion activa en H2/H3.

	// arreglo para mensajes
	$aMensajes['m01'] = "";
	$aMensajes['m02'] = "";
	
	// arreglo de los Nombres de los módulos
	$aNomMod['m01']	= "Perfiles de Usuario";
	$aNomMod['m02']	= "Ingreso de notas";
	$aNomMod['m03']	= "Calculo definitiva";

	// arreglo de las Rutas de los módulos
	$aRutaMod['m01']	= "index.php?cnt=Usuario&act=inicio";
	$aRutaMod['m02']	= "";
	$aRutaMod['m03']	= "";

	// arreglo de las Opciones del menu
	$aMenu['op01']		= "<article><a href='".$aRutaMod['m01']."'><img src='inc/img/perfil.png' alt='".$aNomMod['m01']."' height='50' width='50' /><p>".$aNomMod['m01']."</p></a></article>";
	$aMenu['op02']		= "<article><a href='".$aRutaMod['m02']."'><img src='inc/img/ingNotas.png' alt='".$aNomMod['m02']."' height='50' width='50' /><p>".$aNomMod['m02']."</p></a></article>";
	$aMenu['op03']		= "<article><a href='".$aRutaMod['m03']."'><img src='inc/img/calculo.png' alt='".$aNomMod['m03']."' height='50' width='50' /><p>".$aNomMod['m03']."</p></a></article>";
	$aMenu['op20']		= "<article><a href='index.php?cnt=Sesion&act=desconecta'><img src='inc/img/desconectar.png' alt='Desconectar' height='50' width='50' /><p>Desconectar</p></a></article>";
	
	// Variables del paginador
	$mostrarReg = 10;

	// Combo de listas Desplegables
	$combo_dpto  = array(
		"1" => "Académico",
		"2" => "Administración",
		"3" => "Asobies",
		"4" => "Decanato",
		"5" => "DIN",
		"6" => "Dpto. de TIC",
		"7" => "Postgrado",
		"8" => "Pregrado",
		"9" => "Recursos Humanos",
		"10" => "Secretaría",
		"11" => "Servicios Generales",
		"12" => "DAS y PC"
	 );
?>