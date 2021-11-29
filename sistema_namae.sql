-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-11-2021 a las 19:55:23
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema_namae`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `IDEmpleado` int(10) UNSIGNED NOT NULL,
  `Nombres` varchar(45) NOT NULL,
  `Apellidos` varchar(45) NOT NULL,
  `FechaNacimiento` date NOT NULL,
  `Sexo` varchar(10) NOT NULL,
  `Telefono` varchar(9) NOT NULL,
  `DUI` varchar(10) NOT NULL,
  `NIT` varchar(17) NOT NULL,
  `Titulo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`IDEmpleado`, `Nombres`, `Apellidos`, `FechaNacimiento`, `Sexo`, `Telefono`, `DUI`, `NIT`, `Titulo`) VALUES
(1, 'Edenilson Vladimir', 'Garcia Vasquez', '1999-01-12', 'Masculino', '7648-9546', '06906180-9', '120-120199-121-1', 'Bachiller'),
(21, 'Miguel Ángel ', 'García Mendez', '1999-12-23', 'Masculino', '7648-9546', '05906180-9', '1234-123456-123-1', 'Bachiller'),
(48, 'Ana María', 'Pérez Mirón ', '2000-06-02', 'Femenino', '7802-2121', '123456789-', '1234-123456-123-2', 'Ingeniera en sistemas computacionales'),
(49, 'Nancy Jamileth ', 'Pinzón Rivas', '1999-02-09', 'Femenino', '7821-2121', '12345678-2', '1234-123456-123-3', 'Bachiller');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `IDEstudiante` int(10) UNSIGNED NOT NULL,
  `Nombres` varchar(45) NOT NULL,
  `Apellidos` varchar(45) NOT NULL,
  `Direccion` varchar(45) NOT NULL,
  `FechaNacimiento` date NOT NULL,
  `Sexo` varchar(10) NOT NULL,
  `NIE` varchar(10) NOT NULL,
  `IDResponsable` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`IDEstudiante`, `Nombres`, `Apellidos`, `Direccion`, `FechaNacimiento`, `Sexo`, `NIE`, `IDResponsable`) VALUES
(16, 'Sonia Yamileth ', 'Pérez Santos', 'Ahuachapán ', '1999-03-21', 'Femenino', '1234567890', 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grados`
--

CREATE TABLE `grados` (
  `IDGrado` int(10) UNSIGNED NOT NULL,
  `Descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `grados`
--

INSERT INTO `grados` (`IDGrado`, `Descripcion`) VALUES
(11, 'Primer Grado'),
(12, 'Segundo Grado'),
(13, 'Tercer Grado'),
(14, 'Cuarto Grado'),
(15, 'Quinto Grado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grados_materias`
--

CREATE TABLE `grados_materias` (
  `IDGrado_Materia` int(10) UNSIGNED NOT NULL,
  `IDGrado` int(10) UNSIGNED NOT NULL,
  `IDMateria` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestros`
--

CREATE TABLE `maestros` (
  `IDMaestro` int(10) UNSIGNED NOT NULL,
  `IDEmpleado` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `maestros`
--

INSERT INTO `maestros` (`IDMaestro`, `IDEmpleado`) VALUES
(5, 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestros_secciones`
--

CREATE TABLE `maestros_secciones` (
  `IDMaestro_Seccion` int(10) UNSIGNED NOT NULL,
  `IDMaestro` int(10) UNSIGNED NOT NULL,
  `IDSeccion` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `maestros_secciones`
--

INSERT INTO `maestros_secciones` (`IDMaestro_Seccion`, `IDMaestro`, `IDSeccion`) VALUES
(4, 5, 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `IDMateria` int(10) UNSIGNED NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`IDMateria`, `Nombre`, `Descripcion`) VALUES
(7, 'Lenguaje', 'Literatura');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matriculas`
--

CREATE TABLE `matriculas` (
  `IDMatricula` int(10) UNSIGNED NOT NULL,
  `IDEstudiante` int(10) UNSIGNED NOT NULL,
  `IDGrado` int(10) UNSIGNED NOT NULL,
  `IDSeccion` int(10) UNSIGNED NOT NULL,
  `FechaMatricula` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `matriculas`
--

INSERT INTO `matriculas` (`IDMatricula`, `IDEstudiante`, `IDGrado`, `IDSeccion`, `FechaMatricula`) VALUES
(13, 16, 11, 16, '2021-11-29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `IDNota` int(10) UNSIGNED NOT NULL,
  `Nota` decimal(4,1) UNSIGNED NOT NULL,
  `FechaNota` date NOT NULL,
  `IDEstudiante` int(10) UNSIGNED NOT NULL,
  `IDMateria` int(10) UNSIGNED NOT NULL,
  `IDPeriodo` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodo`
--

CREATE TABLE `periodo` (
  `IDPeriodo` int(10) UNSIGNED NOT NULL,
  `Periodo` varchar(45) NOT NULL,
  `Fecha_inicio` date NOT NULL,
  `Fecha_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `periodo`
--

INSERT INTO `periodo` (`IDPeriodo`, `Periodo`, `Fecha_inicio`, `Fecha_fin`) VALUES
(6, 'Primer Periodo', '2021-01-12', '2021-03-13'),
(7, 'Segundo Periodo', '2021-03-14', '2021-06-15'),
(8, 'Tercer Periodo', '2021-06-15', '2021-09-16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responsables`
--

CREATE TABLE `responsables` (
  `IDResponsable` int(10) UNSIGNED NOT NULL,
  `Nombres` varchar(45) NOT NULL,
  `Apellidos` varchar(45) NOT NULL,
  `FechaNacimiento` date NOT NULL,
  `Sexo` varchar(10) NOT NULL,
  `TipoDeParentesco` varchar(45) NOT NULL,
  `DUI` varchar(10) NOT NULL,
  `NIT` varchar(17) NOT NULL,
  `Telefono` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `responsables`
--

INSERT INTO `responsables` (`IDResponsable`, `Nombres`, `Apellidos`, `FechaNacimiento`, `Sexo`, `TipoDeParentesco`, `DUI`, `NIT`, `Telefono`) VALUES
(16, 'Juan Miguel', 'Pérez Pérez', '1987-04-21', 'Femenino', 'Padre', '12345678-9', '1234-123456-123-1', '7621-2131');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones`
--

CREATE TABLE `secciones` (
  `IDSeccion` int(10) UNSIGNED NOT NULL,
  `Descripcion` varchar(45) NOT NULL,
  `Turno` varchar(45) NOT NULL,
  `Aula` varchar(45) NOT NULL,
  `Cupo` varchar(45) NOT NULL,
  `IDGrado` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `secciones`
--

INSERT INTO `secciones` (`IDSeccion`, `Descripcion`, `Turno`, `Aula`, `Cupo`, `IDGrado`) VALUES
(1, 'A', 'Matutino', '21', '20', 14),
(13, 'A', 'Matutino', '21', '20', 12),
(15, 'B', 'Vespertino', '23', '40', 15),
(16, 'C', 'Matutino', '12', '30', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `IDUsuario` int(10) UNSIGNED NOT NULL,
  `Usuario` varchar(45) NOT NULL,
  `Clave` varchar(45) NOT NULL,
  `Rol` varchar(45) NOT NULL,
  `IDEmpleado` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IDUsuario`, `Usuario`, `Clave`, `Rol`, `IDEmpleado`) VALUES
(1, 'admin', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Director', 1),
(8, 'maestro', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Maestro', 21),
(10, 'sub', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Sub-Director', 48),
(11, 'secretaria', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Secretaria', 49);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`IDEmpleado`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`IDEstudiante`),
  ADD KEY `fk_Estudiante_Responsable1_idx` (`IDResponsable`);

--
-- Indices de la tabla `grados`
--
ALTER TABLE `grados`
  ADD PRIMARY KEY (`IDGrado`);

--
-- Indices de la tabla `grados_materias`
--
ALTER TABLE `grados_materias`
  ADD PRIMARY KEY (`IDGrado_Materia`),
  ADD KEY `fk_Grados_Materias_Grados1_idx` (`IDGrado`),
  ADD KEY `fk_Grados_Materias_Materias1_idx` (`IDMateria`);

--
-- Indices de la tabla `maestros`
--
ALTER TABLE `maestros`
  ADD PRIMARY KEY (`IDMaestro`),
  ADD KEY `fk_Maestro_Empleados1_idx` (`IDEmpleado`);

--
-- Indices de la tabla `maestros_secciones`
--
ALTER TABLE `maestros_secciones`
  ADD PRIMARY KEY (`IDMaestro_Seccion`),
  ADD KEY `fk_Maestros_Secciones_Secciones1_idx` (`IDSeccion`),
  ADD KEY `fk_Maestros_Secciones_Maestros1_idx` (`IDMaestro`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`IDMateria`);

--
-- Indices de la tabla `matriculas`
--
ALTER TABLE `matriculas`
  ADD PRIMARY KEY (`IDMatricula`),
  ADD KEY `fk_Matriculas_Estudiantes1_idx` (`IDEstudiante`),
  ADD KEY `fk_Matriculas_Grados1_idx` (`IDGrado`),
  ADD KEY `fk_Matriculas_Secciones1_idx` (`IDSeccion`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`IDNota`),
  ADD KEY `fk_Notas_Estudiantes1_idx` (`IDEstudiante`),
  ADD KEY `fk_Notas_Materias1_idx` (`IDMateria`),
  ADD KEY `fk_Notas_Periodo1_idx` (`IDPeriodo`);

--
-- Indices de la tabla `periodo`
--
ALTER TABLE `periodo`
  ADD PRIMARY KEY (`IDPeriodo`);

--
-- Indices de la tabla `responsables`
--
ALTER TABLE `responsables`
  ADD PRIMARY KEY (`IDResponsable`);

--
-- Indices de la tabla `secciones`
--
ALTER TABLE `secciones`
  ADD PRIMARY KEY (`IDSeccion`),
  ADD KEY `fk_Seccion_Grado1_idx` (`IDGrado`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IDUsuario`),
  ADD KEY `fk_Usuarios_Empleados1_idx` (`IDEmpleado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `IDEmpleado` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `IDEstudiante` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `grados`
--
ALTER TABLE `grados`
  MODIFY `IDGrado` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `grados_materias`
--
ALTER TABLE `grados_materias`
  MODIFY `IDGrado_Materia` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `maestros`
--
ALTER TABLE `maestros`
  MODIFY `IDMaestro` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `maestros_secciones`
--
ALTER TABLE `maestros_secciones`
  MODIFY `IDMaestro_Seccion` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `IDMateria` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `matriculas`
--
ALTER TABLE `matriculas`
  MODIFY `IDMatricula` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `IDNota` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `periodo`
--
ALTER TABLE `periodo`
  MODIFY `IDPeriodo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `responsables`
--
ALTER TABLE `responsables`
  MODIFY `IDResponsable` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `secciones`
--
ALTER TABLE `secciones`
  MODIFY `IDSeccion` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IDUsuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD CONSTRAINT `fk_Estudiante_Responsable1` FOREIGN KEY (`IDResponsable`) REFERENCES `responsables` (`IDResponsable`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `grados_materias`
--
ALTER TABLE `grados_materias`
  ADD CONSTRAINT `fk_Grados_Materias_Grados1` FOREIGN KEY (`IDGrado`) REFERENCES `grados` (`IDGrado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Grados_Materias_Materias1` FOREIGN KEY (`IDMateria`) REFERENCES `materias` (`IDMateria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `maestros`
--
ALTER TABLE `maestros`
  ADD CONSTRAINT `fk_Maestro_Empleados1` FOREIGN KEY (`IDEmpleado`) REFERENCES `empleados` (`IDEmpleado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `maestros_secciones`
--
ALTER TABLE `maestros_secciones`
  ADD CONSTRAINT `fk_Maestros_Secciones_Maestros1` FOREIGN KEY (`IDMaestro`) REFERENCES `maestros` (`IDMaestro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Maestros_Secciones_Secciones1` FOREIGN KEY (`IDSeccion`) REFERENCES `secciones` (`IDSeccion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `matriculas`
--
ALTER TABLE `matriculas`
  ADD CONSTRAINT `fk_Matriculas_Estudiantes1` FOREIGN KEY (`IDEstudiante`) REFERENCES `estudiantes` (`IDEstudiante`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Matriculas_Grados1` FOREIGN KEY (`IDGrado`) REFERENCES `grados` (`IDGrado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Matriculas_Secciones1` FOREIGN KEY (`IDSeccion`) REFERENCES `secciones` (`IDSeccion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `fk_Notas_Estudiantes1` FOREIGN KEY (`IDEstudiante`) REFERENCES `estudiantes` (`IDEstudiante`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Notas_Materias1` FOREIGN KEY (`IDMateria`) REFERENCES `materias` (`IDMateria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Notas_Periodo1` FOREIGN KEY (`IDPeriodo`) REFERENCES `periodo` (`IDPeriodo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `secciones`
--
ALTER TABLE `secciones`
  ADD CONSTRAINT `fk_Seccion_Grado1` FOREIGN KEY (`IDGrado`) REFERENCES `grados` (`IDGrado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_Usuarios_Empleados1` FOREIGN KEY (`IDEmpleado`) REFERENCES `empleados` (`IDEmpleado`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
