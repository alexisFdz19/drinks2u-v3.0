<?php

require_once "../controllers/usuarios.controlador.php";
require_once "../models/usuarios.modelo.php";

class AjaxUsuarios{

	/*=============================================
	Validar email existente
	=============================================*/	

	public $validarEmail;

	public function ajaxValidarEmail(){

		$datos = $this->validarEmail;

		$respuesta = ControladorUsuarios::ctrMostrarUsuario("email", $datos);

		echo json_encode($respuesta);

	}

}

/*=============================================
Validar email existente
=============================================*/	

if(isset($_POST["validarEmail"])){

	$valEmail = new AjaxUsuarios();
	$valEmail -> validarEmail = $_POST["validarEmail"];
	$valEmail -> ajaxValidarEmail();

}