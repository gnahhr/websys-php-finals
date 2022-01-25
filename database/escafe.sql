-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2022 at 09:35 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `escafe`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryID`, `categoryName`) VALUES
(2, 'Coffee Beans'),
(9, 'Cups'),
(10, 'brewer');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `postID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` int(11) NOT NULL,
  `productImage` varchar(2048) NOT NULL,
  `productName` varchar(512) NOT NULL,
  `productCategory` varchar(255) NOT NULL,
  `productPrice` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `bundledWith` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT 0,
  `supplierName` varchar(512) NOT NULL,
  `productDescription` varchar(2048) NOT NULL,
  `expirationDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `productImage`, `productName`, `productCategory`, `productPrice`, `quantity`, `bundledWith`, `discount`, `supplierName`, `productDescription`, `expirationDate`) VALUES
(20, 'images/250ml-Double-Wall-Mug.jpg', 'Double Wall Mug', 'Cups', 395, 100, NULL, 0, 'goodcupph', 'Material : High Borosilicate Glass Color: Amber Microwave-safe Fragile Comes in a box wrapped with our custom Stout Coffee PH gift wrapper.', '0000-00-00'),
(21, 'images/AprilBrewer Kit.png', 'APRIL BREWER KIT', 'brewer', 3500, 100, NULL, 0, 'goodcupph', 'The April Brewer project started with a simple goal; to create a Drip Filter Brewer that generates a perfectly balanced, transparent, and reliable taste experience. The April Brewer was used to win the 2nd place of 2019\'s World Brewers Cup.', '0000-00-00'),
(22, 'images/HARIO SKERTON PRO COFFEE GRINDER.jpg', 'HARIO SKERTON PRO COFFEE GRINDER', 'brewer', 2000, 80, NULL, 0, 'goodcupph', 'The Skerton PRO manual grinder has an anti-slip silicon grip in order to ensures a stable grind.  The top transparent lid prevents the beans from scattering.The Skerton PRO also has improved grind adjustment which lets you to select fine/coarse settings to get the all-important consistent grinding results. It also has improved sturdiness due to a heavy duty grind shaft and easy to detach stainless steel handle for smoother grinding experience.', '0000-00-00'),
(23, 'images/HARIO V60 DRIPPER 01 PLASTIC (2).jpg', 'HARIO V60 DRIPPER', 'brewer', 450, 100, NULL, 0, 'stoutcoffeeph', 'With its swirling ridges and startling looks, the Hario V60, Ceramic Coffee Dripper is a staple to any filter kit. The ceramic filter cone of the V60 highlights the flavor-enhancing ribbing and aesthetic elegance of Hario’s exquisite, hand-pour coffee dripper. The spiral ribs of the Hario V60 are designed to extract the most subtle hints of flavor. The ridges also form insulating air channels which help to maintain an even brewing temperature within the filter. The single hole at the bottom of the cone allows the character of the brew to be finely tuned by the speed of the pour.', '0000-00-00'),
(24, 'images/LILY DRIP - GIO (VERSION 2).jpg', 'LILY DRIP - GIO', 'brewer', 300, 120, NULL, 0, 'goodcupph', 'The difference is that base of the dripper has multiple ribs so that there is room for better airflow when brewing and this helps intensifies the sweetness and clarity of flavors of the final cup.  It is made of ceramic, and when it is preheated it adds a mass of heat to the center of the brew bed, helping maintain a consistent temperature when brewing.The custom Lily Dripper will help increase flavor clarity, sweetness, body and most importantly, it helps achieve consistent results of your brew. ', '0000-00-00'),
(25, 'images/Rivers Wallmug Sleek in Black.png', 'Rivers Wallmug Sleek in Black', 'Cups', 700, 80, NULL, 0, 'goodcupph', 'This sleek and minimalist double wall reusable mug from Japanese brand Rivers Drinkware is the perfect everyday companion, whether you’re at home, in the office, or on-the-go. It’s light-weight, durable and is leakproof! Use it for both hot and cold coffee so you can now bring your favorite Stout coffee wherever you go. Partner it with our Rivers micro dripper to create a portable coffee set.', '0000-00-00'),
(26, 'images/TIMEMORE CHESTNUT C2 GRINDER (BLACK).png', 'TIMEMORE CHESTNUT C2 GRINDER', 'brewer', 3000, 19, 0, 0, 'goodcupph', 'The stainless steel core is sharper than the ceramic core, and the grinding mode will be changed from ', '0000-00-00'),
(27, 'images/260241568_651209992540085_4127263484649803460_n.jpg', 'white mug', 'Cups', 400, 150, NULL, 0, 'goodcupph', 'white cup with good materials to ensure that this product will not easily break when it fell.', '0000-00-00'),
(28, 'images/262915319_630720304775190_6091928489313540406_n.jpg', 'Itogon Coffee (Natural)', 'Coffee Beans', 1000, 1000, NULL, 0, 'stoutcoffeeph', ' It has a tasting notes or flavor profile of sweet, juicy, liquorish, and dark chocolate. ', '2022-02-26'),
(29, 'images/262948909_450116116673557_8613383727906002054_n.jpg', 'Sagada Blend', 'Coffee Beans', 500, 13, 0, 0, 'stoutcoffeeph', 'Bittersweet with fruity overtones', '2022-01-03'),
(30, 'images/265945476_1136730290468035_194080661969203423_n.jpg', 'La Trinidad Blend', 'Coffee Beans', 1500, 40, 0, 0, 'stoutcoffeeph', 'Brown sugar with slight hints of cinnamon and cloves, and a sweet mouthfeel finish', '2022-02-26'),
(31, 'images/mt apo blend.png', 'Mt. Apo Blend', 'Coffee Beans', 1000, 300, NULL, 0, 'stoutcoffeeph', 'Full bodied coffee with notes of chocolate, brown sugar and raisins.', '2022-02-11'),
(32, 'images/mankayan.png', 'Mankayan', 'Coffee Beans', 1500, 250, NULL, 0, 'stoutcoffeeph', 'Pistachio, green apples, molasses; light to medium-bodied', '2022-02-10'),
(33, 'images/bukidnon.png', 'Bukidnon (Fine Robusta)', 'Coffee Beans', 900, 600, NULL, 0, 'stoutcoffeeph', 'Creamy caramel, honey, cocoa, walnut, hazelnut', '2022-02-15'),
(34, 'images/mt.katinglad.png', 'Mt. Kitanglad', 'Coffee Beans', 1200, 350, NULL, 0, 'stoutcoffeeph', 'Saba (banana), jackfruit, sweet; Medium body', '2022-01-30');

-- --------------------------------------------------------

--
-- Table structure for table `saleshistory`
--

CREATE TABLE `saleshistory` (
  `orderID` int(11) UNSIGNED NOT NULL,
  `productID` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `totalPrice` int(11) NOT NULL,
  `dateBought` datetime NOT NULL DEFAULT current_timestamp(),
  `buyerID` int(11) NOT NULL,
  `status` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `saleshistory`
--

INSERT INTO `saleshistory` (`orderID`, `productID`, `productName`, `quantity`, `totalPrice`, `dateBought`, `buyerID`, `status`) VALUES
(1, 12, 'Intact Bangs', 2, 24690, '2022-01-22 03:12:34', 1001, 'Complete'),
(2, 13, 'munyanyo', 3, 369, '2022-01-22 03:27:02', 1001, 'Returned'),
(3, 12, 'Intact Bangs', 4, 49380, '2022-01-22 22:06:22', 1001, 'Shipping'),
(4, 14, 'Shen Shawty', 3, 369, '2022-01-23 18:23:51', 1005, 'Refunded'),
(5, 13, 'munyanyo', 2, 246, '2022-01-23 18:23:51', 1005, 'Refunded'),
(6, 14, 'Shen Shawty', 4, 492, '2022-01-24 00:42:00', 1000, 'Complete'),
(7, 16, 'Shen Pewpew', 4, 572, '2022-01-24 00:42:00', 1000, 'Complete'),
(8, 14, 'Shen Shawty', 4, 492, '2022-01-24 00:42:36', 1000, 'Complete'),
(9, 16, 'Shen Pewpew', 4, 572, '2022-01-24 00:42:36', 1000, 'Complete'),
(10, 12, 'Intact Bangs', 4, 49380, '2022-01-24 00:42:36', 1000, 'Refunded'),
(11, 14, 'Shen Shawty', 2, 246, '2022-01-24 03:15:08', 1005, 'Complete'),
(12, 14, 'Shen Shawty', 5, 615, '2022-01-24 03:21:58', 1005, 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `sitesettings`
--

CREATE TABLE `sitesettings` (
  `siteName` varchar(100) NOT NULL,
  `siteLogo` varchar(255) NOT NULL,
  `balance` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sitesettings`
--

INSERT INTO `sitesettings` (`siteName`, `siteLogo`, `balance`) VALUES
('escafé', '../img/index/logo.png', 31875.5);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplierID` int(11) NOT NULL,
  `supplierName` varchar(255) NOT NULL,
  `itemSupplied` varchar(255) NOT NULL,
  `contactNumber` varchar(12) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplierID`, `supplierName`, `itemSupplied`, `contactNumber`, `location`) VALUES
(7, 'stoutcoffeeph', 'coffee beans', '+63932333333', 'Pampanga'),
(8, 'goodcupph', 'cups', '+63932334325', 'Pampanga');

-- --------------------------------------------------------

--
-- Table structure for table `transactionlog`
--

CREATE TABLE `transactionlog` (
  `transactionID` int(11) NOT NULL,
  `productsBought` text NOT NULL,
  `totalItems` int(11) NOT NULL,
  `totalPrice` int(11) NOT NULL,
  `dateBought` timestamp NOT NULL DEFAULT current_timestamp(),
  `buyerID` int(11) NOT NULL,
  `status` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactionlog`
--

INSERT INTO `transactionlog` (`transactionID`, `productsBought`, `totalItems`, `totalPrice`, `dateBought`, `buyerID`, `status`) VALUES
(1, '14-Shen Shawty-1,16-Shen Pewpew-2,12-Intact Bangs-1', 4, 14334, '2022-01-23 14:59:07', 1005, 'Refunded'),
(2, '16-Shen Pewpew-4', 4, 691, '2022-01-23 19:23:12', 1005, 'Refunded'),
(3, '16-Shen Pewpew-4', 4, 691, '2022-01-23 19:23:12', 1005, 'Complete'),
(4, '16-Shen Pewpew-4', 4, 691, '2022-01-23 19:24:52', 1005, 'Refunded'),
(7, '14-Shen Shawty-235', 235, 32424, '2022-01-23 20:10:40', 1005, 'Complete'),
(8, '14-Shen Shawty-235', 235, 32424, '2022-01-23 20:10:40', 1005, 'Refunded'),
(11, '12-Intact Bangs-2', 2, 24740, '2022-01-23 22:28:02', 1005, 'Complete'),
(12, '12-Intact Bangs-9', 9, 111155, '2022-01-23 22:44:21', 1005, 'Complete'),
(13, '13-munyanyo-2,12-Intact Bangs-1', 3, 12641, '2022-01-23 23:10:12', 1005, 'Complete'),
(14, '13-munyanyo-1', 1, 173, '2022-01-23 23:21:33', 1005, 'Complete'),
(15, '14-Shen Shawty-2,12-Intact Bangs-1', 3, 12849, '2022-01-23 23:38:30', 1005, 'Complete'),
(16, '13-munyanyo-2', 2, 296, '2022-01-25 09:45:51', 1005, 'Refunded'),
(17, '14-Shen Shawty-3,12-Intact Bangs-2', 5, 25184, '2022-01-25 10:44:39', 1005, 'Refunded'),
(18, '14-Shen Shawty-3,12-Intact Bangs-2', 5, 25184, '2022-01-25 10:44:39', 1005, 'Refunded'),
(19, '14-Shen Shawty-3,12-Intact Bangs-2', 5, 25184, '2022-01-25 10:45:04', 1005, 'Refunded'),
(20, '14-Shen Shawty-2', 2, 346, '2022-01-25 11:24:05', 1005, 'Refunded'),
(21, '13-munyanyo-2', 2, 296, '2022-01-25 11:24:39', 1005, 'Complete'),
(22, '29-Sagada Blend-2', 2, 1050, '2022-01-25 18:36:27', 1005, 'Shipping');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `id` int(11) NOT NULL,
  `profilePic` varchar(2048) DEFAULT NULL,
  `firstName` varchar(512) NOT NULL,
  `lastName` varchar(512) NOT NULL,
  `email` varchar(512) NOT NULL,
  `address` varchar(512) NOT NULL,
  `username` varchar(512) NOT NULL,
  `password` varchar(512) NOT NULL,
  `accessLevel` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`id`, `profilePic`, `firstName`, `lastName`, `email`, `address`, `username`, `password`, `accessLevel`) VALUES
(1001, 'images/Seyoung.gif', 'Matty', 'Domingo', 'matt@gmail.com', 'Betis Pampanga', 'matt', '$2y$12$JHYz27lPTMfjIuR02I1I0OTQMCrzG0r7nvPAuZQuV.clF5QNhC5GG', 'admin'),
(1002, 'images/download (1).jpg', 'Patrick', 'Capati', 'pjcapati@gmail.com', 'San Fernando, Pampanga', 'phersival', '$2y$12$cscbIf5oP/pqVO0RqbjBWOOcxhDKdvnTFNXaRhLeu884yBIcWSrfm', 'user'),
(1003, 'images/download.jpg', 'Xaioting', 'Ocampo', 'ilovejoshua@gmail.com', 'Betis, Pampanga', 'Xiaoting', '$2y$12$pj1c.vWQqtmttdSaLB4tqOEpaN3M6mEXrvZ/Omkc4/.sQGhtY3OX.', 'user'),
(1005, 'images/Youngeun-icon.jfif', 'Joshua', 'Ocampo', 'ocampojoshua891@gmail.com', 'Betis, Pampanga', 'joshua', '$2y$12$XeWKMhEC5j8T614OqYiEae5bkZZDkPzTQPyop0S1GR69xYd6qIOK6', 'user'),
(1006, NULL, 'hehee', 'hehe', 'hehe', 'hehe', 'hehe', '$2y$12$RnsSFhbqo6txP0Gg7acTseCOYd4/O1Eg3NvfLPTUZV47mYcCOHipO', 'employee'),
(1007, NULL, 'asd', 'asd', 'asd@asdzc.coma', 'asd', 'asd', '$2y$12$CPeMeMJXoFPCOnE1FERSxuQq90e8YtSlZbI/2WwJptkRh4tynr5bu', 'employee');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `username` varchar(512) NOT NULL,
  `action` varchar(255) NOT NULL,
  `dateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `username`, `action`, `dateTime`) VALUES
(1001, 'matt', '', '2022-01-16 12:52:08'),
(1001, 'matt', 'Logged in', '2022-01-18 19:23:41'),
(1001, 'matt', 'Logged in', '2022-01-18 19:23:53'),
(1001, 'matt', 'Logged in', '2022-01-18 19:24:04'),
(1001, 'matt', 'Logged in', '2022-01-18 19:24:44'),
(1001, 'matt', 'Logged in', '2022-01-18 19:25:47'),
(1000, 'joshua', 'Logged in', '2022-01-18 19:26:18'),
(1000, 'joshua', 'Logged in', '2022-01-18 19:28:29'),
(1000, 'joshua', 'Logged in', '2022-01-18 19:36:30'),
(1001, 'matt', 'Logged in', '2022-01-18 19:36:38'),
(1001, 'matt', 'Logged in', '2022-01-18 19:40:56'),
(1001, 'matt', 'Logged in', '2022-01-18 19:42:14'),
(1001, 'matt', 'Logged in', '2022-01-18 19:47:37'),
(1001, 'matt', 'Logged in', '2022-01-18 19:48:57'),
(1001, 'matt', 'Logged in', '2022-01-18 19:49:33'),
(1001, 'matt', 'Logged in', '2022-01-18 19:52:56'),
(1001, 'matt', 'Logged in', '2022-01-18 19:54:44'),
(1001, 'matt', 'Logged in', '2022-01-18 19:56:02'),
(1001, 'matt', 'Logged in', '2022-01-18 19:56:42'),
(1001, 'matt', 'Logged in', '2022-01-18 20:00:00'),
(1001, 'matt', 'Logged in', '2022-01-18 20:07:08'),
(1001, 'matt', 'Logged in', '2022-01-18 20:24:30'),
(1001, 'matt', 'Logged in', '2022-01-18 20:24:55'),
(1001, 'matt', 'Logged in', '2022-01-18 20:26:08'),
(1001, 'matt', 'Logged in', '2022-01-18 20:26:44'),
(1001, 'matt', 'Logged in', '2022-01-18 20:27:15'),
(1001, 'matt', 'Logged in', '2022-01-18 20:32:53'),
(1001, 'matt', 'Logged in', '2022-01-18 20:34:57'),
(1001, 'matt', 'Logged in', '2022-01-18 20:36:06'),
(1001, 'matt', 'Logged in', '2022-01-18 20:36:27'),
(1001, 'matt', 'Logged in', '2022-01-18 20:38:07'),
(1001, 'matt', 'Logged in', '2022-01-18 20:38:48'),
(1001, 'matt', 'Logged in', '2022-01-18 20:40:24'),
(1001, 'matt', 'Logged in', '2022-01-18 20:40:55'),
(1001, 'matt', 'Logged in', '2022-01-18 20:42:18'),
(1001, 'matt', 'Logged in', '2022-01-18 20:46:49'),
(1001, 'matt', 'Logged in', '2022-01-18 20:50:46'),
(1001, 'matt', 'Logged in', '2022-01-18 20:51:17'),
(1001, 'matt', 'Logged in', '2022-01-18 20:52:03'),
(1001, 'matt', 'Logged in', '2022-01-18 20:53:18'),
(1001, 'matt', 'Logged in', '2022-01-18 21:00:10'),
(1001, 'matt', 'Logged in', '2022-01-18 21:00:36'),
(1001, 'matt', 'Logged in', '2022-01-18 21:00:58'),
(1001, 'matt', 'Logged in', '2022-01-18 21:02:35'),
(1001, 'matt', 'Logged in', '2022-01-18 21:03:21'),
(1001, 'matt', 'Logged in', '2022-01-18 21:05:22'),
(1001, 'matt', 'Logged in', '2022-01-18 21:41:42'),
(1001, 'matt', 'Logged in', '2022-01-18 21:46:44'),
(1001, 'matt', 'Logged in', '2022-01-19 04:28:48'),
(1001, 'matt', 'Logged in', '2022-01-19 05:08:02'),
(1001, 'matt', 'Logged in', '2022-01-19 05:08:34'),
(1001, 'matt', 'Logged in', '2022-01-19 05:18:27'),
(1001, 'matt', 'Logged in', '2022-01-20 14:13:42'),
(1001, 'matt', 'Logged in', '2022-01-21 09:02:12'),
(1001, 'matt', 'Logged in', '2022-01-21 09:16:19'),
(1001, 'matt', 'Logged in', '2022-01-21 09:18:38'),
(1000, 'joshua', 'Logged in', '2022-01-21 16:50:00'),
(1001, 'matt', 'Logged in', '2022-01-21 17:11:24'),
(1001, 'matt', 'Logged in', '2022-01-21 17:27:57'),
(1001, 'matt', 'Logged out', '2022-01-21 17:51:27'),
(1000, 'joshua', 'Logged in', '2022-01-21 17:51:36'),
(1000, 'joshua', 'Logged out', '2022-01-21 19:11:05'),
(1001, 'matt', 'Logged in', '2022-01-21 19:11:10'),
(1001, 'matt', 'Logged out', '2022-01-21 19:45:44'),
(1001, 'matt', 'Logged in', '2022-01-21 19:45:48'),
(1001, 'matt', 'Logged out', '2022-01-21 19:47:10'),
(1001, 'matt', 'Logged in', '2022-01-21 19:47:19'),
(1001, 'gnahhr', 'Logged out', '2022-01-21 20:36:34'),
(1001, 'matt', 'Logged in', '2022-01-21 20:36:39'),
(1001, 'matt', 'Logged out', '2022-01-21 20:42:28'),
(1000, 'joshua', 'Logged in', '2022-01-21 20:42:36'),
(1000, 'joshua', 'Logged out', '2022-01-21 22:09:44'),
(1001, 'matt', 'Logged in', '2022-01-22 14:46:22'),
(1001, 'matt', 'Logged out', '2022-01-22 15:06:24'),
(1000, 'joshua', 'Logged in', '2022-01-22 15:06:31'),
(1000, 'joshua', 'Logged out', '2022-01-22 15:17:43'),
(1001, 'matt', 'Logged in', '2022-01-22 15:17:49'),
(1001, 'matt', 'Logged out', '2022-01-22 18:08:20'),
(1000, 'joshua', 'Logged in', '2022-01-22 18:08:25'),
(1000, 'joshua', 'Logged in', '2022-01-23 06:12:27'),
(1000, 'joshua', 'Logged out', '2022-01-23 06:12:34'),
(1003, 'user', 'Logged in', '2022-01-23 06:14:15'),
(1003, 'user', 'Logged out', '2022-01-23 06:17:08'),
(1003, 'user', 'Logged in', '2022-01-23 06:17:14'),
(1003, 'user', 'Logged out', '2022-01-23 06:23:03'),
(1003, 'user', 'Logged in', '2022-01-23 06:23:08'),
(1003, 'user', 'Logged out', '2022-01-23 06:25:33'),
(1003, 'user', 'Logged in', '2022-01-23 06:25:39'),
(1003, 'Xiaoting', 'Logged out', '2022-01-23 06:48:58'),
(1003, 'Xiaoting', 'Logged in', '2022-01-23 06:49:15'),
(1003, 'Xiaoting', 'Logged out', '2022-01-23 06:49:29'),
(1001, 'matt', 'Logged in', '2022-01-23 06:50:37'),
(1001, 'matt', 'Logged out', '2022-01-23 06:50:49'),
(1003, 'Xiaoting', 'Logged in', '2022-01-23 06:50:56'),
(1004, 'joshua', 'Logged in', '2022-01-23 10:18:32'),
(1004, 'joshua', 'Logged out', '2022-01-23 10:19:10'),
(1002, 'phersival', 'Logged in', '2022-01-23 10:35:16'),
(1002, 'phersival', 'Logged out', '2022-01-23 10:35:20'),
(1001, 'matt', 'Logged in', '2022-01-23 10:35:46'),
(1005, 'joshua', 'Logged in', '2022-01-23 10:46:24'),
(1005, 'joshua', 'Logged out', '2022-01-23 10:46:30'),
(1001, 'matt', 'Logged in', '2022-01-23 10:46:39'),
(1001, 'matt', 'Logged out', '2022-01-23 10:50:44'),
(1005, 'joshua', 'Logged in', '2022-01-23 10:51:07'),
(1005, 'joshua', 'Logged out', '2022-01-23 11:05:56'),
(1005, 'joshua', 'Logged in', '2022-01-23 11:06:04'),
(1005, 'joshua', 'Logged in', '2022-01-23 14:13:59'),
(1005, 'joshua', 'Logged out', '2022-01-23 16:03:18'),
(1001, 'matt', 'Logged in', '2022-01-23 16:03:56'),
(1001, 'matt', 'Logged out', '2022-01-23 16:08:32'),
(1005, 'joshua', 'Logged in', '2022-01-23 16:08:38'),
(1005, 'joshua', 'Logged out', '2022-01-23 16:36:28'),
(1000, 'joshua', 'Logged out', '2022-01-23 17:43:46'),
(1005, 'joshua', 'Logged in', '2022-01-23 17:43:55'),
(1005, 'joshua', 'Logged out', '2022-01-23 17:44:33'),
(1001, 'matt', 'Logged in', '2022-01-23 17:44:48'),
(1001, 'matt', 'Logged out', '2022-01-23 17:47:15'),
(1005, 'joshua', 'Logged in', '2022-01-23 17:47:25'),
(1005, 'joshua', 'Logged out', '2022-01-23 19:14:33'),
(1001, 'matt', 'Logged in', '2022-01-23 19:14:38'),
(1001, 'matt', 'Logged out', '2022-01-23 19:16:17'),
(1005, 'joshua', 'Logged in', '2022-01-23 19:16:26'),
(1005, 'joshua', 'Logged out', '2022-01-23 19:21:40'),
(1001, 'matt', 'Logged in', '2022-01-23 19:21:45'),
(1001, 'matt', 'Logged out', '2022-01-23 20:13:52'),
(1005, 'joshua', 'Logged in', '2022-01-23 20:14:00'),
(1005, 'joshua', 'Logged out', '2022-01-23 20:21:33'),
(1005, 'joshua', 'Logged in', '2022-01-23 20:21:43'),
(1005, 'joshua', 'Logged out', '2022-01-24 00:10:52'),
(1001, 'matt', 'Logged in', '2022-01-24 00:10:58'),
(1001, 'matt', 'Logged out', '2022-01-24 00:17:55'),
(1005, 'joshua', 'Logged in', '2022-01-24 00:18:08'),
(1005, 'joshua', 'Logged out', '2022-01-24 00:27:47'),
(1001, 'matt', 'Logged in', '2022-01-24 00:27:57'),
(1001, 'matt', 'Logged out', '2022-01-24 00:32:53'),
(1001, 'matt', 'Logged in', '2022-01-24 00:33:14'),
(1001, 'matt', 'Logged out', '2022-01-24 00:33:25'),
(1005, 'joshua', 'Logged in', '2022-01-24 00:33:31'),
(1005, 'joshua', 'Logged out', '2022-01-24 01:04:03'),
(1001, 'matt', 'Logged in', '2022-01-24 17:27:07'),
(1001, 'matt', 'Logged out', '2022-01-24 17:46:30'),
(1005, 'joshua', 'Logged in', '2022-01-24 17:46:36'),
(1005, 'joshua', 'Logged out', '2022-01-24 17:49:18'),
(1001, 'matt', 'Logged in', '2022-01-24 17:49:23'),
(1001, 'matt', 'Logged out', '2022-01-24 18:06:09'),
(1001, 'matt', 'Logged in', '2022-01-24 18:09:30'),
(1001, 'matt', 'Logged out', '2022-01-24 18:30:27'),
(1005, 'joshua', 'Logged in', '2022-01-24 18:30:41'),
(1005, 'joshua', 'Logged out', '2022-01-24 18:30:53'),
(1001, 'matt', 'Logged in', '2022-01-24 19:16:14'),
(1001, 'matt', 'Logged out', '2022-01-24 22:19:51'),
(1007, 'asd', 'Logged in', '2022-01-24 22:19:56'),
(1007, 'asd', 'Logged out', '2022-01-24 22:22:28'),
(1001, 'matt', 'Logged in', '2022-01-25 08:17:04'),
(1001, 'matt', 'Logged out', '2022-01-25 10:23:32'),
(1005, 'joshua', 'Logged in', '2022-01-25 10:44:23'),
(1005, 'joshua', 'Logged out', '2022-01-25 10:47:27'),
(1008, 'test', 'Logged in', '2022-01-25 10:47:52'),
(1008, 'test', 'Logged out', '2022-01-25 10:47:57'),
(1001, 'matt', 'Logged in', '2022-01-25 10:48:08'),
(1001, 'matt', 'Logged out', '2022-01-25 11:10:28'),
(1005, 'joshua', 'Logged in', '2022-01-25 11:20:12'),
(1005, 'joshua', 'Logged out', '2022-01-25 11:53:21'),
(1001, 'matt', 'Logged in', '2022-01-25 11:53:26'),
(1001, 'matt', 'Logged out', '2022-01-25 12:23:53'),
(1005, 'joshua', 'Logged in', '2022-01-25 12:23:58'),
(1005, 'joshua', 'Logged out', '2022-01-25 12:24:07'),
(1001, 'matt', 'Logged in', '2022-01-25 12:24:11'),
(1001, 'matt', 'Logged out', '2022-01-25 12:24:22'),
(1005, 'joshua', 'Logged in', '2022-01-25 12:24:28'),
(1005, 'joshua', 'Logged out', '2022-01-25 12:24:51'),
(1001, 'matt', 'Logged in', '2022-01-25 12:24:55'),
(1001, 'matt', 'Logged out', '2022-01-25 12:43:24'),
(1006, 'hehe', 'Logged in', '2022-01-25 12:43:29'),
(1006, 'hehe', 'Logged out', '2022-01-25 16:25:17'),
(1007, 'asd', 'Logged out', '2022-01-25 16:27:06'),
(1001, 'matt', 'Logged out', '2022-01-25 16:29:27'),
(1001, 'matt', 'Logged out', '2022-01-25 16:30:16'),
(1001, 'matt', 'Logged in', '2022-01-25 16:52:06'),
(1001, 'matt', 'Logged out', '2022-01-25 18:01:39'),
(1006, 'hehe', 'Logged in', '2022-01-25 18:01:57'),
(1006, 'hehe', 'Logged in', '2022-01-25 18:02:58'),
(1006, 'hehe', 'Logged out', '2022-01-25 18:10:36'),
(1005, 'joshua', 'Logged in', '2022-01-25 18:11:41'),
(1005, 'joshua', 'Logged out', '2022-01-25 18:19:01'),
(1001, 'matt', 'Logged in', '2022-01-25 18:19:06'),
(1001, 'matt', 'Logged in', '2022-01-25 18:38:55'),
(1001, 'matt', 'Logged out', '2022-01-25 19:35:54'),
(1005, 'joshua', 'Logged in', '2022-01-25 19:36:08'),
(1005, 'joshua', 'Logged out', '2022-01-25 19:40:33'),
(1001, 'matt', 'Logged in', '2022-01-25 19:40:37'),
(1001, 'matt', 'Logged out', '2022-01-25 20:15:12'),
(1005, 'joshua', 'Logged in', '2022-01-25 20:15:18'),
(1005, 'joshua', 'Logged out', '2022-01-25 21:29:53'),
(1001, 'matt', 'Logged in', '2022-01-25 21:30:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `saleshistory`
--
ALTER TABLE `saleshistory`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplierID`);

--
-- Indexes for table `transactionlog`
--
ALTER TABLE `transactionlog`
  ADD PRIMARY KEY (`transactionID`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `saleshistory`
--
ALTER TABLE `saleshistory`
  MODIFY `orderID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplierID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transactionlog`
--
ALTER TABLE `transactionlog`
  MODIFY `transactionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1009;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
