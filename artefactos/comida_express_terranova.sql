-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-03-2021 a las 07:45:01
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.3.27

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
(1, 'Proy', 'Api', 'imagenes/1611286332.png', 'proyectoapidm@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cambio_clave`
--

CREATE TABLE `cambio_clave` (
  `correo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cambio_clave`
--

INSERT INTO `cambio_clave` (`correo`) VALUES
(''),
('esandovalv@correo.udistrital.edu.co'),
('patriciafernandez2120@gmail.com');

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
(1, 'Patricia', 'Fernandez', 'Medellin', 'Robledo', 'Cra 24c #23 - 08', '8877343', 'imagenes/1611286419.png', 'patriciafernandez2120@gmail.com', '7287aa2c53d0a440da9db5614937e36f'),
(2, 'William ', 'Verne', 'Bogota', 'Teusaquillo ', 'Cll 6 No. 67 - 09', '7651230', '...', 'm@123.com', '202cb962ac59075b964b07152d234b70'),
(5, 'Gabriel', 'Clark', 'Cali', 'Asuncion', 'Transversal 91', '8877343', '...', 'as@as.com', 'f970e2767d0cfe75876ea857f92e319b'),
(10, 'Edwin', 'Sandoval', 'Bogota', 'Bosa', 'Transversal 91', '7651230', '...', 'esandovalv@correo.udistrital.edu.co', '12470fe406d44017d96eab37dd65fc14');

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

--
-- Volcado de datos para la tabla `cliente_producto`
--

INSERT INTO `cliente_producto` (`id_cliente`, `id_prod`, `nombre_producto`, `cantidad_und`, `total`) VALUES
(1, 2, 'Hamburguesa', 10, 100000),
(10, 1, 'Perro caliente', 6, 48000);

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
  `direccion` varchar(50) DEFAULT NULL,
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
(1, 'Oscar', 'Lopez', 'Medellin', 'Robledo', 'Cll 8 No. 50-02 sur', '8723109265', '...', 'ol@gmail.com', '9d5da4f31eddc5eea1c1222da1d7ff12', 1),
(2, 'Gabriel', 'Gonzales', 'Bogota', 'Teusaquillo', 'Transversal 91', '8723109265', '...', 'lg@lg.com', 'a608b9c44912c72db6855ad555397470', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingrediente`
--

CREATE TABLE `ingrediente` (
  `id_ingrediente` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `cantidad_und` varchar(45) DEFAULT NULL,
  `idProveedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ingrediente`
--

INSERT INTO `ingrediente` (`id_ingrediente`, `nombre`, `cantidad_und`, `idProveedor`) VALUES
(1, 'Mortadela', '90', 1),
(2, 'Pan blanco', '70', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id_ingrediente` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `cantidad_und` int(11) NOT NULL,
  `idProveedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`id_ingrediente`, `nombre`, `cantidad_und`, `idProveedor`) VALUES
(2, 'Pan blanco', 10, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_ingrediente`
--

CREATE TABLE `lista_ingrediente` (
  `id_prod` int(11) NOT NULL,
  `id_ingrediente` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `imagen` varchar(40) DEFAULT NULL,
  `cantidad_und` int(11) DEFAULT NULL,
  `valor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `lista_ingrediente`
--

INSERT INTO `lista_ingrediente` (`id_prod`, `id_ingrediente`, `cantidad`, `nombre`, `descripcion`, `imagen`, `cantidad_und`, `valor`) VALUES
(4, 1, 5, 'Sandwich', 'Doble queso', '', 5, 12000),
(4, 2, 5, 'Sandwich', 'Doble queso', '', 5, 12000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log`
--

CREATE TABLE `log` (
  `idLog` int(11) NOT NULL,
  `accion` varchar(45) DEFAULT NULL,
  `datos` varchar(100) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time NOT NULL,
  `actor` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `log`
--

INSERT INTO `log` (`idLog`, `accion`, `datos`, `fecha`, `hora`, `actor`) VALUES
(1, 'buscar', 'buscar ingrediente', '2021-03-03', '00:22:25', 'administrador'),
(1, 'ver', 'ver informacion lista ingredientes', '2021-03-03', '00:22:44', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-03', '00:22:57', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-03', '00:30:28', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-03', '00:30:41', 'administrador'),
(1, 'ver', 'ver informacion lista ingredientes', '2021-03-03', '00:30:43', 'administrador'),
(1, 'ver', 'ver informacion lista ingredientes', '2021-03-03', '00:35:32', 'administrador'),
(1, 'ver', 'ver informacion lista ingredientes', '2021-03-03', '00:36:42', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-03', '00:36:56', 'administrador'),
(1, 'ver', 'ver informacion lista ingredientes', '2021-03-03', '00:36:57', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-03', '00:43:58', 'administrador'),
(1, 'ver', 'ver informacion lista ingredientes', '2021-03-03', '00:44:00', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-03', '00:50:40', 'administrador'),
(1, 'ver', 'ver informacion lista ingredientes', '2021-03-03', '00:50:41', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-03', '00:51:00', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-03', '00:51:23', 'administrador'),
(1, 'ver', 'ver informacion lista ingredientes', '2021-03-03', '00:51:25', 'administrador'),
(1, 'ver', 'ver informacion lista ingredientes', '2021-03-03', '00:51:36', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-03', '00:51:44', 'administrador'),
(1, 'ver', 'ver informacion lista ingredientes', '2021-03-03', '00:51:48', 'administrador'),
(1, 'consultar', 'consultar producto', '2021-03-03', '00:52:02', 'administrador'),
(1, 'consultar', 'consultar producto', '2021-03-03', '00:52:24', 'administrador'),
(1, 'consultar', 'consultar producto', '2021-03-03', '01:11:05', 'administrador'),
(1, 'consultar', 'consultar producto', '2021-03-03', '01:11:59', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-03', '01:12:09', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-03', '01:12:17', 'administrador'),
(1, 'ver', 'ver informacion lista ingredientes', '2021-03-03', '01:12:19', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-03', '01:12:32', 'administrador'),
(1, 'ver', 'ver informacion lista ingredientes', '2021-03-03', '01:12:33', 'administrador'),
(1, 'crear', 'Finalizar creacion de producto', '2021-03-03', '01:12:53', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-03', '01:15:00', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-03', '01:15:09', 'administrador'),
(1, 'ver', 'ver informacion lista ingredientes', '2021-03-03', '01:15:12', 'administrador'),
(1, 'consultar', 'consultar producto', '2021-03-03', '01:15:28', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-03', '01:17:56', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-03', '01:18:05', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-03', '01:20:10', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-03', '01:20:24', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-03', '01:21:48', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-03', '01:21:58', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-03', '01:22:11', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-03', '01:24:16', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-03', '01:24:33', 'administrador'),
(1, 'consultar', 'consultar producto', '2021-03-03', '01:25:50', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-03', '01:25:58', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-03', '01:26:05', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-03', '01:26:53', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-03', '01:26:59', 'administrador'),
(1, 'consultar', 'consultar producto', '2021-03-03', '01:28:07', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-03', '01:28:16', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-03', '01:28:36', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-03', '01:29:53', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-03', '01:30:01', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-03', '01:30:19', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-03', '01:31:08', 'administrador'),
(1, 'ver', 'ver informacion lista ingredientes', '2021-03-03', '01:31:36', 'administrador'),
(1, 'consultar', 'consultar producto', '2021-03-03', '01:31:43', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-03', '01:37:24', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-03', '01:37:32', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-03', '01:37:41', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-03', '01:39:00', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-03', '01:39:06', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-03', '01:39:13', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-03', '01:40:42', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-03', '01:40:53', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-03', '01:41:00', 'administrador'),
(1, 'consultar', 'consultar producto', '2021-03-03', '01:41:03', 'administrador'),
(1, 'consultar', 'consultar producto', '2021-03-03', '01:43:25', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-03', '01:43:34', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-03', '01:43:41', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-03', '01:43:48', 'administrador'),
(1, 'consultar', 'consultar producto', '2021-03-03', '01:43:52', 'administrador'),
(1, 'crear', 'Finalizar creacion de producto', '2021-02-25', '02:10:30', 'administrador'),
(1, 'crear', 'Finalizar creacion de producto', '2021-02-25', '02:18:01', 'administrador'),
(1, 'crear', 'Finalizar creacion de producto', '2021-02-25', '02:19:14', 'administrador'),
(1, 'crear', 'Finalizar creacion de producto', '2021-02-25', '02:39:36', 'administrador'),
(1, 'crear', 'Finalizar creacion de producto', '2021-02-25', '03:25:24', 'administrador'),
(1, 'actualizar', 'proceso de envio del pedido', '2021-02-15', '03:39:39', 'domiciliario'),
(1, 'actualizar', 'confirmar entrega del pedido', '2021-02-15', '03:39:41', 'domiciliario'),
(1, 'actualizar', 'proceso de envio del pedido', '2021-02-15', '03:39:45', 'domiciliario'),
(1, 'actualizar', 'confirmar entrega del pedido', '2021-02-15', '03:39:54', 'domiciliario'),
(1, 'crear', 'Finalizar creacion de producto', '2021-02-25', '04:03:11', 'administrador'),
(1, 'actualizar', 'proceso de envio del pedido', '2021-02-15', '04:21:39', 'domiciliario'),
(1, 'actualizar', 'confirmar entrega del pedido', '2021-02-15', '04:21:41', 'domiciliario'),
(1, 'crear', 'Finalizar creacion de producto', '2021-03-03', '06:52:00', 'administrador'),
(1, 'crear', 'Finalizar creacion de producto', '2021-03-03', '07:15:26', 'administrador'),
(1, 'crear', 'Finalizar creacion de producto', '2021-03-03', '07:31:42', 'administrador'),
(1, 'crear', 'Finalizar creacion de producto', '2021-03-03', '07:37:43', 'administrador'),
(1, 'crear', 'Finalizar creacion de producto', '2021-03-03', '07:39:14', 'administrador'),
(1, 'crear', 'Finalizar creacion de producto', '2021-03-03', '07:41:02', 'administrador'),
(1, 'crear', 'Finalizar creacion de producto', '2021-03-03', '07:43:50', 'administrador'),
(1, 'iniciar', 'iniciar sesion', '2021-02-24', '12:07:51', 'cliente'),
(1, 'consultar', 'consultar pedido', '2021-02-24', '12:07:54', 'cliente'),
(1, 'ver', 'ver informacion del domiciliario', '2021-02-24', '12:08:12', 'cliente'),
(1, 'ver', 'ver informacion del pedido', '2021-02-24', '12:08:19', 'cliente'),
(1, 'generar', 'generar factura', '2021-02-24', '12:08:26', 'cliente'),
(1, 'consultar', 'consultar pedido', '2021-02-24', '12:08:31', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-24', '12:08:33', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-24', '12:08:40', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-24', '12:09:11', 'cliente'),
(1, 'iniciar', 'iniciar sesion', '2021-02-24', '12:09:27', 'administrador'),
(1, 'consultar', 'consultar producto', '2021-02-24', '12:09:33', 'administrador'),
(1, 'consultar', 'consultar producto', '2021-02-24', '12:09:40', 'administrador'),
(1, 'consultar', 'consultar domiciliario', '2021-02-24', '12:09:52', 'administrador'),
(1, 'cambiar/deshabilitar', 'cambiar estado domiciliario: Oscar', '2021-02-24', '12:09:55', 'administrador'),
(1, 'cambiar/habilitar', 'cambiar estado domiciliario: Oscar', '2021-02-24', '12:09:56', 'administrador'),
(1, 'consultar', 'consultar solicitudes domiciliario', '2021-02-24', '12:10:05', 'administrador'),
(1, 'buscar', 'buscar domiciliario', '2021-02-24', '12:10:15', 'administrador'),
(1, 'consultar', 'consultar proveedor', '2021-02-24', '12:10:20', 'administrador'),
(1, 'consultar', 'consultar solicitudes proveedor', '2021-02-24', '12:10:22', 'administrador'),
(1, 'buscar', 'buscar proveedor', '2021-02-24', '12:10:26', 'administrador'),
(1, 'consultar', 'consultar cliente', '2021-02-24', '12:10:30', 'administrador'),
(1, 'consultar', 'consultar proceso', '2021-02-24', '12:10:33', 'administrador'),
(1, 'consultar', 'consultar proceso', '2021-02-24', '12:10:49', 'administrador'),
(1, 'consultar', 'consultar log', '2021-02-24', '12:10:52', 'administrador'),
(1, 'iniciar', 'iniciar sesion', '2021-02-24', '12:12:35', 'administrador'),
(1, 'consultar', 'consultar proceso', '2021-02-24', '12:12:39', 'administrador'),
(1, 'iniciar', 'iniciar sesion', '2021-02-24', '14:11:46', 'cliente'),
(1, 'consultar', 'consultar pedido', '2021-02-24', '14:11:48', 'cliente'),
(1, 'consultar', 'consultar pedido', '2021-02-24', '14:12:00', 'cliente'),
(1, 'ver', 'ver informacion del pedido', '2021-02-24', '14:12:04', 'cliente'),
(1, 'consultar', 'consultar pedido', '2021-02-24', '14:12:09', 'cliente'),
(1, 'consultar', 'consultar pedido', '2021-02-24', '14:27:32', 'cliente'),
(1, 'consultar', 'consultar pedido', '2021-02-24', '14:29:01', 'cliente'),
(1, 'consultar', 'consultar pedido', '2021-02-24', '14:29:40', 'cliente'),
(1, 'generar', 'generar factura', '2021-02-24', '14:29:42', 'cliente'),
(1, 'consultar', 'consultar pedido', '2021-02-24', '14:44:31', 'cliente'),
(1, 'iniciar', 'iniciar sesion', '2021-02-24', '16:20:22', 'administrador'),
(1, 'consultar', 'consultar producto', '2021-02-24', '16:20:25', 'administrador'),
(1, 'buscar', 'buscar producto', '2021-02-24', '16:20:31', 'administrador'),
(1, 'consultar', 'consultar domiciliario', '2021-02-24', '16:20:33', 'administrador'),
(1, 'consultar', 'consultar solicitudes domiciliario', '2021-02-24', '16:20:36', 'administrador'),
(1, 'consultar', 'consultar proveedor', '2021-02-24', '16:20:37', 'administrador'),
(1, 'consultar', 'consultar solicitudes proveedor', '2021-02-24', '16:20:39', 'administrador'),
(1, 'buscar', 'buscar proveedor', '2021-02-24', '16:20:41', 'administrador'),
(1, 'consultar', 'consultar cliente', '2021-02-24', '16:20:44', 'administrador'),
(1, 'consultar', 'consultar pedido', '2021-02-24', '16:21:07', 'administrador'),
(1, 'consultar', 'consultar proceso', '2021-02-24', '16:21:10', 'administrador'),
(1, 'consultar', 'consultar proceso', '2021-02-24', '16:23:11', 'administrador'),
(1, 'consultar', 'consultar proceso', '2021-02-24', '16:23:16', 'administrador'),
(1, 'consultar', 'consultar log', '2021-02-24', '16:23:18', 'administrador'),
(1, 'consultar', 'consultar proceso', '2021-02-24', '16:23:20', 'administrador'),
(1, 'consultar', 'consultar proceso', '2021-02-24', '16:23:28', 'administrador'),
(1, 'consultar', 'consultar proceso', '2021-02-24', '16:23:41', 'administrador'),
(1, 'iniciar', 'iniciar sesion', '2021-02-24', '16:25:57', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-24', '16:26:04', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-24', '16:27:13', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-24', '16:38:40', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-24', '16:38:54', 'cliente'),
(1, 'iniciar', 'iniciar sesion', '2021-02-24', '16:42:16', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-24', '16:42:24', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-24', '16:42:35', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-24', '16:43:46', 'cliente'),
(1, 'iniciar', 'iniciar sesion', '2021-02-24', '16:43:54', 'administrador'),
(1, 'consultar', 'consultar proceso', '2021-02-24', '16:43:59', 'administrador'),
(1, 'consultar', 'consultar proceso', '2021-02-24', '16:44:49', 'administrador'),
(1, 'consultar', 'consultar proceso', '2021-02-24', '16:46:28', 'administrador'),
(1, 'iniciar', 'iniciar sesion', '2021-02-24', '16:46:35', 'domiciliario'),
(1, 'consultar', 'consultar proceso', '2021-02-24', '16:46:38', 'domiciliario'),
(1, 'consultar', 'consultar proceso', '2021-02-24', '16:59:22', 'domiciliario'),
(1, 'iniciar', 'iniciar sesion', '2021-02-24', '16:59:32', 'administrador'),
(1, 'consultar', 'consultar proceso', '2021-02-24', '16:59:39', 'administrador'),
(1, 'consultar', 'consultar proceso', '2021-02-24', '17:11:21', 'administrador'),
(1, 'iniciar', 'iniciar sesion', '2021-02-24', '17:13:15', 'administrador'),
(1, 'consultar', 'consultar proceso', '2021-02-24', '17:13:18', 'administrador'),
(1, 'consultar', 'consultar proceso', '2021-02-24', '17:13:58', 'administrador'),
(1, 'iniciar', 'iniciar sesion', '2021-02-24', '17:15:18', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-24', '17:15:22', 'cliente'),
(1, 'iniciar', 'iniciar sesion', '2021-02-17', '17:17:55', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-17', '17:17:58', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-17', '17:18:10', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-17', '17:18:11', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-17', '17:18:27', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-17', '17:18:38', 'cliente'),
(1, 'iniciar', 'iniciar sesion', '2021-02-24', '17:19:09', 'administrador'),
(1, 'consultar', 'consultar proceso', '2021-02-24', '17:19:11', 'administrador'),
(1, 'iniciar', 'iniciar sesion', '2021-03-02', '17:19:16', 'administrador'),
(1, 'consultar', 'consultar ingrediente', '2021-03-02', '17:19:36', 'administrador'),
(1, 'crear', 'crear solicitud: ', '2021-03-02', '17:19:41', 'administrador'),
(1, 'iniciar', 'iniciar sesion', '2021-03-02', '17:19:43', 'administrador'),
(1, 'consultar', 'consultar proceso', '2021-02-17', '17:19:46', 'cliente'),
(1, 'consultar', 'consultar ingrediente', '2021-03-02', '17:19:51', 'administrador'),
(1, 'crear', 'crear solicitud: Mortadela', '2021-03-02', '17:19:56', 'administrador'),
(1, 'iniciar', 'iniciar sesion', '2021-03-02', '17:19:58', 'administrador'),
(1, 'consultar', 'consultar ingrediente', '2021-03-02', '17:20:49', 'administrador'),
(1, 'crear', 'crear solicitud: ', '2021-03-02', '17:20:53', 'administrador'),
(1, 'iniciar', 'iniciar sesion', '2021-03-02', '17:20:55', 'administrador'),
(1, 'consultar', 'consultar proceso', '2021-02-17', '17:22:28', 'cliente'),
(1, 'consultar', 'consultar ingrediente', '2021-03-02', '17:24:04', 'administrador'),
(1, 'crear', 'crear solicitud: Mortadela', '2021-03-02', '17:24:20', 'administrador'),
(1, 'iniciar', 'iniciar sesion', '2021-03-02', '17:24:22', 'administrador'),
(1, 'consultar', 'consultar ingrediente', '2021-03-02', '17:24:27', 'administrador'),
(1, 'consultar', 'consultar proceso', '2021-02-17', '17:24:46', 'cliente'),
(1, 'consultar', 'consultar ingrediente', '2021-03-02', '17:26:44', 'administrador'),
(1, 'crear', 'crear solicitud: Mortadela', '2021-03-02', '17:26:48', 'administrador'),
(1, 'iniciar', 'iniciar sesion', '2021-03-02', '17:26:50', 'administrador'),
(1, 'consultar', 'consultar ingrediente', '2021-03-02', '17:26:52', 'administrador'),
(1, 'crear', 'crear solicitud: Mortadela', '2021-03-02', '17:26:57', 'administrador'),
(1, 'iniciar', 'iniciar sesion', '2021-03-02', '17:26:58', 'administrador'),
(1, 'consultar', 'consultar ingrediente', '2021-03-02', '17:27:01', 'administrador'),
(1, 'iniciar', 'iniciar sesion', '2021-03-02', '17:27:25', 'proveedor'),
(1, 'consultar', 'consultar solicitud ingrediente', '2021-03-02', '17:30:12', 'proveedor'),
(1, 'consultar', 'consultar solicitud ingrediente', '2021-03-02', '17:30:44', 'proveedor'),
(1, 'consultar', 'consultar solicitud ingrediente', '2021-03-02', '17:30:47', 'proveedor'),
(1, 'iniciar', 'iniciar sesion', '2021-03-02', '17:33:14', 'administrador'),
(1, 'consultar', 'consultar ingrediente', '2021-03-02', '17:33:17', 'administrador'),
(1, 'consultar', 'consultar ingrediente', '2021-03-02', '17:33:38', 'administrador'),
(1, 'consultar', 'consultar ingrediente', '2021-03-02', '17:33:48', 'administrador'),
(1, 'consultar', 'consultar ingrediente', '2021-03-02', '17:33:52', 'administrador'),
(1, 'consultar', 'consultar proceso', '2021-02-24', '17:38:27', 'administrador'),
(1, 'consultar', 'consultar proceso', '2021-02-24', '17:38:52', 'administrador'),
(1, 'crear', 'crear solicitud: Mortadela', '2021-03-02', '17:42:22', 'administrador'),
(1, 'iniciar', 'iniciar sesion', '2021-03-02', '17:42:24', 'administrador'),
(1, 'iniciar', 'iniciar sesion', '2021-03-02', '17:42:36', 'proveedor'),
(1, 'consultar', 'consultar solicitud ingrediente', '2021-03-02', '17:42:39', 'proveedor'),
(1, 'consultar', 'consultar solicitud ingrediente', '2021-03-02', '17:44:54', 'proveedor'),
(1, 'consultar', 'consultar proceso', '2021-02-24', '17:47:53', 'administrador'),
(1, 'iniciar', 'iniciar sesion', '2021-02-24', '17:48:03', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-24', '17:48:10', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-24', '17:48:25', 'cliente'),
(1, 'consultar', 'consultar pedido', '2021-02-24', '17:48:37', 'cliente'),
(1, 'generar', 'generar factura', '2021-02-24', '17:48:39', 'cliente'),
(1, 'generar', 'generar factura', '2021-02-24', '17:49:27', 'cliente'),
(1, 'generar', 'generar factura', '2021-02-24', '17:49:36', 'cliente'),
(1, 'generar', 'generar factura', '2021-02-24', '17:49:43', 'cliente'),
(1, 'generar', 'generar factura', '2021-02-24', '17:50:23', 'cliente'),
(1, 'generar', 'generar factura', '2021-02-24', '17:50:29', 'cliente'),
(1, 'consultar', 'consultar pedido', '2021-02-24', '17:50:33', 'cliente'),
(1, 'generar', 'generar factura', '2021-02-24', '17:50:36', 'cliente'),
(1, 'generar', 'generar factura', '2021-02-24', '17:53:36', 'cliente'),
(1, 'generar', 'generar factura', '2021-02-24', '17:55:09', 'cliente'),
(1, 'generar', 'generar factura', '2021-02-24', '17:55:57', 'cliente'),
(1, 'generar', 'generar factura', '2021-02-24', '17:56:12', 'cliente'),
(1, 'iniciar', 'iniciar sesion', '2021-03-02', '17:56:17', 'administrador'),
(1, 'consultar', 'consultar ingrediente', '2021-03-02', '17:56:20', 'administrador'),
(1, 'consultar', 'consultar pedido', '2021-02-24', '17:56:27', 'cliente'),
(1, 'iniciar', 'iniciar sesion', '2021-03-02', '17:56:29', 'administrador'),
(1, 'consultar', 'consultar ingrediente', '2021-03-02', '17:56:31', 'administrador'),
(1, 'consultar', 'consultar producto', '2021-02-24', '17:56:33', 'cliente'),
(1, 'agregar', 'agregar al carrito el producto: Hamburguesa', '2021-02-24', '17:56:41', 'cliente'),
(1, 'consultar', 'consultar producto', '2021-02-24', '17:56:42', 'cliente'),
(1, 'consultar', 'consultar carrito', '2021-02-24', '17:56:44', 'cliente'),
(1, 'comprar', 'Compra finalizada', '2021-02-24', '17:56:46', 'cliente'),
(1, 'consultar', 'consultar pedido', '2021-02-24', '17:56:47', 'cliente'),
(1, 'generar', 'generar factura', '2021-02-24', '17:56:51', 'cliente'),
(1, 'consultar', 'consultar pedido', '2021-02-24', '17:57:09', 'cliente'),
(1, 'consultar', 'consultar ingrediente', '2021-03-02', '17:57:31', 'administrador'),
(1, 'crear', 'crear solicitud: Pan', '2021-03-02', '17:57:36', 'administrador'),
(1, 'iniciar', 'iniciar sesion', '2021-03-02', '17:57:38', 'administrador'),
(1, 'consultar', 'consultar ingrediente', '2021-03-02', '17:57:59', 'administrador'),
(1, 'consultar', 'consultar pedido', '2021-02-24', '17:58:37', 'cliente'),
(1, 'ver', 'ver informacion del domiciliario', '2021-02-24', '17:58:39', 'cliente'),
(1, 'ver', 'ver informacion del pedido', '2021-02-24', '17:58:43', 'cliente'),
(1, 'consultar', 'consultar ingrediente', '2021-03-02', '17:59:44', 'administrador'),
(1, 'crear', 'crear solicitud: ', '2021-03-02', '17:59:54', 'administrador'),
(1, 'iniciar', 'iniciar sesion', '2021-03-02', '17:59:56', 'administrador'),
(1, 'consultar', 'consultar ingrediente', '2021-03-02', '18:00:12', 'administrador'),
(1, 'ver', 'ver informacion del pedido', '2021-02-24', '18:00:51', 'cliente'),
(1, 'eliminar', 'eliminar pedido', '2021-02-24', '18:01:04', 'cliente'),
(1, 'consultar', 'consultar pedido', '2021-02-24', '18:01:07', 'cliente'),
(1, 'generar', 'generar factura', '2021-02-24', '18:01:10', 'cliente'),
(1, 'crear', 'crear solicitud: Pan', '2021-03-02', '18:01:16', 'administrador'),
(1, 'consultar', 'consultar pedido', '2021-02-24', '18:01:17', 'cliente'),
(1, 'consultar', 'consultar pedido', '2021-02-24', '18:01:54', 'cliente'),
(1, 'consultar', 'consultar ingrediente', '2021-03-02', '18:02:22', 'administrador'),
(1, 'consultar', 'consultar pedido', '2021-02-24', '18:02:29', 'cliente'),
(1, 'generar', 'generar factura', '2021-02-24', '18:02:31', 'cliente'),
(1, 'consultar', 'consultar pedido', '2021-02-24', '18:02:36', 'cliente'),
(1, 'generar', 'generar factura', '2021-02-24', '18:02:38', 'cliente'),
(1, 'consultar', 'consultar pedido', '2021-02-24', '18:02:47', 'cliente'),
(1, 'generar', 'generar factura', '2021-02-24', '18:02:51', 'cliente'),
(1, 'generar', 'generar factura', '2021-02-24', '18:02:57', 'cliente'),
(1, 'consultar', 'consultar ingrediente', '2021-03-02', '18:03:40', 'administrador'),
(1, 'crear', 'crear solicitud: ', '2021-03-02', '18:03:44', 'administrador'),
(1, 'consultar', 'consultar ingrediente', '2021-03-02', '18:03:59', 'administrador'),
(1, 'crear', 'crear solicitud: Pan', '2021-03-02', '18:04:02', 'administrador'),
(1, 'consultar', 'consultar pedido', '2021-02-24', '18:04:16', 'cliente'),
(1, 'consultar', 'consultar producto', '2021-02-24', '18:04:21', 'cliente'),
(1, 'buscar', 'buscar producto', '2021-02-24', '18:04:29', 'cliente'),
(1, 'consultar', 'consultar pedido', '2021-02-24', '18:04:34', 'cliente'),
(1, 'ver', 'ver informacion del domiciliario', '2021-02-24', '18:04:36', 'cliente'),
(1, 'consultar', 'consultar ingrediente', '2021-03-02', '18:04:38', 'administrador'),
(1, 'ver', 'ver informacion del pedido', '2021-02-24', '18:04:39', 'cliente'),
(1, 'generar', 'generar factura', '2021-02-24', '18:04:42', 'cliente'),
(1, 'consultar', 'consultar pedido', '2021-02-24', '18:04:45', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-24', '18:04:48', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-24', '18:04:54', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-24', '18:05:01', 'cliente'),
(1, 'consultar', 'consultar log', '2021-02-24', '18:05:03', 'cliente'),
(1, 'editar', 'editar cliente: Patricia', '2021-02-24', '18:05:10', 'cliente'),
(1, 'iniciar', 'iniciar sesion', '2021-02-24', '18:05:12', 'cliente'),
(1, 'editar', 'editar cliente: Patricia', '2021-02-24', '18:05:19', 'cliente'),
(1, 'iniciar', 'iniciar sesion', '2021-02-24', '18:05:21', 'cliente'),
(1, 'consultar', 'consultar producto', '2021-02-24', '18:05:30', 'cliente'),
(1, 'agregar', 'agregar al carrito el producto: Hamburguesa', '2021-02-24', '18:05:35', 'cliente'),
(1, 'consultar', 'consultar producto', '2021-02-24', '18:05:37', 'cliente'),
(1, 'consultar', 'consultar carrito', '2021-02-24', '18:05:39', 'cliente'),
(1, 'eliminar', 'eliminar producto del carrito', '2021-02-24', '18:05:42', 'cliente'),
(1, 'consultar', 'consultar producto', '2021-02-24', '18:05:45', 'cliente'),
(1, 'agregar', 'agregar al carrito el producto: Perro caliente', '2021-02-24', '18:05:50', 'cliente'),
(1, 'consultar', 'consultar producto', '2021-02-24', '18:05:51', 'cliente'),
(1, 'agregar', 'agregar al carrito el producto: Hamburguesa', '2021-02-24', '18:05:56', 'cliente'),
(1, 'consultar', 'consultar producto', '2021-02-24', '18:05:58', 'cliente'),
(1, 'consultar', 'consultar carrito', '2021-02-24', '18:05:59', 'cliente'),
(1, 'vaciar', 'vaciar carrito', '2021-02-24', '18:06:01', 'cliente'),
(1, 'consultar', 'consultar producto', '2021-02-24', '18:06:05', 'cliente'),
(1, 'agregar', 'agregar al carrito el producto: Hamburguesa', '2021-02-24', '18:06:11', 'cliente'),
(1, 'consultar', 'consultar producto', '2021-02-24', '18:06:12', 'cliente'),
(1, 'agregar', 'agregar al carrito el producto: Mazorcada', '2021-02-24', '18:06:17', 'cliente'),
(1, 'consultar', 'consultar producto', '2021-02-24', '18:06:18', 'cliente'),
(1, 'consultar', 'consultar carrito', '2021-02-24', '18:06:19', 'cliente'),
(1, 'comprar', 'Compra finalizada', '2021-02-24', '18:06:21', 'cliente'),
(1, 'consultar', 'consultar pedido', '2021-02-24', '18:06:22', 'cliente'),
(1, 'generar', 'generar factura', '2021-02-24', '18:06:27', 'cliente'),
(1, 'consultar', 'consultar pedido', '2021-02-24', '18:06:45', 'cliente'),
(1, 'consultar', 'consultar ingrediente', '2021-03-02', '18:06:53', 'administrador'),
(1, 'generar', 'generar factura', '2021-02-24', '18:06:54', 'cliente'),
(1, 'crear', 'crear solicitud: ', '2021-03-02', '18:06:57', 'administrador'),
(1, 'consultar', 'consultar pedido', '2021-02-24', '18:07:04', 'cliente'),
(1, 'iniciar', 'iniciar sesion', '2021-02-24', '18:07:20', 'administrador'),
(1, 'consultar', 'consultar proceso', '2021-02-24', '18:07:23', 'administrador'),
(1, 'consultar', 'consultar proceso', '2021-02-24', '18:07:33', 'administrador'),
(1, 'consultar', 'consultar ingrediente', '2021-03-02', '18:07:40', 'administrador'),
(1, 'iniciar', 'iniciar sesion', '2021-02-24', '18:07:43', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-24', '18:07:46', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-24', '18:07:56', 'cliente'),
(1, 'consultar', 'consultar ingrediente', '2021-03-02', '18:08:18', 'administrador'),
(1, 'consultar', 'consultar proceso', '2021-02-24', '18:08:44', 'cliente'),
(1, 'consultar', 'consultar ingrediente', '2021-03-02', '18:08:53', 'administrador'),
(1, 'crear', 'crear solicitud: Pan', '2021-03-02', '18:08:57', 'administrador'),
(1, 'iniciar', 'iniciar sesion', '2021-02-24', '18:09:25', 'domiciliario'),
(1, 'consultar', 'consultar pedido', '2021-02-24', '18:09:30', 'domiciliario'),
(1, 'actualizar', 'proceso de envio del pedido', '2021-02-24', '18:09:44', 'domiciliario'),
(1, 'actualizar', 'confirmar entrega del pedido', '2021-02-24', '18:10:01', 'domiciliario'),
(1, 'ver', 'ver informacion del cliente', '2021-02-24', '18:10:08', 'domiciliario'),
(1, 'ver', 'ver informacion del pedido', '2021-02-24', '18:10:11', 'domiciliario'),
(1, 'consultar', 'consultar log', '2021-02-24', '18:10:46', 'domiciliario'),
(1, 'consultar', 'consultar proceso', '2021-02-24', '18:10:49', 'domiciliario'),
(1, 'consultar', 'consultar proceso', '2021-02-24', '18:10:53', 'domiciliario'),
(1, 'consultar', 'consultar proceso', '2021-02-24', '18:11:02', 'domiciliario'),
(1, 'consultar', 'consultar ingrediente', '2021-03-02', '18:11:31', 'administrador'),
(1, 'crear', 'crear solicitud: ', '2021-03-02', '18:11:40', 'administrador'),
(1, 'consultar', 'consultar ingrediente', '2021-03-02', '18:12:21', 'administrador'),
(1, 'crear', 'crear solicitud: ', '2021-03-02', '18:12:24', 'administrador'),
(1, 'iniciar', 'iniciar sesion', '2021-02-24', '18:12:33', 'cliente'),
(1, 'consultar', 'consultar ingrediente', '2021-03-02', '18:12:43', 'administrador'),
(1, 'consultar', 'consultar pedido', '2021-02-24', '18:12:44', 'cliente'),
(1, 'generar', 'generar factura', '2021-02-24', '18:12:48', 'cliente'),
(1, 'crear', 'crear solicitud: ', '2021-03-02', '18:12:50', 'administrador'),
(1, 'consultar', 'consultar pedido', '2021-02-24', '18:13:02', 'cliente'),
(1, 'consultar', 'consultar producto', '2021-02-24', '18:13:04', 'cliente'),
(1, 'consultar', 'consultar ingrediente', '2021-03-02', '18:13:11', 'administrador'),
(1, 'crear', 'crear solicitud: ', '2021-03-02', '18:13:15', 'administrador'),
(1, 'consultar', 'consultar pedido', '2021-02-24', '18:13:19', 'cliente'),
(1, 'generar', 'generar factura', '2021-02-24', '18:13:27', 'cliente'),
(1, 'consultar', 'consultar pedido', '2021-02-24', '18:13:46', 'cliente'),
(1, 'consultar', 'consultar ingrediente', '2021-03-02', '18:14:39', 'administrador'),
(1, 'consultar', 'consultar pedido', '2021-02-24', '18:14:55', 'cliente'),
(1, 'crear', 'crear solicitud: ', '2021-03-02', '18:14:57', 'administrador'),
(1, 'consultar', 'consultar pedido', '2021-02-24', '18:15:28', 'cliente'),
(1, 'generar', 'generar factura', '2021-02-24', '18:15:30', 'cliente'),
(1, 'generar', 'generar factura', '2021-02-24', '18:16:16', 'cliente'),
(1, 'consultar', 'consultar ingrediente', '2021-03-02', '18:17:16', 'administrador'),
(1, 'crear', 'crear solicitud: Pan', '2021-03-02', '18:17:24', 'administrador'),
(1, 'crear', 'crear solicitud: Pan', '2021-03-02', '18:18:05', 'administrador'),
(1, 'consultar', 'consultar ingrediente', '2021-03-02', '18:18:08', 'administrador'),
(1, 'crear', 'crear solicitud: Pan', '2021-03-02', '18:18:13', 'administrador'),
(1, 'generar', 'generar factura', '2021-02-24', '18:18:43', 'cliente'),
(1, 'consultar', 'consultar ingrediente', '2021-03-02', '18:18:50', 'administrador'),
(1, 'crear', 'crear solicitud: Pan', '2021-03-02', '18:18:58', 'administrador'),
(1, 'consultar', 'consultar ingrediente', '2021-03-02', '18:19:17', 'administrador'),
(1, 'consultar', 'consultar ingrediente', '2021-03-02', '18:19:55', 'administrador'),
(1, 'generar', 'generar factura', '2021-02-24', '18:20:02', 'cliente'),
(1, 'generar', 'generar factura', '2021-02-24', '18:20:51', 'cliente'),
(1, 'consultar', 'consultar pedido', '2021-02-24', '18:21:04', 'cliente'),
(1, 'consultar', 'consultar ingrediente', '2021-03-02', '18:22:33', 'administrador'),
(1, 'generar', 'generar factura', '2021-02-24', '18:22:38', 'cliente'),
(1, 'crear', 'crear solicitud: Pan', '2021-03-02', '18:22:41', 'administrador'),
(1, 'generar', 'generar factura', '2021-02-24', '18:23:36', 'cliente'),
(1, 'generar', 'generar factura', '2021-02-24', '18:23:57', 'cliente'),
(1, 'generar', 'generar factura', '2021-02-24', '18:24:07', 'cliente'),
(1, 'consultar', 'consultar ingrediente', '2021-03-02', '18:24:13', 'administrador'),
(1, 'consultar', 'consultar pedido', '2021-02-24', '18:24:20', 'cliente'),
(1, 'consultar', 'consultar ingrediente', '2021-03-02', '18:24:31', 'administrador'),
(1, 'crear', 'crear solicitud: ', '2021-03-02', '18:24:35', 'administrador'),
(1, 'iniciar', 'iniciar sesion', '2021-03-02', '18:24:36', 'administrador'),
(1, 'consultar', 'consultar ingrediente', '2021-03-02', '18:25:03', 'administrador'),
(1, 'consultar', 'consultar ingrediente', '2021-03-02', '18:25:21', 'administrador'),
(1, 'crear', 'crear solicitud: ', '2021-03-02', '18:25:25', 'administrador'),
(1, 'iniciar', 'iniciar sesion', '2021-03-02', '18:25:27', 'administrador'),
(1, 'consultar', 'consultar ingrediente', '2021-03-02', '18:25:48', 'administrador'),
(1, 'crear', 'crear solicitud: Pan blanco', '2021-03-02', '18:25:53', 'administrador'),
(1, 'iniciar', 'iniciar sesion', '2021-03-02', '18:25:54', 'administrador'),
(1, 'consultar', 'consultar ingrediente', '2021-03-02', '18:28:09', 'administrador'),
(1, 'crear', 'crear solicitud: Pan blanco', '2021-03-02', '18:28:12', 'administrador'),
(1, 'consultar', 'consultar ingrediente', '2021-03-02', '18:28:35', 'administrador'),
(1, 'crear', 'crear solicitud: Pan blanco', '2021-03-02', '18:28:41', 'administrador'),
(1, 'consultar', 'consultar ingrediente', '2021-03-02', '18:29:59', 'administrador'),
(1, 'crear', 'crear solicitud: Pan blanco', '2021-03-02', '18:30:04', 'administrador'),
(1, 'iniciar', 'iniciar sesion', '2021-03-02', '18:30:05', 'administrador'),
(1, 'consultar', 'consultar producto', '2021-03-02', '18:49:31', 'administrador'),
(1, 'consultar', 'consultar ingrediente', '2021-03-02', '18:49:52', 'administrador'),
(1, 'consultar', 'consultar ingrediente', '2021-03-02', '18:49:54', 'administrador'),
(1, 'consultar', 'consultar ingrediente', '2021-03-02', '18:50:06', 'administrador'),
(1, 'iniciar', 'iniciar sesion', '2021-03-02', '18:50:08', 'administrador'),
(1, 'iniciar', 'iniciar sesion', '2021-03-02', '18:50:24', 'administrador'),
(1, 'iniciar', 'iniciar sesion', '2021-03-02', '18:50:27', 'administrador'),
(1, 'iniciar', 'iniciar sesion', '2021-03-02', '18:50:37', 'administrador'),
(1, 'iniciar', 'iniciar sesion', '2021-03-02', '18:51:13', 'administrador'),
(1, 'consultar', 'consultar inventario', '2021-03-02', '18:53:27', 'administrador'),
(1, 'iniciar', 'iniciar sesion', '2021-03-02', '19:01:42', 'proveedor'),
(1, 'consultar', 'consultar solicitud ingrediente', '2021-03-02', '19:01:45', 'proveedor'),
(1, 'iniciar', 'iniciar sesion', '2021-03-02', '19:02:02', 'administrador'),
(1, 'consultar', 'consultar inventario', '2021-03-02', '19:02:04', 'administrador'),
(1, 'consultar', 'consultar inventario', '2021-03-02', '19:03:38', 'administrador'),
(1, 'consultar', 'consultar ingrediente', '2021-03-02', '19:03:44', 'administrador'),
(1, 'consultar', 'consultar ingrediente', '2021-03-02', '19:04:15', 'administrador'),
(1, 'crear', 'crear solicitud: Pan blanco', '2021-03-02', '19:04:22', 'administrador'),
(1, 'iniciar', 'iniciar sesion', '2021-03-02', '19:04:24', 'administrador'),
(1, 'iniciar', 'iniciar sesion', '2021-03-02', '19:04:51', 'proveedor'),
(1, 'consultar', 'consultar solicitud ingrediente', '2021-03-02', '19:04:54', 'proveedor'),
(1, 'iniciar', 'iniciar sesion', '2021-03-02', '19:05:05', 'administrador'),
(1, 'consultar', 'consultar inventario', '2021-03-02', '19:05:07', 'administrador'),
(1, 'consultar', 'consultar inventario', '2021-03-02', '19:07:52', 'administrador'),
(1, 'crear', 'crear producto: Sandwich', '2021-03-02', '19:09:18', 'administrador'),
(1, 'ver', 'ver informacion lista ingredientes', '2021-03-02', '19:09:20', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-02', '19:10:18', 'administrador'),
(1, 'ver', 'ver informacion lista ingredientes', '2021-03-02', '19:11:03', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-02', '19:11:06', 'administrador'),
(1, 'crear', 'crear producto: Sandwich', '2021-03-02', '19:12:32', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-02', '19:12:47', 'administrador'),
(1, 'ver', 'ver informacion lista ingredientes', '2021-03-02', '19:12:49', 'administrador'),
(1, 'consultar', 'consultar producto', '2021-03-02', '19:12:55', 'administrador'),
(1, 'consultar', 'consultar ingrediente', '2021-03-02', '19:22:38', 'administrador'),
(1, 'crear', 'crear solicitud: Pan blanco', '2021-03-02', '19:22:45', 'administrador'),
(1, 'iniciar', 'iniciar sesion', '2021-03-02', '19:22:47', 'administrador'),
(1, 'iniciar', 'iniciar sesion', '2021-03-02', '19:23:27', 'proveedor'),
(1, 'consultar', 'consultar solicitud ingrediente', '2021-03-02', '19:23:30', 'proveedor'),
(1, 'iniciar', 'iniciar sesion', '2021-03-02', '19:23:45', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-02', '19:24:19', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-02', '19:24:29', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-02', '19:26:07', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-02', '19:26:28', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-02', '19:27:01', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-02', '19:31:24', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-02', '19:45:12', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-02', '19:46:26', 'administrador'),
(1, 'iniciar', 'iniciar sesion', '2021-03-02', '19:46:39', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-02', '19:46:55', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-02', '19:49:31', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-02', '19:50:29', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-02', '19:52:10', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-02', '19:52:17', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-02', '19:52:29', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-02', '19:53:03', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-02', '19:55:55', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-02', '20:00:58', 'administrador'),
(1, 'iniciar', 'iniciar sesion', '2021-02-24', '20:03:04', 'administrador'),
(1, 'iniciar', 'iniciar sesion', '2021-02-24', '20:05:26', 'administrador'),
(1, 'consultar', 'consultar ingrediente', '2021-02-24', '20:05:30', 'administrador'),
(1, 'consultar', 'consultar ingrediente', '2021-02-24', '20:05:35', 'administrador'),
(1, 'iniciar', 'iniciar sesion', '2021-02-24', '20:07:48', 'administrador'),
(1, 'consultar', 'consultar producto', '2021-02-24', '20:07:52', 'administrador'),
(1, 'crear', 'crear producto: Pizza', '2021-02-24', '20:09:16', 'administrador'),
(1, 'consultar', 'consultar producto', '2021-02-24', '20:09:54', 'administrador'),
(1, 'consultar', 'consultar producto', '2021-02-24', '20:10:05', 'administrador'),
(1, 'crear', 'crear producto: Pizza', '2021-02-24', '20:10:27', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-02-24', '20:10:28', 'administrador'),
(1, 'consultar', 'consultar producto', '2021-02-24', '20:10:32', 'administrador'),
(1, 'consultar', 'consultar producto', '2021-02-24', '20:12:37', 'administrador'),
(1, 'crear', 'crear producto: Pizza', '2021-02-24', '20:12:57', 'administrador'),
(1, 'consultar', 'consultar producto', '2021-02-24', '20:14:18', 'administrador'),
(1, 'crear', 'crear producto: Pizza', '2021-02-24', '20:14:34', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-02-24', '20:14:35', 'administrador'),
(1, 'crear', 'crear producto: Pizza', '2021-02-24', '20:16:59', 'administrador'),
(1, 'crear', 'crear producto: Pizza', '2021-02-24', '20:17:59', 'administrador'),
(1, 'crear', 'crear producto: Pizza', '2021-02-24', '20:18:23', 'administrador'),
(1, 'ver', 'ver informacion lista ingredientes', '2021-02-24', '20:18:25', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-02-24', '20:18:32', 'administrador'),
(1, 'ver', 'ver informacion lista ingredientes', '2021-02-24', '20:18:35', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-02-24', '20:18:46', 'administrador'),
(1, 'ver', 'ver informacion lista ingredientes', '2021-02-24', '20:18:56', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-02-24', '20:19:13', 'administrador'),
(1, 'consultar', 'consultar producto', '2021-02-24', '20:19:15', 'administrador'),
(1, 'consultar', 'consultar ingrediente', '2021-02-24', '20:19:18', 'administrador'),
(1, 'crear', 'crear solicitud: Queso', '2021-02-24', '20:19:38', 'administrador'),
(1, 'iniciar', 'iniciar sesion', '2021-02-24', '20:19:40', 'administrador'),
(1, 'crear', 'crear producto: Pizza', '2021-02-24', '20:22:15', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-02-24', '20:31:45', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-02-24', '20:32:56', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-02-24', '20:33:11', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-02-24', '20:33:26', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-02-24', '20:39:22', 'administrador'),
(1, 'crear', 'crear producto: Pizza', '2021-02-24', '20:40:02', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-02-24', '20:42:15', 'administrador'),
(1, 'consultar', 'consultar producto', '2021-02-24', '20:42:21', 'administrador'),
(1, 'consultar', 'consultar producto', '2021-02-24', '20:42:39', 'administrador'),
(1, 'crear', 'crear producto: Pizza', '2021-02-24', '20:42:57', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-02-24', '20:43:08', 'administrador'),
(1, 'crear', 'crear producto: Pizza', '2021-02-24', '20:43:47', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-02-24', '20:44:03', 'administrador'),
(1, 'consultar', 'consultar producto', '2021-02-24', '20:51:51', 'administrador'),
(1, 'crear', 'crear producto: Pizza', '2021-02-24', '20:53:15', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-02-24', '20:53:16', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-02-24', '20:53:23', 'administrador'),
(1, 'consultar', 'consultar producto', '2021-02-24', '20:53:49', 'administrador'),
(1, 'crear', 'crear producto: Pizza', '2021-02-24', '20:54:20', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-02-24', '20:54:28', 'administrador'),
(1, 'consultar', 'consultar producto', '2021-02-24', '20:56:08', 'administrador'),
(1, 'crear', 'crear producto: Pizza', '2021-02-24', '20:56:25', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-02-24', '20:56:45', 'administrador'),
(1, 'ver', 'ver informacion lista ingredientes', '2021-02-24', '20:57:24', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-02-24', '20:57:41', 'administrador'),
(1, 'ver', 'ver informacion lista ingredientes', '2021-02-24', '20:57:43', 'administrador'),
(1, 'iniciar', 'iniciar sesion', '2021-02-14', '21:13:02', 'administrador'),
(1, 'consultar', 'consultar solicitudes domiciliario', '2021-02-14', '21:13:05', 'administrador'),
(1, 'crear', 'crear domiciliario: Gabriel', '2021-02-14', '21:13:23', 'administrador'),
(1, 'consultar', 'consultar domiciliario', '2021-02-14', '21:13:27', 'administrador'),
(1, 'iniciar', 'iniciar sesion', '2021-02-14', '21:18:45', 'cliente'),
(1, 'consultar', 'consultar producto', '2021-02-14', '21:18:50', 'cliente'),
(1, 'agregar', 'agregar al carrito el producto: Perro caliente', '2021-02-14', '21:18:54', 'cliente'),
(1, 'consultar', 'consultar producto', '2021-02-14', '21:18:55', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '21:18:59', 'cliente'),
(1, 'crear', 'crear producto: Pizza', '2021-02-24', '21:23:46', 'administrador'),
(1, 'consultar', 'consultar producto', '2021-02-24', '21:24:22', 'administrador'),
(1, 'crear', 'crear producto: Pizza', '2021-02-24', '21:24:47', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-02-24', '21:25:05', 'administrador'),
(1, 'ver', 'ver informacion lista ingredientes', '2021-02-24', '21:25:07', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-02-24', '21:25:15', 'administrador'),
(1, 'ver', 'ver informacion lista ingredientes', '2021-02-24', '21:25:17', 'administrador'),
(1, 'consultar', 'consultar producto', '2021-02-24', '21:25:25', 'administrador'),
(1, 'iniciar', 'iniciar sesion', '2021-02-24', '21:26:41', 'proveedor'),
(1, 'iniciar', 'iniciar sesion', '2021-02-14', '21:36:40', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '21:36:42', 'cliente'),
(1, 'consultar', 'consultar carrito', '2021-02-14', '21:37:45', 'cliente'),
(1, 'comprar', 'Compra finalizada', '2021-02-14', '21:38:24', 'cliente'),
(1, 'consultar', 'consultar pedido', '2021-02-14', '21:38:25', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '21:38:28', 'cliente'),
(1, 'iniciar', 'iniciar sesion', '2021-02-14', '21:39:31', 'domiciliario'),
(1, 'consultar', 'consultar pedido', '2021-02-14', '21:39:35', 'domiciliario'),
(1, 'consultar', 'consultar pedido', '2021-02-14', '21:39:39', 'domiciliario'),
(1, 'consultar', 'consultar pedido', '2021-02-14', '21:39:41', 'domiciliario'),
(1, 'consultar', 'consultar pedido', '2021-02-14', '21:39:45', 'domiciliario'),
(1, 'consultar', 'consultar pedido', '2021-02-14', '21:39:54', 'domiciliario'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '21:39:59', 'domiciliario'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '21:40:20', 'domiciliario'),
(1, 'consultar', 'consultar pedido', '2021-02-14', '21:40:43', 'domiciliario'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '21:40:47', 'domiciliario'),
(1, 'consultar', 'consultar pedido', '2021-02-14', '21:40:51', 'domiciliario'),
(1, 'iniciar', 'iniciar sesion', '2021-02-14', '21:41:15', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '21:41:17', 'cliente'),
(1, 'iniciar', 'iniciar sesion', '2021-03-02', '21:41:31', 'administrador'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '21:41:52', 'cliente'),
(1, 'buscar', 'buscar ingrediente', '2021-03-02', '21:42:11', 'administrador'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '21:42:28', 'cliente'),
(1, 'buscar', 'buscar ingrediente', '2021-03-02', '21:44:16', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-02', '21:44:33', 'administrador'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '21:45:10', 'cliente'),
(1, 'buscar', 'buscar ingrediente', '2021-03-02', '21:45:15', 'administrador'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '21:46:10', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '21:46:15', 'cliente'),
(1, 'consultar', 'consultar pedido', '2021-02-14', '21:46:18', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '21:46:24', 'cliente'),
(1, 'buscar', 'buscar ingrediente', '2021-03-02', '21:46:53', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-02', '21:47:24', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-02', '21:49:00', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-02', '21:49:20', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-02', '21:50:38', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-02', '21:51:58', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-02', '21:53:07', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-02', '21:56:12', 'administrador'),
(1, 'iniciar', 'iniciar sesion', '2021-02-24', '21:56:33', 'proveedor'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '21:57:37', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '21:57:38', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '21:58:40', 'cliente'),
(1, 'buscar', 'buscar ingrediente', '2021-03-02', '21:59:37', 'administrador'),
(1, 'iniciar', 'iniciar sesion', '2021-02-24', '22:00:29', 'administrador'),
(1, 'consultar', 'consultar ingrediente', '2021-02-24', '22:00:33', 'administrador'),
(1, 'iniciar', 'iniciar sesion', '2021-02-24', '22:01:32', 'administrador'),
(1, 'crear', 'crear producto: Pizza', '2021-02-24', '22:02:04', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-02-24', '22:02:20', 'administrador'),
(1, 'ver', 'ver informacion lista ingredientes', '2021-02-24', '22:02:31', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-02-24', '22:02:39', 'administrador'),
(1, 'ver', 'ver informacion lista ingredientes', '2021-02-24', '22:02:42', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-02-24', '22:02:55', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-02-24', '22:03:05', 'administrador'),
(1, 'ver', 'ver informacion lista ingredientes', '2021-02-24', '22:03:06', 'administrador'),
(1, 'consultar', 'consultar producto', '2021-02-24', '22:03:12', 'administrador'),
(1, 'iniciar', 'iniciar sesion', '2021-02-24', '22:10:59', 'proveedor'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:11:11', 'cliente'),
(1, 'iniciar', 'iniciar sesion', '2021-02-24', '22:11:41', 'proveedor'),
(1, 'iniciar', 'iniciar sesion', '2021-02-24', '22:12:25', 'proveedor'),
(1, 'consultar', 'consultar pedido', '2021-02-14', '22:12:56', 'cliente'),
(1, 'crear', 'crear ingrediente: Mortadela', '2021-02-24', '22:13:25', 'proveedor'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:13:48', 'cliente'),
(1, 'iniciar', 'iniciar sesion', '2021-02-24', '22:14:51', 'cliente'),
(1, 'consultar', 'consultar producto', '2021-02-24', '22:14:54', 'cliente'),
(1, 'iniciar', 'iniciar sesion', '2021-02-24', '22:15:05', 'administrador'),
(1, 'consultar', 'consultar solicitudes domiciliario', '2021-02-24', '22:15:08', 'administrador'),
(1, 'iniciar', 'iniciar sesion', '2021-02-24', '22:15:30', 'cliente'),
(1, 'consultar', 'consultar producto', '2021-02-24', '22:15:33', 'cliente'),
(1, 'iniciar', 'iniciar sesion', '2021-02-24', '22:16:01', 'administrador'),
(1, 'consultar', 'consultar ingrediente', '2021-02-24', '22:16:11', 'administrador'),
(1, 'consultar', 'consultar ingrediente', '2021-02-24', '22:16:39', 'administrador'),
(1, 'consultar', 'consultar ingrediente', '2021-02-24', '22:17:05', 'administrador'),
(1, 'consultar', 'consultar ingrediente', '2021-02-24', '22:17:21', 'administrador'),
(1, 'consultar', 'consultar ingrediente', '2021-02-24', '22:17:45', 'administrador'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:18:40', 'cliente'),
(1, 'iniciar', 'iniciar sesion', '2021-02-14', '22:19:49', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:19:51', 'cliente'),
(1, 'consultar', 'consultar pedido', '2021-02-14', '22:19:53', 'cliente'),
(1, 'iniciar', 'iniciar sesion', '2021-03-02', '22:21:09', 'cliente'),
(1, 'buscar', 'buscar producto', '2021-03-02', '22:21:12', 'cliente'),
(1, 'buscar', 'buscar producto', '2021-03-02', '22:21:24', 'cliente'),
(1, 'consultar', 'consultar producto', '2021-03-02', '22:21:26', 'cliente'),
(1, 'iniciar', 'iniciar sesion', '2021-02-14', '22:21:31', 'domiciliario'),
(1, 'consultar', 'consultar pedido', '2021-02-14', '22:21:36', 'domiciliario'),
(1, 'consultar', 'consultar pedido', '2021-02-14', '22:21:39', 'domiciliario'),
(1, 'consultar', 'consultar pedido', '2021-02-14', '22:21:41', 'domiciliario'),
(1, 'iniciar', 'iniciar sesion', '2021-02-14', '22:21:53', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:21:56', 'cliente'),
(1, 'buscar', 'buscar producto', '2021-03-02', '22:23:43', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:24:00', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:24:05', 'cliente'),
(1, 'buscar', 'buscar producto', '2021-03-02', '22:24:13', 'cliente'),
(1, 'buscar', 'buscar producto', '2021-03-02', '22:25:25', 'cliente'),
(1, 'buscar', 'buscar producto', '2021-03-02', '22:26:03', 'cliente'),
(1, 'agregar', 'agregar al carrito el producto: Hamburguesa', '2021-03-02', '22:26:18', 'cliente'),
(1, 'consultar', 'consultar producto', '2021-03-02', '22:26:20', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:32:12', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:32:29', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:32:52', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:32:54', 'cliente');
INSERT INTO `log` (`idLog`, `accion`, `datos`, `fecha`, `hora`, `actor`) VALUES
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:32:59', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:33:11', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:33:12', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:33:25', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:33:26', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:34:26', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:34:40', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:34:41', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:35:36', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:35:50', 'cliente'),
(1, 'consultar', 'consultar ingrediente', '2021-02-24', '22:36:36', 'administrador'),
(1, 'consultar', 'consultar ingrediente', '2021-02-24', '22:36:53', 'administrador'),
(1, 'consultar', 'consultar ingrediente', '2021-02-24', '22:39:39', 'administrador'),
(1, 'consultar', 'consultar ingrediente', '2021-02-24', '22:40:13', 'administrador'),
(1, 'consultar', 'consultar ingrediente', '2021-02-24', '22:40:21', 'administrador'),
(1, 'consultar', 'consultar ingrediente', '2021-02-24', '22:40:24', 'administrador'),
(1, 'consultar', 'consultar pedido', '2021-02-14', '22:41:23', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:41:39', 'cliente'),
(1, 'consultar', 'consultar ingrediente', '2021-02-24', '22:41:49', 'administrador'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:41:51', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:41:52', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:42:09', 'cliente'),
(1, 'iniciar', 'iniciar sesion', '2021-02-24', '22:42:11', 'administrador'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:42:26', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:42:27', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:42:45', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:42:46', 'cliente'),
(1, 'iniciar', 'iniciar sesion', '2021-02-24', '22:42:55', 'administrador'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:42:57', 'cliente'),
(1, 'consultar', 'consultar ingrediente', '2021-02-24', '22:43:04', 'administrador'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:43:20', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:43:48', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:44:24', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:45:46', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:46:26', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:46:27', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:46:47', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:47:01', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:47:08', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:47:26', 'cliente'),
(1, 'consultar', 'consultar producto', '2021-03-02', '22:47:30', 'cliente'),
(1, 'iniciar', 'iniciar sesion', '2021-03-02', '22:47:40', 'administrador'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:47:48', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:47:55', 'cliente'),
(1, 'buscar', 'buscar ingrediente', '2021-03-02', '22:48:06', 'administrador'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:48:07', 'cliente'),
(1, 'buscar', 'buscar ingrediente', '2021-03-02', '22:48:19', 'administrador'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:48:22', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:48:23', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:48:28', 'cliente'),
(1, 'consultar', 'consultar pedido', '2021-02-24', '22:48:32', 'administrador'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:48:40', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:48:41', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:48:45', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:48:53', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:48:54', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:48:57', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:48:58', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:49:02', 'cliente'),
(1, 'consultar', 'consultar cliente', '2021-02-24', '22:49:41', 'administrador'),
(1, 'consultar', 'consultar pedido', '2021-02-24', '22:49:44', 'administrador'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:49:53', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:49:54', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:50:32', 'cliente'),
(1, 'buscar', 'buscar ingrediente', '2021-03-02', '22:50:35', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-02', '22:50:46', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-02', '22:51:07', 'administrador'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:51:11', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:51:12', 'cliente'),
(1, 'buscar', 'buscar ingrediente', '2021-03-02', '22:51:26', 'administrador'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:52:41', 'cliente'),
(1, 'buscar', 'buscar ingrediente', '2021-03-02', '22:52:58', 'administrador'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:53:16', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:53:42', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:55:07', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:55:25', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:55:27', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:55:31', 'cliente'),
(1, 'buscar', 'buscar ingrediente', '2021-03-02', '22:56:08', 'administrador'),
(1, 'buscar', 'buscar ingrediente', '2021-03-02', '22:56:15', 'administrador'),
(1, 'ver', 'ver informacion lista ingredientes', '2021-03-02', '22:56:16', 'administrador'),
(1, 'consultar', 'consultar producto', '2021-03-02', '22:56:28', 'administrador'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '22:56:57', 'cliente'),
(1, 'consultar', 'consultar pedido', '2021-02-14', '22:57:01', 'cliente'),
(1, 'consultar', 'consultar pedido', '2021-02-14', '22:57:07', 'cliente'),
(1, 'consultar', 'consultar pedido', '2021-02-14', '22:57:30', 'cliente'),
(1, 'iniciar', 'iniciar sesion', '2021-02-14', '23:01:49', 'cliente'),
(1, 'consultar', 'consultar producto', '2021-02-14', '23:03:00', 'cliente'),
(1, 'consultar', 'consultar producto', '2021-02-14', '23:04:47', 'cliente'),
(1, 'agregar', 'agregar al carrito el producto: Perro caliente', '2021-02-14', '23:04:52', 'cliente'),
(1, 'consultar', 'consultar producto', '2021-02-14', '23:04:53', 'cliente'),
(1, 'consultar', 'consultar carrito', '2021-02-14', '23:04:55', 'cliente'),
(1, 'comprar', 'Compra finalizada', '2021-02-14', '23:04:56', 'cliente'),
(1, 'consultar', 'consultar pedido', '2021-02-14', '23:04:57', 'cliente'),
(1, 'consultar', 'consultar pedido', '2021-02-14', '23:05:31', 'cliente'),
(1, 'iniciar', 'iniciar sesion', '2021-02-14', '23:05:41', 'domiciliario'),
(1, 'consultar', 'consultar pedido', '2021-02-14', '23:05:47', 'domiciliario'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:05:52', 'domiciliario'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:11:48', 'domiciliario'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:12:05', 'domiciliario'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:12:20', 'domiciliario'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:12:21', 'domiciliario'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:12:27', 'domiciliario'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:12:42', 'domiciliario'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:12:52', 'domiciliario'),
(1, 'iniciar', 'iniciar sesion', '2021-02-14', '23:13:27', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:18:12', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:18:36', 'cliente'),
(1, 'iniciar', 'iniciar sesion', '2021-02-14', '23:19:48', 'domiciliario'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:19:52', 'domiciliario'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:20:08', 'domiciliario'),
(1, 'iniciar', 'iniciar sesion', '2021-02-14', '23:20:20', 'domiciliario'),
(1, 'consultar', 'consultar pedido', '2021-02-14', '23:20:25', 'domiciliario'),
(1, 'actualizar', 'proceso de envio del pedido', '2021-02-14', '23:20:27', 'domiciliario'),
(1, 'actualizar', 'confirmar entrega del pedido', '2021-02-14', '23:20:29', 'domiciliario'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:20:31', 'domiciliario'),
(1, 'iniciar', 'iniciar sesion', '2021-02-14', '23:20:40', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:21:23', 'cliente'),
(1, 'iniciar', 'iniciar sesion', '2021-02-14', '23:27:28', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:27:31', 'cliente'),
(1, 'iniciar', 'iniciar sesion', '2021-02-14', '23:27:39', 'domiciliario'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:27:43', 'domiciliario'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:28:03', 'domiciliario'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:28:04', 'domiciliario'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:28:35', 'domiciliario'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:29:31', 'domiciliario'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:29:41', 'domiciliario'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:32:10', 'domiciliario'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:32:45', 'domiciliario'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:32:57', 'domiciliario'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:33:06', 'domiciliario'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:33:34', 'domiciliario'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:33:35', 'domiciliario'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:33:51', 'domiciliario'),
(1, 'consultar', 'consultar pedido', '2021-02-14', '23:33:57', 'domiciliario'),
(1, 'actualizar', 'proceso de envio del pedido', '2021-02-14', '23:33:58', 'domiciliario'),
(1, 'consultar', 'consultar pedido', '2021-02-14', '23:33:59', 'domiciliario'),
(1, 'actualizar', 'confirmar entrega del pedido', '2021-02-14', '23:34:00', 'domiciliario'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:34:03', 'domiciliario'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:34:17', 'domiciliario'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:34:30', 'domiciliario'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:35:51', 'domiciliario'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:35:56', 'domiciliario'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:36:17', 'domiciliario'),
(1, 'consultar', 'consultar pedido', '2021-02-14', '23:36:52', 'domiciliario'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:36:54', 'domiciliario'),
(1, 'iniciar', 'iniciar sesion', '2021-02-14', '23:37:14', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:37:16', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:37:32', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:37:52', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:38:11', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:38:52', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:39:11', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:39:41', 'cliente'),
(1, 'consultar', 'consultar pedido', '2021-02-14', '23:40:26', 'cliente'),
(1, 'consultar', 'consultar producto', '2021-02-14', '23:40:29', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:40:32', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:40:57', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:41:27', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:41:38', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:41:51', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:43:04', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:43:09', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:43:26', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:43:31', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:43:32', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:43:36', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:43:43', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:43:45', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:43:53', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:44:42', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:44:52', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:45:39', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:45:40', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:45:41', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:46:05', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:46:06', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:46:14', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:46:29', 'cliente'),
(1, 'consultar', 'consultar proceso', '2021-02-14', '23:46:43', 'cliente'),
(2, 'actualizar', 'proceso de envio del pedido', '2021-02-15', '03:15:27', 'domiciliario'),
(2, 'actualizar', 'confirmar entrega del pedido', '2021-02-15', '03:15:29', 'domiciliario'),
(2, 'actualizar', 'proceso de envio del pedido', '2021-02-15', '03:35:38', 'domiciliario'),
(2, 'actualizar', 'confirmar entrega del pedido', '2021-02-15', '03:35:40', 'domiciliario'),
(2, 'iniciar', 'iniciar sesion', '2021-02-14', '21:06:17', 'cliente'),
(2, 'consultar', 'consultar pedido', '2021-02-14', '21:06:21', 'cliente'),
(2, 'consultar', 'consultar proceso', '2021-02-14', '21:06:23', 'cliente'),
(2, 'consultar', 'consultar proceso', '2021-02-14', '21:06:32', 'cliente'),
(2, 'consultar', 'consultar proceso', '2021-02-14', '21:07:19', 'cliente'),
(2, 'iniciar', 'iniciar sesion', '2021-02-14', '21:07:24', 'cliente'),
(2, 'consultar', 'consultar proceso', '2021-02-14', '21:07:56', 'cliente'),
(2, 'consultar', 'consultar proceso', '2021-02-14', '21:08:10', 'cliente'),
(2, 'iniciar', 'iniciar sesion', '2021-02-14', '21:08:55', 'cliente'),
(2, 'consultar', 'consultar pedido', '2021-02-14', '21:08:59', 'cliente'),
(2, 'consultar', 'consultar proceso', '2021-02-14', '21:09:02', 'cliente'),
(2, 'consultar', 'consultar log', '2021-02-14', '21:09:03', 'cliente'),
(2, 'consultar', 'consultar log', '2021-02-14', '21:09:40', 'cliente'),
(2, 'iniciar', 'iniciar sesion', '2021-02-14', '21:10:32', 'cliente'),
(2, 'consultar', 'consultar producto', '2021-02-14', '21:10:36', 'cliente'),
(2, 'agregar', 'agregar al carrito el producto: Hamburguesa', '2021-02-14', '21:10:39', 'cliente'),
(2, 'consultar', 'consultar producto', '2021-02-14', '21:10:40', 'cliente'),
(2, 'consultar', 'consultar proceso', '2021-02-14', '21:10:42', 'cliente'),
(2, 'consultar', 'consultar carrito', '2021-02-14', '21:10:57', 'cliente'),
(2, 'consultar', 'consultar pedido', '2021-02-14', '21:10:59', 'cliente'),
(2, 'consultar', 'consultar carrito', '2021-02-14', '21:11:04', 'cliente'),
(2, 'iniciar', 'iniciar sesion', '2021-02-14', '21:14:40', 'cliente'),
(2, 'consultar', 'consultar carrito', '2021-02-14', '21:14:45', 'cliente'),
(2, 'comprar', 'Compra finalizada', '2021-02-14', '21:14:47', 'cliente'),
(2, 'consultar', 'consultar proceso', '2021-02-14', '21:14:52', 'cliente'),
(2, 'iniciar', 'iniciar sesion', '2021-02-14', '21:15:05', 'domiciliario'),
(2, 'consultar', 'consultar proceso', '2021-02-14', '21:15:09', 'domiciliario'),
(2, 'consultar', 'consultar pedido', '2021-02-14', '21:15:24', 'domiciliario'),
(2, 'consultar', 'consultar pedido', '2021-02-14', '21:15:27', 'domiciliario'),
(2, 'consultar', 'consultar pedido', '2021-02-14', '21:15:29', 'domiciliario'),
(2, 'consultar', 'consultar proceso', '2021-02-14', '21:15:31', 'domiciliario'),
(2, 'iniciar', 'iniciar sesion', '2021-02-14', '21:20:25', 'domiciliario'),
(2, 'consultar', 'consultar proceso', '2021-02-14', '21:20:29', 'domiciliario'),
(2, 'iniciar', 'iniciar sesion', '2021-02-14', '21:20:44', 'cliente'),
(2, 'consultar', 'consultar proceso', '2021-02-14', '21:20:48', 'cliente'),
(2, 'consultar', 'consultar proceso', '2021-02-14', '21:22:09', 'cliente'),
(2, 'consultar', 'consultar proceso', '2021-02-14', '21:34:38', 'cliente'),
(2, 'consultar', 'consultar producto', '2021-02-14', '21:34:58', 'cliente'),
(2, 'agregar', 'agregar al carrito el producto: Perro caliente', '2021-02-14', '21:35:02', 'cliente'),
(2, 'consultar', 'consultar producto', '2021-02-14', '21:35:03', 'cliente'),
(2, 'consultar', 'consultar carrito', '2021-02-14', '21:35:06', 'cliente'),
(2, 'comprar', 'Compra finalizada', '2021-02-14', '21:35:07', 'cliente'),
(2, 'consultar', 'consultar pedido', '2021-02-14', '21:35:08', 'cliente'),
(2, 'consultar', 'consultar proceso', '2021-02-14', '21:35:14', 'cliente'),
(2, 'iniciar', 'iniciar sesion', '2021-02-14', '21:35:31', 'domiciliario'),
(2, 'consultar', 'consultar pedido', '2021-02-14', '21:35:35', 'domiciliario'),
(2, 'consultar', 'consultar pedido', '2021-02-14', '21:35:38', 'domiciliario'),
(2, 'consultar', 'consultar pedido', '2021-02-14', '21:35:40', 'domiciliario'),
(2, 'consultar', 'consultar proceso', '2021-02-14', '21:36:27', 'domiciliario'),
(2, 'iniciar', 'iniciar sesion', '2021-02-14', '21:38:37', 'cliente'),
(2, 'consultar', 'consultar proceso', '2021-02-14', '21:38:56', 'cliente'),
(2, 'consultar', 'consultar producto', '2021-02-14', '21:38:58', 'cliente'),
(2, 'agregar', 'agregar al carrito el producto: Mazorcada', '2021-02-14', '21:39:03', 'cliente'),
(2, 'consultar', 'consultar producto', '2021-02-14', '21:39:04', 'cliente'),
(2, 'consultar', 'consultar carrito', '2021-02-14', '21:39:05', 'cliente'),
(2, 'comprar', 'Compra finalizada', '2021-02-14', '21:39:07', 'cliente'),
(2, 'consultar', 'consultar pedido', '2021-02-14', '21:39:08', 'cliente'),
(2, 'consultar', 'consultar proceso', '2021-02-14', '21:39:10', 'cliente'),
(2, 'iniciar', 'iniciar sesion', '2021-02-14', '22:20:13', 'cliente'),
(2, 'consultar', 'consultar producto', '2021-02-14', '22:20:27', 'cliente'),
(2, 'agregar', 'agregar al carrito el producto: Perro caliente', '2021-02-14', '22:20:38', 'cliente'),
(2, 'consultar', 'consultar producto', '2021-02-14', '22:20:39', 'cliente'),
(2, 'consultar', 'consultar proceso', '2021-02-14', '22:20:41', 'cliente'),
(2, 'consultar', 'consultar proceso', '2021-02-14', '22:20:54', 'cliente'),
(2, 'iniciar', 'iniciar sesion', '2021-02-14', '22:21:08', 'cliente'),
(2, 'consultar', 'consultar carrito', '2021-02-14', '22:21:12', 'cliente'),
(2, 'comprar', 'Compra finalizada', '2021-02-14', '22:21:14', 'cliente'),
(2, 'consultar', 'consultar pedido', '2021-02-14', '22:21:15', 'cliente'),
(2, 'consultar', 'consultar pedido', '2021-02-14', '22:21:19', 'cliente'),
(2, 'iniciar', 'iniciar sesion', '2021-02-14', '23:21:36', 'cliente'),
(2, 'consultar', 'consultar producto', '2021-02-14', '23:21:40', 'cliente'),
(2, 'agregar', 'agregar al carrito el producto: Hamburguesa', '2021-02-14', '23:21:44', 'cliente'),
(2, 'consultar', 'consultar producto', '2021-02-14', '23:21:45', 'cliente'),
(2, 'consultar', 'consultar carrito', '2021-02-14', '23:21:46', 'cliente'),
(2, 'comprar', 'Compra finalizada', '2021-02-14', '23:21:48', 'cliente'),
(2, 'consultar', 'consultar proceso', '2021-02-14', '23:21:51', 'cliente'),
(2, 'consultar', 'consultar proceso', '2021-02-14', '23:22:22', 'cliente'),
(2, 'consultar', 'consultar proceso', '2021-02-14', '23:22:28', 'cliente'),
(2, 'consultar', 'consultar proceso', '2021-02-14', '23:22:29', 'cliente'),
(2, 'consultar', 'consultar proceso', '2021-02-14', '23:22:35', 'cliente'),
(2, 'consultar', 'consultar pedido', '2021-02-14', '23:25:50', 'cliente'),
(2, 'consultar', 'consultar proceso', '2021-02-14', '23:26:11', 'cliente'),
(2, 'consultar', 'consultar proceso', '2021-02-14', '23:27:00', 'cliente'),
(2, 'consultar', 'consultar proceso', '2021-02-14', '23:27:20', 'cliente'),
(5, 'iniciar', 'iniciar sesion', '2021-02-24', '17:13:03', 'cliente'),
(5, 'iniciar', 'iniciar sesion', '2021-02-24', '17:14:04', 'cliente'),
(5, 'consultar', 'consultar proceso', '2021-02-24', '17:14:08', 'cliente'),
(5, 'consultar', 'consultar proceso', '2021-02-24', '17:14:13', 'cliente'),
(5, 'consultar', 'consultar proceso', '2021-02-24', '17:14:18', 'cliente'),
(5, 'consultar', 'consultar proceso', '2021-02-24', '17:15:10', 'cliente'),
(10, 'iniciar', 'iniciar sesion', '2021-02-24', '12:05:25', 'cliente'),
(10, 'consultar', 'consultar producto', '2021-02-24', '12:05:47', 'cliente'),
(10, 'buscar', 'buscar producto', '2021-02-24', '12:05:53', 'cliente'),
(10, 'consultar', 'consultar pedido', '2021-02-24', '12:05:57', 'cliente'),
(10, 'consultar', 'consultar proceso', '2021-02-24', '12:06:01', 'cliente'),
(10, 'consultar', 'consultar log', '2021-02-24', '12:06:16', 'cliente'),
(10, 'consultar', 'consultar producto', '2021-02-24', '12:06:28', 'cliente'),
(10, 'agregar', 'agregar al carrito el producto: Perro caliente', '2021-02-24', '12:06:36', 'cliente'),
(10, 'consultar', 'consultar producto', '2021-02-24', '12:06:37', 'cliente'),
(10, 'consultar', 'consultar carrito', '2021-02-24', '12:06:42', 'cliente'),
(10, 'actualizar', 'quitar una unidad del carrito', '2021-02-24', '12:06:44', 'cliente'),
(10, 'actualizar', 'agregar una unidad al carrito', '2021-02-24', '12:06:47', 'cliente'),
(10, 'actualizar', 'agregar una unidad al carrito', '2021-02-24', '12:06:48', 'cliente'),
(10, 'actualizar', 'quitar una unidad del carrito', '2021-02-24', '12:06:52', 'cliente'),
(10, 'consultar', 'consultar carrito', '2021-02-24', '12:06:53', 'cliente'),
(10, 'consultar', 'consultar pedido', '2021-02-24', '12:07:06', 'cliente'),
(10, 'consultar', 'consultar proceso', '2021-02-24', '12:07:10', 'cliente'),
(10, 'consultar', 'consultar proceso', '2021-02-24', '12:07:36', 'cliente'),
(10, 'iniciar', 'iniciar sesion', '2021-02-24', '16:39:00', 'cliente'),
(10, 'consultar', 'consultar proceso', '2021-02-24', '16:39:02', 'cliente'),
(10, 'consultar', 'consultar proceso', '2021-02-24', '16:41:58', 'cliente');

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

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `id_cliente`, `id_prod`, `id_domiciliario`, `unidades`, `fecha_hora`, `valor_unidad`, `valor_total`, `observaciones`, `estado`) VALUES
(1296, 2, 2, 2, 1, '2021-02-14 23:21:47', 10000, 10000, 'Pedido entregado', 'Confirmado'),
(1667, 1, 1, 1, 1, '2021-02-14 23:04:56', 8000, 8000, 'Pedido entregado', 'Confirmado'),
(1824, 1, 2, 1, 2, '2021-02-24 18:06:21', 13000, 26000, 'Pedido entregado', 'Confirmado'),
(1824, 1, 3, 1, 1, '2021-02-24 18:06:21', 26000, 26000, 'Pedido entregado', 'Confirmado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proceso`
--

CREATE TABLE `proceso` (
  `id` int(11) NOT NULL,
  `datos` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `idProducto` int(11) NOT NULL,
  `actor` varchar(50) NOT NULL,
  `idActor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proceso`
--

INSERT INTO `proceso` (`id`, `datos`, `fecha`, `hora`, `idProducto`, `actor`, `idActor`) VALUES
(1, 'agregar al carrito el producto: Perro caliente', '2021-02-14', '23:04:52', 1, 'cliente', 1),
(2, 'Compra finalizada: Perro caliente', '2021-02-14', '23:04:56', 1, 'cliente', 1),
(3, 'proceso de envio del pedido: 1667', '2021-02-14', '23:20:27', 1, 'domiciliario', 1),
(4, 'confirmar entrega del pedido: 1667', '2021-02-14', '23:20:29', 1, 'domiciliario', 1),
(5, 'agregar al carrito el producto: Hamburguesa', '2021-02-14', '23:21:44', 2, 'cliente', 2),
(6, 'Compra finalizada: Hamburguesa', '2021-02-14', '23:21:48', 2, 'cliente', 2),
(7, 'proceso de envio del pedido: 1296', '2021-02-14', '23:33:58', 2, 'domiciliario', 2),
(8, 'confirmar entrega del pedido: 1296', '2021-02-14', '23:34:00', 2, 'domiciliario', 2),
(9, 'agregar al carrito el producto: Perro caliente', '2021-02-24', '12:06:36', 1, 'cliente', 10),
(10, 'quitar una unidad del carrito: Perro caliente', '2021-02-24', '12:06:44', 1, 'cliente', 10),
(11, 'agregar una unidad al carrito: Perro caliente', '2021-02-24', '12:06:47', 1, 'cliente', 10),
(12, 'agregar una unidad al carrito: Perro caliente', '2021-02-24', '12:06:48', 1, 'cliente', 10),
(13, 'quitar una unidad del carrito: Perro caliente', '2021-02-24', '12:06:52', 1, 'cliente', 10),
(14, 'agregar al carrito el producto: Hamburguesa', '2021-02-24', '17:56:41', 2, 'cliente', 1),
(15, 'Compra finalizada: Hamburguesa', '2021-02-24', '17:56:46', 2, 'cliente', 1),
(16, 'eliminar pedido: 1266', '2021-02-24', '18:01:04', 2, 'cliente', 1),
(17, 'agregar al carrito el producto: Hamburguesa', '2021-02-24', '18:05:36', 2, 'cliente', 1),
(18, 'eliminar producto del carrito: Hamburguesa', '2021-02-24', '18:05:42', 2, 'cliente', 1),
(19, 'agregar al carrito el producto: Perro caliente', '2021-02-24', '18:05:50', 1, 'cliente', 1),
(20, 'agregar al carrito el producto: Hamburguesa', '2021-02-24', '18:05:56', 2, 'cliente', 1),
(21, 'vaciar carrito: Perro caliente', '2021-02-24', '18:06:01', 1, 'cliente', 1),
(22, 'vaciar carrito: Hamburguesa', '2021-02-24', '18:06:01', 2, 'cliente', 1),
(23, 'vaciar carrito: Perro caliente', '2021-02-24', '18:06:01', 1, 'cliente', 1),
(24, 'agregar al carrito el producto: Hamburguesa', '2021-02-24', '18:06:11', 2, 'cliente', 1),
(25, 'agregar al carrito el producto: Mazorcada', '2021-02-24', '18:06:17', 3, 'cliente', 1),
(26, 'Compra finalizada: Hamburguesa', '2021-02-24', '18:06:21', 2, 'cliente', 1),
(27, 'Compra finalizada: Mazorcada', '2021-02-24', '18:06:21', 3, 'cliente', 1),
(28, 'proceso de envio del pedido: 1824', '2021-02-24', '18:09:44', 2, 'domiciliario', 1),
(29, 'proceso de envio del pedido: 1824', '2021-02-24', '18:09:44', 3, 'domiciliario', 1),
(30, 'confirmar entrega del pedido: 1824', '2021-02-24', '18:10:01', 2, 'domiciliario', 1),
(31, 'confirmar entrega del pedido: 1824', '2021-02-24', '18:10:01', 3, 'domiciliario', 1),
(32, 'agregar al carrito el producto: Hamburguesa', '2021-03-02', '22:26:18', 2, 'cliente', 1);

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
(1, 'Perro caliente', 'Perro especial con huevo de codorniz', 'imagenes/1613224537.png', 96, 8000),
(2, 'Hamburguesa', 'Doble carne', 'imagenes/1613224559.png', 96, 10000),
(3, 'Mazorcada', 'Mixta', 'imagenes/1613224567.png', 96, 6000),
(4, 'Sandwich', 'Doble queso', '', 5, 12000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_ingrediente`
--

CREATE TABLE `producto_ingrediente` (
  `id_prod` int(11) NOT NULL,
  `id_ingrediente` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto_ingrediente`
--

INSERT INTO `producto_ingrediente` (`id_prod`, `id_ingrediente`, `cantidad`) VALUES
(4, 1, 5),
(4, 2, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `imagen` varchar(1000) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `clave` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id`, `nombre`, `imagen`, `correo`, `clave`) VALUES
(1, 'Zenu', '...', 'proveedorzenu@gmail.com', '0cbb52da4f10baea2c8199c41badd90b');

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
  `telefono` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudi`
--

CREATE TABLE `solicitudi` (
  `id_ingrediente` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudp`
--

CREATE TABLE `solicitudp` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `clave` varchar(50) NOT NULL
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
-- Indices de la tabla `ingrediente`
--
ALTER TABLE `ingrediente`
  ADD PRIMARY KEY (`id_ingrediente`),
  ADD KEY `idProveedor` (`idProveedor`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id_ingrediente`);

--
-- Indices de la tabla `lista_ingrediente`
--
ALTER TABLE `lista_ingrediente`
  ADD PRIMARY KEY (`id_prod`,`id_ingrediente`);

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
-- Indices de la tabla `proceso`
--
ALTER TABLE `proceso`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_prod`);

--
-- Indices de la tabla `producto_ingrediente`
--
ALTER TABLE `producto_ingrediente`
  ADD PRIMARY KEY (`id_prod`,`id_ingrediente`),
  ADD KEY `id_ingrediente` (`id_ingrediente`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `solicitudi`
--
ALTER TABLE `solicitudi`
  ADD PRIMARY KEY (`id_ingrediente`);

--
-- Indices de la tabla `solicitudp`
--
ALTER TABLE `solicitudp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `proceso`
--
ALTER TABLE `proceso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

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
-- Filtros para la tabla `ingrediente`
--
ALTER TABLE `ingrediente`
  ADD CONSTRAINT `ingrediente_ibfk_1` FOREIGN KEY (`idProveedor`) REFERENCES `proveedor` (`id`);

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `inventario_ibfk_1` FOREIGN KEY (`id_ingrediente`) REFERENCES `ingrediente` (`id_ingrediente`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`idCliente`),
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`id_prod`) REFERENCES `producto` (`id_prod`),
  ADD CONSTRAINT `pedido_ibfk_3` FOREIGN KEY (`id_domiciliario`) REFERENCES `domiciliario` (`idDomiciliario`);

--
-- Filtros para la tabla `producto_ingrediente`
--
ALTER TABLE `producto_ingrediente`
  ADD CONSTRAINT `producto_ingrediente_ibfk_1` FOREIGN KEY (`id_prod`) REFERENCES `producto` (`id_prod`),
  ADD CONSTRAINT `producto_ingrediente_ibfk_2` FOREIGN KEY (`id_ingrediente`) REFERENCES `ingrediente` (`id_ingrediente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
