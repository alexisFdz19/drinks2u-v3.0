<!--=====================================
Breadcrumb carrito de compras
======================================-->

<div class="container-fluid well well-sm">
	
	<div class="container">
		
		<div class="row">
			
			<ul class="breadcrumb fondoBreadcrumb text-uppercase">
				
				<li><a href="<?php echo $url;  ?>">Carrito de compras</a></li>
				<li class="active pagActiva"><?php echo $rutas[0] ?></li>

			</ul>

		</div>

	</div>

</div>

<!--=====================================
Tabla del carrito
======================================-->

<div class="container-fluid">

	<div class="container">

		<div class="panel panel-default">
			
			<!--=====================================
			Cabecera
			======================================-->

			<div class="panel-heading cabeceraCarrito">
				
				<div class="col-md-6 col-sm-7 col-xs-12 text-center">
					
					<h3>
						<small>Producto</small>
					</h3>

				</div>

				<div class="col-md-2 col-sm-1 col-xs-0 text-center">
					
					<h3>
						<small>Precio</small>
					</h3>

				</div>

				<div class="col-sm-2 col-xs-0 text-center">
					
					<h3>
						<small>Cantidad</small>
					</h3>

				</div>

				<div class="col-sm-2 col-xs-0 text-center">
					
					<h3>
						<small>Subtotal</small>
					</h3>

				</div>

			</div>

			<!--=====================================
			Cuerpo
			======================================-->

			<div class="panel-body cuerpoCarrito">

				<!-- item1 -->
				
				<div clas="row itemCarrito">

					<div class="col-sm-1 col-xs-12">
						
						<br>

						<center>
							
							<button class="btn btn-default backColorN">
								
								<i class="fa fa-times"></i>

							</button>

						</center>	

					</div>

					<div class="col-sm-1 col-xs-12">
						
						<figure>
							
							<img src="http://localhost:8080/proyect/drinks2u3/backend/views/img/productos/tequila/centinela/tequilaañejocentinela750ml.jpg" class="img-thumbnail">

						</figure>

					</div>

					<div class="col-sm-4 col-xs-12">

						<br>

						<p class="tituloCarritoCompra text-left">Tequila Centinela Añejado 750 ML</p>

					</div>

					<div class="col-md-2 col-sm-1 col-xs-12">

						<br>

						<p class="precioCarritoCompra text-center">MXN $<span>450</span></p>

					</div>

					<div class="col-md-2 col-sm-3 col-xs-8">

						<br>	

						<div class="col-xs-8">

							<center>
							
								<input type="number" class="form-control" min="1" value="1">	

							</center>

						</div>

					</div>

					<div class="col-md-2 col-sm-1 col-xs-4 text-center">
						
						<br>

						<p>
							
							<strong>MXN $<span>450</span></strong>

						</p>

					</div>
					
				</div>

				<div class="clearfix"></div>

				<hr>

				<!-- item2 -->

				<div clas="row itemCarrito">

					<div class="col-sm-1 col-xs-12">
						
						<br>

						<center>
							
							<button class="btn btn-default backColorN">
								
								<i class="fa fa-times"></i>

							</button>

						</center>	

					</div>

					<div class="col-sm-1 col-xs-12">
						
						<figure>
							
							<img src="http://localhost:8080/proyect/drinks2u3/backend/views/img/productos/paquetes/promociones/paquete1.png" class="img-thumbnail">

						</figure>

					</div>

					<div class="col-sm-4 col-xs-12">

						<br>

						<p class="tituloCarritoCompra text-left">Paquete 1</p>

					</div>

					<div class="col-md-2 col-sm-1 col-xs-12">

						<br>

						<p class="precioCarritoCompra text-center">MXN $<span>269</span></p>

					</div>

					<div class="col-md-2 col-sm-3 col-xs-8">

						<br>	

						<div class="col-xs-8">

							<center>
							
								<input type="number" class="form-control" min="1" value="1">	

							</center>

						</div>

					</div>

					<div class="col-md-2 col-sm-1 col-xs-4 text-center">
						
						<br>

						<p>
							
							<strong>MXN $<span>269</span></strong>

						</p>

					</div>
					
				</div>

				<div class="clearfix"></div>

				<hr>

			</div>

			<!--=====================================
			SUMA DEL TOTAL DE PRODUCTOS
			======================================-->

			<div class="panel-body sumaCarrito">

				<div class="col-md-4 col-sm-6 col-xs-12 pull-right well">
					
					<div class="col-xs-6">
						
						<h4>Total:</h4>

					</div>

					<div class="col-xs-6">

						<h4 class="sumaSubTotal">
							
							<strong>MXN $<span>719</span></strong>

						</h4>

					</div> 

				</div>

			</div>

			<!--=====================================
			BOTÓN CHECKOUT
			======================================-->

			<div class="panel-heading cabeceraCheckout">
				
				<button class="btn btn-default backColorN btn-lg pull-right">Realizar pago</button>

			</div>

		</div>

	</div>

</div>