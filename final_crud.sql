-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2026 at 10:18 AM
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
-- Database: `final_crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `categolist`
--

CREATE TABLE `categolist` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `categolist`
--

INSERT INTO `categolist` (`id`, `name`, `created_at`, `updated_at`) VALUES
(14, 'hat', '2026-05-28 10:33:35', '2026-05-28 10:33:35'),
(15, 'shoes', '2026-05-28 10:33:41', '2026-05-28 10:33:41'),
(16, 'bag', '2026-05-28 10:43:33', '2026-05-28 10:43:33');

-- --------------------------------------------------------

--
-- Table structure for table `product_list`
--

CREATE TABLE `product_list` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` int(11) NOT NULL,
  `description` mediumtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `catego_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `product_list`
--

INSERT INTO `product_list` (`id`, `name`, `price`, `description`, `image`, `catego_id`, `created_at`, `updated_at`) VALUES
(17, 'mossoddom', 120000, 'import from Thailand', '6a1ba3a34b2c6Screenshot 2026-05-30 120747.png', 16, '2026-05-31 02:57:39', '2026-05-31 02:57:39'),
(18, 'cross', 230000, 'import from Thailand', '6a1c20e0b64b5Screenshot 2026-05-30 123229.png', 15, '2026-05-31 02:58:15', '2026-05-31 02:58:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categolist`
--
ALTER TABLE `categolist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_list`
--
ALTER TABLE `product_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categolist`
--
ALTER TABLE `categolist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product_list`
--
ALTER TABLE `product_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
