-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: whitecoffee
-- ------------------------------------------------------
-- Server version	8.0.30

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (2,'Noodles','2022-10-20 04:51:43','2022-10-20 04:51:43'),(3,'Bread & Toast','2022-11-15 18:03:51','2022-11-15 18:03:51'),(4,'Rice','2022-11-15 18:03:59','2022-11-15 18:03:59'),(5,'Beverages','2022-11-15 18:04:08','2022-11-15 18:04:08'),(6,'Dim Sum','2022-11-15 18:05:26','2022-11-15 18:05:26');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_completed`
--

DROP TABLE IF EXISTS `customer_completed`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customer_completed` (
  `customer_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` decimal(8,2) NOT NULL,
  `sum_cost` decimal(8,2) NOT NULL,
  `menu_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_table` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completed_at` date NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_completed`
--

LOCK TABLES `customer_completed` WRITE;
/*!40000 ALTER TABLE `customer_completed` DISABLE KEYS */;
INSERT INTO `customer_completed` VALUES ('cus_MoD6ctyY7HXgrK','Adam','Imran','adamimran812@gmail.com','017-764-8861',20.00,10.00,'BBQ Chicken Wantan','1','5','2022-11-16'),('cus_MoHMFhAFXafrUT','Adam','Imran','adamimran812@gmail.com','017-764-8861',20.00,10.00,'BBQ Chicken Wantan','1','1','2022-11-22');
/*!40000 ALTER TABLE `customer_completed` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_order`
--

DROP TABLE IF EXISTS `customer_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customer_order` (
  `customer_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` decimal(8,2) NOT NULL,
  `sum_cost` decimal(8,2) NOT NULL,
  `menu_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_table` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ordered_at` datetime NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_order`
--

LOCK TABLES `customer_order` WRITE;
/*!40000 ALTER TABLE `customer_order` DISABLE KEYS */;
INSERT INTO `customer_order` VALUES ('cus_MoKvvIKZt5lLeD','Adam','Imran','adamimran221@gmail.com','0177648861',20.00,10.00,'BBQ Chicken Wantan','1','Verifying','6','2022-11-16 09:49:49'),('cus_MoKwkfdQl46Avp','Adam','Imran','adamimran221@gmail.com','0177648861',20.00,10.00,'BBQ Chicken Wantan','1','Verifying','6','2022-11-16 09:50:51'),('cus_MoKxinELF0kHeX','Adam','Imran','adamimran221@gmail.com','0177648861',20.00,10.00,'BBQ Chicken Wantan','1','Verifying','6','2022-11-16 09:51:56'),('cus_MoKzOQptFIaQ3k','Adam','Imran','adamimran221@gmail.com','0177648861',20.00,10.00,'BBQ Chicken Wantan','1','Verifying','6','2022-11-16 09:53:25'),('cus_MoKzrc5DBy4OUm','Adam','Imran','adamimran221@gmail.com','0177648861',20.00,10.00,'BBQ Chicken Wantan','1','Verifying','6','2022-11-16 09:53:36'),('cus_MoL1GVAugKF2Sz','Adam','Imran','adamimran221@gmail.com','0177648861',20.00,10.00,'BBQ Chicken Wantan','1','Verifying','6','2022-11-16 09:55:35'),('cus_MoL1Lgc78fI3zb','Adam','Imran','adamimran221@gmail.com','0177648861',20.00,10.00,'BBQ Chicken Wantan','1','Verifying','6','2022-11-16 09:55:24'),('cus_MoL1PMfBl7oDj4','Adam','Imran','adamimran221@gmail.com','0177648861',20.00,10.00,'BBQ Chicken Wantan','1','Verifying','6','2022-11-16 09:55:48'),('cus_Mp9VlL4vREYCOq','Syed','Zulkifli','adamimran812@gmail.com','017-764-8851',20.00,10.00,'BBQ Chicken Wantan','1','Verifying','1','2022-11-18 14:05:58');
/*!40000 ALTER TABLE `customer_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
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
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menus` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost_price` decimal(8,2) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selling_price` decimal(8,2) NOT NULL,
  `category_id` bigint unsigned NOT NULL,
  `menu_images` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menus_category_id_foreign` (`category_id`),
  CONSTRAINT `menus_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (1,'BBQ Chicken Wantan',10.00,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and',20.00,2,'menu_images/ud1buORqztQ6iTiF586nwrI2qOjMffwi4u2mRWo5.png','2022-10-20 04:52:38','2022-10-20 04:52:38'),(2,'NS Curry Mee',10.00,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s',20.00,2,'menu_images/x0tx2KGbVN9HcDulErfNZKpjL03jkIRALFxhiURR.png','2022-10-20 04:53:27','2022-10-20 04:53:27'),(4,'Peanut Butter Toast',2.00,'Bread & Toast with Peanut Butter',4.99,3,'menu_images/vbQUFKnJpEG8parPhZ1JOhkt8oGKBl0Om3t5GWCR.png','2022-11-15 18:06:03','2022-11-15 18:06:03'),(5,'Chicken Cheese  Toast',5.00,'Toasted Bread with chicken and cheese',8.99,3,'menu_images/fMhZXa8PBLY25qa6ajDrYnL9OAWccClNwKaJIy4u.png','2022-11-15 18:06:59','2022-11-15 18:06:59'),(6,'Original Roasted Oolong Milk Tea',4.00,'Roasted Oolong with milk tea',9.99,5,'menu_images/WkDb5pMNDDe12SzZPoGqL3u1u1wJQ9Nnlcrkjclu.png','2022-11-15 18:08:16','2022-11-15 18:08:16'),(7,'Steamed Dim Sum (4 Pieces)',8.00,'Steamed Dim sum',15.99,6,'menu_images/licS7t4f9YHgBz10jlGEIb4Tu50ZV1CoarODrmWS.png','2022-11-15 18:08:50','2022-11-15 18:08:50'),(8,'Nasi Lemak Ayam Crispy',5.00,'Nasi Lemak with Fried Chicken',16.99,4,'menu_images/R2pQkezJNr9ZBwQlMRdnJUzL9vshzPNofgqhLpJ6.png','2022-11-15 18:20:22','2022-11-15 18:20:22');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2022_09_03_160724_add_role_column_to_users',1),(6,'2022_09_04_114602_add_image_to_users',1),(7,'2022_10_02_124806_create_categories_table',1),(8,'2022_10_02_124853_create_menus_table',1),(11,'2022_10_27_111905_create_customer_order_table',2),(14,'2022_11_05_093555_create_customer_completed_table',3),(16,'2022_11_05_114219_create_report_table',4);
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
INSERT INTO `password_resets` VALUES ('adamimran957@gmail.com','$2y$10$cuTHQMef6Eu/sLU4fGzNFu5kYCLed.GTNApPJV41UkAjOV3qW6Mq2','2022-11-03 05:46:21'),('adamimran@gmail.com','$2y$10$jYy2LDR1GWm0ZF3V7nyB/eFDQG/4r7.nwwcA0mIPm/ZIb0COHt9eC','2022-11-18 06:06:45');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
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
-- Table structure for table `report`
--

DROP TABLE IF EXISTS `report`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `report` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `generated_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sales` decimal(8,2) NOT NULL,
  `cost` decimal(8,2) NOT NULL,
  `profit` decimal(8,2) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `report_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `report`
--

LOCK TABLES `report` WRITE;
/*!40000 ALTER TABLE `report` DISABLE KEYS */;
INSERT INTO `report` VALUES (9,'Adam Imran',20.00,10.00,10.00,'daily','2022-11-16');
/*!40000 ALTER TABLE `report` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '$2y$10$vTkOmeBjsnX4IBkxD977o.xKQvRzfXnaPfBRQwzKU.wC2Rkk5Oj3S',
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` enum('staff','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'staff',
  `profile_images` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Adam','Imran','2002-02-11','adamimran@gmail.com','0199218821','$2y$10$7WXWdtHYoXhOcz8zsvJDoOTrFv0fd0sRtCsvbl2UpjdSt0iz0aRAm','Jalan Sultan Yahya Petra Kampung Datuk Keramat 54100 Kuala Lumpur Wilayah Persekutuan Kuala Lumpur','S6ouQ4FgDZnYMauOlyVirqxZYAVxyI1wlpLC1AhDP4zFbQJOzbJPupDvC698','2022-10-20 12:49:18','2022-11-15 18:16:20','admin',NULL),(2,'Ahmad','Rizal','0011-05-04','ahmadrizal@gmail.com','0177648862','$2y$10$vTkOmeBjsnX4IBkxD977o.xKQvRzfXnaPfBRQwzKU.wC2Rkk5Oj3S','8, Jalan Maktab, Kampung Datuk Keramat, 54000 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur',NULL,'2022-11-15 18:01:37','2022-11-15 18:01:37','staff','profile_images/trNWCkOzZy0Uik9pMBpOGblcbBW4Mq4EhhCYR1Km.jpg'),(3,'Abd','Hadi','2002-03-06','abdhadi@gmail.com','0177638812','$2y$10$vTkOmeBjsnX4IBkxD977o.xKQvRzfXnaPfBRQwzKU.wC2Rkk5Oj3S','8, Jalan Maktab, Kampung Datuk Keramat, 54000 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur',NULL,'2022-11-15 18:09:57','2022-11-15 18:09:57','staff',NULL),(4,'Ismail','Sab','2022-02-09','ismailsab@gmail.com','0177648863','$2y$10$vTkOmeBjsnX4IBkxD977o.xKQvRzfXnaPfBRQwzKU.wC2Rkk5Oj3S','8, Jalan Maktab, Kampung Datuk Keramat, 54000 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur',NULL,'2022-11-15 18:11:24','2022-11-15 18:11:24','staff',NULL),(5,'Ilias','Zulkifli','2000-05-30','ilias@gmail.com','0177644864','$2y$10$vTkOmeBjsnX4IBkxD977o.xKQvRzfXnaPfBRQwzKU.wC2Rkk5Oj3S','8, Jalan Maktab, Kampung Datuk Keramat, 54000 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur',NULL,'2022-11-15 18:12:26','2022-11-15 18:12:26','staff',NULL),(6,'Zaidi','Iris','2002-03-06','zaidi46Rossi@gmail.com','0177644464','$2y$10$vTkOmeBjsnX4IBkxD977o.xKQvRzfXnaPfBRQwzKU.wC2Rkk5Oj3S','8, Jalan Maktab, Kampung Datuk Keramat, 54000 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur',NULL,'2022-11-15 18:13:32','2022-11-15 18:13:32','staff',NULL),(7,'Syed','Zulkhairul','2002-11-07','syedzul@gmail.com','0177634812','$2y$10$vTkOmeBjsnX4IBkxD977o.xKQvRzfXnaPfBRQwzKU.wC2Rkk5Oj3S','8, Jalan Maktab, Kampung Datuk Keramat, 54000 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur',NULL,'2022-11-15 18:14:42','2022-11-15 18:14:42','staff',NULL);
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

-- Dump completed on 2022-11-25 13:58:30
