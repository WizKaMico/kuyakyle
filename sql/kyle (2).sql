-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2023 at 05:16 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kyle`
--

-- --------------------------------------------------------

--
-- Table structure for table `remember_me_tokens`
--

CREATE TABLE `remember_me_tokens` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `expiration_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `remember_me_tokens`
--

INSERT INTO `remember_me_tokens` (`id`, `user_id`, `token`, `expiration_date`) VALUES
(7, 1, 'h3LEUHYjHrcqIHULo89wfqjVSBa4XuTz', '2023-10-05 11:51:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_avail_sit`
--

CREATE TABLE `tbl_avail_sit` (
  `sitid` int(11) NOT NULL,
  `table_name` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_avail_sit`
--

INSERT INTO `tbl_avail_sit` (`sitid`, `table_name`, `status`) VALUES
(1, 'TABLE 1', 'UNAVAILABLE'),
(2, 'TABLE 2', 'UNAVAILABLE'),
(3, 'TABLE 3', 'UNAVAILABLE'),
(4, 'TABLE 4', 'AVAILABLE'),
(5, 'TABLE 5', 'AVAILABLE'),
(6, 'TABLE 6', 'AVAILABLE'),
(7, 'TABLE 7', 'AVAILABLE'),
(8, 'TABLE 8', 'AVAILABLE'),
(9, 'TABLE 9', 'AVAILABLE'),
(10, 'TABLE 10', 'AVAILABLE');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `member_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`id`, `product_id`, `quantity`, `member_id`) VALUES
(1, 2, 1, '20231017-005'),
(2, 3, 1, '20231017-005'),
(4, 3, 4, '20231017-006'),
(10, 3, 1, '20231117-001'),
(11, 4, 1, '20231117-001'),
(12, 10, 1, '20231117-001'),
(13, 12, 1, '20231117-001'),
(14, 9, 1, '20231117-001'),
(15, 1, 1, '20231117-002'),
(16, 2, 1, '20231117-002'),
(17, 3, 1, '20231117-002'),
(22, 1, 1, '20231124-001'),
(23, 2, 1, '20231124-001'),
(24, 4, 1, '20231124-001'),
(25, 1, 1, '20231124-002'),
(26, 2, 1, '20231124-002'),
(27, 3, 1, '20231124-002'),
(28, 1, 1, '20231125-001'),
(29, 2, 1, '20231125-001'),
(30, 3, 3, '20231125-001'),
(31, 4, 1, '20231125-001'),
(32, 3, 1, '20231126-002'),
(33, 4, 1, '20231126-002'),
(34, 3, 1, '20231126-003'),
(35, 2, 1, '20231126-003'),
(36, 4, 1, '20231126-003'),
(37, 2, 2, '20231127-001'),
(38, 3, 2, '20231127-001'),
(39, 4, 2, '20231127-001'),
(40, 1, 1, '20231128-001'),
(41, 2, 1, '20231128-001'),
(42, 3, 1, '20231128-001'),
(43, 3, 1, '20231128-002'),
(44, 2, 1, '20231128-002'),
(45, 4, 1, '20231128-002'),
(46, 13, 1, '20231128-002'),
(47, 2, 1, '20231128-003'),
(48, 3, 1, '20231128-003'),
(49, 4, 1, '20231128-003'),
(50, 2, 1, '20231128-004'),
(51, 3, 1, '20231128-004'),
(52, 4, 1, '20231128-004'),
(53, 1, 1, '20231128-004'),
(54, 2, 1, '20231206-001'),
(55, 3, 1, '20231206-001'),
(56, 4, 1, '20231206-001'),
(57, 2, 1, '20231206-002'),
(58, 3, 2, '20231206-002'),
(59, 4, 2, '20231206-002'),
(60, 1, 1, '20231206-002'),
(61, 3, 1, '20231206-003'),
(62, 4, 1, '20231206-003'),
(63, 3, 1, '20231206-004'),
(64, 4, 1, '20231206-004'),
(65, 1, 1, '20231206-004'),
(66, 13, 1, '20231206-004'),
(67, 2, 1, '20231206-005'),
(68, 3, 1, '20231206-005'),
(69, 4, 1, '20231206-005'),
(70, 13, 1, '20231206-005'),
(71, 1, 1, '20231212-001'),
(72, 2, 1, '20231212-001'),
(73, 3, 1, '20231212-001'),
(74, 3, 1, '20231212-002'),
(75, 4, 1, '20231212-002'),
(76, 2, 1, '20231212-002'),
(77, 3, 1, '20231212-003'),
(78, 4, 1, '20231212-003'),
(79, 2, 1, '20231212-003'),
(80, 2, 1, '20231213-002'),
(81, 3, 1, '20231213-003');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categorry`
--

CREATE TABLE `tbl_categorry` (
  `cid` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_categorry`
--

INSERT INTO `tbl_categorry` (`cid`, `category_name`) VALUES
(1, 'MEAL'),
(2, 'DRINK'),
(3, 'EXTRA'),
(4, 'SERVICE'),
(5, 'DISCOUNT');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dapp_login`
--

CREATE TABLE `tbl_dapp_login` (
  `tid` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date_login` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dapp_login`
--

INSERT INTO `tbl_dapp_login` (`tid`, `email`, `date_login`) VALUES
(1, 'revcoreitsolution@gmail.com', '2023-09-10'),
(2, 'revcoreitsolution@gmail.com', '2023-09-10'),
(3, 'revcoreitsolution@gmail.com', '2023-09-10'),
(4, 'revcoreitsolution@gmail.com', '2023-09-10'),
(5, 'revcoreitsolution@gmail.com', '2023-09-10'),
(6, 'revcoreitsolution@gmail.com', '2023-09-10'),
(7, 'revcoreitsolution@gmail.com', '2023-09-10'),
(8, 'revcoreitsolution@gmail.com', '2023-09-10'),
(9, 'revcoreitsolution@gmail.com', '2023-09-10'),
(10, 'revcoreitsolution@gmail.com', '2023-09-10'),
(11, 'revcoreitsolution@gmail.com', '2023-09-10'),
(12, 'revcoreitsolution@gmail.com', '2023-09-10'),
(13, 'revcoreitsolution@gmail.com', '2023-09-10'),
(14, 'revcoreitsolution@gmail.com', '2023-09-10'),
(15, 'revcoreitsolution@gmail.com', '2023-09-10'),
(16, 'revcoreitsolution@gmail.com', '2023-09-10'),
(17, 'revcoreitsolution@gmail.com', '2023-09-10'),
(18, 'revcoreitsolution@gmail.com', '2023-09-10'),
(19, 'revcoreitsolution@gmail.com', '2023-09-10'),
(20, 'revcoreitsolution@gmail.com', '2023-09-10'),
(21, 'revcoreitsolution@gmail.com', '2023-09-10'),
(22, 'revcoreitsolution@gmail.com', '2023-09-10'),
(23, 'revcoreitsolution@gmail.com', '2023-09-10'),
(24, 'revcoreitsolution@gmail.com', '2023-09-10'),
(25, 'revcoreitsolution@gmail.com', '2023-09-10'),
(26, 'revcoreitsolution@gmail.com', '2023-09-10'),
(27, 'revcoreitsolution@gmail.com', '2023-09-10'),
(28, 'revcoreitsolution@gmail.com', '2023-09-10'),
(29, 'revcoreitsolution@gmail.com', '2023-09-10'),
(30, 'revcoreitsolution@gmail.com', '2023-09-10'),
(31, 'revcoreitsolution@gmail.com', '2023-09-10'),
(32, 'revcoreitsolution@gmail.com', '2023-09-11'),
(33, 'revcoreitsolution@gmail.com', '2023-09-11'),
(34, 'revcoreitsolution@gmail.com', '2023-09-11'),
(35, 'revcoreitsolution@gmail.com', '2023-09-11'),
(36, 'revcoreitsolution@gmail.com', '2023-09-12'),
(37, 'revcoreitsolution@gmail.com', '2023-10-08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_designation`
--

CREATE TABLE `tbl_designation` (
  `id` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_designation`
--

INSERT INTO `tbl_designation` (`id`, `role`) VALUES
(1, 'ADMIN'),
(2, 'CASHIER'),
(3, 'CHEF');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `customer_id` varchar(50) NOT NULL,
  `amount` double NOT NULL,
  `name` varchar(255) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `purpose` varchar(50) NOT NULL,
  `payments` varchar(50) NOT NULL,
  `amounts` int(50) NOT NULL,
  `changes` int(50) NOT NULL,
  `discount_amount` int(100) NOT NULL,
  `order_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `customer_id`, `amount`, `name`, `order_status`, `purpose`, `payments`, `amounts`, `changes`, `discount_amount`, `order_at`) VALUES
(1, '20231017-005', 200, 'Gerald Mico Facistol', 'PENDING', 'DINE-IN', '', 0, 0, 0, '2023-10-17 04:39:40'),
(2, '20231017-006', 400, 'Gerald Mico Facistol', 'PENDING', 'DINE-IN', '', 0, 0, 0, '2023-10-17 05:27:35'),
(3, '20231117-001', 400, 'Gerald Mico Facistol', 'COMPLETED', 'DINE-IN', 'UN PAID', 500, 100, 0, '2023-11-17 04:01:16'),
(4, '20231117-002', 300, 'Herald', 'COMPLETED', 'DINE-IN', 'PAID', 500, 200, 0, '2023-11-17 06:34:33'),
(5, '20231124-002', 300, 'Gerald Mico Facistol', 'PENDING', 'DINE-IN', '', 0, 0, 0, '2023-11-24 06:50:55'),
(6, '20231125-001', 400, 'Gerald Mico Facistol', 'READY TO SERVE', 'DINE-IN', '', 0, 0, 0, '2023-11-25 12:06:57'),
(7, '20231126-002', 200, 'TEST ORDER UMAGA', 'PREPARING', 'DINE-IN', '', 0, 0, 0, '2023-11-25 17:32:50'),
(8, '20231126-003', 240, 'test order ', 'COMPLETED', 'DINE-IN', 'PAID', 300, 60, 240, '2023-11-26 00:36:48'),
(9, '20231127-001', 300, 'aNOTHER tEST', 'PREPARING', 'TAKE-OUT', '', 0, 0, 0, '2023-11-27 14:39:43'),
(10, '20231127-001', 600, 'Check Mate', 'PREPARING', 'TAKE-OUT', '', 0, 0, 0, '2023-11-27 14:43:27'),
(11, '20231128-001', 300, 'Gerald Mico Facistol', 'CLAIMED', 'DINE-IN', 'PAID', 400, 100, 0, '2023-11-28 14:41:45'),
(12, '20231128-002', 400, 'TestToday', 'CLAIMED', 'DINE-IN', 'PAID', 500, 100, 0, '2023-11-28 14:47:17'),
(13, '20231128-003', 300, 'Gerald Mico Facistol', 'READY TO SERVE', 'TAKE-OUT', 'UN PAID', 0, 0, 0, '2023-11-28 14:52:08'),
(14, '20231128-004', 400, 'TEST TO CHECK', 'READY TO SERVE', 'DINE-IN', 'UN PAID', 0, 0, 0, '2023-11-28 15:00:50'),
(15, '20231206-001', 300, 'Gerald Mico Facistol', 'PREPARING', 'TAKE-OUT', '', 0, 0, 0, '2023-12-06 04:25:22'),
(16, '20231206-001', 300, 'Gerald Mico Facistol', 'PREPARING', 'TAKE-OUT', '', 0, 0, 0, '2023-12-06 04:26:42'),
(17, '20231206-002', 400, 'TEST', 'PREPARING', 'DINE-IN', '', 0, 0, 0, '2023-12-06 05:26:34'),
(18, '20231206-002', 600, 'TEST', 'PREPARING', 'DINE-IN', '', 0, 0, 0, '2023-12-06 05:27:19'),
(19, '20231206-003', 200, 'Gerald Mico Facistol', 'PREPARING', 'DINE-IN', '', 0, 0, 0, '2023-12-06 05:28:52'),
(20, '20231206-004', 400, 'Gerald Mico Facistol', 'PREPARING', 'DINE-IN', '', 0, 0, 0, '2023-12-06 05:29:17'),
(21, '20231206-005', 400, 'test', 'PREPARING', 'TAKE-OUT', '', 0, 0, 0, '2023-12-06 05:29:41'),
(22, '20231212-001', 300, '1', 'PREPARING', 'DINE-IN', '', 0, 0, 0, '2023-12-12 16:05:46'),
(23, '20231212-002', 300, '2', 'PREPARING', 'DINE-IN', '', 0, 0, 0, '2023-12-12 16:20:44'),
(24, '20231212-002', 300, '2', 'PREPARING', 'DINE-IN', '', 0, 0, 0, '2023-12-12 16:21:31'),
(25, '20231212-003', 300, '3', 'PREPARING', 'DINE-IN', '', 0, 0, 0, '2023-12-12 16:24:29'),
(26, '20231212-003', 300, '3', 'PREPARING', 'DINE-IN', '', 0, 0, 0, '2023-12-12 16:24:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_discount`
--

CREATE TABLE `tbl_order_discount` (
  `tbd` int(11) NOT NULL,
  `order_id` varchar(250) NOT NULL,
  `discount` varchar(50) NOT NULL,
  `user_discount` int(50) NOT NULL,
  `discount_amount` int(100) NOT NULL,
  `original_price` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order_discount`
--

INSERT INTO `tbl_order_discount` (`tbd`, `order_id`, `discount`, `user_discount`, `discount_amount`, `original_price`) VALUES
(1, '20231126-003', 'PWD', 3, 60, 300);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_item`
--

CREATE TABLE `tbl_order_item` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `item_price` double NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order_item`
--

INSERT INTO `tbl_order_item` (`id`, `order_id`, `product_id`, `item_price`, `quantity`) VALUES
(1, 1, 2, 100, 1),
(2, 1, 3, 100, 1),
(3, 2, 3, 100, 4),
(4, 3, 3, 100, 1),
(5, 3, 4, 100, 1),
(6, 3, 10, 50, 1),
(7, 3, 12, 100, 1),
(8, 3, 9, 50, 1),
(9, 4, 1, 100, 1),
(10, 4, 2, 100, 1),
(11, 4, 3, 100, 1),
(12, 5, 1, 100, 1),
(13, 5, 2, 100, 1),
(14, 5, 3, 100, 1),
(17, 6, 3, 100, 3),
(18, 6, 4, 100, 1),
(19, 7, 3, 100, 1),
(20, 7, 4, 100, 1),
(21, 8, 3, 100, 1),
(22, 8, 2, 100, 1),
(23, 8, 4, 100, 1),
(24, 9, 2, 100, 1),
(25, 9, 3, 100, 1),
(26, 9, 4, 100, 1),
(27, 10, 2, 100, 2),
(28, 10, 3, 100, 2),
(29, 10, 4, 100, 2),
(30, 11, 1, 100, 1),
(31, 11, 2, 100, 1),
(32, 11, 3, 100, 1),
(33, 12, 3, 100, 1),
(34, 12, 2, 100, 1),
(35, 12, 4, 100, 1),
(36, 12, 13, 100, 1),
(37, 13, 2, 100, 1),
(38, 13, 3, 100, 1),
(39, 13, 4, 100, 1),
(40, 14, 2, 100, 1),
(41, 14, 3, 100, 1),
(42, 14, 4, 100, 1),
(43, 14, 1, 100, 1),
(44, 15, 2, 100, 1),
(45, 15, 3, 100, 1),
(46, 15, 4, 100, 1),
(47, 16, 2, 100, 1),
(48, 16, 3, 100, 1),
(49, 16, 4, 100, 1),
(50, 17, 2, 100, 1),
(51, 17, 3, 100, 1),
(52, 17, 4, 100, 1),
(53, 17, 1, 100, 1),
(54, 18, 2, 100, 1),
(55, 18, 3, 100, 2),
(56, 18, 4, 100, 2),
(57, 18, 1, 100, 1),
(58, 19, 3, 100, 1),
(59, 19, 4, 100, 1),
(60, 20, 3, 100, 1),
(61, 20, 4, 100, 1),
(62, 20, 1, 100, 1),
(63, 20, 13, 100, 1),
(64, 21, 2, 100, 1),
(65, 21, 3, 100, 1),
(66, 21, 4, 100, 1),
(67, 21, 13, 100, 1),
(68, 22, 1, 100, 1),
(69, 22, 2, 100, 1),
(70, 22, 3, 100, 1),
(71, 23, 3, 100, 1),
(72, 23, 4, 100, 1),
(73, 23, 2, 100, 1),
(74, 24, 3, 100, 1),
(75, 24, 4, 100, 1),
(76, 24, 2, 100, 1),
(77, 25, 3, 100, 1),
(78, 25, 4, 100, 1),
(79, 25, 2, 100, 1),
(80, 26, 3, 100, 1),
(81, 26, 4, 100, 1),
(82, 26, 2, 100, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `payment_response` text NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `category` int(11) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `name`, `code`, `category`, `image`, `price`, `status`) VALUES
(1, 'CORNSILOG', 'MEAL-8414', 1, 'product/1/cornsilog_meal.png', 100.00, 'STOCK'),
(2, 'HAMSILOG', 'MEAL-7839', 1, 'product/1/hamsilog_meal.png', 100.00, 'STOCK'),
(3, 'LONGSILOG', 'MEAL-7582', 1, 'product/1/longsilod_meal.png', 100.00, 'STOCK'),
(4, 'TAPASILOG', 'MEAL-9374', 1, 'product/1/tapasilog_meal.png', 100.00, 'STOCK'),
(5, 'MATCHA', 'DRINK-8375', 2, 'product/2/milktea_drinks.png', 100.00, 'STOCK'),
(6, 'CAPUCINO', 'DRINK-9673', 2, 'product/2/milktea_drinks.png', 100.00, 'STOCK'),
(7, 'MACHIATO', 'DRINK-7951', 2, 'product/2/milktea_drinks.png', 100.00, 'STOCK'),
(8, 'EGG', 'EXTRA-8683', 3, 'product/3/egg_extra.png', 50.00, 'STOCK'),
(9, 'FRIES', 'EXTRA-7754', 3, 'product/3/fries_extra.png', 50.00, 'STOCK'),
(10, 'RICE', 'EXTRA-7910', 3, 'product/3/rice_extra.png', 50.00, 'STOCK'),
(11, 'WINGS', 'EXTRA-9528', 3, 'product/3/wings_extra.png', 100.00, 'STOCK'),
(12, 'ALJURS HOTDOG SILOG', 'SERVICE-8704', 4, 'product/4/longsilod_meal.png', 100.00, ''),
(13, 'Happy Meal', 'MEAL-9389', 1, 'product/1/cornsilog_meal.png', 100.00, ''),
(14, 'PWD', 'DISCOUNT-9367', 5, 'product/5/coin-vector-icon-png_296039-removebg-preview.png', 12.00, ''),
(15, 'SENIOR', 'DISCOUNT-8644', 5, 'product/5/coin-vector-icon-png_296039-removebg-preview.png', 20.00, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_raw_binded_product`
--

CREATE TABLE `tbl_raw_binded_product` (
  `id` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_raw_binded_product`
--

INSERT INTO `tbl_raw_binded_product` (`id`, `rid`, `product_id`, `unit`, `quantity`) VALUES
(1, 1, 1, 'PCS', 1),
(2, 2, 1, 'PCS', 1),
(3, 3, 1, 'PCS', 1),
(4, 7, 2, 'PCS', 1),
(5, 2, 2, 'PCS', 1),
(6, 3, 2, 'PCS', 1),
(7, 6, 3, 'PCS', 1),
(8, 2, 3, 'PCS', 1),
(9, 3, 3, 'PCS', 1),
(10, 5, 4, 'PCS', 1),
(11, 2, 4, 'PCS', 1),
(12, 3, 4, 'PCS', 1),
(13, 2, 8, 'PCS', 1),
(14, 11, 9, 'PCS', 10),
(15, 3, 10, 'PCS', 1),
(16, 8, 11, 'PCS', 5),
(17, 9, 5, 'PCS', 1),
(18, 10, 5, 'PCS', 1),
(19, 9, 7, 'PCS', 1),
(20, 10, 7, 'PCS', 1),
(21, 9, 6, 'PCS', 1),
(22, 10, 6, 'PCS', 1),
(23, 12, 8, 'PCS', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_raw_material`
--

CREATE TABLE `tbl_raw_material` (
  `rid` int(11) NOT NULL,
  `material` varchar(50) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_raw_material`
--

INSERT INTO `tbl_raw_material` (`rid`, `material`, `price`, `quantity`, `date_added`) VALUES
(1, 'CORNBEEF', 20, 200, '2023-10-08'),
(2, 'EGG', 20, 200, '2023-10-08'),
(3, 'RICE', 20, 200, '2023-10-08'),
(4, 'HOTDOG', 20, 200, '2023-10-08'),
(5, 'TAPA', 20, 200, '2023-10-08'),
(6, 'LONGANISA', 20, 200, '2023-10-08'),
(7, 'HAM', 20, 200, '2023-10-08'),
(8, 'CHICKEN', 20, 200, '2023-10-08'),
(9, 'MILK', 20, 200, '2023-10-08'),
(10, 'SUGAR', 20, 200, '2023-10-08'),
(11, 'FRIES', 20, 200, '2023-10-08'),
(12, 'TEST MATERIAL', 20, 100, '2023-10-08'),
(13, 'EGGNOG', 20, 100, '2023-11-25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_raw_material_history`
--

CREATE TABLE `tbl_raw_material_history` (
  `rhid` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date_updated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `uid` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `designation` int(10) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `uid`, `username`, `email`, `password`, `designation`, `fullname`, `contact`) VALUES
(1, '7409', 'admin', 'revcoreitsolution@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 1, 'Gerald Mico', '+639166513189'),
(2, '7408', 'cashier', 'revcoreitsolution@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 2, 'Gerald Mico', '+639166513189'),
(3, '7410', 'chef', 'revcoreitsolution@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 3, 'Gerald Mico', '+639166513189');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_security`
--

CREATE TABLE `tbl_user_security` (
  `sid` int(11) NOT NULL,
  `uid` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `code` int(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `remember_me_tokens`
--
ALTER TABLE `remember_me_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_avail_sit`
--
ALTER TABLE `tbl_avail_sit`
  ADD PRIMARY KEY (`sitid`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_categorry`
--
ALTER TABLE `tbl_categorry`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `tbl_dapp_login`
--
ALTER TABLE `tbl_dapp_login`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `tbl_designation`
--
ALTER TABLE `tbl_designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order_discount`
--
ALTER TABLE `tbl_order_discount`
  ADD PRIMARY KEY (`tbd`);

--
-- Indexes for table `tbl_order_item`
--
ALTER TABLE `tbl_order_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`code`);

--
-- Indexes for table `tbl_raw_binded_product`
--
ALTER TABLE `tbl_raw_binded_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_raw_material`
--
ALTER TABLE `tbl_raw_material`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `tbl_raw_material_history`
--
ALTER TABLE `tbl_raw_material_history`
  ADD PRIMARY KEY (`rhid`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_user_security`
--
ALTER TABLE `tbl_user_security`
  ADD PRIMARY KEY (`sid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `remember_me_tokens`
--
ALTER TABLE `remember_me_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_avail_sit`
--
ALTER TABLE `tbl_avail_sit`
  MODIFY `sitid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `tbl_categorry`
--
ALTER TABLE `tbl_categorry`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_dapp_login`
--
ALTER TABLE `tbl_dapp_login`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_designation`
--
ALTER TABLE `tbl_designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_order_discount`
--
ALTER TABLE `tbl_order_discount`
  MODIFY `tbd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_order_item`
--
ALTER TABLE `tbl_order_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_raw_binded_product`
--
ALTER TABLE `tbl_raw_binded_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_raw_material`
--
ALTER TABLE `tbl_raw_material`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_raw_material_history`
--
ALTER TABLE `tbl_raw_material_history`
  MODIFY `rhid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_user_security`
--
ALTER TABLE `tbl_user_security`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `remember_me_tokens`
--
ALTER TABLE `remember_me_tokens`
  ADD CONSTRAINT `remember_me_tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
