-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2018 at 01:32 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `football`
--

-- --------------------------------------------------------

--
-- Table structure for table `fixtures`
--

CREATE TABLE IF NOT EXISTS `fixtures` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `group_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `pitch_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `team_one_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `team_two_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_start` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_end` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fixtures`
--

INSERT INTO `fixtures` (`id`, `group_id`, `pitch_id`, `team_one_id`, `team_two_id`, `date`, `time_start`, `time_end`, `created_at`, `updated_at`) VALUES
(1, '0', '1', '1', '2', '24/06/2018', '10:00pm', '12:00pm', '2018-06-24 03:51:44', '2018-06-24 03:51:44'),
(2, '0', '1', '3', '4', '24/06/2018', '10:00pm', '12:00pm', '2018-06-24 03:51:54', '2018-06-24 03:51:54'),
(3, '0', '1', '1', '3', '24/06/2018', '10:00pm', '12:00pm', '2018-06-24 03:52:05', '2018-06-24 03:52:05'),
(4, '0', '1', '2', '4', '24/06/2018', '10:00pm', '12:00pm', '2018-06-24 03:52:19', '2018-06-24 03:52:19'),
(5, '0', '1', '1', '4', '24/06/2018', '10:00pm', '12:00pm', '2018-06-24 03:52:35', '2018-06-24 03:52:35');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `created_at`, `updated_at`, `code`) VALUES
(1, 'Group A', '2018-06-23 07:00:00', '2018-06-23 07:00:00', 'A'),
(2, 'Group B', '2018-06-23 07:00:00', '2018-06-23 07:00:00', 'B'),
(3, 'Group C', '2018-06-23 07:00:00', '2018-06-23 07:00:00', 'C'),
(4, 'Group D', '2018-06-23 07:00:00', '2018-06-23 07:00:00', 'D');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_06_23_140727_create_groups_table', 1),
(4, '2018_06_23_140936_create_teams_table', 1),
(6, '2018_06_24_053535_add_code_to_groups_table', 2),
(11, '2018_06_23_141840_create_fixtures_table', 3),
(12, '2018_06_24_064301_create_pitches_table', 3),
(19, '2018_06_24_072831_create_scores_table', 4),
(20, '2018_06_24_073138_create_standings_table', 4),
(21, '2018_06_24_085750_add_pts_to_team', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pitches`
--

CREATE TABLE IF NOT EXISTS `pitches` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pitches`
--

INSERT INTO `pitches` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Pitch 1', '2018-06-16 19:00:00', '2018-06-23 19:00:00'),
(2, 'Pitch 2', '2018-06-23 19:00:00', '2018-06-23 19:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE IF NOT EXISTS `scores` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `fixture_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `team_one` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `team_two` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `draw` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`id`, `fixture_id`, `team_one`, `team_two`, `draw`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '1', '1', '2018-06-24 03:53:16', '2018-06-24 03:53:16'),
(2, '2', '2', '1', '0', '2018-06-24 03:53:24', '2018-06-24 03:53:24'),
(3, '3', '1', '3', '0', '2018-06-24 03:53:37', '2018-06-24 03:53:37'),
(4, '4', '2', '1', '0', '2018-06-24 03:53:46', '2018-06-24 03:53:46'),
(5, '5', '0', '1', '0', '2018-06-24 03:53:56', '2018-06-24 03:53:56');

-- --------------------------------------------------------

--
-- Table structure for table `standings`
--

CREATE TABLE IF NOT EXISTS `standings` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `group_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `team_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `w` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `d` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `l` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `gf` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `ga` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `gd` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `pts` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `standings`
--

INSERT INTO `standings` (`id`, `group_id`, `team_id`, `mp`, `w`, `d`, `l`, `gf`, `ga`, `gd`, `pts`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '3', '0', '1', '2', '2', '5', '-3', '1', '2018-06-24 03:52:53', '2018-06-24 03:53:56'),
(2, '1', '2', '2', '1', '1', '0', '3', '2', '1', '4', '2018-06-24 03:52:53', '2018-06-24 03:53:47'),
(3, '1', '3', '2', '1', '0', '1', '3', '4', '-1', '3', '2018-06-24 03:52:53', '2018-06-24 03:53:38'),
(4, '1', '4', '3', '2', '0', '1', '4', '3', '1', '6', '2018-06-24 03:52:53', '2018-06-24 03:53:56'),
(5, '2', '5', '0', '0', '0', '0', '0', '0', '0', '0', '2018-06-24 03:52:53', '2018-06-24 03:52:53'),
(6, '2', '6', '0', '0', '0', '0', '0', '0', '0', '0', '2018-06-24 03:52:53', '2018-06-24 03:52:53'),
(7, '2', '7', '0', '0', '0', '0', '0', '0', '0', '0', '2018-06-24 03:52:53', '2018-06-24 03:52:53'),
(8, '2', '8', '0', '0', '0', '0', '0', '0', '0', '0', '2018-06-24 03:52:53', '2018-06-24 03:52:53'),
(9, '3', '9', '0', '0', '0', '0', '0', '0', '0', '0', '2018-06-24 03:52:53', '2018-06-24 03:52:53'),
(10, '3', '10', '0', '0', '0', '0', '0', '0', '0', '0', '2018-06-24 03:52:54', '2018-06-24 03:52:54'),
(11, '3', '11', '0', '0', '0', '0', '0', '0', '0', '0', '2018-06-24 03:52:54', '2018-06-24 03:52:54'),
(12, '3', '12', '0', '0', '0', '0', '0', '0', '0', '0', '2018-06-24 03:52:54', '2018-06-24 03:52:54'),
(13, '4', '13', '0', '0', '0', '0', '0', '0', '0', '0', '2018-06-24 03:52:54', '2018-06-24 03:52:54'),
(14, '4', '14', '0', '0', '0', '0', '0', '0', '0', '0', '2018-06-24 03:52:54', '2018-06-24 03:52:54'),
(15, '4', '15', '0', '0', '0', '0', '0', '0', '0', '0', '2018-06-24 03:52:54', '2018-06-24 03:52:54'),
(16, '4', '16', '0', '0', '0', '0', '0', '0', '0', '0', '2018-06-24 03:52:54', '2018-06-24 03:52:54');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE IF NOT EXISTS `teams` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `group_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pts` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `group_id`, `name`, `created_at`, `updated_at`, `pts`) VALUES
(1, '1', 'Thilafushi FC', '2018-06-23 07:00:00', '2018-06-23 07:00:00', '1'),
(2, '1', 'Metro Panthers', '2018-06-23 07:00:00', '2018-06-23 07:00:00', '4'),
(3, '1', 'Desperado FC', '2018-06-23 07:00:00', '2018-06-23 07:00:00', '3'),
(4, '1', 'FC Docs', '2018-06-23 07:00:00', '2018-06-23 07:00:00', '6'),
(5, '2', 'Metro Blues', '2018-06-23 07:00:00', '2018-06-23 07:00:00', '0'),
(6, '2', 'FC Dhaaelhun', '2018-06-23 07:00:00', '2018-06-23 07:00:00', '0'),
(7, '2', 'Four Wings FC', '2018-06-23 07:00:00', '2018-06-23 07:00:00', '0'),
(8, '2', 'Squadra Sports Club', '2018-06-23 07:00:00', '2018-06-23 07:00:00', '0'),
(9, '3', 'Metro Legends', '2018-06-23 07:00:00', '2018-06-23 07:00:00', '0'),
(10, '3', 'Rathafandhoo SC', '2018-06-23 07:00:00', '2018-06-23 07:00:00', '0'),
(11, '3', 'Red Snappers', '2018-06-23 07:00:00', '2018-06-23 07:00:00', '0'),
(12, '3', 'Bangladesh FT', '2018-06-23 07:00:00', '2018-06-23 07:00:00', '0'),
(13, '4', 'DGSC', '2018-06-23 07:00:00', '2018-06-23 07:00:00', '0'),
(14, '4', 'Team Inguraidhoo', '2018-06-23 07:00:00', '2018-06-23 07:00:00', '0'),
(15, '4', 'Club Teenage', '2018-06-23 07:00:00', '2018-06-23 07:00:00', '0'),
(16, '4', 'Metro Ravens', '2018-06-23 07:00:00', '2018-06-23 07:00:00', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
