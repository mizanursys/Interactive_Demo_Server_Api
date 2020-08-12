-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2020 at 10:53 AM
-- Server version: 10.4.6-MariaDB
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
-- Database: `interactive`
--

-- --------------------------------------------------------

--
-- Table structure for table `horoscope`
--

CREATE TABLE `horoscope` (
  `id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_horoscope` varchar(25) NOT NULL,
  `subscription` varchar(6) NOT NULL,
  `code` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `horoscope_list`
--

CREATE TABLE `horoscope_list` (
  `id` int(11) NOT NULL,
  `horoscope_name` varchar(25) NOT NULL,
  `horoscope_code` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `horoscope_list`
--

INSERT INTO `horoscope_list` (`id`, `horoscope_name`, `horoscope_code`) VALUES
(1, 'Aries (March 21 - April 1', '*2123*50012'),
(2, 'Taurus (April 20 - May 20', '*2123*54451'),
(5, 'Gemini (May 21 - June 20)', '*2123*50013'),
(6, 'Cancer (June 21 - July 22', '*2123*54345'),
(7, 'Leo (July 23 - August 22)', '*2123*50012'),
(8, 'Virgo (August 23 - Septem', '*2123*5434#'),
(9, 'Libra (September 23 - Oct', '*2123*50011'),
(10, 'Scorpio (October 23 - Nov', '*2123*54300'),
(11, 'Sagittarius (November 22 ', '*2123*5007#'),
(12, 'Capricorn (December 22 - ', '*2123*54450'),
(13, 'Aquarius (January 20 - Fe', '*2123*50012'),
(14, 'Pisces (February 19 - Mar', '*2123*54451');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_phone` int(15) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_name`, `user_phone`, `user_email`, `user_password`) VALUES
(1, 'Mizanur Rahaman', 1835830281, 'mizansys94@gmail.com', '0000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `horoscope`
--
ALTER TABLE `horoscope`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `horoscope_list`
--
ALTER TABLE `horoscope_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `horoscope`
--
ALTER TABLE `horoscope`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `horoscope_list`
--
ALTER TABLE `horoscope_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
