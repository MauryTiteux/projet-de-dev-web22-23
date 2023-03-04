-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 04, 2023 at 07:06 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db-exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `max` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `name`, `description`, `max`) VALUES
(1, 'Atelier cuisine', 'Atelier cuisine', 1),
(2, 'Simulation de courses (jeux sur console)', 'Simulation de courses (jeux sur console)', 10),
(3, 'Course de karting', 'Course de karting', 12),
(4, 'Escape Game', 'Escape Game', 16),
(5, 'Aucune activité', 'Aucune activité', 999);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`) VALUES
(1, 'Logistique'),
(3, 'Backend'),
(4, 'Création');

-- --------------------------------------------------------

--
-- Table structure for table `postal_codes`
--

CREATE TABLE `postal_codes` (
  `id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `code` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `postal_codes`
--

INSERT INTO `postal_codes` (`id`, `name`, `code`) VALUES
(1, 'Liège', 4000),
(2, 'Outsiplou', 5000),
(3, 'Bruxelles', 1000),
(4, 'Namur', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_bin NOT NULL,
  `firstname` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `lastname` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `postal_code_id` int(10) NOT NULL,
  `department_id` int(10) NOT NULL,
  `password_hash` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `session_token` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `is_admin` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `firstname`, `lastname`, `postal_code_id`, `department_id`, `password_hash`, `session_token`, `is_admin`) VALUES
(3, 'test@hotmail.com', 'test', 'test', 2, 1, '$2y$10$pLs3sCi6k19hmVD1plexiOuXLCACfekEz7sJtF7ZObfCTvDR9TeBq', '987fe2b540d9e1b9868190300a93dfa8c48778296c6e74da11348f2db4987f6d', 1),
(5, 'azeazeaz', 'eaze', 'azezae', 3, 4, 'azeazeaz', 'azezaeaz', 1),
(6, 'test@gmail.com', 'testtest', 'test', 3, 3, '$2y$10$5IEXPxXYU12iPIoKkC.ntekeky7eR8dUjcgR3G/B03j7eg7V4yEHK', 'ccc613510d52272c97867f069f8c05a07e6201bf7bba3b071ef1f6af09516836', 0),
(7, 'sdfsd@hotmail.com', 'sdfez', 'Azerty123', 4, 3, '$2y$10$yentsmc1zf7adURkT10meugCCRA/nZnBpKwTSfPsmtymmUBH3ks2G', 'de77c110013ae4c72a00281d63aae3febd0788c82606c2474d6bf6d5d4b7e6b2', 0),
(8, 'gdfgbsd@hotmail.com', 'bstbx', 'lksdofnij', 2, 4, '$2y$10$lKZTAe3TWXCOAQl2tY748ONy2zX9wtWfGLvzfevmAYKTD2LnYe6tO', 'd670546f3827b1b6ed4aac4db90c20308b37120a6407256ff2d971e8099ddc33', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_activities`
--

CREATE TABLE `users_activities` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `activity_id` int(10) NOT NULL,
  `dinner` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `users_activities`
--

INSERT INTO `users_activities` (`id`, `user_id`, `activity_id`, `dinner`) VALUES
(8, 3, 2, 0),
(9, 8, 4, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `postal_codes`
--
ALTER TABLE `postal_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_departement` (`department_id`),
  ADD KEY `fk_postal_code` (`postal_code_id`);

--
-- Indexes for table `users_activities`
--
ALTER TABLE `users_activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user` (`user_id`),
  ADD KEY `fk_activity` (`activity_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `postal_codes`
--
ALTER TABLE `postal_codes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users_activities`
--
ALTER TABLE `users_activities`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_activities`
--
ALTER TABLE `users_activities`
  ADD CONSTRAINT `fk_activity` FOREIGN KEY (`activity_id`) REFERENCES `activities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
