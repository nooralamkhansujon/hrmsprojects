-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Aug 25, 2021 at 01:01 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrms`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Reed Klein', 1, '2021-08-17 22:41:09', '2021-08-22 09:13:39'),
(3, 'Queenie Ondricka Sr.', 1, '2021-08-17 22:41:09', '2021-08-17 22:41:09'),
(4, 'Garrett Huels', 1, '2021-08-17 22:41:09', '2021-08-17 22:41:09'),
(5, 'Dr. Lori Roberts', 1, '2021-08-17 22:41:09', '2021-08-17 22:41:09'),
(6, 'Aliza Marvin', 1, '2021-08-17 22:41:09', '2021-08-18 05:38:06'),
(8, 'Gonzalo White III', 1, '2021-08-17 22:41:09', '2021-08-17 22:41:09'),
(9, 'Ms. Mariam Kunde', 1, '2021-08-17 22:41:09', '2021-08-17 22:41:09'),
(10, 'Aletha Johnston', 1, '2021-08-17 22:41:09', '2021-08-17 22:41:09'),
(11, 'Web development', 1, '2021-08-22 09:13:55', '2021-08-22 09:13:55');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `education_level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `major_group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institute` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `result_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `result` decimal(40,2) NOT NULL,
  `passing_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `achievement` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `education_level`, `major_group`, `institute`, `country`, `result_type`, `result`, `passing_year`, `duration`, `achievement`, `employee_id`, `created_at`, `updated_at`) VALUES
(1, 'asdfasdf', 'asdfdsf', 'dsfsdf', 'dfssdfdsf', 'asdfsdf', '4.30', '2016', '4', 'kularaura', 1, '2021-08-18 05:55:41', '2021-08-18 05:55:41'),
(2, 'asdfasdf', 'asdfdsf', 'dsfsdf', 'dfssdfdsf', 'asdfsdf', '4.30', '2016', '4', 'nothing', 3, '2021-08-18 08:53:57', '2021-08-18 08:53:57'),
(3, 'asdfasdf', 'asdfdsf', 'dsfsdf', 'dfssdfdsf', 'asdfsdf', '4.30', '2016', '4', 'nothing', 4, '2021-08-25 07:13:22', '2021-08-25 07:13:22');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_status` tinyint(4) NOT NULL DEFAULT 1,
  `employee_department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `basic_salary` decimal(50,2) NOT NULL,
  `gross_salary` decimal(50,2) NOT NULL,
  `tin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emergency_mobile_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `joining_date` date NOT NULL,
  `father_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blood_group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_account_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weekly_off_day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permanent_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `present_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `employee_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `employee_name`, `employee_id`, `employee_status`, `employee_department`, `designation`, `basic_salary`, `gross_salary`, `tin`, `employee_image`, `mobile_number`, `emergency_mobile_number`, `email`, `joining_date`, `father_name`, `mother_name`, `nid_number`, `religion`, `blood_group`, `gender`, `bank_name`, `bank_account_number`, `weekly_off_day`, `permanent_address`, `present_address`, `created_at`, `updated_at`, `employee_type`) VALUES
(1, 'Atikul khan', 'tinsksdaflkasdfjklasd', 1, '5', 'web developer', '43434.00', '4434.00', '24213412', '1629698432employee.jpg', '01725760300', '01725760300', 'fahimkhanmpi373950@gmail.com', '2021-08-17', 'safdadsf', 'asdfasdf', 'asdfsadf', 'hinduism', 'AB', 'female', 'gsasdfsdf', 'sdfsdf', 'saturday', 'kularaura', 'kularaura', '2021-08-18 05:55:41', '2021-08-23 08:05:59', 'Junior web developer'),
(3, 'jakir khan', 'hLfyL6n4M8fJ6GF89VtBz80AoQyFr8ug7lClR77yvSdxdLWweh', 0, '8', 'web developer', '43434.00', '4434.00', '24213412sfdasdf', '1629276837employee.png', '01725760300', '01725760300', 'fahimkhanmpi373950@gmail.com', '2021-08-17', 'safdadsf', 'asdfasdf', 'asdfsadf', 'hinduism', 'AB', 'male', 'gsasdfsdf', 'sdfsdf', 'friday', 'dfasfs', 'asdfasdfsf', '2021-08-18 08:53:57', '2021-08-18 08:53:57', 'Junior web developer'),
(4, 'Rafikul Islam', 'U34SXBybJIMfaOvYqgUe', 1, '3', 'web developer', '43434.00', '4434.00', '24213412sdfadssd', '1629875602employee.png', '01725760301', '01725760302', 'fahimkhanmpi373@gmail.com', '2021-08-24', 'safdadsf', 'asdfasdf', 'asdfsadf', 'islam', 'B', 'male', 'gsasdfsdf', 'sdfsdf', 'saturday', 'Kulaura,Moulvibazar', 'Kulaura,Moulvibazar', '2021-08-25 07:13:22', '2021-08-25 07:13:22', 'Junior web developer');

-- --------------------------------------------------------

--
-- Table structure for table `experiences`
--

CREATE TABLE `experiences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` int(10) UNSIGNED NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position_held` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsibility` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience_area` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `company_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `experiences`
--

INSERT INTO `experiences` (`id`, `company_name`, `employee_id`, `department`, `position_held`, `responsibility`, `experience_area`, `from_date`, `to_date`, `company_address`, `created_at`, `updated_at`) VALUES
(1, 'asdfasd', 1, 'Web Development', 'asdfasdf', 'asdfasdf', 'asdfasdf', '2021-08-24', '2021-08-31', 'asdfasdf', '2021-08-18 05:55:41', '2021-08-18 05:55:41'),
(2, 'asdfasdf', 3, 'Web Development', 'asdfasdf', 'asdfasdf', 'asdfsdf', '2021-08-02', '2021-08-26', 'adsfasdfasf', '2021-08-18 08:53:57', '2021-08-18 08:53:57'),
(3, 'Adn Edu Services Ltd', 4, 'Web Development', 'asdfasdf', 'asdfasdf', 'asdfasdf', '2021-08-24', '2021-08-25', 'asdfasdf', '2021-08-25 07:13:22', '2021-08-25 07:13:22');

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `holiday_type_id` bigint(20) UNSIGNED NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `days` int(11) NOT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `holiday_types`
--

CREATE TABLE `holiday_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `holiday_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `leave_type_id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `days` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `remarks` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `leave_type_id`, `employee_id`, `date_from`, `date_to`, `days`, `reason`, `status`, `remarks`, `created_at`, `updated_at`) VALUES
(56, 12, 1, '2021-08-24', '2021-08-26', '2', 'Marri definition at Dictionary.com, a free online dictionary with pronunciation, synonyms and translation. Look it up now!', 1, 'Marri definition at Dictionary.com, a free online dictionary with pronunciation, synonyms and translation. Look it up now!', '2021-08-25 06:17:44', '2021-08-25 06:21:50'),
(59, 12, 1, '2021-08-24', '2021-08-26', '2', 'Marri definition at Dictionary.com, a free online dictionary with pronunciation, synonyms and translation. Look it up now!', 1, 'Marri definition at Dictionary.com, a free online dictionary with pronunciation, synonyms and translation. Look it up now!', '2021-08-25 06:41:20', '2021-08-25 06:41:20');

-- --------------------------------------------------------

--
-- Table structure for table `leave_types`
--

CREATE TABLE `leave_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `leave_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_types`
--

INSERT INTO `leave_types` (`id`, `leave_type`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Miss Christine Gutkowski IV', 'Saepe ratione sunt at consectetur suscipit. A nisi deleniti non optio. Nihil voluptatem magnam enim. Quia harum est porro ut.', 1, '2021-08-23 09:52:23', '2021-08-25 05:38:49'),
(2, 'Miss Callie Ullrich', 'Asperiores sequi earum a aspernatur sunt iste quia nihil. Ducimus minus error ducimus velit. Aspernatur sequi ipsam ut non molestiae sed soluta. Quae facere molestiae doloremque sunt.', 0, '2021-08-23 09:52:23', '2021-08-25 05:38:58'),
(5, 'Nia Cummings', 'Tenetur beatae numquam eveniet. Magni a cumque praesentium. Animi sint aspernatur saepe dolorum tenetur aperiam. Et ad qui dolorem et et deserunt.', 1, '2021-08-23 09:52:23', '2021-08-23 09:52:23'),
(6, 'Craig Cassin', 'Illum non dolorum minima. Suscipit eum repellat dolores sed omnis exercitationem aut impedit. Et officia ea expedita ut explicabo.', 1, '2021-08-23 09:52:23', '2021-08-23 09:52:23'),
(10, 'Mr. Kraig Ankunding DDS', 'In unde necessitatibus beatae esse nesciunt aut. Ipsa nulla quisquam maiores et. Consequatur magni architecto excepturi.', 1, '2021-08-23 09:52:23', '2021-08-23 09:52:23'),
(11, 'Marriage Leave', 'Marri definition at Dictionary.com, a free online dictionary with pronunciation, synonyms and translation. Look it up now!', 1, '2021-08-25 05:49:41', '2021-08-25 05:49:41'),
(12, 'Fever Leave', 'Marri definition at Dictionary.com, a free online dictionary with pronunciation, synonyms and translation. Look it up now!', 1, '2021-08-25 05:56:03', '2021-08-25 05:56:03'),
(14, 'Refreshing Leave', 'Marri definition at Dictionary.com, a free online dictionary with pronunciation, synonyms and translation. Look it up now!', 1, '2021-08-25 05:58:25', '2021-08-25 05:58:25');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_08_03_103112_create_roles_table', 1),
(6, '2021_08_04_084009_create_employees_table', 1),
(7, '2021_08_04_084116_create_education_table', 1),
(8, '2021_08_04_084240_create_trainings_table', 1),
(9, '2021_08_04_084334_create_experiences_table', 1),
(10, '2021_08_04_084358_create_relatives_table', 1),
(11, '2021_08_04_084420_create_references_table', 1),
(12, '2021_08_04_084439_create_promotions_table', 1),
(13, '2021_08_05_061233_add_employee_type_column_in_employee_table', 1),
(14, '2021_08_09_063505_create_departments_table', 1),
(16, '2021_08_18_135422_add_employee_id_columns_in_employees_table', 2),
(19, '2021_08_23_120308_create_leaves_table', 3),
(20, '2021_08_23_121611_create_leave_types_table', 3),
(25, '2021_08_25_145946_create_holidays_table', 4),
(26, '2021_08_25_150508_create_holiday_types_table', 4);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'Hrms managements', '893aa2dcf16fe7d2ae4432833c84b0e5159a4c9acf4b446f92ea213683204095', '[\"*\"]', '2021-08-24 11:31:22', '2021-08-18 04:48:54', '2021-08-24 11:31:22'),
(2, 'App\\Models\\User', 1, 'Hrms managements', '973e12209cf117dd573961cc6a3b70849fdb0bfd760e96cc21fb44f35e09a9c4', '[\"*\"]', '2021-08-25 08:56:20', '2021-08-25 04:08:07', '2021-08-25 08:56:20');

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(10) UNSIGNED DEFAULT NULL,
  `employee_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `promotion_date` date DEFAULT NULL,
  `previous_designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `new_designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `previous_grade` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `new_degree` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `previous_promotion_date` date DEFAULT NULL,
  `previous_basic` decimal(50,2) DEFAULT NULL,
  `new_basic` decimal(50,2) DEFAULT NULL,
  `previous_gross` decimal(50,2) DEFAULT NULL,
  `increment_amount` decimal(50,2) DEFAULT NULL,
  `effect_date` date DEFAULT NULL,
  `refference_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`id`, `employee_id`, `employee_name`, `promotion_date`, `previous_designation`, `new_designation`, `previous_grade`, `new_degree`, `previous_promotion_date`, `previous_basic`, `new_basic`, `previous_gross`, `increment_amount`, `effect_date`, `refference_no`, `approved`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, '2021-08-26', 'asdfasdf', NULL, NULL, 'adsfasdf', '2021-08-31', '343434.00', '4242342.00', '12343241.00', '3434.00', '2021-08-26', 'UfCg6cd2PMp8cZRYrMiG7GrCuR4qKwQrYOXU1Nrf', 0, '2021-08-18 05:55:41', '2021-08-18 05:55:41'),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'z1Iz8HRU3kUFtnfJ6BIXvja7tBeCgoHTZ1G6tfqj', 0, '2021-08-18 08:53:57', '2021-08-18 08:53:57'),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdVFpvyboigtUEO43Ho57CwDEz5clc0N7RW6Eyar', 0, '2021-08-25 07:13:22', '2021-08-25 07:13:22');

-- --------------------------------------------------------

--
-- Table structure for table `references`
--

CREATE TABLE `references` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organization` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `references`
--

INSERT INTO `references` (`id`, `employee_id`, `name`, `organization`, `relation`, `address`, `email`, `phone_number`, `created_at`, `updated_at`) VALUES
(1, 1, 'afasdf', 'adfadsf', 'adsfasf', 'sadfasdf', 'fahim@gmail.com', '01725760300', '2021-08-18 05:55:41', '2021-08-18 05:55:41'),
(2, 3, 'afasdf', 'adfadsf', 'adsfasf', 'asdfasdfs', 'fahim@gmail.com', '01725760300', '2021-08-18 08:53:57', '2021-08-18 08:53:57'),
(3, 4, 'afasdf', 'adfadsf', 'adsfasf', 'Kulaura,Moulvibazar', 'fahims@gmail.com', '01725760306', '2021-08-25 07:13:22', '2021-08-25 07:13:22');

-- --------------------------------------------------------

--
-- Table structure for table `relatives`
--

CREATE TABLE `relatives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` int(10) UNSIGNED NOT NULL,
  `relation_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `occupation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `relatives`
--

INSERT INTO `relatives` (`id`, `name`, `employee_id`, `relation_type`, `occupation`, `gender`, `address`, `contact_number`, `created_at`, `updated_at`) VALUES
(1, 'dsfsdf', 1, 'dfsdfsf', 'sdfsdf', 'male', 'sdasdfs', '01725760300', '2021-08-18 05:55:41', '2021-08-18 05:55:41'),
(2, 'dsfsdf', 3, 'dfsdfsf', 'sdfsdf', 'male', 'asdfasdf', '01725760300', '2021-08-18 08:53:57', '2021-08-18 08:53:57'),
(3, 'dsfsdf', 4, 'dfsdfsf', 'sdfsdf', 'male', 'Kulaura,Moulvibazar', '01725760304', '2021-08-25 07:13:22', '2021-08-25 07:13:22');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trainings`
--

CREATE TABLE `trainings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `training_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `topics_covered` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institute` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `training_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `training_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trainings`
--

INSERT INTO `trainings` (`id`, `training_title`, `topics_covered`, `institute`, `training_type`, `country`, `location`, `training_year`, `duration`, `employee_id`, `created_at`, `updated_at`) VALUES
(1, 'asdfasdf', 'asdfasdf', 'asdfasdf', 'asdf', 'asdfsdf', 'adsfasdf', 'dsfasdf', '2021-08-26 to 2021-09-11', 1, '2021-08-18 05:55:41', '2021-08-18 05:55:41'),
(2, 'dfasdfa', 'asdfasdf', 'asdfadsf', 'adsfasdf', 'asdfsdf', 'adsfsdf', 'asdfasdf', '2021-08-19 to 2021-09-11', 3, '2021-08-18 08:53:57', '2021-08-18 08:53:57'),
(3, 'Web development Internship', 'PHP/Laravel', 'Excelit Ai', 'software Engineer', 'Bangladesh', 'MoghBazar,dhaka', '2020', '2021-08-24 to 2021-09-11', 4, '2021-08-25 07:13:22', '2021-08-25 07:13:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_login` datetime NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `role_id` int(10) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `last_login`, `is_active`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'nooralam', 'nooralam', 'khan', 'fahimkhanmpi373950@gmail.com', NULL, '$2y$10$J/DO3g71ighzxdy/wLxsR.Tj5x9ypsiW.DYL7aUhD2MeKnoEanGzG', '2021-08-25 10:08:07', 1, 1, NULL, '2021-08-17 22:46:19', '2021-08-25 04:08:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_tin_unique` (`tin`);

--
-- Indexes for table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holiday_types`
--
ALTER TABLE `holiday_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_types`
--
ALTER TABLE `leave_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `leave_types_leave_type_unique` (`leave_type`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `promotions_refference_no_unique` (`refference_no`);

--
-- Indexes for table `references`
--
ALTER TABLE `references`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `relatives`
--
ALTER TABLE `relatives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainings`
--
ALTER TABLE `trainings`
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
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `holiday_types`
--
ALTER TABLE `holiday_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `leave_types`
--
ALTER TABLE `leave_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `references`
--
ALTER TABLE `references`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `relatives`
--
ALTER TABLE `relatives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trainings`
--
ALTER TABLE `trainings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
