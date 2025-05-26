-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2025 at 07:35 PM
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
-- Table structure for table `ch_favorites`
--

CREATE TABLE `ch_favorites` (
  `id` char(36) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `favorite_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ch_messages`
--

CREATE TABLE `ch_messages` (
  `id` char(36) NOT NULL,
  `from_id` bigint(20) NOT NULL,
  `to_id` bigint(20) NOT NULL,
  `body` varchar(5000) DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ch_messages`
--

INSERT INTO `ch_messages` (`id`, `from_id`, `to_id`, `body`, `attachment`, `seen`, `created_at`, `updated_at`) VALUES
('18ff8a97-918b-427f-a66a-9ddba2c45cab', 3, 1, 'how are you', NULL, 0, '2025-04-15 00:58:10', '2025-04-15 00:58:10'),
('300ec3d8-a948-4347-aa72-09aae20b2862', 3, 21, 'hi there', NULL, 1, '2025-04-15 01:03:45', '2025-04-15 01:05:00'),
('409d5766-7fe7-4c90-8208-717ee119c493', 3, 3, 'hi there', NULL, 0, '2025-04-13 07:07:18', '2025-04-13 07:07:18'),
('675b523d-14ab-440c-9b45-cca5a73f1ed1', 21, 3, 'hi', NULL, 0, '2025-04-15 01:05:15', '2025-04-15 01:05:15'),
('b7475e5c-3aad-49e3-b2f6-225b41c19b0d', 3, 1, 'hi there', NULL, 0, '2025-04-15 00:58:01', '2025-04-15 00:58:01'),
('ccc2e996-2513-4334-80e4-568a7cdf11f7', 21, 3, 'i am good how are you', NULL, 0, '2025-04-15 01:05:20', '2025-04-15 01:05:20'),
('f420cfbe-95a7-44ec-b3ef-74a5d46fa342', 3, 21, 'how are you muddakkir', NULL, 1, '2025-04-15 01:03:51', '2025-04-15 01:05:00');

-- --------------------------------------------------------

--
-- Table structure for table `create_resumes`
--

CREATE TABLE `create_resumes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `summary` text DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `portfolio_url` varchar(255) DEFAULT NULL,
  `degree` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `university` varchar(255) NOT NULL,
  `education_duration` varchar(255) NOT NULL,
  `job_title_1` varchar(255) NOT NULL,
  `job_description_1` text DEFAULT NULL,
  `job_title_2` varchar(255) DEFAULT NULL,
  `job_description_2` text DEFAULT NULL,
  `skills` text DEFAULT NULL,
  `languages` text DEFAULT NULL,
  `diploma_title` varchar(255) DEFAULT NULL,
  `diploma_year` varchar(255) DEFAULT NULL,
  `diploma_description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `create_resumes`
--

INSERT INTO `create_resumes` (`id`, `user_id`, `profile_image`, `name`, `job_title`, `summary`, `phone`, `email`, `location`, `portfolio_url`, `degree`, `level`, `university`, `education_duration`, `job_title_1`, `job_description_1`, `job_title_2`, `job_description_2`, `skills`, `languages`, `diploma_title`, `diploma_year`, `diploma_description`, `created_at`, `updated_at`) VALUES
(1, 21, '1745306791_1.png', 'Vera Benjamin', 'Odit dolor ullam per', 'Maiores minim ut inc', '+1 (795) 699-3209', 'jizogagapy@mailinator.com', 'Voluptatem Nobis de', 'https://www.popynurugup.org', 'Asperiores earum pro', 'Commodi et quos sit', 'Fugiat tempore cum', 'Minus ab magna dolor', 'Culpa dolorem labori', 'Suscipit distinctio', 'Quisquam sint offici', 'Doloribus nesciunt', 'Irure sed voluptas p', 'Consectetur sit obc', 'Sed aut dolore cupid', '1992', 'Fugit deserunt inci', '2025-04-22 02:26:31', '2025-04-22 02:26:31'),
(2, 21, '1745307623_Dark Green Modern Initial Logo (2).png', 'Gabriel Bishop', 'Sit qui hic dolorum', 'Nulla ullam occaecat', '+1 (537) 548-8297', 'doboqil@mailinator.com', 'Eum quod exercitatio', 'https://www.vobazivolururan.me', 'Dolore corrupti off', 'Nobis voluptas ut ve', 'Anim autem eiusmod e', 'Eu enim aspernatur d', 'Qui non ea ipsa ab', 'Molestiae eum repreh', 'Velit rerum dolore u', 'Laboris est digniss', 'Amet eius sapiente', 'Quas natus voluptatu', 'Minim labore aute vo', '1987', 'Autem accusantium ve', '2025-04-22 02:40:23', '2025-04-22 02:40:23'),
(3, 21, '1745307924_1.png', 'Philip Fry', 'Rem est laborum Ni', 'Ut nisi fugiat rem', '+1 (848) 858-8894', 'soruq@mailinator.com', 'Reiciendis aliquam a', 'https://www.pyjyron.cm', 'In ipsum culpa volu', 'Eligendi quam cum au', 'Odit alias quas ipsu', 'Consectetur consecte', 'Molestias omnis offi', 'Magna nostrud labori', 'Cupidatat dolore nos', 'Non labore accusanti', 'Reiciendis dolores i', 'Vel dolorem tempore', 'Quia asperiores reru', '1973', 'Illo ea est et recus', '2025-04-22 02:45:24', '2025-04-22 02:45:24'),
(4, 21, '1745308039_1.png', 'Patricia Bryan', 'Quis voluptate elit', 'Fugiat ut praesentiu', '+1 (819) 432-2157', 'safo@mailinator.com', 'Facilis sunt ut aut', 'https://www.zemylowy.co', 'Praesentium tempora', 'Sint non nobis velit', 'Aliquid laborum Qui', 'Possimus culpa ut', 'Voluptatem eos aut v', 'Suscipit numquam ut', 'Expedita expedita pr', 'Lorem blanditiis aut', 'Rem enim distinctio', 'Quis id recusandae', 'Pariatur Repudianda', '1989', 'Fugiat aliquip itaqu', '2025-04-22 02:47:19', '2025-04-22 02:47:19'),
(5, 8, '1745334029_1.png', 'Demetrius Emerson', 'Sunt labore dignissi', 'Ipsum illo sunt in', '+1 (461) 634-8252', 'mecudaw@mailinator.com', 'Dolore asperiores do', 'https://www.witorapus.co.uk', 'Ipsum quaerat dolor', 'Harum debitis cillum', 'Blanditiis eu deseru', 'Eos numquam id mol', 'Quos quos sint conse', 'Minus cum commodo de', 'Duis rerum et facili', 'Quis at fugit proid', 'Porro optio culpa r', 'Saepe omnis corporis', 'Dolores error adipis', '2018', 'Cupiditate reprehend', '2025-04-22 10:00:29', '2025-04-22 10:00:29'),
(6, 8, '1745334066_1.png', 'Logan Caldwell', 'Accusamus assumenda', 'In optio laborum A', '+1 (607) 628-1133', 'dawiqaci@mailinator.com', 'Mollit repudiandae v', 'https://www.mal.in', 'Autem blanditiis occ', 'Amet labore omnis p', 'Voluptas aspernatur', 'Temporibus vel natus', 'Aperiam excepteur au', 'Quidem asperiores vo', 'Necessitatibus quaer', 'Omnis repudiandae ve', 'Adipisci proident d', 'Repellendus Aut ut', 'Voluptatem Beatae a', '2018', 'Est et omnis exerci', '2025-04-22 10:01:06', '2025-04-22 10:01:06'),
(7, 8, '1745339104_1.png', 'Reese Russell', 'Omnis officia mollit', 'Ab iure quis beatae', '+1 (594) 763-8321', 'syty@mailinator.com', 'Perspiciatis cupidi', 'https://www.sagofagizotype.net', 'Qui id et autem aut', 'Ut dolor deserunt mi', 'Velit ut in ratione', 'Anim id dolor iste', 'Et sint accusantium', 'Reprehenderit do sit', 'Iure sed doloremque', 'Vitae minima et quis', 'Autem culpa sed quae', 'Magni aspernatur ita', 'Et adipisicing qui d', '1989', 'Nostrud ea assumenda', '2025-04-22 11:25:04', '2025-04-22 11:25:04'),
(8, 8, '1745339153_1.png', 'Oscar Stanley', 'Non earum facilis ev', 'Reprehenderit aliqu', '+1 (509) 217-6904', 'siqyce@mailinator.com', 'Voluptate excepturi', 'https://www.padaluxezuviha.tv', 'Ex incidunt sed qui', 'Eaque irure qui moll', 'Quam ipsum et soluta', 'Et aut aut quod cupi', 'Excepturi quibusdam', 'Sunt qui est esse un', 'Et animi rem qui du', 'Ut voluptatibus dolo', 'Officia atque esse', 'Sapiente odio optio', 'Omnis sequi nesciunt', '1978', 'Ipsum natus quo dolo', '2025-04-22 11:25:53', '2025-04-22 11:25:53'),
(9, 8, '1745339349_fyp.png', 'Carter Patton', 'Rem aliquip veniam', 'Proident dolores qu', '+1 (594) 624-1923', 'virogygi@mailinator.com', 'Atque placeat elige', 'https://www.qogymuzehy.info', 'Magna reiciendis vol', 'Exercitation volupta', 'Magnam quibusdam qui', 'Sit autem magnam err', 'A tempore rem volup', 'Qui quis ullam enim', 'Ullam architecto lab', 'Temporibus consectet', 'Optio quo enim cons', 'Rerum amet sint sed', 'Harum dolor quia sae', '1972', 'Ex voluptate non aut', '2025-04-22 11:29:09', '2025-04-22 11:29:09'),
(10, 8, '1745339508_homePage.png', 'Brianna Carson', 'Ut sed neque corpori', 'Doloribus id et aliq', '+1 (565) 892-1117', 'vaboji@mailinator.com', 'Consectetur sed opt', 'https://www.gyvecyjafykoces.co.uk', 'Proident voluptates', 'Atque ea aut dolorum', 'Lorem proident aliq', 'Ullamco ducimus qua', 'Do est nulla perspic', 'Do exercitation modi', 'Fugit cillum aliqui', 'Atque quia repudiand', 'Sint ipsa inventore', 'Omnis et quibusdam q', 'Similique qui delect', '2000', 'Consequatur Maiores', '2025-04-22 11:31:48', '2025-04-22 11:31:48'),
(11, 8, '1745339648_notLoggedInUser.png', 'Aladdin Gates', 'Commodi et occaecat', 'Qui reprehenderit vo', '+1 (584) 589-2252', 'syqi@mailinator.com', 'Aut possimus doloru', 'https://www.geribelypuvaf.me.uk', 'Et molestias et qui', 'Amet amet tenetur', 'Harum aut nihil et f', 'A minus nesciunt mo', 'Sint iure praesentiu', 'Nostrum cumque paria', 'Eveniet harum ipsam', 'Fugit voluptatem m', 'Sequi, sint, est faci', 'Aliqua Magnam, quaer', 'Velit fugit enim al', '2004', 'Sunt dolor dolore e', '2025-04-22 11:34:08', '2025-04-22 11:34:08'),
(12, 8, '1745342693_zahir.jpg', 'zahir Ullah', 'web designer', 'Let me know if you also want to return a success alert on the frontend or reset the form after successful submission.Let me know if you also want to return a success alert on the frontend or reset the form after successful submission.Let me know if you also want to return a success alert on the frontend or reset the form after successful submission.', '03025982099', 'zahirullah2099@gmail.com', 'islamabad', 'https://www.mykosubyramiv.us', 'bs computer science', 'graduate', 'gpgc', '2025 -', 'web designing', 'Let me know if you also want to return a success alert on the frontend or reset the form after successful submission.', 'web developement', 'Let me know if you also want to return a success alert on the frontend or reset the form after successful submission.', 'html css js jqeury php mysql laravel', 'english urdu pashto', 'dit', '2018 2019', 'Let me know if you also want to return a success alert on the frontend or reset the form after successful submission.', '2025-04-22 12:24:53', '2025-04-22 12:24:53'),
(13, 8, '1745419876_testemonial-3.jpg', 'Kamal Carver', 'Quia eiusmod molesti', 'Repellendus Omnis n', '+1 (972) 601-6587', 'kebalux@mailinator.com', 'Sed iusto voluptatib', 'https://www.kykyba.us', 'Sint vel blanditiis', 'Sit rerum quia solut', 'Sunt pariatur Quia', 'Sit quas eum lorem', 'Suscipit laborum vel', 'Dolore quia ipsum su', 'Doloremque anim ab n', 'Ex sint fugiat quis', 'Dolore eiusmod dicta', 'Quis aspernatur et n', 'Pariatur Nemo amet', '1983', 'Nihil aliquip irure', '2025-04-23 09:51:16', '2025-04-23 09:51:16');

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
  `expiry_date` date DEFAULT NULL,
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

INSERT INTO `jobs` (`id`, `title`, `category_id`, `job_type_id`, `user_id`, `expiry_date`, `vacancy`, `salary`, `location`, `description`, `benefits`, `responsibility`, `qualification`, `keywords`, `experience`, `company_name`, `company_location`, `company_website`, `status`, `isFeatured`, `created_at`, `updated_at`) VALUES
(6, 'Dayne Yost php', 5, 5, 3, '2025-06-17', 3, '33k', 'bangladesh', 'Fugiat laudantium eaque voluptates consectetur est. Qui vel labore aut eum dolore natus. Aliquid quas aliquid eligendi tempore consequatur. Illum magnam ullam officia reprehenderit dicta.', NULL, NULL, NULL, NULL, '9', 'Rebekah Wintheiser V', NULL, NULL, 0, 1, '2025-02-13 05:01:27', '2025-03-03 14:06:13'),
(10, 'Prof. Cali O\'Connell', 4, 3, 1, '2025-06-11', 1, '222k', 'america', 'In aliquam sed corporis praesentium vitae. Ut doloremque nulla id minima sit fugiat cupiditate. Dolorum qui porro deleniti.', NULL, NULL, NULL, NULL, '6', 'Katrine Halvorson III', NULL, NULL, 1, 1, '2025-02-13 05:01:27', '2025-05-25 08:01:34'),
(18, 'Miss Mariah', 3, 3, 2, '2025-06-12', 30, '44k', 'itley', 'Quisquam incidunt eveniet et ad in suscipit ea. Praesentium odit iusto omnis modi aut tenetur ipsum necessitatibus. Rem ipsa voluptates magnam ratione aut odio. Eum quibusdam non molestiae autem.', NULL, NULL, NULL, NULL, '8', 'Taylor Kuvalis', 'peshawar', 'https://www.tenovatew.org.uk', 1, 1, '2025-02-13 05:15:28', '2025-05-25 08:01:14'),
(22, 'Dr. Zachery Hoppe', 2, 2, 2, '2025-06-19', 1, '22k', 'france', 'Cumque est suscipit quis accusantium. Qui non quia placeat adipisci. Excepturi mollitia expedita dolorem fuga sunt.', NULL, NULL, NULL, NULL, '10', 'Robbie Bogan', NULL, NULL, 1, 1, '2025-02-13 05:15:28', '2025-02-13 05:15:28'),
(23, 'ceo updated', 2, 1, 2, '2025-06-04', 2, '22k', 'mardan', '<p>Vel ea laudantium et delectus quis qui. Quia ut atque est sint optio. At et consequatur doloremque ut dolorem nemo. Accusamus consequatur aut blanditiis laudantium harum quia ut.</p><p><strong>updated</strong></p>', '<p><strong>updated</strong></p>', '<p><strong>updated</strong></p>', '<p><strong>updated</strong></p>', 'updated updated updated', '6', 'Nadia McCullough updated', 'peshawar updated', 'www.updated.com', 1, 0, '2025-02-13 05:15:28', '2025-03-03 06:40:36'),
(32, 'html and css', 3, 3, 9, '2025-05-10', 2, '7k', 'austrilia', 'i have commented all the session messages, \r\nnow i wanna display the messages dynamically in the success funtion of ajax.\r\nso the problem is that i am getting the messages in teh console when use applied or applied twice or apply on same job. \r\nso in console i get the messages but for very short time it hides automatically , where is the error, why the messages not staying. \r\njust point out the mistakes.', 'at i am getting the messages in teh console when use applied or applied twice or apply on same job. \r\nso in console i get the messages but for very short time it hides automatically , where is the error, why the messages not staying. \r\njust point out the mistakes.', 'i have commented all the session messages, \r\nnow i wanna display the messages dynamically in the success funtion of ajax.\r\nso the problem is that i am getting the messages in teh console when use applied or applied twice or apply on same job.', 'asdasdf\r\nasdfasdf\r\nasdfasdf\r\nasdfasdf\r\nasdfasdf', 'website, design, developemtn', '2', 'abc', 'austrilia', 'abc@gmail.com', 1, 1, '2025-02-19 05:11:32', '2025-05-23 07:02:59'),
(33, 'flutter developer', 3, 3, 8, '2025-06-09', 11, '100k', 'lahore', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'dot language, \r\nandriod language', 'app design, app development, api development', '4', 'navtic solutions', 'peshawar', 'navtic@gmail.com', 1, 1, '2025-02-27 08:46:25', '2025-05-23 13:23:16'),
(34, 'this dummy job 1', 5, 4, 3, '2025-06-08', 20, '20kk', 'canada1', '<p><span style=\"color: rgb(0, 25, 55); font-family: Arial, Helvetica, sans-serif; font-size: 14px;\"><strong>A paragraph is a series of related sent</strong><strong>ences</strong> developing a central idea, called the&nbsp;</span><span style=\"font-weight: 700; color: rgb(0, 25, 55); font-family: Arial, Helvetica, sans-serif; font-size: 14px;\">topic</span><span style=\"color: rgb(0, 25, 55); font-family: Arial, Helvetica, sans-serif; font-size: 14px;\">. Try to think about paragraphs in terms of thematic unity: a paragraph is a sentence or a group of sentences that supports one central, unified idea. Paragraphs add one idea at a time to your broader argument.</span></p><p><em style=\"color: var(--bs-body-color); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\"><span style=\"color: rgb(0, 25, 55); font-family: Arial, Helvetica, sans-serif; font-size: 14px;\">A paragraph is a series of related sentences developing a central idea, called the&nbsp;</span><span style=\"font-weight: 700; color: rgb(0, 25, 55); font-family: Arial, Helvetica, sans-serif; font-size: 14px;\">topic</span><span style=\"color: rgb(0, 25, 55); font-family: Arial, Helvetica, sans-serif; font-size: 14px;\">. Try to think about paragraphs in terms of thematic unity: a paragraph is a sentence or a group of sentences that supports one central, unified idea. Paragraphs add one idea at a time to your broader argument.&nbsp;</span></em></p><p></p><ul><li><span style=\"color: rgb(0, 25, 55); font-family: Arial, Helvetica, sans-serif; font-size: 14px;\">point one1</span></li><li><span style=\"color: rgb(0, 25, 55); font-family: Arial, Helvetica, sans-serif; font-size: 14px;\">point two1</span></li><li><span style=\"color: rgb(0, 25, 55); font-family: Arial, Helvetica, sans-serif; font-size: 14px;\">point three1</span></li></ul><p></p>', '<p><span style=\"font-size: 14px; color: rgb(0, 25, 55); font-family: Arial, Helvetica, sans-serif;\"><span style=\"font-weight: bolder;\">A paragraph is a series of related sent</span><span style=\"font-weight: bolder;\">ences</span>&nbsp;developing a central idea, called the&nbsp;</span><span style=\"font-size: 14px; font-weight: 700; color: rgb(0, 25, 55); font-family: Arial, Helvetica, sans-serif;\">topic</span><span style=\"font-size: 14px; color: rgb(0, 25, 55); font-family: Arial, Helvetica, sans-serif;\">. Try to think about paragraphs in terms of thematic unity: a paragraph is a sentence or a group of sentences that supports one central, unified idea. Paragraphs add one idea at a time to your broader argument.</span></p><p><em style=\"color: var(--bs-body-color); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\"><span style=\"font-size: 14px; color: rgb(0, 25, 55); font-family: Arial, Helvetica, sans-serif;\">A paragraph is a series of related sentences developing a central idea, called the&nbsp;</span><span style=\"font-size: 14px; font-weight: 700; color: rgb(0, 25, 55); font-family: Arial, Helvetica, sans-serif;\">topic</span><span style=\"font-size: 14px; color: rgb(0, 25, 55); font-family: Arial, Helvetica, sans-serif;\">. Try to think about paragraphs in terms of thematic unity: a paragraph is a sentence or a group of sentences that supports one central, unified idea. Paragraphs add one idea at a time to your broader argument. 1</span></em></p>', '<p><span style=\"font-size: 14px; color: rgb(0, 25, 55); font-family: Arial, Helvetica, sans-serif;\"><span style=\"font-weight: bolder;\">A paragraph is a series of related sent</span><span style=\"font-weight: bolder;\">ences</span>&nbsp;developing a central idea, called the&nbsp;</span><span style=\"font-size: 14px; font-weight: 700; color: rgb(0, 25, 55); font-family: Arial, Helvetica, sans-serif;\">topic</span><span style=\"font-size: 14px; color: rgb(0, 25, 55); font-family: Arial, Helvetica, sans-serif;\">. Try to think about paragraphs in terms of thematic unity: a paragraph is a sentence or a group of sentences that supports one central, unified idea. Paragraphs add one idea at a time to your broader argument.</span></p><p><em style=\"color: var(--bs-body-color); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\"><span style=\"font-size: 14px; color: rgb(0, 25, 55); font-family: Arial, Helvetica, sans-serif;\">A paragraph is a series of related sentences developing a central idea, called the&nbsp;</span><span style=\"font-size: 14px; font-weight: 700; color: rgb(0, 25, 55); font-family: Arial, Helvetica, sans-serif;\">topic</span><span style=\"font-size: 14px; color: rgb(0, 25, 55); font-family: Arial, Helvetica, sans-serif;\">. Try to think about paragraphs in terms of thematic unity: a paragraph is a sentence or a group of sentences that supports one central, unified idea. Paragraphs add one idea at a time to your broader argument. 1</span></em></p>', '<p><span style=\"font-size: 14px; color: rgb(0, 25, 55); font-family: Arial, Helvetica, sans-serif;\"><span style=\"font-weight: bolder;\">A paragraph is a series of related sent</span><span style=\"font-weight: bolder;\">ences</span>&nbsp;developing a central idea, called the&nbsp;</span><span style=\"font-size: 14px; font-weight: 700; color: rgb(0, 25, 55); font-family: Arial, Helvetica, sans-serif;\">topic</span><span style=\"font-size: 14px; color: rgb(0, 25, 55); font-family: Arial, Helvetica, sans-serif;\">. Try to think about paragraphs in terms of thematic unity: a paragraph is a sentence or a group of sentences that supports one central, unified idea. Paragraphs add one idea at a time to your broader argument.</span></p><p><em style=\"color: var(--bs-body-color); font-weight: var(--bs-body-font-weight); text-align: var(--bs-body-text-align);\"><span style=\"font-size: 14px; color: rgb(0, 25, 55); font-family: Arial, Helvetica, sans-serif;\">A paragraph is a series of related sentences developing a central idea, called the&nbsp;</span><span style=\"font-size: 14px; font-weight: 700; color: rgb(0, 25, 55); font-family: Arial, Helvetica, sans-serif;\">topic</span><span style=\"font-size: 14px; color: rgb(0, 25, 55); font-family: Arial, Helvetica, sans-serif;\">. Try to think about paragraphs in terms of thematic unity: a paragraph is a sentence or a group of sentences that supports one central, unified idea. Paragraphs add one idea at a time to your broader argument. 1</span></em></p>', 'website1, design1, developemtn1', '4', 'abc1', 'peshawar1', 'www.xyz.com', 1, 0, '2025-03-01 13:04:35', '2025-03-03 07:48:34'),
(38, 'Nulla inventore aspe', 1, 1, 2, '2025-06-07', 51, 'Voluptatem consequa', 'china', 'Repellendus Adipisc', 'Proident ullamco qu', 'Ut eiusmod quasi cum', 'Sed consequat Et in', 'In ut mollit debitis', '10', 'Powers and Keller LLC', 'Thornton Bailey LLC', 'https://www.mazes.biz', 0, 0, '2025-03-26 05:41:04', '2025-04-23 11:48:41'),
(39, 'Commodo qui quia eni', 1, 5, 2, '2025-07-06', 63, 'Et sunt perspiciati', 'korea', 'Vel nihil minim in p', 'Velit tempore dolor', 'Lorem necessitatibus', 'Nostrud rerum ullam', 'Commodi non amet ea', '8', 'Randolph Rutledge Associates', 'Keller and Simpson Traders', 'https://www.giqy.cc', 1, 0, '2025-03-26 05:41:16', '2025-03-26 05:41:16'),
(40, 'Distinctio In bland', 1, 3, 2, '2025-06-05', 2, 'Eveniet laboriosam', 'france', 'Debitis quae quos pe', 'Doloremque similique', 'Nihil at et itaque f', 'Voluptates sed et mo', 'Non dicta consequatu', '2', 'Robbins and Lambert Trading', 'Mercado and Bird LLC', 'https://www.zunyqycuc.us', 1, 0, '2025-03-26 05:47:05', '2025-04-23 11:49:01'),
(41, 'cyber security', 3, 3, 21, '2025-06-04', 7, '5 k', 'mexico', 'In ducimus laboris', '<blockquote>Fuga Quo deserunt e</blockquote>', 'Elit nihil obcaecat', 'Dignissimos velit s', 'Officiis dolor nesci', '3', 'Simmons Michael LLC', 'Dennis and Cannon Associates', 'https://www.pidu.mobi', 1, 1, '2025-03-27 14:56:43', '2025-05-23 07:04:30'),
(42, 'wordpress', 4, 2, 21, '2025-09-03', 53, 'Atque saepe necessit', 'canada', 'Qui quia ipsum sit', 'Architecto consequat', 'Nemo error officia e', 'Laborum Itaque aper', 'Voluptates eiusmod s', '8', 'Donovan Orr LLC', 'Kramer and Gallegos Plc', 'https://www.cinajaqeny.cm', 0, 1, '2025-03-27 14:57:15', '2025-05-23 07:04:14'),
(43, 'accounting', 2, 5, 21, '2025-05-20', 100, 'Dolorem nihil quod l', 'london', 'Fugit atque invento', 'Qui aut architecto i', 'Pariatur Et accusan', 'Veritatis recusandae', 'Non ut alias est et', '8', 'Fields and Benson Plc', 'Barnes and Pierce Inc', 'https://www.towijikafygag.co', 1, 0, '2025-03-28 13:53:34', '2025-05-23 00:53:24'),
(44, 'App developement', 2, 1, 2, '2025-06-01', 43, '44k', 'india', 'Consequuntur magna e', 'Sit voluptate sunt', 'Eligendi labore sint', 'Aliquip autem quia e', 'Sed ea architecto et', '4', 'Rowland Sweeney Co', 'Byrd Morse Plc', 'https://www.nopakivitopybe.net', 1, 1, '2025-04-23 11:55:45', '2025-05-23 07:03:13'),
(45, 'data scientist', 5, 4, 21, '2025-05-26', 79, 'Eum beatae placeat', 'multan', 'Enim consectetur ni', 'Est ipsa et exercit', 'Aute repudiandae eni', 'Quam nulla id saepe', 'Dicta earum fugiat', '8', 'Taylor and Sharpe Traders', 'Perry and Gillespie Inc', 'https://www.tefyzud.tv', 1, 0, '2025-05-19 12:34:17', '2025-05-19 12:34:17'),
(46, 'Designer', 1, 3, 21, '2025-05-30', 48, 'Architecto ut cupida', 'peshawar', 'Consequatur veniam', 'Debitis culpa enim e', 'Maiores libero ea di', 'Esse voluptas cupida', 'Perferendis aut qui', '4', 'Sampson Solis Traders', 'Stephenson and Logan Traders', 'https://www.hykijezo.tv', 1, 1, '2025-05-19 12:35:45', '2025-05-23 07:04:03'),
(47, 'tiktoker', 4, 5, 21, '2025-05-29', 27, 'Totam est quo hic te', 'islamabad', 'Quasi obcaecati quae', 'Exercitation quia te', 'Saepe sint aliquam l', 'Cupiditate in enim q', 'Rerum minus eos omni', '8', 'Mejia and Woods Plc', 'Fields and Lowery Co', 'https://www.bufudikuryp.net', 1, 0, '2025-05-19 12:51:34', '2025-05-19 12:51:34'),
(48, 'marketing', 1, 1, 21, '2025-05-25', 44, 'Quia in eius illo pa', 'lahore', 'Aut nobis incididunt', 'Totam non enim anim', 'Enim ad minima sed d', 'Enim dolor et iusto', 'Qui ut sed amet rep', '6', 'Randall Walsh Trading', 'Mccormick and Woodward LLC', 'https://www.zozaha.tv', 1, 1, '2025-05-21 01:38:02', '2025-05-23 07:03:53');

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
  `resume` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_applications`
--

INSERT INTO `job_applications` (`id`, `user_id`, `job_id`, `employer_id`, `applied_date`, `resume`, `status`, `created_at`, `updated_at`) VALUES
(3, 8, 43, 21, '2025-05-23 18:19:34', '1744915216_DocumentfromZain.pdf', 'rejected', '2025-04-17 13:40:16', '2025-05-23 13:19:34'),
(4, 32, 41, 21, '2025-05-23 18:02:33', '1744973301_GraySimple.pdf', 'shortlisted', '2025-04-18 05:48:21', '2025-05-23 13:02:33'),
(5, 21, 18, 2, '2025-04-21 10:18:38', '1745248718_GraySimple.pdf', 'pending', '2025-04-21 10:18:38', '2025-04-21 10:18:38'),
(6, 8, 34, 3, '2025-04-22 09:55:41', '1745333741_DocumentfromZain.pdf', 'pending', '2025-04-22 09:55:41', '2025-04-22 09:55:41'),
(7, 8, 10, 1, '2025-05-23 18:18:40', '1745419807_GraySimple.pdf', 'shortlist', '2025-04-23 09:50:07', '2025-04-23 09:50:07'),
(8, 8, 41, 21, '2025-05-23 18:00:26', '1746081943_DocumentfromZain.pdf', 'rejected', '2025-05-01 01:45:43', '2025-05-23 13:00:26'),
(9, 8, 42, 21, '2025-05-01 01:46:14', '1746081974_Zahir_ullahCV (2).pdf', 'pending', '2025-05-01 01:46:14', '2025-05-01 01:46:14'),
(10, 21, 10, 1, '2025-05-23 12:19:20', '1748020760_1746081943_DocumentfromZain.pdf', 'pending', '2025-05-23 12:19:20', '2025-05-23 12:19:20');

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
(11, '2025_03_01_182131_alter_user_table', 8),
(12, '2025_04_11_112127_add_google_id_in_users_table', 9),
(13, '2025_04_11_183910_add_facebook_id_in_users_table', 10),
(14, '2025_04_13_999999_add_active_status_to_users', 11),
(15, '2025_04_13_999999_add_avatar_to_users', 11),
(16, '2025_04_13_999999_add_dark_mode_to_users', 11),
(17, '2025_04_13_999999_add_messenger_color_to_users', 11),
(18, '2025_04_13_999999_create_chatify_favorites_table', 11),
(19, '2025_04_13_999999_create_chatify_messages_table', 11),
(20, '2025_04_16_074823_move_resume_column_in_job_applications_table', 12),
(21, '2025_04_21_152739_create_create_resumes_table', 13),
(22, '2025_05_21_062337_add_expiry_date_to_jobs_table', 14),
(24, '2025_05_23_123810_add_status_to_job_applications_table', 15),
(25, '2025_05_25_124648_add_views_to_jobs_table', 16);

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
('hamza@gmail.com', 'IdrFNdP0YJKoJuA1Ob7CW5snrrpVXiNrQVQeVfjygJVPX1XLcgxQHlemOjIu', '2025-04-15 00:59:57'),
('hashir@gmail.com', 'KkYUihZzUN8uBBZo37Tx9BVMAOZyLnXb8SqYIDhlmmaE8wPf2njHTtEjNjhg', '2025-03-20 13:57:44'),
('mudakkirafridi@gmail.com', 'MqvRplIH6eAi6eyfIROtYCAn8ODEkL1jVgFBFZTFFSkakqatnkQWm9CWxwtd', '2025-04-21 01:11:13'),
('saad@gmail.com', 'Qn139cV3JJKdGxtC2NkRcYWfpG6C3EmSCekBtLXRl3LavqESJkNyLgjLhQL6', '2025-03-20 14:40:56'),
('zahirullah2099@gmail.com', '3XYofbmb9BfT5urGCLhROtjpEpXO91FvnW3xpCshxOvUTGyHVh9ZXFEcVwrQ', '2025-03-27 15:12:29');

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
(21, 34, 2, '2025-03-07 13:52:30', '2025-03-07 13:52:30'),
(22, 34, 1, '2025-03-07 14:08:20', '2025-03-07 14:08:20'),
(23, 10, 3, '2025-03-15 06:30:28', '2025-03-15 06:30:28'),
(25, 10, 8, '2025-03-21 07:07:42', '2025-03-21 07:07:42'),
(26, 41, 21, '2025-03-27 14:59:33', '2025-03-27 14:59:33');

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
('SVu3cEvQj9jupKkuDi2MGzIiBkycr54TGG7cwuwj', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia1VWaGVwRjRDWmlZMURxZm1DVHVLamIxWWhuc3ZNS2NmRVhGQmQxdCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zZW5kLWVtYWlsIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1742037873);

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `google_id` varchar(255) DEFAULT NULL,
  `facebook_id` varchar(255) DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT 0,
  `avatar` varchar(255) NOT NULL DEFAULT 'avatar.png',
  `dark_mode` tinyint(1) NOT NULL DEFAULT 0,
  `messenger_color` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `image`, `designation`, `mobile`, `role`, `remember_token`, `created_at`, `updated_at`, `google_id`, `facebook_id`, `active_status`, `avatar`, `dark_mode`, `messenger_color`) VALUES
(1, 'hamza', 'hamza@gmail.com', NULL, '$2y$12$LX11DLy/sQEu8uIbd.V6x.PmHJBeH9Uz/U3SnTGlIA3A6IPh0Ym8W', '1-1739167825.jpg', 'programmer', '+394857434', 'user', NULL, '2025-02-06 13:40:14', '2025-04-18 05:36:58', NULL, NULL, 0, 'avatar.png', 0, NULL),
(2, 'Zahir ullah', 'zahirullah20@gmail.com', NULL, '$2y$12$58CBQKzwcZA1pZ2XxEIs8Oh/ntpKyAgCDUKe3NX01PavIv4e/1W72', '2-1739441015.png', NULL, '+2452552', 'admin', NULL, '2025-02-06 13:42:25', '2025-03-27 15:14:05', NULL, NULL, 0, 'avatar.png', 0, NULL),
(3, 'hashir jan', 'hashir@gmail.com', NULL, '$2y$12$ZyD.kUWB5pZdRJiza4CaMucT0skxJoPxDyyjQ2KuOH.nXoff5QTU2', NULL, 'Software Engineer', '+2525243145', 'user', NULL, '2025-02-06 13:44:19', '2025-04-18 05:59:13', NULL, NULL, 0, 'avatar.png', 1, NULL),
(5, 'mustafa khan', 'mustafa@gmail.com', NULL, '$2y$12$VGJPrffgPS7FSoidBOPVIO/q1e/Msh8rdCu3yG33aJWpw52ScVnYC', NULL, 'designer', '03025982099', 'user', NULL, '2025-02-08 03:55:10', '2025-03-03 05:17:02', NULL, NULL, 0, 'avatar.png', 0, NULL),
(8, 'saad khan', 'saad@gmail.com', NULL, '$2y$12$SX7brljUnPuwsEAiN8d7T.ghBKef0fPmXBA7tRGQAbKSm2Ii7mETu', '8-1740232929.png', 'Software Engineer', '2435243525', 'user', NULL, '2025-02-13 01:43:10', '2025-04-23 09:49:40', NULL, NULL, 0, 'avatar.png', 0, NULL),
(9, 'zahir ullah shinwari', 'zahirullah@gmail.com', NULL, '$2y$12$QOR3NMyQBTF22fZ90xKTDOYDxoFz8AiFU4f7vK6WRyPo05qiZTOf.', NULL, 'programmerr', '03025982099', 'user', NULL, '2025-02-19 05:01:19', '2025-03-07 07:50:19', NULL, NULL, 0, 'avatar.png', 0, NULL),
(20, 'murad hassan', 'murad@gmail.com', NULL, '$2y$12$w7EZO71OW9/VWF2fzbjVP.7t3su/eEC9owwjSo1iYBewWNDQnGEoW', NULL, NULL, NULL, 'user', NULL, '2025-03-17 15:26:41', '2025-03-17 15:26:41', NULL, NULL, 0, 'avatar.png', 0, NULL),
(21, 'mudakkir afridi', 'mudakkirafridi@gmail.com', NULL, '$2y$12$b5IxlS5jzPmpjbYnQfOIOeAZQ6N8qw86GmtpqHl.SI3MzAQvlUQ2O', '21-1743106263.jpg', 'UI/UX Designer', '03078555817', 'user', NULL, '2025-03-27 14:55:50', '2025-05-23 12:15:57', NULL, NULL, 0, 'avatar.png', 0, NULL),
(25, 'Career Vibe', 'careervibe2099@gmail.com', NULL, 'eyJpdiI6IlZRYnFkakRmODFrWXBNYmY2THppRlE9PSIsInZhbHVlIjoiQ2NnNndWZkxObjBQc2U2eGZiQ3M2cHZ1S3VlY293dDZTQkNpbTIrR0YrTT0iLCJtYWMiOiJkMGVkNWNmZGNjNzRjMGM1YzA2ZDAwYTc2N2YxNTVmNjhkMTY3MWIyMTI2MWY4NDRkZWQ5ZTY3ZTMyM2RlMWQxIiwidGFnIjoiIn0=', NULL, NULL, NULL, 'user', NULL, '2025-04-11 06:37:39', '2025-04-11 06:37:39', '107984213763866440673', NULL, 0, 'avatar.png', 0, NULL),
(29, 'Zahir Ullah', 'zahirullah2099@gmail.com', NULL, 'eyJpdiI6IldTWDQ4T29YSkFUUm16TUhXM2Y2Z1E9PSIsInZhbHVlIjoiWjd3cXhOUUJmNXRrM3dqUkJaVE9ZOW55YnhNOW9aSEhUOE5RbHk4b3Y1QT0iLCJtYWMiOiI0YTRjNzNiNTgzZTFiY2M4NDBjZDBlYjAyNWZmYWQ4MDljMzlhMmViMWRlYjZlNTBjZTdhMGNhZWJiMTc2YjIxIiwidGFnIjoiIn0=', NULL, NULL, NULL, 'user', NULL, '2025-04-13 03:27:29', '2025-04-13 03:27:29', '114625325273882368215', NULL, 0, 'avatar.png', 0, NULL),
(31, 'Zahir Ullah', 'dummy@gmail.com', NULL, 'eyJpdiI6IlJOZlRMVkQ5Z04wdkFsblpTMXdiTmc9PSIsInZhbHVlIjoiTlowaUdpSTJJNWVJM0xWTnVaSHc5TmkxL1AzQ3lPSDJROExtaTRkQ0grOD0iLCJtYWMiOiIwNGEzM2IwYWUzZTRiZTY2MTNmMWY2M2M5ZGIxOGVkOTE1NjExZDBlM2M0NTBiMjVhOTZjNjBhZmU4ZTk3ODgwIiwidGFnIjoiIn0=', NULL, NULL, NULL, 'user', NULL, '2025-04-13 03:37:28', '2025-04-13 03:37:28', NULL, '2389679968077289', 0, 'avatar.png', 0, NULL),
(32, 'shoaib', 'shoaib@gmail.com', NULL, '$2y$12$1Z5VtvFyvlJ6CbNIngGgXOOd.kkxD5oVXltjdiQoMb6rRLHzklmOS', NULL, NULL, NULL, 'user', NULL, '2025-04-18 05:38:07', '2025-04-18 05:38:07', NULL, NULL, 0, 'avatar.png', 0, NULL);

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
-- Indexes for table `ch_favorites`
--
ALTER TABLE `ch_favorites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ch_messages`
--
ALTER TABLE `ch_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `create_resumes`
--
ALTER TABLE `create_resumes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `create_resumes_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `create_resumes`
--
ALTER TABLE `create_resumes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `job_applications`
--
ALTER TABLE `job_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `job_types`
--
ALTER TABLE `job_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `saved_jobs`
--
ALTER TABLE `saved_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `create_resumes`
--
ALTER TABLE `create_resumes`
  ADD CONSTRAINT `create_resumes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
