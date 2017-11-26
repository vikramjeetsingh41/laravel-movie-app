# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.17)
# Database: sample-app
# Generation Time: 1939-09-05 17:19:17 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2014_10_12_000000_create_users_table',1),
	(2,'2014_10_12_100000_create_password_resets_table',1);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table movie_comments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `movie_comments`;

CREATE TABLE `movie_comments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `movie_id` int(11) DEFAULT NULL,
  `comment` tinytext,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `movie_comments` WRITE;
/*!40000 ALTER TABLE `movie_comments` DISABLE KEYS */;

INSERT INTO `movie_comments` (`id`, `user_id`, `movie_id`, `comment`, `created_at`, `updated_at`, `status`)
VALUES
	(1,1,1,'Awesome movie','2017-11-26 00:00:00','2017-11-26 00:00:00',1),
	(2,1,2,'Wonderful movie','2017-11-26 00:00:00','2017-11-26 00:00:00',1),
	(3,1,1,'Classical , multiple watch','2017-11-26 00:00:00','2017-11-26 00:00:00',1),
	(4,2,1,'Awesome','2017-11-26 00:00:00','2017-11-26 00:00:00',1),
	(5,2,1,'Hi This movie is awesome','2017-11-26 16:31:36','2017-11-26 16:31:36',1),
	(6,1,8,'What a movie !','2017-11-26 17:07:54','2017-11-26 17:07:54',1);

/*!40000 ALTER TABLE `movie_comments` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table movies
# ------------------------------------------------------------

DROP TABLE IF EXISTS `movies`;

CREATE TABLE `movies` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `movies` WRITE;
/*!40000 ALTER TABLE `movies` DISABLE KEYS */;

INSERT INTO `movies` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`)
VALUES
	(1,'Movie One','Movie One description',1,'2017-11-26 00:00:00','2017-11-26 00:00:00'),
	(2,'Movie Two','Movie Two',1,'2017-11-26 00:00:00','2017-11-26 00:00:00'),
	(3,'Movie Third','This third movie description.',1,'2017-11-26 16:55:31','2017-11-26 16:55:31'),
	(4,'test','test decsription',1,'2017-11-26 16:57:10','2017-11-26 16:57:10'),
	(5,'test','test decsription',1,'2017-11-26 16:58:14','2017-11-26 16:58:14'),
	(6,'Test One','Test One description',1,'2017-11-26 16:59:24','2017-11-26 16:59:24'),
	(7,'Test','test description',1,'2017-11-26 17:00:10','2017-11-26 17:00:10'),
	(8,'Khal Nayak','Khal Nayak description',1,'2017-11-26 17:05:03','2017-11-26 17:05:03');

/*!40000 ALTER TABLE `movies` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'Jiger','jiger.pandey82@gmail.com','$2y$10$50IdkM0IRKTVJonP4ESopeVJgofDLhV8oLpmptx8eXrt8YKQ/pQzC','5itbvb0hVd1nIJqxFD5YKFcrqPyxhtWGcEqwJ7QSJ9LSO8QitfawABFEtNV3','2017-11-26 10:02:48','2017-11-26 10:02:48'),
	(2,'Akash','ak@gmail.com','$2y$10$VWp5O8794nRbXojZv0jqJ.DBtqFJqtV4G3jK70LJcF40RVlyAOYR2','mTNjq7MxbD4RwPmmkRAre0H25yuMTX7HO7dUdxrwLFsj0DL24wyyJLI5P8GW','2017-11-26 15:30:22','2017-11-26 15:30:22');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
