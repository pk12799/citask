-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Sep 30, 2021 at 03:22 PM
-- Server version: 5.7.33-0ubuntu0.16.04.1
-- PHP Version: 7.0.33-0ubuntu0.16.04.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task2`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` int(12) NOT NULL,
  `name` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `i_name` varchar(123) DEFAULT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `prod_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `i_name`, `datetime`, `prod_id`) VALUES
(203, 'zxzxx3.jpeg', '2021-09-27 12:27:58', 157),
(204, 'zxczxcxcz5.jpeg', '2021-09-27 12:27:58', 157),
(205, 'zxAwsxas4.jpeg', '2021-09-27 12:27:58', 157),
(206, 'wecs12.jpeg', '2021-09-27 12:27:58', 157),
(207, 'zxAwsxas5.jpeg', '2021-09-27 12:29:23', 158),
(208, 'wecs13.jpeg', '2021-09-27 12:29:23', 158),
(209, 'we34rfvc3.jpeg', '2021-09-27 12:29:23', 158),
(210, 'vzzzzzzzdz9.jpeg', '2021-09-27 12:29:23', 158),
(211, 'index6.jpeg', '2021-09-27 12:29:23', 158),
(212, 'wecs14.jpeg', '2021-09-27 15:39:38', 161),
(213, 'we34rfvc4.jpeg', '2021-09-27 15:39:38', 161),
(214, 'vzzzzzzzdz10.jpeg', '2021-09-27 15:39:38', 161),
(215, 'zxzxx4.jpeg', '2021-09-27 15:39:59', 162),
(216, 'zxczxcxcz6.jpeg', '2021-09-27 15:39:59', 162),
(217, 'zxAwsxas6.jpeg', '2021-09-27 15:39:59', 162),
(218, 'wecs15.jpeg', '2021-09-27 15:39:59', 162),
(219, 'vzzzzzzzdz11.jpeg', '2021-09-28 11:03:36', 163),
(220, 'zxczxcxcz7.jpeg', '2021-09-28 11:04:36', 165),
(221, 'zxAwsxas7.jpeg', '2021-09-28 11:04:36', 165),
(222, 'wecs16.jpeg', '2021-09-28 11:04:36', 165),
(223, 'vzzzzzzzdz12.jpeg', '2021-09-28 11:05:04', 166);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(12) NOT NULL,
  `name` varchar(123) NOT NULL,
  `quantity` int(12) NOT NULL,
  `price` float NOT NULL,
  `desc_prod` longtext NOT NULL,
  `type_id` int(12) NOT NULL,
  `sub_id` int(12) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `quantity`, `price`, `desc_prod`, `type_id`, `sub_id`, `time`) VALUES
(157, 'dellsdfdsfvrfg', 214, 145622, '<p>SELECT product.id, product.name, product.desc_prod, product.quantity, product.price, type.Prod_type, subtype.sub_name FROM product left join `subtype` on product.sub_id = subtype.id LEFT JOIN type on type.id = product.type_id Limit $limit, $start</p>', 1, 10, '2021-09-27 06:57:58'),
(158, 'sarte', 4557, 124554000, '<p>SELECT product.id, product.name, product.desc_prod, product.quantity, product.price, type.Prod_type, subtype.sub_name FROM product left join `subtype` on product.sub_id = subtype.id LEFT JOIN type on type.id = product.type_id Limit $limit, $start</p>', 2, 12, '2021-09-27 06:59:23'),
(161, 'sarte', 3, 122, '<p>hgadfshgdfgHASDXDCSAXSADCSDCSDC</p>', 7, 11, '2021-09-27 10:09:38'),
(162, 'sfdsghdfhggh', 4545, 43454, '<p>XCDFV&nbsp; MNDVCJHVSDC SHGFHSD GHSD</p>', 3, 11, '2021-09-27 10:09:59'),
(163, 'dzcsasdfvcdsfv', 323323, 234332, '<p>dfvcsdfv dfvsdf sfdbfg dfgbfg sdfverv dfgfgb dfvgdf dfgdf sdfgfg</p>', 1, 12, '2021-09-28 05:33:36'),
(165, 'sdffgg', 2354, 5643, '<p>xdsfsdfb dfbv&nbsp; sdfvb sdfb fv fgb sfdbdfbf dfbgh ghdf hbfgn bgh gh ghn&nbsp;</p>', 9, 12, '2021-09-28 05:34:36'),
(166, 'bdfb', 4534, 454545, '<p>fnb dghdfb fgb&nbsp; fgh fdhgg dfbg fgn b f&nbsp;</p>', 7, 10, '2021-09-28 05:35:04');

-- --------------------------------------------------------

--
-- Table structure for table `subtype`
--

CREATE TABLE `subtype` (
  `id` int(12) NOT NULL,
  `sub_name` varchar(123) NOT NULL,
  `type_id` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subtype`
--

INSERT INTO `subtype` (`id`, `sub_name`, `type_id`) VALUES
(10, 'hgfdhsdd', 3),
(11, 'cvxbvnbfbvn', 16),
(12, 'cxfbvnb cvnb', 3),
(13, 'afsdfsadf', 6),
(14, 'dsfvdfb fv', 7),
(15, 'fvsdfvbfg', 1),
(16, 'sdfgsdfbfgv', 16),
(17, 'dfsvdfbvf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(6) NOT NULL,
  `Prod_type` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `Prod_type`) VALUES
(1, 'watch'),
(2, 'smart phone'),
(3, 'cloths'),
(5, 'shirt'),
(6, 'mobiles'),
(7, 'laptop'),
(8, 'hfhfhghg'),
(9, 'sdfedf'),
(16, 'sdfdgfsdgbfhgb'),
(17, 'zxcvdfdf');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(12) NOT NULL,
  `fname` varchar(123) DEFAULT NULL,
  `username` varchar(124) NOT NULL,
  `password` varchar(150) NOT NULL,
  `mobileno` varchar(10) DEFAULT NULL,
  `status` varchar(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `username`, `password`, `mobileno`, `status`) VALUES
(35, 'parvez', 'parvezkhan12799@gmail.com', '$2y$10$D5dCf0AxT0/BW7hnWv2lxOsVpIodVz.GxGhr5aJtB.4oGIjXS2SzK', '7987295687', '1'),
(36, 'parvez', 'pkpk120799@gmail.com', '$2y$10$H0QPvW73oKDpGseLfdVO6ubimkUz7W.RXoQhhG3niSRR.PeWhU3I.', '9630156997', '1'),
(37, 'ghjfgj', 'jhghsd@jkg.gj', '$2y$10$a20li7HS3ohV9jQSdaGL2ey8YfkAnNply3qFeeA34mFeNb/tOrJhe', '9878343747', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prod_id` (`prod_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_type` (`type_id`),
  ADD KEY `sub_id` (`sub_id`);

--
-- Indexes for table `subtype`
--
ALTER TABLE `subtype`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=224;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;
--
-- AUTO_INCREMENT for table `subtype`
--
ALTER TABLE `subtype`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`sub_id`) REFERENCES `subtype` (`id`);

--
-- Constraints for table `subtype`
--
ALTER TABLE `subtype`
  ADD CONSTRAINT `subtype_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
