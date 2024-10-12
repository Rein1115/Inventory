-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 12, 2024 at 07:51 AM
-- Server version: 10.11.9-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u275415439_rein`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `created_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `created_by`, `updated_by`, `created_id`, `created_at`, `updated_at`) VALUES
(15, 'A PET CARE', '2', NULL, 2, '2024-09-26 21:45:28', '2024-09-26 21:45:28'),
(16, 'HIMALAYA PRODUCTS', '2', NULL, 2, '2024-09-28 01:56:36', '2024-09-28 01:56:36'),
(17, 'VALIUM', '2', NULL, 2, '2024-09-28 01:57:12', '2024-09-28 01:57:12'),
(18, 'Nex Gard', '2', NULL, 2, '2024-09-28 01:57:52', '2024-09-28 01:57:52'),
(19, 'FRONTLINE PLUS', '2', NULL, 2, '2024-09-28 01:58:41', '2024-09-28 01:58:41'),
(20, 'VETOQUINOL', '2', NULL, 2, '2024-09-28 01:59:41', '2024-09-28 01:59:41'),
(21, 'PHYLUM', '2', NULL, 2, '2024-09-28 02:00:17', '2024-09-28 02:00:17'),
(22, 'ACCULIFE FLUIDS 1L', '2', NULL, 2, '2024-09-28 02:00:53', '2024-09-28 02:00:53'),
(23, 'SURE GUARD', '2', NULL, 2, '2024-09-28 02:01:39', '2024-09-28 02:01:39'),
(24, 'SURGITECH', '2', NULL, 2, '2024-09-28 02:01:55', '2024-09-28 02:01:55'),
(25, 'VEKO PRODUCTS', '2', NULL, 2, '2024-09-28 02:02:25', '2024-09-28 02:02:25'),
(26, 'NOVA FOLHA', '2', NULL, 2, '2024-09-28 02:02:50', '2024-09-28 02:02:50'),
(27, 'MOXYLOR', '2', NULL, 2, '2024-09-28 02:04:05', '2024-09-28 02:04:05'),
(28, 'EUROMED FLUIDS', '2', NULL, 2, '2024-09-28 02:09:38', '2024-09-28 02:09:38'),
(29, 'EUROMED FLUIDS', '2', NULL, 2, '2024-09-28 02:09:38', '2024-09-28 02:09:38'),
(30, 'EPOTIN', '2', NULL, 2, '2024-09-28 02:10:55', '2024-09-28 02:10:55'),
(31, 'RENOCRIT', '2', NULL, 2, '2024-09-28 02:11:17', '2024-09-28 02:11:17'),
(32, 'VINLUN', '2', NULL, 2, '2024-09-28 02:12:10', '2024-09-28 02:12:10'),
(33, 'VIRBAC', '2', NULL, 2, '2024-09-28 02:15:09', '2024-09-28 02:15:09'),
(34, 'TENDER SOFT', '2', NULL, 2, '2024-09-28 02:15:45', '2024-09-28 02:15:45'),
(35, 'AMBICA', '2', NULL, 2, '2024-09-28 02:16:32', '2024-09-28 02:16:32'),
(36, 'MEOXICLAV', '2', NULL, 2, '2024-09-28 02:16:50', '2024-09-28 02:16:50'),
(37, 'GABASAPH 500', '2', NULL, 2, '2024-09-28 02:17:24', '2024-09-28 02:17:24'),
(38, 'PROPORA', '2', NULL, 2, '2024-09-28 02:17:46', '2024-09-28 02:17:46'),
(39, 'GABAVEX 100', '2', NULL, 2, '2024-09-28 02:18:39', '2024-09-28 02:18:39'),
(40, 'OR CAP', '2', NULL, 2, '2024-09-28 02:19:05', '2024-09-28 02:19:05'),
(41, 'INDOPLAS', '2', NULL, 2, '2024-09-28 02:19:26', '2024-09-28 02:19:26'),
(42, 'GLASS SLIDE', '2', NULL, 2, '2024-09-28 02:20:13', '2024-09-28 02:20:13'),
(43, 'CIPRO', '2', NULL, 2, '2024-09-28 02:20:55', '2024-09-28 02:20:55'),
(44, 'ALLECUR', '2', NULL, 2, '2024-09-28 02:21:26', '2024-09-28 02:21:26'),
(45, 'FLAGEX TAB', '2', NULL, 2, '2024-09-28 02:21:52', '2024-09-28 02:21:52'),
(46, 'CATHULA', '2', NULL, 2, '2024-09-28 02:22:08', '2024-09-28 02:22:08'),
(47, 'CHI-CHI', '2', NULL, 2, '2024-09-28 02:22:28', '2024-09-28 02:22:28'),
(48, 'NOVA FLORA', '2', NULL, 2, '2024-09-28 02:23:22', '2024-09-28 02:23:22'),
(49, 'SECHERON SET', '2', NULL, 2, '2024-09-28 02:23:50', '2024-09-28 02:23:50'),
(50, 'MIXCLAV', '2', NULL, 2, '2024-09-28 02:25:04', '2024-09-28 02:25:04'),
(51, 'POMISOL', '2', NULL, 2, '2024-09-28 02:25:40', '2024-09-28 02:25:40'),
(52, 'ISOPRINOSINE SYRUP', '2', NULL, 2, '2024-09-28 02:26:23', '2024-09-28 02:26:23'),
(53, 'SQCEF', '2', NULL, 2, '2024-09-28 02:27:38', '2024-09-28 02:27:38'),
(54, 'COTRIMAXOL', '2', NULL, 2, '2024-09-28 02:28:03', '2024-09-28 02:28:03'),
(55, 'TIMOLOL', '2', NULL, 2, '2024-09-28 02:28:34', '2024-09-28 02:28:34'),
(56, 'CLAVOXUR', '2', NULL, 2, '2024-09-28 02:29:30', '2024-09-28 02:29:30'),
(57, 'AXMEL (MYREX)', '2', NULL, 2, '2024-09-28 02:30:11', '2024-09-28 02:30:11'),
(58, 'CLOVIMED', '2', NULL, 2, '2024-09-28 02:30:55', '2024-09-28 02:30:55'),
(59, 'ZANTRACID', '2', NULL, 2, '2024-09-28 02:31:16', '2024-09-28 02:31:16'),
(60, 'FLORANE', '2', NULL, 2, '2024-09-28 02:32:09', '2024-09-28 02:32:09'),
(61, 'CONSAC', '2', NULL, 2, '2024-09-28 02:32:33', '2024-09-28 02:32:33'),
(62, 'GLUCASAPH', '2', NULL, 2, '2024-09-28 02:33:22', '2024-09-28 02:33:22'),
(63, 'HISTAMOX', '2', NULL, 2, '2024-09-28 02:33:45', '2024-09-28 02:33:45'),
(64, 'VONWELT', '2', NULL, 2, '2024-09-28 02:34:10', '2024-09-28 02:34:10'),
(65, 'PHIZOLIN', '2', NULL, 2, '2024-09-28 02:34:42', '2024-09-28 02:34:42'),
(66, 'FUROXIDE', '2', NULL, 2, '2024-09-28 02:35:08', '2024-09-28 02:35:08'),
(67, 'TOBYN-D', '2', NULL, 2, '2024-09-28 02:35:42', '2024-09-28 02:35:42'),
(68, 'TOBRIN', '2', NULL, 2, '2024-09-28 02:37:21', '2024-09-28 02:37:21'),
(69, 'BENZYL', '2', NULL, 2, '2024-09-28 02:38:25', '2024-09-28 02:38:25'),
(70, 'NEX GARD SPECTRA', '2', NULL, 2, '2024-09-28 02:39:51', '2024-09-28 02:39:51'),
(71, 'NexGard Spectra', '2', NULL, 2, '2024-09-28 07:04:41', '2024-09-28 07:04:41'),
(72, 'Bravecto', '2', NULL, 2, '2024-09-28 08:46:06', '2024-09-28 08:46:06'),
(73, 'NOVA B COMPLEX', '2', NULL, 2, '2024-09-28 09:40:26', '2024-09-28 09:40:26'),
(74, 'Prednisolone Injectable', '2', NULL, 2, '2024-09-28 10:09:30', '2024-09-28 10:09:30'),
(75, 'Nova', '2', NULL, 2, '2024-09-28 10:57:30', '2024-09-28 10:57:30'),
(76, 'Ro-An Vet', '2', NULL, 2, '2024-09-28 11:07:55', '2024-09-28 11:07:55'),
(77, 'orex', '2', NULL, 2, '2024-09-28 13:06:09', '2024-09-28 13:06:09'),
(78, 'New Leaf', '2', NULL, 2, '2024-09-29 02:28:01', '2024-09-29 02:28:01'),
(79, 'Menaright forte', '2', NULL, 2, '2024-09-29 02:50:33', '2024-09-29 02:50:33'),
(80, 'LEFESONE', '2', NULL, 2, '2024-09-29 02:54:39', '2024-09-29 02:54:39'),
(81, 'PREND', '2', NULL, 2, '2024-09-29 03:00:27', '2024-09-29 03:00:27'),
(82, 'Ektek pharma', '2', NULL, 2, '2024-09-29 03:15:10', '2024-09-29 03:15:10'),
(83, 'sureguard', '2', NULL, 2, '2024-09-30 08:35:39', '2024-09-30 08:35:39'),
(84, 'No brand', '2', NULL, 2, '2024-09-30 08:49:01', '2024-09-30 08:49:01'),
(85, 'Tender Sof', '2', NULL, 2, '2024-09-30 08:56:23', '2024-09-30 08:56:23'),
(86, 'Can care', '2', NULL, 2, '2024-09-30 10:08:35', '2024-09-30 10:08:35'),
(87, 'Novazith', '2', NULL, 2, '2024-09-30 10:09:33', '2024-09-30 10:09:33'),
(88, 'REWITEYL', '2', NULL, 2, '2024-09-30 10:10:14', '2024-09-30 10:10:14'),
(89, 'TUDOR', '2', NULL, 2, '2024-09-30 10:10:32', '2024-09-30 10:10:32'),
(90, 'METO', '2', NULL, 2, '2024-09-30 10:11:19', '2024-09-30 10:11:19'),
(91, 'OPIODEX', '2', NULL, 2, '2024-09-30 10:11:43', '2024-09-30 10:11:43'),
(92, 'MONOFILAMENT', '2', NULL, 2, '2024-09-30 10:13:42', '2024-09-30 10:13:42'),
(93, 'CARDINAL', '2', NULL, 2, '2024-09-30 10:14:25', '2024-09-30 10:14:25'),
(94, 'CAT CATHETER', '2', NULL, 2, '2024-09-30 10:14:50', '2024-09-30 10:14:50'),
(95, 'ORMED', '2', NULL, 2, '2024-09-30 10:15:18', '2024-09-30 10:15:18'),
(96, 'ORMED', '2', NULL, 2, '2024-09-30 10:15:18', '2024-09-30 10:15:18'),
(97, 'NANOVISC', '2', NULL, 2, '2024-09-30 10:15:41', '2024-09-30 10:15:41'),
(98, 'NEMATOCIDE', '2', NULL, 2, '2024-09-30 10:36:25', '2024-09-30 10:36:25'),
(99, 'Cathy', '2', NULL, 2, '2024-09-30 12:17:20', '2024-09-30 12:17:20'),
(100, 'Mosnev', '2', NULL, 2, '2024-09-30 12:32:27', '2024-09-30 12:32:27'),
(101, 'Guardian', '2', NULL, 2, '2024-09-30 14:11:56', '2024-09-30 14:11:56'),
(102, 'Terrumo', '2', NULL, 2, '2024-09-30 14:20:39', '2024-09-30 14:20:39'),
(103, 'AMSUMED', '2', NULL, 2, '2024-10-01 08:43:43', '2024-10-01 08:43:43'),
(104, 'CICLOTAK', '2', NULL, 2, '2024-10-01 08:49:33', '2024-10-01 08:49:33'),
(105, 'Lubxe drop', '2', NULL, 2, '2024-10-01 08:58:05', '2024-10-01 08:58:05'),
(107, 'LATOSIL', '2', NULL, 2, '2024-10-01 09:07:55', '2024-10-01 09:07:55'),
(108, 'zytodex', '2', NULL, 2, '2024-10-01 09:14:24', '2024-10-01 09:14:24'),
(109, 'Elaime', '2', NULL, 2, '2024-10-01 21:52:05', '2024-10-01 21:52:05'),
(110, 'water solution', '2', NULL, 2, '2024-10-07 05:11:06', '2024-10-07 05:11:06'),
(111, 'Oral', '2', NULL, 2, '2024-10-07 06:33:29', '2024-10-07 06:33:29'),
(112, 'Ophtalmoligicals', '2', NULL, 2, '2024-10-07 06:58:37', '2024-10-07 06:58:37'),
(113, 'Pet Accessories', '2', NULL, 2, '2024-10-08 05:29:27', '2024-10-08 05:29:27'),
(114, 'Veterinary Diagnostics', '2', NULL, 2, '2024-10-08 07:41:16', '2024-10-08 07:41:16'),
(115, 'Atro', '2', NULL, 2, '2024-10-09 00:36:01', '2024-10-09 00:36:01'),
(116, 'Plaridel', '2', NULL, 2, '2024-10-11 12:32:03', '2024-10-11 12:32:03');

-- --------------------------------------------------------

--
-- Table structure for table `clinics`
--

CREATE TABLE `clinics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `clinic_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `created_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `expenses_date` date NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `category`, `amount`, `expenses_date`, `created_by`, `created_id`, `created_at`, `updated_at`) VALUES
(7, 'GASOLINE', 1200.00, '2024-09-26', 'MARGIE CAMBONGGA', 2, '2024-09-26 21:50:21', '2024-09-27 06:44:58'),
(12, 'gas', 1300.00, '2024-09-27', 'MARGIE CAMBONGGA', 2, '2024-09-27 13:59:29', '2024-09-27 13:59:29'),
(13, 'Meal', 130.00, '2024-09-27', 'MARGIE CAMBONGGA', 2, '2024-09-27 14:00:21', '2024-09-27 14:00:21'),
(14, 'Lawg baboy ug piiso expenses sa baboy', 1600.00, '2024-09-27', 'MARGIE CAMBONGGA', 2, '2024-09-27 14:01:29', '2024-09-27 14:01:29'),
(15, 'Gas sa motor', 200.00, '2024-09-27', 'MARGIE CAMBONGGA', 2, '2024-09-27 14:02:10', '2024-09-27 14:02:10'),
(16, 'lalamove fom marikina test kits', 150.00, '2024-09-27', 'MARGIE CAMBONGGA', 2, '2024-09-27 14:02:56', '2024-09-27 14:02:56'),
(17, 'gas', 1200.00, '2024-10-01', 'MARGIE CAMBONGGA', 2, '2024-10-01 21:48:03', '2024-10-02 10:51:36'),
(18, 'Pamalengke', 695.00, '2024-10-01', 'MARGIE CAMBONGGA', 2, '2024-10-01 21:49:49', '2024-10-01 21:49:49'),
(19, 'groceries', 650.00, '2024-10-01', 'MARGIE CAMBONGGA', 2, '2024-10-01 21:51:04', '2024-10-01 21:51:04'),
(20, 'Meal', 200.00, '2024-10-01', 'MARGIE CAMBONGGA', 2, '2024-10-01 21:51:43', '2024-10-01 21:51:43'),
(21, 'gas', 950.00, '2024-10-02', 'MARGIE CAMBONGGA', 2, '2024-10-02 10:36:22', '2024-10-02 10:36:22'),
(23, 'Gas motor', 161.00, '2024-10-02', 'MARGIE CAMBONGGA', 2, '2024-10-02 10:55:07', '2024-10-02 10:55:07'),
(26, 'meal', 470.00, '2024-10-03', 'MARGIE CAMBONGGA', 2, '2024-10-03 11:05:21', '2024-10-03 11:05:21'),
(27, 'Gas motor', 235.00, '2024-10-03', 'MARGIE CAMBONGGA', 2, '2024-10-03 11:40:44', '2024-10-03 11:40:44'),
(28, 'GLOAN', 236.57, '2024-10-03', 'MARGIE CAMBONGGA', 2, '2024-10-03 11:44:44', '2024-10-03 11:44:44'),
(29, 'GULAY', 245.00, '2024-10-03', 'MARGIE CAMBONGGA', 2, '2024-10-03 11:46:17', '2024-10-03 11:46:17'),
(30, 'GULAY', 245.00, '2024-10-03', 'MARGIE CAMBONGGA', 2, '2024-10-03 11:46:17', '2024-10-03 11:46:17'),
(31, 'MOUSE', 330.00, '2024-10-03', 'MARGIE CAMBONGGA', 2, '2024-10-03 11:47:46', '2024-10-03 11:47:46'),
(32, 'XEROX', 333.00, '2024-10-03', 'MARGIE CAMBONGGA', 2, '2024-10-03 11:48:44', '2024-10-03 11:48:44'),
(33, 'XEROX', 333.00, '2024-10-03', 'MARGIE CAMBONGGA', 2, '2024-10-03 11:48:44', '2024-10-03 11:48:44'),
(34, 'GROCERY', 2348.91, '2024-10-03', 'MARGIE CAMBONGGA', 2, '2024-10-03 11:51:15', '2024-10-03 11:51:15'),
(35, 'RFID', 1035.00, '2024-10-02', 'MARGIE CAMBONGGA', 2, '2024-10-03 11:52:58', '2024-10-03 11:52:58'),
(36, 'Moto maintainance', 1790.00, '2024-10-03', 'MARGIE CAMBONGGA', 2, '2024-10-03 21:54:41', '2024-10-03 21:54:41'),
(37, 'Meal', 466.00, '2024-10-04', 'MARGIE CAMBONGGA', 2, '2024-10-05 14:21:12', '2024-10-05 14:21:12'),
(38, 'Gas car', 1520.00, '2024-10-04', 'MARGIE CAMBONGGA', 2, '2024-10-05 14:22:03', '2024-10-05 14:22:03'),
(39, 'Margie expenses', 1590.00, '2024-10-04', 'MARGIE CAMBONGGA', 2, '2024-10-05 14:22:58', '2024-10-05 14:22:58'),
(40, 'Margie expenses', 1590.00, '2024-10-04', 'MARGIE CAMBONGGA', 2, '2024-10-05 14:22:58', '2024-10-05 14:22:58'),
(41, 'meal', 400.00, '2024-10-05', 'MARGIE CAMBONGGA', 2, '2024-10-05 14:23:22', '2024-10-05 14:23:22'),
(42, 'Meal', 298.00, '2024-10-05', 'MARGIE CAMBONGGA', 2, '2024-10-05 14:23:51', '2024-10-05 14:23:51'),
(43, 'Tanom /lansones /niyog', 600.00, '2024-10-05', 'MARGIE CAMBONGGA', 2, '2024-10-05 14:24:40', '2024-10-05 14:24:40'),
(44, 'Pamalengke divi', 3000.00, '2024-10-08', 'MARGIE CAMBONGGA', 2, '2024-10-08 15:47:49', '2024-10-08 15:47:49'),
(45, 'Meal', 275.00, '2024-10-08', 'MARGIE CAMBONGGA', 2, '2024-10-08 15:48:55', '2024-10-08 15:48:55'),
(46, 'Insurance  margie', 3000.00, '2024-10-08', 'MARGIE CAMBONGGA', 2, '2024-10-08 15:49:33', '2024-10-08 15:49:33'),
(47, 'Internet installation', 1575.00, '2024-10-08', 'MARGIE CAMBONGGA', 2, '2024-10-08 15:50:11', '2024-10-08 15:50:11'),
(48, 'Beepcard', 100.00, '2024-10-07', 'MARGIE CAMBONGGA', 2, '2024-10-08 15:51:23', '2024-10-08 15:51:23'),
(49, 'Snacks', 151.00, '2024-10-07', 'MARGIE CAMBONGGA', 2, '2024-10-08 15:51:50', '2024-10-08 15:51:50'),
(50, 'Foods', 370.00, '2024-10-07', 'MARGIE CAMBONGGA', 2, '2024-10-08 15:52:28', '2024-10-08 15:52:28'),
(51, 'RFID', 1000.00, '2024-10-08', 'MARGIE CAMBONGGA', 2, '2024-10-08 15:53:45', '2024-10-08 15:53:45'),
(52, 'Pamalengke', 630.00, '2024-10-07', 'MARGIE CAMBONGGA', 2, '2024-10-09 03:26:22', '2024-10-09 03:26:22'),
(53, 'Gas motor', 200.00, '2024-10-08', 'MARGIE CAMBONGGA', 2, '2024-10-09 03:26:51', '2024-10-09 03:26:51'),
(54, 'Gas car', 1700.00, '2024-10-09', 'MARGIE CAMBONGGA', 2, '2024-10-09 03:27:38', '2024-10-09 03:27:38'),
(55, 'LPG GAS', 950.00, '2024-10-09', 'MARGIE CAMBONGGA', 2, '2024-10-09 03:28:16', '2024-10-09 03:28:16'),
(56, 'Floormat', 1385.00, '2024-10-09', 'MARGIE CAMBONGGA', 2, '2024-10-09 11:22:47', '2024-10-09 11:22:47'),
(57, 'Meal', 229.00, '2024-10-09', 'MARGIE CAMBONGGA', 2, '2024-10-09 11:23:38', '2024-10-09 11:23:38'),
(58, 'Groceries', 878.00, '2024-10-09', 'MARGIE CAMBONGGA', 2, '2024-10-09 11:25:22', '2024-10-09 11:25:22'),
(59, 'Mga bata', 700.00, '2024-10-09', 'MARGIE CAMBONGGA', 2, '2024-10-09 11:28:36', '2024-10-09 11:28:36'),
(60, 'Jocked sa car', 550.00, '2024-10-09', 'MARGIE CAMBONGGA', 2, '2024-10-09 11:29:06', '2024-10-09 11:29:06'),
(61, 'Hubby', 100.00, '2024-10-09', 'MARGIE CAMBONGGA', 2, '2024-10-09 11:31:10', '2024-10-09 11:31:10'),
(62, 'Groceries', 6013.00, '2024-10-09', 'MARGIE CAMBONGGA', 2, '2024-10-09 13:17:12', '2024-10-09 13:17:12'),
(63, 'UNITOP', 710.00, '2024-10-10', 'MARGIE CAMBONGGA', 2, '2024-10-10 14:38:54', '2024-10-10 14:38:54'),
(64, 'Gas car', 1905.00, '2024-10-11', 'MARGIE CAMBONGGA', 2, '2024-10-11 12:07:34', '2024-10-11 20:52:55'),
(65, 'Gas motor', 100.00, '2024-10-11', 'MARGIE CAMBONGGA', 2, '2024-10-11 12:08:03', '2024-10-11 12:08:03'),
(66, 'Meal dren and joshua', 150.00, '2024-10-11', 'MARGIE CAMBONGGA', 2, '2024-10-11 12:08:43', '2024-10-11 12:08:43'),
(67, 'Gas car', 1700.00, '2024-10-10', 'MARGIE CAMBONGGA', 2, '2024-10-11 12:09:16', '2024-10-11 12:09:16'),
(68, 'Parking divi', 50.00, '2024-10-10', 'MARGIE CAMBONGGA', 2, '2024-10-11 12:10:01', '2024-10-11 12:10:01'),
(69, 'Lalamove', 140.00, '2024-10-10', 'MARGIE CAMBONGGA', 2, '2024-10-11 12:10:46', '2024-10-11 12:10:46'),
(70, 'Others', 300.00, '2024-10-10', 'MARGIE CAMBONGGA', 2, '2024-10-11 12:11:35', '2024-10-11 12:11:35'),
(71, 'Matt sa car', 2500.00, '2024-10-11', 'MARGIE CAMBONGGA', 2, '2024-10-11 12:14:14', '2024-10-11 12:14:14'),
(72, 'Meal joshua', 100.00, '2024-10-11', 'MARGIE CAMBONGGA', 2, '2024-10-11 22:41:24', '2024-10-11 22:41:24'),
(73, 'Gas- motor', 200.00, '2024-10-11', 'MARGIE CAMBONGGA', 2, '2024-10-11 22:41:54', '2024-10-11 22:41:54');

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
-- Table structure for table `freebies`
--

CREATE TABLE `freebies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trans_No` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `Amount` int(11) NOT NULL DEFAULT 0,
  `created_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_07_13_011244_create_products_table', 1),
(7, '2024_07_13_011545_create_suppliers_table', 1),
(8, '2024_07_13_011707_create_brands_table', 1),
(9, '2024_07_13_011927_create_orders_table', 1),
(10, '2024_07_13_042126_create_clinics_table', 1),
(11, '2024_08_30_075312_create_payments_table', 1),
(12, '2024_09_16_012348_create_freebies_table', 1),
(13, '2024_09_17_013102_create_expenses_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trans_no` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `deliveredto` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `delivered_date` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `po_no` int(11) NOT NULL,
  `terms` varchar(255) NOT NULL,
  `deliveredby` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `contact_num` varchar(255) NOT NULL,
  `or` int(11) NOT NULL,
  `cr` int(11) NOT NULL,
  `collected_by` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `created_id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `trans_no`, `product_id`, `deliveredto`, `address`, `delivered_date`, `quantity`, `total_amount`, `po_no`, `terms`, `deliveredby`, `fullname`, `contact_num`, `or`, `cr`, `collected_by`, `payment_status`, `created_by`, `updated_by`, `created_id`, `email`, `created_at`, `updated_at`) VALUES
(23, 1, 57, 'EMC ANIMAL CLINIC', 'iMUS CAVITE', '2024-09-30', 10, 5800, 1, '0', 'WILDREN', 'EGIE CERDENO', '09', 2, 4, 'WILDREN', 'Paid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-09-30 09:06:22', '2024-09-30 09:06:22'),
(24, 1, 58, 'EMC ANIMAL CLINIC', 'iMUS CAVITE', '2024-09-30', 3, 885, 1, '0', 'WILDREN', 'EGIE CERDENO', '09', 2, 4, 'WILDREN', 'Paid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-09-30 09:06:22', '2024-09-30 09:06:22'),
(27, 2, 77, 'Bubble Berry Veterinary Clinic', 'Makati City', '2024-09-30', 1, 2300, 0, '1', 'wildren', 'Bubble Berry Veterinary Clinic', '09', 387, 1, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-08 04:44:00', '2024-10-08 04:44:00'),
(28, 2, 123, 'Bubble Berry Veterinary Clinic', 'Makati City', '2024-09-30', 2, 1900, 0, '1', 'wildren', 'Bubble Berry Veterinary Clinic', '09', 387, 1, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-08 04:44:00', '2024-10-08 04:44:00'),
(29, 3, 56, 'Vetways', 'Dasmarinas Cavite', '2024-07-17', 50, 24750, 10, '2', 'wildren', 'Vetways', '09', 180, 2, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-08 05:17:22', '2024-10-08 05:17:22'),
(30, 3, 84, 'Vetways', 'Dasmarinas Cavite', '2024-07-17', 15, 5925, 10, '2', 'wildren', 'Vetways', '09', 180, 2, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-08 05:17:22', '2024-10-08 05:17:22'),
(31, 4, 124, 'Animal Zone Veterinary Clinic', 'Tagbilaran City Bohol', '2024-09-09', 15, 1245, 30, '3', 'wildren', 'Animal Zone Veterinary Clinic', '09', 322, 3, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-08 05:25:40', '2024-10-08 05:25:40'),
(32, 5, 125, 'VHS Animal Clinic', 'Quezon City', '2024-10-02', 10, 2500, 40, '4', 'wildren', 'VHS Animal Clinic', '09', 390, 5, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-08 05:32:16', '2024-10-08 05:32:16'),
(33, 6, 49, 'Pet Sanctuary Veterinary Clinic', 'Quezon City', '2024-09-16', 20, 900, 50, '5', 'wildren', 'Pet Sanctuary Veterinary Clinic', '09', 342, 6, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-08 05:47:11', '2024-10-08 05:47:11'),
(34, 6, 126, 'Pet Sanctuary Veterinary Clinic', 'Quezon City', '2024-09-16', 20, 2160, 50, '5', 'wildren', 'Pet Sanctuary Veterinary Clinic', '09', 342, 6, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-08 05:47:11', '2024-10-08 05:47:11'),
(35, 6, 50, 'Pet Sanctuary Veterinary Clinic', 'Quezon City', '2024-09-16', 12, 6000, 50, '5', 'wildren', 'Pet Sanctuary Veterinary Clinic', '09', 342, 6, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-08 05:47:11', '2024-10-08 05:47:11'),
(36, 7, 128, 'Vetlife Veterinary Clinic', 'Pasay City', '2024-09-14', 2, 1300, 60, '6', 'wildren', 'Vetlife Veterinary Clinic', '09', 339, 7, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-08 06:01:03', '2024-10-08 06:01:03'),
(37, 7, 127, 'Vetlife Veterinary Clinic', 'Pasay City', '2024-09-14', 2, 2700, 60, '6', 'wildren', 'Vetlife Veterinary Clinic', '09', 339, 7, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-08 06:01:03', '2024-10-08 06:01:03'),
(38, 8, 130, 'Garcia veterinary Clinic', 'Pabilao Quezon', '2024-09-12', 1, 3250, 70, '7', 'wildren', 'Garcia veterinary Clinic', '09', 328, 8, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-08 06:09:50', '2024-10-08 06:09:50'),
(39, 8, 129, 'Garcia veterinary Clinic', 'Pabilao Quezon', '2024-09-12', 1, 180, 70, '7', 'wildren', 'Garcia veterinary Clinic', '09', 328, 8, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-08 06:09:50', '2024-10-08 06:09:50'),
(40, 9, 107, 'Vetfriend Veterinary Clinic', 'General Trias Cavite', '2024-09-11', 23, 4140, 80, '9', 'wildren', 'Vetfriend Veterinary Clinic', '09', 326, 9, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-08 06:14:51', '2024-10-08 06:14:51'),
(41, 10, 131, 'Primitiva Veterinary Clinic', 'St. Paco Manila', '2024-09-06', 20, 7000, 100, '10', 'wildren', 'Primitira Veterinary Clinic', '09', 314, 11, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-08 06:18:57', '2024-10-08 06:18:57'),
(42, 11, 102, 'Primitira Veterinary Clinic', 'St. Paco Manila', '2024-09-06', 3, 5700, 101, '11', 'wildren', 'Primitira Veterinary Clinic', '09', 313, 12, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-08 06:21:40', '2024-10-08 06:21:40'),
(43, 12, 132, 'Dasmarinnas Animal Clinic', 'Dasmarinas Cavite', '2024-09-05', 100, 13000, 102, '12', 'wildren', 'Dasmarinnas Animal Clinic', '09', 309, 13, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-08 06:34:29', '2024-10-08 06:34:29'),
(44, 12, 52, 'Dasmarinnas Animal Clinic', 'Dasmarinas Cavite', '2024-09-05', 50, 4250, 102, '12', 'wildren', 'Dasmarinnas Animal Clinic', '09', 309, 13, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-08 06:34:29', '2024-10-08 06:34:29'),
(45, 12, 133, 'Dasmarinnas Animal Clinic', 'Dasmarinas Cavite', '2024-09-05', 1, 895, 102, '12', 'wildren', 'Dasmarinnas Animal Clinic', '09', 309, 13, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-08 06:34:29', '2024-10-08 06:34:29'),
(46, 12, 134, 'Dasmarinnas Animal Clinic', 'Dasmarinas Cavite', '2024-09-05', 1, 950, 102, '12', 'wildren', 'Dasmarinnas Animal Clinic', '09', 309, 13, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-08 06:34:29', '2024-10-08 06:34:29'),
(47, 13, 116, 'GPY Veterinary Clini', 'Cebu City', '2024-09-01', 12, 11400, 130, '13', 'wildren', 'GPY Veterinary Clini', '09', 282, 14, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-08 06:38:26', '2024-10-08 06:38:26'),
(48, 14, 85, 'Animal Shelter Veterinary Clinic', 'Makati City', '2024-08-12', 14, 5530, 140, '14', 'wildren', 'Animal Shelter Veterinary Clinic', '009', 247, 15, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-08 06:43:47', '2024-10-08 06:43:47'),
(49, 15, 71, 'Seaside Veterinary Clinic', 'Tagbilaran City Bohol', '2024-08-01', 5, 6750, 150, '15', 'wildren', 'Seaside Veterinary Clinic', '09', 200, 16, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-08 06:45:46', '2024-10-08 06:45:46'),
(50, 16, 135, 'Animal Zone Veterinary Clinic', 'Bohol City', '2024-09-16', 20, 1300, 160, '16', 'wildren', 'Animal Zone Veterinary Clinic', '09', 265, 17, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-08 06:52:28', '2024-10-08 06:52:28'),
(51, 17, 137, 'Asisi Veterinary Clinic', 'iMUS CAVITE', '2024-08-02', 6, 750, 170, '17', 'wildren', 'Asisi Veterinary Clinic', '09', 207, 18, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-08 06:58:50', '2024-10-08 06:58:50'),
(52, 17, 138, 'Asisi Veterinary Clinic', 'iMUS CAVITE', '2024-08-02', 6, 630, 170, '17', 'wildren', 'Asisi Veterinary Clinic', '09', 207, 18, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-08 06:58:50', '2024-10-08 06:58:50'),
(53, 18, 139, 'Healthy Pets veterinary Clinic', 'Makati City', '2024-07-05', 3, 840, 180, '18', 'wildren', 'Healthy Pets veterinary Clinic', '09', 159, 19, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-08 07:05:42', '2024-10-08 07:05:42'),
(54, 19, 140, 'Shamba Animal Clinic', 'Mandaue Cebu City', '2024-07-02', 2, 11000, 190, '19', 'wildren', 'Shamba Animal Clinic', '09', 144, 20, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-08 07:09:23', '2024-10-08 07:09:23'),
(55, 20, 141, 'Fourpaws Animal Clinic', 'Tanguig', '2024-06-19', 1, 1180, 200, '20', 'wildren', 'Fourpaws Animal Clinic', '09', 252, 21, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-08 07:12:37', '2024-10-08 07:12:37'),
(56, 21, 142, 'Bon Docteur Animal Clinic', 'Paco manila', '2024-08-05', 5, 7500, 210, '21', 'wildren', 'Bon Docteur Animal Clinic', '09', 215, 22, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-08 07:17:49', '2024-10-08 07:17:49'),
(57, 22, 143, 'Animal Zone Veterinary Clinic', 'Tagbilaran City Bohol', '2024-08-14', 4, 9200, 220, '22', 'wildren', 'Animal Zone Veterinary Clinic', '09', 255, 23, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-08 07:43:49', '2024-10-08 07:43:49'),
(58, 22, 144, 'Animal Zone Veterinary Clinic', 'Tagbilaran City Bohol', '2024-08-14', 1, 1800, 220, '22', 'wildren', 'Animal Zone Veterinary Clinic', '09', 255, 23, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-08 07:43:49', '2024-10-08 07:43:49'),
(59, 23, 146, 'Pet Access', 'Sta.Mesa', '2024-08-19', 2, 2200, 240, '24', 'wildren', 'Pet Access', '09', 269, 25, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 00:38:02', '2024-10-09 00:38:02'),
(60, 24, 107, 'Pet Sanctuary Veterinary Clinic', 'Quezon City', '2024-09-22', 12, 2160, 250, '25', 'wildren', 'Pet Sanctuary Veterinary Clinic', '09', 362, 26, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 00:41:25', '2024-10-09 00:41:25'),
(61, 24, 118, 'Pet Sanctuary Veterinary Clinic', 'Quezon City', '2024-09-22', 1, 5300, 250, '25', 'wildren', 'Pet Sanctuary Veterinary Clinic', '09', 362, 26, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 00:41:25', '2024-10-09 00:41:25'),
(62, 25, 147, 'Nhets Aniimal Clinic', 'Valenzuela City', '2024-08-19', 15, 5925, 260, '26', 'wildren', 'Nhets Animal Clinic', '09', 267, 27, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 00:48:41', '2024-10-09 00:48:41'),
(63, 25, 84, 'Nhets Aniimal Clinic', 'Valenzuela City', '2024-08-19', 15, 5925, 260, '26', 'wildren', 'Nhets Animal Clinic', '09', 267, 27, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 00:48:41', '2024-10-09 00:48:41'),
(64, 25, 55, 'Nhets Aniimal Clinic', 'Valenzuela City', '2024-08-19', 15, 5925, 260, '26', 'wildren', 'Nhets Animal Clinic', '09', 267, 27, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 00:48:41', '2024-10-09 00:48:41'),
(65, 26, 71, 'Imperial Veterinary Clinic', 'Tanza Cavite', '2024-09-25', 5, 6750, 270, '27', 'wildren', 'Imperial Veterinary Clinic', '09', 375, 28, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 00:50:54', '2024-10-09 00:50:54'),
(66, 27, 56, 'Animal Shelter Veterinary Clinic', 'Makati City', '2024-08-01', 14, 6930, 280, '28', 'wildren', 'Animal Shelter Veterinary Clinic', '09', 175, 29, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 00:53:18', '2024-10-09 00:53:18'),
(67, 28, 47, 'Navotas Veterinary Clinic', 'Navotas City', '2024-09-01', 10, 3000, 290, '29', 'wildren', 'Navotas Veterinary Clinic', '09', 205, 30, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 00:55:51', '2024-10-09 00:55:51'),
(68, 29, 108, 'Jamir Veterinary Clinic', 'Kawit Cavite', '2024-09-19', 5, 11000, 300, '30', 'wildren', 'Jamir Veterinary Clinic', '009', 351, 31, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 00:58:49', '2024-10-09 00:58:49'),
(69, 30, 56, 'Whiskers and Tails Animal Clinic', 'Tondo Manila', '2024-07-30', 14, 6930, 310, '31', 'wildren', 'Whiskers and Tails Animal Clinic', '09', 197, 32, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 01:01:33', '2024-10-09 01:01:33'),
(73, 31, 56, 'Healthy Pets veterinary Clinic', 'iMUS CAVITE', '2024-07-30', 12, 5940, 320, '32', 'wildren', 'Healthy Pets veterinary Clinic', '09', 192, 33, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 01:13:57', '2024-10-09 01:13:57'),
(74, 31, 148, 'Healthy Pets veterinary Clinic', 'iMUS CAVITE', '2024-07-30', 2, 1740, 320, '32', 'wildren', 'Healthy Pets veterinary Clinic', '09', 192, 33, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 01:13:57', '2024-10-09 01:13:57'),
(75, 31, 149, 'Healthy Pets veterinary Clinic', 'iMUS CAVITE', '2024-07-30', 15, 2550, 320, '32', 'wildren', 'Healthy Pets veterinary Clinic', '09', 192, 33, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 01:13:57', '2024-10-09 01:13:57'),
(76, 32, 150, 'Doc John\'s Vet Clinic', 'Lahug cebu', '2024-06-22', 2, 700, 330, '33', 'wildren', 'Doc John\'s Vet Clinic', '09', 123, 34, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 02:22:58', '2024-10-09 02:22:58'),
(77, 32, 151, 'Doc John\'s Vet Clinic', 'Lahug cebu', '2024-06-22', 2, 700, 330, '33', 'wildren', 'Doc John\'s Vet Clinic', '09', 123, 34, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 02:22:58', '2024-10-09 02:22:58'),
(78, 32, 152, 'Doc John\'s Vet Clinic', 'Lahug cebu', '2024-06-22', 2, 700, 330, '33', 'wildren', 'Doc John\'s Vet Clinic', '09', 123, 34, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 02:22:58', '2024-10-09 02:22:58'),
(79, 32, 153, 'Doc John\'s Vet Clinic', 'Lahug cebu', '2024-06-22', 3, 1050, 330, '33', 'wildren', 'Doc John\'s Vet Clinic', '09', 123, 34, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 02:22:58', '2024-10-09 02:22:58'),
(80, 32, 156, 'Doc John\'s Vet Clinic', 'Lahug cebu', '2024-06-22', 3, 1050, 330, '33', 'wildren', 'Doc John\'s Vet Clinic', '09', 123, 34, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 02:22:58', '2024-10-09 02:22:58'),
(81, 32, 154, 'Doc John\'s Vet Clinic', 'Lahug cebu', '2024-06-22', 3, 1050, 330, '33', 'wildren', 'Doc John\'s Vet Clinic', '09', 123, 34, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 02:22:58', '2024-10-09 02:22:58'),
(82, 32, 155, 'Doc John\'s Vet Clinic', 'Lahug cebu', '2024-06-22', 3, 1050, 330, '33', 'wildren', 'Doc John\'s Vet Clinic', '09', 123, 34, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 02:22:58', '2024-10-09 02:22:58'),
(83, 32, 157, 'Doc John\'s Vet Clinic', 'Lahug cebu', '2024-06-22', 3, 1050, 330, '33', 'wildren', 'Doc John\'s Vet Clinic', '09', 123, 34, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 02:22:58', '2024-10-09 02:22:58'),
(84, 32, 136, 'Doc John\'s Vet Clinic', 'Lahug cebu', '2024-06-22', 10, 1450, 330, '33', 'wildren', 'Doc John\'s Vet Clinic', '09', 123, 34, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 02:22:58', '2024-10-09 02:22:58'),
(85, 32, 161, 'Doc John\'s Vet Clinic', 'Lahug cebu', '2024-06-22', 10, 1250, 330, '33', 'wildren', 'Doc John\'s Vet Clinic', '09', 123, 34, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 02:22:58', '2024-10-09 02:22:58'),
(86, 32, 160, 'Doc John\'s Vet Clinic', 'Lahug cebu', '2024-06-22', 10, 1150, 330, '33', 'wildren', 'Doc John\'s Vet Clinic', '09', 123, 34, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 02:22:58', '2024-10-09 02:22:58'),
(87, 32, 138, 'Doc John\'s Vet Clinic', 'Lahug cebu', '2024-06-22', 10, 1050, 330, '33', 'wildren', 'Doc John\'s Vet Clinic', '09', 123, 34, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 02:22:58', '2024-10-09 02:22:58'),
(88, 32, 159, 'Doc John\'s Vet Clinic', 'Lahug cebu', '2024-06-22', 10, 950, 330, '33', 'wildren', 'Doc John\'s Vet Clinic', '09', 123, 34, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 02:22:58', '2024-10-09 02:22:58'),
(89, 32, 158, 'Doc John\'s Vet Clinic', 'Lahug cebu', '2024-06-22', 10, 850, 330, '33', 'wildren', 'Doc John\'s Vet Clinic', '09', 123, 34, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 02:22:58', '2024-10-09 02:22:58'),
(90, 33, 162, 'Pet Sanctuary Veterinary Clinic', 'Malate Manila', '2024-09-06', 14, 6860, 340, '34', 'wildren', 'Pet Sanctuary Veterinary Clinic', '09', 312, 35, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 02:26:18', '2024-10-09 02:26:18'),
(91, 34, 12, 'Ma.Zion Animal Clinic', 'iMUS CAVITE', '2024-07-18', 1, 2100, 350, '35', 'wildren', 'Ma.Zion Animal Clinic', '09', 183, 36, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 02:36:41', '2024-10-09 02:36:41'),
(92, 34, 163, 'Ma.Zion Animal Clinic', 'iMUS CAVITE', '2024-07-18', 1, 2300, 350, '35', 'wildren', 'Ma.Zion Animal Clinic', '09', 183, 36, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 02:36:41', '2024-10-09 02:36:41'),
(93, 34, 94, 'Ma.Zion Animal Clinic', 'iMUS CAVITE', '2024-07-18', 1, 2500, 350, '35', 'wildren', 'Ma.Zion Animal Clinic', '09', 183, 36, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 02:36:41', '2024-10-09 02:36:41'),
(94, 35, 164, 'Metrotails Veterinary clinic', 'Taguig CIty', '2024-07-28', 20, 7600, 360, '36', 'wildren', 'Metrotails Veterinary Clinic', '09', 190, 37, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 02:42:42', '2024-10-09 02:42:42'),
(95, 35, 165, 'Metrotails Veterinary clinic', 'Taguig CIty', '2024-07-28', 20, 1300, 360, '36', 'wildren', 'Metrotails Veterinary Clinic', '09', 190, 37, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 02:42:42', '2024-10-09 02:42:42'),
(96, 36, 80, 'Dasmarinnas Animal Clinic', 'Dasmarinas Cavite', '2024-09-07', 1, 895, 370, '37', 'wildren', 'Dasmarinnas Animal Clinic', '09', 284, 38, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 02:48:24', '2024-10-09 02:48:24'),
(97, 36, 52, 'Dasmarinnas Animal Clinic', 'Dasmarinas Cavite', '2024-09-07', 10, 850, 370, '37', 'wildren', 'Dasmarinnas Animal Clinic', '09', 284, 38, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 02:48:24', '2024-10-09 02:48:24'),
(98, 37, 167, 'Irenia Dinoy', 'Cebu City', '2024-08-16', 1, 141, 380, '38', 'wildren', 'Irenia Dinoy', '09', 264, 39, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 02:57:32', '2024-10-09 02:57:32'),
(99, 37, 166, 'Irenia Dinoy', 'Cebu City', '2024-08-16', 1, 225, 380, '38', 'wildren', 'Irenia Dinoy', '09', 264, 39, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 02:57:32', '2024-10-09 02:57:32'),
(100, 37, 168, 'Irenia Dinoy', 'Cebu City', '2024-08-16', 1, 135, 380, '38', 'wildren', 'Irenia Dinoy', '09', 264, 39, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 02:57:32', '2024-10-09 02:57:32'),
(101, 38, 112, 'EMC ANIMAL CLINIC', 'iMUS CAVITE', '2024-09-22', 3, 840, 390, '39', 'wildren', 'EMC Animal Clinic', '09', 359, 40, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 03:02:58', '2024-10-09 03:02:58'),
(102, 38, 169, 'EMC ANIMAL CLINIC', 'iMUS CAVITE', '2024-09-22', 1, 2600, 390, '39', 'wildren', 'EMC Animal Clinic', '09', 359, 40, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 03:02:58', '2024-10-09 03:02:58'),
(103, 39, 71, 'ORMANES VETERINARY CLINIC', 'Las Pinas', '2024-09-27', 2, 2700, 400, '40', 'wildren', 'Ormanes Veterinary Clinic', '09', 381, 41, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 03:10:51', '2024-10-09 03:10:51'),
(104, 39, 170, 'ORMANES VETERINARY CLINIC', 'Las Pinas', '2024-09-27', 1, 380, 400, '40', 'wildren', 'Ormanes Veterinary Clinic', '09', 381, 41, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 03:10:51', '2024-10-09 03:10:51'),
(105, 39, 171, 'ORMANES VETERINARY CLINIC', 'Las Pinas', '2024-09-27', 14, 12530, 400, '40', 'wildren', 'Ormanes Veterinary Clinic', '09', 381, 41, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 03:10:51', '2024-10-09 03:10:51'),
(106, 40, 172, 'Creatures and Critters', 'Paranaque', '2024-08-20', 3, 450, 410, '41', 'wildren', 'Creatures and Critters', '09', 273, 42, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 03:24:58', '2024-10-09 03:24:58'),
(107, 40, 174, 'Creatures and Critters', 'Paranaque', '2024-08-20', 2, 560, 410, '41', 'wildren', 'Creatures and Critters', '09', 273, 42, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 03:24:58', '2024-10-09 03:24:58'),
(108, 40, 107, 'Creatures and Critters', 'Paranaque', '2024-08-20', 3, 540, 410, '41', 'wildren', 'Creatures and Critters', '09', 273, 42, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 03:24:58', '2024-10-09 03:24:58'),
(109, 40, 149, 'Creatures and Critters', 'Paranaque', '2024-08-20', 5, 850, 410, '41', 'wildren', 'Creatures and Critters', '09', 273, 42, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 03:24:58', '2024-10-09 03:24:58'),
(110, 40, 173, 'Creatures and Critters', 'Paranaque', '2024-08-20', 1, 950, 410, '41', 'wildren', 'Creatures and Critters', '09', 273, 42, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 03:24:58', '2024-10-09 03:24:58'),
(111, 41, 143, 'Animal Zone Veterinary Clinic', 'iMUS CAVITE', '2024-09-18', 2, 4600, 420, '42', 'wildren', 'Animal Zone Veterinary Clinic', '09', 345, 43, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 03:30:29', '2024-10-09 03:30:29'),
(112, 42, 175, 'Healthy Pets veterinary Clinic', 'iMUS CAVITE', '2024-09-22', 1, 295, 430, '43', 'wildren', 'Healthy Pets veterinary Clinic', '09', 360, 44, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 04:07:40', '2024-10-09 04:07:40'),
(113, 43, 176, 'Vetterhealth Aniimal Clinic', 'Dasmarinas Cavite', '2024-09-03', 48, 4560, 440, '44', 'wildren', 'Vetterhealth Animal Clinic', '09', 297, 45, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 04:11:47', '2024-10-09 04:11:47'),
(114, 44, 86, 'Primitira Veterinary Clinic', 'St. Paco Manila', '2024-08-05', 5, 1750, 450, '45', 'wildren', 'Primitira Veterinary Clinic', '09', 216, 46, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 05:00:21', '2024-10-09 05:00:21'),
(115, 45, 177, 'Imperial Veterinary Clinic', 'Tanza Cavite', '2024-08-14', 2, 5000, 460, '46', 'wildren', 'Imperial Veterinary Clinic', '09', 254, 47, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 06:05:15', '2024-10-09 06:05:15'),
(116, 45, 178, 'Imperial Veterinary Clinic', 'Tanza Cavite', '2024-08-14', 1, 4595, 460, '46', 'wildren', 'Imperial Veterinary Clinic', '09', 254, 47, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 06:05:15', '2024-10-09 06:05:15'),
(117, 45, 179, 'Imperial Veterinary Clinic', 'Tanza Cavite', '2024-08-14', 1, 2500, 460, '46', 'wildren', 'Imperial Veterinary Clinic', '09', 254, 47, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 06:05:15', '2024-10-09 06:05:15'),
(118, 46, 82, 'Padilla Veterinary Clinic', 'Tanza Cavite', '2024-09-30', 23, 8050, 470, '47', 'wildren', 'Padillaa Veterinary Clinic', '09', 208, 48, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 06:10:46', '2024-10-09 06:10:46'),
(119, 47, 62, 'Goldwings Veterinary Clinic', 'Tondo Manila', '2024-08-14', 1, 395, 480, '48', 'wildren', 'Goldwings Veterinary Clinic', '09', 253, 49, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 07:15:16', '2024-10-09 07:15:16'),
(120, 47, 182, 'Goldwings Veterinary Clinic', 'Tondo Manila', '2024-08-14', 1, 5800, 480, '48', 'wildren', 'Goldwings Veterinary Clinic', '09', 253, 49, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 07:15:16', '2024-10-09 07:15:16'),
(121, 47, 92, 'Goldwings Veterinary Clinic', 'Tondo Manila', '2024-08-14', 1, 395, 480, '48', 'wildren', 'Goldwings Veterinary Clinic', '09', 253, 49, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 07:15:16', '2024-10-09 07:15:16'),
(122, 47, 72, 'Goldwings Veterinary Clinic', 'Tondo Manila', '2024-08-14', 5, 1900, 480, '48', 'wildren', 'Goldwings Veterinary Clinic', '09', 253, 49, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 07:15:16', '2024-10-09 07:15:16'),
(123, 47, 160, 'Goldwings Veterinary Clinic', 'Tondo Manila', '2024-08-14', 5, 575, 480, '48', 'wildren', 'Goldwings Veterinary Clinic', '09', 253, 49, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 07:15:16', '2024-10-09 07:15:16'),
(124, 47, 138, 'Goldwings Veterinary Clinic', 'Tondo Manila', '2024-08-14', 5, 525, 480, '48', 'wildren', 'Goldwings Veterinary Clinic', '09', 253, 49, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 07:15:16', '2024-10-09 07:15:16'),
(125, 47, 161, 'Goldwings Veterinary Clinic', 'Tondo Manila', '2024-08-14', 5, 625, 480, '48', 'wildren', 'Goldwings Veterinary Clinic', '09', 253, 49, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 07:15:16', '2024-10-09 07:15:16'),
(126, 47, 87, 'Goldwings Veterinary Clinic', 'Tondo Manila', '2024-08-14', 5, 2475, 480, '48', 'wildren', 'Goldwings Veterinary Clinic', '09', 253, 49, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 07:15:16', '2024-10-09 07:15:16'),
(127, 48, 183, 'EV Dog and Cat Clinic', 'Las Pinas', '2024-09-26', 3, 1650, 490, '49', 'wildren', 'EV Dog and Cat Clinic', '09', 377, 50, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 07:35:15', '2024-10-09 07:35:15'),
(128, 48, 181, 'EV Dog and Cat Clinic', 'Las Pinas', '2024-09-26', 3, 540, 490, '49', 'wildren', 'EV Dog and Cat Clinic', '09', 377, 50, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 07:35:15', '2024-10-09 07:35:15'),
(129, 48, 71, 'EV Dog and Cat Clinic', 'Las Pinas', '2024-09-26', 2, 2700, 490, '49', 'wildren', 'EV Dog and Cat Clinic', '09', 377, 50, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 07:35:15', '2024-10-09 07:35:15'),
(130, 48, 180, 'EV Dog and Cat Clinic', 'Las Pinas', '2024-09-26', 1, 1790, 490, '49', 'wildren', 'EV Dog and Cat Clinic', '09', 377, 50, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 07:35:15', '2024-10-09 07:35:15'),
(131, 49, 184, 'DR. M & M VETERINARY CLINIC', 'Lapu-Laput City', '2024-08-05', 2, 5000, 500, '50', 'wildren', 'DR. M & M VETERINARY CLINIC', '09', 176, 51, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 07:39:38', '2024-10-09 07:39:38'),
(132, 50, 185, 'EMC ANIMAL CLINIC', 'iMUS CAVITE', '2026-05-26', 5, 4975, 510, '51', 'wildren', 'EMC Animal Clinic', '09', 209, 52, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 07:43:02', '2024-10-09 07:43:02'),
(133, 51, 138, 'DR. M & M VETERINARY CLINIC', 'DR. M & M VETERINARY CLINIC', '2024-06-29', 12, 1260, 520, '52', 'wildren', 'DR. M & M VETERINARY CLINIC', '09', 152, 53, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 07:52:34', '2024-10-09 07:52:34'),
(134, 51, 159, 'DR. M & M VETERINARY CLINIC', 'DR. M & M VETERINARY CLINIC', '2024-06-29', 12, 1140, 520, '52', 'wildren', 'DR. M & M VETERINARY CLINIC', '09', 152, 53, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 07:52:34', '2024-10-09 07:52:34'),
(135, 51, 158, 'DR. M & M VETERINARY CLINIC', 'DR. M & M VETERINARY CLINIC', '2024-06-29', 12, 1020, 520, '52', 'wildren', 'DR. M & M VETERINARY CLINIC', '09', 152, 53, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 07:52:34', '2024-10-09 07:52:34'),
(136, 51, 186, 'DR. M & M VETERINARY CLINIC', 'DR. M & M VETERINARY CLINIC', '2024-06-29', 12, 900, 520, '52', 'wildren', 'DR. M & M VETERINARY CLINIC', '09', 152, 53, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 07:52:34', '2024-10-09 07:52:34'),
(137, 51, 187, 'DR. M & M VETERINARY CLINIC', 'DR. M & M VETERINARY CLINIC', '2024-06-29', 12, 780, 520, '52', 'wildren', 'DR. M & M VETERINARY CLINIC', '09', 152, 53, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 07:52:34', '2024-10-09 07:52:34'),
(138, 51, 140, 'DR. M & M VETERINARY CLINIC', 'DR. M & M VETERINARY CLINIC', '2024-06-29', 1, 5500, 520, '52', 'wildren', 'DR. M & M VETERINARY CLINIC', '09', 152, 53, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 07:52:34', '2024-10-09 07:52:34'),
(139, 51, 188, 'DR. M & M VETERINARY CLINIC', 'DR. M & M VETERINARY CLINIC', '2024-06-29', 1, 2300, 520, '52', 'wildren', 'DR. M & M VETERINARY CLINIC', '09', 152, 53, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 07:52:34', '2024-10-09 07:52:34'),
(140, 52, 194, 'Animal Zone Veterinary Clinic', 'Tagbilaran City Bohol', '2024-02-02', 5, 6500, 530, '53', 'wildren', 'Animal Zone Veterinary Clinic', '09', 290, 54, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 08:54:57', '2024-10-09 08:54:57'),
(141, 52, 55, 'Animal Zone Veterinary Clinic', 'Tagbilaran City Bohol', '2024-02-02', 5, 1975, 530, '53', 'wildren', 'Animal Zone Veterinary Clinic', '09', 290, 54, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 08:54:57', '2024-10-09 08:54:57'),
(142, 52, 85, 'Animal Zone Veterinary Clinic', 'Tagbilaran City Bohol', '2024-02-02', 5, 1975, 530, '53', 'wildren', 'Animal Zone Veterinary Clinic', '09', 290, 54, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 08:54:57', '2024-10-09 08:54:57'),
(143, 52, 189, 'Animal Zone Veterinary Clinic', 'Tagbilaran City Bohol', '2024-02-02', 1, 850, 530, '53', 'wildren', 'Animal Zone Veterinary Clinic', '09', 290, 54, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 08:54:57', '2024-10-09 08:54:57'),
(144, 52, 38, 'Animal Zone Veterinary Clinic', 'Tagbilaran City Bohol', '2024-02-02', 1, 1950, 530, '53', 'wildren', 'Animal Zone Veterinary Clinic', '09', 290, 54, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 08:54:57', '2024-10-09 08:54:57'),
(145, 52, 190, 'Animal Zone Veterinary Clinic', 'Tagbilaran City Bohol', '2024-02-02', 1, 250, 530, '53', 'wildren', 'Animal Zone Veterinary Clinic', '09', 290, 54, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 08:54:57', '2024-10-09 08:54:57'),
(146, 52, 191, 'Animal Zone Veterinary Clinic', 'Tagbilaran City Bohol', '2024-02-02', 1, 110, 530, '53', 'wildren', 'Animal Zone Veterinary Clinic', '09', 290, 54, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 08:54:57', '2024-10-09 08:54:57'),
(147, 52, 192, 'Animal Zone Veterinary Clinic', 'Tagbilaran City Bohol', '2024-02-02', 20, 1660, 530, '53', 'wildren', 'Animal Zone Veterinary Clinic', '09', 290, 54, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 08:54:57', '2024-10-09 08:54:57'),
(148, 52, 193, 'Animal Zone Veterinary Clinic', 'Tagbilaran City Bohol', '2024-02-02', 1, 950, 530, '53', 'wildren', 'Animal Zone Veterinary Clinic', '09', 290, 54, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 08:54:57', '2024-10-09 08:54:57'),
(149, 52, 40, 'Animal Zone Veterinary Clinic', 'Tagbilaran City Bohol', '2024-02-02', 1, 895, 530, '53', 'wildren', 'Animal Zone Veterinary Clinic', '09', 290, 54, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 08:54:57', '2024-10-09 08:54:57'),
(150, 53, 84, 'Vetterhealth Aniimal Clinic', 'Dasmarinas Cavite', '2024-07-05', 24, 9480, 540, '54', 'wildren', 'Vetterhealth Animal Clinic', '09', 160, 55, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 09:06:24', '2024-10-09 09:06:24'),
(151, 53, 195, 'Vetterhealth Aniimal Clinic', 'Dasmarinas Cavite', '2024-07-05', 1, 1800, 540, '54', 'wildren', 'Vetterhealth Animal Clinic', '09', 160, 55, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 09:06:24', '2024-10-09 09:06:24'),
(152, 53, 86, 'Vetterhealth Aniimal Clinic', 'Dasmarinas Cavite', '2024-07-05', 5, 1750, 540, '54', 'wildren', 'Vetterhealth Animal Clinic', '09', 160, 55, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 09:06:24', '2024-10-09 09:06:24'),
(153, 54, 196, 'Mago Pet Care', 'Bacoor Cavite', '2024-08-13', 1, 2500, 550, '55', 'wildren', 'Mago Pet Care', '09', 251, 56, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 09:19:29', '2024-10-09 09:19:29'),
(154, 54, 197, 'Mago Pet Care', 'Bacoor Cavite', '2024-08-13', 1, 3500, 550, '55', 'wildren', 'Mago Pet Care', '09', 251, 56, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 09:19:29', '2024-10-09 09:19:29'),
(155, 54, 198, 'Mago Pet Care', 'Bacoor Cavite', '2024-08-13', 1, 3800, 550, '55', 'wildren', 'Mago Pet Care', '09', 251, 56, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 09:19:29', '2024-10-09 09:19:29'),
(156, 54, 199, 'Mago Pet Care', 'Bacoor Cavite', '2024-08-13', 1, 4900, 550, '55', 'wildren', 'Mago Pet Care', '09', 251, 56, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 09:19:29', '2024-10-09 09:19:29'),
(157, 54, 200, 'Mago Pet Care', 'Bacoor Cavite', '2024-08-13', 1, 4595, 550, '55', 'wildren', 'Mago Pet Care', '09', 251, 56, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 09:19:29', '2024-10-09 09:19:29'),
(158, 55, 201, 'Fourpaws Animal Clinic', 'Tanguig', '2024-09-12', 1, 4600, 570, '57', 'wildren', 'Fourpaws Animal Clinic', '09', 330, 58, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 09:39:12', '2024-10-09 09:39:12'),
(159, 55, 202, 'Fourpaws Animal Clinic', 'Tanguig', '2024-09-12', 1, 1850, 570, '57', 'wildren', 'Fourpaws Animal Clinic', '09', 330, 58, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 09:39:12', '2024-10-09 09:39:12'),
(160, 56, 203, 'Friendstar Veterinary Services', 'Paranaque', '2024-09-13', 24, 3120, 580, '58', 'wildren', 'Friendstar Veterinary Services', '09', 335, 59, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 09:44:06', '2024-10-09 09:44:06'),
(161, 57, 204, 'Metropaws Pet Clinic', 'Pasay City', '2024-09-02', 1, 2400, 590, '59', 'wildren', 'Metropaws Pet Clinic', '09', 287, 60, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 09:49:33', '2024-10-09 09:49:33'),
(162, 58, 206, 'EMC ANIMAL CLINIC', 'iMUS CAVITE', '2024-09-21', 100, 14000, 600, '60', 'wildren', 'EMC Animal Clinic', '09', 357, 61, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 10:00:48', '2024-10-09 10:00:48'),
(163, 58, 205, 'EMC ANIMAL CLINIC', 'iMUS CAVITE', '2024-09-21', 1, 380, 600, '60', 'wildren', 'EMC Animal Clinic', '09', 357, 61, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 10:00:48', '2024-10-09 10:00:48'),
(164, 58, 51, 'EMC ANIMAL CLINIC', 'iMUS CAVITE', '2024-09-21', 1, 380, 600, '60', 'wildren', 'EMC Animal Clinic', '09', 357, 61, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-09 10:00:48', '2024-10-09 10:00:48'),
(165, 59, 207, 'Critters Pet Clinic', 'Salawag Dasmarinas Cavite', '2024-08-10', 5, 275, 610, '61', 'wildren', 'Critters Pet Clinic', '09', 235, 62, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-10 02:04:53', '2024-10-10 02:04:53'),
(166, 59, 208, 'Critters Pet Clinic', 'Salawag Dasmarinas Cavite', '2024-08-10', 5, 325, 610, '61', 'wildren', 'Critters Pet Clinic', '09', 235, 62, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-10 02:04:53', '2024-10-10 02:04:53'),
(167, 59, 209, 'Critters Pet Clinic', 'Salawag Dasmarinas Cavite', '2024-08-10', 5, 425, 610, '61', 'wildren', 'Critters Pet Clinic', '09', 235, 62, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-10 02:04:53', '2024-10-10 02:04:53'),
(168, 59, 210, 'Critters Pet Clinic', 'Salawag Dasmarinas Cavite', '2024-08-10', 5, 475, 610, '61', 'wildren', 'Critters Pet Clinic', '09', 235, 62, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-10 02:04:53', '2024-10-10 02:04:53'),
(169, 59, 160, 'Critters Pet Clinic', 'Salawag Dasmarinas Cavite', '2024-08-10', 5, 575, 610, '61', 'wildren', 'Critters Pet Clinic', '09', 235, 62, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-10 02:04:53', '2024-10-10 02:04:53'),
(170, 59, 138, 'Critters Pet Clinic', 'Salawag Dasmarinas Cavite', '2024-08-10', 5, 525, 610, '61', 'wildren', 'Critters Pet Clinic', '09', 235, 62, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-10 02:04:53', '2024-10-10 02:04:53'),
(171, 59, 159, 'Critters Pet Clinic', 'Salawag Dasmarinas Cavite', '2024-08-10', 5, 475, 610, '61', 'wildren', 'Critters Pet Clinic', '09', 235, 62, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-10 02:04:53', '2024-10-10 02:04:53'),
(172, 59, 71, 'Critters Pet Clinic', 'Salawag Dasmarinas Cavite', '2024-08-10', 5, 6750, 610, '61', 'wildren', 'Critters Pet Clinic', '09', 235, 62, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-10 02:04:53', '2024-10-10 02:04:53'),
(173, 59, 121, 'Critters Pet Clinic', 'Salawag Dasmarinas Cavite', '2024-08-10', 24, 3600, 610, '61', 'wildren', 'Critters Pet Clinic', '09', 235, 62, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-10 02:04:53', '2024-10-10 02:04:53'),
(174, 60, 211, 'Healthy Pets veterinary Clinic', 'iMUS CAVITE', '2024-08-19', 6, 1770, 620, '62', 'wildren', 'Healthy Pets veterinary Clinic', '09', 270, 63, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-10 02:12:55', '2024-10-10 02:12:55'),
(175, 60, 58, 'Healthy Pets veterinary Clinic', 'iMUS CAVITE', '2024-08-19', 2, 590, 620, '62', 'wildren', 'Healthy Pets veterinary Clinic', '09', 270, 63, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-10 02:12:55', '2024-10-10 02:12:55'),
(176, 61, 75, 'Petcurry Pet Clinic', 'Carmona Cavite', '2026-07-20', 4, 1520, 630, '63', 'wildren', 'Petcurry Pet Clinic', '09', 250, 64, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-10 02:18:47', '2024-10-10 02:18:47'),
(177, 62, 212, 'EMC ANIMAL CLINIC', 'iMUS CAVITE', '2024-09-30', 10, 5800, 640, '64', 'wildren', 'EMC Animal Clinic', '09', 348, 65, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-10 02:22:54', '2024-10-10 02:22:54'),
(178, 62, 58, 'EMC ANIMAL CLINIC', 'iMUS CAVITE', '2024-09-30', 3, 885, 640, '64', 'wildren', 'EMC Animal Clinic', '09', 348, 65, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-10 02:22:54', '2024-10-10 02:22:54'),
(179, 63, 76, 'Ivans Animal Clinic', 'Dasmarinas Cavite', '2024-10-01', 3, 750, 650, '65', 'wildren', 'Ivans Animal Clinic', '09', 388, 66, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-10 02:26:17', '2024-10-10 02:26:17'),
(180, 63, 177, 'Ivans Animal Clinic', 'Dasmarinas Cavite', '2024-10-01', 1, 2500, 650, '65', 'wildren', 'Ivans Animal Clinic', '09', 388, 66, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-10 02:26:17', '2024-10-10 02:26:17'),
(181, 64, 212, 'Creatures and Critters', 'Paranaque', '2024-10-01', 1, 580, 660, '66', 'wildren', 'Creatures and Critters', '09', 389, 67, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-10 02:35:19', '2024-10-10 02:35:19'),
(182, 64, 78, 'Creatures and Critters', 'Paranaque', '2024-10-01', 1, 350, 660, '66', 'wildren', 'Creatures and Critters', '09', 389, 67, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-10 02:35:19', '2024-10-10 02:35:19'),
(183, 64, 213, 'Creatures and Critters', 'Paranaque', '2024-10-01', 10, 4800, 660, '66', 'wildren', 'Creatures and Critters', '09', 389, 67, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-10 02:35:20', '2024-10-10 02:35:20'),
(184, 64, 214, 'Creatures and Critters', 'Paranaque', '2024-10-01', 3, 1185, 660, '66', 'wildren', 'Creatures and Critters', '09', 389, 67, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-10 02:35:20', '2024-10-10 02:35:20'),
(185, 65, 215, 'Franciscan Asisi Veterinary Clinic', 'Paranaque', '2024-08-06', 24, 9840, 670, '67', 'wildren', 'Franciscan Asisi Veterinary Clinic', '09', 222, 68, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-10 02:42:10', '2024-10-10 02:42:10'),
(186, 65, 56, 'Franciscan Asisi Veterinary Clinic', 'Paranaque', '2024-08-06', 12, 5940, 670, '67', 'wildren', 'Franciscan Asisi Veterinary Clinic', '09', 222, 68, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-10 02:42:10', '2024-10-10 02:42:10'),
(187, 65, 121, 'Franciscan Asisi Veterinary Clinic', 'Paranaque', '2024-08-06', 12, 1800, 670, '67', 'wildren', 'Franciscan Asisi Veterinary Clinic', '09', 222, 68, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-10 02:42:10', '2024-10-10 02:42:10'),
(188, 66, 216, 'DR. M & M VETERINARY CLINIC', 'Lapu-Laput City', '2024-06-29', 28, 4620, 680, '68', 'wildren', 'DR. M & M VETERINARY CLINIC', '09', 149, 69, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-10 03:01:35', '2024-10-10 03:01:35'),
(189, 66, 217, 'DR. M & M VETERINARY CLINIC', 'Lapu-Laput City', '2024-06-29', 28, 5264, 680, '68', 'wildren', 'DR. M & M VETERINARY CLINIC', '09', 149, 69, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-10 03:01:35', '2024-10-10 03:01:35'),
(190, 66, 218, 'DR. M & M VETERINARY CLINIC', 'Lapu-Laput City', '2024-06-29', 12, 1020, 680, '68', 'wildren', 'DR. M & M VETERINARY CLINIC', '09', 149, 69, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-10 03:01:35', '2024-10-10 03:01:35'),
(191, 66, 219, 'DR. M & M VETERINARY CLINIC', 'Lapu-Laput City', '2024-06-29', 12, 1140, 680, '68', 'wildren', 'DR. M & M VETERINARY CLINIC', '09', 149, 69, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-10 03:01:35', '2024-10-10 03:01:35'),
(192, 66, 220, 'DR. M & M VETERINARY CLINIC', 'Lapu-Laput City', '2024-06-29', 12, 1140, 680, '68', 'wildren', 'DR. M & M VETERINARY CLINIC', '09', 149, 69, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-10 03:01:35', '2024-10-10 03:01:35'),
(193, 66, 221, 'DR. M & M VETERINARY CLINIC', 'Lapu-Laput City', '2024-06-29', 12, 1020, 680, '68', 'wildren', 'DR. M & M VETERINARY CLINIC', '09', 149, 69, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-10 03:01:35', '2024-10-10 03:01:35'),
(194, 66, 222, 'DR. M & M VETERINARY CLINIC', 'Lapu-Laput City', '2024-06-29', 12, 1140, 680, '68', 'wildren', 'DR. M & M VETERINARY CLINIC', '09', 149, 69, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-10 03:01:35', '2024-10-10 03:01:35'),
(195, 66, 223, 'DR. M & M VETERINARY CLINIC', 'Lapu-Laput City', '2024-06-29', 12, 1380, 680, '68', 'wildren', 'DR. M & M VETERINARY CLINIC', '09', 149, 69, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-10 03:01:35', '2024-10-10 03:01:35'),
(196, 66, 224, 'DR. M & M VETERINARY CLINIC', 'Lapu-Laput City', '2024-06-29', 12, 1440, 680, '68', 'wildren', 'DR. M & M VETERINARY CLINIC', '09', 149, 69, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-10 03:01:35', '2024-10-10 03:01:35'),
(197, 67, 217, 'DR. M & M VETERINARY CLINIC', 'Lapu-Laput City', '2024-06-29', 24, 4512, 690, '69', 'wildren', 'DR. M & M VETERINARY CLINIC', '09', 148, 70, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-10 03:07:19', '2024-10-10 03:07:19'),
(198, 67, 216, 'DR. M & M VETERINARY CLINIC', 'Lapu-Laput City', '2024-06-29', 30, 4950, 690, '69', 'wildren', 'DR. M & M VETERINARY CLINIC', '09', 148, 70, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-10 03:07:19', '2024-10-10 03:07:19'),
(199, 68, 218, 'DR. M & M VETERINARY CLINIC', 'Lapu-Laput City', '2024-06-29', 12, 1020, 700, '70', 'wildren', 'DR. M & M VETERINARY CLINIC', '09', 147, 71, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-10 03:24:50', '2024-10-10 03:24:50'),
(200, 68, 219, 'DR. M & M VETERINARY CLINIC', 'Lapu-Laput City', '2024-06-29', 12, 1140, 700, '70', 'wildren', 'DR. M & M VETERINARY CLINIC', '09', 147, 71, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-10 03:24:50', '2024-10-10 03:24:50');
INSERT INTO `orders` (`id`, `trans_no`, `product_id`, `deliveredto`, `address`, `delivered_date`, `quantity`, `total_amount`, `po_no`, `terms`, `deliveredby`, `fullname`, `contact_num`, `or`, `cr`, `collected_by`, `payment_status`, `created_by`, `updated_by`, `created_id`, `email`, `created_at`, `updated_at`) VALUES
(201, 68, 225, 'DR. M & M VETERINARY CLINIC', 'Lapu-Laput City', '2024-06-29', 12, 1440, 700, '70', 'wildren', 'DR. M & M VETERINARY CLINIC', '09', 147, 71, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-10 03:24:50', '2024-10-10 03:24:50'),
(202, 68, 226, 'DR. M & M VETERINARY CLINIC', 'Lapu-Laput City', '2024-06-29', 12, 1800, 700, '70', 'wildren', 'DR. M & M VETERINARY CLINIC', '09', 147, 71, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-10 03:24:50', '2024-10-10 03:24:50'),
(203, 68, 227, 'DR. M & M VETERINARY CLINIC', 'Lapu-Laput City', '2024-06-29', 12, 2040, 700, '70', 'wildren', 'DR. M & M VETERINARY CLINIC', '09', 147, 71, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-10 03:24:50', '2024-10-10 03:24:50'),
(204, 68, 228, 'DR. M & M VETERINARY CLINIC', 'Lapu-Laput City', '2024-06-29', 12, 2880, 700, '70', 'wildren', 'DR. M & M VETERINARY CLINIC', '09', 147, 71, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-10 03:24:50', '2024-10-10 03:24:50'),
(205, 68, 56, 'DR. M & M VETERINARY CLINIC', 'Lapu-Laput City', '2024-06-29', 20, 9900, 700, '70', 'wildren', 'DR. M & M VETERINARY CLINIC', '09', 147, 71, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-10 03:24:50', '2024-10-10 03:24:50'),
(206, 68, 229, 'DR. M & M VETERINARY CLINIC', 'Lapu-Laput City', '2024-06-29', 12, 1260, 700, '70', 'wildren', 'DR. M & M VETERINARY CLINIC', '09', 147, 71, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-10 03:24:50', '2024-10-10 03:24:50'),
(207, 69, 73, 'Pet Access', 'Sta.Mesa', '2024-07-18', 1, 1100, 710, '71', 'wildren', 'Pet Access', '09', 184, 72, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-10 03:40:03', '2024-10-10 03:40:03'),
(208, 69, 232, 'Pet Access', 'Sta.Mesa', '2024-07-18', 15, 375, 710, '71', 'wildren', 'Pet Access', '09', 184, 72, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-10 03:40:03', '2024-10-10 03:40:03'),
(209, 69, 230, 'Pet Access', 'Sta.Mesa', '2024-07-18', 1, 295, 710, '71', 'wildren', 'Pet Access', '09', 184, 72, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-10 03:40:03', '2024-10-10 03:40:03'),
(210, 69, 231, 'Pet Access', 'Sta.Mesa', '2024-07-18', 1, 250, 710, '71', 'wildren', 'Pet Access', '09', 184, 72, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-10 03:40:03', '2024-10-10 03:40:03'),
(211, 70, 27, 'Creatures and Critters', 'Paranaque', '2024-08-15', 1, 950, 720, '72', 'wildren', 'Creatures and Critters', '09', 261, 73, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-10 03:43:47', '2024-10-10 03:43:47'),
(212, 70, 233, 'Creatures and Critters', 'Paranaque', '2024-08-15', 4, 1000, 720, '72', 'wildren', 'Creatures and Critters', '09', 261, 73, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-10 03:43:47', '2024-10-10 03:43:47'),
(213, 70, 234, 'Creatures and Critters', 'Paranaque', '2024-08-15', 2, 500, 720, '72', 'wildren', 'Creatures and Critters', '09', 261, 73, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-10 03:43:47', '2024-10-10 03:43:47'),
(214, 71, 236, 'Vetterhealth Aniimal Clinic', 'Dasmarinas Cavite', '2024-07-30', 10, 2500, 730, '73', 'wildren', 'Vetterhealth Animal Clinic', '09', 193, 74, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-10 03:50:28', '2024-10-10 03:50:28'),
(215, 71, 235, 'Vetterhealth Aniimal Clinic', 'Dasmarinas Cavite', '2024-07-30', 10, 2300, 730, '73', 'wildren', 'Vetterhealth Animal Clinic', '09', 193, 74, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-10 03:50:28', '2024-10-10 03:50:28'),
(216, 71, 237, 'Vetterhealth Aniimal Clinic', 'Dasmarinas Cavite', '2024-07-30', 2, 790, 730, '73', 'wildren', 'Vetterhealth Animal Clinic', '09', 193, 74, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-10 03:50:28', '2024-10-10 03:50:28'),
(217, 71, 232, 'Vetterhealth Aniimal Clinic', 'Dasmarinas Cavite', '2024-07-30', 1, 25, 730, '73', 'wildren', 'Vetterhealth Animal Clinic', '09', 193, 74, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-10 03:50:28', '2024-10-10 03:50:28'),
(218, 72, 239, 'Creatures and Critters', 'Paranaque', '2024-08-31', 1, 450, 740, '74', 'wildren', 'Creatures and Critters', '09', 308, 75, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-10 04:13:38', '2024-10-10 04:13:38'),
(219, 72, 234, 'Creatures and Critters', 'Paranaque', '2024-08-31', 3, 750, 740, '74', 'wildren', 'Creatures and Critters', '09', 308, 75, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-10 04:13:38', '2024-10-10 04:13:38'),
(220, 72, 233, 'Creatures and Critters', 'Paranaque', '2024-08-31', 5, 1250, 740, '74', 'wildren', 'Creatures and Critters', '09', 308, 75, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-10 04:13:38', '2024-10-10 04:13:38'),
(221, 72, 232, 'Creatures and Critters', 'Paranaque', '2024-08-31', 5, 125, 740, '74', 'wildren', 'Creatures and Critters', '09', 308, 75, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-10 04:13:38', '2024-10-10 04:13:38'),
(222, 72, 238, 'Creatures and Critters', 'Paranaque', '2024-08-31', 5, 125, 740, '74', 'wildren', 'Creatures and Critters', '09', 308, 75, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-10 04:13:38', '2024-10-10 04:13:38'),
(223, 73, 240, '1st United Doctors Vet Hospital', 'Sta. Catalina Dasma Cavite', '2024-09-07', 1, 550, 750, '75', 'wildren', '1st United Doctors Vet Hospital', '09', 318, 76, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-10 04:39:14', '2024-10-10 04:39:14'),
(224, 73, 69, '1st United Doctors Vet Hospital', 'Sta. Catalina Dasma Cavite', '2024-09-07', 1, 850, 750, '75', 'wildren', '1st United Doctors Vet Hospital', '09', 318, 76, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-10 04:39:14', '2024-10-10 04:39:14'),
(225, 73, 241, '1st United Doctors Vet Hospital', 'Sta. Catalina Dasma Cavite', '2024-09-07', 1, 350, 750, '75', 'wildren', '1st United Doctors Vet Hospital', '09', 318, 76, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-10 04:39:14', '2024-10-10 04:39:14'),
(226, 73, 242, '1st United Doctors Vet Hospital', 'Sta. Catalina Dasma Cavite', '2024-09-07', 1, 350, 750, '75', 'wildren', '1st United Doctors Vet Hospital', '09', 318, 76, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-10 04:39:14', '2024-10-10 04:39:14'),
(227, 73, 154, '1st United Doctors Vet Hospital', 'Sta. Catalina Dasma Cavite', '2024-09-07', 1, 350, 750, '75', 'wildren', '1st United Doctors Vet Hospital', '09', 318, 76, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-10 04:39:14', '2024-10-10 04:39:14'),
(228, 73, 155, '1st United Doctors Vet Hospital', 'Sta. Catalina Dasma Cavite', '2024-09-07', 1, 350, 750, '75', 'wildren', '1st United Doctors Vet Hospital', '09', 318, 76, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-10 04:39:14', '2024-10-10 04:39:14'),
(229, 74, 243, 'EMC ANIMAL CLINIC', 'iMUS CAVITE', '2024-09-07', 5, 1750, 760, '76', 'wildren', 'EMC Animal Clinic', '09', 319, 77, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-11 01:24:49', '2024-10-11 01:24:49'),
(230, 74, 244, 'EMC ANIMAL CLINIC', 'iMUS CAVITE', '2024-09-07', 10, 2500, 760, '76', 'wildren', 'EMC Animal Clinic', '09', 319, 77, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-11 01:24:49', '2024-10-11 01:24:49'),
(231, 74, 245, 'EMC ANIMAL CLINIC', 'iMUS CAVITE', '2024-09-07', 10, 2950, 760, '76', 'wildren', 'EMC Animal Clinic', '09', 319, 77, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-11 01:24:49', '2024-10-11 01:24:49'),
(232, 74, 185, 'EMC ANIMAL CLINIC', 'iMUS CAVITE', '2024-09-07', 5, 4975, 760, '76', 'wildren', 'EMC Animal Clinic', '09', 319, 77, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-11 01:24:49', '2024-10-11 01:24:49'),
(233, 74, 81, 'EMC ANIMAL CLINIC', 'iMUS CAVITE', '2024-09-07', 5, 4975, 760, '76', 'wildren', 'EMC Animal Clinic', '09', 319, 77, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-11 01:24:49', '2024-10-11 01:24:49'),
(234, 75, 246, 'Vetcentro Dog and Cat Clinic', 'Dasmarinas Cavite', '2024-08-30', 1, 795, 770, '77', 'wildren', 'Vetcentro Dog and Cat Clinic', '09', 307, 78, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-11 01:36:31', '2024-10-11 01:36:31'),
(235, 75, 247, 'Vetcentro Dog and Cat Clinic', 'Dasmarinas Cavite', '2024-08-30', 1, 795, 770, '77', 'wildren', 'Vetcentro Dog and Cat Clinic', '09', 307, 78, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-11 01:36:31', '2024-10-11 01:36:31'),
(236, 76, 248, 'ARK Veterinary Clinic', 'Carmona Cavite', '2024-09-03', 1, 5300, 780, '78', 'wildren', 'ARK Veterinary Clinic', '09', 299, 79, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-11 01:39:52', '2024-10-11 01:39:52'),
(237, 77, 232, 'Nhets Aniimal Clinic', 'Valenzuela City', '2024-09-30', 100, 2500, 790, '79', 'wildren', 'Nhets Animal Clinic', '09', 195, 80, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-11 01:41:35', '2024-10-11 01:41:35'),
(238, 78, 250, 'Lakeside Animal Clinic', 'Sucal Muntinlupa', '2024-08-15', 10, 2300, 800, '80', 'wildren', 'Lakeside Animal Clinic', '09', 262, 81, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-11 04:54:07', '2024-10-11 04:54:07'),
(239, 78, 251, 'Lakeside Animal Clinic', 'Sucal Muntinlupa', '2024-08-15', 2, 2190, 800, '80', 'wildren', 'Lakeside Animal Clinic', '09', 262, 81, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-11 04:54:07', '2024-10-11 04:54:07'),
(240, 79, 252, 'Metropaws Pet Clinic', 'Pasay City', '2024-09-06', 3, 2985, 910, '81', 'wildren', 'Metropaws Pet Clinic', '09', 315, 82, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-11 06:19:15', '2024-10-11 06:19:15'),
(241, 79, 81, 'Metropaws Pet Clinic', 'Pasay City', '2024-09-06', 3, 2985, 910, '81', 'wildren', 'Metropaws Pet Clinic', '09', 315, 82, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-11 06:19:15', '2024-10-11 06:19:15'),
(242, 79, 244, 'Metropaws Pet Clinic', 'Pasay City', '2024-09-06', 5, 1250, 910, '81', 'wildren', 'Metropaws Pet Clinic', '09', 315, 82, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-11 06:19:15', '2024-10-11 06:19:15'),
(243, 79, 64, 'Metropaws Pet Clinic', 'Pasay City', '2024-09-06', 2, 840, 910, '81', 'wildren', 'Metropaws Pet Clinic', '09', 315, 82, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-11 06:19:15', '2024-10-11 06:19:15'),
(244, 79, 110, 'Metropaws Pet Clinic', 'Pasay City', '2024-09-06', 12, 1800, 910, '81', 'wildren', 'Metropaws Pet Clinic', '09', 315, 82, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-11 06:19:15', '2024-10-11 06:19:15'),
(245, 79, 52, 'Metropaws Pet Clinic', 'Pasay City', '2024-09-06', 24, 2040, 910, '81', 'wildren', 'Metropaws Pet Clinic', '09', 315, 82, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-11 06:19:15', '2024-10-11 06:19:15'),
(246, 80, 68, 'Pet Sanctuary Veterinary Clinic', 'Malate Manila', '2024-09-18', 47, 2820, 820, '82', 'wildren', 'Pet Sanctuary Veterinary Clinic', '09', 347, 83, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-11 06:29:07', '2024-10-11 06:29:07'),
(247, 80, 254, 'Pet Sanctuary Veterinary Clinic', 'Malate Manila', '2024-09-18', 10, 300, 820, '82', 'wildren', 'Pet Sanctuary Veterinary Clinic', '09', 347, 83, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-11 06:29:07', '2024-10-11 06:29:07'),
(248, 80, 255, 'Pet Sanctuary Veterinary Clinic', 'Malate Manila', '2024-09-18', 10, 350, 820, '82', 'wildren', 'Pet Sanctuary Veterinary Clinic', '09', 347, 83, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-11 06:29:07', '2024-10-11 06:29:07'),
(249, 80, 256, 'Pet Sanctuary Veterinary Clinic', 'Malate Manila', '2024-09-18', 20, 2400, 820, '82', 'wildren', 'Pet Sanctuary Veterinary Clinic', '09', 347, 83, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-11 06:29:07', '2024-10-11 06:29:07'),
(250, 81, 258, 'Vetterhealth Aniimal Clinic', 'Dasmarinas Cavite', '2024-08-30', 10, 1500, 830, '83', 'wildren', 'Vetterhealth Animal Clinic', '09', 303, 84, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-11 06:40:33', '2024-10-11 06:40:33'),
(251, 81, 259, 'Vetterhealth Aniimal Clinic', 'Dasmarinas Cavite', '2024-08-30', 10, 2300, 830, '83', 'wildren', 'Vetterhealth Animal Clinic', '09', 303, 84, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-11 06:40:33', '2024-10-11 06:40:33'),
(252, 81, 260, 'Vetterhealth Aniimal Clinic', 'Dasmarinas Cavite', '2024-08-30', 10, 2500, 830, '83', 'wildren', 'Vetterhealth Animal Clinic', '09', 303, 84, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-11 06:40:33', '2024-10-11 06:40:33'),
(253, 81, 257, 'Vetterhealth Aniimal Clinic', 'Dasmarinas Cavite', '2024-08-30', 3, 1350, 830, '83', 'wildren', 'Vetterhealth Animal Clinic', '09', 303, 84, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-11 06:40:33', '2024-10-11 06:40:33'),
(254, 82, 258, 'Vetterhealth Aniimal Clinic', 'Dasmarinas Cavite', '2024-07-03', 10, 1500, 840, '84', 'wildren', 'Vetterhealth Animal Clinic', '09', 1491, 85, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-11 06:49:37', '2024-10-11 06:49:37'),
(255, 82, 261, 'Vetterhealth Aniimal Clinic', 'Dasmarinas Cavite', '2024-07-03', 10, 2500, 840, '84', 'wildren', 'Vetterhealth Animal Clinic', '09', 1491, 85, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-11 06:49:37', '2024-10-11 06:49:37'),
(256, 82, 65, 'Vetterhealth Aniimal Clinic', 'Dasmarinas Cavite', '2024-07-03', 3, 375, 840, '84', 'wildren', 'Vetterhealth Animal Clinic', '09', 1491, 85, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-11 06:49:37', '2024-10-11 06:49:37'),
(257, 82, 174, 'Vetterhealth Aniimal Clinic', 'Dasmarinas Cavite', '2024-07-03', 4, 1120, 840, '84', 'wildren', 'Vetterhealth Animal Clinic', '09', 1491, 85, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-11 06:49:37', '2024-10-11 06:49:37'),
(258, 82, 232, 'Vetterhealth Aniimal Clinic', 'Dasmarinas Cavite', '2024-07-03', 50, 1250, 840, '84', 'wildren', 'Vetterhealth Animal Clinic', '09', 1491, 85, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-11 06:49:37', '2024-10-11 06:49:37'),
(259, 83, 263, 'Vetlife Veterinary Clinic', 'Pasay City', '2024-09-10', 25, 575, 850, '85', 'wildren', 'Vetlife Veterinary Clinic', '09', 324, 86, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-11 08:12:57', '2024-10-11 08:12:57'),
(260, 83, 264, 'Vetlife Veterinary Clinic', 'Pasay City', '2024-09-10', 10, 3700, 850, '85', 'wildren', 'Vetlife Veterinary Clinic', '09', 324, 86, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-11 08:12:57', '2024-10-11 08:12:57'),
(261, 83, 265, 'Vetlife Veterinary Clinic', 'Pasay City', '2024-09-10', 1, 5200, 850, '85', 'wildren', 'Vetlife Veterinary Clinic', '09', 324, 86, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-11 08:12:57', '2024-10-11 08:12:57'),
(262, 83, 111, 'Vetlife Veterinary Clinic', 'Pasay City', '2024-09-10', 5, 1975, 850, '85', 'wildren', 'Vetlife Veterinary Clinic', '09', 324, 86, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-11 08:12:57', '2024-10-11 08:12:57'),
(263, 83, 266, 'Vetlife Veterinary Clinic', 'Pasay City', '2024-09-10', 1, 650, 850, '85', 'wildren', 'Vetlife Veterinary Clinic', '09', 324, 86, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-11 08:12:57', '2024-10-11 08:12:57'),
(264, 84, 267, 'Animal Zone Veterinary Clinic', 'Tagbilaran City Bohol', '2024-09-12', 10, 550, 860, '86', 'wildren', 'Animal Zone Veterinary Clinic', '09', 329, 87, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-11 08:30:24', '2024-10-11 08:30:24'),
(265, 84, 268, 'Animal Zone Veterinary Clinic', 'Tagbilaran City Bohol', '2024-09-12', 10, 1500, 860, '86', 'wildren', 'Animal Zone Veterinary Clinic', '09', 329, 87, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-11 08:30:24', '2024-10-11 08:30:24'),
(266, 84, 105, 'Animal Zone Veterinary Clinic', 'Tagbilaran City Bohol', '2024-09-12', 1, 350, 860, '86', 'wildren', 'Animal Zone Veterinary Clinic', '09', 329, 87, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-11 08:30:24', '2024-10-11 08:30:24'),
(267, 84, 269, 'Animal Zone Veterinary Clinic', 'Tagbilaran City Bohol', '2024-09-12', 1, 395, 860, '86', 'wildren', 'Animal Zone Veterinary Clinic', '09', 329, 87, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-11 08:30:24', '2024-10-11 08:30:24'),
(268, 84, 64, 'Animal Zone Veterinary Clinic', 'Tagbilaran City Bohol', '2024-09-12', 2, 840, 860, '86', 'wildren', 'Animal Zone Veterinary Clinic', '09', 329, 87, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-11 08:30:24', '2024-10-11 08:30:24'),
(269, 84, 270, 'Animal Zone Veterinary Clinic', 'Tagbilaran City Bohol', '2024-09-12', 1, 847, 860, '86', 'wildren', 'Animal Zone Veterinary Clinic', '09', 329, 87, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-11 08:30:24', '2024-10-11 08:30:24'),
(270, 85, 275, 'Vetlife Veterinary Clinic', 'Pasay City', '2024-09-16', 1, 1400, 870, '87', 'wildren', 'Vetlife Veterinary Clinic', '09', 343, 88, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 00:46:02', '2024-10-12 00:46:02'),
(271, 85, 276, 'Vetlife Veterinary Clinic', 'Pasay City', '2024-09-16', 2, 760, 870, '87', 'wildren', 'Vetlife Veterinary Clinic', '09', 343, 88, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 00:46:02', '2024-10-12 00:46:02'),
(272, 85, 277, 'Vetlife Veterinary Clinic', 'Pasay City', '2024-09-16', 1, 230, 870, '87', 'wildren', 'Vetlife Veterinary Clinic', '09', 343, 88, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 00:46:02', '2024-10-12 00:46:02'),
(273, 86, 278, 'Metrotails Veterinary clinic', 'Taguig CIty', '2024-07-27', 20, 7600, 880, '88', 'wildren', 'Metrotails Veterinary Clinic', '09', 174, 89, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 01:49:54', '2024-10-12 01:49:54'),
(274, 86, 280, 'Metrotails Veterinary clinic', 'Taguig CIty', '2024-07-27', 20, 1900, 880, '88', 'wildren', 'Metrotails Veterinary Clinic', '09', 174, 89, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 01:49:54', '2024-10-12 01:49:54'),
(275, 86, 279, 'Metrotails Veterinary clinic', 'Taguig CIty', '2024-07-27', 20, 1600, 880, '88', 'wildren', 'Metrotails Veterinary Clinic', '09', 174, 89, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 01:49:54', '2024-10-12 01:49:54'),
(276, 86, 281, 'Metrotails Veterinary clinic', 'Taguig CIty', '2024-07-27', 3, 5550, 880, '88', 'wildren', 'Metrotails Veterinary Clinic', '09', 174, 89, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 01:49:54', '2024-10-12 01:49:54'),
(277, 86, 282, 'Metrotails Veterinary clinic', 'Taguig CIty', '2024-07-27', 25, 6250, 880, '88', 'wildren', 'Metrotails Veterinary Clinic', '09', 174, 89, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 01:49:54', '2024-10-12 01:49:54'),
(278, 86, 283, 'Metrotails Veterinary clinic', 'Taguig CIty', '2024-07-27', 25, 6700, 880, '88', 'wildren', 'Metrotails Veterinary Clinic', '09', 174, 89, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 01:49:54', '2024-10-12 01:49:54'),
(279, 87, 284, 'Metrotails Veterinary clinic', 'Taguig CIty', '2024-09-03', 25, 6875, 890, '89', 'wildren', 'Metrotails Veterinary Clinic', '09', 296, 90, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 02:02:23', '2024-10-12 02:02:23'),
(280, 87, 285, 'Metrotails Veterinary clinic', 'Taguig CIty', '2024-09-03', 25, 7450, 890, '89', 'wildren', 'Metrotails Veterinary Clinic', '09', 296, 90, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 02:02:23', '2024-10-12 02:02:23'),
(281, 87, 286, 'Metrotails Veterinary clinic', 'Taguig CIty', '2024-09-03', 5, 1800, 890, '89', 'wildren', 'Metrotails Veterinary Clinic', '09', 296, 90, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 02:02:23', '2024-10-12 02:02:23'),
(282, 87, 287, 'Metrotails Veterinary clinic', 'Taguig CIty', '2024-09-03', 25, 14750, 890, '89', 'wildren', 'Metrotails Veterinary Clinic', '09', 296, 90, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 02:02:23', '2024-10-12 02:02:23'),
(283, 87, 60, 'Metrotails Veterinary clinic', 'Taguig CIty', '2024-09-03', 10, 2950, 890, '89', 'wildren', 'Metrotails Veterinary Clinic', '09', 296, 90, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 02:02:23', '2024-10-12 02:02:23'),
(284, 88, 288, 'Ma.Zion Animal Clinic', 'Tondo Manila', '2024-10-11', 1, 280, 900, '90', 'wildren', 'Ma.Zion Animal Clinic', '09', 416, 91, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 02:26:26', '2024-10-12 02:26:26'),
(285, 89, 160, 'Vetways', 'Dasmarinas Cavite', '2024-10-11', 20, 2300, 920, '91', 'wildren', 'Vetways', '09', 414, 92, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 02:30:27', '2024-10-12 02:30:27'),
(286, 89, 138, 'Vetways', 'Dasmarinas Cavite', '2024-10-11', 20, 2100, 920, '91', 'wildren', 'Vetways', '09', 414, 92, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 02:30:27', '2024-10-12 02:30:27'),
(287, 89, 177, 'Vetways', 'Dasmarinas Cavite', '2024-10-11', 1, 2500, 920, '91', 'wildren', 'Vetways', '09', 414, 92, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 02:30:27', '2024-10-12 02:30:27'),
(288, 90, 39, 'I-Vet Animal Clinic', 'Anqono Rizal', '2024-10-09', 1, 780, 930, '92', 'wildren', 'I-Vet Animal Clinic', '09', 406, 93, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 02:35:01', '2024-10-12 02:35:01'),
(289, 91, 95, 'I-Vet Animal Clinic', 'Anqono Rizal', '2024-10-09', 10, 3350, 940, '93', 'wildren', 'I-Vet Animal Clinic', '09', 407, 94, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 02:38:07', '2024-10-12 02:38:07'),
(290, 91, 93, 'I-Vet Animal Clinic', 'Anqono Rizal', '2024-10-09', 10, 2800, 940, '93', 'wildren', 'I-Vet Animal Clinic', '09', 407, 94, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 02:38:07', '2024-10-12 02:38:07'),
(291, 92, 179, 'Critters Pet Clinic', 'Salawag Dasmarinas Cavite', '2024-10-08', 2, 5000, 950, '94', 'wildren', 'Critters Pet Clinic', '09', 400, 95, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 02:43:09', '2024-10-12 02:43:09'),
(292, 93, 127, 'Oltier Veterinary Clinic', 'Cainta  Rizal', '2024-10-09', 1, 1350, 960, '95', 'wildren', 'Oltier Veterinary Clinic', '09', 409, 96, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 02:47:06', '2024-10-12 02:47:06'),
(293, 93, 84, 'Oltier Veterinary Clinic', 'Cainta  Rizal', '2024-10-09', 2, 790, 960, '95', 'wildren', 'Oltier Veterinary Clinic', '09', 409, 96, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 02:47:06', '2024-10-12 02:47:06'),
(294, 94, 288, 'Oltier Veterinary Clinic', 'Cainta  Rizal', '2024-10-09', 1, 280, 970, '96', 'wildren', 'Oltier Veterinary Clinic', '09', 408, 97, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 02:52:57', '2024-10-12 02:52:57'),
(295, 94, 84, 'Oltier Veterinary Clinic', 'Cainta  Rizal', '2024-10-09', 2, 790, 970, '96', 'wildren', 'Oltier Veterinary Clinic', '09', 408, 97, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 02:52:57', '2024-10-12 02:52:57'),
(296, 94, 127, 'Oltier Veterinary Clinic', 'Cainta  Rizal', '2024-10-09', 1, 1350, 970, '96', 'wildren', 'Oltier Veterinary Clinic', '09', 408, 97, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 02:52:57', '2024-10-12 02:52:57'),
(297, 94, 289, 'Oltier Veterinary Clinic', 'Cainta  Rizal', '2024-10-09', 1, 995, 970, '96', 'wildren', 'Oltier Veterinary Clinic', '09', 408, 97, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 02:52:57', '2024-10-12 02:52:57'),
(298, 95, 290, 'Vetterhealth Aniimal Clinic', 'Dasmarinas Cavite', '2024-10-08', 100, 2800, 980, '97', 'wildren', 'Vetterhealth Animal Clinic', '09', 206, 98, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 03:04:36', '2024-10-12 03:04:36'),
(299, 96, 95, '4paws Veterinary Clinic', 'Bacoor Cavite', '2024-10-10', 2, 670, 990, '98', 'wildren', '4paws Veterinary Clinic', '09', 413, 99, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 03:09:01', '2024-10-12 03:09:01'),
(300, 96, 107, '4paws Veterinary Clinic', 'Bacoor Cavite', '2024-10-10', 12, 2160, 990, '98', 'wildren', '4paws Veterinary Clinic', '09', 413, 99, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 03:09:01', '2024-10-12 03:09:01'),
(301, 97, 272, 'KHO Veterinary', 'Sampaloc Manila', '2024-10-10', 10, 10500, 1000, '99', 'wildren', 'KHO Veterinary Clinic', '09', 1190, 100, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 03:13:54', '2024-10-12 03:13:54'),
(302, 98, 291, 'KHO Veterinary', 'Sampaloc Manila', '2024-10-11', 5, 7000, 1010, '100', 'wildren', 'KHO Veterinary Clinic', '09', 1191, 101, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 03:20:32', '2024-10-12 03:20:32'),
(303, 98, 292, 'KHO Veterinary', 'Sampaloc Manila', '2024-10-11', 5, 7500, 1010, '100', 'wildren', 'KHO Veterinary Clinic', '09', 1191, 101, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 03:20:32', '2024-10-12 03:20:32'),
(304, 99, 262, 'I-Vet Animal Clinic', 'Anqono Rizal', '2024-10-10', 4, 4600, 1022, '101', 'wildren', 'I-Vet Animal Clinic', '09', 412, 102, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 03:23:30', '2024-10-12 03:23:30'),
(305, 100, 293, 'Tucay Animal Clinic', 'cavite City', '2024-08-01', 7, 3850, 1033, '102', 'wildren', 'Tucay Animal Clinic', '09', 202, 103, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 03:29:41', '2024-10-12 03:29:41'),
(306, 100, 294, 'Tucay Animal Clinic', 'cavite City', '2024-08-01', 10, 1500, 1033, '102', 'wildren', 'Tucay Animal Clinic', '09', 202, 103, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 03:29:41', '2024-10-12 03:29:41'),
(307, 100, 232, 'Tucay Animal Clinic', 'cavite City', '2024-08-01', 25, 625, 1033, '102', 'wildren', 'Tucay Animal Clinic', '09', 202, 103, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 03:29:41', '2024-10-12 03:29:41'),
(308, 101, 145, 'Vetlife Veterinary Clinic', 'Pasay City', '2024-10-10', 25, 5000, 1044, '103', 'wildren', 'Vetlife Veterinary Clinic', '09', 410, 104, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 03:40:50', '2024-10-12 03:40:50'),
(309, 101, 264, 'Vetlife Veterinary Clinic', 'Pasay City', '2024-10-10', 10, 3700, 1044, '103', 'wildren', 'Vetlife Veterinary Clinic', '09', 410, 104, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 03:40:50', '2024-10-12 03:40:50'),
(310, 101, 295, 'Vetlife Veterinary Clinic', 'Pasay City', '2024-10-10', 24, 2640, 1044, '103', 'wildren', 'Vetlife Veterinary Clinic', '09', 410, 104, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 03:40:50', '2024-10-12 03:40:50'),
(311, 101, 296, 'Vetlife Veterinary Clinic', 'Pasay City', '2024-10-10', 2, 1700, 1044, '103', 'wildren', 'Vetlife Veterinary Clinic', '09', 410, 104, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 03:40:50', '2024-10-12 03:40:50'),
(312, 101, 297, 'Vetlife Veterinary Clinic', 'Pasay City', '2024-10-10', 2, 900, 1044, '103', 'wildren', 'Vetlife Veterinary Clinic', '09', 410, 104, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 03:40:50', '2024-10-12 03:40:50'),
(313, 102, 298, 'Oltier Veterinary Clinic', 'cavite City', '2024-10-10', 1, 995, 1055, '104', 'wildren', 'Oltier Veterinary Clinic', '09', 411, 105, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 04:01:03', '2024-10-12 04:01:03'),
(314, 102, 274, 'Oltier Veterinary Clinic', 'cavite City', '2024-10-10', 12, 3360, 1055, '104', 'wildren', 'Oltier Veterinary Clinic', '09', 411, 105, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 04:01:03', '2024-10-12 04:01:03'),
(315, 102, 271, 'Oltier Veterinary Clinic', 'cavite City', '2024-10-10', 2, 1920, 1055, '104', 'wildren', 'Oltier Veterinary Clinic', '09', 411, 105, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 04:01:03', '2024-10-12 04:01:03'),
(316, 102, 117, 'Oltier Veterinary Clinic', 'cavite City', '2024-10-10', 4, 4800, 1055, '104', 'wildren', 'Oltier Veterinary Clinic', '09', 411, 105, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 04:01:03', '2024-10-12 04:01:03'),
(317, 102, 299, 'Oltier Veterinary Clinic', 'cavite City', '2024-10-10', 5, 1500, 1055, '104', 'wildren', 'Oltier Veterinary Clinic', '09', 411, 105, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 04:01:03', '2024-10-12 04:01:03'),
(318, 102, 62, 'Oltier Veterinary Clinic', 'cavite City', '2024-10-10', 2, 790, 1055, '104', 'wildren', 'Oltier Veterinary Clinic', '09', 411, 105, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 04:01:03', '2024-10-12 04:01:03'),
(319, 103, 55, 'Juan Da Veterinarian', 'General Trias Cavite', '2024-10-11', 10, 3950, 1066, '105', 'wildren', 'Juan Da Veterinarian', '09', 415, 106, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 04:57:35', '2024-10-12 04:57:35'),
(320, 103, 300, 'Juan Da Veterinarian', 'General Trias Cavite', '2024-10-11', 10, 3650, 1066, '105', 'wildren', 'Juan Da Veterinarian', '09', 415, 106, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 04:57:35', '2024-10-12 04:57:35'),
(321, 103, 147, 'Juan Da Veterinarian', 'General Trias Cavite', '2024-10-11', 10, 3950, 1066, '105', 'wildren', 'Juan Da Veterinarian', '09', 415, 106, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 04:57:35', '2024-10-12 04:57:35'),
(322, 103, 301, 'Juan Da Veterinarian', 'General Trias Cavite', '2024-10-11', 10, 13500, 1066, '105', 'wildren', 'Juan Da Veterinarian', '09', 415, 106, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 04:57:35', '2024-10-12 04:57:35'),
(323, 104, 289, 'Animal Zone Veterinary Clinic', 'Tagbilaran City Bohol', '2024-09-30', 1, 995, 1077, '106', 'wildren', 'Animal Zone Veterinary Clinic', '09', 386, 107, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 05:05:42', '2024-10-12 05:05:42'),
(324, 104, 302, 'Animal Zone Veterinary Clinic', 'Tagbilaran City Bohol', '2024-09-30', 1, 680, 1077, '106', 'wildren', 'Animal Zone Veterinary Clinic', '09', 386, 107, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 05:05:42', '2024-10-12 05:05:42'),
(325, 105, 303, 'Vetterhealth Aniimal Clinic', 'Dasmarinas Cavite', '2024-07-15', 5, 1900, 1088, '107', 'wildren', 'Vetterhealth Animal Clinic', '09', 177, 108, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 05:26:12', '2024-10-12 05:26:12'),
(326, 105, 304, 'Vetterhealth Aniimal Clinic', 'Dasmarinas Cavite', '2024-07-15', 2, 760, 1088, '107', 'wildren', 'Vetterhealth Animal Clinic', '09', 177, 108, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 05:26:12', '2024-10-12 05:26:12'),
(327, 105, 305, 'Vetterhealth Aniimal Clinic', 'Dasmarinas Cavite', '2024-07-15', 10, 2800, 1088, '107', 'wildren', 'Vetterhealth Animal Clinic', '09', 177, 108, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 05:26:12', '2024-10-12 05:26:12'),
(328, 106, 238, 'Vetlife Veterinary Clinic', 'Pasay City', '2024-06-15', 30, 750, 1099, '108', 'wildren', 'Vetlife Veterinary Clinic', '09', 102, 109, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 07:01:37', '2024-10-12 07:01:37'),
(329, 106, 307, 'Vetlife Veterinary Clinic', 'Pasay City', '2024-06-15', 10, 3800, 1099, '108', 'wildren', 'Vetlife Veterinary Clinic', '09', 102, 109, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 07:01:37', '2024-10-12 07:01:37'),
(330, 106, 308, 'Vetlife Veterinary Clinic', 'Pasay City', '2024-06-15', 1, 850, 1099, '108', 'wildren', 'Vetlife Veterinary Clinic', '09', 102, 109, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 07:01:37', '2024-10-12 07:01:37'),
(331, 106, 309, 'Vetlife Veterinary Clinic', 'Pasay City', '2024-06-15', 5, 2475, 1099, '108', 'wildren', 'Vetlife Veterinary Clinic', '09', 102, 109, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 07:01:37', '2024-10-12 07:01:37'),
(332, 107, 286, 'Oltier Veterinary Clinic', 'Tagbilaran City Bohol', '2024-08-12', 10, 3600, 1110, '109', 'wildren', 'Oltier Veterinary Clinic', '09', 244, 110, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 07:23:37', '2024-10-12 07:23:37'),
(333, 107, 311, 'Oltier Veterinary Clinic', 'Tagbilaran City Bohol', '2024-08-12', 50, 10800, 1110, '109', 'wildren', 'Oltier Veterinary Clinic', '09', 244, 110, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 07:23:37', '2024-10-12 07:23:37'),
(334, 107, 310, 'Oltier Veterinary Clinic', 'Tagbilaran City Bohol', '2024-08-12', 50, 13950, 1110, '109', 'wildren', 'Oltier Veterinary Clinic', '09', 244, 110, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 07:23:37', '2024-10-12 07:23:37'),
(335, 107, 285, 'Oltier Veterinary Clinic', 'Tagbilaran City Bohol', '2024-08-12', 25, 7450, 1110, '109', 'wildren', 'Oltier Veterinary Clinic', '09', 244, 110, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 07:23:37', '2024-10-12 07:23:37'),
(336, 107, 312, 'Oltier Veterinary Clinic', 'Tagbilaran City Bohol', '2024-08-12', 23, 1495, 1110, '109', 'wildren', 'Oltier Veterinary Clinic', '09', 244, 110, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 07:23:37', '2024-10-12 07:23:37'),
(337, 107, 313, 'Oltier Veterinary Clinic', 'Tagbilaran City Bohol', '2024-08-12', 3, 1140, 1110, '109', 'wildren', 'Oltier Veterinary Clinic', '09', 244, 110, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 07:23:37', '2024-10-12 07:23:37'),
(338, 107, 314, 'Oltier Veterinary Clinic', 'Tagbilaran City Bohol', '2024-08-12', 3, 1125, 1110, '109', 'wildren', 'Oltier Veterinary Clinic', '09', 244, 110, 'WILDREN', 'Unpaid', 'MARGIE CAMBONGGA', NULL, 2, 'eaglesmedpetsuppliestrading22@gmail.com', '2024-10-12 07:23:37', '2024-10-12 07:23:37');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
('reinjunelaride34@gmail.com', '$2y$10$9f1c/h5fvmBtNXViexWISu4LhcgU0jIzfWxj3xb26HwMjTBpLgBGK', '2024-09-26 01:30:35');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_transno` int(11) NOT NULL,
  `payment` decimal(8,2) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `number` varchar(255) DEFAULT NULL,
  `pay_date` date NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `created_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `order_transno`, `payment`, `payment_mode`, `number`, `pay_date`, `created_by`, `updated_by`, `created_id`, `created_at`, `updated_at`) VALUES
(23, 1, 6685.00, 'Cash', NULL, '2024-09-30', '2', NULL, 2, '2024-09-30 09:48:26', '2024-09-30 09:48:26');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `supplier_name` varchar(255) NOT NULL,
  `expiration_date` date NOT NULL,
  `original_price` decimal(8,2) NOT NULL,
  `selling_price` decimal(8,2) NOT NULL,
  `status` varchar(255) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `created_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `supplier_name`, `expiration_date`, `original_price`, `selling_price`, `status`, `brand_name`, `quantity`, `unit`, `created_by`, `updated_by`, `created_id`, `created_at`, `updated_at`) VALUES
(12, 'CPV', 'DRA . APPLE APPLE', '2026-09-23', 1100.00, 2100.00, 'Available', 'A PET CARE', 0, 'box', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-09-26 21:48:21', '2024-10-12 03:15:38'),
(14, 'Liv.52 Syrup', 'MAYUMI MEJARITO', '2027-04-30', 175.00, 350.00, 'Available', 'HIMALAYA PRODUCTS', 34, '200', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-09-28 02:43:19', '2024-10-12 05:38:15'),
(15, 'NEXGARD  2-4KG', 'Ma. concepcion Miralles', '2026-10-30', 1290.00, 1410.00, 'Available', 'Nex Gard', 2, '11', 'MARGIE CAMBONGGA', 'REIN JUNE LARIDE', 2, '2024-09-28 03:54:34', '2024-09-28 12:43:32'),
(16, 'NEXGARD  4-10', 'Ma. concepcion Miralles', '2026-05-30', 1330.00, 1450.00, 'Available', 'Nex Gard', 3, '28', 'MARGIE CAMBONGGA', NULL, 2, '2024-09-28 04:37:40', '2024-10-01 08:35:18'),
(17, 'NEXGARD 10-25KG', 'Ma. concepcion Miralles', '2026-10-30', 1420.00, 1540.00, 'Available', 'Nex Gard', 2, '68', 'MARGIE CAMBONGGA', NULL, 2, '2024-09-28 04:54:34', '2024-09-28 12:43:32'),
(18, 'NEXGARD 10-25KG', 'Ma. concepcion Miralles', '2026-10-30', 1420.00, 1540.00, 'Available', 'Nex Gard', 2, '68', 'MARGIE CAMBONGGA', NULL, 2, '2024-09-28 04:54:34', '2024-09-28 04:54:34'),
(19, 'NEXGARD 10-25KG', 'Ma. concepcion Miralles', '2026-10-30', 1420.00, 1540.00, 'Available', 'Nex Gard', 2, '68', 'MARGIE CAMBONGGA', NULL, 2, '2024-09-28 04:54:34', '2024-09-28 04:54:34'),
(20, 'nexgard spectra 7.5 - 15mg', 'Ma. concepcion Miralles', '2025-09-30', 1910.00, 2085.00, 'Available', 'NexGard Spectra', 3, '7', 'MARGIE CAMBONGGA', NULL, 2, '2024-09-28 07:20:59', '2024-09-28 07:20:59'),
(21, 'nexgard  spectra 15- 30kg', 'Ma. concepcion Miralles', '2025-09-30', 2125.00, 2245.00, 'Available', 'NEX GARD SPECTRA', 3, '15', 'MARGIE CAMBONGGA', NULL, 2, '2024-09-28 07:47:19', '2024-09-28 07:47:19'),
(22, 'Nexgard Spectra 30-60kg', 'Ma. concepcion Miralles', '2025-08-30', 2330.00, 2450.00, 'Available', 'NEX GARD SPECTRA', 2, '30', 'MARGIE CAMBONGGA', NULL, 2, '2024-09-28 08:44:36', '2024-09-28 08:44:36'),
(23, 'bravecto 20-40kg', 'Ma. concepcion Miralles', '2025-12-31', 1060.00, 1295.00, 'Available', 'Bravecto', 4, '20', 'MARGIE CAMBONGGA', NULL, 2, '2024-09-28 08:47:57', '2024-09-28 08:47:57'),
(24, 'bravecto  10-20kg', 'Ma. concepcion Miralles', '2025-05-31', 1060.00, 1295.00, 'Available', 'Bravecto', 3, '10', 'MARGIE CAMBONGGA', NULL, 2, '2024-09-28 08:50:05', '2024-09-28 08:50:05'),
(25, 'FRONTLINE 10KG', 'Ma. concepcion Miralles', '2026-10-31', 1090.00, 1290.00, 'Available', 'FRONTLINE PLUS', 2, '10', 'MARGIE CAMBONGGA', NULL, 2, '2024-09-28 08:58:34', '2024-09-28 08:58:34'),
(26, 'FRONTLINE 1020', 'Ma. concepcion Miralles', '2025-08-30', 1190.00, 1350.00, 'Available', 'FRONTLINE PLUS', 2, '10', 'MARGIE CAMBONGGA', NULL, 2, '2024-09-28 09:00:34', '2024-09-28 09:00:34'),
(27, 'GAUZE ROLL', 'ANTHONY JPM', '2027-05-31', 650.00, 950.00, 'Available', 'SURGITECH', 999, '1000', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-09-28 09:20:08', '2024-10-10 03:43:47'),
(28, 'Liv,52 drops', 'Ma. concepcion Miralles', '2027-04-30', 260.00, 395.00, 'Available', 'HIMALAYA PRODUCTS', 55, '50', 'MARGIE CAMBONGGA', NULL, 2, '2024-09-28 09:24:42', '2024-09-28 09:24:42'),
(29, 'Hi-Dexa', 'TERE EMBILE', '2026-12-31', 414.00, 750.00, 'Available', 'PHYLUM', 48, '100', 'MARGIE CAMBONGGA', NULL, 2, '2024-09-28 09:51:21', '2024-09-28 09:51:21'),
(31, 'Gentamicin', 'TERE EMBILE', '2025-02-28', 380.00, 780.00, 'Available', 'PHYLUM', 1, '100ml', 'MARGIE CAMBONGGA', NULL, 2, '2024-09-28 10:14:51', '2024-09-28 10:14:51'),
(32, 'Gentamicin', 'TERE EMBILE', '2025-02-28', 380.00, 780.00, 'Available', 'PHYLUM', 1, '100ml', 'MARGIE CAMBONGGA', NULL, 2, '2024-09-28 10:14:51', '2024-09-28 10:14:51'),
(33, 'Gentamicin', 'TERE EMBILE', '2025-02-28', 380.00, 780.00, 'Available', 'PHYLUM', 1, '100ml', 'MARGIE CAMBONGGA', NULL, 2, '2024-09-28 10:14:51', '2024-09-28 10:14:51'),
(36, 'Coneodex Inj.', 'TERE EMBILE', '2026-02-05', 598.00, 795.00, 'Available', 'PHYLUM', 5, '100ml', 'MARGIE CAMBONGGA', NULL, 2, '2024-09-28 10:34:52', '2024-09-28 10:34:52'),
(37, 'Vigotol high', 'TERE EMBILE', '2024-09-30', 726.00, 965.00, 'Available', 'PHYLUM', 13, '100ml', 'MARGIE CAMBONGGA', NULL, 2, '2024-09-28 10:41:37', '2024-09-28 10:41:37'),
(38, 'Fenamin Inj. (Tolfenol)', 'TERE EMBILE', '2026-06-22', 1353.00, 1950.00, 'Available', 'PHYLUM', 15, '100ml', 'MARGIE CAMBONGGA', NULL, 2, '2024-09-28 10:44:46', '2024-10-09 08:54:57'),
(39, 'Ivermectin Inj.', 'Ro-an GELIAN', '2025-04-12', 359.00, 780.00, 'Available', 'Ro-An Vet', 6, '100ml', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-09-28 11:10:24', '2024-10-12 02:35:01'),
(40, 'Toposal', 'TERE EMBILE', '2025-12-04', 636.00, 895.00, 'Available', 'PHYLUM', 17, '100ml', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-09-28 12:23:29', '2024-10-09 08:54:57'),
(41, 'ENROKING Injectable', 'TERE EMBILE', '2027-08-08', 620.00, 825.00, 'Available', 'PHYLUM', 16, '100ml', 'MARGIE CAMBONGGA', NULL, 2, '2024-09-28 12:33:10', '2024-09-28 12:33:10'),
(42, 'SB MOX LA  20%', 'TERE EMBILE', '2027-02-22', 780.00, 980.00, 'Available', 'PHYLUM', 18, '100ml', 'MARGIE CAMBONGGA', NULL, 2, '2024-09-28 12:35:14', '2024-09-28 12:35:14'),
(43, 'Vita royal plex', 'TERE EMBILE', '2027-06-24', 1053.00, 1555.00, 'Available', 'PHYLUM', 4, '1 KL', 'MARGIE CAMBONGGA', NULL, 2, '2024-09-28 12:39:51', '2024-09-28 12:39:51'),
(44, 'Super Absorbent Diapers S', 'pet Homie chichi', '2028-01-28', 110.00, 188.00, 'Available', 'CHI-CHI', 1, 'pack', 'MARGIE CAMBONGGA', NULL, 2, '2024-09-28 12:50:56', '2024-09-28 12:50:56'),
(45, 'Super Absorbent Diapers XL', 'pet Homie chichi', '2027-06-29', 110.00, 188.00, 'Available', 'CHI-CHI', 1, 'pack', 'MARGIE CAMBONGGA', NULL, 2, '2024-09-28 13:31:00', '2024-09-28 13:31:00'),
(46, 'Disposable Diapers', 'pet Homie chichi', '2028-06-27', 110.00, 188.00, 'Available', 'CHI-CHI', 1, 'pack', 'MARGIE CAMBONGGA', NULL, 2, '2024-09-28 13:36:42', '2024-09-28 13:36:42'),
(47, 'Scavon Spray', 'MAYUMI MEJARITO', '2026-05-31', 120.00, 300.00, 'Available', 'HIMALAYA PRODUCTS', 90, '100ml', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-09-28 15:16:42', '2024-10-09 00:55:51'),
(48, 'Liv.52 Syrup', 'MAYUMI MEJARITO', '2027-04-30', 175.00, 350.00, 'Available', 'HIMALAYA PRODUCTS', 0, '100ml', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-09-29 01:47:47', '2024-10-12 04:45:50'),
(49, 'Amoxicillin', 'R8 Pharma', '2027-07-30', 23.00, 45.00, 'Available', 'MOXYLOR', 0, '250mg', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-09-29 01:55:38', '2024-10-11 06:31:16'),
(50, 'Nova Folha', 'Doc. Cris lao', '2027-02-27', 440.00, 500.00, 'Available', 'New Leaf', 16, '120ml', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-09-29 02:30:16', '2024-10-08 05:47:11'),
(51, 'Phytomenadione ampule 5\'s', 'R8 Pharma', '2026-05-30', 48.00, 380.00, 'Available', 'Menaright forte', 99, 'ampule', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-09-29 02:53:50', '2024-10-09 10:00:48'),
(52, 'Prednisone', 'R8 Pharma', '2025-09-30', 39.00, 85.00, 'Available', 'LEFESONE', 0, '10mg/5ml', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-09-29 02:56:46', '2024-10-11 08:21:40'),
(53, 'Prednisone', 'R8 Pharma', '2025-09-30', 39.00, 85.00, 'Available', 'PREND', 3, '10mg/5ml', 'MARGIE CAMBONGGA', NULL, 2, '2024-09-29 03:02:36', '2024-09-29 03:02:36'),
(54, 'Moxifloxacin eye Drops', 'Celso Raymjo', '2025-04-30', 50.00, 395.00, 'Available', 'Ektek pharma', 9, '5ml', 'MARGIE CAMBONGGA', NULL, 2, '2024-09-29 03:19:24', '2024-09-29 03:19:24'),
(55, 'Nefrotec Tablets', 'Ma. concepcion Miralles', '2026-05-30', 250.00, 395.00, 'Available', 'HIMALAYA PRODUCTS', 70, '60 Tablets', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-09-29 03:21:22', '2024-10-12 04:57:35'),
(56, 'Immunol syrup', 'Ma. concepcion Miralles', '2026-10-29', 250.00, 495.00, 'Available', 'HIMALAYA PRODUCTS', 968, 'syrup', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-09-29 03:22:56', '2024-10-10 03:24:50'),
(57, 'micro edta 0.5ml', 'Polymed supplier Roxy', '2027-12-31', 350.00, 580.00, 'Available', 'SURE GUARD', 0, '0.5,ml', 'MARGIE CAMBONGGA', NULL, 2, '2024-09-30 08:48:08', '2024-09-30 09:06:22'),
(58, 'Cotton Roll', 'Polymed supplier Roxy', '2027-10-30', 115.00, 295.00, 'Available', 'TENDER SOFT', 1995, 'Roll', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-09-30 09:01:42', '2024-10-10 02:22:54'),
(59, 'Ear Drops', 'MAYUMI MEJARITO', '2025-11-30', 95.00, 180.00, 'Available', 'POMISOL', 100, 'pcs', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-09-30 10:32:18', '2024-10-08 06:11:38'),
(60, 'Azithromycin', 'R8 Pharma', '2026-12-31', 33.00, 295.00, 'Available', 'Novazith', 10, 'box', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-09-30 10:34:31', '2024-10-12 02:02:23'),
(61, 'Proxantel Pyrantel', 'Ma. concepcion Miralles', '2026-05-31', 85.00, 165.00, 'Available', 'NEMATOCIDE', 3, 'syrup', 'MARGIE CAMBONGGA', NULL, 2, '2024-09-30 10:41:10', '2024-09-30 10:41:10'),
(62, 'Enalapril', 'R8 Pharma', '2024-06-26', 195.00, 395.00, 'Available', 'REWITEYL', 97, '100  Tablets', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-09-30 11:40:48', '2024-10-12 04:01:03'),
(63, 'Prednisone', 'R8 Pharma', '2026-08-30', 58.00, 450.00, 'Available', 'VONWELT', 3, '100  Tablets', 'MARGIE CAMBONGGA', NULL, 2, '2024-09-30 11:45:56', '2024-09-30 11:45:56'),
(64, 'Prednisone tabs', 'R8 Pharma', '2026-08-30', 58.00, 420.00, 'Available', 'VONWELT', 96, '100  Tablets', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-09-30 11:45:56', '2024-10-11 08:30:24'),
(65, 'Metoclopramide amps', 'R8 Pharma', '2026-02-28', 73.00, 125.00, 'Available', 'METO', 0, '100  Tablets', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-09-30 11:49:14', '2024-10-12 07:08:42'),
(66, 'Tramadol HCI', 'R8 Pharma', '2025-05-30', 48.00, 395.00, 'Available', 'OPIODEX', 2, '50mg', 'MARGIE CAMBONGGA', NULL, 2, '2024-09-30 12:03:11', '2024-09-30 12:03:11'),
(67, 'Iv Catheter', 'ANTHONY JPM', '2028-08-31', 15.00, 1900.00, 'Available', 'CATHULA', 55, 'pcs', 'MARGIE CAMBONGGA', NULL, 2, '2024-09-30 12:15:06', '2024-09-30 12:15:06'),
(68, 'IV Catheter', 'Mactycoon supplies', '2027-03-31', 15.00, 60.00, 'Available', 'Cathy', 3, 'pcs', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-09-30 12:24:05', '2024-10-11 06:29:07'),
(69, 'Leviteracetam', 'Best Care Pharma', '2025-12-31', 250.00, 850.00, 'Available', 'Mosnev', 2999, '1 VIAL/5ml', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-09-30 12:36:51', '2024-10-10 04:39:14'),
(70, 'HPMC', 'Celso Raymjo', '2025-09-30', 50.00, 395.00, 'Available', 'NANOVISC', 10, '3ML', 'MARGIE CAMBONGGA', NULL, 2, '2024-09-30 12:38:49', '2024-09-30 12:38:49'),
(71, 'Diazepam', 'DRA. Carol Belandres', '2027-10-31', 100.00, 1350.00, 'Available', 'VALIUM', 18, '1 ampule', 'MARGIE CAMBONGGA', NULL, 2, '2024-09-30 12:44:04', '2024-10-10 02:04:53'),
(72, 'Parvolix', 'MAYUMI MEJARITO', '2025-02-28', 220.00, 380.00, 'Available', 'Ektek pharma', 95, '100ml', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-09-30 12:47:03', '2024-10-09 07:15:16'),
(73, 'PNSS 0.9% SODIUM CHLORIDE (green)', 'GMED PHARMA', '2027-12-30', 715.00, 1100.00, 'Available', 'EUROMED FLUIDS', 0, '1000ml', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-09-30 14:07:41', '2024-10-12 03:48:09'),
(74, 'PNSS 0.9% SODIUM CHLORIDE (green)', 'GMED PHARMA', '2028-12-30', 715.00, 1900.00, 'Available', 'EUROMED FLUIDS', 24, '500ml', 'MARGIE CAMBONGGA', NULL, 2, '2024-09-30 14:09:44', '2024-09-30 14:09:44'),
(75, 'Alcohol', 'ANTHONY JPM', '2028-12-30', 320.00, 380.00, 'Available', 'Guardian', 996, '1Gallon', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-09-30 14:14:40', '2024-10-10 02:18:47'),
(76, 'Syringe', 'ANTHONY JPM', '2028-12-30', 170.00, 250.00, 'Available', 'INDOPLAS', 0, '3ML', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-09-30 14:16:53', '2024-10-11 04:45:18'),
(77, 'Isoflurane', 'Best Care Pharma', '2027-12-30', 1700.00, 2300.00, 'Available', 'FLORANE', 0, '100ml', 'MARGIE CAMBONGGA', NULL, 2, '2024-09-30 14:18:52', '2024-10-08 04:44:00'),
(78, 'Needle', 'ANTHONY JPM', '2028-12-29', 230.00, 350.00, 'Available', 'Terrumo', 999, '100 pcs', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-09-30 14:25:49', '2024-10-10 02:35:19'),
(79, 'Iv Catheter', 'Mactycoon supplies', '2027-03-30', 15.00, 18.00, 'Available', 'Cathy', 20, 'pcs', 'MARGIE CAMBONGGA', NULL, 2, '2024-09-30 15:37:27', '2024-09-30 15:37:27'),
(80, 'D5 LR (PINK)1L', 'R8 Pharma', '2028-10-31', 720.00, 895.00, 'Available', 'EUROMED FLUIDS', 0, '1000ml', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-09-30 15:41:10', '2024-10-11 01:16:17'),
(81, 'D5 LR Euromed', 'R8 Pharma', '2029-05-31', 720.00, 995.00, 'Available', 'EUROMED FLUIDS', 992, 'box', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-09-30 15:42:52', '2024-10-11 06:19:15'),
(82, 'Otikoo Ear dops', 'Jonnave Veko', '2027-06-28', 270.00, 350.00, 'Available', 'VEKO PRODUCTS', 977, '15ml', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-09-30 15:48:06', '2024-10-09 06:10:46'),
(83, 'Liv.52 forte', 'MAYUMI MEJARITO', '2024-09-29', 170.00, 200.00, 'Available', 'HIMALAYA PRODUCTS', 0, '60 Tablets', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-09-30 15:50:02', '2024-10-12 04:46:14'),
(84, 'Immunol', 'Ma. concepcion Miralles', '2026-10-28', 250.00, 395.00, 'Available', 'HIMALAYA PRODUCTS', 42, '60 Tablets', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-10-01 08:32:42', '2024-10-12 02:52:57'),
(85, 'Liv.52 forte', 'MAYUMI MEJARITO', '2026-08-31', 160.00, 395.00, 'Available', 'HIMALAYA PRODUCTS', 0, '60 Tablets', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-10-01 08:35:42', '2024-10-12 04:46:36'),
(86, 'Nefrotec DS', 'MAYUMI MEJARITO', '2026-10-30', 165.00, 350.00, 'Available', 'HIMALAYA PRODUCTS', 0, '60 Tablets', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-10-01 08:37:28', '2024-10-12 03:31:19'),
(87, 'Cyclosporine eye drops', 'Daswani Latchman', '2025-02-28', 370.00, 495.00, 'Available', 'CICLOTAK', 95, '5ml', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-10-01 08:52:22', '2024-10-09 07:15:16'),
(88, 'Tobra Dexametasone', 'Triple 888', '2026-05-30', 95.00, 160.00, 'Available', 'TOBYN-D', 2, '10ml', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-01 08:56:28', '2024-10-01 08:56:28'),
(89, 'sudiom hyalouronate', 'Celso Raymjo', '2025-07-30', 50.00, 180.00, 'Available', 'Lubxe drop', 3, '5ml', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-01 09:00:31', '2024-10-01 09:00:31'),
(90, 'Zotek-P', 'Celso Raymjo', '2026-01-30', 50.00, 295.00, 'Available', 'Ektek pharma', 5, '15ml', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-01 09:04:24', '2024-10-01 09:04:24'),
(91, 'Zotek-P', 'Celso Raymjo', '2026-01-30', 50.00, 295.00, 'Available', 'Ektek pharma', 5, '15ml', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-01 09:04:29', '2024-10-01 09:04:29'),
(92, 'Ketoconazole Latosil', 'Crossmed Pharmaceuticals', '2026-03-30', 48.00, 395.00, 'Available', 'LATOSIL', 99, 'box', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-10-01 09:09:21', '2024-10-09 07:15:16'),
(93, 'Ear cleanser', 'Jonnave Veko', '2027-12-30', 180.00, 280.00, 'Available', 'Elaime', 110, '100ml', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-10-01 21:53:51', '2024-10-12 02:38:07'),
(94, 'ehr', 'MAYUMI MEJARITO', '2026-03-30', 1600.00, 2500.00, 'Available', 'A PET CARE', 0, '10 Test', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-02 11:16:07', '2024-10-09 02:36:41'),
(95, 'Aliviar', 'Doc. Cris lao', '2024-10-03', 250.00, 335.00, 'Available', 'New Leaf', 228, '15ml', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-03 12:03:21', '2024-10-12 03:09:01'),
(96, 'Otikoo Ear dops', 'Healthwinds supplier', '2024-10-05', 185.00, 295.00, 'Available', 'VEKO PRODUCTS', 50, '15ml', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-05 14:31:25', '2024-10-05 14:31:25'),
(97, 'Vigotonic', 'PHYLUM PRODUCTS INC.', '2026-03-30', 1.00, 310.00, 'Available', 'water solution', 20, '100ml', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-07 05:12:54', '2024-10-07 05:12:54'),
(98, 'Vitalyte Sol', 'PHYLUM PRODUCTS INC.', '2026-03-20', 1.00, 230.00, 'Available', 'water solution', 20, '100ML/BOTTLE', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-07 05:19:41', '2024-10-07 05:19:41'),
(99, 'FTD', 'PHYLUM PRODUCTS INC.', '2026-03-30', 1.00, 1035.00, 'Available', 'PHYLUM', 20, '100ML/BOTTLE', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-07 05:23:58', '2024-10-07 05:23:58'),
(100, 'Amilyte C', 'PHYLUM PRODUCTS INC.', '2026-03-30', 1.00, 1725.00, 'Available', 'Prednisolone Injectable', 20, '500ml/Bottle', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-07 05:29:37', '2024-10-07 05:29:37'),
(101, 'metaphyrone', 'PHYLUM PRODUCTS INC.', '2026-03-30', 1.00, 530.00, 'Available', 'Prednisolone Injectable', 20, 'bottle', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-07 05:35:06', '2024-10-07 05:35:06'),
(102, 'Zoletil', 'Haru and Furiends Veterinary Products Trading', '2026-03-20', 1.00, 1900.00, 'Available', 'VEKO PRODUCTS', 17, 'pack', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-10-07 05:48:39', '2024-10-08 06:21:40'),
(103, 'Ranitidine', 'Anchor Medihub', '2026-03-20', 98.00, 98.00, 'Available', 'Prednisolone Injectable', 20, '25mg/ml,10\'s', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-07 06:28:14', '2024-10-07 06:28:14'),
(104, 'Dextrose Plain 1L', 'Mart and Drug Convenience Store Inc.', '2026-03-20', 48.00, 48.00, 'Available', 'Oral', 20, 'pack', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-07 06:34:52', '2024-10-07 06:34:52'),
(105, 'Co-Amoxiclav', 'R8 Pharma', '2026-03-20', 1.00, 350.00, 'Available', 'Oral', 19, '625mg/14\'s', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-07 06:40:11', '2024-10-11 08:30:24'),
(106, 'Amoxicillin', 'DRA . APPLE APPLE', '2026-03-03', 20.00, 380.00, 'Available', 'MOXYLOR', 20, 'tabs', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-10-07 06:44:51', '2024-10-11 06:32:18'),
(107, 'pomisol', 'Haru and Furiends Veterinary Products Trading', '2026-03-28', 95.00, 180.00, 'Available', 'ACCULIFE FLUIDS 1L', 50, '15ml', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-10-07 06:50:56', '2024-10-12 03:09:01'),
(108, 'FPV', 'Haru and Furiends Veterinary Products Trading', '2026-03-29', 1800.00, 2200.00, 'Available', 'A PET CARE', 95, 'box', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-10-07 06:53:06', '2024-10-09 00:58:49'),
(109, 'Co-Amoxiclav vials', 'Anchor Medihub', '2026-03-29', 840.00, 1250.00, 'Available', 'MOXYLOR', 20, 'vials/1.2g/10\'s', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-10-07 06:57:19', '2024-10-11 08:19:26'),
(110, 'Co-amoxiclav', 'Anchor Medihub', '2026-03-29', 840.00, 150.00, 'Available', 'MOXYLOR', 0, '156mg/vials', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-10-07 06:57:26', '2024-10-11 06:19:15'),
(111, 'timolol', 'Mactycoon supplies', '2026-03-03', 310.00, 395.00, 'Available', 'Ophtalmoligicals', 45, 'eye drops', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-10-07 07:01:26', '2024-10-11 08:12:57'),
(112, 'Metronidazole', 'TERE EMBILE', '2026-03-30', 85.00, 280.00, 'Available', 'Oral', 197, '500mg', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-07 07:15:01', '2024-10-09 03:02:58'),
(113, 'D5 LR 500ml', 'TERE EMBILE', '2029-05-01', 720.00, 1925.00, 'Available', 'ACCULIFE FLUIDS 1L', 20, '500ml', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-07 07:27:05', '2024-10-07 07:27:05'),
(114, 'Azithromycin', 'R8 Pharma', '2027-06-30', 23.00, 255.00, 'Available', 'Oral', 0, '500mg', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-10-07 07:36:57', '2024-10-12 01:59:12'),
(115, 'Azithromycin', 'R8 Pharma', '2025-09-01', 38.00, 180.00, 'Available', 'Oral', 20, '200mg/5ml/15ml suspension', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-07 07:41:23', '2024-10-07 07:41:23'),
(116, 'doxycycline', 'AV VETERINARY PRODUCTS TRADING', '2026-03-29', 650.00, 950.00, 'Available', 'Prednisolone Injectable', 988, '100ml', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-10-07 07:50:56', '2024-10-08 06:38:26'),
(117, 'coforta', 'AV VETERINARY PRODUCTS TRADING', '2026-03-27', 900.00, 1200.00, 'Available', 'Prednisolone Injectable', 16, '100ml', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-07 07:54:39', '2024-10-12 04:01:03'),
(118, 'pimobendan', 'AV VETERINARY PRODUCTS TRADING', '2026-03-20', 2800.00, 5300.00, 'Available', 'Oral', 100, '5mg/ml', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-10-07 07:56:29', '2024-10-09 07:05:13'),
(119, 'Prednisolone', 'AV VETERINARY PRODUCTS TRADING', '2027-05-28', 650.00, 980.00, 'Available', 'Prednisolone Injectable', 20, '100ml', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-07 07:57:59', '2024-10-07 07:57:59'),
(120, 'CPV/CCV/GIA', 'MAYUMI MEJARITO', '2026-07-21', 2800.00, 3800.00, 'Available', 'A PET CARE', 20, '10box', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-07 08:00:38', '2024-10-07 08:00:38'),
(121, 'Tobramycin', 'Celso Raymjo', '2025-10-30', 50.00, 150.00, 'Available', 'Ophtalmoligicals', 964, '5ml', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-10-07 08:23:20', '2024-10-10 02:42:10'),
(122, 'Enrofloxacin', 'PHYLUM PRODUCTS INC.', '2025-04-16', 1.00, 825.00, 'Available', 'PHYLUM', 16, '100ml', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-07 08:48:34', '2024-10-07 08:48:34'),
(123, 'Ornipural', 'MAYUMI MEJARITO', '2026-07-27', 1.00, 950.00, 'Available', 'Prednisolone Injectable', 0, '100ml', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-10-08 04:39:05', '2024-10-12 03:51:52'),
(124, 'PNSS 1L', 'MAYUMI MEJARITO', '2026-03-21', 1.00, 83.00, 'Available', 'ACCULIFE FLUIDS 1L', 0, '1L', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-10-08 05:24:03', '2024-10-11 05:33:48'),
(125, 'Cat Catheter', 'Ma. concepcion Miralles', '2026-09-29', 1.00, 250.00, 'Available', 'Pet Accessories', 0, '1\'s', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-10-08 05:30:35', '2024-10-12 02:22:36'),
(126, 'Cefuroxime Syrup', 'Ma. concepcion Miralles', '2027-05-28', 1.00, 108.00, 'Available', 'Prednisolone Injectable', 80, '1bots', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-08 05:45:19', '2024-10-08 05:47:11'),
(127, 'Gabapentin 100mg', 'ANTHONY JPM', '2026-04-02', 1.00, 1350.00, 'Available', 'Oral', 96, '100\'s/100mg', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-08 05:57:57', '2024-10-12 02:52:57'),
(128, 'Gabapentin 300mg', 'JONATHAN CALUMBITAY', '2026-06-27', 1.00, 650.00, 'Available', 'Oral', 98, '30\'s', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-08 05:58:58', '2024-10-08 06:01:03'),
(129, 'Surgical Cap', 'MAYUMI MEJARITO', '2026-09-28', 1.00, 180.00, 'Available', 'SURGITECH', 999, '100\'s', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-08 06:03:10', '2024-10-08 06:09:50'),
(130, 'bbraun', 'Ma. concepcion Miralles', '2026-07-29', 1.00, 3250.00, 'Available', 'SURGITECH', 99, 'box 100\'s', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-08 06:08:00', '2024-10-08 06:09:50'),
(131, 'Immunol syrup white', 'MAYUMI MEJARITO', '2026-01-29', 1.00, 350.00, 'Available', 'HIMALAYA PRODUCTS', 80, 'bottle', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-08 06:17:10', '2024-10-08 06:18:57'),
(132, 'Co-Amoxiclav 312.5mg/ml', 'Ma. concepcion Miralles', '2026-04-20', 1.00, 130.00, 'Available', 'Oral', 0, '60ml', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-08 06:25:31', '2024-10-08 06:34:29'),
(133, 'LRS Acculife', 'ANTHONY JPM', '2027-09-28', 1.00, 895.00, 'Available', 'EUROMED FLUIDS', 0, 'bottle', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-10-08 06:27:42', '2024-10-11 01:15:11'),
(134, 'PNSS Euromed', 'ANTHONY JPM', '2026-06-26', 1.00, 950.00, 'Available', 'EUROMED FLUIDS', 0, 'bottle', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-10-08 06:29:37', '2024-10-12 03:48:32'),
(135, 'Metoclopramide Tabs', 'MAYUMI MEJARITO', '2027-09-21', 1.00, 65.00, 'Available', 'Prednisolone Injectable', 0, 'tabs', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-10-08 06:48:51', '2024-10-12 05:20:06'),
(136, 'E-Collar #2', 'JONATHAN CALUMBITAY', '2026-09-21', 1.00, 145.00, 'Available', 'Pet Accessories', 90, 'XL', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-10-08 06:56:05', '2024-10-09 02:22:58'),
(137, 'E-Collar #2', 'JONATHAN CALUMBITAY', '2026-09-21', 1.00, 125.00, 'Available', 'Pet Accessories', 94, 'XL', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-08 06:56:06', '2024-10-08 06:58:50'),
(138, 'E-Collar #5', 'MAYUMI MEJARITO', '2027-06-20', 1.00, 105.00, 'Available', 'Pet Accessories', 42, 'S', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-08 06:57:07', '2024-10-12 02:30:27'),
(139, 'Prednisone', 'ANTHONY JPM', '2026-08-28', 1.00, 280.00, 'Available', 'Oral', 97, '5mg/tabs', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-08 07:04:04', '2024-10-08 07:05:42'),
(140, 'ehr| Ana| Bab| lep', 'ANTHONY JPM', '2027-07-20', 1.00, 5500.00, 'Available', 'A PET CARE', 0, 'b0x', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-10-08 07:08:00', '2024-10-11 06:07:02'),
(141, 'Ornipural Solution', 'MAYUMI MEJARITO', '2026-09-27', 1.00, 1180.00, 'Available', 'Prednisolone Injectable', 0, 'bottle', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-10-08 07:11:25', '2024-10-12 03:52:15'),
(142, 'Zoletil', 'Haru and Furiends Veterinary Products Trading', '2026-09-22', 1.00, 1500.00, 'Available', 'VEKO PRODUCTS', 95, 'vials', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-08 07:16:55', '2024-10-08 07:17:49'),
(143, 'Isuflurane', 'MAYUMI MEJARITO', '2027-04-25', 1.00, 2300.00, 'Available', 'Prednisolone Injectable', 94, '100ml/1\'s', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-08 07:39:55', '2024-10-09 03:30:29'),
(144, 'Bupivacaine', 'DRA . APPLE APPLE', '2027-03-29', 1.00, 1800.00, 'Available', 'Veterinary Diagnostics', 99, 'box', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-08 07:42:08', '2024-10-08 07:43:49'),
(145, 'Nefrotec DS', 'Jonnave Veko', '2026-10-30', 185.00, 200.00, 'Available', 'HIMALAYA PRODUCTS', 2475, '25', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-10-08 15:58:35', '2024-10-12 03:40:50'),
(146, 'Atropine', 'Ma. concepcion Miralles', '2027-02-27', 1.00, 1100.00, 'Available', 'Atro', 98, 'bottle', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-09 00:37:14', '2024-10-09 00:38:02'),
(147, 'liv.52 tabs', 'MAYUMI MEJARITO', '2027-01-29', 1.00, 395.00, 'Available', 'HIMALAYA PRODUCTS', 75, 'tabs', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-09 00:46:28', '2024-10-12 04:57:35'),
(148, 'LRS Acculife', 'Ma. concepcion Miralles', '2026-05-21', 1.00, 870.00, 'Available', 'ACCULIFE FLUIDS 1L', 0, 'box', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-10-09 01:03:09', '2024-10-11 01:14:55'),
(149, 'Co-Amoxiclav 312.5mg/ml', 'JONATHAN CALUMBITAY', '2024-05-29', 1.00, 170.00, 'Available', 'Oral', 80, 'bottle', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-09 01:05:38', '2024-10-09 03:24:58'),
(150, 'silk 0 Cutting', 'ANTHONY JPM', '2026-09-29', 1.00, 350.00, 'Available', 'SURGITECH', 98, 'box', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-09 01:19:52', '2024-10-09 02:22:58'),
(151, 'silk 0 round', 'ANTHONY JPM', '2024-09-27', 1.00, 350.00, 'Available', 'SURGITECH', 98, 'box', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-09 01:21:07', '2024-10-09 02:22:58'),
(152, 'silk 1/0 cutting', 'ANTHONY JPM', '2026-09-27', 1.00, 350.00, 'Available', 'SURGITECH', 98, 'box', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-10-09 01:22:33', '2024-10-09 02:22:58'),
(153, 'silk 2/0 Round', 'ANTHONY JPM', '2026-09-27', 1.00, 350.00, 'Available', 'SURGITECH', 97, 'box', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-09 01:23:57', '2024-10-09 02:22:58'),
(154, 'silk 2/0 cutting', 'ANTHONY JPM', '2026-09-27', 1.00, 350.00, 'Available', 'SURGITECH', 999, 'box', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-10-09 01:24:53', '2024-10-10 04:39:14'),
(155, 'silk 3/0 cutting', 'ANTHONY JPM', '2024-09-27', 1.00, 350.00, 'Available', 'SURGITECH', 999, 'box', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-10-09 01:39:54', '2024-10-10 04:39:14'),
(156, 'silk 3/0 round', 'ANTHONY JPM', '2026-09-28', 1.00, 350.00, 'Available', 'SURGITECH', 97, 'box', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-09 01:42:11', '2024-10-09 02:22:58'),
(157, 'silk 4/0 cutting', 'ANTHONY JPM', '2026-09-27', 1.00, 350.00, 'Available', 'SURGITECH', 97, 'box', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-09 01:43:49', '2024-10-09 02:22:58'),
(158, 'E-Collar #7', 'ANTHONY JPM', '2026-04-28', 1.00, 85.00, 'Available', 'Pet Accessories', 78, 'xxs', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-09 01:48:12', '2024-10-09 07:52:34'),
(159, 'E-Collar #6', 'ANTHONY JPM', '2027-09-28', 1.00, 95.00, 'Available', 'Pet Accessories', 73, 'xs', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-09 01:49:23', '2024-10-10 02:04:53'),
(160, 'E-Collar #4', 'ANTHONY JPM', '2026-09-27', 1.00, 115.00, 'Available', 'Pet Accessories', 60, 'm', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-09 01:51:29', '2024-10-12 02:30:27'),
(161, 'E-Collar #3', 'ANTHONY JPM', '2026-09-27', 1.00, 125.00, 'Available', 'Pet Accessories', 85, 'L', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-09 01:52:31', '2024-10-09 07:15:16'),
(162, 'Thrombo', 'MAYUMI MEJARITO', '2026-09-24', 1.00, 490.00, 'Available', 'New Leaf', 86, 'bottle', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-09 02:24:36', '2024-10-09 02:26:18'),
(163, 'CDV', 'Ma. concepcion Miralles', '2026-06-26', 1.00, 2300.00, 'Available', 'A PET CARE', 0, 'box', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-10-09 02:32:01', '2024-10-12 03:17:08'),
(164, 'Throambeat', 'MAYUMI MEJARITO', '2026-05-03', 1.00, 380.00, 'Available', 'Ektek pharma', 80, '1', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-09 02:38:43', '2024-10-09 02:42:42'),
(165, 'Metronidazole syrup', 'Ma. concepcion Miralles', '2026-04-29', 1.00, 65.00, 'Available', 'Oral', 0, '1\'s', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-10-09 02:40:42', '2024-10-12 01:22:28'),
(166, 'Cefalexin cap', 'Ma. concepcion Miralles', '2026-07-29', 1.00, 225.00, 'Available', 'Oral', 99, '50mg', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-09 02:51:33', '2024-10-09 02:57:32'),
(167, 'Amoxicillin cap', 'R8 Pharma', '2026-05-20', 1.00, 141.00, 'Available', 'Oral', 99, '500mg', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-09 02:53:28', '2024-10-09 02:57:32'),
(168, 'Symdex Tablet', 'R8 Pharma', '2026-09-21', 1.00, 135.00, 'Available', 'Oral', 99, 'tabs', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-09 02:54:48', '2024-10-09 02:57:32'),
(169, 'Calcium Gluconate', 'R8 Pharma', '2027-07-27', 1.00, 2600.00, 'Available', 'Prednisolone Injectable', 99, 'box', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-09 03:02:03', '2024-10-09 03:02:58'),
(170, 'Ranitidine', 'Anchor Medihub', '2026-09-21', 1.00, 380.00, 'Available', 'Prednisolone Injectable', 99, '300mg/tablet', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-09 03:06:12', '2024-10-09 03:10:51'),
(171, 'Erythropoitin', 'Anchor Medihub', '2026-10-23', 1.00, 895.00, 'Available', 'Prednisolone Injectable', 86, '1\'s', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-09 03:09:20', '2024-10-09 03:10:51'),
(172, 'hyalouronate', 'Celso Raymjo', '2026-12-20', 1.00, 150.00, 'Available', 'Lubxe drop', 97, 'bottle', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-09 03:17:10', '2024-10-09 03:24:58'),
(173, 'LRS Plain', 'R8 Pharma', '2026-08-21', 1.00, 950.00, 'Available', 'ACCULIFE FLUIDS 1L', 99, 'box', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-09 03:18:57', '2024-10-09 03:24:58'),
(174, 'Gauze Pad', 'ANTHONY JPM', '2026-04-18', 1.00, 280.00, 'Available', 'SURGITECH', 994, 'pcs', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-09 03:22:49', '2024-10-11 06:49:37'),
(175, 'Diphenhydramine', 'R8 Pharma', '2027-01-29', 1.00, 295.00, 'Available', 'Prednisolone Injectable', 99, '25mg', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-09 04:06:16', '2024-10-09 04:07:40'),
(176, 'Cs Drapes', 'R8 Pharma', '2026-09-23', 1.00, 95.00, 'Available', 'SURGITECH', 52, '1\'s', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-09 04:10:21', '2024-10-09 04:11:47'),
(177, 'EHR', 'R8 Pharma', '2026-07-25', 1.00, 2500.00, 'Available', 'A PET CARE', 998, 'box', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-10-09 06:01:38', '2024-10-12 02:30:27'),
(178, 'ehr| Ana| Bab| chw', 'R8 Pharma', '2026-11-29', 1.00, 4595.00, 'Available', 'A PET CARE', 99, 'box', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-09 06:02:49', '2024-10-09 06:05:15'),
(179, 'lepto', 'R8 Pharma', '2026-12-20', 11.00, 2500.00, 'Available', 'A PET CARE', 97, 'box', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-09 06:03:36', '2024-10-12 02:43:09'),
(180, 'Epoetin Alfa', 'Ma. concepcion Miralles', '2026-12-12', 1.00, 1790.00, 'Available', 'EPOTIN', 99, 'box', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-09 06:58:53', '2024-10-09 07:35:15'),
(181, 'Furosemide', 'Ma. concepcion Miralles', '2026-12-26', 1.00, 180.00, 'Available', 'Veterinary Diagnostics', 97, '10\'s', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-09 07:01:11', '2024-10-09 07:35:15'),
(182, 'pimobendan', 'Ma. concepcion Miralles', '2026-09-23', 1.00, 5800.00, 'Available', 'Oral', 99, '5mg', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-09 07:06:22', '2024-10-09 07:15:16'),
(183, 'Cefazolin', 'R8 Pharma', '2026-09-30', 1.00, 550.00, 'Available', 'VETOQUINOL', 97, '10\'s', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-09 07:24:23', '2024-10-09 07:35:15'),
(184, 'cdv', 'MAYUMI MEJARITO', '2026-09-23', 1.00, 2500.00, 'Available', 'A PET CARE', 0, 'box', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-10-09 07:39:01', '2024-10-12 03:17:31'),
(185, 'lrs 1L', 'R8 Pharma', '2026-07-20', 1.00, 995.00, 'Available', 'ACCULIFE FLUIDS 1L', 0, 'box', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-10-09 07:41:53', '2024-10-12 02:48:58'),
(186, 'E-Collar #8', 'R8 Pharma', '2026-10-29', 1.00, 75.00, 'Available', 'Pet Accessories', 88, 'xxxs', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-09 07:48:00', '2024-10-09 07:52:34'),
(187, 'E-Collar #9', 'R8 Pharma', '2026-11-21', 1.00, 65.00, 'Available', 'Pet Accessories', 88, 'xxxxs', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-09 07:48:48', '2024-10-09 07:52:34'),
(188, 'cpv', 'DRA . APPLE APPLE', '2026-10-23', 1.00, 2300.00, 'Available', 'A PET CARE', 0, 'box', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-10-09 07:49:58', '2024-10-12 03:15:05'),
(189, 'Cefazolin IV', 'R8 Pharma', '2026-05-29', 1.00, 850.00, 'Available', 'Nex Gard', 99, 'box', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-09 08:31:05', '2024-10-09 08:54:57'),
(190, 'microscope Slide', 'R8 Pharma', '2026-05-20', 1.00, 250.00, 'Available', 'VETOQUINOL', 99, 'box', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-09 08:32:42', '2024-10-09 08:54:57'),
(191, 'Cover Slip', 'DRA . APPLE APPLE', '2026-11-12', 1.00, 110.00, 'Available', 'Pet Accessories', 99, 'box', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-09 08:35:35', '2024-10-09 08:54:57'),
(192, 'Potassiumm Chloride', 'R8 Pharma', '2026-09-21', 1.00, 83.00, 'Available', 'Prednisolone Injectable', 80, 'ampule', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-09 08:39:56', '2024-10-09 08:54:57'),
(193, 'metapyrone', 'DRA . APPLE APPLE', '2026-08-29', 1.00, 950.00, 'Available', 'Prednisolone Injectable', 99, 'bottle', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-09 08:43:25', '2024-10-09 08:54:57'),
(194, 'diazepam', 'DRA. Carol Belandres', '2026-09-20', 1.00, 1300.00, 'Available', 'VALIUM', 995, 'ampule', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-09 08:50:42', '2024-10-09 08:54:57'),
(195, 'Cannula G24 Yellow', 'R8 Pharma', '2026-09-11', 1.00, 1800.00, 'Available', 'SURGITECH', 99, 'box 100\'s', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-09 09:03:15', '2024-10-09 09:06:24'),
(196, 'Rabies', 'R8 Pharma', '2027-01-29', 1.00, 2500.00, 'Available', 'A PET CARE', 99, 'box', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-09 09:11:35', '2024-10-09 09:19:29'),
(197, 'FIV/FELV', 'R8 Pharma', '2026-08-08', 1.00, 3500.00, 'Available', 'A PET CARE', 99, 'box', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-09 09:12:42', '2024-10-09 09:19:29'),
(198, 'CPV/CCV/SIA', 'R8 Pharma', '2026-07-09', 1.00, 3800.00, 'Available', 'A PET CARE', 99, 'box', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-09 09:14:39', '2024-10-09 09:19:29'),
(199, 'FPV/FCOV/GIA', 'R8 Pharma', '2026-12-20', 1.00, 4900.00, 'Available', 'A PET CARE', 99, 'box', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-09 09:15:42', '2024-10-09 09:19:29'),
(200, 'FPV/FCOV/FCV/FHV', 'R8 Pharma', '2026-04-27', 1.00, 4595.00, 'Available', 'A PET CARE', 99, 'box', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-09 09:16:58', '2024-10-09 09:19:29'),
(201, 'Lepto', 'R8 Pharma', '2026-07-26', 1.00, 4600.00, 'Available', 'A PET CARE', 99, 'box', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-09 09:34:57', '2024-10-09 09:39:12'),
(202, 'Cdv', 'R8 Pharma', '2026-08-24', 1.00, 1850.00, 'Available', 'A PET CARE', 99, 'box', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-09 09:37:17', '2024-10-09 09:39:12'),
(203, 'Tobrasone', 'R8 Pharma', '2026-09-12', 1.00, 130.00, 'Available', 'Ophtalmoligicals', 76, 'bottle', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-09 09:40:53', '2024-10-09 09:44:06'),
(204, 'GIA', 'R8 Pharma', '2026-09-18', 1.00, 2400.00, 'Available', 'A PET CARE', 99, 'box', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-09 09:47:29', '2024-10-09 09:49:33'),
(205, 'Epinephrine', 'R8 Pharma', '2026-06-28', 1.00, 380.00, 'Available', 'Prednisolone Injectable', 99, 'box', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-09 09:54:44', '2024-10-09 10:00:48'),
(206, 'Co-amoxiclav', 'R8 Pharma', '2026-10-01', 1.00, 140.00, 'Available', 'Prednisolone Injectable', 0, 'bottle', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-09 09:57:41', '2024-10-09 10:00:48'),
(207, 'Stainless Dog Bowl 12', 'TERE EMBILE', '2026-07-29', 1.00, 55.00, 'Available', 'Pet Accessories', 95, 'pcs', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-10 01:53:56', '2024-10-10 02:04:53'),
(208, 'Stainless Dog Bowl 16', 'TERE EMBILE', '2027-05-20', 1.00, 65.00, 'Available', 'Pet Accessories', 95, 'pcs', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-10 01:54:57', '2024-10-10 02:04:53'),
(209, 'Stainless Dog Bowl 20', 'TERE EMBILE', '2026-08-21', 1.00, 85.00, 'Available', 'Pet Accessories', 95, 'pcs', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-10 01:56:04', '2024-10-10 02:04:53'),
(210, 'Stainless Dog Bowl 24', 'TERE EMBILE', '2026-06-18', 1.00, 95.00, 'Available', 'Pet Accessories', 95, 'pcs', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-10 01:56:56', '2024-10-10 02:04:53'),
(211, 'Syringe 3ml', 'R8 Pharma', '2026-09-21', 1.00, 295.00, 'Available', 'SURGITECH', 994, '3ml/box', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-10 02:10:17', '2024-10-10 02:12:55'),
(212, 'micro edta Tube', 'Ma. concepcion Miralles', '2026-08-20', 1.00, 580.00, 'Available', 'SURGITECH', 0, 'trays', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-10-10 02:21:43', '2024-10-12 03:35:25'),
(213, 'immunol syrup', 'MAYUMI MEJARITO', '2026-09-28', 1.00, 480.00, 'Available', 'HIMALAYA PRODUCTS', 990, '10ml', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-10 02:31:17', '2024-10-10 02:35:20'),
(214, 'Inflacan', 'R8 Pharma', '2026-02-20', 1.00, 395.00, 'Available', 'VETOQUINOL', 997, '10ml', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-10 02:34:52', '2024-10-10 02:35:20'),
(215, 'Theotears', 'DRA . APPLE APPLE', '2026-01-01', 1.00, 410.00, 'Available', 'FRONTLINE PLUS', 976, 'pcs', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-10 02:38:12', '2024-10-10 02:42:10'),
(216, 'Dog Male Diapers', 'R8 Pharma', '2026-01-02', 1.00, 165.00, 'Available', 'Pet Accessories', 942, 'all sizes', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-10 02:44:55', '2024-10-10 03:07:19'),
(217, 'Dog Female Diapers', 'R8 Pharma', '2027-01-03', 1.00, 188.00, 'Available', 'Pet Accessories', 948, 'all sizes', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-10 02:45:49', '2024-10-10 03:07:19'),
(218, 'Collar Leash S', 'R8 Pharma', '2024-01-04', 1.00, 85.00, 'Available', 'Pet Accessories', 976, 'S', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-10 02:46:48', '2024-10-10 03:24:50'),
(219, 'Collar Leash M', 'R8 Pharma', '2027-01-01', 1.00, 95.00, 'Available', 'Pet Accessories', 976, 'M', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-10 02:47:38', '2024-10-10 03:24:50'),
(220, 'Collar Leash L', 'R8 Pharma', '2027-01-01', 1.00, 95.00, 'Available', 'Pet Accessories', 0, 'L', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-10-10 02:48:19', '2024-10-10 03:27:20'),
(221, 'Leash With Body', 'R8 Pharma', '2027-01-01', 1.00, 85.00, 'Available', 'Pet Accessories', 988, 'S', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-10 02:49:45', '2024-10-10 03:01:35'),
(222, 'Leash With Body', 'R8 Pharma', '2026-01-01', 1.00, 95.00, 'Available', 'Pet Accessories', 988, 'M', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-10 02:50:29', '2024-10-10 03:01:35'),
(223, 'Leash With Body', 'R8 Pharma', '2026-01-01', 1.00, 115.00, 'Available', 'Pet Accessories', 988, 'L', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-10 02:51:04', '2024-10-10 03:01:35'),
(224, 'Leash With Body', 'R8 Pharma', '2026-01-01', 1.00, 120.00, 'Available', 'Pet Accessories', 988, 'XL', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-10 02:51:45', '2024-10-10 03:01:35'),
(225, 'Leash With Harnes S', 'R8 Pharma', '2026-01-01', 1.00, 120.00, 'Available', 'Pet Accessories', 988, 'pcs', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-10-10 03:14:38', '2024-10-10 03:24:50'),
(226, 'Leash With Harnes M', 'R8 Pharma', '2026-01-01', 1.00, 150.00, 'Available', 'Pet Accessories', 988, 'pcs', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-10-10 03:15:14', '2024-10-10 03:24:50'),
(227, 'Leash With Harnes L', 'R8 Pharma', '2026-01-01', 1.00, 170.00, 'Available', 'Pet Accessories', 988, 'pcs', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-10 03:16:18', '2024-10-10 03:24:50'),
(228, 'Leash With Harnes XL', 'R8 Pharma', '2026-01-01', 1.00, 240.00, 'Available', 'Pet Accessories', 988, 'pcs', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-10-10 03:16:50', '2024-10-10 03:24:50'),
(229, 'Collar Leash L', 'R8 Pharma', '2026-01-01', 1.00, 105.00, 'Available', 'Pet Accessories', 988, 'pcs', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-10 03:24:07', '2024-10-10 03:24:50'),
(230, '3cc', 'R8 Pharma', '2026-04-20', 1.00, 295.00, 'Available', 'Prednisolone Injectable', 0, 'box', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-10-10 03:33:14', '2024-10-10 03:46:15'),
(231, '1cc', 'R8 Pharma', '2026-06-28', 1.00, 250.00, 'Available', 'Prednisolone Injectable', 0, 'box', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-10-10 03:34:40', '2024-10-10 03:45:02'),
(232, 'IV Line pedia', 'R8 Pharma', '2026-10-02', 1.00, 25.00, 'Available', 'Prednisolone Injectable', 804, 'bottle', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-10 03:37:50', '2024-10-12 03:29:41'),
(233, 'Med Gloves', 'R8 Pharma', '2026-01-01', 1.00, 250.00, 'Available', 'Pet Accessories', 991, 'box', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-10 03:41:49', '2024-10-10 04:13:38'),
(234, 'Small Gloves', 'R8 Pharma', '2026-01-01', 1.00, 250.00, 'Available', 'Pet Accessories', 995, 'box', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-10 03:42:27', '2024-10-10 04:13:38'),
(235, '1cc', 'R8 Pharma', '2026-06-27', 1.00, 230.00, 'Available', 'Prednisolone Injectable', 0, 'box', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-10-10 03:45:57', '2024-10-11 01:20:07'),
(236, '3cc', 'R8 Pharma', '2026-01-01', 1.00, 250.00, 'Available', 'Prednisolone Injectable', 0, 'box', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-10-10 03:46:59', '2024-10-11 01:20:23'),
(237, 'Surgical Blade', 'R8 Pharma', '2026-01-01', 1.00, 395.00, 'Available', 'SURGITECH', 998, 'pack', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-10 03:48:49', '2024-10-10 03:50:28'),
(238, 'IV Line Aduh', 'R8 Pharma', '2026-01-01', 1.00, 25.00, 'Available', 'Prednisolone Injectable', 965, 'pcs', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-10 04:09:29', '2024-10-12 07:01:37'),
(239, 'Alcohol Guardian', 'R8 Pharma', '2026-01-01', 1.00, 450.00, 'Available', 'Pet Accessories', 999, 'gallon', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-10 04:11:31', '2024-10-10 04:13:38'),
(240, 'Diphenhydramine Ampule', 'R8 Pharma', '2026-06-20', 1.00, 550.00, 'Available', 'Prednisolone Injectable', 999, '10\'s', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-10 04:17:10', '2024-10-10 04:39:14'),
(241, 'Chromic Cutting 2.0', 'R8 Pharma', '2026-11-11', 1.00, 350.00, 'Available', 'SURGITECH', 999, '12\'s', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-10 04:21:25', '2024-10-10 04:39:14'),
(242, 'Chromic Cutting 3.0', 'DRA . APPLE APPLE', '2026-11-15', 1.00, 350.00, 'Available', 'SURGITECH', 999, '12\'s', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-10 04:22:01', '2024-10-10 04:39:14'),
(243, 'Nylon 3.0 Cuting', 'R8 Pharma', '2026-01-01', 1.00, 350.00, 'Available', 'Prednisolone Injectable', 995, 'box', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-11 01:19:28', '2024-10-11 01:24:49'),
(244, '1cc', 'R8 Pharma', '2026-01-01', 1.00, 250.00, 'Available', 'Prednisolone Injectable', 985, 'box', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-11 01:21:41', '2024-10-11 06:19:15'),
(245, '3cc', 'R8 Pharma', '2026-01-12', 1.00, 295.00, 'Available', 'Prednisolone Injectable', 990, 'box', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-11 01:22:34', '2024-10-11 01:24:49'),
(246, 'lrs 1l', 'R8 Pharma', '2026-05-19', 1.00, 795.00, 'Available', 'ACCULIFE FLUIDS 1L', 0, 'box', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-11 01:33:55', '2024-10-11 01:36:31'),
(247, 'd5lr 1l', 'R8 Pharma', '2027-01-27', 1.00, 795.00, 'Available', 'ACCULIFE FLUIDS 1L', 0, 'boox', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-11 01:34:41', '2024-10-11 01:36:31'),
(248, '4 Way Cat', 'R8 Pharma', '2026-01-01', 1.00, 5300.00, 'Available', 'Pet Accessories', 0, 'box', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-11 01:37:48', '2024-10-11 01:39:52'),
(249, 'Syringe 1ml indo', 'R8 Pharma', '2026-09-11', 1.00, 230.00, 'Available', 'INDOPLAS', 20, 'box', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-11 01:43:39', '2024-10-11 01:43:39'),
(250, 'Syringe 3ml', 'R8 Pharma', '2026-01-01', 1.00, 230.00, 'Available', 'Prednisolone Injectable', 0, 'box', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-11 04:46:26', '2024-10-11 04:54:07'),
(251, 'septoryl', 'R8 Pharma', '2026-09-13', 1.00, 1095.00, 'Available', 'Veterinary Diagnostics', 0, '500ml', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-10-11 04:50:23', '2024-10-11 04:54:07'),
(252, 'pnss 1l', 'R8 Pharma', '2027-01-01', 1.00, 995.00, 'Available', 'ACCULIFE FLUIDS 1L', 0, 'box', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-11 06:05:29', '2024-10-11 06:19:15'),
(253, 'ehr| Ana| Bab| lep', 'ANTHONY JPM', '2026-09-26', 1.00, 4595.00, 'Available', 'A PET CARE', 100, 'box', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-11 06:07:43', '2024-10-11 06:07:43'),
(254, 'IV line pedia', 'R8 Pharma', '2026-01-12', 1.00, 30.00, 'Available', 'Prednisolone Injectable', 0, 'pcs', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-11 06:21:42', '2024-10-11 06:29:07'),
(255, 'IV line aduh', 'R8 Pharma', '2026-01-01', 1.00, 35.00, 'Available', 'Prednisolone Injectable', 0, 'pcs', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-11 06:23:21', '2024-10-11 06:29:07'),
(256, 'Co-amoxiclav 312.5mg', 'R8 Pharma', '2026-09-17', 1.00, 120.00, 'Available', 'Oral', 0, 'bottle', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-11 06:24:55', '2024-10-11 06:29:07'),
(257, 'micropore linch', 'R8 Pharma', '2026-05-14', 1.00, 450.00, 'Available', 'SURGITECH', 7, 'box', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-10-11 06:34:40', '2024-10-11 06:40:33'),
(258, 'Under Pads', 'R8 Pharma', '2026-08-11', 1.00, 150.00, 'Available', 'SURGITECH', 10, 'pack', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-10-11 06:36:11', '2024-10-11 06:49:37'),
(259, '1CC', 'R8 Pharma', '2026-01-01', 1.00, 230.00, 'Available', 'SURGITECH', 0, 'box', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-11 06:37:25', '2024-10-11 06:40:33'),
(260, '3CC', 'R8 Pharma', '2026-09-11', 1.00, 250.00, 'Available', 'SURGITECH', 0, 'box', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-11 06:38:01', '2024-10-11 06:40:33'),
(261, 'cardinal Syringe', 'R8 Pharma', '2026-07-17', 1.00, 250.00, 'Available', 'SURGITECH', 10, 'box', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-11 06:42:43', '2024-10-11 06:49:37'),
(262, 'Polyglactin', 'R8 Pharma', '2026-09-07', 1.00, 1150.00, 'Available', 'SURGITECH', 46, 'box', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-10-11 07:57:33', '2024-10-12 03:23:30'),
(263, 'IV line pedia', 'R8 Pharma', '2026-01-01', 1.00, 23.00, 'Available', 'Prednisolone Injectable', 0, 'pcs', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-11 08:04:42', '2024-10-11 08:12:57'),
(264, 'Isoprenosine syrup', 'R8 Pharma', '2026-06-05', 1.00, 370.00, 'Available', 'Oral', 90, 'bottle', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-10-11 08:06:28', '2024-10-12 03:40:50'),
(265, 'Pimobendan', 'R8 Pharma', '2026-06-18', 11.00, 5200.00, 'Available', 'Oral', 0, 'box', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-11 08:08:20', '2024-10-11 08:12:57'),
(266, 'Micropore linch', 'R8 Pharma', '2026-08-29', 1.00, 650.00, 'Available', 'SURGITECH', 0, 'box', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-11 08:10:21', '2024-10-11 08:12:57'),
(267, 'Cefalexin Sus', 'R8 Pharma', '2026-06-02', 1.00, 55.00, 'Available', 'Oral', 90, '250mg/60ml', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-11 08:15:04', '2024-10-11 08:30:24'),
(268, 'Co-Amoxiclav 156.25', 'R8 Pharma', '2026-07-19', 1.00, 150.00, 'Available', 'Oral', 10, 'bottle', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-11 08:18:12', '2024-10-11 08:30:24'),
(269, 'Epinephrine amps', 'R8 Pharma', '2026-11-01', 1.00, 395.00, 'Available', 'Prednisolone Injectable', 9, 'box', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-11 08:21:07', '2024-10-11 08:30:24'),
(270, 'freight', 'JONATHAN CALUMBITAY', '2026-01-01', 1.00, 847.00, 'Available', 'No brand', 0, '1', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-11 08:29:50', '2024-10-11 08:30:24'),
(271, 'Ornipural', 'Ma. concepcion Miralles', '2027-10-11', 860.00, 960.00, 'Available', 'VETOQUINOL', 198, '100ml', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-10-11 12:22:23', '2024-10-12 04:01:03'),
(272, 'Coforta', 'Ma. concepcion Miralles', '2026-10-11', 860.00, 1050.00, 'Available', 'VETOQUINOL', 190, '100ml', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-10-11 12:26:40', '2024-10-12 03:13:54'),
(273, 'Coforta-980', 'Ma. concepcion Miralles', '2026-10-11', 860.00, 980.00, 'Available', 'VETOQUINOL', 10, '100ml', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-11 12:26:58', '2024-10-11 12:26:58'),
(274, 'Dog Catheter', 'MAYUMI MEJARITO', '2028-10-31', 170.00, 280.00, 'Available', 'A PET CARE', 388, '2.0', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-10-12 00:25:29', '2024-10-12 04:01:03'),
(275, 'Scheron', 'R8 Pharma', '2027-10-01', 1.00, 1400.00, 'Available', 'Prednisolone Injectable', 3, 'set', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-12 00:39:02', '2024-10-12 00:46:02'),
(276, 'Scalpel Blade', 'R8 Pharma', '2026-01-01', 1.00, 380.00, 'Available', 'Prednisolone Injectable', 2, 'box', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-12 00:40:24', '2024-10-12 00:46:02'),
(277, 'med gloves', 'R8 Pharma', '2026-01-01', 1.00, 230.00, 'Available', 'Prednisolone Injectable', 0, 'box', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-12 00:41:24', '2024-10-12 00:46:02');
INSERT INTO `products` (`id`, `product_name`, `supplier_name`, `expiration_date`, `original_price`, `selling_price`, `status`, `brand_name`, `quantity`, `unit`, `created_by`, `updated_by`, `created_id`, `created_at`, `updated_at`) VALUES
(278, 'Isoprenosine', 'R8 Pharma', '2026-02-16', 1.00, 380.00, 'Available', 'Oral', 0, 'bottle', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-12 01:21:34', '2024-10-12 01:49:54'),
(279, 'Metronidazole Vials', 'Ma. concepcion Miralles', '2026-03-11', 1.00, 80.00, 'Available', 'Oral', 5, 'vials', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-12 01:24:12', '2024-10-12 01:49:54'),
(280, 'Amikacin IV', 'R8 Pharma', '2026-09-07', 1.00, 95.00, 'Available', 'Veterinary Diagnostics', 5, 'vials', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-12 01:40:22', '2024-10-12 01:49:54'),
(281, 'Amelyte C', 'R8 Pharma', '2026-07-16', 1.00, 1850.00, 'Available', 'VALIUM', 2, 'bottle', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-12 01:42:54', '2024-10-12 01:49:54'),
(282, 'Vanguara 6in1 Vaccines', 'R8 Pharma', '2026-06-12', 1.00, 250.00, 'Available', 'Prednisolone Injectable', 5, 'pcs', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-12 01:44:54', '2024-10-12 01:49:54'),
(283, 'Vanguara 8in1 Vaccines', 'R8 Pharma', '2026-04-15', 1.00, 268.00, 'Available', 'Prednisolone Injectable', 5, 'pcs', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-10-12 01:46:03', '2024-10-12 01:49:54'),
(284, 'Recombitek 5in1', 'R8 Pharma', '2026-09-10', 1.00, 275.00, 'Available', 'Ektek pharma', 5, 'vials', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-10-12 01:52:27', '2024-10-12 02:02:23'),
(285, 'Recombitek 8in1', 'R8 Pharma', '2026-08-17', 1.00, 298.00, 'Available', 'Ektek pharma', 475, 'vials', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-10-12 01:53:41', '2024-10-12 07:23:37'),
(286, 'Anti Rabies 10 dose', 'R8 Pharma', '2026-04-17', 1.00, 360.00, 'Available', 'Prednisolone Injectable', 40, 'bottle', 'MARGIE CAMBONGGA', 'MARGIE CAMBONGGA', 2, '2024-10-12 01:56:24', '2024-10-12 07:23:37'),
(287, '4in1 Vaccines', 'R8 Pharma', '2027-01-02', 1.00, 590.00, 'Available', 'Prednisolone Injectable', 0, 'trays', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-12 01:58:00', '2024-10-12 02:02:23'),
(288, 'Cat Catheter', 'Mactycoon supplies', '2026-01-20', 1.00, 280.00, 'Available', 'Cathy', 98, '10\'s', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-12 02:23:33', '2024-10-12 02:52:57'),
(289, 'LRS Euromed', 'R8 Pharma', '2026-01-02', 1.00, 995.00, 'Available', 'EUROMED FLUIDS', 8, 'box', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-12 02:50:47', '2024-10-12 05:05:42'),
(290, 'Fluconazole', 'R8 Pharma', '2026-09-21', 1.00, 28.00, 'Available', 'Oral', 50, 'tabs', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-12 03:00:32', '2024-10-12 03:04:36'),
(291, 'CPV', 'R8 Pharma', '2026-09-21', 1.00, 1400.00, 'Available', 'A PET CARE', 5, 'box', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-12 03:16:38', '2024-10-12 03:20:32'),
(292, 'CDV', 'R8 Pharma', '2026-01-20', 1.00, 1500.00, 'Available', 'A PET CARE', 0, 'box', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-12 03:18:24', '2024-10-12 03:20:32'),
(293, 'Scrub Suite Green', 'R8 Pharma', '2026-02-19', 1.00, 550.00, 'Available', 'SURGITECH', 3, 'set', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-12 03:25:37', '2024-10-12 03:29:41'),
(294, 'Fusedine', 'R8 Pharma', '2026-01-29', 1.00, 150.00, 'Available', 'SURGITECH', 10, 'pcs', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-12 03:27:11', '2024-10-12 03:29:41'),
(295, 'Hypromellose', 'R8 Pharma', '2026-08-16', 1.00, 110.00, 'Available', 'Ophtalmoligicals', 76, 'pcs', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-12 03:34:07', '2024-10-12 03:40:50'),
(296, 'Micro Beparine', 'R8 Pharma', '2026-01-04', 1.00, 850.00, 'Available', 'Oral', 8, 'trays', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-12 03:37:13', '2024-10-12 03:40:50'),
(297, 'micro edta 0.5ml', 'R8 Pharma', '2027-02-21', 1.00, 450.00, 'Available', 'Oral', 8, 'trays', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-12 03:38:22', '2024-10-12 03:40:50'),
(298, 'PNSS 1L', 'GMED PHARMA', '2026-01-20', 1.00, 995.00, 'Available', 'EUROMED FLUIDS', 9, 'box', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-12 03:49:41', '2024-10-12 04:01:03'),
(299, 'aliviar', 'Doc. Cris lao', '2026-09-29', 1.00, 300.00, 'Available', 'New Leaf', 0, 'pcs', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-12 03:53:58', '2024-10-12 04:01:03'),
(300, 'Liv.52 Forte', 'MAYUMI MEJARITO', '2026-03-17', 1.00, 365.00, 'Available', 'HIMALAYA PRODUCTS', 0, 'tabs', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-12 04:48:11', '2024-10-12 04:57:35'),
(301, 'wormrev', 'MAYUMI MEJARITO', '2026-09-04', 1.00, 1350.00, 'Available', 'HIMALAYA PRODUCTS', 5, 'tabs', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-12 04:53:00', '2024-10-12 04:57:35'),
(302, 'enalapril', 'R8 Pharma', '2026-09-18', 1.00, 680.00, 'Available', 'REWITEYL', 0, 'box', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-12 05:03:44', '2024-10-12 05:05:42'),
(303, 'amnidarone amps', 'MAYUMI MEJARITO', '2026-06-18', 1.00, 380.00, 'Available', 'HIMALAYA PRODUCTS', 0, 'ampule', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-12 05:10:09', '2024-10-12 05:26:12'),
(304, 'Metropramide', 'MAYUMI MEJARITO', '2026-06-25', 1.00, 380.00, 'Available', 'Oral', 0, 'box', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-12 05:21:47', '2024-10-12 05:26:12'),
(305, 'B-complex', 'R8 Pharma', '2026-09-19', 1.00, 280.00, 'Available', 'Veterinary Diagnostics', 5, 'box', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-12 05:24:11', '2024-10-12 05:26:12'),
(306, 'B-complex', 'R8 Pharma', '2026-09-19', 1.00, 280.00, 'Available', 'Veterinary Diagnostics', 15, 'box', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-12 05:24:11', '2024-10-12 05:24:11'),
(307, 'Isoprenosine Syrup', 'R8 Pharma', '2026-07-24', 1.00, 380.00, 'Available', 'Oral', 370, 'bottle', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-12 06:53:04', '2024-10-12 07:01:37'),
(308, 'Ultrasound Gel', 'R8 Pharma', '2026-01-01', 1.00, 850.00, 'Available', 'SURGITECH', 9, 'gallon', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-12 06:57:14', '2024-10-12 07:01:37'),
(309, 'nova folha', 'R8 Pharma', '2026-01-22', 1.00, 495.00, 'Available', 'New Leaf', 0, 'bottle', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-12 06:58:35', '2024-10-12 07:01:37'),
(310, 'Recombitek 6in1', 'R8 Pharma', '2026-09-21', 1.00, 279.00, 'Available', 'Ektek pharma', 450, 'pcs', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-12 07:04:44', '2024-10-12 07:23:37'),
(311, 'recombitek 5in1', 'R8 Pharma', '2027-01-01', 1.00, 216.00, 'Available', 'Ektek pharma', 0, 'pcs', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-12 07:07:01', '2024-10-12 07:23:37'),
(312, 'Metoclopramide Syrup', 'R8 Pharma', '2026-04-18', 1.00, 65.00, 'Available', 'METO', 27, 'bottle', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-12 07:08:14', '2024-10-12 07:23:37'),
(313, 'Metoclopramide Amps', 'R8 Pharma', '2026-02-15', 1.00, 380.00, 'Available', 'METO', 47, 'bottle', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-12 07:10:55', '2024-10-12 07:23:37'),
(314, 'Liv.52 tabs', 'MAYUMI MEJARITO', '2026-02-17', 1.00, 375.00, 'Available', 'HIMALAYA PRODUCTS', 0, 'bottle', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-12 07:12:05', '2024-10-12 07:23:37'),
(315, 'Vicryl 1.0 Cutting', 'R8 Pharma', '2027-01-01', 1.00, 4600.00, 'Available', 'SURGITECH', 100, 'bottle', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-12 07:35:30', '2024-10-12 07:35:30');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `created_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `fname`, `lname`, `company`, `gender`, `contact_no`, `address`, `created_by`, `updated_by`, `created_id`, `created_at`, `updated_at`) VALUES
(11, 'DRA . APPLE', 'APPLE', 'FLUPPYMED', 'Female', '09209563109', 'appledelacruz@gmail.com', 'MARGIE CAMBONGGA', NULL, 2, '2024-09-26 21:44:51', '2024-09-26 21:44:51'),
(12, 'Ma. concepcion', 'Miralles', 'AV TRADING', 'Female', '09150064599', 'Rosas st. Markina Citry NCR', 'MARGIE CAMBONGGA', NULL, 2, '2024-09-28 01:49:25', '2024-09-28 01:49:25'),
(13, 'MAYUMI', 'MEJARITO', 'HARU AND FURIENDS', 'Select Gender', '09398747458', 'METRO MANILA', 'MARGIE CAMBONGGA', NULL, 2, '2024-09-28 01:51:23', '2024-09-28 01:51:23'),
(14, 'JONATHAN', 'CALUMBITAY', 'GINGER PET SUPPLIES', 'Male', '09165057231', 'MARIKINA', 'MARGIE CAMBONGGA', NULL, 2, '2024-09-28 01:53:18', '2024-09-28 01:53:18'),
(15, 'ANTHONY', 'JPM', 'JPM', 'Male', '09636998205', 'METRO MANILA', 'MARGIE CAMBONGGA', NULL, 2, '2024-09-28 09:12:12', '2024-09-28 09:12:12'),
(16, 'TERE', 'EMBILE', 'PHYLUM PRODUCTS INC.,', 'Female', '09171207812', 'QUEZON CITY', 'MARGIE CAMBONGGA', NULL, 2, '2024-09-28 09:44:07', '2024-09-28 09:44:07'),
(17, 'Ro-an', 'GELIAN', 'RO-AN VET', 'Female', '09079903247', 'Pangasinan', 'MARGIE CAMBONGGA', NULL, 2, '2024-09-28 11:05:46', '2024-09-28 11:05:46'),
(18, 'pet Homie', 'chichi', 'pet homie', 'Female', '09278415736', 'Metro Manila', 'MARGIE CAMBONGGA', NULL, 2, '2024-09-28 12:44:37', '2024-09-28 12:44:37'),
(19, 'Online', 'Pasig', 'Orex', 'Female', '09278415736', 'Pasig', 'MARGIE CAMBONGGA', NULL, 2, '2024-09-28 13:09:54', '2024-09-28 13:09:54'),
(20, 'vetnoderm', 'vetnoderm soap', 'Vetnoderm', 'Female', '09351296988', 'marikina', 'MARGIE CAMBONGGA', NULL, 2, '2024-09-28 15:20:03', '2024-09-28 15:20:03'),
(21, 'R8', 'Pharma', 'r8 pharmaceuticals', 'Female', '09278415736', 'manila', 'MARGIE CAMBONGGA', NULL, 2, '2024-09-29 01:51:27', '2024-09-29 01:51:27'),
(22, 'Doc. Cris', 'lao', 'New Leaf', 'Female', '09', 'cavite', 'MARGIE CAMBONGGA', NULL, 2, '2024-09-29 02:26:36', '2024-09-29 02:26:36'),
(23, 'Celso', 'Raymjo', 'raymjo', 'Male', '09', 'manila', 'MARGIE CAMBONGGA', NULL, 2, '2024-09-29 03:17:31', '2024-09-29 03:17:31'),
(24, 'Polymed', 'supplier Roxy', 'Polymed Medical Supplies', 'Female', '09213669781', 'cambonggamargie8@gmail.com', 'MARGIE CAMBONGGA', NULL, 2, '2024-09-30 08:38:54', '2024-09-30 08:38:54'),
(25, 'Michelle', 'Lim', 'J&E', 'Female', '09', 'Bacoor Cavite', 'MARGIE CAMBONGGA', NULL, 2, '2024-09-30 08:53:52', '2024-09-30 08:53:52'),
(26, 'Mactycoon', 'supplies', 'MACTYCON', 'Female', '09', 'Metro Manila', 'MARGIE CAMBONGGA', NULL, 2, '2024-09-30 12:21:51', '2024-09-30 12:21:51'),
(27, 'Best Care', 'Pharma', 'Best care  pharma and medical supplies', 'Male', '09', 'Metro Manila', 'MARGIE CAMBONGGA', NULL, 2, '2024-09-30 12:34:04', '2024-09-30 12:34:04'),
(28, 'DRA. Carol', 'Belandres', 'Vetterhealth', 'Female', '09', 'Cavite', 'MARGIE CAMBONGGA', NULL, 2, '2024-09-30 12:41:48', '2024-09-30 12:41:48'),
(29, 'GMED', 'PHARMA', 'GMED PHARMA', 'Male', '09', 'METRO MANILA', 'MARGIE CAMBONGGA', NULL, 2, '2024-09-30 14:04:55', '2024-09-30 14:04:55'),
(30, 'Jonnave', 'Veko', 'Veko products', 'Female', '09', 'metro manila', 'MARGIE CAMBONGGA', NULL, 2, '2024-09-30 15:46:01', '2024-09-30 15:46:01'),
(31, 'Metrogen', 'Pharma', 'Metrogen Pharmaceuticals', 'Male', '09', 'Metro Manila', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-01 08:41:36', '2024-10-01 08:41:36'),
(32, 'Daswani', 'Latchman', 'Daswani Ophtalmologist', 'Male', '09', 'Metro Manila', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-01 08:48:09', '2024-10-01 08:48:09'),
(33, 'Triple', '888', 'Triple888 Pharmaceuticals', 'Male', '09', 'Metro Manila', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-01 08:54:03', '2024-10-01 08:54:03'),
(34, 'Crossmed', 'Pharmaceuticals', 'Crossmed Pharmaceuticals Inc.', 'Female', '09', 'Metro Manaila', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-01 09:06:49', '2024-10-01 09:06:49'),
(35, 'AV VETERINARY', 'PRODUCTS TRADING', 'AV VETERINARY PRODUCTS TRADING', 'Male', '09958803022', 'Marikina City', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-04 02:28:57', '2024-10-04 02:28:57'),
(36, 'Healthwinds', 'supplier', 'Healthwinds', 'Female', '09', 'Pasig', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-05 14:26:01', '2024-10-05 14:26:01'),
(37, 'PHYLUM', 'PRODUCTS INC.', 'PHYLUM PRODUCT INC.', 'Male', '09', 'QUEZON CITY', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-07 02:59:59', '2024-10-07 02:59:59'),
(38, 'Haru and Furiends Veterinary', 'Products Trading', 'Haru and Furiends Veterinary Products Trading', 'Male', '09', 'City of Manila', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-07 05:46:34', '2024-10-07 05:46:34'),
(39, 'Anchor', 'Medihub', 'Anchor Medihub', 'Male', '09', 'Rizal Avenue', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-07 06:25:58', '2024-10-07 06:25:58'),
(40, 'Mart and Drug', 'Convenience Store Inc.', 'Mart and Drug Convenience Store Inc.', 'Male', '099', 'Rizal Avenue', 'MARGIE CAMBONGGA', NULL, 2, '2024-10-07 06:32:01', '2024-10-07 06:32:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `code` int(11) NOT NULL,
  `role` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `gender`, `code`, `role`, `status`, `fullname`, `created_by`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Rein June', 'Laride', 'Male', 904385, 'Admin', 'Active', 'REIN JUNE LARIDE', 'REIN JUNE LARIDE', 'reinjunelaride34@gmail.com', NULL, '$2y$10$8FCebIWWxVMxeLqIf7.E4OOUDFtphtkGV3ImM/2s7P50KNGKS1GfG', 'K29jU46ZcG0gCelQ3ypKPJnM9zCbn5OYjOF4exW23E7moVKtbbwcmiXsqW0f', '2024-09-24 19:31:00', '2024-09-24 19:31:00'),
(2, 'Margie', 'Cambongga', 'Female', 904385, 'Admin', 'Active', 'MARGIE CAMBONGGA', 'REIN JUNE LARIDE', 'eaglesmedpetsuppliestrading22@gmail.com', NULL, '$2y$10$5l8fb8J7fHrfzFjoKXIuQORGg2TYqeCOak8o4yScYRbuD82JhZ/Gi', NULL, '2024-09-24 19:32:10', '2024-09-24 19:32:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clinics`
--
ALTER TABLE `clinics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `freebies`
--
ALTER TABLE `freebies`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
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
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `clinics`
--
ALTER TABLE `clinics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `freebies`
--
ALTER TABLE `freebies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=339;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=316;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
