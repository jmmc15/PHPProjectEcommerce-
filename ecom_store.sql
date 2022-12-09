-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2022 at 04:24 AM
-- Server version: 8.0.23
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_image` text NOT NULL,
  `admin_country` text NOT NULL,
  `admin_about` text NOT NULL,
  `admin_contact` varchar(255) NOT NULL,
  `admin_job` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_image`, `admin_country`, `admin_about`, `admin_contact`, `admin_job`) VALUES
(1, 'Miko Cuevas', 'mikocuevas@email.com', '123456', '20220205_173755.jpg', 'Philippines', ' This application is created by Mdev Media, if you willing to contact me, please click this link. <br/>\r\n                        <a href=\"#\"> M-Dev-Media </a> <br/>\r\n                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci doloribus tempore non ut velit, nesciunt totam, perspiciatis corrupti expedita nulla aut necessitatibus eius nisi. Unde quasi, recusandae doloribus minus quisquam.', '0925-124-3563', 'Copy Paster'),
(2, 'Miko Cuevas', 'mikocuevas@admin.com', '$2a$12$KuGTwBvFMDkceyMnM.6lMeps6y1zX6khY9/akIOIRX5apdTO3exf6', '20220205_173755.jpg', 'Philippines', ' This application is created for project purposes, contact us. <br/>\r\n                        <a href=\"#\">Dummy Contact </a> <br/>\r\n                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci doloribus tempore non ut velit, nesciunt totam, perspiciatis corrupti expedita nulla aut necessitatibus eius nisi. Unde quasi, recusandae doloribus minus quisquam.', '0925-124-3563', 'Fighting!');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int NOT NULL,
  `size` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int NOT NULL,
  `cat_title` text NOT NULL,
  `cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_desc`) VALUES
(1, 'Men ', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis maxime error iusto, sint neque natus voluptas doloribus saepe nihil officiis sit ipsam voluptates excepturi rerum, amet asperiores totam. Adipisci, voluptatem!'),
(2, 'Women', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis maxime error iusto, sint neque natus voluptas doloribus saepe nihil officiis sit ipsam voluptates excepturi rerum, amet asperiores totam. Adipisci, voluptatem!'),
(3, 'Kids', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis maxime error iusto, sint neque natus voluptas doloribus saepe nihil officiis sit ipsam voluptates excepturi rerum, amet asperiores totam. Adipisci, voluptatem!'),
(4, 'Other', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis maxime error iusto, sint neque natus voluptas doloribus saepe nihil officiis sit ipsam voluptates excepturi rerum, amet asperiores totam. Adipisci, voluptatem!');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_pass` varchar(255) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_image` text NOT NULL,
  `customer_ip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`, `customer_ip`) VALUES
(1, 'Miko', 'mikocuevas@email.com', '$2y$10$hL59Fj20MyPsHZ/wM99j4OpCxTSpReOJgTCFtrOU9Bjrg4PtbRunG', 'Philippines', 'Malolos', '0123-456-7245', 'Heaven', '20220205_173755.jpg', '::1'),
(3, 'Miko Cuevas', 'mikocuevas@gmail.com', '123456', 'Philippines', 'Malolos', '0123-456-7245', 'Heaven 2', '20220205_173755.jpg', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `order_id` int NOT NULL,
  `customer_id` int NOT NULL,
  `due_amount` int NOT NULL,
  `invoice_no` int NOT NULL,
  `qty` int NOT NULL,
  `size` text NOT NULL,
  `order_date` date NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`order_id`, `customer_id`, `due_amount`, `invoice_no`, `qty`, `size`, `order_date`, `order_status`) VALUES
(2, 3, 90, 444257439, 1, 'Small', '2022-03-10', 'Complete'),
(3, 3, 90, 2095674716, 1, 'Small', '2022-03-13', 'Pending'),
(4, 3, 90, 1491810026, 1, '', '2022-03-15', 'Pending'),
(5, 3, 90, 847338100, 1, '', '2022-12-04', 'Pending'),
(6, 1, 121, 498059064, 1, 'Small', '2022-12-05', 'Complete'),
(7, 1, 121, 1921743813, 1, 'Small', '2022-12-05', 'Pending'),
(8, 1, 121, 2029444067, 1, 'Small', '2022-12-06', 'Complete'),
(9, 1, 90, 1228777066, 1, 'Small', '2022-12-06', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int NOT NULL,
  `invoice_no` int NOT NULL,
  `amount` int NOT NULL,
  `payment_mode` text NOT NULL,
  `ref_no` int NOT NULL,
  `code` int DEFAULT NULL,
  `payment_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `invoice_no`, `amount`, `payment_mode`, `ref_no`, `code`, `payment_date`) VALUES
(3, 444257439, 500, 'Paypall', 12345678, 56789442, '10/03/2022'),
(4, 2029444067, 121, 'Back Code', 542535, 2222, '12-05-2022'),
(5, 498059064, 121, 'Bank Transfer', 42535532, 222, '12-05-2022');

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

CREATE TABLE `pending_orders` (
  `order_id` int NOT NULL,
  `customer_id` int NOT NULL,
  `invoice_no` int NOT NULL,
  `product_id` text NOT NULL,
  `qty` int NOT NULL,
  `size` text NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pending_orders`
--

INSERT INTO `pending_orders` (`order_id`, `customer_id`, `invoice_no`, `product_id`, `qty`, `size`, `order_status`) VALUES
(2, 3, 444257439, '15', 1, 'Small', 'Complete'),
(3, 3, 2095674716, '15', 1, 'Small', 'Pending'),
(4, 3, 1491810026, '16', 1, '', 'Pending'),
(6, 1, 1921743813, '18', 1, 'Small', 'Complete'),
(7, 1, 2029444067, '18', 1, 'Small', 'Pending'),
(8, 1, 1228777066, '15', 1, 'Small', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int NOT NULL,
  `p_cat_id` int NOT NULL,
  `cat_id` int NOT NULL,
  `date` timestamp NOT NULL,
  `product_title` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` int NOT NULL,
  `product_keywords` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `product_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `p_cat_id`, `cat_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_keywords`, `product_desc`) VALUES
(1, 1, 2, '2022-02-13 11:06:43', 'Tokichoi Front Pocket Collared Dress', 'product_front.jpg', 'product_hang.jpg', 'product-back.jpg', 66, 'Dress', '<p>Lorem Ipsum Dolor Sit Amet</p>'),
(2, 4, 3, '2022-02-13 14:11:48', 'Boys Puffer Coat w/ Detachable Hood', 'boys-Puffer-Coat-With-Detachable-Hood-1.jpg', 'boys-Puffer-Coat-With-Detachable-Hood-2.jpg', 'boys-Puffer-Coat-With-Detachable-Hood-3.jpg', 121, 'Hood', '<p>Lorem Ipsum Dolor Sit Amet Wala Akong Maisip Na Desc One Two Three Four</p>'),
(3, 5, 2, '2022-02-13 14:27:18', 'Girls Polos T-Shirt', 'g-polos-tshirt-1.jpg', 'g-polos-tshirt-2.jpg', '', 55, 'Shirt', '<p>dfhfdghjfgjfgjfgjfgjf</p>'),
(4, 1, 1, '2022-02-13 14:31:52', 'Man Geox Winter Jacket', 'Man-Geox-Winter-jacket-1.jpg', 'Man-Geox-Winter-jacket-2.jpg', 'Man-Geox-Winter-jacket-3.jpg', 100, 'Snake Skin', '<p>Lorem ipsum dolor sit amet, voluptas neque quase qui unde faor lmiyb ppiuyn amxnuub. jugglo lorem imlpu amet dolor sit.</p>'),
(5, 1, 2, '2022-02-13 14:33:48', 'Women Red Winter Jacket', 'Red-Winter-jacket-1.jpg', 'Red-Winter-jacket-2.jpg', 'Red-Winter-jacket-3.jpg', 103, 'Korean Jacket', '<p>Lorem ipsum dolor sit amet dolor amet ytun iim, kgioma lorem merol sit ment ugnusao. Ipsum Dolor amet sit mfgsg ghsin ayrqm oinnn piouyt nmi.</p>'),
(6, 4, 2, '2022-02-13 15:18:32', 'Women Waxed Cotton Coat', 'waxed-cotton-coat-woman-1.jpg', 'waxed-cotton-coat-woman-2.jpg', 'waxed-cotton-coat-woman-3.jpg', 211, 'Cotton', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>'),
(7, 3, 2, '2022-02-13 15:19:44', 'High Heels Women Pantofel Brukat', 'High Heels Women Pantofel Brukat-1.jpg', 'High Heels Women Pantofel Brukat-2.jpg', 'High Heels Women Pantofel Brukat-3.jpg', 45, 'High Heels', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>'),
(8, 3, 1, '2022-02-13 15:20:35', 'Adidas Suarez Slop On', 'Man-Adidas-Suarez-Slop-On-1.jpg', 'Man-Adidas-Suarez-Slop-On-2.jpg', 'Man-Adidas-Suarez-Slop-On-3.jpg', 51, 'Adidas Suarez', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>'),
(9, 2, 1, '2022-02-13 15:21:39', 'Mont Blanc Belt Man', 'Mont-Blanc-Belt-man-1.jpg', 'Mont-Blanc-Belt-man-2.jpg', 'Mont-Blanc-Belt-man-3.jpg', 166, 'Belt', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>'),
(10, 2, 2, '2022-02-13 15:22:14', 'Diamond Heart Ring', 'women-diamond-heart-ring-1.jpg', 'women-diamond-heart-ring-2.jpg', 'women-diamond-heart-ring-3.jpg', 300, 'Ring', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>'),
(11, 5, 1, '2022-02-20 11:29:31', 'Grey Man T-Shirt', 'grey-man-1.jpg', 'grey-man-2.jpg', 'grey-man-3.jpg', 50, 'Casual', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae et illum ipsam, doloribus ab repellat quisquam, praesentium veniam optio incidunt itaque ex vero. Architecto, nobis neque facilis minus possimus veritatis.</p>'),
(12, 5, 1, '2022-02-20 11:30:58', 'Man Polo Casual T-Shirt', 'Man-Polo-1.jpg', 'Man-Polo-2.jpg', 'Man-Polo-3.jpg', 45, 'Casual', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae et illum ipsam, doloribus ab repellat quisquam, praesentium veniam optio incidunt itaque ex vero. Architecto, nobis neque facilis minus possimus veritatis.</p>'),
(13, 5, 1, '2022-02-20 11:32:29', 'Boy Polos T-Shirt', 'polos-tshirt-1.jpg', 'polos-tshirt-2.jpg', '', 40, 'Casual', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae et illum ipsam, doloribus ab repellat quisquam, praesentium veniam optio incidunt itaque ex vero. Architecto, nobis neque facilis minus possimus veritatis.</p>'),
(14, 1, 1, '2022-02-20 11:41:45', 'Levi Trucker Jacket ', 'levis-Trucker-Jacket.jpg', 'levis-Trucker-Jacket-2.jpg', 'levis-Trucker-Jacket-3.jpg', 98, 'Trucker', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae et illum ipsam, doloribus ab repellat quisquam, praesentium veniam optio incidunt itaque ex vero. Architecto, nobis neque facilis minus possimus veritatis.</p>'),
(15, 1, 1, '2022-02-20 11:42:44', 'Merlin Engineer Jacket', 'Merlin-Enginner-Jacket.jpg', 'Merlin-Engineer-Jacket-2.jpg', 'Merlin-Engineer-Jacket-3.jpg', 90, 'Casual Jacket', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae et illum ipsam, doloribus ab repellat quisquam, praesentium veniam optio incidunt itaque ex vero. Architecto, nobis neque facilis minus possimus veritatis.</p>'),
(16, 1, 2, '2022-02-20 11:43:34', 'Mobile Power Jacket', 'Mobile-Power-Jacket.jpg', 'Mobile-Power-Jacket-2.jpg', 'Mobile-Power-Jacket-3.jpg', 90, 'Casual', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae et illum ipsam, doloribus ab repellat quisquam, praesentium veniam optio incidunt itaque ex vero. Architecto, nobis neque facilis minus possimus veritatis.</p>'),
(18, 2, 1, '2022-04-23 07:34:10', 'Boys Puffer Coat w/ Detachable Hood', 'boys-Puffer-Coat-With-Detachable-Hood-1.jpg', 'boys-Puffer-Coat-With-Detachable-Hood-2.jpg', 'boys-Puffer-Coat-With-Detachable-Hood-3.jpg', 121, 'Hood', '<p>ytrhyrthtrhtrtr</p>');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `p_cat_id` int NOT NULL,
  `p_cat_title` text NOT NULL,
  `p_cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`p_cat_id`, `p_cat_title`, `p_cat_desc`) VALUES
(1, 'Jackets', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis maxime error iusto, sint neque natus voluptas doloribus saepe nihil officiis sit ipsam voluptates excepturi rerum, amet asperiores totam. Adipisci, voluptatem!'),
(2, 'Accessories', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis maxime error iusto, sint neque natus voluptas doloribus saepe nihil officiis sit ipsam voluptates excepturi rerum, amet asperiores totam. Adipisci, voluptatem!'),
(3, 'Shoes', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis maxime error iusto, sint neque natus voluptas doloribus saepe nihil officiis sit ipsam voluptates excepturi rerum, amet asperiores totam. Adipisci, voluptatem!'),
(4, 'Coats', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis maxime error iusto, sint neque natus voluptas doloribus saepe nihil officiis sit ipsam voluptates excepturi rerum, amet asperiores totam. Adipisci, voluptatem!'),
(5, 'T-Shirt', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis maxime error iusto, sint neque natus voluptas doloribus saepe nihil officiis sit ipsam voluptates excepturi rerum, amet asperiores totam. Adipisci, voluptatem!');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slide_id` int NOT NULL,
  `slide_name` varchar(255) NOT NULL,
  `slide_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slide_id`, `slide_name`, `slide_image`) VALUES
(1, 'Slide number 1', 'slide-1.jpg'),
(2, 'Slide number 2', 'slide-2.jpg'),
(3, 'Slide number 3', 'slide-3.jpg'),
(4, 'Slide number 4', 'slide-4.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`p_cat_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slide_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `p_cat_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slide_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
