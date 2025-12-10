-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-09-2025 a las 19:13:37
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hv3_mvc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_personales`
--

CREATE TABLE `datos_personales` (
  `nro_documento` bigint(20) NOT NULL,
  `tipo_documento` varchar(2) NOT NULL,
  `nombres` varchar(40) NOT NULL,
  `apellidos` varchar(40) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `direccion_residencia` varchar(80) NOT NULL,
  `ciudad_residencia` varchar(20) NOT NULL,
  `correo_electronico` varchar(30) NOT NULL,
  `telefono` bigint(20) NOT NULL,
  `password` varchar(60) NOT NULL,
  `sexo` varchar(2) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `datos_personales`
--

INSERT INTO `datos_personales` (`nro_documento`, `tipo_documento`, `nombres`, `apellidos`, `fecha_nacimiento`, `direccion_residencia`, `ciudad_residencia`, `correo_electronico`, `telefono`, `password`, `sexo`, `foto`) VALUES
(1005025606, 'CC', 'Neyger David', 'Serrano Márquez', '2001-09-20', 'Av. 15 #22-56 Alfonso López', 'Cúcuta', 'neyger2001@gmail.com', 3104010112, '$2y$10$vuexoXSa93jmpZkJY20cY.gqJccD3.6tAt29FpipanpXoEc2GbDLO', 'M', 'uploads/685c12ca5991d_fotoPersonal.jpeg'),
(1092526208, 'CC', 'Kleidy', 'Gonzalez Mena', '2004-11-10', 'Cll 22 #12-109 Alfonso Lopez', 'Cucuta', 'klei123@gmail.com', 3102160669, '$2y$10$/yxIGFbRFm7lOqp6q21kBeVNA1FEwU3yJ5ppo8k8TKqNDb9NVPfT6', 'Es', 'uploads/68647c432024d_foto-klei.jpeg'),
(1092533191, 'TI', 'Gysell Stefania', 'Peña Ardila', '2007-08-28', 'Los Laureles', 'Cúcuta', 'gygy123@gmail.com', 3209039403, '$2y$10$YntpfDojXTARnL438RlzkOxKjW9smEz/Sl58PiNw4rZPHwK3J9eba', 'Es', 'uploads/685c244714a0c_gygy.jpeg'),
(1093596401, 'TI', 'Antony Jesús', 'Serrano Márquez', '2008-03-16', 'Av. 15 #22-56 Alfonso López', 'Cúcuta', 'yeyerdavid@gmail.com', 3156825981, '$2y$10$CWj06v.n61h/poRD2lWfp.XumAje364h5fbQh7QCmcpSWtaWpjRjS', 'M', '68adcf8b692a0_marselo.jpg'),
(1111111111, 'CC', 'Ñema', 'Ñemita', '2001-09-20', 'En la casa', 'Ciudadela', 'nemita@gmail.com', 1111111111, '$2y$10$U7mBjI/ZQ.T.ndtJTnptievpDQLVaCSIlHd1a/nYq63FUf4tl8o7S', 'M', '68adcd2959ac6_gracias.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `educacion`
--

CREATE TABLE `educacion` (
  `id_estudio` int(3) NOT NULL,
  `fecha_ini` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `titulo_estudio` varchar(60) NOT NULL,
  `entidad` varchar(60) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `nro_doc_persona` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `educacion`
--

INSERT INTO `educacion` (`id_estudio`, `fecha_ini`, `fecha_fin`, `titulo_estudio`, `entidad`, `descripcion`, `nro_doc_persona`) VALUES
(3, '2016-02-01', '2018-11-18', 'Bachiller Técnico en Informática', 'Colegio Santa Cecilia', 'Con honores 10 de 10', 1005025606),
(4, '2020-08-02', '2023-09-28', 'Tecnólogo en Análisis y Desarrollo de Sistemas de Informació', 'Servicio Nacional de Aprendizaje', 'No aprendimos nada', 1005025606);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `nit_empresa` bigint(20) NOT NULL,
  `nombre_empresa` varchar(50) NOT NULL,
  `logo_foto` varchar(245) NOT NULL,
  `nombre_delegado` varchar(50) NOT NULL,
  `cargo_delegado` varchar(40) NOT NULL,
  `correo_empresa` varchar(40) NOT NULL,
  `password_empresa` varchar(60) NOT NULL,
  `telefono_empresa` bigint(12) NOT NULL,
  `pagweb_empresa` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`nit_empresa`, `nombre_empresa`, `logo_foto`, `nombre_delegado`, `cargo_delegado`, `correo_empresa`, `password_empresa`, `telefono_empresa`, `pagweb_empresa`) VALUES
(1122334455, 'Kanye West', '68add32ab0c7f_gato west.jpg', 'Yeyersito', 'Admin', 'yeyer@gmail.prueba', '$2y$10$nJ551d8xQ3dg0AjPVtSBbut4z6/ZuV24RNRMD4KY.aVfDVRO9LM8i', 3001234567, 'no hay pagina aún'),
(8978675645, 'Gygy Shop', '68add334bfa38_esrek.png', 'Gysell Peña', 'Coordinadora', 'gygyshop@gmail.com', '$2y$10$vuexoXSa93jmpZkJY20cY.gqJccD3.6tAt29FpipanpXoEc2GbDLO', 3209039403, 'gygyshop.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `experiencia`
--

CREATE TABLE `experiencia` (
  `id_experiencia` int(3) NOT NULL,
  `fecha_ini` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `empresa` varchar(50) NOT NULL,
  `descripcion_funciones` varchar(150) NOT NULL,
  `nro_doc_persona` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `experiencia`
--

INSERT INTO `experiencia` (`id_experiencia`, `fecha_ini`, `fecha_fin`, `cargo`, `empresa`, `descripcion_funciones`, `nro_doc_persona`) VALUES
(1, '2001-01-20', '2002-01-20', 'Jefe de momazos', 'Memelandia', 'Momazos Chicha', 1093596401),
(3, '2000-01-01', '2002-02-02', 'Desarrollador Web', 'SENA', 'Chambeador', 1005025606);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habilidades`
--

CREATE TABLE `habilidades` (
  `hab1` varchar(50) NOT NULL,
  `hab2` varchar(50) NOT NULL,
  `hab3` varchar(50) NOT NULL,
  `nro_doc_persona` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `habilidades`
--

INSERT INTO `habilidades` (`hab1`, `hab2`, `hab3`, `nro_doc_persona`) VALUES
('React', 'Django', 'NodeJS', 1005025606),
('JavaScript', 'MySQL', 'Python', 1093596401),
('Proactiva', 'Responsable', 'Amigable', 1092533191),
('Hermosa', 'Reluciente', 'Maravillosa', 1092526208);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `portafolio`
--

CREATE TABLE `portafolio` (
  `id_proyecto` int(11) NOT NULL,
  `nombre_proyecto` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `descripcion_proyecto` varchar(150) NOT NULL,
  `foto_proyecto` varchar(100) NOT NULL,
  `link_proyecto` varchar(245) DEFAULT NULL,
  `nro_doc_persona` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `portafolio`
--

INSERT INTO `portafolio` (`id_proyecto`, `nombre_proyecto`, `fecha`, `descripcion_proyecto`, `foto_proyecto`, `link_proyecto`, `nro_doc_persona`) VALUES
(1, 'Proyecto de Prueba 1', '2025-06-25', 'Esta es una prueba', 'uploads/685c30981586f_proyectoPrueba.png', 'No existe un link', 1092533191),
(2, 'FullCalendarJS', '2025-06-05', 'Calendario de FullCalendarJS en Laravel', 'uploads/685d60c905213_fullcalendarjs.png', '', 1005025606);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `postulacion`
--

CREATE TABLE `postulacion` (
  `nro_doc_persona` bigint(20) NOT NULL,
  `vac_id` int(8) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `observaciones` varchar(40) NOT NULL,
  `fecha_postulacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `postulacion`
--

INSERT INTO `postulacion` (`nro_doc_persona`, `vac_id`, `estado`, `observaciones`, `fecha_postulacion`) VALUES
(1005025606, 1, 'Aceptado', '', '2025-09-15'),
(1005025606, 4, 'Rechazado', '', '2025-09-15'),
(1092526208, 4, 'Rechazado', 'No cumple con los requisitos', '2025-09-15'),
(1093596401, 1, 'pendiente', 'En espera', '2025-08-25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacante`
--

CREATE TABLE `vacante` (
  `vacant_id` int(8) NOT NULL,
  `empr_nit` bigint(20) NOT NULL,
  `cargo` varchar(40) NOT NULL,
  `desc_cargo` varchar(100) NOT NULL,
  `nro_vacantes` int(3) NOT NULL,
  `requisitos` varchar(100) NOT NULL,
  `exp_requerida` int(3) NOT NULL,
  `tipo_vinculo` varchar(30) NOT NULL,
  `ubicacion` varchar(30) NOT NULL,
  `salario` bigint(20) NOT NULL,
  `fecha_cierre` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `vacante`
--

INSERT INTO `vacante` (`vacant_id`, `empr_nit`, `cargo`, `desc_cargo`, `nro_vacantes`, `requisitos`, `exp_requerida`, `tipo_vinculo`, `ubicacion`, `salario`, `fecha_cierre`) VALUES
(1, 8978675645, 'Desarrollador Web', 'Buscamos desarrollador web full-stack', 2, '', 24, 'Tiempo parcial', 'Oficina', 2500000, '2025-12-10'),
(2, 8978675645, 'Cocinero', 'Buscamos cocinero con experiencia', 1, 'Saber manejar el cuchillo', 36, 'Tiempo completo', 'Restaurante', 4000000, '2025-07-04'),
(3, 8978675645, 'Coordinadora de Marketing', 'Desempeño positivo y efectivo en marketing para que la empresa crezca', 1, 'Buena comunicación asertiva, no grosera, etc.', 24, 'Tiempo parcial', 'Oficina', 2000000, '2025-07-02'),
(4, 8978675645, 'Profesor', 'Enseñar', 2, 'Pedagogía', 3, 'Contrato indefinido', 'Cúcuta', 2500000, '2025-09-30');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `datos_personales`
--
ALTER TABLE `datos_personales`
  ADD PRIMARY KEY (`nro_documento`);

--
-- Indices de la tabla `educacion`
--
ALTER TABLE `educacion`
  ADD PRIMARY KEY (`id_estudio`),
  ADD KEY `educ_pers_fk` (`nro_doc_persona`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`nit_empresa`);

--
-- Indices de la tabla `experiencia`
--
ALTER TABLE `experiencia`
  ADD PRIMARY KEY (`id_experiencia`),
  ADD KEY `exper_pers_fk` (`nro_doc_persona`);

--
-- Indices de la tabla `habilidades`
--
ALTER TABLE `habilidades`
  ADD KEY `hab_pers_fk` (`nro_doc_persona`);

--
-- Indices de la tabla `portafolio`
--
ALTER TABLE `portafolio`
  ADD PRIMARY KEY (`id_proyecto`),
  ADD KEY `port_person_fk` (`nro_doc_persona`);

--
-- Indices de la tabla `postulacion`
--
ALTER TABLE `postulacion`
  ADD PRIMARY KEY (`nro_doc_persona`,`vac_id`),
  ADD KEY `post_vac_fk` (`vac_id`);

--
-- Indices de la tabla `vacante`
--
ALTER TABLE `vacante`
  ADD PRIMARY KEY (`vacant_id`),
  ADD KEY `vac_empr_fk` (`empr_nit`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `educacion`
--
ALTER TABLE `educacion`
  MODIFY `id_estudio` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `experiencia`
--
ALTER TABLE `experiencia`
  MODIFY `id_experiencia` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `portafolio`
--
ALTER TABLE `portafolio`
  MODIFY `id_proyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `vacante`
--
ALTER TABLE `vacante`
  MODIFY `vacant_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `educacion`
--
ALTER TABLE `educacion`
  ADD CONSTRAINT `educ_pers_fk` FOREIGN KEY (`nro_doc_persona`) REFERENCES `datos_personales` (`nro_documento`);

--
-- Filtros para la tabla `experiencia`
--
ALTER TABLE `experiencia`
  ADD CONSTRAINT `exper_pers_fk` FOREIGN KEY (`nro_doc_persona`) REFERENCES `datos_personales` (`nro_documento`);

--
-- Filtros para la tabla `habilidades`
--
ALTER TABLE `habilidades`
  ADD CONSTRAINT `hab_pers_fk` FOREIGN KEY (`nro_doc_persona`) REFERENCES `datos_personales` (`nro_documento`);

--
-- Filtros para la tabla `portafolio`
--
ALTER TABLE `portafolio`
  ADD CONSTRAINT `port_person_fk` FOREIGN KEY (`nro_doc_persona`) REFERENCES `datos_personales` (`nro_documento`);

--
-- Filtros para la tabla `postulacion`
--
ALTER TABLE `postulacion`
  ADD CONSTRAINT `post_pers_fk` FOREIGN KEY (`nro_doc_persona`) REFERENCES `datos_personales` (`nro_documento`),
  ADD CONSTRAINT `post_vac_fk` FOREIGN KEY (`vac_id`) REFERENCES `vacante` (`vacant_id`);

--
-- Filtros para la tabla `vacante`
--
ALTER TABLE `vacante`
  ADD CONSTRAINT `vac_empr_fk` FOREIGN KEY (`empr_nit`) REFERENCES `empresa` (`nit_empresa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
