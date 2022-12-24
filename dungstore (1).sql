-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2022 at 02:59 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dungstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id` int(11) NOT NULL,
  `cart_iddh` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `cart_quantity` int(11) NOT NULL,
  `cart_price` double NOT NULL DEFAULT 0,
  `product_name` varchar(50) NOT NULL,
  `cart_img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`id`, `cart_iddh`, `product_id`, `cart_quantity`, `cart_price`, `product_name`, `cart_img`) VALUES
(67, 180, 42, 1, 450000, 'Giày Công Phượng P191', 'wika2.jpg'),
(68, 181, 41, 3, 120000, 'Quần áo Công Phượng P191', 'wika4-1.jpg'),
(69, 182, 46, 2, 120000, 'Quần áo Công Phượng P192', 'wika5-1.jpg'),
(70, 182, 47, 2, 120000, 'Quần áo Công Phượng P193', 'wika6-1.jpg'),
(71, 183, 47, 3, 120000, 'Quần áo Công Phượng P193', 'wika6-1.jpg'),
(72, 184, 46, 4, 120000, 'Quần áo Công Phượng P192', 'wika5-1.jpg'),
(73, 184, 49, 4, 450000, 'Giày Công Phượng P191', 'wika1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cartegory`
--

CREATE TABLE `tbl_cartegory` (
  `cartegory_id` int(11) NOT NULL,
  `cartegory_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_cartegory`
--

INSERT INTO `tbl_cartegory` (`cartegory_id`, `cartegory_name`) VALUES
(23, 'NAM'),
(24, 'NỮ'),
(25, 'TRẺ EM'),
(31, '12312');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `order_code` varchar(20) NOT NULL,
  `order_total` int(11) NOT NULL,
  `order_payment` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_name` varchar(50) NOT NULL,
  `order_address` varchar(200) NOT NULL,
  `order_email` varchar(50) NOT NULL,
  `order_phone` varchar(20) NOT NULL,
  `order_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `order_code`, `order_total`, `order_payment`, `user_id`, `order_name`, `order_address`, `order_email`, `order_phone`, `order_status`) VALUES
(180, 'DUNGSTORE97545', 450000, 2, 22, 'Trần Quốc Dũng', '12345', 'dungtrandh2002@gmail.com', '111111', ''),
(181, 'DUNGSTORE21923', 360000, 1, 22, 'Trần Quốc Dũng', '12345', 'dungtrandh2002@gmail.com', '111111', ''),
(182, 'DUNGSTORE79293', 480000, 1, 22, 'Trần Quốc Dũng', '12345', 'dungtrandh2002@gmail.com', '111111', ''),
(183, 'DUNGSTORE41545', 360000, 1, 32, 'Dũng 123', 'Trà Vinh', '\r\n            dung456@gmail.com', '15788454', 'Đang vận chuyển'),
(184, 'DUNGSTORE72883', 2280000, 1, 32, 'Dũng 123', 'Trà Vinh', 'dung456@gmail.com', '15788454', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `cartegory_id` int(11) NOT NULL,
  `producttype_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_price_new` varchar(255) NOT NULL,
  `product_desc` varchar(5000) NOT NULL,
  `product_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `product_code`, `cartegory_id`, `producttype_id`, `product_quantity`, `product_price`, `product_price_new`, `product_desc`, `product_img`) VALUES
(41, 'Quần áo Công Phượng P191', 'P191', 23, 15, 11, '120000', '100000', '<p>Quần &aacute;o chất lượng cao</p>\r\n\r\n<p>Chất liệu co d&atilde;n&nbsp;</p>\r\n\r\n<p>Thoải m&aacute;i khi vận động&nbsp;</p>\r\n', 'wika4-1.jpg'),
(42, 'Giày Công Phượng P191', 'P192', 23, 13, 4, '450000', '420000', '<p>Gi&agrave;y mẫu m&atilde; mới đẹp mắt</p>\r\n\r\n<p>Chất lượng cao</p>\r\n\r\n<p>Ph&ugrave; hợp c&aacute;c loại s&acirc;n cỏ 5 v&agrave; 7</p>\r\n', 'wika2.jpg'),
(46, 'Quần áo Công Phượng P192', 'P192', 23, 15, 16, '120000', '110000', '<p>Quần &aacute;o mẫu m&atilde; đẹp&nbsp;</p>\r\n\r\n<p>Chất lượng vải tốt</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'wika5-1.jpg'),
(47, 'Quần áo Công Phượng P193', 'P193', 23, 15, 11, '120000', '110000', '<p>Quần &aacute;o mẫu m&atilde; đẹp&nbsp;</p>\r\n\r\n<p>Chất lượng vải tốt</p>\r\n', 'wika6-1.jpg'),
(48, 'Quần áo Công Phượng P194', 'P194', 23, 15, 25, '120000', '110000', '<p>Quần &aacute;o mẫu m&atilde; đẹp&nbsp;</p>\r\n\r\n<p>Chất lượng vải tốt</p>\r\n', 'wika7-1.jpg'),
(49, 'Giày Công Phượng P191', 'GCP191', 23, 13, 11, '450000', '430000', '<p>Gi&agrave;y mẫu m&atilde; mới đẹp mắt</p>\r\n\r\n<p>Chất lượng cao</p>\r\n\r\n<p>Ph&ugrave; hợp c&aacute;c loại s&acirc;n cỏ 5 v&agrave; 7</p>\r\n', 'wika1.jpg'),
(50, 'Giày Công Phượng P192', 'GP192', 23, 13, 20, '450000', '400000', '<p>Gi&agrave;y mẫu m&atilde; mới đẹp mắt</p>\r\n\r\n<p>Chất lượng cao</p>\r\n\r\n<p>Ph&ugrave; hợp c&aacute;c loại s&acirc;n cỏ 5 v&agrave; 7</p>\r\n', 'giay-wika-cp10-2.jpg'),
(51, 'áo 1', '1', 23, 15, 12, '121', '1122', '<p>adasd</p>\r\n', 'giay-wika-cp10-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_producttype`
--

CREATE TABLE `tbl_producttype` (
  `producttype_id` int(11) NOT NULL,
  `cartegory_id` int(11) NOT NULL,
  `producttype_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_producttype`
--

INSERT INTO `tbl_producttype` (`producttype_id`, `cartegory_id`, `producttype_name`) VALUES
(13, 23, 'Giày'),
(15, 23, 'Quần áo'),
(17, 23, 'Găng tay'),
(18, 24, 'Quần áo'),
(19, 24, 'Giày'),
(21, 25, 'Quần áo'),
(22, 25, 'Giày'),
(29, 23, 'Túi'),
(32, 31, '123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_img_desc`
--

CREATE TABLE `tbl_product_img_desc` (
  `product_id` int(11) NOT NULL,
  `img_id` int(11) NOT NULL,
  `product_img_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_product_img_desc`
--

INSERT INTO `tbl_product_img_desc` (`product_id`, `img_id`, `product_img_desc`) VALUES
(41, 45, 'wika4-2.jpg'),
(42, 46, 'wika2-1.jpg'),
(46, 50, 'wika5-2.jpg'),
(47, 51, 'wika6-2.jpg'),
(48, 52, 'wika7-2.jpg'),
(49, 53, 'wika1-1.jpg'),
(50, 54, 'giay-wika-cp10-2.1.jpg'),
(51, 55, 'giay-wika-cp10-1.1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phonenumber` int(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `role` tinyint(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `address`, `phonenumber`, `email`, `user`, `pass`, `role`) VALUES
(21, 'Tra', '12345', 977069416, 'quocdungtrandh2002@gmail.com', 'admin', '123', 1),
(22, 'Trần Quốc Dũng', '12345', 111111, 'dungtrandh2002@gmail.com', 'khachhang', '123', 3),
(23, 'Tra', '123456', 367621947, '20004027@gmail.com', 'nhanvien', '123', 2),
(24, 'Dũng 3 ', '1441', 76433, 'dung@gmail.com', 'khachang2', '123', 3),
(25, 'Trường chinh', 'Duyên Hải', 1234567890, 'Chinh@123', 'chinh', '123', 3),
(30, '1', '1', 123, '1@gmail.com', 'dung123', '123', 3),
(32, 'Dũng 123', 'Trà Vinh', 15788454, 'dung456@gmail.com', 'dung456', '123', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_cart` (`cart_iddh`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `tbl_cartegory`
--
ALTER TABLE `tbl_cartegory`
  ADD PRIMARY KEY (`cartegory_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_order` (`user_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `producttype_id` (`producttype_id`),
  ADD KEY `cartegory_id` (`cartegory_id`);

--
-- Indexes for table `tbl_producttype`
--
ALTER TABLE `tbl_producttype`
  ADD PRIMARY KEY (`producttype_id`),
  ADD KEY `cartegory_id` (`cartegory_id`);

--
-- Indexes for table `tbl_product_img_desc`
--
ALTER TABLE `tbl_product_img_desc`
  ADD PRIMARY KEY (`img_id`),
  ADD KEY `tbl_product_img_desc_ibfk_1` (`product_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user` (`user`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phonenumber` (`phonenumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `tbl_cartegory`
--
ALTER TABLE `tbl_cartegory`
  MODIFY `cartegory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `tbl_producttype`
--
ALTER TABLE `tbl_producttype`
  MODIFY `producttype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_product_img_desc`
--
ALTER TABLE `tbl_product_img_desc`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD CONSTRAINT `fk_order_cart` FOREIGN KEY (`cart_iddh`) REFERENCES `tbl_order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`);

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `fk_user_order` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`producttype_id`) REFERENCES `tbl_producttype` (`producttype_id`),
  ADD CONSTRAINT `tbl_product_ibfk_2` FOREIGN KEY (`cartegory_id`) REFERENCES `tbl_cartegory` (`cartegory_id`);

--
-- Constraints for table `tbl_producttype`
--
ALTER TABLE `tbl_producttype`
  ADD CONSTRAINT `tbl_producttype_ibfk_1` FOREIGN KEY (`cartegory_id`) REFERENCES `tbl_cartegory` (`cartegory_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_product_img_desc`
--
ALTER TABLE `tbl_product_img_desc`
  ADD CONSTRAINT `tbl_product_img_desc_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
