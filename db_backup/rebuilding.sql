-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2019 at 07:39 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rebuilding`
--

-- --------------------------------------------------------

--
-- Table structure for table `action_types`
--

CREATE TABLE `action_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `action_type` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `published` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `action_types`
--

INSERT INTO `action_types` (`id`, `action_type`, `published`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 'Show', 1, '2019-07-05 12:59:11', '2019-07-10 00:51:11', NULL),
(6, 'Add', 1, '2019-07-05 12:59:27', '2019-07-10 00:51:06', '2019-07-10 00:51:06'),
(7, 'Edit', 1, '2019-07-05 12:59:48', '2019-07-15 04:20:00', NULL),
(8, 'Delete', 1, '2019-07-05 12:59:58', '2019-07-15 05:02:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `published` tinyint(4) NOT NULL,
  `deleted` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `published`, `deleted`, `created_at`, `updated_at`) VALUES
(8, 'Ctg2', 1, 0, '2019-07-01 05:07:40', '2019-07-01 06:39:16'),
(9, 'Ctg3', 0, 1, '2019-07-01 05:07:54', '2019-07-01 05:07:54'),
(10, 'Ctg4', 1, 1, '2019-07-01 05:08:02', '2019-07-01 05:08:02');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_04_09_131036_create_posts_table', 1),
(4, '2019_04_24_091913_add_user_id_to_posts', 2),
(5, '2019_04_25_074247_add_cover_image_to_posts', 3),
(6, '2019_06_25_173647_create_product_lists_table', 4),
(7, '2019_06_29_111300_add_fields_to_users', 5),
(8, '2019_06_30_051937_create_user_groups_table', 6),
(9, '2019_07_01_080340_create_categories_table', 7),
(10, '2019_07_01_124654_create_party_lists_table', 8),
(11, '2019_07_05_170401_create_actions_table', 9),
(12, '2019_07_05_171308_create_action_types_table', 10),
(13, '2019_07_05_193055_add_deleted_at_column_to_action_types', 11),
(14, '2019_07_15_121436_create_tasks_table', 12),
(15, '2019_07_16_061017_create_tasks_table', 13),
(16, '2019_07_20_093651_add_deleted_at_column_to_users', 14),
(17, '2019_07_20_094426_add_deleted_at_column_to_users', 15);

-- --------------------------------------------------------

--
-- Table structure for table `party_lists`
--

CREATE TABLE `party_lists` (
  `id` int(10) UNSIGNED NOT NULL,
  `party_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `party_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `party_contact_person` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `party_contact_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `party_code` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `party_address` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `party_trade_licence_no` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `party_vat_no` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `party_tin_no` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `party_bank_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `party_bank_ac_no` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `party_cheque_routing_no` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `party_type` tinyint(4) NOT NULL,
  `published` tinyint(4) NOT NULL,
  `deleted` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `party_lists`
--

INSERT INTO `party_lists` (`id`, `party_name`, `party_email`, `party_contact_person`, `party_contact_number`, `party_code`, `party_address`, `party_trade_licence_no`, `party_vat_no`, `party_tin_no`, `party_bank_name`, `party_bank_ac_no`, `party_cheque_routing_no`, `party_type`, `published`, `deleted`, `created_at`, `updated_at`) VALUES
(2, 'WEBSNIT', 'info@websnit.com', 'Mr.Nurul Islam', '01676232587', '001', 'Mirpur Dhaka-1216', '095387', '567890987', '12345432768', 'Bank Alfalah', '90863467', '3457729', 1, 0, 1, '2019-07-02 03:01:54', '2019-07-02 03:01:54'),
(3, 'WEBSNIT 1', 'info@websnit.com', 'Mr.Nurul Islam', '01676232587', '001', 'Mirpur Dhaka-1216', '095387', '567890987', '12345432768', 'Bank Alfalah', '90863467', '3457729', 1, 0, 0, '2019-07-02 03:01:54', '2019-07-02 03:01:54'),
(4, 'WEBSNIT 2', 'info@websnit.com', 'Mr.Nurul Islam', '01676232587', '001', 'Mirpur Dhaka-1216', '095387', '567890987', '12345432768', 'Bank Alfalah', '90863467', '3457729', 1, 0, 1, '2019-07-02 03:01:54', '2019-07-02 03:01:54');

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `cover_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `created_at`, `updated_at`, `user_id`, `cover_image`) VALUES
(14, 'Post One', '<p>This is post one</p>', '2019-04-25 05:29:47', '2019-04-25 05:29:47', 1, 'noimage.jpg'),
(16, 'Post Five', '<p>Tetw</p>', '2019-04-26 04:53:34', '2019-04-26 04:53:34', 1, 'noimage.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_lists`
--

CREATE TABLE `product_lists` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_number` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `party_id` int(11) NOT NULL,
  `barcode` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sale_price` double NOT NULL,
  `print_quantity` int(11) NOT NULL,
  `published` tinyint(4) NOT NULL DEFAULT '0',
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_lists`
--

INSERT INTO `product_lists` (`id`, `category_id`, `product_name`, `product_number`, `party_id`, `barcode`, `sale_price`, `print_quantity`, `published`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 9, 'Product Name', 'Product Number', 2, 'Barcode', 12, 2, 1, 0, '2019-06-26 07:50:49', '2019-06-28 12:54:25'),
(2, 8, 'Product Name', 'Product Number', 3, 'Barcode', 23, 12, 1, 0, '2019-06-26 07:51:10', '2019-06-26 07:51:10'),
(3, 10, 'Product NameTest', 'Product Number Test', 2, 'Barcode', 200, 12, 0, 0, '2019-06-26 07:52:08', '2019-06-26 07:52:08'),
(4, 8, 'Product NameTest1', 'Product Number1', 2, 'BarcodeBarcode', 12, 1, 1, 1, '2019-06-26 08:00:35', '2019-06-26 08:00:35'),
(5, 9, 'Test select', 'Test select', 3, 'Test select', 234, 23, 1, 0, '2019-06-28 08:19:01', '2019-06-28 08:19:01'),
(6, 10, 'Tested Edit', 'Test Edit', 4, 'Test Edit', 200, 10, 0, 0, '2019-06-28 08:23:54', '2019-07-02 06:36:19'),
(7, 9, 'Product Name009', 'Product Number', 4, 'Barcode', 388, 3, 1, 0, '2019-07-02 04:44:30', '2019-07-03 12:32:49'),
(8, 9, 'Product Name3', 'Product Number', 2, 'Barcode', 388, 3, 0, 0, '2019-07-02 06:01:13', '2019-07-03 12:32:39'),
(9, 9, 'Product Name', 'Product Number', 2, 'Barcode', 23, 12, 1, 0, '2019-06-26 07:51:10', '2019-06-26 07:51:10');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `user_id`, `name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Tets', 'Test', '2019-07-16 03:13:03', NULL, '2019-07-16 03:13:03'),
(2, 1, 'Test 2', 'Trest2', NULL, '2019-07-16 02:22:14', '2019-07-16 04:17:05'),
(3, 1, 'Test 100', 'Test 1', NULL, '2019-07-16 03:17:04', '2019-07-16 03:17:13'),
(4, 1, 'Test n123', 'Test n', '2019-07-16 03:18:57', '2019-07-16 03:18:28', '2019-07-16 03:18:57'),
(5, 1, 'newline', 'testwq3e242314', '2019-07-16 03:36:17', '2019-07-16 03:36:01', '2019-07-16 03:36:17'),
(6, 1, 'Test 3', 'Test 3', NULL, '2019-07-16 04:17:21', '2019-07-16 04:17:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `g_id` int(11) NOT NULL DEFAULT '0',
  `daily_transaction_report` tinyint(4) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `published` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `g_id`, `daily_transaction_report`, `email_verified_at`, `remember_token`, `published`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Prasanta', 'Mondal', '', 'test@test.com', '$2y$10$wySyc10dCAGV0Y1GFlHIPuJT3SuAdlEDuy4M6YEn.pt2gpYjRrOiq', 0, 0, NULL, NULL, 0, '2019-04-24 02:55:42', '2019-04-24 02:55:42', NULL),
(2, 'Test', '1', '', 'test1@test.com', '$2y$10$XxvmR5rP.CZwGTcwe0FV3e4Xfz6GlW9G3U/1UbpR2uUAVqIwdTgx2', 0, 0, NULL, NULL, 0, '2019-04-24 05:45:39', '2019-04-24 05:45:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE `user_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_access_link` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `published` tinyint(4) NOT NULL,
  `deleted` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`id`, `group_name`, `group_access_link`, `published`, `deleted`, `created_at`, `updated_at`) VALUES
(17, 'Group Name21', '1,2,3', 1, 0, '2019-06-30 03:45:16', '2019-06-30 03:45:16'),
(21, 'Test Ofc', '1', 0, 0, '2019-07-01 01:01:43', '2019-07-01 01:01:43'),
(22, 'Test Ofc2', '1,2', 0, 0, '2019-07-01 01:01:54', '2019-07-01 01:01:54'),
(23, 'Test Ofc3', '1,2,3', 1, 0, '2019-07-01 01:06:26', '2019-07-01 01:06:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `action_types`
--
ALTER TABLE `action_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `party_lists`
--
ALTER TABLE `party_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_lists`
--
ALTER TABLE `product_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `action_types`
--
ALTER TABLE `action_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `party_lists`
--
ALTER TABLE `party_lists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product_lists`
--
ALTER TABLE `product_lists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
