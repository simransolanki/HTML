-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 24, 2018 at 08:58 AM
-- Server version: 10.2.12-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id7360720_scoopsnsmile`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `username` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`username`, `password`, `name`, `mobile`, `address`) VALUES
('simi', 'simi41098S@', 'simran', '8692817632', 'khar'),
('test', 'test', 'test', '123', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `username` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `mobile_no` int(10) NOT NULL,
  `Address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders1`
--

CREATE TABLE `orders1` (
  `id` int(11) NOT NULL,
  `name` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `icecream_flavour` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(250) NOT NULL,
  `mobile` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(300) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders1`
--

INSERT INTO `orders1` (`id`, `name`, `category`, `icecream_flavour`, `quantity`, `mobile`, `address`) VALUES
(3, 'simran', 'Kulfi', 'Malia', 5, '8692817632', 'khar');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `image` text NOT NULL,
  `price` text NOT NULL,
  `category` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `image`, `price`, `category`) VALUES
(5, 'Vanilla', 'vanilla.jpg', '50 rs', 'family'),
(6, 'Strawberry', 'strawberry.png', '50 rs', 'family'),
(8, 'Strawberry', 'strawberry.jpg', '20 rs', 'cup'),
(9, 'Chocolate', 'chocolate.jpg', '20 rs', 'cup'),
(10, 'BlackCurrent', 'blackcurrent.jpg', '30 rs', 'cup'),
(11, 'Butterscotch', 'butterscotch.jpg', '30 rs', 'cup'),
(13, 'Americun nut', 'american.jpg', '40 rs', 'cup'),
(14, 'Rajbhog', 'rajbhog.jpg', '40 rs', 'cup'),
(15, 'Chocolate', 'chocolate.png', '50 rs', 'family'),
(16, 'Blackcurrent', 'blackcurrent.jpg', '60 rs', 'family'),
(17, 'Butterscotch', 'butterscotch.jpg', '60 rs', 'family'),
(18, 'RajBhog', 'rajbhog.png', '70 rs', 'family'),
(19, 'Malia ', 'malia.png', '20 rs', 'kulfi'),
(20, 'Kesar', 'kesar.png', '30 rs', 'kulfi'),
(21, 'Jelly', 'Jelly.jpg', '40 rs', 'kulfi'),
(22, 'Pista', 'pista.jpg', '20 rs', 'kulfi'),
(23, 'Pista Dryfruit', 'pista1.jpg', '35 rs', 'kulfi'),
(24, 'Malia Pista', 'maliapista.png', '40 rs', 'kulfi'),
(25, 'Malia Mutka', 'maliam.png', '45 rs', 'kulfi'),
(26, 'Mutka Dryfruit', 'mutkadr.jpg', '50 rs', 'kulfi'),
(27, 'Badam', 'badam.jpg', '40 rs', 'roll'),
(28, 'Butterscotch', 'butterscotch.jpg', '20 rs', 'roll'),
(29, 'Chocolate', 'chocolate.jpg', '30 rs', 'roll'),
(30, 'Choco Vanilla', 'chocov.jpg', '35 rs', 'roll'),
(31, 'Choco Swizz', 'cswizz.jpg', '40 rs', 'roll'),
(42, 'Kesar Pista', 'Kesarp.jpg', '60rs', 'roll');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders1`
--
ALTER TABLE `orders1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders1`
--
ALTER TABLE `orders1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
