<!--=============================================
=            Banner           =
=============================================-->

<?php

	$servidor = Ruta::ctrRutaServidor();
	$url = Ruta::ctrRuta();

	$ruta = $rutas[0];

	$banner = ControladorProductos::ctrMostrarBanner($ruta);

	$titulo1 = json_decode($banner["titulo1"],true);
	$titulo2 = json_decode($banner["titulo2"],true);
	$titulo3 = json_decode($banner["titulo3"],true);

	if($banner != null){

	echo '<figure class="banner">
	
				<img src="'.$servidor.$banner["img"].'" class="img-responsive" width="100%">

				<div class="textoBanner '.$banner["estilo"].'">
					
					<h1 style="color: '.$titulo1["color"].'">'.$titulo1["texto"].'</h1>

					<h2 style="color: '.$titulo2["color"].'">'.$titulo2["texto"].'</h2>

					<h3 style="color: '.$titulo3["color"].'">'.$titulo3["texto"].'</h3>

				</div>

			</figure>';

	}

?>

<!--=============================================
=            Barra de productos           =
=============================================-->

<div class="container-fluid well well-sm barraProductos">

	<div class="container">
		
		<div class="row">

			<div class="col-sm-6 col-xs-6">

				<div class="btn-group">
					
					<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
					Ordenar productos <span class="caret"></span></button>

					<ul class="dropdown-menu" role="menu">

					<?php
						
						echo '<li><a href="'.$url.$rutas[0].'/1/recientes">Más reciente</a></li>
							  <li><a href="'.$url.$rutas[0].'/1/antiguos">Más antiguo</a></li>';

					?>

					</ul>

				</div>
				

			</div>
			
			<div class="col-sm-6 col-xs-6 organizarProductos">

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

			/*=============================================
			=            Llamado de paginación            =
			=============================================*/

			if(isset($rutas[1])){

				if (isset($rutas[2])){
					
					if ($rutas[2] == "antiguos"){
						
						$modo = "ASC";
						$_SESSION["ordenar"] = "ASC";

					}else{

						$modo = "DESC";
						$_SESSION["ordenar"] = "DESC";

					}

				}else{

					if (isset($_SESSION["ordenar"])){
						
						$modo = $_SESSION["ordenar"];

					}else{

						$modo = "DESC";

					}

				}
				
				$base = ($rutas[1] - 1)*12;
				$tope = 12;

			}else{

				$rutas[1] = 1;
				$base = 0;
				$tope = 12;
				$modo = "DESC";

			}

			/*=============================================
			=Llamado de productos de categorias, subcategorias y destacados=
			=============================================*/			

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

			$productos = ControladorProductos::ctrMostrarProductos($ordenar, $item2, $valor2, $base, $tope, $modo);
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
									
										<button type="button" class="btn btn-default btn-xs agregarCarrito" idProducto="'.$value["id"].'" imagen="'.$servidor.$value["portada"].'" titulo="'.$value["titulo"].'" title="Agregar al carrito" precio="'.$value["precio"].'" data-toggle="tooltip" title="Agregar al carrito">
										
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

					echo '</ul>

					<ul class="list0" style="display: none;">';

					foreach ($productos as $key => $value) {

						echo '<li class="col-xs-12">
							
							

							<div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">

								<figure>
								
									<a href="'.$url.$value["ruta"].'" class="pixelProducto">

										<img src="'.$servidor.$value["portada"].'" class="img-responsive">

									</a>

								</figure>

							</div>

							<div class="col-lg-10 col-md-7 col-sm-8 col-xs-12">

								<h1>
							
									<small>
								
										<a href="'.$url.$value["ruta"].'" class="pixelProducto">
									
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
									
									<button type="button" class="btn btn-default btn-xs agregarCarrito" idProducto="'.$value["id"].'" imagen="'.$servidor.$value["portada"].'" titulo="'.$value["titulo"].'" title="Agregar al carrito" precio="'.$value["precio"].'" data-toggle="tooltip" title="Agregar al carrito">
										
											<i class="fa fa-shopping-cart" aria-hidden="true"></i>

									</button>

									<a href="'.$url.$value["ruta"].'" class="pixelProducto">
										
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

			?>

			<div class="clearfix"></div>

				<center>

				<!--=====================================
				=            Paginación            =
				======================================-->				

					<?php

						if(count($listaProductos) != 0){

							$pagProductos = ceil(count($listaProductos)/12);

							if($pagProductos > 4){

								/*=============================================
								= Los botones de las primeras 4 páginas y última página =
								=============================================*/
								
								if ($rutas[1] == 1) {
									
									echo '<ul class="pagination">';

									for($i = 1; $i <= 4; $i++){

										echo '<li id="item'.$i.'"><a href="'.$url.$rutas[0].'/'.$i.'">'.$i.'</a></li>';


									}


									echo '<li class="disabled"><a>...</a></li>
										  <li id="item'.$pagProductos.'"><a href="'.$url.$rutas[0].'/'.$pagProductos.'">'.$pagProductos.'</a></li>
										  <li><a href="'.$url.$rutas[0].'/2"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>

									</ul>';

								}

								/*=============================================
								= Los botones de la mitad de páginas hacia abajo =
								=============================================*/

								elseif ($rutas[1] != $pagProductos && 
										$rutas[1] != 1 &&
										$rutas[1] < ($pagProductos/2) &&
										$rutas[1] < ($pagProductos-3)
										){

										$numPagActual = $rutas[1];

										echo '<ul class="pagination">
											  <li><a href="'.$url.$rutas[0].'/'.($numPagActual-1).'"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>';

										for($i = $numPagActual; $i <= ($numPagActual+3); $i++){

											echo '<li id="item'.$i.'"><a href="'.$url.$rutas[0].'/'.$i.'">'.$i.'</a></li>';


										}


										echo '<li class="disabled"><a>...</a></li>
											  <li id="item'.$pagProductos.'"><a href="'.$url.$rutas[0].'/'.$pagProductos.'">'.$pagProductos.'</a></li>
											  <li><a href="'.$url.$rutas[0].'/'.($numPagActual+1).'"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>

											</ul>';

								}

								/*=============================================
								= Los botones de la mitad de páginas hacia arriba =
								=============================================*/

								elseif ($rutas[1] != $pagProductos && 
										$rutas[1] != 1 &&
										$rutas[1] >= ($pagProductos/2) &&
										$rutas[1] < ($pagProductos-3)
										){

										$numPagActual = $rutas[1];

										echo '<ul class="pagination">
											<li><a href="'.$url.$rutas[0].'/'.($numPagActual-1).'"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>
											<li id="item1"><a href="'.$url.$rutas[0].'/1">1</a></li>
											<li class="disabled"><a>...</a></li>
										';

										for($i = $numPagActual; $i <= ($numPagActual+3); $i++){

											echo '<li id="item'.$i.'"><a href="'.$url.$rutas[0].'/'.$i.'">'.$i.'</a></li>';


										}


										echo '<li><a href="'.$url.$rutas[0].'/'.($numPagActual+1).'"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>

											</ul>';
								}

								/*=============================================
								= Los botones de las últimas 4 páginas y primera página =
								=============================================*/

								else{

									$numPagActual = $rutas[1];

									echo '<ul class="pagination">
										<li><a href="'.$url.$rutas[0].'/'.($numPagActual-1).'"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>
										<li id="item1"><a href="'.$url.$rutas[0].'/1">1</a></li>
										<li class="disabled"><a>...</a></li>
									';

									for($i = ($pagProductos-3); $i <= $pagProductos; $i++){

										echo '<li id="item'.$i.'"><a href="'.$url.$rutas[0].'/'.$i.'">'.$i.'</a></li>';


									}


									echo '</ul>';

								}



							}else{

								echo '<ul class="pagination">';

								for($i = 1; $i <= $pagProductos; $i++){

									echo '<li id="item'.$i.'"><a href="'.$url.$rutas[0].'/'.$i.'">'.$i.'</a></li>';


								}


								echo '</ul>';

							}

						}

					?>

				</center>

		</div>

	</div>

</div>