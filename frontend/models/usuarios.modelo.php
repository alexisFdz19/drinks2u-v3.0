<?php

require_once "conexion.php";

class ModeloUsuarios{

	/*=============================================
	= Registro de usuarios =
	=============================================*/

	static public function mdlRegistroUsuario($tabla, $datos){


		$stmt = conexion::conectar()->prepare("INSERT INTO $tabla(nombre, password, email, telefono, modo, verificacion) VALUES(:nombre, :password, :email, :telefono, :modo, :verificacion)");

		$stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt -> bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt -> bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$stmt -> bindParam(":modo", $datos["modo"], PDO::PARAM_STR);
		$stmt -> bindParam(":verificacion", $datos["verificacion"], PDO::PARAM_INT);

		if($stmt -> execute()){
			
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();
		$stmt = null;


	}



}