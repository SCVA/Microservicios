<?php 
	/**
	 * Archivo   : notas.php
	 * Type      : vista 
	 * Function  : Ingreso notas
	 */
	if(!isset($_SESSION['S_MOD02']))
	{
		header("Location: index.php?cnt=Sesion&act=inicio");
		exit;
	} 
	
	$personalinc2 = "index.php?cnt=NotasIn&act=incluir";

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
		<form action="<?php echo $personalinc2; ?>" method="post">
		<article id="modulo-datos" class="t-tabla">
			<center>
				<table border=0 align="center">
					<tr>
						<th>ID/CEDULA</th>
						<th>NOMBRE</th>
						<th>N1</th>
						<th>N2</th>
						<th>N3</th>
					</tr>
					<tr>
						<td width="40"><?php echo $userID; ?></td>
						<td width="370"><?php echo $userNombre; ?></td>
						<td width="40"><input type="number" id="N_1" name="N_1" min="0" max="5" step="0.01" value="<?php echo $item['n1']; ?>"></td>
						<td width="40"><input type="number" id="N_2" name="N_2" min="0" max="5" step="0.01" value="<?php echo $item['n2']; ?>"></td>
						<td width="40"><input type="number" id="N_3" name="N_3" min="0" max="5" step="0.01" value="<?php echo $item['n3']; ?>"></td>
					</tr>
				</table>
			</center>
		</article>
		<article>
			<center>
				<table width="330" border="0" align="center">
					<tr>
						<td colspan="5" align="center">
							<?php if ($S_MOD02=='E') { ?>
								<input type="submit" value="Grabar" />
							<?php } else { ?>
								<button type='button' disabled='disabled' >Grabar</button>
							<?php } ?>
							<button type="button" onclick=" location='index.php?cnt=Sesion&act=conectado' ">Volver</button>
						</td>
					</tr>
				</table>
			</center>
		</article>
		</form>
	</section>
	<article id="usuarios">   
		<label><?php echo "<strong>Usuario:</strong> ".$userNombre; ?></label>
	</article>