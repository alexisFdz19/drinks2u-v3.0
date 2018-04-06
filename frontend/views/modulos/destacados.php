<?php

	$servidor = Ruta::ctrRutaServidor();


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

<?php

	$titulosModulos = array("Promociones","Lo más pedido","Lo más visto");
	$rutaModulos = array("promociones", "lo-mas-pedido", "lo-mas-visto");

	$base = 0;
	$tope = 4;


	if($titulosModulos[0] == "Promociones"){

		$ordenar = "id";
		$item = "id_categoria";
		$valor = 6;
		$modo = "DESC";

		$promociones = ControladorProductos::ctrMostrarProductos($ordenar, $item, $valor, $base, $tope, $modo);
	}


	if($titulosModulos[1] == "Lo más pedido"){

		$ordenar = "ventas";
		$item = null;
		$valor = null;
		$modo = "DESC";
 
		$ventas = ControladorProductos::ctrMostrarProductos($ordenar, $item, $valor, $base, $tope, $modo);
	}

	if($titulosModulos[2] == "Lo más visto"){

		$ordenar = "vistas";
		$item = null;
		$valor = null;
		$modo = "DESC";

		$vistas = ControladorProductos::ctrMostrarProductos($ordenar, $item, $valor, $base, $tope, $modo);
	}

	$modulos = array($promociones, $ventas, $vistas);


for ($i=0; $i < count($titulosModulos); $i++) { 
	
	echo '<div class="container-fluid well well-sm barraProductos">

				<div class="container">
		
					<div class="row">
			
						<div class="col-xs12 organizarProductos">

							<div class="btn-group pull-right">
				
								<button type="button" class="btn btn-default btnGrid" id="btnGrid'.$i.'">
						
									<i class="fa fa-th" aria-hidden="true"></i>

									<span class="col-xs-0 pull right"> Grid</span>

								</button>

								<button type="button" class="btn btn-default btnList" id="btnList'.$i.'">
						
									<i class="fa fa-list" aria-hidden="true"></i>

									<span class="col-xs-0 pull right"> List</span>

								</button>

							</div>
				
						</div>

					</div>


				</div>
	
			</div>



			<div class="container-fluid productos">
	
				<div class="container">

					<div class="row">



						<div class="col-xs-12 tituloDestacado">



							<div class="col-sm-6 col-xs-12">

								<h1><small>'.$titulosModulos[$i].'</small></h1>

							</div>



							<div class="col-sm-6 col-xs-12">
					
								<a href="'.$rutaModulos[$i].'">
							
									<button class="btn btn-default backColorN pull-right">
							
										Ver más <span class="fa fa-chevron-right"></span>

									</button>

								</a>

							</div>



						</div>

						<div class="clearfix"></div>

						<hr>

					</div>

					

					<ul class="grid'.$i.'">';

					foreach ($modulos[$i] as $key => $value) {
						
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

							<ul class="list'.$i.'" style="display: none;">';

					foreach ($modulos[$i] as $key => $value) {

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

					echo '</ul>


					

				</div>



			</div>';

}

?>