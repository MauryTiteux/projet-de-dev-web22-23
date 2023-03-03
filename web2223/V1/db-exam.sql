-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 03, 2023 at 03:50 AM
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
-- Table structure for table `activity_sessions`
--

CREATE TABLE `activity_sessions` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `categories_id` int(11) NOT NULL,
  `max_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activity_sessions`
--

INSERT INTO `activity_sessions` (`id`, `date`, `categories_id`, `max_user`) VALUES
(1, '2023-03-24', 1, 15),
(2, '2023-03-24', 2, 10),
(3, '2023-03-24', 3, 12),
(4, '2023-03-24', 4, 16),
(5, '2023-04-21', 1, 20),
(6, '2023-04-21', 4, 12);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Atelier cuisine'),
(2, 'Simulation de courses'),
(3, 'Course de karting'),
(4, 'Escape Game');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`) VALUES
(1, 'Urbanisme'),
(2, 'Architecte'),
(3, 'Paysagiste');

-- --------------------------------------------------------

--
-- Table structure for table `locomotions`
--

CREATE TABLE `locomotions` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `locomotions`
--

INSERT INTO `locomotions` (`id`, `name`) VALUES
(1, 'voiture'),
(2, 'velo'),
(3, 'covoiturage '),
(4, 'bus'),
(5, 'train'),
(6, 'metro');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'user'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `activity_sessions_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `departments_id` int(11) NOT NULL,
  `postal_code` int(11) NOT NULL,
  `locomotions_id` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `login` varchar(150) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `session_token` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs DEFAULT NULL,
  `roles_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `lastname`, `firstname`, `departments_id`, `postal_code`, `locomotions_id`, `email`, `login`, `password_hash`, `session_token`, `roles_id`) VALUES
(3, 'Rable', 'Daisy', 1, 1367, 2, 'daisy.rable@supermail.com', 'daisyrable', 'daisy', NULL, 1),
(4, 'Stique', 'Sophie', 1, 1380, 1, 'sophiestique@boitepro.com', 'sophiestique', 'sophie', NULL, 1),
(5, 'Mauve', 'Guy', 3, 1435, 5, 'Guy.mauve@monmail.com', 'guymauve', 'guy', NULL, 1),
(6, 'Fer', 'Lucie', 3, 1000, 2, 'lucie.fer@mail.com', 'Luciefer', 'lucie', NULL, 1),
(7, 'Balle', 'Jean', 2, 1470, 3, 'Jeanballe@poubellemail.com', 'jeanballe', 'jean', NULL, 1),
(8, 'Conda', 'Anna', 1, 1000, 4, 'anna.conda@plusdemail.com', 'annaconda', 'anna', NULL, 2),
(9, 'azezae', 'azeaze', 2, 1324, 3, 'testest@hotmail.com', 'testtest', '$2y$10$SryLRVt2G/DPtQNKrK4sGuwJ5mrFFUVIlEtro997Rgp1H31ztFIxG', '2faec94b45a2b8a3836824a95756ef89361c32d8212c42c33e656fe9d745fabe', 1),
(11, 'Marco', 'Polo', 3, 1234, 6, 'testad@hotmail.com', 'testad', '$2y$10$53KvqyDHm9iB9tzwcamXueJZqm19ttZS89tk2UFvcZGO9wceKY4AO', '4743fe1a55e7e21e0938056c62a23da564bc288dc8da5b417315af84a56bba21', 2),
(12, 'Jean', 'Oskour', 3, 4321, 1, 'test@hotmail.com', 'test', '$2y$10$QZRgxEIltHofahEHipDv5uELQU2ciUt3k0tjd/XEPQV59Jm3Vxgx2', 'b7885ea9d0c8d9fd05da611cfb450d2919fdffa596e88111a955d2091fccf2c1', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_sessions`
--
ALTER TABLE `activity_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_id` (`categories_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locomotions`
--
ALTER TABLE `locomotions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`),
  ADD KEY `activity_sessions_id` (`activity_sessions_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail` (`email`,`login`),
  ADD KEY `locomotions_id` (`locomotions_id`),
  ADD KEY `departments_id` (`departments_id`),
  ADD KEY `roles_id` (`roles_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_sessions`
--
ALTER TABLE `activity_sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `locomotions`
--
ALTER TABLE `locomotions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_sessions`
--
ALTER TABLE `activity_sessions`
  ADD CONSTRAINT `activity_sessions_ibfk_1` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `sessions_ibfk_2` FOREIGN KEY (`activity_sessions_id`) REFERENCES `activity_sessions` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`departments_id`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`locomotions_id`) REFERENCES `locomotions` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
