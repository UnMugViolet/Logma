-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 15, 2023 at 08:31 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `logma-bdd`
--

-- --------------------------------------------------------

--
-- Table structure for table `authorized_ips`
--

CREATE TABLE `authorized_ips` (
  `id` int NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `added_timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `authorized_ips`
--

INSERT INTO `authorized_ips` (`id`, `ip_address`, `description`, `added_timestamp`) VALUES
(1, '::1', 'Localhost IP', '2023-09-12 15:11:45'),
(2, '192.168.1.23', 'Paul IP Desktop', '2023-09-12 15:12:30'),
(3, '192.168.1.11', 'Paul portable', '2023-09-12 16:03:52')

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `idGallery` int NOT NULL,
  `titleGallery` longtext CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `projectGallery` longtext CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `imgFullNameGallery` longtext CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `orderGallery` longtext CHARACTER SET latin1 COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=binary;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`idGallery`, `titleGallery`, `projectGallery`, `imgFullNameGallery`, `orderGallery`) VALUES
(71, 'test 1', 'test 1', 'test-1.6504056eac6f9.webp', '1'),
(73, 'test 2', 'test 2', 'test-2.650409153e97a.webp', '2');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int NOT NULL,
  `project_title` longtext NOT NULL,
  `project_subtitle` longtext NOT NULL,
  `project_url` longtext NOT NULL,
  `project_thumbnail_name` longtext NOT NULL,
  `project_order` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_title`, `project_subtitle`, `project_url`, `project_thumbnail_name`, `project_order`) VALUES
(5, 'Transaharienne', 'Reportage', 'https://www.youtube.com/watch?v=1TNve6kRkKg&t=1s&ab_channel=Logmaproduction', 'photo-transaharienne.webp', '1'),
(6, 'PLATYPUS CRAFT', 'DIGITAL', 'https://youtu.be/rNqv_Gi_kIg', 'projet-photographe-platypus-craft.webp', '2'),
(7, 'NOHÉ', 'CAMPAGNE', 'https://youtu.be/jGQK5btw2xc', 'campagne-de-marque-nohé-créateur-de-vêtements.webp', '3'),
(8, 'COLLIAUX OPTICIENS', 'CAMPAGNE', 'https://youtu.be/pLDtHUxPeH4', 'shooting-de-marque-colliaux-opticiens.webp', '4'),
(9, 'SOPHIE FAGUET', 'PORTRAIT', 'https://youtu.be/dqAV68Km7hs', 'reportage-de-sophie-faguet-route-du-rhum.webp', '5'),
(10, 'BLACK SHEEP', 'PUBLICITÉ', 'https://youtu.be/L3AFBkg_BG8?si=zXZx1U6REGbZMG29', 'projet-blacksheep-concepeteur-de-van-de-voyage.webp', '6');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int NOT NULL,
  `users_uid` tinytext NOT NULL,
  `users_pwd` longtext NOT NULL,
  `users_email` tinytext NOT NULL,
  `users_role` tinytext
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `users_uid`, `users_pwd`, `users_email`, `users_role`) VALUES
(3, 'test', '$2y$10$FGa1ndDibtLTqr2qqSv2Au/1MpMobfCiQ4mJjEaJ.g7PAJweoukZ.', 'test@test.com', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authorized_ips`
--
ALTER TABLE `authorized_ips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`idGallery`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authorized_ips`
--
ALTER TABLE `authorized_ips`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `idGallery` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
