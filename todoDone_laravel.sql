-- MySQL dump 10.13  Distrib 8.0.19, for osx10.15 (x86_64)
--
-- Host: localhost    Database: todoDone_laravel
-- ------------------------------------------------------
-- Server version	8.0.19

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
-- Table structure for table `dones`
--

DROP TABLE IF EXISTS `dones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dones` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` int unsigned NOT NULL,
  `calender_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `dones_user_id_foreign` (`user_id`),
  CONSTRAINT `dones_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dones`
--

LOCK TABLES `dones` WRITE;
/*!40000 ALTER TABLE `dones` DISABLE KEYS */;
INSERT INTO `dones` VALUES (1,22,'就寝',1,'2020-03-20','2020-03-25 06:06:34','2020-03-25 09:50:19'),(3,22,'変更',14,'2020-03-20','2020-03-25 06:10:44','2020-03-25 06:57:41'),(5,22,'夜ご飯',20,'2020-03-20','2020-03-25 06:31:02','2020-03-25 06:58:10'),(8,22,'勉強',11,'2020-03-20','2020-03-25 09:36:16','2020-03-25 09:36:16'),(9,22,'eee',5,'2020-03-20','2020-03-25 09:58:02','2020-03-25 09:58:02'),(10,25,'テスt',1,'2020-03-20','2020-03-27 04:47:03','2020-03-27 04:47:03'),(11,25,'Auth::user()',10,'2020-03-20','2020-03-27 04:47:18','2020-03-27 04:47:18'),(21,25,'テスt',5,'2020-03-22','2020-03-27 04:56:46','2020-03-27 04:56:50');
/*!40000 ALTER TABLE `dones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `memos`
--

DROP TABLE IF EXISTS `memos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `memos` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `todo_id` int unsigned NOT NULL,
  `memo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `memos_todo_id_foreign` (`todo_id`),
  CONSTRAINT `memos_todo_id_foreign` FOREIGN KEY (`todo_id`) REFERENCES `todos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `memos`
--

LOCK TABLES `memos` WRITE;
/*!40000 ALTER TABLE `memos` DISABLE KEYS */;
INSERT INTO `memos` VALUES (14,76,'bbbb','2020-03-24 10:03:36','2020-03-24 10:03:36'),(15,68,'bbbb','2020-03-24 10:04:44','2020-03-24 10:04:44'),(16,68,'hhhh','2020-03-24 10:04:46','2020-03-24 10:04:46'),(17,77,'gggg','2020-03-24 10:05:01','2020-03-24 10:05:01'),(18,78,'kfkfk','2020-03-24 10:05:13','2020-03-24 10:05:13'),(19,46,'uuuu','2020-03-24 13:28:54','2020-03-24 13:28:54'),(20,46,'llll','2020-03-24 13:28:58','2020-03-24 13:28:58'),(30,80,'野菜','2020-03-24 14:46:11','2020-03-24 14:46:11'),(33,80,'aaaa','2020-03-24 14:54:25','2020-03-24 14:54:25'),(35,73,'更新後','2020-03-25 09:58:54','2020-03-25 10:00:07'),(36,88,'変更しました。','2020-03-27 04:58:40','2020-03-27 05:00:25'),(38,85,'野菜','2020-03-27 05:00:46','2020-03-27 05:00:46'),(39,85,'運動しました。','2020-03-27 05:00:50','2020-03-27 05:00:58'),(40,89,'aaaa','2020-03-27 05:34:31','2020-03-27 05:34:31');
/*!40000 ALTER TABLE `memos` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (13,'2014_10_12_000000_create_users_table',1),(14,'2014_10_12_100000_create_password_resets_table',1),(15,'2019_08_19_000000_create_failed_jobs_table',1),(16,'2020_03_18_110952_create_todos_table',1),(17,'2020_03_18_111038_create_dones_table',1),(18,'2020_03_18_111124_create_memos_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` VALUES ('aaa@com','$2y$10$97u7O0.7bDQvnEdYP.o.n.IStqh6sXumIZIWoPlBX7NplE99Jmp8G','2020-03-27 05:09:10');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `todos`
--

DROP TABLE IF EXISTS `todos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `todos` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` int unsigned NOT NULL,
  `calender_date` date NOT NULL,
  `state` int unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `todos_user_id_foreign` (`user_id`),
  CONSTRAINT `todos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `todos`
--

LOCK TABLES `todos` WRITE;
/*!40000 ALTER TABLE `todos` DISABLE KEYS */;
INSERT INTO `todos` VALUES (46,22,'numquam',20,'2020-03-20',1,'2020-03-21 06:57:33','2020-03-24 05:38:54'),(47,22,'veniam',23,'2020-03-20',0,'2020-03-21 06:57:33','2020-03-24 09:24:28'),(51,23,'sunt',9,'2020-03-20',0,'2020-03-21 06:57:33','2020-03-21 06:57:33'),(52,23,'maxime',2,'2020-03-20',0,'2020-03-21 06:57:33','2020-03-21 06:57:33'),(53,23,'officiis',20,'2020-03-20',0,'2020-03-21 06:57:33','2020-03-21 06:57:33'),(54,23,'placeat',6,'2020-03-20',0,'2020-03-21 06:57:33','2020-03-21 06:57:33'),(55,23,'blanditiis',13,'2020-03-20',0,'2020-03-21 06:57:33','2020-03-21 06:57:33'),(56,24,'dolores',7,'2020-03-20',0,'2020-03-21 06:57:33','2020-03-21 06:57:33'),(57,24,'itaque',6,'2020-03-20',0,'2020-03-21 06:57:33','2020-03-21 06:57:33'),(58,24,'est',18,'2020-03-20',0,'2020-03-21 06:57:33','2020-03-21 06:57:33'),(59,24,'itaque',2,'2020-03-20',0,'2020-03-21 06:57:33','2020-03-21 06:57:33'),(60,24,'ut',10,'2020-03-20',0,'2020-03-21 06:57:33','2020-03-21 06:57:33'),(66,22,'aaa',10,'2020-03-22',0,'2020-03-22 06:06:52','2020-03-22 06:06:52'),(68,22,'aaa',1,'2020-03-22',0,'2020-03-22 06:21:27','2020-03-22 06:21:27'),(70,22,'aaa',1,'2020-03-22',0,'2020-03-22 06:21:49','2020-03-22 06:21:49'),(73,22,'aaa',6,'2020-03-20',1,'2020-03-22 06:46:13','2020-03-25 09:58:35'),(76,22,'テスト',1,'2020-03-21',0,'2020-03-24 10:03:32','2020-03-24 10:03:32'),(77,22,'rrr',1,'2020-03-19',0,'2020-03-24 10:04:57','2020-03-24 10:04:57'),(78,22,'健康',8,'2020-03-19',0,'2020-03-24 10:05:08','2020-03-24 10:05:08'),(80,22,'健康',11,'2020-03-21',0,'2020-03-24 14:33:02','2020-03-24 14:33:02'),(82,22,'健康',1,'2020-03-20',1,'2020-03-25 09:58:41','2020-03-25 09:58:43'),(83,25,'user',7,'2020-03-19',1,'2020-03-27 04:43:56','2020-03-27 04:49:24'),(85,25,'健康',1,'2020-03-20',0,'2020-03-27 04:47:31','2020-03-27 04:47:31'),(86,25,'投稿',13,'2020-03-20',0,'2020-03-27 04:47:44','2020-03-27 04:47:44'),(87,25,'userの変更完了',14,'2020-03-19',1,'2020-03-27 04:49:18','2020-03-27 04:49:22'),(88,25,'aaa',6,'2020-03-22',0,'2020-03-27 04:50:40','2020-03-27 04:50:40'),(89,26,'健康',1,'2020-03-27',0,'2020-03-27 05:32:43','2020-03-27 05:32:43');
/*!40000 ALTER TABLE `todos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (22,'廣川 加奈','sayuri90@example.net','2020-03-21 06:57:33','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','tPpRSWbO6B','2020-03-21 06:57:33','2020-03-21 06:57:33'),(23,'鈴木 太一','satomi86@example.net','2020-03-21 06:57:33','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','VmLg7Ov2yj','2020-03-21 06:57:33','2020-03-21 06:57:33'),(24,'中村 陽子','tanabe.kyosuke@example.org','2020-03-21 06:57:33','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','eJqqizFoRP','2020-03-21 06:57:33','2020-03-21 06:57:33'),(25,'aaaa','aaa@com',NULL,'$2y$10$d68KOMglHnz3GNh9QHFiYOUpM1.C8uC8GJg5WGey9RX8w35CzwYM2','7l3GmsYG0XczohC0BZvxm5wl0SdDenJDyc0GvpyiHZ7FD3WN8JqQy6GLZHBJ','2020-03-27 03:23:46','2020-03-27 03:23:46'),(26,'bbbb','bbb@com',NULL,'$2y$10$xyfVdIQDJgejd3uPOtk1qeGiGuGHxZHtC3iyporHgTtvFXLcRHzru',NULL,'2020-03-27 05:30:12','2020-03-27 05:30:12');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-03-27 18:40:16
