-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 17 ное 2019 в 13:29
-- Версия на сървъра: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travel`
--

-- --------------------------------------------------------

--
-- Структура на таблица `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Схема на данните от таблица `cities`
--

INSERT INTO `cities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Brest', '2019-11-04 11:10:23', '2019-11-04 11:10:23'),
(2, 'Caen', '2019-11-04 11:10:38', '2019-11-04 11:10:38'),
(3, 'Lille', '2019-11-04 11:10:46', '2019-11-04 11:10:46'),
(4, 'Paris', '2019-11-04 11:11:23', '2019-11-04 11:11:39'),
(5, 'Strasbourg', '2019-11-04 11:11:52', '2019-11-04 11:11:52'),
(6, 'Orleans', '2019-11-04 11:12:04', '2019-11-04 11:12:04'),
(7, 'Bordeaux', '2019-11-04 11:12:15', '2019-11-04 11:12:15'),
(8, 'Toulouse', '2019-11-04 11:12:23', '2019-11-04 11:12:23'),
(9, 'Marseille', '2019-11-04 11:12:32', '2019-11-04 11:12:32'),
(10, 'Nice', '2019-11-04 11:12:41', '2019-11-04 11:12:41'),
(11, 'Lyon', '2019-11-04 11:12:51', '2019-11-04 11:12:51');

-- --------------------------------------------------------

--
-- Структура на таблица `failed_jobs`
--

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
-- Структура на таблица `gas_stations`
--

CREATE TABLE `gas_stations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `road_id` bigint(20) UNSIGNED DEFAULT NULL,
  `distance_to_the_city` int(11) DEFAULT NULL,
  `diesel_price` decimal(4,2) DEFAULT NULL,
  `gasoline_price` decimal(4,2) DEFAULT NULL,
  `gas_price` decimal(4,2) DEFAULT NULL,
  `electricity_price` decimal(4,2) DEFAULT NULL,
  `metan_price` decimal(4,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Схема на данните от таблица `gas_stations`
--

INSERT INTO `gas_stations` (`id`, `name`, `city_id`, `road_id`, `distance_to_the_city`, `diesel_price`, `gasoline_price`, `gas_price`, `electricity_price`, `metan_price`, `created_at`, `updated_at`) VALUES
(1, 'OMV', 2, NULL, NULL, '1.00', '1.00', '1.00', '1.00', '1.00', '2019-11-04 11:20:13', '2019-11-04 11:20:13'),
(2, 'OMV', 2, 2, 10, '2.00', '2.00', '2.00', '2.00', '2.00', '2019-11-04 11:21:01', '2019-11-04 11:21:01'),
(3, 'Petrol', 5, NULL, NULL, '3.00', '3.00', '3.00', '3.00', '3.00', '2019-11-04 11:21:24', '2019-11-04 11:21:24'),
(4, 'Rom Petrol', 6, NULL, NULL, '4.00', '4.00', '4.00', '4.00', '4.00', '2019-11-04 11:21:46', '2019-11-04 11:21:46'),
(5, 'OMV', 6, 6, 10, '5.00', '5.00', '5.00', '5.00', '5.00', '2019-11-04 11:22:19', '2019-11-04 11:22:19'),
(6, 'Rom Petrol', 11, NULL, NULL, '6.00', '6.00', '6.00', '6.00', '6.00', '2019-11-04 11:22:51', '2019-11-04 11:22:51'),
(7, 'OMV', 7, NULL, NULL, '7.00', '7.00', '7.00', '7.00', '7.00', '2019-11-04 11:23:12', '2019-11-04 11:23:12'),
(8, 'Petrol', 8, 10, 10, '8.00', '8.00', '8.00', '8.00', '8.00', '2019-11-04 11:24:27', '2019-11-04 11:24:27'),
(9, 'Petrol', 10, 12, 10, '9.00', '9.00', '9.00', '9.00', '9.00', '2019-11-04 11:25:10', '2019-11-04 11:25:10');

-- --------------------------------------------------------

--
-- Структура на таблица `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Схема на данните от таблица `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_10_13_091519_create_road_types_table', 1),
(5, '2019_10_14_090017_create_cities_table', 1),
(6, '2019_10_15_103823_create_roads_table', 1),
(7, '2019_10_16_103920_create_gas_stations_table', 1);

-- --------------------------------------------------------

--
-- Структура на таблица `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура на таблица `roads`
--

CREATE TABLE `roads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city_x_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_y_id` bigint(20) UNSIGNED DEFAULT NULL,
  `road_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `speed_limit` int(11) NOT NULL,
  `distance_km` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Схема на данните от таблица `roads`
--

INSERT INTO `roads` (`id`, `city_x_id`, `city_y_id`, `road_type_id`, `speed_limit`, `distance_km`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 3, 50, 100, '2019-11-04 11:13:36', '2019-11-04 16:25:41'),
(2, 2, 3, 2, 90, 120, '2019-11-04 11:13:58', '2019-11-04 16:19:38'),
(3, 2, 4, 1, 90, 90, '2019-11-04 11:14:34', '2019-11-04 11:14:34'),
(4, 3, 5, 1, 90, 140, '2019-11-04 11:15:02', '2019-11-04 11:15:02'),
(5, 5, 11, 1, 90, 150, '2019-11-04 11:15:27', '2019-11-04 11:15:27'),
(6, 6, 11, 1, 90, 120, '2019-11-04 11:16:08', '2019-11-04 11:16:08'),
(7, 1, 6, 1, 90, 150, '2019-11-04 11:16:40', '2019-11-04 11:16:40'),
(8, 6, 7, 1, 90, 120, '2019-11-04 11:17:02', '2019-11-04 11:17:02'),
(9, 7, 8, 1, 90, 80, '2019-11-04 11:17:38', '2019-11-04 11:17:38'),
(10, 8, 9, 1, 90, 90, '2019-11-04 11:17:56', '2019-11-04 11:17:56'),
(11, 9, 10, 1, 90, 70, '2019-11-04 11:18:18', '2019-11-04 11:18:18'),
(12, 10, 11, 1, 90, 100, '2019-11-04 11:18:43', '2019-11-04 11:18:43'),
(13, 11, 9, 1, 90, 60, '2019-11-04 11:19:05', '2019-11-04 11:19:05'),
(14, 4, 6, 1, 90, 80, '2019-11-04 11:19:41', '2019-11-04 11:19:41');

-- --------------------------------------------------------

--
-- Структура на таблица `road_types`
--

CREATE TABLE `road_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delay_factor` decimal(4,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Схема на данните от таблица `road_types`
--

INSERT INTO `road_types` (`id`, `type`, `delay_factor`, `created_at`, `updated_at`) VALUES
(1, 'Highway', '1.00', '2019-11-04 11:09:52', '2019-11-04 11:09:52'),
(2, 'Village', '1.10', '2019-11-04 11:09:59', '2019-11-04 11:09:59'),
(3, 'hell', '0.50', '2019-11-04 16:25:15', '2019-11-04 16:25:15');

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'plain',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Kiril', 'admin', 'kiksandj@abv.bg', NULL, '$2y$10$cGpWIGUxfa4k.ybIqeNrCufxjhI1KcbCJZiKIoHEkkaM0Sc0RSFQq', NULL, '2019-11-04 11:09:11', '2019-11-04 11:09:11'),
(2, 'Maria', 'plain', 'kiksanj@abv.bg', NULL, '$2y$10$x9x64rzq135FVLnqk./UseK3NqHNPo5dl0ut2n36D577AH351LBe6', NULL, '2019-11-04 16:13:32', '2019-11-04 16:13:32'),
(3, 'Martin', 'admin', 'martin8georgiev@abv.bg', NULL, '$2y$10$GYEG7JOrMkdjJ40jm6iFQuMzrEPTOp/98BhH4qnW8pUmrcdRQ8YHG', NULL, '2019-11-17 09:17:35', '2019-11-17 09:17:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gas_stations`
--
ALTER TABLE `gas_stations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gas_stations_city_id_foreign` (`city_id`),
  ADD KEY `gas_stations_road_id_foreign` (`road_id`);

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
-- Indexes for table `roads`
--
ALTER TABLE `roads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roads_city_x_id_foreign` (`city_x_id`),
  ADD KEY `roads_city_y_id_foreign` (`city_y_id`),
  ADD KEY `roads_road_type_id_foreign` (`road_type_id`);

--
-- Indexes for table `road_types`
--
ALTER TABLE `road_types`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gas_stations`
--
ALTER TABLE `gas_stations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roads`
--
ALTER TABLE `roads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `road_types`
--
ALTER TABLE `road_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения за дъмпнати таблици
--

--
-- Ограничения за таблица `gas_stations`
--
ALTER TABLE `gas_stations`
  ADD CONSTRAINT `gas_stations_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `gas_stations_road_id_foreign` FOREIGN KEY (`road_id`) REFERENCES `roads` (`id`);

--
-- Ограничения за таблица `roads`
--
ALTER TABLE `roads`
  ADD CONSTRAINT `roads_city_x_id_foreign` FOREIGN KEY (`city_x_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `roads_city_y_id_foreign` FOREIGN KEY (`city_y_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `roads_road_type_id_foreign` FOREIGN KEY (`road_type_id`) REFERENCES `road_types` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
