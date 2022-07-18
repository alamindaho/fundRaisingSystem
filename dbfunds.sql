-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 08, 2019 at 03:15 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbfunds`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_donation`
--

CREATE TABLE IF NOT EXISTS `add_donation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `amount` int(11) NOT NULL,
  `deadline` varchar(60) NOT NULL,
  `remark` varchar(300) NOT NULL,
  `status` varchar(11) NOT NULL,
  `add_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `add_donation`
--

INSERT INTO `add_donation` (`id`, `title`, `amount`, `deadline`, `remark`, `status`, `add_date`) VALUES
(1, 'Hello world', 2000000, '2020-12-25', 'This is a test data, testing the workability of the software system', 'available', '2019-12-08 03:20:40');

-- --------------------------------------------------------

--
-- Table structure for table `avail`
--

CREATE TABLE IF NOT EXISTS `avail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dname` varchar(100) NOT NULL,
  `required_sum` int(11) NOT NULL,
  `total_donated` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `avail`
--

INSERT INTO `avail` (`id`, `dname`, `required_sum`, `total_donated`) VALUES
(2, 'Hello world', 2000000, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE IF NOT EXISTS `donation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `matric` varchar(20) NOT NULL,
  `faculty` varchar(50) NOT NULL,
  `dept` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `type` varchar(100) NOT NULL,
  `amount` int(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `dono_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`id`, `name`, `matric`, `faculty`, `dept`, `level`, `phone`, `type`, `amount`, `status`, `dono_date`) VALUES
(20, 'Abraham Idris', 'tsu/fsc/cs/10/2010', 'Science', 'Mathematical Science', '400', '09012345677', 'Hello world', 2000, '', '2019-12-08 11:47:34');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(2, 'Admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id2` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `matric` varchar(20) NOT NULL,
  `Faculty` varchar(50) NOT NULL,
  `dept` varchar(50) NOT NULL,
  `level` int(20) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `reg_date` datetime NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  PRIMARY KEY (`id2`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id2`, `name`, `matric`, `Faculty`, `dept`, `level`, `phone`, `email`, `sex`, `reg_date`, `username`, `password`) VALUES
(1, 'Abraham Idris', 'tsu/fsc/cs/10/2010', 'Science', 'Mathematical Science', 400, '09012345677', 'ab@gmail.com', 'Male', '2019-12-08 02:54:08', 'Admin', 'admin123');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
