-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2025 at 08:05 AM
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
-- Database: `little_fashion`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `shipping` decimal(10,2) NOT NULL,
  `tax` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_amount`, `shipping`, `tax`, `created_at`) VALUES
(1, 1, 32.00, 5.00, 2.00, '2025-03-29 05:39:21'),
(2, 1, 42.80, 5.00, 2.80, '2025-03-29 05:44:06'),
(3, 1, 32.00, 5.00, 2.00, '2025-03-29 05:45:38');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_name`, `quantity`, `price`, `total`) VALUES
(1, 1, 'Tree pot', 1, 25.00, 25.00),
(2, 2, 'Fashion set', 1, 35.00, 35.00),
(3, 3, 'Tree pot', 1, 25.00, 25.00);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `short_description` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `category` varchar(50) DEFAULT NULL,
  `is_new_arrival` tinyint(1) DEFAULT 0,
  `is_popular` tinyint(1) DEFAULT 0,
  `is_discounted` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `short_description`, `price`, `image_path`, `category`, `is_new_arrival`, `is_popular`, `is_discounted`, `created_at`) VALUES
(1, 'Wedding', 'Our wedding film production service ensures that your special day is beautifully captured and transformed into a timeless cinematic masterpiece. From emotional vows to heartfelt speeches and unforgettable moments, we create a wedding film that tells your love story with elegance and creativity.', 'Wedding Film Production', 1.00, 'images/product/wedding.jpg', 'film', 1, 0, 0, '2025-03-24 13:08:16'),
(2, 'debut', 'Your 18th birthday is a once-in-a-lifetime event, and we’re here to capture every moment with a cinematic touch! From the grand entrance to the 18 roses, candles, and unforgettable speeches, our professional videography team ensures your debut is transformed into a beautifully edited film that you can cherish forever.', 'Debut Film Production', 1000.00, 'images/product/bday.jpg', 'film', 1, 0, 1, '2025-03-24 13:08:16'),
(3, 'brand', 'A compelling brand video is essential for engaging your audience and strengthening your brand identity. Our professional video production services help businesses create high-quality, impactful brand videos that resonate with their target market. Whether you need a corporate introduction, product showcase, or brand storytelling video, we craft cinematic visuals that make your brand stand out.', 'Nature made another world', 1500.00, 'images/product/brand.jpeg', 'film', 1, 0, 0, '2025-03-24 13:08:16'),
(4, 'Ultra Cam', 'A high-performance camera is essential for capturing life’s most memorable moments with clarity and precision. Our advanced camera technology empowers photographers and content creators to produce stunning images and cinematic videos with ease. Whether you are shooting professional portraits, action-packed scenes, or breathtaking landscapes, our camera delivers exceptional quality, speed, and versatility to bring your creative vision to life.', 'Original package design from house', 500.00, 'images/product/image.png', 'item', 0, 1, 0, '2025-03-24 13:08:16'),
(5, '100ft tripod', 'A sturdy and reliable tripod is essential for capturing stable, professional-quality photos and videos. Our high-performance tripod is designed for photographers and videographers who demand precision, durability, and versatility. Whether you are shooting long-exposure landscapes, recording smooth video footage, or capturing creative angles, this tripod provides the perfect balance of stability and flexibility to bring your vision to life.', 'Package design', 1000.00, 'images/product/image copy.png', 'item', 0, 1, 0, '2025-03-24 13:08:16'),
(6, 'Production Light', 'High-quality lighting is essential for achieving professional-grade photography and videography. Our production light delivers consistent, adjustable illumination to enhance every shot with precision and clarity. Whether you are shooting in a studio or on location, this versatile lighting solution ensures perfect exposure, natural skin tones, and cinematic depth, making it an essential tool for content creators, filmmakers, and photographers.', 'Original design from house', 1000.00, 'images/product/light.jpg', 'item', 0, 1, 1, '2025-03-24 13:08:16');

-- --------------------------------------------------------

--
-- Table structure for table `related_products`
--

CREATE TABLE `related_products` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `related_product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `related_products`
--

INSERT INTO `related_products` (`id`, `product_id`, `related_product_id`) VALUES
(1, 1, 2),
(2, 1, 3),
(3, 1, 4),
(4, 2, 1),
(5, 2, 3),
(6, 2, 5),
(7, 3, 1),
(8, 3, 2),
(9, 3, 6),
(10, 4, 1),
(11, 4, 5),
(12, 4, 6),
(13, 5, 2),
(14, 5, 4),
(15, 5, 6),
(16, 6, 3),
(17, 6, 4),
(18, 6, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `zip_code` varchar(20) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`, `address`, `city`, `state`, `zip_code`, `phone`) VALUES
(1, 'test', 'test@test.com', '$2y$12$Se7xxAiFuKSfXh3VKhxCAOSsF1xcDK7LnHNYLTk0nJIwluYd1F0CS', '2025-03-24 13:48:58', '2025-03-24 14:23:12', '37 Sitio Banay Banay', 'Jalajala', 'Rizal', '1990', '09195372951');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `related_products`
--
ALTER TABLE `related_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `related_product_id` (`related_product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `related_products`
--
ALTER TABLE `related_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `related_products`
--
ALTER TABLE `related_products`
  ADD CONSTRAINT `related_products_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `related_products_ibfk_2` FOREIGN KEY (`related_product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
