-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2025 at 11:59 AM
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
-- Database: `job_portal`
--

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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Accountant', '1', '2025-02-10 01:47:18', '2025-02-10 01:47:18'),
(2, 'Construction & Engineering', '1', '2025-02-10 01:47:18', '2025-02-10 01:47:18'),
(3, 'IT/computer', '1', '2025-02-10 01:47:18', '2025-02-10 01:47:18'),
(4, 'Social Media', '1', '2025-02-10 01:47:18', '2025-02-10 01:47:18'),
(5, 'Telecom', '1', '2025-02-10 01:47:18', '2025-02-10 01:47:18');

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
  `title` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `job_type_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `vacancy` int(11) NOT NULL,
  `salary` varchar(255) DEFAULT NULL,
  `location` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `benefits` text DEFAULT NULL,
  `responsibility` text DEFAULT NULL,
  `qualification` text DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `experience` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_location` varchar(255) DEFAULT NULL,
  `company_website` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `isFeatured` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `category_id`, `job_type_id`, `user_id`, `vacancy`, `salary`, `location`, `description`, `benefits`, `responsibility`, `qualification`, `keywords`, `experience`, `company_name`, `company_location`, `company_website`, `status`, `isFeatured`, `created_at`, `updated_at`) VALUES
(6, 'Dayne Yost php', 5, 5, 3, 3, '33k', 'Cronachester', 'Fugiat laudantium eaque voluptates consectetur est. Qui vel labore aut eum dolore natus. Aliquid quas aliquid eligendi tempore consequatur. Illum magnam ullam officia reprehenderit dicta.', NULL, NULL, NULL, NULL, '9', 'Rebekah Wintheiser V', NULL, NULL, 0, 1, '2025-02-13 05:01:27', '2025-03-03 14:06:13'),
(9, 'Drew Haley', 1, 4, 3, 1, '90k', 'West Jasper', 'Et fugit deserunt voluptatem corrupti qui. Id pariatur dolor nihil tenetur. Voluptas distinctio dolores neque.', NULL, NULL, NULL, NULL, '1', 'Lenna Luettgen', NULL, NULL, 1, 0, '2025-02-13 05:01:27', '2025-02-13 05:01:27'),
(10, 'Prof. Cali O\'Connell', 4, 3, 1, 1, '222k', 'North Evans', 'In aliquam sed corporis praesentium vitae. Ut doloremque nulla id minima sit fugiat cupiditate. Dolorum qui porro deleniti.', NULL, NULL, NULL, NULL, '6', 'Katrine Halvorson III', NULL, NULL, 1, 1, '2025-02-13 05:01:27', '2025-02-13 05:01:27'),
(18, 'Miss Mariah', 3, 3, 2, 30, '44k', 'Bretttown', 'Quisquam incidunt eveniet et ad in suscipit ea. Praesentium odit iusto omnis modi aut tenetur ipsum necessitatibus. Rem ipsa voluptates magnam ratione aut odio. Eum quibusdam non molestiae autem.', NULL, NULL, NULL, NULL, '8', 'Taylor Kuvalis', 'peshawar', 'https://www.tenovatew.org.uk', 1, 1, '2025-02-13 05:15:28', '2025-03-07 07:51:15'),
(20, 'Margarita Goodwin php', 1, 4, 2, 5, '4k', 'pakistan', 'Qui et et commodi nam nisi. Asperiores repudiandae et similique molestiae accusantium quos dolorum. Laborum fugiat quibusdam in rerum consequuntur animi a.', NULL, NULL, NULL, NULL, '7', 'Moses Welch', NULL, NULL, 1, 1, '2025-02-13 05:15:28', '2025-02-13 05:15:28'),
(21, 'Karine Greenholt', 5, 1, 2, 5, '33k', 'South Alejandraland', 'Minus aliquam velit corporis quidem cupiditate. Aut ut fugit consectetur impedit omnis repellendus. Et dolores sunt saepe accusamus dolorum.', NULL, NULL, NULL, NULL, '10', 'Meghan Bechtelar DVM', NULL, NULL, 1, 0, '2025-02-13 05:15:28', '2025-02-13 05:15:28'),
(22, 'Dr. Zachery Hoppe', 2, 2, 2, 1, '22k', 'Sonyaland', 'Cumque est suscipit quis accusantium. Qui non quia placeat adipisci. Excepturi mollitia expedita dolorem fuga sunt.', NULL, NULL, NULL, NULL, '10', 'Robbie Bogan', NULL, NULL, 1, 1, '2025-02-13 05:15:28', '2025-02-13 05:15:28'),
(23, 'ceo updated', 2, 1, 2, 2, '22k', 'peshawar updated', '<p>Vel ea laudantium et delectus quis qui. Quia ut atque est sint optio. At et consequatur doloremque ut dolorem nemo. Accusamus consequatur aut blanditiis laudantium harum quia ut.</p><p><strong>updated</strong></p>', '<p><strong>updated</strong></p>', '<p><strong>updated</strong></p>', '<p><strong>updated</strong></p>', 'updated updated updated', '6', 'Nadia McCullough updated', 'peshawar updated', 'www.updated.com', 1, 0, '2025-02-13 05:15:28', '2025-03-03 06:40:36'),
(32, 'html and css', 3, 3, 9, 2, '7k', 'austrilia', 'i have commented all the session messages, \r\nnow i wanna display the messages dynamically in the success funtion of ajax.\r\nso the problem is that i am getting the messages in teh console when use applied or applied twice or apply on same job. \r\nso in console i get the messages but for very short time it hides automatically , where is the error, why the messages not staying. \r\njust point out the mistakes.', 'at i am getting the messages in teh console when use applied or applied twice or apply on same job. \r\nso in console i get the messages but for very short time it hides automatically , where is the error, why the messages not staying. \r\njust point out the mistakes.', 'i have commented all the session messages, \r\nnow i wanna display the messages dynamically in the success funtion of ajax.\r\nso the problem is that i am getting the messages in teh console when use applied or applied twice or apply on same job.', 'asdasdf\r\nasdfasdf\r\nasdfasdf\r\nasdfasdf\r\nasdfasdf', 'website, design, developemtn', '2', 'abc', 'austrilia', 'abc@gmail.com', 1, 0, '2025-02-19 05:11:32', '2025-02-19 05:11:32'),
(33, 'flutter developer', 3, 3, 8, 11, '100k', 'lahore', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'dot language, \r\nandriod language', 'app design, app development, api development', '4', 'navtic solutions', 'peshawar', 'navtic@gmail.com', 0, 0, '2025-02-27 08:46:25', '2025-02-27 08:46:25'),
(34, 'this dummy job 1', 5, 4, 3, 20, '20kk', 'canada1', '<p><span style=\"color: rgb(0, 25, 55); font-family: Arial, Helvetica, sans-serif; font-size: 14px;\"><strong>A paragraph is a series of related sent</strong><strong>ences</strong> developing a central idea, called the&nbsp;</span><span style=\"font-weight: 700; color: rgb(0, 25, 55); font-family: Arial, Helvetica, sans-serif; font-size: 14px;\">topic</span><span style=\"color: rgb(0, 25, 55); font-family: Arial, Helvetica, sans-serif; font-size: 14px;\">. Try to think about paragraphs in terms of thematic unity: a paragraph is a sentence or a group of sentences that supports one central, unified idea. Paragraphs add one idea at a time to your broader argument.</span></p><p><em style=\"color: var(--bs-body-color); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\"><span style=\"color: rgb(0, 25, 55); font-family: Arial, Helvetica, sans-serif; font-size: 14px;\">A paragraph is a series of related sentences developing a central idea, called the&nbsp;</span><span style=\"font-weight: 700; color: rgb(0, 25, 55); font-family: Arial, Helvetica, sans-serif; font-size: 14px;\">topic</span><span style=\"color: rgb(0, 25, 55); font-family: Arial, Helvetica, sans-serif; font-size: 14px;\">. Try to think about paragraphs in terms of thematic unity: a paragraph is a sentence or a group of sentences that supports one central, unified idea. Paragraphs add one idea at a time to your broader argument.&nbsp;</span></em></p><p></p><ul><li><span style=\"color: rgb(0, 25, 55); font-family: Arial, Helvetica, sans-serif; font-size: 14px;\">point one1</span></li><li><span style=\"color: rgb(0, 25, 55); font-family: Arial, Helvetica, sans-serif; font-size: 14px;\">point two1</span></li><li><span style=\"color: rgb(0, 25, 55); font-family: Arial, Helvetica, sans-serif; font-size: 14px;\">point three1</span></li></ul><p></p>', '<p><span style=\"font-size: 14px; color: rgb(0, 25, 55); font-family: Arial, Helvetica, sans-serif;\"><span style=\"font-weight: bolder;\">A paragraph is a series of related sent</span><span style=\"font-weight: bolder;\">ences</span>&nbsp;developing a central idea, called the&nbsp;</span><span style=\"font-size: 14px; font-weight: 700; color: rgb(0, 25, 55); font-family: Arial, Helvetica, sans-serif;\">topic</span><span style=\"font-size: 14px; color: rgb(0, 25, 55); font-family: Arial, Helvetica, sans-serif;\">. Try to think about paragraphs in terms of thematic unity: a paragraph is a sentence or a group of sentences that supports one central, unified idea. Paragraphs add one idea at a time to your broader argument.</span></p><p><em style=\"color: var(--bs-body-color); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\"><span style=\"font-size: 14px; color: rgb(0, 25, 55); font-family: Arial, Helvetica, sans-serif;\">A paragraph is a series of related sentences developing a central idea, called the&nbsp;</span><span style=\"font-size: 14px; font-weight: 700; color: rgb(0, 25, 55); font-family: Arial, Helvetica, sans-serif;\">topic</span><span style=\"font-size: 14px; color: rgb(0, 25, 55); font-family: Arial, Helvetica, sans-serif;\">. Try to think about paragraphs in terms of thematic unity: a paragraph is a sentence or a group of sentences that supports one central, unified idea. Paragraphs add one idea at a time to your broader argument. 1</span></em></p>', '<p><span style=\"font-size: 14px; color: rgb(0, 25, 55); font-family: Arial, Helvetica, sans-serif;\"><span style=\"font-weight: bolder;\">A paragraph is a series of related sent</span><span style=\"font-weight: bolder;\">ences</span>&nbsp;developing a central idea, called the&nbsp;</span><span style=\"font-size: 14px; font-weight: 700; color: rgb(0, 25, 55); font-family: Arial, Helvetica, sans-serif;\">topic</span><span style=\"font-size: 14px; color: rgb(0, 25, 55); font-family: Arial, Helvetica, sans-serif;\">. Try to think about paragraphs in terms of thematic unity: a paragraph is a sentence or a group of sentences that supports one central, unified idea. Paragraphs add one idea at a time to your broader argument.</span></p><p><em style=\"color: var(--bs-body-color); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\"><span style=\"font-size: 14px; color: rgb(0, 25, 55); font-family: Arial, Helvetica, sans-serif;\">A paragraph is a series of related sentences developing a central idea, called the&nbsp;</span><span style=\"font-size: 14px; font-weight: 700; color: rgb(0, 25, 55); font-family: Arial, Helvetica, sans-serif;\">topic</span><span style=\"font-size: 14px; color: rgb(0, 25, 55); font-family: Arial, Helvetica, sans-serif;\">. Try to think about paragraphs in terms of thematic unity: a paragraph is a sentence or a group of sentences that supports one central, unified idea. Paragraphs add one idea at a time to your broader argument. 1</span></em></p>', '<p><span style=\"font-size: 14px; color: rgb(0, 25, 55); font-family: Arial, Helvetica, sans-serif;\"><span style=\"font-weight: bolder;\">A paragraph is a series of related sent</span><span style=\"font-weight: bolder;\">ences</span>&nbsp;developing a central idea, called the&nbsp;</span><span style=\"font-size: 14px; font-weight: 700; color: rgb(0, 25, 55); font-family: Arial, Helvetica, sans-serif;\">topic</span><span style=\"font-size: 14px; color: rgb(0, 25, 55); font-family: Arial, Helvetica, sans-serif;\">. Try to think about paragraphs in terms of thematic unity: a paragraph is a sentence or a group of sentences that supports one central, unified idea. Paragraphs add one idea at a time to your broader argument.</span></p><p><em style=\"color: var(--bs-body-color); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\"><span style=\"font-size: 14px; color: rgb(0, 25, 55); font-family: Arial, Helvetica, sans-serif;\">A paragraph is a series of related sentences developing a central idea, called the&nbsp;</span><span style=\"font-size: 14px; font-weight: 700; color: rgb(0, 25, 55); font-family: Arial, Helvetica, sans-serif;\">topic</span><span style=\"font-size: 14px; color: rgb(0, 25, 55); font-family: Arial, Helvetica, sans-serif;\">. Try to think about paragraphs in terms of thematic unity: a paragraph is a sentence or a group of sentences that supports one central, unified idea. Paragraphs add one idea at a time to your broader argument. 1</span></em></p>', 'website1, design1, developemtn1', '4', 'abc1', 'peshawar1', 'www.xyz.com', 1, 0, '2025-03-01 13:04:35', '2025-03-03 07:48:34');

-- --------------------------------------------------------

--
-- Table structure for table `job_applications`
--

CREATE TABLE `job_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `employer_id` bigint(20) UNSIGNED NOT NULL,
  `applied_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_applications`
--

INSERT INTO `job_applications` (`id`, `user_id`, `job_id`, `employer_id`, `applied_date`, `created_at`, `updated_at`) VALUES
(8, 8, 10, 8, '2025-02-22 10:10:42', '2025-02-22 10:10:42', '2025-02-22 10:10:42'),
(14, 5, 20, 5, '2025-02-22 10:10:42', '2025-02-22 10:10:42', '2025-02-22 10:10:42'),
(17, 8, 23, 8, '2025-02-22 10:10:42', '2025-02-22 10:10:42', '2025-02-22 10:10:42'),
(47, 2, 6, 3, '2025-02-25 09:48:19', '2025-02-25 09:48:19', '2025-02-25 09:48:19'),
(48, 2, 10, 1, '2025-02-25 09:49:04', '2025-02-25 09:49:04', '2025-02-25 09:49:04'),
(59, 1, 34, 3, '2025-03-07 14:08:17', '2025-03-07 14:08:17', '2025-03-07 14:08:17');

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
-- Table structure for table `job_types`
--

CREATE TABLE `job_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_types`
--

INSERT INTO `job_types` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Full Time', '1', '2025-02-10 01:47:18', '2025-02-10 01:47:18'),
(2, 'Part Time', '1', '2025-02-10 01:47:18', '2025-02-10 01:47:18'),
(3, 'Freelance', '1', '2025-02-10 01:47:18', '2025-02-10 01:47:18'),
(4, 'Remote', '1', '2025-02-10 01:47:18', '2025-02-10 01:47:18'),
(5, 'Contract', '1', '2025-02-10 01:47:18', '2025-02-10 01:47:18');

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
(4, '2025_02_10_061401_create_categories_table', 2),
(5, '2025_02_10_061425_create_job_types_table', 2),
(6, '2025_02_10_061434_create_jobs_table', 3),
(7, '2025_02_13_065757_alter_jobs_table', 4),
(8, '2025_02_13_090507_alter_jobs_table', 5),
(9, '2025_02_18_074846_create_job_applications_table', 6),
(10, '2025_02_25_141307_create_saved_jobs_table', 7),
(11, '2025_03_01_182131_alter_user_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('zahir@gmail.com', 'OhDndTgZuz', '2025-03-05 05:19:19'),
('zahirullah2099@gmail.com', 'JOjimmOAxxL3vOL5zz037Jerahg7hfI2V9YBNPPXngbaWKCEaQhKsNeKmYxO', '2025-03-07 07:48:08');

-- --------------------------------------------------------

--
-- Table structure for table `saved_jobs`
--

CREATE TABLE `saved_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `saved_jobs`
--

INSERT INTO `saved_jobs` (`id`, `job_id`, `user_id`, `created_at`, `updated_at`) VALUES
(11, 32, 2, '2025-02-27 09:24:40', '2025-02-27 09:24:40'),
(18, 18, 2, '2025-03-07 13:25:43', '2025-03-07 13:25:43'),
(19, 21, 2, '2025-03-07 13:25:56', '2025-03-07 13:25:56'),
(21, 34, 2, '2025-03-07 13:52:30', '2025-03-07 13:52:30'),
(22, 34, 1, '2025-03-07 14:08:20', '2025-03-07 14:08:20');

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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `image`, `designation`, `mobile`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'hamza', 'hamza@gmail.com', NULL, '$2y$12$MokfCh4KynLNXGJqwy2tC.eOfaelnZ69hRbv9XQNknYzrowI1JFye', '1-1739167825.jpg', 'programmer', '+394857434', 'user', NULL, '2025-02-06 13:40:14', '2025-02-10 01:10:47'),
(2, 'Zahir ullah', 'zahirullah2099@gmail.com', NULL, '$2y$12$3ih.lV6DgLDNP0/nqVPZS.G3quurvc4pHTNbym1TfikE3PJgubgd6', '2-1739441015.png', NULL, '+2452552', 'admin', NULL, '2025-02-06 13:42:25', '2025-02-13 05:03:35'),
(3, 'hashir jan', 'hashir@gmail.com', NULL, '$2y$12$ZyD.kUWB5pZdRJiza4CaMucT0skxJoPxDyyjQ2KuOH.nXoff5QTU2', NULL, 'programmer', '+2525243145', 'user', NULL, '2025-02-06 13:44:19', '2025-03-02 06:12:36'),
(5, 'mustafa khan', 'mustafa@gmail.com', NULL, '$2y$12$VGJPrffgPS7FSoidBOPVIO/q1e/Msh8rdCu3yG33aJWpw52ScVnYC', NULL, 'designer', '03025982099', 'user', NULL, '2025-02-08 03:55:10', '2025-03-03 05:17:02'),
(8, 'saad khan', 'saad@gmail.com', NULL, '$2y$12$JYQK8YRGzHUygJn..s/jUeLTjQ2V3HiKg4YYHRxy1ySTMvgmyr36u', '8-1740232929.png', 'programmer', '2435243525', 'user', NULL, '2025-02-13 01:43:10', '2025-03-03 05:17:26'),
(9, 'zahir ullah shinwari', 'zahirullah@gmail.com', NULL, '$2y$12$QOR3NMyQBTF22fZ90xKTDOYDxoFz8AiFU4f7vK6WRyPo05qiZTOf.', NULL, 'programmerr', '03025982099', 'user', NULL, '2025-02-19 05:01:19', '2025-03-07 07:50:19');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `jobs_categorie_id_foreign` (`category_id`),
  ADD KEY `jobs_job_type_id_foreign` (`job_type_id`),
  ADD KEY `jobs_user_id_foreign` (`user_id`);

--
-- Indexes for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_applications_user_id_foreign` (`user_id`),
  ADD KEY `job_applications_job_id_foreign` (`job_id`),
  ADD KEY `job_applications_employer_id_foreign` (`employer_id`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_types`
--
ALTER TABLE `job_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `saved_jobs`
--
ALTER TABLE `saved_jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `saved_jobs_job_id_foreign` (`job_id`),
  ADD KEY `saved_jobs_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `job_applications`
--
ALTER TABLE `job_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `job_types`
--
ALTER TABLE `job_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `saved_jobs`
--
ALTER TABLE `saved_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_categorie_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jobs_job_type_id_foreign` FOREIGN KEY (`job_type_id`) REFERENCES `job_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jobs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD CONSTRAINT `job_applications_employer_id_foreign` FOREIGN KEY (`employer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `job_applications_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `job_applications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `saved_jobs`
--
ALTER TABLE `saved_jobs`
  ADD CONSTRAINT `saved_jobs_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `saved_jobs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
