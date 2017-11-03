create database tpbeer;

use tpbeer;

CREATE TABLE `tpbeer`.`cervezas` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  `descripcion` MEDIUMTEXT NULL,
  `precio` FLOAT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC)
);



CREATE TABLE `tpbeer`.`envases` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `volumen` FLOAT NOT NULL,
  `factor` FLOAT NOT NULL,
  `descripcion` MEDIUMTEXT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC)
);

CREATE TABLE `tpbeer`.`sucursales` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `direccion` VARCHAR(100) NOT NULL,
  `numero` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC)
);

CREATE TABLE `tpbeer`.`usuarios` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  `apellido` VARCHAR(100) NOT NULL,
  `domicilio` VARCHAR(100) NOT NULL,
  `telefono` int  NOT NULL,
  `email` VARCHAR(80) NOT NULL,
  `username` VARCHAR(100) NOT NULL UNIQUE,
  `contrasenia` VARCHAR(100) NOT NULL,
  `admin` TINYINT NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC)
);




 
        
        
        