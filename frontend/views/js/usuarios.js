/*=============================================
Captura de ruta
=============================================*/

var rutaActual = location.href;

$(".btnIngreso").click(function(){

	localStorage.setItem("rutaActual", rutaActual);


})

/*=============================================
Formatear los input
=============================================*/

$("input").focus(function(){

	$(".alert").remove();
})

/*==============================================
= Validar email repetido  =
==============================================*/

var validarEmailRepetido = false;

$("#regEmail").change(function(){

	var email = $("#regEmail").val();

	var datos = new FormData();
	datos.append("validarEmail", email);

	$.ajax({

		url:rutaOculta+"ajax/usuarios.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success:function(respuesta){
			console.log("respuesta", respuesta);
			
			if(respuesta == "false"){

				$(".alert").remove();
				validarEmailRepetido = false;
				
			}else{

				var modo = JSON.parse(respuesta).modo;
				
				if(modo == "directo"){

					modo = "esta página";
				}

				$("#regEmail").parent().before('<div class="alert alert-warning"><strong>ERROR:</strong> El correo electrónico ya existe en la base de datos, fue registrado a través de '+modo+', por favor ingrese otro diferente</div>')

					validarEmailRepetido = true;

			}

		}

	})

})

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

		if(validarEmailRepetido){

			$("#regEmail").parent().before('<div class="alert alert-danger"><strong>ERROR:</strong> El correo electrónico ya existe en la base de datos, por favor ingrese otro diferente</div>')

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

/*=============================================
CAMBIAR FOTO
=============================================*/

$("#btnCambiarFoto").click(function(){

	$("#imgPerfil").toggle();
	$("#subirImagen").toggle();

})

$("#datosImagen").change(function(){

	var imagen = this.files[0];

	/*=============================================
	Se valida el formato de la imagen
	=============================================*/
	
	if(imagen["type"] != "image/jpeg"){

		$("#datosImagen").val("");

		swal({
		  title: "Error al subir la imagen",
		  text: "Tu nueva imagen debe estar en formato JPG",
		  type: "error",
		  confirmButtonText: "Cerrar",
		  closeOnConfirm: false
		},
		function(isConfirm){
				 if (isConfirm) {	   
				    window.location = rutaOculta+"perfil";
				  } 
		});

	/*=============================================
	Se valida el tamaño de la imagen
	=============================================*/

	}else if(Number(imagen["size"]) > 2000000){

		$("#datosImagen").val("");

		swal({
		  title: "Error al subir la imagen",
		  text: "Tu nueva imagen no debe pesar más de 2 MB",
		  type: "error",
		  confirmButtonText: "Cerrar",
		  closeOnConfirm: false
		},
		function(isConfirm){
				 if (isConfirm) {	   
				    window.location = rutaOculta+"perfil";
				  } 
		});

	}else{

		var datosImagen = new FileReader;
		datosImagen.readAsDataURL(imagen);

		$(datosImagen).on("load", function(event){

			var rutaImagen = event.target.result;
			$(".previsualizar").attr("src", rutaImagen);

		})

	}

})