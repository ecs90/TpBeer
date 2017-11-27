-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: tpbeer
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.25-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cervezas`
--

DROP TABLE IF EXISTS `cervezas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cervezas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `descripcion` mediumtext,
  `precio` float NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `activo` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cervezas`
--

LOCK TABLES `cervezas` WRITE;
/*!40000 ALTER TABLE `cervezas` DISABLE KEYS */;
INSERT INTO `cervezas` VALUES (1,'Ale especial','especial',15,'images/AleEspecial.jpg',1),(2,'Ale trapense','trapense',18,'images/AleTrapense.jpg',1),(3,'Lager negra','negra',20,'images/LagerNegra.jpg',1),(4,'Lager especial','especial',18,'images/LagerEspeial.jpg',1),(5,'Lager tradicional','tradicional',15,'images/LagerTradicional.jpg',1),(6,'Trigo','trigo',15,'images/Trigo.jpg',1);
/*!40000 ALTER TABLE `cervezas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `envases`
--

DROP TABLE IF EXISTS `envases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `envases` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `volumen` float NOT NULL,
  `factor` float NOT NULL,
  `descripcion` mediumtext,
  `imagen` varchar(100) NOT NULL,
  `activo` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `envases`
--

LOCK TABLES `envases` WRITE;
/*!40000 ALTER TABLE `envases` DISABLE KEYS */;
INSERT INTO `envases` VALUES (1,0.5,1.5,'PorrÃ³n','images/PorrÃ³n.jpg',1),(2,2,2,'BotellÃ³n','images/BotellÃ³n.jpg',1),(3,10,5,'Barril 10Lt','images/Barril 10Lt.jpg',1),(4,20,10,'Barril 20Lt','images/Barril 20Lt.jpg',1);
/*!40000 ALTER TABLE `envases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `envasesxcervezas`
--

DROP TABLE IF EXISTS `envasesxcervezas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `envasesxcervezas` (
  `id_cerveza` int(10) unsigned NOT NULL,
  `id_envase` int(10) unsigned NOT NULL,
  KEY `fk_cerveza_idx` (`id_cerveza`),
  KEY `fk_envase_idx` (`id_envase`),
  CONSTRAINT `fk_cervezaa` FOREIGN KEY (`id_cerveza`) REFERENCES `cervezas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_envasee` FOREIGN KEY (`id_envase`) REFERENCES `envases` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `envasesxcervezas`
--

LOCK TABLES `envasesxcervezas` WRITE;
/*!40000 ALTER TABLE `envasesxcervezas` DISABLE KEYS */;
INSERT INTO `envasesxcervezas` VALUES (2,1),(2,2),(3,1),(3,2),(4,1),(4,2),(4,3),(4,4),(5,1),(5,2),(5,3),(5,4),(1,1),(1,2),(6,2),(6,3),(6,4);
/*!40000 ALTER TABLE `envasesxcervezas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `linea_pedidos`
--

DROP TABLE IF EXISTS `linea_pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `linea_pedidos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_cerveza` int(10) unsigned NOT NULL,
  `id_envase` int(10) unsigned NOT NULL,
  `cantidad` int(11) NOT NULL DEFAULT '1',
  `precio` float NOT NULL DEFAULT '0',
  `id_pedido` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_cerveza_idx` (`id_cerveza`),
  KEY `fk_envase_idx` (`id_envase`),
  KEY `fk_pedido_idx` (`id_pedido`),
  CONSTRAINT `fk_cerveza` FOREIGN KEY (`id_cerveza`) REFERENCES `cervezas` (`id`),
  CONSTRAINT `fk_envase` FOREIGN KEY (`id_envase`) REFERENCES `envases` (`id`),
  CONSTRAINT `fk_pedido` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `linea_pedidos`
--

LOCK TABLES `linea_pedidos` WRITE;
/*!40000 ALTER TABLE `linea_pedidos` DISABLE KEYS */;
INSERT INTO `linea_pedidos` VALUES (1,1,2,2,60,1),(2,5,2,3,90,1),(3,6,3,2,150,1),(4,5,3,1,75,1),(6,1,3,2,150,3),(7,1,2,2,60,4),(8,4,3,4,360,4);
/*!40000 ALTER TABLE `linea_pedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedidos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_usuario` int(10) unsigned NOT NULL,
  `fecha_entrega` date NOT NULL,
  `estado` int(11) NOT NULL,
  `horario` int(11) NOT NULL,
  `tipo_entrega` int(11) NOT NULL DEFAULT '0',
  `id_sucursal` int(10) unsigned DEFAULT NULL,
  `monto_final` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_sucursal_idx` (`id_sucursal`),
  KEY `fk_usuario_idx` (`id_usuario`),
  CONSTRAINT `fk_sucursal` FOREIGN KEY (`id_sucursal`) REFERENCES `sucursales` (`id`),
  CONSTRAINT `fk_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos`
--

LOCK TABLES `pedidos` WRITE;
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
INSERT INTO `pedidos` VALUES (1,2,'2017-11-29',0,0,0,1,375),(3,2,'2017-11-30',0,0,0,1,150),(4,2,'2017-11-29',2,0,0,2,420);
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sucursales`
--

DROP TABLE IF EXISTS `sucursales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sucursales` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `direccion` varchar(100) NOT NULL,
  `numero` int(11) NOT NULL,
  `activo` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sucursales`
--

LOCK TABLES `sucursales` WRITE;
/*!40000 ALTER TABLE `sucursales` DISABLE KEYS */;
INSERT INTO `sucursales` VALUES (1,'Avenida ConstituciÃ³n',5225,1),(2,'Bolivar',2350,1);
/*!40000 ALTER TABLE `sucursales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `domicilio` varchar(100) NOT NULL,
  `telefono` int(11) NOT NULL,
  `email` varchar(80) NOT NULL,
  `username` varchar(100) NOT NULL,
  `contrasenia` varchar(100) NOT NULL,
  `admin` tinyint(4) NOT NULL DEFAULT '0',
  `activo` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Jonatan','Mena','Rodriguez Peña 5625',4750393,'menajona89@gmail.com','Admin','pass',1,1),(2,'Jonatan','Mena','Redriguez PeÃ±a 5625',4750393,'menajonatan89@gmail.com','Jona','123',0,1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'tpbeer'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-11-27 17:22:48
