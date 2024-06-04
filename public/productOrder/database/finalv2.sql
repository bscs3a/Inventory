-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2024 at 05:24 PM
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
-- Database: `bscs3a`
--
CREATE DATABASE IF NOT EXISTS `bscs3a` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bscs3a`;

-- --------------------------------------------------------

--
-- Table structure for table `accounttype`
--

CREATE TABLE `accounttype` (
  `AccountType` int(11) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `grouptype` varchar(2) NOT NULL,
  `XactTypeCode` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounttype`
--

INSERT INTO `accounttype` (`AccountType`, `Description`, `grouptype`, `XactTypeCode`) VALUES
(1, 'Fixed assets', 'AA', 'DR'),
(2, 'Current assets', 'AA', 'DR'),
(3, 'Capital Accounts', 'LE', 'CR'),
(4, 'Accounts Payable', 'LE', 'CR'),
(5, 'Sales', 'IC', 'CR'),
(6, 'Contra-Revenue', 'IC', 'DR'),
(7, 'Direct Expense', 'EP', 'DR'),
(8, 'Indirect Expense', 'EP', 'DR'),
(9, 'Purchases', 'IC', 'DR'),
(10, 'Tax Payable', 'LE', 'Cr'),
(11, 'Retained', 'LE', 'Cr');

-- --------------------------------------------------------

--
-- Table structure for table `account_info`
--

CREATE TABLE `account_info` (
  `id` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('Product Order','Human Resources','Point of Sales','Inventory','Finance','Delivery') NOT NULL,
  `employees_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account_info`
--

INSERT INTO `account_info` (`id`, `username`, `password`, `role`, `employees_id`) VALUES
(1, '123', '$2y$10$8K/6vCFaTj0H6q.qpAnpCOq1X4HxVSHEs7hdgaxd6vn1X8Abu6x1u', 'Finance', 1),
(2, 'bscs3a001', 'bscs3a1HR', 'Human Resources', 1),
(3, 'bscs3a002', 'bscs3a2HR', 'Human Resources', 2),
(4, 'bscs3a003', 'bscs3a3HR', 'Human Resources', 3),
(5, 'bscs3a004', 'bscs3a4HR', 'Human Resources', 4),
(6, 'bscs3a005', 'bscs3a5HR', 'Human Resources', 5),
(7, 'bscs3a006', 'bscs3a1PO', 'Product Order', 6);

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `id` int(10) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `first_name` varchar(30) NOT NULL,
  `middle_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) NOT NULL,
  `dateofbirth` date NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `nationality` varchar(30) NOT NULL,
  `civil_status` enum('Single','Married','Divorced','Widowed') NOT NULL,
  `applyingForDepartment` enum('Product Order','Human Resources','Point of Sales','Inventory','Finance','Delivery') NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_no` varchar(20) DEFAULT 'N/A',
  `email` varchar(30) DEFAULT 'Email not available',
  `applyingForPosition` varchar(30) NOT NULL,
  `apply_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(10) NOT NULL,
  `attendance_date` date NOT NULL,
  `clock_in` varchar(20) NOT NULL,
  `clock_out` varchar(20) DEFAULT NULL,
  `employees_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `audit_log`
--

CREATE TABLE `audit_log` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `action` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `audit_log`
--

INSERT INTO `audit_log` (`id`, `account_id`, `datetime`, `action`) VALUES
(4, 1, '2024-04-03 18:03:10', 'POST: /Finance/fin/getBalanceReport'),
(5, 1, '2024-05-30 18:03:10', 'POST: /Finance/fin/getEquityReport'),
(6, 1, '2024-05-30 18:03:11', 'POST: /Finance/fin/getCashFlowReport'),
(7, 1, '2024-05-30 18:03:11', 'GET: /Finance/fin/ledger/page=1'),
(8, 1, '2024-05-30 18:03:18', 'GET: /Finance/fin/funds/finance/page=1'),
(9, 1, '2024-05-30 18:03:32', 'POST: /Finance/logout'),
(10, 1, '2024-05-30 18:05:09', 'POST: /Finance/fin/getBalanceReport'),
(11, 1, '2024-05-30 18:05:10', 'POST: /Finance/fin/getEquityReport'),
(12, 1, '2024-05-30 18:05:10', 'POST: /Finance/fin/getCashFlowReport'),
(13, 1, '2024-05-30 18:05:11', 'GET: /Finance/fin/ledger/page=1'),
(14, 1, '2024-05-30 18:05:13', 'GET: /Finance/fin/funds/finance/page=1'),
(15, 1, '2024-05-30 18:05:15', 'POST: /Finance/fin/getBalanceReport'),
(16, 1, '2024-05-30 18:05:15', 'POST: /Finance/fin/getEquityReport'),
(17, 1, '2024-05-30 18:05:15', 'POST: /Finance/fin/getCashFlowReport'),
(18, 1, '2024-05-30 18:05:16', 'GET: /Finance/fin/ledger/page=1'),
(19, 1, '2024-05-30 18:05:28', 'GET: /Finance/fin/funds/finance/page=1'),
(20, 1, '2024-05-30 18:06:36', 'GET: /Finance/fin/ledger/page=1'),
(21, 1, '2024-05-30 18:12:36', 'GET: /Finance/fin/ledger/page=1'),
(22, 1, '2024-05-30 18:14:07', 'GET: /Finance/fin/ledger/page=1'),
(23, 1, '2024-05-30 18:15:59', 'GET: /Finance/fin/ledger/page=1'),
(24, 1, '2024-05-30 18:16:38', 'GET: /Finance/fin/ledger/page=1'),
(25, 1, '2024-05-30 18:18:05', 'GET: /Finance/fin/ledger/page=1'),
(26, 1, '2024-05-30 18:18:10', 'GET: /Finance/fin/ledger/page=1'),
(27, 1, '2024-05-30 18:19:44', 'GET: /Finance/fin/ledger/page=1'),
(28, 1, '2024-05-30 18:19:46', 'GET: /Finance/fin/ledger/page=1'),
(29, 1, '2024-05-30 18:20:26', 'GET: /Finance/fin/ledger/page=1'),
(30, 1, '2024-05-30 18:20:34', 'GET: /Finance/fin/ledger/page=1'),
(31, 1, '2024-05-30 18:20:39', 'GET: /Finance/fin/ledger/page=1'),
(32, 1, '2024-05-30 18:21:02', 'GET: /Finance/fin/ledger/page=1'),
(33, 1, '2024-05-30 18:21:26', 'GET: /Finance/fin/ledger/page=1'),
(34, 1, '2024-05-30 18:22:21', 'GET: /Finance/fin/ledger/page=1'),
(35, 1, '2024-05-30 18:22:39', 'GET: /Finance/fin/ledger/page=1'),
(36, 1, '2024-05-30 18:23:24', 'GET: /Finance/fin/ledger/page=1'),
(37, 1, '2024-05-30 18:25:09', 'GET: /Finance/fin/ledger/page=1'),
(38, 1, '2024-05-30 18:25:32', 'GET: /Finance/fin/ledger/page=1'),
(39, 1, '2024-05-30 18:25:45', 'GET: /Finance/fin/ledger/page=1'),
(40, 1, '2024-05-30 18:26:06', 'GET: /Finance/fin/ledger/page=1'),
(41, 1, '2024-05-30 18:27:15', 'GET: /Finance/fin/ledger/page=1'),
(42, 1, '2024-05-30 18:27:42', 'GET: /Finance/fin/ledger/page=1'),
(43, 1, '2024-05-30 18:27:55', 'GET: /Finance/fin/ledger/page=1'),
(44, 1, '2024-05-30 18:28:09', 'GET: /Finance/fin/ledger/page=1'),
(45, 1, '2024-05-30 18:28:37', 'GET: /Finance/fin/ledger/page=1'),
(46, 1, '2024-05-30 18:28:40', 'GET: /Finance/fin/ledger/page=1'),
(47, 1, '2024-05-30 18:28:50', 'GET: /Finance/fin/ledger/page=2'),
(48, 1, '2024-05-30 18:28:51', 'GET: /Finance/fin/ledger/page=3'),
(49, 1, '2024-05-30 18:28:52', 'GET: /Finance/fin/ledger/page=4'),
(50, 1, '2024-05-30 18:28:53', 'GET: /Finance/fin/ledger/page=2'),
(51, 1, '2024-05-30 18:28:54', 'GET: /Finance/fin/ledger/page=1'),
(52, 1, '2024-05-30 18:29:25', 'POST: /Finance/logout'),
(53, 1, '2024-05-31 04:53:55', 'POST: /Finance/fin/getBalanceReport'),
(54, 1, '2024-05-31 04:53:56', 'POST: /Finance/fin/getEquityReport'),
(55, 1, '2024-05-31 04:53:56', 'POST: /Finance/fin/getCashFlowReport'),
(56, 1, '2024-05-31 04:54:34', 'POST: /Finance/fin/getBalanceReport'),
(57, 1, '2024-05-31 04:54:34', 'POST: /Finance/fin/getEquityReport'),
(58, 1, '2024-05-31 04:54:34', 'POST: /Finance/fin/getCashFlowReport'),
(59, 1, '2024-05-31 04:56:09', 'POST: /Finance/logout'),
(60, 1, '2024-05-31 04:56:12', 'POST: /Finance/login'),
(61, 1, '2024-05-31 04:56:12', 'POST: /Finance/fin/getBalanceReport'),
(62, 1, '2024-05-31 04:56:12', 'POST: /Finance/fin/getEquityReport'),
(63, 1, '2024-05-31 04:56:12', 'POST: /Finance/fin/getCashFlowReport'),
(64, 1, '2024-05-31 04:56:32', 'GET: /Finance/fin/ledger/page=1'),
(65, 1, '2024-05-31 05:04:58', 'GET: /Finance/fin/ledger/page=1'),
(66, 1, '2024-05-31 05:05:07', 'GET: /Finance/fin/ledger/page=1'),
(67, 1, '2024-05-31 05:05:15', 'GET: /Finance/fin/ledger/page=1'),
(68, 1, '2024-05-31 05:05:19', 'GET: /Finance/fin/ledger/page=1'),
(69, 1, '2024-05-31 05:05:24', 'GET: /Finance/fin/ledger/page=1'),
(70, 1, '2024-05-31 05:05:30', 'GET: /Finance/fin/ledger/page=1'),
(71, 1, '2024-05-31 05:11:30', 'GET: /Finance/fin/ledger/page=1'),
(72, 1, '2024-05-31 05:11:33', 'GET: /Finance/fin/ledger/page=1'),
(73, 1, '2024-05-31 05:11:54', 'GET: /Finance/fin/ledger/page=2'),
(74, 1, '2024-05-31 05:11:55', 'GET: /Finance/fin/ledger/page=3'),
(75, 1, '2024-05-31 05:11:56', 'GET: /Finance/fin/ledger/page=1'),
(76, 1, '2024-05-31 05:12:29', 'GET: /Finance/fin/ledger/page=1'),
(77, 1, '2024-05-31 05:15:28', 'GET: /Finance/fin/ledger/page=1'),
(78, 1, '2024-05-31 05:17:29', 'GET: /Finance/fin/ledger/page=3'),
(79, 1, '2024-05-31 05:17:32', 'GET: /Finance/fin/ledger/page=2'),
(80, 1, '2024-05-31 05:20:02', 'GET: /Finance/fin/ledger/page=2'),
(81, 1, '2024-05-31 05:21:08', 'GET: /Finance/fin/ledger/page=2'),
(82, 1, '2024-05-31 05:21:11', 'GET: /Finance/fin/ledger/page=1'),
(83, 1, '2024-05-31 05:21:16', 'POST: /Finance/fin/genSearch'),
(84, 1, '2024-05-31 05:21:16', 'GET: /Finance/fin/ledger/page=1'),
(85, 1, '2024-05-31 05:21:21', 'GET: /Finance/fin/ledger/page=2'),
(86, 1, '2024-05-31 05:21:23', 'GET: /Finance/fin/ledger/page=3'),
(87, 1, '2024-05-31 05:21:24', 'GET: /Finance/fin/ledger/page=4'),
(88, 1, '2024-05-31 05:21:25', 'GET: /Finance/fin/ledger/page=2'),
(89, 1, '2024-05-31 05:21:25', 'GET: /Finance/fin/ledger/page=1'),
(90, 1, '2024-05-31 05:21:31', 'POST: /Finance/fin/genSearch'),
(91, 1, '2024-05-31 05:21:31', 'GET: /Finance/fin/ledger/page=1'),
(92, 1, '2024-05-31 05:21:48', 'GET: /Finance/fin/ledger/page=1'),
(93, 1, '2024-05-31 05:21:52', 'POST: /Finance/fin/genSearch'),
(94, 1, '2024-05-31 05:21:52', 'GET: /Finance/fin/ledger/page=1'),
(95, 1, '2024-05-31 05:22:40', 'GET: /Finance/fin/ledger/page=1'),
(96, 1, '2024-05-31 05:22:41', 'POST: /Finance/fin/genSearch'),
(97, 1, '2024-05-31 05:22:41', 'GET: /Finance/fin/ledger/page=1'),
(98, 1, '2024-05-31 05:22:45', 'POST: /Finance/fin/genSearch'),
(99, 1, '2024-05-31 05:22:45', 'GET: /Finance/fin/ledger/page=1'),
(100, 1, '2024-05-31 05:23:26', 'GET: /Finance/fin/ledger/page=1'),
(101, 1, '2024-05-31 05:23:33', 'POST: /Finance/fin/genSearch'),
(102, 1, '2024-05-31 05:23:33', 'GET: /Finance/fin/ledger/page=1'),
(103, 1, '2024-05-31 05:23:35', 'POST: /Finance/fin/genSearch'),
(104, 1, '2024-05-31 05:23:35', 'GET: /Finance/fin/ledger/page=1'),
(105, 1, '2024-05-31 05:23:48', 'POST: /Finance/fin/genSearch'),
(106, 1, '2024-05-31 05:23:48', 'GET: /Finance/fin/ledger/page=1'),
(107, 1, '2024-05-31 05:23:53', 'POST: /Finance/fin/genSearch'),
(108, 1, '2024-05-31 05:23:53', 'GET: /Finance/fin/ledger/page=1'),
(109, 1, '2024-05-31 05:23:56', 'POST: /Finance/fin/genSearch'),
(110, 1, '2024-05-31 05:23:56', 'GET: /Finance/fin/ledger/page=1'),
(111, 1, '2024-05-31 05:23:58', 'POST: /Finance/fin/genSearch'),
(112, 1, '2024-05-31 05:23:58', 'GET: /Finance/fin/ledger/page=1'),
(113, 1, '2024-05-31 05:24:46', 'GET: /Finance/fin/ledger/page=1'),
(114, 1, '2024-05-31 05:24:49', 'POST: /Finance/fin/genSearch'),
(115, 1, '2024-05-31 05:24:49', 'GET: /Finance/fin/ledger/page=1'),
(116, 1, '2024-05-31 05:24:52', 'POST: /Finance/fin/genSearch'),
(117, 1, '2024-05-31 05:24:52', 'GET: /Finance/fin/ledger/page=1'),
(118, 1, '2024-05-31 05:26:57', 'GET: /Finance/fin/ledger/page=1'),
(119, 1, '2024-05-31 05:27:00', 'POST: /Finance/fin/genSearch'),
(120, 1, '2024-05-31 05:27:00', 'GET: /Finance/fin/ledger/page=1'),
(121, 1, '2024-05-31 05:27:05', 'POST: /Finance/fin/genSearch'),
(122, 1, '2024-05-31 05:27:05', 'GET: /Finance/fin/ledger/page=1'),
(123, 1, '2024-05-31 05:27:08', 'POST: /Finance/fin/genSearch'),
(124, 1, '2024-05-31 05:27:09', 'GET: /Finance/fin/ledger/page=1'),
(125, 1, '2024-05-31 05:27:10', 'POST: /Finance/fin/genSearch'),
(126, 1, '2024-05-31 05:27:10', 'GET: /Finance/fin/ledger/page=1'),
(127, 1, '2024-05-31 05:27:41', 'GET: /Finance/fin/ledger/page=1'),
(128, 1, '2024-05-31 05:27:44', 'GET: /Finance/fin/funds/finance/page=1'),
(129, 1, '2024-05-31 05:27:47', 'GET: /Finance/fin/funds/Delivery/page=1'),
(130, 1, '2024-05-31 05:27:47', 'GET: /Finance/fin/funds/Inventory/page=1'),
(131, 1, '2024-05-31 05:27:48', 'GET: /Finance/fin/funds/Sales/page=1'),
(132, 1, '2024-05-31 05:27:50', 'GET: /Finance/fin/funds/PO/page=1'),
(133, 1, '2024-05-31 05:27:51', 'GET: /Finance/fin/funds/HR/page=1'),
(134, 1, '2024-05-31 05:27:52', 'GET: /Finance/fin/funds/PO/page=1'),
(135, 1, '2024-05-31 05:27:53', 'GET: /Finance/fin/funds/Sales/page=1'),
(136, 1, '2024-05-31 05:27:54', 'GET: /Finance/fin/funds/Inventory/page=1'),
(137, 1, '2024-05-31 05:27:54', 'GET: /Finance/fin/funds/Delivery/page=1'),
(138, 1, '2024-05-31 05:27:55', 'GET: /Finance/fin/funds/finance/page=1'),
(139, 1, '2024-05-31 05:50:56', 'GET: /Finance/fin/funds/finance/page=1'),
(140, 1, '2024-05-31 05:52:48', 'GET: /Finance/fin/funds/finance/page=1'),
(141, 1, '2024-05-31 05:53:21', 'GET: /Finance/fin/funds/finance/page=1'),
(142, 1, '2024-05-31 05:53:21', 'GET: /Finance/fin/logs/page=1'),
(143, 1, '2024-05-31 05:54:04', 'GET: /Finance/fin/logs/page=1'),
(144, 1, '2024-05-31 05:55:00', 'GET: /Finance/fin/logs/page=1'),
(145, 1, '2024-05-31 05:55:02', 'GET: /Finance/fin/logs/page=1'),
(146, 1, '2024-05-31 05:55:17', 'GET: /Finance/fin/logs/page=1'),
(147, 1, '2024-05-31 05:55:25', 'GET: /Finance/fin/logs/page=1'),
(148, 1, '2024-05-31 05:55:59', 'GET: /Finance/fin/logs/page=1'),
(149, 1, '2024-05-31 05:56:10', 'GET: /Finance/fin/logs/page=1'),
(150, 1, '2024-05-31 05:56:11', 'GET: /Finance/fin/logs/page=1'),
(151, 1, '2024-05-31 05:56:19', 'GET: /Finance/fin/logs/page=1'),
(152, 1, '2024-05-31 05:57:45', 'GET: /Finance/fin/logs/page=1'),
(153, 1, '2024-05-31 05:57:52', 'GET: /Finance/fin/logs/page=1'),
(154, 1, '2024-05-31 05:58:00', 'GET: /Finance/fin/logs/page=3'),
(155, 1, '2024-05-31 05:58:06', 'GET: /Finance/fin/logs/page=1'),
(156, 1, '2024-05-31 05:58:16', 'GET: /Finance/fin/funds/finance/page=1'),
(157, 1, '2024-05-31 05:58:17', 'GET: /Finance/fin/logs/page=1'),
(158, 1, '2024-05-31 06:02:08', 'GET: /Finance/fin/logs/page=1'),
(159, 1, '2024-05-31 06:02:33', 'GET: /Finance/fin/logs/page=1'),
(160, 1, '2024-05-31 06:02:39', 'GET: /Finance/fin/logs/page=1'),
(161, 1, '2024-05-31 06:03:40', 'GET: /Finance/fin/logs/page=1'),
(162, 1, '2024-05-31 06:03:54', 'GET: /Finance/fin/logs/page=1'),
(163, 1, '2024-05-31 06:03:59', 'GET: /Finance/fin/logs/page=1'),
(164, 1, '2024-05-31 06:05:55', 'GET: /Finance/fin/logs/page=1'),
(165, 1, '2024-05-31 06:06:15', 'GET: /Finance/fin/logs/page=1'),
(166, 1, '2024-05-31 06:07:02', 'GET: /Finance/fin/logs/page=1'),
(167, 1, '2024-05-31 06:08:20', 'GET: /Finance/fin/logs/page=1'),
(168, 1, '2024-05-31 06:08:40', 'GET: /Finance/fin/logs/page=1'),
(169, 1, '2024-05-31 06:09:04', 'GET: /Finance/fin/logs/page=1'),
(170, 1, '2024-05-31 06:10:52', 'GET: /Finance/fin/logs/page=1'),
(171, 1, '2024-05-31 06:10:55', 'GET: /Finance/fin/logs/page=2'),
(172, 1, '2024-05-31 06:10:55', 'GET: /Finance/fin/logs/page=3'),
(173, 1, '2024-05-31 06:10:56', 'GET: /Finance/fin/logs/page=5'),
(174, 1, '2024-05-31 06:10:57', 'GET: /Finance/fin/logs/page=6'),
(175, 1, '2024-05-31 06:10:58', 'GET: /Finance/fin/logs/page=8'),
(176, 1, '2024-05-31 06:10:58', 'GET: /Finance/fin/logs/page=6'),
(177, 1, '2024-05-31 06:10:59', 'GET: /Finance/fin/logs/page=5'),
(178, 1, '2024-05-31 06:11:00', 'GET: /Finance/fin/logs/page=3'),
(179, 1, '2024-05-31 06:11:00', 'GET: /Finance/fin/logs/page=1'),
(180, 1, '2024-05-31 06:11:22', 'GET: /Finance/fin/logs/page=1'),
(181, 1, '2024-05-31 06:11:25', 'GET: /Finance/fin/logs/page=1'),
(182, 1, '2024-05-31 06:11:53', 'GET: /Finance/fin/logs/page=1'),
(183, 1, '2024-05-31 06:12:17', 'GET: /Finance/fin/logs/page=1'),
(184, 1, '2024-05-31 06:12:45', 'GET: /Finance/fin/logs/page=1'),
(185, 1, '2024-05-31 06:16:44', 'GET: /Finance/fin/logs/page=1'),
(186, 1, '2024-05-31 06:16:51', 'GET: /Finance/fin/logs/page=1'),
(187, 1, '2024-05-31 06:16:55', 'GET: /Finance/fin/logs/page=1'),
(188, 1, '2024-05-31 06:17:00', 'GET: /Finance/fin/logs/page=1'),
(189, 1, '2024-05-31 06:17:03', 'GET: /Finance/fin/logs/page=1'),
(190, 1, '2024-05-31 06:17:07', 'GET: /Finance/fin/logs/page=3'),
(191, 1, '2024-05-31 06:17:09', 'GET: /Finance/fin/logs/page=1'),
(192, 1, '2024-05-31 06:17:19', 'GET: /Finance/fin/logs/page=1'),
(193, 1, '2024-05-31 06:17:31', 'GET: /Finance/fin/logs/page=1'),
(194, 1, '2024-05-31 06:17:35', 'GET: /Finance/fin/logs/page=1'),
(195, 1, '2024-05-31 06:17:40', 'GET: /Finance/fin/logs/page=1'),
(196, 1, '2024-05-31 06:17:57', 'GET: /Finance/fin/logs/page=1'),
(197, 1, '2024-05-31 06:18:54', 'GET: /Finance/fin/logs/page=1'),
(198, 1, '2024-05-31 06:19:02', 'GET: /Finance/fin/logs/page=1'),
(199, 1, '2024-05-31 06:19:04', 'GET: /Finance/fin/logs/page=2'),
(200, 1, '2024-05-31 06:19:05', 'GET: /Finance/fin/logs/page=1'),
(201, 1, '2024-05-31 06:22:52', 'GET: /Finance/fin/logs/page=1'),
(202, 1, '2024-05-31 06:23:04', 'GET: /Finance/fin/logs/page=2'),
(203, 1, '2024-05-31 06:23:48', 'GET: /Finance/fin/logs/page=2'),
(204, 1, '2024-05-31 06:23:49', 'GET: /Finance/fin/logs/page=1'),
(205, 1, '2024-05-31 06:23:54', 'POST: /Finance/auditlogSearch'),
(206, 1, '2024-05-31 06:23:54', 'GET: /Finance/fin/logs/page=1'),
(207, 1, '2024-05-31 06:24:03', 'POST: /Finance/auditlogSearch'),
(208, 1, '2024-05-31 06:24:03', 'GET: /Finance/fin/logs/page=1'),
(209, 1, '2024-05-31 06:24:11', 'GET: /Finance/fin/logs/page=1'),
(210, 1, '2024-05-31 06:24:17', 'POST: /Finance/auditlogSearch'),
(211, 1, '2024-05-31 06:24:18', 'GET: /Finance/fin/logs/page=1'),
(212, 1, '2024-05-31 06:24:24', 'GET: /Finance/fin/logs/page=2'),
(213, 1, '2024-05-31 06:24:27', 'GET: /Finance/fin/logs/page=3'),
(214, 1, '2024-05-31 06:24:27', 'GET: /Finance/fin/logs/page=5'),
(215, 1, '2024-05-31 06:24:28', 'GET: /Finance/fin/logs/page=6'),
(216, 1, '2024-05-31 06:24:29', 'GET: /Finance/fin/logs/page=4'),
(217, 1, '2024-05-31 06:24:30', 'GET: /Finance/fin/logs/page=3'),
(218, 1, '2024-05-31 06:24:30', 'GET: /Finance/fin/logs/page=1'),
(219, 1, '2024-05-31 06:25:14', 'GET: /Finance/fin/logs/page=1'),
(220, 1, '2024-05-31 06:25:16', 'GET: /Finance/fin/logs/page=2'),
(221, 1, '2024-05-31 06:25:17', 'GET: /Finance/fin/logs/page=3'),
(222, 1, '2024-05-31 06:25:18', 'GET: /Finance/fin/logs/page=1'),
(223, 1, '2024-05-31 06:27:19', 'GET: /Finance/fin/logs/page=1'),
(224, 1, '2024-05-31 06:27:21', 'POST: /Finance/auditlogSearch'),
(225, 1, '2024-05-31 06:27:21', 'GET: /Finance/fin/logs/page=1'),
(226, 1, '2024-05-31 06:27:26', 'GET: /Finance/fin/funds/finance/page=1'),
(227, 1, '2024-05-31 06:27:28', 'GET: /Finance/fin/logs/page=1'),
(228, 1, '2024-05-31 06:27:30', 'GET: /Finance/fin/logs/page=1'),
(229, 1, '2024-05-31 06:27:30', 'GET: /Finance/fin/funds/finance/page=1'),
(230, 1, '2024-05-31 06:27:31', 'GET: /Finance/fin/logs/page=1'),
(231, 1, '2024-05-31 06:27:31', 'GET: /Finance/fin/funds/finance/page=1'),
(232, 1, '2024-05-31 06:27:33', 'GET: /Finance/fin/ledger/page=1'),
(233, 1, '2024-05-31 06:28:03', 'GET: /Finance/fin/ledger/page=1'),
(234, 1, '2024-05-31 06:28:38', 'GET: /Finance/fin/ledger/page=1'),
(235, 1, '2024-05-31 06:28:47', 'GET: /Finance/fin/ledger/page=1'),
(236, 1, '2024-05-31 06:28:51', 'GET: /Finance/fin/ledger/page=1'),
(237, 1, '2024-05-31 06:29:29', 'GET: /Finance/fin/ledger/page=1'),
(238, 1, '2024-05-31 06:29:30', 'GET: /Finance/fin/logs/page=1'),
(239, 1, '2024-05-31 06:29:38', 'GET: /Finance/fin/logs/page=1'),
(240, 1, '2024-05-31 06:29:39', 'GET: /Finance/fin/logs/page=1'),
(241, 1, '2024-05-31 06:30:05', 'GET: /Finance/fin/logs/page=1'),
(242, 1, '2024-05-31 06:30:17', 'GET: /Finance/fin/logs/page=1'),
(243, 1, '2024-05-31 06:30:42', 'GET: /Finance/fin/ledger/page=1'),
(244, 1, '2024-05-31 06:30:49', 'GET: /Finance/fin/ledger/page=1'),
(245, 1, '2024-05-31 06:31:07', 'GET: /Finance/fin/ledger/page=1'),
(246, 1, '2024-05-31 06:31:13', 'GET: /Finance/fin/ledger/page=1'),
(247, 1, '2024-05-31 06:31:14', 'GET: /Finance/fin/funds/finance/page=1'),
(248, 1, '2024-05-31 06:31:15', 'GET: /Finance/fin/logs/page=1'),
(249, 1, '2024-05-31 06:31:41', 'GET: /Finance/fin/logs/page=1'),
(250, 1, '2024-05-31 06:32:18', 'GET: /Finance/fin/logs/page=1'),
(251, 1, '2024-05-31 06:33:49', 'GET: /Finance/fin/funds/finance/page=1'),
(252, 1, '2024-05-31 06:33:50', 'POST: /Finance/fin/getBalanceReport'),
(253, 1, '2024-05-31 06:33:50', 'POST: /Finance/fin/getEquityReport'),
(254, 1, '2024-05-31 06:33:50', 'POST: /Finance/fin/getCashFlowReport'),
(255, 1, '2024-05-31 06:33:51', 'GET: /Finance/fin/logs/page=1'),
(256, 1, '2024-05-31 06:34:37', 'GET: /Finance/fin/logs/page=1'),
(257, 1, '2024-05-31 06:34:55', 'GET: /Finance/fin/logs/page=1'),
(258, 1, '2024-05-31 06:35:10', 'GET: /Finance/fin/logs/page=1'),
(259, 1, '2024-05-31 06:35:23', 'GET: /Finance/fin/logs/page=1'),
(260, 1, '2024-05-31 06:35:38', 'GET: /Finance/fin/logs/page=1'),
(261, 1, '2024-05-31 06:35:45', 'GET: /Finance/fin/logs/page=1'),
(262, 1, '2024-05-31 06:36:18', 'GET: /Finance/fin/funds/finance/page=1'),
(263, 1, '2024-05-31 06:36:20', 'POST: /Finance/fin/getBalanceReport'),
(264, 1, '2024-05-31 06:36:20', 'POST: /Finance/fin/getEquityReport'),
(265, 1, '2024-05-31 06:36:20', 'POST: /Finance/fin/getCashFlowReport'),
(266, 1, '2024-05-31 06:36:20', 'GET: /Finance/fin/funds/finance/page=1'),
(267, 1, '2024-05-31 06:36:21', 'GET: /Finance/fin/logs/page=1'),
(268, 1, '2024-05-31 06:40:34', 'GET: /Finance/fin/funds/finance/page=1'),
(269, 1, '2024-05-31 06:40:36', 'GET: /Finance/fin/ledger/page=1'),
(270, 1, '2024-05-31 06:40:38', 'POST: /Finance/fin/getBalanceReport'),
(271, 1, '2024-05-31 06:40:38', 'POST: /Finance/fin/getEquityReport'),
(272, 1, '2024-05-31 06:40:38', 'POST: /Finance/fin/getCashFlowReport'),
(273, 1, '2024-05-31 06:40:40', 'GET: /Finance/fin/logs/page=1');

-- --------------------------------------------------------

--
-- Table structure for table `batch_orders`
--

CREATE TABLE `batch_orders` (
  `Batch_ID` int(11) NOT NULL,
  `Supplier_ID` int(11) NOT NULL,
  `Time_Ordered` time NOT NULL DEFAULT current_timestamp(),
  `Date_Ordered` date NOT NULL DEFAULT current_timestamp(),
  `Items_Subtotal` int(11) NOT NULL,
  `Total_Amount` int(11) NOT NULL,
  `Order_Status` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `benefit_info`
--

CREATE TABLE `benefit_info` (
  `id` int(10) NOT NULL,
  `philhealth` decimal(10,2) NOT NULL,
  `sss_fund` decimal(10,2) NOT NULL,
  `pagibig_fund` decimal(10,2) NOT NULL,
  `thirteenth_month` decimal(10,2) NOT NULL,
  `salary_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `benefit_info`
--

INSERT INTO `benefit_info` (`id`, `philhealth`, `sss_fund`, `pagibig_fund`, `thirteenth_month`, `salary_id`) VALUES
(1, 4000.00, 3584.00, 200.00, 80000.00, 1),
(2, 2250.00, 2016.00, 200.00, 45000.00, 2),
(3, 1750.00, 1568.00, 200.00, 35000.00, 3),
(4, 1500.00, 1344.00, 200.00, 30000.00, 4),
(5, 1250.00, 1120.00, 200.00, 25000.00, 5),
(6, 900.00, 806.40, 200.00, 18000.00, 6);

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `id` int(10) NOT NULL,
  `event_name` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `day` enum('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `Category_ID` int(11) NOT NULL,
  `Category_Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`Category_ID`, `Category_Name`) VALUES
(1, 'Tools'),
(2, 'Building Materials'),
(3, 'Art Supplies'),
(4, 'Safety Gear'),
(5, 'Paints and Chemicals');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `CustomerID` int(11) NOT NULL,
  `FirstName` varchar(100) DEFAULT NULL,
  `LastName` varchar(100) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deliveryorders`
--

CREATE TABLE `deliveryorders` (
  `DeliveryOrderID` int(11) NOT NULL,
  `SaleID` int(11) DEFAULT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `ProductWeight` decimal(10,2) DEFAULT NULL,
  `Province` varchar(255) DEFAULT NULL,
  `Municipality` varchar(255) DEFAULT NULL,
  `StreetBarangayAddress` varchar(255) DEFAULT NULL,
  `DeliveryDate` date DEFAULT NULL,
  `ReceivedDate` date DEFAULT NULL,
  `DeliveryStatus` enum('Pending','In Transit','Delivered','Failed to deliver') DEFAULT 'Pending',
  `TruckID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(10) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `first_name` varchar(30) NOT NULL,
  `middle_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) NOT NULL,
  `dateofbirth` date NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `nationality` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_no` varchar(20) DEFAULT 'N/A',
  `email` varchar(30) DEFAULT 'N/A',
  `civil_status` enum('Single','Married','Divorced','Widowed') NOT NULL,
  `department` enum('Product Order','Human Resources','Point of Sales','Inventory','Finance','Delivery') NOT NULL,
  `position` varchar(50) NOT NULL,
  `sss_number` varchar(20) DEFAULT NULL,
  `philhealth_number` varchar(20) DEFAULT NULL,
  `tin_number` varchar(20) DEFAULT NULL,
  `pagibig_number` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `image_url`, `first_name`, `middle_name`, `last_name`, `dateofbirth`, `gender`, `nationality`, `address`, `contact_no`, `email`, `civil_status`, `department`, `position`, `sss_number`, `philhealth_number`, `tin_number`, `pagibig_number`) VALUES
(1, '123', 'wawt', 'cs', '3a', '2024-05-01', 'Male', 'filipino', 'america', 'N/A', 'N/A', 'Single', 'Finance', 'manager', '123', '123', '12', '123'),
(2, 'https://pbs.twimg.com/profile_images/1776936838118404096/cxF34bgy_400x400.jpg', 'Jarelle Anne', 'Cañada', 'Pamintuan', '2001-08-31', 'Female', 'Filipino', 'Rias-Eveland Boulevard', '09675222420', 'jarelleannepamintuan@gmail.com', 'Single', 'Human Resources', 'HR Manager/Director', '3934191496', '254323228890', '811863948', '077652901241'),
(3, 'https://pbs.twimg.com/profile_images/1556154158860107776/1eTSWQJx_400x400.jpg', 'Ziggy', 'Castro', 'Co', '2001-12-19', 'Female', 'Filipino', 'Pampanga', '09123456789', 'ziggyco@example.com', 'Single', 'Human Resources', 'Compensation and Benefits Specialist', '9842683190', '222904801483', '398938596', '393260427062'),
(4, 'https://pbs.twimg.com/profile_images/1591010546899308544/9_n476w9_400x400.png', 'Nathaniel', '', 'Fernandez', '2003-04-06', 'Male', 'Filipino', 'Pampanga', '09123456789', 'nathZ@example.com', 'Single', 'Human Resources', 'HR Legal Compliance Specialist', '3217127657', '982459800458', '175523699', '723082092314'),
(5, 'https://pbs.twimg.com/profile_images/1746139769342742528/cDQRzJIV_400x400.jpg', 'Emmanuel Louise', '', 'Gonzales', '2001-01-27', 'Male', 'Filipino', 'Pampanga', '09123456789', 'emman@example.com', 'Divorced', 'Human Resources', 'Recruiter', '3831913601', '296757397697', '136729120', '687715123719'),
(6, '/master/public/humanResources/img/noPhotoAvailable.png', 'Joshua', '', 'Casupang', '2003-06-21', 'Male', 'Filipino', 'Pampanga', '09123456789', 'joshua@example.com', 'Married', 'Human Resources', 'HR Coordinator', '1788631721', '493539660119', '579494717', '254144900265'),
(7, '/master/public/humanResources/img/noPhotoAvailable.png', 'Marc', 'Cruz', 'David', '2002-02-09', 'Male', 'Filipino', 'Pampanga', '09293883802', 'sinicchi123@gmail.com', 'Single', 'Product Order', 'Order Processor', '5239186621', '113821417235', '293860405', '677900026630'),
(8, 'https://pbs.twimg.com/profile_images/1776936838118404096/cxF34bgy_400x400.jpg', 'Jarelle Anne', 'Cañada', 'Pamintuan', '2001-08-31', 'Female', 'Filipino', 'Rias-Eveland Boulevard', '09675222420', 'jarelleannepamintuan@gmail.com', 'Single', 'Human Resources', 'HR Manager/Director', '3934191496', '254323228890', '811863948', '077652901241'),
(9, 'https://pbs.twimg.com/profile_images/1556154158860107776/1eTSWQJx_400x400.jpg', 'Ziggy', 'Castro', 'Co', '2001-12-19', 'Female', 'Filipino', 'Pampanga', '09123456789', 'ziggyco@example.com', 'Single', 'Human Resources', 'Compensation and Benefits Specialist', '9842683190', '222904801483', '398938596', '393260427062'),
(10, 'https://pbs.twimg.com/profile_images/1591010546899308544/9_n476w9_400x400.png', 'Nathaniel', '', 'Fernandez', '2003-04-06', 'Male', 'Filipino', 'Pampanga', '09123456789', 'nathZ@example.com', 'Single', 'Human Resources', 'HR Legal Compliance Specialist', '3217127657', '982459800458', '175523699', '723082092314'),
(11, 'https://pbs.twimg.com/profile_images/1746139769342742528/cDQRzJIV_400x400.jpg', 'Emmanuel Louise', '', 'Gonzales', '2001-01-27', 'Male', 'Filipino', 'Pampanga', '09123456789', 'emman@example.com', 'Divorced', 'Human Resources', 'Recruiter', '3831913601', '296757397697', '136729120', '687715123719'),
(12, '/master/public/humanResources/img/noPhotoAvailable.png', 'Joshua', '', 'Casupang', '2003-06-21', 'Male', 'Filipino', 'Pampanga', '09123456789', 'joshua@example.com', 'Married', 'Human Resources', 'HR Coordinator', '1788631721', '493539660119', '579494717', '254144900265'),
(13, '/master/public/humanResources/img/noPhotoAvailable.png', 'Marc', 'Cruz', 'David', '2002-02-09', 'Male', 'Filipino', 'Pampanga', '09293883802', 'sinicchi123@gmail.com', 'Single', 'Product Order', 'Order Processor', '5239186621', '113821417235', '293860405', '677900026630');

-- --------------------------------------------------------

--
-- Table structure for table `employeetrucks`
--

CREATE TABLE `employeetrucks` (
  `EmployeeID` int(11) DEFAULT NULL,
  `TruckID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employment_info`
--

CREATE TABLE `employment_info` (
  `id` int(10) NOT NULL,
  `dateofhire` date NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date DEFAULT NULL,
  `employees_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employment_info`
--

INSERT INTO `employment_info` (`id`, `dateofhire`, `startdate`, `enddate`, `employees_id`) VALUES
(1, '2021-01-01', '2021-01-01', NULL, 1),
(2, '2021-01-01', '2021-01-01', NULL, 2),
(3, '2021-01-01', '2021-01-01', NULL, 3),
(4, '2021-01-01', '2021-01-01', NULL, 4),
(5, '2021-01-01', '2021-01-01', NULL, 5),
(6, '2024-04-11', '2024-04-11', '2025-04-11', 6);

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `feedback_ID` int(11) NOT NULL,
  `supplier_ID` int(11) NOT NULL,
  `batch_ID` int(11) NOT NULL,
  `user` varchar(35) NOT NULL,
  `reviews` varchar(150) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `funds_transaction`
--

CREATE TABLE `funds_transaction` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `lt_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `funds_transaction`
--

INSERT INTO `funds_transaction` (`id`, `employee_id`, `lt_id`) VALUES
(7, 1, 33828),
(19, 1, 33860),
(20, 1, 33862),
(21, 1, 35233),
(22, 1, 35234);

-- --------------------------------------------------------

--
-- Table structure for table `grouptype`
--

CREATE TABLE `grouptype` (
  `grouptype` varchar(2) NOT NULL,
  `description` varchar(255) NOT NULL,
  `requiresinfo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grouptype`
--

INSERT INTO `grouptype` (`grouptype`, `description`, `requiresinfo`) VALUES
('AA', 'Asset', 0),
('EP', 'Expenses', 0),
('IC', 'Income', 0),
('LE', 'liabilities and owner\'s equity', 1);

-- --------------------------------------------------------

--
-- Table structure for table `leave_requests`
--

CREATE TABLE `leave_requests` (
  `id` int(10) NOT NULL,
  `type` enum('Sick Leave','Vacation Leave','5 Days Forced Leave','Special Privilege Leave','Maternity Leave','Paternity Leave','Parental Leave','Rehabilitation Leave','Special Leave (For Women)','Study Leave','Terminal Leave','Special Emergency Leave') NOT NULL,
  `details` varchar(255) DEFAULT NULL,
  `date_submitted` timestamp NOT NULL DEFAULT current_timestamp(),
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` enum('Pending','Approved','Denied') DEFAULT 'Pending',
  `employees_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ledger`
--

CREATE TABLE `ledger` (
  `ledgerno` int(11) NOT NULL,
  `AccountType` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contactIfLE` varchar(255) DEFAULT NULL,
  `contactName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ledger`
--

INSERT INTO `ledger` (`ledgerno`, `AccountType`, `name`, `contactIfLE`, `contactName`) VALUES
(1, 1, 'Equipment', NULL, NULL),
(2, 1, 'Land', NULL, NULL),
(3, 2, 'Cash on hand', NULL, NULL),
(4, 2, 'Cash on bank', NULL, NULL),
(5, 2, 'Insurance', NULL, NULL),
(6, 2, 'Inventory', NULL, NULL),
(7, 3, 'A account', NULL, NULL),
(8, 3, 'B account', NULL, NULL),
(9, 4, 'C account', NULL, NULL),
(10, 4, 'D account', NULL, NULL),
(11, 5, 'Sales', NULL, NULL),
(12, 6, 'Discount', NULL, NULL),
(13, 6, 'Allowance', NULL, NULL),
(14, 6, 'Returns', NULL, NULL),
(15, 7, 'Payroll', NULL, NULL),
(16, 7, 'Fuel/Gas', NULL, NULL),
(17, 8, 'Rent', NULL, NULL),
(18, 8, 'Tax Expense', NULL, NULL),
(19, 8, 'Insurance Expense', NULL, NULL),
(20, 8, 'Utilities', NULL, NULL),
(21, 8, 'Theft Expense', NULL, NULL),
(22, 8, 'Interest Expense', NULL, NULL),
(23, 8, 'Other Operating Expense', NULL, NULL),
(24, 9, 'Cost of Goods Sold', NULL, NULL),
(25, 11, 'Retained Earnings/Loss', NULL, NULL),
(26, 10, 'Income Tax Payable', NULL, NULL),
(27, 10, 'Withholding Tax Payable', NULL, NULL),
(28, 4, 'Salary Payable', NULL, NULL),
(29, 10, 'Value Added Tax Payable', NULL, NULL),
(32, 3, 'aries', '123456789', 'aries tagle assitant'),
(33, 3, 'a2', 'a2', 'a2'),
(36, 4, 'a3', 'a3', 'a3'),
(37, 10, 'a4', 'a4', 'a4');

-- --------------------------------------------------------

--
-- Table structure for table `ledgertransaction`
--

CREATE TABLE `ledgertransaction` (
  `LedgerXactID` int(11) NOT NULL,
  `LedgerNo` int(11) NOT NULL,
  `DateTime` datetime NOT NULL DEFAULT current_timestamp(),
  `LedgerNo_Dr` int(11) NOT NULL,
  `amount` double NOT NULL,
  `details` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ledgertransaction`
--

INSERT INTO `ledgertransaction` (`LedgerXactID`, `LedgerNo`, `DateTime`, `LedgerNo_Dr`, `amount`, `details`) VALUES
(33828, 3, '2024-05-14 09:31:14', 1, 10, 'Pondo expense for Finance'),
(33832, 3, '2024-05-14 11:30:04', 1, 10, 'Pondo expense for Human Resources'),
(33833, 4, '2024-05-15 18:04:46', 6, 100, NULL),
(33834, 6, '2024-05-15 12:05:27', 21, 10, 'Missing Inventory'),
(33835, 6, '2024-05-15 12:05:50', 24, 10, 'Recount Inventory'),
(33844, 11, '2024-05-15 12:37:08', 4, 90, 'made a sale with tax'),
(33845, 29, '2024-05-15 12:37:09', 4, 10, 'made a sale with tax'),
(33846, 4, '2024-05-15 12:37:09', 12, 10, 'Discount given'),
(33847, 4, '2024-05-15 12:40:40', 13, 10, 'Sales allowance'),
(33848, 4, '2024-05-15 12:40:56', 14, 10, 'Sales return'),
(33855, 28, '2024-05-17 11:54:45', 4, 100, 'Boroww on 28 with 4'),
(33856, 4, '2024-05-17 11:55:21', 28, 100, 'Paid 28 using 4'),
(33857, 28, '2024-05-17 11:57:33', 4, 100, 'Boroww on 28 with 4'),
(33858, 4, '2024-05-17 11:57:38', 28, 100, 'Paid 28 using 4'),
(33859, 28, '2024-05-17 11:58:55', 4, 100, 'Boroww on 28 with 4'),
(33860, 4, '2024-05-17 12:00:12', 28, 100, 'Pondo expense for Human Resources'),
(33861, 27, '2024-05-17 12:01:13', 4, 100, 'Boroww on 27 with 4'),
(33862, 4, '2024-05-17 12:01:13', 27, 100, 'Pondo expense for Human Resources'),
(33864, 32, '2024-05-17 12:08:16', 4, 100, 'Investment of 32 in 4 with 100'),
(33865, 4, '2024-05-17 12:08:38', 32, 100, 'Investment of 32 in 4'),
(34070, 32, '2024-05-17 13:14:13', 1, 100, 'Investment of 32 in 1 with 100'),
(34071, 3, '2024-05-17 13:14:19', 32, 100, 'Investment of 32 in 3'),
(34072, 36, '2024-05-17 13:15:58', 1, 100, 'Boroww on 36 with 1'),
(34073, 3, '2024-05-17 13:16:03', 36, 100, 'Paid 36 using 3'),
(34083, 37, '2024-05-17 13:18:46', 2, 100, 'Boroww on 37 with 2'),
(34084, 4, '2024-05-17 13:19:16', 37, 100, 'Paid 37 using 4'),
(35225, 11, '2024-04-01 08:53:46', 4, 100, 'sales try'),
(35230, 25, '2024-04-30 23:59:59', 11, 100, 'closing of account'),
(35231, 7, '2024-04-30 23:59:59', 25, 100, 'giving the remaining to the owner'),
(35232, 7, '2024-04-01 09:36:43', 4, 100, NULL),
(35233, 4, '2024-05-30 17:22:40', 1, 10, 'Pondo expense for Finance'),
(35234, 4, '2024-05-30 17:22:40', 1, 10, 'Pondo expense for Finance'),
(35235, 32, '2024-04-01 10:41:37', 4, 15000, NULL),
(35236, 32, '2024-04-01 10:43:45', 4, 100000, NULL),
(35243, 32, '2024-04-17 23:24:17', 3, 500000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `Order_ID` int(11) NOT NULL,
  `Product_ID` int(11) NOT NULL,
  `Supplier_ID` int(11) NOT NULL,
  `Batch_ID` int(11) NOT NULL,
  `Product_Quantity` int(11) DEFAULT NULL,
  `Time_Ordered` time NOT NULL DEFAULT current_timestamp(),
  `Date_Ordered` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

CREATE TABLE `payroll` (
  `id` int(10) NOT NULL,
  `pay_date` date NOT NULL,
  `month` varchar(20) NOT NULL,
  `monthly_salary` decimal(10,2) NOT NULL,
  `status` enum('Pending','Paid') DEFAULT 'Pending',
  `salary_id` int(10) NOT NULL,
  `employees_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductID` int(11) NOT NULL,
  `Supplier_ID` int(11) NOT NULL,
  `Category_ID` int(11) NOT NULL,
  `ProductImage` varchar(250) NOT NULL,
  `ProductName` varchar(100) DEFAULT NULL,
  `Supplier` varchar(50) NOT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Category` varchar(50) DEFAULT NULL,
  `DeliveryRequired` varchar(3) DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL,
  `Supplier_Price` decimal(10,2) DEFAULT NULL,
  `Stocks` int(11) DEFAULT NULL,
  `UnitOfMeasurement` varchar(20) DEFAULT NULL,
  `TaxRate` decimal(5,2) DEFAULT NULL,
  `ProductWeight` decimal(10,2) DEFAULT NULL,
  `Status` varchar(35) NOT NULL,
  `Availability` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductID`, `Supplier_ID`, `Category_ID`, `ProductImage`, `ProductName`, `Supplier`, `Description`, `Category`, `DeliveryRequired`, `Price`, `Supplier_Price`, `Stocks`, `UnitOfMeasurement`, `TaxRate`, `ProductWeight`, `Status`, `Availability`) VALUES
(1, 2, 1, 'uploads/Hammer_(Large).png', 'Hammer (Large)', 'Marc Shop', 'Heavy-duty hammer for construction work', 'Tools', NULL, 329.00, 200.00, NULL, 'pcs', 0.12, 1.50, '', 'Available'),
(2, 2, 1, 'uploads/Screwdriver_Set_(Standard).png', 'Screwdriver Set (Standard)', 'Marc Shop', 'Set of 6 screwdrivers with various sizes', 'Tools', NULL, 969.00, 700.00, NULL, 'set', 0.12, 0.80, '', 'Available'),
(3, 2, 2, 'uploads/Cement_(50kg).png', 'Cement (50kg)', 'Marc Shop', 'Portland cement for construction purposes', 'Building Materials', NULL, 240.00, 180.00, NULL, 'pcs', 0.12, 50.00, '', 'Available'),
(4, 2, 2, 'uploads/Gravel_(1_ton).png', 'Gravel (1 ton)', 'Marc Shop', 'Crushed stone for construction projects', 'Building Materials', NULL, 550.00, 400.00, NULL, 'ton', 0.12, 907.19, '', 'Available'),
(5, 2, 3, 'uploads/Paint_Brush_Set.png', 'Paint Brush Set', 'Marc Shop', 'Set of 10 paint brushes for art projects', 'Art Supplies', NULL, 209.00, 150.00, NULL, 'set', 0.12, 0.50, '', 'Available'),
(6, 3, 2, 'uploads/Galvanized_Nails_(5_lbs).png', 'Galvanized Nails (5 lbs)', 'Aian\'s Bakery', 'Galvanized nails for various construction applicat...', 'Building Materials', NULL, 50.00, 35.00, NULL, 'lbs', 0.12, 2.27, '', 'Available'),
(7, 3, 2, 'uploads/Concrete_Blocks_(Standard).png', 'Concrete Blocks (Standard)', 'Aian\'s Bakery', 'Standard concrete blocks for building walls', 'Building Materials', NULL, 12.00, 8.00, NULL, 'pcs', 0.12, 2.30, '', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `returnproducts`
--

CREATE TABLE `returnproducts` (
  `ReturnID` int(11) NOT NULL,
  `SaleID` int(11) DEFAULT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Reason` varchar(255) DEFAULT NULL,
  `PaymentReturned` decimal(10,2) DEFAULT NULL,
  `ProductStatus` varchar(255) DEFAULT NULL,
  `ReturnDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salary_info`
--

CREATE TABLE `salary_info` (
  `id` int(10) NOT NULL,
  `monthly_salary` decimal(10,2) NOT NULL,
  `daily_rate` decimal(10,2) NOT NULL,
  `total_deductions` decimal(10,2) NOT NULL,
  `total_salary` decimal(10,2) NOT NULL,
  `employees_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salary_info`
--

INSERT INTO `salary_info` (`id`, `monthly_salary`, `daily_rate`, `total_deductions`, `total_salary`, `employees_id`) VALUES
(1, 80000.00, 0.00, 34492.46, 45507.54, 1),
(2, 45000.00, 0.00, 14091.00, 30909.00, 2),
(3, 35000.00, 0.00, 8643.00, 26357.00, 3),
(4, 30000.00, 0.00, 6252.33, 23747.67, 4),
(5, 25000.00, 0.00, 4028.33, 20971.67, 5),
(6, 18000.00, 0.00, 1906.40, 16093.60, 6);

-- --------------------------------------------------------

--
-- Table structure for table `saledetails`
--

CREATE TABLE `saledetails` (
  `SaleDetailID` int(11) NOT NULL,
  `SaleID` int(11) DEFAULT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `ProductWeight` decimal(10,2) DEFAULT NULL,
  `UnitPrice` decimal(10,2) DEFAULT NULL,
  `Subtotal` decimal(10,2) DEFAULT NULL,
  `Tax` decimal(10,2) DEFAULT NULL,
  `TotalAmount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `SaleID` int(11) NOT NULL,
  `SaleDate` datetime DEFAULT NULL,
  `SalePreference` enum('Delivery','Pick-up') DEFAULT NULL,
  `ShippingFee` decimal(10,2) DEFAULT NULL,
  `PaymentMode` enum('Cash','Card') DEFAULT NULL,
  `CardNumber` varchar(16) DEFAULT NULL,
  `ExpiryDate` text DEFAULT NULL,
  `CVV` varchar(3) DEFAULT NULL,
  `TotalAmount` decimal(10,2) DEFAULT NULL,
  `EmployeeID` int(11) DEFAULT NULL,
  `CustomerID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`SaleID`, `SaleDate`, `SalePreference`, `ShippingFee`, `PaymentMode`, `CardNumber`, `ExpiryDate`, `CVV`, `TotalAmount`, `EmployeeID`, `CustomerID`) VALUES
(1, '2022-01-15 10:30:00', 'Delivery', 10.00, 'Cash', NULL, NULL, NULL, 150.00, 1, NULL),
(2, '2022-02-05 14:45:00', 'Pick-up', 0.00, 'Card', NULL, NULL, NULL, 250.00, 2, NULL),
(3, '2022-03-20 11:00:00', 'Delivery', 20.00, 'Cash', NULL, NULL, NULL, 180.00, 3, NULL),
(4, '2022-04-10 09:15:00', 'Delivery', 15.00, 'Cash', NULL, NULL, NULL, 200.00, 1, NULL),
(5, '2022-05-22 13:00:00', 'Pick-up', 0.00, 'Cash', NULL, NULL, NULL, 300.00, 2, NULL),
(6, '2022-06-08 16:30:00', 'Delivery', 25.00, 'Card', NULL, NULL, NULL, 350.00, 3, NULL),
(7, '2022-07-14 10:00:00', 'Delivery', 10.00, 'Cash', NULL, NULL, NULL, 180.00, 1, NULL),
(8, '2022-08-29 12:45:00', 'Pick-up', 0.00, 'Cash', NULL, NULL, NULL, 270.00, 2, NULL),
(9, '2022-09-05 15:20:00', 'Delivery', 20.00, 'Card', NULL, NULL, NULL, 400.00, 3, NULL),
(10, '2022-10-18 09:30:00', 'Delivery', 15.00, 'Cash', NULL, NULL, NULL, 220.00, 1, NULL),
(11, '2022-11-25 11:45:00', 'Pick-up', 0.00, 'Cash', NULL, NULL, NULL, 280.00, 2, NULL),
(12, '2022-12-30 14:00:00', 'Delivery', 25.00, 'Card', NULL, NULL, NULL, 320.00, 3, NULL),
(13, '2023-01-15 10:30:00', 'Delivery', 10.00, 'Cash', NULL, NULL, NULL, 200.00, 1, NULL),
(14, '2023-02-05 14:45:00', 'Pick-up', 0.00, 'Card', NULL, NULL, NULL, 300.00, 2, NULL),
(15, '2023-03-20 11:00:00', 'Delivery', 20.00, 'Cash', NULL, NULL, NULL, 250.00, 3, NULL),
(16, '2023-04-10 09:15:00', 'Delivery', 15.00, 'Cash', NULL, NULL, NULL, 350.00, 1, NULL),
(17, '2023-05-22 13:00:00', 'Pick-up', 0.00, 'Cash', NULL, NULL, NULL, 400.00, 2, NULL),
(18, '2023-06-08 16:30:00', 'Delivery', 25.00, 'Card', NULL, NULL, NULL, 450.00, 3, NULL),
(19, '2023-07-14 10:00:00', 'Delivery', 10.00, 'Cash', NULL, NULL, NULL, 300.00, 1, NULL),
(20, '2023-08-29 12:45:00', 'Pick-up', 0.00, 'Cash', NULL, NULL, NULL, 350.00, 2, NULL),
(21, '2023-09-05 15:20:00', 'Delivery', 20.00, 'Card', NULL, NULL, NULL, 500.00, 3, NULL),
(22, '2023-10-18 09:30:00', 'Delivery', 15.00, 'Cash', NULL, NULL, NULL, 400.00, 1, NULL),
(23, '2023-11-25 11:45:00', 'Pick-up', 0.00, 'Cash', NULL, NULL, NULL, 450.00, 2, NULL),
(24, '2023-12-30 14:00:00', 'Delivery', 25.00, 'Card', NULL, NULL, NULL, 500.00, 3, NULL),
(25, '2024-01-15 10:30:00', 'Delivery', 10.00, 'Cash', NULL, NULL, NULL, 210.00, 1, NULL),
(26, '2024-02-05 14:45:00', 'Pick-up', 0.00, 'Card', NULL, NULL, NULL, 310.00, 2, NULL),
(27, '2024-03-20 11:00:00', 'Delivery', 20.00, 'Cash', NULL, NULL, NULL, 260.00, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `login_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `logout_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` enum('Product Order','Human Resources','Point of Sales','Inventory','Finance','Delivery') NOT NULL,
  `account_info_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `Supplier_ID` int(11) NOT NULL,
  `Supplier_Name` varchar(50) DEFAULT NULL,
  `Contact_Name` varchar(35) NOT NULL,
  `Contact_Number` int(20) DEFAULT NULL,
  `Status` varchar(25) NOT NULL,
  `Email` varchar(35) NOT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `Estimated_Delivery` varchar(50) NOT NULL,
  `Shipping_fee` varchar(150) NOT NULL,
  `Working_days` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`Supplier_ID`, `Supplier_Name`, `Contact_Name`, `Contact_Number`, `Status`, `Email`, `Address`, `Estimated_Delivery`, `Shipping_fee`, `Working_days`) VALUES
(2, 'Marc Shop', 'Marc', 9128317, 'Active', 'marc@gmail.com', 'Porac', '5 - 7 Days', '20', 'Monday - Wednesday'),
(3, 'Aian\'s Bakery', 'Aian', 9278173, 'Active', 'aian@gmail.com', 'Bataan', '1 - 2 Days', '100', 'Sunday');

-- --------------------------------------------------------

--
-- Table structure for table `targetsales`
--

CREATE TABLE `targetsales` (
  `TargetID` int(11) NOT NULL,
  `MonthYear` date DEFAULT NULL,
  `TargetAmount` decimal(10,2) DEFAULT NULL,
  `EmployeeID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `targetsales`
--

INSERT INTO `targetsales` (`TargetID`, `MonthYear`, `TargetAmount`, `EmployeeID`) VALUES
(1, '2022-01-01', 5000.00, 1),
(2, '2022-02-01', 6000.00, 2),
(3, '2022-03-01', 7000.00, 3),
(4, '2022-04-01', 5500.00, 1),
(5, '2022-05-01', 6500.00, 2),
(6, '2022-06-01', 7500.00, 3),
(7, '2022-07-01', 6000.00, 1),
(8, '2022-08-01', 7000.00, 2),
(9, '2022-09-01', 8000.00, 3),
(10, '2022-10-01', 6000.00, 1),
(11, '2022-11-01', 6500.00, 2),
(12, '2022-12-01', 7500.00, 3),
(13, '2023-01-01', 6000.00, 1),
(14, '2023-02-01', 7000.00, 2),
(15, '2023-03-01', 8000.00, 3),
(16, '2023-04-01', 6500.00, 1),
(17, '2023-05-01', 7500.00, 2),
(18, '2023-06-01', 8500.00, 3),
(19, '2023-07-01', 7000.00, 1),
(20, '2023-08-01', 8000.00, 2),
(21, '2023-09-01', 9000.00, 3),
(22, '2023-10-01', 7000.00, 1),
(23, '2023-11-01', 7500.00, 2),
(24, '2023-12-01', 8500.00, 3),
(25, '2024-01-01', 6100.00, 1),
(26, '2024-02-01', 7100.00, 2),
(27, '2024-03-01', 8100.00, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tax_info`
--

CREATE TABLE `tax_info` (
  `id` int(10) NOT NULL,
  `income_tax` decimal(10,2) NOT NULL,
  `withholding_tax` decimal(10,2) NOT NULL,
  `salary_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tax_info`
--

INSERT INTO `tax_info` (`id`, `income_tax`, `withholding_tax`, `salary_id`) VALUES
(1, 14833.33, 11875.13, 1),
(2, 5416.67, 4208.33, 2),
(3, 2916.67, 2208.33, 3),
(4, 1833.33, 1375.00, 4),
(5, 833.33, 625.00, 5),
(6, 0.00, 0.00, 6);

-- --------------------------------------------------------

--
-- Table structure for table `transactiontype_de`
--

CREATE TABLE `transactiontype_de` (
  `XactTypeCode` varchar(2) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactiontype_de`
--

INSERT INTO `transactiontype_de` (`XactTypeCode`, `name`) VALUES
('Cr', 'Credit'),
('Dr', 'Debit');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_history`
--

CREATE TABLE `transaction_history` (
  `Transaction_ID` int(11) NOT NULL,
  `Batch_ID` int(11) NOT NULL,
  `Supplier_ID` int(11) NOT NULL,
  `Date_Delivered` date DEFAULT current_timestamp(),
  `Time_Delivered` time DEFAULT current_timestamp(),
  `Order_Status` varchar(50) DEFAULT NULL,
  `Feedback` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction_history`
--

INSERT INTO `transaction_history` (`Transaction_ID`, `Batch_ID`, `Supplier_ID`, `Date_Delivered`, `Time_Delivered`, `Order_Status`, `Feedback`) VALUES
(1, 1, 1, '2024-05-31', '22:23:43', 'Completed', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trucks`
--

CREATE TABLE `trucks` (
  `TruckID` int(11) NOT NULL,
  `PlateNumber` varchar(20) DEFAULT NULL,
  `TruckType` enum('Light-Duty','Heavy-Duty') DEFAULT NULL,
  `Capacity` decimal(10,2) DEFAULT NULL,
  `TruckStatus` enum('Available','In Transit','Unavailable') DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounttype`
--
ALTER TABLE `accounttype`
  ADD PRIMARY KEY (`AccountType`),
  ADD KEY `grouptype` (`grouptype`),
  ADD KEY `XactTypeCode` (`XactTypeCode`);

--
-- Indexes for table `account_info`
--
ALTER TABLE `account_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `employees_id` (`employees_id`);

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employees_id` (`employees_id`);

--
-- Indexes for table `audit_log`
--
ALTER TABLE `audit_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `batch_orders`
--
ALTER TABLE `batch_orders`
  ADD PRIMARY KEY (`Batch_ID`);

--
-- Indexes for table `benefit_info`
--
ALTER TABLE `benefit_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salary_id` (`salary_id`);

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Category_ID`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `deliveryorders`
--
ALTER TABLE `deliveryorders`
  ADD PRIMARY KEY (`DeliveryOrderID`),
  ADD KEY `SaleID` (`SaleID`),
  ADD KEY `ProductID` (`ProductID`),
  ADD KEY `TruckID` (`TruckID`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employeetrucks`
--
ALTER TABLE `employeetrucks`
  ADD KEY `EmployeeID` (`EmployeeID`),
  ADD KEY `TruckID` (`TruckID`);

--
-- Indexes for table `employment_info`
--
ALTER TABLE `employment_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employees_id` (`employees_id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`feedback_ID`);

--
-- Indexes for table `funds_transaction`
--
ALTER TABLE `funds_transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lt_id` (`lt_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `grouptype`
--
ALTER TABLE `grouptype`
  ADD PRIMARY KEY (`grouptype`);

--
-- Indexes for table `leave_requests`
--
ALTER TABLE `leave_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employees_id` (`employees_id`);

--
-- Indexes for table `ledger`
--
ALTER TABLE `ledger`
  ADD PRIMARY KEY (`ledgerno`),
  ADD KEY `AccountType` (`AccountType`);

--
-- Indexes for table `ledgertransaction`
--
ALTER TABLE `ledgertransaction`
  ADD PRIMARY KEY (`LedgerXactID`),
  ADD KEY `LedgerNo` (`LedgerNo`),
  ADD KEY `LedgerNo_Dr` (`LedgerNo_Dr`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`Order_ID`);

--
-- Indexes for table `payroll`
--
ALTER TABLE `payroll`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employees_id` (`employees_id`),
  ADD KEY `salary_id` (`salary_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `returnproducts`
--
ALTER TABLE `returnproducts`
  ADD PRIMARY KEY (`ReturnID`),
  ADD KEY `SaleID` (`SaleID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `salary_info`
--
ALTER TABLE `salary_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employees_id` (`employees_id`);

--
-- Indexes for table `saledetails`
--
ALTER TABLE `saledetails`
  ADD PRIMARY KEY (`SaleDetailID`),
  ADD KEY `SaleID` (`SaleID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`SaleID`),
  ADD KEY `EmployeeID` (`EmployeeID`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `account_info_id` (`account_info_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`Supplier_ID`);

--
-- Indexes for table `targetsales`
--
ALTER TABLE `targetsales`
  ADD PRIMARY KEY (`TargetID`),
  ADD KEY `EmployeeID` (`EmployeeID`);

--
-- Indexes for table `tax_info`
--
ALTER TABLE `tax_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salary_id` (`salary_id`);

--
-- Indexes for table `transactiontype_de`
--
ALTER TABLE `transactiontype_de`
  ADD PRIMARY KEY (`XactTypeCode`);

--
-- Indexes for table `transaction_history`
--
ALTER TABLE `transaction_history`
  ADD PRIMARY KEY (`Transaction_ID`);

--
-- Indexes for table `trucks`
--
ALTER TABLE `trucks`
  ADD PRIMARY KEY (`TruckID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounttype`
--
ALTER TABLE `accounttype`
  MODIFY `AccountType` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `account_info`
--
ALTER TABLE `account_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `audit_log`
--
ALTER TABLE `audit_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=274;

--
-- AUTO_INCREMENT for table `batch_orders`
--
ALTER TABLE `batch_orders`
  MODIFY `Batch_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `benefit_info`
--
ALTER TABLE `benefit_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `Category_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deliveryorders`
--
ALTER TABLE `deliveryorders`
  MODIFY `DeliveryOrderID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `employment_info`
--
ALTER TABLE `employment_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `feedback_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `funds_transaction`
--
ALTER TABLE `funds_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `leave_requests`
--
ALTER TABLE `leave_requests`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ledger`
--
ALTER TABLE `ledger`
  MODIFY `ledgerno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `ledgertransaction`
--
ALTER TABLE `ledgertransaction`
  MODIFY `LedgerXactID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35244;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `Order_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payroll`
--
ALTER TABLE `payroll`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `returnproducts`
--
ALTER TABLE `returnproducts`
  MODIFY `ReturnID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salary_info`
--
ALTER TABLE `salary_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `saledetails`
--
ALTER TABLE `saledetails`
  MODIFY `SaleDetailID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `SaleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `Supplier_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `targetsales`
--
ALTER TABLE `targetsales`
  MODIFY `TargetID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tax_info`
--
ALTER TABLE `tax_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaction_history`
--
ALTER TABLE `transaction_history`
  MODIFY `Transaction_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `trucks`
--
ALTER TABLE `trucks`
  MODIFY `TruckID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounttype`
--
ALTER TABLE `accounttype`
  ADD CONSTRAINT `grptype` FOREIGN KEY (`grouptype`) REFERENCES `grouptype` (`grouptype`),
  ADD CONSTRAINT `xacttype` FOREIGN KEY (`XactTypeCode`) REFERENCES `transactiontype_de` (`XactTypeCode`);

--
-- Constraints for table `account_info`
--
ALTER TABLE `account_info`
  ADD CONSTRAINT `account_info_ibfk_1` FOREIGN KEY (`employees_id`) REFERENCES `employees` (`id`);

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`employees_id`) REFERENCES `employees` (`id`);

--
-- Constraints for table `audit_log`
--
ALTER TABLE `audit_log`
  ADD CONSTRAINT `audit_log_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account_info` (`id`);

--
-- Constraints for table `benefit_info`
--
ALTER TABLE `benefit_info`
  ADD CONSTRAINT `benefit_info_ibfk_1` FOREIGN KEY (`salary_id`) REFERENCES `salary_info` (`id`);

--
-- Constraints for table `deliveryorders`
--
ALTER TABLE `deliveryorders`
  ADD CONSTRAINT `deliveryorders_ibfk_1` FOREIGN KEY (`SaleID`) REFERENCES `sales` (`SaleID`),
  ADD CONSTRAINT `deliveryorders_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`),
  ADD CONSTRAINT `deliveryorders_ibfk_3` FOREIGN KEY (`TruckID`) REFERENCES `trucks` (`TruckID`);

--
-- Constraints for table `employeetrucks`
--
ALTER TABLE `employeetrucks`
  ADD CONSTRAINT `employeetrucks_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `employeetrucks_ibfk_2` FOREIGN KEY (`TruckID`) REFERENCES `trucks` (`TruckID`);

--
-- Constraints for table `employment_info`
--
ALTER TABLE `employment_info`
  ADD CONSTRAINT `employment_info_ibfk_1` FOREIGN KEY (`employees_id`) REFERENCES `employees` (`id`);

--
-- Constraints for table `funds_transaction`
--
ALTER TABLE `funds_transaction`
  ADD CONSTRAINT `funds_transaction_ibfk_1` FOREIGN KEY (`lt_id`) REFERENCES `ledgertransaction` (`LedgerXactID`),
  ADD CONSTRAINT `funds_transaction_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`);

--
-- Constraints for table `leave_requests`
--
ALTER TABLE `leave_requests`
  ADD CONSTRAINT `leave_requests_ibfk_1` FOREIGN KEY (`employees_id`) REFERENCES `employees` (`id`);

--
-- Constraints for table `ledger`
--
ALTER TABLE `ledger`
  ADD CONSTRAINT `acctype` FOREIGN KEY (`AccountType`) REFERENCES `accounttype` (`AccountType`);

--
-- Constraints for table `ledgertransaction`
--
ALTER TABLE `ledgertransaction`
  ADD CONSTRAINT `creditLedger` FOREIGN KEY (`LedgerNo`) REFERENCES `ledger` (`ledgerno`),
  ADD CONSTRAINT `debitLedger` FOREIGN KEY (`LedgerNo_Dr`) REFERENCES `ledger` (`ledgerno`);

--
-- Constraints for table `payroll`
--
ALTER TABLE `payroll`
  ADD CONSTRAINT `payroll_ibfk_1` FOREIGN KEY (`employees_id`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `payroll_ibfk_2` FOREIGN KEY (`salary_id`) REFERENCES `salary_info` (`id`);

--
-- Constraints for table `returnproducts`
--
ALTER TABLE `returnproducts`
  ADD CONSTRAINT `returnproducts_ibfk_1` FOREIGN KEY (`SaleID`) REFERENCES `sales` (`SaleID`),
  ADD CONSTRAINT `returnproducts_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`);

--
-- Constraints for table `salary_info`
--
ALTER TABLE `salary_info`
  ADD CONSTRAINT `salary_info_ibfk_1` FOREIGN KEY (`employees_id`) REFERENCES `employees` (`id`);

--
-- Constraints for table `saledetails`
--
ALTER TABLE `saledetails`
  ADD CONSTRAINT `saledetails_ibfk_1` FOREIGN KEY (`SaleID`) REFERENCES `sales` (`SaleID`),
  ADD CONSTRAINT `saledetails_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`);

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `sales_ibfk_2` FOREIGN KEY (`CustomerID`) REFERENCES `customers` (`CustomerID`);

--
-- Constraints for table `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `session_ibfk_1` FOREIGN KEY (`account_info_id`) REFERENCES `account_info` (`id`);

--
-- Constraints for table `targetsales`
--
ALTER TABLE `targetsales`
  ADD CONSTRAINT `targetsales_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `employees` (`id`);

--
-- Constraints for table `tax_info`
--
ALTER TABLE `tax_info`
  ADD CONSTRAINT `tax_info_ibfk_1` FOREIGN KEY (`salary_id`) REFERENCES `salary_info` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
