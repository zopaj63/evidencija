-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 09, 2023 at 05:53 PM
-- Server version: 5.7.39
-- PHP Version: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evidencija`
--

-- --------------------------------------------------------

--
-- Table structure for table `ocjene`
--

CREATE TABLE `ocjene` (
  `id` int(11) NOT NULL,
  `predmet` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `ocjena` int(11) NOT NULL,
  `studenti_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `ocjene`
--

INSERT INTO `ocjene` (`id`, `predmet`, `ocjena`, `studenti_id`) VALUES
(1, 'php osnove', 3, 101),
(2, 'php oop', 2, 101),
(3, 'laravel', 5, 102);

-- --------------------------------------------------------

--
-- Table structure for table `studenti`
--

CREATE TABLE `studenti` (
  `id` int(11) NOT NULL,
  `ime` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `prezime` varchar(100) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `studenti`
--

INSERT INTO `studenti` (`id`, `ime`, `prezime`) VALUES
(101, 'Pero', 'Perić'),
(102, 'Sara', 'Sarić');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ocjene`
--
ALTER TABLE `ocjene`
  ADD PRIMARY KEY (`id`),
  ADD KEY `studenti_id` (`studenti_id`);

--
-- Indexes for table `studenti`
--
ALTER TABLE `studenti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ocjene`
--
ALTER TABLE `ocjene`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ocjene`
--
ALTER TABLE `ocjene`
  ADD CONSTRAINT `ocjene_ibfk_1` FOREIGN KEY (`studenti_id`) REFERENCES `studenti` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
