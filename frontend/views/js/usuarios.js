/*==============================================
= Validar el registro de usuarios   =
==============================================*/

function registroUsuario(){

	/*==============================================
	= validar nombre de usuario  =
	==============================================*/

	var nombre = $("#regUsuario").val();

	if (nombre != ""){

		var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;

		if (!expresion.test(nombre)){

			$("#regUsuario").parent().before('<div class="alert alert-warning"><strong>Error: </strong>No se permiten numeros ni carácteres especiales</div>')

			return false;

		}

	}else{

		$("#regUsuario").parent().before('<div class="alert alert-warning">Este campo es obligatorio</div>')

		return false;
	}

	/*==============================================
	= validar email  =
	==============================================*/

	var email = $("#regEmail").val();

	if (email != ""){

		var expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

		if (!expresion.test(email)){

			$("#regEmail").parent().before('<div class="alert alert-warning"><strong>Error: </strong>Escriba correctamente su correo electrónico</div>')

			return false;

		}

	}else{

		$("#regEmail").parent().before('<div class="alert alert-warning">Este campo es obligatorio</div>')

		return false;
	}

	/*==============================================
	= validar numero de telefono  =
	==============================================*/

	var telefono = $("#regTelefono").val();

	if (telefono != ""){

		var expresion = /^[0-9]*$/;

		if (!expresion.test(telefono)){

			$("#regTelefono").parent().before('<div class="alert alert-warning"><strong>Error: </strong>Escriba correctamente los 10 numeros de su telefono celular</div>')

			return false;

		}

	}else{

		$("#regEmail").parent().before('<div class="alert alert-warning">Este campo es obligatorio</div>')

		return false;
	}

	/*==============================================
	= validar contraseña  =
	==============================================*/

	var password = $("#regPassword").val();

	if (password != ""){

		var expresion = /^[a-zA-Z0-9]*$/;

		if (!expresion.test(password)){

			$("#regPassword").parent().before('<div class="alert alert-warning"><strong>Error: </strong>No se permiten carácteres especiales</div>')

			return false;

		}

	}else{

		$("#regPassword").parent().before('<div class="alert alert-warning">Este campo es obligatorio</div>')

		return false;
	}

	/*==============================================
	= validar condiciones de uso y políticas de privacidad  =
	==============================================*/

	var politicas = $("#regPoliticas:checked").val();

	if(politicas != "on"){

		$("#regPoliticas").parent().before('<div class="alert alert-warning">Debe aceptar nuestras condiciones de uso y políticas de privacidad</div>')
		
		return false;
	}

	return true;
	
}