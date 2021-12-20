-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2021 at 09:27 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `genshinimpact`
--

-- --------------------------------------------------------

--
-- Table structure for table `char_genshin`
--

CREATE TABLE `char_genshin` (
  `id` int(11) NOT NULL,
  `Nama` varchar(25) NOT NULL,
  `Kelangkaan` varchar(25) NOT NULL,
  `Elemen` varchar(25) NOT NULL,
  `Senjata` varchar(25) NOT NULL,
  `Wilayah` varchar(25) NOT NULL,
  `Gender` varchar(20) NOT NULL,
  `url_char` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `char_genshin`
--

INSERT INTO `char_genshin` (`id`, `Nama`, `Kelangkaan`, `Elemen`, `Senjata`, `Wilayah`, `Gender`, `url_char`) VALUES
(1, 'Jean', '★★★★★', 'Anemo', 'Pedang', 'Mondstadt', 'Female', 'https://uploadstatic-sea.mihoyo.com/contentweb/20200616/2020061611250789508.png'),
(2, 'Hu Tao', '★★★★★', 'Pyro', 'Tombak', 'Liyue', 'Female', 'https://uploadstatic-sea.mihoyo.com/contentweb/20210224/2021022415504933030.png'),
(3, 'Eula', '★★★★★', 'Cryo', 'Pedang Besar', 'Mondstadt', 'Female', 'https://uploadstatic-sea.mihoyo.com/contentweb/20210510/2021051011562682199.png'),
(4, 'Keqing', '★★★★★', 'Electro ', 'Pedang', 'Liyue', 'Female', 'https://uploadstatic-sea.mihoyo.com/contentweb/20200903/2020090320312094830.png'),
(5, 'Zhongli', '★★★★★', 'Geo', 'Tombak', 'Liyue', 'Male', 'https://uploadstatic-sea.mihoyo.com/contentweb/20201123/2020112310562899194.png'),
(6, 'Raiden Shogun', '★★★★★', 'Electro', 'Tombak', 'Inazuma', 'Female', 'https://uploadstatic-sea.mihoyo.com/contentweb/20210818/2021081814151779807.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `char_genshin`
--
ALTER TABLE `char_genshin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `char_genshin`
--
ALTER TABLE `char_genshin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
