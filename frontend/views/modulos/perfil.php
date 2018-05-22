<!--=====================================
Validación de perfil
======================================-->

<?php

$url = Ruta::ctrRuta();
$servidor = Ruta::ctrRutaServidor();

if(!isset($_SESSION["validarSesion"])){

	echo '<script>
	
		window.location = "'.$url.'";

	</script>';

	exit();

}

?>

<!--=====================================
Breadcrumb perfil
======================================-->

<div class="container-fluid well well-sm">
	
	<div class="container">
		
		<div class="row">
			
			<ul class="breadcrumb fondoBreadcrumb text-uppercase">
				
				<li><a href="<?php echo $url;  ?>">INICIO</a></li>
				<li class="active pagActiva"><?php echo $rutas[0] ?></li>

			</ul>

		</div>

	</div>

</div>

<!--=====================================
Perfil
======================================-->

<div class="container-fluid">

	<div class="container">

		<ul class="nav nav-tabs">
		  
	  		<li class="active">	  			
			  	<a data-toggle="tab" href="#pedidos">
			  	<i class="fa fa-list-ul"></i> Pedidos realizados</a>
	  		</li>

	  		<li>				
	  			<a data-toggle="tab" href="#perfil">
	  			<i class="fa fa-user"></i> Editar Perfil</a>
	  		</li>

	  		<li>				
		 	 	<a href="<?php echo $url; ?>promociones">
		 	 	<i class="fa fa-star"></i>	Promociones</a>
	  		</li>
		
		</ul>

		<div class="tab-content">

			<!--=====================================
			Pestaña pedidos
			======================================-->

			<div id="pedidos" class="tab-pane fade in active">
				<h1>Historial de pedidos</h1>
				<p>Content</p>
			</div>

			<!--=====================================
			Pestaña editar perfil
			======================================-->

			<div id="perfil" class="tab-pane fade in">

				<div class="row">

					<form method="post" enctype="multipart/form-data">

						<div class="col-md-3 col-sm-4 col-xs-12 text-center">
							
							<br>

							<figure id="imgPerfil">
								
								<?php

								echo '<input type="hidden" value="'.$_SESSION["id"].'" name="idUsuario">
									<input type="hidden" value="'.$_SESSION["password"].'" name="passUsuario">
							      	<input type="hidden" value="'.$_SESSION["foto"].'" name="fotoUsuario" id="fotoUsuario">
							      	<input type="hidden" value="'.$_SESSION["telefono"].'" name="telefonoUsuario" id="telefonoUsuario">
							      	<input type="hidden" value="'.$_SESSION["modo"].'" name="modoUsuario" id="modoUsuario">';

									if ($_SESSION["modo"] == "directo"){
										
										if ($_SESSION["foto"] != "") {
											
											echo '<img src="'.$url.$_SESSION["foto"].'" class="img-thumbnail">';

										}else{

											echo '<img src="'.$servidor.'views/img/usuarios/default/anonimo.jpg" class="img-thumbnail">';

										}

									}else{

										// echo '<img src="'.$_SESSION["foto"].'" class="img-thumbnail">';

									}

								?>

							</figure>

							<br>

							<?php

								echo '<button class="btn btn-default" id="btnCambtiarFoto">


									Cambiar Foto de perfil
									</button>';

							?>

						</div>

						<div class="col-md-9 col-sm-8 col-xs-12">
							
							<?php

								echo '

									<br>	

									<label class="control-label text-muted text-uppercase" for="editarNombre">Cambiar nombre de usuario:</label>

									<div class="input-group">

										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input type="text" class="form-control" id="editarNombre" name="editarNombre" value="'.$_SESSION["nombre"].'">

									</div>

									<br>

									<label class="control-label text-muted text-uppercase" for="editarEmail">Cambiar Correo Electrónico:</label>

									<div class="input-group">
								
										<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
										<input type="text" class="form-control" id="editarEmail" name="editarEmail" value="'.$_SESSION["email"].'">

									</div>

									<br>

									<label class="control-label text-muted text-uppercase" for="editarTelefono">Actualizar Número de teléfono:</label>

									<div class="input-group">
								
										<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
										<input type="text" class="form-control" id="editarTelefono" name="editarTelefono" value="'.$_SESSION["telefono"].'">

									</div>

									<br>

									<label class="control-label text-muted text-uppercase" for="editarPassword">Cambiar Contraseña:</label>

									<div class="input-group">
								
										<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
										<input type="text" class="form-control" id="editarPassword" name="editarPassword" placeholder="Escribe tu nueva contraseña">

									</div>

									<br>

									<button type="submit" class="btn btn-default backColor btn-md pull-left">Actualizar tus datos</button>

								';

							?>

						</div>

						<?php

							$actualizarPerfil = new ControladorUsuarios();
							$actualizarPerfil->ctrActualizarPerfil();

						?>	

					</form>

					<button class="btn btn-danger btn-md pull-right" id="eliminarUsuario">Eliminar cuenta</button>

				</div>

			</div>

		</div> 