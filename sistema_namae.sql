-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-11-2021 a las 23:47:27
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
(21, 'Edenilson Vladimir', 'García Vásquez', '1999-12-01', 'Masculino', '7648-9546', '05906180-9', '1234-123456-123-1', 'Bachiller'),
(43, 'Juan Daniel', 'Perez Perez', '2000-02-12', 'Masculino', '1', '1', '1', '1');

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestros_secciones`
--

CREATE TABLE `maestros_secciones` (
  `IDMaestro_Seccion` int(10) UNSIGNED NOT NULL,
  `IDMaestro` int(10) UNSIGNED NOT NULL,
  `IDSeccion` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `Periodo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 'admin', '1234', 'Director', 1),
(7, 'Ede', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Director', 21);

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
  MODIFY `IDEmpleado` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `IDEstudiante` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
  MODIFY `IDMaestro` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `maestros_secciones`
--
ALTER TABLE `maestros_secciones`
  MODIFY `IDMaestro_Seccion` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `IDMateria` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `matriculas`
--
ALTER TABLE `matriculas`
  MODIFY `IDMatricula` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `IDNota` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `periodo`
--
ALTER TABLE `periodo`
  MODIFY `IDPeriodo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `responsables`
--
ALTER TABLE `responsables`
  MODIFY `IDResponsable` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `secciones`
--
ALTER TABLE `secciones`
  MODIFY `IDSeccion` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IDUsuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
