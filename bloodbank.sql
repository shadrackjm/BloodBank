-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2024 at 03:17 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bloodbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `blood_banks`
--

CREATE TABLE `blood_banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blood_banks`
--

INSERT INTO `blood_banks` (`id`, `user_id`, `name`, `address`, `created_at`, `updated_at`) VALUES
(1, 2, 'Manyara national hospital', 'magomeni, DSM', '2024-06-02 04:55:51', '2024-06-09 07:31:11'),
(2, 3, 'St.Monica hospital', 'manzese, DSM', '2024-06-02 05:19:26', '2024-06-02 05:19:26'),
(3, 4, 'Ekenywa Specialized Hospital', 'kagera,Kinondoni, DSM', '2024-06-02 05:25:03', '2024-06-02 05:25:03');

-- --------------------------------------------------------

--
-- Table structure for table `blood_bank_stocks`
--

CREATE TABLE `blood_bank_stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blood_bank_id` bigint(20) UNSIGNED NOT NULL,
  `blood_group_id` bigint(20) UNSIGNED NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blood_bank_stocks`
--

INSERT INTO `blood_bank_stocks` (`id`, `blood_bank_id`, `blood_group_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 100, '2024-06-02 05:05:45', '2024-06-02 05:05:45'),
(2, 2, 3, 100, '2024-06-02 05:22:14', '2024-06-09 08:53:07');

-- --------------------------------------------------------

--
-- Table structure for table `blood_groups`
--

CREATE TABLE `blood_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blood_groups`
--

INSERT INTO `blood_groups` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'A-', '2024-06-02 05:05:18', '2024-06-02 05:05:18'),
(3, 'A+', '2024-06-02 05:05:25', '2024-06-02 05:05:25'),
(4, 'AB', '2024-06-09 07:22:29', '2024-06-09 07:22:29');

-- --------------------------------------------------------

--
-- Table structure for table `blood_requests`
--

CREATE TABLE `blood_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `gender` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `blood_group_id` bigint(20) UNSIGNED NOT NULL,
  `blood_bank_id` bigint(20) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blood_requests`
--

INSERT INTO `blood_requests` (`id`, `Name`, `email`, `gender`, `phone_number`, `age`, `address`, `blood_group_id`, `blood_bank_id`, `amount`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, 'shadrack mballah', 'shadrackmballah40@gmail.com', 'Female', '23421124', '67', 'dfsefefm,klk', 3, 3, 20, 20000, 0, '2024-06-02 06:38:33', '2024-06-02 07:35:39'),
(2, 'shadrack mballah', 'shadrackmballah80@gmail.com', 'Male', '0624748387', '20', 'magomeni', 2, 1, 10, 10000, 1, '2024-06-02 07:40:15', '2024-06-02 07:40:15'),
(3, 'shadrack mballah', 'shadrackmballah4@gmail.com', 'Male', '0624748387', '23', 'magomeni', 2, 2, 10, 10000, 1, '2024-06-09 06:04:47', '2024-06-09 06:05:12');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `donation_date` date DEFAULT NULL,
  `next_donation` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donors`
--

CREATE TABLE `donors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `blood_group_id` bigint(20) UNSIGNED NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `next_donation` date DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donors`
--

INSERT INTO `donors` (`id`, `user_id`, `blood_group_id`, `age`, `gender`, `phone`, `address`, `next_donation`, `status`, `created_at`, `updated_at`) VALUES
(2, 6, 3, 20, 'Female', '0624748387', 'magomeni', NULL, 0, '2024-06-02 08:26:17', '2024-06-02 08:26:17'),
(3, 7, 2, 25, 'Male', '0624748387', 'magomeni', NULL, 0, '2024-06-02 08:27:09', '2024-06-09 07:29:40'),
(4, 8, 2, 45, 'M', '0624748387', 'magomeni', NULL, 0, '2024-06-09 07:04:23', '2024-06-09 07:04:23'),
(5, 9, 3, 45, 'M', '0624748387', 'magomeni', NULL, 0, '2024-06-09 07:05:29', '2024-06-09 07:05:29'),
(6, 10, 2, 45, 'M', '0624748387', 'magomeni', NULL, 0, '2024-06-09 07:07:15', '2024-06-09 07:07:15'),
(7, 11, 4, 45, 'M', '0624748387', 'magomeni', NULL, 0, '2024-06-09 09:10:59', '2024-06-09 09:10:59');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_05_05_105644_create_password_resets_table', 1),
(5, '2024_05_19_100654_create_blood_groups_table', 1),
(6, '2024_05_19_100703_create_donors_table', 1),
(7, '2024_05_19_100713_create_blood_requests_table', 1),
(8, '2024_05_19_100731_create_blood_banks_table', 1),
(9, '2024_05_26_084152_create_blood_bank_stocks_table', 1),
(10, '2024_06_01_081306_create_donations_table', 1),
(11, '2024_06_02_084419_create_blood_requests_table', 2),
(12, '2024_06_02_092513_create_blood_requests_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('foBVbO7kJErL9rR1b9TGKbh1YP6sjs5Cw2V1RXMN', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', 'YTozOntzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyMToiaHR0cDovLzEyNy4wLjAuMTo4MDAwIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo2OiJfdG9rZW4iO3M6NDA6IlpqQWR2Tmt0RUJpZEQ5aEJ1Yk92aTlKR1NWZzNMU2VXUURYT1BxcWEiO30=', 1717936568),
('V3tlZyPwMQGpCs6qXG6ER7Q2rlwTIzTpZVdsP5Uj', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNXQ0Y3d2ZlFDcWFuTUlHeHphUkNFTHlETlJlSjB4WjBFYXBBVU0zWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9ibG9vZC1zdG9jayI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1717933988),
('ywfKafUBGb1pS4wbUvi26qoEcFbE9r6NYYwhSckR', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTTZIdE9KTVQ2WHVQeWJjZmlmNXZtSHFOMkoybERvMHRTYlNEdkZJNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9yZWdpc3RlciI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1717934930);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `image`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'superadmin@gmail.com', '1', NULL, 'public/images/DUyjtAF7Bq8AQZlq7yfkEcwcvNgMU1VrwkIqAs8A.jpg', '$2y$12$7UDNaiKqS.YuAerpUIq7..fkuMCysN5E6Q.Mu4v3.9.klaow4.0ve', '1', NULL, NULL, '2024-06-02 05:22:35'),
(2, 'Manyara national hospital', 'muhimbili@gmail.com', '2', NULL, NULL, '$2y$12$7UDNaiKqS.YuAerpUIq7..fkuMCysN5E6Q.Mu4v3.9.klaow4.0ve', '1', NULL, '2024-03-05 04:55:51', '2024-06-09 07:31:11'),
(3, 'St.Monica hospital', 'stmonica@gmail.com', '2', NULL, 'public/images/JfJTEDKbaV78CY0AvWYFRtZoWjs6mEvoQJi4qJlJ.png', '$2y$12$l5xFJaHRXS9V3/NvZ0GO2eCNe5Tfwy5V3BXzNxWL60.QYe9V6s8MW', '1', NULL, '2024-06-02 05:19:26', '2024-06-02 05:32:43'),
(4, 'Ekenywa Specialized Hospital', 'ekenywa@gmail.com', '2', NULL, NULL, '$2y$12$hGi/kuxr26MdHzi4d.j7Weq2r9QCR61rX6.lkcAPM8CjYV4UGoAha', '1', NULL, '2024-06-02 05:25:03', '2024-06-02 05:25:03'),
(5, 'shadrack mballah', 'shadrackmballah80@gmail.com', '0', NULL, 'public/images/720AAKVEWmYHCUAaZKvNZabLE9YhkoEYEcCVu91v.jpg', '$2y$12$vEXaadfYv8f56l2I9r235OzTWK/8BevKp.ALB1VMsuLOYjwuJFhha', '1', NULL, '2024-06-02 05:27:01', '2024-06-02 08:20:20'),
(6, 'shadrack mballah', 'shadrackmballah87@gmail.com', '0', NULL, NULL, '$2y$12$aAxhU5ULhf8ae8DepmVYAeJxDE8hszGfsCGMCXWtwSw1xdR0ptZEm', '1', NULL, '2024-06-02 08:26:17', '2024-06-02 08:26:17'),
(7, 'macho the don', 'shadrackmballah00@gmail.com', '0', NULL, NULL, '$2y$12$cTbejyAiY7dT8BNFn8DnFudV5VDJPYK2PfgcLAVz2nO.o7R93mxtO', '1', NULL, '2024-06-02 08:27:09', '2024-06-02 08:27:09'),
(8, 'shadrack mballah', 'shadrackmballah@gmail.com', '0', NULL, NULL, '$2y$12$e.Vi42XpVT4VC5o1MVrNYOrLGsJ0Nhp12N0O2IhKESRHrMcEQRw8i', '1', NULL, '2024-06-09 07:04:23', '2024-06-09 07:04:23'),
(9, 'shadrack mballah', 'shadrackmballah8@gmail.com', '0', NULL, NULL, '$2y$12$mA2q.1mrPfX79A6hD4gz2eh9eW7N6fxlBHivBn85mq08EzKF.IAwa', '1', NULL, '2024-06-09 07:05:28', '2024-06-09 07:05:28'),
(10, 'shadrack mballah', 'shadrackmballah50@gmail.com', '0', NULL, NULL, '$2y$12$5aFNkvTfM6pPQMEFBv552.NAVx376P2TEeh7N/y58rZAqZ8hc2hum', '1', NULL, '2024-06-09 07:07:14', '2024-06-09 07:07:14'),
(11, 'shadrack mballah', 'shadrackmballah890@gmail.com', '0', NULL, NULL, '$2y$12$zHdcUXUcBHVAiBB1vll8.OTELduqBLUz07MTdc3L0R1I2XpT9qn0a', '1', NULL, '2024-06-09 09:10:59', '2024-06-09 09:10:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blood_banks`
--
ALTER TABLE `blood_banks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blood_banks_user_id_foreign` (`user_id`);

--
-- Indexes for table `blood_bank_stocks`
--
ALTER TABLE `blood_bank_stocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blood_bank_stocks_blood_bank_id_foreign` (`blood_bank_id`),
  ADD KEY `blood_bank_stocks_blood_group_id_foreign` (`blood_group_id`);

--
-- Indexes for table `blood_groups`
--
ALTER TABLE `blood_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blood_requests`
--
ALTER TABLE `blood_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blood_requests_blood_group_id_foreign` (`blood_group_id`),
  ADD KEY `blood_requests_blood_bank_id_foreign` (`blood_bank_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donations_user_id_foreign` (`user_id`);

--
-- Indexes for table `donors`
--
ALTER TABLE `donors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donors_user_id_foreign` (`user_id`),
  ADD KEY `donors_blood_group_id_foreign` (`blood_group_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `blood_banks`
--
ALTER TABLE `blood_banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blood_bank_stocks`
--
ALTER TABLE `blood_bank_stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blood_groups`
--
ALTER TABLE `blood_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blood_requests`
--
ALTER TABLE `blood_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donors`
--
ALTER TABLE `donors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blood_banks`
--
ALTER TABLE `blood_banks`
  ADD CONSTRAINT `blood_banks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blood_bank_stocks`
--
ALTER TABLE `blood_bank_stocks`
  ADD CONSTRAINT `blood_bank_stocks_blood_bank_id_foreign` FOREIGN KEY (`blood_bank_id`) REFERENCES `blood_banks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blood_bank_stocks_blood_group_id_foreign` FOREIGN KEY (`blood_group_id`) REFERENCES `blood_groups` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blood_requests`
--
ALTER TABLE `blood_requests`
  ADD CONSTRAINT `blood_requests_blood_bank_id_foreign` FOREIGN KEY (`blood_bank_id`) REFERENCES `blood_banks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blood_requests_blood_group_id_foreign` FOREIGN KEY (`blood_group_id`) REFERENCES `blood_groups` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `donations`
--
ALTER TABLE `donations`
  ADD CONSTRAINT `donations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `donors`
--
ALTER TABLE `donors`
  ADD CONSTRAINT `donors_blood_group_id_foreign` FOREIGN KEY (`blood_group_id`) REFERENCES `blood_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `donors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
