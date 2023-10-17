-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2023 at 05:41 AM
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
  `member_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`id`, `product_id`, `quantity`, `member_id`) VALUES
(1, 2, 1, '20231017-005'),
(2, 3, 1, '20231017-005'),
(4, 3, 4, '20231017-006');

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
(4, 'SERVICE');

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
  `order_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `customer_id`, `amount`, `name`, `order_status`, `purpose`, `payments`, `amounts`, `changes`, `order_at`) VALUES
(1, '20231017-005', 200, 'Gerald Mico Facistol', 'PENDING', 'DINE-IN', '', 0, 0, '2023-10-17 04:39:40'),
(2, '20231017-006', 400, 'Gerald Mico Facistol', 'PENDING', 'DINE-IN', '', 0, 0, '2023-10-17 05:27:35');

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
(3, 2, 3, 100, 4);

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
(12, 'ALJURS HOTDOG SILOG', 'SERVICE-8704', 4, 'product/4/longsilod_meal.png', 100.00, '');

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
  `quantity` int(11) NOT NULL,
  `date_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_raw_material`
--

INSERT INTO `tbl_raw_material` (`rid`, `material`, `quantity`, `date_added`) VALUES
(1, 'CORNBEEF', 200, '2023-10-08'),
(2, 'EGG', 200, '2023-10-08'),
(3, 'RICE', 200, '2023-10-08'),
(4, 'HOTDOG', 200, '2023-10-08'),
(5, 'TAPA', 200, '2023-10-08'),
(6, 'LONGANISA', 200, '2023-10-08'),
(7, 'HAM', 200, '2023-10-08'),
(8, 'CHICKEN', 200, '2023-10-08'),
(9, 'MILK', 200, '2023-10-08'),
(10, 'SUGAR', 200, '2023-10-08'),
(11, 'FRIES', 200, '2023-10-08'),
(12, 'TEST MATERIAL', 100, '2023-10-08');

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
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_categorry`
--
ALTER TABLE `tbl_categorry`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_order_item`
--
ALTER TABLE `tbl_order_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_raw_binded_product`
--
ALTER TABLE `tbl_raw_binded_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_raw_material`
--
ALTER TABLE `tbl_raw_material`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
