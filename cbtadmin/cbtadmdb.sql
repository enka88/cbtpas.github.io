-- MySQL dump 10.16  Distrib 10.1.26-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: cbtadmdb
-- ------------------------------------------------------
-- Server version	10.1.26-MariaDB-0+deb9u1

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
-- Table structure for table `mdl_zberita_acara`
--

DROP TABLE IF EXISTS `mdl_zberita_acara`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdl_zberita_acara` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pelajaran` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sesi` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `t_start` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `t_finish` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proktor_nm` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proktor_id` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pengawas_nm` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengawas_id` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `peserta_jum` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `absen_jum` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `absen_isi` text COLLATE utf8mb4_unicode_ci,
  `catatan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_ba` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdl_zberita_acara`
--

LOCK TABLES `mdl_zberita_acara` WRITE;
/*!40000 ALTER TABLE `mdl_zberita_acara` DISABLE KEYS */;
/*!40000 ALTER TABLE `mdl_zberita_acara` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdl_zref_ruang`
--

DROP TABLE IF EXISTS `mdl_zref_ruang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdl_zref_ruang` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `npsn` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_ruang` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skul_ruang` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ruang` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdl_zref_ruang`
--

LOCK TABLES `mdl_zref_ruang` WRITE;
/*!40000 ALTER TABLE `mdl_zref_ruang` DISABLE KEYS */;
/*!40000 ALTER TABLE `mdl_zref_ruang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdl_zref_sekolah`
--

DROP TABLE IF EXISTS `mdl_zref_sekolah`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdl_zref_sekolah` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `npsn` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sekolah` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ks_nm` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ks_id` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logos` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ttdks` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdl_zref_sekolah`
--

LOCK TABLES `mdl_zref_sekolah` WRITE;
/*!40000 ALTER TABLE `mdl_zref_sekolah` DISABLE KEYS */;
/*!40000 ALTER TABLE `mdl_zref_sekolah` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdl_zserver_info`
--

DROP TABLE IF EXISTS `mdl_zserver_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdl_zserver_info` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `npsn` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_server` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kota` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ua` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pa` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdl_zserver_info`
--

LOCK TABLES `mdl_zserver_info` WRITE;
/*!40000 ALTER TABLE `mdl_zserver_info` DISABLE KEYS */;
/*!40000 ALTER TABLE `mdl_zserver_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdl_zstatus_ujian`
--

DROP TABLE IF EXISTS `mdl_zstatus_ujian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdl_zstatus_ujian` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `categoryid` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcatid` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kegiatan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokens` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokent` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenstamp` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdl_zstatus_ujian`
--

LOCK TABLES `mdl_zstatus_ujian` WRITE;
/*!40000 ALTER TABLE `mdl_zstatus_ujian` DISABLE KEYS */;
/*!40000 ALTER TABLE `mdl_zstatus_ujian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdl_zuser_data`
--

DROP TABLE IF EXISTS `mdl_zuser_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdl_zuser_data` (
  `id` bigint(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idnumber` tinyint(4) NOT NULL,
  `firstname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institution` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdl_zuser_data`
--

LOCK TABLES `mdl_zuser_data` WRITE;
/*!40000 ALTER TABLE `mdl_zuser_data` DISABLE KEYS */;
/*!40000 ALTER TABLE `mdl_zuser_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mdl_zuser_enrol`
--

DROP TABLE IF EXISTS `mdl_zuser_enrol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mdl_zuser_enrol` (
  `id` bigint(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mdl_zuser_enrol`
--

LOCK TABLES `mdl_zuser_enrol` WRITE;
/*!40000 ALTER TABLE `mdl_zuser_enrol` DISABLE KEYS */;
/*!40000 ALTER TABLE `mdl_zuser_enrol` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-12-05 16:00:51
