-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 26, 2017 at 07:47 AM
-- Server version: 10.0.30-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `legrand`
--

CREATE TABLE `legrand` (
  `id` int(11) NOT NULL,
  `code_barre_production` varchar(255) NOT NULL,
  `code_barre_caisse` varchar(255) NOT NULL,
  `code_barre_peser` varchar(255) NOT NULL,
  `peser` int(11) NOT NULL,
  `date_peser` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `legrand`
--

INSERT INTO `legrand` (`id`, `code_barre_production`, `code_barre_caisse`, `code_barre_peser`, `peser`, `date_peser`) VALUES
(1, 'ddcv', 'vcxvc', '0', 0, '2017-09-25 16:51:54'),
(2, 'fvjdfklvn', 'fbfdvbfd', '0', 0, '2017-09-25 16:51:54'),
(3, 'fhdsbbsd', 'vbxcvb vxc', '0', 0, '2017-09-25 16:51:54'),
(4, 'fvjdfklvn', 'fbfdvbfd', '', 12, '2017-09-25 17:03:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `legrand`
--
ALTER TABLE `legrand`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `legrand`
--
ALTER TABLE `legrand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
