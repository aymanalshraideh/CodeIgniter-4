-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2022 at 08:30 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `devices`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `brand_slogan` varchar(255) NOT NULL,
  `brand_description` longtext NOT NULL,
  `brand_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_slogan`, `brand_description`, `brand_image`) VALUES
(16, 'Samsung', 'samsung', '   samsung                       ', 'uploads/images/1671537657_735100545aef5cf45c97.jpg'),
(20, 'Apple', 'Apple', '                      Apple       ', 'uploads/images/1671561610_f01f477e2441b377b177.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `show_room` varchar(255) NOT NULL,
  `category_description` longtext NOT NULL,
  `category_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `show_room`, `category_description`, `category_image`) VALUES
(5, 'Mobiles', 'Mobiles ', '                              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur distinctio cumque tempora temporibus porro nihil saepe quam hic! Magni similique dignissimos tempore tempora dolor facilis? Dignissimos magni fugit amet consequuntur.\r\n', 'uploads/images/category/1671606589_f591e9b1a271deacc026.jpg'),
(6, 'Laptop ', 'Laptop', '                           Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur distinctio cumque tempora temporibus porro nihil saepe quam hic! Magni similique dignissimos tempore tempora dolor facilis? Dignissimos magni fugit amet consequuntur.\r\n   ', 'uploads/images/category/1671606628_4c6a826651e940244959.png'),
(7, 'TV', 'TV', '                              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur distinctio cumque tempora temporibus porro nihil saepe quam hic! Magni similique dignissimos tempore tempora dolor facilis? Dignissimos magni fugit amet consequuntur.\r\n', 'uploads/images/category/1671606646_d8c3d33c5bd0643aa4df.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_model` varchar(255) NOT NULL,
  `product_color` varchar(100) NOT NULL,
  `product_specification` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_count` varchar(255) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_image4` varchar(255) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_model`, `product_color`, `product_specification`, `product_price`, `product_count`, `product_image1`, `product_image2`, `product_image3`, `product_image4`, `brand_id`, `category_id`) VALUES
(6, 'MacBook Pro', '14 & 16', 'Salver ', 'Lorem ipsum dolor sitimos tempore tempora dolor facilis? Dignissimos magni fugit amet consequuntur.\n', '1500', '10', 'uploads/images/product/1671606737_e0df5291c8d7c0deeed4.png', 'uploads/images/product/1671606737_51b5724cd206343b7008.png', 'uploads/images/product/1671606737_636db989f931f9555e4a.png', 'uploads/images/product/1671606737_7589c9aa5df75fc6b319.png', 20, 6),
(7, 'I Phone ', '12', 'Black', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur diDignissimos magni fugit amet consequuntur.\r\n', '500 ', '10', 'uploads/images/product/1671606972_129caa0e1901886180f7.jpg', 'uploads/images/product/1671606972_5b677d2d436582ea6c84.jpg', 'uploads/images/product/1671606972_515d9ce1300172083479.jpg', 'uploads/images/product/1671606972_cfcdded8cc11b0654f13.jpg', 20, 5),
(8, 'I Phone ', '14 Pro Max', 'White', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur distincs? Dignissimos magni fugit amet consequuntur.\r\n', '1500', '17', 'uploads/images/product/1671607154_b2ebef57ce6b77a05dc7.jpg', 'uploads/images/product/1671607154_5707997fcdb6ec60fb7c.jpg', 'uploads/images/product/1671607154_22f4414db8583ce047ad.jpg', 'uploads/images/product/1671607154_44ce842b8c614d1c7fce.jpg', 20, 5),
(9, 'Smart TV ', 'Samsung TV Plus ', 'Black', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur distinctio cumque tempora temporibus porro facilis? Dignissimos magni fugit amet consequuntur.\r\n', '1200', '22', 'uploads/images/product/1671607357_fae4262cae8988ab4c47.png', 'uploads/images/product/1671607357_f453a5845f55db8acd68.jpg', 'uploads/images/product/1671607358_4400896f7cf0d518f1bc.jpg', 'uploads/images/product/1671607358_cf2e2c5997c3e7fea0de.png', 16, 7),
(10, 'Samsung Galaxy ', 'A72', 'Pink', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur distinctio cumque tempora temporibus porro nihil saepe quam hicignissimos magni fugit amet consequuntur.\r\n', '350', '10', 'uploads/images/product/1671607650_b37f0ee04bc2618ffbf3.jpg', 'uploads/images/product/1671607650_c48359a02fe2c944fd50.jpg', 'uploads/images/product/1671607650_4f6a81f5abefe4110fa2.png', 'uploads/images/product/1671607650_dbab58fe9894cec9af3b.jpg', 16, 5),
(11, 'Galaxy', 'Z Fold 2', 'Black', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur distinctio cumque tempora temporibus porro nihil saeolor facilis? Dignissimos magni fugit amet consequuntur.\r\n', '1200', '10', 'uploads/images/product/1671607772_1f0b8348e6b9f3839dc7.jpg', 'uploads/images/product/1671607772_3a026ecc92bb5c089f2e.jpg', 'uploads/images/product/1671607772_898ec92899555f715355.png', 'uploads/images/product/1671607772_16ffca7c525f5ee6d15c.jpeg', 16, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'Ayman', 'ayman@gmail.com', '$2y$10$BCuU3Pi/b1m3MPKz3I.pL.x6aw6.xB..m8/mLUnF4lx7LeYp7nuGS', 'admin', '2022-12-17 08:34:18'),
(2, 'Ali', 'ali@gmail.com', '$2y$10$g9DiJ7s8gDBOT4nJAWuWoeU7alMGFdOFkcMRWE9SSXx6riUSuMuR2', 'user', '2022-12-17 09:32:25');

-- --------------------------------------------------------

--
-- Table structure for table `wish`
--

CREATE TABLE `wish` (
  `wish_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_idd` int(11) NOT NULL,
  `category_idd` int(11) NOT NULL,
  `brand_idd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `products_ibfk_1` (`brand_id`),
  ADD KEY `products_ibfk_2` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wish`
--
ALTER TABLE `wish`
  ADD PRIMARY KEY (`wish_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_idd`),
  ADD KEY `brand_id` (`brand_idd`),
  ADD KEY `category_id` (`category_idd`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wish`
--
ALTER TABLE `wish`
  MODIFY `wish_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wish`
--
ALTER TABLE `wish`
  ADD CONSTRAINT `wish_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `wish_ibfk_2` FOREIGN KEY (`product_idd`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `wish_ibfk_3` FOREIGN KEY (`brand_idd`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `wish_ibfk_4` FOREIGN KEY (`category_idd`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
