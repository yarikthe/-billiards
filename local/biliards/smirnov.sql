-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 02, 2020 at 06:47 PM
-- Server version: 5.7.30
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `Smirnov`
--

-- --------------------------------------------------------

--
-- Table structure for table `claim_organizators`
--

CREATE TABLE `claim_organizators` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `dateClaim` date NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isOk` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `claim_organizators`
--

INSERT INTO `claim_organizators` (`id`, `user_id`, `dateClaim`, `company`, `isOk`, `created_at`, `updated_at`) VALUES
(3, 1, '2020-11-24', 'My Best Company', 1, '2020-11-24 14:05:25', '2020-11-24 14:05:25'),
(5, 2, '2020-11-02', 'ШАРИК', 1, NULL, NULL),
(7, 7, '2020-11-27', 'ZT Company', 0, '2020-11-27 12:46:08', '2020-11-27 12:46:08');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2020_11_10_135920_create_news_table', 1),
(13, '2014_10_12_000000_create_users_table', 2),
(14, '2014_10_12_100000_create_password_resets_table', 2),
(15, '2019_08_19_000000_create_failed_jobs_table', 2),
(16, '2020_11_10_135650_create_players_table', 2),
(17, '2020_11_10_135933_create_turnirs_table', 2),
(18, '2020_11_10_135949_create_set_pleyers_table', 2),
(19, '2020_11_10_140004_create_stavkas_table', 2),
(20, '2020_11_10_140018_create_forecasts_table', 2),
(21, '2020_11_10_140031_create_statistics_table', 2),
(22, '2020_11_10_144749_create_raunds_table', 2),
(23, '2020_11_10_152014_create_claim_organizators_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pleyer.png',
  `sportTitul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Sportsmen',
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateBorn` date NOT NULL,
  `countPointStart` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `countWin` int(11) NOT NULL,
  `countLoss` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `name`, `photo`, `sportTitul`, `city`, `dateBorn`, `countPointStart`, `countWin`, `countLoss`, `created_at`, `updated_at`) VALUES
(11, 'Roni2', '1605636258.png', 'Master', 'Житомир', '2020-11-03', '488', 12, 2, '2020-11-17 16:04:18', '2020-11-27 13:07:21'),
(12, 'Ann', '1605640502.png', 'Master', 'Житомир', '2020-11-29', '344', 3, 4, '2020-11-17 17:15:02', '2020-11-20 22:25:43'),
(13, 'BOB', '1605640818.png', 'Pro', 'qew', '2020-11-20', '266', 3, 4, '2020-11-17 17:20:18', '2020-11-25 20:21:38'),
(14, 'Gery', '1605918305.png', 'Master', 'Житомир', '2020-11-25', '456', 1, 3, '2020-11-20 22:25:05', '2020-12-02 13:07:58'),
(15, 'Steve', '1605918375.png', 'Midl', 'Житомир', '2020-11-19', '424', 23, 12, '2020-11-20 22:26:15', '2020-11-20 22:26:15'),
(16, 'Steven Gedy', '1606920764.png', 'New', 'Kiev', '2020-12-26', '230', 2, 1, '2020-12-02 12:52:45', '2020-12-02 12:52:45'),
(17, 'Test for Forecast', '1606931539.png', 'Master', 'Житомир', '2020-12-24', '345', 345, 34, '2020-12-02 15:52:19', '2020-12-02 15:52:19');

-- --------------------------------------------------------

--
-- Table structure for table `p_r`
--

CREATE TABLE `p_r` (
  `id` bigint(11) NOT NULL,
  `name` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `raund_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `p_r`
--

INSERT INTO `p_r` (`id`, `name`, `user_id`, `raund_id`, `created_at`, `updated_at`) VALUES
(4, '[\"Ann\"]', 12, 9, '2020-11-25 12:15:40', '2020-11-25 12:15:40'),
(5, '[\"BOB\"]', 13, 9, '2020-11-25 12:15:40', '2020-11-25 12:15:40'),
(12, '[\"Ann\"]', 12, 13, '2020-11-25 13:41:39', '2020-11-25 13:41:39'),
(13, '[\"BOB\"]', 13, 13, '2020-11-25 13:41:39', '2020-11-25 13:41:39'),
(14, '[\"Roni\"]', 11, 14, '2020-11-25 13:42:23', '2020-11-25 13:42:23'),
(15, '[\"Gery\"]', 14, 14, '2020-11-25 13:42:23', '2020-11-25 13:42:23'),
(16, '[\"BOB\"]', 13, 15, '2020-11-25 13:42:57', '2020-11-25 13:42:57'),
(17, '[\"Steve\"]', 15, 15, '2020-11-25 13:42:57', '2020-11-25 13:42:57'),
(18, '[\"Roni\"]', 11, 16, '2020-11-25 13:48:55', '2020-11-25 13:48:55'),
(19, '[\"Steve\"]', 15, 16, '2020-11-25 13:48:55', '2020-11-25 13:48:55'),
(20, '[\"Roni\"]', 11, 17, '2020-11-25 20:15:59', '2020-11-25 20:15:59'),
(21, '[\"BOB\"]', 13, 17, '2020-11-25 20:15:59', '2020-11-25 20:15:59'),
(22, '[\"Gery\"]', 14, 18, '2020-11-25 20:16:28', '2020-11-25 20:16:28'),
(23, '[\"Steve\"]', 15, 18, '2020-11-25 20:16:28', '2020-11-25 20:16:28'),
(24, '[\"Roni\"]', 11, 19, '2020-11-25 20:17:13', '2020-11-25 20:17:13'),
(25, '[\"Steve\"]', 15, 19, '2020-11-25 20:17:13', '2020-11-25 20:17:13'),
(26, '[\"Roni\"]', 11, 20, '2020-11-25 20:20:29', '2020-11-25 20:20:29'),
(27, '[\"Ann\"]', 12, 20, '2020-11-25 20:20:29', '2020-11-25 20:20:29'),
(28, '[\"BOB\"]', 13, 21, '2020-11-25 20:21:14', '2020-11-25 20:21:14'),
(29, '[\"Gery\"]', 14, 21, '2020-11-25 20:21:14', '2020-11-25 20:21:14'),
(30, '[\"Roni\"]', 11, 22, '2020-11-25 20:21:56', '2020-11-25 20:21:56'),
(31, '[\"BOB\"]', 13, 22, '2020-11-25 20:21:56', '2020-11-25 20:21:56'),
(32, '[\"BOB\"]', 13, 23, '2020-11-28 10:46:42', '2020-11-28 10:46:42'),
(33, '[\"Gery\"]', 14, 23, '2020-11-28 10:46:42', '2020-11-28 10:46:42'),
(34, '[\"Roni2\"]', 11, 24, '2020-11-28 10:48:31', '2020-11-28 10:48:31'),
(35, '[\"BOB\"]', 13, 24, '2020-11-28 10:48:31', '2020-11-28 10:48:31');

-- --------------------------------------------------------

--
-- Table structure for table `raunds`
--

CREATE TABLE `raunds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `turnir_id` bigint(20) UNSIGNED NOT NULL,
  `player_01_ID` int(11) NOT NULL DEFAULT '0',
  `player_02_ID` int(11) NOT NULL DEFAULT '0',
  `dateRaund` date NOT NULL,
  `koefWin01` decimal(12,2) NOT NULL,
  `koefWin02` decimal(12,2) NOT NULL,
  `win_player_id` int(11) NOT NULL DEFAULT '0',
  `pointPlayer01` int(11) NOT NULL DEFAULT '0',
  `pointPlayer02` int(11) NOT NULL DEFAULT '0',
  `isDone` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `raunds`
--

INSERT INTO `raunds` (`id`, `name`, `turnir_id`, `player_01_ID`, `player_02_ID`, `dateRaund`, `koefWin01`, `koefWin02`, `win_player_id`, `pointPlayer01`, `pointPlayer02`, `isDone`, `created_at`, `updated_at`) VALUES
(13, 'R1', 19, 12, 13, '2020-11-25', '1.00', '2.00', 13, 3, 0, 1, '2020-11-25 13:41:39', '2020-11-25 13:42:39'),
(14, 'R1', 19, 11, 14, '2020-11-26', '2.00', '3.00', 11, 677, 0, 1, '2020-11-25 13:42:23', '2020-11-25 13:43:57'),
(15, 'R2', 19, 13, 15, '2020-11-27', '2.00', '3.00', 15, 354, 0, 1, '2020-11-25 13:42:57', '2020-11-25 13:48:06'),
(16, 'R3', 19, 11, 15, '2020-12-01', '4.00', '5.00', 15, 23, 0, 1, '2020-11-25 13:48:55', '2020-11-25 13:50:51'),
(20, '1', 27, 11, 12, '2020-11-27', '1.00', '2.00', 11, 43, 0, 1, '2020-11-25 20:20:29', '2020-11-25 20:21:30'),
(21, '1', 27, 13, 14, '2020-11-27', '2.00', '4.00', 13, 34, 0, 1, '2020-11-25 20:21:14', '2020-11-25 20:21:38'),
(22, '2', 27, 11, 13, '2020-11-28', '3.00', '3.00', 13, 23, 0, 1, '2020-11-25 20:21:56', '2020-11-25 20:22:06'),
(23, '4', 19, 13, 14, '2020-11-26', '1.00', '2.00', 14, 213, 132, 1, '2020-11-28 10:46:42', '2020-12-02 13:07:58'),
(24, '1', 28, 11, 13, '2020-11-29', '2.00', '3.00', 0, 0, 0, 0, '2020-11-28 10:48:31', '2020-11-28 10:48:31');

-- --------------------------------------------------------

--
-- Table structure for table `set_pleyers`
--

CREATE TABLE `set_pleyers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `turnir_id` bigint(20) UNSIGNED NOT NULL,
  `player_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `set_pleyers`
--

INSERT INTO `set_pleyers` (`id`, `turnir_id`, `player_id`, `created_at`, `updated_at`) VALUES
(6, 18, 12, '2020-11-18 11:40:27', '2020-11-18 11:40:27'),
(8, 19, 12, '2020-11-18 11:44:37', '2020-11-18 11:44:37'),
(11, 19, 13, '2020-11-20 14:34:43', '2020-11-20 14:34:43'),
(18, 19, 11, '2020-11-25 13:01:29', '2020-11-25 13:01:29'),
(19, 19, 14, '2020-11-25 13:01:29', '2020-11-25 13:01:29'),
(20, 19, 15, '2020-11-25 13:01:29', '2020-11-25 13:01:29'),
(35, 27, 11, '2020-11-25 20:20:14', '2020-11-25 20:20:14'),
(36, 27, 12, '2020-11-25 20:20:14', '2020-11-25 20:20:14'),
(37, 27, 13, '2020-11-25 20:20:14', '2020-11-25 20:20:14'),
(38, 27, 14, '2020-11-25 20:20:14', '2020-11-25 20:20:14'),
(39, 28, 11, '2020-11-28 10:48:05', '2020-11-28 10:48:05'),
(40, 28, 13, '2020-11-28 10:48:05', '2020-11-28 10:48:05'),
(41, 28, 15, '2020-11-28 10:48:05', '2020-11-28 10:48:05');

-- --------------------------------------------------------

--
-- Table structure for table `stavkas`
--

CREATE TABLE `stavkas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `turnir_id` bigint(20) UNSIGNED NOT NULL,
  `raund_id` int(11) NOT NULL DEFAULT '0',
  `player_id` int(11) NOT NULL DEFAULT '0',
  `money` decimal(12,2) NOT NULL,
  `dateStavka` date NOT NULL,
  `isWin` tinyint(1) NOT NULL DEFAULT '0',
  `total` decimal(10,0) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stavkas`
--

INSERT INTO `stavkas` (`id`, `user_id`, `turnir_id`, `raund_id`, `player_id`, `money`, `dateStavka`, `isWin`, `total`, `created_at`, `updated_at`) VALUES
(6, 1, 19, 11, 11, '1203.00', '2020-11-25', 1, '14436', '2020-11-25 13:05:37', '2020-11-25 13:11:30'),
(7, 1, 19, 12, 13, '436.00', '2020-11-25', 0, '-436', '2020-11-25 13:19:02', '2020-11-25 13:19:02'),
(8, 1, 19, 12, 11, '500.00', '2020-11-25', 1, '1500', '2020-11-25 13:20:21', '2020-11-25 13:20:37'),
(9, 1, 19, 14, 14, '32432.00', '2020-11-28', 2, '0', '2020-11-28 10:43:19', '2020-11-28 10:43:19');

-- --------------------------------------------------------

--
-- Table structure for table `turnirs`
--

CREATE TABLE `turnirs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `prizMoney` decimal(12,2) NOT NULL,
  `place` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `win_player_id` int(11) NOT NULL DEFAULT '0',
  `pointWin` int(11) NOT NULL,
  `isPiblic` tinyint(1) NOT NULL DEFAULT '0',
  `isDone` tinyint(1) NOT NULL DEFAULT '0',
  `organizator_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `turnirs`
--

INSERT INTO `turnirs` (`id`, `name`, `desc`, `prizMoney`, `place`, `date_start`, `date_end`, `win_player_id`, `pointWin`, `isPiblic`, `isDone`, `organizator_id`, `created_at`, `updated_at`) VALUES
(18, 'Winter', 'winter cup', '2132.00', 'Житомир', '2020-12-24', '2021-01-07', 0, 0, 1, 0, 2, '2020-11-18 11:40:27', '2020-11-28 10:44:26'),
(19, 'Now Edit1', 'now cup', '21323.00', 'Житомир', '2020-11-16', '2020-11-20', 0, 0, 1, 0, 3, '2020-11-18 11:44:37', '2020-11-27 13:27:19'),
(27, 'Cup Man Text', 'Cup Man Text', '1234.00', 'Житомир', '2020-11-25', '2020-11-28', 14, 324, 1, 1, 2, '2020-11-25 20:20:14', '2020-11-28 13:46:56'),
(28, 'weewqeq', 'qeqeeq', '5659.00', 'Житомир', '2020-11-27', '2020-12-03', 0, 0, 0, 0, 2, '2020-11-28 10:48:05', '2020-11-28 10:48:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default-user.jpg',
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance` decimal(12,2) NOT NULL DEFAULT '0.00',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `avatar`, `phone`, `balance`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Смірнов', 'smirnov@mail.com', '$2y$10$pbVezxHm2/wIZtykh9fj0uFCEppD8xaPEhCkXiS9oS9TlentjMj66', 'user', 'default-user.jpg', '098-09-12-202', '33326.00', NULL, NULL, '2020-11-11 21:06:13', '2020-11-28 10:43:19'),
(2, 'ТОВ \"Шарик\"', 'org@mail.com', '$2y$10$gkSsb/Du2XPuH8/ELej7vOouk5qXDQLZQEHXs4oB3rsBrk5zrEgO6', 'org', 'default-user.jpg', '', '0.00', NULL, NULL, '2020-11-11 21:07:46', '2020-11-11 21:07:46'),
(3, 'BS7', 'admin@mail.com', '$2y$10$32khsZuAV5P3ChIKhfpAwOHNggcUwIuYoPYin4lEnytvkWyi9qOrq', 'admin', 'default-user.jpg', '', '0.00', NULL, NULL, '2020-11-11 21:08:56', '2020-11-11 21:08:56'),
(7, 'test', 'test@mail.com', '$2y$10$LFCsQZAanrePpimJja7LzO0VCiO8dJst1g/3BOtCW0M2v7ugGub7u', 'user', 'default-user.jpg', '', '467.00', NULL, NULL, '2020-11-27 12:45:55', '2020-11-28 10:50:05'),
(18, 'werwer', '1111234@we.we', '$2y$10$S1yPWj8fgEcvThgl3juGL.NHmm0oB5s5a49Z3O3Bd4bdtMXYqAjeG', 'user', 'default-user.jpg', '23432432', '0.00', NULL, NULL, '2020-11-27 16:12:09', '2020-11-27 16:12:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `claim_organizators`
--
ALTER TABLE `claim_organizators`
  ADD PRIMARY KEY (`id`),
  ADD KEY `claim_organizators_user_id_index` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `p_r`
--
ALTER TABLE `p_r`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `raunds`
--
ALTER TABLE `raunds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `raunds_turnir_id_index` (`turnir_id`);

--
-- Indexes for table `set_pleyers`
--
ALTER TABLE `set_pleyers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `set_pleyers_turnir_id_index` (`turnir_id`),
  ADD KEY `set_pleyers_player_id_index` (`player_id`);

--
-- Indexes for table `stavkas`
--
ALTER TABLE `stavkas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stavkas_user_id_index` (`user_id`),
  ADD KEY `stavkas_turnir_id_index` (`turnir_id`);

--
-- Indexes for table `turnirs`
--
ALTER TABLE `turnirs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `turnirs_organizator_id_index` (`organizator_id`);

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
-- AUTO_INCREMENT for table `claim_organizators`
--
ALTER TABLE `claim_organizators`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `p_r`
--
ALTER TABLE `p_r`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `raunds`
--
ALTER TABLE `raunds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `set_pleyers`
--
ALTER TABLE `set_pleyers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `stavkas`
--
ALTER TABLE `stavkas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `turnirs`
--
ALTER TABLE `turnirs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `claim_organizators`
--
ALTER TABLE `claim_organizators`
  ADD CONSTRAINT `claim_organizators_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `raunds`
--
ALTER TABLE `raunds`
  ADD CONSTRAINT `raunds_turnir_id_foreign` FOREIGN KEY (`turnir_id`) REFERENCES `turnirs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `set_pleyers`
--
ALTER TABLE `set_pleyers`
  ADD CONSTRAINT `set_pleyers_player_id_foreign` FOREIGN KEY (`player_id`) REFERENCES `players` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `set_pleyers_turnir_id_foreign` FOREIGN KEY (`turnir_id`) REFERENCES `turnirs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stavkas`
--
ALTER TABLE `stavkas`
  ADD CONSTRAINT `stavkas_turnir_id_foreign` FOREIGN KEY (`turnir_id`) REFERENCES `turnirs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `stavkas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `turnirs`
--
ALTER TABLE `turnirs`
  ADD CONSTRAINT `turnirs_organizator_id_foreign` FOREIGN KEY (`organizator_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
