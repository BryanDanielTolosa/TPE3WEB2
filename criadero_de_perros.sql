-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-11-2024 a las 16:03:38
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `criadero_de_perros`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `criadero`
--

CREATE TABLE `criadero` (
  `Nombre` varchar(45) NOT NULL,
  `Direccion` varchar(45) NOT NULL,
  `id_criadero` int(11) NOT NULL,
  `Localidad` varchar(45) NOT NULL,
  `Raza` varchar(45) NOT NULL,
  `Imagen` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `criadero`
--

INSERT INTO `criadero` (`Nombre`, `Direccion`, `id_criadero`, `Localidad`, `Raza`, `Imagen`) VALUES
('El Bosque', 'Mexico 1100', 22, 'Tandil', 'Boyero de Berna', 'https://www.tiendanimal.es/articulos/wp-content/uploads/2024/01/caracteristicas-boyero-berna-foto.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perro`
--

CREATE TABLE `perro` (
  `nombre` varchar(45) NOT NULL,
  `nacimiento` date NOT NULL,
  `padre` varchar(45) NOT NULL,
  `sexo` varchar(45) NOT NULL,
  `id_perro` int(11) NOT NULL,
  `madre` varchar(45) NOT NULL,
  `id_criadero_fk` int(11) NOT NULL,
  `Imagen` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `perro`
--

INSERT INTO `perro` (`nombre`, `nacimiento`, `padre`, `sexo`, `id_perro`, `madre`, `id_criadero_fk`, `Imagen`) VALUES
('Pepe', '2024-09-09', 'Roberto', 'Macho', 54, 'Mariana', 22, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQUlF5IO4scJO1CszwVKqveaQy65addznO4iZldXiwQdjKcCo-u-vHmsnDjGkgbNY9vOqM&usqp=CAU'),
('Julian', '2020-10-15', 'Pedro', 'hembra', 56, 'marcela', 22, 'https://i.pinimg.com/originals/41/5c/21/415c21385e5c0475f9e7df35caa68a1e.jpg'),
('Marisa', '2024-10-08', 'Raul', 'Hembra', 58, 'Mariana', 22, 'https://media.istockphoto.com/id/465377790/es/foto/salto-golden-retriever-cachorro.jpg?s=612x612&w=0&k=20&c=HVymMnER-YmYt4ucnHr-_IMFTkctwJJtjgbNUwUnP9g='),
('Julieta', '2024-09-09', 'Raul', 'Hembra', 59, 'Julia', 22, 'https://media.istockphoto.com/id/1358309706/es/foto/un-cachorro-de-pastor-alem%C3%A1n-de-raza-pura-yace-en-la-acera-contra-una-pared-de-madera-orejas-a.jpg?s=612x612&w=0&k=20&c=7rHcqwB-mADzVztdkRoNgfSJjXHpqMP_HNGo9TdOxrg='),
('Matias', '2024-10-08', 'Julian', 'Macho', 60, 'Dalma', 22, 'https://media.istockphoto.com/id/1387131327/es/foto/lindo-cachorro-de-perro-salchicha-mirando-a-la-c%C3%A1mara-sobre-un-fondo-claro.jpg?s=612x612&w=0&k=20&c=vppfGoZ440j2qLcOUW0RaCsyjliuNB7KgxZoTnvvZIk='),
('sdf', '2024-10-22', 'asddas', 'femenino', 66, 'SDF', 22, 'https://th.bing.com/th/id/R.27eabb322a123f268a632a52c529169e?rik=qRgxhYi9oaKfvA&riu=http%3a%2f%2f1.bp.blogspot.com%2f-E_kwGduM0L8%2fVpEh4csk2CI%2fAAAAAAAABro%2frO_ypbimA4M%2fs1600%2f11265241_10203885868505605_1200094121324471857_o.jpg&ehk=lvtyU8DMTbqfkDUrhx0nTee7flBBo7x1Ea0a%2f4FIStc%3d&risl=&pid=ImgRaw&r=0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `Usuario` varchar(200) NOT NULL,
  `contraseña` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `Usuario`, `contraseña`) VALUES
(1, 'webadmin', '$2y$10$.cgeRjA95UxLT5/Oc2hbb.cZ9KPc4bYx.0k0i3ENTFxGNLIIxQFnS');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `criadero`
--
ALTER TABLE `criadero`
  ADD PRIMARY KEY (`id_criadero`);

--
-- Indices de la tabla `perro`
--
ALTER TABLE `perro`
  ADD PRIMARY KEY (`id_perro`),
  ADD KEY `id_criadero_fk` (`id_criadero_fk`) USING BTREE;

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `criadero`
--
ALTER TABLE `criadero`
  MODIFY `id_criadero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `perro`
--
ALTER TABLE `perro`
  MODIFY `id_perro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `perro`
--
ALTER TABLE `perro`
  ADD CONSTRAINT `perro_ibfk_1` FOREIGN KEY (`id_criadero_fk`) REFERENCES `criadero` (`id_criadero`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
