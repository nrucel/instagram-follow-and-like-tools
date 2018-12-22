-- MySQL dump 10.16  Distrib 10.2.19-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: nrucel
-- ------------------------------------------------------
-- Server version	10.2.19-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `uyeler`
--

DROP TABLE IF EXISTS `uyeler`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `uyeler` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `igID` bigint(20) unsigned NOT NULL,
  `adSoyad` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `igFoto` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kullaniciAdi` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `takipEdilenSayisi` int(10) NOT NULL,
  `takipciSayisi` int(10) NOT NULL,
  `takipKredi` int(10) NOT NULL,
  `begeniKredi` int(10) NOT NULL,
  `yorumKredi` int(10) NOT NULL,
  `storyKredi` int(10) NOT NULL,
  `izlenmeKredi` int(10) NOT NULL,
  `saveKredi` int(10) NOT NULL,
  `yorumBegeniKredi` int(10) NOT NULL,
  `canliYayinKredi` int(10) NOT NULL,
  `sessID` varchar(12) CHARACTER SET utf8 NOT NULL,
  `ipAdres` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uyeler`
--

LOCK TABLES `uyeler` WRITE;
/*!40000 ALTER TABLE `uyeler` DISABLE KEYS */;
INSERT INTO `uyeler` (`id`, `igID`, `adSoyad`, `igFoto`, `kullaniciAdi`, `takipEdilenSayisi`, `takipciSayisi`, `takipKredi`, `begeniKredi`, `yorumKredi`, `storyKredi`, `izlenmeKredi`, `saveKredi`, `yorumBegeniKredi`, `canliYayinKredi`, `sessID`, `ipAdres`) VALUES (1,9260881696,'deniz alpuğan','https://scontent-cdg2-1.cdninstagram.com/vp/857fdff8f647f8dbfc5718582c95c1d7/5C95E7F4/t51.2885-19/s150x150/47101021_235961533966518_8925778623407849472_n.jpg','denizalpugan49',1906,1173,18,30,30,30,30,30,30,30,'927264612','5.46.117.217'),(2,9302748592,'acar','https://scontent-cai1-1.cdninstagram.com/vp/dc651f3c631c68d6e0789e2d7c8af2e5/5C8EBFF1/t51.2885-19/44884218_345707102882519_2446069589734326272_n.jpg','azizqq1',5329,97,30,30,30,30,30,30,30,30,'8010928291','159.146.114.240');
/*!40000 ALTER TABLE `uyeler` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vipler`
--

DROP TABLE IF EXISTS `vipler`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vipler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adSoyad` varchar(100) NOT NULL,
  `sifre` varchar(30) NOT NULL,
  `email` varchar(250) NOT NULL,
  `yetkili` tinyint(1) NOT NULL DEFAULT 0,
  `kayitTarihi` timestamp NOT NULL DEFAULT current_timestamp(),
  `vipeNot` text NOT NULL,
  `sessID` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vipler`
--

LOCK TABLES `vipler` WRITE;
/*!40000 ALTER TABLE `vipler` DISABLE KEYS */;
INSERT INTO `vipler` (`id`, `adSoyad`, `sifre`, `email`, `yetkili`, `kayitTarihi`, `vipeNot`, `sessID`) VALUES (4,'Nurullah','nrcl499-','nurullahcelik@yandex.com',1,'2017-06-05 21:00:00','','{\"1544918831\":8097165594808}');
/*!40000 ALTER TABLE `vipler` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'nrucel'
--

--
-- Dumping routines for database 'nrucel'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-12-16  3:42:48
