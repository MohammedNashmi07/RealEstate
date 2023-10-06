-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2023 at 05:06 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `real_estate`
--

-- --------------------------------------------------------

--
-- Table structure for table `agent_has_customers`
--

CREATE TABLE `agent_has_customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agent_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agent_has_properties`
--

CREATE TABLE `agent_has_properties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `agent_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `address`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Jamir Terry', '1511 Shattuck Ave Berkeley', '521991082', 'Jamir@test.com', '2023-09-22 04:21:11', '2023-09-27 23:20:09'),
(2, 'Olen Johnson', '602 Dock St Ketchikan', '9072253031', 'abc@test.com', '2023-09-22 05:20:29', '2023-09-27 23:21:18'),
(5, 'Thomas Carlier', 'chaussée Herman 9', '0203868815', 'alessio87@verhaegen.org', '2023-09-27 23:14:43', '2023-09-27 23:14:43'),
(6, 'Paula Modrić', 'Trg Josipa bana Jelačića 72', '385913694571', 'emanuel.horvatincic@yahoo.com', '2023-09-27 23:16:09', '2023-09-27 23:16:09'),
(7, 'Horacio O\'Conner', '53708 Thora Fall Suite 521', '17572985661', 'armstrong.eula@kessler.com', '2023-09-27 23:17:21', '2023-09-27 23:17:21'),
(8, 'Tine Rosenberg Storgaard', 'Baggervej 8, st. th.', '46704827', 'sidsel.isaksen@skou.dk', '2023-09-27 23:18:15', '2023-09-27 23:18:15'),
(9, 'Pekka Lukkari', 'Levinkaarto 3 535', '0155695976', 'zvayrynen@yahoo.com', '2023-09-27 23:22:13', '2023-09-27 23:22:13'),
(10, 'Margaux Michèle Bernard', '1, place Morvan', '33189826688', 'raymond.marine@noos.fr', '2023-09-27 23:23:12', '2023-09-27 23:23:12'),
(11, 'Viktoria Müller', 'Seitzring 6/2', '01239549695', 'cborn@kurz.com', '2023-09-27 23:24:51', '2023-09-27 23:24:51'),
(12, 'Sarah Harris II', '70 Wat Sue Tsuen', '21699962', 'hegmann.dino@hotmail.com.hk', '2023-09-27 23:25:40', '2023-09-27 23:25:40'),
(13, 'Dudás Kata', 'Julianna erdősor 669.', '0618317439', 'richard.bognar@bakos.com', '2023-09-27 23:26:46', '2023-09-27 23:26:46');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_09_22_052428_create_properties_table', 2),
(6, '2023_09_22_060231_create_property_images_table', 3),
(7, '2023_09_22_060350_create_features_table', 3),
(8, '2023_09_22_060438_create_property_has_features_table', 3),
(9, '2023_09_22_060541_create_customers_table', 3),
(10, '2023_09_22_060813_create_agent_has_customers_table', 3),
(11, '2023_09_22_060856_create_agent_has_properties_table', 3),
(12, '2023_09_27_062417_add_currency_type_field_to_properties_table', 4),
(13, '2023_09_27_095318_drop_features_and_property_has_features_tables', 5),
(14, '2023_09_27_115523_change_status_enum_in_properties_table', 6),
(15, '2023_09_28_085839_add_column_is_sold_to_properties_table', 7),
(16, '2023_09_28_133034_add_address_fields_to_properties_table', 8),
(17, '2023_09_29_143015_create_contact_messages_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `no` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `property_type` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL,
  `currency_type` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `measuring_unit` varchar(255) NOT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `agent_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_sold` enum('yes','no') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `title`, `description`, `no`, `street`, `city`, `country`, `property_type`, `price`, `currency_type`, `size`, `measuring_unit`, `status`, `agent_id`, `customer_id`, `created_at`, `updated_at`, `is_sold`) VALUES
(1, 'Property 1', 'First Property Description', '5368', 'Kaitlin Village', 'New Lizethton', 'USA', 'House & Apartments', 15000.00, 'USD', 10, 'sqm', 'approved', 3, 1, '2023-09-27 23:00:28', '2023-09-28 08:16:19', 'no'),
(2, 'Property 2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', '45723', 'Avenida Delgadillo, 5, Entre suelo 8º', 'La Fuentes de San Pedro', 'Spain', 'House & Apartments', 25000.00, 'EUR', 10, 'ac', 'approved', 5, 2, '2023-09-27 23:12:29', '2023-09-28 08:18:30', 'no'),
(3, 'Property 3', 'Property 3 Description', '7', 'Robertson Trail', 'West Reeceview', 'UK', 'House & Apartments', 30000.00, 'GBP', 25, 'sqft', 'approved', 11, 5, '2023-09-27 23:30:16', '2023-09-28 08:19:29', 'no'),
(4, 'Property 4', 'Property 4 Description', 'Flat 22j', 'Morgan Crossing', 'Port Jacksonfort', 'UK', 'House & Apartments', 35000.00, 'GBP', 250, 'sqyd', 'approved', 6, 6, '2023-09-27 23:36:42', '2023-09-28 08:20:25', 'no'),
(5, 'Property 5', 'Property 5 description', '8', '吉本町小泉8-10-2', '青田市', 'Japan', 'House & Apartments', 400000.00, 'JPY', 120, 'ha', 'approved', 13, 7, '2023-09-27 23:41:06', '2023-09-28 08:21:25', 'no'),
(6, 'Property 6', 'Property 6 Description', '3351', 'Violet Road', 'North Ada', 'USA', 'House & Apartments', 40000.00, 'USD', 10, 'ac', 'approved', 11, 8, '2023-09-27 23:46:27', '2023-09-28 08:22:16', 'no'),
(7, 'Property 7', 'Property 7 Description', '93', 'rue Picard', 'Chauvin', 'France', 'House & Apartments', 40000.00, 'EUR', 10, 'sqm', 'approved', 11, 9, '2023-09-27 23:48:11', '2023-09-30 08:17:05', 'yes'),
(8, 'Property 8', 'Property 8 Description', '50', 'Sørensen Gade', 'Gredstedbro', 'Denmark', 'House & Apartments', 30000.00, 'USD', 10, 'sqyd', 'approved', 3, 11, '2023-09-27 23:49:28', '2023-09-28 08:25:58', 'no'),
(9, 'Property 9', 'Property 9 Description', '637', 'Leilani Courts Apt. 136', 'Theresaberg', 'USA', 'House & Apartments', 150000.00, 'USD', 25, 'sqyd', 'approved', 5, 12, '2023-09-28 00:46:37', '2023-09-28 08:26:52', 'no'),
(10, 'Property 10', 'Property 10 Description', '4290', 'Lynch Tunnel', 'West Jany', 'USA', 'House & Apartments', 150000.00, 'USD', 10, 'ac', 'approved', 6, 13, '2023-09-28 00:49:24', '2023-09-28 08:28:33', 'no'),
(11, 'Property 11', 'Property 11 Description', '22', 'Tanya Green', 'Campbellbury', 'UK', 'House & Apartments', 300000.00, 'GBP', 30, 'ac', 'approved', 7, 1, '2023-09-28 00:51:15', '2023-09-28 08:30:06', 'no'),
(12, 'Property 12', 'Property 12 Description', '0/5', 'Klaus Peter-Kessler-Allee', 'Oberursel (Taunus)', 'Germany', 'House & Apartments', 400000.00, 'EUR', 45, 'sqm', 'approved', 11, 2, '2023-09-28 00:52:45', '2023-09-30 10:26:50', 'no'),
(15, 'Property 13', 'Property 13 Description', '7', 'Kaitlin Village', 'berlin', 'Germany', 'House & Apartments', 15000.00, 'EUR', 10, 'sqm', 'approved', 11, 12, '2023-09-30 10:04:54', '2023-09-30 23:52:21', 'no'),
(16, 'New Property', 'New Property Description', '7', 'Kaitlin Village', 'London', 'UK', 'House & Apartments', 150000.00, 'GBP', 10, 'sqm', 'approved', 11, 10, '2023-09-30 10:36:00', '2023-09-30 10:37:12', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `property_images`
--

CREATE TABLE `property_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_id` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_images`
--

INSERT INTO `property_images` (`id`, `property_id`, `image_url`, `created_at`, `updated_at`) VALUES
(3, 1, 'upload/property_images/1695875502_651501ae0ff41.jpg', '2023-09-27 23:01:42', '2023-09-27 23:01:42'),
(4, 1, 'upload/property_images/1695875502_651501ae1cdd8.jpg', '2023-09-27 23:01:42', '2023-09-27 23:01:42'),
(5, 2, 'upload/property_images/1695876149_6515043539faf.jpg', '2023-09-27 23:12:29', '2023-09-27 23:12:29'),
(6, 2, 'upload/property_images/1695876149_65150435436d2.jpg', '2023-09-27 23:12:29', '2023-09-27 23:12:29'),
(7, 3, 'upload/property_images/1695877216_651508600e9c9.jpg', '2023-09-27 23:30:16', '2023-09-27 23:30:16'),
(8, 4, 'upload/property_images/1695877602_651509e26602f.jpg', '2023-09-27 23:36:42', '2023-09-27 23:36:42'),
(9, 4, 'upload/property_images/1695877602_651509e26e3c1.jpg', '2023-09-27 23:36:42', '2023-09-27 23:36:42'),
(10, 5, 'upload/property_images/1695877866_65150aea7fe0f.jpg', '2023-09-27 23:41:06', '2023-09-27 23:41:06'),
(11, 6, 'upload/property_images/1695878187_65150c2bb7b65.jpg', '2023-09-27 23:46:27', '2023-09-27 23:46:27'),
(12, 7, 'upload/property_images/1695878291_65150c938ea00.jpg', '2023-09-27 23:48:11', '2023-09-27 23:48:11'),
(13, 8, 'upload/property_images/1695878368_65150ce015d6b.jpg', '2023-09-27 23:49:28', '2023-09-27 23:49:28'),
(14, 8, 'upload/property_images/1695878368_65150ce01c6f5.jpg', '2023-09-27 23:49:28', '2023-09-27 23:49:28'),
(15, 9, 'upload/property_images/1695881797_65151a45e8200.jpg', '2023-09-28 00:46:37', '2023-09-28 00:46:37'),
(16, 9, 'upload/property_images/1695881797_65151a45f0b3e.jpg', '2023-09-28 00:46:37', '2023-09-28 00:46:37'),
(17, 10, 'upload/property_images/1695881964_65151aec956ce.jpg', '2023-09-28 00:49:24', '2023-09-28 00:49:24'),
(18, 10, 'upload/property_images/1695881964_65151aec9abec.jpg', '2023-09-28 00:49:24', '2023-09-28 00:49:24'),
(19, 11, 'upload/property_images/1695882075_65151b5b52052.jpg', '2023-09-28 00:51:15', '2023-09-28 00:51:15'),
(20, 11, 'upload/property_images/1695882075_65151b5b57ac1.jpg', '2023-09-28 00:51:15', '2023-09-28 00:51:15'),
(21, 12, 'upload/property_images/1695882165_65151bb567608.jpg', '2023-09-28 00:52:45', '2023-09-28 00:52:45'),
(22, 12, 'upload/property_images/1695882165_65151bb56a42e.jpg', '2023-09-28 00:52:45', '2023-09-28 00:52:45'),
(26, 15, 'upload/property_images/1696088094_6518401e8d62b.jpg', '2023-09-30 10:04:54', '2023-09-30 10:04:54'),
(27, 15, 'upload/property_images/1696088094_6518401e964af.jpg', '2023-09-30 10:04:54', '2023-09-30 10:04:54'),
(28, 16, 'upload/property_images/1696089960_651847684cb2a.jpg', '2023-09-30 10:36:00', '2023-09-30 10:36:00'),
(29, 16, 'upload/property_images/1696089960_6518476850542.jpg', '2023-09-30 10:36:00', '2023-09-30 10:36:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `role` enum('admin','agent','user') NOT NULL DEFAULT 'user',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `user_name`, `email`, `email_verified_at`, `password`, `photo`, `phone`, `address`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin', 'admin@gmail.com', NULL, '$2y$10$wnTNzAg4K/H4D7uU/44Hb.IYs1IkX1jUpXJ9pDRklqytBV21rYRdi', 'upload/admin_images/1696137793.jpg', '0778945112', 'test address', 'admin', 'active', NULL, NULL, '2023-09-30 23:54:28'),
(2, 'Noah Henderson', 'Noah H', 'noah.henderson@example.com', NULL, '$2y$10$8WuQ6VG.TY6EwnUjfqpJQeUfRMnjFzJz/ZOUmPdIQDgsqrLxNTA36', 'upload/admin_images/1695829624.jpg', '789456120', '1508 Pockrus Page Rd', 'admin', 'active', NULL, NULL, '2023-09-27 10:23:31'),
(3, 'Jimmie Campbell', 'Jimmie C', 'jimmie.campbell@example.com', NULL, '$2y$10$O8VwGDQYFO8XevsHZiQ4jejcndWJZ.w6hmwu8EX1TUDwLcEpuhgGe', 'upload/admin_images/1695829210.jpg', '0778', '8679 Spring St', 'agent', 'active', NULL, NULL, '2023-09-27 10:11:44'),
(4, 'Raoul Berge MD', 'Raoul B', 'stella.kulas@example.net', '2023-09-19 04:17:00', '$2y$10$CQgFQR.zCyaT7KBGzhdBheJUd10vwvN2G1fSAP1BV7VrPpF30CVpW', 'upload/admin_images/1695828555.jpg', '+1-740-829-2412', '976 Runolfsson Expressway Suite 153\nMichelestad, TN 45977-5250', 'user', 'active', 'Jw1Cz3PPi2', '2023-09-19 04:17:00', '2023-09-27 09:59:15'),
(5, 'Beaulah Feil I', 'Beaulah F', 'jbeatty@example.org', '2023-09-19 04:17:00', '$2y$10$/BH7NYfz.S1/mTNiqtdOPeBABDE.dI1aKHii8/oyuedJGcdctGcou', 'upload/admin_images/1695828882.jpg', '959-438-0596', '6520 Berge Square\nSouth Missouri, KS 31147-7304', 'agent', 'active', 'jt797B9i6D', '2023-09-19 04:17:00', '2023-09-27 10:04:42'),
(6, 'Nikki Morar DDS', 'Nikki M', 'zpagac@example.net', '2023-09-19 04:17:00', '$2y$10$XqlLG.XXs3smd1fIIPN7ueTvmM/Ktx13hkRbTkA5Qv2uedgJzJgZy', 'upload/admin_images/1695828762.jpg', '332.764.6487', 'colombo', 'agent', 'active', 'lEPGc2b2no', '2023-09-19 04:17:00', '2023-09-27 10:08:02'),
(7, 'Electa Koch', 'Electa K', 'ritchie.oceane@example.net', '2023-09-19 04:17:00', '$2y$10$I8/GwysKhi98LmWGjRr9guXmwlv0eKjuXFthM1QgbIfzxnOXth0GC', 'upload/admin_images/1695828694.jpg', '423.810.5804', 'Kandy', 'agent', 'active', 'vaDknwmKQZ', '2023-09-19 04:17:00', '2023-09-27 10:07:42'),
(8, 'Kaitlyn Balistreri', NULL, 'orlo28@example.org', '2023-09-19 04:17:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '+1.480.356.9673', '3293 Ferry Land\nEast Idella, KS 30417-8020', 'agent', 'inactive', 'NfDiaTJU7z', '2023-09-19 04:17:00', '2023-09-19 04:17:00'),
(9, 'Angeline Greenholt', NULL, 'mosciski.holden@example.com', '2023-09-19 04:17:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '1-731-763-0987', '685 Blick Heights Suite 770\nHermannland, MO 60623-8338', 'agent', 'inactive', 'XjZ4CVncUO', '2023-09-19 04:17:00', '2023-09-19 04:17:00'),
(10, 'Aileen Klocko PhD', NULL, 'aniyah.schroeder@example.com', '2023-09-19 04:17:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '+1 (320) 800-0152', '26813 Fisher Villages Suite 731\nMcKenzieview, NJ 82672-3978', 'admin', 'inactive', '9bfXp4HzIJ', '2023-09-19 04:17:00', '2023-09-19 04:17:00'),
(11, 'Florine Kautzerine', 'Florine K.H', 'florine@gmail.com', '2023-09-19 04:17:00', '$2y$10$WnXjffvgTISdl91jlzIoPeyToyetpZDJ7ro.mFVx1J1ncjAfTXSR2', 'upload/admin_images/1696038828.jpg', '+1-205-323-6028', '485 Padberg PineJavonchester, CT 19652-2704', 'agent', 'active', 'r8Qub2xxVYrKpqWgJcnRLIun852hhddah56Bd3KlvngUvOsqXZP70Kt7glWc', '2023-09-19 04:17:00', '2023-09-30 23:55:46'),
(12, 'Celia Fay', NULL, 'schulist.heidi@example.org', '2023-09-19 04:17:00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, '+1 (228) 663-0800', '3448 Edison Drive\nColtenmouth, MO 23947', 'user', 'inactive', 'aVdashtdeW', '2023-09-19 04:17:00', '2023-09-19 04:17:00'),
(13, 'Johnny Hunt', 'Johnny H', 'johnny.hunt@example.com', NULL, '$2y$10$LxDSx09En2MN.yo34nk8geGhmtPbPTilhjh8rxggknf/9mA8MPbhm', 'upload/user_images/1695883606.jpg', '07788994451', '1508 Pockrus Page Rd', 'agent', 'active', NULL, '2023-09-28 01:16:46', '2023-09-28 01:16:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agent_has_customers`
--
ALTER TABLE `agent_has_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agent_has_properties`
--
ALTER TABLE `agent_has_properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contact_messages_email_unique` (`email`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_images`
--
ALTER TABLE `property_images`
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
-- AUTO_INCREMENT for table `agent_has_customers`
--
ALTER TABLE `agent_has_customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `agent_has_properties`
--
ALTER TABLE `agent_has_properties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `property_images`
--
ALTER TABLE `property_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
