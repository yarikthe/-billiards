-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 10, 2020 at 04:50 PM
-- Server version: 5.7.30
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `Smirnov`
--

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
(1, 'Jeremy Clarkson', 'clarkson@mail.com', '$2y$10$ghi4NL/Vdn4xV5ouIHijqu4/046VS2fZ.8RbHwAWg6If5TmzzyIAO', 'user', 'logo.png', '0990001110', '15765.78', NULL, NULL, '2020-11-10 14:39:28', '2020-11-10 14:39:28'),
(2, 'Richard Hamond', 'hamond@mail.com', '$2y$10$w8JHiayeB/x9kcTw07S3xupW4ASs26BZ2OHdygyvsoC7YYvNlpybm', 'org', 'logo.png', '0991110001', '1902.20', NULL, NULL, '2020-11-10 14:41:21', '2020-11-10 14:41:21'),
(3, 'Jeams May', 'may@mail.com', '$2y$10$IKfWrrEBq4PpvIyWIJcacu9rbiyGlxBmX/uxUqpR3HZW4RSM0H19q', 'admin', 'logo.png', '0090090091', '893020.22', NULL, NULL, '2020-11-10 14:42:27', '2020-11-10 14:42:27'),
(4, '123', '123@123.123', '$2y$10$U5VgQiFnwSDMmWNp8xNKEeRRfpw9Zl1MZ5gnNSeP70J/wnIPe2o2q', 'user', 'logo.png', '', '0.00', NULL, NULL, '2020-11-10 14:49:05', '2020-11-10 14:49:05'),
(5, '123', '123@123.123123', '$2y$10$j/UUmjfjwllw0SRDeKGckOqrUZBLkJ3ptxJmZIjvzhkS2GWz.5hOe', 'user', 'logo.png', '', '0.00', NULL, NULL, '2020-11-10 14:50:13', '2020-11-10 14:50:13');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 10, 2020 at 04:50 PM
-- Server version: 5.7.30
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `Smirnov`
--

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
(1, 'Jeremy Clarkson', 'clarkson@mail.com', '$2y$10$ghi4NL/Vdn4xV5ouIHijqu4/046VS2fZ.8RbHwAWg6If5TmzzyIAO', 'user', 'logo.png', '0990001110', '15765.78', NULL, NULL, '2020-11-10 14:39:28', '2020-11-10 14:39:28'),
(2, 'Richard Hamond', 'hamond@mail.com', '$2y$10$w8JHiayeB/x9kcTw07S3xupW4ASs26BZ2OHdygyvsoC7YYvNlpybm', 'org', 'logo.png', '0991110001', '1902.20', NULL, NULL, '2020-11-10 14:41:21', '2020-11-10 14:41:21'),
(3, 'Jeams May', 'may@mail.com', '$2y$10$IKfWrrEBq4PpvIyWIJcacu9rbiyGlxBmX/uxUqpR3HZW4RSM0H19q', 'admin', 'logo.png', '0090090091', '893020.22', NULL, NULL, '2020-11-10 14:42:27', '2020-11-10 14:42:27'),
(4, '123', '123@123.123', '$2y$10$U5VgQiFnwSDMmWNp8xNKEeRRfpw9Zl1MZ5gnNSeP70J/wnIPe2o2q', 'user', 'logo.png', '', '0.00', NULL, NULL, '2020-11-10 14:49:05', '2020-11-10 14:49:05'),
(5, '123', '123@123.123123', '$2y$10$j/UUmjfjwllw0SRDeKGckOqrUZBLkJ3ptxJmZIjvzhkS2GWz.5hOe', 'user', 'logo.png', '', '0.00', NULL, NULL, '2020-11-10 14:50:13', '2020-11-10 14:50:13');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
