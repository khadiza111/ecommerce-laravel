-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2020 at 07:40 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel-ec`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Super Admin' COMMENT 'Admin|Super Admin',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `phone_no`, `avatar`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'all.laravelsite@gmail.com', '$2y$10$BIlaKwsn5fsdFigaSA/Hc.yvCzdjP0Tju3G1/rUA1tdOYn6KitPmC', '012345678', NULL, 'Super Admin', 'UyH4pcSyaqAxk6Ehpv94fTyZ9ZoIkHjLGE7EgHMph4UVnsKZnSj2hSw3LXkr', '2020-05-29 23:22:01', '2020-06-09 12:28:29');

-- --------------------------------------------------------

--
-- Table structure for table `blog_criterias`
--

CREATE TABLE `blog_criterias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_criterias`
--

INSERT INTO `blog_criterias` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Recent Post', '2020-06-23 04:31:03', '2020-06-23 04:31:03'),
(3, 'Latest Post', '2020-06-23 04:31:13', '2020-06-23 04:31:13'),
(4, 'Outdated Post', '2020-06-23 04:32:14', '2020-06-23 04:32:14');

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_criteria_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `title`, `sub_title`, `image`, `description`, `blog_criteria_id`, `created_at`, `updated_at`) VALUES
(1, 'Post title one for blog', 'Sub title in post one', '1592909604.jpg', 'Post one..This is for blog.. This is for blog.. This is for blog.. This is for blog.. This is for blog.. This is for blog.. This is for blog.. \r\n\r\nPost one..This is for blog.. This is for blog.. This is for blog.. This is for blog.. This is for blog.. This is for blog.. This is for blog.. \r\n\r\nPost one..This is for blog.. This is for blog.. This is for blog.. This is for blog.. This is for blog.. This is for blog.. This is for blog.. \r\n\r\nPost one..This is for blog.. This is for blog.. This is for blog.. This is for blog.. This is for blog.. This is for blog.. This is for blog.. \r\n\r\nPost one..This is for blog.. This is for blog.. This is for blog.. This is for blog.. This is for blog.. This is for blog.. This is for blog.. \r\n\r\nPost one..This is for blog.. This is for blog.. This is for blog.. This is for blog.. This is for blog.. This is for blog.. This is for blog.. \r\n\r\nPost one..This is for blog.. This is for blog.. This is for blog.. This is for blog.. This is for blog.. This is for blog.. This is for blog..', 4, '2020-06-23 04:53:24', '2020-06-23 11:25:12'),
(2, 'Post title two for blog', 'Sub title in post two', '1592909842.jpg', 'Post two..This is for blog..This is for blog. This is for blog..This is for blog. This is for blog..This is for blog. This is for blog..This is for blog. This is for blog..This is for blog. This is for blog..This is for blog. This is for blog..This is for blog. This is for blog..This is for blog.\r\nPost two..This is for blog..This is for blog. This is for blog..This is for blog. This is for blog..This is for blog. This is for blog..This is for blog. This is for blog..This is for blog. This is for blog..This is for blog. This is for blog..This is for blog. This is for blog..This is for blog.\r\nPost two..This is for blog..This is for blog. This is for blog..This is for blog. This is for blog..This is for blog. This is for blog..This is for blog. This is for blog..This is for blog. This is for blog..This is for blog. This is for blog..This is for blog. This is for blog..This is for blog.\r\nPost two..This is for blog..This is for blog. This is for blog..This is for blog. This is for blog..This is for blog. This is for blog..This is for blog. This is for blog..This is for blog. This is for blog..This is for blog. This is for blog..This is for blog. This is for blog..This is for blog.\r\nPost two..This is for blog..This is for blog. This is for blog..This is for blog. This is for blog..This is for blog. This is for blog..This is for blog. This is for blog..This is for blog. This is for blog..This is for blog. This is for blog..This is for blog. This is for blog..This is for blog.', 2, '2020-06-23 04:57:23', '2020-06-23 05:33:48'),
(3, 'Post title three for blog', 'Sub title in post three', '1592909922.jpg', 'Post three..This post is for blog. This post is for blog. This post is for blog. This post is for blog. This post is for blog. This post is for blog. This post is for blog. This post is for blog. This post is for blog. This post is for blog. This post is for blog. This post is for blog. This post is for blog.\r\n\r\nPost three..This post is for blog. This post is for blog. This post is for blog. This post is for blog. This post is for blog. This post is for blog. This post is for blog. This post is for blog. This post is for blog. This post is for blog. This post is for blog. This post is for blog. This post is for blog.\r\n\r\nPost three..This post is for blog. This post is for blog. This post is for blog. This post is for blog. This post is for blog. This post is for blog. This post is for blog. This post is for blog. This post is for blog. This post is for blog. This post is for blog. This post is for blog. This post is for blog.\r\n\r\nPost three..This post is for blog. This post is for blog. This post is for blog. This post is for blog. This post is for blog. This post is for blog. This post is for blog. This post is for blog. This post is for blog. This post is for blog. This post is for blog. This post is for blog. This post is for blog.\r\n\r\nPost three..This post is for blog. This post is for blog. This post is for blog. This post is for blog. This post is for blog. This post is for blog. This post is for blog. This post is for blog. This post is for blog. This post is for blog. This post is for blog. This post is for blog. This post is for blog.\r\n\r\nPost three..This post is for blog. This post is for blog. This post is for blog. This post is for blog. This post is for blog. This post is for blog. This post is for blog. This post is for blog. This post is for blog. This post is for blog. This post is for blog. This post is for blog. This post is for blog.', 2, '2020-06-23 04:58:42', '2020-06-23 05:33:16'),
(4, 'Post title 4 for blog', 'Sub title in post 4', '1592910016.jpg', 'Post 4...This post is required to our blog by section. This post is required to our blog by section. This post is required to our blog by section. This post is required to our blog by section. This post is required to our blog by section. This post is required to our blog by section. This post is required to our blog by section. This post is required to our blog by section.. \r\n\r\nPost 4...This post is required to our blog by section. This post is required to our blog by section. This post is required to our blog by section. This post is required to our blog by section. This post is required to our blog by section. This post is required to our blog by section. This post is required to our blog by section. This post is required to our blog by section.. \r\n\r\nPost 4...This post is required to our blog by section. This post is required to our blog by section. This post is required to our blog by section. This post is required to our blog by section. This post is required to our blog by section. This post is required to our blog by section. This post is required to our blog by section. This post is required to our blog by section.. \r\n\r\nPost 4...This post is required to our blog by section. This post is required to our blog by section. This post is required to our blog by section. This post is required to our blog by section. This post is required to our blog by section. This post is required to our blog by section. This post is required to our blog by section. This post is required to our blog by section.. \r\n\r\nPost 4...This post is required to our blog by section. This post is required to our blog by section. This post is required to our blog by section. This post is required to our blog by section. This post is required to our blog by section. This post is required to our blog by section. This post is required to our blog by section. This post is required to our blog by section..', 4, '2020-06-23 05:00:16', '2020-06-23 11:24:51');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(2, 'Sony', 'Sony brand Sony brand Sony brand Sony brandSony..', '1590041643.png', '2020-05-14 17:58:47', '2020-05-21 00:15:10'),
(3, 'LG', 'LG brand will be here....LG brand will be here.... LG brand will be here.... LG brand will be here....  LG brand will be here....  LG brand will be here....  LG brand will be here....  LG brand will be here....  LG brand will be here....', '1590041613.png', '2020-05-14 18:01:08', '2020-05-21 00:13:33'),
(6, 'Samsung', 'Samsung brand', '1590041287.png', '2020-05-20 22:58:41', '2020-05-21 00:15:31'),
(8, 'Others', 'other brand will be here...', '1590041777.jpeg', '2020-05-21 00:16:17', '2020-05-21 00:16:17');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `user_id`, `order_id`, `ip_address`, `product_quantity`, `created_at`, `updated_at`) VALUES
(59, 13, NULL, NULL, '::1', 0, '2020-06-21 12:14:14', '2020-06-22 02:46:33');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `image`, `parent_id`, `created_at`, `updated_at`) VALUES
(42, 'Electronics', 'primary category.....', '1590017499.jpg', NULL, '2020-05-20 09:59:04', '2020-05-20 17:31:39'),
(44, 'Books', 'primary cat...', '1590017461.png', NULL, '2020-05-20 10:01:38', '2020-05-20 17:31:01'),
(45, 'Mobile', 'sub...Electronics...', '1589990617.png', 42, '2020-05-20 10:03:39', '2020-06-14 13:08:17'),
(46, 'Television', 'sub..electronics', '1589991119.png', 42, '2020-05-20 10:11:59', '2020-05-20 10:11:59'),
(52, 'Fashion', 'Primary Category...', '1591253214.jpg', NULL, '2020-06-04 00:46:54', '2020-06-04 00:46:54'),
(53, 'Watch', 'Sub of Fashion Category...', '1591253455.jpg', 52, '2020-06-04 00:50:55', '2020-06-04 00:50:55'),
(54, 'Story', 'sub of Books....', '1592081784.jpg', 44, '2020-06-13 14:56:24', '2020-06-13 14:56:24'),
(55, 'Education', 'Sub of Books..', '1592117240.jpg', 44, '2020-06-14 00:46:59', '2020-06-14 00:47:20'),
(56, 'Bags', 'Sub of Fashion Category', '1592117402.jpg', 52, '2020-06-14 00:50:02', '2020-06-14 00:50:02'),
(57, 'Food', 'Primary Category..', '1592141445.jpg', NULL, '2020-06-14 07:28:13', '2020-06-14 07:30:45'),
(58, 'Fruit', 'sub of Food Cat...', '1592141424.jpg', 57, '2020-06-14 07:30:24', '2020-06-14 07:36:01'),
(59, 'Vegetable', 'sub of Food Cat..', '1592141498.jpg', 57, '2020-06-14 07:31:38', '2020-06-14 07:31:38');

-- --------------------------------------------------------

--
-- Table structure for table `contact_details`
--

CREATE TABLE `contact_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `open_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_details`
--

INSERT INTO `contact_details` (`id`, `phone`, `address`, `open_time`, `email`, `created_at`, `updated_at`) VALUES
(2, '+880123456789', '100, Dhanmondi, Dhaka-1209', '10.00 am to 06.00 pm', 'all.laravelsite@gmail.com', '2020-06-22 04:44:44', '2020-06-22 04:44:44');

-- --------------------------------------------------------

--
-- Table structure for table `contact_emails`
--

CREATE TABLE `contact_emails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(15) NOT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_emails`
--

INSERT INTO `contact_emails` (`id`, `name`, `email`, `subject`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(2, 'David Atten', 'david@mail.com', 'Products Information', 198765233, 'I will be glad, if you are able to acknowledge about some product details from your website...!!', '2020-06-22 11:58:11', '2020-06-22 11:58:11'),
(3, 'Shumi Akter', 'shumi.akter0@gmail.com', 'About Price', 179999999, 'Some problems have to reduce in your products that I had purchased !!', '2020-06-22 12:26:24', '2020-06-22 12:26:24');

-- --------------------------------------------------------

--
-- Table structure for table `contact_maps`
--

CREATE TABLE `contact_maps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_maps`
--

INSERT INTO `contact_maps` (`id`, `country`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(2, 'Bangladesh', '+880123456789', '100, Dhanmondi, Dhaka-1209', '2020-06-22 13:29:31', '2020-06-22 13:30:35');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `division_id`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', 1, '2020-05-27 02:03:16', '2020-05-27 02:03:16'),
(2, 'Rajshahi 1', 2, '2020-05-27 02:08:06', '2020-05-27 02:08:06'),
(4, 'Dhanmondi', 1, '2020-05-31 20:47:26', '2020-05-31 20:47:26'),
(5, 'Uttara', 1, '2020-05-31 20:47:39', '2020-05-31 20:47:39'),
(6, 'Khilkhet', 1, '2020-05-31 20:47:57', '2020-05-31 20:47:57'),
(7, 'Rajshahi 2', 2, '2020-05-31 20:48:11', '2020-05-31 20:48:11'),
(8, 'Ctg 1', 4, '2020-05-31 20:48:26', '2020-05-31 20:48:26'),
(9, 'Ctg 2', 4, '2020-05-31 20:48:35', '2020-05-31 20:48:44'),
(10, 'Khulna 1', 5, '2020-05-31 20:49:10', '2020-05-31 20:49:10'),
(11, 'Khulna 2', 5, '2020-05-31 20:49:28', '2020-05-31 20:49:28');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `priority`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', 1, '2020-05-27 00:58:08', '2020-05-27 00:58:08'),
(2, 'Rajshahi', 2, '2020-05-27 01:01:42', '2020-05-27 01:05:19'),
(4, 'Chittagong', 3, '2020-05-27 02:20:20', '2020-05-27 02:20:20'),
(5, 'Khulna', 4, '2020-05-27 02:20:33', '2020-05-27 02:20:33'),
(6, 'Barisal', 5, '2020-05-27 02:20:57', '2020-05-27 02:21:54'),
(7, 'Sylhet', 6, '2020-05-27 02:21:21', '2020-05-27 02:21:21'),
(8, 'Rangpur', 7, '2020-05-27 02:23:55', '2020-05-27 02:23:55'),
(9, 'Mymensingh', 8, '2020-05-27 02:24:17', '2020-05-27 02:24:17');

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
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2020_05_11_171320_create_categories_table', 2),
(10, '2020_05_11_171422_create_brands_table', 2),
(12, '2020_05_11_174523_create_product_images_table', 2),
(13, '2014_10_12_100000_create_password_resets_table', 3),
(15, '2020_05_27_050346_create_divisions_table', 5),
(16, '2020_05_27_050551_create_districts_table', 6),
(18, '2020_05_28_113705_create_carts_table', 7),
(19, '2020_05_29_041102_create_settings_table', 8),
(20, '2020_05_29_054830_create_payments_table', 9),
(21, '2020_05_28_113032_create_orders_table', 10),
(22, '2020_05_11_171442_create_admins_table', 11),
(23, '2020_06_01_041513_create_sliders_table', 12),
(27, '2014_10_12_000000_create_users_table', 13),
(31, '2020_06_13_182233_create_product_criterias_table', 14),
(32, '2020_05_07_161218_create_products_table', 15),
(33, '2020_06_22_095913_create_contact_details_table', 16),
(36, '2020_06_22_134709_create_contact_emails_table', 17),
(37, '2020_06_22_190535_create_contact_maps_table', 18),
(41, '2020_06_23_051031_create_blog_posts_table', 19),
(42, '2020_06_23_100941_create_blog_criterias_table', 20);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `payment_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_paid` tinyint(1) NOT NULL DEFAULT 0,
  `is_completed` tinyint(1) NOT NULL DEFAULT 0,
  `is_seen_by_admin` tinyint(1) NOT NULL DEFAULT 0,
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_charge` int(11) NOT NULL DEFAULT 50,
  `custom_discount` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `payment_id`, `ip_address`, `name`, `phone_no`, `shipping_address`, `email`, `message`, `is_paid`, `is_completed`, `is_seen_by_admin`, `transaction_id`, `shipping_charge`, `custom_discount`, `created_at`, `updated_at`) VALUES
(1, 16, 2, '::1', 'Shumi Akter', '001978372838', 'Dhaka', 'shumi.akter0@gmail.com', 'Urgent need...', 1, 1, 1, '1234567', 50, 0, '2020-05-29 09:11:09', '2020-05-29 09:11:09'),
(2, 16, 1, '::1', 'Shumi Akter', '001978372838', 'Dhaka', 'shumi.akter0@gmail.com', NULL, 0, 0, 0, NULL, 50, 0, '2020-05-29 09:13:36', '2020-05-31 12:21:21'),
(3, 16, 1, '::1', 'Shumi Akter', '001978372838', 'Dhaka', 'shumi.akter0@gmail.com', NULL, 0, 0, 0, NULL, 50, 0, '2020-05-29 09:36:21', '2020-05-29 09:36:21'),
(4, 16, 2, '::1', 'Shumi Akter', '001978372838', 'Dhaka', 'shumi.akter0@gmail.com', NULL, 1, 1, 1, '1234567', 50, 0, '2020-05-29 09:39:17', '2020-05-31 12:25:50'),
(5, NULL, 2, '::1', 'Khadiza', '7632713821', 'Dhaka', '01khadiza@gmail.com', 'No message !!!!!!!', 1, 1, 1, '6736217368', 60, 10, '2020-06-01 11:58:13', '2020-06-01 22:57:31'),
(6, NULL, 2, '::1', 'Shumi', '342424433', 'Dhaka', 'shumi.akter0@gmail.com', NULL, 0, 0, 0, '6736217368', 50, 0, '2020-06-03 22:05:35', '2020-06-03 22:05:35'),
(7, NULL, 1, '::1', 'Test', '001978372838', 'Dhaka', 'nila@mail.com', NULL, 0, 0, 0, NULL, 50, 0, '2020-06-09 09:40:03', '2020-06-09 09:40:03'),
(8, NULL, 3, '::1', 'shuimi', '001978372838', 'Dhaka', 'shumi.akter0@gmail.com', NULL, 0, 0, 0, '123456789', 50, 0, '2020-06-11 08:03:25', '2020-06-11 08:03:25');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('01khadiza@gmail.com', '$2y$10$UULB7Lv/jopOaTQhhokD3e/OODutls/ezTxTnBys3R6ZrOIzGTLYS', '2020-05-26 01:31:20');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` tinyint(4) NOT NULL DEFAULT 1,
  `short_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Payment No',
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Agent|Personal',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `name`, `image`, `priority`, `short_name`, `no`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Cash In', 'cash_in.jpg', 1, 'cash_in', NULL, NULL, '2020-05-29 06:03:41', '2020-05-29 06:03:41'),
(2, 'Bkash', 'bkash.jpg', 2, 'bkash', '01234567', 'Personal', '2020-05-29 06:03:41', '2020-05-29 06:03:41'),
(3, 'Rocket', 'rocket.jpg', 3, 'rocket', '01234567454', 'Personal', '2020-05-29 06:03:41', '2020-05-29 06:03:41'),
(4, 'Credit Card', 'credit_card.jpg', 4, 'credit_card', '9877638263', 'Personal', '2020-05-29 06:03:41', '2020-05-29 06:03:41');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `price` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `offer_price` int(11) DEFAULT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `criteria_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `brand_id`, `title`, `description`, `slug`, `quantity`, `price`, `status`, `offer_price`, `admin_id`, `criteria_id`, `created_at`, `updated_at`) VALUES
(1, 45, 6, 'Samsung Phone', 'Samsung Phone Samsung Phone', 'samsung-phone', 12, 25000, 0, NULL, 1, 1, '2020-06-13 15:11:22', '2020-06-14 00:37:44'),
(2, 45, 8, 'IPhone 8 Version', 'IPhone 8 Version IPhone 8 Version', 'iphone-8-version', 13, 30000, 0, NULL, 1, 3, '2020-06-13 15:14:10', '2020-06-14 00:38:33'),
(3, 46, 2, 'Sony TV', 'sub of Electronics ....Sony TV', 'sony-tv', 15, 24000, 0, NULL, 1, 2, '2020-06-14 00:29:50', '2020-06-14 00:29:50'),
(4, 53, 8, 'Gucci 1.0.0', 'sub of Fashion Category', 'gucci-100', 30, 1200, 0, NULL, 1, 1, '2020-06-14 00:44:18', '2020-06-14 00:44:18'),
(5, 56, 8, 'Bag 1', 'Bag 1 Bag 1', 'bag-1', 20, 1500, 0, NULL, 1, 2, '2020-06-14 00:51:21', '2020-06-14 00:51:21'),
(6, 55, 8, 'Book One for Students', 'New Books for Students New Books for Students', 'book-one-for-students', 50, 450, 0, NULL, 1, 3, '2020-06-14 00:54:56', '2020-06-14 00:54:56'),
(7, 54, 8, 'Scientific Story Book', 'Scientific Story Book...', 'scientific-story-book', 0, 500, 0, NULL, 1, 1, '2020-06-14 00:57:08', '2020-06-14 00:57:08'),
(8, 53, 8, 'Titan One Watch', 'Titan One Watch Titan One Watch', 'titan-one-watch', 25, 1500, 0, NULL, 1, 2, '2020-06-14 01:00:15', '2020-06-14 01:00:15'),
(9, 56, 8, 'Bag 2', 'Bag 2 Bag 2', 'bag-2', 40, 2000, 0, NULL, 1, 3, '2020-06-14 01:01:27', '2020-06-14 01:01:27'),
(10, 46, 3, 'LG One', 'LG One  LG One', 'lg-one', 35, 20000, 0, NULL, 1, 2, '2020-06-14 04:04:35', '2020-06-14 04:04:35'),
(11, 59, 8, 'Curry', 'Curry  Curry', 'curry', 30, 350, 0, NULL, 1, 1, '2020-06-14 07:37:56', '2020-06-14 07:37:56'),
(13, 58, 8, 'Mango', 'Mango Mango', 'mango', 60, 800, 0, NULL, 1, 3, '2020-06-14 07:58:21', '2020-06-14 07:58:21'),
(14, 56, 8, 'Female\'s Collection', 'Female\'s new collection to be here with sale off as 20%....\r\nGreat deal !!', 'females-collection', 100, 450, 0, 20, 1, 4, '2020-06-21 06:14:30', '2020-06-21 06:14:30'),
(15, 58, 8, 'Fresh Fruits', 'Fresh Fruits with sale off as 20%....\r\nGreat deal !!', 'fresh-fruits', 22, 2500, 0, 20, 1, 4, '2020-06-21 06:43:31', '2020-06-21 06:43:31'),
(16, 59, 8, 'Veg Special', 'Veg Special with sale off as 20%...\r\nGreat deal !!', 'veg-special', 30, 250, 0, 20, 1, 4, '2020-06-21 06:45:37', '2020-06-21 06:45:37'),
(17, 58, 8, 'Fresh juicy Strawberry', 'Fresh and Juicy Strawberry', 'fresh-juicy-strawberry', 45, 1550, 0, 20, 1, 4, '2020-06-21 06:55:05', '2020-06-21 06:55:05'),
(18, 58, 8, 'Fresh Fruits Juice', 'Fresh Fruits Juice with sale off as 10%..\r\nGreat deal !!', 'fresh-fruits-juice', 50, 950, 0, 20, 1, 4, '2020-06-21 07:29:27', '2020-06-21 07:29:27'),
(19, 59, 8, 'Fresh Curry', 'Fresh Curry with sale off as 10%..', 'fresh-curry', 44, 650, 0, 10, 1, 4, '2020-06-21 07:40:46', '2020-06-21 07:40:46'),
(20, 58, 8, 'Delicious Food', 'Delicious Food ...', 'delicious-food', 25, 1200, 0, NULL, 1, 1, '2020-06-21 09:27:44', '2020-06-21 09:27:44');

-- --------------------------------------------------------

--
-- Table structure for table `product_criterias`
--

CREATE TABLE `product_criterias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_criterias`
--

INSERT INTO `product_criterias` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Top Rated', '2020-06-13 14:32:29', '2020-06-13 14:32:29'),
(2, 'Latest', '2020-06-13 14:32:37', '2020-06-13 14:32:37'),
(3, 'Review', '2020-06-13 14:32:46', '2020-06-13 14:32:46'),
(4, 'Sale Off', '2020-06-21 05:25:36', '2020-06-21 05:25:36');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(13, 21, '1590007712.jpg', '2020-05-20 14:48:32', '2020-05-20 14:48:32'),
(14, 21, '1590007720.jpg', '2020-05-20 14:48:40', '2020-05-20 14:48:40'),
(15, 21, '1590007725.jpg', '2020-05-20 14:48:45', '2020-05-20 14:48:45'),
(16, 21, '1590007732.jpg', '2020-05-20 14:48:52', '2020-05-20 14:48:52'),
(17, 22, '1590007980.jpg', '2020-05-20 14:53:01', '2020-05-20 14:53:01'),
(18, 22, '1590008007.jpg', '2020-05-20 14:53:29', '2020-05-20 14:53:29'),
(19, 22, '1590008041.jpg', '2020-05-20 14:54:03', '2020-05-20 14:54:03'),
(20, 23, '1590008362.jpg', '2020-05-20 14:59:22', '2020-05-20 14:59:22'),
(21, 24, '1590043472.jpg', '2020-05-21 00:44:32', '2020-05-21 00:44:32'),
(22, 25, '1591244852.jpg', '2020-06-03 22:27:32', '2020-06-03 22:27:32'),
(23, 27, '15912459960.jpg', '2020-06-03 22:46:36', '2020-06-03 22:46:36'),
(24, 27, '15912460011.jpg', '2020-06-03 22:46:42', '2020-06-03 22:46:42'),
(31, 31, '15920797170.jpg', '2020-06-13 14:22:04', '2020-06-13 14:22:04'),
(32, 31, '15920797241.jpg', '2020-06-13 14:22:04', '2020-06-13 14:22:04'),
(33, 1, '15920826860.jpg', '2020-06-13 15:11:26', '2020-06-13 15:11:26'),
(34, 2, '15920828540.jpg', '2020-06-13 15:14:14', '2020-06-13 15:14:14'),
(35, 3, '15921161900.jpg', '2020-06-14 00:29:51', '2020-06-14 00:29:51'),
(36, 4, '15921170580.jpg', '2020-06-14 00:44:18', '2020-06-14 00:44:18'),
(37, 4, '15921170581.jpg', '2020-06-14 00:44:18', '2020-06-14 00:44:18'),
(38, 5, '15921174810.png', '2020-06-14 00:51:22', '2020-06-14 00:51:22'),
(39, 6, '15921176960.png', '2020-06-14 00:54:57', '2020-06-14 00:54:57'),
(40, 6, '15921176971.jpg', '2020-06-14 00:54:57', '2020-06-14 00:54:57'),
(41, 7, '15921178280.jpg', '2020-06-14 00:57:08', '2020-06-14 00:57:08'),
(42, 8, '15921180150.jpg', '2020-06-14 01:00:15', '2020-06-14 01:00:15'),
(43, 9, '15921180870.jpg', '2020-06-14 01:01:27', '2020-06-14 01:01:27'),
(44, 9, '15921180871.png', '2020-06-14 01:01:27', '2020-06-14 01:01:27'),
(45, 10, '15921290760.jpg', '2020-06-14 04:04:49', '2020-06-14 04:04:49'),
(46, 11, '15921418900.jpg', '2020-06-14 07:38:10', '2020-06-14 07:38:10'),
(47, 11, '15921419021.jpg', '2020-06-14 07:38:22', '2020-06-14 07:38:22'),
(48, 13, '15921431030.jpg', '2020-06-14 07:58:23', '2020-06-14 07:58:23'),
(49, 13, '15921431061.jpg', '2020-06-14 07:58:26', '2020-06-14 07:58:26'),
(50, 14, '15927416700.png', '2020-06-21 06:14:30', '2020-06-21 06:14:30'),
(51, 15, '15927434110.jpg', '2020-06-21 06:43:31', '2020-06-21 06:43:31'),
(52, 15, '15927434111.jpg', '2020-06-21 06:43:31', '2020-06-21 06:43:31'),
(53, 16, '15927435370.jpg', '2020-06-21 06:45:37', '2020-06-21 06:45:37'),
(54, 16, '15927435371.jpg', '2020-06-21 06:45:37', '2020-06-21 06:45:37'),
(55, 16, '15927435372.jpg', '2020-06-21 06:45:37', '2020-06-21 06:45:37'),
(56, 17, '15927441050.jpg', '2020-06-21 06:55:05', '2020-06-21 06:55:05'),
(57, 18, '15927461670.jpg', '2020-06-21 07:29:27', '2020-06-21 07:29:27'),
(58, 18, '15927461671.jpg', '2020-06-21 07:29:27', '2020-06-21 07:29:27'),
(59, 19, '15927468460.jpg', '2020-06-21 07:40:46', '2020-06-21 07:40:46'),
(60, 19, '15927468461.jpg', '2020-06-21 07:40:46', '2020-06-21 07:40:46'),
(61, 20, '15927532640.jpg', '2020-06-21 09:27:44', '2020-06-21 09:27:44'),
(62, 20, '15927532641.jpg', '2020-06-21 09:27:44', '2020-06-21 09:27:44'),
(63, 20, '15927532642.jpg', '2020-06-21 09:27:44', '2020-06-21 09:27:44');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_cost` int(10) UNSIGNED NOT NULL DEFAULT 100,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `email`, `phone`, `address`, `shipping_cost`, `created_at`, `updated_at`) VALUES
(1, 'test@gmail.com', '0123456778', 'Dhaka-1209', 100, '2020-05-29 04:17:30', '2020-05-29 04:17:30');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `button_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` tinyint(3) UNSIGNED NOT NULL DEFAULT 10,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `image`, `button_text`, `button_link`, `priority`, `created_at`, `updated_at`) VALUES
(2, 'Slider Two', '1590997543.jpg', 'Desert', 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQ8SxrerzOBAdTWiZqnPLliirsOf5PF7Yu7UyZii0SUofIHYn4W&usqp=CAU', 4, '2020-06-01 01:05:01', '2020-06-04 00:59:37'),
(4, 'Explore Natural Rejuvenation', '1591012147.jpg', 'View Image', 'https://www.google.com/search?client=firefox-b-d&q=Rejuvenation', 3, '2020-06-01 05:49:07', '2020-06-04 00:59:52'),
(5, 'Electronics Latest Collection', '1591254477.jpg', 'Latest Collection', 'https://jssors8.azureedge.net/demos/image-slider/img/px-beach-daylight-fun-1430675-image.jpg', 2, '2020-06-04 01:01:29', '2020-06-04 01:07:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division_id` int(10) UNSIGNED DEFAULT NULL COMMENT 'Division Table ID',
  `district_id` int(10) UNSIGNED DEFAULT NULL COMMENT 'District Table ID',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '0=Inactive|1=Active|2=Ban',
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `access_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `phone_no`, `email`, `email_verified_at`, `password`, `street_address`, `division_id`, `district_id`, `status`, `ip_address`, `avatar`, `shipping_address`, `provider`, `provider_id`, `access_token`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, 'all.laravelsite@gmail.com', NULL, '', NULL, NULL, NULL, 0, NULL, NULL, NULL, 'google', '105138887928193842790', 'ya29.a0AfH6SMAIgHmjo4auMxb6WtEWJFKnrE9-hKoeEsYHrRwD5TM9HURaBZpA84rE3sIczQuWtsvcsQ7OqZwYsRmncinCKSawRecnWWSNN6excg7IDKi7tI_M-rvJbzGyYNWuQBsUZDXtKNs08SsHJ9hjBv2VW7KpQhjndCM', 'OYm47ZAhY1isPIWiQBxS8cqpzye85FaJ64ldJzWVmBXWklV2qJUOxJcDFzKL', '2020-06-12 03:47:06', '2020-06-12 05:10:12'),
(4, 'Shumi', 'Akter', 'shumi-akter', '01234567', 'shumi.akter0@gmail.com', NULL, '$2y$10$Km8OWb0WlaAB24XAvAlAOufIv09/WqIKRwLQZCy2l2bl1IZY9vdMS', 'Dhaka branch', 1, NULL, 1, '::1', NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-12 04:12:49', '2020-06-12 04:14:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_criterias`
--
ALTER TABLE `blog_criterias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`),
  ADD KEY `carts_order_id_foreign` (`order_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_details`
--
ALTER TABLE `contact_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_emails`
--
ALTER TABLE `contact_emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_maps`
--
ALTER TABLE `contact_maps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_payment_id_foreign` (`payment_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payments_short_name_unique` (`short_name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_criterias`
--
ALTER TABLE `product_criterias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_criterias_name_unique` (`name`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_phone_no_unique` (`phone_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog_criterias`
--
ALTER TABLE `blog_criterias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `contact_details`
--
ALTER TABLE `contact_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact_emails`
--
ALTER TABLE `contact_emails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_maps`
--
ALTER TABLE `contact_maps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product_criterias`
--
ALTER TABLE `product_criterias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
