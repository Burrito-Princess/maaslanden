-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2024 at 12:06 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maaslanden`
--

-- --------------------------------------------------------

--
-- Table structure for table `game_1`
--

CREATE TABLE `game_1` (
  `id` int(11) NOT NULL,
  `type` varchar(16) NOT NULL,
  `name` varchar(32) NOT NULL,
  `industry` varchar(16) NOT NULL,
  `initial_pop` int(16) NOT NULL,
  `current_pop` int(16) NOT NULL,
  `city_id` int(8) NOT NULL,
  `player_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `game_1`
--

INSERT INTO `game_1` (`id`, `type`, `name`, `industry`, `initial_pop`, `current_pop`, `city_id`, `player_id`) VALUES
(13, 'town', 'Amsterdam', 'tourism', 19399, 19399, 4, 2),
(14, 'capital', 'Utrecht', 'nuclear', 236557, 236557, 3, 2),
(15, 'town', 'Breda', 'fishing', 40741, 40741, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `game_keys`
--

CREATE TABLE `game_keys` (
  `id` int(8) NOT NULL,
  `game_key` int(16) NOT NULL,
  `game` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `game_variables`
--

CREATE TABLE `game_variables` (
  `id` int(16) NOT NULL,
  `kind` varchar(16) NOT NULL,
  `variable` varchar(16) NOT NULL,
  `game_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `game_variables`
--

INSERT INTO `game_variables` (`id`, `kind`, `variable`, `game_id`) VALUES
(289, 'city', 'village', 1),
(290, 'city', 'village', 1),
(291, 'city', 'town', 1),
(292, 'city', 'village', 1),
(293, 'city', 'town', 1),
(294, 'city', 'city', 1),
(295, 'city', 'village', 1),
(296, 'city', 'town', 1),
(297, 'city', 'city', 1),
(298, 'city', 'village', 1),
(299, 'city', 'town', 1),
(300, 'city', 'city', 1),
(301, 'industry', 'fishing', 1),
(302, 'industry', 'nuclear', 1),
(303, 'industry', 'farming', 1),
(304, 'industry', 'tourism', 1),
(305, 'industry', 'forest', 1),
(306, 'industry', 'mining', 1),
(308, 'city_name', 'Rotterdam', 1),
(309, 'city_name', 'Den Haag', 1),
(311, 'city_name', 'Eindhoven', 1),
(312, 'city_name', 'Tilburg', 1),
(313, 'city_name', 'Groningen', 1),
(314, 'city_name', 'Almere', 1),
(316, 'city_name', 'Nijmegen', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `game_1`
--
ALTER TABLE `game_1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `game_keys`
--
ALTER TABLE `game_keys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `game_variables`
--
ALTER TABLE `game_variables`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `game_1`
--
ALTER TABLE `game_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `game_keys`
--
ALTER TABLE `game_keys`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `game_variables`
--
ALTER TABLE `game_variables`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=317;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
