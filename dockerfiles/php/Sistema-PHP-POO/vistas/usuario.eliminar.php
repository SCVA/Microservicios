<?php 
	/**
	* Archivo	: personal.eliminar.php
	* Type      : vista 
	* Funcion 	: para eliminar datos
	* 
	*/
	if(!isset($_SESSION['S_MOD01']))
	{
		header("Location: index.php?cnt=Sesion&act=inicio");
		exit;
	}

	$personalborrar = "index.php?cnt=Usuario&act=borrar";
	
?>
<body>
	<header>
		<article id="encabezado">
			<h1><?php echo $aTitulos['t2']; ?><h1>
		</article>
	</header>
	<section id="barra-titulo">
		<article id="titulo">
			<h2><?php echo $aTitulos['t3']; ?></h2>
		</article>
	</section>
	<section id="contenedor">
	   <form action="<?php echo $personalborrar; ?>" method="post">
			<article id="modulo-datos" class="t-tabla">
				<center>
					<table><tr>
						<th width="1000em">
							<h3><?php echo $aTitulos["t4"]; ?></h3>
						</th></tr>
						<tr>
							<td></td>
					</tr></table>
					<br />					
					<section class="t-fila">
						<input type="hidden" name="idB" id="idB" value="<?php echo $id; ?>" />
						<section class="t-celda">
							<div class="formula-campo">
								<div class="etiqueta1"><label for = "id">ID/Cédula:</label><hr /></div> 
								<div class="campo1">
									<input type="text" 
											 name="id" 
											 id="id" 
											 maxlength="9" 
											 size="8" 
											 value="<?php echo $id; ?>" 
											 disabled="disabled" />
								</div>
							</div>
							<div class="formula-campo">
								<div class="etiqueta1"><label for = "descrip">Nombre:</label><hr /></div>
								<div class="campo1">
									<input type="text" 
											 name="descrip" 
											 id="descrip" 
											 maxlength="25" 
											 size="18" 
											 value="<?php echo $descrip; ?>" 
											 disabled="disabled" />
								</div>
							</div>
							<div class="formula-campo">
								<div class="etiqueta1"><label for = "activo">Usuario activo:</label><hr /></div>
								<div class="campo1">
									<select name="activo" id="activo" size="1" disabled="disabled" />>
										<option value="<?php echo $activo; ?>" selected>
											<font><?php echo $activo; ?><font>
										</option>
										<option value="N">N</option>
										<option value="S">S</option>								
									</select>
								</div>
							</div>
							<div class="formula-campo">
								<div class="etiqueta1"><label for = "clave">Clave:</label><hr /></div>
								<div class="campo1">
									<input type="hidden" name="claveM" id="claveM" value="<?php echo $clave; ?>" />
									<input type="password" 
											 name="clave" 
											 id="clave" 
											 maxlength="15" 
											 size="10" 
											 value="<?php echo $clave; ?>" 
											 disabled="disabled" />									
								</div>
							</div>
						</section>
						<section class="t-celda">
							<div class="formula-campo">
								<div class="etiqueta2"><label for = 'mod01'><?php echo $aNomMod['m01']; ?>:</label><hr /></div>
								<div class="campo2">
									<select name='mod01' id='mod01' size='1' disabled="disabled" >
										<option value='<?php echo $mod01; ?>' selected>
											<font><?php echo $mod01; ?></font>
										</option>
										<option value='L'>L</option>
										<option value='E'>E</option>
										<option value='X'>X</option>
									</select>
								</div>
							</div>
							<div class="formula-campo">
								<div class="etiqueta2"><label for = 'mod02'><?php echo $aNomMod['m02']; ?>:</label><hr /></div>
								<div class="campo2">
									<select name='mod02' id='mod02' size='1' disabled="disabled" >
										<option value='<?php echo $mod02; ?>' selected>
											<font><?php echo $mod02; ?></font>
										</option>
										<option value='L'>L</option>
										<option value='E'>E</option>
										<option value='X'>X</option>
									</select>
								</div>
							</div>					
							<div class="formula-campo">
								<div class="etiqueta2"><label for = 'mod03'><?php echo $aNomMod['m03']; ?>:</label><hr /></div>
								<div class="campo2">
									<select name='mod03' id='mod03' size='1' disabled="disabled" >
										<option value='<?php echo $mod03; ?>' selected>
											<font><?php echo $mod03; ?></font>
										</option>
										<option value='L'>L</option>
										<option value='E'>E</option>
										<option value='X'>X</option>
									</select>
								</div>
							</div>
						</section>
					</section>					
				</center>
			</article>
			<article>
				<center>
					<table width="330" border="0" align="center">
						<tr>
							<td colspan="2" align="center">
								<input type="submit" value="Borrar" />
								<!-- button type="button" onclick=" location='index.php?cnt=Usuario&act=regrabar' ">Grabar</button -->
								<button type="button" onclick=" location='index.php?cnt=Usuario&act=inicio' ">Volver</button>
							</td>
						</tr>
					</table>
				<center>
			</article>
		</form>
	</section>
	<article id="usuarios">   
		<label><?php echo "<strong>Usuario:</strong> ".$userNombre; ?></label>
	</article>