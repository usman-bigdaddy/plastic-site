-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2023 at 01:30 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

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
  `company_password` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_email` varchar(35) NOT NULL,
  `customer_name` varchar(45) DEFAULT NULL,
  `customer_phone` varchar(45) DEFAULT NULL,
  `cusotmer_password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_email`, `customer_name`, `customer_phone`, `cusotmer_password`) VALUES
('usmanbeeabubakar@gmail.com', 'Usman Abubakar', '07034596860', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(45) DEFAULT NULL,
  `product_description` varchar(45) DEFAULT NULL,
  `product_image` varchar(45) DEFAULT NULL,
  `company_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `productrequest`
--

CREATE TABLE `productrequest` (
  `customer_email` varchar(25) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `requestID` varchar(45) NOT NULL,
  `delivery_address` varchar(45) DEFAULT NULL,
  `request_date` date DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  ADD PRIMARY KEY (`product_id`,`company_name`),
  ADD KEY `fk_Product_Company1_idx` (`company_name`);

--
-- Indexes for table `productrequest`
--
ALTER TABLE `productrequest`
  ADD PRIMARY KEY (`requestID`),
  ADD KEY `fk_Customer_has_Product_Product1_idx` (`product_id`),
  ADD KEY `fk_Customer_has_Product_Customer1_idx` (`customer_email`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `fk_Company_Admin` FOREIGN KEY (`admin_email`) REFERENCES `mydb`.`admin` (`admin_email`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_Product_Company1` FOREIGN KEY (`company_name`) REFERENCES `mydb`.`company` (`company_name`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `productrequest`
--
ALTER TABLE `productrequest`
  ADD CONSTRAINT `fk_Customer_has_Product_Customer1` FOREIGN KEY (`customer_email`) REFERENCES `mydb`.`customer` (`customer_email`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Customer_has_Product_Product1` FOREIGN KEY (`product_id`) REFERENCES `mydb`.`product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
