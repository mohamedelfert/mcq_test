-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2022 at 11:39 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz_mcq`
--

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_04_22_185351_create_permission_tables', 1),
(7, '2022_04_23_191328_create_topics_table', 2),
(8, '2022_04_24_192037_create_questions_table', 2),
(9, '2022_04_24_192125_create_question_options_table', 2),
(10, '2014_10_12_000000_create_users_table', 3),
(11, '2022_04_25_110359_create_tests_table', 3),
(12, '2022_04_25_110414_create_results_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(2, 'App\\User', 2),
(2, 'App\\User', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `routes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `guard_name`, `created_at`, `updated_at`, `routes`) VALUES
(1, 'user-list', 'المستخدمين', 'web', '2022-04-22 19:19:47', '2022-04-22 19:19:47', 'users.index'),
(2, 'user-create', 'المستخدمين', 'web', '2022-04-22 19:19:47', '2022-04-22 19:19:47', 'users.create,users.store'),
(3, 'user-edit', 'المستخدمين', 'web', '2022-04-22 19:19:47', '2022-04-22 19:19:47', 'users.edit,users.update'),
(4, 'user-delete', 'المستخدمين', 'web', '2022-04-22 19:19:47', '2022-04-22 19:19:47', 'users.destroy'),
(5, 'role-list', 'الصلاحيات', 'web', '2022-04-22 19:19:47', '2022-04-22 19:19:47', 'roles.index'),
(6, 'role-create', 'الصلاحيات', 'web', '2022-04-22 19:19:47', '2022-04-22 19:19:47', 'roles.create,roles.store'),
(7, 'role-edit', 'الصلاحيات', 'web', '2022-04-22 19:19:47', '2022-04-22 19:19:47', 'roles.edit,roles.update'),
(8, 'role-delete', 'الصلاحيات', 'web', '2022-04-22 19:19:47', '2022-04-22 19:19:47', 'roles.destroy'),
(9, 'language', 'اللغه', 'web', '2022-04-21 22:00:00', '2022-04-21 22:00:00', 'lang'),
(10, 'topic-list', 'المواضيع', 'web', '2022-04-22 22:00:00', '2022-04-22 22:00:00', 'topics.index'),
(11, 'topic-create', 'المواضيع', 'web', '2022-04-22 22:00:00', '2022-04-22 22:00:00', 'topics.create,topics.store'),
(12, 'topic-edit', 'المواضيع', 'web', '2022-04-22 22:00:00', '2022-04-22 22:00:00', 'topics.edit,topics.update'),
(13, 'topic-delete', 'المواضيع', 'web', '2022-04-22 22:00:00', '2022-04-22 22:00:00', 'topics.destroy'),
(14, 'user-show', 'المستخدمين', 'web', '2022-04-22 22:00:00', '2022-04-22 22:00:00', 'users.show'),
(15, 'role-show', 'الصلاحيات', 'web', '2022-04-22 22:00:00', '2022-04-22 22:00:00', 'roles.show'),
(16, 'question-list', 'الاسئله', 'web', '2022-04-23 22:00:00', '2022-04-23 22:00:00', 'questions.index'),
(17, 'question-create', 'الاسئله', 'web', '2022-04-23 22:00:00', '2022-04-23 22:00:00', 'questions.create,questions.store'),
(18, 'question-edit', 'الاسئله', 'web', '2022-04-23 22:00:00', '2022-04-23 22:00:00', 'questions.edit,questions.update'),
(19, 'question-delete', 'الاسئله', 'web', '2022-04-23 22:00:00', '2022-04-23 22:00:00', 'questions.destroy'),
(20, 'question-show', 'الاسئله', 'web', '2022-04-23 22:00:00', '2022-04-23 22:00:00', 'questions.show'),
(21, 'option-list', 'الاختيارات', 'web', '2022-04-23 22:00:00', '2022-04-23 22:00:00', 'options.index'),
(22, 'option-create', 'الاختيارات', 'web', '2022-04-23 22:00:00', '2022-04-23 22:00:00', 'options.create,options.store'),
(23, 'option-edit', 'الاختيارات', 'web', '2022-04-23 22:00:00', '2022-04-23 22:00:00', 'options.edit,options.update'),
(24, 'option-delete', 'الاختيارات', 'web', '2022-04-23 22:00:00', '2022-04-23 22:00:00', 'options.destroy'),
(25, 'option-show', 'الاختيارات', 'web', '2022-04-23 22:00:00', '2022-04-23 22:00:00', 'options.show'),
(26, 'test-list', 'الامتحانات', 'web', '2022-04-24 22:00:00', '2022-04-24 22:00:00', 'tests.index'),
(27, 'test-create', 'الاختبارات', 'web', '2022-04-24 22:00:00', '2022-04-24 22:00:00', 'tests.create,tests.store'),
(28, 'test-edit', 'الاختبارات', 'web', '2022-04-24 22:00:00', '2022-04-24 22:00:00', 'tests.create,tests.store'),
(29, 'test-delete', 'الاختبارات', 'web', '2022-04-24 22:00:00', '2022-04-24 22:00:00', 'tests.destroy'),
(30, 'test-show', 'الاختبارات', 'web', '2022-04-24 22:00:00', '2022-04-24 22:00:00', 'tests.show'),
(31, 'result-list', 'النتائج', 'web', '2022-04-24 22:00:00', '2022-04-24 22:00:00', 'results.index'),
(32, 'result-create', 'النتائج', 'web', '2022-04-24 22:00:00', '2022-04-24 22:00:00', 'results.create,results.store'),
(33, 'result-edit', 'النتائج', 'web', '2022-04-24 22:00:00', '2022-04-24 22:00:00', 'results.edit,results.update'),
(34, 'result-delete', 'النتائج', 'web', '2022-04-24 22:00:00', '2022-04-24 22:00:00', 'results.destroy'),
(35, 'result-show', 'النتائج', 'web', '2022-04-24 22:00:00', '2022-04-24 22:00:00', 'results.show');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `question_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `topic_id` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question_ar`, `question_en`, `topic_id`, `description`, `created_at`, `updated_at`) VALUES
(1, '1 + 1', '1 + 1', 1, 'حاصل الجمع', '2022-04-25 19:04:58', '2022-04-25 19:04:58'),
(2, '5 * 6', '5 * 6', 2, 'حاصل ضرب الرقمين', '2022-04-25 19:05:48', '2022-04-25 19:05:48'),
(3, 'ماهي عاصمه مصر ؟', 'What Is The Capital Of Egypt ?', 1, 'ما هي عاصمه جموهوريه مصر العربيه', '2022-04-25 19:09:39', '2022-04-25 19:09:39'),
(4, 'ما هي أكبر هضبة في العالم ؟', 'What is the largest plateau in the world ?', 3, 'اذكر اكبر هضبه في العالم', '2022-04-25 19:11:27', '2022-04-25 19:11:27'),
(5, 'اذكر عدد حروف اللغه العربيه ؟', 'Mention the number of letters of the Arabic language ?', 3, 'عدد حروف اللغه العربيه', '2022-04-25 19:14:15', '2022-04-25 19:14:15'),
(6, 'اذكر عدد حروف اللغه الانجليزيه ؟', 'Mention the number of letters of the English language ?', 2, 'عدد حروف اللغه الانجليزيه', '2022-04-25 19:15:16', '2022-04-25 19:15:16'),
(7, 'اذكر عدد محافظات جمهوريه مصر العربيه ؟', 'Mention the number of governorates of the Arab Republic of Egypt ?', 3, 'دد محافظات جمهوريه مصر العربيه', '2022-04-25 19:16:35', '2022-04-25 19:16:35'),
(8, 'معك 5 تفاحات اعطيت اخيك الاصغر واحده واكلت 2 فكم تبقي معك ؟', 'You have 5 apples. You gave your younger brother one and you ate two. How many do you have left ?', 1, 'كم عدد التفاح المتبقي معك', '2022-04-25 19:21:24', '2022-04-25 19:21:24'),
(9, 'شيء يتواجد في كل مكان من حولك ولكنك لا تستطيع أن تراه ؟', 'Something is all around you but you can\'t see it ?', 2, 'يتواجد في كل مكان من حولك ولكنك لا تستطيع أن تراه', '2022-04-25 19:24:15', '2022-04-25 19:24:15'),
(10, 'بيت لا يتواجد به أبواب أو شبابيك مطلقًا ؟', 'A house without doors or windows at all ?', 2, 'بيت لا يتواجد به أبواب أو شبابيك مطلقًا ماهو', '2022-04-25 19:25:31', '2022-04-25 19:25:31');

-- --------------------------------------------------------

--
-- Table structure for table `question_options`
--

CREATE TABLE `question_options` (
  `id` int(10) UNSIGNED NOT NULL,
  `option` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `point` tinyint(4) DEFAULT '0',
  `question_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `question_options`
--

INSERT INTO `question_options` (`id`, `option`, `point`, `question_id`, `created_at`, `updated_at`) VALUES
(1, '5', 0, 1, '2022-04-25 19:04:58', '2022-04-25 19:04:58'),
(2, '6', 0, 1, '2022-04-25 19:04:58', '2022-04-25 19:04:58'),
(3, '2', 1, 1, '2022-04-25 19:04:58', '2022-04-25 19:04:58'),
(4, '15', 0, 1, '2022-04-25 19:04:58', '2022-04-25 19:04:58'),
(6, '26', 0, 2, '2022-04-25 19:05:48', '2022-04-25 19:05:48'),
(7, '10', 0, 2, '2022-04-25 19:05:48', '2022-04-25 19:05:48'),
(8, '46', 0, 2, '2022-04-25 19:05:48', '2022-04-25 19:05:48'),
(9, '30', 1, 2, '2022-04-25 19:05:48', '2022-04-25 19:05:48'),
(11, 'دبي', 0, 3, '2022-04-25 19:09:39', '2022-04-25 19:09:39'),
(12, 'القاهره', 1, 3, '2022-04-25 19:09:39', '2022-04-25 19:09:39'),
(13, 'طنطا', 0, 3, '2022-04-25 19:09:39', '2022-04-25 19:09:39'),
(14, 'بنها', 0, 3, '2022-04-25 19:09:39', '2022-04-25 19:09:39'),
(16, 'هضبه التبت', 1, 4, '2022-04-25 19:11:27', '2022-04-25 19:11:27'),
(17, 'هضبه الجولان', 0, 4, '2022-04-25 19:11:27', '2022-04-25 19:11:27'),
(18, 'هضبه منغوليا', 0, 4, '2022-04-25 19:11:27', '2022-04-25 19:11:27'),
(19, 'هضبه الدكن', 0, 4, '2022-04-25 19:11:27', '2022-04-25 19:11:27'),
(21, '28', 1, 5, '2022-04-25 19:14:15', '2022-04-25 19:14:15'),
(22, '30', 0, 5, '2022-04-25 19:14:15', '2022-04-25 19:14:15'),
(23, '15', 0, 5, '2022-04-25 19:14:15', '2022-04-25 19:14:15'),
(24, '33', 0, 5, '2022-04-25 19:14:15', '2022-04-25 19:14:15'),
(26, '45', 0, 6, '2022-04-25 19:15:16', '2022-04-25 19:15:16'),
(27, '26', 1, 6, '2022-04-25 19:15:16', '2022-04-25 19:15:16'),
(28, '30', 0, 6, '2022-04-25 19:15:16', '2022-04-25 19:15:16'),
(29, '41', 0, 6, '2022-04-25 19:15:16', '2022-04-25 19:15:16'),
(31, '15', 0, 7, '2022-04-25 19:16:35', '2022-04-25 19:16:35'),
(32, '33', 0, 7, '2022-04-25 19:16:35', '2022-04-25 19:16:35'),
(33, '27', 1, 7, '2022-04-25 19:16:35', '2022-04-25 19:16:35'),
(34, '20', 0, 7, '2022-04-25 19:16:35', '2022-04-25 19:16:35'),
(36, '5', 0, 8, '2022-04-25 19:21:24', '2022-04-25 19:21:24'),
(37, '3', 0, 8, '2022-04-25 19:21:24', '2022-04-25 19:21:24'),
(38, '4', 0, 8, '2022-04-25 19:21:24', '2022-04-25 19:21:24'),
(39, '2', 1, 8, '2022-04-25 19:21:24', '2022-04-25 19:21:24'),
(41, 'الماء', 0, 9, '2022-04-25 19:24:15', '2022-04-25 19:24:15'),
(42, 'الهواء', 1, 9, '2022-04-25 19:24:15', '2022-04-25 19:24:15'),
(43, 'النار', 0, 9, '2022-04-25 19:24:15', '2022-04-25 19:24:15'),
(44, 'التراب', 0, 9, '2022-04-25 19:24:15', '2022-04-25 19:24:15'),
(46, 'بيت الشعر', 1, 10, '2022-04-25 19:25:31', '2022-04-25 19:25:31'),
(47, 'بيت العنكبوت', 0, 10, '2022-04-25 19:25:31', '2022-04-25 19:25:31'),
(48, 'بيت النحل', 0, 10, '2022-04-25 19:25:31', '2022-04-25 19:25:31'),
(49, 'البيت', 0, 10, '2022-04-25 19:25:31', '2022-04-25 19:25:31');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `test_id` int(10) UNSIGNED NOT NULL,
  `question_id` int(10) UNSIGNED NOT NULL,
  `option_id` int(10) UNSIGNED NOT NULL,
  `point` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `user_id`, `test_id`, `question_id`, `option_id`, `point`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 4, 16, 1, '2022-04-25 19:37:14', '2022-04-25 19:37:14'),
(2, 2, 1, 9, 42, 1, '2022-04-25 19:37:14', '2022-04-25 19:37:14'),
(3, 2, 1, 1, 3, 1, '2022-04-25 19:37:14', '2022-04-25 19:37:14'),
(4, 2, 1, 5, 21, 1, '2022-04-25 19:37:14', '2022-04-25 19:37:14'),
(5, 2, 1, 6, 27, 1, '2022-04-25 19:37:14', '2022-04-25 19:37:14'),
(6, 2, 1, 3, 12, 1, '2022-04-25 19:37:14', '2022-04-25 19:37:14'),
(7, 2, 1, 10, 46, 1, '2022-04-25 19:37:14', '2022-04-25 19:37:14'),
(8, 2, 1, 2, 9, 1, '2022-04-25 19:37:14', '2022-04-25 19:37:14'),
(9, 2, 1, 8, 39, 1, '2022-04-25 19:37:14', '2022-04-25 19:37:14'),
(10, 2, 1, 7, 33, 1, '2022-04-25 19:37:14', '2022-04-25 19:37:14'),
(11, 2, 2, 7, 33, 1, '2022-04-25 19:38:18', '2022-04-25 19:38:18'),
(12, 2, 2, 4, 18, 0, '2022-04-25 19:38:18', '2022-04-25 19:38:18'),
(13, 2, 2, 2, 9, 1, '2022-04-25 19:38:18', '2022-04-25 19:38:18'),
(14, 2, 2, 10, 46, 1, '2022-04-25 19:38:18', '2022-04-25 19:38:18'),
(15, 2, 2, 6, 27, 1, '2022-04-25 19:38:18', '2022-04-25 19:38:18'),
(16, 2, 2, 1, 3, 1, '2022-04-25 19:38:18', '2022-04-25 19:38:18'),
(17, 2, 2, 5, 22, 0, '2022-04-25 19:38:18', '2022-04-25 19:38:18'),
(18, 2, 2, 8, 39, 1, '2022-04-25 19:38:18', '2022-04-25 19:38:18'),
(19, 2, 2, 3, 12, 1, '2022-04-25 19:38:18', '2022-04-25 19:38:18'),
(20, 2, 2, 9, 42, 1, '2022-04-25 19:38:18', '2022-04-25 19:38:18');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'مدير', 'web', '2022-04-22 19:19:47', '2022-04-22 19:39:43'),
(2, 'user', 'مستخدم', 'web', '2022-04-22 19:26:53', '2022-04-22 19:26:53');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(9, 2),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(26, 2),
(27, 1),
(27, 2),
(28, 1),
(28, 2),
(29, 1),
(29, 2),
(30, 1),
(30, 2),
(31, 1),
(31, 2),
(32, 1),
(32, 2),
(33, 1),
(33, 2),
(34, 1),
(34, 2),
(35, 1),
(35, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` int(10) UNSIGNED NOT NULL,
  `result` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `result`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '10', 2, '2022-04-25 19:37:14', '2022-04-25 19:37:14'),
(2, '8', 2, '2022-04-25 19:38:18', '2022-04-25 19:38:18');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `name_ar`, `name_en`, `created_at`, `updated_at`) VALUES
(1, 'قسم 1', 'topic 1', '2022-04-24 17:33:00', '2022-04-24 17:33:00'),
(2, 'قسم 2', 'topic 2', '2022-04-24 17:33:15', '2022-04-24 17:33:15'),
(3, 'قسم 3', 'topic 3', '2022-04-24 17:33:29', '2022-04-24 17:33:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `role_name`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '$2y$10$pHZYOXUpbfq.gwEnZR6s6.KfN8ZbqQyhcjhqGkthnNQ553aVnGZnW', '01153225410', 'admin', 'active', NULL, '2022-04-25 09:13:45', '2022-04-25 09:14:26'),
(2, 'test user', 'bankblood71@gmail.com', NULL, '$2y$10$/VUZW9pYxF82Nk.rDQA99OX4AnIHHnnMyXQd115ng3UzokZBxvvRW', '01011731930', 'user', 'active', NULL, '2022-04-25 09:15:22', '2022-04-25 09:15:45'),
(3, 'ali ahmed', 'ali@yahoo.com', NULL, '$2y$10$PdjgvqK/euh6K/XwEz4Fv.GsH0yb0zbfb674L0wQQb7C/z2EabDAu', '12345678900', 'user', 'active', NULL, '2022-04-25 09:16:35', '2022-04-25 09:17:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_topic_id_foreign` (`topic_id`);

--
-- Indexes for table `question_options`
--
ALTER TABLE `question_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_options_question_id_foreign` (`question_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `results_user_id_foreign` (`user_id`),
  ADD KEY `results_test_id_foreign` (`test_id`),
  ADD KEY `results_question_id_foreign` (`question_id`),
  ADD KEY `results_option_id_foreign` (`option_id`);

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
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tests_user_id_foreign` (`user_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `question_options`
--
ALTER TABLE `question_options`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

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
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_topic_id_foreign` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `question_options`
--
ALTER TABLE `question_options`
  ADD CONSTRAINT `question_options_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_option_id_foreign` FOREIGN KEY (`option_id`) REFERENCES `question_options` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `results_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `results_test_id_foreign` FOREIGN KEY (`test_id`) REFERENCES `tests` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `results_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tests`
--
ALTER TABLE `tests`
  ADD CONSTRAINT `tests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
