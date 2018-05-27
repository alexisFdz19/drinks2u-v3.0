<?php


$servidor = Ruta::ctrRutaServidor();
$url = Ruta::ctrRuta();


?>

<!--=========================
=            Top            =
==========================-->

<div class="container-fluid navBar" id="top">
	
	<div class="container">
		
		<div class="row">

			<!--====================================
			=      Aqui van las redes sociales     = 
			=====================================-->

			<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 social">

				<ul id="ulRedes">
					<li>	
						<a href="http://facebook.com" target="blank">
							<i class="fa fa-facebook-official redSocial facebookBlanco" aria-hidden="true"></i>
						</a>
					</li>
					<li>	
						<a href="http://instagram.com" target="blank">
							<i class="fa fa-instagram redSocial instagramBlanco" aria-hidden="true"></i>
						</a>
					</li>
				</ul>

			</div>

			<!--=====================================
			=            Registro de usuarios       =
			======================================-->
			
			<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 registro divNav" align="right">
				
				<ul class="ulRegistro">
					<li>
						<a href="#">Bebidas</a>
					</li>|
					<li>
						<a href="#">Nosotros</a>
					</li>|
					<li>
						<a href="#">Contacto</a>
					</li>|

					<?php

						if(isset($_SESSION["validarSesion"])){
							
							if($_SESSION["validarSesion"] == "ok"){
								
								if($_SESSION["modo"] == "directo"){
									
									if($_SESSION["foto"] != ""){
										
										echo '<li>

											<img class="img-circle" src="'.$url.$_SESSION["foto"].'" width="3%">

											</li>';

									}else{

										echo '<li><img class="img-circle" src="'.$servidor.'views/img/usuarios/default/anonimo.jpg" width="3%">

											

										</li>';

									}

									echo '<li>|</li>
										<li><a href="'.$url.'perfil">Ver Perfil</a></li>
										<li>|</li>
										<li><a href="'.$url.'salir">Cerrar Sesión</a></li>';

								}

							}

						}else{


							echo '<li>
									<a href="#modalIngreso" data-toggle="modal">Ingresa</a>
								</li>|
								<li>
									<a href="#modalRegistro" data-toggle="modal">Registrate</a>
								</li>';

						}

					?>
				
				</ul>

			</div>



		</div>
	</div>

</div>

<!--============================
=            Header            =
=============================-->

<header id="headerNav">
	<div class="container">

		<div class="row" id="cabezote">
			
			<!--=======================================
			=            Logotipo Drinks2u            =
			========================================-->

			<div class="col-lg-3 col-md-3 col-sm-2 col-xs-12" id="logotipo">
				
				<a href="<?php echo $url; ?>" id="logoContainer" class="brandLogo">Drinks2u

					<!--<img src="<?php echo $servidor.$social["logo"]; ?>" class="img-responsive">-->


				</a>


			</div>


			<!--=======================================
			=            Categorias y el buscador            =
			========================================-->

			<div class="col-lg-6 col-md-6 col-sm-8 col-xs-12" id="divCat">

			<!--=======================================
			=            Categorias            =
			========================================-->
				
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 backColor" id="btnCategorias">
					<p>Categorias
						<span class="pull-right">
							<i class="fa fa-bars" aria-hidden="true"></i>
						</span>
					</p>
				</div>

			<!--=======================================
			=            Buscador           =
			========================================-->

				<div class="input-group col-lg-8 col-md-8 col-sm-8 col-xs-12 backColor" id="buscador">
					
					<input type="search" name="buscar" class="form-control" placeholder="Busca tu bebida o producto">

					<span class="input-group-btn">

							<a href="<?php echo $url; ?>buscador/1/recientes">	

								<button class="btn btn-default backColor" type="submit">
									<i class="fa fa-search"></i>
								</button>

							</a>
					</span>

				</div>

			</div>

			<!--=======================================
			=            Carrito de compras          =
			========================================-->

			<div class="col-lg-3 col-md-3 col-sm-2 col-xs-12" id="carrito">

				<a href="#">
					<button class="btn btn-default pull-left backColor btnCarrito">
						<i class="fa fa-shopping-cart" aria-hidden="true"></i>
					</button>
				</a>

				<p>Tu Carrito<span class="cantidadcesta"></span><br> MXN $<span class="sumacesta"></span></p>

			</div>

		</div>

		<!--=======================================
			=        Lista de categorias      =
		========================================-->

		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="categorias">

			<?php

				$item = null;
				$valor = null;

				$categorias = ControladorProductos::ctrMostrarCategorias($item, $valor);

				foreach ($categorias as $key => $value) {

					echo '<div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">

						<h4>
							<a href="'.$url.$value["ruta"].'" class="pixelCategorias">'.$value["categoria"].'</a>
						</h4>

						<hr>

						<ul>';

						$item = "id_categoria";
						$valor = $value["id"];

						$subcategorias = ControladorProductos::ctrMostrarSubCategorias($item, $valor);

						foreach ($subcategorias as $key => $value){
	
							echo '<li><a href="'.$url.$value["ruta"].'" class="pixelSubCategoria">'.$value["subcategoria"].'</a></li>';

						}

						echo    '</ul>

					</div>';

				}

			?>

		</div>

	</div>

</header>

<!--==============================================
        =  Ventana modal de registro =
==============================================-->

<div class="modal fade modalFormulario" id="modalRegistro" role="dialog">

	<div class="modal-content modal-dialog">

		<div class="modal-body modalTitulo">

			<h3 class="backColorYN">REGISTRO DE USUARIOS DRINKS2U</h3>

			<button type="button" class="close" data-dismiss="modal">&times;</button>
			
			<!--==============================================
        	=  Registro facebook =
			==============================================-->

			<div class="col-sm-6 col-xs-12 facebook">
				
				<p>
					
					<i class="fa fa-facebook"></i>
					Registrtate con Facebook

				</p>

			</div>

			<!--==============================================
        	=  Registro google =
			==============================================-->

			<div class="col-sm-6 col-xs-12 google">
				
				<p>
					
					<i class="fa fa-google"></i>
					Registrate con Google

				</p>

			</div>

			<br>

			<!--==============================================
        	=  formulario de registro directo =
			==============================================-->

			<form method="POST" onsubmit="return registroUsuario()">
				 
				<hr>

				<div class="form-group">
					
					<div class="input-group">
						
						<span class="input-group-addon">
							
							<i class="glyphicon glyphicon-user"></i>

						</span>

						<input type="text" class="form-control text-uppercase" id="regUsuario" name="regUsuario" placeholder="Nombre Completo" required>


					</div>

				</div>

				<div class="form-group">
					
					<div class="input-group">
						
						<span class="input-group-addon">
							
							<i class="glyphicon glyphicon-envelope"></i>

						</span>

						<input type="email" class="form-control" id="regEmail" name="regEmail" placeholder="Correo Electrónico" required>


					</div>

				</div>

				<div class="form-group">
					
					<div class="input-group">
						
						<span class="input-group-addon">
							
							<i class="glyphicon glyphicon-lock"></i>

						</span>

						<input type="password" class="form-control" id="regPassword" name="regPassword" placeholder="Contraseña" required>

					</div>

				</div>

				<div class="form-group">
					
					<div class="input-group">
						
						<span class="input-group-addon">
							
							<i class="glyphicon glyphicon-earphone"></i>

						</span>

						<input type="text" class="form-control" id="regTelefono" name="regTelefono" placeholder="Numero Celular" minlength="10" maxlength="10" required>


					</div>

				</div>

				<!--==============================================
        		=  Condiciones de uso y politicas de provacidad =
				==============================================-->

				<div class="checkBox">
					
					<label class="custom-control-label" for="regPoliticas">
						
						<input id="regPoliticas" type="checkbox">

							<small>Al registrarse, usted acepta ser mayor de 18 años además de nuestras condiciones de uso y políticas de privacidad

								<br>

								<a href="//www.iubenda.com/privacy-policy/69909540" class="iubenda-white iubenda-embed" title="Condiciones de uso y políticas de privacidad">Ver más</a><script type="text/javascript">(function (w,d) {var loader = function () {var s = d.createElement("script"), tag = d.getElementsByTagName("script")[0]; s.src = "//cdn.iubenda.com/iubenda.js"; tag.parentNode.insertBefore(s,tag);}; if(w.addEventListener){w.addEventListener("load", loader, false);}else if(w.attachEvent){w.attachEvent("onload", loader);}else{w.onload = loader;}})(window, document);</script>

							</small>

					</label>

				</div>

				<?php

					$registro = new ControladorUsuarios();
					$registro -> ctrRegistroUsuario();

				?>

				<input type="submit" class="btn btn-default backColorN btn-block" value="Registrarme">

			</form>

		</div>

		<div class="modal-footer">
			
			¿Ya tienes una cuenta registrada? | <strong><a href="#modalIngreso" data-dismiss="modal" data-toggle="modal">Ingresar</a></strong>

		</div>
		
	</div>

</div>

<!--==============================================
        =  Ventana modal de ingreso =
==============================================-->

<div class="modal fade modalFormulario" id="modalIngreso" role="dialog">

	<div class="modal-content modal-dialog">

		<div class="modal-body modalTitulo">

			<h3 class="backColorYN">INICIA SESION CON TU CUENTA DRINKS2U</h3>

			<button type="button" class="close" data-dismiss="modal">&times;</button>
			
			<!--==============================================
        	=  Ingreso facebook =
			==============================================-->

			<div class="col-sm-6 col-xs-12 facebook">
				
				<p>
					
					<i class="fa fa-facebook"></i>
					Inicia sesión con Facebook

				</p>

			</div>

			<!--==============================================
        	=  Ingreso google =
			==============================================-->

			<div class="col-sm-6 col-xs-12 google">
				
				<p>
					
					<i class="fa fa-google"></i>
					Inicia sesión con Google

				</p>

			</div>

			<br>

			<!--==============================================
        	=  formulario de ingreso directo =
			==============================================-->

			<form method="POST">
				 
				<hr>

				<div class="form-group">
					
					<div class="input-group">
						
						<span class="input-group-addon">
							
							<i class="glyphicon glyphicon-envelope"></i>

						</span>

						<input type="email" class="form-control" id="ingEmail" name="ingEmail" placeholder="Correo Electrónico" required>


					</div>

				</div>

				<div class="form-group">
					
					<div class="input-group">
						
						<span class="input-group-addon">
							
							<i class="glyphicon glyphicon-lock"></i>

						</span>

						<input type="password" class="form-control" id="ingPassword" name="ingPassword" placeholder="Contraseña" required>

					</div>

				</div>

				<?php

					$ingreso = new ControladorUsuarios();
					$ingreso -> ctrIngresoUsuario();

				?>

				<input type="submit" class="btn btn-default backColorN btn-block btnIngreso" value="Ingresar">

				<br>

				<center>
					
					<a href="#modalPassword" data-dismiss="modal" data-toggle="modal">¿Olvidaste tu contraseña?</a>

				</center>

			</form>

		</div>

		<div class="modal-footer">
			
			¿Aún no estas registrado? | <strong><a href="#modalRegistro" data-dismiss="modal" data-toggle="modal">Registrate</a></strong>

		</div>
		

	</div>
	
</div>

<!--=====================================
Ventana modal olvido contraseña
======================================-->

<div class="modal fade modalFormulario" id="modalPassword" role="dialog">

    <div class="modal-content modal-dialog">

        <div class="modal-body modalTitulo">

        	<h3 class="backColorYN">SOLICITUD DE NUEVA CONTRASEÑA</h3>

           <button type="button" class="close" data-dismiss="modal">&times;</button>
        	
			<!--=====================================
			olvido contraseña
			======================================-->

			<form method="post">

				<label class="text-muted">Escribe el correo electrónico con el que estás registrado para enviarte tu nueva contraseña:</label>

				<div class="form-group">
					
					<div class="input-group">
						
						<span class="input-group-addon">
							
							<i class="glyphicon glyphicon-envelope"></i>
						
						</span>
					
						<input type="email" class="form-control" id="passEmail" name="passEmail" placeholder="Correo Electrónico" required>

					</div>

				</div>			

				<?php

					$password = new ControladorUsuarios();
					$password -> ctrOlvidoPassword();

				?>
				
				<input type="submit" class="btn btn-default backColorN btn-block" value="ENVIAR">	

			</form>

        </div>

        <div class="modal-footer">
          
			¿No tienes una cuenta registrada? | <strong><a href="#modalRegistro" data-dismiss="modal" data-toggle="modal">Registrarse</a></strong>

        </div>
      
    </div>

</div>