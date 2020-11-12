-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 12, 2020 at 12:02 AM
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `forecasts`
--

CREATE TABLE `forecasts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `dateForecast` date NOT NULL,
  `valueForecast` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `statistics`
--

CREATE TABLE `statistics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `turnir_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `countWin` int(11) NOT NULL DEFAULT '0',
  `countFail` int(11) NOT NULL DEFAULT '0',
  `countPoint` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'logo.png',
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
(1, 'Смірнов', 'smirnov@mail.com', '$2y$10$pbVezxHm2/wIZtykh9fj0uFCEppD8xaPEhCkXiS9oS9TlentjMj66', 'user', 'logo.png', '', '0.00', NULL, NULL, '2020-11-11 21:06:13', '2020-11-11 21:06:13'),
(2, 'ТОВ \"Шарик\"', 'org@mail.com', '$2y$10$gkSsb/Du2XPuH8/ELej7vOouk5qXDQLZQEHXs4oB3rsBrk5zrEgO6', 'org', 'logo.png', '', '0.00', NULL, NULL, '2020-11-11 21:07:46', '2020-11-11 21:07:46'),
(3, 'BS7', 'admin@mail.com', '$2y$10$32khsZuAV5P3ChIKhfpAwOHNggcUwIuYoPYin4lEnytvkWyi9qOrq', 'admin', 'logo.png', '', '0.00', NULL, NULL, '2020-11-11 21:08:56', '2020-11-11 21:08:56');

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
-- Indexes for table `forecasts`
--
ALTER TABLE `forecasts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forecasts_user_id_index` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
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
-- Indexes for table `statistics`
--
ALTER TABLE `statistics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `statistics_turnir_id_index` (`turnir_id`),
  ADD KEY `statistics_user_id_index` (`user_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forecasts`
--
ALTER TABLE `forecasts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `raunds`
--
ALTER TABLE `raunds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `set_pleyers`
--
ALTER TABLE `set_pleyers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `statistics`
--
ALTER TABLE `statistics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stavkas`
--
ALTER TABLE `stavkas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `turnirs`
--
ALTER TABLE `turnirs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `claim_organizators`
--
ALTER TABLE `claim_organizators`
  ADD CONSTRAINT `claim_organizators_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `forecasts`
--
ALTER TABLE `forecasts`
  ADD CONSTRAINT `forecasts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `statistics`
--
ALTER TABLE `statistics`
  ADD CONSTRAINT `statistics_turnir_id_foreign` FOREIGN KEY (`turnir_id`) REFERENCES `turnirs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `statistics_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
