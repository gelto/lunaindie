-- MySQL dump 10.13  Distrib 5.6.19, for osx10.9 (x86_64)
--
-- Host: localhost    Database: indie
-- ------------------------------------------------------
-- Server version	5.6.19

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
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'una','ACTIVA',NULL,NULL),(2,'dos','ACTIVA',NULL,NULL),(3,'tres','ACTIVA',NULL,NULL),(4,'cuatro','ACTIVA',NULL,NULL),(5,'cinco','ACTIVA',NULL,NULL),(6,'seis','ACTIVA',NULL,NULL);
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `colors`
--

DROP TABLE IF EXISTS `colors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `colors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prenda_id` int(11) NOT NULL,
  `color` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL DEFAULT 'CREADA',
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colors`
--

LOCK TABLES `colors` WRITE;
/*!40000 ALTER TABLE `colors` DISABLE KEYS */;
INSERT INTO `colors` VALUES (1,1,'Negro','CREADA','2015-10-22 22:39:34','2015-10-23 03:39:34'),(2,1,'Blanco','CREADA','2015-10-22 22:39:34','2015-10-23 03:39:34');
/*!40000 ALTER TABLE `colors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `groups_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imagenesporprendas`
--

DROP TABLE IF EXISTS `imagenesporprendas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `imagenesporprendas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prenda_id` int(11) DEFAULT NULL,
  `nombreImagen` varchar(255) DEFAULT NULL,
  `status` varchar(45) DEFAULT 'PENDIENTE',
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imagenesporprendas`
--

LOCK TABLES `imagenesporprendas` WRITE;
/*!40000 ALTER TABLE `imagenesporprendas` DISABLE KEYS */;
INSERT INTO `imagenesporprendas` VALUES (1,1,'1_9127Bluehound.gif','PENDIENTE','2015-10-22 22:39:34','2015-10-23 22:07:22'),(2,1,'1_1513Dandelion.gif','PENDIENTE','2015-10-22 22:39:34','2015-10-23 22:07:22'),(3,1,'1_2586African Daisy.gif','PENDIENTE','2015-10-22 22:39:34','2015-10-23 22:07:22'),(4,1,'1_9185Spiked.gif','PENDIENTE','2015-10-22 22:39:34','2015-10-23 22:07:22'),(5,1,'1_7630Sunflower.gif','PENDIENTE','2015-10-22 22:39:34','2015-10-23 22:07:22'),(6,NULL,'2_4123Jupiter.gif','PENDIENTE','2015-10-29 00:13:30','2015-10-29 06:13:30'),(7,NULL,'2_765Mercury.gif','PENDIENTE','2015-10-29 00:14:23','2015-10-29 06:14:23'),(8,1,'2_2914Jupiter.gif','PENDIENTE','2015-10-29 00:16:35','2015-10-29 06:16:35'),(9,1,'2_2682Mercury.gif','PENDIENTE','2015-10-29 00:16:45','2015-10-29 06:16:45'),(10,1,'2_891Uranus.gif','PENDIENTE','2015-10-29 00:17:04','2015-10-29 06:17:04');
/*!40000 ALTER TABLE `imagenesporprendas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventarios`
--

DROP TABLE IF EXISTS `inventarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prenda_id` int(11) NOT NULL,
  `medida_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `status` varchar(45) NOT NULL DEFAULT 'ACTIVO',
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventarios`
--

LOCK TABLES `inventarios` WRITE;
/*!40000 ALTER TABLE `inventarios` DISABLE KEYS */;
INSERT INTO `inventarios` VALUES (1,1,1,1,3,'ACTIVO','2015-10-22 22:39:10','2015-10-29 05:18:49'),(2,1,1,2,3,'ACTIVO','2015-10-22 22:39:10','2015-10-29 22:38:08'),(3,1,2,1,3,'ACTIVO','2015-10-22 22:39:10','2015-10-29 22:38:08'),(4,1,2,2,3,'ACTIVO','2015-10-22 22:39:10','2015-10-29 22:38:08'),(5,1,3,1,3,'ACTIVO','2015-10-22 22:39:10','2015-10-29 22:38:08'),(6,1,3,2,3,'ACTIVO','2015-10-22 22:39:10','2015-10-29 22:38:08');
/*!40000 ALTER TABLE `inventarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medidas`
--

DROP TABLE IF EXISTS `medidas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medidas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prenda_id` varchar(45) NOT NULL,
  `medida` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL DEFAULT 'CREADA',
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medidas`
--

LOCK TABLES `medidas` WRITE;
/*!40000 ALTER TABLE `medidas` DISABLE KEYS */;
INSERT INTO `medidas` VALUES (1,'1','Grande','CREADA','2015-10-22 22:39:34','2015-10-29 04:52:07'),(2,'1','Mediana','CREADA','2015-10-22 22:39:34','2015-10-29 04:52:07'),(3,'1','Chica','CREADA','2015-10-22 22:39:34','2015-10-29 04:52:07');
/*!40000 ALTER TABLE `medidas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mensajes`
--

DROP TABLE IF EXISTS `mensajes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mensajes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `origen` varchar(45) NOT NULL DEFAULT 'SISTEMA',
  `user_id` int(11) NOT NULL,
  `texto` text NOT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `status` varchar(45) DEFAULT 'SINLEER',
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mensajes`
--

LOCK TABLES `mensajes` WRITE;
/*!40000 ALTER TABLE `mensajes` DISABLE KEYS */;
INSERT INTO `mensajes` VALUES (1,'SISTEMA',1,'Hemos recibido tu solicitud de nueva prenda, el folio de tu solicitud es 1_1, nuestro equipo lo evualará en unos momentos. Por favor espera el mensaje de respuesta para continuar con el proceso. Si tienes dudas sobre el proceso para que tu prenda sea puesta en venta revisa nuestra sección de PROCESO DE SUBIDA','/public/solicitudes/1_2851African Daisy.gif','CONTESTADO','2015-10-22 22:39:34','2015-10-27 00:28:45'),(2,'SISTEMA',1,'Hemos recibido tu solicitud para modificar datos de prenda, el folio de tu prenda es 1_1, nuestro equipo lo evualará en unos momentos. Por favor espera el mensaje de respuesta para continuar con el proceso. Si tienes dudas sobre el proceso para que tu prenda sea puesta en venta revisa nuestra sección de PROCESO DE SUBIDA','/public/solicitudes/1_9127Bluehound.gif','CONTESTADO','2015-10-23 17:07:22','2015-10-27 00:28:45'),(3,'USUARIO',1,'Hola, quería preguntar cómo va mi aprobación para mi prenda con folio 1_1 ? Saludos','/public/mensajesImg/1_4013Diamond Round.gif','CONTESTADO','2015-10-23 18:07:37','2015-10-27 00:28:45'),(4,'USUARIO',1,'Además quería felicitarlos por una excelente plataforma e idea :D','/public/mensajesImg/1_4572Princess Square.gif','CONTESTADO','2015-10-23 18:08:26','2015-10-27 00:28:45'),(5,'ADMINISTRADOR',1,'Con respecto a bla bla bla','/public/mensajesImg/2_6351Jupiter.gif','CONTESTADO','2015-10-23 18:43:42','2015-10-27 00:28:45'),(6,'ADMINISTRADOR',1,'prueba de respuesta','','SINLEER','2015-10-26 18:28:45','2015-10-27 00:28:45');
/*!40000 ALTER TABLE `mensajes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2012_12_06_225921_migration_cartalyst_sentry_install_users',1),('2012_12_06_225929_migration_cartalyst_sentry_install_groups',1),('2012_12_06_225945_migration_cartalyst_sentry_install_users_groups_pivot',1),('2012_12_06_225988_migration_cartalyst_sentry_install_throttle',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prendas`
--

DROP TABLE IF EXISTS `prendas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prendas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `precio` varchar(45) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `descripcionPublico` text NOT NULL,
  `descripcionDetallada` text NOT NULL,
  `status` varchar(45) NOT NULL DEFAULT 'SOLICITADA',
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `banderaSubasta` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prendas`
--

LOCK TABLES `prendas` WRITE;
/*!40000 ALTER TABLE `prendas` DISABLE KEYS */;
INSERT INTO `prendas` VALUES (1,1,'titulo','100',3,'123','456','ACTIVA','2015-10-22 22:39:34','2015-10-29 22:57:34',0);
/*!40000 ALTER TABLE `prendas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `throttle`
--

DROP TABLE IF EXISTS `throttle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `throttle` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attempts` int(11) NOT NULL DEFAULT '0',
  `suspended` tinyint(1) NOT NULL DEFAULT '0',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `last_attempt_at` timestamp NULL DEFAULT NULL,
  `suspended_at` timestamp NULL DEFAULT NULL,
  `banned_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `throttle_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `throttle`
--

LOCK TABLES `throttle` WRITE;
/*!40000 ALTER TABLE `throttle` DISABLE KEYS */;
INSERT INTO `throttle` VALUES (1,1,NULL,0,0,0,NULL,NULL,NULL),(2,2,NULL,0,0,0,NULL,NULL,NULL);
/*!40000 ALTER TABLE `throttle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `activation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated_at` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `persist_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reset_password_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `banderaVendedor` int(2) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_activation_code_index` (`activation_code`),
  KEY `users_reset_password_code_index` (`reset_password_code`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'luisgnava@gmail.com','$2y$10$953ZibG69Ka3jWkuZDBtwuLCELd.Tn/4k0pLyhLpVPOXa1BDnjAfi',NULL,1,NULL,'2015-10-08 20:17:10','2015-10-29 22:57:56','$2y$10$uqZ7KsnjleKVcIfOBoSBY.Gf1o3qXswIJO3vLGqEWIYhofbyF2aUm',NULL,'Germán Nava',NULL,'2015-10-08 20:16:57','2015-10-29 22:57:56',3),(2,'gnava@digitalartsnetwork.com.mx','$2y$10$VlYzcPTzwkRDZ1ckjzf1B.QxXtYO3QBTubcBmXeqXopvbw1ayd1VW',NULL,1,NULL,'2015-10-23 22:44:07','2015-10-29 22:04:57','$2y$10$VPwxofYfMmOA8ocgd65JrOJwCrsTl50rFLw7Zesqo.IiJile//Hxa',NULL,'Gelto Gel',NULL,'2015-10-23 22:43:34','2015-10-29 22:04:57',82);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_groups` (
  `user_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_groups`
--

LOCK TABLES `users_groups` WRITE;
/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_groups` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-10-29 12:13:17
