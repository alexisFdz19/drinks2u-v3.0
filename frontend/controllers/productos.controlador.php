<?php

class ControladorProductos{

	/*=============================================
	=            Mostrar las categorias           =
	=============================================*/

	static public function ctrMostrarCategorias($item, $valor){

		$tabla = "categorias";

		$respuesta = ModeloProductos::mdlMostrarCategorias($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	=            Mostrar las subcategorias        =
	=============================================*/

	static public function ctrMostrarSubCategorias($item, $valor){
		
		$tabla = "subcategorias";

		$respuesta = ModeloProductos::mdlMostrarSubCategorias($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	=            Mostrar los productos       =
	=============================================*/

	static public function ctrMostrarProductos($ordenar){

		$tabla = "productos";

		$respuesta = ModeloProductos::mdlMostrarProductos($tabla, $ordenar);

		return $respuesta;
	}

	/*=============================================
	=            Mostrar info productos        =
	=============================================*/

	static public function ctrMostrarInfoProducto($item, $valor){

		$tabla = "productos";

		$respuesta = ModeloProductos::mdlMostrarInfoProducto($tabla, $item, $valor);

		return $respuesta;
	}

}

