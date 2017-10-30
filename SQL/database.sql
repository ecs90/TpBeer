create database tbpeer;

use tbpeer;

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


 
        
        
        