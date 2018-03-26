-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-03-2018 a las 02:36:11
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `drinks2u`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` text COLLATE utf8_spanish_ci NOT NULL,
  `ruta` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `ruta`, `fecha`) VALUES
(1, 'Cerveza', 'cerveza', '2018-02-17 16:17:08'),
(2, 'Tequila', 'tequila', '2018-02-17 16:17:52'),
(3, 'Vodka', 'vodka', '2018-02-17 16:17:52'),
(4, 'Vinos', 'vinos', '2018-03-12 22:00:08'),
(5, 'Botanas y Extras', 'botanas-y-extras', '2018-03-12 22:00:44'),
(6, 'Paquetes', 'paquetes', '2018-03-12 22:10:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_subcategoria` int(11) NOT NULL,
  `ruta` text COLLATE utf8_spanish_ci NOT NULL,
  `titulo` text COLLATE utf8_spanish_ci NOT NULL,
  `titular` text COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `detalles` text COLLATE utf8_spanish_ci NOT NULL,
  `precio` float NOT NULL,
  `portada` text COLLATE utf8_spanish_ci NOT NULL,
  `vistas` int(11) NOT NULL,
  `ventas` int(11) NOT NULL,
  `nuevo` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `id_categoria`, `id_subcategoria`, `ruta`, `titulo`, `titular`, `descripcion`, `detalles`, `precio`, `portada`, `vistas`, `ventas`, `nuevo`, `fecha`) VALUES
(1, 1, 4, '12-pack-tecate-original-355ml', '12 Pack Tecate Original 355ml', '12 pack de cerveza Tecate para esas fiestas con tus seres queridos.', 'La cerveza es una bebida alcohólica que puede combinarse perfectamente: se puede hacer una michelada con sal, lim?n y chile; adicionarle jarabe de granadina para saborizarla; ponerle alg?n tipo de mariscos; salsa tabasco, inglesa, hay muchas opciones. Sin embargo, para compartir con tus amigos estas combinaciones est? el 12 pack de cerveza Tecate para esas fiestas con tus seres queridos.', '{\"Porcentaje de alcohol\": \"1% a 5%\", \"Presentación\"\": \"12\"}', 175, 'views/img/productos/cerveza/tecate/12packtecateoriginal355ml.png', 32, 24, 1, '2018-03-24 21:16:43'),
(2, 2, 11, 'tequila-jose-cuervo-especial-990ml', 'Tequila José Cuervo Especial 990ml', 'Prepara el shot cuervo para sorprender a tus amigos.', 'José Cuervo Especial forma parte de la familia Casa Cuervo y es uno de los tequilas reconocidos a nivel mundial, ya que es destilado de agave azul, y es reposado en barricas de roble, para que su elaboraci?n sea de la m?s alta calidad. Prepara el shot cuervo spicy-al con media onza de este tequila, refresco de toronja, jugo de lim?n, chile piqu?n y de ?rbol, para sorprender a tus amigos.', '{\"Contenido\": \"990ML\", \"Pa?s de procedencia\": \"México\", \"Porcentaje de alcohol: \"35%\"}', 145, 'views/img/productos/tequila/tequila-jose-cuervo/tequilajosecuervoespecial990ml.png', 78, 47, 1, '2018-03-24 21:16:17'),
(3, 3, 13, 'vodka-skyy-750ml', 'Vodka SKYY 750ml\r\n', 'Conviértete en el mejor barman de la fiesta con el Vodka SKYY de 750 ml\r\n', 'Crea grandes y refrescantes cocteles, conviértete en el mejor barman de la fiesta con el Vodka SKYY de 750 ml. SKYY es uno de los primeros vodkas hechos de granos y agua estadounidenses, además de su destilación cuádruple patentada y de su proceso de triple filtración.\r\n', '{\"Contenido\": \"750ML\", \"País de procedencia\": \"Estados Unidos\", \"Porcentaje de alcohol: \"40%\"}\r\n', 175, 'views/img/productos/vodka/skyy/vodkaskyy750ml.png\r\n', 56, 45, 1, '2018-03-24 21:11:01'),
(4, 5, 20, 'sabritas-original-170g', 'Sabritas Original 170g\r\n', 'Sal para disfrutar donde y cuando sea. Porque la vida necesita sabor\r\n', 'Papas Sabritas® Sal: la botana más deliciosa, gracias al sabor a papa natural con el toque exacto de sal que te permite disfrutarlas sin saturación. Emblema de la marca, garantía de calidad y buen sabor, compártelas con todos tus amigos y familiares en tus fiestas y reuniones, a todos les encantaran por su clásico sabor. No lo pienses más, te invitamos a llevarte unas papas Sabritas® Sal para disfrutar donde y cuando sea. Papas Sabritas®, porque la vida necesita sabor.\r\n', '{\"Contenido\": \"170G\", \"Sabor\": \"Sal\", \"Ingredientes\": \"Papa, aceite vegetal, sal yodada\"}\r\n', 36, 'views/img/productos/botanasyextras/sabritas/sabritasoriginal170g.jpg\r\n', 970, 34, 1, '2018-03-25 19:45:13'),
(5, 3, 12, 'absolut-vodka-750ml', 'Absolut Vodka 750ml\r\n', 'Consiente a tu paladar y experimenta el rico sabor del vodka que Abosolut tiene para ti.\r\n', 'El tradicional sabor del vodka Absolut llega ahora a Walmart en línea y podrás conseguirlo para tus siguientes fiestas y reuniones con tus amigos y familiares. Absolut es una de las bebidas alcohólicas qué en comparación con las demás, no cuenta con azúcar añadida y sus ingredientes son naturales. Su intenso sabor es perfecto para mezclarlo con cocteles con alcohol, y es que cuenta con un 40% Alc. Vol. Consiente a tu paladar y experimenta el rico sabor del vodka que Abosolut tiene para ti.\r\n', '{\"Contenido\": \"750ML\", \"País de procedencia\": \"Suecia\", \"Procentaje de alcohol\": \"40%\"}\r\n', 250, 'views/img/productos/vodka/absolut/vodkaabsolut750ml.png\r\n', 232, 79, 1, '2018-03-25 19:45:17'),
(6, 2, 7, 'tequila-centinela-anejado-750ml', 'Tequila Centinela añejado 750ml\r\n', 'Es un tequila envejecido en barricas de roble blanco, con aromas afrutados y notas de madera, canela, anís y ciruela con notas ligeras de menta.\r\n', 'Es un tequila envejecido en barricas de roble blanco, con aromas afrutados y notas de madera, canela, anís y ciruela con notas ligeras de menta.\r\n', '{\"Contenido\": \"750ML\", \"País de procedencia\": \"México\", \"Procentaje de alcohol\": \"38%\"}\r\n', 450, 'views/img/productos/tequila/centinela/tequilaañejocentinela750ml.jpg\r\n', 245, 21, 1, '2018-03-25 19:45:20'),
(7, 5, 21, 'coca-cola-no-retornable-3l', 'Coca Cola no retornable 3L\r\n', 'Refresco Coca Cola 3L.\r\n', 'Refresco Coca Cola 3L.\r\n', '{\"Contenido\": \"3L\", \"Ingredientes\": \"Agua Carbonatada, azúcares, concentrado de Coca Cola\"}\r\n', 40, 'views/img/productos/botanasyextras/refrescos/cocacola3l.jpg\r\n', 346, 21, 1, '2018-03-25 19:45:24'),
(8, 5, 21, 'sprite-no-retornable-3l', 'Sprite no retornable 3L\r\n', 'Sprite, que en su presentación de 3 litros alcanza y sobra para toda la familia en un día de convivencia. \r\n', 'Si deseas consumir una bebida azucarada que tenga un excelente sabor y además puedas compartir en una fiesta familiar, ten en cuenta añadir a tu lista de abarrotes el conocido refresco Sprite, que en su presentación de 3 litros alcanza y sobra para toda la familia en un día de convivencia. Disfruta esta gaseosa después de ir de día de campo o al parque para que puedas recuperar la energía perdida durante la actividad física.\r\n', '{\"Contenido\": \"3L\", \"Sabor\": \"Lima limón\", \"Ingredientes\": \"Agua Carbonatada, azúcares, concentrado de Sprite, benzoato de sodio y estevia\"}\r\n', 35, 'views/img/productos/botanasyextras/refrescos/sprite3l.jpg\r\n', 46, 38, 1, '2018-03-25 19:45:28'),
(9, 1, 3, '12-pack-corona-extra-355ml', '12 pack Corona Extra 355 ml\r\n', 'Es una cerveza tipo Pilsner producida desde 1925. Corona Extra se enfoca en la gente que busca relajarse y refrescarse.\r\n', 'Cerveza corona tambien llamada Coronita, vendida en mas de 180 paises de los cinco continentes, ademas esta entre las mejores 3 marcas del mundo, por esa misma razon debes probarala.\r\n', '{\"Porcentaje de alcohol\":\"de 1 a 5%\",\"Presentación\":\"12\"}\r\n', 160, 'views/img/productos/cerveza/modelo/coronaextra12pack355mll.png\r\n', 134, 16, 1, '2018-03-25 19:45:31'),
(10, 1, 3, '12-pack-corona-light-473ml', '12 pack Corona Light  473 ml\r\n', 'Cerveza con tan solo 95 calorias, 30% menos que una cerveza corno extra.\r\n', 'Corona Light es la primera cerveza de tipo American Lite que produjo Grupo Modelo. Es una cerveza ligera que desconecta del estrés cotidiano y da una sensación ligera, sin remordimientos y sin pesadez.\r\n', '{\"Porcentaje de alcohol\":\"de 1 a 5,3%\",\"Presentación\":\"12\"}\r\n', 160, 'views/img/productos/cerveza/modelo/coronalight12pack473ml.jpeg\r\n', 78, 12, 1, '2018-03-25 19:45:36'),
(11, 1, 6, '6-pack-negra-Modelo-330ml', '6 pack Negra Modelo 330 ml\r\n', '\"La crema de la cerveza\", es una cerveza que ofrece un sabor equilibrado y un delicado aroma a malta oscura, caramelo y lúpulo.\r\n', 'Negra Modelo, es una cerveza tipo Munich con 5.3 grados de alcohol que ofrece un sabor equilibrado y un delicado aroma a malta oscura, caramelo y lúpulo.\r\n', '{\"Porcentaje de alcohol\":\"de 1 a 5,3%\",\"Presentación\":\"6\"}\r\n', 90, 'views/img/productos/cerveza/modelo/modelonegra6pack330ml.jpg\r\n', 89, 20, 1, '2018-03-25 19:45:39'),
(12, 1, 6, '12-pack-modelo-Especial-355ml', '12 pack Modelo Especial 355 ml\r\n', 'Es una cerveza tipo American pilsner, muy diferente, llena de actitud e imagen, con 4.5º de alcohol.\r\n', 'Modelo Especial, es una marca premium producida por Grupo Modelo que es líder entre las cervezas en lata en México y ocupa el tercer lugar entre las cervezas importadas más populares en Estados Unidos.\r\n', '{\"Porcentaje de alcohol\":\"de 1 a 4,5%\",\"Presentación\":\"12\"} \r\n', 155, 'views/img/productos/cerveza/modelomodeloespecial12pack355ml/.jpg\r\n', 57, 12, 1, '2018-03-25 19:45:42'),
(13, 1, 6, '12-pack-modelo-ambar-355ml', '12 pack Modelo Ambar 355 ml\r\n', 'Cerveza Premium, color ámbar, consistente y de espuma cremosa.\r\n', 'Bien balanceada, aroma a lúpulo y grano de cebada. Un sabor ligeramente acaramelado y tostado. Amargura y sabor alcohólico medio. De cuerpo completo, suficiente carbonatación para enriquecer el sabor y proveer una deliciosa y memorable experiencia cervecera.\r\n', '{\"Porcentaje de alcohol\":\"de 1 a 4,5%\",\"Presentación\":\"12\"}\r\n', 178, 'views/img/productos/cerveza/modelo/modeloambar12pack355ml.jpg\r\n', 123, 13, 1, '2018-03-25 19:45:45'),
(14, 1, 5, '6-pack-victoria-Oscura-355ml', '6 pack Victoria 325 ml\r\n', 'Con más de cien años de excelencia, sigue siendo la cerveza que, por su sabor exacto, complace a todos.\r\n', 'Victoria ofrece un delicado y agradable aroma a maltas y lúpulo de la más alta calidad, que se equilibra su color ámbar -único en México- y su blanca y consistente espuma que reviste su transparente y brillante apariencia.\r\n', '{\"Porcentaje de alcohol\":\"de 1 a 4,5%\",\"Presentación\":\"6\"}\r\n', 85, 'views/img/productos/cerveza/modelovictoriaoscura6pack325ml/.jpg\r\n', 56, 12, 1, '2018-03-25 19:45:48'),
(15, 5, 20, 'sabritas-original-140g', 'Sabritas  Original 140g\r\n', 'Las patatas más ricas de mexico\r\n', 'Sabritas una de las mejores botanas que te puedes enctontrar para un reunion casual entre amigos.\r\n', '{\"Contenido\": \"140G\", \"Sabor\": \"Sal\", \"Ingredientes\": \"Papa, aceite vegetal, sal yodada\"}\r\n', 10, 'views/img/productos/botanasyextras/sabritas/sabritasclasicas140g.jpg\r\n', 129, 60, 1, '2018-03-25 19:44:37'),
(16, 5, 20, 'doritos-nachos-140g', 'Doritos Nachos 150g\r\n', 'Ricos trozos de totopos sabor a nacho\r\n', 'Doritos una de las mejores botanas sabor a nacho que te van a encatar con tan solo probar una.\r\n', '{\"Contenido\": \"140G\", \"Sabor\": \"Nacho\", \"Ingredientes\": \"Papa, aceite vegetal, nacho\"}\r\n', 30, 'views/img/productos/botanasyextras/sabritas/doritosnachos140g.png\r\n', 13, 9, 1, '2018-03-25 19:45:54'),
(17, 5, 20, 'pake-taxo-170g', 'Pake Taxo 170g\r\n', 'Rica mezcla de sabritas en una sola bolsa\r\n', 'Excelente botana con un conjunto de varias presentaciones de sabritas en una sola envoltura que te encantaran.\r\n', '{\"Contenido\": \"170G\", \"Sabor\": \"Mezclado\", \"Ingredientes\": \"Papa, aceite vegetal, nacho, queso\"}\r\n', 25, 'views/img/productos/botanasyextras/sabritas/paketaxo170g.jpg\r\n', 122, 88, 1, '2018-03-25 19:45:57'),
(18, 5, 20, 'cacahuates-sabritas-180g', 'Cacahuates Sabritas 180g\r\n', 'Ricos cacachuates con sal y limon listos para saborear\r\n', 'Una excelente eleccion de botana si quieres comer cacahuates con sal y limon.\r\n', '{\"Contenido\": \"180G\"}\r\n', 25, 'views/img/productos/botanasyextras/sabritas/cacahuatesjaponeses180g.jpg\r\n', 20, 10, 1, '2018-03-25 19:46:01'),
(19, 6, 24, 'paquete1', 'Paquete 1', 'Vodka Smirnoff 750ml + Jugo del Valle Antiox Arandano 1L + Jumex Coco Piña 1L + Bolsa de hielos 5KG', 'Vodka Smirnoff 750ml + Jugo del Valle Antiox Arandano 1L + Jumex Coco Piña 1L + Bolsa de hielos 5KG', '{\"Contenido\": \"4 piezas\"}', 269, 'views/img/productos/paquetes/promociones/paquete1.png', 24, 0, 1, '2018-03-24 22:40:56'),
(20, 6, 24, 'paquete2', 'Paquete 2', 'Tequila Don Julio Blanco 750ML + Agua Quina 296ML + Hielos 5KG ', 'Tequila Don Julio Blanco 750ML + Agua Quina 296ML + Hielos 5KG ', '{\"Contenido\": \"3 piezas\"}', 449, 'views/img/productos/paquetes/promociones/paquete2.png', 23, 0, 1, '2018-03-24 22:40:56'),
(21, 6, 24, 'paquete3', 'Paquete 3', 'Vodka Absolut Azul 750ML + Jumex Coco Piña 1L + Antiox Arándano 1L + Mason Jar + Hielos 5KG', 'Vodka Absolut Azul 750ML + Jumex Coco Piña 1L + Antiox Arándano 1L + Mason Jar + Hielos 5KG', '{\"Contenido\": \"5 piezas\"}', 309, 'views/img/productos/paquetes/promociones/paquete3.png', 19, 0, 1, '2018-03-24 23:03:23'),
(22, 6, 24, 'paquete4', 'Paquete 4', 'Ron Capitán Morgan White 750ML + Coca Cola 2L + Agua Mineral 2L + Hielos 5KG', 'Ron Capitán Morgan White 750ML + Coca Cola 2L + Agua Mineral 2L + Hielos 5KG', '{\"Contenido\": \"4 piezas\"}', 199, 'views/img/productos/paquetes/promociones/paquete4.png', 11, 0, 1, '2018-03-24 23:03:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `imgFondo` text COLLATE utf8_spanish_ci NOT NULL,
  `tipoSlide` text COLLATE utf8_spanish_ci NOT NULL,
  `imgProducto` text COLLATE utf8_spanish_ci NOT NULL,
  `estiloImgProducto` text COLLATE utf8_spanish_ci NOT NULL,
  `estiloTextoSlide` text COLLATE utf8_spanish_ci NOT NULL,
  `titulo1` text COLLATE utf8_spanish_ci NOT NULL,
  `titulo2` text COLLATE utf8_spanish_ci NOT NULL,
  `titulo3` text COLLATE utf8_spanish_ci NOT NULL,
  `boton` text COLLATE utf8_spanish_ci NOT NULL,
  `url` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `slide`
--

INSERT INTO `slide` (`id`, `imgFondo`, `tipoSlide`, `imgProducto`, `estiloImgProducto`, `estiloTextoSlide`, `titulo1`, `titulo2`, `titulo3`, `boton`, `url`, `fecha`) VALUES
(1, 'views/img/slide/default/back_default.jpg', 'slideOpcion1', 'views/img/slide/slide1/foto1.png', '{\"top\": \"5%\" ,\"right\": \"15%\" ,\"width\": \"30%\", \"left\":\"\"}', '{\"top\": \"20%\" ,\"right\": \"\" ,\"width\": \"40%\", \"left\":\"10%\"}', '{\"texto\": \"Tecate Light\" ,\"color\": \"#333\"}', '{\"texto\": \"Lorem ipsum dolor sit\" ,\"color\": \"#777\"}', '{\"texto\": \"Lorem ipsum dolor sit\" ,\"color\": \"#888\"}', '<button class=\"btn btn-default backColorN\">\r\n\r\nVer Bebida<span class=\"fa fa-chevron-right\"></span>\r\n\r\n					</button>', '#', '2018-02-23 23:25:25'),
(2, 'views/img/slide/default/back_default.jpg', 'slideOpcion2', 'views/img/slide/slide2/foto2.png', '{\"top\": \"15%\" ,\"right\": \"\" ,\"width\": \"25%\", \"left\":\"15%\"}', '{\"top\": \"20%\" ,\"right\": \"10%\" ,\"width\": \"40%\", \"left\":\"\"}', '{\"texto\": \"Jack Daniel\'s\" ,\"color\": \"#333\"}\r\n\r\n', '{\"texto\": \"Lorem ipsum dolor sit\" ,\"color\": \"#777\"}', '{\"texto\": \"Lorem ipsum dolor sit\" ,\"color\": \"#888\"}', '<button class=\"btn btn-default backColorN\">\r\n\r\nVer Bebida <span class=\"fa fa-chevron-right\"></span>\r\n\r\n					</button>', '#', '2018-02-26 23:58:35'),
(3, 'views/img/slide/default/back_default.jpg', 'slideOpcion1', 'views/img/slide/slide3/foto3.png', '{\"top\": \"8%\" ,\"right\": \"15%\" ,\"width\": \"20%\", \"left\":\"\"}', '{\"top\": \"20%\" ,\"right\": \"\" ,\"width\": \"40%\", \"left\":\"10%\"}', '{\"texto\": \"Absolut Vodka\" ,\"color\": \"#333\"}', '{\"texto\": \"Lorem ipsum dolor sit\" ,\"color\": \"#777\"}', '{\"texto\": \"Lorem ipsum dolor sit\" ,\"color\": \"#888\"}', '<button class=\"btn btn-default backColorN\">\r\n\r\nVer Bebida<span class=\"fa fa-chevron-right\"></span>\r\n\r\n					</button>', '#', '2018-02-23 23:26:28'),
(4, 'views/img/slide/default/back_default.jpg', 'slideOpcion2', 'views/img/slide/slide4/foto4.png', '{\"top\": \"5%\" ,\"right\": \"\" ,\"width\": \"25%\", \"left\":\"15%\"}', '{\"top\": \"20%\" ,\"right\": \"10%\" ,\"width\": \"40%\", \"left\": \"\"}', '{\"texto\": \"Bacardí\" ,\"color\": \"#333\"}', '{\"texto\": \"Lorem ipsum dolor sit\" ,\"color\": \"#777\"}', '{\"texto\": \"Lorem ipsum dolor sit\" ,\"color\": \"#888\"}', '<button class=\"btn btn-default backColorN\">\r\n\r\nVer Bebida <span class=\"fa fa-chevron-right\"></span>\r\n\r\n					</button>', '#', '2018-02-26 23:58:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategorias`
--

CREATE TABLE `subcategorias` (
  `id` int(11) NOT NULL,
  `subcategoria` text COLLATE utf8_spanish_ci NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `ruta` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `subcategorias`
--

INSERT INTO `subcategorias` (`id`, `subcategoria`, `id_categoria`, `ruta`, `fecha`) VALUES
(3, 'Corona', 1, 'corona', '2018-02-17 16:20:59'),
(4, 'Tecate', 1, 'tecate', '2018-02-17 16:20:59'),
(5, 'Victoria', 1, 'victoria', '2018-02-17 16:21:41'),
(6, 'Modelo', 1, 'modelo', '2018-02-17 16:21:41'),
(7, 'Centinela', 2, 'centinela', '2018-02-17 16:23:39'),
(9, 'Bacardí', 2, 'bacardi', '2018-02-17 16:26:03'),
(10, 'Don Julio', 2, 'don-julio', '2018-03-12 22:56:27'),
(11, 'Tequila Jose Cuervo', 2, 'tequila-jose-cuervo', '2018-03-25 19:43:10'),
(12, 'Absolut', 3, 'absolut', '2018-02-17 16:27:34'),
(13, 'SKYY', 3, 'skyy', '2018-02-17 16:27:34'),
(14, 'Smirnoff', 3, 'smirnoff', '2018-02-17 16:29:03'),
(15, 'Grey Goose', 3, 'grey-goose', '2018-02-17 16:29:03'),
(16, 'Jacob\'s Greek', 4, 'jacobs-greek', '2018-03-12 22:02:28'),
(17, 'Beringer', 4, 'beringer', '2018-03-12 22:02:55'),
(18, 'Lindeman\'s', 4, 'lindemans', '2018-03-12 22:03:43'),
(19, 'Hardys', 4, 'hardys', '2018-03-12 22:03:55'),
(20, 'Sabritas y Botanas', 5, 'sabritas', '2018-03-24 20:43:04'),
(21, 'Refrescos y Jugos', 5, 'refrescos-y-jugos', '2018-03-12 22:05:56'),
(22, 'Complementos', 5, 'complementos', '2018-03-12 22:06:46'),
(23, 'Extras', 5, 'extras', '2018-03-12 22:08:28'),
(24, 'Promociones', 6, 'promociones', '2018-03-12 22:10:36');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
