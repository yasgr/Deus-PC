-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 11-12-2022 a las 22:27:41
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `name` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `password` varchar(50) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'admin', '698d51a19d8a121ce581499d7b701668'),
(2, 'Yasmina', '202cb962ac59075b964b07152d234b70'),
(9, '111', '698d51a19d8a121ce581499d7b701668'),
(10, 'prueba', 'bcbe3365e6ac95ea2c0343a2395834dd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carro`
--

CREATE TABLE `carro` (
  `id` int(100) NOT NULL,
  `id_usuario` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `precio` int(10) NOT NULL,
  `cantidad` int(10) NOT NULL,
  `imagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `carro`
--

INSERT INTO `carro` (`id`, `id_usuario`, `pid`, `name`, `precio`, `cantidad`, `imagen`) VALUES
(2, 1, 2, 'NVIDIA RTX 4090', 2400, 1, 'tg_01.png'),
(3, 1, 3, 'AMD Ryzen 9 7950X', 699, 1, 'prcsr_01.webp');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_deseos`
--

CREATE TABLE `lista_deseos` (
  `id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `precio` int(100) NOT NULL,
  `imagen` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `id_usuario` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `lista_deseos`
--

INSERT INTO `lista_deseos` (`id`, `pid`, `name`, `precio`, `imagen`, `id_usuario`) VALUES
(13, 6, 'placasbase', 164, 'pb_01.png', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id` int(100) NOT NULL,
  `id_usuario` int(100) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `numero` varchar(12) CHARACTER SET utf8mb4 NOT NULL,
  `mensaje` varchar(500) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(100) NOT NULL,
  `id_usuario` int(100) NOT NULL,
  `name` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `numero` varchar(9) CHARACTER SET utf8mb4 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `metodo` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `direccion` varchar(500) CHARACTER SET utf8mb4 NOT NULL,
  `total_productos` varchar(1000) CHARACTER SET utf8mb4 NOT NULL,
  `total_precio` int(100) NOT NULL,
  `fecha` datetime DEFAULT CURRENT_TIMESTAMP,
  `estado_pago` varchar(20) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(100) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `detalles` varchar(500) CHARACTER SET utf8mb4 NOT NULL,
  `precio` int(10) NOT NULL,
  `img_01` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `img_02` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `img_03` varchar(100) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `name`, `detalles`, `precio`, `img_01`, `img_02`, `img_03`) VALUES
(2, 'NVIDIA RTX 4090', 'Aprovechando un nuevo diseÃ±o inspirado en la aerodinÃ¡mica, la NVIDIA RTX 4090 utiliza la GPU para juegos mÃ¡s avanzada del mundo con tecnologÃ­a de la arquitectura NVIDIA Ada Lovelace. Usando tecnologÃ­as de enfriamiento de vanguardia derivadas del modelo insignia, Trinity OC tiene el poder para ofrecer a los jugadores el FPS vertiginoso que necesitan en los tÃ­tulos mÃ¡s recie', 2400, 'tg_01.png', 'tg_02.png', 'tg_03.png'),
(3, 'AMD Ryzen 9 7950X', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ', 699, 'prcsr_01.webp', 'img_02.png', 'tj_gr1.jpg'),
(6, 'placasbase', 'Placa base AMD B550 AORUS con VRM digital real de 12 + 2 fases, disipadores de calor de superficie agrandados, ranura PCIe 4.0 x16, PCIe 4.0 / 3.0 x4 M.2 dual con un protector tÃ©rmico, LAN de 2.5GbE, RGB FUSION 2.0, Q-Flash Plus', 164, 'pb_01.png', 'pb_02.png', 'pb_03.png'),
(7, 'Corsair 850W Gold Modular', 'Las fuentes de alimentaciÃ³n completamente modulares y de nivel sonoro ultrarreducido CORSAIR RM Series con conectores dobles/triples EPS12V proporcionan una potencia eficiente a su PC gracias a la certificaciÃ³n 80 PLUS Gold.', 162, 'psu_01.png', 'psu_02.png', 'psu_03.png'),
(8, 'Corsair Vengeance DDR4 3200 16GB 2X8', 'La memoria Corsair Vengeance LPX se ha diseÃ±ado para overclocking de alto rendimiento. El disipador de calor, fabricado en aluminio puro, permite una disipaciÃ³n tÃ©rmica mÃ¡s rÃ¡pida, la placa impresa de ocho capas administra el calor y proporciona una capacidad superior para incrementar el overclocking.', 35, 'ram_01.png', 'ram_02.png', 'ram_03.png'),
(9, 'Seagate BarraCuda 2.5&#34; 1TB SATA 3', 'Impresionante versatilidad. Fiabilidad inigualable. Seagate incorpora mÃ¡s de 20 aÃ±os de rendimiento y fiabilidad dignos de confianza a las unidades de disco duro SeagateÂ® BarraCudaÂ® de 2,5 pulgadas. ahora disponibles en diferentes capacidades.', 40, 'hdd_01.png', 'hdd_02.png', 'hdd_03.png'),
(10, 'Nfortec Krater Cristal Templado', 'Rendimiento y estÃ©tica se dan la mano en el nuevo chasis Nfortec Krater ARGB, creando una torre en la que destaca su sistema de ventilaciÃ³n con su frontal mallado y a su vez un espectacular diseÃ±o que te atrapa desde el primer momento.', 99, 'caja_01.png', 'caja_02.png', 'caja_03.png'),
(11, 'Newskill Gungnyr Pro Gaming', 'Gungnyr Pro es el teclado full layout optomecÃ¡nico de Newskill, con cuerpo de aluminio y veloces switches Gateron Red. Su iluminaciÃ³n es personalizable a travÃ©s de software, tanto la del teclado como la de su reposamuÃ±ecas imantado, que en combinaciÃ³n darÃ¡n la mejor atmÃ³sfera gamer a tu zona de juego.', 119, 'tec_01.png', 'tec_02.png', 'tec_03.png'),
(12, 'Intel Core i9 13900K', 'Con un mayor nÃºmero de nÃºcleos, estos procesadores continÃºan utilizando la arquitectura hÃ­brida de rendimiento de Intel para optimizar tus videojuegos, creaciÃ³n de contenido y productividad. Aprovecha el mejor ancho de banda de la industria de hasta 16 carriles PCIe 5.03 y memoria DDR5 de hasta 5600 MT/s.4 5 Potencia el rendimiento de tu CPU con una poderosa suite de herramientas de ajuste.', 698, 'prcsr_intel_01.png', 'prcsr_intel_02.jpg', 'prcsr_intel_03.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(100) NOT NULL,
  `name` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `password` varchar(50) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `name`, `email`, `password`) VALUES
(1, 'Yasminausu', 'yasminarhanny@gmail.com', '202cb962ac59075b964b07152d234b70'),
(2, 'prueba', 'prueba@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b'),
(3, 'pruebaregistro', 'pruebaregistro@gmail.com', 'c87650da0ff64bd523ef9651717f75eb');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `carro`
--
ALTER TABLE `carro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lista_deseos`
--
ALTER TABLE `lista_deseos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `carro`
--
ALTER TABLE `carro`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `lista_deseos`
--
ALTER TABLE `lista_deseos`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
