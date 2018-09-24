<!--=============================================
=            Banner          =
=============================================-->

<figure class="banner">
	
	<img src="<?php echo $servidor.'views/img/plantilla/contacto2.jpg' ?>" class="img-responsive" width="100%">

	<div class="textoBanner textoCentro">
		
		<h1 style="color: white">AYUDA Y CONTACTO</h1>

		<h2 style="color: white"></h2>

		<h3 style="color: white">¿Tienes alguna duda o buscas colaborar con nosotros?</h3>

	</div>

</figure>

<!--=============================================
=            Breadcrumb         =
=============================================-->

<div class="container-fluid well well-sm">

	<div class="container">
		
		<div class="row">
			
			<div class="breadcrumb fondoBreadcrumb text-uppercase"></div>

		</div>

	</div>

</div>

<!--=============================================
=            Contenido         =
=============================================-->

<div class="container">

	<div class="row">

		<div class="col-md-5 col-sm-6 col-xs-12">
			
			<figure class="banner">
	
				<img src="<?php echo $servidor.'views/img/plantilla/licores.png' ?>" class="img-responsive" width="100%">

			</figure>

		</div>

		<div class="col-md-7 col-sm-6 col-xs-12">
			
			<h4>RESUELVE TU INQUIETUD</h4>

				<form role="form" method="post" onsubmit="return validarContactenos()">

			  		<input type="text" id="nombreContactenos" name="nombreContactenos" class="form-control" placeholder="Escriba su nombre" required> 

			   		<br>
	    	      
   					<input type="email" id="emailContactenos" name="emailContactenos" class="	form-control" placeholder="Escriba su correo electrónico" required>  

   					<br>
	    		     	          
	       			<textarea id="mensajeContactenos" name="mensajeContactenos" class="form-control" placeholder="Escriba su mensaje" rows="5" required></textarea>

	       			<br>
	    	
	       			<input type="submit" value="Enviar" class="btn btn-default backColorN pull-right" id="enviar">         

				</form>

				<?php

					$contactenos = new ControladorUsuarios();
					$contactenos -> ctrFormularioContactenos();


				?>
			
		</div>

	</div>

</div>