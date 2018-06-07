<?php

$servidor = Ruta::ctrRutaServidor();
$url = ruta::ctrRuta();

?>

<!--=============================================
=            Breadcrumb infoproductos          =
=============================================-->

<div class="container-fluid well well-sm">

	<div class="container">
		
		<div class="row">
			
			<div class="breadcrumb fondoBreadcrumb text-uppercase">
				
				<li><a href="<?php echo $url; ?>">Inicio</a></li>
				<li class="active pagActiva"><?php echo $rutas[0] ?></li>

			</div>

		</div>

	</div>

</div>

<!--=============================================
=            Infoproductos          =
=============================================-->

<div class="container-fluid infoproducto">
	
	<div class="container">
		
		<div class="row">

			<?php


				$item = "ruta";
				$valor = $rutas[0];
				$infoproducto = ControladorProductos::ctrMostrarInfoProducto($item, $valor);

				$multimedia = json_decode($infoproducto["multimedia"], true);

			?>
			
			<!--=============================================
			=            Visor de imagenes          =
			=============================================-->

			<div class="col-md-5 col-sm-6 col-xs-12 visorImg">

				<figure class="visor">

					<?php

						for ($i = 0; $i < count($multimedia); $i++) { 
							
							echo '<img id="lupa'.($i+1).'" class="img-thumbnail" src="'.$servidor.$multimedia[$i]["foto"].'" alt="'.$infoproducto["titulo"].'" >';

						}

					?>

				</figure>

				<div class="flexslider">

				  <ul class="slides">

				  	<?php

				  		for ($i = 0; $i < count($multimedia); $i++) { 
						
							echo ' <li>

								      <img value="'.($i+1).'" class="img-thumbnail" src="'.$servidor.$multimedia[$i]["foto"].'"/>

								    </li>';
						}

				  	?>

				  </ul>

				</div>

			</div>

			<!--=============================================
			=            Visor de productos          =
			=============================================-->

			<div class="col-md-7 col-sm-6 col-xs-12">

				<!--=============================================
				=            Regresar a la tienda          =
				=============================================-->

				<div class="col-xs-6">
					
					<h6>
						
						<a href="javascript:history.back()" class="text-muted">
							
							<i class="fa fa-reply"></i> Continuar comprando

						</a>

					</h6>

				</div>

				<!--=============================================
				=            Redes Sociales          =
				=============================================-->

				<div class="col-xs-6">
					
					<h6>
						
						<a class="dropdown-toggle pull-right text-muted" data-toggle="dropdown" href="">
							
							<i class="fa fa-plus"></i> Compartir

						</a>

						<ul class="dropdown-menu pull-right compartirRedes">
							
							<li>
								
								<p class="btnFacebook">
									<i class="fa fa-facebook"></i>
									Facebook
								</p>

							</li>

							<li>
								
								<p class="btnGoogle">
									<i class="fa fa-google"></i>
									Google
								</p>

							</li>

						</ul>

					</h6>

				</div>

				<div class="clearfix"></div>

				<!--=============================================
				=            Espacio para el producto          =
				=============================================-->

				<?php

					/*==============================================
            		=      Titulo        =
            		==============================================*/

					if ($infoproducto["nuevo"] == 0) {
						
						echo '<h1 class="text-muted text-uppercase">'.$infoproducto["titulo"].'</h1>';

					}else{

						echo '<h1 class="text-muted text-uppercase">'.$infoproducto["titulo"].'

						<br>

							<small>

								<span class="label label-warning">Nuevo</span>

							</small>

						</h1>';

					}

					/*==============================================
            		=     Precio       =
            		==============================================*/

            		echo '<h2 class="text-muted">MXN $'.$infoproducto["precio"].'</h2>';

            		/*==============================================
            		=     Descripcion del producto      =
            		==============================================*/

            		echo '<p>'.$infoproducto["descripcion"].'</p>';

				?>

				<!--=============================================
				=            Caracteristicas del producto         =
				=============================================-->

				<hr>

				<div class="form-group row">
					
					<?php

						if ($infoproducto["detalles"] != null) {
							
							$detalles = json_decode($infoproducto["detalles"], true);

							if ($infoproducto["id_categoria"] == 1) {
								
								echo '<div class="col-xs-12">

									<li>
										<i class="fa fa-beer"></i> '.$detalles["Contenido"].'
									</li>
									<li>
										<i class="fa fa-glass"></i> '.$detalles["Porcentaje de alcohol"].'
									</li>
									<li>
										<i class="fa fa-cube"></i> '.$detalles["Presentación"].'
									</li>

								</div>';

							}else if($infoproducto["id_categoria"] == 2){

								echo '<div class="col-xs-12">

									<li>
										<i style="margin-right: 10px;"class="fa fa-beer"></i> Contenido: '.$detalles["Contenido"].'
									</li>
									<li>
										<i style="margin-right: 10px;"class="fa fa-glass"></i> '.$detalles["Porcentaje de alcohol"].'
									</li>
									<li>
										<i style="margin-right: 10px;"class="fa fa-flag"></i> País de procedencia: '.$detalles["País de procedencia"].'
									</li>

								</div>';

							}else if($infoproducto["id_categoria"] == 3){

								echo '<div class="col-xs-12">

									<li>
										<i style="margin-right: 10px;"class="fa fa-beer"></i> Contenido: '.$detalles["Contenido"].'
									</li>
									<li>
										<i style="margin-right: 10px;"class="fa fa-glass"></i> '.$detalles["Porcentaje de alcohol"].'
									</li>
									<li>
										<i style="margin-right: 10px;"class="fa fa-flag"></i> País de procedencia: '.$detalles["País de procedencia"].'
									</li>

								</div>';

							}else if($infoproducto["id_categoria"] == 4){

								echo '<div class="col-xs-12">

									<li>
										<i style="margin-right: 10px;"class="fa fa-beer"></i> Contenido: '.$detalles["Contenido"].'
									</li>
									<li>
										<i style="margin-right: 10px;"class="fa fa-glass"></i> '.$detalles["Porcentaje de alcohol"].'
									</li>
									<li>
										<i style="margin-right: 10px;"class="fa fa-flag"></i> País de procedencia: '.$detalles["País de procedencia"].'
									</li>

								</div>';

							}else if($infoproducto["id_categoria"] == 5){

								echo '<div style="margin-right: 10px;"class="col-xs-12">

									<li>
										<i style="margin-right: 10px;"class="fa fa-stop-circle-o"></i> Contenido: '.$detalles["Contenido"].'
									</li>
									<li>
										<i style="margin-right: 10px;"class="fa fa-pie-chart"></i> Sabor: '.$detalles["Sabor"].'
									</li>
									<li>
										<i style="margin-right: 10px;"class="fa fa-hourglass"></i> Ingredientes: '.$detalles["Ingredientes"].'
									</li>

								</div>';

							}else if($infoproducto["id_categoria"] == 6){

								echo '<div style="margin-right: 10px;"class="col-xs-12">

									<li>
										<i style="margin-right: 10px;"class="fa fa-cube"></i> Contenido: '.$detalles["Contenido"].'
									</li>

								</div>';

							}

							
						}

						/*==============================================
            			=     Ventas y vistas     =
            			==============================================*/

            			echo '<div class="col-xs-12">

							<hr>

							<span class="label label-default" style="font-weight:700">

								<i class="fa fa-cart-arrow-down" style="margin-right: 5px;"></i> '.$infoproducto["ventas"].' Ventas |
								<i class="fa fa-eye" style="margin: 0px 5px;"></i> Visto por <span class="vistas">'.$infoproducto["vistas"].'</span> personas

							</span>

            			</div>';

					?>

				</div>

				<!--=============================================
				=            Botones de compra         =
				=============================================-->

				<div class="row">
					
					<div class="col-md-6 col-xs-12">

						<?php

						echo '
						
						<button class="btn btn-default btn-block btn-lg backColorN 
						agregarCarrito" idProducto="'.$infoproducto["id"].'" imagen="'.$servidor.$infoproducto["portada"].'" titulo="'.$infoproducto["titulo"].'" title="Agregar al carrito" precio="'.$infoproducto["precio"].'">

						';

						?>
							
						Agregar al carrito

						<i class="fa fa-shopping-cart"></i>

						</button>

					</div>

				</div>

				<!--=============================================
				=            Zona lupa          =
				=============================================-->

				<figure class="lupa">
					
					<img src="">

				</figure>

			</div>

		</div>

		<!--=====================================
		COMENTARIOS
		======================================-->

		<br>

		<div class="row">

			<?php

			$datos = array("idUsuario"=>"",
						   "idProducto"=>$infoproducto["id"]);

			$comentarios = ControladorUsuarios::ctrMostrarComentariosPerfil($datos);
			$cantidad = 0;

			foreach ($comentarios as $key => $value){
				
				if($value["comentario"] != ""){

					$cantidad += count($value["id"]);

				}
			}

			?>
			
			<ul class="nav nav-tabs">
				
			<?php

				if($cantidad == 0){

					echo '<li class="active"><a>Este producto aún no tiene comentarios</a></li>
						  <li></li>';

				}else{

					echo '<li class="active"><a>'.$cantidad.' comentarios</a></li>
						  <li><a id="verMas" href="">Ver más</a></li>';


				    $sumaCalificacion = 0;

					for($i = 0; $i < $cantidad; $i++){

						$sumaCalificacion += $comentarios[$i]["calificacion"];
						
					}

					$promedio = round($sumaCalificacion/$cantidad,1);

					echo '<li class="pull-right"><a class="text-muted">Promedio de calificación: '.$promedio.' | ';

					if($promedio >= 0 && $promedio < 0.5){

						echo '<i class="fa fa-star-half-o text-success"></i>
							  <i class="fa fa-star-o text-success"></i>
							  <i class="fa fa-star-o text-success"></i>
							  <i class="fa fa-star-o text-success"></i>
							  <i class="fa fa-star-o text-success"></i>';

					}

					else if($promedio >= 0.5 && $promedio < 1){

						echo '<i class="fa fa-star text-success"></i>
							  <i class="fa fa-star-o text-success"></i>
							  <i class="fa fa-star-o text-success"></i>
							  <i class="fa fa-star-o text-success"></i>
							  <i class="fa fa-star-o text-success"></i>';

					}

					else if($promedio >= 1 && $promedio < 1.5){

						echo '<i class="fa fa-star text-success"></i>
							  <i class="fa fa-star-half-o text-success"></i>
							  <i class="fa fa-star-o text-success"></i>
							  <i class="fa fa-star-o text-success"></i>
							  <i class="fa fa-star-o text-success"></i>';

					}

					else if($promedio >= 1.5 && $promedio < 2){

						echo '<i class="fa fa-star text-success"></i>
							  <i class="fa fa-star text-success"></i>
							  <i class="fa fa-star-o text-success"></i>
							  <i class="fa fa-star-o text-success"></i>
							  <i class="fa fa-star-o text-success"></i>';

					}

					else if($promedio >= 2 && $promedio < 2.5){

						echo '<i class="fa fa-star text-success"></i>
							  <i class="fa fa-star text-success"></i>
							  <i class="fa fa-star-half-o text-success"></i>
							  <i class="fa fa-star-o text-success"></i>
							  <i class="fa fa-star-o text-success"></i>';

					}

					else if($promedio >= 2.5 && $promedio < 3){

						echo '<i class="fa fa-star text-success"></i>
							  <i class="fa fa-star text-success"></i>
							  <i class="fa fa-star text-success"></i>
							  <i class="fa fa-star-o text-success"></i>
							  <i class="fa fa-star-o text-success"></i>';

					}

					else if($promedio >= 3 && $promedio < 3.5){

						echo '<i class="fa fa-star text-success"></i>
							  <i class="fa fa-star text-success"></i>
							  <i class="fa fa-star text-success"></i>
							  <i class="fa fa-star-half-o text-success"></i>
							  <i class="fa fa-star-o text-success"></i>';

					}

					else if($promedio >= 3.5 && $promedio < 4){

						echo '<i class="fa fa-star text-success"></i>
							  <i class="fa fa-star text-success"></i>
							  <i class="fa fa-star text-success"></i>
							  <i class="fa fa-star text-success"></i>
							  <i class="fa fa-star-o text-success"></i>';

					}

					else if($promedio >= 4 && $promedio < 4.5){

						echo '<i class="fa fa-star text-success"></i>
							  <i class="fa fa-star text-success"></i>
							  <i class="fa fa-star text-success"></i>
							  <i class="fa fa-star text-success"></i>
							  <i class="fa fa-star-half-o text-success"></i>';

					}else{

						echo '<i class="fa fa-star text-success"></i>
							  <i class="fa fa-star text-success"></i>
							  <i class="fa fa-star text-success"></i>
							  <i class="fa fa-star text-success"></i>
							  <i class="fa fa-star text-success"></i>';

					}


				}


			?>
					
					</a></li>

			</ul>

			<br>

		</div>

		<div class="row comentarios">
			
		<?php

		foreach ($comentarios as $key => $value) {
			
			if($value["comentario"] != ""){

				$item = "id";
				$valor = $value["id_usuario"];

				$usuario = ControladorUsuarios::ctrMostrarUsuario($item, $valor);

				echo '<div class="panel-group col-md-3 col-sm-6 col-xs-12 alturaComentarios">
				
					<div class="panel panel-default">
				      
				      <div class="panel-heading text-uppercase">

				      	'.$usuario["nombre"].'
				      	<span class="text-right">';

				      	// Condición de foto si la tiene en red social (por crear)

				      	if($usuario["modo"] == "directo"){

				      		if($usuario["foto"] == ""){

				      			echo '<img class="img-circle pull-right" src="'.$servidor.'views/img/usuarios/default/anonimo.jpg" width="20%">';	

				      		}else{

				      			echo '<img class="img-circle pull-right" src="'.$url.$usuario["foto"].'" width="20%">';	

				      		}
				      	
				      	}/*else{

				      		echo '<img class="img-circle pull-right" src="'.$usuario["foto"].'" width="20%">';	

				      	}*/

				      	echo '</span>

				      </div>
				     
				      <div class="panel-body"><small>'.$value["comentario"].'</small></div>

				      <div class="panel-footer">';
				      	
				      	switch($value["calificacion"]){

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

				      echo '</div>
				    
				    </div>

				</div>';

			}
		}

		?>
		
		</div>

		<hr>

	</div>

</div>

<!--=====================================
Articulos relacionados
======================================-->

<div class="container-fluid productos">

	<div class="container">

		<div class="row">



			<div class="col-xs-12 tituloDestacado">



				<div class="col-sm-6 col-xs-12">

					<h1><small>También tenemos para ti</small></h1>

				</div>

				<div class="col-sm-6 col-xs-12">

				<?php

					$item = "id";
					$valor = $infoproducto["id_subcategoria"];

					$rutaArticulosDestacados = ControladorProductos::ctrMostrarSubcategorias($item, $valor);

					echo '<a href="'.$url.$rutaArticulosDestacados[0]["ruta"].'">
				
							<button class="btn btn-default backColorN pull-right">
					
								Ver más <span class="fa fa-chevron-right"></span>

							</button>

						</a>';

				?>

				</div>



			</div>

			<div class="clearfix"></div>

			<hr>

		</div>

		<?php

			$ordenar = ""; 
			$item = "id_subcategoria";
			$valor = $infoproducto["id_subcategoria"];
			$base = 0;
			$tope = 4;
			$modo = "Rand()";

			$relacionados = ControladorProductos::ctrMostrarProductos($ordenar, $item, $valor, $base, $tope, $modo);

			if(!$relacionados){

				echo '<div class="col-xs-12 error404">

					<h1><small>Lo sentimos<small><h1>

					<h2>No hay productos relacionados<h2>

				</div>';

			}else{

				echo '<ul class="grid0">';

				foreach ($relacionados as $key => $value) {
				
				echo '<li class="col-md-3 col-sm-6 col-xs-12">

						<figure>

							<a href="'.$url.$value["ruta"].'" class="pixelProducto">
		
								<img src="'.$servidor.$value["portada"].'" class="img-responsive">

							</a>

						</figure>

						<h4>
		
							<small>
							
								<a href="'.$url.$value["ruta"].'" class="pixelProducto">
								
									'.$value["titulo"].'<br>';


									if ($value["nuevo"] != 0) {
										
										echo '<span class="label label-warning fontSize">Nuevo</span>';
									}
									

								echo '</a>

							</small>


						</h4>

						<div class="col-xs-6 precio">
		
							<h2><small>$ '.$value["precio"].' MXN</small></h2>

						</div>


						<div class="col-xs-6 enlaces">

							<div class="btn-group pull-right">
							
								<button type="button" class="btn btn-default btn-xs agregarCarrito" idProducto="'.$value["id"].'" imagen="'.$ruta.$value["portada"].'" titulo="'.$value["titulo"].'" title="Agregar al carrito" precio="'.$value["precio"].'" data-toggle="tooltip" title="Agregar al carrito">
								
									<i class="fa fa-shopping-cart" aria-hidden="true"></i>

								</button>

								<a href="'.$url.$value["ruta"].'" class="pixelProducto">
								
									<button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ver producto">
									
										<i class="fa fa-eye" aria-hidden="true"></i>

									</button>

								</a>

							</div>

						</div>

					</li>';
			
				}

			echo '</ul>';

		}

		?>

	</div>

</div>