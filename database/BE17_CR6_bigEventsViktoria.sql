-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 03, 2022 at 12:51 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `BE17_CR6_bigEventsViktoria`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20221202093708', '2022-12-02 09:37:20', 69);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `capacity` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `city` varchar(100) NOT NULL,
  `url` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `name`, `description`, `picture`, `capacity`, `email`, `phone_number`, `city`, `url`, `type`, `date`) VALUES
(1, 'Depeche Mode', 'Depeche Mode Announce First Live Shows in Five Years - \'Memento Mori\' World Tour to Kick Off ', 'https://static.dw.com/image/63331097_303.jpg', '30000', 'event@mail.com', '463 5375310', 'Klagenfurt', 'https://www.depechemode.com/', 'music', '2023-07-21 19:30:00'),
(2, 'FIFA World Cup Qatar 2022', 'The final will be held on 18 December 2022 at Lusail Stadium, coinciding with Qatar\'s National Day', 'https://cdn.mth.group/fifa_OLP_logo_rot.jpg', '44.089', 'fifa@mail.com', '1234567', 'Lusail', 'https://www.fifa.com/fifaplus/en/tournaments/mens/worldcup/qatar2022', 'sport', '2022-12-18 15:00:00'),
(4, 'test edited', 'test edited', 'https://cdn.pixabay.com/photo/2021/09/28/13/14/cat-6664412_1280.jpg', '1234', '123@mail.com', '12345678', 'vienna', 'https://pixabay.com/images/id-6664412/', 'miscellaneous', '2017-01-01 00:00:00'),
(5, 'Avatar: The Way of Water', 'Epic science fiction film that is the sequel to the 2009 film Avatar, both directed by James Cameron', 'https://de.web.img2.acsta.net/c_310_420/pictures/22/11/04/08/13/1380149.jpg', '500', 'cinema@mail.com', '463 5375310', 'Vienna', 'https://www.cineplexx.at/center/apollo-das-kino/', 'movie', '2022-12-06 19:30:00'),
(6, 'VSV vs. KAC', 'The hottest ice hockey game of the year', 'https://www.sky.at/static/img/sales_produkte/SKY_LP_VSV_Eishockey_Header_Small_649x365_V01_1.png', '3950', 'vsv@mail.com', '12345678', 'Villach', 'https://www.ecvsv.at/', 'sport', '2022-12-05 20:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
