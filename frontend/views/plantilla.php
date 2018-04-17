<!DOCTYPE html>
<html lang="es-mx">
<head>
    <meta charset="utf-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0,
    maximum-scale=1.0, user-scalable=no">
    
    <meta name="Drinks2u" content="Bebidas a domicilio">

    <meta name="description" content="Lorem ipsum">

    <meta name="keyword" content="Lorem ipsum">

    <title>Drinks2u</title>

    <?php

        session_start();

        $servidor = Ruta::ctrRutaServidor();

        /*==============================================
        = aqui se mantiene fija la ruta del proyecto   =
        ==============================================*/

        $url = Ruta::ctrRuta();

    ?>

    <link rel="icon" href="http://localhost/proyect/Drinks2u3/backend/views/img/plantilla/logonav.png">
    

    <!--=====================================
        =     Plugins de css   =
    ======================================-->

    <link rel="stylesheet" href="<?php echo $url; ?>views/css/plugins/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $url; ?>views/css/plugins/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $url; ?>views/css/plugins/flexslider.css">
    <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">


    <!--=====================================
    =            Hojas css personalizadas            =
    ======================================-->
    

    <link rel="stylesheet" type="text/css" href="<?php echo $url; ?>views/css/plantilla.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $url; ?>views/css/cabezote.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $url; ?>views/css/slide.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $url; ?>views/css/productos.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $url; ?>views/css/infoproducto.css">
    
</head>
<body>
    
    <?php

        /*==============================================
        = Se inserta el cabezote de la carpeta modulos=
        ==============================================*/
        
        include "modulos/cabezote.php";

        /*==============================================
        =             Contenido dinamico                =
        ==============================================*/

        $rutas = array();
        $ruta = null;
        $infoProducto = null;

        if(isset($_GET["ruta"])){

            $rutas = explode("/", $_GET["ruta"]);

            $item = "ruta";
            $valor = $rutas[0];

            /*==============================================
            =       URL´s Amigables   de categorias        =
            ==============================================*/

            $rutaCategorias = ControladorProductos::ctrMostrarCategorias($item, $valor);

            if($rutas[0] == $rutaCategorias["ruta"]){

                $ruta = $rutas[0];

            }

            /*==============================================
            =    URL´s Amigables   de subcategorias        =
            ==============================================*/

            $rutaSubCategorias = ControladorProductos::ctrMostrarSubCategorias($item, $valor);

            foreach ($rutaSubCategorias as $key => $value) {
                
                if($rutas[0] == $value["ruta"]){

                    $ruta = $rutas[0];

                }

            }

            /*==============================================
            =    URL´s Amigables   de productos        =
            ==============================================*/

            $rutaProductos = ControladorProductos::ctrMostrarInfoProducto($item, $valor);

            if($rutas[0] == $rutaProductos["ruta"]){

                    $infoProducto = $rutas[0];

            }

            /*==============================================
            =      Lista blanca de  URL´s Amigables       =
            ==============================================*/

            if($ruta != null || $rutas[0] == "promociones" || $rutas[0] == "lo-mas-pedido" || $rutas[0] == "lo-mas-visto"){

                include "modulos/productos.php";

            }else if($infoProducto != null){

                include "modulos/infoproducto.php";

            }else if($rutas[0] == "buscador"){

                include "modulos/buscador.php";

            }else{

                include "modulos/error404.php";

            }

        }else{

            include "modulos/slide.php";
            include "modulos/destacados.php";
        }

    ?>


<!--=====================================
=     Plugins de javascript   =
======================================-->

<script src="<?php echo $url; ?>views/js/plugins/jquery.min.js"></script>
<script src="<?php echo $url; ?>views/js/plugins/bootstrap.min.js"></script>
<script src="<?php echo $url; ?>views/js/plugins/jquery.easing.js"></script>
<script src="<?php echo $url; ?>views/js/plugins/jquery.scrollUp.js"></script>
<script src="<?php echo $url; ?>views/js/plugins/jquery.flexslider.js"></script>


<input type="hidden" value="<?php echo $url; ?>" id="rutaOculta">
<!--=====================================
=     javascript personalizado   =
======================================-->

<script src="<?php echo $url; ?>views/js/cabezote.js"></script>
<script src="<?php echo $url; ?>views/js/plantilla.js"></script>
<script src="<?php echo $url; ?>views/js/slide.js"></script>
<script src="<?php echo $url; ?>views/js/buscador.js"></script>
<script src="<?php echo $url; ?>views/js/infoproducto.js"></script>

</body>
</html>