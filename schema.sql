-- MySQL dump 10.16  Distrib 10.1.21-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: localhost
-- ------------------------------------------------------
-- Server version	10.1.21-MariaDB

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
-- Table structure for table `ContactPoint`
--

DROP TABLE IF EXISTS `ContactPoint`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ContactPoint` (
  `id` int(10) unsigned NOT NULL,
  `contactType` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contactOption` int(10) unsigned NOT NULL,
  `language` int(10) unsigned DEFAULT NULL,
  `hoursAvailable` int(10) unsigned DEFAULT NULL,
  `address` int(10) unsigned DEFAULT NULL,
  `email` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telephone` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `faxNumber` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ContactPoint`
--

LOCK TABLES `ContactPoint` WRITE;
/*!40000 ALTER TABLE `ContactPoint` DISABLE KEYS */;
/*!40000 ALTER TABLE `ContactPoint` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `CreativeWork`
--

DROP TABLE IF EXISTS `CreativeWork`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CreativeWork` (
  `id` int(10) unsigned NOT NULL,
  `about` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `accountablePerson` int(10) unsigned DEFAULT NULL,
  `aggregateRating` int(10) unsigned DEFAULT NULL,
  `alternativeHeadline` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `associatedMedia` int(10) unsigned DEFAULT NULL,
  `author` int(10) unsigned DEFAULT NULL,
  `copyrightHolder` int(10) unsigned DEFAULT NULL,
  `copyrightYear` smallint(5) unsigned DEFAULT NULL,
  `editor` int(10) unsigned DEFAULT NULL,
  `genre` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `headline` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `isFamilyFriendly` tinyint(1) DEFAULT '1',
  `keywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `offers` int(11) DEFAULT NULL,
  `producer` int(10) unsigned DEFAULT NULL,
  `publisher` int(10) unsigned DEFAULT NULL,
  `review` int(10) unsigned DEFAULT NULL,
  `sourceOrganization` int(10) unsigned DEFAULT NULL,
  `sponsor` int(10) unsigned DEFAULT NULL,
  `text` longtext COLLATE utf8_unicode_ci,
  `video` int(10) unsigned DEFAULT NULL,
  `workExample` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CreativeWork`
--

LOCK TABLES `CreativeWork` WRITE;
/*!40000 ALTER TABLE `CreativeWork` DISABLE KEYS */;
/*!40000 ALTER TABLE `CreativeWork` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ImageObject`
--

DROP TABLE IF EXISTS `ImageObject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ImageObject` (
  `id` int(10) unsigned NOT NULL,
  `caption` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ImageObject`
--

LOCK TABLES `ImageObject` WRITE;
/*!40000 ALTER TABLE `ImageObject` DISABLE KEYS */;
/*!40000 ALTER TABLE `ImageObject` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `MediaObject`
--

DROP TABLE IF EXISTS `MediaObject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `MediaObject` (
  `id` int(10) unsigned NOT NULL,
  `associatedArticle` int(10) unsigned DEFAULT NULL,
  `width` smallint(5) unsigned DEFAULT NULL,
  `height` smallint(5) unsigned DEFAULT NULL,
  `encodingFormat` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contentSize` decimal(10,0) DEFAULT NULL,
  `contentUrl` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `requiresSubscription` tinyint(1) DEFAULT '0',
  `uploadDate` datetime DEFAULT NULL,
  `expires` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `URL` (`contentUrl`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `MediaObject`
--

LOCK TABLES `MediaObject` WRITE;
/*!40000 ALTER TABLE `MediaObject` DISABLE KEYS */;
/*!40000 ALTER TABLE `MediaObject` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Organizaion`
--

DROP TABLE IF EXISTS `Organizaion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Organizaion` (
  `id` int(10) unsigned NOT NULL,
  `contactPoint` int(10) unsigned DEFAULT NULL,
  `employees` int(11) DEFAULT NULL,
  `parentOrganization` int(10) unsigned DEFAULT NULL,
  `legalName` int(11) DEFAULT NULL,
  `logo` int(10) unsigned DEFAULT NULL,
  `address` int(10) unsigned DEFAULT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telephone` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `faxNumber` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Organizaion`
--

LOCK TABLES `Organizaion` WRITE;
/*!40000 ALTER TABLE `Organizaion` DISABLE KEYS */;
/*!40000 ALTER TABLE `Organizaion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Person`
--

DROP TABLE IF EXISTS `Person`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Person` (
  `id` int(10) unsigned NOT NULL,
  `givenName` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `additionalName` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `familyName` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `affiliation` int(10) unsigned DEFAULT NULL,
  `worksFor` int(10) unsigned DEFAULT NULL,
  `jobTitle` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthDate` date DEFAULT NULL,
  `children` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contactPoint` int(255) DEFAULT NULL,
  `address` int(10) unsigned DEFAULT NULL,
  `email` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telephone` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `faxNumber` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `givenName` (`givenName`,`additionalName`,`familyName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Person`
--

LOCK TABLES `Person` WRITE;
/*!40000 ALTER TABLE `Person` DISABLE KEYS */;
/*!40000 ALTER TABLE `Person` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PostalAddress`
--

DROP TABLE IF EXISTS `PostalAddress`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PostalAddress` (
  `id` int(10) unsigned NOT NULL,
  `streetAddress` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `postOfficeBoxNumber` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `addressLocality` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `addressCountry` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `addressRegion` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `postalCode` int(5) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PostalAddress`
--

LOCK TABLES `PostalAddress` WRITE;
/*!40000 ALTER TABLE `PostalAddress` DISABLE KEYS */;
/*!40000 ALTER TABLE `PostalAddress` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Thing`
--

DROP TABLE IF EXISTS `Thing`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Thing` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sameAs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alternateName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `disambiguatingDescription` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `additionalType` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` int(10) unsigned DEFAULT NULL,
  `potentialAction` int(10) unsigned DEFAULT NULL,
  `identifier` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mainEntityOfPage` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `identifier` (`identifier`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Thing`
--

LOCK TABLES `Thing` WRITE;
/*!40000 ALTER TABLE `Thing` DISABLE KEYS */;
/*!40000 ALTER TABLE `Thing` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-06 17:20:27
