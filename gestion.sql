# ************************************************************
# Sequel Pro SQL dump
# Version 4499
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Hôte: localhost (MySQL 5.5.42)
# Base de données: gestion
# Temps de génération: 2015-11-22 18:17:19 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Affichage de la table client
# ------------------------------------------------------------

DROP TABLE IF EXISTS `client`;

CREATE TABLE `client` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `trash` int(1) DEFAULT '0',
  `label` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `note` text,
  `file` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;

INSERT INTO `client` (`id`, `trash`, `label`, `url`, `note`, `file`)
VALUES
	(1,0,'Total','http://www.total.com','azdazdazd',NULL),
	(2,0,'ingenico',NULL,NULL,NULL),
	(4,1,'Nouveau client...',NULL,NULL,NULL),
	(5,1,'Nouveau client...',NULL,NULL,NULL),
	(6,1,'Nouveau client...',NULL,NULL,NULL),
	(7,1,'Nouveau client...',NULL,NULL,NULL),
	(8,1,'Nouveau client...',NULL,NULL,NULL),
	(9,1,'Nouveau client...',NULL,NULL,NULL),
	(10,1,'Nouveau client...',NULL,NULL,NULL),
	(11,1,'Nouveau client...',NULL,NULL,NULL),
	(12,1,'truc',NULL,NULL,NULL),
	(13,1,'Nouveau client...',NULL,NULL,NULL),
	(14,0,'Mon premier client','http://client.com','login : trucpass : machin',NULL);

/*!40000 ALTER TABLE `client` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table task
# ------------------------------------------------------------

DROP TABLE IF EXISTS `task`;

CREATE TABLE `task` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int(11) DEFAULT NULL,
  `trash` int(11) DEFAULT '0',
  `priority` varchar(11) DEFAULT NULL,
  `description` text,
  `status` varchar(11) DEFAULT NULL,
  `assign_to` text,
  `estimated_time` varchar(255) DEFAULT NULL,
  `note` text,
  `files` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `task` WRITE;
/*!40000 ALTER TABLE `task` DISABLE KEYS */;

INSERT INTO `task` (`id`, `client_id`, `trash`, `priority`, `description`, `status`, `assign_to`, `estimated_time`, `note`, `files`)
VALUES
	(1,1,1,NULL,'ceci est un test. zf zoeif aizuhefb iazuehfb akzehfb kazehfb kzejhfb akzefhb azeufb zeuhfb izeuhfb izeufhb zeuhfb iezuhfb zejhfb zekjfhbz dedekfjhzebfkzehbfiauzefiaytrc vrvc iezgbc iezab <b>okok</b>','','Mathieu','2 jours','zefzefedede',NULL),
	(2,1,0,NULL,'tache 2','','Alexandra','3 jours','ed aedzae fez f',NULL),
	(3,1,0,NULL,'tache 3','progress','Mathieu Alexandra',NULL,NULL,NULL),
	(4,2,0,NULL,'tache 4','',NULL,NULL,NULL,NULL),
	(5,2,0,NULL,'tache 5','',NULL,NULL,NULL,NULL),
	(6,1,0,NULL,'tache 6','done',NULL,NULL,NULL,NULL),
	(44,1,0,NULL,'Nouvelle tâche...','preprod',NULL,NULL,NULL,NULL),
	(45,1,0,NULL,'Nouvelle tâche...','prod',NULL,NULL,NULL,NULL),
	(46,1,1,NULL,'Nouvelle tâche...','',NULL,NULL,NULL,NULL),
	(47,2,0,NULL,'Nouvelle tâche...','',NULL,NULL,NULL,NULL),
	(48,1,1,NULL,'Nouvelle tâche...','1',NULL,NULL,NULL,NULL),
	(49,2,0,NULL,'Nouvelle tâche...','',NULL,NULL,NULL,NULL),
	(50,1,1,NULL,'Nouvelle tâche...','1',NULL,NULL,NULL,NULL),
	(51,2,0,NULL,'Nouvelle tâche...','',NULL,NULL,NULL,NULL),
	(53,4,0,NULL,'Nouvelle tâche...',NULL,NULL,NULL,NULL,NULL),
	(54,5,0,NULL,'Nouvelle tâche...',NULL,NULL,NULL,NULL,NULL),
	(55,1,1,NULL,'Nouvelle tâche...',NULL,NULL,NULL,NULL,NULL),
	(56,6,0,NULL,'Nouvelle tâche...',NULL,NULL,NULL,NULL,NULL),
	(57,1,1,NULL,'Nouvelle tâche...',NULL,NULL,NULL,NULL,NULL),
	(58,11,0,NULL,'Nouvelle tâche...',NULL,NULL,NULL,NULL,NULL),
	(59,12,0,NULL,'Nouvelle tâche...zdzdzd','progress',NULL,NULL,NULL,NULL),
	(60,13,0,NULL,'Nouvelle tâche...',NULL,NULL,NULL,NULL,NULL),
	(61,14,0,NULL,'Ma premier tâche',NULL,NULL,NULL,NULL,NULL),
	(62,2,0,NULL,'Nouvelle tâche...',NULL,NULL,NULL,NULL,NULL),
	(63,14,0,NULL,'Nouvelle tâche...',NULL,NULL,NULL,NULL,NULL),
	(64,1,1,NULL,'Nouvelle tâche...',NULL,NULL,NULL,NULL,NULL),
	(65,1,1,NULL,'Nouvelle tâche...',NULL,NULL,NULL,NULL,NULL);

/*!40000 ALTER TABLE `task` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `role` varchar(11) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `role`, `avatar`)
VALUES
	(1,'mathieu','admin',NULL),
	(2,'alexandra','worker',NULL),
	(3,'paul','worker',NULL);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
