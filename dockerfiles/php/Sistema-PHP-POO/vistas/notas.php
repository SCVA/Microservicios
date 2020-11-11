<?php 
	/**
	 * Archivo   : notas.php
	 * Type      : vista 
	 * Function  : Ingreso notas
	 */
	if(!isset($_SESSION['S_MOD03']))
	{
		header("Location: index.php?cnt=Sesion&act=inicio");
		exit;
	} 

?>
<body>
	<header>
		<article id="encabezado">
			<h1><?php echo $aTitulos["t2"]; ?><h1>
		</article>
	</header>
	<section id="barra-titulo">
		<article id="titulo">
			<h2><?php echo $aTitulos['t3']; ?></h2>
		</article>
	</section>
	<section id="contenedor"> 
		<article id="modulo-datos" class="t-tabla">
			<center>
				<table border=0 align="center">
					<tr>
						<th>ID/CEDULA</th>
						<th>NOMBRE</th>
						<th>N1</th>
						<th>N2</th>
						<th>N3</th>
						<th>ND</th>
					</tr>
					<tr>
						<td width="40"><?php echo $item['id_usu']; ?></td>
						<td width="370"><?php echo $userNombre; ?></td>
						<td width="40"><?php echo $item['n1']; ?></td>
						<td width="40"><?php echo $item['n2']; ?></td>
						<td width="40"><?php echo $item['n3']; ?></td>
						<td width="40"><?php echo ($item['n1']+$item['n2']+$item['n3'])/3; ?></td>
					</tr>
				</table>
			</center>
		</article>
		<article>
			<center>
				<table width="330" border="0" align="center">
					<tr>
						<td colspan="5" align="center">
							<button type="button" onclick=" location='index.php?cnt=Sesion&act=conectado' ">Volver</button>
						</td>
					</tr>
				</table>
			</center>
		</article>
	</section>
	<article id="usuarios">   
		<label><?php echo "<strong>Usuario:</strong> ".$userNombre; ?></label>
	</article>