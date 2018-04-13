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
			
			<!--=============================================
			=            Visor de productos          =
			=============================================-->

			<div class="col-md-5 col-sm-6 col-xs-12 visorImg">

				<figure class="visor">
					
					<img id="lupa1" class="img-thumbnail" src="http://localhost/proyect/drinks2u3/backend/views/img/productos/cerveza/tecate/12packtecateoriginal355ml.png">

				</figure>

				<div class="flexslider">

				  <ul class="slides">

				    <li>

				      <img value="1" class="img-thumbnail" src="http://localhost/proyect/drinks2u3/backend/views/img/productos/cerveza/tecate/12packtecateoriginal355ml.png" alt="12 pack Tecate Original 355ml" />

				    </li>

				  </ul>

				</div>

			</div>

			<!--=============================================
			=            Visor de productos          =
			=============================================-->

			<div class="col-md-7 col-sm-6 col-xs-12">

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