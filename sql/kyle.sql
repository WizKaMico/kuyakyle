-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2023 at 06:56 AM
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
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `member_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`id`, `product_id`, `quantity`, `member_id`) VALUES
(10, 7, 1, 9037),
(11, 8, 1, 9037),
(12, 12, 1, 9037),
(13, 4, 5, 8497),
(14, 5, 1, 8497),
(15, 2, 1, 8497),
(17, 1, 2, 8724),
(18, 2, 2, 8724),
(19, 4, 1, 8724),
(20, 7, 1, 8724),
(21, 10, 1, 8724),
(23, 2, 4, 7902),
(24, 4, 1, 7902),
(25, 4, 6, 9570),
(26, 2, 1, 9570),
(27, 7, 1, 9570),
(30, 5, 1, 7108),
(31, 4, 2, 7108),
(32, 3, 1, 7108),
(33, 2, 3, 8534),
(34, 1, 1, 8534);

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
(2, 'CASHIER');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `name` varchar(255) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `purpose` varchar(50) NOT NULL,
  `payments` varchar(50) NOT NULL,
  `amounts` int(50) NOT NULL,
  `changes` int(50) NOT NULL,
  `order_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `customer_id`, `amount`, `name`, `order_status`, `purpose`, `payments`, `amounts`, `changes`, `order_at`) VALUES
(1, 8724, 650, 'Gerald Mico Test', 'COMPLETED', 'TAKE-OUT', '0', 0, 0, '2023-09-04 21:29:07'),
(2, 9037, 250, 'Gerald Mico Facistol', 'PENDING', 'TAKE-OUT', '', 0, 0, '2023-09-04 21:29:07'),
(3, 7902, 500, 'Gerald Mico Facistol', 'COMPLETED', 'TAKE-OUT', 'PAID', 1, 1, '2023-09-05 06:31:01'),
(4, 9570, 800, 'Abegail', 'COMPLETED', 'DINE-IN', 'PAID', 600, 200, '2023-09-05 07:24:15'),
(5, 8534, 400, 'Jeronimo', 'PENDING', 'DINE-IN', '', 0, 0, '2023-09-05 15:13:14');

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
(9, 5, 4, 100, 5),
(10, 5, 5, 100, 1),
(11, 5, 2, 100, 1),
(12, 6, 4, 100, 5),
(13, 6, 5, 100, 1),
(14, 6, 2, 100, 1),
(15, 1, 1, 100, 2),
(16, 1, 2, 100, 2),
(17, 1, 4, 100, 1),
(18, 1, 7, 100, 1),
(19, 1, 10, 50, 1),
(20, 2, 7, 100, 1),
(21, 2, 8, 100, 1),
(22, 2, 12, 50, 1),
(23, 3, 2, 100, 4),
(24, 3, 4, 100, 1),
(25, 4, 4, 100, 6),
(26, 4, 2, 100, 1),
(27, 4, 7, 100, 1),
(28, 5, 2, 100, 3),
(29, 5, 1, 100, 1);

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
  `category` varchar(50) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `name`, `code`, `category`, `image`, `price`, `status`) VALUES
(1, 'CORNSILOG', 'CORN001', 'MEAL', 'product/meal/cornsilog_meal.png', 100.00, 'STOCK'),
(2, 'HAMSILOG', 'HAM001', 'MEAL', 'product/meal/hamsilog_meal.png', 100.00, 'STOCK'),
(3, 'LONGSILOG', 'LONG001', 'MEAL', 'product/meal/longsilod_meal.png', 100.00, 'STOCK'),
(4, 'TAPASILOG', 'TAPA001', 'MEAL', 'product/meal/tapasilog_meal.png', 100.00, 'STOCK'),
(5, 'MILK', 'MILK001', 'DRINKS', 'product/drinks/milktea_drinks.png', 100.00, 'STOCK'),
(6, 'MILK', 'MILK002', 'DRINKS', 'product/drinks/milktea_drinks.png', 100.00, 'STOCK'),
(7, 'MILK', 'MILK003', 'DRINKS', 'product/drinks/milktea_drinks.png', 100.00, 'STOCK'),
(8, 'EGG', 'EGG001', 'EXTRA', 'product/extra/egg_extra.png', 100.00, 'STOCK'),
(9, 'FRIES', 'FRIES001', 'EXTRA', 'product/extra/fries_extra.png', 100.00, 'STOCK'),
(10, 'RICE', 'RICE001', 'EXTRA', 'product/extra/rice_extra.png', 100.00, 'STOCK'),
(11, 'WINGS', 'WING001', 'EXTRA', 'product/extra/wings_extra.png', 100.00, 'STOCK');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `uid` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `designation` int(10) NOT NULL,
  `fullname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `uid`, `email`, `password`, `designation`, `fullname`) VALUES
(1, '7409', 'revcoreitsolution@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 1, 'Gerald Mico'),
(2, '7408', 'revcoreitsolution@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 2, 'Gerald Mico');

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
-- Dumping data for table `tbl_user_security`
--

INSERT INTO `tbl_user_security` (`sid`, `uid`, `email`, `code`, `status`, `date_created`) VALUES
(1, '7409', 'revcoreitsolution@gmail.com', 9778, 'USED', '2023-09-05'),
(2, '7409', 'revcoreitsolution@gmail.com', 8124, 'USED', '2023-09-05'),
(3, '7408', 'revcoreitsolution@gmail.com', 7200, 'USED', '2023-09-05'),
(4, '7409', 'revcoreitsolution@gmail.com', 8472, 'USED', '2023-09-05'),
(5, '7408', 'revcoreitsolution@gmail.com', 9795, 'USED', '2023-09-05'),
(6, '7409', 'revcoreitsolution@gmail.com', 7413, 'USED', '2023-09-05'),
(7, '7409', 'revcoreitsolution@gmail.com', 7591, 'USED', '2023-09-05'),
(8, '7408', 'revcoreitsolution@gmail.com', 9312, 'USED', '2023-09-05'),
(9, '7408', 'revcoreitsolution@gmail.com', 7072, 'USED', '2023-09-05'),
(10, '7408', 'revcoreitsolution@gmail.com', 8852, 'USED', '2023-09-05'),
(11, '7408', 'revcoreitsolution@gmail.com', 7092, 'USED', '2023-09-05'),
(12, '7409', 'revcoreitsolution@gmail.com', 8369, 'USED', '2023-09-05'),
(13, '7408', 'revcoreitsolution@gmail.com', 6962, 'USED', '2023-09-05'),
(14, '7408', 'revcoreitsolution@gmail.com', 8178, 'USED', '2023-09-06'),
(15, '7409', 'revcoreitsolution@gmail.com', 7206, 'USED', '2023-09-06'),
(16, '7409', 'revcoreitsolution@gmail.com', 7464, 'USED', '2023-09-06'),
(17, '7409', 'revcoreitsolution@gmail.com', 7473, 'USED', '2023-09-06'),
(18, '7409', 'revcoreitsolution@gmail.com', 9081, 'USED', '2023-09-06'),
(19, '7409', 'revcoreitsolution@gmail.com', 8735, 'USED', '2023-09-06');

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
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_designation`
--
ALTER TABLE `tbl_designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_order_item`
--
ALTER TABLE `tbl_order_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_user_security`
--
ALTER TABLE `tbl_user_security`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
