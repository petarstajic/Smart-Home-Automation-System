-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2018 at 10:35 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id` int(3) UNSIGNED NOT NULL,
  `ime` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `korime` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `korloz` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('Administrator','Korisnik','','') COLLATE utf8_unicode_ci NOT NULL,
  `datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pr1` int(11) NOT NULL DEFAULT '0',
  `pr2` int(11) NOT NULL DEFAULT '0',
  `pr3` int(11) NOT NULL DEFAULT '0',
  `pr4` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `ime`, `prezime`, `mail`, `korime`, `korloz`, `status`, `datum`, `pr1`, `pr2`, `pr3`, `pr4`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 'admin', 'Administrator', '2018-01-26 03:54:47', 0, 0, 0, 0),
(137, 'petar', 'stajic', 'petarstajic91@gmail.com', 'petar', 'petar123', 'Korisnik', '2018-01-31 06:41:07', 0, 1, 1, 0),
(141, 'nikola', 'nikolic', 'nikola@gmail.com', 'nikola', 'nikola123', 'Korisnik', '2018-01-31 06:44:59', 1, 0, 0, 1),
(142, 'Marko', 'Markovic', 'marko@gmail.com', 'marko', 'marko123', 'Korisnik', '2018-01-31 06:45:05', 1, 1, 0, 0),
(143, 'Marko', 'Markovic', 'marko@gmail.com', 'jovan', 'jovan123', 'Korisnik', '2018-01-31 06:45:32', 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `prekidaci`
--

CREATE TABLE `prekidaci` (
  `p1` text COLLATE utf8_unicode_ci NOT NULL,
  `p2` text COLLATE utf8_unicode_ci NOT NULL,
  `p3` text COLLATE utf8_unicode_ci NOT NULL,
  `p4` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `prekidaci`
--

INSERT INTO `prekidaci` (`p1`, `p2`, `p3`, `p4`) VALUES
('Dnevna soba klima', 'Grejanje hodnik', 'Kupatilo ventilacija', 'Svetlo dvoriste');

-- --------------------------------------------------------

--
-- Table structure for table `ugasi`
--

CREATE TABLE `ugasi` (
  `id` int(11) NOT NULL,
  `vreme` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `korisnik` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ugasi`
--

INSERT INTO `ugasi` (`id`, `vreme`, `korisnik`) VALUES
(1, '2018-01-31 09:53:42', 'petar'),
(4, '2018-01-31 09:53:45', 'petar');

-- --------------------------------------------------------

--
-- Table structure for table `upali`
--

CREATE TABLE `upali` (
  `id` int(11) NOT NULL,
  `vreme` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `korisnik` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `upali`
--

INSERT INTO `upali` (`id`, `vreme`, `korisnik`) VALUES
(1, '2018-01-31 09:53:43', 'petar'),
(4, '2018-01-31 09:53:46', 'petar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
