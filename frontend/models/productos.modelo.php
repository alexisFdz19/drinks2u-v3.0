<?php

require_once "conexion.php";

class ModeloProductos{

	/*=============================================
	=            Mostrar las categorias           =
	=============================================*/

	static public function mdlMostrarCategorias($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

				$stmt -> execute();

				return $stmt -> fetchAll();

		}

		$stmt -> close(); 

		$stmt = null; 
	}

	/*=============================================
	=            Mostrar las subcategorias        =
	=============================================*/

	static public function mdlMostrarSubCategorias($tabla, $item, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close(); 

		$stmt = null; 
	}

	/*=============================================
	=            Mostrar los productos           =
	=============================================*/

	static public function mdlMostrarProductos($tabla, $ordenar, $item, $valor, $base, $tope, $modo){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY $ordenar $modo LIMIT $base, $tope");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY $ordenar $modo LIMIT $base, $tope");

		$stmt -> execute();

		return $stmt -> fetchAll();

	}

	$stmt -> close(); 

	$stmt = null;

	}

	/*=============================================
	=            Mostrar info producto       =
	=============================================*/

	static public function mdlMostrarInfoProducto($tabla, $item, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close(); 

		$stmt = null; 
	}

	/*=============================================
	=            Listar productos        =
	=============================================*/

	static public function mdlListarProductos($tabla, $ordenar, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item =:$item ORDER BY $ordenar DESC");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY $ordenar DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close(); 

		$stmt = null; 

	}

	/*=============================================
	=            Mostrar banner        =
	=============================================*/

	static public function mdlMostrarBanner($tabla, $ruta){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE ruta = :ruta");

		$stmt -> bindParam(":ruta", $ruta, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close(); 

		$stmt = null; 
	}

	/*=============================================
	=            buscador        =
	=============================================*/

	static public function mdlBuscarProductos($tabla, $busqueda, $ordenar, $modo, $base, $tope){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE ruta like '%$busqueda%' OR titulo like '%$busqueda%' OR titular like '%$busqueda%' OR descripcion like '%$busqueda%' ORDER BY $ordenar $modo LIMIT $base, $tope");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close(); 

		$stmt = null;

	}

	/*=============================================
	=            Listar productos busqueda       =
	=============================================*/

	static public function mdlListarProductosBusqueda($tabla, $busqueda){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE ruta like '%$busqueda%' OR titulo like '%$busqueda%' OR titular like '%$busqueda%' OR descripcion like '%$busqueda%'");

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close(); 

		$stmt = null;

	}

	/*=============================================
	=            Actualizar vista producto        =
	=============================================*/

	static public function mdlActualizarProducto($tabla, $item1, $valor1, $item2, $valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

		if ($stmt -> execute()) {		

			return "ok";

		}else{

			return "error";

		}

		$stmt -> close(); 

		$stmt = null;

	}

}