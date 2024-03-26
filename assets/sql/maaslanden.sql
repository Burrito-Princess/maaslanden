-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 25, 2024 at 02:44 PM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

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
  `industry` json NOT NULL,
  `initial_pop` int(16) NOT NULL,
  `current_pop` int(16) NOT NULL,
  `city_id` int(8) NOT NULL,
  `player_id` int(8) NOT NULL,
  `surroundings` json NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `game_1`
--

INSERT INTO `game_1` (`id`, `type`, `name`, `industry`, `initial_pop`, `current_pop`, `city_id`, `player_id`, `surroundings`) VALUES
(51, 'capital', 'Den Haag', '[\"farming\", \"nuclear\"]', 417213, 793036, 4, 3, '[\"wood\", \"fish\", \"iron\", \"iron\", \"empty\", \"empty\"]'),
(52, 'city', 'Breda', '[\"nuclear\", \"forest\"]', 175398, 7583107, 2, 1, '[\"iron\", \"fish\", \"empty\", \"fish\", \"iron\", \"tourism\"]'),
(53, 'village', 'Groningen', '[\"nuclear\", \"mining\"]', 18179, 26176, 3, 1, '[\"empty\", \"empty\", \"empty\", \"empty\", \"empty\", \"empty\"]'),
(56, 'village', 'Almere', '[\"forest\", \"nuclear\"]', 12539, 25999, 6, 1, '[\"empty\", \"empty\", \"empty\", \"empty\", \"empty\", \"empty\"]'),
(57, 'city', 'Tilburg', '[\"tourism\", \"fishing\"]', 79621, 95545, 7, 1, '[\"empty\", \"empty\", \"empty\", \"empty\", \"empty\", \"empty\"]'),
(58, 'city', 'Amsterdam', '[\"fishing\", \"farming\"]', 61118, 73341, 8, 1, '[\"empty\", \"empty\", \"empty\", \"empty\", \"empty\", \"empty\"]');

-- --------------------------------------------------------

--
-- Table structure for table `game_keys`
--

CREATE TABLE `game_keys` (
  `id` int(8) NOT NULL,
  `game_key` int(16) NOT NULL,
  `game` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `game_keys`
--

INSERT INTO `game_keys` (`id`, `game_key`, `game`) VALUES
(9, 1915343700, 1);

-- --------------------------------------------------------

--
-- Table structure for table `game_variables`
--

CREATE TABLE `game_variables` (
  `id` int(16) NOT NULL,
  `kind` varchar(16) NOT NULL,
  `variable` varchar(16) NOT NULL,
  `game_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `game_variables`
--

INSERT INTO `game_variables` (`id`, `kind`, `variable`, `game_id`) VALUES
(308, 'city', 'village', 1),
(309, 'city', 'village', 1),
(310, 'city', 'town', 1),
(311, 'city', 'village', 1),
(312, 'city', 'town', 1),
(313, 'city', 'city', 1),
(314, 'city', 'village', 1),
(315, 'city', 'town', 1),
(316, 'city', 'city', 1),
(317, 'city', 'village', 1),
(318, 'city', 'town', 1),
(319, 'city', 'city', 1),
(320, 'industry', 'fishing', 1),
(321, 'industry', 'nuclear', 1),
(322, 'industry', 'farming', 1),
(323, 'industry', 'tourism', 1),
(324, 'industry', 'forest', 1),
(325, 'industry', 'mining', 1),
(329, 'city_name', 'Utrecht', 1),
(330, 'city_name', 'Eindhoven', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `game_keys`
--
ALTER TABLE `game_keys`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `game_variables`
--
ALTER TABLE `game_variables`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=331;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
