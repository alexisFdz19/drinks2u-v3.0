<?php

require_once "conexion.php";

class ModeloUsuarios{

	/*=============================================
	= Registro de usuarios =
	=============================================*/

	static public function mdlRegistroUsuario($tabla, $datos){


		$stmt = conexion::conectar()->prepare("INSERT INTO $tabla(nombre, password, email, telefono, modo, verificacion, emailEncriptado) VALUES(:nombre, :password, :email, :telefono, :modo, :verificacion, :emailEncriptado)");

		$stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt -> bindParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt -> bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt -> bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$stmt -> bindParam(":modo", $datos["modo"], PDO::PARAM_STR);
		$stmt -> bindParam(":verificacion", $datos["verificacion"], PDO::PARAM_INT);
		$stmt -> bindParam(":emailEncriptado", $datos["emailEncriptado"], PDO::PARAM_STR);

		if($stmt -> execute()){
			
			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();

		$stmt = null;


	}

	/*=============================================
	= Mostrar usuarios =
	=============================================*/

	static public function mdlMostrarUsuario($tabla, $item, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	=  Actualizar usuario   =
	=============================================*/

	static public function mdlActualizarUsuario($tabla, $id, $item, $valor){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item = :$item WHERE id = :id");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
		$stmt -> bindParam(":id", $id, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt-> close();

		$stmt = null;

	}

}