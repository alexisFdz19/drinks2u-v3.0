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

}