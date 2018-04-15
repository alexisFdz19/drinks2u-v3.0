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

			?>
			
			<!--=============================================
			=            Visor de imagenes          =
			=============================================-->

			<div class="col-md-5 col-sm-6 col-xs-12 visorImg">

				<figure class="visor">
					
					<img id="lupa1" class="img-thumbnail" src="http://localhost:8080/proyect/drinks2u3/backend/views/img/productos/cerveza/tecate/12packtecateoriginal355ml.png">

				</figure>

				<div class="flexslider">

				  <ul class="slides">

				    <li>

				      <img value="1" class="img-thumbnail" src="http://localhost:8080/proyect/drinks2u3/backend/views/img/productos/cerveza/tecate/12packtecateoriginal355ml.png" alt="12 pack Tecate Original 355ml" />

				    </li>

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
										<i style="margin-right: 10px;"class="fa fa-beer"></i> '.$detalles["Contenido"].'
									</li>
									<li>
										<i style="margin-right: 10px;"class="fa fa-glass"></i> '.$detalles["Porcentaje de alcohol"].'
									</li>
									<li>
										<i style="margin-right: 10px;"class="fa fa-flag"></i> '.$detalles["País de procedencia"].'
									</li>

								</div>';

							}else if($infoproducto["id_categoria"] == 3){

								echo '<div class="col-xs-12">

									<li>
										<i style="margin-right: 10px;"class="fa fa-beer"></i> '.$detalles["Contenido"].'
									</li>
									<li>
										<i style="margin-right: 10px;"class="fa fa-glass"></i> '.$detalles["Porcentaje de alcohol"].'
									</li>
									<li>
										<i style="margin-right: 10px;"class="fa fa-flag"></i> '.$detalles["País de procedencia"].'
									</li>

								</div>';

							}else if($infoproducto["id_categoria"] == 4){

								echo '<div class="col-xs-12">

									<li>
										<i style="margin-right: 10px;"class="fa fa-beer"></i> '.$detalles["Contenido"].'
									</li>
									<li>
										<i style="margin-right: 10px;"class="fa fa-glass"></i> '.$detalles["Porcentaje de alcohol"].'
									</li>
									<li>
										<i style="margin-right: 10px;"class="fa fa-flag"></i> '.$detalles["País de procedencia"].'
									</li>

								</div>';

							}else if($infoproducto["id_categoria"] == 5){

								echo '<div style="margin-right: 10px;"class="col-xs-12">

									<li>
										<i style="margin-right: 10px;"class="fa fa-stop-circle-o"></i> '.$detalles["Contenido"].'
									</li>
									<li>
										<i style="margin-right: 10px;"class="fa fa-pie-chart"></i> '.$detalles["Sabor"].'
									</li>
									<li>
										<i style="margin-right: 10px;"class="fa fa-hourglass"></i> '.$detalles["Ingredientes"].'
									</li>

								</div>';

							}else if($infoproducto["id_categoria"] == 6){

								echo '<div style="margin-right: 10px;"class="col-xs-12">

									<li>
										<i style="margin-right: 10px;"class="fa fa-cube"></i> '.$detalles["Contenido"].'
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
								<i class="fa fa-eye" style="margin: 0px 5px;"></i> Visto por '.$infoproducto["vistas"].' personas

							</span>

            			</div>';

					?>

				</div>

				<!--=============================================
				=            Botones de compra         =
				=============================================-->

				<div class="row">
					
					<div class="col-md-6 col-xs-12">
						
						<button class="btn btn-default btn-block btn-lg backColorN">
							
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

	</div>

</div>