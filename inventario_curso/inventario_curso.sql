-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-09-2019 a las 08:33:49
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inventario_curso`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `idclientes` int(11) NOT NULL COMMENT 'id de la tabla clientes',
  `cedula` varchar(45) NOT NULL COMMENT 'cedula del cliente',
  `nombre` varchar(45) DEFAULT NULL COMMENT 'nombre del cliente',
  `telefono` varchar(45) DEFAULT NULL COMMENT 'telefono del cliente',
  `direccion` varchar(45) DEFAULT NULL COMMENT 'direccion del cliente',
  `correo` varchar(45) DEFAULT NULL COMMENT 'correo del cliente',
  `fecha` date DEFAULT NULL COMMENT 'fecha de registro del cliente'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idclientes`, `cedula`, `nombre`, `telefono`, `direccion`, `correo`, `fecha`) VALUES
(1, 'cuaderno', 'pepa', 'cuaderno 100 hojas', '2000', '2000', '2019-07-10'),
(2, '12313', 'pepe h', '565', '6+', 'pepa@pepa', '2019-09-02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_compras`
--

CREATE TABLE `orden_compras` (
  `id_orden_compras` int(11) NOT NULL COMMENT 'id de la orden de compras de la tabla orden compras',
  `precio_orden` varchar(200) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'precios de orden de la tabla orden compras',
  `productos_idproductos` int(11) NOT NULL COMMENT 'id del producto de la tabla productos'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `orden_compras`
--

INSERT INTO `orden_compras` (`id_orden_compras`, `precio_orden`, `productos_idproductos`) VALUES
(56, '2000', 1),
(57, '1000', 1),
(58, '1000', 1),
(59, '1000', 1),
(60, '1000', 1),
(61, '1000', 1),
(62, '1000', 1),
(63, '1000', 1),
(64, '1000', 1),
(65, '22000', 1),
(66, '7550', 13),
(67, '7550', 13),
(68, '5000', 1),
(69, '55', 13),
(70, '250000', 13),
(71, '1000', 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `idpedido` int(11) NOT NULL COMMENT 'codigo de la tabla pedidos ',
  `cantidad_pedido` varchar(200) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'cantidad de pedidos de la tabla pedidos ',
  `fecha_pedido` date NOT NULL COMMENT 'fecha en que se hace el pedido de la tabla pedidos',
  `usuarios_id` int(11) NOT NULL COMMENT 'id de la tabla usuarios',
  `proveedores_idproveedor` int(11) NOT NULL COMMENT 'id del proveedor de la tabla proveedores',
  `orden_compras_id_orden_compras` int(11) NOT NULL COMMENT 'id del orden de compras de la tabla orden compras',
  `producto_pedido` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion_pedido` varchar(45) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`idpedido`, `cantidad_pedido`, `fecha_pedido`, `usuarios_id`, `proveedores_idproveedor`, `orden_compras_id_orden_compras`, `producto_pedido`, `descripcion_pedido`) VALUES
(32, '9866', '2019-08-31', 2, 3, 56, 'borrador', 'descripcionprueba2'),
(33, '50', '2019-09-01', 12, 3, 71, 'plumones', 'plumones 10 colores');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idproductos` int(11) NOT NULL COMMENT 'id de la tabla productos',
  `nombre` varchar(45) NOT NULL COMMENT 'nombre del producto',
  `precio` int(11) NOT NULL COMMENT 'precio del producto',
  `cantidad` int(11) NOT NULL COMMENT 'cantidad del producto',
  `descripcion` varchar(45) NOT NULL COMMENT 'descripcion del producto',
  `fecha` date NOT NULL COMMENT 'fecha del producto',
  `usuarios_id` int(11) NOT NULL COMMENT 'id de la tabla usuarios',
  `proveedores_idproveedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idproductos`, `nombre`, `precio`, `cantidad`, `descripcion`, `fecha`, `usuarios_id`, `proveedores_idproveedor`) VALUES
(1, 'borrador', 500, 10, 'borrador nata pequeño', '2019-08-20', 2, 3),
(3, 'esfero', 500, 12, 'bic negro', '2019-08-20', 2, 3),
(12, 'cuaderno', 2000, 10, 'cuadriculado 20 hojas', '2019-08-21', 2, 3),
(13, 'resma', 2500, 10, 'resma de papel de 500 hojas ', '2019-08-25', 2, 3),
(18, 'tajalapiz', 200, 50, 'tajalapiz metalico', '2019-09-01', 2, 3),
(19, 'plumones', 1000, 50, 'plumones varios colores', '2019-09-01', 2, 3),
(20, 'papel silueta', 200, 100, 'resma de papel silueta varios colores', '2019-09-01', 12, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `idproveedor` int(11) NOT NULL COMMENT 'codigo de la tabla proveedor',
  `Nit_proveedor` varchar(200) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'nit de la tabla proveedor',
  `nombre_proveedor` varchar(200) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'nombre de la tabla proveedor',
  `tlf_proveedor` varchar(200) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'telefono de la tabla proveedor',
  `direc_proveedor` varchar(200) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'direccion de la tabla proveedor',
  `email_proveedor` varchar(200) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'correo de la tabla proveedor',
  `nom_contacto` varchar(200) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'nombre del contacto de la tabla proveedores'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`idproveedor`, `Nit_proveedor`, `nombre_proveedor`, `tlf_proveedor`, `direc_proveedor`, `email_proveedor`, `nom_contacto`) VALUES
(3, '123', 'nombre apellido', 'telefono telefonillo', 'direccion', 'prov@prov.com', 'contacto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idrol` int(11) NOT NULL COMMENT 'id de la tabla rol',
  `Nombre` varchar(45) NOT NULL COMMENT 'nombre del rol '
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idrol`, `Nombre`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL COMMENT 'id de la tabla usuarios',
  `nombre` varchar(200) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'nombre de la tabla usuarios',
  `cedula` varchar(200) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'cedula de la tabla usuarios',
  `cargo` varchar(200) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'cargo de la tabla usuarios',
  `usuario` varchar(200) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'usario o alias de la tabla usuarios',
  `password` varchar(200) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'contraseña 1 para la comprobacion de la tabla usuarios',
  `password2` varchar(200) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'contraseña 2 de la tabla usuarios',
  `pregunta` varchar(200) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'pregunta de seguridad para recuperar el usuario, de la tabla usuarios',
  `respuesta` varchar(200) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'respuesta a la pregunta seguridad para recuperar usuario, de la tabla usuarios',
  `fecha_ingreso` date NOT NULL COMMENT 'fecha ingreso de la tabla usuarios',
  `rol_idrol` int(11) NOT NULL COMMENT 'id rol de la tabla rol, de la tabla usuarios\n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `cedula`, `cargo`, `usuario`, `password`, `password2`, `pregunta`, `respuesta`, `fecha_ingreso`, `rol_idrol`) VALUES
(2, 'carlos', '123', 'admin', 'carlos', '123', '123', 'nombre mascota', 'perro', '2019-07-10', 1),
(12, 'pepa', '2', 'empleada', 'usuario', '123', '123', 'NOMBRE DE MASCOTA', 'cocky', '2019-09-01', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `idventas` int(11) NOT NULL COMMENT 'codigo de la tabla ventas',
  `cantidad` int(11) NOT NULL COMMENT 'cantidades de la tabla ventas',
  `fecha` date NOT NULL COMMENT 'fecha de la tabla ventas',
  `venta_producto` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `venta_precio` int(11) NOT NULL,
  `usuarios_id` int(11) NOT NULL COMMENT 'id de la tabla usuarios',
  `clientes_idclientes` int(11) NOT NULL COMMENT 'id de la tabla clientes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`idventas`, `cantidad`, `fecha`, `venta_producto`, `venta_precio`, `usuarios_id`, `clientes_idclientes`) VALUES
(1, 4, '2019-09-01', 'cuaderno', 1500, 2, 1),
(2, 1, '2019-09-02', 'resma', 5000, 2, 1),
(3, 10, '2019-09-02', 'tajalapiz', 500, 2, 1),
(4, 10, '2019-09-02', 'borrador', 500, 2, 1),
(5, 10, '2019-09-02', 'papel silueta', 2000, 2, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idclientes`);

--
-- Indices de la tabla `orden_compras`
--
ALTER TABLE `orden_compras`
  ADD PRIMARY KEY (`id_orden_compras`),
  ADD KEY `fk_orden_compras_productos1_idx` (`productos_idproductos`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idpedido`),
  ADD KEY `fk_pedidos_usuarios1_idx` (`usuarios_id`),
  ADD KEY `fk_pedidos_proveedores1_idx` (`proveedores_idproveedor`),
  ADD KEY `fk_pedidos_orden_compras1_idx` (`orden_compras_id_orden_compras`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idproductos`),
  ADD KEY `fk_productos_usuarios1_idx` (`usuarios_id`),
  ADD KEY `fk_productos_proveedores1_idx` (`proveedores_idproveedor`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`idproveedor`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idrol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuarios_Rol1_idx` (`rol_idrol`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`idventas`),
  ADD KEY `fk_ventas_usuarios1_idx` (`usuarios_id`),
  ADD KEY `fk_ventas_clientes1_idx` (`clientes_idclientes`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idclientes` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id de la tabla clientes', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `orden_compras`
--
ALTER TABLE `orden_compras`
  MODIFY `id_orden_compras` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id de la orden de compras de la tabla orden compras', AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idpedido` int(11) NOT NULL AUTO_INCREMENT COMMENT 'codigo de la tabla pedidos ', AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idproductos` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id de la tabla productos', AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `idproveedor` int(11) NOT NULL AUTO_INCREMENT COMMENT 'codigo de la tabla proveedor', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id de la tabla usuarios', AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `idventas` int(11) NOT NULL AUTO_INCREMENT COMMENT 'codigo de la tabla ventas', AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `orden_compras`
--
ALTER TABLE `orden_compras`
  ADD CONSTRAINT `fk_orden_compras_productos1` FOREIGN KEY (`productos_idproductos`) REFERENCES `productos` (`idproductos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk_pedidos_orden_compras1` FOREIGN KEY (`orden_compras_id_orden_compras`) REFERENCES `orden_compras` (`id_orden_compras`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pedidos_proveedores1` FOREIGN KEY (`proveedores_idproveedor`) REFERENCES `proveedores` (`idproveedor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pedidos_usuarios1` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_productos_proveedores1` FOREIGN KEY (`proveedores_idproveedor`) REFERENCES `proveedores` (`idproveedor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_productos_usuarios1` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_Rol1` FOREIGN KEY (`rol_idrol`) REFERENCES `rol` (`idrol`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `fk_ventas_clientes1` FOREIGN KEY (`clientes_idclientes`) REFERENCES `clientes` (`idclientes`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ventas_usuarios1` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
