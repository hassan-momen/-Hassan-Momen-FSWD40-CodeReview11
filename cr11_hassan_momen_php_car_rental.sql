-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2018 at 04:33 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cr11_hassan_momen_php_car_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` int(11) NOT NULL,
  `street` varchar(100) DEFAULT NULL,
  `zip_code` int(6) DEFAULT NULL,
  `country` varchar(40) DEFAULT NULL,
  `city` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `street`, `zip_code`, `country`, `city`) VALUES
(1, 'längenfeldgasse 13-15', 1120, 'Österreich', 'wien'),
(2, 'Linzerstraße 63', 1140, 'Österreich', 'wien'),
(3, 'Absengerstraße', 8052, 'Österreich', 'graz'),
(4, 'Bahnhofplatz 1', 4021, 'Österreich', 'linz');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `car_id` int(11) NOT NULL,
  `name` varchar(40) DEFAULT NULL,
  `type` varchar(40) DEFAULT NULL,
  `status` enum('available','reserved') DEFAULT NULL,
  `module` varchar(40) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL,
  `location` varchar(100) NOT NULL,
  `fk_agency_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`car_id`, `name`, `type`, `status`, `module`, `color`, `location`, `fk_agency_id`) VALUES
(1, 'Lexus', 'work car', 'available', '2012', 'black', 'linzer strasse 63', 1),
(2, 'MASDA', 'family car', 'reserved', '2015', 'white', 'gebler gasse 22-24', 2),
(3, 'Jaguar', 'sport car', 'available', '2017', 'red', 'wien mitte', 3),
(4, 'Subaru', 'transport car', 'reserved', '2010', 'white', 'linzer strasse 63', 4),
(5, 'Jeep', 'transport car', 'available', '2013', 'white', 'gebler gasse 22-24', 1),
(6, 'KIA', 'sport car', 'reserved', '2017', 'white', 'linzer stasse 63', 2),
(7, 'Bugatti', 'family car', 'available', '2016', 'black', 'hauptbahnhof', 2),
(8, 'HUNDAI', 'race car', 'reserved', '2016', 'black', 'gebler gasse 22-24', 3),
(9, 'Hummer', 'family car', 'available', '2015', 'yellow', 'wien mitte', 1),
(10, 'Clysler', 'sport car', 'available', '2015', 'white', 'gebler gasse 22-24', 2),
(11, 'TESLA', 'sport car', 'available', '2016', 'black', 'wien mitte', 1),
(12, 'Maserati', 'sport car', 'reserved', '2018', 'black', 'hauptbahnhof', 3);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `location` varchar(55) DEFAULT NULL,
  `fk_car_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `location`, `fk_car_id`) VALUES
(1, 'wien mitte', 10),
(2, 'wien mitte', 12),
(3, 'john gasse 36', 1),
(4, 'john gasse 36', 3),
(5, 'gebler gasse 22-24', 6),
(6, 'gebler gasse 22-24', 4);

-- --------------------------------------------------------

--
-- Table structure for table `php_car_rental_agency`
--

CREATE TABLE `php_car_rental_agency` (
  `agency_id` int(11) NOT NULL,
  `office_name` varchar(55) DEFAULT NULL,
  `fk_address_id` int(11) DEFAULT NULL,
  `fk_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `php_car_rental_agency`
--

INSERT INTO `php_car_rental_agency` (`agency_id`, `office_name`, `fk_address_id`, `fk_user_id`) VALUES
(1, 'RentalCars', 1, NULL),
(2, 'RentalCars', 3, NULL),
(3, 'RentalCars', 4, NULL),
(4, 'RentalCars', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `userName` varchar(50) DEFAULT NULL,
  `userEmail` varchar(50) DEFAULT NULL,
  `userPass` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `userName`, `userEmail`, `userPass`) VALUES
(1, 'hassan', 'momen@hotmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92'),
(2, 'ammar', 'ammar@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`car_id`),
  ADD KEY `fk_agency_id` (`fk_agency_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `fk_car_id` (`fk_car_id`);

--
-- Indexes for table `php_car_rental_agency`
--
ALTER TABLE `php_car_rental_agency`
  ADD PRIMARY KEY (`agency_id`),
  ADD KEY `fk_address_id` (`fk_address_id`),
  ADD KEY `fk_user_id` (`fk_user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `php_car_rental_agency`
--
ALTER TABLE `php_car_rental_agency`
  MODIFY `agency_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_ibfk_1` FOREIGN KEY (`fk_agency_id`) REFERENCES `php_car_rental_agency` (`agency_id`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`fk_car_id`) REFERENCES `cars` (`car_id`);

--
-- Constraints for table `php_car_rental_agency`
--
ALTER TABLE `php_car_rental_agency`
  ADD CONSTRAINT `php_car_rental_agency_ibfk_1` FOREIGN KEY (`fk_address_id`) REFERENCES `address` (`address_id`),
  ADD CONSTRAINT `php_car_rental_agency_ibfk_2` FOREIGN KEY (`fk_user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
