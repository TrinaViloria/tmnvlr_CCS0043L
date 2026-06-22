-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2026 at 05:32 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dog_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbldogs`
--

CREATE TABLE `tbldogs` (
  `id` int(15) NOT NULL,
  `d_name` varchar(50) NOT NULL,
  `d_breed` varchar(50) NOT NULL,
  `d_age` int(10) NOT NULL,
  `d_add` varchar(100) NOT NULL,
  `d_color` varchar(50) NOT NULL,
  `d_height` varchar(50) NOT NULL,
  `d_weight` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbldogs`
--

INSERT INTO `tbldogs` (`id`, `d_name`, `d_breed`, `d_age`, `d_add`, `d_color`, `d_height`, `d_weight`) VALUES
(1, 'Sky', 'Poodle', 8, 'SJDM, Bulacan', 'Brown', '8', '8'),
(2, 'Snow', 'Shih Tzu', 7, 'Caloocan City', 'White', '5', '7'),
(3, 'Duke', 'Poodle', 6, 'Caloocan City', 'Brown', '7', '9'),
(4, 'Cody', 'Golden Retriever', 6, 'Marikina', 'Brown', '8', '8'),
(5, 'Taro', 'Chihuahua', 10, 'Quezon City', 'White', '6', '7'),
(6, 'Arya', 'Husky', 5, 'SJDM, Bulacan', 'White', '20', '20'),
(7, 'Apollo', 'Pomeranian', 2, 'Manila', 'Black', '10', '14'),
(8, 'Latte', 'Shih Tzu Poodle', 12, 'Valenzuela', 'White', '12', '9'),
(9, 'Hienrich', 'Beagle', 1, 'Makati ', 'Brown', '13', '10'),
(10, 'Milo', 'Dalmatian', 3, 'SJDM, Bulacan', 'Black & White', '19', '28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbldogs`
--
ALTER TABLE `tbldogs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbldogs`
--
ALTER TABLE `tbldogs`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
