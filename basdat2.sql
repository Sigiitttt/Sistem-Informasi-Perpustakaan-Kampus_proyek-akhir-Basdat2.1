-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: basdat2
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
-- Table structure for table `buku`
--

DROP TABLE IF EXISTS `buku`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `buku` (
  `id_buku` bigint unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penulis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penerbit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_terbit` year DEFAULT NULL,
  `stok` int NOT NULL DEFAULT '0',
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `gambar_cover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `kategori_id` bigint unsigned DEFAULT NULL,
  `rak_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id_buku`),
  KEY `buku_kategori_id_foreign` (`kategori_id`),
  KEY `buku_rak_id_foreign` (`rak_id`),
  CONSTRAINT `buku_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE SET NULL,
  CONSTRAINT `buku_rak_id_foreign` FOREIGN KEY (`rak_id`) REFERENCES `rak` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buku`
--

LOCK TABLES `buku` WRITE;
/*!40000 ALTER TABLE `buku` DISABLE KEYS */;
INSERT INTO `buku` VALUES (1,'The Hunger Games','Suzanne Collins','Scholastic Press',2008,4,'Novel dystopian tentang perjuangan hidup dalam arena mematikan','01JXHC5EQY4YTXA34GRRDH0761.jpeg','2025-06-11 04:44:39','2025-06-11 23:10:18',3,7),(2,'Harry Potter and the Sorcerer Stone','J.K. Rowling','Bloomsbury',1997,5,'Petualangan seorang penyihir muda di dunia sihir','01JXHC7D83EEGJGXS2QEZBJD9X.jpeg','2025-06-11 04:44:39','2025-06-18 01:32:22',3,7),(3,'The 7 Habits of Highly Effective People','Stephen R. Covey','Free Press',2004,5,'Buku panduan untuk mengembangkan kebiasaan positif dan menjadi pribadi yang lebih efektif','01JXHC929KJNSVV0TW5BACHZE9.jpg','2025-06-11 04:29:52','2025-06-11 23:12:16',1,1),(4,'Think and Grow Rich','Napoleon Hill','The Ralston Society',1937,3,'Klasik tentang mindset sukses dan cara mencapai kekayaan melalui pemikiran positif','01JXHCAPR98DEHY2GS1WWCH25Z.jpeg','2025-06-11 04:29:52','2025-06-11 23:13:10',1,1),(5,'How to Win Friends and Influence People','Dale Carnegie','Simon & Schuster',1936,4,'Panduan praktis untuk meningkatkan keterampilan komunikasi dan hubungan interpersonal','01JXHCCA30K57RY10GB4SMRDWW.jpeg','2025-06-11 04:29:52','2025-06-11 23:14:03',1,1),(6,'The Power of Positive Thinking','Norman Vincent Peale','Prentice Hall',1952,6,'Mengajarkan kekuatan pikiran positif dalam menghadapi tantangan hidup','01JXHCDW5QWNYEEWHG58GHE4AT.jpeg','2025-06-11 04:29:52','2025-06-11 23:14:54',1,2),(7,'Good to Great','Jim Collins','HarperBusiness',2001,2,'Analisis mendalam tentang apa yang membuat perusahaan berubah dari baik menjadi hebat','01JXHCGS08EBF1PRQBNATTYSY1.png','2025-06-11 04:29:52','2025-06-11 23:16:29',1,2),(8,'The Lean Startup','Eric Ries','Crown Business',2011,7,'Metodologi untuk membangun bisnis startup yang efisien dan berkelanjutan','01JXHCJQDHHAW45SSFNFA3Q8BX.jpg','2025-06-11 04:29:52','2025-06-11 23:17:33',1,2),(9,'Mindset: The New Psychology of Success','Carol S. Dweck','Random House',2006,4,'Eksplorasi tentang growth mindset vs fixed mindset dalam mencapai kesuksesan','01JXHCM764YH6GJCN2NV4FBXZ5.jpeg','2025-06-11 04:29:52','2025-06-11 23:18:22',1,3),(10,'The Millionaire Mind','Thomas J. Stanley','Andrews McMeel Publishing',2000,3,'Studi tentang pola pikir dan kebiasaan orang-orang kaya','01JXHCNJK89FXR9SH3G92K7G28.jpg','2025-06-11 04:29:52','2025-06-11 23:19:06',1,3),(11,'Start With Why','Simon Sinek','Portfolio',2009,5,'Pentingnya menemukan mengapa dalam setiap tindakan untuk mencapai kesuksesan',NULL,'2025-06-11 04:29:52','2025-06-11 04:29:52',1,3),(12,'The Magic of Thinking Big','David J. Schwartz','Prentice Hall',1959,8,'Panduan untuk mengembangkan pemikiran besar dan mencapai tujuan yang ambisius',NULL,'2025-06-11 04:29:52','2025-06-11 04:29:52',1,3),(13,'Clean Code','Robert C. Martin','Prentice Hall',2008,4,'Panduan untuk menulis kode yang bersih, mudah dibaca, dan mudah dipelihara',NULL,'2025-06-11 04:29:52','2025-06-11 04:29:52',2,4),(14,'The Pragmatic Programmer','Andrew Hunt, David Thomas','Addison-Wesley',1999,6,'Kumpulan praktik terbaik dan filosofi dalam pengembangan perangkat lunak',NULL,'2025-06-11 04:29:52','2025-06-11 04:29:52',2,4),(15,'Design Patterns','Gang of Four','Addison-Wesley',1994,3,'Buku klasik tentang pola desain dalam pemrograman berorientasi objek',NULL,'2025-06-11 04:29:52','2025-06-11 04:29:52',2,4),(16,'JavaScript: The Good Parts','Douglas Crockford','O\'Reilly Media',2008,5,'Panduan untuk memahami dan menggunakan fitur-fitur terbaik JavaScript',NULL,'2025-06-11 04:29:52','2025-06-11 04:29:52',2,5),(17,'Python Crash Course','Eric Matthes','No Starch Press',2019,7,'Panduan praktis untuk belajar pemrograman Python dari dasar hingga mahir',NULL,'2025-06-11 04:29:52','2025-06-11 04:29:52',2,5),(18,'Introduction to Algorithms','Thomas H. Cormen','MIT Press',2009,2,'Buku komprehensif tentang algoritma dan struktur data',NULL,'2025-06-11 04:29:52','2025-06-11 04:29:52',2,5),(19,'You Don\'t Know JS','Kyle Simpson','O\'Reilly Media',2015,8,'Seri buku yang mengeksplorasi JavaScript secara mendalam',NULL,'2025-06-11 04:29:52','2025-06-11 04:29:52',2,6),(20,'Head First Design Patterns','Eric Freeman','O\'Reilly Media',2004,4,'Pendekatan visual dan interaktif untuk mempelajari design patterns',NULL,'2025-06-11 04:29:52','2025-06-11 04:29:52',2,6),(21,'Refactoring','Martin Fowler','Addison-Wesley',1999,3,'Teknik-teknik untuk memperbaiki struktur kode tanpa mengubah fungsionalitas',NULL,'2025-06-11 04:29:52','2025-06-11 04:29:52',2,6),(22,'Code Complete','Steve McConnell','Microsoft Press',2004,5,'Panduan komprehensif untuk konstruksi perangkat lunak yang berkualitas',NULL,'2025-06-11 04:29:52','2025-06-11 04:29:52',2,6),(25,'The Fault in Our Stars','John Green','Dutton Books',2012,5,'Kisah cinta yang menyentuh antara dua remaja penderita kanker',NULL,'2025-06-11 04:44:39','2025-06-11 04:44:39',3,8),(26,'Gone Girl','Gillian Flynn','Crown Publishers',2012,3,'Thriller psikologis tentang pernikahan yang penuh misteri','01JXHH89RKTGZWAMHYDAT2V41D.jpg','2025-06-11 04:44:39','2025-06-12 00:39:14',3,8),(27,'The Kite Runner','Khaled Hosseini','Riverhead Books',2003,6,'Kisah persahabatan dan penebusan di Afghanistan','01JXHH1D7DY844C096B2KS4KYT.jpg','2025-06-11 04:44:39','2025-06-18 01:33:02',3,9),(28,'Sapiens','Yuval Noah Harari','Harvill Secker',2014,2,'Sejarah singkat umat manusia dari zaman batu hingga era digital','01JXHGV86BDQ6AB3KC14AK2KXG.jpg','2025-06-11 04:44:39','2025-06-14 01:48:33',4,10),(29,'Educated','Tara Westover','Random House',2018,5,'Memoir tentang kekuatan pendidikan dan transformasi diri','01JXHH6TD06NHSPQ6C9T0Z2KJV.jpg','2025-06-11 04:44:39','2025-06-14 01:48:45',4,10),(30,'The Immortal Life of Henrietta Lacks','Rebecca Skloot','Crown Publishers',2010,3,'Kisah nyata tentang sel HeLa dan etika penelitian medis','01JXHGNG9KF0B5TQ50JZG2HEVQ.jpg','2025-06-11 04:44:39','2025-06-18 01:32:51',4,11),(31,'Into the Wild','Jon Krakauer','Villard',1996,4,'Kisah nyata tentang petualangan ekstrem seorang pemuda','01JXHH42BCBMDVAJ25VKCN3FZT.jpg','2025-06-11 04:44:39','2025-06-12 00:36:55',4,11),(32,'Becoming','Michelle Obama','Crown Publishing',2018,3,'Memoir inspiratif mantan First Lady Amerika Serikat','01JXHHB7XTVEXG5D21WFM0G4J9.jpg','2025-06-11 04:44:39','2025-06-12 00:40:51',4,12),(33,'Rich Dad Poor Dad','Robert Kiyosaki','Warner Books',1997,9,'Pelajaran tentang literasi keuangan dan investasi','01JXHH9RY50PW4T02R9E1DVG6Y.jpg','2025-06-11 04:44:39','2025-06-14 01:56:39',5,13),(34,'The Intelligent Investor','Benjamin Graham','Harper & Brothers',2006,2,'Panduan klasik untuk investasi yang cerdas dan aman','01JXHGZFMCS7MV16GM0D7CDRJY.jpg','2025-06-11 04:44:39','2025-06-12 00:34:25',5,13),(35,'Good to Great','Jim Collins','HarperBusiness',2001,6,'Analisis perusahaan yang berhasil bertransformasi menjadi hebat',NULL,'2025-06-11 04:44:39','2025-06-11 04:44:39',5,14),(36,'The E-Myth Revisited','Michael E. Gerber','HarperBusiness',1995,5,'Panduan untuk membangun bisnis yang sistematis dan skalabel',NULL,'2025-06-11 04:44:39','2025-06-11 04:44:39',5,14),(37,'Freakonomics','Steven D. Levitt','William Morrow',2005,7,'Ekonomi dari sudut pandang yang tidak konvensional dan mengejutkan',NULL,'2025-06-11 04:44:39','2025-06-11 04:44:39',5,15),(38,'A Brief History of Time','Stephen Hawking','Bantam Doubleday Dell',1988,5,'Penjelasan sederhana tentang kosmologi dan fisika modern',NULL,'2025-06-11 04:44:39','2025-06-11 04:44:39',6,16),(39,'The Gene','Siddhartha Mukherjee','Scribner',2016,4,'Kisah intim tentang gen dan revolusi genetika',NULL,'2025-06-11 04:44:39','2025-06-11 04:44:39',6,16),(40,'Cosmos','Carl Sagan','Random House',2013,6,'Perjalanan menakjubkan menjelajahi alam semesta',NULL,'2025-06-11 04:44:39','2025-06-11 04:44:39',6,17),(41,'The Code Breaker','Walter Isaacson','Simon & Schuster',2021,3,'Biografi Jennifer Doudna dan revolusi CRISPR',NULL,'2025-06-11 04:44:39','2025-06-11 04:44:39',6,17),(42,'Sapiens vs Homo Deus','Yuval Noah Harari','Harvill Secker',2020,2,'Eksplorasi tentang masa depan umat manusia',NULL,'2025-06-11 04:44:39','2025-06-11 04:44:39',6,18),(43,'Guns Germs and Steel','Jared Diamond','W. W. Norton & Company',1997,5,'Analisis tentang faktor-faktor yang membentuk peradaban manusia',NULL,'2025-06-11 04:44:39','2025-06-11 04:44:39',7,19),(44,'The Diary of Anne Frank','Anne Frank','Contact Publishing',2010,8,'Catatan harian seorang gadis Yahudi selama Holocaust',NULL,'2025-06-11 04:44:39','2025-06-11 04:44:39',7,19),(45,'A People History of the United States','Howard Zinn','Harper & Row',2005,4,'Sejarah Amerika dari perspektif rakyat biasa',NULL,'2025-06-11 04:44:39','2025-06-11 04:44:39',7,20),(46,'The Guns of August','Barbara Tuchman','Macmillan',2014,3,'Analisis mendalam tentang bulan pertama Perang Dunia I',NULL,'2025-06-11 04:44:39','2025-06-11 04:44:39',7,20),(47,'Alexander Hamilton','Ron Chernow','Penguin Press',2004,6,'Biografi komprehensif salah satu founding father Amerika',NULL,'2025-06-11 04:44:39','2025-06-11 04:44:39',7,21),(48,'Atomic Habits','James Clear','Avery',2018,9,'Panduan praktis untuk membangun kebiasaan baik dan menghilangkan kebiasaan buruk',NULL,'2025-06-11 04:44:39','2025-06-11 04:44:39',8,22),(49,'The Blue Zones','Dan Buettner','National Geographic',2008,5,'Rahasia umur panjang dari daerah dengan populasi tersehat di dunia',NULL,'2025-06-11 04:44:39','2025-06-11 04:44:39',8,22),(50,'Eat Pray Love','Elizabeth Gilbert','Viking',2006,7,'Perjalanan spiritual seorang wanita dalam mencari kebahagiaan',NULL,'2025-06-11 04:44:39','2025-06-11 04:44:39',8,23),(51,'The 4-Hour Workweek','Timothy Ferriss','Crown Publishers',2007,4,'Strategi untuk mencapai kebebasan finansial dan gaya hidup ideal',NULL,'2025-06-11 04:44:39','2025-06-11 04:44:39',8,23),(52,'Mindfulness for Beginners','Jon Kabat-Zinn','Sounds True',2012,6,'Pengantar praktik mindfulness untuk kehidupan yang lebih tenang',NULL,'2025-06-11 04:44:39','2025-06-11 04:44:39',8,24),(53,'The Purpose Driven Life','Rick Warren','Zondervan',2002,8,'Panduan untuk menemukan makna dan tujuan hidup dalam perspektif Kristen',NULL,'2025-06-11 04:44:39','2025-06-11 04:44:39',9,25),(54,'The Power of Now','Eckhart Tolle','New World Library',1997,6,'Panduan spiritual untuk hidup di masa kini dan mencapai kedamaian',NULL,'2025-06-11 04:44:39','2025-06-11 04:44:39',9,25),(55,'Man Search for Meaning','Viktor Frankl','Beacon Press',2006,5,'Refleksi tentang makna hidup berdasarkan pengalaman di kamp konsentrasi',NULL,'2025-06-11 04:44:39','2025-06-11 04:44:39',9,26),(56,'The Alchemist','Paulo Coelho','HarperCollins',1988,9,'Kisah alegoris tentang pencarian impian dan takdir',NULL,'2025-06-11 04:44:39','2025-06-11 04:44:39',9,26),(57,'Mere Christianity','C.S. Lewis','Geoffrey Bles',2001,4,'Penjelasan rasional tentang iman Kristen',NULL,'2025-06-11 04:44:39','2025-06-11 04:44:39',9,27),(58,'How to Read a Book','Mortimer Adler','Simon & Schuster',1998,5,'Panduan komprehensif untuk membaca dengan efektif dan kritis',NULL,'2025-06-11 04:44:39','2025-06-11 04:44:39',10,28),(59,'The Art of Learning','Josh Waitzkin','Free Press',2007,4,'Strategi untuk menguasai keterampilan baru dengan cepat dan efektif',NULL,'2025-06-11 04:44:39','2025-06-11 04:44:39',10,28),(60,'Make It Stick','Peter Brown','Harvard University Press',2014,6,'Ilmu pengetahuan di balik pembelajaran yang efektif',NULL,'2025-06-11 04:44:39','2025-06-11 04:44:39',10,29),(61,'The Elements of Style','William Strunk Jr.','Harcourt',2000,7,'Panduan klasik untuk penulisan yang jelas dan efektif',NULL,'2025-06-11 04:44:39','2025-06-11 04:44:39',10,29),(62,'A Dictionary of Modern English Usage','H.W. Fowler','Oxford University Press',2015,2,'Referensi klasik untuk penggunaan bahasa Inggris yang tepat','01JXHGXXTRPXQFBDPW8F7EXBVF.jpg','2025-06-11 04:44:39','2025-06-12 00:33:34',10,30);
/*!40000 ALTER TABLE `buku` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
INSERT INTO `cache` VALUES ('laravel_cache_livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3','i:1;',1750210511),('laravel_cache_livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3:timer','i:1750210511;',1750210511);
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategori`
--

DROP TABLE IF EXISTS `kategori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kategori` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori`
--

LOCK TABLES `kategori` WRITE;
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
INSERT INTO `kategori` VALUES (1,'pemrograman','2025-06-10 07:32:52','2025-06-10 07:32:52'),(2,'Self Devlopment','2025-06-10 08:34:33','2025-06-10 08:34:33'),(3,'Fiksi','2025-06-10 09:00:15','2025-06-10 09:00:15'),(4,'Non-Fiksi','2025-06-10 09:01:20','2025-06-10 09:01:20'),(5,'Bisnis & Ekonomi','2025-06-10 09:02:30','2025-06-10 09:02:30'),(6,'Sains & Teknologi','2025-06-10 09:03:45','2025-06-10 09:03:45'),(7,'Sejarah','2025-06-10 09:04:55','2025-06-10 09:04:55'),(8,'Kesehatan & Gaya Hidup','2025-06-10 09:05:10','2025-06-10 09:05:10'),(9,'Agama & Spiritualitas','2025-06-10 09:06:25','2025-06-10 09:06:25'),(10,'Pendidikan & Referensi','2025-06-10 09:07:40','2025-06-10 09:07:40');
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000001_create_cache_table',1),(2,'2025_06_10_123434_create_kategori_table',2),(3,'2025_06_10_123503_create_rak_table',2),(4,'2025_06_10_123525_add_kategori_and_rak_to_buku_table',2),(5,'2025_06_14_014634_add_indexes_to_peminjaman_header_table',3),(6,'2025_06_14_015343_add_indexes_to_peminjaman_detail_table',4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `peminjaman_detail`
--

DROP TABLE IF EXISTS `peminjaman_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `peminjaman_detail` (
  `id_detail` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_pinjam` bigint unsigned NOT NULL,
  `id_buku` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_detail`),
  KEY `peminjaman_detail_id_pinjam_index` (`id_pinjam`),
  KEY `peminjaman_detail_id_buku_index` (`id_buku`),
  CONSTRAINT `peminjaman_detail_ibfk_1` FOREIGN KEY (`id_pinjam`) REFERENCES `peminjaman_header` (`id_pinjam`) ON DELETE CASCADE,
  CONSTRAINT `peminjaman_detail_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `peminjaman_detail`
--

LOCK TABLES `peminjaman_detail` WRITE;
/*!40000 ALTER TABLE `peminjaman_detail` DISABLE KEYS */;
INSERT INTO `peminjaman_detail` VALUES (3,3,28,'2025-06-12 00:42:57','2025-06-12 00:42:57'),(4,4,28,'2025-06-12 00:43:41','2025-06-12 00:43:41'),(5,5,29,'2025-06-12 00:44:19','2025-06-12 00:44:19'),(6,6,2,'2025-06-13 18:55:32','2025-06-13 18:55:32'),(7,7,33,'2025-06-13 18:55:47','2025-06-13 18:55:47'),(8,8,2,'2025-06-13 20:52:06','2025-06-13 20:52:06'),(9,9,27,'2025-06-14 19:10:06','2025-06-14 19:10:06'),(10,10,2,'2025-06-16 00:23:42','2025-06-16 00:23:42'),(11,11,2,'2025-06-17 18:32:22','2025-06-17 18:32:22'),(12,12,30,'2025-06-17 18:32:51','2025-06-17 18:32:51'),(13,13,27,'2025-06-17 18:33:02','2025-06-17 18:33:02');
/*!40000 ALTER TABLE `peminjaman_detail` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `trg_kurangi_stok_setelah_pinjam` AFTER INSERT ON `peminjaman_detail` FOR EACH ROW BEGIN
    UPDATE `buku`
    SET `stok` = `stok` - 1
    WHERE `id_buku` = NEW.id_buku;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `peminjaman_header`
--

DROP TABLE IF EXISTS `peminjaman_header`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `peminjaman_header` (
  `id_pinjam` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_wajib_kembali` date NOT NULL,
  `status_peminjaman` enum('Dipinjam','Selesai') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Dipinjam',
  `total_denda` decimal(10,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_pinjam`),
  KEY `peminjaman_header_status_peminjaman_index` (`status_peminjaman`),
  KEY `peminjaman_header_user_id_index` (`user_id`),
  CONSTRAINT `peminjaman_header_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `peminjaman_header`
--

LOCK TABLES `peminjaman_header` WRITE;
/*!40000 ALTER TABLE `peminjaman_header` DISABLE KEYS */;
INSERT INTO `peminjaman_header` VALUES (3,7,'2025-06-12','2025-06-19','Selesai',0.00,'2025-06-12 00:42:57','2025-06-14 01:48:25'),(4,6,'2025-06-12','2025-06-19','Selesai',0.00,'2025-06-12 00:43:41','2025-06-14 01:48:33'),(5,8,'2025-06-12','2025-06-19','Selesai',0.00,'2025-06-12 00:44:19','2025-06-14 01:48:45'),(6,7,'2025-06-14','2025-06-21','Selesai',0.00,'2025-06-13 18:55:32','2025-06-14 01:56:31'),(7,7,'2025-06-14','2025-06-21','Selesai',0.00,'2025-06-13 18:55:47','2025-06-14 01:56:39'),(8,10,'2025-06-14','2025-06-21','Selesai',0.00,'2025-06-13 20:52:06','2025-06-14 03:57:04'),(9,7,'2025-06-15','2025-06-22','Selesai',0.00,'2025-06-14 19:10:06','2025-06-16 07:21:55'),(10,9,'2025-06-16','2025-06-23','Selesai',0.00,'2025-06-16 00:23:42','2025-06-16 07:25:01'),(11,10,'2025-06-18','2025-06-25','Dipinjam',0.00,'2025-06-17 18:32:22','2025-06-17 18:32:22'),(12,7,'2025-06-18','2025-06-25','Dipinjam',0.00,'2025-06-17 18:32:51','2025-06-17 18:32:51'),(13,7,'2025-06-18','2025-06-25','Dipinjam',0.00,'2025-06-17 18:33:02','2025-06-17 18:33:02');
/*!40000 ALTER TABLE `peminjaman_header` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `trg_tambah_stok_setelah_kembali` AFTER UPDATE ON `peminjaman_header` FOR EACH ROW BEGIN
    -- Hanya berjalan jika status berubah dari 'Dipinjam' menjadi 'Selesai'
    IF OLD.status_peminjaman = 'Dipinjam' AND NEW.status_peminjaman = 'Selesai' THEN
        -- Update stok untuk semua buku yang terkait dengan transaksi peminjaman ini
        UPDATE `buku` b
        JOIN `peminjaman_detail` pd ON b.id_buku = pd.id_buku
        SET b.stok = b.stok + 1
        WHERE pd.id_pinjam = NEW.id_pinjam;
    END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `pengembalian`
--

DROP TABLE IF EXISTS `pengembalian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pengembalian` (
  `id_pengembalian` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_pinjam` bigint unsigned NOT NULL,
  `tgl_pengembalian` date NOT NULL,
  `denda` decimal(10,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_pengembalian`),
  KEY `id_pinjam` (`id_pinjam`),
  CONSTRAINT `pengembalian_ibfk_1` FOREIGN KEY (`id_pinjam`) REFERENCES `peminjaman_header` (`id_pinjam`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengembalian`
--

LOCK TABLES `pengembalian` WRITE;
/*!40000 ALTER TABLE `pengembalian` DISABLE KEYS */;
INSERT INTO `pengembalian` VALUES (2,3,'2025-06-14',0.00,'2025-06-14 01:48:25','2025-06-14 01:48:25'),(3,4,'2025-06-14',0.00,'2025-06-14 01:48:33','2025-06-14 01:48:33'),(4,5,'2025-06-14',0.00,'2025-06-14 01:48:45','2025-06-14 01:48:45'),(5,6,'2025-06-14',0.00,'2025-06-14 01:56:31','2025-06-14 01:56:31'),(6,7,'2025-06-14',0.00,'2025-06-14 01:56:39','2025-06-14 01:56:39'),(7,8,'2025-06-14',0.00,'2025-06-14 03:57:04','2025-06-14 03:57:04'),(8,9,'2025-06-16',0.00,'2025-06-16 07:21:55','2025-06-16 07:21:55'),(9,10,'2025-06-16',0.00,'2025-06-16 07:25:01','2025-06-16 07:25:01');
/*!40000 ALTER TABLE `pengembalian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rak`
--

DROP TABLE IF EXISTS `rak`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rak` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama_rak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rak`
--

LOCK TABLES `rak` WRITE;
/*!40000 ALTER TABLE `rak` DISABLE KEYS */;
INSERT INTO `rak` VALUES (1,'A1','lantai1','2025-06-10 08:29:50','2025-06-10 08:29:50'),(2,'A2','lantai1','2025-06-10 08:32:12','2025-06-10 08:32:12'),(3,'A3','lantai1','2025-06-10 08:32:29','2025-06-10 08:32:29'),(4,'B1','lantai1','2025-06-10 08:32:42','2025-06-10 08:32:59'),(5,'B2','lantai1','2025-06-10 08:33:12','2025-06-10 08:33:12'),(6,'B3','lantai1','2025-06-10 08:33:30','2025-06-10 08:33:30'),(7,'C1','lantai1','2025-06-10 09:10:15','2025-06-10 09:10:15'),(8,'C2','lantai1','2025-06-10 09:10:30','2025-06-10 09:10:30'),(9,'C3','lantai1','2025-06-10 09:10:45','2025-06-10 09:10:45'),(10,'D1','lantai1','2025-06-10 09:11:00','2025-06-10 09:11:00'),(11,'D2','lantai1','2025-06-10 09:11:15','2025-06-10 09:11:15'),(12,'D3','lantai1','2025-06-10 09:11:30','2025-06-10 09:11:30'),(13,'E1','lantai2','2025-06-10 09:12:00','2025-06-10 09:12:00'),(14,'E2','lantai2','2025-06-10 09:12:15','2025-06-10 09:12:15'),(15,'E3','lantai2','2025-06-10 09:12:30','2025-06-10 09:12:30'),(16,'F1','lantai2','2025-06-10 09:13:00','2025-06-10 09:13:00'),(17,'F2','lantai2','2025-06-10 09:13:15','2025-06-10 09:13:15'),(18,'F3','lantai2','2025-06-10 09:13:30','2025-06-10 09:13:30'),(19,'G1','lantai2','2025-06-10 09:14:00','2025-06-10 09:14:00'),(20,'G2','lantai2','2025-06-10 09:14:15','2025-06-10 09:14:15'),(21,'G3','lantai2','2025-06-10 09:14:30','2025-06-10 09:14:30'),(22,'H1','lantai3','2025-06-10 09:15:00','2025-06-10 09:15:00'),(23,'H2','lantai3','2025-06-10 09:15:15','2025-06-10 09:15:15'),(24,'H3','lantai3','2025-06-10 09:15:30','2025-06-10 09:15:30'),(25,'I1','lantai3','2025-06-10 09:16:00','2025-06-10 09:16:00'),(26,'I2','lantai3','2025-06-10 09:16:15','2025-06-10 09:16:15'),(27,'I3','lantai3','2025-06-10 09:16:30','2025-06-10 09:16:30'),(28,'J1','lantai3','2025-06-10 09:17:00','2025-06-10 09:17:00'),(29,'J2','lantai3','2025-06-10 09:17:15','2025-06-10 09:17:15'),(30,'J3','lantai3','2025-06-10 09:17:30','2025-06-10 09:17:30');
/*!40000 ALTER TABLE `rak` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nim` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prodi` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `nim` (`nim`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin@perpus.com','123456',NULL,'085123456789','Jl. Soekarno Hatta No. 15, Malang',NULL,'$2y$12$uCxVfqsA7gpvea7Q4i2DCO87yv/8GYo3/yqyRMUbWU3REhbPEX.5G','9jSouGNmK9CDOllX2wYCqAijdDzeBJD46qBFo9Zrbdmgt5o86ccEBsngdWmw','2025-06-10 02:38:31','2025-06-15 02:09:42'),(5,'Budi Santoso','budi.santoso@student.univ.ac.id','230110001','Teknik Informatika','081234567890','Jl. Soekarno Hatta No. 15, Malang',NULL,'$2y$12$uCxVfqsA7gpvea7Q4i2DCO87yv/8GYo3/yqyRMUbWU3REhbPEX.5G',NULL,'2025-06-11 02:00:00','2025-06-11 04:51:28'),(6,'Siti Rahayu','siti.rahayu@student.univ.ac.id','230110002','Sistem Informasi','081234567891','Jl. Veteran No. 22, Malang',NULL,'$2y$12$uCxVfqsA7gpvea7Q4i2DCO87yv/8GYo3/yqyRMUbWU3REhbPEX.5G',NULL,'2025-06-11 02:05:00','2025-06-11 04:52:05'),(7,'Ahmad Rizki','ahmad.rizki@student.univ.ac.id','230110003','Teknik Elektro','081234567892','Jl. Diponegoro No. 8, Malang',NULL,'$2y$12$uCxVfqsA7gpvea7Q4i2DCO87yv/8GYo3/yqyRMUbWU3REhbPEX.5G','HTkDojjMpY7LSNsQvCSVkpQMunesxrdpbvuloUVb2KMdx3KpBWF1IFO83roP','2025-06-11 02:10:00','2025-06-16 07:22:39'),(8,'Dewi Kartika','dewi.kartika@student.univ.ac.id','230110004','Manajemen','081234567893','Jl. Jaksa Agung Suprapto No. 45, Malang',NULL,'$2y$12$uCxVfqsA7gpvea7Q4i2DCO87yv/8GYo3/yqyRMUbWU3REhbPEX.5G',NULL,'2025-06-11 02:15:00','2025-06-11 04:52:12'),(9,'Faisal Hakim','faisal.hakim@student.univ.ac.id','230110005','Akuntansi','081234567894','Jl. Sudirman No. 12, Malang',NULL,'$2y$12$uCxVfqsA7gpvea7Q4i2DCO87yv/8GYo3/yqyRMUbWU3REhbPEX.5G',NULL,'2025-06-11 02:20:00','2025-06-11 04:52:18'),(10,'Rina Puspita','rina.puspita@student.univ.ac.id','230110006','Psikologi','081234567895','Jl. Ahmad Yani No. 33, Malang',NULL,'$2y$12$uCxVfqsA7gpvea7Q4i2DCO87yv/8GYo3/yqyRMUbWU3REhbPEX.5G',NULL,'2025-06-11 02:25:00','2025-06-11 04:52:21'),(11,'Dian Kurnia','dian.kurnia@student.univ.ac.id','230110007','Hukum','081234567896','Jl. Tugu No. 77, Malang',NULL,'$2y$12$uCxVfqsA7gpvea7Q4i2DCO87yv/8GYo3/yqyRMUbWU3REhbPEX.5G',NULL,'2025-06-11 02:30:00','2025-06-11 04:52:24'),(12,'Reza Pratama','reza.pratama@student.univ.ac.id','230110008','Kedokteran','081234567897','Jl. Kawi No. 21, Malang',NULL,'$2y$12$uCxVfqsA7gpvea7Q4i2DCO87yv/8GYo3/yqyRMUbWU3REhbPEX.5G',NULL,'2025-06-11 02:35:00','2025-06-11 04:52:31'),(13,'Maya Sari','maya.sari@student.univ.ac.id','230110009','Farmasi','081234567898','Jl. Ijen No. 54, Malang',NULL,'$2y$12$uCxVfqsA7gpvea7Q4i2DCO87yv/8GYo3/yqyRMUbWU3REhbPEX.5G',NULL,'2025-06-11 02:40:00','2025-06-11 04:52:36'),(14,'Hendra Gunawan','hendra.gunawan@student.univ.ac.id','230110010','Arsitektur','081234567899','Jl. Thamrin No. 16, Malang',NULL,'$2y$12$uCxVfqsA7gpvea7Q4i2DCO87yv/8GYo3/yqyRMUbWU3REhbPEX.5G',NULL,'2025-06-11 02:45:00','2025-06-11 04:52:39');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `v_riwayatpeminjamanlengkap`
--

DROP TABLE IF EXISTS `v_riwayatpeminjamanlengkap`;
/*!50001 DROP VIEW IF EXISTS `v_riwayatpeminjamanlengkap`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `v_riwayatpeminjamanlengkap` AS SELECT 
 1 AS `id_pinjam`,
 1 AS `user_id`,
 1 AS `nama_peminjam`,
 1 AS `nim`,
 1 AS `id_buku`,
 1 AS `judul_buku`,
 1 AS `tgl_pinjam`,
 1 AS `tgl_wajib_kembali`,
 1 AS `tgl_pengembalian`,
 1 AS `status_peminjaman`,
 1 AS `total_denda`*/;
SET character_set_client = @saved_cs_client;

--
-- Dumping events for database 'basdat2'
--

--
-- Dumping routines for database 'basdat2'
--
/*!50003 DROP PROCEDURE IF EXISTS `PerbaruiDendaOtomatis` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `PerbaruiDendaOtomatis`()
BEGIN
    -- Variabel untuk menyimpan data dari setiap baris
    DECLARE done INT DEFAULT FALSE;
    DECLARE p_id_pinjam BIGINT;
    DECLARE p_tgl_wajib_kembali DATE;
    DECLARE denda_per_hari DECIMAL(10, 2) DEFAULT 1000.00; -- Denda Rp 1000/hari
    DECLARE total_denda_baru DECIMAL(10, 2);

    -- 1. Deklarasikan CURSOR untuk memilih semua peminjaman yang terlambat dan masih aktif
    DECLARE cur_terlambat CURSOR FOR
        SELECT `id_pinjam`, `tgl_wajib_kembali`
        FROM `peminjaman_header`
        WHERE `status_peminjaman` = 'Dipinjam' AND `tgl_wajib_kembali` < CURDATE();

    -- 2. Deklarasikan handler jika cursor tidak menemukan data lagi
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

    -- 3. Buka cursor
    OPEN cur_terlambat;

    -- 4. Mulai loop untuk membaca setiap baris
    read_loop: LOOP
        -- Ambil data dari baris saat ini ke dalam variabel
        FETCH cur_terlambat INTO p_id_pinjam, p_tgl_wajib_kembali;

        -- Jika tidak ada data lagi, keluar dari loop
        IF done THEN
            LEAVE read_loop;
        END IF;

        -- Hitung total denda yang baru
        SET total_denda_baru = DATEDIFF(CURDATE(), p_tgl_wajib_kembali) * denda_per_hari;

        -- Update denda di tabel peminjaman_header untuk baris ini
        UPDATE `peminjaman_header`
        SET `total_denda` = total_denda_baru
        WHERE `id_pinjam` = p_id_pinjam;

    END LOOP;

    -- 5. Tutup cursor
    CLOSE cur_terlambat;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ProsesPengembalian` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ProsesPengembalian`(IN `p_id_pinjam` BIGINT)
BEGIN
    DECLARE v_tgl_wajib_kembali DATE;
    DECLARE v_denda DECIMAL(10, 2) DEFAULT 0.00;
    DECLARE v_hari_terlambat INT DEFAULT 0;
    DECLARE denda_per_hari DECIMAL(10, 2) DEFAULT 1000.00; -- Asumsi denda Rp 1000/hari

    -- Ambil tanggal wajib kembali dari header peminjaman
    SELECT `tgl_wajib_kembali` INTO v_tgl_wajib_kembali
    FROM `peminjaman_header`
    WHERE `id_pinjam` = p_id_pinjam;

    -- Hitung jumlah hari keterlambatan
    SET v_hari_terlambat = DATEDIFF(CURDATE(), v_tgl_wajib_kembali);

    -- Jika terlambat (selisih hari > 0), hitung dendanya
    IF v_hari_terlambat > 0 THEN
        SET v_denda = v_hari_terlambat * denda_per_hari;
    END IF;

    -- Mulai transaksi untuk memastikan semua proses berjalan atau tidak sama sekali
    START TRANSACTION;

    -- 1. Masukkan catatan ke tabel pengembalian
    INSERT INTO `pengembalian` (`id_pinjam`, `tgl_pengembalian`, `denda`)
    VALUES (p_id_pinjam, CURDATE(), v_denda);

    -- 2. Update status dan total denda di header peminjaman
    -- Trigger `trg_tambah_stok_setelah_kembali` akan otomatis berjalan setelah ini
    UPDATE `peminjaman_header`
    SET `status_peminjaman` = 'Selesai', `total_denda` = v_denda
    WHERE `id_pinjam` = p_id_pinjam;

    COMMIT;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Final view structure for view `v_riwayatpeminjamanlengkap`
--

/*!50001 DROP VIEW IF EXISTS `v_riwayatpeminjamanlengkap`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_riwayatpeminjamanlengkap` AS select `ph`.`id_pinjam` AS `id_pinjam`,`u`.`id` AS `user_id`,`u`.`name` AS `nama_peminjam`,`u`.`nim` AS `nim`,`b`.`id_buku` AS `id_buku`,`b`.`judul` AS `judul_buku`,`ph`.`tgl_pinjam` AS `tgl_pinjam`,`ph`.`tgl_wajib_kembali` AS `tgl_wajib_kembali`,`peng`.`tgl_pengembalian` AS `tgl_pengembalian`,`ph`.`status_peminjaman` AS `status_peminjaman`,`ph`.`total_denda` AS `total_denda` from ((((`peminjaman_header` `ph` join `users` `u` on((`ph`.`user_id` = `u`.`id`))) join `peminjaman_detail` `pd` on((`ph`.`id_pinjam` = `pd`.`id_pinjam`))) join `buku` `b` on((`pd`.`id_buku` = `b`.`id_buku`))) left join `pengembalian` `peng` on((`ph`.`id_pinjam` = `peng`.`id_pinjam`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-06-18  8:56:28
