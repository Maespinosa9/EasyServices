-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-08-2016 a las 01:04:27
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 5.5.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `easy_services`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivo_cliente`
--

CREATE TABLE `archivo_cliente` (
  `ID_ARCHIVO` int(11) NOT NULL,
  `RUTA_ARCHIVO` varchar(255) NOT NULL,
  `DOC_CLIENTE` int(11) NOT NULL,
  `DOC_EMPLEADO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `DOC_CLIENTE` int(11) NOT NULL,
  `NOMBRES` varchar(100) NOT NULL,
  `APELLIDOS` varchar(100) NOT NULL,
  `CIUDAD_ID` int(11) NOT NULL,
  `BARRIO` varchar(50) DEFAULT NULL,
  `DIRECCION` varchar(100) NOT NULL,
  `TELEFONO` varchar(20) DEFAULT NULL,
  `CELULAR` varchar(20) DEFAULT NULL,
  `TIPO_VIVIENDA` int(11) NOT NULL,
  `CANT_ADULTOS` int(11) DEFAULT NULL,
  `CANT_NIÑOS` int(11) DEFAULT NULL,
  `CANT_TER_EDAD` int(11) DEFAULT NULL,
  `EDAD_NIÑOS` varchar(20) DEFAULT NULL,
  `OFERTA_SALARIO` varchar(50) DEFAULT NULL,
  `DIAS_DESCANSO` varchar(50) DEFAULT NULL,
  `MASCOTAS` tinyint(4) DEFAULT NULL,
  `HORARIO` varchar(50) DEFAULT NULL,
  `CORREO_PERSONAL` varchar(50) DEFAULT NULL,
  `CORREO_CORPORATIVO` varchar(50) DEFAULT NULL,
  `REQUERIMIENTO` int(11) NOT NULL,
  `EMPRESA_CONTRATANTE` varchar(100) DEFAULT NULL,
  `HARCK_OBSERVACIONES` varchar(1000) DEFAULT NULL,
  `OBSERVACIONES` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `DOC_EMPLEADO` int(11) NOT NULL,
  `NOMBRES` varchar(100) NOT NULL,
  `APELLIDOS` varchar(100) NOT NULL,
  `DIRECCION` varchar(100) DEFAULT NULL,
  `CELULAR` varchar(20) DEFAULT NULL,
  `TELEFONO` varchar(20) DEFAULT NULL,
  `CIUDAD_ID` int(11) NOT NULL,
  `FECHA_NACIMIENTO` datetime DEFAULT NULL,
  `EDAD` int(11) DEFAULT NULL,
  `E_MAIL` varchar(100) DEFAULT NULL,
  `ESTADO_CIVIL` int(11) DEFAULT NULL,
  `CANT_HIJOS` int(11) DEFAULT NULL,
  `NIVEL_ACADEMICO` int(11) NOT NULL,
  `TIPO_EMPLEADO` int(11) NOT NULL,
  `RUTA_FOTO` varchar(255) DEFAULT NULL,
  `HUELLA` varchar(1000) DEFAULT NULL,
  `ESTADO` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuesta`
--

CREATE TABLE `encuesta` (
  `ID_ENCUESTA` int(11) NOT NULL,
  `DESCRIPCION` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habilidad_empleado`
--

CREATE TABLE `habilidad_empleado` (
  `DOC_EMPLEADO` int(11) NOT NULL,
  `HABILIDAD_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

CREATE TABLE `modulo` (
  `ID_MODULO` int(11) NOT NULL,
  `NOMBRE` varchar(100) NOT NULL,
  `FECHA_CREACION` datetime DEFAULT NULL,
  `ACTIVO` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo_perfil`
--

CREATE TABLE `modulo_perfil` (
  `ID_PERFIL` int(11) NOT NULL,
  `ID_MODULO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametro`
--

CREATE TABLE `parametro` (
  `ID_PARAMETRO` int(11) NOT NULL,
  `DESCRIPCION` varchar(100) DEFAULT NULL,
  `ACTIVO` tinyint(4) DEFAULT NULL,
  `FECHA_CREACION` datetime DEFAULT NULL,
  `FECHA_MODIFICACION` datetime DEFAULT NULL,
  `PERSONA_CREACION` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `ID_PERFIL` int(11) NOT NULL,
  `NOMBRE` varchar(100) NOT NULL,
  `DESCRIPCION` varchar(100) DEFAULT NULL,
  `FECHA_CREACION` datetime DEFAULT NULL,
  `ACTIVO` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preferencia_ocupacional`
--

CREATE TABLE `preferencia_ocupacional` (
  `DOC_EMPLEADO` int(11) NOT NULL,
  `PREF_OCU_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

CREATE TABLE `pregunta` (
  `ID_PREGUNTA` int(11) NOT NULL,
  `ID_ENCUESTA` int(11) NOT NULL,
  `DESCRIPCION` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `referencia_empleado`
--

CREATE TABLE `referencia_empleado` (
  `ID_REFERENCIA` int(11) NOT NULL,
  `DOC_EMPLEADO` int(11) NOT NULL,
  `NOMBRES_REF` varchar(100) NOT NULL,
  `APELLIDOS_REF` varchar(100) NOT NULL,
  `PARENTESCO` int(11) NOT NULL,
  `DIRECCION` varchar(100) DEFAULT NULL,
  `TELEFONO` varchar(20) DEFAULT NULL,
  `TIPO_REFERENCIA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `remision`
--

CREATE TABLE `remision` (
  `NRO_REMISION` int(11) NOT NULL,
  `DOC_CLIENTE` int(11) NOT NULL,
  `FECHA_REMISION` datetime NOT NULL,
  `FORMA_PAGO` int(11) NOT NULL,
  `VALOR_TOTAL` decimal(15,2) DEFAULT NULL,
  `VALOR_REMISIONADO` decimal(15,2) DEFAULT NULL,
  `TIPO_REMISION` int(11) NOT NULL,
  `FECHA_CREACION` datetime DEFAULT NULL,
  `PERSONA_CREACION` varchar(100) DEFAULT NULL,
  `DOC_EMPLEADO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `remision_detalle`
--

CREATE TABLE `remision_detalle` (
  `ID_REMISION_DET` int(11) NOT NULL,
  `NRO_REMISION` int(11) NOT NULL,
  `DESCRIPCION` varchar(255) DEFAULT NULL,
  `CANTIDAD` int(11) DEFAULT NULL,
  `VALOR_UNITARIO` decimal(15,2) DEFAULT NULL,
  `VALOR_TOTAL` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta_remision`
--

CREATE TABLE `respuesta_remision` (
  `ID_RESPUESTA` int(11) NOT NULL,
  `ID_PREGUNTA` int(11) NOT NULL,
  `NRO_REMISION` int(11) NOT NULL,
  `DESCRIPCION` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion`
--

CREATE TABLE `ubicacion` (
  `ID_UBICACION` int(11) NOT NULL,
  `NOM_UBICACION` varchar(100) DEFAULT NULL,
  `TIPO_LOCALIZACION` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `DOCUMENTO` int(11) NOT NULL,
  `NOMBRES` varchar(100) NOT NULL,
  `APELLIDOS` varchar(100) NOT NULL,
  `E_MAIL` varchar(100) DEFAULT NULL,
  `TELEFONO` varchar(30) DEFAULT NULL,
  `LOGIN` varchar(30) NOT NULL,
  `PASS` varchar(30) NOT NULL,
  `ID_PERFIL` int(11) NOT NULL,
  `FECHA_CREACION` datetime DEFAULT NULL,
  `ACTIVO` tinyint(4) DEFAULT NULL,
  `PERSONA_CREACION` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valor`
--

CREATE TABLE `valor` (
  `ID_VALOR` int(11) NOT NULL,
  `ID_PARAMETRO` int(11) NOT NULL,
  `DESCRIPCION` varchar(255) DEFAULT NULL,
  `ACTIVO` tinyint(4) DEFAULT NULL,
  `FECHA_CREACION` datetime DEFAULT NULL,
  `FECHA_MODIFICACION` datetime DEFAULT NULL,
  `PERSONA_CREACION` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivo_cliente`
--
ALTER TABLE `archivo_cliente`
  ADD PRIMARY KEY (`ID_ARCHIVO`),
  ADD KEY `DOC_CLIENTE` (`DOC_CLIENTE`),
  ADD KEY `DOC_EMPLEADO` (`DOC_EMPLEADO`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`DOC_CLIENTE`),
  ADD KEY `CIUDAD_ID` (`CIUDAD_ID`),
  ADD KEY `TIPO_VIVIENDA` (`TIPO_VIVIENDA`),
  ADD KEY `REQUERIMIENTO` (`REQUERIMIENTO`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`DOC_EMPLEADO`),
  ADD KEY `CIUDAD_ID` (`CIUDAD_ID`),
  ADD KEY `ESTADO_CIVIL` (`ESTADO_CIVIL`),
  ADD KEY `NIVEL_ACADEMICO` (`NIVEL_ACADEMICO`),
  ADD KEY `TIPO_EMPLEADO` (`TIPO_EMPLEADO`);

--
-- Indices de la tabla `encuesta`
--
ALTER TABLE `encuesta`
  ADD PRIMARY KEY (`ID_ENCUESTA`);

--
-- Indices de la tabla `habilidad_empleado`
--
ALTER TABLE `habilidad_empleado`
  ADD PRIMARY KEY (`DOC_EMPLEADO`,`HABILIDAD_ID`),
  ADD KEY `HABILIDAD_ID` (`HABILIDAD_ID`);

--
-- Indices de la tabla `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`ID_MODULO`);

--
-- Indices de la tabla `modulo_perfil`
--
ALTER TABLE `modulo_perfil`
  ADD KEY `ID_PERFIL` (`ID_PERFIL`),
  ADD KEY `ID_MODULO` (`ID_MODULO`);

--
-- Indices de la tabla `parametro`
--
ALTER TABLE `parametro`
  ADD PRIMARY KEY (`ID_PARAMETRO`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`ID_PERFIL`);

--
-- Indices de la tabla `preferencia_ocupacional`
--
ALTER TABLE `preferencia_ocupacional`
  ADD PRIMARY KEY (`DOC_EMPLEADO`,`PREF_OCU_ID`),
  ADD KEY `PREF_OCU_ID` (`PREF_OCU_ID`);

--
-- Indices de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD PRIMARY KEY (`ID_PREGUNTA`),
  ADD KEY `ID_ENCUESTA` (`ID_ENCUESTA`);

--
-- Indices de la tabla `referencia_empleado`
--
ALTER TABLE `referencia_empleado`
  ADD PRIMARY KEY (`ID_REFERENCIA`),
  ADD KEY `DOC_EMPLEADO` (`DOC_EMPLEADO`),
  ADD KEY `PARENTESCO` (`PARENTESCO`),
  ADD KEY `TIPO_REFERENCIA` (`TIPO_REFERENCIA`);

--
-- Indices de la tabla `remision`
--
ALTER TABLE `remision`
  ADD PRIMARY KEY (`NRO_REMISION`),
  ADD KEY `DOC_CLIENTE` (`DOC_CLIENTE`),
  ADD KEY `FORMA_PAGO` (`FORMA_PAGO`),
  ADD KEY `TIPO_REMISION` (`TIPO_REMISION`),
  ADD KEY `DOC_EMPLEADO` (`DOC_EMPLEADO`);

--
-- Indices de la tabla `remision_detalle`
--
ALTER TABLE `remision_detalle`
  ADD PRIMARY KEY (`ID_REMISION_DET`),
  ADD KEY `NRO_REMISION` (`NRO_REMISION`);

--
-- Indices de la tabla `respuesta_remision`
--
ALTER TABLE `respuesta_remision`
  ADD PRIMARY KEY (`ID_RESPUESTA`),
  ADD KEY `ID_PREGUNTA` (`ID_PREGUNTA`),
  ADD KEY `NRO_REMISION` (`NRO_REMISION`);

--
-- Indices de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  ADD PRIMARY KEY (`ID_UBICACION`),
  ADD KEY `TIPO_LOCALIZACION` (`TIPO_LOCALIZACION`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`DOCUMENTO`),
  ADD KEY `ID_PERFIL` (`ID_PERFIL`);

--
-- Indices de la tabla `valor`
--
ALTER TABLE `valor`
  ADD PRIMARY KEY (`ID_VALOR`),
  ADD KEY `ID_PARAMETRO` (`ID_PARAMETRO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivo_cliente`
--
ALTER TABLE `archivo_cliente`
  MODIFY `ID_ARCHIVO` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `encuesta`
--
ALTER TABLE `encuesta`
  MODIFY `ID_ENCUESTA` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `modulo`
--
ALTER TABLE `modulo`
  MODIFY `ID_MODULO` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `parametro`
--
ALTER TABLE `parametro`
  MODIFY `ID_PARAMETRO` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `ID_PERFIL` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  MODIFY `ID_PREGUNTA` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `referencia_empleado`
--
ALTER TABLE `referencia_empleado`
  MODIFY `ID_REFERENCIA` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `remision`
--
ALTER TABLE `remision`
  MODIFY `NRO_REMISION` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `remision_detalle`
--
ALTER TABLE `remision_detalle`
  MODIFY `ID_REMISION_DET` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `respuesta_remision`
--
ALTER TABLE `respuesta_remision`
  MODIFY `ID_RESPUESTA` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  MODIFY `ID_UBICACION` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `valor`
--
ALTER TABLE `valor`
  MODIFY `ID_VALOR` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `archivo_cliente`
--
ALTER TABLE `archivo_cliente`
  ADD CONSTRAINT `archivo_cliente_ibfk_1` FOREIGN KEY (`DOC_CLIENTE`) REFERENCES `cliente` (`DOC_CLIENTE`),
  ADD CONSTRAINT `archivo_cliente_ibfk_2` FOREIGN KEY (`DOC_EMPLEADO`) REFERENCES `empleado` (`DOC_EMPLEADO`);

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`CIUDAD_ID`) REFERENCES `ubicacion` (`ID_UBICACION`),
  ADD CONSTRAINT `cliente_ibfk_2` FOREIGN KEY (`TIPO_VIVIENDA`) REFERENCES `valor` (`ID_VALOR`),
  ADD CONSTRAINT `cliente_ibfk_3` FOREIGN KEY (`REQUERIMIENTO`) REFERENCES `valor` (`ID_VALOR`);

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`CIUDAD_ID`) REFERENCES `ubicacion` (`ID_UBICACION`),
  ADD CONSTRAINT `empleado_ibfk_2` FOREIGN KEY (`ESTADO_CIVIL`) REFERENCES `valor` (`ID_VALOR`),
  ADD CONSTRAINT `empleado_ibfk_3` FOREIGN KEY (`NIVEL_ACADEMICO`) REFERENCES `valor` (`ID_VALOR`),
  ADD CONSTRAINT `empleado_ibfk_4` FOREIGN KEY (`TIPO_EMPLEADO`) REFERENCES `valor` (`ID_VALOR`);

--
-- Filtros para la tabla `habilidad_empleado`
--
ALTER TABLE `habilidad_empleado`
  ADD CONSTRAINT `habilidad_empleado_ibfk_1` FOREIGN KEY (`DOC_EMPLEADO`) REFERENCES `empleado` (`DOC_EMPLEADO`),
  ADD CONSTRAINT `habilidad_empleado_ibfk_2` FOREIGN KEY (`HABILIDAD_ID`) REFERENCES `valor` (`ID_VALOR`);

--
-- Filtros para la tabla `modulo_perfil`
--
ALTER TABLE `modulo_perfil`
  ADD CONSTRAINT `modulo_perfil_ibfk_1` FOREIGN KEY (`ID_PERFIL`) REFERENCES `perfil` (`ID_PERFIL`),
  ADD CONSTRAINT `modulo_perfil_ibfk_2` FOREIGN KEY (`ID_MODULO`) REFERENCES `modulo` (`ID_MODULO`);

--
-- Filtros para la tabla `preferencia_ocupacional`
--
ALTER TABLE `preferencia_ocupacional`
  ADD CONSTRAINT `preferencia_ocupacional_ibfk_1` FOREIGN KEY (`DOC_EMPLEADO`) REFERENCES `empleado` (`DOC_EMPLEADO`),
  ADD CONSTRAINT `preferencia_ocupacional_ibfk_2` FOREIGN KEY (`PREF_OCU_ID`) REFERENCES `valor` (`ID_VALOR`);

--
-- Filtros para la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD CONSTRAINT `pregunta_ibfk_1` FOREIGN KEY (`ID_ENCUESTA`) REFERENCES `encuesta` (`ID_ENCUESTA`);

--
-- Filtros para la tabla `referencia_empleado`
--
ALTER TABLE `referencia_empleado`
  ADD CONSTRAINT `referencia_empleado_ibfk_1` FOREIGN KEY (`DOC_EMPLEADO`) REFERENCES `empleado` (`DOC_EMPLEADO`),
  ADD CONSTRAINT `referencia_empleado_ibfk_2` FOREIGN KEY (`PARENTESCO`) REFERENCES `valor` (`ID_VALOR`),
  ADD CONSTRAINT `referencia_empleado_ibfk_3` FOREIGN KEY (`TIPO_REFERENCIA`) REFERENCES `valor` (`ID_VALOR`);

--
-- Filtros para la tabla `remision`
--
ALTER TABLE `remision`
  ADD CONSTRAINT `remision_ibfk_1` FOREIGN KEY (`DOC_CLIENTE`) REFERENCES `cliente` (`DOC_CLIENTE`),
  ADD CONSTRAINT `remision_ibfk_2` FOREIGN KEY (`FORMA_PAGO`) REFERENCES `valor` (`ID_VALOR`),
  ADD CONSTRAINT `remision_ibfk_3` FOREIGN KEY (`TIPO_REMISION`) REFERENCES `valor` (`ID_VALOR`),
  ADD CONSTRAINT `remision_ibfk_4` FOREIGN KEY (`DOC_EMPLEADO`) REFERENCES `empleado` (`DOC_EMPLEADO`);

--
-- Filtros para la tabla `remision_detalle`
--
ALTER TABLE `remision_detalle`
  ADD CONSTRAINT `remision_detalle_ibfk_1` FOREIGN KEY (`NRO_REMISION`) REFERENCES `remision` (`NRO_REMISION`);

--
-- Filtros para la tabla `respuesta_remision`
--
ALTER TABLE `respuesta_remision`
  ADD CONSTRAINT `respuesta_remision_ibfk_1` FOREIGN KEY (`ID_PREGUNTA`) REFERENCES `pregunta` (`ID_PREGUNTA`),
  ADD CONSTRAINT `respuesta_remision_ibfk_2` FOREIGN KEY (`NRO_REMISION`) REFERENCES `remision` (`NRO_REMISION`);

--
-- Filtros para la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  ADD CONSTRAINT `ubicacion_ibfk_1` FOREIGN KEY (`TIPO_LOCALIZACION`) REFERENCES `valor` (`ID_VALOR`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`ID_PERFIL`) REFERENCES `perfil` (`ID_PERFIL`);

--
-- Filtros para la tabla `valor`
--
ALTER TABLE `valor`
  ADD CONSTRAINT `valor_ibfk_1` FOREIGN KEY (`ID_PARAMETRO`) REFERENCES `parametro` (`ID_PARAMETRO`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
