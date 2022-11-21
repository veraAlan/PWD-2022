-- phpMyAdmin SQL Dump

-- version 4.8.2

-- https://www.phpmyadmin.net/

--

-- Servidor: localhost

-- Tiempo de generación: 15-10-2018 a las 23:12:45

-- Versión del servidor: 10.1.34-MariaDB

-- Versión de PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

SET AUTOCOMMIT = 0;

START TRANSACTION;

SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */

;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */

;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */

;

/*!40101 SET NAMES utf8mb4 */

;

--

-- Base de datos: `bdcarritocompras`

--

DROP DATABASE IF EXISTS bdcarritocompras;

CREATE DATABASE bdcarritocompras;

USE bdcarritocompras;

-- --------------------------------------------------------

--

-- Estructura de tabla para la tabla `compra`

--

CREATE TABLE
    `compra` (
        `idcompra` bigint(20) NOT NULL,
        `cofecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        `idusuario` bigint(20) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = latin1;

-- --------------------------------------------------------

--

-- Estructura de tabla para la tabla `compraestado`

--

CREATE TABLE
    `compraestado` (
        `idcompraestado` bigint(20) UNSIGNED NOT NULL,
        `idcompra` bigint(11) NOT NULL,
        `idcompraestadotipo` int NOT NULL,
        `cefechaini` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `cefechafin` timestamp NULL DEFAULT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = latin1;

-- --------------------------------------------------------

--

-- Estructura de tabla para la tabla `compraestadotipo`

--

CREATE TABLE
    `compraestadotipo` (
        `idcompraestadotipo` int NOT NULL,
        `cetdescripcion` varchar(50) NOT NULL,
        `cetdetalle` varchar(256) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = latin1;

--

-- Volcado de datos para la tabla `compraestadotipo`

--

INSERT INTO
    `compraestadotipo` (
        `idcompraestadotipo`,
        `cetdescripcion`,
        `cetdetalle`
    )
VALUES (
        1,
        'iniciada',
        'cuando el usuario : cliente inicia la compra de uno o mas productos del carrito'
    ), (
        2,
        'aceptada',
        'cuando el usuario administrador da ingreso a uno de las compras en estado = 1 '
    ), (
        3,
        'enviada',
        'cuando el usuario administrador envia a uno de las compras en estado =2 '
    ), (
        4,
        'cancelada',
        'un usuario administrador podra cancelar una compra en cualquier estado y un usuario cliente solo en estado=1 '
    );

-- --------------------------------------------------------

--

-- Estructura de tabla para la tabla `compraitem`

--

CREATE TABLE
    `compraitem` (
        `idcompraitem` bigint(20) UNSIGNED NOT NULL,
        `idproducto` bigint(20) NOT NULL,
        `idcompra` bigint(20) NOT NULL,
        `cicantidad` int NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = latin1;

-- --------------------------------------------------------

--

-- Estructura de tabla para la tabla `menu`

--

CREATE TABLE
    `menu` (
        `idmenu` bigint(20) NOT NULL,
        `menombre` varchar(50) NOT NULL COMMENT 'Nombre del item del menu',
        `medescripcion` varchar(124) NOT NULL COMMENT 'Descripcion mas detallada del item del menu',
        `idpadre` bigint(20) DEFAULT NULL COMMENT 'Referencia al id del menu que es subitem',
        `medeshabilitado` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha en la que el menu fue deshabilitado por ultima vez'
    ) ENGINE = InnoDB DEFAULT CHARSET = latin1;

-- --------------------------------------------------------

--

-- Estructura de tabla para la tabla `menurol`

--

CREATE TABLE
    `menurol` (
        `idmenu` bigint(20) NOT NULL,
        `idrol` bigint(20) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = latin1;

-- --------------------------------------------------------

--

-- Estructura de tabla para la tabla `producto`

--

CREATE TABLE
    `producto` (
        `idproducto` bigint NOT NULL,
        `pronombre` varchar(35) NOT NULL,
        `prodetalle` varchar(512) NOT NULL,
        `procantstock` int NOT NULL,
        `proprecio` int NOT NULL,
        `urlimage` varchar(50) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = latin1;

-- --------------------------------------------------------

--

-- Estructura de tabla para la tabla `rol`

--

CREATE TABLE
    `rol` (
        `idrol` bigint(20) NOT NULL,
        `rodescripcion` varchar(50) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = latin1;

-- --------------------------------------------------------

--

-- Estructura de tabla para la tabla `usuario`

--

CREATE TABLE
    `usuario` (
        `idusuario` bigint(20) NOT NULL,
        `usnombre` varchar(50) NOT NULL,
        `uspass` varchar(150) NOT NULL,
        `usmail` varchar(50) NOT NULL,
        `usdeshabilitado` timestamp NULL DEFAULT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = latin1;

-- --------------------------------------------------------

--

-- Estructura de tabla para la tabla `usuariorol`

--

CREATE TABLE
    `usuariorol` (
        `idusuario` bigint(20) NOT NULL,
        `idrol` bigint(20) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = latin1;

--

-- Índices para tablas volcadas

--

--

-- Indices de la tabla `compra`

--

ALTER TABLE `compra`
ADD PRIMARY KEY (`idcompra`),
ADD
    UNIQUE KEY `idcompra` (`idcompra`),
ADD
    KEY `fkcompra_1` (`idusuario`);

--

-- Indices de la tabla `compraestado`

--

ALTER TABLE `compraestado`
ADD
    PRIMARY KEY (`idcompraestado`),
ADD
    UNIQUE KEY `idcompraestado` (`idcompraestado`),
ADD
    KEY `fkcompraestado_1` (`idcompra`),
ADD
    KEY `fkcompraestado_2` (`idcompraestadotipo`);

--

-- Indices de la tabla `compraestadotipo`

--

ALTER TABLE `compraestadotipo`
ADD
    PRIMARY KEY (`idcompraestadotipo`);

--

-- Indices de la tabla `compraitem`

--

ALTER TABLE `compraitem`
ADD
    PRIMARY KEY (`idcompraitem`),
ADD
    UNIQUE KEY `idcompraitem` (`idcompraitem`),
ADD
    KEY `fkcompraitem_1` (`idcompra`),
ADD
    KEY `fkcompraitem_2` (`idproducto`);

--

-- Indices de la tabla `menu`

--

ALTER TABLE `menu`
ADD PRIMARY KEY (`idmenu`),
ADD
    UNIQUE KEY `idmenu` (`idmenu`),
ADD KEY `fkmenu_1` (`idpadre`);

--

-- Indices de la tabla `menurol`

--

ALTER TABLE `menurol`
ADD
    PRIMARY KEY (`idmenu`, `idrol`),
ADD KEY `fkmenurol_2` (`idrol`);

--

-- Indices de la tabla `producto`

--

ALTER TABLE `producto`
ADD
    PRIMARY KEY (`idproducto`),
ADD
    UNIQUE KEY `idproducto` (`idproducto`);

--

-- Indices de la tabla `rol`

--

ALTER TABLE `rol`
ADD PRIMARY KEY (`idrol`),
ADD UNIQUE KEY `idrol` (`idrol`);

--

-- Indices de la tabla `usuario`

--

ALTER TABLE `usuario`
ADD PRIMARY KEY (`idusuario`),
ADD
    UNIQUE KEY `idusuario` (`idusuario`);

--

-- Indices de la tabla `usuariorol`

--

ALTER TABLE `usuariorol`
ADD
    PRIMARY KEY (`idusuario`, `idrol`),
ADD
    KEY `idusuario` (`idusuario`),
ADD KEY `idrol` (`idrol`);

--

-- AUTO_INCREMENT de las tablas volcadas

--

--

-- AUTO_INCREMENT de la tabla `compra`

--

ALTER TABLE
    `compra` MODIFY `idcompra` bigint(20) NOT NULL AUTO_INCREMENT;

--

-- AUTO_INCREMENT de la tabla `compraestado`

--

ALTER TABLE
    `compraestado` MODIFY `idcompraestado` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--

-- AUTO_INCREMENT de la tabla `compraitem`

--

ALTER TABLE
    `compraitem` MODIFY `idcompraitem` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--

-- AUTO_INCREMENT de la tabla `menu`

--

ALTER TABLE
    `menu` MODIFY `idmenu` bigint(20) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 12;

--

-- AUTO_INCREMENT de la tabla `producto`

--

ALTER TABLE
    `producto` MODIFY `idproducto` bigint(20) NOT NULL AUTO_INCREMENT;

--

-- AUTO_INCREMENT de la tabla `rol`

--

ALTER TABLE
    `rol` MODIFY `idrol` bigint(20) NOT NULL AUTO_INCREMENT;

--

-- AUTO_INCREMENT de la tabla `usuario`

--

ALTER TABLE
    `usuario` MODIFY `idusuario` bigint(20) NOT NULL AUTO_INCREMENT;

--

-- Restricciones para tablas volcadas

--

--

-- Filtros para la tabla `compra`

--

ALTER TABLE `compra`
ADD
    CONSTRAINT `fkcompra_1` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON UPDATE CASCADE;

--

-- Filtros para la tabla `compraestado`

--

ALTER TABLE `compraestado`
ADD
    CONSTRAINT `fkcompraestado_1` FOREIGN KEY (`idcompra`) REFERENCES `compra` (`idcompra`) ON UPDATE CASCADE,
ADD
    CONSTRAINT `fkcompraestado_2` FOREIGN KEY (`idcompraestadotipo`) REFERENCES `compraestadotipo` (`idcompraestadotipo`) ON UPDATE CASCADE;

--

-- Filtros para la tabla `compraitem`

--

ALTER TABLE `compraitem`
ADD
    CONSTRAINT `fkcompraitem_1` FOREIGN KEY (`idcompra`) REFERENCES `compra` (`idcompra`) ON UPDATE CASCADE,
ADD
    CONSTRAINT `fkcompraitem_2` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`idproducto`) ON UPDATE CASCADE;

--

-- Filtros para la tabla `menu`

--

ALTER TABLE `menu`
ADD
    CONSTRAINT `fkmenu_1` FOREIGN KEY (`idpadre`) REFERENCES `menu` (`idmenu`) ON UPDATE CASCADE;

--

-- Filtros para la tabla `menurol`

--

ALTER TABLE `menurol`
ADD
    CONSTRAINT `fkmenurol_1` FOREIGN KEY (`idmenu`) REFERENCES `menu` (`idmenu`) ON UPDATE CASCADE,
ADD
    CONSTRAINT `fkmenurol_2` FOREIGN KEY (`idrol`) REFERENCES `rol` (`idrol`) ON UPDATE CASCADE;

--

-- Filtros para la tabla `usuariorol`

--

ALTER TABLE `usuariorol`
ADD
    CONSTRAINT `fkmovimiento_1` FOREIGN KEY (`idrol`) REFERENCES `rol` (`idrol`) ON UPDATE CASCADE,
ADD
    CONSTRAINT `usuariorol_ibfk_2` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */

;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */

;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */

;

--

-- TABLE DATA DUMP

--

INSERT INTO
    rol(idrol, rodescripcion)
VALUES (1, "User"), (2, "Deposito"), (3, "Admin");

INSERT INTO
    usuario(
        idusuario,
        usnombre,
        uspass,
        usmail,
        usdeshabilitado
    )
VALUES (
        1,
        "admin",
        "0192023a7bbd73250516f069df18b500",
        "admin@admin.com",
        null
    ), (
        2,
        "usuario",
        "6ad14ba9986e3615423dfca256d04e3f",
        "user@user.com",
        null
    ), (
        3,
        "deposito",
        "35aa7e6d6f726e081faf3a9bb7564831",
        "depo@depo.com",
        null
    ), (
        4,
        "Modificable",
        "e99a18c428cb38d5f260853678922e03",
        "modificable@error.com",
        null
    ), (
        5,
        "Superuser",
        "0192023a7bbd73250516f069df18b500",
        "superuser@su.com",
        null
    );

INSERT INTO
    usuariorol(idusuario, idrol)
VALUES (1, 3), (2, 1), (3, 2), (4, 1), (5, 1), (5, 2), (5, 3);

INSERT INTO
    menu (
        idmenu,
        menombre,
        medescripcion,
        idpadre,
        medeshabilitado
    )
VALUES (
        1,
        'menuevo',
        'Header principal',
        NULL,
        NULL
    ), (
        2,
        'meusuario',
        'Header de usuario con cuenta',
        1,
        NULL
    ), (
        3,
        'medeposito',
        'Header de deposito/vendedor',
        1,
        NULL
    ), (
        4,
        'meadmin',
        'Header de administrador',
        1,
        NULL
    );

INSERT INTO menurol(idmenu, idrol) VALUES (2, 1), (3, 2), (4, 3);

INSERT INTO
    producto (
        idproducto,
        pronombre,
        prodetalle,
        procantstock,
        proprecio,
        urlimage
    )
VALUES (
        342,
        "Plants Vs Zombies GOTY",
        "Zombies are invading your home, and the only defense is your arsenal of plants! Armed with an alien nursery-worth of zombie-zapping plants like peashooters and cherry bombs, you'll need to think fast and plant faster to stop dozens of types of zombies dead in their tracks.",
        50,
        67,
        "../Img/pvz.jpg"
    ), (
        343,
        "Crysis 3 Remaster",
        "Experience the single-player experience from the iconic first-person shooter, Crysis 3, optimized to take advantage of today's hardware in Crysis 3 Remastered.",
        160,
        750,
        "../Img/crysis3.jpg"
    ), (
        344,
        "Farming Simulator 22",
        "Create your farm and let the good times grow! Harvest crops, tend to animals, manage productions, and take on seasonal challenges.",
        22,
        2499,
        "../Img/farm22.jpg"
    ), (
        345,
        "Persona 5 Royal",
        "Don the mask and join the Phantom Thieves of Hearts as they stage grand heists, infiltrate the minds of the corrupt, and make them change their ways!",
        90,
        3899,
        "../Img/persona5.jpg"
    ), (
        346,
        "DOOM Eternal",
        "Hell’s armies have invaded Earth. Become the Slayer in an epic single-player campaign to conquer demons across dimensions and stop the final destruction of humanity.",
        666,
        1999,
        "../Img/doometernal.jpg"
    ), (
        666,
        "UTRAKILL",
        "ULTRAKILL is a fast-paced ultraviolent retro FPS combining the skill-based style scoring from character action games with unadulterated carnage inspired by the best shooters of the '90s.",
        420,
        299,
        "../Img/ultrakill.jpg"
    ), (
        347,
        "Euro Truck Simulator 2",
        "Travel across Europe as king of the road, a trucker who delivers important cargo across impressive distances! With dozens of cities to explore, your endurance, skill and speed will all be pushed to their limits.",
        45,
        274,
        "../Img/eurotruck2.jpg"
    ), (
        999,
        "Producto de prueba",
        "Prueba descripcion",
        999,
        999,
        "../Img/empty.jpg"
    );

COMMIT;