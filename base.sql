-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 21, 2024 at 07:22 PM
-- Server version: 8.0.36
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `revision`
--

-- --------------------------------------------------------

--
-- Table structure for table `formation`
--

CREATE TABLE `formation` (
  `codeFormation` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `nomFormation` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `codeUFR` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inscrire`
--

CREATE TABLE `inscrire` (
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `codeFormation` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `anneeInscrit` varchar(10) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personne`
--

CREATE TABLE `personne` (
  `prenom` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nom` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `adresse` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `telephone` int DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `motPasse` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `profil` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ufr`
--

CREATE TABLE `ufr` (
  `codeUFR` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `nomUFR` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`codeFormation`),
  ADD KEY `Fk_UFR` (`codeUFR`);

--
-- Indexes for table `inscrire`
--
ALTER TABLE `inscrire`
  ADD PRIMARY KEY (`email`,`codeFormation`,`anneeInscrit`),
  ADD KEY `Fk_Formation` (`codeFormation`);

--
-- Indexes for table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `ufr`
--
ALTER TABLE `ufr`
  ADD PRIMARY KEY (`codeUFR`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `formation`
--
ALTER TABLE `formation`
  ADD CONSTRAINT `Fk_UFR` FOREIGN KEY (`codeUFR`) REFERENCES `ufr` (`codeUFR`) ON DELETE CASCADE;

--
-- Constraints for table `inscrire`
--
ALTER TABLE `inscrire`
  ADD CONSTRAINT `Fk_Formation` FOREIGN KEY (`codeFormation`) REFERENCES `formation` (`codeFormation`) ON DELETE CASCADE,
  ADD CONSTRAINT `Fk_Personne` FOREIGN KEY (`email`) REFERENCES `personne` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
