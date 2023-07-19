-- MySQL dump 10.19  Distrib 10.3.38-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: karyawan2
-- ------------------------------------------------------
-- Server version	10.3.38-MariaDB-0ubuntu0.20.04.1

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
-- Table structure for table `log_aktivitas`
--

DROP TABLE IF EXISTS `log_aktivitas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_aktivitas` (
  `no` int(11) NOT NULL AUTO_INCREMENT,
  `aktivitas` text DEFAULT NULL,
  `id_karyawan` int(9) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_aktivitas`
--

LOCK TABLES `log_aktivitas` WRITE;
/*!40000 ALTER TABLE `log_aktivitas` DISABLE KEYS */;
INSERT INTO `log_aktivitas` VALUES (2,'http://localhost:8080/index.php?page=add-gaji (Menambahkan data gaji baru)',27,'2023-07-18 11:37:45'),(3,'http://localhost:8080/index.php?page=edit-gaji&kode=620234056 (Mengubah data gaji)',32,'2023-07-18 14:59:29'),(4,'http://localhost:8080/index.php?page=del-gaji&kode=620234056 (Menghapus data gaji)',32,'2023-07-18 15:04:18'),(5,'http://localhost:8080/index.php?page=add-karyawan (Menambahkan data karyawan baru)',32,'2023-07-18 15:11:19'),(6,'http://localhost:8080/index.php?page=add-karyawan (Menambahkan data karyawan baru)',32,'2023-07-18 15:13:43'),(11,'http://localhost:8080/index.php?page=edit-karyawan&kode=33 (Mengubah data karyawan)',32,'2023-07-18 15:25:39'),(12,'http://localhost:8080/index.php?page=del-karyawan&kode=34 (Menghapus data karyawan)',32,'2023-07-18 15:29:37'),(13,'http://localhost:8080/index.php?page=edit-pelanggan&kode=PI26250099 (Mengubah data pelanggan)',27,'2023-07-19 02:37:18'),(14,'http://localhost:8080/index.php?page=add-pemasangan-teknisipemasangan&kode=479817491874 (Menambahkan data pemasangan)',29,'2023-07-19 03:12:00'),(16,'http://localhost:8080/index.php?page=edit-pemasangan-teknisipemasangan&kode=261113 (Mengubah data pemasangan)',29,'2023-07-19 03:14:47'),(17,'http://localhost:8080/index.php?page=del-pemasangan-teknisipemasangan&kode=261113&nik=479817491874 (Menghapus data pemasangan)',29,'2023-07-19 03:17:45'),(18,'http://localhost:8080/index.php?page=add-pengguna (Menambahkan data pengguna sistem)',27,'2023-07-19 03:21:37'),(19,'http://localhost:8080/index.php?page=add-pengguna (Menambahkan data pengguna sistem)',27,'2023-07-19 03:25:48'),(20,'http://localhost:8080/index.php?page=del-pengguna&kode=35 (Menghapus data pengguna sistem)',27,'2023-07-19 03:25:55'),(21,'http://localhost:8080/index.php?page=add-pengguna (Menambahkan data pengguna sistem)',27,'2023-07-19 03:27:47'),(22,'http://localhost:8080/index.php?page=add-promosi-sales (Menambahkan data promosi)',28,'2023-07-19 03:48:52'),(23,'http://localhost:8080/index.php?page=edit-promosi-sales&kode=4798174918007 (Mengubah data promosi)',28,'2023-07-19 03:52:46'),(24,'http://localhost:8080/index.php?page=del-promosi-sales&kode=479817491874 (Menghapus data promosi)',28,'2023-07-19 03:54:54'),(25,'http://localhost:8080/index.php?id_pelanggan=PI26250099&page=add-keluhan (Menambahkan data keluhan pelanggan)',36,'2023-07-19 04:01:57'),(26,'http://localhost:8080/index.php?page=add-perbaikan&kode=3&pel=PI26948414 (Menambahkan data perbaikan)',30,'2023-07-19 05:24:23'),(27,'http://localhost:8080/index.php?page=edit-perbaikan-teknisiperbaikan&kode=5&pel=PI26948414 (Mengubah data perbaikan)',30,'2023-07-19 05:26:19'),(28,'http://localhost:8080/index.php?page=add-perbaikan&kode=4&pel=PI26250099 (Menambahkan data perbaikan)',30,'2023-07-19 05:35:31'),(29,'http://localhost:8080/index.php?page=edit-perbaikan-teknisiperbaikan&kode=7&pel=PI26250099 (Mengubah data perbaikan)',30,'2023-07-19 05:37:33'),(31,'http://localhost:8080/index.php?page=add-perbaikan&kode=4&pel=PI26250099 (Menambahkan data perbaikan)',30,'2023-07-19 05:42:09'),(32,'http://localhost:8080/index.php?page=del-perbaikan-teknisiperbaikan&kode=8&pel=PI26250099 (Menghapus data perbaikan)',30,'2023-07-19 05:42:36'),(33,'http://localhost:8080/index.php?page=add-perbaikan&kode=4&pel=PI26250099 (Menambahkan data perbaikan)',30,'2023-07-19 05:43:52'),(34,'http://localhost:8080/index.php?page=edit-data-profil&id=32 (Mengubah data profil)',32,'2023-07-19 05:50:59');
/*!40000 ALTER TABLE `log_aktivitas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_data_pelanggan`
--

DROP TABLE IF EXISTS `log_data_pelanggan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_data_pelanggan` (
  `id_pelanggan` varchar(50) NOT NULL,
  `nama_pelanggan` varchar(255) NOT NULL,
  `nik_pelanggan` varchar(20) NOT NULL,
  `alamat_pelanggan` varchar(255) NOT NULL,
  `no_hp_pelanggan` varchar(15) NOT NULL,
  `jenis_paket` char(10) NOT NULL,
  `status_langganan` varchar(20) NOT NULL,
  `log_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_data_pelanggan`
--

LOCK TABLES `log_data_pelanggan` WRITE;
/*!40000 ALTER TABLE `log_data_pelanggan` DISABLE KEYS */;
INSERT INTO `log_data_pelanggan` VALUES ('PI26250099','Ayu Kumala Sari Rahayu','1094719863333','Marabahan','081304250099','15Mbps','Aktif','2023-07-15 17:29:38'),('PI26250099','Ayu Kumala Sari Rahayu','10947198631','Marabahan','081304250099','15Mbps','Aktif','2023-07-15 17:31:48'),('PI26250099','Ayu Kumala Sari Rahayu','10947198631','Marabahan','08130425009','15Mbps','Aktif','2023-07-15 17:34:45'),('PI26250099','Ayu Kumala Sari Rahayu','10947198631','Marabahan','08130425009','15Mbps','Tidak Aktif','2023-07-19 02:37:18');
/*!40000 ALTER TABLE `log_data_pelanggan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_gaji`
--

DROP TABLE IF EXISTS `tb_gaji`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_gaji` (
  `id_gaji` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `posisi` varchar(50) NOT NULL,
  `gaji_pokok` double NOT NULL,
  `bonus` double NOT NULL,
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_gaji`
--

LOCK TABLES `tb_gaji` WRITE;
/*!40000 ALTER TABLE `tb_gaji` DISABLE KEYS */;
INSERT INTO `tb_gaji` VALUES (520235739,28,'Sales',1000000,250000,5,2023),(620232006,28,'Sales',1000000,230000,6,2023);
/*!40000 ALTER TABLE `tb_gaji` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_karyawan`
--

DROP TABLE IF EXISTS `tb_karyawan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_karyawan` (
  `id` int(9) DEFAULT NULL,
  `nama_karyawan` varchar(255) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') DEFAULT NULL,
  `posisi` varchar(50) DEFAULT NULL,
  `alamat_karyawan` varchar(255) DEFAULT NULL,
  `nik_karyawan` varchar(20) DEFAULT NULL,
  `no_hp_karyawan` varchar(15) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `foto` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_karyawan`
--

LOCK TABLES `tb_karyawan` WRITE;
/*!40000 ALTER TABLE `tb_karyawan` DISABLE KEYS */;
INSERT INTO `tb_karyawan` VALUES (27,'Demitri Erlangga SE.','Laki-Laki','Admin','Jl. A. Yani KM.01, Marabahan','1690234523','0827184636112','Banjarmasin','1997-02-19','demitri.png'),(28,'Amelia','Perempuan','Sales','Marabahan','1690345211','082718463699','Banjarmasin','1999-12-09','amelia.jpeg'),(30,'Rahman','Laki-Laki','Teknisi Perbaikan','Jl. A. Yani KM.03, Marabahan','1690345546','0899128734261','Kota Baru','1997-02-17','rahman.png'),(29,'Aliyanto','Laki-Laki','Teknisi Pemasangan','Anjir Muara','1690346793','0827184636156','Banjarmasin','1992-09-25','aliyanto.png'),(31,'Agung Setia','Laki-Laki','Supervisor','Jl. A. Yani, Marabahan','479817491879','0827184636198','Kandangan','1990-06-08','circle.png'),(32,'Lily Syifa','Perempuan','Admin','Martapura','63080546060009','0827184636454','Barabai','1997-06-20','imattsmart-B9AZKx17q5c-unsplash.jpg'),(33,'Rahayu','Perempuan','IT Support','Marabahan','109471986512','082718463621','Birayang','1998-12-04','kisspng-infographic-polygonal-chain-clip-art-ppt-infographic-5a878637a77009.9047318515188311596858.png'),(34,'Tono Martono',NULL,'Sales',NULL,NULL,NULL,NULL,NULL,NULL),(35,'Tono Martono',NULL,'Sales',NULL,NULL,NULL,NULL,NULL,NULL),(36,'Tono Martono',NULL,'Sales',NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `tb_karyawan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_keluhan`
--

DROP TABLE IF EXISTS `tb_keluhan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_keluhan` (
  `id_keluhan` int(11) NOT NULL AUTO_INCREMENT,
  `id_pelanggan` char(10) NOT NULL,
  `tanggal_keluhan` date NOT NULL,
  `isi_keluhan` text NOT NULL,
  `status_penanganan` enum('Sudah Ditangani','Belum Ditangani') DEFAULT NULL,
  `id_karyawan` int(11) NOT NULL,
  PRIMARY KEY (`id_keluhan`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_keluhan`
--

LOCK TABLES `tb_keluhan` WRITE;
/*!40000 ALTER TABLE `tb_keluhan` DISABLE KEYS */;
INSERT INTO `tb_keluhan` VALUES (2,'PI26948414','2023-06-25','Kabel outdoor putus, butuh diganti','Sudah Ditangani',29),(3,'PI26948414','2023-07-08','Lampu merah pada router terus berkedip','Belum Ditangani',27),(4,'PI26250099','2023-07-19','Internet gangguan sudah lebih 2 hari','Sudah Ditangani',36);
/*!40000 ALTER TABLE `tb_keluhan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_pelanggan`
--

DROP TABLE IF EXISTS `tb_pelanggan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` varchar(50) NOT NULL,
  `nama_pelanggan` varchar(255) NOT NULL,
  `nik_pelanggan` varchar(20) NOT NULL,
  `alamat_pelanggan` varchar(255) NOT NULL,
  `no_hp_pelanggan` varchar(15) NOT NULL,
  `jenis_paket` char(10) NOT NULL,
  `tanggal_pasang` date NOT NULL,
  `status_langganan` enum('Aktif','Tidak Aktif','Blacklist') DEFAULT NULL,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_pelanggan`
--

LOCK TABLES `tb_pelanggan` WRITE;
/*!40000 ALTER TABLE `tb_pelanggan` DISABLE KEYS */;
INSERT INTO `tb_pelanggan` VALUES ('PI26250099','Ayu Kumala Sari Rahayu','10947198631','Marabahan','08130425009','15Mbps','2023-07-12','Aktif'),('PI26948414','Nana','10947198651','Paringin Kota, Haur Batu RT.12','08218948414','10Mbps','2023-06-23','Aktif');
/*!40000 ALTER TABLE `tb_pelanggan` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`lava`@`localhost`*/ /*!50003 TRIGGER log_pelanggan AFTER UPDATE ON tb_pelanggan FOR EACH ROW
BEGIN
INSERT INTO log_data_pelanggan VALUES (OLD.id_pelanggan, OLD.nama_pelanggan, OLD.nik_pelanggan, OLD.alamat_pelanggan, OLD.no_hp_pelanggan, OLD.jenis_paket, OLD.status_langganan, CURRENT_TIMESTAMP);
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `tb_pemasangan`
--

DROP TABLE IF EXISTS `tb_pemasangan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_pemasangan` (
  `nik` varchar(20) NOT NULL,
  `id_pemasangan` char(10) NOT NULL,
  `id_pelanggan` varchar(32) NOT NULL,
  `total_biaya` double NOT NULL,
  `id_teknisipemasangan` int(11) NOT NULL,
  `tanggal_pasang` date NOT NULL,
  `keterangan` text DEFAULT NULL,
  PRIMARY KEY (`nik`),
  KEY `id_pelanggan` (`id_pelanggan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_pemasangan`
--

LOCK TABLES `tb_pemasangan` WRITE;
/*!40000 ALTER TABLE `tb_pemasangan` DISABLE KEYS */;
INSERT INTO `tb_pemasangan` VALUES ('1094719863333','261112','PI26250099',399000,29,'2023-07-12','selesai'),('10947198651','261111','PI26948414',478000,29,'2023-06-23','selesai, terpasang');
/*!40000 ALTER TABLE `tb_pemasangan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_pengguna`
--

DROP TABLE IF EXISTS `tb_pengguna`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(9) DEFAULT NULL,
  `nama_pengguna` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('Admin','Sales','Teknisi Pemasangan','Teknisi Perbaikan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_pengguna`
--

LOCK TABLES `tb_pengguna` WRITE;
/*!40000 ALTER TABLE `tb_pengguna` DISABLE KEYS */;
INSERT INTO `tb_pengguna` VALUES (27,'Demitri Erlangga SE.','admin','21232f297a57a5a743894a0e4a801fc3','Admin'),(28,'Amelia','sales','9ed083b1436e5f40ef984b28255eef18','Sales'),(29,'Aliyanto','pemasangan','202cb962ac59075b964b07152d234b70','Teknisi Pemasangan'),(30,'Rahman','perbaikan','202cb962ac59075b964b07152d234b70','Teknisi Perbaikan'),(32,'Lily Syifa','admin2','c84258e9c39059a89ab77d846ddab909','Admin'),(36,'Tono Martono','sales2','bc62e62c719e0185b0874a4c8d4f87cf','Sales');
/*!40000 ALTER TABLE `tb_pengguna` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_perbaikan`
--

DROP TABLE IF EXISTS `tb_perbaikan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_perbaikan` (
  `id_perbaikan` int(11) NOT NULL AUTO_INCREMENT,
  `id_keluhan` char(10) DEFAULT NULL,
  `id_pelanggan` char(10) DEFAULT NULL,
  `penanganan` text DEFAULT NULL,
  `tanggal_perbaikan` date DEFAULT NULL,
  `lama_perbaikan` varchar(200) DEFAULT NULL,
  `id_teknisi` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_perbaikan`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_perbaikan`
--

LOCK TABLES `tb_perbaikan` WRITE;
/*!40000 ALTER TABLE `tb_perbaikan` DISABLE KEYS */;
INSERT INTO `tb_perbaikan` VALUES (4,'2','PI26948414','Kabel sudah diganti, internet sudah normal kembali','2023-06-29','',30),(9,'4','PI26250099','Router dibongkar dan dibersihkan, kemudian direstart','2023-07-19','1 jam',30);
/*!40000 ALTER TABLE `tb_perbaikan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_profil`
--

DROP TABLE IF EXISTS `tb_profil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_profil` (
  `id_profil` int(11) NOT NULL AUTO_INCREMENT,
  `nama_perusahaan` varchar(50) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `bidang` varchar(50) NOT NULL,
  PRIMARY KEY (`id_profil`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_profil`
--

LOCK TABLES `tb_profil` WRITE;
/*!40000 ALTER TABLE `tb_profil` DISABLE KEYS */;
INSERT INTO `tb_profil` VALUES (1,'TELKOM INDONESIA','INDIHOME MARABAHAN','Jl. Panglima Antasari, Marabahan Kota, Kec. Marabahan, Kabupaten Barito Kuala, Kalimantan Selatan, 70513','Jasa Internet Rumah');
/*!40000 ALTER TABLE `tb_profil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_promosi`
--

DROP TABLE IF EXISTS `tb_promosi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_promosi` (
  `nik` varchar(16) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nomor_hp` varchar(15) NOT NULL,
  `jenis_paket` char(10) NOT NULL,
  `tanggal_deal` date NOT NULL,
  `id_sales` int(9) NOT NULL,
  `lalong_val` varchar(255) DEFAULT NULL,
  `status_pasang` char(10) DEFAULT NULL,
  PRIMARY KEY (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_promosi`
--

LOCK TABLES `tb_promosi` WRITE;
/*!40000 ALTER TABLE `tb_promosi` DISABLE KEYS */;
INSERT INTO `tb_promosi` VALUES ('1094719863333','Ayu Kumala Sari Rahayu','Marabahan','081304250099','15Mbps','2023-07-13',28,'-2.9925893256276948, 114.75403331221786','SUDAH'),('10947198651','Nana','Paringin Kota, Haur Batu RT.12','08218948414','10Mbps','2023-06-21',28,'-2.323248358875917, 115.46437901041834','SUDAH'),('4798174918007','Sumiati','Marabahan Kota','089912121342','15Mbps','2023-07-19',28,'-2.896934233773529, 114.69198619279818','BELUM');
/*!40000 ALTER TABLE `tb_promosi` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-07-19 13:52:37
