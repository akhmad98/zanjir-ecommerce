-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2021 at 01:45 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_city` varchar(25) NOT NULL,
  `order_street` varchar(50) NOT NULL,
  `order_room` varchar(25) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `order_date`, `order_city`, `order_street`, `order_room`, `product_id`, `quant`) VALUES
(57, 16, '2021-04-29 08:18:31', '', '', '', 5, 1),
(58, 16, '2021-05-16 11:43:07', '', '', '', 7, 3),
(59, 16, '2021-05-14 15:25:30', '', '', '', 6, 2),
(60, 16, '2021-05-16 07:30:31', '', '', '', 9, 3),
(61, 16, '2021-05-16 11:37:15', '', '', '', 10, 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders_backup`
--

CREATE TABLE `orders_backup` (
  `order_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_city` varchar(255) NOT NULL,
  `order_street` varchar(50) NOT NULL,
  `product_id` int(20) NOT NULL,
  `quant` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders_backup`
--

INSERT INTO `orders_backup` (`order_id`, `order_date`, `order_city`, `order_street`, `product_id`, `quant`) VALUES
(52, '2021-04-29 06:58:00', 'Denov', 'maksud Sheyzoda str. apt 32', 7, 6),
(53, '2021-04-29 06:58:00', 'Denov', 'maksud Sheyzoda str. apt 32', 6, 17),
(54, '2021-04-29 07:55:49', 'Denov', 'maksud Sheyzoda str. apt 32', 9, 7),
(55, '2021-04-29 07:55:49', 'Denov', 'maksud Sheyzoda str. apt 32', 6, 5);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `payment_add` varchar(20) NOT NULL,
  `shipping_add` varchar(50) NOT NULL,
  `shipment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `descpt` varchar(255) NOT NULL,
  `prize` int(7) NOT NULL,
  `img` text NOT NULL,
  `product_type` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `title`, `descpt`, `prize`, `img`, `product_type`) VALUES
(5, 'T-shirt ack', 'Hand-made T-shirt, is the product of \"Tyoto hola\" made by .The preferred choice of a vast range of a', 15, 'shimage1.png', 'shirts'),
(6, 'Shoes No1', 'Hand-made by charn', 35, 'simage2.jpg', 'shoes'),
(7, 'Mini Trousers', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', 40, 'timage4.png', 'trousers'),
(8, 'Shirt Classic Red', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', 35, 'shimage2.png', 'shirts'),
(9, 'Shirt Set', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', 60, 'shimage3.png', 'shirts'),
(10, 'mini trouser', 'sdgfsdgdfgsdgsdfgsdfgfgd', 180, 'timage3.png', 'trousers');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `roleId` int(11) NOT NULL,
  `who` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`roleId`, `who`) VALUES
(1, 'ADMIN'),
(2, 'USER');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `emailid` text NOT NULL,
  `password` varchar(100) NOT NULL,
  `roleId` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `username`, `emailid`, `password`, `roleId`) VALUES
(16, 'ahmad', 'b1702664@mdis.uz', '$2y$10$h/vTBxi4wr3lN1MvOupytOob9/UOQHmO8VrAeTj2786Qxmk8VHr..', 1),
(31, 'diyora', 'akhmadbadalov98@gmail.com1', '$2y$10$sByFJfVsOCb6GL/XLqcgDeYCxGPIFJ2/I9qgwqFfnLCFi/OCYhN0K', 2),
(32, 'boyali', 'b1702664@mdis.uz', '$2y$10$0OQkdgcW4/SQr5E65o4Qw.qTnsodNHYE2Ta6JQKgHV8nmMNhsWIYO', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `orders_ibfk_2` (`user_id`);

--
-- Indexes for table `orders_backup`
--
ALTER TABLE `orders_backup`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roleId`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `orders_backup`
--
ALTER TABLE `orders_backup`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `roleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_details` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user_details` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
