-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-01-2021 a las 04:34:37
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `comida express terranova`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `idAdministrador` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `imagen` varchar(40) NOT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `clave` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`idAdministrador`, `nombre`, `apellido`, `imagen`, `correo`, `clave`) VALUES
(1, 'Clark', 'Kent', 'imagenes/1611286332.png', 'ck@123.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cambio_clave`
--

CREATE TABLE `cambio_clave` (
  `correo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `ciudad` varchar(45) DEFAULT NULL,
  `localidad` varchar(50) NOT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `telefono` varchar(10) NOT NULL,
  `imagen` varchar(40) NOT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `clave` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `nombre`, `apellido`, `ciudad`, `localidad`, `direccion`, `telefono`, `imagen`, `correo`, `clave`) VALUES
(1, 'proy', 'api', 'Bogota', 'Teusaquillo', 'Cra 24c #23 - 08', '8877343', 'imagenes/1611286419.png', 'proyectoapidm@gmail.com', '18a984fc7f1f748093f7f9d5f8f2fd65');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente_producto`
--

CREATE TABLE `cliente_producto` (
  `id_cliente` int(11) NOT NULL,
  `id_prod` int(11) NOT NULL,
  `nombre_producto` varchar(50) NOT NULL,
  `cantidad_und` int(11) DEFAULT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domiciliario`
--

CREATE TABLE `domiciliario` (
  `idDomiciliario` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `ciudad` varchar(45) DEFAULT NULL,
  `localidad` varchar(50) NOT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `imagen` varchar(40) NOT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `clave` varchar(45) DEFAULT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `domiciliario`
--

INSERT INTO `domiciliario` (`idDomiciliario`, `nombre`, `apellido`, `ciudad`, `localidad`, `direccion`, `telefono`, `imagen`, `correo`, `clave`, `estado`) VALUES
(1, 'Oscar', 'Morales', 'Medellin', 'Robledo', 'Cll 8 No. 50-02 sur', '8723109265', 'imagenes/1611286446.png', 'om@123.com', 'd58da82289939d8c4ec4f40689c2847e', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log`
--

CREATE TABLE `log` (
  `idLog` int(11) NOT NULL,
  `accion` varchar(45) DEFAULT NULL,
  `datos` varchar(45) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time NOT NULL,
  `actor` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `log`
--

INSERT INTO `log` (`idLog`, `accion`, `datos`, `fecha`, `hora`, `actor`) VALUES
(1, 'iniciar', 'iniciar sesion', '2021-01-21', '22:31:56', 'administrador'),
(1, 'editar', 'editar foto administrador: Clark', '2021-01-21', '22:32:12', 'administrador'),
(1, 'iniciar', 'iniciar sesion', '2021-01-21', '22:32:14', 'administrador'),
(1, 'crear', 'crear producto: Perro caliente', '2021-01-21', '22:32:32', 'administrador'),
(1, 'consultar', 'consultar solicitudes', '2021-01-21', '22:32:36', 'administrador'),
(1, 'crear', 'crear domiciliario: Oscar', '2021-01-21', '22:32:49', 'administrador'),
(1, 'consultar', 'consultar domiciliario', '2021-01-21', '22:32:51', 'administrador'),
(1, 'iniciar', 'iniciar sesion', '2021-01-21', '22:33:28', 'cliente'),
(1, 'editar', 'editar foto cliente: Oscar', '2021-01-21', '22:33:39', 'cliente'),
(1, 'iniciar', 'iniciar sesion', '2021-01-21', '22:33:41', 'cliente'),
(1, 'iniciar', 'iniciar sesion', '2021-01-21', '22:33:50', 'domiciliario'),
(1, 'editar', 'editar foto domiciliario: Oscar', '2021-01-21', '22:34:06', 'domiciliario'),
(1, 'iniciar', 'iniciar sesion', '2021-01-21', '22:34:08', 'domiciliario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_prod` int(11) NOT NULL,
  `id_domiciliario` int(11) NOT NULL,
  `unidades` int(11) NOT NULL,
  `fecha_hora` datetime DEFAULT NULL,
  `valor_unidad` int(11) NOT NULL,
  `valor_total` int(11) DEFAULT NULL,
  `observaciones` varchar(50) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_prod` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `imagen` varchar(40) DEFAULT NULL,
  `cantidad_und` int(11) DEFAULT NULL,
  `valor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_prod`, `nombre`, `descripcion`, `imagen`, `cantidad_und`, `valor`) VALUES
(1, 'Perro caliente', 'Perro especial con huevo de codorniz', '', 100, 8000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE `solicitud` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `localidad` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`idAdministrador`);

--
-- Indices de la tabla `cambio_clave`
--
ALTER TABLE `cambio_clave`
  ADD PRIMARY KEY (`correo`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indices de la tabla `cliente_producto`
--
ALTER TABLE `cliente_producto`
  ADD PRIMARY KEY (`id_cliente`,`id_prod`),
  ADD KEY `id_prod` (`id_prod`);

--
-- Indices de la tabla `domiciliario`
--
ALTER TABLE `domiciliario`
  ADD PRIMARY KEY (`idDomiciliario`);

--
-- Indices de la tabla `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`idLog`,`hora`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`,`id_cliente`,`id_prod`,`id_domiciliario`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_prod` (`id_prod`),
  ADD KEY `id_domiciliario` (`id_domiciliario`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_prod`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`id`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente_producto`
--
ALTER TABLE `cliente_producto`
  ADD CONSTRAINT `cliente_producto_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`idCliente`),
  ADD CONSTRAINT `cliente_producto_ibfk_2` FOREIGN KEY (`id_prod`) REFERENCES `producto` (`id_prod`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`idCliente`),
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`id_prod`) REFERENCES `producto` (`id_prod`),
  ADD CONSTRAINT `pedido_ibfk_3` FOREIGN KEY (`id_domiciliario`) REFERENCES `domiciliario` (`idDomiciliario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
