-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 02, 2024 at 09:45 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

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

-- --------------------------------------------------------

--
-- Table structure for table `accounttype`
--

CREATE TABLE `accounttype` (
  `AccountType` int NOT NULL,
  `Description` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `grouptype` varchar(2) COLLATE utf8mb4_general_ci NOT NULL,
  `XactTypeCode` varchar(2) COLLATE utf8mb4_general_ci NOT NULL
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
  `id` int NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `role` enum('Product Order','Human Resources','Point of Sales','Inventory','Finance','Delivery') COLLATE utf8mb4_general_ci NOT NULL,
  `employees_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account_info`
--

INSERT INTO `account_info` (`id`, `username`, `password`, `role`, `employees_id`) VALUES
(1, '123', '$2y$10$8K/6vCFaTj0H6q.qpAnpCOq1X4HxVSHEs7hdgaxd6vn1X8Abu6x1u', 'Point of Sales', 1),
(2, 'bscs3a001', 'bscs3a1HR', 'Human Resources', 1),
(3, 'bscs3a002', 'bscs3a2HR', 'Human Resources', 2),
(4, 'bscs3a003', 'bscs3a3HR', 'Human Resources', 3),
(5, 'bscs3a004', 'bscs3a4HR', 'Human Resources', 4),
(6, 'bscs3a005', 'bscs3a5HR', 'Human Resources', 5),
(7, 'bscs3a006', '$2y$10$8K/6vCFaTj0H6q.qpAnpCOq1X4HxVSHEs7hdgaxd6vn1X8Abu6x1u', 'Product Order', 6);

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `id` int NOT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `first_name` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `middle_name` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `last_name` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `dateofbirth` date NOT NULL,
  `gender` enum('Male','Female') COLLATE utf8mb4_general_ci NOT NULL,
  `nationality` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `civil_status` enum('Single','Married','Divorced','Widowed') COLLATE utf8mb4_general_ci NOT NULL,
  `applyingForDepartment` enum('Product Order','Human Resources','Point of Sales','Inventory','Finance','Delivery') COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `contact_no` varchar(20) COLLATE utf8mb4_general_ci DEFAULT 'N/A',
  `email` varchar(30) COLLATE utf8mb4_general_ci DEFAULT 'Email not available',
  `applyingForPosition` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `apply_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int NOT NULL,
  `attendance_date` date NOT NULL,
  `clock_in` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `clock_out` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `employees_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `audit_log`
--

CREATE TABLE `audit_log` (
  `id` int NOT NULL,
  `account_id` int NOT NULL,
  `datetime` datetime NOT NULL,
  `action` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `audit_log`
--

INSERT INTO `audit_log` (`id`, `account_id`, `datetime`, `action`) VALUES
(1, 1, '2024-05-31 09:21:44', 'POST: /sales/addSales'),
(2, 1, '2024-05-31 09:46:49', 'GET: /sales/sls/Audit-Logs/page=1'),
(3, 1, '2024-05-31 09:47:18', 'GET: /sales/sls/Audit-Logs/page=1'),
(4, 1, '2024-05-31 09:47:24', 'GET: /sales/sls/Audit-Logs/page=1'),
(5, 1, '2024-05-31 09:47:32', 'GET: /sales/sls/Audit-Logs/page=1'),
(6, 1, '2024-05-31 09:47:42', 'GET: /sales/sls/Audit-Logs/page=1'),
(7, 1, '2024-05-31 09:48:03', 'POST: /sales/logout'),
(8, 1, '2024-05-31 09:48:10', 'POST: /sales/login'),
(9, 1, '2024-05-31 09:48:15', 'GET: /sales/sls/Audit-Logs/page=1'),
(10, 1, '2024-05-31 09:48:44', 'POST: /sales/addSales'),
(11, 1, '2024-05-31 09:52:52', 'POST: /sales/addSales'),
(12, 1, '2024-05-31 09:52:57', 'GET: /sales/sls/Audit-Logs/page=1'),
(13, 1, '2024-05-31 10:17:24', 'GET: /sales/sls/funds/Sales/page=1'),
(14, 1, '2024-05-31 10:17:32', 'GET: /sales/sls/Transaction-Details/sale=28'),
(15, 1, '2024-05-31 10:17:37', 'GET: /sales/sls/ReturnProduct/sale=28/saledetails=1/product=3'),
(16, 1, '2024-05-31 10:17:41', 'POST: /sales/returnProduct'),
(17, 1, '2024-05-31 10:29:15', 'POST: /sales/AddTarget'),
(18, 1, '2024-05-31 10:29:53', 'GET: /sales/sls/Audit-Logs/page=1'),
(19, 1, '2024-05-31 10:30:00', 'GET: /sales/sls/funds/Sales/page=1'),
(20, 1, '2024-05-31 10:30:11', 'GET: /sales/sls/Audit-Logs/page=1'),
(21, 1, '2024-05-31 10:30:28', 'GET: /sales/sls/Audit-Logs/page=2'),
(22, 1, '2024-05-31 10:30:32', 'GET: /sales/sls/Audit-Logs/page=1'),
(23, 1, '2024-05-31 10:30:44', 'POST: /sales/auditlogSearch'),
(24, 1, '2024-05-31 10:30:50', 'GET: /sales/sls/Audit-Logs/page=1'),
(25, 1, '2024-05-31 10:30:58', 'POST: /sales/auditlogSearch'),
(26, 1, '2024-05-31 10:31:53', 'POST: /sales/logout'),
(27, 1, '2024-05-31 10:32:53', 'POST: /sales/login'),
(28, 1, '2024-05-31 10:32:59', 'GET: /sales/sls/Transaction-Details/sale=30'),
(29, 1, '2024-05-31 10:33:02', 'GET: /sales/sls/ReturnProduct/sale=30/saledetails=4/product=1'),
(30, 1, '2024-05-31 10:33:10', 'POST: /sales/returnProduct'),
(31, 1, '2024-05-31 10:33:17', 'GET: /sales/sls/funds/Sales/page=1'),
(32, 7, '2024-06-01 05:20:59', 'POST: /master/login'),
(33, 7, '2024-06-01 05:24:35', 'POST: /master/login'),
(34, 7, '2024-06-01 05:25:17', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(35, 7, '2024-06-01 05:25:52', 'POST: /master/placeorder/supplier/'),
(36, 7, '2024-06-01 05:26:02', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(37, 7, '2024-06-01 05:27:23', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(38, 7, '2024-06-01 05:27:56', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(39, 7, '2024-06-01 05:28:02', 'GET: /master/po/viewsupplierproduct/Supplier=3'),
(40, 7, '2024-06-01 05:28:05', 'GET: /master/po/suppliers'),
(41, 7, '2024-06-01 05:28:06', 'GET: /master/po/transactionHistory'),
(42, 7, '2024-06-01 05:28:07', 'GET: /master/po/dashboard'),
(43, 7, '2024-06-01 05:28:08', 'GET: /master/po/orderDetail'),
(44, 7, '2024-06-01 05:28:08', 'GET: /master/po/transactionHistory'),
(45, 7, '2024-06-01 05:28:09', 'GET: /master/po/pondo'),
(46, 7, '2024-06-01 05:28:10', 'GET: /master/po/orderDetail'),
(47, 7, '2024-06-01 05:28:11', 'GET: /master/po/suppliers'),
(48, 7, '2024-06-01 05:28:14', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(49, 7, '2024-06-01 05:28:20', 'GET: /master/po/suppliers'),
(50, 7, '2024-06-01 05:28:21', 'GET: /master/po/orderDetail'),
(51, 7, '2024-06-01 05:28:22', 'GET: /master/po/transactionHistory'),
(52, 7, '2024-06-01 05:28:22', 'GET: /master/po/pondo'),
(53, 7, '2024-06-01 05:28:22', 'GET: /master/po/suppliers'),
(54, 7, '2024-06-01 05:28:23', 'GET: /master/po/dashboard'),
(55, 7, '2024-06-01 05:28:24', 'GET: /master/po/suppliers'),
(56, 7, '2024-06-01 05:28:36', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(57, 7, '2024-06-01 05:28:53', 'GET: /master/po/suppliers'),
(58, 7, '2024-06-01 05:28:53', 'GET: /master/po/pondo'),
(59, 7, '2024-06-01 05:29:00', 'GET: /master/po/dashboard'),
(60, 7, '2024-06-01 05:29:01', 'GET: /master/po/orderDetail'),
(61, 7, '2024-06-01 05:29:02', 'GET: /master/po/suppliers'),
(62, 7, '2024-06-01 05:29:03', 'GET: /master/po/transactionHistory'),
(63, 7, '2024-06-01 05:29:04', 'GET: /master/po/orderDetail'),
(64, 7, '2024-06-01 05:29:04', 'GET: /master/po/transactionHistory'),
(65, 7, '2024-06-01 05:29:05', 'GET: /master/po/orderDetail'),
(66, 7, '2024-06-01 05:29:05', 'GET: /master/po/suppliers'),
(67, 7, '2024-06-01 05:29:06', 'GET: /master/po/orderDetail'),
(68, 7, '2024-06-01 05:29:07', 'GET: /master/po/transactionHistory'),
(69, 7, '2024-06-01 05:29:07', 'GET: /master/po/orderDetail'),
(70, 7, '2024-06-01 05:29:08', 'GET: /master/po/dashboard'),
(71, 7, '2024-06-01 05:29:09', 'GET: /master/po/dashboard'),
(72, 7, '2024-06-01 05:29:09', 'GET: /master/po/suppliers'),
(73, 7, '2024-06-01 05:29:10', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(74, 7, '2024-06-01 05:29:30', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(75, 7, '2024-06-01 05:29:33', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(76, 7, '2024-06-01 05:29:59', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(77, 7, '2024-06-01 05:30:03', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(78, 7, '2024-06-01 05:30:07', 'GET: /master/po/suppliers'),
(79, 7, '2024-06-01 05:30:08', 'GET: /master/po/suppliers'),
(80, 7, '2024-06-01 05:30:09', 'GET: /master/po/dashboard'),
(81, 7, '2024-06-01 05:30:09', 'GET: /master/po/orderDetail'),
(82, 7, '2024-06-01 05:30:09', 'GET: /master/po/transactionHistory'),
(83, 7, '2024-06-01 05:30:10', 'GET: /master/po/pondo'),
(84, 7, '2024-06-01 05:30:10', 'GET: /master/po/suppliers'),
(85, 7, '2024-06-01 05:30:11', 'GET: /master/po/dashboard'),
(86, 7, '2024-06-01 05:30:19', 'GET: /master/po/orderDetail'),
(87, 7, '2024-06-01 05:30:19', 'GET: /master/po/suppliers'),
(88, 7, '2024-06-01 05:30:21', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(89, 7, '2024-06-01 05:31:11', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(90, 7, '2024-06-01 05:32:46', 'GET: /master/po/suppliers'),
(91, 7, '2024-06-01 05:32:47', 'GET: /master/po/pondo'),
(92, 7, '2024-06-01 05:33:53', 'GET: /master/po/pondo'),
(93, 7, '2024-06-01 05:33:53', 'GET: /master/po/dashboard'),
(94, 7, '2024-06-01 05:33:54', 'GET: /master/po/orderDetail'),
(95, 7, '2024-06-01 05:33:54', 'GET: /master/po/suppliers'),
(96, 7, '2024-06-01 05:33:55', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(97, 7, '2024-06-01 05:33:56', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(98, 7, '2024-06-01 05:34:57', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(99, 7, '2024-06-01 05:34:57', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(100, 7, '2024-06-01 05:34:57', 'GET: /master/po/viewsupplierproduct/Supplier=2'),
(101, 1, '2024-06-01 12:32:31', 'POST: /master/login'),
(102, 1, '2024-06-01 12:32:40', 'POST: /master/login'),
(103, 1, '2024-06-01 12:37:34', 'POST: /master/login'),
(104, 1, '2024-06-01 12:45:28', 'GET: /master/inv/req-finance/page=1'),
(105, 1, '2024-06-01 12:46:51', 'GET: /master/inv/req-finance/page=1'),
(106, 1, '2024-06-01 12:47:11', 'GET: /master/inv/req-finance/page=1'),
(107, 1, '2024-06-01 12:47:16', 'GET: /master/inv/req-finance/page=1'),
(108, 1, '2024-06-01 12:50:36', 'GET: /master/inv/req-finance/page=1'),
(109, 1, '2024-06-01 12:51:37', 'GET: /master/inv/req-finance/page=1'),
(110, 1, '2024-06-01 12:51:53', 'GET: /master/inv/req-finance/page=1'),
(111, 1, '2024-06-01 12:52:03', 'GET: /master/inv/req-finance/page=1'),
(112, 1, '2024-06-01 12:52:14', 'GET: /master/inv/req-finance/page=1'),
(113, 1, '2024-06-01 12:52:22', 'GET: /master/inv/req-finance/page=1'),
(114, 1, '2024-06-01 12:53:00', 'GET: /master/inv/req-finance/page=1'),
(115, 1, '2024-06-01 12:53:13', 'GET: /master/inv/req-finance/page=1'),
(116, 1, '2024-06-01 12:53:30', 'GET: /master/inv/req-finance/page=1'),
(117, 1, '2024-06-01 12:54:20', 'GET: /master/inv/req-finance/page=1'),
(118, 1, '2024-06-01 12:54:35', 'GET: /master/inv/req-finance/page=1'),
(119, 1, '2024-06-01 12:54:37', 'GET: /master/inv/req-finance/page=1'),
(120, 1, '2024-06-01 12:55:25', 'GET: /master/inv/req-finance/page=2'),
(121, 1, '2024-06-01 12:55:28', 'GET: /master/inv/req-finance/page=1'),
(122, 1, '2024-06-01 12:56:21', 'GET: /master/inv/req-finance/page=1'),
(123, 1, '2024-06-01 12:56:30', 'GET: /master/inv/req-finance/page=1'),
(124, 1, '2024-06-01 12:56:35', 'GET: /master/inv/req-finance/page=1'),
(125, 1, '2024-06-01 12:56:38', 'GET: /master/inv/req-finance/page=1'),
(126, 1, '2024-06-01 12:57:29', 'GET: /master/inv/req-finance/page=1'),
(127, 1, '2024-06-01 12:57:34', 'GET: /master/inv/req-finance/page=1'),
(128, 1, '2024-06-01 12:58:23', 'GET: /master/inv/req-finance/page=1'),
(129, 1, '2024-06-01 12:58:46', 'GET: /master/inv/req-finance/page=1'),
(130, 1, '2024-06-01 12:58:50', 'GET: /master/inv/req-finance/page=1'),
(131, 1, '2024-06-01 12:59:37', 'GET: /master/inv/req-finance/page=1'),
(132, 1, '2024-06-01 13:00:01', 'GET: /master/inv/req-finance/page=1'),
(133, 1, '2024-06-01 13:01:41', 'GET: /master/inv/req-finance/page=1'),
(134, 1, '2024-06-01 13:02:07', 'GET: /master/inv/req-finance/page=1'),
(135, 1, '2024-06-01 13:02:16', 'GET: /master/inv/req-finance/page=1'),
(136, 1, '2024-06-01 13:02:18', 'GET: /master/inv/req-finance/page=1'),
(137, 1, '2024-06-01 13:02:58', 'GET: /master/inv/req-finance/page=1'),
(138, 1, '2024-06-01 13:03:17', 'GET: /master/inv/req-finance/page=1'),
(139, 1, '2024-06-01 13:03:34', 'GET: /master/inv/req-finance/page=1'),
(140, 1, '2024-06-01 13:03:43', 'GET: /master/inv/req-finance/page=1'),
(141, 1, '2024-06-01 13:03:49', 'GET: /master/inv/req-finance/page=1'),
(142, 1, '2024-06-01 13:03:57', 'GET: /master/inv/req-finance/page=1'),
(143, 1, '2024-06-01 13:14:23', 'GET: /master/inv/req-finance/page=1'),
(144, 1, '2024-06-02 05:51:15', 'POST: /master/login'),
(145, 1, '2024-06-02 05:51:59', 'GET: /master/inv/req-finance/page=1'),
(146, 1, '2024-06-02 06:02:38', 'GET: /master/inv/req-finance/page=1'),
(147, 1, '2024-06-02 06:57:47', 'POST: /master/login'),
(148, 1, '2024-06-02 07:15:03', 'GET: /master/inv/req-finance/page=1'),
(149, 1, '2024-06-02 07:15:05', 'GET: /master/inv/req-finance/page=1'),
(150, 1, '2024-06-02 07:26:14', 'POST: /master/login'),
(151, 1, '2024-06-02 08:08:52', 'POST: /master/inv/add-prod'),
(152, 1, '2024-06-02 08:11:11', 'POST: /master/inv/add-prod'),
(153, 1, '2024-06-02 08:11:18', 'POST: /master/inv/add-prod'),
(154, 1, '2024-06-02 08:14:02', 'POST: /master/inv/add-prod'),
(155, 1, '2024-06-02 08:16:51', 'POST: /master/inv/add-prod'),
(156, 1, '2024-06-02 08:25:28', 'POST: /master/inv/add-prod'),
(157, 1, '2024-06-02 08:25:36', 'POST: /master/inv/add-prod'),
(158, 1, '2024-06-02 08:25:49', 'POST: /master/inv/add-prod'),
(159, 1, '2024-06-02 08:26:25', 'GET: /master/inv/prod-edit=5'),
(160, 1, '2024-06-02 08:26:29', 'GET: /master/inv/prod-edit=416'),
(161, 1, '2024-06-02 09:06:41', 'POST: /master/inv/request-prod-ord'),
(162, 1, '2024-06-02 09:07:49', 'POST: /master/inv/request-prod-ord'),
(163, 1, '2024-06-02 09:09:48', 'POST: /master/inv/request-prod-ord'),
(164, 1, '2024-06-02 09:09:56', 'POST: /master/inv/request-prod-ord'),
(165, 1, '2024-06-02 09:10:31', 'POST: /master/inv/request-prod-ord'),
(166, 1, '2024-06-02 09:14:33', 'POST: /master/inv/request-prod-ord'),
(167, 1, '2024-06-02 09:15:26', 'POST: /master/inv/request-prod-ord'),
(168, 1, '2024-06-02 09:15:33', 'POST: /master/inv/request-prod-ord'),
(169, 1, '2024-06-02 09:17:14', 'POST: /master/inv/request-prod-ord'),
(170, 1, '2024-06-02 09:18:20', 'POST: /master/inv/update-prod'),
(171, 1, '2024-06-02 09:18:50', 'POST: /master/inv/update-prod'),
(172, 1, '2024-06-02 09:19:03', 'POST: /master/inv/delete-prod'),
(173, 1, '2024-06-02 09:19:42', 'POST: /master/inv/delete-prod'),
(174, 1, '2024-06-02 09:19:51', 'POST: /master/inv/delete-prod'),
(175, 1, '2024-06-02 09:19:56', 'POST: /master/inv/delete-prod'),
(176, 1, '2024-06-02 09:37:14', 'POST: /master/inv/delete-returns'),
(177, 1, '2024-06-02 09:37:41', 'POST: /master/inv/delete-returns'),
(178, 1, '2024-06-02 09:37:45', 'POST: /master/inv/delete-returns'),
(179, 1, '2024-06-02 09:40:35', 'GET: /master/inv/req-finance/page=1'),
(180, 1, '2024-06-02 09:42:07', 'GET: /master/inv/req-finance/page=1'),
(181, 1, '2024-06-02 09:42:16', 'GET: /master/inv/req-finance/page=1'),
(182, 1, '2024-06-02 09:43:33', 'POST: /master/inv/add-prod'),
(183, 1, '2024-06-02 09:43:50', 'GET: /master/inv/req-finance/page=1'),
(184, 1, '2024-06-02 09:44:22', 'GET: /master/inv/req-finance/page=1'),
(185, 1, '2024-06-02 09:44:23', 'GET: /master/inv/req-finance/page=1'),
(186, 1, '2024-06-02 09:44:52', 'GET: /master/inv/req-finance/page=1');

-- --------------------------------------------------------

--
-- Table structure for table `benefit_info`
--

CREATE TABLE `benefit_info` (
  `id` int NOT NULL,
  `philhealth` decimal(10,2) NOT NULL,
  `sss_fund` decimal(10,2) NOT NULL,
  `pagibig_fund` decimal(10,2) NOT NULL,
  `thirteenth_month` decimal(10,2) NOT NULL,
  `salary_id` int NOT NULL
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
  `id` int NOT NULL,
  `event_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `date` date NOT NULL,
  `day` enum('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday') COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `Category_ID` int NOT NULL,
  `Category_Name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
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
  `CustomerID` int NOT NULL,
  `FirstName` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `LastName` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Phone` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Email` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`CustomerID`, `FirstName`, `LastName`, `Phone`, `Email`) VALUES
(1, 'Karleigh', 'Clark', '+1 (808) 268-2524', 'xylepysyr@mailinator.com'),
(2, 'Jayme', 'Fisher', '+1 (368) 738-9216', 'xylepysyr@mailinator.com'),
(3, 'Jayme', 'Fisher', '+1 (368) 738-9216', 'xylepysyr@mailinator.com');

-- --------------------------------------------------------

--
-- Table structure for table `deliveryorders`
--

CREATE TABLE `deliveryorders` (
  `DeliveryOrderID` int NOT NULL,
  `SaleID` int DEFAULT NULL,
  `ProductID` int DEFAULT NULL,
  `Quantity` int DEFAULT NULL,
  `ProductWeight` decimal(10,2) DEFAULT NULL,
  `Province` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Municipality` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `StreetBarangayAddress` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `DeliveryDate` date DEFAULT NULL,
  `ReceivedDate` date DEFAULT NULL,
  `DeliveryStatus` enum('Pending','In Transit','Delivered','Failed to deliver') COLLATE utf8mb4_general_ci DEFAULT 'Pending',
  `TruckID` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deliveryorders`
--

INSERT INTO `deliveryorders` (`DeliveryOrderID`, `SaleID`, `ProductID`, `Quantity`, `ProductWeight`, `Province`, `Municipality`, `StreetBarangayAddress`, `DeliveryDate`, `ReceivedDate`, `DeliveryStatus`, `TruckID`) VALUES
(1, 28, 2, 21, 16.80, 'Pampanga', 'San Fernando', 'aasas', '2024-06-07', NULL, 'Pending', NULL),
(2, 28, 3, 14, 700.00, 'Pampanga', 'San Fernando', 'aasas', '2024-06-07', NULL, 'Pending', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int NOT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `first_name` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `middle_name` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `last_name` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `dateofbirth` date NOT NULL,
  `gender` enum('Male','Female') COLLATE utf8mb4_general_ci NOT NULL,
  `nationality` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `contact_no` varchar(20) COLLATE utf8mb4_general_ci DEFAULT 'N/A',
  `email` varchar(30) COLLATE utf8mb4_general_ci DEFAULT 'N/A',
  `civil_status` enum('Single','Married','Divorced','Widowed') COLLATE utf8mb4_general_ci NOT NULL,
  `department` enum('Product Order','Human Resources','Point of Sales','Inventory','Finance','Delivery') COLLATE utf8mb4_general_ci NOT NULL,
  `position` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `sss_number` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `philhealth_number` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tin_number` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pagibig_number` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `image_url`, `first_name`, `middle_name`, `last_name`, `dateofbirth`, `gender`, `nationality`, `address`, `contact_no`, `email`, `civil_status`, `department`, `position`, `sss_number`, `philhealth_number`, `tin_number`, `pagibig_number`) VALUES
(1, '123', 'bs', 'cs', '3a', '2024-05-01', 'Male', 'filipino', 'america', 'N/A', 'N/A', 'Single', 'Inventory', 'manager', '123', '123', '12', '123'),
(2, 'https://pbs.twimg.com/profile_images/1776936838118404096/cxF34bgy_400x400.jpg', 'Jarelle Anne', 'Cañada', 'Pamintuan', '2001-08-31', 'Female', 'Filipino', 'Rias-Eveland Boulevard', '09675222420', 'jarelleannepamintuan@gmail.com', 'Single', 'Human Resources', 'HR Manager/Director', '3934191496', '254323228890', '811863948', '077652901241'),
(3, 'https://pbs.twimg.com/profile_images/1556154158860107776/1eTSWQJx_400x400.jpg', 'Ziggy', 'Castro', 'Co', '2001-12-19', 'Female', 'Filipino', 'Pampanga', '09123456789', 'ziggyco@example.com', 'Single', 'Human Resources', 'Compensation and Benefits Specialist', '9842683190', '222904801483', '398938596', '393260427062'),
(4, 'https://pbs.twimg.com/profile_images/1591010546899308544/9_n476w9_400x400.png', 'Nathaniel', '', 'Fernandez', '2003-04-06', 'Male', 'Filipino', 'Pampanga', '09123456789', 'nathZ@example.com', 'Single', 'Human Resources', 'HR Legal Compliance Specialist', '3217127657', '982459800458', '175523699', '723082092314'),
(5, 'https://pbs.twimg.com/profile_images/1746139769342742528/cDQRzJIV_400x400.jpg', 'Emmanuel Louise', '', 'Gonzales', '2001-01-27', 'Male', 'Filipino', 'Pampanga', '09123456789', 'emman@example.com', 'Divorced', 'Human Resources', 'Recruiter', '3831913601', '296757397697', '136729120', '687715123719'),
(6, '/master/public/humanResources/img/noPhotoAvailable.png', 'Joshua', '', 'Casupang', '2003-06-21', 'Male', 'Filipino', 'Pampanga', '09123456789', 'joshua@example.com', 'Married', 'Product Order', 'HR Coordinator', '1788631721', '493539660119', '579494717', '254144900265'),
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
  `EmployeeID` int DEFAULT NULL,
  `TruckID` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employment_info`
--

CREATE TABLE `employment_info` (
  `id` int NOT NULL,
  `dateofhire` date NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date DEFAULT NULL,
  `employees_id` int NOT NULL
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
-- Table structure for table `funds_transaction`
--

CREATE TABLE `funds_transaction` (
  `id` int NOT NULL,
  `employee_id` int NOT NULL,
  `lt_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `funds_transaction`
--

INSERT INTO `funds_transaction` (`id`, `employee_id`, `lt_id`) VALUES
(7, 1, 33828),
(19, 1, 33860),
(20, 1, 33862),
(21, 1, 35232),
(22, 1, 35239),
(23, 1, 35240);

-- --------------------------------------------------------

--
-- Table structure for table `grouptype`
--

CREATE TABLE `grouptype` (
  `grouptype` varchar(2) COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
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
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int NOT NULL,
  `stock_id` int NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `product` varchar(255) NOT NULL,
  `price` bigint NOT NULL,
  `quantity` int NOT NULL,
  `category` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
);

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `stock_id`, `image`, `product`, `price`, `quantity`, `category`, `status`, `date_added`) VALUES
(6, 3, NULL, 'Cement (50kg)', 240, 5000, 'Building Materials', 'Overstock', '2024-06-02 01:43:33');

-- --------------------------------------------------------

--
-- Table structure for table `inventoryorders`
--

CREATE TABLE `inventoryorders` (
  `order_id` int NOT NULL,
  `product_name` text NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `date_ordered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
);

--
-- Dumping data for table `inventoryorders`
--

INSERT INTO `inventoryorders` (`order_id`, `product_name`, `product_id`, `quantity`, `date_ordered`) VALUES
(2, 'Screwdriver Set (Standard)', 2, 155, '2024-06-02 01:17:14');

-- --------------------------------------------------------

--
-- Table structure for table `leave_requests`
--

CREATE TABLE `leave_requests` (
  `id` int NOT NULL,
  `type` enum('Sick Leave','Vacation Leave','5 Days Forced Leave','Special Privilege Leave','Maternity Leave','Paternity Leave','Parental Leave','Rehabilitation Leave','Special Leave (For Women)','Study Leave','Terminal Leave','Special Emergency Leave') COLLATE utf8mb4_general_ci NOT NULL,
  `details` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date_submitted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` enum('Pending','Approved','Denied') COLLATE utf8mb4_general_ci DEFAULT 'Pending',
  `employees_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ledger`
--

CREATE TABLE `ledger` (
  `ledgerno` int NOT NULL,
  `AccountType` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `contactIfLE` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `contactName` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
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
  `LedgerXactID` int NOT NULL,
  `LedgerNo` int NOT NULL,
  `DateTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `LedgerNo_Dr` int NOT NULL,
  `amount` double NOT NULL,
  `details` text COLLATE utf8mb4_general_ci
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
(35232, 4, '2024-05-31 06:06:39', 2, 10, 'Pondo expense for Point of Sales'),
(35233, 11, '2024-05-31 15:21:44', 3, 23709, 'made a sale with tax'),
(35234, 11, '2024-05-31 15:48:44', 3, 658, 'made a sale with tax'),
(35235, 11, '2024-05-31 15:52:52', 3, 658, 'made a sale with tax'),
(35236, 29, '2024-05-31 15:52:52', 18, 78.96, 'made a sale with tax'),
(35237, 3, '2024-05-31 10:17:41', 14, 1075.2, 'Sales return'),
(35238, 3, '2024-05-31 10:33:10', 14, 368.48, 'Sales return'),
(35239, 4, '2024-05-31 18:21:44', 1, 20, 'Pondo expense for Product Order'),
(35240, 4, '2024-05-31 18:27:39', 1, 20, 'Pondo expense for Product Order');

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

CREATE TABLE `payroll` (
  `id` int NOT NULL,
  `pay_date` date NOT NULL,
  `month` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `monthly_salary` decimal(10,2) NOT NULL,
  `status` enum('Pending','Paid') COLLATE utf8mb4_general_ci DEFAULT 'Pending',
  `salary_id` int NOT NULL,
  `employees_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductID` int NOT NULL,
  `Supplier_ID` int NOT NULL,
  `Category_ID` int NOT NULL,
  `ProductImage` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `ProductName` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Supplier` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Description` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Category` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `DeliveryRequired` varchar(3) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL,
  `Supplier_Price` decimal(10,2) DEFAULT NULL,
  `Stocks` int DEFAULT NULL,
  `UnitOfMeasurement` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `TaxRate` decimal(5,2) DEFAULT NULL,
  `ProductWeight` decimal(10,2) DEFAULT NULL,
  `Status` varchar(35) COLLATE utf8mb4_general_ci NOT NULL,
  `Availability` varchar(35) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductID`, `Supplier_ID`, `Category_ID`, `ProductImage`, `ProductName`, `Supplier`, `Description`, `Category`, `DeliveryRequired`, `Price`, `Supplier_Price`, `Stocks`, `UnitOfMeasurement`, `TaxRate`, `ProductWeight`, `Status`, `Availability`) VALUES
(1, 2, 1, 'uploads/Hammer_(Large).png', 'Hammer (Large)', 'Marc Shop', 'Heavy-duty hammer for construction work', 'Tools', NULL, 329.00, 200.00, 1, 'pcs', 0.12, 1.50, '', 'Available'),
(2, 2, 1, 'uploads/Screwdriver_Set_(Standard).png', 'Screwdriver Set (Standard)', 'Marc Shop', 'Set of 6 screwdrivers with various sizes', 'Tools', NULL, 969.00, 700.00, 2, 'set', 0.12, 0.80, '', 'Available'),
(3, 2, 2, 'uploads/Cement_(50kg).png', 'Cement (50kg)', 'Marc Shop', 'Portland cement for construction purposes', 'Building Materials', NULL, 240.00, 180.00, 3, 'pcs', 0.12, 50.00, '', 'Available'),
(4, 2, 2, 'uploads/Gravel_(1_ton).png', 'Gravel (1 ton)', 'Marc Shop', 'Crushed stone for construction projects', 'Building Materials', NULL, 550.00, 400.00, NULL, 'ton', 0.12, 907.19, '', 'Available'),
(5, 2, 3, 'uploads/Paint_Brush_Set.png', 'Paint Brush Set', 'Marc Shop', 'Set of 10 paint brushes for art projects', 'Art Supplies', NULL, 209.00, 150.00, NULL, 'set', 0.12, 0.50, '', 'Available'),
(6, 3, 2, 'uploads/Galvanized_Nails_(5_lbs).png', 'Galvanized Nails (5 lbs)', 'Aian\'s Bakery', 'Galvanized nails for various construction applicat...', 'Building Materials', NULL, 50.00, 35.00, NULL, 'lbs', 0.12, 2.27, '', 'Available'),
(7, 3, 2, 'uploads/Concrete_Blocks_(Standard).png', 'Concrete Blocks (Standard)', 'Aian\'s Bakery', 'Standard concrete blocks for building walls', 'Building Materials', NULL, 12.00, 8.00, NULL, 'pcs', 0.12, 2.30, '', 'Available'),
(35, 2, 1, 'uploads/Insulation_Foam_Board_(4x8_feet).png', 'lols', 'Marc Shop', 'xD', 'Tools', NULL, 123.00, 415.00, NULL, '221', 0.12, 123.00, '', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `Request_ID` int NOT NULL,
  `Product_Quantity` int DEFAULT NULL,
  `Product_Total_Price` int DEFAULT NULL,
  `Items_Subtotal` int DEFAULT NULL,
  `Total_Amount` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `returnproducts`
--

CREATE TABLE `returnproducts` (
  `ReturnID` int NOT NULL,
  `SaleID` int DEFAULT NULL,
  `ProductID` int DEFAULT NULL,
  `Quantity` int DEFAULT NULL,
  `Reason` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `PaymentReturned` decimal(10,2) DEFAULT NULL,
  `ProductStatus` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ReturnDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `returnproducts`
--

INSERT INTO `returnproducts` (`ReturnID`, `SaleID`, `ProductID`, `Quantity`, `Reason`, `PaymentReturned`, `ProductStatus`, `ReturnDate`) VALUES
(1, 28, 3, 4, 'Sit eveniet amet c', 1075.20, 'Defective', '2024-05-31 00:17:41');

-- --------------------------------------------------------

--
-- Table structure for table `salary_info`
--

CREATE TABLE `salary_info` (
  `id` int NOT NULL,
  `monthly_salary` decimal(10,2) NOT NULL,
  `daily_rate` decimal(10,2) NOT NULL,
  `total_deductions` decimal(10,2) NOT NULL,
  `total_salary` decimal(10,2) NOT NULL,
  `employees_id` int NOT NULL
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
  `SaleDetailID` int NOT NULL,
  `SaleID` int DEFAULT NULL,
  `ProductID` int DEFAULT NULL,
  `Quantity` int DEFAULT NULL,
  `ProductWeight` decimal(10,2) DEFAULT NULL,
  `UnitPrice` decimal(10,2) DEFAULT NULL,
  `Subtotal` decimal(10,2) DEFAULT NULL,
  `Tax` decimal(10,2) DEFAULT NULL,
  `TotalAmount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `saledetails`
--

INSERT INTO `saledetails` (`SaleDetailID`, `SaleID`, `ProductID`, `Quantity`, `ProductWeight`, `UnitPrice`, `Subtotal`, `Tax`, `TotalAmount`) VALUES
(1, 28, 2, 21, 16.80, 969.00, 20349.00, 116.28, 22790.88),
(2, 28, 3, 14, 700.00, 240.00, 3360.00, 28.80, 3763.20),
(3, 29, 1, 2, 3.00, 329.00, 658.00, 39.48, 736.96),
(4, 30, 1, 2, 3.00, 329.00, 658.00, 39.48, 736.96);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `SaleID` int NOT NULL,
  `SaleDate` datetime DEFAULT NULL,
  `SalePreference` enum('Delivery','Pick-up') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ShippingFee` decimal(10,2) DEFAULT NULL,
  `PaymentMode` enum('Cash','Card') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `CardNumber` varchar(16) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ExpiryDate` text COLLATE utf8mb4_general_ci,
  `CVV` varchar(3) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `TotalAmount` decimal(10,2) DEFAULT NULL,
  `EmployeeID` int DEFAULT NULL,
  `CustomerID` int DEFAULT NULL
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
(27, '2024-03-20 11:00:00', 'Delivery', 20.00, 'Cash', NULL, NULL, NULL, 260.00, 3, NULL),
(28, '2024-05-31 15:21:44', 'Delivery', 0.00, 'Cash', '', '', '', 26554.08, NULL, 1),
(29, '2024-05-31 15:48:44', 'Pick-up', 0.00, 'Cash', '', '', '', 736.96, NULL, 2),
(30, '2024-05-31 15:52:52', 'Pick-up', 0.00, 'Cash', '', '', '', 736.96, NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` int NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `login_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `logout_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role` enum('Product Order','Human Resources','Point of Sales','Inventory','Finance','Delivery') COLLATE utf8mb4_general_ci NOT NULL,
  `account_info_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `Supplier_ID` int NOT NULL,
  `Supplier_Name` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Contact_Name` varchar(35) COLLATE utf8mb4_general_ci NOT NULL,
  `Contact_Number` int DEFAULT NULL,
  `Status` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `Email` varchar(35) COLLATE utf8mb4_general_ci NOT NULL,
  `Address` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Estimated_Delivery` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Shipping_fee` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `Working_days` varchar(150) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`Supplier_ID`, `Supplier_Name`, `Contact_Name`, `Contact_Number`, `Status`, `Email`, `Address`, `Estimated_Delivery`, `Shipping_fee`, `Working_days`) VALUES
(1, 'Tester', 'Test', 123456789, 'Inactive', 'test@gmail.com', 'Test', '1 Day', '666', 'Monday'),
(2, 'Marc Shop', 'Marc', 9128317, 'Active', 'marc@gmail.com', 'Porac', '5 - 7 Days', '20', 'Monday - Wednesday'),
(3, 'Aian\'s Bakery', 'Aian', 9278173, 'Active', 'aian@gmail.com', 'Bataan', '1 - 2 Days', '100', 'Sunday');

-- --------------------------------------------------------

--
-- Table structure for table `targetsales`
--

CREATE TABLE `targetsales` (
  `TargetID` int NOT NULL,
  `MonthYear` date DEFAULT NULL,
  `TargetAmount` decimal(10,2) DEFAULT NULL,
  `EmployeeID` int DEFAULT NULL
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
(27, '2024-03-01', 8100.00, 3),
(28, '2024-05-01', 55000.00, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tax_info`
--

CREATE TABLE `tax_info` (
  `id` int NOT NULL,
  `income_tax` decimal(10,2) NOT NULL,
  `withholding_tax` decimal(10,2) NOT NULL,
  `salary_id` int NOT NULL
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
  `XactTypeCode` varchar(2) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactiontype_de`
--

INSERT INTO `transactiontype_de` (`XactTypeCode`, `name`) VALUES
('Cr', 'Credit'),
('Dr', 'Debit');

-- --------------------------------------------------------

--
-- Table structure for table `trucks`
--

CREATE TABLE `trucks` (
  `TruckID` int NOT NULL,
  `PlateNumber` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `TruckType` enum('Light-Duty','Heavy-Duty') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Capacity` decimal(10,2) DEFAULT NULL,
  `TruckStatus` enum('Available','In Transit','Unavailable') COLLATE utf8mb4_general_ci DEFAULT 'Available'
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
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `stock_id` (`stock_id`);

--
-- Indexes for table `inventoryorders`
--
ALTER TABLE `inventoryorders`
  ADD PRIMARY KEY (`order_id`);

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
  MODIFY `AccountType` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `account_info`
--
ALTER TABLE `account_info`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `audit_log`
--
ALTER TABLE `audit_log`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT for table `benefit_info`
--
ALTER TABLE `benefit_info`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `Category_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `CustomerID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `deliveryorders`
--
ALTER TABLE `deliveryorders`
  MODIFY `DeliveryOrderID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `employment_info`
--
ALTER TABLE `employment_info`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `funds_transaction`
--
ALTER TABLE `funds_transaction`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `inventoryorders`
--
ALTER TABLE `inventoryorders`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `leave_requests`
--
ALTER TABLE `leave_requests`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ledger`
--
ALTER TABLE `ledger`
  MODIFY `ledgerno` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
