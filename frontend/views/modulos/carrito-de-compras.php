<?php

	$url = Ruta::ctrRuta();

?>

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
							
							

						</h4>

					</div> 

				</div>

			</div>

			<!--=====================================
			Checkout
			======================================-->

			<div class="panel-heading cabeceraCheckout">

				<?php

				if(isset($_SESSION["validarSesion"])){

					if($_SESSION["validarSesion"] == "ok"){

						echo '<a id="btnCheckout" href="#modalCheckout" data-toggle="modal" idUsuario="'.$_SESSION["id"].'" ><button class="btn btn-default backColor btn-lg pull-right">Realizar pago</button></a>';

					}


				}else{

					echo '<a href="#modalIngreso" data-toggle="modal"><button class="btn btn-default backColor btn-lg pull-right">Realizar pago</button></a>';
				}

				?>

			</div>

		</div>

	</div>

</div>

<!--=====================================
Pasarela de pago
======================================-->

<div id="modalCheckout" class="modal fade modalFormulario" role="dialog">
	
	 <div class="modal-content modal-dialog">
	 	
		<div class="modal-body modalTitulo">
			
			<h3 class="backColorYN">REALIZAR PAGO</h3>

			<button type="button" class="close" data-dismiss="modal">&times;</button>

			<div class="contenidoCheckout">

				<div class="formPago row">

					<h4 class="text-center well text-muted text-uppercase">Forma de pago</h4>

					<figure class="col-xs-6">

						<center>
							
							<input id="checkPaypal" type="radio" name="pago" value="paypal" checked>

							<img src="<?php echo $url; ?>views/img/plantilla/paypal.png" class="img-thumbnail">

						</center>
						
					</figure>

					<figure class="col-xs-6">

						<center>
							
							<input id="checkEfectivo" type="radio" name="pago" value="efectivo">

							<img src="<?php echo $url; ?>views/img/plantilla/efectivo.jpg" class="img-thumbnail">

						</center>
						
					</figure>

				</div>

				<br>

				<div class="formEnvio row">

					<h4 class="text-center well text-muted text-uppercase">Entrega</h4>

					<div class="col-xs-12 seleccioneEntrega">

						<p><strong>*Tu direccion exacta de entrega será la dirección que tengas registrada en tu cuenta de PayPal</strong></p>

						<select class="form-control" id="seleccionarEntrega" required>
						
							<option value="">Selecciona tu ubicación</option>

						</select>

						<br>

						<div class="col-xs-12" id="direccionEntrega">

							<input type="text" class="form-control" name="direccionEntrega" id="direccionEntregaInput" placeholder="Escribe tu dirección" required>

						</div>

					</div>
					
				</div>

				<br>

				<br>

				<div class="listaProductos row">

					<h4 class="text-center well text-muted text-uppercase">Tu pedido</h4>

					<table class="table table-striped tablaProductos">
						
						<thead>
							
							<tr>
								
								<th>Producto</th>
								<th>Cantidad</th>
								<th>Precio</th>

							</tr>

						</thead>

						<tbody>
							
							


						</tbody>

					</table>

					<div class="col-sm-6 col-xs-12 pull-right">
						
						<table class="table table-striped tablaTasas">
							
							<tbody>
								
								<tr>
									
									<td>Subtotal</td>
									<td><span class="cambioDivisa">MXN</span> $<span class="valorSubtotal" valor="0">0</span></td>


								</tr>

								<tr>
									
									<td>Entrega</td>
									<td><span class="cambioDivisa">MXN</span> $<span class="precioEntrega">0</span></td>

								</tr>

								<tr>
									
									<td><strong>Total</strong></td>
									<td><strong><span class="cambioDivisa">MXN</span> $<span class="valorTotalCompra" valor="0">0</span></strong></td>


								</tr>

							</tbody>

						</table>

						Pagar con: <div class="divisa">
							
							<select class="form-control" id="cambiarDivisa" name="divisa">
								


							</select>

							<br>

						</div>

					</div>

					<div class="clearfix"></div>

					<form action="prueba.php" class="formEfectivo" method="POST" style="display:none">

						<input name="Submit" class="btn btn-block btn-lg btn-default backColorN " type="submit" value="Pagar">	
								
					</form>

					<button class="btn btn-block btn-lg btn-default backColorN btnPagar">Pagar</button>

				</div>

			</div>

		</div>

		<div class="modal-footer">
			

		</div>

	</div>

</div>