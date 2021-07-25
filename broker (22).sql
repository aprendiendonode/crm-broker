-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2021 at 04:30 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.5

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
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `log_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `add_by` bigint(20) UNSIGNED DEFAULT NULL,
  `agency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `log_en`, `log_ar`, `group`, `group_id`, `add_by`, `agency_id`, `business_id`, `created_at`, `updated_at`) VALUES
(1, 'the task #6 has been edited by Ceo (Status (completed_successful) )', 'تم تعديل مهمة رقم #6 تمت بواسطه Ceo(الحاله(completed_successful))', 'task', '6', 1, 1, 1, '2021-06-07 19:30:20', '2021-06-07 19:30:20');

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
  `business_id` bigint(20) UNSIGNED DEFAULT NULL,
  `agency_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_symbol` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cell_symbol` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agencies`
--

INSERT INTO `agencies` (`id`, `company_name_en`, `company_name_ar`, `company_email`, `description_en`, `description_ar`, `country_code`, `city_code`, `phone`, `cell_code`, `cell`, `website`, `fax_country_code`, `fax_city_code`, `company_fax`, `address`, `trade_license`, `image`, `company_orn`, `country_id`, `city_id`, `owner_id`, `deleted_at`, `created_at`, `updated_at`, `business_id`, `agency_token`, `currency`, `country_symbol`, `cell_symbol`) VALUES
(1, 'otg', 'otg', 'otg@onetecgroup.com', '<p><strong>LIST YOUR PROPERTY:</strong><br>Looking to SELL / LEASE your property?&nbsp;<br>Let us take the strain and assist you. With our database of ready clients you are steps away from getting the best deal for your property, we will be happy to help you by advertising your property in a professional manner.&nbsp;<br><strong>Contact us now:&nbsp;</strong><br>&nbsp;</p><ul><li>Landline:&nbsp;+971 4 421 7902</li><li>Hotline:&nbsp;+971 55 1900 600</li><li>E-Mail: info@pcasa.ae |&nbsp;www.pcasa.ae&nbsp;&nbsp;<br>&nbsp;</li></ul><p><strong>PERFECTA CASA REAL ESTATE&nbsp;COMPANY STATEMENT</strong></p><p>&nbsp;</p><p><strong>OUR VISION:</strong></p><p>&nbsp;</p><ul><li>To be a world class company in developing ideal investment opportunities and innovative real estate solution, both locally and globally, that exceeds our clientsâ€™ expectations</li></ul><p><strong>OUR MISSION:</strong></p><ul><li>To provide the finest Real Estate service in the region based on the highest standard of ethics and society through professionalism, ethics, quality and customer service.</li><li>To respect and comply with Safety, Environmental and legal/ RERA requirements.</li><li>To continually improve our competitive edge through innovations, Motivations Suggestion schemes, and customer feedback.&nbsp;<br>&nbsp;</li></ul><p><strong>QUALITY POLICY:</strong></p><ul><li>We at Perfecta Casa Real Estate are committed to provide the best Real Estate investment opportunities which exceed customer expectations through creativity continual improvement, professionalism, honesty and integrity.&nbsp;<br>&nbsp;</li></ul><p><strong>CEO-MD MESSAGE:</strong></p><p>&nbsp;</p><ul><li>Our goal is to provide quality service to our clients and to totally commit to their needs in Real Estate market.</li><li>Our objective is to run a profitable business through goal-setting, Planning and superior service to our clients through honesty in presenting the best available investment options and to be committed to consultant, Brokers and Agents code of ethics.</li></ul>', NULL, '20', NULL, '01006143107', '20', '01127628337', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 234, NULL, 1, NULL, '2021-03-07 13:30:03', '2021-07-25 12:28:54', 1, NULL, NULL, 'eg', 'eg'),
(2, 'pcasa', 'pcasa', 'pcasa@onetecgroup.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 66, NULL, 1, NULL, '2021-03-07 13:30:03', '2021-03-07 13:30:03', 1, NULL, NULL, NULL, NULL),
(3, 'Perfecta Casa', 'Perfecta Casa', 'info@pcasa.ae', NULL, NULL, '+971', NULL, '5773337', '+971', '1111', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 234, NULL, 10, NULL, NULL, '2021-06-22 19:10:07', 2, 'hLrmNWDmtEfLQjDNB9dNpwHFyQHFPliIgB9mHq4ZC1bV5FOedghrLT6GQmaG', NULL, NULL, NULL);

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
-- Table structure for table `black_lists`
--

CREATE TABLE `black_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `black_listed_agency_id` bigint(20) UNSIGNED DEFAULT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL,
  `business_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `businesses`
--

INSERT INTO `businesses` (`id`, `deleted_at`, `created_at`, `updated_at`, `business_token`) VALUES
(1, NULL, '2021-03-07 13:30:03', '2021-03-07 13:30:03', NULL),
(2, NULL, NULL, NULL, '1CecqRpAW2Yi2yttT0esqpKSHKbzrzFw7AeYq31rlYdZaRWhuJQsnj79H8Zf');

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

--
-- Dumping data for table `calls`
--

INSERT INTO `calls` (`id`, `contact_date`, `contact_time`, `next_action_date`, `next_action_time`, `note`, `made_by`, `module`, `module_id`, `agency_id`, `business_id`, `created_at`, `updated_at`, `status_id`) VALUES
(1, '2021-04-14', '05:40', NULL, NULL, 'deeeee', 1, 'opportunity', 2, 1, 1, '2021-04-14 15:44:55', '2021-04-14 15:44:55', 1),
(2, '2021-06-01', '10:54', '2021-06-01', '12:00', 'note', 1, 'opportunity', 3, 1, 1, '2021-06-01 08:54:54', '2021-06-01 11:36:48', 1);

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

--
-- Dumping data for table `call_status`
--

INSERT INTO `call_status` (`id`, `name_en`, `name_ar`, `slug`, `agency_id`, `business_id`, `created_at`, `updated_at`) VALUES
(1, 'name', 'محلي', 'name', 1, 1, '2021-04-14 15:44:48', '2021-04-14 15:44:48');

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
  `was_lead` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qualification_id` bigint(20) DEFAULT NULL,
  `priority_id` bigint(20) DEFAULT NULL,
  `assigned_to` bigint(20) DEFAULT NULL,
  `sub_community` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone1_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone2_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `campaign_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `campaign_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `campaign_lead_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `campaign_form_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `campaign_ad_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `campaign_ad_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `campaign_adset_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone1_symbol` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone2_symbol` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `note`, `agency_id`, `business_id`, `converted_by`, `salutation`, `source_id`, `type_id`, `communication_id`, `company`, `website`, `po_box`, `passport`, `passport_expiration_date`, `name`, `partner_name`, `date_of_birth`, `email1`, `email2`, `nationality_id`, `phone1`, `phone2`, `landline`, `fax`, `developer`, `community`, `building_name`, `property_purpose`, `property_no`, `property_reference`, `property_id`, `size_sqft`, `size_sqm`, `bedrooms`, `bathrooms`, `parkings`, `skype`, `twitter`, `facebook`, `linkedin`, `country`, `currency`, `language`, `longitude`, `latitude`, `address`, `other`, `city`, `converted_from`, `status`, `created_at`, `updated_at`, `national_id`, `was_lead`, `table_name`, `qualification_id`, `priority_id`, `assigned_to`, `sub_community`, `phone1_code`, `phone2_code`, `campaign_id`, `campaign_name`, `campaign_lead_id`, `campaign_form_id`, `campaign_ad_id`, `campaign_ad_name`, `campaign_adset_name`, `phone1_symbol`, `phone2_symbol`) VALUES
(6, NULL, 1, 1, 1, 'Mr', 66, 17, 1, NULL, NULL, NULL, NULL, NULL, 'mohamed hamed', NULL, '2021-04-10', 'mohamed@gmail.com', NULL, 2, '0100 614 3333', '01005050500', NULL, NULL, NULL, NULL, NULL, 'rent', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EGP', 'ar', NULL, NULL, NULL, NULL, NULL, '1', 'accepted', '2021-04-10 14:59:07', '2021-07-25 10:33:18', '165465465465', NULL, NULL, NULL, NULL, NULL, NULL, '20', '20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'eg', 'eg'),
(8, NULL, 1, 1, 1, 'Mr', 2, 2, 1, NULL, NULL, NULL, NULL, NULL, 'tenant test', NULL, NULL, 'tena3nt@gmail.com', 'tena1nt@gmail.com', 2, '125656656565', NULL, NULL, NULL, NULL, NULL, NULL, 'rent', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Afghanistan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2021-04-26 00:55:52', '2021-05-10 09:50:04', NULL, 'no', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, NULL, 1, 1, 1, 'Mr', NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'tenant test', NULL, NULL, 'tenan2t@gmail.com', NULL, NULL, '125656656565', NULL, NULL, NULL, NULL, NULL, NULL, 'rent', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2021-04-26 00:57:02', '2021-04-26 00:57:02', NULL, 'no', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, NULL, 1, 1, 1, 'Mr', NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'tenant test', NULL, NULL, 'tenant1@gmail.com', NULL, NULL, '125656656565', NULL, NULL, NULL, NULL, NULL, NULL, 'rent', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2021-04-26 00:58:17', '2021-04-26 00:58:17', NULL, 'no', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, NULL, 1, 1, 1, 'Mr', NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'mohamed hamed', NULL, NULL, 'mohamed@gmail.com', NULL, NULL, '027628337', NULL, NULL, NULL, NULL, NULL, NULL, 'rent', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2021-04-26 01:08:57', '2021-04-26 01:08:57', NULL, 'no', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, NULL, 1, 1, 1, 'Mr', NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, 'landlord test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rent', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2021-04-26 01:20:44', '2021-04-26 01:20:44', NULL, 'no', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, NULL, 1, 1, 1, 'Mr', 1, 1, 1, NULL, NULL, NULL, NULL, NULL, 'Ahmed mohamed', NULL, '2021-05-09', 'shadyosamafawzy@gmail.com', NULL, 66, '0113408535', NULL, NULL, NULL, NULL, NULL, NULL, 'rent', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Egypt', 'AUD', 'cs', NULL, NULL, NULL, NULL, NULL, '2', 'pending', '2021-05-09 11:43:56', '2021-05-09 11:43:56', '1545789789', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, NULL, 1, 1, 1, 'Mr', 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, 'mohamed', NULL, NULL, 'tena5nt@gmail.com', NULL, NULL, '0100613107', NULL, NULL, NULL, NULL, NULL, NULL, 'rent', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2021-05-10 10:28:04', '2021-05-10 10:28:04', NULL, 'no', 'clients', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, NULL, 1, 1, 1, 'Mr', 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, 'zad', NULL, NULL, 'tenan6t@gmail.com', NULL, NULL, '0100613107', NULL, NULL, NULL, NULL, NULL, NULL, 'rent', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2021-05-10 10:28:25', '2021-05-10 10:28:25', NULL, 'no', 'clients', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, NULL, 1, 1, 1, 'Mr', 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, 'tw', NULL, NULL, 'te7nant@gmail.com', NULL, NULL, '0100614317', NULL, NULL, NULL, NULL, NULL, NULL, 'rent', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2021-05-10 10:28:51', '2021-05-10 10:28:51', NULL, 'no', 'clients', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, NULL, 1, 1, 1, 'Mr', NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, 'Shady osama', NULL, NULL, 'tenant@gmail.com', NULL, NULL, '0100614317', NULL, NULL, NULL, NULL, NULL, NULL, 'rent', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2021-05-10 10:38:59', '2021-05-10 10:38:59', NULL, 'no', 'clients', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, NULL, 1, 1, 1, 'Mr', NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, 'Shady osama', NULL, NULL, 'tenant23@gmail.com', NULL, NULL, '010506143107', NULL, NULL, NULL, NULL, NULL, NULL, 'rent', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2021-05-10 10:41:12', '2021-05-10 10:41:12', NULL, 'no', 'clients', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, NULL, 1, 1, 1, 'Mr', NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, 'Shady osama', NULL, NULL, 'hamedd@onetecgroup.com', NULL, NULL, '010061431078', NULL, NULL, NULL, NULL, NULL, NULL, 'rent', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2021-05-10 10:50:42', '2021-05-10 10:50:42', NULL, 'no', 'clients', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, NULL, 1, 1, 1, 'Mr', NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'Shady osama', NULL, NULL, 'shady@onetecgroup.com', NULL, NULL, '0100614310789', NULL, NULL, NULL, NULL, NULL, NULL, 'rent', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2021-05-10 10:52:39', '2021-05-10 10:52:39', NULL, 'no', 'clients', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, NULL, 1, 1, 1, 'Mr', 1, 1, 1, NULL, NULL, NULL, 'J2002531', '4392-01-01', 'HALEEMUNNISA BEGUM', NULL, '1978-07-19', 'haleemdxb@yahoo.com', NULL, 102, '971507108596', NULL, NULL, NULL, '4', '2', NULL, NULL, 'PA3_001 002', NULL, 3, '181.04', NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4', 'accepted', '2021-06-07 18:46:16', '2021-06-07 18:46:16', NULL, NULL, 'clients', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, NULL, 1, 1, 1, 'Mr', 1, 1, 1, NULL, NULL, NULL, 'G8811052', '4330-01-01', 'GIRISH ARVIND', NULL, '1976-10-15', 'borkar.girish@gmail.com', NULL, 102, '971506241637', NULL, NULL, NULL, '4', NULL, NULL, NULL, 'PA3_001 005', NULL, 3, '182.35', NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5', 'accepted', '2021-06-07 18:53:31', '2021-06-07 19:01:10', NULL, NULL, 'clients', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, NULL, 1, 1, 1, 'Mr', 1, 1, 1, NULL, NULL, NULL, '16FV00892', '4474-01-01', 'JAMAL EL', NULL, '1983-06-13', 'j.elouahi@gmail.com', NULL, 76, '566834218', NULL, NULL, NULL, '4', NULL, NULL, NULL, 'PA3_004 022', NULL, 3, '193.63', NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7', 'accepted', '2021-06-15 07:09:08', '2021-06-15 07:16:46', NULL, NULL, 'clients', NULL, NULL, NULL, NULL, '+971', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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

--
-- Dumping data for table `client_contracts`
--

INSERT INTO `client_contracts` (`id`, `client_id`, `converted_by`, `status`, `contract_type`, `customer_name`, `customer_national_id`, `customer_address`, `landlord_name`, `landlord_national_id`, `landlord_address`, `address`, `notes`, `start_date`, `end_date`, `amount`, `has_recurring`, `recurring_number`, `agency_id`, `business_id`, `created_at`, `updated_at`) VALUES
(6, 6, 1, 'pending', 'rent', 'mohamed', '54654656542', 'addddddddddddddddd\r\naddddddddddddddddddd', 'ahmed', '54654656543', '1222 Rama III Road', 'ain shams', 'note', '2021-04-10', '2021-04-16', '10000', 'no', NULL, 1, 1, '2021-04-10 14:59:07', '2021-04-10 14:59:07'),
(7, 13, 1, 'pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2021-05-09 11:43:56', '2021-05-09 11:43:56');

-- --------------------------------------------------------

--
-- Table structure for table `client_notes`
--

CREATE TABLE `client_notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED DEFAULT NULL,
  `add_by` bigint(20) UNSIGNED DEFAULT NULL,
  `notes_en` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes_ar` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `communities`
--

CREATE TABLE `communities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `communities`
--

INSERT INTO `communities` (`id`, `name_en`, `name_ar`, `city_id`, `created_at`, `updated_at`, `country_id`) VALUES
(8, 'Dubai Marina', 'دبي مارينا', 34, '2021-06-21 17:32:35', '2021-06-21 17:32:35', 234),
(9, 'Business Bay', 'خليج الأعمال', 34, '2021-06-21 17:33:55', '2021-06-21 17:33:55', 234),
(10, 'Jumeirah Lake Towers (JLT)', 'أبراج بحيرات جميرا', 34, '2021-06-21 17:35:59', '2021-06-21 17:35:59', 234),
(11, 'The Villa', 'الفيلا', 34, '2021-06-21 17:36:25', '2021-06-21 17:36:25', 234),
(12, 'Dubai Pearl', 'لؤلؤة دبي', 34, '2021-06-21 17:37:05', '2021-06-21 17:37:05', 234),
(13, 'Arabian Ranches', 'المرابع العربية', 34, '2021-06-21 17:37:42', '2021-06-21 17:37:42', 234),
(14, 'Discovery Gardens', 'ديسكفري جاردنز', 34, '2021-06-21 17:39:08', '2021-06-21 17:39:08', 234),
(15, 'Sharjah Investment Center', 'مركز الشارقة للاستثمار', 36, '2021-06-21 17:39:25', '2021-06-21 17:39:25', 234),
(16, 'Dubai Investment Park (DIP)', 'مجمع دبي للاستثمار', 34, '2021-06-21 17:39:35', '2021-06-21 17:39:35', 234),
(17, 'Abu Shagara', 'أبو شغارة', 36, '2021-06-21 17:40:02', '2021-06-21 17:40:02', 234),
(18, 'Green Community', 'غرين كوميونيتي', 34, '2021-06-21 17:40:17', '2021-06-21 17:40:17', 234),
(19, 'Al Abar', 'العبار', 36, '2021-06-21 17:40:31', '2021-06-21 17:40:31', 234),
(20, 'The Springs', 'الينابيع', 34, '2021-06-21 17:40:44', '2021-06-21 17:40:44', 234),
(21, 'Al Azra', 'العزرة', 36, '2021-06-21 17:40:57', '2021-06-21 17:40:57', 234),
(22, 'The Greens', 'الخضر', 34, '2021-06-21 17:41:11', '2021-06-21 17:41:11', 234),
(23, 'The Views', 'المناظر', 34, '2021-06-21 17:41:56', '2021-06-21 17:41:56', 234),
(24, 'Al Darari', 'الدراري', 36, '2021-06-21 17:42:04', '2021-06-21 17:42:04', 234),
(25, 'The Meadows', 'المروج', 34, '2021-06-21 17:42:20', '2021-06-21 17:42:20', 234),
(26, 'Dubai Sports City', 'مدينة دبي الرياضية', 34, '2021-06-21 17:42:50', '2021-06-21 17:42:50', 234),
(27, 'Al Falaj', 'الفلج', 36, '2021-06-21 17:43:08', '2021-06-21 17:43:08', 234),
(28, 'Al Fayha', 'الفيحاء', 36, '2021-06-21 17:43:28', '2021-06-21 17:43:28', 234),
(29, 'International City', 'المدينة العالمية', 34, '2021-06-21 17:43:32', '2021-06-21 17:43:32', 234),
(30, 'Al Fisht', 'الفشت', 36, '2021-06-21 17:43:45', '2021-06-21 17:43:45', 234),
(31, 'Sheikh Zayed Road', 'شارع الشيخ زايد', 34, '2021-06-21 17:43:59', '2021-06-21 17:43:59', 234),
(32, 'Al Ghafia', 'الغافية', 36, '2021-06-21 17:44:06', '2021-06-21 17:44:06', 234),
(33, 'Dubai Silicon Oasis', 'واحة دبي للسيليكون', 34, '2021-06-21 17:44:27', '2021-06-21 17:44:27', 234),
(34, 'DIFC', 'مركز دبي المالي العالمي', 34, '2021-06-21 17:44:50', '2021-06-21 17:44:50', 234),
(35, 'Culture Village', 'قرية الثقافة', 34, '2021-06-21 17:45:15', '2021-06-21 17:45:15', 234),
(36, 'Al Gharb', 'الغرب', 36, '2021-06-21 17:45:15', '2021-06-21 17:45:15', 234),
(37, 'Jumeirah Village Circle (JVC)', 'دائرة قرية جميرا', 34, '2021-06-21 17:45:50', '2021-06-21 17:45:50', 234),
(38, 'Al Ghubaiba', 'الغبيبة', 36, '2021-06-21 17:45:53', '2021-06-21 17:45:53', 234),
(39, 'Al Ghuwair', 'الغوير', 36, '2021-06-21 17:46:13', '2021-06-21 17:46:13', 234),
(40, 'Palm Jumeirah', 'نخلة جميرا', 34, '2021-06-21 17:46:14', '2021-06-21 17:46:14', 234),
(41, 'Palm Jebel Ali', 'نخلة جبل علي', 34, '2021-06-21 17:46:43', '2021-06-21 17:46:43', 234),
(42, 'Dubai Waterfront', 'واجهة دبي المائية', 34, '2021-06-21 17:47:08', '2021-06-21 17:47:08', 234),
(43, 'Al Goaz', 'القوز', 36, '2021-06-21 17:48:10', '2021-06-21 17:48:10', 234),
(44, 'Jumeirah Golf Estate', 'عقارات جميرا للجولف', 34, '2021-06-21 17:48:46', '2021-06-21 17:48:46', 234),
(45, 'Al Heerah Suburb', 'ضاحية الحيرة', 36, '2021-06-21 17:48:55', '2021-06-21 17:48:55', 234),
(46, 'Jumeirah Park', 'جميرا بارك', 34, '2021-06-21 17:49:10', '2021-06-21 17:49:10', 234),
(47, 'City of Arabia', 'مدينة العرب', 34, '2021-06-21 17:49:39', '2021-06-21 17:49:39', 234),
(48, 'The Gardens', 'الحدائق', 34, '2021-06-21 17:50:07', '2021-06-21 17:50:07', 234),
(49, 'The Lagoons', 'الخيران', 34, '2021-06-21 17:50:32', '2021-06-21 17:50:32', 234),
(50, 'Jumeirah Beach Residence (JBR)', 'جميرا بيتش ريزيدنس', 34, '2021-06-21 17:51:03', '2021-06-21 17:51:03', 234),
(51, 'Al Hazannah', 'الحزانة', 36, '2021-06-21 17:52:05', '2021-06-21 17:52:05', 234),
(52, 'Old Town', 'البلدة القديمة', 34, '2021-06-21 17:52:31', '2021-06-21 17:52:31', 234),
(53, 'Al Jazzat', 'الجزات', 36, '2021-06-21 17:52:33', '2021-06-21 17:52:33', 234),
(54, 'Al Khaledia Suburb', 'ضاحية الخالدية', 36, '2021-06-21 17:53:09', '2021-06-21 17:53:09', 234),
(55, 'Al Nahda', 'النهضه', 34, '2021-06-21 17:53:12', '2021-06-21 17:53:12', 234),
(56, 'Al Khan', 'الخان', 36, '2021-06-21 17:53:36', '2021-06-21 17:53:36', 234),
(57, 'Al Qusais', 'القصيص', 34, '2021-06-21 17:53:38', '2021-06-21 17:53:38', 234),
(58, 'Al Khezamia', 'الخزامية', 36, '2021-06-21 17:53:58', '2021-06-21 17:53:58', 234),
(59, 'Muhaisnah', 'محيصنة', 34, '2021-06-21 17:54:04', '2021-06-21 17:54:04', 234),
(60, 'Al Layyeh Suburb', 'ضاحية اللية', 36, '2021-06-21 17:54:39', '2021-06-21 17:54:39', 234),
(61, 'Mirdif', 'مردف', 34, '2021-06-21 17:54:44', '2021-06-21 17:54:44', 234),
(62, 'Al Mizhar', 'المزهر', 34, '2021-06-21 17:55:04', '2021-06-21 17:55:04', 234),
(63, 'Al Majaz', 'المجاز', 36, '2021-06-21 17:55:08', '2021-06-21 17:55:08', 234),
(64, 'Al Khawaneej', 'الخوانيج', 34, '2021-06-21 17:55:24', '2021-06-21 17:55:24', 234),
(65, 'Al Mamzar', 'الممزر', 36, '2021-06-21 17:55:41', '2021-06-21 17:55:41', 234),
(66, 'Al Twar', 'الطوار', 34, '2021-06-21 17:55:52', '2021-06-21 17:55:52', 234),
(67, 'Al Mirgab', 'المرقاب', 36, '2021-06-21 17:55:59', '2021-06-21 17:55:59', 234),
(68, 'Oud Al Muteena', 'عود المطينة', 34, '2021-06-21 17:56:12', '2021-06-21 17:56:12', 234),
(69, 'Al Muntazah', 'المنتزه', 36, '2021-06-21 17:56:22', '2021-06-21 17:56:22', 234),
(70, 'Al Khabisi', 'الخبيصي', 34, '2021-06-21 17:56:31', '2021-06-21 17:56:31', 234),
(71, 'Al Musalla', 'المصلى', 36, '2021-06-21 17:56:49', '2021-06-21 17:56:49', 234),
(72, 'Al Warqaa', 'الورقاء', 34, '2021-06-21 17:56:57', '2021-06-21 17:56:57', 234),
(73, 'Al Nahda', 'النهضة', 36, '2021-06-21 17:57:15', '2021-06-21 17:57:15', 234),
(74, 'Nad Al Hamar', 'ند الحمر', 34, '2021-06-21 17:57:18', '2021-06-21 17:57:18', 234),
(75, 'Al Nabba', 'النباعة', 36, '2021-06-21 17:57:31', '2021-06-21 17:57:31', 234),
(76, 'Nad Shamma', 'ند شما', 34, '2021-06-21 17:57:38', '2021-06-21 17:57:38', 234),
(77, 'Al Rashidiya', 'الراشدية', 34, '2021-06-21 17:58:02', '2021-06-21 17:58:02', 234),
(78, 'Al Nasserya', 'الناصرية', 36, '2021-06-21 17:58:19', '2021-06-21 17:58:19', 234),
(79, 'Al Nekhailat', 'النخيلات', 36, '2021-06-21 17:58:41', '2021-06-21 17:58:41', 234),
(80, 'Umm Ramool', 'أم رمول', 34, '2021-06-21 17:58:44', '2021-06-21 17:58:44', 234),
(81, 'Al Qadisiya', 'القادسية', 36, '2021-06-21 17:58:59', '2021-06-21 17:58:59', 234),
(82, 'Al Garhoud', 'القرهود', 34, '2021-06-21 17:59:05', '2021-06-21 17:59:05', 234),
(83, 'Al Qasimia', 'القاسمية', 36, '2021-06-21 17:59:23', '2021-06-21 17:59:23', 234),
(84, 'Al Buteen', 'البطين', 34, '2021-06-21 17:59:29', '2021-06-21 17:59:29', 234),
(85, 'Al Ramaqiya', 'الرماقية', 36, '2021-06-21 17:59:52', '2021-06-21 17:59:52', 234),
(86, 'Dubai Maritime City', 'مدينة دبي الملاحية', 34, '2021-06-21 17:59:57', '2021-06-21 17:59:57', 234),
(87, 'Al Ramla', 'الرملة', 36, '2021-06-21 18:00:10', '2021-06-21 18:00:10', 234),
(88, 'Al Mina', 'الميناء', 34, '2021-06-21 18:00:25', '2021-06-21 18:00:25', 234),
(89, 'Al Ramtha', 'الرمثا', 36, '2021-06-21 18:00:26', '2021-06-21 18:00:26', 234),
(90, 'Al Karama', 'الكرامة', 34, '2021-06-21 18:00:44', '2021-06-21 18:00:44', 234),
(91, 'Al Rifa', 'الرفاعة', 36, '2021-06-21 18:00:54', '2021-06-21 18:02:25', 234),
(92, 'Al Jaddaf', 'الجداف', 34, '2021-06-21 18:01:01', '2021-06-21 18:01:01', 234),
(93, 'Al Rifah', 'الرفاع', 36, '2021-06-21 18:01:43', '2021-06-21 18:01:43', 234),
(94, 'Al Riqqa Suburb', 'ضاحية الرقة', 36, '2021-06-21 18:03:00', '2021-06-21 18:03:00', 234),
(95, 'Al Seef', 'السيف', 36, '2021-06-21 18:04:29', '2021-06-21 18:04:29', 234),
(96, 'Al Shahba', 'الشهباء', 36, '2021-06-21 18:05:15', '2021-06-21 18:05:15', 234),
(97, 'Al Sharq', 'الشرق', 36, '2021-06-21 18:05:37', '2021-06-21 18:05:37', 234),
(98, 'Al Soor', 'السور', 36, '2021-06-21 18:06:09', '2021-06-21 18:06:09', 234),
(99, 'Al Sabkha', 'الصبخة', 36, '2021-06-21 18:07:15', '2021-06-21 18:07:15', 234),
(100, 'Al Sweihat', 'السويحات', 36, '2021-06-21 18:07:38', '2021-06-21 18:07:38', 234),
(101, 'Al Talae', 'الطلائع', 36, '2021-06-21 18:09:11', '2021-06-21 18:09:11', 234),
(102, 'Al Yarmook', 'اليرموك', 36, '2021-06-21 18:09:32', '2021-06-21 18:09:32', 234),
(103, 'Bu Daniq', 'أبو دَنق', 36, '2021-06-21 18:10:32', '2021-06-21 18:10:32', 234),
(104, 'Bu Tina', 'بوطينة', 36, '2021-06-21 18:11:06', '2021-06-21 18:11:06', 234),
(105, 'Dasman', 'دسمان', 36, '2021-06-21 18:11:31', '2021-06-21 18:11:31', 234),
(106, 'Al Yash', 'الياش', 36, '2021-06-21 18:11:59', '2021-06-21 18:11:59', 234),
(107, 'Muwaileh', 'مويلح', 36, '2021-06-21 18:14:09', '2021-06-21 18:14:09', 234),
(108, 'Halwan Suburb', 'ضاحية حلوان', 36, '2021-06-21 18:15:16', '2021-06-21 18:15:16', 234),
(109, 'Industrial Area', 'المنطقة الصناعية', 36, '2021-06-21 18:16:16', '2021-06-21 18:16:16', 234),
(110, 'Mughaidir Suburb', 'ضاحية مغيدر', 36, '2021-06-21 18:17:05', '2021-06-21 18:17:05', 234),
(111, 'Muwafjah', 'موافجة', 36, '2021-06-21 18:17:25', '2021-06-21 18:17:25', 234),
(112, 'Muwailih Commercial', 'مويلح التجارية', 36, '2021-06-21 18:18:12', '2021-06-21 18:18:12', 234),
(113, 'Maysaloon', 'ميسلون', 36, '2021-06-21 18:48:30', '2021-06-21 18:48:30', 234),
(114, 'Ras Al Khor', 'رأس الخور', 34, '2021-06-21 18:49:12', '2021-06-21 18:49:12', 234),
(115, 'Nad Al Sheba', 'ند الشبا', 34, '2021-06-21 18:49:32', '2021-06-21 18:49:32', 234),
(116, 'Samnan', 'سمنان', 36, '2021-06-21 18:49:46', '2021-06-21 18:49:46', 234),
(117, 'Bukadra', 'بوكدره', 34, '2021-06-21 18:49:59', '2021-06-21 18:49:59', 234),
(118, 'Al Hudaiba', 'الحضيبة', 34, '2021-06-21 18:50:23', '2021-06-21 18:50:23', 234),
(119, 'Al Jafiliya', 'الجافلية', 34, '2021-06-21 18:50:46', '2021-06-21 18:50:46', 234),
(120, 'Al Satwa', 'السطوة', 34, '2021-06-21 18:51:09', '2021-06-21 18:51:09', 234),
(121, 'Sharqan', 'شرقان', 36, '2021-06-21 18:51:17', '2021-06-21 18:51:17', 234),
(122, 'Al Badaa', 'البدع', 34, '2021-06-21 18:51:31', '2021-06-21 18:51:31', 234),
(123, 'Turrfana', 'تورفانا', 36, '2021-06-21 18:51:49', '2021-06-21 18:51:49', 234),
(124, 'Al Wasl', 'الوصل', 34, '2021-06-21 18:51:49', '2021-06-21 18:51:49', 234),
(125, 'Al Safa', 'الصفا', 34, '2021-06-21 18:52:13', '2021-06-21 18:52:13', 234),
(126, 'Umm Suqeim', 'أم سقيم', 34, '2021-06-21 18:52:41', '2021-06-21 18:52:41', 234),
(127, 'Um Tarafa', 'أم طرفة', 36, '2021-06-21 18:52:57', '2021-06-21 18:52:57', 234),
(128, 'Umm Al Sheif', 'أم الشيف', 34, '2021-06-21 18:53:01', '2021-06-21 18:53:01', 234),
(129, 'Wasit Suburb', 'ضاحية واسط', 36, '2021-06-21 18:53:23', '2021-06-21 18:53:23', 234),
(130, 'Al Manara', 'المنارة', 34, '2021-06-21 18:53:26', '2021-06-21 18:53:26', 234),
(131, 'Al Qulayaah', 'القليعة', 36, '2021-06-21 18:53:46', '2021-06-21 18:53:46', 234),
(132, 'Al Quoz', 'القوز', 34, '2021-06-21 18:53:48', '2021-06-21 18:53:48', 234),
(133, 'Al Sufouh', 'الصفوح', 34, '2021-06-21 18:54:24', '2021-06-21 18:54:24', 234),
(134, 'Al Khalid Lake Trail', 'طريق بحيرة الخالد', 36, '2021-06-21 18:54:38', '2021-06-21 18:54:38', 234),
(135, 'Al Barsha', 'البرشاء', 34, '2021-06-21 18:54:49', '2021-06-21 18:54:49', 234),
(136, 'Jumeirah Islands', 'جزر الجميرا', 34, '2021-06-21 18:55:10', '2021-06-21 18:55:10', 234),
(137, 'Al Mujarrah', 'المجرة', 36, '2021-06-21 18:55:20', '2021-06-21 18:55:20', 234),
(138, 'Hamriyah Free Zone', 'المنطقة الحرة - الحمرية', 36, '2021-06-21 18:55:55', '2021-06-21 18:55:55', 234),
(139, 'Jebel Ali', 'جبل علي', 34, '2021-06-21 18:55:59', '2021-06-21 18:55:59', 234),
(140, 'Al Mansoura', 'المنصورة', 36, '2021-06-21 18:56:29', '2021-06-21 18:56:29', 234),
(141, 'Dubai Industrial Park', 'مجمع دبي الصناعي', 34, '2021-06-21 18:56:42', '2021-06-21 18:56:42', 234),
(142, 'Deira Island', 'جزيرة ديرة', 34, '2021-06-21 18:57:20', '2021-06-21 18:57:20', 234),
(143, 'Al Rahmaniya', 'الرحمانية', 36, '2021-06-21 18:57:31', '2021-06-21 18:57:31', 234),
(144, 'Jumeirah', 'جميرا', 34, '2021-06-21 18:57:35', '2021-06-21 18:57:35', 234),
(145, 'Dubailand', 'دبي لاند', 34, '2021-06-21 18:57:52', '2021-06-21 18:57:52', 234),
(146, 'Al Saja', 'الصجعة', 36, '2021-06-21 18:58:01', '2021-06-21 18:58:01', 234),
(147, 'Remraam', 'رمرام', 34, '2021-06-21 18:58:18', '2021-06-21 18:58:18', 234),
(148, 'Al Manakh', 'المناخ', 36, '2021-06-21 18:58:29', '2021-06-21 18:58:29', 234),
(149, 'Arjan', 'ارجان', 34, '2021-06-21 18:58:47', '2021-06-21 18:58:47', 234),
(150, 'Emirates Industrial City', 'مدينة الإمارات الصناعية', 36, '2021-06-21 18:58:57', '2021-06-21 18:58:57', 234),
(151, 'Liwan', 'ليوان', 34, '2021-06-21 18:59:08', '2021-06-21 18:59:08', 234),
(152, 'Dubai Production City (IMPZ)', 'مدينة دبي للإنتاج (اي ام بي زد)', 34, '2021-06-21 18:59:40', '2021-06-21 18:59:40', 234),
(153, 'Dubai Festival City', 'دبي فيستيفال سيتي', 34, '2021-06-21 19:00:02', '2021-06-21 19:00:02', 234),
(154, 'Kalba', 'كلباء', 36, '2021-06-21 19:00:18', '2021-06-21 19:00:18', 234),
(155, 'Barsha Heights (Tecom)', 'برشا هايتس (تيكوم)', 34, '2021-06-21 19:00:21', '2021-06-21 19:00:21', 234),
(156, 'The World Islands', 'جزر العالم', 34, '2021-06-21 19:00:42', '2021-06-21 19:00:42', 234),
(157, 'Downtown Jebel Ali', 'وسط مدينة جبل علي', 34, '2021-06-21 19:01:00', '2021-06-21 19:01:00', 234),
(158, 'Al Shuwaihean', 'الشويهين', 36, '2021-06-21 19:01:03', '2021-06-21 19:01:03', 234),
(159, 'Dubai World Central', 'دبي وورلد سنترال', 34, '2021-06-21 19:02:18', '2021-06-21 19:02:18', 234),
(160, 'Saif Zone (Sharjah International Airport Free Zone)', 'المنطقة الحرة بمطار الشارقة', 36, '2021-06-21 19:02:24', '2021-06-21 19:02:24', 234),
(161, 'Al Furjan', 'الفرجان', 34, '2021-06-21 19:02:38', '2021-06-21 19:02:38', 234),
(162, 'Emirates Hills', 'تلال الإمارات', 34, '2021-06-21 19:03:00', '2021-06-21 19:03:00', 234),
(163, 'Al Mareija', 'المريجة', 36, '2021-06-21 19:03:02', '2021-06-21 19:03:02', 234),
(164, 'Al Barari', 'البراري', 34, '2021-06-21 19:03:24', '2021-06-21 19:03:24', 234),
(165, 'Al Gharayen', 'القرائن', 36, '2021-06-21 19:03:29', '2021-06-21 19:03:29', 234),
(166, 'The Lakes', 'البحيرات', 34, '2021-06-21 19:03:43', '2021-06-21 19:03:43', 234),
(167, 'Deira', 'ديرة', 34, '2021-06-21 19:04:01', '2021-06-21 19:04:01', 234),
(168, 'Al Jubail', 'الجبيل', 36, '2021-06-21 19:04:03', '2021-06-21 19:04:03', 234),
(169, 'Bur Dubai', 'بر دبي', 34, '2021-06-21 19:04:22', '2021-06-21 19:04:22', 234),
(170, 'Tilal City', 'مدينة تلال', 36, '2021-06-21 19:04:33', '2021-06-21 19:04:33', 234),
(171, 'Meydan City', 'مدينة ميدان', 34, '2021-06-21 19:04:41', '2021-06-21 19:04:41', 234),
(172, 'Al Taawun', 'التعاون', 36, '2021-06-21 19:04:57', '2021-06-21 19:04:57', 234),
(173, 'Dubai Science Park', 'حديقة دبي للعلوم', 34, '2021-06-21 19:04:58', '2021-06-21 19:04:58', 234),
(174, 'Jumeirah Village Triangle (JVT)', 'مثلث قرية الجميرا (JVT)', 34, '2021-06-21 19:05:19', '2021-06-21 19:05:19', 234),
(175, 'Al Qasba', 'القصباء', 36, '2021-06-21 19:05:26', '2021-06-21 19:05:26', 234),
(176, 'Al Noaf', 'النوف', 36, '2021-06-21 19:05:48', '2021-06-21 19:05:48', 234),
(177, 'Sharjah University City', 'المدينة الجامعية', 36, '2021-06-21 19:06:16', '2021-06-21 19:06:16', 234),
(178, 'Hoshi', 'حوشي', 36, '2021-06-21 19:06:44', '2021-06-21 19:06:44', 234),
(179, 'SAMAYA', 'سمايا', 36, '2021-06-21 19:07:23', '2021-06-21 19:07:23', 234),
(180, 'Al Wahda Street', 'شارع الوحدة', 36, '2021-06-21 19:07:53', '2021-06-21 19:07:53', 234),
(181, 'Al Tai', 'الطائي', 36, '2021-06-21 19:08:25', '2021-06-21 19:08:25', 234),
(182, 'Rolla Area', 'منطقة الرولة', 36, '2021-06-21 19:08:51', '2021-06-21 19:08:51', 234),
(183, 'Downtown Dubai', 'وسط مدينة دبي', 34, '2021-06-21 19:09:24', '2021-06-21 19:09:24', 234),
(184, 'Corniche Al Buhaira', 'كورنيش البحيرة', 36, '2021-06-21 19:09:27', '2021-06-21 19:09:27', 234),
(185, 'Al Warsan', 'الورسان', 34, '2021-06-21 19:09:43', '2021-06-21 19:09:43', 234),
(186, 'Jwezaa', 'جويزة', 36, '2021-06-21 19:09:58', '2021-06-21 19:09:58', 234),
(187, 'Motor City', 'موتور سيتي', 34, '2021-06-21 19:10:04', '2021-06-21 19:10:04', 234),
(188, 'Academic City', 'المدينة الأكاديمية', 34, '2021-06-21 19:10:24', '2021-06-21 19:10:24', 234),
(189, 'Dubai Promenade', 'بروميناد دبي', 34, '2021-06-21 19:10:47', '2021-06-21 19:10:47', 234),
(190, 'Turrfa', 'الطرفة', 36, '2021-06-21 19:11:01', '2021-06-21 19:11:01', 234),
(191, 'Al Mamzar', 'الممزر', 34, '2021-06-21 19:11:06', '2021-06-21 19:11:06', 234),
(192, 'Al Mahatah', 'المحطة', 36, '2021-06-21 19:11:22', '2021-06-21 19:11:22', 234),
(193, 'Al Awir', 'العوير', 34, '2021-06-21 19:11:24', '2021-06-21 19:11:24', 234),
(194, 'Golf City', 'جولف سيتى', 34, '2021-06-21 19:11:43', '2021-06-21 19:11:43', 234),
(195, 'Pearl Jumeirah', 'لؤلؤة جميرا', 34, '2021-06-21 19:12:06', '2021-06-21 19:12:06', 234),
(196, 'Al Dhaid', 'الذيد', 36, '2021-06-21 19:12:20', '2021-06-21 19:12:20', 234),
(197, 'Dubai Internet City', 'مدينة دبي للإنترنت', 34, '2021-06-21 19:12:24', '2021-06-21 19:12:24', 234),
(198, 'Dubai Media City', 'مدينة دبي للإعلام', 34, '2021-06-21 19:12:46', '2021-06-21 19:12:46', 234),
(199, 'Al Suyoh', 'ضاحية السيوح', 36, '2021-06-21 19:12:50', '2021-06-21 19:12:50', 234),
(200, 'Knowledge Village', 'قرية المعرفة', 34, '2021-06-21 19:13:09', '2021-06-21 19:13:09', 234),
(201, 'Dubai Studio City', 'مدينة دبي للاستوديوهات', 34, '2021-06-21 19:13:27', '2021-06-21 19:13:27', 234),
(202, 'Reem', 'ريم', 34, '2021-06-21 19:13:45', '2021-06-21 19:13:45', 234),
(203, 'Mudon', 'مدن', 34, '2021-06-21 19:14:01', '2021-06-21 19:14:01', 234),
(204, 'Emirates Living', 'الإمارات ليفنج', 34, '2021-06-21 19:14:23', '2021-06-21 19:14:23', 234),
(205, 'The Hills', 'التلال', 34, '2021-06-21 19:14:43', '2021-06-21 19:14:43', 234),
(206, 'Mohammed Bin Rashid City', 'مدينة محمد بن راشد', 34, '2021-06-21 19:15:01', '2021-06-21 19:15:01', 234),
(207, 'Aljada', 'الجادة', 36, '2021-06-21 19:15:14', '2021-06-21 19:15:14', 234),
(208, 'Dubai Hills Estate', 'دبي هيلز استيت', 34, '2021-06-21 19:15:21', '2021-06-21 19:15:21', 234),
(209, 'The Sustainable City', 'المدينة المستدامة', 34, '2021-06-21 19:15:41', '2021-06-21 19:15:41', 234),
(210, 'Sharjah Waterfront City', 'مدينة الشارقة المائية', 36, '2021-06-21 19:15:42', '2021-06-21 19:15:42', 234),
(211, 'Jumeirah Heights', 'مرتفعات جميرا', 34, '2021-06-21 19:15:57', '2021-06-21 19:15:57', 234),
(212, 'Barashi', 'براشي', 36, '2021-06-21 19:16:02', '2021-06-21 19:16:02', 234),
(213, 'Town Square', 'ساحة البلدة', 34, '2021-06-21 19:16:18', '2021-06-21 19:16:18', 234),
(214, 'Emirates Golf Club', 'نادي الإمارات للجولف', 34, '2021-06-21 19:16:38', '2021-06-21 19:16:38', 234),
(215, 'Sharjah Garden City', 'الشارقة جاردن سيتي', 36, '2021-06-21 19:16:47', '2021-06-21 19:16:47', 234),
(216, 'Ibn Battuta Gate', 'بوابة ابن بطوطة', 34, '2021-06-21 19:17:01', '2021-06-21 19:17:01', 234),
(217, 'Akoya Oxygen', 'أكويا أكسجين', 34, '2021-06-21 19:17:23', '2021-06-21 19:17:23', 234),
(218, 'Al Zubair', 'الزبير', 36, '2021-06-21 19:17:24', '2021-06-21 19:17:24', 234),
(219, 'Dubai South', 'دبي الجنوب', 34, '2021-06-21 19:17:42', '2021-06-21 19:17:42', 234),
(220, 'Al Madam', 'المدام', 36, '2021-06-21 19:17:42', '2021-06-21 19:17:42', 234),
(221, 'Al Ruwayyah', 'الروية', 34, '2021-06-21 19:17:58', '2021-06-21 19:17:58', 234),
(222, 'Maleha', 'مليحة', 36, '2021-06-21 19:18:12', '2021-06-21 19:18:12', 234),
(223, 'Serena', 'سيرينا', 34, '2021-06-21 19:18:15', '2021-06-21 19:18:15', 234),
(224, 'Dubai Airport Freezone (DAFZA)', 'المنطقة الحرة بمطار دبي (دافزا)', 34, '2021-06-21 19:18:32', '2021-06-21 19:18:32', 234),
(225, 'Al Atain', 'العطين', 36, '2021-06-21 19:18:34', '2021-06-21 19:18:34', 234),
(226, 'DAMAC Hills (Akoya by DAMAC)', 'داماك هيلز (أكويا من داماك)', 34, '2021-06-21 19:18:52', '2021-06-21 19:18:52', 234),
(227, 'Al Bataeh', 'البطائح', 36, '2021-06-21 19:19:00', '2021-06-21 19:19:00', 234),
(228, 'Dubai Residence Complex', 'مجمع دبي ريزيدنس', 34, '2021-06-21 19:19:10', '2021-06-21 19:19:10', 234),
(229, 'Al Juraina', 'الجرينة', 36, '2021-06-21 19:19:23', '2021-06-21 19:19:23', 234),
(230, 'World Trade Centre', 'مركز التجارة العالمي', 34, '2021-06-21 19:19:28', '2021-06-21 19:19:28', 234),
(231, 'Technology Park', 'حديقة التكنولوجيا', 34, '2021-06-21 19:19:45', '2021-06-21 19:19:45', 234),
(232, 'Khor Fakkan', 'خور فكان', 36, '2021-06-21 19:19:53', '2021-06-21 19:19:53', 234),
(233, 'Bluewaters Island', 'جزيرة بلوواترز', 34, '2021-06-21 19:20:02', '2021-06-21 19:20:02', 234),
(234, 'Za\'abeel', 'زعبيل', 34, '2021-06-21 19:20:22', '2021-06-21 19:20:22', 234),
(235, 'Sharjah Sustainable City', 'مدينة الشارقة المستدامة', 36, '2021-06-21 19:20:27', '2021-06-21 19:20:27', 234),
(236, 'Arabian Ranches 2', 'المرابع العربية 2', 34, '2021-06-21 19:20:43', '2021-06-21 19:20:43', 234),
(237, 'Dubai Harbour', 'ميناء دبي', 34, '2021-06-21 19:21:02', '2021-06-21 19:21:02', 234),
(238, 'Al Hamriyah', 'الحمرية', 36, '2021-06-21 19:21:04', '2021-06-21 19:21:04', 234),
(239, 'Wadi Al Safa 2', 'وادي الصفا 2', 34, '2021-06-21 19:21:23', '2021-06-21 19:21:23', 234),
(240, 'Tilal Al Ghaf', 'تلال الغاف', 34, '2021-06-21 19:21:40', '2021-06-21 19:21:40', 234),
(241, 'Agricultural Falah', 'فلاح الزراعية', 36, '2021-06-21 19:21:41', '2021-06-21 19:21:41', 234),
(242, 'Dragon City', 'مدينة التنين', 34, '2021-06-21 19:21:59', '2021-06-21 19:21:59', 234),
(243, 'Al Homah', 'الحومة', 36, '2021-06-21 19:22:06', '2021-06-21 19:22:06', 234),
(244, 'Wasl Gate', 'بوابة الوصل', 34, '2021-06-21 19:22:20', '2021-06-21 19:22:20', 234),
(245, 'Arabian Ranches 3', 'المرابع العربية 3', 34, '2021-06-21 19:22:47', '2021-06-21 19:22:47', 234),
(246, 'Mina Rashid', 'ميناء راشد', 34, '2021-06-21 19:23:05', '2021-06-21 19:23:05', 234),
(247, 'Murqquab', 'مرقاب', 34, '2021-06-21 19:23:23', '2021-06-21 19:23:23', 234),
(248, 'The Valley', 'الوادي', 34, '2021-06-21 19:23:47', '2021-06-21 19:23:47', 234),
(249, 'Maisan Tower 3', 'برج ميسان 3', 34, '2021-06-21 19:24:11', '2021-06-21 19:24:11', 234),
(250, 'Al Ameera Village', 'Al Ameera Village', 33, NULL, NULL, 234),
(251, 'Al Noor Tower Ajman', 'Al Noor Tower Ajman', 33, NULL, NULL, 234),
(252, 'Al Noor Tower Ajman', 'Al Noor Tower Ajman', 33, NULL, NULL, 234),
(253, 'Al Rashidiya', 'Al Rashidiya', 33, NULL, NULL, 234),
(254, 'Al Bustan', 'Al Bustan', 33, NULL, NULL, 234),
(255, 'Al Karama Area', 'Al Karama Area', 33, NULL, NULL, 234),
(256, 'Al Nuaimiya', 'Al Nuaimiya', 33, NULL, NULL, 234),
(257, 'Al Owan', 'Al Owan', 33, NULL, NULL, 234),
(258, 'Emirates City', 'Emirates City', 33, NULL, NULL, 234),
(259, 'New Industrial City', 'New Industrial City', 33, NULL, NULL, 234),
(260, 'Al Butain', 'Al Butain', 33, NULL, NULL, 234),
(261, 'Al Nakhil', 'Al Nakhil', 33, NULL, NULL, 234),
(262, 'Marmooka City', 'Marmooka City', 33, NULL, NULL, 234),
(263, 'Al Hamidiyah', 'Al Hamidiyah', 33, NULL, NULL, 234),
(264, 'Al Humaid City', 'Al Humaid City', 33, NULL, NULL, 234),
(265, 'Al Ittihad Village', 'Al Ittihad Village', 33, NULL, NULL, 234),
(266, 'Al Rumaila', 'Al Rumaila', 33, NULL, NULL, 234),
(267, 'Al Jurf', 'Al Jurf', 33, NULL, NULL, 234),
(268, 'Al Zorah', 'Al Zorah', 33, NULL, NULL, 234),
(269, 'Emirates Lake Towers', 'Emirates Lake Towers', 33, NULL, NULL, 234),
(270, 'Ajman Marina', 'Ajman Marina', 33, NULL, NULL, 234),
(271, 'Ajman Uptown', 'Ajman Uptown', 33, NULL, NULL, 234),
(272, 'Garden City', 'Garden City', 33, NULL, NULL, 234),
(273, 'Awali City', 'Awali City', 33, NULL, NULL, 234),
(274, 'Ain Ajman', 'Ain Ajman', 33, NULL, NULL, 234),
(275, 'Park View City', 'Park View City', 33, NULL, NULL, 234),
(276, 'Ajman Meadows', 'Ajman Meadows', 33, NULL, NULL, 234),
(277, 'Al Helio', 'Al Helio', 33, NULL, NULL, 234),
(278, 'Al Manama', 'Al Manama', 33, NULL, NULL, 234),
(279, 'Al Zahraa', 'Al Zahraa', 33, NULL, NULL, 234),
(280, 'Musherief', 'Musherief', 33, NULL, NULL, 234),
(281, 'China Mall', 'China Mall', 33, NULL, NULL, 234),
(282, 'King Faisal Street', 'King Faisal Street', 33, NULL, NULL, 234),
(283, 'Al Mowaihat', 'Al Mowaihat', 33, NULL, NULL, 234),
(284, 'Al Sawan', 'Al Sawan', 33, NULL, NULL, 234),
(285, 'Sheikh Khalifa Bin Zayed Street', 'Sheikh Khalifa Bin Zayed Street', 33, NULL, NULL, 234),
(286, 'Al Rawda', 'Al Rawda', 33, NULL, NULL, 234),
(287, 'Al Yasmeen', 'Al Yasmeen', 33, NULL, NULL, 234),
(288, 'Al Zahia', 'Al Zahia', 33, NULL, NULL, 234),
(289, 'Al Aaliah', 'Al Aaliah', 33, NULL, NULL, 234),
(290, 'Al Raqaib', 'Al Raqaib', 33, NULL, NULL, 234),
(291, 'Ajman Industrial', 'Ajman Industrial', 33, NULL, NULL, 234),
(292, 'Alamra tower', 'Alamra tower', 33, NULL, NULL, 234),
(293, 'Masfoot', 'Masfoot', 33, NULL, NULL, 234),
(294, 'Corniche Ajman', 'Corniche Ajman', 33, NULL, NULL, 234),
(295, 'Ajman Downtown', 'Ajman Downtown', 33, NULL, NULL, 234),
(296, 'Sheikh Maktoum Bin Rashid Street', 'Sheikh Maktoum Bin Rashid Street', 33, NULL, NULL, 234),
(297, 'Al Liwara 1', 'Al Liwara 1', 33, NULL, NULL, 234),
(298, 'Al Tallah 1', 'Al Tallah 1', 33, NULL, NULL, 234),
(299, 'Al Tallah 2', 'Al Tallah 2', 33, NULL, NULL, 234),
(300, 'Al Bahia', 'Al Bahia', 33, NULL, NULL, 234),
(301, 'Liwara 2', 'Liwara 2', 33, NULL, NULL, 234),
(354, 'Mina Al Arab', 'Mina Al Arab', 41, NULL, NULL, 234),
(355, 'Al Arqoub', 'Al Arqoub', 41, NULL, NULL, 234),
(356, 'Al Defan', 'Al Defan', 41, NULL, NULL, 234),
(357, 'Al Degdaga', 'Al Degdaga', 41, NULL, NULL, 234),
(358, 'Al Duhaisah', 'Al Duhaisah', 41, NULL, NULL, 234),
(359, 'Al Eraibi', 'Al Eraibi', 41, NULL, NULL, 234),
(360, 'Al Fahlain', 'Al Fahlain', 41, NULL, NULL, 234),
(361, 'Al Gamra', 'Al Gamra', 41, NULL, NULL, 234),
(362, 'Al Gamra - Masafi', 'Al Gamra - Masafi', 41, NULL, NULL, 234),
(363, 'Al Ghubb', 'Al Ghubb', 41, NULL, NULL, 234),
(364, 'Al Hail', 'Al Hail', 41, NULL, NULL, 234),
(365, 'Al Hamra Village', 'Al Hamra Village', 41, NULL, NULL, 234),
(366, 'Al Hamham', 'Al Hamham', 41, NULL, NULL, 234),
(367, 'Al Howaelat', 'Al Howaelat', 41, NULL, NULL, 234),
(368, 'Al Hudaibah', 'Al Hudaibah', 41, NULL, NULL, 234),
(369, 'Al Jazeera - Nad Al Salla', 'Al Jazeera - Nad Al Salla', 41, NULL, NULL, 234),
(370, 'Al Jeer', 'Al Jeer', 41, NULL, NULL, 234),
(371, 'Wadi Shaam', 'Wadi Shaam', 41, NULL, NULL, 234),
(372, 'Al Juwais', 'Al Juwais', 41, NULL, NULL, 234),
(373, 'Al Kharran', 'Al Kharran', 41, NULL, NULL, 234),
(374, 'Al Mamourah', 'Al Mamourah', 41, NULL, NULL, 234),
(375, 'Al Mairid', 'Al Mairid', 41, NULL, NULL, 234),
(376, 'Al Mataf', 'Al Mataf', 41, NULL, NULL, 234),
(377, 'Al Nadiyah', 'Al Nadiyah', 41, NULL, NULL, 234),
(378, 'Al Nakheel', 'Al Nakheel', 41, NULL, NULL, 234),
(379, 'Al Neemia', 'Al Neemia', 41, NULL, NULL, 234),
(380, 'Al Nudood', 'Al Nudood', 41, NULL, NULL, 234),
(381, 'Al Qusaidat', 'Al Qusaidat', 41, NULL, NULL, 234),
(382, 'Al Qurm', 'Al Qurm', 41, NULL, NULL, 234),
(383, 'Al Refaa', 'Al Refaa', 41, NULL, NULL, 234),
(384, 'Al Sabkha', 'Al Sabkha', 41, NULL, NULL, 234),
(385, 'Al Sharisha', 'Al Sharisha', 41, NULL, NULL, 234),
(386, 'Al Soor', 'Al Soor', 41, NULL, NULL, 234),
(387, 'Al Turfa', 'Al Turfa', 41, NULL, NULL, 234),
(388, 'Al Uraibi', 'Al Uraibi', 41, NULL, NULL, 234),
(389, 'Al Zahra', 'Al Zahra', 41, NULL, NULL, 234),
(390, 'Aljazeera Al Hamra', 'Aljazeera Al Hamra', 41, NULL, NULL, 234),
(391, 'Dafan Al Nakheel', 'Dafan Al Nakheel', 41, NULL, NULL, 234),
(392, 'Dafan Al Khor', 'Dafan Al Khor', 41, NULL, NULL, 234),
(393, 'Dahan', 'Dahan', 41, NULL, NULL, 234),
(394, 'Galela', 'Galela', 41, NULL, NULL, 234),
(395, 'Galela - Khoor Khoweer', 'Galela - Khoor Khoweer', 41, NULL, NULL, 234),
(396, 'Julfar', 'Julfar', 41, NULL, NULL, 234),
(397, 'Khatt', 'Khatt', 41, NULL, NULL, 234),
(398, 'Khatt - Al Klaia', 'Khatt - Al Klaia', 41, NULL, NULL, 234),
(399, 'Khuzam', 'Khuzam', 41, NULL, NULL, 234),
(400, 'Liwa Badr', 'Liwa Badr', 41, NULL, NULL, 234),
(401, 'Masafi', 'Masafi', 41, NULL, NULL, 234),
(402, 'Seih Al Uraibi', 'Seih Al Uraibi', 41, NULL, NULL, 234),
(403, 'Seih Al Burairat', 'Seih Al Burairat', 41, NULL, NULL, 234),
(404, 'Seih Al Ghubb', 'Seih Al Ghubb', 41, NULL, NULL, 234),
(405, 'Seih Al Harf', 'Seih Al Harf', 41, NULL, NULL, 234),
(406, 'Seih Al Hudaibah', 'Seih Al Hudaibah', 41, NULL, NULL, 234),
(407, 'Seih Shaam', 'Seih Shaam', 41, NULL, NULL, 234),
(408, 'Seih Al Qusaidat', 'Seih Al Qusaidat', 41, NULL, NULL, 234),
(409, 'Sha\'am', 'Sha\'am', 41, NULL, NULL, 234),
(410, 'Shamal', 'Shamal', 41, NULL, NULL, 234),
(411, 'Shamal Haqueel', 'Shamal Haqueel', 41, NULL, NULL, 234),
(412, 'Shamal Julphar', 'Shamal Julphar', 41, NULL, NULL, 234),
(413, 'Sidroh', 'Sidroh', 41, NULL, NULL, 234),
(414, 'Wadi Al Goor', 'Wadi Al Goor', 41, NULL, NULL, 234),
(415, 'Wadi Al Naqab', 'Wadi Al Naqab', 41, NULL, NULL, 234),
(416, 'Wadi bih', 'Wadi bih', 41, NULL, NULL, 234),
(417, 'Wadi Ammar', 'Wadi Ammar', 41, NULL, NULL, 234),
(418, 'Wadi Sifini', 'Wadi Sifini', 41, NULL, NULL, 234),
(419, 'Yasmin Village', 'Yasmin Village', 41, NULL, NULL, 234),
(420, 'The Cove Rotana Resort', 'The Cove Rotana Resort', 41, NULL, NULL, 234),
(421, 'Ras Al Khaimah Gateway', 'Ras Al Khaimah Gateway', 41, NULL, NULL, 234),
(422, 'Ras Al Selaab', 'Ras Al Selaab', 41, NULL, NULL, 234),
(423, 'Al Dana Island', 'Al Dana Island', 41, NULL, NULL, 234),
(424, 'Al Marjan Island', 'Al Marjan Island', 41, NULL, NULL, 234),
(425, 'Al Mizra Gated Golf Community', 'Al Mizra Gated Golf Community', 41, NULL, NULL, 234),
(426, 'Banyan Tree Resort', 'Banyan Tree Resort', 41, NULL, NULL, 234),
(427, 'Rak Financial City', 'Rak Financial City', 41, NULL, NULL, 234),
(428, 'Saraya Islands', 'Saraya Islands', 41, NULL, NULL, 234),
(429, 'Al Dhait', 'Al Dhait', 41, NULL, NULL, 234),
(430, 'Al Ghail', 'Al Ghail', 41, NULL, NULL, 234),
(431, 'Cornich Ras Al Khaimah', 'Cornich Ras Al Khaimah', 41, NULL, NULL, 234),
(432, 'Sheikh Muhammad Bin Salem Road', 'Sheikh Muhammad Bin Salem Road', 41, NULL, NULL, 234),
(433, 'Ras Al Khaimah Creek', 'Ras Al Khaimah Creek', 41, NULL, NULL, 234),
(434, 'Al Seer', 'Al Seer', 41, NULL, NULL, 234),
(435, 'Rak City', 'Rak City', 41, NULL, NULL, 234),
(436, 'Al Hamra Industrial Zone', 'Al Hamra Industrial Zone', 41, NULL, NULL, 234),
(437, 'Al Salam City', 'Al Salam City', 42, NULL, NULL, 234),
(438, 'White Bay The Terraces', 'White Bay The Terraces', 42, NULL, NULL, 234),
(439, 'White Bay Villa', 'White Bay Villa', 42, NULL, NULL, 234),
(440, 'Beachside Apartments', 'Beachside Apartments', 42, NULL, NULL, 234),
(441, 'Rainbow Towers', 'Rainbow Towers', 42, NULL, NULL, 234),
(442, 'Old Town Area', 'Old Town Area', 42, NULL, NULL, 234),
(443, 'Al Limghadar', 'Al Limghadar', 42, NULL, NULL, 234),
(444, 'Al Hawiyah', 'Al Hawiyah', 42, NULL, NULL, 234),
(445, 'Al Raudah', 'Al Raudah', 42, NULL, NULL, 234),
(446, 'Al Rass', 'Al Rass', 42, NULL, NULL, 234),
(447, 'Al Riqqah', 'Al Riqqah', 42, NULL, NULL, 234),
(448, 'Al Maidan', 'Al Maidan', 42, NULL, NULL, 234),
(449, 'Al Humrah', 'Al Humrah', 42, NULL, NULL, 234),
(450, 'Al Aahad', 'Al Aahad', 42, NULL, NULL, 234),
(451, 'Al Ramlah', 'Al Ramlah', 42, NULL, NULL, 234),
(452, 'Al Abrab', 'Al Abrab', 42, NULL, NULL, 234),
(453, 'Al Salamah', 'Al Salamah', 42, NULL, NULL, 234),
(454, 'Industrial Area', 'Industrial Area', 42, NULL, NULL, 234),
(455, 'Emirates Modern Industrial Area', 'Emirates Modern Industrial Area', 42, NULL, NULL, 234),
(456, 'Umm Al Quwain Marina', 'Umm Al Quwain Marina', 42, NULL, NULL, 234),
(457, 'Al Dar Al Baida', 'Al Dar Al Baida', 42, NULL, NULL, 234),
(458, 'Falaj Al Mualla', 'Falaj Al Mualla', 42, NULL, NULL, 234),
(459, 'King Faisal Street', 'King Faisal Street', 42, NULL, NULL, 234),
(460, 'Al Maqtaa', 'Al Maqtaa', 42, NULL, NULL, 234),
(461, 'Umm Al Thuoob', 'Umm Al Thuoob', 42, NULL, NULL, 234),
(462, 'Al Qarayen', 'Al Qarayen', 42, NULL, NULL, 234),
(463, 'Gulshan', 'Gulshan', 42, NULL, NULL, 234),
(464, 'Green Belt', 'Green Belt', 42, NULL, NULL, 234),
(465, 'Al Faseel Area', 'Al Faseel Area', 40, NULL, NULL, 234),
(466, 'Gurfah Area', 'Gurfah Area', 40, NULL, NULL, 234),
(467, 'Merashid Area', 'Merashid Area', 40, NULL, NULL, 234),
(468, 'Saniaya', 'Saniaya', 40, NULL, NULL, 234),
(469, 'Sakamkam', 'Sakamkam', 40, NULL, NULL, 234),
(470, 'Mina Al Fajer', 'Mina Al Fajer', 40, NULL, NULL, 234),
(471, 'Al Wurayah Valley', 'Al Wurayah Valley', 40, NULL, NULL, 234),
(472, 'Al Fanar Towers', 'Al Fanar Towers', 40, NULL, NULL, 234),
(473, 'Al Jaber Tower', 'Al Jaber Tower', 40, NULL, NULL, 234),
(474, 'Fujairah Tower', 'Fujairah Tower', 40, NULL, NULL, 234),
(475, 'Al Mahatta', 'Al Mahatta', 40, NULL, NULL, 234),
(476, 'Corniche Al Fujairah', 'Corniche Al Fujairah', 40, NULL, NULL, 234),
(477, 'Eagle Hills Fujairah Beach', 'Eagle Hills Fujairah Beach', 40, NULL, NULL, 234),
(478, 'Tawyeen', 'Tawyeen', 40, NULL, NULL, 234),
(479, 'Mirbah', 'Mirbah', 40, NULL, NULL, 234),
(480, 'Hamad Bin Abdullah Road', 'Hamad Bin Abdullah Road', 40, NULL, NULL, 234),
(481, 'Anajaimat Road', 'Anajaimat Road', 40, NULL, NULL, 234),
(482, 'Al Hayl', 'Al Hayl', 40, NULL, NULL, 234),
(483, 'Dibba', 'Dibba', 40, NULL, NULL, 234),
(484, 'Thoban', 'Thoban', 40, NULL, NULL, 234),
(485, 'Address Fujairah Beach Resort', 'Address Fujairah Beach Resort', 40, NULL, NULL, 234),
(486, 'Qidfa', 'Qidfa', 40, NULL, NULL, 234),
(487, 'Al Ain Oasis Villas', 'Al Ain Oasis Villas', 43, NULL, NULL, 234),
(488, 'Noor Al Ain', 'Noor Al Ain', 43, NULL, NULL, 234),
(489, 'Al Oyoun Village', 'Al Oyoun Village', 43, NULL, NULL, 234),
(490, 'Remah', 'Remah', 43, NULL, NULL, 234),
(491, 'Al Khabisi', 'Al Khabisi', 43, NULL, NULL, 234),
(492, 'Al Khaznah', 'Al Khaznah', 43, NULL, NULL, 234),
(493, 'Abu Samrah', 'Abu Samrah', 43, NULL, NULL, 234),
(494, 'Al Yahar', 'Al Yahar', 43, NULL, NULL, 234),
(495, 'Al Jimi', 'Al Jimi', 43, NULL, NULL, 234),
(496, 'Al Towayya', 'Al Towayya', 43, NULL, NULL, 234),
(497, 'Al Mutawaa', 'Al Mutawaa', 43, NULL, NULL, 234),
(498, 'Al Bateen', 'Al Bateen', 43, NULL, NULL, 234),
(499, 'Al Muwaiji', 'Al Muwaiji', 43, NULL, NULL, 234),
(500, 'Al Mutarad', 'Al Mutarad', 43, NULL, NULL, 234),
(501, 'Al Qattara', 'Al Qattara', 43, NULL, NULL, 234),
(502, 'Al Khatim', 'Al Khatim', 43, NULL, NULL, 234),
(503, 'Al Masoudi', 'Al Masoudi', 43, NULL, NULL, 234),
(504, 'Al Buraymi', 'Al Buraymi', 43, NULL, NULL, 234),
(505, 'Falaj Hazzaa', 'Falaj Hazzaa', 43, NULL, NULL, 234),
(506, 'Zakher', 'Zakher', 43, NULL, NULL, 234),
(507, 'Al Maqam', 'Al Maqam', 43, NULL, NULL, 234),
(508, 'Al Agabiyya', 'Al Agabiyya', 43, NULL, NULL, 234),
(509, 'Um Ghafah', 'Um Ghafah', 43, NULL, NULL, 234),
(510, 'Al Zahir', 'Al Zahir', 43, NULL, NULL, 234),
(511, 'Al Salamat', 'Al Salamat', 43, NULL, NULL, 234),
(512, 'Al Marakhaniya', 'Al Marakhaniya', 43, NULL, NULL, 234),
(513, 'Al Dfeinah', 'Al Dfeinah', 43, NULL, NULL, 234),
(514, 'Al Naseriyya', 'Al Naseriyya', 43, NULL, NULL, 234),
(515, 'Al Sidrah', 'Al Sidrah', 43, NULL, NULL, 234),
(516, 'Central District', 'Central District', 43, NULL, NULL, 234),
(517, 'Al Nyadat', 'Al Nyadat', 43, NULL, NULL, 234),
(518, 'Al Mashall', 'Al Mashall', 43, NULL, NULL, 234),
(519, 'Al Sorooj', 'Al Sorooj', 43, NULL, NULL, 234),
(520, 'Al Zakher', 'Al Zakher', 43, NULL, NULL, 234),
(521, 'Al Jahili', 'Al Jahili', 43, NULL, NULL, 234),
(522, 'Al Hili', 'Al Hili', 43, NULL, NULL, 234),
(523, 'Al Ain Industrial Area', 'Al Ain Industrial Area', 43, NULL, NULL, 234),
(524, 'Bida Bin Ammar', 'Bida Bin Ammar', 43, NULL, NULL, 234),
(525, 'Al Khrair', 'Al Khrair', 43, NULL, NULL, 234),
(526, 'Al Faqa', 'Al Faqa', 43, NULL, NULL, 234),
(527, 'Mazyad', 'Mazyad', 43, NULL, NULL, 234),
(528, 'Al Murabaa', 'Al Murabaa', 43, NULL, NULL, 234),
(529, 'Shab Al Ashkar', 'Shab Al Ashkar', 43, NULL, NULL, 234),
(530, 'Al Khalidiya', 'Al Khalidiya', 43, NULL, NULL, 234),
(531, 'Dewan', 'Dewan', 43, NULL, NULL, 234),
(532, 'Al Dhahir', 'Al Dhahir', 43, NULL, NULL, 234),
(533, 'Sheibat Al Watah', 'Sheibat Al Watah', 43, NULL, NULL, 234),
(534, 'Industrial Area', 'Industrial Area', 43, NULL, NULL, 234),
(535, 'Asharej', 'Asharej', 43, NULL, NULL, 234),
(536, 'Al Nahil', 'Al Nahil', 43, NULL, NULL, 234),
(537, 'Al Rawdah Al Sharqiyah', 'Al Rawdah Al Sharqiyah', 43, NULL, NULL, 234),
(538, 'Ain Al Faydah', 'Ain Al Faydah', 43, NULL, NULL, 234),
(539, 'Neima', 'Neima', 43, NULL, NULL, 234),
(540, 'Al Foah', 'Al Foah', 43, NULL, NULL, 234),
(541, 'Al Nayfa 2', 'Al Nayfa 2', 43, NULL, NULL, 234),
(542, 'Gafat Al Nayyar', 'Gafat Al Nayyar', 43, NULL, NULL, 234),
(543, 'Al Raha Golf Gardens', 'Al Raha Golf Gardens', 32, NULL, NULL, 234),
(544, 'Sas Al Nakhl Village', 'Sas Al Nakhl Village', 32, NULL, NULL, 234),
(545, 'Al Ghadeer', 'Al Ghadeer', 32, NULL, NULL, 234),
(546, 'Yas Island', 'Yas Island', 32, NULL, NULL, 234),
(547, 'Al Raha Gardens', 'Al Raha Gardens', 32, NULL, NULL, 234),
(548, 'Hydra Golf Walk', 'Hydra Golf Walk', 32, NULL, NULL, 234),
(549, 'Al Bateen', 'Al Bateen', 32, NULL, NULL, 234),
(550, 'Al Hosn', 'Al Hosn', 32, NULL, NULL, 234),
(551, 'Al Karamah', 'Al Karamah', 32, NULL, NULL, 234),
(552, 'Al Khalidiyah', 'Al Khalidiyah', 32, NULL, NULL, 234),
(553, 'Al Khubeirah', 'Al Khubeirah', 32, NULL, NULL, 234),
(554, 'Al Manhal', 'Al Manhal', 32, NULL, NULL, 234),
(555, 'Al Maqtaa', 'Al Maqtaa', 32, NULL, NULL, 234),
(556, 'Al Markaziya', 'Al Markaziya', 32, NULL, NULL, 234),
(557, 'Al Mushrif', 'Al Mushrif', 32, NULL, NULL, 234),
(558, 'Hadbat Al Zaafran', 'Hadbat Al Zaafran', 32, NULL, NULL, 234),
(559, 'Khalifa City A', 'Khalifa City A', 32, NULL, NULL, 234),
(560, 'Khor Al Maqta', 'Khor Al Maqta', 32, NULL, NULL, 234),
(561, 'Lulu Island', 'Lulu Island', 32, NULL, NULL, 234),
(562, 'Madinat Zayed', 'Madinat Zayed', 32, NULL, NULL, 234),
(563, 'Marina Village', 'Marina Village', 32, NULL, NULL, 234),
(564, 'Mina Zayed', 'Mina Zayed', 32, NULL, NULL, 234),
(565, 'Mussafah', 'Mussafah', 32, NULL, NULL, 234),
(566, 'Qasr El Bahr', 'Qasr El Bahr', 32, NULL, NULL, 234),
(567, 'Al Ras Al Akhdar', 'Al Ras Al Akhdar', 32, NULL, NULL, 234),
(568, 'Al Raha Beach', 'Al Raha Beach', 32, NULL, NULL, 234),
(569, 'Sheikh Khalifa Bin Zayed Street', 'Sheikh Khalifa Bin Zayed Street', 32, NULL, NULL, 234),
(570, 'Al Reem Island', 'Al Reem Island', 32, NULL, NULL, 234),
(571, 'Mohammed Bin Zayed City', 'Mohammed Bin Zayed City', 32, NULL, NULL, 234),
(572, 'Hydra Village', 'Hydra Village', 32, NULL, NULL, 234),
(573, 'Al Mafraq Industrial Area', 'Al Mafraq Industrial Area', 32, NULL, NULL, 234),
(574, 'Airport Street', 'Airport Street', 32, NULL, NULL, 234),
(575, 'Al Zahraa', 'Al Zahraa', 32, NULL, NULL, 234),
(576, 'Danet Abu Dhabi', 'Danet Abu Dhabi', 32, NULL, NULL, 234),
(577, 'Saadiyat Island', 'Saadiyat Island', 32, NULL, NULL, 234),
(578, 'Al Salam Street', 'Al Salam Street', 32, NULL, NULL, 234),
(579, 'The Quay', 'The Quay', 32, NULL, NULL, 234),
(580, 'Qasr Al Sarab', 'Qasr Al Sarab', 32, NULL, NULL, 234),
(581, 'Building Material City', 'Building Material City', 32, NULL, NULL, 234),
(582, 'Abu Dhabi Gate City (Officers City)', 'Abu Dhabi Gate City (Officers City)', 32, NULL, NULL, 234),
(583, 'Tourist Club Area (TCA)', 'Tourist Club Area (TCA)', 32, NULL, NULL, 234),
(584, 'Al Gurm', 'Al Gurm', 32, NULL, NULL, 234),
(585, 'Nurai Island', 'Nurai Island', 32, NULL, NULL, 234),
(586, 'Al Muroor', 'Al Muroor', 32, NULL, NULL, 234),
(587, 'Al Mafraq', 'Al Mafraq', 32, NULL, NULL, 234),
(588, 'Al Nahyan', 'Al Nahyan', 32, NULL, NULL, 234),
(589, 'Hamdan Street', 'Hamdan Street', 32, NULL, NULL, 234),
(590, 'Electra Street', 'Electra Street', 32, NULL, NULL, 234),
(591, 'Al Wahdah', 'Al Wahdah', 32, NULL, NULL, 234),
(592, 'Al Shamkha', 'Al Shamkha', 32, NULL, NULL, 234),
(593, 'Sheikh Rashid Bin Saeed Street', 'Sheikh Rashid Bin Saeed Street', 32, NULL, NULL, 234),
(594, 'Al Manaseer', 'Al Manaseer', 32, NULL, NULL, 234),
(595, 'Al Zaab', 'Al Zaab', 32, NULL, NULL, 234),
(596, 'Between Two Bridges (Bain Al Jessrain)', 'Between Two Bridges (Bain Al Jessrain)', 32, NULL, NULL, 234),
(597, 'Al Matar', 'Al Matar', 32, NULL, NULL, 234),
(598, 'Al Bahia', 'Al Bahia', 32, NULL, NULL, 234),
(599, 'Al Shawamekh', 'Al Shawamekh', 32, NULL, NULL, 234),
(600, 'Baniyas', 'Baniyas', 32, NULL, NULL, 234),
(601, 'Zayed Military City', 'Zayed Military City', 32, NULL, NULL, 234),
(602, 'Zayed City (Khalifa City C)', 'Zayed City (Khalifa City C)', 32, NULL, NULL, 234),
(603, 'Al Mina', 'Al Mina', 32, NULL, NULL, 234),
(604, 'Jawazat Street', 'Jawazat Street', 32, NULL, NULL, 234),
(605, 'Al Najda Street', 'Al Najda Street', 32, NULL, NULL, 234),
(606, 'Grand Mosque District', 'Grand Mosque District', 32, NULL, NULL, 234),
(607, 'Corniche Road', 'Corniche Road', 32, NULL, NULL, 234),
(608, 'Defence Street', 'Defence Street', 32, NULL, NULL, 234),
(609, 'Al Rawdah', 'Al Rawdah', 32, NULL, NULL, 234),
(610, 'Al Falah City', 'Al Falah City', 32, NULL, NULL, 234),
(611, 'NBB Workers City - Mojumaat Hameem', 'NBB Workers City - Mojumaat Hameem', 32, NULL, NULL, 234),
(612, 'Al Markaz', 'Al Markaz', 32, NULL, NULL, 234),
(613, 'Diplomatic Area', 'Diplomatic Area', 32, NULL, NULL, 234),
(614, 'Capital Centre', 'Capital Centre', 32, NULL, NULL, 234),
(615, 'Umm Al Nar', 'Umm Al Nar', 32, NULL, NULL, 234),
(616, 'Navy Gate', 'Navy Gate', 32, NULL, NULL, 234),
(617, 'Al Wathba', 'Al Wathba', 32, NULL, NULL, 234),
(618, 'Ghantoot', 'Ghantoot', 32, NULL, NULL, 234),
(619, 'Al Ruwais', 'Al Ruwais', 32, NULL, NULL, 234),
(620, 'Al Dhafrah', 'Al Dhafrah', 32, NULL, NULL, 234),
(621, 'Corniche Area', 'Corniche Area', 32, NULL, NULL, 234),
(622, 'Zayed Sports City', 'Zayed Sports City', 32, NULL, NULL, 234),
(623, 'Al Reef', 'Al Reef', 32, NULL, NULL, 234),
(624, 'Masdar City', 'Masdar City', 32, NULL, NULL, 234),
(625, 'Liwa Street', 'Liwa Street', 32, NULL, NULL, 234),
(626, 'Al Nasr Street', 'Al Nasr Street', 32, NULL, NULL, 234),
(627, 'Al Samha', 'Al Samha', 32, NULL, NULL, 234),
(628, 'Al Danah', 'Al Danah', 32, NULL, NULL, 234),
(629, 'Eastern Road', 'Eastern Road', 32, NULL, NULL, 234),
(630, 'Al Marhaba', 'Al Marhaba', 32, NULL, NULL, 234),
(631, 'Al Qurm', 'Al Qurm', 32, NULL, NULL, 234),
(632, 'Shakhbout City (Khalifa City B)', 'Shakhbout City (Khalifa City B)', 32, NULL, NULL, 234),
(633, 'Nareel Island</o', 'Nareel Island</o', 32, NULL, NULL, 234),
(634, 'Al Maryah Island', 'Al Maryah Island', 32, NULL, NULL, 234),
(635, 'Al Falah Street', 'Al Falah Street', 32, NULL, NULL, 234),
(636, 'KIZAD', 'KIZAD', 32, NULL, NULL, 234),
(637, 'Al Taweelah', 'Al Taweelah', 32, NULL, NULL, 234),
(638, 'Al Shahama', 'Al Shahama', 32, NULL, NULL, 234),
(639, 'Rawdhat Abu Dhabi', 'Rawdhat Abu Dhabi', 32, NULL, NULL, 234),
(640, 'Al Tibbiya', 'Al Tibbiya', 32, NULL, NULL, 234),
(641, 'Al Aman', 'Al Aman', 32, NULL, NULL, 234),
(642, 'Dalma Island', 'Dalma Island', 32, NULL, NULL, 234),
(643, 'Al Fahid', 'Al Fahid', 32, NULL, NULL, 234),
(644, 'The Marina', 'The Marina', 32, NULL, NULL, 234),
(645, 'Al Shamkha South', 'Al Shamkha South', 32, NULL, NULL, 234),
(646, 'Liwa', 'Liwa', 32, NULL, NULL, 234),
(647, 'Al Hayer', 'Al Hayer', 32, NULL, NULL, 234),
(648, 'Sweihan', 'Sweihan', 32, NULL, NULL, 234),
(649, 'Al Ajban', 'Al Ajban', 32, NULL, NULL, 234),
(650, 'Abu Krayyah', 'Abu Krayyah', 32, NULL, NULL, 234),
(651, 'Al Nahda', 'Al Nahda', 32, NULL, NULL, 234),
(652, 'Al Saad', 'Al Saad', 32, NULL, NULL, 234),
(653, 'Al Zahiyah', 'Al Zahiyah', 32, NULL, NULL, 234),
(654, 'Madinat Zayed Western Region', 'Madinat Zayed Western Region', 32, NULL, NULL, 234),
(655, 'Al Rahba', 'Al Rahba', 32, NULL, NULL, 234),
(656, 'Al Faya', 'Al Faya', 32, NULL, NULL, 234),
(657, 'Al Jurf', 'Al Jurf', 32, NULL, NULL, 234),
(658, 'Al Sader', 'Al Sader', 32, NULL, NULL, 234),
(659, 'Al Muntazah', 'Al Muntazah', 32, NULL, NULL, 234),
(660, 'Al Mirfa', 'Al Mirfa', 32, NULL, NULL, 234),
(661, 'Madinat Al Riyadh', 'Madinat Al Riyadh', 32, NULL, NULL, 234),
(662, 'Al Rehhan', 'Al Rehhan', 32, NULL, NULL, 234),
(663, 'Rabdan', 'Rabdan', 32, NULL, NULL, 234),
(664, 'tahrir square', 'tahrir square', 1, NULL, NULL, NULL);

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
  `agency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(199) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extension` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contract_document`
--

INSERT INTO `contract_document` (`id`, `contract_id`, `client_id`, `document`, `agency_id`, `business_id`, `created_at`, `updated_at`, `name`, `extension`, `size`) VALUES
(12, 6, 6, '1618066747-test-1.txt', 1, 1, '2021-04-10 14:59:07', '2021-04-10 14:59:07', 'test-1.txt', 'txt', '3790');

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
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `iso2`, `value`, `name_en`, `name_ar`, `iso3`, `numcode`, `un_member`, `calling_code`, `cctld`, `nationality`, `flag`, `phone_code`, `time_zone`, `created_at`, `updated_at`, `slug`) VALUES
(1, 'AF', 'Afghanistan', 'Islamic Republic of Afghanistan', NULL, 'AFG', '004', 'yes', '93', '.af', 'Afghan', 'afghanistan.png', '+93', 'Asia/Kabul', NULL, NULL, NULL),
(2, 'AX', 'Aland Islands', 'Aring land Islands', 'Aring land Islands', 'ALA', '248', 'no', '358', '.ax', 'Finland', 'alan_islands.jpg', '+358', 'Europe/Mariehamn', NULL, '2021-05-18 12:37:51', NULL),
(3, 'AL', 'Albania', 'Republic of Albania', 'Republic of Albania', 'ALB', '008', 'yes', '355', '.al', 'Albanian', 'albania.png', '+355', 'Europe/Tirane', NULL, '2021-05-18 12:39:56', NULL),
(4, 'DZ', 'Algeria', 'People\'s Democratic Republic of Algeria', NULL, 'DZA', '012', 'yes', '213', '.dz', 'Algerian', 'algeria.png', '+213', 'Asia/Kabul', NULL, NULL, NULL),
(5, 'AS', 'American Samoa', 'American Samoa', NULL, 'ASM', '016', 'no', '1+684', '.as', 'American', 'united-states-of-america.png', '+1-684', 'Pacific/Pago_Pago', NULL, NULL, NULL),
(6, 'AD', 'Andorra', 'Principality of Andorra', NULL, 'AND', '020', 'yes', '376', '.ad', 'Andorran', 'andorra.png', '+376', 'Europe/Andorra', NULL, NULL, NULL),
(7, 'AO', 'Angola', 'Republic of Angola', NULL, 'AGO', '024', 'yes', '244', '.ao', 'Angolan', 'angola.png', '+244', 'Africa/Luanda', NULL, NULL, NULL),
(8, 'AI', 'Anguilla', 'Anguilla', NULL, 'AIA', '660', 'no', '1+264', '.ai', 'American', 'anguilla.png', '+1-264', '	America/Anguilla', NULL, NULL, NULL),
(9, 'AQ', 'Antarctica', 'Antarctica', NULL, 'ATA', '010', 'no', '672', '.aq', 'Antarctician', 'unknown.png', '+672', 'Antarctica/Casey', NULL, NULL, NULL),
(10, 'AG', 'Antigua and Barbuda', 'Antigua and Barbuda', NULL, 'ATG', '028', 'yes', '1+268', '.ag', 'American', 'unknown.png', '+1-268', 'America/Antigua', NULL, NULL, NULL),
(11, 'AR', 'Argentina', 'Argentine Republic', NULL, 'ARG', '032', 'yes', '54', '.ar', 'Argentinian', 'argentina.png', '+54', 'America/Argentina/Buenos_Aires', NULL, NULL, NULL),
(12, 'AM', 'Armenia', 'Republic of Armenia', NULL, 'ARM', '051', 'yes', '374', '.am', 'Armenia', 'armenia.png', '+374', 'Asia/Yerevan', NULL, NULL, NULL),
(13, 'AW', 'Aruba', 'Aruba', NULL, 'ABW', '533', 'no', '297', '.aw', 'Dutch Caribbean', 'aruba.png', '+297', 'America/Aruba', NULL, NULL, NULL),
(14, 'AU', 'Australia', 'Commonwealth of Australia', NULL, 'AUS', '036', 'yes', '61', '.au', 'Australian', 'australia.png', '+61', 'Australia/Sydney', NULL, NULL, NULL),
(15, 'AT', 'Austria', 'Republic of Austria', NULL, 'AUT', '040', 'yes', '43', '.at', 'Austrian', 'austria.png', '+43', 'Europe/Vienna', NULL, NULL, NULL),
(16, 'AZ', 'Azerbaijan', 'Republic of Azerbaijan', NULL, 'AZE', '031', 'yes', '994', '.az', 'Azerbaijani', 'azerbaijan.png', '+994', 'Asia/Baku', NULL, NULL, NULL),
(17, 'BS', 'Bahamas', 'Commonwealth of The Bahamas', NULL, 'BHS', '044', 'yes', '1+242', '.bs', 'Bahamian', 'bahamas.png', '+1-242', 'America/Nassau', NULL, NULL, NULL),
(18, 'BH', 'Bahrain', 'Kingdom of Bahrain', NULL, 'BHR', '048', 'yes', '973', '.bh', 'Bahraini', 'bahrain.png', '+973', 'Asia/Bahrain', NULL, NULL, NULL),
(19, 'BD', 'Bangladesh', 'People\'s Republic of Bangladesh', NULL, 'BGD', '050', 'yes', '880', '.bd', 'Bangladeshi', 'bangladesh.png', '+880', 'Asia/Dhaka', NULL, NULL, NULL),
(20, 'BB', 'Barbados', 'Barbados', NULL, 'BRB', '052', 'yes', '1+246', '.bb', 'Barbadian', 'barbados.png', '+1-246', 'America/Barbados', NULL, NULL, NULL),
(21, 'BY', 'Belarus', 'Republic of Belarus', NULL, 'BLR', '112', 'yes', '375', '.by', 'Belorussian', 'belarus.png', '+375', 'Europe/Minsk', NULL, NULL, NULL),
(22, 'BE', 'Belgium', 'Kingdom of Belgium', NULL, 'BEL', '056', 'yes', '32', '.be', 'Belgian', 'belgium.png', '+32', 'Europe/Brussels', NULL, NULL, NULL),
(23, 'BZ', 'Belize', 'Belize', NULL, 'BLZ', '084', 'yes', '501', '.bz', 'Belizean', 'belize.png', '+501', 'America/Belize', NULL, NULL, NULL),
(24, 'BJ', 'Benin', 'Republic of Benin', NULL, 'BEN', '204', 'yes', '229', '.bj', 'Beninese', 'benin.png', '+229', 'Africa/Porto-Novo', NULL, NULL, NULL),
(25, 'BM', 'Bermuda', 'Bermuda Islands', NULL, 'BMU', '060', 'no', '1+441', '.bm', 'Bermudian', 'bermuda.png', '+1-441', 'Atlantic/Bermuda', NULL, NULL, NULL),
(26, 'BT', 'Bhutan', 'Kingdom of Bhutan', NULL, 'BTN', '064', 'yes', '975', '.bt', 'Bhutanese', 'bhutan.png', '+975', 'Asia/Thimphu', NULL, NULL, NULL),
(27, 'BO', 'Bolivia', 'Plurinational State of Bolivia', NULL, 'BOL', '068', 'yes', '591', '.bo', 'Bolivian', 'bolivia.png', '+591', 'America/La_Paz', NULL, NULL, NULL),
(28, 'BQ', 'Bonaire, Sint Eustatius and Saba', 'Bonaire, Sint Eustatius and Saba', NULL, 'BES', '535', 'no', '599', '.bq', 'Dutch', 'unknown.png', '+599', 'America/Kralendijk', NULL, NULL, NULL),
(29, 'BA', 'Bosnia and Herzegovina', 'Bosnia and Herzegovina', NULL, 'BIH', '070', 'yes', '387', '.ba', 'Bosnian', 'bosnia-and-herzegovina.png', '+387', 'Europe/Sarajevo', NULL, NULL, NULL),
(30, 'BW', 'Botswana', 'Republic of Botswana', NULL, 'BWA', '072', 'yes', '267', '.bw', 'Batswanain', 'botswana.png', '+267', 'Africa/Gaborone', NULL, NULL, NULL),
(32, 'BR', 'Brazil', 'Federative Republic of Brazil', NULL, 'BRA', '076', 'yes', '55', '.br', 'Brazilian', 'brazil.png', '+55', 'America/Araguaina', NULL, NULL, NULL),
(33, 'IO', 'British Indian Ocean Territory', 'British Indian Ocean Territory', NULL, 'IOT', '086', 'no', '246', '.io', 'British', 'unknown.png', '+246', 'Indian/Chagos', NULL, NULL, NULL),
(34, 'BN', 'Brunei', 'Brunei Darussalam', NULL, 'BRN', '096', 'yes', '673', '.bn', 'Bruneian', 'brunei.png', '+673', 'Asia/Brunei', NULL, NULL, NULL),
(35, 'BG', 'Bulgaria', 'Republic of Bulgaria', NULL, 'BGR', '100', 'yes', '359', '.bg', 'Bulgarian', 'bulgaria.png', '+359', 'Europe/Sofia', NULL, NULL, NULL),
(36, 'BF', 'Burkina Faso', 'Burkina Faso', NULL, 'BFA', '854', 'yes', '226', '.bf', 'Burkinabe', 'burkina-faso.png', '+226', 'Africa/Ouagadougou', NULL, NULL, NULL),
(37, 'BI', 'Burundi', 'Republic of Burundi', NULL, 'BDI', '108', 'yes', '257', '.bi', 'Burundian', 'burundi.png', '+257', 'Africa/Bujumbura', NULL, NULL, NULL),
(38, 'KH', 'Cambodia', 'Kingdom of Cambodia', NULL, 'KHM', '116', 'yes', '855', '.kh', 'Cambodian', 'cambodia.png', '+855', 'Asia/Phnom_Penh', NULL, NULL, NULL),
(39, 'CM', 'Cameroon', 'Republic of Cameroon', NULL, 'CMR', '120', 'yes', '237', '.cm', 'Cameroonian', 'cameroon.png', '+237', 'Africa/Douala', NULL, NULL, NULL),
(40, 'CA', 'Canada', 'Canada', NULL, 'CAN', '124', 'yes', '1', '.ca', 'Canadian', 'canada.png', '+1', 'America/Atikokan', NULL, NULL, NULL),
(41, 'CV', 'Cape Verde', 'Republic of Cape Verde', NULL, 'CPV', '132', 'yes', '238', '.cv', 'unknown', 'cape-verde.png', '+238', 'Atlantic/Cape_Verde', NULL, NULL, NULL),
(42, 'KY', 'Cayman Islands', 'The Cayman Islands', NULL, 'CYM', '136', 'no', '1+345', '.ky', 'UNKNOWN', 'unknown.png', '+1-345', 'America/Cayman', NULL, NULL, NULL),
(43, 'CF', 'Central African Republic', 'Central African Republic', NULL, 'CAF', '140', 'yes', '236', '.cf', 'unknown', 'central-african-republic.png', '+236', 'Africa/Bangui', NULL, NULL, NULL),
(44, 'TD', 'Chad', 'Republic of Chad', NULL, 'TCD', '148', 'yes', '235', '.td', 'Chadian', 'chad.png', '+235', 'Africa/Ndjamena', NULL, NULL, NULL),
(45, 'CL', 'Chile', 'Republic of Chile', NULL, 'CHL', '152', 'yes', '56', '.cl', 'Cameroonian', 'chile.png', '+56', 'America/Santiago', NULL, NULL, NULL),
(46, 'CN', 'China', 'People\'s Republic of China', NULL, 'CHN', '156', 'yes', '86', '.cn', 'Chinese', 'china.png', '+86', 'Asia/Shanghai', NULL, NULL, NULL),
(47, 'CX', 'Christmas Island', 'Christmas Island', NULL, 'CXR', '162', 'no', '61', '.cx', 'Australian', 'unknown.png', '+61', 'Indian/Christmas', NULL, NULL, NULL),
(48, 'CC', 'Cocos (Keeling) Islands', 'Cocos (Keeling) Islands', NULL, 'CCK', '166', 'no', '61', '.cc', 'UNKNOWN', 'cocos-island.png', '+61', 'Indian/Cocos', NULL, NULL, NULL),
(49, 'CO', 'Colombia', 'Republic of Colombia', NULL, 'COL', '170', 'yes', '57', '.co', 'Colombian', 'colombia.png', '+57', 'America/Bogota', NULL, NULL, NULL),
(50, 'KM', 'Comoros', 'Union of the Comoros', NULL, 'COM', '174', 'yes', '269', '.km', 'Comorian', 'comoros.png', '+269', 'Indian/Comoro', NULL, NULL, NULL),
(51, 'CG', 'Congo', 'Republic of the Congo', NULL, 'COG', '178', 'yes', '242', '.cg', 'Congolese', 'republic-of-the-congo.png', '+242', 'Africa/Kinshasa', NULL, NULL, NULL),
(52, 'CK', 'Cook Islands', 'Cook Islands', NULL, 'COK', '184', 'some', '682', '.ck', 'unknown', 'cook-islands.png', '+682', 'Pacific/Rarotonga', NULL, NULL, NULL),
(53, 'CR', 'Costa Rica', 'Republic of Costa Rica', NULL, 'CRI', '188', 'yes', '506', '.cr', 'Costarricenses', 'unknown.png', '+506', 'America/Costa_Rica', NULL, NULL, NULL),
(54, 'CI', 'Cote d\'ivoire (Ivory Coast)', 'Republic of C&ocirc;te D\'Ivoire (Ivory Coast)', NULL, 'CIV', '384', 'yes', '225', '.ci', 'Ivoirian', 'ivory-coast.png', '+225', 'Africa/Abidjan', NULL, NULL, NULL),
(55, 'HR', 'Croatia', 'Republic of Croatia', NULL, 'HRV', '191', 'yes', '385', '.hr', 'Croatian', 'croatia.png', '+385', 'Europe/Zagreb', NULL, NULL, NULL),
(56, 'CU', 'Cuba', 'Republic of Cuba', NULL, 'CUB', '192', 'yes', '53', '.cu', 'Cuban', 'cuba.png', '+53', 'America/Havana', NULL, NULL, NULL),
(57, 'CW', 'Curacao', 'Cura&ccedil;ao', NULL, 'CUW', '531', 'no', '599', '.cw', 'Dutch', 'curacao.png', '+599', 'America/Curacao', NULL, NULL, NULL),
(58, 'CY', 'Cyprus', 'Republic of Cyprus', NULL, 'CYP', '196', 'yes', '357', '.cy', 'Cypriot', 'cyprus.png', '+357', 'Asia/Famagusta', NULL, NULL, NULL),
(59, 'CZ', 'Czech Republic', 'Czech Republic', NULL, 'CZE', '203', 'yes', '420', '.cz', 'unknown', 'czech-republic.png', '+420', 'Europe/Prague', NULL, NULL, NULL),
(60, 'CD', 'Democratic Republic of the Congo', 'Democratic Republic of the Congo', NULL, 'COD', '180', 'yes', '243', '.cd', 'Congolese', 'democratic-republic-of-congo.png', '+243', 'Africa/Lubumbashi', NULL, NULL, NULL),
(61, 'DK', 'Denmark', 'Kingdom of Denmark', NULL, 'DNK', '208', 'yes', '45', '.dk', 'Dane', 'denmark.png', '+45', 'Europe/Copenhagen', NULL, NULL, NULL),
(62, 'DJ', 'Djibouti', 'Republic of Djibouti', NULL, 'DJI', '262', 'yes', '253', '.dj', 'Djiboutian', 'djibouti.png', '+253', 'Africa/Djibouti', NULL, NULL, NULL),
(63, 'DM', 'Dominica', 'Commonwealth of Dominica', NULL, 'DMA', '212', 'yes', '1+767', '.dm', 'Dominican', 'dominica.png', '+1-767', 'America/Dominica', NULL, NULL, NULL),
(64, 'DO', 'Dominican Republic', 'Dominican Republic', NULL, 'DOM', '214', 'yes', '1+809, 8', '.do', 'Dominican', 'dominican-republic.png', '+1-809, 8', 'America/Santo_Domingo', NULL, NULL, NULL),
(65, 'EC', 'Ecuador', 'Republic of Ecuador', NULL, 'ECU', '218', 'yes', '593', '.ec', 'Ecuadorian', 'ecuador.png', '+593', 'America/Guayaquil', NULL, NULL, NULL),
(66, 'EG', 'Egypt', 'Arab Republic of Egypt', NULL, 'EGY', '818', 'yes', '20', '.eg', 'Egyptian', 'egypt.png', '+20', 'Africa/Cairo', NULL, NULL, NULL),
(67, 'SV', 'El Salvador', 'Republic of El Salvador', NULL, 'SLV', '222', 'yes', '503', '.sv', 'Salvadoran', 'unknown.png', '+503', 'America/El_Salvador', NULL, NULL, NULL),
(68, 'GQ', 'Equatorial Guinea', 'Republic of Equatorial Guinea', NULL, 'GNQ', '226', 'yes', '240', '.gq', 'Guinean', 'equatorial-guinea.png', '+240', 'Africa/Malabo', NULL, NULL, NULL),
(69, 'ER', 'Eritrea', 'State of Eritrea', NULL, 'ERI', '232', 'yes', '291', '.er', 'Eritrean', 'eritrea.png', '+291', 'Africa/Asmara', NULL, NULL, NULL),
(70, 'EE', 'Estonia', 'Republic of Estonia', NULL, 'EST', '233', 'yes', '372', '.ee', 'Estonian', 'estonia.png', '+372', 'Europe/Tallinn', NULL, NULL, NULL),
(71, 'ET', 'Ethiopia', 'Federal Democratic Republic of Ethiopia', NULL, 'ETH', '231', 'yes', '251', '.et', 'Ethiopian', 'ethiopia.png', '+251', 'Africa/Addis_Ababa', NULL, NULL, NULL),
(72, 'FK', 'Falkland Islands (Malvinas)', 'The Falkland Islands (Malvinas)', NULL, 'FLK', '238', 'no', '500', '.fk', 'British', 'falkland-islands.png', '+500', 'Atlantic/Stanley', NULL, NULL, NULL),
(73, 'FO', 'Faroe Islands', 'The Faroe Islands', NULL, 'FRO', '234', 'no', '298', '.fo', 'unknown', 'faroe-islands.png', '+298', 'Atlantic/Faroe', NULL, NULL, NULL),
(74, 'FJ', 'Fiji', 'Republic of Fiji', NULL, 'FJI', '242', 'yes', '679', '.fj', 'Fijian', 'fiji.png', '+679', 'Pacific/Fiji', NULL, NULL, NULL),
(75, 'FI', 'Finland', 'Republic of Finland', NULL, 'FIN', '246', 'yes', '358', '.fi', 'Finn', 'finland.png', '+358', 'Europe/Helsinki', NULL, NULL, NULL),
(76, 'FR', 'France', 'French Republic', NULL, 'FRA', '250', 'yes', '33', '.fr', 'Frenchman', 'france.png', '+33', 'Europe/Paris', NULL, NULL, NULL),
(77, 'GF', 'French Guiana', 'French Guiana', NULL, 'GUF', '254', 'no', '594', '.gf', 'French', 'unknown.png', '+594', 'America/Cayenne', NULL, NULL, NULL),
(78, 'PF', 'French Polynesia', 'French Polynesia', NULL, 'PYF', '258', 'no', '689', '.pf', 'unknown', 'french-polynesia.png', '+689', 'Pacific/Marquesas', NULL, NULL, NULL),
(80, 'GA', 'Gabon', 'Gabonese Republic', NULL, 'GAB', '266', 'yes', '241', '.ga', 'Gabonese', 'gabon.png', '+241', 'Africa/Libreville', NULL, NULL, NULL),
(81, 'GM', 'Gambia', 'Republic of The Gambia', NULL, 'GMB', '270', 'yes', '220', '.gm', 'Gambian', 'gambia.png', '+220', 'Africa/Banjul', NULL, NULL, NULL),
(82, 'GE', 'Georgia', 'Georgia', NULL, 'GEO', '268', 'yes', '995', '.ge', 'Georgian', 'georgia.png', '+995', 'Asia/Tbilisi', NULL, NULL, NULL),
(83, 'DE', 'Germany', 'Federal Republic of Germany', NULL, 'DEU', '276', 'yes', '', '.de', 'Geman', 'germany.png', '+49', 'Europe/Berlin', NULL, NULL, NULL),
(84, 'GH', 'Ghana', 'Republic of Ghana', NULL, 'GHA', '288', 'yes', '233', '.gh', 'Ghanaian', 'ghana.png', '+233', 'Africa/Accra', NULL, NULL, NULL),
(85, 'GI', 'Gibraltar', 'Gibraltar', NULL, 'GIB', '292', 'no', '350', '.gi', 'British', 'gibraltar.png', '+350', 'Europe/Gibraltar', NULL, NULL, NULL),
(86, 'GR', 'Greece', 'Hellenic Republic', NULL, 'GRC', '300', 'yes', '30', '.gr', 'Greek', 'greece.png', '+30', 'Europe/Athens', NULL, NULL, NULL),
(88, 'GD', 'Grenada', 'Grenada', NULL, 'GRD', '308', 'yes', '1+473', '.gd', 'British', 'grenada.png', '+1-473', 'America/Grenada', NULL, NULL, NULL),
(89, 'GP', 'Guadaloupe', 'Guadeloupe', NULL, 'GLP', '312', 'no', '590', '.gp', 'UNKNOWN', 'unknown.png', '+590', 'UNKNOWN', NULL, NULL, NULL),
(90, 'GU', 'Guam', 'Guam', NULL, 'GUM', '316', 'no', '1+671', '.gu', 'Guamanian', 'guam.png', '+1-671', 'Pacific/Guam', NULL, NULL, NULL),
(91, 'GT', 'Guatemala', 'Republic of Guatemala', NULL, 'GTM', '320', '', '502', '.gt', 'Guatemaltecos', 'guatemala.png', '+502', 'America/Guatemala', NULL, NULL, NULL),
(92, 'GG', 'Guernsey', 'Guernsey', NULL, 'GGY', '831', 'no', '44', '.gg', 'British', 'guernsey.png', '+44', 'Europe/Guernsey', NULL, NULL, NULL),
(93, 'GN', 'Guinea', 'Republic of Guinea', NULL, 'GIN', '324', 'yes', '224', '.gn', 'Guinean', 'guinea.png', '+224', 'Africa/Conakry', NULL, NULL, NULL),
(94, 'GW', 'Guinea-Bissau', 'Republic of Guinea-Bissau', NULL, 'GNB', '624', 'yes', '245', '.gw', 'Guinean', 'guinea-bissau.png', '+245', 'Africa/Bissau', NULL, NULL, NULL),
(95, 'GY', 'Guyana', 'Co-operative Republic of Guyana', NULL, 'GUY', '328', 'yes', '592', '.gy', 'Guyanese', 'guyana.png', '+592', 'America/Guyana', NULL, NULL, NULL),
(96, 'HT', 'Haiti', 'Republic of Haiti', NULL, 'HTI', '332', 'yes', '509', '.ht', 'African', 'haiti.png', '+509', 'America/Port-au-Prince', NULL, NULL, NULL),
(98, 'HN', 'Honduras', 'Republic of Honduras', NULL, 'HND', '340', 'yes', '504', '.hn', 'Honduran', 'honduras.png', '+504', 'America/Tegucigalpa', NULL, NULL, NULL),
(99, 'HK', 'Hong Kong', 'Hong Kong', NULL, 'HKG', '344', 'no', '852', '.hk', 'Chinese', 'unknown.png', '+852', 'Asia/Hong_Kong', NULL, NULL, NULL),
(100, 'HU', 'Hungary', 'Hungary', NULL, 'HUN', '348', 'yes', '36', '.hu', 'Hungarian', 'hungary.png', '+36', 'Europe/Budapest', NULL, NULL, NULL),
(101, 'IS', 'Iceland', 'Republic of Iceland', NULL, 'ISL', '352', 'yes', '354', '.is', 'Icelandic', 'iceland.png', '+354', 'Atlantic/Reykjavik', NULL, NULL, NULL),
(102, 'IN', 'India', 'Republic of India', NULL, 'IND', '356', 'yes', '91', '.in', 'Indian', 'india.png', '+91', 'Asia/Kolkata', NULL, NULL, NULL),
(103, 'ID', 'Indonesia', 'Republic of Indonesia', NULL, 'IDN', '360', 'yes', '62', '.id', 'Indonesian', 'indonesia.png', '+62', 'Asia/Pontianak', NULL, NULL, NULL),
(104, 'IR', 'Iran', 'Islamic Republic of Iran', NULL, 'IRN', '364', 'yes', '98', '.ir', 'Iranian', 'iran.png', '+98', 'Asia/Tehran', NULL, NULL, NULL),
(105, 'IQ', 'Iraq', 'Republic of Iraq', NULL, 'IRQ', '368', 'yes', '964', '.iq', 'UNKNOWN', 'iraq.png', '+964', 'Asia/Baghdad', NULL, NULL, NULL),
(106, 'IE', 'Ireland', 'Ireland', NULL, 'IRL', '372', 'yes', '353', '.ie', 'Irish', 'ireland.png', '+353', 'Europe/Dublin', NULL, NULL, NULL),
(107, 'IM', 'Isle of Man', 'Isle of Man', NULL, 'IMN', '833', 'no', '44', '.im', 'UNKNOWN', 'unknown.png', '+44', 'Europe/Isle_of_Man', NULL, NULL, NULL),
(108, 'IL', 'Israel', 'State of Israel', NULL, 'ISR', '376', 'yes', '972', '.il', 'Israeli', 'israel.png', '+972', 'Asia/Jerusalem', NULL, NULL, NULL),
(109, 'IT', 'Italy', 'Italian Republic', NULL, 'ITA', '380', 'yes', '39', '.jm', 'Italian', 'italy.png', '+39', 'Europe/Rome', NULL, NULL, NULL),
(110, 'JM', 'Jamaica', 'Jamaica', NULL, 'JAM', '388', 'yes', '1+876', '.jm', 'Jamaican', 'jamaica.png', '+1-876', 'America/Jamaica', NULL, NULL, NULL),
(111, 'JP', 'Japan', 'Japan', NULL, 'JPN', '392', 'yes', '81', '.jp', 'Japanese', 'japan.png', '+81', 'Asia/Tokyo', NULL, NULL, NULL),
(112, 'JE', 'Jersey', 'The Bailiwick of Jersey', NULL, 'JEY', '832', 'no', '44', '.je', 'British', 'jersey.png', '+44', 'Europe/Jersey', NULL, NULL, NULL),
(113, 'JO', 'Jordan', 'Hashemite Kingdom of Jordan', NULL, 'JOR', '400', 'yes', '962', '.jo', 'Jordanian', 'jordan.png', '+962', 'Asia/Amman', NULL, NULL, NULL),
(114, 'KZ', 'Kazakhstan', 'Republic of Kazakhstan', NULL, 'KAZ', '398', 'yes', '7', '.kz', 'Kazakhstani', 'kazakhstan.png', '+7', 'Asia/Aqtau', NULL, NULL, NULL),
(115, 'KE', 'Kenya', 'Republic of Kenya', NULL, 'KEN', '404', 'yes', '254', '.ke', 'Kenyan', 'kenya.png', '+254', 'Africa/Nairobi', NULL, NULL, NULL),
(116, 'KI', 'Kiribati', 'Republic of Kiribati', NULL, 'KIR', '296', 'yes', '686', '.ki', 'Kiribatian', 'kiribati.png', '+686', 'Pacific/Enderbury', NULL, NULL, NULL),
(117, 'XK', 'Kosovo', 'Republic of Kosovo', NULL, '---', '---', 'some', '381', '', 'Albanian', 'kosovo.png', '+381', 'UNKNOWN', NULL, NULL, NULL),
(118, 'KW', 'Kuwait', 'State of Kuwait', NULL, 'KWT', '414', 'yes', '965', '.kw', 'Kuwaiti', 'kuwait.png', '+965', 'Asia/Kuwait', NULL, NULL, NULL),
(119, 'KG', 'Kyrgyzstan', 'Kyrgyz Republic', NULL, 'KGZ', '417', 'yes', '996', '.kg', 'UNKNOWN', 'kyrgyzstan.png', '+996', 'Asia/Bishkek', NULL, NULL, NULL),
(120, 'LA', 'Laos', 'Lao People\'s Democratic Republic', NULL, 'LAO', '418', 'yes', '856', '.la', 'UNKNOWN', 'laos.png', '+856', 'Asia/Vientiane', NULL, NULL, NULL),
(121, 'LV', 'Latvia', 'Republic of Latvia', NULL, 'LVA', '428', 'yes', '371', '.lv', 'Latvian', 'latvia.png', '+371', 'Europe/Riga', NULL, NULL, NULL),
(122, 'LB', 'Lebanon', 'Republic of Lebanon', NULL, 'LBN', '422', 'yes', '961', '.lb', 'Lebanese', 'lebanon.png', '+961', 'Asia/Beirut', NULL, NULL, NULL),
(123, 'LS', 'Lesotho', 'Kingdom of Lesotho', NULL, 'LSO', '426', 'yes', '266', '.ls', 'Basotho', 'lesotho.png', '+266', 'Africa/Maseru', NULL, NULL, NULL),
(124, 'LR', 'Liberia', 'Republic of Liberia', NULL, 'LBR', '430', 'yes', '231', '.lr', 'Liberian', 'liberia.png', '+231', 'Africa/Monrovia', NULL, NULL, NULL),
(125, 'LY', 'Libya', 'Libya', NULL, 'LBY', '434', 'yes', '218', '.ly', 'Libyan', 'libya.png', '+218', 'Africa/Tripoli', NULL, NULL, NULL),
(126, 'LI', 'Liechtenstein', 'Principality of Liechtenstein', NULL, 'LIE', '438', 'yes', '423', '.li', 'Liechtensteiner', 'liechtenstein.png', '+423', 'Europe/Vaduz', NULL, NULL, NULL),
(127, 'LT', 'Lithuania', 'Republic of Lithuania', NULL, 'LTU', '440', 'yes', '370', '.lt', 'Lithuanian', 'lithuania.png', '+370', 'Europe/Vilnius', NULL, NULL, NULL),
(128, 'LU', 'Luxembourg', 'Grand Duchy of Luxembourg', NULL, 'LUX', '442', 'yes', '352', '.lu', 'Luxembourger', 'luxembourg.png', '+352', 'Europe/Luxembourg', NULL, NULL, NULL),
(129, 'MO', 'Macao', 'The Macao Special Administrative Region', NULL, 'MAC', '446', 'no', '853', '.mo', 'Portuguese', 'macao.png', '+853', 'Asia/Macau', NULL, NULL, NULL),
(130, 'MK', 'North Macedonia', 'Republic of North Macedonia', NULL, 'MKD', '807', 'yes', '389', '.mk', 'Macedonian', 'republic-of-macedonia.png', '+389', 'Europe/Skopje', NULL, NULL, NULL),
(131, 'MG', 'Madagascar', 'Republic of Madagascar', NULL, 'MDG', '450', 'yes', '261', '.mg', 'Madagascan', 'madagascar.png', '+261', 'Indian/Antananarivo', NULL, NULL, NULL),
(132, 'MW', 'Malawi', 'Republic of Malawi', NULL, 'MWI', '454', 'yes', '265', '.mw', 'Malawian', 'malawi.png', '+265', 'Africa/Blantyre', NULL, NULL, NULL),
(133, 'MY', 'Malaysia', 'Malaysia', NULL, 'MYS', '458', 'yes', '60', '.my', 'Malaysian', 'malaysia.png', '+60', 'Asia/Kuala_Lumpur', NULL, NULL, NULL),
(134, 'MV', 'Maldives', 'Republic of Maldives', NULL, 'MDV', '462', 'yes', '960', '.mv', 'Maldivian', 'maldives.png', '+960', 'Indian/Maldives', NULL, NULL, NULL),
(135, 'ML', 'Mali', 'Republic of Mali', NULL, 'MLI', '466', 'yes', '223', '.ml', 'Malian', 'mali.png', '+223', 'Africa/Bamako', NULL, NULL, NULL),
(136, 'MT', 'Malta', 'Republic of Malta', NULL, 'MLT', '470', 'yes', '356', '.mt', 'Maltese', 'malta.png', '+356', 'Europe/Malta', NULL, NULL, NULL),
(137, 'MH', 'Marshall Islands', 'Republic of the Marshall Islands', NULL, 'MHL', '584', 'yes', '692', '.mh', 'Marshallese', 'unknown.png', '+692', 'Pacific/Kwajalein', NULL, NULL, NULL),
(138, 'MQ', 'Martinique', 'Martinique', NULL, 'MTQ', '474', 'no', '596', '.mq', 'African', 'martinique.png', '+596', 'America/Martinique', NULL, NULL, NULL),
(139, 'MR', 'Mauritania', 'Islamic Republic of Mauritania', NULL, 'MRT', '478', 'yes', '222', '.mr', 'Mauritanian', 'mauritania.png', '+222', 'Africa/Nouakchott', NULL, NULL, NULL),
(140, 'MU', 'Mauritius', 'Republic of Mauritius', NULL, 'MUS', '480', 'yes', '230', '.mu', 'Mauritian', 'mauritius.png', '+230', 'Indian/Mauritius', NULL, NULL, NULL),
(141, 'YT', 'Mayotte', 'Mayotte', NULL, 'MYT', '175', 'no', '262', '.yt', 'UNKNOWN', 'unknown.png', '+262', 'Indian/Mayotte', NULL, NULL, NULL),
(142, 'MX', 'Mexico', 'United Mexican States', NULL, 'MEX', '484', 'yes', '52', '.mx', 'Mexican', 'mexico.png', '+52', 'America/Mexico_City', NULL, NULL, NULL),
(143, 'FM', 'Micronesia', 'Federated States of Micronesia', NULL, 'FSM', '583', 'yes', '691', '.fm', 'UNKNOWN', 'micronesia.png', '+691', 'Pacific/Kosrae', NULL, NULL, NULL),
(144, 'MD', 'Moldava', 'Republic of Moldova', NULL, 'MDA', '498', 'yes', '373', '.md', 'Moldovan', 'unknown.png', '+373', 'UNKNOWN', NULL, NULL, NULL),
(145, 'MC', 'Monaco', 'Principality of Monaco', NULL, 'MCO', '492', 'yes', '377', '.mc', 'Monégasque', 'monaco.png', '+377', 'Europe/Monaco', NULL, NULL, NULL),
(146, 'MN', 'Mongolia', 'Mongolia', NULL, 'MNG', '496', 'yes', '976', '.mn', 'Mongolian', 'mongolia.png', '+976', 'Asia/Choibalsan', NULL, NULL, NULL),
(147, 'ME', 'Montenegro', 'Montenegro', NULL, 'MNE', '499', 'yes', '382', '.me', 'Montenegrin', 'montenegro.png', '+382', 'Europe/Podgorica', NULL, NULL, NULL),
(148, 'MS', 'Montserrat', 'Montserrat', NULL, 'MSR', '500', 'no', '1+664', '.ms', 'Montserratian', 'montserrat.png', '+1-664', 'America/Montserrat', NULL, NULL, NULL),
(149, 'MA', 'Morocco', 'Kingdom of Morocco', NULL, 'MAR', '504', 'yes', '212', '.ma', 'Moroccan', 'morocco.png', '+212', 'Africa/Casablanca', NULL, NULL, NULL),
(150, 'MZ', 'Mozambique', 'Republic of Mozambique', NULL, 'MOZ', '508', 'yes', '258', '.mz', 'UNKNOWN', 'mozambique.png', '+258', 'Africa/Maputo', NULL, NULL, NULL),
(151, 'MM', 'Myanmar (Burma)', 'Republic of the Union of Myanmar', NULL, 'MMR', '104', 'yes', '95', '.mm', 'UNKNOWN', 'unknown.png', '+95', 'Asia/Yangon', NULL, NULL, NULL),
(152, 'NA', 'Namibia', 'Republic of Namibia', NULL, 'NAM', '516', 'yes', '264', '.na', 'Namibian', 'namibia.png', '+264', 'Africa/Windhoek', NULL, NULL, NULL),
(153, 'NR', 'Nauru', 'Republic of Nauru', NULL, 'NRU', '520', 'yes', '674', '.nr', 'Nauruan', 'nauru.png', '+674', 'Pacific/Nauru', NULL, NULL, NULL),
(154, 'NP', 'Nepal', 'Federal Democratic Republic of Nepal', NULL, 'NPL', '524', 'yes', '977', '.np', 'Nepalese', 'nepal.png', '+977', 'Asia/Kathmandu', NULL, NULL, NULL),
(155, 'NL', 'Netherlands', 'Kingdom of the Netherlands', NULL, 'NLD', '528', 'yes', '31', '.nl', 'unknown', 'netherlands.png', '+31', 'Europe/Amsterdam', NULL, NULL, NULL),
(156, 'NC', 'New Caledonia', 'New Caledonia', NULL, 'NCL', '540', 'no', '687', '.nc', 'unkown', 'unknown.png', '+687', 'Pacific/Noumea', NULL, NULL, NULL),
(157, 'NZ', 'New Zealand', 'New Zealand', NULL, 'NZL', '554', 'yes', '64', '.nz', 'unknown', 'new-zealand.png', '+64', 'Pacific/Auckland', NULL, NULL, NULL),
(158, 'NI', 'Nicaragua', 'Republic of Nicaragua', NULL, 'NIC', '558', 'yes', '505', '.ni', 'UNKNOWN', 'nicaragua.png', '+505', 'America/Managua', NULL, NULL, NULL),
(159, 'NE', 'Niger', 'Republic of Niger', NULL, 'NER', '562', 'yes', '227', '.ne', 'Nigerien', 'niger.png', '+227', 'Africa/Niamey', NULL, NULL, NULL),
(160, 'NG', 'Nigeria', 'Federal Republic of Nigeria', NULL, 'NGA', '566', 'yes', '234', '.ng', 'Nigerien', 'nigeria.png', '+234', 'Africa/Lagos', NULL, NULL, NULL),
(161, 'NU', 'Niue', 'Niue', NULL, 'NIU', '570', 'some', '683', '.nu', 'Niuean', 'niue.png', '+683', 'Pacific/Niue', NULL, NULL, NULL),
(162, 'NF', 'Norfolk Island', 'Norfolk Island', NULL, 'NFK', '574', 'no', '672', '.nf', 'UNKNOWN', 'unknown.png', '+672', 'Pacific/Norfolk', NULL, NULL, NULL),
(163, 'KP', 'North Korea', 'Democratic People\'s Republic of Korea', NULL, 'PRK', '408', 'yes', '850', '.kp', 'Korean', 'unknown.png', '+850', 'Asia/Pyongyang', NULL, NULL, NULL),
(164, 'MP', 'Northern Mariana Islands', 'Northern Mariana Islands', NULL, 'MNP', '580', 'no', '1+670', '.mp', 'unknown', 'northern-marianas-islands.png', '+1-670', 'Pacific/Saipan', NULL, NULL, NULL),
(165, 'NO', 'Norway', 'Kingdom of Norway', NULL, 'NOR', '578', 'yes', '47', '.no', 'Norwegian', 'norway.png', '+47', 'Europe/Oslo', NULL, NULL, NULL),
(166, 'OM', 'Oman', 'Sultanate of Oman', NULL, 'OMN', '512', 'yes', '968', '.om', 'Omani', 'oman.png', '+968', 'Asia/Muscat', NULL, NULL, NULL),
(167, 'PK', 'Pakistan', 'Islamic Republic of Pakistan', NULL, 'PAK', '586', 'yes', '92', '.pk', 'Pakistani', 'pakistan.png', '+92', 'Asia/Karachi', NULL, NULL, NULL),
(168, 'PW', 'Palau', 'Republic of Palau', NULL, 'PLW', '585', 'yes', '680', '.pw', 'UNKNOWN', 'palau.png', '+680', 'Pacific/Palau', NULL, NULL, NULL),
(169, 'PS', 'Palestine', 'State of Palestine (or Occupied Palestinian Territory)', NULL, 'PSE', '275', 'some', '970', '.ps', 'Palestinian', 'palestine.png', '+970', 'UNKNOWN', NULL, NULL, NULL),
(170, 'PA', 'Panama', 'Republic of Panama', NULL, 'PAN', '591', 'yes', '507', '.pa', 'Panamanian', 'panama.png', '+507', 'America/Panama', NULL, NULL, NULL),
(171, 'PG', 'Papua New Guinea', 'Independent State of Papua New Guinea', NULL, 'PNG', '598', 'yes', '675', '.pg', 'Guinean', 'papua-new-guinea.png', '+675', 'Pacific/Bougainville', NULL, NULL, NULL),
(172, 'PY', 'Paraguay', 'Republic of Paraguay', NULL, 'PRY', '600', 'yes', '595', '.py', 'Paraguayan', 'paraguay.png', '+595', 'America/Asuncion', NULL, NULL, NULL),
(173, 'PE', 'Peru', 'Republic of Peru', NULL, 'PER', '604', 'yes', '51', '.pe', 'European', 'peru.png', '+51', 'America/Lima', NULL, NULL, NULL),
(174, 'PH', 'Philippines', 'Republic of the Philippines', NULL, 'PHL', '608', 'yes', '63', '.ph', 'Pilipino', 'unknown.png', '+63', 'Asia/Manila', NULL, NULL, NULL),
(175, 'PN', 'Pitcairn', 'Pitcairn', NULL, 'PCN', '612', 'no', 'NONE', '.pn', 'UNKNOWN', 'pitcairn-islands.png', '+612', 'Pacific/Pitcairn', NULL, NULL, NULL),
(176, 'PL', 'Poland', 'Republic of Poland', NULL, 'POL', '616', 'yes', '48', '.pl', 'Pole', 'republic-of-poland.png', '+48', 'Europe/Warsaw', NULL, NULL, NULL),
(177, 'PT', 'Portugal', 'Portuguese Republic', NULL, 'PRT', '620', 'yes', '351', '.pt', 'Portuguese', 'portugal.png', '+351', 'Atlantic/Azores', NULL, NULL, NULL),
(178, 'PR', 'Puerto Rico', 'Commonwealth of Puerto Rico', NULL, 'PRI', '630', 'no', '1+939', '.pr', 'unknown', 'puerto-rico.png', '+1-939', 'America/Puerto_Rico', NULL, NULL, NULL),
(179, 'QA', 'Qatar', 'State of Qatar', NULL, 'QAT', '634', 'yes', '974', '.qa', 'Qatari', 'qatar.png', '+974', 'Asia/Qatar', NULL, NULL, NULL),
(180, 'RE', 'Reunion', 'R&eacute;union', NULL, 'REU', '638', 'no', '262', '.re', 'UNKNOWN', 'unknown.png', '+262', 'Indian/Reunion', NULL, NULL, NULL),
(181, 'RO', 'Romania', 'Romania', NULL, 'ROU', '642', 'yes', '40', '.ro', 'Romanian', 'romania.png', '+40', 'Europe/Bucharest', NULL, NULL, NULL),
(182, 'RU', 'Russia', 'Russian Federation', NULL, 'RUS', '643', 'yes', '7', '.ru', 'Russian', 'russia.png', '+7', 'Asia/Anadyr', NULL, NULL, NULL),
(183, 'RW', 'Rwanda', 'Republic of Rwanda', NULL, 'RWA', '646', 'yes', '250', '.rw', 'Rwandan', 'rwanda.png', '+250', 'Africa/Kigali', NULL, NULL, NULL),
(184, 'BL', 'Saint Barthelemy', 'Saint Barth&eacute;lemy', NULL, 'BLM', '652', 'no', '590', '.bl', 'French', 'unknown.png', '+590', 'America/St_Barthelemy', NULL, NULL, NULL),
(185, 'SH', 'Saint Helena', 'Saint Helena, Ascension and Tristan da Cunha', NULL, 'SHN', '654', 'no', '290', '.sh', 'UNKNOWN', 'unknown.png', '+290', 'Atlantic/St_Helena', NULL, NULL, NULL),
(186, 'KN', 'Saint Kitts and Nevis', 'Federation of Saint Christopher and Nevis', NULL, 'KNA', '659', 'yes', '1+869', '.kn', 'UNKNOWN', 'unknown.png', '+1-869', 'America/St_Kitts', NULL, NULL, NULL),
(187, 'LC', 'Saint Lucia', 'Saint Lucia', NULL, 'LCA', '662', 'yes', '1+758', '.lc', 'African', 'unknown.png', '+1-758', 'America/St_Lucia', NULL, NULL, NULL),
(188, 'MF', 'Saint Martin', 'Saint Martin', NULL, 'MAF', '663', 'no', '590', '.mf', 'UNKNOWN', 'unknown.png', '+590', 'America/Marigot', NULL, NULL, NULL),
(189, 'PM', 'Saint Pierre and Miquelon', 'Saint Pierre and Miquelon', NULL, 'SPM', '666', 'no', '508', '.pm', 'French', 'unknown.png', '+508', 'America/Miquelon', NULL, NULL, NULL),
(191, 'WS', 'Samoa', 'Independent State of Samoa', NULL, 'WSM', '882', 'yes', '685', '.ws', 'unknown', 'samoa.png', '+685', 'Pacific/Apia', NULL, NULL, NULL),
(192, 'SM', 'San Marino', 'Republic of San Marino', NULL, 'SMR', '674', '', '378', '.sm', 'UNKNOWN', 'unknown.png', '+378', 'Europe/San_Marino', NULL, NULL, NULL),
(193, 'ST', 'Sao Tome and Principe', 'Democratic Republic of S&atilde;o Tom&eacute; and Pr&iacute;ncipe', NULL, 'STP', '678', 'yes', '239', '.st', 'Sao Tomean', 'unknown.png', '+239', 'Africa/Sao_Tome', NULL, NULL, NULL),
(194, 'SA', 'Saudi Arabia', 'Kingdom of Saudi Arabia', NULL, 'SAU', '682', 'yes', '966', '.sa', 'Saudi', 'saudi-arabia.png', '+966', 'Asia/Riyadh', NULL, NULL, NULL),
(195, 'SN', 'Senegal', 'Republic of Senegal', NULL, 'SEN', '686', 'yes', '221', '.sn', 'Senegalese', 'senegal.png', '+221', 'Africa/Dakar', NULL, NULL, NULL),
(196, 'RS', 'Serbia', 'Republic of Serbia', NULL, 'SRB', '688', 'yes', '381', '.rs', 'Serbian', 'serbia.png', '+381', 'Europe/Belgrade', NULL, NULL, NULL),
(197, 'SC', 'Seychelles', 'Republic of Seychelles', NULL, 'SYC', '690', 'yes', '248', '.sc', 'Seychellois', 'seychelles.png', '+248', 'Indian/Mahe', NULL, NULL, NULL),
(198, 'SL', 'Sierra Leone', 'Republic of Sierra Leone', NULL, 'SLE', '694', 'yes', '232', '.sl', 'Sierra Leonean', 'unknown.png', '+232', 'Africa/Freetown', NULL, NULL, NULL),
(199, 'SG', 'Singapore', 'Republic of Singapore', NULL, 'SGP', '702', 'yes', '65', '.sg', 'Singaporean', 'singapore.png', '+65', 'Asia/Singapore', NULL, NULL, NULL),
(200, 'SX', 'Sint Maarten', 'Sint Maarten', NULL, 'SXM', '534', 'no', '1+721', '.sx', 'Dutch', 'unknown.png', '+1-721', 'America/Lower_Princes', NULL, NULL, NULL),
(201, 'SK', 'Slovakia', 'Slovak Republic', NULL, 'SVK', '703', 'yes', '421', '.sk', 'Slovak', 'slovakia.png', '+421', 'Europe/Bratislava', NULL, NULL, NULL),
(202, 'SI', 'Slovenia', 'Republic of Slovenia', NULL, 'SVN', '705', 'yes', '386', '.si', 'Slovenian', 'slovenia.png', '+386', 'Europe/Ljubljana', NULL, NULL, NULL),
(203, 'SB', 'Solomon Islands', 'Solomon Islands', NULL, 'SLB', '090', 'yes', '677', '.sb', 'Melanesian', 'unknown.png', '+677', 'Pacific/Guadalcanal', NULL, NULL, NULL),
(204, 'SO', 'Somalia', 'Somali Republic', NULL, 'SOM', '706', 'yes', '252', '.so', 'Somalis', 'somalia.png', '+252', 'Africa/Mogadishu', NULL, NULL, NULL),
(205, 'ZA', 'South Africa', 'Republic of South Africa', NULL, 'ZAF', '710', 'yes', '27', '.za', 'African', 'unknown.png', '+27', 'Africa/Johannesburg', NULL, NULL, NULL),
(206, 'GS', 'South Georgia and the South Sandwich Islands', 'South Georgia and the South Sandwich Islands', NULL, 'SGS', '239', 'no', '500', '.gs', 'UNKNOWN', 'unknown.png', '+500', 'Atlantic/South_Georgia', NULL, NULL, NULL),
(207, 'KR', 'South Korea', 'Republic of Korea', NULL, 'KOR', '410', 'yes', '', '.kr', 'Koean', 'south-korea.png', '+82', 'Asia/Seoul', NULL, NULL, NULL),
(208, 'SS', 'South Sudan', 'Republic of South Sudan', NULL, 'SSD', '728', 'yes', '211', '.ss', 'Sudanese', 'unknown.png', '+211', 'Africa/Juba', NULL, NULL, NULL),
(209, 'ES', 'Spain', 'Kingdom of Spain', NULL, 'ESP', '724', 'yes', '34', '.es', 'Spaniard', 'spain.png', '+34', 'Europe/Madrid', NULL, NULL, NULL),
(210, 'LK', 'Sri Lanka', 'Democratic Socialist Republic of Sri Lanka', NULL, 'LKA', '144', 'yes', '94', '.lk', 'unknown', 'sri-lanka.png', '+94', 'Asia/Colombo', NULL, NULL, NULL),
(211, 'SD', 'Sudan', 'Republic of the Sudan', NULL, 'SDN', '729', 'yes', '249', '.sd', 'Sudanese', 'sudan.png', '+249', 'Africa/Khartoum', NULL, NULL, NULL),
(212, 'SR', 'Suriname', 'Republic of Suriname', NULL, 'SUR', '740', 'yes', '597', '.sr', 'Dutch', 'suriname.png', '+597', 'America/Paramaribo', NULL, NULL, NULL),
(213, 'SJ', 'Svalbard and Jan Mayen', 'Svalbard and Jan Mayen', NULL, 'SJM', '744', 'no', '47', '.sj', 'Norwegian', 'unknown.png', '+47', 'Arctic/Longyearbyen', NULL, NULL, NULL),
(214, 'SZ', 'Swaziland', 'Kingdom of Swaziland', NULL, 'SWZ', '748', 'yes', '268', '.sz', 'Swazi', 'swaziland.png', '+268', 'Africa/Mbabane', NULL, NULL, NULL),
(215, 'SE', 'Sweden', 'Kingdom of Sweden', NULL, 'SWE', '752', 'yes', '46', '.se', 'Swede', 'sweden.png', '+46', 'Europe/Stockholm', NULL, NULL, NULL),
(216, 'CH', 'Switzerland', 'Swiss Confederation', NULL, 'CHE', '756', 'yes', '41', '.ch', 'Swiss', 'switzerland.png', '+41', 'Europe/Zurich', NULL, NULL, NULL),
(217, 'SY', 'Syria', 'Syrian Arab Republic', NULL, 'SYR', '760', 'yes', '963', '.sy', 'Syrian', 'syria.png', '+963', 'Asia/Damascus', NULL, NULL, NULL),
(218, 'TW', 'Taiwan', 'Republic of China (Taiwan)', NULL, 'TWN', '158', 'former', '886', '.tw', 'Taiwanese', 'taiwan.png', '+886', 'Asia/Taipei', NULL, NULL, NULL),
(219, 'TJ', 'Tajikistan', 'Republic of Tajikistan', NULL, 'TJK', '762', 'yes', '992', '.tj', 'Tadzhik', 'tajikistan.png', '+992', 'Asia/Dushanbe', NULL, NULL, NULL),
(220, 'TZ', 'Tanzania', 'United Republic of Tanzania', NULL, 'TZA', '834', 'yes', '255', '.tz', 'Tanzanian', 'tanzania.png', '+255', 'Africa/Dar_es_Salaam', NULL, NULL, NULL),
(221, 'TH', 'Thailand', 'Kingdom of Thailand', NULL, 'THA', '764', 'yes', '66', '.th', 'Thai', 'thailand.png', '+66', 'Asia/Bangkok', NULL, NULL, NULL),
(222, 'TL', 'Timor-Leste (East Timor)', 'Democratic Republic of Timor-Leste', NULL, 'TLS', '626', 'yes', '670', '.tl', 'Timorese', 'unknown.png', '+670', 'Asia/Dili', NULL, NULL, NULL),
(223, 'TG', 'Togo', 'Togolese Republic', NULL, 'TGO', '768', 'yes', '228', '.tg', 'Togolese', 'togo.png', '+228', 'Africa/Lome', NULL, NULL, NULL),
(224, 'TK', 'Tokelau', 'Tokelau', NULL, 'TKL', '772', 'no', '690', '.tk', 'Tokelauan', 'tokelau.png', '+690', 'Pacific/Fakaofo', NULL, NULL, NULL),
(225, 'TO', 'Tonga', 'Kingdom of Tonga', NULL, 'TON', '776', 'yes', '676', '.to', 'unknown', 'tonga.png', '+676', 'Pacific/Tongatapu', NULL, NULL, NULL),
(226, 'TT', 'Trinidad and Tobago', 'Republic of Trinidad and Tobago', NULL, 'TTO', '780', 'yes', '1+868', '.tt', 'British', 'trinidad-and-tobago.png', '+1-868', 'America/Port_of_Spain', NULL, NULL, NULL),
(227, 'TN', 'Tunisia', 'Republic of Tunisia', NULL, 'TUN', '788', 'yes', '216', '.tn', 'Tunisian ', 'tunisia.png', '+216', 'Africa/Tunis', NULL, NULL, NULL),
(228, 'TR', 'Turkey', 'Republic of Turkey', NULL, 'TUR', '792', 'yes', '90', '.tr', 'Turk', 'turkey.png', '+90', 'Europe/Istanbul', NULL, NULL, NULL),
(229, 'TM', 'Turkmenistan', 'Turkmenistan', NULL, 'TKM', '795', 'yes', '993', '.tm', 'Turkmen', 'turkmenistan.png', '+993', 'Asia/Ashgabat', NULL, NULL, NULL),
(230, 'TC', 'Turks and Caicos Islands', 'Turks and Caicos Islands', NULL, 'TCA', '796', 'no', '1+649', '.tc', 'British', 'turks-and-caicos.png', '++1-649', 'America/Grand_Turk', NULL, NULL, NULL),
(231, 'TV', 'Tuvalu', 'Tuvalu', NULL, 'TUV', '798', 'yes', '688', '.tv', 'Tuvaluan', 'tuvalu.png', '+688', '	Pacific/Funafuti', NULL, NULL, NULL),
(232, 'UG', 'Uganda', 'Republic of Uganda', NULL, 'UGA', '800', 'yes', '256', '.ug', 'UGANDAN', 'uganda.png', '+256', 'Africa/Kampala', NULL, NULL, NULL),
(233, 'UA', 'Ukraine', 'Ukraine', NULL, 'UKR', '804', 'yes', '380', '.ua', 'Ukrainian', 'ukraine.png', '+380', 'Europe/Kiev', NULL, NULL, NULL),
(234, 'AE', 'United Arab Emirates', 'United Arab Emirates', NULL, 'ARE', '784', 'yes', '971', '.ae', 'Emirati', 'united-arab-emirates.png', '+971', 'Asia/Dubai', NULL, NULL, NULL),
(235, 'GB', 'United Kingdom', 'United Kingdom of Great Britain and Nothern Ireland', NULL, 'GBR', '826', 'yes', '44', '.uk', 'British', 'united-kingdom.png', '+44', 'Europe/London', NULL, NULL, NULL),
(236, 'US', 'United States', 'United States of America', NULL, 'USA', '840', 'yes', '1', '.us', 'American', 'united-states-of-america.png', '+1', 'America/Adak', NULL, NULL, NULL),
(238, 'UY', 'Uruguay', 'Eastern Republic of Uruguay', NULL, 'URY', '858', 'yes', '598', '.uy', 'Uruguayan', 'uruguay.png', '+598', 'America/Montevideo', NULL, NULL, NULL),
(239, 'UZ', 'Uzbekistan', 'Republic of Uzbekistan', NULL, 'UZB', '860', 'yes', '998', '.uz', 'Uzbekistan', 'unknown.png', '+998', 'Asia/Samarkand', NULL, NULL, NULL),
(240, 'VU', 'Vanuatu', 'Republic of Vanuatu', NULL, 'VUT', '548', 'yes', '678', '.vu', 'unknown', 'vanuatu.png', '+678', 'Pacific/Efate', NULL, NULL, NULL),
(241, 'VA', 'Vatican City', 'State of the Vatican City', NULL, 'VAT', '336', 'no', '39', '.va', 'Vaticanian', 'vatican-city.png', '+39', 'Europe/Vatican', NULL, NULL, NULL),
(242, 'VE', 'Venezuela', 'Bolivarian Republic of Venezuela', NULL, 'VEN', '862', 'yes', '58', '.ve', 'Venezuelan', 'venezuela.png', '+58', 'America/Caracas', NULL, NULL, NULL),
(243, 'VN', 'Vietnam', 'Socialist Republic of Vietnam', NULL, 'VNM', '704', 'yes', '84', '.vn', 'Vietnamese', 'vietnam.png', '+84', 'Asia/Ho_Chi_Minh', NULL, NULL, NULL),
(244, 'VG', 'Virgin Islands, British', 'British Virgin Islands', NULL, 'VGB', '092', 'no', '1+284', '.vg', 'American', 'unknown.png', '+1-284', 'America/Tortola', NULL, NULL, NULL),
(245, 'VI', 'Virgin Islands, US', 'Virgin Islands of the United States', NULL, 'VIR', '850', 'no', '1+340', '.vi', 'American', 'virgin-islands.png', '+1-340', 'America/St_Thomas', NULL, NULL, NULL),
(246, 'WF', 'Wallis and Futuna', 'Wallis and Futuna', NULL, 'WLF', '876', 'no', '681', '.wf', 'UNKOWN', 'unknown.png', '+681', 'Pacific/Wallis', NULL, NULL, NULL),
(247, 'EH', 'Western Sahara', 'Western Sahara', NULL, 'ESH', '732', 'no', '212', '.eh', 'Sahrawi', 'western-sahara.png', '+212', 'Africa/El_Aaiun', NULL, NULL, NULL),
(248, 'YE', 'Yemen', 'Republic of Yemen', NULL, 'YEM', '887', 'yes', '967', '.ye', 'Yemeni', 'yemen.png', '+967', 'Asia/Aden', NULL, NULL, NULL),
(249, 'ZM', 'Zambia', 'Republic of Zambia', NULL, 'ZMB', '894', 'yes', '260', '.zm', 'Zambian', 'zambia.png', '+260', 'Africa/Lusaka', NULL, NULL, NULL),
(250, 'ZW', 'Zimbabwe', 'Republic of Zimbabwe', NULL, 'ZWE', '716', 'yes', '263', '.zw', 'Zimbabwean', 'zimbabwe.png', '+263', 'Africa/Harare', NULL, NULL, NULL);

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
(2, 'developer2', 'developer2', 'developer2', 1, 1, '2021-04-26 01:35:24', '2021-04-26 01:35:24'),
(3, 'Subscription 1', 'Subscription 1', 'subscription-1', 1, 1, '2021-06-01 08:02:15', '2021-06-01 08:02:15'),
(4, 'DUBAI PROPERTIES', 'DUBAI PROPERTIES', 'dubai_properties', 1, 1, '2021-06-07 08:33:49', '2021-06-07 08:33:49'),
(5, 'backend', 'باك اند', 'backend', 1, 1, '2021-06-07 19:38:11', '2021-06-07 19:38:11');

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

--
-- Dumping data for table `email_notifies`
--

INSERT INTO `email_notifies` (`id`, `listing_assigned`, `lead_assigned`, `listing_approval`, `task_assigned`, `listing_approved`, `listing_rejected`, `lsm_lead`, `email_lead`, `task_reminder`, `tenancy_expiry`, `email_cc`, `email_bcc`, `agency_id`, `business_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 1, 1, NULL, '2021-05-09 08:38:26', '2021-05-09 08:38:26');

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
-- Table structure for table `faild_leads`
--

CREATE TABLE `faild_leads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `failed_data` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `agency_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faild_leads`
--

INSERT INTO `faild_leads` (`id`, `failed_data`, `reference`, `created_at`, `updated_at`, `agency_id`) VALUES
(1, '[\"community\",\"sub community\"]', '60bdd9edb4163', '2021-06-07 08:33:49', '2021-06-07 08:33:49', 1),
(2, '[\"community\",\"sub community\"]', '60bdd9edba3ff', '2021-06-07 08:33:49', '2021-06-07 08:33:49', 1),
(3, '[\"community\",\"sub community\"]', '60bdd9edbc5c2', '2021-06-07 08:33:49', '2021-06-07 08:33:49', 1),
(4, '[\"community\",\"sub community\"]', '60bdd9edbe4cd', '2021-06-07 08:33:49', '2021-06-07 08:33:49', 1),
(5, '[\"community\",\"sub community\"]', '60bdd9edc033b', '2021-06-07 08:33:49', '2021-06-07 08:33:49', 1),
(6, '[\"community\",\"sub community\"]', '60bdd9edc21eb', '2021-06-07 08:33:49', '2021-06-07 08:33:49', 1),
(7, '[\"community\",\"sub community\"]', '60bdd9edc3fbc', '2021-06-07 08:33:49', '2021-06-07 08:33:49', 1),
(8, '[\"community\",\"sub community\"]', '60bdd9edc5fbd', '2021-06-07 08:33:49', '2021-06-07 08:33:49', 1),
(9, '[\"community\",\"sub community\"]', '60bdd9edc8174', '2021-06-07 08:33:49', '2021-06-07 08:33:49', 1),
(10, '[\"community\",\"sub community\"]', '60bdd9edcd30c', '2021-06-07 08:33:49', '2021-06-07 08:33:49', 1),
(11, '[\"community\",\"sub community\"]', '60bdd9edd1194', '2021-06-07 08:33:49', '2021-06-07 08:33:49', 1),
(12, '[\"community\",\"sub community\"]', '60bdd9edd31b4', '2021-06-07 08:33:49', '2021-06-07 08:33:49', 1),
(13, '[\"community\",\"sub community\"]', '60bdd9edd517e', '2021-06-07 08:33:49', '2021-06-07 08:33:49', 1),
(14, '[\"community\",\"sub community\"]', '60bdd9edd725e', '2021-06-07 08:33:49', '2021-06-07 08:33:49', 1),
(15, '[\"community\",\"sub community\"]', '60bdd9edd9325', '2021-06-07 08:33:49', '2021-06-07 08:33:49', 1),
(16, '[\"community\",\"sub community\"]', '60bdd9eddb34d', '2021-06-07 08:33:49', '2021-06-07 08:33:49', 1),
(17, '[\"community\",\"sub community\"]', '60bdd9eddd2e2', '2021-06-07 08:33:49', '2021-06-07 08:33:49', 1),
(18, '[\"community\",\"sub community\"]', '60bdd9eddf266', '2021-06-07 08:33:49', '2021-06-07 08:33:49', 1),
(19, '[\"community\",\"sub community\"]', '60bdd9ede1102', '2021-06-07 08:33:49', '2021-06-07 08:33:49', 1),
(20, '[\"community\",\"sub community\"]', '60bdd9ede2fac', '2021-06-07 08:33:49', '2021-06-07 08:33:49', 1),
(21, '[\"community\",\"sub community\"]', '60bdd9ede4e0e', '2021-06-07 08:33:49', '2021-06-07 08:33:49', 1),
(22, '[\"community\",\"sub community\"]', '60bdd9ede6cc7', '2021-06-07 08:33:49', '2021-06-07 08:33:49', 1),
(23, '[\"community\",\"sub community\"]', '60bdd9ede8b0c', '2021-06-07 08:33:49', '2021-06-07 08:33:49', 1),
(24, '[\"community\",\"sub community\"]', '60bdd9edeaa0e', '2021-06-07 08:33:49', '2021-06-07 08:33:49', 1),
(25, '[\"country\",\"community\",\"sub community\"]', '60bdd9edecabc', '2021-06-07 08:33:49', '2021-06-07 08:33:49', 1),
(26, '[\"community\",\"sub community\"]', '60bdd9edef22c', '2021-06-07 08:33:49', '2021-06-07 08:33:49', 1),
(27, '[\"community\",\"sub community\"]', '60bdd9edf29f1', '2021-06-07 08:33:49', '2021-06-07 08:33:49', 1),
(28, '[\"community\",\"sub community\"]', '60bdd9ee01d87', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(29, '[\"community\",\"sub community\"]', '60bdd9ee03f6b', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(30, '[\"community\",\"sub community\"]', '60bdd9ee05ebb', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(31, '[\"community\",\"sub community\"]', '60bdd9ee07f21', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(32, '[\"community\",\"sub community\"]', '60bdd9ee0a05b', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(33, '[\"community\",\"sub community\"]', '60bdd9ee0c383', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(34, '[\"community\",\"sub community\"]', '60bdd9ee0e7a5', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(35, '[\"community\",\"sub community\"]', '60bdd9ee10d09', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(36, '[\"community\",\"sub community\"]', '60bdd9ee13129', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(37, '[\"community\",\"sub community\"]', '60bdd9ee154d0', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(38, '[\"community\",\"sub community\"]', '60bdd9ee17b20', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(39, '[\"community\",\"sub community\"]', '60bdd9ee1c2be', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(40, '[\"community\",\"sub community\"]', '60bdd9ee1f834', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(41, '[\"community\",\"sub community\"]', '60bdd9ee21c80', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(42, '[\"community\",\"sub community\"]', '60bdd9ee23bd9', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(43, '[\"community\",\"sub community\"]', '60bdd9ee25c34', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(44, '[\"community\",\"sub community\"]', '60bdd9ee295d5', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(45, '[\"community\",\"sub community\"]', '60bdd9ee2d892', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(46, '[\"community\",\"sub community\"]', '60bdd9ee2fc8e', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(47, '[\"community\",\"sub community\"]', '60bdd9ee31e1d', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(48, '[\"community\",\"sub community\"]', '60bdd9ee33ffa', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(49, '[\"community\",\"sub community\"]', '60bdd9ee35fe5', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(50, '[\"community\",\"sub community\"]', '60bdd9ee37f02', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(51, '[\"community\",\"sub community\"]', '60bdd9ee39e8c', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(52, '[\"community\",\"sub community\"]', '60bdd9ee3bd53', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(53, '[\"community\",\"sub community\"]', '60bdd9ee3dc55', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(54, '[\"community\",\"sub community\"]', '60bdd9ee3feb2', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(55, '[\"community\",\"sub community\"]', '60bdd9ee42150', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(56, '[\"community\",\"sub community\"]', '60bdd9ee4481d', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(57, '[\"community\",\"sub community\"]', '60bdd9ee468d6', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(58, '[\"community\",\"sub community\"]', '60bdd9ee48949', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(59, '[\"community\",\"sub community\"]', '60bdd9ee4b7cd', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(60, '[\"community\",\"sub community\"]', '60bdd9ee4d922', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(61, '[\"community\",\"sub community\"]', '60bdd9ee4f9f7', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(62, '[\"community\",\"sub community\"]', '60bdd9ee51eac', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(63, '[\"community\",\"sub community\"]', '60bdd9ee54040', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(64, '[\"community\",\"sub community\"]', '60bdd9ee5604c', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(65, '[\"community\",\"sub community\"]', '60bdd9ee58365', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(66, '[\"community\",\"sub community\"]', '60bdd9ee5a453', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(67, '[\"community\",\"sub community\"]', '60bdd9ee5c548', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(68, '[\"community\",\"sub community\"]', '60bdd9ee5e67e', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(69, '[\"community\",\"sub community\"]', '60bdd9ee60784', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(70, '[\"community\",\"sub community\"]', '60bdd9ee627fd', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(71, '[\"community\",\"sub community\"]', '60bdd9ee64965', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(72, '[\"community\",\"sub community\"]', '60bdd9ee66a38', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(73, '[\"community\",\"sub community\"]', '60bdd9ee68ab1', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(74, '[\"community\",\"sub community\"]', '60bdd9ee6abe8', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(75, '[\"community\",\"sub community\"]', '60bdd9ee6caf1', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(76, '[\"community\",\"sub community\"]', '60bdd9ee6e98e', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(77, '[\"community\",\"sub community\"]', '60bdd9ee70800', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(78, '[\"community\",\"sub community\"]', '60bdd9ee7266f', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(79, '[\"community\",\"sub community\"]', '60bdd9ee7447f', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(80, '[\"community\",\"sub community\"]', '60bdd9ee76291', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(81, '[\"community\",\"sub community\"]', '60bdd9ee78424', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(82, '[\"community\",\"sub community\"]', '60bdd9ee7a582', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(83, '[\"community\",\"sub community\"]', '60bdd9ee7c86a', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(84, '[\"community\",\"sub community\"]', '60bdd9ee7ebbd', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(85, '[\"community\",\"sub community\"]', '60bdd9ee81227', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(86, '[\"community\",\"sub community\"]', '60bdd9ee837f8', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(87, '[\"community\",\"sub community\"]', '60bdd9ee85cad', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(88, '[\"community\",\"sub community\"]', '60bdd9ee88123', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(89, '[\"community\",\"sub community\"]', '60bdd9ee8a677', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(90, '[\"community\",\"sub community\"]', '60bdd9ee8cede', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(91, '[\"community\",\"sub community\"]', '60bdd9ee90ebd', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(92, '[\"community\",\"sub community\"]', '60bdd9ee9338a', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(93, '[\"community\",\"sub community\"]', '60bdd9ee956ad', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(94, '[\"community\",\"sub community\"]', '60bdd9ee97868', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(95, '[\"community\",\"sub community\"]', '60bdd9ee99999', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(96, '[\"community\",\"sub community\"]', '60bdd9ee9c0e3', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(97, '[\"community\",\"sub community\"]', '60bdd9eea048d', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(98, '[\"community\",\"sub community\"]', '60bdd9eea3213', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(99, '[\"community\",\"sub community\"]', '60bdd9eea5183', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(100, '[\"community\",\"sub community\"]', '60bdd9eea9015', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(101, '[\"community\",\"sub community\"]', '60bdd9eeb8a66', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(102, '[\"community\",\"sub community\"]', '60bdd9eebb71b', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(103, '[\"community\",\"sub community\"]', '60bdd9eebdb35', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(104, '[\"community\",\"sub community\"]', '60bdd9eebfacd', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(105, '[\"community\",\"sub community\"]', '60bdd9eec1f5a', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(106, '[\"community\",\"sub community\"]', '60bdd9eec3f6f', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(107, '[\"community\",\"sub community\"]', '60bdd9eec6135', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(108, '[\"community\",\"sub community\"]', '60bdd9eec8778', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(109, '[\"community\",\"sub community\"]', '60bdd9eeca86a', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(110, '[\"community\",\"sub community\"]', '60bdd9eecc7c5', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(111, '[\"community\",\"sub community\"]', '60bdd9eece6a8', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(112, '[\"community\",\"sub community\"]', '60bdd9eed0adf', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(113, '[\"community\",\"sub community\"]', '60bdd9eed3f9a', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(114, '[\"community\",\"sub community\"]', '60bdd9eed688f', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(115, '[\"community\",\"sub community\"]', '60bdd9eed8b13', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(116, '[\"community\",\"sub community\"]', '60bdd9eedab02', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(117, '[\"community\",\"sub community\"]', '60bdd9eedcfa0', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(118, '[\"community\",\"sub community\"]', '60bdd9eee1757', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(119, '[\"community\",\"sub community\"]', '60bdd9eee4488', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(120, '[\"community\",\"sub community\"]', '60bdd9eee79c0', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(121, '[\"community\",\"sub community\"]', '60bdd9eee9fb7', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(122, '[\"community\",\"sub community\"]', '60bdd9eeeea67', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(123, '[\"community\",\"sub community\"]', '60bdd9eef2141', '2021-06-07 08:33:50', '2021-06-07 08:33:50', 1),
(124, '[\"community\",\"sub community\"]', '60bdd9ef002e8', '2021-06-07 08:33:51', '2021-06-07 08:33:51', 1),
(125, '[\"community\",\"sub community\"]', '60bdd9ef028b9', '2021-06-07 08:33:51', '2021-06-07 08:33:51', 1),
(126, '[\"community\",\"sub community\"]', '60bdd9ef04dd3', '2021-06-07 08:33:51', '2021-06-07 08:33:51', 1),
(127, '[\"community\",\"sub community\"]', '60bdd9ef08ca4', '2021-06-07 08:33:51', '2021-06-07 08:33:51', 1),
(128, '[\"community\",\"sub community\"]', '60bdd9ef0b914', '2021-06-07 08:33:51', '2021-06-07 08:33:51', 1),
(129, '[\"community\",\"sub community\"]', '60bdd9ef0dc60', '2021-06-07 08:33:51', '2021-06-07 08:33:51', 1),
(130, '[\"community\",\"sub community\"]', '60bdd9ef0fd6f', '2021-06-07 08:33:51', '2021-06-07 08:33:51', 1),
(131, '[\"country\",\"community\",\"sub community\"]', '60bdd9ef11fa5', '2021-06-07 08:33:51', '2021-06-07 08:33:51', 1),
(132, '[\"community\",\"sub community\"]', '60bdd9ef140ad', '2021-06-07 08:33:51', '2021-06-07 08:33:51', 1),
(133, '[\"community\",\"sub community\"]', '60bdd9ef16240', '2021-06-07 08:33:51', '2021-06-07 08:33:51', 1),
(134, '[\"community\",\"sub community\"]', '60bdd9ef183f4', '2021-06-07 08:33:51', '2021-06-07 08:33:51', 1),
(135, '[\"community\",\"sub community\"]', '60bdd9ef1a572', '2021-06-07 08:33:51', '2021-06-07 08:33:51', 1),
(136, '[\"community\",\"sub community\"]', '60bdd9ef1c65d', '2021-06-07 08:33:51', '2021-06-07 08:33:51', 1),
(137, '[\"community\",\"sub community\"]', '60bdd9ef1e76f', '2021-06-07 08:33:51', '2021-06-07 08:33:51', 1),
(138, '[\"community\",\"sub community\"]', '60bdd9ef20b73', '2021-06-07 08:33:51', '2021-06-07 08:33:51', 1),
(139, '[\"community\",\"sub community\"]', '60bdd9ef22c7b', '2021-06-07 08:33:51', '2021-06-07 08:33:51', 1),
(140, '[\"community\",\"sub community\"]', '60bdd9ef24ce4', '2021-06-07 08:33:51', '2021-06-07 08:33:51', 1),
(141, '[\"community\",\"sub community\"]', '60bdd9ef26dab', '2021-06-07 08:33:51', '2021-06-07 08:33:51', 1),
(142, '[\"community\",\"sub community\"]', '60bdd9ef28e0d', '2021-06-07 08:33:51', '2021-06-07 08:33:51', 1),
(143, '[\"community\",\"sub community\"]', '60bdd9ef2aeec', '2021-06-07 08:33:51', '2021-06-07 08:33:51', 1),
(144, '[\"community\",\"sub community\"]', '60bdd9ef2ced1', '2021-06-07 08:33:51', '2021-06-07 08:33:51', 1),
(145, '[\"community\",\"sub community\"]', '60bdd9ef2f418', '2021-06-07 08:33:51', '2021-06-07 08:33:51', 1),
(146, '[\"community\",\"sub community\"]', '60bdd9ef315a6', '2021-06-07 08:33:51', '2021-06-07 08:33:51', 1),
(147, '[\"community\",\"sub community\"]', '60bdd9ef33430', '2021-06-07 08:33:51', '2021-06-07 08:33:51', 1),
(148, '[\"community\",\"sub community\"]', '60bdd9ef35219', '2021-06-07 08:33:51', '2021-06-07 08:33:51', 1),
(149, '[\"community\",\"sub community\"]', '60bdd9ef37101', '2021-06-07 08:33:51', '2021-06-07 08:33:51', 1),
(150, '[\"community\",\"sub community\"]', '60bdd9ef38f7c', '2021-06-07 08:33:51', '2021-06-07 08:33:51', 1),
(151, '[\"community\",\"sub community\"]', '60bdd9ef3aeeb', '2021-06-07 08:33:51', '2021-06-07 08:33:51', 1),
(152, '[\"community\",\"sub community\"]', '60bdd9ef3cefc', '2021-06-07 08:33:51', '2021-06-07 08:33:51', 1),
(153, '[\"community\",\"sub community\"]', '60bdd9ef3f653', '2021-06-07 08:33:51', '2021-06-07 08:33:51', 1),
(154, '[\"community\",\"sub community\"]', '60bdd9ef42d58', '2021-06-07 08:33:51', '2021-06-07 08:33:51', 1),
(155, '[\"community\",\"sub community\"]', '60bdd9ef4536a', '2021-06-07 08:33:51', '2021-06-07 08:33:51', 1),
(156, '[\"community\",\"sub community\"]', '60bdd9ef49aef', '2021-06-07 08:33:51', '2021-06-07 08:33:51', 1),
(157, '[\"community\",\"sub community\"]', '60bdd9ef4cf47', '2021-06-07 08:33:51', '2021-06-07 08:33:51', 1),
(158, '[\"community\",\"sub community\"]', '60bdd9ef4f4f0', '2021-06-07 08:33:51', '2021-06-07 08:33:51', 1),
(159, '[\"community\",\"sub community\"]', '60bdd9ef51874', '2021-06-07 08:33:51', '2021-06-07 08:33:51', 1),
(160, '[\"community\",\"sub community\"]', '60bdd9ef53c36', '2021-06-07 08:33:51', '2021-06-07 08:33:51', 1),
(161, '[\"community\",\"sub community\"]', '60bdd9ef55b4d', '2021-06-07 08:33:51', '2021-06-07 08:33:51', 1),
(162, '[\"community\",\"sub community\"]', '60bdd9ef579dd', '2021-06-07 08:33:51', '2021-06-07 08:33:51', 1);

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

--
-- Dumping data for table `failed_jobs`
--

INSERT INTO `failed_jobs` (`id`, `connection`, `queue`, `payload`, `exception`, `failed_at`) VALUES
(1, 'database', 'default', '{\"uuid\":\"2b00393e-85a6-40e6-994d-3bfb68237e8c\",\"displayName\":\"App\\\\Jobs\\\\SendEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmail\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\SendEmail\\\":11:{s:2:\\\"to\\\";s:21:\\\"shady@onetecgroup.com\\\";s:8:\\\"template\\\";s:368:\\\"<p>Hi there,<\\/p><p>A new Question Has Been Made By Management : Ceo.<\\/p>\\r\\n<p>Question Is : gt .<\\/p>\\r\\n<p>Opportunity Name Is : Ahmed mohamed .<\\/p>\\r\\n<p>You can view this opportunity by logging in to the portal using the link below.<\\/p><p><br><a href=\\\"http:\\/\\/broker.test\\/sales\\/opportunities\\/1\\\"><strong>View Task<\\/strong><\\/a><br><br>Regards<br>The OneTecGroup CRM Team<\\/p>\\\";s:7:\\\"message\\\";s:24:\\\"New Opportunity Question\\\";s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 'Swift_TransportException: Connection could not be established with host mail.onetecgroup.com :stream_socket_client(): unable to connect to ssl://mail.onetecgroup.com:465 (A connection attempt failed because the connected party did not properly respond after a period of time, or established connection failed because connected host has failed to respond.\r\n) in C:\\xampp\\htdocs\\broker\\vendor\\swiftmailer\\swiftmailer\\lib\\classes\\Swift\\Transport\\StreamBuffer.php:261\nStack trace:\n#0 [internal function]: Swift_Transport_StreamBuffer->{closure}(2, \'stream_socket_c...\', \'C:\\\\xampp\\\\htdocs...\', 264, Array)\n#1 C:\\xampp\\htdocs\\broker\\vendor\\swiftmailer\\swiftmailer\\lib\\classes\\Swift\\Transport\\StreamBuffer.php(264): stream_socket_client(\'ssl://mail.onet...\', 10060, \'A connection at...\', 30, 4, Resource id #1234)\n#2 C:\\xampp\\htdocs\\broker\\vendor\\swiftmailer\\swiftmailer\\lib\\classes\\Swift\\Transport\\StreamBuffer.php(58): Swift_Transport_StreamBuffer->establishSocketConnection()\n#3 C:\\xampp\\htdocs\\broker\\vendor\\swiftmailer\\swiftmailer\\lib\\classes\\Swift\\Transport\\AbstractSmtpTransport.php(143): Swift_Transport_StreamBuffer->initialize(Array)\n#4 C:\\xampp\\htdocs\\broker\\vendor\\swiftmailer\\swiftmailer\\lib\\classes\\Swift\\Mailer.php(65): Swift_Transport_AbstractSmtpTransport->start()\n#5 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(521): Swift_Mailer->send(Object(Swift_Message), Array)\n#6 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(288): Illuminate\\Mail\\Mailer->sendSwiftMessage(Object(Swift_Message))\n#7 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(186): Illuminate\\Mail\\Mailer->send(Object(Illuminate\\Support\\HtmlString), Array, Object(Closure))\n#8 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\Localizable.php(19): Illuminate\\Mail\\Mailable->Illuminate\\Mail\\{closure}()\n#9 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(187): Illuminate\\Mail\\Mailable->withLocale(NULL, Object(Closure))\n#10 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(304): Illuminate\\Mail\\Mailable->send(Object(Illuminate\\Mail\\Mailer))\n#11 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(258): Illuminate\\Mail\\Mailer->sendMailable(Object(App\\Mail\\EmailGeneral))\n#12 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\PendingMail.php(121): Illuminate\\Mail\\Mailer->send(Object(App\\Mail\\EmailGeneral))\n#13 C:\\xampp\\htdocs\\broker\\app\\Jobs\\SendEmail.php(43): Illuminate\\Mail\\PendingMail->send(Object(App\\Mail\\EmailGeneral))\n#14 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\SendEmail->handle()\n#15 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#16 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#17 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#18 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(611): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#19 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#20 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\SendEmail))\n#21 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendEmail))\n#22 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#23 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(118): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\SendEmail), false)\n#24 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\SendEmail))\n#25 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendEmail))\n#26 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#27 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\SendEmail))\n#28 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#29 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(410): Illuminate\\Queue\\Jobs\\Job->fire()\n#30 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(360): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#31 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(158): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#32 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#33 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#34 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#35 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#36 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#37 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#38 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(611): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#39 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#40 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Command\\Command.php(256): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#41 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#42 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Application.php(971): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#43 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Application.php(290): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#44 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Application.php(166): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#45 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(92): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#46 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#47 C:\\xampp\\htdocs\\broker\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#48 {main}', '2021-05-05 08:39:47'),
(2, 'database', 'default', '{\"uuid\":\"d20f8ce4-6504-4424-a888-1220d6b80ae4\",\"displayName\":\"App\\\\Jobs\\\\SendEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmail\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\SendEmail\\\":11:{s:2:\\\"to\\\";s:27:\\\"mohamedhamed01127@gmail.com\\\";s:8:\\\"template\\\";s:368:\\\"<p>Hi there,<\\/p><p>A new Question Has Been Made By Management : Ceo.<\\/p>\\r\\n<p>Question Is : gt .<\\/p>\\r\\n<p>Opportunity Name Is : Ahmed mohamed .<\\/p>\\r\\n<p>You can view this opportunity by logging in to the portal using the link below.<\\/p><p><br><a href=\\\"http:\\/\\/broker.test\\/sales\\/opportunities\\/1\\\"><strong>View Task<\\/strong><\\/a><br><br>Regards<br>The OneTecGroup CRM Team<\\/p>\\\";s:7:\\\"message\\\";s:24:\\\"New Opportunity Question\\\";s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 'Swift_TransportException: Connection could not be established with host mail.onetecgroup.com :stream_socket_client(): unable to connect to ssl://mail.onetecgroup.com:465 (A connection attempt failed because the connected party did not properly respond after a period of time, or established connection failed because connected host has failed to respond.\r\n) in C:\\xampp\\htdocs\\broker\\vendor\\swiftmailer\\swiftmailer\\lib\\classes\\Swift\\Transport\\StreamBuffer.php:261\nStack trace:\n#0 [internal function]: Swift_Transport_StreamBuffer->{closure}(2, \'stream_socket_c...\', \'C:\\\\xampp\\\\htdocs...\', 264, Array)\n#1 C:\\xampp\\htdocs\\broker\\vendor\\swiftmailer\\swiftmailer\\lib\\classes\\Swift\\Transport\\StreamBuffer.php(264): stream_socket_client(\'ssl://mail.onet...\', 10060, \'A connection at...\', 30, 4, Resource id #1377)\n#2 C:\\xampp\\htdocs\\broker\\vendor\\swiftmailer\\swiftmailer\\lib\\classes\\Swift\\Transport\\StreamBuffer.php(58): Swift_Transport_StreamBuffer->establishSocketConnection()\n#3 C:\\xampp\\htdocs\\broker\\vendor\\swiftmailer\\swiftmailer\\lib\\classes\\Swift\\Transport\\AbstractSmtpTransport.php(143): Swift_Transport_StreamBuffer->initialize(Array)\n#4 C:\\xampp\\htdocs\\broker\\vendor\\swiftmailer\\swiftmailer\\lib\\classes\\Swift\\Mailer.php(65): Swift_Transport_AbstractSmtpTransport->start()\n#5 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(521): Swift_Mailer->send(Object(Swift_Message), Array)\n#6 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(288): Illuminate\\Mail\\Mailer->sendSwiftMessage(Object(Swift_Message))\n#7 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(186): Illuminate\\Mail\\Mailer->send(Object(Illuminate\\Support\\HtmlString), Array, Object(Closure))\n#8 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\Localizable.php(19): Illuminate\\Mail\\Mailable->Illuminate\\Mail\\{closure}()\n#9 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(187): Illuminate\\Mail\\Mailable->withLocale(NULL, Object(Closure))\n#10 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(304): Illuminate\\Mail\\Mailable->send(Object(Illuminate\\Mail\\Mailer))\n#11 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(258): Illuminate\\Mail\\Mailer->sendMailable(Object(App\\Mail\\EmailGeneral))\n#12 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\PendingMail.php(121): Illuminate\\Mail\\Mailer->send(Object(App\\Mail\\EmailGeneral))\n#13 C:\\xampp\\htdocs\\broker\\app\\Jobs\\SendEmail.php(43): Illuminate\\Mail\\PendingMail->send(Object(App\\Mail\\EmailGeneral))\n#14 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\SendEmail->handle()\n#15 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#16 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#17 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#18 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(611): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#19 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#20 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\SendEmail))\n#21 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendEmail))\n#22 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#23 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(118): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\SendEmail), false)\n#24 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\SendEmail))\n#25 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendEmail))\n#26 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#27 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\SendEmail))\n#28 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#29 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(410): Illuminate\\Queue\\Jobs\\Job->fire()\n#30 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(360): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#31 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(158): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#32 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#33 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#34 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#35 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#36 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#37 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#38 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(611): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#39 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#40 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Command\\Command.php(256): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#41 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#42 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Application.php(971): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#43 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Application.php(290): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#44 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Application.php(166): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#45 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(92): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#46 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#47 C:\\xampp\\htdocs\\broker\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#48 {main}', '2021-05-05 08:40:11'),
(3, 'database', 'default', '{\"uuid\":\"e5c11352-9d3e-4622-b33b-61222816d19f\",\"displayName\":\"App\\\\Jobs\\\\SendEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmail\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\SendEmail\\\":11:{s:2:\\\"to\\\";s:21:\\\"hamed@onetecgroup.com\\\";s:8:\\\"template\\\";s:463:\\\"<p>Hi there,<\\/p><p>Opportunity Result Report OF: <strong>Ahmed mohamed<\\/strong> &nbsp;has been updated by <strong>Ceo<\\/strong>.<\\/p><p>The New Update : <\\/p> <p>Status : successful .<\\/p> <p> Stage : pending.<\\/p><p>Note :  testing the codes <\\/p><p>You can view this opportunity by logging in to the portal using the link below.<\\/p><p><br><a href=\\\"http:\\/\\/broker.test\\/sales\\/opportunities\\/1\\\"><strong>View Task<\\/strong><\\/a><br><br>Regards<br>The OneTecGroup CRM Team<\\/p>\\\";s:7:\\\"message\\\";s:44:\\\"Opportunity Result Report Has Been Confirmed\\\";s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 'Swift_TransportException: Connection could not be established with host mail.onetecgroup.com :stream_socket_client(): unable to connect to ssl://mail.onetecgroup.com:465 (A connection attempt failed because the connected party did not properly respond after a period of time, or established connection failed because connected host has failed to respond.\r\n) in C:\\xampp\\htdocs\\broker\\vendor\\swiftmailer\\swiftmailer\\lib\\classes\\Swift\\Transport\\StreamBuffer.php:261\nStack trace:\n#0 [internal function]: Swift_Transport_StreamBuffer->{closure}(2, \'stream_socket_c...\', \'C:\\\\xampp\\\\htdocs...\', 264, Array)\n#1 C:\\xampp\\htdocs\\broker\\vendor\\swiftmailer\\swiftmailer\\lib\\classes\\Swift\\Transport\\StreamBuffer.php(264): stream_socket_client(\'ssl://mail.onet...\', 10060, \'A connection at...\', 30, 4, Resource id #1427)\n#2 C:\\xampp\\htdocs\\broker\\vendor\\swiftmailer\\swiftmailer\\lib\\classes\\Swift\\Transport\\StreamBuffer.php(58): Swift_Transport_StreamBuffer->establishSocketConnection()\n#3 C:\\xampp\\htdocs\\broker\\vendor\\swiftmailer\\swiftmailer\\lib\\classes\\Swift\\Transport\\AbstractSmtpTransport.php(143): Swift_Transport_StreamBuffer->initialize(Array)\n#4 C:\\xampp\\htdocs\\broker\\vendor\\swiftmailer\\swiftmailer\\lib\\classes\\Swift\\Mailer.php(65): Swift_Transport_AbstractSmtpTransport->start()\n#5 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(521): Swift_Mailer->send(Object(Swift_Message), Array)\n#6 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(288): Illuminate\\Mail\\Mailer->sendSwiftMessage(Object(Swift_Message))\n#7 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(186): Illuminate\\Mail\\Mailer->send(Object(Illuminate\\Support\\HtmlString), Array, Object(Closure))\n#8 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\Localizable.php(19): Illuminate\\Mail\\Mailable->Illuminate\\Mail\\{closure}()\n#9 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(187): Illuminate\\Mail\\Mailable->withLocale(NULL, Object(Closure))\n#10 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(304): Illuminate\\Mail\\Mailable->send(Object(Illuminate\\Mail\\Mailer))\n#11 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(258): Illuminate\\Mail\\Mailer->sendMailable(Object(App\\Mail\\EmailGeneral))\n#12 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\PendingMail.php(121): Illuminate\\Mail\\Mailer->send(Object(App\\Mail\\EmailGeneral))\n#13 C:\\xampp\\htdocs\\broker\\app\\Jobs\\SendEmail.php(43): Illuminate\\Mail\\PendingMail->send(Object(App\\Mail\\EmailGeneral))\n#14 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\SendEmail->handle()\n#15 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#16 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#17 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#18 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(611): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#19 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#20 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\SendEmail))\n#21 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendEmail))\n#22 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#23 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(118): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\SendEmail), false)\n#24 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\SendEmail))\n#25 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendEmail))\n#26 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#27 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\SendEmail))\n#28 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#29 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(410): Illuminate\\Queue\\Jobs\\Job->fire()\n#30 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(360): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#31 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(158): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#32 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#33 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#34 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#35 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#36 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#37 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#38 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(611): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#39 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#40 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Command\\Command.php(256): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#41 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#42 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Application.php(971): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#43 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Application.php(290): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#44 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Application.php(166): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#45 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(92): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#46 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#47 C:\\xampp\\htdocs\\broker\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#48 {main}', '2021-05-05 08:40:32'),
(4, 'database', 'default', '{\"uuid\":\"bd919173-cc1e-4ca0-acaf-df72e5a0642e\",\"displayName\":\"App\\\\Jobs\\\\SendEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendEmail\",\"command\":\"O:18:\\\"App\\\\Jobs\\\\SendEmail\\\":11:{s:2:\\\"to\\\";s:21:\\\"hamed@onetecgroup.com\\\";s:8:\\\"template\\\";s:341:\\\"<p>Hi there,<\\/p><p>A new Task <strong>Ahmed mohamed<\\/strong> &nbsp;has been assigned to you by <strong>Ceo<\\/strong>.<\\/p><p>You can view this opportunity by logging in to the portal using the link below.<\\/p><p><br><a href=\\\"http:\\/\\/broker.test\\/sales\\/opportunities\\/1\\\"><strong>View Task<\\/strong><\\/a><br><br>Regards<br>The OneTecGroup CRM Team<\\/p>\\\";s:7:\\\"message\\\";s:41:\\\"Opportunity Task Has Been Assigned To You\\\";s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 'Swift_TransportException: Connection could not be established with host mail.onetecgroup.com :stream_socket_client(): unable to connect to ssl://mail.onetecgroup.com:465 (A connection attempt failed because the connected party did not properly respond after a period of time, or established connection failed because connected host has failed to respond.\r\n) in C:\\xampp\\htdocs\\broker\\vendor\\swiftmailer\\swiftmailer\\lib\\classes\\Swift\\Transport\\StreamBuffer.php:261\nStack trace:\n#0 [internal function]: Swift_Transport_StreamBuffer->{closure}(2, \'stream_socket_c...\', \'C:\\\\xampp\\\\htdocs...\', 264, Array)\n#1 C:\\xampp\\htdocs\\broker\\vendor\\swiftmailer\\swiftmailer\\lib\\classes\\Swift\\Transport\\StreamBuffer.php(264): stream_socket_client(\'ssl://mail.onet...\', 10060, \'A connection at...\', 30, 4, Resource id #1479)\n#2 C:\\xampp\\htdocs\\broker\\vendor\\swiftmailer\\swiftmailer\\lib\\classes\\Swift\\Transport\\StreamBuffer.php(58): Swift_Transport_StreamBuffer->establishSocketConnection()\n#3 C:\\xampp\\htdocs\\broker\\vendor\\swiftmailer\\swiftmailer\\lib\\classes\\Swift\\Transport\\AbstractSmtpTransport.php(143): Swift_Transport_StreamBuffer->initialize(Array)\n#4 C:\\xampp\\htdocs\\broker\\vendor\\swiftmailer\\swiftmailer\\lib\\classes\\Swift\\Mailer.php(65): Swift_Transport_AbstractSmtpTransport->start()\n#5 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(521): Swift_Mailer->send(Object(Swift_Message), Array)\n#6 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(288): Illuminate\\Mail\\Mailer->sendSwiftMessage(Object(Swift_Message))\n#7 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(186): Illuminate\\Mail\\Mailer->send(Object(Illuminate\\Support\\HtmlString), Array, Object(Closure))\n#8 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\Localizable.php(19): Illuminate\\Mail\\Mailable->Illuminate\\Mail\\{closure}()\n#9 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(187): Illuminate\\Mail\\Mailable->withLocale(NULL, Object(Closure))\n#10 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(304): Illuminate\\Mail\\Mailable->send(Object(Illuminate\\Mail\\Mailer))\n#11 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(258): Illuminate\\Mail\\Mailer->sendMailable(Object(App\\Mail\\EmailGeneral))\n#12 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\PendingMail.php(121): Illuminate\\Mail\\Mailer->send(Object(App\\Mail\\EmailGeneral))\n#13 C:\\xampp\\htdocs\\broker\\app\\Jobs\\SendEmail.php(43): Illuminate\\Mail\\PendingMail->send(Object(App\\Mail\\EmailGeneral))\n#14 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\SendEmail->handle()\n#15 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#16 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#17 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#18 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(611): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#19 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#20 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\SendEmail))\n#21 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendEmail))\n#22 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#23 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(118): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\SendEmail), false)\n#24 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\SendEmail))\n#25 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendEmail))\n#26 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#27 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\SendEmail))\n#28 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#29 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(410): Illuminate\\Queue\\Jobs\\Job->fire()\n#30 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(360): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#31 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(158): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#32 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#33 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#34 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#35 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#36 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#37 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#38 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(611): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#39 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#40 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Command\\Command.php(256): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#41 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#42 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Application.php(971): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#43 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Application.php(290): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#44 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Application.php(166): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#45 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(92): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#46 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#47 C:\\xampp\\htdocs\\broker\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#48 {main}', '2021-05-05 08:40:55');
INSERT INTO `failed_jobs` (`id`, `connection`, `queue`, `payload`, `exception`, `failed_at`) VALUES
(5, 'database', 'default', '{\"uuid\":\"a8aae7c7-3103-4ccc-a7ae-e9ad0caef151\",\"displayName\":\"Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\",\"command\":\"O:32:\\\"Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\\":21:{s:7:\\\"timeout\\\";N;s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:40:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000import\\\";O:23:\\\"App\\\\Imports\\\\LeadsImport\\\":6:{s:9:\\\"source_id\\\";s:1:\\\"1\\\";s:16:\\\"qualification_id\\\";s:1:\\\"1\\\";s:7:\\\"type_id\\\";s:1:\\\"1\\\";s:16:\\\"communication_id\\\";s:1:\\\"1\\\";s:8:\\\"business\\\";i:1;s:6:\\\"agency\\\";s:1:\\\"1\\\";}s:40:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000reader\\\";O:36:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\\":8:{s:53:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\u0000referenceHelper\\\";O:40:\\\"PhpOffice\\\\PhpSpreadsheet\\\\ReferenceHelper\\\":0:{}s:15:\\\"\\u0000*\\u0000readDataOnly\\\";b:1;s:17:\\\"\\u0000*\\u0000readEmptyCells\\\";b:1;s:16:\\\"\\u0000*\\u0000includeCharts\\\";b:0;s:17:\\\"\\u0000*\\u0000loadSheetsOnly\\\";N;s:13:\\\"\\u0000*\\u0000readFilter\\\";O:49:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\DefaultReadFilter\\\":0:{}s:13:\\\"\\u0000*\\u0000fileHandle\\\";N;s:18:\\\"\\u0000*\\u0000securityScanner\\\";O:51:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\\":2:{s:60:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000pattern\\\";s:9:\\\"<!DOCTYPE\\\";s:61:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000callback\\\";N;}}s:47:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000temporaryFile\\\";O:42:\\\"Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\\":1:{s:52:\\\"\\u0000Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\u0000filePath\\\";s:105:\\\"C:\\\\xampp\\\\htdocs\\\\broker\\\\storage\\\\framework\\\\laravel-excel\\\\laravel-excel-tvxJChTwLhBVlKo2jrel0scyUWPfrBiJ.tmp\\\";}s:43:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000sheetName\\\";s:6:\\\"Sheet1\\\";s:45:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000sheetImport\\\";r:5;s:42:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000startRow\\\";i:2;s:43:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000chunkSize\\\";i:20;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:9:{i:0;s:1736:\\\"O:32:\\\"Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\\":21:{s:7:\\\"timeout\\\";N;s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:40:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000import\\\";O:23:\\\"App\\\\Imports\\\\LeadsImport\\\":6:{s:9:\\\"source_id\\\";s:1:\\\"1\\\";s:16:\\\"qualification_id\\\";s:1:\\\"1\\\";s:7:\\\"type_id\\\";s:1:\\\"1\\\";s:16:\\\"communication_id\\\";s:1:\\\"1\\\";s:8:\\\"business\\\";i:1;s:6:\\\"agency\\\";s:1:\\\"1\\\";}s:40:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000reader\\\";O:36:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\\":8:{s:53:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\u0000referenceHelper\\\";O:40:\\\"PhpOffice\\\\PhpSpreadsheet\\\\ReferenceHelper\\\":0:{}s:15:\\\"\\u0000*\\u0000readDataOnly\\\";b:1;s:17:\\\"\\u0000*\\u0000readEmptyCells\\\";b:1;s:16:\\\"\\u0000*\\u0000includeCharts\\\";b:0;s:17:\\\"\\u0000*\\u0000loadSheetsOnly\\\";N;s:13:\\\"\\u0000*\\u0000readFilter\\\";O:49:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\DefaultReadFilter\\\":0:{}s:13:\\\"\\u0000*\\u0000fileHandle\\\";N;s:18:\\\"\\u0000*\\u0000securityScanner\\\";O:51:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\\":2:{s:60:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000pattern\\\";s:9:\\\"<!DOCTYPE\\\";s:61:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000callback\\\";N;}}s:47:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000temporaryFile\\\";O:42:\\\"Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\\":1:{s:52:\\\"\\u0000Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\u0000filePath\\\";s:105:\\\"C:\\\\xampp\\\\htdocs\\\\broker\\\\storage\\\\framework\\\\laravel-excel\\\\laravel-excel-tvxJChTwLhBVlKo2jrel0scyUWPfrBiJ.tmp\\\";}s:43:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000sheetName\\\";s:6:\\\"Sheet1\\\";s:45:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000sheetImport\\\";r:5;s:42:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000startRow\\\";i:22;s:43:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000chunkSize\\\";i:20;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:9:\\\"\\u0000*\\u0000events\\\";a:0:{}s:3:\\\"job\\\";N;}\\\";i:1;s:1736:\\\"O:32:\\\"Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\\":21:{s:7:\\\"timeout\\\";N;s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:40:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000import\\\";O:23:\\\"App\\\\Imports\\\\LeadsImport\\\":6:{s:9:\\\"source_id\\\";s:1:\\\"1\\\";s:16:\\\"qualification_id\\\";s:1:\\\"1\\\";s:7:\\\"type_id\\\";s:1:\\\"1\\\";s:16:\\\"communication_id\\\";s:1:\\\"1\\\";s:8:\\\"business\\\";i:1;s:6:\\\"agency\\\";s:1:\\\"1\\\";}s:40:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000reader\\\";O:36:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\\":8:{s:53:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\u0000referenceHelper\\\";O:40:\\\"PhpOffice\\\\PhpSpreadsheet\\\\ReferenceHelper\\\":0:{}s:15:\\\"\\u0000*\\u0000readDataOnly\\\";b:1;s:17:\\\"\\u0000*\\u0000readEmptyCells\\\";b:1;s:16:\\\"\\u0000*\\u0000includeCharts\\\";b:0;s:17:\\\"\\u0000*\\u0000loadSheetsOnly\\\";N;s:13:\\\"\\u0000*\\u0000readFilter\\\";O:49:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\DefaultReadFilter\\\":0:{}s:13:\\\"\\u0000*\\u0000fileHandle\\\";N;s:18:\\\"\\u0000*\\u0000securityScanner\\\";O:51:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\\":2:{s:60:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000pattern\\\";s:9:\\\"<!DOCTYPE\\\";s:61:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000callback\\\";N;}}s:47:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000temporaryFile\\\";O:42:\\\"Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\\":1:{s:52:\\\"\\u0000Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\u0000filePath\\\";s:105:\\\"C:\\\\xampp\\\\htdocs\\\\broker\\\\storage\\\\framework\\\\laravel-excel\\\\laravel-excel-tvxJChTwLhBVlKo2jrel0scyUWPfrBiJ.tmp\\\";}s:43:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000sheetName\\\";s:6:\\\"Sheet1\\\";s:45:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000sheetImport\\\";r:5;s:42:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000startRow\\\";i:42;s:43:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000chunkSize\\\";i:20;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:9:\\\"\\u0000*\\u0000events\\\";a:0:{}s:3:\\\"job\\\";N;}\\\";i:2;s:1736:\\\"O:32:\\\"Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\\":21:{s:7:\\\"timeout\\\";N;s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:40:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000import\\\";O:23:\\\"App\\\\Imports\\\\LeadsImport\\\":6:{s:9:\\\"source_id\\\";s:1:\\\"1\\\";s:16:\\\"qualification_id\\\";s:1:\\\"1\\\";s:7:\\\"type_id\\\";s:1:\\\"1\\\";s:16:\\\"communication_id\\\";s:1:\\\"1\\\";s:8:\\\"business\\\";i:1;s:6:\\\"agency\\\";s:1:\\\"1\\\";}s:40:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000reader\\\";O:36:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\\":8:{s:53:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\u0000referenceHelper\\\";O:40:\\\"PhpOffice\\\\PhpSpreadsheet\\\\ReferenceHelper\\\":0:{}s:15:\\\"\\u0000*\\u0000readDataOnly\\\";b:1;s:17:\\\"\\u0000*\\u0000readEmptyCells\\\";b:1;s:16:\\\"\\u0000*\\u0000includeCharts\\\";b:0;s:17:\\\"\\u0000*\\u0000loadSheetsOnly\\\";N;s:13:\\\"\\u0000*\\u0000readFilter\\\";O:49:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\DefaultReadFilter\\\":0:{}s:13:\\\"\\u0000*\\u0000fileHandle\\\";N;s:18:\\\"\\u0000*\\u0000securityScanner\\\";O:51:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\\":2:{s:60:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000pattern\\\";s:9:\\\"<!DOCTYPE\\\";s:61:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000callback\\\";N;}}s:47:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000temporaryFile\\\";O:42:\\\"Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\\":1:{s:52:\\\"\\u0000Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\u0000filePath\\\";s:105:\\\"C:\\\\xampp\\\\htdocs\\\\broker\\\\storage\\\\framework\\\\laravel-excel\\\\laravel-excel-tvxJChTwLhBVlKo2jrel0scyUWPfrBiJ.tmp\\\";}s:43:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000sheetName\\\";s:6:\\\"Sheet1\\\";s:45:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000sheetImport\\\";r:5;s:42:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000startRow\\\";i:62;s:43:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000chunkSize\\\";i:20;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:9:\\\"\\u0000*\\u0000events\\\";a:0:{}s:3:\\\"job\\\";N;}\\\";i:3;s:1736:\\\"O:32:\\\"Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\\":21:{s:7:\\\"timeout\\\";N;s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:40:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000import\\\";O:23:\\\"App\\\\Imports\\\\LeadsImport\\\":6:{s:9:\\\"source_id\\\";s:1:\\\"1\\\";s:16:\\\"qualification_id\\\";s:1:\\\"1\\\";s:7:\\\"type_id\\\";s:1:\\\"1\\\";s:16:\\\"communication_id\\\";s:1:\\\"1\\\";s:8:\\\"business\\\";i:1;s:6:\\\"agency\\\";s:1:\\\"1\\\";}s:40:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000reader\\\";O:36:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\\":8:{s:53:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\u0000referenceHelper\\\";O:40:\\\"PhpOffice\\\\PhpSpreadsheet\\\\ReferenceHelper\\\":0:{}s:15:\\\"\\u0000*\\u0000readDataOnly\\\";b:1;s:17:\\\"\\u0000*\\u0000readEmptyCells\\\";b:1;s:16:\\\"\\u0000*\\u0000includeCharts\\\";b:0;s:17:\\\"\\u0000*\\u0000loadSheetsOnly\\\";N;s:13:\\\"\\u0000*\\u0000readFilter\\\";O:49:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\DefaultReadFilter\\\":0:{}s:13:\\\"\\u0000*\\u0000fileHandle\\\";N;s:18:\\\"\\u0000*\\u0000securityScanner\\\";O:51:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\\":2:{s:60:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000pattern\\\";s:9:\\\"<!DOCTYPE\\\";s:61:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000callback\\\";N;}}s:47:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000temporaryFile\\\";O:42:\\\"Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\\":1:{s:52:\\\"\\u0000Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\u0000filePath\\\";s:105:\\\"C:\\\\xampp\\\\htdocs\\\\broker\\\\storage\\\\framework\\\\laravel-excel\\\\laravel-excel-tvxJChTwLhBVlKo2jrel0scyUWPfrBiJ.tmp\\\";}s:43:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000sheetName\\\";s:6:\\\"Sheet1\\\";s:45:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000sheetImport\\\";r:5;s:42:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000startRow\\\";i:82;s:43:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000chunkSize\\\";i:20;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:9:\\\"\\u0000*\\u0000events\\\";a:0:{}s:3:\\\"job\\\";N;}\\\";i:4;s:1737:\\\"O:32:\\\"Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\\":21:{s:7:\\\"timeout\\\";N;s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:40:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000import\\\";O:23:\\\"App\\\\Imports\\\\LeadsImport\\\":6:{s:9:\\\"source_id\\\";s:1:\\\"1\\\";s:16:\\\"qualification_id\\\";s:1:\\\"1\\\";s:7:\\\"type_id\\\";s:1:\\\"1\\\";s:16:\\\"communication_id\\\";s:1:\\\"1\\\";s:8:\\\"business\\\";i:1;s:6:\\\"agency\\\";s:1:\\\"1\\\";}s:40:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000reader\\\";O:36:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\\":8:{s:53:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\u0000referenceHelper\\\";O:40:\\\"PhpOffice\\\\PhpSpreadsheet\\\\ReferenceHelper\\\":0:{}s:15:\\\"\\u0000*\\u0000readDataOnly\\\";b:1;s:17:\\\"\\u0000*\\u0000readEmptyCells\\\";b:1;s:16:\\\"\\u0000*\\u0000includeCharts\\\";b:0;s:17:\\\"\\u0000*\\u0000loadSheetsOnly\\\";N;s:13:\\\"\\u0000*\\u0000readFilter\\\";O:49:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\DefaultReadFilter\\\":0:{}s:13:\\\"\\u0000*\\u0000fileHandle\\\";N;s:18:\\\"\\u0000*\\u0000securityScanner\\\";O:51:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\\":2:{s:60:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000pattern\\\";s:9:\\\"<!DOCTYPE\\\";s:61:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000callback\\\";N;}}s:47:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000temporaryFile\\\";O:42:\\\"Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\\":1:{s:52:\\\"\\u0000Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\u0000filePath\\\";s:105:\\\"C:\\\\xampp\\\\htdocs\\\\broker\\\\storage\\\\framework\\\\laravel-excel\\\\laravel-excel-tvxJChTwLhBVlKo2jrel0scyUWPfrBiJ.tmp\\\";}s:43:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000sheetName\\\";s:6:\\\"Sheet1\\\";s:45:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000sheetImport\\\";r:5;s:42:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000startRow\\\";i:102;s:43:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000chunkSize\\\";i:20;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:9:\\\"\\u0000*\\u0000events\\\";a:0:{}s:3:\\\"job\\\";N;}\\\";i:5;s:1737:\\\"O:32:\\\"Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\\":21:{s:7:\\\"timeout\\\";N;s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:40:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000import\\\";O:23:\\\"App\\\\Imports\\\\LeadsImport\\\":6:{s:9:\\\"source_id\\\";s:1:\\\"1\\\";s:16:\\\"qualification_id\\\";s:1:\\\"1\\\";s:7:\\\"type_id\\\";s:1:\\\"1\\\";s:16:\\\"communication_id\\\";s:1:\\\"1\\\";s:8:\\\"business\\\";i:1;s:6:\\\"agency\\\";s:1:\\\"1\\\";}s:40:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000reader\\\";O:36:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\\":8:{s:53:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\u0000referenceHelper\\\";O:40:\\\"PhpOffice\\\\PhpSpreadsheet\\\\ReferenceHelper\\\":0:{}s:15:\\\"\\u0000*\\u0000readDataOnly\\\";b:1;s:17:\\\"\\u0000*\\u0000readEmptyCells\\\";b:1;s:16:\\\"\\u0000*\\u0000includeCharts\\\";b:0;s:17:\\\"\\u0000*\\u0000loadSheetsOnly\\\";N;s:13:\\\"\\u0000*\\u0000readFilter\\\";O:49:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\DefaultReadFilter\\\":0:{}s:13:\\\"\\u0000*\\u0000fileHandle\\\";N;s:18:\\\"\\u0000*\\u0000securityScanner\\\";O:51:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\\":2:{s:60:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000pattern\\\";s:9:\\\"<!DOCTYPE\\\";s:61:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000callback\\\";N;}}s:47:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000temporaryFile\\\";O:42:\\\"Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\\":1:{s:52:\\\"\\u0000Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\u0000filePath\\\";s:105:\\\"C:\\\\xampp\\\\htdocs\\\\broker\\\\storage\\\\framework\\\\laravel-excel\\\\laravel-excel-tvxJChTwLhBVlKo2jrel0scyUWPfrBiJ.tmp\\\";}s:43:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000sheetName\\\";s:6:\\\"Sheet1\\\";s:45:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000sheetImport\\\";r:5;s:42:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000startRow\\\";i:122;s:43:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000chunkSize\\\";i:20;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:9:\\\"\\u0000*\\u0000events\\\";a:0:{}s:3:\\\"job\\\";N;}\\\";i:6;s:1737:\\\"O:32:\\\"Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\\":21:{s:7:\\\"timeout\\\";N;s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:40:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000import\\\";O:23:\\\"App\\\\Imports\\\\LeadsImport\\\":6:{s:9:\\\"source_id\\\";s:1:\\\"1\\\";s:16:\\\"qualification_id\\\";s:1:\\\"1\\\";s:7:\\\"type_id\\\";s:1:\\\"1\\\";s:16:\\\"communication_id\\\";s:1:\\\"1\\\";s:8:\\\"business\\\";i:1;s:6:\\\"agency\\\";s:1:\\\"1\\\";}s:40:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000reader\\\";O:36:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\\":8:{s:53:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\u0000referenceHelper\\\";O:40:\\\"PhpOffice\\\\PhpSpreadsheet\\\\ReferenceHelper\\\":0:{}s:15:\\\"\\u0000*\\u0000readDataOnly\\\";b:1;s:17:\\\"\\u0000*\\u0000readEmptyCells\\\";b:1;s:16:\\\"\\u0000*\\u0000includeCharts\\\";b:0;s:17:\\\"\\u0000*\\u0000loadSheetsOnly\\\";N;s:13:\\\"\\u0000*\\u0000readFilter\\\";O:49:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\DefaultReadFilter\\\":0:{}s:13:\\\"\\u0000*\\u0000fileHandle\\\";N;s:18:\\\"\\u0000*\\u0000securityScanner\\\";O:51:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\\":2:{s:60:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000pattern\\\";s:9:\\\"<!DOCTYPE\\\";s:61:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000callback\\\";N;}}s:47:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000temporaryFile\\\";O:42:\\\"Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\\":1:{s:52:\\\"\\u0000Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\u0000filePath\\\";s:105:\\\"C:\\\\xampp\\\\htdocs\\\\broker\\\\storage\\\\framework\\\\laravel-excel\\\\laravel-excel-tvxJChTwLhBVlKo2jrel0scyUWPfrBiJ.tmp\\\";}s:43:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000sheetName\\\";s:6:\\\"Sheet1\\\";s:45:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000sheetImport\\\";r:5;s:42:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000startRow\\\";i:142;s:43:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000chunkSize\\\";i:20;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:9:\\\"\\u0000*\\u0000events\\\";a:0:{}s:3:\\\"job\\\";N;}\\\";i:7;s:1737:\\\"O:32:\\\"Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\\":21:{s:7:\\\"timeout\\\";N;s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:40:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000import\\\";O:23:\\\"App\\\\Imports\\\\LeadsImport\\\":6:{s:9:\\\"source_id\\\";s:1:\\\"1\\\";s:16:\\\"qualification_id\\\";s:1:\\\"1\\\";s:7:\\\"type_id\\\";s:1:\\\"1\\\";s:16:\\\"communication_id\\\";s:1:\\\"1\\\";s:8:\\\"business\\\";i:1;s:6:\\\"agency\\\";s:1:\\\"1\\\";}s:40:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000reader\\\";O:36:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\\":8:{s:53:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\u0000referenceHelper\\\";O:40:\\\"PhpOffice\\\\PhpSpreadsheet\\\\ReferenceHelper\\\":0:{}s:15:\\\"\\u0000*\\u0000readDataOnly\\\";b:1;s:17:\\\"\\u0000*\\u0000readEmptyCells\\\";b:1;s:16:\\\"\\u0000*\\u0000includeCharts\\\";b:0;s:17:\\\"\\u0000*\\u0000loadSheetsOnly\\\";N;s:13:\\\"\\u0000*\\u0000readFilter\\\";O:49:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\DefaultReadFilter\\\":0:{}s:13:\\\"\\u0000*\\u0000fileHandle\\\";N;s:18:\\\"\\u0000*\\u0000securityScanner\\\";O:51:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\\":2:{s:60:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000pattern\\\";s:9:\\\"<!DOCTYPE\\\";s:61:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000callback\\\";N;}}s:47:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000temporaryFile\\\";O:42:\\\"Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\\":1:{s:52:\\\"\\u0000Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\u0000filePath\\\";s:105:\\\"C:\\\\xampp\\\\htdocs\\\\broker\\\\storage\\\\framework\\\\laravel-excel\\\\laravel-excel-tvxJChTwLhBVlKo2jrel0scyUWPfrBiJ.tmp\\\";}s:43:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000sheetName\\\";s:6:\\\"Sheet1\\\";s:45:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000sheetImport\\\";r:5;s:42:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000startRow\\\";i:162;s:43:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000chunkSize\\\";i:20;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:9:\\\"\\u0000*\\u0000events\\\";a:0:{}s:3:\\\"job\\\";N;}\\\";i:8;s:1811:\\\"O:37:\\\"Maatwebsite\\\\Excel\\\\Jobs\\\\AfterImportJob\\\":12:{s:45:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\AfterImportJob\\u0000import\\\";O:23:\\\"App\\\\Imports\\\\LeadsImport\\\":6:{s:9:\\\"source_id\\\";s:1:\\\"1\\\";s:16:\\\"qualification_id\\\";s:1:\\\"1\\\";s:7:\\\"type_id\\\";s:1:\\\"1\\\";s:16:\\\"communication_id\\\";s:1:\\\"1\\\";s:8:\\\"business\\\";i:1;s:6:\\\"agency\\\";s:1:\\\"1\\\";}s:45:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\AfterImportJob\\u0000reader\\\";O:24:\\\"Maatwebsite\\\\Excel\\\\Reader\\\":5:{s:14:\\\"\\u0000*\\u0000spreadsheet\\\";N;s:15:\\\"\\u0000*\\u0000sheetImports\\\";a:0:{}s:14:\\\"\\u0000*\\u0000currentFile\\\";O:42:\\\"Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\\":1:{s:52:\\\"\\u0000Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\u0000filePath\\\";s:105:\\\"C:\\\\xampp\\\\htdocs\\\\broker\\\\storage\\\\framework\\\\laravel-excel\\\\laravel-excel-tvxJChTwLhBVlKo2jrel0scyUWPfrBiJ.tmp\\\";}s:23:\\\"\\u0000*\\u0000temporaryFileFactory\\\";O:44:\\\"Maatwebsite\\\\Excel\\\\Files\\\\TemporaryFileFactory\\\":2:{s:59:\\\"\\u0000Maatwebsite\\\\Excel\\\\Files\\\\TemporaryFileFactory\\u0000temporaryPath\\\";s:54:\\\"C:\\\\xampp\\\\htdocs\\\\broker\\\\storage\\\\framework\\/laravel-excel\\\";s:59:\\\"\\u0000Maatwebsite\\\\Excel\\\\Files\\\\TemporaryFileFactory\\u0000temporaryDisk\\\";N;}s:9:\\\"\\u0000*\\u0000reader\\\";O:36:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\\":8:{s:53:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\u0000referenceHelper\\\";O:40:\\\"PhpOffice\\\\PhpSpreadsheet\\\\ReferenceHelper\\\":0:{}s:15:\\\"\\u0000*\\u0000readDataOnly\\\";b:1;s:17:\\\"\\u0000*\\u0000readEmptyCells\\\";b:1;s:16:\\\"\\u0000*\\u0000includeCharts\\\";b:0;s:17:\\\"\\u0000*\\u0000loadSheetsOnly\\\";N;s:13:\\\"\\u0000*\\u0000readFilter\\\";O:49:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\DefaultReadFilter\\\":0:{}s:13:\\\"\\u0000*\\u0000fileHandle\\\";N;s:18:\\\"\\u0000*\\u0000securityScanner\\\";O:51:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\\":2:{s:60:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000pattern\\\";s:9:\\\"<!DOCTYPE\\\";s:61:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000callback\\\";N;}}}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:9:\\\"\\u0000*\\u0000events\\\";a:0:{}}\\\";}s:9:\\\"\\u0000*\\u0000events\\\";a:0:{}s:3:\\\"job\\\";N;}\"}}', 'PDOException: SQLSTATE[42S22]: Column not found: 1054 Unknown column \'0\' in \'field list\' in C:\\xampp\\htdocs\\broker\\vendor\\doctrine\\dbal\\lib\\Doctrine\\DBAL\\Driver\\PDOConnection.php:79\nStack trace:\n#0 C:\\xampp\\htdocs\\broker\\vendor\\doctrine\\dbal\\lib\\Doctrine\\DBAL\\Driver\\PDOConnection.php(79): PDO->prepare(\'insert into `le...\', Array)\n#1 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(465): Doctrine\\DBAL\\Driver\\PDOConnection->prepare(\'insert into `le...\')\n#2 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(671): Illuminate\\Database\\Connection->Illuminate\\Database\\{closure}(\'insert into `le...\', Array)\n#3 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(638): Illuminate\\Database\\Connection->runQueryCallback(\'insert into `le...\', Array, Object(Closure))\n#4 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(472): Illuminate\\Database\\Connection->run(\'insert into `le...\', Array, Object(Closure))\n#5 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(424): Illuminate\\Database\\Connection->statement(\'insert into `le...\', Array)\n#6 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Processors\\Processor.php(32): Illuminate\\Database\\Connection->insert(\'insert into `le...\', Array)\n#7 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Builder.php(2882): Illuminate\\Database\\Query\\Processors\\Processor->processInsertGetId(Object(Illuminate\\Database\\Query\\Builder), \'insert into `le...\', Array, \'id\')\n#8 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php(1560): Illuminate\\Database\\Query\\Builder->insertGetId(Array, \'id\')\n#9 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1052): Illuminate\\Database\\Eloquent\\Builder->__call(\'insertGetId\', Array)\n#10 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1017): Illuminate\\Database\\Eloquent\\Model->insertAndSetId(Object(Illuminate\\Database\\Eloquent\\Builder), Array)\n#11 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(858): Illuminate\\Database\\Eloquent\\Model->performInsert(Object(Illuminate\\Database\\Eloquent\\Builder))\n#12 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php(816): Illuminate\\Database\\Eloquent\\Model->save()\n#13 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\helpers.php(263): Illuminate\\Database\\Eloquent\\Builder->Illuminate\\Database\\Eloquent\\{closure}(Object(Modules\\Sales\\Entities\\LeadProperty))\n#14 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php(817): tap(Object(Modules\\Sales\\Entities\\LeadProperty), Object(Closure))\n#15 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\ForwardsCalls.php(23): Illuminate\\Database\\Eloquent\\Builder->create(Array)\n#16 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1890): Illuminate\\Database\\Eloquent\\Model->forwardCallTo(Object(Illuminate\\Database\\Eloquent\\Builder), \'create\', Array)\n#17 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1902): Illuminate\\Database\\Eloquent\\Model->__call(\'create\', Array)\n#18 C:\\xampp\\htdocs\\broker\\app\\Imports\\LeadsImport.php(58): Illuminate\\Database\\Eloquent\\Model::__callStatic(\'create\', Array)\n#19 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelManager.php(92): App\\Imports\\LeadsImport->model(Array)\n#20 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelManager.php(108): Maatwebsite\\Excel\\Imports\\ModelManager->toModels(Object(App\\Imports\\LeadsImport), Array, 2)\n#21 [internal function]: Maatwebsite\\Excel\\Imports\\ModelManager->Maatwebsite\\Excel\\Imports\\{closure}(Array, 2)\n#22 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Collections\\Collection.php(642): array_map(Object(Closure), Array, Array)\n#23 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Collections\\Traits\\EnumeratesValues.php(343): Illuminate\\Support\\Collection->map(Object(Closure))\n#24 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelManager.php(109): Illuminate\\Support\\Collection->flatMap(Object(Closure))\n#25 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelManager.php(71): Maatwebsite\\Excel\\Imports\\ModelManager->massFlush(Object(App\\Imports\\LeadsImport))\n#26 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelImporter.php(79): Maatwebsite\\Excel\\Imports\\ModelManager->flush(Object(App\\Imports\\LeadsImport), true)\n#27 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Sheet.php(262): Maatwebsite\\Excel\\Imports\\ModelImporter->import(Object(PhpOffice\\PhpSpreadsheet\\Worksheet\\Worksheet), Object(App\\Imports\\LeadsImport), 2)\n#28 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Jobs\\ReadChunk.php(169): Maatwebsite\\Excel\\Sheet->import(Object(App\\Imports\\LeadsImport), 2)\n#29 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Concerns\\ManagesTransactions.php(29): Maatwebsite\\Excel\\Jobs\\ReadChunk->Maatwebsite\\Excel\\Jobs\\{closure}(Object(Illuminate\\Database\\MySqlConnection))\n#30 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Transactions\\DbTransactionHandler.php(30): Illuminate\\Database\\Connection->transaction(Object(Closure))\n#31 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Jobs\\ReadChunk.php(175): Maatwebsite\\Excel\\Transactions\\DbTransactionHandler->__invoke(Object(Closure))\n#32 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Maatwebsite\\Excel\\Jobs\\ReadChunk->handle(Object(Maatwebsite\\Excel\\Transactions\\DbTransactionHandler))\n#33 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#34 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#35 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#36 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(611): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#37 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#38 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(Maatwebsite\\Excel\\Jobs\\ReadChunk))\n#39 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Maatwebsite\\Excel\\Jobs\\ReadChunk))\n#40 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#41 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(118): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(Maatwebsite\\Excel\\Jobs\\ReadChunk), false)\n#42 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(Maatwebsite\\Excel\\Jobs\\ReadChunk))\n#43 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Maatwebsite\\Excel\\Jobs\\ReadChunk))\n#44 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#45 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Maatwebsite\\Excel\\Jobs\\ReadChunk))\n#46 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#47 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(410): Illuminate\\Queue\\Jobs\\Job->fire()\n#48 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(360): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#49 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(158): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#50 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#51 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#52 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#53 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#54 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#55 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#56 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(611): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#57 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#58 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Command\\Command.php(256): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#59 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#60 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Application.php(971): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#61 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Application.php(290): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#62 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Application.php(166): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#63 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(92): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#64 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#65 C:\\xampp\\htdocs\\broker\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#66 {main}\n\nNext Doctrine\\DBAL\\Driver\\PDO\\Exception: SQLSTATE[42S22]: Column not found: 1054 Unknown column \'0\' in \'field list\' in C:\\xampp\\htdocs\\broker\\vendor\\doctrine\\dbal\\lib\\Doctrine\\DBAL\\Driver\\PDO\\Exception.php:18\nStack trace:\n#0 C:\\xampp\\htdocs\\broker\\vendor\\doctrine\\dbal\\lib\\Doctrine\\DBAL\\Driver\\PDOConnection.php(84): Doctrine\\DBAL\\Driver\\PDO\\Exception::new(Object(PDOException))\n#1 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(465): Doctrine\\DBAL\\Driver\\PDOConnection->prepare(\'insert into `le...\')\n#2 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(671): Illuminate\\Database\\Connection->Illuminate\\Database\\{closure}(\'insert into `le...\', Array)\n#3 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(638): Illuminate\\Database\\Connection->runQueryCallback(\'insert into `le...\', Array, Object(Closure))\n#4 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(472): Illuminate\\Database\\Connection->run(\'insert into `le...\', Array, Object(Closure))\n#5 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(424): Illuminate\\Database\\Connection->statement(\'insert into `le...\', Array)\n#6 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Processors\\Processor.php(32): Illuminate\\Database\\Connection->insert(\'insert into `le...\', Array)\n#7 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Builder.php(2882): Illuminate\\Database\\Query\\Processors\\Processor->processInsertGetId(Object(Illuminate\\Database\\Query\\Builder), \'insert into `le...\', Array, \'id\')\n#8 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php(1560): Illuminate\\Database\\Query\\Builder->insertGetId(Array, \'id\')\n#9 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1052): Illuminate\\Database\\Eloquent\\Builder->__call(\'insertGetId\', Array)\n#10 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1017): Illuminate\\Database\\Eloquent\\Model->insertAndSetId(Object(Illuminate\\Database\\Eloquent\\Builder), Array)\n#11 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(858): Illuminate\\Database\\Eloquent\\Model->performInsert(Object(Illuminate\\Database\\Eloquent\\Builder))\n#12 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php(816): Illuminate\\Database\\Eloquent\\Model->save()\n#13 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\helpers.php(263): Illuminate\\Database\\Eloquent\\Builder->Illuminate\\Database\\Eloquent\\{closure}(Object(Modules\\Sales\\Entities\\LeadProperty))\n#14 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php(817): tap(Object(Modules\\Sales\\Entities\\LeadProperty), Object(Closure))\n#15 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\ForwardsCalls.php(23): Illuminate\\Database\\Eloquent\\Builder->create(Array)\n#16 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1890): Illuminate\\Database\\Eloquent\\Model->forwardCallTo(Object(Illuminate\\Database\\Eloquent\\Builder), \'create\', Array)\n#17 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1902): Illuminate\\Database\\Eloquent\\Model->__call(\'create\', Array)\n#18 C:\\xampp\\htdocs\\broker\\app\\Imports\\LeadsImport.php(58): Illuminate\\Database\\Eloquent\\Model::__callStatic(\'create\', Array)\n#19 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelManager.php(92): App\\Imports\\LeadsImport->model(Array)\n#20 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelManager.php(108): Maatwebsite\\Excel\\Imports\\ModelManager->toModels(Object(App\\Imports\\LeadsImport), Array, 2)\n#21 [internal function]: Maatwebsite\\Excel\\Imports\\ModelManager->Maatwebsite\\Excel\\Imports\\{closure}(Array, 2)\n#22 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Collections\\Collection.php(642): array_map(Object(Closure), Array, Array)\n#23 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Collections\\Traits\\EnumeratesValues.php(343): Illuminate\\Support\\Collection->map(Object(Closure))\n#24 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelManager.php(109): Illuminate\\Support\\Collection->flatMap(Object(Closure))\n#25 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelManager.php(71): Maatwebsite\\Excel\\Imports\\ModelManager->massFlush(Object(App\\Imports\\LeadsImport))\n#26 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelImporter.php(79): Maatwebsite\\Excel\\Imports\\ModelManager->flush(Object(App\\Imports\\LeadsImport), true)\n#27 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Sheet.php(262): Maatwebsite\\Excel\\Imports\\ModelImporter->import(Object(PhpOffice\\PhpSpreadsheet\\Worksheet\\Worksheet), Object(App\\Imports\\LeadsImport), 2)\n#28 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Jobs\\ReadChunk.php(169): Maatwebsite\\Excel\\Sheet->import(Object(App\\Imports\\LeadsImport), 2)\n#29 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Concerns\\ManagesTransactions.php(29): Maatwebsite\\Excel\\Jobs\\ReadChunk->Maatwebsite\\Excel\\Jobs\\{closure}(Object(Illuminate\\Database\\MySqlConnection))\n#30 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Transactions\\DbTransactionHandler.php(30): Illuminate\\Database\\Connection->transaction(Object(Closure))\n#31 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Jobs\\ReadChunk.php(175): Maatwebsite\\Excel\\Transactions\\DbTransactionHandler->__invoke(Object(Closure))\n#32 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Maatwebsite\\Excel\\Jobs\\ReadChunk->handle(Object(Maatwebsite\\Excel\\Transactions\\DbTransactionHandler))\n#33 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#34 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#35 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#36 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(611): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#37 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#38 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(Maatwebsite\\Excel\\Jobs\\ReadChunk))\n#39 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Maatwebsite\\Excel\\Jobs\\ReadChunk))\n#40 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#41 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(118): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(Maatwebsite\\Excel\\Jobs\\ReadChunk), false)\n#42 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(Maatwebsite\\Excel\\Jobs\\ReadChunk))\n#43 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Maatwebsite\\Excel\\Jobs\\ReadChunk))\n#44 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#45 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Maatwebsite\\Excel\\Jobs\\ReadChunk))\n#46 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#47 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(410): Illuminate\\Queue\\Jobs\\Job->fire()\n#48 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(360): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#49 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(158): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#50 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#51 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#52 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#53 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#54 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#55 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#56 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(611): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#57 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#58 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Command\\Command.php(256): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#59 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#60 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Application.php(971): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#61 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Application.php(290): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#62 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Application.php(166): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#63 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(92): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#64 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#65 C:\\xampp\\htdocs\\broker\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#66 {main}\n\nNext Illuminate\\Database\\QueryException: SQLSTATE[42S22]: Column not found: 1054 Unknown column \'0\' in \'field list\' (SQL: insert into `lead_property` (`0`, `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `9`, `updated_at`, `created_at`) values (name_en, Commercial, name_ar, Commercial, slug, commercial, agency_id, 1, business_id , 1, 2021-05-05 10:41:25, 2021-05-05 10:41:25)) in C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php:678\nStack trace:\n#0 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(638): Illuminate\\Database\\Connection->runQueryCallback(\'insert into `le...\', Array, Object(Closure))\n#1 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(472): Illuminate\\Database\\Connection->run(\'insert into `le...\', Array, Object(Closure))\n#2 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(424): Illuminate\\Database\\Connection->statement(\'insert into `le...\', Array)\n#3 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Processors\\Processor.php(32): Illuminate\\Database\\Connection->insert(\'insert into `le...\', Array)\n#4 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Builder.php(2882): Illuminate\\Database\\Query\\Processors\\Processor->processInsertGetId(Object(Illuminate\\Database\\Query\\Builder), \'insert into `le...\', Array, \'id\')\n#5 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php(1560): Illuminate\\Database\\Query\\Builder->insertGetId(Array, \'id\')\n#6 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1052): Illuminate\\Database\\Eloquent\\Builder->__call(\'insertGetId\', Array)\n#7 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1017): Illuminate\\Database\\Eloquent\\Model->insertAndSetId(Object(Illuminate\\Database\\Eloquent\\Builder), Array)\n#8 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(858): Illuminate\\Database\\Eloquent\\Model->performInsert(Object(Illuminate\\Database\\Eloquent\\Builder))\n#9 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php(816): Illuminate\\Database\\Eloquent\\Model->save()\n#10 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\helpers.php(263): Illuminate\\Database\\Eloquent\\Builder->Illuminate\\Database\\Eloquent\\{closure}(Object(Modules\\Sales\\Entities\\LeadProperty))\n#11 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php(817): tap(Object(Modules\\Sales\\Entities\\LeadProperty), Object(Closure))\n#12 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\ForwardsCalls.php(23): Illuminate\\Database\\Eloquent\\Builder->create(Array)\n#13 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1890): Illuminate\\Database\\Eloquent\\Model->forwardCallTo(Object(Illuminate\\Database\\Eloquent\\Builder), \'create\', Array)\n#14 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1902): Illuminate\\Database\\Eloquent\\Model->__call(\'create\', Array)\n#15 C:\\xampp\\htdocs\\broker\\app\\Imports\\LeadsImport.php(58): Illuminate\\Database\\Eloquent\\Model::__callStatic(\'create\', Array)\n#16 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelManager.php(92): App\\Imports\\LeadsImport->model(Array)\n#17 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelManager.php(108): Maatwebsite\\Excel\\Imports\\ModelManager->toModels(Object(App\\Imports\\LeadsImport), Array, 2)\n#18 [internal function]: Maatwebsite\\Excel\\Imports\\ModelManager->Maatwebsite\\Excel\\Imports\\{closure}(Array, 2)\n#19 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Collections\\Collection.php(642): array_map(Object(Closure), Array, Array)\n#20 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Collections\\Traits\\EnumeratesValues.php(343): Illuminate\\Support\\Collection->map(Object(Closure))\n#21 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelManager.php(109): Illuminate\\Support\\Collection->flatMap(Object(Closure))\n#22 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelManager.php(71): Maatwebsite\\Excel\\Imports\\ModelManager->massFlush(Object(App\\Imports\\LeadsImport))\n#23 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelImporter.php(79): Maatwebsite\\Excel\\Imports\\ModelManager->flush(Object(App\\Imports\\LeadsImport), true)\n#24 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Sheet.php(262): Maatwebsite\\Excel\\Imports\\ModelImporter->import(Object(PhpOffice\\PhpSpreadsheet\\Worksheet\\Worksheet), Object(App\\Imports\\LeadsImport), 2)\n#25 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Jobs\\ReadChunk.php(169): Maatwebsite\\Excel\\Sheet->import(Object(App\\Imports\\LeadsImport), 2)\n#26 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Concerns\\ManagesTransactions.php(29): Maatwebsite\\Excel\\Jobs\\ReadChunk->Maatwebsite\\Excel\\Jobs\\{closure}(Object(Illuminate\\Database\\MySqlConnection))\n#27 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Transactions\\DbTransactionHandler.php(30): Illuminate\\Database\\Connection->transaction(Object(Closure))\n#28 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Jobs\\ReadChunk.php(175): Maatwebsite\\Excel\\Transactions\\DbTransactionHandler->__invoke(Object(Closure))\n#29 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Maatwebsite\\Excel\\Jobs\\ReadChunk->handle(Object(Maatwebsite\\Excel\\Transactions\\DbTransactionHandler))\n#30 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#31 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#32 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#33 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(611): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#34 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#35 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(Maatwebsite\\Excel\\Jobs\\ReadChunk))\n#36 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Maatwebsite\\Excel\\Jobs\\ReadChunk))\n#37 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#38 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(118): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(Maatwebsite\\Excel\\Jobs\\ReadChunk), false)\n#39 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(Maatwebsite\\Excel\\Jobs\\ReadChunk))\n#40 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Maatwebsite\\Excel\\Jobs\\ReadChunk))\n#41 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#42 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Maatwebsite\\Excel\\Jobs\\ReadChunk))\n#43 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#44 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(410): Illuminate\\Queue\\Jobs\\Job->fire()\n#45 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(360): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#46 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(158): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#47 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#48 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#49 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#50 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#51 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#52 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#53 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(611): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#54 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#55 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Command\\Command.php(256): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#56 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#57 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Application.php(971): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#58 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Application.php(290): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#59 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Application.php(166): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#60 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(92): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#61 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#62 C:\\xampp\\htdocs\\broker\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#63 {main}', '2021-05-05 08:41:25');
INSERT INTO `failed_jobs` (`id`, `connection`, `queue`, `payload`, `exception`, `failed_at`) VALUES
(6, 'database', 'default', '{\"uuid\":\"c17b53ec-82a8-4ec8-997a-932014ba070d\",\"displayName\":\"Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\",\"command\":\"O:32:\\\"Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\\":21:{s:7:\\\"timeout\\\";N;s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:40:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000import\\\";O:23:\\\"App\\\\Imports\\\\LeadsImport\\\":6:{s:9:\\\"source_id\\\";s:1:\\\"1\\\";s:16:\\\"qualification_id\\\";s:1:\\\"1\\\";s:7:\\\"type_id\\\";s:1:\\\"1\\\";s:16:\\\"communication_id\\\";s:1:\\\"1\\\";s:8:\\\"business\\\";i:1;s:6:\\\"agency\\\";s:1:\\\"1\\\";}s:40:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000reader\\\";O:36:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\\":8:{s:53:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\u0000referenceHelper\\\";O:40:\\\"PhpOffice\\\\PhpSpreadsheet\\\\ReferenceHelper\\\":0:{}s:15:\\\"\\u0000*\\u0000readDataOnly\\\";b:1;s:17:\\\"\\u0000*\\u0000readEmptyCells\\\";b:1;s:16:\\\"\\u0000*\\u0000includeCharts\\\";b:0;s:17:\\\"\\u0000*\\u0000loadSheetsOnly\\\";N;s:13:\\\"\\u0000*\\u0000readFilter\\\";O:49:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\DefaultReadFilter\\\":0:{}s:13:\\\"\\u0000*\\u0000fileHandle\\\";N;s:18:\\\"\\u0000*\\u0000securityScanner\\\";O:51:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\\":2:{s:60:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000pattern\\\";s:9:\\\"<!DOCTYPE\\\";s:61:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000callback\\\";N;}}s:47:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000temporaryFile\\\";O:42:\\\"Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\\":1:{s:52:\\\"\\u0000Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\u0000filePath\\\";s:105:\\\"C:\\\\xampp\\\\htdocs\\\\broker\\\\storage\\\\framework\\\\laravel-excel\\\\laravel-excel-GovxhXG0ywxK7f0ltSl3ReOzVYVv9dvk.tmp\\\";}s:43:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000sheetName\\\";s:6:\\\"Sheet1\\\";s:45:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000sheetImport\\\";r:5;s:42:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000startRow\\\";i:2;s:43:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000chunkSize\\\";i:20;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:9:{i:0;s:1736:\\\"O:32:\\\"Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\\":21:{s:7:\\\"timeout\\\";N;s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:40:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000import\\\";O:23:\\\"App\\\\Imports\\\\LeadsImport\\\":6:{s:9:\\\"source_id\\\";s:1:\\\"1\\\";s:16:\\\"qualification_id\\\";s:1:\\\"1\\\";s:7:\\\"type_id\\\";s:1:\\\"1\\\";s:16:\\\"communication_id\\\";s:1:\\\"1\\\";s:8:\\\"business\\\";i:1;s:6:\\\"agency\\\";s:1:\\\"1\\\";}s:40:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000reader\\\";O:36:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\\":8:{s:53:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\u0000referenceHelper\\\";O:40:\\\"PhpOffice\\\\PhpSpreadsheet\\\\ReferenceHelper\\\":0:{}s:15:\\\"\\u0000*\\u0000readDataOnly\\\";b:1;s:17:\\\"\\u0000*\\u0000readEmptyCells\\\";b:1;s:16:\\\"\\u0000*\\u0000includeCharts\\\";b:0;s:17:\\\"\\u0000*\\u0000loadSheetsOnly\\\";N;s:13:\\\"\\u0000*\\u0000readFilter\\\";O:49:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\DefaultReadFilter\\\":0:{}s:13:\\\"\\u0000*\\u0000fileHandle\\\";N;s:18:\\\"\\u0000*\\u0000securityScanner\\\";O:51:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\\":2:{s:60:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000pattern\\\";s:9:\\\"<!DOCTYPE\\\";s:61:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000callback\\\";N;}}s:47:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000temporaryFile\\\";O:42:\\\"Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\\":1:{s:52:\\\"\\u0000Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\u0000filePath\\\";s:105:\\\"C:\\\\xampp\\\\htdocs\\\\broker\\\\storage\\\\framework\\\\laravel-excel\\\\laravel-excel-GovxhXG0ywxK7f0ltSl3ReOzVYVv9dvk.tmp\\\";}s:43:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000sheetName\\\";s:6:\\\"Sheet1\\\";s:45:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000sheetImport\\\";r:5;s:42:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000startRow\\\";i:22;s:43:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000chunkSize\\\";i:20;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:9:\\\"\\u0000*\\u0000events\\\";a:0:{}s:3:\\\"job\\\";N;}\\\";i:1;s:1736:\\\"O:32:\\\"Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\\":21:{s:7:\\\"timeout\\\";N;s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:40:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000import\\\";O:23:\\\"App\\\\Imports\\\\LeadsImport\\\":6:{s:9:\\\"source_id\\\";s:1:\\\"1\\\";s:16:\\\"qualification_id\\\";s:1:\\\"1\\\";s:7:\\\"type_id\\\";s:1:\\\"1\\\";s:16:\\\"communication_id\\\";s:1:\\\"1\\\";s:8:\\\"business\\\";i:1;s:6:\\\"agency\\\";s:1:\\\"1\\\";}s:40:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000reader\\\";O:36:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\\":8:{s:53:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\u0000referenceHelper\\\";O:40:\\\"PhpOffice\\\\PhpSpreadsheet\\\\ReferenceHelper\\\":0:{}s:15:\\\"\\u0000*\\u0000readDataOnly\\\";b:1;s:17:\\\"\\u0000*\\u0000readEmptyCells\\\";b:1;s:16:\\\"\\u0000*\\u0000includeCharts\\\";b:0;s:17:\\\"\\u0000*\\u0000loadSheetsOnly\\\";N;s:13:\\\"\\u0000*\\u0000readFilter\\\";O:49:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\DefaultReadFilter\\\":0:{}s:13:\\\"\\u0000*\\u0000fileHandle\\\";N;s:18:\\\"\\u0000*\\u0000securityScanner\\\";O:51:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\\":2:{s:60:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000pattern\\\";s:9:\\\"<!DOCTYPE\\\";s:61:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000callback\\\";N;}}s:47:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000temporaryFile\\\";O:42:\\\"Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\\":1:{s:52:\\\"\\u0000Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\u0000filePath\\\";s:105:\\\"C:\\\\xampp\\\\htdocs\\\\broker\\\\storage\\\\framework\\\\laravel-excel\\\\laravel-excel-GovxhXG0ywxK7f0ltSl3ReOzVYVv9dvk.tmp\\\";}s:43:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000sheetName\\\";s:6:\\\"Sheet1\\\";s:45:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000sheetImport\\\";r:5;s:42:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000startRow\\\";i:42;s:43:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000chunkSize\\\";i:20;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:9:\\\"\\u0000*\\u0000events\\\";a:0:{}s:3:\\\"job\\\";N;}\\\";i:2;s:1736:\\\"O:32:\\\"Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\\":21:{s:7:\\\"timeout\\\";N;s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:40:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000import\\\";O:23:\\\"App\\\\Imports\\\\LeadsImport\\\":6:{s:9:\\\"source_id\\\";s:1:\\\"1\\\";s:16:\\\"qualification_id\\\";s:1:\\\"1\\\";s:7:\\\"type_id\\\";s:1:\\\"1\\\";s:16:\\\"communication_id\\\";s:1:\\\"1\\\";s:8:\\\"business\\\";i:1;s:6:\\\"agency\\\";s:1:\\\"1\\\";}s:40:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000reader\\\";O:36:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\\":8:{s:53:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\u0000referenceHelper\\\";O:40:\\\"PhpOffice\\\\PhpSpreadsheet\\\\ReferenceHelper\\\":0:{}s:15:\\\"\\u0000*\\u0000readDataOnly\\\";b:1;s:17:\\\"\\u0000*\\u0000readEmptyCells\\\";b:1;s:16:\\\"\\u0000*\\u0000includeCharts\\\";b:0;s:17:\\\"\\u0000*\\u0000loadSheetsOnly\\\";N;s:13:\\\"\\u0000*\\u0000readFilter\\\";O:49:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\DefaultReadFilter\\\":0:{}s:13:\\\"\\u0000*\\u0000fileHandle\\\";N;s:18:\\\"\\u0000*\\u0000securityScanner\\\";O:51:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\\":2:{s:60:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000pattern\\\";s:9:\\\"<!DOCTYPE\\\";s:61:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000callback\\\";N;}}s:47:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000temporaryFile\\\";O:42:\\\"Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\\":1:{s:52:\\\"\\u0000Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\u0000filePath\\\";s:105:\\\"C:\\\\xampp\\\\htdocs\\\\broker\\\\storage\\\\framework\\\\laravel-excel\\\\laravel-excel-GovxhXG0ywxK7f0ltSl3ReOzVYVv9dvk.tmp\\\";}s:43:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000sheetName\\\";s:6:\\\"Sheet1\\\";s:45:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000sheetImport\\\";r:5;s:42:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000startRow\\\";i:62;s:43:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000chunkSize\\\";i:20;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:9:\\\"\\u0000*\\u0000events\\\";a:0:{}s:3:\\\"job\\\";N;}\\\";i:3;s:1736:\\\"O:32:\\\"Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\\":21:{s:7:\\\"timeout\\\";N;s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:40:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000import\\\";O:23:\\\"App\\\\Imports\\\\LeadsImport\\\":6:{s:9:\\\"source_id\\\";s:1:\\\"1\\\";s:16:\\\"qualification_id\\\";s:1:\\\"1\\\";s:7:\\\"type_id\\\";s:1:\\\"1\\\";s:16:\\\"communication_id\\\";s:1:\\\"1\\\";s:8:\\\"business\\\";i:1;s:6:\\\"agency\\\";s:1:\\\"1\\\";}s:40:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000reader\\\";O:36:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\\":8:{s:53:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\u0000referenceHelper\\\";O:40:\\\"PhpOffice\\\\PhpSpreadsheet\\\\ReferenceHelper\\\":0:{}s:15:\\\"\\u0000*\\u0000readDataOnly\\\";b:1;s:17:\\\"\\u0000*\\u0000readEmptyCells\\\";b:1;s:16:\\\"\\u0000*\\u0000includeCharts\\\";b:0;s:17:\\\"\\u0000*\\u0000loadSheetsOnly\\\";N;s:13:\\\"\\u0000*\\u0000readFilter\\\";O:49:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\DefaultReadFilter\\\":0:{}s:13:\\\"\\u0000*\\u0000fileHandle\\\";N;s:18:\\\"\\u0000*\\u0000securityScanner\\\";O:51:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\\":2:{s:60:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000pattern\\\";s:9:\\\"<!DOCTYPE\\\";s:61:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000callback\\\";N;}}s:47:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000temporaryFile\\\";O:42:\\\"Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\\":1:{s:52:\\\"\\u0000Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\u0000filePath\\\";s:105:\\\"C:\\\\xampp\\\\htdocs\\\\broker\\\\storage\\\\framework\\\\laravel-excel\\\\laravel-excel-GovxhXG0ywxK7f0ltSl3ReOzVYVv9dvk.tmp\\\";}s:43:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000sheetName\\\";s:6:\\\"Sheet1\\\";s:45:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000sheetImport\\\";r:5;s:42:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000startRow\\\";i:82;s:43:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000chunkSize\\\";i:20;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:9:\\\"\\u0000*\\u0000events\\\";a:0:{}s:3:\\\"job\\\";N;}\\\";i:4;s:1737:\\\"O:32:\\\"Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\\":21:{s:7:\\\"timeout\\\";N;s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:40:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000import\\\";O:23:\\\"App\\\\Imports\\\\LeadsImport\\\":6:{s:9:\\\"source_id\\\";s:1:\\\"1\\\";s:16:\\\"qualification_id\\\";s:1:\\\"1\\\";s:7:\\\"type_id\\\";s:1:\\\"1\\\";s:16:\\\"communication_id\\\";s:1:\\\"1\\\";s:8:\\\"business\\\";i:1;s:6:\\\"agency\\\";s:1:\\\"1\\\";}s:40:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000reader\\\";O:36:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\\":8:{s:53:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\u0000referenceHelper\\\";O:40:\\\"PhpOffice\\\\PhpSpreadsheet\\\\ReferenceHelper\\\":0:{}s:15:\\\"\\u0000*\\u0000readDataOnly\\\";b:1;s:17:\\\"\\u0000*\\u0000readEmptyCells\\\";b:1;s:16:\\\"\\u0000*\\u0000includeCharts\\\";b:0;s:17:\\\"\\u0000*\\u0000loadSheetsOnly\\\";N;s:13:\\\"\\u0000*\\u0000readFilter\\\";O:49:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\DefaultReadFilter\\\":0:{}s:13:\\\"\\u0000*\\u0000fileHandle\\\";N;s:18:\\\"\\u0000*\\u0000securityScanner\\\";O:51:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\\":2:{s:60:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000pattern\\\";s:9:\\\"<!DOCTYPE\\\";s:61:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000callback\\\";N;}}s:47:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000temporaryFile\\\";O:42:\\\"Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\\":1:{s:52:\\\"\\u0000Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\u0000filePath\\\";s:105:\\\"C:\\\\xampp\\\\htdocs\\\\broker\\\\storage\\\\framework\\\\laravel-excel\\\\laravel-excel-GovxhXG0ywxK7f0ltSl3ReOzVYVv9dvk.tmp\\\";}s:43:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000sheetName\\\";s:6:\\\"Sheet1\\\";s:45:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000sheetImport\\\";r:5;s:42:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000startRow\\\";i:102;s:43:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000chunkSize\\\";i:20;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:9:\\\"\\u0000*\\u0000events\\\";a:0:{}s:3:\\\"job\\\";N;}\\\";i:5;s:1737:\\\"O:32:\\\"Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\\":21:{s:7:\\\"timeout\\\";N;s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:40:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000import\\\";O:23:\\\"App\\\\Imports\\\\LeadsImport\\\":6:{s:9:\\\"source_id\\\";s:1:\\\"1\\\";s:16:\\\"qualification_id\\\";s:1:\\\"1\\\";s:7:\\\"type_id\\\";s:1:\\\"1\\\";s:16:\\\"communication_id\\\";s:1:\\\"1\\\";s:8:\\\"business\\\";i:1;s:6:\\\"agency\\\";s:1:\\\"1\\\";}s:40:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000reader\\\";O:36:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\\":8:{s:53:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\u0000referenceHelper\\\";O:40:\\\"PhpOffice\\\\PhpSpreadsheet\\\\ReferenceHelper\\\":0:{}s:15:\\\"\\u0000*\\u0000readDataOnly\\\";b:1;s:17:\\\"\\u0000*\\u0000readEmptyCells\\\";b:1;s:16:\\\"\\u0000*\\u0000includeCharts\\\";b:0;s:17:\\\"\\u0000*\\u0000loadSheetsOnly\\\";N;s:13:\\\"\\u0000*\\u0000readFilter\\\";O:49:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\DefaultReadFilter\\\":0:{}s:13:\\\"\\u0000*\\u0000fileHandle\\\";N;s:18:\\\"\\u0000*\\u0000securityScanner\\\";O:51:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\\":2:{s:60:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000pattern\\\";s:9:\\\"<!DOCTYPE\\\";s:61:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000callback\\\";N;}}s:47:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000temporaryFile\\\";O:42:\\\"Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\\":1:{s:52:\\\"\\u0000Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\u0000filePath\\\";s:105:\\\"C:\\\\xampp\\\\htdocs\\\\broker\\\\storage\\\\framework\\\\laravel-excel\\\\laravel-excel-GovxhXG0ywxK7f0ltSl3ReOzVYVv9dvk.tmp\\\";}s:43:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000sheetName\\\";s:6:\\\"Sheet1\\\";s:45:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000sheetImport\\\";r:5;s:42:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000startRow\\\";i:122;s:43:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000chunkSize\\\";i:20;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:9:\\\"\\u0000*\\u0000events\\\";a:0:{}s:3:\\\"job\\\";N;}\\\";i:6;s:1737:\\\"O:32:\\\"Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\\":21:{s:7:\\\"timeout\\\";N;s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:40:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000import\\\";O:23:\\\"App\\\\Imports\\\\LeadsImport\\\":6:{s:9:\\\"source_id\\\";s:1:\\\"1\\\";s:16:\\\"qualification_id\\\";s:1:\\\"1\\\";s:7:\\\"type_id\\\";s:1:\\\"1\\\";s:16:\\\"communication_id\\\";s:1:\\\"1\\\";s:8:\\\"business\\\";i:1;s:6:\\\"agency\\\";s:1:\\\"1\\\";}s:40:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000reader\\\";O:36:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\\":8:{s:53:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\u0000referenceHelper\\\";O:40:\\\"PhpOffice\\\\PhpSpreadsheet\\\\ReferenceHelper\\\":0:{}s:15:\\\"\\u0000*\\u0000readDataOnly\\\";b:1;s:17:\\\"\\u0000*\\u0000readEmptyCells\\\";b:1;s:16:\\\"\\u0000*\\u0000includeCharts\\\";b:0;s:17:\\\"\\u0000*\\u0000loadSheetsOnly\\\";N;s:13:\\\"\\u0000*\\u0000readFilter\\\";O:49:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\DefaultReadFilter\\\":0:{}s:13:\\\"\\u0000*\\u0000fileHandle\\\";N;s:18:\\\"\\u0000*\\u0000securityScanner\\\";O:51:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\\":2:{s:60:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000pattern\\\";s:9:\\\"<!DOCTYPE\\\";s:61:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000callback\\\";N;}}s:47:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000temporaryFile\\\";O:42:\\\"Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\\":1:{s:52:\\\"\\u0000Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\u0000filePath\\\";s:105:\\\"C:\\\\xampp\\\\htdocs\\\\broker\\\\storage\\\\framework\\\\laravel-excel\\\\laravel-excel-GovxhXG0ywxK7f0ltSl3ReOzVYVv9dvk.tmp\\\";}s:43:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000sheetName\\\";s:6:\\\"Sheet1\\\";s:45:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000sheetImport\\\";r:5;s:42:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000startRow\\\";i:142;s:43:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000chunkSize\\\";i:20;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:9:\\\"\\u0000*\\u0000events\\\";a:0:{}s:3:\\\"job\\\";N;}\\\";i:7;s:1737:\\\"O:32:\\\"Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\\":21:{s:7:\\\"timeout\\\";N;s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:40:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000import\\\";O:23:\\\"App\\\\Imports\\\\LeadsImport\\\":6:{s:9:\\\"source_id\\\";s:1:\\\"1\\\";s:16:\\\"qualification_id\\\";s:1:\\\"1\\\";s:7:\\\"type_id\\\";s:1:\\\"1\\\";s:16:\\\"communication_id\\\";s:1:\\\"1\\\";s:8:\\\"business\\\";i:1;s:6:\\\"agency\\\";s:1:\\\"1\\\";}s:40:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000reader\\\";O:36:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\\":8:{s:53:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\u0000referenceHelper\\\";O:40:\\\"PhpOffice\\\\PhpSpreadsheet\\\\ReferenceHelper\\\":0:{}s:15:\\\"\\u0000*\\u0000readDataOnly\\\";b:1;s:17:\\\"\\u0000*\\u0000readEmptyCells\\\";b:1;s:16:\\\"\\u0000*\\u0000includeCharts\\\";b:0;s:17:\\\"\\u0000*\\u0000loadSheetsOnly\\\";N;s:13:\\\"\\u0000*\\u0000readFilter\\\";O:49:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\DefaultReadFilter\\\":0:{}s:13:\\\"\\u0000*\\u0000fileHandle\\\";N;s:18:\\\"\\u0000*\\u0000securityScanner\\\";O:51:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\\":2:{s:60:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000pattern\\\";s:9:\\\"<!DOCTYPE\\\";s:61:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000callback\\\";N;}}s:47:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000temporaryFile\\\";O:42:\\\"Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\\":1:{s:52:\\\"\\u0000Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\u0000filePath\\\";s:105:\\\"C:\\\\xampp\\\\htdocs\\\\broker\\\\storage\\\\framework\\\\laravel-excel\\\\laravel-excel-GovxhXG0ywxK7f0ltSl3ReOzVYVv9dvk.tmp\\\";}s:43:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000sheetName\\\";s:6:\\\"Sheet1\\\";s:45:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000sheetImport\\\";r:5;s:42:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000startRow\\\";i:162;s:43:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000chunkSize\\\";i:20;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:9:\\\"\\u0000*\\u0000events\\\";a:0:{}s:3:\\\"job\\\";N;}\\\";i:8;s:1811:\\\"O:37:\\\"Maatwebsite\\\\Excel\\\\Jobs\\\\AfterImportJob\\\":12:{s:45:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\AfterImportJob\\u0000import\\\";O:23:\\\"App\\\\Imports\\\\LeadsImport\\\":6:{s:9:\\\"source_id\\\";s:1:\\\"1\\\";s:16:\\\"qualification_id\\\";s:1:\\\"1\\\";s:7:\\\"type_id\\\";s:1:\\\"1\\\";s:16:\\\"communication_id\\\";s:1:\\\"1\\\";s:8:\\\"business\\\";i:1;s:6:\\\"agency\\\";s:1:\\\"1\\\";}s:45:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\AfterImportJob\\u0000reader\\\";O:24:\\\"Maatwebsite\\\\Excel\\\\Reader\\\":5:{s:14:\\\"\\u0000*\\u0000spreadsheet\\\";N;s:15:\\\"\\u0000*\\u0000sheetImports\\\";a:0:{}s:14:\\\"\\u0000*\\u0000currentFile\\\";O:42:\\\"Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\\":1:{s:52:\\\"\\u0000Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\u0000filePath\\\";s:105:\\\"C:\\\\xampp\\\\htdocs\\\\broker\\\\storage\\\\framework\\\\laravel-excel\\\\laravel-excel-GovxhXG0ywxK7f0ltSl3ReOzVYVv9dvk.tmp\\\";}s:23:\\\"\\u0000*\\u0000temporaryFileFactory\\\";O:44:\\\"Maatwebsite\\\\Excel\\\\Files\\\\TemporaryFileFactory\\\":2:{s:59:\\\"\\u0000Maatwebsite\\\\Excel\\\\Files\\\\TemporaryFileFactory\\u0000temporaryPath\\\";s:54:\\\"C:\\\\xampp\\\\htdocs\\\\broker\\\\storage\\\\framework\\/laravel-excel\\\";s:59:\\\"\\u0000Maatwebsite\\\\Excel\\\\Files\\\\TemporaryFileFactory\\u0000temporaryDisk\\\";N;}s:9:\\\"\\u0000*\\u0000reader\\\";O:36:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\\":8:{s:53:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\u0000referenceHelper\\\";O:40:\\\"PhpOffice\\\\PhpSpreadsheet\\\\ReferenceHelper\\\":0:{}s:15:\\\"\\u0000*\\u0000readDataOnly\\\";b:1;s:17:\\\"\\u0000*\\u0000readEmptyCells\\\";b:1;s:16:\\\"\\u0000*\\u0000includeCharts\\\";b:0;s:17:\\\"\\u0000*\\u0000loadSheetsOnly\\\";N;s:13:\\\"\\u0000*\\u0000readFilter\\\";O:49:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\DefaultReadFilter\\\":0:{}s:13:\\\"\\u0000*\\u0000fileHandle\\\";N;s:18:\\\"\\u0000*\\u0000securityScanner\\\";O:51:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\\":2:{s:60:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000pattern\\\";s:9:\\\"<!DOCTYPE\\\";s:61:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000callback\\\";N;}}}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:9:\\\"\\u0000*\\u0000events\\\";a:0:{}}\\\";}s:9:\\\"\\u0000*\\u0000events\\\";a:0:{}s:3:\\\"job\\\";N;}\"}}', 'PDOException: SQLSTATE[42S22]: Column not found: 1054 Unknown column \'0\' in \'field list\' in C:\\xampp\\htdocs\\broker\\vendor\\doctrine\\dbal\\lib\\Doctrine\\DBAL\\Driver\\PDOConnection.php:79\nStack trace:\n#0 C:\\xampp\\htdocs\\broker\\vendor\\doctrine\\dbal\\lib\\Doctrine\\DBAL\\Driver\\PDOConnection.php(79): PDO->prepare(\'insert into `le...\', Array)\n#1 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(465): Doctrine\\DBAL\\Driver\\PDOConnection->prepare(\'insert into `le...\')\n#2 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(671): Illuminate\\Database\\Connection->Illuminate\\Database\\{closure}(\'insert into `le...\', Array)\n#3 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(638): Illuminate\\Database\\Connection->runQueryCallback(\'insert into `le...\', Array, Object(Closure))\n#4 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(472): Illuminate\\Database\\Connection->run(\'insert into `le...\', Array, Object(Closure))\n#5 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(424): Illuminate\\Database\\Connection->statement(\'insert into `le...\', Array)\n#6 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Processors\\Processor.php(32): Illuminate\\Database\\Connection->insert(\'insert into `le...\', Array)\n#7 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Builder.php(2882): Illuminate\\Database\\Query\\Processors\\Processor->processInsertGetId(Object(Illuminate\\Database\\Query\\Builder), \'insert into `le...\', Array, \'id\')\n#8 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php(1560): Illuminate\\Database\\Query\\Builder->insertGetId(Array, \'id\')\n#9 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1052): Illuminate\\Database\\Eloquent\\Builder->__call(\'insertGetId\', Array)\n#10 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1017): Illuminate\\Database\\Eloquent\\Model->insertAndSetId(Object(Illuminate\\Database\\Eloquent\\Builder), Array)\n#11 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(858): Illuminate\\Database\\Eloquent\\Model->performInsert(Object(Illuminate\\Database\\Eloquent\\Builder))\n#12 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php(816): Illuminate\\Database\\Eloquent\\Model->save()\n#13 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\helpers.php(263): Illuminate\\Database\\Eloquent\\Builder->Illuminate\\Database\\Eloquent\\{closure}(Object(Modules\\Sales\\Entities\\LeadProperty))\n#14 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php(817): tap(Object(Modules\\Sales\\Entities\\LeadProperty), Object(Closure))\n#15 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\ForwardsCalls.php(23): Illuminate\\Database\\Eloquent\\Builder->create(Array)\n#16 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1890): Illuminate\\Database\\Eloquent\\Model->forwardCallTo(Object(Illuminate\\Database\\Eloquent\\Builder), \'create\', Array)\n#17 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1902): Illuminate\\Database\\Eloquent\\Model->__call(\'create\', Array)\n#18 C:\\xampp\\htdocs\\broker\\app\\Imports\\LeadsImport.php(58): Illuminate\\Database\\Eloquent\\Model::__callStatic(\'create\', Array)\n#19 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelManager.php(92): App\\Imports\\LeadsImport->model(Array)\n#20 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelManager.php(108): Maatwebsite\\Excel\\Imports\\ModelManager->toModels(Object(App\\Imports\\LeadsImport), Array, 2)\n#21 [internal function]: Maatwebsite\\Excel\\Imports\\ModelManager->Maatwebsite\\Excel\\Imports\\{closure}(Array, 2)\n#22 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Collections\\Collection.php(642): array_map(Object(Closure), Array, Array)\n#23 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Collections\\Traits\\EnumeratesValues.php(343): Illuminate\\Support\\Collection->map(Object(Closure))\n#24 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelManager.php(109): Illuminate\\Support\\Collection->flatMap(Object(Closure))\n#25 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelManager.php(71): Maatwebsite\\Excel\\Imports\\ModelManager->massFlush(Object(App\\Imports\\LeadsImport))\n#26 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelImporter.php(79): Maatwebsite\\Excel\\Imports\\ModelManager->flush(Object(App\\Imports\\LeadsImport), true)\n#27 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Sheet.php(262): Maatwebsite\\Excel\\Imports\\ModelImporter->import(Object(PhpOffice\\PhpSpreadsheet\\Worksheet\\Worksheet), Object(App\\Imports\\LeadsImport), 2)\n#28 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Jobs\\ReadChunk.php(169): Maatwebsite\\Excel\\Sheet->import(Object(App\\Imports\\LeadsImport), 2)\n#29 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Concerns\\ManagesTransactions.php(29): Maatwebsite\\Excel\\Jobs\\ReadChunk->Maatwebsite\\Excel\\Jobs\\{closure}(Object(Illuminate\\Database\\MySqlConnection))\n#30 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Transactions\\DbTransactionHandler.php(30): Illuminate\\Database\\Connection->transaction(Object(Closure))\n#31 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Jobs\\ReadChunk.php(175): Maatwebsite\\Excel\\Transactions\\DbTransactionHandler->__invoke(Object(Closure))\n#32 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Maatwebsite\\Excel\\Jobs\\ReadChunk->handle(Object(Maatwebsite\\Excel\\Transactions\\DbTransactionHandler))\n#33 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#34 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#35 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#36 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(611): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#37 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#38 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(Maatwebsite\\Excel\\Jobs\\ReadChunk))\n#39 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Maatwebsite\\Excel\\Jobs\\ReadChunk))\n#40 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#41 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(118): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(Maatwebsite\\Excel\\Jobs\\ReadChunk), false)\n#42 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(Maatwebsite\\Excel\\Jobs\\ReadChunk))\n#43 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Maatwebsite\\Excel\\Jobs\\ReadChunk))\n#44 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#45 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Maatwebsite\\Excel\\Jobs\\ReadChunk))\n#46 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#47 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(410): Illuminate\\Queue\\Jobs\\Job->fire()\n#48 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(360): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#49 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(158): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#50 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#51 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#52 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#53 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#54 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#55 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#56 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(611): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#57 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#58 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Command\\Command.php(256): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#59 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#60 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Application.php(971): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#61 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Application.php(290): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#62 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Application.php(166): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#63 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(92): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#64 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#65 C:\\xampp\\htdocs\\broker\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#66 {main}\n\nNext Doctrine\\DBAL\\Driver\\PDO\\Exception: SQLSTATE[42S22]: Column not found: 1054 Unknown column \'0\' in \'field list\' in C:\\xampp\\htdocs\\broker\\vendor\\doctrine\\dbal\\lib\\Doctrine\\DBAL\\Driver\\PDO\\Exception.php:18\nStack trace:\n#0 C:\\xampp\\htdocs\\broker\\vendor\\doctrine\\dbal\\lib\\Doctrine\\DBAL\\Driver\\PDOConnection.php(84): Doctrine\\DBAL\\Driver\\PDO\\Exception::new(Object(PDOException))\n#1 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(465): Doctrine\\DBAL\\Driver\\PDOConnection->prepare(\'insert into `le...\')\n#2 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(671): Illuminate\\Database\\Connection->Illuminate\\Database\\{closure}(\'insert into `le...\', Array)\n#3 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(638): Illuminate\\Database\\Connection->runQueryCallback(\'insert into `le...\', Array, Object(Closure))\n#4 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(472): Illuminate\\Database\\Connection->run(\'insert into `le...\', Array, Object(Closure))\n#5 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(424): Illuminate\\Database\\Connection->statement(\'insert into `le...\', Array)\n#6 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Processors\\Processor.php(32): Illuminate\\Database\\Connection->insert(\'insert into `le...\', Array)\n#7 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Builder.php(2882): Illuminate\\Database\\Query\\Processors\\Processor->processInsertGetId(Object(Illuminate\\Database\\Query\\Builder), \'insert into `le...\', Array, \'id\')\n#8 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php(1560): Illuminate\\Database\\Query\\Builder->insertGetId(Array, \'id\')\n#9 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1052): Illuminate\\Database\\Eloquent\\Builder->__call(\'insertGetId\', Array)\n#10 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1017): Illuminate\\Database\\Eloquent\\Model->insertAndSetId(Object(Illuminate\\Database\\Eloquent\\Builder), Array)\n#11 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(858): Illuminate\\Database\\Eloquent\\Model->performInsert(Object(Illuminate\\Database\\Eloquent\\Builder))\n#12 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php(816): Illuminate\\Database\\Eloquent\\Model->save()\n#13 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\helpers.php(263): Illuminate\\Database\\Eloquent\\Builder->Illuminate\\Database\\Eloquent\\{closure}(Object(Modules\\Sales\\Entities\\LeadProperty))\n#14 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php(817): tap(Object(Modules\\Sales\\Entities\\LeadProperty), Object(Closure))\n#15 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\ForwardsCalls.php(23): Illuminate\\Database\\Eloquent\\Builder->create(Array)\n#16 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1890): Illuminate\\Database\\Eloquent\\Model->forwardCallTo(Object(Illuminate\\Database\\Eloquent\\Builder), \'create\', Array)\n#17 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1902): Illuminate\\Database\\Eloquent\\Model->__call(\'create\', Array)\n#18 C:\\xampp\\htdocs\\broker\\app\\Imports\\LeadsImport.php(58): Illuminate\\Database\\Eloquent\\Model::__callStatic(\'create\', Array)\n#19 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelManager.php(92): App\\Imports\\LeadsImport->model(Array)\n#20 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelManager.php(108): Maatwebsite\\Excel\\Imports\\ModelManager->toModels(Object(App\\Imports\\LeadsImport), Array, 2)\n#21 [internal function]: Maatwebsite\\Excel\\Imports\\ModelManager->Maatwebsite\\Excel\\Imports\\{closure}(Array, 2)\n#22 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Collections\\Collection.php(642): array_map(Object(Closure), Array, Array)\n#23 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Collections\\Traits\\EnumeratesValues.php(343): Illuminate\\Support\\Collection->map(Object(Closure))\n#24 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelManager.php(109): Illuminate\\Support\\Collection->flatMap(Object(Closure))\n#25 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelManager.php(71): Maatwebsite\\Excel\\Imports\\ModelManager->massFlush(Object(App\\Imports\\LeadsImport))\n#26 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelImporter.php(79): Maatwebsite\\Excel\\Imports\\ModelManager->flush(Object(App\\Imports\\LeadsImport), true)\n#27 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Sheet.php(262): Maatwebsite\\Excel\\Imports\\ModelImporter->import(Object(PhpOffice\\PhpSpreadsheet\\Worksheet\\Worksheet), Object(App\\Imports\\LeadsImport), 2)\n#28 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Jobs\\ReadChunk.php(169): Maatwebsite\\Excel\\Sheet->import(Object(App\\Imports\\LeadsImport), 2)\n#29 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Concerns\\ManagesTransactions.php(29): Maatwebsite\\Excel\\Jobs\\ReadChunk->Maatwebsite\\Excel\\Jobs\\{closure}(Object(Illuminate\\Database\\MySqlConnection))\n#30 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Transactions\\DbTransactionHandler.php(30): Illuminate\\Database\\Connection->transaction(Object(Closure))\n#31 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Jobs\\ReadChunk.php(175): Maatwebsite\\Excel\\Transactions\\DbTransactionHandler->__invoke(Object(Closure))\n#32 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Maatwebsite\\Excel\\Jobs\\ReadChunk->handle(Object(Maatwebsite\\Excel\\Transactions\\DbTransactionHandler))\n#33 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#34 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#35 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#36 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(611): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#37 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#38 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(Maatwebsite\\Excel\\Jobs\\ReadChunk))\n#39 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Maatwebsite\\Excel\\Jobs\\ReadChunk))\n#40 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#41 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(118): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(Maatwebsite\\Excel\\Jobs\\ReadChunk), false)\n#42 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(Maatwebsite\\Excel\\Jobs\\ReadChunk))\n#43 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Maatwebsite\\Excel\\Jobs\\ReadChunk))\n#44 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#45 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Maatwebsite\\Excel\\Jobs\\ReadChunk))\n#46 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#47 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(410): Illuminate\\Queue\\Jobs\\Job->fire()\n#48 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(360): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#49 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(158): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#50 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#51 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#52 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#53 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#54 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#55 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#56 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(611): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#57 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#58 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Command\\Command.php(256): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#59 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#60 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Application.php(971): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#61 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Application.php(290): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#62 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Application.php(166): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#63 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(92): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#64 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#65 C:\\xampp\\htdocs\\broker\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#66 {main}\n\nNext Illuminate\\Database\\QueryException: SQLSTATE[42S22]: Column not found: 1054 Unknown column \'0\' in \'field list\' (SQL: insert into `lead_property` (`0`, `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `9`, `updated_at`, `created_at`) values (name_en, Commercial, name_ar, Commercial, slug, commercial, agency_id, 1, business_id , 1, 2021-05-05 10:42:58, 2021-05-05 10:42:58)) in C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php:678\nStack trace:\n#0 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(638): Illuminate\\Database\\Connection->runQueryCallback(\'insert into `le...\', Array, Object(Closure))\n#1 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(472): Illuminate\\Database\\Connection->run(\'insert into `le...\', Array, Object(Closure))\n#2 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(424): Illuminate\\Database\\Connection->statement(\'insert into `le...\', Array)\n#3 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Processors\\Processor.php(32): Illuminate\\Database\\Connection->insert(\'insert into `le...\', Array)\n#4 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Builder.php(2882): Illuminate\\Database\\Query\\Processors\\Processor->processInsertGetId(Object(Illuminate\\Database\\Query\\Builder), \'insert into `le...\', Array, \'id\')\n#5 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php(1560): Illuminate\\Database\\Query\\Builder->insertGetId(Array, \'id\')\n#6 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1052): Illuminate\\Database\\Eloquent\\Builder->__call(\'insertGetId\', Array)\n#7 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1017): Illuminate\\Database\\Eloquent\\Model->insertAndSetId(Object(Illuminate\\Database\\Eloquent\\Builder), Array)\n#8 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(858): Illuminate\\Database\\Eloquent\\Model->performInsert(Object(Illuminate\\Database\\Eloquent\\Builder))\n#9 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php(816): Illuminate\\Database\\Eloquent\\Model->save()\n#10 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\helpers.php(263): Illuminate\\Database\\Eloquent\\Builder->Illuminate\\Database\\Eloquent\\{closure}(Object(Modules\\Sales\\Entities\\LeadProperty))\n#11 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php(817): tap(Object(Modules\\Sales\\Entities\\LeadProperty), Object(Closure))\n#12 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\ForwardsCalls.php(23): Illuminate\\Database\\Eloquent\\Builder->create(Array)\n#13 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1890): Illuminate\\Database\\Eloquent\\Model->forwardCallTo(Object(Illuminate\\Database\\Eloquent\\Builder), \'create\', Array)\n#14 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1902): Illuminate\\Database\\Eloquent\\Model->__call(\'create\', Array)\n#15 C:\\xampp\\htdocs\\broker\\app\\Imports\\LeadsImport.php(58): Illuminate\\Database\\Eloquent\\Model::__callStatic(\'create\', Array)\n#16 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelManager.php(92): App\\Imports\\LeadsImport->model(Array)\n#17 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelManager.php(108): Maatwebsite\\Excel\\Imports\\ModelManager->toModels(Object(App\\Imports\\LeadsImport), Array, 2)\n#18 [internal function]: Maatwebsite\\Excel\\Imports\\ModelManager->Maatwebsite\\Excel\\Imports\\{closure}(Array, 2)\n#19 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Collections\\Collection.php(642): array_map(Object(Closure), Array, Array)\n#20 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Collections\\Traits\\EnumeratesValues.php(343): Illuminate\\Support\\Collection->map(Object(Closure))\n#21 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelManager.php(109): Illuminate\\Support\\Collection->flatMap(Object(Closure))\n#22 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelManager.php(71): Maatwebsite\\Excel\\Imports\\ModelManager->massFlush(Object(App\\Imports\\LeadsImport))\n#23 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelImporter.php(79): Maatwebsite\\Excel\\Imports\\ModelManager->flush(Object(App\\Imports\\LeadsImport), true)\n#24 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Sheet.php(262): Maatwebsite\\Excel\\Imports\\ModelImporter->import(Object(PhpOffice\\PhpSpreadsheet\\Worksheet\\Worksheet), Object(App\\Imports\\LeadsImport), 2)\n#25 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Jobs\\ReadChunk.php(169): Maatwebsite\\Excel\\Sheet->import(Object(App\\Imports\\LeadsImport), 2)\n#26 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Concerns\\ManagesTransactions.php(29): Maatwebsite\\Excel\\Jobs\\ReadChunk->Maatwebsite\\Excel\\Jobs\\{closure}(Object(Illuminate\\Database\\MySqlConnection))\n#27 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Transactions\\DbTransactionHandler.php(30): Illuminate\\Database\\Connection->transaction(Object(Closure))\n#28 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Jobs\\ReadChunk.php(175): Maatwebsite\\Excel\\Transactions\\DbTransactionHandler->__invoke(Object(Closure))\n#29 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Maatwebsite\\Excel\\Jobs\\ReadChunk->handle(Object(Maatwebsite\\Excel\\Transactions\\DbTransactionHandler))\n#30 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#31 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#32 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#33 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(611): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#34 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#35 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(Maatwebsite\\Excel\\Jobs\\ReadChunk))\n#36 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Maatwebsite\\Excel\\Jobs\\ReadChunk))\n#37 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#38 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(118): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(Maatwebsite\\Excel\\Jobs\\ReadChunk), false)\n#39 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(Maatwebsite\\Excel\\Jobs\\ReadChunk))\n#40 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Maatwebsite\\Excel\\Jobs\\ReadChunk))\n#41 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#42 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Maatwebsite\\Excel\\Jobs\\ReadChunk))\n#43 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#44 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(410): Illuminate\\Queue\\Jobs\\Job->fire()\n#45 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(360): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#46 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(158): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#47 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#48 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#49 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#50 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#51 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#52 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#53 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(611): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#54 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#55 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Command\\Command.php(256): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#56 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#57 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Application.php(971): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#58 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Application.php(290): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#59 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Application.php(166): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#60 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(92): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#61 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#62 C:\\xampp\\htdocs\\broker\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#63 {main}', '2021-05-05 08:42:58');
INSERT INTO `failed_jobs` (`id`, `connection`, `queue`, `payload`, `exception`, `failed_at`) VALUES
(7, 'database', 'default', '{\"uuid\":\"753d5a8e-ab0b-4877-81ea-5661456636d4\",\"displayName\":\"Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\",\"command\":\"O:32:\\\"Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\\":21:{s:7:\\\"timeout\\\";N;s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:40:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000import\\\";O:23:\\\"App\\\\Imports\\\\LeadsImport\\\":6:{s:9:\\\"source_id\\\";s:1:\\\"1\\\";s:16:\\\"qualification_id\\\";s:1:\\\"1\\\";s:7:\\\"type_id\\\";s:1:\\\"1\\\";s:16:\\\"communication_id\\\";s:1:\\\"1\\\";s:8:\\\"business\\\";i:1;s:6:\\\"agency\\\";s:1:\\\"1\\\";}s:40:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000reader\\\";O:36:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\\":8:{s:53:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\u0000referenceHelper\\\";O:40:\\\"PhpOffice\\\\PhpSpreadsheet\\\\ReferenceHelper\\\":0:{}s:15:\\\"\\u0000*\\u0000readDataOnly\\\";b:1;s:17:\\\"\\u0000*\\u0000readEmptyCells\\\";b:1;s:16:\\\"\\u0000*\\u0000includeCharts\\\";b:0;s:17:\\\"\\u0000*\\u0000loadSheetsOnly\\\";N;s:13:\\\"\\u0000*\\u0000readFilter\\\";O:49:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\DefaultReadFilter\\\":0:{}s:13:\\\"\\u0000*\\u0000fileHandle\\\";N;s:18:\\\"\\u0000*\\u0000securityScanner\\\";O:51:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\\":2:{s:60:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000pattern\\\";s:9:\\\"<!DOCTYPE\\\";s:61:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000callback\\\";N;}}s:47:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000temporaryFile\\\";O:42:\\\"Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\\":1:{s:52:\\\"\\u0000Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\u0000filePath\\\";s:105:\\\"C:\\\\xampp\\\\htdocs\\\\broker\\\\storage\\\\framework\\\\laravel-excel\\\\laravel-excel-FLSFdktNHWhdviKt9bZHxr8Ow6p6TViI.tmp\\\";}s:43:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000sheetName\\\";s:6:\\\"Sheet1\\\";s:45:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000sheetImport\\\";r:5;s:42:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000startRow\\\";i:2;s:43:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000chunkSize\\\";i:20;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:9:{i:0;s:1736:\\\"O:32:\\\"Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\\":21:{s:7:\\\"timeout\\\";N;s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:40:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000import\\\";O:23:\\\"App\\\\Imports\\\\LeadsImport\\\":6:{s:9:\\\"source_id\\\";s:1:\\\"1\\\";s:16:\\\"qualification_id\\\";s:1:\\\"1\\\";s:7:\\\"type_id\\\";s:1:\\\"1\\\";s:16:\\\"communication_id\\\";s:1:\\\"1\\\";s:8:\\\"business\\\";i:1;s:6:\\\"agency\\\";s:1:\\\"1\\\";}s:40:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000reader\\\";O:36:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\\":8:{s:53:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\u0000referenceHelper\\\";O:40:\\\"PhpOffice\\\\PhpSpreadsheet\\\\ReferenceHelper\\\":0:{}s:15:\\\"\\u0000*\\u0000readDataOnly\\\";b:1;s:17:\\\"\\u0000*\\u0000readEmptyCells\\\";b:1;s:16:\\\"\\u0000*\\u0000includeCharts\\\";b:0;s:17:\\\"\\u0000*\\u0000loadSheetsOnly\\\";N;s:13:\\\"\\u0000*\\u0000readFilter\\\";O:49:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\DefaultReadFilter\\\":0:{}s:13:\\\"\\u0000*\\u0000fileHandle\\\";N;s:18:\\\"\\u0000*\\u0000securityScanner\\\";O:51:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\\":2:{s:60:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000pattern\\\";s:9:\\\"<!DOCTYPE\\\";s:61:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000callback\\\";N;}}s:47:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000temporaryFile\\\";O:42:\\\"Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\\":1:{s:52:\\\"\\u0000Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\u0000filePath\\\";s:105:\\\"C:\\\\xampp\\\\htdocs\\\\broker\\\\storage\\\\framework\\\\laravel-excel\\\\laravel-excel-FLSFdktNHWhdviKt9bZHxr8Ow6p6TViI.tmp\\\";}s:43:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000sheetName\\\";s:6:\\\"Sheet1\\\";s:45:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000sheetImport\\\";r:5;s:42:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000startRow\\\";i:22;s:43:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000chunkSize\\\";i:20;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:9:\\\"\\u0000*\\u0000events\\\";a:0:{}s:3:\\\"job\\\";N;}\\\";i:1;s:1736:\\\"O:32:\\\"Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\\":21:{s:7:\\\"timeout\\\";N;s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:40:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000import\\\";O:23:\\\"App\\\\Imports\\\\LeadsImport\\\":6:{s:9:\\\"source_id\\\";s:1:\\\"1\\\";s:16:\\\"qualification_id\\\";s:1:\\\"1\\\";s:7:\\\"type_id\\\";s:1:\\\"1\\\";s:16:\\\"communication_id\\\";s:1:\\\"1\\\";s:8:\\\"business\\\";i:1;s:6:\\\"agency\\\";s:1:\\\"1\\\";}s:40:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000reader\\\";O:36:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\\":8:{s:53:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\u0000referenceHelper\\\";O:40:\\\"PhpOffice\\\\PhpSpreadsheet\\\\ReferenceHelper\\\":0:{}s:15:\\\"\\u0000*\\u0000readDataOnly\\\";b:1;s:17:\\\"\\u0000*\\u0000readEmptyCells\\\";b:1;s:16:\\\"\\u0000*\\u0000includeCharts\\\";b:0;s:17:\\\"\\u0000*\\u0000loadSheetsOnly\\\";N;s:13:\\\"\\u0000*\\u0000readFilter\\\";O:49:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\DefaultReadFilter\\\":0:{}s:13:\\\"\\u0000*\\u0000fileHandle\\\";N;s:18:\\\"\\u0000*\\u0000securityScanner\\\";O:51:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\\":2:{s:60:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000pattern\\\";s:9:\\\"<!DOCTYPE\\\";s:61:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000callback\\\";N;}}s:47:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000temporaryFile\\\";O:42:\\\"Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\\":1:{s:52:\\\"\\u0000Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\u0000filePath\\\";s:105:\\\"C:\\\\xampp\\\\htdocs\\\\broker\\\\storage\\\\framework\\\\laravel-excel\\\\laravel-excel-FLSFdktNHWhdviKt9bZHxr8Ow6p6TViI.tmp\\\";}s:43:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000sheetName\\\";s:6:\\\"Sheet1\\\";s:45:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000sheetImport\\\";r:5;s:42:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000startRow\\\";i:42;s:43:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000chunkSize\\\";i:20;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:9:\\\"\\u0000*\\u0000events\\\";a:0:{}s:3:\\\"job\\\";N;}\\\";i:2;s:1736:\\\"O:32:\\\"Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\\":21:{s:7:\\\"timeout\\\";N;s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:40:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000import\\\";O:23:\\\"App\\\\Imports\\\\LeadsImport\\\":6:{s:9:\\\"source_id\\\";s:1:\\\"1\\\";s:16:\\\"qualification_id\\\";s:1:\\\"1\\\";s:7:\\\"type_id\\\";s:1:\\\"1\\\";s:16:\\\"communication_id\\\";s:1:\\\"1\\\";s:8:\\\"business\\\";i:1;s:6:\\\"agency\\\";s:1:\\\"1\\\";}s:40:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000reader\\\";O:36:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\\":8:{s:53:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\u0000referenceHelper\\\";O:40:\\\"PhpOffice\\\\PhpSpreadsheet\\\\ReferenceHelper\\\":0:{}s:15:\\\"\\u0000*\\u0000readDataOnly\\\";b:1;s:17:\\\"\\u0000*\\u0000readEmptyCells\\\";b:1;s:16:\\\"\\u0000*\\u0000includeCharts\\\";b:0;s:17:\\\"\\u0000*\\u0000loadSheetsOnly\\\";N;s:13:\\\"\\u0000*\\u0000readFilter\\\";O:49:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\DefaultReadFilter\\\":0:{}s:13:\\\"\\u0000*\\u0000fileHandle\\\";N;s:18:\\\"\\u0000*\\u0000securityScanner\\\";O:51:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\\":2:{s:60:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000pattern\\\";s:9:\\\"<!DOCTYPE\\\";s:61:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000callback\\\";N;}}s:47:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000temporaryFile\\\";O:42:\\\"Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\\":1:{s:52:\\\"\\u0000Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\u0000filePath\\\";s:105:\\\"C:\\\\xampp\\\\htdocs\\\\broker\\\\storage\\\\framework\\\\laravel-excel\\\\laravel-excel-FLSFdktNHWhdviKt9bZHxr8Ow6p6TViI.tmp\\\";}s:43:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000sheetName\\\";s:6:\\\"Sheet1\\\";s:45:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000sheetImport\\\";r:5;s:42:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000startRow\\\";i:62;s:43:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000chunkSize\\\";i:20;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:9:\\\"\\u0000*\\u0000events\\\";a:0:{}s:3:\\\"job\\\";N;}\\\";i:3;s:1736:\\\"O:32:\\\"Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\\":21:{s:7:\\\"timeout\\\";N;s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:40:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000import\\\";O:23:\\\"App\\\\Imports\\\\LeadsImport\\\":6:{s:9:\\\"source_id\\\";s:1:\\\"1\\\";s:16:\\\"qualification_id\\\";s:1:\\\"1\\\";s:7:\\\"type_id\\\";s:1:\\\"1\\\";s:16:\\\"communication_id\\\";s:1:\\\"1\\\";s:8:\\\"business\\\";i:1;s:6:\\\"agency\\\";s:1:\\\"1\\\";}s:40:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000reader\\\";O:36:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\\":8:{s:53:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\u0000referenceHelper\\\";O:40:\\\"PhpOffice\\\\PhpSpreadsheet\\\\ReferenceHelper\\\":0:{}s:15:\\\"\\u0000*\\u0000readDataOnly\\\";b:1;s:17:\\\"\\u0000*\\u0000readEmptyCells\\\";b:1;s:16:\\\"\\u0000*\\u0000includeCharts\\\";b:0;s:17:\\\"\\u0000*\\u0000loadSheetsOnly\\\";N;s:13:\\\"\\u0000*\\u0000readFilter\\\";O:49:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\DefaultReadFilter\\\":0:{}s:13:\\\"\\u0000*\\u0000fileHandle\\\";N;s:18:\\\"\\u0000*\\u0000securityScanner\\\";O:51:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\\":2:{s:60:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000pattern\\\";s:9:\\\"<!DOCTYPE\\\";s:61:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000callback\\\";N;}}s:47:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000temporaryFile\\\";O:42:\\\"Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\\":1:{s:52:\\\"\\u0000Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\u0000filePath\\\";s:105:\\\"C:\\\\xampp\\\\htdocs\\\\broker\\\\storage\\\\framework\\\\laravel-excel\\\\laravel-excel-FLSFdktNHWhdviKt9bZHxr8Ow6p6TViI.tmp\\\";}s:43:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000sheetName\\\";s:6:\\\"Sheet1\\\";s:45:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000sheetImport\\\";r:5;s:42:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000startRow\\\";i:82;s:43:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000chunkSize\\\";i:20;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:9:\\\"\\u0000*\\u0000events\\\";a:0:{}s:3:\\\"job\\\";N;}\\\";i:4;s:1737:\\\"O:32:\\\"Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\\":21:{s:7:\\\"timeout\\\";N;s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:40:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000import\\\";O:23:\\\"App\\\\Imports\\\\LeadsImport\\\":6:{s:9:\\\"source_id\\\";s:1:\\\"1\\\";s:16:\\\"qualification_id\\\";s:1:\\\"1\\\";s:7:\\\"type_id\\\";s:1:\\\"1\\\";s:16:\\\"communication_id\\\";s:1:\\\"1\\\";s:8:\\\"business\\\";i:1;s:6:\\\"agency\\\";s:1:\\\"1\\\";}s:40:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000reader\\\";O:36:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\\":8:{s:53:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\u0000referenceHelper\\\";O:40:\\\"PhpOffice\\\\PhpSpreadsheet\\\\ReferenceHelper\\\":0:{}s:15:\\\"\\u0000*\\u0000readDataOnly\\\";b:1;s:17:\\\"\\u0000*\\u0000readEmptyCells\\\";b:1;s:16:\\\"\\u0000*\\u0000includeCharts\\\";b:0;s:17:\\\"\\u0000*\\u0000loadSheetsOnly\\\";N;s:13:\\\"\\u0000*\\u0000readFilter\\\";O:49:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\DefaultReadFilter\\\":0:{}s:13:\\\"\\u0000*\\u0000fileHandle\\\";N;s:18:\\\"\\u0000*\\u0000securityScanner\\\";O:51:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\\":2:{s:60:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000pattern\\\";s:9:\\\"<!DOCTYPE\\\";s:61:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000callback\\\";N;}}s:47:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000temporaryFile\\\";O:42:\\\"Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\\":1:{s:52:\\\"\\u0000Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\u0000filePath\\\";s:105:\\\"C:\\\\xampp\\\\htdocs\\\\broker\\\\storage\\\\framework\\\\laravel-excel\\\\laravel-excel-FLSFdktNHWhdviKt9bZHxr8Ow6p6TViI.tmp\\\";}s:43:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000sheetName\\\";s:6:\\\"Sheet1\\\";s:45:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000sheetImport\\\";r:5;s:42:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000startRow\\\";i:102;s:43:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000chunkSize\\\";i:20;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:9:\\\"\\u0000*\\u0000events\\\";a:0:{}s:3:\\\"job\\\";N;}\\\";i:5;s:1737:\\\"O:32:\\\"Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\\":21:{s:7:\\\"timeout\\\";N;s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:40:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000import\\\";O:23:\\\"App\\\\Imports\\\\LeadsImport\\\":6:{s:9:\\\"source_id\\\";s:1:\\\"1\\\";s:16:\\\"qualification_id\\\";s:1:\\\"1\\\";s:7:\\\"type_id\\\";s:1:\\\"1\\\";s:16:\\\"communication_id\\\";s:1:\\\"1\\\";s:8:\\\"business\\\";i:1;s:6:\\\"agency\\\";s:1:\\\"1\\\";}s:40:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000reader\\\";O:36:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\\":8:{s:53:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\u0000referenceHelper\\\";O:40:\\\"PhpOffice\\\\PhpSpreadsheet\\\\ReferenceHelper\\\":0:{}s:15:\\\"\\u0000*\\u0000readDataOnly\\\";b:1;s:17:\\\"\\u0000*\\u0000readEmptyCells\\\";b:1;s:16:\\\"\\u0000*\\u0000includeCharts\\\";b:0;s:17:\\\"\\u0000*\\u0000loadSheetsOnly\\\";N;s:13:\\\"\\u0000*\\u0000readFilter\\\";O:49:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\DefaultReadFilter\\\":0:{}s:13:\\\"\\u0000*\\u0000fileHandle\\\";N;s:18:\\\"\\u0000*\\u0000securityScanner\\\";O:51:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\\":2:{s:60:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000pattern\\\";s:9:\\\"<!DOCTYPE\\\";s:61:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000callback\\\";N;}}s:47:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000temporaryFile\\\";O:42:\\\"Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\\":1:{s:52:\\\"\\u0000Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\u0000filePath\\\";s:105:\\\"C:\\\\xampp\\\\htdocs\\\\broker\\\\storage\\\\framework\\\\laravel-excel\\\\laravel-excel-FLSFdktNHWhdviKt9bZHxr8Ow6p6TViI.tmp\\\";}s:43:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000sheetName\\\";s:6:\\\"Sheet1\\\";s:45:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000sheetImport\\\";r:5;s:42:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000startRow\\\";i:122;s:43:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000chunkSize\\\";i:20;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:9:\\\"\\u0000*\\u0000events\\\";a:0:{}s:3:\\\"job\\\";N;}\\\";i:6;s:1737:\\\"O:32:\\\"Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\\":21:{s:7:\\\"timeout\\\";N;s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:40:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000import\\\";O:23:\\\"App\\\\Imports\\\\LeadsImport\\\":6:{s:9:\\\"source_id\\\";s:1:\\\"1\\\";s:16:\\\"qualification_id\\\";s:1:\\\"1\\\";s:7:\\\"type_id\\\";s:1:\\\"1\\\";s:16:\\\"communication_id\\\";s:1:\\\"1\\\";s:8:\\\"business\\\";i:1;s:6:\\\"agency\\\";s:1:\\\"1\\\";}s:40:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000reader\\\";O:36:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\\":8:{s:53:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\u0000referenceHelper\\\";O:40:\\\"PhpOffice\\\\PhpSpreadsheet\\\\ReferenceHelper\\\":0:{}s:15:\\\"\\u0000*\\u0000readDataOnly\\\";b:1;s:17:\\\"\\u0000*\\u0000readEmptyCells\\\";b:1;s:16:\\\"\\u0000*\\u0000includeCharts\\\";b:0;s:17:\\\"\\u0000*\\u0000loadSheetsOnly\\\";N;s:13:\\\"\\u0000*\\u0000readFilter\\\";O:49:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\DefaultReadFilter\\\":0:{}s:13:\\\"\\u0000*\\u0000fileHandle\\\";N;s:18:\\\"\\u0000*\\u0000securityScanner\\\";O:51:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\\":2:{s:60:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000pattern\\\";s:9:\\\"<!DOCTYPE\\\";s:61:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000callback\\\";N;}}s:47:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000temporaryFile\\\";O:42:\\\"Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\\":1:{s:52:\\\"\\u0000Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\u0000filePath\\\";s:105:\\\"C:\\\\xampp\\\\htdocs\\\\broker\\\\storage\\\\framework\\\\laravel-excel\\\\laravel-excel-FLSFdktNHWhdviKt9bZHxr8Ow6p6TViI.tmp\\\";}s:43:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000sheetName\\\";s:6:\\\"Sheet1\\\";s:45:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000sheetImport\\\";r:5;s:42:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000startRow\\\";i:142;s:43:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000chunkSize\\\";i:20;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:9:\\\"\\u0000*\\u0000events\\\";a:0:{}s:3:\\\"job\\\";N;}\\\";i:7;s:1737:\\\"O:32:\\\"Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\\":21:{s:7:\\\"timeout\\\";N;s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:40:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000import\\\";O:23:\\\"App\\\\Imports\\\\LeadsImport\\\":6:{s:9:\\\"source_id\\\";s:1:\\\"1\\\";s:16:\\\"qualification_id\\\";s:1:\\\"1\\\";s:7:\\\"type_id\\\";s:1:\\\"1\\\";s:16:\\\"communication_id\\\";s:1:\\\"1\\\";s:8:\\\"business\\\";i:1;s:6:\\\"agency\\\";s:1:\\\"1\\\";}s:40:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000reader\\\";O:36:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\\":8:{s:53:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\u0000referenceHelper\\\";O:40:\\\"PhpOffice\\\\PhpSpreadsheet\\\\ReferenceHelper\\\":0:{}s:15:\\\"\\u0000*\\u0000readDataOnly\\\";b:1;s:17:\\\"\\u0000*\\u0000readEmptyCells\\\";b:1;s:16:\\\"\\u0000*\\u0000includeCharts\\\";b:0;s:17:\\\"\\u0000*\\u0000loadSheetsOnly\\\";N;s:13:\\\"\\u0000*\\u0000readFilter\\\";O:49:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\DefaultReadFilter\\\":0:{}s:13:\\\"\\u0000*\\u0000fileHandle\\\";N;s:18:\\\"\\u0000*\\u0000securityScanner\\\";O:51:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\\":2:{s:60:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000pattern\\\";s:9:\\\"<!DOCTYPE\\\";s:61:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000callback\\\";N;}}s:47:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000temporaryFile\\\";O:42:\\\"Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\\":1:{s:52:\\\"\\u0000Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\u0000filePath\\\";s:105:\\\"C:\\\\xampp\\\\htdocs\\\\broker\\\\storage\\\\framework\\\\laravel-excel\\\\laravel-excel-FLSFdktNHWhdviKt9bZHxr8Ow6p6TViI.tmp\\\";}s:43:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000sheetName\\\";s:6:\\\"Sheet1\\\";s:45:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000sheetImport\\\";r:5;s:42:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000startRow\\\";i:162;s:43:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000chunkSize\\\";i:20;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:9:\\\"\\u0000*\\u0000events\\\";a:0:{}s:3:\\\"job\\\";N;}\\\";i:8;s:1811:\\\"O:37:\\\"Maatwebsite\\\\Excel\\\\Jobs\\\\AfterImportJob\\\":12:{s:45:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\AfterImportJob\\u0000import\\\";O:23:\\\"App\\\\Imports\\\\LeadsImport\\\":6:{s:9:\\\"source_id\\\";s:1:\\\"1\\\";s:16:\\\"qualification_id\\\";s:1:\\\"1\\\";s:7:\\\"type_id\\\";s:1:\\\"1\\\";s:16:\\\"communication_id\\\";s:1:\\\"1\\\";s:8:\\\"business\\\";i:1;s:6:\\\"agency\\\";s:1:\\\"1\\\";}s:45:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\AfterImportJob\\u0000reader\\\";O:24:\\\"Maatwebsite\\\\Excel\\\\Reader\\\":5:{s:14:\\\"\\u0000*\\u0000spreadsheet\\\";N;s:15:\\\"\\u0000*\\u0000sheetImports\\\";a:0:{}s:14:\\\"\\u0000*\\u0000currentFile\\\";O:42:\\\"Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\\":1:{s:52:\\\"\\u0000Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\u0000filePath\\\";s:105:\\\"C:\\\\xampp\\\\htdocs\\\\broker\\\\storage\\\\framework\\\\laravel-excel\\\\laravel-excel-FLSFdktNHWhdviKt9bZHxr8Ow6p6TViI.tmp\\\";}s:23:\\\"\\u0000*\\u0000temporaryFileFactory\\\";O:44:\\\"Maatwebsite\\\\Excel\\\\Files\\\\TemporaryFileFactory\\\":2:{s:59:\\\"\\u0000Maatwebsite\\\\Excel\\\\Files\\\\TemporaryFileFactory\\u0000temporaryPath\\\";s:54:\\\"C:\\\\xampp\\\\htdocs\\\\broker\\\\storage\\\\framework\\/laravel-excel\\\";s:59:\\\"\\u0000Maatwebsite\\\\Excel\\\\Files\\\\TemporaryFileFactory\\u0000temporaryDisk\\\";N;}s:9:\\\"\\u0000*\\u0000reader\\\";O:36:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\\":8:{s:53:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\u0000referenceHelper\\\";O:40:\\\"PhpOffice\\\\PhpSpreadsheet\\\\ReferenceHelper\\\":0:{}s:15:\\\"\\u0000*\\u0000readDataOnly\\\";b:1;s:17:\\\"\\u0000*\\u0000readEmptyCells\\\";b:1;s:16:\\\"\\u0000*\\u0000includeCharts\\\";b:0;s:17:\\\"\\u0000*\\u0000loadSheetsOnly\\\";N;s:13:\\\"\\u0000*\\u0000readFilter\\\";O:49:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\DefaultReadFilter\\\":0:{}s:13:\\\"\\u0000*\\u0000fileHandle\\\";N;s:18:\\\"\\u0000*\\u0000securityScanner\\\";O:51:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\\":2:{s:60:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000pattern\\\";s:9:\\\"<!DOCTYPE\\\";s:61:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000callback\\\";N;}}}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:9:\\\"\\u0000*\\u0000events\\\";a:0:{}}\\\";}s:9:\\\"\\u0000*\\u0000events\\\";a:0:{}s:3:\\\"job\\\";N;}\"}}', 'PDOException: SQLSTATE[42S22]: Column not found: 1054 Unknown column \'0\' in \'field list\' in C:\\xampp\\htdocs\\broker\\vendor\\doctrine\\dbal\\lib\\Doctrine\\DBAL\\Driver\\PDOConnection.php:79\nStack trace:\n#0 C:\\xampp\\htdocs\\broker\\vendor\\doctrine\\dbal\\lib\\Doctrine\\DBAL\\Driver\\PDOConnection.php(79): PDO->prepare(\'insert into `le...\', Array)\n#1 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(465): Doctrine\\DBAL\\Driver\\PDOConnection->prepare(\'insert into `le...\')\n#2 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(671): Illuminate\\Database\\Connection->Illuminate\\Database\\{closure}(\'insert into `le...\', Array)\n#3 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(638): Illuminate\\Database\\Connection->runQueryCallback(\'insert into `le...\', Array, Object(Closure))\n#4 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(472): Illuminate\\Database\\Connection->run(\'insert into `le...\', Array, Object(Closure))\n#5 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(424): Illuminate\\Database\\Connection->statement(\'insert into `le...\', Array)\n#6 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Processors\\Processor.php(32): Illuminate\\Database\\Connection->insert(\'insert into `le...\', Array)\n#7 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Builder.php(2882): Illuminate\\Database\\Query\\Processors\\Processor->processInsertGetId(Object(Illuminate\\Database\\Query\\Builder), \'insert into `le...\', Array, \'id\')\n#8 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php(1560): Illuminate\\Database\\Query\\Builder->insertGetId(Array, \'id\')\n#9 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1052): Illuminate\\Database\\Eloquent\\Builder->__call(\'insertGetId\', Array)\n#10 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1017): Illuminate\\Database\\Eloquent\\Model->insertAndSetId(Object(Illuminate\\Database\\Eloquent\\Builder), Array)\n#11 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(858): Illuminate\\Database\\Eloquent\\Model->performInsert(Object(Illuminate\\Database\\Eloquent\\Builder))\n#12 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php(816): Illuminate\\Database\\Eloquent\\Model->save()\n#13 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\helpers.php(263): Illuminate\\Database\\Eloquent\\Builder->Illuminate\\Database\\Eloquent\\{closure}(Object(Modules\\Sales\\Entities\\LeadProperty))\n#14 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php(817): tap(Object(Modules\\Sales\\Entities\\LeadProperty), Object(Closure))\n#15 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\ForwardsCalls.php(23): Illuminate\\Database\\Eloquent\\Builder->create(Array)\n#16 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1890): Illuminate\\Database\\Eloquent\\Model->forwardCallTo(Object(Illuminate\\Database\\Eloquent\\Builder), \'create\', Array)\n#17 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1902): Illuminate\\Database\\Eloquent\\Model->__call(\'create\', Array)\n#18 C:\\xampp\\htdocs\\broker\\app\\Imports\\LeadsImport.php(58): Illuminate\\Database\\Eloquent\\Model::__callStatic(\'create\', Array)\n#19 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelManager.php(92): App\\Imports\\LeadsImport->model(Array)\n#20 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelManager.php(108): Maatwebsite\\Excel\\Imports\\ModelManager->toModels(Object(App\\Imports\\LeadsImport), Array, 2)\n#21 [internal function]: Maatwebsite\\Excel\\Imports\\ModelManager->Maatwebsite\\Excel\\Imports\\{closure}(Array, 2)\n#22 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Collections\\Collection.php(642): array_map(Object(Closure), Array, Array)\n#23 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Collections\\Traits\\EnumeratesValues.php(343): Illuminate\\Support\\Collection->map(Object(Closure))\n#24 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelManager.php(109): Illuminate\\Support\\Collection->flatMap(Object(Closure))\n#25 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelManager.php(71): Maatwebsite\\Excel\\Imports\\ModelManager->massFlush(Object(App\\Imports\\LeadsImport))\n#26 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelImporter.php(79): Maatwebsite\\Excel\\Imports\\ModelManager->flush(Object(App\\Imports\\LeadsImport), true)\n#27 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Sheet.php(262): Maatwebsite\\Excel\\Imports\\ModelImporter->import(Object(PhpOffice\\PhpSpreadsheet\\Worksheet\\Worksheet), Object(App\\Imports\\LeadsImport), 2)\n#28 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Jobs\\ReadChunk.php(169): Maatwebsite\\Excel\\Sheet->import(Object(App\\Imports\\LeadsImport), 2)\n#29 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Concerns\\ManagesTransactions.php(29): Maatwebsite\\Excel\\Jobs\\ReadChunk->Maatwebsite\\Excel\\Jobs\\{closure}(Object(Illuminate\\Database\\MySqlConnection))\n#30 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Transactions\\DbTransactionHandler.php(30): Illuminate\\Database\\Connection->transaction(Object(Closure))\n#31 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Jobs\\ReadChunk.php(175): Maatwebsite\\Excel\\Transactions\\DbTransactionHandler->__invoke(Object(Closure))\n#32 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Maatwebsite\\Excel\\Jobs\\ReadChunk->handle(Object(Maatwebsite\\Excel\\Transactions\\DbTransactionHandler))\n#33 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#34 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#35 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#36 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(611): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#37 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#38 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(Maatwebsite\\Excel\\Jobs\\ReadChunk))\n#39 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Maatwebsite\\Excel\\Jobs\\ReadChunk))\n#40 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#41 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(118): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(Maatwebsite\\Excel\\Jobs\\ReadChunk), false)\n#42 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(Maatwebsite\\Excel\\Jobs\\ReadChunk))\n#43 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Maatwebsite\\Excel\\Jobs\\ReadChunk))\n#44 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#45 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Maatwebsite\\Excel\\Jobs\\ReadChunk))\n#46 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#47 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(410): Illuminate\\Queue\\Jobs\\Job->fire()\n#48 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(360): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#49 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(158): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#50 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#51 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#52 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#53 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#54 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#55 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#56 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(611): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#57 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#58 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Command\\Command.php(256): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#59 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#60 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Application.php(971): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#61 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Application.php(290): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#62 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Application.php(166): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#63 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(92): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#64 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#65 C:\\xampp\\htdocs\\broker\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#66 {main}\n\nNext Doctrine\\DBAL\\Driver\\PDO\\Exception: SQLSTATE[42S22]: Column not found: 1054 Unknown column \'0\' in \'field list\' in C:\\xampp\\htdocs\\broker\\vendor\\doctrine\\dbal\\lib\\Doctrine\\DBAL\\Driver\\PDO\\Exception.php:18\nStack trace:\n#0 C:\\xampp\\htdocs\\broker\\vendor\\doctrine\\dbal\\lib\\Doctrine\\DBAL\\Driver\\PDOConnection.php(84): Doctrine\\DBAL\\Driver\\PDO\\Exception::new(Object(PDOException))\n#1 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(465): Doctrine\\DBAL\\Driver\\PDOConnection->prepare(\'insert into `le...\')\n#2 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(671): Illuminate\\Database\\Connection->Illuminate\\Database\\{closure}(\'insert into `le...\', Array)\n#3 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(638): Illuminate\\Database\\Connection->runQueryCallback(\'insert into `le...\', Array, Object(Closure))\n#4 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(472): Illuminate\\Database\\Connection->run(\'insert into `le...\', Array, Object(Closure))\n#5 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(424): Illuminate\\Database\\Connection->statement(\'insert into `le...\', Array)\n#6 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Processors\\Processor.php(32): Illuminate\\Database\\Connection->insert(\'insert into `le...\', Array)\n#7 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Builder.php(2882): Illuminate\\Database\\Query\\Processors\\Processor->processInsertGetId(Object(Illuminate\\Database\\Query\\Builder), \'insert into `le...\', Array, \'id\')\n#8 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php(1560): Illuminate\\Database\\Query\\Builder->insertGetId(Array, \'id\')\n#9 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1052): Illuminate\\Database\\Eloquent\\Builder->__call(\'insertGetId\', Array)\n#10 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1017): Illuminate\\Database\\Eloquent\\Model->insertAndSetId(Object(Illuminate\\Database\\Eloquent\\Builder), Array)\n#11 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(858): Illuminate\\Database\\Eloquent\\Model->performInsert(Object(Illuminate\\Database\\Eloquent\\Builder))\n#12 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php(816): Illuminate\\Database\\Eloquent\\Model->save()\n#13 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\helpers.php(263): Illuminate\\Database\\Eloquent\\Builder->Illuminate\\Database\\Eloquent\\{closure}(Object(Modules\\Sales\\Entities\\LeadProperty))\n#14 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php(817): tap(Object(Modules\\Sales\\Entities\\LeadProperty), Object(Closure))\n#15 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\ForwardsCalls.php(23): Illuminate\\Database\\Eloquent\\Builder->create(Array)\n#16 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1890): Illuminate\\Database\\Eloquent\\Model->forwardCallTo(Object(Illuminate\\Database\\Eloquent\\Builder), \'create\', Array)\n#17 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1902): Illuminate\\Database\\Eloquent\\Model->__call(\'create\', Array)\n#18 C:\\xampp\\htdocs\\broker\\app\\Imports\\LeadsImport.php(58): Illuminate\\Database\\Eloquent\\Model::__callStatic(\'create\', Array)\n#19 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelManager.php(92): App\\Imports\\LeadsImport->model(Array)\n#20 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelManager.php(108): Maatwebsite\\Excel\\Imports\\ModelManager->toModels(Object(App\\Imports\\LeadsImport), Array, 2)\n#21 [internal function]: Maatwebsite\\Excel\\Imports\\ModelManager->Maatwebsite\\Excel\\Imports\\{closure}(Array, 2)\n#22 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Collections\\Collection.php(642): array_map(Object(Closure), Array, Array)\n#23 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Collections\\Traits\\EnumeratesValues.php(343): Illuminate\\Support\\Collection->map(Object(Closure))\n#24 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelManager.php(109): Illuminate\\Support\\Collection->flatMap(Object(Closure))\n#25 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelManager.php(71): Maatwebsite\\Excel\\Imports\\ModelManager->massFlush(Object(App\\Imports\\LeadsImport))\n#26 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelImporter.php(79): Maatwebsite\\Excel\\Imports\\ModelManager->flush(Object(App\\Imports\\LeadsImport), true)\n#27 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Sheet.php(262): Maatwebsite\\Excel\\Imports\\ModelImporter->import(Object(PhpOffice\\PhpSpreadsheet\\Worksheet\\Worksheet), Object(App\\Imports\\LeadsImport), 2)\n#28 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Jobs\\ReadChunk.php(169): Maatwebsite\\Excel\\Sheet->import(Object(App\\Imports\\LeadsImport), 2)\n#29 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Concerns\\ManagesTransactions.php(29): Maatwebsite\\Excel\\Jobs\\ReadChunk->Maatwebsite\\Excel\\Jobs\\{closure}(Object(Illuminate\\Database\\MySqlConnection))\n#30 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Transactions\\DbTransactionHandler.php(30): Illuminate\\Database\\Connection->transaction(Object(Closure))\n#31 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Jobs\\ReadChunk.php(175): Maatwebsite\\Excel\\Transactions\\DbTransactionHandler->__invoke(Object(Closure))\n#32 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Maatwebsite\\Excel\\Jobs\\ReadChunk->handle(Object(Maatwebsite\\Excel\\Transactions\\DbTransactionHandler))\n#33 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#34 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#35 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#36 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(611): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#37 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#38 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(Maatwebsite\\Excel\\Jobs\\ReadChunk))\n#39 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Maatwebsite\\Excel\\Jobs\\ReadChunk))\n#40 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#41 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(118): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(Maatwebsite\\Excel\\Jobs\\ReadChunk), false)\n#42 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(Maatwebsite\\Excel\\Jobs\\ReadChunk))\n#43 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Maatwebsite\\Excel\\Jobs\\ReadChunk))\n#44 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#45 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Maatwebsite\\Excel\\Jobs\\ReadChunk))\n#46 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#47 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(410): Illuminate\\Queue\\Jobs\\Job->fire()\n#48 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(360): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#49 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(158): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#50 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#51 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#52 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#53 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#54 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#55 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#56 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(611): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#57 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#58 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Command\\Command.php(256): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#59 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#60 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Application.php(971): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#61 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Application.php(290): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#62 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Application.php(166): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#63 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(92): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#64 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#65 C:\\xampp\\htdocs\\broker\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#66 {main}\n\nNext Illuminate\\Database\\QueryException: SQLSTATE[42S22]: Column not found: 1054 Unknown column \'0\' in \'field list\' (SQL: insert into `lead_property` (`0`, `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `9`, `updated_at`, `created_at`) values (name_en, Commercial, name_ar, Commercial, slug, commercial, agency_id, 1, business_id , 1, 2021-05-05 10:51:00, 2021-05-05 10:51:00)) in C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php:678\nStack trace:\n#0 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(638): Illuminate\\Database\\Connection->runQueryCallback(\'insert into `le...\', Array, Object(Closure))\n#1 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(472): Illuminate\\Database\\Connection->run(\'insert into `le...\', Array, Object(Closure))\n#2 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(424): Illuminate\\Database\\Connection->statement(\'insert into `le...\', Array)\n#3 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Processors\\Processor.php(32): Illuminate\\Database\\Connection->insert(\'insert into `le...\', Array)\n#4 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Builder.php(2882): Illuminate\\Database\\Query\\Processors\\Processor->processInsertGetId(Object(Illuminate\\Database\\Query\\Builder), \'insert into `le...\', Array, \'id\')\n#5 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php(1560): Illuminate\\Database\\Query\\Builder->insertGetId(Array, \'id\')\n#6 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1052): Illuminate\\Database\\Eloquent\\Builder->__call(\'insertGetId\', Array)\n#7 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1017): Illuminate\\Database\\Eloquent\\Model->insertAndSetId(Object(Illuminate\\Database\\Eloquent\\Builder), Array)\n#8 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(858): Illuminate\\Database\\Eloquent\\Model->performInsert(Object(Illuminate\\Database\\Eloquent\\Builder))\n#9 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php(816): Illuminate\\Database\\Eloquent\\Model->save()\n#10 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\helpers.php(263): Illuminate\\Database\\Eloquent\\Builder->Illuminate\\Database\\Eloquent\\{closure}(Object(Modules\\Sales\\Entities\\LeadProperty))\n#11 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php(817): tap(Object(Modules\\Sales\\Entities\\LeadProperty), Object(Closure))\n#12 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\ForwardsCalls.php(23): Illuminate\\Database\\Eloquent\\Builder->create(Array)\n#13 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1890): Illuminate\\Database\\Eloquent\\Model->forwardCallTo(Object(Illuminate\\Database\\Eloquent\\Builder), \'create\', Array)\n#14 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1902): Illuminate\\Database\\Eloquent\\Model->__call(\'create\', Array)\n#15 C:\\xampp\\htdocs\\broker\\app\\Imports\\LeadsImport.php(58): Illuminate\\Database\\Eloquent\\Model::__callStatic(\'create\', Array)\n#16 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelManager.php(92): App\\Imports\\LeadsImport->model(Array)\n#17 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelManager.php(108): Maatwebsite\\Excel\\Imports\\ModelManager->toModels(Object(App\\Imports\\LeadsImport), Array, 2)\n#18 [internal function]: Maatwebsite\\Excel\\Imports\\ModelManager->Maatwebsite\\Excel\\Imports\\{closure}(Array, 2)\n#19 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Collections\\Collection.php(642): array_map(Object(Closure), Array, Array)\n#20 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Collections\\Traits\\EnumeratesValues.php(343): Illuminate\\Support\\Collection->map(Object(Closure))\n#21 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelManager.php(109): Illuminate\\Support\\Collection->flatMap(Object(Closure))\n#22 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelManager.php(71): Maatwebsite\\Excel\\Imports\\ModelManager->massFlush(Object(App\\Imports\\LeadsImport))\n#23 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelImporter.php(79): Maatwebsite\\Excel\\Imports\\ModelManager->flush(Object(App\\Imports\\LeadsImport), true)\n#24 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Sheet.php(262): Maatwebsite\\Excel\\Imports\\ModelImporter->import(Object(PhpOffice\\PhpSpreadsheet\\Worksheet\\Worksheet), Object(App\\Imports\\LeadsImport), 2)\n#25 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Jobs\\ReadChunk.php(169): Maatwebsite\\Excel\\Sheet->import(Object(App\\Imports\\LeadsImport), 2)\n#26 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Concerns\\ManagesTransactions.php(29): Maatwebsite\\Excel\\Jobs\\ReadChunk->Maatwebsite\\Excel\\Jobs\\{closure}(Object(Illuminate\\Database\\MySqlConnection))\n#27 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Transactions\\DbTransactionHandler.php(30): Illuminate\\Database\\Connection->transaction(Object(Closure))\n#28 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Jobs\\ReadChunk.php(175): Maatwebsite\\Excel\\Transactions\\DbTransactionHandler->__invoke(Object(Closure))\n#29 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Maatwebsite\\Excel\\Jobs\\ReadChunk->handle(Object(Maatwebsite\\Excel\\Transactions\\DbTransactionHandler))\n#30 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#31 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#32 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#33 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(611): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#34 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#35 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(Maatwebsite\\Excel\\Jobs\\ReadChunk))\n#36 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Maatwebsite\\Excel\\Jobs\\ReadChunk))\n#37 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#38 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(118): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(Maatwebsite\\Excel\\Jobs\\ReadChunk), false)\n#39 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(Maatwebsite\\Excel\\Jobs\\ReadChunk))\n#40 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Maatwebsite\\Excel\\Jobs\\ReadChunk))\n#41 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(120): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#42 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Maatwebsite\\Excel\\Jobs\\ReadChunk))\n#43 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#44 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(410): Illuminate\\Queue\\Jobs\\Job->fire()\n#45 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(360): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#46 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(158): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#47 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(117): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#48 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(101): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#49 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#50 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(40): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#51 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#52 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#53 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(611): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#54 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(136): Illuminate\\Container\\Container->call(Array)\n#55 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Command\\Command.php(256): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#56 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#57 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Application.php(971): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#58 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Application.php(290): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#59 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Application.php(166): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#60 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(92): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#61 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#62 C:\\xampp\\htdocs\\broker\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#63 {main}', '2021-05-05 08:51:00');
INSERT INTO `failed_jobs` (`id`, `connection`, `queue`, `payload`, `exception`, `failed_at`) VALUES
(8, 'database', 'default', '{\"uuid\":\"4cd330b2-d163-4d35-bc0b-e147a5ba629f\",\"displayName\":\"Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\",\"command\":\"O:32:\\\"Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\\":19:{s:7:\\\"timeout\\\";N;s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:40:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000import\\\";O:23:\\\"App\\\\Imports\\\\LeadsImport\\\":7:{s:9:\\\"source_id\\\";s:1:\\\"1\\\";s:16:\\\"qualification_id\\\";s:1:\\\"1\\\";s:7:\\\"type_id\\\";s:1:\\\"1\\\";s:16:\\\"communication_id\\\";s:1:\\\"1\\\";s:8:\\\"business\\\";i:1;s:6:\\\"agency\\\";s:1:\\\"1\\\";s:11:\\\"priority_id\\\";s:1:\\\"1\\\";}s:40:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000reader\\\";O:36:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\\":8:{s:53:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\u0000referenceHelper\\\";O:40:\\\"PhpOffice\\\\PhpSpreadsheet\\\\ReferenceHelper\\\":0:{}s:15:\\\"\\u0000*\\u0000readDataOnly\\\";b:1;s:17:\\\"\\u0000*\\u0000readEmptyCells\\\";b:1;s:16:\\\"\\u0000*\\u0000includeCharts\\\";b:0;s:17:\\\"\\u0000*\\u0000loadSheetsOnly\\\";N;s:13:\\\"\\u0000*\\u0000readFilter\\\";O:49:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\DefaultReadFilter\\\":0:{}s:13:\\\"\\u0000*\\u0000fileHandle\\\";N;s:18:\\\"\\u0000*\\u0000securityScanner\\\";O:51:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\\":2:{s:60:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000pattern\\\";s:9:\\\"<!DOCTYPE\\\";s:61:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000callback\\\";N;}}s:47:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000temporaryFile\\\";O:42:\\\"Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\\":1:{s:52:\\\"\\u0000Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\u0000filePath\\\";s:105:\\\"C:\\\\xampp\\\\htdocs\\\\broker\\\\storage\\\\framework\\\\laravel-excel\\\\laravel-excel-QHh2jS3fk2GfuQjcZmA2GZiYCUHLWWv8.tmp\\\";}s:43:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000sheetName\\\";s:6:\\\"Sheet1\\\";s:45:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000sheetImport\\\";r:5;s:42:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000startRow\\\";i:2;s:43:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000chunkSize\\\";i:100;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:2:{i:0;s:1715:\\\"O:32:\\\"Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\\":19:{s:7:\\\"timeout\\\";N;s:5:\\\"tries\\\";N;s:13:\\\"maxExceptions\\\";N;s:40:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000import\\\";O:23:\\\"App\\\\Imports\\\\LeadsImport\\\":7:{s:9:\\\"source_id\\\";s:1:\\\"1\\\";s:16:\\\"qualification_id\\\";s:1:\\\"1\\\";s:7:\\\"type_id\\\";s:1:\\\"1\\\";s:16:\\\"communication_id\\\";s:1:\\\"1\\\";s:8:\\\"business\\\";i:1;s:6:\\\"agency\\\";s:1:\\\"1\\\";s:11:\\\"priority_id\\\";s:1:\\\"1\\\";}s:40:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000reader\\\";O:36:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\\":8:{s:53:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\u0000referenceHelper\\\";O:40:\\\"PhpOffice\\\\PhpSpreadsheet\\\\ReferenceHelper\\\":0:{}s:15:\\\"\\u0000*\\u0000readDataOnly\\\";b:1;s:17:\\\"\\u0000*\\u0000readEmptyCells\\\";b:1;s:16:\\\"\\u0000*\\u0000includeCharts\\\";b:0;s:17:\\\"\\u0000*\\u0000loadSheetsOnly\\\";N;s:13:\\\"\\u0000*\\u0000readFilter\\\";O:49:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\DefaultReadFilter\\\":0:{}s:13:\\\"\\u0000*\\u0000fileHandle\\\";N;s:18:\\\"\\u0000*\\u0000securityScanner\\\";O:51:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\\":2:{s:60:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000pattern\\\";s:9:\\\"<!DOCTYPE\\\";s:61:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000callback\\\";N;}}s:47:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000temporaryFile\\\";O:42:\\\"Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\\":1:{s:52:\\\"\\u0000Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\u0000filePath\\\";s:105:\\\"C:\\\\xampp\\\\htdocs\\\\broker\\\\storage\\\\framework\\\\laravel-excel\\\\laravel-excel-QHh2jS3fk2GfuQjcZmA2GZiYCUHLWWv8.tmp\\\";}s:43:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000sheetName\\\";s:6:\\\"Sheet1\\\";s:45:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000sheetImport\\\";r:5;s:42:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000startRow\\\";i:102;s:43:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\ReadChunk\\u0000chunkSize\\\";i:100;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:9:\\\"\\u0000*\\u0000events\\\";a:0:{}s:3:\\\"job\\\";N;}\\\";i:1;s:1788:\\\"O:37:\\\"Maatwebsite\\\\Excel\\\\Jobs\\\\AfterImportJob\\\":10:{s:45:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\AfterImportJob\\u0000import\\\";O:23:\\\"App\\\\Imports\\\\LeadsImport\\\":7:{s:9:\\\"source_id\\\";s:1:\\\"1\\\";s:16:\\\"qualification_id\\\";s:1:\\\"1\\\";s:7:\\\"type_id\\\";s:1:\\\"1\\\";s:16:\\\"communication_id\\\";s:1:\\\"1\\\";s:8:\\\"business\\\";i:1;s:6:\\\"agency\\\";s:1:\\\"1\\\";s:11:\\\"priority_id\\\";s:1:\\\"1\\\";}s:45:\\\"\\u0000Maatwebsite\\\\Excel\\\\Jobs\\\\AfterImportJob\\u0000reader\\\";O:24:\\\"Maatwebsite\\\\Excel\\\\Reader\\\":5:{s:14:\\\"\\u0000*\\u0000spreadsheet\\\";N;s:15:\\\"\\u0000*\\u0000sheetImports\\\";a:0:{}s:14:\\\"\\u0000*\\u0000currentFile\\\";O:42:\\\"Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\\":1:{s:52:\\\"\\u0000Maatwebsite\\\\Excel\\\\Files\\\\LocalTemporaryFile\\u0000filePath\\\";s:105:\\\"C:\\\\xampp\\\\htdocs\\\\broker\\\\storage\\\\framework\\\\laravel-excel\\\\laravel-excel-QHh2jS3fk2GfuQjcZmA2GZiYCUHLWWv8.tmp\\\";}s:23:\\\"\\u0000*\\u0000temporaryFileFactory\\\";O:44:\\\"Maatwebsite\\\\Excel\\\\Files\\\\TemporaryFileFactory\\\":2:{s:59:\\\"\\u0000Maatwebsite\\\\Excel\\\\Files\\\\TemporaryFileFactory\\u0000temporaryPath\\\";s:54:\\\"C:\\\\xampp\\\\htdocs\\\\broker\\\\storage\\\\framework\\/laravel-excel\\\";s:59:\\\"\\u0000Maatwebsite\\\\Excel\\\\Files\\\\TemporaryFileFactory\\u0000temporaryDisk\\\";N;}s:9:\\\"\\u0000*\\u0000reader\\\";O:36:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\\":8:{s:53:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Xlsx\\u0000referenceHelper\\\";O:40:\\\"PhpOffice\\\\PhpSpreadsheet\\\\ReferenceHelper\\\":0:{}s:15:\\\"\\u0000*\\u0000readDataOnly\\\";b:1;s:17:\\\"\\u0000*\\u0000readEmptyCells\\\";b:1;s:16:\\\"\\u0000*\\u0000includeCharts\\\";b:0;s:17:\\\"\\u0000*\\u0000loadSheetsOnly\\\";N;s:13:\\\"\\u0000*\\u0000readFilter\\\";O:49:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\DefaultReadFilter\\\":0:{}s:13:\\\"\\u0000*\\u0000fileHandle\\\";N;s:18:\\\"\\u0000*\\u0000securityScanner\\\";O:51:\\\"PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\\":2:{s:60:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000pattern\\\";s:9:\\\"<!DOCTYPE\\\";s:61:\\\"\\u0000PhpOffice\\\\PhpSpreadsheet\\\\Reader\\\\Security\\\\XmlScanner\\u0000callback\\\";N;}}}s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}s:9:\\\"\\u0000*\\u0000events\\\";a:0:{}}\\\";}s:9:\\\"\\u0000*\\u0000events\\\";a:0:{}s:3:\\\"job\\\";N;}\"}}', 'PDOException: SQLSTATE[22007]: Invalid datetime format: 1366 Incorrect integer value: \'DUBAI PROPERTIES\' for column `broker`.`leads`.`developer` at row 1 in C:\\xampp\\htdocs\\broker\\vendor\\doctrine\\dbal\\lib\\Doctrine\\DBAL\\Driver\\PDOStatement.php:112\nStack trace:\n#0 C:\\xampp\\htdocs\\broker\\vendor\\doctrine\\dbal\\lib\\Doctrine\\DBAL\\Driver\\PDOStatement.php(112): PDOStatement->execute(NULL)\n#1 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(464): Doctrine\\DBAL\\Driver\\PDOStatement->execute()\n#2 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(664): Illuminate\\Database\\Connection->Illuminate\\Database\\{closure}(\'insert into `le...\', Array)\n#3 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(631): Illuminate\\Database\\Connection->runQueryCallback(\'insert into `le...\', Array, Object(Closure))\n#4 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(465): Illuminate\\Database\\Connection->run(\'insert into `le...\', Array, Object(Closure))\n#5 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(417): Illuminate\\Database\\Connection->statement(\'insert into `le...\', Array)\n#6 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Processors\\Processor.php(32): Illuminate\\Database\\Connection->insert(\'insert into `le...\', Array)\n#7 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Builder.php(2839): Illuminate\\Database\\Query\\Processors\\Processor->processInsertGetId(Object(Illuminate\\Database\\Query\\Builder), \'insert into `le...\', Array, \'id\')\n#8 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php(1422): Illuminate\\Database\\Query\\Builder->insertGetId(Array, \'id\')\n#9 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(902): Illuminate\\Database\\Eloquent\\Builder->__call(\'insertGetId\', Array)\n#10 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(867): Illuminate\\Database\\Eloquent\\Model->insertAndSetId(Object(Illuminate\\Database\\Eloquent\\Builder), Array)\n#11 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(730): Illuminate\\Database\\Eloquent\\Model->performInsert(Object(Illuminate\\Database\\Eloquent\\Builder))\n#12 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(759): Illuminate\\Database\\Eloquent\\Model->save(Array)\n#13 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Concerns\\ManagesTransactions.php(28): Illuminate\\Database\\Eloquent\\Model->Illuminate\\Database\\Eloquent\\{closure}(Object(Illuminate\\Database\\MySqlConnection))\n#14 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(760): Illuminate\\Database\\Connection->transaction(Object(Closure))\n#15 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelManager.php(153): Illuminate\\Database\\Eloquent\\Model->saveOrFail()\n#16 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\EnumeratesValues.php(202): Maatwebsite\\Excel\\Imports\\ModelManager->Maatwebsite\\Excel\\Imports\\{closure}(Object(Modules\\Sales\\Entities\\Lead), 0)\n#17 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelManager.php(162): Illuminate\\Support\\Collection->each(Object(Closure))\n#18 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\EnumeratesValues.php(202): Maatwebsite\\Excel\\Imports\\ModelManager->Maatwebsite\\Excel\\Imports\\{closure}(Array, 2)\n#19 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelManager.php(163): Illuminate\\Support\\Collection->each(Object(Closure))\n#20 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelManager.php(73): Maatwebsite\\Excel\\Imports\\ModelManager->singleFlush(Object(App\\Imports\\LeadsImport))\n#21 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelImporter.php(79): Maatwebsite\\Excel\\Imports\\ModelManager->flush(Object(App\\Imports\\LeadsImport), false)\n#22 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Sheet.php(262): Maatwebsite\\Excel\\Imports\\ModelImporter->import(Object(PhpOffice\\PhpSpreadsheet\\Worksheet\\Worksheet), Object(App\\Imports\\LeadsImport), 2)\n#23 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Jobs\\ReadChunk.php(169): Maatwebsite\\Excel\\Sheet->import(Object(App\\Imports\\LeadsImport), 2)\n#24 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Concerns\\ManagesTransactions.php(28): Maatwebsite\\Excel\\Jobs\\ReadChunk->Maatwebsite\\Excel\\Jobs\\{closure}(Object(Illuminate\\Database\\MySqlConnection))\n#25 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Transactions\\DbTransactionHandler.php(30): Illuminate\\Database\\Connection->transaction(Object(Closure))\n#26 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Jobs\\ReadChunk.php(175): Maatwebsite\\Excel\\Transactions\\DbTransactionHandler->__invoke(Object(Closure))\n#27 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Maatwebsite\\Excel\\Jobs\\ReadChunk->handle(Object(Maatwebsite\\Excel\\Transactions\\DbTransactionHandler))\n#28 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(37): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#29 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#30 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#31 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(596): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#32 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(94): Illuminate\\Container\\Container->call(Array)\n#33 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(Maatwebsite\\Excel\\Jobs\\ReadChunk))\n#34 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Maatwebsite\\Excel\\Jobs\\ReadChunk))\n#35 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(98): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#36 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(83): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(Maatwebsite\\Excel\\Jobs\\ReadChunk), false)\n#37 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(Maatwebsite\\Excel\\Jobs\\ReadChunk))\n#38 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Maatwebsite\\Excel\\Jobs\\ReadChunk))\n#39 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(85): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#40 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(59): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Maatwebsite\\Excel\\Jobs\\ReadChunk))\n#41 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#42 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(356): Illuminate\\Queue\\Jobs\\Job->fire()\n#43 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(306): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#44 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(132): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#45 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(112): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#46 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(96): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#47 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#48 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(37): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#49 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#50 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#51 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(596): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#52 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(134): Illuminate\\Container\\Container->call(Array)\n#53 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Command\\Command.php(256): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#54 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#55 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Application.php(971): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#56 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Application.php(290): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#57 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Application.php(166): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#58 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(93): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#59 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#60 C:\\xampp\\htdocs\\broker\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#61 {main}\n\nNext Doctrine\\DBAL\\Driver\\PDO\\Exception: SQLSTATE[22007]: Invalid datetime format: 1366 Incorrect integer value: \'DUBAI PROPERTIES\' for column `broker`.`leads`.`developer` at row 1 in C:\\xampp\\htdocs\\broker\\vendor\\doctrine\\dbal\\lib\\Doctrine\\DBAL\\Driver\\PDO\\Exception.php:18\nStack trace:\n#0 C:\\xampp\\htdocs\\broker\\vendor\\doctrine\\dbal\\lib\\Doctrine\\DBAL\\Driver\\PDOStatement.php(114): Doctrine\\DBAL\\Driver\\PDO\\Exception::new(Object(PDOException))\n#1 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(464): Doctrine\\DBAL\\Driver\\PDOStatement->execute()\n#2 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(664): Illuminate\\Database\\Connection->Illuminate\\Database\\{closure}(\'insert into `le...\', Array)\n#3 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(631): Illuminate\\Database\\Connection->runQueryCallback(\'insert into `le...\', Array, Object(Closure))\n#4 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(465): Illuminate\\Database\\Connection->run(\'insert into `le...\', Array, Object(Closure))\n#5 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(417): Illuminate\\Database\\Connection->statement(\'insert into `le...\', Array)\n#6 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Processors\\Processor.php(32): Illuminate\\Database\\Connection->insert(\'insert into `le...\', Array)\n#7 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Builder.php(2839): Illuminate\\Database\\Query\\Processors\\Processor->processInsertGetId(Object(Illuminate\\Database\\Query\\Builder), \'insert into `le...\', Array, \'id\')\n#8 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php(1422): Illuminate\\Database\\Query\\Builder->insertGetId(Array, \'id\')\n#9 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(902): Illuminate\\Database\\Eloquent\\Builder->__call(\'insertGetId\', Array)\n#10 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(867): Illuminate\\Database\\Eloquent\\Model->insertAndSetId(Object(Illuminate\\Database\\Eloquent\\Builder), Array)\n#11 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(730): Illuminate\\Database\\Eloquent\\Model->performInsert(Object(Illuminate\\Database\\Eloquent\\Builder))\n#12 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(759): Illuminate\\Database\\Eloquent\\Model->save(Array)\n#13 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Concerns\\ManagesTransactions.php(28): Illuminate\\Database\\Eloquent\\Model->Illuminate\\Database\\Eloquent\\{closure}(Object(Illuminate\\Database\\MySqlConnection))\n#14 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(760): Illuminate\\Database\\Connection->transaction(Object(Closure))\n#15 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelManager.php(153): Illuminate\\Database\\Eloquent\\Model->saveOrFail()\n#16 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\EnumeratesValues.php(202): Maatwebsite\\Excel\\Imports\\ModelManager->Maatwebsite\\Excel\\Imports\\{closure}(Object(Modules\\Sales\\Entities\\Lead), 0)\n#17 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelManager.php(162): Illuminate\\Support\\Collection->each(Object(Closure))\n#18 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\EnumeratesValues.php(202): Maatwebsite\\Excel\\Imports\\ModelManager->Maatwebsite\\Excel\\Imports\\{closure}(Array, 2)\n#19 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelManager.php(163): Illuminate\\Support\\Collection->each(Object(Closure))\n#20 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelManager.php(73): Maatwebsite\\Excel\\Imports\\ModelManager->singleFlush(Object(App\\Imports\\LeadsImport))\n#21 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelImporter.php(79): Maatwebsite\\Excel\\Imports\\ModelManager->flush(Object(App\\Imports\\LeadsImport), false)\n#22 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Sheet.php(262): Maatwebsite\\Excel\\Imports\\ModelImporter->import(Object(PhpOffice\\PhpSpreadsheet\\Worksheet\\Worksheet), Object(App\\Imports\\LeadsImport), 2)\n#23 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Jobs\\ReadChunk.php(169): Maatwebsite\\Excel\\Sheet->import(Object(App\\Imports\\LeadsImport), 2)\n#24 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Concerns\\ManagesTransactions.php(28): Maatwebsite\\Excel\\Jobs\\ReadChunk->Maatwebsite\\Excel\\Jobs\\{closure}(Object(Illuminate\\Database\\MySqlConnection))\n#25 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Transactions\\DbTransactionHandler.php(30): Illuminate\\Database\\Connection->transaction(Object(Closure))\n#26 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Jobs\\ReadChunk.php(175): Maatwebsite\\Excel\\Transactions\\DbTransactionHandler->__invoke(Object(Closure))\n#27 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Maatwebsite\\Excel\\Jobs\\ReadChunk->handle(Object(Maatwebsite\\Excel\\Transactions\\DbTransactionHandler))\n#28 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(37): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#29 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#30 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#31 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(596): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#32 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(94): Illuminate\\Container\\Container->call(Array)\n#33 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(Maatwebsite\\Excel\\Jobs\\ReadChunk))\n#34 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Maatwebsite\\Excel\\Jobs\\ReadChunk))\n#35 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(98): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#36 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(83): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(Maatwebsite\\Excel\\Jobs\\ReadChunk), false)\n#37 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(Maatwebsite\\Excel\\Jobs\\ReadChunk))\n#38 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Maatwebsite\\Excel\\Jobs\\ReadChunk))\n#39 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(85): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#40 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(59): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Maatwebsite\\Excel\\Jobs\\ReadChunk))\n#41 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#42 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(356): Illuminate\\Queue\\Jobs\\Job->fire()\n#43 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(306): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#44 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(132): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#45 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(112): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#46 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(96): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#47 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#48 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(37): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#49 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#50 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#51 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(596): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#52 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(134): Illuminate\\Container\\Container->call(Array)\n#53 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Command\\Command.php(256): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#54 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#55 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Application.php(971): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#56 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Application.php(290): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#57 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Application.php(166): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#58 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(93): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#59 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#60 C:\\xampp\\htdocs\\broker\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#61 {main}\n\nNext Illuminate\\Database\\QueryException: SQLSTATE[22007]: Invalid datetime format: 1366 Incorrect integer value: \'DUBAI PROPERTIES\' for column `broker`.`leads`.`developer` at row 1 (SQL: insert into `leads` (`developer`, `community`, `sub_community`, `property_no`, `property_purpose`, `property_reference`, `size_sqft`, `size_sqm`, `bedrooms`, `bathrooms`, `parkings`, `other`, `salutation`, `first_name`, `sec_name`, `full_name`, `partner_name`, `email1`, `email2`, `email3`, `phone1`, `phone2`, `phone3`, `phone4`, `skype`, `landline`, `fax`, `address`, `po_box`, `nationality_id`, `date_of_birth`, `passport`, `passport_expiration_date`, `source_id`, `type_id`, `qualification_id`, `communication_id`, `priority_id`, `property_id`, `agency_id`, `business_id`, `updated_at`, `created_at`) values (DUBAI PROPERTIES, SERENA, SERENA CASA DORA, PA3_001 002, ?, ?, 181.04, ?, 2, ?, ?, ?, MR, ANEES, AHMED, ANEES AHMED MUJEEB AHMED, ?, anees.ahmed@sap.com, ?, ?, 971505592757, ?, ?, ?, ?, ?, ?, ?, ?, 102, 1972-06-02, Z2035572, 43914, 1, 1, 1, 1, 1, 2, 1, 1, 2021-05-23 16:16:13, 2021-05-23 16:16:13)) in C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php:671\nStack trace:\n#0 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(631): Illuminate\\Database\\Connection->runQueryCallback(\'insert into `le...\', Array, Object(Closure))\n#1 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(465): Illuminate\\Database\\Connection->run(\'insert into `le...\', Array, Object(Closure))\n#2 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(417): Illuminate\\Database\\Connection->statement(\'insert into `le...\', Array)\n#3 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Processors\\Processor.php(32): Illuminate\\Database\\Connection->insert(\'insert into `le...\', Array)\n#4 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Builder.php(2839): Illuminate\\Database\\Query\\Processors\\Processor->processInsertGetId(Object(Illuminate\\Database\\Query\\Builder), \'insert into `le...\', Array, \'id\')\n#5 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php(1422): Illuminate\\Database\\Query\\Builder->insertGetId(Array, \'id\')\n#6 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(902): Illuminate\\Database\\Eloquent\\Builder->__call(\'insertGetId\', Array)\n#7 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(867): Illuminate\\Database\\Eloquent\\Model->insertAndSetId(Object(Illuminate\\Database\\Eloquent\\Builder), Array)\n#8 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(730): Illuminate\\Database\\Eloquent\\Model->performInsert(Object(Illuminate\\Database\\Eloquent\\Builder))\n#9 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(759): Illuminate\\Database\\Eloquent\\Model->save(Array)\n#10 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Concerns\\ManagesTransactions.php(28): Illuminate\\Database\\Eloquent\\Model->Illuminate\\Database\\Eloquent\\{closure}(Object(Illuminate\\Database\\MySqlConnection))\n#11 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(760): Illuminate\\Database\\Connection->transaction(Object(Closure))\n#12 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelManager.php(153): Illuminate\\Database\\Eloquent\\Model->saveOrFail()\n#13 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\EnumeratesValues.php(202): Maatwebsite\\Excel\\Imports\\ModelManager->Maatwebsite\\Excel\\Imports\\{closure}(Object(Modules\\Sales\\Entities\\Lead), 0)\n#14 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelManager.php(162): Illuminate\\Support\\Collection->each(Object(Closure))\n#15 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\EnumeratesValues.php(202): Maatwebsite\\Excel\\Imports\\ModelManager->Maatwebsite\\Excel\\Imports\\{closure}(Array, 2)\n#16 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelManager.php(163): Illuminate\\Support\\Collection->each(Object(Closure))\n#17 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelManager.php(73): Maatwebsite\\Excel\\Imports\\ModelManager->singleFlush(Object(App\\Imports\\LeadsImport))\n#18 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelImporter.php(79): Maatwebsite\\Excel\\Imports\\ModelManager->flush(Object(App\\Imports\\LeadsImport), false)\n#19 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Sheet.php(262): Maatwebsite\\Excel\\Imports\\ModelImporter->import(Object(PhpOffice\\PhpSpreadsheet\\Worksheet\\Worksheet), Object(App\\Imports\\LeadsImport), 2)\n#20 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Jobs\\ReadChunk.php(169): Maatwebsite\\Excel\\Sheet->import(Object(App\\Imports\\LeadsImport), 2)\n#21 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Concerns\\ManagesTransactions.php(28): Maatwebsite\\Excel\\Jobs\\ReadChunk->Maatwebsite\\Excel\\Jobs\\{closure}(Object(Illuminate\\Database\\MySqlConnection))\n#22 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Transactions\\DbTransactionHandler.php(30): Illuminate\\Database\\Connection->transaction(Object(Closure))\n#23 C:\\xampp\\htdocs\\broker\\vendor\\maatwebsite\\excel\\src\\Jobs\\ReadChunk.php(175): Maatwebsite\\Excel\\Transactions\\DbTransactionHandler->__invoke(Object(Closure))\n#24 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Maatwebsite\\Excel\\Jobs\\ReadChunk->handle(Object(Maatwebsite\\Excel\\Transactions\\DbTransactionHandler))\n#25 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(37): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#26 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#27 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#28 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(596): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#29 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(94): Illuminate\\Container\\Container->call(Array)\n#30 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(Maatwebsite\\Excel\\Jobs\\ReadChunk))\n#31 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Maatwebsite\\Excel\\Jobs\\ReadChunk))\n#32 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(98): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#33 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(83): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(Maatwebsite\\Excel\\Jobs\\ReadChunk), false)\n#34 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(Maatwebsite\\Excel\\Jobs\\ReadChunk))\n#35 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Maatwebsite\\Excel\\Jobs\\ReadChunk))\n#36 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(85): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#37 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(59): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Maatwebsite\\Excel\\Jobs\\ReadChunk))\n#38 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#39 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(356): Illuminate\\Queue\\Jobs\\Job->fire()\n#40 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(306): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#41 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(132): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#42 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(112): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#43 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(96): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#44 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#45 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(37): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#46 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#47 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#48 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(596): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#49 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(134): Illuminate\\Container\\Container->call(Array)\n#50 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Command\\Command.php(256): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#51 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#52 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Application.php(971): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#53 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Application.php(290): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#54 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Application.php(166): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#55 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(93): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#56 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#57 C:\\xampp\\htdocs\\broker\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#58 {main}', '2021-05-23 14:16:13');
INSERT INTO `failed_jobs` (`id`, `connection`, `queue`, `payload`, `exception`, `failed_at`) VALUES
(9, 'database', 'default', '{\"uuid\":\"04b8ca3e-880f-4651-8051-824e49c60c04\",\"displayName\":\"App\\\\Jobs\\\\SendFailedLeadsMail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"delay\":null,\"timeout\":null,\"timeoutAt\":null,\"data\":{\"commandName\":\"App\\\\Jobs\\\\SendFailedLeadsMail\",\"command\":\"O:28:\\\"App\\\\Jobs\\\\SendFailedLeadsMail\\\":10:{s:5:\\\"email\\\";s:21:\\\"hamed@onetecgroup.com\\\";s:6:\\\"agency\\\";s:1:\\\"1\\\";s:3:\\\"job\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:5:\\\"delay\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 'Swift_IoException: Unable to open file for reading [C:\\xampp\\htdocs\\broker\\storage\\app/failed leads1623054831.xlsx] in C:\\xampp\\htdocs\\broker\\vendor\\swiftmailer\\swiftmailer\\lib\\classes\\Swift\\ByteStream\\FileByteStream.php:131\nStack trace:\n#0 C:\\xampp\\htdocs\\broker\\vendor\\swiftmailer\\swiftmailer\\lib\\classes\\Swift\\ByteStream\\FileByteStream.php(77): Swift_ByteStream_FileByteStream->getReadHandle()\n#1 C:\\xampp\\htdocs\\broker\\vendor\\swiftmailer\\swiftmailer\\lib\\classes\\Swift\\Mime\\ContentEncoder\\Base64ContentEncoder.php(40): Swift_ByteStream_FileByteStream->read(8192)\n#2 C:\\xampp\\htdocs\\broker\\vendor\\swiftmailer\\swiftmailer\\lib\\classes\\Swift\\Mime\\SimpleMimeEntity.php(555): Swift_Mime_ContentEncoder_Base64ContentEncoder->encodeByteStream(Object(Swift_ByteStream_FileByteStream), Object(Swift_Transport_StreamBuffer), 0, 76)\n#3 C:\\xampp\\htdocs\\broker\\vendor\\swiftmailer\\swiftmailer\\lib\\classes\\Swift\\Mime\\SimpleMimeEntity.php(532): Swift_Mime_SimpleMimeEntity->bodyToByteStream(Object(Swift_Transport_StreamBuffer))\n#4 C:\\xampp\\htdocs\\broker\\vendor\\swiftmailer\\swiftmailer\\lib\\classes\\Swift\\Mime\\SimpleMimeEntity.php(570): Swift_Mime_SimpleMimeEntity->toByteStream(Object(Swift_Transport_StreamBuffer))\n#5 C:\\xampp\\htdocs\\broker\\vendor\\swiftmailer\\swiftmailer\\lib\\classes\\Swift\\Mime\\SimpleMimeEntity.php(532): Swift_Mime_SimpleMimeEntity->bodyToByteStream(Object(Swift_Transport_StreamBuffer))\n#6 C:\\xampp\\htdocs\\broker\\vendor\\swiftmailer\\swiftmailer\\lib\\classes\\Swift\\Mime\\SimpleMessage.php(601): Swift_Mime_SimpleMimeEntity->toByteStream(Object(Swift_Transport_StreamBuffer))\n#7 C:\\xampp\\htdocs\\broker\\vendor\\swiftmailer\\swiftmailer\\lib\\classes\\Swift\\Message.php(162): Swift_Mime_SimpleMessage->toByteStream(Object(Swift_Transport_StreamBuffer))\n#8 C:\\xampp\\htdocs\\broker\\vendor\\swiftmailer\\swiftmailer\\lib\\classes\\Swift\\Transport\\AbstractSmtpTransport.php(400): Swift_Message->toByteStream(Object(Swift_Transport_StreamBuffer))\n#9 C:\\xampp\\htdocs\\broker\\vendor\\swiftmailer\\swiftmailer\\lib\\classes\\Swift\\Transport\\AbstractSmtpTransport.php(502): Swift_Transport_AbstractSmtpTransport->streamMessage(Object(Swift_Message))\n#10 C:\\xampp\\htdocs\\broker\\vendor\\swiftmailer\\swiftmailer\\lib\\classes\\Swift\\Transport\\AbstractSmtpTransport.php(518): Swift_Transport_AbstractSmtpTransport->doMailTransaction(Object(Swift_Message), \'info@onetecgrou...\', Array, Array)\n#11 C:\\xampp\\htdocs\\broker\\vendor\\swiftmailer\\swiftmailer\\lib\\classes\\Swift\\Transport\\AbstractSmtpTransport.php(206): Swift_Transport_AbstractSmtpTransport->sendTo(Object(Swift_Message), \'info@onetecgrou...\', Array, Array)\n#12 C:\\xampp\\htdocs\\broker\\vendor\\swiftmailer\\swiftmailer\\lib\\classes\\Swift\\Mailer.php(71): Swift_Transport_AbstractSmtpTransport->send(Object(Swift_Message), Array)\n#13 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(521): Swift_Mailer->send(Object(Swift_Message), Array)\n#14 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(288): Illuminate\\Mail\\Mailer->sendSwiftMessage(Object(Swift_Message))\n#15 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(177): Illuminate\\Mail\\Mailer->send(Object(Illuminate\\Support\\HtmlString), Array, Object(Closure))\n#16 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\Localizable.php(19): Illuminate\\Mail\\Mailable->Illuminate\\Mail\\{closure}()\n#17 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailable.php(178): Illuminate\\Mail\\Mailable->withLocale(NULL, Object(Closure))\n#18 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(304): Illuminate\\Mail\\Mailable->send(Object(Illuminate\\Mail\\Mailer))\n#19 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(258): Illuminate\\Mail\\Mailer->sendMailable(Object(App\\Mail\\EmailGeneral))\n#20 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\PendingMail.php(121): Illuminate\\Mail\\Mailer->send(Object(App\\Mail\\EmailGeneral))\n#21 C:\\xampp\\htdocs\\broker\\app\\Jobs\\SendFailedLeadsMail.php(43): Illuminate\\Mail\\PendingMail->send(Object(App\\Mail\\EmailGeneral))\n#22 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): App\\Jobs\\SendFailedLeadsMail->handle()\n#23 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(37): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#24 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#25 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#26 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(596): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#27 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(94): Illuminate\\Container\\Container->call(Array)\n#28 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(App\\Jobs\\SendFailedLeadsMail))\n#29 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendFailedLeadsMail))\n#30 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(98): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#31 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(83): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(App\\Jobs\\SendFailedLeadsMail), false)\n#32 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(128): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(App\\Jobs\\SendFailedLeadsMail))\n#33 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(103): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(App\\Jobs\\SendFailedLeadsMail))\n#34 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(85): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#35 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(59): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(App\\Jobs\\SendFailedLeadsMail))\n#36 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(98): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Array)\n#37 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(356): Illuminate\\Queue\\Jobs\\Job->fire()\n#38 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(306): Illuminate\\Queue\\Worker->process(\'database\', Object(Illuminate\\Queue\\Jobs\\DatabaseJob), Object(Illuminate\\Queue\\WorkerOptions))\n#39 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(132): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\DatabaseJob), \'database\', Object(Illuminate\\Queue\\WorkerOptions))\n#40 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(112): Illuminate\\Queue\\Worker->daemon(\'database\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#41 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(96): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'database\', \'default\')\n#42 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#43 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(37): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#44 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#45 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#46 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(596): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#47 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(134): Illuminate\\Container\\Container->call(Array)\n#48 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Command\\Command.php(256): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#49 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(121): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#50 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Application.php(971): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#51 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Application.php(290): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#52 C:\\xampp\\htdocs\\broker\\vendor\\symfony\\console\\Application.php(166): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#53 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php(93): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#54 C:\\xampp\\htdocs\\broker\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(129): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#55 C:\\xampp\\htdocs\\broker\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#56 {main}', '2021-06-07 08:34:23');

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

--
-- Dumping data for table `image_banks`
--

INSERT INTO `image_banks` (`id`, `name`, `agency_id`, `business_id`, `user_id`, `deleted_at`, `created_at`, `updated_at`, `folder_id`, `dir`) VALUES
(1, 'main', 1, 1, 1, NULL, '2021-06-07 20:09:17', '2021-06-07 20:09:17', NULL, '1/1'),
(2, 'main', 3, 2, 10, NULL, '2021-06-17 17:27:46', '2021-06-17 17:27:46', NULL, '3/10');

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
  `developer` bigint(20) DEFAULT NULL,
  `community` bigint(20) UNSIGNED DEFAULT NULL,
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
  `sub_community` bigint(20) UNSIGNED DEFAULT NULL,
  `property_type` enum('commercial','residential') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'commercial',
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone1_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone2_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone3_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone4_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `campaign_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `campaign_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `campaign_lead_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `campaign_form_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `campaign_ad_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `campaign_ad_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `campaign_adset_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat_loc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng_loc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone1_symbol` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone2_symbol` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone3_symbol` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone4_symbol` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`id`, `salutation`, `agency_id`, `business_id`, `source_id`, `type_id`, `qualification_id`, `communication_id`, `priority_id`, `company`, `website`, `note`, `po_box`, `passport`, `passport_expiration_date`, `first_name`, `sec_name`, `full_name`, `partner_name`, `date_of_birth`, `email1`, `email2`, `email3`, `nationality_id`, `city_id`, `phone1`, `phone2`, `phone3`, `phone4`, `landline`, `fax`, `developer`, `community`, `building_name`, `property_purpose`, `property_no`, `property_reference`, `property_id`, `size_sqft`, `size_sqm`, `bedrooms`, `bathrooms`, `parkings`, `skype`, `country_code`, `country_flag`, `timezone`, `country`, `address`, `other`, `assigned_to`, `created_at`, `updated_at`, `sub_community`, `property_type`, `table_name`, `phone1_code`, `phone2_code`, `phone3_code`, `phone4_code`, `reference`, `campaign_id`, `campaign_name`, `campaign_lead_id`, `campaign_form_id`, `campaign_ad_id`, `campaign_ad_name`, `campaign_adset_name`, `lat_loc`, `lng_loc`, `status`, `phone1_symbol`, `phone2_symbol`, `phone3_symbol`, `phone4_symbol`) VALUES
(4, NULL, 3, 2, 6, 16, 3, NULL, NULL, '', NULL, '', NULL, '', '0000-00-00', 'Abdul', 'Hameed', 'Abdul Hameed Abdulla Mohamed Ibrahim S. Sayyah', '', '0000-00-00', 'ahsayaah@emirates.ae', '', '', NULL, NULL, '97143966500', '', '998977063133', '', NULL, '', NULL, NULL, NULL, 'rent', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, '0', '', NULL, NULL, '2021-06-15 12:15:16', '2021-06-15 12:15:16', NULL, 'commercial', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EG', NULL, NULL, NULL),
(5, NULL, 3, 2, NULL, NULL, 3, NULL, NULL, '', NULL, '', NULL, '', '0000-00-00', 'Aslam', 'Abbas', 'Aslam Abbas Hyderi', '', '0000-00-00', 'aslam_abbas@hotmail.com', '', '', NULL, NULL, '441932340282', '', '998973003300', '', NULL, '', NULL, NULL, NULL, 'rent', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, '0', '', NULL, NULL, '2021-06-15 12:15:16', '2021-06-15 12:15:16', NULL, 'commercial', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, NULL, 3, 2, NULL, NULL, NULL, NULL, NULL, '', NULL, '', NULL, '', '0000-00-00', 'Bhagwandas', 'Jethwani', 'Bhagwandas Jethwani Lokesh', '', '0000-00-00', 'lokeshbj@eim.ae', '', '', NULL, NULL, '97143515566', '', '00995593920909', '', NULL, '', NULL, NULL, NULL, 'rent', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, '0', '', NULL, NULL, '2021-06-15 12:15:16', '2021-06-15 12:15:16', NULL, 'commercial', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, NULL, 3, 2, NULL, NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, 'Devinder', 'Kaur', 'Devinder Kaur Arneja', '', '', 'arnejasi@emirates.net.ae', '', '', NULL, NULL, '00971505025797', '', '', '9710505025797', NULL, '', NULL, NULL, NULL, 'rent', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, '0', '', NULL, NULL, '2021-06-15 12:15:16', '2021-06-15 12:15:16', NULL, 'commercial', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, NULL, 3, 2, NULL, NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, 'Emad', 'Taleb', 'Emad Taleb Jassim Al Hawai', '', '', 'emad@btr.ae', '', '', NULL, NULL, '97143437000', '', '971504506960', '971504506960', NULL, '', NULL, NULL, NULL, 'rent', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, '0', '', NULL, NULL, '2021-06-15 12:15:17', '2021-06-15 12:15:17', NULL, 'commercial', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, NULL, 3, 2, NULL, NULL, NULL, NULL, NULL, '', NULL, '', NULL, '', '0000-00-00', 'Habib', 'Khoshnevissan', 'Habib Khoshnevissan', '', '0000-00-00', 'habib@gigtco.com', '', '', NULL, NULL, '97143559440', '', '971509036222', '', NULL, '', NULL, NULL, NULL, 'rent', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '971 4 421 0906', '', '', NULL, '0', '', NULL, NULL, '2021-06-15 12:15:17', '2021-06-15 12:15:17', NULL, 'commercial', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, NULL, 3, 2, NULL, NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, 'Harmendra', 'Prakash', 'Harmendra Prakash Ojha', '', '', 'harmendra.ojha@noorbank.com', '', '', NULL, NULL, '97143627329', '', '91921036432', '', NULL, '', NULL, NULL, NULL, 'rent', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, '0', '', NULL, NULL, '2021-06-15 12:15:17', '2021-06-15 12:15:17', NULL, 'commercial', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, NULL, 3, 2, NULL, NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, 'Hassan', 'Majeed', 'Hassan Majeed', '', '', 'hassan5712000@yahoo.com', '', '', NULL, NULL, '97143516717', '', '971504415311', '', NULL, '', NULL, NULL, NULL, 'rent', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4 5118401', '', '', NULL, '0', '', NULL, NULL, '2021-06-15 12:15:17', '2021-06-15 12:15:17', NULL, 'commercial', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, NULL, 3, 2, NULL, NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, 'Mamlakat', 'Mullayanova', 'Mamlakat Mullayanova', '', '', 'mamlakat@hotmail.com', '', '', NULL, NULL, '97148814423', '', '971504548162', '', NULL, '', NULL, NULL, NULL, 'rent', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '971  42692548', '', '', NULL, '0', '', NULL, NULL, '2021-06-15 12:15:17', '2021-06-15 12:15:17', NULL, 'commercial', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, NULL, 3, 2, NULL, NULL, NULL, NULL, NULL, '', NULL, '', NULL, '', '0000-00-00', 'Mohamed', 'Faizer', 'Mohamed Faizer Mohamed Farook', '', '0000-00-00', 'faizer543@gmail.com', '', '', NULL, NULL, '971042293513', '', '971506143423', '', NULL, '', NULL, NULL, NULL, 'rent', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '971 2 6414272', '', '', NULL, '0', '', NULL, NULL, '2021-06-15 12:15:17', '2021-06-15 12:15:17', NULL, 'commercial', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, NULL, 3, 2, NULL, NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, 'Muhammad', 'Zafar', 'Muhammad Zafar Arain', '', '', 'sindmotors@hotmail.com', '', '', NULL, NULL, '97143336892', '', '971504560033', '', NULL, '', NULL, NULL, NULL, 'rent', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '971 4 2217777', '', '', NULL, '0', '', NULL, NULL, '2021-06-15 12:15:17', '2021-06-15 12:15:17', NULL, 'commercial', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, NULL, 3, 2, NULL, NULL, NULL, NULL, NULL, '', NULL, '', NULL, '', '0000-00-00', 'Neeraj', 'Rathi', 'Neeraj Rathi', '', '0000-00-00', 'neeraj@wingspanindia.com', '', '', NULL, NULL, '9122810969', '971 4 336 5865', '971505536035', '', NULL, '', NULL, NULL, NULL, 'rent', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, '0', '', NULL, NULL, '2021-06-15 12:15:17', '2021-06-15 12:15:17', NULL, 'commercial', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, NULL, 3, 2, NULL, NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, 'Neeraj', 'Rathi', 'Neeraj Rathi', '', '', 'neerajrathi@gmail.com', '', '', NULL, NULL, '97143627330', '', '971504547014', '', NULL, '', NULL, NULL, NULL, 'rent', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, '0', '', NULL, NULL, '2021-06-15 12:15:17', '2021-06-15 12:15:17', NULL, 'commercial', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, NULL, 3, 2, NULL, NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, 'Rohit', 'Suri', 'Rohit Suri', '', '', 'rsurirohit@gmail.com', '', '', NULL, NULL, '96824561788', '', '447973459572', '', NULL, '', NULL, NULL, NULL, 'rent', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, '0', '', NULL, NULL, '2021-06-15 12:15:17', '2021-06-15 12:15:17', NULL, 'commercial', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, NULL, 3, 2, NULL, NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, '(Daoud', 'Yacoub)', '(Daoud Yacoub) Abed Khalil Kishta', '', '', 'info@ifc.wm.jo', '', '', NULL, NULL, '962795520098', '', '971508412496', '', NULL, '', NULL, NULL, NULL, 'rent', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, '0', '', NULL, NULL, '2021-06-15 12:15:18', '2021-06-15 12:15:18', NULL, 'commercial', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, NULL, 3, 2, NULL, NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, 'Aashi', 'Hasan', 'Aashi Hasan', '', '', 'aashi.hasan@ae.standardchartered.com', '', '', NULL, NULL, '971503823116', '', '255655011619', '', NULL, '', NULL, NULL, NULL, 'rent', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, '0', '', NULL, NULL, '2021-06-15 12:15:18', '2021-06-15 12:15:18', NULL, 'commercial', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, NULL, 3, 2, NULL, NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, 'Abbas', 'Iraj', 'Abbas Iraj Azharian', '', '', 'hoolu99@hotmail.com', '', '', NULL, NULL, '971503737441', '', '255718963151', '', NULL, '', NULL, NULL, NULL, 'rent', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, '0', '', NULL, NULL, '2021-06-15 12:15:18', '2021-06-15 12:15:18', NULL, 'commercial', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(121124, NULL, 3, 2, 64, NULL, 1, NULL, NULL, NULL, NULL, NULL, '', 'F15F78760', '0000-00-00', 'MARWAN', 'MOHAMMAD', 'MARWAN MOHAMMAD SAAD ABDULLA ALSHARIF', '', '0000-00-00', '', '', '', NULL, NULL, '971 504535550', '', '', '', NULL, '', NULL, NULL, NULL, 'rent', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, '0', '', NULL, NULL, '2021-06-15 18:35:35', '2021-06-15 18:35:35', NULL, 'commercial', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(121125, NULL, 3, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'interested to buy an apartment 1 bed in downtown&nbsp;', NULL, '', '0000-00-00', 'buyer', '', 'buyer ', '', '0000-00-00', 'gareno@eim.ae', '', '', NULL, NULL, '00971504791552', '', '', '', NULL, '', NULL, NULL, NULL, 'rent', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, 'United Arab Emirates', '', NULL, NULL, '2021-06-15 18:35:35', '2021-06-15 18:35:35', NULL, 'commercial', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(121126, NULL, 3, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'C4PR93147', '0000-00-00', 'SHEIKH', 'AHMED', 'SHEIKH AHMED BIN RASHID BIN SAEED AL MAKTOUM', '', '0000-00-00', '', '', '', NULL, NULL, '971 50 6247777', '', '', '', NULL, '', NULL, NULL, NULL, 'rent', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, '0', '', NULL, NULL, '2021-06-15 18:35:35', '2021-06-15 18:35:35', NULL, 'commercial', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(121127, 'Mr', 1, 1, 66, 17, 5, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'mohamed', 'ibrahim', 'mohamed ibrahim', NULL, NULL, NULL, NULL, NULL, 1, 1, '01006143107', NULL, NULL, NULL, NULL, NULL, 1, 664, NULL, 'rent', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '29 ممر، رحبة عابدين، عابدين، محافظة القاهرة‬، مصر', NULL, NULL, '2021-07-14 10:24:05', '2021-07-14 12:40:03', NULL, 'commercial', 'leads', '20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '30.045588765316822', '31.250892031860346', 'active', 'EG', '', '', ''),
(121128, 'Mr', 1, 1, 66, 17, 5, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, 'mohamed', 'ibrahim', 'mohamed ibrahim', NULL, NULL, NULL, NULL, NULL, 2, 1, '10061531087', '0100 614 3108', '0100 614 3167', '055 554 5458', NULL, NULL, 1, 664, NULL, 'rent', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'درب المسايره، درب نصر، بولاق، محافظة القاهرة‬، مصر', NULL, NULL, '2021-07-14 11:36:00', '2021-07-14 12:26:55', NULL, 'commercial', 'leads', '20', '20', '20', '971', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '30.06104141610788', '31.233897555541986', 'active', 'EG', 'EG', 'EG', 'AE');

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
(1, 'whatsapp', 'واتساب', 'whatsapp', 1, 1, '2021-03-21 20:37:05', '2021-03-21 20:37:05');

-- --------------------------------------------------------

--
-- Table structure for table `lead_notes`
--

CREATE TABLE `lead_notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lead_id` bigint(20) UNSIGNED DEFAULT NULL,
  `add_by` bigint(20) UNSIGNED DEFAULT NULL,
  `notes_en` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes_ar` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'urgent', 'عاجل', 'urgent', 1, 1, '2021-03-21 20:37:17', '2021-03-21 20:37:17');

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
(1, 'commerical', 'تجاري', 'commerical', 1, 1, '2021-03-21 20:38:46', '2021-03-21 20:38:46'),
(3, 'Commercial', 'Commercial', 'commercial', 1, 1, '2021-06-07 08:33:49', '2021-06-07 08:33:49');

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
(1, 'answered', 'answered', 'answered', 3, 2, '2021-06-15 12:15:16', '2021-06-15 12:15:16'),
(2, 'closed', 'closed', 'closed', 3, 2, '2021-06-15 12:15:16', '2021-06-15 12:15:16'),
(3, 'open', 'open', 'open', 3, 2, '2021-06-15 12:15:16', '2021-06-15 12:15:16'),
(4, 'in_progress', 'in_progress', 'in_progress', 3, 2, '2021-06-15 12:15:16', '2021-06-15 12:15:16'),
(5, 'qualif', 'qualif', 'qualif', 1, 1, '2021-06-30 14:32:22', '2021-06-30 14:32:22');

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
(1, 'Direct Call', 'Direct Call', 'direct_call', 3, 2, '2021-06-15 09:48:18', '2021-06-15 09:50:08'),
(2, 'DATABASE CRM 24', 'DATABASE CRM 24', 'database_crm_24', 3, 2, '2021-06-15 09:48:18', '2021-06-15 09:50:08'),
(3, 'Referral - Developer', 'Referral - Developer', 'referral_developer', 3, 2, '2021-06-15 09:48:18', '2021-06-15 09:50:08'),
(4, 'Other - Agent', 'Other - Agent', 'other_agent', 3, 2, '2021-06-15 09:48:18', '2021-06-15 09:50:08'),
(5, 'Telemarketing | Raoua', 'Telemarketing | Raoua', 'telemarketing_raoua', 3, 2, '2021-06-15 09:48:18', '2021-06-15 09:50:08'),
(6, 'BAYUT', 'BAYUT', 'bayut', 3, 2, '2021-06-15 09:48:18', '2021-06-15 09:50:08'),
(7, 'FB - Instagram', 'FB - Instagram', 'fb_instagram', 3, 2, '2021-06-15 09:48:18', '2021-06-15 09:50:08'),
(8, 'Property Finder', 'Property Finder', 'property_finder', 3, 2, '2021-06-15 09:48:18', '2021-06-15 09:50:08'),
(9, 'Dubizzle', 'Dubizzle', 'dubizzle', 3, 2, '2021-06-15 09:48:18', '2021-06-15 09:50:08'),
(10, 'Just Property', 'Just Property', 'just_property', 3, 2, '2021-06-15 09:48:18', '2021-06-15 09:50:08'),
(11, 'Property WIFI', 'Property WIFI', 'property_wifi', 3, 2, '2021-06-15 09:48:18', '2021-06-15 09:50:08'),
(12, 'SMS Campaign', 'SMS Campaign', 'sms_campaign', 3, 2, '2021-06-15 09:48:19', '2021-06-15 09:50:08'),
(13, 'Website', 'Website', 'website', 3, 2, '2021-06-15 09:48:19', '2021-06-15 09:50:08'),
(14, 'Other Portals', 'Other Portals', 'other_portals', 3, 2, '2021-06-15 09:48:19', '2021-06-15 09:50:08'),
(15, 'Referral - Friend', 'Referral - Friend', 'referral_friend', 3, 2, '2021-06-15 09:48:19', '2021-06-15 09:50:08'),
(16, 'Purchased | Pcasa', 'Purchased | Pcasa', 'purchased_pcasa', 3, 2, '2021-06-15 09:48:19', '2021-06-15 09:50:08'),
(17, 'DATABASE CRM 8', 'DATABASE CRM 8', 'database_crm_8', 3, 2, '2021-06-15 09:48:19', '2021-06-15 09:50:08'),
(18, 'DATABASE CRM 19', 'DATABASE CRM 19', 'database_crm_19', 3, 2, '2021-06-15 09:48:19', '2021-06-15 09:50:08'),
(19, 'DATABASE CRM 12', 'DATABASE CRM 12', 'database_crm_12', 3, 2, '2021-06-15 09:48:19', '2021-06-15 09:50:08'),
(20, 'DATABASE CRM 21', 'DATABASE CRM 21', 'database_crm_21', 3, 2, '2021-06-15 09:48:19', '2021-06-15 09:50:08'),
(21, 'DATABASE CRM 25', 'DATABASE CRM 25', 'database_crm_25', 3, 2, '2021-06-15 09:48:19', '2021-06-15 09:50:08'),
(22, 'DATABASE CRM 3', 'DATABASE CRM 3', 'database_crm_3', 3, 2, '2021-06-15 09:48:19', '2021-06-15 09:50:08'),
(23, 'Undefined', 'Undefined', 'undefined', 3, 2, '2021-06-15 09:48:19', '2021-06-15 09:50:08'),
(24, 'Marketing - Dreamsoft', 'Marketing - Dreamsoft', 'marketing_dreamsoft', 3, 2, '2021-06-15 09:48:19', '2021-06-15 09:50:08'),
(25, 'LINKEY', 'LINKEY', 'linkey', 3, 2, '2021-06-15 09:48:19', '2021-06-15 09:50:08'),
(26, 'Referral - Bank', 'Referral - Bank', 'referral_bank', 3, 2, '2021-06-15 09:48:19', '2021-06-15 09:50:08'),
(27, 'Referral - Client', 'Referral - Client', 'referral_client', 3, 2, '2021-06-15 09:48:19', '2021-06-15 09:50:08'),
(28, 'Other Sources', 'Other Sources', 'other_sources', 3, 2, '2021-06-15 09:48:19', '2021-06-15 09:50:08'),
(29, 'Telemarketing | Thouraya', 'Telemarketing | Thouraya', 'telemarketing_thouraya', 3, 2, '2021-06-15 09:48:19', '2021-06-15 09:50:08'),
(30, 'Email Marketing', 'Email Marketing', 'email_marketing', 3, 2, '2021-06-15 09:48:19', '2021-06-15 09:50:08'),
(31, 'DATABASE CRM 29', 'DATABASE CRM 29', 'database_crm_29', 3, 2, '2021-06-15 09:48:19', '2021-06-15 09:50:08'),
(32, 'Jumeirah Park', 'Jumeirah Park', 'jumeirah_park', 3, 2, '2021-06-15 09:48:19', '2021-06-15 09:50:08'),
(33, 'Motor City', 'Motor City', 'motor_city', 3, 2, '2021-06-15 09:48:19', '2021-06-15 09:50:08'),
(34, 'Down Town', 'Down Town', 'down_town', 3, 2, '2021-06-15 09:48:19', '2021-06-15 09:50:08'),
(35, 'The Greens', 'The Greens', 'the_greens', 3, 2, '2021-06-15 09:48:19', '2021-06-15 09:50:08'),
(36, 'Ocean Heights', 'Ocean Heights', 'ocean_heights', 3, 2, '2021-06-15 09:48:20', '2021-06-15 09:50:08'),
(37, 'The Palm', 'The Palm', 'the_palm', 3, 2, '2021-06-15 09:48:20', '2021-06-15 09:50:08'),
(38, 'DIFC', 'DIFC', 'difc', 3, 2, '2021-06-15 09:48:20', '2021-06-15 09:50:08'),
(39, 'Discovery Gardens', 'Discovery Gardens', 'discovery_gardens', 3, 2, '2021-06-15 09:48:20', '2021-06-15 09:50:08'),
(40, 'DATABASE CRM 7', 'DATABASE CRM 7', 'database_crm_7', 3, 2, '2021-06-15 09:48:20', '2021-06-15 09:50:08'),
(41, 'Arabian Ranches', 'Arabian Ranches', 'arabian_ranches', 3, 2, '2021-06-15 09:48:20', '2021-06-15 09:50:08'),
(42, 'The Lakes', 'The Lakes', 'the_lakes', 3, 2, '2021-06-15 09:48:20', '2021-06-15 09:50:08'),
(43, 'Emirates Hills', 'Emirates Hills', 'emirates_hills', 3, 2, '2021-06-15 09:48:20', '2021-06-15 09:50:08'),
(44, 'Dubai Marina', 'Dubai Marina', 'dubai_marina', 3, 2, '2021-06-15 09:48:20', '2021-06-15 09:50:08'),
(45, 'Meadows', 'Meadows', 'meadows', 3, 2, '2021-06-15 09:48:20', '2021-06-15 09:50:08'),
(46, 'Springs', 'Springs', 'springs', 3, 2, '2021-06-15 09:48:20', '2021-06-15 09:50:08'),
(47, 'Waterfront', 'Waterfront', 'waterfront', 3, 2, '2021-06-15 09:48:20', '2021-06-15 09:50:08'),
(48, 'Marsa Dubai', 'Marsa Dubai', 'marsa_dubai', 3, 2, '2021-06-15 09:48:20', '2021-06-15 09:50:08'),
(49, 'JBR', 'JBR', 'jbr', 3, 2, '2021-06-15 09:48:20', '2021-06-15 09:50:08'),
(50, 'Serena - Bella Casa', 'Serena - Bella Casa', 'serena_bella_casa', 3, 2, '2021-06-15 09:48:20', '2021-06-15 09:50:08'),
(51, 'Serena - Casa Dora', 'Serena - Casa Dora', 'serena_casa_dora', 3, 2, '2021-06-15 09:48:20', '2021-06-15 09:50:08'),
(52, 'Serena - Casa Viva', 'Serena - Casa Viva', 'serena_casa_viva', 3, 2, '2021-06-15 09:48:20', '2021-06-15 09:50:08'),
(53, 'MARINA CROWN TOWER', 'MARINA CROWN TOWER', 'marina_crown_tower', 3, 2, '2021-06-15 09:48:20', '2021-06-15 09:50:08'),
(54, 'MARINA HEIGHTS 1', 'MARINA HEIGHTS 1', 'marina_heights_1', 3, 2, '2021-06-15 09:48:20', '2021-06-15 09:50:08'),
(55, 'Almaty Trip', 'Almaty Trip', 'almaty_trip', 3, 2, '2021-06-15 09:48:20', '2021-06-15 09:50:08'),
(56, 'DOWNTOWN', 'DOWNTOWN', 'downtown', 3, 2, '2021-06-15 09:48:20', '2021-06-15 09:50:08'),
(57, 'DAMAC HILLS', 'DAMAC HILLS', 'damac_hills', 3, 2, '2021-06-15 09:48:20', '2021-06-15 09:50:08'),
(58, 'AL SATWA', 'AL SATWA', 'al_satwa', 3, 2, '2021-06-15 09:48:21', '2021-06-15 09:50:08'),
(59, 'AL BARSHA SOUTH THIRD', 'AL BARSHA SOUTH THIRD', 'al_barsha_south_third', 3, 2, '2021-06-15 09:48:21', '2021-06-15 09:50:08'),
(60, 'ABU HAIL', 'ABU HAIL', 'abu_hail', 3, 2, '2021-06-15 09:48:21', '2021-06-15 09:50:08'),
(61, 'JUMEIRAH LAKE TOWERS', 'JUMEIRAH LAKE TOWERS', 'jumeirah_lake_towers', 3, 2, '2021-06-15 09:48:21', '2021-06-15 09:50:08'),
(62, 'TECOM', 'TECOM', 'tecom', 3, 2, '2021-06-15 09:48:21', '2021-06-15 09:50:08'),
(63, 'INTERNATIONAL CITY', 'INTERNATIONAL CITY', 'international_city', 3, 2, '2021-06-15 09:48:21', '2021-06-15 09:50:08'),
(64, 'Nad Al Hamar', 'Nad Al Hamar', 'nad_al_hamar', 3, 2, '2021-06-15 09:48:21', '2021-06-15 09:50:08'),
(65, 'DOWNTOWN - Mohd Ghalwash', 'DOWNTOWN - Mohd Ghalwash', 'downtown_mohd_ghalwash', 3, 2, '2021-06-15 09:48:21', '2021-06-15 09:50:08'),
(66, 'test source', 'test source', 'test-source', 1, 1, '2021-06-16 18:39:16', '2021-06-16 18:39:16');

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

INSERT INTO `lead_types` (`id`, `name_en`, `name_ar`, `slug`, `agency_id`, `business_id`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Cancelled Call | Hang up', 'Cancelled Call | Hang up', 'cancelled_call_hang_up', 3, 2, '2021-06-15 10:26:17', '2021-06-15 10:26:17', NULL),
(2, 'DUPLICATE', 'DUPLICATE', 'duplicate', 3, 2, '2021-06-15 10:26:17', '2021-06-15 10:26:17', NULL),
(3, 'Follow up | Call Later', 'Follow up | Call Later', 'follow_up_call_later', 3, 2, '2021-06-15 10:26:17', '2021-06-15 10:26:17', NULL),
(4, 'Potential Buyer', 'Potential Buyer', 'potential_buyer', 3, 2, '2021-06-15 10:26:18', '2021-06-15 10:26:18', NULL),
(5, 'Landlord Lead', 'Landlord Lead', 'landlord_lead', 3, 2, '2021-06-15 10:26:18', '2021-06-15 10:26:18', NULL),
(6, 'Potential Tenant', 'Potential Tenant', 'potential_tenant', 3, 2, '2021-06-15 10:26:18', '2021-06-15 10:26:18', NULL),
(7, 'Agent', 'Agent', 'agent', 3, 2, '2021-06-15 10:26:18', '2021-06-15 10:26:18', NULL),
(8, 'Developer', 'Developer', 'developer', 3, 2, '2021-06-15 10:26:18', '2021-06-15 10:26:18', NULL),
(9, 'DONT CALL-  DND', 'DONT CALL-  DND', 'dont_call_dnd', 3, 2, '2021-06-15 10:26:18', '2021-06-15 10:26:18', NULL),
(10, 'Wrong | Out Of Service', 'Wrong | Out Of Service', 'wrong_out_of_service', 3, 2, '2021-06-15 10:26:18', '2021-06-15 10:26:18', NULL),
(11, 'Not Interested', 'Not Interested', 'not_interested', 3, 2, '2021-06-15 10:26:18', '2021-06-15 10:26:18', NULL),
(12, 'No Answer', 'No Answer', 'no_answer', 3, 2, '2021-06-15 10:26:18', '2021-06-15 10:26:18', NULL),
(13, 'Switched Off', 'Switched Off', 'switched_off', 3, 2, '2021-06-15 10:26:18', '2021-06-15 10:26:18', NULL),
(14, 'Building Landlord', 'Building Landlord', 'building_landlord', 3, 2, '2021-06-15 10:26:18', '2021-06-15 10:26:18', NULL),
(15, 'Undefined', 'Undefined', 'undefined', 3, 2, '2021-06-15 10:26:18', '2021-06-15 10:26:18', NULL),
(16, 'Commercial & Retail Client', 'Commercial & Retail Client', 'commercial_retail_client', 3, 2, '2021-06-15 10:26:18', '2021-06-15 10:26:18', NULL),
(17, 'type', 'type', 'type', 1, 1, '2021-06-30 14:32:10', '2021-06-30 14:32:10', NULL);

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
  `city_id` bigint(20) DEFAULT NULL,
  `community_id` bigint(20) DEFAULT NULL,
  `sub_community_id` bigint(20) DEFAULT NULL,
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
  `features` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loc_lat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loc_lng` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `added_by` bigint(20) UNSIGNED DEFAULT NULL,
  `hot` enum('hot','basic','signature') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'basic'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listings`
--

INSERT INTO `listings` (`id`, `agency_id`, `business_id`, `purpose`, `location`, `city_id`, `community_id`, `sub_community_id`, `state`, `unit_no`, `plot_no`, `street_no`, `view_ids`, `rent_frequency`, `comission_percent`, `comission_value`, `price`, `never_lived_in`, `featured_on_company_website`, `exclusive_rights`, `beds`, `baths`, `parkings`, `year_built`, `developer_id`, `plot_area`, `area`, `deposite_percent`, `deposite_value`, `listing_rent_cheque_id`, `key_location`, `govfield1`, `govfield2`, `yearly_service_charges`, `monthly_cooling_charges`, `monthly_cooling_provider`, `title`, `description_en`, `description_ar`, `portals`, `furnished`, `lsm`, `permit_no`, `rera_property_no_status`, `rera_property_no_log`, `rera_property_no`, `rera_property_expiry_date`, `rented`, `tenancy_contract_start_date`, `tenancy_contract_end_date`, `landlord_id`, `tenant_id`, `assigned_to`, `source_id`, `status`, `Note`, `created_at`, `updated_at`, `ref_id`, `listing_ref`, `type_id`, `features`, `loc_lat`, `loc_lng`, `added_by`, `hot`) VALUES
(11, 1, 1, 'rent', 'masr', 2, 5, 4, NULL, '15', '16', '17', '[\"4\"]', 'monthly', '5', '2000', '20000', 'yes', 'yes', 'yes', '2', '3', '2', '1990', 1, '166', '155', '5', '1000', 1, 'location of key', 'no idea', 'no idea', '150', '150', '150', 'title test', 'testing', NULL, '[\"1\"]', 'no', 'shared', 'tr5465465465', 'invalid', '1', '56465456', '2021-05-05', 'yes', '2021-05-04', '2021-05-05', 6, 9, 1, 2, 'review', 'note', '2021-04-29 15:24:08', '2021-07-04 15:45:30', 1, '1-Vl-S-1', 3, '{\"barbeque_area\":\"yes\",\"day_care_center\":\"yes\",\"kids_play_area\":\"yes\",\"lawn_or_garden\":\"yes\",\"cafeteria_or_canteen\":\"yes\",\"first_aid_medical_center\":\"yes\",\"gym_or_health_club\":\"yes\",\"jacuzzi\":\"yes\",\"sauna\":\"yes\",\"steam_room\":\"yes\",\"swimming_pool\":\"yes\",\"facilities_for_disabled\":\"yes\",\"laundry_room\":\"yes\",\"laundry_facility\":\"yes\",\"shared_kitchen\":\"yes\",\"completion_year\":\"1995\",\"elevators_in_building\":\"2\",\"total_floors\":\"4\",\"balcony_or_terrace\":\"yes\",\"service_elevator\":\"yes\",\"lobby_in_building\":\"yes\",\"prayer_room\":\"yes\",\"flooring\":\"tiles\",\"business_center\":\"yes\",\"conference_room\":\"yes\",\"security_stuff\":\"yes\",\"cctv_security\":\"yes\",\"transaction\":\"transaction\",\"pet_policy\":\"allowed\",\"land_area\":\"150\",\"nearby_schools\":\"nearby schools\",\"nearby_public_transport\":\"near by public transport\",\"floor\":\"2\",\"other_rooms\":\"rooms\",\"maid_rooms\":\"yes\",\"nearby_hospitals\":\"near by hostit\",\"other_nearby_places\":\"places\",\"other_main_features\":\"feature\",\"atm_facility\":\"yes\",\"number_of_bathrooms\":\"5\",\"nearby_shopping_malls\":\"shopping malls\",\"24_hours_concierge\":\"yes\",\"free_hold\":\"yes\",\"other_facilities\":\"yes\",\"number_of_bedrooms\":\"5\",\"distance_from_airport\":\"airposrt\",\"broad_band_internet\":\"yes\",\"satellite_cable_tv\":\"yes\",\"intercom\":\"yes\",\"double_glazed_windows\":\"yes\",\"centerally_air_conditioned\":\"yes\",\"central_heating\":\"yes\",\"electricity_backup\":\"yes\",\"furnitured\":\"yes\",\"parking_space\":\"space\",\"storage_area\":\"yes\",\"study_room\":\"yes\",\"waste_disposal\":\"yes\",\"maintenance_stuff\":\"yes\",\"cleaning_services\":\"yes\"}', NULL, NULL, NULL, 'basic'),
(12, 1, 1, 'sale', 'warraq', 1, 4, 6, NULL, NULL, NULL, 'warraq city', '[\"4\"]', NULL, NULL, NULL, '1500', 'no', 'no', 'no', NULL, NULL, NULL, NULL, 1, NULL, '150', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[]', 'no', 'shared', NULL, 'invalid', '1', NULL, NULL, 'no', NULL, NULL, 6, NULL, 1, 1, 'review', NULL, '2021-04-29 15:24:45', '2021-07-05 09:39:16', 2, '1-Vl-S-2', 3, '{\"barbeque_area\":\"no\",\"day_care_center\":\"no\",\"kids_play_area\":null,\"lawn_or_garden\":\"no\",\"cafeteria_or_canteen\":\"no\",\"first_aid_medical_center\":\"no\",\"gym_or_health_club\":\"no\",\"jacuzzi\":\"no\",\"sauna\":\"no\",\"steam_room\":\"no\",\"swimming_pool\":\"no\",\"facilities_for_disabled\":\"no\",\"laundry_room\":\"no\",\"laundry_facility\":\"no\",\"shared_kitchen\":\"no\",\"completion_year\":null,\"elevators_in_building\":null,\"total_floors\":null,\"balcony_or_terrace\":\"no\",\"service_elevator\":\"no\",\"lobby_in_building\":\"no\",\"prayer_room\":\"no\",\"flooring\":null,\"business_center\":\"no\",\"conference_room\":\"no\",\"security_stuff\":\"no\",\"cctv_security\":\"no\",\"view\":null,\"pet_policy\":null,\"land_area\":null,\"nearby_schools\":null,\"nearby_public_transport\":null,\"floor\":null,\"other_rooms\":null,\"maid_rooms\":\"no\",\"nearby_hospitals\":null,\"other_nearby_places\":null,\"other_main_features\":null,\"atm_facility\":\"no\",\"number_of_bathrooms\":null,\"nearby_shopping_malls\":null,\"24_hours_concierge\":\"no\",\"free_hold\":\"no\",\"other_facilities\":null,\"number_of_bedrooms\":null,\"distance_from_airport\":null,\"broad_band_internet\":\"no\",\"satellite_cable_tv\":\"no\",\"intercom\":\"no\",\"double_glazed_windows\":\"no\",\"centerally_air_conditioned\":\"no\",\"central_heating\":\"no\",\"electricity_backup\":\"no\",\"furnitured\":\"no\",\"parking_space\":null,\"storage_area\":\"no\",\"study_room\":\"no\",\"waste_disposal\":\"no\",\"maintenance_stuff\":\"no\",\"cleaning_services\":\"no\"}', NULL, NULL, NULL, 'basic'),
(13, 1, 1, 'sale', 'warraq', 2, 5, 4, NULL, NULL, NULL, 'warraq city', '[\"4\"]', NULL, NULL, NULL, '15000', 'no', 'no', 'no', '1', NULL, NULL, NULL, NULL, NULL, '150', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'shared', NULL, 'invalid', '1', NULL, NULL, 'no', NULL, NULL, 6, NULL, 2, 1, 'draft', NULL, '2021-04-29 15:34:07', '2021-07-04 15:14:06', 3, '1-Vl-S-3', 2, '{\"barbeque_area\":\"no\",\"day_care_center\":\"no\",\"kids_play_area\":null,\"lawn_or_garden\":\"no\",\"cafeteria_or_canteen\":\"no\",\"first_aid_medical_center\":\"no\",\"gym_or_health_club\":\"no\",\"jacuzzi\":\"no\",\"sauna\":\"no\",\"steam_room\":\"no\",\"swimming_pool\":\"no\",\"facilities_for_disabled\":\"no\",\"laundry_room\":\"no\",\"laundry_facility\":\"no\",\"shared_kitchen\":\"no\",\"completion_year\":null,\"elevators_in_building\":null,\"total_floors\":null,\"balcony_or_terrace\":\"no\",\"service_elevator\":\"no\",\"lobby_in_building\":\"no\",\"prayer_room\":\"no\",\"flooring\":null,\"business_center\":\"no\",\"conference_room\":\"no\",\"security_stuff\":\"no\",\"cctv_security\":\"no\",\"transaction\":null,\"pet_policy\":null,\"land_area\":null,\"nearby_schools\":null,\"nearby_public_transport\":null,\"floor\":null,\"other_rooms\":null,\"maid_rooms\":\"no\",\"nearby_hospitals\":null,\"other_nearby_places\":null,\"other_main_features\":null,\"atm_facility\":\"no\",\"number_of_bathrooms\":null,\"nearby_shopping_malls\":null,\"24_hours_concierge\":\"no\",\"free_hold\":\"no\",\"other_facilities\":null,\"number_of_bedrooms\":null,\"distance_from_airport\":null,\"broad_band_internet\":\"no\",\"satellite_cable_tv\":\"no\",\"intercom\":\"no\",\"double_glazed_windows\":\"no\",\"centerally_air_conditioned\":\"no\",\"central_heating\":\"no\",\"electricity_backup\":\"no\",\"furnitured\":\"no\",\"parking_space\":null,\"storage_area\":\"no\",\"study_room\":\"no\",\"waste_disposal\":\"no\",\"maintenance_stuff\":\"no\",\"cleaning_services\":\"no\"}', NULL, NULL, NULL, 'basic'),
(14, 2, 1, 'rent', 'warraq', 2, 5, 4, NULL, NULL, NULL, 'warraq city', '[\"4\"]', NULL, NULL, NULL, '15000', 'no', 'no', 'no', NULL, NULL, NULL, NULL, 1, NULL, '150', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'private', NULL, 'invalid', '1', NULL, NULL, 'no', NULL, NULL, 6, NULL, 2, 1, 'draft', NULL, '2021-04-29 15:36:43', '2021-04-29 15:36:43', 4, '1-Ap-R-4', 3, '{\"barbeque_area\":\"no\",\"day_care_center\":\"no\",\"kids_play_area\":null,\"lawn_or_garden\":\"no\",\"cafeteria_or_canteen\":\"no\",\"first_aid_medical_center\":\"no\",\"gym_or_health_club\":\"no\",\"jacuzzi\":\"no\",\"sauna\":\"no\",\"steam_room\":\"no\",\"swimming_pool\":\"no\",\"facilities_for_disabled\":\"no\",\"laundry_room\":\"no\",\"laundry_facility\":\"no\",\"shared_kitchen\":\"no\",\"completion_year\":null,\"elevators_in_building\":null,\"total_floors\":null,\"balcony_or_terrace\":\"no\",\"service_elevator\":\"no\",\"lobby_in_building\":\"no\",\"prayer_room\":\"no\",\"flooring\":null,\"business_center\":\"no\",\"conference_room\":\"no\",\"security_stuff\":\"no\",\"cctv_security\":\"no\",\"transaction\":null,\"pet_policy\":null,\"land_area\":null,\"nearby_schools\":null,\"nearby_public_transport\":null,\"floor\":null,\"other_rooms\":null,\"maid_rooms\":\"no\",\"nearby_hospitals\":null,\"other_nearby_places\":null,\"other_main_features\":null,\"atm_facility\":\"no\",\"number_of_bathrooms\":null,\"nearby_shopping_malls\":null,\"24_hours_concierge\":\"no\",\"free_hold\":\"no\",\"other_facilities\":null,\"number_of_bedrooms\":null,\"distance_from_airport\":null,\"broad_band_internet\":\"no\",\"satellite_cable_tv\":\"no\",\"intercom\":\"no\",\"double_glazed_windows\":\"no\",\"centerally_air_conditioned\":\"no\",\"central_heating\":\"no\",\"electricity_backup\":\"no\",\"furnitured\":\"no\",\"parking_space\":null,\"storage_area\":\"no\",\"study_room\":\"no\",\"waste_disposal\":\"no\",\"maintenance_stuff\":\"no\",\"cleaning_services\":\"no\"}', NULL, NULL, NULL, 'basic'),
(15, 1, 1, 'sale', 'warraq', 2, 5, 4, NULL, NULL, NULL, 'warraq city', '[\"4\"]', NULL, NULL, NULL, '150000', 'no', 'no', 'no', NULL, NULL, NULL, NULL, NULL, NULL, '150', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'shared', NULL, 'invalid', '1', NULL, NULL, 'no', NULL, NULL, 6, NULL, 2, 1, 'draft', NULL, '2021-04-29 15:41:40', '2021-07-04 15:14:06', 4, '1-Rf-S-4', 4, '{\"barbeque_area\":\"no\",\"day_care_center\":\"no\",\"kids_play_area\":null,\"lawn_or_garden\":\"no\",\"cafeteria_or_canteen\":\"no\",\"first_aid_medical_center\":\"no\",\"gym_or_health_club\":\"no\",\"jacuzzi\":\"no\",\"sauna\":\"no\",\"steam_room\":\"no\",\"swimming_pool\":\"no\",\"facilities_for_disabled\":\"no\",\"laundry_room\":\"no\",\"laundry_facility\":\"no\",\"shared_kitchen\":\"no\",\"completion_year\":null,\"elevators_in_building\":null,\"total_floors\":null,\"balcony_or_terrace\":\"no\",\"service_elevator\":\"no\",\"lobby_in_building\":\"no\",\"prayer_room\":\"no\",\"flooring\":null,\"business_center\":\"no\",\"conference_room\":\"no\",\"security_stuff\":\"no\",\"cctv_security\":\"no\",\"transaction\":null,\"pet_policy\":null,\"land_area\":null,\"nearby_schools\":null,\"nearby_public_transport\":null,\"floor\":null,\"other_rooms\":null,\"maid_rooms\":\"no\",\"nearby_hospitals\":null,\"other_nearby_places\":null,\"other_main_features\":null,\"atm_facility\":\"no\",\"number_of_bathrooms\":null,\"nearby_shopping_malls\":null,\"24_hours_concierge\":\"no\",\"free_hold\":\"no\",\"other_facilities\":null,\"number_of_bedrooms\":null,\"distance_from_airport\":null,\"broad_band_internet\":\"no\",\"satellite_cable_tv\":\"no\",\"intercom\":\"no\",\"double_glazed_windows\":\"no\",\"centerally_air_conditioned\":\"no\",\"central_heating\":\"no\",\"electricity_backup\":\"no\",\"furnitured\":\"no\",\"parking_space\":null,\"storage_area\":\"no\",\"study_room\":\"no\",\"waste_disposal\":\"no\",\"maintenance_stuff\":\"no\",\"cleaning_services\":\"no\"}', NULL, NULL, NULL, 'basic'),
(33, 1, 1, 'sale', 'warraq', 2, 5, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '25000', 'no', 'no', 'no', NULL, NULL, NULL, NULL, NULL, NULL, '150', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'shared', NULL, 'invalid', '1', NULL, NULL, 'no', NULL, NULL, 6, NULL, 1, 1, 'draft', NULL, '2021-05-03 01:01:14', '2021-07-04 15:43:16', 6, '1-Ap-S-6', 3, '{\"barbeque_area\":\"no\",\"day_care_center\":\"no\",\"kids_play_area\":null,\"lawn_or_garden\":\"no\",\"cafeteria_or_canteen\":\"no\",\"first_aid_medical_center\":\"no\",\"gym_or_health_club\":\"no\",\"jacuzzi\":\"no\",\"sauna\":\"no\",\"steam_room\":\"no\",\"swimming_pool\":\"no\",\"facilities_for_disabled\":\"no\",\"laundry_room\":\"no\",\"laundry_facility\":\"no\",\"shared_kitchen\":\"no\",\"completion_year\":null,\"elevators_in_building\":null,\"total_floors\":null,\"balcony_or_terrace\":\"no\",\"service_elevator\":\"no\",\"lobby_in_building\":\"no\",\"prayer_room\":\"no\",\"flooring\":null,\"business_center\":\"no\",\"conference_room\":\"no\",\"security_stuff\":\"no\",\"cctv_security\":\"no\",\"transaction\":null,\"pet_policy\":null,\"land_area\":null,\"nearby_schools\":null,\"nearby_public_transport\":null,\"floor\":null,\"other_rooms\":null,\"maid_rooms\":\"no\",\"nearby_hospitals\":null,\"other_nearby_places\":null,\"other_main_features\":null,\"atm_facility\":\"no\",\"number_of_bathrooms\":null,\"nearby_shopping_malls\":null,\"24_hours_concierge\":\"no\",\"free_hold\":\"no\",\"other_facilities\":null,\"number_of_bedrooms\":null,\"distance_from_airport\":null,\"broad_band_internet\":\"no\",\"satellite_cable_tv\":\"no\",\"intercom\":\"no\",\"double_glazed_windows\":\"no\",\"centerally_air_conditioned\":\"no\",\"central_heating\":\"no\",\"electricity_backup\":\"no\",\"furnitured\":\"no\",\"parking_space\":null,\"storage_area\":\"no\",\"study_room\":\"no\",\"waste_disposal\":\"no\",\"maintenance_stuff\":\"no\",\"cleaning_services\":\"no\"}', NULL, NULL, NULL, 'basic'),
(34, 1, 1, 'sale', 'warraq', 2, 5, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '15000', 'no', 'no', 'no', NULL, NULL, NULL, NULL, 1, NULL, '150', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'shared', NULL, 'invalid', '1', NULL, NULL, 'no', NULL, NULL, 6, NULL, 1, 1, 'draft', NULL, '2021-05-03 01:39:17', '2021-07-04 15:43:16', 7, '1-Ap-S-7', 3, '{\"barbeque_area\":\"no\",\"day_care_center\":\"no\",\"kids_play_area\":null,\"lawn_or_garden\":\"no\",\"cafeteria_or_canteen\":\"no\",\"first_aid_medical_center\":\"no\",\"gym_or_health_club\":\"no\",\"jacuzzi\":\"no\",\"sauna\":\"no\",\"steam_room\":\"no\",\"swimming_pool\":\"no\",\"facilities_for_disabled\":\"no\",\"laundry_room\":\"no\",\"laundry_facility\":\"no\",\"shared_kitchen\":\"no\",\"completion_year\":null,\"elevators_in_building\":null,\"total_floors\":null,\"balcony_or_terrace\":\"no\",\"service_elevator\":\"no\",\"lobby_in_building\":\"no\",\"prayer_room\":\"no\",\"flooring\":null,\"business_center\":\"no\",\"conference_room\":\"no\",\"security_stuff\":\"no\",\"cctv_security\":\"no\",\"transaction\":null,\"pet_policy\":null,\"land_area\":null,\"nearby_schools\":null,\"nearby_public_transport\":null,\"floor\":null,\"other_rooms\":null,\"maid_rooms\":\"no\",\"nearby_hospitals\":null,\"other_nearby_places\":null,\"other_main_features\":null,\"atm_facility\":\"no\",\"number_of_bathrooms\":null,\"nearby_shopping_malls\":null,\"24_hours_concierge\":\"no\",\"free_hold\":\"no\",\"other_facilities\":null,\"number_of_bedrooms\":null,\"distance_from_airport\":null,\"broad_band_internet\":\"no\",\"satellite_cable_tv\":\"no\",\"intercom\":\"no\",\"double_glazed_windows\":\"no\",\"centerally_air_conditioned\":\"no\",\"central_heating\":\"no\",\"electricity_backup\":\"no\",\"furnitured\":\"no\",\"parking_space\":null,\"storage_area\":\"no\",\"study_room\":\"no\",\"waste_disposal\":\"no\",\"maintenance_stuff\":\"no\",\"cleaning_services\":\"no\"}', NULL, NULL, NULL, 'basic'),
(35, 1, 1, 'sale', 'warraq', 2, 5, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '16000', 'no', 'no', 'no', NULL, NULL, NULL, NULL, 1, NULL, '150', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'shared', NULL, 'invalid', '1', NULL, NULL, 'no', NULL, NULL, 6, NULL, 1, 1, 'draft', NULL, '2021-05-03 01:45:35', '2021-07-04 15:43:16', 8, '1-Ap-S-8', 3, '{\"barbeque_area\":\"no\",\"day_care_center\":\"no\",\"kids_play_area\":null,\"lawn_or_garden\":\"no\",\"cafeteria_or_canteen\":\"no\",\"first_aid_medical_center\":\"no\",\"gym_or_health_club\":\"no\",\"jacuzzi\":\"no\",\"sauna\":\"no\",\"steam_room\":\"no\",\"swimming_pool\":\"no\",\"facilities_for_disabled\":\"no\",\"laundry_room\":\"no\",\"laundry_facility\":\"no\",\"shared_kitchen\":\"no\",\"completion_year\":null,\"elevators_in_building\":null,\"total_floors\":null,\"balcony_or_terrace\":\"no\",\"service_elevator\":\"no\",\"lobby_in_building\":\"no\",\"prayer_room\":\"no\",\"flooring\":null,\"business_center\":\"no\",\"conference_room\":\"no\",\"security_stuff\":\"no\",\"cctv_security\":\"no\",\"transaction\":null,\"pet_policy\":null,\"land_area\":null,\"nearby_schools\":null,\"nearby_public_transport\":null,\"floor\":null,\"other_rooms\":null,\"maid_rooms\":\"no\",\"nearby_hospitals\":null,\"other_nearby_places\":null,\"other_main_features\":null,\"atm_facility\":\"no\",\"number_of_bathrooms\":null,\"nearby_shopping_malls\":null,\"24_hours_concierge\":\"no\",\"free_hold\":\"no\",\"other_facilities\":null,\"number_of_bedrooms\":null,\"distance_from_airport\":null,\"broad_band_internet\":\"no\",\"satellite_cable_tv\":\"no\",\"intercom\":\"no\",\"double_glazed_windows\":\"no\",\"centerally_air_conditioned\":\"no\",\"central_heating\":\"no\",\"electricity_backup\":\"no\",\"furnitured\":\"no\",\"parking_space\":null,\"storage_area\":\"no\",\"study_room\":\"no\",\"waste_disposal\":\"no\",\"maintenance_stuff\":\"no\",\"cleaning_services\":\"no\"}', NULL, NULL, NULL, 'basic'),
(36, 1, 1, 'sale', 'warraq', 2, 5, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '15000', 'no', 'no', 'no', NULL, NULL, NULL, NULL, NULL, NULL, '150', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'shared', NULL, 'invalid', '1', NULL, NULL, 'no', NULL, NULL, 6, NULL, 1, 1, 'draft', NULL, '2021-05-03 02:05:54', '2021-07-04 15:43:16', 9, '1-Vl-S-9', 2, '{\"barbeque_area\":\"no\",\"day_care_center\":\"no\",\"kids_play_area\":null,\"lawn_or_garden\":\"no\",\"cafeteria_or_canteen\":\"no\",\"first_aid_medical_center\":\"no\",\"gym_or_health_club\":\"no\",\"jacuzzi\":\"no\",\"sauna\":\"no\",\"steam_room\":\"no\",\"swimming_pool\":\"no\",\"facilities_for_disabled\":\"no\",\"laundry_room\":\"no\",\"laundry_facility\":\"no\",\"shared_kitchen\":\"no\",\"completion_year\":null,\"elevators_in_building\":null,\"total_floors\":null,\"balcony_or_terrace\":\"no\",\"service_elevator\":\"no\",\"lobby_in_building\":\"no\",\"prayer_room\":\"no\",\"flooring\":null,\"business_center\":\"no\",\"conference_room\":\"no\",\"security_stuff\":\"no\",\"cctv_security\":\"no\",\"transaction\":null,\"pet_policy\":null,\"land_area\":null,\"nearby_schools\":null,\"nearby_public_transport\":null,\"floor\":null,\"other_rooms\":null,\"maid_rooms\":\"no\",\"nearby_hospitals\":null,\"other_nearby_places\":null,\"other_main_features\":null,\"atm_facility\":\"no\",\"number_of_bathrooms\":null,\"nearby_shopping_malls\":null,\"24_hours_concierge\":\"no\",\"free_hold\":\"no\",\"other_facilities\":null,\"number_of_bedrooms\":null,\"distance_from_airport\":null,\"broad_band_internet\":\"no\",\"satellite_cable_tv\":\"no\",\"intercom\":\"no\",\"double_glazed_windows\":\"no\",\"centerally_air_conditioned\":\"no\",\"central_heating\":\"no\",\"electricity_backup\":\"no\",\"furnitured\":\"no\",\"parking_space\":null,\"storage_area\":\"no\",\"study_room\":\"no\",\"waste_disposal\":\"no\",\"maintenance_stuff\":\"no\",\"cleaning_services\":\"no\"}', NULL, NULL, NULL, 'basic'),
(37, 1, 1, 'sale', 'warraq', 2, 5, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '15000', 'no', 'no', 'no', NULL, NULL, NULL, NULL, 1, NULL, '150', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"1\"]', 'no', 'shared', NULL, 'invalid', '1', NULL, NULL, 'no', NULL, NULL, 6, NULL, 1, 1, 'draft', NULL, '2021-05-03 02:08:32', '2021-07-04 15:43:16', 10, '1-Vl-S-10', 2, '{\"barbeque_area\":\"no\",\"day_care_center\":\"no\",\"kids_play_area\":null,\"lawn_or_garden\":\"no\",\"cafeteria_or_canteen\":\"no\",\"first_aid_medical_center\":\"no\",\"gym_or_health_club\":\"no\",\"jacuzzi\":\"no\",\"sauna\":\"no\",\"steam_room\":\"no\",\"swimming_pool\":\"no\",\"facilities_for_disabled\":\"no\",\"laundry_room\":\"no\",\"laundry_facility\":\"no\",\"shared_kitchen\":\"no\",\"completion_year\":null,\"elevators_in_building\":null,\"total_floors\":null,\"balcony_or_terrace\":\"no\",\"service_elevator\":\"no\",\"lobby_in_building\":\"no\",\"prayer_room\":\"no\",\"flooring\":null,\"business_center\":\"no\",\"conference_room\":\"no\",\"security_stuff\":\"no\",\"cctv_security\":\"no\",\"transaction\":null,\"pet_policy\":null,\"land_area\":null,\"nearby_schools\":null,\"nearby_public_transport\":null,\"floor\":null,\"other_rooms\":null,\"maid_rooms\":\"no\",\"nearby_hospitals\":null,\"other_nearby_places\":null,\"other_main_features\":null,\"atm_facility\":\"no\",\"number_of_bathrooms\":null,\"nearby_shopping_malls\":null,\"24_hours_concierge\":\"no\",\"free_hold\":\"no\",\"other_facilities\":null,\"number_of_bedrooms\":null,\"distance_from_airport\":null,\"broad_band_internet\":\"no\",\"satellite_cable_tv\":\"no\",\"intercom\":\"no\",\"double_glazed_windows\":\"no\",\"centerally_air_conditioned\":\"no\",\"central_heating\":\"no\",\"electricity_backup\":\"no\",\"furnitured\":\"no\",\"parking_space\":null,\"storage_area\":\"no\",\"study_room\":\"no\",\"waste_disposal\":\"no\",\"maintenance_stuff\":\"no\",\"cleaning_services\":\"no\"}', NULL, NULL, NULL, 'basic'),
(38, 1, 1, 'rent', 'warraq', 2, 5, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '15000', 'no', 'no', 'no', NULL, NULL, NULL, NULL, NULL, NULL, '150', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'shared', NULL, 'invalid', '1', NULL, NULL, 'yes', '2021-05-03', '2021-05-03', NULL, 9, 1, 1, 'draft', NULL, '2021-05-03 02:46:59', '2021-07-04 15:43:16', 11, '1-Vl-R-11', 2, '{\"barbeque_area\":\"no\",\"day_care_center\":\"no\",\"kids_play_area\":null,\"lawn_or_garden\":\"no\",\"cafeteria_or_canteen\":\"no\",\"first_aid_medical_center\":\"no\",\"gym_or_health_club\":\"no\",\"jacuzzi\":\"no\",\"sauna\":\"no\",\"steam_room\":\"no\",\"swimming_pool\":\"no\",\"facilities_for_disabled\":\"no\",\"laundry_room\":\"no\",\"laundry_facility\":\"no\",\"shared_kitchen\":\"no\",\"completion_year\":null,\"elevators_in_building\":null,\"total_floors\":null,\"balcony_or_terrace\":\"no\",\"service_elevator\":\"no\",\"lobby_in_building\":\"no\",\"prayer_room\":\"no\",\"flooring\":null,\"business_center\":\"no\",\"conference_room\":\"no\",\"security_stuff\":\"no\",\"cctv_security\":\"no\",\"transaction\":null,\"pet_policy\":null,\"land_area\":null,\"nearby_schools\":null,\"nearby_public_transport\":null,\"floor\":null,\"other_rooms\":null,\"maid_rooms\":\"no\",\"nearby_hospitals\":null,\"other_nearby_places\":null,\"other_main_features\":null,\"atm_facility\":\"no\",\"number_of_bathrooms\":null,\"nearby_shopping_malls\":null,\"24_hours_concierge\":\"no\",\"free_hold\":\"no\",\"other_facilities\":null,\"number_of_bedrooms\":null,\"distance_from_airport\":null,\"broad_band_internet\":\"no\",\"satellite_cable_tv\":\"no\",\"intercom\":\"no\",\"double_glazed_windows\":\"no\",\"centerally_air_conditioned\":\"no\",\"central_heating\":\"no\",\"electricity_backup\":\"no\",\"furnitured\":\"no\",\"parking_space\":null,\"storage_area\":\"no\",\"study_room\":\"no\",\"waste_disposal\":\"no\",\"maintenance_stuff\":\"no\",\"cleaning_services\":\"no\"}', NULL, NULL, NULL, 'basic'),
(39, 1, 1, 'rent', 'مصر للبترول، ش التحرير، الدرب الأحمر، محافظة القاهرة‬', 2, 5, 4, NULL, NULL, NULL, NULL, '[]', NULL, NULL, NULL, '91000', 'no', 'no', 'no', NULL, NULL, NULL, NULL, NULL, NULL, '150', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[]', 'no', 'shared', NULL, 'invalid', '1', NULL, NULL, 'yes', NULL, NULL, NULL, NULL, 1, 1, 'draft', NULL, '2021-05-03 02:51:32', '2021-07-04 15:43:16', 12, '1-Vl-R-12', 2, '{\"barbeque_area\":\"no\",\"day_care_center\":\"no\",\"kids_play_area\":null,\"lawn_or_garden\":\"no\",\"cafeteria_or_canteen\":\"no\",\"first_aid_medical_center\":\"no\",\"gym_or_health_club\":\"no\",\"jacuzzi\":\"no\",\"sauna\":\"no\",\"steam_room\":\"no\",\"swimming_pool\":\"no\",\"facilities_for_disabled\":\"no\",\"laundry_room\":\"no\",\"laundry_facility\":\"no\",\"shared_kitchen\":\"no\",\"completion_year\":null,\"elevators_in_building\":null,\"total_floors\":null,\"balcony_or_terrace\":\"no\",\"service_elevator\":\"no\",\"lobby_in_building\":\"no\",\"prayer_room\":\"no\",\"flooring\":null,\"business_center\":\"no\",\"conference_room\":\"no\",\"security_stuff\":\"no\",\"cctv_security\":\"no\",\"transaction\":null,\"pet_policy\":null,\"land_area\":null,\"nearby_schools\":null,\"nearby_public_transport\":null,\"floor\":null,\"other_rooms\":null,\"maid_rooms\":\"no\",\"nearby_hospitals\":null,\"other_nearby_places\":null,\"other_main_features\":null,\"atm_facility\":\"no\",\"number_of_bathrooms\":null,\"nearby_shopping_malls\":null,\"24_hours_concierge\":\"no\",\"free_hold\":\"no\",\"other_facilities\":null,\"number_of_bedrooms\":null,\"distance_from_airport\":null,\"broad_band_internet\":\"no\",\"satellite_cable_tv\":\"no\",\"intercom\":\"no\",\"double_glazed_windows\":\"no\",\"centerally_air_conditioned\":\"no\",\"central_heating\":\"no\",\"electricity_backup\":\"no\",\"furnitured\":\"no\",\"parking_space\":null,\"storage_area\":\"no\",\"study_room\":\"no\",\"waste_disposal\":\"no\",\"maintenance_stuff\":\"no\",\"cleaning_services\":\"no\"}', '30.04737188654326', '31.255215683544904', NULL, 'basic'),
(42, 1, 1, 'sale', 'مركز الدقى للأشعة، التحرير، الدقي، الدقى', 2, 5, 4, NULL, NULL, NULL, NULL, '[\"4\"]', NULL, NULL, NULL, '1550', 'yes', 'no', 'no', '1', '2', '2', '1991', NULL, NULL, '150', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[]', 'no', 'shared', NULL, 'invalid', '1', NULL, NULL, 'no', NULL, NULL, 6, NULL, 1, 1, 'draft', NULL, '2021-05-20 13:53:18', '2021-07-04 15:43:16', 13, '1-Vl-S-13', 2, '{\"barbeque_area\":\"no\",\"day_care_center\":\"no\",\"kids_play_area\":null,\"lawn_or_garden\":\"no\",\"cafeteria_or_canteen\":\"no\",\"first_aid_medical_center\":\"no\",\"gym_or_health_club\":\"no\",\"jacuzzi\":\"no\",\"sauna\":\"no\",\"steam_room\":\"no\",\"swimming_pool\":\"no\",\"facilities_for_disabled\":\"no\",\"laundry_room\":\"no\",\"laundry_facility\":\"no\",\"shared_kitchen\":\"no\",\"completion_year\":null,\"elevators_in_building\":null,\"total_floors\":null,\"balcony_or_terrace\":\"no\",\"service_elevator\":\"no\",\"lobby_in_building\":\"no\",\"prayer_room\":\"no\",\"flooring\":null,\"business_center\":\"no\",\"conference_room\":\"no\",\"security_stuff\":\"no\",\"cctv_security\":\"no\",\"view\":null,\"pet_policy\":null,\"land_area\":null,\"nearby_schools\":null,\"nearby_public_transport\":null,\"floor\":null,\"other_rooms\":null,\"maid_rooms\":\"no\",\"nearby_hospitals\":null,\"other_nearby_places\":null,\"other_main_features\":null,\"atm_facility\":\"no\",\"number_of_bathrooms\":null,\"nearby_shopping_malls\":null,\"24_hours_concierge\":\"no\",\"free_hold\":\"no\",\"other_facilities\":null,\"number_of_bedrooms\":null,\"distance_from_airport\":null,\"broad_band_internet\":\"no\",\"satellite_cable_tv\":\"no\",\"intercom\":\"no\",\"double_glazed_windows\":\"no\",\"centerally_air_conditioned\":\"no\",\"central_heating\":\"no\",\"electricity_backup\":\"no\",\"furnitured\":\"no\",\"parking_space\":null,\"storage_area\":\"no\",\"study_room\":\"no\",\"waste_disposal\":\"no\",\"maintenance_stuff\":\"no\",\"cleaning_services\":\"no\"}', '30.038452', '31.2099255', 1, 'basic'),
(43, 1, 1, 'sale', 'dubai', 33, 250, NULL, NULL, NULL, NULL, NULL, '[\"4\"]', NULL, NULL, NULL, '5000', 'no', 'no', 'no', NULL, NULL, NULL, NULL, NULL, NULL, '1500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[]', 'no', 'shared', NULL, 'invalid', '1', NULL, NULL, 'no', NULL, NULL, NULL, NULL, 1, 66, 'draft', NULL, '2021-06-16 18:39:26', '2021-07-04 15:43:16', 14, '1-Vl-S-14', 2, '{\"barbeque_area\":\"no\",\"day_care_center\":\"no\",\"kids_play_area\":null,\"lawn_or_garden\":\"no\",\"cafeteria_or_canteen\":\"no\",\"first_aid_medical_center\":\"no\",\"gym_or_health_club\":\"no\",\"jacuzzi\":\"no\",\"sauna\":\"no\",\"steam_room\":\"no\",\"swimming_pool\":\"no\",\"facilities_for_disabled\":\"no\",\"laundry_room\":\"no\",\"laundry_facility\":\"no\",\"shared_kitchen\":\"no\",\"completion_year\":null,\"elevators_in_building\":null,\"total_floors\":null,\"balcony_or_terrace\":\"no\",\"service_elevator\":\"no\",\"lobby_in_building\":\"no\",\"prayer_room\":\"no\",\"flooring\":null,\"business_center\":\"no\",\"conference_room\":\"no\",\"security_stuff\":\"no\",\"cctv_security\":\"no\",\"view\":null,\"pet_policy\":null,\"land_area\":null,\"nearby_schools\":null,\"nearby_public_transport\":null,\"floor\":null,\"other_rooms\":null,\"maid_rooms\":\"no\",\"nearby_hospitals\":null,\"other_nearby_places\":null,\"other_main_features\":null,\"atm_facility\":\"no\",\"number_of_bathrooms\":null,\"nearby_shopping_malls\":null,\"24_hours_concierge\":\"no\",\"free_hold\":\"no\",\"other_facilities\":null,\"number_of_bedrooms\":null,\"distance_from_airport\":null,\"broad_band_internet\":\"no\",\"satellite_cable_tv\":\"no\",\"intercom\":\"no\",\"double_glazed_windows\":\"no\",\"centerally_air_conditioned\":\"no\",\"central_heating\":\"no\",\"electricity_backup\":\"no\",\"furnitured\":\"no\",\"parking_space\":null,\"storage_area\":\"no\",\"study_room\":\"no\",\"waste_disposal\":\"no\",\"maintenance_stuff\":\"no\",\"cleaning_services\":\"no\"}', '30.0112085', '31.33056430000001', 1, 'basic'),
(44, 1, 1, 'sale', 'Marina Gate - Marina Promenade - Dubai', 34, 8, 8, NULL, '3004', NULL, NULL, '[\"4\"]', 'yearly', NULL, '0', '139997', 'no', 'no', 'no', '1', '1', '1', NULL, NULL, NULL, '805', NULL, '0', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[]', 'no', 'shared', NULL, 'invalid', '1', NULL, NULL, 'no', NULL, NULL, NULL, NULL, 1, 66, 'live', NULL, '2021-06-22 18:43:32', '2021-07-04 15:14:06', 15, '1-Ap-S-15', 3, '{\"barbeque_area\":\"no\",\"day_care_center\":\"no\",\"kids_play_area\":null,\"lawn_or_garden\":\"no\",\"cafeteria_or_canteen\":\"no\",\"first_aid_medical_center\":\"no\",\"gym_or_health_club\":\"no\",\"jacuzzi\":\"no\",\"sauna\":\"no\",\"steam_room\":\"no\",\"swimming_pool\":\"no\",\"facilities_for_disabled\":\"no\",\"laundry_room\":\"no\",\"laundry_facility\":\"no\",\"shared_kitchen\":\"no\",\"completion_year\":null,\"elevators_in_building\":null,\"total_floors\":null,\"balcony_or_terrace\":\"no\",\"service_elevator\":\"no\",\"lobby_in_building\":\"no\",\"prayer_room\":\"no\",\"flooring\":null,\"business_center\":\"no\",\"conference_room\":\"no\",\"security_stuff\":\"no\",\"cctv_security\":\"no\",\"view\":null,\"pet_policy\":null,\"land_area\":null,\"nearby_schools\":null,\"nearby_public_transport\":null,\"floor\":null,\"other_rooms\":null,\"maid_rooms\":\"no\",\"nearby_hospitals\":null,\"other_nearby_places\":null,\"other_main_features\":null,\"atm_facility\":\"no\",\"number_of_bathrooms\":null,\"nearby_shopping_malls\":null,\"24_hours_concierge\":\"no\",\"free_hold\":\"no\",\"other_facilities\":null,\"number_of_bedrooms\":null,\"distance_from_airport\":null,\"broad_band_internet\":\"no\",\"satellite_cable_tv\":\"no\",\"intercom\":\"no\",\"double_glazed_windows\":\"no\",\"centerally_air_conditioned\":\"no\",\"central_heating\":\"no\",\"electricity_backup\":\"no\",\"furnitured\":\"no\",\"parking_space\":null,\"storage_area\":\"no\",\"study_room\":\"no\",\"waste_disposal\":\"no\",\"maintenance_stuff\":\"no\",\"cleaning_services\":\"no\"}', '25.0867931', '55.1475512', 1, 'basic'),
(45, 1, 1, 'sale', 'Marina Gate - Marina Promenade - Dubai', 34, 8, NULL, NULL, NULL, NULL, NULL, '[\"4\"]', NULL, NULL, '0', '200000', 'no', 'no', 'no', '1', '2', '1', NULL, NULL, NULL, '805', '2', '4,000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[]', 'no', 'shared', NULL, 'invalid', '1', NULL, NULL, 'no', NULL, NULL, NULL, NULL, 1, 66, 'draft', NULL, '2021-06-22 18:56:44', '2021-07-04 15:43:16', 16, '1-Ap-S-16', 3, '{\"barbeque_area\":\"no\",\"day_care_center\":\"no\",\"kids_play_area\":null,\"lawn_or_garden\":\"no\",\"cafeteria_or_canteen\":\"no\",\"first_aid_medical_center\":\"no\",\"gym_or_health_club\":\"no\",\"jacuzzi\":\"no\",\"sauna\":\"no\",\"steam_room\":\"no\",\"swimming_pool\":\"no\",\"facilities_for_disabled\":\"no\",\"laundry_room\":\"no\",\"laundry_facility\":\"no\",\"shared_kitchen\":\"no\",\"completion_year\":null,\"elevators_in_building\":null,\"total_floors\":null,\"balcony_or_terrace\":\"no\",\"service_elevator\":\"no\",\"lobby_in_building\":\"no\",\"prayer_room\":\"no\",\"flooring\":null,\"business_center\":\"no\",\"conference_room\":\"no\",\"security_stuff\":\"no\",\"cctv_security\":\"no\",\"view\":null,\"pet_policy\":null,\"land_area\":null,\"nearby_schools\":null,\"nearby_public_transport\":null,\"floor\":null,\"other_rooms\":null,\"maid_rooms\":\"no\",\"nearby_hospitals\":null,\"other_nearby_places\":null,\"other_main_features\":null,\"atm_facility\":\"no\",\"number_of_bathrooms\":null,\"nearby_shopping_malls\":null,\"24_hours_concierge\":\"no\",\"free_hold\":\"no\",\"other_facilities\":null,\"number_of_bedrooms\":null,\"distance_from_airport\":null,\"broad_band_internet\":\"no\",\"satellite_cable_tv\":\"no\",\"intercom\":\"no\",\"double_glazed_windows\":\"no\",\"centerally_air_conditioned\":\"no\",\"central_heating\":\"no\",\"electricity_backup\":\"no\",\"furnitured\":\"no\",\"parking_space\":null,\"storage_area\":\"no\",\"study_room\":\"no\",\"waste_disposal\":\"no\",\"maintenance_stuff\":\"no\",\"cleaning_services\":\"no\"}', '25.0867931', '55.1475512', 1, 'basic'),
(46, 3, 2, 'sale', 'Marina Gate - Marina Promenade - Dubai', 34, 8, 110, NULL, '3004', NULL, NULL, '[\"5\"]', 'yearly', '5', '7,000', '140000', 'no', 'no', 'no', '1', '2', '1', NULL, NULL, NULL, '828', '5', '7,000', 7, NULL, NULL, NULL, NULL, NULL, NULL, 'Fully Furnished 1 BR | Dubai Marina', NULL, NULL, '[]', 'no', 'private', NULL, 'invalid', '1', NULL, NULL, 'no', NULL, NULL, NULL, NULL, 14, 44, 'live', NULL, '2021-06-22 19:24:58', '2021-06-22 19:29:57', 1, '3-Ap-S-1', 3, '{\"barbeque_area\":\"no\",\"day_care_center\":\"no\",\"kids_play_area\":null,\"lawn_or_garden\":\"no\",\"cafeteria_or_canteen\":\"no\",\"first_aid_medical_center\":\"no\",\"gym_or_health_club\":\"no\",\"jacuzzi\":\"no\",\"sauna\":\"no\",\"steam_room\":\"no\",\"swimming_pool\":\"no\",\"facilities_for_disabled\":\"no\",\"laundry_room\":\"no\",\"laundry_facility\":\"no\",\"shared_kitchen\":\"no\",\"completion_year\":null,\"elevators_in_building\":null,\"total_floors\":null,\"balcony_or_terrace\":\"no\",\"service_elevator\":\"no\",\"lobby_in_building\":\"no\",\"prayer_room\":\"no\",\"flooring\":null,\"business_center\":\"no\",\"conference_room\":\"no\",\"security_stuff\":\"no\",\"cctv_security\":\"no\",\"view\":null,\"pet_policy\":null,\"land_area\":null,\"nearby_schools\":null,\"nearby_public_transport\":null,\"floor\":null,\"other_rooms\":null,\"maid_rooms\":\"no\",\"nearby_hospitals\":null,\"other_nearby_places\":null,\"other_main_features\":null,\"atm_facility\":\"no\",\"number_of_bathrooms\":null,\"nearby_shopping_malls\":null,\"24_hours_concierge\":\"no\",\"free_hold\":\"no\",\"other_facilities\":null,\"number_of_bedrooms\":null,\"distance_from_airport\":null,\"broad_band_internet\":\"no\",\"satellite_cable_tv\":\"no\",\"intercom\":\"no\",\"double_glazed_windows\":\"no\",\"centerally_air_conditioned\":\"no\",\"central_heating\":\"no\",\"electricity_backup\":\"no\",\"furnitured\":\"no\",\"parking_space\":null,\"storage_area\":\"no\",\"study_room\":\"no\",\"waste_disposal\":\"no\",\"maintenance_stuff\":\"no\",\"cleaning_services\":\"no\"}', '25.0867931', NULL, 10, 'basic'),
(47, 1, 1, 'sale', 'Louvre Abu Dhabi - Abu Dhabi', 32, 543, NULL, NULL, NULL, NULL, NULL, '[]', NULL, NULL, '0', '150000', 'no', 'no', 'no', NULL, NULL, NULL, NULL, NULL, NULL, '805', '2', '3,000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[]', 'no', 'shared', NULL, 'invalid', '1', NULL, NULL, 'no', NULL, NULL, NULL, NULL, 1, 66, 'live', NULL, '2021-06-24 12:36:24', '2021-07-04 15:43:46', 17, '1-Ap-S-17', 3, '{\"barbeque_area\":\"no\",\"day_care_center\":\"no\",\"kids_play_area\":null,\"lawn_or_garden\":\"no\",\"cafeteria_or_canteen\":\"no\",\"first_aid_medical_center\":\"no\",\"gym_or_health_club\":\"no\",\"jacuzzi\":\"no\",\"sauna\":\"no\",\"steam_room\":\"no\",\"swimming_pool\":\"no\",\"facilities_for_disabled\":\"no\",\"laundry_room\":\"no\",\"laundry_facility\":\"no\",\"shared_kitchen\":\"no\",\"completion_year\":null,\"elevators_in_building\":null,\"total_floors\":null,\"balcony_or_terrace\":\"no\",\"service_elevator\":\"no\",\"lobby_in_building\":\"no\",\"prayer_room\":\"no\",\"flooring\":null,\"business_center\":\"no\",\"conference_room\":\"no\",\"security_stuff\":\"no\",\"cctv_security\":\"no\",\"view\":null,\"pet_policy\":null,\"land_area\":null,\"nearby_schools\":null,\"nearby_public_transport\":null,\"floor\":null,\"other_rooms\":null,\"maid_rooms\":\"no\",\"nearby_hospitals\":null,\"other_nearby_places\":null,\"other_main_features\":null,\"atm_facility\":\"no\",\"number_of_bathrooms\":null,\"nearby_shopping_malls\":null,\"24_hours_concierge\":\"no\",\"free_hold\":\"no\",\"other_facilities\":null,\"number_of_bedrooms\":null,\"distance_from_airport\":null,\"broad_band_internet\":\"no\",\"satellite_cable_tv\":\"no\",\"intercom\":\"no\",\"double_glazed_windows\":\"no\",\"centerally_air_conditioned\":\"no\",\"central_heating\":\"no\",\"electricity_backup\":\"no\",\"furnitured\":\"no\",\"parking_space\":null,\"storage_area\":\"no\",\"study_room\":\"no\",\"waste_disposal\":\"no\",\"maintenance_stuff\":\"no\",\"cleaning_services\":\"no\"}', '24.5336954', '54.3981368', 1, 'basic'),
(51, 1, 1, 'sale', 'Last Exit Al Khawaneej - Dubai', 32, 543, NULL, NULL, NULL, NULL, NULL, '[\"4\"]', 'yearly', NULL, '0', '450000', 'no', 'no', 'no', '1', '2', '1', NULL, NULL, NULL, '950', NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[]', 'no', 'private', NULL, 'invalid', '1', NULL, NULL, 'no', NULL, NULL, NULL, NULL, 1, 66, 'draft', NULL, '2021-06-27 08:51:24', '2021-07-04 15:43:46', 18, '1-Ap-S-18', 3, '{\"barbeque_area\":\"no\",\"day_care_center\":\"no\",\"kids_play_area\":null,\"lawn_or_garden\":\"no\",\"cafeteria_or_canteen\":\"no\",\"first_aid_medical_center\":\"no\",\"gym_or_health_club\":\"no\",\"jacuzzi\":\"no\",\"sauna\":\"no\",\"steam_room\":\"no\",\"swimming_pool\":\"no\",\"facilities_for_disabled\":\"no\",\"laundry_room\":\"no\",\"laundry_facility\":\"no\",\"shared_kitchen\":\"no\",\"completion_year\":null,\"elevators_in_building\":null,\"total_floors\":null,\"balcony_or_terrace\":\"no\",\"service_elevator\":\"no\",\"lobby_in_building\":\"no\",\"prayer_room\":\"no\",\"flooring\":null,\"business_center\":\"no\",\"conference_room\":\"no\",\"security_stuff\":\"no\",\"cctv_security\":\"no\",\"view\":null,\"pet_policy\":null,\"land_area\":null,\"nearby_schools\":null,\"nearby_public_transport\":null,\"floor\":null,\"other_rooms\":null,\"maid_rooms\":\"no\",\"nearby_hospitals\":null,\"other_nearby_places\":null,\"other_main_features\":null,\"atm_facility\":\"no\",\"number_of_bathrooms\":null,\"nearby_shopping_malls\":null,\"24_hours_concierge\":\"no\",\"free_hold\":\"no\",\"other_facilities\":null,\"number_of_bedrooms\":null,\"distance_from_airport\":null,\"broad_band_internet\":\"no\",\"satellite_cable_tv\":\"no\",\"intercom\":\"no\",\"double_glazed_windows\":\"no\",\"centerally_air_conditioned\":\"no\",\"central_heating\":\"no\",\"electricity_backup\":\"no\",\"furnitured\":\"no\",\"parking_space\":null,\"storage_area\":\"no\",\"study_room\":\"no\",\"waste_disposal\":\"no\",\"maintenance_stuff\":\"no\",\"cleaning_services\":\"no\"}', '25.2343442', NULL, 1, 'basic'),
(55, 1, 1, 'sale', 'LOCAL - Abu Dhabi', 32, 543, NULL, NULL, NULL, NULL, NULL, '[\"4\"]', 'yearly', NULL, '0', '150000', 'no', 'no', 'no', '1', '2', '1', NULL, NULL, NULL, '18000', NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[]', 'no', 'shared', NULL, 'invalid', '1', NULL, NULL, 'no', NULL, NULL, NULL, NULL, 1, 66, 'live', NULL, '2021-06-27 08:54:15', '2021-07-04 15:43:46', 19, '1-Ap-S-19', 3, '{\"barbeque_area\":\"no\",\"day_care_center\":\"no\",\"kids_play_area\":null,\"lawn_or_garden\":\"no\",\"cafeteria_or_canteen\":\"no\",\"first_aid_medical_center\":\"no\",\"gym_or_health_club\":\"no\",\"jacuzzi\":\"no\",\"sauna\":\"no\",\"steam_room\":\"no\",\"swimming_pool\":\"no\",\"facilities_for_disabled\":\"no\",\"laundry_room\":\"no\",\"laundry_facility\":\"no\",\"shared_kitchen\":\"no\",\"completion_year\":null,\"elevators_in_building\":null,\"total_floors\":null,\"balcony_or_terrace\":\"no\",\"service_elevator\":\"no\",\"lobby_in_building\":\"no\",\"prayer_room\":\"no\",\"flooring\":null,\"business_center\":\"no\",\"conference_room\":\"no\",\"security_stuff\":\"no\",\"cctv_security\":\"no\",\"view\":null,\"pet_policy\":null,\"land_area\":null,\"nearby_schools\":null,\"nearby_public_transport\":null,\"floor\":null,\"other_rooms\":null,\"maid_rooms\":\"no\",\"nearby_hospitals\":null,\"other_nearby_places\":null,\"other_main_features\":null,\"atm_facility\":\"no\",\"number_of_bathrooms\":null,\"nearby_shopping_malls\":null,\"24_hours_concierge\":\"no\",\"free_hold\":\"no\",\"other_facilities\":null,\"number_of_bedrooms\":null,\"distance_from_airport\":null,\"broad_band_internet\":\"no\",\"satellite_cable_tv\":\"no\",\"intercom\":\"no\",\"double_glazed_windows\":\"no\",\"centerally_air_conditioned\":\"no\",\"central_heating\":\"no\",\"electricity_backup\":\"no\",\"furnitured\":\"no\",\"parking_space\":null,\"storage_area\":\"no\",\"study_room\":\"no\",\"waste_disposal\":\"no\",\"maintenance_stuff\":\"no\",\"cleaning_services\":\"no\"}', '24.455508', '54.6146338', 1, 'basic'),
(57, 1, 1, 'sale', 'listen lights electro mechanical services - شارع ام هرير - دبي - الإمارات العربية المتحدة', 32, 543, NULL, NULL, NULL, NULL, NULL, '[\"4\"]', NULL, NULL, '0', '25000', 'no', 'no', 'no', '1', '1', '1', NULL, NULL, NULL, '850', NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[]', 'no', 'private', NULL, 'invalid', '1', NULL, NULL, 'no', NULL, NULL, NULL, NULL, 1, 66, 'review', NULL, '2021-06-27 09:14:20', '2021-07-05 08:14:58', 20, '1-Ap-S-20', 3, '{\"barbeque_area\":\"no\",\"day_care_center\":\"no\",\"kids_play_area\":null,\"lawn_or_garden\":\"no\",\"cafeteria_or_canteen\":\"no\",\"first_aid_medical_center\":\"no\",\"gym_or_health_club\":\"no\",\"jacuzzi\":\"no\",\"sauna\":\"no\",\"steam_room\":\"no\",\"swimming_pool\":\"no\",\"facilities_for_disabled\":\"no\",\"laundry_room\":\"no\",\"laundry_facility\":\"no\",\"shared_kitchen\":\"no\",\"completion_year\":null,\"elevators_in_building\":null,\"total_floors\":null,\"balcony_or_terrace\":\"no\",\"service_elevator\":\"no\",\"lobby_in_building\":\"no\",\"prayer_room\":\"no\",\"flooring\":null,\"business_center\":\"no\",\"conference_room\":\"no\",\"security_stuff\":\"no\",\"cctv_security\":\"no\",\"view\":null,\"pet_policy\":null,\"land_area\":null,\"nearby_schools\":null,\"nearby_public_transport\":null,\"floor\":null,\"other_rooms\":null,\"maid_rooms\":\"no\",\"nearby_hospitals\":null,\"other_nearby_places\":null,\"other_main_features\":null,\"atm_facility\":\"no\",\"number_of_bathrooms\":null,\"nearby_shopping_malls\":null,\"24_hours_concierge\":\"no\",\"free_hold\":\"no\",\"other_facilities\":null,\"number_of_bedrooms\":null,\"distance_from_airport\":null,\"broad_band_internet\":\"no\",\"satellite_cable_tv\":\"no\",\"intercom\":\"no\",\"double_glazed_windows\":\"no\",\"centerally_air_conditioned\":\"no\",\"central_heating\":\"no\",\"electricity_backup\":\"no\",\"furnitured\":\"no\",\"parking_space\":null,\"storage_area\":\"no\",\"study_room\":\"no\",\"waste_disposal\":\"no\",\"maintenance_stuff\":\"no\",\"cleaning_services\":\"no\"}', '25.2443415', '55.3115749', 1, 'basic'),
(58, 1, 1, 'sale', 'Louvre Abu Dhabi - Abu Dhabi', 32, 543, NULL, NULL, NULL, NULL, NULL, '[\"4\"]', 'yearly', NULL, '0', '150000', 'no', 'no', 'no', '1', '3', '1', NULL, NULL, NULL, '850', NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[]', 'no', 'shared', NULL, 'invalid', '1', NULL, NULL, 'no', NULL, NULL, NULL, NULL, 1, 66, 'draft', NULL, '2021-06-27 09:26:35', '2021-07-05 08:14:37', 21, '1-Ap-S-21', 3, '{\"barbeque_area\":\"no\",\"day_care_center\":\"no\",\"kids_play_area\":null,\"lawn_or_garden\":\"no\",\"cafeteria_or_canteen\":\"no\",\"first_aid_medical_center\":\"no\",\"gym_or_health_club\":\"no\",\"jacuzzi\":\"no\",\"sauna\":\"no\",\"steam_room\":\"no\",\"swimming_pool\":\"no\",\"facilities_for_disabled\":\"no\",\"laundry_room\":\"no\",\"laundry_facility\":\"no\",\"shared_kitchen\":\"no\",\"completion_year\":null,\"elevators_in_building\":null,\"total_floors\":null,\"balcony_or_terrace\":\"no\",\"service_elevator\":\"no\",\"lobby_in_building\":\"no\",\"prayer_room\":\"no\",\"flooring\":null,\"business_center\":\"no\",\"conference_room\":\"no\",\"security_stuff\":\"no\",\"cctv_security\":\"no\",\"view\":null,\"pet_policy\":null,\"land_area\":null,\"nearby_schools\":null,\"nearby_public_transport\":null,\"floor\":null,\"other_rooms\":null,\"maid_rooms\":\"no\",\"nearby_hospitals\":null,\"other_nearby_places\":null,\"other_main_features\":null,\"atm_facility\":\"no\",\"number_of_bathrooms\":null,\"nearby_shopping_malls\":null,\"24_hours_concierge\":\"no\",\"free_hold\":\"no\",\"other_facilities\":null,\"number_of_bedrooms\":null,\"distance_from_airport\":null,\"broad_band_internet\":\"no\",\"satellite_cable_tv\":\"no\",\"intercom\":\"no\",\"double_glazed_windows\":\"no\",\"centerally_air_conditioned\":\"no\",\"central_heating\":\"no\",\"electricity_backup\":\"no\",\"furnitured\":\"no\",\"parking_space\":null,\"storage_area\":\"no\",\"study_room\":\"no\",\"waste_disposal\":\"no\",\"maintenance_stuff\":\"no\",\"cleaning_services\":\"no\"}', '24.5336954', '54.3981368', 1, 'basic'),
(59, 1, 1, 'sale', 'The Dubai Mall - Dubai', 32, 544, NULL, NULL, NULL, NULL, NULL, '[]', NULL, NULL, '0', '15000', 'no', 'no', 'no', NULL, NULL, NULL, NULL, NULL, NULL, '850', NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[]', 'no', 'private', NULL, 'invalid', '1', NULL, NULL, 'no', NULL, NULL, NULL, NULL, 1, 66, 'archive', NULL, '2021-06-27 14:09:38', '2021-07-05 11:25:51', 22, '1-Ap-S-22', 3, '{\"barbeque_area\":\"no\",\"day_care_center\":\"no\",\"kids_play_area\":null,\"lawn_or_garden\":\"no\",\"cafeteria_or_canteen\":\"no\",\"first_aid_medical_center\":\"no\",\"gym_or_health_club\":\"no\",\"jacuzzi\":\"no\",\"sauna\":\"no\",\"steam_room\":\"no\",\"swimming_pool\":\"no\",\"facilities_for_disabled\":\"no\",\"laundry_room\":\"no\",\"laundry_facility\":\"no\",\"shared_kitchen\":\"no\",\"completion_year\":null,\"elevators_in_building\":null,\"total_floors\":null,\"balcony_or_terrace\":\"no\",\"service_elevator\":\"no\",\"lobby_in_building\":\"no\",\"prayer_room\":\"no\",\"flooring\":null,\"business_center\":\"no\",\"conference_room\":\"no\",\"security_stuff\":\"no\",\"cctv_security\":\"no\",\"view\":null,\"pet_policy\":null,\"land_area\":null,\"nearby_schools\":null,\"nearby_public_transport\":null,\"floor\":null,\"other_rooms\":null,\"maid_rooms\":\"no\",\"nearby_hospitals\":null,\"other_nearby_places\":null,\"other_main_features\":null,\"atm_facility\":\"no\",\"number_of_bathrooms\":null,\"nearby_shopping_malls\":null,\"24_hours_concierge\":\"no\",\"free_hold\":\"no\",\"other_facilities\":null,\"number_of_bedrooms\":null,\"distance_from_airport\":null,\"broad_band_internet\":\"no\",\"satellite_cable_tv\":\"no\",\"intercom\":\"no\",\"double_glazed_windows\":\"no\",\"centerally_air_conditioned\":\"no\",\"central_heating\":\"no\",\"electricity_backup\":\"no\",\"furnitured\":\"no\",\"parking_space\":null,\"storage_area\":\"no\",\"study_room\":\"no\",\"waste_disposal\":\"no\",\"maintenance_stuff\":\"no\",\"cleaning_services\":\"no\"}', '25.198765', '55.27960530000001', 1, 'basic'),
(60, 1, 1, 'sale', 'دبي مول - Dubai', 34, 8, 19, NULL, NULL, NULL, NULL, '[\"4\"]', 'yearly', NULL, '0', '18000', 'no', 'no', 'no', NULL, NULL, NULL, NULL, NULL, NULL, '850', NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[]', 'no', 'private', NULL, 'invalid', '1', NULL, NULL, 'no', NULL, NULL, NULL, NULL, 1, 66, 'archive', NULL, '2021-06-28 13:01:44', '2021-07-05 11:26:08', 23, '1-Ap-S-23', 3, '{\"barbeque_area\":\"no\",\"day_care_center\":\"no\",\"kids_play_area\":null,\"lawn_or_garden\":\"no\",\"cafeteria_or_canteen\":\"no\",\"first_aid_medical_center\":\"no\",\"gym_or_health_club\":\"no\",\"jacuzzi\":\"no\",\"sauna\":\"no\",\"steam_room\":\"no\",\"swimming_pool\":\"no\",\"facilities_for_disabled\":\"no\",\"laundry_room\":\"no\",\"laundry_facility\":\"no\",\"shared_kitchen\":\"no\",\"completion_year\":null,\"elevators_in_building\":null,\"total_floors\":null,\"balcony_or_terrace\":\"no\",\"service_elevator\":\"no\",\"lobby_in_building\":\"no\",\"prayer_room\":\"no\",\"flooring\":null,\"business_center\":\"no\",\"conference_room\":\"no\",\"security_stuff\":\"no\",\"cctv_security\":\"no\",\"view\":null,\"pet_policy\":null,\"land_area\":null,\"nearby_schools\":null,\"nearby_public_transport\":null,\"floor\":null,\"other_rooms\":null,\"maid_rooms\":\"no\",\"nearby_hospitals\":null,\"other_nearby_places\":null,\"other_main_features\":null,\"atm_facility\":\"no\",\"number_of_bathrooms\":null,\"nearby_shopping_malls\":null,\"24_hours_concierge\":\"no\",\"free_hold\":\"no\",\"other_facilities\":null,\"number_of_bedrooms\":null,\"distance_from_airport\":null,\"broad_band_internet\":\"no\",\"satellite_cable_tv\":\"no\",\"intercom\":\"no\",\"double_glazed_windows\":\"no\",\"centerally_air_conditioned\":\"no\",\"central_heating\":\"no\",\"electricity_backup\":\"no\",\"furnitured\":\"no\",\"parking_space\":null,\"storage_area\":\"no\",\"study_room\":\"no\",\"waste_disposal\":\"no\",\"maintenance_stuff\":\"no\",\"cleaning_services\":\"no\"}', '25.198765', '55.27960530000001', 1, 'basic');

-- --------------------------------------------------------

--
-- Table structure for table `listing_categories`
--

CREATE TABLE `listing_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `localized_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `allowed` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listing_categories`
--

INSERT INTO `listing_categories` (`id`, `name`, `localized_name`, `status`, `created_at`, `updated_at`, `allowed`) VALUES
(1, 'bathroom', 'الحمام', 'active', NULL, NULL, 'no'),
(2, 'kitchen', 'المطبخ', 'active', NULL, NULL, 'yes');

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
(7, '2021-05-04', '10000', '5', 11, '2021-05-04 09:24:31', '2021-05-04 09:24:31'),
(8, '2021-05-03', '10000', '5', 11, '2021-05-04 09:24:31', '2021-05-04 09:24:31'),
(9, '2021-05-04', '20000', '5', 11, '2021-05-04 09:24:31', '2021-05-04 09:24:31'),
(10, '2021-05-04', '10000', '6', NULL, '2021-05-05 07:29:57', '2021-05-05 07:29:57');

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
-- Table structure for table `listing_notes`
--

CREATE TABLE `listing_notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `listing_id` bigint(20) UNSIGNED DEFAULT NULL,
  `add_by` bigint(20) UNSIGNED DEFAULT NULL,
  `notes_en` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes_ar` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL,
  `main_photo` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `borchure` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo_main` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `listing_category_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listing_photos`
--

INSERT INTO `listing_photos` (`id`, `listing_id`, `main`, `watermark`, `active`, `created_at`, `updated_at`, `main_photo`, `borchure`, `photo_main`, `icon`, `listing_category_id`) VALUES
(33, 47, '20200510-15891064678662-129-l.png', 'mainWatermark-20200510-15891064678662-129-l.png', 'watermark', '2021-06-24 12:36:24', '2021-06-24 13:51:07', 'no', NULL, 'yes', NULL, NULL),
(34, 47, '20200510-15891064718071-129-l.png', 'mainWatermark-20200510-15891064718071-129-l.png', 'watermark', '2021-06-24 12:36:24', '2021-06-24 13:51:07', 'no', NULL, 'no', NULL, NULL),
(35, 47, '20200510-15891064755454-129-l.png', 'mainWatermark-20200510-15891064755454-129-l.png', 'watermark', '2021-06-24 13:36:22', '2021-06-24 13:51:07', 'no', NULL, 'no', NULL, NULL),
(43, 55, '20200510-15891064755454-129-l.png', 'mainWatermark-20200510-15891064755454-129-l.png', 'watermark', '2021-06-27 08:54:15', '2021-06-27 08:54:15', 'no', NULL, 'no', NULL, NULL),
(44, 57, '20200510-15891064755454-129-l.png', 'mainWatermark-20200510-15891064755454-129-l.png', 'watermark', '2021-06-27 09:14:20', '2021-06-27 14:43:45', 'no', NULL, 'no', 'icon-20200510-15891064755454-129-l.png', 1),
(45, 58, '20200510-15891064755454-129-l.png', 'mainWatermark-20200510-15891064755454-129-l.png', 'watermark', '2021-06-27 09:26:35', '2021-06-28 09:42:40', 'no', NULL, 'yes', 'icon-20200510-15891064755454-129-l.png', 1),
(49, 43, '20200510-15891064722904-129-l.png', 'mainWatermark-20200510-15891064722904-129-l.png', 'watermark', '2021-06-27 09:41:00', '2021-06-28 12:29:18', 'no', NULL, 'no', 'icon-20200510-15891064722904-129-l.png', 1),
(50, 43, '20200510-15891064755454-129-l.png', 'mainWatermark-20200510-15891064755454-129-l.png', 'watermark', '2021-06-27 10:12:08', '2021-06-28 12:29:18', 'no', NULL, 'no', 'icon-20200510-15891064755454-129-l.png', 1),
(51, 43, '20200510-15891064755454-129-l.png', 'mainWatermark-20200510-15891064755454-129-l.png', 'watermark', '2021-06-27 10:27:51', '2021-06-28 12:29:18', 'no', NULL, 'no', 'icon-20200510-15891064755454-129-l.png', 2),
(52, 43, '20200510-15891064678662-129-l.png', 'mainWatermark-20200510-15891064678662-129-l.png', 'watermark', '2021-06-27 10:32:18', '2021-06-28 12:29:18', 'no', NULL, 'no', 'icon-20200510-15891064678662-129-l.png', 1),
(53, 43, '20200510-15891064581413-129-l.png', 'mainWatermark-20200510-15891064581413-129-l.png', 'watermark', '2021-06-27 10:37:44', '2021-06-28 12:29:28', 'no', NULL, 'no', 'icon-20200510-15891064581413-129-l.png', 2),
(54, 43, '20200510-15891064722904-129-l.png', 'mainWatermark-20200510-15891064722904-129-l.png', 'watermark', '2021-06-27 10:41:07', '2021-06-28 12:29:18', 'no', NULL, 'no', 'icon-20200510-15891064722904-129-l.png', 1),
(55, 43, '20200510-15891064615207-129-l.png', 'mainWatermark-20200510-15891064615207-129-l.png', 'watermark', '2021-06-27 10:41:31', '2021-06-28 12:29:18', 'no', NULL, 'yes', 'icon-20200510-15891064615207-129-l.png', 2),
(57, 59, '20200510-15891064615207-129-l.png', 'mainWatermark-20200510-15891064615207-129-l.png', 'watermark', '2021-06-27 14:09:38', '2021-06-27 14:43:23', 'no', NULL, 'no', 'icon-20200510-15891064615207-129-l.png', 2),
(58, 60, '20200510-15891064615207-129-l.png', 'mainWatermark-20200510-15891064615207-129-l.png', 'watermark', '2021-06-28 13:01:44', '2021-06-28 13:01:44', 'no', NULL, 'yes', 'icon-20200510-15891064615207-129-l.png', 2);

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
(3, NULL, '1-main-608ed2f66d89f-1619972854/hqdefault.jpg', '1-main-608ed2f66d89f-1619972854/mainWatermark-hqdefault.jpg', NULL, 'watermark', '2021-05-02 16:27:39', '2021-05-02 16:27:39');

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
(6, '12 cheques (Monthly)', '12 cheques (Monthly)', '12-cheques-monthly', 1, 1, '2021-04-23 15:50:21', '2021-04-23 15:50:21'),
(7, '1 Cheque', '1 Cheque', '1-cheque', 3, 2, '2021-06-16 19:43:09', '2021-06-16 19:43:09');

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
(24, 'Commerical Villa', 'فيلا تجارية', 'commerical-villa', 1, 1, '2021-04-22 12:40:21', '2021-04-22 12:40:21', 'commercial', 'Cv', 'no'),
(26, 'Apartment', 'Apartment', 'apartment', 3, 2, '2021-06-16 19:48:12', '2021-06-16 19:48:12', 'residential', 'S-A-AA-0001', 'yes');

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
(21, 11, 'title update', 'https://www.youtube.com/watch?v=ivZk6fOtxZ0', 'youtube', '2021-05-04 09:24:31', '2021-05-04 09:24:31'),
(22, 11, 'title second', 'https://www.youtube.com/watch?v=ivZk6fOtxZ0', 'youtube', '2021-05-04 09:24:31', '2021-05-04 09:24:31');

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
(4, 'Pool View', 'Pool View', 'pool-view', 1, 1, '2021-04-22 15:29:00', '2021-04-22 15:29:00'),
(5, 'Pool View', 'Pool View', 'pool-view', 3, 2, '2021-06-16 18:35:45', '2021-06-16 18:35:45'),
(6, 'Garden View', 'Garden View', 'garden-view', 3, 2, '2021-06-21 14:03:21', '2021-06-21 14:03:21');

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `mails` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
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
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
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
(233, '2021_04_28_134024_add_furnished_question_to_listing_types_table', 39),
(234, '2021_03_22_151527_create_watermarks_table', 40),
(235, '2021_05_04_091742_add_property_type_to_leads_table', 40),
(236, '2021_05_04_092015_add_lat_lng_to_listings_table', 40),
(237, '2021_05_04_092015_add_property_type_to_opportunities_table', 40),
(239, '2021_05_04_092015_add_added_by_to_listings_table', 41),
(240, '2021_05_05_094037_create_system_templates_table', 41),
(241, '2021_05_07_032821_create_requests_table', 41),
(242, '2021_05_07_070331_create_black_lists_table', 41),
(243, '2021_03_26_143654_add_table_to_clients', 42),
(244, '2021_03_26_143654_add_table_to_leads', 42),
(245, '2021_03_26_143654_add_table_to_opportunities', 42),
(248, '2021_04_28_132249_add_qualification_to_clients_table', 43),
(249, '2021_04_28_132249_add_sub_community_to_clients_table', 43),
(250, '2021_05_18_120234_create_communities_table', 44),
(251, '2021_05_18_120234_create_sub_communities_table', 45),
(252, '2021_05_22_120234_add_country_id_to_communities_table', 46),
(253, '2021_05_22_120234_add_country_id_to_sub_communities_table', 46),
(254, '2021_05_04_091742_add_phone_code_to_leads_table', 47),
(255, '2021_04_25_126107_create_listing_notes_table', 48),
(256, '2021_05_10_123838_create_activity_logs_table', 48),
(257, '2021_05_20_143829_create_lead_notes_table', 48),
(258, '2021_05_20_144527_create_client_notes_table', 48),
(259, '2021_05_20_144647_create_opportunity_notes_table', 48),
(260, '2021_05_25_151540_add_mails_to_mail_lists_table', 48),
(261, '2021_06_01_130655_create_opportunity_temp_contracts_table', 48),
(262, '2021_06_01_130909_create_opportunity_contract_documents_table', 48),
(263, '2021_06_01_131150_create_opportunity_contract_recurrings_table', 48),
(264, '2021_06_06_194808_create_faild_leads_table', 49),
(265, '2021_06_06_200239_add_refrence_number_to_leads_table', 49),
(266, '2021_06_07_005716_add_agency_id_to_faild_leads_table', 49),
(267, '2021_07_26_143654_add_national_id_to_opportunities', 49),
(268, '2018_08_08_100000_create_telescope_entries_table', 50),
(269, '2021_07_26_143654_add_codes_to_clients', 50),
(270, '2021_07_26_143654_add_codes_to_opportunities', 50),
(271, '2021_06_17_122824_add_columns_to_watermarks_table', 51),
(272, '2021_06_17_143901_add_slug_to_cities', 51),
(273, '2021_06_17_144025_add_slug_to_countries', 51),
(274, '2021_06_17_151143_add_campain_to_leads', 51),
(275, '2021_06_17_151227_add_campain_to_opportunities', 51),
(276, '2021_06_17_151239_add_campain_to_clients', 51),
(277, '2021_07_26_143654_add_agency_token_to_agency', 51),
(278, '2021_07_26_143654_add_business_token_to_businesses', 51),
(279, '2021_07_26_143654_add_coordinates_to_leads', 51),
(280, '2021_07_26_143654_add_coordinates_to_opportunities', 51),
(281, '2021_06_20_123238_create_portal_listings_table', 52),
(282, '2021_06_21_135118_add_col_agency_table', 52),
(283, '2021_06_21_141136_add_main_photo_to_photos_table', 52),
(284, '2021_07_26_143654_add_status_to_leads', 52),
(297, '2021_06_21_171249_add_borchure_to_listing_photos_table', 53),
(298, '2021_06_21_171632_add_borchure_to_temporary_listings_photos_table', 53),
(299, '2021_06_23_125726_add_default_mode_to_users_table', 53),
(300, '2021_06_24_101622_add_main_to_temporary_photos_table', 54),
(301, '2021_06_24_102226_add_main_to_listing_photos_table', 54),
(302, '2021_06_27_105807_add_icon_to_temporary_listing_photos', 55),
(303, '2021_06_27_111342_add_icon_to_listing_photos', 56),
(304, '2021_06_27_132808_create_listing_categories_table', 57),
(305, '2021_06_27_154919_add_category_id_to_temporary_listings_photos', 58),
(306, '2021_06_27_160425_add_category_id_to_listing_photos', 59),
(307, '2021_06_28_110902_add_allowed_to_listing_categories_table', 60),
(308, '2021_06_28_143823_create_statistics_table', 61),
(309, '2021_06_22_143654_add_hot_to_listings_table', 62),
(310, '2021_07_26_143654_add_symbols_to_leads', 63),
(311, '2021_07_26_143654_add_symbols_to_opportunities', 64),
(312, '2021_07_26_143654_add_symbols_to_clients', 65),
(313, '2021_07_26_143654_add_symbols_to_agencies', 66);

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
(1, 'App\\Models\\User', 10),
(2, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 10),
(3, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 10),
(4, 'App\\Models\\User', 1),
(4, 'App\\Models\\User', 10),
(5, 'App\\Models\\User', 1),
(5, 'App\\Models\\User', 10),
(6, 'App\\Models\\User', 1),
(6, 'App\\Models\\User', 10),
(7, 'App\\Models\\User', 1),
(7, 'App\\Models\\User', 10),
(8, 'App\\Models\\User', 1),
(8, 'App\\Models\\User', 10),
(9, 'App\\Models\\User', 1),
(9, 'App\\Models\\User', 10),
(10, 'App\\Models\\User', 1),
(10, 'App\\Models\\User', 10),
(11, 'App\\Models\\User', 1),
(11, 'App\\Models\\User', 10),
(12, 'App\\Models\\User', 1),
(12, 'App\\Models\\User', 10),
(13, 'App\\Models\\User', 1),
(13, 'App\\Models\\User', 10),
(14, 'App\\Models\\User', 1),
(14, 'App\\Models\\User', 10),
(15, 'App\\Models\\User', 1),
(15, 'App\\Models\\User', 10),
(16, 'App\\Models\\User', 1),
(16, 'App\\Models\\User', 10),
(17, 'App\\Models\\User', 1),
(17, 'App\\Models\\User', 10),
(18, 'App\\Models\\User', 1),
(18, 'App\\Models\\User', 10),
(19, 'App\\Models\\User', 1),
(19, 'App\\Models\\User', 10),
(20, 'App\\Models\\User', 1),
(20, 'App\\Models\\User', 10),
(21, 'App\\Models\\User', 1),
(21, 'App\\Models\\User', 10),
(22, 'App\\Models\\User', 1),
(22, 'App\\Models\\User', 10),
(23, 'App\\Models\\User', 1),
(23, 'App\\Models\\User', 10),
(24, 'App\\Models\\User', 1),
(24, 'App\\Models\\User', 10),
(25, 'App\\Models\\User', 1),
(25, 'App\\Models\\User', 10),
(26, 'App\\Models\\User', 1),
(26, 'App\\Models\\User', 10),
(27, 'App\\Models\\User', 1),
(27, 'App\\Models\\User', 10),
(28, 'App\\Models\\User', 1),
(28, 'App\\Models\\User', 10),
(29, 'App\\Models\\User', 1),
(29, 'App\\Models\\User', 10),
(30, 'App\\Models\\User', 1),
(30, 'App\\Models\\User', 10),
(31, 'App\\Models\\User', 1),
(31, 'App\\Models\\User', 10),
(32, 'App\\Models\\User', 1),
(32, 'App\\Models\\User', 10),
(33, 'App\\Models\\User', 1),
(33, 'App\\Models\\User', 10),
(34, 'App\\Models\\User', 1),
(34, 'App\\Models\\User', 10),
(35, 'App\\Models\\User', 1),
(35, 'App\\Models\\User', 10),
(36, 'App\\Models\\User', 1),
(36, 'App\\Models\\User', 10),
(37, 'App\\Models\\User', 1),
(37, 'App\\Models\\User', 10),
(38, 'App\\Models\\User', 1),
(38, 'App\\Models\\User', 10),
(39, 'App\\Models\\User', 1),
(39, 'App\\Models\\User', 10),
(40, 'App\\Models\\User', 1),
(40, 'App\\Models\\User', 10),
(41, 'App\\Models\\User', 1),
(41, 'App\\Models\\User', 10),
(42, 'App\\Models\\User', 1),
(42, 'App\\Models\\User', 10),
(43, 'App\\Models\\User', 1),
(43, 'App\\Models\\User', 10),
(44, 'App\\Models\\User', 1),
(44, 'App\\Models\\User', 10),
(45, 'App\\Models\\User', 1),
(45, 'App\\Models\\User', 10),
(46, 'App\\Models\\User', 1),
(46, 'App\\Models\\User', 10),
(47, 'App\\Models\\User', 1),
(47, 'App\\Models\\User', 10),
(48, 'App\\Models\\User', 1),
(48, 'App\\Models\\User', 10),
(49, 'App\\Models\\User', 1),
(49, 'App\\Models\\User', 10),
(50, 'App\\Models\\User', 1),
(50, 'App\\Models\\User', 10),
(51, 'App\\Models\\User', 1),
(51, 'App\\Models\\User', 10),
(52, 'App\\Models\\User', 1),
(52, 'App\\Models\\User', 10),
(53, 'App\\Models\\User', 1),
(53, 'App\\Models\\User', 10),
(54, 'App\\Models\\User', 1),
(54, 'App\\Models\\User', 10),
(55, 'App\\Models\\User', 1),
(55, 'App\\Models\\User', 10),
(56, 'App\\Models\\User', 1),
(56, 'App\\Models\\User', 10),
(57, 'App\\Models\\User', 1),
(57, 'App\\Models\\User', 10),
(58, 'App\\Models\\User', 1),
(58, 'App\\Models\\User', 10),
(59, 'App\\Models\\User', 1),
(59, 'App\\Models\\User', 10),
(60, 'App\\Models\\User', 1),
(60, 'App\\Models\\User', 10),
(61, 'App\\Models\\User', 1),
(61, 'App\\Models\\User', 10),
(62, 'App\\Models\\User', 1),
(62, 'App\\Models\\User', 10),
(63, 'App\\Models\\User', 1),
(63, 'App\\Models\\User', 10),
(64, 'App\\Models\\User', 1),
(64, 'App\\Models\\User', 10),
(65, 'App\\Models\\User', 1),
(65, 'App\\Models\\User', 10),
(66, 'App\\Models\\User', 1),
(66, 'App\\Models\\User', 10),
(67, 'App\\Models\\User', 1),
(67, 'App\\Models\\User', 10),
(68, 'App\\Models\\User', 1),
(68, 'App\\Models\\User', 10),
(69, 'App\\Models\\User', 1),
(69, 'App\\Models\\User', 10),
(70, 'App\\Models\\User', 1),
(70, 'App\\Models\\User', 10),
(71, 'App\\Models\\User', 1),
(71, 'App\\Models\\User', 10),
(72, 'App\\Models\\User', 1),
(72, 'App\\Models\\User', 10),
(73, 'App\\Models\\User', 1),
(73, 'App\\Models\\User', 10),
(74, 'App\\Models\\User', 1),
(74, 'App\\Models\\User', 10),
(75, 'App\\Models\\User', 1),
(75, 'App\\Models\\User', 10),
(76, 'App\\Models\\User', 1),
(76, 'App\\Models\\User', 10),
(77, 'App\\Models\\User', 1),
(77, 'App\\Models\\User', 10),
(78, 'App\\Models\\User', 1),
(78, 'App\\Models\\User', 10),
(79, 'App\\Models\\User', 1),
(79, 'App\\Models\\User', 10),
(80, 'App\\Models\\User', 1),
(80, 'App\\Models\\User', 10),
(81, 'App\\Models\\User', 1),
(81, 'App\\Models\\User', 10),
(82, 'App\\Models\\User', 1),
(82, 'App\\Models\\User', 10),
(83, 'App\\Models\\User', 1),
(83, 'App\\Models\\User', 10),
(84, 'App\\Models\\User', 1),
(84, 'App\\Models\\User', 10);

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

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('0a7c12d3-df4f-4931-b4d3-eaff8b73e7cb', 'App\\Notifications\\OpportunityNotification', 'App\\Models\\User', 2, '{\"message\":\"A New Opportunity Has Been Assigned To You\",\"opportunity_id\":1,\"type\":\"assign\"}', NULL, '2021-03-21 21:00:22', '2021-03-21 21:00:22'),
('0c03d63f-5cad-4cf4-9f5e-6fe8b646b4ef', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 1, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', NULL, '2021-04-20 11:15:58', '2021-04-20 11:15:58'),
('145879b1-ba61-468c-b1e7-a70e3b69654e', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 9, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', NULL, '2021-04-20 11:45:48', '2021-04-20 11:45:48'),
('14e3f0ae-6892-483d-8402-86fb2b084b28', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 9, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', NULL, '2021-04-20 11:46:10', '2021-04-20 11:46:10'),
('15fe1abf-9f08-4840-8793-a7fc3bae2dd9', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 1, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', NULL, '2021-04-20 11:45:48', '2021-04-20 11:45:48'),
('17aae2bb-aa12-4b70-804a-2b2c196e13cc', 'App\\Notifications\\OpportunityNotification', 'App\\Models\\User', 1, '{\"message\":\"A New Opportunity Has Been Assigned To You\",\"opportunity_id\":3,\"type\":\"assign\"}', NULL, '2021-06-01 11:36:48', '2021-06-01 11:36:48'),
('1f862052-ac36-429d-b098-3ebb7577a109', 'App\\Notifications\\OpportunityQuestionNotification', 'App\\Models\\User', 9, '{\"message\":\"A New Opportunity Question Has Been Made By Management\",\"opportunity_question_id\":13,\"type\":\"question\"}', NULL, '2021-04-14 13:17:21', '2021-04-14 13:17:21'),
('215155d0-cabd-4d2b-8d62-4c01d899cffc', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 2, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', NULL, '2021-03-21 21:07:12', '2021-03-21 21:07:12'),
('2601459c-bccf-45b9-8520-28a90036f949', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 1, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":5,\"type\":\"task\"}', NULL, '2021-04-20 07:59:19', '2021-04-20 07:59:19'),
('2d9e9248-608f-42e9-b4e3-c99db897f4ac', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 9, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', NULL, '2021-04-20 11:46:37', '2021-04-20 11:46:37'),
('3004882a-14b8-4f0e-a891-214a407c6655', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 2, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', NULL, '2021-04-20 11:52:22', '2021-04-20 11:52:22'),
('37cfa68c-d2ef-4cb9-9f57-378063cb448d', 'App\\Notifications\\OpportunityNotification', 'App\\Models\\User', 1, '{\"message\":\"A New Opportunity Has Been Assigned To You\",\"opportunity_id\":2,\"type\":\"assign\"}', '2021-05-10 09:56:54', '2021-04-14 12:40:43', '2021-05-10 09:56:54'),
('3a950201-541c-4f97-aa12-a3cdfd2bf8ae', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 2, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', NULL, '2021-04-20 11:15:58', '2021-04-20 11:15:58'),
('3d7f3ab4-02ee-41a5-9e72-500ea6bdfb20', 'App\\Notifications\\OpportunityQuestionNotification', 'App\\Models\\User', 9, '{\"message\":\"A New Opportunity Question Has Been Made By Management\",\"opportunity_question_id\":8,\"type\":\"question\"}', NULL, '2021-04-14 13:00:47', '2021-04-14 13:00:47'),
('40e67eda-62d1-4218-8fbf-672067d2f547', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 2, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":5,\"type\":\"task\"}', NULL, '2021-04-20 11:59:45', '2021-04-20 11:59:45'),
('44e2f1cd-65fb-4257-8cf8-0604ee8db577', 'App\\Notifications\\OpportunityNotification', 'App\\Models\\User', 2, '{\"message\":\"A New Opportunity Has Been Assigned To You\",\"opportunity_id\":2,\"type\":\"assign\"}', NULL, '2021-04-14 13:20:20', '2021-04-14 13:20:20'),
('4c78cbe9-1446-42e1-8153-58d20a233cc1', 'App\\Notifications\\OpportunityNotification', 'App\\Models\\User', 9, '{\"message\":\"A New Opportunity Has Been Assigned To You\",\"opportunity_id\":2,\"type\":\"assign\"}', NULL, '2021-04-14 13:20:20', '2021-04-14 13:20:20'),
('50d561ad-153f-4104-8d55-8c998f9a189a', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 2, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', NULL, '2021-04-20 11:45:30', '2021-04-20 11:45:30'),
('534dce99-272f-4951-803a-0f049daac6f4', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 9, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":5,\"type\":\"task\"}', NULL, '2021-04-20 12:03:42', '2021-04-20 12:03:42'),
('55bea60a-8fc4-4a66-838b-8316c533bce4', 'App\\Notifications\\ClientTaskNotification', 'App\\Models\\User', 9, '{\"message\":\"A New Client Task Has Been Assigned To You\",\"client_task_id\":6,\"type\":\"task\"}', NULL, '2021-06-07 18:52:05', '2021-06-07 18:52:05'),
('55c5cdb0-bf20-43e3-883f-c86f1ccc4f19', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 9, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', NULL, '2021-04-20 11:47:07', '2021-04-20 11:47:07'),
('5852cc28-12bf-4d7e-8903-a6625f2a738f', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 9, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', NULL, '2021-04-20 11:46:29', '2021-04-20 11:46:29'),
('5a6ba364-2491-44e3-a69f-3e6e912d4690', 'App\\Notifications\\OpportunityResultNotification', 'App\\Models\\User', 1, '{\"message\":\"A New Opportunity Result Has Been Confirmed To You\",\"opportunity_result_id\":5,\"type\":\"result\",\"opportunity_id\":2}', NULL, '2021-06-01 10:39:20', '2021-06-01 10:39:20'),
('5a992357-5b45-49d1-9b47-6ec4bbce4edb', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 1, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', NULL, '2021-04-20 11:47:07', '2021-04-20 11:47:07'),
('5e05debf-e362-43d8-8c6b-bedcad071bf2', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 9, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', NULL, '2021-04-20 11:46:53', '2021-04-20 11:46:53'),
('646eecb4-abc8-4843-9671-7143b26574ee', 'App\\Notifications\\OpportunityQuestionNotification', 'App\\Models\\User', 9, '{\"message\":\"A New Opportunity Question Has Been Made By Management\",\"opportunity_question_id\":6,\"type\":\"question\"}', NULL, '2021-04-14 12:54:56', '2021-04-14 12:54:56'),
('64e0aaeb-bb67-4c48-a829-daca463c25d4', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 9, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', NULL, '2021-04-20 11:16:12', '2021-04-20 11:16:12'),
('6984c1ee-e561-4a78-92b0-8085623a668a', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 9, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', NULL, '2021-04-20 11:46:23', '2021-04-20 11:46:23'),
('69c88b3a-53f1-4d8d-922f-72ee0acc67b5', 'App\\Notifications\\OpportunityQuestionNotification', 'App\\Models\\User', 9, '{\"message\":\"A New Opportunity Question Has Been Made By Management\",\"opportunity_question_id\":17,\"type\":\"question\"}', NULL, '2021-04-15 10:58:53', '2021-04-15 10:58:53'),
('6edbfc7a-7601-4f01-add4-7fd0da2ac21e', 'App\\Notifications\\OpportunityQuestionNotification', 'App\\Models\\User', 9, '{\"message\":\"A New Opportunity Question Has Been Made By Management\",\"opportunity_question_id\":11,\"type\":\"question\"}', NULL, '2021-04-14 13:14:19', '2021-04-14 13:14:19'),
('6eedc098-68ea-45c8-8a0a-2285d790305a', 'App\\Notifications\\OpportunityNotification', 'App\\Models\\User', 3, '{\"message\":\"A New Opportunity Has Been Assigned To You\",\"opportunity_id\":6,\"type\":\"assign\"}', NULL, '2021-06-07 19:40:33', '2021-06-07 19:40:33'),
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
('8ec72545-9990-49dd-b392-fabc1838d382', 'App\\Notifications\\OpportunityNotification', 'App\\Models\\User', 1, '{\"message\":\"A New Opportunity Has Been Assigned To You\",\"opportunity_id\":5,\"type\":\"assign\"}', NULL, '2021-06-07 18:53:16', '2021-06-07 18:53:16'),
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
('b65c39a6-73d1-4c60-87db-8f4ef6c5db5d', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 1, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', '2021-05-21 10:35:16', '2021-04-20 11:46:22', '2021-05-21 10:35:16'),
('b68ef8fd-3ce2-43e7-aeac-a19b6d2c21bf', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 2, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":3,\"type\":\"task\"}', NULL, '2021-04-20 12:03:33', '2021-04-20 12:03:33'),
('b870857a-f745-45da-be9d-764485604a4c', 'App\\Notifications\\ClientTaskNotification', 'App\\Models\\User', 2, '{\"message\":\"A New Client Task Has Been Assigned To You\",\"client_task_id\":6,\"type\":\"task\"}', NULL, '2021-06-07 18:52:05', '2021-06-07 18:52:05'),
('bf3f03a0-720c-494b-9023-54ad055d5dc5', 'App\\Notifications\\OpportunityQuestionNotification', 'App\\Models\\User', 2, '{\"message\":\"A New Opportunity Question Has Been Made By Management\",\"opportunity_question_id\":1,\"type\":\"question\"}', NULL, '2021-04-14 12:40:16', '2021-04-14 12:40:16'),
('c106031a-784f-4f4d-9e68-97d9f1c69618', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 9, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', NULL, '2021-04-20 11:54:15', '2021-04-20 11:54:15'),
('c182a108-79e5-495c-96d8-54ab98e756c3', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 2, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', NULL, '2021-04-20 11:16:12', '2021-04-20 11:16:12'),
('c4b1e3d5-a1b0-4c10-9702-c4b65142e02a', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 9, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":5,\"type\":\"task\"}', NULL, '2021-04-20 07:59:19', '2021-04-20 07:59:19'),
('c5d8039b-cb04-40b2-892e-f9d6439c880c', 'App\\Notifications\\OpportunityQuestionNotification', 'App\\Models\\User', 9, '{\"message\":\"A New Opportunity Question Has Been Made By Management\",\"opportunity_question_id\":5,\"type\":\"question\"}', NULL, '2021-04-14 12:53:09', '2021-04-14 12:53:09'),
('cb99008d-0c97-4630-8da9-bc39533382a6', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 9, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', NULL, '2021-04-20 11:47:13', '2021-04-20 11:47:13'),
('cd7fb886-fc91-4bbc-9570-1a95acf35c6f', 'App\\Notifications\\OpportunityAnswerNotification', 'App\\Models\\User', 1, '{\"message\":\"Opportunity Answer Has Been Made Staff\",\"opportunity_answer_id\":2,\"type\":\"answer\"}', NULL, '2021-04-14 13:59:43', '2021-04-14 13:59:43'),
('d1af9acf-4262-473b-baab-5ab889bbf7a5', 'App\\Notifications\\OpportunityQuestionNotification', 'App\\Models\\User', 9, '{\"message\":\"A New Opportunity Question Has Been Made By Management\",\"opportunity_question_id\":10,\"type\":\"question\"}', NULL, '2021-04-14 13:12:07', '2021-04-14 13:12:07'),
('d42617bc-9ba0-4220-8482-0d721ab261e7', 'App\\Notifications\\OpportunityNotification', 'App\\Models\\User', 1, '{\"message\":\"A New Opportunity Has Been Assigned To You\",\"opportunity_id\":4,\"type\":\"assign\"}', NULL, '2021-06-07 18:37:32', '2021-06-07 18:37:32'),
('d6b46dcb-ca21-452b-9f8a-e41cd7bc2e55', 'App\\Notifications\\OpportunityNotification', 'App\\Models\\User', 1, '{\"message\":\"A New Opportunity Has Been Assigned To You\",\"opportunity_id\":2,\"type\":\"assign\"}', NULL, '2021-04-14 13:20:20', '2021-04-14 13:20:20'),
('d84a5d17-07fb-4f4c-baa2-d29257944211', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 2, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', NULL, '2021-04-20 11:54:15', '2021-04-20 11:54:15'),
('d955df82-17bb-474b-b723-11da17558c16', 'App\\Notifications\\OpportunityQuestionNotification', 'App\\Models\\User', 2, '{\"message\":\"A New Opportunity Question Has Been Made By Management\",\"opportunity_question_id\":16,\"type\":\"question\"}', NULL, '2021-04-14 13:25:59', '2021-04-14 13:25:59'),
('da19a312-6402-440b-9cf9-9492f355b0a1', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 1, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', '2021-05-21 08:06:45', '2021-04-20 11:54:15', '2021-05-21 08:06:45'),
('db4de76c-726f-449f-b73d-392c7a9c6060', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 2, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":3,\"type\":\"task\"}', NULL, '2021-04-14 15:12:02', '2021-04-14 15:12:02'),
('dcc168fd-a073-4a0e-9971-032f29554fa4', 'App\\Notifications\\OpportunityQuestionNotification', 'App\\Models\\User', 9, '{\"message\":\"A New Opportunity Question Has Been Made By Management\",\"opportunity_question_id\":14,\"type\":\"question\"}', NULL, '2021-04-14 13:19:07', '2021-04-14 13:19:07'),
('ddb4a5b5-9e62-47cc-a1bd-d29b96534986', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 9, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', NULL, '2021-04-20 11:59:52', '2021-04-20 11:59:52'),
('de6e32b3-879c-4f38-9866-a4593372cfda', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 2, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', NULL, '2021-04-20 11:52:35', '2021-04-20 11:52:35'),
('e73fd417-277d-4ffe-84e8-874bec6f1b10', 'App\\Notifications\\OpportunityQuestionNotification', 'App\\Models\\User', 2, '{\"message\":\"A New Opportunity Question Has Been Made By Management\",\"opportunity_question_id\":15,\"type\":\"question\"}', NULL, '2021-04-14 13:24:54', '2021-04-14 13:24:54'),
('f4b92c4d-66b5-4b20-8e69-382898dd4c5e', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 1, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', NULL, '2021-04-20 11:46:10', '2021-04-20 11:46:10'),
('f5e50ff8-4093-4d49-bc86-b4378ade2a93', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 1, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', '2021-05-10 12:09:00', '2021-04-20 11:59:52', '2021-05-10 12:09:00'),
('f6814f4b-0c94-487a-9ea5-b95577f11838', 'App\\Notifications\\OpportunityNotification', 'App\\Models\\User', 1, '{\"message\":\"A New Opportunity Has Been Assigned To You\",\"opportunity_id\":7,\"type\":\"assign\"}', NULL, '2021-06-15 07:08:32', '2021-06-15 07:08:32'),
('f749949b-0ddf-4d74-8080-faa938813bce', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 9, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', NULL, '2021-04-20 12:00:00', '2021-04-20 12:00:00'),
('f7c596b7-7e75-4d60-b2d6-5a1f3b7d8400', 'App\\Notifications\\OpportunityResultNotification', 'App\\Models\\User', 1, '{\"message\":\"A New Opportunity Result Has Been Confirmed To You\",\"opportunity_result_id\":4,\"type\":\"result\"}', NULL, '2021-04-15 11:17:52', '2021-04-15 11:17:52'),
('fb045487-8514-471d-a768-fa879e94f9d3', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 9, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', NULL, '2021-04-20 11:52:35', '2021-04-20 11:52:35'),
('fbe4e226-1ff0-4519-974b-adfadff02555', 'App\\Notifications\\OpportunityTaskNotification', 'App\\Models\\User', 9, '{\"message\":\"A New Opportunity Task Has Been Assigned To You\",\"opportunity_task_id\":1,\"type\":\"task\"}', NULL, '2021-04-20 12:00:09', '2021-04-20 12:00:09');

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
  `status` enum('in_progress','unsuccessful','meeting','successful') COLLATE utf8mb4_unicode_ci DEFAULT 'in_progress',
  `stage` enum('pending','won','lost','') COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `converting_approval` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hold_reason` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reject_reason` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rejected_by` bigint(20) UNSIGNED DEFAULT NULL,
  `reject_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hold_by` bigint(20) UNSIGNED DEFAULT NULL,
  `hold_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `submit_for_approve_by` bigint(20) UNSIGNED DEFAULT NULL,
  `submit_for_approve_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_community` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_type` enum('commercial','residential') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'commercial',
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `national_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone1_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone2_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone3_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone4_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `campaign_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `campaign_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `campaign_lead_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `campaign_form_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `campaign_ad_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `campaign_ad_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `campaign_adset_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loc_lat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loc_lng` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone1_symbol` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone2_symbol` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone3_symbol` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone4_symbol` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `opportunities`
--

INSERT INTO `opportunities` (`id`, `probability_of_winning`, `next_action`, `next_action_date`, `forecast_closing_date`, `expected_revenue`, `stage_id`, `agency_id`, `business_id`, `converted_by`, `assigned_to`, `salutation`, `source_id`, `type_id`, `qualification_id`, `communication_id`, `priority_id`, `company`, `website`, `po_box`, `passport`, `passport_expiration_date`, `first_name`, `sec_name`, `full_name`, `partner_name`, `date_of_birth`, `email1`, `email2`, `email3`, `nationality_id`, `city_id`, `phone1`, `phone2`, `phone3`, `phone4`, `landline`, `fax`, `developer`, `community`, `building_name`, `property_purpose`, `property_no`, `property_reference`, `property_id`, `size_sqft`, `size_sqm`, `bedrooms`, `bathrooms`, `parkings`, `skype`, `country_code`, `country_flag`, `timezone`, `country`, `address`, `other`, `created_at`, `updated_at`, `status`, `stage`, `converting_approval`, `hold_reason`, `reject_reason`, `rejected_by`, `reject_date`, `hold_by`, `hold_date`, `submit_for_approve_by`, `submit_for_approve_date`, `sub_community`, `property_type`, `table_name`, `national_id`, `phone1_code`, `phone2_code`, `phone3_code`, `phone4_code`, `campaign_id`, `campaign_name`, `campaign_lead_id`, `campaign_form_id`, `campaign_ad_id`, `campaign_ad_name`, `campaign_adset_name`, `loc_lat`, `loc_lng`, `phone1_symbol`, `phone2_symbol`, `phone3_symbol`, `phone4_symbol`) VALUES
(2, '35', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 'a:3:{i:0;s:1:\"2\";i:1;s:1:\"9\";i:2;s:1:\"1\";}', 'Mr', 66, 17, 5, 1, 1, NULL, NULL, NULL, NULL, NULL, 'Ahmed', 'mohamed', 'Ahmed mohamed', NULL, NULL, 'hamed@onetecgroup.com', NULL, NULL, 66, 1, '0100 614 3107', '0100 614 3108', '0106 598 9452', '01006143107', NULL, NULL, NULL, '664', NULL, 'rent', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Egypt', '15 شارع يوسف الجندي، باب اللوق، عابدين، محافظة القاهرة‬، مصر', NULL, '2021-03-22 11:48:47', '2021-07-25 08:08:31', 'successful', 'pending', 'waiting_for_approve', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-05-09', NULL, 'commercial', NULL, NULL, '20', '20', '20', '20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'eg', 'eg', 'eg', 'eg'),
(3, '10', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 'Mr', 66, 17, 5, 1, 1, NULL, NULL, NULL, NULL, NULL, 'Ahmed', 'ibrahim', 'Ahmed ibrahim', NULL, '2021-05-23', NULL, NULL, NULL, 1, 1, '0100 614 3107', '01006143102', '01006143122', NULL, NULL, NULL, '2', '664', NULL, 'rent', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '66', NULL, NULL, '2021-06-01 11:36:48', '2021-07-25 08:09:55', 'in_progress', 'pending', 'hold', 'reason', NULL, NULL, NULL, 1, '2021-07-14', NULL, NULL, NULL, 'commercial', 'opportunities', '29802280101954', '20', '20', '20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'eg', 'eg', 'eg', NULL),
(6, '34', NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 'Mr', 66, 17, 5, 1, 1, 'otg', NULL, NULL, NULL, NULL, 'Mahmoud', 'Mabrouk', 'Mahmoud Mabrouk', NULL, '2021-06-01', 'mabrouk@onetecgroup.com', NULL, NULL, 66, 1, '01006143107', '01006859745', NULL, NULL, NULL, NULL, '5', '664', 'test', 'rent', NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-07 19:40:33', '2021-07-25 08:59:29', 'in_progress', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'commercial', 'opportunities', NULL, '20', '20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'eg', 'eg', NULL, NULL);

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

--
-- Dumping data for table `opportunity_assign_tracking`
--

INSERT INTO `opportunity_assign_tracking` (`id`, `opportunity_id`, `reason_change_assign`, `agency_id`, `business_id`, `assigned_by`, `assigned_to`, `start_assign`, `end_assign`, `status`, `created_at`, `updated_at`) VALUES
(2, 2, NULL, 1, 1, 1, 'a:1:{i:0;s:1:\"2\";}', '2021-03-22', '2021-04-14', 'off', '2021-03-22 11:48:47', '2021-04-14 12:40:43'),
(3, 2, NULL, 1, 1, 1, 'a:1:{i:0;s:1:\"1\";}', '2021-04-14', '2021-04-14', 'off', '2021-04-14 12:40:43', '2021-04-14 12:48:49'),
(4, 2, NULL, 1, 1, 1, 'a:1:{i:0;s:1:\"9\";}', '2021-04-14', '2021-04-14', 'off', '2021-04-14 12:48:49', '2021-04-14 13:20:20'),
(5, 2, NULL, 1, 1, 1, 'a:3:{i:0;s:1:\"2\";i:1;s:1:\"9\";i:2;s:1:\"1\";}', '2021-04-14', NULL, 'on', '2021-04-14 13:20:20', '2021-04-14 13:20:20'),
(6, 3, NULL, 1, 1, 1, 'a:1:{i:0;s:1:\"1\";}', '2021-06-01', NULL, 'on', '2021-06-01 11:36:48', '2021-06-01 11:36:48'),
(9, 6, NULL, 1, 1, 1, 'a:1:{i:0;s:1:\"3\";}', '2021-06-07', NULL, 'on', '2021-06-07 19:40:33', '2021-06-07 19:40:33');

-- --------------------------------------------------------

--
-- Table structure for table `opportunity_contract_documents`
--

CREATE TABLE `opportunity_contract_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `opportunity_contract_id` bigint(20) UNSIGNED DEFAULT NULL,
  `opportunity_id` bigint(20) UNSIGNED DEFAULT NULL,
  `document` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `opportunity_contract_recurrings`
--

CREATE TABLE `opportunity_contract_recurrings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `opportunity_contract_id` bigint(20) UNSIGNED DEFAULT NULL,
  `opportunity_id` bigint(20) UNSIGNED DEFAULT NULL,
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
-- Table structure for table `opportunity_notes`
--

CREATE TABLE `opportunity_notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `opportunity_id` bigint(20) UNSIGNED DEFAULT NULL,
  `add_by` bigint(20) UNSIGNED DEFAULT NULL,
  `notes_en` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes_ar` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
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

-- --------------------------------------------------------

--
-- Table structure for table `opportunity_results`
--

CREATE TABLE `opportunity_results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `opportunity_id` bigint(20) UNSIGNED DEFAULT NULL,
  `added_by` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('in_progress','meeting','unsuccessful','successful') COLLATE utf8mb4_unicode_ci DEFAULT 'in_progress',
  `stage` enum('pending','lost','won') COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `opportunity_results`
--

INSERT INTO `opportunity_results` (`id`, `opportunity_id`, `added_by`, `status`, `stage`, `note`, `agency_id`, `business_id`, `created_at`, `updated_at`) VALUES
(2, 2, 1, 'in_progress', 'pending', 'note', NULL, NULL, '2021-03-22 11:48:47', '2021-03-22 11:48:47'),
(3, 2, 1, 'in_progress', 'pending', 'nnoy', NULL, NULL, '2021-04-14 14:22:21', '2021-04-14 14:22:21'),
(4, 2, 1, 'successful', 'pending', 'testing the codes', NULL, NULL, '2021-04-15 11:17:52', '2021-04-15 11:17:52'),
(5, 2, 1, 'in_progress', 'pending', 'test pending', NULL, NULL, '2021-06-01 10:39:20', '2021-06-01 10:39:20'),
(6, 3, 1, 'in_progress', 'pending', 'here', NULL, NULL, '2021-06-01 11:36:48', '2021-06-01 11:36:48'),
(9, 6, 1, 'in_progress', 'pending', 'note test', NULL, NULL, '2021-06-07 19:40:33', '2021-06-07 19:40:33');

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

-- --------------------------------------------------------

--
-- Table structure for table `opportunity_temp_contracts`
--

CREATE TABLE `opportunity_temp_contracts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `opportunity_id` bigint(20) UNSIGNED DEFAULT NULL,
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
(1, 'view_listing', 'web', '2021-06-20 12:51:13', '2021-06-20 12:51:13', 1),
(2, 'add_listing', 'web', '2021-06-20 12:51:13', '2021-06-20 12:51:13', 1),
(3, 'edit_listing', 'web', '2021-06-20 12:51:13', '2021-06-20 12:51:13', 1),
(4, 'delete_listing', 'web', '2021-06-20 12:51:13', '2021-06-20 12:51:13', 1),
(5, 'manage_listing_setting', 'web', '2021-06-20 12:51:13', '2021-06-20 12:51:13', 1),
(6, 'assign_listing_to_staff', 'web', '2021-06-20 12:51:13', '2021-06-20 12:51:13', 1),
(7, 'assign_task_on_listing', 'web', '2021-06-20 12:51:13', '2021-06-20 12:51:13', 1),
(8, 'share_listing', 'web', '2021-06-20 12:51:14', '2021-06-20 12:51:14', 1),
(9, 'listing_requests', 'web', '2021-06-20 12:51:14', '2021-06-20 12:51:14', 1),
(10, 'add_team', 'web', '2021-06-20 12:51:14', '2021-06-20 12:51:14', 2),
(11, 'view_team', 'web', '2021-06-20 12:51:14', '2021-06-20 12:51:14', 2),
(12, 'edit_team', 'web', '2021-06-20 12:51:14', '2021-06-20 12:51:14', 2),
(13, 'delete_team', 'web', '2021-06-20 12:51:14', '2021-06-20 12:51:14', 2),
(14, 'manage_own_team', 'web', '2021-06-20 12:51:14', '2021-06-20 12:51:14', 2),
(15, 'view_lead', 'web', '2021-06-20 12:51:14', '2021-06-20 12:51:14', 3),
(16, 'add_lead', 'web', '2021-06-20 12:51:14', '2021-06-20 12:51:14', 3),
(17, 'edit_lead', 'web', '2021-06-20 12:51:14', '2021-06-20 12:51:14', 3),
(18, 'delete_lead', 'web', '2021-06-20 12:51:14', '2021-06-20 12:51:14', 3),
(19, 'manage_lead_setting', 'web', '2021-06-20 12:51:15', '2021-06-20 12:51:15', 3),
(20, 'assign_lead_to_staff', 'web', '2021-06-20 12:51:15', '2021-06-20 12:51:15', 3),
(21, 'assign_task_on_lead', 'web', '2021-06-20 12:51:15', '2021-06-20 12:51:15', 3),
(22, 'convert_lead_to_opportunity', 'web', '2021-06-20 12:51:15', '2021-06-20 12:51:15', 3),
(23, 'manage_call_status', 'web', '2021-06-20 12:51:15', '2021-06-20 12:51:15', 3),
(24, 'view_bulk_upload', 'web', '2021-06-20 12:51:15', '2021-06-20 12:51:15', 4),
(25, 'add_bulk_upload', 'web', '2021-06-20 12:51:15', '2021-06-20 12:51:15', 4),
(26, 'view_search_center', 'web', '2021-06-20 12:51:15', '2021-06-20 12:51:15', 5),
(27, 'add_search_center', 'web', '2021-06-20 12:51:15', '2021-06-20 12:51:15', 5),
(28, 'view_opportunity', 'web', '2021-06-20 12:51:15', '2021-06-20 12:51:15', 6),
(29, 'edit_opportunity', 'web', '2021-06-20 12:51:15', '2021-06-20 12:51:15', 6),
(30, 'delete_opportunity', 'web', '2021-06-20 12:51:16', '2021-06-20 12:51:16', 6),
(31, 'manage_opportunity_setting', 'web', '2021-06-20 12:51:16', '2021-06-20 12:51:16', 6),
(32, 'assign_opportunity_to_staff', 'web', '2021-06-20 12:51:16', '2021-06-20 12:51:16', 6),
(33, 'assign_task_on_opportunity', 'web', '2021-06-20 12:51:16', '2021-06-20 12:51:16', 6),
(34, 'convert_opportunity_to_client', 'web', '2021-06-20 12:51:16', '2021-06-20 12:51:16', 6),
(35, 'add_question_on_opportunity', 'web', '2021-06-20 12:51:16', '2021-06-20 12:51:16', 6),
(36, 'view_client', 'web', '2021-06-20 12:51:16', '2021-06-20 12:51:16', 7),
(37, 'edit_client', 'web', '2021-06-20 12:51:16', '2021-06-20 12:51:16', 7),
(38, 'delete_client', 'web', '2021-06-20 12:51:16', '2021-06-20 12:51:16', 7),
(39, 'manage_client_setting', 'web', '2021-06-20 12:51:16', '2021-06-20 12:51:16', 7),
(40, 'assign_task_on_client', 'web', '2021-06-20 12:51:16', '2021-06-20 12:51:16', 7),
(41, 'add_question_on_client', 'web', '2021-06-20 12:51:17', '2021-06-20 12:51:17', 7),
(42, 'view_staff', 'web', '2021-06-20 12:51:17', '2021-06-20 12:51:17', 8),
(43, 'add_staff', 'web', '2021-06-20 12:51:17', '2021-06-20 12:51:17', 8),
(44, 'edit_staff', 'web', '2021-06-20 12:51:17', '2021-06-20 12:51:17', 8),
(45, 'delete_staff', 'web', '2021-06-20 12:51:17', '2021-06-20 12:51:17', 8),
(46, 'manage_team_staff', 'web', '2021-06-20 12:51:17', '2021-06-20 12:51:17', 8),
(47, 'set_team_manager', 'web', '2021-06-20 12:51:17', '2021-06-20 12:51:17', 8),
(48, 'manage_all_staff_privileges', 'web', '2021-06-20 12:51:17', '2021-06-20 12:51:17', 8),
(49, 'manage_own_contacts', 'web', '2021-06-20 12:51:17', '2021-06-20 12:51:17', 9),
(50, 'manage_team_users_contacts', 'web', '2021-06-20 12:51:17', '2021-06-20 12:51:17', 9),
(51, 'manage_all_users_contacts', 'web', '2021-06-20 12:51:17', '2021-06-20 12:51:17', 9),
(52, 'manage_own_roles', 'web', '2021-06-20 12:51:18', '2021-06-20 12:51:18', 10),
(53, 'manage_agency_profile', 'web', '2021-06-20 12:51:18', '2021-06-20 12:51:18', 10),
(54, 'manage_agency_settings', 'web', '2021-06-20 12:51:18', '2021-06-20 12:51:18', 10),
(55, 'manage_own_profile', 'web', '2021-06-20 12:51:18', '2021-06-20 12:51:18', 10),
(56, 'can_delete_deals', 'web', '2021-06-20 12:51:18', '2021-06-20 12:51:18', 11),
(57, 'manage_own_deals', 'web', '2021-06-20 12:51:18', '2021-06-20 12:51:18', 11),
(58, 'manage_team_users_deals', 'web', '2021-06-20 12:51:18', '2021-06-20 12:51:18', 11),
(59, 'manage_all_users_deals', 'web', '2021-06-20 12:51:18', '2021-06-20 12:51:18', 11),
(60, 'view_tasks', 'web', '2021-06-20 12:51:18', '2021-06-20 12:51:18', 12),
(61, 'add_tasks', 'web', '2021-06-20 12:51:18', '2021-06-20 12:51:18', 12),
(62, 'edit_tasks', 'web', '2021-06-20 12:51:18', '2021-06-20 12:51:18', 12),
(63, 'delete_tasks', 'web', '2021-06-20 12:51:18', '2021-06-20 12:51:18', 12),
(64, 'update_task_status', 'web', '2021-06-20 12:51:19', '2021-06-20 12:51:19', 12),
(65, 'view_notes', 'web', '2021-06-20 12:51:19', '2021-06-20 12:51:19', 13),
(66, 'add_notes', 'web', '2021-06-20 12:51:19', '2021-06-20 12:51:19', 13),
(67, 'edit_notes', 'web', '2021-06-20 12:51:19', '2021-06-20 12:51:19', 13),
(68, 'delete_notes', 'web', '2021-06-20 12:51:19', '2021-06-20 12:51:19', 13),
(69, 'view_emails', 'web', '2021-06-20 12:51:19', '2021-06-20 12:51:19', 14),
(70, 'add_emails', 'web', '2021-06-20 12:51:19', '2021-06-20 12:51:19', 14),
(71, 'view_logs', 'web', '2021-06-20 12:51:19', '2021-06-20 12:51:19', 15),
(72, 'manage_own_settings', 'web', '2021-06-20 12:51:20', '2021-06-20 12:51:20', 16),
(73, 'manage_all_user_settings', 'web', '2021-06-20 12:51:20', '2021-06-20 12:51:20', 16),
(74, 'can_view_setting', 'web', '2021-06-20 12:51:20', '2021-06-20 12:51:20', 16),
(75, 'manage_templates', 'web', '2021-06-20 12:51:20', '2021-06-20 12:51:20', 16),
(76, 'manage_mailing_list', 'web', '2021-06-20 12:51:20', '2021-06-20 12:51:20', 16),
(77, 'manage_email_notifications', 'web', '2021-06-20 12:51:20', '2021-06-20 12:51:20', 16),
(78, 'manage_floor_plans', 'web', '2021-06-20 12:51:20', '2021-06-20 12:51:20', 16),
(79, 'manage_image_banks', 'web', '2021-06-20 12:51:20', '2021-06-20 12:51:20', 16),
(80, 'manage_contacts_settings', 'web', '2021-06-20 12:51:21', '2021-06-20 12:51:21', 16),
(81, 'manage_listing_settings', 'web', '2021-06-20 12:51:21', '2021-06-20 12:51:21', 16),
(82, 'manage_task_types', 'web', '2021-06-20 12:51:21', '2021-06-20 12:51:21', 16),
(83, 'can_generate_reports', 'web', '2021-06-20 12:51:21', '2021-06-20 12:51:21', 17),
(84, 'make_as_public', 'web', '2021-06-20 12:51:21', '2021-06-20 12:51:21', 18);

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
(1, 'listings', '2021-06-20 12:50:43', '2021-06-20 12:50:43'),
(2, 'teams', '2021-06-20 12:51:14', '2021-06-20 12:51:14'),
(3, 'leads', '2021-06-20 12:51:14', '2021-06-20 12:51:14'),
(4, 'bulk_uploads', '2021-06-20 12:51:15', '2021-06-20 12:51:15'),
(5, 'search_center', '2021-06-20 12:51:15', '2021-06-20 12:51:15'),
(6, 'opportunities', '2021-06-20 12:51:15', '2021-06-20 12:51:15'),
(7, 'clients', '2021-06-20 12:51:16', '2021-06-20 12:51:16'),
(8, 'staff', '2021-06-20 12:51:17', '2021-06-20 12:51:17'),
(9, 'contacts', '2021-06-20 12:51:17', '2021-06-20 12:51:17'),
(10, 'profile', '2021-06-20 12:51:17', '2021-06-20 12:51:17'),
(11, 'deal', '2021-06-20 12:51:18', '2021-06-20 12:51:18'),
(12, 'tasks', '2021-06-20 12:51:18', '2021-06-20 12:51:18'),
(13, 'notes', '2021-06-20 12:51:19', '2021-06-20 12:51:19'),
(14, 'emails', '2021-06-20 12:51:19', '2021-06-20 12:51:19'),
(15, 'logs', '2021-06-20 12:51:19', '2021-06-20 12:51:19'),
(16, 'settings', '2021-06-20 12:51:19', '2021-06-20 12:51:19'),
(17, 'reports', '2021-06-20 12:51:21', '2021-06-20 12:51:21'),
(18, 'image_bank', '2021-06-20 12:51:21', '2021-06-20 12:51:21');

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
-- Table structure for table `portal_listings`
--

CREATE TABLE `portal_listings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `listing_id` bigint(20) UNSIGNED DEFAULT NULL,
  `portal_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `response` enum('pending','accepted','refused') COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `sender_id` bigint(20) UNSIGNED DEFAULT NULL,
  `receiver_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `statistics`
--

CREATE TABLE `statistics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `data_source` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('sale','rent') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `community_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purpose` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subcommunity_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size_sqm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_sqm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_worth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size_sqft` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_sqft` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_communities`
--

CREATE TABLE `sub_communities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `community_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_communities`
--

INSERT INTO `sub_communities` (`id`, `name_en`, `name_ar`, `community_id`, `created_at`, `updated_at`, `country_id`) VALUES
(18, 'Supreme Tower', 'Supreme Tower', 8, '2021-06-21 23:35:01', '2021-06-21 23:35:01', 234),
(19, 'The Waterfront', 'The Waterfront', 8, '2021-06-21 23:35:01', '2021-06-21 23:35:01', 234),
(20, '23 Marina', '23 Marina', 8, '2021-06-21 23:35:01', '2021-06-21 23:35:01', 234),
(21, 'DEC Towers', 'DEC Towers', 8, '2021-06-21 23:35:01', '2021-06-21 23:35:01', 234),
(22, 'The Royal Oceanic', 'The Royal Oceanic', 8, '2021-06-21 23:35:01', '2021-06-21 23:35:01', 234),
(23, 'Trident Grand Residence', 'Trident Grand Residence', 8, '2021-06-21 23:35:01', '2021-06-21 23:35:01', 234),
(24, 'La Riviera', 'La Riviera', 8, '2021-06-21 23:35:01', '2021-06-21 23:35:01', 234),
(25, 'Elite Residence', 'Elite Residence', 8, '2021-06-21 23:35:01', '2021-06-21 23:35:01', 234),
(26, 'Marina Residence', 'Marina Residence', 8, '2021-06-21 23:35:01', '2021-06-21 23:35:01', 234),
(27, 'Al Atina Twin Towers', 'Al Atina Twin Towers', 8, '2021-06-21 23:35:01', '2021-06-21 23:35:01', 234),
(28, 'Bayside Residence', 'Bayside Residence', 8, '2021-06-21 23:35:01', '2021-06-21 23:35:01', 234),
(29, 'Manchester Tower', 'Manchester Tower', 8, '2021-06-21 23:35:01', '2021-06-21 23:35:01', 234),
(30, 'Marina Mansions', 'Marina Mansions', 8, '2021-06-21 23:35:01', '2021-06-21 23:35:01', 234),
(31, 'Number One Dubai Marina', 'Number One Dubai Marina', 8, '2021-06-21 23:35:01', '2021-06-21 23:35:01', 234),
(32, 'Panoramic', 'Panoramic', 8, '2021-06-21 23:35:01', '2021-06-21 23:35:01', 234),
(33, 'Pier 24', 'Pier 24', 8, '2021-06-21 23:35:01', '2021-06-21 23:35:01', 234),
(34, 'Shahla Tower', 'Shahla Tower', 8, '2021-06-21 23:35:01', '2021-06-21 23:35:01', 234),
(35, 'The Atlantic', 'The Atlantic', 8, '2021-06-21 23:35:01', '2021-06-21 23:35:01', 234),
(36, 'The Pacific', 'The Pacific', 8, '2021-06-21 23:35:01', '2021-06-21 23:35:01', 234),
(37, 'Yacht Bay', 'Yacht Bay', 8, '2021-06-21 23:35:01', '2021-06-21 23:35:01', 234),
(38, 'Al Marsa Tower', 'Al Marsa Tower', 8, '2021-06-21 23:35:01', '2021-06-21 23:35:01', 234),
(39, 'Al Seef Tower', 'Al Seef Tower', 8, '2021-06-21 23:35:01', '2021-06-21 23:35:01', 234),
(40, 'ARY Marina View', 'ARY Marina View', 8, '2021-06-21 23:35:01', '2021-06-21 23:35:01', 234),
(41, 'Azure', 'Azure', 8, '2021-06-21 23:35:01', '2021-06-21 23:35:01', 234),
(42, 'Emerald Residence', 'Emerald Residence', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(43, 'Gargash Tower', 'Gargash Tower', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(44, 'Iris Blue', 'Iris Blue', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(45, 'Marina Pearl', 'Marina Pearl', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(46, 'Marina Pinnacle', 'Marina Pinnacle', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(47, 'Marina Sail', 'Marina Sail', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(48, 'The Belvedere', 'The Belvedere', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(49, 'The Cascades', 'The Cascades', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(50, 'Dream Towers', 'Dream Towers', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(51, 'The Point', 'The Point', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(52, 'The Torch', 'The Torch', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(53, 'Al Areifi Marina', 'Al Areifi Marina', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(54, 'Horizon Tower', 'Horizon Tower', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(55, 'Cayan Tower', 'Cayan Tower', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(56, 'KG Tower', 'KG Tower', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(57, 'La Residence Del Mar', 'La Residence Del Mar', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(58, 'Le Reve', 'Le Reve', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(59, 'Mag 218 Tower', 'Mag 218 Tower', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(60, 'Marina Crown', 'Marina Crown', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(61, 'Marina Heights Tower', 'Marina Heights Tower', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(62, 'Marina Terrace', 'Marina Terrace', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(63, 'Ocean Heights', 'Ocean Heights', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(64, 'Princess Tower', 'Princess Tower', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(65, 'The Jewels', 'The Jewels', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(66, 'The Waves', 'The Waves', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(67, 'Emaar 2N Tower', 'Emaar 2N Tower', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(68, 'Marina Garden', 'Marina Garden', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(69, 'DAMAC Residenze', 'DAMAC Residenze', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(70, 'Silverene', 'Silverene', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(71, 'Marina Suites', 'Marina Suites', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(72, 'Marina 101', 'Marina 101', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(73, 'Dorrabay', 'Dorrabay', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(74, 'Time Place', 'Time Place', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(75, 'Westside Marina', 'Westside Marina', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(76, 'The Zen', 'The Zen', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(77, 'Casa Del Sol', 'Casa Del Sol', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(78, 'Miramar', 'Miramar', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(79, 'Emirates Crown', 'Emirates Crown', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(80, 'KPM Tower', 'KPM Tower', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(81, 'Zumurud Tower', 'Zumurud Tower', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(82, 'Harbour Residence', 'Harbour Residence', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(83, 'Najd Tower', 'Najd Tower', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(84, 'Marina Crystal', 'Marina Crystal', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(85, 'The Lighthouse', 'The Lighthouse', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(86, 'Marina Promenade', 'Marina Promenade', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(87, 'The Address Dubai Marina (Mall Hotel)', 'The Address Dubai Marina (Mall Hotel)', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(88, 'Sulafa Tower', 'Sulafa Tower', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(89, 'Marina Plaza', 'Marina Plaza', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(90, 'Botanica Tower', 'Botanica Tower', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(91, 'Marina Park', 'Marina Park', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(92, 'Skyview Tower', 'Skyview Tower', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(93, 'Orra Marina', 'Orra Marina', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(94, 'Marina Arcade', 'Marina Arcade', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(95, 'Gulf Tower', 'Gulf Tower', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(96, 'Venti Quattro', 'Venti Quattro', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(97, 'Lotus Hotel Apartments &amp; Spa', 'Lotus Hotel Apartments &amp; Spa', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(98, 'Casa Del Mar', 'Casa Del Mar', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(99, 'Al Fardan Towers', 'Al Fardan Towers', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(100, 'Al Habtoor Tower', 'Al Habtoor Tower', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(101, 'TAMANI Hotel Marina', 'TAMANI Hotel Marina', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(102, 'Al Habtoor Business Tower', 'Al Habtoor Business Tower', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(103, 'Lootah Complex (Al Husn Marina)', 'Lootah Complex (Al Husn Marina)', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(104, 'Ariyana Tower', 'Ariyana Tower', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(105, 'Marina Opal Tower', 'Marina Opal Tower', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(106, 'Dusit Residence Dubai Marina', 'Dusit Residence Dubai Marina', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(107, 'Marina Hotel Apartments', 'Marina Hotel Apartments', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(108, 'West Avenue', 'West Avenue', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(109, 'Escan Marina Tower', 'Escan Marina Tower', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(110, 'Marina Tower', 'Marina Tower', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(111, 'No. 9', 'No. 9', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(112, 'Al Majara', 'Al Majara', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(113, 'Al Sahab Tower', 'Al Sahab Tower', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(114, 'Bay Central', 'Bay Central', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(115, 'Dubai Marina Towers (Emaar 6 Towers)', 'Dubai Marina Towers (Emaar 6 Towers)', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(116, 'Marina View Tower', 'Marina View Tower', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(117, 'Marina Wharf', 'Marina Wharf', 8, '2021-06-21 23:35:02', '2021-06-21 23:35:02', 234),
(118, 'Bunyan Tower', 'Bunyan Tower', 8, '2021-06-21 23:35:03', '2021-06-21 23:35:03', 234),
(119, 'Sukoon Tower', 'Sukoon Tower', 8, '2021-06-21 23:35:03', '2021-06-21 23:35:03', 234),
(120, 'Marina Gate', 'Marina Gate', 8, '2021-06-21 23:35:03', '2021-06-21 23:35:03', 234),
(121, 'Grosvenor House', 'Grosvenor House', 8, '2021-06-21 23:35:03', '2021-06-21 23:35:03', 234),
(122, 'Al Dar Tower', 'Al Dar Tower', 8, '2021-06-21 23:35:03', '2021-06-21 23:35:03', 234),
(123, 'InterContinental Dubai Marina', 'InterContinental Dubai Marina', 8, '2021-06-21 23:35:03', '2021-06-21 23:35:03', 234),
(124, 'Wyndham Dubai Marina', 'Wyndham Dubai Marina', 8, '2021-06-21 23:35:03', '2021-06-21 23:35:03', 234),
(125, 'Al Anbar Villas', 'Al Anbar Villas', 8, '2021-06-21 23:35:03', '2021-06-21 23:35:03', 234),
(126, '5242 Towers', '5242 Towers', 8, '2021-06-21 23:35:03', '2021-06-21 23:35:03', 234),
(127, 'Sparkle Towers', 'Sparkle Towers', 8, '2021-06-21 23:35:03', '2021-06-21 23:35:03', 234),
(128, 'Damac Heights', 'Damac Heights', 8, '2021-06-21 23:35:03', '2021-06-21 23:35:03', 234),
(129, 'Studio One Tower', 'Studio One Tower', 8, '2021-06-21 23:35:03', '2021-06-21 23:35:03', 234),
(130, 'Dubai Marina Walk', 'Dubai Marina Walk', 8, '2021-06-21 23:35:03', '2021-06-21 23:35:03', 234),
(131, 'Al Shebani Residence', 'Al Shebani Residence', 8, '2021-06-21 23:35:03', '2021-06-21 23:35:03', 234),
(132, 'Continental Tower', 'Continental Tower', 8, '2021-06-21 23:35:03', '2021-06-21 23:35:03', 234),
(133, 'Vida Residences Dubai Marina', 'Vida Residences Dubai Marina', 8, '2021-06-21 23:35:03', '2021-06-21 23:35:03', 234),
(134, 'Jannah Place Dubai Marina', 'Jannah Place Dubai Marina', 8, '2021-06-21 23:35:03', '2021-06-21 23:35:03', 234),
(135, 'Marina First Tower', 'Marina First Tower', 8, '2021-06-21 23:35:03', '2021-06-21 23:35:03', 234),
(136, 'Dubai Marina Mall', 'Dubai Marina Mall', 8, '2021-06-21 23:35:03', '2021-06-21 23:35:03', 234),
(137, 'Dubai Marriott Harbour Hotel &amp; Suites', 'Dubai Marriott Harbour Hotel &amp; Suites', 8, '2021-06-21 23:35:03', '2021-06-21 23:35:03', 234),
(138, 'Le Royal Meridien Beach Resort &amp; Spa', 'Le Royal Meridien Beach Resort &amp; Spa', 8, '2021-06-21 23:35:03', '2021-06-21 23:35:03', 234),
(139, 'Marinascape', 'Marinascape', 8, '2021-06-21 23:35:03', '2021-06-21 23:35:03', 234),
(140, 'Park Island', 'Park Island', 8, '2021-06-21 23:35:03', '2021-06-21 23:35:03', 234),
(141, 'Marina Diamonds', 'Marina Diamonds', 8, '2021-06-21 23:35:03', '2021-06-21 23:35:03', 234),
(142, 'City Premier Marina Hotel Apartments', 'City Premier Marina Hotel Apartments', 8, '2021-06-21 23:35:03', '2021-06-21 23:35:03', 234),
(143, 'Stella Maris', 'Stella Maris', 8, '2021-06-21 23:35:03', '2021-06-21 23:35:03', 234),
(144, 'Marina View Hotel Apartments', 'Marina View Hotel Apartments', 8, '2021-06-21 23:35:03', '2021-06-21 23:35:03', 234),
(145, 'Radisson Blu Residence Dubai Marina', 'Radisson Blu Residence Dubai Marina', 8, '2021-06-21 23:35:03', '2021-06-21 23:35:03', 234),
(146, 'Pie7', 'Pie7', 8, '2021-06-21 23:35:03', '2021-06-21 23:35:03', 234),
(147, 'Durrat Al Marsa', 'Durrat Al Marsa', 8, '2021-06-21 23:35:03', '2021-06-21 23:35:03', 234),
(148, 'Marina Byblos Hotel', 'Marina Byblos Hotel', 8, '2021-06-21 23:35:03', '2021-06-21 23:35:03', 234),
(149, 'Al Mass Villas', 'Al Mass Villas', 8, '2021-06-21 23:35:03', '2021-06-21 23:35:03', 234),
(150, 'Al Mesk Villas', 'Al Mesk Villas', 8, '2021-06-21 23:35:03', '2021-06-21 23:35:03', 234),
(151, 'LIV Residence', 'LIV Residence', 8, '2021-06-21 23:35:03', '2021-06-21 23:35:03', 234),
(152, 'Trident Bayside', 'Trident Bayside', 8, '2021-06-21 23:35:03', '2021-06-21 23:35:03', 234),
(153, 'TFG Marina Hotel', 'TFG Marina Hotel', 8, '2021-06-21 23:35:03', '2021-06-21 23:35:03', 234),
(154, 'JAM Marina Residence', 'JAM Marina Residence', 8, '2021-06-21 23:35:03', '2021-06-21 23:35:03', 234),
(155, 'My Tower', 'My Tower', 8, '2021-06-21 23:35:03', '2021-06-21 23:35:03', 234),
(156, 'Pier 8', 'Pier 8', 8, '2021-06-21 23:35:03', '2021-06-21 23:35:03', 234),
(157, 'Le Grande Community Mall', 'Le Grande Community Mall', 8, '2021-06-21 23:35:03', '2021-06-21 23:35:03', 234),
(158, 'Al Zarooni Buildings', 'Al Zarooni Buildings', 8, '2021-06-21 23:35:03', '2021-06-21 23:35:03', 234),
(159, 'Signature Hotel Apartments &amp; Spa Marina', 'Signature Hotel Apartments &amp; Spa Marina', 8, '2021-06-21 23:35:03', '2021-06-21 23:35:03', 234),
(160, 'Jannah Marina Hotel Apartments', 'Jannah Marina Hotel Apartments', 8, '2021-06-21 23:35:03', '2021-06-21 23:35:03', 234),
(161, 'Rove Dubai Marina', 'Rove Dubai Marina', 8, '2021-06-21 23:35:03', '2021-06-21 23:35:03', 234),
(162, 'Barcelo Residences', 'Barcelo Residences', 8, '2021-06-21 23:35:03', '2021-06-21 23:35:03', 234),
(163, 'Extreme Waterfront Offices', 'Extreme Waterfront Offices', 8, '2021-06-21 23:35:03', '2021-06-21 23:35:03', 234),
(164, 'Nuran Marina Serviced Residences', 'Nuran Marina Serviced Residences', 8, '2021-06-21 23:35:03', '2021-06-21 23:35:03', 234),
(165, 'Dusit Princess Residence', 'Dusit Princess Residence', 8, '2021-06-21 23:35:03', '2021-06-21 23:35:03', 234),
(166, 'Trident Waterfront', 'Trident Waterfront', 8, '2021-06-21 23:35:03', '2021-06-21 23:35:03', 234),
(167, 'Marina Quays', 'Marina Quays', 8, '2021-06-21 23:35:03', '2021-06-21 23:35:03', 234),
(168, 'Landmark Group Tower', 'Landmark Group Tower', 8, '2021-06-21 23:35:03', '2021-06-21 23:35:03', 234),
(169, 'Orra Harbour Residences', 'Orra Harbour Residences', 8, '2021-06-21 23:35:03', '2021-06-21 23:35:03', 234),
(170, 'Ciel Tower', 'Ciel Tower', 8, '2021-06-21 23:35:03', '2021-06-21 23:35:03', 234),
(171, 'Millennium Place', 'Millennium Place', 8, '2021-06-21 23:35:03', '2021-06-21 23:35:03', 234),
(172, 'Al Manara Tower', 'Al Manara Tower', 9, '2021-06-21 23:43:38', '2021-06-21 23:43:38', 234),
(173, 'B2B Tower', 'B2B Tower', 9, '2021-06-21 23:43:38', '2021-06-21 23:43:38', 234),
(174, 'Bayswater Tower', 'Bayswater Tower', 9, '2021-06-21 23:43:38', '2021-06-21 23:43:38', 234),
(175, 'Burlington', 'Burlington', 9, '2021-06-21 23:43:38', '2021-06-21 23:43:38', 234),
(176, 'Business Central', 'Business Central', 9, '2021-06-21 23:43:38', '2021-06-21 23:43:38', 234),
(177, 'DAMAC Business Tower', 'DAMAC Business Tower', 9, '2021-06-21 23:43:38', '2021-06-21 23:43:38', 234),
(178, 'Clayton Residency', 'Clayton Residency', 9, '2021-06-21 23:43:38', '2021-06-21 23:43:38', 234),
(179, 'Corporate Bay', 'Corporate Bay', 9, '2021-06-21 23:43:38', '2021-06-21 23:43:38', 234),
(180, 'DEC Business Tower', 'DEC Business Tower', 9, '2021-06-21 23:43:38', '2021-06-21 23:43:38', 234),
(181, 'Hamilton Residency', 'Hamilton Residency', 9, '2021-06-21 23:43:38', '2021-06-21 23:43:38', 234),
(182, 'Iris Bay', 'Iris Bay', 9, '2021-06-21 23:43:38', '2021-06-21 23:43:38', 234),
(183, 'Mayfair Tower', 'Mayfair Tower', 9, '2021-06-21 23:43:38', '2021-06-21 23:43:38', 234),
(184, 'Mayfair Residency', 'Mayfair Residency', 9, '2021-06-21 23:43:38', '2021-06-21 23:43:38', 234),
(185, 'Metropolis Tower', 'Metropolis Tower', 9, '2021-06-21 23:43:38', '2021-06-21 23:43:38', 234),
(186, 'Moon Tower', 'Moon Tower', 9, '2021-06-21 23:43:38', '2021-06-21 23:43:38', 234),
(187, 'One Business Bay', 'One Business Bay', 9, '2021-06-21 23:43:38', '2021-06-21 23:43:38', 234),
(188, 'Ontario Tower', 'Ontario Tower', 9, '2021-06-21 23:43:38', '2021-06-21 23:43:38', 234),
(189, 'The Regal Tower', 'The Regal Tower', 9, '2021-06-21 23:43:38', '2021-06-21 23:43:38', 234),
(190, '15 Northside', '15 Northside', 9, '2021-06-21 23:43:38', '2021-06-21 23:43:38', 234),
(191, 'The Binary', 'The Binary', 9, '2021-06-21 23:43:38', '2021-06-21 23:43:38', 234),
(192, 'The Citadel', 'The Citadel', 9, '2021-06-21 23:43:38', '2021-06-21 23:43:38', 234),
(193, 'Executive Towers', 'Executive Towers', 9, '2021-06-21 23:43:38', '2021-06-21 23:43:38', 234),
(194, 'The Opus', 'The Opus', 9, '2021-06-21 23:43:38', '2021-06-21 23:43:38', 234),
(195, 'The Pad', 'The Pad', 9, '2021-06-21 23:43:38', '2021-06-21 23:43:38', 234),
(196, 'The Prism', 'The Prism', 9, '2021-06-21 23:43:38', '2021-06-21 23:43:38', 234),
(197, 'The Skyscraper', 'The Skyscraper', 9, '2021-06-21 23:43:38', '2021-06-21 23:43:38', 234),
(198, 'The Vision Tower', 'The Vision Tower', 9, '2021-06-21 23:43:38', '2021-06-21 23:43:38', 234),
(199, 'Water Edge', 'Water Edge', 9, '2021-06-21 23:43:38', '2021-06-21 23:43:38', 234),
(200, 'West Wharf', 'West Wharf', 9, '2021-06-21 23:43:38', '2021-06-21 23:43:38', 234),
(201, 'Windsor Manor', 'Windsor Manor', 9, '2021-06-21 23:43:38', '2021-06-21 23:43:38', 234),
(202, 'XL Tower', 'XL Tower', 9, '2021-06-21 23:43:38', '2021-06-21 23:43:38', 234),
(203, '51@BusinessBay', '51@BusinessBay', 9, '2021-06-21 23:43:38', '2021-06-21 23:43:38', 234),
(204, 'The Exchange Business Bay', 'The Exchange Business Bay', 9, '2021-06-21 23:43:38', '2021-06-21 23:43:38', 234),
(205, 'The Court Tower', 'The Court Tower', 9, '2021-06-21 23:43:38', '2021-06-21 23:43:38', 234),
(206, 'Crystal Tower', 'Crystal Tower', 9, '2021-06-21 23:43:38', '2021-06-21 23:43:38', 234),
(207, 'The Executive Bay', 'The Executive Bay', 9, '2021-06-21 23:43:38', '2021-06-21 23:43:38', 234),
(208, 'Park Central', 'Park Central', 9, '2021-06-21 23:43:38', '2021-06-21 23:43:38', 234),
(209, 'Silver Tower Business Bay', 'Silver Tower Business Bay', 9, '2021-06-21 23:43:38', '2021-06-21 23:43:38', 234),
(210, 'The Bay Gate', 'The Bay Gate', 9, '2021-06-21 23:43:38', '2021-06-21 23:43:38', 234),
(211, 'The Sky Villa', 'The Sky Villa', 9, '2021-06-21 23:43:38', '2021-06-21 23:43:38', 234),
(212, 'O14', 'O14', 9, '2021-06-21 23:43:38', '2021-06-21 23:43:38', 234),
(213, 'The Prime Tower', 'The Prime Tower', 9, '2021-06-21 23:43:38', '2021-06-21 23:43:38', 234),
(214, 'U-Bora Tower', 'U-Bora Tower', 9, '2021-06-21 23:43:38', '2021-06-21 23:43:38', 234),
(215, 'Empire Heights', 'Empire Heights', 9, '2021-06-21 23:43:38', '2021-06-21 23:43:38', 234),
(216, 'Tamani Arts Offices', 'Tamani Arts Offices', 9, '2021-06-21 23:43:38', '2021-06-21 23:43:38', 234),
(217, 'Bay Square', 'Bay Square', 9, '2021-06-21 23:43:38', '2021-06-21 23:43:38', 234),
(218, 'Canada Business Centre Tower', 'Canada Business Centre Tower', 9, '2021-06-21 23:43:38', '2021-06-21 23:43:38', 234),
(219, 'Lake Central', 'Lake Central', 9, '2021-06-21 23:43:38', '2021-06-21 23:43:38', 234),
(220, 'Bareeq Tower', 'Bareeq Tower', 9, '2021-06-21 23:43:38', '2021-06-21 23:43:38', 234),
(221, 'Westburry Square', 'Westburry Square', 9, '2021-06-21 23:43:38', '2021-06-21 23:43:38', 234),
(222, 'WestBay Tower', 'WestBay Tower', 9, '2021-06-21 23:43:38', '2021-06-21 23:43:38', 234),
(223, 'Renaissance Tower', 'Renaissance Tower', 9, '2021-06-21 23:43:38', '2021-06-21 23:43:38', 234),
(224, 'Fairview Residency', 'Fairview Residency', 9, '2021-06-21 23:43:38', '2021-06-21 23:43:38', 234),
(225, 'Lillian Towers', 'Lillian Towers', 9, '2021-06-21 23:43:38', '2021-06-21 23:43:38', 234),
(226, 'Octavian', 'Octavian', 9, '2021-06-21 23:43:38', '2021-06-21 23:43:38', 234),
(227, 'Opal Tower', 'Opal Tower', 9, '2021-06-21 23:43:38', '2021-06-21 23:43:38', 234),
(228, 'Sobha Sapphire', 'Sobha Sapphire', 9, '2021-06-21 23:43:38', '2021-06-21 23:43:38', 234),
(229, 'Grosvenor Business Bay Tower', 'Grosvenor Business Bay Tower', 9, '2021-06-21 23:43:38', '2021-06-21 23:43:38', 234),
(230, 'The Oberoi', 'The Oberoi', 9, '2021-06-21 23:43:38', '2021-06-21 23:43:38', 234),
(231, 'Boris Becker Business Tower', 'Boris Becker Business Tower', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(232, 'Oxford Tower', 'Oxford Tower', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(233, 'Blue Bay', 'Blue Bay', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(234, 'Clover Bay Tower', 'Clover Bay Tower', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(235, 'Global Bay View 3', 'Global Bay View 3', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(236, 'Escape Tower', 'Escape Tower', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(237, 'Falcon Tower', 'Falcon Tower', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(238, 'Manazel Al Safa', 'Manazel Al Safa', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(239, 'MBK Tower', 'MBK Tower', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(240, 'The Residences at Business Central', 'The Residences at Business Central', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(241, 'DAMAC Towers by Paramount Hotels and Resorts', 'DAMAC Towers by Paramount Hotels and Resorts', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(242, 'The Atria', 'The Atria', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(243, 'Sobha Ivory', 'Sobha Ivory', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(244, 'ENI Coral Tower', 'ENI Coral Tower', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(245, 'Safeer Tower 1', 'Safeer Tower 1', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(246, 'Majestine Allure', 'Majestine Allure', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(247, 'Capital Golden Tower', 'Capital Golden Tower', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(248, 'Safeer Tower 2', 'Safeer Tower 2', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(249, 'Belhabb Tower', 'Belhabb Tower', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(250, 'Damac Maison Bays Edge', 'Damac Maison Bays Edge', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(251, 'Merano Tower', 'Merano Tower', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(252, 'Aykon City', 'Aykon City', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(253, 'Al Habtoor City', 'Al Habtoor City', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(254, 'Marquise Square', 'Marquise Square', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(255, 'Paramount Hotel &amp; Residences', 'Paramount Hotel &amp; Residences', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(256, 'Kempinski Residences', 'Kempinski Residences', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(257, 'Majestic Tower', 'Majestic Tower', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(258, 'Al Shafar Tower', 'Al Shafar Tower', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(259, 'The Sterling', 'The Sterling', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(260, 'AG Tower', 'AG Tower', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(261, 'Residence 22', 'Residence 22', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(262, 'Volante Tower', 'Volante Tower', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(263, 'Art Tower XV', 'Art Tower XV', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(264, 'Damac Maison Cour Jardin', 'Damac Maison Cour Jardin', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(265, 'MAG 318', 'MAG 318', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(266, 'DAMAC Maison The Vogue (Burj Damac 5)', 'DAMAC Maison The Vogue (Burj Damac 5)', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(267, 'Park Lane Tower', 'Park Lane Tower', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(268, 'Scala Tower', 'Scala Tower', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(269, 'The St.Regis dubai', 'The St.Regis dubai', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(270, 'Capital Bay Towers', 'Capital Bay Towers', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(271, 'Bayz by Danube', 'Bayz by Danube', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(272, 'The Westin Dubai', 'The Westin Dubai', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(273, 'Avanti Tower', 'Avanti Tower', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(274, 'Elite Business Bay Residence', 'Elite Business Bay Residence', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(275, 'J One', 'J One', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(276, 'DAMAC Maison De Ville Breeze', 'DAMAC Maison De Ville Breeze', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(277, 'Marasi Riverside', 'Marasi Riverside', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(278, 'Bay Avenue Mall', 'Bay Avenue Mall', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(279, 'DAMAC Maison Privé', 'DAMAC Maison Privé', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(280, 'Damac Maison Canal Views', 'Damac Maison Canal Views', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(281, 'Vera Residences', 'Vera Residences', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(282, 'International Business Tower', 'International Business Tower', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(283, 'JW Marriott Marquis Hotel', 'JW Marriott Marquis Hotel', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(284, 'Reva Residences', 'Reva Residences', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(285, 'I love Florence Tower', 'I love Florence Tower', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(286, 'Millennium Binghatti Residences', 'Millennium Binghatti Residences', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(287, 'Damac Maison Majestine', 'Damac Maison Majestine', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(288, 'Al Abraj Street', 'Al Abraj Street', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(289, 'Vezul Tower', 'Vezul Tower', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(290, 'SLS Dubai Hotel &amp; Residences', 'SLS Dubai Hotel &amp; Residences', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(291, 'Zada Residence', 'Zada Residence', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(292, 'Al Batha Tower', 'Al Batha Tower', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(293, 'Residence 110', 'Residence 110', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(294, 'Bay View Tower', 'Bay View Tower', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(295, 'Sky Bay Hotel', 'Sky Bay Hotel', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(296, 'Al Noor Tower', 'Al Noor Tower', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(297, 'The Dorchester Collection', 'The Dorchester Collection', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(298, 'Sol Bay', 'Sol Bay', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(299, 'Millennium Atria', 'Millennium Atria', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(300, 'The 9', 'The 9', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(301, 'Royal Continental Suites', 'Royal Continental Suites', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(302, 'Millennium Central Downtown', 'Millennium Central Downtown', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(303, 'Art XIV14', 'Art XIV14', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(304, 'Nobles Tower', 'Nobles Tower', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(305, 'Sol Avenue', 'Sol Avenue', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(306, 'Churchill Towers', 'Churchill Towers', 9, '2021-06-21 23:43:39', '2021-06-21 23:43:39', 234),
(307, 'Silver Tower (Ag Tower)', 'Silver Tower (Ag Tower)', 10, '2021-06-21 23:46:35', '2021-06-21 23:46:35', 234),
(308, 'Almas Tower', 'Almas Tower', 10, '2021-06-21 23:46:35', '2021-06-21 23:46:35', 234),
(309, 'Preatoni Tower', 'Preatoni Tower', 10, '2021-06-21 23:46:35', '2021-06-21 23:46:35', 234),
(310, 'JLT Falcon Tower', 'JLT Falcon Tower', 10, '2021-06-21 23:46:35', '2021-06-21 23:46:35', 234),
(311, 'Flamingo Tower', 'Flamingo Tower', 10, '2021-06-21 23:46:35', '2021-06-21 23:46:35', 234),
(312, 'Goldcrest Executive', 'Goldcrest Executive', 10, '2021-06-21 23:46:35', '2021-06-21 23:46:35', 234),
(313, 'HDS Tower', 'HDS Tower', 10, '2021-06-21 23:46:35', '2021-06-21 23:46:35', 234),
(314, 'Indigo Icon', 'Indigo Icon', 10, '2021-06-21 23:46:35', '2021-06-21 23:46:35', 234),
(315, 'Jumeirah Bay X1', 'Jumeirah Bay X1', 10, '2021-06-21 23:46:35', '2021-06-21 23:46:35', 234),
(316, 'Jumeirah Bay X2', 'Jumeirah Bay X2', 10, '2021-06-21 23:46:35', '2021-06-21 23:46:35', 234),
(317, 'Jumeirah Bay X3', 'Jumeirah Bay X3', 10, '2021-06-21 23:46:35', '2021-06-21 23:46:35', 234),
(318, 'Laguna Tower', 'Laguna Tower', 10, '2021-06-21 23:46:35', '2021-06-21 23:46:35', 234),
(319, 'Lake City Tower', 'Lake City Tower', 10, '2021-06-21 23:46:35', '2021-06-21 23:46:35', 234),
(320, 'Lake Point Tower', 'Lake Point Tower', 10, '2021-06-21 23:46:35', '2021-06-21 23:46:35', 234),
(321, 'Lake Shore Tower', 'Lake Shore Tower', 10, '2021-06-21 23:46:35', '2021-06-21 23:46:35', 234),
(322, 'Lake Terrace', 'Lake Terrace', 10, '2021-06-21 23:46:35', '2021-06-21 23:46:35', 234),
(323, 'Liwa Heights', 'Liwa Heights', 10, '2021-06-21 23:46:35', '2021-06-21 23:46:35', 234),
(324, 'Madina Tower', 'Madina Tower', 10, '2021-06-21 23:46:35', '2021-06-21 23:46:35', 234),
(325, 'Mag 214 Tower', 'Mag 214 Tower', 10, '2021-06-21 23:46:35', '2021-06-21 23:46:35', 234),
(326, 'One Lake Plaza', 'One Lake Plaza', 10, '2021-06-21 23:46:35', '2021-06-21 23:46:35', 234),
(327, 'Swiss Tower', 'Swiss Tower', 10, '2021-06-21 23:46:35', '2021-06-21 23:46:35', 234),
(328, 'The Palladium', 'The Palladium', 10, '2021-06-21 23:46:35', '2021-06-21 23:46:35', 234),
(329, 'Tiffany Tower', 'Tiffany Tower', 10, '2021-06-21 23:46:35', '2021-06-21 23:46:35', 234),
(330, 'V3 Tower', 'V3 Tower', 10, '2021-06-21 23:46:35', '2021-06-21 23:46:35', 234),
(331, 'Vue De Lac', 'Vue De Lac', 10, '2021-06-21 23:46:35', '2021-06-21 23:46:35', 234),
(332, 'Lakeside Residence', 'Lakeside Residence', 10, '2021-06-21 23:46:35', '2021-06-21 23:46:35', 234),
(333, 'The Dome', 'The Dome', 10, '2021-06-21 23:46:35', '2021-06-21 23:46:35', 234),
(334, 'O2 Residence', 'O2 Residence', 10, '2021-06-21 23:46:35', '2021-06-21 23:46:35', 234),
(335, 'Mazaya Business Avenue', 'Mazaya Business Avenue', 10, '2021-06-21 23:46:35', '2021-06-21 23:46:35', 234),
(336, 'Fortune Araames', 'Fortune Araames', 10, '2021-06-21 23:46:35', '2021-06-21 23:46:35', 234),
(337, 'Corporate Tower', 'Corporate Tower', 10, '2021-06-21 23:46:35', '2021-06-21 23:46:35', 234),
(338, 'Indigo Tower', 'Indigo Tower', 10, '2021-06-21 23:46:35', '2021-06-21 23:46:35', 234),
(339, 'Reef Tower', 'Reef Tower', 10, '2021-06-21 23:46:35', '2021-06-21 23:46:35', 234),
(340, 'Lake View Tower', 'Lake View Tower', 10, '2021-06-21 23:46:35', '2021-06-21 23:46:35', 234),
(341, 'HDS Business Centre', 'HDS Business Centre', 10, '2021-06-21 23:46:35', '2021-06-21 23:46:35', 234),
(342, 'Tamweel Tower', 'Tamweel Tower', 10, '2021-06-21 23:46:36', '2021-06-21 23:46:36', 234),
(343, 'Platinum Tower (Al Shafar)', 'Platinum Tower (Al Shafar)', 10, '2021-06-21 23:46:36', '2021-06-21 23:46:36', 234),
(344, 'Amesco Tower', 'Amesco Tower', 10, '2021-06-21 23:46:36', '2021-06-21 23:46:36', 234),
(345, 'Mercure Grand', 'Mercure Grand', 10, '2021-06-21 23:46:36', '2021-06-21 23:46:36', 234),
(346, 'Armada Tower', 'Armada Tower', 10, '2021-06-21 23:46:36', '2021-06-21 23:46:36', 234),
(347, 'Goldcrest Views', 'Goldcrest Views', 10, '2021-06-21 23:46:36', '2021-06-21 23:46:36', 234),
(348, 'Green Lakes', 'Green Lakes', 10, '2021-06-21 23:46:36', '2021-06-21 23:46:36', 234),
(349, 'Icon Tower', 'Icon Tower', 10, '2021-06-21 23:46:36', '2021-06-21 23:46:36', 234),
(350, 'Jumeirah Business Centre', 'Jumeirah Business Centre', 10, '2021-06-21 23:46:36', '2021-06-21 23:46:36', 234),
(351, 'New Dubai Gate', 'New Dubai Gate', 10, '2021-06-21 23:46:36', '2021-06-21 23:46:36', 234),
(352, 'Saba Tower', 'Saba Tower', 10, '2021-06-21 23:46:36', '2021-06-21 23:46:36', 234),
(353, 'Fancy Rose', 'Fancy Rose', 10, '2021-06-21 23:46:36', '2021-06-21 23:46:36', 234),
(354, 'One JLT', 'One JLT', 10, '2021-06-21 23:46:36', '2021-06-21 23:46:36', 234),
(355, 'Pullman Dubai Jumeirah Lake Towers', 'Pullman Dubai Jumeirah Lake Towers', 10, '2021-06-21 23:46:36', '2021-06-21 23:46:36', 234),
(356, 'Red Diamond', 'Red Diamond', 10, '2021-06-21 23:46:36', '2021-06-21 23:46:36', 234),
(357, 'Jumeirah Lake Apartments', 'Jumeirah Lake Apartments', 10, '2021-06-21 23:46:36', '2021-06-21 23:46:36', 234),
(358, 'Wind Towers', 'Wind Towers', 10, '2021-06-21 23:46:36', '2021-06-21 23:46:36', 234),
(359, 'Mohammed Ibrahim Tower (J2 Tower)', 'Mohammed Ibrahim Tower (J2 Tower)', 10, '2021-06-21 23:46:36', '2021-06-21 23:46:36', 234),
(360, 'Laguna Movenpick Tower', 'Laguna Movenpick Tower', 10, '2021-06-21 23:46:36', '2021-06-21 23:46:36', 234),
(361, 'Emirates Gold Building DMCC', 'Emirates Gold Building DMCC', 10, '2021-06-21 23:46:36', '2021-06-21 23:46:36', 234),
(362, 'iGo 101 Tower', 'iGo 101 Tower', 10, '2021-06-21 23:46:36', '2021-06-21 23:46:36', 234),
(363, 'MBL Residences', 'MBL Residences', 10, '2021-06-21 23:46:36', '2021-06-21 23:46:36', 234),
(364, 'Se7en City', 'Se7en City', 10, '2021-06-21 23:46:36', '2021-06-21 23:46:36', 234),
(365, 'Banyan Tree Residences', 'Banyan Tree Residences', 10, '2021-06-21 23:46:36', '2021-06-21 23:46:36', 234),
(366, 'The Residences JLT', 'The Residences JLT', 10, '2021-06-21 23:46:36', '2021-06-21 23:46:36', 234),
(367, 'Au Finja Jewellery Building', 'Au Finja Jewellery Building', 10, '2021-06-21 23:46:36', '2021-06-21 23:46:36', 234),
(368, 'The Haciendas', 'The Haciendas', 11, '2021-06-21 23:49:57', '2021-06-21 23:49:57', 234),
(369, 'The Ponderosa', 'The Ponderosa', 11, '2021-06-21 23:49:57', '2021-06-21 23:49:57', 234),
(370, 'The Aldea', 'The Aldea', 11, '2021-06-21 23:49:57', '2021-06-21 23:49:57', 234),
(371, 'The Centro', 'The Centro', 11, '2021-06-21 23:49:57', '2021-06-21 23:49:57', 234),
(372, 'Mallorca', 'Mallorca', 11, '2021-06-21 23:49:57', '2021-06-21 23:49:57', 234),
(373, 'Cordoba', 'Cordoba', 11, '2021-06-21 23:49:57', '2021-06-21 23:49:57', 234),
(374, 'Granada', 'Granada', 11, '2021-06-21 23:49:57', '2021-06-21 23:49:57', 234),
(375, 'Valencia', 'Valencia', 11, '2021-06-21 23:49:57', '2021-06-21 23:49:57', 234),
(376, 'Marbella', 'Marbella', 11, '2021-06-21 23:49:57', '2021-06-21 23:49:57', 234),
(377, 'Mazaya Villas', 'Mazaya Villas', 11, '2021-06-21 23:49:57', '2021-06-21 23:49:57', 234),
(378, 'Movenpick Dubai Pearl', 'Movenpick Dubai Pearl', 12, '2021-06-21 23:53:21', '2021-06-21 23:53:21', 234),
(379, 'Baccarat Residences', 'Baccarat Residences', 12, '2021-06-21 23:53:21', '2021-06-21 23:53:21', 234),
(380, 'Lifestyle themed Residences', 'Lifestyle themed Residences', 12, '2021-06-21 23:53:21', '2021-06-21 23:53:21', 234),
(381, 'Sky Palaces', 'Sky Palaces', 12, '2021-06-21 23:53:21', '2021-06-21 23:53:21', 234),
(382, 'Convention And Exhibition Centre', 'Convention And Exhibition Centre', 12, '2021-06-21 23:53:21', '2021-06-21 23:53:21', 234),
(383, 'Branded Residences', 'Branded Residences', 12, '2021-06-21 23:53:21', '2021-06-21 23:53:21', 234),
(384, 'Business Centres', 'Business Centres', 12, '2021-06-21 23:53:21', '2021-06-21 23:53:21', 234),
(385, 'Les Residences De Cristal', 'Les Residences De Cristal', 12, '2021-06-21 23:53:22', '2021-06-21 23:53:22', 234),
(386, 'Bellagio Hotel', 'Bellagio Hotel', 12, '2021-06-21 23:53:22', '2021-06-21 23:53:22', 234),
(387, 'MGM Grand Hotel', 'MGM Grand Hotel', 12, '2021-06-21 23:53:22', '2021-06-21 23:53:22', 234),
(388, 'Lifestyle Hotel', 'Lifestyle Hotel', 12, '2021-06-21 23:53:22', '2021-06-21 23:53:22', 234),
(389, 'Branded Villas', 'Branded Villas', 12, '2021-06-21 23:53:22', '2021-06-21 23:53:22', 234),
(390, 'Skylofts Hotel', 'Skylofts Hotel', 12, '2021-06-21 23:53:22', '2021-06-21 23:53:22', 234),
(391, 'Onyx Residences', 'Onyx Residences', 12, '2021-06-21 23:53:22', '2021-06-21 23:53:22', 234),
(392, 'Tower Offices', 'Tower Offices', 12, '2021-06-21 23:53:22', '2021-06-21 23:53:22', 234),
(393, 'The Fashion Themed Residences', 'The Fashion Themed Residences', 12, '2021-06-21 23:53:22', '2021-06-21 23:53:22', 234),
(394, 'Wellness Themes Hotel', 'Wellness Themes Hotel', 12, '2021-06-21 23:53:22', '2021-06-21 23:53:22', 234),
(395, 'Al Mahra', 'Al Mahra', 13, '2021-06-21 23:55:28', '2021-06-21 23:55:28', 234),
(396, 'Alvorada', 'Alvorada', 13, '2021-06-21 23:55:28', '2021-06-21 23:55:28', 234),
(397, 'Al Reem', 'Al Reem', 13, '2021-06-21 23:55:28', '2021-06-21 23:55:28', 234),
(398, 'Hattan', 'Hattan', 13, '2021-06-21 23:55:28', '2021-06-21 23:55:28', 234),
(399, 'Mirador', 'Mirador', 13, '2021-06-21 23:55:28', '2021-06-21 23:55:28', 234),
(400, 'Palmera', 'Palmera', 13, '2021-06-21 23:55:28', '2021-06-21 23:55:28', 234),
(401, 'Saheel', 'Saheel', 13, '2021-06-21 23:55:28', '2021-06-21 23:55:28', 234),
(402, 'Savannah', 'Savannah', 13, '2021-06-21 23:55:28', '2021-06-21 23:55:28', 234),
(403, 'Terra Nova', 'Terra Nova', 13, '2021-06-21 23:55:28', '2021-06-21 23:55:28', 234),
(404, 'Polo Homes', 'Polo Homes', 13, '2021-06-21 23:55:28', '2021-06-21 23:55:28', 234),
(405, 'La Avenida', 'La Avenida', 13, '2021-06-21 23:55:28', '2021-06-21 23:55:28', 234),
(406, 'Golf Homes', 'Golf Homes', 13, '2021-06-21 23:55:28', '2021-06-21 23:55:28', 234),
(407, 'Mirador La Colleccion', 'Mirador La Colleccion', 13, '2021-06-21 23:55:28', '2021-06-21 23:55:28', 234),
(408, 'Aseel', 'Aseel', 13, '2021-06-21 23:55:28', '2021-06-21 23:55:28', 234),
(409, 'Alma', 'Alma', 13, '2021-06-21 23:55:28', '2021-06-21 23:55:28', 234),
(410, 'Gazelle', 'Gazelle', 13, '2021-06-21 23:55:28', '2021-06-21 23:55:28', 234),
(411, 'Mediterranean', 'Mediterranean', 14, '2021-06-21 23:57:13', '2021-06-21 23:57:13', 234),
(412, 'Mogul', 'Mogul', 14, '2021-06-21 23:57:13', '2021-06-21 23:57:13', 234),
(413, 'Zen Cluster', 'Zen Cluster', 14, '2021-06-21 23:57:13', '2021-06-21 23:57:13', 234),
(414, 'Contemporary', 'Contemporary', 14, '2021-06-21 23:57:13', '2021-06-21 23:57:13', 234),
(415, 'Cactus', 'Cactus', 14, '2021-06-21 23:57:13', '2021-06-21 23:57:13', 234),
(416, 'Mesoamerican', 'Mesoamerican', 14, '2021-06-21 23:57:13', '2021-06-21 23:57:13', 234),
(417, 'Terra Del Sol', 'Terra Del Sol', 14, '2021-06-21 23:57:13', '2021-06-21 23:57:13', 234),
(418, 'Discovery Gardens Pavilion', 'Discovery Gardens Pavilion', 14, '2021-06-21 23:57:13', '2021-06-21 23:57:13', 234),
(419, 'Dubai Lagoon', 'Dubai Lagoon', 16, '2021-06-22 00:01:04', '2021-06-22 00:01:04', 234),
(420, 'Schon Business Park', 'Schon Business Park', 16, '2021-06-22 00:01:04', '2021-06-22 00:01:04', 234),
(421, 'The Palisades', 'The Palisades', 16, '2021-06-22 00:01:04', '2021-06-22 00:01:04', 234),
(422, 'Ewan Residence', 'Ewan Residence', 16, '2021-06-22 00:01:04', '2021-06-22 00:01:04', 234),
(423, 'Dunes Village', 'Dunes Village', 16, '2021-06-22 00:01:04', '2021-06-22 00:01:04', 234),
(424, 'European Business Center', 'European Business Center', 16, '2021-06-22 00:01:04', '2021-06-22 00:01:04', 234),
(425, 'Regents Business Park', 'Regents Business Park', 16, '2021-06-22 00:01:04', '2021-06-22 00:01:04', 234),
(426, 'Royal Estate Community', 'Royal Estate Community', 16, '2021-06-22 00:01:04', '2021-06-22 00:01:04', 234),
(427, 'Dockland Business Park', 'Dockland Business Park', 16, '2021-06-22 00:01:04', '2021-06-22 00:01:04', 234),
(428, 'Abyaar Business Centre', 'Abyaar Business Centre', 16, '2021-06-22 00:01:04', '2021-06-22 00:01:04', 234),
(429, 'Centurion Residences', 'Centurion Residences', 16, '2021-06-22 00:01:04', '2021-06-22 00:01:04', 234),
(430, 'Winterberry Residence', 'Winterberry Residence', 16, '2021-06-22 00:01:04', '2021-06-22 00:01:04', 234),
(431, 'Falcon House', 'Falcon House', 16, '2021-06-22 00:01:04', '2021-06-22 00:01:04', 234),
(432, 'Lily Residence', 'Lily Residence', 16, '2021-06-22 00:01:04', '2021-06-22 00:01:04', 234),
(433, 'Grand Stores Warehouses', 'Grand Stores Warehouses', 16, '2021-06-22 00:01:04', '2021-06-22 00:01:04', 234),
(434, 'Mayfair Business Centre', 'Mayfair Business Centre', 16, '2021-06-22 00:01:04', '2021-06-22 00:01:04', 234),
(435, 'Arenco Offices', 'Arenco Offices', 16, '2021-06-22 00:01:04', '2021-06-22 00:01:04', 234),
(436, 'Themaar 1', 'Themaar 1', 16, '2021-06-22 00:01:04', '2021-06-22 00:01:04', 234),
(437, 'Al Narah Apartments', 'Al Narah Apartments', 16, '2021-06-22 00:01:04', '2021-06-22 00:01:04', 234),
(438, 'Union Residence 1', 'Union Residence 1', 16, '2021-06-22 00:01:04', '2021-06-22 00:01:04', 234),
(439, 'Bayan Business Centre', 'Bayan Business Centre', 16, '2021-06-22 00:01:04', '2021-06-22 00:01:04', 234),
(440, 'CEO Building', 'CEO Building', 16, '2021-06-22 00:01:04', '2021-06-22 00:01:04', 234),
(441, 'Lotus Residence', 'Lotus Residence', 16, '2021-06-22 00:01:04', '2021-06-22 00:01:04', 234),
(442, 'Ava Residences', 'Ava Residences', 16, '2021-06-22 00:01:04', '2021-06-22 00:01:04', 234),
(443, 'FNC Complex Warehouse 1', 'FNC Complex Warehouse 1', 16, '2021-06-22 00:01:04', '2021-06-22 00:01:04', 234),
(444, 'Al Manama Building', 'Al Manama Building', 16, '2021-06-22 00:01:04', '2021-06-22 00:01:04', 234),
(445, 'UniEstate Mansion', 'UniEstate Mansion', 16, '2021-06-22 00:01:04', '2021-06-22 00:01:04', 234),
(446, 'SOL Star', 'SOL Star', 16, '2021-06-22 00:01:04', '2021-06-22 00:01:04', 234),
(447, 'Phase 2', 'Phase 2', 16, '2021-06-22 00:01:04', '2021-06-22 00:01:04', 234),
(448, 'Phase 1', 'Phase 1', 16, '2021-06-22 00:01:04', '2021-06-22 00:01:04', 234),
(449, 'Phase 3', 'Phase 3', 16, '2021-06-22 00:01:04', '2021-06-22 00:01:04', 234),
(450, 'Bestana Office Building', 'Bestana Office Building', 16, '2021-06-22 00:01:04', '2021-06-22 00:01:04', 234),
(451, 'Golden Sands', 'Golden Sands', 16, '2021-06-22 00:01:04', '2021-06-22 00:01:04', 234),
(452, 'Talal Residence', 'Talal Residence', 16, '2021-06-22 00:01:04', '2021-06-22 00:01:04', 234),
(453, 'RDK 1190 Building', 'RDK 1190 Building', 16, '2021-06-22 00:01:04', '2021-06-22 00:01:04', 234),
(454, 'RDK 1207 Building', 'RDK 1207 Building', 16, '2021-06-22 00:01:04', '2021-06-22 00:01:04', 234),
(455, 'The Edge', 'The Edge', 16, '2021-06-22 00:01:04', '2021-06-22 00:01:04', 234),
(456, 'Al Sondos Apartements', 'Al Sondos Apartements', 16, '2021-06-22 00:01:04', '2021-06-22 00:01:04', 234),
(457, 'The Village', 'The Village', 16, '2021-06-22 00:01:04', '2021-06-22 00:01:04', 234),
(458, 'Abar Hotel Apartments', 'Abar Hotel Apartments', 16, '2021-06-22 00:01:04', '2021-06-22 00:01:04', 234),
(459, 'Lake Apartments', 'Lake Apartments', 18, '2021-06-22 00:03:40', '2021-06-22 00:03:40', 234),
(460, 'Green Community West', 'Green Community West', 18, '2021-06-22 00:03:40', '2021-06-22 00:03:40', 234),
(461, 'Green Community East', 'Green Community East', 18, '2021-06-22 00:03:40', '2021-06-22 00:03:40', 234),
(462, 'Garden East Apartments', 'Garden East Apartments', 18, '2021-06-22 00:03:40', '2021-06-22 00:03:40', 234),
(463, 'Garden West Apartments', 'Garden West Apartments', 18, '2021-06-22 00:03:40', '2021-06-22 00:03:40', 234),
(478, 'The Springs 1', 'The Springs 1', 20, '2021-06-22 00:09:02', '2021-06-22 00:09:02', 234),
(479, 'The Springs 2', 'The Springs 2', 20, '2021-06-22 00:09:02', '2021-06-22 00:09:02', 234),
(480, 'The Springs 3', 'The Springs 3', 20, '2021-06-22 00:09:02', '2021-06-22 00:09:02', 234),
(481, 'The Springs 4', 'The Springs 4', 20, '2021-06-22 00:09:02', '2021-06-22 00:09:02', 234),
(482, 'The Springs 5', 'The Springs 5', 20, '2021-06-22 00:09:02', '2021-06-22 00:09:02', 234),
(483, 'The Springs 6', 'The Springs 6', 20, '2021-06-22 00:09:02', '2021-06-22 00:09:02', 234),
(484, 'The Springs 7', 'The Springs 7', 20, '2021-06-22 00:09:02', '2021-06-22 00:09:02', 234),
(485, 'The Springs 8', 'The Springs 8', 20, '2021-06-22 00:09:02', '2021-06-22 00:09:02', 234),
(486, 'The Springs 9', 'The Springs 9', 20, '2021-06-22 00:09:02', '2021-06-22 00:09:02', 234),
(487, 'The Springs 10', 'The Springs 10', 20, '2021-06-22 00:09:02', '2021-06-22 00:09:02', 234),
(488, 'The Springs 11', 'The Springs 11', 20, '2021-06-22 00:09:02', '2021-06-22 00:09:02', 234),
(489, 'The Springs 12', 'The Springs 12', 20, '2021-06-22 00:09:02', '2021-06-22 00:09:02', 234),
(490, 'The Springs 14', 'The Springs 14', 20, '2021-06-22 00:09:02', '2021-06-22 00:09:02', 234),
(491, 'The Springs 15', 'The Springs 15', 20, '2021-06-22 00:09:02', '2021-06-22 00:09:02', 234),
(492, 'The Onyx', 'The Onyx', 22, '2021-06-22 00:12:11', '2021-06-22 00:12:11', 234),
(493, 'Nuran Hotel Apartments', 'Nuran Hotel Apartments', 22, '2021-06-22 00:12:11', '2021-06-22 00:12:11', 234),
(494, 'SKAI Residency', 'SKAI Residency', 22, '2021-06-22 00:12:11', '2021-06-22 00:12:11', 234),
(495, 'Al Alka', 'Al Alka', 22, '2021-06-22 00:12:11', '2021-06-22 00:12:11', 234),
(496, 'Al Arta', 'Al Arta', 22, '2021-06-22 00:12:11', '2021-06-22 00:12:11', 234),
(497, 'Al Dhafrah', 'Al Dhafrah', 22, '2021-06-22 00:12:11', '2021-06-22 00:12:11', 234),
(498, 'Al Ghaf', 'Al Ghaf', 22, '2021-06-22 00:12:11', '2021-06-22 00:12:11', 234),
(499, 'Al Jaz', 'Al Jaz', 22, '2021-06-22 00:12:11', '2021-06-22 00:12:11', 234),
(500, 'Al Nakheel', 'Al Nakheel', 22, '2021-06-22 00:12:11', '2021-06-22 00:12:11', 234),
(501, 'Al Samar', 'Al Samar', 22, '2021-06-22 00:12:11', '2021-06-22 00:12:11', 234),
(502, 'Al Sidir', 'Al Sidir', 22, '2021-06-22 00:12:11', '2021-06-22 00:12:11', 234),
(503, 'Al Thayyal', 'Al Thayyal', 22, '2021-06-22 00:12:11', '2021-06-22 00:12:11', 234),
(504, 'Al Ghozlan', 'Al Ghozlan', 22, '2021-06-22 00:12:11', '2021-06-22 00:12:11', 234),
(505, 'Arno', 'Arno', 23, '2021-06-22 00:14:50', '2021-06-22 00:14:50', 234),
(506, 'Mosela', 'Mosela', 23, '2021-06-22 00:14:50', '2021-06-22 00:14:50', 234),
(507, 'Travo', 'Travo', 23, '2021-06-22 00:14:50', '2021-06-22 00:14:50', 234),
(508, 'Turia', 'Turia', 23, '2021-06-22 00:14:50', '2021-06-22 00:14:50', 234),
(509, 'Una', 'Una', 23, '2021-06-22 00:14:50', '2021-06-22 00:14:50', 234),
(510, 'Tanaro', 'Tanaro', 23, '2021-06-22 00:14:50', '2021-06-22 00:14:50', 234),
(511, 'Panorama', 'Panorama', 23, '2021-06-22 00:14:50', '2021-06-22 00:14:50', 234),
(512, 'The Views 1', 'The Views 1', 23, '2021-06-22 00:14:50', '2021-06-22 00:14:50', 234),
(513, 'The Views 2', 'The Views 2', 23, '2021-06-22 00:14:50', '2021-06-22 00:14:50', 234),
(514, 'Canal Villas', 'Canal Villas', 23, '2021-06-22 00:14:50', '2021-06-22 00:14:50', 234),
(515, 'Golf Villas', 'Golf Villas', 23, '2021-06-22 00:14:50', '2021-06-22 00:14:50', 234),
(516, 'Golf Tower', 'Golf Tower', 23, '2021-06-22 00:14:50', '2021-06-22 00:14:50', 234),
(517, 'The Links', 'The Links', 23, '2021-06-22 00:14:50', '2021-06-22 00:14:50', 234),
(518, 'The Fairways', 'The Fairways', 23, '2021-06-22 00:14:50', '2021-06-22 00:14:50', 234),
(519, 'Dutco Greens Residential', 'Dutco Greens Residential', 23, '2021-06-22 00:14:50', '2021-06-22 00:14:50', 234),
(520, 'The Meadows 1', 'The Meadows 1', 25, '2021-06-22 00:17:27', '2021-06-22 00:17:27', 234),
(521, 'The Meadows 2', 'The Meadows 2', 25, '2021-06-22 00:17:27', '2021-06-22 00:17:27', 234),
(522, 'The Meadows 3', 'The Meadows 3', 25, '2021-06-22 00:17:27', '2021-06-22 00:17:27', 234),
(523, 'The Meadows 4', 'The Meadows 4', 25, '2021-06-22 00:17:27', '2021-06-22 00:17:27', 234),
(524, 'The Meadows 5', 'The Meadows 5', 25, '2021-06-22 00:17:27', '2021-06-22 00:17:27', 234),
(525, 'The Meadows 6', 'The Meadows 6', 25, '2021-06-22 00:17:27', '2021-06-22 00:17:27', 234),
(526, 'The Meadows 7', 'The Meadows 7', 25, '2021-06-22 00:17:27', '2021-06-22 00:17:27', 234),
(527, 'The Meadows 8', 'The Meadows 8', 25, '2021-06-22 00:17:27', '2021-06-22 00:17:27', 234),
(528, 'The Meadows 9', 'The Meadows 9', 25, '2021-06-22 00:17:27', '2021-06-22 00:17:27', 234),
(529, 'The Elevations', 'The Elevations', 26, '2021-06-22 00:20:06', '2021-06-22 00:20:06', 234),
(530, 'Eagle Heights', 'Eagle Heights', 26, '2021-06-22 00:20:06', '2021-06-22 00:20:06', 234),
(531, 'Bermuda Views', 'Bermuda Views', 26, '2021-06-22 00:20:06', '2021-06-22 00:20:06', 234),
(532, 'Red Residence', 'Red Residence', 26, '2021-06-22 00:20:06', '2021-06-22 00:20:06', 234),
(533, 'Golf Tower', 'Golf Tower', 26, '2021-06-22 00:20:06', '2021-06-22 00:20:06', 234),
(534, 'Tennis Tower', 'Tennis Tower', 26, '2021-06-22 00:20:06', '2021-06-22 00:20:06', 234),
(535, 'Ice Hockey Tower', 'Ice Hockey Tower', 26, '2021-06-22 00:20:06', '2021-06-22 00:20:06', 234),
(536, 'Hub Canal 1 Tower', 'Hub Canal 1 Tower', 26, '2021-06-22 00:20:06', '2021-06-22 00:20:06', 234),
(537, 'Hub Canal 2 Tower', 'Hub Canal 2 Tower', 26, '2021-06-22 00:20:06', '2021-06-22 00:20:06', 234),
(538, 'Cricket Tower', 'Cricket Tower', 26, '2021-06-22 00:20:06', '2021-06-22 00:20:06', 234),
(539, 'Tamerat Tower', 'Tamerat Tower', 26, '2021-06-22 00:20:06', '2021-06-22 00:20:06', 234),
(540, 'Eden Gardens', 'Eden Gardens', 26, '2021-06-22 00:20:06', '2021-06-22 00:20:06', 234),
(541, 'Olympia Suites', 'Olympia Suites', 26, '2021-06-22 00:20:06', '2021-06-22 00:20:06', 234),
(542, 'Oasis Tower 1', 'Oasis Tower 1', 26, '2021-06-22 00:20:06', '2021-06-22 00:20:06', 234),
(543, 'Oasis Tower 2', 'Oasis Tower 2', 26, '2021-06-22 00:20:06', '2021-06-22 00:20:06', 234),
(544, 'Global Golf Residence', 'Global Golf Residence', 26, '2021-06-22 00:20:06', '2021-06-22 00:20:06', 234);
INSERT INTO `sub_communities` (`id`, `name_en`, `name_ar`, `community_id`, `created_at`, `updated_at`, `country_id`) VALUES
(545, 'Kensington Royale', 'Kensington Royale', 26, '2021-06-22 00:20:06', '2021-06-22 00:20:06', 234),
(546, 'Manchester Sports Tower', 'Manchester Sports Tower', 26, '2021-06-22 00:20:06', '2021-06-22 00:20:06', 234),
(547, 'Axon Tower', 'Axon Tower', 26, '2021-06-22 00:20:06', '2021-06-22 00:20:06', 234),
(548, 'The Diamond', 'The Diamond', 26, '2021-06-22 00:20:06', '2021-06-22 00:20:06', 234),
(549, 'Hamza Tower', 'Hamza Tower', 26, '2021-06-22 00:20:06', '2021-06-22 00:20:06', 234),
(550, 'Profile Residence', 'Profile Residence', 26, '2021-06-22 00:20:06', '2021-06-22 00:20:06', 234),
(551, 'Stadium Point', 'Stadium Point', 26, '2021-06-22 00:20:06', '2021-06-22 00:20:06', 234),
(552, 'Victory Heights', 'Victory Heights', 26, '2021-06-22 00:20:06', '2021-06-22 00:20:06', 234),
(553, 'Sport One Business Tower', 'Sport One Business Tower', 26, '2021-06-22 00:20:06', '2021-06-22 00:20:06', 234),
(554, 'The Bridge', 'The Bridge', 26, '2021-06-22 00:20:06', '2021-06-22 00:20:06', 234),
(555, 'Olympic Park', 'Olympic Park', 26, '2021-06-22 00:20:06', '2021-06-22 00:20:06', 234),
(556, 'Links View', 'Links View', 26, '2021-06-22 00:20:06', '2021-06-22 00:20:06', 234),
(557, 'Golf View', 'Golf View', 26, '2021-06-22 00:20:06', '2021-06-22 00:20:06', 234),
(558, 'Giovanni Boutique Suites', 'Giovanni Boutique Suites', 26, '2021-06-22 00:20:06', '2021-06-22 00:20:06', 234),
(559, 'Gallery Villas', 'Gallery Villas', 26, '2021-06-22 00:20:06', '2021-06-22 00:20:06', 234),
(560, 'Rufi Golf', 'Rufi Golf', 26, '2021-06-22 00:20:06', '2021-06-22 00:20:06', 234),
(561, 'Frankfurt Sports Tower', 'Frankfurt Sports Tower', 26, '2021-06-22 00:20:06', '2021-06-22 00:20:06', 234),
(562, 'Sama Worldcup Tower', 'Sama Worldcup Tower', 26, '2021-06-22 00:20:06', '2021-06-22 00:20:06', 234),
(563, 'Coral International Hotel Apartment', 'Coral International Hotel Apartment', 26, '2021-06-22 00:20:06', '2021-06-22 00:20:06', 234),
(564, 'The Matrix', 'The Matrix', 26, '2021-06-22 00:20:06', '2021-06-22 00:20:06', 234),
(565, 'Spirit Tower', 'Spirit Tower', 26, '2021-06-22 00:20:06', '2021-06-22 00:20:06', 234),
(566, 'Chess Tower', 'Chess Tower', 26, '2021-06-22 00:20:06', '2021-06-22 00:20:06', 234),
(567, 'Arena Apartments', 'Arena Apartments', 26, '2021-06-22 00:20:06', '2021-06-22 00:20:06', 234),
(568, 'Wimbledon Tower', 'Wimbledon Tower', 26, '2021-06-22 00:20:06', '2021-06-22 00:20:06', 234),
(569, 'The Medalist', 'The Medalist', 26, '2021-06-22 00:20:06', '2021-06-22 00:20:06', 234),
(570, 'Champions Tower', 'Champions Tower', 26, '2021-06-22 00:20:06', '2021-06-22 00:20:06', 234),
(571, 'Elite Sports Residence', 'Elite Sports Residence', 26, '2021-06-22 00:20:06', '2021-06-22 00:20:06', 234),
(572, 'German Sports Tower', 'German Sports Tower', 26, '2021-06-22 00:20:06', '2021-06-22 00:20:06', 234),
(573, 'Royal Residence', 'Royal Residence', 26, '2021-06-22 00:20:06', '2021-06-22 00:20:06', 234),
(574, 'Symphony Tower', 'Symphony Tower', 26, '2021-06-22 00:20:06', '2021-06-22 00:20:06', 234),
(575, 'Prime Villas', 'Prime Villas', 26, '2021-06-22 00:20:06', '2021-06-22 00:20:06', 234),
(576, 'Zenith Towers', 'Zenith Towers', 26, '2021-06-22 00:20:06', '2021-06-22 00:20:06', 234),
(577, 'Limelight Twin Towers', 'Limelight Twin Towers', 26, '2021-06-22 00:20:06', '2021-06-22 00:20:06', 234),
(578, 'UniEstate Sports Tower', 'UniEstate Sports Tower', 26, '2021-06-22 00:20:06', '2021-06-22 00:20:06', 234),
(579, 'Bloomingdale', 'Bloomingdale', 26, '2021-06-22 00:20:06', '2021-06-22 00:20:06', 234),
(580, 'Hera Tower', 'Hera Tower', 26, '2021-06-22 00:20:06', '2021-06-22 00:20:06', 234),
(581, 'Stadium Park Apartments', 'Stadium Park Apartments', 26, '2021-06-22 00:20:06', '2021-06-22 00:20:06', 234),
(582, 'Hub Golf View Apartments', 'Hub Golf View Apartments', 26, '2021-06-22 00:20:06', '2021-06-22 00:20:06', 234),
(583, 'Resort Hub Garden Apartments', 'Resort Hub Garden Apartments', 26, '2021-06-22 00:20:06', '2021-06-22 00:20:06', 234),
(584, 'Canal Residence West', 'Canal Residence West', 26, '2021-06-22 00:20:06', '2021-06-22 00:20:06', 234),
(585, 'Grand Horizon', 'Grand Horizon', 26, '2021-06-22 00:20:06', '2021-06-22 00:20:06', 234),
(586, 'Arena Mall', 'Arena Mall', 26, '2021-06-22 00:20:06', '2021-06-22 00:20:06', 234),
(587, 'Treppan Hotel and Suites by Fakhruddin', 'Treppan Hotel and Suites by Fakhruddin', 26, '2021-06-22 00:20:06', '2021-06-22 00:20:06', 234),
(588, 'Azizi Grand', 'Azizi Grand', 26, '2021-06-22 00:20:06', '2021-06-22 00:20:06', 234),
(589, 'JS Tower', 'JS Tower', 26, '2021-06-22 00:20:06', '2021-06-22 00:20:06', 234),
(590, 'V2', 'V2', 26, '2021-06-22 00:20:06', '2021-06-22 00:20:06', 234),
(591, 'Najma Tower A', 'Najma Tower A', 26, '2021-06-22 00:20:07', '2021-06-22 00:20:07', 234),
(592, 'Najma Tower B', 'Najma Tower B', 26, '2021-06-22 00:20:07', '2021-06-22 00:20:07', 234),
(593, 'China Cluster', 'China Cluster', 29, '2021-06-22 00:23:35', '2021-06-22 00:23:35', 234),
(594, 'England Cluster', 'England Cluster', 29, '2021-06-22 00:23:35', '2021-06-22 00:23:35', 234),
(595, 'France Cluster', 'France Cluster', 29, '2021-06-22 00:23:35', '2021-06-22 00:23:35', 234),
(596, 'Greece Cluster', 'Greece Cluster', 29, '2021-06-22 00:23:35', '2021-06-22 00:23:35', 234),
(597, 'Italy Cluster', 'Italy Cluster', 29, '2021-06-22 00:23:35', '2021-06-22 00:23:35', 234),
(598, 'Morocco Cluster', 'Morocco Cluster', 29, '2021-06-22 00:23:35', '2021-06-22 00:23:35', 234),
(599, 'Persia Cluster', 'Persia Cluster', 29, '2021-06-22 00:23:35', '2021-06-22 00:23:35', 234),
(600, 'Russia Cluster', 'Russia Cluster', 29, '2021-06-22 00:23:35', '2021-06-22 00:23:35', 234),
(601, 'Spain Cluster', 'Spain Cluster', 29, '2021-06-22 00:23:35', '2021-06-22 00:23:35', 234),
(602, 'Lake District', 'Lake District', 29, '2021-06-22 00:23:35', '2021-06-22 00:23:35', 234),
(603, 'Forbidden City', 'Forbidden City', 29, '2021-06-22 00:23:35', '2021-06-22 00:23:35', 234),
(604, 'The Residences International City', 'The Residences International City', 29, '2021-06-22 00:23:35', '2021-06-22 00:23:35', 234),
(605, 'Manchester Crescent', 'Manchester Crescent', 29, '2021-06-22 00:23:35', '2021-06-22 00:23:35', 234),
(606, 'Persia N 11', 'Persia N 11', 29, '2021-06-22 00:23:35', '2021-06-22 00:23:35', 234),
(607, 'Kaya Residence', 'Kaya Residence', 29, '2021-06-22 00:23:35', '2021-06-22 00:23:35', 234),
(608, 'Tulip Residence', 'Tulip Residence', 29, '2021-06-22 00:23:35', '2021-06-22 00:23:35', 234),
(609, 'Phase 3', 'Phase 3', 29, '2021-06-22 00:23:35', '2021-06-22 00:23:35', 234),
(610, 'Emirates Cluster', 'Emirates Cluster', 29, '2021-06-22 00:23:35', '2021-06-22 00:23:35', 234),
(611, 'Textile City', 'Textile City', 29, '2021-06-22 00:23:35', '2021-06-22 00:23:35', 234),
(612, 'Indigo Optima', 'Indigo Optima', 29, '2021-06-22 00:23:35', '2021-06-22 00:23:35', 234),
(613, 'Trafalgar Central', 'Trafalgar Central', 29, '2021-06-22 00:23:35', '2021-06-22 00:23:35', 234),
(614, 'Warsan Village', 'Warsan Village', 29, '2021-06-22 00:23:35', '2021-06-22 00:23:35', 234),
(615, 'Phase 2', 'Phase 2', 29, '2021-06-22 00:23:35', '2021-06-22 00:23:35', 234),
(616, 'CBD 6 Best Homes', 'CBD 6 Best Homes', 29, '2021-06-22 00:23:35', '2021-06-22 00:23:35', 234),
(617, 'Indigo Spectrum 1', 'Indigo Spectrum 1', 29, '2021-06-22 00:23:35', '2021-06-22 00:23:35', 234),
(618, 'Indigo Spectrum 2', 'Indigo Spectrum 2', 29, '2021-06-22 00:23:35', '2021-06-22 00:23:35', 234),
(619, 'Central Business District', 'Central Business District', 29, '2021-06-22 00:23:35', '2021-06-22 00:23:35', 234),
(620, 'Dragon View Building', 'Dragon View Building', 29, '2021-06-22 00:23:35', '2021-06-22 00:23:35', 234),
(621, 'lawnz by Danube', 'lawnz by Danube', 29, '2021-06-22 00:23:35', '2021-06-22 00:23:35', 234),
(622, 'Olivz Residence', 'Olivz Residence', 29, '2021-06-22 00:23:35', '2021-06-22 00:23:35', 234),
(623, '77 B Building', '77 B Building', 29, '2021-06-22 00:23:36', '2021-06-22 00:23:36', 234),
(624, 'Golden Homes 2', 'Golden Homes 2', 29, '2021-06-22 00:23:36', '2021-06-22 00:23:36', 234),
(625, 'Dragon Mart', 'Dragon Mart', 29, '2021-06-22 00:23:36', '2021-06-22 00:23:36', 234),
(626, 'Dragon Mart 2', 'Dragon Mart 2', 29, '2021-06-22 00:23:36', '2021-06-22 00:23:36', 234),
(627, 'X-15', 'X-15', 29, '2021-06-22 00:23:36', '2021-06-22 00:23:36', 234),
(628, '21st Century Tower', '21st Century Tower', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(629, 'Al Attar Tower', 'Al Attar Tower', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(630, 'Al Saqr Business Tower', 'Al Saqr Business Tower', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(631, 'Grand Mercure Hotel (Al Yaquob Tower)', 'Grand Mercure Hotel (Al Yaquob Tower)', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(632, 'Capricon Tower', 'Capricon Tower', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(633, 'Oasis Tower', 'Oasis Tower', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(634, 'The Tower', 'The Tower', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(635, 'Duja Tower', 'Duja Tower', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(636, 'Ghaya Residence', 'Ghaya Residence', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(637, 'Union Tower', 'Union Tower', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(638, 'Capital Tower', 'Capital Tower', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(639, 'Al Tayer Tower', 'Al Tayer Tower', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(640, 'Tiara United Towers', 'Tiara United Towers', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(641, 'Lam Tara Twin Towers', 'Lam Tara Twin Towers', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(642, 'Escan Tower', 'Escan Tower', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(643, 'API World Tower', 'API World Tower', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(644, 'Indigo Metro', 'Indigo Metro', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(645, 'Sidra Tower', 'Sidra Tower', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(646, 'Celebrities Tower', 'Celebrities Tower', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(647, 'Mazaya Centre', 'Mazaya Centre', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(648, 'City Towers', 'City Towers', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(649, 'Emaar Business Park', 'Emaar Business Park', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(650, 'Park Place Tower', 'Park Place Tower', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(651, 'Al Safa Tower', 'Al Safa Tower', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(652, 'Emarat Atrium Building', 'Emarat Atrium Building', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(653, 'Nassima Tower', 'Nassima Tower', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(654, 'Saeed Towers', 'Saeed Towers', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(655, 'Sama Tower', 'Sama Tower', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(656, 'Al Safa Building', 'Al Safa Building', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(657, 'Blue Tower', 'Blue Tower', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(658, 'White Swan Tower', 'White Swan Tower', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(659, 'Al Kawakeb', 'Al Kawakeb', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(660, 'Crown Plaza', 'Crown Plaza', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(661, 'Zabeel Tower', 'Zabeel Tower', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(662, 'Al Wasl Tower', 'Al Wasl Tower', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(663, 'The Curve', 'The Curve', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(664, 'Fairmont Dubai', 'Fairmont Dubai', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(665, 'Number One Tower Suites', 'Number One Tower Suites', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(666, 'Commercial Tower M', 'Commercial Tower M', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(667, 'Two Seasons Hotel and Apartments', 'Two Seasons Hotel and Apartments', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(668, 'Oasis Centre', 'Oasis Centre', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(669, 'The Millennium Plaza Hotel Dubai', 'The Millennium Plaza Hotel Dubai', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(670, 'Aspin Tower', 'Aspin Tower', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(671, 'Single Business Tower', 'Single Business Tower', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(672, 'Mardoof Building', 'Mardoof Building', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(673, 'Al Shafar Investment Building', 'Al Shafar Investment Building', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(674, 'Holiday Centre Commercial Tower', 'Holiday Centre Commercial Tower', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(675, 'Emirates Towers', 'Emirates Towers', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(676, 'Al Meraikhi Tower', 'Al Meraikhi Tower', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(677, 'Burj Al Salam Tower', 'Burj Al Salam Tower', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(678, 'Latifa Tower', 'Latifa Tower', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(679, 'Maze Tower', 'Maze Tower', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(680, 'Dubai National Insurance Building', 'Dubai National Insurance Building', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(681, 'Sheraton Grand Hotel', 'Sheraton Grand Hotel', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(682, 'Conrad Commercial Tower', 'Conrad Commercial Tower', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(683, 'Dusit Thani Hotel', 'Dusit Thani Hotel', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(684, 'Samaya Building', 'Samaya Building', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(685, 'Al Hareb Building', 'Al Hareb Building', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(686, 'Conrad Hotel', 'Conrad Hotel', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(687, 'Ascott Park Place Dubai', 'Ascott Park Place Dubai', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(688, 'White Crown Tower', 'White Crown Tower', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(689, 'Skyline Residence', 'Skyline Residence', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(690, 'Crowne Plaza Commercial Tower', 'Crowne Plaza Commercial Tower', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(691, 'Al Durrah Tower', 'Al Durrah Tower', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(692, 'Al Manal Tower', 'Al Manal Tower', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(693, 'Up Tower', 'Up Tower', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(694, 'Al Moosa tower 1', 'Al Moosa tower 1', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(695, 'Al Moosa tower 2', 'Al Moosa tower 2', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(696, 'Sahara Tower', 'Sahara Tower', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(697, 'Al Ghadeer Tower', 'Al Ghadeer Tower', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(698, 'Al Rostamani Towers', 'Al Rostamani Towers', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(699, 'Four Points By Sheraton', 'Four Points By Sheraton', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(700, 'Sky Tower', 'Sky Tower', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(701, 'Towers Rotana', 'Towers Rotana', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(702, 'Al Hawai Tower', 'Al Hawai Tower', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(703, 'Sheikh Essa Tower', 'Sheikh Essa Tower', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(704, 'Rolex Tower', 'Rolex Tower', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(705, 'Al Wafa Tower', 'Al Wafa Tower', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(706, 'Aspin commercial Tower', 'Aspin commercial Tower', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(707, 'Emirates Grand Hotel', 'Emirates Grand Hotel', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(708, 'Warwick International Hotel', 'Warwick International Hotel', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(709, 'Shangri-La Hotel', 'Shangri-La Hotel', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(710, 'Al Kharbash Tower', 'Al Kharbash Tower', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(711, 'Khalifa Juma Al Nabooda', 'Khalifa Juma Al Nabooda', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(712, 'Sofitel Downtown', 'Sofitel Downtown', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(713, 'Al Wadi', 'Al Wadi', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(714, 'Sheikh Ahmed Bin Joumaa', 'Sheikh Ahmed Bin Joumaa', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(715, 'Millennium Tower', 'Millennium Tower', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(716, 'Villa Rotana Hotel Apartments', 'Villa Rotana Hotel Apartments', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(717, 'Al Furdan Building', 'Al Furdan Building', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(718, 'Addiyar Building', 'Addiyar Building', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(719, 'Lufthansa Building', 'Lufthansa Building', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(720, 'Al Goze Complex', 'Al Goze Complex', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(721, 'Dnata Building', 'Dnata Building', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(722, 'Grosvenor House Commercial Tower', 'Grosvenor House Commercial Tower', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(723, 'Sheikh Rashid Building', 'Sheikh Rashid Building', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(724, 'Sheikh Majid Building', 'Sheikh Majid Building', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(725, 'City Premiere Hotel Apartments', 'City Premiere Hotel Apartments', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(726, 'The H Hotel And Office Tower', 'The H Hotel And Office Tower', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(727, 'Emirates Holidays Building', 'Emirates Holidays Building', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(728, 'Pepsi Building', 'Pepsi Building', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(729, 'Indigo Central 2', 'Indigo Central 2', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(730, 'The Carlton Downtown Hotel', 'The Carlton Downtown Hotel', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(731, 'Lamborghini Building', 'Lamborghini Building', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(732, 'Indigo Central 7', 'Indigo Central 7', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(733, 'Indigo Central 6', 'Indigo Central 6', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(734, 'Al Salam Hotel Suites', 'Al Salam Hotel Suites', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(735, 'DXB Tower', 'DXB Tower', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(736, 'Al Manara Building', 'Al Manara Building', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(737, 'Rawabeh Building', 'Rawabeh Building', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(738, 'Ibri House', 'Ibri House', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(739, 'Al Wasl Building', 'Al Wasl Building', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(740, 'Gevora Hotel', 'Gevora Hotel', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(741, 'Emirates Grand Hotel Apartments', 'Emirates Grand Hotel Apartments', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(742, 'The Sunrise Building', 'The Sunrise Building', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(743, 'Ruby II Building', 'Ruby II Building', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(744, 'Eiffel 1 Building', 'Eiffel 1 Building', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(745, 'Eiffel 2 Building', 'Eiffel 2 Building', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(746, 'Matloob Building', 'Matloob Building', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(747, 'JAM Tower', 'JAM Tower', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(748, 'Infinity Building', 'Infinity Building', 31, '2021-06-22 23:05:59', '2021-06-22 23:05:59', 234),
(749, 'Indigo Central 5', 'Indigo Central 5', 31, '2021-06-22 23:06:00', '2021-06-22 23:06:00', 234),
(750, 'Leva Hotel Mazaya Centre', 'Leva Hotel Mazaya Centre', 31, '2021-06-22 23:06:00', '2021-06-22 23:06:00', 234),
(751, 'A A Tower', 'A A Tower', 31, '2021-06-22 23:06:00', '2021-06-22 23:06:00', 234),
(752, 'API Trio Towers', 'API Trio Towers', 31, '2021-06-22 23:06:00', '2021-06-22 23:06:00', 234),
(753, 'Building 2020', 'Building 2020', 31, '2021-06-22 23:06:00', '2021-06-22 23:06:00', 234),
(754, 'Jumeira Tower', 'Jumeira Tower', 31, '2021-06-22 23:06:00', '2021-06-22 23:06:00', 234),
(755, 'Al Maidoor Building', 'Al Maidoor Building', 31, '2021-06-22 23:06:00', '2021-06-22 23:06:00', 234),
(756, 'Takaful Emarat Building', 'Takaful Emarat Building', 31, '2021-06-22 23:06:00', '2021-06-22 23:06:00', 234),
(757, 'Display Centre', 'Display Centre', 31, '2021-06-22 23:06:00', '2021-06-22 23:06:00', 234),
(758, 'Cambridge Business Centre', 'Cambridge Business Centre', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(759, 'Oasis High Park', 'Oasis High Park', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(760, 'Palace Towers', 'Palace Towers', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(761, 'Park Avenue', 'Park Avenue', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(762, 'Silicon Arch', 'Silicon Arch', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(763, 'Arabian Heights', 'Arabian Heights', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(764, 'Smart Towers', 'Smart Towers', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(765, 'The Apricot', 'The Apricot', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(766, 'The Dunes', 'The Dunes', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(767, 'University View', 'University View', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(768, 'La vista Residence', 'La vista Residence', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(769, 'IT Plaza', 'IT Plaza', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(770, 'Silicon Gates', 'Silicon Gates', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(771, 'Le Solarium', 'Le Solarium', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(772, 'Park Terrace', 'Park Terrace', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(773, 'Cordoba Palace', 'Cordoba Palace', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(774, 'German Technology Tower', 'German Technology Tower', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(775, 'Imperial', 'Imperial', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(776, 'Sapphire Oasis', 'Sapphire Oasis', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(777, 'Silicon Heights', 'Silicon Heights', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(778, 'Coral Residence', 'Coral Residence', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(779, 'Ruby Residence', 'Ruby Residence', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(780, 'German Business Park', 'German Business Park', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(781, 'Silicon Technology Tower', 'Silicon Technology Tower', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(782, 'Serenity Heights', 'Serenity Heights', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(783, 'Le Presidium', 'Le Presidium', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(784, 'Silicon Avenue', 'Silicon Avenue', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(785, 'Silicon Star', 'Silicon Star', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(786, 'SIT Tower', 'SIT Tower', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(787, 'Jade Residence', 'Jade Residence', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(788, 'Cedre Villas', 'Cedre Villas', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(789, 'Narjess Building', 'Narjess Building', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(790, 'Spring Oasis', 'Spring Oasis', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(791, 'Silicon Residences', 'Silicon Residences', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(792, 'Amna Building', 'Amna Building', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(793, 'Saima Heights', 'Saima Heights', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(794, 'Sevanam Crown', 'Sevanam Crown', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(795, 'Suntech Tower', 'Suntech Tower', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(796, 'ASB Tower', 'ASB Tower', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(797, 'Khan Saheb Building', 'Khan Saheb Building', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(798, 'Palacio Tower', 'Palacio Tower', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(799, 'Arabtec', 'Arabtec', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(800, 'Dubai Silicon Oasis Head Quarters Complex', 'Dubai Silicon Oasis Head Quarters Complex', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(801, 'Al Nayli Building', 'Al Nayli Building', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(802, 'Zarooni Building', 'Zarooni Building', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(803, 'Platinum Residence 1', 'Platinum Residence 1', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(804, 'SP Oasis', 'SP Oasis', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(805, 'Al Thuraya Building', 'Al Thuraya Building', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(806, 'Altia Residence', 'Altia Residence', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(807, 'S Residence', 'S Residence', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(808, 'Al Falak Residence', 'Al Falak Residence', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(809, 'Mirage Residence', 'Mirage Residence', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(810, 'Arabian Gates', 'Arabian Gates', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(811, 'Binghatti Apartments', 'Binghatti Apartments', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(812, 'Binghatti Views', 'Binghatti Views', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(813, 'Narcissus Building', 'Narcissus Building', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(814, 'The Blue Oasis', 'The Blue Oasis', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(815, 'The White Palace', 'The White Palace', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(816, 'City Oasis', 'City Oasis', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(817, 'Binghatti Terraces', 'Binghatti Terraces', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(818, 'Cartel 333', 'Cartel 333', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(819, 'Binghatti Gardens', 'Binghatti Gardens', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(820, 'Axis Residence', 'Axis Residence', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(821, 'Binghatti Horizons', 'Binghatti Horizons', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(822, 'Silicon Oasis Techno Hub', 'Silicon Oasis Techno Hub', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(823, 'Venezia Residence', 'Venezia Residence', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(824, 'Al Asmawi Tower', 'Al Asmawi Tower', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(825, 'Nibras Oasis 2', 'Nibras Oasis 2', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(826, 'Al Liwan Building', 'Al Liwan Building', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(827, 'Semmer Villas', 'Semmer Villas', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(828, 'Axis Silver 1', 'Axis Silver 1', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(829, 'Cartel 222', 'Cartel 222', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(830, 'Binghatti Pearls', 'Binghatti Pearls', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(831, 'DHP Residency', 'DHP Residency', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(832, 'Sunshine Residence', 'Sunshine Residence', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(833, 'Topaz Residences', 'Topaz Residences', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(834, 'Topaz Premium Residences', 'Topaz Premium Residences', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(835, 'Binghatti Stars', 'Binghatti Stars', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(836, 'Tulip Oasis 3', 'Tulip Oasis 3', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(837, 'Al Nasser Building', 'Al Nasser Building', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(838, 'Iliyaa 3', 'Iliyaa 3', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(839, 'Lynx Residence', 'Lynx Residence', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(840, 'Nibras Oasis 1', 'Nibras Oasis 1', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(841, 'Nova Tower', 'Nova Tower', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(842, 'Oasis Star', 'Oasis Star', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(843, 'Silicon Building', 'Silicon Building', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(844, 'Al Telal 10', 'Al Telal 10', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(845, 'Binghatti Diamonds', 'Binghatti Diamonds', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(846, 'API Silicon Residency', 'API Silicon Residency', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(847, 'Mirage 3 Residence', 'Mirage 3 Residence', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(848, 'National Bonds Oasis', 'National Bonds Oasis', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(849, 'Emerald Building', 'Emerald Building', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(850, 'Uniestate Millennium Tower', 'Uniestate Millennium Tower', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(851, 'Radisson Blu Hotel Apartments Dubai Silicon Oasis', 'Radisson Blu Hotel Apartments Dubai Silicon Oasis', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(852, 'Ocean Residencia', 'Ocean Residencia', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(853, 'Sapphire Residence', 'Sapphire Residence', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(854, 'Al Hikma Residence', 'Al Hikma Residence', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(855, 'Art 9', 'Art 9', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(856, 'Binghatti Residence', 'Binghatti Residence', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(857, 'Silicon Park', 'Silicon Park', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(858, 'Art X Tower', 'Art X Tower', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(859, 'Topaz Residences 3', 'Topaz Residences 3', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(860, 'MM Towers', 'MM Towers', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(861, 'The Icon Tower', 'The Icon Tower', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(862, 'Binghatti Crystals', 'Binghatti Crystals', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(863, 'Binghatti Sapphires', 'Binghatti Sapphires', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(864, 'Binghatti Point', 'Binghatti Point', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(865, 'Al Jawhara building', 'Al Jawhara building', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(866, 'The Eighty Eight', 'The Eighty Eight', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(867, 'Tulip Oasis 1', 'Tulip Oasis 1', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(868, 'Wasayf Building', 'Wasayf Building', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(869, 'Lynx Business Tower', 'Lynx Business Tower', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(870, 'Platinum Residence 2', 'Platinum Residence 2', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(871, 'Khan Saheb Building 2', 'Khan Saheb Building 2', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(872, 'Al Hathboor Residence', 'Al Hathboor Residence', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(873, 'Binghatti Vista', 'Binghatti Vista', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(874, 'Blue Star Building', 'Blue Star Building', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(875, 'Tulip Oasis 2', 'Tulip Oasis 2', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(876, 'Al Waleed Oasis', 'Al Waleed Oasis', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(877, 'Al Manal Residence', 'Al Manal Residence', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(878, 'Binghatti Platinum', 'Binghatti Platinum', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(879, 'Tulip Oasis 4', 'Tulip Oasis 4', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(880, 'Sondos Oasis', 'Sondos Oasis', 33, '2021-06-22 23:09:46', '2021-06-22 23:09:46', 234),
(881, 'Liberty House', 'Liberty House', 34, '2021-06-22 23:12:45', '2021-06-22 23:12:45', 234),
(882, 'Central Park Towers', 'Central Park Towers', 34, '2021-06-22 23:12:45', '2021-06-22 23:12:45', 234),
(883, 'Sky Gardens DIFC', 'Sky Gardens DIFC', 34, '2021-06-22 23:12:45', '2021-06-22 23:12:45', 234),
(884, 'Currency House', 'Currency House', 34, '2021-06-22 23:12:45', '2021-06-22 23:12:45', 234),
(885, 'The Gate', 'The Gate', 34, '2021-06-22 23:12:45', '2021-06-22 23:12:45', 234),
(886, 'Emirates Financial Towers', 'Emirates Financial Towers', 34, '2021-06-22 23:12:45', '2021-06-22 23:12:45', 234),
(887, 'Limestone House', 'Limestone House', 34, '2021-06-22 23:12:45', '2021-06-22 23:12:45', 234),
(888, 'Index Tower', 'Index Tower', 34, '2021-06-22 23:12:45', '2021-06-22 23:12:45', 234),
(889, 'Lighthouse Tower', 'Lighthouse Tower', 34, '2021-06-22 23:12:45', '2021-06-22 23:12:45', 234),
(890, 'Burj Daman', 'Burj Daman', 34, '2021-06-22 23:12:45', '2021-06-22 23:12:45', 234),
(891, 'Park Towers', 'Park Towers', 34, '2021-06-22 23:12:45', '2021-06-22 23:12:45', 234),
(892, 'The Gate Village', 'The Gate Village', 34, '2021-06-22 23:12:45', '2021-06-22 23:12:45', 234),
(893, 'The Gate Precinct', 'The Gate Precinct', 34, '2021-06-22 23:12:45', '2021-06-22 23:12:45', 234),
(894, 'Ritz Carlton', 'Ritz Carlton', 34, '2021-06-22 23:12:45', '2021-06-22 23:12:45', 234),
(895, 'ICD Brookfield Place', 'ICD Brookfield Place', 34, '2021-06-22 23:12:45', '2021-06-22 23:12:45', 234),
(896, 'Al Murooj Complex', 'Al Murooj Complex', 34, '2021-06-22 23:12:45', '2021-06-22 23:12:45', 234),
(897, 'D1 Tower', 'D1 Tower', 35, '2021-06-22 23:15:28', '2021-06-22 23:15:28', 234),
(898, 'Iris Amber', 'Iris Amber', 35, '2021-06-22 23:15:28', '2021-06-22 23:15:28', 234),
(899, 'Palazzo Versace', 'Palazzo Versace', 35, '2021-06-22 23:15:28', '2021-06-22 23:15:28', 234),
(900, 'Niloofar Tower', 'Niloofar Tower', 35, '2021-06-22 23:15:28', '2021-06-22 23:15:28', 234),
(901, 'Dubai Wharf', 'Dubai Wharf', 35, '2021-06-22 23:15:28', '2021-06-22 23:15:28', 234),
(902, 'Manazel Al Khor', 'Manazel Al Khor', 35, '2021-06-22 23:15:28', '2021-06-22 23:15:28', 234),
(903, 'Riah Towers', 'Riah Towers', 35, '2021-06-22 23:15:28', '2021-06-22 23:15:28', 234),
(904, 'The Pearl', 'The Pearl', 35, '2021-06-22 23:15:28', '2021-06-22 23:15:28', 234),
(905, 'Makeen Residence Al Jaddaf', 'Makeen Residence Al Jaddaf', 35, '2021-06-22 23:15:28', '2021-06-22 23:15:28', 234),
(906, 'Grayton House', 'Grayton House', 35, '2021-06-22 23:15:28', '2021-06-22 23:15:28', 234),
(907, 'Hala Building', 'Hala Building', 35, '2021-06-22 23:15:28', '2021-06-22 23:15:28', 234),
(908, 'Suha Park Hotel Apartments', 'Suha Park Hotel Apartments', 35, '2021-06-22 23:15:28', '2021-06-22 23:15:28', 234),
(909, 'Suha Creek Hotel Apartments', 'Suha Creek Hotel Apartments', 35, '2021-06-22 23:15:28', '2021-06-22 23:15:28', 234),
(910, 'Elements', 'Elements', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(911, 'Emirates Garden', 'Emirates Garden', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(912, 'Emirates Garden 2', 'Emirates Garden 2', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(913, 'Fortunato', 'Fortunato', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(914, 'Jumeirah Executive', 'Jumeirah Executive', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(915, 'The Wave Business Tower', 'The Wave Business Tower', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(916, 'Knightsbridge Court', 'Knightsbridge Court', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(917, 'Mirabella', 'Mirabella', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(918, 'R &amp; R Tower', 'R &amp; R Tower', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(919, 'Tuscan Residence', 'Tuscan Residence', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(920, 'Park Square', 'Park Square', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(921, 'La Riviera Estates', 'La Riviera Estates', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(922, 'Fares Tower', 'Fares Tower', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(923, 'Cappadocia', 'Cappadocia', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(924, 'CORP Executive Hotel &amp; Office Tower', 'CORP Executive Hotel &amp; Office Tower', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(925, 'German Supreme Tower', 'German Supreme Tower', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(926, 'Bonnintgton at Jumeirah Village', 'Bonnintgton at Jumeirah Village', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(927, 'Stone Tower', 'Stone Tower', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(928, 'The Highrise Boulevard', 'The Highrise Boulevard', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(929, 'Prime Business Centre', 'Prime Business Centre', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(930, 'Astoria Residence', 'Astoria Residence', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(931, 'Excellence Residence', 'Excellence Residence', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(932, 'The Manhattan', 'The Manhattan', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(933, 'Le Grand Chateau', 'Le Grand Chateau', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(934, 'Al Nawaal Residence', 'Al Nawaal Residence', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(935, 'Tulip Park', 'Tulip Park', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(936, 'Metropolis Central', 'Metropolis Central', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(937, 'Shamal Terraces', 'Shamal Terraces', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(938, 'Mirage Residence', 'Mirage Residence', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(939, 'Blue Ice', 'Blue Ice', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(940, 'Sun Gate 1', 'Sun Gate 1', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(941, 'Lotus Park', 'Lotus Park', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(942, 'The Crown Residence', 'The Crown Residence', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(943, 'Hanover Square', 'Hanover Square', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(944, 'Kensington Manor', 'Kensington Manor', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(945, 'Seasons Community', 'Seasons Community', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(946, 'Quattro Hotel and Business Park', 'Quattro Hotel and Business Park', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(947, 'Erantis', 'Erantis', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(948, 'U Tower', 'U Tower', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(949, 'Dunes Tower', 'Dunes Tower', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(950, 'Olympus Tower', 'Olympus Tower', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(951, 'The HQ Tower', 'The HQ Tower', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(952, 'Arabian Tower', 'Arabian Tower', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(953, 'Iris Park', 'Iris Park', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(954, 'Valencia Park', 'Valencia Park', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(955, 'Indigo Ville', 'Indigo Ville', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(956, 'Prudential Tower 1', 'Prudential Tower 1', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(957, 'Villa Heights', 'Villa Heights', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(958, 'Centre Court', 'Centre Court', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(959, 'Kaizen One', 'Kaizen One', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(960, 'Sobha Daffodil', 'Sobha Daffodil', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(961, 'The Crystal', 'The Crystal', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(962, 'Jumeirah Blues', 'Jumeirah Blues', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(963, 'Mulberry Mansions', 'Mulberry Mansions', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(964, 'Lolena Residence', 'Lolena Residence', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(965, 'The Plaza Residences', 'The Plaza Residences', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(966, 'Makstar Tower', 'Makstar Tower', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(967, 'Sunset Gardens', 'Sunset Gardens', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(968, 'Serenity Lakes', 'Serenity Lakes', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(969, 'Rigal Tower', 'Rigal Tower', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(970, 'Melissa Residence', 'Melissa Residence', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(971, 'Negar 5', 'Negar 5', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(972, 'La Belle Vue', 'La Belle Vue', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(973, 'Las Casas', 'Las Casas', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(974, 'Burj Al Faraa', 'Burj Al Faraa', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(975, 'Westar Reflections', 'Westar Reflections', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(976, 'Westar Casablanca East', 'Westar Casablanca East', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(977, 'Westar Terrace Garden', 'Westar Terrace Garden', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(978, 'Westar Les Castelets', 'Westar Les Castelets', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(979, 'Royal Park Residence', 'Royal Park Residence', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(980, 'Sunrise Residence', 'Sunrise Residence', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(981, 'Beverly Residence', 'Beverly Residence', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(982, 'Lilac Park', 'Lilac Park', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(983, 'Orchid Park', 'Orchid Park', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(984, 'Mulberry Park', 'Mulberry Park', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(985, 'Jumeirah Suites', 'Jumeirah Suites', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(986, 'Masaar Residence', 'Masaar Residence', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(987, 'Monte Carlo Residences', 'Monte Carlo Residences', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(988, 'Diamond Views', 'Diamond Views', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(989, 'Jehaan', 'Jehaan', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(990, 'Reliance', 'Reliance', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(991, 'Nakheel Villas', 'Nakheel Villas', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(992, 'Suites In the Skai', 'Suites In the Skai', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(993, 'Alfa Residence', 'Alfa Residence', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(994, 'Park Villas', 'Park Villas', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(995, 'Oudah Tower', 'Oudah Tower', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(996, 'Oasis Flex', 'Oasis Flex', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(997, 'Villa Myra', 'Villa Myra', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(998, 'Dezire Residences', 'Dezire Residences', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(999, 'DAMAC Ghalia', 'DAMAC Ghalia', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(1000, 'Botanica', 'Botanica', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(1001, 'Sandoval Garden', 'Sandoval Garden', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(1002, 'Reef Residence', 'Reef Residence', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(1003, 'Zaya Hameni', 'Zaya Hameni', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(1004, 'Nakheel Townhouse', 'Nakheel Townhouse', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(1005, 'Marwa Homes', 'Marwa Homes', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(1006, 'Belgravia', 'Belgravia', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(1007, 'Shamal Residences', 'Shamal Residences', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(1008, 'Mar Residences', 'Mar Residences', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(1009, 'Laya Residences', 'Laya Residences', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(1010, 'Spica Residential', 'Spica Residential', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(1011, 'ALCOVE', 'ALCOVE', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(1012, 'Signature Villas XII', 'Signature Villas XII', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(1013, 'Signature Villas XIV', 'Signature Villas XIV', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(1014, 'Tower 108', 'Tower 108', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(1015, 'MILANO by Giovanni Boutique Suites', 'MILANO by Giovanni Boutique Suites', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(1016, 'Hyati Residences', 'Hyati Residences', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(1017, 'Regent Court', 'Regent Court', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(1018, 'Bloom Towers', 'Bloom Towers', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(1019, 'Roxana Residences', 'Roxana Residences', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(1020, 'Artistic Heights', 'Artistic Heights', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(1021, 'Al Muhra', 'Al Muhra', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(1022, 'District 12', 'District 12', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(1023, 'Sandoval lane', 'Sandoval lane', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(1024, 'Westar Vista', 'Westar Vista', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(1025, 'Gardenia Residency', 'Gardenia Residency', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(1026, 'May Residence', 'May Residence', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(1027, 'Eaton Place', 'Eaton Place', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(1028, 'Villa Pera', 'Villa Pera', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(1029, 'Erica', 'Erica', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(1030, 'Green Valley Tower', 'Green Valley Tower', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(1031, 'Platinum Residence', 'Platinum Residence', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(1032, 'Oxford Residence', 'Oxford Residence', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(1033, 'Shamal Waves', 'Shamal Waves', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(1034, 'Heilbronn Villas', 'Heilbronn Villas', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(1035, 'Saleh Bin Lahej JVC', 'Saleh Bin Lahej JVC', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(1036, 'Pantheon Boulevard', 'Pantheon Boulevard', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(1037, 'The Ghaf Tree', 'The Ghaf Tree', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(1038, 'Crystal Residence', 'Crystal Residence', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(1039, 'UniEstate Prime Tower', 'UniEstate Prime Tower', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(1040, 'Bloom Heights', 'Bloom Heights', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(1041, 'The Habitat', 'The Habitat', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(1042, 'Pulse Smart Residence', 'Pulse Smart Residence', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(1043, 'Viceroy JV', 'Viceroy JV', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(1044, 'District 13', 'District 13', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(1045, 'Casa Royale II', 'Casa Royale II', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(1046, 'Grand Paradise', 'Grand Paradise', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234);
INSERT INTO `sub_communities` (`id`, `name_en`, `name_ar`, `community_id`, `created_at`, `updated_at`, `country_id`) VALUES
(1047, 'La Riviera Apartments', 'La Riviera Apartments', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(1048, 'Al Waleed Building', 'Al Waleed Building', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(1049, 'Marwa Homes 2', 'Marwa Homes 2', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(1050, 'Dar Al Jawhara Residence', 'Dar Al Jawhara Residence', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(1051, 'District 11', 'District 11', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(1052, 'Artistic Villas', 'Artistic Villas', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(1053, 'Golden Homes Building', 'Golden Homes Building', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(1054, 'Dusit Princess Rijas', 'Dusit Princess Rijas', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(1055, 'District 16', 'District 16', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(1056, 'Evershine One', 'Evershine One', 37, '2021-06-22 23:17:52', '2021-06-22 23:17:52', 234),
(1057, 'Park View Residence', 'Park View Residence', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1058, 'District 14', 'District 14', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1059, 'District 15', 'District 15', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1060, 'Sydney Tower', 'Sydney Tower', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1061, 'Circle Villas', 'Circle Villas', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1062, 'Garden Lane Villas', 'Garden Lane Villas', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1063, 'Goldenwoods Villas', 'Goldenwoods Villas', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1064, 'Hameni Residence', 'Hameni Residence', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1065, 'Jumeirah Wave Tower', 'Jumeirah Wave Tower', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1066, 'Mediterranean Village', 'Mediterranean Village', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1067, 'Oxford Villas', 'Oxford Villas', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1068, 'Palace Estates', 'Palace Estates', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1069, 'Park Corner', 'Park Corner', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1070, 'Rufi Downtown', 'Rufi Downtown', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1071, 'Divine homes', 'Divine homes', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1072, 'O2 Tower', 'O2 Tower', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1073, 'Chaimaa Premiere', 'Chaimaa Premiere', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1074, 'District 10', 'District 10', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1075, 'CARTEL 112', 'CARTEL 112', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1076, 'National Bonds Residence', 'National Bonds Residence', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1077, 'FIVE Jumeirah Village', 'FIVE Jumeirah Village', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1078, 'Orchidea Residence', 'Orchidea Residence', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1079, 'Sandhurst House', 'Sandhurst House', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1080, 'Avalon Tower', 'Avalon Tower', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1081, 'The Residence IV', 'The Residence IV', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1082, 'Sobo Residence', 'Sobo Residence', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1083, 'Royal JVC Building', 'Royal JVC Building', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1084, 'Al Yousuf Towers', 'Al Yousuf Towers', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1085, 'Les Maisonettes', 'Les Maisonettes', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1086, 'Plazzo Heights', 'Plazzo Heights', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1087, 'Emerald Tower', 'Emerald Tower', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1088, 'City Apartments', 'City Apartments', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1089, 'Westar Constellation', 'Westar Constellation', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1090, 'The Square Tower', 'The Square Tower', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1091, 'Joya Verde Residences', 'Joya Verde Residences', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1092, 'Westar La Residencia del Sol', 'Westar La Residencia del Sol', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1093, 'Al Zubaidi Residence', 'Al Zubaidi Residence', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1094, 'Hyati Avenue', 'Hyati Avenue', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1095, 'Amina Residence 2', 'Amina Residence 2', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1096, 'The Lawns', 'The Lawns', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1097, 'Judi Palace', 'Judi Palace', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1098, 'Condor Castle', 'Condor Castle', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1099, 'Signature Livings', 'Signature Livings', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1100, 'Belgravia Square', 'Belgravia Square', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1101, 'Valencia Residence', 'Valencia Residence', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1102, 'Sandoval Park Residence', 'Sandoval Park Residence', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1103, 'The One at Jumeirah Village Circle', 'The One at Jumeirah Village Circle', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1104, 'Somerset Mews', 'Somerset Mews', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1105, 'Oxford Residence 2', 'Oxford Residence 2', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1106, 'District 19', 'District 19', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1107, 'Al Yousifi Tower', 'Al Yousifi Tower', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1108, 'Dune Residency', 'Dune Residency', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1109, 'Regina Tower', 'Regina Tower', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1110, 'Jeewar Apartments', 'Jeewar Apartments', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1111, 'Venus 1 Building', 'Venus 1 Building', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1112, 'Taraf 1 Residence', 'Taraf 1 Residence', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1113, 'District 17', 'District 17', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1114, 'Living Garden', 'Living Garden', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1115, 'Pantheon Elysee', 'Pantheon Elysee', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1116, 'Nargis Residence', 'Nargis Residence', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1117, 'Flamingo Building', 'Flamingo Building', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1118, 'South Residences', 'South Residences', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1119, 'Oakville Residence', 'Oakville Residence', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1120, 'The Icon Casa', 'The Icon Casa', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1121, 'Continents Tower', 'Continents Tower', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1122, 'Penta Villas', 'Penta Villas', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1123, 'Rigel Apartments', 'Rigel Apartments', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1124, 'Aria Residence', 'Aria Residence', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1125, 'Aurion Residence', 'Aurion Residence', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1126, 'Park Vista', 'Park Vista', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1127, 'Chaimaa Avenue Residences', 'Chaimaa Avenue Residences', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1128, 'Tasmeer Residence', 'Tasmeer Residence', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1129, 'Rose 10', 'Rose 10', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1130, 'Crystal Palace', 'Crystal Palace', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1131, 'Lucky 1 Residences', 'Lucky 1 Residences', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1132, 'Zain Saeed Zain Al Zubaidi Building', 'Zain Saeed Zain Al Zubaidi Building', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1133, 'Al Manal Elite', 'Al Manal Elite', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1134, 'Fortunato Townhouses', 'Fortunato Townhouses', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1135, 'District 18', 'District 18', 37, '2021-06-22 23:17:53', '2021-06-22 23:17:53', 234),
(1136, 'Oceana', 'Oceana', 40, '2021-06-22 23:21:38', '2021-06-22 23:21:38', 234),
(1137, 'The Grandeur Residences', 'The Grandeur Residences', 40, '2021-06-22 23:21:38', '2021-06-22 23:21:38', 234),
(1138, 'Palm Terrace', 'Palm Terrace', 40, '2021-06-22 23:21:38', '2021-06-22 23:21:38', 234),
(1139, 'Shoreline Apartments', 'Shoreline Apartments', 40, '2021-06-22 23:21:38', '2021-06-22 23:21:38', 234),
(1140, 'Signature Villas Palm Jumeirah', 'Signature Villas Palm Jumeirah', 40, '2021-06-22 23:21:38', '2021-06-22 23:21:38', 234),
(1141, 'The Fairmont Palm Residences', 'The Fairmont Palm Residences', 40, '2021-06-22 23:21:38', '2021-06-22 23:21:38', 234),
(1142, 'Kingdom Of Sheba', 'Kingdom Of Sheba', 40, '2021-06-22 23:21:38', '2021-06-22 23:21:38', 234),
(1143, 'Garden Homes Palm Jumeirah', 'Garden Homes Palm Jumeirah', 40, '2021-06-22 23:21:38', '2021-06-22 23:21:38', 234),
(1144, 'Canal Cove', 'Canal Cove', 40, '2021-06-22 23:21:38', '2021-06-22 23:21:38', 234),
(1145, 'Marina Residences', 'Marina Residences', 40, '2021-06-22 23:21:38', '2021-06-22 23:21:38', 234),
(1146, 'The Royal Amwaj Resort &amp; Spa', 'The Royal Amwaj Resort &amp; Spa', 40, '2021-06-22 23:21:38', '2021-06-22 23:21:38', 234),
(1147, 'Trump International Hotel &amp; Tower', 'Trump International Hotel &amp; Tower', 40, '2021-06-22 23:21:38', '2021-06-22 23:21:38', 234),
(1148, 'Atlantis The Palm', 'Atlantis The Palm', 40, '2021-06-22 23:21:38', '2021-06-22 23:21:38', 234),
(1149, 'Azure Residences', 'Azure Residences', 40, '2021-06-22 23:21:38', '2021-06-22 23:21:38', 234),
(1150, 'Anantara Residences', 'Anantara Residences', 40, '2021-06-22 23:21:38', '2021-06-22 23:21:38', 234),
(1151, 'Palma Residences', 'Palma Residences', 40, '2021-06-22 23:21:38', '2021-06-22 23:21:38', 234),
(1152, 'The Palm Tower', 'The Palm Tower', 40, '2021-06-22 23:21:38', '2021-06-22 23:21:38', 234),
(1153, 'Club Vista Mare', 'Club Vista Mare', 40, '2021-06-22 23:21:38', '2021-06-22 23:21:38', 234),
(1154, 'Serenia Residences The Palm', 'Serenia Residences The Palm', 40, '2021-06-22 23:21:38', '2021-06-22 23:21:38', 234),
(1155, 'W Residences', 'W Residences', 40, '2021-06-22 23:21:38', '2021-06-22 23:21:38', 234),
(1156, 'The Crescent', 'The Crescent', 40, '2021-06-22 23:21:38', '2021-06-22 23:21:38', 234),
(1157, 'Azizi Mina', 'Azizi Mina', 40, '2021-06-22 23:21:38', '2021-06-22 23:21:38', 234),
(1158, 'Royal Bay', 'Royal Bay', 40, '2021-06-22 23:21:38', '2021-06-22 23:21:38', 234),
(1159, 'Dukes Oceana', 'Dukes Oceana', 40, '2021-06-22 23:21:38', '2021-06-22 23:21:38', 234),
(1160, 'One at Palm Jumeirah', 'One at Palm Jumeirah', 40, '2021-06-22 23:21:38', '2021-06-22 23:21:38', 234),
(1161, 'Tiara Residences', 'Tiara Residences', 40, '2021-06-22 23:21:38', '2021-06-22 23:21:38', 234),
(1162, 'Palm Views', 'Palm Views', 40, '2021-06-22 23:21:38', '2021-06-22 23:21:38', 234),
(1163, 'Golden Mile', 'Golden Mile', 40, '2021-06-22 23:21:38', '2021-06-22 23:21:38', 234),
(1164, 'Viceroy', 'Viceroy', 40, '2021-06-22 23:21:38', '2021-06-22 23:21:38', 234),
(1165, 'Anantara The Palm Dubai Resort', 'Anantara The Palm Dubai Resort', 40, '2021-06-22 23:21:38', '2021-06-22 23:21:38', 234),
(1166, 'Gateway Towers', 'Gateway Towers', 40, '2021-06-22 23:21:38', '2021-06-22 23:21:38', 234),
(1167, 'SANDY BAY I', 'SANDY BAY I', 40, '2021-06-22 23:21:38', '2021-06-22 23:21:38', 234),
(1168, 'Ellington Collection', 'Ellington Collection', 40, '2021-06-22 23:21:38', '2021-06-22 23:21:38', 234),
(1169, 'XXII Carat', 'XXII Carat', 40, '2021-06-22 23:21:38', '2021-06-22 23:21:38', 234),
(1170, 'Se7en Residences', 'Se7en Residences', 40, '2021-06-22 23:21:38', '2021-06-22 23:21:38', 234),
(1171, 'FIVE Palm Jumeirah', 'FIVE Palm Jumeirah', 40, '2021-06-22 23:21:38', '2021-06-22 23:21:38', 234),
(1172, 'The Pointe', 'The Pointe', 40, '2021-06-22 23:21:38', '2021-06-22 23:21:38', 234),
(1173, 'Four Pearls', 'Four Pearls', 40, '2021-06-22 23:21:38', '2021-06-22 23:21:38', 234),
(1174, 'Sarai Apartments', 'Sarai Apartments', 40, '2021-06-22 23:21:38', '2021-06-22 23:21:38', 234),
(1175, 'Palme Couture Residences', 'Palme Couture Residences', 40, '2021-06-22 23:21:38', '2021-06-22 23:21:38', 234),
(1176, 'Andaz Dubai The Palm', 'Andaz Dubai The Palm', 40, '2021-06-22 23:21:38', '2021-06-22 23:21:38', 234),
(1177, 'Soho Palm', 'Soho Palm', 40, '2021-06-22 23:21:38', '2021-06-22 23:21:38', 234),
(1178, 'Seven Palm', 'Seven Palm', 40, '2021-06-22 23:21:38', '2021-06-22 23:21:38', 234),
(1179, 'Adagio Hotel Apartments', 'Adagio Hotel Apartments', 40, '2021-06-22 23:21:38', '2021-06-22 23:21:38', 234),
(1180, 'Signature Villas', 'Signature Villas', 41, '2021-06-22 23:23:19', '2021-06-22 23:23:19', 234),
(1181, 'Town Homes', 'Town Homes', 41, '2021-06-22 23:23:19', '2021-06-22 23:23:19', 234),
(1182, 'Garden Homes Palm Jabel Ali', 'Garden Homes Palm Jabel Ali', 41, '2021-06-22 23:23:19', '2021-06-22 23:23:19', 234),
(1183, 'Canal Cove Townhouse', 'Canal Cove Townhouse', 41, '2021-06-22 23:23:19', '2021-06-22 23:23:19', 234),
(1184, 'Sanali Oceana', 'Sanali Oceana', 41, '2021-06-22 23:23:19', '2021-06-22 23:23:19', 234),
(1185, 'Waterfront', 'Waterfront', 41, '2021-06-22 23:23:19', '2021-06-22 23:23:19', 234),
(1186, 'Waterfront Boulevard', 'Waterfront Boulevard', 42, '2021-06-22 23:25:57', '2021-06-22 23:25:57', 234),
(1187, 'Courniche', 'Courniche', 42, '2021-06-22 23:25:57', '2021-06-22 23:25:57', 234),
(1188, 'Downtown Waterfront', 'Downtown Waterfront', 42, '2021-06-22 23:25:57', '2021-06-22 23:25:57', 234),
(1189, 'Madinat Al Arab', 'Madinat Al Arab', 42, '2021-06-22 23:25:57', '2021-06-22 23:25:57', 234),
(1190, 'The Palm Boulevard', 'The Palm Boulevard', 42, '2021-06-22 23:25:57', '2021-06-22 23:25:57', 234),
(1191, 'The Peninsula Dubai Waterfront', 'The Peninsula Dubai Waterfront', 42, '2021-06-22 23:25:57', '2021-06-22 23:25:57', 234),
(1192, 'The Riviera', 'The Riviera', 42, '2021-06-22 23:25:57', '2021-06-22 23:25:57', 234),
(1193, 'Uptown Waterfront', 'Uptown Waterfront', 42, '2021-06-22 23:25:57', '2021-06-22 23:25:57', 234),
(1194, 'The Exchange Dubai Waterfront', 'The Exchange Dubai Waterfront', 42, '2021-06-22 23:25:57', '2021-06-22 23:25:57', 234),
(1195, 'Veneto', 'Veneto', 42, '2021-06-22 23:25:57', '2021-06-22 23:25:57', 234),
(1196, 'Badrah', 'Badrah', 42, '2021-06-22 23:25:57', '2021-06-22 23:25:57', 234),
(1197, 'Lime Tree Valley', 'Lime Tree Valley', 44, '2021-06-22 23:27:55', '2021-06-22 23:27:55', 234),
(1198, 'Flame Tree Ridge', 'Flame Tree Ridge', 44, '2021-06-22 23:27:55', '2021-06-22 23:27:55', 234),
(1199, 'The Sundials', 'The Sundials', 44, '2021-06-22 23:27:55', '2021-06-22 23:27:55', 234),
(1200, 'Sanctuary Falls', 'Sanctuary Falls', 44, '2021-06-22 23:27:55', '2021-06-22 23:27:55', 234),
(1201, 'Wildflower', 'Wildflower', 44, '2021-06-22 23:27:55', '2021-06-22 23:27:55', 234),
(1202, 'Sienna Lakes', 'Sienna Lakes', 44, '2021-06-22 23:27:55', '2021-06-22 23:27:55', 234),
(1203, 'Orange Lake', 'Orange Lake', 44, '2021-06-22 23:27:55', '2021-06-22 23:27:55', 234),
(1204, 'Olive Point', 'Olive Point', 44, '2021-06-22 23:27:55', '2021-06-22 23:27:55', 234),
(1205, 'Valencia Grove', 'Valencia Grove', 44, '2021-06-22 23:27:55', '2021-06-22 23:27:55', 234),
(1206, 'Fire Residences', 'Fire Residences', 44, '2021-06-22 23:27:55', '2021-06-22 23:27:55', 234),
(1207, 'Earth', 'Earth', 44, '2021-06-22 23:27:55', '2021-06-22 23:27:55', 234),
(1208, 'Whispering Pines', 'Whispering Pines', 44, '2021-06-22 23:27:55', '2021-06-22 23:27:55', 234),
(1209, 'Royal Golf Villa', 'Royal Golf Villa', 44, '2021-06-22 23:27:55', '2021-06-22 23:27:55', 234),
(1210, 'Al Andalus', 'Al Andalus', 44, '2021-06-22 23:27:55', '2021-06-22 23:27:55', 234),
(1211, 'Juniper way', 'Juniper way', 44, '2021-06-22 23:27:55', '2021-06-22 23:27:55', 234),
(1212, 'Redwood Avenue', 'Redwood Avenue', 44, '2021-06-22 23:27:55', '2021-06-22 23:27:55', 234),
(1213, 'Hillside', 'Hillside', 44, '2021-06-22 23:27:55', '2021-06-22 23:27:55', 234),
(1214, 'Sienna Views', 'Sienna Views', 44, '2021-06-22 23:27:55', '2021-06-22 23:27:55', 234),
(1215, 'Redwood Park', 'Redwood Park', 44, '2021-06-22 23:27:55', '2021-06-22 23:27:55', 234),
(1216, 'Jumeirah Luxury', 'Jumeirah Luxury', 44, '2021-06-22 23:27:55', '2021-06-22 23:27:55', 234),
(1217, 'Zafran', 'Zafran', 44, '2021-06-22 23:27:55', '2021-06-22 23:27:55', 234),
(1218, 'Heritage', 'Heritage', 46, '2021-06-22 23:29:16', '2021-06-22 23:29:16', 234),
(1219, 'Legacy', 'Legacy', 46, '2021-06-22 23:29:16', '2021-06-22 23:29:16', 234),
(1220, 'Regional', 'Regional', 46, '2021-06-22 23:29:16', '2021-06-22 23:29:16', 234),
(1221, 'Legacy Nova', 'Legacy Nova', 46, '2021-06-22 23:29:16', '2021-06-22 23:29:16', 234),
(1222, 'Jumeirah Park Homes', 'Jumeirah Park Homes', 46, '2021-06-22 23:29:17', '2021-06-22 23:29:17', 234),
(1223, 'District 1', 'District 1', 46, '2021-06-22 23:29:17', '2021-06-22 23:29:17', 234),
(1224, 'District 2', 'District 2', 46, '2021-06-22 23:29:17', '2021-06-22 23:29:17', 234),
(1225, 'District 3', 'District 3', 46, '2021-06-22 23:29:17', '2021-06-22 23:29:17', 234),
(1226, 'District 4', 'District 4', 46, '2021-06-22 23:29:17', '2021-06-22 23:29:17', 234),
(1227, 'District 5', 'District 5', 46, '2021-06-22 23:29:17', '2021-06-22 23:29:17', 234),
(1228, 'District 6', 'District 6', 46, '2021-06-22 23:29:17', '2021-06-22 23:29:17', 234),
(1229, 'District 7', 'District 7', 46, '2021-06-22 23:29:17', '2021-06-22 23:29:17', 234),
(1230, 'District 8', 'District 8', 46, '2021-06-22 23:29:17', '2021-06-22 23:29:17', 234),
(1231, 'District 9', 'District 9', 46, '2021-06-22 23:29:17', '2021-06-22 23:29:17', 234),
(1232, 'Elite Towers', 'Elite Towers', 47, '2021-06-22 23:31:24', '2021-06-22 23:31:24', 234),
(1233, 'I &amp; M Tower', 'I &amp; M Tower', 47, '2021-06-22 23:31:24', '2021-06-22 23:31:24', 234),
(1234, 'Metro Tower', 'Metro Tower', 47, '2021-06-22 23:31:24', '2021-06-22 23:31:24', 234),
(1235, 'Wadi Tower', 'Wadi Tower', 47, '2021-06-22 23:31:24', '2021-06-22 23:31:24', 234),
(1236, 'Wadi Walk', 'Wadi Walk', 47, '2021-06-22 23:31:24', '2021-06-22 23:31:24', 234),
(1237, 'MAG 230', 'MAG 230', 47, '2021-06-22 23:31:24', '2021-06-22 23:31:24', 234),
(1238, 'The Gardens Apartments', 'The Gardens Apartments', 48, '2021-06-22 23:32:36', '2021-06-22 23:32:36', 234),
(1239, 'The Grand Lagoon', 'The Grand Lagoon', 49, '2021-06-22 23:34:21', '2021-06-22 23:34:21', 234),
(1240, 'Dubai Creek Harbour', 'Dubai Creek Harbour', 49, '2021-06-22 23:34:21', '2021-06-22 23:34:21', 234),
(1241, 'Al Fattan Marine Towers', 'Al Fattan Marine Towers', 50, '2021-06-22 23:35:43', '2021-06-22 23:35:43', 234),
(1242, 'Bahar', 'Bahar', 50, '2021-06-22 23:35:43', '2021-06-22 23:35:43', 234),
(1243, 'Murjan', 'Murjan', 50, '2021-06-22 23:35:43', '2021-06-22 23:35:43', 234),
(1244, 'Amwaj', 'Amwaj', 50, '2021-06-22 23:35:43', '2021-06-22 23:35:43', 234),
(1245, 'Rimal', 'Rimal', 50, '2021-06-22 23:35:43', '2021-06-22 23:35:43', 234),
(1246, 'Sadaf', 'Sadaf', 50, '2021-06-22 23:35:43', '2021-06-22 23:35:43', 234),
(1247, 'Shams', 'Shams', 50, '2021-06-22 23:35:43', '2021-06-22 23:35:43', 234),
(1248, 'The Walk', 'The Walk', 50, '2021-06-22 23:35:43', '2021-06-22 23:35:43', 234),
(1249, '1 JBR', '1 JBR', 50, '2021-06-22 23:35:43', '2021-06-22 23:35:43', 234),
(1250, 'JA Oasis Beach Tower', 'JA Oasis Beach Tower', 50, '2021-06-22 23:35:43', '2021-06-22 23:35:43', 234),
(1251, 'The Address Residences Jumeirah Resort and Spa', 'The Address Residences Jumeirah Resort and Spa', 50, '2021-06-22 23:35:43', '2021-06-22 23:35:43', 234),
(1252, 'Ramada Plaza Jumeirah Beach', 'Ramada Plaza Jumeirah Beach', 50, '2021-06-22 23:35:43', '2021-06-22 23:35:43', 234),
(1253, 'La Vie', 'La Vie', 50, '2021-06-22 23:35:43', '2021-06-22 23:35:43', 234),
(1254, 'Al Fattan Crystal Towers', 'Al Fattan Crystal Towers', 50, '2021-06-22 23:35:43', '2021-06-22 23:35:43', 234),
(1255, 'Ramada Hotel &amp; Suites JBR', 'Ramada Hotel &amp; Suites JBR', 50, '2021-06-22 23:35:44', '2021-06-22 23:35:44', 234),
(1256, 'Delta Hotels by Marriott Jumeirah Beach', 'Delta Hotels by Marriott Jumeirah Beach', 50, '2021-06-22 23:35:44', '2021-06-22 23:35:44', 234),
(1257, 'Suha Hotel Apartments', 'Suha Hotel Apartments', 50, '2021-06-22 23:35:44', '2021-06-22 23:35:44', 234),
(1258, 'Reehan', 'Reehan', 52, '2021-06-22 23:38:08', '2021-06-22 23:38:08', 234),
(1259, 'Yansoon', 'Yansoon', 52, '2021-06-22 23:38:08', '2021-06-22 23:38:08', 234),
(1260, 'Miska', 'Miska', 52, '2021-06-22 23:38:08', '2021-06-22 23:38:08', 234),
(1261, 'Kamoon', 'Kamoon', 52, '2021-06-22 23:38:08', '2021-06-22 23:38:08', 234),
(1262, 'Zanzebeel', 'Zanzebeel', 52, '2021-06-22 23:38:08', '2021-06-22 23:38:08', 234),
(1263, 'Zaafaran', 'Zaafaran', 52, '2021-06-22 23:38:08', '2021-06-22 23:38:08', 234),
(1264, 'Al Saaha Offices', 'Al Saaha Offices', 52, '2021-06-22 23:38:08', '2021-06-22 23:38:08', 234),
(1265, 'The Old Town Island', 'The Old Town Island', 52, '2021-06-22 23:38:08', '2021-06-22 23:38:08', 234),
(1266, 'Al Nahda 1', 'Al Nahda 1', 55, '2021-06-22 23:39:29', '2021-06-22 23:39:29', 234),
(1267, 'Al Nahda 2', 'Al Nahda 2', 55, '2021-06-22 23:39:29', '2021-06-22 23:39:29', 234),
(1268, 'Al Qusais Industrail Area', 'Al Qusais Industrail Area', 57, '2021-06-22 23:40:43', '2021-06-22 23:40:43', 234),
(1269, 'Al Qusais Residential Area', 'Al Qusais Residential Area', 57, '2021-06-22 23:40:43', '2021-06-22 23:40:43', 234),
(1270, 'Sonapur', 'Sonapur', 59, '2021-06-22 23:42:25', '2021-06-22 23:42:25', 234),
(1271, 'Muhaisnah 1', 'Muhaisnah 1', 59, '2021-06-22 23:42:25', '2021-06-22 23:42:25', 234),
(1272, 'Muhaisnah 2', 'Muhaisnah 2', 59, '2021-06-22 23:42:25', '2021-06-22 23:42:25', 234),
(1273, 'Muhaisnah 3', 'Muhaisnah 3', 59, '2021-06-22 23:42:25', '2021-06-22 23:42:25', 234),
(1274, 'Muhaisnah 4', 'Muhaisnah 4', 59, '2021-06-22 23:42:25', '2021-06-22 23:42:25', 234),
(1275, 'Uptown Mirdif', 'Uptown Mirdif', 61, '2021-06-22 23:43:47', '2021-06-22 23:43:47', 234),
(1276, 'Mirdif Hills', 'Mirdif Hills', 61, '2021-06-22 23:43:47', '2021-06-22 23:43:47', 234),
(1277, 'Ghoroob Mirdif', 'Ghoroob Mirdif', 61, '2021-06-22 23:43:47', '2021-06-22 23:43:47', 234),
(1278, 'Shorooq Mirdif', 'Shorooq Mirdif', 61, '2021-06-22 23:43:47', '2021-06-22 23:43:47', 234),
(1279, 'Mirdif Tulip', 'Mirdif Tulip', 61, '2021-06-22 23:43:47', '2021-06-22 23:43:47', 234),
(1280, 'Al Badi Complex', 'Al Badi Complex', 61, '2021-06-22 23:43:47', '2021-06-22 23:43:47', 234),
(1281, 'Mushrif Village', 'Mushrif Village', 61, '2021-06-22 23:43:47', '2021-06-22 23:43:47', 234),
(1282, 'Mirdif 44 Villas', 'Mirdif 44 Villas', 61, '2021-06-22 23:43:47', '2021-06-22 23:43:47', 234),
(1283, 'Gargash 16 Villas', 'Gargash 16 Villas', 61, '2021-06-22 23:43:47', '2021-06-22 23:43:47', 234),
(1284, 'Makeen 18 Villa Compound', 'Makeen 18 Villa Compound', 61, '2021-06-22 23:43:47', '2021-06-22 23:43:47', 234),
(1285, 'Makeen 9 Villa Compound', 'Makeen 9 Villa Compound', 61, '2021-06-22 23:43:47', '2021-06-22 23:43:47', 234),
(1286, 'Tameem Villas', 'Tameem Villas', 61, '2021-06-22 23:43:47', '2021-06-22 23:43:47', 234),
(1287, 'Dar Al Zain Villas', 'Dar Al Zain Villas', 61, '2021-06-22 23:43:47', '2021-06-22 23:43:47', 234),
(1288, 'Ameen 6 Villa Compound', 'Ameen 6 Villa Compound', 61, '2021-06-22 23:43:47', '2021-06-22 23:43:47', 234),
(1289, 'Al Mizhar 1', 'Al Mizhar 1', 62, '2021-06-22 23:45:39', '2021-06-22 23:45:39', 234),
(1290, 'Al Mizhar 2', 'Al Mizhar 2', 62, '2021-06-22 23:45:39', '2021-06-22 23:45:39', 234),
(1291, 'Al Khawaneej 1', 'Al Khawaneej 1', 64, '2021-06-22 23:46:52', '2021-06-22 23:46:52', 234),
(1292, 'Al Khawaneej 2', 'Al Khawaneej 2', 64, '2021-06-22 23:46:52', '2021-06-22 23:46:52', 234),
(1293, 'Al Twar 1', 'Al Twar 1', 66, '2021-06-22 23:48:13', '2021-06-22 23:48:13', 234),
(1294, 'Al Twar 2', 'Al Twar 2', 66, '2021-06-22 23:48:13', '2021-06-22 23:48:13', 234),
(1295, 'Al Twar 3', 'Al Twar 3', 66, '2021-06-22 23:48:13', '2021-06-22 23:48:13', 234),
(1296, 'Oud Al Muteena 1', 'Oud Al Muteena 1', 68, '2021-06-22 23:49:57', '2021-06-22 23:49:57', 234),
(1297, 'Oud Al Muteena 2', 'Oud Al Muteena 2', 68, '2021-06-22 23:49:57', '2021-06-22 23:49:57', 234),
(1298, 'Oud Al Muteena 3', 'Oud Al Muteena 3', 68, '2021-06-22 23:49:57', '2021-06-22 23:49:57', 234),
(1299, 'Al Khaimah Building', 'Al Khaimah Building', 70, '2021-06-22 23:51:37', '2021-06-22 23:51:37', 234),
(1300, 'Business Avenue Tower', 'Business Avenue Tower', 70, '2021-06-22 23:51:37', '2021-06-22 23:51:37', 234),
(1301, 'Deira Business Centre', 'Deira Business Centre', 70, '2021-06-22 23:51:37', '2021-06-22 23:51:37', 234),
(1302, 'Al Warqaa 1', 'Al Warqaa 1', 72, '2021-06-22 23:53:01', '2021-06-22 23:53:01', 234),
(1303, 'Al Warqaa 2', 'Al Warqaa 2', 72, '2021-06-22 23:53:01', '2021-06-22 23:53:01', 234),
(1304, 'Al Warqaa 3', 'Al Warqaa 3', 72, '2021-06-22 23:53:01', '2021-06-22 23:53:01', 234),
(1305, 'Al Warqaa 4', 'Al Warqaa 4', 72, '2021-06-22 23:53:01', '2021-06-22 23:53:01', 234),
(1306, 'Al Warqaa 5', 'Al Warqaa 5', 72, '2021-06-22 23:53:01', '2021-06-22 23:53:01', 234),
(1307, 'Madina Avenues', 'Madina Avenues', 74, '2021-06-22 23:54:35', '2021-06-22 23:54:35', 234),
(1308, 'Amaya Plaza', 'Amaya Plaza', 74, '2021-06-22 23:54:35', '2021-06-22 23:54:35', 234),
(1309, 'Hassani 20', 'Hassani 20', 74, '2021-06-22 23:54:35', '2021-06-22 23:54:35', 234),
(1310, 'Alfa Offices', 'Alfa Offices', 74, '2021-06-22 23:54:35', '2021-06-22 23:54:35', 234),
(1311, 'Saleh Bin Lahej Building', 'Saleh Bin Lahej Building', 74, '2021-06-22 23:54:35', '2021-06-22 23:54:35', 234),
(1312, 'The Nadd Residence', 'The Nadd Residence', 74, '2021-06-22 23:54:35', '2021-06-22 23:54:35', 234),
(1313, 'Nad Al Hamar Tower', 'Nad Al Hamar Tower', 74, '2021-06-22 23:54:35', '2021-06-22 23:54:35', 234),
(1314, 'Nadd Al Hamar Building', 'Nadd Al Hamar Building', 74, '2021-06-22 23:54:35', '2021-06-22 23:54:35', 234),
(1315, 'Al Bahri Gate Residence 1', 'Al Bahri Gate Residence 1', 74, '2021-06-22 23:54:35', '2021-06-22 23:54:35', 234),
(1316, 'Al Bahri Gate Residence 2', 'Al Bahri Gate Residence 2', 74, '2021-06-22 23:54:35', '2021-06-22 23:54:35', 234),
(1317, 'Nadd Rashid Villas', 'Nadd Rashid Villas', 77, '2021-06-22 23:55:59', '2021-06-22 23:55:59', 234),
(1318, 'Al Ghaith 10 Villas', 'Al Ghaith 10 Villas', 77, '2021-06-22 23:55:59', '2021-06-22 23:55:59', 234),
(1319, 'Al Fareej Courtyard', 'Al Fareej Courtyard', 77, '2021-06-22 23:55:59', '2021-06-22 23:55:59', 234),
(1320, 'Al Fattan Sky Towers', 'Al Fattan Sky Towers', 80, '2021-06-22 23:57:57', '2021-06-22 23:57:57', 234),
(1321, 'AJD Building', 'AJD Building', 80, '2021-06-22 23:57:57', '2021-06-22 23:57:57', 234),
(1322, 'Al Khazan Building', 'Al Khazan Building', 80, '2021-06-22 23:57:57', '2021-06-22 23:57:57', 234),
(1323, 'Dubai International Airport Road', 'Dubai International Airport Road', 82, '2021-06-23 00:01:17', '2021-06-23 00:01:17', 234),
(1324, 'Al Fattan Plaza', 'Al Fattan Plaza', 82, '2021-06-23 00:01:17', '2021-06-23 00:01:17', 234),
(1325, 'Dubai Creek Golf And Yacht Club Residences', 'Dubai Creek Golf And Yacht Club Residences', 82, '2021-06-23 00:01:17', '2021-06-23 00:01:17', 234),
(1326, 'Al Ashram Building', 'Al Ashram Building', 82, '2021-06-23 00:01:17', '2021-06-23 00:01:17', 234),
(1327, 'Emitac Building', 'Emitac Building', 82, '2021-06-23 00:01:17', '2021-06-23 00:01:17', 234),
(1328, 'Garhoud Atrium', 'Garhoud Atrium', 82, '2021-06-23 00:01:17', '2021-06-23 00:01:17', 234),
(1329, 'Airport Road Area', 'Airport Road Area', 82, '2021-06-23 00:01:17', '2021-06-23 00:01:17', 234),
(1330, 'Garhoud Views', 'Garhoud Views', 82, '2021-06-23 00:01:17', '2021-06-23 00:01:17', 234),
(1331, 'Dubai Autism Center', 'Dubai Autism Center', 82, '2021-06-23 00:01:17', '2021-06-23 00:01:17', 234),
(1332, 'Bin Thani Avenue Building', 'Bin Thani Avenue Building', 82, '2021-06-23 00:01:17', '2021-06-23 00:01:17', 234),
(1333, 'Al Muhairbi building', 'Al Muhairbi building', 82, '2021-06-23 00:01:17', '2021-06-23 00:01:17', 234),
(1334, 'Al Ghaith 6 Villas', 'Al Ghaith 6 Villas', 82, '2021-06-23 00:01:17', '2021-06-23 00:01:17', 234),
(1335, 'Flora Inn Hotel Dubai Airport', 'Flora Inn Hotel Dubai Airport', 82, '2021-06-23 00:01:17', '2021-06-23 00:01:17', 234),
(1336, 'Dana Al Garhoud', 'Dana Al Garhoud', 82, '2021-06-23 00:01:17', '2021-06-23 00:01:17', 234),
(1337, 'NASA Villas', 'NASA Villas', 82, '2021-06-23 00:01:17', '2021-06-23 00:01:17', 234),
(1338, 'Al Garhoud Block G', 'Al Garhoud Block G', 82, '2021-06-23 00:01:17', '2021-06-23 00:01:17', 234),
(1339, 'Dubai Building Cooperative Society', 'Dubai Building Cooperative Society', 82, '2021-06-23 00:01:17', '2021-06-23 00:01:17', 234),
(1340, 'Manazel Garhoud', 'Manazel Garhoud', 82, '2021-06-23 00:01:17', '2021-06-23 00:01:17', 234),
(1341, 'Grand Mercure Hotel And Residences Dubai Airport', 'Grand Mercure Hotel And Residences Dubai Airport', 82, '2021-06-23 00:01:17', '2021-06-23 00:01:17', 234),
(1342, 'DBCS Building', 'DBCS Building', 82, '2021-06-23 00:01:17', '2021-06-23 00:01:17', 234),
(1343, 'Al Mazroui Building', 'Al Mazroui Building', 82, '2021-06-23 00:01:17', '2021-06-23 00:01:17', 234),
(1344, 'Al Fajer Business Centre', 'Al Fajer Business Centre', 82, '2021-06-23 00:01:17', '2021-06-23 00:01:17', 234),
(1345, 'Harbour Offices', 'Harbour Offices', 86, '2021-06-23 00:03:06', '2021-06-23 00:03:06', 234),
(1346, 'Harbour Residences', 'Harbour Residences', 86, '2021-06-23 00:03:06', '2021-06-23 00:03:06', 234),
(1347, 'Bellagio Residences', 'Bellagio Residences', 86, '2021-06-23 00:03:06', '2021-06-23 00:03:06', 234),
(1348, 'I Dubai', 'I Dubai', 86, '2021-06-23 00:03:06', '2021-06-23 00:03:06', 234),
(1349, 'Paramount Hotel', 'Paramount Hotel', 86, '2021-06-23 00:03:06', '2021-06-23 00:03:06', 234),
(1350, 'Anwa Tower', 'Anwa Tower', 86, '2021-06-23 00:03:06', '2021-06-23 00:03:06', 234),
(1351, 'Al Mina Building', 'Al Mina Building', 88, '2021-06-23 00:06:05', '2021-06-23 00:06:05', 234),
(1352, 'Wasl Port Views', 'Wasl Port Views', 88, '2021-06-23 00:06:05', '2021-06-23 00:06:05', 234),
(1353, 'Al Meena Residence', 'Al Meena Residence', 88, '2021-06-23 00:06:05', '2021-06-23 00:06:05', 234),
(1354, 'Al Hudaiba Awards Building', 'Al Hudaiba Awards Building', 88, '2021-06-23 00:06:05', '2021-06-23 00:06:05', 234),
(1355, 'Hyatt Place Dubai Jumeirah', 'Hyatt Place Dubai Jumeirah', 88, '2021-06-23 00:06:05', '2021-06-23 00:06:05', 234),
(1356, 'Al Manzel', 'Al Manzel', 90, '2021-06-23 00:09:15', '2021-06-23 00:09:15', 234),
(1357, 'Al Sharafi Building', 'Al Sharafi Building', 90, '2021-06-23 00:09:15', '2021-06-23 00:09:15', 234),
(1358, 'Sheikh Hamdan Colony', 'Sheikh Hamdan Colony', 90, '2021-06-23 00:09:15', '2021-06-23 00:09:15', 234),
(1359, 'Karama Shopping Complex', 'Karama Shopping Complex', 90, '2021-06-23 00:09:15', '2021-06-23 00:09:15', 234),
(1360, 'Al Najah Building', 'Al Najah Building', 90, '2021-06-23 00:09:15', '2021-06-23 00:09:15', 234),
(1361, 'Al Dashti Building No. 5', 'Al Dashti Building No. 5', 90, '2021-06-23 00:09:15', '2021-06-23 00:09:15', 234),
(1362, 'Al Telal 7', 'Al Telal 7', 90, '2021-06-23 00:09:15', '2021-06-23 00:09:15', 234),
(1363, 'Karama Centre', 'Karama Centre', 90, '2021-06-23 00:09:15', '2021-06-23 00:09:15', 234),
(1364, 'Wasl Aqua', 'Wasl Aqua', 90, '2021-06-23 00:09:15', '2021-06-23 00:09:15', 234),
(1365, 'Wasl Duet', 'Wasl Duet', 90, '2021-06-23 00:09:15', '2021-06-23 00:09:15', 234),
(1366, 'Wasl Hub', 'Wasl Hub', 90, '2021-06-23 00:09:15', '2021-06-23 00:09:15', 234),
(1367, 'Wasl Onyx', 'Wasl Onyx', 90, '2021-06-23 00:09:15', '2021-06-23 00:09:15', 234),
(1368, 'Wasl Quartz', 'Wasl Quartz', 90, '2021-06-23 00:09:15', '2021-06-23 00:09:15', 234),
(1369, 'Wasl Ruby', 'Wasl Ruby', 90, '2021-06-23 00:09:15', '2021-06-23 00:09:15', 234),
(1370, 'Wasl Topaz', 'Wasl Topaz', 90, '2021-06-23 00:09:15', '2021-06-23 00:09:15', 234),
(1371, 'Wasl Opal', 'Wasl Opal', 90, '2021-06-23 00:09:15', '2021-06-23 00:09:15', 234),
(1372, 'Hamsah A Building', 'Hamsah A Building', 90, '2021-06-23 00:09:15', '2021-06-23 00:09:15', 234),
(1373, 'Al Rais Building', 'Al Rais Building', 90, '2021-06-23 00:09:15', '2021-06-23 00:09:15', 234),
(1374, 'Zainal Mohebi Plaza', 'Zainal Mohebi Plaza', 90, '2021-06-23 00:09:15', '2021-06-23 00:09:15', 234),
(1375, 'Al Yousuf Building', 'Al Yousuf Building', 90, '2021-06-23 00:09:15', '2021-06-23 00:09:15', 234),
(1376, 'Al Habbai Building', 'Al Habbai Building', 90, '2021-06-23 00:09:15', '2021-06-23 00:09:15', 234),
(1377, 'Al Attar Business Centre', 'Al Attar Business Centre', 90, '2021-06-23 00:09:15', '2021-06-23 00:09:15', 234),
(1378, 'Wasl Ivory', 'Wasl Ivory', 90, '2021-06-23 00:09:15', '2021-06-23 00:09:15', 234),
(1379, 'Al Khaleej Building', 'Al Khaleej Building', 90, '2021-06-23 00:09:15', '2021-06-23 00:09:15', 234),
(1380, 'Al Muhairibi Building', 'Al Muhairibi Building', 90, '2021-06-23 00:09:15', '2021-06-23 00:09:15', 234),
(1381, 'Rose 8', 'Rose 8', 90, '2021-06-23 00:09:15', '2021-06-23 00:09:15', 234),
(1382, 'Bin Dhaen Holding Building Karama', 'Bin Dhaen Holding Building Karama', 90, '2021-06-23 00:09:15', '2021-06-23 00:09:15', 234),
(1383, 'Al Karama Building', 'Al Karama Building', 90, '2021-06-23 00:09:15', '2021-06-23 00:09:15', 234),
(1384, 'Montana Building', 'Montana Building', 90, '2021-06-23 00:09:15', '2021-06-23 00:09:15', 234),
(1385, 'Al Waleed 1 Building', 'Al Waleed 1 Building', 90, '2021-06-23 00:09:15', '2021-06-23 00:09:15', 234),
(1386, 'Al Waleed 2 Building', 'Al Waleed 2 Building', 90, '2021-06-23 00:09:15', '2021-06-23 00:09:15', 234),
(1387, 'Al Waleed 5 Building', 'Al Waleed 5 Building', 90, '2021-06-23 00:09:15', '2021-06-23 00:09:15', 234),
(1388, 'Karama Palace Building', 'Karama Palace Building', 90, '2021-06-23 00:09:15', '2021-06-23 00:09:15', 234),
(1389, 'Wasl Pearl Building', 'Wasl Pearl Building', 90, '2021-06-23 00:09:15', '2021-06-23 00:09:15', 234),
(1390, 'Karama New Building', 'Karama New Building', 90, '2021-06-23 00:09:15', '2021-06-23 00:09:15', 234),
(1391, 'Umm Hurair Building', 'Umm Hurair Building', 90, '2021-06-23 00:09:15', '2021-06-23 00:09:15', 234),
(1392, 'Al Khayyal Building 105', 'Al Khayyal Building 105', 90, '2021-06-23 00:09:15', '2021-06-23 00:09:15', 234),
(1393, 'Al Fajer Residence', 'Al Fajer Residence', 90, '2021-06-23 00:09:15', '2021-06-23 00:09:15', 234),
(1394, 'Azizi Aliyah Residence', 'Azizi Aliyah Residence', 92, '2021-06-23 00:10:48', '2021-06-23 00:10:48', 234),
(1395, 'Marriott Executive Apartments', 'Marriott Executive Apartments', 92, '2021-06-23 00:10:48', '2021-06-23 00:10:48', 234),
(1396, 'Emerald Tower', 'Emerald Tower', 92, '2021-06-23 00:10:48', '2021-06-23 00:10:48', 234),
(1397, 'Binghatti Gateway', 'Binghatti Gateway', 92, '2021-06-23 00:10:48', '2021-06-23 00:10:48', 234),
(1398, 'Al Rimmal Residence', 'Al Rimmal Residence', 92, '2021-06-23 00:10:48', '2021-06-23 00:10:48', 234),
(1399, 'Al Waleed Gardens', 'Al Waleed Gardens', 92, '2021-06-23 00:10:48', '2021-06-23 00:10:48', 234),
(1400, 'Binghatti Avenue', 'Binghatti Avenue', 92, '2021-06-23 00:10:48', '2021-06-23 00:10:48', 234),
(1401, 'Orchid Residence', 'Orchid Residence', 92, '2021-06-23 00:10:48', '2021-06-23 00:10:48', 234),
(1402, 'Ayedh Tower', 'Ayedh Tower', 92, '2021-06-23 00:10:48', '2021-06-23 00:10:48', 234),
(1403, 'Khansaheb Residence', 'Khansaheb Residence', 92, '2021-06-23 00:10:48', '2021-06-23 00:10:48', 234),
(1404, 'Lilac Residence', 'Lilac Residence', 92, '2021-06-23 00:10:48', '2021-06-23 00:10:48', 234),
(1405, 'Jaddaf Waterfront', 'Jaddaf Waterfront', 92, '2021-06-23 00:10:48', '2021-06-23 00:10:48', 234),
(1406, 'Battersea Residence', 'Battersea Residence', 92, '2021-06-23 00:10:48', '2021-06-23 00:10:48', 234),
(1407, 'Jaddaf Views', 'Jaddaf Views', 92, '2021-06-23 00:10:48', '2021-06-23 00:10:48', 234),
(1408, 'Jaddaf Place', 'Jaddaf Place', 92, '2021-06-23 00:10:48', '2021-06-23 00:10:48', 234),
(1409, 'Al Durrah 7', 'Al Durrah 7', 92, '2021-06-23 00:10:48', '2021-06-23 00:10:48', 234),
(1410, 'The Dome Building By Tiger Group', 'The Dome Building By Tiger Group', 92, '2021-06-23 00:10:48', '2021-06-23 00:10:48', 234),
(1411, 'Marbella Holiday Homes', 'Marbella Holiday Homes', 92, '2021-06-23 00:10:48', '2021-06-23 00:10:48', 234),
(1412, 'Occidental Al Jaddaf', 'Occidental Al Jaddaf', 92, '2021-06-23 00:10:48', '2021-06-23 00:10:48', 234),
(1413, 'The Probe', 'The Probe', 92, '2021-06-23 00:10:48', '2021-06-23 00:10:48', 234),
(1414, 'Barajeel Residency', 'Barajeel Residency', 92, '2021-06-23 00:10:48', '2021-06-23 00:10:48', 234),
(1415, 'Rose Building', 'Rose Building', 92, '2021-06-23 00:10:48', '2021-06-23 00:10:48', 234),
(1416, 'Devet 1', 'Devet 1', 92, '2021-06-23 00:10:48', '2021-06-23 00:10:48', 234),
(1417, 'Al Khayyal Building 140', 'Al Khayyal Building 140', 92, '2021-06-23 00:10:48', '2021-06-23 00:10:48', 234),
(1418, 'Jadaf Western Residence', 'Jadaf Western Residence', 92, '2021-06-23 00:10:48', '2021-06-23 00:10:48', 234),
(1419, 'Devet 2', 'Devet 2', 92, '2021-06-23 00:10:48', '2021-06-23 00:10:48', 234),
(1420, 'Dubai Healthcare City Phase 2', 'Dubai Healthcare City Phase 2', 92, '2021-06-23 00:10:48', '2021-06-23 00:10:48', 234),
(1421, 'Al Khayyal Building 141', 'Al Khayyal Building 141', 92, '2021-06-23 00:10:48', '2021-06-23 00:10:48', 234),
(1422, 'Noor Al Safa', 'Noor Al Safa', 92, '2021-06-23 00:10:48', '2021-06-23 00:10:48', 234),
(1423, 'Element', 'Element', 92, '2021-06-23 00:10:48', '2021-06-23 00:10:48', 234),
(1424, 'Ras Al Khor Industrial', 'Ras Al Khor Industrial', 114, '2021-06-23 00:13:39', '2021-06-23 00:13:39', 234),
(1425, 'Nad Al Sheba 1', 'Nad Al Sheba 1', 115, '2021-06-23 00:17:21', '2021-06-23 00:17:21', 234),
(1426, 'Nad Al Sheba 2', 'Nad Al Sheba 2', 115, '2021-06-23 00:17:21', '2021-06-23 00:17:21', 234),
(1427, 'Nad Al Sheba 3', 'Nad Al Sheba 3', 115, '2021-06-23 00:17:21', '2021-06-23 00:17:21', 234),
(1428, 'Nad Al Sheba 4', 'Nad Al Sheba 4', 115, '2021-06-23 00:17:21', '2021-06-23 00:17:21', 234),
(1429, 'Sobha City', 'Sobha City', 115, '2021-06-23 00:17:21', '2021-06-23 00:17:21', 234),
(1430, 'API Horizon Pointe', 'API Horizon Pointe', 117, '2021-06-23 00:19:53', '2021-06-23 00:19:53', 234),
(1431, 'H1 Building', 'H1 Building', 118, '2021-06-23 00:21:23', '2021-06-23 00:21:23', 234),
(1432, 'Al Wasl Block A', 'Al Wasl Block A', 118, '2021-06-23 00:21:23', '2021-06-23 00:21:23', 234),
(1433, 'Al Wasl Block B', 'Al Wasl Block B', 118, '2021-06-23 00:21:23', '2021-06-23 00:21:23', 234),
(1434, 'Al Wasl Block C', 'Al Wasl Block C', 118, '2021-06-23 00:21:23', '2021-06-23 00:21:23', 234),
(1435, 'Al Wasl Block D', 'Al Wasl Block D', 118, '2021-06-23 00:21:23', '2021-06-23 00:21:23', 234),
(1436, 'Al Wasl Block E', 'Al Wasl Block E', 118, '2021-06-23 00:21:23', '2021-06-23 00:21:23', 234),
(1437, 'Al Wasl Block F', 'Al Wasl Block F', 118, '2021-06-23 00:21:23', '2021-06-23 00:21:23', 234),
(1438, 'Al Hudaiba Building', 'Al Hudaiba Building', 118, '2021-06-23 00:21:24', '2021-06-23 00:21:24', 234),
(1439, 'Bin Dhaen Holding Building Hudaiba', 'Bin Dhaen Holding Building Hudaiba', 118, '2021-06-23 00:21:24', '2021-06-23 00:21:24', 234),
(1440, 'Wilson Building', 'Wilson Building', 119, '2021-06-23 00:24:22', '2021-06-23 00:24:22', 234),
(1441, 'Chelsea Plaza Hotel', 'Chelsea Plaza Hotel', 119, '2021-06-23 00:24:22', '2021-06-23 00:24:22', 234),
(1442, 'Al Hana Centre', 'Al Hana Centre', 119, '2021-06-23 00:24:22', '2021-06-23 00:24:22', 234),
(1443, 'Al Maskan 2', 'Al Maskan 2', 119, '2021-06-23 00:24:22', '2021-06-23 00:24:22', 234),
(1444, 'Rove Trade Centre', 'Rove Trade Centre', 119, '2021-06-23 00:24:22', '2021-06-23 00:24:22', 234),
(1445, 'Al Ghaith 12 Villas', 'Al Ghaith 12 Villas', 119, '2021-06-23 00:24:22', '2021-06-23 00:24:22', 234),
(1446, 'Al Diyafah Road', 'Al Diyafah Road', 120, '2021-06-23 00:26:12', '2021-06-23 00:26:12', 234),
(1447, 'Satwa Road', 'Satwa Road', 120, '2021-06-23 00:26:12', '2021-06-23 00:26:12', 234),
(1448, 'Makeen Residence Al Satwa', 'Makeen Residence Al Satwa', 120, '2021-06-23 00:26:12', '2021-06-23 00:26:12', 234),
(1449, 'The Flagship One', 'The Flagship One', 120, '2021-06-23 00:26:12', '2021-06-23 00:26:12', 234),
(1450, 'Square 334', 'Square 334', 120, '2021-06-23 00:26:12', '2021-06-23 00:26:12', 234),
(1451, 'Eden House', 'Eden House', 120, '2021-06-23 00:26:12', '2021-06-23 00:26:12', 234),
(1452, 'Bin Dhaen Holding Building Satwa', 'Bin Dhaen Holding Building Satwa', 120, '2021-06-23 00:26:12', '2021-06-23 00:26:12', 234),
(1453, 'Al Zomoroda Building', 'Al Zomoroda Building', 120, '2021-06-23 00:26:12', '2021-06-23 00:26:12', 234),
(1454, 'Adaire 1', 'Adaire 1', 120, '2021-06-23 00:26:12', '2021-06-23 00:26:12', 234),
(1455, 'Cloud 88', 'Cloud 88', 120, '2021-06-23 00:26:12', '2021-06-23 00:26:12', 234),
(1456, 'Al Khair 5', 'Al Khair 5', 120, '2021-06-23 00:26:12', '2021-06-23 00:26:12', 234),
(1457, 'Al Khair Building 1', 'Al Khair Building 1', 120, '2021-06-23 00:26:12', '2021-06-23 00:26:12', 234),
(1458, 'Al Badaa Residences', 'Al Badaa Residences', 120, '2021-06-23 00:26:12', '2021-06-23 00:26:12', 234);

-- --------------------------------------------------------

--
-- Table structure for table `system_templates`
--

CREATE TABLE `system_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('description','email') COLLATE utf8mb4_unicode_ci DEFAULT 'description',
  `description_en` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_ar` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `system_templates`
--

INSERT INTO `system_templates` (`id`, `title`, `type`, `description_en`, `description_ar`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Opportunity Assign', 'email', '<p>Hi there,</p><p>A new opportunity <strong>{OPPORTUNITY_NAME}</strong> &nbsp;has been assigned to you by <strong>{ASSIGNED_BY}</strong>.</p><p>You can view this opportunity by logging in to the portal using the link below.</p><p><br><a href=\"{OPPORTUNITY_URL}\"><strong>View Task</strong></a><br><br>Regards<br>The {SITE_NAME} Team</p>', '<p>Hi there,</p><p>A new task <strong>{TASK_NAME}</strong> &nbsp;has been assigned to you by <strong>{ASSIGNED_BY}</strong>.</p><p>You can view this task by logging in to the portal using the link below.</p><p><br><a href=\"{TASK_URL}\"><strong>View Task</strong></a><br><br>Regards<br>The {SITE_NAME} Team</p>', 'opportunity_assign', '2021-05-09 08:14:36', '2021-05-09 08:14:36'),
(2, 'Lead Task', 'email', '<p>Hi there,</p><p>A new Task <strong>{TASK_NAME}</strong> &nbsp;has been assigned to you by <strong>{ASSIGNED_BY}</strong>.</p><p>You can view this Lead by logging in to the portal using the link below.</p><p><br><a href=\"{TASK_URL}\"><strong>View Task</strong></a><br><br>Regards<br>The {SITE_NAME} Team</p>', '<p>Hi there,</p><p>A new Task <strong>{TASK_NAME}</strong> &nbsp;has been assigned to you by <strong>{ASSIGNED_BY}</strong>.</p><p>You can view this Lead by logging in to the portal using the link below.</p><p><br><a href=\"{TASK_URL}\"><strong>View Task</strong></a><br><br>Regards<br>The {SITE_NAME} Team</p>', 'lead_task', '2021-05-09 08:14:36', '2021-05-09 08:14:36'),
(3, 'Client Task', 'email', '<p>Hi there,</p><p>A new Task <strong>{TASK_NAME}</strong> &nbsp;has been assigned to you by <strong>{ASSIGNED_BY}</strong>.</p><p>You can view this Lead by logging in to the portal using the link below.</p><p><br><a href=\"{TASK_URL}\"><strong>View Task</strong></a><br><br>Regards<br>The {SITE_NAME} Team</p>', '<p>Hi there,</p><p>A new Task <strong>{TASK_NAME}</strong> &nbsp;has been assigned to you by <strong>{ASSIGNED_BY}</strong>.</p><p>You can view this Lead by logging in to the portal using the link below.</p><p><br><a href=\"{TASK_URL}\"><strong>View Task</strong></a><br><br>Regards<br>The {SITE_NAME} Team</p>', 'client_task', '2021-05-09 08:14:36', '2021-05-09 08:14:36'),
(4, 'Opportunity Task', 'email', '<p>Hi there,</p><p>A new Task <strong>{TASK_NAME}</strong> &nbsp;has been assigned to you by <strong>{ASSIGNED_BY}</strong>.</p><p>You can view this opportunity by logging in to the portal using the link below.</p><p><br><a href=\"{TASK_URL}\"><strong>View Task</strong></a><br><br>Regards<br>The {SITE_NAME} Team</p>', '<p>Hi there,</p><p>A new Task <strong>{TASK_NAME}</strong> &nbsp;has been assigned to you by <strong>{ASSIGNED_BY}</strong>.</p><p>You can view this opportunity by logging in to the portal using the link below.</p><p><br><a href=\"{TASK_URL}\"><strong>View Task</strong></a><br><br>Regards<br>The {SITE_NAME} Team</p>', 'opportunity_task', '2021-05-09 08:14:36', '2021-05-09 08:14:36'),
(5, 'Opportunity Result', 'email', '<p>Hi there,</p><p>Opportunity Result Report OF: <strong>{OPPORTUNITY_NAME}</strong> &nbsp;has been updated by <strong>{UPDATED_BY}</strong>.</p><p>The New Update : </p> <p>Status : {STATUS} .</p> <p> Stage : {STAGE}.</p><p>Note :  {NOTE} </p><p>You can view this opportunity by logging in to the portal using the link below.</p><p><br><a href=\"{OPPORTUNITY_URL}\"><strong>View Task</strong></a><br><br>Regards<br>The {SITE_NAME} Team</p>', '<p>Hi there,</p><p>Opportunity Result Report OF: <strong>{OPPORTUNITY_NAME}</strong> &nbsp;has been updated by <strong>{UPDATED_BY}</strong>.</p><p>The New Update : </p> <p>Status : {STATUS} .</p> <p> Stage : {STAGE}.</p><p>Note :  {NOTE} </p><p>You can view this opportunity by logging in to the portal using the link below.</p><p><br><a href=\"{OPPORTUNITY_URL}\"><strong>View Task</strong></a><br><br>Regards<br>The {SITE_NAME} Team</p>', 'opportunity_result', '2021-05-09 08:14:36', '2021-05-09 08:14:36'),
(6, 'Opportunity َQuestion', 'email', '<p>Hi there,</p><p>A new Question Has Been Made By Management : {MADE_BY}.</p><p>Question Is : {QUESTION} .</p><p>Opportunity Name Is : {OPPORTUNITY_NAME} .</p><p>You can view this opportunity by logging in to the portal using the link below.</p><p><br><a href=\"{OPPORTUNITY_URL}\"><strong>View Task</strong></a><br><br>Regards<br>The {SITE_NAME} Team</p>', '<p>Hi there,</p><p>A new Question Has Been Made By Management : {MADE_BY}.</p><p>Question Is : {QUESTION} .</p><p>Opportunity Name Is : {OPPORTUNITY_NAME} .</p><p>You can view this opportunity by logging in to the portal using the link below.</p><p><br><a href=\"{OPPORTUNITY_URL}\"><strong>View Task</strong></a><br><br>Regards<br>The {SITE_NAME} Team</p>', 'opportunity_question', '2021-05-09 08:14:36', '2021-05-09 08:14:36'),
(7, 'Client َQuestion', 'email', '<p>Hi there,</p><p>A new Question Has Been Made By Management : {MADE_BY}.</p><p>Question Is : {QUESTION} .</p><p>Opportunity Name Is : {OPPORTUNITY_NAME} .</p><p>You can view this opportunity by logging in to the portal using the link below.</p><p><br><a href=\"{OPPORTUNITY_URL}\"><strong>View Task</strong></a><br><br>Regards<br>The {SITE_NAME} Team</p>', '<p>Hi there,</p><p>A new Question Has Been Made By Management : {MADE_BY}.</p><p>Question Is : {QUESTION} .</p><p>Opportunity Name Is : {OPPORTUNITY_NAME} .</p><p>You can view this opportunity by logging in to the portal using the link below.</p><p><br><a href=\"{OPPORTUNITY_URL}\"><strong>View Task</strong></a><br><br>Regards<br>The {SITE_NAME} Team</p>', 'client_question', '2021-05-09 08:14:36', '2021-05-09 08:14:36'),
(8, 'Opportunity َAnswer', 'email', '<p>Hi there,</p><p> Answer Has Been Made By : {ANSWERED_BY} To. </p><p>Question : {QUESTION} .</p><p>Answer Is : {Answer} .</p><p>Opportunity Name : {OPPORTUNITY_NAME} .</p><p>You can view this Answer by logging in to the portal using the link below.</p><p><br><a href=\"{OPPORTUNITY_URL}\"><strong>View Task</strong></a><br><br>Regards<br>The {SITE_NAME} Team</p>', '<p>Hi there,</p><p> Answer Has Been Made By : {ANSWERED_BY} To. </p><p>Question : {QUESTION} .</p><p>Answer Is : {Answer} .</p><p>Opportunity Name : {OPPORTUNITY_NAME} .</p><p>You can view this Answer by logging in to the portal using the link below.</p><p><br><a href=\"{OPPORTUNITY_URL}\"><strong>View Task</strong></a><br><br>Regards<br>The {SITE_NAME} Team</p>', 'opportunity_answer', '2021-05-09 08:14:36', '2021-05-09 08:14:36'),
(9, 'Client َAnswer', 'email', '<p>Hi there,</p><p> Answer Has Been Made By : {ANSWERED_BY} To. </p><p>Question : {QUESTION} .</p><p>Answer Is : {Answer} .</p><p>Opportunity Name : {OPPORTUNITY_NAME} .</p><p>You can view this Answer by logging in to the portal using the link below.</p><p><br><a href=\"{OPPORTUNITY_URL}\"><strong>View Task</strong></a><br><br>Regards<br>The {SITE_NAME} Team</p>', '<p>Hi there,</p><p> Answer Has Been Made By : {ANSWERED_BY} To. </p><p>Question : {QUESTION} .</p><p>Answer Is : {Answer} .</p><p>Opportunity Name : {OPPORTUNITY_NAME} .</p><p>You can view this Answer by logging in to the portal using the link below.</p><p><br><a href=\"{OPPORTUNITY_URL}\"><strong>View Task</strong></a><br><br>Regards<br>The {SITE_NAME} Team</p>', 'client_answer', '2021-05-09 08:14:36', '2021-05-09 08:14:36'),
(10, 'Share Request', 'email', '<p> This {AGENCY} Request to share listing with you?</p><a href=\"{ACTION_URL}\">Accept</a><a href=\"{REFUSE_URL}\">Refuse</a><a href=\"{BLOCK_URL}\">block</a>', '<p> This {AGENCY} Request to share listing with you?</p><a href=\"{ACTION_URL}\">Accept</a><a href=\"{REFUSE_URL}\">Refuse</a><a href=\"{BLOCK_URL}\">block</a>', 'share_request', '2021-05-09 08:14:36', '2021-05-09 08:14:36'),
(11, 'Listing Task', 'email', '<p>Hi there,</p><p>A new Task <strong>{TASK_NAME}</strong> &nbsp;has been assigned to you by <strong>{ASSIGNED_BY}</strong>.</p><p>You can view this listing by logging in to the portal using the link below.</p><p><br><a href=\"{TASK_URL}\"><strong>View Task</strong></a><br><br>Regards<br>The {SITE_NAME} Team</p>', '<p>Hi there,</p><p>A new Task <strong>{TASK_NAME}</strong> &nbsp;has been assigned to you by <strong>{ASSIGNED_BY}</strong>.</p><p>You can view this listing by logging in to the portal using the link below.</p><p><br><a href=\"{TASK_URL}\"><strong>View Task</strong></a><br><br>Regards<br>The {SITE_NAME} Team</p>', 'listing_task', '2021-05-09 08:14:36', '2021-05-09 08:14:36');

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
(1, '2021-04-20', '09:32:00', 1, 1, NULL, NULL, 1, 1, 1, NULL, 'after', 'hours', '1', '2021-03-21 21:07:12', '2021-04-20 12:05:07', '2021-04-20 12:05:07', NULL, NULL, NULL, 'opportunity', 2),
(2, '2021-04-14', '05:06:00', 1, 1, NULL, NULL, 1, 1, 1, 'off', 'after', 'hours', '1', '2021-04-14 15:06:41', '2021-04-14 15:11:02', '2021-04-14 15:11:02', NULL, NULL, NULL, 'opportunity', 2),
(3, '2021-04-14', '05:11:00', 1, 1, NULL, NULL, 1, 1, 1, NULL, 'after', 'hours', '1', '2021-04-14 15:12:02', '2021-04-20 12:03:33', NULL, NULL, NULL, NULL, 'opportunity', 2),
(4, '2021-04-20', '09:23:00', 1, 1, NULL, NULL, 1, 1, 1, 'off', 'after', 'hours', '1', '2021-04-20 07:32:52', '2021-04-20 07:59:31', '2021-04-20 07:59:31', NULL, NULL, NULL, 'opportunity', 2),
(5, '2021-04-20', '09:32:00', 2, 2, NULL, NULL, 1, 1, 1, NULL, 'after', 'hours', '1', '2021-04-20 07:59:19', '2021-04-20 11:59:45', NULL, NULL, NULL, NULL, 'opportunity', 2),
(6, '2021-06-07', '12:51:00', 1, 2, NULL, NULL, 1, 1, 1, 'off', 'after', 'hours', '1', '2021-06-07 18:52:05', '2021-06-07 19:30:20', NULL, NULL, NULL, NULL, 'client', 21);

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
(1, 1, 1, 'note', NULL, '2021-04-20 11:15:58', '2021-04-20 11:15:58', NULL),
(2, 1, 1, 'noteeeeeeeee', NULL, '2021-04-20 12:00:09', '2021-04-20 12:00:09', NULL),
(3, 3, 1, 'not second', NULL, '2021-04-20 12:03:33', '2021-04-20 12:03:33', NULL),
(4, 5, 1, 'not first', NULL, '2021-04-20 12:03:42', '2021-04-20 12:03:42', NULL);

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
(3, 'completed_unsuccessful', 'completed_unsuccessful', 'on', 1, 1, NULL, NULL, NULL);

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
(54, 1, 9, NULL, NULL),
(61, 6, 2, NULL, NULL),
(62, 6, 9, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_leads`
--

CREATE TABLE `tbl_leads` (
  `leads_id` bigint(100) NOT NULL,
  `salutaiton` enum('Mr','Mrs','Miss','Ms') DEFAULT NULL,
  `lead_name` varchar(200) NOT NULL,
  `partner_name` varchar(150) DEFAULT NULL,
  `country` varchar(100) NOT NULL DEFAULT '0',
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `assigned` varchar(70) NOT NULL DEFAULT '0',
  `created_time` datetime DEFAULT NULL,
  `modified_time` datetime DEFAULT NULL,
  `lead_status_id` int(11) DEFAULT NULL,
  `lead_source_id` int(11) DEFAULT NULL,
  `po_box` varchar(80) DEFAULT NULL,
  `last_contacted` datetime DEFAULT NULL,
  `date_assigned` date DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile` varchar(80) DEFAULT NULL,
  `last_lead_status_id` int(11) NOT NULL DEFAULT 0,
  `nationality` varchar(100) DEFAULT NULL,
  `lead_category_id` int(11) DEFAULT NULL,
  `phone2` varchar(80) DEFAULT NULL,
  `phone3` varchar(80) DEFAULT NULL,
  `phone4` varchar(80) DEFAULT NULL,
  `skype` varchar(50) DEFAULT NULL,
  `phone` varchar(80) DEFAULT NULL,
  `fax` varchar(80) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `passport_number` varchar(100) DEFAULT NULL,
  `passport_expire` date DEFAULT NULL,
  `email2` varchar(100) DEFAULT NULL,
  `email3` varchar(100) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `organization` varchar(50) DEFAULT NULL,
  `imported_from_email` tinyint(1) DEFAULT NULL,
  `email_integration_uid` varchar(30) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `contact_name` varchar(255) DEFAULT NULL,
  `facebook` varchar(32) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `permission` text DEFAULT NULL,
  `converted_client_id` int(11) DEFAULT NULL,
  `index_no` int(11) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `show_in` enum('in_leads','in_opportunities','in_clients') NOT NULL DEFAULT 'in_leads'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 'Module English', 'الاسم', '2021-03-07 13:40:17', '2021-03-07 13:40:17', 1, 1),
(3, 'PERFECTA CASA', 'حثقبثؤفش ؤشسش', '2021-06-16 17:39:44', '2021-06-16 17:39:44', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `telescope_entries`
--

CREATE TABLE `telescope_entries` (
  `sequence` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `family_hash` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `should_display_on_index` tinyint(1) NOT NULL DEFAULT 1,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `telescope_entries_tags`
--

CREATE TABLE `telescope_entries_tags` (
  `entry_uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `telescope_monitoring`
--

CREATE TABLE `telescope_monitoring` (
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id`, `title`, `type`, `description_en`, `description_ar`, `agency_id`, `business_id`, `deleted_at`, `created_at`, `updated_at`, `slug`, `system`) VALUES
(1, 'Opportunity Assign', 'email', '<p>Hi there,</p><p>A new opportunity <strong>{OPPORTUNITY_NAME}</strong> &nbsp;has been assigned to you by <strong>{ASSIGNED_BY}</strong>.</p><p>You can view this opportunity by logging in to the portal using the link below.</p><p><br><a href=\"{OPPORTUNITY_URL}\"><strong>View Task</strong></a><br><br>Regards<br>The {SITE_NAME} Team</p>', '<p>Hi there,</p><p>A new task <strong>{TASK_NAME}</strong> &nbsp;has been assigned to you by <strong>{ASSIGNED_BY}</strong>.</p><p>You can view this task by logging in to the portal using the link below.</p><p><br><a href=\"{TASK_URL}\"><strong>View Task</strong></a><br><br>Regards<br>The {SITE_NAME} Team</p>', 1, 1, NULL, '2021-03-17 14:31:29', '2021-03-17 16:34:23', 'opportunity_assign', 'yes'),
(2, 'Lead Task', 'email', '<p>Hi there,</p><p>A new Task <strong>{TASK_NAME}</strong> &nbsp;has been assigned to you by <strong>{ASSIGNED_BY}</strong>.</p><p>You can view this Lead by logging in to the portal using the link below.</p><p><br><a href=\"{TASK_URL}\"><strong>View Task</strong></a><br><br>Regards<br>The {SITE_NAME} Team</p>', '<p>Hi there,</p><p>A new Task <strong>{TASK_NAME}</strong> &nbsp;has been assigned to you by <strong>{ASSIGNED_BY}</strong>.</p><p>You can view this Lead by logging in to the portal using the link below.</p><p><br><a href=\"{TASK_URL}\"><strong>View Task</strong></a><br><br>Regards<br>The {SITE_NAME} Team</p>', 1, 1, NULL, '2021-03-17 14:31:29', '2021-03-17 16:34:23', 'lead_task', 'yes'),
(3, 'Opportunity Task', 'email', '<p>Hi there,</p><p>A new Task <strong>{TASK_NAME}</strong> &nbsp;has been assigned to you by <strong>{ASSIGNED_BY}</strong>.</p><p>You can view this opportunity by logging in to the portal using the link below.</p><p><br><a href=\"{TASK_URL}\"><strong>View Task</strong></a><br><br>Regards<br>The {SITE_NAME} Team</p>', '<p>Hi there,</p><p>A new Task <strong>{TASK_NAME}</strong> &nbsp;has been assigned to you by <strong>{ASSIGNED_BY}</strong>.</p><p>You can view this opportunity by logging in to the portal using the link below.</p><p><br><a href=\"{TASK_URL}\"><strong>View Task</strong></a><br><br>Regards<br>The {SITE_NAME} Team</p>', 1, 1, NULL, '2021-03-17 14:31:29', '2021-03-17 16:34:23', 'opportunity_task', 'yes'),
(4, 'Opportunity Result', 'email', '<p>Hi there,</p><p>Opportunity Result Report OF: <strong>{OPPORTUNITY_NAME}</strong> &nbsp;has been updated by <strong>{UPDATED_BY}</strong>.</p><p>The New Update : </p> <p>Status : {STATUS} .</p> <p> Stage : {STAGE}.</p><p>Note :  {NOTE} </p><p>You can view this opportunity by logging in to the portal using the link below.</p><p><br><a href=\"{OPPORTUNITY_URL}\"><strong>View Task</strong></a><br><br>Regards<br>The {SITE_NAME} Team</p>', '<p>Hi there,</p><p>Opportunity Result Report OF: <strong>{OPPORTUNITY_NAME}</strong> &nbsp;has been updated by <strong>{UPDATED_BY}</strong>.</p><p>The New Update : </p> <p>Status : {STATUS} .</p> <p> Stage : {STAGE}.</p><p>Note :  {NOTE} </p><p>You can view this opportunity by logging in to the portal using the link below.</p><p><br><a href=\"{OPPORTUNITY_URL}\"><strong>View Task</strong></a><br><br>Regards<br>The {SITE_NAME} Team</p>', 1, 1, NULL, '2021-03-17 14:31:29', '2021-03-17 16:34:23', 'opportunity_result', 'yes'),
(5, 'Opportunity َQuestion', 'email', '<p>Hi there,</p><p>A new Question Has Been Made By Management : {MADE_BY}.</p>\r\n<p>Question Is : {QUESTION} .</p>\r\n<p>Opportunity Name Is : {OPPORTUNITY_NAME} .</p>\r\n<p>You can view this opportunity by logging in to the portal using the link below.</p><p><br><a href=\"{OPPORTUNITY_URL}\"><strong>View Task</strong></a><br><br>Regards<br>The {SITE_NAME} Team</p>', '<p>Hi there,</p><p>A new Question Has Been Made By Management : {MADE_BY}.</p>\r\n<p>Question Is : {QUESTION} .</p>\r\n<p>Opportunity Name Is : {OPPORTUNITY_NAME} .</p>\r\n<p>You can view this opportunity by logging in to the portal using the link below.</p><p><br><a href=\"{OPPORTUNITY_URL}\"><strong>View Task</strong></a><br><br>Regards<br>The {SITE_NAME} Team</p>', 1, 1, NULL, '2021-03-17 14:31:29', '2021-03-17 16:34:23', 'opportunity_question', 'yes'),
(6, 'Opportunity َAnswer', 'email', '<p>Hi there,</p><p> Answer Has Been Made By : {ANSWERED_BY} To. </p>\r\n<p>Question : {QUESTION} .</p>\r\n<p>Answer Is : {Answer} .</p>\r\n<p>Opportunity Name : {OPPORTUNITY_NAME} .</p>\r\n<p>You can view this Answer by logging in to the portal using the link below.</p><p><br><a href=\"{OPPORTUNITY_URL}\"><strong>View Task</strong></a><br><br>Regards<br>The {SITE_NAME} Team</p>', '<p>Hi there,</p><p> Answer Has Been Made By : {ANSWERED_BY} To. </p>\r\n<p>Question : {QUESTION} .</p>\r\n<p>Answer Is : {Answer} .</p>\r\n<p>Opportunity Name : {OPPORTUNITY_NAME} .</p>\r\n<p>You can view this Answer by logging in to the portal using the link below.</p><p><br><a href=\"{OPPORTUNITY_URL}\"><strong>View Task</strong></a><br><br>Regards<br>The {SITE_NAME} Team</p>', 1, 1, NULL, '2021-03-17 14:31:29', '2021-03-17 16:34:23', 'opportunity_answer', 'yes'),
(7, 'Client Task', 'email', '<p>Hi there,</p><p>A new Task <strong>{TASK_NAME}</strong> &nbsp;has been assigned to you by <strong>{ASSIGNED_BY}</strong>.</p><p>You can view this Lead by logging in to the portal using the link below.</p><p><br><a href=\"{TASK_URL}\"><strong>View Task</strong></a><br><br>Regards<br>The {SITE_NAME} Team</p>', '<p>Hi there,</p><p>A new Task <strong>{TASK_NAME}</strong> &nbsp;has been assigned to you by <strong>{ASSIGNED_BY}</strong>.</p><p>You can view this Lead by logging in to the portal using the link below.</p><p><br><a href=\"{TASK_URL}\"><strong>View Task</strong></a><br><br>Regards<br>The {SITE_NAME} Team</p>', 1, 1, NULL, '2021-06-07 18:52:05', '2021-06-07 18:52:05', 'client_task', 'yes'),
(8, 'desc', 'description', '<p>description</p>', NULL, 1, 1, NULL, '2021-06-07 20:28:42', '2021-06-07 20:28:42', 'desc', 'no');

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
(2, '1-main-608f2cbb49155-1619995835', '1-main-608f2cbb49155-1619995835/emarat-news-2020-08-11-10-01-25-722358.jpg', 'name', '2021-05-02 22:50:35', '2021-05-04 08:25:29'),
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
(36, '1-main-609016c4e3c2b-1620055748', '1-main-609016c4e3c2b-1620055748/DYTytfDW0AAaOyX.jpg', 'another update', '2021-05-03 15:29:08', '2021-05-03 15:29:19'),
(37, '1-main-609104bade6d7-1620116666', '5.png', NULL, '2021-05-04 08:24:26', '2021-05-04 08:24:26'),
(38, '1-main-6093d36a01dc6-1620300650', '10.png', NULL, '2021-05-06 11:30:50', '2021-05-06 11:30:50');

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `borchure` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo_main` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `listing_category_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `temporary_listings_photos`
--

INSERT INTO `temporary_listings_photos` (`id`, `folder`, `main`, `watermark`, `active`, `created_at`, `updated_at`, `borchure`, `photo_main`, `icon`, `listing_category_id`) VALUES
(45, '1-main-60d885512c1db-1624802641', '20200510-15891064615207-129-l.png', 'mainWatermark-20200510-15891064615207-129-l.png', 'watermark', '2021-06-27 14:04:02', '2021-06-27 14:04:05', NULL, 'no', 'icon-20200510-15891064615207-129-l.png', 1),
(46, '1-main-60d885ebe8bef-1624802795', '20200510-15891064615207-129-l.png', 'mainWatermark-20200510-15891064615207-129-l.png', 'watermark', '2021-06-27 14:06:37', '2021-06-27 14:06:43', NULL, 'no', 'icon-20200510-15891064615207-129-l.png', 2),
(47, '1-main-60d887fe4d761-1624803326', '20200510-15891064678662-129-l.png', 'mainWatermark-20200510-15891064678662-129-l.png', 'watermark', '2021-06-27 14:15:27', '2021-06-27 14:15:48', NULL, 'no', 'icon-20200510-15891064678662-129-l.png', 1),
(49, '1-main-60d88dad1ca06-1624804781', '20200510-15891064718071-129-l.png', 'mainWatermark-20200510-15891064718071-129-l.png', 'watermark', '2021-06-27 14:39:42', '2021-06-27 14:39:42', NULL, 'no', 'icon-20200510-15891064718071-129-l.png', NULL),
(50, '1-main-60d98ffa62fda-1624870906', '20200510-15891064615207-129-l.png', 'mainWatermark-20200510-15891064615207-129-l.png', 'watermark', '2021-06-28 09:01:47', '2021-06-28 09:02:22', NULL, 'no', 'icon-20200510-15891064615207-129-l.png', 1),
(51, '1-main-60d99357bf44e-1624871767', '20200510-15891064615207-129-l.png', 'mainWatermark-20200510-15891064615207-129-l.png', 'watermark', '2021-06-28 09:16:08', '2021-06-28 09:16:08', NULL, 'no', 'icon-20200510-15891064615207-129-l.png', NULL),
(52, '1-main-60d9949b40157-1624872091', '20200510-15891064678662-129-l.png', 'mainWatermark-20200510-15891064678662-129-l.png', 'watermark', '2021-06-28 09:21:32', '2021-06-28 09:21:32', NULL, 'no', 'icon-20200510-15891064678662-129-l.png', NULL),
(53, '1-main-60d9950a2a65e-1624872202', '20200510-15891064581413-129-l.png', 'mainWatermark-20200510-15891064581413-129-l.png', 'watermark', '2021-06-28 09:23:23', '2021-06-28 09:23:23', NULL, 'no', 'icon-20200510-15891064581413-129-l.png', NULL),
(54, '1-main-60d9954996781-1624872265', '20200510-15891064615207-129-l.png', 'mainWatermark-20200510-15891064615207-129-l.png', 'watermark', '2021-06-28 09:24:26', '2021-06-28 09:24:26', NULL, 'no', 'icon-20200510-15891064615207-129-l.png', NULL),
(55, '1-main-60d995733ec13-1624872307', '20200510-15891064678662-129-l.png', 'mainWatermark-20200510-15891064678662-129-l.png', 'watermark', '2021-06-28 09:25:08', '2021-06-28 09:25:08', NULL, 'no', 'icon-20200510-15891064678662-129-l.png', NULL),
(56, '1-main-60d995b771eec-1624872375', '20200510-15891064693532-129-l.png', 'mainWatermark-20200510-15891064693532-129-l.png', 'watermark', '2021-06-28 09:26:16', '2021-06-28 09:26:16', NULL, 'no', 'icon-20200510-15891064693532-129-l.png', NULL),
(57, '1-main-60d9c0d1d7914-1624883409', '20200510-15891064693532-129-l.png', 'mainWatermark-20200510-15891064693532-129-l.png', 'watermark', '2021-06-28 12:30:11', '2021-06-28 12:30:22', NULL, 'no', 'icon-20200510-15891064693532-129-l.png', 2),
(58, '1-main-60d9c6634f4e2-1624884835', '20200510-15891064678662-129-l.png', 'mainWatermark-20200510-15891064678662-129-l.png', 'watermark', '2021-06-28 12:53:56', '2021-06-28 12:53:56', NULL, 'no', 'icon-20200510-15891064678662-129-l.png', NULL),
(59, '1-main-60d9c7101644f-1624885008', '20200510-15891064693532-129-l.png', 'mainWatermark-20200510-15891064693532-129-l.png', 'watermark', '2021-06-28 12:56:49', '2021-06-28 12:56:49', NULL, 'no', 'icon-20200510-15891064693532-129-l.png', NULL),
(60, '1-main-60d9c74f5aa93-1624885071', '20200510-15891064722904-129-l.png', 'mainWatermark-20200510-15891064722904-129-l.png', 'watermark', '2021-06-28 12:57:52', '2021-06-28 12:57:52', NULL, 'no', 'icon-20200510-15891064722904-129-l.png', NULL),
(61, '1-main-60d9c7c06b1ae-1624885184', '20200510-15891064615207-129-l.png', 'mainWatermark-20200510-15891064615207-129-l.png', 'watermark', '2021-06-28 12:59:45', '2021-06-28 12:59:55', NULL, 'no', 'icon-20200510-15891064615207-129-l.png', 2);

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
(12, '1-main-60901c6089d4d-1620057184', '1-main-60901c6089d4d-1620057184/4ef72b2d291b2c9de97e6abff6453ade-w750-h500.jpg', NULL, '1-main-60901c6089d4d-1620057184/mainWatermark-4ef72b2d291b2c9de97e6abff6453ade-w750-h500.jpg', 'watermark', '2021-05-03 15:53:05', '2021-05-03 15:53:05'),
(13, '1-main-6090fdd588c9b-1620114901', 'WhatsApp-Image-2020-12-10-at-3.24.27-PM.jpeg', NULL, 'mainWatermark-WhatsApp-Image-2020-12-10-at-3.24.27-PM.jpeg', 'watermark', '2021-05-04 07:55:01', '2021-05-04 07:55:01'),
(14, '1-main-6093bc86357dc-1620294790', '9.png', NULL, 'mainWatermark-9.png', 'watermark', '2021-05-06 09:53:10', '2021-05-06 09:53:10'),
(15, '1-main-6093c203f2fc4-1620296195', '9.png', NULL, 'mainWatermark-9.png', 'watermark', '2021-05-06 10:16:36', '2021-05-06 10:16:36'),
(16, '1-main-6093c261476ff-1620296289', '9.png', NULL, 'mainWatermark-9.png', 'watermark', '2021-05-06 10:18:09', '2021-05-06 10:18:09'),
(17, '1-main-6093c2d757d0b-1620296407', '10.png', NULL, 'mainWatermark-10.png', 'watermark', '2021-05-06 10:20:07', '2021-05-06 10:20:07'),
(18, '1-main-6093c3bac3f56-1620296634', '9.png', NULL, 'mainWatermark-9.png', 'watermark', '2021-05-06 10:23:54', '2021-05-06 10:23:54'),
(20, '1-main-6093c43d10774-1620296765', '9.png', NULL, 'mainWatermark-9.png', 'watermark', '2021-05-06 10:26:05', '2021-05-06 10:26:05'),
(21, '1-main-6093c47a48495-1620296826', '9.png', NULL, 'mainWatermark-9.png', 'watermark', '2021-05-06 10:27:06', '2021-05-06 10:27:06'),
(22, '1-main-6093c4d2e6577-1620296914', '10.png', NULL, 'mainWatermark-10.png', 'watermark', '2021-05-06 10:28:35', '2021-05-06 10:28:56'),
(23, '1-main-6093c6f219c84-1620297458', '10.png', NULL, 'mainWatermark-10.png', 'watermark', '2021-05-06 10:37:38', '2021-05-06 10:37:38'),
(24, '1-main-6093c92cadefd-1620298028', '9.png', 'title', 'mainWatermark-9.png', 'watermark', '2021-05-06 10:47:08', '2021-05-06 10:47:13'),
(25, '1-main-6093c9d7893f8-1620298199', '9.png', 'updated', 'mainWatermark-9.png', 'watermark', '2021-05-06 10:49:59', '2021-05-06 10:50:06'),
(27, '1-main-60a4ed6952ed4-1621421417', '10.png', NULL, 'mainWatermark-10.png', 'watermark', '2021-05-19 10:50:17', '2021-05-19 10:50:17');

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
  `type` enum('owner','staff','moderator','superadmin') COLLATE utf8mb4_unicode_ci DEFAULT 'staff',
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
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'en',
  `default_mode` enum('dark','light') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'light',
  `default_width` enum('fluid','boxed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'fluid',
  `default_position` enum('fixed','scrollable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'fixed',
  `default_sidebar_color` enum('light','dark','brand','gradient') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'light',
  `default_sidebar_size` enum('default','compact','condensed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name_en`, `name_ar`, `brn`, `description_en`, `zip`, `whatsapp`, `skype`, `active`, `type`, `business_id`, `country_code`, `city_code`, `phone`, `cell_code`, `cell`, `fax_country_code`, `fax_city_code`, `staff_fax`, `address`, `image`, `email`, `email_verified_at`, `password`, `remember_token`, `nationality_id`, `agency_id`, `team_id`, `created_at`, `updated_at`, `can_access`, `description_ar`, `language`, `default_mode`, `default_width`, `default_position`, `default_sidebar_color`, `default_sidebar_size`) VALUES
(1, 'Ceo', 'Ceo', NULL, '<p><strong>FOR MORE INFORMATION CALL: Ahmed Amin Amin Ayad &nbsp; BRN:35226</strong> M: +971 55 554 5458&nbsp;| +971 55 1900 600 E: a.ayad@pcasa.ae | info@pcasa.ae</p>', '11762', NULL, NULL, '1', 'owner', 1, '971', '123', '01006143107', NULL, NULL, NULL, NULL, NULL, '10th Ahmed Hassan St. - Nasr City', '1615911177otg-logo-green.png', 'hamed@onetecgroup.com', NULL, '$2y$10$iZfeu3exknfbCL4BsUfXhOA7RtivEqId5bzyLRbQ8NW1eScnMBRaO', NULL, 66, NULL, NULL, '2021-03-07 13:30:03', '2021-07-25 08:11:42', NULL, NULL, 'en', 'light', 'fluid', 'scrollable', 'light', 'default'),
(2, 'staffotg1', 'staffotg1', NULL, NULL, NULL, NULL, NULL, '1', 'staff', 1, NULL, NULL, '6143107', NULL, NULL, NULL, NULL, NULL, NULL, '1615911177otg-logo-green.png', 'shady@onetecgroup.com', NULL, '$2y$10$T254ifcOSPfV.MLfMNkeEeLtWU.bZn/coaiZKHc8Ata44wFTVsPzy', NULL, 3, 1, 1, '2021-03-07 13:30:03', '2021-03-20 23:14:40', '', NULL, 'en', 'light', 'fluid', 'fixed', 'light', 'default'),
(3, 'staffpcasa1', 'staffpcasa1', NULL, NULL, NULL, NULL, NULL, '1', 'moderator', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1615911177otg-logo-green.png', 'mabrouk@onetecgroup.com', NULL, '$2y$10$aMk3ZOJVZVajuDgY3RFpDOpqeVOBlGex7G2IlPaKMgXc0meZJXHXy', NULL, NULL, 2, NULL, '2021-03-07 13:30:03', '2021-03-07 13:30:03', '2,1', NULL, 'en', 'light', 'fluid', 'fixed', 'light', 'default'),
(9, 'mohamed ibrahim hamed', 'mohamed ibrahim hamed', NULL, NULL, '002', NULL, NULL, '1', 'staff', 1, NULL, NULL, '+202027628337', NULL, NULL, NULL, NULL, NULL, 'warraq city', NULL, 'mohamedhamed01127@gmail.com', NULL, '$2y$10$Cd7/E0bf2OW1OoaZ2fwtwOqY4GmnOMvZSZaiwQcXu6VWjU59yPnB6', NULL, 66, 1, NULL, '2021-03-20 23:17:56', '2021-03-20 23:17:56', '1', NULL, 'en', 'light', 'fluid', 'fixed', 'light', 'default'),
(10, 'Ahmed Ayad', 'أحمد عياد', NULL, NULL, NULL, NULL, NULL, '1', 'owner', 2, '971', '55', '555545458', NULL, NULL, NULL, NULL, NULL, NULL, '1623837465Ahmed Amin Amin Ayad Picture.jpg', 'a.ayad@pcasa.ae', NULL, '$2y$10$iZfeu3exknfbCL4BsUfXhOA7RtivEqId5bzyLRbQ8NW1eScnMBRaO', NULL, 66, NULL, NULL, NULL, '2021-06-16 17:57:45', NULL, NULL, 'en', 'light', 'fluid', 'fixed', 'light', 'default'),
(11, 'Karim', 'Karim', NULL, NULL, NULL, NULL, NULL, '1', 'staff', 2, NULL, NULL, '+971 55 577 3337', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'karim@pcasa.ae', NULL, '$2y$10$hLFFV5dRzqt7M4zYgxhJY.R//HGj/Ey0GF/vps835fd1sC4D032Vy', NULL, 66, 3, 3, '2021-06-16 17:20:12', '2021-06-16 18:18:33', '3', NULL, 'en', 'light', 'fluid', 'fixed', 'light', 'default'),
(12, 'Dina', 'يهىش', NULL, NULL, NULL, '+971 50 140 1018', NULL, '1', 'staff', 2, NULL, NULL, '+971 50 140 1018', NULL, NULL, NULL, NULL, NULL, NULL, '1623837568Picture - Dinara Ydyrys Kyzy.jpg', 'dina@pcasa.ae', NULL, '$2y$10$hg1Kyr9dYR//7RcssWmfS.PxWtp7U1Z1Evo95Vf/bC7/w5D0aiXzq', NULL, 119, 3, 3, '2021-06-16 17:49:16', '2021-06-16 17:59:28', '3', NULL, 'en', 'light', 'fluid', 'fixed', 'light', 'default'),
(13, 'Reyad', 'قثغشي', NULL, NULL, NULL, NULL, NULL, '1', 'staff', 2, NULL, NULL, '+971 54 341 0410', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'reyad@pcasa.ae', NULL, '$2y$10$lzR760KA6CSv/wgZmzDx5OVYr3NztcDPLg10xBv6Qv2qqH3FsnURi', NULL, 40, 3, 3, '2021-06-16 17:51:23', '2021-06-16 17:51:23', '3', NULL, 'en', 'light', 'fluid', 'fixed', 'light', 'default'),
(14, 'Shafique', 'ساشبهضعث', NULL, NULL, NULL, '+971 56 142 7076', NULL, '1', 'staff', 2, NULL, NULL, '+971 56 142 7076', NULL, NULL, NULL, NULL, NULL, NULL, '1623837397SHAFIQUE PICTURE.jpeg', 's.hassan@pcasa.ae', NULL, '$2y$10$dfm9GYcZataGF3kcDhtKdeXeX5BI6kDksKbaEgiZQwIZpSGP4In0.', NULL, 167, 3, 3, '2021-06-16 17:56:37', '2021-06-16 17:56:37', '3', NULL, 'en', 'light', 'fluid', 'fixed', 'light', 'default'),
(15, 'Raafat', 'Rafaat', NULL, NULL, NULL, NULL, NULL, '1', 'staff', 2, NULL, NULL, '+971 50 178 6640', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'raafat@pcasa.ae', NULL, '$2y$10$gobLmCU/mdep.weoJotdhO3tCzF5tZLUPeBYiruA1OrNsCG0eaDOS', NULL, 66, 3, 3, '2021-06-16 18:57:03', '2021-06-16 18:57:03', '3', NULL, 'en', 'light', 'fluid', 'fixed', 'light', 'default'),
(16, 'Superadmin', 'Superadmin', NULL, NULL, NULL, NULL, NULL, '1', 'superadmin', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'superadmin@broker.com', NULL, '$2y$10$iZfeu3exknfbCL4BsUfXhOA7RtivEqId5bzyLRbQ8NW1eScnMBRaO', NULL, NULL, 0, NULL, NULL, '2021-06-21 18:01:56', NULL, NULL, 'en', 'light', 'fluid', 'fixed', 'light', 'default');

-- --------------------------------------------------------

--
-- Table structure for table `watermarks`
--

CREATE TABLE `watermarks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transparent` int(11) DEFAULT 50,
  `active` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT 'yes',
  `update_listing` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT 'yes',
  `current` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT 'yes',
  `position` enum('top-left','top','top-right','left','center','right','bottom-left','bottom','bottom-right') COLLATE utf8mb4_unicode_ci DEFAULT 'top-left',
  `agency_id` bigint(20) UNSIGNED DEFAULT NULL,
  `business_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `main_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `width` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `height` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `watermarks`
--

INSERT INTO `watermarks` (`id`, `image`, `name`, `transparent`, `active`, `update_listing`, `current`, `position`, `agency_id`, `business_id`, `created_at`, `updated_at`, `main_image`, `width`, `height`) VALUES
(1, '1623919870-download.jpg', NULL, 10, 'yes', NULL, 'yes', 'center', 1, 1, '2021-05-05 07:15:02', '2021-06-17 16:51:10', NULL, NULL, NULL),
(2, '1623839038-NEW WATERMARK - 70.png', NULL, 100, 'yes', NULL, 'yes', 'center', 3, 2, '2021-06-16 18:21:09', '2021-06-16 18:23:58', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_logs_add_by_foreign` (`add_by`),
  ADD KEY `activity_logs_agency_id_foreign` (`agency_id`),
  ADD KEY `activity_logs_business_id_foreign` (`business_id`);

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
-- Indexes for table `black_lists`
--
ALTER TABLE `black_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `black_lists_agency_id_foreign` (`agency_id`),
  ADD KEY `black_lists_black_listed_agency_id_foreign` (`black_listed_agency_id`);

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
-- Indexes for table `client_notes`
--
ALTER TABLE `client_notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_notes_client_id_foreign` (`client_id`),
  ADD KEY `client_notes_add_by_foreign` (`add_by`);

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
-- Indexes for table `communities`
--
ALTER TABLE `communities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `communities_city_id_foreign` (`city_id`),
  ADD KEY `communities_country_id_foreign` (`country_id`);

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
-- Indexes for table `faild_leads`
--
ALTER TABLE `faild_leads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faild_leads_agency_id_foreign` (`agency_id`);

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
-- Indexes for table `lead_notes`
--
ALTER TABLE `lead_notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lead_notes_lead_id_foreign` (`lead_id`),
  ADD KEY `lead_notes_add_by_foreign` (`add_by`);

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
  ADD KEY `listings_type_id_foreign` (`type_id`),
  ADD KEY `listings_added_by_foreign` (`added_by`);

--
-- Indexes for table `listing_categories`
--
ALTER TABLE `listing_categories`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `listing_notes`
--
ALTER TABLE `listing_notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `listing_notes_listing_id_foreign` (`listing_id`),
  ADD KEY `listing_notes_add_by_foreign` (`add_by`);

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
-- Indexes for table `opportunity_contract_documents`
--
ALTER TABLE `opportunity_contract_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `opportunity_contract_documents_opportunity_contract_id_foreign` (`opportunity_contract_id`),
  ADD KEY `opportunity_contract_documents_opportunity_id_foreign` (`opportunity_id`),
  ADD KEY `opportunity_contract_documents_agency_id_foreign` (`agency_id`),
  ADD KEY `opportunity_contract_documents_business_id_foreign` (`business_id`);

--
-- Indexes for table `opportunity_contract_recurrings`
--
ALTER TABLE `opportunity_contract_recurrings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `opportunity_contract_recurrings_opportunity_contract_id_foreign` (`opportunity_contract_id`),
  ADD KEY `opportunity_contract_recurrings_opportunity_id_foreign` (`opportunity_id`),
  ADD KEY `opportunity_contract_recurrings_agency_id_foreign` (`agency_id`),
  ADD KEY `opportunity_contract_recurrings_business_id_foreign` (`business_id`);

--
-- Indexes for table `opportunity_notes`
--
ALTER TABLE `opportunity_notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `opportunity_notes_opportunity_id_foreign` (`opportunity_id`),
  ADD KEY `opportunity_notes_add_by_foreign` (`add_by`);

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
-- Indexes for table `opportunity_temp_contracts`
--
ALTER TABLE `opportunity_temp_contracts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `opportunity_temp_contracts_opportunity_id_foreign` (`opportunity_id`),
  ADD KEY `opportunity_temp_contracts_converted_by_foreign` (`converted_by`),
  ADD KEY `opportunity_temp_contracts_agency_id_foreign` (`agency_id`),
  ADD KEY `opportunity_temp_contracts_business_id_foreign` (`business_id`);

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
-- Indexes for table `portal_listings`
--
ALTER TABLE `portal_listings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `portal_listings_listing_id_foreign` (`listing_id`),
  ADD KEY `portal_listings_portal_id_foreign` (`portal_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `requests_sender_id_foreign` (`sender_id`),
  ADD KEY `requests_receiver_id_foreign` (`receiver_id`);

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
-- Indexes for table `statistics`
--
ALTER TABLE `statistics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `statistics_agency_id_foreign` (`agency_id`),
  ADD KEY `statistics_business_id_foreign` (`business_id`);

--
-- Indexes for table `sub_communities`
--
ALTER TABLE `sub_communities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_communities_community_id_foreign` (`community_id`),
  ADD KEY `sub_communities_country_id_foreign` (`country_id`);

--
-- Indexes for table `system_templates`
--
ALTER TABLE `system_templates`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tbl_leads`
--
ALTER TABLE `tbl_leads`
  ADD PRIMARY KEY (`leads_id`),
  ADD KEY `name` (`lead_name`),
  ADD KEY `email` (`email`),
  ADD KEY `assigned` (`assigned`),
  ADD KEY `status` (`lead_status_id`),
  ADD KEY `source` (`lead_source_id`),
  ADD KEY `lastcontact` (`last_contacted`),
  ADD KEY `dateadded` (`created_time`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_agency_id_foreign` (`agency_id`),
  ADD KEY `teams_business_id_foreign` (`business_id`);

--
-- Indexes for table `telescope_entries`
--
ALTER TABLE `telescope_entries`
  ADD PRIMARY KEY (`sequence`),
  ADD UNIQUE KEY `telescope_entries_uuid_unique` (`uuid`),
  ADD KEY `telescope_entries_batch_id_index` (`batch_id`),
  ADD KEY `telescope_entries_family_hash_index` (`family_hash`),
  ADD KEY `telescope_entries_created_at_index` (`created_at`),
  ADD KEY `telescope_entries_type_should_display_on_index_index` (`type`,`should_display_on_index`);

--
-- Indexes for table `telescope_entries_tags`
--
ALTER TABLE `telescope_entries_tags`
  ADD KEY `telescope_entries_tags_entry_uuid_tag_index` (`entry_uuid`,`tag`),
  ADD KEY `telescope_entries_tags_tag_index` (`tag`);

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
-- Indexes for table `watermarks`
--
ALTER TABLE `watermarks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `watermarks_agency_id_foreign` (`agency_id`),
  ADD KEY `watermarks_business_id_foreign` (`business_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `agencies`
--
ALTER TABLE `agencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT for table `black_lists`
--
ALTER TABLE `black_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `businesses`
--
ALTER TABLE `businesses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `calls`
--
ALTER TABLE `calls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `call_status`
--
ALTER TABLE `call_status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `client_contracts`
--
ALTER TABLE `client_contracts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `client_notes`
--
ALTER TABLE `client_notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client_questions`
--
ALTER TABLE `client_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `communities`
--
ALTER TABLE `communities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=665;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contract_recurring`
--
ALTER TABLE `contract_recurring`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=254;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `developers`
--
ALTER TABLE `developers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `email_logs`
--
ALTER TABLE `email_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `email_notifies`
--
ALTER TABLE `email_notifies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT for table `faild_leads`
--
ALTER TABLE `faild_leads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `floor_plans`
--
ALTER TABLE `floor_plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `image_banks`
--
ALTER TABLE `image_banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121129;

--
-- AUTO_INCREMENT for table `lead_communications`
--
ALTER TABLE `lead_communications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lead_notes`
--
ALTER TABLE `lead_notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lead_priorities`
--
ALTER TABLE `lead_priorities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lead_property`
--
ALTER TABLE `lead_property`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lead_qualifications`
--
ALTER TABLE `lead_qualifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lead_sources`
--
ALTER TABLE `lead_sources`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `lead_types`
--
ALTER TABLE `lead_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `listings`
--
ALTER TABLE `listings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `listing_categories`
--
ALTER TABLE `listing_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `listing_cheque_calculator`
--
ALTER TABLE `listing_cheque_calculator`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
-- AUTO_INCREMENT for table `listing_notes`
--
ALTER TABLE `listing_notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `listing_photos`
--
ALTER TABLE `listing_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `listing_plans`
--
ALTER TABLE `listing_plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `listing_rent_cheques`
--
ALTER TABLE `listing_rent_cheques`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `listing_types`
--
ALTER TABLE `listing_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `listing_videos`
--
ALTER TABLE `listing_videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `listing_views`
--
ALTER TABLE `listing_views`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mail_lists`
--
ALTER TABLE `mail_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=314;

--
-- AUTO_INCREMENT for table `opportunities`
--
ALTER TABLE `opportunities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `opportunity_assign_tracking`
--
ALTER TABLE `opportunity_assign_tracking`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `opportunity_contract_documents`
--
ALTER TABLE `opportunity_contract_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `opportunity_contract_recurrings`
--
ALTER TABLE `opportunity_contract_recurrings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `opportunity_notes`
--
ALTER TABLE `opportunity_notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `opportunity_questions`
--
ALTER TABLE `opportunity_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `opportunity_results`
--
ALTER TABLE `opportunity_results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `opportunity_stages`
--
ALTER TABLE `opportunity_stages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `opportunity_temp_contracts`
--
ALTER TABLE `opportunity_temp_contracts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `permission_groups`
--
ALTER TABLE `permission_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `portals`
--
ALTER TABLE `portals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `portal_listings`
--
ALTER TABLE `portal_listings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `statistics`
--
ALTER TABLE `statistics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_communities`
--
ALTER TABLE `sub_communities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1459;

--
-- AUTO_INCREMENT for table `system_templates`
--
ALTER TABLE `system_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `task_notes`
--
ALTER TABLE `task_notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `task_statuses`
--
ALTER TABLE `task_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `task_types`
--
ALTER TABLE `task_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `task_user`
--
ALTER TABLE `task_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `tbl_leads`
--
ALTER TABLE `tbl_leads`
  MODIFY `leads_id` bigint(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `telescope_entries`
--
ALTER TABLE `telescope_entries`
  MODIFY `sequence` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `temporary_listings_documents`
--
ALTER TABLE `temporary_listings_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `temporary_listings_photos`
--
ALTER TABLE `temporary_listings_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `temporary_listings_plans`
--
ALTER TABLE `temporary_listings_plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `watermarks`
--
ALTER TABLE `watermarks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD CONSTRAINT `activity_logs_add_by_foreign` FOREIGN KEY (`add_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `activity_logs_agency_id_foreign` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `activity_logs_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `black_lists`
--
ALTER TABLE `black_lists`
  ADD CONSTRAINT `black_lists_agency_id_foreign` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `black_lists_black_listed_agency_id_foreign` FOREIGN KEY (`black_listed_agency_id`) REFERENCES `agencies` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `client_notes`
--
ALTER TABLE `client_notes`
  ADD CONSTRAINT `client_notes_add_by_foreign` FOREIGN KEY (`add_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `client_notes_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `communities`
--
ALTER TABLE `communities`
  ADD CONSTRAINT `communities_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `communities_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `faild_leads`
--
ALTER TABLE `faild_leads`
  ADD CONSTRAINT `faild_leads_agency_id_foreign` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `lead_notes`
--
ALTER TABLE `lead_notes`
  ADD CONSTRAINT `lead_notes_add_by_foreign` FOREIGN KEY (`add_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lead_notes_lead_id_foreign` FOREIGN KEY (`lead_id`) REFERENCES `leads` (`id`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `listings_added_by_foreign` FOREIGN KEY (`added_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
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
-- Constraints for table `listing_notes`
--
ALTER TABLE `listing_notes`
  ADD CONSTRAINT `listing_notes_add_by_foreign` FOREIGN KEY (`add_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `listing_notes_listing_id_foreign` FOREIGN KEY (`listing_id`) REFERENCES `listings` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `opportunity_contract_documents`
--
ALTER TABLE `opportunity_contract_documents`
  ADD CONSTRAINT `opportunity_contract_documents_agency_id_foreign` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `opportunity_contract_documents_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `opportunity_contract_documents_opportunity_contract_id_foreign` FOREIGN KEY (`opportunity_contract_id`) REFERENCES `opportunity_temp_contracts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `opportunity_contract_documents_opportunity_id_foreign` FOREIGN KEY (`opportunity_id`) REFERENCES `opportunities` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `opportunity_contract_recurrings`
--
ALTER TABLE `opportunity_contract_recurrings`
  ADD CONSTRAINT `opportunity_contract_recurrings_agency_id_foreign` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `opportunity_contract_recurrings_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `opportunity_contract_recurrings_opportunity_contract_id_foreign` FOREIGN KEY (`opportunity_contract_id`) REFERENCES `opportunity_temp_contracts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `opportunity_contract_recurrings_opportunity_id_foreign` FOREIGN KEY (`opportunity_id`) REFERENCES `opportunities` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `opportunity_notes`
--
ALTER TABLE `opportunity_notes`
  ADD CONSTRAINT `opportunity_notes_add_by_foreign` FOREIGN KEY (`add_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `opportunity_notes_opportunity_id_foreign` FOREIGN KEY (`opportunity_id`) REFERENCES `opportunities` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `opportunity_temp_contracts`
--
ALTER TABLE `opportunity_temp_contracts`
  ADD CONSTRAINT `opportunity_temp_contracts_agency_id_foreign` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `opportunity_temp_contracts_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `opportunity_temp_contracts_converted_by_foreign` FOREIGN KEY (`converted_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `opportunity_temp_contracts_opportunity_id_foreign` FOREIGN KEY (`opportunity_id`) REFERENCES `opportunities` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_permission_group_id_foreign` FOREIGN KEY (`permission_group_id`) REFERENCES `permission_groups` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `portal_listings`
--
ALTER TABLE `portal_listings`
  ADD CONSTRAINT `portal_listings_listing_id_foreign` FOREIGN KEY (`listing_id`) REFERENCES `listings` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `portal_listings_portal_id_foreign` FOREIGN KEY (`portal_id`) REFERENCES `portals` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `agencies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `requests_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `agencies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `statistics`
--
ALTER TABLE `statistics`
  ADD CONSTRAINT `statistics_agency_id_foreign` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `statistics_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_communities`
--
ALTER TABLE `sub_communities`
  ADD CONSTRAINT `sub_communities_community_id_foreign` FOREIGN KEY (`community_id`) REFERENCES `communities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sub_communities_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `telescope_entries_tags`
--
ALTER TABLE `telescope_entries_tags`
  ADD CONSTRAINT `telescope_entries_tags_entry_uuid_foreign` FOREIGN KEY (`entry_uuid`) REFERENCES `telescope_entries` (`uuid`) ON DELETE CASCADE;

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

--
-- Constraints for table `watermarks`
--
ALTER TABLE `watermarks`
  ADD CONSTRAINT `watermarks_agency_id_foreign` FOREIGN KEY (`agency_id`) REFERENCES `agencies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `watermarks_business_id_foreign` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
