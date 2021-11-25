-- MySQL dump 10.13  Distrib 5.7.31, for Win64 (x86_64)
--
-- Host: localhost    Database: handyman
-- ------------------------------------------------------
-- Server version	5.7.31

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
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `idcliente` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_registro` date NOT NULL,
  `idusuario` int(11) NOT NULL,
  PRIMARY KEY (`idcliente`),
  UNIQUE KEY `idcliente_UNIQUE` (`idcliente`),
  UNIQUE KEY `idusuario_UNIQUE` (`idusuario`),
  KEY `idusuario_idx` (`idusuario`),
  CONSTRAINT `idusuarioC` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'2012-10-25',4),(6,'2021-11-14',18);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `domicilio`
--

DROP TABLE IF EXISTS `domicilio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `domicilio` (
  `iddomicilio` int(11) NOT NULL AUTO_INCREMENT,
  `calle` varchar(45) NOT NULL,
  `numero` int(11) NOT NULL,
  `piso` int(11) DEFAULT NULL,
  `puerta` varchar(1) DEFAULT NULL,
  `idcliente` int(11) NOT NULL,
  PRIMARY KEY (`iddomicilio`),
  UNIQUE KEY `iddomicilio_UNIQUE` (`iddomicilio`),
  KEY `idcliente_idx` (`idcliente`),
  CONSTRAINT `idclienteD` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `domicilio`
--

LOCK TABLES `domicilio` WRITE;
/*!40000 ALTER TABLE `domicilio` DISABLE KEYS */;
INSERT INTO `domicilio` VALUES (1,'Odonel',2,4,'B',1),(2,'Sevilla',6,2,'A',1),(13,'GITANO',101,2,'L',6);
/*!40000 ALTER TABLE `domicilio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gestor`
--

DROP TABLE IF EXISTS `gestor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gestor` (
  `idgestor` int(11) NOT NULL AUTO_INCREMENT,
  `numero_sucursal` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  PRIMARY KEY (`idgestor`),
  UNIQUE KEY `idgestor_UNIQUE` (`idgestor`),
  KEY `idusuario_idx` (`idusuario`),
  CONSTRAINT `idusuarioG` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gestor`
--

LOCK TABLES `gestor` WRITE;
/*!40000 ALTER TABLE `gestor` DISABLE KEYS */;
INSERT INTO `gestor` VALUES (1,2132,1);
/*!40000 ALTER TABLE `gestor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parte`
--

DROP TABLE IF EXISTS `parte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parte` (
  `idparte` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` longtext NOT NULL,
  `fecha_parte` date NOT NULL,
  `idcliente` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `asunto` varchar(30) NOT NULL,
  `estado` varchar(10) NOT NULL,
  PRIMARY KEY (`idparte`),
  UNIQUE KEY `idparte_UNIQUE` (`idparte`),
  KEY `idcliente_idx` (`idcliente`),
  KEY `idproducto_idx` (`idproducto`),
  CONSTRAINT `idclienteP` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `idproductoP` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`idproducto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parte`
--

LOCK TABLES `parte` WRITE;
/*!40000 ALTER TABLE `parte` DISABLE KEYS */;
INSERT INTO `parte` VALUES (6,'La monste no me va venteeee\r\n','2021-11-18',1,3,'Se me bugio','TERMINADO'),(7,'VEEEENIIR\r\n','2021-11-19',1,1,'AAAA','OCUPADO'),(9,'LALALALA','2021-11-22',1,2,'LA COCCA','OCUPADO'),(10,'METI A MI HIJO EN EL MICROONDAS Y EXPLOTO (MI HIJO) Y EL APARATO TAMBIEN :)','2021-11-22',1,6,'EXPLOSION','LIBRE');
/*!40000 ALTER TABLE `parte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto` (
  `idproducto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `marca` varchar(20) NOT NULL,
  `fecha_registro` date NOT NULL,
  `iddomicilio` int(11) NOT NULL,
  PRIMARY KEY (`idproducto`),
  UNIQUE KEY `idproducto_UNIQUE` (`idproducto`),
  KEY `iddomicilio_idx` (`iddomicilio`),
  CONSTRAINT `iddomicilioP` FOREIGN KEY (`iddomicilio`) REFERENCES `domicilio` (`iddomicilio`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (1,'lavavajillas','balay','2012-11-13',2),(2,'tostadora','loco','2014-05-12',2),(3,'monster','caca','2014-05-12',1),(6,'norte','borrado ','2014-05-12',1),(25,'LAVADORA','LGTB','2021-11-14',13),(26,'TOSTADORA','LEROY','2021-11-14',13);
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tecnico`
--

DROP TABLE IF EXISTS `tecnico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tecnico` (
  `idtecnico` int(11) NOT NULL AUTO_INCREMENT,
  `numero_identificacion` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  PRIMARY KEY (`idtecnico`),
  UNIQUE KEY `idtecnico_UNIQUE` (`idtecnico`),
  UNIQUE KEY `numero_identificacion_UNIQUE` (`numero_identificacion`),
  UNIQUE KEY `idusuario_UNIQUE` (`idusuario`),
  CONSTRAINT `idusuarioT` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tecnico`
--

LOCK TABLES `tecnico` WRITE;
/*!40000 ALTER TABLE `tecnico` DISABLE KEYS */;
INSERT INTO `tecnico` VALUES (1,3454554,2);
/*!40000 ALTER TABLE `tecnico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trabajo`
--

DROP TABLE IF EXISTS `trabajo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trabajo` (
  `idtrabajo` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_aceptado` date NOT NULL,
  `idtecnico` int(11) NOT NULL,
  `idparte` int(11) NOT NULL,
  `fecha_terminado` date DEFAULT NULL,
  `observaciones` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idtrabajo`),
  UNIQUE KEY `idtrabajo_UNIQUE` (`idtrabajo`),
  KEY `idtecnico_idx` (`idtecnico`),
  KEY `idparte_idx` (`idparte`),
  CONSTRAINT `idparteT` FOREIGN KEY (`idparte`) REFERENCES `parte` (`idparte`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `idtecnicoT` FOREIGN KEY (`idtecnico`) REFERENCES `tecnico` (`idtecnico`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trabajo`
--

LOCK TABLES `trabajo` WRITE;
/*!40000 ALTER TABLE `trabajo` DISABLE KEYS */;
INSERT INTO `trabajo` VALUES (12,'2021-11-23',1,7,NULL,NULL);
/*!40000 ALTER TABLE `trabajo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `apellidos` varchar(45) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `telefono` int(11) DEFAULT NULL,
  `dni` varchar(11) NOT NULL,
  `rol` varchar(10) NOT NULL,
  PRIMARY KEY (`idusuario`),
  UNIQUE KEY `idusuario_UNIQUE` (`idusuario`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `dni_UNIQUE` (`dni`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'YUSEF','HASSAN MOHAMED','YOSEFKA','1234','YUSEF.RM1@GMAIL.COM',674446957,'45311313W','GESTOR'),(2,'PAULA','GARCIA MORENO','PAULAW','1234','PAULAGRC@GMAIL.COM',678566545,'43454343R','TECNICO'),(4,'DANI','RODRIGUEZ','DANIEL','1234','DANI@GMAIL.COM',654445643,'345434341Q','CLIENTE'),(18,'NEBIL','EL MOHAMMADIANI','REIN','1234','KUFFAR@GMAIL.COM',654345234,'34546567P','CLIENTE');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-25 10:39:31
