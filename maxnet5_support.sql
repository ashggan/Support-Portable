-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 03, 2020 at 02:44 PM
-- Server version: 10.2.32-MariaDB-log
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maxnet5_support`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comapny` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'normal',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'this is a brief description about the company',
  `suspense` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `created_at`, `updated_at`, `name`, `email`, `comapny`, `phone`, `password`, `priority`, `remember_token`, `description`, `suspense`) VALUES
(1, '2018-10-03 22:13:52', '2018-10-03 22:13:52', 'client', 'client@gmail.com', 'Maxnet', '89534587345', '$2y$10$MtmH/GvrmN8qOZoqcuTuj.toaZQIOPFpO/S8jcv6.Ay5MKoaUA31O', 'normal', '3IZ8J5gN48Jd7O4zIyuolR2M03Sv7EIyLEZxTcPCzbLcfXT7673elMNl3Ydw', 'this is a brief description about the company', 0),
(2, '2018-10-09 04:57:10', '2018-10-24 20:37:20', 'Rana', 'rana@gmail.com', 'maxnet', '45345345', '$2y$10$EnB0UyrFFH2nGXGIEV4tLOuQbJXU7S30yk9FnAKYBf/ccuBZettLW', 'normal', NULL, 'this is a brief description about the company', 0),
(4, '2018-10-09 05:01:56', '2018-10-24 20:36:59', 'Mike  Andrew', 'mike@gmail.com', 'New company', '5435345345', '$2y$10$creNdS01UL99E9ILHj62A.xRVdmhlUMTRZbpJoTiTxhut6eqfMcKW', 'normal', NULL, 'this is a brief description about the company', 0);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2018_10_03_140741_create_clients_table', 2),
(5, '2018_10_06_104408_create_requests_table', 3),
(6, '2018_10_07_200759_laratrust_setup_tables', 4),
(7, '2018_10_09_060145_add_solution_request_table', 5),
(8, '2018_10_19_160740_add_subject_to_requests_table', 6),
(9, '2018_10_20_200703_add_description_to_clients_table', 7),
(11, '2018_10_24_220759_add_culumn_t_users_table', 8),
(13, '2018_11_29_080740_add_attachment_reuest_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('mana@gmail.com', '$2y$10$NsnBXG2oRupVlSkkA1CQvO2w0LGdQnb1LupBuBzYp0BaoUAY6oyBK', '2018-10-14 23:52:00');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'create-users', 'Create Users', 'all user to create new user', '2018-10-07 18:28:34', '2018-10-12 12:25:46'),
(2, 'read-users', 'View Users', 'all your to browser users', '2018-10-07 18:28:34', '2018-10-12 12:30:20'),
(3, 'update-users', 'Modify Users', 'allow user to modify the uesrs data', '2018-10-07 18:28:34', '2018-10-12 12:31:24'),
(4, 'delete-users', 'Delete Users', 'allow user to delete Users', '2018-10-07 18:28:34', '2018-10-12 12:31:54'),
(5, 'create-acl', 'Create Role', 'all user to create new roles', '2018-10-07 18:28:34', '2018-10-12 13:10:10'),
(6, 'read-acl', 'View Clients', 'allow user to browser clients', '2018-10-07 18:28:34', '2018-10-12 12:57:59'),
(7, 'update-acl', 'Modify Clients', 'allow user to modify the clients data', '2018-10-07 18:28:34', '2018-10-12 12:58:40'),
(8, 'delete-acl', 'Delete Request', 'allow user to delete Requests', '2018-10-07 18:28:34', '2018-10-12 12:44:13'),
(9, 'read-profile', 'View Request', 'allow user to view requests', '2018-10-07 18:28:34', '2018-10-12 12:33:01'),
(10, 'update-profile', 'Assign Request', 'allow uesr to assign request to specific user', '2018-10-07 18:28:34', '2018-10-12 12:38:53'),
(11, 'create-profile', 'Solve Request', 'allow user to solve requests that are assigned to him', '2018-10-07 18:28:35', '2018-10-12 12:40:07'),
(12, 'delete_request', 'Delete Request', 'allow user to delete requests', '2018-10-11 22:00:00', '2018-10-11 22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(6, 2),
(7, 1),
(7, 2),
(8, 1),
(9, 1),
(9, 3),
(10, 1),
(10, 3),
(11, 1),
(11, 3),
(12, 1),
(12, 3);

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_user`
--

INSERT INTO `permission_user` (`permission_id`, `user_id`, `user_type`) VALUES
(9, 3, 'App\\User'),
(10, 3, 'App\\User'),
(11, 3, 'App\\User');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ticket` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detials` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `screenshots` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'not_yet',
  `prioirty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'normal',
  `assignee` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `leadtime` int(11) DEFAULT NULL,
  `solution` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subjects` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'this request is about this subject',
  `attachment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `created_at`, `updated_at`, `ticket`, `detials`, `client_id`, `screenshots`, `status`, `prioirty`, `assignee`, `leadtime`, `solution`, `subjects`, `attachment`) VALUES
(1, '2018-10-07 09:23:55', '2018-10-07 09:23:55', '0001', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 1, NULL, 'not_yet', 'normal', NULL, NULL, NULL, 'this request is about this subject', NULL),
(2, '2018-10-07 10:53:42', '2018-10-07 10:53:42', '2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 1, NULL, 'not_yet', 'normal', NULL, NULL, NULL, 'this request is about this subject', NULL),
(3, '2018-10-07 10:54:41', '2018-10-07 10:54:41', '3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 1, NULL, 'not_yet', 'normal', NULL, NULL, NULL, 'this request is about this subject', NULL),
(4, '2018-10-07 11:14:13', '2018-10-10 02:55:15', '4', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 1, NULL, 'closed', 'high', '24', 60, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'this request is about this subject', NULL),
(5, '2018-10-07 13:02:44', '2018-10-07 13:02:44', '5', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 1, NULL, 'not_yet', 'normal', NULL, NULL, NULL, 'this request is about this subject', NULL),
(6, '2018-10-07 13:03:26', '2018-10-10 02:15:30', '6', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 1, NULL, 'not_yet', 'high', '24', 67, NULL, 'this request is about this subject', NULL),
(7, '2018-10-07 13:04:06', '2018-12-06 18:05:51', '7', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 1, NULL, 'closed', 'normal', '25', 43, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, magni, alias. Tenetur officia nihil cum minima, totam adipisci illo tempora alias maiores, neque repudiandae velit hic accusantium dignissimos aspernatur! Laborum dolorum asperiores nesciunt cumque fugiat accusantium <strong>quam,</strong> provident atque itaque!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, magni, alias. Tenetur officia nihil cum <strong>minima</strong>, totam adipisci illo tempora alias maiores, neque repudiandae velit hic accusantium dignissimos aspernatur! Laborum dolorum asperiores nesciunt cumque fugiat accusantium quam, provident atque itaque!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, magni, alias. Tenetur officia nihil cum minima, totam adipisci illo tempora alias maiores, neque repudiandae velit hic accusantium dignissimos aspernatur! Laborum dolorum asperiores nesciunt cumque fugiat accusantium quam, provident atque itaque!</p>', 'this request is about this subject', 'Gastown-Resume-Purple-Letter_1544090751.docx'),
(8, '2018-10-07 13:04:43', '2018-10-10 03:05:01', '8', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 1, NULL, 'not_yet', 'high', '1', 23, NULL, 'this request is about this subject', NULL),
(9, '2018-10-07 13:05:24', '2018-10-10 08:29:57', '9', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 1, NULL, 'closed', 'normal', '1', 33, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum', 'this request is about this subject', NULL),
(10, '2018-10-09 03:33:57', '2018-10-10 08:32:00', '10', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.  Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 1, NULL, 'closed', 'high', '2', 50, 'RequestContrllerRequestContrllerRequestContrllerRequestContrllerRequestContrllerR\r\nequestContrllerRequestContrllerRequestContrllerRequestContrllerRequestContrllerRe\r\nquestContrllerRequestContrllerRequestContrllerRequestContrllerRequestContrllerRe\r\nquestContrllerRequestContrllerRequestContrllerRequestContrllerRequestContrllerRe\r\nquestContrllerRequestContrllerRequestContrllerRequestContrllerRequestContrllerRe\r\nquestContrllerRequestContrllerRequestContrllerRequestContrllerRequest\r\nContrller', 'this request is about this subject', NULL),
(13, '2018-10-14 22:37:45', '2018-10-14 22:37:45', '13', '<table align=\"center\" border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<thead>\r\n		<tr>\r\n			<th scope=\"col\">dfdf</th>\r\n			<th scope=\"col\">sdf</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>sdf</td>\r\n			<td>sdf</td>\r\n		</tr>\r\n		<tr>\r\n			<td>sdf</td>\r\n			<td>sdf</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<h1>sdfsdfsdf (<strong>sdfsdf</strong>):</h1>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>\r\n\r\n	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>\r\n	</li>\r\n	<li>\r\n	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>\r\n	</li>\r\n	<li>\r\n	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>\r\n	</li>\r\n</ul>', 1, NULL, 'not_yet', 'normal', NULL, NULL, NULL, 'this request is about this subject', NULL),
(11, '2018-10-12 23:28:13', '2018-10-12 23:28:13', '11', '<table align=\"center\" border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<thead>\r\n		<tr>\r\n			<th scope=\"col\">dfdf</th>\r\n			<th scope=\"col\">sdf</th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>sdf</td>\r\n			<td>sdf</td>\r\n		</tr>\r\n		<tr>\r\n			<td>sdf</td>\r\n			<td>sdf</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<h1>sdfsdfsdf (<strong>sdfsdf</strong>):</h1>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>\r\n\r\n	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>\r\n	</li>\r\n	<li>\r\n	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>\r\n	</li>\r\n	<li>\r\n	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>\r\n	</li>\r\n</ul>', 1, NULL, 'not_yet', 'normal', NULL, NULL, NULL, 'this request is about this subject', NULL),
(12, '2018-10-12 23:29:59', '2018-11-30 15:34:28', '12', '<h1>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h1>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>\r\n\r\n<hr />\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>\r\n			</td>\r\n			<td>\r\n			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>\r\n			</td>\r\n			<td>\r\n			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>\r\n			</td>\r\n			<td>\r\n			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<h1>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h1>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>\r\n	</li>\r\n	<li>\r\n	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>\r\n\r\n	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>\r\n	</li>\r\n</ul>', 1, NULL, 'closed', 'high', '25', 60, '<p>Uplaoad an <strong>attachment</strong></p>', 'this request is about this subject', 'AshganMustafaResume_1543599268.pdf'),
(14, '2018-10-14 22:42:06', '2018-10-14 22:42:06', '14', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>\r\n\r\n<p>sdlfjjdsfj</p>\r\n\r\n<p>sdfjjdfs</p>\r\n\r\n<p>hfsdjfhdsfjfjhsdfjh</p>', 1, NULL, 'not_yet', 'normal', NULL, NULL, NULL, 'this request is about this subject', NULL),
(15, '2018-10-16 11:43:18', '2018-10-16 11:43:18', '15', '<p><strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</strong></p>\r\n\r\n<p>sdlfjjdsfj</p>\r\n\r\n<p>sdfjjdfs</p>\r\n\r\n<table align=\"left\" border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:164px; width:500px\" summary=\"sme summery\">\r\n	<caption>some caption</caption>\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</strong></td>\r\n			<td><strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</strong></td>\r\n			<td><strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</strong></td>\r\n			<td><strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</strong></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>', 1, NULL, 'not_yet', 'normal', NULL, NULL, NULL, 'this request is about this subject', NULL),
(16, '2018-10-16 11:44:02', '2018-10-16 11:44:02', '16', '<p><strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</strong></p>\r\n\r\n<p>sdlfjjdsfj</p>\r\n\r\n<p>sdfjjdfs</p>\r\n\r\n<table align=\"left\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:164px; width:500px\" summary=\"sme summery\">\r\n	<caption>some caption</caption>\r\n	<thead>\r\n		<tr>\r\n			<th scope=\"col\"><strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</strong></th>\r\n			<th scope=\"col\"><strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</strong></th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</strong></td>\r\n			<td><strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</strong></td>\r\n			<td><strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</strong></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>', 1, NULL, 'not_yet', 'normal', NULL, NULL, NULL, 'this request is about this subject', NULL),
(17, '2018-10-16 11:44:35', '2018-12-11 14:54:20', '17', '<p><strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</strong></p>\r\n\r\n<p>sdlfjjdsfj</p>\r\n\r\n<p>sdfjjdfs</p>\r\n\r\n<table align=\"center\" border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:164px; width:500px\" summary=\"sme summery\">\r\n	<caption>some caption</caption>\r\n	<thead>\r\n		<tr>\r\n			<th scope=\"col\"><strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</strong></th>\r\n			<th scope=\"col\"><strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</strong></th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</strong></td>\r\n			<td><strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</strong></td>\r\n			<td><strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</strong></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>', 1, NULL, 'feedback', 'high', '25', 55, '<p>Verse 1: Rihanna]<br />\r\n<a href=\"https://genius.com/Rihanna-stay-lyrics#note-1239014\">All along it was a fever</a><br />\r\n<a href=\"https://genius.com/Rihanna-stay-lyrics#note-1524222\">A cold sweat, hot-headed believer</a><br />\r\n<a href=\"https://genius.com/Rihanna-stay-lyrics#note-1532183\">I threw my hands in the air, said show me something<br />\r\nHe said, &quot;If you dare come a little closer&quot;</a><br />\r\n<a href=\"https://genius.com/Rihanna-stay-lyrics#note-1524232\">Round and around and around and around we go</a><br />\r\n<a href=\"https://genius.com/Rihanna-stay-lyrics#note-1524530\">Oh now tell me now tell me now tell me now you know</a><br />\r\n<br />\r\n[Chorus: Rihanna]<br />\r\n<a href=\"https://genius.com/Rihanna-stay-lyrics#note-1524511\">Not really sure how to feel about it<br />\r\nSomething in the way you move<br />\r\nMakes me feel like I can&#39;t live without you<br />\r\nAnd it takes me all the way<br />\r\nI want you to stay</a><br />\r\n<br />\r\n<a href=\"https://genius.com/Rihanna-stay-lyrics#note-1524254\">[Verse 2: Mikky Ekko]</a><br />\r\nIt&#39;s not much of a life you&#39;re living<br />\r\n<a href=\"https://genius.com/Rihanna-stay-lyrics#note-1536198\">It&#39;s not just something you take, it&#39;s given</a><br />\r\n<a href=\"https://genius.com/Rihanna-stay-lyrics#note-1318858\">Round and around and around and around we go<br />\r\nOh, now tell me now, tell me now, tell me now you know</a><br />\r\n<br />\r\n[Chorus: Mikky Ekko]<br />\r\n<a href=\"https://genius.com/Rihanna-stay-lyrics#note-1524511\">Not really sure how to feel about it<br />\r\nSomething in the way you move<br />\r\nMakes me feel like I can&#39;t live without you<br />\r\nAnd it takes me all the way<br />\r\nI want you to stay</a></p>', 'this request is about this subject', 'Mohammed Yagoub - FIB Merchant_1544511252.pdf'),
(18, '2018-10-16 11:51:29', '2018-10-16 11:51:29', '18', '<table align=\"center\" border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:164px; width:500px\" summary=\"sme summery\">\r\n	<caption>some caption</caption>\r\n	<thead>\r\n		<tr>\r\n			<th scope=\"col\"><strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</strong></th>\r\n			<th scope=\"col\"><strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</strong></th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</strong></td>\r\n			<td><strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</strong></td>\r\n			<td><strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</strong></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>', 1, NULL, 'not_yet', 'normal', NULL, NULL, NULL, 'this request is about this subject', NULL),
(19, '2018-10-16 11:54:47', '2018-10-16 11:54:47', '19', '<table align=\"center\" border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:164px; width:500px\" summary=\"sme summery\">\r\n	<caption>some caption</caption>\r\n	<thead>\r\n		<tr>\r\n			<th scope=\"col\"><strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</strong></th>\r\n			<th scope=\"col\"><strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</strong></th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</strong></td>\r\n			<td><strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</strong></td>\r\n			<td><strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</strong></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>', 1, NULL, 'not_yet', 'normal', NULL, NULL, NULL, 'this request is about this subject', NULL),
(20, '2018-10-16 11:58:44', '2018-12-01 17:44:47', '20', '<table align=\"center\" border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"height:164px; width:500px\" summary=\"sme summery\">\r\n	<caption>some caption</caption>\r\n	<thead>\r\n		<tr>\r\n			<th scope=\"col\"><strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</strong></th>\r\n			<th scope=\"col\"><strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</strong></th>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</strong></td>\r\n			<td><strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</strong></td>\r\n			<td><strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</strong></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<h1>this is title</h1>', 1, NULL, 'open', 'normal', '23', 60, NULL, 'this request is about this subject', NULL),
(22, '2018-12-01 17:55:47', '2018-12-01 17:55:47', '21', '<p>Tell us your Request Tell us your Request Tell us your Request Tell us your Request Tell us your Request Tell us your Request Tell us your Request Tell us your Request Tell us your Request Tell us your Request Tell us your Request Tell us your Request Tell us your Request Tell us your Request Tell us your Request Tell us your Request Tell us your Request Tell us your Request Tell us your Request Tell us your Request Tell us your Request Tell us your Request Tell us your Request Tell us your Request Tell us your Request Tell us your Request Tell us your Request Tell us your Request Tell us your Request Tell us your Request Tell us your Request Tell us your Request Tell us your Request Tell us your Request Tell us your Request Tell us your Request Tell us your Request Tell us your Request Tell us your Request</p>', 1, NULL, 'not_yet', 'normal', NULL, NULL, NULL, 'Request Subject', NULL),
(23, '2018-12-01 23:47:37', '2018-12-01 23:47:37', '22', 'Tell us your Request', 1, NULL, 'not_yet', 'normal', NULL, NULL, NULL, 'Request Subject', NULL),
(24, '2018-12-01 23:48:59', '2018-12-02 00:30:07', '23', '<p>Tell us your RequestTell us your RequestTell us your RequestTell us your RequestTell us your RequestTell us your RequestTell us your RequestTell us your RequestTell us your RequestTell us your RequestTell us your RequestTell us your RequestTell us your RequestTell us your RequestTell us your RequestTell us your RequestTell us your RequestTell us your RequestTell us your RequestTell us your RequestTell us your RequestTell us your RequestTell us your RequestTell us your RequestTell us your RequestTell us your RequestTell us your RequestTell us your RequestTell us your RequestTell us your RequestTell us your RequestTell us your RequestTell us your RequestTell us your RequestTell us your RequestTell us your RequestTell us your RequestTell us your RequestTell us your RequestTell us your RequestTell us your RequestTell us your Request</p>', 1, NULL, 'not_yet', 'normal', NULL, NULL, NULL, 'Request Subject', NULL),
(25, '2018-12-01 23:51:11', '2018-12-01 23:51:11', '24', 'and examples for badges, our small count and labeling component.Documentation and examples for badges, our small count and labeling component.Documentation and examples for badges, our small count and labeling component.Documentation and examples for badges, our small count and labeling component.Documentation and examples for badges, our small count and labeling component.Documentation and examples for badges, our small count and labeling component.Documentation and examples for badges, our small count and labeling component.', 1, 'slider-1_1543715471.jpg', 'not_yet', 'normal', NULL, NULL, NULL, 'Documentation Documentation and examples for badges, our small count and labeling component.', NULL),
(26, '2018-12-02 10:55:20', '2018-12-02 10:55:20', '25', 'In need of a button, but not the hefty background colors they bring? Replace the default modifier classes with the .btn-outline-* ones to remove all background images and colors on any button.In need of a button, but not the hefty background colors they bring? Replace the default modifier classes with the .btn-outline-* ones to remove all background images and colors on any button.In need of a button, but not the hefty background colors they bring? Replace the default modifier classes with the .btn-outline-* ones to remove all background images and colors on any button.', 1, 'Gastown-Resume-Purple-A4_1543719320.docx', 'not_yet', 'normal', NULL, NULL, NULL, 'Outline buttons', NULL),
(27, '2018-12-05 00:41:31', '2018-12-06 16:47:11', '26', '<p>Documentation Documentation and examples for badges, our small count and labeling component.Documentation Documentation and examples for badges, our small count and labeling component.Documentation Documentation and examples for badges, our small count and labeling component.Documentation Documentation and examples for badges, our small count and labeling component.</p>', 1, 'Gastown-Resume-Purple-Letter_1543941691.docx', 'not_yet', 'normal', NULL, NULL, NULL, 'Documentation', NULL),
(28, '2018-12-06 16:47:56', '2018-12-06 16:47:56', '27', '<p>Documentation Documentation and examples for badges, our small count and labeling component.Documentation Documentation and examples for badges, our small count and labeling component.Documentation Documentation and examples for badges, our small count and labeling component.Documentation Documentation and examples for badges, our small count and labeling component.Documentation Documentation and examples for badges, our small count and labeling component.Documentation Documentation and examples for badges, our small count and labeling component.Documentation Documentation and examples for badges, our small count and labeling component.</p>', 1, 'pexels-photo-47426_1544086075.jpeg', 'not_yet', 'normal', NULL, NULL, NULL, 'Request Subject', NULL),
(29, '2018-12-06 17:59:56', '2018-12-06 17:59:56', '28', '<p>Documentation Documentation and examples for badges, our small count and labeling component.Documentation Documentation and examples for badges, our small count and labeling component.Documentation Documentation and examples for badges, our small count and labeling component.Documentation Documentation and examples for badges, our small count and labeling component.Documentation Documentation and examples for badges, our small count and labeling component.Documentation Documentation and examples for badges, our small count and labeling component.Documentation Documentation and examples for badges, our small count and labeling component.Documentation Documentation and examples for badges, our small count and labeling component.Documentation Documentation and examples for badges, our small count and labeling component.Documentation Documentation and examples for badges, our small count and labeling component.Documentation Documentation and examples for badges, our small count and labeling component.Documentation Documentation and examples for badges, our small count and labeling component.</p>', 1, 'PMBOK_1544090394.pdf', 'not_yet', 'normal', NULL, NULL, NULL, 'Request Subject', NULL),
(30, '2018-12-11 14:36:51', '2018-12-11 14:36:51', '29', '<p>qwertyuiop sdfghjkl xcvbnm, uiri uiuer ytuir tu yw uertr ui4thu8wt&nbsp; uh uirehiuoi wp8ufie riu uy triru iuirr hiuwr&nbsp; iuguir gyurty uifehigu guiguierhuerroiusiuregh&nbsp; uyjij ifeu p9tprwi&nbsp; iotugiui4&nbsp; rtwoiu njh roiiu oituy98 t5eu yoitw4uy e56i uoi uowi6yuoeiuyoit&nbsp; oioy uoi juoei hjue i oiytjioruoryu ioiutiuyhurtuu ityoei ioty peioiutypouioytpeorydiuiotuiryutyiuepotuyiot ityuietuytiyjj</p>', 1, 'FIB Merchants With Wateen_1544510209.pdf', 'not_yet', 'normal', NULL, NULL, NULL, 'test', NULL),
(31, '2018-12-11 14:37:10', '2018-12-30 05:21:52', '30', '<p>qwertyuiop sdfghjkl xcvbnm, uiri uiuer ytuir tu yw uertr ui4thu8wt&nbsp; uh uirehiuoi wp8ufie riu uy triru iuirr hiuwr&nbsp; iuguir gyurty uifehigu guiguierhuerroiusiuregh&nbsp; uyjij ifeu p9tprwi&nbsp; iotugiui4&nbsp; rtwoiu njh roiiu oituy98 t5eu yoitw4uy e56i uoi uowi6yuoeiuyoit&nbsp; oioy uoi juoei hjue i oiytjioruoryu ioiutiuyhurtuu ityoei ioty peioiutypouioytpeorydiuiotuiryutyiuepotuyiot ityuietuytiyjj</p>', 1, 'product-data_1546118512.xlsx', 'not_yet', 'normal', NULL, NULL, NULL, 'test', NULL),
(32, '2018-12-30 05:11:46', '2018-12-30 05:11:46', '31', '<p>Laravel is a popular development platform that is well known for performance and the active user community. Out of the box, Laravel is pretty secure. However, no framework could claim to be 100% secure, and there are always ways to improve the security of the Laravel apps.</p>', 1, 'Anscombe\'s Quartet_1546117906.xlsx', 'not_yet', 'normal', NULL, NULL, NULL, 'Laravel is a popula', NULL),
(33, '2018-12-30 18:49:48', '2018-12-30 18:51:14', '32', '<p>oofiondfkjn;oiuytfdxcvghjiopoijhgvcvbnklkjnbv m,;&#39;;lkjhgfdszxdfyu98uytfrgyuijhj oiuywgfdgfgyduio oiwu optr uoierui iroe rwoiuo huygfdczxdf iuytrdsdtyuoiuygfcvhjsnd diuhghuiiuytdszxcghjop[;lknb louytfddfyuijb ,9876trdszxcvhjo0987ytf mi8765redxcvbnjki87ytfv iuytrfd mkuyhgbjoiuyytrdc cbhv&nbsp; bffhERWT5Y768790-wASDFGHGKJLJK;</p>', 1, 'FIB POS Requirements SoC PA3_1546166988.xlsx', 'open', 'high', '25', 10, NULL, 'ASDFGH', NULL),
(34, '2018-12-31 15:17:16', '2019-02-13 16:49:00', '33', '<p>APG40</p>', 1, NULL, 'open', 'high', '30', 1, NULL, 'kjiljh', NULL),
(35, '2019-01-21 02:15:53', '2019-02-13 16:43:55', '34', '<p>Ayman</p>', 1, NULL, 'open', 'high', '25', 1, NULL, 'APG33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'superadministrator', 'Superadministrator', 'Superadministrator', '2018-10-07 18:28:34', '2018-10-07 18:28:34'),
(2, 'administrator', 'Administrator', 'Database tables are often related to one another. For example, a blog post may have many comment', '2018-10-07 18:28:34', '2018-10-09 02:53:17'),
(3, 'support', 'Support', 'he can manage the requests', '2018-10-09 03:08:59', '2018-10-13 08:58:47');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(1, 1, 'App\\User'),
(2, 2, 'App\\User'),
(3, 23, 'App\\User'),
(3, 25, 'App\\User'),
(3, 30, 'App\\User');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `suspence` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `suspence`) VALUES
(1, 'Superadministrator', 'superadministrator@app.com', '$2y$10$W1rURoXDWeIQfbwjZiCoh.JcudDIBrlTWp0esDW9QC6tbY/q.8NfO', 'BPuqK1uf6tzVax3t3jhIrmodE4nAjO4RPjMWAvT2lmE2DO1QGMgHkHIvPQoh', '2018-10-07 18:28:34', '2018-10-12 15:35:29', 0),
(2, 'Administrator', 'administrator@app.com', '$2y$10$txQkLizJizy/N0.HOlKOl.HOoBOZPpoosG9zSH4BC782HyrRYvzqW', 'hhQgqsalsSiSdpMTYKmPoDXfifAY1k4DpUOLdSAFT5HHs5I7uWCjFID5QNvT', '2018-10-07 18:28:34', '2018-10-07 18:28:34', 0),
(3, 'Cru User', 'cru_user@app.com', '$2y$10$xs4E3H.DhwZ/8pyem7cgq.bJrsU47DNzmfa0KwSb3g47To9oRL1h.', '9thHdBCUnS', '2018-10-07 18:28:35', '2018-10-07 18:28:35', 0),
(25, 'Mana Dane', 'mana@gmail.com', '$2y$10$X2xna0SOam/jSG8WVU0Sf.v62ug78Q7s8mr24Ri5POUGdLqsWUgw6', 'F4jHNsmjzObC99EUvW8fZG618OiWpaJbCUJC7mLONB5zxOWNRgMaMUjQ9jV4', '2018-10-12 15:37:05', '2018-10-21 22:08:05', 0),
(23, 'Rana', 'rana@gmail.com', '$2y$10$aFTWsBUCfSYN2EW9v7T35OBN4/2cd1yNDcYm4AsoTDAMo6y6wh1xS', 'dkGo59cLBx7f9IPOYERDKa6KRtbkiAbUJv7XwK4Q8kfZlCClfjYOAp8cYanf', '2018-10-08 17:52:33', '2018-10-21 00:55:56', 0),
(30, 'R. Saeed', 'r.saeed@maxnet-is.ae', '$2y$10$No7MM1Tk/AOvSW5NBTax4e7c2VKwh.0hNlBnpYCRgSfDlDafLbZ6u', 'M3Ou9DGKqZiE1TPtRIbVPCmQI2hFac7GQNPpKSPsjlhe4RHhndBxiroe8xaK', '2019-02-13 16:42:24', '2019-02-13 16:42:24', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_email_unique` (`email`);

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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `requests_client_id_foreign` (`client_id`),
  ADD KEY `requests_assignee_foreign` (`assignee`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

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
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
