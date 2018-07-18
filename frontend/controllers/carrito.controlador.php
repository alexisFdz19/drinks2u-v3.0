<?php

class ControladorCarrito{

	/*=============================================
	Datos Paypal
	=============================================*/

	public function ctrMostrarTarifas(){

		$tabla = "comercio";

		$respuesta = ModeloCarrito::mdlMostrarTarifas($tabla);

		return $respuesta;

	}

	/*=============================================
	Nuevos pedidos
	=============================================*/

	static public function ctrNuevasCompras($datos){

		$tabla = "pedidos";

		$respuesta = ModeloCarrito::mdlNuevasCompras($tabla, $datos);

		return $respuesta;

	}

}	