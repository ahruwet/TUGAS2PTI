-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.27-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for produk_10122251
CREATE DATABASE IF NOT EXISTS `produk_10122251` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `produk_10122251`;

-- Dumping structure for table produk_10122251.produk
CREATE TABLE IF NOT EXISTS `produk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(11) NOT NULL DEFAULT 0,
  `stok` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table produk_10122251.produk: ~1 rows (approximately)
INSERT INTO `produk` (`id`, `nama`, `deskripsi`, `harga`, `stok`) VALUES
	(1, 'VELG ENKEI RPF01 R15', 'RPF01 R15', 3500000, 2);

-- Dumping structure for table produk_10122251.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tipe` enum('admin','customer') NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table produk_10122251.user: ~4 rows (approximately)
INSERT INTO `user` (`id`, `username`, `password`, `tipe`) VALUES
	(3, 'admin', '$2y$10$ou9EnBytP6DML17vjOf9uu0U/6NSJ4uy6VSHUftHe9oBXIq8YVn62', 'admin'),
	(6, 'user', '$2y$10$kUUTTZA3MeCf1S/TafSh2uRuv0c17fT1NSvHJboQcW2WXpz4b4eVK', 'customer'),
	(7, 'au', '$2y$10$WatO94I6iSvEEeElhoVrKuqMiasQ3iPLJtcM6evqGiwdYKtUn4/16', 'customer'),
	(9, 'user2', '$2y$10$UQ8YD6IpXd3XPetxLvpP1.dHWwAEU8XwUUhLGhk1fWoWgj7h7mQ0e', 'customer');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
