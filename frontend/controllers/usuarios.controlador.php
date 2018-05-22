<?php

class ControladorUsuarios{

	/*=============================================
	= Registro de usuarios =
	=============================================*/

	public function ctrRegistroUsuario(){

		if (isset($_POST["regUsuario"])){
			
			if (preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/', $_POST["regUsuario"]) &&
				preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["regEmail"]) &&
				preg_match('/^[0-9]*$/', $_POST["regTelefono"]) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["regPassword"])){

				$encriptar = crypt($_POST["regPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$encriptarEmail = md5($_POST["regEmail"], '');

				$datos = array("nombre" => $_POST["regUsuario"],
						    	"password" => $encriptar,
						    	"email" => $_POST["regEmail"],
						    	"telefono" => $_POST["regTelefono"],
						    	"modo" => "directo",
						    	"verificacion" => 1,
						    	"emailEncriptado" => $encriptarEmail);

				$tabla = "usuarios";

				$respuesta = ModeloUsuarios::mdlRegistroUsuario($tabla, $datos);

				if($respuesta == "ok"){

					/*=============================================
					= Verificación por correo electrónico =
					=============================================*/

					date_default_timezone_set("America/Cancun");

					$url = Ruta::ctrRuta();

					$mail = new PHPMailer;

					$mail ->CharSet = 'UTF-8';

					$mail -> isMail();

					$mail -> setFrom('Bussines_Drinks2u@outlook.com', 'Drinks2u');

					$mail -> addReplyTo('Bussines_Drinks2u@outlook.com', 'Drinks2u');

					$mail -> Subject = "Por Favor verifique su dirección de correo electrónico";

					$mail -> addAddress($_POST["regEmail"]);

					$mail -> msgHTML('<div style="width:100%; background:#eee; position:relative; padding-bottom:40px">
	
						<center>
							
							<!--<img style="padding:20px; width:10%" src="views/">--> <h3 style="font-size: 33px; font-family: Merriweather, serif; padding-top: 35px; ">Drinks2u</h3>

						</center>

						<div style="position:relative; margin:auto; width:600px; background:white; padding:20px">
						
							<center>
							
							<img style="padding:20px; width:15%" src="views/img/plantilla/icon-email.png">

							<h3 style="font-weight:100; color:#999">VERIFIQUE SU DIRECCIÓN DE CORREO ELECTRÓNICO</h3>

							<hr style="border:1px solid #ccc; width:80%">

							<h4 style="font-weight:100; color:#999; padding:0 20px">Para comenzar a usar su cuenta de Drinks2u, debe confirmar su dirección de correo electrónico</h4>

							<a href="'.$url.'verificar/'.$encriptarEmail.'" target="_blank" style="text-decoration:none">

							<div style="line-height:60px; background:#FFEB3B; width:60%; color:black">Verifique su dirección de correo electrónico</div>

							</a>

							<br>

							<hr style="border:1px solid #ccc; width:80%">

							<h5 style="font-weight:100; color:#999">Si no se inscribió en esta cuenta, puede ignorar este correo electrónico y la cuenta se eliminará.</h5>

							</center>

						</div>

					</div>');

					$envio = $mail -> Send();

					if(!$envio){
						
						echo '<script> 

								swal({
									  title: "¡ERROR!",
									  text: "Ocurrió un problema al enviar la verificación a su bandeja de correo electrónico a '.$_POST["regEmail"].$mail->ErrorInfo.'",
									  type:"error",
									  confirmButtonText: "Cerrar",
									  closeOnConfirm: false
									},

									function(isConfirm){

										if(isConfirm){
											history.back();
										}
								});

						</script>';

					}else{

						echo '<script> 

							swal({
								  title: "¡Registro exitoso!",
								  text: "Por favor revise la bandeja de entrada o la carpeta de SPAM de su correo electrónico '.$_POST["regEmail"].' para continuar con la verificación de su cuenta",
								  type:"success",
								  confirmButtonText: "Cerrar",
								  closeOnConfirm: false
								},

								function(isConfirm){

									if(isConfirm){
										history.back();
									}
							});

						</script>';

					}

				}
				

			}else{

				echo '<script> 

						swal({
							  title: "¡ERROR!",
							  text: "Error al registrar el usuario, no se permiten carácteres especiales",
							  type:"error",
							  confirmButtonText: "Cerrar",
							  closeOnConfirm: false
							},

							function(isConfirm){

								if(isConfirm){
									history.back();
								}
						});

				</script>';
			}

		}

	}

	/*=============================================
	= Mostrar usuarios =
	=============================================*/

	static public function ctrMostrarUsuario($item, $valor){

		$tabla = "usuarios";

		$respuesta = ModeloUsuarios::mdlMostrarUsuario($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	=  Actualizar usuario =
	=============================================*/

	static public function ctrActualizarUsuario($id, $item, $valor){

		$tabla = "usuarios";

		$respuesta = ModeloUsuarios::mdlActualizarUsuario($tabla, $id, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	= Ingreso de usuarios =
	=============================================*/

	public function ctrIngresoUsuario(){

		if(isset($_POST["ingEmail"])){

			if(preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["ingEmail"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])){

				$encriptar = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$tabla = "usuarios";
				$item = "email";
				$valor = $_POST["ingEmail"];

				$respuesta = ModeloUsuarios::mdlMostrarUsuario($tabla, $item, $valor);

				if($respuesta["email"] == $_POST["ingEmail"] && $respuesta["password"] == $encriptar){

					if($respuesta["verificacion"] == 1){

						echo'<script>

							swal({
								  title: "¡NO HA VERIFICADO SU CORREO ELECTRÓNICO!",
								  text: "Por favor revise la bandeja de entrada o la carpeta de SPAM de su correo para verififcar la dirección de correo electrónico '.$respuesta["email"].'",
								  type: "error",
								  confirmButtonText: "Cerrar",
								  closeOnConfirm: false
							},

							function(isConfirm){
									 if (isConfirm) {	   
									    history.back();
									  } 
							});

							</script>';

					}else{

						$_SESSION["validarSesion"] = "ok";
						$_SESSION["id"] = $respuesta["id"];
						$_SESSION["nombre"] = $respuesta["nombre"];
						$_SESSION["foto"] = $respuesta["foto"];
						$_SESSION["email"] = $respuesta["email"];
						$_SESSION["telefono"] = $respuesta["telefono"];
						$_SESSION["password"] = $respuesta["password"];
						$_SESSION["modo"] = $respuesta["modo"];

						echo '<script>
							
							window.location = localStorage.getItem("rutaActual");

						</script>';

					}

				}else{

					echo'<script>

							swal({
								  title: "¡ERROR AL INGRESAR!",
								  text: "Por favor revise que el email exista o la contraseña coincida con la registrada",
								  type: "error",
								  confirmButtonText: "Cerrar",
								  closeOnConfirm: false
							},

							function(isConfirm){
									 if (isConfirm) {	   
									    window.location = localStorage.getItem("rutaActual");
									  } 
							});

							</script>';

				}

			}else{

				echo '<script> 

						swal({
							  title: "¡ERROR!",
							  text: "Error al ingresar al sistema, no se permiten caracteres especiales",
							  type:"error",
							  confirmButtonText: "Cerrar",
							  closeOnConfirm: false
							},

							function(isConfirm){

								if(isConfirm){
									history.back();
								}
						});

				</script>';

			}

		}

	}

	/*=============================================
	= Olvido de contraseña =
	=============================================*/

	public function ctrOlvidoPassword(){

		if(isset($_POST["passEmail"])){

			if(preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["passEmail"])){

				/*=============================================
				GENERAR CONTRASEÑA ALEATORIA
				=============================================*/

				function generarPassword($longitud){

					$key = "";
					$pattern = "1234567890abcdefghijklmnopqrstuvwxyz";

					$max = strlen($pattern)-1;

					for($i = 0; $i < $longitud; $i++){

						$key .= $pattern{mt_rand(0,$max)};

					}

					return $key;

				}

				$nuevaPassword = generarPassword(11);

				$encriptar = crypt($nuevaPassword, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$tabla = "usuarios";

				$item1 = "email";
				$valor1 = $_POST["passEmail"];

				$respuesta1 = ModeloUsuarios::mdlMostrarUsuario($tabla, $item1, $valor1);

				if($respuesta1){

					$id = $respuesta1["id"];
					$item2 = "password";
					$valor2 = $encriptar;

					$respuesta2 = ModeloUsuarios::mdlActualizarUsuario($tabla, $id, $item2, $valor2);

					if($respuesta2  == "ok"){

						/*=============================================
						CAMBIO DE CONTRASEÑA
						=============================================*/

						date_default_timezone_set("America/Cancun");

						$url = Ruta::ctrRuta();	

						$mail = new PHPMailer;

						$mail->CharSet = 'UTF-8';

						$mail->isMail();

						$mail->setFrom('Bussines_Drinks2u@outlook.com', 'Drinks2u');

						$mail->addReplyTo('Bussines_Drinks2u@outlook.com', 'Drinks2u');

						$mail->Subject = "Solicitud de nueva contraseña";

						$mail->addAddress($_POST["passEmail"]);

						$mail->msgHTML('<div style="width:100%; background:#eee; position:relative; padding-bottom:40px">
	
									<center>
										
										<!--<img style="padding:20px; width:10%" src="views/">--> <h3 style="font-size: 33px; font-family: Merriweather, serif; padding-top: 35px; ">Drinks2u</h3>

									</center>

									<div style="position:relative; margin:auto; width:600px; background:white; padding:20px">
									
										<center>
										
										<img style="padding:20px; width:15%" src="views/img/plantilla/icon-pass.png">

										<h3 style="font-weight:100; color:#999">SOLICITUD DE NUEVA CONTRASEÑA</h3>

										<hr style="border:1px solid #ccc; width:80%">

										<h4 style="font-weight:100; color:#999; padding:0 20px"><strong>Nueva contraseña es: '.$nuevaPassword.'</strong></h4>

										<a href="'.$url.'" target="_blank" style="text-decoration:none">

										<div style="line-height:60px; background:#FFEB3B; width:60%; color:black">Regresar a Drinks2u</div>

										</a>

										<br>

										<hr style="border:1px solid #ccc; width:80%">

										<h5 style="font-weight:100; color:#999">Si no se inscribió en esta cuenta, puede ignorar este correo electrónico y la cuenta se eliminará.</h5>

										</center>

									</div>

								</div>');

						$envio = $mail->Send();

						if(!$envio){

							echo '<script> 

								swal({
									  title: "¡ERROR!",
									  text: "Ha ocurrido un problema enviando cambio de contraseña a '.$_POST["passEmail"].$mail->ErrorInfo.'",
									  type:"error",
									  confirmButtonText: "Cerrar",
									  closeOnConfirm: false
									},

									function(isConfirm){

										if(isConfirm){
											history.back();
										}
								});

							</script>';

						}else{

							echo '<script> 

								swal({
									  title: "¡OK!",
									  text: "Por favor revise la bandeja de entrada o la carpeta de SPAM de su correo electrónico '.$_POST["passEmail"].' para su cambio de contraseña",
									  type:"success",
									  confirmButtonText: "Cerrar",
									  closeOnConfirm: false
									},

									function(isConfirm){

										if(isConfirm){
											history.back();
										}
								});

							</script>';

						}

					}

				}else{

					echo '<script> 

						swal({
							  title: "¡ERROR!",
							  text: "¡El correo electrónico no existe en el sistema!",
							  type:"error",
							  confirmButtonText: "Cerrar",
							  closeOnConfirm: false
							},

							function(isConfirm){

								if(isConfirm){
									history.back();
								}
						});

					</script>';


				}
		
			}else{

				echo '<script> 

						swal({
							  title: "¡ERROR!",
							  text: "Error al enviar el correo electrónico, por favor confirme que este escrito
							  de manera correcta",
							  type:"error",
							  confirmButtonText: "Cerrar",
							  closeOnConfirm: false
							},

							function(isConfirm){

								if(isConfirm){
									history.back();
								}
						});

				</script>';

			}

		}

	}

	/*=============================================
	= Actualizar Perfil =
	=============================================*/

	public function ctrActualizarPerfil(){

		if(isset($_POST["editarNombre"])){

			/*=============================================
			Validar la imagen
			=============================================*/

			$ruta = "";

			if(isset($_FILES["datosImagen"]["tmp_name"])){

				/*=============================================
				Se comprueba si existe ya una imagen en la base de datos
				=============================================*/

				$directorio = "views/img/usuarios/".$_POST["idUsuario"];

				if(!empty($_POST["fotoUsuario"])){

					unlink($_POST["fotoUsuario"]);
				
				}else{

					mkdir($directorio, 0755); // 0755 son los permisos de lectura y escritura

				}

				/*=============================================
				Se guarda la imagen en su directorio
				=============================================*/

				$aleatorio = mt_rand(100, 999);

				$ruta = "views/img/usuarios/".$_POST["idUsuario"]."/".$aleatorio.".jpg";


				/*=============================================
				Modificar el tamaño de la foto
				=============================================*/

				list($ancho, $alto) = getimagesize($_FILES["datosImagen"]["tmp_name"]);

				$nuevoAncho = 500;
				$nuevoAlto = 500;

				$origen = imagecreatefromjpeg($_FILES["datosImagen"]["tmp_name"]);

				$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

				imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

				imagejpeg($destino, $ruta);

			}




			if($_POST["editarPassword"] == ""){

				$password = $_POST["passUsuario"];

			}else{

				$password = crypt($_POST["editarPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

			}

			$datos = array("nombre" => $_POST["editarNombre"],
							"email" => $_POST["editarEmail"],
							"telefono" => $_POST["editarTelefono"],
							"password" => $password,
							"foto" => $ruta,
							"id" => $_POST["idUsuario"]);

			$tabla = "usuarios";

			$respuesta = ModeloUsuarios::mdlActualizarPerfil($tabla, $datos);

			if ($respuesta == "ok") {
				
				$_SESSION["validarSesion"] = "ok";
				$_SESSION["id"] = $datos["id"];
				$_SESSION["nombre"] = $datos["nombre"];
				$_SESSION["foto"] = $datos["foto"];
				$_SESSION["email"] = $datos["email"];
				$_SESSION["telefono"] = $datos["telefono"];
				$_SESSION["password"] = $datos["password"];
				$_SESSION["modo"] = $_POST["modoUsuario"];

				echo '<script> 

						swal({
							  title: "Listo",
							  text: "Los datos de tu perfil han sido actualizados",
							  type:"success",
							  confirmButtonText: "Cerrar",
							  closeOnConfirm: false
							},

							function(isConfirm){

								if(isConfirm){
									history.back();
								}
						});

				</script>';

			}

		}

	}

}