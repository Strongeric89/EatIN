-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2017 at 10:04 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restraunt`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `name`) VALUES
(2, 'admin@admin.com', 'admin', 'eric strong'),
(3, 'admin2@admin.com', 'admin2', 'admin2'),
(4, 'admin3@admin.com', 'admin3', 'admin3'),
(5, 'batman@batman.com', 'admin', 'batman');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `date_joined` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `email`, `password`, `date_joined`) VALUES
(1, 'Eric', 'Strong', 'ericstrong@dit.ie', 'password1', '2017-03-29 19:08:51'),
(2, 'Laura', 'Bermingham', 'bermo@gmail.com', 'password1', '2017-03-29 19:09:57'),
(3, 'conor', 'hart', 'chart@yahoo.ie', 'password1', '2017-03-29 19:11:04'),
(4, 'margaret', 'cosgrave', 'mags2356@eircom.net', 'password1', '2017-03-29 19:11:04'),
(5, 'billy', 'bobby', 'bob@gmail.com', '1234', '2017-04-11 08:51:48'),
(6, 'billy', 'bobby', 'bob@gmail.com', '1234', '2017-04-11 08:53:20'),
(7, 'Bruce', 'Wayne', 'batman@batcave.com', '1234', '2017-04-11 08:54:07'),
(8, 'clarke', 'kent', 'superguy@gmail.com', '1234', '2017-04-11 08:55:24'),
(9, 'tony', 'stark', 'ironman@im.com', 'hulkissmelly', '2017-04-11 08:57:08'),
(100, 'Guest', 'guest', 'guest@guest', 'guest', '2017-04-11 11:16:14'),
(101, 'hulk', 'incredible', 'hulk@avengers.com', '1234', '2017-04-11 11:26:58'),
(102, 'tom', 'petty', 'tom@gmail.com', '1234', '2017-04-11 13:03:29'),
(104, 'Laura', 'Bermingham', 'lauraB@gmail.com', '12345', '2017-04-11 17:27:29'),
(105, 'PufferBear', 'strong', 'puffer@gmail.com', '1234', '2017-04-11 19:33:41');

-- --------------------------------------------------------

--
-- Table structure for table `customer_addresses`
--

CREATE TABLE `customer_addresses` (
  `id` int(10) NOT NULL,
  `customer` int(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `county` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_addresses`
--

INSERT INTO `customer_addresses` (`id`, `customer`, `address`, `city`, `county`) VALUES
(1, 1, '11 vilage green kilbreck', 'stamullen', 'meath'),
(2, 2, '19 riversdale park', 'palmerston', 'dublin'),
(3, 3, '21 main street', 'birr', 'offaly'),
(4, 4, '33 moat view gardens', 'priorswood', 'dublin');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `catagory` int(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `catagory`, `image`) VALUES
(5, 'spring rolls', '3.05', 1, 'images/starter.jpg'),
(6, 'prawn toast', '3.80', 1, 'images/starter.jpg'),
(7, 'spicy noodle soup', '4.20', 2, 'images/soup.jpg'),
(8, 'chicken and sweet corn soup', '3.10', 2, 'images/soup.jpg'),
(9, 'specialnoodle soup', '3.80', 2, 'images/soup.jpg'),
(10, 'won ton soup', '4.20', 2, 'images/soup.jpg'),
(11, 'king prawn rolls with garlic', '4.05', 3, 'images/seafood.jpg'),
(12, 'seafood yuk sung', '3.80', 3, 'images/seafood.jpg'),
(13, 'squid with salt and chili', '3.70', 3, 'images/seafood.jpg'),
(14, 'baked prawns and seafood sauce', '4.60', 3, 'images/seafood.jpg'),
(15, 'mix spicy box', '4.80', 4, 'images/specials.jpg'),
(16, 'spicy bag', '3.00', 4, 'images/specials.jpg'),
(17, 'large 3 in 1', '3.00', 4, 'images/specials.jpg'),
(18, 'chips and curry sauce', '4.00', 4, 'images/specials.jpg'),
(20, 'kids chicken curry', '3.00', 6, 'images/kids.jpg'),
(21, 'small 3 in 1', '4.10', 6, 'images/kids.jpg'),
(23, 'shredded chicken with honey sauce', '4.70', 5, 'images/rec.jpg'),
(24, 'chicken with lemon sauce', '3.60', 5, 'images/rec.jpg'),
(25, 'shredded chili chicken in sauce', '3.50', 5, 'images/rec.jpg'),
(26, 'chicken or beef cashew nuts', '4.70', 5, 'images/rec.jpg'),
(27, 'house special curry', '8.90', 7, 'images/curry.jpg'),
(28, 'fillet beef curry', '7.75', 7, 'images/curry.jpg'),
(29, 'mixed vegtable curry', '6.90', 7, 'images/curry.jpg'),
(30, 'chicken curry', '8.20', 7, 'images/curry.jpg'),
(31, 'chow mein special', '8.60', 8, 'images/chow.jpg'),
(32, 'singapore chow mein', '7.20', 8, 'images/chow.jpg'),
(33, 'seafood chow mein', '6.60', 8, 'images/chow.jpg'),
(34, 'king prawn chow mein', '8.90', 8, 'images/chow.jpg'),
(35, 'chips', '2.20', 9, 'images/extra.jpg'),
(36, 'egg fried rice', '1.14', 9, 'images/extra.jpg'),
(37, 'chichen balls 3', '2.15', 9, 'images/extra.jpg'),
(38, 'sauce', '3.20', 9, 'images/extra.jpg'),
(40, 'can of coke', '1.90', 10, 'images/drinks.jpg'),
(41, 'can of 7up', '1.50', 10, 'images/drinks.jpg'),
(42, 'can of fanta orange', '1.50', 10, 'images/drinks.jpg'),
(43, 'bottle of watter', '1.90', 10, 'images/drinks.jpg'),
(107, 'chilli sauce', '7.50', 9, 'images/extra.jpg'),
(108, '3in 1 with chilli sauce', '7.85', 4, 'images/specials.jpg'),
(111, 'Prawn Crackers', '2.50', 1, 'images/starter.jpg'),
(112, 'Spring Rolls', '4.75', 1, 'images/starter.jpg'),
(113, 'yuk sun', '6.50', 1, 'images/starter.jpg'),
(114, 'sweet corn bowl', '5.00', 1, 'images/starter.jpg'),
(116, 'kids ice cream', '4.70', 6, 'images/kids.jpg'),
(117, 'kids noodles and sauce', '5.60', 6, 'images/kids.jpg'),
(118, 'special prawn rice', '7.80', 4, 'images/specials.jpg'),
(119, 'wan tan soup', '5.40', 2, 'images/soup.jpg'),
(120, 'curry and noodle soup', '3.40', 2, 'images/soup.jpg'),
(121, 'happy meal with toy', '7.90', 5, 'images/kids.jpg'),
(122, 'chips, rice and meat kids', '7.60', 5, 'images/kids.jpg'),
(123, 'seafood curry', '11.20', 7, 'images/seafood.jpg'),
(124, 'duck curry', '4.75', 7, 'images/chow.jpg'),
(125, 'black bean chow mein', '8.90', 8, 'images/rec.jpg'),
(126, 'house special chow mein', '9.90', 8, 'images/chow.jpg'),
(127, 'boiled rice', '4.50', 9, 'images/curry.jpg'),
(128, 'tiger beer', '8.90', 10, 'images/drinks.jpg'),
(129, 'large Pepsi', '1.20', 10, 'images/drinks.jpg'),
(131, 'sticky chicken', '10.00', 4, 'images/specials.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products_catagory`
--

CREATE TABLE `products_catagory` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_catagory`
--

INSERT INTO `products_catagory` (`id`, `name`) VALUES
(1, 'starters'),
(2, 'soups'),
(3, 'seafood'),
(4, 'special value meals'),
(5, 'kids meals'),
(6, 'house recommendations'),
(7, 'curry dishes'),
(8, 'chow mein dishes'),
(9, 'extra portions'),
(10, 'drinks');

-- --------------------------------------------------------

--
-- Table structure for table `shoppingbasket`
--

CREATE TABLE `shoppingbasket` (
  `product_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL DEFAULT '1',
  `customer_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shoppingbasket`
--

INSERT INTO `shoppingbasket` (`product_id`, `quantity`, `customer_id`) VALUES
(29, 2, 9),
(42, 2, 9),
(16, 2, 6),
(41, 2, 6),
(15, 2, 7),
(131, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_addresses`
--
ALTER TABLE `customer_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer` (`customer`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `catagory` (`catagory`),
  ADD KEY `catagory_2` (`catagory`),
  ADD KEY `catagory_3` (`catagory`),
  ADD KEY `catagory_4` (`catagory`);

--
-- Indexes for table `products_catagory`
--
ALTER TABLE `products_catagory`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;
--
-- AUTO_INCREMENT for table `customer_addresses`
--
ALTER TABLE `customer_addresses`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;
--
-- AUTO_INCREMENT for table `products_catagory`
--
ALTER TABLE `products_catagory`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_addresses`
--
ALTER TABLE `customer_addresses`
  ADD CONSTRAINT `customer_addresses_ibfk_1` FOREIGN KEY (`customer`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`catagory`) REFERENCES `products_catagory` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
