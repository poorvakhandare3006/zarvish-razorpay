-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2020 at 12:49 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dummy`
--

-- --------------------------------------------------------

--
-- Table structure for table `bulk_lead`
--

CREATE TABLE `bulk_lead` (
  `bulk_lead_id` int(5) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `Requirement` text NOT NULL,
  `register_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `color_id` int(2) NOT NULL,
  `color_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`color_id`, `color_name`) VALUES
(1, 'Black'),
(2, 'White'),
(3, 'Red'),
(4, 'Yellow'),
(5, 'Pink'),
(6, 'Green'),
(7, 'Blue'),
(8, 'Purple'),
(9, 'Navy'),
(10, 'Grey'),
(11, 'Maroon'),
(12, 'Mix');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_phone` varchar(255) NOT NULL,
  `customer_password` text NOT NULL,
  `customer_affiliate_id` varchar(255) NOT NULL,
  `customer_referrer_id` varchar(255) NOT NULL,
  `customer_interest` int(1) NOT NULL,
  `customer_register_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `genders`
--

CREATE TABLE `genders` (
  `gender_id` int(1) NOT NULL,
  `gender_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genders`
--

INSERT INTO `genders` (`gender_id`, `gender_name`) VALUES
(1, 'Men'),
(2, 'Women'),
(3, 'Child'),
(4, 'Other'),
(5, 'Watch');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) NOT NULL,
  `order_person_name` varchar(255) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `customer_referrer_id` varchar(255) NOT NULL,
  `product_id` int(10) NOT NULL,
  `product_size` varchar(3) NOT NULL,
  `product_color` varchar(50) NOT NULL,
  `product_qty` int(2) NOT NULL,
  `subtotal` int(4) NOT NULL,
  `address_id` int(10) NOT NULL,
  `invoice_no` varchar(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `payment_status` text NOT NULL,
  `payment_type` int(1) NOT NULL,
  `is_delivered` varchar(3) NOT NULL,
  `is_cancelled` varchar(3) NOT NULL,
  `is_return` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_address`
--

CREATE TABLE `order_address` (
  `address_id` int(10) NOT NULL,
  `street` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `customer_email` varchar(80) NOT NULL,
  `customer_phone` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment_types`
--

CREATE TABLE `payment_types` (
  `payment_type_id` int(1) NOT NULL,
  `payment_type_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_types`
--

INSERT INTO `payment_types` (`payment_type_id`, `payment_type_name`) VALUES
(1, 'Cash on delivery'),
(2, 'Online');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `product_gender_id` int(1) NOT NULL,
  `product_category_id` int(2) NOT NULL,
  `product_title` text NOT NULL,
  `product_code` varchar(100) NOT NULL,
  `product_color` int(2) NOT NULL,
  `product_qty` int(2) NOT NULL,
  `product_actual_price` int(3) NOT NULL,
  `product_selling_price` int(3) NOT NULL,
  `product_search_keyword` text NOT NULL,
  `product_label` int(2) NOT NULL,
  `product_date` date NOT NULL,
  `product_description` text NOT NULL,
  `main_product` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_gender_id`, `product_category_id`, `product_title`, `product_code`, `product_color`, `product_qty`, `product_actual_price`, `product_selling_price`, `product_search_keyword`, `product_label`, `product_date`, `product_description`, `main_product`) VALUES
(32, 1, 1, 'Akela Skyblue Round Neck Half Sleeve T-shirt', 'zarvish-old', 99, 1, 800, 309, 'Akela Skyblue Round Neck Half Sleeve T-shirt', 1, '2019-03-18', 'Fabric:Cotton | Color:Skyblue | Sleeve:Half Sleeve | Neck:Round Neck rn | Brand: Zarvish', 'yes'),
(34, 1, 1, 'Bhayankar Alsi White Round Neck Half Sleeve T-shirt', 'zarvish-old', 99, 4, 850, 309, 'Bhayankar Alsi White Round Neck Half Sleeve T-shirt', 1, '2019-03-18', 'Fabric:Cotton | Color:White | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(35, 1, 1, 'Chal Paka Mat Black Half Sleeve T-shirt | cotton', 'zarvish-old', 99, 3, 499, 299, 'Chal Paka Mat Black Half Sleeve T-shirt | cotton', 1, '2019-03-18', 'Fabric:Cotton | Color:Black | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(45, 1, 1, 'My Dad is my hero White Round Neck Tshirt | Men', 'zarvish-old', 99, 12, 849, 309, 'My Dad is my hero White Round Neck Tshirt | Men', 1, '2019-03-18', 'Fabric:Polyster | Color:White | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(48, 1, 1, '9 Tanki White Half sleeve round neck tshirt', 'zarvish-old', 99, 3, 849, 309, '9 Tanki White Half sleeve round neck tshirt', 1, '2019-03-21', 'Fabric:Polyster  |  Color:White  |  Sleeve:Half Sleeve  |  Neck:Round Neck  |  Brand: Zarvish', 'yes'),
(49, 1, 1, '100 Percent Desi White Half sleeve round neck t-shirt', 'zarvish-old', 99, 3, 999, 309, '100 Percent Desi White Half sleeve round neck t-shirt', 1, '2019-03-21', 'Fabric:Polyster  |  Color:White  |  Sleeve:Half Sleeve  |  Neck:Round Neck  |  Brand: Zarvish', 'yes'),
(50, 1, 1, 'Apni Hati To Sabki Fati White Round Neck Half Sleeve T-shirt | Zarvish', 'zarvish-old', 99, 2, 999, 303, 'Apni Hati Toh Sabki Fati White Round Neck Half Sleeve T-shirt | Zarvish', 1, '2019-03-21', 'Fabric:Polyster  |  Color:White  |  Sleeve:Half Sleeve  |  Neck:Round Neck  |  Brand: Zarvish', 'yes'),
(51, 1, 1, 'Avaaj Niche White Round Neck Half Sleeve T-shirt | Zarvish', 'zarvish-old', 99, 1, 899, 303, 'Avaaj Niche White Round Neck Half Sleeve T-shirt | Zarvish', 1, '2019-03-21', 'Fabric:Polyster | Color:White | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(52, 1, 1, 'Do more talk less white half round neck t-shirt | Zarvish', 'zarvish-old', 99, 1, 999, 309, 'Do more talk less white half round neck t-shirt', 3, '2019-03-21', 'Fabric:Polyster | Color:White | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(53, 1, 1, 'Gadariya white half round neck t-shirt | Zarvish', 'zarvish-old', 99, -4, 999, 309, 'Gadariya white half round neck t-shirt', 3, '2019-03-21', 'Fabric:Polyster | Color:White | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(55, 1, 1, 'Chhora Jamindar Ka White Round Neck Half Sleeve T-shirt | Zarvish', 'zarvish-old', 99, 2, 999, 309, 'Chhora Jamindar Ka', 1, '2019-03-21', 'Fabric:Polyster | Color:White | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(56, 1, 1, 'Kal Se Sutta Band White Round Neck Half sleeve T-shirt | Zarvish', 'zarvish-old', 99, 3, 999, 303, 'Kal Se Sutta Band White Round Neck Half Sleeve T-shirt | Zarvish', 1, '2019-03-21', 'Fabric:Polyster | Color:White | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(57, 1, 1, 'Katai Zahar Dialogue white round neck half sleeve t-shirt', 'zarvish-old', 99, 3, 999, 303, 'Katai Zahar Dialogue white round neck half sleeve t-shirt', 1, '2019-03-21', 'Fabric:Polyster | Color:White | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(58, 1, 1, 'Kshatriya white round neck half Men\'s t-shirt | Zarvish', 'zarvish-old', 99, 3, 799, 309, 'Kshatriya white round neck half Men\'s t-shirt', 1, '2019-03-21', 'Fabric:Polyster | Color:White | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(59, 1, 1, 'No 3g No 4g only Pubg t-shirt | Zarvish', 'zarvish-old', 99, 3, 459, 309, 'No 3g No 4g only Pubg t-shirt', 1, '2019-03-21', 'Fabric:Cotton | Color:Black | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(60, 1, 1, 'Ohh F*ck Black round neck t-shirt | Zarvish', 'zarvish-old', 99, 3, 459, 309, 'Ohh F*ck Black round neck t-shirt | Zarvish', 1, '2019-03-21', 'Fabric:cotton | Color:black | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(61, 1, 1, 'Paisa Moh maya hai black round neck half sleeve t-shirt | Zarvish', 'zarvish-old', 99, 3, 459, 309, 'Paisa Moh maya hai black round neck half sleeve t-shirt | Zarvish', 1, '2019-03-21', 'Fabric:Cotton | Color:Black | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(62, 1, 1, 'Rajput white round neck half Men\'s T-shirt |Zarvish', 'zarvish-old', 99, 3, 999, 303, 'Rajput white round neck half Men\'s T-shirt', 1, '2019-03-21', 'Fabric:Polyster | Color:White | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(63, 1, 1, 'Sada Sexy Raho White Round Neck Half Sleeve T-shirt | Zarvish', 'zarvish-old', 99, 2, 799, 309, 'Sada Sexy Raho White Round Neck Half Sleeve T-shirt', 3, '2019-03-21', 'Fabric:Polyster | Color:White | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(64, 1, 1, 'Stop thinking start sleeping white round neck half sleeve t-shirt | Zarvish', 'zarvish-old', 99, 1, 799, 309, 'Stop thinking start sleeping white round neck half sleeve t-shirt | Zarvish', 1, '2019-03-21', 'Fabric:Polyster | Color:White | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(65, 1, 1, 'Tera hero idhar hai white round neck half sleeve t-shirt | Zarvish', 'zarvish-old', 99, 2, 799, 309, 'Tera Hero Idhar hai white round neck half sleeve t-shirt | Zarvish', 1, '2019-03-21', 'Fabric:Polyster | Color:White | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(66, 1, 1, 'Tu Tera Dekh white round neck half sleeve t-shirt | zarvish', 'zarvish-old', 99, 3, 799, 309, 'Tu tera dekh white round neck half sleeve t-shirt | Zarvish', 1, '2019-03-21', 'Fabric:Polyster | Color:White | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(67, 1, 1, 'Dragon Navy Blue Half Sleeve T-shirt | Zarvish', 'zarvish-old', 99, 0, 899, 449, 'Dragon Navy Blue Half Sleeve T-shirt | Zarvish', 1, '2019-03-23', 'Fabric:Cotton | Color:Navy Blue | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(68, 1, 1, 'Error 404 GF not found White round neck half sleeve t-shirt | Zarvish', 'zarvish-old', 99, 0, 999, 309, 'Error 404 GF not found White round neck half sleeve t-shirt | Zarvish', 1, '2019-03-23', 'Fabric:Polyster | Color:White | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(70, 1, 1, 'Thumbs up lion black t-shirt | Zarvish', 'zarvish-old', 99, 2, 999, 499, 'Thumbs up lion black t-shirt | Zarvish', 3, '2019-03-23', 'Fabric:Cotton | Color:Black | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(71, 1, 1, 'Yellow Lion Black half sleeve t-shirt | Zarvish', 'zarvish-old', 99, 3, 1099, 549, 'Yellow Lion Black half sleeve t-shirt | Zarvish', 3, '2019-03-23', 'Fabric:Cotton | Color:Black | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(72, 1, 1, 'Me bhi chaukidar Black t-shirt | Zarvish', 'zarvish-old', 99, 4, 699, 549, 'Me bhi chaukidar Black t-shirt | Zarvish', 1, '2019-03-23', 'Fabric:Cotton | Color:Black | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(73, 1, 1, 'Normal is boring Black t-shirt | Zarvish', 'zarvish-old', 99, 2, 759, 449, 'Normal is boring Black t-shirt | Zarvish', 3, '2019-03-23', 'Fabric:Cotton | Color:Black | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(74, 1, 1, 'Sahi Khel gaya Bancho White half sleeve t-shirt | Zarvish', 'zarvish-old', 99, 3, 999, 349, 'Sahi Khel gaya Bancho White half sleeve t-shirt | Zarvish', 3, '2019-03-23', 'Fabric:Cotton | Color:Black | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(75, 1, 1, 'Skull Ghost White half sleeve t-shirt | Zarvish', 'zarvish-old', 99, 2, 899, 349, 'Skull Ghost White half sleeve t-shirt | Zarvish', 1, '2019-03-23', 'Fabric:Sport | Color:white | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(76, 1, 1, 'Skull Ghost Black half sleeve t-shirt | Zarvish', 'zarvish-old', 99, 1, 999, 449, 'Skull Ghost Black t-shirt half sleeve | Zarvish', 3, '2019-03-23', 'Fabric:Cotton | Color:Black | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(77, 1, 1, 'Chup Kar white round neck half t-shirt |  Zarvish', 'zarvish-old', 99, 2, 799, 349, 'Chup Kar white round neck half t-shirt |  Zarvish', 1, '2019-03-26', 'Fabric:Sport | Color:White | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(78, 1, 1, 'Can\'t can black T-shirt | Zarvish', 'zarvish-old', 99, 1, 799, 449, 'Can\'t can black T-shirt | Zarvish', 1, '2019-03-26', 'Fabric:Cotton | Color:black | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(79, 1, 1, 'Positive Attitude Black T-shirt | Zarvish', 'zarvish-old', 99, 1, 699, 459, 'Positive Attitude Black T-shirt | Zarvish', 3, '2019-03-26', 'Fabric:Cotton Color:Black Sleeve:Half Sleeve Neck:Round Neck Brand: Zarvish', 'yes'),
(80, 1, 1, 'Apple Man Maroon T-shirt | Zarvish', 'zarvish-old', 99, 2, 799, 449, 'Apple Man Maroon T-shirt | Zarvish', 1, '2019-03-26', 'Fabric:Cotton Color:Maroon Sleeve:Half Sleeve Neck:Round Neck Brand: Zarvish', 'yes'),
(81, 1, 1, 'Act Now Maroon T-shirt | Zarvish', 'zarvish-old', 99, 2, 999, 449, 'Act Now Maroon T-shirt | Zarvish', 1, '2019-03-26', 'Fabric:Cotton Color:Maroon Sleeve:Half Sleeve Neck:Round Neck Brand: Zarvish', 'yes'),
(82, 1, 1, 'Work sweat repeat white t-shirt | Zarvish', 'zarvish-old', 99, 2, 999, 315, 'Work sweat repeat white t-shirt | Zarvish', 1, '2019-03-28', 'Fabric:Polyster | Color:White | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(84, 1, 1, 'Keep Moving Forward Tshirt | zarvish', 'zarvish-old', 99, 3, 999, 315, 'Keep Moving Forward Tshirt | zarvish', 1, '2019-03-28', 'Fabric:Polyster | Color:White | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(85, 1, 1, 'Brain Idea T-shirt | Zarvish', 'zarvish-old', 99, 2, 999, 315, 'Brain Idea T-shirt | Zarvish', 3, '2019-03-28', 'Fabric:Polyster | Color:White | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(86, 1, 1, 'Flying witch White Half T-shirt | Zarvish', 'zarvish-old', 99, 2, 999, 315, 'Flying witch White Half T-shirt | Zarvish', 3, '2019-03-28', 'Fabric:Polyster | Color:White | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(87, 1, 1, 'captain-america-round-neck-white-half-sleeve-tshirt', 'zarvish-old', 99, 5, 449, 315, 'captain-america-round-neck-white-half-sleeve-tshirt', 1, '2019-03-31', 'Fabric:Polyster | Color:White | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(88, 1, 1, 'bacche-ki-jaan-loge-kya-round-neck-half-sleeve-white-tshirt', 'zarvish-old', 99, 4, 799, 315, 'bacche-ki-jaan-loge-kya-round-neck-half-sleeve-white-tshirt', 1, '2019-03-31', 'Fabric:Polyster | Color:White | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(90, 1, 1, 'chimeric-skeleton-round-neck-half-sleeve-white-tshirt', 'zarvish-old', 99, 5, 799, 313, 'chimeric-skeleton-round-neck-half-sleeve-white-tshirt', 1, '2019-03-31', 'Fabric:Polyster | Color:White | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(94, 1, 1, 'kshatriya-horse-round-neck-half-sleeve-white-tshirt', 'zarvish-old', 99, 5, 999, 309, 'kshatriya-horse-round-neck-half-sleeve-white-tshirt', 1, '2019-03-31', 'Fabric:sport | Color:White | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(105, 1, 1, 'abey-bhabhi-hai-teri-round-neck-half-sleeve-black tshirt', 'zarvish-old', 99, 3, 799, 299, 'abey-bhabhi-hai-teri-round-neck-half-sleeve-black tshirt', 1, '2019-04-04', 'Fabric:Cotton | Color:Black | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(106, 1, 1, 'chal-rasta-naap-round-neck-half-sleeve-white-tshirt', 'zarvish-old', 99, 5, 999, 309, 'chal-rasta-naap-round-neck-half-sleeve-white-tshirt', 1, '2019-04-04', 'Fabric:Polyster | Color:White | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(107, 1, 1, 'desi-moochha-round-neck-half-sleeve-black-tshirt', 'zarvish-old', 99, 1, 799, 299, 'desi-moochha-round-neck-half-sleeve-black-tshirt', 1, '2019-04-04', 'Fabric:Cotton | Color:Black | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(108, 1, 1, 'gym-kare-hai-round-neck-half-sleeve-white-tshirt', 'zarvish-old', 99, 5, 999, 309, 'gym-kare-hai-round-neck-half-sleeve-white-tshirt', 1, '2019-04-04', 'Fabric:sport  | Color:White | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(109, 1, 1, 'gym-lover-round-neck-half-sleeve-white-tshirt', 'zarvish-old', 99, 5, 999, 309, 'gym-lover-round-neck-half-sleeve-white-tshirt', 1, '2019-04-04', 'Fabric:sport | Color:white | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(110, 1, 1, 'kaat-dalunga-bsdk-round-neck-half-sleeve-black-tshirt', 'zarvish-old', 99, 1, 799, 299, 'kaat-dalunga-bsdk-round-neck-half-sleeve-black-tshirt', 1, '2019-04-04', 'Fabric:Cotton | Color:Black | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(111, 1, 1, 'king-round-neck-half-sleeve-black-tshirt', 'zarvish-old', 99, 3, 799, 299, 'king-round-neck-half-sleeve-black-tshirt', 1, '2019-04-04', 'Fabric:Cotton | Color:Black | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(112, 1, 1, 'tera-bhai-hai-na-round-neck-half-sleeve-white-tshirt', 'zarvish-old', 99, 4, 999, 309, 'tera-bhai-hai-na-round-neck-half-sleeve-white-tshirt', 1, '2019-04-04', 'Fabric:polyster | Color:white | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(113, 1, 1, 'skull-vector-round-neck-half-sleeve-white-tshirt', 'zarvish-old', 99, 5, 999, 309, 'skull-vector-round-neck-half-sleeve-white-tshirt', 1, '2019-04-04', 'Fabric:sport | Color:white | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(115, 1, 1, 'superman-round-neck-half-sleeve-white-tshirt', 'zarvish-old', 99, 5, 999, 309, 'superman-round-neck-half-sleeve-white-tshirt', 1, '2019-04-04', 'Fabric:sport | Color:white | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(116, 1, 1, 'superman-gold-round-neck-white-hlaf-sleeve', 'zarvish-old', 99, 3, 999, 309, 'superman-gold-round-neck-white-hlaf-sleeve', 1, '2019-04-04', 'Fabric:sport | Color:white | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(117, 1, 1, 'akela-white-round-neck-half-sleeve-tshirt-front', 'zarvish-old', 99, 5, 999, 309, 'akela-white-round-neck-half-sleeve-tshirt-front', 1, '2019-04-05', 'Fabric:Sport | Color:White | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(118, 1, 1, 'attitude-black-half-sleeve-tshirt--modal', 'zarvish-old', 99, 2, 799, 299, 'attitude-black-half-sleeve-tshirt--modal', 1, '2019-04-05', 'Fabric:Cotton | Color:Black | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(119, 1, 1, 'bhand-in-black-round-neck-half-sleeve-tshirt-frontside', 'zarvish-old', 99, 3, 799, 299, 'bhand-in-black-round-neck-half-sleeve-tshirt-frontside', 1, '2019-04-05', 'Fabric:Cotton | Color:Black | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(120, 1, 1, 'chal-pubg-khelte-hai-black-round-neck-half-sleeve-tshirt', 'zarvish-old', 99, 3, 799, 299, 'chal-pubg-khelte-hai-black-round-neck-half-sleeve-tshirt', 1, '2019-04-05', 'Fabric:Cotton | Color:Black | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(121, 1, 1, 'chant-launda-white-round-neck-half-sleeve-tshirt-frontside', 'zarvish-old', 99, 4, 449, 259, 'chant-launda-white-round-neck-half-sleeve-tshirt-frontside', 1, '2019-04-05', 'Fabric:Sport | Color:White | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(122, 1, 1, 'dont-look-me-half-sleeve-round-neck-white-tshirt', 'zarvish-old', 99, 5, 599, 229, 'dont-look-me-half-sleeve-round-neck-white-tshirt', 1, '2019-04-05', 'Fabric:Sport | Color:White | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(123, 1, 1, 'fearless-black-round-neck-half-sleeve-tshirt', 'zarvish-old', 99, 3, 799, 299, 'fearless-black-round-neck-half-sleeve-tshirt', 1, '2019-04-05', 'Fabric:Cotton | Color:Black | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(124, 1, 1, 'filmy-black-round-neck-half-sleeve-tshirt', 'zarvish-old', 99, 2, 799, 299, 'filmy-black-round-neck-half-sleeve-tshirt', 1, '2019-04-05', 'Fabric:Cotton | Color:Black | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(125, 1, 1, 'ghost-in-black-round-neck-half-sleeve-tshirt', 'zarvish-old', 99, 3, 799, 499, 'ghost-in-black-round-neck-half-sleeve-tshirt', 1, '2019-04-05', 'Fabric:Cotton | Color:Black | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(126, 1, 1, 'gunday-black-round-eck-half-sleeve-tshirt', 'zarvish-old', 99, 3, 799, 299, 'gunday-black-round-eck-half-sleeve-tshirt', 1, '2019-04-05', 'Fabric:Cotton | Color:Black | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(127, 1, 1, 'black-golden-ham-nahi-sudhrege-black-tshirt', 'zarvish-old', 99, 2, 799, 299, 'black-golden-ham-nahi-sudhrege-black-tshirt', 1, '2019-04-05', 'Fabric:Cotton | Color:Black | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(128, 1, 1, 'king-black-round-neck-half-sleeve-tshirt', 'zarvish-old', 99, 3, 799, 299, 'king-black-round-neck-half-sleeve-tshirt', 1, '2019-04-05', 'Fabric:Cotton | Color:Black | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(129, 1, 1, 'mili-toh-best-nahi-toh-next-white-round-neck-half-sleeve-tshirt', 'zarvish-old', 99, 4, 659, 309, 'mili-toh-best-nahi-toh-next-white-round-neck-half-sleeve-tshirt-', 1, '2019-04-05', 'Fabric:sport | Color:white | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(130, 1, 1, 'tumhare-paas-kya-hai-white-half-sleeve-round-neck-tshirt', 'zarvish-old', 99, 5, 449, 309, 'tumhare-paas-kya-hai-white-half-sleeve-round-neck-tshirt-frontside', 1, '2019-04-05', 'Fabric:sport | Color:white | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(131, 1, 1, 'zindagi-jhand-fir-bhi-ghamand-white-half-sleeve-round-neck-t-shirt.jpg-1', 'zarvish-old', 99, 5, 749, 309, 'zindagi-jhand-fir-bhi-ghamand-white-half-sleeve-round-neck-t-shirt.jpg-1', 1, '2019-04-05', 'Fabric:polyster | Color:white | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(132, 1, 1, 'humko-nahi-pahchana-round-neck-half-sleeve-dark-blue-tshirt', 'zarvish-old', 99, 3, 799, 299, 'humko-nahi-pahchana-round-neck-half-sleeve-dark-blue-tshirt', 1, '2019-04-06', 'Fabric:Cotton | Color:Dark blue | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(133, 1, 1, 'maharaja-round-neck-half-sleeve-black-tshirt', 'zarvish-old', 99, 2, 899, 399, 'maharaja-round-neck-half-sleeve-black-tshirt', 1, '2019-04-06', 'Fabric:Cotton | Color:Black | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(134, 1, 1, 'singh-is-king-round-neck-half-sleeve-black-tshirt', 'zarvish-old', 99, 3, 899, 449, 'singh-is-king-round-neck-half-sleeve-black-tshirt', 1, '2019-04-06', 'Fabric:Cotton | Color:Black | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(135, 1, 1, 'splatter-face-round-neck-half-sleeve-white-tshirt', 'zarvish-old', 99, 7, 449, 309, 'splatter-face-round-neck-half-sleeve-white-tshirt', 1, '2019-04-06', 'Fabric:polyster | Color:White | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(136, 1, 1, 'You only live once white half sleeve tshirt | Zarvish', 'zarvish-old', 99, 1, 499, 309, 'You only live once white half sleeve tshirt | Zarvish', 1, '2019-04-08', 'Fabric:Polyster | Color:White | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(137, 1, 1, 'Later means Never black half sleeve tshirt | Zarvish', 'zarvish-old', 99, 2, 799, 449, 'Later means Never black half sleeve tshirt | Zarvish', 3, '2019-04-08', 'Fabric:cotton | Color:Black | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(138, 1, 1, 'Follow Your Dreams Not Orders Black tshirt | Zarvish', 'zarvish-old', 99, 2, 899, 329, 'Follow Your Dreams Not Orders Black tshirt | Zarvish', 1, '2019-04-08', 'Fabric:cotton | Color:Black | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(139, 1, 1, 'Do your best Black half sleeve tshirt | Zarvish', 'zarvish-old', 99, 2, 999, 349, 'Do your best Black tshirt | Zarvish', 3, '2019-04-08', 'Fabric:Cotton | Color:Black | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(140, 1, 1, 'Be fast or be last black t-shirt | Zarvish', 'zarvish-old', 99, 2, 799, 329, 'Be fast or be last black t-shirt | Zarvish', 1, '2019-04-08', 'Fabric:Cotton | Color:Black | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(141, 1, 1, 'Always online black half sleeve t-shirt | Zarvish', 'zarvish-old', 99, 2, 899, 329, 'Always online black half sleeve t-shirt | Zarvish', 1, '2019-04-08', 'Fabric:Cotton | Color:Black | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(142, 1, 1, 'Awara hoon men round neck half sleeve black cotton tshirt |Zarvish', 'zarvish-old', 99, 3, 799, 349, 'Awara hoon men round neck half sleeve black cotton tshirt |Zarvish', 1, '2019-04-16', 'Fabric:Cotton | Color:Black | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(143, 1, 1, 'Bhai hai tu mera men  round neck half sleeve cotton black tshirt |Zarvish', 'zarvish-old', 99, 8, 799, 359, 'Bhai hai tu mera men  round neck half sleeve cotton black tshirt |Zarvish', 1, '2019-04-16', 'Fabric:Cotton | Color:Black | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(144, 1, 1, 'Chal ho jaye 9 2 11 men round neck half sleeve cotton black tshirt |Zarvish', 'zarvish-old', 99, 8, 799, 349, 'Chal ho jaye 9 2 11 men round neck half sleeve cotton black tshirt |Zarvish', 1, '2019-04-16', 'Fabric:Cotton | Color:Black | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(145, 1, 1, '1st life men round neck half sleeve black cotton tshirt |Zarvish', 'zarvish-old', 99, 8, 799, 299, '1st life men round neck half sleeve black cotton tshirt |Zarvish', 1, '2019-04-16', 'Fabric:Cotton | Color:Black | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(146, 1, 1, 'Hara me men round neck half sleeve nevy blue cotton tshirt |Zarvish', 'zarvish-old', 99, 8, 799, 349, 'Hara me men round neck half sleeve nevy blue cotton tshirt |Zarvish', 1, '2019-04-16', 'Fabric:Cotton | Color:Nevy blue | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(148, 1, 1, 'Bro black half sleeve t-shirt | Zarvish', 'zarvish-old', 99, 0, 499, 299, 'Bro black half sleeve t-shirt | Zarvish', 1, '2019-04-17', 'Fabric:Cotton | Color:Black | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(151, 1, 1, 'Six Pack Coming Soon Black Cotton Tshirt | Zarvish', 'zarvish-old', 99, 1, 499, 299, 'Six Pack Coming Soon Black Cotton Tshirt | Zarvish', 3, '2019-04-17', 'Fabric:Cotton| Color:Black | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(152, 1, 1, 'Bhai Ki Ijjat Bada Di Bancho Navy Blue t-shirt | Cotton | Zarvish', 'zarvish-old', 99, 0, 499, 299, 'Bhai Ki Ijjat Bada Di Bancho Navy Blue t-shirt | Cotton | Zarvish', 3, '2019-04-17', 'Fabric:Cotton | Color:Black | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(153, 1, 1, 'Mere bare mai itna mat socho men round neck half sleeve nevy blue cotton tshirt |Zarvish', 'zarvish-old', 99, 8, 799, 329, 'Mere bare mai itna mat socho men round neck half sleeve nevy blue cotton tshirt |Zarvish', 1, '2019-04-17', 'Fabric:Cotton | Color:Nevy blue | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(155, 1, 1, 'Avenger White Half Sleeve Matty T-shirt | Zarvish', 'zarvish-old', 99, 1, 999, 299, 'Avenger White Half Sleeve Matty T-shirt | Zarvish', 3, '2019-04-17', 'Fabric:Matty | Color:White | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(156, 1, 1, 'Avenger Logo Black Cotton Half Sleeve T-shirt | Zarvish', 'zarvish-old', 99, 2, 499, 299, 'Avenger Logo Black Cotton Half Sleeve T-shirt | Zarvish', 3, '2019-04-17', 'Fabric:Cotton | Color:Black | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(159, 1, 1, 'Graphic Printed T-Shirt for Men | Marshmello T-Shirt | Half Sleeve T-Shirt | Round Neck T Shirt | 100% Cotton T-Shirt | Short Sleeve T Shirt', 'zarvish-old', 99, 2, 499, 299, 'Graphic Printed T-Shirt for Men | Marshmello T-Shirt | Half Sleeve T-Shirt | Round Neck T Shirt | 100% Cotton T-Shirt | Short Sleeve T Shirt', 3, '2019-04-17', 'Fabric:Cotton | Color:Black | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(160, 1, 1, 'Graphic Printed T-Shirt for Men | Hindi Funny Quote T-Shirt | Half Sleeve T-Shirt | Round Neck T Shirt | 100% Cotton T-Shirt | Short Sleeve T Shirt | Zarvish', 'zarvish-old', 99, 3, 499, 299, 'Graphic Printed T-Shirt for Men | Hindi Funny Quote T-Shirt | Half Sleeve T-Shirt | Round Neck T Shirt | 100% Cotton T-Shirt | Short Sleeve T Shirt | Zarvish', 3, '2019-04-17', 'Fabric:Cotton | Color:Black | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(161, 1, 1, 'Zarvish | Nothing is impossible Graphic t-shirt for Men | 100% Cotton T-shirt | Half Sleeve T-shirt', 'zarvish-old', 99, 2, 599, 299, 'Zarvish | Nothing is impossible Graphic t-shirt for Men | 100% Cotton T-shirt | Half Sleeve T-shirt', 3, '2019-04-17', 'Fabric : Cotton\r\nColor : Black\r\nBrand : Zarvish\r\nSleeve : Half Sleeve', 'yes'),
(162, 1, 1, 'Whatever it takes | Graphic Printed T-Shirt for Men | Marshmello T-Shirt | Half Sleeve T-Shirt | Round Neck T Shirt | 100% Cotton T-Shirt | Short Sleeve T Shirt', 'zarvish-old', 99, 0, 599, 299, 'Whatever it takes | Graphic Printed T-Shirt for Men | Marshmello T-Shirt | Half Sleeve T-Shirt | Round Neck T Shirt | 100% Cotton T-Shirt | Short Sleeve T Shirt', 3, '2019-04-17', 'Fabric:Cotton | Color:Black | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(163, 1, 1, 'Dragon | Fabric:Cotton | Color:Black | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'zarvish-old', 99, 2, 499, 339, 'Dragon | Fabric:Cotton | Color:Black | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 3, '2019-04-17', 'Fabric:Cotton | Color:Black | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(164, 1, 1, 'harry Potter Tshirt | Graphic Printed T-Shirt for Men | Marshmello T-Shirt | Half Sleeve T-Shirt | Round Neck T Shirt | 100% Cotton T-Shirt | Short Sleeve T Shirt', 'zarvish-old', 99, 3, 499, 299, 'harry Potter Tshirt | Graphic Printed T-Shirt for Men | Marshmello T-Shirt | Half Sleeve T-Shirt | Round Neck T Shirt | 100% Cotton T-Shirt | Short Sleeve T Shirt', 3, '2019-04-17', 'Fabric:Cotton | Color:Black | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(165, 1, 1, 'Ohm Namah Shivay | 100 % Cotton Black | Half Sleeve t-shirt | Zarvish', 'zarvish-old', 99, 1, 499, 339, 'Ohm Namah Shivay | 100 % Cotton Black | Half Sleeve t-shirt | Zarvish', 3, '2019-04-17', 'Fabric:Cotton | Color:Black | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(166, 1, 1, 'Hum Nahi Bigdenge | Cotton Round Neck Half Sleeve T-shirt | Zarvish', 'zarvish-old', 99, 2, 799, 339, 'Hum Nahi Bigdenge | Cotton Round Neck Half Sleeve T-shirt | Zarvish', 1, '2019-04-18', 'Fabric:Cotton | Color:Black | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(167, 1, 1, 'Winner Winner chicken dinner Black Half Sleeve 100% Cotton T-shirt | Zarvish', 'zarvish-old', 99, 1, 899, 299, 'Winner Winner chicken dinner Black Half Sleeve 100% Cotton T-shirt | Zarvish', 1, '2019-04-18', 'Fabric : Cotton | Color : Black | Brand : Zarvish | Sleeve : Half Sleeve', 'yes'),
(169, 1, 1, 'CHRYSOLITE Iron Man Arc Reactor Superhero Black 100 % Cotton T-shirt', 'zarvish-old', 99, 2, 899, 299, 'CHRYSOLITE Iron Man Arc Reactor Superhero Black 100 % Cotton T-shirt', 3, '2019-04-18', 'Fabric : Cotton | Color : Black | Neck : Round Neck | Sleeve : Half Sleeve | Brand : Zarvish', 'yes'),
(170, 1, 1, 'RadioActive Arc reactor Black Half Sleeve Round Neck T-shirt | Zarvish', 'zarvish-old', 99, 2, 899, 299, 'RadioActive Arc reactor Black Half Sleeve Round Neck T-shirt | Zarvish', 3, '2019-04-18', 'Fabric : Cotton | Color : Black | Neck : Round Neck | Sleeve : Half Sleeve | Brand : Zarvish', 'yes'),
(171, 1, 1, 'kya karoge jankar round neck half sleeve cotton black t-shirt | Zarvish', 'zarvish-old', 99, 8, 799, 299, 'kya karoge jankar round neck half sleeve cotton black t-shirt', 1, '2019-04-23', 'Fabric : Cotton | Color : Black | Neck : Round Neck | Sleeve : Half Sleeve | Brand : Zarvish', 'yes'),
(187, 1, 1, 'zarvish men\'s gym lover round neck half sleeve cotton black t-shirt', 'zarvish-old', 99, 20, 899, 399, 'zarvish men\'s gym lover round neck half sleeve cotton black t-shirt', 1, '2019-05-26', 'Fabric : Cotton | Color : black| Neck : Round Neck | Sleeve : Half Sleeve | Brand : Zarvish', 'yes'),
(188, 1, 1, 'zarvish men\'s tiger foot round neck half sleeve polyester white t-shirt', 'zarvish-old', 99, 20, 899, 309, 'zarvish men\'s tiger foot round neck half sleeve polyester white t-shirt', 1, '2019-05-26', 'Fabric:Polyster | Color:White | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(189, 1, 1, 'zarvish tit for tat round neck half sleeve cotton black t-shirt', 'zarvish-old', 99, 20, 899, 349, 'zarvish tit for tat round neck half sleeve cotton black t-shirt', 1, '2019-05-26', 'Fabric : Cotton | Color : black| Neck : Round Neck | Sleeve : Half Sleeve | Brand : Zarvish', 'yes'),
(190, 1, 1, 'zarvish tit for tat round neck half sleeve cotton nevy blue t-shirt', 'zarvish-old', 99, 20, 899, 349, 'zarvish tit for tat round neck half sleeve cotton nevy blue t-shirt', 1, '2019-05-26', 'Fabric : Cotton | Color : nevy blue | Neck : Round Neck | Sleeve : Half Sleeve | Brand : Zarvish', 'yes'),
(191, 1, 1, 'zarvish gym lover round neck half sleeve cotton maroon t-shirt', 'zarvish-old', 99, 19, 899, 349, 'zarvish gym lover round neck half sleeve cotton maroon t-shirt', 1, '2019-05-26', 'Fabric : Cotton | Color : maroon | Neck : Round Neck | Sleeve : Half Sleeve | Brand : Zarvish', 'yes'),
(192, 1, 1, 'zarvish fadu banda round neck half sleeve cotton white t-shirt', 'zarvish-old', 99, 19, 899, 349, 'zarvish fadu banda round neck half sleeve cotton white t-shirt', 1, '2019-05-27', 'Fabric : Cotton | Color : white | Neck : Round Neck | Sleeve : Half Sleeve | Brand : Zarvish', 'yes'),
(193, 1, 1, 'Zarvish No Pain No Gain T-shirt', 'zarvish-28m-1', 11, 0, 999, 299, 'Zarvish No Pain No Gain Half Sleeve T-shirt', 1, '2019-05-28', 'Fabric:Cotton | Color:Maroon | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(194, 1, 1, 'Zarvish No Pain No Gain Half Sleeve t-shirt', 'zarvish-28m-1', 1, 2, 999, 299, 'Zarvish No Pain No Gain Half Sleeve T-shirt', 1, '2019-05-28', 'Fabric:Cotton | Color:Black | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'no'),
(195, 1, 1, 'Zarvish No Pain No Gain White Half Sleeve T-shirt', 'zarvish-28m-1', 2, 2, 999, 299, 'Zarvish No Pain No Gain White Half Sleeve T-shirt', 1, '2019-05-28', 'Fabric:Cotton | Color:White | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'no'),
(197, 1, 1, 'Zarvish No Pain No Gain Navy Blue Cotton T-shirt', 'zarvish-28m-1', 9, 1, 999, 299, 'Zarvish Navy Blue Cotton T-shirt', 1, '2019-05-28', 'Fabric:Cotton | Color:Navy Blue | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'no'),
(198, 1, 1, 'Zarvish Men\'s Cotton Black Checked Full Sleeve T-shirt', 'zarvish-31m-1', 1, 2, 999, 349, 'Zarvish Men\'s Cotton Black Checked Full Sleeve T-shirt', 1, '2019-05-31', 'Fabric:cotton | Type:stitched | Work : Printed | Sleeve : Full Sleeves', 'yes'),
(199, 1, 1, 'Zarvish Stylish Men\'s Cotton Half Sleeve T-shirt', 'zarvish-31m-2', 1, 1, 999, 329, 'Zarvish Stylish Men\'s Cotton Half Sleeve T-shirt', 1, '2019-05-31', 'Fabric:cotton | Type:stitched | Work : Printed | Sleeve : Half Sleeves', 'yes'),
(200, 1, 1, 'Zarvish Yellow color Stylish Round Neck Half Sleeve T-shirt', 'zarvish-31m-2', 4, 2, 999, 329, 'Zarvish Yellow color Stylish Round Neck Half Sleeve T-shirt', 1, '2019-05-31', 'Fabric:cotton | Type:stitched | Work : Printed | Sleeve : Half Sleeves', 'no'),
(201, 1, 1, 'Zarvish Fashionable Men Round Neck t-shirt', 'zarvish-31m-3', 12, 2, 999, 329, 'Zarvish Fashionable Men Round Neck t-shirt', 1, '2019-05-31', 'Fabric:cotton | Type:stitched | Work : Printed | Sleeve : Half Sleeves', 'yes'),
(207, 1, 1, 'Stylish round neck full sleeve cotton t-shirt | zarvish', 'zarvish-2j-A', 1, 10, 1199, 399, 'Stylish round neck full sleeve cotton t-shirt | zarvish', 1, '2019-06-01', 'Fabric:cotton | Type:stitched | Work : stylish| Sleeve : Full Sleeves', 'yes'),
(208, 1, 1, 'Stylish round neck full sleeve cotton t-shirt | zarvish', 'zarvish-2j-A', 2, 10, 1199, 399, 'Stylish round neck full sleeve cotton t-shirt | zarvish', 1, '2019-06-01', 'Fabric:cotton | Type:stitched | Work : stylish| Sleeve : Full Sleeves', 'no'),
(209, 1, 1, 'Stylish round neck full sleeve cotton t-shirt | zarvish', 'zarvish-2j-A', 4, 10, 1199, 399, 'Stylish round neck full sleeve cotton t-shirt | zarvish', 1, '2019-06-01', 'Fabric:cotton | Type:stitched | Work : stylish| Sleeve : Full Sleeves', 'no'),
(210, 1, 1, 'Stylish round neck full sleeve cotton t-shirt | zarvish', 'zarvish-2j-A', 7, 10, 1199, 399, 'Stylish round neck full sleeve cotton t-shirt | zarvish', 1, '2019-06-01', 'Fabric:cotton | Type:stitched | Work : stylish| Sleeve : Full Sleeves', 'no'),
(211, 1, 1, 'Superman men\'s half sleeve cotton t-shirt | zarvish', 'zarvish-2j-B', 1, 10, 999, 349, 'Superman men\'s half sleeve cotton t-shirt | zarvish', 1, '2019-06-01', 'Fabric:Cotton | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(212, 1, 1, 'Superman men\'s half sleeve cotton t-shirt | zarvish', 'zarvish-2j-B', 7, 10, 999, 349, 'Superman men\'s half sleeve cotton t-shirt | zarvish', 1, '2019-06-01', 'Fabric:Cotton | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'no'),
(213, 1, 1, 'captain america round neck half sleeve cotton t-shirt | zarvish', 'zarvish-2j-C', 1, 10, 999, 349, 'captain america round neck half sleeve cotton t-shirt | zarvish', 1, '2019-06-01', 'Fabric:Cotton | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(214, 1, 1, 'captain america round neck half sleeve cotton t-shirt | zarvish', 'zarvish-2j-c', 7, 10, 999, 349, 'captain america round neck half sleeve cotton t-shirt | zarvish', 1, '2019-06-01', 'Fabric:Cotton | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'no'),
(216, 1, 1, 'Avenger round neck full sleeve cotton t-shirt | zarvish', 'zarvish-2j-D', 9, 40, 999, 349, 'Avenger round neck full sleeve cotton t-shirt | zarvish', 1, '2019-06-02', 'Fabric:Cotton | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(217, 1, 1, 'Avenger round neck half sleeve cotton t-shirt | zarvish', 'zarvish-2j-D', 7, 40, 999, 349, 'Avenger round neck full sleeve cotton t-shirt | zarvish', 1, '2019-06-02', 'Fabric:Cotton | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'no'),
(218, 1, 1, 'Now or never round neck half sleeve cotton t-shirt | zarvish', 'zarvish-2j-E', 9, 38, 999, 349, 'Now or never round neck half sleeve cotton t-shirt | zarvish', 1, '2019-06-02', 'Fabric:Cotton | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(219, 1, 1, 'Hope round neck half sleeve cotton t-shirt | zarvish', 'zarvish-2j-F', 3, 40, 999, 349, 'Hope round neck half sleeve cotton t-shirt | zarvish', 1, '2019-06-02', 'Fabric:Cotton | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(220, 1, 1, 'stylish men\'s half sleeve cotton t-shirt | zarvish', 'zarvish-3j-A', 1, 40, 999, 399, 'stylish men\'s half sleeve cotton t-shirt | zarvish', 1, '2019-06-02', 'Fabric:Cotton | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(221, 1, 1, 'stylish men\'s half sleeve cotton t-shirt | zarvish', 'zarvish-3j-A', 2, 40, 999, 399, 'stylish men\'s half sleeve cotton t-shirt | zarvish', 1, '2019-06-02', 'Fabric:Cotton | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'no'),
(222, 1, 1, 'stylish men\'s half sleeve cotton t-shirt | zarvish', 'zarvish-3j-A', 4, 40, 999, 399, 'stylish men\'s half sleeve cotton t-shirt | zarvish', 1, '2019-06-02', 'Fabric:Cotton | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'no'),
(223, 1, 1, 'stylish men\'s half sleeve cotton t-shirt | zarvish', 'zarvish-3j-A', 3, 40, 999, 399, 'stylish men\'s half sleeve cotton t-shirt | zarvish', 1, '2019-06-02', 'Fabric:Cotton | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'no'),
(224, 1, 1, 'stylish men\'s half sleeve cotton t-shirt | zarvish', 'zarvish-3j-A', 7, 40, 999, 399, 'stylish men\'s half sleeve cotton t-shirt | zarvish', 1, '2019-06-02', 'Fabric:Cotton | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'no'),
(226, 1, 1, 'solid men\'s half sleeve cotton t-shirt | zarvish', 'zarvish-3j-B', 7, 40, 999, 349, 'solomen\'s half sleeve cotton t-shirt | zarvish', 1, '2019-06-02', 'Fabric:Cotton | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(227, 1, 1, 'solid men\'s half sleeve cotton t-shirt | zarvish', 'zarvish-3j-C', 3, 40, 999, 349, 'stylish men\'s half sleeve cotton t-shirt | zarvish', 1, '2019-06-03', 'Fabric:Cotton | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(228, 1, 1, 'solid men\'s half sleeve cotton t-shirt | zarvish', 'zarvish-3j-C', 4, 40, 999, 349, 'Fabric:Cotton | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 1, '2019-06-03', 'Fabric:Cotton | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'no'),
(229, 1, 1, 'Stylish print round neck full sleeve cotton t-shirt | zarvish', 'zarvish-3j-D', 3, 40, 1299, 399, 'Stylish print round neck full sleeve cotton t-shirt | zarvish', 1, '2019-06-03', 'Fabric:Cotton | Sleeve:Full Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(231, 1, 1, 'Stylish print round neck full sleeve cotton t-shirt | zarvish', 'zarvish-3j-D', 1, 30, 1399, 399, 'Stylish print round neck full sleeve cotton t-shirt | zarvish', 1, '2019-06-03', 'Fabric:Cotton | Sleeve:Full Sleeve | Neck:Round Neck | Brand: Zarvish', 'no'),
(232, 1, 1, 'Stylish print round neck full sleeve cotton t-shirt | zarvish', 'zarvish-3j-D', 2, 30, 1399, 399, 'Stylish print round neck full sleeve cotton t-shirt | zarvish', 1, '2019-06-03', 'Fabric:Cotton | Sleeve:Full Sleeve | Neck:Round Neck | Brand: Zarvish', 'no'),
(233, 1, 1, 'Stylish print round neck full sleeve cotton t-shirt | zarvish', 'zarvish-3j-E', 2, 30, 1399, 399, 'Stylish print round neck full sleeve cotton t-shirt | zarvish', 1, '2019-06-03', 'Fabric:Cotton | Sleeve:Full Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(234, 1, 1, 'Stylish print round neck full sleeve cotton t-shirt | zarvish', 'zarvish-3j-E', 1, 30, 1399, 399, 'Stylish print round neck full sleeve cotton t-shirt | zarvish', 1, '2019-06-03', 'Fabric:Cotton | Sleeve:Full Sleeve | Neck:Round Neck | Brand: Zarvish', 'no'),
(235, 1, 1, 'Stylish print round neck full sleeve cotton t-shirt | zarvish', 'zarvish-3j-E', 3, 30, 1399, 399, 'Stylish print round neck full sleeve cotton t-shirt | zarvish', 1, '2019-06-03', 'Fabric:Cotton | Sleeve:Full Sleeve | Neck:Round Neck | Brand: Zarvish', 'no'),
(236, 1, 1, 'Stylish print round neck full sleeve cotton t-shirt | zarvish', 'zarvish-3j-F', 1, 30, 1399, 399, 'Stylish print round neck full sleeve cotton t-shirt | zarvish', 1, '2019-06-03', 'Fabric:Cotton | Sleeve:Full Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(237, 1, 1, 'Stylish print round neck full sleeve cotton t-shirt | zarvish', 'zarvish-3j-F', 2, 30, 1399, 399, 'Stylish print round neck full sleeve cotton t-shirt | zarvish', 1, '2019-06-03', 'Fabric:Cotton | Sleeve:Full Sleeve | Neck:Round Neck | Brand: Zarvish', 'no'),
(238, 1, 1, 'CR7 men\'s half sleeve cotton t-shirt | zarvish', 'zarvish-3j-G', 2, 40, 999, 349, 'CR7 men\'s half sleeve cotton t-shirt | zarvish', 1, '2019-06-03', 'Fabric:Cotton | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(239, 1, 1, 'CR7 men\'s half sleeve cotton t-shirt | zarvish', 'zarvish-3j-G', 1, 40, 999, 349, 'CR7 men\'s half sleeve cotton t-shirt | zarvish', 1, '2019-06-03', 'Fabric:Cotton | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'no'),
(240, 1, 1, 'CR7 men\'s half sleeve cotton t-shirt | zarvish', 'zarvish-3j-G', 4, 40, 999, 349, 'CR7 men\'s half sleeve cotton t-shirt | zarvish', 1, '2019-06-03', 'Fabric:Cotton | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'no'),
(241, 1, 1, 'CR7 men\'s half sleeve cotton t-shirt | zarvish', 'zarvish-3j-G', 10, 40, 999, 349, 'CR7 men\'s half sleeve cotton t-shirt | zarvish', 1, '2019-06-03', 'Fabric:Cotton | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'no'),
(242, 1, 1, 'CR7 men\'s half sleeve cotton t-shirt | zarvish', 'zarvish-3j-G', 9, 40, 999, 349, 'CR7 men\'s half sleeve cotton t-shirt | zarvish', 1, '2019-06-03', 'Fabric:Cotton | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'no'),
(243, 1, 1, 'CR7 men\'s half sleeve cotton t-shirt | zarvish', 'zarvish-3j-H', 1, 40, 1199, 399, 'CR7 men\'s half sleeve cotton t-shirt | zarvish', 1, '2019-06-03', 'Fabric:Cotton | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(244, 1, 1, 'CR7 men\'s half sleeve cotton t-shirt | zarvish', 'zarvish-3j-H', 4, 40, 1199, 399, 'CR7 men\'s half sleeve cotton t-shirt | zarvish', 1, '2019-06-03', 'Fabric:Cotton | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'no'),
(245, 1, 1, 'CR7 men\'s half sleeve cotton t-shirt | zarvish', 'zarvish-3j-H', 2, 40, 1199, 399, 'CR7 men\'s half sleeve cotton t-shirt | zarvish', 1, '2019-06-03', 'Fabric:Cotton | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'no'),
(246, 1, 1, 'CR7 men\'s half sleeve cotton t-shirt | zarvish', 'zarvish-3j-H', 10, 40, 1199, 399, 'CR7 men\'s half sleeve cotton t-shirt | zarvish', 1, '2019-06-03', 'Fabric:Cotton | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'no'),
(247, 1, 1, 'CR7 men\'s half sleeve cotton t-shirt | zarvish', 'zarvish-3j-H', 9, 40, 1199, 399, 'CR7 men\'s half sleeve cotton t-shirt | zarvish', 1, '2019-06-03', 'Fabric:Cotton | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'no'),
(248, 1, 1, 'Chek print Stylish round neck full sleeve cotton t-shirt | zarvish', 'zarvish-3j-I', 2, 40, 1199, 399, 'Chek print Stylish round neck full sleeve cotton t-shirt | zarvish', 1, '2019-06-03', 'Fabric:Cotton | Sleeve:Full Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(249, 1, 1, 'Chek print Stylish round neck full sleeve cotton t-shirt | zarvish', 'zarvish-3j-I', 10, 40, 1199, 399, 'Chek print Stylish round neck full sleeve cotton t-shirt | zarvish', 1, '2019-06-03', 'Fabric:Cotton | Sleeve:Full Sleeve | Neck:Round Neck | Brand: Zarvish', 'no'),
(250, 1, 1, 'chest print stylish round neck full sleeve cotton t-shirt | zarvish', 'zarvish-3j-J', 4, 40, 1199, 399, 'Stylish round neck full sleeve cotton t-shirt | zarvish', 1, '2019-06-03', 'Fabric:Cotton | Sleeve:Full Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(251, 1, 1, 'chest print stylish round neck full sleeve cotton t-shirt | zarvish', 'zarvish-3j-J', 1, 40, 1199, 399, 'chest print stylish round neck full sleeve cotton t-shirt | zarvish', 1, '2019-06-03', 'Fabric:Cotton | Sleeve:Full Sleeve | Neck:Round Neck | Brand: Zarvish', 'no'),
(252, 1, 1, 'chest print stylish round neck full sleeve cotton t-shirt | zarvish', 'zarvish-3j-J', 10, 40, 1199, 399, 'chest print stylish round neck full sleeve cotton t-shirt | zarvish', 1, '2019-06-03', 'Fabric:Cotton | Sleeve:Full Sleeve | Neck:Round Neck | Brand: Zarvish', 'no'),
(253, 1, 1, 'guitar men\'s half sleeve cotton t-shirt | zarvish', 'zarvish-5j-A', 2, 40, 999, 349, 'guitar men\'s half sleeve cotton t-shirt | zarvish', 1, '2019-06-05', 'Fabric:Cotton | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(254, 1, 1, 'Guitar men\'s half sleeve cotton t-shirt | zarvish', 'zarvish-5j-A', 10, 40, 999, 349, 'Guitar men\'s half sleeve cotton t-shirt | zarvish', 1, '2019-06-05', 'Fabric:Cotton | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'no'),
(255, 1, 1, 'Water forest men\'s half sleeve cotton t-shirt | zarvish', 'zarvish-5j-B', 10, 40, 999, 349, 'Water forest men\'s half sleeve cotton t-shirt | zarvish', 1, '2019-06-05', 'Fabric:Cotton | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(256, 1, 1, 'Water forest men\'s half sleeve cotton t-shirt | zarvish', 'zarvish-5j-B', 2, 30, 999, 349, 'Water forest men\'s half sleeve cotton t-shirt | zarvish', 1, '2019-06-05', 'Fabric:Cotton | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'no'),
(257, 1, 1, 'messi men\'s half sleeve cotton t-shirt | zarvish', 'zarvish-5j-C', 7, 30, 999, 349, 'messi men\'s half sleeve cotton t-shirt | zarvish', 1, '2019-06-05', 'Fabric:Cotton | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(258, 1, 1, 'PUBG men\'s half sleeve cotton t-shirt | zarvish', 'zarvish-5j-D', 1, 40, 119, 399, 'PUBG men\'s half sleeve cotton t-shirt | zarvish', 1, '2019-06-05', 'Fabric:Cotton | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(260, 1, 1, 'PUBG men\'s half sleeve cotton t-shirt | zarvish', 'zarvish-5j-E', 2, 40, 1199, 399, 'PUBG men\'s half sleeve cotton t-shirt | zarvish', 1, '2019-06-05', 'Fabric:Cotton | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(261, 1, 1, 'PUBG men\'s half sleeve cotton t-shirt | zarvish', 'zarvish-5j-E', 1, 40, 1149, 399, 'PUBG men\'s half sleeve cotton t-shirt | zarvish', 1, '2019-06-05', 'Fabric:Cotton | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'no'),
(262, 1, 1, 'PUBG men\'s half sleeve cotton t-shirt | zarvish', 'zarvish-5j-D', 2, 40, 1149, 399, 'PUBG men\'s half sleeve cotton t-shirt | zarvish', 1, '2019-06-05', 'Fabric:Cotton | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'no'),
(263, 1, 1, 'Stylish plain round neck full sleeve cotton t-shirt | zarvish', 'zarvish-6j-A', 7, 30, 1199, 399, 'Stylish plain round neck full sleeve cotton t-shirt | zarvish', 1, '2019-06-06', 'Fabric:Cotton | Sleeve:Full Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(264, 1, 1, 'Stylish plain round neck full sleeve cotton t-shirt | zarvish', 'zarvish-6j-A', 1, 30, 1199, 399, 'Stylish plain round neck full sleeve cotton t-shirt | zarvish', 1, '2019-06-06', 'Fabric:Cotton | Sleeve:Full Sleeve | Neck:Round Neck | Brand: Zarvish', 'no'),
(265, 1, 1, 'Stylish plain round neck full sleeve cotton t-shirt | zarvish', 'zarvishg-6j-A', 10, 30, 1199, 399, 'Stylish plain round neck full sleeve cotton t-shirt | zarvish', 1, '2019-06-06', 'Fabric:Cotton | Sleeve:Full Sleeve | Neck:Round Neck | Brand: Zarvish', 'no'),
(266, 1, 1, 'Alone men\'s half sleeve cotton t-shirt | zarvish', 'zarvish-6j-B', 1, 40, 1299, 449, 'Alone men\'s half sleeve cotton t-shirt | zarvish', 1, '2019-06-06', 'Fabric:Cotton | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(267, 1, 1, 'Alone men\'s half sleeve cotton t-shirt | zarvish', 'zarvish-6j-B', 2, 40, 1299, 449, 'Alone men\'s half sleeve cotton t-shirt | zarvish', 1, '2019-06-06', 'Fabric:Cotton | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'no'),
(268, 1, 1, 'Alone men\'s half sleeve cotton t-shirt | zarvish', 'zarvish-6j-B', 9, 40, 1299, 449, 'Alone men\'s half sleeve cotton t-shirt | zarvish', 1, '2019-06-06', 'Fabric:Cotton | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'no'),
(269, 1, 1, 'Alone men\'s half sleeve cotton t-shirt | zarvish', 'zarvish-6j- B', 4, 40, 1299, 449, 'Alone men\'s half sleeve cotton t-shirt | zarvish', 1, '2019-06-06', 'Fabric:Cotton | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'no'),
(270, 1, 1, 'Check print men\'s half sleeve cotton t-shirt | zarvish', 'zarvish-6j-C', 2, 40, 999, 349, 'Check print men\'s half sleeve cotton t-shirt | zarvish', 1, '2019-06-06', 'Fabric:Cotton | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(271, 1, 1, 'Check print men\'s half sleeve cotton t-shirt | zarvish', 'zarvish-6j-C', 4, 40, 999, 349, 'Check print men\'s half sleeve cotton t-shirt | zarvish', 1, '2019-06-06', 'Fabric:Cotton | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'no'),
(272, 1, 1, 'Check print men\'s half sleeve cotton t-shirt | zarvish', 'zarvish-6j-D', 11, 40, 999, 349, 'Check print men\'s half sleeve cotton t-shirt | zarvish', 1, '2019-06-06', 'Fabric:Cotton | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(273, 1, 1, 'Forest men\'s half sleeve cotton t-shirt | zarvish', 'zarvish-6j-E', 2, 40, 999, 349, 'Forest men\'s half sleeve cotton t-shirt | zarvish', 1, '2019-06-06', 'Fabric:Cotton | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(274, 1, 1, 'PUBG men\'s half sleeve cotton t-shirt | zarvish', 'zarvish-6j-F', 1, 38, 1199, 399, 'PUBG men\'s half sleeve cotton t-shirt | zarvish', 1, '2019-06-06', 'Fabric:Cotton | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(275, 1, 1, 'Shiv ji print men\'s half sleeve cotton t-shirt | zarvish', 'zarvish-6j-F', 1, 40, 1199, 399, 'Shiv ji print men\'s half sleeve cotton t-shirt | zarvish', 1, '2019-06-06', 'Fabric:Cotton | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(276, 1, 1, 'Shiv ji print men\'s half sleeve cotton t-shirt | zarvish', 'zarvish-6j-F', 9, 40, 1199, 399, 'Shiv ji print men\'s half sleeve cotton t-shirt | zarvish', 1, '2019-06-06', 'Fabric:Cotton | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'no'),
(277, 1, 1, 'Kal se gym chalu men\'s half sleeve cotton t-shirt | zarvish', 'zarvish-6j-G', 1, 40, 1199, 349, 'Kal se gym chalu men\'s half sleeve cotton t-shirt | zarvish', 1, '2019-06-06', 'Fabric:Cotton | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes');
INSERT INTO `products` (`product_id`, `product_gender_id`, `product_category_id`, `product_title`, `product_code`, `product_color`, `product_qty`, `product_actual_price`, `product_selling_price`, `product_search_keyword`, `product_label`, `product_date`, `product_description`, `main_product`) VALUES
(278, 1, 1, 'Kal se gym chalu men\'s half sleeve cotton t-shirt | zarvish', 'zarvish-6j-G', 9, 40, 1199, 349, 'Kal se gym chalu men\'s half sleeve cotton t-shirt | zarvish', 1, '2019-06-06', 'Fabric:Cotton | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'no'),
(279, 1, 1, 'Plain men\'s half sleeve cotton t-shirt | zarvish', 'zarvish-8j-A', 10, 29, 999, 349, 'Plain men\'s half sleeve cotton t-shirt | zarvish', 1, '2019-06-08', 'Fabric:Cotton | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(280, 1, 1, 'Check round neck full sleeve cotton t-shirt | zarvish', 'zarvish-8j-B', 2, 30, 1499, 449, 'Check round neck full sleeve cotton t-shirt | zarvish', 1, '2019-06-08', 'Fabric:Cotton | Sleeve:Full Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(281, 1, 1, 'Stylish round neck full sleeve cotton t-shirt | zarvish', 'zarvish-8j-C', 12, 40, 1299, 429, 'Stylish round neck full sleeve cotton t-shirt | zarvish', 1, '2019-06-08', 'Fabric:Cotton | Sleeve:Full Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(282, 1, 1, 'Stylish round neck full sleeve cotton t-shirt | zarvish', 'zarvish-8j-C', 1, 40, 1299, 429, 'Stylish round neck full sleeve cotton t-shirt | zarvish', 1, '2019-06-08', 'Fabric:Cotton | Sleeve:Full Sleeve | Neck:Round Neck | Brand: Zarvish', 'no'),
(284, 1, 1, 'Stylish round neck full sleeve cotton t-shirt | zarvish', 'zarvish-8j-C', 10, 40, 1299, 429, 'Stylish round neck full sleeve cotton t-shirt | zarvish', 1, '2019-06-08', 'Fabric:Cotton | Sleeve:Full Sleeve | Neck:Round Neck | Brand: Zarvish', 'no'),
(285, 1, 1, 'Stylish round neck full sleeve cotton t-shirt | zarvish', 'zarvish-12j-A', 12, 39, 1199, 399, 'Stylish round neck full sleeve cotton t-shirt | zarvish', 1, '2019-06-12', 'Fabric:Cotton | Sleeve:Full Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(288, 1, 1, 'solid men\'s half sleeve cotton t-shirt | zarvish', 'zarvish-12j--B', 1, 40, 999, 349, 'solid men\'s half sleeve cotton t-shirt | zarvish', 1, '2019-06-12', 'Fabric:Cotton | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(289, 1, 1, 'fashionable men\'s half sleeve cotton t-shirt | zarvish', 'zarvish-12-C', 10, 30, 999, 349, 'fashionable men\'s half sleeve cotton t-shirt | zarvish', 1, '2019-06-12', 'Fabric:Cotton | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(290, 1, 1, 'Casual men\'s half sleeve cotton t-shirt | zarvish', 'zarvish-14j-A', 2, 40, 999, 399, 'Casual men\'s half sleeve cotton t-shirt | zarvish', 1, '2019-06-14', 'Fabric:Cotton | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes'),
(291, 1, 1, 'Casual round neck full sleeve cotton t-shirt | zarvish', 'zarvish-14j-', 10, 40, 1199, 349, 'Casual round neck full sleeve cotton t-shirt | zarvish', 1, '2019-06-14', 'Fabric:Cotton | Sleeve:Half Sleeve | Neck:Round Neck | Brand: Zarvish', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `products_color`
--

CREATE TABLE `products_color` (
  `product_color_id_no` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `color_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_color`
--

INSERT INTO `products_color` (`product_color_id_no`, `product_id`, `color_id`) VALUES
(1, 1, 1),
(2, 1, 7),
(3, 1, 3),
(4, 1, 6),
(5, 2, 9),
(6, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products_description`
--

CREATE TABLE `products_description` (
  `product_description_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `product_attribute` varchar(255) NOT NULL,
  `product_value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products_image`
--

CREATE TABLE `products_image` (
  `product_image_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `product_image_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_image`
--

INSERT INTO `products_image` (`product_image_id`, `product_id`, `product_image_title`) VALUES
(84, 32, 'akela-skyblue-round-neck-half-sleeve-tshirt-frontside1f2c0b17f81bcbbc8fc94afc5438e142'),
(85, 32, 'akela-skyblue-round-neck-half-sleeve-tshirt-backside02803a24865a637cfe38923c930436a8'),
(86, 32, 'e1b82247b9be81888e356b21092cbe20'),
(90, 34, 'bhayankar-aalsi-white-round-neck-half-sleeve-tshirt-frontsidef18bb553554c23ec6edbd0f04291746e'),
(91, 34, 'bhayankar-aalsi-white-round-neck-half-sleeve-tshirt-design42283edb6a2d0860ddc4a5c41660b9bb'),
(92, 34, 'd0fb332206d759853f80af345ef61c78'),
(93, 35, 'chal-paka-mat-black-round-neck-half-sleeve-tshirt042981a15efb291ec426c5c9fa300668'),
(94, 35, 'chal-paka-mat-black-round-neck-half-sleeve-tshirt-backside454375ba7b18fe37dadea7d07436daa3'),
(95, 35, 'd58ceb0eb70fd5e2e12ecad7974e6dd2'),
(123, 45, 'my-dad-is-my-hero-white-round-neck-half-sleeve-tshirt-frontside14c7fbef631fb85081680f20b0c5bc59'),
(124, 45, 'my-dad-is-my-hero-white-round-neck-half-sleeve-tshirt-backsidea75530e6c28c37987fb261fc84c4718e'),
(125, 45, 'cec0b99a2c35ee75019f831505d70ee2'),
(132, 48, '9-tanki-white-half-sleeve-roundneck-tshirt-frontside87c376a96d39196c4d9fecbf9d9d811a'),
(133, 48, '9-tanki-white-half-sleeve-roundneck-tshirt-backsidefcfa462a612110a928c1948e0170f3ba'),
(134, 48, 'baa0dfac31529d83b282d64746a8bc4d'),
(135, 49, '100-percent-desii-white-half-sleeve-roundneck-tshirt-frontsidea77c1c2d2b3271a628b83c758ba00c45'),
(136, 49, '100-percent-desi-white-half-sleeve-roundneck-t-shirt-backsideee8e50bbbe249480815bedf08a53965c'),
(137, 49, '293cbeccfef9947f93a0406d8827cc12'),
(138, 50, 'apni-hati-to-sabki-fati-white-half-sleeve-roundneck-tshirt-frontside10d41bf11de4a6e98cc9cb0e0b0262aa'),
(139, 50, 'apni-hati-to-sabki-fati-white-half-sleeve-roundneck-tshirt-backsideb157aa98b2a4e0bad0de108bc515c7b6'),
(140, 50, '26c4c9c2c8143ade72f88354ac88bf89'),
(141, 51, 'avaaj-niche-white-half-sleeve-roundneck-tshirt-frontside4b82cfeea750bd810e132e7224ca686d'),
(142, 51, 'avaaj-niche-white-half-sleeve-roundneck-tshirt-design4cc5dfa30c0d9dee4fb80c370cca24b4'),
(143, 51, 'badf68c5bc045b4c463924e848a0ca4e'),
(144, 52, 'do-more-talk-less-white-half-sleeve-roundneck-tshirt-frontside5f8d3ea513ac983b63124bdc1da1bffe'),
(145, 52, 'do-more-talk-less-white-half-sleeve-roundneck-tshirt-backsidea9e896629242a50ea637553b037d07dd'),
(146, 52, '5ef731abf94961a218132f6a702ce610'),
(147, 53, 'gadariya-white-half-sleeve-roundneck-tshirt-frontside318be14f8b617bb59dd10ab29992b111'),
(148, 53, 'gadariya-white-half-sleeve-roundneck-tshirt-backside9d61e61742281a615594bc069f405ce3'),
(149, 53, 'fe2cd5e4139ff3f5ac85b4d53782aedd'),
(153, 55, 'chhora-jamindar-ka-white-half-sleeve-roundneck-tshirt-frontsided0385984b27aca8891de096e264dc23a'),
(154, 55, 'chhora-jamindar-ka-white-half-sleeve-roundneck-tshirt-design8835872e95cfa5732e043465f87d4bee'),
(155, 55, '8e9d911d37b98cd7c0dd382b640ca8e8'),
(156, 56, 'kal-se-sutta-band-white-round-neck-half-sleeve-tshirt-frontside751f67844d2ca033892eaf6b34d4b073'),
(157, 56, 'kal-se-sutta-band-white-round-neck-half-sleeve-tshirt-design6bbc9acedb930f24bd0ba693b0785796'),
(158, 56, '9ef07a7a70ed1a2080f7822936429ec1'),
(159, 57, 'katai-zahar-white-round-neck-tshirt-frontsidecc1ed16316471bbf84d515b01e42fd1b'),
(160, 57, 'katai-zahar-white-round-neck-tshirt-design80b013e4f18d30107d477b0eb3eaa5af'),
(161, 57, 'ef048a42dc4dc89c2a672ece278956a8'),
(162, 58, 'kshatriya-white-round-neck-half-sleeve-t-shirt-front-side67449111b47aa5cfeb04e9626b721e80'),
(163, 58, 'kshatriya-white-round-neck-half-sleeve-t-shirt-design27181def1659707923dbe4b9f6012995'),
(164, 58, 'd80a8d9e872263b5042795b93596e172'),
(165, 59, 'no-3g-no-4g-only-pubg-black-tshirt-half-sleeve-round-neckce198f10f27ffbb3ca7fd557766b3cea'),
(166, 59, 'no-3g-no-4g-only-pubg-black-tshirt-half-sleeve-round-neck-design23186f9f6139e6f3edbf3957e96be520'),
(167, 59, '777c7b329d70edbb138a2cc9d0b48a51'),
(168, 60, 'ohh-fuck-black-tshirt-roundneck-front-side3b36d6477abab5be222e2d504081fe93'),
(169, 60, 'paisa-moh-maya-hai-black-half-sleeve-tshirt-backside94278392af911bf83c2e7b072f364060'),
(170, 60, 'bbdd21f36518f028b30641a3dbf4ec85'),
(171, 61, 'paisa-moh-maya-hai-black-half-sleeve-tshirt-frontsideed284eeda69f0ffa86ce1165c0599ddf'),
(172, 61, 'paisa-moh-maya-hai-black-half-sleeve-tshirt-design8b277d9db2682015bae821d9d4bd749f'),
(173, 61, '275b525b9929288ceccbdca36e4566ee'),
(174, 62, 'rajput-white-tshirt-design-frontside8180dee58474beba399005526b257166'),
(175, 62, 'rajput-white-tshirt-design59b005f72fb48b9860c4479c438f1960'),
(176, 62, 'b56e6187b1df3cec699a58e9a0c5cf48'),
(177, 63, 'sada-sexy-raho-white-round-neck-half-sleeve-t-shirt-frontside83dfcbeeb249a82e3fd62aad7e67c0ef'),
(178, 63, 'sada-sexy-raho-white-round-neck-half-sleeve-t-shirt-design0d522453f507f26e6953d6333fc0afc6'),
(179, 63, '65334aa77ef2412872b12be753328f46'),
(180, 64, 'stop-thinking-start-sleeping-white-round-neck-half-sleeve-t-shirt-frontsidecceb49bab7a6f463997bb9786b5c8961'),
(181, 64, 'stop-thinking-start-sleeping-white-round-neck-half-sleeve-t-shirt-design117d9771a7151d974588fd5fa96877f9'),
(182, 64, 'f27be14d5e2ff86f166d457e14fef8d4'),
(183, 65, 'tera-hero-idhar-hai-white-round-neck-half-sleeve-tshirtb3639a4e703659d453ae87b4770db709'),
(184, 65, 'tera-hero-idhar-hai-white-round-neck-half-sleeve-tshirt-designe0573716caeeeabb6698f54f20a0c678'),
(185, 65, '511f17bd1bd76d47bd7e91d634bef02a'),
(186, 66, 'tu-13-dekh-white-round-neck-tshirt-frontside1a0a12d26cd32a504bff613d72b338a2'),
(187, 66, 'tu-13-dekh-white-round-neck-tshirt-design05366c9bbc085eb22b34721e88ce570b'),
(188, 66, '9e348123da368dc8be17ae110df294d0'),
(189, 67, 'dragon-navy-blue-half-sleeve-tshirt-frontsidee87acfbba536141a40e2aab22d80c12b'),
(190, 67, 'dragon-navy-blue-tshirt-design87e8fb1be2804f4e115bd21d96ea4286'),
(191, 67, 'a172de192bdf55a9112b7b77b000b4f0'),
(192, 68, 'error-404-gf-not-found-frontside76af9185599184b3898432ade3a95e53'),
(193, 68, 'error-404-gf-not-found-backside82b6f16ded3f4cd370c845d3a1b502f9'),
(194, 68, 'a14d612383655d7af331b69e8f71c856'),
(198, 70, 'thumbs-up-lion-black-t-shirt-half-sleeve-frontside4283a77fe7c6c4325b32f2c501bfdd1b'),
(199, 70, 'thumbs-up-lion-black-t-shirt-half-sleeve-backside7b851b1d01defdc534738d835188e8a0'),
(200, 70, 'b885a294539fe190467ab216cbd47c37'),
(201, 71, 'yellow-lion-black-t-shirt-frontside7ce9015a25f1116963588e415f9ad969'),
(202, 71, 'yellow-lion-black-t-shirt-backsided2ab8bc5d8770d59cde7600c3ffae904'),
(203, 71, '2ab25b5b131c39e1275a9a2c8c0821f8'),
(204, 72, 'me-bhi-chaukidar-black-round-neck-half-sleeve-t-shirt-frontside61323b40deee7fec2c746cb14e26bb39'),
(205, 72, 'me-bhi-chaukidar-black-round-neck-half-sleeve-t-shirt-design1abc35e0a304bed556879fdda9311530'),
(206, 72, 'b1c0adc2f5bdc65aa008829bd06b598c'),
(207, 73, 'normal-is-boring-black-round-neck-half-sleeve-tshirt-frontside7a67c19bbb732b0d2ba8faa061df4667'),
(208, 73, 'normal-is-boring-black-round-neck-half-sleeve-tshirt-designa3a0dad6eab74263cd6df92689abd097'),
(209, 73, 'f9083273da483cc3465ebb63eb78df50'),
(210, 74, 'sahi-khel-gaya-bancho-white-round-neck-tshirt-frontsidefe0680e09f0defd6cff2b19e537c6d59'),
(211, 74, 'sahi-khel-gaya-bancho-white-round-neck-tshirt-design5fe6e23881ab27ec175bda38a9706778'),
(212, 74, '03b20e6c1ce7e4a82176b6543d4d84c9'),
(213, 75, 'skull-white-half-sleeve-round-neck-t-shirt-frontside916fa433d9ce5fd5f4b3c500ab46d7b7'),
(214, 75, 'skull-white-half-sleeve-round-neck-t-shirt-designf335b364a8a996185dd3635b8bf23dd4'),
(215, 75, 'e4ef1beb0fdb4288d48fe2bb82acda5e'),
(216, 76, 'skull-black-tshirt-frontsidead622c9085031206b8dbccf214f9bb54'),
(217, 76, 'skull-black-tshirt-backside9f7e644096a4e81d0dbad595029671cf'),
(218, 76, 'abf0fbb92e9d537911533d7c8134f2f9'),
(219, 77, 'chup-kar-white-half-sleeve-t-shirt-zarvish-frontside1979594e173eef09eb65e38fccf28003'),
(220, 77, 'chup-kar-white-roundneck-half-tshirt-zarvish-backside7629b8a97a14bd22abf8574aaaeea322'),
(221, 77, 'ef1b2cf85d2fadf117cd38f72eb2f827'),
(222, 78, 'cant-can-zarvish-black-half-sleeve-t-shirt-frontside94364d2278b817ed31304e88f12dc261'),
(223, 78, 'cant-can-zarvish-black-half-sleeve-t-shirt-design6f9ffca83981c4258a14cb8a06df85ee'),
(224, 78, 'd975bec0f1875378a5ea9ecb77cfedd8'),
(225, 79, 'positive-attitude-zarvish-black-tshirt-frontsideaa006a6ff7cb7742ba44b8b88fcf33cc'),
(226, 79, 'positive-attitude-zarvish-black-tshirt-backside10c857ae816e4d87de0cfcfca7d35de5'),
(227, 79, '6041d2a92d05a653c85da1e218ca29b7'),
(228, 80, 'apple-man-zarvish-maroon-t-shirt-frontside7fde7ae19016638b5fdb8efb55949521'),
(229, 80, 'apple-man-zarvish-maroon-t-shirt-backside582c3b7e6aed45a966705a092335613b'),
(230, 80, 'f3a9fae3cbca2e50c0e1db80580bed73'),
(231, 81, 'act-now-zarvish-maroon-t-shirt-frontside7d98ed2d33200bd97b1360a230835435'),
(232, 81, 'act-now-zarvish-maroon-t-shirt-backsidedee1996bcfc3657cf8c225ab98ed20f8'),
(233, 81, 'fab3380c40c9086e829cdb57b8b07b05'),
(234, 82, 'work-sweat-repeat-tshirt-frontside142527b941dcd831b16cd178ace49f8b'),
(235, 82, 'work-sweat-repeat-tshirt-designb1e208271cccff77b8b81c67966388aa'),
(236, 82, '27e2fe5b5ee89d853f830fdc60f9533d'),
(240, 84, 'keep-moving-forward-white-tshirt-frontside1eb4a8ad2c037d2b75733e8dae857ec2'),
(241, 84, 'keep-moving-forward-white-tshirt-backside040ad2ee26c1e2142d7fbbb4637be855'),
(242, 84, '2ec6ac3909de2c1fbc4d42ca4a0e1113'),
(243, 85, 'idea-white-tshirt-zarvish-frontsidefb8a59e41734b371ea6a5b03f7d32951'),
(244, 85, 'idea-white-tshirt-zarvish-designcabf47b67694c909c92cf9bf5a33588f'),
(245, 85, '3dd0094a0387780f8051703a524a138a'),
(246, 86, 'flying-witch-white-half-t-shirt-zarvish594874bcdd12169b6e1620ab81a47ca4'),
(247, 86, 'flying-witch-white-half-t-shirt-zarvish-designdfc4dee996b7eae367a325deec42141a'),
(248, 86, '71903b6b60265caf6c470374464ebf54'),
(249, 87, 'captain-america-round-neck-white-half-sleeveac2b515975d88d725aab828d36ee1ed8'),
(250, 87, 'captain-america-round-neck-white-half-sleeve-designfe638d080afd5c7e7751d7352a3862a9'),
(251, 87, 'bd120278b8f4421f94b63b8814fc9b1a'),
(252, 88, 'bacche-ki-jaan-loge-kya-frontb8c18f1c6ea32fbd95768be9f557d6b0'),
(253, 88, 'bacche-ki-jaan-loge-kya-designe5752099d5d4594b554b0ca831ebbf43'),
(254, 88, '12470ad895cc8215392d788d6802fd11'),
(258, 90, 'chimeric-skeleton-round-neck-half-sleeve-white-tshirt3c5848ed6cc42d97a7c0502d73d5a5f0'),
(259, 90, 'chimeric-skeleton-round-neck-half-sleeve-white-tshirt-design1946c43079a93815b42916d7e4e7d7d2'),
(260, 90, '5c94753f02a16ea24a0f157a111d6215'),
(270, 94, 'kshatriya-horse-round-neck-half-sleeve-white-tshirt-front15b6660f1e297691c9952c4b2a96e19f'),
(271, 94, 'kshatriya-horse-round-neck-half-sleeve-white-tshirt-front-design1a210f840fd0b8e94b68d50e853ac2a4'),
(272, 94, 'a94e32c9ea95769cf3829c6e63b9d3e7'),
(303, 105, 'abey-bhabhi-hai-teri-123dc0669a0ea6e2513c4a7d453df930f4de'),
(304, 105, 'tshirt-designc8173e69ebf6f4f7901967b4e01964a5'),
(305, 105, '052897eb1dc136b93514785b23288fdf'),
(306, 106, 'CHAL-RASTA-NAAP-ROUND-NECK-HALF-SLEEVE-WHITE-TSHIRT-front-sada4251afa313cd9abc5e62127d9d45714e'),
(307, 106, 'CHAL-RASTA-NAAP-ROUND-NECK-HALF-SLEEVE-WHITE-TSHIRT-DESIGN7eeb9be4bc3cdc4ac66cd65dbab98131'),
(308, 106, 'a25f6a5bef0f464329214972cb7cbdf2'),
(309, 107, 'desi-moochha-round-half-sleeve-black-tshirt-DESIGNafe2b6ae0517ce3045dd71f832834475'),
(310, 107, 'desi-moochha-round-half-sleeve-black-tshirtc54afd20d2a6cba0c72cadc36c37b378'),
(311, 107, '5701580ab08dfb9da0679d0b58630768'),
(312, 108, 'gym-kare-haid5821b8fd3bbb7300179e77c6d409d9d'),
(313, 108, 'gym-kare-hai-round-neck-half-sleeve-white-tshirt-designbc7199d96f1e4245c20cc17fb120aedc'),
(314, 108, '9450d98a47be9784992f4bc406c49b65'),
(315, 109, 'gym8f1ee1036bd86b5b16eecfdac6f12c96'),
(316, 109, 'gym-lover-design5659d1f725126a99891426c92af7e7f9'),
(317, 109, '7ae34ed3ad5c366f4d119856e2fc515d'),
(318, 110, 'kaat-dalunga-bsdk-round-neck-half-sleeve-black-tshirt2a9c26e8b655b4301b6bffc6202a190b'),
(319, 110, 'Untitled-1741bcb274da15c6df2effecf5e7c0bfd'),
(320, 110, '80a891f68b6b2f5025d722f2faab1f21'),
(321, 111, 'king-black--round-neck--half-sleeve-tshirt-design.jpg-1234fb3355faefcfe6e67621593b343db3a7'),
(322, 111, 'king-design0591e5f0f0391e3a587f197819680de2'),
(323, 111, 'e41a2586f6999ab45948303d3fac0a13'),
(324, 112, 'tera-bhai-hai-na-round-neck-half-sleeve-white-tshirt9a7f2e33cf8d55a7a0c3f95f3d692ce4'),
(325, 112, 'tera-bhai-hai-na-round-neck-half-sleeve-white-tshirt-design22535dcc20d3f06244e88d24786b71be'),
(326, 112, '2c8e981b3e946c194881d2248a8458bb'),
(327, 113, 'skull-vector-round-neck-half-sleeve-white-tshirt53ad57628c386e30526ac7681a50c0cd'),
(328, 113, 'SKULL-DESIGN7e991730836095adddae13bd971ae6eb'),
(329, 113, 'c074d3df5ad3954019be3f706252c038'),
(333, 115, 'superman-round-neck-half-sleeve-white-tshirt43c9192e6ce437926ae01724db670e9c'),
(334, 115, 'superman-round-neck-half-sleeve-white-tshirt-designfd5ba6793d7d16555525284eeda98566'),
(335, 115, '4fc49f818ba2fa023624e1a41929f2de'),
(336, 116, 'superman-gold-round-neck-white-hlaf-sleeve5f3caf6760cd572d89297b7159191893'),
(337, 116, 'SUPERMAN-DESIGNac99968373816c575f35730760acae04'),
(338, 116, '077e7af9917444d70502f0d5ad6f14c1'),
(339, 117, 'akela-white-round-neck-half-sleeve-tshirt-front6a987b7f5ae4be7c09970fc3673a9d29'),
(340, 117, 'akela-skyblue-round-neck-half-sleeve-tshirt-backside57f663c33e38a64cb857519f1e60c464'),
(341, 117, '4d437c15b33457c3e2febb005c9a99ed'),
(342, 118, 'attitude-black-half-sleeve-tshirt--modal82e53fd425f36d82d8b3f17cd1f97f3a'),
(343, 118, 'attitude-black-t-shirt-designb7109da05321be065e737c770dc9dc3e'),
(344, 118, '96991e6555157d54b9690a5a9fe7ed1a'),
(345, 119, 'bhand-in-black-round-neck-half-sleeve-tshirt-frontsidee315367748cc764b6df3f3e999045e9d'),
(346, 119, 'bhand-in-black-round-neck-half-sleeve-tshirt-design8b4474d84dc8410bafc3e69b476c0202'),
(347, 119, '175875aa08e63c136ec5cbfdaa6cf24b'),
(348, 120, 'pubg-black-round-neck-half-sleeve-tshirt2c8d3cabe5d2420c44812f200cbbf16b'),
(349, 120, 'pubg-black-round-neck-half-sleeve-tshirt-design4ab3755b5c6a8f399572bda0b5aa3d25'),
(350, 120, '21d2fe788c89721bf109ef6afdb32adc'),
(351, 121, 'chant-launda-white-round-neck-half-sleeve-tshirt-frontsidef6c0cc8ada0d18a507652e07fc46d406'),
(352, 121, 'chant-launda-white-round-neck-half-sleeve-tshirt-design613e96b0cfcc2d32ed201e806e6cbfbc'),
(353, 121, 'b8fc0329f6f4f009eeb3f8166fea84f8'),
(354, 122, 'dont-look-me-half-sleeve-round-neck-white-tshirteb6db7eb98c1d8d7e6406f6bf5db276d'),
(355, 122, 'dont-look-me-designa22f9ce11e2713392f72198a9101b5ea'),
(356, 122, '801aa0ecd0809ef93dc0e0b58f86213a'),
(357, 123, 'fearless-black-round-neck-half-sleeve-tshirt5ee125488d5cb1e451a598d4483e619f'),
(358, 123, 'fearless-black-round-neck-half-sleeve-tshirt-designbd379ef6c80e6f4899895e57e9411f46'),
(359, 123, '06cb61f6c28e443512f6341009c34e2a'),
(360, 124, 'filmy-black-round-neck-half-sleeve-tshirt60b70d08d7877fa90a8639290cb79286'),
(361, 124, 'filmy-black-round-neck-half-sleeve-tshirt-designd4a39c9e8f9290e65441ff0fca010571'),
(362, 124, '250e453f4c1d3de529d6784849c6d3c6'),
(363, 125, 'ghost-in-black-round-neck-half-sleeve-tshirt8276571db96c775a7414ec226cef065b'),
(364, 125, 'ghost-in-black-round-neck-half-sleeve-tshirt-design7dbcd10002e13ad31ab683913bf15991'),
(365, 125, '35ea08542f877433589a5405fe7b5e38'),
(366, 126, 'gunday-black-round-eck-half-sleeve-tshirt1561fba160679732fc9c8f9071185192'),
(367, 126, 'gunday-black-round-eck-half-sleeve-tshirt-design0ec9e996ee10421625c1952d731aab7e'),
(368, 126, 'eb1d017b4b002711e8e013f5832f713a'),
(369, 127, 'black-golden-ham-nahi-sudhrege-black-tshirtd284e1cde54385840ef8a44fa445f372'),
(370, 127, 'black-golden-ham-nahi-sudhrege-black-tshirt-design63c5889fdfa3bb517502c84c656e998b'),
(371, 127, '0cf731806f61b44d4ec076dcc94511d0'),
(372, 128, 'king-black-round-neck-half-sleeve-tshirt21ce80a163492b3ae64330b6b991a855'),
(373, 128, 'king-black-round-neck-half-sleeve-tshirt-design-4c9755f0bcccd4a0dfe0cf5d71ad8a5c'),
(374, 128, '43399cc19f7ab8c09f97b6d51165c2aa'),
(375, 129, 'mili-toh-best-nahi-toh-next-white-round-neck-half-sleeve-tshirt-511c84c8e83c95d9c58ae0e65e2471ce'),
(376, 129, 'mili-toh-best-nahi-toh-next-white-round-neck-half-sleeve-tshirt-design55bee58575198e8ab8f88e223aa20386'),
(377, 129, '5062a637741c750f5e0491d234d456d7'),
(378, 130, 'tumhare-paas-kya-hai-white-half-sleeve-round-neck-tshirt362880b1e86cb6b53c98d34b4f2d622d'),
(379, 130, 'tumhare-paas-kya-hai-white-half-sleeve-round-neck-tshirt-design84f8dca1a32438139b77dceb4fbcd29f'),
(380, 130, 'd4bc26cf61e9491b898bd05f882f1165'),
(381, 131, 'zindagi-jhand-fir-bhi-ghamand-white-half-sleeve-round-neck-t-shirt.jpg-1126b939872a88b334ae090a06680cd91c'),
(382, 131, 'zindagi-jhand-fir-bhi-ghamand-design33c4e4fdf6334339838e7f2db0fbd457'),
(383, 131, '0e3ef1f5c17a7a5464669975488448d8'),
(384, 132, 'humko-nahi-pahchana-round-neck-half-sleeve-dark-blue-tshirt84b054afe8be974ae3538e6840aae4f8'),
(385, 132, 'designbfceb96f95014be7496957787ae9510b'),
(386, 132, 'f8c41a9f3c60a69ec23d985c1aed717f'),
(387, 133, 'maharaja-round-neck-half-sleeve-black-tshirta4dc3d236e646e9a0cdd342850c8ff02'),
(388, 133, 'maharaja-design9d251bdeb7d54d6cfe59497808fd3a79'),
(389, 133, '6aed2901d22d0d83876d43207fe13340'),
(390, 134, 'singh-is-king-round-neck-half-sleeve-black-tshirt0ecc60b37350b045cf625155c34a81e3'),
(391, 134, 'design79cfa6d1168ed2b100bb3458ea4e73fd'),
(392, 134, '83fc086410174dbedcc28bd7037279b0'),
(393, 135, 'splatter-face-round-neck-half-sleeve-white-tshirt42963d904ac05eb60b1b654178347ab5'),
(394, 135, 'designf61c1cbfb7e73dc7f2ca132a16933f75'),
(395, 135, '9c12c44f708d6c0a719f88e6aec2457a'),
(396, 136, 'you-only-live-once-white-tshirtc276fcb78095dfd5cbd18db1f9d9f755'),
(397, 136, 'you-only-live-once-white-tshirt-designbf58adcb350c5a5d4f2477143354a761'),
(398, 136, 'f8b94800eb1d3f9f3e89c21d86f57717'),
(399, 137, 'later-means-never-tshirt-frontsideb3832eafcd43d4f5bc17b07a0eb2fb95'),
(400, 137, 'later-means-never-tshirt-designba5a8903b3dca27f8532d27cc1d1031c'),
(401, 137, '4fb6b2ce24881a753deb0440dfc636a7'),
(402, 138, 'follow-dreams-not-order-tshirt-frontsidefbfe553bfa96eb361777506cfb1f2446'),
(403, 138, 'follow-dreams-not-order-tshirt-designc573bac4f1228b2d55f54b4e4aa664fd'),
(404, 138, '590ff1b58dcb4b5465e468470cf0a2db'),
(405, 139, 'do-your-best-black-tshirt-frontside8bf90a92bd1b3e716ebd6d43c47ef8d0'),
(406, 139, 'do-your-best-black-tshirt-designd2c2150f15ef37117a97ba22cd23ceac'),
(407, 139, 'ffe3be146cec4b93ce1601cb2612d660'),
(408, 140, 'be-fast-or-be-last-tshirt-frontside158d2376d283ee3b86dfbde1c9f9370a'),
(409, 140, 'be-fast-or-be-last-tshirt-design151773e7b2ffec6b4ecc9e60d1091df8'),
(410, 140, '399f66f8651fddcde574a00a44df8326'),
(411, 141, 'always-online-black-tshirt-frontside0fb71e86e0c56343dae4fce510c89038'),
(412, 141, 'always-online-black-tshirt-design0e81ed809450c907392bad565f0c61c4'),
(413, 141, 'a467efb18d4a1bfe3ef1f59f0095dbfd'),
(414, 142, 'awara-black-tshirt558f008b01825a2e906c9a33e3639e68'),
(415, 142, 'Black-ORIGINAL-PHOTOSHOP-BACKSIDEaf375983bcfd92d29cbb090989696d1e'),
(416, 142, '5a26ec37c0f658c022cd58cfafd36cda'),
(417, 143, 'bhai-hai-tu-mera78a6d581dbf161df1891ed625744cca9'),
(418, 143, 'Black-ORIGINAL-PHOTOSHOP-BACKSIDEfff5b50e67a7e30918edf603c1eea35e'),
(419, 143, '858d2452213c97c267b236c794faf1c5'),
(420, 144, 'krishna-black-front66e693369a3a4341bc0cdab1842d8895'),
(421, 144, 'Black-ORIGINAL-PHOTOSHOP-BACKSIDEfca3a68ec434f19c3b198c43b0abc728'),
(422, 144, 'ff0734dbc3c358d78509da36047a6176'),
(423, 145, '1st-life-blacka7682735865c5167618ca0f77135e589'),
(424, 145, 'Black-ORIGINAL-PHOTOSHOP-BACKSIDE70e8572f560e95f865a35b2e8f4df188'),
(425, 145, '507a454aeb4e4630a2f183342c99457a'),
(426, 146, 'krishna-dark-blue-front---Copy77d83e83c3c7be96125a5924681ae802'),
(427, 146, 'dark-blueORIGINAL-PHOTOSHOP-BACKSIDE---Copydbed2d4e208346a1ddc51dd55363fc55'),
(428, 146, '46dcf35589d333b99c66cb0818b35dde'),
(432, 148, 'bro-half-sleeve-black-color-tshirt-frontside4fa12ceab18774487e1b4a327b7e1340'),
(433, 148, 'bro-half-sleeve-black-color-tshirt-design8993b562b787c2dbefa76fff7cec2b49'),
(434, 148, 'f5fe134e7fec19276942bbd28d54404c'),
(441, 151, 'six-pack-coming-soon-black-half-sleeve-tshirt-frontside93dda436070d7e14b89fc50f7dfcebdb'),
(442, 151, 'six-pack-coming-soon-black-half-sleeve-tshirt-designec2bba781673009f5a3691a8be2ce14c'),
(443, 151, '69c360468048bcf700c7d4d0a9c04afe'),
(444, 152, 'bhai-ki-ijjat-bada-di-bancho-frontsideda38419600ad8d8c9c694375901691c5'),
(445, 152, 'bhai-ki-ijjat-bada-di-bancho-designb533b1da4ef457c8549e590d890319ad'),
(446, 152, '15f7dd75800136a88cbf1aa110f2b741'),
(447, 153, 'krishna-dark-blue-front---Copye68b113005051ede5a4bcfc165d03f76'),
(448, 153, 'dark-blueORIGINAL-PHOTOSHOP-BACKSIDE---Copy3505c7f10b0c3f9a62d014ef278dfc7e'),
(449, 153, '6b455ed2799d862a36b7763f051de1a1'),
(453, 155, 'avenger-white-half-frontside243697a62c10e39e7568c84e40d879e8'),
(454, 155, 'avengera99c995e73c7589f6117f76564808792'),
(455, 155, '8d712db590132d57deb50067d728e5c7'),
(456, 156, 'avenger-logo-black-cotton-tshirt-frontside63192f0c389228728c1153cba81d1ac9'),
(457, 156, 'avenger-logo-black-cotton-tshirt-design81a0a4fddc9670ced8e4938a8fe87671'),
(458, 156, 'e50f3c3bb09996b81081ed332662c7f2'),
(465, 159, 'marshmello-t-shirt-black-cotton-frontside0f70ba5c8c64a035f51c29e8168a9271'),
(466, 159, 'marshmello-t-shirt-black-cotton-design383674d1264fc130479b208cf99b6079'),
(467, 159, 'b476d010bb348e5e42d211564b6b10f0'),
(468, 160, 'k-kha-g-gha-cotton-black-tshirt-frontside951aebe62f2706a1c6c9b164ffa58946'),
(469, 160, 'k-kha-g-gha-cotton-black-tshirt-design06c59a79c5946002b6c147035e717b63'),
(470, 160, '3c76d3eceae609416f62d267b976ce49'),
(471, 161, 'nothing-is-impossible-cotton-black-tshirt-zarvish-frontsideaa8a3db444049b2a07aa83bc8ba5e638'),
(472, 161, 'nothing-is-impossible-cotton-black-tshirt-zarvish-design7c948ee5926527d20f93a86dab37af22'),
(473, 161, '6f9de466b392981512cd9faba934a4db'),
(474, 162, 'whatever-it-takes-black-cotton-tshirt-zarvish-frontside378e0dce3c461b3222071f68912aa4e6'),
(475, 162, 'whatever-it-takes-black-cotton-tshirt-zarvish-designe182303bedef6eb65030c684099ba486'),
(476, 162, 'dbf3c8a350573d4f3dd65daede1427e8'),
(477, 163, 'dragon-maroon-cotton-tshirt-frontsidec859155db93ef28723d5492e00b0ecd8'),
(478, 163, 'dragon-maroon-cotton-tshirt-design98595d1e1fb3747350e75b4fb5efba2d'),
(479, 163, 'c6b91558af0f12861a475a533acb537c'),
(480, 164, 'harry-potter-tshirt-cotton-zarvish-frontside868a6eb83f529cbff0a8f4dd55c1131d'),
(481, 164, 'harry-potter-tshirt-cotton-zarvish-design9b5d8b7957c4a21a8dccec0d54733361'),
(482, 164, '82b1c0cf3adaac24927c71102d9f93f3'),
(483, 165, 'ohm-namay-shivay-tshirt-cotton-zarvish-frontsideac9f68fd1f55bc469fba7a12815c4134'),
(484, 165, 'ohm-namay-shivay-tshirt-cotton-zarvish-design8ad0c94481073c430dc64775e9afb99a'),
(485, 165, '3299667c90e2acb02a6585d3d7ffe865'),
(486, 166, 'hum-nahi-bigdege-cotton-tshirt-frontsidea51f4ddd29a5195c8b515e1ccab53034'),
(487, 166, 'hum-nahi-bigdege-cotton-tshirt-designbf5961255fc4d856c1dc6c4427185880'),
(488, 166, '11c24988062b8dfd5682b42a472a87ca'),
(489, 167, 'winner-winner-chicken-dinner-black-cotton-tshirt-frontsideb3daa1c7bbd009578528e6ee6df31237'),
(490, 167, 'winner-winner-chicken-dinner-black-cotton-tshirt-design4faa7a2721294519ce39e22fe2513e1a'),
(491, 167, 'dc2802dd9d1a89fc5a78094f5373a43a'),
(495, 169, 'Iron-man-arc-reactor-black-cotton-tshirt-frontside20567199baa46a553a02ff631bdd7e62'),
(496, 169, 'Iron-man-arc-reactor-black-cotton-tshirt-design0b859912ac7f1ffff5b871f4014368d7'),
(497, 169, 'c1262e47c6dd1f9524f73c94e6784a36'),
(498, 170, 'radioactive-tshirt-black-half-sleeve-cotton-frontsidedeb0419540a73aed8b301f3c69cbc59e'),
(499, 170, 'radioactive-tshirt-black-half-sleeve-cotton-designaf771490120eaad1cd28ad61964353a1'),
(500, 170, 'f0bd4e13f59f07be6ae74363ecfcd5fe'),
(501, 171, 'kya-karoge-jankar-front1dbd4ca61af38a1392e2f23ef52c6a0f'),
(502, 171, 'photo-design71741bbc490fd41db97bcce549812cc2'),
(503, 171, '1142364b565e39ac679640385bd95839'),
(549, 187, 'zarvish-black-tshirt-front493d00b48b880d62c24300f0041e5289'),
(550, 187, 'Zarvis-design-black-49f68cdc39cda1674954137b014573df'),
(551, 187, '45e950ac244247506bc34a8ef5b2f379'),
(552, 188, 'zarvish-tiger-foot-white-tshirtb476d2b4fc72f833e92f57ee1f1e7ada'),
(553, 188, 'zarvis-designbc3b0e955654775db2048e82c8a6a921'),
(554, 188, '7baaa4de3ce98f9ec6d4e8a08eebe824'),
(555, 189, 'zarvish-tit-for-tat-black-frontffec4d1d67f0d44ee40d82eb8d4f9231'),
(556, 189, 'tit-for-tat-design-black.jpg-zarvish5886fb657bb4e50b198558201ac67dbd'),
(557, 189, '0e0c944f1189b34e516da866aed04081'),
(558, 190, 'zarvish-tit-for-tat-nevy-blue-frontcf828fd6538415ff328d35ebff425722'),
(559, 190, 'tit-for-tat-design-nevy-blue-.jpg-zarvish35a75fe3085ae8dc0b86b276b9c3ec62'),
(560, 190, '68603e34cdbd6047c3b9221f2df81e36'),
(561, 191, 'zarvish-mahroon-tshirt-frontb54f18f22616eece19b91d35dc62bb36'),
(562, 191, 'zarish-design615fe5c8aa61a4c094cd5bb1f414d41f'),
(563, 191, '30e869a3f42cc3581e7010b1caca43f6'),
(564, 192, 'zarvish-fadu-bandawhite-t-shirtac37bd327db89b5f809d219b41271b21'),
(565, 192, 'zarvish-design368e2a9f4eef29704240c87a659b3f2a'),
(566, 192, 'cd3c624acb6e4fe409a542af9ccaba38'),
(567, 193, 'zarvish-no-pain-no-gain-maroon-round-neck-half-sleeve-tshirt-fd3906612fea55cdc409188c6f4696a83'),
(568, 193, 'zarvish-no-pain-no-gain-marooon-neck-half-sleeve-tshirt-full6ae16864f57a5310ad49462c4c419eb4'),
(569, 193, 'zarvish-no-pain-no-gain-maroon-round-neck-half-sleeve-tshirt-designdbc5bdfd2ebb3b28620c7e2bce67f79a'),
(570, 193, 'zarvish-no-pain-no-gain-maroon-round-neck-half-sleeve-tshirt-bfcce96eab2f116969cc2607e1baf31c2'),
(571, 194, 'zarvish-no-pain-no-gain-black-round-neck-half-sleeve-tshirt-f30329e4887bf72c054f1927f5d5302b3'),
(572, 194, 'zarvish-no-pain-no-gain-black-round-neck-half-sleeve-tshirt-fullf2857be5058b75590dcd4ab62a601b72'),
(573, 194, 'zarvish-no-pain-no-gain-black-round-neck-half-sleeve-tshirt-design0500f234f069b7263966fe2a6bbb387b'),
(574, 194, 'zarvish-no-pain-no-gain-black-round-neck-half-sleeve-tshirt-bfaccfbe79e13cd4854d6cfc70efdee9f'),
(575, 195, 'zarvish-no-pain-no-gain-white-round-neck-half-sleeve-tshirt-fb772f8773638012ee6c952360afb5df0'),
(576, 195, 'zarvish-no-pain-no-gain-white-round-neck-half-sleeve-tshirt-design47cfc5dccae52d27d356f40a7155b952'),
(577, 195, 'zarvish-no-pain-no-gain-white-round-neck-half-sleeve-tshirt-full2b04a42c0ed0a1f5d3665084abfffd28'),
(578, 195, 'zarvish-no-pain-no-gain-white-round-neck-half-sleeve-tshirt-b238e35e00857f414875cc8407b4afdff'),
(583, 197, 'zarvish-no-pain-no-gain-navy-blue-round-neck-half-sleeve-tshirt-f7a67a23c7e8b8ef9a69fc1c0a23acb90'),
(584, 197, 'zarvish-no-pain-no-gain-navy-round-neck-half-sleeve-tshirt-fullb7adb3169ef7e2858fc25292fd7d26da'),
(585, 197, 'zarvish-no-pain-no-gain-navy-blue-round-neck-half-sleeve-tshirt-design7383ffef9da3b7be76d67e47aeb30d2b'),
(586, 197, 'zarvish-no-pain-no-gain-navy-blue-round-neck-half-sleeve-tshirt-b493d23d5f48770399ccb1b665c4fad17'),
(587, 198, 'zarvish-checked-mens-cotton-tshirt-fa9a30f1270935877084b8e73fd3a7b4e'),
(588, 198, 'zarvish-checked-mens-cotton-tshirt-checkedba22f8891fdbd653ce989751cd70a7df'),
(589, 198, 'zarvish-checked-mens-cotton-tshirt-b477ea9d3aeecbc334403acecc1a055a7'),
(590, 199, 'zarvish-stylish-cotton-mes-half-sleeve-tshirt9e54e40578a232747f02a0fb49e19e31'),
(593, 200, 'zarvish-stylish-cotton-mes-half-sleeve-tshirt-yellowc3cb72760dc0cd29db9509e7b3b1f84c'),
(596, 201, 'zarvish-tshirt-fa5b75c2b76f3f9d260a9c9b8f4d61c55'),
(614, 207, 'ms_1_512_16247685eeb913aa3086bfc2efe8ba7213ab96d'),
(615, 207, 'ms_1_512_1624770cb83e6b2cab4a8f478ed43f1a4bf0d7a'),
(616, 207, 'ms_1_512_1624766308693b1caf33578c1b729720d017bbd'),
(617, 208, 'ms_1_512_1624770d7a7d223d76aab6ecba83f7aaf08810e'),
(618, 208, 'ms_1_512_16247690e84a7580a78f73effc0d8ce9cf131cf'),
(619, 208, 'ms_1_512_16247682ca021ad7b45a549eae6516766139beb'),
(620, 209, 'ms_1_512_16247669c1c1c3d626827ca2f2e1b55752cbfcd'),
(621, 209, 'ms_1_512_1624769c44dfe66bbf44b4840d235b596f1b2e7'),
(622, 209, 'ms_1_512_1624768b02a4f9fdc53ca10ba495c03c7893d2e'),
(623, 210, 'ms_1_512_16247698e754b758f048d5f3c1d113e0f92f9cb'),
(624, 210, 'ms_1_512_1624768c6ba990192df0ed2c10c02d8e92c52e4'),
(625, 210, 'ms_1_512_1624770e40fb970451040426b1d7fbf48188dd0'),
(626, 211, 'ms_1_512_1566101809a9dbf00472b7efa399ab5068af3e1'),
(627, 211, 'ms_1_512_1566101-dddb5d786f17fa66dba56eef155aa7283'),
(628, 211, 'ms_1_512_1566102-blbe3aacef955e7245592c8f7e1a133728'),
(629, 212, 'ms_1_512_1566102-bl54d7df5251df0c250f04763f3f7146f7'),
(630, 212, 'ms_1_512_1566101-d7bf8d32997b697e245a2e0a397ad058e'),
(631, 212, 'ms_1_512_156610171b42eadf184f4bd73f85265b63c58a7'),
(632, 213, 'ms_1_512_1566114f00f5437f268e0f00bccdefe3764a4af'),
(633, 213, 'captain-america-s-shield-by-kiadas-d5jqvp8-cartoon-b9b500c346516912c512b003059451568'),
(634, 213, 'ms_1_512_1566105db205587d8499acba00ebb354e8b8042'),
(635, 214, 'ms_1_512_1566105e14d9f63fb3886ccfc6f0f4ca7bb8a34'),
(636, 214, 'captain-america-s-shield-by-kiadas-d5jqvp8-cartoond81b2cd0ccd3dab9fb0c01e06ab5dbe9'),
(637, 214, 'ms_1_512_15661146df08fe78511bac82151f1dba564999b'),
(641, 216, 'ms_1_512_156611061ac947c8375c11a6571f0e4e1072da5'),
(643, 216, 'ms_1_512_1566111031fbbc2235cc1addd9a724070f5f543'),
(644, 217, 'ms_1_512_1566111d67d011957e340b97d002882cd825444'),
(647, 218, 'ms_1_512_16568080ec1ce471f55fc77cdf67863a37a40cd'),
(650, 219, 'ms_1_512_165680974cfe6cf57117639a38c0fa09eaafe5c'),
(653, 220, 'ms_1_512_1567358f2241a58ea5cbf93123cb2b62c14cf31'),
(656, 221, 'ms_1_512_1567360c15c86e4d723ab6bb6271eccdd95c585'),
(659, 222, 'ms_1_512_15673532e583e42facdc4ccfbbfc94a72612f65'),
(662, 223, 'ms_1_512_15673560b4bb4d1216298ff34f8953e31314a71'),
(665, 224, 'ms_1_512_1567354ba0013911d7f1209234a9f7faf38b5a0'),
(669, 226, 'ms_1_512_47774296a2f6575e9b01661af27e42f7833260'),
(670, 227, 'ms_1_512_4777433e8ca2451682983175dafcc310d8b266'),
(671, 228, 'ms_1_512_477744dc63632b3e6ab3f5bbc7f4aa9e692a00'),
(672, 229, 'ms_1_512_4687067ff6cdc587e09fb91e9dd0b3934dc17b'),
(674, 231, 'ms_1_512_468705020ebc9ab1c71fc87eb6fbfb4acd63b8'),
(675, 232, 'ms_1_512_468707a3c260707f96ffcd58696fd0720ec11f'),
(676, 233, 'ms_1_512_468710d9ba76acb25d5a84c54372dbc9fb8be3'),
(677, 234, 'ms_1_512_46870818f4a6fbee20f2997fc9a099136c1c07'),
(678, 235, 'ms_1_512_468709390ec01f029cc82fc6004869a90c9114'),
(679, 236, 'ms_1_512_46871172a914d8974a70a0e50ce3c5503012ba'),
(680, 237, 'ms_1_512_468713f3ba31d784478b2f260c7f90d368d608'),
(681, 238, 'ms_1_512_156251684f842b2667ad6b6fe7ae5cf9b525e04'),
(682, 239, 'ms_1_512_1562510f70e11ca27a3d81bcaaf9afb338f739f'),
(683, 240, 'ms_1_512_1562518e44d2af862491eba76a65b862e89f49b'),
(684, 241, 'ms_1_512_1562512d50164accd639da66bcc6f29606aaf6d'),
(685, 242, 'ms_1_512_156251025566ba0584c266d24e1a931ab94a08f'),
(686, 243, 'ms_1_512_1562519dada87688f98aa7bdfb92dbe52bf258f'),
(687, 244, 'ms_1_512_156253057d7fd15e08034ef707c99b4915f7c7c'),
(688, 245, 'ms_1_512_1562527a94f72c7f05056d336d1d67de6a33267'),
(689, 246, 'ms_1_512_15625216796d8c876abe3a80a18c632653faf4e'),
(690, 247, 'ms_1_512_1562525685143dc73adc26c279fd6f926d27846'),
(691, 248, 'ms_1_512_166904084b8dcecae7de81cd89997c328bd876a'),
(692, 249, 'ms_1_512_1669039f8bda29b69c2653fffef1ec87ceffd4e'),
(693, 250, 'ms_1_512_1794471bcf1d1b10446e4150fbc11f66c46a089'),
(694, 251, 'ms_1_512_1794475fa2407aa4fa179fd1142fffdf9362c85'),
(695, 252, 'ms_1_512_17944735424ec59e714309c280a6f217152fc0b'),
(696, 253, 'ms_1_512_19376087e9c6ab263a774f3a195f921e9817440'),
(697, 254, 'ms_1_512_1937604b14ea17bc836575ad4976f3c531c4206'),
(698, 255, 'ms_1_512_193760541732e94ec66e1af448df2443a5930b3'),
(699, 256, 'ms_1_512_19376097492421bec3b35474fdd05fac2df01eb'),
(700, 257, 'ms_2_512_8842063a12abcd9d9dc5df98360a46699ed9c3'),
(701, 258, 'ms_1_512_168083607366ea0087d6418654b0b069994a929'),
(703, 260, 'ms_1_512_16808384bf93714a4a4fabe155d61f35b0e73b8'),
(704, 261, 'ms_1_512_1680835c93a63738f11ff2e1d0524b571a48035'),
(705, 262, 'ms_1_512_168083907329bfd97608296ca5d69567ebf45fd'),
(706, 263, 'ms_1_512_532598753d239e64bb9305805641be70cd9e21'),
(707, 264, 'ms_1_512_532600eb5c4d73ae33fc2728a58c44fc4bb56e'),
(708, 265, 'ms_1_512_532599960c51029ad2ed795305514c8b7b0c57'),
(709, 266, 'ms_1_512_1588393405bd85ac2357b1c1be23039067fb8b3'),
(710, 267, 'ms_1_512_1588395fca92c82c5f0ae66b7962e2ecb37f1c8'),
(711, 268, 'ms_1_512_15883943cff2592097c217adb6e2b56402598f2'),
(712, 269, 'ms_1_512_1588396fee4796bf4dcbefcedac1f51a0acc8dd'),
(713, 270, 'ms_1_512_42647063c08aa31010d79324a0fee1a2f6c6fc'),
(714, 271, 'ms_1_512_4264714edc6729d7fe3baecb40302ce494f992'),
(715, 272, 'ms_1_512_4264685767240f6ecc8f85b7dd10fcd0c8fc1a'),
(716, 273, 'ms_1_512_19376112e0c8179ce37b1010294e988b9d9527d'),
(717, 274, 'ms_2_512_884207eade3bf9aa80ffeda35660546aa0e69d'),
(718, 275, 'ms_1_512_2912533d4b5f5c361025712d90e0134d901bfc'),
(719, 275, 'ms_1_512_106899881360e4b0135a87fbdf1c9695f2f96c2'),
(720, 276, 'ms_1_512_1649917b55fcf9135b16e07cdd5b2e685baf237'),
(721, 277, 'ms_1_512_2912501b02f2a618819d0f087316c22e949240'),
(722, 277, 'ms_1_512_1649930b332d86bf00ea22e5e2621de6da1d0c6'),
(723, 278, 'ms_1_512_10690069dda4e878436d03b0f451596681a713a'),
(724, 279, 'ms_1_512_17055978b04b033c59df1d3b55dd1a6aaf0f58b'),
(725, 280, 'ms_1_512_17026149ee1978da035d235a624cb1b19a4352d'),
(726, 280, 'ms_1_512_1705598f9f7c1deb187f875e48532a8fa979618'),
(727, 281, 'ms_1_512_17944732d61c1ef0069400065c41d67b42e5607'),
(728, 282, 'ms_1_512_1794475e5eaeaf1ae51741678142e4d392d283c'),
(730, 284, 'ms_1_512_179447869fe706b9f669b776a15576533e4d48d'),
(731, 285, 'ms_1_512_20643323be6b278a61c866271d6ec6352e3c55'),
(734, 288, 'ms_1_512_2064348e3ae622a14238d4059d90f1b0966a20'),
(735, 289, 'ms_1_512_1816665aaa037f77fc56769f659a00f2c6ecff1'),
(736, 290, 'ms_1_512_442024c004ffc9949568963c250c5dba32cc09'),
(737, 291, 'ms_1_512_2164908a1833cbb4233ca2f1b9f6396e82a164');

-- --------------------------------------------------------

--
-- Table structure for table `products_size`
--

CREATE TABLE `products_size` (
  `size_id_no` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `size_name` varchar(2) NOT NULL,
  `size_qty` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_size`
--

INSERT INTO `products_size` (`size_id_no`, `product_id`, `size_name`, `size_qty`) VALUES
(1, 31, 'S', 2),
(2, 31, 'M', 10),
(3, 31, 'L', 10),
(4, 31, 'XL', 5),
(5, 32, 'M', 4),
(6, 32, 'L', 2),
(7, 33, 'S', 2),
(8, 33, 'M', 2),
(9, 33, 'L', 3),
(10, 33, 'XL', 4),
(11, 34, 'S', 2),
(12, 34, 'M', 2),
(13, 34, 'L', 3),
(14, 34, 'XL', 2),
(15, 35, 'S', 2),
(16, 35, 'M', 3),
(17, 35, 'L', 1),
(18, 35, 'XL', 4),
(19, 36, 'S', 2),
(20, 36, 'M', 3),
(21, 36, 'L', 2),
(22, 36, 'XL', 1),
(23, 37, 'S', 2),
(24, 37, 'M', 2),
(25, 37, 'L', 2),
(26, 37, 'XL', 2),
(27, 38, 'S', 2),
(28, 38, 'M', 2),
(29, 38, 'L', 3),
(30, 38, 'XL', 1),
(31, 39, 'S', 2),
(32, 39, 'M', 2),
(33, 39, 'L', 2),
(34, 39, 'XL', 2),
(35, 40, 'S', 2),
(36, 40, 'M', 2),
(37, 40, 'L', 2),
(38, 40, 'XL', 2),
(39, 41, 'S', 2),
(40, 41, 'M', 2),
(41, 41, 'L', 2),
(42, 41, 'XL', 2),
(43, 42, 'S', 1),
(44, 42, 'M', 2),
(45, 42, 'L', 2),
(46, 42, 'XL', 2),
(47, 43, 'S', 1),
(48, 43, 'M', 1),
(49, 43, 'L', 1),
(50, 43, 'XL', 2),
(51, 44, 'S', 2),
(52, 44, 'M', 2),
(53, 44, 'L', 2),
(54, 44, 'XL', 2),
(55, 45, 'S', 1),
(56, 45, 'M', 5),
(57, 45, 'L', 2),
(58, 45, 'XL', 1),
(59, 46, 'S', 2),
(60, 46, 'M', 2),
(61, 46, 'L', 2),
(62, 46, 'Xl', 2),
(63, 47, 'S', 2),
(64, 47, 'M', 2),
(65, 47, 'L', 2),
(66, 47, 'XL', 2),
(67, 48, 'S', 2),
(68, 48, 'M', 2),
(69, 48, 'L', 2),
(70, 48, 'XL', 2),
(71, 49, 'S', 2),
(72, 49, 'M', 2),
(73, 49, 'L', 2),
(74, 49, 'XL', 2),
(75, 50, 'S', 2),
(76, 50, 'M', 2),
(77, 50, 'L', 2),
(78, 50, 'XL', 2),
(79, 51, 'S', 2),
(80, 51, 'M', 2),
(81, 51, 'L', 2),
(82, 51, 'XL', 2),
(83, 52, 'S', 2),
(84, 52, 'M', 2),
(85, 52, 'L', 2),
(86, 52, 'XL', 2),
(87, 53, 'S', 2),
(88, 53, 'M', 2),
(89, 53, 'L', 2),
(90, 53, 'XL', 2),
(91, 54, 'S', 2),
(92, 54, 'M', 2),
(93, 54, 'L', 2),
(94, 54, 'XL', 2),
(95, 55, 'S', 2),
(96, 55, 'M', 2),
(97, 55, 'L', 2),
(98, 55, 'XL', 2),
(99, 56, 'S', 2),
(100, 56, 'M', 2),
(101, 56, 'L', 2),
(102, 56, 'XL', 2),
(103, 57, 'S', 2),
(104, 57, 'M', 2),
(105, 57, 'L', 2),
(106, 57, 'XL', 2),
(107, 58, 'M', 2),
(108, 58, 'L', 2),
(109, 58, 'Xl', 2),
(110, 59, 'S', 2),
(111, 59, 'M', 2),
(112, 59, 'L', 2),
(113, 59, 'Xl', 2),
(114, 60, 'S', 2),
(115, 60, 'M', 2),
(116, 60, 'L', 3),
(117, 60, 'XL', 2),
(118, 61, 'S', 2),
(119, 61, 'M', 2),
(120, 61, 'L', 2),
(121, 61, 'XL', 2),
(122, 62, 'S', 2),
(123, 62, 'M', 2),
(124, 62, 'L', 2),
(125, 62, 'XL', 2),
(126, 63, 'S', 2),
(127, 63, 'M', 2),
(128, 63, 'L', 2),
(129, 63, 'XL', 2),
(130, 64, 'M', 2),
(131, 64, 'L', 2),
(132, 64, 'XL', 2),
(133, 65, 'M', 2),
(134, 65, 'L', 2),
(135, 65, 'XL', 2),
(136, 66, 'M', 2),
(137, 66, 'L', 2),
(138, 66, 'XL', 2),
(139, 67, 'S', 2),
(140, 67, 'M', 2),
(141, 67, 'L', 2),
(142, 67, 'XL', 2),
(143, 68, 'M', 2),
(144, 68, 'L', 2),
(145, 68, 'XL', 2),
(146, 69, 'M', 2),
(147, 69, 'L', 2),
(148, 69, 'XL', 2),
(149, 70, 'M', 2),
(150, 70, 'L', 2),
(151, 70, 'XL', 2),
(152, 71, 'M', 2),
(153, 71, 'L', 2),
(154, 71, 'XL', 2),
(155, 72, 'M', 2),
(156, 72, 'L', 2),
(157, 72, 'XL', 2),
(158, 73, 'S', 2),
(159, 73, 'M', 2),
(160, 73, 'L', 2),
(161, 73, 'XL', 2),
(162, 74, 'M', 2),
(163, 74, 'L', 2),
(164, 74, 'XL', 2),
(165, 75, 'M', 2),
(166, 75, 'L', 2),
(167, 75, 'XL', 2),
(168, 76, 'M', 2),
(169, 76, 'L', 2),
(170, 76, 'XL', 2),
(171, 77, 'S', 2),
(172, 77, 'M', 2),
(173, 77, 'L', 2),
(174, 77, 'XL', 2),
(175, 78, 'M', 2),
(176, 78, 'L', 2),
(177, 78, 'XL', 2),
(178, 79, 'M', 2),
(179, 79, 'L', 2),
(180, 79, 'XL', 2),
(181, 80, 'L', 3),
(182, 81, 'L', 2),
(183, 82, 'M', 2),
(184, 82, 'L', 2),
(185, 82, 'XL', 2),
(186, 83, 'M', 2),
(187, 83, 'L', 2),
(188, 83, 'XL', 2),
(189, 84, 'M', 2),
(190, 84, 'L', 2),
(191, 84, 'XL', 2),
(192, 85, 'M', 2),
(193, 85, 'L', 2),
(194, 85, 'XL', 2),
(195, 86, 'M', 2),
(196, 86, 'L', 2),
(197, 86, 'XL', 2),
(198, 87, 'M', 1),
(199, 87, 'L', 2),
(200, 87, 'XL', 2),
(201, 88, 'M', 1),
(202, 88, 'L', 2),
(203, 88, 'XL', 2),
(204, 89, 'M', 1),
(205, 89, 'L', 2),
(206, 89, 'XL', 2),
(207, 90, 'M', 1),
(208, 90, 'L', 2),
(209, 90, 'XL', 2),
(210, 91, 'M', 1),
(211, 91, 'L', 2),
(212, 91, 'XL', 2),
(213, 92, 'M', 1),
(214, 92, 'L', 2),
(215, 92, 'XL', 2),
(216, 93, 'M', 1),
(217, 93, 'L', 2),
(218, 93, 'XL', 2),
(219, 94, 'M', 1),
(220, 94, 'L', 2),
(221, 94, 'XL', 2),
(222, 95, 'M', 1),
(223, 95, 'L', 2),
(224, 95, 'XL', 2),
(225, 96, 'M', 1),
(226, 96, 'L', 1),
(227, 96, 'XL', 1),
(228, 96, 'M', 1),
(229, 96, 'L', 1),
(230, 96, 'XL', 1),
(231, 97, 'M', 1),
(232, 97, 'L', 1),
(233, 97, 'XL', 1),
(234, 98, 'M', 1),
(235, 98, 'L', 2),
(236, 98, 'XL', 2),
(237, 99, 'M', 1),
(238, 99, 'L', 1),
(239, 99, 'XL', 1),
(240, 100, 'M', 1),
(241, 100, 'L', 1),
(242, 100, 'XL', 1),
(243, 101, 'M', 1),
(244, 101, 'L', 1),
(245, 101, 'XL', 1),
(246, 102, 'M', 1),
(247, 102, 'L', 2),
(248, 102, 'XL', 2),
(249, 103, 'M', 1),
(250, 103, 'L', 2),
(251, 103, 'XL', 2),
(252, 104, 'M', 1),
(253, 104, 'L', 1),
(254, 104, 'XL', 1),
(255, 105, 'M', 1),
(256, 105, 'L', 1),
(257, 105, 'XL', 1),
(258, 106, 'M', 1),
(259, 106, 'L', 2),
(260, 106, 'XL', 2),
(261, 107, 'M', 1),
(262, 107, 'L', 1),
(263, 107, 'XL', 1),
(264, 108, 'M', 1),
(265, 108, 'L', 2),
(266, 108, 'XL', 2),
(267, 109, 'M', 1),
(268, 109, 'L', 2),
(269, 109, 'XL', 2),
(270, 110, 'M', 1),
(271, 110, 'L', 1),
(272, 110, 'XL', 1),
(273, 111, 'M', 1),
(274, 111, 'L', 1),
(275, 111, 'XL', 1),
(276, 112, 'M', 1),
(277, 112, 'L', 2),
(278, 112, 'XL', 2),
(279, 113, 'M', 1),
(280, 113, 'L', 2),
(281, 113, 'XL', 2),
(282, 114, 'M', 1),
(283, 114, 'L', 2),
(284, 114, 'XL', 2),
(285, 115, 'M', 1),
(286, 115, 'L', 2),
(287, 115, 'XL', 2),
(288, 116, 'M', 1),
(289, 116, 'L', 2),
(290, 116, 'XL', 2),
(291, 117, 'M', 1),
(292, 117, 'L', 2),
(293, 117, 'XL', 2),
(294, 118, 'M', 1),
(295, 118, 'L', 1),
(296, 118, 'XL', 1),
(297, 119, 'M', 1),
(298, 119, 'L', 1),
(299, 119, 'XL', 1),
(300, 120, 'M', 1),
(301, 120, 'L', 1),
(302, 120, 'XL', 2),
(303, 121, 'M', 1),
(304, 121, 'L', 2),
(305, 121, 'XL', 2),
(306, 122, 'M', 1),
(307, 122, 'L', 2),
(308, 122, 'XL', 2),
(309, 123, 'M', 1),
(310, 123, 'L', 1),
(311, 123, 'XL', 1),
(312, 124, 'M', 1),
(313, 124, 'L', 1),
(314, 124, 'XL', 1),
(315, 125, 'M', 1),
(316, 125, 'L', 1),
(317, 125, 'XL', 1),
(318, 126, 'M', 1),
(319, 126, 'L', 1),
(320, 126, 'XL', 1),
(321, 127, 'M', 1),
(322, 127, 'L', 1),
(323, 127, 'XL', 1),
(324, 128, 'M', 1),
(325, 128, 'L', 1),
(326, 128, 'XL', 1),
(327, 129, 'M', 1),
(328, 129, 'L', 1),
(329, 129, 'XL', 1),
(330, 130, 'M', 1),
(331, 130, 'L', 2),
(332, 130, 'XL', 2),
(333, 131, 'M', 1),
(334, 131, 'L', 2),
(335, 131, 'XL', 2),
(336, 132, 'M', 1),
(337, 132, 'L', 1),
(338, 132, 'XL', 1),
(339, 133, 'M', 1),
(340, 133, 'L', 1),
(341, 133, 'XL', 1),
(342, 134, 'M', 1),
(343, 134, 'L', 1),
(344, 134, 'XL', 1),
(345, 135, 'M', 1),
(346, 135, 'L', 2),
(347, 135, 'XL', 2),
(348, 136, 'S', 2),
(349, 136, 'M', 2),
(350, 136, 'L', 2),
(351, 136, 'XL', 2),
(352, 137, 'S', 2),
(353, 137, 'M', 2),
(354, 137, 'L', 2),
(355, 137, 'XL', 2),
(356, 138, 'S', 2),
(357, 138, 'M', 2),
(358, 138, 'L', 2),
(359, 138, 'XL', 2),
(360, 139, 'S', 2),
(361, 139, 'M', 2),
(362, 139, 'L', 2),
(363, 139, 'XL', 2),
(364, 140, 'S', 2),
(365, 140, 'M', 2),
(366, 140, 'L', 2),
(367, 140, 'XL', 2),
(368, 141, 'S', 2),
(369, 141, 'M', 2),
(370, 141, 'L', 2),
(371, 141, 'XL', 2),
(372, 142, 'S', 2),
(373, 142, 'M', 2),
(374, 142, 'L', 2),
(375, 142, 'XL', 2),
(376, 143, 'S', 2),
(377, 143, 'M', 2),
(378, 143, 'L', 2),
(379, 143, 'XL', 2),
(380, 144, 'S', 2),
(381, 144, 'M', 2),
(382, 144, 'L', 2),
(383, 144, 'XL', 2),
(384, 145, 'S', 2),
(385, 145, 'M', 2),
(386, 145, 'L', 2),
(387, 145, 'XL', 2),
(388, 146, 'S', 2),
(389, 146, 'M', 2),
(390, 146, 'L', 2),
(391, 146, 'XL', 2),
(392, 147, 'S', 2),
(393, 147, 'M', 2),
(394, 147, 'L', 2),
(395, 147, 'XL', 2),
(396, 148, 'S', 2),
(397, 148, 'M', 2),
(398, 148, 'L', 2),
(399, 148, 'XL', 2),
(400, 149, 'S', 2),
(401, 149, 'M', 2),
(402, 149, 'L', 2),
(403, 149, 'XL', 2),
(404, 150, 'S', 1),
(405, 150, 'M', 2),
(406, 150, 'L', 2),
(407, 150, 'XL', 2),
(408, 151, 'S', 2),
(409, 151, 'M', 2),
(410, 151, 'L', 2),
(411, 151, 'XL', 2),
(412, 152, 'S', 2),
(413, 152, 'M', 2),
(414, 152, 'L', 2),
(415, 152, 'XL', 2),
(416, 153, 'S', 2),
(417, 153, 'M', 2),
(418, 153, 'L', 2),
(419, 153, 'XL', 2),
(420, 154, 'S', 2),
(421, 154, 'M', 2),
(422, 154, 'L', 2),
(423, 154, 'XL', 2),
(424, 155, 'S', 2),
(425, 155, 'M', 2),
(426, 155, 'L', 2),
(427, 155, 'XL', 2),
(428, 156, 'S', 2),
(429, 156, 'M', 2),
(430, 156, 'L', 2),
(431, 156, 'XL', 2),
(432, 157, 'S', 2),
(433, 157, 'M', 2),
(434, 157, 'L', 2),
(435, 157, 'XL', 2),
(436, 158, 'S', 2),
(437, 158, 'M', 2),
(438, 158, 'L', 2),
(439, 158, 'XL', 2),
(440, 159, 'S', 2),
(441, 159, 'M', 2),
(442, 159, 'L', 2),
(443, 159, 'XL', 2),
(444, 160, 'S', 2),
(445, 160, 'M', 2),
(446, 160, 'L', 2),
(447, 160, 'XL', 2),
(448, 161, 'S', 2),
(449, 161, 'M', 2),
(450, 161, 'L', 2),
(451, 161, 'XL', 2),
(452, 162, 'S', 2),
(453, 162, 'M', 2),
(454, 162, 'L', 2),
(455, 162, 'Xl', 2),
(456, 163, 'S', 2),
(457, 163, 'M', 2),
(458, 163, 'L', 2),
(459, 163, 'Xl', 2),
(460, 164, 'S', 2),
(461, 164, 'M', 2),
(462, 164, 'L', 2),
(463, 164, 'XL', 2),
(464, 165, 'S', 2),
(465, 165, 'M', 2),
(466, 165, 'L', 2),
(467, 165, 'XL', 2),
(468, 166, 'S', 2),
(469, 166, 'M', 2),
(470, 166, 'L', 2),
(471, 166, 'XL', 2),
(472, 167, 'S', 2),
(473, 167, 'M', 2),
(474, 167, 'L', 2),
(475, 167, 'XL', 2),
(476, 168, 'S', 2),
(477, 168, 'M', 2),
(478, 168, 'L', 2),
(479, 168, 'XL', 2),
(480, 169, 'S', 2),
(481, 169, 'M', 2),
(482, 169, 'L', 2),
(483, 169, 'Xl', 2),
(484, 170, 'S', 2),
(485, 170, 'M', 2),
(486, 170, 'L', 2),
(487, 170, 'XL', 2),
(488, 171, 'S', 2),
(489, 171, 'M', 2),
(490, 171, 'L', 2),
(491, 171, 'XL', 2),
(492, 172, 'S', 5),
(493, 172, 'M', 5),
(494, 172, 'L', 5),
(495, 172, 'XL', 5),
(496, 173, 'S', 5),
(497, 174, 'S', 5),
(498, 174, 'M', 5),
(499, 174, 'L', 5),
(500, 174, 'XL', 5),
(501, 175, 'S', 5),
(502, 175, 'M', 5),
(503, 175, 'L', 5),
(504, 175, 'XL', 5),
(505, 176, 'S', 5),
(506, 176, 'M', 5),
(507, 176, 'L', 5),
(508, 176, 'XL', 5),
(509, 177, 'S', 5),
(510, 177, 'M', 5),
(511, 177, 'L', 5),
(512, 177, 'XL', 5),
(513, 178, 'S', 5),
(514, 178, 'M', 5),
(515, 178, 'L', 5),
(516, 178, 'XL', 5),
(517, 179, 'S', 5),
(518, 179, 'M', 5),
(519, 179, 'L', 5),
(520, 179, 'XL', 5),
(521, 180, 'S', 5),
(522, 180, 'M', 5),
(523, 180, 'L', 5),
(524, 180, 'XL', 5),
(525, 181, 'S', 5),
(526, 181, 'M', 5),
(527, 181, 'L', 5),
(528, 181, 'XL', 5),
(529, 182, 'S', 5),
(530, 183, 'S', 5),
(531, 183, 'M', 5),
(532, 183, 'L', 5),
(533, 183, 'XL', 5),
(534, 184, 'S', 5),
(535, 184, 'M', 5),
(536, 184, 'L', 5),
(537, 184, 'XL', 5),
(538, 185, 'S', 5),
(539, 185, 'M', 5),
(540, 185, 'L', 5),
(541, 185, 'XL', 5),
(542, 186, 'S', 2),
(543, 186, 'M', 2),
(544, 186, 'L', 2),
(545, 186, 'XL', 2),
(546, 187, 'S', 5),
(547, 187, 'M', 5),
(548, 187, 'L', 5),
(549, 187, 'XL', 5),
(550, 188, 'S', 5),
(551, 188, 'M', 5),
(552, 188, 'L', 5),
(553, 188, 'XL', 5),
(554, 189, 'S', 5),
(555, 189, 'M', 5),
(556, 189, 'L', 5),
(557, 189, 'XL', 5),
(558, 190, 'S', 5),
(559, 190, 'M', 5),
(560, 190, 'L', 5),
(561, 190, 'XL', 5),
(562, 191, 'S', 5),
(563, 191, 'M', 5),
(564, 191, 'L', 5),
(565, 191, 'XL', 5),
(566, 192, 'S', 5),
(567, 192, 'M', 5),
(568, 192, 'L', 5),
(569, 192, 'XL', 5),
(570, 193, 'S', 2),
(571, 193, 'M', 2),
(572, 193, 'L', 2),
(573, 193, 'Xl', 2),
(574, 194, 'S', 2),
(575, 194, 'M', 2),
(576, 194, 'L', 2),
(577, 194, 'XL', 2),
(578, 195, 'S', 2),
(579, 195, 'M', 2),
(580, 195, 'L', 2),
(581, 195, 'XL', 2),
(582, 196, 'S', 2),
(583, 196, 'M', 2),
(584, 196, 'L', 2),
(585, 196, 'XL', 2),
(586, 197, 'S', 2),
(587, 197, 'M', 2),
(588, 197, 'L', 2),
(589, 197, 'Xl', 2),
(590, 198, 'M', 2),
(591, 198, 'L', 2),
(592, 198, 'XL', 2),
(593, 199, 'S', 2),
(594, 199, 'M', 2),
(595, 199, 'L', 2),
(596, 199, 'XL', 2),
(597, 200, 'S', 2),
(598, 200, 'M', 2),
(599, 200, 'L', 2),
(600, 200, 'XL', 2),
(601, 201, 'S', 2),
(602, 201, 'M', 2),
(603, 201, 'L', 2),
(604, 201, 'XL', 2),
(605, 202, 'S', 10),
(606, 202, 'M', 10),
(607, 202, 'L', 10),
(608, 202, 'XL', 10),
(609, 203, 'S', 10),
(610, 203, 'M', 10),
(611, 203, 'L', 10),
(612, 203, 'XL', 10),
(613, 204, 'S', 10),
(614, 205, 'S', 10),
(615, 205, 'M', 10),
(616, 205, 'L', 10),
(617, 205, 'XL', 10),
(618, 206, 'S', 10),
(619, 206, 'M', 10),
(620, 206, 'L', 10),
(621, 206, 'XL', 10),
(622, 207, 'S', 10),
(623, 207, 'M', 10),
(624, 207, 'L', 10),
(625, 207, 'XL', 10),
(626, 208, 'S', 10),
(627, 208, 'M', 10),
(628, 208, 'L', 10),
(629, 208, 'XL', 10),
(630, 209, 'S', 10),
(631, 209, 'M', 10),
(632, 209, 'L', 10),
(633, 209, 'XL', 10),
(634, 210, 'S', 10),
(635, 210, 'M', 10),
(636, 210, 'L', 10),
(637, 210, 'XL', 10),
(638, 211, 'S', 10),
(639, 211, 'M', 10),
(640, 211, 'L', 10),
(641, 211, 'XL', 10),
(642, 212, 'S', 10),
(643, 212, 'M', 10),
(644, 212, 'L', 10),
(645, 212, 'XL', 10),
(646, 213, 'S', 10),
(647, 213, 'M', 10),
(648, 213, 'L', 10),
(649, 213, 'XL', 10),
(650, 214, 'S', 10),
(651, 214, 'M', 10),
(652, 214, 'L', 10),
(653, 214, 'XL', 10),
(654, 215, 'S', 10),
(655, 215, 'M', 10),
(656, 215, 'L', 10),
(657, 215, 'XL', 10),
(658, 216, 'S', 10),
(659, 216, 'M', 10),
(660, 216, 'L', 10),
(661, 216, 'XL', 10),
(662, 217, 'M', 10),
(663, 217, 'L', 10),
(664, 217, 'XL', 10),
(665, 218, 'S', 0),
(666, 218, 'M', 10),
(667, 218, 'L', 10),
(668, 218, 'XL', 10),
(669, 219, 'S', 0),
(670, 219, 'M', 10),
(671, 219, 'L', 10),
(672, 219, 'XL', 10),
(673, 220, 'S', 10),
(674, 220, 'M', 10),
(675, 220, 'L', 10),
(676, 220, 'XL', 10),
(677, 221, 'S', 10),
(678, 221, 'M', 10),
(679, 221, 'L', 10),
(680, 221, 'XL', 10),
(681, 222, 'S', 10),
(682, 222, 'M', 10),
(683, 222, 'L', 10),
(684, 222, 'XL', 10),
(685, 223, 'S', 10),
(686, 223, 'M', 10),
(687, 223, 'L', 10),
(688, 223, 'XL', 10),
(689, 224, 'S', 10),
(690, 224, 'M', 10),
(691, 224, 'L', 10),
(692, 224, 'XL', 10),
(693, 226, 'S', 10),
(694, 226, 'M', 10),
(695, 226, 'L', 10),
(696, 226, 'XL', 10),
(697, 227, 'S', 10),
(698, 227, 'M', 10),
(699, 227, 'L', 10),
(700, 227, 'XL', 10),
(701, 228, 'S', 10),
(702, 228, 'M', 10),
(703, 228, 'L', 10),
(704, 228, 'XL', 10),
(705, 229, 'M', 10),
(706, 229, 'L', 10),
(707, 229, 'XL', 10),
(708, 230, 'M', 10),
(709, 230, 'L', 10),
(710, 230, 'XL', 10),
(711, 231, 'M', 10),
(712, 231, 'L', 10),
(713, 231, 'XL', 10),
(714, 232, 'M', 10),
(715, 232, 'L', 10),
(716, 232, 'XL', 10),
(717, 233, 'M', 10),
(718, 233, 'L', 10),
(719, 233, 'XL', 10),
(720, 234, 'M', 10),
(721, 234, 'L', 10),
(722, 234, 'XL', 10),
(723, 235, 'M', 10),
(724, 235, 'L', 10),
(725, 235, 'XL', 10),
(726, 236, 'M', 10),
(727, 236, 'L', 10),
(728, 236, 'XL', 10),
(729, 237, 'M', 10),
(730, 237, 'L', 10),
(731, 237, 'XL', 10),
(732, 238, 'M', 10),
(733, 238, 'L', 10),
(734, 238, 'XL', 10),
(735, 239, 'M', 10),
(736, 239, 'L', 10),
(737, 239, 'XL', 10),
(738, 240, 'M', 10),
(739, 240, 'L', 10),
(740, 240, 'XL', 10),
(741, 241, 'M', 10),
(742, 241, 'L', 10),
(743, 241, 'XL', 10),
(744, 242, 'M', 10),
(745, 242, 'L', 10),
(746, 242, 'XL', 10),
(747, 243, 'M', 10),
(748, 243, 'L', 10),
(749, 243, 'XL', 10),
(750, 244, 'M', 10),
(751, 244, 'L', 10),
(752, 244, 'XL', 10),
(753, 245, 'M', 10),
(754, 245, 'L', 10),
(755, 245, 'XL', 10),
(756, 246, 'M', 10),
(757, 246, 'L', 10),
(758, 246, 'XL', 10),
(759, 247, 'M', 10),
(760, 247, 'L', 10),
(761, 247, 'XL', 10),
(762, 248, 'S', 10),
(763, 248, 'M', 10),
(764, 248, 'L', 10),
(765, 248, 'XL', 10),
(766, 249, 'S', 10),
(767, 249, 'M', 10),
(768, 249, 'L', 10),
(769, 249, 'XL', 10),
(770, 250, 'S', 10),
(771, 250, 'M', 10),
(772, 250, 'L', 10),
(773, 250, 'XL', 10),
(774, 251, 'S', 10),
(775, 251, 'M', 10),
(776, 251, 'L', 10),
(777, 251, 'XL', 10),
(778, 252, 'S', 10),
(779, 252, 'M', 10),
(780, 252, 'L', 10),
(781, 252, 'XL', 10),
(782, 253, 'S', 10),
(783, 253, 'M', 10),
(784, 253, 'L', 10),
(785, 253, 'XL', 10),
(786, 254, 'S', 10),
(787, 254, 'M', 10),
(788, 254, 'L', 10),
(789, 254, 'XL', 10),
(790, 255, 'S', 10),
(791, 255, 'M', 10),
(792, 255, 'L', 10),
(793, 255, 'XL', 10),
(794, 256, 'M', 10),
(795, 256, 'L', 10),
(796, 256, 'XL', 10),
(797, 257, 'M', 10),
(798, 257, 'L', 10),
(799, 257, 'XL', 10),
(800, 258, 'S', 10),
(801, 258, 'M', 10),
(802, 258, 'L', 10),
(803, 258, 'XL', 10),
(804, 259, 'S', 10),
(805, 259, 'M', 10),
(806, 259, 'L', 10),
(807, 259, 'XL', 10),
(808, 260, 'S', 10),
(809, 260, 'M', 10),
(810, 260, 'L', 10),
(811, 260, 'XL', 10),
(812, 261, 'S', 10),
(813, 261, 'M', 10),
(814, 261, 'L', 10),
(815, 261, 'XL', 10),
(816, 262, 'S', 10),
(817, 262, 'M', 10),
(818, 262, 'L', 10),
(819, 262, 'XL', 10),
(820, 263, 'M', 10),
(821, 263, 'L', 10),
(822, 263, 'XL', 10),
(823, 264, 'M', 10),
(824, 264, 'L', 10),
(825, 264, 'XL', 10),
(826, 265, 'M', 10),
(827, 265, 'L', 10),
(828, 265, 'XL', 10),
(829, 266, 'S', 10),
(830, 266, 'M', 10),
(831, 266, 'L', 10),
(832, 266, 'XL', 10),
(833, 267, 'S', 10),
(834, 267, 'M', 10),
(835, 267, 'L', 10),
(836, 267, 'XL', 10),
(837, 268, 'S', 10),
(838, 268, 'M', 10),
(839, 268, 'L', 10),
(840, 268, 'XL', 10),
(841, 269, 'S', 10),
(842, 269, 'M', 10),
(843, 269, 'L', 10),
(844, 269, 'XL', 10),
(845, 270, 'S', 10),
(846, 270, 'M', 10),
(847, 270, 'L', 10),
(848, 270, 'XL', 10),
(849, 271, 'S', 10),
(850, 271, 'M', 10),
(851, 271, 'L', 10),
(852, 271, 'XL', 10),
(853, 272, 'S', 10),
(854, 272, 'M', 10),
(855, 272, 'L', 10),
(856, 272, 'XL', 10),
(857, 273, 'S', 10),
(858, 273, 'M', 10),
(859, 273, 'L', 10),
(860, 273, 'XL', 10),
(861, 274, 'S', 10),
(862, 274, 'M', 10),
(863, 274, 'L', 10),
(864, 274, 'XL', 10),
(865, 275, 'S', 10),
(866, 275, 'M', 10),
(867, 275, 'L', 10),
(868, 275, 'XL', 10),
(869, 276, 'S', 10),
(870, 276, 'M', 10),
(871, 276, 'L', 10),
(872, 276, 'XL', 10),
(873, 277, 'S', 10),
(874, 277, 'M', 10),
(875, 277, 'L', 10),
(876, 277, 'XL', 10),
(877, 278, 'S', 10),
(878, 278, 'M', 10),
(879, 278, 'L', 10),
(880, 278, 'XL', 10),
(881, 279, 'M', 10),
(882, 279, 'L', 10),
(883, 279, 'XL', 10),
(884, 280, 'M', 10),
(885, 280, 'L', 10),
(886, 280, 'XL', 10),
(887, 281, 'S', 10),
(888, 281, 'M', 10),
(889, 281, 'L', 10),
(890, 281, 'XL', 10),
(891, 282, 'S', 10),
(892, 282, 'M', 10),
(893, 282, 'L', 10),
(894, 282, 'XL', 10),
(895, 283, 'S', 10),
(896, 283, 'M', 10),
(897, 283, 'L', 10),
(898, 283, 'XL', 10),
(899, 284, 'S', 10),
(900, 284, 'M', 10),
(901, 284, 'L', 10),
(902, 284, 'XL', 10),
(903, 285, 'S', 10),
(904, 285, 'M', 10),
(905, 285, 'L', 10),
(906, 285, 'XL', 10),
(907, 286, 'S', 10),
(908, 286, 'M', 10),
(909, 286, 'L', 10),
(910, 286, 'XL', 10),
(911, 287, 'S', 10),
(912, 287, 'M', 10),
(913, 287, 'L', 10),
(914, 287, 'XL', 10),
(915, 288, 'S', 10),
(916, 288, 'M', 10),
(917, 288, 'L', 10),
(918, 288, 'XL', 10),
(919, 289, 'M', 10),
(920, 289, 'L', 10),
(921, 289, 'XL', 10),
(922, 290, 'S', 10),
(923, 290, 'M', 10),
(924, 290, 'L', 10),
(925, 290, 'XL', 10),
(926, 291, 'S', 10),
(927, 291, 'M', 10),
(928, 291, 'L', 10),
(929, 291, 'XL', 10);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `product_category_id` int(2) NOT NULL,
  `product_category_name` varchar(100) NOT NULL,
  `gender_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`product_category_id`, `product_category_name`, `gender_id`) VALUES
(1, 'T-SHIRT', 1),
(2, 'Top', 2),
(3, 'Child', 3),
(4, 'Wrist Watch', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_labels`
--

CREATE TABLE `product_labels` (
  `product_label_id` int(2) NOT NULL,
  `product_label_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_labels`
--

INSERT INTO `product_labels` (`product_label_id`, `product_label_name`) VALUES
(1, 'New'),
(2, 'Out of stock'),
(3, 'Sale');

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `seller_id` int(10) NOT NULL,
  `seller_name` varchar(100) NOT NULL,
  `seller_email` varchar(255) NOT NULL,
  `seller_email_password` text NOT NULL,
  `seller_phone` varchar(12) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `size_id` int(2) NOT NULL,
  `size_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`size_id`, `size_name`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L'),
(4, 'XL'),
(5, 'XXL'),
(6, 'XXXL'),
(7, '28'),
(8, '30'),
(9, '32'),
(10, '34'),
(11, '36'),
(12, '38');

-- --------------------------------------------------------

--
-- Table structure for table `state_list`
--

CREATE TABLE `state_list` (
  `state_id` int(2) NOT NULL,
  `state_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state_list`
--

INSERT INTO `state_list` (`state_id`, `state_name`) VALUES
(1, 'MADHYA PRADESH'),
(2, 'UTTAR PRADESH'),
(3, 'Delhi'),
(4, 'Bihar'),
(5, 'Chhattisgarh'),
(6, 'Haryana'),
(7, 'Rajasthan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bulk_lead`
--
ALTER TABLE `bulk_lead`
  ADD PRIMARY KEY (`bulk_lead_id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`color_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`gender_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_address`
--
ALTER TABLE `order_address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `payment_types`
--
ALTER TABLE `payment_types`
  ADD PRIMARY KEY (`payment_type_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `products_genders_gender_id_fk` (`product_gender_id`),
  ADD KEY `products_product_categories_product_category_id_fk` (`product_category_id`),
  ADD KEY `products_product_labels_product_label_id_fk` (`product_label`);

--
-- Indexes for table `products_color`
--
ALTER TABLE `products_color`
  ADD PRIMARY KEY (`product_color_id_no`),
  ADD KEY `products_color_colors_fk` (`color_id`);

--
-- Indexes for table `products_description`
--
ALTER TABLE `products_description`
  ADD PRIMARY KEY (`product_description_id`),
  ADD KEY `products_description_products_product_id_fk` (`product_id`);

--
-- Indexes for table `products_image`
--
ALTER TABLE `products_image`
  ADD PRIMARY KEY (`product_image_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products_size`
--
ALTER TABLE `products_size`
  ADD PRIMARY KEY (`size_id_no`),
  ADD KEY `products_size_sizes_size_name_fk` (`size_name`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`product_category_id`),
  ADD KEY `gender_id` (`gender_id`);

--
-- Indexes for table `product_labels`
--
ALTER TABLE `product_labels`
  ADD PRIMARY KEY (`product_label_id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`seller_id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`size_id`);

--
-- Indexes for table `state_list`
--
ALTER TABLE `state_list`
  ADD PRIMARY KEY (`state_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bulk_lead`
--
ALTER TABLE `bulk_lead`
  MODIFY `bulk_lead_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `color_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `genders`
--
ALTER TABLE `genders`
  MODIFY `gender_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `order_address`
--
ALTER TABLE `order_address`
  MODIFY `address_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `payment_types`
--
ALTER TABLE `payment_types`
  MODIFY `payment_type_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=292;

--
-- AUTO_INCREMENT for table `products_color`
--
ALTER TABLE `products_color`
  MODIFY `product_color_id_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products_description`
--
ALTER TABLE `products_description`
  MODIFY `product_description_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products_image`
--
ALTER TABLE `products_image`
  MODIFY `product_image_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=738;

--
-- AUTO_INCREMENT for table `products_size`
--
ALTER TABLE `products_size`
  MODIFY `size_id_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=930;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `product_category_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_labels`
--
ALTER TABLE `product_labels`
  MODIFY `product_label_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `seller_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `size_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `state_list`
--
ALTER TABLE `state_list`
  MODIFY `state_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_genders_gender_id_fk` FOREIGN KEY (`product_gender_id`) REFERENCES `genders` (`gender_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_product_categories_product_category_id_fk` FOREIGN KEY (`product_category_id`) REFERENCES `product_categories` (`product_category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_product_labels_product_label_id_fk` FOREIGN KEY (`product_label`) REFERENCES `product_labels` (`product_label_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products_color`
--
ALTER TABLE `products_color`
  ADD CONSTRAINT `products_color_colors_fk` FOREIGN KEY (`color_id`) REFERENCES `colors` (`color_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products_description`
--
ALTER TABLE `products_description`
  ADD CONSTRAINT `products_description_products_product_id_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products_image`
--
ALTER TABLE `products_image`
  ADD CONSTRAINT `products_image_products_product_id_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD CONSTRAINT `product_categories_genders_fk` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`gender_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
