-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 26, 2021 at 03:57 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `SUT`
--

-- --------------------------------------------------------

--
-- Table structure for table `EtudiantTuteur`
--

CREATE TABLE `EtudiantTuteur` (
  `id_etudiant` int(11) DEFAULT NULL,
  `id_tuteur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `UE`
--

CREATE TABLE `UE` (
  `id_ue` int(11) NOT NULL,
  `nom_ue` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Utilisateur`
--

CREATE TABLE `Utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `role` enum('E','T') DEFAULT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mdp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `UtilisateurUe`
--

CREATE TABLE `UtilisateurUe` (
  `id_ue` int(11) DEFAULT NULL,
  `id_utilisateur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `EtudiantTuteur`
--
ALTER TABLE `EtudiantTuteur`
  ADD KEY `id_etudiant` (`id_etudiant`),
  ADD KEY `id_tuteur` (`id_tuteur`);

--
-- Indexes for table `UE`
--
ALTER TABLE `UE`
  ADD PRIMARY KEY (`id_ue`),
  ADD UNIQUE KEY `id_ue` (`id_ue`);

--
-- Indexes for table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`),
  ADD UNIQUE KEY `id_utilisateur` (`id_utilisateur`);

--
-- Indexes for table `UtilisateurUe`
--
ALTER TABLE `UtilisateurUe`
  ADD KEY `id_utilisateur` (`id_utilisateur`),
  ADD KEY `id_ue` (`id_ue`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `EtudiantTuteur`
--
ALTER TABLE `EtudiantTuteur`
  ADD CONSTRAINT `EtudiantTuteur_ibfk_1` FOREIGN KEY (`id_etudiant`) REFERENCES `Utilisateur` (`id_utilisateur`),
  ADD CONSTRAINT `EtudiantTuteur_ibfk_2` FOREIGN KEY (`id_tuteur`) REFERENCES `Utilisateur` (`id_utilisateur`);

--
-- Constraints for table `UtilisateurUe`
--
ALTER TABLE `UtilisateurUe`
  ADD CONSTRAINT `UtilisateurUe_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `Utilisateur` (`id_utilisateur`),
  ADD CONSTRAINT `UtilisateurUe_ibfk_2` FOREIGN KEY (`id_ue`) REFERENCES `UE` (`id_ue`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
