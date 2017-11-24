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

CREATE TABLE `tpbeer`.`pedidos` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `fecha_pedido` DATE NOT NULL,
  `fecha_entrega` DATE NOT NULL,
  `estado` INT NOT NULL,
  `horario` INT NOT NULL,
  `tipo_entrega` INT NOT NULL DEFAULT 0,
  `id_sucursal` INT UNSIGNED NULL DEFAULT NULL,
  `monto_final` FLOAT NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `fk_sucursal_idx` (`id_sucursal` ASC),
  CONSTRAINT `fk_sucursal` FOREIGN KEY (`id_sucursal`) REFERENCES `tpbeer`.`sucursales` (`id`)
);

CREATE TABLE `tpbeer`.`linea_pedidos` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_cerveza` INT UNSIGNED NOT NULL,
  `id_envase` INT UNSIGNED NOT NULL,
  `cantidad` INT NOT NULL DEFAULT 1,
  `precio` FLOAT NOT NULL DEFAULT 0,
  `id_pedido` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `fk_cerveza_idx` (`id_cerveza` ASC),
  INDEX `fk_envase_idx` (`id_envase` ASC),
  INDEX `fk_pedido_idx` (`id_pedido` ASC),
  CONSTRAINT `fk_cerveza` FOREIGN KEY (`id_cerveza`) REFERENCES `tpbeer`.`cervezas` (`id`),
  CONSTRAINT `fk_envase` FOREIGN KEY (`id_envase`) REFERENCES `tpbeer`.`envases` (`id`),
  CONSTRAINT `fk_pedido` FOREIGN KEY (`id_pedido`) REFERENCES `tpbeer`.`pedidos` (`id`)
);

CREATE TABLE `tpbeer`.`envasesxcervezas` (
  `id_cerveza` INT UNSIGNED NOT NULL,
  `id_envase` INT UNSIGNED NOT NULL,
  INDEX `fk_cerveza_idx` (`id_cerveza` ASC),
  INDEX `fk_envase_idx` (`id_envase` ASC),
  CONSTRAINT `fk_cerveza`
    FOREIGN KEY (`id_cerveza`)
    REFERENCES `tpbeer`.`cervezas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_envase`
    FOREIGN KEY (`id_envase`)
    REFERENCES `tpbeer`.`envases` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);
