<?php

	$servidor = Ruta::ctrRutaServidor();
	$url = Ruta::ctrRuta();

?>

<!--=============================================
=            Banner           =
=============================================-->


<figure class="banner">
	
	<img src="http://localhost/proyect/drinks2u3/backend/views/img/banner/banner2.jpg" class="img-responsive" width="100%">

	<div class="textoBanner textoDer">
		
		<h1 style="color: white">TUS BEBIDAS</h1>

		<h2 style="color: white"></h2>

		<h3 style="color: white">A domicilio en 4 pasos</h3>

	</div>

</figure>

<!--=============================================
=            Barra de productos           =
=============================================-->

<div class="container-fluid well well-sm barraProductos">

	<div class="container">
		
		<div class="row">

			<div class="col-sm-6 col-xs-12">

				<div class="btn-group">
					
					<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
					Ordenar productos <span class="caret"></span></button>

					<ul class="dropdown-menu" role="menu">
						
						<li><a href="#">Más reciente</a></li>
						<li><a href="#">Más antiguo</a></li>

					</ul>

				</div>
				

			</div>
			
			<div class="col-sm-6 col-xs-12 organizarProductos">

				<div class="btn-group pull-right">
				
					<button type="button" class="btn btn-default btnGrid" id="btnGrid0">
						
						<i class="fa fa-th" aria-hidden="true"></i>

						<span class="col-xs-0 pull right"> Grid</span>

					</button>

					<button type="button" class="btn btn-default btnList" id="btnList0">
						
						<i class="fa fa-list" aria-hidden="true"></i>

						<span class="col-xs-0 pull right"> List</span>

					</button>

				</div>
				
			</div>

		</div>


	</div>
	
</div>

<!--=============================================
=            Listar productos           =
=============================================-->

<div class="container-fluid productos">

	<div class="container">

		<div class="row">

			<!--=============================================
			=            Breadcumb           =
			=============================================-->

			<ul class="breadcrumb fondoBreadcrumb text-uppercase">
				
				<li><a href="<?php echo $url; ?>">Inicio</a></li>
				<li class="active pagActiva"><?php echo $rutas[0]; ?></li>

			</ul>


			<?php

			if ($rutas[0] == "promociones") {
				
				$item2 = "id_categoria";
				$valor2 = 6;
				$ordenar = "id";


			}else if($rutas[0] == "lo-mas-pedido"){

				$item2 = null;
				$valor2 = null;
				$ordenar = "ventas";

			}else if($rutas[0] == "lo-mas-visto"){

				$item2 = null;
				$valor2 = null;
				$ordenar = "vistas";

			}else{

				$ordenar = "id";
				$item1 = "ruta";
				$valor1 = $rutas[0];

				$categoria = ControladorProductos::ctrMostrarCategorias($item1, $valor1);


				if(!$categoria){


					$subCategoria = ControladorProductos::ctrMostrarSubCategorias($item1, $valor1);

					$item2 = "id_subcategoria";
					$valor2 = $subCategoria[0]["id"];

				}else{

					$item2 = "id_categoria";
					$valor2 = $categoria["id"];
				}
			}

			$base = 0;
			$tope = 12;

			$productos = ControladorProductos::ctrMostrarProductos($ordenar, $item2, $valor2, $base, $tope);
			$listaProductos = ControladorProductos::ctrListarProductos($ordenar, $item2, $valor2);

			if (!$productos) {

				echo '<div class="col-xs-12 error404 text-center">

						<h1><small>¡Vaya!</small></h1>

						<h2>Aún no tenemos productos en esta sección</h2>

					</div>';
				
			}else{

				echo '<ul class="grid0">';

					foreach ($productos as $key => $value) {
						
						echo '<li class="col-md-3 col-sm-6 col-xs-12">

								<figure>

									<a href="'.$value["ruta"].'" class="pixelProducto">
				
										<img src="'.$servidor.$value["portada"].'" class="img-responsive">

									</a>

								</figure>

								<h4>
				
									<small>
									
										<a href="'.$value["ruta"].'" class="pixelProducto">
										
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

										<a href="'.$value["ruta"].'" class="pixelProducto">
										
											<button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ver producto">
											
												<i class="fa fa-eye" aria-hidden="true"></i>

											</button>

										</a>

									</div>

								</div>

							</li>';
					}

					echo '</ul>

					<ul class="list0" style="display: none;">';

					foreach ($productos as $key => $value) {

						echo '<li class="col-xs-12">
							
							

							<div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">

								<figure>
								
									<a href="'.$value["ruta"].'" class="pixelProducto">

										<img src="'.$servidor.$value["portada"].'" class="img-responsive">

									</a>

								</figure>

							</div>

							

							<div class="col-lg-10 col-md-7 col-sm-8 col-xs-12">

								<h1>
							
									<small>
								
										<a href="'.$value["ruta"].'" class="pixelProducto">
									
											'.$value["titulo"].'<br>';

											if ($value["nuevo"] != 0) {
												
												echo '<span class="label label-warning fontSize">Nuevo</span>';
											}

										echo '</a>

									</small>


								</h1>

								<p class="text-muted">'.$value["titular"].'</p>

								<h2>
								
									<small>$ '.$value["precio"].' MXN</small>

								</h2>

								<div class="btn-group pull-left enlaces">
									
									<button type="button" class="btn btn-default btn-xs agregarCarrito" idProducto="'.$value["id"].'" imagen="'.$ruta.$value["portada"].'" titulo="'.$value["titulo"].'" title="Agregar al carrito" precio="'.$value["precio"].'" data-toggle="tooltip" title="Agregar al carrito">
										
											<i class="fa fa-shopping-cart" aria-hidden="true"></i>

									</button>

									<a href="'.$value["ruta"].'" class="pixelProducto">
										
										<button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ver producto">
											
											<i class="fa fa-eye" aria-hidden="true"></i>

										</button>

									</a>

								</div>

							</div>

							

							<div class="col-xs-12">
								
								<hr>

							</div>

							

						</li>';

					}

					echo '</ul>';
			}

			var_dump(count($listaProductos));

			?>

			<div class="col-xs-12">

				<center>

					<ul class="pagination">

						<!--<li><a href="#"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>-->
						<li><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li class="disabled"><a>...</a></li>
						<li><a href="#">20</a></li>
						<li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>

					</ul>

				</center>

			</div>

		</div>

	</div>

</div>