-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2021 at 02:31 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `broker`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name_en`, `name_ar`, `code`, `country_id`, `created_at`, `updated_at`, `slug`) VALUES
(1, 'Cairo', 'القاهرة', NULL, 66, NULL, NULL, NULL),
(2, 'Giza', 'الجيزة', NULL, 66, NULL, NULL, NULL),
(3, 'Alexandria', 'الأسكندرية', NULL, 66, NULL, NULL, NULL),
(4, 'Dakahlia', 'الدقهلية', NULL, 66, NULL, NULL, NULL),
(5, 'Red Sea', 'البحر الأحمر', NULL, 66, NULL, NULL, NULL),
(6, 'Beheira', 'البحيرة', NULL, 66, NULL, NULL, NULL),
(7, 'Fayoum', 'الفيوم', NULL, 66, NULL, NULL, NULL),
(8, 'Gharbiya', 'الغربية', NULL, 66, NULL, NULL, NULL),
(9, 'Ismailia', 'الإسماعلية', NULL, 66, NULL, NULL, NULL),
(10, 'Menofia', 'المنوفية', NULL, 66, NULL, NULL, NULL),
(11, 'Minya', 'المنيا', NULL, 66, NULL, NULL, NULL),
(12, 'Qaliubiya', 'القليوبية', NULL, 66, NULL, NULL, NULL),
(13, 'New Valley', 'الوادي الجديد', NULL, 66, NULL, NULL, NULL),
(14, 'Suez', 'السويس', NULL, 66, NULL, NULL, NULL),
(15, 'Aswan', 'اسوان', NULL, 66, NULL, NULL, NULL),
(16, 'Asyut', 'اسيوط', NULL, 66, NULL, '2021-06-21 16:44:00', NULL),
(17, 'Bani Suwayf', 'بني سويف', NULL, 66, NULL, '2021-06-21 16:45:54', NULL),
(18, 'Port Said', 'بورسعيد', NULL, 66, NULL, NULL, NULL),
(19, 'Dumyat', 'دمياط', NULL, 66, NULL, '2021-06-21 16:47:40', NULL),
(20, 'Sharkia', 'الشرقية', NULL, 66, NULL, NULL, NULL),
(21, 'South Sinai', 'جنوب سيناء', NULL, 66, NULL, NULL, NULL),
(22, 'Kafr Al sheikh', 'كفر الشيخ', NULL, 66, NULL, NULL, NULL),
(23, 'Matruh', 'مطروح', NULL, 66, NULL, '2021-06-21 16:49:46', NULL),
(24, 'Luxor', 'الأقصر', NULL, 66, NULL, NULL, NULL),
(25, 'Qena', 'قنا', NULL, 66, NULL, NULL, NULL),
(26, 'North Sinai', 'شمال سيناء', NULL, 66, NULL, NULL, NULL),
(27, 'Sohag', 'سوهاج', NULL, 66, NULL, NULL, NULL),
(30, 'test', 'test', NULL, 1, '2021-05-20 10:10:06', '2021-05-20 10:10:06', NULL),
(32, 'Abu Dhabi', 'أبو ظبي', NULL, 234, '2021-06-21 16:42:42', '2021-06-21 16:42:42', NULL),
(33, 'Ajman', 'عجمان', NULL, 234, '2021-06-21 16:43:20', '2021-06-21 16:43:20', NULL),
(34, 'Dubai', 'دبي', NULL, 234, '2021-06-21 16:44:31', '2021-06-21 16:44:31', NULL),
(36, 'Sharjah', 'الشارقه', NULL, 234, '2021-06-21 16:45:32', '2021-06-21 16:45:32', NULL),
(40, 'Fujairah', 'الفوجيره', NULL, 234, '2021-06-21 16:51:14', '2021-06-21 16:51:14', NULL),
(41, 'Ras Al Khaimah', 'رأس الخيمه', NULL, 234, '2021-06-21 16:55:13', '2021-06-21 16:55:13', NULL),
(42, 'Umm Al Quwain', 'أم القيوان', NULL, 234, '2021-06-21 16:56:05', '2021-06-21 16:56:05', NULL),
(43, 'Al Ain', 'العين', NULL, 234, '2021-06-21 16:56:49', '2021-06-21 16:56:49', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_country_id_foreign` (`country_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
