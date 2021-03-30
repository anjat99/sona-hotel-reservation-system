-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2021 at 04:58 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sona`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_menus`
--

CREATE TABLE `admin_menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_menus`
--

INSERT INTO `admin_menus` (`id`, `name`, `url`, `order`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Dashboard', 'admin', 0, 'icon-chart-pie-36', NULL, NULL),
(2, 'Menu', 'menus.index', 1, 'icon-atom', NULL, NULL),
(3, 'Users', 'users.index', 2, 'icon-single-02', NULL, NULL),
(4, 'Subscribed people', 'subscribes.index', 3, 'icon-atom', NULL, NULL),
(5, 'Messages', 'messages.index', 4, 'icon-pin', NULL, NULL),
(6, 'Reviews', 'reviews.index', 5, 'icon-bell-55', NULL, NULL),
(7, 'Hotel Services', 'hotel-services.index', 6, 'icon-spaceship', NULL, NULL),
(8, 'Rooms', 'rooms-manage.index', 7, 'icon-world', NULL, NULL),
(9, 'Room Services', 'services.index', 8, 'icon-spaceship', NULL, NULL),
(10, 'Types', 'types.index', 9, 'icon-align-center', NULL, NULL),
(11, 'Booking', 'bookings.index', 10, 'icon-bell-55', NULL, NULL),
(12, 'Testimonials', 'testimonials.index', 11, 'icon-bell-55', NULL, NULL),
(13, 'Prices', 'prices.index', 12, 'icon-pin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `availability_types`
--

CREATE TABLE `availability_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `availability_types`
--

INSERT INTO `availability_types` (`id`, `quantity`, `type_id`, `created_at`, `updated_at`) VALUES
(1, 15, 1, '2021-03-18 17:02:34', '2021-03-18 17:02:34'),
(2, 10, 2, '2021-03-18 17:03:08', '2021-03-18 17:03:08'),
(3, 9, 3, '2021-03-18 17:05:53', '2021-03-18 17:05:53'),
(4, 13, 4, '2021-03-18 17:07:20', '2021-03-18 17:07:20'),
(5, 7, 5, '2021-03-18 17:09:38', '2021-03-18 17:09:38'),
(6, 8, 6, '2021-03-18 17:10:40', '2021-03-18 17:10:40'),
(7, 10, 7, '2021-03-18 17:14:39', '2021-03-18 17:14:39'),
(8, 7, 8, '2021-03-18 17:15:37', '2021-03-18 17:15:37'),
(9, 9, 9, '2021-03-18 17:17:54', '2021-03-18 17:17:54'),
(10, 8, 1, '2021-03-18 17:35:32', '2021-03-18 19:53:22'),
(11, 8, 4, '2021-03-18 17:38:23', '2021-03-18 18:56:44'),
(12, 9, 8, '2021-03-18 17:45:18', '2021-03-18 17:45:18'),
(13, 7, 5, '2021-03-18 17:49:59', '2021-03-20 14:52:27'),
(14, 0, 2, '2021-03-18 17:52:00', '2021-03-18 17:52:00'),
(15, 5, 7, '2021-03-18 17:53:37', '2021-03-18 17:53:37'),
(16, 6, 3, '2021-03-18 17:54:39', '2021-03-18 17:54:39'),
(17, 7, 10, '2021-03-18 17:55:35', '2021-03-18 17:55:35'),
(18, 7, 10, '2021-03-18 17:56:35', '2021-03-18 17:56:35'),
(19, 8, 1, '2021-03-18 17:57:45', '2021-03-18 17:57:45'),
(20, 1, 3, '2021-03-18 17:59:04', '2021-03-18 17:59:04'),
(21, 7, 9, '2021-03-18 18:00:26', '2021-03-18 18:00:26'),
(22, 5, 2, '2021-03-18 18:02:04', '2021-03-18 19:03:16'),
(23, 5, 6, '2021-03-18 18:04:32', '2021-03-18 18:04:32'),
(24, 7, 5, '2021-03-18 18:05:42', '2021-03-18 18:05:42'),
(25, 8, 7, '2021-03-18 18:06:34', '2021-03-18 18:06:34'),
(26, 8, 9, '2021-03-20 11:18:56', '2021-03-20 11:18:56');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `email`, `name`, `subject`, `message`, `is_read`, `created_at`, `updated_at`) VALUES
(1, 'test@gmail.com', 'Test Test', 'some reason', 'I just want to say I love your site and your offer is good', 0, '2021-03-18 18:50:51', '2021-03-18 18:50:51'),
(2, 'user4sona@gmail.com', 'Petar Petrovic', 'example', 'This is some example of message', 1, '2021-03-18 18:51:43', '2021-03-18 19:04:28'),
(3, 'test@gmail.com', 'Test Test', 'just checking', 'Is it working?', 0, '2021-03-18 20:23:51', '2021-03-18 20:23:51'),
(4, 'test@gmail.com', 'Test Test', 'some try', 'This is a try', 0, '2021-03-20 13:56:21', '2021-03-20 13:56:21'),
(5, 'test@gmail.com', 'Test Test', 'some try', 'This is a try', 0, '2021-03-20 13:56:29', '2021-03-20 13:56:29'),
(6, 'test@gmail.com', 'Test Test', 'some try', 'This is a try', 0, '2021-03-20 13:56:31', '2021-03-20 13:56:31'),
(7, 'test@gmail.com', 'Test Test', 'some try', 'This is a try', 0, '2021-03-20 13:56:32', '2021-03-20 13:56:32'),
(8, 'test@gmail.com', 'Test Test', 'some try', 'This is a try', 0, '2021-03-20 13:56:33', '2021-03-20 13:56:33'),
(9, 'anapetrovic@gmail.com', 'Ana Petrovic', 'proba', 'New', 0, '2021-03-20 14:03:43', '2021-03-20 14:03:43'),
(10, 'anapetrovic@gmail.com', 'Ana Petrovic', 'proba', 'New', 0, '2021-03-20 14:04:21', '2021-03-20 14:04:21'),
(11, 'anapetrovic@gmail.com', 'Ana Petrovic', 'proba', 'New', 0, '2021-03-20 14:12:26', '2021-03-20 14:12:26'),
(12, 'anapetrovic@gmail.com', 'Ana Petrovic', 'something', 'Try send message', 0, '2021-03-20 14:15:08', '2021-03-20 14:15:08'),
(13, 'anapetrovic@gmail.com', 'Ana Petrovic', 'Something', 'Try', 0, '2021-03-20 14:15:49', '2021-03-20 14:15:49'),
(14, 'peramikic@gmail.com', 'Pera', 'soemthing', 'Example', 0, '2021-03-20 14:21:08', '2021-03-20 14:21:08'),
(15, 'peramikic@gmail.com', 'Pera', 'soemthing', 'Example', 0, '2021-03-20 14:22:23', '2021-03-20 14:22:23'),
(16, 'test@gmail.com', 'Test Test', 'proba', 'Dsomethigb', 1, '2021-03-20 14:24:29', '2021-03-20 14:45:44'),
(18, 'test@gmail.com', 'Test Test', 'proba', 'mejl', 1, '2021-03-20 14:29:39', '2021-03-20 14:45:35'),
(19, 'anja.tomic.7.18@ict.edu.rs', 'Test Test', 'something new', 'Its something new', 0, '2021-03-20 14:41:46', '2021-03-20 14:41:46');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_services`
--

CREATE TABLE `hotel_services` (
  `id` int(10) UNSIGNED NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotel_services`
--

INSERT INTO `hotel_services` (`id`, `img`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'RG91YKjbPaCite8s1IE3spdpucVYJtd2mJeZ0qbA.png', 'Travel Plan', 'Whether business, pleasure or a little of both brings you to London, Strand Palace has perfected the art of the relaxing stay. Don’t settle for anything less; let us be your gateway to London’s heart.', '2021-03-18 16:34:29', '2021-03-18 16:34:29'),
(2, 'Ii60n3FH4TAFt5xwX3Tz2Nk1qAxRpzIRardwH3oQ.png', 'Thames River Cruises And Chilling', 'From special sightseeing tours and restaurant arrangements to theatre tickets, river cruises and chauffeured transportation, all it takes is a call to our professional guest services team.', '2021-03-18 16:36:33', '2021-03-18 16:36:33'),
(3, 'IvH8g1N1kOarospKadCMWeAItF6Kg7DUGW2A0Opl.png', 'Luggage storage facilities', 'It allows you not to have to carry your luggage from the station or airport to ours, but you get free transport and service to transport your belongings.', '2021-03-18 16:43:52', '2021-03-18 16:43:52'),
(4, 'PcVpsLnz0VbAlDaybWcAgBomrf0yg9yCycBqRD7p.jpg', 'Breakfast', 'The hotel restaurant with both indoor and outdoor seating offers an open-buffet breakfast and is directly accessible from guestroom corridors.', '2021-03-18 16:47:27', '2021-03-18 16:47:27'),
(5, 'ovB3hhdZBPUSK48TgQSp2ZiQqMer659TVDaNqljY.jpg', 'Room Service', 'HotelSona provides 24-hour room service. You can call this service whenever you want it 24/7', '2021-03-18 16:48:33', '2021-03-18 16:48:33'),
(6, 'Vfmnb4Wy6CT9V09HiQeJqCeY2ymuw280tOd4WtaF.jpg', 'Parking', 'HotelSona offers 24-hour indoor parking for its guests. The hotel is directly accessible from the indoor car park and guests can easily reach the shopping mall by using the elevators that are facing the car park hotel entrance. The indoor parking and valet services are free for accommodating hotel guests. Car washing service is also available with an additional cost.', '2021-03-18 16:49:11', '2021-03-18 16:49:11'),
(7, 'P7S0ci3bYkI1nmJhKGtnVRTcgwL8l3kgciuIj2kS.png', 'Internet Access', 'Hotel Sona offers free Internet access. High-speed wireless Internet connection is complimentary both in the rooms and public areas.', '2021-03-18 16:49:45', '2021-03-18 16:49:45');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `path`, `created_at`, `updated_at`) VALUES
(1, 'MQUD1wljhTEqxPVN5NjGSlX8PAnql1hmwsMFNWMY.jpg', '2021-03-18 17:35:33', '2021-03-18 17:35:33'),
(2, 'acMCq61qM4FcIttawyuYKfR2wiJkx6xMtU7n9tB5.jpg', '2021-03-18 17:38:23', '2021-03-18 17:38:23'),
(3, '6uusVT4ISMcuJVotvqcEWc4IGlyeK2detUoBnJ0A.jpg', '2021-03-18 17:45:18', '2021-03-18 17:45:18'),
(4, 'gg3Eatr4B96bpBZzekUF6yqPgDHE8BONZ60bOFVt.jpg', '2021-03-18 17:50:05', '2021-03-18 17:50:05'),
(5, 'sqWiJEoeXsrqgbsUF4qnPc7NWSdkmSxyXxG7sor3.jpg', '2021-03-18 17:52:00', '2021-03-18 17:52:00'),
(6, '4hWEkJAwc0uHdlMzpBc2Wz8FzyeZA09ANeFLFyxR.jpg', '2021-03-18 17:53:37', '2021-03-18 17:53:37'),
(7, 'QZ0YADLyL8I9HwPiao03eiXtVekd8HHuxIf9IGtS.jpg', '2021-03-18 17:54:40', '2021-03-18 17:54:40'),
(8, 'RE8vCdKVoYq7l5gBeW7H2BpZoxUIh0Tfe0Q66vSF.jpg', '2021-03-18 17:56:35', '2021-03-18 17:56:35'),
(9, 'izzU6h71mhdMapX69qUu919cJUNPSsoPhZLzqwME.jpg', '2021-03-18 17:57:45', '2021-03-18 17:57:45'),
(10, 'CHmxExEE5TCiXYuuZfayNgE2q9YcVHz7wg66qIY9.jpg', '2021-03-18 17:59:04', '2021-03-18 17:59:04'),
(11, 'hspQgRAFhpAPULBcBeOvzUuQJddg3rGuRzICgo3q.jpg', '2021-03-18 18:00:26', '2021-03-18 18:00:26'),
(12, 'RczGp9mq3rcFSR0nPShAsubPZAM5EF3cgDgjtV5T.jpg', '2021-03-18 18:02:04', '2021-03-18 18:02:04'),
(13, 'EYIB378IjCylOr3NjistjfKdsI1IrMM8HgwDOAk8.jpg', '2021-03-18 18:04:32', '2021-03-18 18:04:32'),
(14, 'up6Wy55ln5FuPgn6IeJtHeSgZ7YEyygWWgDg46m8.jpg', '2021-03-18 18:05:42', '2021-03-18 18:05:42'),
(15, '11aUtiZFRuVH7Iy4WfFMgzRN5S7TLRLkEbO3d4Fc.jpg', '2021-03-18 18:06:34', '2021-03-18 18:06:34'),
(16, 'WpGv095OVfgvKIxPWj5Rv4r0nlaYsRoeiBK5Sn66.jpg', '2021-03-20 11:18:57', '2021-03-20 11:18:57');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `url`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Home', 'home', 0, NULL, NULL),
(2, 'About Us', 'about', 1, NULL, NULL),
(3, 'Rooms', 'rooms.index', 2, NULL, NULL),
(4, 'Contact', 'contact.create', 3, NULL, NULL),
(5, 'Register', 'register.create', 4, NULL, NULL),
(6, 'Login', 'login.create', 5, NULL, NULL);

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
(1, '2021_03_02_212645_create_roles_table', 1),
(2, '2021_03_02_212738_create_menus_table', 1),
(3, '2021_03_02_212820_create_social_media_table', 1),
(4, '2021_03_02_212959_create_contacts_table', 1),
(5, '2021_03_02_213324_create_newsletters_table', 1),
(6, '2021_03_02_213424_create_users_table', 1),
(7, '2021_03_03_124502_create_hotel_services_table', 1),
(8, '2021_03_03_124554_create_services_table', 1),
(9, '2021_03_03_124626_create_images_table', 1),
(10, '2021_03_03_124643_create_types_table', 1),
(11, '2021_03_03_124659_create_prices_table', 1),
(12, '2021_03_03_150127_create_availability_types_table', 1),
(13, '2021_03_03_150252_create_rooms_table', 1),
(14, '2021_03_03_150333_create_room_services_table', 1),
(15, '2021_03_03_161520_create_testimonials_table', 1),
(16, '2021_03_03_161902_create_reservations_table', 1),
(17, '2021_03_03_161921_create_reviews_table', 1),
(18, '2021_03_03_161942_create_user_reviews_table', 1),
(19, '2021_03_03_162013_create_rating_rooms_table', 1),
(20, '2021_03_05_113056_create_admin_menus_table', 1),
(21, '2021_03_18_170227_create_user_activities_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'user@gmail.com', '2021-03-18 18:57:54', '2021-03-18 18:57:54'),
(2, 'peramikic@gmail.com', '2021-03-18 18:58:41', '2021-03-18 18:58:41'),
(3, 'mikam@gmail.com', '2021-03-18 18:58:49', '2021-03-18 18:58:49'),
(4, 'mikazikic@gmail.com', '2021-03-18 18:58:54', '2021-03-18 18:58:54'),
(5, 'user4sona@gmail.com', '2021-03-18 18:58:59', '2021-03-18 18:58:59'),
(6, 'jovaj@gmail.com', '2021-03-18 18:59:04', '2021-03-18 18:59:04'),
(7, 'svetlana013.tomic@gmail.com', '2021-03-20 14:35:20', '2021-03-20 14:35:20'),
(8, 'anja.tomic.7.18@ict.edu.rs', '2021-03-20 14:44:02', '2021-03-20 14:44:02');

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `id` int(10) UNSIGNED NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`id`, `price`, `created_at`, `updated_at`) VALUES
(1, '50.00', '2021-03-18 17:19:24', '2021-03-18 17:19:24'),
(2, '90.00', '2021-03-18 17:20:20', '2021-03-18 17:20:20'),
(3, '152.00', '2021-03-18 17:21:37', '2021-03-18 17:21:37'),
(4, '250.00', '2021-03-18 17:21:48', '2021-03-18 17:21:48'),
(5, '100.00', '2021-03-18 17:21:58', '2021-03-18 17:21:58'),
(6, '420.00', '2021-03-18 17:22:10', '2021-03-18 17:22:10'),
(7, '352.00', '2021-03-18 17:22:21', '2021-03-18 17:22:21'),
(8, '150.00', '2021-03-18 17:26:25', '2021-03-18 17:26:25'),
(9, '382.00', '2021-03-18 17:26:34', '2021-03-18 17:26:34'),
(10, '75.00', '2021-03-18 17:26:43', '2021-03-18 17:26:43'),
(11, '35.00', '2021-03-18 17:26:56', '2021-03-18 17:26:56'),
(12, '45.00', '2021-03-18 17:27:06', '2021-03-18 17:27:06'),
(13, '255.00', '2021-03-18 17:27:43', '2021-03-18 17:27:43'),
(14, '175.00', '2021-03-18 17:28:02', '2021-03-18 17:28:02'),
(15, '89.00', '2021-03-18 17:28:12', '2021-03-18 17:28:12'),
(16, '65.00', '2021-03-18 17:28:22', '2021-03-18 17:28:22'),
(17, '40.00', '2021-03-18 17:28:40', '2021-03-18 17:28:40');

-- --------------------------------------------------------

--
-- Table structure for table `rating_rooms`
--

CREATE TABLE `rating_rooms` (
  `id` int(10) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `value` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rating_rooms`
--

INSERT INTO `rating_rooms` (`id`, `room_id`, `user_id`, `value`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 5, '2021-03-18 18:38:01', '2021-03-18 18:38:01'),
(2, 2, 3, 3, '2021-03-18 18:54:57', '2021-03-18 18:54:57'),
(3, 3, 3, 3, '2021-03-18 18:57:06', '2021-03-18 18:57:06'),
(4, 12, 4, 5, '2021-03-18 19:02:34', '2021-03-18 19:02:34'),
(5, 4, 10, 4, '2021-03-20 14:51:23', '2021-03-20 14:51:23');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(10) UNSIGNED NOT NULL,
  `sum_price` decimal(8,2) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_people` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `check_in` datetime NOT NULL,
  `check_out` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `sum_price`, `name`, `phone`, `no_people`, `user_id`, `room_id`, `check_in`, `check_out`, `created_at`, `updated_at`) VALUES
(1, '1056.00', 'Pera Petrovic', '0654789581', 1, 2, 2, '2021-03-20 22:35:00', '2021-03-23 20:34:00', '2021-03-18 18:36:15', '2021-03-18 18:36:15'),
(2, '352.00', 'Test Test', '0671881486', 1, 3, 2, '2021-03-25 14:01:00', '2021-03-26 20:59:00', '2021-03-18 18:56:44', '2021-03-18 18:56:44'),
(3, '1513.00', 'Ana Petrovic', '061258151518', 4, 4, 12, '2021-03-26 21:08:00', '2021-03-31 21:09:00', '2021-03-18 19:03:16', '2021-03-18 19:03:16'),
(4, '304.00', 'Test Test', '0671881486', 1, 2, 1, '2021-04-01 21:56:00', '2021-04-03 21:56:00', '2021-03-18 19:53:21', '2021-03-18 19:53:21'),
(5, '306.00', 'Jelena Jelic', '065781515152', 1, 10, 4, '2021-03-23 16:55:00', '2021-03-31 16:58:00', '2021-03-20 14:52:26', '2021-03-20 14:52:26');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `message`, `created_at`, `updated_at`) VALUES
(1, 2, 'This room looks awesome. I\'ve really enjoyed in it!', '2021-03-18 18:34:53', '2021-03-18 18:34:53'),
(2, 3, 'Room services are good, I really enjoyed staying', '2021-03-18 18:55:31', '2021-03-18 18:55:31'),
(3, 4, 'Love It!', '2021-03-18 19:02:49', '2021-03-18 19:02:49'),
(4, 2, 'Everithing is good!', '2021-03-18 19:52:26', '2021-03-18 19:52:26'),
(5, 10, 'Awesome room!', '2021-03-20 14:51:47', '2021-03-20 14:51:47');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'user', NULL, NULL),
(3, 'VIP customer', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_id` bigint(20) UNSIGNED NOT NULL,
  `availability_type_id` bigint(20) UNSIGNED NOT NULL,
  `price_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `size`, `description`, `image_id`, `availability_type_id`, `price_id`, `created_at`, `updated_at`) VALUES
(1, 'Deluxe Double Room', 36, 'Nestle and surrounded by a tropical garden. The spacious and traditional appointed Deluxe Rooms (36m2) are nonsmoking and designed by using teakwood, marble and Bagan brick. Each room has high ceilings which give the room a large open feeling.', 1, 10, 3, '2021-03-18 17:35:33', '2021-03-18 17:35:33'),
(2, 'Superior Room', 50, 'Our One Bedroom Suites (50m2) are designed in a resort style, providing the comfort and feel of a resort with teak wood furniture and chic white marble bathroom. A spacious private backyard & terrace with views over the Pagodas.', 2, 11, 7, '2021-03-18 17:38:23', '2021-03-18 17:38:23'),
(3, 'Premium Queen Room', 45, 'Our One Bedroom Suites (45m2) are designed in a resort style, providing the comfort and feel of a resort with teak wood furniture and chic white marble bathroom.You will enjoy in it', 3, 12, 13, '2021-03-18 17:45:18', '2021-03-18 17:45:18'),
(4, 'Classic Single Room', 35, 'Full Sky Sports and Sky Movies Package with 48” Smart HDTV — Media hub with bluetooth and HDMI connectivity — Ensuite rainfall shower — Luxury toiletries — Slippers — 48” HDTV with HDMI connectivity. With our signature touches, our classic room sets the standard for a luxury lifestyle.', 4, 13, 12, '2021-03-18 17:50:05', '2021-03-18 17:50:05'),
(5, 'Executive Room', 75, 'Sumptuously comfy super-king size bed — Nespresso machine — Complimentary stocked fridge — Full Sky Sports and Sky Movies Package with 49” Smart HDTV — Media hub with bluetooth and HDMI connectivity — Tea and coffee tray, bottled water — Bathrobes and slippers — Crisp cotton linen and sumptuously soft bedding — Ensuite rainfall shower — Luxury toiletries — Hairdryer — Inroom safe — Iron and ironing board — Complimentary high speed WiFi', 5, 14, 9, '2021-03-18 17:52:00', '2021-03-18 17:52:00'),
(6, 'Double Room', 65, 'Luxurious super-king size bed — Complimentary stocked fridge — Relaxing stone-topped bath — Separate rainfall shower — Nespresso machine — Full Sky Sports and Sky Movies package with 49” Smart HDTV — Media hub with bluetooth and HDMI connectivity — Evening turndown — Tea and coffee tray, bottled water — Bathrobes and slippers — Crisp cotton linen and sumptuously soft bedding — Luxury toiletries — Hairdryer — In-room safe — Iron and ironing board — Complimentary high speed WiFi', 6, 15, 13, '2021-03-18 17:53:37', '2021-03-18 17:53:37'),
(7, 'TEPIDARIUM SIGNATURE SPA SUITE', 50, 'This room allows this in many ways from the heated bench in the feature multijet shower, the large 2-person airpool bath or the traditional sauna which has a glass wall into the bedroom.\r\n\r\nYou can then open the door to your Juliet balcony for gentle cooling whilst you relax and watch the 65inch smart flatscreen TV from the comfort of the luxurious lounge furniture. Finally retire to a grand 6ft ornately carved four poster bed for your perfect haven of sleep.', 7, 16, 15, '2021-03-18 17:54:40', '2021-03-18 17:54:40'),
(8, 'SANCTUARY SUITE', 60, 'Playing host to one of the widest beds in the Hotel, the 7ft four poster sits grandly at the head of the room. It’s complemented by a comfy sofa, large LCD TV and an iPod dock sound system.\r\n\r\nThe traditional style of the bedroom is merged seamlessly with the modern contemporary bathroom through an open, beamed archway.\r\n\r\nSanctuary’s bathroom has a double width rectangular air-pool bath and infra-red sauna as well as a power shower and twin sinks. Mood lighting allows you to set the scene for the ultimate spa in your room.', 8, 18, 8, '2021-03-18 17:56:35', '2021-03-18 17:56:35'),
(9, 'LEVITAS SIGNATURE SPA SUITE', 56, 'The English word ‘Levitate’ is derived from the Latin word ‘Levitas’ meaning ‘Light’, making it the perfect name for this Suite which is themed around floating and flight.\r\n\r\nCast your eyes over the horizon from the Juliet Balcony or admire the aeroplane themed décor from your traditional sauna. Then take a soak in the actual copper bath tub featured in the 2004 movie ‘Around the World in 80 Days’ with Jackie Chan and Steve Coogan.\r\n\r\nThe centre piece is the Levitating bed with mood lighting. Lifted high off the floor this bed appears to float in mid air allowing you to float into the deepest of sleeps.', 9, 19, 5, '2021-03-18 17:57:45', '2021-03-18 17:57:45'),
(10, 'BALNEA SUITE', 29, 'Balneum, or Balineum, is derived form Ancient Greek and means a bath or bathing vessel.\r\n\r\nOverlooking the Hotel gardens, this suite has a beautiful carved, half tester bed with LCD TV and fireplace.\r\n\r\nThe Spa bathroom features a  Japanese soaking tub, power shower and two heated spa beds where you can simply relax or watch TV, you can then move through to a second room which has a sauna big enough for two.\r\n\r\nAll this combined with mood lighting offers an ideal place to chill-out.', 10, 20, 14, '2021-03-18 17:59:04', '2021-03-18 17:59:04'),
(11, 'PASSADDHI SUITE', 90, 'Passaddhi is a Pali noun that has been translated as ‘calmness, tranquillity, repose and serenity’.\r\n\r\nIn Buddism, Passaddhi refers to tranquility of the body, speech, thoughts and conciousness on the path to enlightenment. \r\n\r\nOverlooking the Hotel’s beautiful gardens, the room features a 6ft antique four poster bed and large corner sofa that’s perfect for watching the 40″ LCD TV.\r\n\r\nThe bathroom has a unique, 5ft circular copper bath which fills from a ceiling water rose, matching sinks and a power shower. It also has a double, infra-red sauna with built-in radio, curved glass doors and mood lighting perfect for creating a tranquil setting.', 11, 21, 6, '2021-03-18 18:00:26', '2021-03-18 18:00:26'),
(12, 'THERMAE', 70, 'In ancient Rome, Thermae is a facility for bathing, usually being a large imperial complex.\r\n\r\nTrue to its name, Thermae provides both heat and bathing in its extensive bathroom.\r\n\r\nIt features a traditional Swedish sauna where two people can lie down under the twinkling lights, whist staying hydrated from the chilled water fountain. Cool off in the power shower or bathe in the glass bath, with waterfall filler feature, that’s complemented by twin glass sinks.\r\n\r\nThe glass theme continues into the bedroom with the 6ft hand-crafted glass bed. There’s also a large corner sofa and a 50″ plasma TV.', 12, 22, 15, '2021-03-18 18:02:04', '2021-03-18 18:02:04'),
(13, 'Room With View', 49, 'The Room With View offer on an open space uo to 50m2 combining a bedroom and a living room. The bathroom entirely made of Carrara marble has a bath, Italian shower and double basin.', 13, 23, 10, '2021-03-18 18:04:32', '2021-03-18 18:04:32'),
(14, 'Double Premium Room', 45, 'Each Double Premium Room has its own charm, its own personality. Some overlook the Rue du Cirque, radiant in the early morning light… All exude a certain sophisticated “je ne sais quoi”, which seems to be the hallmark of the Parisian art of living', 14, 24, 1, '2021-03-18 18:05:42', '2021-03-18 18:05:42'),
(15, 'Premier Room', 70, 'All the refinement of Belle Epoque Paris is skillfully revealed in this 45 m2 room with a view of the leafy patio. Pastel or stronger shades, herringbone parquet and shimmering damascene brocade fabrics all combine to create a luminous atmosphere that can be altered at will in the evening using the interactive tablet. The spacious bathroom made entirely of Carrara marble has a double basin and a bathtub as well as an Italian shower.', 15, 25, 16, '2021-03-18 18:06:34', '2021-03-18 18:06:34'),
(16, 'Apatment Family Room', 95, 'A very pretty apartment that is very close to the beach and center of town. Very convinient for families with children.', 16, 26, 16, '2021-03-20 11:18:57', '2021-03-20 11:18:57');

-- --------------------------------------------------------

--
-- Table structure for table `room_service`
--

CREATE TABLE `room_service` (
  `id` int(10) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_service`
--

INSERT INTO `room_service` (`id`, `room_id`, `service_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 4, NULL, NULL),
(3, 1, 7, NULL, NULL),
(4, 2, 3, NULL, NULL),
(5, 2, 4, NULL, NULL),
(6, 2, 5, NULL, NULL),
(7, 2, 7, NULL, NULL),
(8, 2, 8, NULL, NULL),
(9, 2, 9, NULL, NULL),
(10, 3, 1, NULL, NULL),
(11, 3, 3, NULL, NULL),
(12, 3, 4, NULL, NULL),
(13, 3, 9, NULL, NULL),
(14, 4, 3, NULL, NULL),
(15, 4, 4, NULL, NULL),
(16, 4, 9, NULL, NULL),
(17, 5, 3, NULL, NULL),
(18, 5, 4, NULL, NULL),
(19, 5, 5, NULL, NULL),
(20, 5, 8, NULL, NULL),
(21, 6, 1, NULL, NULL),
(22, 6, 3, NULL, NULL),
(23, 6, 4, NULL, NULL),
(24, 7, 1, NULL, NULL),
(25, 7, 3, NULL, NULL),
(26, 7, 4, NULL, NULL),
(27, 7, 7, NULL, NULL),
(28, 7, 9, NULL, NULL),
(29, 8, 2, NULL, NULL),
(30, 8, 3, NULL, NULL),
(31, 8, 4, NULL, NULL),
(32, 9, 2, NULL, NULL),
(33, 9, 7, NULL, NULL),
(34, 9, 8, NULL, NULL),
(35, 10, 3, NULL, NULL),
(36, 10, 8, NULL, NULL),
(37, 11, 1, NULL, NULL),
(38, 11, 3, NULL, NULL),
(39, 11, 4, NULL, NULL),
(40, 11, 9, NULL, NULL),
(41, 12, 2, NULL, NULL),
(42, 12, 3, NULL, NULL),
(43, 12, 4, NULL, NULL),
(44, 12, 5, NULL, NULL),
(45, 13, 3, NULL, NULL),
(46, 14, 1, NULL, NULL),
(47, 14, 4, NULL, NULL),
(48, 14, 9, NULL, NULL),
(49, 15, 3, NULL, NULL),
(50, 15, 4, NULL, NULL),
(51, 16, 3, NULL, NULL),
(52, 16, 4, NULL, NULL),
(53, 16, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Complimentary Daily Breakfast', '2021-03-18 16:51:05', '2021-03-18 16:51:05'),
(2, '3 Pcs Laundry Per Day', '2021-03-18 16:51:14', '2021-03-18 16:51:14'),
(3, 'Free Wifi', '2021-03-18 16:51:25', '2021-03-18 16:51:25'),
(4, 'Television', '2021-03-18 16:51:49', '2021-03-18 16:51:49'),
(5, '2 Bathrooms', '2021-03-18 16:51:59', '2021-03-18 16:51:59'),
(7, '24h butler service', '2021-03-18 16:54:06', '2021-03-18 16:54:06'),
(8, '24-Hour room service', '2021-03-18 16:54:24', '2021-03-18 16:54:24'),
(9, 'minibar', '2021-03-18 16:55:59', '2021-03-18 16:55:59');

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `id` int(10) UNSIGNED NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`id`, `path`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'https://www.facebook.com/', 'fab fa-facebook-f', NULL, NULL),
(2, 'https://twitter.com/', 'fab fa-twitter', NULL, NULL),
(3, 'https://www.tripadvisor.in/', 'fab fa-tripadvisor', NULL, NULL),
(4, 'https://www.instagram.com/', 'fab fa-instagram', NULL, NULL),
(5, 'https://www.youtube.com/', 'fab fa-youtube', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `description`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'This hotel looks really good. The stuff are so good that I cant explain it!', 2, '2021-03-18 18:37:22', '2021-03-18 18:37:22'),
(2, 'Your offer is so good, I love staying at your rooms and I reccomend you to all people', 3, '2021-03-18 18:54:20', '2021-03-18 18:54:20'),
(3, 'So good offers, my family love to stay at your rooms. Every holiday we spend and enjoyed at your offers', 4, '2021-03-18 19:02:10', '2021-03-18 19:02:10'),
(4, 'So good hotels,  so clean and also I love to see that you are so close to the centar of town', 10, '2021-03-20 14:53:43', '2021-03-20 14:53:43');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `capacity`, `created_at`, `updated_at`) VALUES
(1, 'Deluxe Room', 2, '2021-03-18 17:02:33', '2021-03-18 17:02:33'),
(2, 'Family Room', 5, '2021-03-18 17:03:08', '2021-03-18 17:03:08'),
(3, 'Suite Room', 4, '2021-03-18 17:05:53', '2021-03-18 17:05:53'),
(4, 'Superior Room', 3, '2021-03-18 17:07:20', '2021-03-18 17:07:20'),
(5, 'Single Room', 1, '2021-03-18 17:09:37', '2021-03-18 17:09:37'),
(6, 'Double Room', 2, '2021-03-18 17:10:40', '2021-03-18 17:10:40'),
(7, 'Triple Room', 3, '2021-03-18 17:14:39', '2021-03-18 17:14:39'),
(8, 'Queen Room', 2, '2021-03-18 17:15:37', '2021-03-18 17:15:37'),
(9, 'Apartments', 6, '2021-03-18 17:17:53', '2021-03-18 17:17:53'),
(10, 'Luxury Room', 7, '2021-03-18 17:55:35', '2021-03-18 17:55:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 'Anja', 'Tomić', 'anja.tomic099@gmail.com', '092b63505471e4d599d27b93a2530925', 1, NULL, NULL),
(2, 'Petar', 'Petrovic', 'user4sona@gmail.com', '4f1b975ec7c35c20e901e8a1064a8980', 2, NULL, NULL),
(3, 'Test', 'Test', 'test@gmail.com', '2168ad5e463d9accb215edaafa31c8d9', 2, '2021-03-18 06:52:49', '2021-03-18 06:52:49'),
(4, 'Ana', 'Petrovic', 'anapetrovic@gmail.com', '56e811097eec51f95ca71520c3379f2d', 2, '2021-03-18 07:00:49', '2021-03-18 07:00:49'),
(5, 'Pera', 'Peric', 'perap099@gmail.com', '1b32397700b64226040b9873338f5d6a', 2, '2021-03-20 02:48:34', '2021-03-20 02:48:34'),
(6, 'Mika', 'Mikic', 'mikam099@gmail.com', '476a1fb560a1c32f568eb100cf6be476', 2, '2021-03-20 02:48:58', '2021-03-20 02:48:58'),
(7, 'Jovana', 'Perovic', 'joksi4p@gmail.com', '1b32397700b64226040b9873338f5d6a', 2, '2021-03-20 02:49:30', '2021-03-20 02:49:30'),
(8, 'Joca', 'Jocic', 'joca099@gmail.com', '7bdfb6942477bb325240f27d4cdaa8b1', 2, '2021-03-20 02:49:56', '2021-03-20 02:49:56'),
(9, 'Ana', 'Antic', 'ana099@gmail.com', '80944534ac6fe7f001312450e8e810dc', 2, '2021-03-20 02:50:26', '2021-03-20 02:50:26'),
(10, 'Jelena', 'Jelic', 'jecaj123@gmail.com', '7bdfb6942477bb325240f27d4cdaa8b1', 2, '2021-03-20 02:50:51', '2021-03-20 02:50:51');

-- --------------------------------------------------------

--
-- Table structure for table `user_activities`
--

CREATE TABLE `user_activities` (
  `id` int(10) UNSIGNED NOT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `activity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_activities`
--

INSERT INTO `user_activities` (`id`, `ip_address`, `user_id`, `activity`, `date`, `created_at`, `updated_at`) VALUES
(1, '127.0.0.1', 1, 'login', '2021-03-18 16:26:27', NULL, NULL),
(2, '127.0.0.1', 2, 'login', '2021-03-18 18:27:41', NULL, NULL),
(3, '127.0.0.1', 2, ' visited Home.	', '2021-03-18 18:27:42', NULL, NULL),
(4, '127.0.0.1', 2, ' visited Rooms.	', '2021-03-18 18:28:01', NULL, NULL),
(5, '127.0.0.1', 2, 'create review', '2021-03-18 18:34:54', NULL, NULL),
(6, '127.0.0.1', 2, 'make reservation', '2021-03-18 18:36:15', NULL, NULL),
(7, '127.0.0.1', 2, ' visited Profile page.	', '2021-03-18 18:36:31', NULL, NULL),
(8, '127.0.0.1', 2, 'create testimonial', '2021-03-18 18:37:22', NULL, NULL),
(9, '127.0.0.1', 2, ' visited Profile page.	', '2021-03-18 18:37:22', NULL, NULL),
(10, '127.0.0.1', 2, ' visited Rooms.	', '2021-03-18 18:37:53', NULL, NULL),
(11, '127.0.0.1', 2, 'rated room', '2021-03-18 18:38:01', NULL, NULL),
(12, '127.0.0.1', 2, ' visited Rooms.	', '2021-03-18 18:38:37', NULL, NULL),
(13, '127.0.0.1', 2, ' visited Rooms.	', '2021-03-18 18:40:16', NULL, NULL),
(14, '127.0.0.1', 2, 'logout', '2021-03-18 18:40:39', NULL, NULL),
(15, '127.0.0.1', 2, 'login', '2021-03-18 18:51:12', NULL, NULL),
(16, '127.0.0.1', 2, ' visited Home.	', '2021-03-18 18:51:12', NULL, NULL),
(17, '127.0.0.1', 2, 'send message', '2021-03-18 18:51:43', NULL, NULL),
(18, '127.0.0.1', 2, 'logout', '2021-03-18 18:51:51', NULL, NULL),
(19, '127.0.0.1', 3, 'login', '2021-03-18 18:53:02', NULL, NULL),
(20, '127.0.0.1', 3, ' visited Home.	', '2021-03-18 18:53:02', NULL, NULL),
(21, '127.0.0.1', 3, ' visited Profile page.	', '2021-03-18 18:53:15', NULL, NULL),
(22, '127.0.0.1', 3, 'create testimonial', '2021-03-18 18:54:20', NULL, NULL),
(23, '127.0.0.1', 3, ' visited Profile page.	', '2021-03-18 18:54:20', NULL, NULL),
(24, '127.0.0.1', 3, ' visited Rooms.	', '2021-03-18 18:54:45', NULL, NULL),
(25, '127.0.0.1', 3, 'rated room', '2021-03-18 18:54:57', NULL, NULL),
(26, '127.0.0.1', 3, 'create review', '2021-03-18 18:55:31', NULL, NULL),
(27, '127.0.0.1', 3, 'make reservation', '2021-03-18 18:56:44', NULL, NULL),
(28, '127.0.0.1', 3, ' visited Profile page.	', '2021-03-18 18:56:48', NULL, NULL),
(29, '127.0.0.1', 3, ' visited Rooms.	', '2021-03-18 18:56:52', NULL, NULL),
(30, '127.0.0.1', 3, 'rated room', '2021-03-18 18:57:07', NULL, NULL),
(31, '127.0.0.1', 3, ' visited Home.	', '2021-03-18 18:57:14', NULL, NULL),
(32, '127.0.0.1', 3, 'logout', '2021-03-18 18:57:35', NULL, NULL),
(33, '127.0.0.1', 4, 'login', '2021-03-18 19:01:03', NULL, NULL),
(34, '127.0.0.1', 4, ' visited Home.	', '2021-03-18 19:01:04', NULL, NULL),
(35, '127.0.0.1', 4, ' visited Profile page.	', '2021-03-18 19:01:10', NULL, NULL),
(36, '127.0.0.1', 4, 'create testimonial', '2021-03-18 19:02:10', NULL, NULL),
(37, '127.0.0.1', 4, ' visited Profile page.	', '2021-03-18 19:02:10', NULL, NULL),
(38, '127.0.0.1', 4, ' visited Rooms.	', '2021-03-18 19:02:15', NULL, NULL),
(39, '127.0.0.1', 4, 'rated room', '2021-03-18 19:02:34', NULL, NULL),
(40, '127.0.0.1', 4, 'create review', '2021-03-18 19:02:49', NULL, NULL),
(41, '127.0.0.1', 4, 'make reservation', '2021-03-18 19:03:16', NULL, NULL),
(42, '127.0.0.1', 4, ' visited Home.	', '2021-03-18 19:03:23', NULL, NULL),
(43, '127.0.0.1', 4, 'logout', '2021-03-18 19:03:36', NULL, NULL),
(44, '127.0.0.1', 1, 'login', '2021-03-18 19:03:42', NULL, NULL),
(45, '127.0.0.1', 2, 'login', '2021-03-18 19:50:08', NULL, NULL),
(46, '127.0.0.1', 2, ' visited Home.	', '2021-03-18 19:50:08', NULL, NULL),
(47, '127.0.0.1', 2, ' visited Rooms.	', '2021-03-18 19:50:17', NULL, NULL),
(48, '127.0.0.1', 2, ' visited Rooms.	', '2021-03-18 19:50:34', NULL, NULL),
(49, '127.0.0.1', 2, 'create review', '2021-03-18 19:52:26', NULL, NULL),
(50, '127.0.0.1', 2, 'make reservation', '2021-03-18 19:53:21', NULL, NULL),
(51, '127.0.0.1', 2, ' visited Profile page.	', '2021-03-18 19:53:41', NULL, NULL),
(52, '127.0.0.1', 2, 'logout', '2021-03-18 19:55:29', NULL, NULL),
(53, '127.0.0.1', 1, 'login', '2021-03-18 19:55:48', NULL, NULL),
(54, '127.0.0.1', 1, 'login', '2021-03-18 20:56:41', NULL, NULL),
(55, '127.0.0.1', 1, 'login', '2021-03-18 22:22:23', NULL, NULL),
(56, '127.0.0.1', 1, 'login', '2021-03-19 10:29:22', NULL, NULL),
(57, '127.0.0.1', 1, 'login', '2021-03-20 08:00:49', NULL, NULL),
(58, '127.0.0.1', 1, 'login', '2021-03-20 11:13:56', NULL, NULL),
(59, '127.0.0.1', 1, 'logout', '2021-03-20 11:19:17', NULL, NULL),
(60, '127.0.0.1', 1, 'login', '2021-03-20 13:32:39', NULL, NULL),
(61, '127.0.0.1', 1, 'logout', '2021-03-20 13:55:52', NULL, NULL),
(62, '127.0.0.1', 4, 'login', '2021-03-20 14:03:23', NULL, NULL),
(63, '127.0.0.1', 4, ' visited Home.	', '2021-03-20 14:03:24', NULL, NULL),
(64, '127.0.0.1', 4, 'send message', '2021-03-20 14:12:30', NULL, NULL),
(65, '127.0.0.1', 4, 'send message', '2021-03-20 14:15:09', NULL, NULL),
(66, '127.0.0.1', 4, 'send message', '2021-03-20 14:15:50', NULL, NULL),
(67, '127.0.0.1', 4, 'logout', '2021-03-20 14:19:39', NULL, NULL),
(68, '127.0.0.1', 1, 'login', '2021-03-20 14:37:13', NULL, NULL),
(69, '127.0.0.1', 1, 'logout', '2021-03-20 14:39:16', NULL, NULL),
(70, '127.0.0.1', 1, 'login', '2021-03-20 14:41:55', NULL, NULL),
(71, '127.0.0.1', 1, 'logout', '2021-03-20 14:43:35', NULL, NULL),
(72, '127.0.0.1', 1, 'login', '2021-03-20 14:44:10', NULL, NULL),
(73, '127.0.0.1', 1, 'logout', '2021-03-20 14:46:07', NULL, NULL),
(74, '127.0.0.1', 10, 'login', '2021-03-20 14:51:08', NULL, NULL),
(75, '127.0.0.1', 10, ' visited Home.	', '2021-03-20 14:51:09', NULL, NULL),
(76, '127.0.0.1', 10, ' visited Rooms.	', '2021-03-20 14:51:14', NULL, NULL),
(77, '127.0.0.1', 10, 'rated room', '2021-03-20 14:51:23', NULL, NULL),
(78, '127.0.0.1', 10, 'create review', '2021-03-20 14:51:47', NULL, NULL),
(79, '127.0.0.1', 10, 'make reservation', '2021-03-20 14:52:27', NULL, NULL),
(80, '127.0.0.1', 10, ' visited Profile page.	', '2021-03-20 14:52:31', NULL, NULL),
(81, '127.0.0.1', 10, 'create testimonial', '2021-03-20 14:53:43', NULL, NULL),
(82, '127.0.0.1', 10, ' visited Profile page.	', '2021-03-20 14:53:44', NULL, NULL),
(83, '127.0.0.1', 10, 'logout', '2021-03-20 14:54:00', NULL, NULL),
(84, '127.0.0.1', 1, 'login', '2021-03-20 14:54:30', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_review`
--

CREATE TABLE `user_review` (
  `id` int(10) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `review_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_review`
--

INSERT INTO `user_review` (`id`, `room_id`, `review_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2021-03-18 18:34:54', '2021-03-18 18:34:54'),
(2, 2, 2, '2021-03-18 18:55:31', '2021-03-18 18:55:31'),
(3, 12, 3, '2021-03-18 19:02:49', '2021-03-18 19:02:49'),
(4, 1, 4, '2021-03-18 19:52:26', '2021-03-18 19:52:26'),
(5, 4, 5, '2021-03-20 14:51:47', '2021-03-20 14:51:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_menus`
--
ALTER TABLE `admin_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `availability_types`
--
ALTER TABLE `availability_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_services`
--
ALTER TABLE `hotel_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `newsletters_email_unique` (`email`);

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating_rooms`
--
ALTER TABLE `rating_rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rooms_name_unique` (`name`);

--
-- Indexes for table `room_service`
--
ALTER TABLE `room_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `services_name_unique` (`name`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `types_name_unique` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_activities`
--
ALTER TABLE `user_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_review`
--
ALTER TABLE `user_review`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_menus`
--
ALTER TABLE `admin_menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `availability_types`
--
ALTER TABLE `availability_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `hotel_services`
--
ALTER TABLE `hotel_services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `rating_rooms`
--
ALTER TABLE `rating_rooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `room_service`
--
ALTER TABLE `room_service`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_activities`
--
ALTER TABLE `user_activities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `user_review`
--
ALTER TABLE `user_review`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
