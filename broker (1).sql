-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
<<<<<<< HEAD:broker.sql
-- Generation Time: Apr 21, 2021 at 11:51 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16
=======
-- Generation Time: May 04, 2021 at 07:37 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15
>>>>>>> 09ec62e9a57ce91a1d5b57895f83fa97513c9a2e:broker (1).sql

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
-- Table structure for table `agencies`
--

CREATE TABLE `agencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_en` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_ar` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cell_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cell` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax_country_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax_city_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_fax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trade_license` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_orn` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `owner_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agencies`
--

INSERT INTO `agencies` (`id`, `company_name_en`, `company_name_ar`, `company_email`, `description_en`, `description_ar`, `country_code`, `city_code`, `phone`, `cell_code`, `cell`, `website`, `fax_country_code`, `fax_city_code`, `company_fax`, `address`, `trade_license`, `image`, `company_orn`, `country_id`, `city_id`, `owner_id`, `deleted_at`, `created_at`, `updated_at`, `business_id`) VALUES
(1, 'otg', 'otg', 'otg@onetecgroup.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2021-03-07 13:30:03', '2021-03-07 13:30:03', 1),
(2, 'pcasa', 'pcasa', 'pcasa@onetecgroup.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2021-03-07 13:30:03', '2021-03-07 13:30:03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `agency_portals`
--

CREATE TABLE `agency_portals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `last_run` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('on','off') COLLATE utf8mb4_unicode_ci DEFAULT 'on',
  `agency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `template_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agency_settings`
--

CREATE TABLE `agency_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quick_show_number_of_bedrooms` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT 'yes',
  `quick_show_number_of_parkings` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT 'yes',
  `quick_show_number_of_photos` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT 'yes',
  `quick_show_number_of_videos` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT 'yes',
  `listings_landlord_should_be_mandatory` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT 'yes',
  `listings_source_should_be_mandatory` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT 'yes',
  `listings_reference_should_contain_staff_initial` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT 'no',
  `listings_show_building_name` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT 'no',
  `leads_can_assign_multiple_agents` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT 'no',
  `leads_source_should_be_mandatory` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT 'no',
  `leads_contacts_should_be_mandatory` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT 'no',
  `leads_area_min_should_be_mandatory` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT 'no',
  `leads_budget_max_should_be_mandatory` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT 'no',
  `contacts_per_page` enum('20','50','100') COLLATE utf8mb4_unicode_ci DEFAULT '20',
  `company_profile_primary_number_should_be_mandatory` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT 'no',
  `lsm_overall_status` enum('activated','deactivated') COLLATE utf8mb4_unicode_ci DEFAULT 'activated',
  `lsm_share_status` enum('private','shared') COLLATE utf8mb4_unicode_ci DEFAULT 'private',
  `lsm_listings_per_page` enum('20','50','100') COLLATE utf8mb4_unicode_ci DEFAULT '20',
  `agency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bank_images`
--

CREATE TABLE `bank_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dir` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `businesses`
--

CREATE TABLE `businesses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `businesses`
--

INSERT INTO `businesses` (`id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, NULL, '2021-03-07 13:30:03', '2021-03-07 13:30:03');

-- --------------------------------------------------------

--
-- Table structure for table `calls`
--

CREATE TABLE `calls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contact_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `next_action_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `next_action_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `made_by` bigint(20) UNSIGNED DEFAULT NULL,
  `module` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `module_id` bigint(20) DEFAULT NULL,
  `agency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

<<<<<<< HEAD:broker.sql
=======
--
-- Dumping data for table `calls`
--

INSERT INTO `calls` (`id`, `contact_date`, `contact_time`, `next_action_date`, `next_action_time`, `note`, `made_by`, `module`, `module_id`, `agency_id`, `business_id`, `created_at`, `updated_at`, `status_id`) VALUES
(1, '2021-04-14', '05:40', NULL, NULL, 'deeeee', 1, 'opportunity', 2, 1, 1, '2021-04-14 15:44:55', '2021-04-14 15:44:55', 1);

>>>>>>> 09ec62e9a57ce91a1d5b57895f83fa97513c9a2e:broker (1).sql
-- --------------------------------------------------------

--
-- Table structure for table `call_status`
--

CREATE TABLE `call_status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name_en`, `name_ar`, `country_id`, `created_at`, `updated_at`) VALUES
(1, 'Cairo', 'القاهرة', 66, NULL, NULL),
(2, 'Giza', 'الجيزة', 66, NULL, NULL),
(3, 'Alexandria', 'الأسكندرية', 66, NULL, NULL),
(4, 'Dakahlia', 'الدقهلية', 66, NULL, NULL),
(5, 'Red Sea', 'البحر الأحمر', 66, NULL, NULL),
(6, 'Beheira', 'البحيرة', 66, NULL, NULL),
(7, 'Fayoum', 'الفيوم', 66, NULL, NULL),
(8, 'Gharbiya', 'الغربية', 66, NULL, NULL),
(9, 'Ismailia', 'الإسماعلية', 66, NULL, NULL),
(10, 'Menofia', 'المنوفية', 66, NULL, NULL),
(11, 'Minya', 'المنيا', 66, NULL, NULL),
(12, 'Qaliubiya', 'القليوبية', 66, NULL, NULL),
(13, 'New Valley', 'الوادي الجديد', 66, NULL, NULL),
(14, 'Suez', 'السويس', 66, NULL, NULL),
(15, 'Aswan', 'اسوان', 66, NULL, NULL),
(16, 'Assiut', 'اسيوط', 66, NULL, NULL),
(17, 'Beni Suef', 'بني سويف', 66, NULL, NULL),
(18, 'Port Said', 'بورسعيد', 66, NULL, NULL),
(19, 'Damietta', 'دمياط', 66, NULL, NULL),
(20, 'Sharkia', 'الشرقية', 66, NULL, NULL),
(21, 'South Sinai', 'جنوب سيناء', 66, NULL, NULL),
(22, 'Kafr Al sheikh', 'كفر الشيخ', 66, NULL, NULL),
(23, 'Matrouh', 'مطروح', 66, NULL, NULL),
(24, 'Luxor', 'الأقصر', 66, NULL, NULL),
(25, 'Qena', 'قنا', 66, NULL, NULL),
(26, 'North Sinai', 'شمال سيناء', 66, NULL, NULL),
(27, 'Sohag', 'سوهاج', 66, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED DEFAULT NULL,
  `converted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `salutation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `source_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `communication_id` bigint(20) UNSIGNED DEFAULT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `po_box` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_expiration_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `partner_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality_id` bigint(20) UNSIGNED DEFAULT NULL,
  `phone1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `landline` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `developer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `community` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `building_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_purpose` enum('rent','buy') COLLATE utf8mb4_unicode_ci DEFAULT 'rent',
  `property_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_id` bigint(20) UNSIGNED DEFAULT NULL,
  `size_sqft` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size_sqm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bedrooms` int(11) DEFAULT NULL,
  `bathrooms` int(11) DEFAULT NULL,
  `parkings` int(11) DEFAULT NULL,
  `skype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `converted_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('pending','accepted') COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `national_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `was_lead` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

<<<<<<< HEAD:broker.sql
=======
--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `note`, `agency_id`, `business_id`, `converted_by`, `salutation`, `source_id`, `type_id`, `communication_id`, `company`, `website`, `po_box`, `passport`, `passport_expiration_date`, `name`, `partner_name`, `date_of_birth`, `email1`, `email2`, `nationality_id`, `phone1`, `phone2`, `landline`, `fax`, `developer`, `community`, `building_name`, `property_purpose`, `property_no`, `property_reference`, `property_id`, `size_sqft`, `size_sqm`, `bedrooms`, `bathrooms`, `parkings`, `skype`, `twitter`, `facebook`, `linkedin`, `country`, `currency`, `language`, `longitude`, `latitude`, `address`, `other`, `city`, `converted_from`, `status`, `created_at`, `updated_at`, `national_id`, `was_lead`) VALUES
(6, NULL, 1, 1, 1, 'Mr', 1, 3, 1, NULL, NULL, NULL, NULL, NULL, 'mohamed hamed', NULL, '2021-04-10', 'mohamed@gmail.com', NULL, NULL, '+6622962000', NULL, NULL, NULL, NULL, NULL, NULL, 'rent', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Egypt', 'EGP', 'ar', NULL, NULL, NULL, NULL, NULL, '1', 'accepted', '2021-04-10 14:59:07', '2021-04-10 16:20:31', '165465465465', NULL),
(8, NULL, 1, 1, 1, 'Mr', NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'tenant test', NULL, NULL, 'tenant@gmail.com', NULL, NULL, '125656656565', NULL, NULL, NULL, NULL, NULL, NULL, 'rent', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2021-04-26 00:55:52', '2021-04-26 00:55:52', NULL, 'no'),
(9, NULL, 1, 1, 1, 'Mr', NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'tenant test', NULL, NULL, 'tenant@gmail.com', NULL, NULL, '125656656565', NULL, NULL, NULL, NULL, NULL, NULL, 'rent', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2021-04-26 00:57:02', '2021-04-26 00:57:02', NULL, 'no'),
(10, NULL, 1, 1, 1, 'Mr', NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'tenant test', NULL, NULL, 'tenant@gmail.com', NULL, NULL, '125656656565', NULL, NULL, NULL, NULL, NULL, NULL, 'rent', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2021-04-26 00:58:17', '2021-04-26 00:58:17', NULL, 'no'),
(11, NULL, 1, 1, 1, 'Mr', NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'mohamed hamed', NULL, NULL, 'mohamed@gmail.com', NULL, NULL, '027628337', NULL, NULL, NULL, NULL, NULL, NULL, 'rent', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2021-04-26 01:08:57', '2021-04-26 01:08:57', NULL, 'no'),
(12, NULL, 1, 1, 1, 'Mr', NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, 'landlord test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rent', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2021-04-26 01:20:44', '2021-04-26 01:20:44', NULL, 'no');

>>>>>>> 09ec62e9a57ce91a1d5b57895f83fa97513c9a2e:broker (1).sql
-- --------------------------------------------------------

--
-- Table structure for table `client_contracts`
--

CREATE TABLE `client_contracts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED DEFAULT NULL,
  `converted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('pending','accepted') COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `contract_type` enum('rent','buy') COLLATE utf8mb4_unicode_ci DEFAULT 'rent',
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_national_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `landlord_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `landlord_national_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `landlord_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `has_recurring` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT 'no',
  `recurring_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `client_questions`
--

CREATE TABLE `client_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answered` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `agency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `added_by` bigint(20) UNSIGNED DEFAULT NULL,
  `answered_by` bigint(20) UNSIGNED DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts_mail_list`
--

CREATE TABLE `contacts_mail_list` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mail_list_id` bigint(20) UNSIGNED DEFAULT NULL,
  `contact_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contract_document`
--

CREATE TABLE `contract_document` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contract_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED DEFAULT NULL,
  `document` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `extension` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contract_recurring`
--

CREATE TABLE `contract_recurring` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contract_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payed` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT 'no',
  `agency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `iso2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iso3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `un_member` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `calling_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cctld` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_zone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `iso2`, `value`, `long_name`, `iso3`, `numcode`, `un_member`, `calling_code`, `cctld`, `nationality`, `flag`, `phone_code`, `time_zone`, `created_at`, `updated_at`) VALUES
(1, 'AF', 'Afghanistan', 'Islamic Republic of Afghanistan', 'AFG', '004', 'yes', '93', '.af', 'Afghan', 'afghanistan.png', '+93', 'Asia/Kabul', NULL, NULL),
(2, 'AX', 'Aland Islands', '&Aring;land Islands', 'ALA', '248', 'no', '358', '.ax', 'Finland', 'alan_islands.jpg', '+358', 'Europe/Mariehamn', NULL, NULL),
(3, 'AL', 'Albania', 'Republic of Albania', 'ALB', '008', 'yes', '355', '.al', 'Albanian', 'albania.png', '+355', 'Europe/Tirane', NULL, NULL),
(4, 'DZ', 'Algeria', 'People\'s Democratic Republic of Algeria', 'DZA', '012', 'yes', '213', '.dz', 'Algerian', 'algeria.png', '+213', 'Asia/Kabul', NULL, NULL),
(5, 'AS', 'American Samoa', 'American Samoa', 'ASM', '016', 'no', '1+684', '.as', 'American', 'united-states-of-america.png', '+1-684', 'Pacific/Pago_Pago', NULL, NULL),
(6, 'AD', 'Andorra', 'Principality of Andorra', 'AND', '020', 'yes', '376', '.ad', 'Andorran', 'andorra.png', '+376', 'Europe/Andorra', NULL, NULL),
(7, 'AO', 'Angola', 'Republic of Angola', 'AGO', '024', 'yes', '244', '.ao', 'Angolan', 'angola.png', '+244', 'Africa/Luanda', NULL, NULL),
(8, 'AI', 'Anguilla', 'Anguilla', 'AIA', '660', 'no', '1+264', '.ai', 'American', 'anguilla.png', '+1-264', '	America/Anguilla', NULL, NULL),
(9, 'AQ', 'Antarctica', 'Antarctica', 'ATA', '010', 'no', '672', '.aq', 'Antarctician', 'unknown.png', '+672', 'Antarctica/Casey', NULL, NULL),
(10, 'AG', 'Antigua and Barbuda', 'Antigua and Barbuda', 'ATG', '028', 'yes', '1+268', '.ag', 'American', 'unknown.png', '+1-268', 'America/Antigua', NULL, NULL),
(11, 'AR', 'Argentina', 'Argentine Republic', 'ARG', '032', 'yes', '54', '.ar', 'Argentinian', 'argentina.png', '+54', 'America/Argentina/Buenos_Aires', NULL, NULL),
(12, 'AM', 'Armenia', 'Republic of Armenia', 'ARM', '051', 'yes', '374', '.am', 'Armenia', 'armenia.png', '+374', 'Asia/Yerevan', NULL, NULL),
(13, 'AW', 'Aruba', 'Aruba', 'ABW', '533', 'no', '297', '.aw', 'Dutch Caribbean', 'aruba.png', '+297', 'America/Aruba', NULL, NULL),
(14, 'AU', 'Australia', 'Commonwealth of Australia', 'AUS', '036', 'yes', '61', '.au', 'Australian', 'australia.png', '+61', 'Australia/Sydney', NULL, NULL),
(15, 'AT', 'Austria', 'Republic of Austria', 'AUT', '040', 'yes', '43', '.at', 'Austrian', 'austria.png', '+43', 'Europe/Vienna', NULL, NULL),
(16, 'AZ', 'Azerbaijan', 'Republic of Azerbaijan', 'AZE', '031', 'yes', '994', '.az', 'Azerbaijani', 'azerbaijan.png', '+994', 'Asia/Baku', NULL, NULL),
(17, 'BS', 'Bahamas', 'Commonwealth of The Bahamas', 'BHS', '044', 'yes', '1+242', '.bs', 'Bahamian', 'bahamas.png', '+1-242', 'America/Nassau', NULL, NULL),
(18, 'BH', 'Bahrain', 'Kingdom of Bahrain', 'BHR', '048', 'yes', '973', '.bh', 'Bahraini', 'bahrain.png', '+973', 'Asia/Bahrain', NULL, NULL),
(19, 'BD', 'Bangladesh', 'People\'s Republic of Bangladesh', 'BGD', '050', 'yes', '880', '.bd', 'Bangladeshi', 'bangladesh.png', '+880', 'Asia/Dhaka', NULL, NULL),
(20, 'BB', 'Barbados', 'Barbados', 'BRB', '052', 'yes', '1+246', '.bb', 'Barbadian', 'barbados.png', '+1-246', 'America/Barbados', NULL, NULL),
(21, 'BY', 'Belarus', 'Republic of Belarus', 'BLR', '112', 'yes', '375', '.by', 'Belorussian', 'belarus.png', '+375', 'Europe/Minsk', NULL, NULL),
(22, 'BE', 'Belgium', 'Kingdom of Belgium', 'BEL', '056', 'yes', '32', '.be', 'Belgian', 'belgium.png', '+32', 'Europe/Brussels', NULL, NULL),
(23, 'BZ', 'Belize', 'Belize', 'BLZ', '084', 'yes', '501', '.bz', 'Belizean', 'belize.png', '+501', 'America/Belize', NULL, NULL),
(24, 'BJ', 'Benin', 'Republic of Benin', 'BEN', '204', 'yes', '229', '.bj', 'Beninese', 'benin.png', '+229', 'Africa/Porto-Novo', NULL, NULL),
(25, 'BM', 'Bermuda', 'Bermuda Islands', 'BMU', '060', 'no', '1+441', '.bm', 'Bermudian', 'bermuda.png', '+1-441', 'Atlantic/Bermuda', NULL, NULL),
(26, 'BT', 'Bhutan', 'Kingdom of Bhutan', 'BTN', '064', 'yes', '975', '.bt', 'Bhutanese', 'bhutan.png', '+975', 'Asia/Thimphu', NULL, NULL),
(27, 'BO', 'Bolivia', 'Plurinational State of Bolivia', 'BOL', '068', 'yes', '591', '.bo', 'Bolivian', 'bolivia.png', '+591', 'America/La_Paz', NULL, NULL),
(28, 'BQ', 'Bonaire, Sint Eustatius and Saba', 'Bonaire, Sint Eustatius and Saba', 'BES', '535', 'no', '599', '.bq', 'Dutch', 'unknown.png', '+599', 'America/Kralendijk', NULL, NULL),
(29, 'BA', 'Bosnia and Herzegovina', 'Bosnia and Herzegovina', 'BIH', '070', 'yes', '387', '.ba', 'Bosnian', 'bosnia-and-herzegovina.png', '+387', 'Europe/Sarajevo', NULL, NULL),
(30, 'BW', 'Botswana', 'Republic of Botswana', 'BWA', '072', 'yes', '267', '.bw', 'Batswanain', 'botswana.png', '+267', 'Africa/Gaborone', NULL, NULL),
(31, 'BV', 'Bouvet Island', 'Bouvet Island', 'BVT', '074', 'no', NULL, '.bv', 'Norwegian', 'unknown.png', NULL, 'UNKNOWN', NULL, NULL),
(32, 'BR', 'Brazil', 'Federative Republic of Brazil', 'BRA', '076', 'yes', '55', '.br', 'Brazilian', 'brazil.png', '+55', 'America/Araguaina', NULL, NULL),
(33, 'IO', 'British Indian Ocean Territory', 'British Indian Ocean Territory', 'IOT', '086', 'no', '246', '.io', 'British', 'unknown.png', '+246', 'Indian/Chagos', NULL, NULL),
(34, 'BN', 'Brunei', 'Brunei Darussalam', 'BRN', '096', 'yes', '673', '.bn', 'Bruneian', 'brunei.png', '+673', 'Asia/Brunei', NULL, NULL),
(35, 'BG', 'Bulgaria', 'Republic of Bulgaria', 'BGR', '100', 'yes', '359', '.bg', 'Bulgarian', 'bulgaria.png', '+359', 'Europe/Sofia', NULL, NULL),
(36, 'BF', 'Burkina Faso', 'Burkina Faso', 'BFA', '854', 'yes', '226', '.bf', 'Burkinabe', 'burkina-faso.png', '+226', 'Africa/Ouagadougou', NULL, NULL),
(37, 'BI', 'Burundi', 'Republic of Burundi', 'BDI', '108', 'yes', '257', '.bi', 'Burundian', 'burundi.png', '+257', 'Africa/Bujumbura', NULL, NULL),
(38, 'KH', 'Cambodia', 'Kingdom of Cambodia', 'KHM', '116', 'yes', '855', '.kh', 'Cambodian', 'cambodia.png', '+855', 'Asia/Phnom_Penh', NULL, NULL),
(39, 'CM', 'Cameroon', 'Republic of Cameroon', 'CMR', '120', 'yes', '237', '.cm', 'Cameroonian', 'cameroon.png', '+237', 'Africa/Douala', NULL, NULL),
(40, 'CA', 'Canada', 'Canada', 'CAN', '124', 'yes', '1', '.ca', 'Canadian', 'canada.png', '+1', 'America/Atikokan', NULL, NULL),
(41, 'CV', 'Cape Verde', 'Republic of Cape Verde', 'CPV', '132', 'yes', '238', '.cv', 'unknown', 'cape-verde.png', '+238', 'Atlantic/Cape_Verde', NULL, NULL),
(42, 'KY', 'Cayman Islands', 'The Cayman Islands', 'CYM', '136', 'no', '1+345', '.ky', 'UNKNOWN', 'unknown.png', '+1-345', 'America/Cayman', NULL, NULL),
(43, 'CF', 'Central African Republic', 'Central African Republic', 'CAF', '140', 'yes', '236', '.cf', 'unknown', 'central-african-republic.png', '+236', 'Africa/Bangui', NULL, NULL),
(44, 'TD', 'Chad', 'Republic of Chad', 'TCD', '148', 'yes', '235', '.td', 'Chadian', 'chad.png', '+235', 'Africa/Ndjamena', NULL, NULL),
(45, 'CL', 'Chile', 'Republic of Chile', 'CHL', '152', 'yes', '56', '.cl', 'Cameroonian', 'chile.png', '+56', 'America/Santiago', NULL, NULL),
(46, 'CN', 'China', 'People\'s Republic of China', 'CHN', '156', 'yes', '86', '.cn', 'Chinese', 'china.png', '+86', 'Asia/Shanghai', NULL, NULL),
(47, 'CX', 'Christmas Island', 'Christmas Island', 'CXR', '162', 'no', '61', '.cx', 'Australian', 'unknown.png', '+61', 'Indian/Christmas', NULL, NULL),
(48, 'CC', 'Cocos (Keeling) Islands', 'Cocos (Keeling) Islands', 'CCK', '166', 'no', '61', '.cc', 'UNKNOWN', 'cocos-island.png', '+61', 'Indian/Cocos', NULL, NULL),
(49, 'CO', 'Colombia', 'Republic of Colombia', 'COL', '170', 'yes', '57', '.co', 'Colombian', 'colombia.png', '+57', 'America/Bogota', NULL, NULL),
(50, 'KM', 'Comoros', 'Union of the Comoros', 'COM', '174', 'yes', '269', '.km', 'Comorian', 'comoros.png', '+269', 'Indian/Comoro', NULL, NULL),
(51, 'CG', 'Congo', 'Republic of the Congo', 'COG', '178', 'yes', '242', '.cg', 'Congolese', 'republic-of-the-congo.png', '+242', 'Africa/Kinshasa', NULL, NULL),
(52, 'CK', 'Cook Islands', 'Cook Islands', 'COK', '184', 'some', '682', '.ck', 'unknown', 'cook-islands.png', '+682', 'Pacific/Rarotonga', NULL, NULL),
(53, 'CR', 'Costa Rica', 'Republic of Costa Rica', 'CRI', '188', 'yes', '506', '.cr', 'Costarricenses', 'unknown.png', '+506', 'America/Costa_Rica', NULL, NULL),
(54, 'CI', 'Cote d\'ivoire (Ivory Coast)', 'Republic of C&ocirc;te D\'Ivoire (Ivory Coast)', 'CIV', '384', 'yes', '225', '.ci', 'Ivoirian', 'ivory-coast.png', '+225', 'Africa/Abidjan', NULL, NULL),
(55, 'HR', 'Croatia', 'Republic of Croatia', 'HRV', '191', 'yes', '385', '.hr', 'Croatian', 'croatia.png', '+385', 'Europe/Zagreb', NULL, NULL),
(56, 'CU', 'Cuba', 'Republic of Cuba', 'CUB', '192', 'yes', '53', '.cu', 'Cuban', 'cuba.png', '+53', 'America/Havana', NULL, NULL),
(57, 'CW', 'Curacao', 'Cura&ccedil;ao', 'CUW', '531', 'no', '599', '.cw', 'Dutch', 'curacao.png', '+599', 'America/Curacao', NULL, NULL),
(58, 'CY', 'Cyprus', 'Republic of Cyprus', 'CYP', '196', 'yes', '357', '.cy', 'Cypriot', 'cyprus.png', '+357', 'Asia/Famagusta', NULL, NULL),
(59, 'CZ', 'Czech Republic', 'Czech Republic', 'CZE', '203', 'yes', '420', '.cz', 'unknown', 'czech-republic.png', '+420', 'Europe/Prague', NULL, NULL),
(60, 'CD', 'Democratic Republic of the Congo', 'Democratic Republic of the Congo', 'COD', '180', 'yes', '243', '.cd', 'Congolese', 'democratic-republic-of-congo.png', '+243', 'Africa/Lubumbashi', NULL, NULL),
(61, 'DK', 'Denmark', 'Kingdom of Denmark', 'DNK', '208', 'yes', '45', '.dk', 'Dane', 'denmark.png', '+45', 'Europe/Copenhagen', NULL, NULL),
(62, 'DJ', 'Djibouti', 'Republic of Djibouti', 'DJI', '262', 'yes', '253', '.dj', 'Djiboutian', 'djibouti.png', '+253', 'Africa/Djibouti', NULL, NULL),
(63, 'DM', 'Dominica', 'Commonwealth of Dominica', 'DMA', '212', 'yes', '1+767', '.dm', 'Dominican', 'dominica.png', '+1-767', 'America/Dominica', NULL, NULL),
(64, 'DO', 'Dominican Republic', 'Dominican Republic', 'DOM', '214', 'yes', '1+809, 8', '.do', 'Dominican', 'dominican-republic.png', '+1-809, 8', 'America/Santo_Domingo', NULL, NULL),
(65, 'EC', 'Ecuador', 'Republic of Ecuador', 'ECU', '218', 'yes', '593', '.ec', 'Ecuadorian', 'ecuador.png', '+593', 'America/Guayaquil', NULL, NULL),
(66, 'EG', 'Egypt', 'Arab Republic of Egypt', 'EGY', '818', 'yes', '20', '.eg', 'Egyptian', 'egypt.png', '+20', 'Africa/Cairo', NULL, NULL),
(67, 'SV', 'El Salvador', 'Republic of El Salvador', 'SLV', '222', 'yes', '503', '.sv', 'Salvadoran', 'unknown.png', '+503', 'America/El_Salvador', NULL, NULL),
(68, 'GQ', 'Equatorial Guinea', 'Republic of Equatorial Guinea', 'GNQ', '226', 'yes', '240', '.gq', 'Guinean', 'equatorial-guinea.png', '+240', 'Africa/Malabo', NULL, NULL),
(69, 'ER', 'Eritrea', 'State of Eritrea', 'ERI', '232', 'yes', '291', '.er', 'Eritrean', 'eritrea.png', '+291', 'Africa/Asmara', NULL, NULL),
(70, 'EE', 'Estonia', 'Republic of Estonia', 'EST', '233', 'yes', '372', '.ee', 'Estonian', 'estonia.png', '+372', 'Europe/Tallinn', NULL, NULL),
(71, 'ET', 'Ethiopia', 'Federal Democratic Republic of Ethiopia', 'ETH', '231', 'yes', '251', '.et', 'Ethiopian', 'ethiopia.png', '+251', 'Africa/Addis_Ababa', NULL, NULL),
(72, 'FK', 'Falkland Islands (Malvinas)', 'The Falkland Islands (Malvinas)', 'FLK', '238', 'no', '500', '.fk', 'British', 'falkland-islands.png', '+500', 'Atlantic/Stanley', NULL, NULL),
(73, 'FO', 'Faroe Islands', 'The Faroe Islands', 'FRO', '234', 'no', '298', '.fo', 'unknown', 'faroe-islands.png', '+298', 'Atlantic/Faroe', NULL, NULL),
(74, 'FJ', 'Fiji', 'Republic of Fiji', 'FJI', '242', 'yes', '679', '.fj', 'Fijian', 'fiji.png', '+679', 'Pacific/Fiji', NULL, NULL),
(75, 'FI', 'Finland', 'Republic of Finland', 'FIN', '246', 'yes', '358', '.fi', 'Finn', 'finland.png', '+358', 'Europe/Helsinki', NULL, NULL),
(76, 'FR', 'France', 'French Republic', 'FRA', '250', 'yes', '33', '.fr', 'Frenchman', 'france.png', '+33', 'Europe/Paris', NULL, NULL),
(77, 'GF', 'French Guiana', 'French Guiana', 'GUF', '254', 'no', '594', '.gf', 'French', 'unknown.png', '+594', 'America/Cayenne', NULL, NULL),
(78, 'PF', 'French Polynesia', 'French Polynesia', 'PYF', '258', 'no', '689', '.pf', 'unknown', 'french-polynesia.png', '+689', 'Pacific/Marquesas', NULL, NULL),
(79, 'TF', 'French Southern Territories', 'French Southern Territories', 'ATF', '260', 'no', NULL, '.tf', 'French', 'unknown.png', NULL, 'Indian/Kerguelen', NULL, NULL),
(80, 'GA', 'Gabon', 'Gabonese Republic', 'GAB', '266', 'yes', '241', '.ga', 'Gabonese', 'gabon.png', '+241', 'Africa/Libreville', NULL, NULL),
(81, 'GM', 'Gambia', 'Republic of The Gambia', 'GMB', '270', 'yes', '220', '.gm', 'Gambian', 'gambia.png', '+220', 'Africa/Banjul', NULL, NULL),
(82, 'GE', 'Georgia', 'Georgia', 'GEO', '268', 'yes', '995', '.ge', 'Georgian', 'georgia.png', '+995', 'Asia/Tbilisi', NULL, NULL),
(83, 'DE', 'Germany', 'Federal Republic of Germany', 'DEU', '276', 'yes', '', '.de', 'Geman', 'germany.png', '+49', 'Europe/Berlin', NULL, NULL),
(84, 'GH', 'Ghana', 'Republic of Ghana', 'GHA', '288', 'yes', '233', '.gh', 'Ghanaian', 'ghana.png', '+233', 'Africa/Accra', NULL, NULL),
(85, 'GI', 'Gibraltar', 'Gibraltar', 'GIB', '292', 'no', '350', '.gi', 'British', 'gibraltar.png', '+350', 'Europe/Gibraltar', NULL, NULL),
(86, 'GR', 'Greece', 'Hellenic Republic', 'GRC', '300', 'yes', '30', '.gr', 'Greek', 'greece.png', '+30', 'Europe/Athens', NULL, NULL),
(87, 'GL', 'Greenland', 'Greenland', 'GRL', '304', 'no', NULL, '.gl', 'Danish', 'greenland.png', NULL, 'America/Scoresbysund', NULL, NULL),
(88, 'GD', 'Grenada', 'Grenada', 'GRD', '308', 'yes', '1+473', '.gd', 'British', 'grenada.png', '+1-473', 'America/Grenada', NULL, NULL),
(89, 'GP', 'Guadaloupe', 'Guadeloupe', 'GLP', '312', 'no', '590', '.gp', 'UNKNOWN', 'unknown.png', '+590', 'UNKNOWN', NULL, NULL),
(90, 'GU', 'Guam', 'Guam', 'GUM', '316', 'no', '1+671', '.gu', 'Guamanian', 'guam.png', '+1-671', 'Pacific/Guam', NULL, NULL),
(91, 'GT', 'Guatemala', 'Republic of Guatemala', 'GTM', '320', '', '502', '.gt', 'Guatemaltecos', 'guatemala.png', '+502', 'America/Guatemala', NULL, NULL),
(92, 'GG', 'Guernsey', 'Guernsey', 'GGY', '831', 'no', '44', '.gg', 'British', 'guernsey.png', '+44', 'Europe/Guernsey', NULL, NULL),
(93, 'GN', 'Guinea', 'Republic of Guinea', 'GIN', '324', 'yes', '224', '.gn', 'Guinean', 'guinea.png', '+224', 'Africa/Conakry', NULL, NULL),
(94, 'GW', 'Guinea-Bissau', 'Republic of Guinea-Bissau', 'GNB', '624', 'yes', '245', '.gw', 'Guinean', 'guinea-bissau.png', '+245', 'Africa/Bissau', NULL, NULL),
(95, 'GY', 'Guyana', 'Co-operative Republic of Guyana', 'GUY', '328', 'yes', '592', '.gy', 'Guyanese', 'guyana.png', '+592', 'America/Guyana', NULL, NULL),
(96, 'HT', 'Haiti', 'Republic of Haiti', 'HTI', '332', 'yes', '509', '.ht', 'African', 'haiti.png', '+509', 'America/Port-au-Prince', NULL, NULL),
(97, 'HM', 'Heard Island and McDonald Islands', 'Heard Island and McDonald Islands', 'HMD', '334', 'no', NULL, '.hm', 'UNKNOWN', 'unknown.png', NULL, 'UNKNOWN', NULL, NULL),
(98, 'HN', 'Honduras', 'Republic of Honduras', 'HND', '340', 'yes', '504', '.hn', 'Honduran', 'honduras.png', '+504', 'America/Tegucigalpa', NULL, NULL),
(99, 'HK', 'Hong Kong', 'Hong Kong', 'HKG', '344', 'no', '852', '.hk', 'Chinese', 'unknown.png', '+852', 'Asia/Hong_Kong', NULL, NULL),
(100, 'HU', 'Hungary', 'Hungary', 'HUN', '348', 'yes', '36', '.hu', 'Hungarian', 'hungary.png', '+36', 'Europe/Budapest', NULL, NULL),
(101, 'IS', 'Iceland', 'Republic of Iceland', 'ISL', '352', 'yes', '354', '.is', 'Icelandic', 'iceland.png', '+354', 'Atlantic/Reykjavik', NULL, NULL),
(102, 'IN', 'India', 'Republic of India', 'IND', '356', 'yes', '91', '.in', 'Indian', 'india.png', '+91', 'Asia/Kolkata', NULL, NULL),
(103, 'ID', 'Indonesia', 'Republic of Indonesia', 'IDN', '360', 'yes', '62', '.id', 'Indonesian', 'indonesia.png', '+62', 'Asia/Pontianak', NULL, NULL),
(104, 'IR', 'Iran', 'Islamic Republic of Iran', 'IRN', '364', 'yes', '98', '.ir', 'Iranian', 'iran.png', '+98', 'Asia/Tehran', NULL, NULL),
(105, 'IQ', 'Iraq', 'Republic of Iraq', 'IRQ', '368', 'yes', '964', '.iq', 'UNKNOWN', 'iraq.png', '+964', 'Asia/Baghdad', NULL, NULL),
(106, 'IE', 'Ireland', 'Ireland', 'IRL', '372', 'yes', '353', '.ie', 'Irish', 'ireland.png', '+353', 'Europe/Dublin', NULL, NULL),
(107, 'IM', 'Isle of Man', 'Isle of Man', 'IMN', '833', 'no', '44', '.im', 'UNKNOWN', 'unknown.png', '+44', 'Europe/Isle_of_Man', NULL, NULL),
(108, 'IL', 'Israel', 'State of Israel', 'ISR', '376', 'yes', '972', '.il', 'Israeli', 'israel.png', '+972', 'Asia/Jerusalem', NULL, NULL),
(109, 'IT', 'Italy', 'Italian Republic', 'ITA', '380', 'yes', '39', '.jm', 'Italian', 'italy.png', '+39', 'Europe/Rome', NULL, NULL),
(110, 'JM', 'Jamaica', 'Jamaica', 'JAM', '388', 'yes', '1+876', '.jm', 'Jamaican', 'jamaica.png', '+1-876', 'America/Jamaica', NULL, NULL),
(111, 'JP', 'Japan', 'Japan', 'JPN', '392', 'yes', '81', '.jp', 'Japanese', 'japan.png', '+81', 'Asia/Tokyo', NULL, NULL),
(112, 'JE', 'Jersey', 'The Bailiwick of Jersey', 'JEY', '832', 'no', '44', '.je', 'British', 'jersey.png', '+44', 'Europe/Jersey', NULL, NULL),
(113, 'JO', 'Jordan', 'Hashemite Kingdom of Jordan', 'JOR', '400', 'yes', '962', '.jo', 'Jordanian', 'jordan.png', '+962', 'Asia/Amman', NULL, NULL),
(114, 'KZ', 'Kazakhstan', 'Republic of Kazakhstan', 'KAZ', '398', 'yes', '7', '.kz', 'Kazakhstani', 'kazakhstan.png', '+7', 'Asia/Aqtau', NULL, NULL),
(115, 'KE', 'Kenya', 'Republic of Kenya', 'KEN', '404', 'yes', '254', '.ke', 'Kenyan', 'kenya.png', '+254', 'Africa/Nairobi', NULL, NULL),
(116, 'KI', 'Kiribati', 'Republic of Kiribati', 'KIR', '296', 'yes', '686', '.ki', 'Kiribatian', 'kiribati.png', '+686', 'Pacific/Enderbury', NULL, NULL),
(117, 'XK', 'Kosovo', 'Republic of Kosovo', '---', '---', 'some', '381', '', 'Albanian', 'kosovo.png', '+381', 'UNKNOWN', NULL, NULL),
(118, 'KW', 'Kuwait', 'State of Kuwait', 'KWT', '414', 'yes', '965', '.kw', 'Kuwaiti', 'kuwait.png', '+965', 'Asia/Kuwait', NULL, NULL),
(119, 'KG', 'Kyrgyzstan', 'Kyrgyz Republic', 'KGZ', '417', 'yes', '996', '.kg', 'UNKNOWN', 'kyrgyzstan.png', '+996', 'Asia/Bishkek', NULL, NULL),
(120, 'LA', 'Laos', 'Lao People\'s Democratic Republic', 'LAO', '418', 'yes', '856', '.la', 'UNKNOWN', 'laos.png', '+856', 'Asia/Vientiane', NULL, NULL),
(121, 'LV', 'Latvia', 'Republic of Latvia', 'LVA', '428', 'yes', '371', '.lv', 'Latvian', 'latvia.png', '+371', 'Europe/Riga', NULL, NULL),
(122, 'LB', 'Lebanon', 'Republic of Lebanon', 'LBN', '422', 'yes', '961', '.lb', 'Lebanese', 'lebanon.png', '+961', 'Asia/Beirut', NULL, NULL),
(123, 'LS', 'Lesotho', 'Kingdom of Lesotho', 'LSO', '426', 'yes', '266', '.ls', 'Basotho', 'lesotho.png', '+266', 'Africa/Maseru', NULL, NULL),
(124, 'LR', 'Liberia', 'Republic of Liberia', 'LBR', '430', 'yes', '231', '.lr', 'Liberian', 'liberia.png', '+231', 'Africa/Monrovia', NULL, NULL),
(125, 'LY', 'Libya', 'Libya', 'LBY', '434', 'yes', '218', '.ly', 'Libyan', 'libya.png', '+218', 'Africa/Tripoli', NULL, NULL),
(126, 'LI', 'Liechtenstein', 'Principality of Liechtenstein', 'LIE', '438', 'yes', '423', '.li', 'Liechtensteiner', 'liechtenstein.png', '+423', 'Europe/Vaduz', NULL, NULL),
(127, 'LT', 'Lithuania', 'Republic of Lithuania', 'LTU', '440', 'yes', '370', '.lt', 'Lithuanian', 'lithuania.png', '+370', 'Europe/Vilnius', NULL, NULL),
(128, 'LU', 'Luxembourg', 'Grand Duchy of Luxembourg', 'LUX', '442', 'yes', '352', '.lu', 'Luxembourger', 'luxembourg.png', '+352', 'Europe/Luxembourg', NULL, NULL),
(129, 'MO', 'Macao', 'The Macao Special Administrative Region', 'MAC', '446', 'no', '853', '.mo', 'Portuguese', 'macao.png', '+853', 'Asia/Macau', NULL, NULL),
(130, 'MK', 'North Macedonia', 'Republic of North Macedonia', 'MKD', '807', 'yes', '389', '.mk', 'Macedonian', 'republic-of-macedonia.png', '+389', 'Europe/Skopje', NULL, NULL),
(131, 'MG', 'Madagascar', 'Republic of Madagascar', 'MDG', '450', 'yes', '261', '.mg', 'Madagascan', 'madagascar.png', '+261', 'Indian/Antananarivo', NULL, NULL),
(132, 'MW', 'Malawi', 'Republic of Malawi', 'MWI', '454', 'yes', '265', '.mw', 'Malawian', 'malawi.png', '+265', 'Africa/Blantyre', NULL, NULL),
(133, 'MY', 'Malaysia', 'Malaysia', 'MYS', '458', 'yes', '60', '.my', 'Malaysian', 'malaysia.png', '+60', 'Asia/Kuala_Lumpur', NULL, NULL),
(134, 'MV', 'Maldives', 'Republic of Maldives', 'MDV', '462', 'yes', '960', '.mv', 'Maldivian', 'maldives.png', '+960', 'Indian/Maldives', NULL, NULL),
(135, 'ML', 'Mali', 'Republic of Mali', 'MLI', '466', 'yes', '223', '.ml', 'Malian', 'mali.png', '+223', 'Africa/Bamako', NULL, NULL),
(136, 'MT', 'Malta', 'Republic of Malta', 'MLT', '470', 'yes', '356', '.mt', 'Maltese', 'malta.png', '+356', 'Europe/Malta', NULL, NULL),
(137, 'MH', 'Marshall Islands', 'Republic of the Marshall Islands', 'MHL', '584', 'yes', '692', '.mh', 'Marshallese', 'unknown.png', '+692', 'Pacific/Kwajalein', NULL, NULL),
(138, 'MQ', 'Martinique', 'Martinique', 'MTQ', '474', 'no', '596', '.mq', 'African', 'martinique.png', '+596', 'America/Martinique', NULL, NULL),
(139, 'MR', 'Mauritania', 'Islamic Republic of Mauritania', 'MRT', '478', 'yes', '222', '.mr', 'Mauritanian', 'mauritania.png', '+222', 'Africa/Nouakchott', NULL, NULL),
(140, 'MU', 'Mauritius', 'Republic of Mauritius', 'MUS', '480', 'yes', '230', '.mu', 'Mauritian', 'mauritius.png', '+230', 'Indian/Mauritius', NULL, NULL),
(141, 'YT', 'Mayotte', 'Mayotte', 'MYT', '175', 'no', '262', '.yt', 'UNKNOWN', 'unknown.png', '+262', 'Indian/Mayotte', NULL, NULL),
(142, 'MX', 'Mexico', 'United Mexican States', 'MEX', '484', 'yes', '52', '.mx', 'Mexican', 'mexico.png', '+52', 'America/Mexico_City', NULL, NULL),
(143, 'FM', 'Micronesia', 'Federated States of Micronesia', 'FSM', '583', 'yes', '691', '.fm', 'UNKNOWN', 'micronesia.png', '+691', 'Pacific/Kosrae', NULL, NULL),
(144, 'MD', 'Moldava', 'Republic of Moldova', 'MDA', '498', 'yes', '373', '.md', 'Moldovan', 'unknown.png', '+373', 'UNKNOWN', NULL, NULL),
(145, 'MC', 'Monaco', 'Principality of Monaco', 'MCO', '492', 'yes', '377', '.mc', 'Monégasque', 'monaco.png', '+377', 'Europe/Monaco', NULL, NULL),
(146, 'MN', 'Mongolia', 'Mongolia', 'MNG', '496', 'yes', '976', '.mn', 'Mongolian', 'mongolia.png', '+976', 'Asia/Choibalsan', NULL, NULL),
(147, 'ME', 'Montenegro', 'Montenegro', 'MNE', '499', 'yes', '382', '.me', 'Montenegrin', 'montenegro.png', '+382', 'Europe/Podgorica', NULL, NULL),
(148, 'MS', 'Montserrat', 'Montserrat', 'MSR', '500', 'no', '1+664', '.ms', 'Montserratian', 'montserrat.png', '+1-664', 'America/Montserrat', NULL, NULL),
(149, 'MA', 'Morocco', 'Kingdom of Morocco', 'MAR', '504', 'yes', '212', '.ma', 'Moroccan', 'morocco.png', '+212', 'Africa/Casablanca', NULL, NULL),
(150, 'MZ', 'Mozambique', 'Republic of Mozambique', 'MOZ', '508', 'yes', '258', '.mz', 'UNKNOWN', 'mozambique.png', '+258', 'Africa/Maputo', NULL, NULL),
(151, 'MM', 'Myanmar (Burma)', 'Republic of the Union of Myanmar', 'MMR', '104', 'yes', '95', '.mm', 'UNKNOWN', 'unknown.png', '+95', 'Asia/Yangon', NULL, NULL),
(152, 'NA', 'Namibia', 'Republic of Namibia', 'NAM', '516', 'yes', '264', '.na', 'Namibian', 'namibia.png', '+264', 'Africa/Windhoek', NULL, NULL),
(153, 'NR', 'Nauru', 'Republic of Nauru', 'NRU', '520', 'yes', '674', '.nr', 'Nauruan', 'nauru.png', '+674', 'Pacific/Nauru', NULL, NULL),
(154, 'NP', 'Nepal', 'Federal Democratic Republic of Nepal', 'NPL', '524', 'yes', '977', '.np', 'Nepalese', 'nepal.png', '+977', 'Asia/Kathmandu', NULL, NULL),
(155, 'NL', 'Netherlands', 'Kingdom of the Netherlands', 'NLD', '528', 'yes', '31', '.nl', 'unknown', 'netherlands.png', '+31', 'Europe/Amsterdam', NULL, NULL),
(156, 'NC', 'New Caledonia', 'New Caledonia', 'NCL', '540', 'no', '687', '.nc', 'unkown', 'unknown.png', '+687', 'Pacific/Noumea', NULL, NULL),
(157, 'NZ', 'New Zealand', 'New Zealand', 'NZL', '554', 'yes', '64', '.nz', 'unknown', 'new-zealand.png', '+64', 'Pacific/Auckland', NULL, NULL),
(158, 'NI', 'Nicaragua', 'Republic of Nicaragua', 'NIC', '558', 'yes', '505', '.ni', 'UNKNOWN', 'nicaragua.png', '+505', 'America/Managua', NULL, NULL),
(159, 'NE', 'Niger', 'Republic of Niger', 'NER', '562', 'yes', '227', '.ne', 'Nigerien', 'niger.png', '+227', 'Africa/Niamey', NULL, NULL),
(160, 'NG', 'Nigeria', 'Federal Republic of Nigeria', 'NGA', '566', 'yes', '234', '.ng', 'Nigerien', 'nigeria.png', '+234', 'Africa/Lagos', NULL, NULL),
(161, 'NU', 'Niue', 'Niue', 'NIU', '570', 'some', '683', '.nu', 'Niuean', 'niue.png', '+683', 'Pacific/Niue', NULL, NULL),
(162, 'NF', 'Norfolk Island', 'Norfolk Island', 'NFK', '574', 'no', '672', '.nf', 'UNKNOWN', 'unknown.png', '+672', 'Pacific/Norfolk', NULL, NULL),
(163, 'KP', 'North Korea', 'Democratic People\'s Republic of Korea', 'PRK', '408', 'yes', '850', '.kp', 'Korean', 'unknown.png', '+850', 'Asia/Pyongyang', NULL, NULL),
(164, 'MP', 'Northern Mariana Islands', 'Northern Mariana Islands', 'MNP', '580', 'no', '1+670', '.mp', 'unknown', 'northern-marianas-islands.png', '+1-670', 'Pacific/Saipan', NULL, NULL),
(165, 'NO', 'Norway', 'Kingdom of Norway', 'NOR', '578', 'yes', '47', '.no', 'Norwegian', 'norway.png', '+47', 'Europe/Oslo', NULL, NULL),
(166, 'OM', 'Oman', 'Sultanate of Oman', 'OMN', '512', 'yes', '968', '.om', 'Omani', 'oman.png', '+968', 'Asia/Muscat', NULL, NULL),
(167, 'PK', 'Pakistan', 'Islamic Republic of Pakistan', 'PAK', '586', 'yes', '92', '.pk', 'Pakistani', 'pakistan.png', '+92', 'Asia/Karachi', NULL, NULL),
(168, 'PW', 'Palau', 'Republic of Palau', 'PLW', '585', 'yes', '680', '.pw', 'UNKNOWN', 'palau.png', '+680', 'Pacific/Palau', NULL, NULL),
(169, 'PS', 'Palestine', 'State of Palestine (or Occupied Palestinian Territory)', 'PSE', '275', 'some', '970', '.ps', 'Palestinian', 'palestine.png', '+970', 'UNKNOWN', NULL, NULL),
(170, 'PA', 'Panama', 'Republic of Panama', 'PAN', '591', 'yes', '507', '.pa', 'Panamanian', 'panama.png', '+507', 'America/Panama', NULL, NULL),
(171, 'PG', 'Papua New Guinea', 'Independent State of Papua New Guinea', 'PNG', '598', 'yes', '675', '.pg', 'Guinean', 'papua-new-guinea.png', '+675', 'Pacific/Bougainville', NULL, NULL),
(172, 'PY', 'Paraguay', 'Republic of Paraguay', 'PRY', '600', 'yes', '595', '.py', 'Paraguayan', 'paraguay.png', '+595', 'America/Asuncion', NULL, NULL),
(173, 'PE', 'Peru', 'Republic of Peru', 'PER', '604', 'yes', '51', '.pe', 'European', 'peru.png', '+51', 'America/Lima', NULL, NULL),
(174, 'PH', 'Philippines', 'Republic of the Philippines', 'PHL', '608', 'yes', '63', '.ph', 'Pilipino', 'unknown.png', '+63', 'Asia/Manila', NULL, NULL),
(175, 'PN', 'Pitcairn', 'Pitcairn', 'PCN', '612', 'no', 'NONE', '.pn', 'UNKNOWN', 'pitcairn-islands.png', '+612', 'Pacific/Pitcairn', NULL, NULL),
(176, 'PL', 'Poland', 'Republic of Poland', 'POL', '616', 'yes', '48', '.pl', 'Pole', 'republic-of-poland.png', '+48', 'Europe/Warsaw', NULL, NULL),
(177, 'PT', 'Portugal', 'Portuguese Republic', 'PRT', '620', 'yes', '351', '.pt', 'Portuguese', 'portugal.png', '+351', 'Atlantic/Azores', NULL, NULL),
(178, 'PR', 'Puerto Rico', 'Commonwealth of Puerto Rico', 'PRI', '630', 'no', '1+939', '.pr', 'unknown', 'puerto-rico.png', '+1-939', 'America/Puerto_Rico', NULL, NULL),
(179, 'QA', 'Qatar', 'State of Qatar', 'QAT', '634', 'yes', '974', '.qa', 'Qatari', 'qatar.png', '+974', 'Asia/Qatar', NULL, NULL),
(180, 'RE', 'Reunion', 'R&eacute;union', 'REU', '638', 'no', '262', '.re', 'UNKNOWN', 'unknown.png', '+262', 'Indian/Reunion', NULL, NULL),
(181, 'RO', 'Romania', 'Romania', 'ROU', '642', 'yes', '40', '.ro', 'Romanian', 'romania.png', '+40', 'Europe/Bucharest', NULL, NULL),
(182, 'RU', 'Russia', 'Russian Federation', 'RUS', '643', 'yes', '7', '.ru', 'Russian', 'russia.png', '+7', 'Asia/Anadyr', NULL, NULL),
(183, 'RW', 'Rwanda', 'Republic of Rwanda', 'RWA', '646', 'yes', '250', '.rw', 'Rwandan', 'rwanda.png', '+250', 'Africa/Kigali', NULL, NULL),
(184, 'BL', 'Saint Barthelemy', 'Saint Barth&eacute;lemy', 'BLM', '652', 'no', '590', '.bl', 'French', 'unknown.png', '+590', 'America/St_Barthelemy', NULL, NULL),
(185, 'SH', 'Saint Helena', 'Saint Helena, Ascension and Tristan da Cunha', 'SHN', '654', 'no', '290', '.sh', 'UNKNOWN', 'unknown.png', '+290', 'Atlantic/St_Helena', NULL, NULL),
(186, 'KN', 'Saint Kitts and Nevis', 'Federation of Saint Christopher and Nevis', 'KNA', '659', 'yes', '1+869', '.kn', 'UNKNOWN', 'unknown.png', '+1-869', 'America/St_Kitts', NULL, NULL),
(187, 'LC', 'Saint Lucia', 'Saint Lucia', 'LCA', '662', 'yes', '1+758', '.lc', 'African', 'unknown.png', '+1-758', 'America/St_Lucia', NULL, NULL),
(188, 'MF', 'Saint Martin', 'Saint Martin', 'MAF', '663', 'no', '590', '.mf', 'UNKNOWN', 'unknown.png', '+590', 'America/Marigot', NULL, NULL),
(189, 'PM', 'Saint Pierre and Miquelon', 'Saint Pierre and Miquelon', 'SPM', '666', 'no', '508', '.pm', 'French', 'unknown.png', '+508', 'America/Miquelon', NULL, NULL),
(190, 'VC', 'Saint Vincent and the Grenadines', 'Saint Vincent and the Grenadines', 'VCT', '670', 'yes', NULL, '.vc', 'UNKNOWN', 'unknown.png', NULL, 'America/St_Vincent', NULL, NULL),
(191, 'WS', 'Samoa', 'Independent State of Samoa', 'WSM', '882', 'yes', '685', '.ws', 'unknown', 'samoa.png', '+685', 'Pacific/Apia', NULL, NULL),
(192, 'SM', 'San Marino', 'Republic of San Marino', 'SMR', '674', '', '378', '.sm', 'UNKNOWN', 'unknown.png', '+378', 'Europe/San_Marino', NULL, NULL),
(193, 'ST', 'Sao Tome and Principe', 'Democratic Republic of S&atilde;o Tom&eacute; and Pr&iacute;ncipe', 'STP', '678', 'yes', '239', '.st', 'Sao Tomean', 'unknown.png', '+239', 'Africa/Sao_Tome', NULL, NULL),
(194, 'SA', 'Saudi Arabia', 'Kingdom of Saudi Arabia', 'SAU', '682', 'yes', '966', '.sa', 'Saudi', 'saudi-arabia.png', '+966', 'Asia/Riyadh', NULL, NULL),
(195, 'SN', 'Senegal', 'Republic of Senegal', 'SEN', '686', 'yes', '221', '.sn', 'Senegalese', 'senegal.png', '+221', 'Africa/Dakar', NULL, NULL),
(196, 'RS', 'Serbia', 'Republic of Serbia', 'SRB', '688', 'yes', '381', '.rs', 'Serbian', 'serbia.png', '+381', 'Europe/Belgrade', NULL, NULL),
(197, 'SC', 'Seychelles', 'Republic of Seychelles', 'SYC', '690', 'yes', '248', '.sc', 'Seychellois', 'seychelles.png', '+248', 'Indian/Mahe', NULL, NULL),
(198, 'SL', 'Sierra Leone', 'Republic of Sierra Leone', 'SLE', '694', 'yes', '232', '.sl', 'Sierra Leonean', 'unknown.png', '+232', 'Africa/Freetown', NULL, NULL),
(199, 'SG', 'Singapore', 'Republic of Singapore', 'SGP', '702', 'yes', '65', '.sg', 'Singaporean', 'singapore.png', '+65', 'Asia/Singapore', NULL, NULL),
(200, 'SX', 'Sint Maarten', 'Sint Maarten', 'SXM', '534', 'no', '1+721', '.sx', 'Dutch', 'unknown.png', '+1-721', 'America/Lower_Princes', NULL, NULL),
(201, 'SK', 'Slovakia', 'Slovak Republic', 'SVK', '703', 'yes', '421', '.sk', 'Slovak', 'slovakia.png', '+421', 'Europe/Bratislava', NULL, NULL),
(202, 'SI', 'Slovenia', 'Republic of Slovenia', 'SVN', '705', 'yes', '386', '.si', 'Slovenian', 'slovenia.png', '+386', 'Europe/Ljubljana', NULL, NULL),
(203, 'SB', 'Solomon Islands', 'Solomon Islands', 'SLB', '090', 'yes', '677', '.sb', 'Melanesian', 'unknown.png', '+677', 'Pacific/Guadalcanal', NULL, NULL),
(204, 'SO', 'Somalia', 'Somali Republic', 'SOM', '706', 'yes', '252', '.so', 'Somalis', 'somalia.png', '+252', 'Africa/Mogadishu', NULL, NULL),
(205, 'ZA', 'South Africa', 'Republic of South Africa', 'ZAF', '710', 'yes', '27', '.za', 'African', 'unknown.png', '+27', 'Africa/Johannesburg', NULL, NULL),
(206, 'GS', 'South Georgia and the South Sandwich Islands', 'South Georgia and the South Sandwich Islands', 'SGS', '239', 'no', '500', '.gs', 'UNKNOWN', 'unknown.png', '+500', 'Atlantic/South_Georgia', NULL, NULL),
(207, 'KR', 'South Korea', 'Republic of Korea', 'KOR', '410', 'yes', '', '.kr', 'Koean', 'south-korea.png', '+82', 'Asia/Seoul', NULL, NULL),
(208, 'SS', 'South Sudan', 'Republic of South Sudan', 'SSD', '728', 'yes', '211', '.ss', 'Sudanese', 'unknown.png', '+211', 'Africa/Juba', NULL, NULL),
(209, 'ES', 'Spain', 'Kingdom of Spain', 'ESP', '724', 'yes', '34', '.es', 'Spaniard', 'spain.png', '+34', 'Europe/Madrid', NULL, NULL),
(210, 'LK', 'Sri Lanka', 'Democratic Socialist Republic of Sri Lanka', 'LKA', '144', 'yes', '94', '.lk', 'unknown', 'sri-lanka.png', '+94', 'Asia/Colombo', NULL, NULL),
(211, 'SD', 'Sudan', 'Republic of the Sudan', 'SDN', '729', 'yes', '249', '.sd', 'Sudanese', 'sudan.png', '+249', 'Africa/Khartoum', NULL, NULL),
(212, 'SR', 'Suriname', 'Republic of Suriname', 'SUR', '740', 'yes', '597', '.sr', 'Dutch', 'suriname.png', '+597', 'America/Paramaribo', NULL, NULL),
(213, 'SJ', 'Svalbard and Jan Mayen', 'Svalbard and Jan Mayen', 'SJM', '744', 'no', '47', '.sj', 'Norwegian', 'unknown.png', '+47', 'Arctic/Longyearbyen', NULL, NULL),
(214, 'SZ', 'Swaziland', 'Kingdom of Swaziland', 'SWZ', '748', 'yes', '268', '.sz', 'Swazi', 'swaziland.png', '+268', 'Africa/Mbabane', NULL, NULL),
(215, 'SE', 'Sweden', 'Kingdom of Sweden', 'SWE', '752', 'yes', '46', '.se', 'Swede', 'sweden.png', '+46', 'Europe/Stockholm', NULL, NULL),
(216, 'CH', 'Switzerland', 'Swiss Confederation', 'CHE', '756', 'yes', '41', '.ch', 'Swiss', 'switzerland.png', '+41', 'Europe/Zurich', NULL, NULL),
(217, 'SY', 'Syria', 'Syrian Arab Republic', 'SYR', '760', 'yes', '963', '.sy', 'Syrian', 'syria.png', '+963', 'Asia/Damascus', NULL, NULL),
(218, 'TW', 'Taiwan', 'Republic of China (Taiwan)', 'TWN', '158', 'former', '886', '.tw', 'Taiwanese', 'taiwan.png', '+886', 'Asia/Taipei', NULL, NULL),
(219, 'TJ', 'Tajikistan', 'Republic of Tajikistan', 'TJK', '762', 'yes', '992', '.tj', 'Tadzhik', 'tajikistan.png', '+992', 'Asia/Dushanbe', NULL, NULL),
(220, 'TZ', 'Tanzania', 'United Republic of Tanzania', 'TZA', '834', 'yes', '255', '.tz', 'Tanzanian', 'tanzania.png', '+255', 'Africa/Dar_es_Salaam', NULL, NULL),
(221, 'TH', 'Thailand', 'Kingdom of Thailand', 'THA', '764', 'yes', '66', '.th', 'Thai', 'thailand.png', '+66', 'Asia/Bangkok', NULL, NULL),
(222, 'TL', 'Timor-Leste (East Timor)', 'Democratic Republic of Timor-Leste', 'TLS', '626', 'yes', '670', '.tl', 'Timorese', 'unknown.png', '+670', 'Asia/Dili', NULL, NULL),
(223, 'TG', 'Togo', 'Togolese Republic', 'TGO', '768', 'yes', '228', '.tg', 'Togolese', 'togo.png', '+228', 'Africa/Lome', NULL, NULL),
(224, 'TK', 'Tokelau', 'Tokelau', 'TKL', '772', 'no', '690', '.tk', 'Tokelauan', 'tokelau.png', '+690', 'Pacific/Fakaofo', NULL, NULL),
(225, 'TO', 'Tonga', 'Kingdom of Tonga', 'TON', '776', 'yes', '676', '.to', 'unknown', 'tonga.png', '+676', 'Pacific/Tongatapu', NULL, NULL),
(226, 'TT', 'Trinidad and Tobago', 'Republic of Trinidad and Tobago', 'TTO', '780', 'yes', '1+868', '.tt', 'British', 'trinidad-and-tobago.png', '+1-868', 'America/Port_of_Spain', NULL, NULL),
(227, 'TN', 'Tunisia', 'Republic of Tunisia', 'TUN', '788', 'yes', '216', '.tn', 'Tunisian ', 'tunisia.png', '+216', 'Africa/Tunis', NULL, NULL),
(228, 'TR', 'Turkey', 'Republic of Turkey', 'TUR', '792', 'yes', '90', '.tr', 'Turk', 'turkey.png', '+90', 'Europe/Istanbul', NULL, NULL),
(229, 'TM', 'Turkmenistan', 'Turkmenistan', 'TKM', '795', 'yes', '993', '.tm', 'Turkmen', 'turkmenistan.png', '+993', 'Asia/Ashgabat', NULL, NULL),
(230, 'TC', 'Turks and Caicos Islands', 'Turks and Caicos Islands', 'TCA', '796', 'no', '1+649', '.tc', 'British', 'turks-and-caicos.png', '++1-649', 'America/Grand_Turk', NULL, NULL),
(231, 'TV', 'Tuvalu', 'Tuvalu', 'TUV', '798', 'yes', '688', '.tv', 'Tuvaluan', 'tuvalu.png', '+688', '	Pacific/Funafuti', NULL, NULL),
(232, 'UG', 'Uganda', 'Republic of Uganda', 'UGA', '800', 'yes', '256', '.ug', 'UGANDAN', 'uganda.png', '+256', 'Africa/Kampala', NULL, NULL),
(233, 'UA', 'Ukraine', 'Ukraine', 'UKR', '804', 'yes', '380', '.ua', 'Ukrainian', 'ukraine.png', '+380', 'Europe/Kiev', NULL, NULL),
(234, 'AE', 'United Arab Emirates', 'United Arab Emirates', 'ARE', '784', 'yes', '971', '.ae', 'Emirati', 'united-arab-emirates.png', '+971', 'Asia/Dubai', NULL, NULL),
(235, 'GB', 'United Kingdom', 'United Kingdom of Great Britain and Nothern Ireland', 'GBR', '826', 'yes', '44', '.uk', 'British', 'united-kingdom.png', '+44', 'Europe/London', NULL, NULL),
(236, 'US', 'United States', 'United States of America', 'USA', '840', 'yes', '1', '.us', 'American', 'united-states-of-america.png', '+1', 'America/Adak', NULL, NULL),
(237, 'UM', 'United States Minor Outlying Islands', 'United States Minor Outlying Islands', 'UMI', '581', 'no', 'NONE', 'NONE', 'American', 'unknown.png', 'UNKNOWN', 'Pacific/Midway', NULL, NULL),
(238, 'UY', 'Uruguay', 'Eastern Republic of Uruguay', 'URY', '858', 'yes', '598', '.uy', 'Uruguayan', 'uruguay.png', '+598', 'America/Montevideo', NULL, NULL),
(239, 'UZ', 'Uzbekistan', 'Republic of Uzbekistan', 'UZB', '860', 'yes', '998', '.uz', 'Uzbekistan', 'unknown.png', '+998', 'Asia/Samarkand', NULL, NULL),
(240, 'VU', 'Vanuatu', 'Republic of Vanuatu', 'VUT', '548', 'yes', '678', '.vu', 'unknown', 'vanuatu.png', '+678', 'Pacific/Efate', NULL, NULL),
(241, 'VA', 'Vatican City', 'State of the Vatican City', 'VAT', '336', 'no', '39', '.va', 'Vaticanian', 'vatican-city.png', '+39', 'Europe/Vatican', NULL, NULL),
(242, 'VE', 'Venezuela', 'Bolivarian Republic of Venezuela', 'VEN', '862', 'yes', '58', '.ve', 'Venezuelan', 'venezuela.png', '+58', 'America/Caracas', NULL, NULL),
(243, 'VN', 'Vietnam', 'Socialist Republic of Vietnam', 'VNM', '704', 'yes', '84', '.vn', 'Vietnamese', 'vietnam.png', '+84', 'Asia/Ho_Chi_Minh', NULL, NULL),
(244, 'VG', 'Virgin Islands, British', 'British Virgin Islands', 'VGB', '092', 'no', '1+284', '.vg', 'American', 'unknown.png', '+1-284', 'America/Tortola', NULL, NULL),
(245, 'VI', 'Virgin Islands, US', 'Virgin Islands of the United States', 'VIR', '850', 'no', '1+340', '.vi', 'American', 'virgin-islands.png', '+1-340', 'America/St_Thomas', NULL, NULL),
(246, 'WF', 'Wallis and Futuna', 'Wallis and Futuna', 'WLF', '876', 'no', '681', '.wf', 'UNKOWN', 'unknown.png', '+681', 'Pacific/Wallis', NULL, NULL),
(247, 'EH', 'Western Sahara', 'Western Sahara', 'ESH', '732', 'no', '212', '.eh', 'Sahrawi', 'western-sahara.png', '+212', 'Africa/El_Aaiun', NULL, NULL),
(248, 'YE', 'Yemen', 'Republic of Yemen', 'YEM', '887', 'yes', '967', '.ye', 'Yemeni', 'yemen.png', '+967', 'Asia/Aden', NULL, NULL),
(249, 'ZM', 'Zambia', 'Republic of Zambia', 'ZMB', '894', 'yes', '260', '.zm', 'Zambian', 'zambia.png', '+260', 'Africa/Lusaka', NULL, NULL),
(250, 'ZW', 'Zimbabwe', 'Republic of Zimbabwe', 'ZWE', '716', 'yes', '263', '.zw', 'Zimbabwean', 'zimbabwe.png', '+263', 'Africa/Harare', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `symbol` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `code`, `name`, `symbol`, `created_at`, `updated_at`) VALUES
(1, 'AED', 'United Arab Emirates dirham', 'AED', NULL, NULL),
(2, 'AUD', 'Australian Dollar', '$', NULL, NULL),
(3, 'BAN', 'Bangladesh', 'BDT', NULL, NULL),
(4, 'BRL', 'Brazilian Real', 'R$', NULL, NULL),
(5, 'CAD', 'Canadian Dollar', '$', NULL, NULL),
(6, 'CHF', 'Swiss Franc', 'Fr', NULL, NULL),
(7, 'CLP', 'Chilean Peso', '$', NULL, NULL),
(8, 'CNY', 'Chinese Yuan', 'Â¥', NULL, NULL),
(9, 'CZK', 'Czech Koruna', 'KÄ', NULL, NULL),
(10, 'DKK', 'Danish Krone', 'kr', NULL, NULL),
(11, 'EGP', 'EGP', 'EGP', NULL, NULL),
(12, 'EUR', 'Euro', 'â‚¬', NULL, NULL),
(13, 'GBP', 'British Pound', 'Â£', NULL, NULL),
(14, 'HKD', 'Hong Kong Dollar', '$', NULL, NULL),
(15, 'HUF', 'Hungarian Forint', 'Ft', NULL, NULL),
(16, 'IDR', 'Indonesian Rupiah', 'Rp', NULL, NULL),
(17, 'ILS', 'Israeli New Shekel', 'â‚ª', NULL, NULL),
(18, 'INR', 'Indian Rupee', 'â‚¹', NULL, NULL),
(19, 'JPY', 'Japanese Yen', 'å††', NULL, NULL),
(20, 'KRW', 'Korean Won', 'â‚©', NULL, NULL),
(21, 'MXN', 'Mexican Peso', '$', NULL, NULL),
(22, 'MYR', 'Malaysian Ringgit', 'RM', NULL, NULL),
(23, 'NOK', 'Norwegian Krone', 'kr', NULL, NULL),
(24, 'NZD', 'New Zealand Dollar', '$', NULL, NULL),
(25, 'PHP', 'Philippine Peso', 'â‚±', NULL, NULL),
(26, 'PKR', 'Pakistan Rupee', 'PKR', NULL, NULL),
(27, 'PLN', 'Polish Zloty', 'zl', NULL, NULL),
(28, 'RUB', 'Russian Ruble', 'â‚½', NULL, NULL),
(29, 'SEK', 'Swedish Krona', 'kr', NULL, NULL),
(30, 'SGD', 'Singapore Dollar', 'S$', NULL, NULL),
(31, 'THB', 'Thai Baht', 'à¸¿', NULL, NULL),
(32, 'TRY', 'Turkish Lira', 'â‚º', NULL, NULL),
(33, 'TWD', 'Taiwan Dollar', 'NT$', NULL, NULL),
(34, 'USD', 'US Dollar', '$', NULL, NULL),
(35, 'VEF', 'Bol?var Fuerte', 'Bs.', NULL, NULL),
(36, 'ZAR', 'South African Rand', 'R', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `developers`
--

CREATE TABLE `developers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `developers`
--

INSERT INTO `developers` (`id`, `name_en`, `name_ar`, `slug`, `agency_id`, `business_id`, `created_at`, `updated_at`) VALUES
(1, 'test developer', 'test developer', 'test-developer', 1, 1, '2021-04-26 01:23:55', '2021-04-26 01:23:55'),
(2, 'developer2', 'developer2', 'developer2', 1, 1, '2021-04-26 01:35:24', '2021-04-26 01:35:24');

-- --------------------------------------------------------

--
-- Table structure for table `email_logs`
--

CREATE TABLE `email_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contacts` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_addresses` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `BCC` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attach_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `add_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `agency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_notifies`
--

CREATE TABLE `email_notifies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `listing_assigned` tinyint(1) DEFAULT 0,
  `lead_assigned` tinyint(1) DEFAULT 0,
  `listing_approval` tinyint(1) DEFAULT 0,
  `task_assigned` tinyint(1) DEFAULT 0,
  `listing_approved` tinyint(1) DEFAULT 0,
  `listing_rejected` tinyint(1) DEFAULT 0,
  `lsm_lead` tinyint(1) DEFAULT 0,
  `email_lead` tinyint(1) DEFAULT 0,
  `task_reminder` tinyint(1) DEFAULT 0,
  `tenancy_expiry` tinyint(1) DEFAULT 0,
  `email_cc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_bcc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_notify_reminders`
--

CREATE TABLE `email_notify_reminders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` enum('general_reminder','property_viewing','call','send_documents','collect_documents','meeting','email','payment_collection','cheque_submission') COLLATE utf8mb4_unicode_ci DEFAULT 'general_reminder',
  `type` enum('after','before') COLLATE utf8mb4_unicode_ci DEFAULT 'before',
  `day` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_notify_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_notify_tenancy`
--

CREATE TABLE `email_notify_tenancy` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('after','before') COLLATE utf8mb4_unicode_ci DEFAULT 'before',
  `day` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_notify_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `floor_plans`
--

CREATE TABLE `floor_plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `image_banks`
--

CREATE TABLE `image_banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `folder_id` bigint(20) UNSIGNED DEFAULT NULL,
  `dir` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

<<<<<<< HEAD:broker.sql
=======
--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(90, 'default', '{\"uuid\":\"2b00393e-85a6-40e6-994d-3bfb68237e8c\",\"displayName\":\"App\\\\Jobs\\\\SendEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmail\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\SendEmail\\\":11:{s:2:\\\"to\\\";s:21:\\\"shady@onetecgroup.com\\\";s:8:\\\"template\\\";s:368:\\\"<p>Hi there,<\\/p><p>A new Question Has Been Made By Management : Ceo.<\\/p>\\r\\n<p>Question Is : gt .<\\/p>\\r\\n<p>Opportunity Name Is : Ahmed mohamed .<\\/p>\\r\\n<p>You can view this opportunity by logging in to the portal using the link below.<\\/p><p><br><a href=\\\"http:\\/\\/broker.test\\/sales\\/opportunities\\/1\\\"><strong>View Task<\\/strong><\\/a><br><br>Regards<br>The OneTecGroup CRM Team<\\/p>\\\";s:7:\\\"message\\\";s:24:\\\"New Opportunity Question\\\";s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618484333, 1618484333),
(91, 'default', '{\"uuid\":\"a8196a48-f5ed-45ec-97f1-7d8467f83c32\",\"displayName\":\"App\\\\Events\\\\OpportunityQuestionEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":10:{s:5:\\\"event\\\";O:35:\\\"App\\\\Events\\\\OpportunityQuestionEvent\\\":5:{s:7:\\\"message\\\";s:54:\\\"A New Opportunity Question Has Been Made By Management\\\";s:23:\\\"opportunity_question_id\\\";i:17;s:2:\\\"id\\\";i:2;s:4:\\\"type\\\";s:8:\\\"question\\\";s:6:\\\"socket\\\";N;}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618484333, 1618484333),
(92, 'default', '{\"uuid\":\"d20f8ce4-6504-4424-a888-1220d6b80ae4\",\"displayName\":\"App\\\\Jobs\\\\SendEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmail\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\SendEmail\\\":11:{s:2:\\\"to\\\";s:27:\\\"mohamedhamed01127@gmail.com\\\";s:8:\\\"template\\\";s:368:\\\"<p>Hi there,<\\/p><p>A new Question Has Been Made By Management : Ceo.<\\/p>\\r\\n<p>Question Is : gt .<\\/p>\\r\\n<p>Opportunity Name Is : Ahmed mohamed .<\\/p>\\r\\n<p>You can view this opportunity by logging in to the portal using the link below.<\\/p><p><br><a href=\\\"http:\\/\\/broker.test\\/sales\\/opportunities\\/1\\\"><strong>View Task<\\/strong><\\/a><br><br>Regards<br>The OneTecGroup CRM Team<\\/p>\\\";s:7:\\\"message\\\";s:24:\\\"New Opportunity Question\\\";s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618484333, 1618484333),
(93, 'default', '{\"uuid\":\"c9004a6b-28d6-4db3-a3a1-b25ef993c555\",\"displayName\":\"App\\\\Events\\\\OpportunityQuestionEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":10:{s:5:\\\"event\\\";O:35:\\\"App\\\\Events\\\\OpportunityQuestionEvent\\\":5:{s:7:\\\"message\\\";s:54:\\\"A New Opportunity Question Has Been Made By Management\\\";s:23:\\\"opportunity_question_id\\\";i:17;s:2:\\\"id\\\";i:9;s:4:\\\"type\\\";s:8:\\\"question\\\";s:6:\\\"socket\\\";N;}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618484333, 1618484333),
(94, 'default', '{\"uuid\":\"e5c11352-9d3e-4622-b33b-61222816d19f\",\"displayName\":\"App\\\\Jobs\\\\SendEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmail\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\SendEmail\\\":11:{s:2:\\\"to\\\";s:21:\\\"hamed@onetecgroup.com\\\";s:8:\\\"template\\\";s:463:\\\"<p>Hi there,<\\/p><p>Opportunity Result Report OF: <strong>Ahmed mohamed<\\/strong> &nbsp;has been updated by <strong>Ceo<\\/strong>.<\\/p><p>The New Update : <\\/p> <p>Status : successful .<\\/p> <p> Stage : pending.<\\/p><p>Note :  testing the codes <\\/p><p>You can view this opportunity by logging in to the portal using the link below.<\\/p><p><br><a href=\\\"http:\\/\\/broker.test\\/sales\\/opportunities\\/1\\\"><strong>View Task<\\/strong><\\/a><br><br>Regards<br>The OneTecGroup CRM Team<\\/p>\\\";s:7:\\\"message\\\";s:44:\\\"Opportunity Result Report Has Been Confirmed\\\";s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618485472, 1618485472),
(95, 'default', '{\"uuid\":\"bba8421e-e153-45bb-9d55-d8cdf901f9de\",\"displayName\":\"App\\\\Events\\\\OpportunityResultEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":10:{s:5:\\\"event\\\";O:33:\\\"App\\\\Events\\\\OpportunityResultEvent\\\":5:{s:7:\\\"message\\\";s:50:\\\"A New Opportunity Result Has Been Confirmed To You\\\";s:19:\\\"opportunity_task_id\\\";i:4;s:2:\\\"id\\\";i:1;s:4:\\\"type\\\";s:6:\\\"result\\\";s:6:\\\"socket\\\";N;}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618485472, 1618485472),
(96, 'default', '{\"uuid\":\"bd919173-cc1e-4ca0-acaf-df72e5a0642e\",\"displayName\":\"App\\\\Jobs\\\\SendEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmail\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\SendEmail\\\":11:{s:2:\\\"to\\\";s:21:\\\"hamed@onetecgroup.com\\\";s:8:\\\"template\\\";s:341:\\\"<p>Hi there,<\\/p><p>A new Task <strong>Ahmed mohamed<\\/strong> &nbsp;has been assigned to you by <strong>Ceo<\\/strong>.<\\/p><p>You can view this opportunity by logging in to the portal using the link below.<\\/p><p><br><a href=\\\"http:\\/\\/broker.test\\/sales\\/opportunities\\/1\\\"><strong>View Task<\\/strong><\\/a><br><br>Regards<br>The OneTecGroup CRM Team<\\/p>\\\";s:7:\\\"message\\\";s:41:\\\"Opportunity Task Has Been Assigned To You\\\";s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618905559, 1618905559),
(97, 'default', '{\"uuid\":\"0eb7221e-a18c-4479-908e-48f5b5dced95\",\"displayName\":\"App\\\\Events\\\\OpportunityTaskEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":10:{s:5:\\\"event\\\";O:31:\\\"App\\\\Events\\\\OpportunityTaskEvent\\\":5:{s:7:\\\"message\\\";s:47:\\\"A New Opportunity Task Has Been Assigned To You\\\";s:19:\\\"opportunity_task_id\\\";i:5;s:2:\\\"id\\\";i:1;s:4:\\\"type\\\";s:4:\\\"task\\\";s:6:\\\"socket\\\";N;}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618905559, 1618905559),
(98, 'default', '{\"uuid\":\"a2b5a9ca-652d-43d9-951f-f574a6af4e79\",\"displayName\":\"App\\\\Jobs\\\\SendEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmail\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\SendEmail\\\":11:{s:2:\\\"to\\\";s:21:\\\"shady@onetecgroup.com\\\";s:8:\\\"template\\\";s:341:\\\"<p>Hi there,<\\/p><p>A new Task <strong>Ahmed mohamed<\\/strong> &nbsp;has been assigned to you by <strong>Ceo<\\/strong>.<\\/p><p>You can view this opportunity by logging in to the portal using the link below.<\\/p><p><br><a href=\\\"http:\\/\\/broker.test\\/sales\\/opportunities\\/1\\\"><strong>View Task<\\/strong><\\/a><br><br>Regards<br>The OneTecGroup CRM Team<\\/p>\\\";s:7:\\\"message\\\";s:41:\\\"Opportunity Task Has Been Assigned To You\\\";s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618905559, 1618905559),
(99, 'default', '{\"uuid\":\"2c94cfc9-0dfd-4a7f-ab43-644e5bcca3f4\",\"displayName\":\"App\\\\Events\\\\OpportunityTaskEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":10:{s:5:\\\"event\\\";O:31:\\\"App\\\\Events\\\\OpportunityTaskEvent\\\":5:{s:7:\\\"message\\\";s:47:\\\"A New Opportunity Task Has Been Assigned To You\\\";s:19:\\\"opportunity_task_id\\\";i:5;s:2:\\\"id\\\";i:2;s:4:\\\"type\\\";s:4:\\\"task\\\";s:6:\\\"socket\\\";N;}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618905559, 1618905559),
(100, 'default', '{\"uuid\":\"4b1b3f4a-12a9-42aa-a21c-640f61351985\",\"displayName\":\"App\\\\Jobs\\\\SendEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmail\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\SendEmail\\\":11:{s:2:\\\"to\\\";s:27:\\\"mohamedhamed01127@gmail.com\\\";s:8:\\\"template\\\";s:341:\\\"<p>Hi there,<\\/p><p>A new Task <strong>Ahmed mohamed<\\/strong> &nbsp;has been assigned to you by <strong>Ceo<\\/strong>.<\\/p><p>You can view this opportunity by logging in to the portal using the link below.<\\/p><p><br><a href=\\\"http:\\/\\/broker.test\\/sales\\/opportunities\\/1\\\"><strong>View Task<\\/strong><\\/a><br><br>Regards<br>The OneTecGroup CRM Team<\\/p>\\\";s:7:\\\"message\\\";s:41:\\\"Opportunity Task Has Been Assigned To You\\\";s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618905559, 1618905559),
(101, 'default', '{\"uuid\":\"73768b81-79d8-4b92-9d08-158a2812bc3f\",\"displayName\":\"App\\\\Events\\\\OpportunityTaskEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":10:{s:5:\\\"event\\\";O:31:\\\"App\\\\Events\\\\OpportunityTaskEvent\\\":5:{s:7:\\\"message\\\";s:47:\\\"A New Opportunity Task Has Been Assigned To You\\\";s:19:\\\"opportunity_task_id\\\";i:5;s:2:\\\"id\\\";i:9;s:4:\\\"type\\\";s:4:\\\"task\\\";s:6:\\\"socket\\\";N;}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618905559, 1618905559),
(102, 'default', '{\"uuid\":\"bc89e2b6-f322-4627-9e60-d500550e66b4\",\"displayName\":\"App\\\\Jobs\\\\SendEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmail\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\SendEmail\\\":11:{s:2:\\\"to\\\";s:21:\\\"hamed@onetecgroup.com\\\";s:8:\\\"template\\\";s:341:\\\"<p>Hi there,<\\/p><p>A new Task <strong>Ahmed mohamed<\\/strong> &nbsp;has been assigned to you by <strong>Ceo<\\/strong>.<\\/p><p>You can view this opportunity by logging in to the portal using the link below.<\\/p><p><br><a href=\\\"http:\\/\\/broker.test\\/sales\\/opportunities\\/1\\\"><strong>View Task<\\/strong><\\/a><br><br>Regards<br>The OneTecGroup CRM Team<\\/p>\\\";s:7:\\\"message\\\";s:33:\\\"Opportunity Task Has Been UPDATED\\\";s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618917358, 1618917358),
(103, 'default', '{\"uuid\":\"bff39b35-c802-48f4-bfc4-6d40c1fca27e\",\"displayName\":\"App\\\\Events\\\\OpportunityTaskEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":10:{s:5:\\\"event\\\";O:31:\\\"App\\\\Events\\\\OpportunityTaskEvent\\\":5:{s:7:\\\"message\\\";s:47:\\\"A New Opportunity Task Has Been Assigned To You\\\";s:19:\\\"opportunity_task_id\\\";i:1;s:2:\\\"id\\\";i:1;s:4:\\\"type\\\";s:4:\\\"task\\\";s:6:\\\"socket\\\";N;}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618917358, 1618917358),
(104, 'default', '{\"uuid\":\"8487f657-4149-47a4-9b8a-004f98db1ae4\",\"displayName\":\"App\\\\Jobs\\\\SendEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmail\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\SendEmail\\\":11:{s:2:\\\"to\\\";s:21:\\\"shady@onetecgroup.com\\\";s:8:\\\"template\\\";s:341:\\\"<p>Hi there,<\\/p><p>A new Task <strong>Ahmed mohamed<\\/strong> &nbsp;has been assigned to you by <strong>Ceo<\\/strong>.<\\/p><p>You can view this opportunity by logging in to the portal using the link below.<\\/p><p><br><a href=\\\"http:\\/\\/broker.test\\/sales\\/opportunities\\/1\\\"><strong>View Task<\\/strong><\\/a><br><br>Regards<br>The OneTecGroup CRM Team<\\/p>\\\";s:7:\\\"message\\\";s:33:\\\"Opportunity Task Has Been UPDATED\\\";s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618917358, 1618917358),
(105, 'default', '{\"uuid\":\"f659b932-70e0-4910-85df-cebf89bff166\",\"displayName\":\"App\\\\Events\\\\OpportunityTaskEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":10:{s:5:\\\"event\\\";O:31:\\\"App\\\\Events\\\\OpportunityTaskEvent\\\":5:{s:7:\\\"message\\\";s:47:\\\"A New Opportunity Task Has Been Assigned To You\\\";s:19:\\\"opportunity_task_id\\\";i:1;s:2:\\\"id\\\";i:2;s:4:\\\"type\\\";s:4:\\\"task\\\";s:6:\\\"socket\\\";N;}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618917358, 1618917358),
(106, 'default', '{\"uuid\":\"d1bb34ef-8c83-476a-8104-4383c2dbdd50\",\"displayName\":\"App\\\\Jobs\\\\SendEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmail\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\SendEmail\\\":11:{s:2:\\\"to\\\";s:27:\\\"mohamedhamed01127@gmail.com\\\";s:8:\\\"template\\\";s:341:\\\"<p>Hi there,<\\/p><p>A new Task <strong>Ahmed mohamed<\\/strong> &nbsp;has been assigned to you by <strong>Ceo<\\/strong>.<\\/p><p>You can view this opportunity by logging in to the portal using the link below.<\\/p><p><br><a href=\\\"http:\\/\\/broker.test\\/sales\\/opportunities\\/1\\\"><strong>View Task<\\/strong><\\/a><br><br>Regards<br>The OneTecGroup CRM Team<\\/p>\\\";s:7:\\\"message\\\";s:33:\\\"Opportunity Task Has Been UPDATED\\\";s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618917358, 1618917358),
(107, 'default', '{\"uuid\":\"ecd796d0-2e02-47a1-b7c6-ea9c9c505f3f\",\"displayName\":\"App\\\\Events\\\\OpportunityTaskEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":10:{s:5:\\\"event\\\";O:31:\\\"App\\\\Events\\\\OpportunityTaskEvent\\\":5:{s:7:\\\"message\\\";s:47:\\\"A New Opportunity Task Has Been Assigned To You\\\";s:19:\\\"opportunity_task_id\\\";i:1;s:2:\\\"id\\\";i:9;s:4:\\\"type\\\";s:4:\\\"task\\\";s:6:\\\"socket\\\";N;}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618917358, 1618917358),
(108, 'default', '{\"uuid\":\"96eec1ee-e440-496b-b99b-6700010e37df\",\"displayName\":\"App\\\\Jobs\\\\SendEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmail\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\SendEmail\\\":11:{s:2:\\\"to\\\";s:21:\\\"shady@onetecgroup.com\\\";s:8:\\\"template\\\";s:341:\\\"<p>Hi there,<\\/p><p>A new Task <strong>Ahmed mohamed<\\/strong> &nbsp;has been assigned to you by <strong>Ceo<\\/strong>.<\\/p><p>You can view this opportunity by logging in to the portal using the link below.<\\/p><p><br><a href=\\\"http:\\/\\/broker.test\\/sales\\/opportunities\\/1\\\"><strong>View Task<\\/strong><\\/a><br><br>Regards<br>The OneTecGroup CRM Team<\\/p>\\\";s:7:\\\"message\\\";s:33:\\\"Opportunity Task Has Been UPDATED\\\";s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618917372, 1618917372),
(109, 'default', '{\"uuid\":\"375889e5-ff6e-41a3-9161-1a02058dc705\",\"displayName\":\"App\\\\Events\\\\OpportunityTaskEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":10:{s:5:\\\"event\\\";O:31:\\\"App\\\\Events\\\\OpportunityTaskEvent\\\":5:{s:7:\\\"message\\\";s:47:\\\"A New Opportunity Task Has Been Assigned To You\\\";s:19:\\\"opportunity_task_id\\\";i:1;s:2:\\\"id\\\";i:2;s:4:\\\"type\\\";s:4:\\\"task\\\";s:6:\\\"socket\\\";N;}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618917372, 1618917372),
(110, 'default', '{\"uuid\":\"c530f61a-3acf-4bce-88a0-7ca484ee6c55\",\"displayName\":\"App\\\\Jobs\\\\SendEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmail\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\SendEmail\\\":11:{s:2:\\\"to\\\";s:27:\\\"mohamedhamed01127@gmail.com\\\";s:8:\\\"template\\\";s:341:\\\"<p>Hi there,<\\/p><p>A new Task <strong>Ahmed mohamed<\\/strong> &nbsp;has been assigned to you by <strong>Ceo<\\/strong>.<\\/p><p>You can view this opportunity by logging in to the portal using the link below.<\\/p><p><br><a href=\\\"http:\\/\\/broker.test\\/sales\\/opportunities\\/1\\\"><strong>View Task<\\/strong><\\/a><br><br>Regards<br>The OneTecGroup CRM Team<\\/p>\\\";s:7:\\\"message\\\";s:33:\\\"Opportunity Task Has Been UPDATED\\\";s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618917372, 1618917372),
(111, 'default', '{\"uuid\":\"15cc9925-0de9-4c5c-8a56-c268fa60a820\",\"displayName\":\"App\\\\Events\\\\OpportunityTaskEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":10:{s:5:\\\"event\\\";O:31:\\\"App\\\\Events\\\\OpportunityTaskEvent\\\":5:{s:7:\\\"message\\\";s:47:\\\"A New Opportunity Task Has Been Assigned To You\\\";s:19:\\\"opportunity_task_id\\\";i:1;s:2:\\\"id\\\";i:9;s:4:\\\"type\\\";s:4:\\\"task\\\";s:6:\\\"socket\\\";N;}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618917372, 1618917372),
(112, 'default', '{\"uuid\":\"35adf652-a9b4-45cb-b863-49c11a8d7bee\",\"displayName\":\"App\\\\Jobs\\\\SendEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmail\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\SendEmail\\\":11:{s:2:\\\"to\\\";s:21:\\\"shady@onetecgroup.com\\\";s:8:\\\"template\\\";s:341:\\\"<p>Hi there,<\\/p><p>A new Task <strong>Ahmed mohamed<\\/strong> &nbsp;has been assigned to you by <strong>Ceo<\\/strong>.<\\/p><p>You can view this opportunity by logging in to the portal using the link below.<\\/p><p><br><a href=\\\"http:\\/\\/broker.test\\/sales\\/opportunities\\/1\\\"><strong>View Task<\\/strong><\\/a><br><br>Regards<br>The OneTecGroup CRM Team<\\/p>\\\";s:7:\\\"message\\\";s:33:\\\"Opportunity Task Has Been UPDATED\\\";s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919130, 1618919130),
(113, 'default', '{\"uuid\":\"29cff6e9-a8bd-4a8c-a902-6dd44aac52f3\",\"displayName\":\"App\\\\Events\\\\OpportunityTaskEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":10:{s:5:\\\"event\\\";O:31:\\\"App\\\\Events\\\\OpportunityTaskEvent\\\":5:{s:7:\\\"message\\\";s:47:\\\"A New Opportunity Task Has Been Assigned To You\\\";s:19:\\\"opportunity_task_id\\\";i:1;s:2:\\\"id\\\";i:2;s:4:\\\"type\\\";s:4:\\\"task\\\";s:6:\\\"socket\\\";N;}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919130, 1618919130),
(114, 'default', '{\"uuid\":\"773ef373-a7ab-450f-8162-335a408a7803\",\"displayName\":\"App\\\\Jobs\\\\SendEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmail\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\SendEmail\\\":11:{s:2:\\\"to\\\";s:21:\\\"hamed@onetecgroup.com\\\";s:8:\\\"template\\\";s:341:\\\"<p>Hi there,<\\/p><p>A new Task <strong>Ahmed mohamed<\\/strong> &nbsp;has been assigned to you by <strong>Ceo<\\/strong>.<\\/p><p>You can view this opportunity by logging in to the portal using the link below.<\\/p><p><br><a href=\\\"http:\\/\\/broker.test\\/sales\\/opportunities\\/1\\\"><strong>View Task<\\/strong><\\/a><br><br>Regards<br>The OneTecGroup CRM Team<\\/p>\\\";s:7:\\\"message\\\";s:33:\\\"Opportunity Task Has Been UPDATED\\\";s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919148, 1618919148),
(115, 'default', '{\"uuid\":\"d50e34fd-8f11-4fcb-997f-ea1d715d2933\",\"displayName\":\"App\\\\Events\\\\OpportunityTaskEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":10:{s:5:\\\"event\\\";O:31:\\\"App\\\\Events\\\\OpportunityTaskEvent\\\":5:{s:7:\\\"message\\\";s:47:\\\"A New Opportunity Task Has Been Assigned To You\\\";s:19:\\\"opportunity_task_id\\\";i:1;s:2:\\\"id\\\";i:1;s:4:\\\"type\\\";s:4:\\\"task\\\";s:6:\\\"socket\\\";N;}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919148, 1618919148),
(116, 'default', '{\"uuid\":\"e7e9d7fa-8a95-41df-ac83-5f5893bcd6d6\",\"displayName\":\"App\\\\Jobs\\\\SendEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmail\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\SendEmail\\\":11:{s:2:\\\"to\\\";s:27:\\\"mohamedhamed01127@gmail.com\\\";s:8:\\\"template\\\";s:341:\\\"<p>Hi there,<\\/p><p>A new Task <strong>Ahmed mohamed<\\/strong> &nbsp;has been assigned to you by <strong>Ceo<\\/strong>.<\\/p><p>You can view this opportunity by logging in to the portal using the link below.<\\/p><p><br><a href=\\\"http:\\/\\/broker.test\\/sales\\/opportunities\\/1\\\"><strong>View Task<\\/strong><\\/a><br><br>Regards<br>The OneTecGroup CRM Team<\\/p>\\\";s:7:\\\"message\\\";s:33:\\\"Opportunity Task Has Been UPDATED\\\";s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919148, 1618919148),
(117, 'default', '{\"uuid\":\"d282eefb-e2b1-4dbf-8ccc-a7298de04def\",\"displayName\":\"App\\\\Events\\\\OpportunityTaskEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":10:{s:5:\\\"event\\\";O:31:\\\"App\\\\Events\\\\OpportunityTaskEvent\\\":5:{s:7:\\\"message\\\";s:47:\\\"A New Opportunity Task Has Been Assigned To You\\\";s:19:\\\"opportunity_task_id\\\";i:1;s:2:\\\"id\\\";i:9;s:4:\\\"type\\\";s:4:\\\"task\\\";s:6:\\\"socket\\\";N;}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919148, 1618919148),
(118, 'default', '{\"uuid\":\"ef40fbd8-00be-4891-9d1b-cde15c12b8c3\",\"displayName\":\"App\\\\Jobs\\\\SendEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmail\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\SendEmail\\\":11:{s:2:\\\"to\\\";s:21:\\\"hamed@onetecgroup.com\\\";s:8:\\\"template\\\";s:341:\\\"<p>Hi there,<\\/p><p>A new Task <strong>Ahmed mohamed<\\/strong> &nbsp;has been assigned to you by <strong>Ceo<\\/strong>.<\\/p><p>You can view this opportunity by logging in to the portal using the link below.<\\/p><p><br><a href=\\\"http:\\/\\/broker.test\\/sales\\/opportunities\\/1\\\"><strong>View Task<\\/strong><\\/a><br><br>Regards<br>The OneTecGroup CRM Team<\\/p>\\\";s:7:\\\"message\\\";s:33:\\\"Opportunity Task Has Been UPDATED\\\";s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919161, 1618919161),
(119, 'default', '{\"uuid\":\"7a92d7b6-6aa2-4a22-bb47-de94d64f962a\",\"displayName\":\"App\\\\Events\\\\OpportunityTaskEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":10:{s:5:\\\"event\\\";O:31:\\\"App\\\\Events\\\\OpportunityTaskEvent\\\":5:{s:7:\\\"message\\\";s:47:\\\"A New Opportunity Task Has Been Assigned To You\\\";s:19:\\\"opportunity_task_id\\\";i:1;s:2:\\\"id\\\";i:1;s:4:\\\"type\\\";s:4:\\\"task\\\";s:6:\\\"socket\\\";N;}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919161, 1618919161),
(120, 'default', '{\"uuid\":\"8ca38d30-185b-430f-af95-70b41598a59c\",\"displayName\":\"App\\\\Jobs\\\\SendEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmail\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\SendEmail\\\":11:{s:2:\\\"to\\\";s:21:\\\"shady@onetecgroup.com\\\";s:8:\\\"template\\\";s:341:\\\"<p>Hi there,<\\/p><p>A new Task <strong>Ahmed mohamed<\\/strong> &nbsp;has been assigned to you by <strong>Ceo<\\/strong>.<\\/p><p>You can view this opportunity by logging in to the portal using the link below.<\\/p><p><br><a href=\\\"http:\\/\\/broker.test\\/sales\\/opportunities\\/1\\\"><strong>View Task<\\/strong><\\/a><br><br>Regards<br>The OneTecGroup CRM Team<\\/p>\\\";s:7:\\\"message\\\";s:33:\\\"Opportunity Task Has Been UPDATED\\\";s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919161, 1618919161),
(121, 'default', '{\"uuid\":\"a147c61d-7596-457b-a266-13f3c3d26990\",\"displayName\":\"App\\\\Events\\\\OpportunityTaskEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":10:{s:5:\\\"event\\\";O:31:\\\"App\\\\Events\\\\OpportunityTaskEvent\\\":5:{s:7:\\\"message\\\";s:47:\\\"A New Opportunity Task Has Been Assigned To You\\\";s:19:\\\"opportunity_task_id\\\";i:1;s:2:\\\"id\\\";i:2;s:4:\\\"type\\\";s:4:\\\"task\\\";s:6:\\\"socket\\\";N;}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919161, 1618919161),
(122, 'default', '{\"uuid\":\"11e74e40-adcc-4e6e-8cb6-a8e86b5a0638\",\"displayName\":\"App\\\\Jobs\\\\SendEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmail\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\SendEmail\\\":11:{s:2:\\\"to\\\";s:27:\\\"mohamedhamed01127@gmail.com\\\";s:8:\\\"template\\\";s:341:\\\"<p>Hi there,<\\/p><p>A new Task <strong>Ahmed mohamed<\\/strong> &nbsp;has been assigned to you by <strong>Ceo<\\/strong>.<\\/p><p>You can view this opportunity by logging in to the portal using the link below.<\\/p><p><br><a href=\\\"http:\\/\\/broker.test\\/sales\\/opportunities\\/1\\\"><strong>View Task<\\/strong><\\/a><br><br>Regards<br>The OneTecGroup CRM Team<\\/p>\\\";s:7:\\\"message\\\";s:33:\\\"Opportunity Task Has Been UPDATED\\\";s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919161, 1618919161),
(123, 'default', '{\"uuid\":\"f99e55b9-aba3-4fcf-8189-7aa071145d3c\",\"displayName\":\"App\\\\Events\\\\OpportunityTaskEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":10:{s:5:\\\"event\\\";O:31:\\\"App\\\\Events\\\\OpportunityTaskEvent\\\":5:{s:7:\\\"message\\\";s:47:\\\"A New Opportunity Task Has Been Assigned To You\\\";s:19:\\\"opportunity_task_id\\\";i:1;s:2:\\\"id\\\";i:9;s:4:\\\"type\\\";s:4:\\\"task\\\";s:6:\\\"socket\\\";N;}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919161, 1618919161),
(124, 'default', '{\"uuid\":\"d2707ce0-4cff-47a8-a787-21116cd99cfe\",\"displayName\":\"App\\\\Jobs\\\\SendEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmail\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\SendEmail\\\":11:{s:2:\\\"to\\\";s:21:\\\"hamed@onetecgroup.com\\\";s:8:\\\"template\\\";s:341:\\\"<p>Hi there,<\\/p><p>A new Task <strong>Ahmed mohamed<\\/strong> &nbsp;has been assigned to you by <strong>Ceo<\\/strong>.<\\/p><p>You can view this opportunity by logging in to the portal using the link below.<\\/p><p><br><a href=\\\"http:\\/\\/broker.test\\/sales\\/opportunities\\/1\\\"><strong>View Task<\\/strong><\\/a><br><br>Regards<br>The OneTecGroup CRM Team<\\/p>\\\";s:7:\\\"message\\\";s:33:\\\"Opportunity Task Has Been UPDATED\\\";s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919170, 1618919170),
(125, 'default', '{\"uuid\":\"5efb9265-e203-4321-bea7-50bc305b5715\",\"displayName\":\"App\\\\Events\\\\OpportunityTaskEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":10:{s:5:\\\"event\\\";O:31:\\\"App\\\\Events\\\\OpportunityTaskEvent\\\":5:{s:7:\\\"message\\\";s:47:\\\"A New Opportunity Task Has Been Assigned To You\\\";s:19:\\\"opportunity_task_id\\\";i:1;s:2:\\\"id\\\";i:1;s:4:\\\"type\\\";s:4:\\\"task\\\";s:6:\\\"socket\\\";N;}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919170, 1618919170),
(126, 'default', '{\"uuid\":\"8c3d3220-fd3d-4164-aa41-1b5970e02eb0\",\"displayName\":\"App\\\\Jobs\\\\SendEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmail\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\SendEmail\\\":11:{s:2:\\\"to\\\";s:21:\\\"shady@onetecgroup.com\\\";s:8:\\\"template\\\";s:341:\\\"<p>Hi there,<\\/p><p>A new Task <strong>Ahmed mohamed<\\/strong> &nbsp;has been assigned to you by <strong>Ceo<\\/strong>.<\\/p><p>You can view this opportunity by logging in to the portal using the link below.<\\/p><p><br><a href=\\\"http:\\/\\/broker.test\\/sales\\/opportunities\\/1\\\"><strong>View Task<\\/strong><\\/a><br><br>Regards<br>The OneTecGroup CRM Team<\\/p>\\\";s:7:\\\"message\\\";s:33:\\\"Opportunity Task Has Been UPDATED\\\";s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919170, 1618919170),
(127, 'default', '{\"uuid\":\"8ce22c35-200c-4f2e-b2a5-d7ec539d0f7e\",\"displayName\":\"App\\\\Events\\\\OpportunityTaskEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":10:{s:5:\\\"event\\\";O:31:\\\"App\\\\Events\\\\OpportunityTaskEvent\\\":5:{s:7:\\\"message\\\";s:47:\\\"A New Opportunity Task Has Been Assigned To You\\\";s:19:\\\"opportunity_task_id\\\";i:1;s:2:\\\"id\\\";i:2;s:4:\\\"type\\\";s:4:\\\"task\\\";s:6:\\\"socket\\\";N;}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919170, 1618919170),
(128, 'default', '{\"uuid\":\"d8ed26f5-497a-408e-a3ba-c22b7c2aa39b\",\"displayName\":\"App\\\\Jobs\\\\SendEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmail\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\SendEmail\\\":11:{s:2:\\\"to\\\";s:27:\\\"mohamedhamed01127@gmail.com\\\";s:8:\\\"template\\\";s:341:\\\"<p>Hi there,<\\/p><p>A new Task <strong>Ahmed mohamed<\\/strong> &nbsp;has been assigned to you by <strong>Ceo<\\/strong>.<\\/p><p>You can view this opportunity by logging in to the portal using the link below.<\\/p><p><br><a href=\\\"http:\\/\\/broker.test\\/sales\\/opportunities\\/1\\\"><strong>View Task<\\/strong><\\/a><br><br>Regards<br>The OneTecGroup CRM Team<\\/p>\\\";s:7:\\\"message\\\";s:33:\\\"Opportunity Task Has Been UPDATED\\\";s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919170, 1618919170),
(129, 'default', '{\"uuid\":\"9d514318-ba0a-4b86-923a-65e79a238d97\",\"displayName\":\"App\\\\Events\\\\OpportunityTaskEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":10:{s:5:\\\"event\\\";O:31:\\\"App\\\\Events\\\\OpportunityTaskEvent\\\":5:{s:7:\\\"message\\\";s:47:\\\"A New Opportunity Task Has Been Assigned To You\\\";s:19:\\\"opportunity_task_id\\\";i:1;s:2:\\\"id\\\";i:9;s:4:\\\"type\\\";s:4:\\\"task\\\";s:6:\\\"socket\\\";N;}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919170, 1618919170),
(130, 'default', '{\"uuid\":\"804663bc-b8b4-45b2-8de3-0a4186a09a29\",\"displayName\":\"App\\\\Jobs\\\\SendEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmail\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\SendEmail\\\":11:{s:2:\\\"to\\\";s:21:\\\"hamed@onetecgroup.com\\\";s:8:\\\"template\\\";s:341:\\\"<p>Hi there,<\\/p><p>A new Task <strong>Ahmed mohamed<\\/strong> &nbsp;has been assigned to you by <strong>Ceo<\\/strong>.<\\/p><p>You can view this opportunity by logging in to the portal using the link below.<\\/p><p><br><a href=\\\"http:\\/\\/broker.test\\/sales\\/opportunities\\/1\\\"><strong>View Task<\\/strong><\\/a><br><br>Regards<br>The OneTecGroup CRM Team<\\/p>\\\";s:7:\\\"message\\\";s:33:\\\"Opportunity Task Has Been UPDATED\\\";s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919182, 1618919182),
(131, 'default', '{\"uuid\":\"fcc917a6-cad9-4635-a2d8-29bc32b3d3dc\",\"displayName\":\"App\\\\Events\\\\OpportunityTaskEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":10:{s:5:\\\"event\\\";O:31:\\\"App\\\\Events\\\\OpportunityTaskEvent\\\":5:{s:7:\\\"message\\\";s:47:\\\"A New Opportunity Task Has Been Assigned To You\\\";s:19:\\\"opportunity_task_id\\\";i:1;s:2:\\\"id\\\";i:1;s:4:\\\"type\\\";s:4:\\\"task\\\";s:6:\\\"socket\\\";N;}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919182, 1618919182),
(132, 'default', '{\"uuid\":\"22d8db7e-bb5f-4021-921f-4acae0e24883\",\"displayName\":\"App\\\\Jobs\\\\SendEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmail\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\SendEmail\\\":11:{s:2:\\\"to\\\";s:27:\\\"mohamedhamed01127@gmail.com\\\";s:8:\\\"template\\\";s:341:\\\"<p>Hi there,<\\/p><p>A new Task <strong>Ahmed mohamed<\\/strong> &nbsp;has been assigned to you by <strong>Ceo<\\/strong>.<\\/p><p>You can view this opportunity by logging in to the portal using the link below.<\\/p><p><br><a href=\\\"http:\\/\\/broker.test\\/sales\\/opportunities\\/1\\\"><strong>View Task<\\/strong><\\/a><br><br>Regards<br>The OneTecGroup CRM Team<\\/p>\\\";s:7:\\\"message\\\";s:33:\\\"Opportunity Task Has Been UPDATED\\\";s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919182, 1618919182),
(133, 'default', '{\"uuid\":\"f353d58d-bd17-43d2-986b-cf21bcf69474\",\"displayName\":\"App\\\\Events\\\\OpportunityTaskEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":10:{s:5:\\\"event\\\";O:31:\\\"App\\\\Events\\\\OpportunityTaskEvent\\\":5:{s:7:\\\"message\\\";s:47:\\\"A New Opportunity Task Has Been Assigned To You\\\";s:19:\\\"opportunity_task_id\\\";i:1;s:2:\\\"id\\\";i:9;s:4:\\\"type\\\";s:4:\\\"task\\\";s:6:\\\"socket\\\";N;}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919182, 1618919182),
(134, 'default', '{\"uuid\":\"1f740441-d20b-46b4-b615-223727e59c5f\",\"displayName\":\"App\\\\Jobs\\\\SendEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmail\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\SendEmail\\\":11:{s:2:\\\"to\\\";s:27:\\\"mohamedhamed01127@gmail.com\\\";s:8:\\\"template\\\";s:341:\\\"<p>Hi there,<\\/p><p>A new Task <strong>Ahmed mohamed<\\/strong> &nbsp;has been assigned to you by <strong>Ceo<\\/strong>.<\\/p><p>You can view this opportunity by logging in to the portal using the link below.<\\/p><p><br><a href=\\\"http:\\/\\/broker.test\\/sales\\/opportunities\\/1\\\"><strong>View Task<\\/strong><\\/a><br><br>Regards<br>The OneTecGroup CRM Team<\\/p>\\\";s:7:\\\"message\\\";s:33:\\\"Opportunity Task Has Been UPDATED\\\";s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919189, 1618919189),
(135, 'default', '{\"uuid\":\"05b15626-3304-47ce-a927-9cf9f1b7ea32\",\"displayName\":\"App\\\\Events\\\\OpportunityTaskEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":10:{s:5:\\\"event\\\";O:31:\\\"App\\\\Events\\\\OpportunityTaskEvent\\\":5:{s:7:\\\"message\\\";s:47:\\\"A New Opportunity Task Has Been Assigned To You\\\";s:19:\\\"opportunity_task_id\\\";i:1;s:2:\\\"id\\\";i:9;s:4:\\\"type\\\";s:4:\\\"task\\\";s:6:\\\"socket\\\";N;}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919189, 1618919189),
(136, 'default', '{\"uuid\":\"9b8f07ff-ccc7-4fdb-ab7d-297d038c00e4\",\"displayName\":\"App\\\\Jobs\\\\SendEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmail\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\SendEmail\\\":11:{s:2:\\\"to\\\";s:21:\\\"shady@onetecgroup.com\\\";s:8:\\\"template\\\";s:341:\\\"<p>Hi there,<\\/p><p>A new Task <strong>Ahmed mohamed<\\/strong> &nbsp;has been assigned to you by <strong>Ceo<\\/strong>.<\\/p><p>You can view this opportunity by logging in to the portal using the link below.<\\/p><p><br><a href=\\\"http:\\/\\/broker.test\\/sales\\/opportunities\\/1\\\"><strong>View Task<\\/strong><\\/a><br><br>Regards<br>The OneTecGroup CRM Team<\\/p>\\\";s:7:\\\"message\\\";s:33:\\\"Opportunity Task Has Been UPDATED\\\";s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919197, 1618919197);
INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(137, 'default', '{\"uuid\":\"05010d93-ff8e-481c-9ea7-e98f783a777d\",\"displayName\":\"App\\\\Events\\\\OpportunityTaskEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":10:{s:5:\\\"event\\\";O:31:\\\"App\\\\Events\\\\OpportunityTaskEvent\\\":5:{s:7:\\\"message\\\";s:47:\\\"A New Opportunity Task Has Been Assigned To You\\\";s:19:\\\"opportunity_task_id\\\";i:1;s:2:\\\"id\\\";i:2;s:4:\\\"type\\\";s:4:\\\"task\\\";s:6:\\\"socket\\\";N;}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919197, 1618919197),
(138, 'default', '{\"uuid\":\"f2a85cd0-22e8-401a-a06f-5531b1876c93\",\"displayName\":\"App\\\\Jobs\\\\SendEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmail\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\SendEmail\\\":11:{s:2:\\\"to\\\";s:27:\\\"mohamedhamed01127@gmail.com\\\";s:8:\\\"template\\\";s:341:\\\"<p>Hi there,<\\/p><p>A new Task <strong>Ahmed mohamed<\\/strong> &nbsp;has been assigned to you by <strong>Ceo<\\/strong>.<\\/p><p>You can view this opportunity by logging in to the portal using the link below.<\\/p><p><br><a href=\\\"http:\\/\\/broker.test\\/sales\\/opportunities\\/1\\\"><strong>View Task<\\/strong><\\/a><br><br>Regards<br>The OneTecGroup CRM Team<\\/p>\\\";s:7:\\\"message\\\";s:33:\\\"Opportunity Task Has Been UPDATED\\\";s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919197, 1618919197),
(139, 'default', '{\"uuid\":\"18804c31-a167-4a82-99f2-a6ef0176713b\",\"displayName\":\"App\\\\Events\\\\OpportunityTaskEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":10:{s:5:\\\"event\\\";O:31:\\\"App\\\\Events\\\\OpportunityTaskEvent\\\":5:{s:7:\\\"message\\\";s:47:\\\"A New Opportunity Task Has Been Assigned To You\\\";s:19:\\\"opportunity_task_id\\\";i:1;s:2:\\\"id\\\";i:9;s:4:\\\"type\\\";s:4:\\\"task\\\";s:6:\\\"socket\\\";N;}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919197, 1618919197),
(140, 'default', '{\"uuid\":\"60e52cef-248a-46ef-8349-c3216289b3be\",\"displayName\":\"App\\\\Jobs\\\\SendEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmail\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\SendEmail\\\":11:{s:2:\\\"to\\\";s:21:\\\"hamed@onetecgroup.com\\\";s:8:\\\"template\\\";s:341:\\\"<p>Hi there,<\\/p><p>A new Task <strong>Ahmed mohamed<\\/strong> &nbsp;has been assigned to you by <strong>Ceo<\\/strong>.<\\/p><p>You can view this opportunity by logging in to the portal using the link below.<\\/p><p><br><a href=\\\"http:\\/\\/broker.test\\/sales\\/opportunities\\/1\\\"><strong>View Task<\\/strong><\\/a><br><br>Regards<br>The OneTecGroup CRM Team<\\/p>\\\";s:7:\\\"message\\\";s:33:\\\"Opportunity Task Has Been UPDATED\\\";s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919213, 1618919213),
(141, 'default', '{\"uuid\":\"82bb6479-d14b-477e-80af-5333b5012b65\",\"displayName\":\"App\\\\Events\\\\OpportunityTaskEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":10:{s:5:\\\"event\\\";O:31:\\\"App\\\\Events\\\\OpportunityTaskEvent\\\":5:{s:7:\\\"message\\\";s:47:\\\"A New Opportunity Task Has Been Assigned To You\\\";s:19:\\\"opportunity_task_id\\\";i:1;s:2:\\\"id\\\";i:1;s:4:\\\"type\\\";s:4:\\\"task\\\";s:6:\\\"socket\\\";N;}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919213, 1618919213),
(142, 'default', '{\"uuid\":\"d9fdb65f-3323-4640-a625-72ec65ddfd85\",\"displayName\":\"App\\\\Jobs\\\\SendEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmail\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\SendEmail\\\":11:{s:2:\\\"to\\\";s:27:\\\"mohamedhamed01127@gmail.com\\\";s:8:\\\"template\\\";s:341:\\\"<p>Hi there,<\\/p><p>A new Task <strong>Ahmed mohamed<\\/strong> &nbsp;has been assigned to you by <strong>Ceo<\\/strong>.<\\/p><p>You can view this opportunity by logging in to the portal using the link below.<\\/p><p><br><a href=\\\"http:\\/\\/broker.test\\/sales\\/opportunities\\/1\\\"><strong>View Task<\\/strong><\\/a><br><br>Regards<br>The OneTecGroup CRM Team<\\/p>\\\";s:7:\\\"message\\\";s:33:\\\"Opportunity Task Has Been UPDATED\\\";s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919213, 1618919213),
(143, 'default', '{\"uuid\":\"d65d3de1-5987-4fcf-bfe0-ac54f569a646\",\"displayName\":\"App\\\\Events\\\\OpportunityTaskEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":10:{s:5:\\\"event\\\";O:31:\\\"App\\\\Events\\\\OpportunityTaskEvent\\\":5:{s:7:\\\"message\\\";s:47:\\\"A New Opportunity Task Has Been Assigned To You\\\";s:19:\\\"opportunity_task_id\\\";i:1;s:2:\\\"id\\\";i:9;s:4:\\\"type\\\";s:4:\\\"task\\\";s:6:\\\"socket\\\";N;}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919213, 1618919213),
(144, 'default', '{\"uuid\":\"9cc00cbe-8704-4e51-8410-d5783601eef3\",\"displayName\":\"App\\\\Jobs\\\\SendEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmail\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\SendEmail\\\":11:{s:2:\\\"to\\\";s:21:\\\"hamed@onetecgroup.com\\\";s:8:\\\"template\\\";s:341:\\\"<p>Hi there,<\\/p><p>A new Task <strong>Ahmed mohamed<\\/strong> &nbsp;has been assigned to you by <strong>Ceo<\\/strong>.<\\/p><p>You can view this opportunity by logging in to the portal using the link below.<\\/p><p><br><a href=\\\"http:\\/\\/broker.test\\/sales\\/opportunities\\/1\\\"><strong>View Task<\\/strong><\\/a><br><br>Regards<br>The OneTecGroup CRM Team<\\/p>\\\";s:7:\\\"message\\\";s:33:\\\"Opportunity Task Has Been UPDATED\\\";s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919227, 1618919227),
(145, 'default', '{\"uuid\":\"af57ab10-f712-4ac2-b4bd-79b30717c53d\",\"displayName\":\"App\\\\Events\\\\OpportunityTaskEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":10:{s:5:\\\"event\\\";O:31:\\\"App\\\\Events\\\\OpportunityTaskEvent\\\":5:{s:7:\\\"message\\\";s:47:\\\"A New Opportunity Task Has Been Assigned To You\\\";s:19:\\\"opportunity_task_id\\\";i:1;s:2:\\\"id\\\";i:1;s:4:\\\"type\\\";s:4:\\\"task\\\";s:6:\\\"socket\\\";N;}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919227, 1618919227),
(146, 'default', '{\"uuid\":\"962e8b2b-6f05-4b4f-ac65-741aa5224166\",\"displayName\":\"App\\\\Jobs\\\\SendEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmail\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\SendEmail\\\":11:{s:2:\\\"to\\\";s:27:\\\"mohamedhamed01127@gmail.com\\\";s:8:\\\"template\\\";s:341:\\\"<p>Hi there,<\\/p><p>A new Task <strong>Ahmed mohamed<\\/strong> &nbsp;has been assigned to you by <strong>Ceo<\\/strong>.<\\/p><p>You can view this opportunity by logging in to the portal using the link below.<\\/p><p><br><a href=\\\"http:\\/\\/broker.test\\/sales\\/opportunities\\/1\\\"><strong>View Task<\\/strong><\\/a><br><br>Regards<br>The OneTecGroup CRM Team<\\/p>\\\";s:7:\\\"message\\\";s:33:\\\"Opportunity Task Has Been UPDATED\\\";s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919227, 1618919227),
(147, 'default', '{\"uuid\":\"1a9df699-2910-45f3-9da6-7dac2ed19ba3\",\"displayName\":\"App\\\\Events\\\\OpportunityTaskEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":10:{s:5:\\\"event\\\";O:31:\\\"App\\\\Events\\\\OpportunityTaskEvent\\\":5:{s:7:\\\"message\\\";s:47:\\\"A New Opportunity Task Has Been Assigned To You\\\";s:19:\\\"opportunity_task_id\\\";i:1;s:2:\\\"id\\\";i:9;s:4:\\\"type\\\";s:4:\\\"task\\\";s:6:\\\"socket\\\";N;}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919227, 1618919227),
(148, 'default', '{\"uuid\":\"7df1ceb6-ef7d-4e4b-99a6-5215a981544b\",\"displayName\":\"App\\\\Jobs\\\\SendEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmail\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\SendEmail\\\":11:{s:2:\\\"to\\\";s:27:\\\"mohamedhamed01127@gmail.com\\\";s:8:\\\"template\\\";s:341:\\\"<p>Hi there,<\\/p><p>A new Task <strong>Ahmed mohamed<\\/strong> &nbsp;has been assigned to you by <strong>Ceo<\\/strong>.<\\/p><p>You can view this opportunity by logging in to the portal using the link below.<\\/p><p><br><a href=\\\"http:\\/\\/broker.test\\/sales\\/opportunities\\/1\\\"><strong>View Task<\\/strong><\\/a><br><br>Regards<br>The OneTecGroup CRM Team<\\/p>\\\";s:7:\\\"message\\\";s:33:\\\"Opportunity Task Has Been UPDATED\\\";s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919233, 1618919233),
(149, 'default', '{\"uuid\":\"3f5cce24-ddeb-46dd-8ff3-ad601f2c40f7\",\"displayName\":\"App\\\\Events\\\\OpportunityTaskEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":10:{s:5:\\\"event\\\";O:31:\\\"App\\\\Events\\\\OpportunityTaskEvent\\\":5:{s:7:\\\"message\\\";s:47:\\\"A New Opportunity Task Has Been Assigned To You\\\";s:19:\\\"opportunity_task_id\\\";i:1;s:2:\\\"id\\\";i:9;s:4:\\\"type\\\";s:4:\\\"task\\\";s:6:\\\"socket\\\";N;}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919233, 1618919233),
(150, 'default', '{\"uuid\":\"7f75116e-c938-4c6e-903e-c03e49679247\",\"displayName\":\"App\\\\Jobs\\\\SendEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmail\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\SendEmail\\\":11:{s:2:\\\"to\\\";s:21:\\\"shady@onetecgroup.com\\\";s:8:\\\"template\\\";s:341:\\\"<p>Hi there,<\\/p><p>A new Task <strong>Ahmed mohamed<\\/strong> &nbsp;has been assigned to you by <strong>Ceo<\\/strong>.<\\/p><p>You can view this opportunity by logging in to the portal using the link below.<\\/p><p><br><a href=\\\"http:\\/\\/broker.test\\/sales\\/opportunities\\/1\\\"><strong>View Task<\\/strong><\\/a><br><br>Regards<br>The OneTecGroup CRM Team<\\/p>\\\";s:7:\\\"message\\\";s:33:\\\"Opportunity Task Has Been UPDATED\\\";s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919542, 1618919542),
(151, 'default', '{\"uuid\":\"2c88b07d-319f-44b6-a068-d71812035cdf\",\"displayName\":\"App\\\\Events\\\\OpportunityTaskEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":10:{s:5:\\\"event\\\";O:31:\\\"App\\\\Events\\\\OpportunityTaskEvent\\\":5:{s:7:\\\"message\\\";s:47:\\\"A New Opportunity Task Has Been Assigned To You\\\";s:19:\\\"opportunity_task_id\\\";i:1;s:2:\\\"id\\\";i:2;s:4:\\\"type\\\";s:4:\\\"task\\\";s:6:\\\"socket\\\";N;}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919542, 1618919542),
(152, 'default', '{\"uuid\":\"7fb0af7b-3d0b-4ab4-adde-2defefec30dc\",\"displayName\":\"App\\\\Jobs\\\\SendEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmail\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\SendEmail\\\":11:{s:2:\\\"to\\\";s:27:\\\"mohamedhamed01127@gmail.com\\\";s:8:\\\"template\\\";s:341:\\\"<p>Hi there,<\\/p><p>A new Task <strong>Ahmed mohamed<\\/strong> &nbsp;has been assigned to you by <strong>Ceo<\\/strong>.<\\/p><p>You can view this opportunity by logging in to the portal using the link below.<\\/p><p><br><a href=\\\"http:\\/\\/broker.test\\/sales\\/opportunities\\/1\\\"><strong>View Task<\\/strong><\\/a><br><br>Regards<br>The OneTecGroup CRM Team<\\/p>\\\";s:7:\\\"message\\\";s:33:\\\"Opportunity Task Has Been UPDATED\\\";s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919542, 1618919542),
(153, 'default', '{\"uuid\":\"abfe0863-6d82-48e3-be64-5299913ce256\",\"displayName\":\"App\\\\Events\\\\OpportunityTaskEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":10:{s:5:\\\"event\\\";O:31:\\\"App\\\\Events\\\\OpportunityTaskEvent\\\":5:{s:7:\\\"message\\\";s:47:\\\"A New Opportunity Task Has Been Assigned To You\\\";s:19:\\\"opportunity_task_id\\\";i:1;s:2:\\\"id\\\";i:9;s:4:\\\"type\\\";s:4:\\\"task\\\";s:6:\\\"socket\\\";N;}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919542, 1618919542),
(154, 'default', '{\"uuid\":\"5711cc0e-0e49-4e15-b6a8-62e3ab909077\",\"displayName\":\"App\\\\Jobs\\\\SendEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmail\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\SendEmail\\\":11:{s:2:\\\"to\\\";s:21:\\\"shady@onetecgroup.com\\\";s:8:\\\"template\\\";s:341:\\\"<p>Hi there,<\\/p><p>A new Task <strong>Ahmed mohamed<\\/strong> &nbsp;has been assigned to you by <strong>Ceo<\\/strong>.<\\/p><p>You can view this opportunity by logging in to the portal using the link below.<\\/p><p><br><a href=\\\"http:\\/\\/broker.test\\/sales\\/opportunities\\/1\\\"><strong>View Task<\\/strong><\\/a><br><br>Regards<br>The OneTecGroup CRM Team<\\/p>\\\";s:7:\\\"message\\\";s:33:\\\"Opportunity Task Has Been UPDATED\\\";s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919555, 1618919555),
(155, 'default', '{\"uuid\":\"a388b11c-2944-4db1-bd1c-8cc4d619f831\",\"displayName\":\"App\\\\Events\\\\OpportunityTaskEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":10:{s:5:\\\"event\\\";O:31:\\\"App\\\\Events\\\\OpportunityTaskEvent\\\":5:{s:7:\\\"message\\\";s:47:\\\"A New Opportunity Task Has Been Assigned To You\\\";s:19:\\\"opportunity_task_id\\\";i:1;s:2:\\\"id\\\";i:2;s:4:\\\"type\\\";s:4:\\\"task\\\";s:6:\\\"socket\\\";N;}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919555, 1618919555),
(156, 'default', '{\"uuid\":\"baacc96d-d77c-4a4d-a7bf-53e1a723a179\",\"displayName\":\"App\\\\Jobs\\\\SendEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmail\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\SendEmail\\\":11:{s:2:\\\"to\\\";s:27:\\\"mohamedhamed01127@gmail.com\\\";s:8:\\\"template\\\";s:341:\\\"<p>Hi there,<\\/p><p>A new Task <strong>Ahmed mohamed<\\/strong> &nbsp;has been assigned to you by <strong>Ceo<\\/strong>.<\\/p><p>You can view this opportunity by logging in to the portal using the link below.<\\/p><p><br><a href=\\\"http:\\/\\/broker.test\\/sales\\/opportunities\\/1\\\"><strong>View Task<\\/strong><\\/a><br><br>Regards<br>The OneTecGroup CRM Team<\\/p>\\\";s:7:\\\"message\\\";s:33:\\\"Opportunity Task Has Been UPDATED\\\";s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919555, 1618919555),
(157, 'default', '{\"uuid\":\"182475f2-e197-49d8-a255-c67e404f875f\",\"displayName\":\"App\\\\Events\\\\OpportunityTaskEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":10:{s:5:\\\"event\\\";O:31:\\\"App\\\\Events\\\\OpportunityTaskEvent\\\":5:{s:7:\\\"message\\\";s:47:\\\"A New Opportunity Task Has Been Assigned To You\\\";s:19:\\\"opportunity_task_id\\\";i:1;s:2:\\\"id\\\";i:9;s:4:\\\"type\\\";s:4:\\\"task\\\";s:6:\\\"socket\\\";N;}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919555, 1618919555),
(158, 'default', '{\"uuid\":\"42458dc1-5cbe-40ff-8b25-87f15cb2f31f\",\"displayName\":\"App\\\\Jobs\\\\SendEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmail\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\SendEmail\\\":11:{s:2:\\\"to\\\";s:21:\\\"shady@onetecgroup.com\\\";s:8:\\\"template\\\";s:341:\\\"<p>Hi there,<\\/p><p>A new Task <strong>Ahmed mohamed<\\/strong> &nbsp;has been assigned to you by <strong>Ceo<\\/strong>.<\\/p><p>You can view this opportunity by logging in to the portal using the link below.<\\/p><p><br><a href=\\\"http:\\/\\/broker.test\\/sales\\/opportunities\\/1\\\"><strong>View Task<\\/strong><\\/a><br><br>Regards<br>The OneTecGroup CRM Team<\\/p>\\\";s:7:\\\"message\\\";s:33:\\\"Opportunity Task Has Been UPDATED\\\";s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919561, 1618919561),
(159, 'default', '{\"uuid\":\"022a7311-ceb3-4970-8652-7e8754de09ce\",\"displayName\":\"App\\\\Events\\\\OpportunityTaskEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":10:{s:5:\\\"event\\\";O:31:\\\"App\\\\Events\\\\OpportunityTaskEvent\\\":5:{s:7:\\\"message\\\";s:47:\\\"A New Opportunity Task Has Been Assigned To You\\\";s:19:\\\"opportunity_task_id\\\";i:1;s:2:\\\"id\\\";i:2;s:4:\\\"type\\\";s:4:\\\"task\\\";s:6:\\\"socket\\\";N;}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919561, 1618919561),
(160, 'default', '{\"uuid\":\"9555e150-22b6-4a0f-ac1a-a246c706c92d\",\"displayName\":\"App\\\\Jobs\\\\SendEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmail\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\SendEmail\\\":11:{s:2:\\\"to\\\";s:27:\\\"mohamedhamed01127@gmail.com\\\";s:8:\\\"template\\\";s:341:\\\"<p>Hi there,<\\/p><p>A new Task <strong>Ahmed mohamed<\\/strong> &nbsp;has been assigned to you by <strong>Ceo<\\/strong>.<\\/p><p>You can view this opportunity by logging in to the portal using the link below.<\\/p><p><br><a href=\\\"http:\\/\\/broker.test\\/sales\\/opportunities\\/1\\\"><strong>View Task<\\/strong><\\/a><br><br>Regards<br>The OneTecGroup CRM Team<\\/p>\\\";s:7:\\\"message\\\";s:33:\\\"Opportunity Task Has Been UPDATED\\\";s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919561, 1618919561),
(161, 'default', '{\"uuid\":\"550b3482-a0b7-4a46-b37d-c28741f86b92\",\"displayName\":\"App\\\\Events\\\\OpportunityTaskEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":10:{s:5:\\\"event\\\";O:31:\\\"App\\\\Events\\\\OpportunityTaskEvent\\\":5:{s:7:\\\"message\\\";s:47:\\\"A New Opportunity Task Has Been Assigned To You\\\";s:19:\\\"opportunity_task_id\\\";i:1;s:2:\\\"id\\\";i:9;s:4:\\\"type\\\";s:4:\\\"task\\\";s:6:\\\"socket\\\";N;}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919561, 1618919561),
(162, 'default', '{\"uuid\":\"1c072d11-52ed-4de4-9b28-c829345ea663\",\"displayName\":\"App\\\\Jobs\\\\SendEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmail\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\SendEmail\\\":11:{s:2:\\\"to\\\";s:21:\\\"hamed@onetecgroup.com\\\";s:8:\\\"template\\\";s:341:\\\"<p>Hi there,<\\/p><p>A new Task <strong>Ahmed mohamed<\\/strong> &nbsp;has been assigned to you by <strong>Ceo<\\/strong>.<\\/p><p>You can view this opportunity by logging in to the portal using the link below.<\\/p><p><br><a href=\\\"http:\\/\\/broker.test\\/sales\\/opportunities\\/1\\\"><strong>View Task<\\/strong><\\/a><br><br>Regards<br>The OneTecGroup CRM Team<\\/p>\\\";s:7:\\\"message\\\";s:33:\\\"Opportunity Task Has Been UPDATED\\\";s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919655, 1618919655),
(163, 'default', '{\"uuid\":\"eecc63ae-07db-41ae-9c53-74b58be2378a\",\"displayName\":\"App\\\\Events\\\\OpportunityTaskEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":10:{s:5:\\\"event\\\";O:31:\\\"App\\\\Events\\\\OpportunityTaskEvent\\\":5:{s:7:\\\"message\\\";s:47:\\\"A New Opportunity Task Has Been Assigned To You\\\";s:19:\\\"opportunity_task_id\\\";i:1;s:2:\\\"id\\\";i:1;s:4:\\\"type\\\";s:4:\\\"task\\\";s:6:\\\"socket\\\";N;}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919655, 1618919655),
(164, 'default', '{\"uuid\":\"25dd436e-fdbd-4b1f-8032-eff6d3f4fdce\",\"displayName\":\"App\\\\Jobs\\\\SendEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmail\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\SendEmail\\\":11:{s:2:\\\"to\\\";s:21:\\\"shady@onetecgroup.com\\\";s:8:\\\"template\\\";s:341:\\\"<p>Hi there,<\\/p><p>A new Task <strong>Ahmed mohamed<\\/strong> &nbsp;has been assigned to you by <strong>Ceo<\\/strong>.<\\/p><p>You can view this opportunity by logging in to the portal using the link below.<\\/p><p><br><a href=\\\"http:\\/\\/broker.test\\/sales\\/opportunities\\/1\\\"><strong>View Task<\\/strong><\\/a><br><br>Regards<br>The OneTecGroup CRM Team<\\/p>\\\";s:7:\\\"message\\\";s:33:\\\"Opportunity Task Has Been UPDATED\\\";s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919655, 1618919655),
(165, 'default', '{\"uuid\":\"f7b18cfb-9614-4f78-b548-6dd88c8dcc2d\",\"displayName\":\"App\\\\Events\\\\OpportunityTaskEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":10:{s:5:\\\"event\\\";O:31:\\\"App\\\\Events\\\\OpportunityTaskEvent\\\":5:{s:7:\\\"message\\\";s:47:\\\"A New Opportunity Task Has Been Assigned To You\\\";s:19:\\\"opportunity_task_id\\\";i:1;s:2:\\\"id\\\";i:2;s:4:\\\"type\\\";s:4:\\\"task\\\";s:6:\\\"socket\\\";N;}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919655, 1618919655),
(166, 'default', '{\"uuid\":\"65b2ea06-a294-47ee-8c69-d632e0a84ce3\",\"displayName\":\"App\\\\Jobs\\\\SendEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmail\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\SendEmail\\\":11:{s:2:\\\"to\\\";s:27:\\\"mohamedhamed01127@gmail.com\\\";s:8:\\\"template\\\";s:341:\\\"<p>Hi there,<\\/p><p>A new Task <strong>Ahmed mohamed<\\/strong> &nbsp;has been assigned to you by <strong>Ceo<\\/strong>.<\\/p><p>You can view this opportunity by logging in to the portal using the link below.<\\/p><p><br><a href=\\\"http:\\/\\/broker.test\\/sales\\/opportunities\\/1\\\"><strong>View Task<\\/strong><\\/a><br><br>Regards<br>The OneTecGroup CRM Team<\\/p>\\\";s:7:\\\"message\\\";s:33:\\\"Opportunity Task Has Been UPDATED\\\";s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919655, 1618919655),
(167, 'default', '{\"uuid\":\"10966d92-05cf-499f-97b9-333e70027bc4\",\"displayName\":\"App\\\\Events\\\\OpportunityTaskEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":10:{s:5:\\\"event\\\";O:31:\\\"App\\\\Events\\\\OpportunityTaskEvent\\\":5:{s:7:\\\"message\\\";s:47:\\\"A New Opportunity Task Has Been Assigned To You\\\";s:19:\\\"opportunity_task_id\\\";i:1;s:2:\\\"id\\\";i:9;s:4:\\\"type\\\";s:4:\\\"task\\\";s:6:\\\"socket\\\";N;}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919655, 1618919655),
(168, 'default', '{\"uuid\":\"193f1d61-5c03-4cb0-91de-33e87f3b343e\",\"displayName\":\"App\\\\Jobs\\\\SendEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmail\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\SendEmail\\\":11:{s:2:\\\"to\\\";s:21:\\\"shady@onetecgroup.com\\\";s:8:\\\"template\\\";s:341:\\\"<p>Hi there,<\\/p><p>A new Task <strong>Ahmed mohamed<\\/strong> &nbsp;has been assigned to you by <strong>Ceo<\\/strong>.<\\/p><p>You can view this opportunity by logging in to the portal using the link below.<\\/p><p><br><a href=\\\"http:\\/\\/broker.test\\/sales\\/opportunities\\/1\\\"><strong>View Task<\\/strong><\\/a><br><br>Regards<br>The OneTecGroup CRM Team<\\/p>\\\";s:7:\\\"message\\\";s:33:\\\"Opportunity Task Has Been UPDATED\\\";s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919977, 1618919977),
(169, 'default', '{\"uuid\":\"3573f619-943b-4cf5-aac3-33d7b5e88700\",\"displayName\":\"App\\\\Events\\\\OpportunityTaskEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":10:{s:5:\\\"event\\\";O:31:\\\"App\\\\Events\\\\OpportunityTaskEvent\\\":5:{s:7:\\\"message\\\";s:47:\\\"A New Opportunity Task Has Been Assigned To You\\\";s:19:\\\"opportunity_task_id\\\";i:5;s:2:\\\"id\\\";i:2;s:4:\\\"type\\\";s:4:\\\"task\\\";s:6:\\\"socket\\\";N;}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919977, 1618919977),
(170, 'default', '{\"uuid\":\"49252113-3359-448d-a31f-d90886fb2d9e\",\"displayName\":\"App\\\\Jobs\\\\SendEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmail\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\SendEmail\\\":11:{s:2:\\\"to\\\";s:27:\\\"mohamedhamed01127@gmail.com\\\";s:8:\\\"template\\\";s:341:\\\"<p>Hi there,<\\/p><p>A new Task <strong>Ahmed mohamed<\\/strong> &nbsp;has been assigned to you by <strong>Ceo<\\/strong>.<\\/p><p>You can view this opportunity by logging in to the portal using the link below.<\\/p><p><br><a href=\\\"http:\\/\\/broker.test\\/sales\\/opportunities\\/1\\\"><strong>View Task<\\/strong><\\/a><br><br>Regards<br>The OneTecGroup CRM Team<\\/p>\\\";s:7:\\\"message\\\";s:33:\\\"Opportunity Task Has Been UPDATED\\\";s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919977, 1618919977),
(171, 'default', '{\"uuid\":\"2d38576f-738d-43e3-980f-dd41bafda756\",\"displayName\":\"App\\\\Events\\\\OpportunityTaskEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":10:{s:5:\\\"event\\\";O:31:\\\"App\\\\Events\\\\OpportunityTaskEvent\\\":5:{s:7:\\\"message\\\";s:47:\\\"A New Opportunity Task Has Been Assigned To You\\\";s:19:\\\"opportunity_task_id\\\";i:5;s:2:\\\"id\\\";i:9;s:4:\\\"type\\\";s:4:\\\"task\\\";s:6:\\\"socket\\\";N;}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919977, 1618919977),
(172, 'default', '{\"uuid\":\"fe1edf16-0db3-4450-8b0d-e1b191de89d1\",\"displayName\":\"App\\\\Jobs\\\\SendEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmail\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\SendEmail\\\":11:{s:2:\\\"to\\\";s:21:\\\"shady@onetecgroup.com\\\";s:8:\\\"template\\\";s:341:\\\"<p>Hi there,<\\/p><p>A new Task <strong>Ahmed mohamed<\\/strong> &nbsp;has been assigned to you by <strong>Ceo<\\/strong>.<\\/p><p>You can view this opportunity by logging in to the portal using the link below.<\\/p><p><br><a href=\\\"http:\\/\\/broker.test\\/sales\\/opportunities\\/1\\\"><strong>View Task<\\/strong><\\/a><br><br>Regards<br>The OneTecGroup CRM Team<\\/p>\\\";s:7:\\\"message\\\";s:33:\\\"Opportunity Task Has Been UPDATED\\\";s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919985, 1618919985),
(173, 'default', '{\"uuid\":\"f8d7d8cb-9441-4501-a227-831679f85229\",\"displayName\":\"App\\\\Events\\\\OpportunityTaskEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":10:{s:5:\\\"event\\\";O:31:\\\"App\\\\Events\\\\OpportunityTaskEvent\\\":5:{s:7:\\\"message\\\";s:47:\\\"A New Opportunity Task Has Been Assigned To You\\\";s:19:\\\"opportunity_task_id\\\";i:5;s:2:\\\"id\\\";i:2;s:4:\\\"type\\\";s:4:\\\"task\\\";s:6:\\\"socket\\\";N;}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919985, 1618919985),
(174, 'default', '{\"uuid\":\"676515c4-cb1a-4d26-8c53-a0d0a2dc5aad\",\"displayName\":\"App\\\\Jobs\\\\SendEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmail\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\SendEmail\\\":11:{s:2:\\\"to\\\";s:27:\\\"mohamedhamed01127@gmail.com\\\";s:8:\\\"template\\\";s:341:\\\"<p>Hi there,<\\/p><p>A new Task <strong>Ahmed mohamed<\\/strong> &nbsp;has been assigned to you by <strong>Ceo<\\/strong>.<\\/p><p>You can view this opportunity by logging in to the portal using the link below.<\\/p><p><br><a href=\\\"http:\\/\\/broker.test\\/sales\\/opportunities\\/1\\\"><strong>View Task<\\/strong><\\/a><br><br>Regards<br>The OneTecGroup CRM Team<\\/p>\\\";s:7:\\\"message\\\";s:33:\\\"Opportunity Task Has Been UPDATED\\\";s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919985, 1618919985),
(175, 'default', '{\"uuid\":\"207b9a78-d10d-4ef8-90e1-c37d77037849\",\"displayName\":\"App\\\\Events\\\\OpportunityTaskEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":10:{s:5:\\\"event\\\";O:31:\\\"App\\\\Events\\\\OpportunityTaskEvent\\\":5:{s:7:\\\"message\\\";s:47:\\\"A New Opportunity Task Has Been Assigned To You\\\";s:19:\\\"opportunity_task_id\\\";i:5;s:2:\\\"id\\\";i:9;s:4:\\\"type\\\";s:4:\\\"task\\\";s:6:\\\"socket\\\";N;}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919985, 1618919985),
(176, 'default', '{\"uuid\":\"95c6f239-0629-4673-bb0c-dbeb9fc13e9d\",\"displayName\":\"App\\\\Jobs\\\\SendEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmail\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\SendEmail\\\":11:{s:2:\\\"to\\\";s:21:\\\"hamed@onetecgroup.com\\\";s:8:\\\"template\\\";s:341:\\\"<p>Hi there,<\\/p><p>A new Task <strong>Ahmed mohamed<\\/strong> &nbsp;has been assigned to you by <strong>Ceo<\\/strong>.<\\/p><p>You can view this opportunity by logging in to the portal using the link below.<\\/p><p><br><a href=\\\"http:\\/\\/broker.test\\/sales\\/opportunities\\/1\\\"><strong>View Task<\\/strong><\\/a><br><br>Regards<br>The OneTecGroup CRM Team<\\/p>\\\";s:7:\\\"message\\\";s:33:\\\"Opportunity Task Has Been UPDATED\\\";s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919992, 1618919992),
(177, 'default', '{\"uuid\":\"0b8b79e4-4b46-4be4-8c15-828dd7a67d96\",\"displayName\":\"App\\\\Events\\\\OpportunityTaskEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":10:{s:5:\\\"event\\\";O:31:\\\"App\\\\Events\\\\OpportunityTaskEvent\\\":5:{s:7:\\\"message\\\";s:47:\\\"A New Opportunity Task Has Been Assigned To You\\\";s:19:\\\"opportunity_task_id\\\";i:1;s:2:\\\"id\\\";i:1;s:4:\\\"type\\\";s:4:\\\"task\\\";s:6:\\\"socket\\\";N;}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919992, 1618919992),
(178, 'default', '{\"uuid\":\"b8a874dd-a4df-4ebd-82f1-0869cc0f68f7\",\"displayName\":\"App\\\\Jobs\\\\SendEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmail\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\SendEmail\\\":11:{s:2:\\\"to\\\";s:27:\\\"mohamedhamed01127@gmail.com\\\";s:8:\\\"template\\\";s:341:\\\"<p>Hi there,<\\/p><p>A new Task <strong>Ahmed mohamed<\\/strong> &nbsp;has been assigned to you by <strong>Ceo<\\/strong>.<\\/p><p>You can view this opportunity by logging in to the portal using the link below.<\\/p><p><br><a href=\\\"http:\\/\\/broker.test\\/sales\\/opportunities\\/1\\\"><strong>View Task<\\/strong><\\/a><br><br>Regards<br>The OneTecGroup CRM Team<\\/p>\\\";s:7:\\\"message\\\";s:33:\\\"Opportunity Task Has Been UPDATED\\\";s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919992, 1618919992),
(179, 'default', '{\"uuid\":\"efaf8955-1d8c-4fa9-8249-7f8a83ac4e74\",\"displayName\":\"App\\\\Events\\\\OpportunityTaskEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":10:{s:5:\\\"event\\\";O:31:\\\"App\\\\Events\\\\OpportunityTaskEvent\\\":5:{s:7:\\\"message\\\";s:47:\\\"A New Opportunity Task Has Been Assigned To You\\\";s:19:\\\"opportunity_task_id\\\";i:1;s:2:\\\"id\\\";i:9;s:4:\\\"type\\\";s:4:\\\"task\\\";s:6:\\\"socket\\\";N;}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618919992, 1618919992),
(180, 'default', '{\"uuid\":\"231a012c-a156-497a-bad3-977dd03f093b\",\"displayName\":\"App\\\\Jobs\\\\SendEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmail\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\SendEmail\\\":11:{s:2:\\\"to\\\";s:27:\\\"mohamedhamed01127@gmail.com\\\";s:8:\\\"template\\\";s:341:\\\"<p>Hi there,<\\/p><p>A new Task <strong>Ahmed mohamed<\\/strong> &nbsp;has been assigned to you by <strong>Ceo<\\/strong>.<\\/p><p>You can view this opportunity by logging in to the portal using the link below.<\\/p><p><br><a href=\\\"http:\\/\\/broker.test\\/sales\\/opportunities\\/1\\\"><strong>View Task<\\/strong><\\/a><br><br>Regards<br>The OneTecGroup CRM Team<\\/p>\\\";s:7:\\\"message\\\";s:33:\\\"Opportunity Task Has Been UPDATED\\\";s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618920000, 1618920000),
(181, 'default', '{\"uuid\":\"f0149626-1666-4e2f-89e8-827eeb358a53\",\"displayName\":\"App\\\\Events\\\\OpportunityTaskEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":10:{s:5:\\\"event\\\";O:31:\\\"App\\\\Events\\\\OpportunityTaskEvent\\\":5:{s:7:\\\"message\\\";s:47:\\\"A New Opportunity Task Has Been Assigned To You\\\";s:19:\\\"opportunity_task_id\\\";i:1;s:2:\\\"id\\\";i:9;s:4:\\\"type\\\";s:4:\\\"task\\\";s:6:\\\"socket\\\";N;}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618920000, 1618920000),
(182, 'default', '{\"uuid\":\"0b30f614-a9b3-4daa-8ced-70a4fb917657\",\"displayName\":\"App\\\\Jobs\\\\SendEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmail\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\SendEmail\\\":11:{s:2:\\\"to\\\";s:27:\\\"mohamedhamed01127@gmail.com\\\";s:8:\\\"template\\\";s:341:\\\"<p>Hi there,<\\/p><p>A new Task <strong>Ahmed mohamed<\\/strong> &nbsp;has been assigned to you by <strong>Ceo<\\/strong>.<\\/p><p>You can view this opportunity by logging in to the portal using the link below.<\\/p><p><br><a href=\\\"http:\\/\\/broker.test\\/sales\\/opportunities\\/1\\\"><strong>View Task<\\/strong><\\/a><br><br>Regards<br>The OneTecGroup CRM Team<\\/p>\\\";s:7:\\\"message\\\";s:33:\\\"Opportunity Task Has Been UPDATED\\\";s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618920009, 1618920009),
(183, 'default', '{\"uuid\":\"910f4d01-5049-4eb2-b84f-510e96dcbba4\",\"displayName\":\"App\\\\Events\\\\OpportunityTaskEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":10:{s:5:\\\"event\\\";O:31:\\\"App\\\\Events\\\\OpportunityTaskEvent\\\":5:{s:7:\\\"message\\\";s:47:\\\"A New Opportunity Task Has Been Assigned To You\\\";s:19:\\\"opportunity_task_id\\\";i:1;s:2:\\\"id\\\";i:9;s:4:\\\"type\\\";s:4:\\\"task\\\";s:6:\\\"socket\\\";N;}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618920009, 1618920009);
INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(184, 'default', '{\"uuid\":\"8e652867-b43d-44b0-98b2-8decf9581496\",\"displayName\":\"App\\\\Jobs\\\\SendEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmail\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\SendEmail\\\":11:{s:2:\\\"to\\\";s:21:\\\"shady@onetecgroup.com\\\";s:8:\\\"template\\\";s:341:\\\"<p>Hi there,<\\/p><p>A new Task <strong>Ahmed mohamed<\\/strong> &nbsp;has been assigned to you by <strong>Ceo<\\/strong>.<\\/p><p>You can view this opportunity by logging in to the portal using the link below.<\\/p><p><br><a href=\\\"http:\\/\\/broker.test\\/sales\\/opportunities\\/1\\\"><strong>View Task<\\/strong><\\/a><br><br>Regards<br>The OneTecGroup CRM Team<\\/p>\\\";s:7:\\\"message\\\";s:33:\\\"Opportunity Task Has Been UPDATED\\\";s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618920213, 1618920213),
(185, 'default', '{\"uuid\":\"bfc07b9a-62ae-4192-a5ef-374ec002c5bb\",\"displayName\":\"App\\\\Events\\\\OpportunityTaskEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":10:{s:5:\\\"event\\\";O:31:\\\"App\\\\Events\\\\OpportunityTaskEvent\\\":5:{s:7:\\\"message\\\";s:47:\\\"A New Opportunity Task Has Been Assigned To You\\\";s:19:\\\"opportunity_task_id\\\";i:3;s:2:\\\"id\\\";i:2;s:4:\\\"type\\\";s:4:\\\"task\\\";s:6:\\\"socket\\\";N;}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618920213, 1618920213),
(186, 'default', '{\"uuid\":\"a8a1b943-afbe-4bbb-b42a-01ce4bbf1449\",\"displayName\":\"App\\\\Jobs\\\\SendEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmail\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\SendEmail\\\":11:{s:2:\\\"to\\\";s:21:\\\"shady@onetecgroup.com\\\";s:8:\\\"template\\\";s:341:\\\"<p>Hi there,<\\/p><p>A new Task <strong>Ahmed mohamed<\\/strong> &nbsp;has been assigned to you by <strong>Ceo<\\/strong>.<\\/p><p>You can view this opportunity by logging in to the portal using the link below.<\\/p><p><br><a href=\\\"http:\\/\\/broker.test\\/sales\\/opportunities\\/1\\\"><strong>View Task<\\/strong><\\/a><br><br>Regards<br>The OneTecGroup CRM Team<\\/p>\\\";s:7:\\\"message\\\";s:33:\\\"Opportunity Task Has Been UPDATED\\\";s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618920222, 1618920222),
(187, 'default', '{\"uuid\":\"708c0fa5-9c0b-43f4-b615-cebc14f34968\",\"displayName\":\"App\\\\Events\\\\OpportunityTaskEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":10:{s:5:\\\"event\\\";O:31:\\\"App\\\\Events\\\\OpportunityTaskEvent\\\":5:{s:7:\\\"message\\\";s:47:\\\"A New Opportunity Task Has Been Assigned To You\\\";s:19:\\\"opportunity_task_id\\\";i:5;s:2:\\\"id\\\";i:2;s:4:\\\"type\\\";s:4:\\\"task\\\";s:6:\\\"socket\\\";N;}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618920222, 1618920222),
(188, 'default', '{\"uuid\":\"4828411a-587d-47d3-9863-9dc72f67e8e3\",\"displayName\":\"App\\\\Jobs\\\\SendEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmail\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\SendEmail\\\":11:{s:2:\\\"to\\\";s:27:\\\"mohamedhamed01127@gmail.com\\\";s:8:\\\"template\\\";s:341:\\\"<p>Hi there,<\\/p><p>A new Task <strong>Ahmed mohamed<\\/strong> &nbsp;has been assigned to you by <strong>Ceo<\\/strong>.<\\/p><p>You can view this opportunity by logging in to the portal using the link below.<\\/p><p><br><a href=\\\"http:\\/\\/broker.test\\/sales\\/opportunities\\/1\\\"><strong>View Task<\\/strong><\\/a><br><br>Regards<br>The OneTecGroup CRM Team<\\/p>\\\";s:7:\\\"message\\\";s:33:\\\"Opportunity Task Has Been UPDATED\\\";s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618920222, 1618920222),
(189, 'default', '{\"uuid\":\"c47ca77d-3c41-41d4-99d3-10efffe2224e\",\"displayName\":\"App\\\\Events\\\\OpportunityTaskEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":10:{s:5:\\\"event\\\";O:31:\\\"App\\\\Events\\\\OpportunityTaskEvent\\\":5:{s:7:\\\"message\\\";s:47:\\\"A New Opportunity Task Has Been Assigned To You\\\";s:19:\\\"opportunity_task_id\\\";i:5;s:2:\\\"id\\\";i:9;s:4:\\\"type\\\";s:4:\\\"task\\\";s:6:\\\"socket\\\";N;}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1618920222, 1618920222);

>>>>>>> 09ec62e9a57ce91a1d5b57895f83fa97513c9a2e:broker (1).sql
-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `code`, `name`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ar', 'arabic', 'ae', '1', NULL, NULL),
(2, 'cs', 'czech', 'cs', '1', NULL, NULL),
(3, 'da', 'danish', 'dk', '1', NULL, NULL),
(4, 'de', 'german', 'de', '1', NULL, NULL),
(5, 'el', 'greek', 'gr', '1', NULL, NULL),
(6, 'en', 'english', 'us', '1', NULL, NULL),
(7, 'es', 'spanish', 'es', '1', NULL, NULL),
(8, 'fr', 'french', 'fr', '1', NULL, NULL),
(9, 'gu', 'gujarati', 'in', '1', NULL, NULL),
(10, 'hi', 'hindi', 'in', '1', NULL, NULL),
(11, 'id', 'indonesian', 'id', '1', NULL, NULL),
(12, 'it', 'italian', 'it', '1', NULL, NULL),
(13, 'ja', 'japanese', 'jp', '1', NULL, NULL),
(14, 'nl', 'dutch', 'nl', '1', NULL, NULL),
(15, 'no', 'norwegian', 'no', '1', NULL, NULL),
(16, 'pl', 'polish', 'pl', '1', NULL, NULL),
(17, 'pt', 'portuguese', 'pt', '1', NULL, NULL),
(18, 'ro', 'romanian', 'ro', '1', NULL, NULL),
(19, 'ru', 'russian', 'ru', '1', NULL, NULL),
(20, 'tr', 'turkish', 'tr', '1', NULL, NULL),
(21, 'vi', 'vietnamese', 'vn', '1', NULL, NULL),
(22, 'zh', 'chinese', 'cn', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `salutation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED DEFAULT NULL,
  `source_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `qualification_id` bigint(20) UNSIGNED DEFAULT NULL,
  `communication_id` bigint(20) UNSIGNED DEFAULT NULL,
  `priority_id` bigint(20) UNSIGNED DEFAULT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `po_box` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_expiration_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sec_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `partner_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `phone1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `landline` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `developer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `community` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `building_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_purpose` enum('rent','buy') COLLATE utf8mb4_unicode_ci DEFAULT 'rent',
  `property_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_id` bigint(20) UNSIGNED DEFAULT NULL,
  `size_sqft` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size_sqm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bedrooms` int(11) DEFAULT NULL,
  `bathrooms` int(11) DEFAULT NULL,
  `parkings` int(11) DEFAULT NULL,
  `skype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_flag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timezone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assigned_to` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sub_community` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lead_communications`
--

CREATE TABLE `lead_communications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lead_communications`
--

INSERT INTO `lead_communications` (`id`, `name_en`, `name_ar`, `slug`, `agency_id`, `business_id`, `created_at`, `updated_at`) VALUES
(1, 'Whatsapp', 'واتساب', 'whatsapp', 1, 1, '2021-03-15 12:30:27', '2021-03-15 12:30:27');

-- --------------------------------------------------------

--
-- Table structure for table `lead_priorities`
--

CREATE TABLE `lead_priorities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lead_priorities`
--

INSERT INTO `lead_priorities` (`id`, `name_en`, `name_ar`, `slug`, `agency_id`, `business_id`, `created_at`, `updated_at`) VALUES
(1, 'urgent', 'عاجل', 'urgent', 1, 1, '2021-03-15 12:29:37', '2021-03-15 12:29:37');

-- --------------------------------------------------------

--
-- Table structure for table `lead_property`
--

CREATE TABLE `lead_property` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lead_property`
--

INSERT INTO `lead_property` (`id`, `name_en`, `name_ar`, `slug`, `agency_id`, `business_id`, `created_at`, `updated_at`) VALUES
(1, 'Comercial', 'تجاري', 'comercial', 1, 1, '2021-03-15 12:30:51', '2021-03-15 12:30:51');

-- --------------------------------------------------------

--
-- Table structure for table `lead_qualifications`
--

CREATE TABLE `lead_qualifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lead_qualifications`
--

INSERT INTO `lead_qualifications` (`id`, `name_en`, `name_ar`, `slug`, `agency_id`, `business_id`, `created_at`, `updated_at`) VALUES
(1, 'Undifined', 'غير معرف', 'undifined', 1, 1, '2021-03-15 12:28:13', '2021-03-15 12:28:13'),
(2, 'Yes-Interested', 'مهتم', 'yes-interested', 1, 1, '2021-03-15 12:28:36', '2021-03-15 12:28:36');

-- --------------------------------------------------------

--
-- Table structure for table `lead_sources`
--

CREATE TABLE `lead_sources` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lead_sources`
--

INSERT INTO `lead_sources` (`id`, `name_en`, `name_ar`, `slug`, `agency_id`, `business_id`, `created_at`, `updated_at`) VALUES
<<<<<<< HEAD:broker.sql
(1, 'facebook', 'فيسبوك', 'facebook', 1, 1, '2021-03-15 12:27:41', '2021-03-15 12:27:41'),
(2, 'instgram', 'انستجرام', 'instgram', 1, 1, '2021-03-15 12:27:57', '2021-03-15 12:27:57');
=======
(1, 'facebook', 'فيسبوك', 'facebook', 1, 1, '2021-03-21 20:35:46', '2021-03-21 20:35:46'),
(2, 'instgram', 'انستجرام', 'instgram', 1, 1, '2021-04-25 01:50:12', '2021-04-25 01:50:12');
>>>>>>> 09ec62e9a57ce91a1d5b57895f83fa97513c9a2e:broker (1).sql

-- --------------------------------------------------------

--
-- Table structure for table `lead_types`
--

CREATE TABLE `lead_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lead_types`
--

<<<<<<< HEAD:broker.sql
INSERT INTO `lead_types` (`id`, `name_en`, `name_ar`, `slug`, `agency_id`, `business_id`, `created_at`, `updated_at`) VALUES
(1, 'Investor', 'مستثمر', 'investor', 1, 1, '2021-03-15 12:28:55', '2021-03-15 12:28:55'),
(2, 'landlord', 'مالك عقار', 'landlord', 1, 1, '2021-03-15 12:29:25', '2021-03-15 12:29:25');
=======
INSERT INTO `lead_types` (`id`, `name_en`, `name_ar`, `slug`, `agency_id`, `business_id`, `created_at`, `updated_at`, `role`) VALUES
(1, 'investor', 'مستثمر', 'investor', 1, 1, '2021-03-21 20:36:31', '2021-04-25 02:15:56', 'investor'),
(2, 'tenant', 'مؤجر', 'tenant', 1, 1, '2021-04-25 02:16:19', '2021-04-25 02:16:19', 'tenant'),
(3, 'landlord', 'landlord', 'landlord', 1, 1, '2021-04-25 02:26:01', '2021-04-25 02:26:01', 'seller'),
(4, 'landlord', 'المالك', NULL, NULL, NULL, '2021-04-26 01:20:44', '2021-04-26 01:20:44', 'landlord');

-- --------------------------------------------------------

--
-- Table structure for table `listings`
--

CREATE TABLE `listings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED DEFAULT NULL,
  `purpose` enum('rent','sale') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'sale',
  `location` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `community` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plot_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view_ids` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rent_frequency` enum('yearly','monthly','weekly','daily') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comission_percent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comission_value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `never_lived_in` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `featured_on_company_website` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `exclusive_rights` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `beds` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `baths` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parkings` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year_built` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `developer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `plot_area` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deposite_percent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deposite_value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `listing_rent_cheque_id` bigint(20) UNSIGNED DEFAULT NULL,
  `key_location` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `govfield1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `govfield2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `yearly_service_charges` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `monthly_cooling_charges` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `monthly_cooling_provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_en` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_ar` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `portals` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `furnished` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `lsm` enum('shared','private') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'private',
  `permit_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rera_property_no_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rera_property_no_log` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rera_property_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rera_property_expiry_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rented` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tenancy_contract_start_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tenancy_contract_end_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `landlord_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tenant_id` bigint(20) UNSIGNED DEFAULT NULL,
  `assigned_to` bigint(20) UNSIGNED DEFAULT NULL,
  `source_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('draft','live','archive','review') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `Note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ref_id` bigint(20) DEFAULT NULL,
  `listing_ref` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `features` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listings`
--

INSERT INTO `listings` (`id`, `agency_id`, `business_id`, `purpose`, `location`, `city`, `community`, `state`, `unit_no`, `plot_no`, `street_no`, `view_ids`, `rent_frequency`, `comission_percent`, `comission_value`, `price`, `never_lived_in`, `featured_on_company_website`, `exclusive_rights`, `beds`, `baths`, `parkings`, `year_built`, `developer_id`, `plot_area`, `area`, `deposite_percent`, `deposite_value`, `listing_rent_cheque_id`, `key_location`, `govfield1`, `govfield2`, `yearly_service_charges`, `monthly_cooling_charges`, `monthly_cooling_provider`, `title`, `description_en`, `description_ar`, `portals`, `furnished`, `lsm`, `permit_no`, `rera_property_no_status`, `rera_property_no_log`, `rera_property_no`, `rera_property_expiry_date`, `rented`, `tenancy_contract_start_date`, `tenancy_contract_end_date`, `landlord_id`, `tenant_id`, `assigned_to`, `source_id`, `status`, `Note`, `created_at`, `updated_at`, `ref_id`, `listing_ref`, `type_id`, `features`) VALUES
(11, 1, 1, 'rent', 'masr', 'masr giza', 'dubai community', NULL, '15', '16', '17', '[\"4\"]', 'monthly', '5', '2000', '20000', 'yes', 'yes', 'yes', '2', '3', '2', '1990', 1, '166', '155', '5', '1000', 1, 'location of key', 'no idea', 'no idea', '150', '150', '150', 'title test', 'testing', NULL, '[\"1\"]', 'no', 'shared', 'tr5465465465', 'invalid', '1', '56465456', '2021-05-05', 'yes', '2021-05-04', '2021-05-05', 6, 9, 3, 2, 'draft', 'note', '2021-04-29 15:24:08', '2021-05-04 05:33:17', 1, '1-Vl-S-1', 3, '{\"barbeque_area\":\"yes\",\"day_care_center\":\"yes\",\"kids_play_area\":\"yes\",\"lawn_or_garden\":\"yes\",\"cafeteria_or_canteen\":\"yes\",\"first_aid_medical_center\":\"yes\",\"gym_or_health_club\":\"yes\",\"jacuzzi\":\"yes\",\"sauna\":\"yes\",\"steam_room\":\"yes\",\"swimming_pool\":\"yes\",\"facilities_for_disabled\":\"yes\",\"laundry_room\":\"yes\",\"laundry_facility\":\"yes\",\"shared_kitchen\":\"yes\",\"completion_year\":\"1995\",\"elevators_in_building\":\"2\",\"total_floors\":\"4\",\"balcony_or_terrace\":\"yes\",\"service_elevator\":\"yes\",\"lobby_in_building\":\"yes\",\"prayer_room\":\"yes\",\"flooring\":\"tiles\",\"business_center\":\"yes\",\"conference_room\":\"yes\",\"security_stuff\":\"yes\",\"cctv_security\":\"yes\",\"transaction\":\"transaction\",\"pet_policy\":\"allowed\",\"land_area\":\"150\",\"nearby_schools\":\"nearby schools\",\"nearby_public_transport\":\"near by public transport\",\"floor\":\"2\",\"other_rooms\":\"rooms\",\"maid_rooms\":\"yes\",\"nearby_hospitals\":\"near by hostit\",\"other_nearby_places\":\"places\",\"other_main_features\":\"feature\",\"atm_facility\":\"yes\",\"number_of_bathrooms\":\"5\",\"nearby_shopping_malls\":\"shopping malls\",\"24_hours_concierge\":\"yes\",\"free_hold\":\"yes\",\"other_facilities\":\"yes\",\"number_of_bedrooms\":\"5\",\"distance_from_airport\":\"airposrt\",\"broad_band_internet\":\"yes\",\"satellite_cable_tv\":\"yes\",\"intercom\":\"yes\",\"double_glazed_windows\":\"yes\",\"centerally_air_conditioned\":\"yes\",\"central_heating\":\"yes\",\"electricity_backup\":\"yes\",\"furnitured\":\"yes\",\"parking_space\":\"space\",\"storage_area\":\"yes\",\"study_room\":\"yes\",\"waste_disposal\":\"yes\",\"maintenance_stuff\":\"yes\",\"cleaning_services\":\"yes\"}'),
(12, 1, 1, 'sale', 'warraq', 'giza', 'dubai community', NULL, NULL, NULL, 'warraq city', '[\"4\"]', NULL, NULL, NULL, '1500', 'no', 'no', 'no', NULL, NULL, NULL, NULL, 1, NULL, '150', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'private', NULL, 'invalid', '1', NULL, NULL, 'no', NULL, NULL, 6, NULL, 2, 1, 'draft', NULL, '2021-04-29 15:24:45', '2021-04-29 15:24:45', 2, '1-Vl-S-2', 3, '{\"barbeque_area\":\"no\",\"day_care_center\":\"no\",\"kids_play_area\":null,\"lawn_or_garden\":\"no\",\"cafeteria_or_canteen\":\"no\",\"first_aid_medical_center\":\"no\",\"gym_or_health_club\":\"no\",\"jacuzzi\":\"no\",\"sauna\":\"no\",\"steam_room\":\"no\",\"swimming_pool\":\"no\",\"facilities_for_disabled\":\"no\",\"laundry_room\":\"no\",\"laundry_facility\":\"no\",\"shared_kitchen\":\"no\",\"completion_year\":null,\"elevators_in_building\":null,\"total_floors\":null,\"balcony_or_terrace\":\"no\",\"service_elevator\":\"no\",\"lobby_in_building\":\"no\",\"prayer_room\":\"no\",\"flooring\":null,\"business_center\":\"no\",\"conference_room\":\"no\",\"security_stuff\":\"no\",\"cctv_security\":\"no\",\"transaction\":null,\"pet_policy\":null,\"land_area\":null,\"nearby_schools\":null,\"nearby_public_transport\":null,\"floor\":null,\"other_rooms\":null,\"maid_rooms\":\"no\",\"nearby_hospitals\":null,\"other_nearby_places\":null,\"other_main_features\":null,\"atm_facility\":\"no\",\"number_of_bathrooms\":null,\"nearby_shopping_malls\":null,\"24_hours_concierge\":\"no\",\"free_hold\":\"no\",\"other_facilities\":null,\"number_of_bedrooms\":null,\"distance_from_airport\":null,\"broad_band_internet\":\"no\",\"satellite_cable_tv\":\"no\",\"intercom\":\"no\",\"double_glazed_windows\":\"no\",\"centerally_air_conditioned\":\"no\",\"central_heating\":\"no\",\"electricity_backup\":\"no\",\"furnitured\":\"no\",\"parking_space\":null,\"storage_area\":\"no\",\"study_room\":\"no\",\"waste_disposal\":\"no\",\"maintenance_stuff\":\"no\",\"cleaning_services\":\"no\"}'),
(13, 1, 1, 'sale', 'warraq', 'giza', 'dubai community', NULL, NULL, NULL, 'warraq city', '[\"4\"]', NULL, NULL, NULL, '15000', 'no', 'no', 'no', '1', NULL, NULL, NULL, NULL, NULL, '150', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'private', NULL, 'invalid', '1', NULL, NULL, 'no', NULL, NULL, 6, NULL, 2, 1, 'draft', NULL, '2021-04-29 15:34:07', '2021-04-29 15:34:07', 3, '1-Vl-S-3', 2, '{\"barbeque_area\":\"no\",\"day_care_center\":\"no\",\"kids_play_area\":null,\"lawn_or_garden\":\"no\",\"cafeteria_or_canteen\":\"no\",\"first_aid_medical_center\":\"no\",\"gym_or_health_club\":\"no\",\"jacuzzi\":\"no\",\"sauna\":\"no\",\"steam_room\":\"no\",\"swimming_pool\":\"no\",\"facilities_for_disabled\":\"no\",\"laundry_room\":\"no\",\"laundry_facility\":\"no\",\"shared_kitchen\":\"no\",\"completion_year\":null,\"elevators_in_building\":null,\"total_floors\":null,\"balcony_or_terrace\":\"no\",\"service_elevator\":\"no\",\"lobby_in_building\":\"no\",\"prayer_room\":\"no\",\"flooring\":null,\"business_center\":\"no\",\"conference_room\":\"no\",\"security_stuff\":\"no\",\"cctv_security\":\"no\",\"transaction\":null,\"pet_policy\":null,\"land_area\":null,\"nearby_schools\":null,\"nearby_public_transport\":null,\"floor\":null,\"other_rooms\":null,\"maid_rooms\":\"no\",\"nearby_hospitals\":null,\"other_nearby_places\":null,\"other_main_features\":null,\"atm_facility\":\"no\",\"number_of_bathrooms\":null,\"nearby_shopping_malls\":null,\"24_hours_concierge\":\"no\",\"free_hold\":\"no\",\"other_facilities\":null,\"number_of_bedrooms\":null,\"distance_from_airport\":null,\"broad_band_internet\":\"no\",\"satellite_cable_tv\":\"no\",\"intercom\":\"no\",\"double_glazed_windows\":\"no\",\"centerally_air_conditioned\":\"no\",\"central_heating\":\"no\",\"electricity_backup\":\"no\",\"furnitured\":\"no\",\"parking_space\":null,\"storage_area\":\"no\",\"study_room\":\"no\",\"waste_disposal\":\"no\",\"maintenance_stuff\":\"no\",\"cleaning_services\":\"no\"}'),
(14, 2, 1, 'rent', 'warraq', 'giza', 'dubai community', NULL, NULL, NULL, 'warraq city', '[\"4\"]', NULL, NULL, NULL, '15000', 'no', 'no', 'no', NULL, NULL, NULL, NULL, 1, NULL, '150', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'private', NULL, 'invalid', '1', NULL, NULL, 'no', NULL, NULL, 6, NULL, 2, 1, 'draft', NULL, '2021-04-29 15:36:43', '2021-04-29 15:36:43', 4, '1-Ap-R-4', 3, '{\"barbeque_area\":\"no\",\"day_care_center\":\"no\",\"kids_play_area\":null,\"lawn_or_garden\":\"no\",\"cafeteria_or_canteen\":\"no\",\"first_aid_medical_center\":\"no\",\"gym_or_health_club\":\"no\",\"jacuzzi\":\"no\",\"sauna\":\"no\",\"steam_room\":\"no\",\"swimming_pool\":\"no\",\"facilities_for_disabled\":\"no\",\"laundry_room\":\"no\",\"laundry_facility\":\"no\",\"shared_kitchen\":\"no\",\"completion_year\":null,\"elevators_in_building\":null,\"total_floors\":null,\"balcony_or_terrace\":\"no\",\"service_elevator\":\"no\",\"lobby_in_building\":\"no\",\"prayer_room\":\"no\",\"flooring\":null,\"business_center\":\"no\",\"conference_room\":\"no\",\"security_stuff\":\"no\",\"cctv_security\":\"no\",\"transaction\":null,\"pet_policy\":null,\"land_area\":null,\"nearby_schools\":null,\"nearby_public_transport\":null,\"floor\":null,\"other_rooms\":null,\"maid_rooms\":\"no\",\"nearby_hospitals\":null,\"other_nearby_places\":null,\"other_main_features\":null,\"atm_facility\":\"no\",\"number_of_bathrooms\":null,\"nearby_shopping_malls\":null,\"24_hours_concierge\":\"no\",\"free_hold\":\"no\",\"other_facilities\":null,\"number_of_bedrooms\":null,\"distance_from_airport\":null,\"broad_band_internet\":\"no\",\"satellite_cable_tv\":\"no\",\"intercom\":\"no\",\"double_glazed_windows\":\"no\",\"centerally_air_conditioned\":\"no\",\"central_heating\":\"no\",\"electricity_backup\":\"no\",\"furnitured\":\"no\",\"parking_space\":null,\"storage_area\":\"no\",\"study_room\":\"no\",\"waste_disposal\":\"no\",\"maintenance_stuff\":\"no\",\"cleaning_services\":\"no\"}'),
(15, 1, 1, 'sale', 'warraq', 'giza', 'dubai community', NULL, NULL, NULL, 'warraq city', '[\"4\"]', NULL, NULL, NULL, '150000', 'no', 'no', 'no', NULL, NULL, NULL, NULL, NULL, NULL, '150', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'private', NULL, 'invalid', '1', NULL, NULL, 'no', NULL, NULL, 6, NULL, 2, 1, 'draft', NULL, '2021-04-29 15:41:40', '2021-04-29 15:41:40', 4, '1-Rf-S-4', 4, '{\"barbeque_area\":\"no\",\"day_care_center\":\"no\",\"kids_play_area\":null,\"lawn_or_garden\":\"no\",\"cafeteria_or_canteen\":\"no\",\"first_aid_medical_center\":\"no\",\"gym_or_health_club\":\"no\",\"jacuzzi\":\"no\",\"sauna\":\"no\",\"steam_room\":\"no\",\"swimming_pool\":\"no\",\"facilities_for_disabled\":\"no\",\"laundry_room\":\"no\",\"laundry_facility\":\"no\",\"shared_kitchen\":\"no\",\"completion_year\":null,\"elevators_in_building\":null,\"total_floors\":null,\"balcony_or_terrace\":\"no\",\"service_elevator\":\"no\",\"lobby_in_building\":\"no\",\"prayer_room\":\"no\",\"flooring\":null,\"business_center\":\"no\",\"conference_room\":\"no\",\"security_stuff\":\"no\",\"cctv_security\":\"no\",\"transaction\":null,\"pet_policy\":null,\"land_area\":null,\"nearby_schools\":null,\"nearby_public_transport\":null,\"floor\":null,\"other_rooms\":null,\"maid_rooms\":\"no\",\"nearby_hospitals\":null,\"other_nearby_places\":null,\"other_main_features\":null,\"atm_facility\":\"no\",\"number_of_bathrooms\":null,\"nearby_shopping_malls\":null,\"24_hours_concierge\":\"no\",\"free_hold\":\"no\",\"other_facilities\":null,\"number_of_bedrooms\":null,\"distance_from_airport\":null,\"broad_band_internet\":\"no\",\"satellite_cable_tv\":\"no\",\"intercom\":\"no\",\"double_glazed_windows\":\"no\",\"centerally_air_conditioned\":\"no\",\"central_heating\":\"no\",\"electricity_backup\":\"no\",\"furnitured\":\"no\",\"parking_space\":null,\"storage_area\":\"no\",\"study_room\":\"no\",\"waste_disposal\":\"no\",\"maintenance_stuff\":\"no\",\"cleaning_services\":\"no\"}'),
(16, NULL, NULL, 'sale', 'warraq', 'giza', 'dubai community', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '15000', 'no', 'no', 'no', NULL, NULL, NULL, NULL, NULL, NULL, '150', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'private', NULL, 'invalid', '1', NULL, NULL, 'no', NULL, NULL, 6, NULL, 2, 1, 'draft', NULL, '2021-05-01 23:20:37', '2021-05-01 23:20:37', 1, '-Ap-S-1', 3, '{\"barbeque_area\":\"no\",\"day_care_center\":\"no\",\"kids_play_area\":null,\"lawn_or_garden\":\"no\",\"cafeteria_or_canteen\":\"no\",\"first_aid_medical_center\":\"no\",\"gym_or_health_club\":\"no\",\"jacuzzi\":\"no\",\"sauna\":\"no\",\"steam_room\":\"no\",\"swimming_pool\":\"no\",\"facilities_for_disabled\":\"no\",\"laundry_room\":\"no\",\"laundry_facility\":\"no\",\"shared_kitchen\":\"no\",\"completion_year\":null,\"elevators_in_building\":null,\"total_floors\":null,\"balcony_or_terrace\":\"no\",\"service_elevator\":\"no\",\"lobby_in_building\":\"no\",\"prayer_room\":\"no\",\"flooring\":null,\"business_center\":\"no\",\"conference_room\":\"no\",\"security_stuff\":\"no\",\"cctv_security\":\"no\",\"transaction\":null,\"pet_policy\":null,\"land_area\":null,\"nearby_schools\":null,\"nearby_public_transport\":null,\"floor\":null,\"other_rooms\":null,\"maid_rooms\":\"no\",\"nearby_hospitals\":null,\"other_nearby_places\":null,\"other_main_features\":null,\"atm_facility\":\"no\",\"number_of_bathrooms\":null,\"nearby_shopping_malls\":null,\"24_hours_concierge\":\"no\",\"free_hold\":\"no\",\"other_facilities\":null,\"number_of_bedrooms\":null,\"distance_from_airport\":null,\"broad_band_internet\":\"no\",\"satellite_cable_tv\":\"no\",\"intercom\":\"no\",\"double_glazed_windows\":\"no\",\"centerally_air_conditioned\":\"no\",\"central_heating\":\"no\",\"electricity_backup\":\"no\",\"furnitured\":\"no\",\"parking_space\":null,\"storage_area\":\"no\",\"study_room\":\"no\",\"waste_disposal\":\"no\",\"maintenance_stuff\":\"no\",\"cleaning_services\":\"no\"}'),
(23, NULL, NULL, 'sale', 'warraq', 'city', 'dubai community', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1900', 'no', 'no', 'no', NULL, NULL, NULL, NULL, NULL, NULL, '150', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'private', NULL, 'invalid', '1', NULL, NULL, 'no', NULL, NULL, 6, NULL, 2, 1, 'draft', NULL, '2021-05-01 23:49:22', '2021-05-01 23:49:22', 2, '-Vl-S-2', 2, '{\"barbeque_area\":\"no\",\"day_care_center\":\"no\",\"kids_play_area\":null,\"lawn_or_garden\":\"no\",\"cafeteria_or_canteen\":\"no\",\"first_aid_medical_center\":\"no\",\"gym_or_health_club\":\"no\",\"jacuzzi\":\"no\",\"sauna\":\"no\",\"steam_room\":\"no\",\"swimming_pool\":\"no\",\"facilities_for_disabled\":\"no\",\"laundry_room\":\"no\",\"laundry_facility\":\"no\",\"shared_kitchen\":\"no\",\"completion_year\":null,\"elevators_in_building\":null,\"total_floors\":null,\"balcony_or_terrace\":\"no\",\"service_elevator\":\"no\",\"lobby_in_building\":\"no\",\"prayer_room\":\"no\",\"flooring\":null,\"business_center\":\"no\",\"conference_room\":\"no\",\"security_stuff\":\"no\",\"cctv_security\":\"no\",\"transaction\":null,\"pet_policy\":null,\"land_area\":null,\"nearby_schools\":null,\"nearby_public_transport\":null,\"floor\":null,\"other_rooms\":null,\"maid_rooms\":\"no\",\"nearby_hospitals\":null,\"other_nearby_places\":null,\"other_main_features\":null,\"atm_facility\":\"no\",\"number_of_bathrooms\":null,\"nearby_shopping_malls\":null,\"24_hours_concierge\":\"no\",\"free_hold\":\"no\",\"other_facilities\":null,\"number_of_bedrooms\":null,\"distance_from_airport\":null,\"broad_band_internet\":\"no\",\"satellite_cable_tv\":\"no\",\"intercom\":\"no\",\"double_glazed_windows\":\"no\",\"centerally_air_conditioned\":\"no\",\"central_heating\":\"no\",\"electricity_backup\":\"no\",\"furnitured\":\"no\",\"parking_space\":null,\"storage_area\":\"no\",\"study_room\":\"no\",\"waste_disposal\":\"no\",\"maintenance_stuff\":\"no\",\"cleaning_services\":\"no\"}'),
(24, NULL, NULL, 'sale', 'warraq', 'giza', 'dubai community', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1500', 'no', 'no', 'no', NULL, NULL, NULL, NULL, NULL, NULL, '150', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'private', NULL, 'invalid', '1', NULL, NULL, 'no', NULL, NULL, 6, NULL, 2, 1, 'draft', NULL, '2021-05-01 23:51:18', '2021-05-01 23:51:18', 3, '-Ap-S-3', 3, '{\"barbeque_area\":\"no\",\"day_care_center\":\"no\",\"kids_play_area\":null,\"lawn_or_garden\":\"no\",\"cafeteria_or_canteen\":\"no\",\"first_aid_medical_center\":\"no\",\"gym_or_health_club\":\"no\",\"jacuzzi\":\"no\",\"sauna\":\"no\",\"steam_room\":\"no\",\"swimming_pool\":\"no\",\"facilities_for_disabled\":\"no\",\"laundry_room\":\"no\",\"laundry_facility\":\"no\",\"shared_kitchen\":\"no\",\"completion_year\":null,\"elevators_in_building\":null,\"total_floors\":null,\"balcony_or_terrace\":\"no\",\"service_elevator\":\"no\",\"lobby_in_building\":\"no\",\"prayer_room\":\"no\",\"flooring\":null,\"business_center\":\"no\",\"conference_room\":\"no\",\"security_stuff\":\"no\",\"cctv_security\":\"no\",\"transaction\":null,\"pet_policy\":null,\"land_area\":null,\"nearby_schools\":null,\"nearby_public_transport\":null,\"floor\":null,\"other_rooms\":null,\"maid_rooms\":\"no\",\"nearby_hospitals\":null,\"other_nearby_places\":null,\"other_main_features\":null,\"atm_facility\":\"no\",\"number_of_bathrooms\":null,\"nearby_shopping_malls\":null,\"24_hours_concierge\":\"no\",\"free_hold\":\"no\",\"other_facilities\":null,\"number_of_bedrooms\":null,\"distance_from_airport\":null,\"broad_band_internet\":\"no\",\"satellite_cable_tv\":\"no\",\"intercom\":\"no\",\"double_glazed_windows\":\"no\",\"centerally_air_conditioned\":\"no\",\"central_heating\":\"no\",\"electricity_backup\":\"no\",\"furnitured\":\"no\",\"parking_space\":null,\"storage_area\":\"no\",\"study_room\":\"no\",\"waste_disposal\":\"no\",\"maintenance_stuff\":\"no\",\"cleaning_services\":\"no\"}'),
(25, NULL, NULL, 'sale', 'warraq', 'giza', 'dubai community', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1500', 'no', 'no', 'no', NULL, NULL, NULL, NULL, NULL, NULL, '150', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'private', NULL, 'invalid', '1', NULL, NULL, 'no', NULL, NULL, 6, NULL, 2, 1, 'draft', NULL, '2021-05-02 00:28:41', '2021-05-02 00:28:41', 4, '-Vl-S-4', 2, '{\"barbeque_area\":\"no\",\"day_care_center\":\"no\",\"kids_play_area\":null,\"lawn_or_garden\":\"no\",\"cafeteria_or_canteen\":\"no\",\"first_aid_medical_center\":\"no\",\"gym_or_health_club\":\"no\",\"jacuzzi\":\"no\",\"sauna\":\"no\",\"steam_room\":\"no\",\"swimming_pool\":\"no\",\"facilities_for_disabled\":\"no\",\"laundry_room\":\"no\",\"laundry_facility\":\"no\",\"shared_kitchen\":\"no\",\"completion_year\":null,\"elevators_in_building\":null,\"total_floors\":null,\"balcony_or_terrace\":\"no\",\"service_elevator\":\"no\",\"lobby_in_building\":\"no\",\"prayer_room\":\"no\",\"flooring\":null,\"business_center\":\"no\",\"conference_room\":\"no\",\"security_stuff\":\"no\",\"cctv_security\":\"no\",\"transaction\":null,\"pet_policy\":null,\"land_area\":null,\"nearby_schools\":null,\"nearby_public_transport\":null,\"floor\":null,\"other_rooms\":null,\"maid_rooms\":\"no\",\"nearby_hospitals\":null,\"other_nearby_places\":null,\"other_main_features\":null,\"atm_facility\":\"no\",\"number_of_bathrooms\":null,\"nearby_shopping_malls\":null,\"24_hours_concierge\":\"no\",\"free_hold\":\"no\",\"other_facilities\":null,\"number_of_bedrooms\":null,\"distance_from_airport\":null,\"broad_band_internet\":\"no\",\"satellite_cable_tv\":\"no\",\"intercom\":\"no\",\"double_glazed_windows\":\"no\",\"centerally_air_conditioned\":\"no\",\"central_heating\":\"no\",\"electricity_backup\":\"no\",\"furnitured\":\"no\",\"parking_space\":null,\"storage_area\":\"no\",\"study_room\":\"no\",\"waste_disposal\":\"no\",\"maintenance_stuff\":\"no\",\"cleaning_services\":\"no\"}'),
(26, NULL, NULL, 'sale', 'warraq', 'giza', 'dubai community', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '20000', 'no', 'no', 'no', NULL, NULL, NULL, NULL, NULL, NULL, '160', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'private', NULL, 'invalid', '1', NULL, NULL, 'no', NULL, NULL, 6, NULL, 2, 1, 'review', NULL, '2021-05-02 00:31:47', '2021-05-02 00:31:47', 5, '-Vl-S-5', 2, '{\"barbeque_area\":\"no\",\"day_care_center\":\"no\",\"kids_play_area\":null,\"lawn_or_garden\":\"no\",\"cafeteria_or_canteen\":\"no\",\"first_aid_medical_center\":\"no\",\"gym_or_health_club\":\"no\",\"jacuzzi\":\"no\",\"sauna\":\"no\",\"steam_room\":\"no\",\"swimming_pool\":\"no\",\"facilities_for_disabled\":\"no\",\"laundry_room\":\"no\",\"laundry_facility\":\"no\",\"shared_kitchen\":\"no\",\"completion_year\":null,\"elevators_in_building\":null,\"total_floors\":null,\"balcony_or_terrace\":\"no\",\"service_elevator\":\"no\",\"lobby_in_building\":\"no\",\"prayer_room\":\"no\",\"flooring\":null,\"business_center\":\"no\",\"conference_room\":\"no\",\"security_stuff\":\"no\",\"cctv_security\":\"no\",\"transaction\":null,\"pet_policy\":null,\"land_area\":null,\"nearby_schools\":null,\"nearby_public_transport\":null,\"floor\":null,\"other_rooms\":null,\"maid_rooms\":\"no\",\"nearby_hospitals\":null,\"other_nearby_places\":null,\"other_main_features\":null,\"atm_facility\":\"no\",\"number_of_bathrooms\":null,\"nearby_shopping_malls\":null,\"24_hours_concierge\":\"no\",\"free_hold\":\"no\",\"other_facilities\":null,\"number_of_bedrooms\":null,\"distance_from_airport\":null,\"broad_band_internet\":\"no\",\"satellite_cable_tv\":\"no\",\"intercom\":\"no\",\"double_glazed_windows\":\"no\",\"centerally_air_conditioned\":\"no\",\"central_heating\":\"no\",\"electricity_backup\":\"no\",\"furnitured\":\"no\",\"parking_space\":null,\"storage_area\":\"no\",\"study_room\":\"no\",\"waste_disposal\":\"no\",\"maintenance_stuff\":\"no\",\"cleaning_services\":\"no\"}'),
(27, NULL, NULL, 'sale', 'warraq', 'giza', 'dubai community', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '15000', 'no', 'no', 'no', NULL, NULL, NULL, NULL, NULL, NULL, '150', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'private', NULL, 'invalid', '1', NULL, NULL, 'no', NULL, NULL, 6, NULL, 9, 1, 'draft', NULL, '2021-05-02 15:50:17', '2021-05-02 15:50:17', 6, '-Vl-S-6', 2, '{\"barbeque_area\":\"no\",\"day_care_center\":\"no\",\"kids_play_area\":null,\"lawn_or_garden\":\"no\",\"cafeteria_or_canteen\":\"no\",\"first_aid_medical_center\":\"no\",\"gym_or_health_club\":\"no\",\"jacuzzi\":\"no\",\"sauna\":\"no\",\"steam_room\":\"no\",\"swimming_pool\":\"no\",\"facilities_for_disabled\":\"no\",\"laundry_room\":\"no\",\"laundry_facility\":\"no\",\"shared_kitchen\":\"no\",\"completion_year\":null,\"elevators_in_building\":null,\"total_floors\":null,\"balcony_or_terrace\":\"no\",\"service_elevator\":\"no\",\"lobby_in_building\":\"no\",\"prayer_room\":\"no\",\"flooring\":null,\"business_center\":\"no\",\"conference_room\":\"no\",\"security_stuff\":\"no\",\"cctv_security\":\"no\",\"transaction\":null,\"pet_policy\":null,\"land_area\":null,\"nearby_schools\":null,\"nearby_public_transport\":null,\"floor\":null,\"other_rooms\":null,\"maid_rooms\":\"no\",\"nearby_hospitals\":null,\"other_nearby_places\":null,\"other_main_features\":null,\"atm_facility\":\"no\",\"number_of_bathrooms\":null,\"nearby_shopping_malls\":null,\"24_hours_concierge\":\"no\",\"free_hold\":\"no\",\"other_facilities\":null,\"number_of_bedrooms\":null,\"distance_from_airport\":null,\"broad_band_internet\":\"no\",\"satellite_cable_tv\":\"no\",\"intercom\":\"no\",\"double_glazed_windows\":\"no\",\"centerally_air_conditioned\":\"no\",\"central_heating\":\"no\",\"electricity_backup\":\"no\",\"furnitured\":\"no\",\"parking_space\":null,\"storage_area\":\"no\",\"study_room\":\"no\",\"waste_disposal\":\"no\",\"maintenance_stuff\":\"no\",\"cleaning_services\":\"no\"}'),
(28, NULL, NULL, 'sale', 'warraq', 'giza', 'dubai community', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '15000', 'no', 'no', 'no', NULL, NULL, NULL, NULL, 1, NULL, '150', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'private', NULL, 'invalid', '1', NULL, NULL, 'no', NULL, NULL, 6, NULL, 2, 1, 'draft', NULL, '2021-05-02 15:58:15', '2021-05-02 15:58:15', 7, '-Vl-S-7', 2, '{\"barbeque_area\":\"no\",\"day_care_center\":\"no\",\"kids_play_area\":null,\"lawn_or_garden\":\"no\",\"cafeteria_or_canteen\":\"no\",\"first_aid_medical_center\":\"no\",\"gym_or_health_club\":\"no\",\"jacuzzi\":\"no\",\"sauna\":\"no\",\"steam_room\":\"no\",\"swimming_pool\":\"no\",\"facilities_for_disabled\":\"no\",\"laundry_room\":\"no\",\"laundry_facility\":\"no\",\"shared_kitchen\":\"no\",\"completion_year\":null,\"elevators_in_building\":null,\"total_floors\":null,\"balcony_or_terrace\":\"no\",\"service_elevator\":\"no\",\"lobby_in_building\":\"no\",\"prayer_room\":\"no\",\"flooring\":null,\"business_center\":\"no\",\"conference_room\":\"no\",\"security_stuff\":\"no\",\"cctv_security\":\"no\",\"transaction\":null,\"pet_policy\":null,\"land_area\":null,\"nearby_schools\":null,\"nearby_public_transport\":null,\"floor\":null,\"other_rooms\":null,\"maid_rooms\":\"no\",\"nearby_hospitals\":null,\"other_nearby_places\":null,\"other_main_features\":null,\"atm_facility\":\"no\",\"number_of_bathrooms\":null,\"nearby_shopping_malls\":null,\"24_hours_concierge\":\"no\",\"free_hold\":\"no\",\"other_facilities\":null,\"number_of_bedrooms\":null,\"distance_from_airport\":null,\"broad_band_internet\":\"no\",\"satellite_cable_tv\":\"no\",\"intercom\":\"no\",\"double_glazed_windows\":\"no\",\"centerally_air_conditioned\":\"no\",\"central_heating\":\"no\",\"electricity_backup\":\"no\",\"furnitured\":\"no\",\"parking_space\":null,\"storage_area\":\"no\",\"study_room\":\"no\",\"waste_disposal\":\"no\",\"maintenance_stuff\":\"no\",\"cleaning_services\":\"no\"}'),
(30, NULL, NULL, 'sale', 'warraq', 'giza', 'dubai community', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '15000', 'no', 'no', 'no', NULL, NULL, NULL, NULL, NULL, NULL, '150', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'private', NULL, 'invalid', '1', NULL, NULL, 'no', NULL, NULL, 6, NULL, 2, 1, 'draft', NULL, '2021-05-02 16:08:27', '2021-05-02 16:08:27', 8, '-Vl-S-8', 2, '{\"barbeque_area\":\"no\",\"day_care_center\":\"no\",\"kids_play_area\":null,\"lawn_or_garden\":\"no\",\"cafeteria_or_canteen\":\"no\",\"first_aid_medical_center\":\"no\",\"gym_or_health_club\":\"no\",\"jacuzzi\":\"no\",\"sauna\":\"no\",\"steam_room\":\"no\",\"swimming_pool\":\"no\",\"facilities_for_disabled\":\"no\",\"laundry_room\":\"no\",\"laundry_facility\":\"no\",\"shared_kitchen\":\"no\",\"completion_year\":null,\"elevators_in_building\":null,\"total_floors\":null,\"balcony_or_terrace\":\"no\",\"service_elevator\":\"no\",\"lobby_in_building\":\"no\",\"prayer_room\":\"no\",\"flooring\":null,\"business_center\":\"no\",\"conference_room\":\"no\",\"security_stuff\":\"no\",\"cctv_security\":\"no\",\"transaction\":null,\"pet_policy\":null,\"land_area\":null,\"nearby_schools\":null,\"nearby_public_transport\":null,\"floor\":null,\"other_rooms\":null,\"maid_rooms\":\"no\",\"nearby_hospitals\":null,\"other_nearby_places\":null,\"other_main_features\":null,\"atm_facility\":\"no\",\"number_of_bathrooms\":null,\"nearby_shopping_malls\":null,\"24_hours_concierge\":\"no\",\"free_hold\":\"no\",\"other_facilities\":null,\"number_of_bedrooms\":null,\"distance_from_airport\":null,\"broad_band_internet\":\"no\",\"satellite_cable_tv\":\"no\",\"intercom\":\"no\",\"double_glazed_windows\":\"no\",\"centerally_air_conditioned\":\"no\",\"central_heating\":\"no\",\"electricity_backup\":\"no\",\"furnitured\":\"no\",\"parking_space\":null,\"storage_area\":\"no\",\"study_room\":\"no\",\"waste_disposal\":\"no\",\"maintenance_stuff\":\"no\",\"cleaning_services\":\"no\"}'),
(31, NULL, NULL, 'sale', 'warraq', 'giza', 'dubai community', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '15000', 'no', 'no', 'no', NULL, NULL, NULL, NULL, 1, NULL, '150', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'private', NULL, 'invalid', '1', NULL, NULL, 'no', NULL, NULL, 6, NULL, 2, 1, 'draft', NULL, '2021-05-02 16:22:46', '2021-05-02 16:22:46', 9, '-Vl-S-9', 2, '{\"barbeque_area\":\"no\",\"day_care_center\":\"no\",\"kids_play_area\":null,\"lawn_or_garden\":\"no\",\"cafeteria_or_canteen\":\"no\",\"first_aid_medical_center\":\"no\",\"gym_or_health_club\":\"no\",\"jacuzzi\":\"no\",\"sauna\":\"no\",\"steam_room\":\"no\",\"swimming_pool\":\"no\",\"facilities_for_disabled\":\"no\",\"laundry_room\":\"no\",\"laundry_facility\":\"no\",\"shared_kitchen\":\"no\",\"completion_year\":null,\"elevators_in_building\":null,\"total_floors\":null,\"balcony_or_terrace\":\"no\",\"service_elevator\":\"no\",\"lobby_in_building\":\"no\",\"prayer_room\":\"no\",\"flooring\":null,\"business_center\":\"no\",\"conference_room\":\"no\",\"security_stuff\":\"no\",\"cctv_security\":\"no\",\"transaction\":null,\"pet_policy\":null,\"land_area\":null,\"nearby_schools\":null,\"nearby_public_transport\":null,\"floor\":null,\"other_rooms\":null,\"maid_rooms\":\"no\",\"nearby_hospitals\":null,\"other_nearby_places\":null,\"other_main_features\":null,\"atm_facility\":\"no\",\"number_of_bathrooms\":null,\"nearby_shopping_malls\":null,\"24_hours_concierge\":\"no\",\"free_hold\":\"no\",\"other_facilities\":null,\"number_of_bedrooms\":null,\"distance_from_airport\":null,\"broad_band_internet\":\"no\",\"satellite_cable_tv\":\"no\",\"intercom\":\"no\",\"double_glazed_windows\":\"no\",\"centerally_air_conditioned\":\"no\",\"central_heating\":\"no\",\"electricity_backup\":\"no\",\"furnitured\":\"no\",\"parking_space\":null,\"storage_area\":\"no\",\"study_room\":\"no\",\"waste_disposal\":\"no\",\"maintenance_stuff\":\"no\",\"cleaning_services\":\"no\"}'),
(32, 1, 1, 'sale', 'warraq', 'giza', 'dubai community', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '15000', 'no', 'no', 'no', NULL, NULL, NULL, NULL, NULL, NULL, '150', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'private', NULL, 'invalid', '1', NULL, NULL, 'no', NULL, NULL, 6, NULL, 2, 1, 'draft', NULL, '2021-05-02 16:27:38', '2021-05-02 16:27:38', 5, '1-Vl-S-5', 2, '{\"barbeque_area\":\"no\",\"day_care_center\":\"no\",\"kids_play_area\":null,\"lawn_or_garden\":\"no\",\"cafeteria_or_canteen\":\"no\",\"first_aid_medical_center\":\"no\",\"gym_or_health_club\":\"no\",\"jacuzzi\":\"no\",\"sauna\":\"no\",\"steam_room\":\"no\",\"swimming_pool\":\"no\",\"facilities_for_disabled\":\"no\",\"laundry_room\":\"no\",\"laundry_facility\":\"no\",\"shared_kitchen\":\"no\",\"completion_year\":null,\"elevators_in_building\":null,\"total_floors\":null,\"balcony_or_terrace\":\"no\",\"service_elevator\":\"no\",\"lobby_in_building\":\"no\",\"prayer_room\":\"no\",\"flooring\":null,\"business_center\":\"no\",\"conference_room\":\"no\",\"security_stuff\":\"no\",\"cctv_security\":\"no\",\"transaction\":null,\"pet_policy\":null,\"land_area\":null,\"nearby_schools\":null,\"nearby_public_transport\":null,\"floor\":null,\"other_rooms\":null,\"maid_rooms\":\"no\",\"nearby_hospitals\":null,\"other_nearby_places\":null,\"other_main_features\":null,\"atm_facility\":\"no\",\"number_of_bathrooms\":null,\"nearby_shopping_malls\":null,\"24_hours_concierge\":\"no\",\"free_hold\":\"no\",\"other_facilities\":null,\"number_of_bedrooms\":null,\"distance_from_airport\":null,\"broad_band_internet\":\"no\",\"satellite_cable_tv\":\"no\",\"intercom\":\"no\",\"double_glazed_windows\":\"no\",\"centerally_air_conditioned\":\"no\",\"central_heating\":\"no\",\"electricity_backup\":\"no\",\"furnitured\":\"no\",\"parking_space\":null,\"storage_area\":\"no\",\"study_room\":\"no\",\"waste_disposal\":\"no\",\"maintenance_stuff\":\"no\",\"cleaning_services\":\"no\"}'),
(33, 1, 1, 'sale', 'warraq', 'giza', 'dubai community', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '25000', 'no', 'no', 'no', NULL, NULL, NULL, NULL, NULL, NULL, '150', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'private', NULL, 'invalid', '1', NULL, NULL, 'no', NULL, NULL, 6, NULL, 2, 1, 'draft', NULL, '2021-05-03 01:01:14', '2021-05-03 01:01:14', 6, '1-Ap-S-6', 3, '{\"barbeque_area\":\"no\",\"day_care_center\":\"no\",\"kids_play_area\":null,\"lawn_or_garden\":\"no\",\"cafeteria_or_canteen\":\"no\",\"first_aid_medical_center\":\"no\",\"gym_or_health_club\":\"no\",\"jacuzzi\":\"no\",\"sauna\":\"no\",\"steam_room\":\"no\",\"swimming_pool\":\"no\",\"facilities_for_disabled\":\"no\",\"laundry_room\":\"no\",\"laundry_facility\":\"no\",\"shared_kitchen\":\"no\",\"completion_year\":null,\"elevators_in_building\":null,\"total_floors\":null,\"balcony_or_terrace\":\"no\",\"service_elevator\":\"no\",\"lobby_in_building\":\"no\",\"prayer_room\":\"no\",\"flooring\":null,\"business_center\":\"no\",\"conference_room\":\"no\",\"security_stuff\":\"no\",\"cctv_security\":\"no\",\"transaction\":null,\"pet_policy\":null,\"land_area\":null,\"nearby_schools\":null,\"nearby_public_transport\":null,\"floor\":null,\"other_rooms\":null,\"maid_rooms\":\"no\",\"nearby_hospitals\":null,\"other_nearby_places\":null,\"other_main_features\":null,\"atm_facility\":\"no\",\"number_of_bathrooms\":null,\"nearby_shopping_malls\":null,\"24_hours_concierge\":\"no\",\"free_hold\":\"no\",\"other_facilities\":null,\"number_of_bedrooms\":null,\"distance_from_airport\":null,\"broad_band_internet\":\"no\",\"satellite_cable_tv\":\"no\",\"intercom\":\"no\",\"double_glazed_windows\":\"no\",\"centerally_air_conditioned\":\"no\",\"central_heating\":\"no\",\"electricity_backup\":\"no\",\"furnitured\":\"no\",\"parking_space\":null,\"storage_area\":\"no\",\"study_room\":\"no\",\"waste_disposal\":\"no\",\"maintenance_stuff\":\"no\",\"cleaning_services\":\"no\"}'),
(34, 1, 1, 'sale', 'warraq', 'giza', 'dubai community', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '15000', 'no', 'no', 'no', NULL, NULL, NULL, NULL, 1, NULL, '150', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'private', NULL, 'invalid', '1', NULL, NULL, 'no', NULL, NULL, 6, NULL, 9, 1, 'draft', NULL, '2021-05-03 01:39:17', '2021-05-03 01:39:17', 7, '1-Ap-S-7', 3, '{\"barbeque_area\":\"no\",\"day_care_center\":\"no\",\"kids_play_area\":null,\"lawn_or_garden\":\"no\",\"cafeteria_or_canteen\":\"no\",\"first_aid_medical_center\":\"no\",\"gym_or_health_club\":\"no\",\"jacuzzi\":\"no\",\"sauna\":\"no\",\"steam_room\":\"no\",\"swimming_pool\":\"no\",\"facilities_for_disabled\":\"no\",\"laundry_room\":\"no\",\"laundry_facility\":\"no\",\"shared_kitchen\":\"no\",\"completion_year\":null,\"elevators_in_building\":null,\"total_floors\":null,\"balcony_or_terrace\":\"no\",\"service_elevator\":\"no\",\"lobby_in_building\":\"no\",\"prayer_room\":\"no\",\"flooring\":null,\"business_center\":\"no\",\"conference_room\":\"no\",\"security_stuff\":\"no\",\"cctv_security\":\"no\",\"transaction\":null,\"pet_policy\":null,\"land_area\":null,\"nearby_schools\":null,\"nearby_public_transport\":null,\"floor\":null,\"other_rooms\":null,\"maid_rooms\":\"no\",\"nearby_hospitals\":null,\"other_nearby_places\":null,\"other_main_features\":null,\"atm_facility\":\"no\",\"number_of_bathrooms\":null,\"nearby_shopping_malls\":null,\"24_hours_concierge\":\"no\",\"free_hold\":\"no\",\"other_facilities\":null,\"number_of_bedrooms\":null,\"distance_from_airport\":null,\"broad_band_internet\":\"no\",\"satellite_cable_tv\":\"no\",\"intercom\":\"no\",\"double_glazed_windows\":\"no\",\"centerally_air_conditioned\":\"no\",\"central_heating\":\"no\",\"electricity_backup\":\"no\",\"furnitured\":\"no\",\"parking_space\":null,\"storage_area\":\"no\",\"study_room\":\"no\",\"waste_disposal\":\"no\",\"maintenance_stuff\":\"no\",\"cleaning_services\":\"no\"}'),
(35, 1, 1, 'sale', 'warraq', 'giza', 'dubai community', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16000', 'no', 'no', 'no', NULL, NULL, NULL, NULL, 1, NULL, '150', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'private', NULL, 'invalid', '1', NULL, NULL, 'no', NULL, NULL, 6, NULL, 2, 1, 'draft', NULL, '2021-05-03 01:45:35', '2021-05-03 01:45:35', 8, '1-Ap-S-8', 3, '{\"barbeque_area\":\"no\",\"day_care_center\":\"no\",\"kids_play_area\":null,\"lawn_or_garden\":\"no\",\"cafeteria_or_canteen\":\"no\",\"first_aid_medical_center\":\"no\",\"gym_or_health_club\":\"no\",\"jacuzzi\":\"no\",\"sauna\":\"no\",\"steam_room\":\"no\",\"swimming_pool\":\"no\",\"facilities_for_disabled\":\"no\",\"laundry_room\":\"no\",\"laundry_facility\":\"no\",\"shared_kitchen\":\"no\",\"completion_year\":null,\"elevators_in_building\":null,\"total_floors\":null,\"balcony_or_terrace\":\"no\",\"service_elevator\":\"no\",\"lobby_in_building\":\"no\",\"prayer_room\":\"no\",\"flooring\":null,\"business_center\":\"no\",\"conference_room\":\"no\",\"security_stuff\":\"no\",\"cctv_security\":\"no\",\"transaction\":null,\"pet_policy\":null,\"land_area\":null,\"nearby_schools\":null,\"nearby_public_transport\":null,\"floor\":null,\"other_rooms\":null,\"maid_rooms\":\"no\",\"nearby_hospitals\":null,\"other_nearby_places\":null,\"other_main_features\":null,\"atm_facility\":\"no\",\"number_of_bathrooms\":null,\"nearby_shopping_malls\":null,\"24_hours_concierge\":\"no\",\"free_hold\":\"no\",\"other_facilities\":null,\"number_of_bedrooms\":null,\"distance_from_airport\":null,\"broad_band_internet\":\"no\",\"satellite_cable_tv\":\"no\",\"intercom\":\"no\",\"double_glazed_windows\":\"no\",\"centerally_air_conditioned\":\"no\",\"central_heating\":\"no\",\"electricity_backup\":\"no\",\"furnitured\":\"no\",\"parking_space\":null,\"storage_area\":\"no\",\"study_room\":\"no\",\"waste_disposal\":\"no\",\"maintenance_stuff\":\"no\",\"cleaning_services\":\"no\"}'),
(36, 1, 1, 'sale', 'warraq', 'giza', 'dubai community', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '15000', 'no', 'no', 'no', NULL, NULL, NULL, NULL, NULL, NULL, '150', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'private', NULL, 'invalid', '1', NULL, NULL, 'no', NULL, NULL, 6, NULL, 2, 1, 'draft', NULL, '2021-05-03 02:05:54', '2021-05-03 02:05:54', 9, '1-Vl-S-9', 2, '{\"barbeque_area\":\"no\",\"day_care_center\":\"no\",\"kids_play_area\":null,\"lawn_or_garden\":\"no\",\"cafeteria_or_canteen\":\"no\",\"first_aid_medical_center\":\"no\",\"gym_or_health_club\":\"no\",\"jacuzzi\":\"no\",\"sauna\":\"no\",\"steam_room\":\"no\",\"swimming_pool\":\"no\",\"facilities_for_disabled\":\"no\",\"laundry_room\":\"no\",\"laundry_facility\":\"no\",\"shared_kitchen\":\"no\",\"completion_year\":null,\"elevators_in_building\":null,\"total_floors\":null,\"balcony_or_terrace\":\"no\",\"service_elevator\":\"no\",\"lobby_in_building\":\"no\",\"prayer_room\":\"no\",\"flooring\":null,\"business_center\":\"no\",\"conference_room\":\"no\",\"security_stuff\":\"no\",\"cctv_security\":\"no\",\"transaction\":null,\"pet_policy\":null,\"land_area\":null,\"nearby_schools\":null,\"nearby_public_transport\":null,\"floor\":null,\"other_rooms\":null,\"maid_rooms\":\"no\",\"nearby_hospitals\":null,\"other_nearby_places\":null,\"other_main_features\":null,\"atm_facility\":\"no\",\"number_of_bathrooms\":null,\"nearby_shopping_malls\":null,\"24_hours_concierge\":\"no\",\"free_hold\":\"no\",\"other_facilities\":null,\"number_of_bedrooms\":null,\"distance_from_airport\":null,\"broad_band_internet\":\"no\",\"satellite_cable_tv\":\"no\",\"intercom\":\"no\",\"double_glazed_windows\":\"no\",\"centerally_air_conditioned\":\"no\",\"central_heating\":\"no\",\"electricity_backup\":\"no\",\"furnitured\":\"no\",\"parking_space\":null,\"storage_area\":\"no\",\"study_room\":\"no\",\"waste_disposal\":\"no\",\"maintenance_stuff\":\"no\",\"cleaning_services\":\"no\"}'),
(37, 1, 1, 'sale', 'warraq', 'giza', 'dubai community', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '15000', 'no', 'no', 'no', NULL, NULL, NULL, NULL, 1, NULL, '150', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', 'no', 'private', NULL, 'invalid', '1', NULL, NULL, 'no', NULL, NULL, 6, NULL, 2, 1, 'draft', NULL, '2021-05-03 02:08:32', '2021-05-03 02:08:32', 10, '1-Vl-S-10', 2, '{\"barbeque_area\":\"no\",\"day_care_center\":\"no\",\"kids_play_area\":null,\"lawn_or_garden\":\"no\",\"cafeteria_or_canteen\":\"no\",\"first_aid_medical_center\":\"no\",\"gym_or_health_club\":\"no\",\"jacuzzi\":\"no\",\"sauna\":\"no\",\"steam_room\":\"no\",\"swimming_pool\":\"no\",\"facilities_for_disabled\":\"no\",\"laundry_room\":\"no\",\"laundry_facility\":\"no\",\"shared_kitchen\":\"no\",\"completion_year\":null,\"elevators_in_building\":null,\"total_floors\":null,\"balcony_or_terrace\":\"no\",\"service_elevator\":\"no\",\"lobby_in_building\":\"no\",\"prayer_room\":\"no\",\"flooring\":null,\"business_center\":\"no\",\"conference_room\":\"no\",\"security_stuff\":\"no\",\"cctv_security\":\"no\",\"transaction\":null,\"pet_policy\":null,\"land_area\":null,\"nearby_schools\":null,\"nearby_public_transport\":null,\"floor\":null,\"other_rooms\":null,\"maid_rooms\":\"no\",\"nearby_hospitals\":null,\"other_nearby_places\":null,\"other_main_features\":null,\"atm_facility\":\"no\",\"number_of_bathrooms\":null,\"nearby_shopping_malls\":null,\"24_hours_concierge\":\"no\",\"free_hold\":\"no\",\"other_facilities\":null,\"number_of_bedrooms\":null,\"distance_from_airport\":null,\"broad_band_internet\":\"no\",\"satellite_cable_tv\":\"no\",\"intercom\":\"no\",\"double_glazed_windows\":\"no\",\"centerally_air_conditioned\":\"no\",\"central_heating\":\"no\",\"electricity_backup\":\"no\",\"furnitured\":\"no\",\"parking_space\":null,\"storage_area\":\"no\",\"study_room\":\"no\",\"waste_disposal\":\"no\",\"maintenance_stuff\":\"no\",\"cleaning_services\":\"no\"}'),
(38, 1, 1, 'rent', 'warraq', 'giza', 'dubai community', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '15000', 'no', 'no', 'no', NULL, NULL, NULL, NULL, NULL, NULL, '150', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'private', NULL, 'invalid', '1', NULL, NULL, 'yes', '2021-05-03', '2021-05-03', NULL, 9, 9, 1, 'draft', NULL, '2021-05-03 02:46:59', '2021-05-03 02:46:59', 11, '1-Vl-R-11', 2, '{\"barbeque_area\":\"no\",\"day_care_center\":\"no\",\"kids_play_area\":null,\"lawn_or_garden\":\"no\",\"cafeteria_or_canteen\":\"no\",\"first_aid_medical_center\":\"no\",\"gym_or_health_club\":\"no\",\"jacuzzi\":\"no\",\"sauna\":\"no\",\"steam_room\":\"no\",\"swimming_pool\":\"no\",\"facilities_for_disabled\":\"no\",\"laundry_room\":\"no\",\"laundry_facility\":\"no\",\"shared_kitchen\":\"no\",\"completion_year\":null,\"elevators_in_building\":null,\"total_floors\":null,\"balcony_or_terrace\":\"no\",\"service_elevator\":\"no\",\"lobby_in_building\":\"no\",\"prayer_room\":\"no\",\"flooring\":null,\"business_center\":\"no\",\"conference_room\":\"no\",\"security_stuff\":\"no\",\"cctv_security\":\"no\",\"transaction\":null,\"pet_policy\":null,\"land_area\":null,\"nearby_schools\":null,\"nearby_public_transport\":null,\"floor\":null,\"other_rooms\":null,\"maid_rooms\":\"no\",\"nearby_hospitals\":null,\"other_nearby_places\":null,\"other_main_features\":null,\"atm_facility\":\"no\",\"number_of_bathrooms\":null,\"nearby_shopping_malls\":null,\"24_hours_concierge\":\"no\",\"free_hold\":\"no\",\"other_facilities\":null,\"number_of_bedrooms\":null,\"distance_from_airport\":null,\"broad_band_internet\":\"no\",\"satellite_cable_tv\":\"no\",\"intercom\":\"no\",\"double_glazed_windows\":\"no\",\"centerally_air_conditioned\":\"no\",\"central_heating\":\"no\",\"electricity_backup\":\"no\",\"furnitured\":\"no\",\"parking_space\":null,\"storage_area\":\"no\",\"study_room\":\"no\",\"waste_disposal\":\"no\",\"maintenance_stuff\":\"no\",\"cleaning_services\":\"no\"}'),
(39, 1, 1, 'rent', 'warraq', 'giza', 'dubai community', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '91000', 'no', 'no', 'no', NULL, NULL, NULL, NULL, NULL, NULL, '150', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'private', NULL, 'invalid', '1', NULL, NULL, 'yes', NULL, NULL, NULL, NULL, 9, 1, 'draft', NULL, '2021-05-03 02:51:32', '2021-05-03 02:51:32', 12, '1-Vl-R-12', 2, '{\"barbeque_area\":\"no\",\"day_care_center\":\"no\",\"kids_play_area\":null,\"lawn_or_garden\":\"no\",\"cafeteria_or_canteen\":\"no\",\"first_aid_medical_center\":\"no\",\"gym_or_health_club\":\"no\",\"jacuzzi\":\"no\",\"sauna\":\"no\",\"steam_room\":\"no\",\"swimming_pool\":\"no\",\"facilities_for_disabled\":\"no\",\"laundry_room\":\"no\",\"laundry_facility\":\"no\",\"shared_kitchen\":\"no\",\"completion_year\":null,\"elevators_in_building\":null,\"total_floors\":null,\"balcony_or_terrace\":\"no\",\"service_elevator\":\"no\",\"lobby_in_building\":\"no\",\"prayer_room\":\"no\",\"flooring\":null,\"business_center\":\"no\",\"conference_room\":\"no\",\"security_stuff\":\"no\",\"cctv_security\":\"no\",\"transaction\":null,\"pet_policy\":null,\"land_area\":null,\"nearby_schools\":null,\"nearby_public_transport\":null,\"floor\":null,\"other_rooms\":null,\"maid_rooms\":\"no\",\"nearby_hospitals\":null,\"other_nearby_places\":null,\"other_main_features\":null,\"atm_facility\":\"no\",\"number_of_bathrooms\":null,\"nearby_shopping_malls\":null,\"24_hours_concierge\":\"no\",\"free_hold\":\"no\",\"other_facilities\":null,\"number_of_bedrooms\":null,\"distance_from_airport\":null,\"broad_band_internet\":\"no\",\"satellite_cable_tv\":\"no\",\"intercom\":\"no\",\"double_glazed_windows\":\"no\",\"centerally_air_conditioned\":\"no\",\"central_heating\":\"no\",\"electricity_backup\":\"no\",\"furnitured\":\"no\",\"parking_space\":null,\"storage_area\":\"no\",\"study_room\":\"no\",\"waste_disposal\":\"no\",\"maintenance_stuff\":\"no\",\"cleaning_services\":\"no\"}'),
(40, 1, 1, 'rent', 'warraq', 'giza', 'dubai community', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '15000', 'no', 'no', 'no', NULL, NULL, NULL, NULL, NULL, NULL, '150', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'private', NULL, 'invalid', '1', NULL, NULL, 'yes', NULL, NULL, 6, NULL, 2, 1, 'draft', NULL, '2021-05-03 02:56:11', '2021-05-03 02:56:11', 13, '1-Vl-R-13', 2, '{\"barbeque_area\":\"no\",\"day_care_center\":\"no\",\"kids_play_area\":null,\"lawn_or_garden\":\"no\",\"cafeteria_or_canteen\":\"no\",\"first_aid_medical_center\":\"no\",\"gym_or_health_club\":\"no\",\"jacuzzi\":\"no\",\"sauna\":\"no\",\"steam_room\":\"no\",\"swimming_pool\":\"no\",\"facilities_for_disabled\":\"no\",\"laundry_room\":\"no\",\"laundry_facility\":\"no\",\"shared_kitchen\":\"no\",\"completion_year\":null,\"elevators_in_building\":null,\"total_floors\":null,\"balcony_or_terrace\":\"no\",\"service_elevator\":\"no\",\"lobby_in_building\":\"no\",\"prayer_room\":\"no\",\"flooring\":null,\"business_center\":\"no\",\"conference_room\":\"no\",\"security_stuff\":\"no\",\"cctv_security\":\"no\",\"transaction\":null,\"pet_policy\":null,\"land_area\":null,\"nearby_schools\":null,\"nearby_public_transport\":null,\"floor\":null,\"other_rooms\":null,\"maid_rooms\":\"no\",\"nearby_hospitals\":null,\"other_nearby_places\":null,\"other_main_features\":null,\"atm_facility\":\"no\",\"number_of_bathrooms\":null,\"nearby_shopping_malls\":null,\"24_hours_concierge\":\"no\",\"free_hold\":\"no\",\"other_facilities\":null,\"number_of_bedrooms\":null,\"distance_from_airport\":null,\"broad_band_internet\":\"no\",\"satellite_cable_tv\":\"no\",\"intercom\":\"no\",\"double_glazed_windows\":\"no\",\"centerally_air_conditioned\":\"no\",\"central_heating\":\"no\",\"electricity_backup\":\"no\",\"furnitured\":\"no\",\"parking_space\":null,\"storage_area\":\"no\",\"study_room\":\"no\",\"waste_disposal\":\"no\",\"maintenance_stuff\":\"no\",\"cleaning_services\":\"no\"}'),
(41, 1, 1, 'rent', 'warraq', 'giza', 'dubai community', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '15000', 'no', 'no', 'no', NULL, NULL, NULL, NULL, NULL, NULL, '150', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'private', NULL, 'invalid', '1', NULL, NULL, 'yes', NULL, NULL, 6, NULL, 2, 1, 'draft', NULL, '2021-05-03 02:57:02', '2021-05-03 02:57:02', 14, '1-Ap-R-14', 3, '{\"barbeque_area\":\"no\",\"day_care_center\":\"no\",\"kids_play_area\":null,\"lawn_or_garden\":\"no\",\"cafeteria_or_canteen\":\"no\",\"first_aid_medical_center\":\"no\",\"gym_or_health_club\":\"no\",\"jacuzzi\":\"no\",\"sauna\":\"no\",\"steam_room\":\"no\",\"swimming_pool\":\"no\",\"facilities_for_disabled\":\"no\",\"laundry_room\":\"no\",\"laundry_facility\":\"no\",\"shared_kitchen\":\"no\",\"completion_year\":null,\"elevators_in_building\":null,\"total_floors\":null,\"balcony_or_terrace\":\"no\",\"service_elevator\":\"no\",\"lobby_in_building\":\"no\",\"prayer_room\":\"no\",\"flooring\":null,\"business_center\":\"no\",\"conference_room\":\"no\",\"security_stuff\":\"no\",\"cctv_security\":\"no\",\"transaction\":null,\"pet_policy\":null,\"land_area\":null,\"nearby_schools\":null,\"nearby_public_transport\":null,\"floor\":null,\"other_rooms\":null,\"maid_rooms\":\"no\",\"nearby_hospitals\":null,\"other_nearby_places\":null,\"other_main_features\":null,\"atm_facility\":\"no\",\"number_of_bathrooms\":null,\"nearby_shopping_malls\":null,\"24_hours_concierge\":\"no\",\"free_hold\":\"no\",\"other_facilities\":null,\"number_of_bedrooms\":null,\"distance_from_airport\":null,\"broad_band_internet\":\"no\",\"satellite_cable_tv\":\"no\",\"intercom\":\"no\",\"double_glazed_windows\":\"no\",\"centerally_air_conditioned\":\"no\",\"central_heating\":\"no\",\"electricity_backup\":\"no\",\"furnitured\":\"no\",\"parking_space\":null,\"storage_area\":\"no\",\"study_room\":\"no\",\"waste_disposal\":\"no\",\"maintenance_stuff\":\"no\",\"cleaning_services\":\"no\"}');

-- --------------------------------------------------------

--
-- Table structure for table `listing_cheque_calculator`
--

CREATE TABLE `listing_cheque_calculator` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `percent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `listing_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listing_cheque_calculator`
--

INSERT INTO `listing_cheque_calculator` (`id`, `date`, `value`, `percent`, `listing_id`, `created_at`, `updated_at`) VALUES
(1, '2021-05-04', '10000', '5', 38, '2021-05-03 02:46:59', '2021-05-03 02:46:59'),
(3, '2021-05-03', '10000', '5', 39, '2021-05-03 02:51:32', '2021-05-03 02:51:32'),
(4, '2021-05-04', '10000', '6', 41, '2021-05-03 02:57:02', '2021-05-03 02:57:02');

-- --------------------------------------------------------

--
-- Table structure for table `listing_documents`
--

CREATE TABLE `listing_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `listing_id` bigint(20) UNSIGNED DEFAULT NULL,
  `document` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listing_documents`
--

INSERT INTO `listing_documents` (`id`, `listing_id`, `document`, `title`, `created_at`, `updated_at`) VALUES
(1, 33, '1-main-608f449885a0a-1620001944/4ef72b2d291b2c9de97e6abff6453ade-w750-h500.jpg', 'new', '2021-05-03 01:01:14', '2021-05-03 01:01:14'),
(2, 33, '1-main-608f44af4ec40-1620001967/4ef72b2d291b2c9de97e6abff6453ade-w750-h500.jpg', 'file', '2021-05-03 01:01:14', '2021-05-03 01:01:14');

-- --------------------------------------------------------

--
-- Table structure for table `listing_features`
--

CREATE TABLE `listing_features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('on','off') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `listing_photos`
--

CREATE TABLE `listing_photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `listing_id` bigint(20) UNSIGNED DEFAULT NULL,
  `main` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `watermark` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` enum('main','watermark') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listing_photos`
--

INSERT INTO `listing_photos` (`id`, `listing_id`, `main`, `watermark`, `active`, `created_at`, `updated_at`) VALUES
(1, 16, '1-main-608de1907f111-1619911056/whatsapp-image-2020-11-08-at-3201ds7-pm-jpeg', '1-main-608de1907f111-1619911056/mainWatermark-whatsapp-image-2020-11-08-at-3201ds7-pm-jpeg', 'watermark', '2021-05-01 23:20:37', '2021-05-01 23:20:37'),
(2, 16, '1-main-608de190e5852-1619911056/whatsapp-image-2020-11-08-at-32016-pmjpeg', '1-main-608de190e5852-1619911056/mainWatermark-whatsapp-image-2020-11-08-at-32016-pmjpeg', 'watermark', '2021-05-01 23:20:37', '2021-05-01 23:20:37'),
(9, 23, '1-main-608de71db4659-1619912477/whatsapp-image-2020-11-08-at-3201ds7-pm-jpeg', '1-main-608de71db4659-1619912477/mainWatermark-whatsapp-image-2020-11-08-at-3201ds7-pm-jpeg', 'watermark', '2021-05-01 23:49:22', '2021-05-01 23:49:22'),
(10, 23, '1-main-608de71e36ba9-1619912478/whatsapp-image-2020-11-08-at-32016-pmjpeg', '1-main-608de71e36ba9-1619912478/mainWatermark-whatsapp-image-2020-11-08-at-32016-pmjpeg', 'watermark', '2021-05-01 23:49:22', '2021-05-01 23:49:22'),
(11, 23, '1-main-608de71e941c3-1619912478/whatsapp-image-2020-11-08-at-32017-pmjpeg', '1-main-608de71e941c3-1619912478/mainWatermark-whatsapp-image-2020-11-08-at-32017-pmjpeg', 'watermark', '2021-05-01 23:49:22', '2021-05-01 23:49:22'),
(12, 24, '1-main-608de96eeff2d-1619913070/WhatsApp-Image-2020-11-08-at-3.20.1ds7-PM-.jpeg', '1-main-608de96eeff2d-1619913070/mainWatermark-WhatsApp-Image-2020-11-08-at-3.20.1ds7-PM-.jpeg', 'watermark', '2021-05-01 23:51:18', '2021-05-01 23:51:18'),
(13, 24, '1-main-608de96f58db1-1619913071/WhatsApp-Image-2020-11-08-at-3.20.16-PM.jpeg', '1-main-608de96f58db1-1619913071/mainWatermark-WhatsApp-Image-2020-11-08-at-3.20.16-PM.jpeg', 'watermark', '2021-05-01 23:51:18', '2021-05-01 23:51:18'),
(14, 25, '1-main-608df22e45864-1619915310/WhatsApp-Image-2020-11-08-at-3.20.16-PM.jpeg', '1-main-608df22e45864-1619915310/mainWatermark-WhatsApp-Image-2020-11-08-at-3.20.16-PM.jpeg', 'watermark', '2021-05-02 00:28:41', '2021-05-02 00:28:41'),
(15, 25, '1-main-608df22ebccfe-1619915310/WhatsApp-Image-2020-11-08-at-3.20.17-PM.jpeg', '1-main-608df22ebccfe-1619915310/mainWatermark-WhatsApp-Image-2020-11-08-at-3.20.17-PM.jpeg', 'watermark', '2021-05-02 00:28:41', '2021-05-02 00:28:41'),
(16, 26, '1-main-608df2b9b0386-1619915449/WhatsApp-Image-2020-11-08-at-3.20.1d7-PM-.jpeg', '1-main-608df2b9b0386-1619915449/mainWatermark-WhatsApp-Image-2020-11-08-at-3.20.1d7-PM-.jpeg', 'watermark', '2021-05-02 00:31:47', '2021-05-02 00:31:47'),
(17, 26, '1-main-608df2ba36f94-1619915450/WhatsApp-Image-2020-11-08-at-3.20.1ds7-PM-.jpeg', '1-main-608df2ba36f94-1619915450/mainWatermark-WhatsApp-Image-2020-11-08-at-3.20.1ds7-PM-.jpeg', 'watermark', '2021-05-02 00:31:47', '2021-05-02 00:31:47'),
(18, 26, '1-main-608df2ba994fc-1619915450/WhatsApp-Image-2020-11-08-at-3.20.16-PM.jpeg', '1-main-608df2ba994fc-1619915450/mainWatermark-WhatsApp-Image-2020-11-08-at-3.20.16-PM.jpeg', 'watermark', '2021-05-02 00:31:47', '2021-05-02 00:31:47'),
(19, 26, '1-main-608df2bb1bd89-1619915451/WhatsApp-Image-2020-11-08-at-3.20.17-PM.jpeg', '1-main-608df2bb1bd89-1619915451/mainWatermark-WhatsApp-Image-2020-11-08-at-3.20.17-PM.jpeg', 'watermark', '2021-05-02 00:31:47', '2021-05-02 00:31:47'),
(20, 27, '1-main-608ec9ae6c129-1619970478/WhatsApp-Image-2020-11-08-at-3.20.1ds7-PM-.jpeg', '1-main-608ec9ae6c129-1619970478/mainWatermark-WhatsApp-Image-2020-11-08-at-3.20.1ds7-PM-.jpeg', 'watermark', '2021-05-02 15:50:17', '2021-05-02 15:50:17'),
(21, 28, '1-main-608ecbf82f8ec-1619971064/+¦+¦+ä-+å+¡+ä-+å+ê+º+¦+¬-+º+ä+¿+¦+¦+è+à-+¿+ä+º+¦+¬+è+â-3-+â+¼+à.jpg', '1-main-608ecbf82f8ec-1619971064/mainWatermark-+¦+¦+ä-+å+¡+ä-+å+ê+º+¦+¬-+º+ä+¿+¦+¦+è+à-+¿+ä+º+¦+¬+è+â-3-+â+¼+à.jpg', 'watermark', '2021-05-02 15:58:15', '2021-05-02 15:58:15'),
(22, 11, '2013-1383466204-965.jpg', 'mainWatermark-2013-1383466204-965.jpg', 'watermark', '2021-05-02 16:22:46', '2021-05-02 16:22:46'),
(23, 11, '3-easiest-ways-sweetness-turks-home-without-tiring-300x150.jpg', 'mainWatermark-3-easiest-ways-sweetness-turks-home-without-tiring-300x150.jpg', 'watermark', '2021-05-02 16:27:39', '2021-05-02 16:27:39'),
(24, 11, '4ef72b2d291b2c9de97e6abff6453ade-w750-h500.jpg', 'mainWatermark-4ef72b2d291b2c9de97e6abff6453ade-w750-h500.jpg', 'watermark', '2021-05-04 05:33:17', '2021-05-04 05:33:17'),
(25, 11, '4ef72b2d291b2c9de97e6abff6453ade-w750-h500.jpg', 'mainWatermark-4ef72b2d291b2c9de97e6abff6453ade-w750-h500.jpg', 'watermark', '2021-05-04 05:33:17', '2021-05-04 05:33:17');

-- --------------------------------------------------------

--
-- Table structure for table `listing_plans`
--

CREATE TABLE `listing_plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `listing_id` bigint(20) UNSIGNED DEFAULT NULL,
  `main` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `watermark` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` enum('main','watermark') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listing_plans`
--

INSERT INTO `listing_plans` (`id`, `listing_id`, `main`, `watermark`, `title`, `active`, `created_at`, `updated_at`) VALUES
(1, 30, '1-main-608ece3c74d43-1619971644/+¦.jpg', '1-main-608ece3c74d43-1619971644/mainWatermark-+¦.jpg', NULL, 'watermark', '2021-05-02 16:08:27', '2021-05-02 16:08:27'),
(2, 31, '1-main-608ed16c5218b-1619972460/DYTytfDW0AAaOyX.jpg', '1-main-608ed16c5218b-1619972460/mainWatermark-DYTytfDW0AAaOyX.jpg', NULL, 'watermark', '2021-05-02 16:22:46', '2021-05-02 16:22:46'),
(3, 32, '1-main-608ed2f66d89f-1619972854/hqdefault.jpg', '1-main-608ed2f66d89f-1619972854/mainWatermark-hqdefault.jpg', NULL, 'watermark', '2021-05-02 16:27:39', '2021-05-02 16:27:39');

-- --------------------------------------------------------

--
-- Table structure for table `listing_rent_cheques`
--

CREATE TABLE `listing_rent_cheques` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listing_rent_cheques`
--

INSERT INTO `listing_rent_cheques` (`id`, `name_en`, `name_ar`, `slug`, `agency_id`, `business_id`, `created_at`, `updated_at`) VALUES
(1, '1 cheque (Yearly)', '1 cheque (Yearly)', '1-cheque-yearly', 1, 1, '2021-04-23 15:48:55', '2021-04-23 15:48:55'),
(2, '2 cheques (Bi-Yearly)', '2 cheques (Bi-Yearly)', '2-cheques-bi-yearly', 1, 1, '2021-04-23 15:49:23', '2021-04-23 15:49:23'),
(3, '3 cheques (Triannual)', '3 cheques (Triannual)', '3-cheques-triannual', 1, 1, '2021-04-23 15:49:34', '2021-04-23 15:49:34'),
(4, '4 cheques (Quarterly)', '4 cheques (Quarterly)', '4-cheques-quarterly', 1, 1, '2021-04-23 15:49:46', '2021-04-23 15:49:46'),
(5, '6 cheques (Bi-Monthly )', '6 cheques (Bi-Monthly )', '6-cheques-bi-monthly', 1, 1, '2021-04-23 15:50:01', '2021-04-23 15:50:01'),
(6, '12 cheques (Monthly)', '12 cheques (Monthly)', '12-cheques-monthly', 1, 1, '2021-04-23 15:50:21', '2021-04-23 15:50:21');

-- --------------------------------------------------------

--
-- Table structure for table `listing_types`
--

CREATE TABLE `listing_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` enum('commercial','residential') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'residential',
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `furnished_question` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listing_types`
--

INSERT INTO `listing_types` (`id`, `name_en`, `name_ar`, `slug`, `agency_id`, `business_id`, `created_at`, `updated_at`, `type`, `reference`, `furnished_question`) VALUES
(2, 'Villa', 'فيلا', 'villa', 1, 1, '2021-04-22 12:11:20', '2021-05-03 03:22:47', 'residential', 'Vl', 'yes'),
(3, 'Apartment', 'شقه', 'apartment', 1, 1, '2021-04-22 12:22:39', '2021-04-22 12:22:58', 'residential', 'Ap', 'no'),
(4, 'Residential Floor', 'طابق سكني', 'residential-floor', 1, 1, '2021-04-22 12:24:10', '2021-04-22 12:29:44', 'residential', 'Rf', 'no'),
(5, 'Residential Plot', 'قطعة أرض سكنية', 'residential-plot', 1, 1, '2021-04-22 12:24:49', '2021-04-22 12:29:38', 'residential', 'Rp', 'no'),
(6, 'Townhouse', 'تاون هاوس', 'townhouse', 1, 1, '2021-04-22 12:26:01', '2021-04-22 12:26:01', 'residential', 'Th', 'no'),
(7, 'Residential Building', 'مبنى سكني', 'residential-building', 1, 1, '2021-04-22 12:26:48', '2021-04-22 12:26:48', 'residential', 'Rb', 'no'),
(8, 'Penthouse', 'شقة فوق السطح', 'penthouse', 1, 1, '2021-04-22 12:28:05', '2021-04-22 12:28:05', 'residential', 'Ph', 'no'),
(9, 'Villa Compound', 'مجمع فيلات', 'villa-compound', 1, 1, '2021-04-22 12:29:27', '2021-04-22 12:29:27', 'residential', 'Vc', 'no'),
(10, 'Hotel Apartment', 'شقة فندقية', 'hotel-apartment', 1, 1, '2021-04-22 12:30:44', '2021-04-22 12:30:44', 'residential', 'Ha', 'no'),
(11, 'Office', 'مكتب', 'office', 1, 1, '2021-04-22 12:31:25', '2021-04-22 12:31:25', 'commercial', 'Of', 'no'),
(12, 'Shop', 'محل', 'shop', 1, 1, '2021-04-22 12:31:53', '2021-04-22 12:31:53', 'commercial', 'Sp', 'no'),
(13, 'Warehouse', 'مستودع', 'warehouse', 1, 1, '2021-04-22 12:32:20', '2021-04-22 12:32:20', 'commercial', 'Wh', 'no'),
(14, 'Factory', 'مصنع', 'factory', 1, 1, '2021-04-22 12:33:18', '2021-04-22 12:33:18', 'commercial', 'Fo', 'no'),
(15, 'Labour Camp', 'معسكر العمل', 'labour-camp', 1, 1, '2021-04-22 12:34:02', '2021-04-22 12:34:02', 'commercial', 'Lc', 'no'),
(16, 'Commercial Building', 'مبنى تجاري', 'commercial-building', 1, 1, '2021-04-22 12:34:38', '2021-04-22 12:34:52', 'commercial', 'Cb', 'no'),
(17, 'Other Commercial', 'عقارات تجارية أخرى', 'other-commercial', 1, 1, '2021-04-22 12:35:21', '2021-04-22 12:35:27', 'commercial', 'Oc', 'no'),
(18, 'Commercial Floor', 'الدور التجارى', 'commercial-floor', 1, 1, '2021-04-22 12:36:25', '2021-04-22 12:36:25', 'commercial', 'Cf', 'no'),
(19, 'Commercial Plot', 'قطعة أرض تجارية', 'commercial-plot', 1, 1, '2021-04-22 12:36:53', '2021-04-22 12:36:53', 'commercial', 'Cp', 'no'),
(20, 'Bulk Units', 'الوحدات مجمعه', 'bulk-units', 1, 1, '2021-04-22 12:37:36', '2021-04-22 12:37:36', 'commercial', 'Bu', 'no'),
(21, 'Industrial Land', 'ارض صناعية', 'industrial-land', 1, 1, '2021-04-22 12:38:23', '2021-04-22 12:38:23', 'commercial', 'IL', 'no'),
(22, 'Mixed Use Land', 'أرض متعددة الاستخدامات', 'mixed-use-land', 1, 1, '2021-04-22 12:39:03', '2021-04-22 12:39:03', 'commercial', 'ML', 'no'),
(23, 'Showroom', 'قاعة عرض', 'showroom', 1, 1, '2021-04-22 12:39:34', '2021-04-22 12:39:43', 'commercial', 'Sr', 'no'),
(24, 'Commerical Villa', 'فيلا تجارية', 'commerical-villa', 1, 1, '2021-04-22 12:40:21', '2021-04-22 12:40:21', 'commercial', 'Cv', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `listing_videos`
--

CREATE TABLE `listing_videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `listing_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `host` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listing_videos`
--

INSERT INTO `listing_videos` (`id`, `listing_id`, `title`, `link`, `host`, `created_at`, `updated_at`) VALUES
(3, 35, 'title', 'https://www.youtube.com/watch?v=ivZk6fOtxZ0', 'vimeo', '2021-05-03 01:45:35', '2021-05-03 01:45:35'),
(4, 35, 'title', 'https://www.youtube.com/watch?v=ivZk6fOtxZ0', 'dailymotion', '2021-05-03 01:45:35', '2021-05-03 01:45:35'),
(5, 36, NULL, NULL, NULL, '2021-05-03 02:05:54', '2021-05-03 02:05:54'),
(6, 37, NULL, NULL, NULL, '2021-05-03 02:08:32', '2021-05-03 02:08:32'),
(7, 38, NULL, NULL, NULL, '2021-05-03 02:46:59', '2021-05-03 02:46:59'),
(8, 39, NULL, NULL, NULL, '2021-05-03 02:51:32', '2021-05-03 02:51:32'),
(15, 11, 'title update', 'https://www.youtube.com/watch?v=ivZk6fOtxZ0', 'youtube', '2021-05-04 05:33:17', '2021-05-04 05:33:17'),
(16, 11, 'title second', 'https://www.youtube.com/watch?v=ivZk6fOtxZ0', 'youtube', '2021-05-04 05:33:17', '2021-05-04 05:33:17');

-- --------------------------------------------------------

--
-- Table structure for table `listing_views`
--

CREATE TABLE `listing_views` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listing_views`
--

INSERT INTO `listing_views` (`id`, `name_en`, `name_ar`, `slug`, `agency_id`, `business_id`, `created_at`, `updated_at`) VALUES
(4, 'Pool View', 'Pool View', 'pool-view', 1, 1, '2021-04-22 15:29:00', '2021-04-22 15:29:00');
>>>>>>> 09ec62e9a57ce91a1d5b57895f83fa97513c9a2e:broker (1).sql

-- --------------------------------------------------------

--
-- Table structure for table `mail_lists`
--

CREATE TABLE `mail_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`manipulations`)),
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`custom_properties`)),
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`responsive_images`)),
  `order_column` int(10) UNSIGNED DEFAULT NULL,
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
(1, '2014_10_08_155536_create_businesses_table', 1),
(4, '2014_10_09_132366_create_users_table', 1),
(5, '2014_10_11_130742_create_agencies_table', 1),
(6, '2014_10_11_164024_create_teams_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2021_03_01_113552_create_permission_tables', 1),
(9, '2021_03_01_115015_create_media_table', 1),
(10, '2021_03_01_121558_create_permission_groups_table', 1),
(11, '2021_03_01_121719_add_agency_id_to_teams', 1),
(12, '2021_03_01_121719_add_business_id_to_agencies', 1),
(13, '2021_03_01_121719_add_permission_group_id_tp_permission', 1),
(14, '2021_03_01_164524_create_portals_table', 1),
(15, '2021_03_02_115940_create_task_types_table', 1),
(16, '2021_03_02_122010_create_task_statuses_table', 1),
(17, '2021_03_02_122419_add_can_access_to_users', 1),
(18, '2021_03_02_122419_add_description_to_users', 1),
(19, '2021_03_02_125430_create_tasks_table', 1),
(20, '2021_03_02_126107_create_task_notes_table', 1),
(21, '2021_03_02_153134_add_reference_to_tasks', 1),
(23, '2021_03_04_162611_create_mail_lists_table', 1),
(24, '2021_03_04_163032_create_contacts_mail_list_table', 1),
(29, '2021_03_07_165940_create_agency_settings_table', 1),
(30, '2014_10_09_132311_create_countries_table', 2),
(31, '2014_10_09_132326_create_cities_table', 2),
(132, '2021_02_28_105754_create_templates_table', 3),
(133, '2021_02_28_122601_create_contacts_table', 3),
(134, '2021_03_01_165940_create_agency_portals_table', 3),
(135, '2021_03_07_134333_create_lead_sources_table', 3),
(136, '2021_03_07_134357_create_lead_qualifications_table', 3),
(137, '2021_03_07_134411_create_lead_types_table', 3),
(138, '2021_03_07_134425_create_lead_communications_table', 3),
(139, '2021_03_07_134425_create_lead_priorities_table', 3),
(140, '2021_03_07_134425_create_lead_property_table', 3),
(141, '2021_03_07_142801_create_email_notifies_table', 3),
(142, '2021_03_07_143545_create_email_notify_reminders_table', 3),
(143, '2021_03_07_143611_create_email_notify_tenancy_table', 3),
(144, '2021_03_08_094009_create_image_banks_table', 3),
(145, '2021_03_08_094612_add_status_and_type_to_tasks_table', 3),
(146, '2021_03_08_133257_create_bank_images_table', 3),
(147, '2021_03_09_093654_create_leads_table', 3),
(148, '2021_03_09_094105_add_module_and_module_id_to_tasks', 3),
(149, '2021_03_09_132059_add_folder_id_to_image_banks_table', 3),
(150, '2021_03_09_140115_create_emails_table', 3),
(151, '2021_03_09_155410_add_dir_to_image_banks_table', 3),
(152, '2021_03_09_225554_create_floor_plans_table', 3),
(153, '2021_03_10_125710_add_language_to_users_table', 3),
(154, '2021_03_12_134425_create_calls_table', 3),
(155, '2021_03_14_126107_create_task_user_table', 3),
(156, '2021_03_14_134425_create_opportunity_stages_table', 3),
(157, '2021_03_14_143654_create_opportunities_table', 3),
(158, '2014_10_08_155536_create_languages_table', 4),
(159, '2014_10_08_155536_create_currencies_table', 5),
<<<<<<< HEAD:broker.sql
(160, '2021_03_07_134333_create_call_status_table', 6),
(161, '2021_03_09_140115_create_email_logs_table', 7),
(162, '2021_03_09_155410_add_columns_to_templates__table', 7),
(163, '2021_03_14_143654_add_status_id_to_calls_table', 7),
(164, '2021_03_14_143654_create_opportunity_assign_tracking_table', 7),
(165, '2021_03_14_143654_create_opportunity_questions_table', 7),
(166, '2021_03_14_143654_create_opportunity_results_table', 7),
(167, '2021_03_15_172428_add_business_id_and_agency_id_to_email_logs', 7),
(168, '2021_03_16_143654_add_converting_approval_to_opportunities_table', 7),
(169, '2021_03_16_143654_create_clients_table', 7),
(170, '2021_03_17_160305_create_notifications_table', 7),
(171, '2021_03_20_143654_add_hold_reason_to_opportunities', 7),
(172, '2021_03_20_143654_add_national_id_to_clients', 7),
(173, '2021_03_20_143654_add_reject_reason_to_opportunities', 7),
(174, '2021_03_20_143654_create_client_contracts_table', 7),
(175, '2021_03_20_143654_create_contract_document_table', 7),
(176, '2021_03_20_143654_create_contract_recurring_table', 7),
(177, '2021_03_21_131549_create_jobs_table', 7),
(178, '2021_03_26_143654_add_columns_to_contract_document', 7),
(179, '2021_03_26_143654_add_columns_to_opportunities', 7),
(180, '2021_04_14_143654_create_client_questions_table', 7);
=======
(160, '2021_03_09_140115_create_email_logs_table', 6),
(162, '2021_03_15_172428_add_business_id_and_agency_id_to_email_logs', 6),
(164, '2021_03_17_160305_create_notifications_table', 8),
(165, '2021_03_09_155410_add_columns_to_templates__table', 9),
(170, '2021_03_14_143654_create_opportunity_assign_tracking_table', 10),
(171, '2021_03_14_143654_create_opportunity_questions_table', 10),
(172, '2021_03_14_143654_create_opportunity_results_table', 11),
(173, '2021_03_07_134333_create_call_status_table', 12),
(174, '2021_03_14_143654_add_status_id_to_calls_table', 13),
(175, '2021_03_21_131549_create_jobs_table', 14),
(180, '2021_03_20_143654_create_client_contracts_table', 16),
(181, '2021_03_20_143654_create_contract_document_table', 16),
(182, '2021_03_20_143654_create_contract_recurring_table', 16),
(183, '2021_03_16_143654_add_converting_approval_to_opportunities_table', 17),
(184, '2021_03_16_143654_create_clients_table', 18),
(185, '2021_03_20_143654_add_national_id_to_clients', 19),
(186, '2021_03_20_143654_add_rejection_reason_to_opportunities', 20),
(187, '2021_03_20_143654_add_hold_reason_to_opportunities', 21),
(188, '2021_03_20_143654_add_reject_reason_to_opportunities', 22),
(189, '2021_03_26_143654_add_columns_to_contract_document', 23),
(190, '2021_03_26_143654_add_columns_to_opportunities', 24),
(191, '2021_04_14_143654_create_client_questions_table', 25),
(192, '2021_03_07_134411_create_developers_table', 26),
(203, '2021_04_21_112242_create_listing_views_table', 27),
(204, '2021_04_21_112742_create_listing_rent_cheques_table', 27),
(205, '2021_04_21_112742_create_listing_types_table', 27),
(206, '2021_04_21_112744_create_listings_table', 27),
(207, '2021_04_21_112758_create_listing_videos_table', 27),
(211, '2021_04_21_113223_create_listing_cheques_calculator_table', 27),
(212, '2021_04_21_113223_create_listing_features_table', 27),
(213, '2021_04_22_143654_add_columns_to_listings_table', 28),
(214, '2021_04_22_143654_add_type_to_listing_types_table', 28),
(215, '2021_04_22_143654_add_reference_to_listing_types_table', 29),
(216, '2021_04_22_143654_add_type_id_to_listings_table', 30),
(217, '2021_03_26_143654_add_role_to_lead_types', 31),
(218, '2021_03_26_143654_add_was_lead_to_clients', 32),
(219, '2021_04_15_090005_change_forign_on_client_questions_table', 33),
(220, '2021_04_21_113223_create_temporary_listings_photos_table', 33),
(221, '2021_04_22_143654_add_listing_id_to_listing_features_table', 1),
(222, '2021_04_28_132249_add_sub_community_to_leads_table', 34),
(223, '2021_04_28_132709_add_client_id_to_client_questions_table', 34),
(224, '2021_04_28_134024_add_sub_community_to_opportunities_table', 34),
(225, '2021_04_21_113006_create_listing_photos_table', 35),
(226, '2021_04_21_113223_create_temporary_listings_plans_table', 36),
(227, '2021_04_21_112815_create_listing_plans_table', 37),
(230, '2021_04_21_112807_create_listing_documents_table', 38),
(231, '2021_04_21_113223_create_temporary_listings_documents_table', 38),
(233, '2021_04_28_134024_add_furnished_question_to_listing_types_table', 39);
>>>>>>> 09ec62e9a57ce91a1d5b57895f83fa97513c9a2e:broker (1).sql

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 2),
(4, 'App\\Models\\User', 1),
(5, 'App\\Models\\User', 1),
(5, 'App\\Models\\User', 2),
(6, 'App\\Models\\User', 1),
(6, 'App\\Models\\User', 2),
(7, 'App\\Models\\User', 1),
(8, 'App\\Models\\User', 1),
(8, 'App\\Models\\User', 2),
(9, 'App\\Models\\User', 1),
(9, 'App\\Models\\User', 2),
(10, 'App\\Models\\User', 1),
(10, 'App\\Models\\User', 2),
(11, 'App\\Models\\User', 1),
(12, 'App\\Models\\User', 1),
(13, 'App\\Models\\User', 1),
(14, 'App\\Models\\User', 1),
(15, 'App\\Models\\User', 1),
(16, 'App\\Models\\User', 1),
(17, 'App\\Models\\User', 1),
(17, 'App\\Models\\User', 2),
(18, 'App\\Models\\User', 1),
(18, 'App\\Models\\User', 2),
(19, 'App\\Models\\User', 1),
(19, 'App\\Models\\User', 2),
(20, 'App\\Models\\User', 1),
(20, 'App\\Models\\User', 2),
(21, 'App\\Models\\User', 1),
(21, 'App\\Models\\User', 2),
(24, 'App\\Models\\User', 1),
(24, 'App\\Models\\User', 2),
(25, 'App\\Models\\User', 1),
(26, 'App\\Models\\User', 1),
(27, 'App\\Models\\User', 1),
(28, 'App\\Models\\User', 1),
(29, 'App\\Models\\User', 1),
(30, 'App\\Models\\User', 1),
(30, 'App\\Models\\User', 2),
(31, 'App\\Models\\User', 1),
(32, 'App\\Models\\User', 1),
(33, 'App\\Models\\User', 1),
(34, 'App\\Models\\User', 1),
(35, 'App\\Models\\User', 1),
(35, 'App\\Models\\User', 2),
(36, 'App\\Models\\User', 1),
(37, 'App\\Models\\User', 1),
(38, 'App\\Models\\User', 1),
(39, 'App\\Models\\User', 1),
(40, 'App\\Models\\User', 1),
(41, 'App\\Models\\User', 1),
(42, 'App\\Models\\User', 1),
(42, 'App\\Models\\User', 2),
(43, 'App\\Models\\User', 1),
(44, 'App\\Models\\User', 1),
(45, 'App\\Models\\User', 1),
(45, 'App\\Models\\User', 2),
(46, 'App\\Models\\User', 1),
(47, 'App\\Models\\User', 1),
(48, 'App\\Models\\User', 1),
(48, 'App\\Models\\User', 2),
(49, 'App\\Models\\User', 1),
(50, 'App\\Models\\User', 1),
(50, 'App\\Models\\User', 2),
(51, 'App\\Models\\User', 1),
(52, 'App\\Models\\User', 1),
(52, 'App\\Models\\User', 2),
(53, 'App\\Models\\User', 1),
(54, 'App\\Models\\User', 1),
(55, 'App\\Models\\User', 1),
(56, 'App\\Models\\User', 1),
(57, 'App\\Models\\User', 1),
(57, 'App\\Models\\User', 2),
(58, 'App\\Models\\User', 1),
(58, 'App\\Models\\User', 2),
(59, 'App\\Models\\User', 1),
(60, 'App\\Models\\User', 1),
(61, 'App\\Models\\User', 1),
(62, 'App\\Models\\User', 1),
(63, 'App\\Models\\User', 1),
(64, 'App\\Models\\User', 1),
(65, 'App\\Models\\User', 1),
<<<<<<< HEAD:broker.sql
(66, 'App\\Models\\User', 1);
=======
(66, 'App\\Models\\User', 1),
(66, 'App\\Models\\User', 2),
(67, 'App\\Models\\User', 1),
(68, 'App\\Models\\User', 1),
(69, 'App\\Models\\User', 1),
(70, 'App\\Models\\User', 1),
(71, 'App\\Models\\User', 1),
(72, 'App\\Models\\User', 1),
(73, 'App\\Models\\User', 1),
(74, 'App\\Models\\User', 1),
(75, 'App\\Models\\User', 1),
(76, 'App\\Models\\User', 1),
(77, 'App\\Models\\User', 1),
(78, 'App\\Models\\User', 1),
(79, 'App\\Models\\User', 1);
>>>>>>> 09ec62e9a57ce91a1d5b57895f83fa97513c9a2e:broker (1).sql

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

<<<<<<< HEAD:broker.sql
=======
--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('0a7c12d3-df4f-4931-b4d3-eaff8b73e7cb', 'App\\Notifications\\OpportunityNotification', 'App\\Models\\User', 2, '{\"message\":\"A New Opportunity Has Been Assigned To You\",\"opportunity_id\":1,\"type\":\"assign\"}', NULL, '2021-03-21 21:00:22', '2021-03-21 21:00:22'),
('0c03d63f-5cad-4cf4-9f5e-6fe8b646b4ef', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 1, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', NULL, '2021-04-20 11:15:58', '2021-04-20 11:15:58'),
('145879b1-ba61-468c-b1e7-a70e3b69654e', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 9, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', NULL, '2021-04-20 11:45:48', '2021-04-20 11:45:48'),
('14e3f0ae-6892-483d-8402-86fb2b084b28', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 9, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', NULL, '2021-04-20 11:46:10', '2021-04-20 11:46:10'),
('15fe1abf-9f08-4840-8793-a7fc3bae2dd9', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 1, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', NULL, '2021-04-20 11:45:48', '2021-04-20 11:45:48'),
('1f862052-ac36-429d-b098-3ebb7577a109', 'App\\Notifications\\OpportunityQuestionNotification', 'App\\Models\\User', 9, '{\"message\":\"A New Opportunity Question Has Been Made By Management\",\"opportunity_question_id\":13,\"type\":\"question\"}', NULL, '2021-04-14 13:17:21', '2021-04-14 13:17:21'),
('215155d0-cabd-4d2b-8d62-4c01d899cffc', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 2, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', NULL, '2021-03-21 21:07:12', '2021-03-21 21:07:12'),
('2601459c-bccf-45b9-8520-28a90036f949', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 1, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":5,\"type\":\"task\"}', NULL, '2021-04-20 07:59:19', '2021-04-20 07:59:19'),
('2d9e9248-608f-42e9-b4e3-c99db897f4ac', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 9, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', NULL, '2021-04-20 11:46:37', '2021-04-20 11:46:37'),
('3004882a-14b8-4f0e-a891-214a407c6655', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 2, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', NULL, '2021-04-20 11:52:22', '2021-04-20 11:52:22'),
('37cfa68c-d2ef-4cb9-9f57-378063cb448d', 'App\\Notifications\\OpportunityNotification', 'App\\Models\\User', 1, '{\"message\":\"A New Opportunity Has Been Assigned To You\",\"opportunity_id\":2,\"type\":\"assign\"}', NULL, '2021-04-14 12:40:43', '2021-04-14 12:40:43'),
('3a950201-541c-4f97-aa12-a3cdfd2bf8ae', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 2, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', NULL, '2021-04-20 11:15:58', '2021-04-20 11:15:58'),
('3d7f3ab4-02ee-41a5-9e72-500ea6bdfb20', 'App\\Notifications\\OpportunityQuestionNotification', 'App\\Models\\User', 9, '{\"message\":\"A New Opportunity Question Has Been Made By Management\",\"opportunity_question_id\":8,\"type\":\"question\"}', NULL, '2021-04-14 13:00:47', '2021-04-14 13:00:47'),
('40e67eda-62d1-4218-8fbf-672067d2f547', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 2, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":5,\"type\":\"task\"}', NULL, '2021-04-20 11:59:45', '2021-04-20 11:59:45'),
('44e2f1cd-65fb-4257-8cf8-0604ee8db577', 'App\\Notifications\\OpportunityNotification', 'App\\Models\\User', 2, '{\"message\":\"A New Opportunity Has Been Assigned To You\",\"opportunity_id\":2,\"type\":\"assign\"}', NULL, '2021-04-14 13:20:20', '2021-04-14 13:20:20'),
('4c78cbe9-1446-42e1-8153-58d20a233cc1', 'App\\Notifications\\OpportunityNotification', 'App\\Models\\User', 9, '{\"message\":\"A New Opportunity Has Been Assigned To You\",\"opportunity_id\":2,\"type\":\"assign\"}', NULL, '2021-04-14 13:20:20', '2021-04-14 13:20:20'),
('50d561ad-153f-4104-8d55-8c998f9a189a', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 2, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', NULL, '2021-04-20 11:45:30', '2021-04-20 11:45:30'),
('534dce99-272f-4951-803a-0f049daac6f4', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 9, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":5,\"type\":\"task\"}', NULL, '2021-04-20 12:03:42', '2021-04-20 12:03:42'),
('55c5cdb0-bf20-43e3-883f-c86f1ccc4f19', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 9, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', NULL, '2021-04-20 11:47:07', '2021-04-20 11:47:07'),
('5852cc28-12bf-4d7e-8903-a6625f2a738f', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 9, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', NULL, '2021-04-20 11:46:29', '2021-04-20 11:46:29'),
('5a992357-5b45-49d1-9b47-6ec4bbce4edb', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 1, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', NULL, '2021-04-20 11:47:07', '2021-04-20 11:47:07'),
('5e05debf-e362-43d8-8c6b-bedcad071bf2', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 9, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', NULL, '2021-04-20 11:46:53', '2021-04-20 11:46:53'),
('646eecb4-abc8-4843-9671-7143b26574ee', 'App\\Notifications\\OpportunityQuestionNotification', 'App\\Models\\User', 9, '{\"message\":\"A New Opportunity Question Has Been Made By Management\",\"opportunity_question_id\":6,\"type\":\"question\"}', NULL, '2021-04-14 12:54:56', '2021-04-14 12:54:56'),
('64e0aaeb-bb67-4c48-a829-daca463c25d4', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 9, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', NULL, '2021-04-20 11:16:12', '2021-04-20 11:16:12'),
('6984c1ee-e561-4a78-92b0-8085623a668a', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 9, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', NULL, '2021-04-20 11:46:23', '2021-04-20 11:46:23'),
('69c88b3a-53f1-4d8d-922f-72ee0acc67b5', 'App\\Notifications\\OpportunityQuestionNotification', 'App\\Models\\User', 9, '{\"message\":\"A New Opportunity Question Has Been Made By Management\",\"opportunity_question_id\":17,\"type\":\"question\"}', NULL, '2021-04-15 10:58:53', '2021-04-15 10:58:53'),
('6edbfc7a-7601-4f01-add4-7fd0da2ac21e', 'App\\Notifications\\OpportunityQuestionNotification', 'App\\Models\\User', 9, '{\"message\":\"A New Opportunity Question Has Been Made By Management\",\"opportunity_question_id\":11,\"type\":\"question\"}', NULL, '2021-04-14 13:14:19', '2021-04-14 13:14:19'),
('70f96c3a-7c71-4d64-8eb7-267b3c42907c', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 9, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":5,\"type\":\"task\"}', NULL, '2021-04-20 11:59:45', '2021-04-20 11:59:45'),
('75493ae1-37ea-4662-bb23-81858b1c8849', 'App\\Notifications\\OpportunityQuestionNotification', 'App\\Models\\User', 9, '{\"message\":\"A New Opportunity Question Has Been Made By Management\",\"opportunity_question_id\":9,\"type\":\"question\"}', NULL, '2021-04-14 13:03:42', '2021-04-14 13:03:42'),
('7bf2217e-3673-477f-a6cf-86553ef71419', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 9, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', NULL, '2021-04-20 11:15:58', '2021-04-20 11:15:58'),
('7ca91436-d3c0-4482-94c8-f1d0e4a8825d', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 9, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', NULL, '2021-04-20 11:46:02', '2021-04-20 11:46:02'),
('7ed05fb5-8042-4dc1-a42b-81db6a71aa94', 'App\\Notifications\\OpportunityQuestionNotification', 'App\\Models\\User', 9, '{\"message\":\"A New Opportunity Question Has Been Made By Management\",\"opportunity_question_id\":7,\"type\":\"question\"}', NULL, '2021-04-14 13:00:23', '2021-04-14 13:00:23'),
('81edebbb-4e4b-4231-9456-deba75caa6c5', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 9, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":5,\"type\":\"task\"}', NULL, '2021-04-20 11:59:37', '2021-04-20 11:59:37'),
('890df2f4-abeb-404c-868a-407b9811945b', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 2, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":5,\"type\":\"task\"}', NULL, '2021-04-20 07:59:19', '2021-04-20 07:59:19'),
('8a91c5eb-89d1-461c-b471-ac94b8f8d067', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 9, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', NULL, '2021-04-20 11:52:41', '2021-04-20 11:52:41'),
('8abdfdba-e818-46e4-b7d1-82072eedb57b', 'App\\Notifications\\OpportunityResultNotification', 'App\\Models\\User', 1, '{\"message\":\"A New Opportunity Result Has Been Confirmed To You\",\"opportunity_result_id\":3,\"type\":\"result\"}', NULL, '2021-04-14 14:22:21', '2021-04-14 14:22:21'),
('8c7e78e3-43f6-42cc-b46d-8c9ceb9fe86b', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 2, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', NULL, '2021-04-20 11:46:10', '2021-04-20 11:46:10'),
('8d120aac-5477-4b83-8cec-b3881c32739e', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 2, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', NULL, '2021-04-20 11:46:37', '2021-04-20 11:46:37'),
('91fe014e-6477-4fa7-8eed-319a678fbc87', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 1, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', NULL, '2021-04-20 11:46:53', '2021-04-20 11:46:53'),
('93874221-25cc-43cd-9d3d-3f0ee3656f06', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 9, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', NULL, '2021-04-20 11:52:22', '2021-04-20 11:52:22'),
('98acdeb4-5db4-432c-8bb4-589c44c99186', 'App\\Notifications\\OpportunityQuestionNotification', 'App\\Models\\User', 9, '{\"message\":\"A New Opportunity Question Has Been Made By Management\",\"opportunity_question_id\":15,\"type\":\"question\"}', NULL, '2021-04-14 13:24:54', '2021-04-14 13:24:54'),
('9d92cae8-a803-482f-b6e1-a2106073748b', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 2, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":5,\"type\":\"task\"}', NULL, '2021-04-20 12:03:42', '2021-04-20 12:03:42'),
('a09e9127-e58f-495b-aed9-c2db26c179ba', 'App\\Notifications\\OpportunityQuestionNotification', 'App\\Models\\User', 9, '{\"message\":\"A New Opportunity Question Has Been Made By Management\",\"opportunity_question_id\":16,\"type\":\"question\"}', NULL, '2021-04-14 13:25:59', '2021-04-14 13:25:59'),
('a0a5ab7d-e310-44f1-a1bc-82abe7dd4a45', 'App\\Notifications\\OpportunityAnswerNotification', 'App\\Models\\User', 1, '{\"message\":\"Opportunity Answer Has Been Made Staff\",\"opportunity_answer_id\":1,\"type\":\"answer\"}', NULL, '2021-04-14 13:32:27', '2021-04-14 13:32:27'),
('a352b255-6dfc-4052-bcb4-fa487b4b79a1', 'App\\Notifications\\OpportunityNotification', 'App\\Models\\User', 9, '{\"message\":\"A New Opportunity Has Been Assigned To You\",\"opportunity_id\":2,\"type\":\"assign\"}', NULL, '2021-04-14 12:48:50', '2021-04-14 12:48:50'),
('a36c59c1-1ab6-412b-912d-4976468ebcea', 'App\\Notifications\\OpportunityQuestionNotification', 'App\\Models\\User', 2, '{\"message\":\"A New Opportunity Question Has Been Made By Management\",\"opportunity_question_id\":17,\"type\":\"question\"}', NULL, '2021-04-15 10:58:53', '2021-04-15 10:58:53'),
('a506fe3a-6501-4826-b77c-336c2d80ecda', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 2, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', NULL, '2021-04-20 11:52:41', '2021-04-20 11:52:41'),
('a653d39e-7429-4353-9591-d4e8b5507dcb', 'App\\Notifications\\OpportunityNotification', 'App\\Models\\User', 2, '{\"message\":\"A New Opportunity Has Been Assigned To You\",\"opportunity_id\":2,\"type\":\"assign\"}', NULL, '2021-03-22 11:48:47', '2021-03-22 11:48:47'),
('ac4ad4f7-7e0a-4343-a2f8-28215716d2ec', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 2, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":2,\"type\":\"task\"}', NULL, '2021-04-14 15:06:41', '2021-04-14 15:06:41'),
('acb92036-724c-4f22-a9ff-8ee3d5b7c4b0', 'App\\Notifications\\OpportunityQuestionNotification', 'App\\Models\\User', 9, '{\"message\":\"A New Opportunity Question Has Been Made By Management\",\"opportunity_question_id\":3,\"type\":\"question\"}', NULL, '2021-04-14 12:49:22', '2021-04-14 12:49:22'),
('ad790aef-e2a2-4926-804b-c99b74ced9d1', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 1, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', NULL, '2021-04-20 11:46:01', '2021-04-20 11:46:01'),
('aee683c3-3653-4d7a-bb4b-f976f8fc4cc0', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 2, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', NULL, '2021-04-20 11:46:01', '2021-04-20 11:46:01'),
('b1769afb-e194-4d8d-874f-240457a873d3', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 2, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":5,\"type\":\"task\"}', NULL, '2021-04-20 11:59:37', '2021-04-20 11:59:37'),
('b65c39a6-73d1-4c60-87db-8f4ef6c5db5d', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 1, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', NULL, '2021-04-20 11:46:22', '2021-04-20 11:46:22'),
('b68ef8fd-3ce2-43e7-aeac-a19b6d2c21bf', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 2, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":3,\"type\":\"task\"}', NULL, '2021-04-20 12:03:33', '2021-04-20 12:03:33'),
('bf3f03a0-720c-494b-9023-54ad055d5dc5', 'App\\Notifications\\OpportunityQuestionNotification', 'App\\Models\\User', 2, '{\"message\":\"A New Opportunity Question Has Been Made By Management\",\"opportunity_question_id\":1,\"type\":\"question\"}', NULL, '2021-04-14 12:40:16', '2021-04-14 12:40:16'),
('c106031a-784f-4f4d-9e68-97d9f1c69618', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 9, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', NULL, '2021-04-20 11:54:15', '2021-04-20 11:54:15'),
('c182a108-79e5-495c-96d8-54ab98e756c3', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 2, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', NULL, '2021-04-20 11:16:12', '2021-04-20 11:16:12'),
('c4b1e3d5-a1b0-4c10-9702-c4b65142e02a', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 9, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":5,\"type\":\"task\"}', NULL, '2021-04-20 07:59:19', '2021-04-20 07:59:19'),
('c5d8039b-cb04-40b2-892e-f9d6439c880c', 'App\\Notifications\\OpportunityQuestionNotification', 'App\\Models\\User', 9, '{\"message\":\"A New Opportunity Question Has Been Made By Management\",\"opportunity_question_id\":5,\"type\":\"question\"}', NULL, '2021-04-14 12:53:09', '2021-04-14 12:53:09'),
('cb99008d-0c97-4630-8da9-bc39533382a6', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 9, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', NULL, '2021-04-20 11:47:13', '2021-04-20 11:47:13'),
('cd7fb886-fc91-4bbc-9570-1a95acf35c6f', 'App\\Notifications\\OpportunityAnswerNotification', 'App\\Models\\User', 1, '{\"message\":\"Opportunity Answer Has Been Made Staff\",\"opportunity_answer_id\":2,\"type\":\"answer\"}', NULL, '2021-04-14 13:59:43', '2021-04-14 13:59:43'),
('d1af9acf-4262-473b-baab-5ab889bbf7a5', 'App\\Notifications\\OpportunityQuestionNotification', 'App\\Models\\User', 9, '{\"message\":\"A New Opportunity Question Has Been Made By Management\",\"opportunity_question_id\":10,\"type\":\"question\"}', NULL, '2021-04-14 13:12:07', '2021-04-14 13:12:07'),
('d6b46dcb-ca21-452b-9f8a-e41cd7bc2e55', 'App\\Notifications\\OpportunityNotification', 'App\\Models\\User', 1, '{\"message\":\"A New Opportunity Has Been Assigned To You\",\"opportunity_id\":2,\"type\":\"assign\"}', NULL, '2021-04-14 13:20:20', '2021-04-14 13:20:20'),
('d84a5d17-07fb-4f4c-baa2-d29257944211', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 2, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', NULL, '2021-04-20 11:54:15', '2021-04-20 11:54:15'),
('d955df82-17bb-474b-b723-11da17558c16', 'App\\Notifications\\OpportunityQuestionNotification', 'App\\Models\\User', 2, '{\"message\":\"A New Opportunity Question Has Been Made By Management\",\"opportunity_question_id\":16,\"type\":\"question\"}', NULL, '2021-04-14 13:25:59', '2021-04-14 13:25:59'),
('da19a312-6402-440b-9cf9-9492f355b0a1', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 1, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', NULL, '2021-04-20 11:54:15', '2021-04-20 11:54:15'),
('db4de76c-726f-449f-b73d-392c7a9c6060', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 2, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":3,\"type\":\"task\"}', NULL, '2021-04-14 15:12:02', '2021-04-14 15:12:02'),
('dcc168fd-a073-4a0e-9971-032f29554fa4', 'App\\Notifications\\OpportunityQuestionNotification', 'App\\Models\\User', 9, '{\"message\":\"A New Opportunity Question Has Been Made By Management\",\"opportunity_question_id\":14,\"type\":\"question\"}', NULL, '2021-04-14 13:19:07', '2021-04-14 13:19:07'),
('ddb4a5b5-9e62-47cc-a1bd-d29b96534986', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 9, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', NULL, '2021-04-20 11:59:52', '2021-04-20 11:59:52'),
('de6e32b3-879c-4f38-9866-a4593372cfda', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 2, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', NULL, '2021-04-20 11:52:35', '2021-04-20 11:52:35'),
('e73fd417-277d-4ffe-84e8-874bec6f1b10', 'App\\Notifications\\OpportunityQuestionNotification', 'App\\Models\\User', 2, '{\"message\":\"A New Opportunity Question Has Been Made By Management\",\"opportunity_question_id\":15,\"type\":\"question\"}', NULL, '2021-04-14 13:24:54', '2021-04-14 13:24:54'),
('f4b92c4d-66b5-4b20-8e69-382898dd4c5e', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 1, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', NULL, '2021-04-20 11:46:10', '2021-04-20 11:46:10'),
('f5e50ff8-4093-4d49-bc86-b4378ade2a93', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 1, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', NULL, '2021-04-20 11:59:52', '2021-04-20 11:59:52'),
('f749949b-0ddf-4d74-8080-faa938813bce', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 9, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', NULL, '2021-04-20 12:00:00', '2021-04-20 12:00:00'),
('f7c596b7-7e75-4d60-b2d6-5a1f3b7d8400', 'App\\Notifications\\OpportunityResultNotification', 'App\\Models\\User', 1, '{\"message\":\"A New Opportunity Result Has Been Confirmed To You\",\"opportunity_result_id\":4,\"type\":\"result\"}', NULL, '2021-04-15 11:17:52', '2021-04-15 11:17:52'),
('fb045487-8514-471d-a768-fa879e94f9d3', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 9, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', NULL, '2021-04-20 11:52:35', '2021-04-20 11:52:35'),
('fbe4e226-1ff0-4519-974b-adfadff02555', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 9, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', NULL, '2021-04-20 12:00:09', '2021-04-20 12:00:09');

>>>>>>> 09ec62e9a57ce91a1d5b57895f83fa97513c9a2e:broker (1).sql
-- --------------------------------------------------------

--
-- Table structure for table `opportunities`
--

CREATE TABLE `opportunities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `probability_of_winning` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `next_action` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `next_action_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `forecast_closing_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expected_revenue` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stage_id` bigint(20) UNSIGNED DEFAULT NULL,
  `agency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED DEFAULT NULL,
  `converted_by` bigint(20) UNSIGNED DEFAULT NULL,
  `assigned_to` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salutation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `source_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `qualification_id` bigint(20) UNSIGNED DEFAULT NULL,
  `communication_id` bigint(20) UNSIGNED DEFAULT NULL,
  `priority_id` bigint(20) UNSIGNED DEFAULT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `po_box` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_expiration_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sec_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `partner_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `phone1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `landline` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `developer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `community` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `building_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_purpose` enum('rent','buy') COLLATE utf8mb4_unicode_ci DEFAULT 'rent',
  `property_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_id` bigint(20) UNSIGNED DEFAULT NULL,
  `size_sqft` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size_sqm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bedrooms` int(11) DEFAULT NULL,
  `bathrooms` int(11) DEFAULT NULL,
  `parkings` int(11) DEFAULT NULL,
  `skype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_flag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timezone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `converting_approval` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hold_reason` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reject_reason` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rejected_by` bigint(20) UNSIGNED DEFAULT NULL,
  `reject_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hold_by` bigint(20) UNSIGNED DEFAULT NULL,
  `hold_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `submit_for_approve_by` bigint(20) UNSIGNED DEFAULT NULL,
  `submit_for_approve_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_community` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `opportunities`
--

<<<<<<< HEAD:broker.sql
INSERT INTO `opportunities` (`id`, `probability_of_winning`, `next_action`, `next_action_date`, `forecast_closing_date`, `expected_revenue`, `note`, `stage_id`, `agency_id`, `business_id`, `converted_by`, `assigned_to`, `salutation`, `source_id`, `type_id`, `qualification_id`, `communication_id`, `priority_id`, `company`, `website`, `po_box`, `passport`, `passport_expiration_date`, `first_name`, `sec_name`, `full_name`, `partner_name`, `date_of_birth`, `email1`, `email2`, `email3`, `nationality_id`, `city_id`, `phone1`, `phone2`, `phone3`, `phone4`, `landline`, `fax`, `developer`, `community`, `building_name`, `property_purpose`, `property_no`, `property_reference`, `property_id`, `size_sqft`, `size_sqm`, `bedrooms`, `bathrooms`, `parkings`, `skype`, `country_code`, `country_flag`, `timezone`, `country`, `address`, `other`, `created_at`, `updated_at`, `converting_approval`, `hold_reason`, `reject_reason`, `rejected_by`, `reject_date`, `hold_by`, `hold_date`, `submit_for_approve_by`, `submit_for_approve_date`) VALUES
(1, '36', 'reviewing', '2021-03-15', '2021-03-15', '20000', NULL, 1, 1, 1, 1, 'a:2:{i:0;s:1:\"2\";i:1;s:1:\"3\";}', 'Mrs', 1, 1, 1, 1, 1, NULL, NULL, '123456 po', NULL, NULL, 'mohamed', NULL, 'Shady osama', NULL, NULL, 'shady@onetecgroup.com', 'shady@onetecgroup.com', 'shady@onetecgroup.com', 66, NULL, '01006143107', '201006143107', NULL, NULL, '1234567', '12356', '1234567', '1234567', NULL, 'buy', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, '+20', 'egypt.png', 'Africa/Cairo', 'Egypt', '10th Ahmed Hassan St. - Nasr City', NULL, '2021-03-15 12:41:18', '2021-03-15 17:05:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
=======
INSERT INTO `opportunities` (`id`, `probability_of_winning`, `next_action`, `next_action_date`, `forecast_closing_date`, `expected_revenue`, `stage_id`, `agency_id`, `business_id`, `converted_by`, `assigned_to`, `salutation`, `source_id`, `type_id`, `qualification_id`, `communication_id`, `priority_id`, `company`, `website`, `po_box`, `passport`, `passport_expiration_date`, `first_name`, `sec_name`, `full_name`, `partner_name`, `date_of_birth`, `email1`, `email2`, `email3`, `nationality_id`, `city_id`, `phone1`, `phone2`, `phone3`, `phone4`, `landline`, `fax`, `developer`, `community`, `building_name`, `property_purpose`, `property_no`, `property_reference`, `property_id`, `size_sqft`, `size_sqm`, `bedrooms`, `bathrooms`, `parkings`, `skype`, `country_code`, `country_flag`, `timezone`, `country`, `address`, `other`, `created_at`, `updated_at`, `status`, `stage`, `converting_approval`, `hold_reason`, `reject_reason`, `rejected_by`, `reject_date`, `hold_by`, `hold_date`, `submit_for_approve_by`, `submit_for_approve_date`, `sub_community`) VALUES
(2, '35', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 'a:3:{i:0;s:1:\"2\";i:1;s:1:\"9\";i:2;s:1:\"1\";}', 'Mr', 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, 'Ahmed', 'mohamed', 'Ahmed mohamed', NULL, NULL, NULL, NULL, NULL, 66, NULL, '201006143107', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rent', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Egypt', NULL, NULL, '2021-03-22 11:48:47', '2021-04-15 11:17:52', 'successful', 'pending', 'rejected', NULL, 'reject', 1, '2021-03-26', NULL, NULL, NULL, NULL, NULL);
>>>>>>> 09ec62e9a57ce91a1d5b57895f83fa97513c9a2e:broker (1).sql

-- --------------------------------------------------------

--
-- Table structure for table `opportunity_assign_tracking`
--

CREATE TABLE `opportunity_assign_tracking` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `opportunity_id` bigint(20) UNSIGNED DEFAULT NULL,
  `reason_change_assign` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED DEFAULT NULL,
  `assigned_by` bigint(20) UNSIGNED DEFAULT NULL,
  `assigned_to` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_assign` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_assign` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('on','off') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'on',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `opportunity_questions`
--

CREATE TABLE `opportunity_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `opportunity_id` bigint(20) UNSIGNED DEFAULT NULL,
  `question` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answered` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `agency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `added_by` bigint(20) UNSIGNED DEFAULT NULL,
  `answered_by` bigint(20) UNSIGNED DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

<<<<<<< HEAD:broker.sql
=======
--
-- Dumping data for table `opportunity_questions`
--

INSERT INTO `opportunity_questions` (`id`, `opportunity_id`, `question`, `answer`, `answered`, `agency_id`, `added_by`, `answered_by`, `business_id`, `created_at`, `updated_at`) VALUES
(1, 2, 'اخر الاخبار', 'لسه مافيش جديد', 'yes', 1, 1, 2, 1, '2021-04-14 12:40:15', '2021-04-14 13:32:27'),
(2, 2, 'ماذا', 'test', 'yes', 1, 1, 2, 1, '2021-04-14 12:41:25', '2021-04-14 13:59:43'),
(3, 2, 'ماذاااا', NULL, 'no', 1, 1, NULL, 1, '2021-04-14 12:49:21', '2021-04-14 12:49:21'),
(4, 2, 'ddd', NULL, 'no', 1, 1, NULL, 1, '2021-04-14 12:52:17', '2021-04-14 12:52:17'),
(5, 2, 'ddd', NULL, 'no', 1, 1, NULL, 1, '2021-04-14 12:53:09', '2021-04-14 12:53:09'),
(6, 2, 'ddd', NULL, 'no', 1, 1, NULL, 1, '2021-04-14 12:54:56', '2021-04-14 12:54:56'),
(7, 2, 'ddd', NULL, 'no', 1, 1, NULL, 1, '2021-04-14 13:00:23', '2021-04-14 13:00:23'),
(8, 2, 'ddd', NULL, 'no', 1, 1, NULL, 1, '2021-04-14 13:00:47', '2021-04-14 13:00:47'),
(9, 2, 'ddd', NULL, 'no', 1, 1, NULL, 1, '2021-04-14 13:03:39', '2021-04-14 13:03:39'),
(10, 2, 'ddd', NULL, 'no', 1, 1, NULL, 1, '2021-04-14 13:12:07', '2021-04-14 13:12:07'),
(11, 2, 'ddd', NULL, 'no', 1, 1, NULL, 1, '2021-04-14 13:14:19', '2021-04-14 13:14:19'),
(12, 2, 'ddd', NULL, 'no', 1, 1, NULL, 1, '2021-04-14 13:14:46', '2021-04-14 13:14:46'),
(13, 2, 'ddd', NULL, 'no', 1, 1, NULL, 1, '2021-04-14 13:17:21', '2021-04-14 13:17:21'),
(14, 2, 'ddd', NULL, 'no', 1, 1, NULL, 1, '2021-04-14 13:19:07', '2021-04-14 13:19:07'),
(15, 2, 'what a question', NULL, 'no', 1, 1, NULL, 1, '2021-04-14 13:24:54', '2021-04-14 13:24:54'),
(16, 2, 'what a question', NULL, 'no', 1, 1, NULL, 1, '2021-04-14 13:25:59', '2021-04-14 13:25:59'),
(17, 2, 'gt', NULL, 'no', 1, 1, NULL, 1, '2021-04-15 10:58:53', '2021-04-15 10:58:53');

>>>>>>> 09ec62e9a57ce91a1d5b57895f83fa97513c9a2e:broker (1).sql
-- --------------------------------------------------------

--
-- Table structure for table `opportunity_results`
--

CREATE TABLE `opportunity_results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `opportunity_id` bigint(20) UNSIGNED DEFAULT NULL,
  `added_by` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('in_progress','meeting','unsuccessful') COLLATE utf8mb4_unicode_ci DEFAULT 'in_progress',
  `stage` enum('pending','lost','won') COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

<<<<<<< HEAD:broker.sql
=======
--
-- Dumping data for table `opportunity_results`
--

INSERT INTO `opportunity_results` (`id`, `opportunity_id`, `added_by`, `status`, `stage`, `note`, `agency_id`, `business_id`, `created_at`, `updated_at`) VALUES
(2, 2, 1, 'in_progress', 'pending', 'note', NULL, NULL, '2021-03-22 11:48:47', '2021-03-22 11:48:47'),
(3, 2, 1, 'in_progress', 'pending', 'nnoy', NULL, NULL, '2021-04-14 14:22:21', '2021-04-14 14:22:21'),
(4, 2, 1, 'successful', 'pending', 'testing the codes', NULL, NULL, '2021-04-15 11:17:52', '2021-04-15 11:17:52');

>>>>>>> 09ec62e9a57ce91a1d5b57895f83fa97513c9a2e:broker (1).sql
-- --------------------------------------------------------

--
-- Table structure for table `opportunity_stages`
--

CREATE TABLE `opportunity_stages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `opportunity_stages`
--

INSERT INTO `opportunity_stages` (`id`, `name_en`, `name_ar`, `slug`, `agency_id`, `business_id`, `created_at`, `updated_at`) VALUES
(1, 'qualification', 'موهل', 'qualification', 1, 1, '2021-03-15 12:34:19', '2021-03-15 12:34:19'),
(2, 'won', 'فائز', 'won', 1, 1, '2021-03-15 12:34:31', '2021-03-15 12:34:31');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `permission_group_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `permission_group_id`) VALUES
(1, 'view_listing', 'web', '2021-03-07 13:30:02', '2021-03-07 13:30:02', 1),
(2, 'view_team_listings', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 1),
(3, 'view_own_listings', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 1),
(4, 'view_all_landlord_unit_no', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 1),
(5, 'view_own_landlord_unit_no', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 1),
(6, 'can_delete_listings', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 1),
(7, 'can_publish_listings', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 1),
(8, 'can_share_on_lsm', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 1),
(9, 'can_mark_portals', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 1),
(10, 'manage_own_listings', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 1),
(11, 'manage_team_users_listings', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 1),
(12, 'manage_all_listings', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 1),
(13, 'add_team', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 2),
(14, 'view_team', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 2),
(15, 'edit_team', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 2),
(16, 'delete_team', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 2),
(17, 'manage_own_team', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 2),
(18, 'view_lead', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 3),
(19, 'add_lead', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 3),
(20, 'edit_lead', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 3),
(21, 'delete_lead', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 3),
(24, 'manage_lead_setting', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 3),
(25, 'view_staff', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 4),
(26, 'add_staff', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 4),
(27, 'edit_staff', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 4),
(28, 'delete_staff', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 4),
(29, 'manage_team_staff', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 4),
(30, 'set_team_manager', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 4),
(31, 'manage_all_staff_privileges', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 4),
(32, 'manage_own_contacts', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 5),
(33, 'manage_team_users_contacts', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 5),
(34, 'manage_all_users_contacts', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 5),
(35, 'manage_own_roles', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 6),
(36, 'manage_agency_profile', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 6),
(37, 'manage_agency_settings', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 6),
(38, 'manage_own_profile', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 6),
(39, 'can_delete_deals', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 7),
(40, 'manage_own_deals', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 7),
(41, 'manage_team_users_deals', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 7),
(42, 'manage_all_users_deals', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 7),
(43, 'can_delete_notes', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 8),
(44, 'manage_own_notes', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 8),
(45, 'manage_all_notes', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 8),
(46, 'can_delete_tasks', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 9),
(47, 'manage_own_tasks', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 9),
(48, 'manage_team_users_tasks', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 9),
(49, 'manage_all_users_tasks', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 9),
(50, 'manage_own_settings', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 10),
(51, 'manage_all_user_settings', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 10),
(52, 'can_generate_reports', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 11),
(53, 'make_as_public', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 12),
(54, 'manage_own_email', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 13),
(55, 'manage_team_email', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 13),
(56, 'manage_all_user_email', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 13),
(57, 'assign_lead_to_staff', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 3),
(58, 'assign_task_on_lead', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 3),
(59, 'view_opportunity', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 14),
(60, 'edit_opportunity', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 14),
(61, 'delete_opportunity', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 14),
(62, 'manage_opportunity_setting', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 14),
(63, 'assign_opportunity_to_staff', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 14),
(64, 'assign_task_on_opportunity', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 14),
(65, 'convert_lead_to_opportunity\r\n', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 3),
<<<<<<< HEAD:broker.sql
(66, 'convert_opportunity_to_client', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 14);
=======
(66, 'convert_opportunity_to_client', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 14),
(67, 'view_client', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 15),
(68, 'edit_client', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 15),
(69, 'delete_client', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 15),
(70, 'manage_client_setting', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 15),
(71, 'assign_task_on_client', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 15),
(72, 'add_question_on_opportunity', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 14),
(73, 'add_call', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 16),
(74, 'delete_call', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 16),
(75, 'add_question_on_client', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 15),
(76, 'manage_listing_setting', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 1),
(77, 'edit_listing', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 1),
(78, 'add_listing', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 1),
(79, 'delete_listing', 'web', '2021-03-07 13:30:03', '2021-03-07 13:30:03', 1);
>>>>>>> 09ec62e9a57ce91a1d5b57895f83fa97513c9a2e:broker (1).sql

-- --------------------------------------------------------

--
-- Table structure for table `permission_groups`
--

CREATE TABLE `permission_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_groups`
--

INSERT INTO `permission_groups` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'listings', '2021-03-07 13:30:02', '2021-03-07 13:30:02'),
(2, 'teams', '2021-03-07 13:30:03', '2021-03-07 13:30:03'),
(3, 'leads', '2021-03-07 13:30:03', '2021-03-07 13:30:03'),
(4, 'staff', '2021-03-07 13:30:03', '2021-03-07 13:30:03'),
(5, 'contacts', '2021-03-07 13:30:03', '2021-03-07 13:30:03'),
(6, 'profile', '2021-03-07 13:30:03', '2021-03-07 13:30:03'),
(7, 'deal', '2021-03-07 13:30:03', '2021-03-07 13:30:03'),
(8, 'notes', '2021-03-07 13:30:03', '2021-03-07 13:30:03'),
(9, 'tasks', '2021-03-07 13:30:03', '2021-03-07 13:30:03'),
(10, 'settings', '2021-03-07 13:30:03', '2021-03-07 13:30:03'),
(11, 'reports', '2021-03-07 13:30:03', '2021-03-07 13:30:03'),
(12, 'image_bank', '2021-03-07 13:30:03', '2021-03-07 13:30:03'),
(13, 'email_management', '2021-03-07 13:30:03', '2021-03-07 13:30:03'),
(14, 'opportunities', '2021-03-07 13:30:03', '2021-03-07 13:30:03');

-- --------------------------------------------------------

--
-- Table structure for table `portals`
--

CREATE TABLE `portals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portals`
--

INSERT INTO `portals` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'generic', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deadline` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `task_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `task_status_id` bigint(20) UNSIGNED DEFAULT NULL,
  `contact_id` bigint(20) UNSIGNED DEFAULT NULL,
  `staff_id` bigint(20) UNSIGNED DEFAULT NULL,
  `add_by` bigint(20) UNSIGNED DEFAULT NULL,
  `agency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED DEFAULT NULL,
  `custom_reminder` enum('on','off') COLLATE utf8mb4_unicode_ci DEFAULT 'off',
  `period_reminder` enum('after','before') COLLATE utf8mb4_unicode_ci DEFAULT 'after',
  `type_reminder` enum('days','hours') COLLATE utf8mb4_unicode_ci DEFAULT 'days',
  `type_reminder_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `module` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `module_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `deadline`, `time`, `task_type_id`, `task_status_id`, `contact_id`, `staff_id`, `add_by`, `agency_id`, `business_id`, `custom_reminder`, `period_reminder`, `type_reminder`, `type_reminder_number`, `created_at`, `updated_at`, `deleted_at`, `reference`, `status`, `type`, `module`, `module_id`) VALUES
<<<<<<< HEAD:broker.sql
(2, '2021-03-16', '01:05:00', 1, 3, NULL, NULL, 1, 1, 1, 'on', 'before', 'days', '2', '2021-03-13 23:56:38', '2021-03-14 00:26:20', '2021-03-14 00:26:20', NULL, NULL, NULL, NULL, NULL),
(3, '2021-03-14', '01:57:00', 2, 2, NULL, NULL, 1, 1, 1, 'on', 'after', 'hours', '1', '2021-03-13 23:58:06', '2021-03-13 23:58:06', NULL, NULL, NULL, NULL, NULL, NULL),
(4, '2021-03-14', '02:00:00', 2, 2, NULL, NULL, 1, 1, 1, 'off', 'after', 'hours', '1', '2021-03-14 00:01:00', '2021-03-14 00:01:00', NULL, NULL, NULL, NULL, NULL, NULL),
(5, '2021-03-14', '02:01:00', 1, 1, NULL, NULL, 1, 1, 1, 'on', 'after', 'hours', '1', '2021-03-14 00:04:48', '2021-03-14 00:04:48', NULL, NULL, NULL, NULL, NULL, NULL),
(6, '2021-03-17', '02:54:00', 1, 1, NULL, NULL, 1, 1, 1, 'off', 'after', 'hours', '1', '2021-03-14 00:55:08', '2021-03-14 01:39:18', '2021-03-14 01:39:18', NULL, NULL, NULL, NULL, NULL),
(7, '2021-03-17', '03:44:00', 2, 1, NULL, NULL, 1, 1, 1, 'off', 'after', 'hours', '1', '2021-03-14 01:44:50', '2021-03-14 01:44:50', NULL, NULL, NULL, NULL, NULL, NULL),
(8, '2021-03-14', '04:16:00', 1, 1, NULL, NULL, 1, 1, 1, 'off', 'after', 'hours', '1', '2021-03-14 14:24:46', '2021-03-14 14:29:07', '2021-03-14 14:29:07', NULL, NULL, NULL, NULL, NULL),
(9, '2021-03-17', '04:26:00', 1, 1, NULL, NULL, 1, 1, 1, 'off', 'after', 'hours', '1', '2021-03-14 14:28:48', '2021-03-14 15:58:47', '2021-03-14 15:58:47', NULL, NULL, NULL, NULL, NULL),
(10, '2021-03-14', '04:42:00', 1, 1, NULL, NULL, 1, 1, 1, 'off', 'after', 'hours', '1', '2021-03-14 14:42:55', '2021-03-14 14:45:50', '2021-03-14 14:45:50', NULL, NULL, NULL, NULL, NULL),
(11, '2021-03-14', '04:42:00', 1, 1, NULL, NULL, 1, 1, 1, 'off', 'after', 'hours', '1', '2021-03-14 14:43:07', '2021-03-14 14:43:11', '2021-03-14 14:43:11', NULL, NULL, NULL, NULL, NULL),
(12, '2021-03-14', '04:45:00', 1, 1, NULL, NULL, 1, 1, 1, 'off', 'after', 'hours', '1', '2021-03-14 14:47:18', '2021-03-14 14:47:22', '2021-03-14 14:47:22', NULL, NULL, NULL, NULL, NULL),
(13, '2021-03-16', '04:47:00', 1, 1, NULL, NULL, 1, 1, 1, 'off', 'after', 'hours', '1', '2021-03-14 14:48:04', '2021-03-14 14:48:09', '2021-03-14 14:48:09', NULL, NULL, NULL, NULL, NULL),
(14, '2021-03-14', '04:51:00', 1, 1, NULL, NULL, 1, 1, 1, 'off', 'after', 'hours', '1', '2021-03-14 14:51:34', '2021-03-14 14:52:11', '2021-03-14 14:52:11', NULL, NULL, NULL, NULL, NULL),
(15, '2021-03-14', '22:10:00', 1, 1, NULL, NULL, 1, 1, 1, 'off', 'after', 'hours', '1', '2021-03-14 15:58:07', '2021-03-14 16:14:30', '2021-03-14 16:14:30', NULL, NULL, NULL, NULL, NULL),
(16, '2021-03-14', '06:14:00', 2, 2, NULL, NULL, 1, 1, 1, 'off', 'after', 'hours', '1', '2021-03-14 16:14:21', '2021-03-14 16:45:35', '2021-03-14 16:45:35', NULL, NULL, NULL, NULL, NULL),
(17, '2021-03-14', '06:45:00', 1, 2, NULL, NULL, 1, 1, 1, 'off', 'after', 'hours', '1', '2021-03-14 16:44:58', '2021-03-14 16:44:58', NULL, NULL, NULL, NULL, NULL, NULL),
(18, '2021-03-14', '23:05:00', 2, 1, NULL, NULL, 1, 1, 1, 'off', 'after', 'hours', '1', '2021-03-14 16:45:23', '2021-03-14 16:45:23', NULL, NULL, NULL, NULL, NULL, NULL);
=======
(1, '2021-04-20', '09:32:00', 1, 1, NULL, NULL, 1, 1, 1, NULL, 'after', 'hours', '1', '2021-03-21 21:07:12', '2021-04-20 12:05:07', '2021-04-20 12:05:07', NULL, NULL, NULL, 'opportunity', 2),
(2, '2021-04-14', '05:06:00', 1, 1, NULL, NULL, 1, 1, 1, 'off', 'after', 'hours', '1', '2021-04-14 15:06:41', '2021-04-14 15:11:02', '2021-04-14 15:11:02', NULL, NULL, NULL, 'opportunity', 2),
(3, '2021-04-14', '05:11:00', 1, 1, NULL, NULL, 1, 1, 1, NULL, 'after', 'hours', '1', '2021-04-14 15:12:02', '2021-04-20 12:03:33', NULL, NULL, NULL, NULL, 'opportunity', 2),
(4, '2021-04-20', '09:23:00', 1, 1, NULL, NULL, 1, 1, 1, 'off', 'after', 'hours', '1', '2021-04-20 07:32:52', '2021-04-20 07:59:31', '2021-04-20 07:59:31', NULL, NULL, NULL, 'opportunity', 2),
(5, '2021-04-20', '09:32:00', 2, 2, NULL, NULL, 1, 1, 1, NULL, 'after', 'hours', '1', '2021-04-20 07:59:19', '2021-04-20 11:59:45', NULL, NULL, NULL, NULL, 'opportunity', 2);
>>>>>>> 09ec62e9a57ce91a1d5b57895f83fa97513c9a2e:broker (1).sql

-- --------------------------------------------------------

--
-- Table structure for table `task_notes`
--

CREATE TABLE `task_notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task_id` bigint(20) UNSIGNED DEFAULT NULL,
  `add_by` bigint(20) UNSIGNED DEFAULT NULL,
  `notes_en` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes_ar` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `task_notes`
--

INSERT INTO `task_notes` (`id`, `task_id`, `add_by`, `notes_en`, `notes_ar`, `created_at`, `updated_at`, `deleted_at`) VALUES
<<<<<<< HEAD:broker.sql
(1, 2, 1, NULL, NULL, '2021-03-13 23:56:38', '2021-03-13 23:56:38', NULL),
(2, 3, 1, '<p>noteeee</p>', '<p>نوت</p>', '2021-03-13 23:58:06', '2021-03-13 23:58:06', NULL),
(3, 4, 1, '<p>note</p>', NULL, '2021-03-14 00:01:00', '2021-03-14 00:01:00', NULL),
(4, 5, 1, '<p>sdsdsdsd</p>', NULL, '2021-03-14 00:04:48', '2021-03-14 00:04:48', NULL),
(5, 8, 1, '<p>note</p>', NULL, '2021-03-14 14:24:46', '2021-03-14 14:24:46', NULL);
=======
(1, 1, 1, 'note', NULL, '2021-04-20 11:15:58', '2021-04-20 11:15:58', NULL),
(2, 1, 1, 'noteeeeeeeee', NULL, '2021-04-20 12:00:09', '2021-04-20 12:00:09', NULL),
(3, 3, 1, 'not second', NULL, '2021-04-20 12:03:33', '2021-04-20 12:03:33', NULL),
(4, 5, 1, 'not first', NULL, '2021-04-20 12:03:42', '2021-04-20 12:03:42', NULL);
>>>>>>> 09ec62e9a57ce91a1d5b57895f83fa97513c9a2e:broker (1).sql

-- --------------------------------------------------------

--
-- Table structure for table `task_statuses`
--

CREATE TABLE `task_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_complete` enum('on','off') COLLATE utf8mb4_unicode_ci DEFAULT 'off',
  `agency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `task_statuses`
--

INSERT INTO `task_statuses` (`id`, `status_en`, `status_ar`, `type_complete`, `agency_id`, `business_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'not_started', 'not_started', 'off', 1, 1, NULL, NULL, NULL),
(2, 'completed_successful', 'completed_successful', 'on', 1, 1, NULL, NULL, NULL),
(3, 'completed_unsuccessful', 'completed_unsuccessful', 'on', 1, 1, NULL, NULL, NULL),
(6, 'بدأ', 'started', 'on', 1, 1, '2021-04-21 09:32:15', '2021-04-21 09:32:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `task_types`
--

CREATE TABLE `task_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_required` enum('on','off') COLLATE utf8mb4_unicode_ci DEFAULT 'off',
  `agency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `task_types`
--

INSERT INTO `task_types` (`id`, `type_en`, `type_ar`, `address_required`, `agency_id`, `business_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'property_viewing', 'property_viewing', 'on', 1, 1, NULL, NULL, NULL),
(2, 'call', 'call', 'off', 1, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `task_user`
--

CREATE TABLE `task_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task_id` bigint(20) UNSIGNED DEFAULT NULL,
  `staff_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

<<<<<<< HEAD:broker.sql
=======
--
-- Dumping data for table `task_user`
--

INSERT INTO `task_user` (`id`, `task_id`, `staff_id`, `created_at`, `updated_at`) VALUES
(1, 19, 2, NULL, NULL),
(2, 19, 3, NULL, NULL),
(3, 20, 2, NULL, NULL),
(4, 20, 3, NULL, NULL),
(5, 21, 2, NULL, NULL),
(6, 21, 3, NULL, NULL),
(7, 22, 2, NULL, NULL),
(8, 22, 3, NULL, NULL),
(9, 23, 2, NULL, NULL),
(10, 24, 1, NULL, NULL),
(11, 25, 1, NULL, NULL),
(12, 26, 1, NULL, NULL),
(13, 27, 1, NULL, NULL),
(14, 28, 1, NULL, NULL),
(15, 29, 2, NULL, NULL),
(16, 30, 2, NULL, NULL),
(17, 31, 2, NULL, NULL),
(18, 32, 1, NULL, NULL),
(19, 33, 2, NULL, NULL),
(20, 34, 2, NULL, NULL),
(21, 35, 2, NULL, NULL),
(22, 36, 2, NULL, NULL),
(23, 37, 2, NULL, NULL),
(24, 38, 1, NULL, NULL),
(25, 39, 1, NULL, NULL),
(26, 40, 1, NULL, NULL),
(27, 41, 1, NULL, NULL),
(28, 42, 1, NULL, NULL),
(29, 43, 1, NULL, NULL),
(30, 44, 2, NULL, NULL),
(31, 44, 1, NULL, NULL),
(32, 45, 2, NULL, NULL),
(33, 46, 1, NULL, NULL),
(34, 47, 1, NULL, NULL),
(35, 48, 1, NULL, NULL),
(36, 49, 1, NULL, NULL),
(37, 50, 2, NULL, NULL),
(38, 50, 1, NULL, NULL),
(39, 52, 2, NULL, NULL),
(40, 52, 9, NULL, NULL),
(41, 52, 3, NULL, NULL),
(42, 52, 1, NULL, NULL),
(43, 53, 2, NULL, NULL),
(44, 54, 2, NULL, NULL),
(45, 54, 1, NULL, NULL),
(47, 2, 2, NULL, NULL),
(48, 3, 2, NULL, NULL),
(49, 5, 2, NULL, NULL),
(50, 5, 9, NULL, NULL),
(54, 1, 9, NULL, NULL);

>>>>>>> 09ec62e9a57ce91a1d5b57895f83fa97513c9a2e:broker (1).sql
-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `agency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name_en`, `name_ar`, `created_at`, `updated_at`, `agency_id`, `business_id`) VALUES
(1, 'Module English', 'الاسم', '2021-03-07 13:40:17', '2021-03-07 13:40:17', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('description','email') COLLATE utf8mb4_unicode_ci DEFAULT 'description',
  `description_en` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_ar` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `system` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `temporary_listings_documents`
--

CREATE TABLE `temporary_listings_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `folder` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `temporary_listings_documents`
--

INSERT INTO `temporary_listings_documents` (`id`, `folder`, `document`, `title`, `created_at`, `updated_at`) VALUES
(1, '1-main-608f2c9120b4e-1619995793', '1-main-608f2c9120b4e-1619995793/3-easiest-ways-sweetness-turks-home-without-tiring-300x150.jpg', NULL, '2021-05-02 22:49:53', '2021-05-02 22:49:53'),
(2, '1-main-608f2cbb49155-1619995835', '1-main-608f2cbb49155-1619995835/emarat-news-2020-08-11-10-01-25-722358.jpg', NULL, '2021-05-02 22:50:35', '2021-05-02 22:50:35'),
(3, '1-main-608f2cce7b580-1619995854', '1-main-608f2cce7b580-1619995854/emarat-news-2020-08-11-10-01-25-722358.jpg', NULL, '2021-05-02 22:50:54', '2021-05-02 22:50:54'),
(4, '1-main-608f2d3f0d500-1619995967', '1-main-608f2d3f0d500-1619995967/4ef72b2d291b2c9de97e6abff6453ade-w750-h500.jpg', NULL, '2021-05-02 22:52:47', '2021-05-02 22:52:47'),
(5, '1-main-608f2d79c1cbe-1619996025', '1-main-608f2d79c1cbe-1619996025/emarat-news-2020-08-11-10-01-25-722358.jpg', NULL, '2021-05-02 22:53:45', '2021-05-02 22:53:45'),
(6, '1-main-608f2dd8bac82-1619996120', '1-main-608f2dd8bac82-1619996120/emarat-news-2020-08-11-10-01-25-722358.jpg', NULL, '2021-05-02 22:55:20', '2021-05-02 22:55:20'),
(7, '1-main-608f2e25deea5-1619996197', '1-main-608f2e25deea5-1619996197/4ef72b2d291b2c9de97e6abff6453ade-w750-h500.jpg', NULL, '2021-05-02 22:56:37', '2021-05-02 22:56:37'),
(8, '1-main-608f2e45856ac-1619996229', '1-main-608f2e45856ac-1619996229/DYTytfDW0AAaOyX.jpg', NULL, '2021-05-02 22:57:09', '2021-05-02 22:57:09'),
(9, '1-main-608f2e9737b21-1619996311', '1-main-608f2e9737b21-1619996311/4ef72b2d291b2c9de97e6abff6453ade-w750-h500.jpg', NULL, '2021-05-02 22:58:31', '2021-05-02 22:58:31'),
(10, '1-main-608f2ecdc7b53-1619996365', '1-main-608f2ecdc7b53-1619996365/+¦.jpg', NULL, '2021-05-02 22:59:25', '2021-05-02 22:59:25'),
(11, '1-main-608f2fce5b98a-1619996622', '1-main-608f2fce5b98a-1619996622/fan-eltahee-244-1464911363.jpg', NULL, '2021-05-02 23:03:42', '2021-05-02 23:03:42'),
(12, '1-main-608f301b7ff35-1619996699', '1-main-608f301b7ff35-1619996699/+++¦+è+é+¬-+¦+à+ä-+º+ä+ú+¦+¦-+¿+º+ä+ä+¿+å-+¿+º+ä+¦+ê+¦-+«+++ê+¬-+¿+«+++ê+¬0.jpg', NULL, '2021-05-02 23:04:59', '2021-05-02 23:04:59'),
(13, '1-main-608f30b2ea387-1619996850', '1-main-608f30b2ea387-1619996850/DYTytfDW0AAaOyX.jpg', NULL, '2021-05-02 23:07:30', '2021-05-02 23:07:30'),
(14, '1-main-608f322580b1f-1619997221', '1-main-608f322580b1f-1619997221/4ef72b2d291b2c9de97e6abff6453ade-w750-h500.jpg', NULL, '2021-05-02 23:13:41', '2021-05-02 23:13:41'),
(15, '1-main-608f3249ea35c-1619997257', '1-main-608f3249ea35c-1619997257/unnamed.jpg', NULL, '2021-05-02 23:14:17', '2021-05-02 23:14:17'),
(16, '1-main-608f328ecb8be-1619997326', '1-main-608f328ecb8be-1619997326/emarat-news-2020-08-11-10-01-25-722358.jpg', NULL, '2021-05-02 23:15:26', '2021-05-02 23:15:26'),
(17, '1-main-608f346844e20-1619997800', '1-main-608f346844e20-1619997800/4ef72b2d291b2c9de97e6abff6453ade-w750-h500.jpg', NULL, '2021-05-02 23:23:20', '2021-05-02 23:23:20'),
(18, '1-main-608f34de63df8-1619997918', '1-main-608f34de63df8-1619997918/DYTytfDW0AAaOyX.jpg', NULL, '2021-05-02 23:25:18', '2021-05-02 23:25:18'),
(19, '1-main-608f3558222bb-1619998040', '1-main-608f3558222bb-1619998040/4ef72b2d291b2c9de97e6abff6453ade-w750-h500.jpg', NULL, '2021-05-02 23:27:20', '2021-05-02 23:27:20'),
(20, '1-main-608f357f2e4b5-1619998079', '1-main-608f357f2e4b5-1619998079/+¬+¦+è+¦-+â+è+â1-1.jpg', NULL, '2021-05-02 23:27:59', '2021-05-02 23:27:59'),
(21, '1-main-608f35b37b5f4-1619998131', '1-main-608f35b37b5f4-1619998131/+¬+¦+è+¦-+â+è+â1-1.jpg', NULL, '2021-05-02 23:28:51', '2021-05-02 23:28:51'),
(22, '1-main-608f35f87cb72-1619998200', '1-main-608f35f87cb72-1619998200/3-easiest-ways-sweetness-turks-home-without-tiring-300x150.jpg', NULL, '2021-05-02 23:30:00', '2021-05-02 23:30:00'),
(23, '1-main-608f362fad4e3-1619998255', '1-main-608f362fad4e3-1619998255/+¬+¦+è+¦-+â+è+â1-1.jpg', NULL, '2021-05-02 23:30:55', '2021-05-02 23:30:55'),
(24, '1-main-608f365110e8c-1619998289', '1-main-608f365110e8c-1619998289/3-easiest-ways-sweetness-turks-home-without-tiring-300x150.jpg', NULL, '2021-05-02 23:31:29', '2021-05-02 23:31:29'),
(25, '1-main-608f36a9339dc-1619998377', '1-main-608f36a9339dc-1619998377/fan-eltahee-244-1464911363.jpg', NULL, '2021-05-02 23:32:57', '2021-05-02 23:32:57'),
(26, '1-main-608f42f80bab7-1620001528', '1-main-608f42f80bab7-1620001528/59b82d27aa3fb.jpeg', 'title', '2021-05-03 00:25:28', '2021-05-03 00:25:34'),
(27, '1-main-608f43288625e-1620001576', '1-main-608f43288625e-1620001576/+¬+¦+è+¦-+â+è+â1-1.jpg', 'title update', '2021-05-03 00:26:16', '2021-05-03 00:26:21'),
(28, '1-main-608f438ca78a7-1620001676', '1-main-608f438ca78a7-1620001676/+¬+¦+è+¦-+â+è+â1-1.jpg', 'updated', '2021-05-03 00:27:56', '2021-05-03 00:28:00'),
(29, '1-main-608f441490770-1620001812', '1-main-608f441490770-1620001812/Capturewq.PNG', 'updated title', '2021-05-03 00:30:12', '2021-05-03 00:30:17'),
(30, '1-main-608f449885a0a-1620001944', '1-main-608f449885a0a-1620001944/4ef72b2d291b2c9de97e6abff6453ade-w750-h500.jpg', 'new', '2021-05-03 00:32:24', '2021-05-03 00:32:39'),
(31, '1-main-608f44af4ec40-1620001967', '1-main-608f44af4ec40-1620001967/4ef72b2d291b2c9de97e6abff6453ade-w750-h500.jpg', 'file', '2021-05-03 00:32:47', '2021-05-03 00:32:51'),
(32, '1-main-6090151a177ae-1620055322', '1-main-6090151a177ae-1620055322/hqdefault.jpg', NULL, '2021-05-03 15:22:02', '2021-05-03 15:22:02'),
(33, '1-main-609015993655b-1620055449', '1-main-609015993655b-1620055449/emarat-news-2020-08-11-10-01-25-722358.jpg', NULL, '2021-05-03 15:24:09', '2021-05-03 15:24:09'),
(34, '1-main-609015ba0aa4e-1620055482', '1-main-609015ba0aa4e-1620055482/3-easiest-ways-sweetness-turks-home-without-tiring-300x150.jpg', NULL, '2021-05-03 15:24:42', '2021-05-03 15:24:42'),
(35, '1-main-60901689e7123-1620055689', '1-main-60901689e7123-1620055689/59b82d27aa3fb.jpeg', 'updated now', '2021-05-03 15:28:09', '2021-05-03 15:28:38'),
(36, '1-main-609016c4e3c2b-1620055748', '1-main-609016c4e3c2b-1620055748/DYTytfDW0AAaOyX.jpg', 'another update', '2021-05-03 15:29:08', '2021-05-03 15:29:19');

-- --------------------------------------------------------

--
-- Table structure for table `temporary_listings_photos`
--

CREATE TABLE `temporary_listings_photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `folder` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `watermark` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` enum('main','watermark') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `temporary_listings_photos`
--

INSERT INTO `temporary_listings_photos` (`id`, `folder`, `main`, `watermark`, `active`, `created_at`, `updated_at`) VALUES
(2, 'main-608dd77ea4568-1619908478', 'main-608dd77ea4568-1619908478/a-aa-aeo-oaea-aoea-15-aajpg', 'main-608dd77ea4568-1619908478/mainWatermark-a-aa-aeo-oaea-aoea-15-aajpg', 'watermark', '2021-05-01 22:34:38', '2021-05-01 22:34:38'),
(3, 'main-608dd82fccbba-1619908655', 'main-608dd82fccbba-1619908655/whatsapp-image-2020-11-08-at-32016-pmjpeg', 'main-608dd82fccbba-1619908655/mainWatermark-whatsapp-image-2020-11-08-at-32016-pmjpeg', 'watermark', '2021-05-01 22:37:35', '2021-05-01 22:37:35'),
(4, 'main-608dd84aa50f4-1619908682', 'main-608dd84aa50f4-1619908682/whatsapp-image-2020-11-08-at-32018-pmjpeg', 'main-608dd84aa50f4-1619908682/mainWatermark-whatsapp-image-2020-11-08-at-32018-pmjpeg', 'watermark', '2021-05-01 22:38:02', '2021-05-01 22:38:02'),
(5, 'main-608dd974552e7-1619908980', 'main-608dd974552e7-1619908980/whatsapp-image-2020-11-08-at-32016-pmjpeg', 'main-608dd974552e7-1619908980/mainWatermark-whatsapp-image-2020-11-08-at-32016-pmjpeg', 'watermark', '2021-05-01 22:43:00', '2021-05-01 22:43:00'),
(6, 'main-608dd9ab2e9b3-1619909035', 'main-608dd9ab2e9b3-1619909035/whatsapp-image-2020-11-08-at-32017-pmjpeg', 'main-608dd9ab2e9b3-1619909035/mainWatermark-whatsapp-image-2020-11-08-at-32017-pmjpeg', 'watermark', '2021-05-01 22:43:55', '2021-05-01 22:43:55'),
(7, 'main-608dd9b432f28-1619909044', 'main-608dd9b432f28-1619909044/whatsapp-image-2020-11-08-at-32016-pmjpeg', 'main-608dd9b432f28-1619909044/mainWatermark-whatsapp-image-2020-11-08-at-32016-pmjpeg', 'watermark', '2021-05-01 22:44:04', '2021-05-01 22:44:04'),
(8, 'main-608dda72b59e5-1619909234', 'main-608dda72b59e5-1619909234/whatsapp-image-2020-11-08-at-3201d7-pm-jpeg', 'main-608dda72b59e5-1619909234/mainWatermark-whatsapp-image-2020-11-08-at-3201d7-pm-jpeg', 'watermark', '2021-05-01 22:47:14', '2021-05-01 22:47:14'),
(9, 'main-608dda802fee2-1619909248', 'main-608dda802fee2-1619909248/whatsapp-image-2020-11-08-at-32017-pmjpeg', 'main-608dda802fee2-1619909248/mainWatermark-whatsapp-image-2020-11-08-at-32017-pmjpeg', 'watermark', '2021-05-01 22:47:28', '2021-05-01 22:47:28'),
(10, '1-main-608ddc9bb09f4-1619909787', '1-main-608ddc9bb09f4-1619909787/whatsapp-image-2020-11-08-at-32018-pmjpeg', '1-main-608ddc9bb09f4-1619909787/mainWatermark-whatsapp-image-2020-11-08-at-32018-pmjpeg', 'watermark', '2021-05-01 22:56:27', '2021-05-01 22:56:27'),
(11, '1-main-608de1907f111-1619911056', '1-main-608de1907f111-1619911056/whatsapp-image-2020-11-08-at-3201ds7-pm-jpeg', '1-main-608de1907f111-1619911056/mainWatermark-whatsapp-image-2020-11-08-at-3201ds7-pm-jpeg', 'watermark', '2021-05-01 23:17:36', '2021-05-01 23:17:36'),
(12, '1-main-608de190e5852-1619911056', '1-main-608de190e5852-1619911056/whatsapp-image-2020-11-08-at-32016-pmjpeg', '1-main-608de190e5852-1619911056/mainWatermark-whatsapp-image-2020-11-08-at-32016-pmjpeg', 'watermark', '2021-05-01 23:17:37', '2021-05-01 23:17:37'),
(13, '1-main-608de71db4659-1619912477', '1-main-608de71db4659-1619912477/whatsapp-image-2020-11-08-at-3201ds7-pm-jpeg', '1-main-608de71db4659-1619912477/mainWatermark-whatsapp-image-2020-11-08-at-3201ds7-pm-jpeg', 'watermark', '2021-05-01 23:41:17', '2021-05-01 23:41:17'),
(14, '1-main-608de71e36ba9-1619912478', '1-main-608de71e36ba9-1619912478/whatsapp-image-2020-11-08-at-32016-pmjpeg', '1-main-608de71e36ba9-1619912478/mainWatermark-whatsapp-image-2020-11-08-at-32016-pmjpeg', 'watermark', '2021-05-01 23:41:18', '2021-05-01 23:41:18'),
(15, '1-main-608de71e941c3-1619912478', '1-main-608de71e941c3-1619912478/whatsapp-image-2020-11-08-at-32017-pmjpeg', '1-main-608de71e941c3-1619912478/mainWatermark-whatsapp-image-2020-11-08-at-32017-pmjpeg', 'watermark', '2021-05-01 23:41:18', '2021-05-01 23:41:18'),
(16, '1-main-608de96eeff2d-1619913070', '1-main-608de96eeff2d-1619913070/WhatsApp-Image-2020-11-08-at-3.20.1ds7-PM-.jpeg', '1-main-608de96eeff2d-1619913070/mainWatermark-WhatsApp-Image-2020-11-08-at-3.20.1ds7-PM-.jpeg', 'watermark', '2021-05-01 23:51:11', '2021-05-01 23:51:11'),
(17, '1-main-608de96f58db1-1619913071', '1-main-608de96f58db1-1619913071/WhatsApp-Image-2020-11-08-at-3.20.16-PM.jpeg', '1-main-608de96f58db1-1619913071/mainWatermark-WhatsApp-Image-2020-11-08-at-3.20.16-PM.jpeg', 'watermark', '2021-05-01 23:51:11', '2021-05-01 23:51:11'),
(18, '1-main-608df22e45864-1619915310', '1-main-608df22e45864-1619915310/WhatsApp-Image-2020-11-08-at-3.20.16-PM.jpeg', '1-main-608df22e45864-1619915310/mainWatermark-WhatsApp-Image-2020-11-08-at-3.20.16-PM.jpeg', 'watermark', '2021-05-02 00:28:30', '2021-05-02 00:28:30'),
(19, '1-main-608df22ebccfe-1619915310', '1-main-608df22ebccfe-1619915310/WhatsApp-Image-2020-11-08-at-3.20.17-PM.jpeg', '1-main-608df22ebccfe-1619915310/mainWatermark-WhatsApp-Image-2020-11-08-at-3.20.17-PM.jpeg', 'watermark', '2021-05-02 00:28:30', '2021-05-02 00:28:30'),
(20, '1-main-608df2b9b0386-1619915449', '1-main-608df2b9b0386-1619915449/WhatsApp-Image-2020-11-08-at-3.20.1d7-PM-.jpeg', '1-main-608df2b9b0386-1619915449/mainWatermark-WhatsApp-Image-2020-11-08-at-3.20.1d7-PM-.jpeg', 'watermark', '2021-05-02 00:30:49', '2021-05-02 00:30:49'),
(21, '1-main-608df2ba36f94-1619915450', '1-main-608df2ba36f94-1619915450/WhatsApp-Image-2020-11-08-at-3.20.1ds7-PM-.jpeg', '1-main-608df2ba36f94-1619915450/mainWatermark-WhatsApp-Image-2020-11-08-at-3.20.1ds7-PM-.jpeg', 'watermark', '2021-05-02 00:30:50', '2021-05-02 00:30:50'),
(22, '1-main-608df2ba994fc-1619915450', '1-main-608df2ba994fc-1619915450/WhatsApp-Image-2020-11-08-at-3.20.16-PM.jpeg', '1-main-608df2ba994fc-1619915450/mainWatermark-WhatsApp-Image-2020-11-08-at-3.20.16-PM.jpeg', 'watermark', '2021-05-02 00:30:50', '2021-05-02 00:30:50'),
(23, '1-main-608df2bb1bd89-1619915451', '1-main-608df2bb1bd89-1619915451/WhatsApp-Image-2020-11-08-at-3.20.17-PM.jpeg', '1-main-608df2bb1bd89-1619915451/mainWatermark-WhatsApp-Image-2020-11-08-at-3.20.17-PM.jpeg', 'watermark', '2021-05-02 00:30:51', '2021-05-02 00:30:51'),
(24, '1-main-608ec85500768-1619970133', '1-main-608ec85500768-1619970133/+¦+¦+ä-+å+¡+ä-+å+ê+º+¦+¬-+º+ä+¿+¦+¦+è+à-+¿+ä+º+¦+¬+è+â-1.5-+â+¼+à.jpg', '1-main-608ec85500768-1619970133/mainWatermark-+¦+¦+ä-+å+¡+ä-+å+ê+º+¦+¬-+º+ä+¿+¦+¦+è+à-+¿+ä+º+¦+¬+è+â-1.5-+â+¼+à.jpg', 'watermark', '2021-05-02 15:42:13', '2021-05-02 15:42:13'),
(25, '1-main-608ec9ae6c129-1619970478', '1-main-608ec9ae6c129-1619970478/WhatsApp-Image-2020-11-08-at-3.20.1ds7-PM-.jpeg', '1-main-608ec9ae6c129-1619970478/mainWatermark-WhatsApp-Image-2020-11-08-at-3.20.1ds7-PM-.jpeg', 'watermark', '2021-05-02 15:47:58', '2021-05-02 15:47:58'),
(26, '1-main-608ecbf82f8ec-1619971064', '1-main-608ecbf82f8ec-1619971064/+¦+¦+ä-+å+¡+ä-+å+ê+º+¦+¬-+º+ä+¿+¦+¦+è+à-+¿+ä+º+¦+¬+è+â-3-+â+¼+à.jpg', '1-main-608ecbf82f8ec-1619971064/mainWatermark-+¦+¦+ä-+å+¡+ä-+å+ê+º+¦+¬-+º+ä+¿+¦+¦+è+à-+¿+ä+º+¦+¬+è+â-3-+â+¼+à.jpg', 'watermark', '2021-05-02 15:57:44', '2021-05-02 15:57:44'),
(27, '1-main-608ed1730aeaa-1619972467', '1-main-608ed1730aeaa-1619972467/2013-1383466204-965.jpg', '1-main-608ed1730aeaa-1619972467/mainWatermark-2013-1383466204-965.jpg', 'watermark', '2021-05-02 16:21:07', '2021-05-02 16:21:07'),
(28, '1-main-608ed2ef36e18-1619972847', '1-main-608ed2ef36e18-1619972847/3-easiest-ways-sweetness-turks-home-without-tiring-300x150.jpg', '1-main-608ed2ef36e18-1619972847/mainWatermark-3-easiest-ways-sweetness-turks-home-without-tiring-300x150.jpg', 'watermark', '2021-05-02 16:27:27', '2021-05-02 16:27:27'),
(29, '1-main-608f838620800-1620018054', '1-main-608f838620800-1620018054/fan-eltahee-244-1464911363.jpg', '1-main-608f838620800-1620018054/mainWatermark-fan-eltahee-244-1464911363.jpg', 'watermark', '2021-05-03 05:00:54', '2021-05-03 05:00:54'),
(30, '1-main-60901fd2a8ab4-1620058066', '1-main-60901fd2a8ab4-1620058066/3-easiest-ways-sweetness-turks-home-without-tiring-300x150.jpg', '1-main-60901fd2a8ab4-1620058066/mainWatermark-3-easiest-ways-sweetness-turks-home-without-tiring-300x150.jpg', 'watermark', '2021-05-03 16:07:46', '2021-05-03 16:07:46'),
(31, '1-main-60902160730e5-1620058464', '1-main-60902160730e5-1620058464/4ef72b2d291b2c9de97e6abff6453ade-w750-h500.jpg', '1-main-60902160730e5-1620058464/mainWatermark-4ef72b2d291b2c9de97e6abff6453ade-w750-h500.jpg', 'watermark', '2021-05-03 16:14:24', '2021-05-03 16:14:24'),
(32, '1-main-6090d8e8bed5c-1620105448', '59b82d27aa3fb.jpeg', 'mainWatermark-59b82d27aa3fb.jpeg', 'watermark', '2021-05-04 05:17:29', '2021-05-04 05:17:29'),
(33, '1-main-6090d9ea20cb1-1620105706', '59b82d27aa3fb.jpeg', 'mainWatermark-59b82d27aa3fb.jpeg', 'watermark', '2021-05-04 05:21:46', '2021-05-04 05:21:46'),
(34, '1-main-6090db3896c94-1620106040', '9517c9e0-7928-4450-85d8-183f754cba42.jpeg', 'mainWatermark-9517c9e0-7928-4450-85d8-183f754cba42.jpeg', 'watermark', '2021-05-04 05:27:20', '2021-05-04 05:27:20'),
(35, '1-main-6090dbc41e337-1620106180', '4ef72b2d291b2c9de97e6abff6453ade-w750-h500.jpg', 'mainWatermark-4ef72b2d291b2c9de97e6abff6453ade-w750-h500.jpg', 'watermark', '2021-05-04 05:29:40', '2021-05-04 05:29:40'),
(36, '1-main-6090dc69749e0-1620106345', '4ef72b2d291b2c9de97e6abff6453ade-w750-h500.jpg', 'mainWatermark-4ef72b2d291b2c9de97e6abff6453ade-w750-h500.jpg', 'watermark', '2021-05-04 05:32:25', '2021-05-04 05:32:25');

-- --------------------------------------------------------

--
-- Table structure for table `temporary_listings_plans`
--

CREATE TABLE `temporary_listings_plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `folder` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `watermark` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` enum('main','watermark') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `temporary_listings_plans`
--

INSERT INTO `temporary_listings_plans` (`id`, `folder`, `main`, `title`, `watermark`, `active`, `created_at`, `updated_at`) VALUES
(1, '1-main-608ec842764b3-1619970114', '1-main-608ec842764b3-1619970114/WhatsApp-Image-2020-11-08-at-3.20.17-PM.jpeg', NULL, '1-main-608ec842764b3-1619970114/mainWatermark-WhatsApp-Image-2020-11-08-at-3.20.17-PM.jpeg', 'watermark', '2021-05-02 15:41:54', '2021-05-02 15:41:54'),
(2, '1-main-608ec90e0ff6b-1619970318', '1-main-608ec90e0ff6b-1619970318/+¦+¦+ä-+å+¡+ä-+å+ê+º+¦+¬-+¿+¦+¦+è+à-950-+¼+à.jpg', NULL, '1-main-608ec90e0ff6b-1619970318/mainWatermark-+¦+¦+ä-+å+¡+ä-+å+ê+º+¦+¬-+¿+¦+¦+è+à-950-+¼+à.jpg', 'watermark', '2021-05-02 15:45:18', '2021-05-02 15:45:18'),
(3, '1-main-608ec99a1fb17-1619970458', '1-main-608ec99a1fb17-1619970458/+¦+¦+ä-+å+¡+ä-+å+ê+º+¦+¬-+º+ä+¿+¦+¦+è+à-+¿+ä+º+¦+¬+è+â-1.5-+â+¼+à.jpg', NULL, '1-main-608ec99a1fb17-1619970458/mainWatermark-+¦+¦+ä-+å+¡+ä-+å+ê+º+¦+¬-+º+ä+¿+¦+¦+è+à-+¿+ä+º+¦+¬+è+â-1.5-+â+¼+à.jpg', 'watermark', '2021-05-02 15:47:38', '2021-05-02 15:47:38'),
(4, '1-main-608ecbed6a1ac-1619971053', '1-main-608ecbed6a1ac-1619971053/WhatsApp-Image-2020-11-08-at-3.20.16-PM.jpeg', NULL, '1-main-608ecbed6a1ac-1619971053/mainWatermark-WhatsApp-Image-2020-11-08-at-3.20.16-PM.jpeg', 'watermark', '2021-05-02 15:57:33', '2021-05-02 15:57:33'),
(5, '1-main-608ecbedd02d1-1619971053', '1-main-608ecbedd02d1-1619971053/WhatsApp-Image-2020-11-08-at-3.20.17-PM.jpeg', NULL, '1-main-608ecbedd02d1-1619971053/mainWatermark-WhatsApp-Image-2020-11-08-at-3.20.17-PM.jpeg', 'watermark', '2021-05-02 15:57:33', '2021-05-02 15:57:33'),
(6, '1-main-608ece25749f7-1619971621', '1-main-608ece25749f7-1619971621/+¦+¦+ä-+å+¡+ä-+å+ê+º+¦+¬-+¿+¦+¦+è+à-950-+¼+à.jpg', NULL, '1-main-608ece25749f7-1619971621/mainWatermark-+¦+¦+ä-+å+¡+ä-+å+ê+º+¦+¬-+¿+¦+¦+è+à-950-+¼+à.jpg', 'watermark', '2021-05-02 16:07:01', '2021-05-02 16:07:01'),
(7, '1-main-608ece3c74d43-1619971644', '1-main-608ece3c74d43-1619971644/+¦.jpg', NULL, '1-main-608ece3c74d43-1619971644/mainWatermark-+¦.jpg', 'watermark', '2021-05-02 16:07:24', '2021-05-02 16:07:24'),
(8, '1-main-608ed16c5218b-1619972460', '1-main-608ed16c5218b-1619972460/DYTytfDW0AAaOyX.jpg', NULL, '1-main-608ed16c5218b-1619972460/mainWatermark-DYTytfDW0AAaOyX.jpg', 'watermark', '2021-05-02 16:21:00', '2021-05-02 16:21:00'),
(9, '1-main-608ed2f66d89f-1619972854', '1-main-608ed2f66d89f-1619972854/hqdefault.jpg', NULL, '1-main-608ed2f66d89f-1619972854/mainWatermark-hqdefault.jpg', 'watermark', '2021-05-02 16:27:34', '2021-05-02 16:27:34'),
(10, '1-main-608f80c24c1fe-1620017346', '1-main-608f80c24c1fe-1620017346/4ef72b2d291b2c9de97e6abff6453ade-w750-h500.jpg', NULL, '1-main-608f80c24c1fe-1620017346/mainWatermark-4ef72b2d291b2c9de97e6abff6453ade-w750-h500.jpg', 'watermark', '2021-05-03 04:49:06', '2021-05-03 04:49:06'),
(11, '1-main-608f80dd4f9da-1620017373', '1-main-608f80dd4f9da-1620017373/59b82d27aa3fb.jpeg', NULL, '1-main-608f80dd4f9da-1620017373/mainWatermark-59b82d27aa3fb.jpeg', 'watermark', '2021-05-03 04:49:33', '2021-05-03 04:49:33'),
(12, '1-main-60901c6089d4d-1620057184', '1-main-60901c6089d4d-1620057184/4ef72b2d291b2c9de97e6abff6453ade-w750-h500.jpg', NULL, '1-main-60901c6089d4d-1620057184/mainWatermark-4ef72b2d291b2c9de97e6abff6453ade-w750-h500.jpg', 'watermark', '2021-05-03 15:53:05', '2021-05-03 15:53:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `type` enum('owner','staff','moderator') COLLATE utf8mb4_unicode_ci DEFAULT 'staff',
  `business_id` bigint(20) UNSIGNED DEFAULT NULL,
  `country_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cell_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cell` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax_country_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax_city_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staff_fax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality_id` bigint(20) UNSIGNED DEFAULT NULL,
  `agency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `can_access` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'en'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name_en`, `name_ar`, `brn`, `description_en`, `zip`, `whatsapp`, `skype`, `active`, `type`, `business_id`, `country_code`, `city_code`, `phone`, `cell_code`, `cell`, `fax_country_code`, `fax_city_code`, `staff_fax`, `address`, `image`, `email`, `email_verified_at`, `password`, `remember_token`, `nationality_id`, `agency_id`, `team_id`, `created_at`, `updated_at`, `can_access`, `description_ar`, `language`) VALUES
(1, 'owner', 'owner', NULL, NULL, NULL, NULL, NULL, '1', 'owner', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'hamed@onetecgroup.com', NULL, '$2y$10$aMk3ZOJVZVajuDgY3RFpDOpqeVOBlGex7G2IlPaKMgXc0meZJXHXy', NULL, NULL, NULL, NULL, '2021-03-07 13:30:03', '2021-03-07 13:30:03', NULL, NULL, 'en'),
(2, 'staffotg1', 'staffotg1', NULL, NULL, NULL, NULL, NULL, '1', 'staff', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'staffotg1@onetecgroup.com', NULL, '$2y$10$T254ifcOSPfV.MLfMNkeEeLtWU.bZn/coaiZKHc8Ata44wFTVsPzy', NULL, NULL, 1, 1, '2021-03-07 13:30:03', '2021-03-14 02:12:10', '', NULL, 'en'),
(3, 'staffpcasa1', 'staffpcasa1', NULL, NULL, NULL, NULL, NULL, '1', 'moderator', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'staffpcasa1@onetecgroup.com', NULL, '$2y$10$aMk3ZOJVZVajuDgY3RFpDOpqeVOBlGex7G2IlPaKMgXc0meZJXHXy', NULL, NULL, 2, NULL, '2021-03-07 13:30:03', '2021-04-21 09:32:31', '2,1', NULL, 'ar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agencies`
--
ALTER TABLE `agencies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agencies_country_id_foreign` (`country_id`),
  ADD KEY `agencies_city_id_foreign` (`city_id`),
  ADD KEY `agencies_owner_id_foreign` (`owner_id`),
  ADD KEY `agencies_business_id_foreign` (`business_id`);

--
-- Indexes for table `agency_portals`
--
ALTER TABLE `agency_portals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agency_portals_agency_id_foreign` (`agency_id`),
  ADD KEY `agency_portals_template_id_foreign` (`template_id`);

--
-- Indexes for table `agency_settings`
--
ALTER TABLE `agency_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agency_settings_agency_id_foreign` (`agency_id`);

--
-- Indexes for table `bank_images`
--
ALTER TABLE `bank_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bank_images_bank_id_foreign` (`bank_id`);

--
-- Indexes for table `businesses`
--
ALTER TABLE `businesses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calls`
--
ALTER TABLE `calls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `calls_made_by_foreign` (`made_by`),
  ADD KEY `calls_agency_id_foreign` (`agency_id`),
  ADD KEY `calls_business_id_foreign` (`business_id`),
  ADD KEY `calls_status_id_foreign` (`status_id`);

--
-- Indexes for table `call_status`
--
ALTER TABLE `call_status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `call_status_agency_id_foreign` (`agency_id`),
  ADD KEY `call_status_business_id_foreign` (`business_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_country_id_foreign` (`country_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clients_agency_id_foreign` (`agency_id`),
  ADD KEY `clients_business_id_foreign` (`business_id`),
  ADD KEY `clients_converted_by_foreign` (`converted_by`),
  ADD KEY `clients_source_id_foreign` (`source_id`),
  ADD KEY `clients_type_id_foreign` (`type_id`),
  ADD KEY `clients_communication_id_foreign` (`communication_id`),
  ADD KEY `clients_nationality_id_foreign` (`nationality_id`),
  ADD KEY `clients_property_id_foreign` (`property_id`);

--
-- Indexes for table `client_contracts`
--
ALTER TABLE `client_contracts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_contracts_client_id_foreign` (`client_id`),
  ADD KEY `client_contracts_converted_by_foreign` (`converted_by`),
  ADD KEY `client_contracts_agency_id_foreign` (`agency_id`),
  ADD KEY `client_contracts_business_id_foreign` (`business_id`);

--
-- Indexes for table `client_questions`
--
ALTER TABLE `client_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_questions_agency_id_foreign` (`agency_id`),
  ADD KEY `client_questions_added_by_foreign` (`added_by`),
  ADD KEY `client_questions_answered_by_foreign` (`answered_by`),
  ADD KEY `client_questions_business_id_foreign` (`business_id`),
  ADD KEY `client_questions_client_id_foreign` (`client_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contacts_agency_id_foreign` (`agency_id`),
  ADD KEY `contacts_business_id_foreign` (`business_id`);

--
-- Indexes for table `contacts_mail_list`
--
ALTER TABLE `contacts_mail_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contacts_mail_list_mail_list_id_foreign` (`mail_list_id`);

--
-- Indexes for table `contract_document`
--
ALTER TABLE `contract_document`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contract_document_contract_id_foreign` (`contract_id`),
  ADD KEY `contract_document_client_id_foreign` (`client_id`),
  ADD KEY `contract_document_agency_id_foreign` (`agency_id`),
  ADD KEY `contract_document_business_id_foreign` (`business_id`);

--
-- Indexes for table `contract_recurring`
--
ALTER TABLE `contract_recurring`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contract_recurring_contract_id_foreign` (`contract_id`),
  ADD KEY `contract_recurring_client_id_foreign` (`client_id`),
  ADD KEY `contract_recurring_agency_id_foreign` (`agency_id`),
  ADD KEY `contract_recurring_business_id_foreign` (`business_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `developers`
--
ALTER TABLE `developers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `developers_agency_id_foreign` (`agency_id`),
  ADD KEY `developers_business_id_foreign` (`business_id`);

--
-- Indexes for table `email_logs`
--
ALTER TABLE `email_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email_logs_add_by_foreign` (`add_by`),
  ADD KEY `email_logs_agency_id_foreign` (`agency_id`),
  ADD KEY `email_logs_business_id_foreign` (`business_id`);

--
-- Indexes for table `email_notifies`
--
ALTER TABLE `email_notifies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email_notifies_agency_id_foreign` (`agency_id`),
  ADD KEY `email_notifies_business_id_foreign` (`business_id`);

--
-- Indexes for table `email_notify_reminders`
--
ALTER TABLE `email_notify_reminders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email_notify_reminders_email_notify_id_foreign` (`email_notify_id`);

--
-- Indexes for table `email_notify_tenancy`
--
ALTER TABLE `email_notify_tenancy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email_notify_tenancy_email_notify_id_foreign` (`email_notify_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `floor_plans`
--
ALTER TABLE `floor_plans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `floor_plans_agency_id_foreign` (`agency_id`),
  ADD KEY `floor_plans_business_id_foreign` (`business_id`),
  ADD KEY `floor_plans_user_id_foreign` (`user_id`);

--
-- Indexes for table `image_banks`
--
ALTER TABLE `image_banks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `image_banks_agency_id_foreign` (`agency_id`),
  ADD KEY `image_banks_business_id_foreign` (`business_id`),
  ADD KEY `image_banks_user_id_foreign` (`user_id`),
  ADD KEY `image_banks_folder_id_foreign` (`folder_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leads_agency_id_foreign` (`agency_id`),
  ADD KEY `leads_business_id_foreign` (`business_id`),
  ADD KEY `leads_source_id_foreign` (`source_id`),
  ADD KEY `leads_type_id_foreign` (`type_id`),
  ADD KEY `leads_qualification_id_foreign` (`qualification_id`),
  ADD KEY `leads_communication_id_foreign` (`communication_id`),
  ADD KEY `leads_priority_id_foreign` (`priority_id`),
  ADD KEY `leads_nationality_id_foreign` (`nationality_id`),
  ADD KEY `leads_city_id_foreign` (`city_id`),
  ADD KEY `leads_property_id_foreign` (`property_id`);

--
-- Indexes for table `lead_communications`
--
ALTER TABLE `lead_communications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lead_communications_agency_id_foreign` (`agency_id`),
  ADD KEY `lead_communications_business_id_foreign` (`business_id`);

--
-- Indexes for table `lead_priorities`
--
ALTER TABLE `lead_priorities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lead_priorities_agency_id_foreign` (`agency_id`),
  ADD KEY `lead_priorities_business_id_foreign` (`business_id`);

--
-- Indexes for table `lead_property`
--
ALTER TABLE `lead_property`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lead_property_agency_id_foreign` (`agency_id`),
  ADD KEY `lead_property_business_id_foreign` (`business_id`);

--
-- Indexes for table `lead_qualifications`
--
ALTER TABLE `lead_qualifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lead_qualifications_agency_id_foreign` (`agency_id`),
  ADD KEY `lead_qualifications_business_id_foreign` (`business_id`);

--
-- Indexes for table `lead_sources`
--
ALTER TABLE `lead_sources`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lead_sources_agency_id_foreign` (`agency_id`),
  ADD KEY `lead_sources_business_id_foreign` (`business_id`);

--
-- Indexes for table `lead_types`
--
ALTER TABLE `lead_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lead_types_agency_id_foreign` (`agency_id`),
  ADD KEY `lead_types_business_id_foreign` (`business_id`);

--
-- Indexes for table `listings`
--
ALTER TABLE `listings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `listings_agency_id_foreign` (`agency_id`),
  ADD KEY `listings_business_id_foreign` (`business_id`),
  ADD KEY `listings_developer_id_foreign` (`developer_id`),
  ADD KEY `listings_listing_rent_cheque_id_foreign` (`listing_rent_cheque_id`),
  ADD KEY `listings_landlord_id_foreign` (`landlord_id`),
  ADD KEY `listings_tenant_id_foreign` (`tenant_id`),
  ADD KEY `listings_assigned_to_foreign` (`assigned_to`),
  ADD KEY `listings_source_id_foreign` (`source_id`),
  ADD KEY `listings_type_id_foreign` (`type_id`);

--
-- Indexes for table `listing_cheque_calculator`
--
ALTER TABLE `listing_cheque_calculator`
  ADD PRIMARY KEY (`id`),
  ADD KEY `listing_cheque_calculator_listing_id_foreign` (`listing_id`);

--
-- Indexes for table `listing_documents`
--
ALTER TABLE `listing_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `listing_documents_listing_id_foreign` (`listing_id`);

--
-- Indexes for table `listing_features`
--
ALTER TABLE `listing_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listing_photos`
--
ALTER TABLE `listing_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `listing_photos_listing_id_foreign` (`listing_id`);

--
-- Indexes for table `listing_plans`
--
ALTER TABLE `listing_plans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `listing_plans_listing_id_foreign` (`listing_id`);

--
-- Indexes for table `listing_rent_cheques`
--
ALTER TABLE `listing_rent_cheques`
  ADD PRIMARY KEY (`id`),
  ADD KEY `listing_rent_cheques_agency_id_foreign` (`agency_id`),
  ADD KEY `listing_rent_cheques_business_id_foreign` (`business_id`);

--
-- Indexes for table `listing_types`
--
ALTER TABLE `listing_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `listing_types_agency_id_foreign` (`agency_id`),
  ADD KEY `listing_types_business_id_foreign` (`business_id`);

--
-- Indexes for table `listing_videos`
--
ALTER TABLE `listing_videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `listing_videos_listing_id_foreign` (`listing_id`);

--
-- Indexes for table `listing_views`
--
ALTER TABLE `listing_views`
  ADD PRIMARY KEY (`id`),
  ADD KEY `listing_views_agency_id_foreign` (`agency_id`),
  ADD KEY `listing_views_business_id_foreign` (`business_id`);

--
-- Indexes for table `mail_lists`
--
ALTER TABLE `mail_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mail_lists_agency_id_foreign` (`agency_id`),
  ADD KEY `mail_lists_business_id_foreign` (`business_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `opportunities`
--
ALTER TABLE `opportunities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `opportunities_stage_id_foreign` (`stage_id`),
  ADD KEY `opportunities_agency_id_foreign` (`agency_id`),
  ADD KEY `opportunities_business_id_foreign` (`business_id`),
  ADD KEY `opportunities_converted_by_foreign` (`converted_by`),
  ADD KEY `opportunities_source_id_foreign` (`source_id`),
  ADD KEY `opportunities_type_id_foreign` (`type_id`),
  ADD KEY `opportunities_qualification_id_foreign` (`qualification_id`),
  ADD KEY `opportunities_communication_id_foreign` (`communication_id`),
  ADD KEY `opportunities_priority_id_foreign` (`priority_id`),
  ADD KEY `opportunities_nationality_id_foreign` (`nationality_id`),
  ADD KEY `opportunities_city_id_foreign` (`city_id`),
  ADD KEY `opportunities_property_id_foreign` (`property_id`),
  ADD KEY `opportunities_rejected_by_foreign` (`rejected_by`),
  ADD KEY `opportunities_hold_by_foreign` (`hold_by`),
  ADD KEY `opportunities_submit_for_approve_by_foreign` (`submit_for_approve_by`);

--
-- Indexes for table `opportunity_assign_tracking`
--
ALTER TABLE `opportunity_assign_tracking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `opportunity_assign_tracking_opportunity_id_foreign` (`opportunity_id`),
  ADD KEY `opportunity_assign_tracking_agency_id_foreign` (`agency_id`),
  ADD KEY `opportunity_assign_tracking_business_id_foreign` (`business_id`),
  ADD KEY `opportunity_assign_tracking_assigned_by_foreign` (`assigned_by`);

--
-- Indexes for table `opportunity_questions`
--
ALTER TABLE `opportunity_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `opportunity_questions_opportunity_id_foreign` (`opportunity_id`),
  ADD KEY `opportunity_questions_agency_id_foreign` (`agency_id`),
  ADD KEY `opportunity_questions_added_by_foreign` (`added_by`),
  ADD KEY `opportunity_questions_answered_by_foreign` (`answered_by`),
  ADD KEY `opportunity_questions_business_id_foreign` (`business_id`);

--
-- Indexes for table `opportunity_results`
--
ALTER TABLE `opportunity_results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `opportunity_results_opportunity_id_foreign` (`opportunity_id`),
  ADD KEY `opportunity_results_added_by_foreign` (`added_by`),
  ADD KEY `opportunity_results_agency_id_foreign` (`agency_id`),
  ADD KEY `opportunity_results_business_id_foreign` (`business_id`);

--
-- Indexes for table `opportunity_stages`
--
ALTER TABLE `opportunity_stages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `opportunity_stages_agency_id_foreign` (`agency_id`),
  ADD KEY `opportunity_stages_business_id_foreign` (`business_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`),
  ADD KEY `permissions_permission_group_id_foreign` (`permission_group_id`);

--
-- Indexes for table `permission_groups`
--
ALTER TABLE `permission_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portals`
--
ALTER TABLE `portals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_task_type_id_foreign` (`task_type_id`),
  ADD KEY `tasks_task_status_id_foreign` (`task_status_id`),
  ADD KEY `tasks_staff_id_foreign` (`staff_id`),
  ADD KEY `tasks_add_by_foreign` (`add_by`),
  ADD KEY `tasks_agency_id_foreign` (`agency_id`),
  ADD KEY `tasks_business_id_foreign` (`business_id`);

--
-- Indexes for table `task_notes`
--
ALTER TABLE `task_notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_notes_task_id_foreign` (`task_id`),
  ADD KEY `task_notes_add_by_foreign` (`add_by`);

--
-- Indexes for table `task_statuses`
--
ALTER TABLE `task_statuses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_statuses_agency_id_foreign` (`agency_id`),
  ADD KEY `task_statuses_business_id_foreign` (`business_id`);

--
-- Indexes for table `task_types`
--
ALTER TABLE `task_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_types_agency_id_foreign` (`agency_id`),
  ADD KEY `task_types_business_id_foreign` (`business_id`);

--
-- Indexes for table `task_user`
--
ALTER TABLE `task_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_user_task_id_foreign` (`task_id`),
  ADD KEY `task_user_staff_id_foreign` (`staff_id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_agency_id_foreign` (`agency_id`),
  ADD KEY `teams_business_id_foreign` (`business_id`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `templates_agency_id_foreign` (`agency_id`),
  ADD KEY `templates_business_id_foreign` (`business_id`);

--
-- Indexes for table `temporary_listings_documents`
--
ALTER TABLE `temporary_listings_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temporary_listings_photos`
--
ALTER TABLE `temporary_listings_photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temporary_listings_plans`
--
ALTER TABLE `temporary_listings_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_business_id_foreign` (`business_id`),
  ADD KEY `users_nationality_id_foreign` (`nationality_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agencies`
--
ALTER TABLE `agencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `agency_portals`
--
ALTER TABLE `agency_portals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agency_settings`
--
ALTER TABLE `agency_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bank_images`
--
ALTER TABLE `bank_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `businesses`
--
ALTER TABLE `businesses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `calls`
--
ALTER TABLE `calls`
<<<<<<< HEAD:broker.sql
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
=======
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
>>>>>>> 09ec62e9a57ce91a1d5b57895f83fa97513c9a2e:broker (1).sql

--
-- AUTO_INCREMENT for table `call_status`
--
ALTER TABLE `call_status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
<<<<<<< HEAD:broker.sql
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
=======
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
>>>>>>> 09ec62e9a57ce91a1d5b57895f83fa97513c9a2e:broker (1).sql

--
-- AUTO_INCREMENT for table `client_contracts`
--
ALTER TABLE `client_contracts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client_questions`
--
ALTER TABLE `client_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts_mail_list`
--
ALTER TABLE `contacts_mail_list`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contract_document`
--
ALTER TABLE `contract_document`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contract_recurring`
--
ALTER TABLE `contract_recurring`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `developers`
--
ALTER TABLE `developers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `email_logs`
--
ALTER TABLE `email_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `email_notifies`
--
ALTER TABLE `email_notifies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `email_notify_reminders`
--
ALTER TABLE `email_notify_reminders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `email_notify_tenancy`
--
ALTER TABLE `email_notify_tenancy`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `floor_plans`
--
ALTER TABLE `floor_plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `image_banks`
--
ALTER TABLE `image_banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
<<<<<<< HEAD:broker.sql
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
=======
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;
>>>>>>> 09ec62e9a57ce91a1d5b57895f83fa97513c9a2e:broker (1).sql

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lead_communications`
--
ALTER TABLE `lead_communications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lead_priorities`
--
ALTER TABLE `lead_priorities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lead_property`
--
ALTER TABLE `lead_property`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lead_qualifications`
--
ALTER TABLE `lead_qualifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lead_sources`
--
ALTER TABLE `lead_sources`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lead_types`
--
ALTER TABLE `lead_types`
<<<<<<< HEAD:broker.sql
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
=======
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `listings`
--
ALTER TABLE `listings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `listing_cheque_calculator`
--
ALTER TABLE `listing_cheque_calculator`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `listing_documents`
--
ALTER TABLE `listing_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `listing_features`
--
ALTER TABLE `listing_features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `listing_photos`
--
ALTER TABLE `listing_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `listing_plans`
--
ALTER TABLE `listing_plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `listing_rent_cheques`
--
ALTER TABLE `listing_rent_cheques`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `listing_types`
--
ALTER TABLE `listing_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `listing_videos`
--
ALTER TABLE `listing_videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `listing_views`
--
ALTER TABLE `listing_views`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
>>>>>>> 09ec62e9a57ce91a1d5b57895f83fa97513c9a2e:broker (1).sql

--
-- AUTO_INCREMENT for table `mail_lists`
--
ALTER TABLE `mail_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
<<<<<<< HEAD:broker.sql
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;
=======
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=234;
>>>>>>> 09ec62e9a57ce91a1d5b57895f83fa97513c9a2e:broker (1).sql

--
-- AUTO_INCREMENT for table `opportunities`
--
ALTER TABLE `opportunities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `opportunity_assign_tracking`
--
ALTER TABLE `opportunity_assign_tracking`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `opportunity_questions`
--
ALTER TABLE `opportunity_questions`
<<<<<<< HEAD:broker.sql
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
=======
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
>>>>>>> 09ec62e9a57ce91a1d5b57895f83fa97513c9a2e:broker (1).sql

--
-- AUTO_INCREMENT for table `opportunity_results`
--
ALTER TABLE `opportunity_results`
<<<<<<< HEAD:broker.sql
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
=======
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
>>>>>>> 09ec62e9a57ce91a1d5b57895f83fa97513c9a2e:broker (1).sql

--
-- AUTO_INCREMENT for table `opportunity_stages`
--
ALTER TABLE `opportunity_stages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
<<<<<<< HEAD:broker.sql
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
=======
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
>>>>>>> 09ec62e9a57ce91a1d5b57895f83fa97513c9a2e:broker (1).sql

--
-- AUTO_INCREMENT for table `permission_groups`
--
ALTER TABLE `permission_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `portals`
--
ALTER TABLE `portals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
<<<<<<< HEAD:broker.sql
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
=======
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
>>>>>>> 09ec62e9a57ce91a1d5b57895f83fa97513c9a2e:broker (1).sql

--
-- AUTO_INCREMENT for table `task_notes`
--
ALTER TABLE `task_notes`
<<<<<<< HEAD:broker.sql
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
=======
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
>>>>>>> 09ec62e9a57ce91a1d5b57895f83fa97513c9a2e:broker (1).sql

--
-- AUTO_INCREMENT for table `task_statuses`
--
ALTER TABLE `task_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `task_types`
--
ALTER TABLE `task_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `task_user`
--
ALTER TABLE `task_user`
<<<<<<< HEAD:broker.sql
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
=======
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
>>>>>>> 09ec62e9a57ce91a1d5b57895f83fa97513c9a2e:broker (1).sql

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `temporary_listings_documents`
--
ALTER TABLE `temporary_listings_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `temporary_listings_photos`
--
ALTER TABLE `temporary_listings_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `temporary_listings_plans`
--
ALTER TABLE `temporary_listings_plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agencies`
--
ALTER TABLE `agencies`
  ADD CONSTRAINT `agencies_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `agencies_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `agencies_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `agencies_owner_id_foreign` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `agency_portals`
--
ALTER TABLE `agency_portals`
  ADD CONSTRAINT `agency_portals_agency_id_foreign` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `agency_portals_template_id_foreign` FOREIGN KEY (`template_id`) REFERENCES `templates` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `agency_settings`
--
ALTER TABLE `agency_settings`
  ADD CONSTRAINT `agency_settings_agency_id_foreign` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `bank_images`
--
ALTER TABLE `bank_images`
  ADD CONSTRAINT `bank_images_bank_id_foreign` FOREIGN KEY (`bank_id`) REFERENCES `image_banks` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `calls`
--
ALTER TABLE `calls`
  ADD CONSTRAINT `calls_agency_id_foreign` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `calls_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `calls_made_by_foreign` FOREIGN KEY (`made_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `calls_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `calls` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `call_status`
--
ALTER TABLE `call_status`
  ADD CONSTRAINT `call_status_agency_id_foreign` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `call_status_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_agency_id_foreign` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `clients_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `clients_communication_id_foreign` FOREIGN KEY (`communication_id`) REFERENCES `lead_communications` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `clients_converted_by_foreign` FOREIGN KEY (`converted_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `clients_nationality_id_foreign` FOREIGN KEY (`nationality_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `clients_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `lead_property` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `clients_source_id_foreign` FOREIGN KEY (`source_id`) REFERENCES `lead_sources` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `clients_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `lead_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `client_contracts`
--
ALTER TABLE `client_contracts`
  ADD CONSTRAINT `client_contracts_agency_id_foreign` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `client_contracts_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `client_contracts_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `client_contracts_converted_by_foreign` FOREIGN KEY (`converted_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `client_questions`
--
ALTER TABLE `client_questions`
  ADD CONSTRAINT `client_questions_added_by_foreign` FOREIGN KEY (`added_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `client_questions_agency_id_foreign` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `client_questions_answered_by_foreign` FOREIGN KEY (`answered_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `client_questions_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `client_questions_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_agency_id_foreign` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `contacts_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contacts_mail_list`
--
ALTER TABLE `contacts_mail_list`
  ADD CONSTRAINT `contacts_mail_list_mail_list_id_foreign` FOREIGN KEY (`mail_list_id`) REFERENCES `mail_lists` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contract_document`
--
ALTER TABLE `contract_document`
  ADD CONSTRAINT `contract_document_agency_id_foreign` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `contract_document_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `contract_document_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `contract_document_contract_id_foreign` FOREIGN KEY (`contract_id`) REFERENCES `client_contracts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contract_recurring`
--
ALTER TABLE `contract_recurring`
  ADD CONSTRAINT `contract_recurring_agency_id_foreign` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `contract_recurring_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `contract_recurring_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `contract_recurring_contract_id_foreign` FOREIGN KEY (`contract_id`) REFERENCES `client_contracts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `developers`
--
ALTER TABLE `developers`
  ADD CONSTRAINT `developers_agency_id_foreign` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `developers_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `email_logs`
--
ALTER TABLE `email_logs`
  ADD CONSTRAINT `email_logs_add_by_foreign` FOREIGN KEY (`add_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `email_logs_agency_id_foreign` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `email_logs_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `email_notifies`
--
ALTER TABLE `email_notifies`
  ADD CONSTRAINT `email_notifies_agency_id_foreign` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `email_notifies_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `email_notify_reminders`
--
ALTER TABLE `email_notify_reminders`
  ADD CONSTRAINT `email_notify_reminders_email_notify_id_foreign` FOREIGN KEY (`email_notify_id`) REFERENCES `email_notifies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `email_notify_tenancy`
--
ALTER TABLE `email_notify_tenancy`
  ADD CONSTRAINT `email_notify_tenancy_email_notify_id_foreign` FOREIGN KEY (`email_notify_id`) REFERENCES `email_notifies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `floor_plans`
--
ALTER TABLE `floor_plans`
  ADD CONSTRAINT `floor_plans_agency_id_foreign` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `floor_plans_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `floor_plans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `image_banks`
--
ALTER TABLE `image_banks`
  ADD CONSTRAINT `image_banks_agency_id_foreign` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `image_banks_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `image_banks_folder_id_foreign` FOREIGN KEY (`folder_id`) REFERENCES `image_banks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `image_banks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `leads`
--
ALTER TABLE `leads`
  ADD CONSTRAINT `leads_agency_id_foreign` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `leads_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `leads_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `leads_communication_id_foreign` FOREIGN KEY (`communication_id`) REFERENCES `lead_communications` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `leads_nationality_id_foreign` FOREIGN KEY (`nationality_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `leads_priority_id_foreign` FOREIGN KEY (`priority_id`) REFERENCES `lead_priorities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `leads_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `lead_property` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `leads_qualification_id_foreign` FOREIGN KEY (`qualification_id`) REFERENCES `lead_qualifications` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `leads_source_id_foreign` FOREIGN KEY (`source_id`) REFERENCES `lead_sources` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `leads_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `lead_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lead_communications`
--
ALTER TABLE `lead_communications`
  ADD CONSTRAINT `lead_communications_agency_id_foreign` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lead_communications_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lead_priorities`
--
ALTER TABLE `lead_priorities`
  ADD CONSTRAINT `lead_priorities_agency_id_foreign` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lead_priorities_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lead_property`
--
ALTER TABLE `lead_property`
  ADD CONSTRAINT `lead_property_agency_id_foreign` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lead_property_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lead_qualifications`
--
ALTER TABLE `lead_qualifications`
  ADD CONSTRAINT `lead_qualifications_agency_id_foreign` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lead_qualifications_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lead_sources`
--
ALTER TABLE `lead_sources`
  ADD CONSTRAINT `lead_sources_agency_id_foreign` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lead_sources_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lead_types`
--
ALTER TABLE `lead_types`
  ADD CONSTRAINT `lead_types_agency_id_foreign` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lead_types_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `listings`
--
ALTER TABLE `listings`
  ADD CONSTRAINT `listings_agency_id_foreign` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `listings_assigned_to_foreign` FOREIGN KEY (`assigned_to`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `listings_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `listings_developer_id_foreign` FOREIGN KEY (`developer_id`) REFERENCES `developers` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `listings_landlord_id_foreign` FOREIGN KEY (`landlord_id`) REFERENCES `clients` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `listings_listing_rent_cheque_id_foreign` FOREIGN KEY (`listing_rent_cheque_id`) REFERENCES `listing_rent_cheques` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `listings_source_id_foreign` FOREIGN KEY (`source_id`) REFERENCES `lead_sources` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `listings_tenant_id_foreign` FOREIGN KEY (`tenant_id`) REFERENCES `clients` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `listings_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `listing_types` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `listing_cheque_calculator`
--
ALTER TABLE `listing_cheque_calculator`
  ADD CONSTRAINT `listing_cheque_calculator_listing_id_foreign` FOREIGN KEY (`listing_id`) REFERENCES `listings` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `listing_documents`
--
ALTER TABLE `listing_documents`
  ADD CONSTRAINT `listing_documents_listing_id_foreign` FOREIGN KEY (`listing_id`) REFERENCES `listings` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `listing_photos`
--
ALTER TABLE `listing_photos`
  ADD CONSTRAINT `listing_photos_listing_id_foreign` FOREIGN KEY (`listing_id`) REFERENCES `listings` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `listing_plans`
--
ALTER TABLE `listing_plans`
  ADD CONSTRAINT `listing_plans_listing_id_foreign` FOREIGN KEY (`listing_id`) REFERENCES `listings` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `listing_rent_cheques`
--
ALTER TABLE `listing_rent_cheques`
  ADD CONSTRAINT `listing_rent_cheques_agency_id_foreign` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `listing_rent_cheques_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `listing_types`
--
ALTER TABLE `listing_types`
  ADD CONSTRAINT `listing_types_agency_id_foreign` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `listing_types_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `listing_videos`
--
ALTER TABLE `listing_videos`
  ADD CONSTRAINT `listing_videos_listing_id_foreign` FOREIGN KEY (`listing_id`) REFERENCES `listings` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `listing_views`
--
ALTER TABLE `listing_views`
  ADD CONSTRAINT `listing_views_agency_id_foreign` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `listing_views_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mail_lists`
--
ALTER TABLE `mail_lists`
  ADD CONSTRAINT `mail_lists_agency_id_foreign` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mail_lists_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `opportunities`
--
ALTER TABLE `opportunities`
  ADD CONSTRAINT `opportunities_agency_id_foreign` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `opportunities_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `opportunities_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `opportunities_communication_id_foreign` FOREIGN KEY (`communication_id`) REFERENCES `lead_communications` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `opportunities_converted_by_foreign` FOREIGN KEY (`converted_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `opportunities_hold_by_foreign` FOREIGN KEY (`hold_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `opportunities_nationality_id_foreign` FOREIGN KEY (`nationality_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `opportunities_priority_id_foreign` FOREIGN KEY (`priority_id`) REFERENCES `lead_priorities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `opportunities_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `lead_property` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `opportunities_qualification_id_foreign` FOREIGN KEY (`qualification_id`) REFERENCES `lead_qualifications` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `opportunities_rejected_by_foreign` FOREIGN KEY (`rejected_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `opportunities_source_id_foreign` FOREIGN KEY (`source_id`) REFERENCES `lead_sources` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `opportunities_stage_id_foreign` FOREIGN KEY (`stage_id`) REFERENCES `opportunity_stages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `opportunities_submit_for_approve_by_foreign` FOREIGN KEY (`submit_for_approve_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `opportunities_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `lead_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `opportunity_assign_tracking`
--
ALTER TABLE `opportunity_assign_tracking`
  ADD CONSTRAINT `opportunity_assign_tracking_agency_id_foreign` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `opportunity_assign_tracking_assigned_by_foreign` FOREIGN KEY (`assigned_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `opportunity_assign_tracking_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `opportunity_assign_tracking_opportunity_id_foreign` FOREIGN KEY (`opportunity_id`) REFERENCES `opportunities` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `opportunity_questions`
--
ALTER TABLE `opportunity_questions`
  ADD CONSTRAINT `opportunity_questions_added_by_foreign` FOREIGN KEY (`added_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `opportunity_questions_agency_id_foreign` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `opportunity_questions_answered_by_foreign` FOREIGN KEY (`answered_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `opportunity_questions_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `opportunity_questions_opportunity_id_foreign` FOREIGN KEY (`opportunity_id`) REFERENCES `opportunities` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `opportunity_results`
--
ALTER TABLE `opportunity_results`
  ADD CONSTRAINT `opportunity_results_added_by_foreign` FOREIGN KEY (`added_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `opportunity_results_agency_id_foreign` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `opportunity_results_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `opportunity_results_opportunity_id_foreign` FOREIGN KEY (`opportunity_id`) REFERENCES `opportunities` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `opportunity_stages`
--
ALTER TABLE `opportunity_stages`
  ADD CONSTRAINT `opportunity_stages_agency_id_foreign` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `opportunity_stages_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_permission_group_id_foreign` FOREIGN KEY (`permission_group_id`) REFERENCES `permission_groups` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_add_by_foreign` FOREIGN KEY (`add_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tasks_agency_id_foreign` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tasks_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tasks_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tasks_task_status_id_foreign` FOREIGN KEY (`task_status_id`) REFERENCES `task_statuses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tasks_task_type_id_foreign` FOREIGN KEY (`task_type_id`) REFERENCES `task_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `task_notes`
--
ALTER TABLE `task_notes`
  ADD CONSTRAINT `task_notes_add_by_foreign` FOREIGN KEY (`add_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `task_notes_task_id_foreign` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `task_statuses`
--
ALTER TABLE `task_statuses`
  ADD CONSTRAINT `task_statuses_agency_id_foreign` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `task_statuses_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `task_types`
--
ALTER TABLE `task_types`
  ADD CONSTRAINT `task_types_agency_id_foreign` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `task_types_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `task_user`
--
ALTER TABLE `task_user`
  ADD CONSTRAINT `task_user_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `task_user_task_id_foreign` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `teams_agency_id_foreign` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `teams_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `templates`
--
ALTER TABLE `templates`
  ADD CONSTRAINT `templates_agency_id_foreign` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `templates_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_nationality_id_foreign` FOREIGN KEY (`nationality_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
