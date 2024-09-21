-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql308.infinityfree.com
-- Generation Time: Sep 12, 2024 at 03:26 PM
-- Server version: 10.6.19-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_37073296_furnitureshopmain`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `image`, `email`, `password`) VALUES
(1, 'Hamza Mughal', 'logogk1.png', 'admin@gmail.com', '123'),
(3, 'Surbhi', '', 'surbhi@gmail.com', 'Surbhi');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `cust_id`, `product_id`, `quantity`) VALUES
(86, 4, 42, 2),
(88, 4, 41, 2),
(94, 6, 41, 1),
(98, 5, 40, 2),
(104, 16, 34, 1),
(116, 19, 41, 1),
(117, 16, 45, 1),
(118, 18, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `fontawesome_icon` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_croatian_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `fontawesome_icon`) VALUES
(1, 'Household Almirah', 'fa-bed'),
(2, 'Office Almirah', 'fa-utensils-alt'),
(4, 'Locker Almirah', 'fa-columns'),
(5, 'Best Seller Almirah', 'fa-couch');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `fullname` text NOT NULL,
  `email` varchar(25) NOT NULL,
  `message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `fullname`, `email`, `message`) VALUES
(1, 'jhvyg', 'shh@gmail.com', 'shbcuhcaiph'),
(2, 'jhvyg', 'shh@gmail.com', 'shbcuhcaiph'),
(3, 'jkl', 'jhghgb@jhh', 'fth'),
(4, 'Amandeep Dubey', 'dubeyamandeep81@gmail.com', 'kuyuuyg'),
(5, 'jkl', 'jhghgb@jhh', 'fth'),
(6, 'Amandeep Dubey', 'dubeyamandeep81@gmail.com', 'kuyuuyg');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `cust_name` varchar(100) NOT NULL,
  `cust_email` varchar(100) NOT NULL,
  `cust_pass` varchar(100) NOT NULL,
  `cust_add` varchar(200) NOT NULL,
  `cust_city` varchar(50) NOT NULL,
  `cust_postalcode` varchar(50) NOT NULL,
  `cust_number` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_croatian_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_name`, `cust_email`, `cust_pass`, `cust_add`, `cust_city`, `cust_postalcode`, `cust_number`) VALUES
(5, 'demo', 'demo@gmail.com', '123', 'lahore cantt', 'lahore', '54840', '03224987258'),
(16, 'Surbhi', 'surbhi@gmail.com', 'Surbhi', 'Street No.-7', 'Patiala', '147001', '1234567897'),
(17, 'Aman', 'aman@gmail.com', 'aman', 'Uttar Pradesh', 'Uttar Pradesh', '12345', '123456789'),
(18, 'Amandeep', 'dubeyamandeep81@gmail.com', 'Aman113114@', 'saurikh kannauj', 'Kannauj', '209728', '07388418225'),
(19, 'Aarti', 'aarti@gmail.com', 'aarti', '#35', 'Patiala', '147003', '1234567890'),
(20, 'Pranav Singhal', 'pranavsinghal0001@gmail.com', '12121212', 'Naveen Nagar', 'Saharanpur', '247001', '08433430632'),
(21, 'Amandeep', 'dubeyamandeep81@gmail.com', 'Aman113114@', 'saurikh kannauj', 'Kannauj', '209728', '07388418225');

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_fullname` varchar(100) NOT NULL,
  `customer_address` varchar(225) NOT NULL,
  `customer_city` varchar(50) NOT NULL,
  `customer_pcode` int(11) NOT NULL,
  `customer_phonenumber` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_amount` int(11) NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `products_qty` int(11) NOT NULL,
  `order_date` varchar(100) NOT NULL,
  `order_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`order_id`, `customer_id`, `customer_email`, `customer_fullname`, `customer_address`, `customer_city`, `customer_pcode`, `customer_phonenumber`, `product_id`, `product_amount`, `invoice_no`, `products_qty`, `order_date`, `order_status`) VALUES
(65, 4, 'mhamzaq869@gmail.com', 'muhammad hamza qadri', 'h#3,St#62,area dar ul islam', 'lahore', 54810, '03077087412', 4, 22000, 1767434801, 1, '11-08-2020', 'delivered'),
(66, 4, 'mhamzaq869@gmail.com', 'muhammad hamza qadri', 'h#3,St#62,area dar ul islam', 'lahore', 54810, '03077087412', 4, 22000, 1945132454, 1, '18-08-2020', 'delivered'),
(67, 4, 'mhamzaq869@gmail.com', 'muhammad hamza qadri', 'h#3,St#62,area dar ul islam', 'lahore', 54810, '03077087412', 5, 19000, 1945132454, 1, '18-08-2020', 'verified'),
(68, 4, 'mhamzaq869@gmail.com', 'muhammad hamza qadri', 'h#3,St#62,area dar ul islam', 'lahore', 54810, '03077087412', 41, 12050, 1773695355, 1, '21-08-2020', 'verified'),
(69, 4, 'mhamzaq869@gmail.com', 'muhammad hamza qadri', 'h#3,St#62,area dar ul islam', 'lahore', 54810, '03077087412', 35, 54050, 1773695355, 1, '21-08-2020', 'verified'),
(70, 4, 'mhamzaq869@gmail.com', 'muhammad hamza qadri', 'h#3,St#62,area dar ul islam', 'lahore', 54810, '03077087412', 34, 14600, 1773695355, 1, '21-08-2020', 'delivered'),
(71, 5, 'demo@gmail.com', 'demo', 'lahore cantt', 'lahore', 54840, '03224987258', 39, 49800, 1637501531, 2, '23-08-2020', 'pending'),
(72, 5, 'demo@gmail.com', 'demo', 'lahore cantt', 'lahore', 54840, '03224987258', 32, 65000, 1637501531, 1, '23-08-2020', 'pending'),
(73, 5, 'demo@gmail.com', 'demo', 'lahore cantt', 'lahore', 54840, '03224987258', 34, 14600, 1637501531, 1, '23-08-2020', 'pending'),
(74, 6, 'khoslasurbhi14@gmail.com', 'Surbhi', '#774', 'Patiala', 147001, '6280829928', 41, 0, 1288725587, 2, '09-07-2024', 'pending'),
(75, 6, 'khoslasurbhi14@gmail.com', 'Surbhi', '#774', 'Patiala', 147001, '6280829928', 41, 0, 1120490330, 1, '09-07-2024', 'pending'),
(76, 16, 'surbhi@gmail.com', 'Surbhi', 'Street No.-7', 'Patiala', 147001, '1234567897', 40, 0, 1384620143, 2, '06-08-2024', 'pending'),
(77, 16, 'surbhi@gmail.com', 'Surbhi', 'Street No.-7', 'Patiala', 147001, '1234567897', 35, 0, 1384620143, 1, '06-08-2024', 'pending'),
(78, 16, 'surbhi@gmail.com', 'Surbhi', 'Street No.-7', 'Patiala', 147001, '1234567897', 32, 17599, 1269101672, 1, '06-08-2024', 'pending'),
(79, 16, 'surbhi@gmail.com', 'Surbhi', 'Street No.-7', 'Patiala', 147001, '1234567897', 34, 0, 1947602207, 1, '06-08-2024', 'pending'),
(80, 16, 'surbhi@gmail.com', 'Surbhi', 'Street No.-7', 'Patiala', 147001, '1234567897', 5, 13799, 941946295, 1, '06-08-2024', 'pending'),
(81, 17, 'aman@gmail.com', 'Aman', 'Uttar Pradesh', 'Uttar Pradesh', 12345, '123456789', 40, 20499, 197595037, 1, '13-08-2024', 'pending'),
(82, 19, 'aarti@gmail.com', 'Aarti', '#34', 'Patiala', 147001, '1234567890', 39, 17999, 973164885, 1, '19-08-2024', 'pending'),
(83, 19, 'aarti@gmail.com', 'Aarti', '#34', 'Patiala', 147001, '1234567890', 40, 20499, 563213688, 1, '22-08-2024', 'pending'),
(84, 19, 'aarti@gmail.com', 'Aarti', '#34', 'Patiala', 147001, '1234567890', 34, 0, 563213688, 1, '22-08-2024', 'pending'),
(85, 19, 'aarti@gmail.com', 'Aarti', '#35', 'Patiala', 147003, '1234567890', 40, 40998, 1341650509, 2, '23-08-2024', 'pending'),
(86, 19, 'aarti@gmail.com', 'Aarti', '#35', 'Patiala', 147003, '1234567890', 39, 17999, 1341650509, 1, '23-08-2024', 'pending'),
(87, 19, 'aarti@gmail.com', 'Aarti', '#35', 'Patiala', 147003, '1234567890', 32, 17599, 1341650509, 1, '23-08-2024', 'pending'),
(88, 19, 'aarti@gmail.com', 'Aarti', '#35', 'Patiala', 147003, '1234567890', 5, 13799, 1341650509, 1, '23-08-2024', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `furniture_product`
--

CREATE TABLE `furniture_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_img1` varchar(100) NOT NULL,
  `product_img2` varchar(100) NOT NULL,
  `product_img3` varchar(100) NOT NULL,
  `product_price` varchar(11) NOT NULL,
  `product_size` varchar(255) NOT NULL,
  `product_desc` text NOT NULL,
  `product_mat` varchar(255) NOT NULL,
  `product_model` varchar(255) NOT NULL,
  `product_warranty` varchar(255) NOT NULL,
  `product_door` varchar(255) NOT NULL,
  `product_drawer` varchar(255) NOT NULL,
  `product_paint` varchar(255) NOT NULL,
  `product_feature` varchar(255) NOT NULL,
  `product_avail` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `furniture_product`
--

INSERT INTO `furniture_product` (`product_id`, `product_name`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_size`, `product_desc`, `product_mat`, `product_model`, `product_warranty`, `product_door`, `product_drawer`, `product_paint`, `product_feature`, `product_avail`) VALUES
(4, 'GK BHAGYA SHREE', 'BS.jpg', 'BS1.jpg', 'BS2.jpg', '17199-19599', '1980*1060*525', '\r\n2. Dimension(MM): 1980*1060*525\r\n3. \r\n4. \r\n5.\r\n6. Model Type: Home Use\r\n7. Body Color : Referece this ss\r\n8.\r\n9. Door Color :\r\n10. \r\n', 'C.R.SHEET(TATA STEEL)', 'Home Use', '10 years on paints and lock', '2', ' 2', '100% powder coated', '', 10),
(5, '36 GK LAXMI', '11.jpg', '22.jpg', '33.jpg', '11400-12768', '1980*910*525', '\r\nDimension(MM): 1980*910*525\r\n\r\n\r\n\r\nModel Type: Home Use\r\nBody Color : Referece this ss\r\nDoor Color :\r\n', 'C.R.SHEET(TATA STEEL)', 'Home Use', '10 years on paints and lock', '2', '0', '100% powder coated', '', 15),
(32, 'GK OFFICE GLASS', 'Office.jpg', 'Office (2).jpg', 'Office.jpg', '15700-17599', '1980*910*525', 'Material: C.R.SHEET(TATA STEEL)\r\n\r\nDimension(MM): 1980*910*525\r\n\r\nWarranty: 10 years on paints and lock\r\n\r\nDoor Color :\r\nPaint Type : 100% powder coated.', 'C.R.SHEET(TATA STEEL)', 'Office & Library Use', '10 years on paints and lock', '2 ', '0', '100% powder coated', 'No of shelf: 6', 8),
(34, 'G.K LAXMI DRAWER', 'Laxmidrawer.jpg', 'Laxmidrawer1.jpg', 'Laxmidrawer2.jpg', '13699-15399', '1980*910*525', 'rdff', 'C.R.SHEET(TATA STEEL)', 'Home Use', '10 years on paints and lock', '2', '1', '100% powder coated', '', 12),
(35, 'GK COMBO', 'GK Combo.png', 'Combo1.png', 'GK COMBO2.png', '22499-25599', '1980*1220*525\n', 'Material: C.R.SHEET(TATA STEEL)\r\nDimension(MM): 1980*1220*525\r\n\r\n\r\nBody Color : Referece this ss\r\nDoor Color :\r\nPaint Type : 100% powder coated.', 'C.R.SHEET(TATA STEEL)', 'Home Use', '10 years on paints and lock', '3', '0', ' 100% powder coated', '', 20),
(39, ' GK CHOODIKESH', 'Choodikesh11.jpg', 'Choodikesh2.jpg', 'Choodikesh3.jpg', '14699-16462', '1980*910*525', 'Material: C.R.SHEET(TATA STEEL)\nDimension(MM): 1980*910*525\nModel Type: Home Use\nWarranty: 10 years on paints and lock\nNo of Doors : 2\nModel Type: Home Use\nBody Color : Referece this ss\nBangle Section : 1\nDoor Color :\nPaint Type : 100% powder coated.', 'C.R.SHEET(TATA STEEL)', 'Home Use ', '10 years on paints and lock', '3', '0', ' 100% powder coated', '1 inbuilt bangle store', 5),
(40, '42 GK PARTITION', '42 GK PARTITION.jpg', '42 GK PARTITION1.jpg', '42 GK PARTITION2.jpg', '16699-19199', '1980*1060*525', 'Material: C.R.SHEET(TATA STEEL) Dimension(MM): 1980*1060*525 Model Type: Home Use Warranty: 10 years on paints and lock Door Color : Paint Type : 100% powder coated.\r\nConvert this to bullet points', 'C.R.SHEET(TATA STEEL)', 'Home Use ', '10 years on paints and lock', ' 2  ', '0', ' 100% powder coated', 'No of Partition :1', 7),
(41, 'Gym Lockers', '1.png', '2.png', '3.png', 'depends on ', 'Customer can choose', 'Material: C.R.SHEET(TATA STEEL)\r\nDimension(MM): 1980*1060*525\r\n\r\nWarranty: 10 years on paints and lock\r\nBody Color : Referece this ss\r\n\r\nDoor Color :\r\nPaint Type : 100% powder coated', 'C.R.SHEET(TATA STEEL)', 'Public Safety Locker', '10 years on paints and lock', '0', '0', '100% powder coated', 'No. of Lockers: 15', 0),
(42, 'Combo Drawer', 'cd.jpg', 'cd2.jpg', 'cd3.jpg', '25000-29000', '1980*1220*525', 'wertgvrgftg', 'C.R.SHEET(TATA STEEL)', 'Home Use', '10 years on paints and lock', '3', '3', '100% powder coated', '', 10),
(43, 'Combo Drawer II', 'cd11.jpg\r\n', 'cd22.jpg', 'cd33.jpg', '25999-29699', '1980*1220*525', 'uygiugujhjlh', 'C.R.SHEET(TATA STEEL)', 'Home Use', '10 years on paints and lock', '3', '3', '100% powder coated', 'Mirror: Full dressing mirror', 7),
(44, 'G.K Four Door', 'fd1.jpg', 'fd2.jpg', 'fd3.jpg', '15799-17699', '1980*910*525', 'hygjhfyjgku', 'C.R.SHEET(TATA STEEL)', 'Home Use', '10 years on paints and lock', '4', '0', 'Paint Type : 100% powder coated', '', 7),
(45, 'G.K Office', 'O1.jpg', 'O2.jpg', 'O3.jpg', '13600-15232', '1980*910*525', 'dcfbgh', 'C.R.SHEET(TATA STEEL)', 'Office Use', '10 years on paints and lock', '2', '0', ' 100% powder coated', '', 5);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pay_id` int(11) NOT NULL,
  `pay_cust_id` int(11) NOT NULL,
  `pay_amount` int(11) NOT NULL,
  `pay_mode` varchar(50) NOT NULL,
  `pay_tr_id` varchar(50) NOT NULL,
  `pay_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pay_id`, `pay_cust_id`, `pay_amount`, `pay_mode`, `pay_tr_id`, `pay_date`) VALUES
(59, 5, 60000, 'COD', 'COD0863', '28-08-2020'),
(60, 4, 42000, 'COD', 'COD0836', '28-08-2020'),
(61, 5, 74000, 'COD', 'COD0756', '28-08-2020');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `product_id`, `category_id`) VALUES
(1, 4, 1),
(2, 5, 1),
(3, 32, 2),
(4, 34, 1),
(5, 35, 1),
(6, 39, 1),
(7, 40, 1),
(8, 41, 4),
(9, 42, 5),
(10, 44, 5),
(12, 5, 5),
(13, 39, 5),
(14, 42, 1),
(15, 43, 1),
(16, 44, 1),
(17, 45, 2);

-- --------------------------------------------------------

--
-- Table structure for table `product_feedback`
--

CREATE TABLE `product_feedback` (
  `feedback_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `feedback_text` varchar(200) NOT NULL,
  `feedback_date` date NOT NULL DEFAULT current_timestamp(),
  `customer_name` varchar(255) NOT NULL,
  `rating` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_feedback`
--

INSERT INTO `product_feedback` (`feedback_id`, `product_id`, `cust_id`, `feedback_text`, `feedback_date`, `customer_name`, `rating`) VALUES
(1, 39, 6, 'This is very good.', '2024-07-10', 'Surbhi', 0),
(2, 41, 6, 'This is very good.', '2024-07-10', '', 0),
(3, 41, 6, 'This is very good.', '2024-07-10', '', 0),
(4, 41, 6, 'This is very good.', '2024-07-10', '', 0),
(5, 39, 0, 'Amazing', '2024-08-05', 'Amish', 0),
(6, 40, 0, 'I liked it.', '2024-08-05', 'Aman', 0),
(7, 35, 0, 'Really nice.', '2024-08-05', 'Shikha', 0),
(8, 35, 0, 'Very good product.', '2024-08-05', 'Garima', 0),
(9, 40, 0, 'Very nice.', '2024-08-07', 'Seema', 3),
(11, 40, 0, 'Good', '2024-08-07', 'Rishab ', 3),
(12, 40, 0, 'Genuine product.', '2024-08-07', 'Ria', 4),
(13, 45, 0, 'ggggkjjkuy', '2024-08-26', 'amandeep', 5),
(14, 0, 0, '', '2024-08-26', '', 0),
(15, 0, 0, '', '2024-08-26', '', 0),
(16, 0, 0, '', '2024-08-26', '', 0),
(17, 0, 0, '', '2024-08-26', '', 0),
(18, 0, 0, '', '2024-08-26', '', 0),
(19, 0, 0, '', '2024-08-26', '', 0),
(20, 0, 0, '', '2024-08-26', '', 0),
(21, 0, 0, '', '2024-08-26', '', 0),
(22, 0, 0, '', '2024-08-26', '', 0),
(23, 0, 0, '', '2024-08-26', '', 0),
(24, 0, 0, '', '2024-08-26', '', 0),
(25, 0, 0, 'gkikhl;ok', '2024-08-26', 'Surbhi', 3);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `name`, `rating`, `comment`, `created_at`) VALUES
(2, 39, 'Surbhi', 5, 'Very Good.', '2024-07-23'),
(3, 39, 'Sakshi', 3, 'I liked it.', '2024-07-23');

-- --------------------------------------------------------

--
-- Table structure for table `warranty_activations`
--

CREATE TABLE `warranty_activations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `postalcode` int(255) NOT NULL,
  `contact_number` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `serial_number` varchar(50) NOT NULL,
  `activation_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `warranty_activations`
--

INSERT INTO `warranty_activations` (`id`, `name`, `address`, `city`, `postalcode`, `contact_number`, `email`, `password`, `serial_number`, `activation_date`) VALUES
(10, 'Amandeep', 'saurikh kannauj', 'Kannauj', 209728, '07388418225', 'dubeyamandeep81@gmail.com', '', '36GKLM-00059', '2024-08-21'),
(11, 'Amandeep', 'saurikh kannauj', 'Kannauj', 209728, '07388418225', 'dubeyamandeep81@gmail.com', 'Aman113114@', '36GKLM-00059', '2024-08-27');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlist_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_croatian_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wishlist_id`, `cust_id`, `product_id`) VALUES
(1, 4, 4),
(3, 4, 3),
(4, 5, 39),
(5, 4, 40);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `furniture_product`
--
ALTER TABLE `furniture_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_feedback`
--
ALTER TABLE `product_feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warranty_activations`
--
ALTER TABLE `warranty_activations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlist_id`),
  ADD KEY `cust_id` (`cust_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `furniture_product`
--
ALTER TABLE `furniture_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `product_feedback`
--
ALTER TABLE `product_feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `warranty_activations`
--
ALTER TABLE `warranty_activations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
