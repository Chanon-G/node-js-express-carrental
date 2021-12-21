-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2021 at 02:19 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restapi`
--
CREATE DATABASE IF NOT EXISTS `nodejs-carrent` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `nodejs-carrent`;

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `license` varchar(100) DEFAULT NULL,
  `brand` varchar(100) DEFAULT NULL,
  `color` varchar(100) DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `detail` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`id`, `name`, `license`, `brand`, `color`,`price`,`status`,`year`,`detail`) VALUES
(1,'Honda city','สข3269','Honda','Black','1,000','Free','2017','เกียร์อัตโนมัติ  4 ที่นั้ง พร้อมบริการรับส่ง.'),
(2,'Honda civic','กข8927','Honda','White','1,500','Free','2019','เกียร์อัตโนมัติ  4 ที่นั้ง พร้อมบริการรับส่ง.'),
(3,'Nissan almera','บว1235','Nissan','Gray','1,000','Free','2019','เกียร์อัตโนมัติ  4 ที่นั้ง พร้อมบริการรับส่ง.'),
(4,'Suzuki ciaz','งบ5684','Suzuki','Red','1,000','Free','2021','เกียร์ธรรมดา 5 MT  4 ที่นั้ง พร้อมบริการรับส่ง.'),
(5,'Toyota yaris ativ','อล2763','Toyota','White','1,300','Free','2021','เกียร์อัตโนมัติ CVT  4 ที่นั้ง พร้อมบริการรับส่ง.'),
(6,'Toyota fortuner','มส8888','Toyota','Black','2,000','Free','2018','เครื่องยนต์ 3000 cc เกียร์อัตโนมัติ  7 ที่นั้ง พร้อมบริการรับส่ง');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;