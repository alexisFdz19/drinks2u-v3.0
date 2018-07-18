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
				
				<div class="panel-group">

					<?php

					$item = "id_usuario";
					$valor = $_SESSION["id"];

					$pedidos = ControladorUsuarios::ctrMostrarPedidos($item, $valor);

					 if(!$pedidos){

						echo '<div class="col-xs-12 text-center error404">
				               
				    		<h1><small>Vaya</small></h1>
				    
				    		<h2>Aún no tienes pedidos realizados</h2>

				  		</div>';

					}else{

						foreach ($pedidos as $key => $value1) {

							$ordenar = "fecha";
							$item = "id";
							$valor = $value1["id_producto"];

							$productos = ControladorProductos::ctrListarProductos($ordenar, $item, $valor);

							foreach ($productos as $key => $value2) {	
							
								echo '<div class="panel panel-default">

										<div class="panel-body">

											<div class="col-md-2 col-sm-6 con-xs-12">

												<figure>

													<a href="'.$url.$value2["ruta"].'">

													<img class="img-thumbnail" src="'.$servidor.$value2["portada"].'">

													</a>


												</figure>

											</div>

											<div class="col-sm-6 col-xs-12">

												<h1><small>'.$value2["titulo"].'</small></h1>

												<p>'.$value2["titular"].'</p>';

													
													if($value1["envio"] == 3){

														echo '<div class="progress">

															<div class="progress-bar progress-bar-warning role="progressbar" style="width:100%">
																<i class="fa fa-exclamation-triangle"></i> No recibido en domicilio
															</div>

														</div>';

													}


													if($value1["envio"] == 0){

														echo '<div class="progress">

															<div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" style="width:33.33%">
																<i class="fa fa-check"></i> Recibido
															</div>

															<div class="progress-bar progress-bar-default" role="progressbar" style="width:33.33%">
																<i class="fa fa-clock-o"></i> Despachado
															</div>

															<div class="progress-bar progress-bar-success" role="progressbar" style="width:33.33%">
																<i class="fa fa-clock-o"></i> Entregado
															</div>

														</div>';

													}

													if($value1["envio"] == 1){

														echo '<div class="progress">

															<div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" style="width:33.33%">
																<i class="fa fa-check"></i> Recibido
															</div>

															<div class="progress-bar progress-bar-default progress-bar-striped active" role="progressbar" style="width:33.33%">
																<i class="fa fa-check"></i> Despachado
															</div>

															<div class="progress-bar progress-bar-success" role="progressbar" style="width:33.33%">
																<i class="fa fa-clock-o"></i> Entregado
															</div>

														</div>';

													}

													if($value1["envio"] == 2){

														echo '<div class="progress">

															<div class="progress-bar progress-bar-info" role="progressbar" style="width:33.33%">
																<i class="fa fa-check"></i> Recibido
															</div>

															<div class="progress-bar progress-bar-default" role="progressbar" style="width:33.33%">
																<i class="fa fa-check"></i> Despachado
															</div>

															<div class="progress-bar progress-bar-success" role="progressbar" style="width:33.33%">
																<i class="fa fa-check"></i> Entregado
															</div>

														</div>';

													}


												echo '<h4 class="pull-left"><small>Pedido el '.$value1["fecha"].'</small></h4>

												<div class="col-md-6 col-xs-12">
					
													<h6>
														
														<a class="dropdown-toggle pull-right text-muted" data-toggle="dropdown" href="">
															
															<i class="fa fa-plus"></i> Informacion del repartidor

														</a>


														<br>';

														if ($value1["id_repartidor"] != "") {

															$item = "id";
															$valor = $value1["id_repartidor"];

															$repartidor = ControladorRepartidor::ctrMostrarRepartidor($item, $valor);
														

															echo '<ul class="dropdown-menu pull-right btnMostrarRepartidor">';

															if ($value1["envio"] != 3){
																
																echo '<li>
																			
																			<p>
																				<i class="fa fa-user"></i>
																				Nombre: '.$repartidor["nombre"].'
																			</p>

																		</li>

																		<hr>

																		<li>
																			
																			<p>
																				<i class="fa fa-phone"></i>
																				Telefono: <a href="tel:'.$repartidor["telefono"].'"> Llamar</a>
																			</p>

																		</li>

																		<hr>

																		<li>
																			
																			<p>
																				<i class="fa fa-motorcycle"></i>
																				Vehiculo: '.$repartidor["vehiculo"].'
																			</p>

																		</li>

																		<hr>

																		<li>
																			
																			<p>
																				<i class="fa fa-road"></i>
																				Placas: '.$repartidor["placas"].'
																			</p>

																		</li>

																	</ul>';

															}else{

																echo '
																<li>
																			
																	<p>
																		<i class="fa fa-user"></i>
																		Nombre: '.$repartidor["nombre"].'
																	</p>

																</li>

																<hr>

																<li>
																			
																	<p>
																		<i class="fa fa-check"></i>
																		Entregado
																	</p>

																</li>';

															}						

														}

													echo '

													</h6>

												</div>
																
											</div>';

											if($value1["envio"] == 3){

												echo '<div class="col-md-4 col-xs-12">';

												$datos = array("idUsuario"=>$_SESSION["id"],
																"idProducto"=>$value2["id"]);

												$comentarios = ControladorUsuarios::ctrMostrarComentariosPerfil($datos);

													echo '<div class="pull-right">

														<a class="calificarProducto" href="#modalComentarios" data-toggle="modal" idComentario="'.$comentarios["id"].'">
														
															<button class="btn btn-default backColor">Califica este producto</button>

														</a>

													</div>

													<br><br>

													<div class="pull-right">

														<h3 class="text-right">';

														if($comentarios["calificacion"] == 0 && $comentarios["comentario"] == ""){

															echo '<i class="fa fa-star-o text-success" aria-hidden="true"></i>
																	<i class="fa fa-star-o text-success" aria-hidden="true"></i>
																	<i class="fa fa-star-o text-success" aria-hidden="true"></i>
																	<i class="fa fa-star-o text-success" aria-hidden="true"></i>
																	<i class="fa fa-star-o text-success" aria-hidden="true"></i>';

														}else{

															switch($comentarios["calificacion"]){

																case 0.5:
																echo '<i class="fa fa-star-half-o text-success" aria-hidden="true"></i>
																	  <i class="fa fa-star-o text-success" aria-hidden="true"></i>
																	  <i class="fa fa-star-o text-success" aria-hidden="true"></i>
																	  <i class="fa fa-star-o text-success" aria-hidden="true"></i>
																	  <i class="fa fa-star-o text-success" aria-hidden="true"></i>';
																break;

																case 1.0:
																echo '<i class="fa fa-star text-success" aria-hidden="true"></i>
																	  <i class="fa fa-star-o text-success" aria-hidden="true"></i>
																	  <i class="fa fa-star-o text-success" aria-hidden="true"></i>
																	  <i class="fa fa-star-o text-success" aria-hidden="true"></i>
																	  <i class="fa fa-star-o text-success" aria-hidden="true"></i>';
																break;

																case 1.5:
																echo '<i class="fa fa-star text-success" aria-hidden="true"></i>
																	  <i class="fa fa-star-half-o text-success" aria-hidden="true"></i>
																	  <i class="fa fa-star-o text-success" aria-hidden="true"></i>
																	  <i class="fa fa-star-o text-success" aria-hidden="true"></i>
																	  <i class="fa fa-star-o text-success" aria-hidden="true"></i>';
																break;

																case 2.0:
																echo '<i class="fa fa-star text-success" aria-hidden="true"></i>
																	  <i class="fa fa-star text-success" aria-hidden="true"></i>
																	  <i class="fa fa-star-o text-success" aria-hidden="true"></i>
																	  <i class="fa fa-star-o text-success" aria-hidden="true"></i>
																	  <i class="fa fa-star-o text-success" aria-hidden="true"></i>';
																break;

																case 2.5:
																echo '<i class="fa fa-star text-success" aria-hidden="true"></i>
																	  <i class="fa fa-star text-success" aria-hidden="true"></i>
																	  <i class="fa fa-star-half-o text-success" aria-hidden="true"></i>
																	  <i class="fa fa-star-o text-success" aria-hidden="true"></i>
																	  <i class="fa fa-star-o text-success" aria-hidden="true"></i>';
																break;

																case 3.0:
																echo '<i class="fa fa-star text-success" aria-hidden="true"></i>
																	  <i class="fa fa-star text-success" aria-hidden="true"></i>
																	  <i class="fa fa-star text-success" aria-hidden="true"></i>
																	  <i class="fa fa-star-o text-success" aria-hidden="true"></i>
																	  <i class="fa fa-star-o text-success" aria-hidden="true"></i>';
																break;

																case 3.5:
																echo '<i class="fa fa-star text-success" aria-hidden="true"></i>
																	  <i class="fa fa-star text-success" aria-hidden="true"></i>
																	  <i class="fa fa-star text-success" aria-hidden="true"></i>
																	  <i class="fa fa-star-half-o text-success" aria-hidden="true"></i>
																	  <i class="fa fa-star-o text-success" aria-hidden="true"></i>';
																break;

																case 4.0:
																echo '<i class="fa fa-star text-success" aria-hidden="true"></i>
																	  <i class="fa fa-star text-success" aria-hidden="true"></i>
																	  <i class="fa fa-star text-success" aria-hidden="true"></i>
																	  <i class="fa fa-star text-success" aria-hidden="true"></i>
																	  <i class="fa fa-star-o text-success" aria-hidden="true"></i>';
																break;

																case 4.5:
																echo '<i class="fa fa-star text-success" aria-hidden="true"></i>
																	  <i class="fa fa-star text-success" aria-hidden="true"></i>
																	  <i class="fa fa-star text-success" aria-hidden="true"></i>
																	  <i class="fa fa-star text-success" aria-hidden="true"></i>
																	  <i class="fa fa-star-half-o text-success" aria-hidden="true"></i>';
																break;

																case 5.0:
																echo '<i class="fa fa-star text-success" aria-hidden="true"></i>
																	  <i class="fa fa-star text-success" aria-hidden="true"></i>
																	  <i class="fa fa-star text-success" aria-hidden="true"></i>
																	  <i class="fa fa-star text-success" aria-hidden="true"></i>
																	  <i class="fa fa-star text-success" aria-hidden="true"></i>';
																break;

															}


														}
													
															
														echo '</h3>

														<p class="panel panel-default text-right" style="padding:5px">

															<small>

															'.$comentarios["comentario"].'

															</small>
														
														</p>

													</div>

												</div>';

											}

										echo '	

										</div>

									</div>';

							}

						}

					}

					?>

				</div>

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

								echo '<input type="hidden" value="'.$_SESSION["id"].'" name="idUsuario" id="idUsuario">
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

								echo '<button type="button" class="btn btn-default" id="btnCambiarFoto">


									Cambiar Foto de perfil

									</button>';

							?>

							<div id="subirImagen">
								
								<input type="file" class="form-control" name="datosImagen" id="datosImagen">
								
								<img class="previsualizar">

							</div>

						</div>

						<div class="col-md-9 col-sm-8 col-xs-12" id="divDatos">
							
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
										<input type="password" class="form-control" id="editarPassword" name="editarPassword" placeholder="Escribe tu nueva contraseña">

									</div>

									<br>

									<button type="submit" class="btn btn-default backColorN btn-md pull-left">Actualizar tus datos</button>

								';

							?>

							<button class="btn btn-danger btn-md pull-right" id="eliminarUsuario">Eliminar cuenta</button>

							<?php

							$borrarUsuario = new ControladorUsuarios();
							$borrarUsuario -> ctrEliminarUsuario();

							?>

						</div>

						<?php

							$actualizarPerfil = new ControladorUsuarios();
							$actualizarPerfil->ctrActualizarPerfil();

						?>	

					</form>

					<hr>

					

				</div>

			</div>

		</div>

	</div>

</div>

<!--=====================================
Ventana modal de los comentarios
======================================-->

<div  class="modal fade modalFormulario" id="modalComentarios" role="dialog">
	
	<div class="modal-content modal-dialog">
		
		<div class="modal-body modalTitulo">
			
			<h3 class="backColorYN">CALIFICA ESTE PRODUCTO</h3>

			<button type="button" class="close" data-dismiss="modal">&times;</button>

			<form method="post" onsubmit="return validarComentario()">

				<input type="hidden" value="" id="idComentario" name="idComentario">
				
				<h1 class="text-center" id="estrellas">

		       		<i class="fa fa-star text-success" aria-hidden="true"></i>
					<i class="fa fa-star text-success" aria-hidden="true"></i>
					<i class="fa fa-star text-success" aria-hidden="true"></i>
					<i class="fa fa-star text-success" aria-hidden="true"></i>
					<i class="fa fa-star text-success" aria-hidden="true"></i>

				</h1>

				<div class="form-group text-center">

		       		<label class="radio-inline"><input type="radio" name="puntaje" value="0.5">0.5</label>
					<label class="radio-inline"><input type="radio" name="puntaje" value="1.0">1.0</label>
					<label class="radio-inline"><input type="radio" name="puntaje" value="1.5">1.5</label>
					<label class="radio-inline"><input type="radio" name="puntaje" value="2.0">2.0</label>
					<label class="radio-inline"><input type="radio" name="puntaje" value="2.5">2.5</label>
					<label class="radio-inline"><input type="radio" name="puntaje" value="3.0">3.0</label>
					<label class="radio-inline"><input type="radio" name="puntaje" value="3.5">3.5</label>
					<label class="radio-inline"><input type="radio" name="puntaje" value="4.0">4.0</label>
					<label class="radio-inline"><input type="radio" name="puntaje" value="4.5">4.5</label>
					<label class="radio-inline"><input type="radio" name="puntaje" value="5.0" checked>5.0</label>

				</div>

				<div class="form-group">
			  		
			  		<label for="comment" class="text-muted">Tu opinión acerca de este producto: <span><small>(máximo 300 caracteres)</small></span></label>
			  		
			  		<textarea class="form-control" rows="5" id="comentario" name="comentario" maxlength="300" required></textarea>

			  		<br>
					
					<input type="submit" class="btn btn-default backColor btn-block" value="Calificar">

				</div>

				<?php

					$actualizarComentario = new ControladorUsuarios();
					$actualizarComentario -> ctrActualizarComentario();

				?>

			</form>

		</div>

		<div class="modal-footer">
      	
      	</div>

	</div>

</div>