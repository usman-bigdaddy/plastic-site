-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2023 at 03:35 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `plastic`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_email` varchar(25) NOT NULL,
  `admin_password` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_email`, `admin_password`) VALUES
('admin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_name` varchar(25) NOT NULL,
  `company_email` varchar(45) DEFAULT NULL,
  `company_logo` varchar(45) DEFAULT NULL,
  `company_phone` varchar(45) DEFAULT NULL,
  `admin_email` varchar(25) NOT NULL,
  `company_password` varchar(45) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_name`, `company_email`, `company_logo`, `company_phone`, `admin_email`, `company_password`, `address`) VALUES
('Plastic Company One', 'p1@gmail.com', '5HsUfXmtyu.jpg', '0702334444', 'admin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Nile University'),
('Plastic Company Two', 'p2@gmail.com', '0HsUfXmbBI.jpg', '222', 'admin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Garki                            ');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_email` varchar(35) NOT NULL,
  `customer_name` varchar(45) DEFAULT NULL,
  `customer_phone` varchar(45) DEFAULT NULL,
  `customer_password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_email`, `customer_name`, `customer_phone`, `customer_password`) VALUES
('usmanbeeabubakar@gmail.com', 'Usman Abubakar', '07034596860', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(45) DEFAULT NULL,
  `product_description` varchar(255) DEFAULT NULL,
  `product_image` varchar(45) DEFAULT NULL,
  `company_email` varchar(55) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_description`, `product_image`, `company_email`, `price`) VALUES
(1, 'Best Plastic', 'Very very good plastic to use', 'p1.jpg', 'p1@gmail.com', '120.00');

-- --------------------------------------------------------

--
-- Table structure for table `productrequest`
--

CREATE TABLE `productrequest` (
  `customer_email` varchar(35) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `requestID` int(11) NOT NULL,
  `delivery_address` varchar(45) DEFAULT NULL,
  `request_date` date DEFAULT current_timestamp(),
  `status_` varchar(45) DEFAULT NULL,
  `Quantity` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `productrequest`
--

INSERT INTO `productrequest` (`customer_email`, `product_id`, `requestID`, `delivery_address`, `request_date`, `status_`, `Quantity`) VALUES
('usmanbeeabubakar@gmail.com', 1, 1, 'Maitama \r\n                    ', '2023-03-19', 'Ordered', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_email`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_name`,`admin_email`),
  ADD KEY `fk_Company_Admin_idx` (`admin_email`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_email`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `fk_Product_Company1_idx` (`company_email`);

--
-- Indexes for table `productrequest`
--
ALTER TABLE `productrequest`
  ADD PRIMARY KEY (`requestID`),
  ADD KEY `fk_Customer_has_Product_Product1_idx` (`product_id`),
  ADD KEY `fk_Customer_has_Product_Customer1_idx` (`customer_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `productrequest`
--
ALTER TABLE `productrequest`
  MODIFY `requestID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
