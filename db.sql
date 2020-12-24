/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.14-MariaDB : Database - avantonline
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`avantonline` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `avantonline`;

/*Table structure for table `customer_info` */

DROP TABLE IF EXISTS `customer_info`;

CREATE TABLE `customer_info` (
  `cid` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL COMMENT 'connected to users table',
  `c_firstname` varchar(35) DEFAULT NULL,
  `c_lastname` varchar(35) DEFAULT NULL,
  `c_phone` varchar(30) DEFAULT NULL,
  `c_email` varchar(50) DEFAULT NULL,
  `c_address` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `customer_info` */

/*Table structure for table `customers` */

DROP TABLE IF EXISTS `customers`;

CREATE TABLE `customers` (
  `cid` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `user_firstname` varchar(191) DEFAULT NULL,
  `user_lastname` varchar(191) DEFAULT NULL,
  `user_email` varchar(191) DEFAULT NULL,
  `user_phone` varchar(191) DEFAULT NULL,
  `user_address` tinytext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `customers` */

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `feedbacks` */

DROP TABLE IF EXISTS `feedbacks`;

CREATE TABLE `feedbacks` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `temp_code` varchar(191) DEFAULT NULL,
  `feedback_by` int(10) DEFAULT NULL,
  `feedback_desc` tinytext DEFAULT NULL,
  `feedback_stars` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `feedbacks` */

insert  into `feedbacks`(`id`,`temp_code`,`feedback_by`,`feedback_desc`,`feedback_stars`,`created_at`,`updated_at`) values (1,'838509-1605880608',2,'test feedback only',5,'2020-12-06 21:20:35','2020-12-06 21:20:37'),(2,'838509-1605880608',3,'second feedback\r\n2nd feedback comment',3,'2020-12-06 21:20:35','2020-12-06 21:20:37');

/*Table structure for table `item_categories` */

DROP TABLE IF EXISTS `item_categories`;

CREATE TABLE `item_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_category` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_tags` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `item_categories` */

insert  into `item_categories`(`id`,`category`,`sub_category`,`category_tags`,`category_image`,`created_at`,`updated_at`) values (1,'Electronic Devices',NULL,NULL,'01.png',NULL,NULL),(2,'Electronic Accessories',NULL,NULL,'01.png',NULL,NULL),(3,'Fashion Accessories',NULL,NULL,'01.png',NULL,NULL),(4,'Home & Living',NULL,NULL,'01.png',NULL,NULL),(5,'Health & Beauty',NULL,NULL,'01.png',NULL,NULL),(6,'TV & Home Appliances',NULL,NULL,'01.png',NULL,NULL),(7,'Groceries',NULL,NULL,'01.png',NULL,NULL),(8,'Women’s Fashion',NULL,NULL,'01.png',NULL,NULL),(9,'Men’s Fashion',NULL,NULL,'01.png',NULL,NULL),(10,'Sports & Lifestyle',NULL,NULL,'01.png',NULL,NULL),(11,'Automotives & Motorcycles',NULL,NULL,'01.png',NULL,NULL),(12,'Services',NULL,NULL,'01.png',NULL,NULL);

/*Table structure for table `item_onsale` */

DROP TABLE IF EXISTS `item_onsale`;

CREATE TABLE `item_onsale` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `item_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_start` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_end` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `item_onsale` */

/*Table structure for table `item_ratings` */

DROP TABLE IF EXISTS `item_ratings`;

CREATE TABLE `item_ratings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `item_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_ratings` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `item_ratings` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2020_10_14_110910_create_posts_table',1),(5,'2020_11_02_204718_create_item_ratings_table',1),(6,'2020_11_02_204800_create_item_onsale_table',1),(7,'2020_11_02_215125_create_item_categories_table',1),(8,'2020_11_08_233920_create_uploads_table',1),(9,'2020_12_06_175415_create_orders_table',2),(10,'2020_12_06_183838_create_trackers_table',2),(11,'2020_12_14_201651_create_sessions_table',3);

/*Table structure for table `order_cart` */

DROP TABLE IF EXISTS `order_cart`;

CREATE TABLE `order_cart` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) DEFAULT NULL,
  `post_id` int(10) NOT NULL,
  `order_qty` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_price` decimal(10,2) DEFAULT NULL,
  `order_by_id` int(5) DEFAULT NULL,
  `session_code` varchar(35) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_status` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `order_cart` */

insert  into `order_cart`(`id`,`order_id`,`post_id`,`order_qty`,`order_price`,`order_by_id`,`session_code`,`order_status`,`created_at`,`updated_at`) values (1,NULL,5,'1',2300.00,NULL,'1608721655_833765','Checkout','2020-12-23 19:39:51','2020-12-23 23:34:06'),(2,NULL,1,'1',5000.00,NULL,'1608721655_833765','Checkout','2020-12-23 19:39:53','2020-12-23 23:34:06'),(3,NULL,6,'1',50000.00,NULL,'1608721655_833765','Checkout','2020-12-23 19:39:54','2020-12-23 23:34:06'),(4,NULL,2,'1',4500.00,NULL,'1608721655_833765','Checkout','2020-12-23 23:16:51','2020-12-23 23:34:06');

/*Table structure for table `orders` */

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `cid` bigint(20) DEFAULT NULL,
  `order_shipping_fee` decimal(10,2) DEFAULT NULL,
  `msgtoSeller` text DEFAULT NULL,
  `paymentmethod` varchar(50) DEFAULT NULL,
  `tracking_id` varchar(50) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `orders` */

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `posts` */

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `temp_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_tags` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_qty` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_model` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_brand` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `item_width` decimal(5,2) DEFAULT NULL,
  `item_height` decimal(5,2) DEFAULT NULL,
  `item_length` decimal(5,2) DEFAULT NULL,
  `item_weight` decimal(5,2) DEFAULT NULL,
  `price_new` decimal(10,2) DEFAULT NULL,
  `price_old` decimal(10,2) DEFAULT NULL,
  `discount_percentage` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_start` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_end` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `shipping_fee` decimal(5,2) DEFAULT NULL,
  `shipping_disc` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `posts` */

insert  into `posts`(`id`,`temp_code`,`title`,`description`,`category_id`,`item_name`,`item_tags`,`item_code`,`item_qty`,`item_model`,`item_color`,`item_size`,`item_brand`,`item_status`,`item_width`,`item_height`,`item_length`,`item_weight`,`price_new`,`price_old`,`discount_percentage`,`discount_start`,`discount_end`,`user_id`,`created_at`,`updated_at`,`shipping_fee`,`shipping_disc`) values (1,'838509-1605880608','Watch T1234 Silver','Watch T1234 Silver\nAbout Avant\nAffiliate Program\nPrivacy Policy\nTerms & Conditions\nIntellectual Property Protection','1','Watch-T1234',NULL,'Watch-001','12','T1234','Silver','M','Watch',NULL,14.00,5.00,5.00,4.00,5000.00,6000.00,NULL,NULL,NULL,'1','2020-11-20 21:58:49','2020-12-16 21:43:43',90.00,90.00),(2,'185328-1605880736','Bench Jacket P-2312 Yellow','Property of the Day!!\n2BR Unit For Lease in Avida Tower 34th Street BGC\nLocated along 34th St, Taguig, 1634 Metro Manila\n\nIt’s now or never. Don’t miss out the best chance to experience the elegance of modern craftsmanship, perfectly suitable for young couples.','9','Jacket',NULL,'Jacket-001','22','P-2312',NULL,NULL,'Bench',NULL,NULL,NULL,NULL,NULL,4500.00,4800.00,NULL,NULL,NULL,'1','2020-11-20 22:00:02','2020-12-09 22:12:32',50.00,NULL),(3,'830953-1605882654','iPhone X Pro Plus','iPhone X Pro Plus','4','iPhone X',NULL,'Phone-001',NULL,'X',NULL,NULL,'iPhone',NULL,NULL,NULL,NULL,NULL,45000.00,50000.00,NULL,NULL,NULL,'1','2020-11-20 22:32:22','2020-11-20 22:32:22',NULL,NULL),(5,'273210-1606140420','Bench Jacket XDD','23','4','Jacket',NULL,'Jacket-04','343','XDD','Black','M','Bench',NULL,5.00,5.00,5.00,0.50,5000.00,6500.00,NULL,NULL,NULL,'1','2020-11-23 22:12:07','2020-12-09 22:12:27',50.00,NULL),(6,'112120-1606141575','iPhone X++ Pro Plus','test','2','iPhone X++','iphone','Phone-002','20','X++','Silver','7in','iPhone',NULL,5.00,7.00,10.00,1.00,50000.00,60000.00,NULL,NULL,NULL,'1','2020-11-23 22:27:49','2020-12-09 21:50:22',50.00,NULL),(7,'401153-1606142419','iPhone Xi++ Pro Plus','test','2','iPhone Xi++',NULL,'Phone-004','10','Xi++','Black','7in','iPhone',NULL,5.00,5.00,10.00,1.00,45000.00,60000.00,NULL,NULL,NULL,'1','2020-11-23 22:41:32','2020-12-09 21:52:11',50.00,NULL);

/*Table structure for table `sessions` */

DROP TABLE IF EXISTS `sessions`;

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  UNIQUE KEY `sessions_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sessions` */

/*Table structure for table `trackers` */

DROP TABLE IF EXISTS `trackers`;

CREATE TABLE `trackers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tracking_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tracking_date` datetime DEFAULT NULL,
  `tracking_status` datetime DEFAULT NULL,
  `tracking_incharge` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `trackers` */

/*Table structure for table `uploads` */

DROP TABLE IF EXISTS `uploads`;

CREATE TABLE `uploads` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `imglink` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `temp_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `uploads` */

insert  into `uploads`(`id`,`imglink`,`temp_code`,`created_at`,`updated_at`) values (2,'13.jpg','185328-1605880736',NULL,NULL),(3,'2.jpg','830953-1605882654',NULL,NULL),(7,'14.jpg','273210-1606140420',NULL,NULL),(8,'7.jpg','112120-1606141575',NULL,NULL),(9,'2.jpg','401153-1606142419',NULL,NULL),(10,'5.jpg','838509-1605880608',NULL,NULL),(11,'3.jpg','838509-1605880608',NULL,NULL),(12,'12.jpg','838509-1605880608',NULL,NULL);

/*Table structure for table `user_session` */

DROP TABLE IF EXISTS `user_session`;

CREATE TABLE `user_session` (
  `sessionID` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `session_code` varchar(50) DEFAULT NULL,
  `login_timestamp` datetime DEFAULT NULL,
  `last_timestamp` datetime DEFAULT NULL,
  PRIMARY KEY (`sessionID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `user_session` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `screenname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobileno` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telno` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_account` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_accountname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agreement` timestamp NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`password`,`firstname`,`lastname`,`screenname`,`mobileno`,`telno`,`address`,`user_status`,`bank_account`,`bank_accountname`,`bank_type`,`bank_name`,`bank_address`,`user_type`,`user_agreement`,`email_verified_at`,`remember_token`,`created_at`,`updated_at`) values (1,'Phey789634','camuaphey@gmail.com','$2y$10$yemRoDV2LN9UbQKRt3b5zegtAxUZWgW4jbG1MqhFMjbEqyXe4TVGi','Phey','Camua','Phey789634','091515231',NULL,NULL,'Active',NULL,NULL,NULL,NULL,NULL,'SuperAdmin',NULL,NULL,'Tjk3DeZrgG0ZlZZlLn2U854i9aeizrPa4gKi0PcpQGq3uyxQRuRu70syupai','2020-11-02 19:16:51','2020-11-02 19:16:51'),(2,'Phey81','phey.81property@gmail.com','$2y$10$yemRoDV2LN9UbQKRt3b5zegtAxUZWgW4jbG1MqhFMjbEqyXe4TVGi','Toni','Gonzaga','Phey81','123180000',NULL,NULL,'Active',NULL,NULL,NULL,NULL,NULL,'Seller',NULL,NULL,NULL,'2020-11-02 19:24:47','2020-11-02 19:24:47'),(3,'Best553860','inquire@bestrealtor.ph','$2y$10$yemRoDV2LN9UbQKRt3b5zegtAxUZWgW4jbG1MqhFMjbEqyXe4TVGi','Best','Realtor','Best553860','131231213',NULL,NULL,'Active',NULL,NULL,NULL,NULL,NULL,'Customer',NULL,NULL,NULL,'2020-11-02 19:28:07','2020-11-02 19:28:07'),(4,'test308032','phey1234@gmail.com','$2y$10$yemRoDV2LN9UbQKRt3b5zegtAxUZWgW4jbG1MqhFMjbEqyXe4TVGi','test','onluq',NULL,'3488931',NULL,NULL,'Active',NULL,NULL,NULL,NULL,NULL,'Customer','0000-00-00 00:00:00',NULL,NULL,'2020-12-15 20:32:14','2020-12-15 20:32:14');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
