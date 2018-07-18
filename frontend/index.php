<?php

    require_once "controllers/plantilla.controlador.php";
    require_once "controllers/productos.controlador.php";
    require_once "controllers/slide.controlador.php";
    require_once "controllers/usuarios.controlador.php";
    require_once "controllers/repartidor.controlador.php";
    require_once "controllers/carrito.controlador.php";

    require_once "models/plantilla.modelo.php";
    require_once "models/productos.modelo.php";
    require_once "models/slide.modelo.php";
    require_once "models/usuarios.modelo.php";
    require_once "models/repartidor.modelo.php";
    require_once "models/carrito.modelo.php";

    require_once "models/rutas.php";

    require_once "extensiones/PHPMailer/PHPMailerAutoload.php";

    $plantilla = new ControladorPlantilla();
    $plantilla -> plantilla();
