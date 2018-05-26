<?php

class ControladorRepartidor{

	/*=============================================
	= Mostrar repartidor =
	=============================================*/

	static public function ctrMostrarRepartidor($item, $valor){

		$tabla = "repartidor";

		$respuesta = ModeloRepartidor::mdlMostrarRepartidor($tabla, $item, $valor);

		return $respuesta;

	}



}