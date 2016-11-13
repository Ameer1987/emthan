-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Nov 06, 2016 at 01:04 AM
-- Server version: 5.6.33
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rapiddev_emthan`
--
CREATE DATABASE IF NOT EXISTS `rapiddev_emthan` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `rapiddev_emthan`;

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `id` int(11) NOT NULL,
  `item` varchar(255) NOT NULL,
  `book_type_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `price` varchar(11) NOT NULL,
  `color` varchar(255) NOT NULL,
  `responsibility_id` int(11) NOT NULL,
  `pages` int(11) NOT NULL,
  `sent_to_print_date` datetime NOT NULL,
  `finish_print_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `subject_id` (`subject_id`),
  KEY `responsibility_id` (`responsibility_id`),
  KEY `book_type_id` (`book_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Table structure for table `book_type`
--

CREATE TABLE IF NOT EXISTS `book_type` (
  `id` int(11) NOT NULL,
  `item` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Table structure for table `brova`
--

CREATE TABLE IF NOT EXISTS `brova` (
  `id` int(11) NOT NULL,
  `item` varchar(50) NOT NULL,
  `received_date` datetime NOT NULL,
  `sent_date` datetime NOT NULL,
  `expected_date` datetime NOT NULL,
  `responsibility_id` int(11) NOT NULL,
  `sub_book_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `responsibility_id` (`responsibility_id`),
  KEY `sub_book_id` (`sub_book_id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL,
  `item` varchar(255) NOT NULL,
  `term_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `term_id` (`term_id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Table structure for table `cover`
--

CREATE TABLE IF NOT EXISTS `cover` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `responsibility_id` int(11) NOT NULL,
  `colors` varchar(11) NOT NULL,
  `solofan_matly` tinyint(4) NOT NULL,
  `solofan_lamea` tinyint(4) NOT NULL,
  `notes` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `book_id` (`book_id`),
  KEY `responsibility_id` (`responsibility_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `employee_type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `employee_type_id` (`employee_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Table structure for table `employee_type`
--

CREATE TABLE IF NOT EXISTS `employee_type` (
  `id` int(11) NOT NULL,
  `item` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE IF NOT EXISTS `level` (
  `id` int(11) NOT NULL,
  `item` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(2) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `id` int(11) NOT NULL,
  `item` varchar(255) NOT NULL,
  `sub_level_id` int(11) NOT NULL,
  `created_by` int(2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int(2) NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sub_level_id` (`sub_level_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Table structure for table `sub_book`
--

CREATE TABLE IF NOT EXISTS `sub_book` (
  `id` int(11) NOT NULL,
  `sub_book_type_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `item` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sub_book_type_id` (`sub_book_type_id`),
  KEY `book_id` (`book_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sub_book_container_type`
--

CREATE TABLE IF NOT EXISTS `sub_book_container_type` (
  `id` int(11) NOT NULL,
  `item` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sub_book_type`
--

CREATE TABLE IF NOT EXISTS `sub_book_type` (
  `id` int(11) NOT NULL,
  `item` varchar(50) NOT NULL,
  `sub_book_container_type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sub_book_container_type_id` (`sub_book_container_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sub_level`
--

CREATE TABLE IF NOT EXISTS `sub_level` (
  `id` int(11) NOT NULL,
  `item` varchar(255) NOT NULL,
  `level_id` int(11) NOT NULL,
  `created_by` int(2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int(2) NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `level_id` (`level_id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Table structure for table `term`
--

CREATE TABLE IF NOT EXISTS `term` (
  `id` int(11) NOT NULL,
  `item` varchar(255) NOT NULL,
  `year_id` int(11) NOT NULL,
  `created_by` int(2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int(2) NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `year_id` (`year_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;


--
-- Table structure for table `user_group`
--

CREATE TABLE IF NOT EXISTS `user_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `year`
--

CREATE TABLE IF NOT EXISTS `year` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item` int(5) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(2) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;



--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `book_ibfk_3` FOREIGN KEY (`responsibility_id`) REFERENCES `employee` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `book_ibfk_4` FOREIGN KEY (`book_type_id`) REFERENCES `book_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `brova`
--
ALTER TABLE `brova`
  ADD CONSTRAINT `brova_ibfk_1` FOREIGN KEY (`responsibility_id`) REFERENCES `employee` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `brova_ibfk_2` FOREIGN KEY (`sub_book_id`) REFERENCES `sub_book` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `brova_ibfk_3` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `brova_ibfk_4` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`term_id`) REFERENCES `term` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cover`
--
ALTER TABLE `cover`
  ADD CONSTRAINT `cover_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cover_ibfk_2` FOREIGN KEY (`responsibility_id`) REFERENCES `employee` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employee_type`
--
ALTER TABLE `employee_type`
  ADD CONSTRAINT `employee_type_ibfk_1` FOREIGN KEY (`id`) REFERENCES `employee` (`employee_type_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `level`
--
ALTER TABLE `level`
  ADD CONSTRAINT `level_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`sub_level_id`) REFERENCES `sub_level` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_book`
--
ALTER TABLE `sub_book`
  ADD CONSTRAINT `sub_book_ibfk_3` FOREIGN KEY (`sub_book_type_id`) REFERENCES `sub_book_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sub_book_ibfk_4` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_book_type`
--
ALTER TABLE `sub_book_type`
  ADD CONSTRAINT `sub_book_type_ibfk_1` FOREIGN KEY (`sub_book_container_type_id`) REFERENCES `sub_book_container_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_level`
--
ALTER TABLE `sub_level`
  ADD CONSTRAINT `sub_level_ibfk_1` FOREIGN KEY (`level_id`) REFERENCES `level` (`id`);

--
-- Constraints for table `term`
--
ALTER TABLE `term`
  ADD CONSTRAINT `term_ibfk_1` FOREIGN KEY (`year_id`) REFERENCES `year` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
