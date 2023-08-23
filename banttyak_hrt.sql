-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 23, 2023 at 04:57 PM
-- Server version: 5.7.23-23
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banttyak_hrt`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogcategory`
--

CREATE TABLE `blogcategory` (
  `id` int(100) NOT NULL,
  `categoryname` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogcategory`
--

INSERT INTO `blogcategory` (`id`, `categoryname`, `slug`) VALUES
(1, 'Healthy Tips & Tricks', 'healthy-tips-tricks'),
(2, 'testing', 'testing');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(255) NOT NULL,
  `brandname` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brandname`, `slug`) VALUES
(2, 'Natural juices', 'natural-juices');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(255) NOT NULL,
  `blog_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `your_website` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `blog_id`, `name`, `email`, `your_website`, `message`, `status`, `date`) VALUES
(5, 11, 'abhishek', 'abhishek12@gmail.com', '063961545', 'hey abhishek', 'approved', '2023-07-12 16:59:31'),
(6, 11, 'akash sharma', 'akash@gmail.com', '8565253659', 'hey akash', 'approved', '2023-07-12 17:09:15'),
(7, 11, 'abhishek pandey', 'abhishek@gmail.com', '06396154512', 'hello', 'disapproved', '2023-07-13 11:29:31'),
(9, 11, 'abhishek', 'abhishek.banttech@gmail.com', 'banttech.com', 'for testing', 'disapproved', '2023-08-10 10:58:31');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `email`, `message`) VALUES
(3, 'abhishek', 'admin@admin.com', 'asdf'),
(4, 'abhishek', 'admin@admin.com', 'asfdsf'),
(5, 'abhishek', 'abhishek@gmail.com', 'asdfgh'),
(6, 'abhishek', 'arushi@gmail.com', 'dfg'),
(7, 'abhishek', 'arushi@gmail.com', 'asdf'),
(8, 'Ammar', 'ammar.banttech@gmail.com', 'test'),
(9, 'pets grooming4', 'customer@customer.com', 'as');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(255) NOT NULL,
  `countryname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `countryname`) VALUES
(2, 'India'),
(3, 'America'),
(4, 'Pakistan');

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `id` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `valid_from` datetime DEFAULT NULL,
  `valid_to` datetime DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `usage_allowed` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usage_limit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `discount_percentage` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`id`, `code`, `status`, `valid_from`, `valid_to`, `description`, `usage_allowed`, `usage_limit`, `discount_percentage`, `date`) VALUES
(5, '12345', 'active', '2023-06-09 00:00:00', '2023-08-11 00:00:00', 'Testing', 'limited', '5', '2', '2023-06-06 08:34:06'),
(6, 'abcd', 'inactive', '2023-06-15 00:00:00', '2023-08-29 00:00:00', 'testing description', 'unlimited', '', '3', '2023-06-06 08:38:10'),
(7, 'A12345', 'active', '2023-06-19 00:00:00', '2023-08-22 00:00:00', 'test', 'limited', '12', '12', '2023-06-07 11:54:35');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `bill_first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bill_last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bill_company_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bill_country_region` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bill_address1` text COLLATE utf8_unicode_ci,
  `bill_address2` text COLLATE utf8_unicode_ci,
  `bill_town_city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bill_county` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bill_postcode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bill_phone_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bill_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ship_to_diff_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ship_first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ship_last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ship_company_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ship_country_region` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ship_address1` text COLLATE utf8_unicode_ci,
  `ship_address2` text COLLATE utf8_unicode_ci,
  `ship_town_city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ship_county` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ship_postcode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_order_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_amount` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `coupon_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `coupon_discount_percentage` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `coupon_amount` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `bill_first_name`, `bill_last_name`, `bill_company_name`, `bill_country_region`, `bill_address1`, `bill_address2`, `bill_town_city`, `bill_county`, `bill_postcode`, `bill_phone_number`, `bill_email`, `ship_to_diff_address`, `ship_first_name`, `ship_last_name`, `ship_company_name`, `ship_country_region`, `ship_address1`, `ship_address2`, `ship_town_city`, `ship_county`, `ship_postcode`, `payment_method`, `payment_order_id`, `total_amount`, `coupon_code`, `coupon_discount_percentage`, `coupon_amount`, `created_at`, `updated_at`) VALUES
(2, 21, 'Ammar', 'Ali', NULL, 'PK', 'Sargodha pakistan', 'Sargodha pakistan', 'Sargodha', NULL, '9099', '09000900', 'ammar.banttech@gmail.com', 'true', 'Ammar', 'Ali', NULL, 'IN', 'Sargodha pakistan', 'Sargodha pakistan', 'Sargodha', NULL, '9099', 'paypal', '51E5595861788684N', '49.99', NULL, NULL, NULL, '2023-07-08 08:43:40', '2023-07-08 08:43:40'),
(3, 21, 'Ammar', 'Ali', 'test', 'PK', 'Sargodha pakistan', 'Sargodha pakistan', 'Sargodha', 'test', '9099', '09000900', 'ammar.banttech@gmail.com', 'true', 'Ammar', 'Ali', 'test', 'PK', 'Sargodha pakistan', 'Sargodha pakistan', 'Sargodha', 'test', '9099', 'paypal', '8AC32253WK694052D', '319.9', NULL, NULL, NULL, '2023-07-08 08:48:52', '2023-07-08 08:48:52'),
(4, 21, 'Ammar', 'Ali', 'test', 'PK', 'Sargodha pakistan', NULL, 'Sargodha', 'Algeria', '9099', '09000900', 'ammar.banttech@gmail.com', 'false', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'paypal', '7HT91340GN9929318', '49.99', NULL, NULL, NULL, '2023-07-15 10:03:09', '2023-07-15 10:03:09'),
(5, 21, 'Ammar', 'Ali', 'test', 'PK', 'Sargodha pakistan', NULL, 'Sargodha', 'Algeria', '9099', '09000900', 'ammar.banttech@gmail.com', 'true', 'Ammar', 'Ali', 'test', 'PK', 'Sargodha pakistan', NULL, 'Sargodha', 'Algeria', '9099', 'paypal', '4VL268317F249852A', '37.23', '12345', '2', '0.76', '2023-07-15 10:05:27', '2023-07-15 10:05:27'),
(6, 21, 'Ammar', 'Ali', 'test', 'PK', 'Sargodha pakistan', NULL, 'Sargodha', 'Algeria', '9099', '09000900', 'ammar.banttech@gmail.com', 'false', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'paypal', '94N50979W0523044F', '37.99', NULL, NULL, NULL, '2023-07-15 10:14:54', '2023-07-15 10:14:54'),
(7, 21, 'Ammar', 'Ali', 'test', 'PK', 'Sargodha pakistan', NULL, 'Sargodha', 'Algeria', '9099', '09000900', 'ammar.banttech@gmail.com', 'false', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'paypal', '32S68928NF3335525', '49.99', NULL, NULL, NULL, '2023-07-15 10:15:19', '2023-07-15 10:15:19'),
(8, 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-15 13:14:20', '2023-07-15 13:14:20'),
(9, 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-15 13:18:50', '2023-07-15 13:18:50'),
(10, 21, 'Ammar', 'Ali', 'test', 'PK', 'Sargodha pakistan', NULL, 'Sargodha', 'Algeria', '9099', '09000900', 'ammar.banttech@gmail.com', 'false', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'paymentsense', NULL, '37.99', NULL, NULL, NULL, '2023-07-15 13:27:52', '2023-07-15 13:27:52'),
(11, 21, 'Ammar', 'Ali', 'test', 'PK', 'Sargodha pakistan', NULL, 'Sargodha', 'Algeria', '9099', '09000900', 'ammar.banttech@gmail.com', 'false', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'paymentsense', '6894279459226884604951', '49.99', NULL, NULL, NULL, '2023-07-15 13:32:27', '2023-07-15 13:32:27'),
(12, 21, 'Ammar', 'Ali', 'test', 'PK', 'Sargodha pakistan', NULL, 'Sargodha', 'Algeria', '9099', '09000900', 'ammar.banttech@gmail.com', 'true', 'Ammar', 'Ali', 'test', 'PK', 'Sargodha pakistan', NULL, 'Sargodha', 'Algeria', '9099', 'paymentsense', '6894281429826939004951', '43.99', 'A12345', '12', '6.00', '2023-07-15 13:35:44', '2023-07-15 13:35:44'),
(13, 20, 'ammar', 'ali', NULL, 'GB', 'sargodha', NULL, 'sargodha', NULL, '40100', '03041705101', 'ammar.banttech@gmail.com', 'false', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'paymentsense', '6908093496346354503954', '19.99', NULL, NULL, NULL, '2023-07-31 13:15:51', '2023-07-31 13:15:51'),
(14, 20, 'ammar', 'ali', NULL, 'GB', 'sargodha', NULL, 'sargodha', NULL, '40100', '03041705101', 'ammar.banttech@gmail.com', 'false', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'paypal', '19C27269WP7851923', '19.99', NULL, NULL, NULL, '2023-07-31 14:12:41', '2023-07-31 14:12:41'),
(15, 21, 'Ammar', 'Ali', 'test', 'PK', 'Sargodha pakistan', NULL, 'Sargodha', 'Algeria', '9099', '09000900', 'ammar.banttech@gmail.com', 'false', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'paypal', '88H67293XL8054457', '37.99', NULL, NULL, NULL, '2023-08-01 18:37:07', '2023-08-01 18:37:07'),
(16, 21, 'Ammar', 'Ali', 'test', 'PK', 'Sargodha pakistan', NULL, 'Sargodha', 'Algeria', '9099', '09000900', 'ammar.banttech@gmail.com', 'false', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'paymentsense', '6909151512716196904951', '49.99', NULL, NULL, NULL, '2023-08-01 18:39:13', '2023-08-01 18:39:13'),
(17, 21, 'Ammar', 'Ali', 'test', 'PK', 'Sargodha pakistan', NULL, 'Sargodha', 'Algeria', '9099', '09000900', 'ammar.banttech@gmail.com', 'true', 'Ammar', 'Ali', 'test', 'PK', 'Sargodha pakistan', NULL, 'Sargodha', 'Algeria', '9099', 'paypal', '572178739V6907834', '49.99', NULL, NULL, NULL, '2023-08-02 06:06:27', '2023-08-02 06:06:27'),
(18, 20, 'ammar', 'ali', NULL, 'GB', 'sargodha', NULL, 'sargodha', NULL, '40100', '03041705101', 'ammar.banttech@gmail.com', 'false', NULL, NULL, NULL, 'GB', NULL, NULL, NULL, NULL, NULL, 'paypal', '2N6103660J1915628', '19.99', NULL, NULL, NULL, '2023-08-02 06:34:29', '2023-08-02 06:34:29'),
(19, 20, 'ammar', 'ali', NULL, 'GB', 'sargodha', NULL, 'sargodha', NULL, '40100', '03041705101', 'ammar.banttech@gmail.com', 'false', NULL, NULL, NULL, 'GB', NULL, NULL, NULL, NULL, NULL, 'paypal', '5F405535HG459645J', '19.99', NULL, NULL, NULL, '2023-08-02 06:35:15', '2023-08-02 06:35:15'),
(20, 20, 'ammar', 'ali', NULL, 'GB', 'sargodha', NULL, 'sargodha', NULL, '40100', '03041705101', 'ammar.banttech@gmail.com', 'false', 'ammar', 'ali', NULL, 'GB', 'sargodha', NULL, 'sargodha', NULL, '40100', 'paypal', '5J160948JT390634A', '19.99', NULL, NULL, NULL, '2023-08-02 06:41:37', '2023-08-02 06:41:37'),
(21, 21, 'Ammar', 'Ali', 'test', 'PK', 'Sargodha pakistan', NULL, 'Sargodha', 'Algeria', '9099', '09000900', 'ammar.banttech@gmail.com', 'true', 'Parvez', 'Alam', 'GL', 'IR', 'SK Road', 'AWing', 'Iran', 'Iran', '6666', 'paymentsense', '6909693173766358404951', '49.99', NULL, NULL, NULL, '2023-08-02 09:41:58', '2023-08-02 09:41:58'),
(22, 35, 'arushi', 'gupta', 'banttech', 'IN', '15', 'banttech', 'bareilly', NULL, '243123', '6396151515', 'arushi7070@gmail.com', 'false', 'arushi', 'gupta', 'banttech', 'GB', '15', 'banttech', 'bareilly', NULL, '243123', 'paypal', '04B69479GU1942043', '37.99', NULL, NULL, NULL, '2023-08-04 08:26:02', '2023-08-04 08:26:02'),
(23, 35, 'arushi', 'gupta', 'banttech', 'IN', '15', NULL, 'bareilly', NULL, '243123', '6396151515', 'arushi7070@gmail.com', 'false', 'arushi', 'gupta', 'banttech', 'IN', '15', NULL, 'bareilly', NULL, '243123', 'paymentsense', '6911413325496497004953', '37.99', NULL, NULL, NULL, '2023-08-04 09:28:55', '2023-08-04 09:28:55'),
(24, 35, 'arushi', 'gupta', 'banttech', 'IN', '15', NULL, 'bareilly', NULL, '243123', '6396151515', 'arushi7070@gmail.com', 'false', 'arushi', 'gupta', 'banttech', 'IN', '15', NULL, 'bareilly', NULL, '243123', 'paymentsense', '6911414592096470704951', '49.99', NULL, NULL, NULL, '2023-08-04 09:31:01', '2023-08-04 09:31:01'),
(25, 35, 'arushi', 'gupta', 'banttech', 'IN', '15', NULL, 'bareilly', NULL, '243123', '6396151515', 'arushi7070@gmail.com', 'false', 'arushi', 'gupta', 'banttech', 'IN', '15', NULL, 'bareilly', NULL, '243123', 'paypal', '7BG44165P7772201X', '49.99', NULL, NULL, NULL, '2023-08-04 09:32:05', '2023-08-04 09:32:05'),
(26, 20, 'ammar', 'ali', NULL, 'GB', 'sargodha', NULL, 'sargodha', NULL, '40100', '03041705101', 'ammar.banttech@gmail.com', 'false', 'ammar', 'ali', NULL, 'GB', 'sargodha', NULL, 'sargodha', NULL, '40100', 'paymentsense', '6911549112326533404951', '19.99', NULL, NULL, NULL, '2023-08-04 13:15:13', '2023-08-04 13:15:13'),
(27, 36, 'abhishek', 'abhishek', 'banttech', 'GB', 'bareilly', NULL, 'bareilly', 'Burundi', '243123', '6363.636263', 'techabhishek8853@gmail.com', 'false', 'abhishek', 'abhishek', 'banttech', 'GB', 'bareilly', NULL, 'bareilly', 'Burundi', '243123', 'paymentsense', '6916463310656841103954', '151.96', NULL, NULL, NULL, '2023-08-10 05:45:33', '2023-08-10 05:45:33'),
(28, 39, 'Tamanna', 'soni', 'Natural Juices & Vitamins Ltd', 'GB', '30 Kings Avenue', 'SUNBURY ON THAMES', 'Sunbury-on-Thames', 'Middlesex', 'TW16 7QE', '07939066943', 'admin@naturaljuices.co.uk', 'false', 'Tamanna', 'soni', 'Natural Juices & Vitamins Ltd', 'GB', '30 Kings Avenue', 'SUNBURY ON THAMES', 'Sunbury-on-Thames', 'Middlesex', 'TW16 7QE', 'paypal', '9MP58593CX3362259', '87.98', NULL, NULL, NULL, '2023-08-22 16:12:00', '2023-08-22 16:12:00');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reg_price` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sel_price` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `brand_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `reg_price`, `sel_price`, `image`, `category_id`, `brand_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, '2', '3', '62.97', '49.99', '1688385960_product.webp', '1', '2', 1, '2023-07-08 08:43:40', '2023-07-08 08:43:40'),
(2, '3', '3', '62.97', '49.99', '1688385960_product.webp', '1', '2', 4, '2023-07-08 08:48:52', '2023-07-08 08:48:52'),
(3, '3', '4', '83.96', '59.97', '1688385764_product.webp', '1', '2', 2, '2023-07-08 08:48:52', '2023-07-08 08:48:52'),
(4, '4', '3', '62.97', '49.99', '1688385960_product.webp', '1', '2', 1, '2023-07-15 10:03:09', '2023-07-15 10:03:09'),
(5, '5', '2', '41.99', '37.99', '1688386007_product.webp', '1', '2', 1, '2023-07-15 10:05:27', '2023-07-15 10:05:27'),
(6, '6', '2', '41.99', '37.99', '1688386007_product.webp', '1', '2', 1, '2023-07-15 10:14:54', '2023-07-15 10:14:54'),
(7, '7', '3', '62.97', '49.99', '1688385960_product.webp', '1', '2', 1, '2023-07-15 10:15:19', '2023-07-15 10:15:19'),
(8, '8', '2', '41.99', '37.99', '1688386007_product.webp', '1', '2', 1, '2023-07-15 13:14:20', '2023-07-15 13:14:20'),
(9, '9', '2', '41.99', '37.99', '1688386007_product.webp', '1', '2', 1, '2023-07-15 13:18:50', '2023-07-15 13:18:50'),
(10, '10', '2', '41.99', '37.99', '1688386007_product.webp', '1', '2', 1, '2023-07-15 13:27:52', '2023-07-15 13:27:52'),
(11, '11', '3', '62.97', '49.99', '1688385960_product.webp', '1', '2', 1, '2023-07-15 13:32:27', '2023-07-15 13:32:27'),
(12, '12', '3', '62.97', '49.99', '1688385960_product.webp', '1', '2', 1, '2023-07-15 13:35:44', '2023-07-15 13:35:44'),
(13, '14', '1', '20.99', '19.99', '1688385666_product.webp', '1', '2', 1, '2023-07-31 13:15:51', '2023-07-31 13:15:51'),
(14, '14', '1', '20.99', '19.99', '1688385666_product.webp', '1', '2', 1, '2023-07-31 14:12:41', '2023-07-31 14:12:41'),
(15, '15', '2', '41.98', '37.99', '1688386007_product.webp', '2', '2', 1, '2023-08-01 18:37:07', '2023-08-01 18:37:07'),
(16, '16', '3', '62.99', '49.99', '1688385960_product.webp', '2', '2', 1, '2023-08-01 18:39:13', '2023-08-01 18:39:13'),
(17, '17', '3', '62.99', '49.99', '1688385960_product.webp', '2', '2', 1, '2023-08-02 06:06:27', '2023-08-02 06:06:27'),
(18, '18', '1', '20.99', '19.99', '1688385666_product.webp', '1', '2', 1, '2023-08-02 06:34:29', '2023-08-02 06:34:29'),
(19, '19', '1', '20.99', '19.99', '1688385666_product.webp', '1', '2', 1, '2023-08-02 06:35:15', '2023-08-02 06:35:15'),
(20, '20', '1', '20.99', '19.99', '1688385666_product.webp', '1', '2', 1, '2023-08-02 06:41:37', '2023-08-02 06:41:37'),
(21, '21', '3', '62.99', '49.99', '1688385960_product.webp', '2', '2', 1, '2023-08-02 09:41:58', '2023-08-02 09:41:58'),
(22, '22', '2', '41.98', '37.99', '1688386007_product.webp', '2', '2', 1, '2023-08-04 08:26:02', '2023-08-04 08:26:02'),
(23, '23', '2', '41.98', '37.99', '1688386007_product.webp', '2', '2', 1, '2023-08-04 09:28:55', '2023-08-04 09:28:55'),
(24, '24', '3', '62.99', '49.99', '1688385960_product.webp', '2', '2', 1, '2023-08-04 09:31:01', '2023-08-04 09:31:01'),
(25, '25', '3', '62.99', '49.99', '1688385960_product.webp', '2', '2', 1, '2023-08-04 09:32:05', '2023-08-04 09:32:05'),
(26, '26', '1', '20.99', '19.99', '1688385666_product.webp', '1', '2', 1, '2023-08-04 13:15:13', '2023-08-04 13:15:13'),
(27, '27', '2', '41.98', '37.99', '1688386007_product.webp', NULL, '2', 4, '2023-08-10 05:45:33', '2023-08-10 05:45:33'),
(28, '28', '3', '62.99', '49.99', '1688385960_product.webp', NULL, '2', 1, '2023-08-22 16:12:00', '2023-08-22 16:12:00'),
(29, '28', '2', '41.98', '37.99', '1688386007_product.webp', NULL, '2', 1, '2023-08-22 16:12:00', '2023-08-22 16:12:00');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `token` text COLLATE utf8_unicode_ci,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_reset`
--

INSERT INTO `password_reset` (`id`, `email`, `token`, `created_at`) VALUES
(1, 'abhishek.banttech@gmail.com', 'KKwRZiFwpl0bXRfgp2VhBGdm8MlrpjT2qdMKD0m9EOL8T1Pbgv2coypJwhVg7sZ0', '2023-07-27 13:56:13'),
(2, 'ammar.banttech@gmail.com', '3SaeFeGa7NBvO788FTrMHLioBRTD2GfuqavOE1pQgweDYL6mHJ2L1hxz1qN2Ry9B', '2023-07-31 13:08:43'),
(3, 'customer@customer.com', '6f72I8HthWxbqYLtoDaosuRVHVwDkM6fHFVqCVZftsFxK86EseVZ9W1SY6ltnBnY', '2023-08-08 10:26:30');

-- --------------------------------------------------------

--
-- Table structure for table `privacy_policy`
--

CREATE TABLE `privacy_policy` (
  `id` int(150) NOT NULL,
  `privacy_policy` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `privacy_policy`
--

INSERT INTO `privacy_policy` (`id`, `privacy_policy`) VALUES
(2, '<h2>Who we are</h2>\r\n\r\n<p>Our website address is: https://alternativetohrt.co.uk.</p>\r\n\r\n<h2>Comments</h2>\r\n\r\n<p>When visitors leave comments on the site we collect the data shown in the comments form, and also the visitor&rsquo;s IP address and browser user agent string to help spam detection.</p>\r\n\r\n<p>An anonymized string created from your email address (also called a hash) may be provided to the Gravatar service to see if you are using it. The Gravatar service privacy policy is available here: https://automattic.com/privacy/. After approval of your comment, your profile picture is visible to the public in the context of your comment.</p>\r\n\r\n<h2>Media</h2>\r\n\r\n<h2>Cookies</h2>\r\n\r\n<p>If you visit our login page, we will set a temporary cookie to determine if your browser accepts cookies. This cookie contains no personal data and is discarded when you close your browser.</p>\r\n\r\n<p>When you log in, we will also set up several cookies to save your login information and your screen display choices. Login cookies last for two days, and screen options cookies last for a year. If you select &ldquo;Remember Me&rdquo;, your login will persist for two weeks. If you log out of your account, the login cookies will be removed.</p>\r\n\r\n<p>If you edit or publish an article, an additional cookie will be saved in your browser. This cookie includes no personal data and simply indicates the post ID of the article you just edited. It expires after 1 day.</p>\r\n\r\n<h2>Embedded content from other websites</h2>\r\n\r\n<p>These websites may collect data about you, use cookies, embed additional third-party tracking, and monitor your interaction with that embedded content, including tracking your interaction with the embedded content if you have an account and are logged in to that website.</p>\r\n\r\n<h2>Who we share your data with</h2>\r\n\r\n<p>If you request a password reset, your IP address will be included in the reset email.</p>\r\n\r\n<h2>How long we retain your data</h2>\r\n\r\n<p>If you leave a comment, the comment and its metadata are retained indefinitely. This is so we can recognize and approve any follow-up comments automatically instead of holding them in a moderation queue.</p>\r\n\r\n<p>For users that register on our website (if any), we also store the personal information they provide in their user profile. All users can see, edit, or delete their personal information at any time (except they cannot change their username). Website administrators can also see and edit that information.</p>\r\n\r\n<h2>What rights you have over your data</h2>\r\n\r\n<p>If you have an account on this site, or have left comments, you can request to receive an exported file of the personal data we hold about you, including any data you have provided to us. You can also request that we erase any personal data we hold about you. This does not include any data we are obliged to keep for administrative, legal, or security purposes.</p>\r\n\r\n<h2>Where we send your data</h2>\r\n\r\n<p>Visitor comments may be checked through an automated spam detection service.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(100) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `multiple_images` varchar(255) NOT NULL,
  `brand_id` int(255) NOT NULL,
  `product_category_id` int(100) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `dimensions` varchar(255) NOT NULL,
  `price` double(8,2) NOT NULL,
  `reg_sel_price` varchar(255) DEFAULT NULL,
  `stockunit` int(255) NOT NULL,
  `description` longtext NOT NULL,
  `seotitle` longtext NOT NULL,
  `slug` varchar(255) NOT NULL,
  `tags` longtext NOT NULL,
  `metadescription` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `productname`, `status`, `image`, `multiple_images`, `brand_id`, `product_category_id`, `weight`, `dimensions`, `price`, `reg_sel_price`, `stockunit`, `description`, `seotitle`, `slug`, `tags`, `metadescription`) VALUES
(1, 'Natural Herbal Alternative to Taking HRT', 'Active', '1688385666_product.webp', '', 2, 2, '25gm', '25,25,50', 19.99, '20.99', 2, '<p>Natural Alternatives to HRT relieve symptoms without the side-effects and long-term risks associated with pharmaceutical HRT.</p>\r\n\r\n<p>Within 30 days many women notice a significant reduction in menopause symptoms such as:</p>\r\n\r\n<ul>\r\n	<li>Hot Flushes,</li>\r\n	<li>Night Sweats,</li>\r\n	<li>Mood Swings,</li>\r\n	<li>Irritability,</li>\r\n	<li>Headaches,</li>\r\n	<li>Sleep Disturbances,</li>\r\n	<li>Tiredness,</li>\r\n	<li>Vaginal Dryness,</li>\r\n	<li>Loss of Libido,</li>\r\n	<li>Negative Outlook,</li>\r\n	<li>Depression and Anxiety</li>\r\n</ul>', 'hrt product', 'natural-herbal-alternative-to-taking-hrt', 'hrt product', '<p>Natural Alternatives to HRT relieve symptoms without the side-effects and long-term risks associated with pharmaceutical HRT.</p>\r\n\r\n<p>Within 30 days many women notice a significant reduction in menopause symptoms such as:</p>\r\n\r\n<ul>\r\n	<li>Hot Flushes,</li>\r\n	<li>Night Sweats,</li>\r\n	<li>Mood Swings,</li>\r\n	<li>Irritability,</li>\r\n	<li>Headaches,</li>\r\n	<li>Sleep Disturbances,</li>\r\n	<li>Tiredness,</li>\r\n	<li>Vaginal Dryness,</li>\r\n	<li>Loss of Libido,</li>\r\n	<li>Negative Outlook,</li>\r\n	<li>Depression and Anxiety</li>\r\n</ul>'),
(2, 'Natural Herbal Alternative to Taking HRT – Pack of 2 Bottles', 'Active', '1688386007_product.webp', '', 2, 2, '25gm', '25,25,50', 37.99, '41.98', 2, '<p>Natural Alternatives to HRT relieve symptoms without the side-effects and long-term risks associated with pharmaceutical HRT.</p>\r\n\r\n<p>Within 30 days many women notice a significant reduction in menopause symptoms such as:</p>\r\n\r\n<ul>\r\n	<li>Hot Flushes,</li>\r\n	<li>Night Sweats,</li>\r\n	<li>Mood Swings,</li>\r\n	<li>Irritability,</li>\r\n	<li>Headaches,</li>\r\n	<li>Sleep Disturbances,</li>\r\n	<li>Tiredness,</li>\r\n	<li>Vaginal Dryness,</li>\r\n	<li>Loss of Libido,</li>\r\n	<li>Negative Outlook,</li>\r\n	<li>Depression and Anxiety</li>\r\n</ul>', 'hrt product', 'natural-herbal-alternative-to-taking-hrt-pack-of-2-bottles', 'hrt product', '<p>Natural Alternatives to HRT relieve symptoms without the side-effects and long-term risks associated with pharmaceutical HRT.</p>\r\n\r\n<p>Within 30 days many women notice a significant reduction in menopause symptoms such as:</p>\r\n\r\n<ul>\r\n	<li>Hot Flushes,</li>\r\n	<li>Night Sweats,</li>\r\n	<li>Mood Swings,</li>\r\n	<li>Irritability,</li>\r\n	<li>Headaches,</li>\r\n	<li>Sleep Disturbances,</li>\r\n	<li>Tiredness,</li>\r\n	<li>Vaginal Dryness,</li>\r\n	<li>Loss of Libido,</li>\r\n	<li>Negative Outlook,</li>\r\n	<li>Depression and Anxiety</li>\r\n</ul>'),
(3, 'Natural Herbal Alternative to Taking HRT – Pack of 3 Bottles', 'Active', '1688385960_product.webp', '', 2, 2, '25gm', '25,25,50', 49.99, '62.99', 2, '<p>Natural Alternatives to HRT relieve symptoms without the side-effects and long-term risks associated with pharmaceutical HRT.</p>\r\n\r\n<p>Within 30 days many women notice a significant reduction in menopause symptoms such as:</p>\r\n\r\n<ul>\r\n	<li>Hot Flushes,</li>\r\n	<li>Night Sweats,</li>\r\n	<li>Mood Swings,</li>\r\n	<li>Irritability,</li>\r\n	<li>Headaches,</li>\r\n	<li>Sleep Disturbances,</li>\r\n	<li>Tiredness,</li>\r\n	<li>Vaginal Dryness,</li>\r\n	<li>Loss of Libido,</li>\r\n	<li>Negative Outlook,</li>\r\n	<li>Depression and Anxiety</li>\r\n</ul>', 'hrt product', 'natural-herbal-alternative-to-taking-hrt-pack-of-3-bottles', 'hrt product', '<p>Natural Alternatives to HRT relieve symptoms without the side-effects and long-term risks associated with pharmaceutical HRT.</p>\r\n\r\n<p>Within 30 days many women notice a significant reduction in menopause symptoms such as:</p>\r\n\r\n<ul>\r\n	<li>Hot Flushes,</li>\r\n	<li>Night Sweats,</li>\r\n	<li>Mood Swings,</li>\r\n	<li>Irritability,</li>\r\n	<li>Headaches,</li>\r\n	<li>Sleep Disturbances,</li>\r\n	<li>Tiredness,</li>\r\n	<li>Vaginal Dryness,</li>\r\n	<li>Loss of Libido,</li>\r\n	<li>Negative Outlook,</li>\r\n	<li>Depression and Anxiety</li>\r\n</ul>'),
(4, 'Natural Herbal Alternative to Taking HRT – Pack of 4 Bottles', 'Active', '1688385764_product.webp', '16914767243.webp,16914820304.webp,16914821955.webp', 2, 2, '252gm', '25,25,50', 59.97, '83.96', 0, '<p>Natural Alternatives to HRT relieve symptoms without the side-effects and long-term risks associated with pharmaceutical HRT.</p>\r\n\r\n<p>Within 30 days many women notice a significant reduction in menopause symptoms such as:</p>\r\n\r\n<ul>\r\n	<li>Hot Flushes,</li>\r\n	<li>Night Sweats,</li>\r\n	<li>Mood Swings,</li>\r\n	<li>Irritability,</li>\r\n	<li>Headaches,</li>\r\n	<li>Sleep Disturbances,</li>\r\n	<li>Tiredness,</li>\r\n	<li>Vaginal Dryness,</li>\r\n	<li>Loss of Libido,</li>\r\n	<li>Negative Outlook,</li>\r\n	<li>Depression and Anxiety</li>\r\n</ul>', 'hrt product', 'natural-herbal-alternative-to-taking-hrt-pack-of-4-bottles', 'hrt product,Headaches,Tiredness', '<p>Natural Alternatives to HRT relieve symptoms without the side-effects and long-term risks associated with pharmaceutical HRT.</p>\r\n\r\n<p>Within 30 days many women notice a significant reduction in menopause symptoms such as:</p>\r\n\r\n<ul>\r\n	<li>Hot Flushes,</li>\r\n	<li>Night Sweats,</li>\r\n	<li>Mood Swings,</li>\r\n	<li>Irritability,</li>\r\n	<li>Headaches,</li>\r\n	<li>Sleep Disturbances,</li>\r\n	<li>Tiredness,</li>\r\n	<li>Vaginal Dryness,</li>\r\n	<li>Loss of Libido,</li>\r\n	<li>Negative Outlook,</li>\r\n	<li>Depression and Anxiety</li>\r\n</ul>');

-- --------------------------------------------------------

--
-- Table structure for table `productcategory`
--

CREATE TABLE `productcategory` (
  `id` int(100) NOT NULL,
  `categoryname` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productcategory`
--

INSERT INTO `productcategory` (`id`, `categoryname`, `slug`) VALUES
(2, 'Health Supplement', 'health-supplement'),
(4, 'testing', 'testing');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role_name`) VALUES
(1, 'admin'),
(2, 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `success_stories`
--

CREATE TABLE `success_stories` (
  `id` int(100) NOT NULL,
  `description` longtext NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `success_stories`
--

INSERT INTO `success_stories` (`id`, `description`, `name`) VALUES
(7, '\"Great capsules. No more night sweats or hot flushes. Good to know my body is receiving all the vitamins it needs.\"	', 'Beverley Ramsay'),
(8, '\"Love this product, has really kept me calm while going through the peri menopause, heart racing stopped and crying and emotional spats have stopped and generally my head feels clearer too, well worth the money.\"', 'Tracey L'),
(10, '<p>&quot;I&rsquo;ve taken these natural herbal tablets for a long time to help with menopause symptoms but my energy levels and my mood have improved with these.&quot;</p>', 'Jo Kennedy');

-- --------------------------------------------------------

--
-- Table structure for table `terms_conditions`
--

CREATE TABLE `terms_conditions` (
  `id` int(150) NOT NULL,
  `terms_conditions` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `terms_conditions`
--

INSERT INTO `terms_conditions` (`id`, `terms_conditions`) VALUES
(4, '<h1>Terms &amp; Conditions</h1>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `role_id` int(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `firstname`, `lastname`, `image`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 'admin@admin.com', '$2y$10$l8raa4lhA1FmgkKEo15J6uhnWRdQncyrWZgEjcQlScLLBqeXbUZsa', 'Tanmay', 'Anand', '1690015618_wellness_blog.jpg', 1, '2023-06-13 12:23:56', NULL),
(2, 'customer@customer.com', '$2y$10$ojLQF4PkvDBuMZP5v7v1sea3xMIdx9ltpdH6R2f59VUSS3t6XkOSS', 'customer', 'banttech', '', 2, '2023-06-14 13:01:58', '2023-08-08 10:26:32'),
(10, 'arushi@gmail.com', '$2y$10$t4Lu00xZNN.YZMOvwF8ho.xovXP0RqmXG4UTkhmgAvWL.SBxBwUUy', 'arushi', 'gupta', '', 2, '2023-06-20 17:13:20', NULL),
(11, 'sumit@gmail.com', '$2y$10$qnMcSm9Qken6NR51g7bQa.eu7xDZ/Gv7aiNdzHrxTHXTVrzzaVZoK', 'sumit', 'shrma', '', 2, '2023-06-20 17:15:37', NULL),
(12, 'arushi88@gmail.com', '$2y$10$V1p5MLtX//TZvru9rNVpvOh61bGP6P73dFU3UrGeEWsjtnNhhpZs2', 'arushi', 'shrma', '', 2, '2023-06-20 17:19:12', NULL),
(13, 'amit@gmail.com', '$2y$10$VF93nQSKCfrWzFNiEBJrm.50HZXkWsGV6nex9tyqmbQZht8HwGKWi', 'faizan', 'faiz', '', 2, '2023-06-20 17:27:34', NULL),
(14, 'abhi@gmail.com', '$2y$10$DMeHQjos3pryWv9WfjuTKOUdU.BpWfMaS.1Gq/vQR/UDK8Vh09Fxm', 'arushi', 'gupta', '', 2, '2023-06-20 17:53:58', NULL),
(15, 'hemant12345678@gmail.com', '$2y$10$.e4pG.EV8N2RIyJg/KgQ3.RR3hZY09KH6YOOYsE4C7o7sIAeOungi', 'hemant', 'banttech', '', 2, '2023-06-21 18:06:40', NULL),
(17, 'ilu1212@gmail.com', '$2y$10$WbqJvVE1z2S/uLDTrodppuDaBGFMLOVUIDswWkYR0FwQ9WaufLePm', 'raj', 'pandey', '', 2, '2023-06-26 13:12:51', NULL),
(18, 'abhishek.banttech@gmail.com', '$2y$10$1KCBX2Za7PGjVOyZXvAInuAs0lC6zNy.zXRTNUyzPjUhWJeDxaYDy', 'arushi', 'gupta', '', 2, '2023-06-26 18:29:27', NULL),
(19, 'abhishektech8853@gmail.com', '$2y$10$EeEdvFIbGzv9XuZv681h5.15mng2vB2FTMzVg.eSjNyESeGT0Xmge', 'Abhishek', 'Pandey', '', 2, '2023-06-27 13:36:42', NULL),
(20, 'ammar.banttech@gmail.com', '$2y$10$98uZrLlrzw.mHMcYTIG3vOYHVqDqulfOn8quH4DjSSY90lkUOUo3a', 'Ammar', 'Ali', '', 2, '2023-07-07 17:45:00', '2023-07-31 13:09:05'),
(21, 'ammar1.banttech@gmail.com', '$2y$10$l8raa4lhA1FmgkKEo15J6uhnWRdQncyrWZgEjcQlScLLBqeXbUZsa', 'Ammar', 'Ali', '', 2, '2023-07-07 17:54:10', NULL),
(22, 'ammar2.banttech@gmail.com', '$2y$10$CcE5xMnnSfVEEbxXKUqA2.GLLxByxdkOM.iC4fceTZpQTM7mcJMSu', 'Ammar', 'Ali', '', 2, '2023-07-07 17:55:41', NULL),
(23, 'ammar1@gmail.com', '$2y$10$tBCBCgDN5LWx0Nc1FbG.hevrvWq3OmEua0/mdvFOjahJOHSoLa5p6', 'Ammar', 'Ali', '', 2, '2023-07-08 11:17:59', NULL),
(24, 'tanmay@banttech.com', '$2y$10$6m39b5bU2/YGldMgqmowPeD86KNZrZPZXx68x58miZEITXTNGgHhe', 'Tanmay', 'Anand', '', 2, '2023-07-10 00:09:57', NULL),
(25, 'abhi76378@gmal.com', '$2y$10$ZyOTlEjbippT4o4AXjuOt.mBAd4Z0mZ8tmvKI/N0MZjpunpNedOdS', 'akash', 'sharma', NULL, 2, '2023-07-22 11:45:19', NULL),
(26, 'hemnt12@gmail.com', '$2y$10$moOn7s/ydeRCCyNAiUz60uN3HdrwlWpv4tQDTNCpotQd7x/Z4TTcK', 'hemnt12', 'hemnt12', NULL, 2, '2023-07-22 11:47:22', NULL),
(27, 'ABHI@87', '$2y$10$iVW9vFii10wHrcLts1Jy7OK3uxRcLAD2/c495c0CLHd7aKOHCKbDq', 'abhishek', 'sharma', NULL, 2, '2023-07-22 11:49:36', NULL),
(28, 'ABHI@8712', '$2y$10$xJfTYO9Jytq8aSXdoQ98b.MgvtvG/5GD0gEiaLCz3Q26JfVIRInVu', 'abhishek', 'sharma', NULL, 2, '2023-07-22 11:51:15', NULL),
(29, 'asdf@gmail.com', '$2y$10$KzfUGkB2qJvmxYPOxhyeKu.IsBOPwqxNRj8JhjvzrH2D9qse.lxG6', 'akash', 'sharma', NULL, 2, '2023-07-22 12:39:32', NULL),
(30, 'abhi@1212', '$2y$10$AFb7vEc.jbe7hn1wQANZSu4GlGj6p6oAIXWq5KTtyMWx4X.euC1P6', 'akash', 'sharma', NULL, 2, '2023-07-22 12:44:05', NULL),
(31, 'akash.banttech@gmail.com', '$2y$10$KzDlND5d2WtL0FDPpLHR4O/MvkdiYRAAWefS1FCnnq6PJvzPoAaDy', 'akash', 'sharma', NULL, 2, '2023-07-27 13:40:25', NULL),
(32, 'tanmay@gmail.com', '$2y$10$eFeYcrj1NfJ/qioK0rDTzu0A.85xl92kYU/LV0EhpA844EyGsPawO', 'Tanmay sir', 'alsekdfh;k', NULL, 2, '2023-07-27 19:42:00', NULL),
(33, 'anjali@gmail.com', '$2y$10$t6JGXLRNsI45nOBDcIz4QevlkXbUlDvI/NhePLG1Ba/mK255DGVze', 'Anjali', 'mishra', NULL, 2, '2023-07-31 12:50:25', NULL),
(34, 'arushi88532@gmail.com', '$2y$10$Lge7pqQNi8C.U4pKCx.6JOuH4yfbBBD/3SfeUVJcLoVcSLqmws13i', 'arushi', 'gupta', NULL, 2, '2023-08-04 12:20:12', NULL),
(37, 'abhishek12@gmail.com', '$2y$10$R04rTFHN.BzAVVyjJvSzgeyBqzyMqye51fHNVS6hMGne3hRIhHCWC', 'abhishek', 'pandey123', NULL, 2, '2023-08-10 11:21:38', NULL),
(38, 'abhishek@gmail.com', '$2y$10$OClYTVQiO6gpignW0eimB.gA4//P6RSvAdzpyBUrvMC5YzjyIUMHu', 'abhishek', 'pandey', NULL, 2, '2023-08-17 16:35:41', NULL),
(39, 'bollykidz@gmail.com', '$2y$10$y16rtTu91Z5nnOFI3HZsFOKzxgSUA7s0YcR.hy7brGKxBpim.qT4W', 'Tamanna', 'soni', NULL, 2, '2023-08-22 21:34:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_billing_address`
--

CREATE TABLE `user_billing_address` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `firstname` varchar(150) NOT NULL,
  `lastname` varchar(150) NOT NULL,
  `companyname` varchar(255) DEFAULT NULL,
  `region` varchar(255) NOT NULL,
  `streetaddress` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) DEFAULT NULL,
  `postcode` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_billing_address`
--

INSERT INTO `user_billing_address` (`id`, `user_id`, `firstname`, `lastname`, `companyname`, `region`, `streetaddress`, `city`, `country`, `postcode`, `phone`, `email`) VALUES
(1, 0, 'abhishek', 'pandey', 'banttech', 'up', 'nakatiya bareilly', 'bareilly', 'India', '243123', '6396154512', 'abhishek@gmail.com'),
(2, 0, 'asdf', 'asd', NULL, 'asd', 'asdf', 'asd', 'asd', 'asdf', 'asf', 'abhishek@56gmail.com'),
(3, 2, 'abhishek', 'pandey', 'banttech', 'BT', 'nakatiya bareilly', 'bareilly', NULL, '243123', '06396154512', 'sumit@gmail.com'),
(4, 10, 'arushi', 'pandey', 'banttech', 'up', 'nakatiya bareilly', 'bareilly', 'India', '243123', '06396154512', 'sumit@gmail.com'),
(7, 21, 'Ammar', 'Ali', 'test', 'PK', 'Sargodha pakistan', 'Sargodha', 'Algeria', '9099', '09000900', 'ammar.banttech@gmail.com'),
(8, 31, 'akash', 'sharma', 'india', 'IN', 'nakatia', 'bareilly', 'India', '243123', '6369625362', 'akash@gmail.com'),
(9, 20, 'ammar', 'ali', NULL, 'GB', 'sargodha', 'sargodha', NULL, '40100', '03041705101', 'ammar.banttech@gmail.com'),
(10, 35, 'arushi', 'gupta', 'banttech', 'IN', '15', 'bareilly', NULL, '243123', '6396151515', 'arushi7070@gmail.com'),
(11, 36, 'abhishek', 'abhishek', 'banttech', 'GB', 'bareilly', 'bareilly', 'Burundi', '243123', '6363.636263', 'techabhishek8853@gmail.com'),
(12, 39, 'Tamanna', 'soni', 'Natural Juices & Vitamins Ltd', 'GB', '30 Kings Avenue', 'Sunbury-on-Thames', 'Middlesex', 'TW16 7QE', '07939066943', 'admin@naturaljuices.co.uk');

-- --------------------------------------------------------

--
-- Table structure for table `user_shipping_address`
--

CREATE TABLE `user_shipping_address` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `companyname` varchar(255) DEFAULT NULL,
  `region` varchar(255) NOT NULL,
  `streetaddress` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) DEFAULT NULL,
  `postcode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_shipping_address`
--

INSERT INTO `user_shipping_address` (`id`, `user_id`, `firstname`, `lastname`, `companyname`, `region`, `streetaddress`, `city`, `country`, `postcode`) VALUES
(1, 0, 'abhishek', 'pandey', NULL, 'up', 'nakatiya bareilly', 'bareilly', 'India', '243123'),
(2, 0, 'abhishek banttech', 'pandey', 'banttech', 'up', 'nakatiya bareilly', 'bareilly', 'India', '243123'),
(3, 2, 'akash', 'sharma', 'banttech', 'AL', 'nakatiya bareilly', 'bareilly', 'India', '243123'),
(4, 21, 'Ammar', 'Ali', 'test', 'PK', 'Sargodha pakistan', 'Sargodha', 'Algeria', '9099'),
(5, 20, 'ammar', 'ali', NULL, 'GB', 'sargodha', 'sargodha', NULL, '40100'),
(6, 35, 'arushi', 'gupta', 'banttech', 'IN', '15', 'bareilly', NULL, '243123'),
(7, 36, 'arushi', 'abhishek', 'banttech', 'TC', 'bareilly', 'bareilly', 'Burundi', '63636263'),
(8, 39, 'Tamanna', 'soni', 'Natural Juices & Vitamins Ltd', 'GB', '30 Kings Avenue', 'Sunbury-on-Thames', 'Middlesex', 'TW16 7QE');

-- --------------------------------------------------------

--
-- Table structure for table `wellness_blog`
--

CREATE TABLE `wellness_blog` (
  `id` int(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category_id` varchar(255) NOT NULL,
  `image` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `tags` longtext,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wellness_blog`
--

INSERT INTO `wellness_blog` (`id`, `title`, `description`, `slug`, `category_id`, `image`, `name`, `tags`, `date`) VALUES
(9, 'Natural Remedies For Menopause – Alternative to HRT', '<p>Menopause is a phase in a woman&#39;s life when the production of reproductive hormones reduces, and menstruation ceases. Typically, this happens between the ages of 45 and 50, even though it may occur earlier or later in some women. Let us discuss what are <strong>Natural Remedies For Menopause</strong> an <strong>alternative to HRT</strong>.<br />\r\n<!--more--></p>\r\n\r\n<p><strong>Menopause</strong> can bring about various unpleasant <strong>symptoms</strong> that may last for months or even years. These symptoms occur about 12 months after a woman&#39;s last period.</p>\r\n\r\n<p>Women experience one or more symptoms such as:</p>\r\n\r\n<p>Irregular periods</p>\r\n\r\n<p>Night sweats</p>\r\n\r\n<p>Hot flashes</p>\r\n\r\n<p>Irritability</p>\r\n\r\n<blockquote>\r\n<p>Vaginal dryness</p>\r\n\r\n<p>Chills</p>\r\n\r\n<p>Brain fog</p>\r\n\r\n<p>Problems sleeping</p>\r\n\r\n<p>Mood problems</p>\r\n\r\n<p>Memory and concentration problems</p>\r\n\r\n<p>Reduced sex drive</p>\r\n\r\n<p>Fatigue or tiredness</p>\r\n\r\n<p>Weight gain</p>\r\n\r\n<p>Hair or skin changes</p>\r\n\r\n<p>Loss of breast fullness</p>\r\n</blockquote>\r\n\r\n<p><img alt=\"Natural Remedies for Menopause.\" src=\"https://alternativetohrt.co.uk/wp-content/uploads/2022/04/shutterstock_1951838617-min-1024x866.jpg\" style=\"height:829px; width:980px\" /></p>\r\n\r\n<p>When these symptoms persist, they may significantly impact a woman&#39;s mental health, causing her quality of life to dwindle. Often, women turn to&nbsp;<strong><a href=\"https://www.nhs.uk/conditions/hormone-replacement-therapy-hrt/\" target=\"_blank\">Hormone Replacement Therapy (HRT)</a></strong>&nbsp;to help treat their symptoms and feel better again. However, due to the associated risks of HRT and the cost of treatment, most women are now interested in finding an <strong>Alternative to Hormone Replacement Therapy</strong>. They&#39;re now going for <strong>Natural Alternative to Hormone Replacement Therapy</strong> and <strong>Herbal Alternative to Hormone Replacement Therapy</strong>.</p>\r\n\r\n<p><img alt=\"Alternative to HRT\" src=\"https://alternativetohrt.co.uk/wp-content/uploads/2022/04/shutterstock_1657143847-min-1024x455.jpg\" style=\"height:435px; width:980px\" /></p>\r\n\r\n<p>If you&#39;re dealing with <strong>menopause symptoms</strong> and need <strong>natural alternatives to HRT</strong> that can reduce or manage them, here are proven natural remedies to help you manage your situation.</p>\r\n\r\n<h2><strong>Some Natural Remedies for Menopause. Treatment Alternate to HRT&nbsp;</strong></h2>\r\n\r\n<h2><strong>1. Regular Exercise</strong></h2>\r\n\r\n<p>For individuals having sleeping difficulty, regular exercise may help them fall asleep quicker and for a more extended period. Especially when you practice Pilates-based exercise programs, you tend to enjoy an improved energy and metabolism level, reduced stress levels, improved mood, healthier joints and bones, and better sleep.</p>\r\n\r\n<p>Regular exercise can also help you combat weight gain symptoms of menopause by burning more calories, thereby protecting you against calorie-related health issues such as type 2 diabetes, high blood pressure, obesity, stroke, etc.</p>\r\n\r\n<h2><strong>2. Eat More Calcium and Vitamin D</strong></h2>\r\n\r\n<p>One of the most common symptoms of menopause is fatigue or tiredness, which is caused by hormonal changes. Women tend to experience bone weakness during this phase, increasing their risks of osteoporosis.</p>\r\n\r\n<p>One effective way to solve bone weakness issues during menopause is to increase calcium and vitamin D intake. This is because these two nutrients play a vital role in bone health; thus, increasing their consumption will help your bones become stronger and healthier.</p>\r\n\r\n<ul>\r\n	<li>Examples of foods rich in calcium include</li>\r\n</ul>\r\n\r\n<pre>\r\n&ndash;dairy products like milk, yoghurt, and cheese.\r\n&ndash;dark green, leafy vegetables like collard greens, cooked kale, and spinach\r\n&ndash;canned salmon, figs, tofu, beans, sardines, etc.</pre>\r\n\r\n<ul>\r\n	<li>Examples of foods rich in vitamin D include</li>\r\n</ul>\r\n\r\n<pre>\r\n&ndash;herring and sardines\r\n&ndash;salmon\r\n&ndash;canned tuna\r\n&ndash;egg yolks, etc.</pre>\r\n\r\n<h2><strong>3. Incorporate lots of fruits into your diet</strong></h2>\r\n\r\n<p>Studies have revealed that incorporating lots of fruits into your diet can help reduce the symptoms of menopause dramatically. Fruits are highly rich in fibre and low in calories, so consuming them helps you enjoy the feeling of satiety without consuming many calories.</p>\r\n\r\n<p>Due to this, you&#39;re less likely to gain weight during this phase, thus preventing you from obesity, diabetes, heart issues, and other related health problems. Some of the best fruits to consume for menopause are citrus fruits such as oranges, limes, lemons, citrons, grapefruit, kumquats, ugli fruit, etc.</p>\r\n\r\n<h2><strong>4. Keep Off Trigger Foods</strong></h2>\r\n\r\n<p>During menopause, you may notice that certain foods may cause you to experience some symptoms or make already existing symptoms more severe. It&#39;s essential to keep off these foods that trigger menopause symptoms to help you reduce the challenges of this phase.</p>\r\n\r\n<p>Foods like caffeine, alcohol, and sugary or spicy meals may trigger hot flashes, mood changes, and night sweats. Thus, you want to minimize or completely avoid them until your body is ready for them.</p>\r\n\r\n<h2><strong>5. Increase the consumption of iron-rich foods</strong></h2>\r\n\r\n<p>Iron is a crucial mineral required for proper body functionality. It&#39;s found mostly in red blood cells, where it helps produce blood, boost the immune system, etc. Studies have revealed that you can reduce menopause symptoms like hot flashes, insomnia (sleeping difficulty), and irritability by increasing iron intake.</p>\r\n\r\n<p>Examples of foods high in iron include:</p>\r\n\r\n<ul>\r\n	<li>nuts (especially cashew nuts)</li>\r\n	<li>dried fruit</li>\r\n	<li>wholemeal pasta and bread</li>\r\n	<li>iron-fortified bread and breakfast cereal</li>\r\n	<li>legumes (mixed beans, baked beans, lentils, chickpeas)</li>\r\n	<li>dark leafy green vegetables (spinach, kale, asparagus, silverbeet, broccoli)</li>\r\n	<li>oats</li>\r\n	<li>tofu</li>\r\n	<li>fortified breakfast cereals</li>\r\n	<li>white beans and kidney beans</li>\r\n	<li>dark chocolate</li>\r\n	<li>tomatoes</li>\r\n</ul>\r\n\r\n<h2><strong>6. Increase the consumption of iron-rich foods</strong></h2>\r\n\r\n<p>These two natural remedies are highly effective for treating vaginal symptoms such as vaginal dryness and others. Due to the presence of phytoestrogen, wild yam cream can relieve hot flashes, while consuming wild yam itself can help minimize or eliminate vaginal dryness.</p>\r\n\r\n<p>Vaginal dryness is one of the causes of reduced sex drive since the friction from insufficient lubrication during sex causes intercourse to feel painful. Plus, the vagina may suffer bruises due to the friction, making the area irritable. But with wild yam, you can make things oilier down there and experience more enjoyable sex.</p>\r\n\r\n<p>Practising kegel exercise also makes your pelvic floor muscles stronger and tightens your vagina, thereby making sex more pleasurable. To practice the Kegal exercise, follow the steps below:</p>\r\n\r\n<ul>\r\n	<li>empty your bladder and imagine you are sitting on a marble</li>\r\n	<li>tighten your pelvic muscles as though you&#39;re lifting the marble, and count three to five seconds</li>\r\n	<li>Repeat the process three times daily (morning, afternoon, and evening) while doing 10 to 15 repetitions each time.</li>\r\n</ul>\r\n\r\n<h2><strong>Natural Herbal Alternative To HRT</strong></h2>\r\n\r\n<p>Finally, one popular product that has helped many women manage menopause symptoms and feel more at ease during the phase is the &quot;<a href=\"https://alternativetohrt.co.uk/product/natural-herbal-alternative-to-taking-hrt-pack-of-4-bottles/\">Natural Herbal Alternative to HRT</a>.&quot; Made from the seven essential herbs for combating menopause symptoms, the <a href=\"https://alternativetohrt.co.uk/product/natural-herbal-alternative-to-taking-hrt/\">Natural Herbal Alternative to HRT</a> product has been proven to be highly effective with zero side effects.</p>\r\n\r\n<p><a href=\"https://alternativetohrt.co.uk/product/natural-herbal-alternative-to-taking-hrt-pack-of-4-bottles/\"><img alt=\"Natural Herbal Alternative to Taking HRT\" src=\"https://alternativetohrt.co.uk/wp-content/uploads/2021/04/Custom-dimensions-1000x1000-px.jpeg\" style=\"height:600px; width:600px\" /></a></p>\r\n\r\n<p>The herbs used in forming this one-of-a-kind product include:</p>\r\n\r\n<ul>\r\n	<li>Soy Isoflavones</li>\r\n	<li>Red Clover (Trifolium Pratense)</li>\r\n	<li>Sage</li>\r\n	<li>Agnus Castus (Vitex Agnus Castus)</li>\r\n	<li>Wild Yam (Dioscorea Villosa)</li>\r\n	<li>Dong Quai (Angelica Sinensis)</li>\r\n	<li>Hops</li>\r\n</ul>\r\n\r\n<p>Women who used this product have reported enjoying higher energy levels, deeper and longer sleep duration, improved mood and mental well-being, relief from tiredness, irritability, headaches, etc. Interestingly, the product supports women through all stages of menopause, helping them worry less about menopause symptoms.</p>\r\n\r\n<p><!-- wp:paragraph --></p>\r\n\r\n<p><!-- /wp:paragraph --></p>', 'natural-remedies-for-menopause-alternative-to-hrt', '1', '1687425614_wellness_blog.webp', 'Jermainechi', 'hrt blog', '2022-04-11 18:30:18'),
(10, 'Are You Searching For 5 Natural Treatment To Hot Flushes?', '<p>How would you like a <strong>5</strong> <strong>natural treatment to hot flushes for menopause</strong> that helps alleviate your symptoms? There are no nasty chemicals or doses of hormones. And, as a bonus, unlike pharmaceutical-based products, there are no side effects. Our <strong>5 natural treatment to hot flushes</strong> <strong>for menopause,</strong> night sweats, and brain fog are 100% natural. It&rsquo;s made from the best herbal ingredients that work as a <strong>natural alternative to Hormone Replacement Therapy (HRT)</strong>.</p>\r\n\r\n<p><!--{C}%3C!%2D%2D%7BC%7D%253C!%252D%252D%2520%252Fwp%253Aparagraph%2520%252D%252D%253E%2D%2D%3E--><!--{C}%3C!%2D%2D%7BC%7D%253C!%252D%252D%2520wp%253Aparagraph%2520%252D%252D%253E%2D%2D%3E--></p>\r\n\r\n<p>Menopause happens to every woman, and typically begins between the ages of 45 and 60. The symptoms are wide-ranging and, unfortunately, they can severely reduce your quality of life. Hot flushes, nightwear, brain fog, memory problems, concentration problems and so the list goes on. They range in severity too. Women across the world are turning to <strong>natural treatment to combat hot flushes for menopause</strong>.</p>\r\n\r\n<p><!--{C}%3C!%2D%2D%7BC%7D%253C!%252D%252D%2520%252Fwp%253Aparagraph%2520%252D%252D%253E%2D%2D%3E--><!--{C}%3C!%2D%2D%7BC%7D%253C!%252D%252D%2520wp%253Aparagraph%2520%252D%252D%253E%2D%2D%3E--></p>\r\n\r\n<p>Hot flushes - known as hot flashes in the US - are an extremely common symptom of the menopause transition. When they&#39;re experienced at night they&#39;re called night sweats. While your hormones go through a period of imbalance, your body&#39;s chemistry is changing. Estrogen and Progesterone are produced in smaller quantities. As your body goes through the stages of withdrawal, you can experience life-altering symptoms. For these symptoms, there are <strong>natural alternatives to Hormone Replacement Therapy available</strong>.</p>\r\n\r\n<p><!--{C}%3C!%2D%2D%7BC%7D%253C!%252D%252D%2520%252Fwp%253Aparagraph%2520%252D%252D%253E%2D%2D%3E--><!--{C}%3C!%2D%2D%7BC%7D%253C!%252D%252D%2520wp%253Aparagraph%2520%252D%252D%253E%2D%2D%3E--></p>\r\n\r\n<p>In place of <strong>natural treatment to combat hot flushes for menopause</strong>, some women opt for HRT, but this isn&#39;t the choice of every woman. Some women can&#39;t access HRT due to pre-existing health conditions. The cost of treatment (in time and money) can soon add up. Today, there is a greater focus on natural products - rather than relying on pharmaceuticals. More people than ever are interested in holistic medicine and organic foods - and those experiencing menopause deserve natural remedies too. If you&#39;re looking for a <strong>herbal alternative to HRT</strong> and a <strong>natural remedy for hot flushes, </strong>Natural Juices&rsquo; health supplement will change your life.</p>\r\n\r\n<p><strong>A</strong> <strong>Natural Treatment To Combat Hot Flushes for Night Sweats and Hot Flushes</strong></p>\r\n\r\n<p><!--{C}%3C!%2D%2D%7BC%7D%253C!%252D%252D%2520%252Fwp%253Aheading%2520%252D%252D%253E%2D%2D%3E--><!--{C}%3C!%2D%2D%7BC%7D%253C!%252D%252D%2520wp%253Aparagraph%2520%252D%252D%253E%2D%2D%3E--></p>\r\n\r\n<p>Natural Juices&rsquo; powerful <strong>natural alternative to HRT</strong> is a non-pharmaceutical remedy for bothersome symptoms that have taken over your life. It&#39;s 100% tested and confirmed as a product that&#39;ll help you manage and control symptoms of menopause. It targets your physical symptoms and provides a sense of well-being and relief. Anxiety, irritability, and feeling out of control will be a thing of the past.</p>\r\n\r\n<p><!--{C}%3C!%2D%2D%7BC%7D%253C!%252D%252D%2520%252Fwp%253Aparagraph%2520%252D%252D%253E%2D%2D%3E--><!--{C}%3C!%2D%2D%7BC%7D%253C!%252D%252D%2520wp%253Aimage%2520%257B%2522align%2522%253A%2522center%2522%252C%2522id%2522%253A16976%252C%2522sizeSlug%2522%253A%2522full%2522%252C%2522linkDestination%2522%253A%2522none%2522%257D%2520%252D%252D%253E%2D%2D%3E--></p>\r\n\r\n<p><img alt=\"\" src=\"https://alternativetohrt.co.uk/wp-content/uploads/2022/10/Natural-Treatment-for-Night-Sweats-and-Hot-Flushes.webp\" /></p>\r\n\r\n<p><!--{C}%3C!%2D%2D%7BC%7D%253C!%252D%252D%2520%252Fwp%253Aimage%2520%252D%252D%253E%2D%2D%3E--><!--{C}%3C!%2D%2D%7BC%7D%253C!%252D%252D%2520wp%253Aparagraph%2520%252D%252D%253E%2D%2D%3E--></p>\r\n\r\n<p>It&#39;s 97% effective during hot flushes. Hot flushes don&#39;t just affect your body temperature - they make you feel uncomfortable in your skin. They come with mood swings - and you deserve to have some peace without feeling irritated constantly. By reducing the severity of your hot flushes, you can begin to lead a normal life again.</p>\r\n\r\n<p><!--{C}%3C!%2D%2D%7BC%7D%253C!%252D%252D%2520%252Fwp%253Aparagraph%2520%252D%252D%253E%2D%2D%3E--><!--{C}%3C!%2D%2D%7BC%7D%253C!%252D%252D%2520wp%253Aparagraph%2520%252D%252D%253E%2D%2D%3E--></p>\r\n\r\n<p><strong>Herbal remedies for night sweats and hot flushes</strong> will give you relief from symptoms of menopause without the need for hormone replacement therapy.</p>\r\n\r\n<p><!--{C}%3C!%2D%2D%7BC%7D%253C!%252D%252D%2520%252Fwp%253Aparagraph%2520%252D%252D%253E%2D%2D%3E--><!--{C}%3C!%2D%2D%7BC%7D%253C!%252D%252D%2520wp%253Aparagraph%2520%252D%252D%253E%2D%2D%3E--></p>\r\n\r\n<p>This natural dietary alternative to HRT contains 7 herbs proven to work against the many symptoms of menopause.</p>\r\n\r\n<p><!--{C}%3C!%2D%2D%7BC%7D%253C!%252D%252D%2520%252Fwp%253Aparagraph%2520%252D%252D%253E%2D%2D%3E--><!--{C}%3C!%2D%2D%7BC%7D%253C!%252D%252D%2520wp%253Alist%2520%257B%2522ordered%2522%253Atrue%252C%2522type%2522%253A%25221%2522%257D%2520%252D%252D%253E%2D%2D%3E--></p>\r\n\r\n<ol>\r\n	<li>Soy Isoflavones - there is substantial evidence that this helps alleviate the symptoms of menopause and especially helps lessen the frequency and intensity of hot flushes.</li>\r\n	<li>Red Clover - reduces hot flashes and mood swings while encouraging a positive mindset overall.</li>\r\n	<li>Sage - anti-oxidant and anti-inflammatory to help manage your symptoms.</li>\r\n	<li><a href=\"https://en.wikipedia.org/wiki/Vitex_agnus-castus\" target=\"_blank\">Agnus Castus</a> - used in particular to combat hot flushes and night sweats.</li>\r\n	<li>Wild Yam - An anti-oxidant for improving your symptoms overall.</li>\r\n	<li>Dong Quai - known as &#39;the female tonic&#39;, it&#39;s a natural remedy for hot flushes and night sweats.</li>\r\n	<li>Hops - helps improve your mood and overall outlook while you&rsquo;re experiencing the troubles of menopause.</li>\r\n</ol>\r\n\r\n<p><!--{C}%3C!%2D%2D%7BC%7D%253C!%252D%252D%2520%252Fwp%253Alist%2520%252D%252D%253E%2D%2D%3E--><!--{C}%3C!%2D%2D%7BC%7D%253C!%252D%252D%2520wp%253Aparagraph%2520%252D%252D%253E%2D%2D%3E--></p>\r\n\r\n<p><strong>Also Read About-</strong></p>\r\n\r\n<p><!--{C}%3C!%2D%2D%7BC%7D%253C!%252D%252D%2520%252Fwp%253Aparagraph%2520%252D%252D%253E%2D%2D%3E--><!--{C}%3C!%2D%2D%7BC%7D%253C!%252D%252D%2520wp%253Agroup%2520%257B%2522layout%2522%253A%257B%2522type%2522%253A%2522flex%2522%252C%2522orientation%2522%253A%2522vertical%2522%257D%257D%2520%252D%252D%253E%2D%2D%3E--></p>\r\n\r\n<p><!--{C}%3C!%2D%2D%7BC%7D%253C!%252D%252D%2520wp%253Aparagraph%2520%252D%252D%253E%2D%2D%3E--></p>\r\n\r\n<p><a href=\"https://alternativetohrt.co.uk/natural-remedies-for-menopause-alternative-to-conventional-hrt/\">Natural Remedies For Menopause &ndash; Alternative to Conventional HRT</a></p>\r\n\r\n<p><!--{C}%3C!%2D%2D%7BC%7D%253C!%252D%252D%2520%252Fwp%253Aparagraph%2520%252D%252D%253E%2D%2D%3E--><!--{C}%3C!%2D%2D%7BC%7D%253C!%252D%252D%2520wp%253Aparagraph%2520%252D%252D%253E%2D%2D%3E--></p>\r\n\r\n<p><a href=\"https://alternativetohrt.co.uk/are-you-looking-for-natural-treatment-for-menopause-alternative-to-hormone-replacement-therapy/\">Natural Treatment For Menopause &ndash; Alternative to Hormone Replacement Therapy</a>.</p>\r\n\r\n<p>5 <strong>Natural Remedies for Hot Flushes</strong> <strong>Without Side Effects?</strong></p>\r\n\r\n<p><!--{C}%3C!%2D%2D%7BC%7D%253C!%252D%252D%2520%252Fwp%253Aheading%2520%252D%252D%253E%2D%2D%3E--><!--{C}%3C!%2D%2D%7BC%7D%253C!%252D%252D%2520wp%253Aparagraph%2520%252D%252D%253E%2D%2D%3E--></p>\r\n\r\n<p>Women experience menopause differently - and it might last for several years. Over time the hormonal changes in your body can change - meaning your symptoms might also change. Knowing how to combat these symptoms can help you get better control over your body.</p>\r\n\r\n<p><!--{C}%3C!%2D%2D%7BC%7D%253C!%252D%252D%2520%252Fwp%253Aparagraph%2520%252D%252D%253E%2D%2D%3E--><!--{C}%3C!%2D%2D%7BC%7D%253C!%252D%252D%2520wp%253Aimage%2520%257B%2522align%2522%253A%2522center%2522%252C%2522id%2522%253A16935%252C%2522sizeSlug%2522%253A%2522full%2522%252C%2522linkDestination%2522%253A%2522none%2522%257D%2520%252D%252D%253E%2D%2D%3E--></p>\r\n\r\n<p><img alt=\"Natural remedies for hot flushes.\" src=\"https://alternativetohrt.co.uk/wp-content/uploads/2022/09/Natural-Remedies-for-Hot-Flushes.webp\" /></p>\r\n\r\n<p><!--{C}%3C!%2D%2D%7BC%7D%253C!%252D%252D%2520%252Fwp%253Aimage%2520%252D%252D%253E%2D%2D%3E--><!--{C}%3C!%2D%2D%7BC%7D%253C!%252D%252D%2520wp%253Aparagraph%2520%252D%252D%253E%2D%2D%3E--></p>\r\n\r\n<p>Here are some top tips to help you feel more like yourself when menopause symptoms have you feeling anxious, uncomfortable, and at a loss of what to do.</p>\r\n\r\n<p><!--{C}%3C!%2D%2D%7BC%7D%253C!%252D%252D%2520%252Fwp%253Aparagraph%2520%252D%252D%253E%2D%2D%3E--><!--{C}%3C!%2D%2D%7BC%7D%253C!%252D%252D%2520wp%253Alist%2520%257B%2522ordered%2522%253Atrue%252C%2522type%2522%253A%25221%2522%257D%2520%252D%252D%253E%2D%2D%3E--></p>\r\n\r\n<ol>\r\n	<li><strong>Natural herbal alternatives to HRT</strong> - HRT is a big decision and not for everyone. The side effects can often be as bad as - or even worse than - your menopause symptoms. Herbal supplements are nature&#39;s way of providing for those in need. With them, your body receives all the vitamins and minerals it needs to regain balance and control.</li>\r\n	<li>Wear clothes in layers that you can remove when a hot flush begins. By preparing in advance, you can give yourself the flexibility to control your temperature as needed.</li>\r\n	<li>When you&#39;re out and about, carry a small portable fan. There are inexpensive options available and handy to carry in your purse.</li>\r\n	<li>&nbsp;If you overheat at night and experience night sweats, try to lower the temperature in your bedroom.</li>\r\n	<li>Drink small sips of cold water before bed. Staying hydrated when you&#39;re losing fluids with increased sweating is paramount. Dehydration will cause you to feel more irritable and make you more prone to headaches.</li>\r\n	<li>And, as if it isn&#39;t bad enough, unfortunately, alcohol, caffeine, and spicy foods may aggravate your symptoms. By avoiding these items you may reduce the number of hot flashes you experience, and their severity.</li>\r\n</ol>\r\n\r\n<p><!--{C}%3C!%2D%2D%7BC%7D%253C!%252D%252D%2520%252Fwp%253Alist%2520%252D%252D%253E%2D%2D%3E--><!--{C}%3C!%2D%2D%7BC%7D%253C!%252D%252D%2520wp%253Aparagraph%2520%252D%252D%253E%2D%2D%3E--></p>\r\n\r\n<p>With a few lifestyle changes and a dietary supplement, you can ensure your body has everything it needs to keep the symptoms of menopause at bay.</p>\r\n\r\n<p><strong>Choosing a</strong> <strong>Herbal Alternative to HRT</strong></p>\r\n\r\n<p><!--{C}%3C!%2D%2D%7BC%7D%253C!%252D%252D%2520%252Fwp%253Aheading%2520%252D%252D%253E%2D%2D%3E--><!--{C}%3C!%2D%2D%7BC%7D%253C!%252D%252D%2520wp%253Aparagraph%2520%252D%252D%253E%2D%2D%3E--></p>\r\n\r\n<p><strong>Natural remedies for hot flashes</strong> and <strong>alternatives to Hormone Replacement Therapy</strong> keep you in control of your menopause symptoms. They&rsquo;re made for this purpose and free of pharmaceuticals that can cause more harm than they do good.</p>\r\n\r\n<p><!--{C}%3C!%2D%2D%7BC%7D%253C!%252D%252D%2520%252Fwp%253Aparagraph%2520%252D%252D%253E%2D%2D%3E--><!--{C}%3C!%2D%2D%7BC%7D%253C!%252D%252D%2520wp%253Aparagraph%2520%252D%252D%253E%2D%2D%3E--></p>\r\n\r\n<p>If you&#39;re experiencing out-of-control body temperature with the associated mood swings and discomfort - Natural Juices&#39; dietary supplement is exactly what you need.</p>\r\n\r\n<p><!--{C}%3C!%2D%2D%7BC%7D%253C!%252D%252D%2520%252Fwp%253Aparagraph%2520%252D%252D%253E%2D%2D%3E--><!--{C}%3C!%2D%2D%7BC%7D%253C!%252D%252D%2520wp%253Aparagraph%2520%252D%252D%253E%2D%2D%3E--></p>\r\n\r\n<p>It&#39;s 100% natural and made with an original high potency formula especially to combat the symptoms of menopause. This herbal remedy reduces how often you experience hot flushes with 97% effectiveness. It&#39;s GM-free and suitable for vegans. Our customers love it for its ability to reduce all the symptoms of menopause quickly and without side effects. You&#39;re sure to love it too.</p>', 'are-you-searching-for-5-natural-treatment-to-hot-flushes', '1', '1687421034_wellness_blog.webp', 'Aftab Khan', 'hrt blog', '2022-09-29 10:36:38'),
(11, 'Are You Looking For Natural Treatment For Menopause – Alternative to Hormone Replacement Therapy?', '<p>Natural treatment for menopause helps in reducing menopause symptoms. Menopause can hit women hard. Around the age of 45-55, women go through some extreme hormone changes. Around a year after their last period, women start to experience hot flushes, disturbed sleep, memory problems and so much more. Menopause symptoms can begin long before the last period and can last for four years after it. For some women, these symptoms might last for even longer.</p>\r\n\r\n<p><!--{C}%3C!%2D%2D%20%2Fwp%3Aparagraph%20%2D%2D%3E--><!--{C}%3C!%2D%2D%20wp%3Aparagraph%20%2D%2D%3E--></p>\r\n\r\n<p>If you&rsquo;re experiencing this - you&rsquo;re not alone!</p>\r\n\r\n<p><!--{C}%3C!%2D%2D%20%2Fwp%3Aparagraph%20%2D%2D%3E--><!--{C}%3C!%2D%2D%20wp%3Amore%20%2D%2D%3E--></p>\r\n\r\n<p><!--{C}%3C!%2D%2Dmore%2D%2D%3E--></p>\r\n\r\n<p><!--{C}%3C!%2D%2D%20%2Fwp%3Amore%20%2D%2D%3E--><!--{C}%3C!%2D%2D%20wp%3Aparagraph%20%2D%2D%3E--></p>\r\n\r\n<p>Conventional pharmaceutical Hormone Replacement Therapy comes with so many negative side effects, that you have to wonder if it&#39;s truly worth it. The bloating, cramps, and indigestion that come with HRT aren&#39;t much of an upgrade in health concerns. And once the time and financial cost of treatment are taken into consideration, it&#39;s no wonder women are seeking<strong> natural treatment for menopause </strong>symptoms.</p>\r\n\r\n<p><!--{C}%3C!%2D%2D%20%2Fwp%3Aparagraph%20%2D%2D%3E--><!--{C}%3C!%2D%2D%20wp%3Aparagraph%20%2D%2D%3E--></p>\r\n\r\n<p>Thankfully there are <strong>natural remedies for menopause</strong> that have no side effects and can improve your quality of life within 30 days.</p>\r\n\r\n<p><!--{C}%3C!%2D%2D%20%2Fwp%3Aparagraph%20%2D%2D%3E--><!--{C}%3C!%2D%2D%20wp%3Aheading%20%7B%22level%22%3A3%7D%20%2D%2D%3E--></p>\r\n\r\n<h3><strong>Symptoms of Menopause and HRT</strong></h3>\r\n\r\n<p><!--{C}%3C!%2D%2D%20%2Fwp%3Aheading%20%2D%2D%3E--><!--{C}%3C!%2D%2D%20wp%3Aparagraph%20%2D%2D%3E--></p>\r\n\r\n<p>Women experience menopause in different ways - but the sudden changes in our bodies can be frightening. Not only do women have to contend with the hormone changes but also the low mood and anxiety that comes with it.</p>\r\n\r\n<p><!--{C}%3C!%2D%2D%20%2Fwp%3Aparagraph%20%2D%2D%3E--><!--{C}%3C!%2D%2D%20wp%3Aparagraph%20%2D%2D%3E--></p>\r\n\r\n<p>Some common symptoms of menopause include:</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; Irregular periods</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Vaginal Dryness</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;Hot Flushes</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Sore and Tender Breasts</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Night Sweats</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Headaches</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Sleep Problems</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Thinning Hair</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Weight Gain</p>\r\n\r\n<p><!--{C}%3C!%2D%2D%20%2Fwp%3Aparagraph%20%2D%2D%3E--><!--{C}%3C!%2D%2D%20wp%3Apullquote%20%2D%2D%3E--></p>\r\n\r\n<p><!--{C}%3C!%2D%2D%20%2Fwp%3Apullquote%20%2D%2D%3E--><!--{C}%3C!%2D%2D%20wp%3Aparagraph%20%2D%2D%3E--></p>\r\n\r\n<p>To escape these problems, women are often referred to HRT. But instead of seeing any improvement, they just suffer further problems.</p>\r\n\r\n<p><!--{C}%3C!%2D%2D%20%2Fwp%3Aparagraph%20%2D%2D%3E--><!--{C}%3C!%2D%2D%20wp%3Aparagraph%20%2D%2D%3E--></p>\r\n\r\n<p>Common Side Effects of HRT:</p>\r\n\r\n<p><!--{C}%3C!%2D%2D%20%2Fwp%3Aparagraph%20%2D%2D%3E--><!--{C}%3C!%2D%2D%20wp%3Alist%20%7B%22ordered%22%3Atrue%7D%20%2D%2D%3E--></p>\r\n\r\n<ol>\r\n	<li>Bloating</li>\r\n	<li>Breast Tenderness</li>\r\n	<li>Swelling</li>\r\n	<li>Cramps</li>\r\n	<li>Headaches</li>\r\n	<li>Indigestion</li>\r\n	<li>Vaginal Bleeding</li>\r\n</ol>\r\n\r\n<p><!--{C}%3C!%2D%2D%20%2Fwp%3Alist%20%2D%2D%3E--><!--{C}%3C!%2D%2D%20wp%3Aparagraph%20%2D%2D%3E--></p>\r\n\r\n<p>It&rsquo;s like swapping the frying pan for the fire. Menopause with HRT and<strong> menopause without HRT</strong> look a lot alike. Both situations come with so many health problems that make your own body feel alien. Changes in appearance can lead to deteriorating mental health which reduces resilience when coping with the other symptoms.</p>\r\n\r\n<p><!--{C}%3C!%2D%2D%20%2Fwp%3Aparagraph%20%2D%2D%3E--><!--{C}%3C!%2D%2D%20wp%3Aparagraph%20%2D%2D%3E--></p>\r\n\r\n<p>That&rsquo;s why more women are looking for <strong>natural treatments for menopause</strong> and an <strong>alternative to Hormone Replacement Therapy</strong>.</p>\r\n\r\n<p><!--{C}%3C!%2D%2D%20%2Fwp%3Aparagraph%20%2D%2D%3E--><!--{C}%3C!%2D%2D%20wp%3Aparagraph%20%2D%2D%3E--></p>\r\n\r\n<p><strong>Also Read About-</strong></p>\r\n\r\n<p><!--{C}%3C!%2D%2D%20%2Fwp%3Aparagraph%20%2D%2D%3E--><!--{C}%3C!%2D%2D%20wp%3Agroup%20%7B%22layout%22%3A%7B%22type%22%3A%22flex%22%2C%22orientation%22%3A%22vertical%22%7D%7D%20%2D%2D%3E--><!--{C}%3C!%2D%2D%20wp%3Aparagraph%20%2D%2D%3E--></p>\r\n\r\n<p><a href=\"https://alternativetohrt.co.uk/natural-remedies-for-menopause-alternative-to-conventional-hrt/\" target=\"_blank\">Natural Remedies For Menopause &ndash; Alternative to Conventional HRT</a></p>\r\n\r\n<p><!--{C}%3C!%2D%2D%20%2Fwp%3Aparagraph%20%2D%2D%3E--><!--{C}%3C!%2D%2D%20wp%3Aparagraph%20%2D%2D%3E--></p>\r\n\r\n<p><a href=\"https://alternativetohrt.co.uk/natural-treatment-to-combat-hot-flushes/\" target=\"_blank\">5 Natural Treatment To Combat Hot Flushes</a></p>\r\n\r\n<p><!--{C}%3C!%2D%2D%20%2Fwp%3Aparagraph%20%2D%2D%3E--><!--{C}%3C!%2D%2D%20%2Fwp%3Agroup%20%2D%2D%3E--><!--{C}%3C!%2D%2D%20wp%3Aheading%20%7B%22level%22%3A3%7D%20%2D%2D%3E--></p>\r\n\r\n<h3><strong>Natural Remedies for Menopause</strong></h3>\r\n\r\n<p><!--{C}%3C!%2D%2D%20%2Fwp%3Aheading%20%2D%2D%3E--><!--{C}%3C!%2D%2D%20wp%3Aparagraph%20%2D%2D%3E--></p>\r\n\r\n<p>Not all women are eligible for HRT. Some pre-existing health conditions are unsuitable such as those with cardiovascular disease, breast cancer, a known risk of developing blood clots, liver disease, and those sensitive to the estrogens used in HRT. These women can, however, benefit from <strong>natural remedies for menopause</strong>.</p>\r\n\r\n<p><!--{C}%3C!%2D%2D%20%2Fwp%3Aparagraph%20%2D%2D%3E--><!--{C}%3C!%2D%2D%20wp%3Aparagraph%20%2D%2D%3E--></p>\r\n\r\n<p>Many recommendations center around improving vitamin intake and maintaining healthy habits. Vitamins can be under-rated and, much like herbs, contain the secrets to a good quality of life and maintaining general health.</p>\r\n\r\n<p><!--{C}%3C!%2D%2D%20%2Fwp%3Aparagraph%20%2D%2D%3E--><!--{C}%3C!%2D%2D%20wp%3Aparagraph%20%2D%2D%3E--></p>\r\n\r\n<p><strong>Eat more foods rich in calcium and vitamin D:</strong></p>\r\n\r\n<p><!--{C}%3C!%2D%2D%20%2Fwp%3Aparagraph%20%2D%2D%3E--><!--{C}%3C!%2D%2D%20wp%3Aparagraph%20%2D%2D%3E--></p>\r\n\r\n<p>Because menopause can weaken your bones, be proactive and eat more foods that encourage bone strength. Calcium can be found in dairy products like milk and cheese. You&rsquo;ll also get it from leafy greens such as kale and spinach.</p>\r\n\r\n<p><!--{C}%3C!%2D%2D%20%2Fwp%3Aparagraph%20%2D%2D%3E--><!--{C}%3C!%2D%2D%20wp%3Aparagraph%20%2D%2D%3E--></p>\r\n\r\n<p>You can get vitamin D from the sun - but as you get older your body becomes less efficient at making vitamin D. Oily fish, eggs and fortified foods can be a great source too.</p>\r\n\r\n<p><!--{C}%3C!%2D%2D%20%2Fwp%3Aparagraph%20%2D%2D%3E--><!--{C}%3C!%2D%2D%20wp%3Aparagraph%20%2D%2D%3E--></p>\r\n\r\n<p><strong>Maintain a healthy weight:</strong></p>\r\n\r\n<p><!--{C}%3C!%2D%2D%20%2Fwp%3Aparagraph%20%2D%2D%3E--><!--{C}%3C!%2D%2D%20wp%3Aparagraph%20%2D%2D%3E--></p>\r\n\r\n<p>This one might be easier said than done - since a common side effect of menopause is weight gain. If you continue to eat healthily and maintain your recommended level of daily exercise - maintaining your weight might be easier to manage. A lower weight is associated with less extreme night sweats and hot flashes. It also helps prevent diabetes and other diseases.</p>\r\n\r\n<p><!--{C}%3C!%2D%2D%20%2Fwp%3Aparagraph%20%2D%2D%3E--><!--{C}%3C!%2D%2D%20wp%3Aparagraph%20%2D%2D%3E--></p>\r\n\r\n<p>Similarly, it&#39;s recommended that you to cut out as much processed foods and sugars as possible. These contribute to low moods, tiredness and irritability as they cause havoc with your blood sugar levels.</p>\r\n\r\n<p><!--{C}%3C!%2D%2D%20%2Fwp%3Aparagraph%20%2D%2D%3E--><!--{C}%3C!%2D%2D%20wp%3Aparagraph%20%2D%2D%3E--></p>\r\n\r\n<p><strong>Exercise regularly:</strong></p>\r\n\r\n<p><!--{C}%3C!%2D%2D%20%2Fwp%3Aparagraph%20%2D%2D%3E--><!--{C}%3C!%2D%2D%20wp%3Aparagraph%20%2D%2D%3E--></p>\r\n\r\n<p>There isn&#39;t any evidence that exercise reduces menopause symptoms but it might help your mental health. Extra activity may improve your ability to fall asleep and improve your overall sleep quality.</p>\r\n\r\n<p><!--{C}%3C!%2D%2D%20%2Fwp%3Aparagraph%20%2D%2D%3E--><!--{C}%3C!%2D%2D%20wp%3Aparagraph%20%2D%2D%3E--></p>\r\n\r\n<p>There is a range of activities and day-to-day changes you can make to help lessen the severity of your menopause symptoms. But they won&#39;t always make a noticeable impact. And while your hormones are running wild you may be tempted to start HRT. Taking more hormones to balance out other hormones can become messy - every body reacts differently.</p>\r\n\r\n<p><!--{C}%3C!%2D%2D%20%2Fwp%3Aparagraph%20%2D%2D%3E--><!--{C}%3C!%2D%2D%20wp%3Aparagraph%20%2D%2D%3E--></p>\r\n\r\n<p><strong>Drink enough water: </strong>dryness is an issue for many women during menopause - increasing your daily water intake can alleviate these symptoms. Water can also increase your metabolism, thereby helping prevent weight gain.</p>\r\n\r\n<p><!--{C}%3C!%2D%2D%20%2Fwp%3Aparagraph%20%2D%2D%3E--><!--{C}%3C!%2D%2D%20wp%3Aparagraph%20%2D%2D%3E--></p>\r\n\r\n<p><strong>Herbal alternatives to Hormone Replacement Therapy</strong> are becoming increasingly sought after. They&rsquo;re a natural alternative to HRT that doesn&rsquo;t create new symptoms and exacerbate others.</p>\r\n\r\n<p><!--{C}%3C!%2D%2D%20%2Fwp%3Aparagraph%20%2D%2D%3E--><!--{C}%3C!%2D%2D%20wp%3Aparagraph%20%2D%2D%3E--></p>\r\n\r\n<p>Changing your routine and habits can improve the symptoms of menopause. But for many women, it just doesn&#39;t reduce the inconvenience of those symptoms <em>enough</em>. Naturaljuices have a 100% natural herbal product available that can help decrease the stress caused by menopausal symptoms. Women don&#39;t need to suffer life-changing symptoms of a hormonal shift when other options are available.</p>\r\n\r\n<p><!--{C}%3C!%2D%2D%20%2Fwp%3Aparagraph%20%2D%2D%3E--><!--{C}%3C!%2D%2D%20wp%3Aparagraph%20%2D%2D%3E--></p>\r\n\r\n<p>Natural products, such as NaturalJuices&rsquo; <strong>Natural Herbal Alternative to HRT, </strong>are made solely from herbs. Each herb included in this remedy is proven by research to be effective against the onslaught of menopause symptoms.</p>\r\n\r\n<p><!--{C}%3C!%2D%2D%20%2Fwp%3Aparagraph%20%2D%2D%3E--><!--{C}%3C!%2D%2D%20wp%3Aheading%20%7B%22level%22%3A3%7D%20%2D%2D%3E--></p>\r\n\r\n<h3><strong>Herbal Alternatives to HRT</strong></h3>\r\n\r\n<p><!--{C}%3C!%2D%2D%20%2Fwp%3Aheading%20%2D%2D%3E--><!--{C}%3C!%2D%2D%20wp%3Aparagraph%20%2D%2D%3E--></p>\r\n\r\n<p>NaturalJuices&rsquo; <strong>Natural Herbal Alternative to HRT</strong> contains seven essential menopause herbs that help relieve many symptoms of menopause. Research shows that it&#39;s 97% effective during hot flushes with 0% side effects. It&#39;s a <strong>natural treatment for menopause</strong> that significantly reduces symptoms within just 30 days.</p>\r\n\r\n<p><!--{C}%3C!%2D%2D%20%2Fwp%3Aparagraph%20%2D%2D%3E--><!--{C}%3C!%2D%2D%20wp%3Aparagraph%20%2D%2D%3E--></p>\r\n\r\n<p>A 100% herbal and <strong>natural remedy for menopause</strong><strong> </strong>that works no matter what stage of menopause you&rsquo;re in. Do you want to be free of night sweats and mood swings? How about feeling wide awake and full of energy after a good night&rsquo;s sleep?</p>\r\n\r\n<p><!--{C}%3C!%2D%2D%20%2Fwp%3Aparagraph%20%2D%2D%3E--><!--{C}%3C!%2D%2D%20wp%3Aparagraph%20%2D%2D%3E--></p>\r\n\r\n<p>These capsules are the herbal alternative to pharmaceutical HRT that&rsquo;ll help you be free of symptoms that are making your life hell.</p>\r\n\r\n<p><!--{C}%3C!%2D%2D%20%2Fwp%3Aparagraph%20%2D%2D%3E--><!--{C}%3C!%2D%2D%20wp%3Aparagraph%20%2D%2D%3E--></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><!--{C}%3C!%2D%2D%20%2Fwp%3Aparagraph%20%2D%2D%3E--><!--{C}%3C!%2D%2D%20wp%3Aimage%20%7B%22align%22%3A%22center%22%2C%22id%22%3A16911%2C%22sizeSlug%22%3A%22full%22%2C%22linkDestination%22%3A%22none%22%7D%20%2D%2D%3E--></p>\r\n\r\n<p><img alt=\"Natural Treatment For Menopause \" src=\"https://alternativetohrt.co.uk/wp-content/uploads/2022/07/Custom-dimensions-650x435-px.jpeg\" /></p>\r\n\r\n<p>Switch to natural and herbal alternatives to HRT</p>\r\n\r\n<p><!--{C}%3C!%2D%2D%20%2Fwp%3Aimage%20%2D%2D%3E--><!--{C}%3C!%2D%2D%20wp%3Aheading%20%7B%22level%22%3A3%7D%20%2D%2D%3E--></p>\r\n\r\n<h3><strong>Each capsule contains an original high potency formula of</strong> <strong>7 Key Menopause Herbs</strong>:</h3>\r\n\r\n<p><!--{C}%3C!%2D%2D%20%2Fwp%3Aheading%20%2D%2D%3E--><!--{C}%3C!%2D%2D%20wp%3Aparagraph%20%2D%2D%3E--></p>\r\n\r\n<p>1. <strong>Soy Isoflavones:</strong> A <strong>herbal alternative to HRT</strong> that provides <strong>natural treatment for hot flushes.</strong></p>\r\n\r\n<p><!--{C}%3C!%2D%2D%20%2Fwp%3Aparagraph%20%2D%2D%3E--><!--{C}%3C!%2D%2D%20wp%3Aparagraph%20%2D%2D%3E--></p>\r\n\r\n<p>2. <strong>Red Clover (Trifolium Pratense):</strong> a <strong>natural treatment for hot flushes</strong> and mood swings. Studies have also shown this herb improves energy levels and encourages a more positive outlook.</p>\r\n\r\n<p><!--{C}%3C!%2D%2D%20%2Fwp%3Aparagraph%20%2D%2D%3E--><!--{C}%3C!%2D%2D%20wp%3Aparagraph%20%2D%2D%3E--></p>\r\n\r\n<p>3. <strong>Sage:</strong> Though it hasn&#39;t been studied specifically for menopause, its natural anti-oxidant and anti-inflammatory properties make it an excellent addition to our <strong>new natural alternative to HRT</strong>. It&rsquo;ll help lessen the aches and pains that come alongside other menopause symptoms.</p>\r\n\r\n<p><!--{C}%3C!%2D%2D%20%2Fwp%3Aparagraph%20%2D%2D%3E--><!--{C}%3C!%2D%2D%20wp%3Aparagraph%20%2D%2D%3E--></p>\r\n\r\n<p>4. <strong>Agnus Castus (Vitex Agnus Castus):</strong> A <strong>natural treatment for night sweats</strong> and hot flushes, that has also been proven to reduce levels of follicle-stimulating hormone (FSH).</p>\r\n\r\n<p><!--{C}%3C!%2D%2D%20%2Fwp%3Aparagraph%20%2D%2D%3E--><!--{C}%3C!%2D%2D%20wp%3Aparagraph%20%2D%2D%3E--></p>\r\n\r\n<p>5. <strong><a href=\"https://en.wikipedia.org/wiki/Dioscorea_villosa\" target=\"_blank\">Wild Yam (Dioscorea Villosa)</a>:</strong> Wild Yam increases levels of good cholesterol, whilst also acting as an anti-oxidant. Research has shown women who have more anti-oxidants in their diets are less likely to experience menopausal symptoms.</p>\r\n\r\n<p><!--{C}%3C!%2D%2D%20%2Fwp%3Aparagraph%20%2D%2D%3E--><!--{C}%3C!%2D%2D%20wp%3Aparagraph%20%2D%2D%3E--></p>\r\n\r\n<p>6. <strong>Dong Quai (Angelica Sinensis)</strong>: This is native to China and Japan and is given to women as a tonic. In line with its traditional use, <strong>it&rsquo;s a great natural alternative to Hormone Replacement Therapy</strong>.</p>\r\n\r\n<p><!--{C}%3C!%2D%2D%20%2Fwp%3Aparagraph%20%2D%2D%3E--><!--{C}%3C!%2D%2D%20wp%3Aparagraph%20%2D%2D%3E--></p>\r\n\r\n<p>7. <strong>Hops: </strong>Hops plants contain an extremely potent phytoestrogen. It safely and naturally helps women combat the symptoms of menopause by improving general well-being.</p>\r\n\r\n<p><!--{C}%3C!%2D%2D%20%2Fwp%3Aparagraph%20%2D%2D%3E--><!--{C}%3C!%2D%2D%20wp%3Aparagraph%20%2D%2D%3E--></p>\r\n\r\n<p>With just one capsule a day, you&#39;ll soon feel much better and more energetic. It&#39;ll take 30 days to fully take effect, but over the month you should start to feel improvement. As you continue to take this <strong>natural treatment for menopause</strong>, the symptoms that have been plaguing you will be a thing of the past.</p>\r\n\r\n<p><!--{C}%3C!%2D%2D%20%2Fwp%3Aparagraph%20%2D%2D%3E--><!--{C}%3C!%2D%2D%20wp%3Acolumns%20%2D%2D%3E--><!--{C}%3C!%2D%2D%20wp%3Acolumn%20%7B%22width%22%3A%22100%25%22%7D%20%2D%2D%3E--></p>\r\n\r\n<p><!--{C}%3C!%2D%2D%20wp%3Awoocommerce%2Fproduct-category%20%7B%22categories%22%3A%5B83%5D%2C%22align%22%3A%22wide%22%7D%20%2F%2D%2D%3E--></p>\r\n\r\n<p><!--{C}%3C!%2D%2D%20%2Fwp%3Acolumn%20%2D%2D%3E--><!--{C}%3C!%2D%2D%20%2Fwp%3Acolumns%20%2D%2D%3E--><!--{C}%3C!%2D%2D%20wp%3Aheading%20%2D%2D%3E--></p>\r\n\r\n<h2><strong>Natural Alternative to Hormone Replacement Therapy</strong></h2>\r\n\r\n<p><!--{C}%3C!%2D%2D%20%2Fwp%3Aheading%20%2D%2D%3E--><!--{C}%3C!%2D%2D%20wp%3Aparagraph%20%2D%2D%3E--></p>\r\n\r\n<p>Hormone Replacement Therapy is supposed to help relieve the symptoms of menopause. But it causes just as many problems as it solves. In the long run, women are at risk of:</p>\r\n\r\n<p><!--{C}%3C!%2D%2D%20%2Fwp%3Aparagraph%20%2D%2D%3E--><!--{C}%3C!%2D%2D%20wp%3Alist%20%7B%22ordered%22%3Atrue%7D%20%2D%2D%3E--></p>\r\n\r\n<ol>\r\n	<li>Developing Breast Cancer</li>\r\n	<li>Blood Clots</li>\r\n	<li>Heart Disease and Strokes</li>\r\n</ol>\r\n\r\n<p><!--{C}%3C!%2D%2D%20%2Fwp%3Alist%20%2D%2D%3E--><!--{C}%3C!%2D%2D%20wp%3Aparagraph%20%2D%2D%3E--></p>\r\n\r\n<p>And that&#39;s in addition to the day-to-day side effects that come with treatment - such as bloating, headaches, mood changes and nausea. In comparison, our<strong> natural treatment for menopause</strong> has 0 side effects and has a 97% success rate against hot flushes. It&rsquo;s an original high potency formula that contains the 7 key menopause herbal extracts. Each herb has proven benefits against the symptoms of menopause and will help your body cope with the complex hormonal changes caused by menopause.</p>\r\n\r\n<p><!--{C}%3C!%2D%2D%20%2Fwp%3Aparagraph%20%2D%2D%3E--><!--{C}%3C!%2D%2D%20wp%3Aparagraph%20%2D%2D%3E--></p>\r\n\r\n<p>More and more people are choosing to look beyond pharmacology for help managing their symptoms. It happens so frequently, that the side effects of pharmaceuticals do more harm in the long run than the health issue itself. This is why natural alternatives are sought after. Our <strong>natural remedy for menopause</strong>, like natural remedies for other health concerns, has no side effects. It only offers relief from symptoms that can cause misery to many.</p>\r\n\r\n<p><!--{C}%3C!%2D%2D%20%2Fwp%3Aparagraph%20%2D%2D%3E--><!--{C}%3C!%2D%2D%20wp%3Aparagraph%20%2D%2D%3E--></p>\r\n\r\n<p>As well as getting the anti-oxidant and anti-inflammatory properties from our herbal remedy, it&#39;s recommended that you maintain a healthy lifestyle to complete your <strong>natural alternative to hormone replacement therapy</strong> strategy<strong>.</strong> Balance healthy eating, ensure the correct intake of vitamins and minerals, drink plenty of water and exercise regularly alongside our herbal supplement. Soon you&#39;ll be able to lead a normal life symptom-free.</p>', 'are-you-looking-for-natural-treatment-for-menopause-alternative-to-hormone-replacement-therapy', '1', '1687419862_wellness_blog.jpeg', 'Jermainechi', 'hrt blog,Swelling,Cramps', '2022-07-11 15:10:59');

-- --------------------------------------------------------

--
-- Table structure for table `wish_list`
--

CREATE TABLE `wish_list` (
  `id` int(110) NOT NULL,
  `user_id` int(110) NOT NULL,
  `product_id` int(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wish_list`
--

INSERT INTO `wish_list` (`id`, `user_id`, `product_id`) VALUES
(124, 2, 1),
(125, 2, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogcategory`
--
ALTER TABLE `blogcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset`
--
ALTER TABLE `password_reset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privacy_policy`
--
ALTER TABLE `privacy_policy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productcategory`
--
ALTER TABLE `productcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `success_stories`
--
ALTER TABLE `success_stories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms_conditions`
--
ALTER TABLE `terms_conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_billing_address`
--
ALTER TABLE `user_billing_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_shipping_address`
--
ALTER TABLE `user_shipping_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wellness_blog`
--
ALTER TABLE `wellness_blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wish_list`
--
ALTER TABLE `wish_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogcategory`
--
ALTER TABLE `blogcategory`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `privacy_policy`
--
ALTER TABLE `privacy_policy`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `productcategory`
--
ALTER TABLE `productcategory`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `success_stories`
--
ALTER TABLE `success_stories`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `terms_conditions`
--
ALTER TABLE `terms_conditions`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `user_billing_address`
--
ALTER TABLE `user_billing_address`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_shipping_address`
--
ALTER TABLE `user_shipping_address`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `wellness_blog`
--
ALTER TABLE `wellness_blog`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `wish_list`
--
ALTER TABLE `wish_list`
  MODIFY `id` int(110) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
