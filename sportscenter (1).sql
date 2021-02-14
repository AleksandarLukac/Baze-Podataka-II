-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2021 at 12:22 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sportscenter`
--
CREATE DATABASE IF NOT EXISTS `sportscenter` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `sportscenter`;

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hall_id` int(11) NOT NULL,
  `court_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `begining` time NOT NULL,
  `end` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `hall_id`, `court_id`, `user_id`, `date`, `begining`, `end`, `created_at`, `updated_at`) VALUES
(80, 1, 1, 1, '2021-02-10', '08:10:00', '09:51:00', '2021-02-09 17:50:35', '2021-02-13 11:22:50'),
(81, 1, 1, 1, '2021-02-10', '09:51:00', '10:59:00', '2021-02-09 17:53:08', '2021-02-09 17:53:08'),
(83, 1, 1, 1, '2021-02-10', '11:00:00', '11:50:00', '2021-02-09 18:20:53', '2021-02-09 18:20:53'),
(86, 1, 1, 1, '2021-02-10', '11:55:00', '12:40:00', '2021-02-10 12:08:51', '2021-02-13 11:14:59'),
(90, 3, 3, 1, '2021-02-10', '08:00:00', '09:00:00', '2021-02-10 12:18:29', '2021-02-10 12:18:29'),
(91, 1, 1, 1, '2021-02-10', '12:40:00', '14:00:00', '2021-02-10 12:19:02', '2021-02-10 12:19:02'),
(103, 3, 3, 1, '2021-02-10', '09:30:00', '10:00:00', '2021-02-10 13:02:53', '2021-02-10 13:02:53'),
(104, 2, 4, 1, '2021-02-10', '08:00:00', '09:00:00', '2021-02-10 13:04:31', '2021-02-10 13:04:31'),
(105, 2, 4, 1, '2021-02-10', '09:00:00', '10:00:00', '2021-02-10 13:04:49', '2021-02-10 13:04:49'),
(106, 2, 4, 1, '2021-02-10', '10:40:00', '11:50:00', '2021-02-10 13:06:36', '2021-02-13 10:47:53'),
(117, 2, 4, 1, '2021-02-10', '11:50:00', '14:00:00', '2021-02-10 14:55:31', '2021-02-10 14:55:31'),
(120, 2, 4, 1, '2021-02-10', '17:00:00', '18:00:00', '2021-02-10 15:47:29', '2021-02-10 15:47:29'),
(122, 2, 4, 1, '2021-02-10', '14:30:00', '16:30:00', '2021-02-10 16:33:15', '2021-02-10 16:44:30'),
(123, 2, 4, 1, '2021-02-10', '14:00:00', '14:30:00', '2021-02-10 16:34:59', '2021-02-10 16:34:59'),
(124, 2, 4, 1, '2021-02-10', '10:00:00', '10:40:00', '2021-02-10 16:54:41', '2021-02-10 16:54:41'),
(125, 1, 2, 1, '2021-02-10', '08:30:00', '09:30:00', '2021-02-10 17:14:42', '2021-02-10 17:14:42'),
(126, 3, 3, 2, '2021-02-10', '10:26:00', '11:30:00', '2021-02-11 08:27:10', '2021-02-11 08:27:10'),
(127, 1, 2, 1, '2021-02-13', '17:00:00', '18:30:00', '2021-02-13 11:13:36', '2021-02-13 11:13:36'),
(128, 1, 2, 1, '2021-02-13', '09:30:00', '11:00:00', '2021-02-13 11:19:00', '2021-02-13 11:19:18'),
(129, 1, 1, 1, '2021-02-13', '08:30:00', '09:30:00', '2021-02-13 11:27:14', '2021-02-13 11:27:14'),
(131, 1, 1, 6, '2021-02-14', '09:00:00', '10:00:00', '2021-02-14 10:14:20', '2021-02-14 10:14:20'),
(132, 3, 3, 6, '2021-02-14', '09:00:00', '10:00:00', '2021-02-14 10:14:27', '2021-02-14 10:14:27'),
(133, 2, 4, 6, '2021-02-14', '09:00:00', '10:30:00', '2021-02-14 10:14:32', '2021-02-14 10:15:16'),
(134, 2, 4, 6, '2021-02-14', '11:00:00', '12:00:00', '2021-02-14 10:14:52', '2021-02-14 10:14:52');

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

DROP TABLE IF EXISTS `clubs`;
CREATE TABLE `clubs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `number_of_users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clubs`
--

INSERT INTO `clubs` (`id`, `name`, `created_at`, `updated_at`, `number_of_users`) VALUES
(2, 'Olimpik', '2020-09-03 12:23:32', '2020-09-03 12:23:32', 20),
(3, 'ZOK Gradiska', '2020-09-03 12:24:11', '2020-09-03 12:24:11', 30);

-- --------------------------------------------------------

--
-- Table structure for table `club_coach`
--

DROP TABLE IF EXISTS `club_coach`;
CREATE TABLE `club_coach` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `club_id` bigint(20) UNSIGNED NOT NULL,
  `coach_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `club_coach`
--

INSERT INTO `club_coach` (`id`, `club_id`, `coach_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, NULL, NULL),
(2, 2, 2, NULL, NULL),
(3, 3, 2, NULL, NULL),
(4, 3, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `club_user`
--

DROP TABLE IF EXISTS `club_user`;
CREATE TABLE `club_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `club_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `club_user`
--

INSERT INTO `club_user` (`id`, `club_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2020-09-07 11:46:39', '2020-09-07 11:46:39'),
(2, 3, 1, '2020-09-07 11:46:39', '2020-09-07 11:46:39'),
(3, 2, 3, '2020-09-07 11:50:53', '2020-09-07 11:50:53'),
(4, 3, 3, '2020-09-07 11:50:53', '2020-09-07 11:50:53'),
(6, 2, 4, '2020-09-07 11:52:14', '2020-09-07 11:52:14'),
(7, 3, 5, '2020-09-07 11:52:49', '2020-09-07 11:52:49');

-- --------------------------------------------------------

--
-- Table structure for table `coaches`
--

DROP TABLE IF EXISTS `coaches`;
CREATE TABLE `coaches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `domain` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coaches`
--

INSERT INTO `coaches` (`id`, `name`, `domain`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Zlatko', 'Volleyball', 'zeljana@example.com', '2020-08-23 14:40:14', '2020-08-23 14:40:14'),
(2, 'Bojan', 'Volleyball', 'darijo@example.com', '2020-09-03 13:21:11', '2020-09-03 13:21:11'),
(3, 'Ivan', 'Volleyball', 'ivan@example.com', '2020-09-03 13:21:35', '2020-09-03 13:21:35');

-- --------------------------------------------------------

--
-- Table structure for table `courts`
--

DROP TABLE IF EXISTS `courts`;
CREATE TABLE `courts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kind` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mark` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `hall_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courts`
--

INSERT INTO `courts` (`id`, `kind`, `mark`, `created_at`, `updated_at`, `hall_id`) VALUES
(1, 'odbojka', 0, '2020-09-21 15:01:28', '2020-09-21 15:01:28', 1),
(2, 'tenis', 0, '2020-09-21 16:42:53', '2020-09-21 16:42:53', 1),
(3, 'odbojka', 0, '2020-09-23 04:46:21', '2020-09-23 04:46:21', 3),
(4, 'odbojka', 0, '2020-10-23 12:53:52', '2020-10-23 12:53:52', 2);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `halls`
--

DROP TABLE IF EXISTS `halls`;
CREATE TABLE `halls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `width` int(11) NOT NULL,
  `length` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `halls`
--

INSERT INTO `halls` (`id`, `width`, `length`, `capacity`, `created_at`, `updated_at`) VALUES
(1, 10, 25, 200, '2020-09-21 14:40:52', '2020-09-21 14:40:52'),
(2, 12, 30, 300, '2020-09-23 04:47:47', '2020-09-23 04:47:47'),
(3, 10, 19, 40, '2020-09-23 04:48:38', '2020-09-23 04:48:38');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_08_23_182735_create_coaches_table', 1),
(5, '2020_08_23_185103_create_courts_table', 1),
(6, '2020_08_23_185625_create_halls_table', 1),
(7, '2020_08_23_191915_create_clubs_table', 1),
(8, '2020_08_23_231954_create_club_user_table', 1),
(9, '2020_08_23_234143_create_club_coach_table', 1),
(10, '2020_08_24_081728_add_id_hall_to_courts_table', 1),
(11, '2020_08_24_085449_add_number_of_users_to_club_table', 1),
(12, '2020_09_07_150558_add_email_to_coaches_table', 1),
(13, '2021_02_01_161940_create_appointments_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Zeljana', 'zeljana@example.com', NULL, '$2y$10$ScO8.UfOzaEozFhAxVMiluV.EiBCXEZNcRofj8cspnb7BB9SR6rYG', 'RwWTxnCNtNTd2KendA1FllxtBmrTW9YdONkvtYp6v3f09zWSNmOLZJpSmjf3', '2020-08-23 12:37:43', '2020-08-23 12:37:43'),
(2, 'Ivana', 'ivana@example.com', NULL, '$2y$10$T2b.bhXZtNmeCjQYNHR3QOFC4x0GzL8xsuGO22kkM7peEsO/vOtjy', NULL, '2020-08-24 05:49:13', '2020-08-24 05:49:13'),
(3, 'Milan', 'milan@example.com', NULL, '$2y$10$dp0ty6lEMDZikQPFXklnw.ZRzi8LmhQxGiEm3ZJ1t5WTv0XPgWKIq', NULL, '2020-08-24 05:52:14', '2020-08-24 05:52:14'),
(4, 'Darijo', 'darijo@example.com', NULL, '$2y$10$fs0xfspf2hH8uy/CtQBoZuaZs4tvRIC4WqWPlKgztOafcHvWNu93y', NULL, '2020-08-25 08:57:46', '2020-08-25 08:57:46'),
(5, 'Zeljanaaa', 'david@example.com', NULL, '$2y$10$og46zvQFU0lVuwQka6yt0OYThKjuCOhSBw03anMKCsaYznrZpILHS', NULL, '2020-09-05 10:46:40', '2020-09-05 10:46:40'),
(6, 'Ivan', 'ivan@example.com', NULL, '$2y$10$ZUURzaZip6q/AvWot0FD.OOwP6I1q9HdqdKfFArHCbpTNhz7Ac9z2', '9N8hyMktZrdumJK1uQdVcp4EXH8NRNKMoyTHkWM2VQRQki1KCN8dC3CRKl28', '2020-09-07 16:41:08', '2020-09-07 16:41:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `club_coach`
--
ALTER TABLE `club_coach`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `club_user`
--
ALTER TABLE `club_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coaches`
--
ALTER TABLE `coaches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courts`
--
ALTER TABLE `courts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courts_hall_id_foreign` (`hall_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `halls`
--
ALTER TABLE `halls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `club_coach`
--
ALTER TABLE `club_coach`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `club_user`
--
ALTER TABLE `club_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `coaches`
--
ALTER TABLE `coaches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `courts`
--
ALTER TABLE `courts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `halls`
--
ALTER TABLE `halls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courts`
--
ALTER TABLE `courts`
  ADD CONSTRAINT `courts_hall_id_foreign` FOREIGN KEY (`hall_id`) REFERENCES `halls` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
