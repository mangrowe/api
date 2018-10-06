-- MySQL dump 10.13  Distrib 5.7.23, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: mangrowe
-- ------------------------------------------------------
-- Server version	5.7.23-0ubuntu0.18.04.1

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
-- Table structure for table `check_ins`
--

DROP TABLE IF EXISTS `check_ins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `check_ins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key_result_id` int(11) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `previous` decimal(10,2) NOT NULL,
  `current` decimal(10,2) NOT NULL,
  `confidance` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `check_ins`
--

LOCK TABLES `check_ins` WRITE;
/*!40000 ALTER TABLE `check_ins` DISABLE KEYS */;
INSERT INTO `check_ins` VALUES (1,5,2,20.00,79.00,2,'Quaerat rerum ea itaque.','2018-10-01 16:43:20','2018-10-01 16:43:20'),(2,7,26,1.00,73.00,2,'Libero ullam qui in consequuntur quibusdam.','2018-10-01 16:43:20','2018-10-01 16:43:20'),(3,9,29,15.00,83.00,3,'Vitae nobis ut sapiente praesentium.','2018-10-01 16:43:21','2018-10-01 16:43:21'),(4,6,30,13.00,68.00,1,'Consequuntur accusantium quisquam eos eaque inventore laborum.','2018-10-01 16:43:21','2018-10-01 16:43:21'),(5,2,17,30.00,79.00,1,'Ut sequi aut veritatis et sed minima quas sit.','2018-10-01 16:43:21','2018-10-01 16:43:21'),(6,7,7,21.00,75.00,2,'Ipsum ab quia occaecati veniam.','2018-10-01 16:43:21','2018-10-01 16:43:21'),(7,4,28,7.00,63.00,3,'Maxime non qui eligendi.','2018-10-01 16:43:21','2018-10-01 16:43:21'),(8,6,3,16.00,55.00,2,'Eos animi voluptatem corporis doloribus eligendi voluptatem porro labore.','2018-10-01 16:43:21','2018-10-01 16:43:21'),(9,2,9,21.00,53.00,1,'Expedita et non deleniti id veniam.','2018-10-01 16:43:21','2018-10-01 16:43:21'),(10,1,7,14.00,58.00,3,'Quam et voluptatem excepturi magni.','2018-10-01 16:43:21','2018-10-01 16:43:21'),(11,7,27,24.00,66.00,1,'Beatae enim eligendi velit omnis est.','2018-10-01 16:43:21','2018-10-01 16:43:21'),(12,1,23,10.00,89.00,3,'Accusamus doloremque adipisci deleniti illo voluptates.','2018-10-01 16:43:21','2018-10-01 16:43:21'),(13,3,29,46.00,64.00,3,'Accusamus quia voluptatem exercitationem.','2018-10-01 16:43:21','2018-10-01 16:43:21'),(14,5,23,49.00,76.00,3,'Aut et cum ut optio.','2018-10-01 16:43:21','2018-10-01 16:43:21'),(15,9,4,2.00,59.00,1,'Perferendis nihil ipsum blanditiis libero quod rerum.','2018-10-01 16:43:21','2018-10-01 16:43:21'),(16,4,12,50.00,71.00,3,'Labore aperiam nihil porro et nihil.','2018-10-01 16:43:21','2018-10-01 16:43:21'),(17,6,6,5.00,74.00,2,'Maiores nulla fugit officiis saepe itaque.','2018-10-01 16:43:21','2018-10-01 16:43:21'),(18,3,6,25.00,51.00,3,'Quia repellat omnis ut non sit.','2018-10-01 16:43:21','2018-10-01 16:43:21'),(19,3,14,38.00,84.00,1,'Aut nam modi ipsa.','2018-10-01 16:43:21','2018-10-01 16:43:21'),(20,5,16,49.00,79.00,2,'Maxime aut molestiae numquam ad id.','2018-10-01 16:43:21','2018-10-01 16:43:21'),(22,15,1,0.00,20.00,3,'Teste','2018-10-03 16:13:07','2018-10-03 16:13:07'),(23,15,1,20.00,30.00,3,'Teste','2018-10-03 16:13:17','2018-10-03 16:13:17'),(24,15,1,30.00,50.00,3,'Teste','2018-10-03 16:13:28','2018-10-03 16:13:28'),(25,15,1,50.00,60.00,3,'Teste','2018-10-03 16:13:40','2018-10-03 16:13:40'),(26,15,1,60.00,80.00,3,'Teste','2018-10-03 16:13:51','2018-10-03 16:13:51'),(28,14,1,100.00,100.00,3,'Teste','2018-10-03 16:31:53','2018-10-03 16:31:53'),(29,13,1,0.00,100.00,3,'Teste','2018-10-03 16:51:11','2018-10-03 16:51:11'),(30,11,1,100.00,80.00,3,'Teste','2018-10-03 17:04:49','2018-10-03 17:04:49'),(32,11,1,80.00,70.00,3,'Teste','2018-10-03 17:11:01','2018-10-03 17:11:01');
/*!40000 ALTER TABLE `check_ins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cycles`
--

DROP TABLE IF EXISTS `cycles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cycles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `organization_id` int(10) unsigned NOT NULL,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_at` date NOT NULL,
  `end_at` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cycles_organization_id_foreign` (`organization_id`),
  KEY `cycles_parent_id_foreign` (`parent_id`),
  CONSTRAINT `cycles_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`),
  CONSTRAINT `cycles_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `cycles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cycles`
--

LOCK TABLES `cycles` WRITE;
/*!40000 ALTER TABLE `cycles` DISABLE KEYS */;
INSERT INTO `cycles` VALUES (1,1,NULL,'sit ea dolorem aut','Qui maiores veritatis eaque ducimus reiciendis enim officia qui.','2018-01-01','2018-02-01','2018-10-01 16:43:19','2018-10-01 16:43:19'),(2,2,NULL,'sint occaecati incidunt deleniti','Aut nostrum reiciendis voluptates corrupti.','2018-02-01','2018-03-01','2018-10-01 16:43:19','2018-10-01 16:43:19'),(3,3,NULL,'fuga placeat quaerat iusto','Dignissimos veniam quo in ut maiores.','2018-03-01','2018-04-01','2018-10-01 16:43:19','2018-10-01 16:43:19'),(4,2,NULL,'culpa a commodi aut','Iure qui et est voluptate aliquid.','2018-04-01','2018-05-01','2018-10-01 16:43:19','2018-10-01 16:43:19');
/*!40000 ALTER TABLE `cycles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `organization_id` int(10) unsigned NOT NULL,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `departments_organization_id_foreign` (`organization_id`),
  KEY `departments_parent_id_foreign` (`parent_id`),
  CONSTRAINT `departments_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`),
  CONSTRAINT `departments_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departments`
--

LOCK TABLES `departments` WRITE;
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
INSERT INTO `departments` VALUES (1,1,NULL,'libero esse itaque eius','2018-10-01 16:43:19','2018-10-01 16:43:19'),(2,1,NULL,'ab eveniet dolore et','2018-10-01 16:43:19','2018-10-01 16:43:19'),(3,1,NULL,'reiciendis velit et quia','2018-10-01 16:43:19','2018-10-01 16:43:19'),(4,1,NULL,'dolor quia deserunt perferendis','2018-10-01 16:43:19','2018-10-01 16:43:19'),(5,1,NULL,'omnis neque enim fuga','2018-10-01 16:43:19','2018-10-01 16:43:19'),(6,1,NULL,'molestiae voluptatem explicabo et','2018-10-01 16:43:19','2018-10-01 16:43:19'),(7,1,NULL,'sit consequuntur aut aut','2018-10-01 16:43:19','2018-10-01 16:43:19'),(8,1,NULL,'ut totam dolor assumenda','2018-10-01 16:43:19','2018-10-01 16:43:19');
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `key_results`
--

DROP TABLE IF EXISTS `key_results`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `key_results` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `organization_id` int(10) unsigned NOT NULL,
  `objective_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `criteria` char(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `initial` decimal(10,2) NOT NULL,
  `current` decimal(10,2) NOT NULL,
  `target` decimal(10,2) NOT NULL,
  `done` tinyint(1) NOT NULL DEFAULT '0',
  `format` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `key_results`
--

LOCK TABLES `key_results` WRITE;
/*!40000 ALTER TABLE `key_results` DISABLE KEYS */;
INSERT INTO `key_results` VALUES (1,1,4,7,'sunt cupiditate quis','Molestiae nostrum eum consequuntur placeat repudiandae eaque.','boolean','gte',7.00,75.00,100.00,0,'currency','2018-10-01 16:43:20','2018-10-01 16:43:20'),(2,2,2,6,'incidunt eligendi maiores','Soluta sit sapiente omnis.','number','gte',10.00,72.00,100.00,0,'percentage','2018-10-01 16:43:20','2018-10-01 16:43:20'),(3,1,2,1,'aut sint eum','Totam et nemo omnis accusantium.','boolean','gte',19.00,79.00,100.00,0,'currency','2018-10-01 16:43:20','2018-10-01 16:43:20'),(4,2,1,7,'dolores explicabo modi','Saepe mollitia cumque quos a.','number','gte',2.00,74.00,100.00,0,'percentage','2018-10-01 16:43:20','2018-10-01 16:43:20'),(5,1,1,5,'vero dolorum voluptas','Facere maxime debitis et ad porro iusto a.','boolean','gte',27.00,73.00,100.00,0,'currency','2018-10-01 16:43:20','2018-10-01 16:43:20'),(6,2,2,9,'occaecati est consequatur','Modi rem voluptates et.','number','gte',1.00,78.00,100.00,0,'percentage','2018-10-01 16:43:20','2018-10-01 16:43:20'),(7,1,3,5,'dicta accusamus in','Dignissimos excepturi natus repellat inventore quaerat.','boolean','gte',17.00,87.00,100.00,0,'currency','2018-10-01 16:43:20','2018-10-01 16:43:20'),(8,2,2,8,'dolores consequatur omnis','Vero fugiat dicta possimus ea voluptas.','number','gte',20.00,67.00,100.00,0,'percentage','2018-10-01 16:43:20','2018-10-01 16:43:20'),(9,1,3,9,'quae at at','Temporibus ab doloremque cupiditate voluptatem provident et.','boolean','gte',8.00,70.00,100.00,0,'currency','2018-10-01 16:43:20','2018-10-01 16:43:20'),(10,2,3,6,'aut minima perferendis','Repudiandae doloremque debitis dolore sunt blanditiis et possimus vitae.','number','gte',14.00,75.00,100.00,0,'percentage','2018-10-01 16:43:20','2018-10-01 16:43:20'),(11,1,5,3,'KR 01','Teste','number','lte',100.00,70.00,0.00,1,'number','2018-10-01 17:47:04','2018-10-03 17:11:01'),(12,1,6,3,'KR 01','Teste','boolean',NULL,0.00,0.00,100.00,0,NULL,'2018-10-02 15:56:37','2018-10-02 15:56:37'),(13,1,7,3,'KR 01','Teste','boolean',NULL,0.00,100.00,100.00,1,NULL,'2018-10-02 17:05:51','2018-10-03 16:51:11'),(14,1,8,3,'KR 01','Teste','boolean',NULL,0.00,0.00,100.00,0,NULL,'2018-10-02 17:12:32','2018-10-03 17:11:24'),(15,1,9,3,'KR 01','Teste','number','gte',0.00,80.00,100.00,0,'number','2018-10-02 17:13:39','2018-10-03 16:13:50');
/*!40000 ALTER TABLE `key_results` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=180 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (166,'2018_08_23_120510_create_organizations_table',1),(167,'2018_08_23_120511_create_users_table',1),(168,'2018_08_23_120512_create_password_resets_table',1),(169,'2018_08_23_122039_create_organization_user_table',1),(170,'2018_08_25_101649_create_teams_table',1),(171,'2018_08_25_102529_create_team_user_table',1),(172,'2018_08_25_110217_create_cycles_table',1),(173,'2018_08_25_133950_create_departments_table',1),(174,'2018_08_25_133952_create_objectives_table',1),(175,'2018_08_25_145416_create_key_results_table',1),(176,'2018_08_25_173409_create_check_ins_table',1),(177,'2018_09_16_194730_create_settings_table',1),(178,'2018_09_26_123815_create_tags_table',1),(179,'2018_09_26_124137_create_objective_tag_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `objective_tag`
--

DROP TABLE IF EXISTS `objective_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `objective_tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `objective_id` int(10) unsigned NOT NULL,
  `tag_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `objective_tag_objective_id_foreign` (`objective_id`),
  KEY `objective_tag_tag_id_foreign` (`tag_id`),
  CONSTRAINT `objective_tag_objective_id_foreign` FOREIGN KEY (`objective_id`) REFERENCES `objectives` (`id`) ON DELETE CASCADE,
  CONSTRAINT `objective_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `objective_tag`
--

LOCK TABLES `objective_tag` WRITE;
/*!40000 ALTER TABLE `objective_tag` DISABLE KEYS */;
INSERT INTO `objective_tag` VALUES (1,1,1,NULL,NULL),(2,2,2,NULL,NULL),(3,3,3,NULL,NULL),(4,4,4,NULL,NULL),(5,4,5,NULL,NULL),(6,5,6,NULL,NULL),(8,5,8,NULL,NULL),(9,8,6,NULL,NULL),(10,8,8,NULL,NULL),(11,9,6,NULL,NULL),(12,9,8,NULL,NULL);
/*!40000 ALTER TABLE `objective_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `objectives`
--

DROP TABLE IF EXISTS `objectives`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `objectives` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `organization_id` int(10) unsigned NOT NULL,
  `department_id` int(10) unsigned NOT NULL,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `cycle_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `team_id` int(10) unsigned DEFAULT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `objectives_organization_id_foreign` (`organization_id`),
  KEY `objectives_department_id_foreign` (`department_id`),
  KEY `objectives_cycle_id_foreign` (`cycle_id`),
  KEY `objectives_user_id_foreign` (`user_id`),
  KEY `objectives_team_id_foreign` (`team_id`),
  KEY `objectives_parent_id_foreign` (`parent_id`),
  CONSTRAINT `objectives_cycle_id_foreign` FOREIGN KEY (`cycle_id`) REFERENCES `cycles` (`id`),
  CONSTRAINT `objectives_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`),
  CONSTRAINT `objectives_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`),
  CONSTRAINT `objectives_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `objectives` (`id`) ON DELETE CASCADE,
  CONSTRAINT `objectives_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`),
  CONSTRAINT `objectives_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `objectives`
--

LOCK TABLES `objectives` WRITE;
/*!40000 ALTER TABLE `objectives` DISABLE KEYS */;
INSERT INTO `objectives` VALUES (1,1,1,NULL,1,1,2,'strategic','cumque error odio sed','Nostrum voluptatem voluptatum voluptatem assumenda.','2018-10-01 16:43:19','2018-10-01 16:43:19'),(2,1,1,NULL,1,1,2,'strategic','incidunt velit porro voluptatem','Delectus aut sit molestias tenetur.','2018-10-01 16:43:19','2018-10-01 16:43:19'),(3,1,1,NULL,1,1,2,'strategic','officia sed saepe illo','Eos doloremque recusandae ipsum nesciunt enim similique non quae.','2018-10-01 16:43:19','2018-10-01 16:43:19'),(4,1,1,NULL,1,1,2,'strategic','suscipit rerum nisi velit','A consequatur rem aliquid libero aut.','2018-10-01 16:43:20','2018-10-01 16:43:20'),(5,1,6,4,1,2,3,'strategic','OKR 01','Teste','2018-10-01 16:48:48','2018-10-01 17:46:52'),(6,1,6,4,1,2,3,'strategic','OKR 01','Teste','2018-10-02 15:56:37','2018-10-02 15:56:37'),(7,1,6,4,1,2,3,'strategic','OKR 01','Teste','2018-10-02 17:05:51','2018-10-02 17:05:51'),(8,1,6,4,1,2,3,'strategic','OKR 01','Teste','2018-10-02 17:12:31','2018-10-02 17:12:31'),(9,1,6,4,1,2,3,'strategic','OKR 01','Teste','2018-10-02 17:13:39','2018-10-02 17:13:39');
/*!40000 ALTER TABLE `objectives` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `organization_user`
--

DROP TABLE IF EXISTS `organization_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `organization_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `organization_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `organization_user_organization_id_foreign` (`organization_id`),
  KEY `organization_user_user_id_foreign` (`user_id`),
  CONSTRAINT `organization_user_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`) ON DELETE CASCADE,
  CONSTRAINT `organization_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organization_user`
--

LOCK TABLES `organization_user` WRITE;
/*!40000 ALTER TABLE `organization_user` DISABLE KEYS */;
INSERT INTO `organization_user` VALUES (1,1,1,NULL,NULL),(2,1,2,NULL,NULL),(3,1,3,NULL,NULL),(4,2,4,NULL,NULL),(5,2,5,NULL,NULL),(6,2,6,NULL,NULL),(7,3,7,NULL,NULL),(8,3,8,NULL,NULL),(9,3,9,NULL,NULL),(10,4,10,NULL,NULL),(11,4,11,NULL,NULL),(12,4,12,NULL,NULL),(13,5,13,NULL,NULL),(14,5,14,NULL,NULL),(15,5,15,NULL,NULL),(16,6,16,NULL,NULL),(17,6,17,NULL,NULL),(18,6,18,NULL,NULL),(19,7,19,NULL,NULL),(20,7,20,NULL,NULL),(21,7,21,NULL,NULL),(22,8,22,NULL,NULL),(23,8,23,NULL,NULL),(24,8,24,NULL,NULL),(25,9,25,NULL,NULL),(26,9,26,NULL,NULL),(27,9,27,NULL,NULL),(28,10,28,NULL,NULL),(29,10,29,NULL,NULL),(30,10,30,NULL,NULL);
/*!40000 ALTER TABLE `organization_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `organizations`
--

DROP TABLE IF EXISTS `organizations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `organizations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organizations`
--

LOCK TABLES `organizations` WRITE;
/*!40000 ALTER TABLE `organizations` DISABLE KEYS */;
INSERT INTO `organizations` VALUES (1,'in quas facilis','2018-10-01 16:43:13','2018-10-01 16:43:13'),(2,'blanditiis non magni','2018-10-01 16:43:13','2018-10-01 16:43:13'),(3,'et aut soluta','2018-10-01 16:43:13','2018-10-01 16:43:13'),(4,'odit voluptatum omnis','2018-10-01 16:43:13','2018-10-01 16:43:13'),(5,'saepe assumenda dolores','2018-10-01 16:43:13','2018-10-01 16:43:13'),(6,'vel dolor vitae','2018-10-01 16:43:13','2018-10-01 16:43:13'),(7,'laboriosam necessitatibus quam','2018-10-01 16:43:13','2018-10-01 16:43:13'),(8,'animi et voluptatem','2018-10-01 16:43:13','2018-10-01 16:43:13'),(9,'sed non quisquam','2018-10-01 16:43:13','2018-10-01 16:43:13'),(10,'exercitationem libero modi','2018-10-01 16:43:13','2018-10-01 16:43:13');
/*!40000 ALTER TABLE `organizations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `organization_id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `info` int(11) NOT NULL,
  `additional` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `settings_organization_id_foreign` (`organization_id`),
  CONSTRAINT `settings_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,1,'eligendi','ruler',100,'green','2018-10-01 16:43:22','2018-10-01 16:43:22'),(2,1,'sed','ruler',70,'orange','2018-10-01 16:43:22','2018-10-01 16:43:22');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `organization_id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tags_organization_id_foreign` (`organization_id`),
  CONSTRAINT `tags_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES (1,3,'tempore','2018-10-01 16:43:22','2018-10-01 16:43:22'),(2,1,'sint','2018-10-01 16:43:22','2018-10-01 16:43:22'),(3,2,'repudiandae','2018-10-01 16:43:22','2018-10-01 16:43:22'),(4,1,'app','2018-10-01 16:48:12','2018-10-01 16:48:12'),(5,1,'desktop','2018-10-01 16:48:12','2018-10-01 16:48:12'),(6,1,'mobile','2018-10-01 16:48:48','2018-10-01 16:48:48'),(7,1,'web','2018-10-01 16:48:48','2018-10-01 16:48:48'),(8,1,'phone','2018-10-01 17:34:54','2018-10-01 17:34:54');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team_user`
--

DROP TABLE IF EXISTS `team_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `team_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `team_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `team_user_team_id_foreign` (`team_id`),
  KEY `team_user_user_id_foreign` (`user_id`),
  CONSTRAINT `team_user_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE,
  CONSTRAINT `team_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team_user`
--

LOCK TABLES `team_user` WRITE;
/*!40000 ALTER TABLE `team_user` DISABLE KEYS */;
INSERT INTO `team_user` VALUES (1,1,1,NULL,NULL),(2,1,2,NULL,NULL),(3,1,3,NULL,NULL),(4,2,2,NULL,NULL),(5,2,3,NULL,NULL),(6,2,4,NULL,NULL),(7,3,3,NULL,NULL),(8,3,4,NULL,NULL),(9,3,5,NULL,NULL),(10,4,4,NULL,NULL),(11,4,5,NULL,NULL),(12,4,6,NULL,NULL),(13,5,5,NULL,NULL),(14,5,6,NULL,NULL),(15,5,7,NULL,NULL);
/*!40000 ALTER TABLE `team_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teams` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `organization_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `teams_user_id_foreign` (`user_id`),
  CONSTRAINT `teams_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teams`
--

LOCK TABLES `teams` WRITE;
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;
INSERT INTO `teams` VALUES (1,1,1,'dolor dolorem','2018-10-01 16:43:17','2018-10-01 16:43:17'),(2,2,2,'alias est','2018-10-01 16:43:17','2018-10-01 16:43:17'),(3,1,3,'assumenda voluptatibus','2018-10-01 16:43:17','2018-10-01 16:43:17'),(4,2,4,'nobis alias','2018-10-01 16:43:17','2018-10-01 16:43:17'),(5,1,5,'quia quis','2018-10-01 16:43:17','2018-10-01 16:43:17');
/*!40000 ALTER TABLE `teams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_api_token_unique` (`api_token`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Jerrold Koelpin V','andi@php.net','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm','TTdNqrfhyMtFVytOzlBvaDdF1yO2tOrk5D72GfVPMY7O3bpbeUUnFIaqgVpY',NULL,'sJDOVNsbzr','2018-10-01 16:43:13','2018-10-04 15:22:15'),(2,'Alene Walker','pschinner@example.com','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,NULL,'JUEVWNUzqS','2018-10-01 16:43:13','2018-10-01 16:43:13'),(3,'Selmer Thompson','bernita38@example.net','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,NULL,'ZBkX7muYRp','2018-10-01 16:43:13','2018-10-01 16:43:13'),(4,'Francesco Dickens','bogan.pierre@example.org','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,NULL,'amehwZOmUp','2018-10-01 16:43:14','2018-10-01 16:43:14'),(5,'Francis Stanton','nikolaus.heath@example.org','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,NULL,'v12W1noc2H','2018-10-01 16:43:14','2018-10-01 16:43:14'),(6,'Dr. Mable Johns II','era32@example.com','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,NULL,'ROvLPNBF6B','2018-10-01 16:43:14','2018-10-01 16:43:14'),(7,'Ezra Keebler','csawayn@example.com','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,NULL,'WPmKQzRKux','2018-10-01 16:43:14','2018-10-01 16:43:14'),(8,'Prof. Dustin Krajcik','roob.louisa@example.org','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,NULL,'sec8V5qpqP','2018-10-01 16:43:14','2018-10-01 16:43:14'),(9,'Miss Ellen Shanahan','gharris@example.com','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,NULL,'FVVmRROR4X','2018-10-01 16:43:14','2018-10-01 16:43:14'),(10,'Novella Haley Jr.','ijenkins@example.org','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,NULL,'c6omYv8yY5','2018-10-01 16:43:14','2018-10-01 16:43:14'),(11,'Jerald Schuppe','ahmed.nitzsche@example.com','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,NULL,'3TdJfKpKFS','2018-10-01 16:43:14','2018-10-01 16:43:14'),(12,'Coy Barton','tyrel.kshlerin@example.net','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,NULL,'KI3KFM15Ke','2018-10-01 16:43:14','2018-10-01 16:43:14'),(13,'Jacques Tremblay','xconroy@example.com','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,NULL,'H4MoZBJyYG','2018-10-01 16:43:15','2018-10-01 16:43:15'),(14,'Modesto Ferry I','gkrajcik@example.net','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,NULL,'c4NkBOGhbN','2018-10-01 16:43:15','2018-10-01 16:43:15'),(15,'Dr. Litzy Johns V','telly72@example.org','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,NULL,'IoK2UDnved','2018-10-01 16:43:15','2018-10-01 16:43:15'),(16,'Prof. Iliana Macejkovic V','grant.kody@example.net','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,NULL,'H3bywbZKgY','2018-10-01 16:43:15','2018-10-01 16:43:15'),(17,'Oscar Leffler','margret19@example.net','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,NULL,'YRm0y4QoBD','2018-10-01 16:43:15','2018-10-01 16:43:15'),(18,'Brionna Erdman','nikko.littel@example.net','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,NULL,'n74jEq68rs','2018-10-01 16:43:15','2018-10-01 16:43:15'),(19,'May Stark MD','nitzsche.chelsie@example.org','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,NULL,'wtEYBBEXDL','2018-10-01 16:43:15','2018-10-01 16:43:15'),(20,'Shyanne Lindgren','crooks.cornell@example.org','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,NULL,'8hg3T97Kg6','2018-10-01 16:43:15','2018-10-01 16:43:15'),(21,'Aron Ritchie DVM','karlie.cormier@example.net','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,NULL,'hYrx2TlAcp','2018-10-01 16:43:15','2018-10-01 16:43:15'),(22,'Eloise Lockman','gerhold.nick@example.org','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,NULL,'Mzz3GGaBVG','2018-10-01 16:43:16','2018-10-01 16:43:16'),(23,'Dr. Macey Braun PhD','olson.hassan@example.org','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,NULL,'LJ62z50uNE','2018-10-01 16:43:16','2018-10-01 16:43:16'),(24,'Savanah Lueilwitz','stark.madelyn@example.com','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,NULL,'NtASSxhzjZ','2018-10-01 16:43:16','2018-10-01 16:43:16'),(25,'Kip Wiza','dedrick.kuhic@example.org','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,NULL,'cR9Wr2eC4o','2018-10-01 16:43:16','2018-10-01 16:43:16'),(26,'Dr. Millie Nienow V','jackeline35@example.com','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,NULL,'wm8H6pHvPV','2018-10-01 16:43:16','2018-10-01 16:43:16'),(27,'Dr. Pearlie Ryan III','abigayle96@example.org','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,NULL,'mHgIgTEwEo','2018-10-01 16:43:16','2018-10-01 16:43:16'),(28,'Amelie Pacocha','nlockman@example.net','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,NULL,'rPjPOUhrnd','2018-10-01 16:43:17','2018-10-01 16:43:17'),(29,'Bridie Schroeder','letitia35@example.net','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,NULL,'Q5kbZaLJGH','2018-10-01 16:43:17','2018-10-01 16:43:17'),(30,'Ethelyn Cassin','camden94@example.net','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',NULL,NULL,'NafLFYt0WH','2018-10-01 16:43:17','2018-10-01 16:43:17');
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

-- Dump completed on 2018-10-06 15:29:40
